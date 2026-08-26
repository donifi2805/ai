# PayNusa — Aplikasi Pembayaran (PPOB)

Aplikasi pembayaran online (pulsa, paket data, token PLN, tagihan, e-money,
voucher, dll.) berbasis web. Logika transfer saldo & pemotongan saldo
**dipisah ke endpoint PHP terenkripsi** di folder `public_html/api/`.

## Struktur Penting

| File | Fungsi |
|---|---|
| `index.html` | Aplikasi utama (UI + klien API aman) |
| `manager.php` | Layer data existing (list_users, save_user, save_tx, dsb.) — **tidak diubah** |
| `public_html/api/config.php` | **Kunci API** (`PAYNUSA_API_KEY`) + URL manager opsional |
| `public_html/api/_secure.php` | Lapisan keamanan bersama (HMAC, replay, rate-limit, lock) |
| `public_html/api/transfer.php` | **System transfer saldo** (action: `cek_tujuan`, `kirim`) |
| `public_html/api/pembayaran.php` | **Pemotongan saldo** untuk pembayaran (action: `debit`) |
| `test_secure_api.js`, `test_live_http.js` | Test keamanan (jalankan `node test_secure_api.js`) |

## Cara Pasang (Hosting cPanel — siap pakai)

1. **Upload** isi repository ke root dokumen hosting (biasanya
   `public_html/`). Untuk folder `public_html/api/` di repository:
   isinya harus berada di `api/` pada root dokumen hosting, sehingga
   akhirnya menjadi `public_html/api/` di hosting.
   Layout yang diharapkan setelah di-upload:

   ```
   public_html/
   ├── index.html
   ├── manager.php
   ├── seting.php
   ├── markup.php
   ├── api/
   │   ├── api1.php
   │   ├── api4.php
   │   ├── config.php        (baru)
   │   ├── _secure.php       (baru)
   │   ├── transfer.php      (baru)
   │   └── pembayaran.php    (baru)
   ├── ewallet/
   └── ...
   ```

2. **Pastikan PHP ≥ 5.6** (disarankan 7.4/8.x) aktif di akun hosting.
   File PHP sengaja dibuat kompatibel PHP 5.6+.

3. **Selesai.** Tidak perlu konfigurasi tambahan:
   - `transfer.php`/`pembayaran.php` otomatis memanggil `manager.php`
     di folder atasnya (lokal, via `127.0.0.1`).
   - Bila hosting Anda memblokir loopback, isi `PAYNUSA_MANAGER_URL`
     di `public_html/api/config.php` dengan URL lengkap manager, contoh:
     `https://domain-anda.com/manager.php`

4. **Verifikasi** di browser: masuk → menu Kirim → transfer kecil ke akun
   lain. Transaksi diproses & dicatat oleh server (bukan lagi klien).

## Cara Kerja Keamanan

- Setiap request dari `index.html` ke endpoint baru dibungkus **envelope**:
  `{ "payload": "<JSON>", "sig": "<base64 HMAC-SHA256(payload, API_KEY)>" }`
  + timestamp (±300 dtk) + nonce sekali-pakai.
- Server **menolak** request yang:
  - tidak ditandatangani / tanda tangan salah → `401` (ini yang
    memblokir "canary"/scanner/tool pihak ketiga yang request langsung),
  - tidak dari origin situs → `403`,
  - kedaluwarsa / nonce diulang (replay) → `401` / `409`,
  - melebihi rate limit 30 req/menit/IP → `429`.
- **Validasi nominal di server** (otoritatif, tidak bisa dibypass):
  - transfer sesama pengguna: **minimal Rp 1.000**, harus bilangan bulat,
    **tidak boleh 0 / negatif / desimal**;
  - pembayaran (debit): **tidak boleh 0 / negatif**, maksimal Rp 999.999.999;
  - saldo dibaca & dipotong di server dengan **file-lock** (read-check-write
    atomik → anti double-spend), plus rollback otomatis bila penyimpanan
    transaksi gagal.
- Endpoint ini **tidak mengandung SQL sama sekali** — data didelegasikan ke
  `manager.php` via JSON internal, sehingga bebas SQL injection.
- Bila endpoint PHP tidak terjangkau (mis. Anda membuka `index.html`
  langsung di PC tanpa server), aplikasi **otomatis fallback** ke logika
  lama (klien) — semua fitur tetap jalan.

### Catatan jujur tentang kunci API

Kunci API hidup di `index.html` (sifatnya seperti API key web pada umum
nya) — pihak luar yang membongkar HTML bisa memakainya. Ini **sengaja
aman** karena: server tetap memvalidasi segalanya, sehingga meskipun key
bocor, penyerang tetap tidak bisa membuat saldo negatif/nol, memotong
saldo di atas saldo riil, atau mem-transfer tanpa akun tujuan yang valid —
hanya bisa melakukan hal yang sah sebagai pengguna, dan tetap terbatas
oleh rate limit. Untuk rotasi kunci: ganti `PAYNUSA_API_KEY` di
`public_html/api/config.php` **dan** `API_KEY` di `index.html`
(bagian `SECURE API`) secara bersamaan.

## Test

```bash
node test_secure_api.js   # 93 test: kriptografi, validasi, serangan
node test_live_http.js    # 14 test: klien asli vs server via HTTP
```

Keduanya hijau (93/93 dan 14/14) pada build ini.

## Batasan / Catatan Perawatan

- Rate limit, nonce, dan cooldown disimpan sebagai **file** di
  `public_html/api/` (`.nonce_store.json`, `.ratelimit/`, `.tflimit_*`,
  `*.lock`) — pastikan folder itu **tulis-oleh-PHP** dan sebaiknya
  dilindungi dari akses publik (mis. `.htaccess` berisi
  `Require all denied` / `Deny from all` bila hosting mendukung).
- Fitur yang **tidak diubah** sesuai instruksi: menu Transfer (`tf_bebas`
  via api4.php), Tarik Tunai, QRIS, top-up QRIS, dan semua sinkronisasi
  lainnya.
- Penerima transfer menerima dana lewat mekanisme `terima_saldo` +
  `is_claimed` yang sudah ada (diproses saat aplikasi penerima terbuka) —
  mekanisme ini dipertahankan persis seperti semula.
