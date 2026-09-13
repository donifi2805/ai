# ❄️ BekasiAC — Website Service AC Profesional Bekasi

Hasil rombak total: tampilan modern, profesional, **mobile-first** (maksimal di HP Android, tetap rapi di Windows).

## 📁 Struktur file (mirip `public_html`)

```
public_html/
├── index.php          → halaman pelanggan (BekasiAC)
├── paneladmin.php     → dashboard admin
├── api/
│   └── api.php        → JEMBATAN gambar (upload/hapus/ganti/list)
└── image/             → penyimpanan gambar di hosting
    ├── .htaccess      → blokir eksekusi PHP di folder gambar
    └── index.html     → anti-listing
```

> Sistem lama `upload.php` sudah **dihapus total** dan digabung ke `api/api.php`.

## 🚀 Cara upload ke hosting (cPanel / Niagahoster / dll)

1. Buka **File Manager → public_html**.
2. Upload:
   - `index.php` → `public_html/index.php`
   - `paneladmin.php` → `public_html/paneladmin.php`
   - `api/api.php` → `public_html/api/api.php`
3. Buat folder `public_html/image/` lalu set permission **755**.
   (atau upload seluruh folder `image/` + `api/` dari repo ini)
4. Selesai. Tes:
   - Buka `https://domainanda.com/` → halaman pelanggan.
   - Buka `https://domainanda.com/paneladmin.php` → login admin.
   - Di admin buka **Pengaturan → Tes Koneksi** → harus ✅ Terhubung.
   - Atau buka langsung `https://domainanda.com/api/api.php?action=ping`.

## 🔌 Dokumentasi `api/api.php`

Base: `https://domainanda.com/api/api.php`

| Fungsi | Cara pakai |
|---|---|
| Cek koneksi | `GET ?action=ping` |
| Daftar gambar | `GET ?action=list&limit=50&offset=0` |
| Upload | `POST ?action=upload` FormData field `file` (+opsional `prefix`) |
| Hapus | `POST` JSON `{action:"delete", filename:"xxx.jpg"}` atau `{url:"..."}` |
| Ganti | `POST ?action=replace` FormData `old` + `file` |

- Format: JPG / JPEG / PNG / WEBP / GIF, maks **5 MB**.
- Nama file otomatis: `bekasiac_YYYYMMDD_HHMMSS_xxxx.ext` (anti-tabrakan).
- Response selalu JSON `{status, message, ...}` + field `url` (kompatibel kode lama).
- Proteksi opsional: isi variabel `$API_KEY` di `api.php`, lalu kirim `?key=` / header `X-API-Key`.

## ✨ Fitur halaman pelanggan (`index.php`)

- Hero modern + statistik animasi + kartu teknisi
- 4 kategori layanan (Beli AC Baru, Cuci, Bongkar/Pasang, Servis) + **pencarian katalog**
- Keranjang + qty unit + checkout (tanggal, area, alamat, WA auto-format 62)
- Pesanan terkirim ke **WhatsApp admin otomatis** + tersimpan di database
- Lacak status **real-time** + timeline (Dipesan → Diproses → Selesai)
- Galeri foto & video YouTube (tab + geser)
- Ulasan real (tersimpan di database, bisa + foto) + ringkasan rating
- Area layanan, FAQ, CTA WhatsApp, footer lengkap
- **Bottom navigation HP** + tombol WA mengambang + auth (login/daftar/reset)

## 🛠️ Fitur panel admin (`paneladmin.php`)

- Dashboard: sapaan + jam live, statistik, **grafik tren 7 hari & status**, pesanan terbaru, info storage hosting
- Pesanan: live real-time, filter status, pencarian, ubah status, hubungi WA, detail, hapus, **export CSV**
- Katalog: tambah/edit/hapus, upload foto via `api.php` (preview + hapus file lama otomatis)
- Galeri: drag & drop upload, hapus (file hosting ikut terhapus)
- Video YouTube: tambah/hapus via link/ID
- Ulasan: moderasi ulasan website
- Pelanggan: database + pencarian
- Pengaturan: No. WA, pengumuman, promo, judul hero — tampil otomatis di depan
- Notifikasi: suara + notifikasi browser + bridge aplikasi Android lama (`AndroidControl`)
- Responsif: sidebar → drawer + bottom-nav di HP

## 🗄️ Database (Firebase Firestore — tetap sama, kompatibel data lama)

Koleksi: `services`, `orders`, `users`, `gallery`, `youtube_videos`, `reviews` (baru), `settings/store` (baru).

Email admin: `doni888855519@gmail.com`, `setiatehnik09@gmail.com`, `cahyokukuh94@gmail.com`
(ganti di `paneladmin.php` konstanta `ADMINS` bila perlu).

## ⚠️ Catatan

- `image/` jangan dihapus di hosting. Jika error upload → cek permission folder `755`.
- Semua gambar baru otomatis bernama `bekasiac_*` di `image/`.
- Data & foto lama (URL domain lama) tetap tampil; file fisik lama tidak ikut terhapus otomatis (hanya file baru di `image/` yang dikelola API).
