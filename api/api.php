<?php
/**
 * =====================================================================
 *  BekasiAC Image API — Jembatan penyimpanan gambar di hosting
 * ---------------------------------------------------------------------
 *  Lokasi file  : public_html/api/api.php
 *  Lokasi gambar: public_html/image/
 *
 *  Semua upload / hapus / ganti gambar (katalog, galeri, testimoni)
 *  WAJIB lewat file ini. Jangan lagi pakai upload.php lama.
 *
 *  Cara pakai (contoh):
 *   - Upload : POST FormData { file: <blob>, key: API_KEY? } ke api/api.php?action=upload
 *   - List   : GET api/api.php?action=list
 *   - Hapus  : POST { action:'delete', filename:'xxx.jpg' } atau { url:'...' }
 *   - Ganti  : POST FormData { action:'replace', old:'xxx.jpg', file:<blob> }
 *   - Ping   : GET api/api.php?action=ping
 *
 *  Response selalu JSON: { status:'success'|'error', message, ... }
 * =====================================================================
 */

// ---------- KONFIGURASI ----------
$API_KEY        = '';                 // Kosongkan = tanpa kunci (paling mudah). Isi mis. 'BEKASIAC-RAHASIA-123' untuk proteksi.
$MAX_SIZE       = 5 * 1024 * 1024;    // 5 MB
$ALLOWED_EXT    = ['jpg','jpeg','png','webp','gif'];
$ALLOWED_MIME   = ['image/jpeg','image/png','image/webp','image/gif'];
$IMAGE_DIR_NAME = 'image';            // folder di public_html/image

// ---------- HEADER & CORS ----------
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, X-API-Key, X-Requested-With');
header('X-Content-Type-Options: nosniff');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    echo json_encode(['status' => 'success', 'message' => 'OK']);
    exit;
}

// ---------- HELPER ----------
function api_response($status, $message, $extra = [], $code = 200) {
    http_response_code($code);
    echo json_encode(array_merge(['status' => $status, 'message' => $message], $extra), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    exit;
}

function api_base_url($imageDirName) {
    $scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
    // Dukung reverse-proxy / hosting dengan forwarded proto
    if (!empty($_SERVER['HTTP_X_FORWARDED_PROTO'])) {
        $scheme = explode(',', $_SERVER['HTTP_X_FORWARDED_PROTO'])[0];
        $scheme = trim($scheme);
    }
    $host = $_SERVER['HTTP_HOST'] ?? 'localhost';
    // /api/api.php  ->  base = '' (docroot) ;  /sub/api/api.php -> base = '/sub'
    $scriptDir = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? '/api/api.php')); // e.g. /api
    $base = str_replace('\\', '/', dirname($scriptDir));                                      // e.g. /
    if ($base === '/' || $base === '.' || $base === '\\') $base = '';
    $base = rtrim($base, '/');
    return $scheme . '://' . $host . $base . '/' . trim($imageDirName, '/');
}

function api_check_key($requiredKey) {
    if ($requiredKey === '' || $requiredKey === null) return true; // proteksi mati
    $given = '';
    if (isset($_GET['key'])) $given = trim((string)$_GET['key']);
    elseif (isset($_POST['key'])) $given = trim((string)$_POST['key']);
    else {
        // Header X-API-Key
        $headers = [];
        if (function_exists('getallheaders')) {
            $headers = getallheaders();
            foreach ($headers as $k => $v) {
                if (strtolower($k) === 'x-api-key') { $given = trim((string)$v); break; }
            }
        } elseif (isset($_SERVER['HTTP_X_API_KEY'])) {
            $given = trim((string)$_SERVER['HTTP_X_API_KEY']);
        }
        // JSON body { key: ... }
        if ($given === '') {
            $raw = file_get_contents('php://input');
            if ($raw) {
                $j = json_decode($raw, true);
                if (is_array($j) && isset($j['key'])) $given = trim((string)$j['key']);
            }
        }
    }
    return hash_equals((string)$requiredKey, (string)$given);
}

function api_json_input() {
    $raw = file_get_contents('php://input');
    if (!$raw) return [];
    $j = json_decode($raw, true);
    return is_array($j) ? $j : [];
}

function api_safe_basename($nameOrUrl) {
    $nameOrUrl = trim((string)$nameOrUrl);
    if ($nameOrUrl === '') return '';
    // Jika URL, ambil path-nya saja
    if (strpos($nameOrUrl, '://') !== false || strpos($nameOrUrl, '%') !== false) {
        $parts = parse_url($nameOrUrl);
        $path = isset($parts['path']) ? $parts['path'] : $nameOrUrl;
        $nameOrUrl = $path;
    }
    // Cegah directory traversal
    $base = basename(str_replace('\\', '/', $nameOrUrl));
    // Hanya izinkan karakter aman
    $base = preg_replace('/[^A-Za-z0-9._-]/', '', $base);
    return $base;
}

// ---------- SIAPKAN FOLDER IMAGE ----------
$IMAGE_DIR = realpath(__DIR__ . '/../' . $IMAGE_DIR_NAME);
if ($IMAGE_DIR === false) {
    $candidate = __DIR__ . '/../' . $IMAGE_DIR_NAME;
    if (!is_dir($candidate)) {
        @mkdir($candidate, 0755, true);
    }
    $IMAGE_DIR = realpath($candidate);
}
if ($IMAGE_DIR === false || !is_dir($IMAGE_DIR)) {
    api_response('error', 'Folder image/ tidak ditemukan dan gagal dibuat. Buat manual: public_html/image/ (chmod 755).', [], 500);
}
if (!is_writable($IMAGE_DIR)) {
    @chmod($IMAGE_DIR, 0755);
}

// Proteksi: pastikan tidak ada eksekusi PHP di folder image
$htaccessPath = $IMAGE_DIR . '/.htaccess';
if (!file_exists($htaccessPath)) {
    @file_put_contents($htaccessPath, "Options -ExecCGI\nRemoveHandler .php .phtml .php3 .php4 .php5\n<FilesMatch \"\\.(php|phtml|phar|cgi|pl)$\">\n  Require all denied\n</FilesMatch>\n");
}
$indexHtml = $IMAGE_DIR . '/index.html';
if (!file_exists($indexHtml)) {
    @file_put_contents($indexHtml, '<!doctype html><title>403</title><h1>Forbidden</h1>');
}

$BASE_IMAGE_URL = api_base_url($IMAGE_DIR_NAME);

// ---------- ROUTING ----------
$action = '';
if (isset($_GET['action'])) $action = strtolower(trim((string)$_GET['action']));
elseif (isset($_POST['action'])) $action = strtolower(trim((string)$_POST['action']));
else {
    $j = api_json_input();
    if (isset($j['action'])) $action = strtolower(trim((string)$j['action']));
}
if ($action === '') $action = 'ping';

// Cek API key (jika diaktifkan)
if (!api_check_key($API_KEY)) {
    api_response('error', 'API key salah atau hilang.', [], 401);
}

// ================= PING / INFO =================
if ($action === 'ping' || $action === 'info') {
    $count = 0; $bytes = 0;
    foreach (glob($IMAGE_DIR . '/*') as $f) {
        if (is_file($f)) { $count++; $bytes += filesize($f); }
    }
    api_response('success', 'BekasiAC Image API aktif.', [
        'base_url'  => $BASE_IMAGE_URL,
        'dir'       => $IMAGE_DIR_NAME . '/',
        'files'     => $count,
        'bytes'     => $bytes,
        'max_size'  => $MAX_SIZE,
        'allowed'   => $ALLOWED_EXT,
        'time'      => date('c'),
    ]);
}

// ================= LIST =================
if ($action === 'list') {
    $files = [];
    $items = glob($IMAGE_DIR . '/*');
    if ($items) {
        foreach ($items as $f) {
            if (!is_file($f)) continue;
            $name = basename($f);
            if ($name === '.htaccess' || $name === 'index.html') continue;
            $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
            if (!in_array($ext, $ALLOWED_EXT, true)) continue;
            $files[] = [
                'name'  => $name,
                'url'   => $BASE_IMAGE_URL . '/' . rawurlencode($name),
                'size'  => filesize($f),
                'mtime' => filemtime($f),
            ];
        }
        usort($files, function($a, $b){ return $b['mtime'] - $a['mtime']; });
    }
    $limit  = isset($_GET['limit']) ? max(1, min(500, (int)$_GET['limit'])) : 200;
    $offset = isset($_GET['offset']) ? max(0, (int)$_GET['offset']) : 0;
    $total  = count($files);
    $files  = array_slice($files, $offset, $limit);
    api_response('success', 'Daftar gambar.', [
        'base_url' => $BASE_IMAGE_URL,
        'total'    => $total,
        'count'    => count($files),
        'files'    => $files,
    ]);
}

// ================= UPLOAD =================
if ($action === 'upload') {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        api_response('error', 'Gunakan metode POST untuk upload.', [], 405);
    }
    // Dukung beberapa nama field: file | image | foto | gambar
    $file = null;
    foreach (['file','image','foto','gambar'] as $k) {
        if (isset($_FILES[$k]) && is_array($_FILES[$k]) && ($_FILES[$k]['error'] !== UPLOAD_ERR_NO_FILE)) { $file = $_FILES[$k]; break; }
    }
    // Dukung base64 JSON: { file_base64, filename }
    $isBase64 = false; $base64Data = ''; $base64Name = '';
    if ($file === null) {
        $j = api_json_input();
        if (!empty($j['file_base64'])) {
            $isBase64 = true;
            $base64Data = (string)$j['file_base64'];
            $base64Name = isset($j['filename']) ? (string)$j['filename'] : 'upload.png';
            // data:image/png;base64,xxxx -> ambil sesudah koma
            if (strpos($base64Data, ',') !== false) {
                $parts = explode(',', $base64Data, 2);
                $base64Data = $parts[1];
            }
        }
    }
    if ($file === null && !$isBase64) {
        api_response('error', 'Tidak ada file. Kirim FormData dengan field "file".', [], 400);
    }

    if ($isBase64) {
        $bin = base64_decode($base64Data, true);
        if ($bin === false || strlen($bin) === 0) api_response('error', 'Data base64 tidak valid.', [], 400);
        if (strlen($bin) > $MAX_SIZE) api_response('error', 'Ukuran file melebihi 5MB.', [], 400);
        $ext = strtolower(pathinfo($base64Name, PATHINFO_EXTENSION));
        if ($ext === '' || !in_array($ext, $ALLOWED_EXT, true)) {
            // Tebak dari magic bytes
            $info = @getimagesizefromstring($bin);
            $mime = $info ? ($info['mime'] ?? '') : '';
            if ($mime === 'image/jpeg') $ext = 'jpg';
            elseif ($mime === 'image/png') $ext = 'png';
            elseif ($mime === 'image/webp') $ext = 'webp';
            elseif ($mime === 'image/gif') $ext = 'gif';
            else api_response('error', 'Format gambar tidak didukung. Gunakan JPG/PNG/WEBP/GIF.', [], 400);
        }
        $fname = 'bekasiac_' . date('Ymd_His') . '_' . bin2hex(random_bytes(4)) . '.' . $ext;
        $dest  = $IMAGE_DIR . '/' . $fname;
        if (@file_put_contents($dest, $bin) === false) api_response('error', 'Gagal menyimpan file ke image/.', [], 500);
        @chmod($dest, 0644);
        $url = $BASE_IMAGE_URL . '/' . rawurlencode($fname);
        api_response('success', 'Upload berhasil.', ['url' => $url, 'filename' => $fname, 'name' => $fname, 'size' => filesize($dest)]);
    }

    // --- Upload normal (multipart) ---
    if ($file['error'] !== UPLOAD_ERR_OK) {
        $msg = 'Upload gagal.';
        if ($file['error'] === UPLOAD_ERR_INI_SIZE || $file['error'] === UPLOAD_ERR_FORM_SIZE) $msg = 'Ukuran file melebihi batas server (maks 5MB).';
        api_response('error', $msg . ' (code ' . (int)$file['error'] . ')', [], 400);
    }
    if ($file['size'] > $MAX_SIZE) api_response('error', 'Ukuran file melebihi 5MB.', [], 400);
    if ($file['size'] <= 0) api_response('error', 'File kosong.', [], 400);

    $origName = (string)$file['name'];
    $ext = strtolower(pathinfo($origName, PATHINFO_EXTENSION));
    if (!in_array($ext, $ALLOWED_EXT, true)) {
        api_response('error', 'Format .' . ($ext ?: '?') . ' tidak diizinkan. Gunakan JPG/PNG/WEBP/GIF.', [], 400);
    }
    // Validasi MIME asli
    $imgInfo = @getimagesize($file['tmp_name']);
    if ($imgInfo === false) api_response('error', 'File bukan gambar yang valid.', [], 400);
    $mime = $imgInfo['mime'] ?? '';
    if (!in_array($mime, $ALLOWED_MIME, true)) api_response('error', 'Tipe MIME tidak diizinkan: ' . $mime, [], 400);
    // Samakan ekstensi dengan MIME agar konsisten
    if ($mime === 'image/jpeg' && ($ext === 'jpeg')) $ext = 'jpg';

    $prefix = isset($_POST['prefix']) ? preg_replace('/[^A-Za-z0-9_-]/', '', (string)$_POST['prefix']) : 'bekasiac';
    if ($prefix === '') $prefix = 'bekasiac';
    $fname = $prefix . '_' . date('Ymd_His') . '_' . bin2hex(random_bytes(4)) . '.' . $ext;
    $dest  = $IMAGE_DIR . '/' . $fname;

    if (!@move_uploaded_file($file['tmp_name'], $dest)) {
        // Fallback untuk environment tertentu
        if (!@copy($file['tmp_name'], $dest)) {
            api_response('error', 'Gagal menyimpan file ke image/. Periksa permission folder (755).', [], 500);
        }
    }
    @chmod($dest, 0644);
    $url = $BASE_IMAGE_URL . '/' . rawurlencode($fname);
    api_response('success', 'Upload berhasil.', [
        'url' => $url, 'filename' => $fname, 'name' => $fname,
        'size' => filesize($dest), 'mime' => $mime,
        // Kompatibilitas dengan kode lama (upload.php):
        // kode lama membaca result.url — tetap kami sediakan.
    ]);
}

// ================= DELETE =================
if ($action === 'delete' || $action === 'hapus') {
    $j = api_json_input();
    $target = '';
    if (isset($_POST['filename'])) $target = (string)$_POST['filename'];
    elseif (isset($_POST['file'])) $target = (string)$_POST['file'];
    elseif (isset($_POST['url'])) $target = (string)$_POST['url'];
    elseif (isset($_POST['name'])) $target = (string)$_POST['name'];
    elseif (isset($_GET['filename'])) $target = (string)$_GET['filename'];
    elseif (isset($_GET['url'])) $target = (string)$_GET['url'];
    elseif (isset($j['filename'])) $target = (string)$j['filename'];
    elseif (isset($j['file'])) $target = (string)$j['file'];
    elseif (isset($j['url'])) $target = (string)$j['url'];
    elseif (isset($j['name'])) $target = (string)$j['name'];

    $base = api_safe_basename($target);
    if ($base === '') api_response('error', 'Parameter filename/url wajib diisi.', [], 400);
    $path = $IMAGE_DIR . '/' . $base;
    if (!is_file($path)) api_response('error', 'File tidak ditemukan: ' . $base, [], 404);
    if (@unlink($path)) api_response('success', 'File dihapus.', ['filename' => $base]);
    api_response('error', 'Gagal menghapus file.', [], 500);
}

// ================= REPLACE (ganti) =================
if ($action === 'replace' || $action === 'ganti') {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') api_response('error', 'Gunakan metode POST.', [], 405);
    $oldRaw = '';
    if (isset($_POST['old'])) $oldRaw = (string)$_POST['old'];
    elseif (isset($_POST['old_filename'])) $oldRaw = (string)$_POST['old_filename'];
    elseif (isset($_POST['filename'])) $oldRaw = (string)$_POST['filename'];
    elseif (isset($_POST['url'])) $oldRaw = (string)$_POST['url'];
    else { $j = api_json_input(); if (isset($j['old'])) $oldRaw = (string)$j['old']; }

    $file = null;
    foreach (['file','image','foto','gambar'] as $k) {
        if (isset($_FILES[$k]) && is_array($_FILES[$k]) && ($_FILES[$k]['error'] !== UPLOAD_ERR_NO_FILE)) { $file = $_FILES[$k]; break; }
    }
    if ($file === null) api_response('error', 'File pengganti tidak ditemukan (field "file").', [], 400);
    if ($file['error'] !== UPLOAD_ERR_OK) api_response('error', 'Upload gagal (code ' . (int)$file['error'] . ').', [], 400);
    if ($file['size'] > $MAX_SIZE || $file['size'] <= 0) api_response('error', 'Ukuran file tidak valid (maks 5MB).', [], 400);
    $ext = strtolower(pathinfo((string)$file['name'], PATHINFO_EXTENSION));
    if (!in_array($ext, $ALLOWED_EXT, true)) api_response('error', 'Format tidak diizinkan. Gunakan JPG/PNG/WEBP/GIF.', [], 400);
    $imgInfo = @getimagesize($file['tmp_name']);
    if ($imgInfo === false) api_response('error', 'File bukan gambar valid.', [], 400);

    $fname = 'bekasiac_' . date('Ymd_His') . '_' . bin2hex(random_bytes(4)) . '.' . $ext;
    $dest  = $IMAGE_DIR . '/' . $fname;
    if (!@move_uploaded_file($file['tmp_name'], $dest)) {
        if (!@copy($file['tmp_name'], $dest)) api_response('error', 'Gagal menyimpan file baru.', [], 500);
    }
    @chmod($dest, 0644);

    // Hapus file lama (jika ada & masih di folder image)
    $deletedOld = false;
    $oldBase = api_safe_basename($oldRaw);
    if ($oldBase !== '' && $oldBase !== $fname) {
        $oldPath = $IMAGE_DIR . '/' . $oldBase;
        if (is_file($oldPath)) $deletedOld = @unlink($oldPath);
    }
    $url = $BASE_IMAGE_URL . '/' . rawurlencode($fname);
    api_response('success', 'Gambar berhasil diganti.', [
        'url' => $url, 'filename' => $fname, 'name' => $fname,
        'old_deleted' => $deletedOld,
    ]);
}

// ---------- ACTION TIDAK DIKENAL ----------
api_response('error', 'Action tidak dikenal: ' . $action . '. Gunakan: upload, list, delete, replace, ping.', [], 400);
