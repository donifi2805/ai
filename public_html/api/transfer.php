<?php
/**
 * ============================================================
 *  PAYNUSA — API TRANSFER SALDO (AMAN / TERENKRIPSI)
 *  Letak file : public_html/api/transfer.php
 * ============================================================
 *
 *  Seluruh logika transfer saldo SESAMA PENGGUNA PAYNUSA ada di sini:
 *  - Pencarian tujuan      (action : cek_tujuan)
 *  - Proses transfer       (action : kirim)
 *
 *  KEAMANAN:
 *  1. Semua request WAJIB ditandatangani HMAC-SHA256 dengan kunci
 *     bersama (lihat config.php). Request langsung dari luar
 *     (scanner / canary / tool) TANPA tanda tangan valid
 *     DITOLAK di awal — tidak ada yang menyentuh data.
 *  2. Proteksi replay (timestamp ±300 dtk + nonce sekali pakai).
 *  3. Rate limit per IP (30 req/menit).
 *  4. Validasi nominal KETAT di server:
 *       - harus bilangan bulat (tidak ada desimal)
 *       - TIDAK boleh negatif / nol
 *       - MINIMUM transfer = Rp 1.000
 *       - maksimum Rp 999.999.999
 *  5. Cek saldo di server (bukan dari klien) + file-lock agar
 *     read-check-write berjalan atomik (anti double-spend).
 *  6. Jeda minimal 30 detik antar transfer (disamakan dengan aturan lama).
 *  7. Tidak ada SQL di file ini — data didelegasikan ke manager.php
 *     via JSON internal, sehingga bebas SQL injection.
 *
 *  FORMAT REQUEST (body JSON):
 *    { "payload": "<string JSON envelope>", "sig": "<base64 HMAC>" }
 *  Lihat index.html (fungsi callSecureApi) untuk sisi klien.
 * ============================================================
 */

require_once __DIR__ . '/_secure.php';

// Konstanta aturan transfer
define('PN_TF_MIN', 1000);          // minimal transfer Rp 1.000
define('PN_TF_MAX', 999999999);     // maksimum transfer (Rp 999.999.999)
define('PN_TF_COOLDOWN', 30);       // jeda antar transfer (detik)

$env = pn_verify_envelope();
$action = $env['action'];
$data = $env['data'];

switch ($action) {

  /* ----------------------------------------------------------
   * CEK TUJUAN : cari user tujuan (read-only)
   * data : { uid, target }
   * -------------------------------------------------------- */
  case 'cek_tujuan':
  {
    $uid = pn_str_field($data, 'uid', 64);
    $target = pn_str_field($data, 'target', 128);
    if ($uid === null || $target === null) {
      pn_fail('Data tidak lengkap');
    }

    $users = pn_get_users();
    $me = pn_find_user($users, $uid);
    $tgt = pn_find_user($users, $target);

    if (!$tgt) {
      pn_res(true, '', array('found' => false, 'self' => false));
    }
    $isSelf = false;
    if ($me && $tgt && isset($me['uid'], $tgt['uid']) && (string)$me['uid'] === (string)$tgt['uid']) {
      $isSelf = true;
    }
    $tgtName = '';
    if (isset($tgt['user']['name'])) {
      $tgtName = (string)$tgt['user']['name'];
    }
    pn_res(true, '', array(
      'found' => true,
      'self' => $isSelf,
      'target_uid' => isset($tgt['uid']) ? $tgt['uid'] : '',
      'target_name' => $tgtName,
    ));
    break;
  }

  /* ----------------------------------------------------------
   * KIRIM : proses transfer saldo (server-side, atomik)
   * data : { uid, target, amount }
   * -------------------------------------------------------- */
  case 'kirim':
  {
    $uid = pn_str_field($data, 'uid', 64);
    $target = pn_str_field($data, 'target', 128);
    $amount = pn_int_field($data, 'amount', PN_TF_MIN, PN_TF_MAX);

    if ($uid === null || $target === null) {
      pn_fail('Data tidak lengkap');
    }
    if ($amount === null) {
      // Menangkap: negatif, nol, di bawah minimum, desimal, atau bukan angka
      pn_fail('Nominal tidak valid — minimal transfer Rp ' . number_format(PN_TF_MIN, 0, ',', '.'), 400);
    }

    // --- Validasi awal (sebelum lock) --------------------------------
    $users = pn_get_users();
    $me = pn_find_user($users, $uid);
    $tgt = pn_find_user($users, $target);

    if (!$me) {
      pn_fail('Akun tidak ditemukan', 404);
    }
    if (!$tgt) {
      pn_fail('Pengguna tujuan tidak ditemukan');
    }
    if (isset($me['uid'], $tgt['uid']) && (string)$me['uid'] === (string)$tgt['uid']) {
      pn_fail('Tidak bisa transfer ke diri sendiri');
    }

    // Jeda 30 detik antar transfer (per akun)
    $cdFile = __DIR__ . '/.tflimit_' . md5((string)$me['uid']) . '.ts';
    $lastTf = (int)@file_get_contents($cdFile);
    if (time() - $lastTf < PN_TF_COOLDOWN) {
      pn_fail('Tunggu 30 detik sebelum transfer lagi', 429);
    }

    $balMe = isset($me['balance']) ? (float)$me['balance'] : 0;
    if ($balMe < $amount) {
      pn_fail('Saldo tidak mencukupi');
    }

    // --- Operasi atomik (file lock) ----------------------------------
    $lock = pn_lock('transfer');

    // Baca ulang saldo terbaru agar aman dari kondisi balapan
    $users2 = pn_get_users();
    $me2 = pn_find_user($users2, $uid);
    if (!$me2) {
      pn_unlock($lock);
      pn_fail('Akun tidak ditemukan', 404);
    }
    $balMe2 = isset($me2['balance']) ? (float)$me2['balance'] : 0;
    if ($balMe2 < $amount) {
      pn_unlock($lock);
      pn_fail('Saldo tidak mencukupi');
    }

    $newBalance = $balMe2 - $amount;
    $dateIso = pn_now_iso();
    $refId = pn_gen_ref();
    $tgtName = (isset($tgt['user']['name']) && $tgt['user']['name'] !== '') ? (string)$tgt['user']['name'] : (string)$tgt['uid'];
    $meName = isset($me2['user']['name']) ? (string)$me2['user']['name'] : '';

    // Transaksi KIRIM (milik pengirim) — bentuk sama dengan sistem lama
    $kirimTx = array(
      'id' => pn_gen_id(),
      'ref' => $refId,
      'sid' => 'kirim_saldo',
      'serviceName' => 'Kirim Saldo',
      'product' => 'Transfer ke ' . $tgtName,
      'customer' => $tgt['uid'],
      'customerName' => $tgtName,
      'amount' => $amount,
      'admin' => 0,
      'discount' => 0,
      'total' => $amount,
      'method' => 'Saldo PayNusa',
      'status' => 'success',
      'date' => $dateIso,
    );

    // Transaksi TERIMA (milik penerima) — diproses oleh sinkronisasi
    // penerima di index.html (mekanisme is_claimed, tidak diubah).
    $rxTx = array(
      'id' => pn_gen_id(),
      'ref' => $refId,
      'sid' => 'terima_saldo',
      'serviceName' => 'Terima Saldo',
      'product' => 'Transfer dari ' . $meName,
      'customer' => $me2['uid'],
      'customerName' => $meName,
      'amount' => $amount,
      'admin' => 0,
      'discount' => 0,
      'total' => $amount,
      'method' => 'Terima Saldo',
      'status' => 'success',
      'date' => $dateIso,
    );

    // 1) Potong saldo pengirim (otoritatif)
    pn_save_user($me2, $newBalance);

    // 2) Catat transaksi kirim (pengirim) — bila gagal: ROLLBACK saldo
    $kirimOk = pn_save_tx($me2['uid'], $kirimTx, true);
    if (!$kirimOk) {
      $kirimOk = pn_save_tx($me2['uid'], $kirimTx, true); // retry sekali
    }
    if (!$kirimOk) {
      pn_save_user($me2, $balMe2, true);
      pn_unlock($lock);
      error_log('[PayNusa] transfer.php: gagal menyimpan tx kirim untuk ' . $me2['uid'] . ' (rollback saldo)');
      pn_fail('Gagal menyimpan transaksi, dana dikembalikan', 502);
    }

    // 3) Catat transaksi terima (penerima) — bila gagal: ROLLBACK saldo
    $rxOk = pn_save_tx($tgt['uid'], $rxTx, true);
    if (!$rxOk) {
      $rxOk = pn_save_tx($tgt['uid'], $rxTx, true); // retry sekali
    }
    if (!$rxOk) {
      pn_save_user($me2, $balMe2, true);
      pn_unlock($lock);
      error_log('[PayNusa] transfer.php: gagal menyimpan tx terima untuk ' . $tgt['uid'] . ' (rollback saldo)');
      pn_fail('Gagal menyimpan transaksi penerima, dana dikembalikan', 502);
    }

    // 4) Simpan waktu transfer (cooldown 30 detik)
    @file_put_contents($cdFile, (string)time(), LOCK_EX);

    pn_unlock($lock);

    pn_res(true, 'Berhasil mengirim saldo', array(
      'balance' => $newBalance,
      'ref' => $refId,
      'tx' => $kirimTx,
      'target_uid' => $tgt['uid'],
      'target_name' => $tgtName,
    ));
    break;
  }

  default:
    pn_fail('Aksi tidak dikenal', 400);
}
