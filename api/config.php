<?php
// =============================================
// KONFIGURASI UNIVERSAL PPOB SYSTEM
// Ubah nilai di bawah sesuai kebutuhan Anda
// =============================================

// URL domain utama (ubah saat pindah hosting)
define('BASE_URL', 'https://agen.dt17.store');

// URL API Provider PPOB (jangan ubah kecuali provider ganti)
define('PPOB_API_URL', 'https://dt17.store/h2h/api4.php');

// API KEY Provider (ubah jika provider memberikan key baru)
define('PPOB_API_KEY', 'dt17_e1f063f90349bf69416c598f4c3d9529');

// Direktori data (sesuaikan jika struktur berbeda)
define('DATA_DIR', dirname(__DIR__) . '/data/user/');

// Secret key untuk enkripsi password (WAJIB diubah di produksi!)
define('SECRET_KEY', 'agen_dt17_secret_key_2026_X7kP9mQ2vR');

// IV untuk AES (16 karakter)
define('ENCRYPT_IV', 'dt17agen2026iv12');

// Folder untuk foto profil
define('PROFILE_DIR', DATA_DIR . 'profiles/');

// Session name
define('SESSION_NAME', 'AGEN_PPOB_SESS');

// Default saldo awal user baru
define('DEFAULT_BALANCE', 50000);

// =============================================
// FUNGSI ENKRIPSI & DEKRIPSI (REVERSIBLE)
// =============================================
function encrypt_password($plain) {
    if (empty($plain)) return '';
    $key = hash('sha256', SECRET_KEY, true);
    $iv = ENCRYPT_IV;
    $encrypted = openssl_encrypt($plain, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv);
    return base64_encode($encrypted);
}

function decrypt_password($encrypted) {
    if (empty($encrypted)) return '';
    $key = hash('sha256', SECRET_KEY, true);
    $iv = ENCRYPT_IV;
    $decoded = base64_decode($encrypted);
    return openssl_decrypt($decoded, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv);
}

// =============================================
// FUNGSI HELPER
// =============================================
function ensure_dir($dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }
}

function get_users_file() {
    ensure_dir(DATA_DIR);
    return DATA_DIR . 'users.json';
}

function load_users() {
    $file = get_users_file();
    if (!file_exists($file)) {
        return [];
    }
    $data = json_decode(file_get_contents($file), true);
    return is_array($data) ? $data : [];
}

function save_users($users) {
    $file = get_users_file();
    ensure_dir(dirname($file));
    file_put_contents($file, json_encode($users, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
}

function get_user_dir($username) {
    $dir = DATA_DIR . preg_replace('/[^a-zA-Z0-9_-]/', '', $username) . '/';
    ensure_dir($dir);
    return $dir;
}

function load_user_account($username) {
    $dir = get_user_dir($username);
    $file = $dir . 'account.json';
    if (!file_exists($file)) return null;
    return json_decode(file_get_contents($file), true);
}

function save_user_account($username, $account) {
    $dir = get_user_dir($username);
    file_put_contents($dir . 'account.json', json_encode($account, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
}

function load_user_history($username) {
    $dir = get_user_dir($username);
    $file = $dir . 'history.json';
    if (!file_exists($file)) return [];
    $data = json_decode(file_get_contents($file), true);
    return is_array($data) ? $data : [];
}

function save_user_history($username, $history) {
    $dir = get_user_dir($username);
    file_put_contents($dir . 'history.json', json_encode($history, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
}

function load_user_profile($username) {
    $dir = get_user_dir($username);
    $file = $dir . 'profile.json';
    if (!file_exists($file)) {
        return ['photo' => null, 'updated' => date('c')];
    }
    return json_decode(file_get_contents($file), true);
}

function save_user_profile($username, $profile) {
    $dir = get_user_dir($username);
    file_put_contents($dir . 'profile.json', json_encode($profile, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
}

// =============================================
// FUNGSI API PROVIDER PPOB
// =============================================
function call_ppob_api($payload) {
    $payload['api_key'] = PPOB_API_KEY;
    
    $ch = curl_init(PPOB_API_URL);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'Accept: application/json'
    ]);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    
    if ($httpCode !== 200) {
        return ['status' => false, 'message' => 'Gagal menghubungi server provider (HTTP ' . $httpCode . ')'];
    }
    
    $data = json_decode($response, true);
    if (!$data) {
        return ['status' => false, 'message' => 'Respon provider tidak valid'];
    }
    return $data;
}

// =============================================
// FUNGSI AUTH & USER
// =============================================
function get_current_user() {
    if (session_status() === PHP_SESSION_NONE) {
        session_name(SESSION_NAME);
        session_start();
    }
    if (isset($_SESSION['user'])) {
        return $_SESSION['user'];
    }
    return null;
}

function require_login() {
    $user = get_current_user();
    if (!$user) {
        http_response_code(401);
        echo json_encode(['status' => false, 'message' => 'Silakan login terlebih dahulu']);
        exit;
    }
    return $user;
}

function is_admin($user) {
    return isset($user['role']) && $user['role'] === 'admin';
}

function create_user($data) {
    $users = load_users();
    
    // Cek duplikat
    foreach ($users as $u) {
        if ($u['username'] === $data['username'] || $u['email'] === $data['email'] || $u['phone'] === $data['phone']) {
            return ['status' => false, 'message' => 'Username / Email / Nomor HP sudah terdaftar'];
        }
    }
    
    $is_first = count($users) === 0;
    
    $user = [
        'id' => uniqid('u_'),
        'username' => $data['username'],
        'email' => $data['email'],
        'phone' => $data['phone'],
        'wa' => $data['phone'],
        'password' => encrypt_password($data['password']),
        'role' => $is_first ? 'admin' : 'user',
        'balance' => DEFAULT_BALANCE,
        'created_at' => date('c'),
        'status' => 'active'
    ];
    
    $users[] = $user;
    save_users($users);
    
    // Buat file akun terpisah
    $account = [
        'username' => $user['username'],
        'email' => $user['email'],
        'phone' => $user['phone'],
        'wa' => $user['wa'],
        'full_name' => $data['username'],
        'balance' => $user['balance'],
        'role' => $user['role'],
        'created_at' => $user['created_at']
    ];
    save_user_account($user['username'], $account);
    
    // History kosong
    save_user_history($user['username'], []);
    
    // Profile
    save_user_profile($user['username'], ['photo' => null, 'updated' => date('c')]);
    
    return ['status' => true, 'message' => 'Akun berhasil dibuat', 'user' => $user];
}

function authenticate($username, $password) {
    $users = load_users();
    foreach ($users as $user) {
        if ($user['username'] === $username) {
            $decrypted = decrypt_password($user['password']);
            if ($decrypted === $password) {
                if ($user['status'] !== 'active') {
                    return ['status' => false, 'message' => 'Akun Anda nonaktif'];
                }
                return ['status' => true, 'user' => $user];
            }
        }
    }
    return ['status' => false, 'message' => 'Username atau password salah'];
}

// =============================================
// FUNGSI TRANSAKSI
// =============================================
function create_transaction($username, $trx_data) {
    $history = load_user_history($username);
    
    $trx = array_merge([
        'id' => 'TRX_' . strtoupper(uniqid()),
        'ref_id' => $trx_data['ref_id'] ?? 'PDW' . date('YmdHis'),
        'date' => date('c'),
        'status_trx' => 'pending',
        'sn' => '-',
        'sisa_saldo' => 0
    ], $trx_data);
    
    $history[] = $trx;
    save_user_history($username, $history);
    
    // Update saldo user
    $users = load_users();
    foreach ($users as &$u) {
        if ($u['username'] === $username) {
            $u['balance'] = max(0, ($u['balance'] ?? 0) - ($trx_data['harga'] ?? 0));
            $trx['sisa_saldo'] = $u['balance'];
            break;
        }
    }
    save_users($users);
    
    // Update account
    $acc = load_user_account($username);
    if ($acc) {
        $acc['balance'] = $u['balance'] ?? 0;
        save_user_account($username, $acc);
    }
    
    return $trx;
}

function update_transaction_status($username, $ref_id, $new_status, $sn = null) {
    $history = load_user_history($username);
    $found = false;
    
    foreach ($history as &$trx) {
        if (($trx['ref_id'] ?? '') === $ref_id || ($trx['ref_reseller'] ?? '') === $ref_id) {
            $trx['status_trx'] = $new_status;
            if ($sn) $trx['sn'] = $sn;
            $found = true;
            break;
        }
    }
    
    if ($found) {
        save_user_history($username, $history);
    }
    
    return $found;
}

function get_all_transactions() {
    $users = load_users();
    $all = [];
    foreach ($users as $u) {
        $hist = load_user_history($u['username']);
        foreach ($hist as $h) {
            $h['username'] = $u['username'];
            $all[] = $h;
        }
    }
    // sort by date desc
    usort($all, function($a,$b){
        return strtotime($b['date'] ?? '') - strtotime($a['date'] ?? '');
    });
    return $all;
}
?>