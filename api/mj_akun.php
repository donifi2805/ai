<?php
require_once 'config.php';
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET');
header('Access-Control-Allow-Headers: Content-Type');

$user = require_login();
$input = json_decode(file_get_contents('php://input'), true) ?: $_POST;
$action = $input['action'] ?? $_GET['action'] ?? 'get';

if ($action === 'get') {
    $acc = load_user_account($user['username']);
    $profile = load_user_profile($user['username']);
    echo json_encode([
        'status' => true,
        'data' => [
            'account' => $acc,
            'profile' => $profile,
            'balance' => $user['balance'] ?? 0
        ]
    ]);
    exit;
}

if ($action === 'update_profile') {
    $full_name = trim($input['full_name'] ?? $user['username']);
    $email = trim($input['email'] ?? $user['email']);
    $phone = trim($input['phone'] ?? $user['phone']);
    $wa = trim($input['wa'] ?? $phone);

    $acc = load_user_account($user['username']);
    if ($acc) {
        $acc['full_name'] = $full_name;
        $acc['email'] = $email;
        $acc['phone'] = $phone;
        $acc['wa'] = $wa;
        save_user_account($user['username'], $acc);
    }

    // Update users.json juga
    $users = load_users();
    foreach ($users as &$u) {
        if ($u['username'] === $user['username']) {
            $u['email'] = $email;
            $u['phone'] = $phone;
            $u['wa'] = $wa;
            break;
        }
    }
    save_users($users);

    echo json_encode(['status' => true, 'message' => 'Profil berhasil diperbarui']);
    exit;
}

if ($action === 'change_password') {
    $old_pass = $input['old_password'] ?? '';
    $new_pass = $input['new_password'] ?? '';
    $confirm = $input['confirm_password'] ?? '';

    if (empty($old_pass) || empty($new_pass)) {
        echo json_encode(['status' => false, 'message' => 'Password lama dan baru wajib diisi']);
        exit;
    }
    if ($new_pass !== $confirm) {
        echo json_encode(['status' => false, 'message' => 'Konfirmasi password tidak cocok']);
        exit;
    }
    if (strlen($new_pass) < 6) {
        echo json_encode(['status' => false, 'message' => 'Password baru minimal 6 karakter']);
        exit;
    }

    $users = load_users();
    $found = false;
    foreach ($users as &$u) {
        if ($u['username'] === $user['username']) {
            $decrypted = decrypt_password($u['password']);
            if ($decrypted !== $old_pass) {
                echo json_encode(['status' => false, 'message' => 'Password lama salah']);
                exit;
            }
            $u['password'] = encrypt_password($new_pass);
            $found = true;
            break;
        }
    }
    if ($found) {
        save_users($users);
        echo json_encode(['status' => true, 'message' => 'Password berhasil diubah']);
    } else {
        echo json_encode(['status' => false, 'message' => 'User tidak ditemukan']);
    }
    exit;
}

if ($action === 'get_history') {
    $history = load_user_history($user['username']);
    echo json_encode(['status' => true, 'data' => $history]);
    exit;
}

echo json_encode(['status' => false, 'message' => 'Action tidak dikenali']);
?>