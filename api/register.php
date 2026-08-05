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

$input = json_decode(file_get_contents('php://input'), true);
if (!$input) {
    $input = $_POST;
}

$username = trim($input['username'] ?? '');
$email = trim($input['email'] ?? '');
$phone = trim($input['phone'] ?? '');
$password = $input['password'] ?? '';
$confirm = $input['confirm_password'] ?? '';

if (!$username || !$email || !$phone || !$password || !$confirm) {
    echo json_encode(['status' => false, 'message' => 'Semua field wajib diisi']);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['status' => false, 'message' => 'Format email tidak valid']);
    exit;
}

if (!preg_match('/^08[1-9][0-9]{7,10}$/', $phone)) {
    echo json_encode(['status' => false, 'message' => 'Nomor HP harus format 08xxxxxxxxxx']);
    exit;
}

if (strlen($password) < 6) {
    echo json_encode(['status' => false, 'message' => 'Password minimal 6 karakter']);
    exit;
}

if ($password !== $confirm) {
    echo json_encode(['status' => false, 'message' => 'Konfirmasi password tidak cocok']);
    exit;
}

$result = create_user([
    'username' => $username,
    'email' => $email,
    'phone' => $phone,
    'password' => $password
]);

echo json_encode($result);
?>