<?php
require_once 'config.php';
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['status' => false, 'message' => 'Method not allowed']);
    exit;
}

$input = json_decode(file_get_contents('php://input'), true) ?: $_POST;
$action = $input['action'] ?? 'list';

if ($action === 'list' || $action === 'produk') {
    // Panggil provider
    $payload = [
        'action' => 'list'
    ];
    $response = call_ppob_api($payload);
    
    if (isset($response['status']) && $response['status'] === true) {
        echo json_encode($response);
    } else {
        // Fallback jika provider gagal - kirim data contoh
        echo json_encode([
            'status' => true,
            'message' => 'Daftar produk (fallback)',
            'data' => [
                ['kode' => 'TSEL10', 'nama' => 'Telkomsel 10Rb Reguler', 'harga' => 10500, 'status' => 'READY', 'stock' => '999'],
                ['kode' => 'TSEL25', 'nama' => 'Telkomsel 25Rb Reguler', 'harga' => 25500, 'status' => 'READY', 'stock' => '850'],
                ['kode' => 'XL10', 'nama' => 'XL 10Rb', 'harga' => 10200, 'status' => 'READY', 'stock' => '1200'],
                ['kode' => 'PLN20', 'nama' => 'Token PLN 20.000', 'harga' => 20500, 'status' => 'READY', 'stock' => '999'],
                ['kode' => 'PLNBBS', 'nama' => 'PLN Open Denom', 'harga' => 0, 'status' => 'READY', 'stock' => '999', 'open_denom' => true],
                ['kode' => 'CPAM', 'nama' => 'Cek PDAM (Inquiry)', 'harga' => 0, 'status' => 'READY', 'stock' => '999', 'is_inquiry' => true],
            ]
        ]);
    }
} else {
    echo json_encode(['status' => false, 'message' => 'Action tidak dikenali']);
}
?>