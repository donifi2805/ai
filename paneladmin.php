<?php
require_once 'api/config.php';

if (session_status() === PHP_SESSION_NONE) {
    session_name(SESSION_NAME);
    session_start();
}

$current_user = $_SESSION['user'] ?? null;
if (!$current_user || ($current_user['role'] ?? '') !== 'admin') {
    header('Location: index.html');
    exit;
}

// Handle actions
$msg = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    
    if ($action === 'add_admin') {
        $new_user = trim($_POST['new_username'] ?? '');
        $new_email = trim($_POST['new_email'] ?? '');
        $new_phone = trim($_POST['new_phone'] ?? '');
        $new_pass = $_POST['new_password'] ?? '';
        
        if ($new_user && $new_email && $new_phone && $new_pass) {
            $users = load_users();
            $exists = false;
            foreach ($users as $u) {
                if ($u['username'] === $new_user || $u['email'] === $new_email) {
                    $exists = true; break;
                }
            }
            if (!$exists) {
                $new = [
                    'id' => uniqid('u_'),
                    'username' => $new_user,
                    'email' => $new_email,
                    'phone' => $new_phone,
                    'wa' => $new_phone,
                    'password' => encrypt_password($new_pass),
                    'role' => 'admin',
                    'balance' => 999999,
                    'created_at' => date('c'),
                    'status' => 'active'
                ];
                $users[] = $new;
                save_users($users);
                
                $acc = [
                    'username' => $new_user, 'email' => $new_email, 'phone' => $new_phone,
                    'wa' => $new_phone, 'full_name' => $new_user, 'balance' => 999999,
                    'role' => 'admin', 'created_at' => date('c')
                ];
                save_user_account($new_user, $acc);
                save_user_history($new_user, []);
                save_user_profile($new_user, ['photo' => null, 'updated' => date('c')]);
                
                $msg = 'Admin baru berhasil ditambahkan!';
            } else {
                $msg = 'Username atau email sudah ada';
            }
        }
    }
    
    if ($action === 'update_user') {
        $uid = $_POST['user_id'] ?? '';
        $users = load_users();
        foreach ($users as &$u) {
            if ($u['id'] === $uid) {
                if (!empty($_POST['email'])) $u['email'] = trim($_POST['email']);
                if (!empty($_POST['phone'])) $u['phone'] = trim($_POST['phone']);
                if (!empty($_POST['wa'])) $u['wa'] = trim($_POST['wa']);
                if (!empty($_POST['new_password'])) {
                    $u['password'] = encrypt_password($_POST['new_password']);
                }
                if (isset($_POST['balance'])) $u['balance'] = (int)$_POST['balance'];
                if (isset($_POST['status'])) $u['status'] = $_POST['status'];
                break;
            }
        }
        save_users($users);
        $msg = 'Data user berhasil diperbarui';
    }
    
    if ($action === 'update_trx') {
        $ref = $_POST['ref_id'] ?? '';
        $new_status = $_POST['status_trx'] ?? 'pending';
        $sn = trim($_POST['sn'] ?? '-');
        
        $users = load_users();
        foreach ($users as $u) {
            $hist = load_user_history($u['username']);
            $changed = false;
            foreach ($hist as &$t) {
                if (($t['ref_id'] ?? '') === $ref || ($t['ref_reseller'] ?? '') === $ref) {
                    $t['status_trx'] = $new_status;
                    if ($sn !== '-') $t['sn'] = $sn;
                    $changed = true;
                    break;
                }
            }
            if ($changed) {
                save_user_history($u['username'], $hist);
                break;
            }
        }
        $msg = 'Status transaksi diperbarui';
    }
}

$users = load_users();
$all_trx = get_all_transactions();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Admin — Agen DT17 PPOB</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body { font-family: system-ui, -apple-system, sans-serif; }
        .table-row:hover { background: #f8fafc; }
        .nav-active { background: #4f46e5; color: white; }
    </style>
</head>
<body class="bg-slate-100">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-white border-r border-slate-200 p-4 flex flex-col">
            <div class="flex items-center gap-3 mb-8 px-2">
                <div class="w-10 h-10 bg-indigo-600 rounded-2xl flex items-center justify-center text-white font-bold text-xl">A</div>
                <div>
                    <div class="font-extrabold text-xl">Agen DT17</div>
                    <div class="text-xs text-slate-500">Panel Admin</div>
                </div>
            </div>
            
            <div class="space-y-1 mb-8">
                <a href="#users" onclick="document.getElementById('users-section').scrollIntoView({behavior:'smooth'})" 
                   class="flex items-center gap-3 px-4 py-2.5 text-sm font-semibold rounded-xl hover:bg-slate-100">
                    <i class="fa-solid fa-users w-5"></i> Data Pengguna
                </a>
                <a href="#transactions" onclick="document.getElementById('trx-section').scrollIntoView({behavior:'smooth'})" 
                   class="flex items-center gap-3 px-4 py-2.5 text-sm font-semibold rounded-xl hover:bg-slate-100">
                    <i class="fa-solid fa-receipt w-5"></i> Semua Transaksi
                </a>
                <a href="#add-admin" onclick="document.getElementById('add-section').scrollIntoView({behavior:'smooth'})" 
                   class="flex items-center gap-3 px-4 py-2.5 text-sm font-semibold rounded-xl hover:bg-slate-100">
                    <i class="fa-solid fa-user-plus w-5"></i> Tambah Admin
                </a>
            </div>
            
            <div class="mt-auto">
                <div class="px-3 py-3 bg-slate-50 rounded-2xl text-xs">
                    <div class="font-semibold">Login sebagai</div>
                    <div class="font-bold text-indigo-600"><?= htmlspecialchars($current_user['username']) ?></div>
                    <div class="text-[10px] text-slate-500 mt-1"><?= htmlspecialchars($current_user['email']) ?></div>
                </div>
                
                <a href="api/logout.php" class="mt-3 flex items-center justify-center gap-2 text-sm text-red-600 hover:text-red-700 font-semibold">
                    <i class="fa-solid fa-sign-out-alt"></i> Logout
                </a>
            </div>
        </div>
        
        <!-- Main Content -->
        <div class="flex-1 p-6">
            <div class="max-w-7xl mx-auto">
                <!-- Header -->
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h1 class="text-3xl font-extrabold tracking-tight">Panel Admin PPOB</h1>
                        <p class="text-slate-500">Kelola seluruh data user &amp; transaksi</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <a href="index.html" class="px-4 py-2 bg-white border rounded-2xl text-sm font-semibold flex items-center gap-2 hover:bg-slate-50">
                            <i class="fa-solid fa-globe"></i> <span>Buka Aplikasi</span>
                        </a>
                        <div class="text-xs px-3 py-1 bg-emerald-100 text-emerald-700 rounded-full font-bold">LIVE</div>
                    </div>
                </div>
                
                <?php if ($msg): ?>
                <div class="mb-4 px-4 py-3 bg-emerald-100 border border-emerald-200 text-emerald-700 rounded-2xl text-sm font-semibold">
                    <?= htmlspecialchars($msg) ?>
                </div>
                <?php endif; ?>
                
                <!-- STATS -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
                    <div class="bg-white p-5 rounded-3xl border">
                        <div class="text-xs font-bold text-slate-500">TOTAL USER</div>
                        <div class="text-4xl font-extrabold mt-1"><?= count($users) ?></div>
                    </div>
                    <div class="bg-white p-5 rounded-3xl border">
                        <div class="text-xs font-bold text-slate-500">TOTAL ADMIN</div>
                        <div class="text-4xl font-extrabold mt-1"><?= count(array_filter($users, fn($u) => $u['role']==='admin')) ?></div>
                    </div>
                    <div class="bg-white p-5 rounded-3xl border">
                        <div class="text-xs font-bold text-slate-500">TOTAL TRANSAKSI</div>
                        <div class="text-4xl font-extrabold mt-1"><?= count($all_trx) ?></div>
                    </div>
                    <div class="bg-white p-5 rounded-3xl border">
                        <div class="text-xs font-bold text-slate-500">SALDO TOTAL</div>
                        <div class="text-4xl font-extrabold mt-1">Rp<?= number_format(array_sum(array_column($users, 'balance')), 0, ',', '.') ?></div>
                    </div>
                </div>
                
                <!-- USERS SECTION -->
                <div id="users-section" class="bg-white rounded-3xl border shadow-sm p-6 mb-8">
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <h2 class="font-extrabold text-xl">Data Seluruh User</h2>
                            <p class="text-sm text-slate-500">Termasuk data pribadi, sandi terenkripsi, dan status</p>
                        </div>
                    </div>
                    
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm">
                            <thead>
                                <tr class="border-b">
                                    <th class="text-left py-3 px-4 font-semibold text-slate-600">Username</th>
                                    <th class="text-left py-3 px-4 font-semibold text-slate-600">Email</th>
                                    <th class="text-left py-3 px-4 font-semibold text-slate-600">Nomor WA</th>
                                    <th class="text-left py-3 px-4 font-semibold text-slate-600">Role</th>
                                    <th class="text-right py-3 px-4 font-semibold text-slate-600">Saldo</th>
                                    <th class="text-center py-3 px-4 font-semibold text-slate-600">Status</th>
                                    <th class="text-center py-3 px-4 font-semibold text-slate-600">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($users as $u): 
                                    $plain_pass = decrypt_password($u['password'] ?? '');
                                ?>
                                <tr class="table-row border-b last:border-0">
                                    <td class="py-3 px-4 font-bold"><?= htmlspecialchars($u['username']) ?></td>
                                    <td class="py-3 px-4"><?= htmlspecialchars($u['email']) ?></td>
                                    <td class="py-3 px-4"><?= htmlspecialchars($u['phone'] ?? $u['wa'] ?? '-') ?></td>
                                    <td class="py-3 px-4">
                                        <span class="px-3 py-0.5 rounded-full text-xs font-bold <?= $u['role']==='admin' ? 'bg-purple-100 text-purple-700' : 'bg-slate-100 text-slate-600' ?>">
                                            <?= strtoupper($u['role']) ?>
                                        </span>
                                    </td>
                                    <td class="py-3 px-4 text-right font-mono font-semibold">Rp<?= number_format($u['balance'] ?? 0, 0, ',', '.') ?></td>
                                    <td class="py-3 px-4 text-center">
                                        <span class="px-2.5 py-px text-xs font-bold rounded-full <?= ($u['status'] ?? 'active') === 'active' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' ?>">
                                            <?= strtoupper($u['status'] ?? 'active') ?>
                                        </span>
                                    </td>
                                    <td class="py-3 px-4 text-center">
                                        <button onclick="editUser('<?= $u['id'] ?>', '<?= htmlspecialchars($u['username']) ?>', '<?= htmlspecialchars($u['email']) ?>', '<?= htmlspecialchars($u['phone'] ?? '') ?>', '<?= htmlspecialchars($u['wa'] ?? '') ?>', <?= $u['balance'] ?? 0 ?>, '<?= $u['status'] ?? 'active' ?>', '<?= htmlspecialchars($plain_pass) ?>')" 
                                                class="text-xs px-3 py-1 bg-slate-800 hover:bg-black text-white rounded-xl font-semibold">Edit</button>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <!-- TRANSACTIONS -->
                <div id="trx-section" class="bg-white rounded-3xl border shadow-sm p-6 mb-8">
                    <h2 class="font-extrabold text-xl mb-4">Semua Transaksi (<?= count($all_trx) ?>)</h2>
                    
                    <div class="overflow-x-auto max-h-[420px]">
                        <table class="w-full text-sm">
                            <thead class="sticky top-0 bg-white">
                                <tr class="border-b">
                                    <th class="text-left py-2 px-3 font-semibold text-xs text-slate-500">Ref ID</th>
                                    <th class="text-left py-2 px-3 font-semibold text-xs text-slate-500">User</th>
                                    <th class="text-left py-2 px-3 font-semibold text-xs text-slate-500">Kode</th>
                                    <th class="text-left py-2 px-3 font-semibold text-xs text-slate-500">Tujuan</th>
                                    <th class="text-right py-2 px-3 font-semibold text-xs text-slate-500">Harga</th>
                                    <th class="text-center py-2 px-3 font-semibold text-xs text-slate-500">Status</th>
                                    <th class="text-left py-2 px-3 font-semibold text-xs text-slate-500">SN</th>
                                    <th class="text-center py-2 px-3 font-semibold text-xs text-slate-500">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach (array_slice($all_trx, 0, 30) as $t): ?>
                                <tr class="border-b text-xs hover:bg-slate-50">
                                    <td class="py-2 px-3 font-mono"><?= htmlspecialchars($t['ref_id'] ?? $t['ref_reseller'] ?? '-') ?></td>
                                    <td class="py-2 px-3 font-semibold"><?= htmlspecialchars($t['username'] ?? '-') ?></td>
                                    <td class="py-2 px-3"><?= htmlspecialchars($t['kode'] ?? '-') ?></td>
                                    <td class="py-2 px-3"><?= htmlspecialchars($t['tujuan'] ?? '-') ?></td>
                                    <td class="py-2 px-3 text-right font-semibold">Rp<?= number_format($t['harga'] ?? 0, 0, ',', '.') ?></td>
                                    <td class="py-2 px-3 text-center">
                                        <span class="text-[10px] font-extrabold px-2 py-px rounded <?= ($t['status_trx'] ?? 'pending') === 'success' ? 'bg-emerald-100 text-emerald-700' : (($t['status_trx'] ?? '') === 'pending' ? 'bg-amber-100 text-amber-700' : 'bg-red-100 text-red-700') ?>">
                                            <?= strtoupper($t['status_trx'] ?? 'PENDING') ?>
                                        </span>
                                    </td>
                                    <td class="py-2 px-3 text-xs font-mono truncate max-w-[140px]"><?= htmlspecialchars($t['sn'] ?? '-') ?></td>
                                    <td class="py-2 px-3 text-center">
                                        <button onclick="editTrx('<?= htmlspecialchars($t['ref_id'] ?? $t['ref_reseller']) ?>', '<?= $t['status_trx'] ?? 'pending' ?>', '<?= htmlspecialchars($t['sn'] ?? '-') ?>')" 
                                                class="px-2.5 py-1 text-[10px] bg-white border rounded-lg font-bold hover:bg-slate-50">Ubah</button>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <!-- ADD ADMIN -->
                <div id="add-section" class="bg-white rounded-3xl border shadow-sm p-6">
                    <h2 class="font-extrabold text-xl mb-1">Tambah Admin Baru</h2>
                    <p class="text-sm text-slate-500 mb-5">Admin pertama sudah dibuat otomatis saat sistem pertama kali dijalankan.</p>
                    
                    <form method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-x-4 gap-y-4 max-w-2xl">
                        <input type="hidden" name="action" value="add_admin">
                        
                        <div>
                            <label class="block text-xs font-bold text-slate-600 mb-1">Username</label>
                            <input type="text" name="new_username" required class="w-full border border-slate-300 focus:border-indigo-500 rounded-2xl px-4 py-2.5 text-sm">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-600 mb-1">Email</label>
                            <input type="email" name="new_email" required class="w-full border border-slate-300 focus:border-indigo-500 rounded-2xl px-4 py-2.5 text-sm">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-600 mb-1">Nomor WA</label>
                            <input type="text" name="new_phone" required placeholder="08xxxxxxxxxx" class="w-full border border-slate-300 focus:border-indigo-500 rounded-2xl px-4 py-2.5 text-sm">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-600 mb-1">Password</label>
                            <input type="text" name="new_password" required class="w-full border border-slate-300 focus:border-indigo-500 rounded-2xl px-4 py-2.5 text-sm">
                        </div>
                        
                        <div class="md:col-span-2 mt-1">
                            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 transition-colors text-white font-extrabold px-8 py-3 rounded-2xl text-sm flex items-center gap-2">
                                <i class="fa-solid fa-user-plus"></i> TAMBAH ADMIN
                            </button>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
    
    <!-- Edit User Modal -->
    <div id="editModal" class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center">
        <div class="bg-white rounded-3xl w-full max-w-md mx-4 p-6">
            <h3 class="font-extrabold text-lg mb-4">Edit User</h3>
            
            <form method="POST" id="editForm">
                <input type="hidden" name="action" value="update_user">
                <input type="hidden" name="user_id" id="edit_id">
                
                <div class="space-y-4">
                    <div>
                        <label class="text-xs font-bold">Username</label>
                        <input type="text" id="edit_username" readonly class="w-full bg-slate-100 border border-slate-200 rounded-2xl px-4 py-2 text-sm font-semibold">
                    </div>
                    
                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label class="text-xs font-bold">Email</label>
                            <input type="email" name="email" id="edit_email" class="w-full border rounded-2xl px-4 py-2 text-sm">
                        </div>
                        <div>
                            <label class="text-xs font-bold">Nomor WA</label>
                            <input type="text" name="wa" id="edit_wa" class="w-full border rounded-2xl px-4 py-2 text-sm">
                        </div>
                    </div>
                    
                    <div>
                        <label class="text-xs font-bold">Nomor HP</label>
                        <input type="text" name="phone" id="edit_phone" class="w-full border rounded-2xl px-4 py-2 text-sm">
                    </div>
                    
                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label class="text-xs font-bold">Saldo</label>
                            <input type="number" name="balance" id="edit_balance" class="w-full border rounded-2xl px-4 py-2 text-sm">
                        </div>
                        <div>
                            <label class="text-xs font-bold">Status</label>
                            <select name="status" id="edit_status" class="w-full border rounded-2xl px-4 py-2 text-sm">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                                <option value="suspended">Suspended</option>
                            </select>
                        </div>
                    </div>
                    
                    <div>
                        <label class="text-xs font-bold">Ganti Password (kosongkan jika tidak ingin ubah)</label>
                        <input type="text" name="new_password" id="edit_password" placeholder="Masukkan password baru" class="w-full border rounded-2xl px-4 py-2 text-sm">
                    </div>
                </div>
                
                <div class="flex gap-3 mt-6">
                    <button type="button" onclick="closeEditModal()" class="flex-1 py-3 text-sm font-bold rounded-2xl border">Batal</button>
                    <button type="submit" class="flex-1 py-3 bg-indigo-600 text-white font-extrabold rounded-2xl text-sm">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
    
    <!-- Edit Transaction Modal -->
    <div id="trxModal" class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center">
        <div class="bg-white rounded-3xl w-full max-w-sm mx-4 p-6">
            <h3 class="font-extrabold text-lg mb-1">Ubah Status Transaksi</h3>
            <p class="text-xs text-slate-500 mb-4" id="trx_ref_display"></p>
            
            <form method="POST">
                <input type="hidden" name="action" value="update_trx">
                <input type="hidden" name="ref_id" id="trx_ref">
                
                <div class="space-y-4">
                    <div>
                        <label class="text-xs font-bold">Status Transaksi</label>
                        <select name="status_trx" id="trx_status" class="w-full border rounded-2xl px-4 py-3 text-sm">
                            <option value="pending">PENDING</option>
                            <option value="success">BERHASIL</option>
                            <option value="failed">GAGAL</option>
                        </select>
                    </div>
                    <div>
                        <label class="text-xs font-bold">Serial Number / SN</label>
                        <input type="text" name="sn" id="trx_sn" class="w-full border rounded-2xl px-4 py-3 text-sm font-mono">
                    </div>
                </div>
                
                <div class="flex gap-3 mt-5">
                    <button type="button" onclick="closeTrxModal()" class="flex-1 py-3 text-sm font-bold rounded-2xl border">Batal</button>
                    <button type="submit" class="flex-1 py-3 bg-emerald-600 text-white font-extrabold rounded-2xl text-sm">Update Status</button>
                </div>
            </form>
        </div>
    </div>
    
    <script>
        function editUser(id, username, email, phone, wa, balance, status, plainPass) {
            document.getElementById('edit_id').value = id;
            document.getElementById('edit_username').value = username;
            document.getElementById('edit_email').value = email;
            document.getElementById('edit_phone').value = phone;
            document.getElementById('edit_wa').value = wa;
            document.getElementById('edit_balance').value = balance;
            document.getElementById('edit_status').value = status;
            document.getElementById('edit_password').value = '';
            
            document.getElementById('editModal').classList.remove('hidden');
            document.getElementById('editModal').classList.add('flex');
        }
        
        function closeEditModal() {
            const modal = document.getElementById('editModal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }
        
        function editTrx(ref, status, sn) {
            document.getElementById('trx_ref').value = ref;
            document.getElementById('trx_ref_display').textContent = 'Ref: ' + ref;
            document.getElementById('trx_status').value = status;
            document.getElementById('trx_sn').value = sn;
            
            const modal = document.getElementById('trxModal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }
        
        function closeTrxModal() {
            const modal = document.getElementById('trxModal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }
        
        // Close modals on escape
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                document.querySelectorAll('.fixed').forEach(m => {
                    m.classList.add('hidden');
                    m.classList.remove('flex');
                });
            }
        });
    </script>
</body>
</html>