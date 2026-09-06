<?php
/**
 * ============================================================================
 *  TESTRXBOX TOOLS — API PENDAMPING (dt17tools) v4.0
 * ----------------------------------------------------------------------------
 *  Perubahan dari versi sebelumnya:
 *   + action "get_prompt"   : menyajikan testrx_prompt.json ke tombol "Salin Prompt"
 *   + action "diagnostic"   : data untuk panel 🩺 Diagnostik di alat
 *   + action "ping"         : cek cepat bahwa API hidup
 *   + SALINAN PENGAMAN OTOMATIS: setiap penimpaan file (upload_public,
 *     upload_custom, upload_debug) menyimpan versi lama ke testrxbackup/auto/
 *   + Anti directory-traversal yang sesungguhnya (normalisasi path + cek prefix),
 *     menggantikan str_replace('..','') yang bisa ditembus "....//".
 *   + Keluaran dijamin SELALU JSON valid (output buffer + display_errors off).
 *   + Proteksi folder backup (.htaccess + index.html kosong).
 *   + Kunci akses OPSIONAL: bila ada file "testrx_api.key" di folder ini,
 *     setiap permintaan wajib menyertakan parameter key=<isi file>.
 *   + Semua action lama tetap dipertahankan (kompatibel mundur).
 * ============================================================================
 */

header('Content-Type: application/json; charset=utf-8');
header('X-Testrx-Api: 4.0');
header('X-Content-Type-Options: nosniff');

/* Pastikan tidak ada teks liar (notice/warning/BOM) yang merusak JSON */
error_reporting(E_ALL);
ini_set('display_errors', '0');
while (ob_get_level() > 0) { ob_end_clean(); }
ob_start();

$base_dir   = realpath(__DIR__); if ($base_dir === false) { $base_dir = __DIR__; } $base_dir = rtrim(str_replace('\\', '/', $base_dir), '/');
$backup_dir = $base_dir . '/testrxbackup';
$auto_dir   = $backup_dir . '/auto';
$api_version = '4.0';

/* ------------------------------------------------------------------ UTILITAS */

function tx_ensure_dir($dir) {
    if (is_dir($dir)) return true;
    return @mkdir($dir, 0777, true);
}

/** Cegah folder backup diakses langsung lewat web (best effort). */
function tx_protect_dir($dir) {
    if (!is_dir($dir)) return;
    $ht = $dir . '/.htaccess';
    if (!file_exists($ht)) {
        $body = "# TestrxBox Tools — blokir akses web langsung ke folder backup\n"
              . "<IfModule mod_authz_core.c>\n  Require all denied\n</IfModule>\n"
              . "<IfModule !mod_authz_core.c>\n  Order allow,deny\n  Deny from all\n</IfModule>\n"
              . "Options -Indexes\n";
        @file_put_contents($ht, $body);
    }
    $idx = $dir . '/index.html';
    if (!file_exists($idx)) @file_put_contents($idx, '');
}

/**
 * Normalisasi path relatif dan pastikan tetap di dalam $base.
 * Mengembalikan path absolut yang aman, atau false bila mencoba keluar folder.
 */
function tx_safe_path($base, $rel) {
    $rel = str_replace('\\', '/', (string)$rel);
    $rel = str_replace(array("\0", '~'), '', $rel);
    $rel = ltrim($rel, '/');

    $real_base = realpath($base);
    if ($real_base === false) return false;
    $real_base = rtrim(str_replace('\\', '/', $real_base), '/');

    $parts = array();
    foreach (explode('/', $real_base . '/' . $rel) as $seg) {
        if ($seg === '' || $seg === '.') continue;
        if ($seg === '..') { array_pop($parts); continue; }
        $parts[] = $seg;
    }
    $norm = '/' . implode('/', $parts);

    if (strpos($norm, $real_base) !== 0) return false;
    $tail = substr($norm, strlen($real_base));
    if ($tail !== '' && $tail[0] !== '/') return false;
    return $norm;
}

/** Keluarkan JSON lalu hentikan (buang sisa buffer agar tidak mengotori). */
function tx_json($payload) {
    while (ob_get_level() > 0) { ob_end_clean(); }
    echo json_encode($payload, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    exit;
}

function tx_err($msg) { tx_json(array('status' => 'error', 'msg' => $msg)); }
function tx_ok($msg, $extra = array()) { tx_json(array_merge(array('status' => 'success', 'msg' => $msg), $extra)); }

function tx_input($key, $default = '') {
    if (isset($_POST[$key])) return $_POST[$key];
    if (isset($_GET[$key]))  return $_GET[$key];
    return $default;
}

/**
 * Simpan salinan pengaman file yang akan ditimpa.
 * Mengembalikan nama file backup (string) atau null.
 */
function tx_auto_backup($filepath, $auto_dir, $keep = 20) {
    if (!is_file($filepath)) return null;
    if (!tx_ensure_dir($auto_dir)) return null;

    $name = pathinfo($filepath, PATHINFO_FILENAME);
    $ext  = pathinfo($filepath, PATHINFO_EXTENSION);
    $stamp = date('Ymd-His');
    $dest = $auto_dir . '/' . $name . '.' . $stamp . ($ext !== '' ? '.' . $ext : '');
    $n = 1;
    while (file_exists($dest)) {
        $dest = $auto_dir . '/' . $name . '.' . $stamp . '-' . $n . ($ext !== '' ? '.' . $ext : '');
        $n++;
        if ($n > 50) break;
    }
    if (!@copy($filepath, $dest)) return null;

    /* pangkas: simpan $keep salinan terbaru per nama file */
    $pattern = $auto_dir . '/' . $name . '.*' . ($ext !== '' ? '.' . $ext : '');
    $list = glob($pattern);
    if (is_array($list) && count($list) > $keep) {
        usort($list, function ($a, $b) { return filemtime($b) - filemtime($a); });
        foreach (array_slice($list, $keep) as $old) @unlink($old);
    }
    return basename($dest);
}

/* --------------------------------------------- PENJAGA UKURAN POST (ANTI KOSONG) */
if (isset($_SERVER['REQUEST_METHOD']) && strtoupper($_SERVER['REQUEST_METHOD']) === 'POST') {
    $clen = isset($_SERVER['CONTENT_LENGTH']) ? (int)$_SERVER['CONTENT_LENGTH'] : 0;
    if ($clen > 0 && count($_POST) === 0) {
        header('HTTP/1.1 413 Payload Too Large');
        tx_err('Data POST tidak terbaca (kosong) padahal kiriman berukuran ' . $clen . ' byte. '
             . 'Kemungkinan melebihi post_max_size=' . ini_get('post_max_size') . ' atau upload_max_filesize='
             . ini_get('upload_max_filesize') . '. TIDAK ADA file yang ditimpa.');
    }
}

/** Tolak penimpaan file berisi data dengan konten kosong (kecuali disetujui tegas). */
function tx_guard_empty($filepath, $content) {
    if ($content !== '' && $content !== null) return;
    if (is_file($filepath) && filesize($filepath) > 0 && tx_input('allow_empty', '') !== '1') {
        tx_err('Konten yang dikirim KOSONG padahal file tujuan berisi ' . filesize($filepath)
             . ' byte. Penimpaan dibatalkan demi keamanan. (Kirim allow_empty=1 bila memang ingin mengosongkan file.)');
    }
}

/* ------------------------------------------------------- PERSIAPAN DIREKTORI */
tx_ensure_dir($backup_dir);
tx_ensure_dir($auto_dir);
tx_protect_dir($backup_dir);

/* ------------------------------------------------------- KUNCI AKSES OPSIONAL */
$key_file = $base_dir . '/testrx_api.key';
if (is_file($key_file)) {
    $expected = trim((string)file_get_contents($key_file));
    $given = trim((string)tx_input('key', ''));
    if ($expected !== '' && !hash_equals($expected, $given)) {
        header('HTTP/1.1 403 Forbidden');
        tx_err('Akses ditolak: parameter "key" tidak cocok dengan isi testrx_api.key.');
    }
}

/* -------------------------------------------------------------------- AKSI */
$action = tx_input('action', '');

switch ($action) {

    /* ====== BARU: sajikan file prompt JSON untuk tombol "Salin Prompt" ====== */
    case 'get_prompt':
        $name = basename((string)tx_input('file', 'testrx_prompt.json'));
        if ($name === '' || strtolower(substr($name, -5)) !== '.json') $name = 'testrx_prompt.json';
        $path = tx_safe_path($base_dir, $name);
        if (!$path || !is_file($path)) {
            tx_err('File prompt tidak ditemukan di server: ' . $name . '. Letakkan file itu satu folder dengan testrx_api.php.');
        }
        $raw = file_get_contents($path);
        $data = json_decode($raw, true);
        if (!is_array($data)) tx_err('File ' . $name . ' ada tetapi isinya bukan JSON valid.');
        tx_json(array('status' => 'success', 'file' => $name, 'size' => strlen($raw), 'data' => $data));
        break;

    /* ====== BARU: data diagnostik untuk panel 🩺 di alat ====== */
    case 'diagnostic':
        $watch = array('index.html', 'index.php', 'paneladmin.html', 'paneladmin.php',
                       'testrx.php', 'testrx.html', 'testrx_prompt.json', 'debug.php', 'debug2.php');
        $files = array();
        foreach ($watch as $f) {
            $p = tx_safe_path($base_dir, $f);
            if ($p && is_file($p)) $files[$f] = filesize($p);
        }
        $backups = glob($backup_dir . '/*');
        $backups = is_array($backups) ? array_filter($backups, 'is_file') : array();
        $autos = glob($auto_dir . '/*');
        $autos = is_array($autos) ? array_filter($autos, 'is_file') : array();

        $https = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
              || (isset($_SERVER['SERVER_PORT']) && (int)$_SERVER['SERVER_PORT'] === 443)
              || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https');

        tx_json(array(
            'status' => 'success',
            'data' => array(
                'api_version'       => $api_version,
                'php_version'       => PHP_VERSION,
                'base_dir'          => $base_dir,
                'writable'          => is_writable($base_dir),
                'backup_ok'         => is_dir($backup_dir) && is_writable($backup_dir),
                'backup_count'      => count($backups),
                'auto_backup_count' => count($autos),
                'post_max_size'     => ini_get('post_max_size'),
                'upload_max_size'   => ini_get('upload_max_filesize'),
                'memory_limit'      => ini_get('memory_limit'),
                'server_software'   => isset($_SERVER['SERVER_SOFTWARE']) ? $_SERVER['SERVER_SOFTWARE'] : '',
                'https'             => (bool)$https,
                'key_protection'    => is_file($key_file),
                'prompt_file'       => is_file($base_dir . '/testrx_prompt.json'),
                'files'             => $files
            )
        ));
        break;

    /* ====== BARU: cek hidup ====== */
    case 'ping':
        tx_json(array('status' => 'success', 'msg' => 'API TestrxBox hidup', 'api' => $api_version, 'php' => PHP_VERSION));
        break;

    /* ====== simpan file debug ====== */
    case 'upload_debug':
        $type    = tx_input('type', 'index');
        $content = tx_input('content', '');
        $filename = ($type === 'panel') ? 'debug2.php' : 'debug.php';
        $filepath = tx_safe_path($base_dir, $filename);
        if (!$filepath) tx_err('Nama file tidak diizinkan.');
        tx_guard_empty($filepath, $content);
        $bak = tx_auto_backup($filepath, $auto_dir);
        if (file_put_contents($filepath, $content) !== false) {
            tx_ok("File $filename berhasil disimpan ke server.", array('file' => $filename, 'backup' => $bak));
        }
        tx_err("Gagal menyimpan $filename. Periksa izin folder (CHMOD 755/775).");
        break;

    /* ====== timpa index / paneladmin publik ====== */
    case 'upload_public':
        $type    = tx_input('type', 'index');
        $ext     = tx_input('ext', '.php');
        $content = tx_input('content', '');
        if (!in_array($type, array('index', 'paneladmin'), true)) tx_err('Tipe file tidak diizinkan.');
        $ext = strtolower($ext);
        if (!in_array($ext, array('.php', '.html'), true)) tx_err('Ekstensi tidak diizinkan untuk upload publik (.php/.html).');

        $filename = $type . $ext;
        $filepath = tx_safe_path($base_dir, $filename);
        if (!$filepath) tx_err('Path tidak valid.');
        if (!is_writable($base_dir) && !is_file($filepath)) tx_err('Folder server tidak dapat ditulis (CHMOD).');

        tx_guard_empty($filepath, $content);
        $bak = tx_auto_backup($filepath, $auto_dir);
        if (file_put_contents($filepath, $content) !== false) {
            tx_ok("File '$filename' berhasil ditimpa di public_html!", array(
                'file' => $filename, 'size' => strlen($content), 'backup' => $bak
            ));
        }
        tx_err("Gagal menyimpan '$filename'. Periksa izin folder.");
        break;

    /* ====== backup manual ====== */
    case 'backup':
        $filename = preg_replace('/[^a-zA-Z0-9_.-]/', '_', (string)tx_input('filename', 'backup_baru'));
        $ext      = strtolower((string)tx_input('ext', '.html'));
        $content  = tx_input('content', '');
        if (!in_array($ext, array('.php', '.html', '.js', '.css', '.txt', '.json'), true)) $ext = '.html';
        $filename = trim($filename, '.');
        if ($filename === '') $filename = 'backup_' . date('Ymd-His');
        if (!tx_ensure_dir($backup_dir)) tx_err('Gagal menyiapkan folder backup.');
        $fullpath = $backup_dir . '/' . $filename . $ext;
        if (file_put_contents($fullpath, $content) !== false) {
            tx_ok("Backup '$filename$ext' berhasil disimpan!", array('file' => $filename . $ext, 'size' => strlen($content)));
        }
        tx_err('Gagal menyimpan backup. Periksa izin folder testrxbackup/.');
        break;

    /* ====== daftar backup ====== */
    case 'list_backups':
        $files = array();
        $list = glob($backup_dir . '/*');
        if (is_array($list)) {
            foreach ($list as $file) {
                if (!is_file($file)) continue;
                if (basename($file) === '.htaccess') continue;                     /* file proteksi */
                if (basename($file) === 'index.html' && filesize($file) === 0) continue; /* file proteksi kosong */
                $files[] = array(
                    'name' => basename($file),
                    'time' => filemtime($file),
                    'date' => date('Y-m-d H:i:s', filemtime($file)),
                    'size' => round(filesize($file) / 1024, 2)
                );
            }
        }
        usort($files, function ($a, $b) { return $b['time'] - $a['time']; });
        tx_json(array('status' => 'success', 'data' => $files, 'count' => count($files)));
        break;

    /* ====== daftar salinan pengaman otomatis ====== */
    case 'list_auto_backups':
        $files = array();
        $list = glob($auto_dir . '/*');
        if (is_array($list)) {
            foreach ($list as $file) {
                if (!is_file($file)) continue;
                $files[] = array(
                    'name' => basename($file),
                    'date' => date('Y-m-d H:i:s', filemtime($file)),
                    'size' => round(filesize($file) / 1024, 2)
                );
            }
        }
        usort($files, function ($a, $b) { return strcmp($b['name'], $a['name']); });
        tx_json(array('status' => 'success', 'data' => $files, 'count' => count($files)));
        break;

    /* ====== ambil isi backup ====== */
    case 'get_backup':
        $filename = tx_input('filename', '');
        $filepath = tx_safe_path($backup_dir, $filename);
        if (!$filepath || !is_file($filepath)) tx_err('File backup tidak ditemukan.');
        tx_json(array('status' => 'success', 'content' => file_get_contents($filepath), 'name' => basename($filepath)));
        break;

    /* ====== hapus backup ====== */
    case 'delete_backup':
        $filename = tx_input('filename', '');
        $filepath = tx_safe_path($backup_dir, $filename);
        if (!$filepath || !is_file($filepath)) tx_err('File backup tidak ditemukan.');
        if (@unlink($filepath)) tx_ok("File '" . basename($filepath) . "' berhasil dihapus.");
        tx_err("Gagal menghapus '" . basename($filepath) . "'. Periksa izin file.");
        break;

    /* ====== daftar file server ====== */
    case 'list_server_files':
        $path = tx_input('path', '');
        $target_dir = tx_safe_path($base_dir, $path);
        if (!$target_dir) tx_err('Path tidak diizinkan.');
        $items = array();
        $allowed_ext = array('php', 'html', 'htm', 'js', 'css', 'txt', 'json', 'md', 'xml', 'log', 'csv');
        if (is_dir($target_dir)) {
            foreach (scandir($target_dir) as $file) {
                if ($file === '.' || $file === '..') continue;
                if ($file === 'testrx_api.key') continue;              /* jangan bocorkan kunci */
                $filepath = $target_dir . '/' . $file;
                $rel_path = ltrim(str_replace($base_dir, '', $filepath), '/');
                if (is_dir($filepath)) {
                    $items[] = array('type' => 'dir', 'name' => $file, 'path' => $rel_path);
                } else {
                    $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                    if (in_array($ext, $allowed_ext, true)) {
                        $items[] = array(
                            'type' => 'file',
                            'name' => $file,
                            'path' => $rel_path,
                            'size' => round(filesize($filepath) / 1024, 2),
                            'date' => date('Y-m-d H:i', filemtime($filepath))
                        );
                    }
                }
            }
        }
        tx_json(array('status' => 'success', 'data' => $items, 'path' => $path));
        break;

    /* ====== baca isi file server ====== */
    case 'get_server_file':
        $filename = tx_input('filename', '');
        $filepath = tx_safe_path($base_dir, $filename);
        if (!$filepath || !is_file($filepath)) tx_err('File tidak ditemukan di server.');
        tx_json(array(
            'status'  => 'success',
            'content' => file_get_contents($filepath),
            'name'    => basename($filepath),
            'size'    => filesize($filepath),
            'mtime'   => date('Y-m-d H:i:s', filemtime($filepath))
        ));
        break;

    /* ====== unduh file server ====== */
    case 'download_server_file':
        $filename = tx_input('file', '');
        $filepath = tx_safe_path($base_dir, $filename);
        if ($filepath && is_file($filepath)) {
            while (ob_get_level() > 0) { ob_end_clean(); }
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . basename($filepath) . '"');
            header('Content-Length: ' . filesize($filepath));
            header('X-Content-Type-Options: nosniff');
            readfile($filepath);
            exit;
        }
        while (ob_get_level() > 0) { ob_end_clean(); }
        header('HTTP/1.1 404 Not Found');
        echo 'File tidak ditemukan.';
        exit;

    /* ====== buat folder ====== */
    case 'create_folder':
        $path = tx_input('path', '');
        $foldername = preg_replace('/[^a-zA-Z0-9_.-]/', '_', (string)tx_input('foldername', ''));
        $foldername = trim($foldername, '.');
        if ($foldername === '') tx_err('Nama folder tidak boleh kosong.');
        $target_dir = tx_safe_path($base_dir, $path);
        if (!$target_dir) tx_err('Path tidak diizinkan.');
        $new_folder_path = tx_safe_path($base_dir, ltrim(str_replace($base_dir, '', $target_dir), '/') . '/' . $foldername);
        if (!$new_folder_path) tx_err('Nama folder tidak diizinkan.');
        if (file_exists($new_folder_path)) tx_err("Folder '$foldername' sudah ada.");
        if (@mkdir($new_folder_path, 0777, true)) tx_ok("Folder '$foldername' berhasil dibuat!");
        tx_err("Gagal membuat folder '$foldername'. Periksa izin direktori.");
        break;

    /* ====== upload / timpa file di folder tertentu ====== */
    case 'upload_custom':
        $path     = tx_input('path', '');
        $filename = preg_replace('/[^a-zA-Z0-9_.-]/', '_', (string)tx_input('filename', 'file_baru'));
        $filename = trim($filename, '.');
        $ext      = strtolower((string)tx_input('ext', '.php'));
        $content  = tx_input('content', '');
        if ($filename === '') tx_err('Nama file tidak boleh kosong.');
        if (!in_array($ext, array('.php', '.html', '.htm', '.js', '.css', '.txt', '.json', '.md', '.xml', '.csv', ''), true)) {
            tx_err('Ekstensi file tidak diizinkan: ' . $ext);
        }
        $target_dir = tx_safe_path($base_dir, $path);
        if (!$target_dir) tx_err('Path tidak diizinkan.');
        if (!is_dir($target_dir) && !@mkdir($target_dir, 0777, true)) tx_err('Gagal membuat folder tujuan.');

        $rel = ltrim(str_replace($base_dir, '', $target_dir), '/');
        $filepath = tx_safe_path($base_dir, ($rel !== '' ? $rel . '/' : '') . $filename . $ext);
        if (!$filepath) tx_err('Path tujuan tidak diizinkan.');

        tx_guard_empty($filepath, $content);
        $bak = tx_auto_backup($filepath, $auto_dir);
        if (file_put_contents($filepath, $content) !== false) {
            tx_ok('File berhasil diupload & ditimpa!', array(
                'file'   => ltrim(str_replace($base_dir, '', $filepath), '/'),
                'size'   => strlen($content),
                'backup' => $bak
            ));
        }
        tx_err('Gagal mengupload file. Periksa izin direktori (CHMOD).');
        break;

    default:
        tx_json(array(
            'status'  => 'error',
            'msg'     => 'Aksi API tidak valid.',
            'api'     => $api_version,
            'actions' => array('get_prompt', 'diagnostic', 'ping', 'upload_debug', 'upload_public', 'backup',
                               'list_backups', 'list_auto_backups', 'get_backup', 'delete_backup',
                               'list_server_files', 'get_server_file', 'download_server_file',
                               'create_folder', 'upload_custom')
        ));
}
