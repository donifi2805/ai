# PayNusa — Aplikasi & Panel Admin

File utama:

- `index.html` — aplikasi pengguna (bayar tagihan / PPOB).
- `paneladmin.php` — panel kendali admin.
- `voucherdata.php` — **jembatan PHP BARU** untuk stok & pemakaian voucher.

## Cara unggah jembatan PHP baru (`voucherdata.php`)

`voucherdata.php` menyimpan data stok voucher ke file `voucherdata_store.json`
(dibuat otomatis, butuh izin tulis di folder — chmod 755/777 bila perlu).

Unggah `voucherdata.php` ke **folder yang sama dengan `index.html` (root aplikasi)
DAN juga ke folder yang sama dengan `paneladmin.php`** — persis seperti
`manager.php` yang selama ini sudah ada di dua lokasi.

- Dari `index.html` dipanggil: `voucherdata.php`
- Dari `paneladmin.php` dipanggil: `../voucherdata.php`

Bila jembatan belum diunggah, fitur stok voucher otomatis nonaktif tanpa
merusak aplikasi (voucher dianggap stok tak terbatas).

Penyimpanan gambar (foto profil, gambar siaran, foto promo, dsb.) memakai
jembatan yang SUDAH ADA: `icons/syslndng.php` (sama seperti foto landing page).

## Fitur baru / perbaikan pada rilis ini

1. **Cek status transaksi di paneladmin** kini mengikuti pola `index.html`:
   memakai `api/api1.php` (XL Akrab) atau `api/api4.php` via `secureFetch`
   dengan `{action:'status', refid}`. Setelah pengecekan berhasil, **respon
   mentah JSON dari server ditampilkan apa adanya** di modal "Respon Mentah
   Server" (ada tombol salin).
2. **Tombol-tombol paneladmin diberi nama/label teks** (Riwayat, Edit,
   Blokir, Detail, Cek, Sukses, Gagal, Pantau, User, Ekspor, Hapus, dll.).
3. **Nama aplikasi, logo, dan kontak admin** dapat diatur dari panel
   (Pengaturan Utama → Identitas Aplikasi). Default **kosong** — bila belum
   diisi, area nama/logo tidak menampilkan teks/palsu.
4. **Siaran massal** (tab baru "Siaran Massal"): kirim ke seluruh user atau
   hanya user terpilih, bisa menyertakan gambar, dan bisa diatur berapa kali
   siaran muncul saat user membuka halaman index (terhitung mulai 1; 0 = tak
   terbatas). Gambar bisa ditekan untuk ukuran penuh.
5. **Foto profil (opsional)**: bisa diunggah saat daftar akun maupun dari
   menu Data Pribadi; bisa ditambah, diganti, dan dihapus. Foto di panel
   admin (tabel user & avatar admin) juga bisa diunggah. Menekan foto
   menampilkannya ukuran penuh (lightbox).
6. **Blokir user**: tombol Blokir/Buka Blokir di Control Users. User yang
   diblokir melihat layar "Akun anda telah di bekukan atau di banned oleh
   admin…" dengan tombol **Hubungi Admin** yang mengarah ke WhatsApp admin.
7. **Maintenance total**: tombol di Pengaturan Utama. Saat nyala, seluruh
   user login melihat layar lembut berwarna **biru muda** "sedang dalam
   perbaikan rutin 1-2 jam mohon tunggu yaa" + tombol Hubungi Admin. Admin
   tetap bisa masuk panel.
8. **Voucher disempurnakan**:
   - Setelan **1x pakai per user** atau **boleh berulang** (di panel).
   - **Stok voucher** bisa diatur dari panel; stok live ditampilkan dan ada
     tombol **Reset Stok**. Di aplikasi pengguna tertera info stok.
   - Pemakaian dicatat via `voucherdata.php` (stok berkurang otomatis,
     voucher 1x terkunci per akun).
9. **Foto "Promo Untukmu"**: panel bisa mengunggah banner foto dengan
   **crop otomatis rasio 11:5** (ukuran ideal **1100×500 px**; kelipatannya
   880×400 / 1320×600). Di index foto bisa ditekan untuk ukuran penuh dan
   **di-swipe** antar foto.

> Logika inti transaksi di `index.html` (checkStatus, payNow, syncTxServer,
> rekonsiliasi, dsb.) tidak diubah — satu-satunya tambahan di alur sukses
> transaksi adalah pencatatan pemakaian voucher yang tidak memblokir.
