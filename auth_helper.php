<?php
// auth_helper.php - Complete Data Parser, OkeConnect Integration, Stock & Balance Engine + System On/Off & Multi-Markup
ini_set('display_errors', 0);
date_default_timezone_set('Asia/Jakarta');

// ==========================================
// SISTEM KONFIGURASI GLOBAL & ON/OFF API
// ==========================================

function get_system_config() {
    $filePath = __DIR__ . '/data_private/system_config.json';
    if (!file_exists($filePath)) {
        $default = [
            'api_status'  => ['api1' => true, 'api2' => true, 'api3' => true, 'api4' => true],
            'otp_enabled' => true
        ];
        $dir = __DIR__ . '/data_private';
        if (!is_dir($dir)) @mkdir($dir, 0755, true);
        @file_put_contents($filePath, json_encode($default, JSON_PRETTY_PRINT));
        return $default;
    }
    $content = @file_get_contents($filePath);
    return json_decode($content, true) ?? [];
}

function save_system_config($config) {
    $dir = __DIR__ . '/data_private';
    if (!is_dir($dir)) @mkdir($dir, 0755, true);
    @file_put_contents($dir . '/system_config.json', json_encode($config, JSON_PRETTY_PRINT));
}

function is_api_active($apiCode) {
    $config = get_system_config();
    if (isset($config['api_status'][$apiCode])) {
        return (bool)$config['api_status'][$apiCode];
    }
    return true;
}

function check_api_status_or_die($apiCode) {
    if (!is_api_active($apiCode)) {
        http_response_code(200);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode([
            'status'  => false,
            'message' => 'System sedang di matikan Oleh Admin.'
        ]);
        exit;
    }
}

// ==========================================
// PENGELOLAAN DATA USER & VALIDASI API KEY
// ==========================================

function get_users_data() {
    $filePath = __DIR__ . '/data_private/users.json';
    if (!file_exists($filePath)) return [];
    $content = @file_get_contents($filePath);
    return json_decode($content, true) ?? [];
}

function save_users_data($data) {
    $dir = __DIR__ . '/data_private';
    if (!is_dir($dir)) @mkdir($dir, 0755, true);
    @file_put_contents($dir . '/users.json', json_encode($data, JSON_PRETTY_PRINT));
}

function validate_api_key($apiKey) {
    if (empty($apiKey)) return false;
    $users = get_users_data();
    if (!is_array($users)) return false;
    foreach ($users as $user) {
        if (isset($user['api_key']) && $user['api_key'] === $apiKey) {
            if (!empty($user['is_blocked']) || ($user['status'] ?? '') === 'blocked' || ($user['status'] ?? '') === 'suspended') {
                return false;
            }
            if (!isset($user['markup'])) $user['markup'] = 0;
            if (!isset($user['markup_api1'])) $user['markup_api1'] = $user['markup'];
            if (!isset($user['markup_api2'])) $user['markup_api2'] = $user['markup'];
            if (!isset($user['markup_api3'])) $user['markup_api3'] = $user['markup'];
            if (!isset($user['markup_api4'])) $user['markup_api4'] = $user['markup'];
            if (!isset($user['saldo'])) $user['saldo'] = 0;
            return $user;
        }
    }
    return false;
}

// ==========================================
// SISTEM SALDO USER (POTONG & REFUND)
// ==========================================

function deduct_user_balance($userId, $amount) {
    $users = get_users_data();
    foreach ($users as $idx => $u) {
        if ($u['id'] === $userId) {
            $cur = (int)($u['saldo'] ?? 0);
            $newSaldo = max(0, $cur - (int)$amount);
            $users[$idx]['saldo'] = $newSaldo;
            save_users_data($users);
            return $newSaldo;
        }
    }
    return 0;
}

function add_user_balance($userId, $amount) {
    $users = get_users_data();
    foreach ($users as $idx => $u) {
        if ($u['id'] === $userId) {
            $cur = (int)($u['saldo'] ?? 0);
            $newSaldo = $cur + (int)$amount;
            $users[$idx]['saldo'] = $newSaldo;
            save_users_data($users);
            return $newSaldo;
        }
    }
    return 0;
}

// ==========================================
// SISTEM MARKUP HARGA PER-AKUN & PER-API
// ==========================================

function get_user_markup_for_api($user, $apiCode) {
    if (!is_array($user)) return 0;
    $key = 'markup_' . strtolower($apiCode);
    if (isset($user[$key]) && is_numeric($user[$key])) {
        return (int)$user[$key];
    }
    return (int)($user['markup'] ?? 0);
}

function apply_user_markup(&$products, $userMarkup) {
    if (!is_array($products)) return;
    $markup = (int)($userMarkup ?? 0);

    foreach ($products as &$item) {
        if (!is_array($item)) continue;

        $keysToUpdate = ['harga_final', 'harga', 'price', 'harga_reseller', 'modal', 'harga_modal', 'harga_asli'];
        foreach ($keysToUpdate as $key) {
            if (isset($item[$key]) && is_numeric($item[$key])) {
                $item[$key] = (int)$item[$key] + $markup;
            }
        }
    }
}

// ==========================================
// PEMBERSIH KREDENSIAL & SENSOR KEAMANAN STRICT
// ==========================================

function clean_api_message($data) {
    if (is_array($data)) {
        foreach ($data as $key => $value) {
            $data[$key] = clean_api_message($value);
        }
        return $data;
    } elseif (is_string($data)) {
        $text = $data;

        if (strpos(strtolower($text), '401') !== false || strpos(strtolower($text), 'unauthorized') !== false) {
            return 'Gagal: Akses API Provider Ditolak (401 Unauthorized / IP Hosting Belum Di-Whitelist)';
        }

        // OTOMATIS GANTI PESAN SALDO SUPPLIER HABIS/KURANG
        $text = preg_replace('/sisa saldo (?:kamu|anda) kurang dari (?:Rp\.?\s*)?[\d\.\,]+/i', 'Admin Belum Restock segera hubungi admin', $text);
        $text = preg_replace('/sisa saldo (?:kamu|anda) kurang[^\.]*/i', 'Admin Belum Restock segera hubungi admin', $text);
        $text = preg_replace('/saldo (?:kamu|anda|member|reseller) (?:kurang|tidak cukup|tidak mencukupi)[^\.]*/i', 'Admin Belum Restock segera hubungi admin', $text);
        $text = preg_replace('/insufficient balance/i', 'Admin Belum Restock segera hubungi admin', $text);

        if (strpos($text, '#') !== false) {
            $parts = explode('#', $text);
            $text = end($parts);
        }

        $text = preg_replace('/kodereseller\s*:\s*[^,\s#]+/i', '', $text);
        $text = preg_replace('/password\s*:\s*[^,\s#]+/i', '', $text);
        $text = preg_replace('/pin\s*:\s*[^,\s#]+/i', '', $text);
        $text = preg_replace('/time\s*:\s*[^,\s#]+/i', '', $text);
        $text = preg_replace('/req\s*:\s*[^,\s#]+/i', '', $text);
        $text = preg_replace('/msisdn\s*:\s*[^,\s#]+/i', '', $text);
        $text = preg_replace('/reffid\s*:\s*[^,\s#]+/i', '', $text);

        $text = preg_replace('/\\\\\"password\\\\\"\s*:\s*\\\\\"[^\"]+\\\\\"/i', '', $text);
        $text = preg_replace('/\\\\\"pin\\\\\"\s*:\s*\\\\\"[^\"]+\\\\\"/i', '', $text);
        $text = preg_replace('/\\\\\"kodereseller\\\\\"\s*:\s*\\\\\"[^\"]+\\\\\"/i', '', $text);

        $text = preg_replace('/@\d{4}-\d{2}-\d{2}\s+\d{2}:\d{2}:\d{2}/i', '', $text);
        $text = preg_replace('/@\d{2}:\d{2}:\d{2}/i', '', $text);

        $text = preg_replace('/Saldo\s+[\d\.,\s\-\=]+(@\d{2}:\d{2})?/i', '', $text);
        $text = preg_replace('/Hrg\s+[\d\.,]+/i', '', $text);

        $patterns = [
            '/KHFY/i'       => 'SERVER-1',
            '/khfy-store/i' => 'dt17.store',
            '/khfy/i'       => 'S1',
            '/KF-/i'        => 'TRX1-',
            '/KAJE/i'       => 'S1',
            '/ICS/i'        => 'SERVER-2',
            '/ics-store/i'  => 'dt17.store',
            '/ics/i'        => 'S2',
            '/WUZZSTORE/i'  => 'SERVER-3',
            '/wuzzstore/i'  => 'dt17.store',
            '/WZ/i'         => 'S3',
            '/wz/i'         => 's3',
            '/OKECONNECT/i' => 'SERVER-4',
            '/okeconnect/i' => 'dt17.store'
        ];
        $text = preg_replace(array_keys($patterns), array_values($patterns), $text);

        $text = trim($text, " \t\n\r\0\x0B,.-#@(){}[]\\");
        return $text ?: '-';
    }
    return $data;
}

function sanitize_raw_debug_response($data) {
    if (is_array($data)) {
        foreach ($data as $k => $v) {
            if (in_array(strtolower($k), ['password', 'pin', 'kodereseller', 'saldo_awal', 'saldo_akhir'])) {
                $data[$k] = '***SENSITIF***';
            } else {
                $data[$k] = sanitize_raw_debug_response($v);
            }
        }
        return $data;
    } elseif (is_string($data)) {
        $data = preg_replace('/(\\\"?password\\\?"\s*:\s*\\\")[^\\\"]+(\\\")/i', '$1***SENSITIF***$2', $data);
        $data = preg_replace('/(\\\"?pin\\\?"\s*:\s*\\\")[^\\\"]+(\\\")/i', '$1***SENSITIF***$2', $data);
        $data = preg_replace('/(password\s*:\s*)[^\s,#]+/i', '$1***SENSITIF***', $data);
        $data = preg_replace('/(pin\s*:\s*)[^\s,#]+/i', '$1***SENSITIF***', $data);
        return $data;
    }
    return $data;
}

// ==========================================
// PENENTUAN STATUS TRANSAKSI OTOMATIS & AKURAT
// ==========================================

function detect_trx_status($rawJson, $rawMessage = '') {
    $msgText = strtolower(trim($rawMessage));

    if (is_array($rawJson)) {
        $jsonMsg = $rawJson['keterangan'] ?? $rawJson['message'] ?? $rawJson['msg'] ?? $rawJson['raw_response'] ?? '';
        if (is_string($jsonMsg)) {
            $msgText .= ' ' . strtolower($jsonMsg);
        }
    }

    // 1. Cek Kata Kunci GAGAL (Termasuk 'tidak ditemukan', 'tidak ada', 'tidak ada data')
    $isFailed = (bool)preg_match('/\b(gagal|failed|error|salah|invalid|batal|canceled|cancelled|refund|denied|unauthorized|forbidden|gangguan|kosong|dtolak|ditolak)\b/i', $msgText)
        || (strpos($msgText, 'tidak ditemukan') !== false)
        || (strpos($msgText, 'tidak ada') !== false)
        || (strpos($msgText, 'no data') !== false)
        || (strpos($msgText, 'not found') !== false)
        || (strpos($msgText, 'kadaluarsa') !== false);

    // 2. Cek Kata Kunci PENDING / PROSES
    $isPending = (bool)preg_match('/\b(diproses|akan diproses|sedang diproses|pending|process|processing|antrian|queue|wait|waiting)\b/i', $msgText);

    // 3. Cek Kata Kunci SUKSES / BERHASIL
    $isSuccess = (bool)preg_match('/\b(sukses|berhasil|success|done|complete|completed)\b/i', $msgText) || strpos($msgText, 'sn:') !== false;

    if ($isFailed && !$isPending) {
        return 'GAGAL';
    }

    if ($isSuccess && !$isPending) {
        return 'BERHASIL';
    }

    if ($isPending && !$isFailed) {
        return 'PENDING';
    }

    if (is_array($rawJson)) {
        $stCode = $rawJson['status_code'] ?? $rawJson['status2'] ?? $rawJson['code'] ?? null;
        if (isset($rawJson['data'][0]['status2'])) {
            $stCode = $rawJson['data'][0]['status2'];
        }

        if ($stCode === 20 || $stCode === '20' || $stCode === 0 || $stCode === '0' || $stCode === 200) {
            return 'BERHASIL';
        }
        if ($stCode === 72 || $stCode === '72' || $stCode === 2 || $stCode === '2' || $stCode === 500) {
            return 'GAGAL';
        }
    }

    return $isFailed ? 'GAGAL' : 'PENDING';
}

// ==========================================
// SISTEM UNIVERSAL REFFID LOOKUP & HISTORY (WITH FILE LOCKING PROTECTION)
// ==========================================

function get_user_history_file($userId) {
    $dir = __DIR__ . '/data_private/history';
    if (!is_dir($dir)) @mkdir($dir, 0755, true);
    $cleanId = preg_replace('/[^a-zA-Z0-9_-]/', '', $userId);
    return $dir . '/history_' . $cleanId . '.json';
}

function get_user_transactions($userId) {
    if (empty($userId)) return [];
    $file = get_user_history_file($userId);
    if (!file_exists($file)) return [];
    
    $fp = @fopen($file, 'r');
    if (!$fp) return [];
    
    $content = '';
    if (@flock($fp, LOCK_SH)) {
        $content = @stream_get_contents($fp);
        @flock($fp, LOCK_UN);
    } else {
        $content = @file_get_contents($file);
    }
    @fclose($fp);

    $data = json_decode($content, true);
    return is_array($data) ? $data : [];
}

function save_user_transaction($userId, $trx) {
    if (empty($userId)) {
        $userId = $trx['user_id'] ?? '';
    }
    if (empty($userId)) return $trx;

    $file = get_user_history_file($userId);
    
    // Buka file dengan mode c+ dan gunakan Exclusive Lock (LOCK_EX) Mencegah Corrupt/Hilang
    $fp = @fopen($file, 'c+');
    if (!$fp) return $trx;

    if (@flock($fp, LOCK_EX)) {
        $content = @stream_get_contents($fp);
        $history = json_decode($content, true);
        if (!is_array($history)) {
            $history = [];
        }

        $found = false;
        foreach ($history as $idx => $item) {
            if (isset($item['refid_h2h']) && $item['refid_h2h'] === $trx['refid_h2h']) {
                $history[$idx] = array_merge($item, $trx);
                $history[$idx]['updated_at'] = date('Y-m-d H:i:s');
                $found = true;
                break;
            }
        }

        if (!$found) {
            $trx['created_at'] = $trx['created_at'] ?? date('Y-m-d H:i:s');
            $trx['updated_at'] = date('Y-m-d H:i:s');
            $trx['status_override'] = $trx['status_override'] ?? false;
            $history[] = $trx;
        }

        ftruncate($fp, 0);
        rewind($fp);
        fwrite($fp, json_encode($history, JSON_PRETTY_PRINT));
        fflush($fp);
        @flock($fp, LOCK_UN);
    }
    @fclose($fp);

    return $trx;
}

function find_transaction_by_any_refid($userId, $refidInput) {
    $refidInput = trim($refidInput);
    if (empty($refidInput)) return null;

    if (!empty($userId)) {
        $transactions = get_user_transactions($userId);
        foreach ($transactions as $trx) {
            if (($trx['refid_h2h'] ?? '') === $refidInput || 
                ($trx['refid_pusat'] ?? '') === $refidInput || 
                ($trx['trx_id'] ?? '') === $refidInput) {
                return $trx;
            }
        }
    }

    $all = get_all_users_transactions();
    foreach ($all as $trx) {
        if (($trx['refid_h2h'] ?? '') === $refidInput || 
            ($trx['refid_pusat'] ?? '') === $refidInput || 
            ($trx['trx_id'] ?? '') === $refidInput) {
            return $trx;
        }
    }

    return null;
}

function get_all_users_transactions() {
    $dir = __DIR__ . '/data_private/history';
    if (!is_dir($dir)) return [];
    $all = [];
    $files = glob($dir . '/history_*.json');
    foreach ($files as $f) {
        $data = json_decode(@file_get_contents($f), true);
        if (is_array($data)) {
            $all = array_merge($all, $data);
        }
    }
    usort($all, function($a, $b) {
        return strtotime($b['created_at'] ?? '0') - strtotime($a['created_at'] ?? '0');
    });
    return $all;
}

// ==========================================
// QUERY RAW RESPON SERVER PUSAT
// ==========================================

function query_khfy_status_pusat($refidPusat) {
    $apiKeyOld  = "8F1199C1-483A-4C96-825E-F5EBD33AC60A";
    $baseUrlOld = "https://panel.khfy-store.com/api_v2";

    $ch1 = curl_init("$baseUrlOld/history?api_key=$apiKeyOld&refid=" . urlencode($refidPusat));
    curl_setopt_array($ch1, [CURLOPT_RETURNTRANSFER => true, CURLOPT_SSL_VERIFYPEER => false, CURLOPT_TIMEOUT => 8]);
    $raw1 = curl_exec($ch1); curl_close($ch1);
    $json1 = json_decode($raw1, true);

    if (is_array($json1) && isset($json1['data']) && is_array($json1['data']) && count($json1['data']) > 0) {
        return sanitize_raw_debug_response($json1);
    }

    $ch2 = curl_init("$baseUrlOld/history?api_key=$apiKeyOld&reffid=" . urlencode($refidPusat));
    curl_setopt_array($ch2, [CURLOPT_RETURNTRANSFER => true, CURLOPT_SSL_VERIFYPEER => false, CURLOPT_TIMEOUT => 8]);
    $raw2 = curl_exec($ch2); curl_close($ch2);
    $json2 = json_decode($raw2, true);

    if (is_array($json2) && isset($json2['data']) && is_array($json2['data']) && count($json2['data']) > 0) {
        return sanitize_raw_debug_response($json2);
    }

    return sanitize_raw_debug_response($json1 ?? ['status' => false, 'message' => 'Gagal terhubung ke API History KHFY']);
}

function query_raw_upstream_response($trx) {
    $serverCode = $trx['server_code'] ?? $trx['server'] ?? '';
    $refidPusat = $trx['refid_pusat'] ?? '';

    if (empty($refidPusat)) {
        return ['status' => false, 'message' => 'RefID Pusat kosong pada transaksi ini'];
    }

    if ($serverCode === 'api1' || $serverCode === 'api1.php') {
        return query_khfy_status_pusat($refidPusat);
    } elseif ($serverCode === 'api2' || $serverCode === 'api2.php') {
        $apiKeyServer = "7274410f84b7e2810795810e879a4e0be8779c451d55e90e29d9bc174547ff77";
        $baseUrl = "https://api.ics-store.my.id/api";
        $ch = curl_init("$baseUrl/reseller/trx/" . urlencode($refidPusat));
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true, CURLOPT_SSL_VERIFYPEER => false, CURLOPT_TIMEOUT => 10,
            CURLOPT_HTTPHEADER => ["Authorization: Bearer $apiKeyServer", "Accept: application/json"]
        ]);
        $raw = curl_exec($ch); curl_close($ch);
        $decoded = json_decode($raw, true);
        
        // NORMALISASI RESPON ICS UNTUK SISTEM STATUS
        if (is_array($decoded) && isset($decoded['success'])) {
            $stText = strtolower($decoded['data']['status'] ?? ($decoded['success'] ? 'success' : 'failed'));
            $detailMsg = $decoded['data']['message'] ?? $decoded['message'] ?? $stText;
            
            $decoded['status_text'] = $detailMsg;
            $decoded['message']     = $detailMsg;
            $decoded['keterangan']  = $detailMsg;
            
            // Mapping status strict agar tidak salah tebak di fungsi detect_trx_status
            if ($stText === 'success' || $stText === 'berhasil' || $stText === 'sukses') {
                $decoded['status2'] = 20;
            } elseif ($stText === 'failed' || $stText === 'gagal' || $stText === 'error' || $stText === 'refund' || $stText === 'batal') {
                $decoded['status2'] = 72;
            }
            
            $snValid = $decoded['data']['sn'] ?? null;
            if (!empty($snValid) && strtolower((string)$snValid) !== 'null') {
                $decoded['sn'] = $snValid;
            } else {
                $decoded['sn'] = $detailMsg;
            }
        }
        
        return sanitize_raw_debug_response($decoded ?? ['raw_text' => $raw]);
    } elseif ($serverCode === 'api4' || $serverCode === 'api4.php' || $serverCode === 'okeconnect') {
        return query_okeconnect_status_pusat($trx);
    }

    return ['status' => false, 'message' => 'Server API tidak dikenal'];
}

function sync_transaction_status($userId, &$trx, $forceSync = false) {
    $ownerId    = !empty($trx['user_id']) ? $trx['user_id'] : $userId;
    $oldStatus  = strtoupper($trx['status'] ?? 'PENDING');
    $isOverride = $trx['status_override'] ?? false;

    // PROTEKSI UTAMA DIBYPASS JIKA $forceSync = TRUE
    if (!$forceSync && ($isOverride || $oldStatus === 'BERHASIL' || $oldStatus === 'GAGAL')) {
        return $trx;
    }

    $rawRes = query_raw_upstream_response($trx);

    if (is_array($rawRes) && !empty($rawRes)) {
        
        // --- CEK JIKA TRANSAKSI TIDAK DITEMUKAN DI PUSAT ---
        $rawStr = strtolower(json_encode($rawRes));
        if (strpos($rawStr, 'tidak ditemukan') !== false || 
            strpos($rawStr, 'not found') !== false || 
            strpos($rawStr, 'tidak ada data') !== false || 
            (isset($rawRes['count']) && $rawRes['count'] === 0 && empty($rawRes['data']))) {
            
            // Kembalikan data history lokal utuh tanpa menimpa dari respon pusat yang kosong
            return $trx;
        }

        $targetItem = $rawRes;
        if (isset($rawRes['data'][0]) && is_array($rawRes['data'][0])) {
            $targetItem = $rawRes['data'][0];
        }

        // [MODIFIKASI] Prioritaskan pesan alasan detail (keterangan/message/msg) daripada status_text umum
        $msgText = (!empty($targetItem['keterangan'])) 
            ? $targetItem['keterangan'] 
            : ($targetItem['message'] ?? $targetItem['msg'] ?? $targetItem['body_respon'] ?? $targetItem['status_text'] ?? $rawRes['message'] ?? $rawRes['raw_response'] ?? '');
            
        $snText = (!empty($targetItem['sn']) && strtolower((string)$targetItem['sn']) !== 'null') 
            ? $targetItem['sn'] 
            : ($targetItem['serial_number'] ?? $rawRes['sn'] ?? $trx['sn'] ?? '-');
        
        $newStatus = detect_trx_status($rawRes, $msgText);

        // Jika balasan pusat menyatakan 'TIDAK ADA transaksi / tidak ada data', pertahankan pesan lokal lama jika ada
        if ((strpos(strtolower($msgText), 'tidak ada') !== false || strpos(strtolower($msgText), 'tidak ditemukan') !== false) && !empty($trx['message']) && strpos(strtolower($trx['message']), 'gagal') !== false) {
            $newMsg = clean_api_message($trx['message']);
            $newStatus = 'GAGAL';
        } else {
            $newMsg = clean_api_message($msgText ?: $trx['message']);
        }

        $newSn = clean_api_message($snText);

        // Otomatis refund saldo jika status berubah dari bukan GAGAL menjadi GAGAL
        if ($oldStatus !== 'GAGAL' && $newStatus === 'GAGAL') {
            $harga = (int)($trx['harga'] ?? 0);
            if ($harga > 0) {
                add_user_balance($ownerId, $harga);
            }
        }

        $trx['status']     = $newStatus;
        $trx['sn']         = $newSn;
        $trx['message']    = $newMsg;
        $trx['updated_at'] = date('Y-m-d H:i:s');
        save_user_transaction($ownerId, $trx);
    }

    return $trx;
}

/**
 * SISTEM STOK OTOMATIS
 */
function get_akrab_stock_map() {
    $cacheDir  = __DIR__ . '/data_private';
    $cacheFile = $cacheDir . '/stock_cache.json';
    if (file_exists($cacheFile) && (time() - @filemtime($cacheFile) < 15)) {
        $cached = @json_decode(file_get_contents($cacheFile), true);
        if (is_array($cached) && !empty($cached)) return $cached;
    }

    $ch = curl_init('https://panel.khfy-store.com/api_v3/cek_stock_akrab');
    curl_setopt_array($ch, [CURLOPT_RETURNTRANSFER => true, CURLOPT_TIMEOUT => 4, CURLOPT_SSL_VERIFYPEER => false]);
    $response = curl_exec($ch); curl_close($ch);

    $stockMap = [];
    if ($response) {
        $json = @json_decode($response, true);
        if (isset($json['ok']) && $json['ok'] === true && is_array($json['data'] ?? null)) {
            foreach ($json['data'] as $item) {
                if (isset($item['type']) && isset($item['sisa_slot'])) {
                    $stockMap[strtoupper(trim($item['type']))] = (string)$item['sisa_slot'];
                }
            }
        }
    }

    if (!empty($stockMap)) {
        if (!is_dir($cacheDir)) @mkdir($cacheDir, 0755, true);
        @file_put_contents($cacheFile, json_encode($stockMap));
    }
    return $stockMap;
}

function inject_stock_to_products(&$products) {
    if (!is_array($products)) return;
    $stockMap = get_akrab_stock_map();
    foreach ($products as &$item) {
        if (!is_array($item)) continue;
        $code = strtoupper(trim($item['kode'] ?? $item['kode_produk'] ?? $item['code'] ?? ''));
        $item['stock'] = (!empty($code) && isset($stockMap[$code])) ? (string)$stockMap[$code] : "999";
    }
}

// ==========================================
// KELOLA GATEWAY OKECONNECT H2H
// ==========================================

function get_okeconnect_config() {
    $file = __DIR__ . '/data_private/gateway_okeconnect.json';
    if (!file_exists($file)) {
        return [
            'member_id' => 'OK980710',
            'pin'       => '0502',
            'password'  => 'wasalamL050'
        ];
    }
    return json_decode(@file_get_contents($file), true) ?? [];
}

function call_okeconnect_api($params) {
    $gwConfig = get_okeconnect_config();
    $params['memberID'] = $gwConfig['member_id'] ?? '';
    $params['pin']      = $gwConfig['pin'] ?? '';
    $params['password'] = $gwConfig['password'] ?? '';
    $endpoint = $params['_path'] ?? '';
    unset($params['_path']);
    $url = 'https://h2h.okeconnect.com/trx' . $endpoint . '?' . http_build_query($params);

    $ch = curl_init();
    curl_setopt_array($ch, [
        CURLOPT_URL            => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT        => 30,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_USERAGENT      => 'PandawaDigital/1.0'
    ]);
    $result = curl_exec($ch); curl_close($ch);
    $decoded = json_decode($result, true);
    if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
        return sanitize_raw_debug_response($decoded);
    }
    return sanitize_raw_debug_response(['status' => true, 'raw_response' => (string)$result]);
}

function query_okeconnect_status_pusat($trx) {
    if (is_array($trx)) {
        return call_okeconnect_api([
            'check'   => 1,
            'product' => $trx['kode_produk'] ?? '',
            'dest'    => $trx['target'] ?? '',
            'refID'   => $trx['refid_pusat'] ?? ''
        ]);
    } else {
        return call_okeconnect_api([
            'type'  => 'status',
            'refID' => $trx
        ]);
    }
}