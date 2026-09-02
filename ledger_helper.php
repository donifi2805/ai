<?php
/**
 * ledger_helper.php
 * ============================================================================
 * SISTEM PENCATATAN SALDO DETIL (BALANCE LEDGER / AUDIT SALDO)
 * ----------------------------------------------------------------------------
 * File ini menyimpan buku besar saldo per user. Setiap perubahan saldo
 * (pembelian via api1/api2/api3/api4, refund, topup, dan penyesuaian admin)
 * WAJIB dicatat lewat helper di file ini supaya:
 *
 *   1. Setiap entri memiliki SALDO AWAL dan SALDO AKHIR.
 *   2. Urutan selalu BERANTAI: saldo_akhir entri ke-N == saldo_awal entri
 *      ke-N+1 (diverifikasi oleh ledger_validate_chain()).
 *   3. Aman untuk TRANSAKSI BERSAMAAN (concurrent): seluruh proses
 *      "baca saldo -> ubah saldo -> tulis entri" dikunci dengan LOCK_EX
 *      pada satu file lock global, sehingga dua request yang masuk pada
 *      detik yang sama tidak akan saling menimpa / membuat rantai putus.
 *
 * Penyimpanan: data_private/ledger/ledger_<USERID>.json
 * Lock global : data_private/ledger/.ledger.lock
 * ============================================================================
 */

if (!defined('LEDGER_HELPER_LOADED')) {
    define('LEDGER_HELPER_LOADED', true);

    // ========================================================================
    // LOKASI PENYIMPANAN
    // ========================================================================

    function ledger_dir() {
        $dir = __DIR__ . '/data_private/ledger';
        if (!is_dir($dir)) @mkdir($dir, 0755, true);
        return $dir;
    }

    function ledger_file($userId) {
        $clean = preg_replace('/[^a-zA-Z0-9_-]/', '', (string)$userId);
        if ($clean === '') $clean = 'unknown';
        return ledger_dir() . '/ledger_' . $clean . '.json';
    }

    function ledger_lock_file() {
        return ledger_dir() . '/.ledger.lock';
    }

    // ========================================================================
    // KUNCI GLOBAL (ANTI RACE CONDITION UNTUK TRANSAKSI BERSAMAAN)
    // ========================================================================

    function ledger_global_lock() {
        $fp = @fopen(ledger_lock_file(), 'c');
        if (!$fp) return null;
        @flock($fp, LOCK_EX);
        return $fp;
    }

    function ledger_global_unlock($fp) {
        if (!$fp) return;
        @flock($fp, LOCK_UN);
        @fclose($fp);
    }

    // ========================================================================
    // BACA / TULIS DATA LEDGER
    // ========================================================================

    function ledger_saldo($userId) {
        $users = function_exists('get_users_data') ? get_users_data() : [];
        if (!is_array($users)) return 0;
        foreach ($users as $u) {
            if (($u['id'] ?? '') === $userId) return (int)($u['saldo'] ?? 0);
        }
        return 0;
    }

    function get_user_ledger($userId) {
        $file = ledger_file($userId);
        if (!file_exists($file)) return [];

        $fp = @fopen($file, 'r');
        if (!$fp) return [];

        $content = '';
        if (@flock($fp, LOCK_SH)) {
            $content = @stream_get_contents($fp);
            @flock($fp, LOCK_UN);
        } else {
            $content = @file_get_contents($file);
        }
        @fclose($fp);

        $data = json_decode($content, true);
        if (!is_array($data)) return [];

        // Selalu urutkan berurutan (lama -> baru) agar rantai saldo terbaca runtut
        usort($data, function ($a, $b) {
            $sa = (int)($a['seq'] ?? 0);
            $sb = (int)($b['seq'] ?? 0);
            if ($sa === $sb) return strcmp((string)($a['waktu'] ?? ''), (string)($b['waktu'] ?? ''));
            return ($sa < $sb) ? -1 : 1;
        });

        return $data;
    }

    function ledger_has_entries($userId) {
        $file = ledger_file($userId);
        if (!file_exists($file)) return false;
        $data = json_decode(@file_get_contents($file), true);
        return is_array($data) && count($data) > 0;
    }

    /**
     * Menulis satu entri ke akhir file ledger.
     * Harus dipanggil di dalam ledger_global_lock() agar nomor urut (seq)
     * dan rantai saldo tidak bentrok antar request.
     */
    function ledger_write_entry($userId, $entry) {
        $file = ledger_file($userId);

        $fp = @fopen($file, 'c+');
        if (!$fp) return null;

        $data = [];
        if (@flock($fp, LOCK_EX)) {
            $raw = @stream_get_contents($fp);
            $data = json_decode((string)$raw, true);
            if (!is_array($data)) $data = [];

            $lastSeq = 0;
            foreach ($data as $d) {
                if ((int)($d['seq'] ?? 0) > $lastSeq) $lastSeq = (int)$d['seq'];
            }

            $entry['seq'] = $lastSeq + 1;
            $entry['id']  = 'LG-' . date('YmdHis') . '-' . str_pad((string)$entry['seq'], 6, '0', STR_PAD_LEFT);
            if (empty($entry['waktu'])) $entry['waktu'] = date('Y-m-d H:i:s');

            $data[] = $entry;

            ftruncate($fp, 0);
            rewind($fp);
            fwrite($fp, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
            fflush($fp);
            @flock($fp, LOCK_UN);
        }
        @fclose($fp);

        return $entry;
    }

    // ========================================================================
    // KAMUS NAMA PRODUK (supaya keterangan terbaca "Pulsa XL 5000" bukan "XLB5")
    // ========================================================================

    function ledger_names_file() {
        $dir = __DIR__ . '/data_private';
        if (!is_dir($dir)) @mkdir($dir, 0755, true);
        return $dir . '/product_names.json';
    }

    function ledger_load_names() {
        static $cache = null;
        if ($cache !== null) return $cache;
        $f = ledger_names_file();
        $cache = [];
        if (file_exists($f)) {
            $d = json_decode(@file_get_contents($f), true);
            if (is_array($d)) $cache = $d;
        }
        return $cache;
    }

    /**
     * Simpan kamus kode => nama produk dari daftar produk (list) server pusat.
     * Dipanggil setiap kali endpoint list produk diakses supaya nama produk
     * perlengkap sendiri tanpa harus menembak server pusat saat transaksi.
     */
    function ledger_cache_products($items) {
        if (!is_array($items) || empty($items)) return;
        $names = ledger_load_names();
        $changed = false;

        foreach ($items as $p) {
            if (!is_array($p)) continue;
            $kode = strtoupper(trim((string)($p['kode'] ?? $p['kode_produk'] ?? $p['code'] ?? $p['product_code'] ?? '')));
            $nama = trim((string)($p['nama'] ?? $p['nama_produk'] ?? $p['product_name'] ?? $p['name'] ?? $p['keterangan'] ?? ''));
            if ($kode === '' || $nama === '') continue;
            if (!isset($names[$kode]) || $names[$kode] !== $nama) {
                $names[$kode] = $nama;
                $changed = true;
            }
        }

        if ($changed) {
            if (count($names) > 6000) $names = array_slice($names, -6000, null, true);
            @file_put_contents(ledger_names_file(), json_encode($names, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        }
    }

    function ledger_product_name($kode, $fallback = '') {
        $kode = strtoupper(trim((string)$kode));
        if ($kode === '') return trim((string)$fallback);
        $names = ledger_load_names();
        if (isset($names[$kode]) && $names[$kode] !== '') return $names[$kode];
        if (trim((string)$fallback) !== '') return trim((string)$fallback);
        return $kode;
    }

    // ========================================================================
    // TEKS KETERANGAN OTOMATIS
    // ========================================================================

    function ledger_default_keterangan($jenis, $meta) {
        $produk = ledger_product_name((string)($meta['kode_produk'] ?? ''), (string)($meta['produk_nama'] ?? ''));
        switch (strtoupper((string)$jenis)) {
            case 'PEMBELIAN':
                return 'Beli ' . ($produk !== '' ? $produk : 'Produk');
            case 'REFUND':
                return 'Refund ' . ($produk !== '' ? $produk : 'Produk');
            case 'TOPUP':
                return 'Topup saldo';
            case 'PENYESUAIAN':
                return 'Penyesuaian saldo oleh admin';
            case 'SALDO_AWAL':
                return 'Saldo awal tercatat';
            default:
                return 'Mutasi saldo';
        }
    }

    // ========================================================================
    // FUNGSI UTAMA PENCATATAN
    // ========================================================================

    /**
     * Catat satu mutasi saldo.
     *
     * @param string $userId  ID user
     * @param string $arah    'KELUAR' (saldo berkurang) | 'MASUK' (saldo bertambah)
     * @param int    $jumlah  Nominal mutasi (selalu positif)
     * @param array  $meta    jenis, refid, refid_pusat, kode_produk, produk_nama,
     *                        target, server, status, keterangan, catatan, admin
     * @return array Entri ledger yang tersimpan (berisi saldo_awal & saldo_akhir)
     */
    function ledger_record($userId, $arah, $jumlah, $meta = array()) {
        $jumlah = (int)$jumlah;
        if ($jumlah < 0) $jumlah = 0;
        $arah   = strtoupper((string)$arah);
        if ($arah !== 'KELUAR' && $arah !== 'MASUK') $arah = 'MASUK';

        $jenis = strtoupper((string)($meta['jenis'] ?? 'PENYESUAIAN'));
        $keterangan = trim((string)($meta['keterangan'] ?? ''));
        if ($keterangan === '') $keterangan = ledger_default_keterangan($jenis, $meta);

        // ---- MULAI BLOK ATOMIK: semua request lain mengantre di sini ----
        $lock = ledger_global_lock();

        $saldoAwal = ledger_saldo($userId);

        // Entri pembuka agar rantai saldo punya titik awal yang jelas
        if (!ledger_has_entries($userId)) {
            ledger_write_entry($userId, array(
                'jenis'       => 'SALDO_AWAL',
                'arah'        => 'AWAL',
                'jumlah'      => 0,
                'saldo_awal'  => $saldoAwal,
                'saldo_akhir' => $saldoAwal,
                'refid'       => '-',
                'refid_pusat' => '',
                'kode_produk' => '',
                'produk_nama' => '',
                'target'      => '',
                'server'      => 'system',
                'status'      => 'BERHASIL',
                'keterangan'  => 'Saldo awal tercatat saat fitur audit diaktifkan',
                'catatan'     => 'Titik awal pembukuan saldo',
                'admin'       => '',
            ));
        }

        if ($jumlah > 0) {
            if ($arah === 'KELUAR') {
                if (function_exists('deduct_user_balance')) deduct_user_balance($userId, $jumlah);
            } else {
                if (function_exists('add_user_balance')) add_user_balance($userId, $jumlah);
            }
        }

        $saldoAkhir = ledger_saldo($userId);

        $entry = ledger_write_entry($userId, array(
            'jenis'       => $jenis,
            'arah'        => $arah,
            'jumlah'      => $jumlah,
            'saldo_awal'  => $saldoAwal,
            'saldo_akhir' => $saldoAkhir,
            'refid'       => (string)($meta['refid'] ?? '-'),
            'refid_pusat' => (string)($meta['refid_pusat'] ?? ''),
            'kode_produk' => (string)($meta['kode_produk'] ?? ''),
            'produk_nama' => ledger_product_name((string)($meta['kode_produk'] ?? ''), (string)($meta['produk_nama'] ?? '')),
            'target'      => (string)($meta['target'] ?? ''),
            'server'      => (string)($meta['server'] ?? ''),
            'status'      => strtoupper((string)($meta['status'] ?? 'BERHASIL')),
            'keterangan'  => $keterangan,
            'catatan'     => (string)($meta['catatan'] ?? ''),
            'admin'       => (string)($meta['admin'] ?? ''),
            'trx_id'      => (string)($meta['trx_id'] ?? ''),
        ));

        // ---- SELESAI BLOK ATOMIK ----
        ledger_global_unlock($lock);

        return $entry;
    }

    /** Saldo KELUAR (pembelian / pemotongan) */
    function ledger_charge($userId, $jumlah, $meta = array()) {
        $meta['arah'] = 'KELUAR';
        if (empty($meta['jenis'])) $meta['jenis'] = 'PEMBELIAN';
        return ledger_record($userId, 'KELUAR', $jumlah, $meta);
    }

    /** Saldo MASUK (refund / topup / penyesuaian) */
    function ledger_credit($userId, $jumlah, $meta = array()) {
        $meta['arah'] = 'MASUK';
        if (empty($meta['jenis'])) $meta['jenis'] = 'REFUND';
        return ledger_record($userId, 'MASUK', $jumlah, $meta);
    }

    /** Refund / pengembalian saldo */
    function ledger_refund($userId, $jumlah, $meta = array()) {
        $meta['jenis'] = 'REFUND';
        if (empty($meta['keterangan'])) $meta['keterangan'] = 'Refund ' . ledger_product_name((string)($meta['kode_produk'] ?? ''), (string)($meta['produk_nama'] ?? ''));
        return ledger_record($userId, 'MASUK', $jumlah, $meta);
    }

    /** Topup / penambahan saldo */
    function ledger_topup($userId, $jumlah, $meta = array()) {
        $meta['jenis'] = 'TOPUP';
        if (empty($meta['keterangan'])) $meta['keterangan'] = 'Topup saldo';
        return ledger_record($userId, 'MASUK', $jumlah, $meta);
    }

    /**
     * Set saldo user ke nilai tertentu (dipakai panel admin).
     * Selisihnya dicatat sebagai PENYESUAIAN.
     */
    function ledger_set_saldo($userId, $newSaldo, $meta = array()) {
        $newSaldo = (int)$newSaldo;
        if ($newSaldo < 0) $newSaldo = 0;

        $lock = ledger_global_lock();

        $saldoAwal = ledger_saldo($userId);

        if (!ledger_has_entries($userId)) {
            ledger_write_entry($userId, array(
                'jenis'       => 'SALDO_AWAL',
                'arah'        => 'AWAL',
                'jumlah'      => 0,
                'saldo_awal'  => $saldoAwal,
                'saldo_akhir' => $saldoAwal,
                'refid'       => '-',
                'refid_pusat' => '',
                'kode_produk' => '',
                'produk_nama' => '',
                'target'      => '',
                'server'      => 'system',
                'status'      => 'BERHASIL',
                'keterangan'  => 'Saldo awal tercatat saat fitur audit diaktifkan',
                'catatan'     => 'Titik awal pembukuan saldo',
                'admin'       => (string)($meta['admin'] ?? ''),
            ));
        }

        $users = function_exists('get_users_data') ? get_users_data() : array();
        if (is_array($users)) {
            foreach ($users as $idx => $u) {
                if (($u['id'] ?? '') === $userId) {
                    $users[$idx]['saldo'] = $newSaldo;
                    break;
                }
            }
            if (function_exists('save_users_data')) save_users_data($users);
        }

        $saldoAkhir = ledger_saldo($userId);
        $selisih    = abs($saldoAkhir - $saldoAwal);

        $entry = ledger_write_entry($userId, array(
            'jenis'       => 'PENYESUAIAN',
            'arah'        => ($saldoAkhir >= $saldoAwal) ? 'MASUK' : 'KELUAR',
            'jumlah'      => $selisih,
            'saldo_awal'  => $saldoAwal,
            'saldo_akhir' => $saldoAkhir,
            'refid'       => (string)($meta['refid'] ?? '-'),
            'refid_pusat' => '',
            'kode_produk' => 'SALDO',
            'produk_nama' => 'Penyesuaian Saldo',
            'target'      => '',
            'server'      => (string)($meta['server'] ?? 'paneladmin'),
            'status'      => 'BERHASIL',
            'keterangan'  => trim((string)($meta['keterangan'] ?? '')) !== ''
                                ? trim((string)$meta['keterangan'])
                                : 'Penyesuaian saldo oleh admin',
            'catatan'     => (string)($meta['catatan'] ?? ''),
            'admin'       => (string)($meta['admin'] ?? ''),
        ));

        ledger_global_unlock($lock);

        return $entry;
    }

    // ========================================================================
    // VALIDASI RANTAI SALDO
    // ========================================================================

    /**
     * Periksa apakah rantai saldo tidak putus.
     * @return array { 'valid' => bool, 'breaks' => [index entri yang putus], 'total' => int }
     */
    function ledger_validate_chain($ledger) {
        $breaks = array();
        if (!is_array($ledger)) return array('valid' => true, 'breaks' => $breaks, 'total' => 0);

        $prev = null;
        $i = 0;
        foreach ($ledger as $e) {
            if ($prev !== null) {
                if ((int)($e['saldo_awal'] ?? 0) !== (int)($prev['saldo_akhir'] ?? 0)) {
                    $breaks[] = $i;
                }
            }
            $prev = $e;
            $i++;
        }

        return array(
            'valid'  => empty($breaks),
            'breaks' => $breaks,
            'total'  => $i,
        );
    }

    /**
     * Ringkasan angka untuk kebutuhan panel.
     */
    function ledger_summary($ledger) {
        $masuk = 0; $keluar = 0; $pembelian = 0; $refund = 0; $topup = 0; $penyesuaian = 0;
        if (is_array($ledger)) {
            foreach ($ledger as $e) {
                $j = (int)($e['jumlah'] ?? 0);
                if (($e['arah'] ?? '') === 'MASUK') $masuk += $j; else $keluar += $j;
                switch (strtoupper((string)($e['jenis'] ?? ''))) {
                    case 'PEMBELIAN':   $pembelian++;   break;
                    case 'REFUND':      $refund++;      break;
                    case 'TOPUP':       $topup++;       break;
                    case 'PENYESUAIAN': $penyesuaian++; break;
                }
            }
        }
        return array(
            'total_masuk'  => $masuk,
            'total_keluar' => $keluar,
            'pembelian'    => $pembelian,
            'refund'       => $refund,
            'topup'        => $topup,
            'penyesuaian'  => $penyesuaian,
            'entries'      => is_array($ledger) ? count($ledger) : 0,
        );
    }

    /**
     * Baris sederhana untuk tampilan teks, contoh:
     * "Beli Pulsa XL 5000 — saldo awal 50000 saldo akhir 45000 refid 123456"
     */
    function ledger_simple_line($e) {
        $ket  = trim((string)($e['keterangan'] ?? ''));
        $awal = (int)($e['saldo_awal'] ?? 0);
        $akhir = (int)($e['saldo_akhir'] ?? 0);
        $refid = trim((string)($e['refid'] ?? '-'));
        $st    = strtoupper((string)($e['status'] ?? ''));
        $stTxt = ($st === 'GAGAL') ? ' [GAGAL]' : (($st === 'PENDING') ? ' [PENDING]' : '');
        return $ket . ' — saldo awal ' . $awal . ' saldo akhir ' . $akhir . ' refid ' . $refid . $stTxt;
    }

}
