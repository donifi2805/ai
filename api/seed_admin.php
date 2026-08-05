<?php
require_once 'config.php';

// Buat admin pertama jika belum ada
$users = load_users();

$admin_exists = false;
foreach ($users as $u) {
    if ($u['role'] === 'admin') {
        $admin_exists = true;
        break;
    }
}

if (!$admin_exists) {
    $admin_user = [
        'id' => 'u_admin001',
        'username' => 'admin',
        'email' => 'admin@dt17.store',
        'phone' => '081234567890',
        'wa' => '081234567890',
        'password' => encrypt_password('admin123'),  // Ganti password ini di produksi!
        'role' => 'admin',
        'balance' => 9999999,
        'created_at' => date('c'),
        'status' => 'active'
    ];
    
    $users[] = $admin_user;
    save_users($users);
    
    // Buat file akun terpisah
    $account = [
        'username' => 'admin',
        'email' => 'admin@dt17.store',
        'phone' => '081234567890',
        'wa' => '081234567890',
        'full_name' => 'Administrator DT17',
        'balance' => 9999999,
        'role' => 'admin',
        'created_at' => date('c')
    ];
    save_user_account('admin', $account);
    
    // History kosong
    save_user_history('admin', []);
    
    // Profile
    save_user_profile('admin', ['photo' => null, 'updated' => date('c')]);
    
    echo "Admin pertama berhasil dibuat!\n";
    echo "Username: admin\n";
    echo "Password: admin123\n";
    echo "Silakan login dan ubah password segera!\n";
} else {
    echo "Admin sudah ada.\n";
}
?>