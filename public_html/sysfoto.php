<?php
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

$uploadDir = __DIR__ . '/uploads/profiles/';
if (!file_exists($uploadDir)) {
    @mkdir($uploadDir, 0755, true);
}

$rawInput = file_get_contents('php://input');
$jsonInput = json_decode($rawInput, true) ?: [];

$action = $_GET['action'] ?? $_POST['action'] ?? $jsonInput['action'] ?? '';
$uid = $_GET['uid'] ?? $_POST['uid'] ?? $jsonInput['uid'] ?? 'guest';

// Clean uid
$uid = preg_replace('/[^a-zA-Z0-9_\-]/', '', $uid);

if ($action === 'upload') {
    $photoUrl = '';
    
    // Check $_FILES
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $tmpName = $_FILES['photo']['tmp_name'];
        $ext = strtolower(pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION));
        if (!in_array($ext, ['jpg', 'jpeg', 'png', 'webp', 'gif'])) {
            $ext = 'png';
        }
        $fileName = 'profile_' . $uid . '_' . time() . '.' . $ext;
        $targetPath = $uploadDir . $fileName;
        
        if (move_uploaded_file($tmpName, $targetPath)) {
            $photoUrl = 'public_html/uploads/profiles/' . $fileName;
        }
    } 
    // Check base64 input
    else {
        $base64Data = $_POST['photo_data'] ?? $jsonInput['photo_data'] ?? '';
        if ($base64Data) {
            if (preg_match('/^data:image\/(\w+);base64,/', $base64Data, $type)) {
                $base64Data = substr($base64Data, strpos($base64Data, ',') + 1);
                $ext = strtolower($type[1]);
                if ($ext === 'jpeg') $ext = 'jpg';
            } else {
                $ext = 'png';
            }
            $base64Data = base64_decode($base64Data);
            if ($base64Data !== false) {
                $fileName = 'profile_' . $uid . '_' . time() . '.' . $ext;
                $targetPath = $uploadDir . $fileName;
                file_put_contents($targetPath, $base64Data);
                $photoUrl = 'public_html/uploads/profiles/' . $fileName;
            }
        }
    }

    if ($photoUrl) {
        echo json_encode([
            'status' => true,
            'message' => 'Foto profil berhasil disimpan',
            'url' => $photoUrl,
            'photo_url' => $photoUrl
        ]);
    } else {
        echo json_encode([
            'status' => false,
            'message' => 'Gagal mengunggah foto profil'
        ]);
    }
    exit;
}

if ($action === 'delete') {
    $targetFile = $_POST['file'] ?? $jsonInput['file'] ?? '';
    if ($targetFile) {
        $baseName = basename($targetFile);
        $fullPath = $uploadDir . $baseName;
        if (file_exists($fullPath)) {
            @unlink($fullPath);
        }
    } else {
        // Find existing profiles for this uid
        $files = glob($uploadDir . 'profile_' . $uid . '_*');
        if ($files) {
            foreach ($files as $f) {
                @unlink($f);
            }
        }
    }
    echo json_encode([
        'status' => true,
        'message' => 'Foto profil berhasil dihapus'
    ]);
    exit;
}

if ($action === 'get') {
    $files = glob($uploadDir . 'profile_' . $uid . '_*');
    if ($files) {
        usort($files, function($a, $b) { return filemtime($b) - filemtime($a); });
        $latest = basename($files[0]);
        echo json_encode([
            'status' => true,
            'url' => 'public_html/uploads/profiles/' . $latest,
            'photo_url' => 'public_html/uploads/profiles/' . $latest
        ]);
    } else {
        echo json_encode([
            'status' => false,
            'message' => 'Foto profil tidak ditemukan'
        ]);
    }
    exit;
}

echo json_encode([
    'status' => true,
    'service' => 'SysFoto API Bridge',
    'version' => '1.0'
]);
