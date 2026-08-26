<?php
/**
 * ============================================================
 *  PAYNUSA — API PEMBAYARAN / PEMOTONGAN SALDO (AMAN / TERENKRIPSI)
 *  Letak file : public_html/api/pembayaran.php
 * ============================================================
 *
 *  Seluruh logika PEMOTONGAN SALDO untuk pembayaran (metode "Saldo
 *  Aplikasi") dilakukan di sini, BUKAN di index.html:
 *
 *    action : debit
 *    data   : { uid, amount, ref (opsional) }
 *
 *  Alur:
 *    1. Verifikasi tanda tangan HMAC-SHA256 (lihat config.php).
 *       Request langsung dari luar (scanner / canary / tool) tanpa
 *       tanda tangan valid DITOLAK di awal.
 *    2. Validasi nominal KETAT di server:
 *       - harus bilangan bulat (tidak ada desimal)
 *       - TIDAK boleh negatif / nol (minimum Rp 1)
 *       - maksimum Rp 999.999.999
 *    3. Saldo dibaca dari server (manager.php), bukan dari klien.
 *    4. File-lock membuat read-check-write atomik (anti double-spend
 *       dan anti saldo negatif).
 *    5. Saldo baru disimpan ke manager.php, lalu dikembalikan ke klien
 *       untuk ditampilkan. index.html TIDAK lagi mengurangi saldo
 *       secara lokal.
 *
 *  Catatan: pencatatan riwayat transaksi tetap dilakukan index.html
 *  (seperti sebelum modifikasi) — file ini khusus menangani logika
 *  pemotongan saldo, sesuai permintaan.
 * ============================================================
 */

require_once __DIR__ . '/_secure.php';

// Konstanta aturan pembayaran
define('PN_DEBIT_MIN', 1);          // tidak boleh 0 / negatif
define('PN_DEBIT_MAX', 999999999);  // batas atas kewajaran (Rp 999.999.999)

$env = pn_verify_envelope();
$action = $env['action'];
$data = $env['data'];

switch ($action) {

  /* ----------------------------------------------------------
   * DEBIT : potong saldo akun (otoritatif di server)
   * data : { uid, amount, ref }
   * -------------------------------------------------------- */
  case 'debit':
  {
    $uid = pn_str_field($data, 'uid', 64);
    $amount = pn_int_field($data, 'amount', PN_DEBIT_MIN, PN_DEBIT_MAX);
    // ref opsional, hanya untuk pelacakan (divalidasi formatnya)
    $refId = null;
    if (isset($data['ref']) && is_string($data['ref']) && $data['ref'] !== '' && strlen($data['ref']) <= 40 && preg_match('/^[A-Za-z0-9_-]+$/', $data['ref'])) {
      $refId = $data['ref'];
    }

    if ($uid === null) {
      pn_fail('Data tidak lengkap');
    }
    if ($amount === null) {
      // Menangkap: negatif, nol, desimal, atau bukan angka
      pn_fail('Nominal tidak valid — nominal harus bilangan bulat positif', 400);
    }

    // --- Cari akun (dari server) ------------------------------------
    $users = pn_get_users();
    $me = pn_find_user($users, $uid);
    if (!$me) {
      pn_fail('Akun tidak ditemukan', 404);
    }

    $balMe = isset($me['balance']) ? (float)$me['balance'] : 0;
    if ($balMe < $amount) {
      pn_fail('Saldo tidak mencukupi');
    }

    // --- Operasi atomik (file lock) ----------------------------------
    $lock = pn_lock('pembayaran');

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

    // Potong saldo (otoritatif) dan simpan
    pn_save_user($me2, $newBalance);

    pn_unlock($lock);

    pn_res(true, 'Saldo berhasil dipotong', array(
      'balance' => $newBalance,
      'ref' => $refId,
    ));
    break;
  }

  default:
    pn_fail('Aksi tidak dikenal', 400);
}
