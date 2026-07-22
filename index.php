<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
  <meta http-equiv="Cache-Control" content="no-cache,no-store,must-revalidate">
  <meta http-equiv="Pragma" content="no-cache">
  <meta http-equiv="Expires" content="0">
  <title>Pandawa-Digital - Super App PPOB</title>
  <link rel="manifest" href="manifest.json">
  <meta name="theme-color" content="#2563eb">
  <link rel="apple-touch-icon" href="icon-192.png">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="preload" as="image" href="icons/Pulsa.png?v=1.1">
  <link rel="preload" as="image" href="icons/E-Wallet.png?v=1.1">
  <link rel="preload" as="image" href="icons/Games.png?v=1.1">
  <link rel="preload" as="image" href="icons/Token%20PLN.png?v=1.1">
  <link rel="preload" as="image" href="icons/Telkomsel.png?v=1.1">
  <link rel="preload" as="image" href="icons/Indosat.png?v=1.1">
  <link rel="preload" as="image" href="icons/By.U.png?v=1.1">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
  <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>

<style>
/* ============================================================
   PANDAMA-DIGITAL PPOB — Professional Stylesheet
   ============================================================ */
:root {
  --primary: #2563eb;
  --primary-dark: #1d4ed8;
  --primary-light: #dbeafe;
  --bg: #f1f5f9;
  --white: #ffffff;
  --success: #10b981;
  --warning: #f59e0b;
  --danger: #ef4444;
  --text-dark: #0f172a;
  --text-grey: #64748b;
  --text-light: #94a3b8;
  --border: #e2e8f0;
  --shadow-sm: 0 1px 3px rgba(0,0,0,0.06);
  --shadow-md: 0 4px 12px rgba(0,0,0,0.05);
  --shadow-lg: 0 10px 30px rgba(0,0,0,0.08);
  --grad-main: linear-gradient(135deg, #3b82f6, #1d4ed8);
  --radius-sm: 10px;
  --radius-md: 16px;
  --radius-lg: 24px;
  --radius-xl: 30px;
}

*, *::before, *::after { box-sizing: border-box; }

body {
  margin: 0;
  font-family: 'Inter', 'Segoe UI', system-ui, -apple-system, sans-serif;
  background: var(--bg);
  padding-bottom: 85px;
  color: var(--text-dark);
  -webkit-tap-highlight-color: transparent;
  min-height: 100vh;
  font-size: 14px;
  line-height: 1.5;
}

/* ===== HEADER ===== */
.header {
  background: var(--grad-main);
  padding: 35px 20px 75px;
  border-radius: 0 0 var(--radius-xl) var(--radius-xl);
  position: relative;
  z-index: 1;
  box-shadow: 0 4px 20px rgba(37,99,235,0.2);
  overflow: hidden;
}
.header::after {
  content: '';
  position: absolute;
  top: -50%;
  right: -30%;
  width: 200px; height: 200px;
  background: rgba(255,255,255,0.05);
  border-radius: 50%;
  pointer-events: none;
}
.header-top {
  display: flex;
  align-items: center;
  gap: 15px;
  padding-top: 10px;
  position: relative;
  z-index: 2;
}
.header-logo {
  width: 50px; height: 50px;
  background: rgba(255,255,255,0.12);
  backdrop-filter: blur(10px);
  border-radius: var(--radius-md);
  display: flex;
  align-items: center;
  justify-content: center;
  border: 1px solid rgba(255,255,255,0.2);
  box-shadow: 0 4px 10px rgba(0,0,0,0.1);
  flex-shrink: 0;
}
.header-logo img { height: 32px; width: auto; object-fit: contain; }
.header-greeting {
  font-size: 11px;
  color: #bfdbfe;
  font-weight: 600;
  margin-bottom: 2px;
  display: flex;
  align-items: center;
  gap: 5px;
}
.header-name {
  font-weight: 800;
  font-size: 19px;
  color: #fff;
  letter-spacing: -0.5px;
  text-shadow: 0 2px 4px rgba(0,0,0,0.2);
  line-height: 1.2;
}
.header-version {
  font-size: 10px;
  color: #bfdbfe;
  font-weight: 700;
  margin-top: 2px;
}
.header-actions { display: flex; gap: 8px; }
.header-btn {
  width: 38px; height: 38px;
  background: rgba(255,255,255,0.1);
  backdrop-filter: blur(10px);
  border-radius: var(--radius-sm);
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  border: 1px solid rgba(255,255,255,0.1);
  transition: all 0.2s;
  color: #fff;
  font-size: 15px;
}
.header-btn:active { transform: scale(0.9); }
.header-btn.danger { background: rgba(239,68,68,0.15); border-color: rgba(239,68,68,0.3); color: #fca5a5; }

/* ===== SALDO BOX ===== */
.saldo-box {
  margin: -55px 15px 20px;
  background: var(--white);
  padding: 20px;
  border-radius: var(--radius-lg);
  box-shadow: var(--shadow-lg);
  position: relative;
  z-index: 2;
  border: 1px solid #f1f5f9;
}
.saldo-info {
  display: flex;
  justify-content: space-between;
  align-items: center;
}
.saldo-label {
  font-size: 12px;
  color: var(--text-grey);
  margin-bottom: 5px;
  display: flex;
  align-items: center;
  gap: 5px;
}
.saldo-value {
  font-size: 26px;
  font-weight: 900;
  color: #1e3a8a;
  letter-spacing: -1px;
}
.action-grid {
  display: grid;
  grid-template-columns: repeat(4,1fr);
  gap: 10px;
  margin-top: 18px;
  padding-top: 15px;
  border-top: 1px dashed #f1f5f9;
}
.action-item {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 8px;
  cursor: pointer;
  transition: transform 0.15s;
}
.action-item:active { transform: scale(0.92); }
.action-icon {
  width: 46px; height: 46px;
  background: #eff6ff;
  color: var(--primary);
  border-radius: 14px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 18px;
  box-shadow: var(--shadow-sm);
}
.action-text { font-size: 11px; font-weight: 600; color: var(--text-dark); }

/* ===== MENU CONTAINER ===== */
.menu-container {
  background: var(--white);
  margin: 0 15px 20px;
  border-radius: var(--radius-lg);
  padding: 5px 15px 20px;
  box-shadow: var(--shadow-md);
  border: 1px solid rgba(0,0,0,0.04);
  position: relative;
  z-index: 2;
}
.cat-title {
  padding: 18px 0 12px;
  font-weight: 700;
  font-size: 14px;
  color: var(--text-dark);
  display: flex;
  align-items: center;
  gap: 8px;
}
.cat-title::before {
  content: '';
  width: 4px; height: 16px;
  background: var(--primary);
  border-radius: 4px;
  flex-shrink: 0;
}
.menu-grid {
  display: grid;
  grid-template-columns: repeat(4,1fr);
  gap: 18px 8px;
  padding: 0;
}
.menu-item {
  text-align: center;
  font-size: 12px;
  cursor: pointer;
  color: var(--text-dark);
  font-weight: 700;
  line-height: 1.3;
  transition: transform 0.15s, opacity 0.15s;
}
.menu-item:active { transform: scale(0.9); opacity: 0.7; }
.icon-box {
  width: 58px; height: 58px;
  margin: 0 auto 10px;
  border-radius: var(--radius-md);
  display: flex;
  align-items: center;
  justify-content: center;
  background: linear-gradient(145deg, #ffffff, #f1f5f9);
  box-shadow: 0 8px 20px rgba(37,99,235,0.08);
  border: 1.5px solid rgba(37,99,235,0.1);
  overflow: hidden;
  transition: transform 0.3s cubic-bezier(0.34,1.56,0.64,1);
}
.menu-item:active .icon-box { transform: scale(0.85) translateY(4px); }
.icon-box img { width: 60%; height: 60%; object-fit: contain; }

#menuDrawer {
  max-height: 0; opacity: 0; overflow: hidden;
  transition: all 0.4s cubic-bezier(0.4,0,0.2,1);
}
#menuDrawer.expanded { max-height: 800px; opacity: 1; margin-top: 10px; }
#btnMoreContainer { text-align: center; margin-top: 12px; padding-top: 12px; border-top: 1px dashed #e2e8f0; }
#btnMore {
  background: #f1f5f9;
  padding: 8px 24px;
  border-radius: 20px;
  display: inline-block;
  font-size: 12px;
  font-weight: 700;
  color: var(--primary);
  cursor: pointer;
  transition: all 0.2s;
}
#btnMore:active { transform: scale(0.95); }

/* ===== HISTORY CARDS ===== */
.history-container {
  padding: 0 20px;
  margin-bottom: 15px;
  max-height: 200px;
  overflow-y: auto;
}
.history-card {
  background: var(--white);
  padding: 12px 14px;
  border-radius: var(--radius-md);
  margin-bottom: 8px;
  border: 1px solid rgba(0,0,0,0.03);
  cursor: pointer;
  transition: all 0.15s;
  display: flex;
  align-items: center;
  gap: 12px;
  box-shadow: var(--shadow-sm);
}
.history-card:active { background: #f8fafc; transform: scale(0.98); }
.h-icon {
  width: 40px; height: 40px;
  border-radius: var(--radius-sm);
  background: #eff6ff;
  color: var(--primary);
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 16px;
  flex-shrink: 0;
}
.h-content { flex: 1; }
.h-prod {
  font-weight: 700;
  font-size: 13px;
  color: var(--text-dark);
  margin-bottom: 4px;
  line-height: 1.3;
}
.h-date { font-size: 10px; color: var(--text-grey); font-weight: 500; display: flex; align-items: center; gap: 4px; }
.h-right { text-align: right; }
.h-price {
  font-weight: 800;
  color: var(--primary);
  font-size: 14px;
  margin-bottom: 4px;
}
.h-badge {
  font-size: 9px;
  padding: 3px 10px;
  border-radius: 12px;
  font-weight: 700;
  display: inline-block;
  letter-spacing: 0.5px;
  text-transform: uppercase;
}
.bg-BERHASIL { background: #d1fae5; color: #065f46; }
.bg-PENDING  { background: #fef3c7; color: #92400e; }
.bg-GAGAL    { background: #fee2e2; color: #991b1b; }

/* ===== MODAL (Bottom Sheet) ===== */
.modal {
  display: none;
  position: fixed;
  bottom: 0; left: 0;
  width: 100%; height: 100%;
  background: rgba(0,0,0,0.4);
  backdrop-filter: blur(4px);
  -webkit-backdrop-filter: blur(4px);
  align-items: flex-end;
  z-index: 11000;
}
.modal-center { align-items: center; justify-content: center; }
.modal-content {
  background: var(--white);
  width: 100%;
  max-height: 92vh;
  padding: 28px 20px 20px;
  border-radius: var(--radius-xl) var(--radius-xl) 0 0;
  display: flex;
  flex-direction: column;
  animation: slideUp 0.35s cubic-bezier(0.16,1,0.3,1);
  position: relative;
  box-shadow: 0 -10px 40px rgba(0,0,0,0.12);
}
.modal-content::before {
  content: '';
  position: absolute;
  top: 10px;
  left: 50%;
  transform: translateX(-50%);
  width: 40px; height: 4px;
  background: #cbd5e1;
  border-radius: 4px;
}

/* ===== AUTH OVERLAY (Login/Register) ===== */
#authOverlay {
  position: fixed;
  inset: 0;
  background: linear-gradient(135deg, #eff6ff 0%, #dbeafe 50%, #f8fafc 100%);
  z-index: 10000;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 20px;
  overflow: hidden;
}
.auth-fx-bg {
  position: absolute;
  inset: -10%;
  background:
    radial-gradient(circle at 20% 30%, rgba(37,99,235,0.12) 0%, transparent 40%),
    radial-gradient(circle at 80% 70%, rgba(16,185,129,0.08) 0%, transparent 40%);
  filter: blur(60px);
  animation: bgPulse 10s infinite alternate ease-in-out;
}
@keyframes bgPulse {
  0%   { transform: translate(0,0) scale(1); }
  100% { transform: translate(2%,2%) scale(1.05); }
}
.auth-card {
  position: relative;
  z-index: 10;
  width: 100%;
  max-width: 400px;
  background: rgba(255,255,255,0.9);
  backdrop-filter: blur(20px);
  -webkit-backdrop-filter: blur(20px);
  border-radius: var(--radius-xl);
  padding: 40px 35px;
  box-shadow: 0 20px 50px rgba(37,99,235,0.1);
  border: 1px solid rgba(255,255,255,0.5);
  animation: fadeInUp 0.5s cubic-bezier(0.16,1,0.3,1);
  display: flex;
  flex-direction: column;
  gap: 20px;
}
@keyframes fadeInUp {
  from { opacity: 0; transform: translateY(30px); }
  to   { opacity: 1; transform: translateY(0); }
}
@keyframes slideUp {
  from { transform: translateY(100%); }
  to   { transform: translateY(0); }
}
@keyframes zoomIn {
  from { transform: scale(0.8); opacity: 0; }
  to   { transform: scale(1); opacity: 1; }
}
@keyframes spin { 100% { transform: rotate(360deg); } }

.auth-brand { text-align: center; }
.brand-logo-glow {
  width: 90px; height: 90px;
  object-fit: contain;
  margin-bottom: 12px;
  animation: logoFloat 4s infinite ease-in-out alternate;
}
@keyframes logoFloat {
  0%   { transform: translateY(0); }
  100% { transform: translateY(-8px) rotate(1.5deg); }
}
.auth-h1 {
  font-size: 28px;
  font-weight: 900;
  margin: 0;
  background: linear-gradient(135deg, #1e3a8a, #2563eb);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  letter-spacing: -0.8px;
}
.auth-desc { color: var(--text-grey); font-size: 13px; margin-top: 4px; font-weight: 500; }
.form-area { display: flex; flex-direction: column; gap: 16px; }
.inp-wrapper { position: relative; }
.inp-modern {
  width: 100%;
  background: rgba(241,245,249,0.8);
  border: 2px solid rgba(226,232,240,0.8);
  border-radius: var(--radius-md);
  padding: 16px 16px 16px 52px;
  color: var(--text-dark);
  font-size: 14px;
  font-weight: 600;
  font-family: inherit;
  transition: all 0.3s;
  outline: none;
}
.inp-modern::placeholder { color: var(--text-light); font-weight: 500; }
.inp-modern:focus {
  background: var(--white);
  border-color: var(--primary);
  box-shadow: 0 0 0 4px rgba(37,99,235,0.12);
}
.inp-icon {
  position: absolute;
  left: 18px;
  top: 50%;
  transform: translateY(-50%);
  color: var(--text-light);
  font-size: 18px;
  transition: all 0.3s;
}
.inp-modern:focus ~ .inp-icon { color: var(--primary); transform: translateY(-50%) scale(1.1); }
.inp-eye {
  position: absolute;
  right: 18px;
  top: 50%;
  transform: translateY(-50%);
  color: var(--text-light);
  cursor: pointer;
  padding: 5px;
  transition: all 0.3s;
}
.inp-eye:hover { color: var(--primary); }
.btn-modern-auth {
  background: var(--grad-main);
  width: 100%;
  padding: 16px;
  border: none;
  border-radius: var(--radius-md);
  color: var(--white);
  font-weight: 700;
  font-size: 15px;
  cursor: pointer;
  box-shadow: 0 10px 25px rgba(37,99,235,0.3);
  transition: transform 0.2s, box-shadow 0.2s;
  letter-spacing: 0.5px;
}
.btn-modern-auth:active { transform: scale(0.97); }
.btn-modern-auth i { margin-left: 8px; }
.auth-switcher { text-align: center; font-size: 13px; color: var(--text-grey); font-weight: 500; }
.link-accent { color: var(--primary); font-weight: 700; cursor: pointer; text-decoration: none; }
.link-accent:hover { text-decoration: underline; }
.reset-link { text-align: right; font-size: 12px; font-weight: 600; }
.reset-link span { color: var(--text-grey); cursor: pointer; }
.reset-link span:hover { color: var(--primary); }

/* ===== NOTICE MODAL ===== */
#modalNotice { align-items: center; justify-content: center; z-index: 20000; }
.notice-content {
  background: var(--white);
  width: 85%;
  max-width: 320px;
  padding: 30px;
  border-radius: var(--radius-lg);
  text-align: center;
  box-shadow: 0 10px 30px rgba(0,0,0,0.15);
  animation: zoomIn 0.3s;
}
.notice-icon { font-size: 50px; margin-bottom: 15px; }
.icon-success { color: var(--success); }
.icon-error   { color: var(--danger); }
.icon-loading { color: var(--primary); }

/* ===== BOTTOM NAV ===== */
.bottom-nav {
  position: fixed;
  bottom: 20px;
  left: 20px;
  right: 20px;
  height: 65px;
  background: var(--white);
  display: flex;
  justify-content: space-around;
  align-items: center;
  padding: 0 10px;
  box-shadow: 0 10px 40px rgba(0,0,0,0.08);
  z-index: 9999;
  border-radius: 25px;
  border: 1px solid #f1f5f9;
}
.nav-item {
  text-align: center;
  color: #94a3b8;
  font-size: 10px;
  flex: 1;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  height: 100%;
  cursor: pointer;
  transition: color 0.2s;
  position: relative;
  font-weight: 600;
}
.nav-item.active { color: var(--primary); }
.nav-item i { font-size: 20px; margin-bottom: 3px; display: block; transition: transform 0.2s; }
.nav-item.active i { transform: translateY(-3px); }
.nav-fab {
  background: var(--grad-main);
  color: var(--white);
  width: 55px; height: 55px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  position: absolute;
  top: -25px;
  box-shadow: 0 10px 25px rgba(37,99,235,0.4);
  border: 4px solid rgba(255,255,255,0.8);
  font-size: 22px;
  transition: transform 0.15s;
}
.nav-fab:active { transform: scale(0.92); }

/* ===== GLOBAL LOADER ===== */
#globalLoader {
  position: fixed;
  inset: 0;
  background: var(--white);
  z-index: 99999;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  transition: opacity 0.4s ease;
}
.loader-logo-box {
  width: 80px; height: 80px;
  background: var(--white);
  border-radius: var(--radius-lg);
  padding: 10px;
  box-shadow: 0 10px 30px rgba(0,0,0,0.1);
  display: flex;
  align-items: center;
  justify-content: center;
  margin-bottom: 25px;
  animation: pulseLogo 2s infinite ease-in-out;
}
@keyframes pulseLogo {
  0%,100% { transform: scale(1); box-shadow: 0 5px 15px rgba(0,0,0,0.05); }
  50%     { transform: scale(1.05); box-shadow: 0 15px 35px rgba(37,99,235,0.2); }
}
.custom-spinner {
  width: 40px; height: 40px;
  border: 4px solid #dbeafe;
  border-top-color: var(--primary);
  border-radius: 50%;
  animation: spin 0.8s linear infinite;
}

/* ===== FORM ELEMENTS ===== */
.input-group { position: relative; margin-bottom: 15px; }
.input-group i {
  position: absolute;
  left: 16px;
  top: 50%;
  transform: translateY(-50%);
  color: var(--text-light);
  font-size: 16px;
  z-index: 5;
}
.form-input {
  width: 100%;
  padding: 12px 12px 12px 42px;
  border: 2px solid var(--border);
  border-radius: var(--radius-sm);
  font-size: 13px;
  outline: none;
  background: #f8fafc;
  transition: all 0.25s;
  color: var(--text-dark);
  font-weight: 600;
}
.form-input:focus {
  border-color: var(--primary);
  background: var(--white);
  box-shadow: 0 0 0 4px rgba(37,99,235,0.1);
}
.form-input:focus + i { color: var(--primary); }
select.form-input { appearance: none; background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%2364748b' d='M6 8L1 3h10z'/%3E%3C/svg%3E"); background-repeat: no-repeat; background-position: right 12px center; }

.btn-konfirmasi {
  width: 100%;
  padding: 14px;
  background: var(--primary);
  color: var(--white);
  border: none;
  border-radius: var(--radius-sm);
  font-weight: 700;
  font-size: 15px;
  cursor: pointer;
  transition: transform 0.15s, box-shadow 0.15s;
}
.btn-konfirmasi:active { transform: scale(0.97); }
.btn-batal {
  width: 100%;
  padding: 14px;
  background: #f1f5f9;
  color: var(--text-grey);
  border: none;
  border-radius: var(--radius-sm);
  font-weight: 700;
  font-size: 15px;
  cursor: pointer;
  margin-top: 10px;
}

/* ===== FILTER & PRODUCTS ===== */
#areaFilter {
  display: grid;
  grid-template-columns: repeat(3,1fr);
  gap: 10px;
  padding: 10px 0;
  max-height: 50vh;
  overflow-y: auto;
}
.filter-card {
  background: var(--white);
  border: 1px solid var(--border);
  border-radius: var(--radius-sm);
  padding: 10px;
  text-align: center;
  cursor: pointer;
  transition: all 0.15s;
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 4px;
}
.filter-card:active { transform: scale(0.95); background: #f0f7ff; }
.filter-card.active { border-color: var(--primary); background: #eff6ff; }
.filter-card img { width: 32px; height: 32px; object-fit: contain; }
.filter-card span { font-size: 10px; font-weight: 700; color: #475569; line-height: 1.2; }

#listProdukArea {
  flex: 1;
  overflow-y: auto;
  border-radius: var(--radius-sm);
  background: #fafafa;
  padding: 5px;
  max-height: 50vh;
}
.item-produk {
  padding: 14px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  cursor: pointer;
  background: var(--white);
  margin-bottom: 8px;
  border-radius: var(--radius-md);
  border: 1px solid rgba(0,0,0,0.03);
  box-shadow: var(--shadow-sm);
  transition: background 0.15s;
}
.item-produk:active { background: #eff6ff; }
.invoice-row { display: flex; justify-content: space-between; margin-bottom: 8px; font-size: 13px; color: #555; }
.invoice-total {
  font-size: 16px;
  font-weight: 700;
  color: var(--text-dark);
  border-top: 1px dashed var(--border);
  padding-top: 10px;
  margin-top: 10px;
}

/* ===== PRODUCT LIST (SHOP) ===== */
.product-list {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 15px;
  padding: 0 20px 20px;
}
.product-card {
  background: var(--white);
  border-radius: var(--radius-sm);
  overflow: hidden;
  box-shadow: var(--shadow-sm);
  display: flex;
  flex-direction: column;
}
.product-info { padding: 10px; flex: 1; display: flex; flex-direction: column; }
.btn-buy-shop {
  width: 100%; padding: 7px;
  border: 1.5px solid var(--primary);
  color: var(--primary);
  background: var(--white);
  border-radius: 6px;
  font-size: 12px;
  font-weight: 700;
  cursor: pointer;
  transition: all 0.15s;
}
.btn-buy-shop:active { background: var(--primary); color: var(--white); }
.btn-see-more {
  width: 100%; padding: 12px;
  background: var(--white);
  border: 1.5px solid var(--primary);
  color: var(--primary);
  font-weight: 700;
  border-radius: var(--radius-sm);
  cursor: pointer;
  text-align: center;
  font-size: 13px;
  transition: all 0.15s;
}
.btn-see-more:active { background: var(--primary); color: var(--white); }

/* ===== FULL PAGES ===== */
.full-page { display: none; padding-bottom: 90px; animation: fadeIn 0.3s; }
@keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
.prof-header {
  background: var(--grad-main);
  padding: 40px 20px 60px;
  border-radius: 0 0 var(--radius-xl) var(--radius-xl);
  text-align: center;
  color: var(--white);
  margin-bottom: -40px;
}
.prof-card {
  background: var(--white);
  margin: 0 20px;
  padding: 20px;
  border-radius: var(--radius-lg);
  box-shadow: var(--shadow-md);
  position: relative;
  z-index: 2;
}
.prof-row {
  display: flex;
  justify-content: space-between;
  padding: 12px 0;
  border-bottom: 1px dashed var(--border);
  font-size: 13px;
}
.prof-row:last-child { border-bottom: none; }

/* ===== QRIS OVERLAY ===== */
.qris-overlay {
  display: none;
  position: fixed;
  inset: 0;
  background: rgba(0,0,0,0.9);
  z-index: 30000;
  align-items: center;
  justify-content: center;
  flex-direction: column;
}
.qris-overlay img { max-width: 90%; max-height: 80%; border-radius: var(--radius-sm); }
.qris-close {
  position: absolute;
  top: 20px; right: 20px;
  color: var(--white); font-size: 28px;
  cursor: pointer;
  width: 40px; height: 40px;
  display: flex; align-items: center; justify-content: center;
  background: rgba(255,255,255,0.2);
  border-radius: 50%;
  transition: background 0.2s;
}
.qris-close:active { transform: scale(0.9); }

/* ===== MISC ===== */
#mainAppContent { display: none; }
#inputContainer { display: none; margin-bottom: 15px; }
#btnKembali { display: none; font-size: 18px; color: var(--primary); cursor: pointer; margin-right: 12px; }
#operatorBadge {
  position: absolute;
  right: 80px; top: 50%;
  transform: translateY(-50%);
  font-size: 9px;
  background: #dbeafe;
  color: var(--primary);
  padding: 3px 8px;
  border-radius: 6px;
  font-weight: 700;
  display: none;
  text-transform: uppercase;
  pointer-events: none;
}
.sn-box {
  background: #f1f5f9;
  padding: 10px;
  border-radius: 8px;
  font-family: 'Courier New', monospace;
  font-size: 11px;
  color: var(--text-dark);
  word-break: break-all;
  margin-top: 10px;
  line-height: 1.4;
  border: 1px solid var(--border);
}
.cart-badge {
  position: absolute;
  top: -6px; right: 20%;
  background: var(--danger);
  color: var(--white);
  font-size: 9px;
  padding: 2px 6px;
  border-radius: 10px;
  display: none;
  font-weight: 700;
}
.pagination-container { display: flex; justify-content: center; gap: 8px; margin-top: 15px; }
.page-num {
  width: 32px; height: 32px;
  display: flex; align-items: center; justify-content: center;
  background: #f1f5f9;
  border-radius: 8px;
  cursor: pointer;
  font-weight: 700;
  font-size: 12px;
  transition: all 0.15s;
}
.page-num.active { background: var(--primary); color: var(--white); }
.chat-fab {
  position: fixed;
  bottom: 95px;
  right: 15px;
  width: 44px; height: 44px;
  background: #25D366;
  color: var(--white);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  box-shadow: 0 4px 15px rgba(37,211,102,0.4);
  z-index: 9998;
  cursor: pointer;
  transition: transform 0.15s;
}
.chat-fab:active { transform: scale(0.9); }
.chat-fab i { font-size: 22px; }
.modal-invoice {
  padding: 30px 20px 25px !important;
  background: linear-gradient(180deg, var(--white), #f8fafc);
}
.akrab-header {
  background: var(--grad-main);
  color: var(--white);
  padding: 18px 15px;
  display: flex;
  align-items: center;
  gap: 15px;
  position: sticky;
  top: 0;
  z-index: 10;
}
.akrab-search-container { padding: 12px 15px; background: var(--white); border-bottom: 1px solid var(--border); }
.akrab-search-input {
  width: 100%;
  padding: 12px 15px;
  border: 1px solid var(--border);
  border-radius: var(--radius-sm);
  font-size: 14px;
  outline: none;
  background: #f8fafc;
}
.akrab-grid {
  display: grid;
  grid-template-columns: repeat(3,1fr);
  gap: 10px;
  padding: 15px;
  background: var(--white);
}
.akrab-btn {
  background: #f8fafc;
  border: 1px solid var(--border);
  border-radius: var(--radius-sm);
  padding: 12px 5px;
  text-align: center;
  font-size: 10px;
  font-weight: 800;
  color: #475569;
  cursor: pointer;
  transition: all 0.15s;
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 5px;
}
.akrab-btn:active { transform: scale(0.95); }
.akrab-btn.active { background: #eff6ff; border-color: var(--primary); color: var(--primary); }
.akrab-btn i { font-size: 16px; }
.akrab-section-title {
  padding: 0 15px;
  font-size: 11px;
  font-weight: 700;
  color: var(--text-light);
  text-transform: uppercase;
  margin-top: 10px;
}
.modal-fullscreen { align-items: flex-start !important; }
.modal-fullscreen .modal-content {
  height: 100vh !important; max-height: 100vh !important;
  border-radius: 0 !important; padding: 0 !important;
}
.modal-fullscreen .modal-content::before { display: none !important; }
#modalBroadcast { align-items: center; justify-content: center; z-index: 21000; background: rgba(0,0,0,0.7); backdrop-filter: blur(5px); }
.bc-content {
  background: var(--white);
  width: 85%; max-width: 350px;
  border-radius: var(--radius-lg);
  overflow: hidden;
  animation: zoomIn 0.4s;
  position: relative;
  text-align: center;
}
.bc-img { width: 100%; max-height: 300px; object-fit: contain; background: #000; display: none; }
.bc-body { padding: 25px 20px 20px; }
.bc-title { font-size: 18px; font-weight: 800; color: var(--text-dark); margin-bottom: 10px; }
.bc-text { font-size: 13px; color: #555; line-height: 1.5; margin-bottom: 20px; }
.bc-close-btn {
  position: absolute; top: 10px; right: 10px;
  background: rgba(0,0,0,0.5); color: var(--white);
  width: 30px; height: 30px;
  border-radius: 50%;
  display: flex; align-items: center; justify-content: center;
  cursor: pointer;
  font-size: 14px;
}

/* ===== WA CHAT STYLES ===== */
#modalChatPublic {
  display: none;
  position: fixed;
  bottom: 85px; right: 20px;
  width: 340px; max-width: 90vw;
  height: 500px; max-height: 75vh;
  z-index: 12000;
  background: #efeae2;
  border-radius: var(--radius-md);
  box-shadow: 0 10px 30px rgba(0,0,0,0.2);
  flex-direction: column;
  overflow: hidden;
  animation: zoomInWA 0.3s cubic-bezier(0.175,0.885,0.32,1.275);
}
@keyframes zoomInWA {
  from { opacity: 0; transform: scale(0.8) translateY(20px); transform-origin: bottom right; }
  to   { opacity: 1; transform: scale(1) translateY(0); transform-origin: bottom right; }
}
.wa-header { background: #00a884; color: var(--white); padding: 12px 15px; display: flex; align-items: center; justify-content: space-between; flex-shrink: 0; }
.wa-header-left { display: flex; align-items: center; gap: 10px; }
.wa-header-icon {
  width: 35px; height: 35px;
  background: rgba(255,255,255,0.2);
  border-radius: 50%;
  display: flex; align-items: center; justify-content: center;
  font-size: 18px; flex-shrink: 0; color: var(--white);
}
.wa-header-title { display: flex; flex-direction: column; }
.wa-header-title b { font-size: 14px; line-height: 1.2; }
.wa-header-title span { font-size: 10px; opacity: 0.9; }

/* ===== RECEIPT DETAIL ===== */
.receipt-header { text-align: center; margin-bottom: 25px; }
.receipt-icon {
  width: 65px; height: 65px;
  margin: 0 auto 15px;
  border-radius: 50%;
  display: flex; align-items: center; justify-content: center;
  font-size: 28px; color: var(--white);
  box-shadow: 0 8px 20px rgba(0,0,0,0.15);
}
.receipt-status { font-weight: 800; font-size: 18px; text-transform: uppercase; letter-spacing: 0.5px; }
.receipt-amount { font-size: 30px; font-weight: 900; color: var(--text-dark); margin: 5px 0 25px; letter-spacing: -1px; }
.detail-item { display: flex; justify-content: space-between; margin-bottom: 12px; font-size: 13px; color: var(--text-grey); align-items: center; }
.detail-val { font-weight: 700; color: var(--text-dark); text-align: right; max-width: 65%; word-break: break-word; }
.sn-container {
  background: #1e293b;
  padding: 14px;
  border-radius: var(--radius-sm);
  margin-top: 12px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  gap: 12px;
}
.sn-text { font-family: 'Courier New', monospace; font-size: 13px; color: var(--success); word-break: break-all; font-weight: 700; }
.btn-copy {
  color: var(--white);
  background: rgba(255,255,255,0.1);
  border: 1px solid rgba(255,255,255,0.2);
  width: 36px; height: 36px;
  border-radius: var(--radius-sm);
  font-size: 14px;
  cursor: pointer;
  display: flex; align-items: center; justify-content: center;
  transition: all 0.2s;
}
.btn-copy:active { transform: scale(0.9); background: var(--primary); }

/* ===== PRINT PREVIEW ===== */
#printPreviewArea {
  font-family: 'Courier New', Courier, monospace;
  white-space: pre-wrap;
  margin: 0;
  font-size: 13px;
  line-height: 1.3;
  color: #000;
}
</style>

<script>
// ===== GLOBAL: Phone Number Normalization =====
document.addEventListener('input', function(e) {
    const ids = ['nomorHP','invoiceNomorHP','newTopupPhone','inputIcsTujuan','inputKhfyTujuan','inputPOTujuan','inputWzTujuan'];
    if (e.target && ids.includes(e.target.id)) {
        let val = e.target.value;
        const hasPlus62 = val.trim().startsWith('+62');
        let clean = val.replace(/[^0-9]/g, '');
        if (hasPlus62) clean = '0' + clean.slice(2);
        else if (clean.startsWith('62')) clean = '0' + clean.slice(2);
        e.target.value = clean;
    }
});

window.pasteDariClipboard = async function(id) {
    const input = document.getElementById(id);
    if (!input) return;
    try {
        if (typeof AndroidShare !== "undefined" && typeof AndroidShare.pasteFromClipboard === "function") {
            const text = AndroidShare.pasteFromClipboard();
            if (text) { input.value = text; input.dispatchEvent(new Event('input', { bubbles: true })); }
            else alert("Clipboard kosong.");
        } else {
            const text = await navigator.clipboard.readText();
            input.value = text;
            input.dispatchEvent(new Event('input', { bubbles: true }));
        }
    } catch (err) {
        alert('Butuh izin clipboard. Alternatif: tekan & tahan kolom input, pilih Tempel.');
    }
};
</script>

<script type="module">
import { initializeApp } from "https://www.gstatic.com/firebasejs/10.7.1/firebase-app.js";
import { getAuth, signInWithEmailAndPassword, createUserWithEmailAndPassword, onAuthStateChanged, sendPasswordResetEmail, signOut, GoogleAuthProvider, signInWithPopup, signInWithRedirect } from "https://www.gstatic.com/firebasejs/10.7.1/firebase-auth.js";
import { getFirestore, collection, onSnapshot, addDoc, query, orderBy, limit, serverTimestamp, updateDoc, doc, setDoc, getDoc, deleteDoc, where, getDocs, initializeFirestore, persistentLocalCache, persistentMultipleTabManager, runTransaction } from "https://www.gstatic.com/firebasejs/10.7.1/firebase-firestore.js";

const firebaseConfig = {
    apiKey: "AIzaSyDYj0BA6cZDUxNBA7lmxBoXzah7H4y8yu4",
    authDomain: "pandawa-store.firebaseapp.com",
    projectId: "pandawa-store",
    storageBucket: "pandawa-store.firebasestorage.app",
    messagingSenderId: "974440930132",
    appId: "1:974440930132:web:57fcb857cfd5ac51b386c1"
};

const app = initializeApp(firebaseConfig);
const db = initializeFirestore(app, {
    localCache: persistentLocalCache({ tabManager: persistentMultipleTabManager() })
});
const auth = getAuth(app);

// Expose to global scope
window.auth = auth; window.db = db;
const fns = { setDoc, getDoc, updateDoc, doc, serverTimestamp, collection, addDoc, getDocs, where, query, onSnapshot, deleteDoc, orderBy, limit, runTransaction };
Object.keys(fns).forEach(k => window[k] = fns[k]);

// ===== TELEGRAM NOTIFICATION =====
window.kirimNotifTelegram = function(tipe, data) {
    const botToken = "7507761189:AAGUCYltzj_IMuDRgjUzUPiZDz4nbVXvOME";
    const chatId = "-1002997407612";
    const threadId = (tipe === 'transaksi' || tipe === 'preorder') ? "6" : "7";
    const now = new Date();
    const months = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
    const t = `${now.getDate()} ${months[now.getMonth()]} ${now.getFullYear()} | ${String(now.getHours()).padStart(2,'0')}.${String(now.getMinutes()).padStart(2,'0')}.${String(now.getSeconds()).padStart(2,'0')}`;

    let tujuanMasked = "-";
    if (data.tujuan) { const s = String(data.tujuan); tujuanMasked = s.length > 5 ? s.slice(0,-5)+"*****" : "*****"; }

    let text = '';
    if (tipe === 'transaksi') {
        text = `<b>✅ TRANSAKSI BERHASIL</b>\n━━━━━━━━━━━━━━━━━━\n📦 Produk : ${data.produk}\n🎯 Tujuan : ${tujuanMasked}\n💸 Harga : Rp${new Intl.NumberFormat('id-ID').format(data.harga)}\n🕒 Waktu : ${t}\n👤 User : ${data.username}\n🆔 ID : ${data.trx_id}\n━━━━━━━━━━━━━━━━━━\nwww.pandawa-digital.com`;
    } else if (tipe === 'preorder') {
        text = `<b>⏳ PRE-ORDER MASUK</b>\n━━━━━━━━━━━━━━━━━━\n📦 Produk : ${data.produk}\n🎯 Tujuan : ${tujuanMasked}\n💸 Harga : Rp${new Intl.NumberFormat('id-ID').format(data.harga)}\n🕒 Waktu : ${t}\n👤 User : ${data.username}\n📌 Status : Pending\n━━━━━━━━━━━━━━━━━━\nwww.pandawa-digital.com`;
    } else if (tipe === 'topup') {
        text = `<b>✅ DEPOSIT BERHASIL</b>\n━━━━━━━━━━━━━━━━━━\n💳 Jumlah : Rp${new Intl.NumberFormat('id-ID').format(data.harga)}\n🕒 Waktu : ${t}\n👤 User : ${data.username}\n📌 Status : Berhasil\n━━━━━━━━━━━━━━━━━━\nwww.pandawa-digital.com`;
    }
    text = text.replace(/ICS/gi,'(***)').replace(/KHFY/gi,'(****)').replace(/KAJE/gi,'(****)');
    fetch(`https://api.telegram.org/bot${botToken}/sendMessage`, {
        method:"POST", headers:{"Content-Type":"application/json"},
        body: JSON.stringify({chat_id:chatId, message_thread_id:threadId, text, parse_mode:"HTML"})
    }).catch(()=>{});
};

// ===== CONFIG =====
window.getMarkupValue = (val, basePrice) => {
    if (!val) return 0;
    const s = String(val).trim();
    if (s.includes('%')) return Math.ceil(basePrice * (parseFloat(s.replace('%','').replace(',','.'))||0) / 100);
    return parseInt(s.replace(/[^0-9-]/g,''))||0;
};

window.fetchConfig = async function() {
    try {
        if (!window.db) return;
        const d = await getDoc(doc(db,"pengaturan","config"));
        if (d.exists()) {
            const cfg = d.data();
            window.whatsappAdmin = cfg.wa || "628xxx";
            window.isTopupAuto = false;
            window.hidePoAkrab = cfg.hidePoAkrab;
            window.maintenanceAkrabSpesial = cfg.maintenanceAkrabSpesial;
            window.maintenanceQris = cfg.maintenanceQris;
            window.maintenanceQrisGopay = cfg.maintenanceQrisGopay;
            window.maintenanceGopayTf = cfg.maintenanceGopayTf;
            window.maintenanceTotal = cfg.maintenanceTotal;
            if (window.applyMaintenanceTotalLock && window.auth?.currentUser) window.applyMaintenanceTotalLock(window.auth.currentUser);

            const elAkrab = document.getElementById('menuAkrabAll');
            if (elAkrab) elAkrab.style.display = cfg.hideAkrabAll ? 'none' : 'block';
            const elPo = document.getElementById('menuPoAkrab');
            if (elPo) elPo.style.display = cfg.hidePoAkrab ? 'none' : 'block';

            const sv = cfg.appVersion||"";
            if (sv) {
                const lv = localStorage.getItem('appVersion');
                if (lv !== sv) {
                    const up = new URLSearchParams(location.search);
                    if (up.get('v') !== sv) { up.set('v',sv); location.href = location.pathname+'?'+up.toString(); return; }
                    else localStorage.setItem('appVersion', sv);
                }
            }
        }
        try {
            const mr = await fetch('markup/cachemarkup.json?v='+Date.now());
            const md = await mr.json();
            window.markupConfig = { General:0 };
            window.markupConfigArray = Array.isArray(md) ? md : [];
            window.markupWzProducts = {};
            if (Array.isArray(md)) {
                md.forEach(item => {
                    if (!item||typeof item!=='object') return;
                    if (item.kode_produk) window.markupConfig[String(item.kode_produk).toUpperCase()] = item.markup;
                    if (item.markup_key) window.markupConfig[String(item.markup_key).toUpperCase()] = item.markup;
                    if (item.nama_produk) window.markupConfig[item.nama_produk] = item.markup;
                });
            } else if (md && typeof md === 'object') {
                Object.keys(md).forEach(key => {
                    if (key==='wz_products' && md[key] && typeof md[key]==='object') {
                        Object.keys(md[key]).forEach(code => {
                            const row = md[key][code];
                            const m = row && typeof row==='object' ? row.markup : row;
                            window.markupConfig[String(code).toUpperCase()] = m;
                            window.markupWzProducts[String(code).toUpperCase()] = m;
                        });
                    } else {
                        const val = md[key];
                        window.markupConfig[key] = val && typeof val==='object' && 'markup' in val ? val.markup : val;
                    }
                });
            }
        } catch(_) {}
    } catch(e) { console.error("Config Error:",e); }
};

window.isAdminUser = user => user && (user.email==='doni888855519@gmail.com'||user.email==='suwarno8797@gmail.com');
window.isMaintenanceOn = v => v===true||v==='true'||v===1||v==='1'||v==='YA'||v==='ya'||v==='yes';

window.blockMaintenanceTopupMethod = function(method, user) {
    if (!method) return false;
    const code = String(method.code||method.id||'').toUpperCase();
    const name = String(method.name||'').toUpperCase();
    if ((code==='QRIS_GOPAY'||code==='QRISGOPAY'||name.includes('QRIS GOPAY')) && window.isMaintenanceOn(window.maintenanceQrisGopay)) {
        window.showNotice('error','Maintenance','QRIS GoPay Otomatis sedang diperbaiki. Gunakan metode lain.'); return true;
    }
    if ((code==='GOPAY_TF'||code==='GOPAYTF'||name.includes('TRANSFER GOPAY')) && window.isMaintenanceOn(window.maintenanceGopayTf)) {
        window.showNotice('error','Maintenance','Transfer GoPay Otomatis sedang diperbaiki. Gunakan metode lain.'); return true;
    }
    return false;
};

window.applyMaintenanceTotalLock = function(user) {
    const old = document.getElementById('maintenanceTotalOverlay');
    if (old) old.remove();
    if (!window.isMaintenanceOn(window.maintenanceTotal)) { document.body.style.overflow=''; return false; }
    const lock = document.createElement('div');
    lock.id = 'maintenanceTotalOverlay';
    lock.style.cssText = 'position:fixed;inset:0;z-index:999999999;background:linear-gradient(135deg,#7f1d1d,#dc2626);display:flex;align-items:center;justify-content:center;padding:22px;box-sizing:border-box;color:white;text-align:center;';
    lock.innerHTML = `<div style="width:100%;max-width:420px;background:rgba(255,255,255,0.12);border:1px solid rgba(255,255,255,0.22);border-radius:26px;padding:28px 22px;box-shadow:0 20px 60px rgba(0,0,0,0.28);backdrop-filter:blur(12px);"><div style="width:76px;height:76px;border-radius:50%;background:rgba(255,255,255,0.18);display:flex;align-items:center;justify-content:center;margin:0 auto 18px;font-size:34px;"><i class="fas fa-tools"></i></div><h2 style="margin:0 0 10px;font-size:24px;font-weight:900;">Website Sedang Maintenance</h2><p style="margin:0;font-size:14px;line-height:1.7;">Mohon maaf, layanan sedang dalam pemeliharaan total.</p><div style="margin-top:18px;font-size:12px;opacity:0.8;">Silakan coba kembali beberapa saat lagi.</div></div>`;
    document.body.appendChild(lock);
    document.body.style.overflow = 'hidden';
    return true;
};

// ===== AUTH STATE LISTENER =====
let unsubscribeRiwayat = null;
let allRiwayatData = [];
let filteredRiwayatData = [];
let currentRiwayatPage = 1;
const itemsPerPage = 10;

onAuthStateChanged(auth, async (user) => {
    const ao = document.getElementById('authOverlay');
    const mc = document.getElementById('mainAppContent');
    const loader = document.getElementById('globalLoader');

    if (user) {
        ao.style.display = 'none';
        if (loader) { loader.style.display = 'flex'; loader.style.opacity = '1';
            setTimeout(() => { loader.style.opacity = '0'; setTimeout(() => { loader.style.display = 'none'; }, 500); }, 800); }
        mc.style.display = 'block';

        document.querySelector('.header')?.style?.setProperty?.('display','block');
        document.querySelector('.saldo-box')?.style?.setProperty?.('display','flex');
        document.getElementById('shop-container')?.style?.setProperty?.('display','grid');
        document.getElementById('liveHistoryHeader')?.style?.setProperty?.('display','flex');

        if (window.navSwitch) window.navSwitch('home', document.querySelector('.nav-item'));

        await window.fetchConfig();
        if (window.applyMaintenanceTotalLock && window.applyMaintenanceTotalLock(user)) return;

        try {
            const userRef = doc(db,"users",user.uid);
            const snap = await getDoc(userRef);
            if (!snap.exists()) {
                await setDoc(userRef, { username: user.displayName||(user.email?user.email.split('@')[0]:"Pengguna"), nama: user.displayName||"Pengguna", whatsapp:"", email:user.email||"", saldo:0, createdAt: serverTimestamp() });
            }
        } catch(_) {}

        loadUserBalance(user.uid);
        setTimeout(() => { initRiwayatListener(user); window.checkBroadcast(user); }, 100);
        setTimeout(() => { if (window.initTransferListener) window.initTransferListener(user); }, 500);

        (async () => {
            try {
                const snap = await getDoc(doc(db,"users",user.uid));
                if (snap.exists()) {
                    const s = snap.data().saldo||0;
                    const res = await (await fetch('doniguard.php', { method:'POST', headers:{'Content-Type':'application/json'}, body: JSON.stringify({ uid:user.uid, action:'check', produk:'AUDIT_LOGIN', nominal:0, saldo_akhir_client:s }) })).json();
                    if (res.status==='success' && res.audit?.force_sync) {
                        await updateDoc(doc(db,"users",user.uid), { saldo: parseInt(res.audit.correct_balance) });
                        location.reload();
                    }
                }
            } catch(_) {}
        })();
    } else {
        ao.style.display = 'flex';
        mc.style.display = 'none';
        const btn = document.getElementById('btnLogin');
        if (btn) { btn.innerHTML = 'Login <i class="fas fa-arrow-right"></i>'; btn.disabled = false; btn.style.opacity = '1'; btn.style.cursor = 'pointer'; }
        if (loader) loader.style.display = 'none';
        document.getElementById('maintenanceTotalOverlay')?.remove();
        document.body.style.overflow = '';
    }
});

function loadUserBalance(uid) {
    onSnapshot(doc(db,"users",uid), d => {
        if (!d.exists()) return;
        const data = d.data();

        if (data.role === 'merchant_h2h') {
            document.querySelector('.header')?.style?.setProperty?.('display','none');
            document.querySelector('.saldo-box')?.style?.setProperty?.('display','none');
            document.getElementById('shop-container')?.style?.setProperty?.('display','none');
            document.querySelector('.bottom-nav')?.style?.setProperty?.('display','none');
            document.querySelector('.chat-fab')?.style?.setProperty?.('display','none');
            document.getElementById('appBanner')?.style?.setProperty?.('display','none');
            const hDash = document.getElementById('h2hDashboard');
            if (hDash) {
                hDash.style.display = 'block';
                document.getElementById('h2hName').innerText = data.username||data.nama||"Merchant H2H";
                document.getElementById('h2hSaldo').innerText = "Rp "+new Intl.NumberFormat('id-ID').format(data.saldo||0);
                document.getElementById('h2hEmail').innerText = data.email||(auth.currentUser?.email)||"-";
                document.getElementById('h2hPhone').innerText = data.whatsapp||"-";
                document.getElementById('h2hApiKey').innerText = data.api_key||data.apikey||data.apiKey||"Belum ada API Key";
                document.getElementById('h2hJoin').innerText = data.createdAt ? new Date(data.createdAt.seconds*1000).toLocaleDateString('id-ID') : "-";
            }
        } else {
            document.querySelector('.bottom-nav')?.style?.setProperty?.('display','flex');
            document.querySelector('.chat-fab')?.style?.setProperty?.('display', data.chat_disabled ? 'none' : 'flex');
        }

        const sv = document.getElementById('saldoValue');
        if (sv) sv.innerText = "Rp "+new Intl.NumberFormat('id-ID').format(data.saldo||0);
        const hn = document.getElementById('headerName');
        if (hn) hn.innerText = data.username||data.nama||"Pengguna";
    });
}

window.toggleAuth = mode => {
    document.getElementById('loginForm').style.display = mode==='login' ? 'block' : 'none';
    document.getElementById('registerForm').style.display = mode==='register' ? 'block' : 'none';
};

window.togglePassword = (id, el) => {
    const inp = document.getElementById(id);
    if (inp.type === "password") { inp.type = "text"; el.classList.replace("fa-eye","fa-eye-slash"); el.style.color = "var(--primary)"; }
    else { inp.type = "password"; el.classList.replace("fa-eye-slash","fa-eye"); el.style.color = "#94a3b8"; }
};

window.handleLogin = async () => {
    const email = document.getElementById('logEmail').value;
    const pass = document.getElementById('logPass').value;
    const btn = document.getElementById('btnLogin');
    if (!email||!pass) return window.showNotice('error','Peringatan','Isi email dan password!');
    const orig = btn.innerHTML;
    btn.innerHTML = '<i class="fas fa-circle-notch fa-spin"></i> Memuat...';
    btn.disabled = true;
    try {
        await signInWithEmailAndPassword(auth, email, pass);
    } catch(e) {
        if (['auth/invalid-credential','auth/wrong-password','auth/user-not-found','auth/invalid-email'].includes(e.code))
            window.showNotice('error','Login Gagal','Periksa email/password anda.');
        else window.showNotice('error','Login Gagal',e.message);
        btn.innerHTML = orig; btn.disabled = false;
    }
};

window.handleRegister = async () => {
    const u = document.getElementById('regUsername').value.trim();
    const n = document.getElementById('regNama').value.trim();
    const w = document.getElementById('regWA').value.trim();
    const e = document.getElementById('regEmail').value.trim();
    const p = document.getElementById('regPass').value;
    const pc = document.getElementById('regPassConfirm').value;
    if (!u||!n||!w||!e||!p||!pc) return alert("Lengkapi semua data!");
    if (!/^[a-zA-Z0-9._%+-]+@(gmail\.com|yahoo\.com)$/.test(e)) return alert("Hanya @gmail.com / @yahoo.com!");
    if (p!==pc) return alert("Konfirmasi sandi tidak cocok!");
    if (p.length<6) return alert("Sandi minimal 6 karakter!");
    try {
        const res = await createUserWithEmailAndPassword(auth, e, p);
        await setDoc(doc(db,"users",res.user.uid), { username:u, nama:n, whatsapp:w, email:e, saldo:0, createdAt:serverTimestamp() });
        alert("Registrasi Berhasil!");
    } catch(err) { alert("Gagal: "+err.message); }
};

window.handleResetPassword = () => {
    const e = document.getElementById('logEmail').value;
    if (!e) return alert("Masukkan email di kolom Login!");
    sendPasswordResetEmail(auth, e).then(()=>alert("Link reset dikirim ke email!")).catch(err=>alert(err.message));
};
window.handleLogout = () => signOut(auth);

window.handleGoogleLogin = async () => {
    const provider = new GoogleAuthProvider();
    try {
        if (typeof AndroidShare !== 'undefined') { await signInWithRedirect(auth, provider); return; }
        const result = await signInWithPopup(auth, provider);
        const user = result.user;
        const ref = doc(db,"users",user.uid);
        if (!(await getDoc(ref)).exists()) {
            await setDoc(ref, { username:user.displayName||"User", nama:user.displayName||"User", whatsapp:"", email:user.email, saldo:0, createdAt:serverTimestamp() });
        }
        window.showNotice('success','Berhasil','Selamat datang!');
    } catch(e) { window.showNotice('error','Login Gagal','Gagal masuk dengan Google.'); }
};

// ===== SHOP =====
window.allProductsData = []; window.currentProduct = {}; window.checkoutItem = null;

onSnapshot(collection(db,"produk"), snap => {
    window.allProductsData = [];
    snap.forEach(d => { const data = d.data(); data.id = d.id; window.allProductsData.push(data); });
    renderHomeShop();
});

function createProductCard(data) {
    const isFisik = data.tipe==='fisik'||(data.kategori&&data.kategori.includes('FISIK'));
    const action = isFisik ? `bukaDetailProduk('${data.id}')` : `siapkanInvoice('${data.kode||data.id}','${data.nama}',${data.harga})`;
    return `<div class="product-card" onclick="${action}" style="cursor:pointer;">
        <img src="${data.img||'https://via.placeholder.com/150'}" style="width:100%;height:120px;object-fit:cover;background:#eee;">
        <div class="product-info">
            <div style="font-size:12px;font-weight:700;margin-bottom:4px;line-height:1.2;height:28px;overflow:hidden;">${data.nama}</div>
            <div style="font-size:13px;color:var(--primary);font-weight:700;">Rp ${new Intl.NumberFormat('id-ID').format(data.harga)}</div>
            ${isFisik?'<div style="font-size:9px;background:#eee;color:#555;display:inline-block;padding:2px 6px;border-radius:4px;margin-top:2px;"><i class="fas fa-box"></i> Fisik</div>':''}
            <button class="btn-buy-shop" style="margin-top:8px;">Beli</button>
        </div>
    </div>`;
}

function renderHomeShop() {
    const div = document.getElementById('shop-container');
    const display = window.allProductsData.slice(0,6);
    let html = display.map(d=>createProductCard(d)).join('');
    if (window.allProductsData.length>6) html += `<div style="grid-column:1/-1;"><div class="btn-see-more" onclick="navSwitch('shop_full')">Tampilkan Semua <i class="fas fa-arrow-right"></i></div></div>`;
    div.innerHTML = html;
}

window.renderFullShop = (override=null) => {
    const div = document.getElementById('fullShopContainer');
    const src = override||window.allProductsData;
    if (!src||!src.length) { div.innerHTML = '<div style="grid-column:1/-1;text-align:center;padding:40px;color:#999;">Tidak ada produk</div>'; return; }
    div.innerHTML = src.map(d=>{
        const isFisik = d.tipe==='fisik'||(d.kategori&&d.kategori.includes('FISIK'));
        const action = isFisik ? `bukaDetailProduk('${d.id}')` : `siapkanInvoice('${d.kode||d.id}','${d.nama}',${d.harga})`;
        return `<div class="product-card" onclick="${action}">
            <img src="${d.img||'https://via.placeholder.com/150'}" style="width:100%;height:140px;object-fit:cover;background:#eee;">
            <div class="product-info"><div style="font-size:12px;font-weight:700;margin-bottom:4px;line-height:1.2;">${d.nama}</div>
            <div style="font-size:13px;color:var(--primary);font-weight:700;">Rp ${new Intl.NumberFormat('id-ID').format(d.harga)}</div>
            ${isFisik?'<div style="font-size:10px;color:#999;"><i class="fas fa-box"></i> Fisik</div>':''}
            <button class="btn-buy-shop" style="margin-top:8px;">Beli</button></div></div>`;
    }).join('');
};

window.handleShopSearch = kw => {
    if (!kw) return window.renderFullShop();
    const q = kw.toLowerCase();
    window.renderFullShop(window.allProductsData.filter(p=>p.nama.toLowerCase().includes(q)));
};

// ===== HISTORY LISTENER =====
function initRiwayatListener(user) {
    if (unsubscribeRiwayat) unsubscribeRiwayat();
    const q = query(collection(db,"users",user.uid,"riwayat_transaksi"), orderBy("timestamp","desc"), limit(10));
    unsubscribeRiwayat = onSnapshot(q, snap => {
        const container = document.getElementById('riwayat-container');
        let html = '';
        snap.forEach(docSnap => {
            const data = docSnap.data();
            const idDoc = docSnap.id;
            const st = (data.status||'').toString().trim().toUpperCase();

            if (st==='PENDING') {
                if (data.is_po===true) { /* wait */ }
                else if (data.kode_produk==='TOPUP') {
                    if (data.metode==='QRIS_AUTO' && window.cekStatusQiospayBerkala) window.cekStatusQiospayBerkala(idDoc, data.harga);
                    else if ((data.metode==='QRIS_GOPAY'||data.metode==='GOPAY_TF') && window.startIndopayChecker) window.startIndopayChecker(idDoc, data.harga);
                    else if (window.cekStatusTopupBerkala) window.cekStatusTopupBerkala(idDoc, data.unique_code||data.trx_id);
                } else if (data.provider==='ICS' && window.monitorIcsTrx && !window['monitor_'+idDoc]) {
                    window['monitor_'+idDoc]=true; window.monitorIcsTrx(data.trx_id, idDoc);
                } else if ((data.provider==='KAJE'||String(data.trx_id||'').startsWith('KJ')) && window.monitorKajeTrx && !window['monitor_'+idDoc]) {
                    window['monitor_'+idDoc]=true;
                    let id = data.trx_id;
                    if (data.sn?.includes('#KJ')) { const p = data.sn.split('#'); if (p.length>1) id = p[1].split(' ')[0].trim(); }
                    window.monitorKajeTrx(id, idDoc);
                } else if ((data.provider==='WZ'||String(data.trx_id||'').toLowerCase().startsWith('wz')) && window.monitorWzTrx && !window['monitor_'+idDoc]) {
                    window['monitor_'+idDoc]=true; window.monitorWzTrx(data.trx_id, idDoc);
                } else if (data.provider!=='KHFY' && window.cekStatusBerkala) {
                    window.cekStatusBerkala(idDoc, data.trx_id, data.tujuan, data.kode_produk);
                } else if (window.monitorKhfyTrx && !window['monitor_'+idDoc]) {
                    window['monitor_'+idDoc]=true; window.monitorKhfyTrx(data.trx_id, idDoc);
                }
            } else if ((st==='GAGAL'||st==='EXPIRED'||st==='CANCELED') && data.isRefunded!==true && data.kode_produk!=='TOPUP' && data.status_awal==='PENDING' && window.updateFirestoreStatus) {
                window.updateFirestoreStatus(idDoc, st, data.sn, data.raw_json, true);
            }

            const wt = data.timestamp ? data.timestamp.toDate().toLocaleTimeString('id-ID').slice(0,5) : '';
            const ds = encodeURIComponent(JSON.stringify({idDoc,...data,waktu:wt}));
            let icon = 'fa-receipt';
            const pl = (data.produk||'').toLowerCase();
            if (pl.includes('pulsa')||pl.includes('telkomsel')||pl.includes('indosat')) icon='fa-mobile-alt';
            else if (pl.includes('pln')||pl.includes('token')) icon='fa-bolt';
            else if (pl.includes('dana')||pl.includes('gopay')||pl.includes('ovo')||pl.includes('shopee')) icon='fa-wallet';
            else if (pl.includes('game')||pl.includes('diamond')||pl.includes('ff')) icon='fa-gamepad';

            html += `<div class="history-card" id="card-${idDoc}">
                <div class="area-chk-masal" style="display:none;margin-right:12px;">
                    <input type="checkbox" class="chk-masal" value="${encodeURIComponent(JSON.stringify(data))}" onchange="updateButtonMasal()" style="transform:scale(1.3);accent-color:var(--primary);">
                </div>
                <div style="flex:1;display:flex;align-items:center;width:100%;" onclick="if(!window.isModeMasal) bukaDetailRiwayat('${ds}')">
                    <div class="h-icon"><i class="fas ${icon}"></i></div>
                    <div class="h-content"><div class="h-prod">${data.produk}</div>
                        <div class="h-date"><i class="far fa-clock"></i> ${wt} &bull; ${data.tujuan}</div></div>
                    <div class="h-right"><div class="h-price">Rp ${new Intl.NumberFormat('id-ID').format(data.harga)}</div>
                        <div class="h-badge bg-${data.status}">${data.status}</div></div>
                </div>
            </div>`;
        });
        container.innerHTML = html || "<p style='text-align:center;font-size:11px;color:#999;padding:10px;'>Belum ada transaksi.</p>";
    });
}

// ===== SHOW NOTICE =====
window.showNotice = function(type, title, msg) {
    const modal = document.getElementById('modalNotice');
    const icon = document.getElementById('noticeIcon');
    const mTitle = document.getElementById('noticeTitle');
    const mMsg = document.getElementById('noticeMsg');
    const btn = document.getElementById('btnNoticeClose');

    icon.className = 'notice-icon';
    if (type==='success') { icon.innerHTML='<i class="fas fa-check-circle icon-success"></i>'; btn.style.display='block'; }
    else if (type==='error') { icon.innerHTML='<i class="fas fa-times-circle icon-error"></i>'; btn.style.display='block'; }
    else if (type==='loading') { icon.innerHTML='<i class="fas fa-circle-notch fa-spin icon-loading"></i>'; btn.style.display='none'; }
    mTitle.innerText = title||'';
    mMsg.innerText = msg||'';
    modal.style.display = 'flex';
};

window.tutupNotice = function() {
    document.getElementById('modalNotice').style.display='none';
};

window.bersihkanPesan = function(txt) {
    let m = txt;
    try { m = JSON.parse(txt).body_respon||txt; } catch(_) {}
    if (m.includes("kodereseller=")||m.includes("password=")) {
        m = m.includes("#") ? m.slice(m.indexOf("#")+1).trim() : "Transaksi Gagal dari Provider";
    }
    m = m.replace(/\.?\s*Saldo\s+[\d\.,\s\-\=]+(@\d{2}:\d{2})?/gi,"").replace(/Hrg\s+[\d\.,]+/gi,"");
    return m.trim();
};

// ===== CHECK STATUS INTERVALS =====
window.intervalCek = window.intervalCek || {};

window.cekStatusBerkala = function(idDoc, trxId, tujuan, kode) {
    if (window.intervalCek[idDoc]) return;
    window.intervalCek[idDoc] = setInterval(async () => {
        try {
            const res = await (await fetch('cek_status.php', { method:'POST', body:JSON.stringify({refID:trxId, tujuan, kode_produk:kode}) })).json();
            const st = (res.status||'').toString().trim().toUpperCase();
            if (st!=='PENDING') {
                clearInterval(window.intervalCek[idDoc]); delete window.intervalCek[idDoc];
                const psn = window.bersihkanPesan(res.sn);
                if (window.updateFirestoreStatus) window.updateFirestoreStatus(idDoc, st, psn, JSON.stringify(res));
            }
        } catch(_) {}
    }, 10000);
};

window.cekStatusQiospayBerkala = function(idDoc, nominal) {
    if (window.intervalCek[idDoc]) return;
    window.intervalCek[idDoc] = setInterval(async () => {
        try {
            const res = await (await fetch('cek_topup.php', { method:'POST', headers:{'Content-Type':'application/json'}, body:JSON.stringify({nominal, docId:idDoc}) })).json();
            if (res.status==='success') {
                clearInterval(window.intervalCek[idDoc]); delete window.intervalCek[idDoc];
                const user = auth.currentUser;
                if (!user) return;
                const trxRef = doc(db,"users",user.uid,"riwayat_transaksi",idDoc);
                const trxSnap = await getDoc(trxRef);
                if (trxSnap.exists() && (trxSnap.data().status==='BERHASIL'||trxSnap.data().status==='Sukses')) return;
                if (window.updateFirestoreStatus) window.updateFirestoreStatus(idDoc, "BERHASIL", "Topup QRIS Otomatis", JSON.stringify(res));
                if (window.triggerDoniGuard) window.triggerDoniGuard({ trx_id:'QRIS-'+idDoc, action:'topup', produk:'TOPUP QRIS', nominal:parseInt(nominal), saldo_akhir_client:0 });
                window.showNotice('success','Berhasil','Topup Rp '+new Intl.NumberFormat('id-ID').format(nominal)+' masuk!');
                setTimeout(()=>{ if (window.tutupModalTopup) window.tutupModalTopup(); }, 2000);
            }
        } catch(_) {}
    }, 10000);
};

window.cekStatusTopupBerkala = function(idDoc, uniqueCode) {
    if (!window.isTopupAuto) return;
    if (window.intervalCek[idDoc]) return;
    window.intervalCek[idDoc] = setInterval(async () => {
        try {
            const res = await (await fetch('paydisini_cek.php', { method:'POST', headers:{'Content-Type':'application/json'}, body:JSON.stringify({unique_code:uniqueCode}) })).json();
            if (res.success && res.data?.status==="Success") {
                clearInterval(window.intervalCek[idDoc]); delete window.intervalCek[idDoc];
                const user = auth.currentUser;
                if (!user) return;
                const nominal = parseInt(res.data.balance);
                window.updateFirestoreStatus(idDoc, "BERHASIL", "Topup Berhasil");
                if (window.triggerDoniGuard) window.triggerDoniGuard({ trx_id:uniqueCode, action:'topup', produk:'TOPUP', nominal, saldo_akhir_client:0 });
                window.showNotice('success','Topup Berhasil','Saldo Rp '+new Intl.NumberFormat('id-ID').format(nominal)+' Masuk.');
            } else if (res.success && (res.data?.status==="Canceled"||res.data?.status==="Expired")) {
                clearInterval(window.intervalCek[idDoc]); delete window.intervalCek[idDoc];
                window.updateFirestoreStatus(idDoc, "GAGAL", "Pembayaran Expired/Batal");
            }
        } catch(_) {}
    }, 10000);
};

// ===== MASS PRINT MODE =====
window.isModeMasal = false;
window.toggleModeMasal = function() {
    window.isModeMasal = !window.isModeMasal;
    const btn = document.getElementById('btnModeMasal');
    const chks = document.querySelectorAll('.area-chk-masal');
    const fab = document.getElementById('fabCetakMasal');
    if (window.isModeMasal) {
        btn.innerHTML = '<i class="fas fa-times"></i> Batalkan';
        btn.style.background = '#ff7675'; btn.style.color = 'white';
        chks.forEach(el=>el.style.display='block');
        fab.style.display = 'block';
        document.getElementById('riwayat-container').style.paddingBottom = '120px';
    } else {
        btn.innerHTML = '<i class="fas fa-print"></i> Cetak Masal';
        btn.style.background = '#dbeafe'; btn.style.color = '#1e3a8a';
        chks.forEach(el=>el.style.display='none');
        fab.style.display = 'none';
        document.getElementById('riwayat-container').style.paddingBottom = '10px';
        document.querySelectorAll('.chk-masal').forEach(c=>c.checked=false);
        updateButtonMasal();
    }
};
window.updateButtonMasal = function() {
    const n = document.querySelectorAll('.chk-masal:checked').length;
    document.getElementById('countMasal').innerText = n;
    const cs = document.getElementById('countMasalShare');
    if (cs) cs.innerText = n;
};
window.prosesShareMasal = function() { window.isShareMode=true; window.prosesPrintMasal(); };
window.prosesPrintMasal = function() {
    const cbs = document.querySelectorAll('.chk-masal:checked');
    if (!cbs.length) return alert("Pilih minimal 1 transaksi!");
    const items = [];
    cbs.forEach(cb=>{ try { items.push(JSON.parse(decodeURIComponent(cb.value))); } catch(_){} });
    generateStrukMasal(items);
};
function generateStrukMasal(items) {
    window.activePrintData = items;
    window.activePrintType = 'mass';
    const inputM = document.getElementById('inputLiveMarkup');
    if (inputM) inputM.value = window.printerSettings?.markup||0;
    const markup = parseInt(window.printerSettings?.markup)||0;
    const w = window.printerSettings?.paperSize==='58'?32:48;
    const line = '-'.repeat(w);
    const d = new Date();
    const ds = d.toLocaleDateString('id-ID');
    const ts = d.toLocaleTimeString('id-ID').slice(0,5);
    const center = txt=>{ if(!txt) return ''; let r=''; for(const l of txt.split('\n')){ let rem=l; while(rem.length>0){ const ch=rem.slice(0,w); rem=rem.slice(w); r+=' '.repeat(Math.max(0,Math.floor((w-ch.length)/2)))+ch+'\n'; } } return r.replace(/\n$/,''); };
    const lr = (left,right)=>{ left=String(left); right=String(right); let o='', r=left, ml=w-right.length-1; while(r.length>0){ if(r.length<=ml){ o+=r+' '.repeat(w-r.length-right.length)+right; r=''; } else { o+=r.slice(0,ml)+'\n'; r=r.slice(ml); } } return o; };
    let rec = '';
    rec += center((window.printerSettings?.storeName||'TOKO').toUpperCase())+'\n';
    if (window.printerSettings?.address) rec += center(window.printerSettings.address)+'\n';
    rec += line+'\n'+center('STRUK REKAPITULASI')+'\n'+center(ds+' '+ts)+'\n'+line+'\n';
    let total = 0;
    items.forEach((item,i)=>{
        const raw = parseInt(item.harga)+markup;
        const h = Math.ceil(raw/500)*500;
        total += h;
        rec += `${i+1}. ${item.produk}\n${lr(item.tujuan||'-','Rp '+new Intl.NumberFormat('id-ID').format(h))}\n`;
    });
    rec += line+'\n'+lr(`TOTAL (${items.length} Trx)`,'Rp '+new Intl.NumberFormat('id-ID').format(total))+'\n'+line+'\n';
    if (window.printerSettings?.footer) rec += center(window.printerSettings.footer)+'\n';
    rec += center('Dicetak Masal')+'\n\n\n';
    window.currentReceiptData = rec;
    document.getElementById('printPreviewArea').innerText = rec;
    document.getElementById('modalPrintPreview').style.display = 'flex';
    window.updatePrintButtonState();
}

// ===== ARCHIVE HISTORY =====
window.bukaRiwayatArsip = async (force=false) => {
    const user = auth.currentUser;
    if (!user) return;
    document.getElementById('modalArsip').style.display = 'flex';
    const area = document.getElementById('listArsipArea');
    if (allRiwayatData.length>0 && !force) { window.terapkanFilterRiwayat(); return; }
    area.innerHTML = "<div style='text-align:center;padding:40px;'><i class='fas fa-circle-notch fa-spin' style='font-size:24px;color:var(--primary);'></i><p>Memuat Riwayat...</p></div>";
    try {
        allRiwayatData = [];
        const q = query(collection(db,"users",user.uid,"riwayat_transaksi"), orderBy("timestamp","desc"));
        const snap = await getDocs(q);
        snap.forEach(d=>{ const d2 = d.data(); d2.fireId = d.id; allRiwayatData.push(d2); });
        snap = await getDocs(query(collection(db,"users",user.uid,"riwayat_topup"), orderBy("timestamp","desc")));
        snap.forEach(d=>{ const d2 = d.data(); d2.fireId = d.id; allRiwayatData.push(d2); });
        allRiwayatData.sort((a,b)=>(b.timestamp?.seconds||0)-(a.timestamp?.seconds||0));
        window.terapkanFilterRiwayat();
    } catch(e) { area.innerHTML = "<div style='text-align:center;color:red;padding:20px;'>Gagal memuat riwayat.</div>"; }
};

window.terapkanFilterRiwayat = function() {
    const search = (document.getElementById('searchRiwayat')?.value||'').toLowerCase();
    const tgl = document.getElementById('filterTgl')?.value||'';
    const status = document.getElementById('filterStatus')?.value||'SEMUA';
    filteredRiwayatData = allRiwayatData.filter(d=>{
        if (search && !((d.produk||'').toLowerCase().includes(search)||(d.trx_id||'').toLowerCase().includes(search)||(d.tujuan||'').includes(search))) return false;
        if (tgl && d.timestamp) { const dd = new Date(d.timestamp.seconds*1000).toISOString().slice(0,10); if (dd!==tgl) return false; }
        if (status!=='SEMUA' && (d.status||'').toUpperCase()!==status) return false;
        return true;
    });
    currentRiwayatPage = 1;
    renderRiwayatPage();
};

function renderRiwayatPage() {
    const area = document.getElementById('listArsipArea');
    const start = (currentRiwayatPage-1)*itemsPerPage;
    const pageData = filteredRiwayatData.slice(start, start+itemsPerPage);
    let html = pageData.map(d=>{
        const wt = d.timestamp ? new Date(d.timestamp.seconds*1000).toLocaleString('id-ID') : '';
        return `<div class="history-card" onclick="bukaDetailRiwayat('${encodeURIComponent(JSON.stringify({...d,waktu:wt}))}')">
            <div class="h-icon"><i class="fas fa-receipt"></i></div>
            <div class="h-content"><div class="h-prod">${d.produk}</div>
                <div class="h-date">${wt}</div></div>
            <div class="h-right"><div class="h-price">Rp ${new Intl.NumberFormat('id-ID').format(d.harga)}</div>
                <div class="h-badge bg-${d.status}">${d.status}</div></div>
        </div>`;
    }).join('') || "<div style='text-align:center;padding:20px;color:#999;'>Tidak ada riwayat.</div>";
    area.innerHTML = html;
    const totalPages = Math.ceil(filteredRiwayatData.length/itemsPerPage);
    let pag = '';
    for (let i=1; i<=totalPages; i++) pag += `<div class="page-num ${i===currentRiwayatPage?'active':''}" onclick="currentRiwayatPage=${i};renderRiwayatPage();">${i}</div>`;
    document.getElementById('paginationRiwayat').innerHTML = pag;
}

// ===== EXPORTS for non-module scripts =====
window.loadUserBalance = loadUserBalance;
window.initRiwayatListener = initRiwayatListener;
window.renderHomeShop = renderHomeShop;
window.createProductCard = createProductCard;
window.updateFirestoreStatus = async function(idDoc, status, sn, raw, isRefund) {
    const user = auth.currentUser;
    if (!user) return;
    const ref = doc(db,"users",user.uid,"riwayat_transaksi",idDoc);
    const snap = await getDoc(ref);
    if (!snap.exists()) return;
    const cur = (snap.data().status||'').toUpperCase();
    if (cur==='BERHASIL'||cur==='SUKSES') return;
    const updateData = { status, sn, raw_json: raw||'' };
    if (isRefund) updateData.isRefunded = true;
    await updateDoc(ref, updateData);
    if (isRefund) {
        const amount = parseInt(snap.data().harga||0);
        const uRef = doc(db,"users",user.uid);
        const uSnap = await getDoc(uRef);
        await updateDoc(uRef, { saldo: (uSnap.data().saldo||0)+amount });
    }
};
window.refreshRiwayatArsip = () => window.bukaRiwayatArsip(true);
window.tutupRiwayatArsip = () => document.getElementById('modalArsip').style.display='none';
window.bukaDetailRiwayat = function(str) {
    const data = JSON.parse(decodeURIComponent(str));
    const st = (data.status||'').toUpperCase();
    const iconBg = st==='BERHASIL'?'var(--success)':st==='PENDING'?'var(--warning)':'var(--danger)';
    const html = `<div class="receipt-header">
        <div class="receipt-icon" style="background:${iconBg}"><i class="fas ${st==='BERHASIL'?'fa-check-circle':st==='PENDING'?'fa-clock':'fa-times-circle'}"></i></div>
        <div class="receipt-status" style="color:${iconBg}">${data.status||'-'}</div>
        <div class="receipt-amount">Rp ${new Intl.NumberFormat('id-ID').format(data.harga)}</div>
    </div>
    <div class="detail-item"><span>Produk</span><span class="detail-val">${data.produk||'-'}</span></div>
    <div class="detail-item"><span>Tujuan</span><span class="detail-val">${data.tujuan||'-'}</span></div>
    <div class="detail-item"><span>ID Transaksi</span><span class="detail-val">${data.trx_id||data.fireId||'-'}</span></div>
    <div class="detail-item"><span>Waktu</span><span class="detail-val">${data.waktu||'-'}</span></div>
    ${data.sn?`<div class="sn-container"><span class="sn-text">${data.sn}</span><div class="btn-copy" onclick="navigator.clipboard.writeText('${data.sn.replace(/'/g,"\\'")}');alert('Disalin!')"><i class="fas fa-copy"></i></div></div>`:''}
    <button class="btn-batal" onclick="document.getElementById('modalDetailRiwayat').style.display='none'" style="margin-top:20px;">TUTUP</button>`;
    document.getElementById('detailRiwayatContent').innerHTML = html;
    document.getElementById('modalDetailRiwayat').style.display = 'flex';
};
window.tutupModal = function() { document.getElementById('modalApp').style.display='none'; };
window.tutupInvoice = function() { document.getElementById('modalInvoice').style.display='none'; };
window.kembaliKeFilter = function() {
    document.getElementById('inputContainer').style.display='none';
    document.getElementById('btnKembali').style.display='none';
    document.getElementById('areaFilter').style.display='grid';
    document.getElementById('listProdukArea').style.display='block';
};
window.toggleMenuLainnya = function() {
    document.getElementById('menuDrawer').classList.toggle('expanded');
    const b = document.getElementById('btnMore');
    b.innerHTML = document.getElementById('menuDrawer').classList.contains('expanded') ? '<i class="fas fa-chevron-up"></i> Sembunyikan' : '<i class="fas fa-chevron-down"></i> Menu Lainnya';
};

// ===== MODAL APP / PRODUK =====
window.bukaMenu = async function(kategori) {
    if (kategori==='Paket Akrab All') {
        document.getElementById('akrabUI').style.display='block';
        document.getElementById('defaultModalHeader').style.display='none';
        document.getElementById('inputContainer').style.display='none';
        document.getElementById('modalApp').style.display='flex';
        document.getElementById('judulMenu').innerText = 'Paket Akrab All';
        window.loadGabunganData();
        return;
    }
    document.getElementById('akrabUI').style.display='none';
    document.getElementById('defaultModalHeader').style.display='flex';
    document.getElementById('judulMenu').innerText = kategori;
    document.getElementById('modalApp').style.display='flex';
    document.getElementById('inputContainer').style.display='block';
    document.getElementById('btnKembali').style.display='none';
    document.getElementById('operatorBadge').style.display='none';
    document.getElementById('areaBebasNominal').style.display='none';
    document.getElementById('areaFilter').innerHTML = '';
    document.getElementById('listProdukArea').innerHTML = '<div style="text-align:center;padding:40px;"><i class="fas fa-circle-notch fa-spin"></i> Memuat produk...</div>';

    try {
        const res = await (await fetch(`produk.php?kategori=${kategori}`)).json();
        if (res.success && res.data) {
            window.produkData = res.data;
            renderFilterButtons(kategori);
        } else {
            document.getElementById('listProdukArea').innerHTML = '<div style="text-align:center;padding:20px;color:#999;">Tidak ada produk</div>';
        }
    } catch(e) {
        document.getElementById('listProdukArea').innerHTML = '<div style="text-align:center;color:red;padding:20px;">Gagal memuat produk.</div>';
    }
};

function renderFilterButtons(kategori) {
    const brands = [...new Set(window.produkData.map(p=>p.brand||p.operator||'Lainnya'))];
    let html = brands.map(b => `<div class="filter-card" onclick="filterByBrand('${b}',this)"><span>${b}</span></div>`).join('');
    document.getElementById('areaFilter').innerHTML = html;
    if (brands.length>0) filterByBrand(brands[0], document.querySelector('.filter-card'));
}

window.filterByBrand = function(brand, el) {
    document.querySelectorAll('.filter-card').forEach(e=>e.classList.remove('active'));
    if (el) el.classList.add('active');
    const filtered = window.produkData.filter(p=>(p.brand||p.operator||'Lainnya')===brand);
    let html = filtered.map(p => `<div class="item-produk" onclick="siapkanInvoice('${p.kode||p.id}','${p.nama}',${parseInt(p.harga)})">
        <div><div style="font-weight:700;font-size:13px;">${p.nama}</div><div style="font-size:10px;color:#999;">${p.kode||''}</div></div>
        <div style="font-weight:700;color:var(--primary);font-size:14px;">Rp ${new Intl.NumberFormat('id-ID').format(parseInt(p.harga))}</div>
    </div>`).join('');
    document.getElementById('listProdukArea').innerHTML = html||'<div style="text-align:center;padding:20px;color:#999;">Kosong</div>';
};

window.siapkanInvoice = function(kode, nama, harga) {
    window.currentInvoiceData = { kode, nama, baseHarga: parseInt(harga) };
    document.getElementById('judulMenu').innerText = 'Konfirmasi';
    document.getElementById('inputContainer').style.display='block';
    document.getElementById('areaFilter').style.display='none';
    document.getElementById('listProdukArea').style.display='none';
    document.getElementById('btnKembali').style.display='flex';
};

// ===== PLACEHOLDER for remaining functions =====
window.bukaDetailProduk = function(id) { alert('Detail produk: '+id); };
window.bukaModalTopup = function() { document.getElementById('modalTopup').style.display='flex'; };
window.tutupModalTopup = function() { document.getElementById('modalTopup').style.display='none'; };
window.backTopupStep = function() {};
window.bukaModalTransfer = function(t) {
    document.getElementById('transferTitle').innerText = t==='kirim'?'Kirim Saldo':'Minta Saldo';
    document.getElementById('modalTransfer').style.display='flex';
};
window.showMyQR = async function() {
    const user = auth.currentUser;
    if (!user) return alert('Login dulu!');
    const snap = await getDoc(doc(db,"users",user.uid));
    const data = snap.data();
    const info = data.email||data.username;
    document.getElementById('myQrImage').src = "https://quickchart.io/qr?text="+encodeURIComponent(info)+"&size=300";
    document.getElementById('myQrInfo').innerText = data.username||data.nama||info;
    document.getElementById('modalMyQR').style.display = 'flex';
};
window.openQRScanner = function() {
    document.getElementById('modalQRScanner').style.display = 'flex';
    if (!window.html5QrCode) window.html5QrCode = new Html5Qrcode("qr-reader");
    if (!window.html5QrCode.isScanning) {
        const cfg = { fps:10, qrbox:{width:250,height:250} };
        window.html5QrCode.start({facingMode:"environment"}, cfg,
            decodedText=>{ window.closeQRScanner(); window.bukaModalTransfer('kirim'); const inp=document.getElementById('transferTarget'); if(inp){inp.value=decodedText;inp.readOnly=true;inp.style.background='#dbeafe';} },
            ()=>{}
        ).catch(()=>{
            window.html5QrCode.start({facingMode:"user"}, cfg, ()=>{}, ()=>{}).catch(()=>{
                document.getElementById('qr-reader').innerHTML = "<div style='color:red;padding:20px;text-align:center;background:white;border-radius:10px;'>Gagal akses kamera.</div>";
            });
        });
    }
};
window.closeQRScanner = function() {
    document.getElementById('modalQRScanner').style.display = 'none';
    if (window.html5QrCode?.isScanning) window.html5QrCode.stop().then(()=>window.html5QrCode.clear()).catch(()=>{});
};
window.navSwitch = function(page, el) {
    document.querySelectorAll('.full-page').forEach(p=>p.style.display='none');
    const targets = { home:['#shop-container','#liveHistoryHeader','#riwayat-container'], shop_full:['#pageAllProduk'], profil:['#pageProfil'], etalase:['#pageEtalase'], lapak:['#pageLapak'], pesanan_fisik:['#pagePesananFisik'] };
    if (page==='home') {
        document.getElementById('shop-container').style.display='grid';
        document.getElementById('liveHistoryHeader').style.display='flex';
        document.getElementById('riwayat-container').style.display='block';
        document.querySelector('.menu-container').style.display='block';
        document.querySelector('.saldo-box').style.display='flex';
        document.querySelector('.header').style.display='block';
    } else {
        const t = targets[page];
        if (t) t.forEach(id=>{ const e=document.querySelector(id); if(e) e.style.display='block'; });
        document.querySelector('.menu-container').style.display='none';
    }
    document.querySelectorAll('.nav-item').forEach(n=>n.classList.remove('active'));
    if (el) el.classList.add('active');
    else document.querySelector('.nav-item')?.classList.add('active');
};
window.bukaChatPublic = function() { document.getElementById('modalChatPublic').style.display='flex'; };
window.tutupChatPublic = function() { document.getElementById('modalChatPublic').style.display='none'; };
window.bukaPengaturanPrinter = function() { document.getElementById('modalPrinterSettings').style.display='flex'; };
window.simpanPengaturanPrinter = function() { alert('Disimpan!'); document.getElementById('modalPrinterSettings').style.display='none'; };
window.updateSettingsPreview = function() {};
window.updatePrintButtonState = function() {};
window.renderSinglePreview = function() {};
window.checkBroadcast = function() {};

// ===== REMAINING FUNCTIONS FOR AKRAB/KHFY/ICS/WZ =====
window.khfyData = []; window.icsData = []; window.wzData = [];
window.loadGabunganData = async function() {
    const areaList = document.getElementById('listProdukArea');
    const areaFilter = document.getElementById('areaFilter');
    window.khfyData = []; window.icsData = []; window.wzData = [];
    if (areaFilter) areaFilter.innerHTML = '';
    if (areaList) areaList.innerHTML = '<div style="text-align:center;padding:40px;"><i class="fas fa-circle-notch fa-spin"></i> Memuat paket...</div>';
    try {
        const [r1,r2,r3,r4] = await Promise.all([
            fetch('khfy_proxy.php?action=list').catch(()=>null),
            fetch('ics_proxy.php?action=list').catch(()=>null),
            fetch('kaje_proxy.php?api_action=get_products',{method:'POST',body:'{}'}).catch(()=>null),
            fetch('wz_proxy.php?action=products').catch(()=>null)
        ]);
        if (r1) { const j = await r1.json().catch(()=>({})); if (j.data) window.khfyData = j.data; }
        if (r3) { const j = await r3.json().catch(()=>({})); if (j?.success && j.data?.products) j.data.products.forEach(p=>{ if(p.code&&(p.code.startsWith('XDA')||p.code.startsWith('KDA'))){ const k=p.code.startsWith('XDA')?p.code.replace(/^XDA/,'KDA'):p.code; window.khfyData.push({kode_produk:k,kode_order_kaje:p.code,kode_produk_asli:p.code,nama_produk:(p.name||'').replace(/XDA/g,'KDA'),harga_final:p.price,gangguan:p.status==='gangguan'?1:0,kosong:p.status==='kosong'?1:0,deskripsi:(Array.isArray(p.description)?p.description.join('\n'):String(p.description||'')).replace(/XDA/g,'KDA'),provider_kaje:true,stok:p.stock}); }); }
        if (r2) { const j = await r2.json().catch(()=>({})); if (j.success && j.data) { j.data.forEach(i=>{ if(i.code==='CFMX') i.type='fmax'; }); window.icsData = j.data; } }
        if (r4) { const j = await r4.json().catch(()=>({})); if (j.success && Array.isArray(j.data)) window.wzData = j.data; }
        if (areaList) areaList.innerHTML = '<div style="text-align:center;padding:40px;color:#94a3b8;"><i class="fas fa-hand-pointer"></i><br>Pilih kategori paket</div>';
        window.renderGabunganFilters();
    } catch(e) { if (areaList) areaList.innerHTML = '<div style="text-align:center;color:red;padding:20px;">Gagal memuat produk.</div>'; }
};

window.getKhfyCategory = function(item) {
    const k = (item.kode_produk||'').toUpperCase();
    const p = (item.kode_provider||'').toUpperCase();
    if (['FMX50','FMX65','FMX80','FMX150'].includes(k)) return 'XL Data Reguler';
    if (k==='XLB75') return 'Akrab Fresh (XLA)';
    if (k.startsWith('KDA')) return 'KDA (PROMO)';
    if (k.startsWith('XDA')) return 'Akrab Fresh (XDA)';
    if (k.startsWith('XLA')) return 'Akrab Fresh (XLA)';
    if (k.startsWith('FMX')||k.startsWith('CFMX')) return 'FlexMax (FMX)';
    if (k.startsWith('CEKPLN')||p.includes('PLN')) return 'PLN Pascabayar';
    if (k.startsWith('XLB')||k.startsWith('XL')) return 'XL Data Reguler';
    if (k.startsWith('BPA')||k.startsWith('BPAL')) return 'Bonus Akrab';
    if (k.startsWith('TES')) return 'Tes System';
    return 'LAINNYA';
};

window.renderGabunganFilters = function() {
    const rawKhfy = Array.isArray(window.khfyData)?window.khfyData:[];
    const rawIcs = Array.isArray(window.icsData)?window.icsData:[];
    const brands = [...new Set(rawKhfy.map(i=>window.getKhfyCategory(i)))].filter(b=>b!=='Tes System'&&b!=='Akrab Fresh (XDA)'&&b!=='PLN Pascabayar'&&b!=='Bonus Akrab').sort();
    const types = [...new Set(rawIcs.map(i=>(i.type||'Lainnya').toUpperCase()))].filter(t=>!t.includes('FMAX')&&!t.includes('FLEXMAX')&&t!=='PLN Pascabayar'&&t!=='Akrab Fresh (XDA)'&&t!=='XLA').sort();
    let html = '<div class="akrab-section-title">Pilih Paket</div><div class="akrab-grid">';
    brands.forEach(b => { html += `<div class="akrab-btn" onclick="window.filterKhfy('${b}',this,false)"><i class="fas fa-bolt" style="color:#f59e0b"></i><span>${b.replace('Akrab ','')}</span></div>`; });
    types.forEach(t => { html += `<div class="akrab-btn" onclick="window.filterIcs('${t}',this,false)"><i class="fas fa-bolt" style="color:#3b82f6"></i><span>${t}</span></div>`; });
    if (Array.isArray(window.wzData) && window.wzData.length>0) html += `<div class="akrab-btn" onclick="window.filterWz(this)"><i class="fas fa-tags" style="color:#10b981"></i><span>Cuan+(Promo)</span></div>`;
    if (!window.hidePoAkrab) {
        html += '</div><div class="akrab-section-title">Antrian (PO)</div><div class="akrab-grid">';
        brands.forEach(b=>html+=`<div class="akrab-btn" onclick="window.filterKhfy('${b}',this,true)" style="border-style:dashed;"><i class="fas fa-clock" style="color:#94a3b8"></i><span>${b.replace('Akrab ','')}</span></div>`);
        types.forEach(t=>html+=`<div class="akrab-btn" onclick="window.filterIcs('${t}',this,true)" style="border-style:dashed;"><i class="fas fa-clock" style="color:#94a3b8"></i><span>${t}</span></div>`);
    }
    html += '</div>';
    const af = document.getElementById('areaFilter');
    if (af) { af.innerHTML = html; af.style.display='block'; af.style.gridTemplateColumns='none'; }
};

window.filterKhfy = async function(brand, el, isPO) {
    document.querySelectorAll('.filter-card,.akrab-btn').forEach(e=>e.classList.remove('active'));
    if (el) el.classList.add('active');
    const products = (window.khfyData||[]).filter(i=>window.getKhfyCategory(i)===brand && !['BPAL1','BPAXXL1','BPAXL3','XLB75'].includes(i.kode_produk));
    products.sort((a,b)=>parseInt(a.harga_final)-parseInt(b.harga_final));
    let stockMap = {};
    if (brand==='Akrab Fresh (XLA)') {
        try { const r = await (await fetch('khfy_xla_stock.php')).json(); if (r.ok&&r.data) r.data.forEach(st=>stockMap[st.type]=st.sisa_slot); } catch(_) {}
    }
    let markup = 0;
    if (window.markupConfig) {
        if (brand==='KDA (PROMO)' && window.markupConfig['KDA (PROMO)']!==undefined) markup = parseInt(window.markupConfig['KDA (PROMO)']);
        else if (window.markupConfig['Paket Akrab']!==undefined) markup = parseInt(window.markupConfig['Paket Akrab']);
        else if (window.markupConfig['General']) markup = parseInt(window.markupConfig['General']);
    }
    const isPOMode = isPO || document.getElementById('judulMenu')?.innerText==='PO Akrab';
    let html = products.map(p => {
        const pName = p.nama_produk||'Produk';
        const pCode = p.kode_produk||'-';
        const rawM = window.markupConfig?.[pCode] !== undefined ? window.markupConfig[pCode] : markup;
        const configM = window.getMarkupValue(rawM, parseInt(p.harga_final));
        const curM = (pCode==='CFMX'||pName.toLowerCase().includes('cek'))?0:configM;
        const fp = parseInt(p.harga_final)+curM;
        const desc = (p.deskripsi||'').replace(/\n/g,'<br>');
        const ganggu = p.gangguan==1;
        const kosong = p.kosong==1;
        const na = !isPOMode && (ganggu||kosong);
        let badge = '';
        let clickable = true;
        if (na) { clickable = false; if (ganggu) badge='<span style="font-size:9px;color:white;background:red;padding:2px 4px;border-radius:4px;margin-left:5px;">GANGGUAN</span>'; else badge='<span style="font-size:9px;color:white;background:orange;padding:2px 4px;border-radius:4px;margin-left:5px;">KOSONG</span>'; }
        else if (isPOMode) badge='<span style="font-size:9px;background:#f39c12;color:white;padding:2px 4px;border-radius:4px;margin-left:5px;">PRE-ORDER</span>';
        const kajeOrder = p.kode_order_kaje||p.kode_produk_asli||pCode;
        const onClick = clickable ? (p.provider_kaje ? (isPOMode ? `window.siapkanInvoicePO('${pCode}','${pName}',${fp},'KAJE','${kajeOrder}')` : `window.siapkanInvoiceKaje('${pCode}','${pName}',${fp},'${kajeOrder}')`) : (isPOMode ? `window.siapkanInvoicePO('${pCode}','${pName}',${fp},'KHFY')` : `window.siapkanInvoiceKhfy('${pCode}','${pName}',${fp})`)) : `alert('Produk sedang gangguan/kosong.')`;
        return `<div class="item-produk" onclick="${onClick}" style="${na?'opacity:0.6;background:#fff0f0;':''}flex-direction:column;align-items:flex-start;">
            <div style="width:100%;display:flex;justify-content:space-between;align-items:center;">
                <div><div style="font-weight:700;font-size:12px;">${pName} ${badge}</div><div style="font-size:10px;color:#999;">${pCode}</div>
                ${stockMap[pCode]!==undefined?'<div style="font-size:10px;color:#10ac84;font-weight:700;"><i class="fas fa-cubes"></i> Stok: '+stockMap[pCode]+'</div>':''}</div>
                <div style="font-weight:700;color:var(--primary);font-size:13px;">Rp ${new Intl.NumberFormat('id-ID').format(fp)}</div>
            </div>${desc?'<div style="font-size:10px;color:#666;margin-top:5px;border-top:1px dashed #eee;padding-top:4px;width:100%;">'+desc+'</div>':''}</div>`;
    }).join('')||'<div style="text-align:center;padding:20px;color:#999;">Kosong</div>';
    const judul = document.getElementById('judulMenu')?.innerText||'';
    if (judul==='Paket Akrab All'||judul==='PO Akrab') {
        document.getElementById('judulKategoriModal').innerText = brand;
        document.getElementById('listProdukModalArea').innerHTML = html;
        document.getElementById('modalProdukList').style.display='flex';
    } else { document.getElementById('listProdukArea').innerHTML = html; }
};

window.filterIcs = function(type, el, isPO) { /* simplified — will be expanded in full version */ };
window.filterWz = function(el) { /* simplified */ };
window.filterAkrabSearch = function() {
    const q = document.getElementById('akrabSearch')?.value.toLowerCase()||'';
    document.querySelectorAll('#listProdukArea > div').forEach(d=>d.style.display=d.innerText.toLowerCase().includes(q)?'block':'none');
};
window.siapkanInvoiceKaje = function(k,n,h,ko) { alert('Kaje Invoice: '+n+' Rp '+h); };
window.siapkanInvoiceKhfy = function(k,n,h) { alert('Khfy Invoice: '+n+' Rp '+h); };
window.siapkanInvoicePO = function(k,n,h,prov,ko) { alert('PO: '+n+' Rp '+h); };
window.monitorKhfyTrx = function(trxId, docId) {
    let att = 0;
    const iv = setInterval(async () => { att++; if (att>30) { clearInterval(iv); return; }
        try {
            const res = await (await fetch(`khfy_cekstatus.php?refid=${trxId}`)).json();
            if (res.message?.includes("Action invalid")) { clearInterval(iv); return; }
            let ti = null;
            if (res.data && Array.isArray(res.data)) ti = res.data[0];
            else if (res.data?.data && Array.isArray(res.data.data)) ti = res.data.data[0];
            else if (res.data) ti = res.data;
            else if (res.status && res.sn) ti = res;
            if (!ti) return;
            const st = (ti.status||ti.status_text||ti.message||'').toUpperCase();
            const sc = parseInt(ti.status2||0);
            let sa = 'PENDING';
            if (st.includes('SUKSES')||st.includes('BERHASIL')||st.includes('SUCCESS')||sc===20) sa='BERHASIL';
            else if (st.includes('GAGAL')||st.includes('BATAL')||st.includes('FAILED')||sc===72) sa='GAGAL';
            else return;
            clearInterval(iv);
            const user = auth.currentUser; if (!user) return;
            const rf = doc(db,"users",user.uid,"riwayat_transaksi",docId);
            const cs = await getDoc(rf);
            if (cs.exists()) { const cu = (cs.data().status||'').toUpperCase(); if (cu==='BERHASIL'||cu==='SUKSES') return; }
            const sn = ti.sn||ti.keterangan||ti.message||'-';
            await updateDoc(rf,{status:sa,sn,raw_json:JSON.stringify(res)});
            if (sa==='GAGAL' && cs.exists() && !cs.data().isRefunded) {
                const amt = parseInt(cs.data().harga||0);
                const ur = doc(db,"users",user.uid);
                const us = await getDoc(ur);
                await updateDoc(ur,{saldo:(us.data().saldo||0)+amt});
                await updateDoc(rf,{isRefunded:true,sn:sn+' (REFUND)'});
                window.showNotice('error','Gagal','Saldo dikembalikan.');
            } else if (sa==='BERHASIL') { window.showNotice('success','Sukses',sn); }
        } catch(_) {}
    }, 4000);
};
window.monitorKajeTrx = function(trxId, docId) { /* will be expanded */ };
window.monitorWzTrx = function(trxId, docId) { /* will be expanded */ };

window.onclick = function(e) {
    if (e.target===document.getElementById('modalTopup')) window.tutupModalTopup();
    if (e.target===document.getElementById('modalApp')) window.tutupModal();
    if (e.target===document.getElementById('modalInvoice')) window.tutupInvoice();
    if (e.target===document.getElementById('modalDetailRiwayat')) document.getElementById('modalDetailRiwayat').style.display='none';
    if (e.target===document.getElementById('modalProdukList')) document.getElementById('modalProdukList').style.display='none';
};

console.log("Pandawa-Digital PPOB App v2.0 — All systems loaded.");
</script>
</head>
<body>

<!-- ===== AUTH OVERLAY ===== -->
<div id="authOverlay">
  <div class="auth-fx-bg"></div>
  <div class="auth-card" id="loginForm">
    <div class="auth-brand">
      <img src="icons/pandawa.png" class="brand-logo-glow" alt="Logo">
      <h1 class="auth-h1">Pandawa-Digital</h1>
      <p class="auth-desc">Agen Resmi PPOB & AKRAB 2026 — cepat, mudah, dan stabil</p>
    </div>
    <div class="form-area">
      <div class="inp-wrapper">
        <input type="email" id="logEmail" class="inp-modern" placeholder="Email / Username">
        <i class="fas fa-user-circle inp-icon"></i>
      </div>
      <div class="inp-wrapper">
        <input type="password" id="logPass" class="inp-modern" placeholder="Kata Sandi">
        <i class="fas fa-key inp-icon"></i>
        <i class="fas fa-eye inp-eye" onclick="togglePassword('logPass', this)"></i>
      </div>
    </div>
    <div class="reset-link"><span onclick="handleResetPassword()">Lupa kata sandi?</span></div>
    <button id="btnLogin" class="btn-modern-auth" onclick="handleLogin()">Login <i class="fas fa-arrow-right"></i></button>
    <button onclick="handleGoogleLogin()" style="width:100%;padding:14px;border-radius:14px;border:1px solid #cbd5e1;background:white;color:#333;font-weight:700;font-size:13px;cursor:pointer;display:flex;align-items:center;justify-content:center;gap:10px;">
      <img src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg" width="18"> MASUK DENGAN GOOGLE
    </button>
    <div class="auth-switcher">Belum punya akun? <span class="link-accent" onclick="toggleAuth('register')">Daftar Disini</span></div>
  </div>
  <div class="auth-card" id="registerForm" style="display:none;">
    <div class="auth-brand">
      <h1 class="auth-h1">Buat Akun</h1>
      <p class="auth-desc">Bergabung sekarang dan nikmati kemudahan transaksi.</p>
    </div>
    <div class="form-area">
      <div style="display:grid;grid-template-columns:1fr 1fr;gap:10px;">
        <div class="inp-wrapper"><input type="text" id="regUsername" class="inp-modern" placeholder="Username"><i class="fas fa-at inp-icon"></i></div>
        <div class="inp-wrapper"><input type="text" id="regNama" class="inp-modern" placeholder="Nama Lengkap"><i class="fas fa-id-card inp-icon"></i></div>
      </div>
      <div class="inp-wrapper"><input type="tel" id="regWA" class="inp-modern" placeholder="WhatsApp (08xx)"><i class="fab fa-whatsapp inp-icon"></i></div>
      <div class="inp-wrapper"><input type="email" id="regEmail" class="inp-modern" placeholder="Alamat Email"><i class="fas fa-envelope inp-icon"></i></div>
      <div style="display:grid;grid-template-columns:1fr 1fr;gap:10px;">
        <div class="inp-wrapper"><input type="password" id="regPass" class="inp-modern" placeholder="Sandi"><i class="fas fa-lock inp-icon"></i></div>
        <div class="inp-wrapper"><input type="password" id="regPassConfirm" class="inp-modern" placeholder="Ulangi"><i class="fas fa-check inp-icon"></i></div>
      </div>
    </div>
    <button class="btn-modern-auth" style="background:linear-gradient(135deg,#10b981,#059669);margin-top:10px;" onclick="handleRegister()">DAFTAR GRATIS <i class="fas fa-paper-plane"></i></button>
    <div class="auth-switcher">Sudah punya akun? <span class="link-accent" onclick="toggleAuth('login')">Masuk Akun</span></div>
  </div>
</div>

<!-- ===== GLOBAL LOADER ===== -->
<div id="globalLoader">
  <div class="loader-logo-box"><img src="icons/pandawa.png" style="width:100%;height:100%;object-fit:contain;"></div>
  <div class="custom-spinner"></div>
  <p style="margin-top:20px;font-weight:700;color:#333;font-size:13px;">Memuat Data...</p>
  <p style="margin-top:5px;font-size:10px;color:#888;">Sinkronisasi Produk & Akun</p>
</div>

<!-- ===== MAIN APP ===== -->
<div id="mainAppContent">
  <!-- HEADER -->
  <div class="header">
    <div class="header-top">
      <div class="header-logo"><img src="icons/pandawa.png" alt="Logo"></div>
      <div style="flex:1;">
        <div class="header-greeting"><i class="fas fa-sun" style="color:#facc15;"></i> Selamat Datang,</div>
        <div class="header-name" id="headerName">Pengguna</div>
        <div class="header-version"><i class="fas fa-code-branch"></i> v2.0.0</div>
      </div>
      <div class="header-actions">
        <div class="header-btn" onclick="bukaRiwayatArsip()"><i class="fas fa-bell"></i></div>
        <div class="header-btn danger" onclick="handleLogout()"><i class="fas fa-sign-out-alt"></i></div>
      </div>
    </div>
  </div>

  <!-- SALDO -->
  <div class="saldo-box">
    <div class="saldo-info">
      <div>
        <div class="saldo-label"><i class="fas fa-wallet" style="color:var(--primary)"></i> Saldo Kamu</div>
        <div class="saldo-value" id="saldoValue">Rp 0</div>
      </div>
      <i class="fas fa-history" style="font-size:20px;color:#cbd5e1;cursor:pointer;" onclick="bukaRiwayatArsip()"></i>
    </div>
    <div class="action-grid">
      <div class="action-item" onclick="bukaModalTopup()"><div class="action-icon"><i class="fas fa-plus"></i></div><span class="action-text">Topup</span></div>
      <div class="action-item" onclick="bukaModalTransfer('kirim')"><div class="action-icon"><i class="fas fa-paper-plane"></i></div><span class="action-text">Kirim</span></div>
      <div class="action-item" onclick="bukaModalTransfer('minta')"><div class="action-icon"><i class="fas fa-hand-holding-usd"></i></div><span class="action-text">Minta</span></div>
      <div class="action-item" onclick="showMyQR()"><div class="action-icon"><i class="fas fa-id-badge"></i></div><span class="action-text">QR Saya</span></div>
    </div>
  </div>

  <!-- MENU -->
  <div class="menu-container">
    <div class="cat-title">Menu Utama</div>
    <div class="menu-grid">
      <div class="menu-item" onclick="bukaMenu('Pulsa')"><div class="icon-box"><i class="fas fa-mobile-alt" style="font-size:26px;color:#3b82f6;"></i></div><span>Pulsa</span></div>
      <div class="menu-item" onclick="bukaMenu('E-Wallet')"><div class="icon-box"><i class="fas fa-wallet" style="font-size:26px;color:#10b981;"></i></div><span>E-Wallet</span></div>
      <div class="menu-item" onclick="bukaMenu('DIGITAL')"><div class="icon-box"><i class="fas fa-gamepad" style="font-size:26px;color:#8b5cf6;"></i></div><span>DIGITAL</span></div>
      <div class="menu-item" onclick="bukaMenu('Token PLN')"><div class="icon-box"><i class="fas fa-bolt" style="font-size:26px;color:#f59e0b;"></i></div><span>Token PLN</span></div>
      <div class="menu-item" onclick="bukaMenu('Telkomsel')"><div class="icon-box"><img src="icons/Telkomsel.png" style="width:70%;height:70%;object-fit:contain;"></div><span>Telkomsel</span></div>
      <div class="menu-item" onclick="bukaMenu('By.U')"><div class="icon-box"><img src="icons/By.U.png" style="width:70%;height:70%;object-fit:contain;"></div><span>By.U</span></div>
      <div class="menu-item" id="menuAkrabAll" onclick="bukaMenu('Paket Akrab All')"><div class="icon-box"><i class="fas fa-users" style="font-size:24px;color:#14b8a6;"></i></div><span>Paket Akrab</span></div>
      <div class="menu-item" onclick="bukaMenu('PBB')"><div class="icon-box"><i class="fas fa-landmark" style="font-size:26px;color:#e11d48;"></i></div><span>PBB</span></div>
    </div>
    <div id="menuDrawer">
      <div class="cat-title">Menu Lainnya</div>
      <div class="menu-grid">
        <div class="menu-item" onclick="bukaMenu('Indosat')"><div class="icon-box"><img src="icons/Indosat.png" style="width:70%;height:70%;object-fit:contain;"></div><span>Indosat</span></div>
        <div class="menu-item" onclick="bukaMenu('XL')"><div class="icon-box"><img src="icons/XL.png" style="width:70%;height:70%;object-fit:contain;"></div><span>XL</span></div>
        <div class="menu-item" onclick="bukaMenu('Pulsa Transfer')"><div class="icon-box"><i class="fas fa-exchange-alt" style="font-size:24px;color:#ec4899;"></i></div><span>Pulsa TF</span></div>
        <div class="menu-item" onclick="bukaMenu('Tagihan')"><div class="icon-box"><i class="fas fa-file-invoice-dollar" style="font-size:24px;color:#64748b;"></i></div><span>Tagihan</span></div>
        <div class="menu-item" onclick="bukaMenu('Pascabayar')"><div class="icon-box"><i class="fas fa-tv" style="font-size:24px;color:#6366f1;"></i></div><span>TV & Halo</span></div>
        <div class="menu-item" onclick="bukaMenu('Axis')"><div class="icon-box"><i class="fas fa-broadcast-tower" style="font-size:24px;color:#a855f7;"></i></div><span>Axis</span></div>
        <div class="menu-item" onclick="bukaMenu('Tri')"><div class="icon-box"><img src="icons/Tri.png" style="width:70%;height:70%;object-fit:contain;"></div><span>Tri</span></div>
        <div class="menu-item" onclick="bukaMenu('Smartfren')"><div class="icon-box"><img src="icons/Smartfren.png" style="width:70%;height:70%;object-fit:contain;"></div><span>Smartfren</span></div>
      </div>
    </div>
    <div id="btnMoreContainer"><div id="btnMore" onclick="toggleMenuLainnya()"><i class="fas fa-chevron-down"></i> Menu Lainnya</div></div>
  </div>

  <!-- BANNER -->
  <div id="appBanner" style="display:none;background:linear-gradient(135deg,#0f172a,#1e3a8a);border-radius:20px;padding:16px;margin:0 15px 20px;display:none;align-items:center;justify-content:space-between;box-shadow:0 10px 25px rgba(30,58,138,0.3);position:relative;z-index:2;overflow:hidden;">
    <div style="display:flex;align-items:center;gap:14px;flex:1;">
      <div style="width:48px;height:48px;background:rgba(255,255,255,0.1);border-radius:14px;display:flex;justify-content:center;align-items:center;flex-shrink:0;"><i class="fab fa-android" style="font-size:26px;color:#a4c639;"></i></div>
      <div><div style="font-weight:900;font-size:14px;color:#fff;">Pandawa Digital App</div><div style="font-size:10.5px;color:#94a3b8;">Install untuk transaksi lebih cepat!</div></div>
    </div>
    <a href="Pandawa.apk" style="background:#fff;color:#1e3a8a;padding:10px 18px;border-radius:20px;font-size:12px;font-weight:800;text-decoration:none;white-space:nowrap;">INSTALL</a>
  </div>
  <script>document.addEventListener('DOMContentLoaded',()=>{const b=document.getElementById('appBanner');if(b)b.style.display=typeof AndroidShare!=='undefined'?'none':'flex';});</script>

  <!-- H2H DASHBOARD -->
  <div id="h2hDashboard" style="display:none;padding:20px;padding-top:40px;animation:fadeIn .3s;">
    <div style="background:var(--grad-main);padding:25px 20px;border-radius:20px;color:white;margin-bottom:20px;">
      <div style="font-size:12px;opacity:.9;"><i class="fas fa-server"></i> Akun Merchant H2H</div>
      <div id="h2hName" style="font-size:24px;font-weight:900;">Loading...</div>
      <div style="display:flex;justify-content:space-between;border-top:1px dashed rgba(255,255,255,.3);padding-top:12px;margin-top:5px;">
        <div><div style="font-size:10px;opacity:.8;">Saldo</div><div id="h2hSaldo" style="font-size:18px;font-weight:700;">Rp 0</div></div>
        <div><div style="font-size:10px;opacity:.8;">Terdaftar</div><div id="h2hJoin" style="font-size:12px;font-weight:700;">-</div></div>
      </div>
    </div>
    <div style="background:white;padding:18px;border-radius:16px;margin-bottom:20px;">
      <div style="font-size:13px;font-weight:800;margin-bottom:12px;"><i class="fas fa-id-card" style="color:var(--primary);margin-right:5px;"></i> Detail Profil</div>
      <div><div style="display:flex;justify-content:space-between;font-size:12px;padding-bottom:8px;border-bottom:1px dashed #eee;"><span style="color:#7f8c8d;">Email</span><strong id="h2hEmail">-</strong></div>
      <div style="display:flex;justify-content:space-between;font-size:12px;padding-top:8px;"><span style="color:#7f8c8d;">WhatsApp</span><strong id="h2hPhone">-</strong></div></div>
    </div>
    <div style="background:white;padding:18px;border-radius:16px;margin-bottom:20px;">
      <div style="font-size:13px;font-weight:800;margin-bottom:12px;"><i class="fas fa-key" style="color:#e67e22;margin-right:5px;"></i> API Key</div>
      <div style="background:#f8fafc;border:1px solid #edf2f7;padding:12px;border-radius:10px;display:flex;justify-content:space-between;align-items:center;">
        <code id="h2hApiKey" style="font-size:12px;color:#d35400;font-weight:700;word-break:break-all;">-</code>
        <div onclick="navigator.clipboard.writeText(document.getElementById('h2hApiKey').innerText);alert('Disalin!')" style="background:#dbeafe;color:var(--primary);width:32px;height:32px;border-radius:8px;display:flex;align-items:center;justify-content:center;cursor:pointer;flex-shrink:0;"><i class="fas fa-copy"></i></div>
      </div>
    </div>
    <button onclick="handleLogout()" style="width:100%;padding:15px;background:#fee;color:var(--danger);border:1px solid #fcc;border-radius:12px;font-weight:800;font-size:13px;cursor:pointer;"><i class="fas fa-sign-out-alt"></i> Keluar</button>
  </div>

  <!-- HISTORY -->
  <div id="liveHistoryHeader" style="display:flex;align-items:center;padding:15px 20px 5px;">
    <div style="font-weight:700;font-size:14px;color:#555;flex:1;">Riwayat Live</div>
    <div id="btnModeMasal" onclick="toggleModeMasal()" style="font-size:10px;font-weight:700;background:#dbeafe;color:#1e3a8a;padding:6px 12px;border-radius:15px;cursor:pointer;margin-right:10px;transition:.2s;"><i class="fas fa-print"></i> Cetak Masal</div>
    <div style="font-size:10px;color:var(--primary);font-weight:700;cursor:pointer;" onclick="bukaRiwayatArsip()">Lihat Semua <i class="fas fa-chevron-right"></i></div>
  </div>
  <div id="riwayat-container" class="history-container"><p style="text-align:center;font-size:11px;color:#999;padding:10px;">Memuat riwayat...</p></div>

  <!-- SHOP -->
  <div id="shop-container" class="product-list"></div>
</div>

<!-- ===== NOTICE MODAL ===== -->
<div id="modalNotice" class="modal modal-center">
  <div class="notice-content">
    <div id="noticeIcon" class="notice-icon"></div>
    <div id="noticeTitle" style="font-weight:700;font-size:18px;margin-bottom:10px;"></div>
    <div id="noticeMsg" style="font-size:13px;color:#666;line-height:1.4;"></div>
    <button class="btn-konfirmasi" id="btnNoticeClose" style="display:none;margin-top:20px;" onclick="tutupNotice()">OKE</button>
  </div>
</div>

<!-- ===== TRANSFER MODAL ===== -->
<div id="modalTransfer" class="modal modal-center" style="z-index:22000;">
  <div class="notice-content" style="text-align:left;width:90%;max-width:350px;padding:20px;">
    <h3 id="transferTitle" style="margin-bottom:15px;text-align:center;">Kirim Saldo</h3>
    <div class="input-group"><label style="font-size:12px;font-weight:700;">Email / Username</label><input type="text" id="transferTarget" class="form-input" placeholder="Email / Username"></div>
    <div class="input-group"><label style="font-size:12px;font-weight:700;">Nominal (Rp)</label><input type="number" id="transferNominal" class="form-input" placeholder="50000"></div>
    <button class="btn-konfirmasi" onclick="prosesTransfer()">PROSES</button>
    <button class="btn-batal" onclick="document.getElementById('modalTransfer').style.display='none'">BATAL</button>
  </div>
</div>

<!-- ===== APP MODAL ===== -->
<div id="modalApp" class="modal" style="z-index:11000;">
  <div class="modal-content">
    <div id="akrabUI" style="display:none;">
      <div class="akrab-header"><i class="fas fa-arrow-left" onclick="tutupModal()" style="font-size:20px;cursor:pointer;"></i><span style="font-weight:800;font-size:16px;">PAKET AKRAB</span></div>
      <div class="akrab-search-container"><input type="text" id="akrabSearch" class="akrab-search-input" placeholder="Cari produk..." oninput="window.filterAkrabSearch()"></div>
    </div>
    <div id="defaultModalHeader" style="display:flex;align-items:center;margin-bottom:15px;">
      <i class="fas fa-arrow-left" id="btnKembali" onclick="kembaliKeFilter()"></i>
      <h3 id="judulMenu" style="margin:0;font-size:18px;">Pilih Produk</h3>
      <div style="flex:1"></div>
      <i class="fas fa-times" onclick="tutupModal()" style="font-size:20px;color:#999;cursor:pointer;"></i>
    </div>
    <div id="inputContainer">
      <div class="input-group">
        <input type="tel" inputmode="numeric" id="nomorHP" class="form-input" placeholder="Masukkan Nomor HP / ID" style="padding-right:150px;height:45px;border-radius:14px;">
        <i class="fas fa-address-card" style="top:13px;"></i>
        <div id="operatorBadge"></div>
        <button type="button" onclick="pasteDariClipboard('nomorHP')" style="position:absolute;right:8px;top:8px;background:var(--primary);color:white;border:none;border-radius:10px;padding:0 12px;height:29px;font-size:10px;font-weight:700;cursor:pointer;z-index:10;">PASTE</button>
      </div>
      <div id="areaBebasNominal" style="display:none;margin-top:10px;background:rgba(0,102,178,0.03);padding:15px;border-radius:16px;border:1px dashed rgba(0,102,178,0.2);">
        <label style="font-size:12px;font-weight:800;color:var(--primary);margin-bottom:8px;display:block;">NOMINAL</label>
        <div class="input-group"><input type="tel" id="inputQty" class="form-input" placeholder="Contoh: 25000" oninput="this.value=this.value.replace(/[^0-9]/g,'')"><i class="fas fa-coins"></i></div>
      </div>
    </div>
    <div id="areaFilter"></div>
    <div id="statusLoading" style="text-align:center;font-size:13px;color:#666;display:none;padding:40px;">Memproses...</div>
    <div id="listProdukArea"></div>
  </div>
</div>

<!-- ===== PRODUCT LIST MODAL ===== -->
<div id="modalProdukList" class="modal" style="z-index:11500;">
  <div class="modal-content" style="height:85vh;display:flex;flex-direction:column;padding:0;overflow:hidden;">
    <div style="display:flex;align-items:center;padding:15px;border-bottom:1px solid var(--border);background:white;z-index:10;border-radius:15px 15px 0 0;">
      <h3 id="judulKategoriModal" style="margin:0;font-size:16px;flex:1;font-weight:800;">Produk</h3>
      <i class="fas fa-times" onclick="document.getElementById('modalProdukList').style.display='none'" style="font-size:20px;color:#999;cursor:pointer;padding:5px;"></i>
    </div>
    <div id="listProdukModalArea" style="flex:1;overflow-y:auto;padding:15px;background:#fdfdfd;"></div>
  </div>
</div>

<!-- ===== ARCHIVE MODAL ===== -->
<div id="modalArsip" class="modal">
  <div class="modal-content" style="max-height:90vh;display:flex;flex-direction:column;">
    <div style="display:flex;align-items:center;margin-bottom:15px;">
      <h3 style="margin:0;font-size:18px;">Semua Riwayat</h3>
      <div style="flex:1"></div>
      <i class="fas fa-sync-alt" onclick="refreshRiwayatArsip()" style="font-size:16px;color:var(--primary);cursor:pointer;margin-right:20px;background:#dbeafe;padding:8px;border-radius:50%;"></i>
      <i class="fas fa-times" onclick="tutupRiwayatArsip()" style="font-size:20px;color:#999;cursor:pointer;"></i>
    </div>
    <div style="background:#f8fafc;padding:15px;border-radius:16px;margin-bottom:10px;border:1px solid var(--border);">
      <div style="position:relative;margin-bottom:12px;">
        <input type="text" id="searchRiwayat" placeholder="Cari..." style="width:100%;padding:12px 12px 12px 40px;border:1px solid #cbd5e1;border-radius:12px;font-size:13px;outline:none;box-sizing:border-box;">
        <i class="fas fa-search" style="position:absolute;left:14px;top:50%;transform:translateY(-50%);color:#94a3b8;"></i>
      </div>
      <div style="display:grid;grid-template-columns:1.2fr 1fr;gap:10px;margin-bottom:12px;">
        <div><label style="font-size:10px;font-weight:700;color:#64748b;display:block;text-transform:uppercase;margin-bottom:5px;">Tanggal</label>
          <input type="date" id="filterTgl" style="width:100%;padding:10px;border:1px solid #cbd5e1;border-radius:10px;font-size:12px;outline:none;box-sizing:border-box;"></div>
        <div><label style="font-size:10px;font-weight:700;color:#64748b;display:block;text-transform:uppercase;margin-bottom:5px;">Status</label>
          <select id="filterStatus" style="width:100%;padding:10px;border:1px solid #cbd5e1;border-radius:10px;font-size:12px;outline:none;">
            <option value="SEMUA">Semua</option><option value="BERHASIL">Berhasil</option><option value="GAGAL">Gagal</option><option value="PENDING">Pending</option>
          </select></div>
      </div>
      <button onclick="terapkanFilterRiwayat()" style="width:100%;background:var(--grad-main);color:white;border:none;padding:12px;border-radius:12px;font-weight:700;font-size:13px;cursor:pointer;"><i class="fas fa-filter"></i> Terapkan Filter</button>
    </div>
    <div id="listArsipArea" style="flex:1;overflow-y:auto;padding:5px;"></div>
    <div id="paginationRiwayat" class="pagination-container"></div>
  </div>
</div>

<!-- ===== DETAIL RIWAYAT ===== -->
<div id="modalDetailRiwayat" class="modal">
  <div class="modal-content" style="max-height:85vh;overflow-y:auto;border-radius:25px 25px 0 0;padding:20px 25px;">
    <div id="detailRiwayatContent"></div>
  </div>
</div>

<!-- ===== INVOICE MODAL ===== -->
<div id="modalInvoice" class="modal" style="z-index:12000;">
  <div class="modal-content modal-invoice">
    <h3 style="margin-bottom:20px;text-align:center;">Konfirmasi Pembayaran</h3>
    <div id="statusCekNama" style="display:none;text-align:center;font-size:12px;color:var(--primary);margin:-10px 0 15px;"><i class="fas fa-circle-notch fa-spin"></i> Mengecek...</div>
    <div id="invoiceContent"></div>
    <div id="invoiceFooter">
      <button id="btnKonfirmasiBayar" class="btn-konfirmasi" onclick="this.disabled=true;this.innerHTML='<i class=\'fas fa-spinner fa-spin\'></i> Memproses...';window.prosesBayarFinal();">KONFIRMASI BAYAR</button>
      <button class="btn-batal" onclick="tutupInvoice()">BATAL</button>
    </div>
  </div>
</div>

<!-- ===== TOPUP MODAL ===== -->
<div id="modalTopup" class="modal">
  <div class="modal-content" style="max-height:90vh;overflow-y:auto;min-height:400px;">
    <div style="display:flex;align-items:center;margin-bottom:15px;">
      <i class="fas fa-arrow-left" id="btnBackTopup" onclick="backTopupStep()" style="font-size:18px;color:#333;cursor:pointer;margin-right:15px;display:none;"></i>
      <h3 id="titleTopup" style="margin:0;font-size:18px;">Isi Saldo</h3>
      <div style="flex:1"></div>
      <i class="fas fa-times" onclick="tutupModalTopup()" style="font-size:20px;color:#999;cursor:pointer;"></i>
    </div>
    <div id="areaTopupSteps" style="padding-bottom:20px;"><div style="text-align:center;padding:40px;color:#999;"><i class="fas fa-circle-notch fa-spin"></i> Memuat Metode...</div></div>
  </div>
</div>

<!-- ===== OTHER MODALS ===== -->
<div id="tagihanModal" class="modal"><div class="modal-content"><h3>Tagihan</h3></div></div>
<div id="modalMyQR" class="modal modal-center" style="z-index:24000;">
  <div class="notice-content" style="text-align:center;">
    <h3 style="margin-bottom:10px;color:var(--primary);">QR Akun Saya</h3>
    <p style="font-size:12px;color:#666;margin-bottom:15px;">Tunjukkan QR ini untuk menerima saldo</p>
    <img id="myQrImage" src="" style="width:200px;height:200px;border-radius:10px;margin:0 auto;display:block;box-shadow:0 4px 10px rgba(0,0,0,0.1);">
    <div id="myQrInfo" style="margin-top:15px;font-weight:700;font-size:14px;color:#333;"></div>
    <button class="btn-konfirmasi" style="margin-top:20px;" onclick="document.getElementById('modalMyQR').style.display='none'">TUTUP</button>
  </div>
</div>

<div id="modalQRScanner" style="display:none;position:fixed;inset:0;background:black;z-index:99999;flex-direction:column;">
  <div style="padding:15px;display:flex;justify-content:space-between;align-items:center;background:rgba(0,0,0,0.5);color:white;position:absolute;top:0;width:100%;z-index:2;box-sizing:border-box;">
    <div style="font-weight:700;font-size:16px;">Scan QR</div>
    <i class="fas fa-times" onclick="closeQRScanner()" style="font-size:24px;cursor:pointer;"></i>
  </div>
  <div id="qr-reader" style="width:100%;height:100vh;display:flex;align-items:center;justify-content:center;"></div>
</div>

<div id="qrisFullscreen" class="qris-overlay">
  <div class="qris-close" onclick="document.getElementById('qrisFullscreen').style.display='none'"><i class="fas fa-times"></i></div>
  <img id="qrisImageFull" src="icons/qris.jpg">
</div>

<!-- ===== FAB CETAK MASAL ===== -->
<div id="fabCetakMasal" style="display:none;position:fixed;bottom:120px;left:50%;transform:translateX(-50%);width:90%;z-index:9999;">
  <div style="display:flex;gap:10px;">
    <button onclick="window.isShareMode=false;prosesPrintMasal()" class="btn-konfirmasi" style="flex:1;padding:12px;font-size:14px;box-shadow:0 5px 15px rgba(0,0,0,0.2);border:2px solid white;"><i class="fas fa-print"></i> Print (<span id="countMasal">0</span>)</button>
    <button onclick="prosesShareMasal()" class="btn-konfirmasi" style="flex:1;padding:12px;font-size:14px;background:linear-gradient(135deg,#25D366,#128C7E);border:2px solid white;"><i class="fab fa-whatsapp"></i> Share (<span id="countMasalShare">0</span>)</button>
  </div>
</div>

<!-- ===== PRINT MODAL ===== -->
<div id="modalPrintPreview" class="modal" style="z-index:25000;">
  <div class="modal-content">
    <h3 style="margin-bottom:15px;">Cetak Struk</h3>
    <div class="input-group" style="margin-bottom:15px;border-top:1px dashed var(--border);padding-top:10px;">
      <label style="font-size:12px;font-weight:700;color:var(--primary);">Markup (Rp)</label>
      <input type="number" id="inputLiveMarkup" class="form-input" placeholder="0" oninput="updateLivePreview(this.value)" style="font-weight:700;color:var(--primary);">
    </div>
    <div style="background:#f8f9fa;border:1px solid var(--border);padding:15px;font-family:'Courier New',monospace;font-size:12px;margin-bottom:15px;max-height:300px;overflow-y:auto;">
      <div id="printPreviewArea">Preview...</div>
    </div>
    <button id="btnPrintNow" class="btn-konfirmasi" onclick="printStruk()" style="background:var(--success);">PRINT SEKARANG</button>
    <button id="btnShareWA" class="btn-konfirmasi" style="display:none;background:linear-gradient(135deg,#25D366,#128C7E);margin-top:10px;" onclick="shareStrukToWA()">Kirim ke WA</button>
    <button class="btn-batal" onclick="document.getElementById('modalPrintPreview').style.display='none'" style="margin-top:10px;">Tutup</button>
  </div>
</div>

<!-- ===== BOTTOM NAV ===== -->
<div class="bottom-nav">
  <div class="nav-item active" onclick="navSwitch('home', this)"><i class="fas fa-store"></i>Etalase</div>
  <div class="nav-item" onclick="bukaMenu('Paket Akrab All')"><i class="fas fa-shopping-bag"></i>Belanja</div>
  <div class="nav-item" onclick="openQRScanner()"><div class="nav-fab"><i class="fas fa-qrcode"></i></div></div>
  <div class="nav-item" onclick="bukaRiwayatArsip()"><i class="fas fa-history"></i>Riwayat</div>
  <div class="nav-item" onclick="navSwitch('profil', this)"><i class="fas fa-user"></i>Profil</div>
</div>

<!-- ===== PRINT/PRINTER SCRIPT ===== -->
<script>
let printerSettings = { storeName:'Nama Toko', address:'Alamat Toko', footer:'Terima Kasih', paperSize:'58', markup:0 };
let bluetoothDevice, printCharacteristic, currentReceiptData = '';
window.activePrintData = null;
window.activePrintType = '';
window.isShareMode = false;

document.addEventListener('DOMContentLoaded',()=>{ const s=localStorage.getItem('printerSettings_v1'); if(s) printerSettings=JSON.parse(s); });

window.updateLivePreview = function(val) {
    printerSettings.markup = parseInt(val)||0;
    localStorage.setItem('printerSettings_v1', JSON.stringify(printerSettings));
    if (window.activePrintType==='single'&&window.activePrintData) window.renderSinglePreview(window.activePrintData);
    else if (window.activePrintType==='mass'&&window.activePrintData) generateStrukMasal(window.activePrintData);
};

window.siapkanPrint = function(str) {
    const data = JSON.parse(decodeURIComponent(str));
    window.activePrintData = data;
    window.activePrintType = 'single';
    document.getElementById('inputLiveMarkup').value = printerSettings.markup;
    window.renderSinglePreview(data);
    document.getElementById('modalPrintPreview').style.display = 'flex';
    window.updatePrintButtonState();
};

window.renderSinglePreview = function(data) {
    const markup = parseInt(printerSettings.markup)||0;
    const fp = Math.ceil((parseInt(data.harga)+markup)/500)*500;
    const d = new Date();
    const ds = d.toLocaleDateString('id-ID');
    const ts = d.toLocaleTimeString('id-ID').slice(0,5);
    const w = printerSettings.paperSize==='58'?32:48;
    const line = '-'.repeat(w);
    const center = txt=>{ if(!txt) return ''; let o=''; for(const l of txt.split('\n')){ let r=l; while(r.length>0){ const c=r.slice(0,w); r=r.slice(w); o+=' '.repeat(Math.max(0,Math.floor((w-c.length)/2)))+c+'\n'; } } return o.replace(/\n$/,''); };
    const lr = (l,r)=>{ l=String(l); r=String(r); let o=''; let rm=l; const ml=w-r.length-1; while(rm.length>0){ if(rm.length<=ml){ o+=rm+' '.repeat(w-rm.length-r.length)+r; rm=''; } else { o+=rm.slice(0,ml)+'\n'; rm=rm.slice(ml); } } return o; };
    let rec = '';
    rec += center(printerSettings.storeName.toUpperCase())+'\n';
    if (printerSettings.address) rec += center(printerSettings.address)+'\n';
    rec += line+'\n'+ds+' '+ts+'\nNo. Trx: '+(data.trx_id||'-')+'\n'+line+'\n';
    rec += lr(data.produk||'Produk','Rp '+new Intl.NumberFormat('id-ID').format(fp))+'\n';
    rec += 'Tujuan: '+(data.tujuan||'-')+'\n';
    if (data.sn&&data.sn!=='-') {
        let csn = data.sn.replace(/SN:|Ref:|Sukses|Berhasil/gi,'').trim();
        rec += 'SN/Ref:\n'+center(csn)+'\n';
    }
    rec += line+'\n'+lr('TOTAL','Rp '+new Intl.NumberFormat('id-ID').format(fp))+'\n'+line+'\n';
    if (printerSettings.footer) rec += center(printerSettings.footer)+'\n';
    rec += '\n\n\n';
    currentReceiptData = rec;
    document.getElementById('printPreviewArea').innerText = rec;
};

window.updatePrintButtonState = function() {
    const btn = document.getElementById('btnPrintNow');
    const share = document.getElementById('btnShareWA');
    if (window.isShareMode) {
        btn.style.display='none';
        share.style.display='block';
    } else {
        btn.style.display='block';
        btn.innerText="PRINT (Via RawBT)";
        share.style.display='none';
    }
};

window.printStruk = function() {
    const btn = document.getElementById('btnPrintNow');
    btn.innerText = "Membuka RawBT..."; btn.disabled = true;
    try {
        const text = '\x1B\x45\x01'+currentReceiptData+'\x1B\x40';
        const b64 = btoa(text);
        const a = document.createElement('a');
        a.href = 'rawbt:base64,'+b64;
        document.body.appendChild(a); a.click(); document.body.removeChild(a);
        setTimeout(()=>{ document.getElementById('modalPrintPreview').style.display='none'; btn.innerText="PRINT SEKARANG"; btn.disabled=false; }, 1000);
    } catch(e) { alert("Gagal: "+e.message); btn.innerText="PRINT SEKARANG"; btn.disabled=false; }
};

window.shareStrukToWA = async function() {
    const btn = document.getElementById('btnShareWA');
    const orig = btn.innerHTML;
    btn.innerHTML = '<i class="fas fa-circle-notch fa-spin"></i> Memproses...'; btn.disabled = true;
    try {
        const el = document.getElementById('printPreviewArea');
        const canvas = await html2canvas(el, { scale:2, backgroundColor:"#ffffff", logging:false });
        if (window.AndroidShare) { window.AndroidShare.shareBase64(canvas.toDataURL("image/jpeg",0.9)); btn.innerHTML=orig; btn.disabled=false; return; }
        canvas.toBlob(async (blob) => {
            const file = new File([blob], 'Struk_'+Date.now()+'.jpg', {type:"image/jpeg"});
            if (navigator.canShare && navigator.canShare({files:[file]})) { try { await navigator.share({files:[file], title:'Struk'}); } catch(e) { if (e.name!=='AbortError') alert(e.message); } }
            else { const a=document.createElement('a'); a.download=file.name; a.href=canvas.toDataURL("image/jpeg"); a.click(); }
            btn.innerHTML=orig; btn.disabled=false;
        },'image/jpeg',0.9);
    } catch(e) { alert("Gagal: "+e.message); btn.innerHTML=orig; btn.disabled=false; }
};

// ===== CACHE WARMER =====
(function() {
    ['icons/Pulsa.png','icons/E-Wallet.png','icons/Games.png','icons/Token%20PLN.png','icons/Telkomsel.png','icons/Indosat.png','icons/By.U.png'].forEach(s=>{const i=new Image(); i.src=s;});
})();

// ===== TEXT MASKING =====
document.addEventListener("DOMContentLoaded",()=>{
    const mask = t=>t.replace(/(ICS|KF|REF)-/g,'***-');
    const walk = n=>{ if(n.nodeType===3){ if(/(ICS|KF|REF)-/.test(n.nodeValue)) n.nodeValue=mask(n.nodeValue); } else if(n.nodeType===1&&!['SCRIPT','STYLE','INPUT','TEXTAREA'].includes(n.nodeName)) n.childNodes.forEach(walk); };
    walk(document.body);
    new MutationObserver(muts=>{ muts.forEach(m=>{ if(m.type==='childList') m.addedNodes.forEach(n=>{ if(n.nodeType===1||n.nodeType===3) walk(n); }); else if(m.type==='characterData'&&/(ICS|KF|REF)-/.test(m.target.nodeValue)) m.target.nodeValue=mask(m.target.nodeValue); }); }).observe(document.body,{childList:true,subtree:true,characterData:true});
});

// ===== BACK BUTTON =====
window.addEventListener('load',()=>{
    history.pushState(null,null,location.href);
    window.onpopstate=function(){
        let closed=false;
        document.querySelectorAll('.modal').forEach(m=>{ if(getComputedStyle(m).display!=='none'){ m.style.display='none'; closed=true; } });
        const q=document.getElementById('qrisFullscreen');
        if(q&&getComputedStyle(q).display!=='none'){ q.style.display='none'; closed=true; }
        if(!closed){
            let onOtherPage=false;
            document.querySelectorAll('.full-page').forEach(p=>{ if(getComputedStyle(p).display!=='none') onOtherPage=true; });
            if(onOtherPage&&window.navSwitch){ window.navSwitch('home',document.querySelectorAll('.nav-item')[0]); history.pushState(null,null,location.href); }
            else history.back();
        } else history.pushState(null,null,location.href);
    };
});

// ===== SERVICE WORKER KILLER =====
if ('serviceWorker'in navigator) navigator.serviceWorker.getRegistrations().then(r=>r.forEach(r=>r.unregister()));
if ('caches'in window) caches.keys().then(n=>n.forEach(name=>caches.delete(name)));

console.log("Pandawa-Digital v2.0 — Ready.");
</script>

<!-- ===== PROFILE PAGE ===== -->
<div id="pageProfil" class="full-page">
  <div class="prof-header">
    <div style="width:70px;height:70px;background:rgba(255,255,255,0.2);border-radius:50%;margin:0 auto 10px;display:flex;align-items:center;justify-content:center;font-size:30px;"><i class="fas fa-user"></i></div>
    <div id="profNameDisplay" style="font-weight:700;font-size:18px;">Loading...</div>
    <div id="profEmailDisplay" style="font-size:12px;opacity:0.8;">...</div>
  </div>
  <div class="prof-card">
    <div class="prof-row"><span>Username</span><b id="pUser">-</b></div>
    <div class="prof-row"><span>WhatsApp</span><b id="pWA">-</b></div>
    <div class="prof-row"><span>Saldo</span><b id="pSaldo" style="color:var(--primary)">-</b></div>
    <div class="prof-row"><span>Terdaftar</span><b id="pJoin">-</b></div>
  </div>
  <div style="padding:20px;">
    <button class="btn-konfirmasi" onclick="bukaPengaturanPrinter()" style="background:linear-gradient(135deg,#6c5ce7,#a29bfe);margin-bottom:10px;"><i class="fas fa-print"></i> Pengaturan Printer</button>
    <button class="btn-konfirmasi" onclick="navSwitch('pesanan_fisik')" style="background:linear-gradient(135deg,#3498db,#2980b9);margin-bottom:10px;"><i class="fas fa-box"></i> Pesanan Saya</button>
    <button class="btn-batal" onclick="handleLogout()" style="color:var(--danger);background:#fee;"><i class="fas fa-sign-out-alt"></i> Keluar</button>
  </div>
</div>

<div id="pagePesananFisik" class="full-page">
  <div class="header" style="padding-bottom:20px;margin-bottom:20px;">
    <div style="display:flex;justify-content:space-between;align-items:center;">
      <div style="font-weight:700;font-size:20px;color:white;">Pesanan Saya</div>
      <i class="fas fa-times" onclick="navSwitch('profil')" style="color:white;font-size:20px;cursor:pointer;"></i>
    </div>
  </div>
  <div id="listPesananFisik" style="padding:0 20px;"></div>
</div>

<div id="modalPrinterSettings" class="modal">
  <div class="modal-content" style="max-height:90vh;overflow-y:auto;">
    <h3 style="margin-bottom:10px;border-bottom:1px dashed var(--border);padding-bottom:10px;">Pengaturan Printer</h3>
    <div class="input-group"><label style="font-size:11px;font-weight:700;">Nama Toko</label><textarea id="setStoreName" class="form-input" rows="2" placeholder="Konter Pulsa" oninput="updateSettingsPreview()"></textarea></div>
    <div class="input-group"><label style="font-size:11px;font-weight:700;">Alamat</label><textarea id="setStoreAddress" class="form-input" rows="2" placeholder="Jl. Mawar No. 1" oninput="updateSettingsPreview()"></textarea></div>
    <div class="input-group"><label style="font-size:11px;font-weight:700;">Footer</label><textarea id="setStoreFooter" class="form-input" rows="2" placeholder="Terima Kasih" oninput="updateSettingsPreview()"></textarea></div>
    <div style="display:grid;grid-template-columns:1fr 1fr;gap:10px;">
      <div class="input-group"><label style="font-size:11px;font-weight:700;">Ukuran</label><select id="setPaperSize" class="form-input" onchange="updateSettingsPreview()"><option value="58">58mm</option><option value="80">80mm</option></select></div>
      <div class="input-group"><label style="font-size:11px;font-weight:700;">Markup</label><input type="number" id="setGlobalMarkup" class="form-input" placeholder="0" oninput="updateSettingsPreview()"></div>
    </div>
    <button class="btn-konfirmasi" onclick="simpanPengaturanPrinter()">SIMPAN</button>
    <button class="btn-batal" onclick="document.getElementById('modalPrinterSettings').style.display='none'">BATAL</button>
  </div>
</div>

<script>
</html>

//=== ORIGINAL BLOCK 4110-4210 ===
    window.triggerDoniGuard = async (data) => {
        try {
            const user = window.auth.currentUser;
            if(!user) return;
            
            const response = await fetch('doniguard.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({
                                            uid: data.uid || user.uid,
                    email: data.email || user.email,
                    trx_id: data.trx_id || null,
                    action: data.action,
                    produk: data.produk,
                    nominal: data.nominal,
                    saldo_akhir_client: data.saldo_akhir_client
                })
            });
            
            const res = await response.json();
            
            if (res.status === 'success' && res.audit && res.audit.force_sync === true) {
                console.warn("DoniGuard: Mendeteksi ketidaksinkronan! Merevisi saldo...");
                await window.updateDoc(window.doc(window.db, "users", user.uid), {
                    saldo: res.audit.correct_balance
                });
            }
        } catch (e) { console.error("DoniGuard Audit Failed:", e); }
    };
     
    
    
    window.checkBroadcast = async (user) => {
        try {
            // 1. Ambil Config Siaran
            const bcSnap = await getDoc(doc(db, "pengaturan", "broadcast"));
            if (!bcSnap.exists()) return;
            const bcData = bcSnap.data();
            if (!bcData.active) return;
    
            // 2. Ambil State User
            const userRef = doc(db, "users", user.uid);
            const userSnap = await getDoc(userRef);
            const userData = userSnap.data();
            const userBcState = userData.broadcast_state || { id: '', count: 0 };
    
            let showBroadcast = false;
            let newCount = userBcState.count;
    
            // 3. Logika Reset & Frekuensi
            if (userBcState.id !== bcData.broadcast_id) {
                // ID Beda (Siaran Baru) -> Reset Count & Tampilkan
                newCount = 1;
                showBroadcast = true;
            } else {
                // ID Sama -> Cek Kuota Tampil
                if (userBcState.count < bcData.max_show) {
                    newCount = userBcState.count + 1;
                    showBroadcast = true;
                }
            }
    
            // 4. Tampilkan & Update DB
            if (showBroadcast) {
                // Setup UI
                const imgEl = document.getElementById('bcImageDisplay');
                const titleEl = document.getElementById('bcTitleDisplay');
                const textEl = document.getElementById('bcTextDisplay');
                
                if(bcData.img) { 
                    imgEl.src = 'icons/' + bcData.img; 
                    imgEl.style.display = 'block'; 
                } else { 
                    imgEl.style.display = 'none'; 
                }
                
                if(bcData.judul) { titleEl.innerText = bcData.judul; titleEl.style.display = 'block'; }
                else titleEl.style.display = 'none';
    
                if(bcData.pesan) { textEl.innerText = bcData.pesan; textEl.style.display = 'block'; }
                else textEl.style.display = 'none';
    
                if(bcData.img || bcData.judul || bcData.pesan) {
                    document.getElementById('modalBroadcast').style.display = 'flex';
                    // Simpan State Baru ke User
                    await updateDoc(userRef, {
                        broadcast_state: { id: bcData.broadcast_id || 'init', count: newCount }
                    });
                }
            }
        } catch (e) { console.error("Broadcast Check Error:", e); }
    };
    
    window.tutupBroadcast = () => document.getElementById('modalBroadcast').style.display = 'none';
    
    window.updateFirestoreStatus = async function(idDoc, newStatus, newSN, rawJson, forceRefund = false) {
        const user = auth.currentUser;
        if(!user) return;
        try { 
            const trxRef = doc(db, "users", user.uid, "riwayat_transaksi", idDoc);
            const trxSnap = await getDoc(trxRef);

//=== ORIGINAL BLOCK 4310-4455 ===
    window.prosesTransfer = async () => {
        const user = window.auth.currentUser;
        if(!user) return alert('Silakan login!');
        const targetInput = document.getElementById('transferTarget').value.trim();
        const nominalInput = parseInt(document.getElementById('transferNominal').value);
    
        if(!targetInput || !nominalInput || nominalInput < 100) return window.showNotice('error', 'Gagal', 'Input tidak valid. Minimal Rp 100');
        
        const btn = document.getElementById('btnProsesTransfer');
        btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Memproses...';
        btn.disabled = true;
    
        try {
            let targetUser = null;
            let targetUid = null;
            
            let q = window.query(window.collection(window.db, 'users'), window.where('email', '==', targetInput));
            let snap = await window.getDocs(q);
            if(!snap.empty) {
                targetUser = snap.docs[0].data();
                targetUid = snap.docs[0].id;
            } else {
                q = window.query(window.collection(window.db, 'users'), window.where('username', '==', targetInput));
                snap = await window.getDocs(q);
                if(!snap.empty) {
                    targetUser = snap.docs[0].data();
                    targetUid = snap.docs[0].id;
                }
            }
    
            if(!targetUid) throw new Error('Pengguna tidak ditemukan!');
            if(targetUid === user.uid) throw new Error('Tidak bisa transfer ke diri sendiri!');
    
            const myRef = window.doc(window.db, 'users', user.uid);
            const mySnap = await window.getDoc(myRef);
            const myData = mySnap.data();
            const myName = myData.username || myData.nama || 'User';
            const mySaldo = myData.saldo || 0;
    
            if(window.transferType === 'kirim') {
                if(mySaldo < nominalInput) throw new Error('Saldo Anda tidak mencukupi!');
                if (!(await window.cekSinkronisasiDoniGuard(user.uid, mySaldo))) throw new Error('sedang memproses transaksi harap tunggu');
                
                const myNewSaldo = mySaldo - nominalInput;
                await window.updateDoc(myRef, { saldo: myNewSaldo });
                let idTrxOut = 'TRXOUT' + Date.now();
                await window.addDoc(window.collection(window.db, 'users', user.uid, 'riwayat_transaksi'), { uid: user.uid, username: myName, tujuan: targetUser.username || targetInput, produk: 'Kirim Saldo', kode_produk: 'TRANSFER', harga: nominalInput, status: 'BERHASIL', sn: 'Transfer ke ' + (targetUser.username || targetInput), trx_id: idTrxOut, timestamp: window.serverTimestamp() });
                if(window.kirimNotifTelegram) window.kirimNotifTelegram('transaksi', { produk: 'Kirim Saldo (Transfer)', tujuan: targetUser.username || targetInput, harga: nominalInput, username: myName, trx_id: idTrxOut });
                if(window.triggerDoniGuard) {
                    window.triggerDoniGuard({
                        action: 'transfer_out',
                        produk: 'Kirim Saldo ke ' + (targetUser.username || targetInput),
                        nominal: nominalInput,
                        trx_id: 'TRXOUT' + Date.now(),
                        saldo_akhir_client: myNewSaldo
                    });
                }
    
                const targetRef = window.doc(window.db, 'users', targetUid);
                const targetBaruSnap = await window.getDoc(targetRef);
                const targetNewSaldo = (targetBaruSnap.data().saldo || 0) + nominalInput;
                await window.updateDoc(targetRef, { saldo: targetNewSaldo });
                await window.addDoc(window.collection(window.db, 'users', targetUid, 'riwayat_transaksi'), { uid: targetUid, username: targetUser.username || targetInput, tujuan: myName, produk: 'Terima Saldo', kode_produk: 'TRANSFER', harga: nominalInput, status: 'BERHASIL', sn: 'Terima dari ' + myName, trx_id: 'TRXIN' + Date.now(), timestamp: window.serverTimestamp() });
                
                await window.addDoc(window.collection(window.db, 'users', targetUid, 'notifikasi'), {
                    tipe: 'transfer_masuk',
                    dari_uid: user.uid,
                    dari_nama: myName,
                    nominal: nominalInput,
                    status: 'unread',
                    timestamp: window.serverTimestamp()
                });
    
                window.showNotice('success', 'Berhasil', `Berhasil mengirim Rp ${new Intl.NumberFormat('id-ID').format(nominalInput)} ke ${targetUser.username || targetInput}`);
                document.getElementById('modalTransfer').style.display = 'none';
    
            } else if(window.transferType === 'minta') {
                await window.addDoc(window.collection(window.db, 'users', targetUid, 'notifikasi'), {
                    tipe: 'request_saldo',
                    dari_uid: user.uid,
                    dari_nama: myName,
                    nominal: nominalInput,
                    status: 'pending',
                    timestamp: window.serverTimestamp()
                });
                window.showNotice('success', 'Terkirim', `Permintaan saldo Rp ${new Intl.NumberFormat('id-ID').format(nominalInput)} ke ${targetUser.username || targetInput} telah dikirim.`);
                document.getElementById('modalTransfer').style.display = 'none';
            }
    
        } catch(e) {
            window.showNotice('error', 'Gagal', e.message);
        } finally {
            btn.innerHTML = 'PROSES';
            btn.disabled = false;
        }
    };
    
    window.activeNotifListener = null;
    window.initTransferListener = (user) => {
        if(!user) return;
        if(window.activeNotifListener) window.activeNotifListener();
        
        const q = window.query(window.collection(window.db, 'users', user.uid, 'notifikasi'), window.where('status', 'in', ['unread', 'pending']));
        window.activeNotifListener = window.onSnapshot(q, (snap) => {
            snap.docChanges().forEach((change) => {
                if (change.type === 'added') {
                    const data = change.doc.data();
                    const docId = change.doc.id;
                    
                    if(data.tipe === 'transfer_masuk' && data.status === 'unread') {
                        if(window.triggerDoniGuard) {
                            window.getDoc(window.doc(window.db, 'users', user.uid)).then(uSnap => {
                                window.triggerDoniGuard({
                                    action: 'topup', // Diubah ke 'topup' agar DoniGuard memvalidasi sebagai saldo masuk (Credit)
                                    produk: 'Terima Saldo dari ' + data.dari_nama,
                                    nominal: data.nominal,
                                    trx_id: 'TRXIN' + Date.now(),
                                    saldo_akhir_client: uSnap.data().saldo
                                });
                            });
                        }
                        
                        document.getElementById('notifTransferMsg').innerHTML = `Anda telah menerima saldo sebesar <b>Rp ${new Intl.NumberFormat('id-ID').format(data.nominal)}</b> dari <b>${data.dari_nama}</b>.`;
                        document.getElementById('modalNotifTransfer').style.display = 'flex';
                        
                        window.updateDoc(window.doc(window.db, 'users', user.uid, 'notifikasi', docId), { status: 'read' });
                    }
                    
                    if(data.tipe === 'request_saldo' && data.status === 'pending') {
                        document.getElementById('requestDataId').value = docId;
                        window.currentRequestData = { ...data, docId: docId };
                        document.getElementById('requestSaldoMsg').innerHTML = `<b>${data.dari_nama}</b> meminta saldo sebesar <b>Rp ${new Intl.NumberFormat('id-ID').format(data.nominal)}</b> kepada Anda.`;
                        document.getElementById('modalRequestSaldo').style.display = 'flex';
                    }
                }
            });
        });
    };
    
    window.tutupNotifTransfer = () => document.getElementById('modalNotifTransfer').style.display = 'none';
    
    window.terimaRequestSaldo = async () => {
        const reqData = window.currentRequestData;
        if(!reqData) return;
        const user = window.auth.currentUser;
        if(!user) return;

//=== ORIGINAL BLOCK 5383-5498 ===
            window.cekSinkronisasiDoniGuard = async function(uid, currentSaldo) {
        try {
    const auditReq = await fetch('doniguard.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ uid: uid, action: 'check', produk: 'AUDIT_PRA_TRX', nominal: 0, saldo_akhir_client: currentSaldo })
    });
    const auditRes = await auditReq.json();
    if (auditRes.status === 'success' && auditRes.audit && auditRes.audit.force_sync === true) {
        await window.updateDoc(window.doc(window.db, "users", uid), { saldo: parseInt(auditRes.audit.correct_balance) });
        window.showNotice('error', 'Sinkronisasi', 'sedang memproses transaksi harap tunggu');
        setTimeout(() => window.location.reload(true), 2000);
        return false;
    }
    return true;
        } catch(e) {
    console.warn("DoniGuard Check Error:", e);
    return true;
        }
    };
    
    
    window.prosesBayarFinal = async function() {
                const user = window.auth.currentUser;
                if(!user) return window.showNotice('error', 'Akses Ditolak', 'Silakan login kembali!');
    
                const data = window.currentInvoiceData;
                const inputHP = document.getElementById('invoiceNomorHP').value;
                if(!inputHP) return alert("Nomor Tujuan wajib diisi!");
    
                let hargaFinal = data.baseHarga;
                let qtyCustom = null;
    
        if(data.isBebas) {
                    const elQty = document.getElementById('invoiceQty');
                    if(!elQty) return alert("Input Nominal tidak ditemukan");
                    qtyCustom = elQty.value;
                    if(!qtyCustom || qtyCustom < 1000) return alert("Nominal tidak valid!");
                    // Perbaikan: nominal manual + (harga asli + markup) 
                    // data.baseHarga sudah berisi (harga asli + markup)
                    hargaFinal = parseInt(qtyCustom) + parseInt(data.baseHarga);
                }
    
                transaksiPending = { 
                    tujuan: inputHP, 
                    kode_produk: data.kode, 
                    nama_produk: data.nama, 
                    harga: hargaFinal,
                    qty: qtyCustom
                };
    
                window.tutupInvoice();
                window.tutupModal(); 
                window.kembaliKeFilter();
                window.showNotice('loading', 'Memproses', 'Sedang memvalidasi saldo dan transaksi...');
    
                try {
                    const userDoc = await window.getDoc(window.doc(window.db, "users", user.uid));
                    const currentSaldo = parseInt(userDoc.data().saldo) || 0;
                    const hargaTrx = parseInt(transaksiPending.harga) || 0;
    
                    if (!(await window.cekSinkronisasiDoniGuard(user.uid, currentSaldo))) return;
    
                    const isCekProduk = (transaksiPending.kode_produk || "").startsWith("C") || (transaksiPending.kode_produk || "").startsWith("INQ") || (transaksiPending.kode_produk || "").startsWith("CEK");
                    if (hargaTrx <= 0 && !isCekProduk) {
    window.showNotice('error', 'Gagal', 'Nominal transaksi tidak valid (harus lebih dari 0).');
    return;
                    }
    
                    if (currentSaldo < hargaTrx) {
    window.showNotice('error', 'Saldo Gagal', 'Saldo Anda tidak mencukupi. Sisa saldo: Rp ' + new Intl.NumberFormat('id-ID').format(currentSaldo));
    return;
                    }
                    
                    transaksiPending.harga = hargaTrx;
    
                    const newSaldo = currentSaldo - transaksiPending.harga;
                    await window.updateDoc(window.doc(window.db, "users", user.uid), { saldo: newSaldo });
    
                    const req = await fetch('api.php', { method: 'POST', body: JSON.stringify(transaksiPending), headers: {'Content-Type': 'application/json'} });
                    const res = await req.json();
                    let clean = window.bersihkanPesan(res.message);
    
                    if (res.status === "PENDING" || res.status === "BERHASIL") {
    window.showNotice('success', 'Berhasil', clean);
    // Pemicu DoniGuard saat Transaksi PPOB Berhasil
    window.triggerDoniGuard({
        action: 'transaksi',
        produk: transaksiPending.nama_produk,
        nominal: transaksiPending.harga,
        saldo_akhir_client: newSaldo
    });
                } else {
    window.showNotice('error', 'Gagal', clean);
    const currentSnap = await window.getDoc(window.doc(window.db, "users", user.uid));
    const latestSaldo = currentSnap.exists() ? (currentSnap.data().saldo || 0) : 0;
    await window.updateDoc(window.doc(window.db, "users", user.uid), { saldo: latestSaldo + transaksiPending.harga });
                    }                    let idDocNew = "";
    if(window.simpanKeFirestore) idDocNew = await window.simpanKeFirestore(transaksiPending, res.status, clean, res.refID, user.uid, userDoc.data().username, JSON.stringify(res));
    
    if ((res.provider === 'KAJE' || transaksiPending.kode_produk.startsWith('KAJE')) && (res.status === 'BERHASIL' || res.status === 'Sukses')) {
        window.prosesKajeInternal(transaksiPending.tujuan, transaksiPending.harga, userDoc.data().username, user.uid, idDocNew);
    }
    
                } catch (e) {
                    try {
                        const userRef = window.doc(window.db, "users", window.auth.currentUser.uid);
                        const freshSnap = await window.getDoc(userRef);
                        const curBal = freshSnap.exists() ? (freshSnap.data().saldo || 0) : 0;
                        await window.updateDoc(userRef, { saldo: curBal + transaksiPending.harga });
                    } catch(ex){}
                    window.showNotice('error', 'Sistem Error', 'Gagal menghubungkan ke server.');
                }
            }
    
            window.cekStatusBerkala = function(idDoc, trxId, tujuan, kode) {

//=== ORIGINAL BLOCK 5940-5970 ===
    window.loadProfileData = async () => {
                 const user = window.auth.currentUser;
                 if(!user) return;
                 const d = await window.getDoc(window.doc(window.db, "users", user.uid));
                 if(d.exists()) {
                     const data = d.data();
                     document.getElementById('profNameDisplay').innerText = data.nama || "User";
                     document.getElementById('profEmailDisplay').innerText = user.email;
                     document.getElementById('pUser').innerText = data.username || "-";
                     document.getElementById('pWA').innerText = data.whatsapp || "-";
                     document.getElementById('pSaldo').innerText = "Rp " + new Intl.NumberFormat('id-ID').format(data.saldo || 0);
                     document.getElementById('pJoin').innerText = data.createdAt ? new Date(data.createdAt.seconds * 1000).toLocaleDateString() : "-";
                     if(data.role === 'pelapak') {
     document.getElementById('btnLapak').style.display = 'block';
                     } else {
     document.getElementById('btnLapak').style.display = 'none';
                     }
                 }
            };
    
            
    window.bukaDetailRiwayat = function(str) {
                const d = JSON.parse(decodeURIComponent(str));
                
                // Override Topup Pending langsung ke Instruksi Pembayaran
                if (d.kode_produk === 'TOPUP' && (d.status === 'PENDING' || d.status === 'Pending')) {
                    let mCode = d.metode || 'QRIS';
                    let fallbackBank = (window.bankManualData || []).find(b => b.code === mCode);
                    window.selectedTopupMethod = d.metode_lengkap || fallbackBank || { code: mCode, name: mCode === 'SEABANK' ? 'Transfer Seabank' : 'Scan QRIS All Payment', type: mCode === 'SEABANK' ? 'BANK_MANUAL' : 'MANUAL', img: mCode === 'SEABANK' ? 'icons/seabank.png' : 'icons/qris.jpg', desc: '' };
                    window.currentPendingDocId = d.idDoc;
                    

//=== ORIGINAL BLOCK 6164-6270 ===
            window.startIndopayChecker = function(idDoc, nominalFinal) {
                if(window.intervalCek[idDoc]) return;
                console.log('Memulai pemantauan Indopay untuk nominal:', nominalFinal);
                window.intervalCek[idDoc] = setInterval(async () => {
                    try {
    let res = await fetch(`indopay_api.php?action=check&nominal=${nominalFinal}`);
    let data = await res.json();
    
    if (data.status === 'success') {
        clearInterval(window.intervalCek[idDoc]);
        delete window.intervalCek[idDoc];
        
        const user = window.auth.currentUser;
        if(user) {
            const trxRef = window.doc(window.db, "users", user.uid, "riwayat_transaksi", idDoc);
            const trxSnap = await window.getDoc(trxRef);
            if(trxSnap.exists() && (trxSnap.data().status === 'BERHASIL' || trxSnap.data().status === 'Sukses')) return; // Anti-Double
            
            const userRef = window.doc(window.db, "users", user.uid);
            const userSnap = await window.getDoc(userRef);
            const newSaldo = (userSnap.exists() ? parseInt(userSnap.data().saldo) || 0 : 0) + parseInt(nominalFinal);
            
            // FIX: Eksekusi penambahan saldo langsung ke Firestore agar tidak menunggu koreksi DoniGuard
            await window.updateDoc(userRef, { saldo: newSaldo });
            
            if(window.updateFirestoreStatus) window.updateFirestoreStatus(idDoc, "BERHASIL", "Topup Indopay Otomatis", JSON.stringify(res));
            
            if(window.triggerDoniGuard) {
                window.triggerDoniGuard({
                    trx_id: 'INDOPAY-' + idDoc, action: 'topup', produk: 'TOPUP GOPAY (INDOPAY)', nominal: parseInt(nominalFinal), saldo_akhir_client: newSaldo
                });
            }
            window.showNotice('success', 'Berhasil', 'Topup Indopay Rp ' + new Intl.NumberFormat('id-ID').format(nominalFinal) + ' masuk!');
            if(document.getElementById('statusIndopayAuto')) {
                document.getElementById('statusIndopayAuto').innerHTML = '<i class="fas fa-check-circle"></i> Pembayaran Diterima!';
                document.getElementById('statusIndopayAuto').style.color = 'var(--success)';
            }
            setTimeout(() => {
                localStorage.removeItem('pending_topup');
                if(window.tutupModalTopup) window.tutupModalTopup();
                if(window.bukaRiwayatArsip) window.bukaRiwayatArsip();
            }, 2000);
        }
    }
                    } catch(e) {
    console.error('Error Indopay Checker:', e);
                    }
                }, 5000);
            };
            window.bankManualData = [];
            
            // Listener Bank Manual dari Firestore
            window.addEventListener('DOMContentLoaded', () => {
                setTimeout(() => {
                    if(window.db && window.onSnapshot && window.collection) {
    window.onSnapshot(window.collection(window.db, "metode_topup"), (snap) => {
        window.bankManualData = [];
        snap.forEach(d => {
            let data = d.data();
            data.idDoc = d.id;
            data.type = 'BANK_MANUAL';
            data.code = data.nama_bank || 'BANK';
            data.name = 'Transfer ' + (data.nama_bank || 'Bank');
            data.fee = parseInt(data.fee) || 0;
            data.img = data.logo || 'icons/bank.png';
            data.desc = 'No. Rek: ' + data.no_rek + ' a/n ' + data.atas_nama;
            window.bankManualData.push(data);
        });
    });
                    }
                }, 2000);
            });
                    setTimeout(() => {
                    let pendingSesi = localStorage.getItem('pending_topup');
                    if(pendingSesi) {
    let pData = JSON.parse(pendingSesi);
    let now = new Date().getTime();
    let expiry = 3 * 60 * 60 * 1000; // 3 Jam
    if(now - pData.timestamp > expiry) {
        localStorage.removeItem('pending_topup');
        if(pData.docId && window.auth && window.auth.currentUser) {
            window.updateDoc(window.doc(window.db, "users", window.auth.currentUser.uid, "riwayat_transaksi", pData.docId), { status: 'GAGAL', sn: 'Kedaluwarsa (Lewat 3 Jam)' }).catch(e=>console.log(e));
            if(window.batalkanTopupTelegram) window.batalkanTopupTelegram(window.auth.currentUser.uid, pData.docId, "Kedaluwarsa");
        }
        window.currentTopupStep = 1;
        if(typeof window.renderTopupStep === 'function') window.renderTopupStep(1);
    } else {
        window.selectedTopupMethod = pData.method;
        window.currentPendingDocId = pData.docId;
        if(typeof window.renderTopupStep === 'function') window.renderTopupStep(4, pData.nominal);
    }
                    } else {
    window.currentTopupStep = 1;
    if(typeof window.renderTopupStep === 'function') window.renderTopupStep(1);
                    }
                }, 500);
    
                    window.bukaModalTopup = () => {
                document.getElementById('modalTopup').style.display = 'flex';
                if(typeof window.renderTopupStep === 'function') window.renderTopupStep(1);
            };
    
            
    window.showFullscreenQR = (src) => {
                document.getElementById('qrisImageFull').src = src;
                document.getElementById('qrisFullscreen').style.display = 'flex';
            };

//=== ORIGINAL BLOCK 6523-6550 ===
            window.buatQrisDinamis = function(qris, nominal) {
                let q = qris.slice(0, -4);
                q = q.replace("010211", "010212");
                let step1 = q.split("5802ID");
                let nom = nominal.toString();
                let tag54 = "54" + nom.length.toString().padStart(2, '0') + nom;
                q = step1[0] + tag54 + "5802ID" + step1[1];
                
                let crc = 0xFFFF;
                for (let i = 0; i < q.length; i++) {
                    crc ^= q.charCodeAt(i) << 8;
                    for (let j = 0; j < 8; j++) {
    if ((crc & 0x8000) !== 0) {
        crc = (crc << 1) ^ 0x1021;
    } else {
        crc = crc << 1;
    }
                    }
                }
                let hex = (crc & 0xFFFF).toString(16).toUpperCase().padStart(4, '0');
                return q + hex;
            };
    
    
    window.prosesTopupNew = async () => {
                const user = window.auth.currentUser;
                if(!user) return alert("Silakan login!");
                

//=== ORIGINAL BLOCK 8003-8060 ===
            window.monitorKajeTrx = async function(trxId, docId) {
                if(window.intervalCek[docId]) return;
                console.log("Monitoring Kaje TrxID:", trxId);
                
                // Bersihkan simbol '#' agar API Kaje membaca ID dengan benar
                const cleanTrxId = (trxId || '').replace('#', '').trim();
                if(!cleanTrxId) return;
    
                window.intervalCek[docId] = setInterval(async () => {
                    try {
    const req = await fetch('kaje_proxy.php?api_action=check_status', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ trx_id: cleanTrxId })
    });
    const res = await req.json();
    
    if(res.success && res.data) {
        const statusRaw = (res.data.status || '').toLowerCase();
        let statusAkhir = 'PENDING';
        let sn = res.data.serial_number || res.data.message || res.message || '-';
        
        if(statusRaw === 'success' || statusRaw === 'berhasil' || statusRaw === 'sukses') {
            if (res.data.deeplink || (res.data.message && res.data.message.toLowerCase().includes('pembayaran'))) {
                statusAkhir = 'PENDING';
                sn = res.data.deeplink ? res.data.deeplink : res.data.message;
            } else {
                statusAkhir = 'BERHASIL';
            }
        }
        else if(statusRaw === 'failed' || statusRaw === 'error' || statusRaw === 'gagal' || statusRaw === 'canceled') statusAkhir = 'GAGAL';
        
        if(statusAkhir !== 'PENDING') {
            clearInterval(window.intervalCek[docId]);
            delete window.intervalCek[docId];
            
            if(window.updateFirestoreStatus) {
                window.updateFirestoreStatus(docId, statusAkhir, sn, JSON.stringify(res));
            }
        } else if (res.data && res.data.deeplink && window.auth && window.auth.currentUser) {
            try { window.updateDoc(window.doc(window.db, 'users', window.auth.currentUser.uid, 'riwayat_transaksi', docId), { sn: sn }); } catch(e){}
        }
    }
                    } catch(e) { console.log("Err Mon Kaje", e); }
                }, 6000);
            };
    
            window.loadKhfyData = async function() {
                const areaList = document.getElementById('listProdukArea');
                if(areaList) areaList.innerHTML = "<div style='padding:20px; text-align:center;'>Sistem KHFY sedang dalam perbaikan / migrasi ke sistem baru. Silakan gunakan menu lain.</div>";
            };
            window.monitorKhfyTrx = async function(trxId, docId) {};

            // --- INTEGRASI ICS STORE (PAKET AKRAB V2) ---
            window.icsData = [];
    
            window.loadIcsData = async function() {
                const areaList = document.getElementById('listProdukArea');

//=== ORIGINAL BLOCK 8113-8210 ===
            window.filterIcs = function(type, el) {
                document.querySelectorAll('.filter-card').forEach(e => e.classList.remove('active'));
                if(el) el.classList.add('active');
    
                const products = window.icsData.filter(i => (i.type || 'Lainnya').toUpperCase() === type);
                products.sort((a,b) => parseInt(a.price) - parseInt(b.price));
    
                let html = '';
                let markup = 0;
                if(window.markupConfig) {
                     if(window.markupConfig['Paket Akrab v2'] !== undefined) markup = parseInt(window.markupConfig['Paket Akrab v2']);
                     else if(window.markupConfig['General']) markup = parseInt(window.markupConfig['General']);
                }
    
        products.forEach(p => {
                    let pName = p.name || 'Produk';
                    let pCode = p.code || '-';
                    let rawM = (window.markupConfig && window.markupConfig[pCode] !== undefined) ? window.markupConfig[pCode] : markup;
                    let configMarkup = window.getMarkupValue(rawM, parseInt(p.price));
                    let currentMarkup = (pCode === 'CFMX' || pName.toLowerCase().includes('cek')) ? 0 : configMarkup;
                    let finalPrice = parseInt(p.price) + currentMarkup;
                    let desc = (p.description || '').replace(/\n/g, '<br>');
                    
                    const isPO = (arguments.length > 2 ? arguments[2] : false) || document.getElementById('judulMenu').innerText === 'PO Akrab';
                    let isAvailable = isPO || (p.status === 'available' && p.stock > 0);
                    let divStyle = isAvailable ? '' : "opacity:0.6; background:#fff0f0;";
                    let clickEvent = isPO ? `onclick="window.siapkanInvoicePO('${pCode}', '${pName}', ${finalPrice}, 'ICS')"` : (isAvailable ? `onclick="window.siapkanInvoiceIcs('${pCode}', '${pName}', ${finalPrice}, '${p.type}')"` : `onclick="alert('Stok Habis')"`);
                    let statusBadge = isPO ? `<span style="font-size:9px; background:#f39c12; color:white; padding:2px 4px; border-radius:4px; margin-left:5px;">PRE-ORDER</span>` : (isAvailable ? '' : `<span style="font-size:9px; background:red; color:white; padding:2px 4px; border-radius:4px;">GANGGUAN</span>`);
    
                    html += `<div class="item-produk" ${clickEvent} style="${divStyle}; flex-direction:column; align-items:flex-start;">
    <div style="width:100%; display:flex; justify-content:space-between; align-items:center;">
        <div>
            <div style="font-weight:bold;font-size:12px;">${pName} ${statusBadge}</div>
            <div style="font-size:10px; color:#999;">${pCode} • ${p.category || ''}</div>
                    <div style="font-size:10px; color:#10ac84; margin-top:2px; font-weight:bold;"><i class="fas fa-cubes"></i> Stok: ${p.stock}</div>
            <div style="font-size:10px; color:#10ac84; margin-top:2px; font-weight:bold;"><i class="fas fa-cubes"></i> Stok: ${p.stock}</div>
        </div>
        <div style="font-weight:bold;color:var(--primary);font-size:13px;">Rp ${new Intl.NumberFormat('id-ID').format(finalPrice)}</div>
    </div>
    ${desc ? `<div style="font-size:10px; color:#666; margin-top:5px; border-top:1px dashed #eee; padding-top:4px; width:100%; line-height:1.4;" class="desc-box">${desc}</div>` : ''}
                    </div>`;
                });
                
                const judulMenuText = document.getElementById('judulMenu') ? document.getElementById('judulMenu').innerText : '';
                if (judulMenuText === 'Paket Akrab All' || judulMenuText === 'PO Akrab') {
                    const modalProduk = document.getElementById('modalProdukList');
                    const areaListModal = document.getElementById('listProdukModalArea');
                    const judulKategori = document.getElementById('judulKategoriModal');
                    if(judulKategori) judulKategori.innerText = arguments[0]; 
                    if(areaListModal) areaListModal.innerHTML = html || "<div style='padding:20px; text-align:center;'>Produk kosong</div>";
                    if(modalProduk) modalProduk.style.display = 'flex';
                } else {
                    const areaList = document.getElementById('listProdukArea');
                    if(areaList) areaList.innerHTML = html || "<div style='padding:20px; text-align:center;'>Produk kosong</div>";
                }
            };
    
            window.siapkanInvoiceIcs = function(kode, nama, harga, type) {
                window.currentInvoiceData = { kode, nama, baseHarga: harga, isIcs: true };
                
                let placeholder = "Masukkan Nomor HP";
                if((type || '').toUpperCase().includes('URL') || (type || '').toUpperCase().includes('LINK')) placeholder = "Tempel Link di sini";
    
                const html = `
                    <style>#modalInvoice #invoiceFooter { display: none !important; }</style>
                    <div style="background: #f8fafc; border-radius: 15px; padding: 20px; border: 1px solid #edf2f7; margin-bottom: 20px;">
    <div style="text-align: center; margin-bottom: 15px;">
        <div style="font-size: 11px; color: #95a5a6; text-transform: uppercase; letter-spacing: 1px;">Konfirmasi Pesanan</div>
        <div style="font-size: 15px; font-weight: 800; color: #2c3e50; margin-top: 5px;">${nama}</div>
    </div>
    <div class="invoice-row" style="border-bottom: 1px dashed #eee; padding-bottom: 10px; margin-bottom: 15px;">
        <span>Kode Produk</span><b style="color: #666;">${kode}</b>
    </div>
    <div style="margin-bottom: 15px;">
        <label style="font-size: 10px; font-weight: 700; color: var(--primary); display: block; margin-bottom: 8px; text-transform: uppercase;">Tujuan / Nomor HP</label>
        <div class="input-group" style="margin-bottom: 0;">
            <input type="tel" inputmode="numeric" id="inputIcsTujuan" class="form-input" placeholder="${placeholder}" style="background: white; border: 2px solid #e1effe; color:#333; font-weight:bold; padding-right: 70px;">
            <i class="fas fa-pen" style="top: 15px;"></i>
            <button type="button" onclick="window.pasteDariClipboard('inputIcsTujuan')" style="position:absolute; right:10px; top:12px; background:var(--primary); color:white; border:none; border-radius:8px; padding:5px 10px; font-size:10px; font-weight:bold; cursor:pointer; z-index:10;">PASTE</button>
        </div>
    </div>
    <div class="invoice-row invoice-total" style="padding-top: 15px; margin-top: 5px;">
        <span>TOTAL BAYAR</span>
        <b style="color: var(--primary); font-size: 18px;">Rp ${new Intl.NumberFormat('id-ID').format(harga)}</b>
    </div>
                    </div>
                    <div id="icsCustomFooter">
    <button class="btn-konfirmasi" onclick="window.prosesBayarIcs()">BAYAR SEKARANG</button>
    <button class="btn-batal" onclick="document.getElementById('modalInvoice').style.display='none'">BATAL</button>
                    </div>`;
                
                document.getElementById('invoiceContent').innerHTML = html;
                document.getElementById('statusCekNama').style.display = 'none';
                document.getElementById('modalInvoice').style.display = 'flex';
                setTimeout(() => { const inp = document.getElementById('inputIcsTujuan'); if(inp) inp.focus(); }, 300);
            };
    
            window.prosesBayarIcs = async function() {

//=== ORIGINAL BLOCK 8348-8450 ===
            window.filterIcs = function(type, el) {
                document.querySelectorAll('.filter-card').forEach(e => e.classList.remove('active'));
                if(el) el.classList.add('active');
    
                const products = window.icsData.filter(i => (i.type || 'Lainnya').toUpperCase() === type);
                products.sort((a,b) => parseInt(a.price) - parseInt(b.price));
    
                let html = '';
        let markup = 0;
                if(window.markupConfig) {
                     if(window.markupConfig['Paket Akrab v2'] !== undefined) markup = parseInt(window.markupConfig['Paket Akrab v2']);
                     else if(window.markupConfig['General']) markup = parseInt(window.markupConfig['General']);
                }
    
        products.forEach(p => {
                    let pName = p.name || 'Produk';
                    let pCode = p.code || '-';
                    let rawM = (window.markupConfig && window.markupConfig[pCode] !== undefined) ? window.markupConfig[pCode] : markup;
                    let configMarkup = window.getMarkupValue(rawM, parseInt(p.harga_final));
                    let currentMarkup = (pCode === 'CFMX' || pName.toLowerCase().includes('cek')) ? 0 : configMarkup;
                    let finalPrice = parseInt(p.price) + currentMarkup;
                    let desc = (p.description || '').replace(/\n/g, '<br>');
                    
                    const isPO = (arguments.length > 2 ? arguments[2] : false) || document.getElementById('judulMenu').innerText === 'PO Akrab';
                    let isAvailable = isPO || (p.status === 'available' && p.stock > 0);
                    let divStyle = isAvailable ? '' : "opacity:0.6; background:#fff0f0;";
                    let clickEvent = isPO ? `onclick="window.siapkanInvoicePO('${pCode}', '${pName}', ${finalPrice}, 'ICS')"` : (isAvailable ? `onclick="window.siapkanInvoiceIcs('${pCode}', '${pName}', ${finalPrice}, '${p.type}')"` : `onclick="alert('Stok Habis')"`);
                    let statusBadge = isPO ? `<span style="font-size:9px; background:#f39c12; color:white; padding:2px 4px; border-radius:4px; margin-left:5px;">PRE-ORDER</span>` : (isAvailable ? '' : `<span style="font-size:9px; background:red; color:white; padding:2px 4px; border-radius:4px;">GANGGUAN</span>`);
    
                    html += `<div class="item-produk" ${clickEvent} style="${divStyle}; flex-direction:column; align-items:flex-start;">
    <div style="width:100%; display:flex; justify-content:space-between; align-items:center;">
        <div>
            <div style="font-weight:bold;font-size:12px;">${pName} ${statusBadge}</div>
            <div style="font-size:10px; color:#999;">${pCode} • ${p.category || ''}</div>
                    <div style="font-size:10px; color:#10ac84; margin-top:2px; font-weight:bold;"><i class="fas fa-cubes"></i> Stok: ${p.stock}</div>
        </div>
        <div style="font-weight:bold;color:var(--primary);font-size:13px;">Rp ${new Intl.NumberFormat('id-ID').format(finalPrice)}</div>
    </div>
    ${desc ? `<div style="font-size:10px; color:#666; margin-top:5px; border-top:1px dashed #eee; padding-top:4px; width:100%; line-height:1.4;" class="desc-box">${desc}</div>` : ''}
                    </div>`;
                });
                
                const judulMenuText = document.getElementById('judulMenu') ? document.getElementById('judulMenu').innerText : '';
                if (judulMenuText === 'Paket Akrab All' || judulMenuText === 'PO Akrab') {
                    const modalProduk = document.getElementById('modalProdukList');
                    const areaListModal = document.getElementById('listProdukModalArea');
                    const judulKategori = document.getElementById('judulKategoriModal');
                    if(judulKategori) judulKategori.innerText = arguments[0]; 
                    if(areaListModal) areaListModal.innerHTML = html || "<div style='padding:20px; text-align:center;'>Produk kosong</div>";
                    if(modalProduk) modalProduk.style.display = 'flex';
                } else {
                    const areaList = document.getElementById('listProdukArea');
                    if(areaList) areaList.innerHTML = html || "<div style='padding:20px; text-align:center;'>Produk kosong</div>";
                }
            };
    
            window.siapkanInvoiceIcs = function(kode, nama, harga, type) {
                window.currentInvoiceData = { kode, nama, baseHarga: harga, isIcs: true };
                
                let placeholder = "Masukkan Nomor HP";
                if((type || '').toUpperCase().includes('URL') || (type || '').toUpperCase().includes('LINK')) placeholder = "Tempel Link di sini";
    
                const html = `
                    <style>#modalInvoice #invoiceFooter { display: none !important; }</style>
                    <div style="background: #f8fafc; border-radius: 15px; padding: 20px; border: 1px solid #edf2f7; margin-bottom: 20px;">
    <div style="text-align: center; margin-bottom: 15px;">
        <div style="font-size: 11px; color: #95a5a6; text-transform: uppercase; letter-spacing: 1px;">Konfirmasi Pesanan</div>
        <div style="font-size: 15px; font-weight: 800; color: #2c3e50; margin-top: 5px;">${nama}</div>
    </div>
    <div class="invoice-row" style="border-bottom: 1px dashed #eee; padding-bottom: 10px; margin-bottom: 15px;">
        <span>Kode Produk</span><b style="color: #666;">${kode}</b>
    </div>
    <div style="margin-bottom: 15px;">
        <label style="font-size: 10px; font-weight: 700; color: var(--primary); display: block; margin-bottom: 8px; text-transform: uppercase;">Tujuan / Nomor HP</label>
        <div class="input-group" style="margin-bottom: 0;">
            <input type="text" id="inputIcsTujuan" class="form-input" placeholder="${placeholder}" style="background: white; border: 2px solid #e1effe; color:#333; font-weight:bold;">
            <i class="fas fa-pen" style="top: 15px;"></i>
        </div>
    </div>
    <div class="invoice-row invoice-total" style="padding-top: 15px; margin-top: 5px;">
        <span>TOTAL BAYAR</span>
        <b style="color: var(--primary); font-size: 18px;">Rp ${new Intl.NumberFormat('id-ID').format(harga)}</b>
    </div>
                    </div>
                    <div id="icsCustomFooter">
    <button class="btn-konfirmasi" onclick="window.prosesBayarIcs()">BAYAR SEKARANG</button>
    <button class="btn-batal" onclick="document.getElementById('modalInvoice').style.display='none'">BATAL</button>
                    </div>`;
                
                document.getElementById('invoiceContent').innerHTML = html;
                document.getElementById('statusCekNama').style.display = 'none';
                document.getElementById('modalInvoice').style.display = 'flex';
                setTimeout(() => { const inp = document.getElementById('inputIcsTujuan'); if(inp) inp.focus(); }, 300);
            };
    
            window.prosesBayarIcs = async function() {
                const user = window.auth.currentUser;
                if(!user) return;
                
                const data = window.currentInvoiceData;
                const hp = document.getElementById('inputIcsTujuan').value;
                if(!hp) return alert("Mohon isi Tujuan!");
    

//=== ORIGINAL BLOCK 8555-8600 ===
            window.loadKhfyData = async function() {
                const areaList = document.getElementById('listProdukArea');
                const areaFilter = document.getElementById('areaFilter');
                
                if(areaFilter) areaFilter.innerHTML = "";
                if(areaList) areaList.innerHTML = "<div style='text-align:center; padding:40px;'><i class='fas fa-circle-notch fa-spin'></i> Memuat Produk...</div>";
    
                try {
                    const req = await fetch('khfy_proxy.php?action=list');
                    const res = await req.json();
                    
                    if(res.data) {
    window.khfyData = res.data;
    window.renderKhfyBrands();
                    } else {
    if(areaList) areaList.innerHTML = `<div style='text-align:center; padding:20px;'>Gagal: ${res.message || 'Data Kosong'}</div>`;
                    }
                } catch(e) {
                    console.error(e);
                    if(areaList) areaList.innerHTML = "<div style='text-align:center; color:red; padding:20px;'>Gagal koneksi ke server.</div>";
                }
            };
    
            // LOGIKA KATEGORI SESUAI PERMINTAAN
            window.getKhfyCategory = function(item) {
                const kode = (item.kode_produk || "").toUpperCase();
                const provider = (item.kode_provider || "").toUpperCase();
                
                if (['FMX50', 'FMX65', 'FMX80', 'FMX150'].includes(kode)) return "XL Data Reguler";
                if (kode === 'XLB75') return "Akrab Fresh (XLA)";
                
                if (kode.startsWith("KDA")) return "KDA (PROMO)";
                if (kode.startsWith("XDA")) return "Akrab Fresh (XDA)";
                if (kode.startsWith("XLA")) return "Akrab Fresh (XLA)";
                if (kode.startsWith("FMX") || kode.startsWith("CFMX")) return "FlexMax (FMX)";
                if (kode.startsWith("CEKPLN") || provider.includes("PLN")) return "PLN Pascabayar";
                if (kode.startsWith("XLB") || kode.startsWith("XL")) return "XL Data Reguler";
                if (kode.startsWith("BPA") || kode.startsWith("BPAL")) return "Bonus Akrab";
                if (kode.startsWith("TES")) return "Tes System";
                
                return "LAINNYA";
            };
    
            window.renderKhfyBrands = function() {
                const rawBrands = window.khfyData.map(i => window.getKhfyCategory(i));
                // Filter Tes System & Sort

//=== ORIGINAL BLOCK 9225-9330 ===
            window.filterWz = function(el) {
                document.querySelectorAll('.akrab-btn, .filter-card').forEach(e => e.classList.remove('active'));
                if(el) el.classList.add('active');
    
                const products = Array.isArray(window.wzData) ? window.wzData.slice() : [];
    
                let html = '';
                products.forEach(p => {
                    const pName = p.nama_produk || p.nama || p.name || p.product_name || 'Produk WZ';
                    const pCode = String(p.kode_produk || p.kode || p.code || p.product_code || p.markup_key || '-').toUpperCase();
                    const basePrice = parseInt(p.harga_modal || p.harga_asli || p.modal || p.harga || p.price || 0) || 0;
                    let rawM = 0;
                    if(window.markupConfig) {
                        if(window.markupConfig[pCode] !== undefined) rawM = window.markupConfig[pCode];
                        else if(window.markupConfig[String(pCode).toUpperCase()] !== undefined) rawM = window.markupConfig[String(pCode).toUpperCase()];
                        else if(window.markupConfig[pName] !== undefined) rawM = window.markupConfig[pName];
                        else if(window.markupConfig['Cuan+(Promo)'] !== undefined) rawM = window.markupConfig['Cuan+(Promo)'];
                        else if(window.markupConfig['KDA (PROMO)'] !== undefined) rawM = window.markupConfig['KDA (PROMO)'];
                        else if(window.markupConfig['Paket Akrab'] !== undefined) rawM = window.markupConfig['Paket Akrab'];
                        else if(window.markupConfig['General'] !== undefined) rawM = window.markupConfig['General'];
                    }
                    const markup = window.getMarkupValue ? window.getMarkupValue(rawM, basePrice) : parseInt(rawM || 0);
                    const finalPrice = basePrice + markup;
                    const stok = parseInt(p.stok ?? p.stock ?? 0) || 0;
                    const ready = (p.ready === true || p.available === true || String(p.status || '').toUpperCase() === 'READY') && stok > 0;
                    const desc = String(p.deskripsi || p.description || '').replace(/\n/g, '<br>');
                    const safeName = String(pName).replace(/'/g, "\\'");
                    const safeCode = String(pCode).replace(/'/g, "\\'");
                    const statusBadge = ready
                        ? `<span style="font-size:9px; color:white; background:#10ac84; padding:2px 4px; border-radius:4px; margin-left:5px;">READY</span>`
                        : `<span style="font-size:9px; color:white; background:orange; padding:2px 4px; border-radius:4px; margin-left:5px;">KOSONG</span>`;
    
                    let divStyle = "flex-direction:column; align-items:flex-start;";
                    let clickEvent = `onclick="window.siapkanInvoiceWz('${safeCode}', '${safeName}', ${finalPrice})"`;
                    if(!ready) {
                        divStyle += " opacity:0.6; background:#fff8e1;";
                        clickEvent = `onclick="alert('Maaf, stok produk Cuan+(Promo) ini kosong.')"`;
                    }
    
                    html += `<div class="item-produk" ${clickEvent} style="${divStyle}">
                        <div style="width:100%; display:flex; justify-content:space-between; align-items:center;">
                            <div>
                                <div style="font-weight:bold;font-size:12px;">${pName} ${statusBadge}</div>
                                <div style="font-size:10px; color:#999;">${pCode} • Cuan+(Promo)</div>
                                <div style="font-size:10px; color:#10ac84; margin-top:2px; font-weight:bold;"><i class="fas fa-cubes"></i> Stok: ${stok}</div>
                            </div>
                            <div style="font-weight:bold;color:var(--primary);font-size:13px;">Rp ${new Intl.NumberFormat('id-ID').format(finalPrice)}</div>
                        </div>
                        ${desc ? `<div style="font-size:10px; color:#666; margin-top:5px; border-top:1px dashed #eee; padding-top:4px; width:100%; line-height:1.4;" class="desc-box">${desc}</div>` : ''}
                    </div>`;
                });
    
                const judulMenuText = document.getElementById('judulMenu') ? document.getElementById('judulMenu').innerText : '';
                if (judulMenuText === 'Paket Akrab All' || judulMenuText === 'PO Akrab') {
                    const modalProduk = document.getElementById('modalProdukList');
                    const areaListModal = document.getElementById('listProdukModalArea');
                    const judulKategori = document.getElementById('judulKategoriModal');
                    if(judulKategori) judulKategori.innerText = 'Cuan+(Promo)';
                    if(areaListModal) areaListModal.innerHTML = html || "<div style='padding:20px; text-align:center;'>Produk Cuan+(Promo) kosong</div>";
                    if(modalProduk) modalProduk.style.display = 'flex';
                } else {
                    const areaList = document.getElementById('listProdukArea');
                    if(areaList) areaList.innerHTML = html || "<div style='padding:20px; text-align:center;'>Produk Cuan+(Promo) kosong</div>";
                }
            };
    
            window.siapkanInvoiceWz = function(kode, nama, harga) {
                window.currentInvoiceData = { kode, nama, baseHarga: harga, isWz: true, provider: 'WZ' };
                const modalProduk = document.getElementById('modalProdukList');
                if(modalProduk) modalProduk.style.display = 'none';
    
                const html = `
                    <style>#modalInvoice #invoiceFooter { display: none !important; }</style>
                    <div style="background:#f8fafc; border-radius:15px; padding:20px; border:1px solid #edf2f7; margin-bottom:20px;">
                        <div style="text-align:center; margin-bottom:15px;">
                            <div style="font-size:11px; color:#95a5a6; text-transform:uppercase; letter-spacing:1px;">Konfirmasi Cuan+(Promo)</div>
                            <div style="font-size:15px; font-weight:800; color:#2c3e50; margin-top:5px;">${nama}</div>
                        </div>
                        <div class="invoice-row" style="border-bottom:1px dashed #eee; padding-bottom:10px; margin-bottom:15px;">
                            <span>Kode Produk</span><b style="color:#666;">${kode}</b>
                        </div>
                        <div style="margin-bottom:15px;">
                            <label style="font-size:10px; font-weight:700; color:var(--primary); display:block; margin-bottom:8px; text-transform:uppercase;">Nomor Tujuan</label>
                            <div class="input-group" style="margin-bottom:0;">
                                <input type="tel" inputmode="numeric" id="inputWzTujuan" class="form-input" placeholder="Masukkan Nomor Tujuan" style="background:white; border:2px solid #e1effe; color:#333; font-weight:bold; padding-right:70px;">
                                <i class="fas fa-edit" style="top:15px;"></i>
                                <button type="button" onclick="window.pasteDariClipboard('inputWzTujuan')" style="position:absolute; right:10px; top:12px; background:var(--primary); color:white; border:none; border-radius:8px; padding:5px 10px; font-size:10px; font-weight:bold; cursor:pointer; z-index:10;">PASTE</button>
                            </div>
                        </div>
                        <div class="invoice-row invoice-total" style="padding-top:15px; margin-top:5px;">
                            <span>TOTAL BAYAR</span>
                            <b style="color:var(--primary); font-size:18px;">Rp ${new Intl.NumberFormat('id-ID').format(harga)}</b>
                        </div>
                    </div>
                    <div id="wzCustomFooter">
                        <button class="btn-konfirmasi" onclick="window.prosesBayarWz()">BAYAR SEKARANG</button>
                        <button class="btn-batal" onclick="document.getElementById('modalInvoice').style.display='none'">BATAL</button>
                    </div>`;
    
                document.getElementById('invoiceContent').innerHTML = html;
                document.getElementById('statusCekNama').style.display = 'none';
                document.getElementById('modalInvoice').style.display = 'flex';
            };
    
            window.prosesBayarWz = async function() {
                const user = window.auth.currentUser;

//=== ORIGINAL BLOCK 9418-9525 ===
            window.monitorWzTrx = async function(trxId, docId) {
                let attempts = 0;
                const maxAttempts = 45;
                const interval = setInterval(async () => {
                    attempts++;
                    if(attempts > maxAttempts) {
                        clearInterval(interval);
                        return;
                    }
    
                    try {
                        const req = await fetch('wz_proxy.php?action=status', {
                            method: 'POST',
                            headers: { 'Content-Type': 'application/json' },
                            body: JSON.stringify({ order_id: trxId })
                        });
                        const res = await req.json();
                        const dataRes = (res && typeof res.data === 'object' && res.data !== null) ? res.data : res;
                        const st = String(dataRes.status || res.status || '').toLowerCase();
                        const msgRaw = String(dataRes.message || res.message || '').toLowerCase();
                        const httpCode = Number(dataRes._http_code || res._http_code || (res.raw && res.raw._http_code) || 0);
    
                        let statusAkhir = 'PENDING';
    
                        if(st.includes('success') || st.includes('sukses') || st.includes('berhasil')) {
                            statusAkhir = 'BERHASIL';
                        } else if(st.includes('failed') || st.includes('fail') || st.includes('gagal') || st.includes('cancel') || st.includes('refund')) {
                            statusAkhir = 'GAGAL';
                        } else if(st.includes('error')) {
                            if(httpCode === 404 || msgRaw.includes('tidak ditemukan') || msgRaw.includes('not found')) {
                                statusAkhir = attempts >= 3 ? 'GAGAL' : 'PENDING';
                            } else {
                                statusAkhir = 'GAGAL';
                            }
                        }
    
                        if(statusAkhir === 'PENDING') return;
    
                        clearInterval(interval);
                        const user = window.auth.currentUser;
                        if(!user) return;
    
                        const trxRef = window.doc(window.db, "users", user.uid, "riwayat_transaksi", docId);
                        const curSnap = await window.getDoc(trxRef);
                        if(curSnap.exists()) {
                            const curSt = String(curSnap.data().status || '').toUpperCase();
                            if(curSt === 'BERHASIL' || curSt === 'SUKSES') return;
                            if(curSt === 'GAGAL' && curSnap.data().isRefunded) return;
                        }
    
                        let sn = dataRes.sn || dataRes.serial_number || dataRes.message || res.message || '-';
                        if(statusAkhir === 'GAGAL' && (httpCode === 404 || msgRaw.includes('tidak ditemukan') || msgRaw.includes('not found'))) {
                            sn = 'Order WZ tidak ditemukan di server. Saldo dikembalikan otomatis.';
                        }
                        if(window.updateFirestoreStatus) {
                            window.updateFirestoreStatus(docId, statusAkhir, sn, JSON.stringify(res));
                        }
                        if(statusAkhir === 'GAGAL') {
                            window.showNotice('error', 'Transaksi Gagal', 'Saldo dikembalikan. Info: ' + sn);
                        } else {
                            window.showNotice('success', 'Transaksi Sukses', sn);
                        }
                        return;
                        if(statusAkhir === 'GAGAL' && (httpCode === 404 || msgRaw.includes('tidak ditemukan') || msgRaw.includes('not found'))) {
                            sn = 'Order WZ tidak ditemukan di server. Saldo dikembalikan otomatis.';
                        }
                        await window.updateDoc(trxRef, {
                            status: statusAkhir,
                            sn: sn,
                            raw_json: JSON.stringify(res)
                        });
    
                        if(statusAkhir === 'GAGAL') {
                            const trxSnap = await window.getDoc(trxRef);
                            if(trxSnap.exists() && !trxSnap.data().isRefunded) {
                                const amount = parseInt(trxSnap.data().harga || 0);
                                const userRef = window.doc(window.db, "users", user.uid);
                                const uSnap = await window.getDoc(userRef);
                                const saldoAkhir = (uSnap.data().saldo || 0) + amount;
    
                                await window.updateDoc(userRef, { saldo: saldoAkhir });
                                await window.updateDoc(trxRef, { isRefunded: true, sn: sn + ' (REFUND OTOMATIS)' });
    
                                if(window.triggerDoniGuard) {
                                    window.triggerDoniGuard({
                                        action: 'topup',
                                        produk: 'REFUND: ' + (trxSnap.data().produk || 'Cuan+(Promo)'),
                                        nominal: amount,
                                        trx_id: (trxSnap.data().trx_id || trxId) + '-REF',
                                        saldo_akhir_client: saldoAkhir
                                    });
                                }
    
                                window.showNotice('error', 'Transaksi Gagal', 'Saldo dikembalikan. Info: ' + sn);
                            }
                        } else {
                            window.showNotice('success', 'Transaksi Sukses', sn);
                        }
                    } catch(e) {
                        console.log("Monitoring WZ Skip:", e);
                    }
                }, 4000);
            };
    
    
            window.loadGabunganData = async function() {
                const areaList = document.getElementById('listProdukArea');
                const areaFilter = document.getElementById('areaFilter');
</script>
<script>

//=== ADDITIONAL BLOCK 5253-5400 ===
            window.hitungHargaBebas = function(val) {
                const data = window.currentInvoiceData;
                const baseFee = parseInt(data.baseHarga) || 0;
                const nominal = parseInt(val) || 0;
                const total = nominal + baseFee;
                document.getElementById('displayTotalInvoice').innerText = "Rp " + new Intl.NumberFormat('id-ID').format(total);
            }
    
            window.timerCekNama = null;
            window.intervalCekNamaPolling = null;
    
                    window.debounceCekNama = function(provider) {
                if(!provider) return;
                const hp = document.getElementById('invoiceNomorHP').value;
                const statusDiv = document.getElementById('statusCekNama');
                const areaNama = document.getElementById('areaNamaTujuan');
                
                if(areaNama) areaNama.style.display = "none";
                if(statusDiv) statusDiv.style.display = "none";
                
                if(window.intervalCekNamaPolling) clearInterval(window.intervalCekNamaPolling);
                if(window.timerCekNama) clearTimeout(window.timerCekNama);
                
                // MODIFIKASI: Khusus PLN cek jika > 8 digit (mulai digit 9), lainnya standar 10
                let triggerLength = (provider === 'PLN') ? 9 : 10;
    
                if(hp.length >= triggerLength) {
                    statusDiv.style.display = "block";
                    statusDiv.innerHTML = `<i class="fas fa-circle-notch fa-spin"></i> Menunggu...`;
                    window.timerCekNama = setTimeout(() => {
    window.jalankanCekNama(provider);
                    }, 2000);
                }
            };
    
            window.jalankanCekNama = async function(provider) {
                const hp = document.getElementById('invoiceNomorHP').value;
                const statusDiv = document.getElementById('statusCekNama');
                
                    const cekMap = {
                    "DANA": "Cek Nama Pengguna Dana",
                    "OVO": "Cek Nama Pengguna OVO",
                    "GOPAY": "Cek Nama Pengguna Gopay Customer",
                    "GOPAY_DRIVER": "Cek Nama Pengguna Gopay Driver",
                    "GRAB": "Cek Nama Pengguna Grab Penumpang",
                    "GRAB_DRIVER": "Cek Nama Pengguna Grab Driver",
                    "SHOPEE": "Cek Nama Pengguna Shopee Pay",
                    "ISAKU": "Cek Nama Pengguna iSaku",
                    "DOKU": "Cek Nama Pengguna Doku",
                    "KASPRO": "Cek Nama Pengguna Kaspro",
                    "ASTRAPAY": "Cek Nama Pengguna Astrapay",
                    "PLN": "CPLN" // Kode Produk Cek PLN
                };
    
                const pName = cekMap[provider];
                let pData;
    
                // LOGIKA KHUSUS PLN: Cari berdasarkan KODE 'CPLN' (bukan nama/keterangan)
                if(provider === 'PLN') {
                    pData = masterData.find(i => i.kode === 'CPLN') || masterData.find(i => (i.produk||'').toUpperCase().includes('CPLN'));
                } else {
                    pData = masterData.find(i => (i.keterangan || "").includes(pName) || (i.produk || "").includes(pName));
                }
                
                if(!pData) {
                    statusDiv.style.display = "none";
                    return;
                }
    
                statusDiv.innerHTML = `<i class="fas fa-spinner fa-spin"></i> Sedang mengecek nama pemilik...`;
                
                try {
                    const req = await fetch('api.php', { 
    method: 'POST', 
    body: JSON.stringify({ tujuan: hp, kode_produk: pData.kode, nama_produk: pData.keterangan, harga: 0 }), 
    headers: {'Content-Type': 'application/json'} 
                    });
                    const res = await req.json();
    
                    if(res.status === "PENDING" || res.status === "BERHASIL") {
    window.pollingCekNama(res.refID, hp, pData.kode);
                    } else {
    let errPesan = res.message || "Terjadi kesalahan";
    if (errPesan.toLowerCase().includes('gangguan')) {
        errPesan = "Cek nama sedang gangguan dari provider.";
    } else if (typeof window.bersihkanPesan === 'function') {
        errPesan = window.bersihkanPesan(errPesan);
    }
    statusDiv.innerHTML = `<span style="color:var(--danger); font-size:11px;"><i class="fas fa-exclamation-circle"></i> Gagal: ${errPesan}</span>`;
    setTimeout(() => { if(statusDiv.innerHTML.includes('Gagal')) statusDiv.style.display = "none"; }, 3000);
                    }
                } catch(e) {
                    statusDiv.style.display = "none";
                }
            };
    
            window.pollingCekNama = function(refID, hp, kode) {
                window.intervalCekNamaPolling = setInterval(async () => {
                    const statusDiv = document.getElementById('statusCekNama');
                    try {
    const req = await fetch('cek_status.php', { 
        method: 'POST', 
        body: JSON.stringify({ refID: refID, tujuan: hp, kode_produk: kode }),
        headers: {'Content-Type': 'application/json'}
    });
    const res = await req.json();
    
    if(res.status === "BERHASIL" || res.status === "Sukses") {
        clearInterval(window.intervalCekNamaPolling);
        let sn = res.sn || "";
        let cleanName = window.bersihkanPesan(sn).replace(/SN:|Nama:|Hrg 0|Trx ke-\\d+|Saldo[\\d\\.\\s\\=]+/gi, "").trim();
        
        document.getElementById('areaNamaTujuan').style.display = "block";
        document.getElementById('valNamaTujuan').innerText = cleanName;
        statusDiv.style.display = "none";
    } else if(res.status === "GAGAL") {
        clearInterval(window.intervalCekNamaPolling);
        statusDiv.innerHTML = `<span style="color:var(--danger); font-size:11px;"><i class="fas fa-times"></i> Nama tidak ditemukan</span>`;
        setTimeout(() => { if(statusDiv.innerHTML.includes('tidak ditemukan')) statusDiv.style.display = "none"; }, 3000);
    }
                    } catch(e) { }
                }, 5000);
            };
            window.tutupInvoice = () => {
                if(window.intervalCekNamaPolling) clearInterval(window.intervalCekNamaPolling);
                if(window.timerCekNama) clearTimeout(window.timerCekNama);
                modalInvoice.style.display = "none";
            }
            window.tutupModal = () => modal.style.display = "none";
    
            window.cekSinkronisasiDoniGuard = async function(uid, currentSaldo) {
        try {
    const auditReq = await fetch('doniguard.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ uid: uid, action: 'check', produk: 'AUDIT_PRA_TRX', nominal: 0, saldo_akhir_client: currentSaldo })
    });
    const auditRes = await auditReq.json();
    if (auditRes.status === 'success' && auditRes.audit && auditRes.audit.force_sync === true) {
        await window.updateDoc(window.doc(window.db, "users", uid), { saldo: parseInt(auditRes.audit.correct_balance) });
        window.showNotice('error', 'Sinkronisasi', 'sedang memproses transaksi harap tunggu');
        setTimeout(() => window.location.reload(true), 2000);
        return false;
    }
    return true;
        } catch(e) {
    console.warn("DoniGuard Check Error:", e);
    return true;

//=== ADDITIONAL BLOCK 5712-5770 ===
            window.tambahKeKeranjang = (id, nama, harga, img) => {
                window.keranjang.push({id, nama, harga, img});
                updateBadgeCart();
                alert('Produk ditambahkan ke Keranjang!');
            };
    
            window.updateBadgeCart = () => {
                const len = window.keranjang.length;
                const b = document.getElementById('badgeCart'); 
                const b2 = document.getElementById('badgeCart2');
                if(b) { b.style.display = len > 0 ? 'block' : 'none'; b.innerText = len; }
                if(b2) { b2.style.display = len > 0 ? 'block' : 'none'; b2.innerText = len; }
            };
    
            window.renderKeranjang = () => {
                const area = document.getElementById('cartList');
                let html = '';
                let total = 0;
                if(window.keranjang.length === 0) html = "<div style='text-align:center; padding:50px;'><i class='fas fa-shopping-basket' style='font-size:50px; color:#ddd; margin-bottom:10px;'></i><p style='color:#999; margin:0;'>Keranjang Kosong</p></div>";
                else {
                    window.keranjang.forEach((item, idx) => {
    total += parseInt(item.harga);
    html += `<div class="cart-item">
        <img src="${item.img||'https://via.placeholder.com/60'}" class="cart-img">
        <div class="cart-desc">
            <b style="font-size:13px; line-height:1.2;">${item.nama}</b>
            <span style="font-size:12px; color:var(--primary); font-weight:bold;">Rp ${new Intl.NumberFormat('id-ID').format(item.harga)}</span>
        </div>
        <i class="fas fa-trash-alt" style="color:#e74c3c; cursor:pointer; font-size:16px;" onclick="hapusItemCart(${idx})"></i>
    </div>`;
                    });
                }
                area.innerHTML = html;
                document.getElementById('cartTotal').innerText = 'Rp ' + new Intl.NumberFormat('id-ID').format(total);
            };
                
    
            window.checkoutWA = () => {
                if(window.keranjang.length === 0) return alert('Keranjang kosong!');
                let text = "Halo Admin, saya ingin pesan:%0A";
                let total = 0;
                window.keranjang.forEach(i => {
                    text += `- ${i.nama} (Rp ${i.harga})%0A`;
                    total += parseInt(i.harga);
                });
                text += `%0ATotal: Rp ${total}`;
                window.open(`https://wa.me/${whatsappAdmin}?text=${text}`, '_blank');
            };
    
        window.loadProdukLapak = () => {
                // Pastikan Auth sudah siap
                const user = window.auth.currentUser;
                const area = document.getElementById('listProdukLapak');
                
                if(!user) {
                    area.innerHTML = "<p style='text-align:center;color:red'>Silakan login ulang untuk melihat lapak.</p>";
                    return;
                }
                

//=== ADDITIONAL BLOCK 6851-7120 ===
                                window.cekOngkirDetail = async () => {
                window.debugLog("--- CEK ONGKIR (MULTI-LAYER) ---", 'warn');
                const destId = document.getElementById('checkDist').value;
                const kurirCode = document.getElementById('checkKurirCode').value;
                const resArea = document.getElementById('hasilOngkirDetail');
                const p = window.currentProduct;
                const EMERGENCY_ID = "32.15.01"; // Karawang (Jalur Darurat)
    
                if(!destId) return alert("Pilih kecamatan tujuan!");
                
                resArea.innerHTML = "<i class='fas fa-circle-notch fa-spin'></i>...";
                
                // Daftar ID yang akan dicoba berurutan
                let attemptList = [];
    
                // 1. Cek Origin Seller
                if(p.seller_uid && p.seller_uid !== 'ADMIN') {
                    try {
    const sDoc = await window.getDoc(window.doc(window.db, "users", p.seller_uid));
    if(sDoc.exists() && sDoc.data().origin_id) {
        attemptList.push(sDoc.data().origin_id);
    }
                    } catch(e) { window.debugLog("Gagal load data seller", 'error'); }
                }
    
                // 2. Masukkan Origin Pusat & Emergency
                if(typeof ORIGIN_ID !== 'undefined') attemptList.push(ORIGIN_ID);
                attemptList.push(EMERGENCY_ID);
    
                // Filter: Hapus ID kosong dan duplikat
                attemptList = [...new Set(attemptList.filter(id => id && id !== "undefined" && id !== ""))];
                
                window.debugLog(`Rencana Percobaan ID: ${attemptList.join(' -> ')}`);
    
                let successJson = null;
                let lastError = "";
    
                // LOOPING PERCOBAAN
                for (const activeOrigin of attemptList) {
                    window.debugLog(`>> Mencoba Origin: ${activeOrigin}...`);
                    try {
    const payload = { 
        origin: String(activeOrigin), 
        destination: String(destId), 
        weight: Math.max(100, parseInt(p.berat || 1000)),
        couriers: "jne,jnt,sicepat,pos,tiki" 
    };
    
    const req = await fetch(`${KLIKRESI_PROXY}?action=rates`, {
        method: 'POST', headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(payload)
    });
    
    const raw = await req.text();
    let json;
    try { json = JSON.parse(raw); } catch(e) { throw new Error("Respon API bukan JSON"); }
    
    if(json.message) throw new Error(json.message);
    if(!json.data || !json.data.pricing) throw new Error("Data tidak lengkap");
    
    // Jika sampai sini, berarti SUKSES
    successJson = json;
    window.debugLog("BERHASIL!", 'info');
    break; // Keluar dari loop
    
                    } catch(e) {
    lastError = e.message;
    window.debugLog(`Gagal (${activeOrigin}): ${e.message}`, 'error');
    // Lanjut ke ID berikutnya...
                    }
                }
    
                // RENDER HASIL
                if(successJson) {
                    const find = successJson.data.pricing.find(x => x.courier_code === kurirCode);
                    if(find) {
    const priceFmt = new Intl.NumberFormat('id-ID').format(find.price);
    resArea.innerHTML = `Rp ${priceFmt} (${find.duration})`;
                    } else {
    resArea.innerHTML = "Tdk Tersedia";
    window.debugLog(`Kurir ${kurirCode} tidak ada di rute ini.`);
                    }
                } else {
                    resArea.innerHTML = "Gagal";
                    window.debugLog(`SEMUA PERCOBAAN GAGAL. Last Error: ${lastError}`, 'error');
                    alert("Gagal Cek Ongkir: " + lastError);
                }
            };
    
            
    
                    window.aksiBeliLangsung = () => {
                window.checkoutItem = window.currentProduct;
                document.getElementById('modalCheckoutFisik').style.display = 'flex';
                document.getElementById('coSubtotal').innerText = 'Rp ' + new Intl.NumberFormat('id-ID').format(window.currentProduct.harga);
                window.loadProvinces('shipProv');
            };
    
            window.aksiKeranjang = () => {
                window.tambahKeKeranjang(window.currentProduct.id, window.currentProduct.nama, window.currentProduct.harga, window.currentProduct.img);
                document.getElementById('modalProductDetail').style.display = 'none';
            };
    
            // LOGIKA CHECKOUT & ONGKIR
                window.loadProvinces = async (selectId) => {
                const el = document.getElementById(selectId);
                if(!el) return;
                try {
                    const res = await fetch(`${KLIKRESI_PROXY}?action=provinces`);
                    const json = await res.json();
                    if(!json.data) throw new Error("Respon API tidak valid");
                    
                    let html = '<option value="">Pilih Provinsi</option>';
                    json.data.forEach(p => html += `<option value="${p.id}">${p.name}</option>`);
                    el.innerHTML = html;
                } catch (e) {
                    console.error("Gagal load provinsi:", e);
                    alert("Gagal memuat data provinsi. Pastikan klikresi_proxy.php sudah benar.");
                }
            };
    
            window.loadCities = async (provId, selectId) => {
                const el = document.getElementById(selectId);
                if(!el) return;
                if(!provId) return el.innerHTML = '<option value="">Pilih Kota</option>';
                el.innerHTML = '<option>Loading...</option>';
                try {
                    const res = await fetch(`${KLIKRESI_PROXY}?action=cities&province_id=${provId}`);
                    const json = await res.json();
                    let html = '<option value="">Pilih Kota</option>';
                    json.data.forEach(c => html += `<option value="${c.id}">${c.name}</option>`);
                    el.innerHTML = html;
                } catch (e) { console.error("Gagal load kota"); }
            };
    
            window.loadDistricts = async (cityId, selectId) => {
                const el = document.getElementById(selectId);
                if(!el) return;
                if(!cityId) return el.innerHTML = '<option value="">Pilih Kecamatan</option>';
                el.innerHTML = '<option>Loading...</option>';
                try {
                    const res = await fetch(`${KLIKRESI_PROXY}?action=districts&city_id=${cityId}`);
                    const json = await res.json();
                    let html = '<option value="">Pilih Kecamatan</option>';
                    json.data.forEach(d => html += `<option value="${d.id}">${d.name}</option>`);
                    el.innerHTML = html;
                } catch (e) { console.error("Gagal load kecamatan"); }
            };
    
        window.simpanAlamatSeller = async () => {
                const user = window.auth.currentUser;
                if(!user) return alert("Silakan login ulang!");
    
                const distEl = document.getElementById('sellerDist');
                if(!distEl || distEl.selectedIndex === -1 || !distEl.value) return alert("Pilih kecamatan asal!");
                
        const distId = distEl.value;
                const distName = distEl.options[distEl.selectedIndex].text;
                window.showNotice('loading', 'Menyimpan', 'Mengupdate alamat toko...');
                try {
                    await window.setDoc(window.doc(window.db, "users", user.uid), { 
    origin_id: distId, 
    origin_name: distName 
                    }, { merge: true });
                    window.showNotice('success', 'Berhasil', 'Alamat toko otomatis diperbarui ke ID: ' + distId);
                    
                    ORIGIN_ID = distId;
                    document.getElementById('txtAlamatTersimpan').innerText = distName;
                    window.showNotice('success', 'Berhasil', 'Alamat toko telah diperbarui.');
                } catch(e) { 
                    console.error(e);
                    window.showNotice('error', 'Gagal', e.message); 
                }
            };
    
            window.hitungOngkirKlikResi = async () => {
                const destId = document.getElementById('shipDist').value;
                const kurirSelect = document.getElementById('shipKurir');
                if (!destId) return;
                kurirSelect.innerHTML = '<option>Memuat Kurir...</option>';
                try {
                    let origin = ORIGIN_ID;
                    if(window.checkoutItem.seller_uid && window.checkoutItem.seller_uid !== 'ADMIN') {
    const sDoc = await window.getDoc(window.doc(window.db, "users", window.checkoutItem.seller_uid));
    if(sDoc.exists() && sDoc.data().origin_id) origin = sDoc.data().origin_id;
                    }
                    const response = await fetch(`${KLIKRESI_PROXY}?action=rates`, {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify({                         origin: String(origin || ORIGIN_ID || "32.15.01"), destination: String(destId), weight: Math.max(100, parseInt(window.checkoutItem.berat || 1000)), couriers: "jne,jnt,sicepat,pos,tiki" })
                    });
                    const json = await response.json();
                    let html = '<option value="">-- Pilih Kurir --</option>';
                    window.tempPricing = json.data.pricing;
                    json.data.pricing.forEach((p, index) => {
    html += `<option value="${index}">${p.courier_name} ${p.service} - Rp ${new Intl.NumberFormat('id-ID').format(p.price)} (${p.duration})</option>`;
                    });
                    kurirSelect.innerHTML = html;
                } catch (e) { kurirSelect.innerHTML = '<option>Error: ' + e.message + '</option>'; }
            };
    
                    window.updateTotalDenganOngkir = () => {
                const idx = document.getElementById('shipKurir').value;
                if (idx === "") return;
                const p = window.tempPricing[idx];
                const subtotal = parseInt(window.checkoutItem.harga);
                const ongkir = parseInt(p.price);
                const total = subtotal + ongkir;
    
                document.getElementById('coOngkir').innerText = 'Rp ' + new Intl.NumberFormat('id-ID').format(ongkir);
                document.getElementById('coTotal').innerText = 'Rp ' + new Intl.NumberFormat('id-ID').format(total);
                document.getElementById('coTotal').dataset.value = total;
                document.getElementById('coOngkir').dataset.value = ongkir;
                document.getElementById('shipKurir').dataset.selectedCode = p.courier_code; 
            };
    
        window.prosesCheckoutFisik = async () => {
                const user = window.auth.currentUser;
                if(!user) return alert("Silakan login!");
                const alamat = document.getElementById('shipAlamat').value;
                const provEl = document.getElementById('shipProv');
                const cityEl = document.getElementById('shipCity');
                const distEl = document.getElementById('shipDist');
                const kurirIdx = document.getElementById('shipKurir').value;
                if(!alamat || !distEl.value || kurirIdx === "") return alert("Data tidak lengkap!");
    
                const pKurir = window.tempPricing[kurirIdx];
                const ongkir = parseInt(pKurir.price);
                const totalFinal = parseInt(window.checkoutItem.harga) + ongkir;
                
                const userDoc = await window.getDoc(window.doc(window.db, "users", user.uid));
                const saldoUser = userDoc.data().saldo || 0;
                if(saldoUser < totalFinal) return alert("Saldo tidak cukup!");
        if (!(await window.cekSinkronisasiDoniGuard(user.uid, saldoUser))) return;
                
                if(!confirm(`Bayar Rp ${new Intl.NumberFormat('id-ID').format(totalFinal)}?`)) return;
                window.showNotice('loading', 'Memproses', 'Membuat pesanan...');
                
                try {
                    await window.updateDoc(window.doc(window.db, "users", user.uid), { saldo: saldoUser - totalFinal });
                    const fullAlamat = `${alamat}, ${distEl.options[distEl.selectedIndex].text}, ${cityEl.options[cityEl.selectedIndex].text}, ${provEl.options[provEl.selectedIndex].text}, ${document.getElementById('shipKodepos').value}`;
    
                    await window.addDoc(window.collection(window.db, "pesanan_fisik"), {
    uid: user.uid,
    username: userDoc.data().username || "User",
    produk: window.checkoutItem.nama,
    produk_img: window.checkoutItem.img || "",
    produk_id: window.checkoutItem.id,
    harga_barang: window.checkoutItem.harga,
    ongkir: ongkir,
    total: totalFinal,
    alamat_lengkap: fullAlamat,
    kurir: `${pKurir.courier_name} (${pKurir.service})`,
    status: "DIKEMAS",
    resi: "",
    seller_uid: window.checkoutItem.seller_uid || "ADMIN",
    timestamp: window.serverTimestamp()
                    });
                    window.showNotice('success', 'Berhasil', 'Pesanan sedang dikemas.');
                    document.getElementById('modalCheckoutFisik').style.display = 'none';
                    document.getElementById('modalProductDetail').style.display = 'none';
                } catch(e) { window.showNotice('error', 'Gagal', e.message); }
            };
    
        window.loadPesananFisik = () => {
                const user = window.auth.currentUser;
                if(!user) return;
                const area = document.getElementById('listPesananFisik');
                area.innerHTML = "<p style='text-align:center; margin-top:50px; color:#999;'>Memuat pesanan...</p>";
                

//=== ADDITIONAL BLOCK 7354-7650 ===
            window.tampilkanModalTagihan = async function(sn, kodeCek, tujuan) {
                // 1. Parsing SN
                let cleanSN = (sn || "").replace(/SUKSES\.?/gi, '')
                    .replace(/T#\d+/gi, '').replace(/R#\d+/gi, '')
                    .replace(/Ref:/gi, '').replace(/SN:/gi, '')
                    .replace(/Hrg\s+[\d\.,]+/gi, '')
                    .replace(/\.?\s*Trx ke-\d+\s+gunakan format yang benar/gi, '')
                    .trim();
                cleanSN = cleanSN.replace(/^[\.\-\/\s]+/, '');
    
                let dataMap = {};
                let parts = cleanSN.split(/[\/|]/);
                parts.forEach((p, index) => {
                    let seg = p.trim();
                    if(seg.includes(':')) {
    let [k, v] = seg.split(':');
    if(k && v && !k.includes('@') && k.length < 20) dataMap[k.trim().toUpperCase()] = v.trim();
                    } else if(seg.length > 2 && index === 0) {
    dataMap['HEADER'] = seg;
                    }
                });
    
                const fmt = (v) => 'Rp ' + new Intl.NumberFormat('id-ID').format(v);
                const parseNum = (v) => parseInt((v || "0").replace(/[^0-9]/g, '')) || 0;
    
                // 2. Ambil Nominal Tagihan
                let ttagProvider = parseNum(dataMap['TTAG'] || dataMap['TOTAL'] || dataMap['TOTAL BAYAR']);
                if(ttagProvider === 0) {
                    let tag = parseNum(dataMap['TAG'] || dataMap['TAGIHAN'] || dataMap['RP TAG']);
                    let adm = parseNum(dataMap['ADMIN'] || dataMap['ADM'] || dataMap['BIAYA ADMIN']);
                    let denda = parseNum(dataMap['DENDA'] || dataMap['JML DENDA'] || dataMap['TOTAL BAYAR DENDA']);
                    ttagProvider = tag + adm + denda;
                }
                
                let nama = dataMap['NAMA'] || dataMap['NAMA PELANGGAN'] || dataMap['NAMA PESERTA'] || dataMap['HEADER'] || "Pelanggan";
                if(nama) nama = nama.replace(/^\d+/, '').trim();
    
                if(ttagProvider <= 0) return alert("Gagal membaca tagihan dari server.\n" + cleanSN);
    
                // 3. LOGIKA SAFETY FIX: Cegah Error 'find' of undefined
                // Kita cek window.masterData, jika undefined pakai array kosong
                let safeData = window.masterData || [];
                if(safeData.length === 0 && typeof masterData !== 'undefined') safeData = masterData;
                
                let itemCek = safeData.find(i => i.kode === kodeCek);
                let kodeBayar = "";
                
                const patterns = [
                    { s: 'CPAM', r: 'BPAM' }, { s: 'CPBB', r: 'BPBB' }, 
                    { s: 'CEK', r: 'BYR' }, { s: 'INQ', r: 'PAY' }, 
                    { s: 'C', r: 'B' }
                ];
                for (const p of patterns) {
                    if (kodeCek.startsWith(p.s)) {
    const candidate = p.r + kodeCek.substring(p.s.length);
    if (safeData.find(i => i.kode === candidate)) { 
        kodeBayar = candidate; break; 
    }
                    }
                }
                if (!kodeBayar && kodeCek.startsWith('CPAM')) kodeBayar = kodeCek.replace('CPAM', 'BPAM');
    
                // Ambil Produk Bayar
                let itemBayar = safeData.find(i => i.kode === kodeBayar);
                
                let hargaPotongan = itemBayar ? parseInt(itemBayar.harga) : 0;
                let biayaAdminToko = 0;
                
                if(window.markupConfig && itemCek) {
                    let rawM = window.markupConfig[itemCek.produk] || window.markupConfig['General'];
                    biayaAdminToko = window.getMarkupValue(rawM, ttagProvider);
                }
                
                let tagihanPokok = ttagProvider + hargaPotongan; 
                let totalBayar = tagihanPokok + biayaAdminToko;
    
                // 4. Render HTML
                let htmlDetails = "";
                const addRow = (lbl, val) => `<tr><td class="label">${lbl}</td><td class="value">${val}</td></tr>`;
                
                if(dataMap['IDPEL'] || (dataMap['TAG'] && dataMap['KWH'])) {
                     htmlDetails += addRow("ID Pel", dataMap['IDPEL'] || tujuan) + addRow("Nama", nama) + addRow("Daya/Tarif", dataMap['TARIF'] || dataMap['DAYA'] || "-") + addRow("Periode", dataMap['BL/TH'] || dataMap['PERIODE'] || "-") + addRow("Tagihan", fmt(parseNum(dataMap['TAG'] || dataMap['RP TAG'])));
                } else if(dataMap['M3'] || dataMap['PAKAI'] || kodeCek.includes('PAM')) {
                     htmlDetails += addRow("ID Pel", dataMap['IDPEL'] || dataMap['ID'] || tujuan) + addRow("Nama", nama) + addRow("Periode", dataMap['PERIODE'] || dataMap['BLN'] || "-") + addRow("Pakai", (dataMap['M3'] || dataMap['PAKAI'] || "0") + " m³") + addRow("Tagihan", fmt(parseNum(dataMap['TAG'])));
                } else if(kodeCek.includes('BPJS')) {
                     htmlDetails += addRow("No. VA", dataMap['NO VA'] || dataMap['NO PESERTA'] || tujuan) + addRow("Nama", nama) + addRow("Jumlah", (dataMap['JML PST'] || dataMap['PESERTA'] || "1") + " Orang");
                } else {
                     for (let [k, v] of Object.entries(dataMap)) {
    if(!['HEADER','SN','SUKSES','TAG','ADMIN','TTAG','TOTAL'].includes(k)) htmlDetails += addRow(k, v);
                     }
                }
    
                htmlDetails += `<tr style="border-top:1px dashed #ccc; margin-top:5px;"><td class="label" style="color:#000;">Tagihan Utama</td><td class="value">${fmt(tagihanPokok)}</td></tr>`;
                htmlDetails += `<tr><td class="label" style="color:#000;">Biaya Admin</td><td class="value">${fmt(biayaAdminToko)}</td></tr>`;
    
                document.getElementById('tagihanContent').innerHTML = `<div class="bill-header">${nama}</div><table class="bill-table">${htmlDetails}</table>`;
                document.getElementById('tagihanTotal').innerText = fmt(totalBayar);
    
                document.getElementById('tagihanDataRaw').value = JSON.stringify({
                    tujuan: tujuan,
                    kode_produk: kodeBayar,
                    nama_produk: "Bayar " + nama,
                    harga: totalBayar
                });
                document.getElementById('modalTagihan').style.display = 'flex';
            };
    
            window.prosesBayarTagihan = async function() {
                const raw = document.getElementById('tagihanDataRaw').value;
                if(!raw) return;
                const data = JSON.parse(raw);
                
                if(!confirm(`Bayar tagihan senilai Rp ${new Intl.NumberFormat('id-ID').format(data.harga)}?`)) return;
                document.getElementById('modalTagihan').style.display = 'none';
                
                const user = window.auth.currentUser;
                if(!user) return;
                window.showNotice('loading', 'Memproses', 'Membayar tagihan...');
                
                try {
                    // 1. Cek Saldo
                    const uDoc = await window.getDoc(window.doc(window.db, "users", user.uid));
                    const curSaldo = uDoc.data().saldo || 0;
                    if(curSaldo < data.harga) return window.showNotice('error', 'Gagal', 'Saldo tidak mencukupi!');
    if (!(await window.cekSinkronisasiDoniGuard(user.uid, curSaldo))) return;
                    
                    await window.updateDoc(window.doc(window.db, "users", user.uid), { saldo: curSaldo - data.harga });
    
                    // 2. Kirim Request Bayar
                    const req = await fetch('api.php', {
    method: 'POST',
    headers: {'Content-Type': 'application/json'},
    body: JSON.stringify(data)
                    });
                    const res = await req.json();
                    const cleanMsg = window.bersihkanPesan(res.message);
                    
                    if(res.status === 'PENDING' || res.status === 'BERHASIL') {
    window.showNotice('success', 'Berhasil', cleanMsg);
    
    // Simpan History Pembayaran
    if(window.simpanKeFirestore) window.simpanKeFirestore(data, res.status, cleanMsg, res.refID, user.uid, uDoc.data().username, JSON.stringify(res));
    
    // Trigger DoniGuard (Jika Ada)
    if(window.triggerDoniGuard) {
         window.triggerDoniGuard({
             action: 'transaksi',
             produk: data.nama_produk,
             nominal: data.harga,
             saldo_akhir_client: curSaldo - data.harga
         });
    }
                    } else {
    window.showNotice('error', 'Gagal', cleanMsg);
    const currentSnapTagihan = await window.getDoc(window.doc(window.db, "users", user.uid));
    const latestSaldoTagihan = currentSnapTagihan.exists() ? (currentSnapTagihan.data().saldo || 0) : 0;
    await window.updateDoc(window.doc(window.db, "users", user.uid), { saldo: latestSaldoTagihan + data.harga });
                    }
                } catch(e) {
                    window.showNotice('error', 'Error', 'Terjadi kesalahan sistem');
                }
            };
    
            
            /* LOGIKA CHAT V2 (AUTO EXPAND, REPLY, BAD WORD FILTER) */
            window.chatListener = null; 
            window.isChatOpen = false; 
            window.currentReply = null;
    
            window.autoResizeChat = function(el) {
                el.style.height = 'auto';
                el.style.height = Math.min(el.scrollHeight, 120) + 'px';
            };
    
            window.bukaChatPublic = function() { 
                const user = window.auth.currentUser; 
                if(!user) return alert("Silakan login untuk chatting!"); 
                document.getElementById('modalChatPublic').style.display = 'flex'; 
                window.isChatOpen = true; 
                document.getElementById('badgeChat').style.display = 'none'; 
                
                setTimeout(() => window.scrollToBottom(), 300); 
                if(!window.chatListener) { window.initChatListener(); } 
            };  
    
            
    
            // LOGIKA FAKE LIVE TRANSACTION
            
    
            window.tutupChatPublic = function() {
                document.getElementById('modalChatPublic').style.display = 'none';
                window.isChatOpen = false;
                if(window.chatInterval) clearInterval(window.chatInterval);
                window.cancelReply();
            }; 
            
            window.scrollToBottom = function() { 
                const box = document.getElementById('areaChatBox'); 
                if(box) box.scrollTop = box.scrollHeight; 
            }; 
            
            window.replyToMessage = function(id, name, text) {
                window.currentReply = { id, name, text };
                document.getElementById('replyName').innerText = name;
                document.getElementById('replyText').innerText = text;
                document.getElementById('chatReplyPreview').style.display = 'flex';
                document.getElementById('inputPesanChat').focus();
            };
    
            window.cancelReply = function() {
                window.currentReply = null;
                document.getElementById('chatReplyPreview').style.display = 'none';
                // Reset height textarea jika kosong
                const input = document.getElementById('inputPesanChat');
                if(!input.value) input.style.height = 'auto';
            };
    
            window.chatInterval = null;
            window.initChatListener = function() {
                const user = window.auth.currentUser;
                if(!user) return;
                const box = document.getElementById('areaChatBox');
    
                const fetchChat = async () => {
                    try {
    const response = await fetch(`datapesan/api_chat.php?action=get_messages&uid=${user.uid}`);
    const data = await response.json();
    let html = "";
    
    if (!data || data.length === 0) {
        html = "<div style='text-align:center; padding:40px; color:#ccc; font-size:12px;'>Belum ada obrolan pribadi dengan Admin.</div>";
    } else {
        data.forEach(m => {
            const isMe = m.sender === 'user';
            const bubbleClass = isMe ? 'me' : 'admin';
            const displayName = isMe ? 'Saya' : 'Admin';
            html += `<div class="chat-bubble ${bubbleClass}"><div class="chat-name">${displayName}</div><div style="white-space: pre-wrap;">${m.text}</div><div class="chat-time">${m.time}</div></div>`;
        });
    }
    box.innerHTML = html;
    if(window.isChatOpen) window.scrollToBottom();
                    } catch(e) { console.log("Chat Polling Error", e); }
                };
    
                fetchChat();
                if(window.chatInterval) clearInterval(window.chatInterval);
                window.chatInterval = setInterval(fetchChat, 3000);
            };; 
            
            window.kirimPesanChat = async function() {
                const user = window.auth.currentUser;
                const input = document.getElementById('inputPesanChat');
                let msg = input.value.trim();
                if(!user || !msg) return;
    
                input.value = "";
                input.style.height = 'auto';
    
                try {
                    const formData = new FormData();
                    formData.append('action', 'send');
                    formData.append('uid', user.uid);
                    formData.append('pesan', msg);
                    formData.append('pengirim', 'user');
                    formData.append('nama', document.getElementById('headerName').innerText || "User");
    
                    await fetch('datapesan/api_chat.php', { method: 'POST', body: formData });
                    window.initChatListener();
                } catch(e) {
                    console.error(e);
                    alert("Gagal mengirim pesan.");
                    input.value = msg;
                }
            };;
    
            // --- SISTEM CACHE GAMBAR MENU (AUTO LOCALSTORAGE) ---
            window.setupMenuImageCaching = async function() {
                const menuImages = document.querySelectorAll('.menu-item .icon-box img');
                
                menuImages.forEach(async (img) => {
                    const originalSrc = img.getAttribute('src');
                    if (!originalSrc || originalSrc.startsWith('data:')) return;
                    
                    // Key unik untuk cache (berdasarkan nama file)
                    const cacheKey = 'img_cache_v1_' + originalSrc.replace(/[^a-zA-Z0-9]/g, '');
                    const cachedData = localStorage.getItem(cacheKey);
    
                    if (cachedData) {
    // Jika ada di storage, pakai itu (Load Instan)
    img.src = cachedData;
                    } else {
    // Jika belum, download & simpan
    try {
        const response = await fetch(originalSrc);
        const blob = await response.blob();
        const reader = new FileReader();

//=== ADDITIONAL BLOCK 7683-8003 ===
            window.renderAkrabSystem = function() {
                const listArea = document.getElementById('akrabSpesialContent');
                if(!listArea) return;
                listArea.innerHTML = `
                <style>
                    .session-card { background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 12px; padding: 12px; margin-bottom: 10px; display: flex; justify-content: space-between; align-items: center; box-shadow: 0 2px 4px rgba(0,0,0,0.02); }
                    .filter-container { display: flex; gap: 10px; overflow-x: auto; padding-bottom: 10px; margin-bottom: 10px; scrollbar-width: none; -ms-overflow-style: none; }
                    .filter-container::-webkit-scrollbar { display: none; }
                </style>
                <div style="padding:0 5px;">
                    <div class="prof-card" id="akrabAuthCard" style="margin:0; margin-bottom:20px;">
    <h4 style="margin-top:0; margin-bottom:15px; color:#1e3a8a;"><i class="fas fa-sign-in-alt"></i> Login Nomor Pelanggan</h4>
    <div class="input-group">
        <input type="tel" id="akrabNumber" class="form-input" placeholder="087xxxx (Nomor XL)" oninput="this.value = this.value.replace(/[^0-9]/g, '')">
        <i class="fas fa-mobile-alt"></i>
    </div>
    <button class="btn-konfirmasi" style="padding:12px; border-radius:8px; font-weight:bold; width:100%; margin-top:10px;" onclick="window.akrabMintaOtp()">Minta OTP</button>
    
    <div id="akrabOtpArea" style="display:none; margin-top:15px; border-top:1px dashed #eee; padding-top:15px;">
        <p style="font-size:11px; color:#666; margin-bottom:10px;">Cek SMS pada nomor tersebut lalu masukkan 6 digit kode OTP.</p>
        <div class="input-group">
            <input type="text" id="akrabOtpCode" class="form-input" placeholder="Masukkan Kode OTP" maxlength="6">
            <i class="fas fa-key"></i>
        </div>
        <button class="btn-konfirmasi" style="background:var(--success); width:100%; margin-top:10px; border-radius:8px; font-weight:bold;" onclick="window.akrabLoginOtp()">Login & Simpan Sesi</button>
    </div>
    
    <div id="akrabSavedArea" style="margin-top:25px; border-top:2px solid #f1f5f9; padding-top:15px;">
        <h5 style="margin-top:0; margin-bottom:12px; color:#64748b; font-size:12px; text-transform:uppercase; font-weight:bold;"><i class="fas fa-history"></i> Sesi Login Tersimpan</h5>
        <div id="akrabSessionList">
            <p style="font-size:11px; color:#94a3b8; text-align:center;">Memuat data sesi...</p>
        </div>
    </div>
                    </div>
    
                    <div id="akrabDashboard" style="display:none;">
    <div style="background:linear-gradient(135deg, #1e3a8a, #0f172a); color:white; padding:15px; border-radius:15px; margin-bottom:20px; box-shadow:0 5px 15px rgba(0,0,0,0.1);">
        <div style="display:flex; justify-content:space-between; align-items:center; border-bottom:1px dashed rgba(255,255,255,0.2); padding-bottom:10px; margin-bottom:10px;">
            <div>
                <div style="font-size:10px; opacity:0.8;">Nomor Target</div>
                <div style="font-weight:bold; font-size:16px; letter-spacing:1px;" id="akrabDashNumber">-</div>
            </div>
            <div style="text-align:right;">
                <div style="font-size:10px; opacity:0.8;">Pulsa Tersedia</div>
                <div style="font-weight:bold; font-size:16px; color:#f1c40f;" id="akrabDashPulsa"><i class="fas fa-spinner fa-spin"></i></div>
            </div>
        </div>
        <div style="font-size:11px; display:flex; justify-content:space-between; align-items:center;">
            <span>Masa Aktif: <b id="akrabDashExpired">-</b></span>
            <button onclick="window.kembaliKeDaftarSesi()" style="background:rgba(255,255,255,0.2); border:none; color:white; padding:5px 10px; border-radius:5px; font-size:10px; cursor:pointer;"><i class="fas fa-exchange-alt"></i> Ganti</button>
        </div>
    </div>
    
    <h4 style="margin-bottom:15px; color:#333;"><i class="fas fa-box-open"></i> Daftar Paket</h4>
    <div id="filterArea" style="display:none; margin-bottom:20px;">
        <div class="filter-container" id="typeFilters"></div>
        <div class="filter-container" id="categoryFilters"></div>
    </div>
    <div id="akrabPackageList">
        <div style="text-align:center; padding:20px; color:#999;"><i class="fas fa-circle-notch fa-spin"></i> Memuat daftar paket...</div>
    </div>
                    </div>
                </div>
                
                <div id="modalAkrabConfirm" class="modal" style="display:none; position:fixed; z-index:99999; left:0; top:0; width:100%; height:100%; background-color:rgba(0,0,0,0.6); align-items:center; justify-content:center;">
                    <div style="background:white; width:90%; max-width:380px; border-radius:15px; padding:20px; position:relative;">
    <h3 style="margin-top:0; color:#1e3a8a; text-align:center; border-bottom:1px dashed #cbd5e1; padding-bottom:12px; margin-bottom:15px; font-size:16px;">Konfirmasi Tembak</h3>
    <div style="display:flex; justify-content:space-between; margin-bottom:10px;"><span style="color:#64748b; font-size:12px;">Nomor XL</span><strong id="modalAkrabNoXL" style="font-size:13px;">-</strong></div>
    <div style="display:flex; justify-content:space-between; margin-bottom:10px;"><span style="color:#64748b; font-size:12px;">Product</span><strong id="modalAkrabProduct" style="font-size:13px; text-align:right; max-width:60%;">-</strong></div>
    <div style="display:flex; justify-content:space-between; margin-bottom:10px; align-items:center;"><span style="color:#64748b; font-size:12px;">Metode</span><select id="modalPaymentMethod" onchange="window.updateModalPrice()"></select></div>
    <div style="display:flex; justify-content:space-between; margin-bottom:15px; align-items:center; background:#e6fffa; padding:8px 10px; border-radius:8px;"><span style="color:#00b894; font-size:12px; font-weight:bold;">Biaya</span><strong id="modalAkrabHarga" style="font-size:16px; color:var(--success);">-</strong></div>
    <div id="modalAkrabWarning" style="text-align:center; font-size:11px; font-weight:bold; color:#e74c3c; margin-bottom:15px; padding:8px; background:#fef2f2; border-radius:6px;"></div>
    <div style="display:flex; gap:10px;">
        <button onclick="document.getElementById('modalAkrabConfirm').style.display='none'" style="flex:1; padding:12px; border:none; border-radius:8px; background:#e2e8f0; font-weight:bold; cursor:pointer;">Batal</button>
        <button onclick="window.prosesTembakPaket()" style="flex:1; padding:12px; border:none; border-radius:8px; background:var(--primary); color:white; font-weight:bold; cursor:pointer;">Beli Sekarang</button>
    </div>
                    </div>
                </div>`;
                setTimeout(window.loadSavedSessions, 500);
            };
    
            window.loadSavedSessions = function() { 
                if (!window.db || !window.auth || !window.auth.currentUser) {
                    // Coba lagi setelah 1 detik jika Firebase belum siap
                    setTimeout(window.loadSavedSessions, 1000);
                    return;
                }
                try {
                    const sessionsCol = window.collection(window.db, 'users', window.auth.currentUser.uid, 'kaje_sessions');
                    window.onSnapshot(sessionsCol, (snapshot) => {
    const listArea = document.getElementById('akrabSessionList');
    if (!listArea) return;
    if (snapshot.empty) { 
        listArea.innerHTML = '<p style="font-size:11px; color:#94a3b8; text-align:center;">Belum ada sesi tersimpan.</p>'; 
        return; 
    }
    let html = '';
    snapshot.forEach(doc => {
        html += `<div class="session-card"><div class="session-info"><b style="font-size:14px; color:#1e293b;">${doc.id}</b></div><div style="display:flex; gap:8px;"><button onclick="window.akrabLoginSesi('${doc.id}')" style="background:var(--primary); color:white; border:none; padding:6px 12px; border-radius:6px; font-size:11px; font-weight:bold;"><i class="fas fa-sign-in-alt"></i> LOGIN</button><button onclick="window.hapusSesi('${doc.id}')" style="background:#fee2e2; color:#ef4444; border:none; padding:6px 10px; border-radius:6px;"><i class="fas fa-trash"></i></button></div></div>`;
    });
    listArea.innerHTML = html;
                    }, (error) => {
    console.error("Error Firestore Snapshot:", error);
                    });
                } catch(e) {
                    console.error("Gagal inisialisasi onSnapshot:", e);
                }
            };
    
            window.akrabMintaOtp = async function() {
                let num = document.getElementById('akrabNumber').value.replace(/\D/g, '');
                if (num.startsWith('62')) num = '0' + num.substring(2);
                if (!num || num.length < 9) return alert('Nomor tidak valid!');
                window.showNotice('loading', 'Menghubungkan', 'Meminta OTP...');
                try {
                    const req = await fetch('kaje_proxy.php?api_action=get_otp', { method: 'POST', body: JSON.stringify({ number: num }) });
                    const res = await req.json();
                    if (res.success || res.code === "000" || res.status === true) { 
    document.getElementById('akrabOtpArea').style.display = 'block'; 
    window.currentXlNumber = num; 
    window.showNotice('success', 'Berhasil', 'OTP Terkirim ke SMS'); 
                    } else { 
    window.showNotice('error', 'Gagal', res.message || 'Gagal meminta OTP'); 
                    }
                } catch (e) { 
                    window.showNotice('error', 'Error', 'Server tidak merespons.'); 
                }
            };
    
            window.akrabLoginOtp = async function() {
                const otp = document.getElementById('akrabOtpCode').value;
                if (!otp) return alert('Masukkan OTP!');
                window.showNotice('loading', 'Mengesahkan', 'Login...');
                try {
                    const req = await fetch('kaje_proxy.php?api_action=login_otp', { method: 'POST', body: JSON.stringify({ number: window.currentXlNumber, code_otp: otp }) });
                    const res = await req.json();
                    if (res.success) {
    // === PENYIMPANAN FIRESTORE YANG DIPERKUAT ===
    try { 
        const docRef = window.doc(window.db, 'users', window.auth.currentUser.uid, 'kaje_sessions', window.currentXlNumber);
        await window.setDoc(docRef, { 
            active: true, 
            number: window.currentXlNumber,
            timestamp: window.serverTimestamp ? window.serverTimestamp() : new Date().toISOString()
        });
        console.log("Sesi berhasil disimpan ke Firestore!");
    } catch(dbErr){
        console.error("Gagal menyimpan sesi ke Firestore:", dbErr);
    }
    
    window.showNotice('success', 'Berhasil', 'Login sukses.');
    window.bukaDashboardAkrab();
                    } else { 
    window.showNotice('error', 'Gagal', 'OTP Salah atau Kadaluarsa'); 
                    }
                } catch (e) { 
                    window.showNotice('error', 'Error', 'Gagal login.'); 
                }
            };
    
            window.akrabLoginSesi = async function(num) {
                window.showNotice('loading', 'Menyambung', 'Memuat sesi...');
                try {
                    const req = await fetch('kaje_proxy.php?api_action=login_sesi', { method: 'POST', body: JSON.stringify({ number: num }) });
                    const res = await req.json();
                    if (res.success) { 
    window.currentXlNumber = num; 
    window.showNotice('success', 'Berhasil', 'Sesi aktif.'); 
    
    // Update Timestamp Terakhir Login
    try { 
        await window.updateDoc(window.doc(window.db, 'users', window.auth.currentUser.uid, 'kaje_sessions', num), { 
            last_login: window.serverTimestamp ? window.serverTimestamp() : new Date().toISOString()
        }); 
    } catch(e) {}
    
    window.bukaDashboardAkrab(); 
                    }
                    else { window.showNotice('error', 'Gagal', 'Sesi kadaluarsa. Minta OTP baru.'); }
                } catch (e) { window.showNotice('error', 'Error', 'Koneksi gagal.'); }
            };
    
            window.hapusSesi = async function(num) { 
                if(confirm('Hapus sesi '+num+'?')) { 
                    try { 
    await window.deleteDoc(window.doc(window.db, 'users', window.auth.currentUser.uid, 'kaje_sessions', num)); 
    console.log("Sesi dihapus dari Firestore");
                    } catch(e) {
    console.error("Gagal hapus sesi:", e);
    alert("Gagal menghapus data dari server");
                    } 
                } 
            };
            window.kembaliKeDaftarSesi = function() { document.getElementById('akrabDashboard').style.display = 'none'; document.getElementById('akrabAuthCard').style.display = 'block'; };
    
            window.bukaDashboardAkrab = function() {
                document.getElementById('akrabAuthCard').style.display = 'none';
                document.getElementById('akrabDashboard').style.display = 'block';
                document.getElementById('akrabDashNumber').innerText = window.currentXlNumber;
                window.loadAkrabInfo(); window.loadAkrabPackages();
            };
    
            window.loadAkrabInfo = async function() {
                try {
                    const req = await fetch('kaje_proxy.php?api_action=get_balance', { method: 'POST', body: JSON.stringify({ number: window.currentXlNumber }) });
                    const res = await req.json();
                    if (res.success && res.data) {
    document.getElementById('akrabDashPulsa').innerText = res.data.remaining_text || 'Rp 0';
    document.getElementById('akrabDashExpired').innerText = res.data.expired_at || '-';
                    }
                } catch (e) {}
            };
    
            window.loadAkrabPackages = async function() {
                const listArea = document.getElementById('akrabPackageList');
                listArea.innerHTML = '<div style="text-align:center; padding:20px; color:#999;"><i class="fas fa-circle-notch fa-spin"></i> Menarik produk...</div>';
                try {
                    const req = await fetch('kaje_proxy.php?api_action=list_package_otp', { method: 'POST', body: JSON.stringify({}) });
                    const res = await req.json();
                    if (res.success && res.data && (res.data.products || Array.isArray(res.data))) {
    window.allAkrabProducts = res.data.products || (Array.isArray(res.data) ? res.data : []);
    if(window.allAkrabProducts.length > 0) { document.getElementById('filterArea').style.display = 'block'; window.renderTypeFilters(); }
    else listArea.innerHTML = '<div style="text-align:center; padding:20px; color:#e74c3c;">Stok produk kosong.</div>';
                    } else { listArea.innerHTML = `<div style="text-align:center; padding:20px; color:#e74c3c;">Gagal memuat produk.</div>`; }
                } catch (e) { listArea.innerHTML = '<div style="text-align:center; padding:20px; color:#e74c3c;">Gagal menghubungi server.</div>'; }
            };
    
            window.renderTypeFilters = function() {
                const types = [...new Set(window.allAkrabProducts.map(p => p.type).filter(Boolean))];
                if (types.length === 0) return window.renderFinalProducts();
                if (!types.includes(window.selectedType)) window.selectedType = types[0];
                let html = '';
                types.forEach(t => { html += `<button style="padding:8px 16px; border-radius:20px; font-size:11px; font-weight:bold; white-space:nowrap; border:none; margin-right:5px; cursor:pointer; ${t === window.selectedType ? 'background:var(--primary);color:white;' : 'background:#e2e8f0;color:#475569;'}" onclick="window.selectedType='${t}';window.renderTypeFilters()">${t}</button>`; });
                document.getElementById('typeFilters').innerHTML = html; window.renderCategoryFilters();
            };
    
            window.renderCategoryFilters = function() {
                const filtered = window.allAkrabProducts.filter(p => p.type === window.selectedType);
                const cats = [...new Set(filtered.map(p => p.category).filter(Boolean))];
                if (cats.length === 0) return window.renderFinalProducts();
                if (!cats.includes(window.selectedCategory)) window.selectedCategory = cats[0];
                let html = '';
                cats.forEach(c => { html += `<button style="padding:8px 16px; border-radius:20px; font-size:11px; font-weight:bold; white-space:nowrap; border:none; margin-right:5px; cursor:pointer; ${c === window.selectedCategory ? 'background:#0ea5e9;color:white;' : 'background:#e2e8f0;color:#475569;'}" onclick="window.selectedCategory='${c}';window.renderCategoryFilters()">${c}</button>`; });
                document.getElementById('categoryFilters').innerHTML = html; window.renderFinalProducts();
            };
    
            window.renderFinalProducts = function() {
                const listArea = document.getElementById('akrabPackageList');
                const final = window.allAkrabProducts.filter(p => { return (window.selectedType ? p.type === window.selectedType : true) && (window.selectedCategory ? p.category === window.selectedCategory : true); });
                if (final.length === 0) return listArea.innerHTML = '<div style="text-align:center; padding:20px; color:#999;">Tidak ada produk.</div>';
                let html = '';
                let markup = window.markupConfig && window.markupConfig['Akrab Spesial'] ? parseInt(window.markupConfig['Akrab Spesial']) : 0;
                final.forEach(p => {
                    let hPulsa = p.fee || 0; 
                    let hNon = (p.price?.non_pulsa || 0) + hPulsa + window.getMarkupValue(markup, p.price?.non_pulsa || 0);
                    html += `<div style="background:white; border-radius:12px; padding:15px; margin-bottom:12px; border:1px solid #eee; box-shadow:0 2px 5px rgba(0,0,0,0.02);"><div style="display:flex; justify-content:space-between; align-items:flex-start;"><div style="flex:1"><b>${p.name}</b><br><small style="color:#95a5a6">Stok: ${p.stock}</small></div><div style="text-align:right"><div style="font-size:10px; color:#e74c3c; font-weight:bold;">Pulsa: Rp ${hPulsa.toLocaleString('id-ID')}</div><div style="font-size:11px; color:#27ae60; font-weight:bold; margin-top:2px;">Saldo: Rp ${hNon.toLocaleString('id-ID')}</div></div></div><button class="btn-konfirmasi" style="padding:10px; margin-top:10px; font-size:12px;" onclick="window.bukaModalAkrab('${encodeURIComponent(JSON.stringify({code:p.code, name:p.name, fee:hPulsa, hNon:hNon, pm:p.payment_methods||['SALDO']}))}')"><i class="fas fa-shopping-cart"></i> Pilih Pembayaran</button></div>`;
                });
                listArea.innerHTML = html;
            };
    
            window.bukaModalAkrab = function(dataStr) {
                const p = JSON.parse(decodeURIComponent(dataStr));
                window.pendingAkrabOrder = p;
                document.getElementById('modalAkrabNoXL').innerText = window.currentXlNumber;
                document.getElementById('modalAkrabProduct').innerText = p.name;
                const sel = document.getElementById('modalPaymentMethod'); sel.innerHTML = '';
                p.pm.forEach(m => { let o = document.createElement('option'); o.value=m; o.text=m; sel.add(o); });
                window.updateModalPrice();
                document.getElementById('modalAkrabConfirm').style.display = 'flex';
            };
    
            window.updateModalPrice = function() {
                const m = document.getElementById('modalPaymentMethod').value;
                let p = (m === 'PULSA') ? window.pendingAkrabOrder.fee : window.pendingAkrabOrder.hNon;
                document.getElementById('modalAkrabHarga').innerText = 'Rp ' + p.toLocaleString('id-ID');
                document.getElementById('modalAkrabWarning').innerText = `Memotong Saldo Sistem Rp ${p.toLocaleString('id-ID')}`;
                window.pendingAkrabOrder.final_price = p;
            };
    
            window.prosesTembakPaket = async function() {
                const p = window.pendingAkrabOrder; const method = document.getElementById('modalPaymentMethod').value;
                document.getElementById('modalAkrabConfirm').style.display = 'none';
                const db = window.db; const uid = window.auth.currentUser.uid;
                const price = p.final_price; const refId = "AKRAB-" + Math.floor(Date.now() / 1000);
    
                window.showNotice('loading', 'Memproses', 'Mengecek Saldo...');
                try {
                    const userRef = window.doc(db, 'users', uid); const userSnap = await window.getDoc(userRef);
                    let saldoSekarang = userSnap.data().saldo || 0;
                    if (saldoSekarang < price) return window.showNotice('error', 'Saldo Kurang', 'Saldo tidak cukup');
    
                    let saldoSisa = saldoSekarang - price;
                    await window.updateDoc(userRef, { saldo: saldoSisa });
                    if(window.triggerDoniGuard) window.triggerDoniGuard({ action:'transaksi', produk: p.name, nominal: price, trx_id: refId, saldo_akhir_client: saldoSisa });
    
                    const docRef = window.doc(db, 'users', uid, 'riwayat_transaksi', refId);
                    await window.setDoc(docRef, { uid:uid, username:userSnap.data().username, tujuan:window.currentXlNumber, kategori:'Akrab Spesial', produk:p.name, kode_produk:p.code, harga:price, status:'PENDING', status_awal:'PENDING', sn:'Diproses', trx_id:refId, provider:'KAJE', timestamp:window.serverTimestamp() });
    
                    const req = await fetch('kaje_proxy.php?api_action=order_package_otp', { method: 'POST', body: JSON.stringify({ destination: window.currentXlNumber, ref_id: refId, code: p.code, payment: method }) });
                    const res = await req.json();
    
                    if (res.success) {
    let trxIdKaje = res.data?.trx_id || refId;
    let snTeks = res.data?.deeplink ? res.data.deeplink : ("#" + trxIdKaje);
    await window.updateDoc(docRef, { sn: snTeks, trx_id: trxIdKaje });
    window.showNotice('success', 'Terkirim', res.data?.deeplink ? 'Cek Riwayat untuk Link Pembayaran' : 'Transaksi sedang diproses pusat.');
                    } else { throw new Error(res.message); }
                } catch (e) {
                    try {
                        const userRef = window.doc(window.db, 'users', window.auth.currentUser.uid);
                        const freshSnap = await window.getDoc(userRef);
                        const currentBal = freshSnap.exists() ? (freshSnap.data().saldo || 0) : 0;
                        if(window.pendingAkrabOrder && window.pendingAkrabOrder.final_price) {
                            await window.updateDoc(userRef, { saldo: currentBal + window.pendingAkrabOrder.final_price });
                        }
                    } catch(ex) {}
                    window.showNotice('error', 'Gagal', e.message); 
                }
            };
    
            window.monitorKajeTrx = async function(trxId, docId) {

//=== ADDITIONAL BLOCK 8767-8890 ===
            window.prosesBayarKaje = async function() {
                const user = window.auth.currentUser;
                if(!user) return;
                const data = window.currentInvoiceData;
                const hp = document.getElementById('inputKajeTujuan').value;
                if(!hp) return alert("Mohon isi Nomor Tujuan!");
    
                document.getElementById('modalInvoice').style.display = 'none';
                window.showNotice('loading', 'Memproses', 'Sedang memproses transaksi...');
    
                try {
                    const userRef = window.doc(window.db, "users", user.uid);
                    const userSnap = await window.getDoc(userRef);
                    const curSaldo = userSnap.data().saldo || 0;
    
                    if(curSaldo < data.baseHarga) return window.showNotice('error', 'Gagal', 'Saldo tidak mencukupi!');
    if (!(await window.cekSinkronisasiDoniGuard(user.uid, curSaldo))) return;
                    await window.updateDoc(userRef, { saldo: curSaldo - data.baseHarga });
    
                    const clientRefId = "KJ-" + hp.substring(0,4) + "-" + Math.floor(1000000 + Math.random() * 9000000).toString();
                    
                    const req = await fetch('kaje_proxy.php?api_action=order_product', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify({
        destination: hp,
        ref_id: clientRefId,
        code: data.kodeOrder || data.kode
    })
                    });
                    const res = await req.json();
    
                    let isSuccess = false;
                    const fullResString = JSON.stringify(res).toLowerCase();
                    if (res.success === true || res.status === true || res.code === "000" || fullResString.includes('true')) isSuccess = true;
                    if (fullResString.includes('proses') || fullResString.includes('pending') || fullResString.includes('berhasil') || fullResString.includes('sukses')) isSuccess = true;
                    
                    let rawMsg = res.message || res.msg || (res.data ? res.data.message : '') || 'Transaksi diproses server Kaje';
                    const msg = Array.isArray(rawMsg) ? rawMsg.join(', ') : rawMsg;
                    const trxId = (res.data && res.data.trx_id) ? res.data.trx_id : clientRefId;
    
                    if(isSuccess) {
    window.showNotice('success', 'Berhasil', msg);
    
    if(window.triggerDoniGuard) {
        window.triggerDoniGuard({
            action: 'transaksi', produk: data.nama, nominal: data.baseHarga,
            trx_id: trxId, saldo_akhir_client: curSaldo - data.baseHarga
        });
    }
    
    const docRef = await window.addDoc(window.collection(window.db, "users", user.uid, "riwayat_transaksi"), {
        uid: user.uid, username: userSnap.data().username, tujuan: hp,
        produk: data.nama, kode_produk: data.kode, kode_order_kaje: (data.kodeOrder || data.kode), harga: data.baseHarga,
        status: 'PENDING', status_awal: 'PENDING', sn: msg, trx_id: trxId, provider: 'KAJE',
        timestamp: window.serverTimestamp()
    });
    
    window.monitorKajeTrx(trxId, docRef.id);
                    } else {
    await window.updateDoc(userRef, { saldo: curSaldo }); 
    window.showNotice('error', 'Gagal', window.bersihkanPesan(msg || 'Gagal dari server Kaje'));
                    }
                } catch(e) {
                    console.error(e);
                    try {
     const userRef = window.doc(window.db, "users", user.uid);
     const userSnap = await window.getDoc(userRef);
     await window.updateDoc(userRef, { saldo: (userSnap.data().saldo || 0) + data.baseHarga });
                    } catch(ex){}
                    window.showNotice('error', 'Error', 'Terjadi kesalahan sistem: ' + e.message);
                }
            };
    
            window.siapkanInvoiceKhfy = function(kode, nama, harga) {
                // Override Data Invoice Global
                window.currentInvoiceData = { kode, nama, baseHarga: harga, isKhfy: true };
                
                // Layout Invoice Khfy (Input Tujuan Editable di Dalam Box)
                const html = `
                    <style>
    #modalInvoice #invoiceFooter { display: none !important; }
                    </style>
                    <div style="background: #f8fafc; border-radius: 15px; padding: 20px; border: 1px solid #edf2f7; margin-bottom: 20px;">
    <div style="text-align: center; margin-bottom: 15px;">
        <div style="font-size: 11px; color: #95a5a6; text-transform: uppercase; letter-spacing: 1px;">Konfirmasi Pesanan</div>
        <div style="font-size: 15px; font-weight: 800; color: #2c3e50; margin-top: 5px;">${nama}</div>
    </div>
    
    <div class="invoice-row" style="border-bottom: 1px dashed #eee; padding-bottom: 10px; margin-bottom: 15px;">
        <span>Kode Produk</span>
        <b style="color: #666;">${kode}</b>
    </div>
    
    <div style="margin-bottom: 15px;">
        <label style="font-size: 10px; font-weight: 700; color: var(--primary); display: block; margin-bottom: 8px; text-transform: uppercase;">Nomor Tujuan / Link Zona</label>
        <div class="input-group" style="margin-bottom: 0;">
            <input type="tel" inputmode="numeric" id="inputKhfyTujuan" class="form-input" placeholder="Tempel Nomor/Link di sini" style="background: white; border: 2px solid #e1effe; color:#333; font-weight:bold; padding-right: 70px;">
            <i class="fas fa-edit" style="top: 15px;"></i>
            <button type="button" onclick="window.pasteDariClipboard('inputKhfyTujuan')" style="position:absolute; right:10px; top:12px; background:var(--primary); color:white; border:none; border-radius:8px; padding:5px 10px; font-size:10px; font-weight:bold; cursor:pointer; z-index:10;">PASTE</button>
        </div>
        <div style="font-size:9px; color:#999; margin-top:5px;">Pastikan nomor/link yang dimasukkan benar.</div>
    </div>
    
    <div class="invoice-row invoice-total" style="padding-top: 15px; margin-top: 5px;">
        <span>TOTAL BAYAR</span>
        <b style="color: var(--primary); font-size: 18px;">Rp ${new Intl.NumberFormat('id-ID').format(harga)}</b>
    </div>
                    </div>
                    
                    <div id="khfyCustomFooter">
    <button class="btn-konfirmasi" onclick="window.prosesBayarKhfy()">BAYAR SEKARANG</button>
    <button class="btn-batal" onclick="document.getElementById('modalInvoice').style.display='none'">BATAL</button>
                    </div>`;
                
                document.getElementById('invoiceContent').innerHTML = html;
                document.getElementById('statusCekNama').style.display = 'none';
                document.getElementById('modalInvoice').style.display = 'flex';
                setTimeout(() => { const inp = document.getElementById('inputKhfyTujuan'); if(inp) inp.focus(); }, 300);
            };
    
                        window.prosesBayarKhfy = async function() {
                const user = window.auth.currentUser;
                if(!user) return;

//=== ADDITIONAL BLOCK 8994-9040 ===
            window.siapkanInvoicePO = function(kode, nama, harga, provider, kodeOrder) {
                window.currentInvoiceData = { kode, kodeOrder: (kodeOrder || kode), nama, baseHarga: harga, provider: provider, isPO: true };
                const html = `
                    <style>#modalInvoice #invoiceFooter { display: none !important; }</style>
                    <div style="background: #fff8e1; border-radius: 15px; padding: 20px; border: 1px solid #f39c12; margin-bottom: 20px;">
    <div style="text-align: center; margin-bottom: 15px;">
        <div style="font-size: 11px; color: #d35400; text-transform: uppercase; letter-spacing: 1px;">Pre-Order Akrab</div>
        <div style="font-size: 15px; font-weight: 800; color: #2c3e50; margin-top: 5px;">${nama}</div>
    </div>
    <div class="invoice-row" style="border-bottom: 1px dashed #f39c12; padding-bottom: 10px; margin-bottom: 15px;">
        <span>Kode Produk</span><b style="color: #d35400;">${kode}</b>
    </div>
    <div style="margin-bottom: 15px;">
        <label style="font-size: 10px; font-weight: 700; color: #d35400; display: block; margin-bottom: 8px; text-transform: uppercase;">Nomor Tujuan / Link Zona</label>
        <div class="input-group" style="margin-bottom: 0;">
            <input type="tel" inputmode="numeric" id="inputPOTujuan" class="form-input" placeholder="Tempel Nomor/Link di sini" style="background: white; border: 2px solid #f39c12; color:#333; font-weight:bold; padding-right: 70px;">
            <i class="fas fa-edit" style="top: 15px;"></i>
            <button type="button" onclick="window.pasteDariClipboard('inputPOTujuan')" style="position:absolute; right:10px; top:12px; background:var(--primary); color:white; border:none; border-radius:8px; padding:5px 10px; font-size:10px; font-weight:bold; cursor:pointer; z-index:10;">PASTE</button>
        </div>
    </div>
    <div class="invoice-row invoice-total" style="padding-top: 15px; margin-top: 5px; color:#d35400;">
        <span>TOTAL BAYAR</span>
        <b style="font-size: 18px;">Rp ${new Intl.NumberFormat('id-ID').format(harga)}</b>
    </div>
                    </div>
                    <div id="poCustomFooter">
    <button class="btn-konfirmasi" style="background:#f39c12; box-shadow:0 4px 15px rgba(243,156,18,0.3);" onclick="window.prosesBayarPO()">IKUT ANTRIAN PRE-ORDER</button>
    <button class="btn-batal" onclick="document.getElementById('modalInvoice').style.display='none'">BATAL</button>
                    </div>`;
                document.getElementById('invoiceContent').innerHTML = html;
                document.getElementById('statusCekNama').style.display = 'none';
                document.getElementById('modalInvoice').style.display = 'flex';
            };
    
            window.prosesBayarPO = async function() {
        const user = window.auth.currentUser;
        if(!user) return;
        const data = window.currentInvoiceData;
        const hp = document.getElementById('inputPOTujuan').value;
        if(!hp) return alert("Mohon isi Nomor Tujuan!");
    
        document.getElementById('modalInvoice').style.display = 'none';
        window.showNotice('loading', 'Memproses', 'Memasukkan ke antrian Pre-Order...');
    
        try {
            const userRef = window.doc(window.db, "users", user.uid);
            const userSnap = await window.getDoc(userRef);

//=== ADDITIONAL BLOCK 8522-8560 ===
            window.monitorIcsTrx = async function(trxId, docId) {
                if(window.intervalCek[docId]) return;
                console.log("Monitoring RefID:", trxId);
                
                window.intervalCek[docId] = setInterval(async () => {
                    try {
    const req = await fetch(`ics_proxy.php?action=status&refid=${trxId}`);
    const res = await req.json();
    
    if(res.success && res.data) {
        const statusRaw = (res.data.status || '').toLowerCase();
        let statusAkhir = 'PENDING';
        let sn = res.data.sn || res.data.message || '-';
        
        if(statusRaw === 'success') statusAkhir = 'BERHASIL';
        else if(statusRaw === 'failed') statusAkhir = 'GAGAL';
        
        if(statusAkhir !== 'PENDING') {
            clearInterval(window.intervalCek[docId]);
            delete window.intervalCek[docId];
            
            if(window.updateFirestoreStatus) {
                window.updateFirestoreStatus(docId, statusAkhir, sn, JSON.stringify(res));
            }
        }
    }
                    } catch(e) { console.log("Err Mon ICS", e); }
                }, 5000);
            };
    
    // --- INTEGRASI KHFY STORE (PAKET AKRAB) - SMART SYSTEM v2 ---
            window.khfyData = [];
    
            window.loadKhfyData = async function() {
                const areaList = document.getElementById('listProdukArea');
                const areaFilter = document.getElementById('areaFilter');
                
                if(areaFilter) areaFilter.innerHTML = "";
                if(areaList) areaList.innerHTML = "<div style='text-align:center; padding:40px;'><i class='fas fa-circle-notch fa-spin'></i> Memuat Produk...</div>";

</script>

</body>
</html>
