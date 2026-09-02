<?php
// FILE: topup_api.php
// SISTEM TOPUP MANUAL (DANA & SEABANK) & TELEGRAM WEBHOOK
header('Content-Type: application/json');
ini_set('display_errors', 0);
date_default_timezone_set('Asia/Jakarta');

require_once __DIR__ . '/auth_helper.php';

// --- KONFIGURASI BOT ---
$botToken = '8926295191:AAF2x-eTa4l7bvWJazDPaECvHo0jl2PV7uU';
$chatId = '-1003824292653';

function telegramAPI($method, $data) {
    global $botToken;
    $url = "https://api.telegram.org/bot$botToken/$method";
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_TIMEOUT, 15);
    $res = curl_exec($ch);
    curl_close($ch);
    return json_decode($res, true);
}

// Database Topup Internal
$dbTopup = __DIR__ . '/data_private/db_topup.json';
function getTopups() { 
    global $dbTopup; 
    return file_exists($dbTopup) ? json_decode(file_get_contents($dbTopup), true) : []; 
}
function saveTopups($data) { 
    global $dbTopup; 
    $dir = dirname($dbTopup);
    if (!is_dir($dir)) @mkdir($dir, 0755, true);
    file_put_contents($dbTopup, json_encode($data, JSON_PRETTY_PRINT)); 
}

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

// HANDLER WEBHOOK DARI TELEGRAM (TOMBOL)
$inputRaw = file_get_contents('php://input');
$update = json_decode($inputRaw, true);

if (isset($update['callback_query'])) {
    $cb = $update['callback_query'];
    $cbData = $cb['data'];
    $msgId = $cb['message']['message_id'];
    $cbId = $cb['id'];
    
    if (strpos($cbData, 'topup_') === 0) {
        $parts = explode('_', $cbData);
        $action = $parts[1]; 
        $topupId = $parts[2];
        
        $topups = getTopups();
        if (!isset($topups[$topupId])) {
            telegramAPI('answerCallbackQuery', ['callback_query_id' => $cbId, 'text' => 'Data request Topup ini sudah tidak ada!', 'show_alert' => true]);
            exit;
        }
        
        $tData = $topups[$topupId];
        if ($tData['status'] !== 'PENDING') {
            telegramAPI('answerCallbackQuery', ['callback_query_id' => $cbId, 'text' => 'Topup ini SUDAH DIPROSES sebelumnya (Status: '.$tData['status'].')!', 'show_alert' => true]);
            exit;
        }
        
        $topups[$topupId]['status'] = ($action === 'accept') ? 'BERHASIL' : 'DITOLAK';
        saveTopups($topups);
        
        if ($action === 'accept') {
            add_user_balance($tData['user_id'], $tData['unique_amount']);
            $trx = [
                'user_id' => $tData['user_id'],
                'username' => $tData['username'],
                'refid_h2h' => $topupId,
                'server_code' => 'TOPUP SALDO',
                'kode_produk' => 'SALDO',
                'target' => 'TRANSFER',
                'harga' => $tData['unique_amount'],
                'status' => 'BERHASIL',
                'sn' => 'Disetujui Admin',
                'status_override' => true
            ];
            save_user_transaction($tData['user_id'], $trx);
            
            $newText = "✅ <b>TOPUP BERHASIL DITERIMA</b>\n\n👤 <b>User:</b> {$tData['username']} / {$tData['email']}\n💰 <b>Nominal Masuk:</b> Rp " . number_format($tData['unique_amount'], 0, ',', '.'). "\n🕒 <b>Waktu Proses:</b> " . date('Y-m-d H:i:s');
            telegramAPI('editMessageText', ['chat_id' => $chatId, 'message_id' => $msgId, 'text' => $newText, 'parse_mode' => 'HTML']);
            telegramAPI('answerCallbackQuery', ['callback_query_id' => $cbId, 'text' => '✅ BERHASIL! Saldo User telah ditambahkan.']);
            
        } else { 
            $trx = [
                'user_id' => $tData['user_id'],
                'username' => $tData['username'],
                'refid_h2h' => $topupId,
                'server_code' => 'TOPUP SALDO',
                'kode_produk' => 'SALDO',
                'target' => 'TRANSFER',
                'harga' => $tData['unique_amount'],
                'status' => 'GAGAL',
                'sn' => 'Ditolak Admin',
                'status_override' => true
            ];
            save_user_transaction($tData['user_id'], $trx);
            
            $newText = "❌ <b>TOPUP DITOLAK (Admin)</b>\n\n👤 <b>User:</b> {$tData['username']} / {$tData['email']}\n💰 <b>Nominal Request:</b> Rp " . number_format($tData['unique_amount'], 0, ',', '.'). "\n🕒 <b>Waktu Proses:</b> " . date('Y-m-d H:i:s');
            telegramAPI('editMessageText', ['chat_id' => $chatId, 'message_id' => $msgId, 'text' => $newText, 'parse_mode' => 'HTML']);
            telegramAPI('answerCallbackQuery', ['callback_query_id' => $cbId, 'text' => '❌ Topup Ditolak!']);
        }
    }
    exit;
}

$post = json_decode($inputRaw, true);
if (!$post || !isset($post['action'])) exit;

if (!isset($post['session_token']) || empty($post['session_token'])) {
    echo json_encode(['status' => false, 'message' => 'Token sesi tidak dikirim']); exit;
}

// ADMIN ENDPOINTS (DIPANGGIL DARI PANELADMIN.HTML)
if ($post['action'] === 'admin_list_topup') {
    if (!check_admin_access($post['session_token'])) { echo json_encode(['status' => false, 'message' => 'Khusus Admin']); exit; }
    $topups = getTopups();
    usort($topups, function($a, $b) { return $b['time'] - $a['time']; });
    echo json_encode(['status' => true, 'data' => array_values($topups)]);
    exit;
}

if ($post['action'] === 'admin_action_topup') {
    if (!check_admin_access($post['session_token'])) { echo json_encode(['status' => false, 'message' => 'Khusus Admin']); exit; }
    $topupId = $post['topup_id'];
    $act = $post['act'];
    
    $topups = getTopups();
    if (!isset($topups[$topupId])) {
        echo json_encode(['status' => false, 'message' => 'Data request Topup ini sudah tidak ada!']); exit;
    }
    
    $tData = $topups[$topupId];
    if ($tData['status'] !== 'PENDING') {
        echo json_encode(['status' => false, 'message' => 'Topup ini SUDAH DIPROSES sebelumnya!']); exit;
    }
    
    $topups[$topupId]['status'] = ($act === 'accept') ? 'BERHASIL' : 'DITOLAK';
    saveTopups($topups);
    
    if ($act === 'accept') {
        add_user_balance($tData['user_id'], $tData['unique_amount']);
        $trx = [
            'user_id' => $tData['user_id'],
            'username' => $tData['username'],
            'refid_h2h' => $topupId,
            'server_code' => 'TOPUP SALDO',
            'kode_produk' => 'SALDO',
            'target' => 'TRANSFER',
            'harga' => $tData['unique_amount'],
            'status' => 'BERHASIL',
            'sn' => 'Disetujui Admin',
            'status_override' => true
        ];
        save_user_transaction($tData['user_id'], $trx);
        echo json_encode(['status' => true, 'message' => 'Topup berhasil diterima, saldo ditambahkan.']);
    } else {
        $trx = [
            'user_id' => $tData['user_id'],
            'username' => $tData['username'],
            'refid_h2h' => $topupId,
            'server_code' => 'TOPUP SALDO',
            'kode_produk' => 'SALDO',
            'target' => 'TRANSFER',
            'harga' => $tData['unique_amount'],
            'status' => 'GAGAL',
            'sn' => 'Ditolak Admin',
            'status_override' => true
        ];
        save_user_transaction($tData['user_id'], $trx);
        echo json_encode(['status' => true, 'message' => 'Topup berhasil ditolak.']);
    }
    
    // Update Telegram Message
    if (isset($tData['tele_msg_id'])) {
        $newText = ($act === 'accept') 
            ? "✅ <b>TOPUP BERHASIL DITERIMA (Via Panel)</b>\n\n👤 <b>User:</b> {$tData['username']}\n💰 <b>Nominal Masuk:</b> Rp " . number_format($tData['unique_amount'], 0, ',', '.')
            : "❌ <b>TOPUP DITOLAK (Via Panel)</b>\n\n👤 <b>User:</b> {$tData['username']}\n💰 <b>Nominal:</b> Rp " . number_format($tData['unique_amount'], 0, ',', '.');
        telegramAPI('editMessageText', ['chat_id' => $chatId, 'message_id' => $tData['tele_msg_id'], 'text' => $newText, 'parse_mode' => 'HTML']);
    }
    
    exit;
}

// USER ENDPOINTS
$users = get_users_data();
$currentUser = null;
foreach ($users as $u) {
    if (isset($u['session_token']) && $u['session_token'] === $post['session_token']) {
        $currentUser = $u; break;
    }
}

if (!$currentUser) {
    echo json_encode(['status' => false, 'message' => 'Sesi tidak valid / Kadaluarsa. Silakan refresh halaman.']); exit;
}

if ($post['action'] === 'request') {
    $amount = (int)$post['amount'];
    if ($amount < 50000) { echo json_encode(['status' => false, 'message' => 'Minimal Rp 50.000']); exit; }
    
    $topups = getTopups();
    foreach ($topups as $tk => $tv) {
        if ($tv['user_id'] == $currentUser['id'] && $tv['status'] === 'PENDING') {
            if ((time() - $tv['time']) < 3600) {
                echo json_encode(['status' => false, 'message' => 'Anda masih memiliki Topup PENDING! Selesaikan/batalkan terlebih dahulu.']);
                exit;
            }
        }
    }

    $unique = rand(100, 999);
    $finalAmount = $amount + $unique;
    $topupId = 'TP-' . time() . rand(10,99);
    
    $waText = urlencode("Halo {$currentUser['username']},\n\nBerikut adalah tagihan Topup Saldo H2H Anda:\nNominal: *Rp " . number_format($finalAmount, 0, ',', '.') . "*\nMetode: Transfer DANA / SeaBank\n\nHarap transfer *TEPAT* sesuai nominal unik di atas agar saldo otomatis masuk.\nTerima kasih.");
    $waNumber = preg_replace('/[^0-9]/', '', $currentUser['nomorwa']);
    if (strpos($waNumber, '0') === 0) $waNumber = '62' . substr($waNumber, 1);
    $waLink = "https://wa.me/{$waNumber}?text=$waText";
    
    $msgText = "🔔 <b>REQUEST TOPUP TRANSFER BARU</b>\n\n👤 <b>User:</b> {$currentUser['username']}\n📧 <b>Email:</b> {$currentUser['email']}\n📱 <b>WA:</b> {$currentUser['nomorwa']}\n💰 <b>Nominal Tagihan:</b> Rp " . number_format($finalAmount, 0, ',', '.') . "\n\n<i>Harap cek mutasi rekening sebelum klik Terima. Kadaluarsa dlm 1 Jam.</i>";
    
    $keyboard = [
        'inline_keyboard' => [
            [
                ['text' => '✅ Terima', 'callback_data' => "topup_accept_$topupId"],
                ['text' => '❌ Tolak', 'callback_data' => "topup_reject_$topupId"]
            ],
            [
                ['text' => '📲 Kirim Invoice ke WA User', 'url' => $waLink]
            ]
        ]
    ];
    
    $teleRes = telegramAPI('sendMessage', [
        'chat_id' => $chatId,
        'text' => $msgText,
        'parse_mode' => 'HTML',
        'reply_markup' => $keyboard
    ]);
    
    $msgId = $teleRes['result']['message_id'] ?? null;
    
    $topups[$topupId] = [
        'id' => $topupId, 'user_id' => $currentUser['id'],
        'username' => $currentUser['username'], 'email' => $currentUser['email'],
        'unique_amount' => $finalAmount, 'status' => 'PENDING',
        'time' => time(), 'tele_msg_id' => $msgId
    ];
    saveTopups($topups);
    
    $trx = [
        'user_id' => $currentUser['id'],
        'username' => $currentUser['username'],
        'refid_h2h' => $topupId,
        'server_code' => 'TOPUP SALDO',
        'kode_produk' => 'SALDO',
        'target' => 'TRANSFER',
        'harga' => $finalAmount,
        'status' => 'PENDING',
        'sn' => 'Menunggu Pembayaran / Konfirmasi Admin',
        'created_at' => date('Y-m-d H:i:s'),
        'status_override' => true
    ];
    save_user_transaction($currentUser['id'], $trx);
    
    echo json_encode(['status' => true, 'data' => ['id' => $topupId, 'unique_amount' => $finalAmount]]);
    exit;
}

if ($post['action'] === 'cancel') {
    $topupId = $post['topup_id'];
    $topups = getTopups();
    
    if (isset($topups[$topupId]) && $topups[$topupId]['status'] === 'PENDING') {
        $tData = $topups[$topupId];
        $msgId = $tData['tele_msg_id'];
        
        $topups[$topupId]['status'] = 'CANCELED';
        saveTopups($topups);
        
        $trx = [
            'user_id' => $tData['user_id'],
            'username' => $tData['username'],
            'refid_h2h' => $topupId,
            'server_code' => 'TOPUP SALDO',
            'kode_produk' => 'SALDO',
            'target' => 'TRANSFER',
            'harga' => $tData['unique_amount'],
            'status' => 'GAGAL',
            'sn' => 'Dibatalkan User',
            'status_override' => true
        ];
        save_user_transaction($tData['user_id'], $trx);
        
        if ($msgId) {
            $newText = "⚠️ <b>TOPUP DIBATALKAN OLEH USER (CANCEL)</b>\n\n👤 <b>User:</b> {$tData['username']} / {$tData['email']}\n💰 <b>Nominal:</b> Rp " . number_format($tData['unique_amount'], 0, ',', '.');
            telegramAPI('editMessageText', ['chat_id' => $chatId, 'message_id' => $msgId, 'text' => $newText, 'parse_mode' => 'HTML']);
        }
        
        echo json_encode(['status' => true, 'message' => 'Topup berhasil dibatalkan.']);
    } else {
        echo json_encode(['status' => false, 'message' => 'Topup tidak valid atau sudah diproses admin.']);
    }
    exit;
}
?>