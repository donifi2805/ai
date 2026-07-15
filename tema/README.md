# Sistem Tema

Folder ini ditujukan untuk ditempatkan sebagai `public_html/tema/`.

- `themes.json`: katalog, metadata, dan urutan menu setiap tema.
- `base.css`: tampilan pemilih dan pratinjau tema.
- `classic.css`, `aurora.css`, `minimal.css`, `midnight.css`: tata letak tiap tema.
- `tema.js`: pemuatan katalog, pratinjau langsung, penerapan, dan penyimpanan pilihan.

Pilihan pengguna disimpan pada `localStorage` browser dengan key `bhuleemarket_app_theme`, sedangkan seluruh definisi dan aset tema tetap berada dalam folder ini. Untuk menambah tema, buat file CSS baru dan daftarkan metadata serta nama filenya di `themes.json`.
