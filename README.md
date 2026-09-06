# TestrxBox Tools — Precision Engine v4.0

Alat modifikasi kode berbasis **injeksi Array JSON** untuk hosting PHP/HTML.
Anda memuat file target (dari perangkat atau server), menempel perintah JSON dari AI,
lalu mesin menyuntik/mengganti/menghapus blok kode secara presisi — lengkap dengan
validasi, pratinjau diff, dan jaring pengaman.

```
testrx.php          ← alat utama (HTML murni, boleh dijalankan sebagai .php)
index.html          ← salinan identik dari testrx.php (bila hosting Anda memakai index.html)
testrx_api.php      ← API pendamping: baca/tulis file server, backup, diagnostik, prompt
testrx_prompt.json  ← prompt AI Modifikator v4.0 (sumber tombol "📋 Salin Prompt")
tests/              ← uji otomatis (node) untuk mesin presisi, DOM, dan jalur cadangan prompt
```

> `testrx.php` dan `index.html` isinya **sama persis**. Pilih salah satu sesuai nama
> file yang dibutuhkan hosting Anda; yang satu boleh dihapus.

---

## 1. Alur kerja singkat

1. **📁 Lokal / ☁️ Server / 📋 Tempel** → muat file yang mau dimodifikasi.
2. **🧠 Salin Prompt** → tempel ke AI sebagai instruksi awal (isi prompt diambil dari `testrx_prompt.json`).
3. Kirim file Anda ke AI dengan pembuka `--- START OF FILE [nama] ---` … `--- END OF FILE [nama] ---`.
4. Tempel Array JSON balasan AI ke **⚡ Box JSON**.
5. **🧪 Dry-Run Presisi** → lihat laporan: tingkat kecocokan, nomor baris, peringatan, diff, integritas.
6. **▶️ Run** → periksa pratinjau diff → **✔️ Terapkan**.
7. **💾 Simpan File / ☁️ Upload** → API otomatis menyimpan salinan pengaman versi lama.

---

## 2. Yang baru di v4.0 (dibanding v3.x)

### Presisi pencarian target
Mesin mencari jangkar (`target`/`endTarget`) secara **bertingkat**, dan melaporkan tingkat mana yang dipakai:

| Tingkat | Nama | Kapan dipakai |
|---|---|---|
| 1 | `EXACT 1:1` | teks sama persis — paling aman |
| 2 | `SMART-WHITESPACE` | jumlah spasi/tab/ganti-baris berbeda (mis. setelah "🪄 Rapi Kode") |
| 3 | `WS-STRIPPED` | seluruh whitespace diabaikan (usaha terakhir, selalu diberi ⚠️ peringatan) |
| 4 | `REGEX` | hanya bila `"regex": true` |

Ditambah:
- **Saran jangkar otomatis** — bila target tidak ditemukan, mesin mencari baris paling mirip
  (kemiripan bigram-Dice + filter token) dan menyediakan tombol **"🔧 Pakai jangkar ini"**
  yang menulis ulang perintah JSON lalu mengecek ulang. Tidak perlu bolak-balik ke AI.
- **🔎 Cari Jangkar (Anchor Finder)** — cari kata kunci/nomor baris di file, lihat badge
  `UNIK ✅` atau `MUNCUL Nx ⚠️`, lalu cetak perintah JSON yang sudah ter-escape benar
  (Timpa / Sisip Atas / Sisip Bawah / Hapus Blok). Beberapa perintah bisa dikumpulkan sekaligus.
- **Parser JSON toleran** — membuang pagar ```` ```json ````, koma berlebih, kutip keriting,
  escape `\$`, komentar `//`, teks penjelasan di sekitar array, dan newline mentah di dalam string.
  Semua perbaikan dicatat di laporan.
- **Pesan error JSON yang menunjuk lokasi** (karakter ke-n + konteks + caret).

### Sistem pengaman
- **Dry-Run penuh** sebelum menulis: eksekusi dibatalkan total bila satu perintah gagal.
- **Pratinjau diff** merah/hijau dengan nomor baris (LCS) + tombol Terapkan / Salin / Unduh / Batal.
- **Cek integritas struktur**: keseimbangan tag (`div`, `script`, `style`, …), **ID duplikat**,
  sisa pagar markdown, `[object Object]`, placeholder yang lupa diisi. Dilaporkan sebagai
  *isu baru* vs *isu lama* supaya kerusakan akibat injeksi langsung terlihat.
- **Snapshot otomatis** di `localStorage` sebelum tiap injeksi + panel **🕘 Auto-Save**
  (muat/unduh/hapus) + **draf pemulihan** bila tab tertutup tak sengaja.
- **Undo/Redo** bertingkat (60 langkah) dengan label tiap perubahan.
- **Salinan pengaman di server**: setiap penimpaan lewat API menyimpan versi lama ke
  `testrxbackup/auto/` (20 salinan terbaru per file), dan menolak menimpa file berisi data
  dengan konten kosong.

### Sistem bantu lain
- **🩺 Diagnostik**: browser, clipboard, localStorage, CDN beautifier, editor, prompt JSON,
  API/PHP, izin tulis folder, jumlah backup, setelan mesin aktif.
- **⚙️ Mesin Presisi**: 10 setelan (diff preview, smart whitespace, auto-repair JSON, mode ketat
  target unik, ambang kemiripan, auto-beautify, snapshot, pertahankan EOL, animasi hacker).
- **Statistik file langsung**: baris, karakter, ukuran, EOL (CRLF/LF/MIXED), tipe, posisi riwayat.
- **Del Comenter sadar-konteks** — versi lama menghapus `https://` dan warna CSS `#fff`;
  sekarang komentar dipindai per wilayah (HTML / isi `<script>` / isi `<style>`) dengan
  pelacakan string, plus opsi komentar `#` awal baris.
- **Mode Edit File** kini menampilkan editor teks sungguhan (bukan textarea tersembunyi).
- **Kunci akses API opsional**: buat file `testrx_api.key` berisi sandi, maka semua permintaan
  API wajib menyertakan `key=<isi>`.

### Pintasan keyboard
`Ctrl+Enter` Run · `Ctrl+Z` Undo · `Ctrl+Y`/`Ctrl+Shift+Z` Redo · `Ctrl+S` Simpan/Unduh ·
`Ctrl+F` Cari Jangkar · `Ctrl+Shift+P` Salin Prompt · `Esc` tutup panel teratas

---

## 3. Skema perintah JSON

```json
[
  {
    "label": "ganti judul header",
    "snippet": "    <h1 id=\"judul\">Judul Baru</h1>\n",
    "target": "    <h1 id=\"judul\">Judul Lama</h1>",
    "endTarget": "",
    "action": "replace",
    "regex": false,
    "global": false
  }
]
```

**Wajib**

| Kunci | Isi |
|---|---|
| `snippet` | String **1 baris**; ganti baris ditulis `\n`, kutip ganda `\"`, dilarang `\$`, dilarang placeholder |
| `target` | Jangkar pembuka — **satu baris unik** disalin persis dari file |
| `endTarget` | Batas akhir rentang (boleh `""`). Semua kode di antara target→endTarget digantikan snippet |
| `action` | `replace` \| `insertBefore` \| `insertAfter` \| `delete` *(baru v4.0)* |
| `regex` | `false` (disarankan) atau `true` — backslash wajib digandakan (`\\d`, `\\s`) |
| `global` | `false` = hanya kecocokan pertama; `true` = semua kecocokan |

**Opsional (baru v4.0)**

| Kunci | Bawaan | Fungsi |
|---|---|---|
| `label` | `""` | nama perubahan, tampil di laporan/terminal |
| `occurrence` | `1` | pakai kecocokan target ke-n |
| `endOccurrence` | `1` | pakai kecocokan endTarget ke-n setelah target |
| `includeEnd` | `true` | `false` = endTarget tidak ikut diganti |
| `endTargetRequired` | `true` | `false` = bila endTarget tak ditemukan, ganti target saja |
| `ignoreCase` | `false` | abaikan besar-kecil huruf |
| `smartIndent` | `true` | samakan indentasi snippet dengan baris target saat menyisip |
| `trimLineOnDelete` | `true` | bersihkan sisa baris kosong saat `delete` |

Perilaku mesin yang perlu diketahui:
- Rentang **multiline** yang diganti dengan snippet tanpa `\n` di ujungnya akan otomatis
  diberi ganti baris, agar baris penutup tidak menempel.
- `insertBefore`/`insertAfter` disisipkan pada **batas baris** dan mengikuti indentasi baris target.
- Perintah dijalankan **berurutan**; perintah berikut melihat hasil perintah sebelumnya.
- EOL asli file (CRLF/LF) dipertahankan.

---

## 4. Prompt AI (`testrx_prompt.json`)

Tombol **📋 Salin Prompt** mengambil isi file ini dengan urutan:

1. `fetch("testrx_prompt.json")` — jalur utama,
2. `testrx_api.php?action=get_prompt` — bila host memblokir akses `.json` langsung,
3. **salinan darurat** yang tertanam di dalam HTML — bila halaman dibuka lewat `file://`.

Badge di kartu prompt selalu menunjukkan sumber yang terpakai, dan **🩺 Diagnostik**
menjelaskan kenapa prompt gagal dimuat bila itu terjadi.

Isi file: `prompt` (lengkap, ±15 ribu karakter), `prompt_short` (ringkas, hemat token),
`schema_keys`, `actions`, `engine_features`, `example_commands`, `changelog`, `usage`.
Panel **👁️ Lihat Prompt** bisa memilih varian, menyertakan metadata, menyalin, atau mengunduh `.txt`.

> Bila Anda menyunting `testrx_prompt.json`, jalankan `python3 tools/sync_prompt_fallback.py`
> untuk menyinkronkan salinan darurat di dalam `testrx.php` dan `index.html`.

Prompt v4.0 menambahkan: hukum jangkar presisi, checklist verifikasi mandiri, properti baru
mesin v4.0, `action: delete`, serta **SITUASI D — mode pemulihan** (AI membaca laporan error
alat lalu mencetak ulang JSON yang sudah diperbaiki).

---

## 5. Pemasangan di hosting

1. Unggah `testrx.php` **atau** `index.html`, `testrx_api.php`, dan `testrx_prompt.json`
   ke folder yang sama (mis. `public_html/`).
2. Pastikan folder dapat ditulis (CHMOD 755/775). Folder `testrxbackup/` dan
   `testrxbackup/auto/` dibuat otomatis oleh API dan diproteksi `.htaccess` + `index.html` kosong.
3. Buka `https://situs-anda/testrx.php`, tekan **🩺 Diagnostik** untuk memastikan
   API, prompt JSON, dan izin tulis semuanya hijau.
4. *(Opsional, disarankan)* Buat file `testrx_api.key` berisi sandi rahasia — API lalu menolak
   semua permintaan tanpa parameter `key`.

### Aksi API

`get_prompt` · `diagnostic` · `ping` · `upload_public` · `upload_custom` · `upload_debug` ·
`backup` · `list_backups` · `list_auto_backups` · `get_backup` · `delete_backup` ·
`list_server_files` · `get_server_file` · `download_server_file` · `create_folder`

Semua aksi lama tetap kompatibel; respons kini selalu JSON valid (output buffer + `display_errors`
dimatikan) dan semua path dinormalisasi terhadap folder alat (anti *directory traversal* yang
sesungguhnya, bukan sekadar `str_replace('..','')`).

---

## 6. Menjalankan uji otomatis

Uji memakai Node.js (tidak perlu PHP). `jsdom` hanya dibutuhkan untuk uji antarmuka.

```bash
npm install jsdom          # sekali saja
node tests/engine.test.js  # 79 uji mesin: pencocokan, rentang, regex, JSON repair, diff, integritas
node tests/dom.test.js     # 66 uji antarmuka: prompt, dry-run, diff, anchor finder, diagnostik
node tests/fallback.test.js# 12 uji jalur cadangan prompt
```

Tanpa `jsdom`, uji DOM/fallback otomatis dilewati (tidak dianggap gagal).
Uji membaca langsung `testrx.php`, jadi ia ikut rusak bila berkas alat diubah sembarangan.

---

## 7. Pemecahan masalah

| Gejala | Penyebab & solusi |
|---|---|
| Badge prompt `SUMBER: GAGAL DIMUAT` | File `testrx_prompt.json` tidak satu folder, atau halaman dibuka lewat `file://`. Jalankan 🩺 Diagnostik. |
| `Jangkar "target" tidak ditemukan` | Target tidak disalin persis / sudah berubah setelah beautify. Pakai saran yang muncul, atau 🔎 Cari Jangkar. |
| `Mode ketat aktif: target muncul Nx` | Aktifkan lewat ⚙️ Mesin Presisi. Matikan, atau kunci dengan `occurrence`/`endTarget`. |
| JSON selalu ditolak | Lihat pesan error: ia menunjuk karakter bermasalah. Pastikan `"` di dalam string ditulis `\"` dan tidak ada newline mentah. |
| Upload gagal / izin | CHMOD folder ke 755/775; periksa `post_max_size` bila file besar (diagnostik menampilkannya). |
| Pratinjau kosong/putih | Tekan **● Home** di bilah pratinjau untuk memuat ulang iframe. |

---

Kontak: ig@donitata1717 · wa 6285156776974
