<?php
/**
 * API Finance Panel Admin - Penyimpanan berbasis file JSON
 * Menyimpan semua data keuangan, log, laporan ke file JSON di folder data_finance/
 */

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') { http_response_code(200); exit; }

// Konfigurasi folder data
define('DATA_DIR', __DIR__ . '/data_finance/');
if (!file_exists(DATA_DIR)) {
    @mkdir(DATA_DIR, 0755, true);
    @file_put_contents(DATA_DIR . '.htaccess', "Deny from all\n");
}

// Helper functions
function readJson($filename, $default = []) {
    $path = DATA_DIR . $filename . '.json';
    if (!file_exists($path)) return $default;
    $content = @file_get_contents($path);
    if (!$content) return $default;
    $data = json_decode($content, true);
    return is_array($data) ? $data : $default;
}

function writeJson($filename, $data) {
    $path = DATA_DIR . $filename . '.json';
    $tmp = $path . '.tmp';
    $json = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    if ($json === false) return false;
    $result = @file_put_contents($tmp, $json, LOCK_EX);
    if ($result === false) return false;
    return @rename($tmp, $path);
}

function generateId($prefix = '') {
    return $prefix . strtoupper(substr(md5(uniqid(mt_rand(), true)), 0, 10)) . time();
}

function getInput() {
    $raw = file_get_contents('php://input');
    $data = json_decode($raw, true);
    if (is_array($data)) return $data;
    return $_POST;
}

$action = $_GET['action'] ?? ($_POST['action'] ?? '');
$input = getInput();

switch ($action) {

    // ===== PENGELUARAN OPERASIONAL =====
    case 'get_pengeluaran':
        $data = readJson('pengeluaran', []);
        echo json_encode(['status' => 'success', 'data' => $data]);
        break;

    case 'add_pengeluaran':
        $pengeluaran = readJson('pengeluaran', []);
        $item = [
            'id' => generateId('OUT-'),
            'tanggal' => date('Y-m-d H:i:s'),
            'kategori' => $input['kategori'] ?? 'Lainnya',
            'keterangan' => $input['keterangan'] ?? '',
            'nominal' => (int)($input['nominal'] ?? 0),
            'oleh' => $input['oleh'] ?? 'admin'
        ];
        array_unshift($pengeluaran, $item);
        writeJson('pengeluaran', $pengeluaran);
        echo json_encode(['status' => 'success', 'data' => $item]);
        break;

    case 'delete_pengeluaran':
        $pengeluaran = readJson('pengeluaran', []);
        $id = $input['id'] ?? '';
        $pengeluaran = array_values(array_filter($pengeluaran, fn($p) => $p['id'] !== $id));
        writeJson('pengeluaran', $pengeluaran);
        echo json_encode(['status' => 'success']);
        break;

    // ===== PEMASUKAN LAINNYA (non transaksi user) =====
    case 'get_pemasukan_lain':
        $data = readJson('pemasukan_lain', []);
        echo json_encode(['status' => 'success', 'data' => $data]);
        break;

    case 'add_pemasukan_lain':
        $data = readJson('pemasukan_lain', []);
        $item = [
            'id' => generateId('INC-'),
            'tanggal' => date('Y-m-d H:i:s'),
            'kategori' => $input['kategori'] ?? 'Lainnya',
            'keterangan' => $input['keterangan'] ?? '',
            'nominal' => (int)($input['nominal'] ?? 0)
        ];
        array_unshift($data, $item);
        writeJson('pemasukan_lain', $data);
        echo json_encode(['status' => 'success', 'data' => $item]);
        break;

    case 'delete_pemasukan_lain':
        $data = readJson('pemasukan_lain', []);
        $id = $input['id'] ?? '';
        $data = array_values(array_filter($data, fn($p) => $p['id'] !== $id));
        writeJson('pemasukan_lain', $data);
        echo json_encode(['status' => 'success']);
        break;

    // ===== DEPOSIT SALDO PUSAT (modal provider) =====
    case 'get_deposit_pusat':
        $data = readJson('deposit_pusat', []);
        echo json_encode(['status' => 'success', 'data' => $data]);
        break;

    case 'add_deposit_pusat':
        $data = readJson('deposit_pusat', []);
        $item = [
            'id' => generateId('DEP-'),
            'tanggal' => date('Y-m-d H:i:s'),
            'provider' => $input['provider'] ?? 'KHFY',
            'nominal' => (int)($input['nominal'] ?? 0),
            'metode' => $input['metode'] ?? 'Transfer Bank',
            'keterangan' => $input['keterangan'] ?? '',
            'saldo_setelah' => (int)($input['saldo_setelah'] ?? 0)
        ];
        array_unshift($data, $item);
        writeJson('deposit_pusat', $data);
        echo json_encode(['status' => 'success', 'data' => $item]);
        break;

    case 'delete_deposit_pusat':
        $data = readJson('deposit_pusat', []);
        $id = $input['id'] ?? '';
        $data = array_values(array_filter($data, fn($p) => $p['id'] !== $id));
        writeJson('deposit_pusat', $data);
        echo json_encode(['status' => 'success']);
        break;

    // ===== LOG AKTIVITAS ADMIN =====
    case 'get_log_admin':
        $data = readJson('log_admin', []);
        echo json_encode(['status' => 'success', 'data' => $data]);
        break;

    case 'add_log_admin':
        $data = readJson('log_admin', []);
        $item = [
            'id' => generateId('LOG-'),
            'waktu' => date('Y-m-d H:i:s'),
            'aksi' => $input['aksi'] ?? '',
            'detail' => $input['detail'] ?? '',
            'ip' => $_SERVER['REMOTE_ADDR'] ?? 'unknown'
        ];
        array_unshift($data, $item);
        if (count($data) > 2000) $data = array_slice($data, 0, 2000);
        writeJson('log_admin', $data);
        echo json_encode(['status' => 'success', 'data' => $item]);
        break;

    // ===== HUTANG PIUTANG =====
    case 'get_hutang_piutang':
        $data = readJson('hutang_piutang', []);
        echo json_encode(['status' => 'success', 'data' => $data]);
        break;

    case 'add_hutang_piutang':
        $data = readJson('hutang_piutang', []);
        $item = [
            'id' => generateId('HP-'),
            'tanggal' => date('Y-m-d H:i:s'),
            'tipe' => $input['tipe'] ?? 'piutang', // hutang/piutang
            'pihak' => $input['pihak'] ?? '',
            'nominal' => (int)($input['nominal'] ?? 0),
            'keterangan' => $input['keterangan'] ?? '',
            'status' => 'belum_lunas',
            'tanggal_lunas' => null
        ];
        array_unshift($data, $item);
        writeJson('hutang_piutang', $data);
        echo json_encode(['status' => 'success', 'data' => $item]);
        break;

    case 'lunasi_hutang_piutang':
        $data = readJson('hutang_piutang', []);
        $id = $input['id'] ?? '';
        foreach ($data as &$item) {
            if ($item['id'] === $id) {
                $item['status'] = 'lunas';
                $item['tanggal_lunas'] = date('Y-m-d H:i:s');
            }
        }
        writeJson('hutang_piutang', $data);
        echo json_encode(['status' => 'success']);
        break;

    case 'delete_hutang_piutang':
        $data = readJson('hutang_piutang', []);
        $id = $input['id'] ?? '';
        $data = array_values(array_filter($data, fn($p) => $p['id'] !== $id));
        writeJson('hutang_piutang', $data);
        echo json_encode(['status' => 'success']);
        break;

    // ===== CATATAN HPP PER PRODUK =====
    case 'get_hpp':
        $data = readJson('hpp', []);
        echo json_encode(['status' => 'success', 'data' => $data]);
        break;

    case 'save_hpp':
        $data = readJson('hpp', []);
        $kode = $input['kode_produk'] ?? '';
        if (!$kode) { echo json_encode(['status' => 'error', 'msg' => 'Kode produk wajib']); break; }
        $found = false;
        foreach ($data as &$item) {
            if ($item['kode_produk'] === $kode) {
                $item['hpp'] = (int)($input['hpp'] ?? 0);
                $item['nama'] = $input['nama'] ?? $item['nama'] ?? '';
                $item['provider'] = $input['provider'] ?? $item['provider'] ?? '';
                $found = true;
            }
        }
        if (!$found) {
            $data[] = [
                'kode_produk' => $kode,
                'nama' => $input['nama'] ?? '',
                'provider' => $input['provider'] ?? '',
                'hpp' => (int)($input['hpp'] ?? 0),
                'updated_at' => date('Y-m-d H:i:s')
            ];
        }
        writeJson('hpp', $data);
        echo json_encode(['status' => 'success']);
        break;

    case 'delete_hpp':
        $data = readJson('hpp', []);
        $kode = $input['kode_produk'] ?? '';
        $data = array_values(array_filter($data, fn($p) => $p['kode_produk'] !== $kode));
        writeJson('hpp', $data);
        echo json_encode(['status' => 'success']);
        break;

    // ===== PENGATURAN KEUANGAN (alert threshold, biaya tetap dll) =====
    case 'get_finance_settings':
        $default = [
            'alert_saldo_khfy' => 50000,
            'alert_saldo_ics' => 50000,
            'alert_saldo_kaje' => 50000,
            'biaya_tetap_bulanan' => 0,
            'target_laba_harian' => 100000,
            'target_laba_bulanan' => 3000000,
            'nama_toko' => 'Pandawa Digital'
        ];
        $data = readJson('finance_settings', $default);
        // Merge with default to ensure all keys exist
        $data = array_merge($default, $data);
        echo json_encode(['status' => 'success', 'data' => $data]);
        break;

    case 'save_finance_settings':
        $data = readJson('finance_settings', []);
        $allowed = ['alert_saldo_khfy','alert_saldo_ics','alert_saldo_kaje','biaya_tetap_bulanan','target_laba_harian','target_laba_bulanan','nama_toko'];
        foreach ($allowed as $key) {
            if (isset($input[$key])) {
                $data[$key] = is_numeric($input[$key]) ? (int)$input[$key] : $input[$key];
            }
        }
        writeJson('finance_settings', $data);
        echo json_encode(['status' => 'success', 'data' => $data]);
        break;

    // ===== LOG RAW RESPON API (cek status / trx) =====
    case 'log_api_response':
        $data = readJson('api_logs', []);
        $item = [
            'id' => generateId('API-'),
            'waktu' => date('Y-m-d H:i:s'),
            'provider' => $input['provider'] ?? 'unknown',
            'action' => $input['action'] ?? 'unknown',
            'refid' => $input['refid'] ?? '',
            'request' => $input['request'] ?? '',
            'response' => $input['response'] ?? '',
            'http_code' => (int)($input['http_code'] ?? 0),
            'duration_ms' => (int)($input['duration_ms'] ?? 0)
        ];
        array_unshift($data, $item);
        if (count($data) > 500) $data = array_slice($data, 0, 500);
        writeJson('api_logs', $data);
        echo json_encode(['status' => 'success']);
        break;

    case 'get_api_logs':
        $data = readJson('api_logs', []);
        echo json_encode(['status' => 'success', 'data' => $data]);
        break;

    case 'clear_api_logs':
        writeJson('api_logs', []);
        echo json_encode(['status' => 'success']);
        break;

    // ===== EXPORT / BACKUP / RESTORE =====
    case 'backup_all':
        $files = ['pengeluaran','pemasukan_lain','deposit_pusat','log_admin','hutang_piutang','hpp','finance_settings','api_logs'];
        $backup = [];
        foreach ($files as $f) {
            $backup[$f] = readJson($f, []);
        }
        $backup['exported_at'] = date('Y-m-d H:i:s');
        echo json_encode(['status' => 'success', 'data' => $backup], JSON_PRETTY_PRINT);
        break;

    case 'restore_all':
        $raw = $input['backup_data'] ?? '';
        if (!$raw) { echo json_encode(['status' => 'error', 'msg' => 'Data backup kosong']); break; }
        $backup = is_string($raw) ? json_decode($raw, true) : $raw;
        if (!is_array($backup)) { echo json_encode(['status' => 'error', 'msg' => 'Format data tidak valid']); break; }
        $files = ['pengeluaran','pemasukan_lain','deposit_pusat','log_admin','hutang_piutang','hpp','finance_settings','api_logs'];
        foreach ($files as $f) {
            if (isset($backup[$f]) && is_array($backup[$f])) {
                writeJson($f, $backup[$f]);
            }
        }
        echo json_encode(['status' => 'success', 'msg' => 'Data berhasil dipulihkan']);
        break;

    // ===== CATATAN KATEGORI PENGELUARAN / PEMASUKAN =====
    case 'get_kategori':
        $default = [
            'pengeluaran' => ['Server Hosting','Biaya Admin Bank','Listrik','Internet','Refund','Promo','Gaji','Pajak','Lainnya'],
            'pemasukan' => ['Penjualan Pulsa','Penjualan Data','Penjualan PLN','Topup E-Wallet','Tagihan','Lainnya']
        ];
        $data = readJson('kategori', $default);
        $data = array_merge($default, $data);
        echo json_encode(['status' => 'success', 'data' => $data]);
        break;

    case 'save_kategori':
        $data = readJson('kategori', []);
        $tipe = $input['tipe'] ?? 'pengeluaran';
        $list = $input['list'] ?? [];
        if (is_string($list)) $list = array_map('trim', explode(',', $list));
        $data[$tipe] = array_values(array_unique(array_filter($list)));
        writeJson('kategori', $data);
        echo json_encode(['status' => 'success']);
        break;

    // ===== DASHBOARD SUMMARY =====
    case 'get_summary':
        $pengeluaran = readJson('pengeluaran', []);
        $pemasukan_lain = readJson('pemasukan_lain', []);
        $deposit = readJson('deposit_pusat', []);
        $hutang_piutang = readJson('hutang_piutang', []);

        $today = date('Y-m-d');
        $month = date('Y-m');
        $year = date('Y');

        $sumOutToday = 0; $sumOutMonth = 0;
        foreach ($pengeluaran as $p) {
            $d = substr($p['tanggal'], 0, 10);
            if ($d === $today) $sumOutToday += $p['nominal'];
            if (substr($p['tanggal'], 0, 7) === $month) $sumOutMonth += $p['nominal'];
        }

        $sumInOtherToday = 0; $sumInOtherMonth = 0;
        foreach ($pemasukan_lain as $p) {
            if (substr($p['tanggal'], 0, 10) === $today) $sumInOtherToday += $p['nominal'];
            if (substr($p['tanggal'], 0, 7) === $month) $sumInOtherMonth += $p['nominal'];
        }

        $totalDepositMonth = 0;
        foreach ($deposit as $d) {
            if (substr($d['tanggal'], 0, 7) === $month) $totalDepositMonth += $d['nominal'];
        }

        $piutangBelumLunas = 0; $hutangBelumLunas = 0;
        foreach ($hutang_piutang as $hp) {
            if ($hp['status'] !== 'lunas') {
                if ($hp['tipe'] === 'piutang') $piutangBelumLunas += $hp['nominal'];
                else $hutangBelumLunas += $hp['nominal'];
            }
        }

        echo json_encode([
            'status' => 'success',
            'data' => [
                'pengeluaran_hari_ini' => $sumOutToday,
                'pengeluaran_bulan_ini' => $sumOutMonth,
                'pemasukan_lain_hari_ini' => $sumInOtherToday,
                'pemasukan_lain_bulan_ini' => $sumInOtherMonth,
                'deposit_bulan_ini' => $totalDepositMonth,
                'total_pengeluaran' => count($pengeluaran),
                'total_deposit' => count($deposit),
                'piutang_belum_lunas' => $piutangBelumLunas,
                'hutang_belum_lunas' => $hutangBelumLunas
            ]
        ]);
        break;

    // ===== PING / CEK KONEKSI (health check provider) =====
    case 'health_check':
        $providers = [
            'khfy' => $input['khfy_url'] ?? '',
            'ics' => $input['ics_url'] ?? '',
            'kaje' => $input['kaje_url'] ?? ''
        ];
        $results = [];
        foreach ($providers as $name => $url) {
            if (!$url) { $results[$name] = ['status' => 'unknown', 'msg' => 'URL tidak diset']; continue; }
            $start = microtime(true);
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_TIMEOUT, 10);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $resp = curl_exec($ch);
            $http = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            $err = curl_error($ch);
            curl_close($ch);
            $duration = round((microtime(true) - $start) * 1000);
            $results[$name] = [
                'http_code' => $http,
                'duration_ms' => $duration,
                'status' => ($http >= 200 && $http < 400) ? 'online' : ($err ? 'error' : 'offline'),
                'error' => $err,
                'response_preview' => $resp ? substr($resp, 0, 500) : ''
            ];
        }
        echo json_encode(['status' => 'success', 'data' => $results, 'waktu' => date('Y-m-d H:i:s')]);
        break;

    default:
        echo json_encode(['status' => 'error', 'msg' => 'Action tidak dikenali: ' . $action]);
        break;
}
