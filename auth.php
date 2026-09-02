<?php
// auth.php - User Auth, Admin Control, Saldo, OkeConnect Gateway & Universal Settings
ini_set('display_errors', 0);
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization, X-API-KEY');

require_once __DIR__ . '/auth_helper.php';

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') { http_response_code(200); exit; }

$input = json_decode(file_get_contents('php://input'), true) ?? $_POST;
$action = $_GET['action'] ?? $input['action'] ?? '';

function check_admin_access($sessionToken) {
    if (empty($sessionToken)) return false;
    $users = get_users_data();
    foreach ($users as $u) {
        if (isset($u['session_token']) && $u['session_token'] === $sessionToken && ($u['role'] ?? '') === 'admin') {
            return true;
        }
    }
    return false;
}

/** Ambil username admin dari token sesi (untuk jejak audit saldo) */
function get_admin_name_by_token($sessionToken) {
    if (empty($sessionToken)) return 'admin';
    $users = get_users_data();
    foreach ($users as $u) {
        if (isset($u['session_token']) && $u['session_token'] === $sessionToken && ($u['role'] ?? '') === 'admin') {
            return $u['username'] ?? 'admin';
        }
    }
    return 'admin';
}

switch ($action) {
    case 'register':
        $username = trim($input['username'] ?? '');
        $email = trim($input['email'] ?? '');
        $nomorwa = preg_replace('/\D+/', '', $input['nomorwa'] ?? '');
        $password = $input['password'] ?? '';
        $confirm_password = $input['confirm_password'] ?? '';

        if (!$username || !$email || !$nomorwa || !$password) {
            echo json_encode(['status' => false, 'message' => 'Semua kolom wajib diisi!']); exit;
        }
        if ($password !== $confirm_password) {
            echo json_encode(['status' => false, 'message' => 'Konfirmasi password tidak cocok!']); exit;
        }

        $users = get_users_data();
        foreach ($users as $u) {
            if (($u['nomorwa'] ?? '') === $nomorwa || ($u['username'] ?? '') === $username) {
                echo json_encode(['status' => false, 'message' => 'Username/WhatsApp sudah terdaftar!']); exit;
            }
        }

        $isFirstUser = count($users) === 0;
        $newUser = [
            'id'            => 'USR-' . time() . rand(100, 999),
            'username'      => $username,
            'email'         => $email,
            'nomorwa'       => $nomorwa,
            'password'      => password_hash($password, PASSWORD_DEFAULT),
            'role'          => $isFirstUser ? 'admin' : 'user',
            'markup'        => 0,
            'markup_api1'   => 0,
            'markup_api2'   => 0,
            'markup_api3'   => 0,
            'markup_api4'   => 0,
            'saldo'         => 0,
            'api_key'       => 'dt17_' . bin2hex(random_bytes(16)),
            'session_token' => bin2hex(random_bytes(24)),
            'is_blocked'    => false,
            'status'        => 'active',
            'created_at'    => date('Y-m-d H:i:s')
        ];

        $users[] = $newUser;
        save_users_data($users);
        unset($newUser['password']);
        echo json_encode(['status' => true, 'message' => 'Registrasi Berhasil!', 'data' => $newUser]);
        break;

    case 'login':
        $nomorwa = preg_replace('/\D+/', '', $input['nomorwa'] ?? '');
        $password = $input['password'] ?? '';
        $save_login = $input['save_login'] ?? false;

        $users = get_users_data();
        $foundUser = null; $foundIndex = -1;
        foreach ($users as $idx => $u) {
            if (($u['nomorwa'] ?? '') === $nomorwa) { $foundUser = $u; $foundIndex = $idx; break; }
        }

        if (!$foundUser || !password_verify($password, $foundUser['password'])) {
            echo json_encode(['status' => false, 'message' => 'Nomor WA atau Password salah!']); exit;
        }

        $sessionToken = bin2hex(random_bytes(24));
        $users[$foundIndex]['session_token'] = $sessionToken;
        save_users_data($users);

        unset($foundUser['password']);
        $foundUser['session_token'] = $sessionToken;
        if (!isset($foundUser['saldo'])) $foundUser['saldo'] = 0;
        if (!isset($foundUser['markup'])) $foundUser['markup'] = 0;
        if (!isset($foundUser['markup_api1'])) $foundUser['markup_api1'] = $foundUser['markup'];
        if (!isset($foundUser['markup_api2'])) $foundUser['markup_api2'] = $foundUser['markup'];
        if (!isset($foundUser['markup_api3'])) $foundUser['markup_api3'] = $foundUser['markup'];
        if (!isset($foundUser['markup_api4'])) $foundUser['markup_api4'] = $foundUser['markup'];
        if (!isset($foundUser['is_blocked'])) $foundUser['is_blocked'] = false;

        echo json_encode(['status' => true, 'message' => 'Login Berhasil!', 'save_login' => $save_login, 'data' => $foundUser]);
        break;

    case 'check_session':
        $token = $input['session_token'] ?? $_GET['session_token'] ?? '';
        $users = get_users_data();
        foreach ($users as $u) {
            if (isset($u['session_token']) && $u['session_token'] === $token) {
                unset($u['password']);
                if (!isset($u['markup'])) $u['markup'] = 0;
                if (!isset($u['markup_api1'])) $u['markup_api1'] = $u['markup'];
                if (!isset($u['markup_api2'])) $u['markup_api2'] = $u['markup'];
                if (!isset($u['markup_api3'])) $u['markup_api3'] = $u['markup'];
                if (!isset($u['markup_api4'])) $u['markup_api4'] = $u['markup'];
                if (!isset($u['saldo'])) $u['saldo'] = 0;
                if (!isset($u['is_blocked'])) $u['is_blocked'] = false;
                echo json_encode(['status' => true, 'data' => $u]); exit;
            }
        }
        echo json_encode(['status' => false, 'message' => 'Sesi kedaluwarsa']);
        break;

    case 'get_api_status':
        $config = get_system_config();
        echo json_encode(['status' => true, 'data' => $config['api_status'] ?? ['api1' => true, 'api2' => true, 'api3' => true, 'api4' => true]]);
        break;

    case 'save_api_status':
        $token = $input['session_token'] ?? '';
        if (!check_admin_access($token)) { echo json_encode(['status' => false, 'message' => 'Khusus Admin']); exit; }
        $config = get_system_config();
        $config['api_status'] = [
            'api1' => (bool)($input['api1'] ?? true),
            'api2' => (bool)($input['api2'] ?? true),
            'api3' => (bool)($input['api3'] ?? true),
            'api4' => (bool)($input['api4'] ?? true)
        ];
        save_system_config($config);
        echo json_encode(['status' => true, 'message' => 'Status On/Off API Server berhasil diperbarui!']);
        break;

    case 'admin_block_user':
        $token = $input['session_token'] ?? '';
        if (!check_admin_access($token)) { echo json_encode(['status' => false, 'message' => 'Khusus Admin']); exit; }
        $targetId   = $input['target_id'] ?? '';
        $blockState = (bool)($input['is_blocked'] ?? true);
        $users      = get_users_data();
        foreach ($users as $idx => $u) {
            if (($u['id'] ?? '') === $targetId) {
                $users[$idx]['is_blocked'] = $blockState;
                $users[$idx]['status']     = $blockState ? 'blocked' : 'active';
                save_users_data($users);
                echo json_encode(['status' => true, 'message' => 'Status penangguhan akun user berhasil diperbarui!']); exit;
            }
        }
        echo json_encode(['status' => false, 'message' => 'User ID tidak ditemukan']);
        break;

    case 'regen_key':
        $token = $input['session_token'] ?? '';
        $users = get_users_data();
        foreach ($users as $idx => $u) {
            if (isset($u['session_token']) && $u['session_token'] === $token) {
                $newKey = 'dt17_' . bin2hex(random_bytes(16));
                $users[$idx]['api_key'] = $newKey;
                save_users_data($users);
                echo json_encode(['status' => true, 'new_api_key' => $newKey]); exit;
            }
        }
        echo json_encode(['status' => false, 'message' => 'Gagal memperbarui API Key']);
        break;

    case 'my_history':
        $token = $input['session_token'] ?? $_GET['session_token'] ?? '';
        $users = get_users_data();
        $user = null;
        foreach ($users as $u) {
            if (isset($u['session_token']) && $u['session_token'] === $token) { $user = $u; break; }
        }
        if (!$user) { echo json_encode(['status' => false, 'message' => 'Akses ditolak']); exit; }

        $history = get_user_transactions($user['id']);
        foreach ($history as $idx => $trx) {
            if (strtoupper($trx['status']) === 'PENDING' && !($trx['status_override'] ?? false)) {
                $history[$idx] = sync_transaction_status($user['id'], $trx, true);
            }
        }
        usort($history, function($a, $b) { return strtotime($b['created_at'] ?? '0') - strtotime($a['created_at'] ?? '0'); });
        echo json_encode(['status' => true, 'data' => $history]);
        break;

    case 'list_users':
        $token = $input['session_token'] ?? $_GET['session_token'] ?? '';
        if (!check_admin_access($token)) { echo json_encode(['status' => false, 'message' => 'Khusus Admin']); exit; }
        $users = array_map(function($u) {
            unset($u['password']);
            if (!isset($u['markup'])) $u['markup'] = 0;
            if (!isset($u['markup_api1'])) $u['markup_api1'] = $u['markup'];
            if (!isset($u['markup_api2'])) $u['markup_api2'] = $u['markup'];
            if (!isset($u['markup_api3'])) $u['markup_api3'] = $u['markup'];
            if (!isset($u['markup_api4'])) $u['markup_api4'] = $u['markup'];
            if (!isset($u['saldo'])) $u['saldo'] = 0;
            if (!isset($u['is_blocked'])) $u['is_blocked'] = false;
            return $u;
        }, get_users_data());
        echo json_encode(['status' => true, 'data' => $users]);
        break;

    case 'admin_add_user':
        $token = $input['session_token'] ?? '';
        if (!check_admin_access($token)) { echo json_encode(['status' => false, 'message' => 'Khusus Admin']); exit; }
        $username = trim($input['username'] ?? ''); $email = trim($input['email'] ?? '');
        $nomorwa  = preg_replace('/\D+/', '', $input['nomorwa'] ?? ''); $password = $input['password'] ?? '';
        $role     = $input['role'] ?? 'user';
        $markup   = isset($input['markup']) ? (int)$input['markup'] : 0;
        $markup1  = isset($input['markup_api1']) ? (int)$input['markup_api1'] : $markup;
        $markup2  = isset($input['markup_api2']) ? (int)$input['markup_api2'] : $markup;
        $markup3  = isset($input['markup_api3']) ? (int)$input['markup_api3'] : $markup;
        $markup4  = isset($input['markup_api4']) ? (int)$input['markup_api4'] : $markup;
        $saldo    = isset($input['saldo']) ? (int)$input['saldo'] : 0;

        $users = get_users_data();
        foreach ($users as $u) {
            if (($u['nomorwa'] ?? '') === $nomorwa || ($u['username'] ?? '') === $username) {
                echo json_encode(['status' => false, 'message' => 'Username/WA sudah ada!']); exit;
            }
        }

        $newUser = [
            'id'            => 'USR-' . time() . rand(100, 999),
            'username'      => $username, 
            'email'         => $email, 
            'nomorwa'       => $nomorwa,
            'password'      => password_hash($password, PASSWORD_DEFAULT),
            'role'          => $role, 
            'markup'        => $markup, 
            'markup_api1'   => $markup1, 
            'markup_api2'   => $markup2,
            'markup_api3'   => $markup3, 
            'markup_api4'   => $markup4,
            'saldo'         => $saldo, 
            'is_blocked'    => false, 
            'status'        => 'active',
            'api_key'       => 'dt17_' . bin2hex(random_bytes(16)),
            'session_token' => bin2hex(random_bytes(24)), 
            'created_at'    => date('Y-m-d H:i:s')
        ];
        $users[] = $newUser;
        save_users_data($users);
        echo json_encode(['status' => true, 'message' => 'User baru ditambahkan!']);
        break;

    case 'admin_edit_user':
        $token = $input['session_token'] ?? '';
        if (!check_admin_access($token)) { echo json_encode(['status' => false, 'message' => 'Khusus Admin']); exit; }
        $userId = $input['target_id'] ?? '';
        $users  = get_users_data();
        foreach ($users as $idx => $u) {
            if ($u['id'] === $userId) {
                $users[$idx]['username'] = trim($input['username'] ?? $u['username']);
                $users[$idx]['email']    = trim($input['email'] ?? $u['email']);
                $users[$idx]['nomorwa']  = preg_replace('/\D+/', '', $input['nomorwa'] ?? $u['nomorwa']);
                $users[$idx]['role']     = $input['role'] ?? $u['role'];
                if (isset($input['markup'])) { $users[$idx]['markup'] = (int)$input['markup']; }
                if (isset($input['markup_api1'])) { $users[$idx]['markup_api1'] = (int)$input['markup_api1']; }
                if (isset($input['markup_api2'])) { $users[$idx]['markup_api2'] = (int)$input['markup_api2']; }
                if (isset($input['markup_api3'])) { $users[$idx]['markup_api3'] = (int)$input['markup_api3']; }
                if (isset($input['markup_api4'])) { $users[$idx]['markup_api4'] = (int)$input['markup_api4']; }

                // --- PENCATATAN AUDIT SALDO (BUKU BESAR) ---
                // Perubahan saldo oleh admin wajib tercatat supaya rantai saldo tidak putus
                if (isset($input['saldo'])) {
                    $newSaldoVal = (int)$input['saldo'];
                    $oldSaldoVal = (int)($u['saldo'] ?? 0);
                    if ($newSaldoVal !== $oldSaldoVal) {
                        ledger_set_saldo($userId, $newSaldoVal, array(
                            'server'     => 'paneladmin',
                            'refid'      => 'ADJ-' . date('YmdHis') . rand(100, 999),
                            'keterangan' => 'Penyesuaian saldo oleh admin',
                            'catatan'    => trim((string)($input['saldo_note'] ?? '')) !== '' ? trim((string)$input['saldo_note']) : 'Tanpa catatan',
                            'admin'      => get_admin_name_by_token($input['session_token'] ?? ''),
                        ));
                    }
                }

                if (isset($input['saldo'])) { $users[$idx]['saldo'] = (int)$input['saldo']; }
                if (isset($input['is_blocked'])) { $users[$idx]['is_blocked'] = (bool)$input['is_blocked']; }
                if (!empty($input['password'])) {
                    $users[$idx]['password'] = password_hash($input['password'], PASSWORD_DEFAULT);
                }
                save_users_data($users);
                echo json_encode(['status' => true, 'message' => 'Data user diperbarui!']); exit;
            }
        }
        echo json_encode(['status' => false, 'message' => 'User ID tidak ditemukan']);
        break;

    case 'admin_list_all_history':
        $token = $input['session_token'] ?? $_GET['session_token'] ?? '';
        if (!check_admin_access($token)) { echo json_encode(['status' => false, 'message' => 'Khusus Admin']); exit; }
        $history = get_all_users_transactions();
        echo json_encode(['status' => true, 'data' => $history]);
        break;

    case 'admin_update_trx_status':
        $token = $input['session_token'] ?? '';
        if (!check_admin_access($token)) { echo json_encode(['status' => false, 'message' => 'Khusus Admin']); exit; }

        $targetUserId = $input['target_user_id'] ?? '';
        $refidH2H     = $input['refid_h2h'] ?? '';
        $newStatus    = strtoupper(trim($input['new_status'] ?? ''));
        $newSn        = trim($input['new_sn'] ?? '');

        if (!$targetUserId || !$refidH2H || !in_array($newStatus, ['BERHASIL', 'PENDING', 'GAGAL'])) {
            echo json_encode(['status' => false, 'message' => 'Parameter tidak valid!']); exit;
        }

        $trx = find_transaction_by_any_refid($targetUserId, $refidH2H);
        if (!$trx) { echo json_encode(['status' => false, 'message' => 'Transaksi tidak ditemukan!']); exit; }

        $oldStatus = $trx['status'];
        $trx['status'] = $newStatus;
        if (!empty($newSn)) $trx['sn'] = $newSn;
        $trx['status_override'] = ($newStatus === 'BERHASIL' || $newStatus === 'GAGAL');

        // LOGIKA KHUSUS TOPUP SALDO VS TRX REGULER
        $isTopup = (($trx['server_code'] ?? '') === 'TOPUP SALDO' || ($trx['kode_produk'] ?? '') === 'SALDO' || strpos($refidH2H, 'TP-') === 0);

        if ($isTopup) {
            $adminName = get_admin_name_by_token($token);
            if ($newStatus === 'BERHASIL' && $oldStatus !== 'BERHASIL') {
                $harga = (int)($trx['harga'] ?? 0);
                if ($harga > 0) {
                    ledger_topup($targetUserId, $harga, array(
                        'refid'       => $trx['refid_h2h'] ?? '-',
                        'refid_pusat' => $trx['refid_pusat'] ?? '',
                        'kode_produk' => 'SALDO',
                        'produk_nama' => 'Topup Saldo',
                        'server'      => $trx['server_code'] ?? 'TOPUP SALDO',
                        'status'      => 'BERHASIL',
                        'keterangan'  => 'Topup saldo disetujui admin',
                        'catatan'     => 'Status topup diubah manual menjadi BERHASIL oleh admin',
                        'admin'       => $adminName,
                    ));
                }
            }
            if ($newStatus === 'GAGAL' && $oldStatus === 'BERHASIL') {
                $harga = (int)($trx['harga'] ?? 0);
                if ($harga > 0) {
                    ledger_charge($targetUserId, $harga, array(
                        'jenis'       => 'PENYESUAIAN',
                        'refid'       => $trx['refid_h2h'] ?? '-',
                        'refid_pusat' => $trx['refid_pusat'] ?? '',
                        'kode_produk' => 'SALDO',
                        'produk_nama' => 'Topup Saldo',
                        'server'      => $trx['server_code'] ?? 'TOPUP SALDO',
                        'status'      => 'GAGAL',
                        'keterangan'  => 'Pembatalan topup saldo oleh admin',
                        'catatan'     => 'Status topup diubah manual dari BERHASIL menjadi GAGAL oleh admin',
                        'admin'       => $adminName,
                    ));
                }
            }

            $dbTopup = __DIR__ . '/data_private/db_topup.json';
            if (file_exists($dbTopup)) {
                $topups = json_decode(file_get_contents($dbTopup), true);
                if (isset($topups[$refidH2H])) {
                    $topups[$refidH2H]['status'] = $newStatus;
                    
                    if ($oldStatus === 'PENDING') {
                        $botToken = '8926295191:AAF2x-eTa4l7bvWJazDPaECvHo0jl2PV7uU';
                        $chatId = '-1003824292653';
                        $msgId = $topups[$refidH2H]['tele_msg_id'] ?? null;
                        
                        if ($msgId) {
                            $tData = $topups[$refidH2H];
                            if ($newStatus === 'BERHASIL') {
                                $newText = "✅ <b>TOPUP BERHASIL DITERIMA (Diubah Via Web Panel)</b>\n\n👤 <b>User:</b> {$tData['username']}\n💰 <b>Nominal Masuk:</b> Rp " . number_format($tData['unique_amount'], 0, ',', '.');
                            } else {
                                $newText = "❌ <b>TOPUP DITOLAK (Diubah Via Web Panel)</b>\n\n👤 <b>User:</b> {$tData['username']}\n💰 <b>Nominal:</b> Rp " . number_format($tData['unique_amount'], 0, ',', '.');
                            }
                            
                            $url = "https://api.telegram.org/bot$botToken/editMessageText";
                            $ch = curl_init($url);
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                            curl_setopt($ch, CURLOPT_POST, true);
                            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(['chat_id' => $chatId, 'message_id' => $msgId, 'text' => $newText, 'parse_mode' => 'HTML']));
                            curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
                            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
                            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                            curl_exec($ch); curl_close($ch);
                        }
                    }
                    file_put_contents($dbTopup, json_encode($topups, JSON_PRETTY_PRINT));
                }
            }
        } else {
            $adminName = get_admin_name_by_token($token);
            if ($newStatus === 'GAGAL' && $oldStatus !== 'GAGAL') {
                $harga = (int)($trx['harga'] ?? 0);
                if ($harga > 0) {
                    ledger_refund($targetUserId, $harga, array(
                        'refid'       => $trx['refid_h2h'] ?? '-',
                        'refid_pusat' => $trx['refid_pusat'] ?? '',
                        'kode_produk' => $trx['kode_produk'] ?? '',
                        'produk_nama' => $trx['produk_nama'] ?? '',
                        'target'      => $trx['target'] ?? '',
                        'server'      => $trx['server_code'] ?? $trx['server'] ?? '',
                        'status'      => 'GAGAL',
                        'keterangan'  => 'Refund ' . ledger_product_name($trx['kode_produk'] ?? '', $trx['produk_nama'] ?? ''),
                        'catatan'     => 'Transaksi ditandai GAGAL manual oleh admin (' . $oldStatus . ' -> GAGAL)',
                        'admin'       => $adminName,
                        'trx_id'      => $trx['trx_id'] ?? '',
                    ));
                }
            }
            if ($oldStatus === 'GAGAL' && $newStatus !== 'GAGAL') {
                $harga = (int)($trx['harga'] ?? 0);
                if ($harga > 0) {
                    ledger_charge($targetUserId, $harga, array(
                        'jenis'       => 'PENYESUAIAN',
                        'refid'       => $trx['refid_h2h'] ?? '-',
                        'refid_pusat' => $trx['refid_pusat'] ?? '',
                        'kode_produk' => $trx['kode_produk'] ?? '',
                        'produk_nama' => $trx['produk_nama'] ?? '',
                        'target'      => $trx['target'] ?? '',
                        'server'      => $trx['server_code'] ?? $trx['server'] ?? '',
                        'status'      => $newStatus,
                        'keterangan'  => 'Penyesuaian saldo: status transaksi dibalik oleh admin',
                        'catatan'     => 'Status diubah manual GAGAL -> ' . $newStatus . ' oleh admin, saldo dipotong kembali',
                        'admin'       => $adminName,
                        'trx_id'      => $trx['trx_id'] ?? '',
                    ));
                }
            }
        }

        save_user_transaction($targetUserId, $trx);
        echo json_encode(['status' => true, 'message' => "Status $refidH2H diubah ke $newStatus."]);
        break;

    case 'admin_sync_upstream_status':
        $token = $input['session_token'] ?? '';
        if (!check_admin_access($token)) { echo json_encode(['status' => false, 'message' => 'Khusus Admin']); exit; }

        $targetUserId = $input['target_user_id'] ?? '';
        $refidH2H     = $input['refid_h2h'] ?? '';

        $trx = find_transaction_by_any_refid($targetUserId, $refidH2H);
        if (!$trx) { echo json_encode(['status' => false, 'message' => 'Transaksi tidak ditemukan']); exit; }

        $updatedTrx  = sync_transaction_status($trx['user_id'], $trx, true);
        $rawUpstream = query_raw_upstream_response($trx);

        echo json_encode([
            'status'       => true,
            'message'      => 'Berhasil mengecek status!',
            'refid_h2h'    => $trx['refid_h2h'],
            'refid_pusat'  => $trx['refid_pusat'],
            'raw_response' => $rawUpstream
        ]);
        break;

    case 'admin_regen_user_key':
        $token = $input['session_token'] ?? '';
        if (!check_admin_access($token)) { echo json_encode(['status' => false, 'message' => 'Khusus Admin']); exit; }
        $userId = $input['target_id'] ?? '';
        $users  = get_users_data();
        foreach ($users as $idx => $u) {
            if ($u['id'] === $userId) {
                $newKey = 'dt17_' . bin2hex(random_bytes(16));
                $users[$idx]['api_key'] = $newKey;
                save_users_data($users);
                echo json_encode(['status' => true, 'message' => 'API Key user diganti!', 'new_api_key' => $newKey]); exit;
            }
        }
        echo json_encode(['status' => false, 'message' => 'User ID tidak ditemukan']);
        break;

    case 'admin_delete_user':
        $token = $input['session_token'] ?? '';
        if (!check_admin_access($token)) { echo json_encode(['status' => false, 'message' => 'Khusus Admin']); exit; }
        $userId = $input['target_id'] ?? '';
        $users  = array_filter(get_users_data(), function($u) use ($userId) { return $u['id'] !== $userId; });
        save_users_data(array_values($users));
        echo json_encode(['status' => true, 'message' => 'User berhasil dihapus']);
        break;

    case 'get_okeconnect_config':
        $token = $input['session_token'] ?? $_GET['session_token'] ?? '';
        if (!check_admin_access($token)) { echo json_encode(['status' => false, 'message' => 'Khusus Admin']); exit; }
        echo json_encode(['status' => true, 'data' => get_okeconnect_config()]);
        break;

    case 'save_okeconnect_config':
        $token = $input['session_token'] ?? '';
        if (!check_admin_access($token)) { echo json_encode(['status' => false, 'message' => 'Khusus Admin']); exit; }
        $dir = __DIR__ . '/data_private';
        if (!is_dir($dir)) @mkdir($dir, 0755, true);
        $cfg = [
            'member_id'  => trim($input['member_id'] ?? ''),
            'pin'        => trim($input['pin'] ?? ''),
            'password'   => trim($input['password'] ?? ''),
            'updated_at' => date('Y-m-d H:i:s')
        ];
        @file_put_contents($dir . '/gateway_okeconnect.json', json_encode($cfg, JSON_PRETTY_PRINT));
        echo json_encode(['status' => true, 'message' => 'Kredensial OkeConnect berhasil disimpan']);
        break;

    // ==================================================================
    // AUDIT SALDO — BUKU BESAR SALDO PER USER (MENU AUDIT DI PANELADMIN)
    // ==================================================================
    case 'admin_get_audit':
        $token = $input['session_token'] ?? $_GET['session_token'] ?? '';
        if (!check_admin_access($token)) { echo json_encode(['status' => false, 'message' => 'Khusus Admin']); exit; }

        $targetUserId = trim((string)($input['target_user_id'] ?? $_GET['target_user_id'] ?? $input['user_id'] ?? $_GET['user_id'] ?? ''));
        if ($targetUserId === '') {
            echo json_encode(['status' => false, 'message' => 'User belum dipilih']); exit;
        }

        $users = get_users_data();
        $target = null;
        foreach ($users as $u) {
            if (($u['id'] ?? '') === $targetUserId || strtolower((string)($u['username'] ?? '')) === strtolower($targetUserId)) {
                $target = $u; break;
            }
        }
        if (!$target) { echo json_encode(['status' => false, 'message' => 'User tidak ditemukan']); exit; }

        unset($target['password']);

        $ledger   = get_user_ledger($target['id']);
        $validate = ledger_validate_chain($ledger);
        $summary  = ledger_summary($ledger);

        echo json_encode([
            'status' => true,
            'data'   => [
                'user'    => [
                    'id'       => $target['id'],
                    'username' => $target['username'] ?? '',
                    'email'    => $target['email'] ?? '',
                    'nomorwa'  => $target['nomorwa'] ?? '',
                    'role'     => $target['role'] ?? 'user',
                ],
                'saldo'   => (int)($target['saldo'] ?? 0),
                'saldo_tercatat' => !empty($ledger) ? (int)(end($ledger)['saldo_akhir'] ?? 0) : (int)($target['saldo'] ?? 0),
                'ledger'  => $ledger,
                'summary' => $summary,
                'chain'   => $validate,
            ]
        ]);
        break;

    default:
        echo json_encode(['status' => false, 'message' => 'Action Auth tidak valid']);
        break;
}