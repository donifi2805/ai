<?php
require_once 'config.php';
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['status' => false, 'message' => 'Method not allowed']);
    exit;
}

$user = require_login();

$input = json_decode(file_get_contents('php://input'), true) ?: $_POST;
$action = $input['action'] ?? '';

if ($action !== 'bayar') {
    echo json_encode(['status' => false, 'message' => 'Action harus bayar']);
    exit;
}

$kode = $input['kode'] ?? '';
$tujuan = $input['tujuan'] ?? '';
$ref_id = $input['ref_id'] ?? ('TRX_' . strtoupper(uniqid()));
$qty = $input['qty'] ?? null;
$payment_token = $input['payment_token'] ?? null;

// Validasi minimal
if (empty($kode) && empty($payment_token)) {
    echo json_encode(['status' => false, 'message' => 'Kode atau payment_token wajib']);
    exit;
}

if (empty($tujuan) && empty($payment_token)) {
    $tujuan = 'CEK';
}

$payload = [
    'action' => 'bayar',
    'kode' => $kode,
    'tujuan' => $tujuan,
    'ref_id' => $ref_id,
];

if ($qty) $payload['qty'] = (int)$qty;
if ($payment_token) $payload['payment_token'] = $payment_token;

// Panggil provider
$provider_response = call_ppob_api($payload);

if (isset($provider_response['status']) && $provider_response['status'] === true) {
    // Simpan transaksi sebagai pending
    $trx_data = [
        'ref_id' => $ref_id,
        'ref_reseller' => $ref_id,
        'kode' => $kode,
        'tujuan' => $tujuan,
        'qty' => $qty,
        'harga' => $provider_response['data']['harga'] ?? 0,
        'status_trx' => 'pending',
        'sn' => $provider_response['data']['sn'] ?? '-',
        'payment_token' => $payment_token,
        'provider_response' => $provider_response
    ];
    
    $trx = create_transaction($user['username'], $trx_data);
    
    echo json_encode([
        'status' => true,
        'message' => 'Order diterima',
        'data' => [
            'ref_id' => $ref_id,
            'ref_reseller' => $ref_id,
            'kode' => $kode,
            'tujuan' => $tujuan,
            'harga' => $trx['harga'],
            'status_trx' => 'pending',
            'sn' => '-',
            'sisa_saldo' => $trx['sisa_saldo']
        ]
    ]);
} else {
    // Jika provider gagal, tetap simpan sebagai pending untuk simulasi
    $harga = 10500; // default
    if ($kode === 'PLNBBS' && $qty) $harga = $qty + 1000;
    
    $trx_data = [
        'ref_id' => $ref_id,
        'ref_reseller' => $ref_id,
        'kode' => $kode,
        'tujuan' => $tujuan,
        'qty' => $qty,
        'harga' => $harga,
        'status_trx' => 'pending',
        'sn' => '-',
        'payment_token' => $payment_token
    ];
    
    $trx = create_transaction($user['username'], $trx_data);
    
    echo json_encode([
        'status' => true,
        'message' => 'Order diterima (simulasi)',
        'data' => [
            'ref_id' => $ref_id,
            'ref_reseller' => $ref_id,
            'kode' => $kode,
            'tujuan' => $tujuan,
            'harga' => $trx['harga'],
            'status_trx' => 'pending',
            'sn' => '-',
            'sisa_saldo' => $trx['sisa_saldo']
        ]
    ]);
}
?>