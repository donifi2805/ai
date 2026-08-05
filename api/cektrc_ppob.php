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
$refid = $input['refid'] ?? $input['ref_id'] ?? '';

if ($action !== 'status' || empty($refid)) {
    echo json_encode(['status' => false, 'message' => 'Parameter action=status dan refid wajib']);
    exit;
}

// Coba cek ke provider
$payload = [
    'action' => 'status',
    'refid' => $refid
];
$provider_resp = call_ppob_api($payload);

if (isset($provider_resp['status']) && $provider_resp['status'] === true) {
    $trx_status = $provider_resp['trx_status'] ?? 'PENDING';
    $sn = $provider_resp['sn'] ?? '-';
    
    // Update di data lokal
    update_transaction_status($user['username'], $refid, strtolower($trx_status), $sn);
    
    echo json_encode([
        'status' => true,
        'trx_status' => $trx_status,
        'message' => $provider_resp['message'] ?? 'Transaksi ' . $trx_status,
        'refid' => $refid,
        'sn' => $sn
    ]);
} else {
    // Fallback: cek dari history lokal
    $history = load_user_history($user['username']);
    $found = null;
    
    foreach ($history as $trx) {
        if (($trx['ref_id'] ?? '') === $refid || ($trx['ref_reseller'] ?? '') === $refid) {
            $found = $trx;
            break;
        }
    }
    
    if ($found) {
        echo json_encode([
            'status' => true,
            'trx_status' => strtoupper($found['status_trx'] ?? 'PENDING'),
            'message' => 'Status dari sistem lokal',
            'refid' => $refid,
            'sn' => $found['sn'] ?? '-'
        ]);
    } else {
        echo json_encode([
            'status' => false,
            'message' => 'Transaksi tidak ditemukan'
        ]);
    }
}
?>