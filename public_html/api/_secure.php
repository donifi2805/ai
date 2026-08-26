<?php
/**
 * ============================================================
 *  PAYNUSA — LAPISAN KEAMANAN API (file internal)
 *  Dipakai oleh : transfer.php & pembayaran.php
 *  JANGAN diakses langsung dari browser (tanpa data).
 * ============================================================
 *
 *  Cara kerja proteksi:
 *  1. Setiap request dari index.html dibungkus "envelope" :
 *       { "payload": "<JSON string>", "sig": "<base64 HMAC-SHA256>" }
 *     dengan isi payload :
 *       { "v":1, "ts":<unix>, "nonce":"<hex>", "action":"<nama>", "data":{...} }
 *     sig = HMAC-SHA256(payload, PAYNUSA_API_KEY).
 *  2. Server menolak request jika :
 *     - tanda tangan tidak cocok  (anti forjikan / canary dari luar)
 *     - ts di luar ±300 detik     (anti replay lama)
 *     - nonce pernah dipakai      (anti replay / duplicate)
 *     - melebihi rate limit       (anti brute force / flood)
 *  3. Semua input divalidasi ketat di server (integer, batas nilai)
 *     sehingga saldo negatif / nol / di bawah minimum TIDAK mungkin.
 *  4. File ini TIDAK MENULIS SQL APAPUN. Data user/saldo didelegasikan
 *     ke manager.php melalui panggilan internal (JSON) — sehingga tidak
 *     ada celah SQL injection pada endpoint ini.
 * ============================================================
 */

if (!defined('PAYNUSA_API_KEY')) {
  require_once __DIR__ . '/config.php';
}

header('Content-Type: application/json; charset=utf-8');
header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: DENY');
header('Cache-Control: no-store');

/** Kirim respon JSON standar lalu hentikan. */
function pn_res($status, $message, $data)
{
  echo json_encode(
    array('status' => (bool)$status, 'message' => $message, 'data' => $data),
    JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES
  );
  exit;
}

function pn_fail($message, $httpCode = 400)
{
  http_response_code($httpCode);
  pn_res(false, $message, null);
}

/* ------------------------------------------------------------
 * Proteksi Origin (anti cross-site request forgery level origin):
 * bila header Origin hadir dan domainnya beda dari domain situs,
 * request ditolak. Origin kosong (curl / server-side) dilewati —
 * HMAC tetap menjadi gerbang utama.
 * ---------------------------------------------------------- */
function pn_check_origin()
{
  $origin = isset($_SERVER['HTTP_ORIGIN']) ? (string)$_SERVER['HTTP_ORIGIN'] : '';
  if ($origin === '') {
    return;
  }
  $originHost = parse_url($origin, PHP_URL_HOST);
  $siteHost = isset($_SERVER['HTTP_HOST']) ? (string)$_SERVER['HTTP_HOST'] : '';
  if (!is_string($originHost) || $originHost === '' || $siteHost === '') {
    return;
  }
  $oh = strtolower($originHost);
  $sh = strtolower(preg_replace('/:\d+$/', '', $siteHost));
  if ($sh === '') {
    return;
  }
  $same = ($oh === $sh)
    || (strlen($oh) > strlen($sh) + 1 && substr($oh, -(strlen($sh) + 1)) === '.' . $sh)
    || (strlen($sh) > strlen($oh) + 1 && substr($sh, -(strlen($oh) + 1)) === '.' . $oh);
  if (!$same) {
    pn_fail('Origin tidak diizinkan', 403);
  }
}

/* ------------------------------------------------------------
 * Verifikasi envelope aman (HMAC + waktu + nonce + rate limit)
 * Mengembalikan array payload yang sudah tervalidasi.
 * ---------------------------------------------------------- */
function pn_verify_envelope()
{
  $reqMethod = isset($_SERVER['REQUEST_METHOD']) ? $_SERVER['REQUEST_METHOD'] : 'GET';
  if ($reqMethod !== 'POST') {
    pn_fail('Metode tidak diizinkan', 405);
  }

  // 0) Proteksi Origin: tolak request cross-site dari domain lain
  //    (mis. form/JS dari website penyerang) meskipun tanda tangan valid.
  pn_check_origin();

  $raw = file_get_contents('php://input');
  if (!is_string($raw) || $raw === '' || strlen($raw) > 65536) {
    pn_fail('Payload tidak valid', 400);
  }

  $body = json_decode($raw, true);
  if (!is_array($body) || !isset($body['payload']) || !isset($body['sig'])) {
    pn_fail('Payload tidak valid', 400);
  }
  $payload = $body['payload'];
  $sig = $body['sig'];
  if (!is_string($payload) || !is_string($sig) || $payload === '' || strlen($payload) > 65536) {
    pn_fail('Payload tidak valid', 400);
  }

  // 1) Verifikasi tanda tangan HMAC-SHA256 (perbandingan anti timing-attack)
  $expect = hash_hmac('sha256', $payload, PAYNUSA_API_KEY, true);
  $given = base64_decode($sig, true);
  if (!is_string($given) || !hash_equals($expect, $given)) {
    pn_fail('Tanda tangan tidak valid — akses ditolak', 401);
  }

  // 2) Dekode & validasi isi payload
  $env = json_decode($payload, true);
  if (!is_array($env)) {
    pn_fail('Payload tidak valid', 400);
  }
  foreach (array('v', 'ts', 'nonce', 'action', 'data') as $k) {
    if (!array_key_exists($k, $env)) {
      pn_fail('Payload tidak lengkap', 400);
    }
  }
  if ($env['v'] !== 1) {
    pn_fail('Versi payload tidak dikenal', 400);
  }
  if (!is_int($env['ts']) || abs(time() - $env['ts']) > 300) {
    pn_fail('Permintaan kedaluwarsa (timeout)', 401);
  }
  if (!is_string($env['nonce']) || !preg_match('/^[A-Za-z0-9]{8,64}$/', $env['nonce'])) {
    pn_fail('Nonce tidak valid', 400);
  }
  if (!is_string($env['action']) || !preg_match('/^[a-z_]{2,32}$/', $env['action'])) {
    pn_fail('Aksi tidak valid', 400);
  }
  if (!is_array($env['data'])) {
    pn_fail('Data tidak valid', 400);
  }

  // 3) Rate limit per IP (maks 30 request / menit)
  pn_rate_limit(30, 60);

  // 4) Proteksi replay: nonce tidak boleh terulang (jendela 10 menit)
  $storeFile = __DIR__ . '/.nonce_store.json';
  $fp = fopen($storeFile, 'c+');
  if (!$fp) {
    pn_fail('Server error', 500);
  }
  if (!flock($fp, LOCK_EX)) {
    fclose($fp);
    pn_fail('Server sibuk, coba lagi', 503);
  }
  $store = json_decode((string)file_get_contents($fp), true);
  if (!is_array($store)) {
    $store = array();
  }
  $now = time();
  foreach ($store as $k => $v) {
    if (!is_int($v) || ($now - $v) > 600) {
      unset($store[$k]);
    }
  }
  if (isset($store[$env['nonce']])) {
    flock($fp, LOCK_UN);
    fclose($fp);
    pn_fail('Permintaan duplikat (replay diblokir)', 409);
  }
  $store[$env['nonce']] = $now;
  ftruncate($fp, 0);
  fseek($fp, 0, SEEK_SET);
  fwrite($fp, json_encode($store));
  fflush($fp);
  flock($fp, LOCK_UN);
  fclose($fp);

  return $env;
}

/* ------------------------------------------------------------
 * Rate limit sederhana berbasis file (per IP).
 * ---------------------------------------------------------- */
function pn_rate_limit($max, $windowSec)
{
  $ip = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : 'unknown';
  $dir = __DIR__ . '/.ratelimit';
  if (!is_dir($dir)) {
    @mkdir($dir, 0770, true);
    // kunci folder dari akses web langsung (Apache)
    @file_put_contents($dir . '/.htaccess', "Order allow,deny\nDeny from all\n");
  }
  $bucket = floor(time() / $windowSec);
  $file = $dir . '/rl_' . md5($ip) . '_' . $bucket . '.cnt';
  $n = 0;
  if (is_file($file)) {
    $n = (int)@file_get_contents($file);
    if ($n < 0) {
      $n = 0;
    }
  }
  if ($n >= $max) {
    pn_fail('Terlalu banyak permintaan, tunggu sebentar', 429);
  }
  @file_put_contents($file, (string)($n + 1), LOCK_EX);
  // bersihkan file bucket lama (lebih tua dari 2x jendela)
  $cutoff = time() - ($windowSec * 2);
  foreach ((glob($dir . '/*.cnt') ?: array()) as $f) {
    if (is_file($f) && filemtime($f) < $cutoff) {
      @unlink($f);
    }
  }
}

/* ------------------------------------------------------------
 * Kunci file untuk operasi saldo atomik (read-check-write).
 * ---------------------------------------------------------- */
function pn_lock($name)
{
  $file = __DIR__ . '/.' . preg_replace('/[^a-z0-9]/', '', $name) . '.lock';
  $fp = fopen($file, 'c+');
  if (!$fp) {
    pn_fail('Server error', 500);
  }
  if (!flock($fp, LOCK_EX)) {
    fclose($fp);
    pn_fail('Server sibuk, coba lagi', 503);
  }
  return $fp;
}

function pn_unlock($fp)
{
  flock($fp, LOCK_UN);
  fclose($fp);
}

/* ------------------------------------------------------------
 * Panggilan internal ke manager.php (layer data existing).
 * $action : nama action manager.php (mis. 'list_users')
 * $post   : array JSON untuk POST, atau null untuk GET
 * Mengembalikan array hasil, atau null jika gagal.
 * ---------------------------------------------------------- */
function pn_manager($action, $post = null)
{
  $query = $action ? '?action=' . rawurlencode($action) : '';

  // Susun path manager.php (lokasi di folder PARENT dari folder api/
  // tempat file ini berada) — tanpa segmen /../ agar aman di semua server.
  $script = isset($_SERVER['SCRIPT_NAME']) ? $_SERVER['SCRIPT_NAME'] : '/api/transfer.php';
  $relDir = rtrim(str_replace('\\', '/', dirname($script)), '/');
  $parentDir = ($relDir === '' || $relDir === '/') ? '' : rtrim(dirname($relDir), '/');
  $path = $parentDir . '/manager.php' . $query;

  $candidates = array();
  if (defined('PAYNUSA_MANAGER_URL') && PAYNUSA_MANAGER_URL !== '') {
    $base = rtrim(PAYNUSA_MANAGER_URL, '/');
    // jika diisi tanpa action, tambahkan query
    $candidates[] = strpos($base, '?action=') === false ? $base . $query : PAYNUSA_MANAGER_URL;
  }
  $hostPublic = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : '';
  $scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
  foreach (array('127.0.0.1', 'localhost', $hostPublic) as $h) {
    if ($h === '' ) {
      continue;
    }
    $candidates[] = $scheme . '://' . $h . $path;
  }

  $headers = array('Accept: application/json');
  if ($hostPublic !== '') {
    $headers[] = 'Host: ' . $hostPublic;
  }
  if (is_array($post)) {
    $headers[] = 'Content-Type: application/json';
  }

  foreach ($candidates as $url) {
    $json = pn_http_json($url, $headers, is_array($post) ? json_encode($post, JSON_UNESCAPED_UNICODE) : null);
    if (is_array($json)) {
      return $json;
    }
  }
  return null;
}

/* ------------------------------------------------------------
 * Helper HTTP JSON: cURL jika tersedia, selain itu stream.
 * ---------------------------------------------------------- */
function pn_http_json($url, $headers, $postBody)
{
  $method = $postBody !== null ? 'POST' : 'GET';

  if (function_exists('curl_init')) {
    $ch = curl_init($url);
    $hdr = array();
    foreach ($headers as $h) {
      $hdr[] = $h;
    }
    curl_setopt_array($ch, array(
      CURLOPT_URL => $url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_CUSTOMREQUEST => $method,
      CURLOPT_HTTPHEADER => $hdr,
      CURLOPT_TIMEOUT => 15,
      CURLOPT_CONNECTTIMEOUT => 8,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_MAXREDIRS => 2,
    ));
    if ($postBody !== null) {
      curl_setopt($ch, CURLOPT_POSTFIELDS, $postBody);
    }
    $resp = curl_exec($ch);
    $code = (int)curl_getinfo($ch, CURLINFO_RESPONSE_CODE);
    curl_close($ch);
    if ($resp !== false && $resp !== '' && $code >= 200 && $code < 400) {
      $j = json_decode((string)$resp, true);
      if (is_array($j)) {
        return $j;
      }
    }
    return null;
  }

  // Fallback: stream context
  $ctxHeaders = implode("\r\n", $headers);
  $ctx = array(
    'http' => array(
      'method' => $method,
      'header' => $ctxHeaders,
      'content' => $postBody,
      'timeout' => 15,
      'ignore_errors' => true,
    ),
  );
  $resp = @file_get_contents($url, false, stream_context_create($ctx));
  if (is_string($resp) && $resp !== '') {
    $j = json_decode($resp, true);
    if (is_array($j)) {
      return $j;
    }
  }
  return null;
}

/* ------------------------------------------------------------
 * Validasi input ketat (anti type-juggling / injection).
 * ---------------------------------------------------------- */
function pn_str_field($data, $key, $maxLen)
{
  if (!isset($data[$key]) || !is_string($data[$key])) {
    return null;
  }
  $v = trim($data[$key]);
  if ($v === '' || strlen($v) > $maxLen) {
    return null;
  }
  return $v;
}

/** Ambil integer ketat (tanpa desimal, tanpa negatif, tanpa string jelek). */
function pn_int_field($data, $key, $min, $max)
{
  $v = isset($data[$key]) ? $data[$key] : null;
  if (is_int($v)) {
    $n = $v;
  } elseif (is_string($v) && preg_match('/^\d+$/', $v)) {
    $n = (int)$v;
  } else {
    return null;
  }
  if ($n < $min || $n > $max) {
    return null;
  }
  return $n;
}

/** Cari user dari daftar manager.php (cocok dengan logika index.html). */
function pn_find_user($users, $identifier)
{
  if (!is_array($users) || $identifier === null) {
    return null;
  }
  $id = (string)$identifier;
  foreach ($users as $u) {
    if (!is_array($u)) {
      continue;
    }
    $um = isset($u['user']) && is_array($u['user']) ? $u['user'] : array();
    $cands = array(
      isset($u['uid']) ? (string)$u['uid'] : '',
      isset($um['phone']) ? (string)$um['phone'] : '',
      isset($um['name']) ? (string)$um['name'] : '',
      isset($um['email']) ? (string)$um['email'] : '',
    );
    foreach ($cands as $c) {
      if ($c !== '' && $c === $id) {
        return $u;
      }
    }
  }
  return null;
}

/** Ambil daftar user dari manager.php (wajib berhasil). */
function pn_get_users()
{
  $res = pn_manager('list_users');
  if (!is_array($res) || !isset($res['users']) || !is_array($res['users'])) {
    pn_fail('Gagal terhubung ke server data', 502);
  }
  return $res['users'];
}

/**
 * Simpan user ke manager.php (meniru bentuk request save_user dari index.html).
 * Menghentikan proses (502) jika gagal, kecuali $allowFail = true.
 */
function pn_save_user($user, $newBalance, $allowFail = false)
{
  $save = array('uid' => isset($user['uid']) ? $user['uid'] : '');
  foreach (array('user', 'points', 'settings', 'pin', 'jenis_akun') as $k) {
    if (isset($user[$k])) {
      $save[$k] = $user[$k];
    }
  }
  if (!isset($save['user']) || !is_array($save['user'])) {
    $save['user'] = array('name' => '', 'phone' => '', 'email' => '', 'address' => '', 'since' => '', 'verified' => false);
  }
  if (!isset($save['points'])) {
    $save['points'] = 0;
  }
  if (!isset($save['settings']) || !is_array($save['settings'])) {
    $save['settings'] = array('dark' => false, 'hideBalance' => false, 'notif' => true, 'promoNotif' => true, 'biometric' => false);
  }
  if (!isset($save['pin'])) {
    $save['pin'] = '';
  }
  if (!isset($save['jenis_akun'])) {
    $save['jenis_akun'] = 'member';
  }
  $save['balance'] = $newBalance;

  $res = pn_manager('save_user', $save);
  if (!pn_save_ok($res)) {
    if ($allowFail) {
      return false;
    }
    pn_fail('Gagal menyimpan perubahan saldo', 502);
  }
  return true;
}

/** Simpan transaksi ke manager.php. */
function pn_save_tx($uid, $tx, $allowFail = false)
{
  $res = pn_manager('save_tx', array('uid' => $uid, 'tx' => $tx));
  if (!pn_save_ok($res)) {
    if ($allowFail) {
      return false;
    }
    pn_fail('Gagal menyimpan transaksi', 502);
  }
  return true;
}

/**
 * Penanda sukses: respon dianggap gagal hanya bila eksplisit
 * status=false / success=false, atau bukan JSON array sama sekali.
 */
function pn_save_ok($res)
{
  if (!is_array($res)) {
    return false;
  }
  if (isset($res['status']) && $res['status'] === false) {
    return false;
  }
  if (isset($res['success']) && $res['success'] === false) {
    return false;
  }
  return true;
}

/* ------------------------------------------------------------
 * Format peniru generator di index.html (agar konsisten).
 * ---------------------------------------------------------- */
/** Bilangan acak [min,max] — kompatibel PHP lama (bukan untuk kriptografi). */
function pn_rand_int($min, $max)
{
  if (function_exists('random_int')) {
    return random_int($min, $max);
  }
  return mt_rand($min, $max);
}

function pn_gen_ref()
{
  // JS: "PN" + Date.now().toString().slice(-8) + (100000..999999)
  $ms = (string)round(microtime(true) * 1000);
  return 'PN' . substr($ms, -8) . (string)pn_rand_int(100000, 999999);
}

function pn_gen_id()
{
  // JS: Math.random().toString(36).slice(2,9)  => 7 karakter base36
  $chars = '0123456789abcdefghijklmnopqrstuvwxyz';
  $s = '';
  for ($i = 0; $i < 7; $i++) {
    $s .= $chars[pn_rand_int(0, 35)];
  }
  return $s;
}

function pn_now_iso()
{
  // JS: new Date().toISOString()  =>  YYYY-MM-DDTHH:MM:SS.mmmZ (UTC)
  $ms = (int)round(microtime(true) * 1000);
  $sec = (int)floor($ms / 1000);
  return gmdate('Y-m-d\TH:i:s', $sec) . '.' . str_pad((string)($ms % 1000), 3, '0', STR_PAD_LEFT) . 'Z';
}
