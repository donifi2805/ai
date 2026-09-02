<?php
// api3.php - Gateway Server 3 (AkrabSmart - Wuzz Store Integration)
ini_set('display_errors', 0);
date_default_timezone_set('Asia/Jakarta');

header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization, X-API-KEY');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') { http_response_code(200); exit(); }

require_once __DIR__ . '/auth_helper.php';

// CEK STATUS ON/OFF SERVER API3
check_api_status_or_die('api3');

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

$userMarkup = get_user_markup_for_api($userData, 'api3');
$userSaldo  = (int)($userData['saldo'] ?? 0);

const WZ_BASE_URL = 'https://api.wuzzstore.my.id';
const WZ_API_KEY  = '9bf7c7bc-b8b8-40b0-bd32-853ae90f719a';

$ALLOWED_CODES = ['KZNBZ','XLFL0','XLFL1','XLFL2','XLFL3','XLFL4','XLFXL','XLFXL2','XLFXL3','XLFXXL','XLFXXL2','XLFXXL3','XLFXXXL','XLFXXXXL'];

function wz_request_api3($path, $body = []) {
    $url = rtrim(WZ_BASE_URL, '/') . '/' . ltrim($path, '/');
    $ch  = curl_init($url);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST           => true,
        CURLOPT_TIMEOUT        => 30,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_HTTPHEADER     => ['Content-Type: application/json', 'Accept: application/json', 'x-api-key: ' . WZ_API_KEY],
        CURLOPT_POSTFIELDS     => json_encode((object)$body)
    ]);
    $res = curl_exec($ch);
    curl_close($ch);
    return json_decode($res, true) ?? [];
}

function get_product_price_api3($kodeProduk, $userMarkup) {
    $res = wz_request_api3('/restapi/product/list');
    $products = $res['data'] ?? (is_array($res) ? $res : []);

    if (is_array($products)) {
        foreach ($products as $p) {
            if (!is_array($p)) continue;
            $c = strtoupper(trim($p['code'] ?? $p['kode'] ?? $p['kode_produk'] ?? ''));
            if ($c === strtoupper(trim($kodeProduk))) {
                $base = (int)($p['price'] ?? $p['harga'] ?? 0);
                return ($base > 0) ? ($base + $userMarkup) : 0;
            }
        }
    }
    return 0;
}

$action = strtolower(trim($input['action'] ?? 'list'));

switch ($action) {
    case 'list':
    case 'products':
        $res = wz_request_api3('/restapi/product/list');
        if (($res['success'] ?? false) === true && is_array($res['data'] ?? null)) {
            $filtered   = [];
            $allowedMap = array_flip($ALLOWED_CODES);
            foreach ($res['data'] as $item) {
                $code = strtoupper(trim($item['code'] ?? ''));
                if (isset($allowedMap[$code])) $filtered[] = $item;
            }
            $res['data'] = $filtered;
        }

        $res = clean_api_message($res);
        if (isset($res['data']) && is_array($res['data'])) {
            inject_stock_to_products($res['data']);
            apply_user_markup($res['data'], $userMarkup);
        } elseif (is_array($res)) {
            inject_stock_to_products($res);
            apply_user_markup($res, $userMarkup);
        }
        echo json_encode($res);
        break;

    case 'order':
    case 'trx':
        $code      = strtoupper(trim($input['kode_produk'] ?? $input['code'] ?? $input['kode'] ?? ''));
        $target    = preg_replace('/\D+/', '', $input['target'] ?? $input['destination'] ?? $input['tujuan'] ?? '');
        $refidH2H  = $input['refid'] ?? $input['reffid'] ?? $input['ref_id'] ?? ('TRX_' . date('YmdHis') . rand(100, 999));
        $refidPusat = 'S3-' . date('ymdHis') . rand(1000, 9999);

        if (!$code || !$target) {
            echo json_encode(['status' => false, 'message' => 'Parameter kode_produk dan target wajib diisi']);
            exit();
        }

        $hargaPrice = get_product_price_api3($code, $userMarkup);

        if ($hargaPrice <= 0) {
            echo json_encode([
                'status'     => false,
                'trx_status' => 'GAGAL',
                'message'    => 'Kode produk [' . $code . '] tidak ditemukan atau tidak aktif!',
                'refid'      => $refidH2H
            ]);
            exit();
        }

        // STRICT BALANCE LOCK
        if ($userSaldo <= 0 || $userSaldo < $hargaPrice) {
            echo json_encode([
                'status'     => false,
                'trx_status' => 'GAGAL',
                'message'    => 'Saldo Anda tidak mencukupi! Sisa Saldo: Rp ' . number_format($userSaldo, 0, ',', '.') . ', Harga Produk: Rp ' . number_format($hargaPrice, 0, ',', '.'),
                'refid'      => $refidH2H
            ]);
            exit();
        }

        deduct_user_balance($userData['id'], $hargaPrice);

        $res = wz_request_api3('/restapi/product/order', ['code' => $code, 'destination' => $target, 'order_id' => $refidPusat]);
        
        $rawMsgText = is_array($res) ? ($res['message'] ?? $res['data']['message'] ?? '') : '';
        $statusFinal = detect_trx_status($res, $rawMsgText);

        $cleanedMsg = clean_api_message($rawMsgText);
        $sn = clean_api_message($res['sn'] ?? $res['serial_number'] ?? '-');

        if ($statusFinal === 'GAGAL') {
            add_user_balance($userData['id'], $hargaPrice);
        }

        $trxRecord = [
            'trx_id'          => 'TRX3-' . time() . rand(100, 999),
            'refid_h2h'       => $refidH2H,
            'refid_pusat'     => $refidPusat,
            'user_id'         => $userData['id'],
            'username'        => $userData['username'],
            'nomorwa'         => $userData['nomorwa'],
            'server'          => 'api3.php',
            'server_code'     => 'api3',
            'server_name'     => 'Server 3 API',
            'kode_produk'     => $code,
            'target'          => $target,
            'harga'           => $hargaPrice,
            'status'          => $statusFinal,
            'status_override' => false,
            'sn'              => $sn,
            'message'         => $cleanedMsg,
            'created_at'      => date('Y-m-d H:i:s')
        ];
        save_user_transaction($userData['id'], $trxRecord);

        echo json_encode([
            'status'      => ($statusFinal !== 'GAGAL'),
            'trx_status'  => $statusFinal,
            'message'     => $cleanedMsg,
            'refid'       => $refidH2H,
            'sn'          => $sn,
            'harga'       => $hargaPrice
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
            echo json_encode(['status' => false, 'message' => 'RefID tidak ditemukan']);
            exit();
        }

        $oldStatus = $trx['status'];
        $trx = sync_transaction_status($trx['user_id'], $trx);

        if ($oldStatus !== 'GAGAL' && $trx['status'] === 'GAGAL') {
            $harga = (int)($trx['harga'] ?? 0);
            if ($harga > 0) add_user_balance($trx['user_id'], $harga);
        }

        echo json_encode([
            'status'      => ($trx['status'] !== 'GAGAL'),
            'trx_status'  => $trx['status'],
            'message'     => clean_api_message($trx['message']),
            'server'      => $trx['server_code'] ?? 'api3',
            'refid'       => $trx['refid_h2h'],
            'sn'          => clean_api_message($trx['sn'])
        ]);
        break;

    default:
        echo json_encode(['status' => false, 'message' => 'Action tidak valid pada Server 3 API']);
        break;
}