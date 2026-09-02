<?php
// api2.php - Gateway Server 2 (AkrabSuper - ICS Store Integration)
ini_set('display_errors', 0);
date_default_timezone_set('Asia/Jakarta');

header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization, X-API-KEY');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') { http_response_code(200); exit(); }

require_once __DIR__ . '/auth_helper.php';

// CEK STATUS ON/OFF SERVER API2
check_api_status_or_die('api2');

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

$userMarkup   = get_user_markup_for_api($userData, 'api2');
$userSaldo    = (int)($userData['saldo'] ?? 0);
$apiKeyServer = "7274410f84b7e2810795810e879a4e0be8779c451d55e90e29d9bc174547ff77";
$baseUrl      = "https://api.ics-store.my.id/api";

function callApi2($method, $url, $data = null, $token = '') {
    $curl = curl_init();
    $headers = [
        "Authorization: Bearer $token",
        "Content-Type: application/json",
        "Accept: application/json"
    ];
    $options = [
        CURLOPT_URL            => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT        => 30,
        CURLOPT_CUSTOMREQUEST  => $method,
        CURLOPT_HTTPHEADER     => $headers,
        CURLOPT_SSL_VERIFYPEER => false
    ];
    if ($data && ($method === 'POST' || $method === 'PUT')) {
        $options[CURLOPT_POSTFIELDS] = json_encode($data);
    }
    curl_setopt_array($curl, $options);
    $response = curl_exec($curl);
    curl_close($curl);
    return $response ?: json_encode(['success' => false, 'message' => 'Connection Error to Server 2']);
}

function get_product_base_price_api2($kodeProduk, $baseUrl, $apiKeyServer) {
    $rawRes   = callApi2('GET', "$baseUrl/reseller/products", null, $apiKeyServer);
    $json     = json_decode($rawRes, true);
    $products = $json['data'] ?? (is_array($json) ? $json : []);

    if (is_array($products)) {
        foreach ($products as $p) {
            if (!is_array($p)) continue;
            $c = strtoupper(trim($p['product_code'] ?? $p['code'] ?? $p['kode'] ?? $p['kode_produk'] ?? ''));
            if ($c === strtoupper(trim($kodeProduk))) {
                return (int)($p['price'] ?? $p['harga'] ?? $p['harga_final'] ?? 0);
            }
        }
    }
    return 0;
}

$action = strtolower(trim($input['action'] ?? 'list'));

switch ($action) {
    case 'list':
    case 'products':
        $rawRes = callApi2('GET', "$baseUrl/reseller/products", null, $apiKeyServer);
        $json   = json_decode($rawRes, true);
        if (!is_array($json)) {
            echo json_encode(['status' => false, 'message' => 'Gagal mengambil data katalog Server 2']);
            exit();
        }

        $json = clean_api_message($json);
        if (isset($json['data']) && is_array($json['data'])) {
            // FILTER: Sembunyikan kode awalan CND dan PLN
            $json['data'] = array_filter($json['data'], function($item) {
                if(!is_array($item)) return true;
                $code = strtoupper(trim($item['product_code'] ?? $item['code'] ?? $item['kode'] ?? $item['kode_produk'] ?? ''));
                return strpos($code, 'CND') !== 0 && strpos($code, 'PLN') !== 0;
            });
            $json['data'] = array_values($json['data']); // Re-index array
            
            inject_stock_to_products($json['data']);
            apply_user_markup($json['data'], $userMarkup);
        } elseif (is_array($json)) {
            // FILTER: Sembunyikan kode awalan CND dan PLN
            $json = array_filter($json, function($item) {
                if(!is_array($item)) return true;
                $code = strtoupper(trim($item['product_code'] ?? $item['code'] ?? $item['kode'] ?? $item['kode_produk'] ?? ''));
                return strpos($code, 'CND') !== 0 && strpos($code, 'PLN') !== 0;
            });
            $json = array_values($json); // Re-index array
            
            inject_stock_to_products($json);
            apply_user_markup($json, $userMarkup);
        }
        echo json_encode($json);
        break;

    case 'order':
    case 'trx':
        $dest      = trim($input['target'] ?? $input['tujuan'] ?? '');
        $code      = strtoupper(trim($input['kode_produk'] ?? $input['code'] ?? $input['kode'] ?? ''));
        $refidH2H  = $input['refid'] ?? $input['reffid'] ?? $input['ref_id'] ?? ('TRX_' . date('YmdHis') . rand(100, 999));
        
        // --- GENERATE REFF ID BARU (ICS-TUJUAN-BULANJAMMENIT) SESUAI PROXY PANDAWA ---
        $refidPusat = 'ICS-' . $dest . '-' . date('mHi');

        if (!$code || !$dest) {
            echo json_encode(['status' => false, 'message' => 'Parameter kode_produk dan target wajib diisi']);
            exit();
        }

        // PROTEKSI: Tolak Transaksi Jika Kode Awalan CND atau PLN
        if (strpos($code, 'CND') === 0 || strpos($code, 'PLN') === 0) {
            echo json_encode([
                'status'     => false,
                'trx_status' => 'GAGAL',
                'message'    => 'Kode produk tidak ditemukan',
                'refid'      => $refidH2H,
                'sn'         => 'Kode produk tidak ditemukan'
            ]);
            exit();
        }

        // Cek Transaksi Duplikat
        $existing = find_transaction_by_any_refid($userData['id'], $refidH2H);
        if ($existing) {
            $isSuccessOrPending = ($existing['status'] === 'BERHASIL' || $existing['status'] === 'PENDING');
            echo json_encode([
                'status'     => $isSuccessOrPending,
                'trx_status' => $existing['status'],
                'message'    => clean_api_message($existing['message'] ?: 'Transaksi duplikat terdeteksi'),
                'refid'      => $existing['refid_h2h'],
                'sn'         => clean_api_message($existing['sn'] ?? '-')
            ]);
            exit();
        }

        $basePrice  = get_product_base_price_api2($code, $baseUrl, $apiKeyServer);
        $finalPrice = ($basePrice > 0) ? ($basePrice + $userMarkup) : $userMarkup;

        // STRICT BALANCE LOCK
        if ($userSaldo <= 0 || $userSaldo < $finalPrice) {
            echo json_encode([
                'status'     => false,
                'trx_status' => 'GAGAL',
                'message'    => 'Saldo Anda tidak mencukupi! Sisa Saldo: Rp ' . number_format($userSaldo, 0, ',', '.') . ', Harga Produk: Rp ' . number_format($finalPrice, 0, ',', '.'),
                'refid'      => $refidH2H
            ]);
            exit();
        }

        deduct_user_balance($userData['id'], $finalPrice);

        // 1. Simpan Record Awal ke Riwayat H2H dengan Status PENDING
        $trxRecord = [
            'trx_id'          => 'TRX2-' . time() . rand(100, 999),
            'refid_h2h'       => $refidH2H,
            'refid_pusat'     => $refidPusat,
            'user_id'         => $userData['id'],
            'username'        => $userData['username'],
            'nomorwa'         => $userData['nomorwa'],
            'server'          => 'api2.php',
            'server_code'     => 'api2',
            'server_name'     => 'Server 2 API',
            'kode_produk'     => $code,
            'target'          => $dest,
            'harga'           => $finalPrice,
            'status'          => 'PENDING',
            'status_override' => false,
            'sn'              => '-',
            'message'         => 'Order diterima, sedang diproses',
            'created_at'      => date('Y-m-d H:i:s')
        ];
        save_user_transaction($userData['id'], $trxRecord);

        // 2. Kirim Request Pembelian ke Server Pusat
        $payload = ["product_code" => $code, "dest_number" => $dest, "ref_id_custom" => $refidPusat];
        $rawRes  = callApi2('POST', "$baseUrl/reseller/trx", $payload, $apiKeyServer);
        $resJson = json_decode($rawRes, true);

        // LOGIKA ICS SEPERTI PANDAWA (Validasi Success & Data Ekstraksi Penuh)
        $isSuccess = false;
        $statusPusat = 'PENDING';
        $rawMsgText = 'Gagal memproses ke server pusat';
        $sn = '-';

        if (is_array($resJson)) {
            $stText = strtolower($resJson['data']['status'] ?? ($resJson['success'] ? 'success' : 'failed'));
            $detailMsg = $resJson['data']['message'] ?? $resJson['message'] ?? 'Transaksi diproses';
            $rawMsgText = $detailMsg;
            
            if (isset($resJson['success']) && $resJson['success'] === true) {
                $isSuccess = true;
                $statusPusat = 'PENDING';
                
                $snValid = $resJson['data']['sn'] ?? null;
                if (!empty($snValid) && strtolower((string)$snValid) !== 'null') {
                    $sn = $snValid;
                } else {
                    $sn = $detailMsg;
                }
            } else {
                $statusPusat = 'GAGAL';
                $sn = $detailMsg;
            }
        } else {
            $statusPusat = 'GAGAL';
            $rawMsgText = (string)$rawRes;
            $sn = $rawMsgText;
        }

        $cleanedMsg = clean_api_message($rawMsgText ?: 'Order berhasil dikirim');
        $sn = clean_api_message($sn);

        if ($statusPusat === 'GAGAL') {
            add_user_balance($userData['id'], $finalPrice);
            $trxRecord['status']  = 'GAGAL';
            $trxRecord['sn']      = $sn;
            $trxRecord['message'] = $cleanedMsg;
            save_user_transaction($userData['id'], $trxRecord);

            echo json_encode([
                'status'      => false,
                'trx_status'  => 'GAGAL',
                'message'     => $cleanedMsg,
                'refid'       => $refidH2H,
                'sn'          => $sn,
                'harga'       => $finalPrice
            ]);
            exit();
        }

        $trxRecord['status']  = 'PENDING';
        $trxRecord['sn']      = $sn;
        $trxRecord['message'] = $cleanedMsg;
        save_user_transaction($userData['id'], $trxRecord);

        echo json_encode([
            'status'      => true,
            'trx_status'  => 'PENDING',
            'message'     => $cleanedMsg,
            'refid'       => $refidH2H,
            'sn'          => $sn,
            'harga'       => $finalPrice
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

        // SELALU CEK KE PUSAT MENGABAIKAN PROTEKSI LOKAL ($forceSync = true)
        // Data lokal hanya digunakan jika Pusat menjawab "TIDAK DITEMUKAN"
        $trx = sync_transaction_status($trx['user_id'], $trx, true);

        $isSuccessOrPending = ($trx['status'] === 'BERHASIL' || $trx['status'] === 'PENDING');

        echo json_encode([
            'status'      => $isSuccessOrPending,
            'trx_status'  => $trx['status'],
            'message'     => clean_api_message($trx['message']),
            'server'      => $trx['server_code'] ?? 'api2',
            'refid'       => $trx['refid_h2h'],
            'sn'          => clean_api_message($trx['sn'] ?? '-')
        ]);
        break;

    default:
        echo json_encode(['status' => false, 'message' => 'Action tidak valid pada Server 2 API']);
        break;
}