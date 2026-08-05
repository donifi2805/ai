<?php
require_once 'config.php';
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET');
header('Access-Control-Allow-Headers: Content-Type');

$user = require_login();

$action = $_POST['action'] ?? $_GET['action'] ?? 'get';

if ($action === 'get') {
    $profile = load_user_profile($user['username']);
    echo json_encode([
        'status' => true,
        'data' => $profile
    ]);
    exit;
}

if ($action === 'upload') {
    if (!isset($_FILES['photo'])) {
        echo json_encode(['status' => false, 'message' => 'Tidak ada file foto']);
        exit;
    }

    $file = $_FILES['photo'];
    if ($file['error'] !== UPLOAD_ERR_OK) {
        echo json_encode(['status' => false, 'message' => 'Gagal upload file']);
        exit;
    }

    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    $allowed = ['jpg', 'jpeg', 'png', 'webp'];
    if (!in_array($ext, $allowed)) {
        echo json_encode(['status' => false, 'message' => 'Format harus JPG/PNG/WEBP']);
        exit;
    }

    if ($file['size'] > 2 * 1024 * 1024) { // 2MB
        echo json_encode(['status' => false, 'message' => 'Ukuran maksimal 2MB']);
        exit;
    }

    $filename = 'profile_' . $user['username'] . '_' . time() . '.' . $ext;
    $target = PROFILE_DIR . $filename;

    ensure_dir(PROFILE_DIR);

    if (move_uploaded_file($file['tmp_name'], $target)) {
        $profile = load_user_profile($user['username']);
        $profile['photo'] = $filename;
        $profile['updated'] = date('c');
        save_user_profile($user['username'], $profile);

        echo json_encode([
            'status' => true,
            'message' => 'Foto profil berhasil diupload',
            'photo_url' => BASE_URL . '/data/user/' . $user['username'] . '/profiles/' . $filename
        ]);
    } else {
        echo json_encode(['status' => false, 'message' => 'Gagal menyimpan file']);
    }
    exit;
}

if ($action === 'delete') {
    $profile = load_user_profile($user['username']);
    if ($profile['photo']) {
        $old = PROFILE_DIR . $profile['photo'];
        if (file_exists($old)) unlink($old);
    }
    $profile['photo'] = null;
    $profile['updated'] = date('c');
    save_user_profile($user['username'], $profile);

    echo json_encode(['status' => true, 'message' => 'Foto profil dihapus']);
    exit;
}

echo json_encode(['status' => false, 'message' => 'Action tidak valid']);
?>