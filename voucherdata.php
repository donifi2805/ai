<?php
/* ============================================================================
   voucherdata.php — Jembatan PHP untuk stok & pemakaian voucher PayNusa
   ----------------------------------------------------------------------------
   Menyimpan data runtime voucher (stok tersisa + daftar user yang sudah
   memakai voucher 1x pakai) ke dalam file JSON di server (bukan database),
   dengan penguncian file (flock) agar aman dari balapan/race condition.

   CARA PASANG:
   Unggah file ini ke folder yang SAMA dengan index.html (root aplikasi) DAN
   salin juga ke folder yang sama dengan paneladmin.php (folder admin),
   persis seperti manager.php yang saat ini sudah ada di kedua lokasi.

   Protokol:
   - GET  voucherdata.php                 -> mengambil seluruh data
   - POST action=sync  {vouchers:[...]}  -> sinkron stok dari panel admin
                                            (stok baru diisi dari settings,
                                             stok lama yang sudah terpakai
                                             TIDAK ditimpa)
   - POST action=check {uid, code}        -> cek stok & status 1x pakai user
   - POST action=use   {uid, code}        -> pakai voucher: kurangi stok 1,
                                            catat uid untuk voucher 1x pakai
   - POST action=reset {code}             -> reset stok & catatan 1 voucher
   - POST action=reset_all {}             -> reset SEMUA data runtime
   Respons selalu JSON: {status: true/false, message, ...}
   ========================================================================== */

header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: no-store, no-cache, must-revalidate');

@error_reporting(0);

define('VD_FILE', __DIR__ . DIRECTORY_SEPARATOR . 'voucherdata_store.json');

/* --------------------------- util penyimpanan ---------------------------- */
function vd_read() {
    $data = array('stock' => new stdClass(), 'used' => new stdClass());
    if (is_file(VD_FILE)) {
        $raw = @file_get_contents(VD_FILE);
        if ($raw !== false && $raw !== '') {
            $dec = json_decode($raw, true);
            if (is_array($dec)) {
                if (isset($dec['stock']) && is_array($dec['stock'])) $data['stock'] = $dec['stock'];
                if (isset($dec['used'])  && is_array($dec['used']))  $data['used']  = $dec['used'];
            }
        }
    }
    return $data;
}

function vd_write($data) {
    $fp = @fopen(VD_FILE, 'c+');
    if (!$fp) return false;
    $ok = false;
    if (flock($fp, LOCK_EX)) {
        ftruncate($fp, 0);
        rewind($fp);
        $json = json_encode($data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
        fwrite($fp, $json);
        fflush($fp);
        flock($fp, LOCK_UN);
        $ok = true;
    }
    fclose($fp);
    @chmod(VD_FILE, 0666);
    return $ok;
}

function vd_reply($arr) {
    echo json_encode($arr, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    exit;
}

/* ------------------------------ input ------------------------------------ */
$method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
$body   = array();
if ($method === 'POST') {
    $ct = isset($_SERVER['CONTENT_TYPE']) ? $_SERVER['CONTENT_TYPE'] : '';
    if (stripos($ct, 'application/json') !== false) {
        $in = json_decode(file_get_contents('php://input'), true);
        if (is_array($in)) $body = $in;
    } else {
        $body = $_POST;
    }
}
$action = isset($_GET['action']) ? $_GET['action'] : (isset($body['action']) ? $body['action'] : 'get');

/* ------------------------------- aksi ------------------------------------ */
switch ($action) {

    /* Ambil seluruh data runtime */
    case 'get':
        $d = vd_read();
        vd_reply(array('status' => true, 'stock' => $d['stock'], 'used' => $d['used']));
        break;

    /* Sinkron dari panel admin: tambahkan voucher baru dengan stok awal,
       voucher lama dibiarkan (stok terjual tidak direstore). */
    case 'sync':
        $vouchers = isset($body['vouchers']) && is_array($body['vouchers']) ? $body['vouchers'] : array();
        $d = vd_read();
        $added = 0;
        foreach ($vouchers as $v) {
            if (!is_array($v)) continue;
            $code = isset($v['code']) ? trim($v['code']) : '';
            if ($code === '') continue;
            if (!array_key_exists($code, $d['stock'])) {
                // Stok -1 = tak terbatas (untuk voucher lama yang belum punya pengaturan stok)
                $stock = (isset($v['stock']) && $v['stock'] !== null && $v['stock'] !== '') ? (int)$v['stock'] : -1;
                $d['stock'][$code] = $stock;
                $added++;
            }
        }
        if (!vd_write($d)) vd_reply(array('status' => false, 'message' => 'Gagal menulis file data. Cek izin folder (chmod 755/777).'));
        vd_reply(array('status' => true, 'message' => 'Sinkronisasi stok berhasil (' . $added . ' voucher baru).', 'stock' => $d['stock'], 'used' => $d['used']));
        break;

    /* Cek apakah voucher masih bisa dipakai user tertentu */
    case 'check':
        $uid  = isset($body['uid']) ? trim($body['uid']) : '';
        $code = isset($body['code']) ? trim($body['code']) : '';
        $once = !empty($body['once']);
        if ($code === '') vd_reply(array('status' => false, 'message' => 'Kode voucher kosong.'));
        $d = vd_read();
        $stockLeft = array_key_exists($code, $d['stock']) ? (int)$d['stock'][$code] : null;
        $usedBy = isset($d['used'][$code]) && is_array($d['used'][$code]) ? $d['used'][$code] : array();
        $alreadyUsed = $once && $uid !== '' && in_array($uid, $usedBy, true);
        $outOfStock = ($stockLeft !== null && $stockLeft <= 0);
        vd_reply(array(
            'status' => true,
            'code' => $code,
            'stock' => $stockLeft,
            'already_used' => $alreadyUsed,
            'out_of_stock' => $outOfStock,
            'can_use' => !$alreadyUsed && !$outOfStock
        ));
        break;

    /* Pakai voucher: kurangi stok, catat uid bila voucher 1x pakai */
    case 'use':
        $uid  = isset($body['uid']) ? trim($body['uid']) : '';
        $code = isset($body['code']) ? trim($body['code']) : '';
        $once = !empty($body['once']);
        if ($code === '') vd_reply(array('status' => false, 'message' => 'Kode voucher kosong.'));
        $d = vd_read();
        if (!array_key_exists($code, $d['stock'])) {
            // Voucher belum ter-sinkron; anggap stok tak terbatas agar tidak memblokir
            $d['stock'][$code] = -1;
        }
        if ($d['stock'][$code] !== -1 && $d['stock'][$code] <= 0) {
            vd_reply(array('status' => false, 'message' => 'Stok voucher sudah habis.', 'stock' => 0));
        }
        if ($once && $uid !== '') {
            if (!isset($d['used'][$code]) || !is_array($d['used'][$code])) $d['used'][$code] = array();
            if (in_array($uid, $d['used'][$code], true)) {
                vd_reply(array('status' => false, 'message' => 'Voucher ini hanya bisa dipakai satu kali per akun.', 'stock' => (int)$d['stock'][$code]));
            }
            $d['used'][$code][] = $uid;
        }
        if ($d['stock'][$code] > 0) $d['stock'][$code] = (int)$d['stock'][$code] - 1;
        if (!vd_write($d)) vd_reply(array('status' => false, 'message' => 'Gagal menyimpan pemakaian voucher.'));
        vd_reply(array('status' => true, 'message' => 'Voucher berhasil dipakai.', 'stock' => (int)$d['stock'][$code]));
        break;

    /* Reset satu voucher (stok diisi ulang + catatan pemakaian dihapus) */
    case 'reset':
        $code  = isset($body['code']) ? trim($body['code']) : '';
        $stock = isset($body['stock']) ? (int)$body['stock'] : 0;
        if ($code === '') vd_reply(array('status' => false, 'message' => 'Kode voucher kosong.'));
        $d = vd_read();
        $d['stock'][$code] = $stock;
        if (isset($d['used'][$code])) unset($d['used'][$code]);
        vd_write($d);
        vd_reply(array('status' => true, 'message' => 'Voucher ' . $code . ' direset ke stok ' . $stock . '.', 'stock' => $d['stock']));
        break;

    /* Reset total */
    case 'reset_all':
        vd_write(array('stock' => new stdClass(), 'used' => new stdClass()));
        vd_reply(array('status' => true, 'message' => 'Seluruh data runtime voucher direset.'));
        break;

    default:
        vd_reply(array('status' => false, 'message' => 'Aksi tidak dikenal: ' . $action));
}
