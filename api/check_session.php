<?php
require_once 'config.php';
header('Content-Type: application/json');

if (session_status() === PHP_SESSION_NONE) {
    session_name(SESSION_NAME);
    session_start();
}

if (isset($_SESSION['user'])) {
    $u = $_SESSION['user'];
    echo json_encode([
        'logged_in' => true,
        'user' => [
            'username' => $u['username'],
            'email' => $u['email'],
            'phone' => $u['phone'],
            'role' => $u['role'],
            'balance' => $u['balance'] ?? 0
        ]
    ]);
} else {
    echo json_encode(['logged_in' => false]);
}
?>