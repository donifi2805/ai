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

$input = json_decode(file_get_contents('php://input'), true) ?: $_POST;

$username = trim($input['username'] ?? '');
$password = $input['password'] ?? '';

if (!$username || !$password) {
    echo json_encode(['status' => false, 'message' => 'Username dan password wajib diisi']);
    exit;
}

$result = authenticate($username, $password);

if ($result['status']) {
    if (session_status() === PHP_SESSION_NONE) {
        session_name(SESSION_NAME);
        session_start();
    }
    $_SESSION['user'] = $result['user'];
    $_SESSION['user']['password'] = null; // jangan simpan password di session
    echo json_encode([
        'status' => true,
        'message' => 'Login berhasil',
        'user' => [
            'username' => $result['user']['username'],
            'email' => $result['user']['email'],
            'phone' => $result['user']['phone'],
            'role' => $result['user']['role'],
            'balance' => $result['user']['balance']
        ]
    ]);
} else {
    echo json_encode($result);
}
?>