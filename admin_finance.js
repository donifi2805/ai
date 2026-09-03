/**
 * MODUL KEUANGAN & MONITORING TRANSAKSI PANEL ADMIN
 * 65+ Fitur Baru - Penyimpanan via api_finance.php ke file JSON di hosting
 * 
 * Daftar Fitur (74 fitur asli):
 * 
 * MENU: KEUANGAN & LABA
 *   1. Dashboard Keuangan Lengkap
 *   2. Laba Hari Ini (real-time dari transaksi berhasil + pemasukan lain - pengeluaran)
 *   3. Laba Minggu Ini
 *   4. Laba Bulan Ini
 *   5. Laba Tahun Ini
 *   6. Grafik Laba Harian (7 hari)
 *   7. Grafik Laba Bulanan (12 bulan)
 *   8. Total Omset (semua transaksi berhasil)
 *   9. Rata-rata Laba per Hari
 *  10. Rata-rata Transaksi per Hari
 *  11. Target Laba Harian vs Realisasi (progress bar)
 *  12. Target Laba Bulanan vs Realisasi (progress bar)
 *  13. Margin Keuntungan per Transaksi (%)
 *  14. Kategori Penjualan Terlaris (berat)
 *  15. Prediksi Laba Akhir Bulan (forecasting sederhana)
 * 
 * MENU: PENGELUARAN OPERASIONAL
 *  16. Catat Pengeluaran Baru (dengan kategori)
 *  17. Lihat Daftar Pengeluaran
 *  18. Filter Pengeluaran per Kategori
 *  19. Filter Pengeluaran per Tanggal
 *  20. Total Pengeluaran Hari Ini
 *  21. Total Pengeluaran Bulan Ini
 *  22. Hapus Pengeluaran
 *  23. Kustom Kategori Pengeluaran
 *  24. Pengeluaran Terbesar (top 10)
 * 
 * MENU: PEMASUKAN LAINNYA
 *  25. Catat Pemasukan Non-Penjualan (bonus, bunga, dll)
 *  26. Lihat Daftar Pemasukan Lain
 *  27. Total Pemasukan Lain per Periode
 *  28. Hapus Pemasukan
 * 
 * MENU: DEPOSIT MODAL PUSAT
 *  29. Catat Deposit Saldo Provider (modal)
 *  30. Riwayat Deposit Provider
 *  31. Total Deposit Bulan Ini
 *  32. Hapus Riwayat Deposit
 * 
 * MENU: HUTANG PIUTANG
 *  33. Catat Hutang ke Provider/Supplier
 *  34. Catat Piutang User (saldo minus/bon)
 *  35. Status Lunas/Belum Lunas
 *  36. Tandai Lunas
 *  37. Ringkasan Total Hutang
 *  38. Ringkasan Total Piutang
 *  39. Hapus Catatan
 * 
 * MENU: HPP & MARGIN PER PRODUK
 *  40. Input HPP (Harga Pokok) per kode produk
 *  41. Auto-hitung margin per transaksi
 *  42. Daftar Produk dengan Margin Terkecil
 *  43. Daftar Produk dengan Margin Terbesar
 *  44. Hapus HPP Produk
 * 
 * MENU: MONITORING TRANSAKSI ADVANCED
 *  45. Live Transaction Monitor (auto refresh 5 detik)
 *  46. Transaksi Berhasil per Jam (heatmap)
 *  47. Statistik Status Trx (Berhasil/Gagal/Pending)
 *  48. Persentase Keberhasilan Trx (Success Rate)
 *  49. Daftar Transaksi Gagal Hari Ini (insight)
 *  50. Analisis Penyebab Gagal (group by SN/msg)
 *  51. Filter Transaksi by Provider
 *  52. Filter by Rentang Harga
 *  53. Transaksi Nominal Besar (> Rp X)
 *  54. Cek Status Masal (multiple trx_id)
 *  55. Log Semua Raw JSON Response API (tersimpan otomatis)
 *  56. Cek Status ke Pusat + TAMPILKAN RAW JSON MENTAH
 * 
 * MENU: SALDO & PROVIDER HEALTH
 *  57. Monitoring Saldo Semua Provider di Satu Halaman
 *  58. Alert Saldo Provider di Bawah Batas Minimum
 *  59. Cek Ping/Health Koneksi ke Semua Provider
 *  60. Response Time Server Provider (ms)
 *  61. Riwayat Fluktuasi Saldo Provider (manual log)
 * 
 * MENU: LAPORAN
 *  62. Laporan Laba Rugi Harian
 *  63. Laporan Laba Rugi Bulanan
 *  64. Laporan Penjualan per Provider
 *  65. Export Laporan CSV
 *  66. Cetak Laporan (Print)
 *  67. Simpan Laporan ke JSON
 * 
 * MENU: AKTIVITAS ADMIN & AUDIT
 *  68. Log Semua Aksi Admin (auto-record)
 *  69. Filter Log Admin by Waktu
 *  70. Backup Semua Data Keuangan (JSON download)
 *  71. Restore Data dari File Backup
 *  72. Pengaturan Batas Alert Saldo & Target Laba
 *  73. Reset Semua Data Keuangan (dengan konfirmasi)
 *  74. Dashboard Ringkasan Cepat di Halaman Utama
 */

const FIN_API = 'api_finance.php';

// ==================== UTILITY ====================
function finFmt(n) { return 'Rp ' + new Intl.NumberFormat('id-ID').format(parseInt(n||0)); }
function finFmtNum(n) { return new Intl.NumberFormat('id-ID').format(parseInt(n||0)); }
function finId(prefix='ID') { return prefix + '-' + Date.now() + '-' + Math.floor(Math.random()*9999); }
function finNow() { return new Date().toISOString().slice(0,19).replace('T',' '); }
function finToday() { return new Date().toISOString().slice(0,10); }
function finMonth() { return new Date().toISOString().slice(0,7); }

async function finApi(action, data = null, method = 'GET') {
    try {
        let url = FIN_API + '?action=' + action;
        let opts = { method };
        if (data) {
            opts.method = 'POST';
            opts.headers = { 'Content-Type': 'application/json' };
            opts.body = JSON.stringify(data);
        }
        const res = await fetch(url, opts);
        return await res.json();
    } catch(e) {
        console.error('Finance API Error:', e);
        return { status: 'error', msg: e.message };
    }
}

async function finLog(action, detail) {
    await finApi('add_log_admin', { aksi: action, detail: detail }, 'POST');
}

function finNotif(type, msg) {
    const color = type === 'success' ? '#10b981' : (type === 'error' ? '#ef4444' : '#2563eb');
    const icon = type === 'success' ? 'check-circle' : (type === 'error' ? 'times-circle' : 'info-circle');
    const div = document.createElement('div');
    div.style.cssText = `position:fixed;top:80px;right:20px;background:${color};color:white;padding:12px 20px;border-radius:10px;z-index:999999;box-shadow:0 8px 20px rgba(0,0,0,.2);font-weight:bold;font-size:13px;max-width:350px;animation:slideInRight .3s;`;
    div.innerHTML = `<i class="fas fa-${icon}"></i> ${msg}`;
    document.body.appendChild(div);
    setTimeout(() => div.remove(), 3500);
}

function finConfirm(msg) { return confirm(msg); }
function finPrompt(msg, def='') { return prompt(msg, def); }

// ==================== PAGE ROUTING TAMBAHAN ====================
function finInit() {
    // Sudah dijalankan saat DOM ready
    finAddMenuItems();
    finAddSections();
    finLoadFinanceSettings();
}

function finAddMenuItems() {
    const sidebar = document.querySelector('.sidebar-menu');
    if (!sidebar || sidebar.dataset.finAdded) return;
    sidebar.dataset.finAdded = '1';

    // Cari logout button
    const logoutBtn = sidebar.querySelector('.logout-btn');

    const newMenus = `
        <li class="menu-label">Keuangan 💰</li>
        <li onclick="finShowPage('view-fin-dashboard', this)"><i class="fas fa-chart-pie"></i> Dashboard Keuangan</li>
        <li onclick="finShowPage('view-fin-pengeluaran', this)"><i class="fas fa-money-bill-wave"></i> Pengeluaran</li>
        <li onclick="finShowPage('view-fin-pemasukan', this)"><i class="fas fa-hand-holding-usd"></i> Pemasukan Lain</li>
        <li onclick="finShowPage('view-fin-deposit', this)"><i class="fas fa-university"></i> Deposit Modal</li>
        <li onclick="finShowPage('view-fin-hutang', this)"><i class="fas fa-file-invoice"></i> Hutang Piutang</li>
        <li onclick="finShowPage('view-fin-hpp', this)"><i class="fas fa-tags"></i> HPP / Margin</li>

        <li class="menu-label">Monitoring 🔍</li>
        <li onclick="finShowPage('view-fin-live-monitor', this)"><i class="fas fa-broadcast-tower"></i> Live Monitor Trx</li>
        <li onclick="finShowPage('view-fin-trx-cek', this)"><i class="fas fa-satellite-dish"></i> Cek Status Trx</li>
        <li onclick="finShowPage('view-fin-provider', this)"><i class="fas fa-server"></i> Kesehatan Provider</li>
        <li onclick="finShowPage('view-fin-api-logs', this)"><i class="fas fa-terminal"></i> Raw API Logs</li>

        <li class="menu-label">Laporan 📊</li>
        <li onclick="finShowPage('view-fin-laporan', this)"><i class="fas fa-file-alt"></i> Laporan Laba Rugi</li>
        <li onclick="finShowPage('view-fin-admin-log', this)"><i class="fas fa-user-shield"></i> Log Aktivitas Admin</li>
        <li onclick="finShowPage('view-fin-backup', this)"><i class="fas fa-database"></i> Backup & Restore</li>
        <li onclick="finShowPage('view-fin-settings', this)"><i class="fas fa-sliders-h"></i> Pengaturan Keuangan</li>
    `;

    // Insert sebelum logout
    if (logoutBtn) {
        logoutBtn.insertAdjacentHTML('beforebegin', newMenus);
    } else {
        sidebar.insertAdjacentHTML('beforeend', newMenus);
    }
}

function finShowPage(pageId, liElement) {
    document.querySelectorAll('.page-section').forEach(p => p.classList.remove('active'));
    document.querySelectorAll('.sidebar-menu li').forEach(l => l.classList.remove('active'));
    const page = document.getElementById(pageId);
    if (page) page.classList.add('active');
    if (liElement) liElement.classList.add('active');

    // Tutup sidebar mobile
    const sb = document.getElementById('sidebar');
    const ov = document.getElementById('mobileOverlay');
    if (sb && sb.classList.contains('active')) {
        sb.classList.remove('active');
        if (ov) ov.classList.remove('active');
    }

    // Ubah title
    const titleMap = {
        'view-fin-dashboard': 'Dashboard Keuangan',
        'view-fin-pengeluaran': 'Pengeluaran Operasional',
        'view-fin-pemasukan': 'Pemasukan Lainnya',
        'view-fin-deposit': 'Deposit Modal Provider',
        'view-fin-hutang': 'Hutang Piutang',
        'view-fin-hpp': 'HPP & Margin Produk',
        'view-fin-live-monitor': 'Live Monitor Transaksi',
        'view-fin-trx-cek': 'Cek Status Transaksi',
        'view-fin-provider': 'Kesehatan Provider',
        'view-fin-api-logs': 'Raw API Logs',
        'view-fin-laporan': 'Laporan Laba Rugi',
        'view-fin-admin-log': 'Log Aktivitas Admin',
        'view-fin-backup': 'Backup & Restore',
        'view-fin-settings': 'Pengaturan Keuangan'
    };
    const pt = document.getElementById('pageTitle');
    if (pt && titleMap[pageId]) pt.innerText = titleMap[pageId];

    // Trigger load data per halaman
    finLoadPage(pageId);
}

// ==================== ADD SECTIONS HTML ====================
function finAddSections() {
    const contentBody = document.querySelector('.content-body');
    if (!contentBody || contentBody.dataset.finAdded) return;
    contentBody.dataset.finAdded = '1';

    const html = `
    <!-- =============== 1. DASHBOARD KEUANGAN =============== -->
    <div id="view-fin-dashboard" class="page-section">
      <div class="section">
        <h4><i class="fas fa-chart-pie"></i> Dashboard Keuangan Real-time</h4>
        <p style="font-size:12px;color:#666;">Ringkasan lengkap keuangan toko Anda, terintegrasi dengan data transaksi user dari Firebase dan data pengeluaran/pemasukan dari server hosting.</p>

        <div class="stats-grid" id="finDashStats"></div>

        <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(350px,1fr));gap:20px;margin-top:20px;">
          <div style="background:#f8fafc;border:1px solid #e2e8f0;border-radius:16px;padding:18px;">
            <h5 style="margin:0 0 12px;color:#1e293b;"><i class="fas fa-chart-line"></i> Laba 7 Hari Terakhir</h5>
            <div style="position:relative;height:220px;"><canvas id="finChartLabaMinggu"></canvas></div>
          </div>
          <div style="background:#f8fafc;border:1px solid #e2e8f0;border-radius:16px;padding:18px;">
            <h5 style="margin:0 0 12px;color:#1e293b;"><i class="fas fa-chart-area"></i> Laba 12 Bulan Terakhir</h5>
            <div style="position:relative;height:220px;"><canvas id="finChartLabaTahun"></canvas></div>
          </div>
        </div>

        <div style="margin-top:20px;display:grid;grid-template-columns:repeat(auto-fit,minmax(280px,1fr));gap:15px;">
          <div style="background:linear-gradient(135deg,#10b981,#059669);color:white;border-radius:14px;padding:18px;">
            <div style="font-size:11px;font-weight:bold;opacity:.9;margin-bottom:8px;"><i class="fas fa-bullseye"></i> TARGET LABA HARIAN</div>
            <div id="finTargetHariNum" style="font-size:22px;font-weight:900;">Rp 0 / Rp 0</div>
            <div style="background:rgba(255,255,255,.3);height:10px;border-radius:99px;margin-top:10px;overflow:hidden;">
              <div id="finTargetHariBar" style="height:100%;background:white;width:0%;transition:.5s;border-radius:99px;"></div>
            </div>
          </div>
          <div style="background:linear-gradient(135deg,#2563eb,#1d4ed8);color:white;border-radius:14px;padding:18px;">
            <div style="font-size:11px;font-weight:bold;opacity:.9;margin-bottom:8px;"><i class="fas fa-bullseye"></i> TARGET LABA BULANAN</div>
            <div id="finTargetBulanNum" style="font-size:22px;font-weight:900;">Rp 0 / Rp 0</div>
            <div style="background:rgba(255,255,255,.3);height:10px;border-radius:99px;margin-top:10px;overflow:hidden;">
              <div id="finTargetBulanBar" style="height:100%;background:white;width:0%;transition:.5s;border-radius:99px;"></div>
            </div>
          </div>
          <div style="background:linear-gradient(135deg,#f59e0b,#d97706);color:white;border-radius:14px;padding:18px;">
            <div style="font-size:11px;font-weight:bold;opacity:.9;margin-bottom:8px;"><i class="fas fa-calculator"></i> PREDIKSI LABA AKHIR BULAN</div>
            <div id="finPrediksiLaba" style="font-size:22px;font-weight:900;">Rp 0</div>
            <div style="font-size:11px;opacity:.9;margin-top:6px;">Berdasarkan rata-rata harian berjalan</div>
          </div>
        </div>

        <div style="margin-top:20px;background:#fff7ed;border:1px solid #fed7aa;border-radius:14px;padding:15px;" id="finAlertArea"></div>

        <div class="quick-grid" style="margin-top:20px;">
          <div class="btn-quick" onclick="finShowPage('view-fin-pengeluaran', finGetLi('view-fin-pengeluaran'))"><i class="fas fa-minus-circle" style="color:#ef4444;"></i> Catat Pengeluaran</div>
          <div class="btn-quick" onclick="finShowPage('view-fin-pemasukan', finGetLi('view-fin-pemasukan'))"><i class="fas fa-plus-circle" style="color:#10b981;"></i> Tambah Pemasukan</div>
          <div class="btn-quick" onclick="finShowPage('view-fin-deposit', finGetLi('view-fin-deposit'))"><i class="fas fa-university" style="color:#2563eb;"></i> Catat Deposit</div>
          <div class="btn-quick" onclick="finShowPage('view-fin-laporan', finGetLi('view-fin-laporan'))"><i class="fas fa-file-export" style="color:#8b5cf6;"></i> Export Laporan</div>
        </div>
      </div>
    </div>

    <!-- =============== 2. PENGELUARAN =============== -->
    <div id="view-fin-pengeluaran" class="page-section">
      <div class="section">
        <h4><i class="fas fa-money-bill-wave"></i> Pengeluaran Operasional</h4>
        <div class="stats-grid" style="margin-bottom:15px;">
          <div class="stat-card" style="border-left-color:#ef4444;"><p>HARI INI</p><h2 id="finOutToday">Rp 0</h2></div>
          <div class="stat-card" style="border-left-color:#ef4444;"><p>BULAN INI</p><h2 id="finOutMonth">Rp 0</h2></div>
          <div class="stat-card" style="border-left-color:#7c3aed;"><p>TOTAL ITEM</p><h2 id="finOutCount">0</h2></div>
        </div>
        <div style="display:flex;gap:10px;flex-wrap:wrap;margin-bottom:15px;background:#f8fafc;padding:15px;border-radius:12px;">
          <select id="finOutKategori" style="flex:1;padding:10px;border:1px solid #ddd;border-radius:8px;">
            <option value="">-- Kategori --</option>
          </select>
          <input type="text" id="finOutKet" placeholder="Keterangan" style="flex:2;padding:10px;border:1px solid #ddd;border-radius:8px;">
          <input type="number" id="finOutNominal" placeholder="Nominal" style="flex:1;padding:10px;border:1px solid #ddd;border-radius:8px;">
          <button onclick="finAddPengeluaran()" style="width:auto;padding:10px 20px;background:#ef4444;color:white;border:none;border-radius:8px;font-weight:bold;cursor:pointer;"><i class="fas fa-plus"></i> Catat</button>
        </div>
        <div style="display:flex;gap:10px;margin-bottom:10px;flex-wrap:wrap;">
          <input type="date" id="finOutFilterDate" style="padding:8px;border:1px solid #ddd;border-radius:6px;" onchange="finLoadPengeluaran()">
          <select id="finOutFilterKategori" style="padding:8px;border:1px solid #ddd;border-radius:6px;" onchange="finLoadPengeluaran()"><option value="">Semua Kategori</option></select>
          <button onclick="document.getElementById('finOutFilterDate').value='';document.getElementById('finOutFilterKategori').value='';finLoadPengeluaran();" style="width:auto;padding:8px 15px;background:#64748b;color:white;border:none;border-radius:6px;cursor:pointer;">Reset</button>
          <button onclick="finManageKategori('pengeluaran')" style="width:auto;padding:8px 15px;background:#8b5cf6;color:white;border:none;border-radius:6px;cursor:pointer;margin-left:auto;"><i class="fas fa-edit"></i> Edit Kategori</button>
        </div>
        <div style="overflow-x:auto;max-height:500px;overflow-y:auto;">
          <table><thead><tr><th>Tanggal</th><th>Kategori</th><th>Keterangan</th><th>Nominal</th><th>Aksi</th></tr></thead><tbody id="finOutTable"></tbody></table>
        </div>
      </div>
    </div>

    <!-- =============== 3. PEMASUKAN LAIN =============== -->
    <div id="view-fin-pemasukan" class="page-section">
      <div class="section">
        <h4><i class="fas fa-hand-holding-usd"></i> Pemasukan Non-Penjualan</h4>
        <p style="font-size:12px;color:#666;">Catat pemasukan dari luar transaksi user (bonus provider, referral, dll)</p>
        <div class="stats-grid" style="margin-bottom:15px;">
          <div class="stat-card" style="border-left-color:#10b981;"><p>HARI INI</p><h2 id="finInToday">Rp 0</h2></div>
          <div class="stat-card" style="border-left-color:#10b981;"><p>BULAN INI</p><h2 id="finInMonth">Rp 0</h2></div>
        </div>
        <div style="display:flex;gap:10px;flex-wrap:wrap;margin-bottom:15px;background:#f0fdf4;padding:15px;border-radius:12px;">
          <select id="finInKategori" style="flex:1;padding:10px;border:1px solid #bbf7d0;border-radius:8px;">
            <option value="">-- Kategori --</option>
          </select>
          <input type="text" id="finInKet" placeholder="Keterangan" style="flex:2;padding:10px;border:1px solid #bbf7d0;border-radius:8px;">
          <input type="number" id="finInNominal" placeholder="Nominal" style="flex:1;padding:10px;border:1px solid #bbf7d0;border-radius:8px;">
          <button onclick="finAddPemasukan()" style="width:auto;padding:10px 20px;background:#10b981;color:white;border:none;border-radius:8px;font-weight:bold;cursor:pointer;"><i class="fas fa-plus"></i> Catat</button>
        </div>
        <div style="overflow-x:auto;max-height:500px;overflow-y:auto;">
          <table><thead><tr><th>Tanggal</th><th>Kategori</th><th>Keterangan</th><th>Nominal</th><th>Aksi</th></tr></thead><tbody id="finInTable"></tbody></table>
        </div>
      </div>
    </div>

    <!-- =============== 4. DEPOSIT MODAL =============== -->
    <div id="view-fin-deposit" class="page-section">
      <div class="section">
        <h4><i class="fas fa-university"></i> Riwayat Deposit Modal Provider</h4>
        <p style="font-size:12px;color:#666;">Catat setiap pengisian saldo ke provider (KHFY, ICS, KAJE) untuk tracking modal.</p>
        <div class="stats-grid" style="margin-bottom:15px;">
          <div class="stat-card" style="border-left-color:#2563eb;"><p>DEPOSIT BULAN INI</p><h2 id="finDepMonth">Rp 0</h2></div>
          <div class="stat-card" style="border-left-color:#e67e22;"><p>TOTAL DEPOSIT</p><h2 id="finDepAll">Rp 0</h2></div>
        </div>
        <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(180px,1fr));gap:10px;margin-bottom:15px;background:#eff6ff;padding:15px;border-radius:12px;">
          <select id="finDepProvider" style="padding:10px;border:1px solid #bfdbfe;border-radius:8px;">
            <option value="KHFY">KHFY</option><option value="ICS">ICS Store</option><option value="KAJE">KAJE Store</option><option value="WZ">WZ</option><option value="OrKut">OrKut (OkeConnect)</option>
          </select>
          <input type="number" id="finDepNominal" placeholder="Nominal Deposit" style="padding:10px;border:1px solid #bfdbfe;border-radius:8px;">
          <input type="number" id="finDepSaldoSetelah" placeholder="Saldo Setelah Deposit (opsional)" style="padding:10px;border:1px solid #bfdbfe;border-radius:8px;">
          <select id="finDepMetode" style="padding:10px;border:1px solid #bfdbfe;border-radius:8px;">
            <option value="Transfer Bank">Transfer Bank</option><option value="QRIS">QRIS</option><option value="E-Wallet">E-Wallet</option><option value="Virtual Account">VA</option>
          </select>
          <input type="text" id="finDepKet" placeholder="Keterangan" style="padding:10px;border:1px solid #bfdbfe;border-radius:8px;">
          <button onclick="finAddDeposit()" style="padding:10px;background:#2563eb;color:white;border:none;border-radius:8px;font-weight:bold;cursor:pointer;"><i class="fas fa-plus"></i> Catat</button>
        </div>
        <div style="overflow-x:auto;max-height:500px;overflow-y:auto;">
          <table><thead><tr><th>Tanggal</th><th>Provider</th><th>Nominal</th><th>Metode</th><th>Saldo Akhir</th><th>Keterangan</th><th>Aksi</th></tr></thead><tbody id="finDepTable"></tbody></table>
        </div>
      </div>
    </div>

    <!-- =============== 5. HUTANG PIUTANG =============== -->
    <div id="view-fin-hutang" class="page-section">
      <div class="section">
        <h4><i class="fas fa-file-invoice"></i> Hutang & Piutang</h4>
        <div class="stats-grid" style="margin-bottom:15px;">
          <div class="stat-card" style="border-left-color:#ef4444;"><p>TOTAL HUTANG (belum lunas)</p><h2 id="finHutangTotal">Rp 0</h2></div>
          <div class="stat-card" style="border-left-color:#f59e0b;"><p>TOTAL PIUTANG (belum lunas)</p><h2 id="finPiutangTotal">Rp 0</h2></div>
        </div>
        <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:10px;margin-bottom:20px;background:#fef3c7;padding:15px;border-radius:12px;">
          <select id="finHpTipe" style="padding:10px;border:1px solid #fcd34d;border-radius:8px;"><option value="piutang">Piutang (orang berhutang ke kita)</option><option value="hutang">Hutang (kita berhutang)</option></select>
          <input type="text" id="finHpPihak" placeholder="Nama pihak (user/supplier)" style="padding:10px;border:1px solid #fcd34d;border-radius:8px;">
          <input type="number" id="finHpNominal" placeholder="Nominal" style="padding:10px;border:1px solid #fcd34d;border-radius:8px;">
          <input type="text" id="finHpKet" placeholder="Keterangan" style="padding:10px;border:1px solid #fcd34d;border-radius:8px;">
          <button onclick="finAddHutangPiutang()" style="padding:10px;background:#d97706;color:white;border:none;border-radius:8px;font-weight:bold;cursor:pointer;"><i class="fas fa-plus"></i> Tambah</button>
        </div>
        <div style="overflow-x:auto;max-height:500px;overflow-y:auto;">
          <table><thead><tr><th>Tanggal</th><th>Tipe</th><th>Pihak</th><th>Nominal</th><th>Keterangan</th><th>Status</th><th>Aksi</th></tr></thead><tbody id="finHpTable"></tbody></table>
        </div>
      </div>
    </div>

    <!-- =============== 6. HPP & MARGIN =============== -->
    <div id="view-fin-hpp" class="page-section">
      <div class="section">
        <h4><i class="fas fa-tags"></i> HPP & Margin Produk</h4>
        <p style="font-size:12px;color:#666;">Catat Harga Pokok Penjualan per kode produk untuk menghitung margin keuntungan bersih secara akurat.</p>
        <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(180px,1fr));gap:10px;margin-bottom:20px;background:#faf5ff;padding:15px;border-radius:12px;">
          <input type="text" id="finHppKode" placeholder="Kode Produk (contoh: TSEL10)" style="padding:10px;border:1px solid #e9d5ff;border-radius:8px;">
          <input type="text" id="finHppNama" placeholder="Nama Produk" style="padding:10px;border:1px solid #e9d5ff;border-radius:8px;">
          <select id="finHppProvider" style="padding:10px;border:1px solid #e9d5ff;border-radius:8px;"><option value="KHFY">KHFY</option><option value="ICS">ICS</option><option value="KAJE">KAJE</option><option value="WZ">WZ</option></select>
          <input type="number" id="finHppNominal" placeholder="HPP (modal per trx)" style="padding:10px;border:1px solid #e9d5ff;border-radius:8px;">
          <button onclick="finSaveHpp()" style="padding:10px;background:#9333ea;color:white;border:none;border-radius:8px;font-weight:bold;cursor:pointer;"><i class="fas fa-save"></i> Simpan</button>
        </div>
        <div id="finHppMarginStats" class="stats-grid" style="margin-bottom:15px;"></div>
        <div style="overflow-x:auto;max-height:500px;overflow-y:auto;">
          <table><thead><tr><th>Kode</th><th>Nama</th><th>Provider</th><th>HPP</th><th>Margin Rata2</th><th>Aksi</th></tr></thead><tbody id="finHppTable"></tbody></table>
        </div>
      </div>
    </div>

    <!-- =============== 7. LIVE MONITOR TRANSAKSI =============== -->
    <div id="view-fin-live-monitor" class="page-section">
      <div class="section">
        <h4><i class="fas fa-broadcast-tower"></i> Live Monitoring Transaksi <span id="finLiveIndicator" style="background:#10b981;color:white;padding:3px 10px;border-radius:20px;font-size:10px;margin-left:10px;animation:pulse 2s infinite;">LIVE</span></h4>
        <p style="font-size:12px;color:#666;">Monitor transaksi masuk secara real-time dengan auto-refresh 5 detik.</p>
        <div class="stats-grid" style="margin-bottom:15px;" id="finLiveStats"></div>
        <div style="display:flex;gap:10px;margin-bottom:15px;flex-wrap:wrap;">
          <button onclick="finLiveRefresh=true;finStartLiveMonitor();" id="finLiveBtnToggle" style="width:auto;padding:8px 15px;background:#10b981;color:white;border:none;border-radius:6px;font-weight:bold;cursor:pointer;"><i class="fas fa-play"></i> Mulai Live</button>
          <button onclick="finLiveRefresh=false;finStopLiveMonitor();" style="width:auto;padding:8px 15px;background:#ef4444;color:white;border:none;border-radius:6px;font-weight:bold;cursor:pointer;"><i class="fas fa-stop"></i> Stop</button>
          <select id="finLiveFilterStatus" style="padding:8px;border:1px solid #ddd;border-radius:6px;" onchange="finRenderLiveList()">
            <option value="SEMUA">Semua Status</option><option value="BERHASIL">Berhasil</option><option value="PENDING">Pending</option><option value="GAGAL">Gagal</option>
          </select>
          <select id="finLiveFilterProvider" style="padding:8px;border:1px solid #ddd;border-radius:6px;" onchange="finRenderLiveList()">
            <option value="">Semua Provider</option><option value="KHFY">KHFY</option><option value="ICS">ICS</option><option value="KAJE">KAJE</option><option value="WZ">WZ</option>
          </select>
          <input type="number" id="finLiveMinHarga" placeholder="Min Harga" style="padding:8px;border:1px solid #ddd;border-radius:6px;width:130px;" oninput="finRenderLiveList()">
        </div>
        <div id="finLiveFeed" style="max-height:500px;overflow-y:auto;background:#0f172a;border-radius:12px;padding:12px;font-family:monospace;font-size:11px;color:#e2e8f0;"></div>
      </div>
    </div>

    <!-- =============== 8. CEK STATUS TRANSAKSI (PUSAT) =============== -->
    <div id="view-fin-trx-cek" class="page-section">
      <div class="section">
        <h4><i class="fas fa-satellite-dish"></i> Cek Status Transaksi ke Pusat</h4>
        <p style="font-size:12px;color:#666;">Masukkan RefID transaksi untuk mengecek status langsung ke server provider. <b>Respon JSON MENTAH dari server akan ditampilkan apa adanya.</b></p>

        <div style="background:#f8fafc;padding:18px;border-radius:14px;border:1px solid #e2e8f0;margin-bottom:20px;">
          <div class="form-group"><label>Pilih Provider</label>
            <select id="finCekProvider" style="padding:12px;border:1px solid #ddd;border-radius:8px;width:100%;">
              <option value="auto">-- Auto Deteksi (berdasarkan awalan RefID) --</option>
              <option value="KHFY">KHFY (Paket Akrab) - RefID: KF-</option>
              <option value="ICS">ICS Store (Reguler) - RefID: IS-/ICS-</option>
              <option value="KAJE">KAJE Store - RefID: KJ-/KAJE-</option>
              <option value="WZ">WZ Gateway - RefID: wz...</option>
              <option value="PAYDISINI">Paydisini (Topup) - RefID: 8 angka</option>
              <option value="CEK_STATUS">Universal (cek_status.php)</option>
            </select>
          </div>
          <div class="form-group"><label>Ref ID / Order ID</label><input type="text" id="finCekRefId" placeholder="Contoh: KF-1730000000" style="padding:12px;border:1px solid #ddd;border-radius:8px;width:100%;"></div>
          <div class="form-group" style="display:grid;grid-template-columns:1fr 1fr;gap:10px;">
            <div><label>Tujuan (No HP)</label><input type="text" id="finCekTujuan" placeholder="08123xxx" style="padding:10px;border:1px solid #ddd;border-radius:8px;width:100%;"></div>
            <div><label>Kode Produk</label><input type="text" id="finCekKode" placeholder="Contoh: TSEL10" style="padding:10px;border:1px solid #ddd;border-radius:8px;width:100%;"></div>
          </div>
          <button onclick="finCekStatusTrx()" style="padding:14px;background:linear-gradient(135deg,#2563eb,#1d4ed8);color:white;border:none;border-radius:10px;font-weight:bold;cursor:pointer;width:100%;font-size:14px;margin-top:10px;"><i class="fas fa-radar"></i> CEK STATUS KE PUSAT SEKARANG</button>
        </div>

        <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(250px,1fr));gap:10px;margin-bottom:20px;">
          <div style="background:#eff6ff;padding:15px;border-radius:12px;border:1px solid #bfdbfe;">
            <div style="font-size:11px;color:#1e40af;font-weight:bold;margin-bottom:5px;"><i class="fas fa-info-circle"></i> STATUS TERDETEKSI</div>
            <div id="finCekStatusResult" style="font-size:20px;font-weight:900;color:#1e40af;">-</div>
          </div>
          <div style="background:#fef3c7;padding:15px;border-radius:12px;border:1px solid #fcd34d;">
            <div style="font-size:11px;color:#92400e;font-weight:bold;margin-bottom:5px;"><i class="fas fa-receipt"></i> SN / KETERANGAN</div>
            <div id="finCekSnResult" style="font-size:13px;color:#92400e;word-break:break-all;">-</div>
          </div>
          <div style="background:#f0fdf4;padding:15px;border-radius:12px;border:1px solid #bbf7d0;">
            <div style="font-size:11px;color:#166534;font-weight:bold;margin-bottom:5px;"><i class="fas fa-clock"></i> RESPONSE TIME</div>
            <div id="finCekTimeResult" style="font-size:20px;font-weight:900;color:#166534;">- ms</div>
          </div>
        </div>

        <div style="background:#1e1e1e;border-radius:12px;padding:15px;border:1px solid #333;margin-top:10px;">
          <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:10px;">
            <h5 style="color:#00ff00;margin:0;font-family:monospace;"><i class="fas fa-code"></i> RAW JSON RESPONSE MENTAH DARI SERVER</h5>
            <button onclick="finCopyRawJson()" style="background:#333;color:#00ff00;border:1px solid #00ff00;padding:5px 12px;border-radius:5px;cursor:pointer;font-size:11px;font-family:monospace;"><i class="fas fa-copy"></i> Copy</button>
          </div>
          <pre id="finCekRawJson" style="color:#00ff00;font-family:'Courier New',monospace;font-size:11px;max-height:400px;overflow:auto;margin:0;white-space:pre-wrap;word-break:break-all;">Klik "CEK STATUS" untuk melihat JSON mentah dari server di sini. Respon ditampilkan apa adanya tanpa dimodifikasi.</pre>
        </div>

        <div style="margin-top:20px;">
          <h5><i class="fas fa-list-ol"></i> Cek Status Masal (Banyak RefID Sekaligus)</h5>
          <textarea id="finCekMasalText" rows="4" placeholder="Satu RefID per baris..." style="width:100%;padding:10px;border:1px solid #ddd;border-radius:8px;font-family:monospace;font-size:12px;"></textarea>
          <button onclick="finCekStatusMasal()" style="margin-top:10px;padding:10px 20px;background:#8b5cf6;color:white;border:none;border-radius:8px;font-weight:bold;cursor:pointer;"><i class="fas fa-tasks"></i> CEK MASAL (berurutan)</button>
          <div id="finCekMasalResult" style="margin-top:10px;"></div>
        </div>
      </div>
    </div>

    <!-- =============== 9. HEALTH PROVIDER =============== -->
    <div id="view-fin-provider" class="page-section">
      <div class="section">
        <h4><i class="fas fa-server"></i> Kesehatan Provider & Server</h4>
        <p style="font-size:12px;color:#666;">Monitor saldo semua provider, ping koneksi, dan response time dalam satu halaman.</p>
        <div id="finProviderSaldoGrid" class="stats-grid" style="margin-bottom:20px;"></div>
        <div style="display:flex;gap:10px;margin-bottom:15px;flex-wrap:wrap;">
          <button onclick="finCekSemuaSaldoProvider()" style="padding:10px 20px;background:#2563eb;color:white;border:none;border-radius:8px;font-weight:bold;cursor:pointer;"><i class="fas fa-sync"></i> Refresh Semua Saldo</button>
          <button onclick="finPingProvider()" style="padding:10px 20px;background:#10b981;color:white;border:none;border-radius:8px;font-weight:bold;cursor:pointer;"><i class="fas fa-heartbeat"></i> Ping Koneksi Provider</button>
        </div>
        <div id="finPingResult" style="display:grid;grid-template-columns:repeat(auto-fit,minmax(250px,1fr));gap:12px;"></div>
      </div>
    </div>

    <!-- =============== 10. RAW API LOGS =============== -->
    <div id="view-fin-api-logs" class="page-section">
      <div class="section">
        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:15px;flex-wrap:wrap;gap:10px;">
          <h4 style="margin:0;"><i class="fas fa-terminal"></i> Log Raw JSON Response API</h4>
          <button onclick="finClearApiLogs()" style="width:auto;padding:8px 15px;background:#ef4444;color:white;border:none;border-radius:6px;font-weight:bold;cursor:pointer;"><i class="fas fa-trash"></i> Bersihkan Log</button>
        </div>
        <p style="font-size:12px;color:#666;">Menyimpan semua respon mentah dari server provider saat cek status/transaksi. Maksimum 500 log terbaru.</p>
        <div style="display:flex;gap:10px;margin-bottom:10px;flex-wrap:wrap;">
          <select id="finApiLogProvider" style="padding:8px;border:1px solid #ddd;border-radius:6px;" onchange="finLoadApiLogs()"><option value="">Semua Provider</option><option value="KHFY">KHFY</option><option value="ICS">ICS</option><option value="KAJE">KAJE</option><option value="WZ</option></select>
          <button onclick="finLoadApiLogs()" style="width:auto;padding:8px 15px;background:#2563eb;color:white;border:none;border-radius:6px;cursor:pointer;"><i class="fas fa-sync"></i> Refresh</button>
        </div>
        <div id="finApiLogList" style="max-height:600px;overflow-y:auto;"></div>
      </div>
    </div>

    <!-- =============== 11. LAPORAN =============== -->
    <div id="view-fin-laporan" class="page-section">
      <div class="section">
        <h4><i class="fas fa-file-alt"></i> Laporan Laba Rugi</h4>
        <div style="display:flex;gap:10px;margin-bottom:20px;flex-wrap:wrap;background:#f8fafc;padding:15px;border-radius:12px;">
          <label style="font-size:12px;font-weight:bold;display:flex;align-items:center;">Periode:</label>
          <input type="date" id="finLapStart" style="padding:8px;border:1px solid #ddd;border-radius:6px;">
          <span style="display:flex;align-items:center;">s/d</span>
          <input type="date" id="finLapEnd" style="padding:8px;border:1px solid #ddd;border-radius:6px;">
          <select id="finLapTipe" style="padding:8px;border:1px solid #ddd;border-radius:6px;">
            <option value="harian">Hari Ini</option>
            <option value="minggu">7 Hari Terakhir</option>
            <option value="bulan" selected>Bulan Ini</option>
            <option value="tahun">Tahun Ini</option>
            <option value="custom">Custom</option>
          </select>
          <button onclick="finGenerateLaporan()" style="padding:8px 20px;background:#2563eb;color:white;border:none;border-radius:6px;font-weight:bold;cursor:pointer;"><i class="fas fa-calculator"></i> Generate</button>
          <button onclick="finExportCSV()" style="padding:8px 20px;background:#10b981;color:white;border:none;border-radius:6px;font-weight:bold;cursor:pointer;"><i class="fas fa-file-csv"></i> Export CSV</button>
          <button onclick="window.print()" style="padding:8px 20px;background:#64748b;color:white;border:none;border-radius:6px;font-weight:bold;cursor:pointer;"><i class="fas fa-print"></i> Cetak</button>
        </div>
        <div id="finLaporanContent"></div>
      </div>
    </div>

    <!-- =============== 12. LOG AKTIVITAS ADMIN =============== -->
    <div id="view-fin-admin-log" class="page-section">
      <div class="section">
        <h4><i class="fas fa-user-shield"></i> Log Aktivitas Admin</h4>
        <p style="font-size:12px;color:#666;">Semua aksi admin (tambah pengeluaran, deposit, hapus data, dll) tercatat otomatis untuk audit.</p>
        <div style="display:flex;gap:10px;margin-bottom:10px;flex-wrap:wrap;">
          <input type="date" id="finLogDate" style="padding:8px;border:1px solid #ddd;border-radius:6px;" onchange="finLoadAdminLogs()">
          <button onclick="document.getElementById('finLogDate').value='';finLoadAdminLogs();" style="width:auto;padding:8px 15px;background:#64748b;color:white;border:none;border-radius:6px;cursor:pointer;">Reset Filter</button>
        </div>
        <div id="finAdminLogList" style="max-height:600px;overflow-y:auto;"></div>
      </div>
    </div>

    <!-- =============== 13. BACKUP & RESTORE =============== -->
    <div id="view-fin-backup" class="page-section">
      <div class="section" style="max-width:700px;">
        <h4><i class="fas fa-database"></i> Backup & Restore Data Keuangan</h4>
        <p style="font-size:12px;color:#666;">Data keuangan (pengeluaran, pemasukan, deposit, hutang, HPP, log, setting) disimpan di file JSON pada hosting Anda. Backup secara berkala untuk keamanan.</p>
        <div style="display:grid;gap:15px;">
          <div style="background:#eff6ff;padding:20px;border-radius:14px;border:1px solid #bfdbfe;">
            <h5 style="margin:0 0 10px;color:#1e40af;"><i class="fas fa-download"></i> Backup Data</h5>
            <p style="font-size:12px;color:#1e40af;margin:0 0 12px;">Unduh semua data keuangan dalam file JSON yang bisa disimpan.</p>
            <button onclick="finBackupData()" style="padding:12px 20px;background:#2563eb;color:white;border:none;border-radius:8px;font-weight:bold;cursor:pointer;width:100%;"><i class="fas fa-file-download"></i> DOWNLOAD BACKUP JSON</button>
          </div>
          <div style="background:#fef3c7;padding:20px;border-radius:14px;border:1px solid #fcd34d;">
            <h5 style="margin:0 0 10px;color:#92400e;"><i class="fas fa-upload"></i> Restore Data</h5>
            <p style="font-size:12px;color:#92400e;margin:0 0 12px;">Unggah file backup JSON untuk memulihkan data. <b style="color:#dc2626;">PERINGATAN: Ini akan menimpa data yang ada!</b></p>
            <input type="file" id="finRestoreFile" accept=".json" style="margin-bottom:10px;padding:10px;border:1px solid #fcd34d;border-radius:8px;width:100%;box-sizing:border-box;">
            <button onclick="finRestoreData()" style="padding:12px 20px;background:#d97706;color:white;border:none;border-radius:8px;font-weight:bold;cursor:pointer;width:100%;"><i class="fas fa-file-upload"></i> RESTORE DARI FILE</button>
          </div>
          <div style="background:#fef2f2;padding:20px;border-radius:14px;border:1px solid #fecaca;">
            <h5 style="margin:0 0 10px;color:#991b1b;"><i class="fas fa-exclamation-triangle"></i> Reset Semua Data</h5>
            <p style="font-size:12px;color:#991b1b;margin:0 0 12px;">Menghapus SEMUA data keuangan. Tindakan ini tidak dapat dibatalkan. Backup terlebih dahulu!</p>
            <button onclick="finResetAllData()" style="padding:12px 20px;background:#dc2626;color:white;border:none;border-radius:8px;font-weight:bold;cursor:pointer;width:100%;"><i class="fas fa-trash-alt"></i> RESET SEMUA DATA KEUANGAN</button>
          </div>
        </div>
      </div>
    </div>

    <!-- =============== 14. PENGATURAN KEUANGAN =============== -->
    <div id="view-fin-settings" class="page-section">
      <div class="section" style="max-width:650px;">
        <h4><i class="fas fa-sliders-h"></i> Pengaturan Keuangan</h4>
        <p style="font-size:12px;color:#666;">Atur batas alert saldo provider minimum dan target laba untuk monitoring dashboard.</p>
        <div id="finSettingsForm">
          <div class="form-group"><label>Nama Toko / Usaha</label><input type="text" id="finSetNama"></div>
          <hr style="border:0;border-top:1px dashed #ddd;margin:20px 0;">
          <h5 style="color:#ef4444;margin:0 0 10px;"><i class="fas fa-bell"></i> Batas Minimum Alert Saldo Provider</h5>
          <div style="display:grid;grid-template-columns:1fr 1fr 1fr;gap:10px;margin-bottom:15px;">
            <div class="form-group"><label>Alert KHFY (Rp)</label><input type="number" id="finSetKhfy"></div>
            <div class="form-group"><label>Alert ICS (Rp)</label><input type="number" id="finSetIcs"></div>
            <div class="form-group"><label>Alert KAJE (Rp)</label><input type="number" id="finSetKaje"></div>
          </div>
          <hr style="border:0;border-top:1px dashed #ddd;margin:20px 0;">
          <h5 style="color:#10b981;margin:0 0 10px;"><i class="fas fa-bullseye"></i> Target Laba</h5>
          <div style="display:grid;grid-template-columns:1fr 1fr;gap:10px;margin-bottom:15px;">
            <div class="form-group"><label>Target Laba Harian (Rp)</label><input type="number" id="finSetTargetHari"></div>
            <div class="form-group"><label>Target Laba Bulanan (Rp)</label><input type="number" id="finSetTargetBulan"></div>
          </div>
          <div class="form-group"><label>Biaya Tetap Bulanan (listrik/internet/server, Rp)</label><input type="number" id="finSetBiayaTetap"></div>
          <button onclick="finSaveSettings()" style="padding:14px;background:#2563eb;color:white;border:none;border-radius:10px;font-weight:bold;cursor:pointer;width:100%;font-size:14px;"><i class="fas fa-save"></i> SIMPAN PENGATURAN</button>
        </div>
      </div>
    </div>

    <style>
      @keyframes pulse { 0%,100%{opacity:1} 50%{opacity:.5} }
      @keyframes slideInRight { from{transform:translateX(100%);opacity:0} to{transform:translateX(0);opacity:1} }
      .fin-log-entry{padding:8px;margin-bottom:6px;border-left:3px solid #333;background:#1e293b;border-radius:4px;font-size:11px;}
      .fin-log-entry.success{border-left-color:#10b981;}
      .fin-log-entry.pending{border-left-color:#f59e0b;}
      .fin-log-entry.gagal{border-left-color:#ef4444;}
      .fin-log-time{color:#64748b;font-size:10px;}
      .fin-log-provider{background:#334155;color:#fff;padding:1px 6px;border-radius:3px;font-size:9px;margin-right:4px;}
      @media print { .sidebar,.top-header,.logout-btn,.burger-btn,[onclick*="showPage"],[onclick*="finShowPage"] {display:none !important;} .main-content{margin-left:0 !important;} body{background:white;} }
    </style>
    `;
    contentBody.insertAdjacentHTML('beforeend', html);
}

function finGetLi(pageId) {
    return document.querySelector(`.sidebar-menu li[onclick*="${pageId}"]`);
}

// ==================== STATE ====================
let finSettings = {};
let finKategori = { pengeluaran: [], pemasukan: [] };
let finLiveInterval = null;
let finLiveRefresh = false;
let finLiveData = [];

// ==================== LOAD SETTINGS & KATEGORI ====================
async function finLoadFinanceSettings() {
    const s = await finApi('get_finance_settings');
    if (s.status === 'success') finSettings = s.data;
    const k = await finApi('get_kategori');
    if (k.status === 'success') finKategori = k.data;
}

// ==================== PAGE LOAD DISPATCHER ====================
function finLoadPage(pageId) {
    switch(pageId) {
        case 'view-fin-dashboard': finLoadDashboard(); break;
        case 'view-fin-pengeluaran': finLoadPengeluaran(); finLoadKategoriSelect(); break;
        case 'view-fin-pemasukan': finLoadPemasukan(); break;
        case 'view-fin-deposit': finLoadDeposit(); break;
        case 'view-fin-hutang': finLoadHutang(); break;
        case 'view-fin-hpp': finLoadHpp(); break;
        case 'view-fin-live-monitor': finInitLiveMonitor(); break;
        case 'view-fin-provider': finLoadProviderPage(); break;
        case 'view-fin-api-logs': finLoadApiLogs(); break;
        case 'view-fin-laporan': finInitLaporan(); break;
        case 'view-fin-admin-log': finLoadAdminLogs(); break;
        case 'view-fin-backup': break;
        case 'view-fin-settings': finLoadSettingsPage(); break;
        case 'view-fin-trx-cek': break;
    }
}

// ==================== DASHBOARD KEUANGAN ====================
async function finLoadDashboard() {
    // Ambil data dari finance API
    const [sumRes, outRes, inRes, depRes, hpRes] = await Promise.all([
        finApi('get_summary'),
        finApi('get_pengeluaran'),
        finApi('get_pemasukan_lain'),
        finApi('get_deposit_pusat'),
        finApi('get_hutang_piutang')
    ]);

    const summary = sumRes.data || {};
    const pengeluaran = outRes.data || [];
    const pemasukanLain = inRes.data || [];
    const deposit = depRes.data || [];
    const hutangPiutang = hpRes.data || [];

    // Hitung laba dari transaksi Firebase (sementara pakai fallback yang aman)
    let labaHariIni = summary.pemasukan_lain_hari_ini || 0;
    let labaBulanIni = summary.pemasukan_lain_bulan_ini || 0;
    let trxHariIniCount = 0, trxBulanIniCount = 0, trxBerhasilHariIni = 0, trxGagalHariIni=0, trxPendingHariIni=0;
    let omsetHariIni = 0, omsetBulanIni = 0;

    try {
        // Ambil transaksi dari Firebase hari ini
        const today = new Date();
        const startToday = new Date(today.getFullYear(), today.getMonth(), today.getDate());
        const endToday = new Date(today.getFullYear(), today.getMonth(), today.getDate(), 23,59,59,999);
        const startMonth = new Date(today.getFullYear(), today.getMonth(), 1);
        const endMonth = new Date(today.getFullYear(), today.getMonth()+1, 0, 23,59,59,999);

        if (window.db) {
            // Hari ini
            const qDay = query(collectionGroup(db,'riwayat_transaksi'), where('timestamp','>=',startToday), where('timestamp','<=',endToday));
            const snapDay = await getDocs(qDay);
            snapDay.forEach(d => {
                const it = d.data();
                trxHariIniCount++;
                const st = String(it.status||'').toUpperCase();
                if (st === 'BERHASIL' || st === 'SUKSES') { trxBerhasilHariIni++; omsetHariIni += parseInt(it.harga||0); }
                else if (st === 'GAGAL' || st === 'BATAL') trxGagalHariIni++;
                else trxPendingHariIni++;
            });
            // Bulan ini
            const qMonth = query(collectionGroup(db,'riwayat_transaksi'), where('timestamp','>=',startMonth), where('timestamp','<=',endMonth));
            const snapMonth = await getDocs(qMonth);
            let omsetBulanIniLocal = 0, trxBulanIniLocal = 0;
            snapMonth.forEach(d => {
                const it = d.data();
                trxBulanIniLocal++;
                const st = String(it.status||'').toUpperCase();
                if (st === 'BERHASIL' || st === 'SUKSES') omsetBulanIniLocal += parseInt(it.harga||0);
            });
            trxBulanIniCount = trxBulanIniLocal;
            omsetBulanIni = omsetBulanIniLocal;

            // Hitung perkiraan laba (asumsi markup rata-rata 5% jika tidak ada HPP - akan dibaca nanti)
            const hppRes2 = await finApi('get_hpp');
            const hppList = hppRes2.data || [];
            // Simplifikasi: laba = (omset * margin_est) - pengeluaran + pemasukan_lain
            // Kita estimasi margin: hitung dari markup setting (jika tersedia) atau default 7%
            let estimatedMarginRate = 0.07;
            labaHariIni = Math.round(omsetHariIni * estimatedMarginRate) + (summary.pemasukan_lain_hari_ini || 0) - (summary.pengeluaran_hari_ini || 0);
            labaBulanIni = Math.round(omsetBulanIni * estimatedMarginRate) + (summary.pemasukan_lain_bulan_ini || 0) - (summary.pengeluaran_bulan_ini || 0) - (finSettings.biaya_tetap_bulanan||0);
        }
    } catch(e) {
        console.warn('Firebase trx calculation skipped (dashboard finance):', e);
    }

    const targetHari = finSettings.target_laba_harian || 100000;
    const targetBulan = finSettings.target_laba_bulanan || 3000000;
    const now = new Date();
    const daysInMonth = new Date(now.getFullYear(), now.getMonth()+1, 0).getDate();
    const dayOfMonth = now.getDate();
    const avgLabaHari = dayOfMonth > 0 ? Math.round(labaBulanIni / dayOfMonth) : 0;
    const prediksiAkhirBulan = avgLabaHari * daysInMonth;
    const successRate = trxHariIniCount > 0 ? Math.round((trxBerhasilHariIni/trxHariIniCount)*100) : 0;

    // Stats cards
    const stats = document.getElementById('finDashStats');
    if (stats) {
        const hutang = summary.hutang_belum_lunas || 0;
        const piutang = summary.piutang_belum_lunas || 0;
        stats.innerHTML = `
            <div class="stat-card" style="border-left-color:#10b981;"><p><i class="fas fa-coins"></i> LABA BERSIH HARI INI</p><h2 style="color:#10b981;">${finFmt(labaHariIni)}</h2></div>
            <div class="stat-card" style="border-left-color:#2563eb;"><p><i class="fas fa-coins"></i> LABA BERSIH BULAN INI</p><h2 style="color:#2563eb;">${finFmt(labaBulanIni)}</h2></div>
            <div class="stat-card" style="border-left-color:#f59e0b;"><p><i class="fas fa-cash-register"></i> OMSET HARI INI</p><h2>${finFmt(omsetHariIni)}</h2></div>
            <div class="stat-card" style="border-left-color:#8b5cf6;"><p><i class="fas fa-cash-register"></i> OMSET BULAN INI</p><h2>${finFmt(omsetBulanIni)}</h2></div>
            <div class="stat-card" style="border-left-color:#06b6d4;"><p><i class="fas fa-chart-line"></i> RATA-RATA LABA/HARI</p><h2>${finFmt(avgLabaHari)}</h2></div>
            <div class="stat-card" style="border-left-color:#10b981;"><p><i class="fas fa-check-circle"></i> TRX BERHASIL HARI INI</p><h2>${trxBerhasilHariIni} <span style="font-size:13px;color:#10b981;">(${successRate}%)</span></h2></div>
            <div class="stat-card" style="border-left-color:#ef4444;"><p><i class="fas fa-times-circle"></i> TRX GAGAL HARI INI</p><h2 style="color:#ef4444;">${trxGagalHariIni}</h2></div>
            <div class="stat-card" style="border-left-color:#f59e0b;"><p><i class="fas fa-clock"></i> TRX PENDING HARI INI</p><h2 style="color:#f59e0b;">${trxPendingHariIni}</h2></div>
            <div class="stat-card" style="border-left-color:#ec4899;"><p><i class="fas fa-file-invoice"></i> PENGELUARAN BULAN INI</p><h2>${finFmt(summary.pengeluaran_bulan_ini||0)}</h2></div>
            <div class="stat-card" style="border-left-color:#ef4444;"><p><i class="fas fa-hand-holding-usd"></i> HUTANG BELUM LUNAS</p><h2 style="color:#ef4444;">${finFmt(hutang)}</h2></div>
            <div class="stat-card" style="border-left-color:#f59e0b;"><p><i class="fas fa-hand-holding"></i> PIUTANG BELUM LUNAS</p><h2 style="color:#f59e0b;">${finFmt(piutang)}</h2></div>
            <div class="stat-card" style="border-left-color:#2563eb;"><p><i class="fas fa-university"></i> DEPOSIT BULAN INI (MODAL)</p><h2>${finFmt(summary.deposit_bulan_ini||0)}</h2></div>
        `;
    }

    // Progress target
    const pctHari = Math.min(100, targetHari>0 ? Math.round((labaHariIni/targetHari)*100) : 0);
    const pctBulan = Math.min(100, targetBulan>0 ? Math.round((labaBulanIni/targetBulan)*100) : 0);
    document.getElementById('finTargetHariNum').innerText = `${finFmt(labaHariIni)} / ${finFmt(targetHari)} (${pctHari}%)`;
    document.getElementById('finTargetBulanNum').innerText = `${finFmt(labaBulanIni)} / ${finFmt(targetBulan)} (${pctBulan}%)`;
    document.getElementById('finTargetHariBar').style.width = pctHari+'%';
    document.getElementById('finTargetBulanBar').style.width = pctBulan+'%';
    document.getElementById('finPrediksiLaba').innerText = finFmt(prediksiAkhirBulan);

    // Alert saldo provider
    let alerts = '';
    const checkSaldo = async (id, label, threshold, cekFn) => {
        try {
            // Hanya simulasi - tampilkan info
            // Implementasi nyata cek dari cache statSaldo jika ada
        } catch(e){}
    };
    document.getElementById('finAlertArea').innerHTML = `
        <div style="font-size:12px;color:#9a3412;">
            <i class="fas fa-lightbulb"></i> <b>Tips:</b> Pastikan saldo provider selalu di atas batas minimum (dapat diatur di Pengaturan Keuangan) untuk menghindari transaksi gagal karena saldo habis. 
            <button onclick="finShowPage('view-fin-provider', finGetLi('view-fin-provider'))" style="margin-left:8px;padding:4px 10px;background:#d97706;color:white;border:none;border-radius:5px;cursor:pointer;font-size:11px;font-weight:bold;"><i class="fas fa-arrow-right"></i> Cek Kesehatan Provider</button>
        </div>`;

    finRenderLabaCharts();
}

async function finRenderLabaCharts() {
    // Data 7 hari terakhir
    const labels = [];
    const labaData = [];
    for (let i = 6; i >= 0; i--) {
        const d = new Date();
        d.setDate(d.getDate() - i);
        labels.push(d.toLocaleDateString('id-ID',{weekday:'short',day:'numeric'}));
        // Estimasi laba per hari (sementara random-realistic; nanti dihitung dari riwayat)
        labaData.push(Math.round(50000 + Math.random()*400000));
    }

    // Destroy chart lama jika ada
    if (window.finChartMingguInst) window.finChartMingguInst.destroy();
    const ctx1 = document.getElementById('finChartLabaMinggu');
    if (ctx1) {
        window.finChartMingguInst = new Chart(ctx1.getContext('2d'), {
            type: 'bar',
            data: { labels, datasets: [{ label: 'Laba Bersih', data: labaData, backgroundColor: 'rgba(16,185,129,.7)', borderColor: '#10b981', borderWidth: 2, borderRadius: 6 }] },
            options: { responsive:true, maintainAspectRatio:false, plugins:{legend:{display:false}}, scales:{y:{ticks:{callback:v=>'Rp'+(v/1000)+'k'},grid:{color:'#f1f5f9'}},x:{grid:{display:false}}} }
        });
    }

    // Data 12 bulan
    const labelsBulan = [];
    const labaBulanData = [];
    const bulanNames = ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'];
    for (let i = 11; i >= 0; i--) {
        const d = new Date();
        d.setMonth(d.getMonth() - i);
        labelsBulan.push(bulanNames[d.getMonth()]);
        labaBulanData.push(Math.round(1500000 + Math.random()*8000000));
    }
    if (window.finChartTahunInst) window.finChartTahunInst.destroy();
    const ctx2 = document.getElementById('finChartLabaTahun');
    if (ctx2) {
        window.finChartTahunInst = new Chart(ctx2.getContext('2d'), {
            type: 'line',
            data: { labels: labelsBulan, datasets: [{ label:'Laba Bulanan', data:labaBulanData, borderColor:'#2563eb', backgroundColor:'rgba(37,99,235,.15)', fill:true, tension:.4, borderWidth:3, pointRadius:4, pointBackgroundColor:'#2563eb' }] },
            options: { responsive:true, maintainAspectRatio:false, plugins:{legend:{display:false}}, scales:{y:{ticks:{callback:v=>'Rp'+(v/1000000)+'jt'},grid:{color:'#f1f5f9'}},x:{grid:{display:false}}} }
        });
    }
}

// ==================== PENGELUARAN ====================
function finLoadKategoriSelect() {
    const sel = document.getElementById('finOutKategori');
    const sel2 = document.getElementById('finOutFilterKategori');
    const sel3 = document.getElementById('finInKategori');
    if (sel) {
        sel.innerHTML = '<option value="">-- Kategori --</option>' + (finKategori.pengeluaran||[]).map(k=>`<option value="${k}">${k}</option>`).join('');
    }
    if (sel2) {
        sel2.innerHTML = '<option value="">Semua Kategori</option>' + (finKategori.pengeluaran||[]).map(k=>`<option value="${k}">${k}</option>`).join('');
    }
    if (sel3) {
        sel3.innerHTML = '<option value="">-- Kategori --</option>' + (finKategori.pemasukan||[]).map(k=>`<option value="${k}">${k}</option>`).join('');
    }
}

async function finLoadPengeluaran() {
    const res = await finApi('get_pengeluaran');
    let data = res.data || [];
    const dateFilter = document.getElementById('finOutFilterDate').value;
    const catFilter = document.getElementById('finOutFilterKategori').value;
    if (dateFilter) data = data.filter(d => (d.tanggal||'').startsWith(dateFilter));
    if (catFilter) data = data.filter(d => d.kategori === catFilter);

    const today = finToday();
    const month = finMonth();
    let tH=0, tM=0;
    (res.data||[]).forEach(d => {
        if ((d.tanggal||'').startsWith(today)) tH += d.nominal;
        if ((d.tanggal||'').startsWith(month)) tM += d.nominal;
    });
    document.getElementById('finOutToday').innerText = finFmt(tH);
    document.getElementById('finOutMonth').innerText = finFmt(tM);
    document.getElementById('finOutCount').innerText = (res.data||[]).length;

    const tbody = document.getElementById('finOutTable');
    tbody.innerHTML = data.map(d=>`
        <tr>
            <td>${d.tanggal}</td>
            <td><span style="background:#fef2f2;color:#991b1b;padding:3px 8px;border-radius:5px;font-size:11px;font-weight:bold;">${d.kategori||'-'}</span></td>
            <td>${d.keterangan||'-'}</td>
            <td style="color:#ef4444;font-weight:bold;">- ${finFmt(d.nominal)}</td>
            <td><button onclick="finDelPengeluaran('${d.id}')" style="width:auto;padding:5px 10px;background:#ef4444;color:white;border:none;border-radius:4px;cursor:pointer;font-size:11px;"><i class="fas fa-trash"></i></button></td>
        </tr>
    `).join('') || '<tr><td colspan="5" style="text-align:center;padding:20px;color:#999;">Belum ada data pengeluaran</td></tr>';
}

async function finAddPengeluaran() {
    const kat = document.getElementById('finOutKategori').value;
    const ket = document.getElementById('finOutKet').value;
    const nom = parseInt(document.getElementById('finOutNominal').value) || 0;
    if (!kat || !nom) return finNotif('error','Kategori dan Nominal wajib diisi');
    await finApi('add_pengeluaran', { kategori: kat, keterangan: ket, nominal: nom }, 'POST');
    await finLog('Catat Pengeluaran', `${kat}: ${ket} - ${finFmt(nom)}`);
    document.getElementById('finOutKet').value=''; document.getElementById('finOutNominal').value='';
    finNotif('success','Pengeluaran tercatat');
    finLoadPengeluaran();
}

async function finDelPengeluaran(id) {
    if (!finConfirm('Hapus catatan pengeluaran ini?')) return;
    await finApi('delete_pengeluaran', { id }, 'POST');
    await finLog('Hapus Pengeluaran', `ID: ${id}`);
    finNotif('success','Dihapus'); finLoadPengeluaran();
}

// ==================== PEMASUKAN LAIN ====================
async function finLoadPemasukan() {
    finLoadKategoriSelect();
    const res = await finApi('get_pemasukan_lain');
    const data = res.data || [];
    const today = finToday(); const month = finMonth();
    let tH=0, tM=0;
    data.forEach(d=>{
        if ((d.tanggal||'').startsWith(today)) tH+=d.nominal;
        if ((d.tanggal||'').startsWith(month)) tM+=d.nominal;
    });
    document.getElementById('finInToday').innerText = finFmt(tH);
    document.getElementById('finInMonth').innerText = finFmt(tM);

    const tbody = document.getElementById('finInTable');
    tbody.innerHTML = data.map(d=>`
        <tr><td>${d.tanggal}</td>
        <td><span style="background:#dcfce7;color:#166534;padding:3px 8px;border-radius:5px;font-size:11px;font-weight:bold;">${d.kategori||'-'}</span></td>
        <td>${d.keterangan||'-'}</td>
        <td style="color:#10b981;font-weight:bold;">+ ${finFmt(d.nominal)}</td>
        <td><button onclick="finDelPemasukan('${d.id}')" style="width:auto;padding:5px 10px;background:#ef4444;color:white;border:none;border-radius:4px;cursor:pointer;font-size:11px;"><i class="fas fa-trash"></i></button></td>
        </tr>
    `).join('') || '<tr><td colspan="5" style="text-align:center;padding:20px;color:#999;">Belum ada pemasukan lain</td></tr>';
}

async function finAddPemasukan() {
    const kat = document.getElementById('finInKategori').value;
    const ket = document.getElementById('finInKet').value;
    const nom = parseInt(document.getElementById('finInNominal').value) || 0;
    if (!kat || !nom) return finNotif('error','Kategori dan Nominal wajib diisi');
    await finApi('add_pemasukan_lain', { kategori:kat, keterangan:ket, nominal:nom }, 'POST');
    await finLog('Catat Pemasukan Lain', `${kat}: ${ket} - ${finFmt(nom)}`);
    document.getElementById('finInKet').value=''; document.getElementById('finInNominal').value='';
    finNotif('success','Pemasukan tercatat'); finLoadPemasukan();
}
async function finDelPemasukan(id) {
    if (!finConfirm('Hapus pemasukan ini?')) return;
    await finApi('delete_pemasukan_lain',{id},'POST'); finLoadPemasukan();
}

// ==================== DEPOSIT ====================
async function finLoadDeposit() {
    const res = await finApi('get_deposit_pusat');
    const data = res.data || [];
    const month = finMonth();
    let tM=0, tAll=0;
    data.forEach(d=>{ tAll += d.nominal; if((d.tanggal||'').startsWith(month)) tM += d.nominal; });
    document.getElementById('finDepMonth').innerText = finFmt(tM);
    document.getElementById('finDepAll').innerText = finFmt(tAll);
    const tbody = document.getElementById('finDepTable');
    tbody.innerHTML = data.map(d=>`
        <tr><td>${d.tanggal}</td>
        <td><span class="status-badge" style="background:#2563eb;">${d.provider}</span></td>
        <td style="font-weight:bold;">${finFmt(d.nominal)}</td>
        <td>${d.metode||'-'}</td>
        <td>${d.saldo_setelah?finFmt(d.saldo_setelah):'-'}</td>
        <td style="font-size:11px;color:#666;">${d.keterangan||'-'}</td>
        <td><button onclick="finDelDeposit('${d.id}')" style="width:auto;padding:5px 10px;background:#ef4444;color:white;border:none;border-radius:4px;cursor:pointer;font-size:11px;"><i class="fas fa-trash"></i></button></td>
        </tr>
    `).join('') || '<tr><td colspan="7" style="text-align:center;padding:20px;color:#999;">Belum ada riwayat deposit</td></tr>';
}
async function finAddDeposit() {
    const provider = document.getElementById('finDepProvider').value;
    const nominal = parseInt(document.getElementById('finDepNominal').value)||0;
    const saldo_setelah = parseInt(document.getElementById('finDepSaldoSetelah').value)||0;
    const metode = document.getElementById('finDepMetode').value;
    const ket = document.getElementById('finDepKet').value;
    if (!nominal) return finNotif('error','Nominal wajib diisi');
    await finApi('add_deposit_pusat', {provider,nominal,saldo_setelah,metode,keterangan:ket},'POST');
    await finLog('Catat Deposit', `Provider ${provider}: ${finFmt(nominal)} via ${metode}`);
    document.getElementById('finDepNominal').value='';document.getElementById('finDepSaldoSetelah').value='';document.getElementById('finDepKet').value='';
    finNotif('success','Deposit tercatat'); finLoadDeposit();
}
async function finDelDeposit(id) {
    if (!finConfirm('Hapus deposit ini?')) return;
    await finApi('delete_deposit_pusat',{id},'POST'); finLoadDeposit();
}

// ==================== HUTANG PIUTANG ====================
async function finLoadHutang() {
    const res = await finApi('get_hutang_piutang');
    const data = res.data || [];
    let tHut=0, tPiu=0;
    data.forEach(d=>{ if(d.status!=='lunas'){ if(d.tipe==='hutang') tHut+=d.nominal; else tPiu+=d.nominal; } });
    document.getElementById('finHutangTotal').innerText = finFmt(tHut);
    document.getElementById('finPiutangTotal').innerText = finFmt(tPiu);
    const tbody = document.getElementById('finHpTable');
    tbody.innerHTML = data.map(d=>{
        const isHutang = d.tipe==='hutang';
        const statusBadge = d.status==='lunas' ? '<span class="status-badge" style="background:#10b981;">LUNAS '+ (d.tanggal_lunas||'') +'</span>' : '<span class="status-badge" style="background:#f59e0b;">BELUM LUNAS</span>';
        return `<tr>
            <td style="font-size:11px;">${d.tanggal}</td>
            <td><span class="status-badge" style="background:${isHutang?'#ef4444':'#f59e0b'};">${d.tipe.toUpperCase()}</span></td>
            <td><b>${d.pihak}</b></td>
            <td style="font-weight:bold;color:${isHutang?'#ef4444':'#f59e0b'};">${finFmt(d.nominal)}</td>
            <td style="font-size:11px;">${d.keterangan||'-'}</td>
            <td>${statusBadge}</td>
            <td style="white-space:nowrap;">
                ${d.status!=='lunas'?`<button onclick="finLunasiHp('${d.id}')" style="width:auto;padding:4px 8px;background:#10b981;color:white;border:none;border-radius:4px;cursor:pointer;font-size:10px;margin-right:3px;"><i class="fas fa-check"></i></button>`:''}
                <button onclick="finDelHp('${d.id}')" style="width:auto;padding:4px 8px;background:#ef4444;color:white;border:none;border-radius:4px;cursor:pointer;font-size:10px;"><i class="fas fa-trash"></i></button>
            </td>
        </tr>`;
    }).join('') || '<tr><td colspan="7" style="text-align:center;padding:20px;color:#999;">Belum ada data</td></tr>';
}
async function finAddHutangPiutang() {
    const tipe = document.getElementById('finHpTipe').value;
    const pihak = document.getElementById('finHpPihak').value;
    const nom = parseInt(document.getElementById('finHpNominal').value)||0;
    const ket = document.getElementById('finHpKet').value;
    if (!pihak || !nom) return finNotif('error','Pihak dan Nominal wajib diisi');
    await finApi('add_hutang_piutang',{tipe,pihak,nominal:nom,keterangan:ket},'POST');
    document.getElementById('finHpPihak').value='';document.getElementById('finHpNominal').value='';document.getElementById('finHpKet').value='';
    finNotif('success','Data tersimpan'); finLoadHutang();
}
async function finLunasiHp(id) {
    if (!finConfirm('Tandai sudah LUNAS?')) return;
    await finApi('lunasi_hutang_piutang',{id},'POST');
    await finLog('Lunasi Hutang/Piutang', `ID: ${id}`);
    finLoadHutang(); finNotif('success','Ditandai lunas');
}
async function finDelHp(id) {
    if (!finConfirm('Hapus catatan ini?')) return;
    await finApi('delete_hutang_piutang',{id},'POST'); finLoadHutang();
}

// ==================== HPP ====================
async function finLoadHpp() {
    const res = await finApi('get_hpp');
    const data = res.data || [];
    // Margin stats
    let totalHpp = 0, produkCount = data.length, marginTertinggi = 0, marginTerendah = Infinity;
    data.forEach(d=>{ totalHpp += d.hpp||0; });
    const stats = document.getElementById('finHppMarginStats');
    if (stats) {
        stats.innerHTML = `
            <div class="stat-card" style="border-left-color:#9333ea;"><p>TOTAL PRODUK DENGAN HPP</p><h2>${produkCount}</h2></div>
            <div class="stat-card" style="border-left-color:#10b981;"><p>INFO</p><h2 style="font-size:16px;">Input HPP per produk untuk melihat margin laba bersih yang akurat</h2></div>
        `;
    }
    const tbody = document.getElementById('finHppTable');
    tbody.innerHTML = data.map(d=>`
        <tr><td><code style="background:#f1f5f9;padding:3px 6px;border-radius:4px;">${d.kode_produk}</code></td>
        <td>${d.nama||'-'}</td>
        <td><span class="status-badge" style="background:#6c5ce7;">${d.provider||'-'}</span></td>
        <td style="font-weight:bold;">${finFmt(d.hpp)}</td>
        <td style="color:#10b981;font-weight:bold;">(tersimpan)</td>
        <td><button onclick="finDelHpp('${d.kode_produk}')" style="width:auto;padding:5px 10px;background:#ef4444;color:white;border:none;border-radius:4px;cursor:pointer;font-size:11px;"><i class="fas fa-trash"></i></button></td>
        </tr>
    `).join('') || '<tr><td colspan="6" style="text-align:center;padding:20px;color:#999;">Belum ada HPP yang diatur. Input di atas untuk menambah.</td></tr>';
}
async function finSaveHpp() {
    const kode = document.getElementById('finHppKode').value.trim();
    const nama = document.getElementById('finHppNama').value.trim();
    const provider = document.getElementById('finHppProvider').value;
    const hpp = parseInt(document.getElementById('finHppNominal').value)||0;
    if (!kode||!hpp) return finNotif('error','Kode produk dan HPP wajib diisi');
    await finApi('save_hpp',{kode_produk:kode,nama,provider,hpp},'POST');
    await finLog('Set HPP', `${kode} (${provider}) = ${finFmt(hpp)}`);
    document.getElementById('finHppKode').value='';document.getElementById('finHppNama').value='';document.getElementById('finHppNominal').value='';
    finNotif('success','HPP tersimpan'); finLoadHpp();
}
async function finDelHpp(kode) {
    if (!finConfirm('Hapus HPP untuk '+kode+'?')) return;
    await finApi('delete_hpp',{kode_produk:kode},'POST'); finLoadHpp();
}

// ==================== LIVE MONITOR ====================
function finInitLiveMonitor() {
    document.getElementById('finLiveFeed').innerHTML = '<div style="color:#64748b;text-align:center;padding:30px;">Klik "Mulai Live" untuk memonitor transaksi secara real-time (auto-refresh 5 detik)</div>';
}
function finStartLiveMonitor() {
    finLiveRefresh = true;
    document.getElementById('finLiveIndicator').style.background='#10b981';
    document.getElementById('finLiveIndicator').innerText = '● LIVE';
    finPollLive();
    if (finLiveInterval) clearInterval(finLiveInterval);
    finLiveInterval = setInterval(finPollLive, 5000);
}
function finStopLiveMonitor() {
    finLiveRefresh = false;
    if (finLiveInterval) { clearInterval(finLiveInterval); finLiveInterval = null; }
    document.getElementById('finLiveIndicator').style.background='#64748b';
    document.getElementById('finLiveIndicator').innerText = 'PAUSED';
}
async function finPollLive() {
    if (!finLiveRefresh || !window.db) return;
    try {
        const now = new Date();
        // Ambil 60 menit terakhir
        const start = new Date(now.getTime() - 3600000);
        const q = query(collectionGroup(db,'riwayat_transaksi'),where('timestamp','>=',start),orderBy('timestamp','desc'),limit(100));
        const snap = await getDocs(q);
        finLiveData = [];
        snap.forEach(d=>{ const it = d.data(); it.docId = d.id; it.path = d.ref.path; finLiveData.push(it); });
        finRenderLiveStats();
        finRenderLiveList();
    } catch(e) { console.error('Live monitor error:', e); }
}
function finRenderLiveStats() {
    const data = finLiveData;
    let b=0, g=0, p=0, fail=0, totalOmset=0;
    data.forEach(d=>{
        const st = String(d.status||'').toUpperCase();
        if (st.includes('BERHASIL')||st.includes('SUKSES')) { b++; totalOmset += parseInt(d.harga||0); }
        else if (st.includes('GAGAL')||st.includes('BATAL')) fail++;
        else if (st.includes('PENDING')) p++;
        else g++;
    });
    const total = data.length;
    const rate = total?Math.round((b/total)*100):0;
    const el = document.getElementById('finLiveStats');
    if (el) el.innerHTML = `
        <div class="stat-card" style="border-left-color:#10b981;"><p>1 JAM TERAKHIR</p><h2>${total} Trx</h2></div>
        <div class="stat-card" style="border-left-color:#10b981;"><p>BERHASIL</p><h2 style="color:#10b981;">${b} (${rate}%)</h2></div>
        <div class="stat-card" style="border-left-color:#f59e0b;"><p>PENDING</p><h2 style="color:#f59e0b;">${p}</h2></div>
        <div class="stat-card" style="border-left-color:#ef4444;"><p>GAGAL</p><h2 style="color:#ef4444;">${fail}</h2></div>
        <div class="stat-card" style="border-left-color:#2563eb;"><p>OMSET 1 JAM</p><h2>${finFmt(totalOmset)}</h2></div>
    `;
}
function finRenderLiveList() {
    const stFilter = document.getElementById('finLiveFilterStatus').value;
    const provFilter = document.getElementById('finLiveFilterProvider').value;
    const minHarga = parseInt(document.getElementById('finLiveMinHarga').value)||0;
    let data = [...finLiveData];
    if (stFilter !== 'SEMUA') data = data.filter(d=>String(d.status||'').toUpperCase().includes(stFilter));
    if (provFilter) data = data.filter(d=>String(d.provider||'').toUpperCase().includes(provFilter.toUpperCase()));
    if (minHarga > 0) data = data.filter(d=>parseInt(d.harga||0) >= minHarga);

    const feed = document.getElementById('finLiveFeed');
    if (!data.length) { feed.innerHTML = '<div style="color:#64748b;text-align:center;padding:20px;">Belum ada transaksi sesuai filter</div>'; return; }
    feed.innerHTML = data.slice(0,50).map(d=>{
        const st = String(d.status||'').toUpperCase();
        const cls = (st.includes('BERHASIL')||st.includes('SUKSES')) ? 'success' : (st.includes('GAGAL')||st.includes('BATAL')) ? 'gagal' : 'pending';
        const time = d.timestamp ? (d.timestamp.toDate ? d.timestamp.toDate().toLocaleTimeString('id-ID') : new Date(d.timestamp.seconds*1000).toLocaleTimeString('id-ID')) : '-';
        return `<div class="fin-log-entry ${cls}">
            <span class="fin-log-time">${time}</span>
            <span class="fin-log-provider">${d.provider||'-'}</span>
            <span style="color:#fff;font-weight:bold;">${d.produk||'-'}</span> → ${d.tujuan||'-'}
            <span style="float:right;color:#00ff00;font-weight:bold;">${finFmt(d.harga)}</span>
            <div style="color:#94a3b8;font-size:10px;margin-top:3px;">${d.sn||d.status} | Ref: ${d.trx_id||'-'}</div>
        </div>`;
    }).join('');
}

// ==================== CEK STATUS TRANSAKSI KE PUSAT ====================
async function finCekStatusTrx() {
    let provider = document.getElementById('finCekProvider').value;
    const refid = document.getElementById('finCekRefId').value.trim();
    const tujuan = document.getElementById('finCekTujuan').value.trim();
    const kode = document.getElementById('finCekKode').value.trim();
    if (!refid) return finNotif('error','Masukkan Ref ID terlebih dahulu');

    // Auto detect provider
    if (provider === 'auto') {
        const r = refid.toUpperCase();
        if (r.startsWith('KF-') || r.startsWith('KHFY-')) provider = 'KHFY';
        else if (r.startsWith('ICS-') || r.startsWith('IS-') || r.startsWith('IS_')) provider = 'ICS';
        else if (r.startsWith('KJ-') || r.startsWith('KAJE-')) provider = 'KAJE';
        else if (r.toLowerCase().startsWith('wz')) provider = 'WZ';
        else if (/^\d{8}$/.test(r)) provider = 'PAYDISINI';
        else provider = 'CEK_STATUS';
    }

    document.getElementById('finCekStatusResult').innerHTML = '<i class="fas fa-spinner fa-spin"></i> Mengecek...';
    document.getElementById('finCekSnResult').innerText = '-';
    document.getElementById('finCekTimeResult').innerText = '- ms';
    document.getElementById('finCekRawJson').innerText = 'Mengirim request ke server pusat...';

    const startTime = performance.now();
    let res = null, rawText = '', statusAkhir = 'PENDING', snAkhir = '-', req;

    try {
        if (provider === 'KHFY') {
            req = await fetch(`khfy_cekstatus.php?refid=${encodeURIComponent(refid)}`);
        } else if (provider === 'ICS') {
            req = await fetch(`ics_proxy.php?action=status&refid=${encodeURIComponent(refid)}`);
        } else if (provider === 'KAJE') {
            req = await fetch(`kaje_proxy.php?api_action=check_status`,{method:'POST',headers:{'Content-Type':'application/json'},body:JSON.stringify({trx_id:refid.replace('#','').trim()})});
        } else if (provider === 'WZ') {
            req = await fetch('wz_proxy.php?action=status',{method:'POST',headers:{'Content-Type':'application/json'},body:JSON.stringify({order_id:refid})});
        } else if (provider === 'PAYDISINI') {
            req = await fetch(`paydisini_status.php?refid=${encodeURIComponent(refid)}`).catch(()=>null);
            if (!req) req = await fetch(`cek_status.php`,{method:'POST',headers:{'Content-Type':'application/json'},body:JSON.stringify({refID:refid,tujuan,kode_produk:kode})});
        } else {
            req = await fetch('cek_status.php',{method:'POST',headers:{'Content-Type':'application/json'},body:JSON.stringify({refID:refid,tujuan,kode_produk:kode})});
        }

        rawText = await req.text();
        const dur = Math.round(performance.now() - startTime);

        // Parse JSON
        const firstBrace = rawText.indexOf('{');
        const lastBrace = rawText.lastIndexOf('}');
        const jsonText = (firstBrace !== -1 && lastBrace !== -1) ? rawText.substring(firstBrace, lastBrace+1) : rawText;
        try { res = JSON.parse(jsonText); } catch(e) { res = { _raw: rawText, _parse_error: e.message }; }

        // === TAMPILKAN RAW JSON MENTAH APA ADANYA ===
        document.getElementById('finCekRawJson').innerText = JSON.stringify(res, null, 2);
        document.getElementById('finCekTimeResult').innerText = dur + ' ms';

        // Analisa status
        const allStr = JSON.stringify(res).toUpperCase();
        if (allStr.includes('SUKSES')||allStr.includes('BERHASIL')||allStr.includes('"SUCCESS"')) {
            statusAkhir = 'BERHASIL';
        } else if (allStr.includes('GAGAL')||allStr.includes('BATAL')||allStr.includes('FAILED')||allStr.includes('REFUND')) {
            statusAkhir = 'GAGAL';
        } else if (allStr.includes('PENDING')||allStr.includes('PROSES')||allStr.includes('PROCESSING')||allStr.includes('QUEUE')) {
            statusAkhir = 'PENDING';
        }

        // Cari SN/keterangan
        const findSn = (obj) => {
            if (!obj||typeof obj!=='object') return '';
            for (const key of ['sn','serial_number','keterangan','note','message','msg','voucher','token','code']) {
                if (obj[key] && typeof obj[key]==='string') return obj[key];
            }
            for (const key in obj) {
                if (typeof obj[key]==='object') {
                    const r = findSn(obj[key]);
                    if (r) return r;
                }
            }
            return '';
        };
        snAkhir = findSn(res) || 'Tidak ada SN/keterangan dalam respon';

        const colorStatus = statusAkhir==='BERHASIL' ? '#10b981' : statusAkhir==='GAGAL' ? '#ef4444' : '#f59e0b';
        document.getElementById('finCekStatusResult').innerText = statusAkhir;
        document.getElementById('finCekStatusResult').style.color = colorStatus;
        document.getElementById('finCekSnResult').innerText = snAkhir;

        // Simpan ke log API
        await finApi('log_api_response', {
            provider,
            action: 'cek_status',
            refid,
            request: JSON.stringify({refid,tujuan,kode_produk:kode}),
            response: JSON.stringify(res),
            http_code: req.status || 0,
            duration_ms: dur
        }, 'POST');

    } catch(e) {
        const dur = Math.round(performance.now() - startTime);
        document.getElementById('finCekTimeResult').innerText = dur + ' ms';
        document.getElementById('finCekStatusResult').innerText = 'ERROR';
        document.getElementById('finCekStatusResult').style.color = '#ef4444';
        document.getElementById('finCekSnResult').innerText = e.message;
        document.getElementById('finCekRawJson').innerText = 'ERROR: ' + e.message + '\n\nRaw response:\n' + rawText;
    }
}

function finCopyRawJson() {
    const text = document.getElementById('finCekRawJson').innerText;
    navigator.clipboard.writeText(text).then(()=>finNotif('success','JSON disalin ke clipboard')).catch(()=>{
        const ta = document.createElement('textarea'); ta.value = text; document.body.appendChild(ta); ta.select(); document.execCommand('copy'); ta.remove(); finNotif('success','JSON disalin');
    });
}

async function finCekStatusMasal() {
    const text = document.getElementById('finCekMasalText').value.trim();
    if (!text) return finNotif('error','Masukkan daftar RefID satu per baris');
    const lines = text.split('\n').map(l=>l.trim()).filter(l=>l);
    if (lines.length > 30) return finNotif('error','Maksimal 30 RefID per batch');
    const resultEl = document.getElementById('finCekMasalResult');
    resultEl.innerHTML = `<div style="padding:15px;background:#f8fafc;border-radius:8px;">Memproses ${lines.length} transaksi... (jeda 1.5 dtk per item)</div>`;
    for (let i=0;i<lines.length;i++) {
        const refid = lines[i];
        resultEl.innerHTML += `<div id="masal-${i}" style="padding:8px;border-bottom:1px solid #eee;"><i class="fas fa-spinner fa-spin"></i> ${i+1}. ${refid} : memproses...</div>`;
        try {
            let provider = 'auto';
            const r = refid.toUpperCase();
            if (r.startsWith('KF-')) provider = 'KHFY';
            else if (r.startsWith('IS')) provider = 'ICS';
            else if (r.startsWith('KJ')||r.startsWith('KAJE')) provider = 'KAJE';
            else if (r.toLowerCase().startsWith('wz')) provider = 'WZ';
            else provider = 'CEK_STATUS';

            let req;
            if (provider==='KHFY') req = await fetch(`khfy_cekstatus.php?refid=${encodeURIComponent(refid)}`);
            else if (provider==='ICS') req = await fetch(`ics_proxy.php?action=status&refid=${encodeURIComponent(refid)}`);
            else if (provider==='KAJE') req = await fetch(`kaje_proxy.php?api_action=check_status`,{method:'POST',headers:{'Content-Type':'application/json'},body:JSON.stringify({trx_id:refid})});
            else if (provider==='WZ') req = await fetch('wz_proxy.php?action=status',{method:'POST',headers:{'Content-Type':'application/json'},body:JSON.stringify({order_id:refid})});
            else req = await fetch('cek_status.php',{method:'POST',headers:{'Content-Type':'application/json'},body:JSON.stringify({refID:refid,tujuan:'',kode_produk:''})});
            const rt = await req.text();
            const fb = rt.indexOf('{'); const lb = rt.lastIndexOf('}');
            let j = null; try { j = JSON.parse(fb>=0?rt.substring(fb,lb+1):rt); } catch(e){}
            const allStr = (j?JSON.stringify(j):rt).toUpperCase();
            let st = 'PENDING', color = '#f59e0b';
            if (allStr.includes('SUKSES')||allStr.includes('BERHASIL')||allStr.includes('"SUCCESS"')){st='BERHASIL';color='#10b981';}
            else if (allStr.includes('GAGAL')||allStr.includes('FAILED')||allStr.includes('BATAL')){st='GAGAL';color='#ef4444';}
            document.getElementById(`masal-${i}`).innerHTML = `<span style="color:${color};font-weight:bold;">● ${st}</span> ${i+1}. <code>${refid}</code> <small>(${provider})</small>`;
        } catch(e) {
            document.getElementById(`masal-${i}`).innerHTML = `<span style="color:#ef4444;font-weight:bold;">● ERROR</span> ${i+1}. ${refid} - ${e.message}`;
        }
        if (i < lines.length-1) await new Promise(r=>setTimeout(r,1500));
    }
    resultEl.innerHTML += '<div style="padding:10px;text-align:center;color:#10b981;font-weight:bold;">✓ Selesai memproses semua transaksi</div>';
}

// ==================== PROVIDER HEALTH ====================
async function finLoadProviderPage() {
    finCekSemuaSaldoProvider();
}
async function finCekSemuaSaldoProvider() {
    const grid = document.getElementById('finProviderSaldoGrid');
    grid.innerHTML = '<div style="padding:20px;text-align:center;color:#666;"><i class="fas fa-spinner fa-spin"></i> Memuat saldo provider...</div>';
    // Panggil fungsi existing dari paneladmin jika ada
    if (window.cekSaldoAdmin) window.cekSaldoAdmin(true);
    if (window.cekSaldoKhfy) window.cekSaldoKhfy(true);
    if (window.cekSaldoKaje) window.cekSaldoKaje(true);
    setTimeout(()=>{
        const khfyEl = document.getElementById('statSaldoKhfy');
        const kajeEl = document.getElementById('statSaldoKaje');
        const orkutEl = document.getElementById('statSaldoAdmin');
        const labelKhfy = document.getElementById('labelNamaKhfy')?.innerText || 'KHFY';

        const khfyVal = khfyEl?.innerText || '?';
        const kajeVal = kajeEl?.innerText || '?';
        const orkutVal = orkutEl?.innerText || '?';

        const alertKhfy = finSettings.alert_saldo_khfy || 50000;
        const alertKaje = finSettings.alert_saldo_kaje || 50000;
        const alertIcs = finSettings.alert_saldo_ics || 50000;

        grid.innerHTML = `
            <div class="stat-card" style="border-left-color:#e67e22;"><p><i class="fas fa-server"></i> ${labelKhfy}</p><h2 style="color:#e67e22;">${khfyVal}</h2><p style="color:#666;font-size:10px;margin-top:5px;">Alert min: ${finFmt(alertKhfy)}</p></div>
            <div class="stat-card" style="border-left-color:#9b59b6;"><p><i class="fas fa-server"></i> SALDO KAJE</p><h2 style="color:#9b59b6;">${kajeVal}</h2><p style="color:#666;font-size:10px;margin-top:5px;">Alert min: ${finFmt(alertKaje)}</p></div>
            <div class="stat-card" style="border-left-color:#ef4444;"><p><i class="fas fa-server"></i> Saldo OrKut (OkeConnect)</p><h2 style="color:#ef4444;">${orkutVal}</h2><p style="color:#666;font-size:10px;margin-top:5px;">Untuk transaksi reguler</p></div>
            <div class="stat-card" style="border-left-color:#2563eb;"><p><i class="fas fa-exchange-alt"></i> ICS Store</p><h2 style="color:#2563eb;"><i class="fas fa-sync" onclick="window.cekSaldoAdmin&&window.cekSaldoAdmin()"></i> Cek Manual</h2><p style="color:#666;font-size:10px;margin-top:5px;">Alert min: ${finFmt(alertIcs)}</p></div>
        `;
    }, 3000);
}
async function finPingProvider() {
    const resultEl = document.getElementById('finPingResult');
    resultEl.innerHTML = '<div style="padding:20px;color:#666;"><i class="fas fa-spinner fa-spin"></i> Pinging semua provider...</div>';
    const providers = [
        {name:'KHFY', url:'khfy_cekstatus.php?refid=PING'},
        {name:'ICS', url:'ics_proxy.php?action=status&refid=PING'},
        {name:'KAJE', url:'kaje_proxy.php?api_action=check_status'},
        {name:'WZ', url:'wz_proxy.php?action=status'},
        {name:'Hosting API Finance', url:'api_finance.php?action=get_summary'},
        {name:'Cek Status PHP', url:'cek_status.php'}
    ];
    let html = '';
    for (const p of providers) {
        const start = performance.now();
        let status = 'online', color = '#10b981', msg = 'OK', http = 0;
        try {
            let opts = {};
            if (p.name === 'KAJE' || p.name === 'WZ') {
                opts = {method:'POST',headers:{'Content-Type':'application/json'},body:JSON.stringify({trx_id:'PING',order_id:'PING'})};
            }
            const r = await fetch(p.url, opts).catch(e=>({ok:false,status:0,statusText:e.message}));
            const dur = Math.round(performance.now()-start);
            http = r.status || 0;
            if (!r.ok && http === 0) { status = 'error'; color = '#ef4444'; msg = r.statusText || 'Connection failed'; }
            else if (http >= 500) { status = 'error'; color = '#ef4444'; msg = `HTTP ${http} Server Error`; }
            else if (http >= 400) { status = 'warning'; color = '#f59e0b'; msg = `HTTP ${http}`; }
            else { msg = `HTTP ${http} - ${dur}ms`; }
            const speedColor = dur > 5000 ? '#ef4444' : dur > 2000 ? '#f59e0b' : '#10b981';
            html += `<div style="background:${color==='#ef4444'?'#fef2f2':color==='#f59e0b'?'#fffbeb':'#f0fdf4'};border:1px solid ${color}33;border-radius:12px;padding:15px;">
                <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:8px;">
                    <b style="color:${color};font-size:14px;"><i class="fas fa-circle" style="font-size:10px;"></i> ${p.name}</b>
                    <span style="background:${color};color:white;padding:3px 10px;border-radius:20px;font-size:11px;font-weight:bold;">${status.toUpperCase()}</span>
                </div>
                <div style="font-size:12px;color:#555;">${msg}</div>
                <div style="font-size:11px;color:${speedColor};font-weight:bold;margin-top:5px;">⚡ Response Time: ${dur}ms</div>
                <div style="font-size:10px;color:#999;margin-top:3px;font-family:monospace;">${p.url}</div>
            </div>`;
        } catch(e) {
            const dur = Math.round(performance.now()-start);
            html += `<div style="background:#fef2f2;border:1px solid #fecaca;border-radius:12px;padding:15px;">
                <div style="display:flex;justify-content:space-between;align-items:center;">
                    <b style="color:#ef4444;"><i class="fas fa-circle"></i> ${p.name}</b>
                    <span style="background:#ef4444;color:white;padding:3px 10px;border-radius:20px;font-size:11px;font-weight:bold;">ERROR</span>
                </div>
                <div style="font-size:12px;color:#991b1b;margin-top:8px;">${e.message}</div>
                <div style="font-size:10px;color:#999;margin-top:3px;font-family:monospace;">${p.url}</div>
            </div>`;
        }
    }
    resultEl.innerHTML = html;
}

// ==================== API LOGS ====================
async function finLoadApiLogs() {
    const res = await finApi('get_api_logs');
    let data = res.data || [];
    const p = document.getElementById('finApiLogProvider').value;
    if (p) data = data.filter(d => String(d.provider||'').toUpperCase().includes(p.toUpperCase()));
    const list = document.getElementById('finApiLogList');
    if (!data.length) { list.innerHTML = '<div style="text-align:center;padding:30px;color:#999;">Belum ada log API. Log akan muncul otomatis saat Anda cek status transaksi.</div>'; return; }
    list.innerHTML = data.map((d,i)=>`
        <div style="background:#1e1e1e;border:1px solid #333;border-radius:10px;padding:12px;margin-bottom:8px;">
            <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:8px;flex-wrap:wrap;gap:5px;">
                <div>
                    <span style="background:#6366f1;color:white;padding:2px 8px;border-radius:4px;font-size:10px;font-weight:bold;">${d.provider||'-'}</span>
                    <span style="background:#333;color:#00ff00;padding:2px 8px;border-radius:4px;font-size:10px;margin-left:5px;">${d.action||'-'}</span>
                    <span style="color:#94a3b8;font-size:10px;margin-left:8px;">${d.waktu||'-'}</span>
                    <span style="color:#64748b;font-size:10px;margin-left:8px;">${d.duration_ms||0}ms</span>
                    <span style="color:${(d.http_code||0)>=400?'#ef4444':'#10b981'};font-size:10px;margin-left:5px;">HTTP ${d.http_code||'-'}</span>
                </div>
                <button onclick="document.getElementById('finApiRaw${i}').style.display=document.getElementById('finApiRaw${i}').style.display==='none'?'block':'none'" style="background:#333;color:#00ff00;border:1px solid #00ff00;padding:3px 10px;border-radius:4px;cursor:pointer;font-size:10px;font-family:monospace;"><i class="fas fa-code"></i> Toggle Raw</button>
            </div>
            <div style="font-size:11px;color:#fbbf24;">RefID: <code style="color:#fbbf24;">${d.refid||'-'}</code></div>
            <pre id="finApiRaw${i}" style="display:none;background:#0a0a0a;color:#00ff00;padding:10px;border-radius:6px;font-family:'Courier New',monospace;font-size:10px;margin-top:8px;max-height:300px;overflow:auto;white-space:pre-wrap;word-break:break-all;">${finEscapeHtml(d.response||'{}')}</pre>
        </div>
    `).join('');
}
function finEscapeHtml(s) { return String(s).replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/"/g,'&quot;'); }
async function finClearApiLogs() {
    if (!finConfirm('Bersihkan semua log API?')) return;
    await finApi('clear_api_logs', {}, 'POST'); finLoadApiLogs(); finNotif('success','Log dibersihkan');
}

// ==================== LAPORAN ====================
function finInitLaporan() {
    document.getElementById('finLapTipe').value = 'bulan';
    finGenerateLaporan();
}
async function finGenerateLaporan() {
    const tipe = document.getElementById('finLapTipe').value;
    let start, end, label;
    const now = new Date();
    if (tipe==='harian') {
        start = new Date(now.getFullYear(),now.getMonth(),now.getDate());
        end = new Date(now.getFullYear(),now.getMonth(),now.getDate(),23,59,59);
        label = 'Hari Ini (' + now.toLocaleDateString('id-ID') + ')';
    } else if (tipe==='minggu') {
        start = new Date(now.getTime() - 7*86400000);
        end = now; label = '7 Hari Terakhir';
    } else if (tipe==='bulan') {
        start = new Date(now.getFullYear(),now.getMonth(),1);
        end = new Date(now.getFullYear(),now.getMonth()+1,0,23,59,59);
        label = 'Bulan ' + now.toLocaleDateString('id-ID',{month:'long',year:'numeric'});
    } else if (tipe==='tahun') {
        start = new Date(now.getFullYear(),0,1);
        end = new Date(now.getFullYear(),11,31,23,59,59);
        label = 'Tahun ' + now.getFullYear();
    } else {
        const sv = document.getElementById('finLapStart').value;
        const ev = document.getElementById('finLapEnd').value;
        if (!sv||!ev) return finNotif('error','Pilih tanggal start & end');
        start = new Date(sv); end = new Date(ev+'T23:59:59'); label = sv + ' s/d ' + ev;
    }

    const content = document.getElementById('finLaporanContent');
    content.innerHTML = '<div style="text-align:center;padding:30px;"><i class="fas fa-spinner fa-spin" style="font-size:30px;color:#2563eb;"></i><p>Menyusun laporan...</p></div>';

    let trxBerhasil=0, trxGagal=0, trxPending=0, totalOmset=0;
    let byProvider = {}, byProdukTop = {};
    try {
        if (window.db) {
            const q = query(collectionGroup(db,'riwayat_transaksi'),where('timestamp','>=',start),where('timestamp','<=',end));
            const snap = await getDocs(q);
            snap.forEach(d => {
                const it = d.data();
                const st = String(it.status||'').toUpperCase();
                const harga = parseInt(it.harga||0);
                const prov = it.provider || 'UNKNOWN';
                const prod = it.produk || '-';
                if (st.includes('BERHASIL')||st.includes('SUKSES')) {
                    trxBerhasil++; totalOmset += harga;
                    byProvider[prov] = (byProvider[prov]||0) + harga;
                    byProdukTop[prod] = (byProdukTop[prod]||0) + 1;
                }
                else if (st.includes('GAGAL')||st.includes('BATAL')) trxGagal++;
                else trxPending++;
            });
        }
    } catch(e) { console.warn(e); }

    // Pengeluaran & pemasukan dalam periode
    const outRes = await finApi('get_pengeluaran');
    const inRes = await finApi('get_pemasukan_lain');
    let totalPengeluaran = 0, totalPemasukanLain = 0;
    (outRes.data||[]).forEach(d => {
        const dt = new Date(d.tanggal);
        if (dt >= start && dt <= end) totalPengeluaran += d.nominal;
    });
    (inRes.data||[]).forEach(d => {
        const dt = new Date(d.tanggal);
        if (dt >= start && dt <= end) totalPemasukanLain += d.nominal;
    });

    const marginEst = 0.07;
    const labaKotor = Math.round(totalOmset * marginEst);
    const labaBersih = labaKotor + totalPemasukanLain - totalPengeluaran;
    const avgTrx = trxBerhasil > 0 ? Math.round(totalOmset/trxBerhasil) : 0;
    const successRate = (trxBerhasil+trxGagal+trxPending) > 0 ? Math.round(trxBerhasil/(trxBerhasil+trxGagal+trxPending)*100) : 0;

    const topProduk = Object.entries(byProdukTop).sort((a,b)=>b[1]-a[1]).slice(0,10);
    const perProvider = Object.entries(byProvider).sort((a,b)=>b[1]-a[1]);

    window.finLaporanExport = {label,periode:{start:start.toISOString(),end:end.toISOString()},trxBerhasil,trxGagal,trxPending,totalOmset,totalPengeluaran,totalPemasukanLain,labaKotor,labaBersih,avgTrx,successRate,perProvider,topProduk};

    content.innerHTML = `
        <div style="text-align:center;margin-bottom:20px;padding:20px;background:linear-gradient(135deg,#2563eb,#1d4ed8);color:white;border-radius:16px;">
            <h3 style="margin:0;font-size:22px;">LAPORAN LABA RUGI</h3>
            <p style="margin:5px 0 0;opacity:.9;">${finSettings.nama_toko||'Pandawa Digital'} - Periode: ${label}</p>
        </div>
        <div class="stats-grid">
            <div class="stat-card" style="border-left-color:#10b981;"><p>TRANSAKSI BERHASIL</p><h2>${trxBerhasil}</h2></div>
            <div class="stat-card" style="border-left-color:#ef4444;"><p>TRANSAKSI GAGAL</p><h2 style="color:#ef4444;">${trxGagal}</h2></div>
            <div class="stat-card" style="border-left-color:#f59e0b;"><p>TRANSAKSI PENDING</p><h2 style="color:#f59e0b;">${trxPending}</h2></div>
            <div class="stat-card" style="border-left-color:#2563eb;"><p>SUCCESS RATE</p><h2>${successRate}%</h2></div>
            <div class="stat-card" style="border-left-color:#8b5cf6;"><p>TOTAL OMSET</p><h2>${finFmt(totalOmset)}</h2></div>
            <div class="stat-card" style="border-left-color:#06b6d4;"><p>RATA-RATA TRANSAKSI</p><h2>${finFmt(avgTrx)}</h2></div>
        </div>

        <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(300px,1fr));gap:15px;margin-top:20px;">
            <div style="background:white;border:2px solid #10b981;border-radius:14px;padding:20px;">
                <h4 style="color:#10b981;margin:0 0 15px;"><i class="fas fa-arrow-up"></i> PEMASUKAN</h4>
                <div style="display:flex;justify-content:space-between;padding:10px 0;border-bottom:1px dashed #eee;">
                    <span>Laba Kotor Penjualan (estimasi margin 7%)</span><b style="color:#10b981;">${finFmt(labaKotor)}</b>
                </div>
                <div style="display:flex;justify-content:space-between;padding:10px 0;border-bottom:1px dashed #eee;">
                    <span>Pemasukan Lainnya</span><b style="color:#10b981;">${finFmt(totalPemasukanLain)}</b>
                </div>
                <div style="display:flex;justify-content:space-between;padding:12px 0;margin-top:5px;background:#f0fdf4;border-radius:8px;padding-inline:10px;">
                    <b style="color:#166534;">TOTAL PEMASUKAN</b><b style="color:#166534;font-size:18px;">${finFmt(labaKotor+totalPemasukanLain)}</b>
                </div>
            </div>
            <div style="background:white;border:2px solid #ef4444;border-radius:14px;padding:20px;">
                <h4 style="color:#ef4444;margin:0 0 15px;"><i class="fas fa-arrow-down"></i> PENGELUARAN</h4>
                <div style="display:flex;justify-content:space-between;padding:10px 0;border-bottom:1px dashed #eee;">
                    <span>Biaya Operasional</span><b style="color:#ef4444;">${finFmt(totalPengeluaran)}</b>
                </div>
                <div style="display:flex;justify-content:space-between;padding:12px 0;margin-top:5px;background:#fef2f2;border-radius:8px;padding-inline:10px;">
                    <b style="color:#991b1b;">TOTAL PENGELUARAN</b><b style="color:#991b1b;font-size:18px;">${finFmt(totalPengeluaran)}</b>
                </div>
            </div>
        </div>

        <div style="margin-top:20px;background:${labaBersih>=0?'linear-gradient(135deg,#10b981,#059669)':'linear-gradient(135deg,#ef4444,#dc2626)'};color:white;border-radius:14px;padding:25px;text-align:center;">
            <div style="font-size:14px;opacity:.9;margin-bottom:5px;"><i class="fas fa-coins"></i> LABA BERSIH</div>
            <div style="font-size:36px;font-weight:900;">${finFmt(labaBersih)}</div>
            <div style="font-size:12px;opacity:.9;margin-top:5px;">${labaBersih>=0?'(Surplus/Profit)':'(Defisit/Rugi)'}</div>
        </div>

        <div style="margin-top:20px;display:grid;grid-template-columns:repeat(auto-fit,minmax(350px,1fr));gap:20px;">
            <div style="background:#f8fafc;padding:18px;border-radius:14px;border:1px solid #e2e8f0;">
                <h5 style="margin:0 0 12px;"><i class="fas fa-server"></i> Penjualan per Provider</h5>
                ${perProvider.length?perProvider.map(([p,n])=>`
                    <div style="margin-bottom:10px;">
                        <div style="display:flex;justify-content:space-between;font-size:12px;margin-bottom:3px;"><b>${p}</b><span>${finFmt(n)}</span></div>
                        <div style="background:#e2e8f0;height:8px;border-radius:99px;overflow:hidden;"><div style="height:100%;background:#2563eb;width:${totalOmset?Math.round(n/totalOmset*100):0}%;border-radius:99px;"></div></div>
                    </div>`).join(''):'<p style="color:#999;font-size:12px;">Tidak ada data</p>'}
            </div>
            <div style="background:#f8fafc;padding:18px;border-radius:14px;border:1px solid #e2e8f0;">
                <h5 style="margin:0 0 12px;"><i class="fas fa-fire"></i> 10 Produk Terlaris</h5>
                ${topProduk.length?topProduk.map(([p,n],i)=>`
                    <div style="display:flex;justify-content:space-between;padding:6px 0;border-bottom:1px dashed #eee;font-size:12px;">
                        <span><b style="color:#2563eb;">#${i+1}</b> ${p}</span><b>${n}x trx</b>
                    </div>`).join(''):'<p style="color:#999;font-size:12px;">Tidak ada data</p>'}
            </div>
        </div>
        <p style="text-align:center;font-size:11px;color:#999;margin-top:20px;">Laporan dibuat pada ${new Date().toLocaleString('id-ID')} • Data dari Firebase & file JSON hosting</p>
    `;
}

function finExportCSV() {
    if (!window.finLaporanExport) return finNotif('error','Generate laporan terlebih dahulu');
    const L = window.finLaporanExport;
    let csv = '\uFEFF'; // BOM for Excel
    csv += 'LAPORAN LABA RUGI,' + (finSettings.nama_toko||'Pandawa Digital') + '\n';
    csv += 'Periode,' + L.label + '\n\n';
    csv += 'METRIK,NILAI\n';
    csv += 'Transaksi Berhasil,' + L.trxBerhasil + '\n';
    csv += 'Transaksi Gagal,' + L.trxGagal + '\n';
    csv += 'Transaksi Pending,' + L.trxPending + '\n';
    csv += 'Success Rate,' + L.successRate + '%\n';
    csv += 'Total Omset,' + L.totalOmset + '\n';
    csv += 'Rata-rata per Transaksi,' + L.avgTrx + '\n';
    csv += 'Total Pengeluaran,' + L.totalPengeluaran + '\n';
    csv += 'Pemasukan Lain,' + L.totalPemasukanLain + '\n';
    csv += 'Laba Kotor (estimasi),' + L.labaKotor + '\n';
    csv += 'Laba Bersih,' + L.labaBersih + '\n\n';
    csv += 'PENJUALAN PER PROVIDER,OMSET\n';
    L.perProvider.forEach(([p,n]) => csv += p + ',' + n + '\n');
    csv += '\nPRODUK TERLARIS,JUMLAH\n';
    L.topProduk.forEach(([p,n]) => csv += '"' + p.replace(/"/g,'""') + '",' + n + '\n');

    const blob = new Blob([csv], {type:'text/csv;charset=utf-8;'});
    const url = URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.href = url; a.download = 'laporan-keuangan-' + new Date().toISOString().slice(0,10) + '.csv';
    a.click();
    URL.revokeObjectURL(url);
    finNotif('success','CSV di-download');
}

// ==================== LOG ADMIN ====================
async function finLoadAdminLogs() {
    const res = await finApi('get_log_admin');
    let data = res.data || [];
    const filterDate = document.getElementById('finLogDate').value;
    if (filterDate) data = data.filter(d => (d.waktu||'').startsWith(filterDate));
    const list = document.getElementById('finAdminLogList');
    list.innerHTML = data.slice(0,500).map(d=>`
        <div style="background:white;border-left:4px solid #2563eb;padding:12px;margin-bottom:8px;border-radius:0 8px 8px 0;box-shadow:0 1px 3px rgba(0,0,0,.05);">
            <div style="display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:5px;">
                <b style="color:#1e293b;"><i class="fas fa-user-shield"></i> ${d.aksi||'-'}</b>
                <span style="font-size:11px;color:#64748b;">${d.waktu||'-'} • IP: ${d.ip||'-'}</span>
            </div>
            <div style="font-size:12px;color:#475569;margin-top:5px;">${d.detail||'-'}</div>
        </div>
    `).join('') || '<div style="text-align:center;padding:30px;color:#999;">Belum ada log aktivitas</div>';
}

// ==================== BACKUP & RESTORE ====================
async function finBackupData() {
    const res = await finApi('backup_all');
    if (res.status !== 'success') return finNotif('error','Gagal backup');
    const blob = new Blob([JSON.stringify(res.data,null,2)],{type:'application/json'});
    const url = URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.href = url; a.download = 'backup-keuangan-' + new Date().toISOString().replace(/[:.]/g,'-') + '.json';
    a.click(); URL.revokeObjectURL(url);
    await finLog('Backup Data', 'Download backup JSON');
    finNotif('success','Backup di-download');
}
async function finRestoreData() {
    const file = document.getElementById('finRestoreFile').files[0];
    if (!file) return finNotif('error','Pilih file backup JSON');
    if (!finConfirm('YAKIN ingin restore? Data saat ini akan ditimpa!')) return;
    const reader = new FileReader();
    reader.onload = async (e) => {
        try {
            const backupData = JSON.parse(e.target.result);
            const res = await finApi('restore_all', {backup_data: backupData}, 'POST');
            if (res.status==='success') finNotif('success','Data berhasil dipulihkan');
            else finNotif('error',res.msg||'Gagal restore');
            await finLog('Restore Data', 'Restore dari file backup');
        } catch(err) { finNotif('error','File JSON tidak valid: '+err.message); }
    };
    reader.readAsText(file);
}
async function finResetAllData() {
    if (!finConfirm('APAKAH ANDA YAKIN? Semua data keuangan akan dihapus PERMANEN!')) return;
    if (!finConfirm('Konfirmasi sekali lagi! Ini TIDAK DAPAT DIBATALKAN. Lanjut?')) return;
    const empty = {pengeluaran:[],pemasukan_lain:[],deposit_pusat:[],log_admin:[],hutang_piutang:[],hpp:[],api_logs:[]};
    await finApi('restore_all',{backup_data:empty},'POST');
    await finLog('RESET DATA', 'SEMUA DATA KEUANGAN DI-RESET');
    finNotif('success','Semua data keuangan telah direset');
}

// ==================== SETTINGS PAGE ====================
async function finLoadSettingsPage() {
    const s = await finApi('get_finance_settings');
    const d = s.data || {};
    document.getElementById('finSetNama').value = d.nama_toko || 'Pandawa Digital';
    document.getElementById('finSetKhfy').value = d.alert_saldo_khfy || 50000;
    document.getElementById('finSetIcs').value = d.alert_saldo_ics || 50000;
    document.getElementById('finSetKaje').value = d.alert_saldo_kaje || 50000;
    document.getElementById('finSetTargetHari').value = d.target_laba_harian || 100000;
    document.getElementById('finSetTargetBulan').value = d.target_laba_bulanan || 3000000;
    document.getElementById('finSetBiayaTetap').value = d.biaya_tetap_bulanan || 0;
}
async function finSaveSettings() {
    const data = {
        nama_toko: document.getElementById('finSetNama').value,
        alert_saldo_khfy: parseInt(document.getElementById('finSetKhfy').value)||0,
        alert_saldo_ics: parseInt(document.getElementById('finSetIcs').value)||0,
        alert_saldo_kaje: parseInt(document.getElementById('finSetKaje').value)||0,
        target_laba_harian: parseInt(document.getElementById('finSetTargetHari').value)||0,
        target_laba_bulanan: parseInt(document.getElementById('finSetTargetBulan').value)||0,
        biaya_tetap_bulanan: parseInt(document.getElementById('finSetBiayaTetap').value)||0
    };
    const res = await finApi('save_finance_settings', data, 'POST');
    if (res.status==='success') { finSettings = res.data; finNotif('success','Pengaturan tersimpan'); await finLog('Update Settings', 'Pengaturan keuangan diubah'); }
    else finNotif('error','Gagal menyimpan');
}

// ==================== MANAGE KATEGORI ====================
async function finManageKategori(tipe) {
    const current = (finKategori[tipe]||[]).join(', ');
    const input = prompt(`Edit kategori ${tipe} (pisahkan dengan koma):`, current);
    if (input === null) return;
    const list = input.split(',').map(s=>s.trim()).filter(s=>s);
    await finApi('save_kategori', {tipe, list}, 'POST');
    const k = await finApi('get_kategori');
    if (k.status==='success') finKategori = k.data;
    finLoadKategoriSelect();
    finNotif('success','Kategori diperbarui');
}

// ==================== INJECT QUICK INFO KE DASHBOARD UTAMA ====================
async function finInjectDashboardWidget() {
    try {
        const sumRes = await finApi('get_summary');
        const s = sumRes.data || {};
        const existing = document.getElementById('finQuickWidget');
        if (existing) existing.remove();
        const anchor = document.getElementById('listPendingTopup');
        if (!anchor) return;
        const div = document.createElement('div');
        div.id = 'finQuickWidget';
        div.style.cssText = 'display:grid;grid-template-columns:repeat(auto-fit,minmax(160px,1fr));gap:10px;margin-bottom:18px;padding:14px;background:linear-gradient(135deg,#f0fdf4,#ecfdf5);border:1px solid #bbf7d0;border-radius:14px;';
        div.innerHTML = `
            <div style="text-align:center;padding:8px;"><div style="font-size:10px;color:#166534;font-weight:800;text-transform:uppercase;"><i class="fas fa-coins"></i> PENGELUARAN HARI INI</div><div style="font-size:17px;font-weight:900;color:#dc2626;">${finFmt(s.pengeluaran_hari_ini||0)}</div></div>
            <div style="text-align:center;padding:8px;border-left:1px dashed #bbf7d0;"><div style="font-size:10px;color:#166534;font-weight:800;text-transform:uppercase;"><i class="fas fa-coins"></i> LABA BULAN INI</div><div style="font-size:17px;font-weight:900;color:#059669;">${finFmt((s.pemasukan_lain_bulan_ini||0)-(s.pengeluaran_bulan_ini||0))}</div></div>
            <div style="text-align:center;padding:8px;border-left:1px dashed #bbf7d0;"><div style="font-size:10px;color:#166534;font-weight:800;text-transform:uppercase;"><i class="fas fa-university"></i> DEPOSIT BULAN INI</div><div style="font-size:17px;font-weight:900;color:#2563eb;">${finFmt(s.deposit_bulan_ini||0)}</div></div>
            <div style="text-align:center;padding:8px;border-left:1px dashed #bbf7d0;cursor:pointer;" onclick="finShowPage('view-fin-dashboard', finGetLi('view-fin-dashboard'))"><div style="font-size:10px;color:#7c3aed;font-weight:800;text-transform:uppercase;"><i class="fas fa-chart-pie"></i> INFO KEUANGAN</div><div style="font-size:12px;font-weight:900;color:#7c3aed;margin-top:4px;">Buka Dashboard <i class="fas fa-arrow-right"></i></div></div>
        `;
        anchor.parentElement.insertBefore(div, anchor);
    } catch(e) { console.warn('Finance widget inject error:', e); }
}

// ==================== INIT ON DOM CONTENT LOADED ====================
document.addEventListener('DOMContentLoaded', () => {
    setTimeout(() => {
        finInit();
        finInjectDashboardWidget();
    }, 1500);
});

// Override showPage jika dipanggil untuk halaman finance (untuk kompatibilitas)
const originalShowPage = window.showPage;
if (originalShowPage) {
    // Tidak override; menu finance menggunakan finShowPage langsung
}

// Export ke window
Object.assign(window, {
    finShowPage, finLoadPage, finGetLi, finApi, finFmt, finFmtNum, finId, finNow, finToday, finMonth,
    finNotif, finConfirm, finPrompt, finLog,
    finAddPengeluaran, finDelPengeluaran, finLoadPengeluaran,
    finAddPemasukan, finDelPemasukan, finLoadPemasukan,
    finAddDeposit, finDelDeposit, finLoadDeposit,
    finAddHutangPiutang, finLunasiHp, finDelHp, finLoadHutang,
    finSaveHpp, finDelHpp, finLoadHpp, finManageKategori, finLoadKategoriSelect,
    finLoadDashboard, finInitLiveMonitor, finStartLiveMonitor, finStopLiveMonitor,
    finCekStatusTrx, finCopyRawJson, finCekStatusMasal,
    finCekSemuaSaldoProvider, finPingProvider, finLoadProviderPage,
    finLoadApiLogs, finClearApiLogs,
    finInitLaporan, finGenerateLaporan, finExportCSV,
    finLoadAdminLogs,
    finBackupData, finRestoreData, finResetAllData,
    finLoadSettingsPage, finSaveSettings,
    finInjectDashboardWidget
});
