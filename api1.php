<?php
// api1.php - Gateway Server 1 (AkrabStable - Dynamic Markup Engine)
// Diperbarui: Always Sync Status, Regex Gagal Kustom, Retensi Pesan Gagal, Deteksi Antrian, Hide Produk, & Proteksi Nomor Pending + Custom RefID Pusat
ini_set('display_errors', 0);
date_default_timezone_set('Asia/Jakarta');

header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization, X-API-KEY');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') { http_response_code(200); exit(); }

require_once __DIR__ . '/auth_helper.php';

// CEK STATUS ON/OFF SERVER API1
check_api_status_or_die('api1');

$rawBody = file_get_contents('php://input');
$input   = json_decode($rawBody, true);
if (!is_array($input)) $input = $_POST;
$input = array_merge($_GET, $input);

$headers = array_change_key_case(getallheaders(), CASE_UPPER);
$apiKey  = $headers['X-API-KEY'] ?? $input['api_key'] ?? '';

$userData = validate_api_key($apiKey);
if (!$userData) {
    http_response_code(401);
    echo json_encode(['status' => false, 'message' => 'Akses Ditolak: API Key tidak valid atau akun ditangguhkan!']);
    exit();
}

$userMarkup = get_user_markup_for_api($userData, 'api1');
$userSaldo  = (int)($userData['saldo'] ?? 0);

$kodereseller = "NF00514"; $pin = "180979"; $password = "reyy35";
$baseUrlNew   = "http://213.163.206.110:3333/api";
$apiKeyOld    = "8F1199C1-483A-4C96-825E-F5EBD33AC60A";
$baseUrlOld   = "https://panel.khfy-store.com/api_v2";

// DAFTAR KODE PRODUK YANG DISEMBUNYIKAN & DIBLOKIR
$hiddenProducts = ['XLB9', 'XLB15', 'XLB21', 'CEKPLN', 'TES'];

function sendCurlApi1($url, $payload = null) {
    $ch = curl_init();
    curl_setopt_array($ch, [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_TIMEOUT => 30
    ]);
    if ($payload !== null) {
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    }
    $res = curl_exec($ch);
    curl_close($ch);
    return $res ?: json_encode(['status' => false, 'message' => 'Connection Error']);
}

function get_product_harga_final_api1($kodeProduk, $baseUrlOld, $apiKeyOld, $userMarkup) {
    global $hiddenProducts;
    
    // Blokir order manual dari produk yang disembunyikan
    if (in_array(strtoupper(trim($kodeProduk)), $hiddenProducts)) {
        return 0; 
    }

    $rawRes   = sendCurlApi1("$baseUrlOld/list_product?api_key=$apiKeyOld");
    $json     = json_decode($rawRes, true);
    $products = $json['data'] ?? (is_array($json) ? $json : []);

    if (is_array($products)) {
        foreach ($products as $p) {
            if (!is_array($p)) continue;
            $c = strtoupper(trim($p['kode'] ?? $p['kode_produk'] ?? $p['code'] ?? $p['product_code'] ?? ''));
            if ($c === strtoupper(trim($kodeProduk))) {
                $base = (int)($p['harga_modal'] ?? $p['harga'] ?? $p['price'] ?? $p['modal'] ?? 0);
                if ($base > 0) return ($base + $userMarkup);
                if (isset($p['harga_final']) && (int)$p['harga_final'] > 0) return (int)$p['harga_final'] + $userMarkup;
            }
        }
    }
    return 0;
}

$action = strtolower(trim($input['action'] ?? 'list'));

switch ($action) {
    case 'list':
    case 'products':
        $rawRes = sendCurlApi1("$baseUrlOld/list_product?api_key=$apiKeyOld");
        $json   = json_decode($rawRes, true);
        if (!is_array($json)) {
            echo json_encode(['status' => false, 'message' => 'Gagal mengambil data katalog Server 1']);
            exit();
        }

        $json = clean_api_message($json);

        // FILTER PRODUK YANG DISEMBUNYIKAN
        if (isset($json['data']) && is_array($json['data'])) {
            $filteredData = [];
            foreach ($json['data'] as $item) {
                if (!is_array($item)) continue;
                $code = strtoupper(trim($item['kode'] ?? $item['kode_produk'] ?? $item['code'] ?? $item['product_code'] ?? ''));
                if (!in_array($code, $hiddenProducts)) {
                    $filteredData[] = $item;
                }
            }
            $json['data'] = $filteredData;

            inject_stock_to_products($json['data']);
            apply_user_markup($json['data'], $userMarkup);

        } elseif (is_array($json) && !isset($json['status']) && !isset($json['data'])) {
            $filteredData = [];
            foreach ($json as $item) {
                if (!is_array($item)) continue;
                $code = strtoupper(trim($item['kode'] ?? $item['kode_produk'] ?? $item['code'] ?? $item['product_code'] ?? ''));
                if (!in_array($code, $hiddenProducts)) {
                    $filteredData[] = $item;
                }
            }
            $json = $filteredData;

            inject_stock_to_products($json);
            apply_user_markup($json, $userMarkup);
        }

        echo json_encode($json);
        break;

    case 'order':
    case 'trx':
        $p = strtoupper(trim($input['kode_produk'] ?? $input['kode'] ?? $input['produk'] ?? ''));
        $t = trim($input['target'] ?? $input['tujuan'] ?? '');
        
        $refidReseller = trim($input['ref_id'] ?? $input['refid'] ?? '');
        $refidH2H   = $refidReseller ?: ('TRX_' . date('YmdHis') . rand(100, 999));
        
        // --- MODIFIKASI FORMAT REFID PUSAT ---
        // Mengambil 4 digit pertama dari target tujuan (contoh: 0877)
        $prefixTujuan = substr($t, 0, 4);
        // Generate 7 digit angka acak murni (contoh: 8365926)
        $random7Digit = str_pad(mt_rand(0, 9999999), 7, '0', STR_PAD_LEFT);
        // Menggabungkan format menjadi KF-0877-8365926
        $refidPusat = "KF-{$prefixTujuan}-{$random7Digit}";
        // -------------------------------------

        if (!$p || !$t) {
            echo json_encode(['status' => false, 'message' => 'Parameter kode_produk dan target wajib diisi']);
            exit();
        }

        // Cek Transaksi Duplikat (Berdasarkan Ref ID)
        $existing = find_transaction_by_any_refid($userData['id'], $refidH2H);
        if ($existing) {
            $isSuccessOrPending = ($existing['status'] === 'BERHASIL' || $existing['status'] === 'PENDING');
            echo json_encode([
                'status'  => $isSuccessOrPending,
                'message' => clean_api_message($existing['message'] ?: 'Transaksi duplikat terdeteksi'),
                'data'    => [
                    'ref_id'       => $existing['refid_h2h'],
                    'ref_reseller' => $refidReseller ?: $existing['refid_h2h'],
                    'kode'         => $existing['kode_produk'],
                    'tujuan'       => $existing['target'],
                    'harga'        => (int)($existing['harga'] ?? 0),
                    'status_trx'   => strtolower($existing['status']),
                    'sn'           => clean_api_message($existing['sn'] ?? '-'),
                    'sisa_saldo'   => (int)$userData['saldo']
                ]
            ]);
            exit();
        }

        // PROTEKSI ANTI SPAM NOMOR SAMA (MENCEGAH HIT NOMOR YANG MASIH PENDING)
        $isTargetPending = false;
        $history = function_exists('get_user_transactions') ? get_user_transactions($userData['id']) : [];
        
        // Fallback baca file manual jika fungsi get_user_transactions mengembalikan array kosong
        if (empty($history)) {
            $dbPaths = [
                __DIR__ . '/database/trx_' . $userData['id'] . '.json',
                __DIR__ . '/data/trx_' . $userData['id'] . '.json',
                __DIR__ . '/trx_' . $userData['id'] . '.json'
            ];
            foreach ($dbPaths as $path) {
                if (file_exists($path)) {
                    $history = json_decode(file_get_contents($path), true) ?: [];
                    break;
                }
            }
        }

        if (is_array($history)) {
            foreach ($history as $trx) {
                if (($trx['target'] ?? '') === $t && strtoupper($trx['status'] ?? '') === 'PENDING') {
                    $isTargetPending = true;
                    break;
                }
            }
        }

        // Jika nomor yang sama masih ada dalam status PENDING, gagalkan instan
        if ($isTargetPending) {
            $msgAntrianPending = 'Nomor yang sama masih dalam antrian pembelian, transaksi tidak dapat dilanjutkan sampai status transaksi sebelumnya gagal/berhasil';
            echo json_encode([
                'status'  => false,
                'message' => $msgAntrianPending,
                'data'    => [
                    'ref_id'       => $refidH2H,
                    'ref_reseller' => $refidReseller ?: $refidH2H,
                    'kode'         => $p,
                    'tujuan'       => $t,
                    'harga'        => 0,
                    'status_trx'   => 'gagal',
                    'sn'           => $msgAntrianPending,
                    'sisa_saldo'   => (int)$userData['saldo']
                ]
            ]);
            exit();
        }

        $hargaFinal = get_product_harga_final_api1($p, $baseUrlOld, $apiKeyOld, $userMarkup);

        if ($hargaFinal <= 0) {
            echo json_encode([
                'status'  => false,
                'message' => 'Kode produk [' . $p . '] tidak ditemukan atau sedang tidak aktif!',
                'data'    => [
                    'ref_id'       => $refidH2H,
                    'ref_reseller' => $refidReseller ?: $refidH2H,
                    'kode'         => $p,
                    'tujuan'       => $t,
                    'harga'        => 0,
                    'status_trx'   => 'gagal',
                    'sn'           => '-',
                    'sisa_saldo'   => (int)$userData['saldo']
                ]
            ]);
            exit();
        }

        // STRICT BALANCE LOCK
        if ($userSaldo <= 0 || $userSaldo < $hargaFinal) {
            echo json_encode([
                'status'  => false,
                'message' => 'Saldo H2H Anda tidak mencukupi! Sisa Saldo: Rp ' . number_format($userSaldo, 0, ',', '.') . ', Harga Produk: Rp ' . number_format($hargaFinal, 0, ',', '.'),
                'data'    => [
                    'ref_id'       => $refidH2H,
                    'ref_reseller' => $refidReseller ?: $refidH2H,
                    'kode'         => $p,
                    'tujuan'       => $t,
                    'harga'        => $hargaFinal,
                    'status_trx'   => 'gagal',
                    'sn'           => '-',
                    'sisa_saldo'   => (int)$userData['saldo']
                ]
            ]);
            exit();
        }

        // Potong Saldo User
        deduct_user_balance($userData['id'], $hargaFinal);

        // 1. Simpan Record Awal ke Riwayat H2H dengan Status PENDING
        $trxRecord = [
            'trx_id'          => 'TRX1-' . time() . rand(100, 999),
            'refid_h2h'       => $refidH2H,
            'refid_pusat'     => $refidPusat, // Menyimpan format KF-0877-xxxxxxx ke database lokal
            'user_id'         => $userData['id'],
            'username'        => $userData['username'],
            'nomorwa'         => $userData['nomorwa'],
            'server'          => 'api1.php',
            'server_code'     => 'api1',
            'server_name'     => 'Server 1 API',
            'kode_produk'     => $p,
            'target'          => $t,
            'harga'           => $hargaFinal,
            'status'          => 'PENDING',
            'status_override' => false,
            'sn'              => '-',
            'message'         => 'Transaksi sedang diproses / pending',
            'created_at'      => date('Y-m-d H:i:s')
        ];
        save_user_transaction($userData['id'], $trxRecord);

        // 2. Kirim Request Pembelian ke Server Pusat
        $payload = [
            "req" => "topup", "kodereseller" => $kodereseller, "produk" => $p, 
            "msisdn" => $t, "reffid" => $refidPusat, "time" => date('His'), 
            "pin" => $pin, "password" => $password
        ];

        $rawRes  = sendCurlApi1($baseUrlNew, $payload);
        $resJson = json_decode($rawRes, true);

        $rawMsgText = is_array($resJson) ? ($resJson['body_respon'] ?? $resJson['message'] ?? $resJson['msg'] ?? '') : (string)$rawRes;
        $statusPusat = detect_trx_status($resJson, $rawMsgText);

        // DETEKSI ANTRIAN PENUH (trx_pending)
        if ((isset($resJson['ok']) && $resJson['ok'] === false && isset($resJson['trx_pending'])) || preg_match('/trx pending masih (\d+)/i', $rawMsgText, $matches)) {
            $statusPusat = 'GAGAL';
            $antrian = $resJson['trx_pending'] ?? ($matches[1] ?? 'beberapa');
            $rawMsgText  = "Server sedang mengantri masih ada $antrian antrian, mohon lakukan transaksi ulang beberapa saat lagi.";
        }

        // DETEKSI REGEX KUSTOM: GAGAL INSTAN
        if (preg_match('/(Coba beberapa saat lagi|HTTP_CLIENT_RESPONSE_BODY_EROR|HTTP_CLIENT_RESPONSE_BODY_ERROR)/i', $rawMsgText)) {
            $statusPusat = 'GAGAL';
        }

        $cleanedMsg = clean_api_message($rawMsgText ?: 'Order diterima, dalam antrean');
        $sn = clean_api_message($resJson['sn'] ?? $resJson['serial_number'] ?? '-');

        // Ambil Data Sisa Saldo Terbaru
        $allUsersData = function_exists('get_users_data') ? get_users_data() : [];
        $uIdx = array_search($userData['id'], array_column($allUsersData, 'id'));
        
        // Jika API Pusat secara instan menolak order, update ke GAGAL dan refund
        if ($statusPusat === 'GAGAL') {
            add_user_balance($userData['id'], $hargaFinal);
            $trxRecord['status']  = 'GAGAL';
            $trxRecord['sn']      = $sn;
            $trxRecord['message'] = $cleanedMsg;
            // Pesan gagal ini akan tersimpan di hosting lokal
            save_user_transaction($userData['id'], $trxRecord);
            
            $sisaSaldo = ($uIdx !== false) ? (int)($allUsersData[$uIdx]['saldo'] ?? 0) : ((int)$userData['saldo']);

            echo json_encode([
                'status'  => false,
                'message' => 'Order Gagal: ' . $cleanedMsg,
                'data'    => [
                    'ref_id'       => $refidH2H,
                    'ref_reseller' => $refidReseller ?: $refidH2H,
                    'kode'         => $p,
                    'tujuan'       => $t,
                    'harga'        => $hargaFinal,
                    'status_trx'   => 'gagal',
                    'sn'           => $sn,
                    'sisa_saldo'   => $sisaSaldo
                ]
            ]);
            exit();
        }

        $trxRecord['sn']      = $sn;
        $trxRecord['message'] = $cleanedMsg;
        save_user_transaction($userData['id'], $trxRecord);

        $sisaSaldo = ($uIdx !== false) ? (int)($allUsersData[$uIdx]['saldo'] ?? 0) : ((int)$userData['saldo'] - $hargaFinal);

        echo json_encode([
            'status'  => true,
            'message' => 'Order diterima: ' . $cleanedMsg,
            'data'    => [
                'ref_id'       => $refidH2H,
                'ref_reseller' => $refidReseller ?: $refidH2H,
                'kode'         => $p,
                'tujuan'       => $t,
                'harga'        => $hargaFinal,
                'status_trx'   => strtolower($trxRecord['status']),
                'sn'           => $sn,
                'sisa_saldo'   => $sisaSaldo
            ]
        ]);
        break;

    case 'status':
    case 'check':
        $r = trim($input['refid'] ?? $input['ref_id'] ?? '');
        if (!$r) {
            echo json_encode(['status' => false, 'message' => 'Parameter refid wajib diisi']);
            exit();
        }

        $trx = find_transaction_by_any_refid($userData['id'], $r);
        if (!$trx) {
            echo json_encode(['status' => false, 'message' => 'RefID tidak ditemukan pada riwayat Anda']);
            exit();
        }

        // Simpan status & pesan lama (lokal) sebelum di-sync ke pusat
        $oldStatus  = $trx['status'];
        $oldMessage = $trx['message']; 

        // SYNC KE PUSAT (Selalu ambil dari respon pusat, proteksi lokal dihapus)
        // Parameter true memastikan ini selalu memicu request ke server pusat jika memungkinkan
        $trx = sync_transaction_status($trx['user_id'], $trx, true);

        $currentMsg = $trx['message'] ?? '';

        // DETEKSI REGEX KUSTOM SAAT CEK STATUS
        if (preg_match('/(Coba beberapa saat lagi|HTTP_CLIENT_RESPONSE_BODY_EROR|HTTP_CLIENT_RESPONSE_BODY_ERROR)/i', $currentMsg)) {
            // Jika sebelumnya belum gagal, paksa jadi gagal dan refund
            if ($trx['status'] !== 'GAGAL') {
                $trx['status'] = 'GAGAL';
                
                // Refund hanya jika status sebelumnya PENDING agar tidak double refund
                if ($oldStatus === 'PENDING') {
                    add_user_balance($trx['user_id'], (int)$trx['harga']);
                }
                save_user_transaction($trx['user_id'], $trx); // Update ke DB Hosting
            }
        }

        // PENGEMBALIAN PESAN LOKAL (Jika gagal di awal)
        // Jika status sudah GAGAL tapi respon dari pusat kosong atau 'tidak ditemukan'
        // Maka kita timpa dengan pesan gagal asli yang tersimpan di DB lokal saat order
        if ($trx['status'] === 'GAGAL' && (empty($currentMsg) || preg_match('/(tidak ditemukan|not found)/i', $currentMsg))) {
            $trx['message'] = $oldMessage;
        }

        $isSuccessOrPending = ($trx['status'] === 'BERHASIL' || $trx['status'] === 'PENDING');

        echo json_encode([
            'status'  => $isSuccessOrPending,
            'message' => 'Status Transaksi',
            'data'    => [
                'ref_id'     => $trx['refid_h2h'],
                'kode'       => $trx['kode_produk'],
                'tujuan'     => $trx['target'],
                'status_trx' => strtolower($trx['status']),
                'sn'         => clean_api_message($trx['sn'] ?? '-'),
                'keterangan' => clean_api_message($trx['message'])
            ]
        ]);
        break;

    default:
        echo json_encode(['status' => false, 'message' => 'Action tidak valid pada Server 1 API']);
        break;
}