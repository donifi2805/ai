<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- ANTI CACHE / CACHE BUSTING (Memaksa browser mengambil versi terbaru) -->
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <!-- ==================================================================== -->

    <title>BhuleE-Market - Super App PPOB</title>

    <link rel="manifest" href="/manifest.json?v=be3">
    <meta name="theme-color" content="#7f1d1d">
    <link rel="apple-touch-icon" href="/icon-192.png?v=be3">
    <link rel="icon" type="image/png" sizes="192x192" href="/icon-192.png?v=be3">
    <link rel="icon" type="image/png" sizes="512x512" href="/icon-512.png?v=be3">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Menambahkan Parameter Versi (?v=...) untuk Cache-Busting pada Preload -->
    <link rel="preload" as="image" href="icons/Pulsa.png?v=1.1">
    <link rel="preload" as="image" href="icons/E-Wallet.png?v=1.1">
    <link rel="preload" as="image" href="icons/Games.png?v=1.1">
    <link rel="preload" as="image" href="icons/Token PLN.png?v=1.1">
    <link rel="preload" as="image" href="icons/Telkomsel.png?v=1.1">
    <link rel="preload" as="image" href="icons/Indosat.png?v=1.1">
    <link rel="preload" as="image" href="icons/By.U.png?v=1.1">
    <link rel="preload" as="image" href="https://cdn-icons-png.flaticon.com/512/2554/2554978.png">

    <style>
        :root { --primary: #7f1d1d; --bg: #f8fafc; --white: #fff; --success: #7f1d1d; --warning: #f59e0b; --danger: #ef4444; --text-dark: #0f172a; --text-grey: #64748b; --grad-main: linear-gradient(135deg, #991b1b 0%, #7f1d1d 100%); }
                body { margin: 0; font-family: 'Inter', 'Segoe UI', sans-serif; background: var(--bg); padding-bottom: 85px; color: var(--text-dark); -webkit-tap-highlight-color: transparent; min-height: 100vh; font-size: 13px; line-height: 1.5; }
                .header { background: var(--primary); padding: 40px 20px 70px; border-radius: 0 0 40px 40px; position:relative; z-index:1; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); }
                .saldo-box { margin: -55px 15px 12px; background: linear-gradient(135deg, #0f172a 0%, #450a0a 45%, #7f1d1d 100%); padding: 14px 16px 13px; border-radius: 22px; box-shadow: 0 12px 30px rgba(127,29,29,0.22), 0 5px 12px rgba(15,23,42,0.10); position: relative; z-index: 2; border: 1px solid rgba(255,255,255,0.20); display: flex; flex-direction: column; overflow: hidden; color: #fff; isolation: isolate; } .saldo-box::before { content: ''; position: absolute; width: 145px; height: 145px; right: -65px; top: -78px; background: radial-gradient(circle, rgba(255,255,255,0.30), rgba(255,255,255,0)); border-radius: 50%; z-index: -1; } .saldo-box::after { content: ''; position: absolute; width: 125px; height: 125px; left: -72px; bottom: -82px; background: radial-gradient(circle, rgba(153,27,27,0.30), rgba(153,27,27,0)); border-radius: 50%; z-index: -1; } .saldo-info { display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid rgba(255,255,255,0.13); padding-bottom: 9px; margin-bottom: 0; position: relative; } .saldo-label-premium { font-size: 11px; color: rgba(255,255,255,0.78); margin-bottom: 4px; display: flex; align-items: center; gap: 6px; font-weight: 700; letter-spacing: 0.2px; } .saldo-label-premium i { width: 21px; height: 21px; border-radius: 8px; background: rgba(255,255,255,0.16); color: #fff !important; display: inline-flex; align-items: center; justify-content: center; box-shadow: inset 0 0 0 1px rgba(255,255,255,0.18); font-size: 10px; } #saldoValue { font-size: 24px !important; font-weight: 950 !important; color: #ffffff !important; letter-spacing: -0.6px; text-shadow: 0 2px 10px rgba(0,0,0,0.16); line-height: 1.12; } .saldo-subtitle-premium { font-size: 9px; color: rgba(255,255,255,0.62); font-weight: 600; margin-top: 2px; } .btn-history-premium { width: 36px; height: 36px; border-radius: 13px; background: rgba(255,255,255,0.15); color: #fff; display: flex; align-items: center; justify-content: center; cursor: pointer; box-shadow: inset 0 0 0 1px rgba(255,255,255,0.18), 0 6px 14px rgba(0,0,0,0.11); backdrop-filter: blur(10px); -webkit-backdrop-filter: blur(10px); transition: 0.22s ease; } .btn-history-premium:active { transform: scale(0.92) rotate(-8deg); background: rgba(255,255,255,0.22); }
        
        
                /* PATCH DONI: Sistem Foto Profil User */
                .saldo-info-profile { gap: 12px; align-items: center !important; justify-content: space-between !important; }
                .saldo-profile-left { display:flex; align-items:center; gap:10px; min-width:0; flex:1; padding-right:4px; }
                .header-avatar-shell { width:44px; height:44px; border-radius:50%; padding:2px; flex:0 0 auto; background:linear-gradient(135deg, rgba(255,255,255,.85), rgba(255,255,255,.18)); box-shadow:0 8px 18px rgba(0,0,0,.18), inset 0 0 0 1px rgba(255,255,255,.28); cursor:pointer; }
                .header-profile-photo { width:100%; height:100%; border-radius:50%; object-fit:cover; display:block; background:rgba(255,255,255,.18); }
                .saldo-info-profile .saldo-user-mini { min-width:0; padding-right:0; }
                .saldo-info-profile .saldo-header-name { max-width:135px; }
                .saldo-main-value-shift { flex:0 0 auto; min-width:118px; text-align:left; padding-left:2px; }
                .profile-upload-field { width:100%; }
                .profile-upload-label { display:flex; align-items:center; gap:12px; width:100%; padding:12px; border-radius:18px; border:1.5px dashed rgba(153,27,27,.38); background:linear-gradient(180deg, #fff7f7, #ffffff); box-sizing:border-box; cursor:pointer; transition:.2s; }
                .profile-upload-label:active { transform:scale(.985); }
                .profile-upload-preview { width:48px; height:48px; border-radius:50%; object-fit:cover; background:#fee2e2; border:2px solid rgba(153,27,27,.18); flex:0 0 auto; }
                .profile-upload-icon { width:48px; height:48px; border-radius:50%; display:flex; align-items:center; justify-content:center; background:rgba(153,27,27,.10); color:#7f1d1d; font-size:20px; flex:0 0 auto; }
                .profile-upload-text { flex:1; min-width:0; }
                .profile-upload-text b { display:block; color:#0f172a; font-size:12.5px; font-weight:950; margin-bottom:2px; }
                .profile-upload-text span { display:block; color:#64748b; font-size:10.5px; font-weight:700; line-height:1.35; }
                .photo-hidden-input { position:absolute; width:1px; height:1px; opacity:0; pointer-events:none; }
                .prof-photo-wrap { width:82px; height:82px; border-radius:50%; padding:3px; margin:0 auto 10px; background:linear-gradient(135deg, rgba(255,255,255,.95), rgba(255,255,255,.22)); box-shadow:0 12px 28px rgba(0,0,0,.20), inset 0 0 0 1px rgba(255,255,255,.28); }
                .prof-profile-photo { width:100%; height:100%; border-radius:50%; object-fit:cover; display:block; background:rgba(255,255,255,.18); }
                .prof-photo-change-btn { margin-top:9px; border:0; border-radius:999px; padding:8px 14px; background:rgba(255,255,255,.18); color:#fff; font-size:11px; font-weight:900; cursor:pointer; box-shadow:inset 0 0 0 1px rgba(255,255,255,.20); }
                .profile-required-modal { position:fixed; inset:0; z-index:999999; display:none; align-items:center; justify-content:center; background:rgba(15,23,42,.72); backdrop-filter:blur(12px); -webkit-backdrop-filter:blur(12px); padding:18px; box-sizing:border-box; }
                .profile-required-card { width:min(390px, 100%); background:#fff; border-radius:28px; padding:22px; box-shadow:0 28px 80px rgba(0,0,0,.28); text-align:center; position:relative; overflow:hidden; }
                .profile-required-card::before { content:''; position:absolute; left:18px; right:18px; top:0; height:4px; border-radius:0 0 999px 999px; background:linear-gradient(90deg, #450a0a, #991b1b, #ef4444); }
                .profile-required-badge { width:72px; height:72px; border-radius:24px; display:flex; align-items:center; justify-content:center; margin:0 auto 13px; background:linear-gradient(135deg, #991b1b, #450a0a); color:white; font-size:28px; box-shadow:0 14px 30px rgba(127,29,29,.25); }
                .profile-required-card h3 { margin:0 0 7px; font-size:19px; color:#0f172a; letter-spacing:-.3px; }
                .profile-required-card p { margin:0 0 15px; color:#64748b; font-size:12px; line-height:1.6; font-weight:650; }
                .profile-required-actions { display:flex; flex-direction:column; gap:10px; }
                .profile-required-actions .btn-modern-auth { margin-top:0; }
                body.dark-theme .profile-upload-label { background:rgba(15,23,42,.90); border-color:rgba(248,113,113,.35); }
                body.dark-theme .profile-upload-text b, body.dark-theme .profile-required-card h3 { color:#f8fafc; }
                body.dark-theme .profile-upload-text span, body.dark-theme .profile-required-card p { color:#94a3b8; }
                body.dark-theme .profile-required-card { background:#0f172a; border:1px solid rgba(148,163,184,.18); }
                @media (max-width:380px) {
                    .header-avatar-shell { width:40px; height:40px; }
                    .saldo-profile-left { gap:8px; }
                    .saldo-info-profile .saldo-header-name { max-width:105px; }
                    .saldo-main-value-shift { min-width:108px; }
                }
        
        
                .brand-pandawa-title { color:#fff; font-size:21px; font-weight:950; letter-spacing:-0.7px; line-height:1.05; display:flex; align-items:center; gap:8px; text-shadow:0 3px 12px rgba(0,0,0,0.18); white-space:nowrap; }
                .brand-title-logo { width:30px; height:30px; border-radius:11px; display:inline-flex; align-items:center; justify-content:center; object-fit:contain; padding:3px; background:rgba(255,255,255,0.16); box-shadow:inset 0 0 0 1px rgba(255,255,255,0.22), 0 8px 18px rgba(0,0,0,0.12); }
                .brand-pandawa-subtitle { margin-top:4px; color:rgba(255,255,255,0.68); font-size:10px; font-weight:700; letter-spacing:0.2px; white-space:nowrap; overflow:hidden; text-overflow:ellipsis; }
                .saldo-user-mini { min-width:0; flex:1; padding-right:10px; }
                .saldo-welcome-mini { font-size:10px; color:rgba(255,255,255,0.72); font-weight:750; display:flex; align-items:center; gap:5px; margin-bottom:3px; white-space:nowrap; }
                .saldo-welcome-mini i { color:#facc15; font-size:10px; }
                .saldo-header-name { font-weight:950; font-size:15px; color:#fff; letter-spacing:-0.35px; line-height:1.12; text-shadow:0 2px 8px rgba(0,0,0,0.16); max-width:115px; overflow:hidden; text-overflow:ellipsis; white-space:nowrap; }
                .saldo-version-mini { font-size:9px; color:rgba(255,255,255,0.58); font-weight:800; margin-top:3px; white-space:nowrap; }
                .saldo-main-value { flex:1.15; min-width:0; text-align:left; }
                @media (max-width:380px) { .brand-pandawa-title { font-size:18px; } .brand-pandawa-subtitle { font-size:9px; } .saldo-user-mini { padding-right:6px; } .saldo-header-name { max-width:92px; font-size:14px; } #saldoValue { font-size:21px !important; } .saldo-label-premium { font-size:10px; } .saldo-subtitle-premium { font-size:8px; } }
        
                .btn-topup { background: linear-gradient(135deg, #7f1d1d, #b91c1c); color: white; border: none; padding: 10px 20px; border-radius: 12px; font-size: 13px; font-weight: 600; cursor: pointer; box-shadow: 0 4px 15px rgba(127,29,29,0.3); transition: 0.2s; display: flex; align-items: center; gap: 8px; }
                .btn-topup:active { transform: scale(0.95); }
                .action-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 7px; margin-top: 9px; padding: 8px; border-top: 1px solid rgba(255,255,255,0.10); background: rgba(255,255,255,0.11); border-radius: 17px; box-shadow: inset 0 0 0 1px rgba(255,255,255,0.12); backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(12px); }
                .action-item { display: flex; flex-direction: column; align-items: center; justify-content: center; gap: 5px; cursor: pointer; transition: 0.22s ease; border-radius: 14px; padding: 4px 2px; }
                .action-item:active { transform: scale(0.92) translateY(2px); background: rgba(255,255,255,0.10); }
                .action-icon { width: 34px; height: 34px; background: rgba(255,255,255,0.92); color: #7f1d1d; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 15px; box-shadow: 0 5px 12px rgba(15,23,42,0.13), inset 0 0 0 1px rgba(255,255,255,0.7); }
                .action-item:nth-child(1) .action-icon { color: #7f1d1d; }
                .action-item:nth-child(2) .action-icon { color: #7c3aed; }
                .action-item:nth-child(3) .action-icon { color: #991b1b; }
                .action-item:nth-child(4) .action-icon { color: #f59e0b; }
                .action-text { font-size: 10px; font-weight: 800; color: rgba(255,255,255,0.92); text-shadow: 0 1px 8px rgba(0,0,0,0.12); line-height: 1.1; }
                .menu-container { background: #fff; margin: 0 15px 20px; border-radius: 24px; padding: 5px 15px 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.03); border: 1px solid rgba(0,0,0,0.05); position: relative; z-index: 2; }
        
                /* MENU GRID MODERN */
                .cat-title { padding: 20px 20px 10px; font-weight: 700; font-size: 14px; color: var(--text-dark); display: flex; align-items: center; gap: 8px; }
                .cat-title::before { content: ''; display: block; width: 4px; height: 16px; background: var(--primary); border-radius: 4px; }
                .menu-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px 10px; padding: 5px 5px; }
                .menu-container > .menu-grid { display: grid !important; grid-template-rows: repeat(2, auto); grid-auto-flow: column; grid-auto-columns: 78px; overflow-x: auto; overflow-y: hidden; gap: 14px 12px; padding: 4px 2px 10px !important; scroll-snap-type: x mandatory; -webkit-overflow-scrolling: touch; scrollbar-width: none; align-items: start; }
                .menu-container > .menu-grid::-webkit-scrollbar { display: none; }
                .menu-container > .menu-grid .menu-item { min-width: 78px; width: 78px; flex: none; scroll-snap-align: start; }
                .menu-item { text-align: center; font-size: 12px; cursor: pointer; color: var(--text-dark); font-weight: 700; letter-spacing: -0.2px; line-height: 1.4; transition: all 0.2s ease; }
                .menu-item:active { transform: scale(0.92); opacity: 0.8; }
                #menuDrawer { display: none !important; }
                #btnMoreContainer { text-align: center; margin-top: 9px; padding-top: 2px; border-top: none; height: 14px; display: flex; align-items: center; justify-content: center; }
                .menu-scroll-hint { display: inline-flex; align-items: center; justify-content: center; gap: 5px; padding: 4px 8px; border-radius: 999px; background: #fef2f2; }
                .menu-scroll-hint span { width: 6px; height: 6px; border-radius: 999px; background: rgba(127,29,29,0.28); display: block; }
                .menu-scroll-hint span:nth-child(2) { width: 22px; background: linear-gradient(90deg, #7f1d1d, #7c3aed); box-shadow: 0 4px 10px rgba(127,29,29,0.22); }
                .icon-box { width: 56px; height: 56px; margin: 0 auto 10px; border-radius: 20px; display: flex; align-items: center; justify-content: center; background: linear-gradient(145deg, #ffffff, #f3f6fa); box-shadow: 0 8px 20px rgba(127,29,29, 0.08), inset 0 2px 4px rgba(255,255,255,0.8); overflow: hidden; transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1); } .menu-item:active .icon-box { transform: scale(0.85) translateY(4px); box-shadow: 0 4px 10px rgba(127,29,29, 0.05); }
                .icon-box img { width: 60%; height: 60%; object-fit: contain; }
        
                /* PATCH DONI: Menu utama 2 baris horizontal, 8 menu terlihat di mobile */
                .menu-container { overflow: hidden; }
                .menu-container > .menu-grid { grid-template-rows: repeat(2, auto) !important; grid-auto-flow: column !important; grid-auto-columns: 68px !important; gap: 10px 8px !important; padding: 2px 0 9px !important; overflow-x: auto !important; overflow-y: hidden !important; scroll-snap-type: x mandatory; -webkit-overflow-scrolling: touch; overscroll-behavior-x: contain; scrollbar-width: none; }
                .menu-container > .menu-grid::-webkit-scrollbar { display: none; }
                .menu-container > .menu-grid .menu-item { width: 68px !important; min-width: 68px !important; scroll-snap-align: start; font-size: 10.2px !important; line-height: 1.15 !important; }
                .menu-container > .menu-grid .icon-box { width: 43px !important; height: 43px !important; border-radius: 15px !important; margin-bottom: 6px !important; }
                .menu-container > .menu-grid .icon-box i { font-size: 19px !important; }
                .menu-container > .menu-grid .icon-box img { width: 64% !important; height: 64% !important; }
                #menuDrawer { display: none !important; }
                #btnMoreContainer { height: 16px !important; margin-top: 5px !important; display: flex !important; align-items: center !important; justify-content: center !important; }
                .menu-scroll-hint { min-width: 54px; height: 12px; padding: 0 7px !important; }
        
                /* PATCH DONI: Riwayat live lebih tipis */
                .history-container { max-height: 245px !important; padding: 3px 12px 13px !important; }
                .history-card { padding: 7px 8px !important; border-radius: 15px !important; margin-bottom: 6px !important; gap: 7px !important; box-shadow: 0 5px 12px rgba(15,23,42,0.035) !important; }
                .history-card::before { top: 12px !important; bottom: 12px !important; width: 3px !important; }
                .h-tap-area { gap: 9px !important; }
                .h-icon { width: 34px !important; height: 34px !important; border-radius: 12px !important; font-size: 14px !important; margin-left: 2px !important; }
                .h-icon img { width: 70% !important; height: 70% !important; object-fit: contain !important; }
                .h-prod { font-size: 11.5px !important; margin-bottom: 2px !important; max-width: 145px !important; }
                .h-date { font-size: 9.3px !important; max-width: 150px !important; }
                .h-price { font-size: 11.5px !important; margin-bottom: 4px !important; }
                .h-badge { font-size: 7.8px !important; padding: 4px 7px !important; }
        
                /* PATCH DONI: Modal detail transaksi profesional */
                #modalDetailRiwayat { align-items: flex-end !important; background: rgba(2,6,23,0.54) !important; backdrop-filter: blur(7px); -webkit-backdrop-filter: blur(7px); }
                #modalDetailRiwayat .modal-content { max-width: 520px; margin: 0 auto; }
                .receipt-header.pro-detail { display:flex; align-items:center; gap:12px; text-align:left; padding: 12px; border-radius: 22px; background: linear-gradient(135deg, rgba(127,29,29,0.09), rgba(124,58,237,0.06)); border: 1px solid rgba(127,29,29,0.10); margin-bottom: 14px; }
                .receipt-icon.pro { width:48px; height:48px; border-radius:18px; color:#fff; display:flex; align-items:center; justify-content:center; flex-shrink:0; box-shadow: 0 12px 24px rgba(15,23,42,0.14); overflow:hidden; }
                .receipt-icon.pro img { width:66%; height:66%; object-fit:contain; }
                .receipt-status.pro { font-size:15px; font-weight:950; letter-spacing:-0.25px; }
                .receipt-meta { font-size:10.5px; color:#64748b; font-weight:800; margin-top:3px; }
                .receipt-amount-wrap { text-align:center; padding: 10px 10px 14px; border-radius: 20px; background: #f8fafc; border:1px solid rgba(15,23,42,0.06); margin-bottom: 12px; }
                .receipt-amount-label { font-size:10.5px; color:#64748b; font-weight:900; text-transform:uppercase; letter-spacing:.6px; }
                .receipt-amount { font-size:25px !important; font-weight:1000 !important; color:#0f172a; letter-spacing:-0.8px; margin-top:4px; }
                .detail-item { display:flex; justify-content:space-between; gap:14px; align-items:flex-start; padding:11px 12px !important; border-radius:14px !important; background:#ffffff; border:1px solid rgba(15,23,42,0.07); margin-bottom:8px; font-size:11.5px; color:#64748b; font-weight:850; }
                .detail-item .detail-val { text-align:right; color:#0f172a; font-weight:950; word-break:break-word; max-width:62%; }
                .sn-container { display:flex; gap:8px; align-items:center; background:#0f172a; color:#e5edf8; border-radius:16px; padding:12px; margin-top:8px; border:1px solid rgba(255,255,255,0.08); }
                .sn-text { flex:1; font-size:11.5px; line-height:1.45; word-break:break-word; font-weight:800; }
                .btn-copy { width:36px; height:36px; border-radius:12px; border:0; background:#7f1d1d; color:#fff; flex-shrink:0; }
                .detail-action-grid { display:grid; grid-template-columns: 1fr 1fr; gap:9px; margin-top:14px; }
                .detail-action-grid .btn-konfirmasi, .detail-action-grid .btn-batal { margin-top:0 !important; width:100%; border-radius:13px !important; padding:12px 10px !important; font-size:11px !important; }
                .detail-action-grid .full { grid-column: 1 / -1; }
                body.dark-theme .receipt-header.pro-detail { background: linear-gradient(135deg, rgba(127,29,29,0.18), rgba(124,58,237,0.12)); border-color: rgba(148,163,184,0.14); }
                body.dark-theme .receipt-meta, body.dark-theme .receipt-amount-label { color:#94a3b8 !important; }
                body.dark-theme .receipt-amount-wrap { background: rgba(15,23,42,0.78); border-color: rgba(148,163,184,0.13); }
                body.dark-theme .sn-container { background:#020617; border-color:rgba(148,163,184,0.14); }
                @media (max-width: 380px) {
                    .menu-container > .menu-grid { grid-auto-columns: 64px !important; gap: 9px 7px !important; }
                    .menu-container > .menu-grid .menu-item { width:64px !important; min-width:64px !important; font-size:9.8px !important; }
                    .menu-container > .menu-grid .icon-box { width:40px !important; height:40px !important; }
                    .h-prod { max-width: 118px !important; }
                    .h-date { max-width: 125px !important; }
                }
        
        
                /* PATCH DONI: Tombol Paket Akrab keluar dari menu utama dan menjadi panel memanjang */
                .inline-akrab-wrapper { margin: 14px 0 2px; }
                .inline-akrab-toggle { width: 100%; border: 0; outline: none; cursor: pointer; display: flex; align-items: center; gap: 12px; padding: 14px 14px; border-radius: 22px; background: linear-gradient(135deg, #0f766e 0%, #14b8a6 45%, #dc2626 100%); color: #fff; box-shadow: 0 14px 28px rgba(20,184,166,0.28), inset 0 0 0 1px rgba(255,255,255,0.18); position: relative; overflow: hidden; text-align: left; transition: all .25s ease; }
                .inline-akrab-toggle::before { content: ''; position: absolute; width: 95px; height: 95px; right: -32px; top: -42px; border-radius: 50%; background: rgba(255,255,255,0.16); }
                .inline-akrab-toggle::after { content: ''; position: absolute; left: 14px; right: 14px; bottom: 0; height: 1px; background: linear-gradient(90deg, transparent, rgba(255,255,255,.45), transparent); }
                .inline-akrab-toggle:active { transform: scale(.985); }
                .inline-akrab-icon { width: 46px; height: 46px; border-radius: 17px; background: rgba(255,255,255,0.18); display: flex; align-items: center; justify-content: center; flex-shrink: 0; box-shadow: inset 0 0 0 1px rgba(255,255,255,0.18); position: relative; z-index: 2; }
                .inline-akrab-icon i { font-size: 20px; color: #fff; }
                .inline-akrab-text { flex: 1; min-width: 0; position: relative; z-index: 2; }
                .inline-akrab-text strong { display: block; font-size: 16px; font-weight: 1000; letter-spacing: -.3px; }
                .inline-akrab-text span { display: block; font-size: 10.5px; font-weight: 800; opacity: .88; margin-top: 3px; line-height: 1.25; }
                .inline-akrab-arrow { width: 34px; height: 34px; border-radius: 13px; background: rgba(255,255,255,0.18); display: flex; align-items: center; justify-content: center; position: relative; z-index: 2; transition: transform .25s ease; }
                .inline-akrab-wrapper.open .inline-akrab-arrow { transform: rotate(180deg); }
                .inline-akrab-panel { display: none; margin-top: 10px; border-radius: 24px; background: #ffffff; border: 1px solid rgba(15,23,42,0.07); box-shadow: 0 12px 26px rgba(15,23,42,0.06); padding: 12px; overflow: hidden; animation: inlineAkrabDown .22s ease; }
                .inline-akrab-wrapper.open .inline-akrab-panel { display: block; }
                @keyframes inlineAkrabDown { from { opacity: 0; transform: translateY(-8px); } to { opacity: 1; transform: translateY(0); } }
                .inline-akrab-search-wrap { height: 42px; display: flex; align-items: center; gap: 9px; padding: 0 12px; border-radius: 16px; background: #f8fafc; border: 1px solid #e2e8f0; margin-bottom: 10px; }
                .inline-akrab-search-wrap i { color: #14b8a6; font-size: 13px; }
                .inline-akrab-search-wrap input { flex: 1; min-width: 0; border: 0; outline: 0; background: transparent; font-size: 12px; font-weight: 800; color: #0f172a; }
                .inline-akrab-filter { display: block; margin-bottom: 10px; }
                .inline-akrab-filter .akrab-mode-header { padding: 0; margin: 0 0 11px; align-items: stretch; }
                .inline-akrab-filter .akrab-section-title { margin: 0; padding: 0; font-size: 11px; font-weight: 1000; color: #0f172a; text-transform: uppercase; letter-spacing: .55px; display: flex; align-items: center; gap: 7px; }
                .inline-akrab-filter .akrab-section-title::before { content: '\f58d'; font-family: 'Font Awesome 5 Free'; font-weight: 900; width: 24px; height: 24px; border-radius: 9px; background: linear-gradient(135deg,#7f1d1d,#dc2626); color: #fff; display: inline-flex; align-items: center; justify-content: center; font-size: 10px; box-shadow: 0 6px 14px rgba(127,29,29,.18); }
                .inline-akrab-filter .akrab-grid { display: grid; grid-template-columns: repeat(2, minmax(0,1fr)); gap: 9px; padding: 0; background: transparent; }
                .inline-akrab-filter .akrab-btn { min-height: 54px; display: grid; grid-template-columns: 30px minmax(0,1fr) 14px; align-items: center; gap: 6px; padding: 8px; border-radius: 16px; border: 1px solid rgba(127,29,29,0.10); background: linear-gradient(180deg,#ffffff 0%,#fff7f7 100%); color: #0f172a; font-size: 9.2px; font-weight: 900; cursor: pointer; box-shadow: 0 7px 16px rgba(15,23,42,0.055); text-align: left; position: relative; overflow: hidden; }
                .inline-akrab-filter .akrab-btn::after { content: ''; position: absolute; right: -28px; top: -34px; width: 68px; height: 68px; border-radius: 22px; background: rgba(127,29,29,.055); transform: rotate(18deg); pointer-events: none; }
                .inline-akrab-filter .akrab-btn.po-card { border-style: dashed; background: linear-gradient(180deg,#fff7ed 0%,#fff1f2 100%); }
                .inline-akrab-filter .akrab-btn.active, .inline-akrab-filter .akrab-btn:active { background: linear-gradient(135deg,#7f1d1d,#991b1b); border-color: #7f1d1d; color: #fff; transform: translateY(1px); box-shadow: 0 10px 22px rgba(127,29,29,.22); }
                .inline-akrab-filter .akrab-chip-icon { width: 30px; height: 30px; border-radius: 12px; display: inline-flex; align-items: center; justify-content: center; background: #fff; color: #7f1d1d; box-shadow: inset 0 0 0 1px rgba(127,29,29,.08), 0 5px 12px rgba(127,29,29,.08); position: relative; z-index: 2; font-size: 10px; }
                .inline-akrab-filter .akrab-chip-text { min-width: 0; display: flex; flex-direction: column; gap: 1px; position: relative; z-index: 2; }
                .inline-akrab-filter .akrab-chip-text b { overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; white-space: normal; font-size: 9.4px; font-weight: 1000; line-height: 1.08; color: inherit; }
                .inline-akrab-filter .akrab-chip-text small { font-size: 7.4px; font-weight: 900; color: #94a3b8; letter-spacing: .1px; line-height: 1.1; }
                .inline-akrab-filter .akrab-chip-go { color: #cbd5e1; font-size: 8px; position: relative; z-index: 2; }
                .inline-akrab-filter .akrab-btn.active .akrab-chip-icon { background: rgba(255,255,255,.18); color: #fff; box-shadow: inset 0 0 0 1px rgba(255,255,255,.25); }
                .inline-akrab-filter .akrab-btn.active .akrab-chip-text b { color: #fff; }
                .inline-akrab-filter .akrab-btn.active .akrab-chip-text small, .inline-akrab-filter .akrab-btn.active .akrab-chip-go { color: rgba(255,255,255,.78); }
                .inline-akrab-list { max-height: 430px; overflow-y: auto; padding: 1px 1px 4px; -webkit-overflow-scrolling: touch; }
                .inline-akrab-list .item-produk { margin-bottom: 8px; border-radius: 17px !important; background: #fff; border: 1px solid rgba(15,23,42,0.07); box-shadow: 0 6px 14px rgba(15,23,42,0.045); padding: 11px !important; }
                .inline-akrab-empty { text-align: center; color: #94a3b8; padding: 28px 12px; font-size: 12px; font-weight: 800; line-height: 1.55; }
                .inline-akrab-empty i { font-size: 23px; color: #14b8a6; margin-bottom: 6px; }
                body.dark-theme .inline-akrab-panel { background: #0f172a; border-color: rgba(148,163,184,0.14); box-shadow: 0 12px 28px rgba(0,0,0,0.28); }
                body.dark-theme .inline-akrab-search-wrap { background: #020617; border-color: rgba(148,163,184,0.18); }
                body.dark-theme .inline-akrab-search-wrap input { color: #e5edf8; }
                body.dark-theme .inline-akrab-filter .akrab-section-title { color: #e5edf8; }
                body.dark-theme .inline-akrab-filter .akrab-btn { background: linear-gradient(180deg, rgba(15,23,42,0.92), rgba(30,41,59,0.86)); border-color: rgba(148,163,184,0.16); color: #e5edf8; box-shadow: 0 7px 16px rgba(0,0,0,.20); }
                body.dark-theme .inline-akrab-filter .akrab-btn.po-card { background: linear-gradient(180deg, rgba(67,20,7,.52), rgba(69,10,10,.38)); }
                body.dark-theme .inline-akrab-filter .akrab-btn.active { background: linear-gradient(135deg,#7f1d1d,#991b1b); border-color: #ef4444; color: #fff; }
                body.dark-theme .inline-akrab-filter .akrab-chip-icon { background: rgba(2,6,23,.72); color: #fecaca; box-shadow: inset 0 0 0 1px rgba(148,163,184,.18); }
                body.dark-theme .inline-akrab-filter .akrab-chip-text small { color: #94a3b8; }
                body.dark-theme .inline-akrab-list .item-produk { background: rgba(15,23,42,0.88); border-color: rgba(148,163,184,0.14); color: #e5edf8; }
                @media (max-width: 380px) {
                    .inline-akrab-toggle { padding: 12px; border-radius: 20px; }
                    .inline-akrab-icon { width: 42px; height: 42px; }
                    .inline-akrab-text strong { font-size: 15px; }
                    .inline-akrab-text span { font-size: 10px; }
                    .inline-akrab-filter .akrab-grid { grid-template-columns: 1fr 1fr; gap: 7px; }
                }
        
        
        /* RIWAYAT TRANSAKSI (Panel Premium Modern) */
                .live-history-shell { margin: 0 15px 18px; background: linear-gradient(180deg, #ffffff 0%, #f8fbff 100%); border-radius: 26px; border: 1px solid rgba(15,23,42,0.06); box-shadow: 0 14px 35px rgba(15,23,42,0.07); overflow: hidden; position: relative; z-index: 2; }
                .live-history-shell::before { content: ''; position: absolute; width: 140px; height: 140px; right: -60px; top: -75px; background: radial-gradient(circle, rgba(127,29,29,0.14), rgba(127,29,29,0)); border-radius: 50%; pointer-events: none; }
                #liveHistoryHeader { display: flex; align-items: center; gap: 10px; padding: 16px 16px 10px; position: relative; }
                .history-title-wrap { flex: 1; min-width: 0; }
                .history-title-main { display: flex; align-items: center; gap: 9px; font-weight: 950; font-size: 15px; color: #0f172a; letter-spacing: -0.3px; }
                .history-title-main i { width: 32px; height: 32px; border-radius: 13px; background: linear-gradient(135deg, #7f1d1d, #7c3aed); color: #fff; display: inline-flex; align-items: center; justify-content: center; box-shadow: 0 8px 18px rgba(127,29,29,0.25); }
                .history-subtitle { font-size: 10px; color: #94a3b8; font-weight: 700; margin-top: 3px; padding-left: 41px; }
                .history-action-row { display: flex; align-items: center; gap: 7px; flex-shrink: 0; }
                .history-mini-btn { height: 31px; padding: 0 11px; border-radius: 999px; border: 1px solid rgba(127,29,29,0.10); background: #fef2f2; color: #7f1d1d; display: inline-flex; align-items: center; justify-content: center; gap: 6px; font-size: 10px; font-weight: 900; cursor: pointer; transition: 0.22s ease; white-space: nowrap; }
                .history-mini-btn:active { transform: scale(0.93); }
                .history-mini-btn.primary { background: linear-gradient(135deg, #7f1d1d, #4f46e5); color: #fff; border-color: transparent; box-shadow: 0 8px 16px rgba(127,29,29,0.22); }
                .history-mini-btn.icon-only { width: 31px; padding: 0; border-radius: 13px; background: #f8fafc; color: #64748b; }
                .history-container { padding: 4px 14px 15px; margin-bottom: 0; max-height: 255px; overflow-y: auto; position: relative; }
                .history-container::-webkit-scrollbar { width: 4px; }
                .history-container::-webkit-scrollbar-thumb { background: rgba(127,29,29,0.25); border-radius: 20px; }
                .history-card { background: rgba(255,255,255,0.92); padding: 9px 10px; border-radius: 17px; margin-bottom: 8px; border: 1px solid rgba(15,23,42,0.06); cursor: pointer; transition: all 0.22s ease; display: flex; align-items: center; gap: 8px; box-shadow: 0 7px 16px rgba(15,23,42,0.04); position: relative; overflow: hidden; }
                .history-card::before { content: ''; position: absolute; left: 0; top: 14px; bottom: 14px; width: 4px; border-radius: 0 10px 10px 0; background: linear-gradient(180deg, #7f1d1d, #7c3aed); }
                .history-card:active { background: #f8fafc; transform: scale(0.975); }
                .h-tap-area { flex: 1; display: flex; align-items: center; width: 100%; gap: 11px; min-width: 0; }
                .h-icon { width: 38px; height: 38px; border-radius: 14px; background: linear-gradient(145deg, #fef2f2, #ffffff); color: #7f1d1d; display: flex; align-items: center; justify-content: center; font-size: 16px; flex-shrink: 0; box-shadow: inset 0 0 0 1px rgba(127,29,29,0.09), 0 6px 13px rgba(127,29,29,0.08); margin-left: 3px; overflow: hidden; }
                .h-icon img { width: 68%; height: 68%; object-fit: contain; display: block; }
                .h-content { flex: 1; min-width: 0; }
                .h-prod { font-weight: 950; font-size: 12.2px; color: #0f172a; margin-bottom: 4px; line-height: 1.25; letter-spacing: -0.25px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 150px; }
                .h-date { font-size: 10px; color: #64748b; font-weight: 700; display: flex; align-items: center; gap: 4px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 160px; }
                .h-right { text-align: right; flex-shrink: 0; }
                .h-price { font-weight: 950; color: #0f172a; font-size: 12.5px; margin-bottom: 6px; letter-spacing: -0.2px; }
                .h-badge { font-size: 8.5px; padding: 5px 9px; border-radius: 999px; font-weight: 950; display: inline-flex; align-items: center; justify-content: center; letter-spacing: 0.4px; text-transform: uppercase; box-shadow: inset 0 0 0 1px rgba(255,255,255,0.45); }
                .bg-BERHASIL { background: #dcfce7; color: #b91c1c; }
                .bg-PENDING { background: #fef3c7; color: #d97706; }
                .bg-GAGAL { background: #fee2e2; color: #dc2626; }
                .history-empty-state { text-align:center; padding:24px 10px 28px; color:#94a3b8; }
                .history-empty-state i { width:48px; height:48px; border-radius:18px; background:#fef2f2; color:#7f1d1d; display:inline-flex; align-items:center; justify-content:center; font-size:20px; margin-bottom:10px; }
                .history-empty-state b { display:block; color:#334155; font-size:13px; margin-bottom:3px; }
                .history-empty-state span { font-size:10.5px; font-weight:700; }
                .loading-badge { position: absolute; top: 5px; right: 5px; font-size: 8px; color: #0088cc; display: block; }
        
                /* PATCH DONI: Header riwayat lebih tipis + Produk sering dibeli */
                #liveHistoryHeader { padding: 10px 12px 7px !important; gap: 7px !important; }
                .history-title-main { font-size: 13px !important; gap: 7px !important; letter-spacing: -0.2px !important; }
                .history-title-main i { width: 26px !important; height: 26px !important; border-radius: 10px !important; font-size: 12px !important; box-shadow: 0 5px 12px rgba(127,29,29,0.18) !important; }
                .history-subtitle { font-size: 9px !important; margin-top: 1px !important; padding-left: 33px !important; }
                .history-action-row { gap: 5px !important; }
                .history-mini-btn { height: 26px !important; padding: 0 8px !important; font-size: 9px !important; gap: 4px !important; }
                .history-mini-btn.icon-only { width: 26px !important; border-radius: 10px !important; }
                .frequent-product-switch { margin: 0 15px 9px; display: flex; gap: 8px; position: relative; z-index: 2; }
                .frequent-product-switch button { width: 100%; border: none; border-radius: 18px; padding: 12px 13px; background: linear-gradient(135deg, #f97316, #ef4444); color: #fff; font-size: 12px; font-weight: 950; letter-spacing: -0.2px; display: flex; align-items: center; justify-content: center; gap: 8px; box-shadow: 0 10px 24px rgba(239,68,68,0.22); cursor: pointer; transition: 0.22s ease; }
                .frequent-product-switch button:active { transform: scale(0.97); }
                .frequent-product-switch button.active-history { background: linear-gradient(135deg, #7f1d1d, #4f46e5); box-shadow: 0 10px 24px rgba(127,29,29,0.22); }
                .frequent-product-list { display: flex; flex-direction: column; gap: 8px; }
                .frequent-product-card { background: rgba(255,255,255,0.94); border: 1px solid rgba(15,23,42,0.06); border-radius: 17px; padding: 10px; display: flex; align-items: center; gap: 10px; cursor: pointer; box-shadow: 0 7px 16px rgba(15,23,42,0.04); transition: 0.22s ease; }
                .frequent-product-card:active { transform: scale(0.975); background: #f8fafc; }
                .frequent-product-icon { width: 38px; height: 38px; border-radius: 14px; background: linear-gradient(145deg, #fff7ed, #ffffff); color: #f97316; display: flex; align-items: center; justify-content: center; flex-shrink: 0; box-shadow: inset 0 0 0 1px rgba(249,115,22,0.10), 0 6px 13px rgba(249,115,22,0.08); overflow: hidden; }
                .frequent-product-icon img { width: 68%; height: 68%; object-fit: contain; display: block; }
                .frequent-product-info { flex: 1; min-width: 0; }
                .frequent-product-name { font-size: 12px; font-weight: 950; color: #0f172a; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.25; }
                .frequent-product-code { font-size: 9.5px; color: #94a3b8; font-weight: 800; margin-top: 3px; }
                .frequent-product-right { text-align: right; flex-shrink: 0; }
                .frequent-product-price { font-size: 12px; font-weight: 950; color: #0f172a; }
                .frequent-product-count { margin-top: 4px; font-size: 8.5px; padding: 4px 7px; border-radius: 999px; background: #ffedd5; color: #ea580c; font-weight: 950; display: inline-flex; align-items: center; gap: 4px; }
                body.dark-theme .frequent-product-card { background: rgba(15,23,42,0.92) !important; border-color: rgba(148,163,184,0.14) !important; box-shadow: 0 10px 24px rgba(0,0,0,0.28) !important; }
                body.dark-theme .frequent-product-name, body.dark-theme .frequent-product-price { color: #e5edf8 !important; }
                body.dark-theme .frequent-product-code { color: #94a3b8 !important; }
                body.dark-theme .frequent-product-icon { background: linear-gradient(145deg, #1e293b, #0f172a) !important; box-shadow: inset 0 0 0 1px rgba(148,163,184,0.14), 0 8px 18px rgba(0,0,0,0.28) !important; }
        
                body.dark-theme { --bg: #07111f; --white: #0f172a; --text-dark: #e5edf8; --text-grey: #94a3b8; background: radial-gradient(circle at top, #10213b 0%, #07111f 45%, #050a13 100%); color: #e5edf8; }
                body.dark-theme .header { background: linear-gradient(135deg, #0f172a 0%, #1e1b4b 55%, #111827 100%) !important; }
                body.dark-theme .saldo-box, body.dark-theme .menu-container, body.dark-theme .live-history-shell { background: linear-gradient(180deg, rgba(15,23,42,0.96), rgba(17,24,39,0.94)) !important; border-color: rgba(148,163,184,0.15) !important; box-shadow: 0 18px 40px rgba(0,0,0,0.35) !important; }
                body.dark-theme .cat-title, body.dark-theme .history-title-main, body.dark-theme .h-prod, body.dark-theme .h-price, body.dark-theme .history-empty-state b { color: #e5edf8 !important; }
                body.dark-theme .history-subtitle, body.dark-theme .h-date, body.dark-theme .history-empty-state span { color: #94a3b8 !important; }
                body.dark-theme .icon-box { background: linear-gradient(145deg, #1e293b, #0f172a) !important; box-shadow: inset 0 0 0 1px rgba(148,163,184,0.12), 0 10px 22px rgba(0,0,0,0.22) !important; }
                body.dark-theme .menu-item { color: #e5edf8 !important; }
                body.dark-theme .menu-scroll-hint { background: rgba(127,29,29,0.16); }
                body.dark-theme .history-card { background: rgba(15,23,42,0.92) !important; border-color: rgba(148,163,184,0.14) !important; box-shadow: 0 10px 24px rgba(0,0,0,0.28) !important; }
                body.dark-theme .h-icon { background: linear-gradient(145deg, #1e293b, #0f172a) !important; box-shadow: inset 0 0 0 1px rgba(148,163,184,0.14), 0 8px 18px rgba(0,0,0,0.28) !important; }
                body.dark-theme .detail-val, body.dark-theme .receipt-amount { color: #e5edf8 !important; }
                body.dark-theme .detail-item { background: rgba(15,23,42,0.75); border-color: rgba(148,163,184,0.13); color: #94a3b8; }
                body.dark-theme #modalDetailRiwayat .modal-content { background: linear-gradient(180deg, #111827 0%, #0f172a 100%) !important; color: #e5edf8; }
                body.dark-theme .theme-toggle-btn { background: rgba(250,204,21,0.16) !important; border-color: rgba(250,204,21,0.35) !important; }
                body.dark-theme .theme-toggle-btn i { color: #facc15 !important; }
        
                .fa-spin { animation: spin 1s infinite linear; }
                @keyframes spin { 100% { transform: rotate(360deg); } }
        
        /* MODAL MODERN BOTTOM SHEET */
                .modal { display: none; position: fixed; bottom: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.4); backdrop-filter: blur(4px); -webkit-backdrop-filter: blur(4px); align-items: flex-end; z-index: 11000; }
                .modal-content { background: #ffffff; width: 100%; height: auto; max-height: 95vh; padding: 25px 20px 20px; border-radius: 28px 28px 0 0 !important; display: flex; flex-direction: column; animation: slideUpSmooth 0.4s cubic-bezier(0.2, 0.8, 0.2, 1); box-sizing: border-box; position: relative; box-shadow: 0 -10px 40px rgba(0, 0, 0, 0.15); }
                .modal-content::before { content: ''; position: absolute; top: 10px; left: 50%; transform: translateX(-50%); width: 45px; height: 5px; background: #cbd5e1; border-radius: 10px; z-index: 9999; }
        
        
                /* PATCH DONI: Kunci bottom sheet PPOB agar subfilter dan daftar produk tetap menyatu */
                #modalApp.ppob-sheet-locked .modal-content { height: 85vh !important; max-height: 85vh !important; overflow: hidden !important; padding-top: 25px !important; }
                #modalApp.ppob-sheet-locked #defaultModalHeader { flex: 0 0 auto; margin-bottom: 10px !important; }
                #modalApp.ppob-sheet-locked #inputContainer { flex: 0 0 auto; }
                #modalApp.ppob-sheet-locked #areaFilter { min-height: 0; overflow-y: auto; overscroll-behavior: contain; padding-bottom: 8px; }
                #modalApp.ppob-products-open #areaFilter { display: none !important; }
                #modalApp.ppob-products-open #listProdukArea { display: block !important; flex: 1 1 auto !important; min-height: 0 !important; max-height: none !important; overflow-y: auto !important; overscroll-behavior: contain; margin-bottom: 0 !important; -webkit-overflow-scrolling: touch; }
                #modalApp.ppob-products-open #listProdukArea::-webkit-scrollbar, #modalApp.ppob-sheet-locked #areaFilter::-webkit-scrollbar { width: 0; height: 0; }
        
                @keyframes slideUpSmooth { from {transform: translateY(100%);} to {transform: translateY(0);} }
                @keyframes slideUp { from {transform: translateY(100%);} to {transform: translateY(0);} }
        
        .input-group { position: relative; margin-bottom: 15px; }
                .input-group i { position: absolute; left: 16px; top: 18px; color: #a0aec0; font-size: 18px; transition: 0.3s; z-index: 5; }
        .form-input { 
                    width: 100%; 
                    padding: 10px 10px 10px 40px; 
                    border: 2px solid #edf2f7; 
                    border-radius: 12px; 
                    font-size: 12px; 
                    outline: none; 
                    background: #f8fafc; 
                    box-sizing: border-box; 
                    transition: all 0.3s ease;
                    color: var(--text-dark);
                    font-weight: 600;
                }
                .form-input:focus { border-color: var(--primary); background: #fff; box-shadow: 0 0 0 4px rgba(127,29,29, 0.1); }
                .form-input:focus + i { color: var(--primary); }
                #areaFilter { display: grid; grid-template-columns: repeat(3, 1fr); gap: 10px; padding: 10px 0; max-height: 50vh; overflow-y: auto; }
                
                .filter-card-list { display: flex; align-items: center; background: white; padding: 15px; border-bottom: 1px solid #f0f0f0; cursor: pointer; transition: 0.2s; }
                .filter-card-list:last-child { border-bottom: none; }
                .filter-card-list:active { background: #e3f2fd; }
                .filter-card-list img { width: 35px; height: 35px; object-fit: contain; margin-right: 15px; }
                .filter-card-list span { flex: 1; font-weight: 600; font-size: 14px; color: #333; text-align: left; }
                .filter-card-list i { color: #ccc; font-size: 14px; }
        .filter-card { background: white; border: 1px solid #eee; border-radius: 12px; padding: 10px; text-align: center; cursor: pointer; transition: 0.2s; box-shadow: 0 2px 5px rgba(0,0,0,0.03); display: flex; flex-direction: column; align-items: center; justify-content: center; }
                .filter-card:active { transform: scale(0.95); background: #f0f7ff; }
                .filter-card.active { border-color: var(--primary); background: #e3f2fd; }
                .filter-card img { width: 32px; height: 32px; object-fit: contain; margin-bottom: 6px; }
                .filter-card span { display: block; font-size: 10px; font-weight: bold; color: #555; line-height: 1.2; word-break: break-word; }
        
        
                /* PATCH DONI: Harmonisasi Menu Utama + Filter PPOB tema Paket Akrab */
                .menu-container {
                    background: linear-gradient(180deg, rgba(255,255,255,0.98), rgba(255,247,247,0.92));
                    border: 1px solid rgba(127,29,29,0.08);
                    border-radius: 22px;
                    padding: 10px 8px 12px;
                    box-shadow: 0 10px 24px rgba(15,23,42,0.045);
                    overflow: hidden;
                }
                .menu-container > .menu-grid { gap: 12px 10px !important; padding: 4px 2px 12px !important; }
                .menu-container > .menu-grid .menu-item { color: #0f172a !important; font-weight: 900 !important; letter-spacing: -0.2px; border-radius: 18px; padding: 4px 2px 6px; transition: transform .18s ease, background .18s ease; }
                .menu-container > .menu-grid .menu-item:active { transform: translateY(1px) scale(.98); background: rgba(127,29,29,.045); }
                .menu-container > .menu-grid .icon-box { background: linear-gradient(180deg,#ffffff,#fff7f7) !important; border: 1px solid rgba(127,29,29,.10) !important; color: #7f1d1d !important; box-shadow: 0 7px 16px rgba(127,29,29,.085) !important; position: relative; overflow: hidden; }
                .menu-container > .menu-grid .icon-box::after { content: ''; position: absolute; right: -18px; top: -22px; width: 48px; height: 48px; border-radius: 18px; background: rgba(127,29,29,.07); transform: rotate(18deg); pointer-events: none; }
                .menu-container > .menu-grid .icon-box i, .menu-container > .menu-grid .icon-box img { position: relative; z-index: 2; }
                #areaFilter.ppob-filter-modern, #areaFilter { gap: 9px !important; padding: 8px 2px 12px !important; max-height: 55vh; }
                #areaFilter.ppob-filter-modern { display: grid !important; grid-template-columns: repeat(2, minmax(0,1fr)) !important; }
                #areaFilter.ppob-filter-modern.ppob-list-mode { display: block !important; }
                #areaFilter.ppob-filter-modern .filter-card, #areaFilter.ppob-filter-modern .filter-card-list { min-height: 56px; display: grid !important; grid-template-columns: 32px minmax(0,1fr) 15px; align-items: center; gap: 7px; padding: 8px; border-radius: 16px; border: 1px solid rgba(127,29,29,.10) !important; background: linear-gradient(180deg,#ffffff 0%,#fff7f7 100%) !important; box-shadow: 0 7px 16px rgba(15,23,42,.055) !important; text-align: left; cursor: pointer; position: relative; overflow: hidden; margin: 0 0 8px 0; transition: .2s ease; }
                #areaFilter.ppob-filter-modern .filter-card::after, #areaFilter.ppob-filter-modern .filter-card-list::after { content: ''; position: absolute; right: -28px; top: -34px; width: 68px; height: 68px; border-radius: 22px; background: rgba(127,29,29,.055); transform: rotate(18deg); pointer-events: none; }
                #areaFilter.ppob-filter-modern .filter-card:active, #areaFilter.ppob-filter-modern .filter-card-list:active { transform: translateY(1px) scale(.99); }
                #areaFilter.ppob-filter-modern .filter-card.active, #areaFilter.ppob-filter-modern .filter-card-list.active { background: linear-gradient(135deg,#7f1d1d,#991b1b) !important; border-color: #7f1d1d !important; color: #fff !important; box-shadow: 0 10px 22px rgba(127,29,29,.22) !important; }
                #areaFilter.ppob-filter-modern .filter-card.folder-card, #areaFilter.ppob-filter-modern .filter-card-list.folder-card { border-style: dashed !important; background: linear-gradient(180deg,#fff7ed,#fff1f2) !important; }
                #areaFilter.ppob-filter-modern .filter-chip-icon { width: 32px; height: 32px; border-radius: 12px; background: rgba(127,29,29,.075); color: #7f1d1d; display: inline-flex; align-items: center; justify-content: center; position: relative; overflow: hidden; z-index: 2; flex: 0 0 32px; }
                #areaFilter.ppob-filter-modern .filter-chip-icon i { font-size: 14px; color: #7f1d1d; }
                #areaFilter.ppob-filter-modern .filter-chip-icon img { width: 74%; height: 74%; object-fit: contain; margin: 0 !important; position: absolute; z-index: 3; }
                #areaFilter.ppob-filter-modern .filter-chip-text { min-width: 0; position: relative; z-index: 2; }
                #areaFilter.ppob-filter-modern .filter-chip-text b { display: block; color: #0f172a; font-size: 10.4px; line-height: 1.16; font-weight: 900; letter-spacing: -0.15px; white-space: normal; word-break: break-word; }
                #areaFilter.ppob-filter-modern .filter-chip-text small { display: block; margin-top: 2px; font-size: 8.6px; line-height: 1.15; color: #64748b; font-weight: 800; }
                #areaFilter.ppob-filter-modern .filter-chip-go { color: rgba(127,29,29,.62); font-size: 12px; position: relative; z-index: 2; }
                #areaFilter.ppob-filter-modern .filter-card.active .filter-chip-icon, #areaFilter.ppob-filter-modern .filter-card-list.active .filter-chip-icon { background: rgba(255,255,255,.18); color: #fff; box-shadow: inset 0 0 0 1px rgba(255,255,255,.25); }
                #areaFilter.ppob-filter-modern .filter-card.active .filter-chip-icon i, #areaFilter.ppob-filter-modern .filter-card-list.active .filter-chip-icon i, #areaFilter.ppob-filter-modern .filter-card.active .filter-chip-text b, #areaFilter.ppob-filter-modern .filter-card-list.active .filter-chip-text b { color: #fff; }
                #areaFilter.ppob-filter-modern .filter-card.active .filter-chip-text small, #areaFilter.ppob-filter-modern .filter-card-list.active .filter-chip-text small, #areaFilter.ppob-filter-modern .filter-card.active .filter-chip-go, #areaFilter.ppob-filter-modern .filter-card-list.active .filter-chip-go { color: rgba(255,255,255,.78); }
                .ppob-filter-back { grid-column: 1 / -1; min-height: 46px; display: flex; align-items: center; gap: 9px; padding: 9px 11px; border-radius: 16px; border: 1px solid rgba(127,29,29,.12); background: linear-gradient(180deg,#ffffff,#fff7f7); color: #7f1d1d; font-size: 11px; font-weight: 900; box-shadow: 0 7px 16px rgba(15,23,42,.045); cursor: pointer; margin-bottom: 8px; }
                body.dark-theme .menu-container { background: linear-gradient(180deg,rgba(15,23,42,.94),rgba(30,41,59,.86)); border-color: rgba(148,163,184,.16); box-shadow: 0 10px 24px rgba(0,0,0,.18); }
                body.dark-theme .menu-container > .menu-grid .menu-item { color: #e5edf8 !important; }
                body.dark-theme .menu-container > .menu-grid .icon-box { background: linear-gradient(180deg,rgba(15,23,42,.92),rgba(30,41,59,.86)) !important; border-color: rgba(148,163,184,.18) !important; color: #fecaca !important; box-shadow: 0 7px 16px rgba(0,0,0,.20) !important; }
                body.dark-theme #areaFilter.ppob-filter-modern .filter-card, body.dark-theme #areaFilter.ppob-filter-modern .filter-card-list, body.dark-theme .ppob-filter-back { background: linear-gradient(180deg,rgba(15,23,42,.92),rgba(30,41,59,.86)) !important; border-color: rgba(148,163,184,.16) !important; color: #e5edf8; box-shadow: 0 7px 16px rgba(0,0,0,.20) !important; }
                body.dark-theme #areaFilter.ppob-filter-modern .filter-card.folder-card, body.dark-theme #areaFilter.ppob-filter-modern .filter-card-list.folder-card { background: linear-gradient(180deg,rgba(67,20,7,.52),rgba(69,10,10,.38)) !important; }
                body.dark-theme #areaFilter.ppob-filter-modern .filter-chip-text b { color: #e5edf8; }
                body.dark-theme #areaFilter.ppob-filter-modern .filter-chip-text small { color: #94a3b8; }
                body.dark-theme #areaFilter.ppob-filter-modern .filter-chip-icon { background: rgba(248,113,113,.12); color: #fecaca; }
        
                #inputContainer { display: none; margin-bottom: 15px; }
                #btnKembali { display: none; font-size: 18px; color: var(--primary); cursor: pointer; margin-right: 12px; transition: 0.2s; }
                #btnKembali:active { transform: scale(0.8); }
        
                #listProdukArea { flex: 1; overflow-y: auto; border: 1px solid #eee; border-radius: 10px; margin-bottom: 10px; background: #fdfdfd; padding: 5px; position: relative; max-height: 50vh; }
                .item-produk { padding: 15px; border-bottom: none; display: flex; justify-content: space-between; align-items: center; cursor: pointer; background: white; margin-bottom: 10px; border-radius: 16px; border: 1px solid rgba(0,0,0,0.03); box-shadow: 0 4px 6px -4px rgba(0,0,0,0.05); transition: 0.2s; }
                .item-produk:active { background: #e3f2fd; }
        
                
                /* AKRAB PRODUCT CARD PREMIUM */
                .item-produk.akrab-product-card { padding: 13px; border-bottom: none; display: flex; flex-direction: column; align-items: stretch; gap: 10px; cursor: pointer; background: linear-gradient(180deg,#ffffff 0%,#fff8f8 100%); margin-bottom: 12px; border-radius: 22px; border: 1px solid rgba(127,29,29,.09); box-shadow: 0 9px 22px rgba(15,23,42,.055); transition: 0.2s ease; position: relative; overflow: hidden; }
                .item-produk.akrab-product-card::before { content: ''; position: absolute; right: -44px; top: -54px; width: 128px; height: 128px; border-radius: 36px; transform: rotate(18deg); background: rgba(127,29,29,.055); pointer-events: none; }
                .item-produk.akrab-product-card:active { background: #fff1f2; transform: scale(.992); }
                .item-produk.akrab-product-card.akrab-disabled { opacity: .72; background: linear-gradient(180deg,#fff7f7,#fff1f2); }
                .akrab-product-head { width: 100%; display: flex; align-items: flex-start; justify-content: space-between; gap: 10px; position: relative; z-index: 2; }
                .akrab-product-left { min-width: 0; display: flex; align-items: flex-start; gap: 10px; flex: 1; }
                .akrab-product-icon { width: 38px; height: 38px; border-radius: 15px; background: #fff; color: #7f1d1d; display: inline-flex; align-items: center; justify-content: center; box-shadow: inset 0 0 0 1px rgba(127,29,29,.08), 0 7px 15px rgba(127,29,29,.08); flex-shrink: 0; }
                .akrab-product-title-wrap { min-width: 0; flex: 1; }
                .akrab-product-title-line { display: flex; align-items: center; flex-wrap: wrap; gap: 5px; }
                .akrab-product-title { font-size: 13px; font-weight: 1000; color: #334155; line-height: 1.22; word-break: break-word; }
                .akrab-product-price { color: #7f1d1d; font-size: 14px; font-weight: 1000; white-space: nowrap; padding-top: 2px; }
                .akrab-product-badge { font-size: 8.5px; font-weight: 1000; color: #fff; border-radius: 999px; padding: 3px 6px; letter-spacing: .2px; line-height: 1; }
                .akrab-product-badge.badge-kosong { background: #f59e0b; }
                .akrab-product-badge.badge-gangguan { background: #ef4444; }
                .akrab-product-badge.badge-preorder { background: #f97316; }
                .akrab-product-meta { display: flex; flex-wrap: wrap; align-items: center; gap: 5px; margin-top: 6px; }
                .akrab-product-meta span, .akrab-product-stock { display: inline-flex; align-items: center; gap: 4px; padding: 4px 7px; border-radius: 999px; background: #f8fafc; color: #64748b; font-size: 9px; font-weight: 900; border: 1px solid rgba(226,232,240,.95); }
                .akrab-product-validity { background: #fff7ed !important; color: #9a3412 !important; border-color: rgba(251,146,60,.25) !important; }
                .akrab-product-stock { background: #ecfdf5; color: #0f766e; border-color: rgba(45,212,191,.18); }
                .akrab-product-desc { border-top: 1px dashed rgba(127,29,29,.12); padding-top: 9px; position: relative; z-index: 2; }
                .akrab-desc-pretty { display: flex; flex-direction: column; gap: 8px; }
                .akrab-desc-section { background: rgba(255,255,255,.72); border: 1px solid rgba(226,232,240,.78); border-radius: 14px; padding: 9px 10px; }
                .akrab-desc-title { display: flex; align-items: center; gap: 6px; color: #7f1d1d; font-size: 10px; font-weight: 1000; text-transform: uppercase; letter-spacing: .25px; margin-bottom: 5px; }
                .akrab-desc-title i { font-size: 9px; }
                .akrab-desc-line { color: #64748b; font-size: 10.5px; font-weight: 650; line-height: 1.45; padding: 1px 0; word-break: break-word; }
                .akrab-desc-line::before { content: '•'; color: #7f1d1d; font-weight: 1000; margin-right: 5px; }
                body.dark-theme .item-produk.akrab-product-card { background: linear-gradient(180deg,rgba(15,23,42,.94),rgba(30,41,59,.88)); border-color: rgba(148,163,184,.14); box-shadow: 0 9px 22px rgba(0,0,0,.20); }
                body.dark-theme .item-produk.akrab-product-card.akrab-disabled { background: linear-gradient(180deg,rgba(69,10,10,.44),rgba(30,41,59,.86)); }
                body.dark-theme .akrab-product-title { color: #f8fafc; }
                body.dark-theme .akrab-product-price { color: #fecaca; }
                body.dark-theme .akrab-product-icon { background: rgba(2,6,23,.72); color: #fecaca; box-shadow: inset 0 0 0 1px rgba(148,163,184,.18); }
                body.dark-theme .akrab-product-meta span, body.dark-theme .akrab-product-stock { background: rgba(2,6,23,.55); color: #cbd5e1; border-color: rgba(148,163,184,.16); }
                body.dark-theme .akrab-desc-section { background: rgba(2,6,23,.35); border-color: rgba(148,163,184,.14); }
                body.dark-theme .akrab-desc-line { color: #cbd5e1; }
                @media (max-width: 430px) {
                    .item-produk.akrab-product-card { padding: 12px; border-radius: 20px; gap: 9px; }
                    .akrab-product-icon { width: 35px; height: 35px; border-radius: 14px; }
                    .akrab-product-title { font-size: 12.4px; }
                    .akrab-product-price { font-size: 13px; }
                    .akrab-desc-section { padding: 8px 9px; }
                    .akrab-desc-line { font-size: 10px; }
                }
        
        
                .invoice-row { display: flex; justify-content: space-between; margin-bottom: 8px; font-size: 13px; color: #555; }
                .invoice-total { font-size: 16px; font-weight: bold; color: #333; border-top: 1px dashed #ccc; padding-top: 10px; margin-top: 10px; }
                .btn-konfirmasi { width: 100%; padding: 15px; background: var(--primary); color: white; border: none; border-radius: 12px; font-weight: bold; font-size: 16px; cursor: pointer; margin-top: 15px; }
                .btn-batal { width: 100%; padding: 15px; background: #f0f0f0; color: #555; border: none; border-radius: 12px; font-weight: bold; font-size: 16px; cursor: pointer; margin-top: 10px; }
                .sn-box { background: #f1f1f1; padding: 10px; border-radius: 8px; font-family: monospace; font-size: 11px; color: #333; word-break: break-all; margin-top: 10px; line-height: 1.4; border: 1px solid #ddd; }
                
        #operatorBadge { 
                    position: absolute; 
                    right: 75px; 
                    top: 15px; 
                    font-size: 10px; 
                    background: #e1effe; 
                    color: var(--primary); 
                    padding: 4px 10px; 
                    border-radius: 10px; 
                    font-weight: 800; 
                    display: none; 
                    z-index: 6;
                    text-transform: uppercase;
                }
                
                .product-list { display: grid; grid-template-columns: 1fr 1fr; gap: 15px; padding: 0 20px 20px; }
        .product-card { background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 2px 6px rgba(0,0,0,0.05); display: flex; flex-direction: column; }
                .product-info { padding: 10px; flex: 1; display: flex; flex-direction: column; justify-content: space-between; }
                .btn-buy-shop { width: 100%; padding: 6px; border: 1px solid var(--primary); color: var(--primary); background: white; border-radius: 6px; margin-top: 8px; font-size: 12px; font-weight: bold; cursor: pointer; }
        
                    /* LOADER KEREN DENGAN EFEK BLUR */
            #globalLoader { 
                position: fixed; 
                top: 0; 
                left: 0; 
                width: 100%; 
                height: 100%; 
                background: #ffffff;
                z-index: 99999; 
                display: flex; 
                flex-direction: column; 
                align-items: center; 
                justify-content: center; 
                transition: opacity 0.5s ease;
            }
            
            .loader-logo-box { 
                width: 80px; 
                height: 80px; 
                background: white; 
                border-radius: 20px; 
                padding: 10px; 
                box-shadow: 0 10px 30px rgba(0,0,0,0.1); 
                display: flex; 
                align-items: center; 
                justify-content: center; 
                margin-bottom: 25px;
                animation: pulseLogo 2s infinite ease-in-out;
            }
            
            .custom-spinner { 
                width: 40px; 
                height: 40px; 
                border: 4px solid #e1effe; 
                border-top: 4px solid var(--primary); 
                border-radius: 50%; 
                animation: spin 0.8s linear infinite; 
            }
        
            @keyframes pulseLogo {
                0% { transform: scale(1); box-shadow: 0 5px 15px rgba(0,0,0,0.05); }
                50% { transform: scale(1.05); box-shadow: 0 15px 35px rgba(185,28,28,0.2); }
                100% { transform: scale(1); box-shadow: 0 5px 15px rgba(0,0,0,0.05); }
            }
                /* AUTH UI PREMIUM KOTAK MODERN */
                #authOverlay { position: fixed; inset: 0; width: 100%; height: 100%; background: radial-gradient(circle at 16% 12%, rgba(127,29,29,.26), transparent 27%), radial-gradient(circle at 86% 18%, rgba(153,27,27,.22), transparent 24%), linear-gradient(145deg, #fff7f7 0%, #f8fafc 42%, #fee2e2 100%); z-index: 10000; display: flex; align-items: center; justify-content: center; padding: 18px; box-sizing: border-box; overflow: hidden; }
                #authOverlay::before { content: ''; position: absolute; width: 250px; height: 250px; left: -105px; bottom: -90px; border-radius: 48px; background: linear-gradient(135deg, rgba(127,29,29,.20), rgba(220,38,38,.10)); transform: rotate(18deg); box-shadow: 0 28px 60px rgba(127,29,29,.10); }
                #authOverlay::after { content: ''; position: absolute; width: 190px; height: 190px; right: -70px; top: 78px; border-radius: 42px; background: linear-gradient(135deg, rgba(69,10,10,.18), rgba(185,28,28,.13)); transform: rotate(-16deg); }
                .auth-fx-bg { position: absolute; top: -150px; left: 50%; width: 640px; height: 390px; transform: translateX(-50%); background: linear-gradient(135deg, rgba(69,10,10,.98), rgba(127,29,29,.94), rgba(15,23,42,.96)); border-radius: 0 0 90px 90px; z-index: 0; box-shadow: 0 26px 78px rgba(15,23,42,.24); overflow: hidden; }
                .auth-fx-bg::before { content: ''; position: absolute; inset: 26px; border-radius: 0 0 70px 70px; border: 1px solid rgba(255,255,255,.18); background-image: linear-gradient(rgba(255,255,255,.055) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,.055) 1px, transparent 1px); background-size: 34px 34px; opacity: .95; }
                .auth-card { position: relative; z-index: 10; width: 100%; max-width: 410px; background: rgba(255,255,255,.92); backdrop-filter: blur(18px); -webkit-backdrop-filter: blur(18px); border-radius: 30px; padding: 18px; box-shadow: 0 24px 70px rgba(15,23,42,.18), inset 0 1px 0 rgba(255,255,255,.85); border: 1px solid rgba(255,255,255,.75); color: var(--text-dark); animation: fadeInUp 0.42s ease-out; display: flex; flex-direction: column; gap: 12px; overflow: hidden; }
                .auth-card::before { content: ''; position: absolute; left: 18px; right: 18px; top: 0; height: 4px; border-radius: 0 0 999px 999px; background: linear-gradient(90deg, #450a0a, #991b1b, #ef4444); }
                .auth-card::after { content: ''; position: absolute; width: 130px; height: 130px; right: -62px; top: -55px; border-radius: 34px; background: rgba(153,27,27,.10); transform: rotate(18deg); pointer-events: none; }
                .auth-card > * { position: relative; z-index: 2; }
                @keyframes fadeInUp { from { opacity: 0; transform: translateY(22px) scale(.98); } to { opacity: 1; transform: translateY(0) scale(1); } }
                .auth-brand { text-align: center; position: relative; }
                .auth-brand-box { padding: 16px 12px 14px; border-radius: 24px; background: linear-gradient(180deg, #ffffff 0%, #fff1f2 100%); border: 1px solid rgba(153,27,27,.10); box-shadow: 0 10px 25px rgba(127,29,29,.08); overflow: hidden; }
                .auth-brand-box::before { content: ''; position: absolute; inset: 8px; border-radius: 19px; border: 1px dashed rgba(153,27,27,.16); pointer-events: none; }
                .brand-logo-glow { width: 78px; height: 78px; object-fit: contain; margin-bottom: 10px; padding: 9px; border-radius: 22px; background: linear-gradient(145deg, #ffffff, #fff1f2); box-shadow: 0 12px 28px rgba(127,29,29,.18), 0 0 0 1px rgba(153,27,27,.12); animation: logoFloat 3.2s infinite ease-in-out alternate; }
                @keyframes logoFloat { 0% { transform: translateY(0); } 100% { transform: translateY(-5px); } }
                .auth-h1 { font-size: 27px; font-weight: 950; margin: 0; color: #0f172a; letter-spacing: -0.8px; line-height: 1.1; }
                .auth-desc { color: #64748b; font-size: 12.5px; margin: 7px auto 0; font-weight: 700; max-width: 260px; line-height: 1.35; }
                .auth-pill { display: inline-flex; align-items: center; gap: 6px; margin-top: 11px; padding: 7px 11px; border-radius: 999px; background: #7f1d1d; color: #fff; font-size: 10px; font-weight: 900; box-shadow: 0 8px 18px rgba(127,29,29,.20); }
                .auth-mini-grid { display: grid; grid-template-columns: repeat(3, minmax(0,1fr)); gap: 9px; }
                .auth-mini-box { min-height: 66px; border-radius: 18px; background: #fff; border: 1px solid rgba(226,232,240,.95); box-shadow: 0 7px 18px rgba(15,23,42,.055); display: flex; flex-direction: column; align-items: center; justify-content: center; gap: 3px; text-align: center; }
                .auth-mini-box i { width: 27px; height: 27px; border-radius: 11px; display: inline-flex; align-items: center; justify-content: center; color: #fff; background: linear-gradient(135deg,#7f1d1d,#dc2626); font-size: 12px; box-shadow: 0 6px 14px rgba(127,29,29,.18); }
                .auth-mini-box b { font-size: 10.5px; font-weight: 950; color: #0f172a; line-height: 1; }
                .auth-mini-box span { font-size: 9px; color: #94a3b8; font-weight: 800; line-height: 1; }
                .auth-form-box { padding: 13px; border-radius: 22px; background: #ffffff; border: 1px solid rgba(226,232,240,.96); box-shadow: 0 10px 24px rgba(15,23,42,.06); }
                .auth-form-title { display: flex; align-items: center; gap: 8px; margin-bottom: 11px; color: #0f172a; font-size: 12px; font-weight: 950; }
                .auth-form-title i { color: #7f1d1d; }
                .form-area { display: flex; flex-direction: column; gap: 10px; }
                .inp-wrapper { position: relative; }
                .inp-modern { width: 100%; background: #f8fafc; border: 1.5px solid rgba(203,213,225,.82); border-radius: 16px; padding: 14px 15px 14px 47px; color: #0f172a; font-size: 13.5px; font-weight: 750; font-family: inherit; transition: border-color 0.2s, box-shadow 0.2s, background 0.2s; outline: none; box-sizing: border-box; box-shadow: inset 0 1px 0 rgba(255,255,255,.85); }
                .inp-modern::placeholder { color: #94a3b8; font-weight: 650; }
                .inp-modern:focus { background: #ffffff; border-color: rgba(153,27,27,.9); box-shadow: 0 8px 18px rgba(127,29,29,.09), 0 0 0 4px rgba(153,27,27,.10); }
                .inp-icon { position: absolute; left: 16px; top: 50%; transform: translateY(-50%); color: #94a3b8; font-size: 16px; transition: 0.2s; }
                .inp-modern:focus ~ .inp-icon { color: #7f1d1d; }
                .inp-eye { position: absolute; right: 15px; top: 50%; transform: translateY(-50%); color: #94a3b8; cursor: pointer; padding: 5px; }
                .inp-eye:hover { color: #7f1d1d; }
                .btn-modern-auth { background: linear-gradient(135deg, #991b1b, #7f1d1d 48%, #450a0a); width: 100%; padding: 15px; border: none; border-radius: 18px; color: white; font-weight: 950; font-size: 13.5px; cursor: pointer; box-shadow: 0 13px 25px rgba(127,29,29,.26); transition: transform 0.2s, box-shadow 0.2s; position: relative; overflow: hidden; letter-spacing: 0.42px; }
                .btn-modern-auth::before { content: ''; position: absolute; inset: 0; background: linear-gradient(120deg, transparent 0%, rgba(255,255,255,.30) 45%, transparent 65%); transform: translateX(-120%); transition: transform .55s ease; }
                .btn-modern-auth:hover::before { transform: translateX(120%); }
                .btn-modern-auth:active { transform: scale(0.985); box-shadow: 0 7px 15px rgba(127,29,29,.18); }
                .btn-modern-auth i { margin-left: 8px; }
                .auth-google-btn { width: 100%; padding: 13px 14px; border-radius: 18px; border: 1.5px solid rgba(203,213,225,.86); background: #fff; color: #334155; font-weight: 900; font-size: 12.5px; cursor: pointer; display: flex; align-items: center; justify-content: center; gap: 10px; transition: 0.2s; box-shadow: 0 8px 18px rgba(15,23,42,.055); }
                .auth-google-btn:active { transform: scale(.985); box-shadow: 0 4px 10px rgba(15,23,42,.08); }
                .auth-google-btn img { width: 18px; height: 18px; }
                .auth-switcher { text-align: center; font-size: 12.5px; color: #64748b; margin-top: 1px; font-weight: 750; }
                .link-accent { color: #7f1d1d; font-weight: 950; cursor: pointer; transition: 0.2s; text-decoration: none; }
                .link-accent:hover { text-decoration: underline; color: #991b1b; }
                .reset-link { text-align: right; margin-top: 9px; font-size: 11.5px; font-weight: 850; }
                .reset-link span { color: #64748b; cursor: pointer; }
                .reset-link span:hover { color: #7f1d1d; }
                body.dark-theme #authOverlay { background: radial-gradient(circle at 16% 12%, rgba(127,29,29,.26), transparent 27%), linear-gradient(145deg, #020617 0%, #0f172a 45%, #1e1b4b 100%); }
                body.dark-theme .auth-card, body.dark-theme .auth-brand-box, body.dark-theme .auth-form-box, body.dark-theme .auth-mini-box, body.dark-theme .auth-google-btn { background: rgba(15,23,42,.92); border-color: rgba(148,163,184,.18); color: #e5edf8; }
                body.dark-theme .auth-h1, body.dark-theme .auth-form-title, body.dark-theme .auth-mini-box b { color: #f8fafc; }
                body.dark-theme .auth-desc, body.dark-theme .auth-mini-box span, body.dark-theme .auth-switcher { color: #94a3b8; }
                body.dark-theme .inp-modern { background: #020617; border-color: rgba(148,163,184,.22); color: #f8fafc; }
                @media (max-width: 430px) {
                    #authOverlay { padding: 13px; align-items: center; }
                    .auth-card { padding: 14px; border-radius: 26px; max-width: 100%; gap: 10px; }
                    .auth-brand-box { padding: 14px 10px 12px; border-radius: 22px; }
                    .brand-logo-glow { width: 70px; height: 70px; margin-bottom: 8px; }
                    .auth-h1 { font-size: 24px; }
                    .auth-desc { font-size: 11.5px; }
                    .auth-mini-grid { gap: 7px; }
                    .auth-mini-box { min-height: 60px; border-radius: 16px; }
                    .auth-form-box { padding: 11px; border-radius: 20px; }
                }
        
                /* MODAL BROADCAST */
                #modalBroadcast { display: none; align-items: center; justify-content: center; z-index: 21000; background: rgba(0,0,0,0.7); backdrop-filter: blur(5px); }
                .bc-content { background: white; width: 85%; max-width: 350px; border-radius: 20px; overflow: hidden; animation: zoomIn 0.4s; position: relative; text-align: center; }
                .bc-img { width: 100%; height: auto; max-height: 300px; object-fit: contain; background: #000; display: none; }
                .bc-body { padding: 25px 20px 20px; }
                .bc-title { font-size: 18px; font-weight: 800; color: #333; margin-bottom: 10px; line-height: 1.3; }
                .bc-text { font-size: 13px; color: #555; line-height: 1.5; margin-bottom: 20px; }
                .bc-close-btn { position: absolute; top: 10px; right: 10px; background: rgba(0,0,0,0.5); color: white; width: 30px; height: 30px; border-radius: 50%; display: flex; align-items: center; justify-content: center; cursor: pointer; z-index: 10; font-size: 14px; }
        
        /* MODAL NOTICE CUSTOM */
                #modalNotice { align-items: center; justify-content: center; z-index: 20000; }
                .notice-content { background: white; width: 85%; max-width: 320px; padding: 30px; border-radius: 20px; text-align: center; box-shadow: 0 10px 30px rgba(0,0,0,0.2); animation: zoomIn 0.3s; box-sizing: border-box; }
                @keyframes zoomIn { from {transform: scale(0.8); opacity: 0;} to {transform: scale(1); opacity: 1;} }
                .notice-icon { font-size: 50px; margin-bottom: 15px; }
                .icon-success { color: var(--success); }
                .icon-error { color: var(--danger); }
                .icon-loading { color: var(--primary); }
                #mainAppContent { display: none; }
            /* DETAIL RIWAYAT MODERN (RECEIPT STYLE) */
                .receipt-header { text-align: center; margin-bottom: 18px; position: relative; padding: 18px 14px; border-radius: 22px; background: linear-gradient(180deg, #f8fbff 0%, #ffffff 100%); border: 1px solid rgba(15,23,42,0.06); }
                .receipt-icon { width: 62px; height: 62px; margin: 0 auto 13px; border-radius: 22px; display: flex; align-items: center; justify-content: center; font-size: 27px; color: white; box-shadow: 0 12px 24px rgba(0,0,0,0.16); transition: transform 0.3s; }
                .receipt-status { font-weight: 950; font-size: 17px; margin-bottom: 5px; text-transform: uppercase; letter-spacing: 0.7px; }
                .receipt-amount { font-size: 29px; font-weight: 950; color: var(--text-dark); margin: 6px 0 19px; letter-spacing: -1px; text-shadow: 0 2px 4px rgba(0,0,0,0.04); }
                .receipt-divider { border-top: 1.8px dashed #cbd5e1; margin: 20px -18px; position: relative; }
                .receipt-divider::before, .receipt-divider::after { content: ''; position: absolute; top: -10px; width: 20px; height: 20px; background: rgba(15,23,42,0.10); border-radius: 50%; box-shadow: inset 0 2px 4px rgba(0,0,0,0.08); }
                .receipt-divider::before { left: -10px; } .receipt-divider::after { right: -10px; }
                .detail-item { display: flex; justify-content: space-between; margin-bottom: 10px; font-size: 12.5px; color: #64748b; align-items: center; background: #f8fafc; padding: 10px 11px; border-radius: 13px; border: 1px solid rgba(15,23,42,0.045); gap: 10px; }
                .detail-val { font-weight: 850; color: #1e293b; text-align: right; max-width: 65%; word-break: break-word; line-height: 1.35; }
                .sn-container { background: #0f172a; padding: 14px; border-radius: 16px; margin-top: 11px; border: 1px solid #334155; display: flex; justify-content: space-between; align-items: center; gap:12px; box-shadow: inset 0 2px 7px rgba(0,0,0,0.25), 0 10px 22px rgba(15,23,42,0.10); }
                .sn-text { font-family: 'Courier New', monospace; font-size: 13px; color: #7f1d1d; word-break: break-all; font-weight:bold; letter-spacing: 0.5px; }
                .btn-copy { color: white; background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.2); width:38px; height:38px; border-radius:10px; font-size: 15px; cursor: pointer; display:flex; align-items:center; justify-content:center; transition:all 0.2s; }
                .btn-copy:active { transform:scale(0.9); background: var(--primary); border-color: var(--primary); }
                .modal-invoice { padding: 30px 20px 25px !important; border-radius: 30px 30px 0 0 !important; background: linear-gradient(180deg, #ffffff 0%, #f8fafc 100%); }
        
                /* MODAL TOPUP */
                .topup-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 6px; margin-top: 15px; }
                .topup-card { background: #f8fafc; border: 1px solid #edf2f7; border-radius: 8px; padding: 8px; text-align: center; cursor: pointer; transition: 0.2s; min-height: 75px; display:flex; flex-direction:column; align-items:center; justify-content:center; }
                .topup-card:active { transform: scale(0.95); }
                .topup-card.active { border-color: var(--primary); background: #e3f2fd; }
                .topup-card i { font-size: 24px; color: var(--primary); margin-bottom: 8px; display: block; }
                .topup-card span { font-size: 12px; font-weight: bold; color: #333; }
                .nominal-preset { display: flex; flex-wrap: wrap; gap: 8px; margin-bottom: 15px; }
                .preset-item { background: #eee; padding: 8px 12px; border-radius: 20px; font-size: 11px; font-weight: bold; cursor: pointer; }
                .preset-item:active { background: var(--primary); color: white; }
        
        /* BOTTOM NAV */
                /* BOTTOM NAV RAPIH & SLIM */
                .bottom-nav { position: fixed; bottom: 20px; left: 20px; right: 20px; width: auto; height: 65px; background: #ffffff; display: flex; justify-content: space-around; align-items: center; padding: 0 15px; box-shadow: 0 10px 40px rgba(0,0,0,0.08); z-index: 9999; border-radius: 25px; border: 1px solid #f1f5f9; }
                .nav-item { text-align: center; color: #b0bec5; font-size: 10px; flex: 1; display: flex; flex-direction: column; align-items: center; justify-content: center; height: 100%; cursor: pointer; transition: 0.2s; position: relative; }
                .nav-item.active { color: var(--primary); font-weight: 700; }
                .nav-item i { font-size: 18px; margin-bottom: 4px; display: block; transition: 0.2s; }
                .nav-item.active i { transform: translateY(-2px); }
                
                /* TOMBOL TENGAH MENGAMBANG (ABSOLUTE) */
                .nav-fab { background: linear-gradient(135deg, #7f1d1d, #b91c1c); color: white; width: 55px; height: 55px; border-radius: 50%; display: flex; align-items: center; justify-content: center; position: absolute; top: -25px; box-shadow: 0 10px 25px rgba(185,28,28, 0.4); border: 4px solid rgba(255,255,255,0.8); font-size: 22px; transition: 0.2s; }
                .nav-fab:active { transform: scale(0.95); }
                
                /* CART & SHOP UPDATES */
                .btn-see-more { width: 100%; padding: 12px; background: white; border: 1px solid var(--primary); color: var(--primary); font-weight: bold; border-radius: 12px; margin-top: 10px; cursor: pointer; display: block; text-align: center; font-size: 13px; }
                .cart-item { display: grid; grid-template-columns: 60px 1fr 30px; gap: 15px; align-items: center; background: white; padding: 15px; border-radius: 15px; margin-bottom: 10px; box-shadow: 0 2px 5px rgba(0,0,0,0.02); }
                .cart-img { width: 60px; height: 60px; border-radius: 10px; object-fit: cover; background: #eee; }
                .cart-desc { display: flex; flex-direction: column; gap: 4px; }
        /* PAGES (CART & PROFILE) */
                .full-page { display: none; padding-bottom: 90px; animation: fadeIn 0.3s; }
                .cart-item { background: white; padding: 15px; border-radius: 15px; margin-bottom: 10px; display: flex; justify-content: space-between; align-items: center; box-shadow: 0 2px 5px rgba(0,0,0,0.02); }
                .prof-header { background: var(--grad-main); padding: 40px 20px 60px; border-radius: 0 0 30px 30px; text-align: center; color: white; margin-bottom: -40px; }
                .prof-card { background: white; margin: 0 20px; padding: 20px; border-radius: 20px; box-shadow: 0 5px 20px rgba(0,0,0,0.05); position: relative; z-index: 2; }
                .prof-row { display: flex; justify-content: space-between; padding: 12px 0; border-bottom: 1px dashed #eee; font-size: 13px; }
                .prof-row:last-child { border-bottom: none; }
        
                body.dark-theme .prof-card { background: linear-gradient(180deg, rgba(15,23,42,0.96), rgba(17,24,39,0.94)) !important; border: 1px solid rgba(148,163,184,0.15) !important; box-shadow: 0 18px 40px rgba(0,0,0,0.35) !important; color: #e5edf8 !important; }
                body.dark-theme .prof-row { border-bottom-color: rgba(148,163,184,0.18) !important; color: #cbd5e1 !important; }
                body.dark-theme .prof-row span { color: #94a3b8 !important; }
                body.dark-theme .prof-row b { color: #f8fafc !important; }
                body.dark-theme .prof-row #pSaldo { color: #b91c1c !important; }
                body.dark-theme #pageProfil .btn-batal { background: rgba(239,68,68,0.12) !important; color: #fca5a5 !important; border: 1px solid rgba(239,68,68,0.25) !important; }
                body.dark-theme #pageProfil .btn-konfirmasi { color: #ffffff !important; }
                .cart-badge { position: absolute; top: -5px; right: 25%; background: var(--danger); color: white; font-size: 9px; padding: 2px 5px; border-radius: 10px; display:none; }
                /* SHOPPING STYLE SHOPEE-LIKE */
                .pdp-container { background: white; height: 100%; display: flex; flex-direction: column; overflow-y: auto; padding-bottom: 80px; }
                .pdp-image { width: 100%; height: 350px; object-fit: cover; border-bottom: 1px solid #eee; }
                .pdp-header { padding: 15px; background: white; margin-bottom: 10px; border-bottom: 1px solid #f0f0f0; }
                .pdp-price { font-size: 24px; color: var(--primary); font-weight: 800; margin: 5px 0; }
                .pdp-title { font-size: 16px; font-weight: 600; line-height: 1.4; color: #333; }
                .pdp-desc-box { padding: 15px; background: white; margin-bottom: 10px; }
                .pdp-label { font-weight: bold; font-size: 14px; margin-bottom: 8px; display: block; color: #555; }
                .pdp-desc-text { font-size: 13px; color: #666; line-height: 1.6; white-space: pre-wrap; }
                .pdp-footer { position: fixed; bottom: 0; left: 0; width: 100%; background: white; padding: 10px 15px; box-shadow: 0 -2px 10px rgba(0,0,0,0.05); display: flex; gap: 10px; z-index: 100; box-sizing: border-box; }
                .btn-cart-add { flex: 1; background: #e67e22; color: white; border: none; padding: 12px; border-radius: 8px; font-weight: bold; }
                .btn-buy-now { flex: 1; background: var(--primary); color: white; border: none; padding: 12px; border-radius: 8px; font-weight: bold; }
                
                .lapak-tabs { display: flex; background: white; border-bottom: 1px solid #eee; margin-top: -20px; border-radius: 20px 20px 0 0; position: relative; z-index: 10; }
                .lapak-tab { flex: 1; text-align: center; padding: 15px; font-size: 13px; font-weight: bold; color: #999; cursor: pointer; border-bottom: 3px solid transparent; }
                .lapak-tab.active { color: var(--primary); border-bottom-color: var(--primary); }
                .seller-order-card { background: white; padding: 15px; border-radius: 15px; margin-bottom: 15px; box-shadow: 0 2px 5px rgba(0,0,0,0.05); border: 1px solid #eee; }
                /* ORDER STATUS TABS */
                .order-tabs { display: flex; background: white; padding: 0 10px; border-bottom: 1px solid #eee; overflow-x: auto; }
                .order-tab { padding: 15px; font-size: 13px; color: #777; white-space: nowrap; cursor: pointer; border-bottom: 2px solid transparent; }
                .order-tab.active { color: var(--primary); border-bottom-color: var(--primary); font-weight: bold; }
                .order-card { background: white; padding: 15px; margin-bottom: 10px; border-bottom: 1px solid #eee; }
                .order-status { font-size: 11px; font-weight: bold; float: right; color: var(--primary); text-transform: uppercase; }
            
                /* STYLE PAGINASI & FILTER TANGGAL */
                .pagination-container { display: flex; justify-content: center; gap: 8px; margin-top: 15px; padding: 10px; }
                .page-num { width: 32px; height: 32px; display: flex; align-items: center; justify-content: center; background: #f0f0f0; border-radius: 8px; cursor: pointer; font-weight: bold; font-size: 12px; }
                .page-num.active { background: var(--primary); color: white; }
                .filter-date-box { display: flex; gap: 10px; align-items: center; margin-bottom: 15px; background: #f8fafc; padding: 10px; border-radius: 12px; border: 1px solid #eee; }
                .filter-date-box input { flex: 1; border: none; background: transparent; outline: none; font-size: 13px; font-weight: 600; color: #333; }
        
            /* CSS TABEL TAGIHAN RAPI */
            .bill-table { width: 100%; border-collapse: collapse; font-size: 0.9em; margin-bottom: 10px; color: #333; text-align: left; }
            .bill-table tr { border-bottom: 1px dashed #eee; }
            .bill-table td { padding: 8px 4px; vertical-align: top; }
            .bill-table .label { color: #666; width: 45%; font-weight: normal; font-size: 12px; }
            .bill-table .value { font-weight: 600; text-align: right; color: #000; word-break: break-word; font-size: 13px; }
            .bill-header { background: #fff1f2; color: #b91c1c; padding: 10px; border-radius: 8px; margin-bottom: 10px; text-align: center; font-weight: bold; font-size: 14px; border: 1px solid #cceeff; }
        
        
            /* STYLE TOPUP BARU (STEPPED) */
            .tu-cat { padding: 15px; border-radius: 15px; border: 1px solid #edf2f7; margin-bottom: 12px; display: flex; align-items: center; justify-content: space-between; cursor: pointer; transition: 0.2s; background: white; box-shadow: 0 4px 6px -4px rgba(0,0,0,0.05); }
            .tu-cat:active { transform: scale(0.98); background: #fff1f2; border-color: var(--primary); }
            .tu-icon { width: 45px; height: 45px; border-radius: 12px; background: linear-gradient(135deg, #e3f2fd, #bbdefb); color: var(--primary); display: flex; align-items: center; justify-content: center; font-size: 20px; margin-right: 15px; box-shadow: 0 4px 10px rgba(0,0,0,0.05); }
            .tu-method { display: flex; align-items: center; padding: 15px; border-bottom: 1px solid #f0f0f0; cursor: pointer; transition:0.2s; }
            .tu-method:last-child { border-bottom: none; }
            .tu-method:active { background: #f9f9f9; }
            .tu-invoice-box { background: #fff; border: 1px solid #e2e8f0; border-radius: 20px; padding: 25px 20px; text-align: center; box-shadow: 0 10px 25px -5px rgba(0,0,0,0.05); margin-bottom: 20px; animation: slideUp 0.3s; }
        
        .chat-fab { position: fixed; bottom: 90px; right: 15px; width: 40px; height: 40px; background: linear-gradient(135deg, #00b894, #00cec9); color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 15px rgba(0,184,148,0.4); z-index: 9998; cursor: pointer; transition: 0.2s; animation: popIn 0.3s; } .chat-fab:active { transform: scale(0.9); } .chat-box { flex: 1; overflow-y: auto; background: #f0f2f5; padding: 8px; border-radius: 12px; border: 1px solid #e1e4e8; display: flex; flex-direction: column; gap: 4px; margin-bottom: 8px; } .chat-bubble { max-width: 85%; padding: 4px 8px; border-radius: 8px; font-size: 9px; position: relative; word-wrap: break-word; line-height: 1.3; box-shadow: 0 1px 2px rgba(0,0,0,0.05); } .chat-bubble.me { align-self: flex-end; background: #d1e7dd; color: #0f5132; border-bottom-right-radius: 2px; } .chat-bubble.other { align-self: flex-start; background: white; color: #333; border-bottom-left-radius: 2px; } .chat-bubble.admin { align-self: flex-start; background: #fff3cd; color: #856404; border: 1px solid #ffeeba; } .chat-name { font-size: 8px; font-weight: bold; margin-bottom: 1px; color: #555; display:flex; align-items:center; gap:3px; } .chat-time { font-size: 7px; color: rgba(0,0,0,0.4); text-align: right; margin-top: 1px; } .chat-input-bar { display: flex; gap: 5px; align-items: center; background: white; padding: 5px; border-top: 1px solid #eee; } @keyframes popIn { from {transform: scale(0);} to {transform: scale(1);} }
        
        /* CHAT V2 STYLES (WHATSAPP STYLE) */
        .chat-input-bar { display: flex; gap: 8px; align-items: flex-end; background: white; padding: 8px 10px; border-top: 1px solid #eee; position: relative; z-index: 20; }
        .chat-textarea { resize: none; overflow-y: hidden; min-height: 40px; max-height: 120px; padding: 12px 15px; border-radius: 20px; background: #f0f2f5; border: 1px solid #e1e4e8; flex: 1; font-size: 13px; line-height: 1.4; font-family: inherit; transition: height 0.1s; outline: none; box-sizing: border-box; }
        .chat-textarea:focus { background: white; border-color: var(--primary); box-shadow: 0 0 0 2px rgba(185,28,28,0.1); }
        .btn-send-chat { width: 40px; height: 40px; border-radius: 50%; background: var(--primary); color: white; border: none; display: flex; align-items: center; justify-content: center; cursor: pointer; flex-shrink: 0; box-shadow: 0 2px 8px rgba(185,28,28,0.3); transition: 0.2s; margin-bottom: 2px; }
        .btn-send-chat:active { transform: scale(0.9); }
        .chat-reply-bar { background: #f0f4f8; padding: 8px 12px; border-left: 4px solid var(--primary); display: flex; justify-content: space-between; align-items: center; font-size: 11px; border-top: 1px solid #eee; width: 100%; box-sizing: border-box; animation: slideUp 0.2s; }
        .reply-content { flex: 1; overflow: hidden; margin-right: 10px; }
        .reply-name { font-weight: bold; color: var(--primary); margin-bottom: 2px; font-size: 10px; }
        .reply-text { color: #666; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; font-size: 10px; }
        .quoted-msg { background: rgba(0,0,0,0.04); border-left: 3px solid #ccc; padding: 6px 8px; border-radius: 4px; margin-bottom: 6px; font-size: 10px; display: block; text-decoration: none; color: inherit; position: relative; }
        .chat-bubble.me .quoted-msg { background: rgba(0,0,0,0.1); border-left-color: #0f5132; }
        .reply-btn { margin-left: 8px; color: #95a5a6; cursor: pointer; font-size: 12px; transition: 0.2s; padding: 4px; }
        .reply-btn:hover { color: var(--primary); background: #e1effe; border-radius: 50%; }
        .chat-name-row { display: flex; justify-content: space-between; align-items: center; margin-bottom: 2px; }
        
        
        
        
        
        
            /* PATCH DONI: Halaman Buku Rekap / Buku Warung */
            .buku-page { min-height: 100vh; background: #f6f8fb; padding-bottom: 95px; }
            .buku-header { background: linear-gradient(135deg, #0f172a, #7f1d1d); color: #fff; padding: 26px 20px 60px; border-radius: 0 0 30px 30px; position: relative; overflow: hidden; }
            .buku-header::after { content:''; position:absolute; width:160px; height:160px; right:-70px; top:-70px; border-radius:50%; background:rgba(255,255,255,.14); }
            .buku-title { display:flex; align-items:center; justify-content:space-between; gap:12px; position:relative; z-index:2; }
            .buku-title-main { font-size:20px; font-weight:950; letter-spacing:-.4px; }
            .buku-title-sub { font-size:11px; opacity:.78; margin-top:3px; font-weight:700; }
            .buku-refresh-btn { width:38px; height:38px; border-radius:14px; border:0; color:#fff; background:rgba(255,255,255,.16); display:flex; align-items:center; justify-content:center; box-shadow:inset 0 0 0 1px rgba(255,255,255,.16); }
            .buku-summary { margin:-42px 15px 14px; position:relative; z-index:3; display:grid; grid-template-columns:repeat(2,1fr); gap:9px; }
            .buku-card { background:#fff; border-radius:20px; padding:13px; border:1px solid rgba(15,23,42,.06); box-shadow:0 10px 24px rgba(15,23,42,.06); }
            .buku-card.full { grid-column:1/-1; display:flex; align-items:center; justify-content:space-between; gap:12px; background:linear-gradient(135deg,#fff,#fef2f2); }
            .buku-label { font-size:10px; color:#64748b; font-weight:900; text-transform:uppercase; letter-spacing:.25px; margin-bottom:4px; }
            .buku-value { font-size:16px; color:#0f172a; font-weight:950; letter-spacing:-.35px; }
            .buku-value.big { font-size:22px; color:#7f1d1d; }
            .buku-pill { display:inline-flex; align-items:center; gap:5px; border-radius:999px; padding:5px 8px; font-size:9.5px; font-weight:900; background:#fef2f2; color:#7f1d1d; }
            .buku-actions { display:grid; grid-template-columns:1fr 1fr; gap:9px; padding:0 15px 12px; }
            .buku-action-btn { border:0; border-radius:17px; padding:12px 10px; color:#fff; font-size:12px; font-weight:950; box-shadow:0 8px 18px rgba(15,23,42,.10); }
            .buku-action-btn.in { background:linear-gradient(135deg,#b91c1c,#dc2626); }
            .buku-action-btn.out { background:linear-gradient(135deg,#ef4444,#f97316); }
            .buku-filter { display:flex; gap:7px; overflow-x:auto; padding:0 15px 12px; scrollbar-width:none; }
            .buku-filter::-webkit-scrollbar { display:none; }
            .buku-filter button { border:1px solid #e2e8f0; background:#fff; color:#64748b; border-radius:999px; padding:8px 12px; font-size:10.5px; font-weight:900; white-space:nowrap; }
            .buku-filter button.active { background:#0f172a; border-color:#0f172a; color:#fff; }
            .buku-list { padding:0 15px 20px; }
            .buku-item { background:#fff; border:1px solid rgba(15,23,42,.06); box-shadow:0 7px 16px rgba(15,23,42,.04); border-radius:18px; padding:12px; display:flex; align-items:center; gap:10px; margin-bottom:9px; }
            .buku-item-icon { width:40px; height:40px; border-radius:15px; display:flex; align-items:center; justify-content:center; color:#fff; flex-shrink:0; }
            .buku-item-icon.in { background:linear-gradient(135deg,#b91c1c,#dc2626); }
            .buku-item-icon.out { background:linear-gradient(135deg,#ef4444,#f97316); }
            .buku-item-main { flex:1; min-width:0; }
            .buku-item-title { font-size:12px; font-weight:950; color:#0f172a; white-space:nowrap; overflow:hidden; text-overflow:ellipsis; }
            .buku-item-meta { font-size:9.5px; color:#94a3b8; font-weight:800; margin-top:3px; }
            .buku-item-amount { font-size:12.5px; font-weight:950; text-align:right; }
            .buku-item-amount.in { color:#b91c1c; }
            .buku-item-amount.out { color:#ef4444; }
            .buku-empty { text-align:center; color:#94a3b8; padding:35px 20px; background:#fff; border:1px dashed #cbd5e1; border-radius:20px; font-size:12px; font-weight:800; }
            body.dark-theme .buku-page { background:#020617; }
            body.dark-theme .buku-card, body.dark-theme .buku-item, body.dark-theme .buku-filter button, body.dark-theme .buku-empty { background:#0f172a; border-color:rgba(148,163,184,.14); }
            body.dark-theme .buku-label, body.dark-theme .buku-item-meta { color:#94a3b8; }
            body.dark-theme .buku-value, body.dark-theme .buku-item-title { color:#f8fafc; }
        
        
        
        
            /* PATCH DONI: Navigasi Tanggal & Rekap Bulanan Buku */
            .buku-date-box { margin:0 15px 12px; background:#fff; border:1px solid rgba(15,23,42,.07); box-shadow:0 8px 20px rgba(15,23,42,.05); border-radius:20px; padding:11px; }
            .buku-date-title { display:flex; align-items:center; justify-content:space-between; gap:8px; margin-bottom:9px; }
            .buku-date-title strong { font-size:12px; color:#0f172a; font-weight:950; }
            .buku-date-title span { font-size:10px; color:#64748b; font-weight:850; }
            .buku-date-controls { display:grid; grid-template-columns:38px 1fr 38px; gap:7px; align-items:center; }
            .buku-date-btn, .buku-today-btn, .buku-month-btn, .buku-pdf-btn { border:0; border-radius:14px; font-size:11px; font-weight:950; min-height:38px; }
            .buku-date-btn { background:#fef2f2; color:#7f1d1d; }
            .buku-date-input { width:100%; border:1px solid #e2e8f0; background:#f8fafc; border-radius:14px; padding:10px 9px; font-size:12px; font-weight:900; color:#0f172a; text-align:center; outline:none; }
            .buku-today-btn { width:100%; margin-top:8px; background:#0f172a; color:#fff; }
            .buku-action-btn.rekap { grid-column:1/-1; background:linear-gradient(135deg,#7c3aed,#7f1d1d); }
            .buku-rekap-table-wrap { overflow:auto; border-radius:16px; border:1px solid #e2e8f0; background:#fff; }
            .buku-rekap-table { width:100%; border-collapse:collapse; min-width:430px; }
            .buku-rekap-table th, .buku-rekap-table td { padding:10px 9px; border-bottom:1px solid #e2e8f0; font-size:11px; text-align:left; white-space:nowrap; }
            .buku-rekap-table th { background:#f8fafc; color:#475569; font-weight:950; text-transform:uppercase; font-size:9.5px; }
            .buku-rekap-table td { color:#0f172a; font-weight:850; }
            .buku-rekap-total-row td { background:#fef2f2; font-weight:950; color:#7f1d1d; }
            .buku-rekap-profit-row td { background:#dcfce7; font-weight:950; color:#15803d; font-size:12px; }
            .buku-month-nav { display:grid; grid-template-columns:42px 1fr 42px; gap:8px; align-items:center; margin-bottom:10px; }
            .buku-month-label { background:#f8fafc; border:1px solid #e2e8f0; border-radius:14px; padding:11px 8px; text-align:center; font-size:12px; font-weight:950; color:#0f172a; }
            .buku-month-btn { background:#fef2f2; color:#7f1d1d; }
            .buku-pdf-btn { width:100%; margin-top:11px; color:#fff; background:linear-gradient(135deg,#ef4444,#f97316); box-shadow:0 10px 20px rgba(239,68,68,.16); }
            body.dark-theme .buku-date-box, body.dark-theme .buku-rekap-table-wrap { background:#0f172a; border-color:rgba(148,163,184,.14); }
            body.dark-theme .buku-date-title strong, body.dark-theme .buku-date-input, body.dark-theme .buku-month-label, body.dark-theme .buku-rekap-table td { color:#f8fafc; }
            body.dark-theme .buku-date-title span { color:#94a3b8; }
            body.dark-theme .buku-date-input, body.dark-theme .buku-month-label, body.dark-theme .buku-rekap-table th { background:#020617; border-color:rgba(148,163,184,.18); }
            body.dark-theme .buku-rekap-table th { color:#cbd5e1; }
        
            /* PATCH DONI: Modal Form Buku Manual */
            .buku-modal-overlay { position:fixed; inset:0; background:rgba(15,23,42,.58); backdrop-filter:blur(8px); z-index:99999; display:none; align-items:flex-end; justify-content:center; padding:14px; }
            .buku-modal-overlay.show { display:flex; }
            .buku-modal-card { width:100%; max-width:430px; background:#fff; border-radius:28px 28px 22px 22px; box-shadow:0 -18px 45px rgba(15,23,42,.25); overflow:hidden; animation:bukuModalUp .22s ease-out; border:1px solid rgba(255,255,255,.45); }
            @keyframes bukuModalUp { from { transform:translateY(35px); opacity:0; } to { transform:translateY(0); opacity:1; } }
            .buku-modal-head { padding:18px 18px 15px; color:#fff; display:flex; align-items:center; justify-content:space-between; gap:12px; background:linear-gradient(135deg,#0f172a,#7f1d1d); }
            .buku-modal-head.in { background:linear-gradient(135deg,#15803d,#dc2626); }
            .buku-modal-head.out { background:linear-gradient(135deg,#dc2626,#f97316); }
            .buku-modal-title { font-size:16px; font-weight:950; letter-spacing:-.25px; }
            .buku-modal-sub { font-size:10.5px; opacity:.82; font-weight:750; margin-top:2px; }
            .buku-modal-close { border:0; width:34px; height:34px; border-radius:13px; background:rgba(255,255,255,.18); color:#fff; font-size:16px; display:flex; align-items:center; justify-content:center; }
            .buku-modal-body { padding:15px; display:grid; gap:10px; }
            .buku-form-row { display:grid; gap:5px; }
            .buku-form-row label { font-size:11px; font-weight:950; color:#334155; padding-left:2px; }
            .buku-form-control { width:100%; border:1px solid #e2e8f0; background:#f8fafc; border-radius:16px; padding:12px 13px; font-size:13px; font-weight:800; color:#0f172a; outline:none; transition:.18s; }
            .buku-form-control:focus { background:#fff; border-color:#7f1d1d; box-shadow:0 0 0 4px rgba(127,29,29,.10); }
            textarea.buku-form-control { min-height:78px; resize:none; line-height:1.35; }
            .buku-modal-actions { display:grid; grid-template-columns:1fr 1.3fr; gap:9px; padding:0 15px 16px; }
            .buku-modal-btn { border:0; border-radius:16px; padding:12px 10px; font-size:12px; font-weight:950; }
            .buku-modal-btn.cancel { background:#f1f5f9; color:#64748b; }
            .buku-modal-btn.save { color:#fff; background:linear-gradient(135deg,#0f172a,#7f1d1d); box-shadow:0 10px 20px rgba(127,29,29,.18); }
            .buku-modal-btn.save.in { background:linear-gradient(135deg,#b91c1c,#dc2626); }
            .buku-modal-btn.save.out { background:linear-gradient(135deg,#ef4444,#f97316); }
            body.dark-theme .buku-modal-card { background:#0f172a; border-color:rgba(148,163,184,.18); }
            body.dark-theme .buku-form-row label { color:#e2e8f0; }
            body.dark-theme .buku-form-control { background:#020617; border-color:rgba(148,163,184,.22); color:#f8fafc; }
            body.dark-theme .buku-modal-btn.cancel { background:#1e293b; color:#cbd5e1; }
        
        
            /* FULLSCREEN QRIS CSS */
            .qris-overlay { display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.9); z-index: 30000; align-items: center; justify-content: center; flex-direction: column; }
            .qris-overlay img { max-width: 90%; max-height: 80%; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.5); }
            .qris-close { position: absolute; top: 20px; right: 20px; color: white; font-size: 30px; cursor: pointer; width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; background: rgba(255,255,255,0.2); border-radius: 50%; transition: 0.2s; }
            .qris-close:active { transform: scale(0.9); background: rgba(255,255,255,0.4); }
        
        
            /* CSS MODAL FULLSCREEN & AKRAB UI */
            .modal-fullscreen { align-items: flex-start !important; }
            .modal-fullscreen .modal-content { height: 100vh !important; max-height: 100vh !important; border-radius: 0 !important; padding: 0 !important; }
            .modal-fullscreen .modal-content::before { display: none !important; }
            .akrab-header { background: linear-gradient(135deg, #450a0a, #7f1d1d); color: white; padding: 18px 15px; display: flex; align-items: center; gap: 15px; position: sticky; top: 0; z-index: 10; }
            .akrab-search-container { padding: 12px 15px; background: #fff; border-bottom: 1px solid #f1f5f9; }
            .akrab-search-input { width: 100%; padding: 12px 15px; border: 1px solid #e2e8f0; border-radius: 10px; font-size: 14px; outline: none; background: #f8fafc; }
            .akrab-grid { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 10px; padding: 15px; background: #fff; }
            .akrab-btn { background: linear-gradient(180deg,#ffffff,#fff7f7); border: 1px solid rgba(127,29,29,.10); border-radius: 16px; padding: 8px; text-align: left; font-size: 9.2px; font-weight: 900; color: #0f172a; cursor: pointer; transition: 0.22s ease; display: grid; grid-template-columns: 30px minmax(0,1fr) 14px; align-items: center; gap: 6px; min-height: 54px; position: relative; overflow: hidden; box-shadow: 0 7px 16px rgba(15,23,42,.055); }
            .akrab-btn::after { content:''; position:absolute; right:-28px; top:-34px; width:68px; height:68px; border-radius:22px; background:rgba(127,29,29,.055); transform:rotate(18deg); pointer-events:none; }
            .akrab-btn.po-card { border-style: dashed; background: linear-gradient(180deg,#fff7ed,#fff1f2); }
            .akrab-btn.active { background: linear-gradient(135deg,#7f1d1d,#991b1b); border-color: #7f1d1d; color: #fff; box-shadow:0 10px 22px rgba(127,29,29,.22); }
            .akrab-chip-icon { width:30px; height:30px; border-radius:12px; display:inline-flex; align-items:center; justify-content:center; background:#fff; color:#7f1d1d; box-shadow:inset 0 0 0 1px rgba(127,29,29,.08), 0 5px 12px rgba(127,29,29,.08); position:relative; z-index:2; font-size:10px; }
            .akrab-chip-text { min-width:0; display:flex; flex-direction:column; gap:1px; position:relative; z-index:2; }
            .akrab-chip-text b { overflow:hidden; display:-webkit-box; -webkit-line-clamp:2; -webkit-box-orient:vertical; white-space:normal; font-size:9.4px; font-weight:1000; line-height:1.08; color:inherit; }
            .akrab-chip-text small { font-size:7.4px; font-weight:900; color:#94a3b8; letter-spacing:.1px; line-height:1.1; }
            .akrab-chip-go { color:#cbd5e1; font-size:8px; position:relative; z-index:2; }
            .akrab-btn.active .akrab-chip-icon { background:rgba(255,255,255,.18); color:#fff; box-shadow:inset 0 0 0 1px rgba(255,255,255,.25); }
            .akrab-btn.active .akrab-chip-text b { color:#fff; }
            .akrab-btn.active .akrab-chip-text small, .akrab-btn.active .akrab-chip-go { color:rgba(255,255,255,.78); }
            .akrab-section-title { padding: 0 15px; font-size: 11px; font-weight: 950; color: #94a3b8; text-transform: uppercase; margin-top: 10px; letter-spacing:.4px; }
            .akrab-mode-header { display:flex; align-items:center; justify-content:space-between; gap:9px; padding:0 15px; margin-top:10px; }
            .akrab-mode-header .akrab-section-title { padding:0; margin-top:0; flex:1; color:#0f172a; }
            .akrab-mode-tabs { display:flex; align-items:center; gap:5px; background:#fff; padding:4px; border-radius:18px; border:1px solid rgba(226,232,240,.95); box-shadow:0 7px 16px rgba(15,23,42,.05); }
            .akrab-mode-tab { border:0; outline:none; cursor:pointer; padding:7px 8px; border-radius:13px; font-size:8.6px; font-weight:950; color:#64748b; background:transparent; white-space:nowrap; transition:all .2s ease; display:inline-flex; align-items:center; gap:4px; }
            .akrab-mode-tab.active { color:#fff; background:linear-gradient(135deg,#7f1d1d,#991b1b); box-shadow:0 6px 14px rgba(127,29,29,.24); }
            .akrab-mode-tab.po-tab.active { background:linear-gradient(135deg,#f97316,#dc2626); box-shadow:0 6px 14px rgba(239,68,68,.24); }
            body.dark-theme .akrab-grid { background:#0f172a; }
            body.dark-theme .akrab-btn { background:linear-gradient(180deg,rgba(15,23,42,.92),rgba(30,41,59,.86)); border-color:rgba(148,163,184,.16); color:#e5edf8; }
            body.dark-theme .akrab-btn.po-card { background:linear-gradient(180deg,rgba(67,20,7,.52),rgba(69,10,10,.38)); }
            body.dark-theme .akrab-chip-icon { background:rgba(2,6,23,.72); color:#fecaca; box-shadow:inset 0 0 0 1px rgba(148,163,184,.18); }
            body.dark-theme .akrab-chip-text small { color:#94a3b8; }
            body.dark-theme .akrab-mode-tabs { background:rgba(15,23,42,.86); border-color:rgba(148,163,184,.16); }
            body.dark-theme .akrab-mode-tab { color:#cbd5e1; }
            body.dark-theme .akrab-mode-tab.active { color:#fff; }
        
            
        
        /* PATCH DONI: Running Text di atas menu utama - versi ringan anti lag */
        .running-text-wrap {
            margin: -2px 16px 10px;
            border-radius: 15px;
            overflow: hidden;
            display: none;
            position: relative;
            box-shadow: 0 5px 14px rgba(15, 23, 42, 0.09);
            border: 1px solid rgba(148, 163, 184, .25);
            z-index: 2;
            contain: layout paint;
        }
        .running-text-wrap.rt-show { display: block; }
        .running-text-box {
            --rt-speed: 14s;
            --rt-delay: 1s;
            --rt-color: #ffffff;
            --rt-bg: #0f172a;
            --rt-dot-off: rgba(203, 213, 225, .15);
            --rt-dot-off-soft: rgba(148, 163, 184, .09);
            background:
                linear-gradient(180deg, rgba(255,255,255,.04), rgba(2,6,23,.10)),
                var(--rt-bg);
            color: var(--rt-color);
            min-height: 44px;
            padding: 0;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
            transform: translateZ(0);
            box-shadow: inset 0 1px 0 rgba(255,255,255,.04), inset 0 -8px 18px rgba(2,6,23,.18);
        }
        .running-text-box::before {
            content: "";
            position: absolute;
            inset: 0;
            pointer-events: none;
            background-image:
                radial-gradient(circle at center, var(--rt-dot-off) 0 1.05px, transparent 1.45px),
                radial-gradient(circle at center, var(--rt-dot-off-soft) 0 .65px, transparent .95px);
            background-size: 10px 10px, 20px 20px;
            background-position: 0 0, 5px 5px;
            opacity: .95;
        }
        .running-text-box.rt-one-line,
        .running-text-box.rt-two-lines { padding: 0; }
        .running-text-box.rt-transparent {
            background: transparent !important;
            box-shadow: none;
        }
        .running-text-box.rt-transparent::before { opacity: .28; }
        .running-text-lane {
            width: 100%;
            overflow: hidden;
            position: relative;
            z-index: 1;
        }
        .running-text-content {
            color: var(--rt-color);
            display: inline-flex;
            flex-direction: column;
            gap: 3px;
            white-space: nowrap;
            font-size: 12px;
            font-weight: 900;
            letter-spacing: normal;
            text-shadow: 0 2px 9px rgba(0,0,0,.35);
            padding-left: 100%;
            will-change: transform, opacity, filter;
            transform: translateX(0);
            backface-visibility: hidden;
            animation: rt-marquee-left var(--rt-speed) linear infinite;
            animation-delay: var(--rt-delay);
        }
        .running-text-line {
            display: block;
            font-size: inherit;
            line-height: 1.2;
            font-weight: inherit;
        }
        .running-text-box.rt-two-lines .running-text-line { font-size: inherit; line-height: 1.2; }
        .running-text-box.rt-led .running-text-content,
        .running-text-box.rt-rgb .running-text-content {
            font-family: 'Courier New', monospace;
            letter-spacing: 3px;
            text-transform: uppercase;
            text-shadow: none;
        }
        .running-text-box.rt-led .running-text-line,
        .running-text-box.rt-rgb .running-text-line {
            color: transparent !important;
            -webkit-text-fill-color: transparent;
            background-image: radial-gradient(circle, var(--rt-color) 0 48%, rgba(255,255,255,0) 58%);
            background-size: 8px 8px;
            background-position: center center;
            -webkit-background-clip: text;
            background-clip: text;
            filter: drop-shadow(0 0 4px var(--rt-color)) drop-shadow(0 0 10px var(--rt-color));
        }
        .running-text-box.rt-rainbow:not(.rt-led):not(.rt-rgb) .running-text-content {
            background: linear-gradient(90deg, #ef4444, #f59e0b, #dc2626, #9f1239, #991b1b, #a855f7, #ec4899, #ef4444);
            background-size: 350% 100%;
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent !important;
            animation: rt-marquee-left var(--rt-speed) linear infinite, rt-rainbow-shift 3s linear infinite;
            animation-delay: var(--rt-delay), 0s;
        }
        .running-text-box.rt-rainbow.rt-led .running-text-line,
        .running-text-box.rt-rainbow.rt-rgb .running-text-line {
            background-image:
                linear-gradient(90deg, #ef4444, #f59e0b, #dc2626, #9f1239, #991b1b, #a855f7, #ec4899, #ef4444),
                radial-gradient(circle, rgba(255,255,255,.98) 0 48%, rgba(255,255,255,0) 58%);
            background-size: 350% 100%, 8px 8px;
            background-position: 0% 50%, center center;
            background-blend-mode: screen;
            animation: rt-rainbow-line-shift 3s linear infinite;
        }
        .running-text-box.rt-anim-left .running-text-content { animation-name: rt-marquee-left; }
        .running-text-box.rt-anim-right .running-text-content { padding-left: 0; padding-right: 100%; animation-name: rt-marquee-right; }
        .running-text-box.rt-anim-bounce .running-text-content { padding-left: 0; min-width: 100%; animation-name: rt-bounce; animation-timing-function: ease-in-out; }
        .running-text-box.rt-anim-blink .running-text-content { padding-left: 0; width: 100%; text-align: center; animation-name: rt-blink; animation-timing-function: steps(2, end); }
        .running-text-box.rt-anim-wave .running-text-content { animation: rt-marquee-left var(--rt-speed) linear infinite, rt-wave 1.5s ease-in-out infinite; animation-delay: var(--rt-delay), 0s; }
        .running-text-box.rt-anim-bus .running-text-content { animation-name: rt-bus-indonesia; animation-timing-function: cubic-bezier(.28,.02,.08,1); }
        .running-text-box.rt-anim-neon .running-text-content { animation: rt-marquee-left var(--rt-speed) linear infinite, rt-neon 1.2s ease-in-out infinite; animation-delay: var(--rt-delay), 0s; }
        .running-text-box.rt-anim-fade .running-text-content { padding-left: 0; width: 100%; text-align: center; animation-name: rt-fade-center; animation-timing-function: ease-in-out; }
        .running-text-box.rt-rainbow:not(.rt-led):not(.rt-rgb).rt-anim-left .running-text-content {
            background: linear-gradient(90deg, #ef4444, #f59e0b, #dc2626, #9f1239, #991b1b, #a855f7, #ec4899, #ef4444);
            background-size: 350% 100%;
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent !important;
            animation: rt-marquee-left var(--rt-speed) linear infinite, rt-rainbow-shift 3s linear infinite !important;
            animation-delay: var(--rt-delay), 0s !important;
        }
        .running-text-box.rt-rainbow:not(.rt-led):not(.rt-rgb).rt-anim-right .running-text-content {
            padding-left: 0;
            padding-right: 100%;
            background: linear-gradient(90deg, #ef4444, #f59e0b, #dc2626, #9f1239, #991b1b, #a855f7, #ec4899, #ef4444);
            background-size: 350% 100%;
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent !important;
            animation: rt-marquee-right var(--rt-speed) linear infinite, rt-rainbow-shift 3s linear infinite !important;
            animation-delay: var(--rt-delay), 0s !important;
        }
        .running-text-box.rt-rainbow:not(.rt-led):not(.rt-rgb).rt-anim-wave .running-text-content {
            background: linear-gradient(90deg, #ef4444, #f59e0b, #dc2626, #9f1239, #991b1b, #a855f7, #ec4899, #ef4444);
            background-size: 350% 100%;
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent !important;
            animation: rt-marquee-left var(--rt-speed) linear infinite, rt-rainbow-shift 3s linear infinite, rt-wave 1.5s ease-in-out infinite !important;
            animation-delay: var(--rt-delay), 0s, 0s !important;
        }
        .running-text-box.rt-rainbow:not(.rt-led):not(.rt-rgb).rt-anim-bus .running-text-content {
            background: linear-gradient(90deg, #ef4444, #f59e0b, #dc2626, #9f1239, #991b1b, #a855f7, #ec4899, #ef4444);
            background-size: 350% 100%;
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent !important;
            animation: rt-bus-indonesia var(--rt-speed) cubic-bezier(.28,.02,.08,1) infinite, rt-rainbow-shift 3s linear infinite !important;
            animation-delay: var(--rt-delay), 0s !important;
        }
        .running-text-box.rt-rainbow:not(.rt-led):not(.rt-rgb).rt-anim-neon .running-text-content {
            background: linear-gradient(90deg, #ef4444, #f59e0b, #dc2626, #9f1239, #991b1b, #a855f7, #ec4899, #ef4444);
            background-size: 350% 100%;
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent !important;
            animation: rt-marquee-left var(--rt-speed) linear infinite, rt-rainbow-shift 3s linear infinite, rt-neon 1.2s ease-in-out infinite !important;
            animation-delay: var(--rt-delay), 0s, 0s !important;
        }
        .running-text-box.rt-rainbow:not(.rt-led):not(.rt-rgb).rt-anim-bounce .running-text-content {
            padding-left: 0;
            min-width: 100%;
            background: linear-gradient(90deg, #ef4444, #f59e0b, #dc2626, #9f1239, #991b1b, #a855f7, #ec4899, #ef4444);
            background-size: 350% 100%;
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent !important;
            animation: rt-bounce var(--rt-speed) ease-in-out infinite, rt-rainbow-shift 3s linear infinite !important;
            animation-delay: var(--rt-delay), 0s !important;
        }
        .running-text-box.rt-rainbow:not(.rt-led):not(.rt-rgb).rt-anim-blink .running-text-content {
            padding-left: 0;
            width: 100%;
            text-align: center;
            background: linear-gradient(90deg, #ef4444, #f59e0b, #dc2626, #9f1239, #991b1b, #a855f7, #ec4899, #ef4444);
            background-size: 350% 100%;
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent !important;
            animation: rt-blink var(--rt-speed) steps(2, end) infinite, rt-rainbow-shift 3s linear infinite !important;
            animation-delay: var(--rt-delay), 0s !important;
        }
        .running-text-box.rt-rainbow:not(.rt-led):not(.rt-rgb).rt-anim-fade .running-text-content {
            padding-left: 0;
            width: 100%;
            text-align: center;
            background: linear-gradient(90deg, #ef4444, #f59e0b, #dc2626, #9f1239, #991b1b, #a855f7, #ec4899, #ef4444);
            background-size: 350% 100%;
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent !important;
            animation: rt-fade-center var(--rt-speed) ease-in-out infinite, rt-rainbow-shift 3s linear infinite !important;
            animation-delay: var(--rt-delay), 0s !important;
        }
        @keyframes rt-marquee-left { 0% { transform: translateX(0); } 100% { transform: translateX(-120%); } }
        @keyframes rt-marquee-right { 0% { transform: translateX(-100%); } 100% { transform: translateX(120%); } }
        @keyframes rt-bounce { 0%,100% { transform: translateX(6%); } 50% { transform: translateX(-6%); } }
        @keyframes rt-blink { 0%,45% { opacity:1; } 46%,70% { opacity:.16; } 71%,100% { opacity:1; } }
        @keyframes rt-wave { 0%,100% { filter:hue-rotate(0deg) brightness(1); } 50% { filter:hue-rotate(80deg) brightness(1.25); } }
        @keyframes rt-bus-indonesia { 0% { transform:translateX(0) skewX(-8deg) scale(1); } 8% { transform:translateX(-8%) skewX(8deg) scale(1.03); } 18% { transform:translateX(-20%) skewX(-5deg) scale(.98); } 100% { transform:translateX(-130%) skewX(-8deg) scale(1); } }
        @keyframes rt-neon { 0%,100% { text-shadow:0 0 4px currentColor, 0 0 10px currentColor; } 50% { text-shadow:0 0 8px currentColor, 0 0 18px currentColor, 0 0 28px currentColor; } }
        @keyframes rt-fade-center { 0%,100% { opacity:0; transform:scale(.96); } 18%,82% { opacity:1; transform:scale(1); } }
        @keyframes rt-rainbow-shift { 0% { background-position:0% 50%; } 100% { background-position:350% 50%; } }
        @keyframes rt-rainbow-line-shift { 0% { background-position:0% 50%, center center; } 100% { background-position:350% 50%, center center; } }
        body.dark-theme .running-text-wrap { box-shadow: 0 5px 14px rgba(0,0,0,.28); border-color: rgba(148,163,184,.16); }
        @media (max-width: 480px) {
            .running-text-wrap { margin: -2px 12px 8px; border-radius: 15px; }
            .running-text-content { font-size: 12px; }
            .running-text-line,
            .running-text-box.rt-two-lines .running-text-line { font-size: inherit; line-height: 1.2; }
        }
        /* PATCH DONI: Mode Akrab dari ppob/ppobseting.json untuk index */
        body.ppob-akrab-mode #mainPpobMenuGrid,
        body.ppob-akrab-mode #menuDrawer,
        body.ppob-akrab-mode #btnMoreContainer {
            display: none !important;
        }
        
        body.ppob-akrab-mode #menuAkrabAll {
            display: block !important;
        }
        
        body.ppob-akrab-mode #menuAkrabAll .inline-akrab-toggle {
            cursor: default;
        }
        
        body.ppob-akrab-mode #menuAkrabAll .inline-akrab-text span,
        body.ppob-akrab-mode #menuAkrabAll .inline-akrab-arrow {
            display: none !important;
        }
        
        body.ppob-akrab-mode #menuAkrabAll .inline-akrab-panel {
            display: block !important;
        }
        
        
        
        
        
        /* PATCH DONI: Custom modal pengganti alert/confirm/prompt bawaan browser */
        .doni-native-dialog-mask {
            position: fixed;
            inset: 0;
            z-index: 999999;
            display: none;
            align-items: center;
            justify-content: center;
            padding: 18px;
            background: rgba(0,0,0,.48);
            backdrop-filter: blur(4px);
            -webkit-backdrop-filter: blur(4px);
        }
        .doni-native-dialog-mask.show { display: flex; }
        .doni-native-dialog-box {
            width: min(420px, 100%);
            background: #fff;
            border-radius: 24px;
            box-shadow: 0 24px 70px rgba(0,0,0,.30);
            overflow: hidden;
            animation: doniDialogPop .18s ease-out;
            font-family: inherit;
        }
        @keyframes doniDialogPop {
            from { transform: translateY(14px) scale(.96); opacity: 0; }
            to { transform: translateY(0) scale(1); opacity: 1; }
        }
        .doni-native-dialog-head {
            display: flex;
            gap: 12px;
            align-items: center;
            padding: 22px 22px 8px;
        }
        .doni-native-dialog-icon {
            width: 42px;
            height: 42px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #7f1010, #d71920);
            color: #fff;
            font-size: 18px;
            flex: 0 0 auto;
        }
        .doni-native-dialog-title {
            font-size: 20px;
            font-weight: 900;
            color: #1f2937;
            line-height: 1.2;
        }
        .doni-native-dialog-body {
            padding: 8px 22px 18px;
            color: #4b5563;
            font-size: 15px;
            line-height: 1.55;
            white-space: pre-wrap;
            word-break: break-word;
        }
        .doni-native-dialog-input {
            width: calc(100% - 44px);
            margin: 0 22px 18px;
            border: 1px solid #e5e7eb;
            border-radius: 14px;
            padding: 13px 14px;
            font-size: 15px;
            outline: none;
            box-sizing: border-box;
        }
        .doni-native-dialog-input:focus {
            border-color: #b91c1c;
            box-shadow: 0 0 0 4px rgba(185,28,28,.10);
        }
        .doni-native-dialog-actions {
            display: flex;
            gap: 10px;
            justify-content: flex-end;
            padding: 14px 18px 18px;
            background: #fafafa;
        }
        .doni-native-dialog-btn {
            border: 0;
            border-radius: 14px;
            padding: 11px 18px;
            font-weight: 800;
            cursor: pointer;
            font-size: 14px;
        }
        .doni-native-dialog-btn.cancel {
            background: #eef2f7;
            color: #374151;
        }
        .doni-native-dialog-btn.ok {
            background: linear-gradient(135deg, #7f1010, #d71920);
            color: #fff;
            box-shadow: 0 8px 18px rgba(185,28,28,.22);
        }
        @media (max-width: 480px) {
            .doni-native-dialog-box { border-radius: 22px; }
            .doni-native-dialog-title { font-size: 18px; }
            .doni-native-dialog-body { font-size: 14px; }
            .doni-native-dialog-actions { padding: 12px 16px 16px; }
            .doni-native-dialog-btn { flex: 1; }
        }
        body.dark-mode .doni-native-dialog-box { background: #15171d; }
        body.dark-mode .doni-native-dialog-title { color: #f9fafb; }
        body.dark-mode .doni-native-dialog-body { color: #d1d5db; }
        body.dark-mode .doni-native-dialog-actions { background: #101217; }
        body.dark-mode .doni-native-dialog-input { background: #0f1117; color: #fff; border-color: #2a2f3a; }
        
    </style>

    <script>
        /* PATCH DONI: Nonaktifkan popup bawaan browser, ganti dengan modal custom aplikasi */
        (function(){
            function readyBody(cb){
                if(document.body) return cb();
                document.addEventListener('DOMContentLoaded', cb, { once: true });
            }
            function ensureDoniDialog(){
                let mask = document.getElementById('doniNativeDialogMask');
                if(mask) return mask;
                mask = document.createElement('div');
                mask.id = 'doniNativeDialogMask';
                mask.className = 'doni-native-dialog-mask';
                mask.innerHTML = `
                    <div class="doni-native-dialog-box" role="dialog" aria-modal="true">
                        <div class="doni-native-dialog-head">
                            <div class="doni-native-dialog-icon"><i class="fas fa-bell"></i></div>
                            <div class="doni-native-dialog-title" id="doniNativeDialogTitle">Informasi</div>
                        </div>
                        <div class="doni-native-dialog-body" id="doniNativeDialogBody"></div>
                        <input class="doni-native-dialog-input" id="doniNativeDialogInput" style="display:none;" />
                        <div class="doni-native-dialog-actions" id="doniNativeDialogActions"></div>
                    </div>`;
                document.body.appendChild(mask);
                return mask;
            }
            function openDoniDialog(options){
                options = options || {};
                return new Promise(resolve => {
                    readyBody(function(){
                        const mask = ensureDoniDialog();
                        const titleEl = document.getElementById('doniNativeDialogTitle');
                        const bodyEl = document.getElementById('doniNativeDialogBody');
                        const inputEl = document.getElementById('doniNativeDialogInput');
                        const actionsEl = document.getElementById('doniNativeDialogActions');
                        titleEl.textContent = options.title || 'Informasi';
                        bodyEl.textContent = String(options.message ?? '');
                        actionsEl.innerHTML = '';
                        inputEl.style.display = options.mode === 'prompt' ? 'block' : 'none';
                        inputEl.value = options.defaultValue || '';
                        inputEl.placeholder = options.placeholder || '';
                        function close(value){
                            mask.classList.remove('show');
                            document.removeEventListener('keydown', onKey);
                            resolve(value);
                        }
                        function onKey(e){
                            if(e.key === 'Escape') close(options.mode === 'confirm' ? false : null);
                            if(e.key === 'Enter' && options.mode === 'prompt') close(inputEl.value.trim());
                        }
                        document.addEventListener('keydown', onKey);
                        if(options.mode === 'confirm' || options.mode === 'prompt'){
                            const cancel = document.createElement('button');
                            cancel.className = 'doni-native-dialog-btn cancel';
                            cancel.type = 'button';
                            cancel.textContent = 'Batal';
                            cancel.onclick = () => close(options.mode === 'confirm' ? false : null);
                            actionsEl.appendChild(cancel);
                        }
                        const ok = document.createElement('button');
                        ok.className = 'doni-native-dialog-btn ok';
                        ok.type = 'button';
                        ok.textContent = options.okText || 'Oke';
                        ok.onclick = () => close(options.mode === 'confirm' ? true : (options.mode === 'prompt' ? inputEl.value.trim() : true));
                        actionsEl.appendChild(ok);
                        mask.classList.add('show');
                        if(options.mode === 'prompt') setTimeout(() => inputEl.focus(), 120);
                        else setTimeout(() => ok.focus(), 120);
                    });
                });
            }
            window.appAlert = function(title, message, type){
                if(message === undefined){ message = title; title = 'Informasi'; }
                return openDoniDialog({ mode: 'alert', title: title || 'Informasi', message, okText: 'Oke', type });
            };
            window.appConfirm = function(title, message){
                if(message === undefined){ message = title; title = 'Konfirmasi'; }
                return openDoniDialog({ mode: 'confirm', title: title || 'Konfirmasi', message, okText: 'Ya' });
            };
            window.appPrompt = function(title, message, placeholder, defaultValue){
                return openDoniDialog({ mode: 'prompt', title: title || 'Input Data', message, placeholder: placeholder || '', defaultValue: defaultValue || '', okText: 'Simpan' });
            };
            window.alert = function(message){ window.appAlert('Informasi', message); };
            window.confirm = function(message){ window.appAlert('Konfirmasi diperlukan', message + '\n\nAksi ini sudah diganti ke modal custom.'); return false; };
            window.prompt = function(message){ window.appAlert('Input diperlukan', message); return null; };
        })();
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script>
        document.addEventListener('input', function(e) {
            const phoneInputIds = ['nomorHP', 'invoiceNomorHP', 'newTopupPhone', 'inputIcsTujuan', 'inputKhfyTujuan', 'inputPOTujuan'];
            if (e.target && phoneInputIds.includes(e.target.id)) {
                let val = e.target.value;
                // Cek apakah awalnya memiliki +62 sebelum huruf/simbol dihapus
                let hasPlus62 = val.trim().startsWith('+62');
                
                // Hapus semua karakter yang BUKAN angka
                let clean = val.replace(/[^0-9]/g, '');
                
                // Penyesuaian +62 atau 62 menjadi 0
                if (hasPlus62) {
                    clean = '0' + clean.slice(2);
                } else if (clean.startsWith('62')) {
                    clean = '0' + clean.slice(2);
                }
                
                e.target.value = clean;
            }
        });
        
        window.pasteDariClipboard = async function(id) {
            const input = document.getElementById(id);
            if (!input) return;
            try {
                // Coba pakai sistem Aplikasi (Bridge AIDE)
                if (typeof AndroidShare !== "undefined" && typeof AndroidShare.pasteFromClipboard === "function") {
                    const text = AndroidShare.pasteFromClipboard();
                    if (text) {
                        input.value = text;
                        input.dispatchEvent(new Event('input', { bubbles: true }));
                    } else {
                        alert("Clipboard sistem kosong.");
                    }
                } else {
                    // Fallback ke Web Browser biasa
                    const text = await navigator.clipboard.readText();
                    input.value = text;
                    input.dispatchEvent(new Event('input', { bubbles: true }));
                }
            } catch (err) {
                alert('Tombol ini butuh izin khusus. Alternatif: Tekan dan Tahan kolom input, lalu pilih Tempel/Paste.');
            }
        };
    </script>

    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>

</head>

<body>
    <div id="authOverlay" style="display: flex;">
        <div class="auth-fx-bg"></div>

        <!-- FORM LOGIN -->
        <div class="auth-card" id="loginForm">
            <div class="auth-brand auth-brand-box">
                <img src="/images/Logo.png?v=be-logo1" class="brand-logo-glow" alt="Logo BhuleEmarket">
                <h1 class="auth-h1">BhuleEMarket</h1>
                <p class="auth-desc">Masuk ke akun Anda untuk transaksi Paket Akrab lebih cepat dan rapi.</p>
                <span class="auth-pill"><i class="fas fa-shield-alt"></i> Aman • Cepat • Praktis</span>
            </div>

            <div class="auth-mini-grid">
                <div class="auth-mini-box"><i class="fas fa-box-open"></i><b>Akrab</b><span>Paket XL</span></div>
                <div class="auth-mini-box"><i class="fas fa-wallet"></i><b>Saldo</b><span>Realtime</span></div>
                <div class="auth-mini-box"><i class="fas fa-bolt"></i><b>Instan</b><span>Transaksi</span></div>
            </div>

            <div class="auth-form-box">
                <div class="auth-form-title"><i class="fas fa-user-lock"></i> Login Member</div>
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

                <div class="reset-link">
                    <span onclick="handleResetPassword()">Lupa kata sandi?</span>
                </div>
            </div>

            <button id="btnLogin" class="btn-modern-auth" onclick="handleLogin()">
                MASUK SEKARANG <i class="fas fa-arrow-right"></i>
            </button>

            <button class="auth-google-btn" onclick="handleGoogleLogin()">
                <img src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg" alt="Google"> MASUK DENGAN GOOGLE
            </button>

            <div class="auth-switcher">
                Belum punya akun? <span class="link-accent" onclick="toggleAuth('register')">Daftar Disini</span>
            </div>
        </div>

        <!-- FORM REGISTER -->
        <div class="auth-card" id="registerForm" style="display: none;">
            <div class="auth-brand" style="margin-bottom: 10px;">
                <h1 class="auth-h1">Buat Akun</h1>
                <p class="auth-desc">Bergabung sekarang dan nikmati kemudahan transaksi.</p>
            </div>

            <div class="form-area">
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
                    <div class="inp-wrapper">
                        <input type="text" id="regUsername" class="inp-modern" placeholder="Username">
                        <i class="fas fa-at inp-icon"></i>
                    </div>
                    <div class="inp-wrapper">
                        <input type="text" id="regNama" class="inp-modern" placeholder="Nama Lengkap">
                        <i class="fas fa-id-card inp-icon"></i>
                    </div>
                </div>

                <div class="inp-wrapper">
                    <input type="tel" id="regWA" class="inp-modern" placeholder="WhatsApp (08xx)">
                    <i class="fab fa-whatsapp inp-icon"></i>
                </div>

                <div class="inp-wrapper">
                    <input type="email" id="regEmail" class="inp-modern" placeholder="Alamat Email">
                    <i class="fas fa-envelope inp-icon"></i>
                </div>

                <div class="profile-upload-field auth-profile-upload">
                    <input type="file" id="regFoto" class="photo-hidden-input" accept="image/jpeg,image/png,image/webp" onchange="previewRegPhoto(this)">
                    <label for="regFoto" class="profile-upload-label">
                        <img id="regFotoPreview" class="profile-upload-preview" src="https://ui-avatars.com/api/?name=Foto&background=7f1d1d&color=fff&size=128" alt="Preview Foto Profil">
                        <div class="profile-upload-text">
                            <b>Foto Profil Wajib</b>
                            <span>Pilih JPG/PNG/WEBP. Jika lebih dari 1 MB akan dikompres otomatis.</span>
                        </div>
                    </label>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
                    <div class="inp-wrapper">
                        <input type="password" id="regPass" class="inp-modern" placeholder="Sandi">
                        <i class="fas fa-lock inp-icon"></i>
                    </div>
                    <div class="inp-wrapper">
                        <input type="password" id="regPassConfirm" class="inp-modern" placeholder="Ulangi">
                        <i class="fas fa-check inp-icon"></i>
                    </div>
                </div>
            </div>

            <button class="btn-modern-auth" style="background: linear-gradient(135deg, #7f1d1d, #991b1b); margin-top:10px;" onclick="handleRegister()">
                DAFTAR GRATIS <i class="fas fa-paper-plane"></i>
            </button>

            <div class="auth-switcher">
                Sudah punya akun? <span class="link-accent" onclick="toggleAuth('login')">Masuk Akun</span>
            </div>
        </div>
    </div>

    <div id="profilePhotoRequiredModal" class="profile-required-modal" aria-modal="true" role="dialog">
        <div class="profile-required-card">
            <div class="profile-required-badge"><i class="fas fa-camera"></i></div>
            <h3>Foto Profil Wajib</h3>
            <p>Akun ini belum memiliki foto profil. Upload foto terlebih dahulu agar bisa melanjutkan memakai aplikasi.</p>
            <input type="file" id="requiredProfilePhotoInput" class="photo-hidden-input" accept="image/jpeg,image/png,image/webp" onchange="handleRequiredProfilePhotoInput(this)">
            <label for="requiredProfilePhotoInput" class="profile-upload-label" style="margin-bottom:12px;">
                <img id="requiredPhotoPreview" class="profile-upload-preview" src="https://ui-avatars.com/api/?name=User&background=7f1d1d&color=fff&size=128" alt="Preview Foto Profil">
                <div class="profile-upload-text" style="text-align:left;">
                    <b>Pilih Foto Profil</b>
                    <span>File akan dikompres otomatis maksimal 1 MB.</span>
                </div>
            </label>
            <div class="profile-required-actions">
                <button id="btnUploadRequiredPhoto" class="btn-modern-auth" onclick="document.getElementById('requiredProfilePhotoInput').click()">
                    <i class="fas fa-upload"></i> Upload Foto Sekarang
                </button>
            </div>
        </div>
    </div>

    <div id="globalLoader">
        <div class="loader-logo-box">
            <img src="/images/Logo.png?v=be-logo1" style="width: 100%; height: 100%; object-fit: contain;" alt="Logo BhuleEmarket">
        </div>
        <div class="custom-spinner"></div>
        <p style="margin-top: 20px; font-weight: 700; color: #333; font-size: 13px; letter-spacing: 0.5px;">Memuat Data...</p>
        <p style="margin-top: 5px; font-size: 10px; color: #888;">Sinkronisasi Produk & Akun</p>
    </div>

    <div id="mainAppContent">

        <div class="header" style="background: var(--grad-main); overflow: hidden; padding: 35px 20px 75px; border-radius: 0 0 40px 40px; box-shadow: 0 4px 15px rgba(127,29,29, 0.1);">
            <div class="header-top" style="display:flex; align-items:center; gap: 15px; padding-top: 10px; position: relative; z-index: 2;">
                <div style="flex:1; min-width:0;">
                    <div class="brand-pandawa-title"><img src="/images/Logo.png?v=be-logo1" class="brand-title-logo" alt="Logo BhuleEmarket"> BhuleE-Market</div>
                    <div class="brand-pandawa-subtitle">Layanan digital cepat & praktis</div>
                </div>
                <div style="display: flex; gap: 8px;">
                    <button type="button" onclick="toggleDarkTheme()" class="theme-toggle-btn" title="Beralih Tema Gelap/Terang" aria-label="Beralih Tema Gelap/Terang" style="width: 38px; height: 38px; background: rgba(255,255,255,0.1); backdrop-filter: blur(10px); -webkit-backdrop-filter: blur(10px); border-radius: 12px; display: flex; align-items: center; justify-content: center; cursor: pointer; border: 1px solid rgba(255,255,255,0.1); transition: 0.2s; padding:0;">
                        <i id="themeToggleIcon" class="fas fa-moon" style="color:#fff; font-size:15px;"></i>
                    </button>
                    <div onclick="handleLogout()" style="width: 38px; height: 38px; background: rgba(239, 68, 68, 0.15); backdrop-filter: blur(10px); border-radius: 12px; display: flex; align-items: center; justify-content: center; cursor: pointer; border: 1px solid rgba(239, 68, 68, 0.3); transition: 0.2s;">
                        <i class="fas fa-sign-out-alt" style="color:#fca5a5; font-size:15px;"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="saldo-box">
            <div class="saldo-info saldo-info-profile" style="border-bottom: none; padding-bottom: 0; margin-bottom: 0;">
                <div class="saldo-profile-left">
                    <div class="header-avatar-shell" onclick="navSwitch('profil', document.querySelectorAll('.nav-item')[3])" title="Foto Profil">
                        <img id="headerProfilePhoto" class="header-profile-photo" src="https://ui-avatars.com/api/?name=User&background=7f1d1d&color=fff&size=128" alt="Foto Profil" onerror="this.onerror=null;this.src=window.profileFallbackAvatar || 'https://ui-avatars.com/api/?name=User&background=7f1d1d&color=fff&size=128';">
                    </div>
                    <div class="saldo-user-mini">
                        <div class="saldo-welcome-mini"><i class="fas fa-sun"></i> Selamat Datang,</div>
                        <div id="headerName" class="saldo-header-name">Pengguna</div>
                        <div class="saldo-version-mini"><i class="fas fa-code-branch"></i> v1.0.5</div>
                    </div>
                </div>
                <div class="saldo-main-value saldo-main-value-shift">
                    <div class="saldo-label-premium"><i class="fas fa-wallet"></i> Saldo Kamu</div>
                    <div id="saldoValue">Rp 0</div>
                    <div class="saldo-subtitle-premium">Saldo aktif BhuleEmarket</div>
                </div>
            </div>

            <div class="action-grid">
                <div class="action-item" onclick="bukaModalTopup()">
                    <div class="action-icon"><i class="fas fa-plus"></i></div>
                    <span class="action-text">Topup</span>
                </div>
                <div class="action-item" onclick="bukaModalTransfer('kirim')">
                    <div class="action-icon"><i class="fas fa-paper-plane"></i></div>
                    <span class="action-text">Kirim</span>
                </div>
                <div class="action-item" onclick="bukaModalTransfer('minta')">
                    <div class="action-icon"><i class="fas fa-hand-holding-usd"></i></div>
                    <span class="action-text">Minta</span>
                </div>
                <div class="action-item" onclick="showMyQR()">
                    <div class="action-icon"><i class="fas fa-id-badge"></i></div>
                    <span class="action-text">QR Saya</span>
                </div>
            </div>
        </div>

        <div id="runningTextWrap" class="running-text-wrap" aria-live="polite">
            <div id="runningTextBox" class="running-text-box rt-anim-left">
                <div class="running-text-lane">
                    <div id="runningTextContent" class="running-text-content">
                        <span id="runningTextLine1" class="running-text-line"></span>
                        <span id="runningTextLine2" class="running-text-line" style="display:none;"></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="menu-container">
            <div class="cat-title" style="padding: 15px 0 10px;">Menu Utama</div>
            <div class="menu-grid" id="mainPpobMenuGrid" style="padding: 0;">
                <div class="menu-item" onclick="bukaMenu('Pulsa')">
                    <div class="icon-box"><i class="fas fa-mobile-alt" style="font-size:28px; color:#991b1b;"></i></div><span>Pulsa</span>
                </div>
                <div class="menu-item" onclick="bukaMenu('E-Wallet')">
                    <div class="icon-box"><i class="fas fa-wallet" style="font-size:26px; color:#7f1d1d;"></i></div><span>E-Wallet</span>
                </div>
                <div class="menu-item" onclick="bukaMenu('DIGITAL')">
                    <div class="icon-box"><i class="fas fa-gamepad" style="font-size:26px; color:#8b5cf6;"></i></div><span>DIGITAL</span>
                </div>
                <div class="menu-item" onclick="bukaMenu('Token PLN')">
                    <div class="icon-box"><i class="fas fa-bolt" style="font-size:26px; color:#f59e0b;"></i></div><span>Token PLN</span>
                </div>
                <div class="menu-item" onclick="bukaMenu('Telkomsel')">
                    <div class="icon-box"><img src="icons/Telkomsel.png" style="width:70%; height:70%; object-fit:contain;"></div><span>Telkomsel</span>
                </div>

                <div class="menu-item" onclick="bukaMenu('By.U')">
                    <div class="icon-box"><img src="icons/By.U.png" style="width:70%; height:70%; object-fit:contain;"></div><span>By.U</span>
                </div>
                <div class="menu-item" onclick="bukaMenu('Indosat')">
                    <div class="icon-box"><img src="icons/Indosat.png" style="width:70%; height:70%; object-fit:contain;"></div><span>Indosat</span>
                </div>
                <div class="menu-item" onclick="bukaMenu('XL')">
                    <div class="icon-box"><img src="icons/XL.png" style="width:70%; height:70%; object-fit:contain;"></div><span>XL</span>
                </div>
                <div class="menu-item" onclick="bukaMenu('Pulsa Transfer')">
                    <div class="icon-box"><i class="fas fa-exchange-alt" style="font-size:24px; color:#ec4899;"></i></div><span>Pulsa TF</span>
                </div>
                <div class="menu-item" onclick="bukaMenu('Tagihan')">
                    <div class="icon-box"><i class="fas fa-file-invoice-dollar" style="font-size:24px; color:#64748b;"></i></div><span>Tagihan</span>
                </div>
                <div class="menu-item" onclick="bukaMenu('PBB')">
                    <div class="icon-box"><i class="fas fa-home" style="font-size:24px; color:#84cc16;"></i></div><span>PBB</span>
                </div>
                <div class="menu-item" onclick="bukaMenu('Pascabayar')">
                    <div class="icon-box"><i class="fas fa-tv" style="font-size:24px; color:#6366f1;"></i></div><span>TV & Halo</span>
                </div>
                <div class="menu-item" onclick="bukaMenu('Axis')">
                    <div class="icon-box"><i class="fas fa-broadcast-tower" style="font-size:24px; color:#a855f7;"></i></div><span>Axis</span>
                </div>
                <div class="menu-item" onclick="bukaMenu('Tri')">
                    <div class="icon-box"><img src="icons/Tri.png" style="width:70%; height:70%; object-fit:contain;"></div><span>Tri</span>
                </div>
                <div class="menu-item" onclick="bukaMenu('Smartfren')">
                    <div class="icon-box"><img src="icons/Smartfren.png" style="width:70%; height:70%; object-fit:contain;"></div><span>Smartfren</span>
                </div>
                <div class="menu-item" onclick="bukaMenu('Topup E\'Tol')" style="display:none;">
                    <div class="icon-box"><i class="fas fa-car" style="font-size:24px; color:#f59e0b;"></i></div><span>E-Tol</span>
                </div>

                <div class="menu-item" onclick="bukaMenu('VA Bank')" style="display:none;">
                    <div class="icon-box"><i class="fas fa-university" style="font-size:24px; color:#34495e;"></i></div><span>VA Bank</span>
                </div>

            </div>

            <div id="menuDrawer">
                <div class="cat-title">Menu Lainnya</div>
                <div class="menu-grid" style="padding:0">

                    <div class="menu-item" onclick="bukaMenu('Indosat')">
                        <div class="icon-box"><img src="icons/Indosat.png" style="width:70%; height:70%; object-fit:contain;"></div><span>Indosat</span>
                    </div>
                    <div class="menu-item" onclick="bukaMenu('XL')">
                        <div class="icon-box"><img src="icons/XL.png" style="width:70%; height:70%; object-fit:contain;"></div><span>XL</span>
                    </div>
                    <div class="menu-item" onclick="bukaMenu('Pulsa Transfer')">
                        <div class="icon-box"><i class="fas fa-exchange-alt" style="font-size:24px; color:#ec4899;"></i></div><span>Pulsa TF</span>
                    </div>
                    <div class="menu-item" onclick="bukaMenu('Tagihan')">
                        <div class="icon-box"><i class="fas fa-file-invoice-dollar" style="font-size:24px; color:#64748b;"></i></div><span>Tagihan</span>
                    </div>
                    <div class="menu-item" onclick="bukaMenu('PBB')">
                        <div class="icon-box"><i class="fas fa-home" style="font-size:24px; color:#84cc16;"></i></div><span>PBB</span>
                    </div>
                    <div class="menu-item" onclick="bukaMenu('Pascabayar')">
                        <div class="icon-box"><i class="fas fa-tv" style="font-size:24px; color:#6366f1;"></i></div><span>TV & Halo</span>
                    </div>
                    <div class="menu-item" onclick="bukaMenu('Axis')">
                        <div class="icon-box"><i class="fas fa-broadcast-tower" style="font-size:24px; color:#a855f7;"></i></div><span>Axis</span>
                    </div>
                    <div class="menu-item" onclick="bukaMenu('Tri')">
                        <div class="icon-box"><img src="icons/Tri.png" style="width:70%; height:70%; object-fit:contain;"></div><span>Tri</span>
                    </div>
                    <div class="menu-item" onclick="bukaMenu('Smartfren')">
                        <div class="icon-box"><img src="icons/Smartfren.png" style="width:70%; height:70%; object-fit:contain;"></div><span>Smartfren</span>
                    </div>
                    <div class="menu-item" onclick="bukaMenu('Topup E\'Tol')" style="display:none;">
                        <div class="icon-box"><i class="fas fa-car" style="font-size:24px; color:#f59e0b;"></i></div><span>E-Tol</span>
                    </div>

                    <div class="menu-item" onclick="bukaMenu('VA Bank')" style="display:none;">
                        <div class="icon-box"><i class="fas fa-university" style="font-size:24px; color:#34495e;"></i></div><span>VA Bank</span>
                    </div>
                </div>
            </div>

            <div id="btnMoreContainer">
                <div class="menu-scroll-hint" aria-hidden="true"><span></span><span></span><span></span></div>
            </div>

            <div class="inline-akrab-wrapper" id="menuAkrabAll">
                <button type="button" class="inline-akrab-toggle" onclick="toggleInlineAkrab()">
                    <div class="inline-akrab-icon"><i class="fas fa-users"></i></div>
                    <div class="inline-akrab-text">
                        <strong>Paket Akrab</strong>
                        <span>Tekan untuk membuka daftar paket akrab lengkap</span>
                    </div>
                    <div class="inline-akrab-arrow"><i class="fas fa-chevron-down"></i></div>
                </button>
                <div id="inlineAkrabPanel" class="inline-akrab-panel">
                    <div class="inline-akrab-search-wrap">
                        <i class="fas fa-search"></i>
                        <input type="text" id="inlineAkrabSearch" placeholder="Cari produk Paket Akrab..." oninput="window.filterInlineAkrabSearch()">
                    </div>
                    <div id="inlineAkrabFilter" class="inline-akrab-filter"></div>
                    <div id="inlineAkrabList" class="inline-akrab-list">
                        <div class="inline-akrab-empty"><i class="fas fa-hand-pointer"></i><br>Tekan tombol Paket Akrab untuk memuat produk.</div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <a id="appBanner" class="app-install-fab" href="BE.apk" title="Install Aplikasi Android">
        <div class="app-install-icon"><i class="fab fa-android"></i></div>
        <div class="app-install-text">Install<br>di Android</div>
        <style>
            .app-install-fab { display: none; position: fixed; right: 15px; bottom: 142px; width: 58px; min-height: 72px; border-radius: 22px; background: linear-gradient(145deg, #0f172a 0%, #450a0a 55%, #7f1d1d 100%); color: #fff; text-decoration: none; z-index: 9997; align-items: center; justify-content: center; flex-direction: column; gap: 4px; box-shadow: 0 14px 30px rgba(69,10,10,0.34), inset 0 0 0 1px rgba(255,255,255,0.16); border: 1px solid rgba(255,255,255,0.16); overflow: hidden; animation: appFloatIn 0.35s ease, appFloatPulse 2.4s ease-in-out infinite; }
            .app-install-fab::before { content: ''; position: absolute; width: 58px; height: 58px; right: -24px; top: -24px; background: rgba(255,255,255,0.15); border-radius: 50%; filter: blur(2px); }
            .app-install-fab::after { content: ''; position: absolute; left: 8px; right: 8px; bottom: 6px; height: 1px; background: linear-gradient(90deg, transparent, rgba(255,255,255,0.35), transparent); }
            .app-install-icon { width: 36px; height: 36px; border-radius: 16px; background: rgba(255,255,255,0.14); display: flex; align-items: center; justify-content: center; box-shadow: inset 0 0 0 1px rgba(255,255,255,0.18); position: relative; z-index: 2; }
            .app-install-icon i { font-size: 23px; color: #a4c639; text-shadow: 0 3px 10px rgba(164,198,57,0.35); }
            .app-install-text { font-size: 7.5px; font-weight: 950; line-height: 1.05; text-align: center; letter-spacing: -0.1px; color: rgba(255,255,255,0.94); position: relative; z-index: 2; text-transform: uppercase; }
            .app-install-fab:active { transform: scale(0.92); }
            @keyframes appFloatIn { from { opacity: 0; transform: translateY(18px) scale(0.8); } to { opacity: 1; transform: translateY(0) scale(1); } }
            @keyframes appFloatPulse { 0%, 100% { box-shadow: 0 14px 30px rgba(69,10,10,0.34), inset 0 0 0 1px rgba(255,255,255,0.16); } 50% { box-shadow: 0 18px 38px rgba(127,29,29,0.46), inset 0 0 0 1px rgba(255,255,255,0.24); } }
        </style>
    </a>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const detectBhuleEmarketApp = () => {
                const ua = String(navigator.userAgent || '').toLowerCase();
                const packageName = 'com.be.digital';
        
                let bridgePackage = '';
                try {
                    if (typeof AndroidShare !== 'undefined') {
                        if (typeof AndroidShare.getPackageName === 'function') {
                            bridgePackage = String(AndroidShare.getPackageName() || '').toLowerCase();
                        } else if (typeof AndroidShare.packageName !== 'undefined') {
                            bridgePackage = String(AndroidShare.packageName || '').toLowerCase();
                        }
                    }
                } catch (e) {
                    bridgePackage = '';
                }
        
                return typeof AndroidShare !== 'undefined' || ua.includes(packageName) || bridgePackage === packageName;
            };
        
            const isApp = detectBhuleEmarketApp();
            const banner = document.getElementById('appBanner');
            if (banner) {
                banner.style.display = isApp ? 'none' : 'flex';
                banner.setAttribute('href', 'BE.apk');
            }
        });
    </script>

    <div id="h2hDashboard" style="display:none; padding: 20px; padding-top: 40px; animation: fadeIn 0.3s; padding-bottom: 20px;">
        <div style="background:var(--grad-main); padding: 25px 20px; border-radius: 20px; color: white; margin-bottom: 20px; box-shadow: 0 10px 20px rgba(185,28,28,0.2); display:flex; flex-direction:column; gap:10px;">
            <div style="font-size:12px; opacity:0.9; display:flex; align-items:center; gap:5px;"><i class="fas fa-server"></i> Akun Merchant H2H</div>
            <div id="h2hName" style="font-size:24px; font-weight:900; letter-spacing:-0.5px; line-height:1.2;">Loading...</div>
            <div style="display:flex; justify-content:space-between; align-items:flex-end; border-top:1px dashed rgba(255,255,255,0.3); padding-top:12px; margin-top:5px;">
                <div>
                    <div style="font-size:10px; opacity:0.8; margin-bottom:2px;">Saldo Tersedia</div>
                    <div id="h2hSaldo" style="font-size:18px; font-weight:bold;">Rp 0</div>
                </div>
                <div style="text-align:right;">
                    <div style="font-size:10px; opacity:0.8; margin-bottom:2px;">Terdaftar Sejak</div>
                    <div id="h2hJoin" style="font-size:12px; font-weight:bold;">-</div>
                </div>
            </div>
        </div>

        <div style="background:white; padding: 18px; border-radius: 16px; box-shadow: 0 4px 10px rgba(0,0,0,0.03); margin-bottom: 20px; border:1px solid #f0f4f8;">
            <div style="font-size:13px; font-weight:800; color:#2c3e50; margin-bottom:12px;"><i class="fas fa-id-card" style="color:var(--primary); margin-right:5px;"></i> Detail Profil</div>
            <div style="display:flex; flex-direction:column; gap:10px;">
                <div style="display:flex; justify-content:space-between; font-size:12px; border-bottom:1px dashed #eee; padding-bottom:8px;">
                    <span style="color:#7f8c8d;">Email</span><strong id="h2hEmail" style="color:#2c3e50;">-</strong>
                </div>
                <div style="display:flex; justify-content:space-between; font-size:12px;">
                    <span style="color:#7f8c8d;">Nomor HP / WA</span><strong id="h2hPhone" style="color:#2c3e50;">-</strong>
                </div>
            </div>
        </div>

        <div style="background:white; padding: 18px; border-radius: 16px; box-shadow: 0 4px 10px rgba(0,0,0,0.03); margin-bottom: 20px; border:1px solid #f0f4f8;">
            <div style="font-size:13px; font-weight:800; color:#2c3e50; margin-bottom:12px;"><i class="fas fa-key" style="color:#e67e22; margin-right:5px;"></i> API Credentials</div>
            <div style="background:#f8fafc; border:1px solid #edf2f7; padding:12px; border-radius:10px; display:flex; justify-content:space-between; align-items:center;">
                <code id="h2hApiKey" style="font-size:12px; color:#d35400; font-weight:bold; word-break:break-all;">Loading...</code>
                <div onclick="navigator.clipboard.writeText(document.getElementById('h2hApiKey').innerText); window.showNotice('success','Disalin','API Key disalin ke clipboard');" style="background:#e1effe; color:var(--primary); width:32px; height:32px; border-radius:8px; display:flex; align-items:center; justify-content:center; cursor:pointer; flex-shrink:0; margin-left:10px;">
                    <i class="fas fa-copy"></i>
                </div>
            </div>
            <div style="font-size:10px; color:#95a5a6; margin-top:8px; line-height:1.4;"><i class="fas fa-info-circle"></i> Gunakan API Key ini untuk melakukan integrasi Web 2 Host.</div>
        </div>

        <button onclick="window.open('https://www.bhuleemarket.store/getdoc.php', '_blank')" style="width:100%; padding:15px; background:linear-gradient(135deg, #2c3e50, #34495e); color:white; border:none; border-radius:12px; font-weight:800; font-size:13px; box-shadow:0 4px 15px rgba(44,62,80,0.3); cursor:pointer; display:flex; align-items:center; justify-content:center; gap:8px;">
            <i class="fas fa-laptop-code"></i> Tutorial Connect Web 2 Host
        </button>

        <button onclick="handleLogout()" style="width:100%; padding:15px; background:#fff5f5; color:var(--danger); border:1px solid #ffcccc; border-radius:12px; font-weight:800; font-size:13px; margin-top:10px; cursor:pointer; display:flex; align-items:center; justify-content:center; gap:8px;">
            <i class="fas fa-sign-out-alt"></i> Keluar Akun
        </button>
    </div>

    <div class="frequent-product-switch" id="frequentProductSwitch">
        <button id="btnFrequentProducts" onclick="window.toggleFrequentProducts()"><i class="fas fa-fire"></i> Produk sering di beli</button>
    </div>

    <div class="live-history-shell">
        <div id="liveHistoryHeader">
            <div class="history-title-wrap">
                <div class="history-title-main"><i class="fas fa-bolt"></i> Riwayat Live</div>
                <div class="history-subtitle">10 transaksi terbaru kamu</div>
            </div>
            <div class="history-action-row">
                <div class="history-mini-btn icon-only" onclick="window.initRiwayatListener && window.initRiwayatListener(window.auth && window.auth.currentUser)" title="Refresh Riwayat">
                    <i class="fas fa-sync-alt"></i>
                </div>
                <div id="btnModeMasal" class="history-mini-btn" onclick="toggleModeMasal()">
                    <i class="fas fa-print"></i> Cetak
                </div>
                <div class="history-mini-btn primary" onclick="bukaRiwayatArsip()">
                    Semua <i class="fas fa-chevron-right"></i>
                </div>
            </div>
        </div>
        <div id="riwayat-container" class="history-container">
            <div class="history-empty-state"><i class="fas fa-circle-notch fa-spin"></i><b>Memuat riwayat</b><span>Sedang mengambil transaksi terbaru...</span></div>
        </div>
    </div>

    <div id="shop-container" class="product-list"></div>

    <div id="modalNotice" class="modal">
        <div class="notice-content">
            <div id="noticeIcon" class="notice-icon"></div>
            <div id="noticeTitle" style="font-weight:bold; font-size:18px; margin-bottom:10px;"></div>
            <div id="noticeMsg" style="font-size:13px; color:#666; line-height:1.4;"></div>
            <button class="btn-konfirmasi" id="btnNoticeClose" style="display:none; margin-top:20px;" onclick="tutupNotice()">OKE</button>
        </div>
    </div>

    <div id="modalTransfer" class="modal" style="z-index: 22000; align-items: center; justify-content: center;">
        <div class="notice-content" style="text-align: left; width: 90%; max-width: 350px; padding: 20px;">
            <h3 id="transferTitle" style="margin-bottom:15px; text-align:center;">Kirim Saldo</h3>
            <div class="input-group">
                <label style="font-size:12px; font-weight:bold;">Email / Username Tujuan</label>
                <input type="text" id="transferTarget" class="form-input" placeholder="Masukkan Email / Username">
            </div>
            <div class="input-group">
                <label style="font-size:12px; font-weight:bold;">Nominal (Rp)</label>
                <input type="number" id="transferNominal" class="form-input" placeholder="Contoh: 50000">
            </div>
            <button id="btnProsesTransfer" class="btn-konfirmasi" onclick="prosesTransfer()">PROSES</button>
            <button class="btn-batal" onclick="document.getElementById('modalTransfer').style.display='none'">BATAL</button>
        </div>
    </div>

    <div id="modalNotifTransfer" class="modal" style="z-index: 23000; align-items: center; justify-content: center;">
        <div class="notice-content" style="background:#e6f9ed; border:2px solid var(--success);">
            <i class="fas fa-check-circle" style="font-size:50px; color:var(--success); margin-bottom:15px;"></i>
            <div style="font-weight:bold; font-size:18px; margin-bottom:10px; color:#27ae60;">Transfer Masuk!</div>
            <div id="notifTransferMsg" style="font-size:13px; color:#333; line-height:1.4;"></div>
            <button class="btn-konfirmasi" style="background:var(--success); margin-top:20px;" onclick="tutupNotifTransfer()">OKE, TERIMA KASIH</button>
        </div>
    </div>

    <div id="modalRequestSaldo" class="modal" style="z-index: 23000; align-items: center; justify-content: center;">
        <div class="notice-content" style="background:#fff8e1; border:2px solid #f39c12;">
            <i class="fas fa-hand-holding-usd" style="font-size:50px; color:#f39c12; margin-bottom:15px;"></i>
            <div style="font-weight:bold; font-size:18px; margin-bottom:10px; color:#d35400;">Permintaan Saldo</div>
            <div id="requestSaldoMsg" style="font-size:13px; color:#333; line-height:1.4;"></div>
            <input type="hidden" id="requestDataId">
            <div style="display:flex; gap:10px; margin-top:20px;">
                <button class="btn-konfirmasi" style="flex:1; background:var(--success);" onclick="terimaRequestSaldo()">TERIMA</button>
                <button class="btn-batal" style="flex:1; background:var(--danger); color:white;" onclick="tolakRequestSaldo()">TOLAK</button>
            </div>
        </div>
    </div>

    <div id="fabCetakMasal" style="display:none; position:fixed; bottom:120px; left:50%; transform:translateX(-50%); width:90%; z-index:9999; animation: slideUp 0.3s;">
        <div style="display:flex; gap:10px;">
            <button onclick="window.isShareMode=false; prosesPrintMasal()" class="btn-konfirmasi" style="flex:1; padding:12px; font-size:14px; margin-top:0; box-shadow: 0 5px 15px rgba(0,0,0,0.2); border:2px solid white;">
                <i class="fas fa-print"></i> Print (<span id="countMasal">0</span>)
            </button>
            <button onclick="prosesShareMasal()" class="btn-konfirmasi" style="flex:1; padding:12px; font-size:14px; margin-top:0; background:linear-gradient(135deg, #25D366, #128C7E); box-shadow: 0 5px 15px rgba(37, 211, 102, 0.3); border:2px solid white;">
                <i class="fab fa-whatsapp"></i> Share (<span id="countMasalShare">0</span>)
            </button>
        </div>
    </div>

    <div id="modalBroadcast" class="modal">
        <div class="bc-content">
            <div class="bc-close-btn" onclick="tutupBroadcast()"><i class="fas fa-times"></i></div>
            <img id="bcImageDisplay" class="bc-img" src="" alt="Siaran">
            <div class="bc-body">
                <div id="bcTitleDisplay" class="bc-title"></div>
                <div id="bcTextDisplay" class="bc-text"></div>
                <button class="btn-konfirmasi" onclick="tutupBroadcast()">TUTUP</button>
            </div>
        </div>
    </div>

    <div id="modalApp" class="modal">
        <div class="modal-content">

            <div id="akrabUI" style="display:none;">
                <div class="akrab-header">
                    <i class="fas fa-arrow-left" onclick="tutupModal()" style="font-size:20px; cursor:pointer;"></i>
                    <span style="font-weight:800; font-size:16px; letter-spacing:1px;">PAKET AKRAB</span>
                </div>
                <div class="akrab-search-container">
                    <input type="text" id="akrabSearch" class="akrab-search-input" placeholder="Cari produk..." oninput="window.filterAkrabSearch()">
                </div>
            </div>

            <div id="defaultModalHeader" style="display:flex; align-items:center; margin-bottom:15px;">
                <i class="fas fa-arrow-left" id="btnKembali" onclick="kembaliKeFilter()"></i>
                <h3 id="judulMenu" style="margin:0; font-size:18px;">Pilih Produk</h3>
                <div style="flex:1"></div>
                <i class="fas fa-times" onclick="tutupModal()" style="font-size:20px; color:#999; cursor:pointer;"></i>
            </div>

            <div id="inputContainer">
                <div class="input-group">
                    <input type="tel" inputmode="numeric" id="nomorHP" class="form-input" placeholder="Masukkan Nomor HP / ID Pelanggan" style="padding-right: 150px; height: 45px; border-radius: 14px;">
                    <i class="fas fa-address-card" style="top: 13px;"></i>
                    <div id="operatorBadge" style="top: 13px; right: 75px; padding: 3px 8px; border-radius: 6px; line-height: 1.2;"></div>
                    <button type="button" onclick="window.pasteDariClipboard('nomorHP')" style="position:absolute; right:8px; top:8px; background:var(--primary); color:white; border:none; border-radius:10px; padding:0 12px; height: 29px; font-size:10px; font-weight:bold; cursor:pointer; z-index:10; box-shadow: 0 2px 5px rgba(127,29,29,0.2);">PASTE</button>
                </div>

                <div id="areaBebasNominal" style="display:none; margin-top:10px; background: rgba(127,29,29,0.03); padding: 15px; border-radius: 16px; border: 1px dashed rgba(127,29,29,0.2);">
                    <label style="font-size:12px; font-weight:800; color:var(--primary); margin-bottom: 8px; display: block; text-transform: uppercase; letter-spacing: 0.5px;">Nominal Pengisian</label>
                    <div class="input-group" style="margin-bottom:0;">
                        <input type="tel" id="inputQty" class="form-input" placeholder="Contoh: 25000" oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                        <i class="fas fa-coins"></i>
                    </div>
                </div>
            </div>

            <div id="areaFilter"></div>
            <div id="statusLoading" style="text-align:center; font-size:13px; color:#666; display:none; padding:40px;">Sedang memproses data...</div>
            <div id="listProdukArea"></div>
        </div>
    </div>

    <div id="modalProdukList" class="modal" style="z-index:11500;">
        <div class="modal-content" style="height:85vh; display:flex; flex-direction:column; padding:0; overflow:hidden;">
            <div style="display:flex; align-items:center; padding:15px; border-bottom:1px solid #eee; background:white; z-index:10; border-radius:15px 15px 0 0; box-shadow:0 2px 5px rgba(0,0,0,0.02);">
                <h3 id="judulKategoriModal" style="margin:0; font-size:16px; flex:1; color:#333; font-weight:800;">Daftar Produk</h3>
                <i class="fas fa-times" onclick="document.getElementById('modalProdukList').style.display='none'" style="font-size:20px; color:#999; cursor:pointer; padding:5px;"></i>
            </div>
            <div id="listProdukModalArea" style="flex:1; overflow-y:auto; padding:15px; background:#fdfdfd;"></div>
        </div>
    </div>

    <div id="modalTagihan" class="modal">
        <div class="modal-content">
            <h3 style="margin-bottom:15px; text-align:center; border-bottom:1px dashed #eee; padding-bottom:10px;">Rincian Tagihan</h3>
            <div id="tagihanContent" style="font-size:13px; line-height:1.6; color:#333;"></div>
            <div style="background:#fff1f2; padding:10px; border-radius:8px; margin:15px 0; text-align:center; border:1px solid #fecaca;">
                <span style="font-size:11px; color:#555;">Total Bayar</span><br>
                <strong id="tagihanTotal" style="font-size:20px; color:var(--primary);">Rp 0</strong>
            </div>
            <input type="hidden" id="tagihanDataRaw">
            <button class="btn-konfirmasi" onclick="prosesBayarTagihan()">BAYAR SEKARANG</button>
            <button class="btn-batal" onclick="document.getElementById('modalTagihan').style.display='none'">TUTUP</button>
        </div>
    </div>

    <div id="modalInvoice" class="modal" style="z-index: 12000;">
        <div class="modal-content modal-invoice">
            <h3 style="margin-bottom:20px; text-align:center;">Konfirmasi Pembayaran</h3>
            <div id="statusCekNama" style="display:none; text-align:center; font-size:12px; color:var(--primary); margin-top:-10px; margin-bottom:15px;"><i class="fas fa-circle-notch fa-spin"></i> Sedang mengecek nama pemilik...</div>
            <div id="invoiceContent"></div>
            <div id="invoiceFooter">
                <button id="btnKonfirmasiBayar" class="btn-konfirmasi" onclick="this.disabled=true; this.innerHTML='<i class=\'fas fa-spinner fa-spin\'></i> Memproses...'; window.prosesBayarFinal();">KONFIRMASI BAYAR</button>
                <button class="btn-batal" onclick="tutupInvoice()">BATAL</button>
            </div>
        </div>
    </div>

    <div id="modalTopup" class="modal">
        <div class="modal-content" style="max-height: 90vh; overflow-y: auto; min-height: 400px;">
            <div style="display:flex; align-items:center; margin-bottom:15px;">
                <i class="fas fa-arrow-left" id="btnBackTopup" onclick="backTopupStep()" style="font-size:18px; color:#333; cursor:pointer; margin-right:15px; display:none;"></i>
                <h3 id="titleTopup" style="margin:0; font-size:18px;">Isi Saldo</h3>
                <div style="flex:1"></div>
                <i class="fas fa-times" onclick="tutupModalTopup()" style="font-size:20px; color:#999; cursor:pointer;"></i>
            </div>

            <div id="areaTopupSteps" style="padding-bottom: 20px;">

                <div style="text-align:center; padding:40px; color:#999;"><i class="fas fa-circle-notch fa-spin"></i> Memuat Metode Pembayaran...</div>
            </div>
        </div>
    </div>

    <div id="modalArsip" class="modal">
        <div class="modal-content" style="max-height: 90vh; display: flex; flex-direction: column;">
            <div style="display:flex; align-items:center; margin-bottom:15px;">
                <h3 style="margin:0; font-size:18px;">Semua Riwayat</h3>
                <div style="flex:1"></div>
                <i class="fas fa-sync-alt" onclick="refreshRiwayatArsip()" style="font-size:16px; color:var(--primary); cursor:pointer; margin-right:20px; background:#e1effe; padding:8px; border-radius:50%;"></i>
                <i class="fas fa-times" onclick="tutupRiwayatArsip()" style="font-size:20px; color:#999; cursor:pointer;"></i>
            </div>

            <div style="background: #f8fafc; padding: 15px; border-radius: 16px; margin-bottom: 10px; border: 1px solid #edf2f7; box-shadow: 0 4px 6px -4px rgba(0,0,0,0.05);">

                <div style="position:relative; margin-bottom:12px;">
                    <input type="text" id="searchRiwayat" placeholder="Cari ID Trx / Nomor / Produk..." style="width:100%; padding:12px 12px 12px 40px; border:1px solid #cbd5e1; border-radius:12px; font-size:13px; outline:none; box-sizing:border-box; background:white; transition:0.3s;">
                    <i class="fas fa-search" style="position:absolute; left:14px; top:50%; transform:translateY(-50%); color:#94a3b8;"></i>
                </div>

                <div style="display: grid; grid-template-columns: 1.2fr 1fr; gap: 10px; margin-bottom: 12px;">
                    <div>
                        <label style="font-size:10px; font-weight:700; color:#64748b; margin-bottom:5px; display:block; text-transform:uppercase;">Tanggal</label>
                        <input type="date" id="filterTgl" style="width:100%; padding:10px; border:1px solid #cbd5e1; border-radius:10px; font-size:12px; outline:none; box-sizing:border-box; background:white; color:#333;">
                    </div>
                    <div>
                        <label style="font-size:10px; font-weight:700; color:#64748b; margin-bottom:5px; display:block; text-transform:uppercase;">Status</label>
                        <select id="filterStatus" style="width:100%; padding:10px; border:1px solid #cbd5e1; border-radius:10px; font-size:12px; outline:none; box-sizing:border-box; background:white; color:#333; appearance:none;">
                            <option value="SEMUA">Semua</option>
                            <option value="BERHASIL">Berhasil</option>
                            <option value="GAGAL">Gagal</option>
                            <option value="PENDING">Pending</option>
                        </select>
                    </div>
                </div>

                <button onclick="window.terapkanFilterRiwayat()" style="width:100%; background:var(--grad-main); color:white; border:none; padding:12px; border-radius:12px; font-weight:700; font-size:13px; cursor:pointer; box-shadow: 0 4px 10px rgba(0, 114, 255, 0.3); transition:0.2s; display:flex; align-items:center; justify-content:center; gap:8px;">
                    <i class="fas fa-filter"></i> Terapkan Filter
                </button>
            </div>

            <div id="listArsipArea" style="flex:1; overflow-y:auto; padding:5px;"></div>
            <div id="paginationRiwayat" class="pagination-container"></div>
        </div>
    </div>
    </div>
    <div id="modalDetailRiwayat" class="modal">
        <div class="modal-content" style="height:auto; max-height:85vh; overflow-y:auto; border-radius: 28px 28px 0 0; padding: 18px 18px 22px; background: linear-gradient(180deg, #ffffff 0%, #f8fafc 100%); box-shadow: 0 -18px 45px rgba(15,23,42,0.20);">
            <div style="width:42px; height:5px; border-radius:999px; background:#cbd5e1; margin:0 auto 14px;"></div>
            <div id="detailRiwayatContent"></div>
        </div>
    </div>

    <div id="modalProductDetail" class="modal" style="z-index: 12000; background:white;">
        <div class="pdp-container" id="pdpContent">

        </div>
        <div class="pdp-footer">
            <button class="btn-cart-add" onclick="aksiKeranjang()"><i class="fas fa-cart-plus"></i> Keranjang</button>
            <button class="btn-buy-now" onclick="aksiBeliLangsung()">Beli Sekarang</button>
        </div>
        <div style="position:absolute; top:15px; left:15px; background:rgba(0,0,0,0.3); width:35px; height:35px; border-radius:50%; display:flex; align-items:center; justify-content:center; cursor:pointer; color:white;" onclick="document.getElementById('modalProductDetail').style.display='none'">
            <i class="fas fa-arrow-left"></i>
        </div>
    </div>

    <div id="modalCheckoutFisik" class="modal" style="z-index: 13000;">
        <div class="modal-content" style="max-height: 90vh; overflow-y: auto;">
            <h3>Pengiriman & Pembayaran</h3>
            <div class="input-group">
                <label style="font-size:12px; font-weight:bold;">Provinsi Tujuan</label>
                <select id="shipProv" class="form-input" onchange="window.loadCities(this.value, 'shipCity')" style="padding-left:15px;">
                    <option value="">Pilih Provinsi</option>
                </select>
            </div>
            <div class="input-group">
                <label style="font-size:12px; font-weight:bold;">Kota Tujuan</label>
                <select id="shipCity" class="form-input" onchange="window.loadDistricts(this.value, 'shipDist')" style="padding-left:15px;">
                    <option value="">Pilih Kota</option>
                </select>
            </div>
            <div class="input-group">
                <label style="font-size:12px; font-weight:bold;">Kecamatan Tujuan</label>
                <select id="shipDist" class="form-input" onchange="window.hitungOngkirKlikResi()" style="padding-left:15px;">
                    <option value="">Pilih Kecamatan</option>
                </select>
            </div>
            <div class="input-group">
                <label style="font-size:12px; font-weight:bold;">Alamat Lengkap (RT/RW/No Rumah)</label>
                <textarea id="shipAlamat" class="form-input" rows="2" placeholder="Nama Jalan, Blok, Nomor Rumah"></textarea>
            </div>
            <div class="input-group">
                <label style="font-size:12px; font-weight:bold;">Kode Pos</label>
                <input type="text" id="shipKodepos" class="form-input" placeholder="Kode Pos">
            </div>

            <label style="font-size:12px; font-weight:bold;">Pilih Layanan Kurir</label>
            <select id="shipKurir" class="form-input" onchange="window.updateTotalDenganOngkir()">
                <option value="">-- Pilih Lokasi Dulu --</option>
            </select>

            <div style="background:#f8f9fa; padding:15px; border-radius:10px; margin: 15px 0;">
                <div class="invoice-row"><span>Subtotal Barang</span><b id="coSubtotal">Rp 0</b></div>
                <div class="invoice-row"><span>Ongkos Kirim</span><b id="coOngkir">Rp 0</b></div>
                <div class="invoice-row invoice-total"><span>TOTAL BAYAR</span><b id="coTotal" style="color:var(--primary); font-size:18px;">Rp 0</b></div>
            </div>

            <button class="btn-konfirmasi" onclick="prosesCheckoutFisik()">BAYAR SEKARANG</button>
            <button class="btn-batal" onclick="document.getElementById('modalCheckoutFisik').style.display='none'">BATAL</button>
        </div>
    </div>

    <script type="module">
        import { initializeApp } from "https://www.gstatic.com/firebasejs/10.7.1/firebase-app.js";
        import { getAuth, signInWithEmailAndPassword, createUserWithEmailAndPassword, onAuthStateChanged, sendPasswordResetEmail, signOut, GoogleAuthProvider, signInWithRedirect, signInWithPopup } from "https://www.gstatic.com/firebasejs/10.7.1/firebase-auth.js";
        import { getFirestore, collection, onSnapshot, addDoc, query, orderBy, limit, serverTimestamp, updateDoc, doc, setDoc, getDoc, deleteDoc, where, getDocs, runTransaction, initializeFirestore, persistentLocalCache, persistentMultipleTabManager } from "https://www.gstatic.com/firebasejs/10.7.1/firebase-firestore.js";
        
        const firebaseConfig = {
          apiKey: "AIzaSyBAW2hM8MO2aLlwRmpoY48ujbc_Xno8uYI",
          authDomain: "bhuleemarket-1011f.firebaseapp.com",
          projectId: "bhuleemarket-1011f",
          storageBucket: "bhuleemarket-1011f.firebasestorage.app",
          messagingSenderId: "395933563798",
          appId: "1:395933563798:web:575018ab1e2a6563dbfbb7",
          measurementId: "G-GGSGFJL9FQ"
        };
        const app = initializeApp(firebaseConfig);
                        // --- PENGHEMAT KUOTA: OFFLINE PERSISTENCE (MODERN) ---
        const db = initializeFirestore(app, {
            localCache: persistentLocalCache({
                tabManager: persistentMultipleTabManager()
            })
        });
        const auth = getAuth(app);
        
        // Ekspos ke Global agar bisa dibaca script biasa
        window.auth = auth; window.db = db;
        window.setDoc = setDoc; window.getDoc = getDoc; window.updateDoc = updateDoc; window.runTransaction = runTransaction; window.doc = doc; window.serverTimestamp = serverTimestamp; window.collection = collection; window.addDoc = addDoc; window.getDocs = getDocs; window.where = where; window.query = query; window.onSnapshot = onSnapshot; window.deleteDoc = deleteDoc; window.orderBy = orderBy; window.limit = limit;
        
        // PATCH DONI: Telegram dipusatkan ke PHP backend agar token bot tidak tampil di index/frontend.
        window.TELEGRAM_API_URL = window.TELEGRAM_API_URL || 'bottele/telegram_api.php';
        
        
        // PATCH DONI: Sinkronisasi Antrian PO ke hosting JSON folder per transaksi:
        // /public_html/preorder/{uid}/{id_transaksi}/data.json   = data PO / riwayat Firestore
        // /public_html/preorder/{uid}/{id_transaksi}/respon.json = raw response mentah terbaru dari server saat RUN / CREATE
        // Catatan: index tetap mengirim raw_response/latest_raw_response ke API.
        // API yang akan memisahkan otomatis: data PO ke data.json, raw response ke respon.json.
        window.PO_DATAPO_API_URL = window.PO_DATAPO_API_URL || '/preorder/api_datapo.php';
        
        window.safeJsonStringifyPO = function(value) {
            try {
                if (typeof value === 'string') return value;
                return JSON.stringify(value || {}, null, 2);
            } catch(e) {
                return String(value || '');
            }
        };
        
        window.normalizePOApiType = function(data) {
            const raw = String(
                (data && (data.provider || data.api_provider || data.source_provider || data.jenis_api || data.api_type || data.sumber_api)) || 'KHFY'
            ).trim().toUpperCase();
            if (raw.includes('KHFY')) return 'KHFY';
            if (raw.includes('ICS')) return 'ICS';
            if (raw.includes('KAJE')) return 'KAJE';
            if (raw.includes('MRF')) return 'MRF';
            if (raw.includes('OKECONECT') || raw.includes('OKE')) return 'OKECONECT';
            return raw || 'KHFY';
        };
        
        window.cleanPOPlainObject = function(obj) {
            const out = {};
            Object.keys(obj || {}).forEach(function(k) {
                const v = obj[k];
                if (typeof v === 'undefined' || typeof v === 'function') return;
                if (v && typeof v === 'object' && typeof v.toDate === 'function') {
                    out[k] = v.toDate().toISOString();
                    return;
                }
                out[k] = v;
            });
            return out;
        };
        
        window.pickPOFirst = function(obj, keys, fallback) {
            obj = obj || {};
            for (const key of keys) {
                if (obj[key] !== undefined && obj[key] !== null && String(obj[key]).trim() !== '') return obj[key];
            }
            return fallback || '';
        };
        
        window.safePOPathSegment = function(value, fallback) {
            let text = String(value || fallback || 'unknown').trim();
            text = text.replace(/#/g, '').replace(/[\/\\\0]/g, '-').replace(/\.\./g, '-');
            text = text.replace(/[^a-zA-Z0-9_\-.@]/g, '-').replace(/-+/g, '-').replace(/^[-_.]+|[-_.]+$/g, '');
            return (text || fallback || 'unknown').slice(0, 120);
        };
        
        window.preparePOJsonPayload = function(payload, eventType) {
            const base = window.cleanPOPlainObject(payload || {});
            const uid = window.pickPOFirst(base, ['uid','user_uid','userId','user_id','firebase_uid','owner_uid'], (window.auth && window.auth.currentUser && window.auth.currentUser.uid) || '');
            const trxId = window.pickPOFirst(base, ['idDoc','docId','doc_id','id_doc','firestore_doc_id','user_history_doc_id','history_doc_id','transaction_id','id_transaksi','idTransaksi','trx_id','trxid','reffid_aktif','reffid','refid','ref_id','order_id'], '');
            const finalUid = window.safePOPathSegment(uid, 'unknown_uid');
            const finalTrx = window.safePOPathSegment(trxId || ('PO-' + Date.now()), 'unknown_transaction');
            const rawResponse = base.latest_raw_response || base.raw_response || base.raw_provider_response || base.last_server_response || base.server_response || base.run_response || base.api_response || null;
            const rawText = base.latest_raw_response_text || base.raw_json || window.safeJsonStringifyPO(rawResponse || base);
        
            base.uid = finalUid;
            base.idDoc = base.idDoc || finalTrx;
            base.doc_id = base.doc_id || finalTrx;
            base.user_history_doc_id = base.user_history_doc_id || finalTrx;
            base.firestore_doc_id = base.firestore_doc_id || finalTrx;
            base.transaction_id = base.transaction_id || finalTrx;
            base.id_transaksi = base.id_transaksi || finalTrx;
            base.is_po = true;
            base.source = base.source || 'index';
            base.sync_from = 'index';
            base.synced_at_ms = Date.now();
            base.updated_at = base.updated_at || new Date().toISOString();
            base.latest_raw_response = rawResponse;
            base.latest_raw_response_text = rawText;
            base.raw_response = rawResponse;
            base.raw_json = rawText;
            base.last_server_response = rawResponse;
            base.last_response_at = base.last_response_at || new Date().toISOString();
        
            return {
                event_type: eventType || base.event_type || 'UPSERT',
                uid: finalUid,
                idDoc: finalTrx,
                transaction_id: finalTrx,
                id_transaksi: finalTrx,
                response_file: '/preorder/' + finalUid + '/' + finalTrx + '/respon.json',
                data_file: '/preorder/' + finalUid + '/' + finalTrx + '/data.json',
                latest_raw_response: rawResponse,
                latest_raw_response_text: rawText,
                data: base
            };
        };
        
        window.syncUpsertPOJson = async function(payload, eventType) {
            try {
                if (!payload) return { success:false, skipped:true, message:'Payload PO kosong' };
                const cleanPayload = window.preparePOJsonPayload(payload, eventType || payload.event_type || 'UPSERT');
        
                const res = await fetch(window.PO_DATAPO_API_URL + '?action=upsert', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify(cleanPayload)
                });
        
                const json = await res.json().catch(() => ({ success:false, message:'Response api_datapo bukan JSON valid' }));
                if (!res.ok || !json.success) {
                    console.warn('[DATAPO UPSERT GAGAL]', json);
                } else {
                    console.log('[DATAPO UPSERT OK]', cleanPayload.uid + '/' + cleanPayload.id_transaksi + ' data.json + respon.json', json);
                }
                return json;
            } catch(e) {
                console.warn('[DATAPO UPSERT ERROR]', e);
                return { success:false, message:e.message };
            }
        };
        
        window.syncDeletePOJson = async function(payload) {
            try {
                if (!payload) return { success:false, skipped:true, message:'Payload hapus PO kosong' };
        
                const cleanPayload = window.preparePOJsonPayload(Object.assign({}, payload, {
                    status: payload.status || 'DIBATALKAN',
                    status_po: payload.status_po || 'DIBATALKAN',
                    po_active: false,
                    is_po: true,
                    cancel_from: payload.cancel_from || 'index',
                    deleted_reason: payload.reason || payload.deleted_reason || 'PO dibatalkan/dihapus dari index'
                }), payload.event_type || 'CANCEL');
        
                const res = await fetch(window.PO_DATAPO_API_URL + '?action=delete', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify(cleanPayload)
                });
        
                const json = await res.json().catch(() => ({ success:false, message:'Response hapus api_datapo bukan JSON valid' }));
                if (!res.ok || !json.success) {
                    console.warn('[DATAPO DELETE GAGAL]', json);
                } else {
                    console.log('[DATAPO DELETE OK]', cleanPayload.uid + '/' + cleanPayload.id_transaksi, json);
                }
                return json;
            } catch(e) {
                console.warn('[DATAPO DELETE ERROR]', e);
                return { success:false, message:e.message };
            }
        };
        
        
        // PATCH DONI: Sistem Foto Profil User (hosting /profil/username.jpg)
        window.PROFILE_IMAGE_API = window.PROFILE_IMAGE_API || '/profil/api_gambar.php';
        window.profileFallbackAvatar = window.profileFallbackAvatar || 'https://ui-avatars.com/api/?name=User&background=7f1d1d&color=fff&size=128';
        window.currentUserProfileData = window.currentUserProfileData || null;
        
        window.profileSafeUsername = function(raw) {
            return String(raw || 'user')
                .trim()
                .toLowerCase()
                .replace(/\s+/g, '_')
                .replace(/[^a-z0-9._-]/g, '_')
                .replace(/_+/g, '_')
                .replace(/^_+|_+$/g, '') || 'user';
        };
        
        window.getProfileUsername = function(data, user) {
            const emailName = user && user.email ? user.email.split('@')[0] : '';
            return window.profileSafeUsername((data && (data.username || data.nama)) || emailName || (user && user.uid) || 'user');
        };
        
        window.getProfilePhotoUrl = function(username) {
            return '/profil/' + encodeURIComponent(window.profileSafeUsername(username)) + '.jpg?v=' + Date.now();
        };
        
        window.refreshProfilePhotoUI = function(username, useCacheBust = true) {
            const safe = window.profileSafeUsername(username || window.getProfileUsername(window.currentUserProfileData, window.auth && window.auth.currentUser));
            const url = '/profil/' + encodeURIComponent(safe) + '.jpg' + (useCacheBust ? ('?v=' + Date.now()) : '');
            ['headerProfilePhoto', 'profProfilePhoto'].forEach((id) => {
                const img = document.getElementById(id);
                if (!img) return;
                img.onerror = function() {
                    this.onerror = null;
                    this.src = window.profileFallbackAvatar;
                };
                img.src = url;
            });
        };
        
        window.compressImageBeforeUpload = function(file, maxBytes = 1048576) {
            return new Promise((resolve, reject) => {
                if (!file || !file.type || !file.type.startsWith('image/')) {
                    reject(new Error('File harus berupa gambar.'));
                    return;
                }
        
                const reader = new FileReader();
                reader.onerror = () => reject(new Error('Gagal membaca file gambar.'));
                reader.onload = () => {
                    const img = new Image();
                    img.onerror = () => reject(new Error('Gambar tidak valid atau rusak.'));
                    img.onload = async () => {
                        let maxSide = 1400;
                        let width = img.width;
                        let height = img.height;
                        const scale = Math.min(1, maxSide / Math.max(width, height));
                        width = Math.max(1, Math.round(width * scale));
                        height = Math.max(1, Math.round(height * scale));
        
                        const canvas = document.createElement('canvas');
                        const ctx = canvas.getContext('2d', { alpha: false });
                        let quality = 0.88;
        
                        const makeBlob = () => new Promise((res) => {
                            canvas.toBlob(res, 'image/jpeg', quality);
                        });
        
                        for (let attempt = 0; attempt < 10; attempt++) {
                            canvas.width = width;
                            canvas.height = height;
                            ctx.fillStyle = '#ffffff';
                            ctx.fillRect(0, 0, width, height);
                            ctx.drawImage(img, 0, 0, width, height);
        
                            const blob = await makeBlob();
                            if (!blob) {
                                reject(new Error('Browser gagal mengompres gambar.'));
                                return;
                            }
        
                            if (blob.size <= maxBytes || (quality <= 0.46 && Math.max(width, height) <= 700)) {
                                resolve(new File([blob], 'profile.jpg', { type: 'image/jpeg' }));
                                return;
                            }
        
                            if (quality > 0.50) {
                                quality -= 0.08;
                            } else {
                                width = Math.max(420, Math.round(width * 0.82));
                                height = Math.max(420, Math.round(height * 0.82));
                                quality = 0.72;
                            }
                        }
        
                        const finalBlob = await makeBlob();
                        resolve(new File([finalBlob], 'profile.jpg', { type: 'image/jpeg' }));
                    };
                    img.src = reader.result;
                };
                reader.readAsDataURL(file);
            });
        };
        
        window.uploadProfilePhotoFile = async function(file, username, user, requiredMode = false) {
            const safeUsername = window.profileSafeUsername(username);
            const activeUser = user || (window.auth && window.auth.currentUser);
            if (!activeUser) throw new Error('Sesi login tidak ditemukan.');
            if (!file) throw new Error('Pilih foto profil terlebih dahulu.');
            if (!file.type || !file.type.startsWith('image/')) throw new Error('File harus berupa gambar.');
        
            const uploadFile = await window.compressImageBeforeUpload(file, 1048576);
            const fd = new FormData();
            fd.append('action', 'upload');
            fd.append('username', safeUsername);
            fd.append('uid', activeUser.uid || '');
            fd.append('foto', uploadFile, 'profile.jpg');
        
            const resp = await fetch(window.PROFILE_IMAGE_API, {
                method: 'POST',
                body: fd,
                cache: 'no-store'
            });
        
            let result = null;
            try { result = await resp.json(); } catch(err) {}
            if (!resp.ok || !result || result.status !== true) {
                throw new Error((result && result.message) ? result.message : 'Upload foto gagal. Pastikan profil/api_gambar.php sudah terpasang.');
            }
        
            await setDoc(doc(db, "users", activeUser.uid), {
                fotoProfil: true,
                fotoProfilPath: result.url || ('/profil/' + safeUsername + '.jpg'),
                fotoProfilUpdatedAt: serverTimestamp()
            }, { merge: true });
        
            window.currentUserProfileData = Object.assign({}, window.currentUserProfileData || {}, {
                fotoProfil: true,
                fotoProfilPath: result.url || ('/profil/' + safeUsername + '.jpg')
            });
        
            window.refreshProfilePhotoUI(safeUsername, true);
            if (requiredMode) window.hideProfilePhotoModal();
            return result;
        };
        
        window.previewRegPhoto = function(input) {
            const file = input && input.files && input.files[0];
            const img = document.getElementById('regFotoPreview');
            if (!file || !img) return;
            if (!file.type.startsWith('image/')) {
                alert('File harus berupa gambar.');
                input.value = '';
                return;
            }
            img.src = URL.createObjectURL(file);
        };
        
        window.showProfilePhotoModal = function(username) {
            window.pendingProfileUsername = window.profileSafeUsername(username || window.getProfileUsername(window.currentUserProfileData, window.auth && window.auth.currentUser));
            const modal = document.getElementById('profilePhotoRequiredModal');
            if (modal) {
                modal.style.display = 'flex';
                document.body.style.overflow = 'hidden';
            }
        };
        
        window.hideProfilePhotoModal = function() {
            const modal = document.getElementById('profilePhotoRequiredModal');
            if (modal) modal.style.display = 'none';
            document.body.style.overflow = '';
        };
        
        window.checkRequiredProfilePhoto = async function(user, data) {
            const safeUsername = window.getProfileUsername(data, user);
            window.refreshProfilePhotoUI(safeUsername, true);
            try {
                const resp = await fetch(window.PROFILE_IMAGE_API + '?action=check&username=' + encodeURIComponent(safeUsername) + '&t=' + Date.now(), { cache: 'no-store' });
                const result = await resp.json();
                if (result && result.status === true && result.exists === true) {
                    if (!data || data.fotoProfil !== true) {
                        await setDoc(doc(db, "users", user.uid), {
                            fotoProfil: true,
                            fotoProfilPath: result.url || ('/profil/' + safeUsername + '.jpg'),
                            fotoProfilUpdatedAt: serverTimestamp()
                        }, { merge: true });
                    }
                    window.hideProfilePhotoModal();
                    window.refreshProfilePhotoUI(safeUsername, true);
                    return true;
                }
            } catch(e) {
                console.warn('Cek foto profil gagal:', e);
            }
            window.showProfilePhotoModal(safeUsername);
            return false;
        };
        
        window.handleRequiredProfilePhotoInput = async function(input) {
            const file = input && input.files && input.files[0];
            const btn = document.getElementById('btnUploadRequiredPhoto');
            const preview = document.getElementById('requiredPhotoPreview');
            if (!file) return;
            if (preview) preview.src = URL.createObjectURL(file);
        
            const old = btn ? btn.innerHTML : '';
            try {
                if (btn) {
                    btn.disabled = true;
                    btn.innerHTML = '<i class="fas fa-circle-notch fa-spin"></i> Mengupload...';
                }
                const user = window.auth && window.auth.currentUser;
                const username = window.pendingProfileUsername || window.getProfileUsername(window.currentUserProfileData, user);
                await window.uploadProfilePhotoFile(file, username, user, true);
                if (window.showNotice) window.showNotice('success', 'Berhasil', 'Foto profil berhasil disimpan.');
                else alert('Foto profil berhasil disimpan.');
            } catch(e) {
                if (window.showNotice) window.showNotice('error', 'Upload Gagal', e.message);
                else alert(e.message);
                input.value = '';
            } finally {
                if (btn) {
                    btn.disabled = false;
                    btn.innerHTML = old || '<i class="fas fa-upload"></i> Upload Foto Sekarang';
                }
            }
        };
        
        window.handleProfilePhotoChange = async function(input) {
            const file = input && input.files && input.files[0];
            if (!file) return;
            try {
                const user = window.auth && window.auth.currentUser;
                const username = window.getProfileUsername(window.currentUserProfileData, user);
                await window.uploadProfilePhotoFile(file, username, user, false);
                if (window.showNotice) window.showNotice('success', 'Berhasil', 'Foto profil berhasil diperbarui.');
                else alert('Foto profil berhasil diperbarui.');
            } catch(e) {
                if (window.showNotice) window.showNotice('error', 'Upload Gagal', e.message);
                else alert(e.message);
            } finally {
                input.value = '';
            }
        };
        
        
        window.kirimNotifTelegram = async function(tipe, data) {
            try {
                if (tipe === 'transaksi' || tipe === 'preorder' || tipe === 'topup') {
                    const token = "8834593783:AAH5J5hjQhBfjGeYPfgIt56Vg0XQrZ-POds";
                    const chatId = "-1004272714909";
                    const fmt = (v) => new Intl.NumberFormat('id-ID').format(v || 0);
                    
                    const maskTujuan = (val) => {
                        let s = String(val || '').trim();
                        if (s.length <= 7) return s;
                        if (/^[0-9+]+$/.test(s)) {
                            return s.slice(0, 7) + '*'.repeat(s.length - 7);
                        }
                        return s.slice(0, Math.ceil(s.length / 2)) + '*'.repeat(s.length - Math.ceil(s.length / 2));
                    };

                    const maskTrxId = (idStr, cleanHp) => {
                        let s = String(idStr || '').trim();
                        if (!s) return '-';
                        if (cleanHp && s.includes(cleanHp)) {
                            s = s.replace(cleanHp, maskTujuan(cleanHp));
                        }
                        if (s.length >= 2) {
                            return '**' + s.slice(2);
                        }
                        return '*'.repeat(s.length);
                    };

                    const getFormattedTime = () => {
                        const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
                        const d = new Date();
                        const day = String(d.getDate()).padStart(2, '0');
                        const month = months[d.getMonth()];
                        const year = d.getFullYear();
                        const hours = String(d.getHours()).padStart(2, '0');
                        const minutes = String(d.getMinutes()).padStart(2, '0');
                        const seconds = String(d.getSeconds()).padStart(2, '0');
                        return day + " " + month + " " + year + " | " + hours + "." + minutes + "." + seconds;
                    };

                    const maskedTujuan = maskTujuan(data.tujuan || data.username || 'User');
                    const maskedTrxId = maskTrxId(data.trx_id, data.tujuan);
                    const formattedTime = getFormattedTime();
                    let text = "";

                    if (tipe === 'transaksi') {
                        text = "✅ <b>TRANSAKSI BERHASIL</b>\n━━━━━━━━━━━━━━━━━━\n📦 Produk : <b>" + (data.produk || '-') + "</b>\n🎯 Tujuan : <code>" + maskedTujuan + "</code>\n💸 Harga : <b>Rp" + fmt(data.harga) + "</b>\n🕒 Waktu : <b>" + formattedTime + "</b>\n👤 User : <b>" + (data.username || '-') + "</b>\n🆔 ID Transaksi : <code>" + maskedTrxId + "</code>\n━━━━━━━━━━━━━━━━━━\n🎉 Pesanan Anda telah berhasil diproses.\nTerima kasih atas kepercayaan Anda menggunakan layanan kami.\nhttps://www.bhuleemarket.store";
                    } else if (tipe === 'topup') {
                        text = "✅ <b>TOPUP SALDO BERHASIL</b>\n━━━━━━━━━━━━━━━━━━\n👤 User : <b>" + (data.username || '-') + "</b>\n💰 Jumlah : <b>Rp" + fmt(data.harga) + "</b>\n🕒 Waktu : <b>" + formattedTime + "</b>\n🆔 ID Transaksi : <code>" + maskedTrxId + "</code>\n━━━━━━━━━━━━━━━━━━\n🎉 Topup berhasil diproses dan saldo telah bertambah.\nhttps://www.bhuleemarket.store";
                    } else if (tipe === 'preorder') {
                        text = "📥 <b>PRE-ORDER BARU</b>\n━━━━━━━━━━━━━━━━━━\n📦 Produk : <b>" + (data.produk || '-') + "</b>\n🎯 Tujuan : <code>" + maskedTujuan + "</code>\n💸 Harga : <b>Rp" + fmt(data.harga) + "</b>\n🕒 Waktu : <b>" + formattedTime + "</b>\n👤 User : <b>" + (data.username || '-') + "</b>\n🆔 ID Transaksi : <code>" + maskedTrxId + "</code>\n━━━━━━━━━━━━━━━━━━\n🎉 Pesanan Pre-Order berhasil masuk antrian sistem.\nhttps://www.bhuleemarket.store";
                    }

                    await fetch("https://api.telegram.org/bot" + token + "/sendMessage", {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/json' },
                        body: JSON.stringify({
                            chat_id: chatId,
                            text: text,
                            parse_mode: 'HTML'
                        })
                    });
                } else {
                    await fetch(window.TELEGRAM_API_URL, {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/json' },
                        body: JSON.stringify({ action: 'notify', tipe: tipe, data: data || {} })
                    });
                }
            } catch (e) {
                console.log('Telegram Notify Error:', e);
            }
        };
        /*
            try {
                await fetch(window.TELEGRAM_API_URL, {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ action: 'notify', tipe: tipe, data: data || {} })
                });
            } catch (e) {
                console.log('Telegram Notify Error:', e);
            }
        };
        
        */
        window.batalkanTopupTelegram = async function(uid, docId, reason) {
            try {
                if (!uid || !docId) return;
                await fetch(window.TELEGRAM_API_URL, {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ action: 'manual_cancel', uid: uid, docId: docId, reason: reason || 'Dibatalkan' })
                });
            } catch (e) {
                console.log('Telegram Cancel Error:', e);
            }
        };
        
        
        window.terimaTopupTelegramIndopay = async function(uid, docId) {
            try {
                if (!uid || !docId) return;
                await fetch(window.TELEGRAM_API_URL, {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ action: 'manual_accept_indopay', uid: uid, docId: docId })
                });
            } catch (e) {
                console.log('Telegram Indopay Accept Error:', e);
            }
        };
        
        
        // --- DEFINISI FETCH CONFIG TERPUSAT ---
        window.getMarkupValue = (val, basePrice) => {
        if (!val) return 0;
        let sVal = String(val).trim();
        if (sVal.includes('%')) {
            let percent = parseFloat(sVal.replace('%', '').replace(',', '.')) || 0;
            return Math.ceil(basePrice * (percent / 100));
        }
        return parseInt(sVal.replace(/[^0-9-]/g, '')) || 0;
            };
        
            // PATCH DONI: Sinkron mode PPOB/Akrab dari paneladmin lewat ppob/ppobseting.json
            window.ppobModeSetting = { mode: 'ppob', isAkrab: false, raw: {} };
        
            window.isPpobSettingAkrab = function(data) {
                data = data || {};
                const rawCandidates = [
                    data.mode,
                    data.ppobMode,
                    data.activeMode,
                    data.aktifMode,
                    data.modeAktif,
                    data.modeAkrab,
                    data.akrabMode,
                    data.slidingAkrab,
                    data.isAkrab,
                    data.akrab
                ];
        
                return rawCandidates.some(function(v) {
                    if (v === true || v === 1) return true;
                    const s = String(v == null ? '' : v).trim().toLowerCase();
                    return ['akrab', 'mode akrab', 'sliding akrab', 'true', '1', 'on', 'aktif', 'active', 'yes', 'ya'].includes(s);
                });
            };
        
            window.applyPpobAkrabMode = async function(forceData) {
                let data = forceData || null;
        
                if (!data) {
                    try {
                        const res = await fetch('ppob/ppobseting.json?v=' + Date.now(), { cache: 'no-store' });
                        if (res.ok) {
                            data = await res.json();
                        }
                    } catch (e) {
                        console.warn('Setting PPOB/Akrab tidak terbaca, index memakai mode PPOB normal.', e);
                    }
                }
        
                const isAkrab = window.isPpobSettingAkrab(data || {});
                window.ppobModeSetting = {
                    mode: isAkrab ? 'akrab' : 'ppob',
                    isAkrab: isAkrab,
                    raw: data || {}
                };
        
                if (document.body) {
                    document.body.classList.toggle('ppob-akrab-mode', isAkrab);
                }
        
                const mainGrid = document.getElementById('mainPpobMenuGrid');
                const drawer = document.getElementById('menuDrawer');
                const more = document.getElementById('btnMoreContainer');
                const akrabWrap = document.getElementById('menuAkrabAll');
                const akrabFilter = document.getElementById('inlineAkrabFilter');
                const akrabList = document.getElementById('inlineAkrabList');
        
                if (mainGrid) mainGrid.style.display = isAkrab ? 'none' : '';
                if (drawer) {
                    drawer.style.display = isAkrab ? 'none' : '';
                    if (isAkrab) drawer.classList.remove('expanded');
                }
                if (more) more.style.display = isAkrab ? 'none' : '';
        
                if (akrabWrap) {
                    akrabWrap.style.display = 'block';
        
                    if (isAkrab) {
                        akrabWrap.classList.add('open');
                        window.inlineAkrabMode = true;
        
                        if (!window.inlineAkrabLoaded && typeof window.loadGabunganData === 'function') {
                            window.inlineAkrabLoaded = true;
                            if (akrabFilter) akrabFilter.innerHTML = '';
                            if (akrabList) {
                                akrabList.innerHTML = "<div class='inline-akrab-empty'><i class='fas fa-circle-notch fa-spin'></i><br>Memuat semua Paket Akrab...</div>";
                            }
        
                            try {
                                await window.loadGabunganData();
                            } catch (e) {
                                console.error('Gagal auto load Paket Akrab mode Akrab:', e);
                                window.inlineAkrabLoaded = false;
                            }
                        }
                    }
                }
        
                return window.ppobModeSetting;
            };
        
            document.addEventListener('DOMContentLoaded', function() {
                if (typeof window.applyPpobAkrabMode === 'function') {
                    window.applyPpobAkrabMode();
                }
            });
        
        
        
            window.fetchConfig = async function() {
            try {
                if(!window.db) return;
                const d = await getDoc(doc(window.db, "pengaturan", "config"));
                if(d.exists()) {
                    window.whatsappAdmin = d.data().wa || "628xxx";
                    window.isTopupAuto = false;
        
                    window.hidePoAkrab = d.data().hidePoAkrab;
                    window.maintenanceAkrabSpesial = d.data().maintenanceAkrabSpesial;
                    window.maintenanceQris = d.data().maintenanceQris;
                    window.maintenanceQrisGopay = d.data().maintenanceQrisGopay;
                    window.maintenanceGopayTf = d.data().maintenanceGopayTf;
                    window.maintenanceTotal = d.data().maintenanceTotal;
                    if (window.applyMaintenanceTotalLock && window.auth && window.auth.currentUser) {
                        window.applyMaintenanceTotalLock(window.auth.currentUser);
                    }
                    
                    const elAkrab = document.getElementById('menuAkrabAll');
                    if (elAkrab) elAkrab.style.display = d.data().hideAkrabAll ? 'none' : 'block';
                    
                    const elPo = document.getElementById('menuPoAkrab');
                    if (elPo) elPo.style.display = d.data().hidePoAkrab ? 'none' : 'block';
        
                    // --- SISTEM VERSI DAN CACHE (DISEMPURNAKAN) ---
                    const serverVersion = d.data().appVersion || "";
                    if (serverVersion) {
                        const localVersion = localStorage.getItem('appVersion');
                        if (localVersion !== serverVersion) {
                            const urlParams = new URLSearchParams(window.location.search);
                            if (urlParams.get('v') !== serverVersion) {
                                // Paksa ambil file baru dari server dengan parameter versi
                                urlParams.set('v', serverVersion);
                                window.location.href = window.location.pathname + '?' + urlParams.toString();
                                return;
                            } else {
                                // Jika URL sudah berubah dan berhasil dimuat, baru simpan versi ke lokal
                                localStorage.setItem('appVersion', serverVersion);
                            }
                        }
                    }
                    // ------------------------------
                }
                
                try {
                    const mRes = await fetch('markup/cachemarkup.json?v=' + new Date().getTime());
                    const mData = await mRes.json();
                    window.markupConfig = { General: 0 };
                    window.markupConfigArray = mData;
                    mData.forEach(item => {
                        if(item.kode_produk) window.markupConfig[item.kode_produk] = item.markup;
                        if(item.nama_produk) window.markupConfig[item.nama_produk] = item.markup;
                    });
                    console.log("Markup Cache Loaded Berhasil");
                } catch(e) { console.log("Gagal load cachemarkup.json", e); }
            } catch(e) { console.error("Config Error:", e); }
        };
        
        window.isAdminUser = function(user) {
            return user && (user.email === 'doni888855519@gmail.com' || user.email === 'suwarno8797@gmail.com');
        };
        
        window.isMaintenanceOn = function(value) {
            return value === true || value === 'true' || value === 1 || value === '1' || value === 'YA' || value === 'ya' || value === 'yes';
        };
        
        window.blockMaintenanceTopupMethod = function(method, user) {
            if (!method) return false;
        
            const code = String(method.code || method.id || '').toUpperCase();
            const name = String(method.name || '').toUpperCase();
        
            const isQrisGopay = code === 'QRIS_GOPAY' || code === 'QRISGOPAY' || name.includes('QRIS GOPAY');
            const isGopayTf = code === 'GOPAY_TF' || code === 'GOPAYTF' || name.includes('TRANSFER GOPAY');
        
            if (isQrisGopay && window.isMaintenanceOn(window.maintenanceQrisGopay)) {
                window.showNotice('error', 'Maintenance', 'Mohon maaf, metode QRIS GoPay Otomatis sedang dalam perbaikan. Silakan gunakan metode topup lain.');
                return true;
            }
        
            if (isGopayTf && window.isMaintenanceOn(window.maintenanceGopayTf)) {
                window.showNotice('error', 'Maintenance', 'Mohon maaf, metode Transfer GoPay Otomatis sedang dalam perbaikan. Silakan gunakan metode topup lain.');
                return true;
            }
        
            return false;
        };
        
        window.applyMaintenanceTotalLock = function(user) {
            const oldLock = document.getElementById('maintenanceTotalOverlay');
            if (oldLock) oldLock.remove();
        
            if (!window.isMaintenanceOn(window.maintenanceTotal)) {
                document.body.style.overflow = '';
                return false;
            }
        
            const lock = document.createElement('div');
            lock.id = 'maintenanceTotalOverlay';
            lock.style.cssText = 'position:fixed; inset:0; z-index:999999999; background:linear-gradient(135deg,#7f1d1d,#dc2626); display:flex; align-items:center; justify-content:center; padding:22px; box-sizing:border-box; color:white; text-align:center; pointer-events:auto;';
            lock.innerHTML = `
                <div style="width:100%; max-width:420px; background:rgba(255,255,255,0.12); border:1px solid rgba(255,255,255,0.22); border-radius:26px; padding:28px 22px; box-shadow:0 20px 60px rgba(0,0,0,0.28); backdrop-filter:blur(12px);">
                    <div style="width:76px; height:76px; border-radius:50%; background:rgba(255,255,255,0.18); display:flex; align-items:center; justify-content:center; margin:0 auto 18px; font-size:34px;"><i class="fas fa-tools"></i></div>
                    <h2 style="margin:0 0 10px; font-size:24px; font-weight:900; letter-spacing:-0.5px;">Website Sedang Maintenance</h2>
                    <p style="margin:0; font-size:14px; line-height:1.7; opacity:0.95;">Mohon maaf, layanan sedang dalam pemeliharaan total. Untuk sementara website tidak dapat digunakan.</p>
                    <div style="margin-top:18px; font-size:12px; opacity:0.8;">Silakan coba kembali beberapa saat lagi.</div>
                </div>
            `;
            document.body.appendChild(lock);
            document.body.style.overflow = 'hidden';
            return true;
        };
        
        
        
        // AUTH LISTENER
        /* AUTH LISTENER */
                /* AUTH LISTENER DENGAN ANIMASI LOADING */
        onAuthStateChanged(auth, async (user) => {
            const authOverlay = document.getElementById('authOverlay');
            const mainContent = document.getElementById('mainAppContent');
            const loader = document.getElementById('globalLoader');
            const loaderText = document.querySelector('#globalLoader p');
        
            if (user) {
                                                // 1. ANIMASI TRANSISI (Tampilkan Loader dulu)
                authOverlay.style.display = "none";
                
                // Pastikan loader tampil & konten utama siap di background
                if(loader) {
                    loader.style.display = "flex";
                    loader.style.opacity = "1";
                    
                                                            // Hilangkan loader setelah 0.8 detik (Loading Cepat)
                    setTimeout(() => {
                        loader.style.opacity = "0";
                        setTimeout(() => { loader.style.display = "none"; }, 500);
                    }, 800);
                }
                mainContent.style.display = "block"; 
        
                // FIX: Paksa Tampil Elemen Home (Hard Force)
                // Ini memastikan Header & Saldo muncul meskipun navSwitch belum siap
                const h = document.querySelector('.header'); if(h) h.style.display = 'block';
                const s = document.querySelector('.saldo-box'); if(s) s.style.display = 'flex';
                const sh = document.getElementById('shop-container'); if(sh) sh.style.display = 'grid';
                const lh = document.getElementById('liveHistoryHeader'); if(lh) lh.style.display = 'flex';
        
                // Auto switch ke Home segera
                if(window.navSwitch) window.navSwitch('home', document.querySelector('.nav-item'));
        
                // 2. Load Data di Background
                await window.fetchConfig();
                if (window.applyMaintenanceTotalLock && window.applyMaintenanceTotalLock(user)) {
                    return;
                }
        
                // --- FIX: AUTO RECOVERY AKUN LAMA / DATA HILANG ---
                try {
                    const userRef = doc(db, "users", user.uid);
                    const userSnap = await getDoc(userRef);
                    if (!userSnap.exists()) {
                        await setDoc(userRef, {
                            username: user.displayName || (user.email ? user.email.split('@')[0] : "Pengguna"),
                            nama: user.displayName || "Pengguna",
                            whatsapp: "",
                            email: user.email || "",
                            saldo: 0,
                            createdAt: serverTimestamp()
                        });
                        console.log("Auto-recovery: Dokumen user berhasil dibuat.");
                    }
                } catch(e) { console.error("Gagal auto-recovery:", e); }
                // --------------------------------------------------
        
                loadUserBalance(user.uid);
        
                try {
                    const profileSnap = await getDoc(doc(db, "users", user.uid));
                    const profileData = profileSnap.exists() ? profileSnap.data() : {};
                    window.currentUserProfileData = profileData;
                    const profileUsername = window.getProfileUsername(profileData, user);
                    window.refreshProfilePhotoUI(profileUsername, true);
                    setTimeout(() => {
                        if (window.checkRequiredProfilePhoto) window.checkRequiredProfilePhoto(user, profileData);
                    }, 900);
                } catch(e) {
                    console.warn("Cek wajib foto profil gagal:", e);
                }
        
                
                // 3. Load Riwayat dengan sedikit delay agar render menu mulus
                setTimeout(() => {
                    initRiwayatListener(user);
                // Cek Siaran Masal
                window.checkBroadcast(user);
                }, 100);
                setTimeout(() => {
                    if(window.initTransferListener) window.initTransferListener(user);
                }, 500);
        
        
                // 4. --- AUDIT INTEGRITAS DONIGUARD (ASYNCHRONOUS BACKGROUND) ---
                // Dibungkus async IIFE agar tidak memblokir tampilan menu
                (async () => {
                    try {
                        const initialSnap = await window.getDoc(window.doc(window.db, "users", user.uid));
                        if(initialSnap.exists()) {
                            const currentSaldo = initialSnap.data().saldo || 0;
                            // Cek audit di background
                            const response = await fetch('doniguard.php', {
                                method: 'POST',
                                headers: { 'Content-Type': 'application/json' },
                                body: JSON.stringify({
                                    uid: user.uid,
                                    action: 'check',
                                    produk: 'AUDIT_LOGIN',
                                    nominal: 0,
                                    saldo_akhir_client: currentSaldo
                                })
                            });
                            const res = await response.json();
                            if (res.status === 'success' && res.audit && res.audit.force_sync === true) {
                                console.warn("DoniGuard: Mengoreksi Saldo");
                                await window.updateDoc(window.doc(window.db, "users", user.uid), {
                                    saldo: parseInt(res.audit.correct_balance)
                                });
                                // Hanya reload jika saldo dikoreksi
                                window.location.reload();
                            }
                        }
                    } catch(e) { console.log("Background Check Skipped"); }
                })();
        
            } else {
                // Mode Belum Login
                authOverlay.style.display = "flex";
                mainContent.style.display = "none";
                if(loader) loader.style.display = "none";
                const oldLock = document.getElementById('maintenanceTotalOverlay');
                if (oldLock) oldLock.remove();
                document.body.style.overflow = '';
            }
        });
        
        async function loadUserBalance(uid) {
            onSnapshot(doc(db, "users", uid), (d) => {
                if(d.exists()) {
                                        const data = d.data();
        
                    window.currentUserProfileData = data;
                    if (window.refreshProfilePhotoUI && window.getProfileUsername) {
                        window.refreshProfilePhotoUI(window.getProfileUsername(data, window.auth && window.auth.currentUser), false);
                    }
        
                    
                    // --- MODIFIKASI H2H DETECTOR ---
                    if (data.role === 'merchant_h2h') {
                        // Sembunyikan elemen B2C
                        const h = document.querySelector('.header'); if(h) h.style.display = 'none';
                        const s = document.querySelector('.saldo-box'); if(s) s.style.display = 'none';
                        const sh = document.getElementById('shop-container'); if(sh) sh.style.display = 'none';
                        const bn = document.querySelector('.bottom-nav'); if(bn) bn.style.display = 'none';
                        const fab = document.querySelector('.chat-fab'); if(fab) fab.style.display = 'none';
                        const dl = document.getElementById('appBanner'); if(dl) dl.style.display = 'none';
                        
                        // Tampilkan H2H Dashboard
                        const hDash = document.getElementById('h2hDashboard');
                        if(hDash) {
                            hDash.style.display = 'block';
                            document.getElementById('h2hName').innerText = data.username || data.nama || "Merchant H2H";
                            document.getElementById('h2hSaldo').innerText = "Rp " + new Intl.NumberFormat('id-ID').format(data.saldo || 0);
                            document.getElementById('h2hEmail').innerText = data.email || (window.auth && window.auth.currentUser ? window.auth.currentUser.email : "-");
                            document.getElementById('h2hPhone').innerText = data.whatsapp || "-";
                                                        document.getElementById('h2hApiKey').innerText = data.api_key || data.apikey || data.apiKey || "Belum ada API Key (Generate via Admin)";
                            document.getElementById('h2hJoin').innerText = data.createdAt ? new Date(data.createdAt.seconds * 1000).toLocaleDateString('id-ID') : "-";
                        }
                    } else {
                        // Tampilan Normal (B2C)
                        const bn = document.querySelector('.bottom-nav'); if(bn) bn.style.display = 'flex';
                        const fab = document.querySelector('.chat-fab'); if(fab) fab.style.display = data.chat_disabled ? 'none' : 'flex';
                    }
                    // -------------------------------
        
                    const saldoVal = document.getElementById('saldoValue');
                    if(saldoVal) saldoVal.innerText = "Rp " + new Intl.NumberFormat('id-ID').format(data.saldo || 0);
                    
                    const headName = document.getElementById('headerName');
                    if(headName) headName.innerText = data.username || data.nama || "Pengguna";
                }
            });
        }
        
        window.toggleAuth = (mode) => {
            document.getElementById('loginForm').style.display = mode === 'login' ? 'block' : 'none';
            document.getElementById('registerForm').style.display = mode === 'register' ? 'block' : 'none';
        };
        
                window.togglePassword = (id, el) => {
            const input = document.getElementById(id);
            if (input.type === "password") {
                input.type = "text";
                el.classList.remove("fa-eye");
                el.classList.add("fa-eye-slash");
                el.style.color = "var(--primary)";
            } else {
                input.type = "password";
                el.classList.remove("fa-eye-slash");
                el.classList.add("fa-eye");
                el.style.color = "#94a3b8";
            }
        };
        
        
        window.handleLogin = async () => {
            const email = document.getElementById('logEmail').value;
            const pass = document.getElementById('logPass').value;
            const btn = document.getElementById('btnLogin');
        
            if(!email || !pass) return window.showNotice('error', 'Peringatan', 'Mohon isi email dan password!');
            
            // Animasi Loading
            const oriHtml = btn.innerHTML;
            btn.innerHTML = '<i class="fas fa-circle-notch fa-spin"></i> Memuat...';
            btn.disabled = true;
            btn.style.opacity = '0.8';
            btn.style.cursor = 'not-allowed';
        
            try {
                await signInWithEmailAndPassword(auth, email, pass);
            } catch(e) {
                if (e.code === 'auth/invalid-credential' || e.code === 'auth/wrong-password' || e.code === 'auth/user-not-found' || e.code === 'auth/invalid-email') {
                window.showNotice('error', 'Login Gagal', 'Mohon periksa kembali email/password anda.');
            } else {
                window.showNotice('error', 'Login Gagal', e.message);
            }
                // Reset Tombol jika gagal
                btn.innerHTML = oriHtml;
                btn.disabled = false;
                btn.style.opacity = '1';
                btn.style.cursor = 'pointer';
            }
        };
        
        window.handleRegister = async () => {
            const username = document.getElementById('regUsername').value.trim();
            const nama = document.getElementById('regNama').value.trim();
            const wa = document.getElementById('regWA').value.trim();
            const email = document.getElementById('regEmail').value.trim();
            const pass = document.getElementById('regPass').value;
            const passConfirm = document.getElementById('regPassConfirm').value;
            const fotoInput = document.getElementById('regFoto');
            const fotoFile = fotoInput && fotoInput.files ? fotoInput.files[0] : null;
        
            if(!username || !nama || !wa || !email || !pass || !passConfirm || !fotoFile) return alert("Mohon lengkapi semua data termasuk foto profil!");
            if(!fotoFile.type || !fotoFile.type.startsWith('image/')) return alert("Foto profil harus berupa gambar JPG/PNG/WEBP!");
            
            // Validasi Email Domain (@gmail.com atau @yahoo.com)
            const emailRegex = /^[a-zA-Z0-9._%+-]+@(gmail\.com|yahoo\.com)$/;
            if(!emailRegex.test(email)) return alert("Hanya email @gmail.com atau @yahoo.com yang diizinkan!");
        
            // Validasi Password Match
            if(pass !== passConfirm) return alert("Konfirmasi kata sandi tidak cocok!");
            if(pass.length < 6) return alert("Kata sandi minimal 6 karakter!");
        
            try {
                const res = await createUserWithEmailAndPassword(auth, email, pass);
                await setDoc(doc(db, "users", res.user.uid), { 
                    username: username,
                    nama: nama, 
                    whatsapp: wa,
                    email: email, 
                    saldo: 0,
                    fotoProfil: false,
                    fotoProfilPath: "",
                    createdAt: serverTimestamp() 
                });
        
                await window.uploadProfilePhotoFile(fotoFile, username, res.user, false);
                alert("Registrasi Berhasil!");
            } catch(e) { alert("Gagal Daftar: " + e.message); }
        };
        
        window.handleResetPassword = () => {
            const email = document.getElementById('logEmail').value;
            if(!email) return alert("Masukkan email di kolom Login terlebih dahulu!");
            sendPasswordResetEmail(auth, email).then(() => alert("Link reset sandi dikirim ke email!")).catch(e => alert(e.message));
        };
        
        window.handleLogout = () => signOut(auth);
        
        window.handleGoogleLogin = async () => {
            const provider = new GoogleAuthProvider();
            try {
                const isApp = typeof AndroidShare !== 'undefined';
                if (isApp) {
                    await signInWithRedirect(auth, provider);
                } else {
                    const result = await signInWithPopup(auth, provider);
                    const user = result.user;
                    const userRef = doc(db, "users", user.uid);
                    const docSnap = await getDoc(userRef);
        
                    if (!docSnap.exists()) {
                        await setDoc(userRef, {
                            username: user.displayName || "User",
                            nama: user.displayName || "User",
                            whatsapp: "",
                            email: user.email,
                            saldo: 0,
                            createdAt: serverTimestamp()
                        });
                    }
                    window.showNotice('success', 'Berhasil', 'Selamat datang, ' + (user.displayName || 'Pengguna'));
                }
            } catch (error) {
                console.error("Google Login Error:", error);
                window.showNotice('error', 'Login Gagal', 'Gagal masuk dengan Google.');
            }
        };
        
                        window.allProductsData = []; window.currentProduct = {}; window.checkoutItem = null;
        
        // Listener Shop (Simpan Data, Render Home)
        onSnapshot(collection(db, "produk"), (snap) => {
            window.allProductsData = [];
            snap.forEach(d => {
                let data = d.data();
                data.id = d.id;
                window.allProductsData.push(data);
            });
            renderHomeShop();
        });
        
        window.renderHomeShop = () => {
            const div = document.getElementById('shop-container');
            const limit = 6;
            const displayData = window.allProductsData.slice(0, limit);
            
            let html = displayData.map(data => createProductCard(data)).join('');
            
            // Tombol Lihat Semua
            if(window.allProductsData.length > limit) {
                html += `<div style="grid-column: 1 / -1;"><div class="btn-see-more" onclick="navSwitch('shop_full')">Tampilkan Produk Lainnya <i class="fas fa-arrow-right"></i></div></div>`;
            }
            div.innerHTML = html;
        };
        
                window.renderFullShop = (dataOverride = null) => {
            const div = document.getElementById('fullShopContainer');
            const source = dataOverride || window.allProductsData;
            
            if(!source || source.length === 0) {
                 div.innerHTML = '<div style="grid-column:1/-1; text-align:center; padding:40px; color:#999;">Produk tidak ditemukan</div>';
                 return;
            }
            
                        div.innerHTML = source.map(data => {
                const isFisik = data.tipe === 'fisik' || (data.kategori && data.kategori.includes('FISIK'));
                const clickAction = isFisik 
                    ? `bukaDetailProduk('${data.id}')` 
                    : `siapkanInvoice('${data.kode || data.id}','${data.nama}',${data.harga})`;
                
                return `<div class="product-card" onclick="${clickAction}">
                    <img src="${data.img||'https://via.placeholder.com/150'}" style="width:100%; height:140px; object-fit:cover; background:#eee;">
                    <div class="product-info">
                        <div style="font-size:12px; font-weight:bold; margin-bottom:4px; line-height:1.2; height:28px; overflow:hidden;">${data.nama}</div>
                        <div style="font-size:13px; color:var(--primary); font-weight:bold;">Rp ${new Intl.NumberFormat('id-ID').format(data.harga)}</div>
                        ${isFisik ? `<div style="font-size:10px; color:#999; margin-top:2px;"><i class="fas fa-box"></i> Produk Fisik</div>` : ''}
                        <button class="btn-buy-shop" style="margin-top:8px;">Beli</button>
                    </div>
                </div>`;
            }).join('');
        };
        
        
        window.handleShopSearch = (keyword) => {
            if(!keyword) return renderFullShop();
            const lower = keyword.toLowerCase();
            const filtered = window.allProductsData.filter(p => p.nama.toLowerCase().includes(lower));
            renderFullShop(filtered);
        };
        
        
                function createProductCard(data) {
            // Deteksi tipe produk (Fisik atau Digital)
            const isFisik = data.tipe === 'fisik' || (data.kategori && data.kategori.includes('FISIK'));
            
            // Tentukan aksi klik: Buka Detail (Fisik) atau Invoice Digital
            const clickAction = isFisik 
                ? `bukaDetailProduk('${data.id}')` 
                : `siapkanInvoice('${data.kode || data.id}','${data.nama}',${data.harga})`;
        
            return `<div class="product-card" onclick="${clickAction}" style="cursor:pointer;">
                <img src="${data.img||'https://via.placeholder.com/150'}" style="width:100%; height:120px; object-fit:cover; background:#eee;">
                <div class="product-info">
                    <div>
                        <div style="font-size:12px; font-weight:bold; margin-bottom:4px; line-height:1.2; height:28px; overflow:hidden;">${data.nama}</div>
                        <div style="font-size:13px; color:var(--primary); font-weight:bold;">Rp ${new Intl.NumberFormat('id-ID').format(data.harga)}</div>
                        ${isFisik ? `<div style="font-size:9px; background:#eee; color:#555; display:inline-block; padding:2px 5px; border-radius:4px; margin-top:2px;"><i class="fas fa-box"></i> Barang Fisik</div>` : ''}
                    </div>
                    <div style="margin-top:8px;">
                        <button class="btn-buy-shop" style="width:100%; background:var(--bg); color:var(--primary); border:1px solid var(--primary); font-size:11px;">Beli</button>
                    </div>
                </div>
            </div>`;
        }
        
                        // Listener Riwayat Menu Utama (Hanya 10 Terbaru)
        let unsubscribeRiwayat = null;
        function initRiwayatListener(user) {
            if(unsubscribeRiwayat) unsubscribeRiwayat();
        
            const containerAwal = document.getElementById('riwayat-container');
            if(!user || !user.uid) {
                if(containerAwal) containerAwal.innerHTML = "<div class='history-empty-state'><i class='fas fa-user-clock'></i><b>Riwayat belum siap</b><span>Silakan tunggu akun selesai dimuat.</span></div>";
                return;
            }
            if(containerAwal) containerAwal.innerHTML = "<div class='history-empty-state'><i class='fas fa-circle-notch fa-spin'></i><b>Memuat riwayat</b><span>Sedang mengambil transaksi terbaru...</span></div>";
            
            const qRiwayat = query(collection(db, "users", user.uid, "riwayat_transaksi"), orderBy("timestamp", "desc"), limit(10));
            
            unsubscribeRiwayat = onSnapshot(qRiwayat, (snap) => {
                const container = document.getElementById('riwayat-container');
                let html = "";
                
                snap.forEach((docSnap) => {
                    const data = docSnap.data();
                                        const idDoc = docSnap.id;
        
                                        // LOGIKA BARU: AUTO-CEK STATUS PENDING (Topup & PPOB)
                                        if(data.status === 'PENDING') {
                        if(data.is_po === true && !(data.preorder_mode === 'mrf_direct' || data.local_preorder_queue === false)) {
                            // Transaksi Pre-Order (PO) dibiarkan PENDING menunggu Admin
                        } else if(data.kode_produk === 'TOPUP') {
                            // Cek Topup Saldo
                            if (data.metode === 'QRIS_AUTO') {
                                if(window.cekStatusQiospayBerkala) window.cekStatusQiospayBerkala(idDoc, data.harga);
                            } else if (data.metode === 'QRIS_GOPAY' || data.metode === 'GOPAY_TF') {
                                if(window.startIndopayChecker) window.startIndopayChecker(idDoc, data.harga);
                            } else {
                                if(window.cekStatusTopupBerkala) window.cekStatusTopupBerkala(idDoc, data.unique_code || data.trx_id);
                            }
                                                } else if (data.provider === 'ICS') {
                            if(window.monitorIcsTrx && !window['monitor_'+idDoc]) {
                                window['monitor_'+idDoc] = true;
                                window.monitorIcsTrx(data.trx_id, idDoc);
                            }
        
                        } else if (data.provider === 'KAJE' || (data.trx_id && data.trx_id.startsWith('KJ')) || (data.sn && data.sn.includes('#KJ'))) {
                            if(window.monitorKajeTrx && !window['monitor_'+idDoc]) {
                                window['monitor_'+idDoc] = true;
                                // Ambil ID KJ bersih (jika nyelip di SN)
                                let realKajeId = data.trx_id;
                                if(data.sn && data.sn.includes('#KJ')) {
                                    const parts = data.sn.split('#');
                                    if(parts.length > 1) realKajeId = parts[1].split(' ')[0].trim();
                                }
                                window.monitorKajeTrx(realKajeId, idDoc);
                            }
                        } else if (data.provider === 'MRF' || data.is_mrf === true || (data.trx_id && String(data.trx_id).startsWith('RF'))) {
                            // FIX DONI: MRF wajib auto-check ke mrf_proxy.php, jangan masuk cek_status.php umum.
                            if(window.monitorMrfTrx && !window['monitor_mrf_'+idDoc]) {
                                window['monitor_mrf_'+idDoc] = true;
                                window.monitorMrfTrx(data.trx_id, idDoc);
                            }
                        } else if (data.provider === 'KHFY') {
                            // FIX: Aktifkan monitoring Khfy jika halaman direfresh, tapi jangan hidupkan lagi jika sudah gagal/refund/unauthorized.
                            if(window.monitorKhfyTrx && !window['monitor_'+idDoc] && !(window.isKhfyMonitorBlocked && window.isKhfyMonitorBlocked(data))) {
                                window['monitor_'+idDoc] = true;
                                window.monitorKhfyTrx(data.trx_id, idDoc);
                            }
                        } else {
                            // Cek Transaksi Umum hanya untuk API utama/non-provider khusus.
                            if(window.cekStatusBerkala) window.cekStatusBerkala(idDoc, data.trx_id, data.tujuan, data.kode_produk);
                        }
                    }
                    let waktuStr = data.timestamp ? data.timestamp.toDate().toLocaleTimeString('id-ID').slice(0,5) : "";
                    const dataString = encodeURIComponent(JSON.stringify({idDoc, ...data, waktu: waktuStr}));
        
                    let historyIconHtml = renderHistoryIcon(data.produk || data.kategori || '');
        
                                        html += `<div class="history-card" id="card-${idDoc}">
                        <div class="area-chk-masal" style="display:none; margin-right:8px;">
                            <input type="checkbox" class="chk-masal" value="${encodeURIComponent(JSON.stringify(data))}" onchange="updateButtonMasal()" style="transform:scale(1.25); accent-color:var(--primary);">
                        </div>
                        <div class="h-tap-area" onclick="if(!window.isModeMasal) bukaDetailRiwayat('${dataString}')">
                            <div class="h-icon">${historyIconHtml}</div>
                            <div class="h-content">
                                <div class="h-prod">${data.produk}</div>
                                <div class="h-date"><i class="far fa-clock"></i> ${waktuStr} <span>&bull;</span> <i class="fas fa-bullseye"></i> ${data.tujuan}</div>
                            </div>
                            <div class="h-right">
                                <div class="h-price">Rp ${new Intl.NumberFormat('id-ID').format(data.harga)}</div>
                                <div class="h-badge bg-${data.status}">${data.status}</div>
                            </div>
                        </div>
                    </div>`;
                });
                container.innerHTML = html || "<div class='history-empty-state'><i class='fas fa-receipt'></i><b>Belum ada transaksi</b><span>Transaksi terbaru kamu akan muncul di sini.</span></div>";
            });
        }
        window.initRiwayatListener = initRiwayatListener;
        
                // SISTEM SEMUA RIWAYAT (FILTER, SEARCH & PAGINASI)
        let allRiwayatData = [];
        let filteredRiwayatData = [];
        let currentRiwayatPage = 1;
        const itemsPerPage = 10;
        
                window.bukaRiwayatArsip = async (force = false) => {
            const user = auth.currentUser;
            if(!user) return;
            document.getElementById('modalArsip').style.display = "flex";
            const area = document.getElementById('listArsipArea');
            if(allRiwayatData.length > 0 && !force) { window.terapkanFilterRiwayat(); return; }
            
            area.innerHTML = "<div style='text-align:center; padding:40px;'><i class='fas fa-circle-notch fa-spin' style='font-size:24px; color:var(--primary);'></i><p style='margin-top:10px;'>Menggabungkan Riwayat...</p></div>";
        
            try {
                allRiwayatData = [];
                // 1. Ambil Data Live (Firebase)
                const q = query(collection(db, "users", user.uid, "riwayat_transaksi"), orderBy("timestamp", "desc"));
                const snap = await getDocs(q);
                snap.forEach(d => {
                    let item = d.data();
                    item.idDoc = d.id; item.source = 'LIVE';
                    item.timestamp_str = item.timestamp ? item.timestamp.toDate().toISOString() : new Date().toISOString();
                    delete item.timestamp;
                    allRiwayatData.push(item);
                });
        
                // 2. Ambil Data Arsip (Hosting)
                try {
                    const res = await fetch(`api_riwayat.php?action=get_arsip&uid=${user.uid}`);
                    const arsip = await res.json();
                    if(arsip && arsip.data) {
                        arsip.data.forEach(item => { item.source = 'ARSIP'; allRiwayatData.push(item); });
                    }
                } catch(e) {}
        
                allRiwayatData.sort((a,b) => new Date(b.timestamp_str) - new Date(a.timestamp_str));
                window.terapkanFilterRiwayat();
            } catch(e) { area.innerHTML = "Gagal memuat riwayat."; }
        };
        
        window.refreshRiwayatArsip = () => {
            // Paksa download ulang
            window.bukaRiwayatArsip(true);
        };
        
        window.terapkanFilterRiwayat = () => {
            const keyword = document.getElementById('searchRiwayat').value.toLowerCase();
            const tgl = document.getElementById('filterTgl').value;
            const status = document.getElementById('filterStatus').value;
            
            filteredRiwayatData = allRiwayatData.filter(d => {
                // 1. Logika Search Cerdas
                const searchTarget = ( (d.produk||'') + ' ' + (d.tujuan||'') + ' ' + (d.trx_id||'') + ' ' + (d.sn||'') ).toLowerCase();
                const matchSearch = !keyword || searchTarget.includes(keyword);
                
                // 2. Logika Tanggal
                const dDate = d.timestamp_str ? d.timestamp_str.split('T')[0] : '';
                const matchDate = !tgl || dDate === tgl;
                
                // 3. Logika Status
                let matchStatus = true;
                if(status !== 'SEMUA') {
                    const s = (d.status || '').toUpperCase();
                    if(status === 'BERHASIL') matchStatus = (s === 'BERHASIL' || s === 'SUKSES');
                    else matchStatus = s === status;
                }
                
                return matchSearch && matchDate && matchStatus;
            });
            
            currentRiwayatPage = 1;
            renderRiwayatPage();
        };
        
        function renderRiwayatPage() {
            const area = document.getElementById('listArsipArea');
            const paginArea = document.getElementById('paginationRiwayat');
            
            if(filteredRiwayatData.length === 0) {
                area.innerHTML = "<div style='text-align:center; padding:40px; color:#94a3b8;'><i class='fas fa-search' style='font-size:30px; margin-bottom:10px; opacity:0.5;'></i><p>Tidak ada riwayat yang cocok.</p></div>";
                paginArea.innerHTML = "";
                return;
            }
        
            const totalPages = Math.ceil(filteredRiwayatData.length / itemsPerPage);
            const start = (currentRiwayatPage - 1) * itemsPerPage;
            const end = start + itemsPerPage;
            const pageData = filteredRiwayatData.slice(start, end);
        
            let html = "";
            pageData.forEach(d => {
                const dObj = d.timestamp_str ? new Date(d.timestamp_str) : new Date();
                const waktuStr = dObj.toLocaleString('id-ID');
                const dataString = encodeURIComponent(JSON.stringify({...d, waktu: waktuStr}));
                let badge = d.source === 'ARSIP' ? `<i class="fas fa-server" style="color:#94a3b8; font-size:10px; margin-left:5px;"></i>` : `<i class="fab fa-gripfire" style="color:#ff7675; font-size:10px; margin-left:5px;"></i>`;
        
                html += `<div class="history-card" onclick="bukaDetailRiwayat('${dataString}')" style="border-bottom:1px solid #f1f5f9; padding:8px 8px;">
                    <div class="h-content">
                        <div class="h-prod" style="font-size:9.5px;">${d.produk} ${badge}</div>
                        <div class="h-date" style="margin-top:2px;"><i class="far fa-clock"></i> ${waktuStr} • ${d.tujuan}</div>
                    </div>
                    <div class="h-right">
                        <div class="h-price">Rp ${new Intl.NumberFormat('id-ID').format(d.harga)}</div>
                        <div class="h-badge bg-${d.status}" style="margin-top:3px;">${d.status}</div>
                    </div>
                </div>`;
            });
        
            area.innerHTML = html;
        
            // Render Tombol Paginasi Pintar (Membatasi jumlah tombol jika halaman banyak)
            let paginHtml = "";
            let maxButton = 5;
            let startPage = Math.max(1, currentRiwayatPage - Math.floor(maxButton / 2));
            let endPage = Math.min(totalPages, startPage + maxButton - 1);
            
            if (endPage - startPage + 1 < maxButton) {
                startPage = Math.max(1, endPage - maxButton + 1);
            }
        
            if(startPage > 1) paginHtml += `<div class="page-num" onclick="window.keHalamanRiwayat(1)">1</div><span style='padding:5px; color:#999;'>...</span>`;
            
            for(let i=startPage; i<=endPage; i++) {
                paginHtml += `<div class="page-num ${i === currentRiwayatPage ? 'active' : ''}" onclick="window.keHalamanRiwayat(${i})">${i}</div>`;
            }
        
            if(endPage < totalPages) paginHtml += `<span style='padding:5px; color:#999;'>...</span><div class="page-num" onclick="window.keHalamanRiwayat(${totalPages})">${totalPages}</div>`;
            
            paginArea.innerHTML = paginHtml;
        }
        
        window.keHalamanRiwayat = (num) => {
            currentRiwayatPage = num;
            renderRiwayatPage();
            document.getElementById('listArsipArea').scrollTop = 0;
        };
        
        window.simpanKeFirestore = async function(trx, status, pesan, trxId, uid, username, rawJson) {
            try { 
                const docRef = await addDoc(collection(db, "users", uid, "riwayat_transaksi"), {  
                    uid: uid || "", username: username || "-", tujuan: trx.tujuan, produk: trx.nama_produk, 
                    kode_produk: trx.kode_produk, harga: trx.harga, status: status, sn: pesan, 
                    trx_id: trxId || "", raw_json: rawJson || "-", timestamp: serverTimestamp() 
                }); 
        
                if (status === "BERHASIL" || status === "SUKSES" || status === "Sukses") {
                    if (trx.kode_produk === "TOPUP") {
                        if (window.kirimNotifTelegram) window.kirimNotifTelegram('topup', { harga: trx.harga || 0, username: username || 'Pengguna', trx_id: trxId || docRef.id });
                    } else {
                        if (window.kirimNotifTelegram) window.kirimNotifTelegram('transaksi', { produk: trx.nama_produk || '-', tujuan: trx.tujuan || '-', harga: trx.harga || 0, username: username || 'Pengguna', trx_id: trxId || docRef.id });
                    }
                }
                                // PATCH DONI: Buku sekarang manual saja, transaksi digital tidak otomatis dicatat.
                
        // LOGIKA AUTO-ARSIP (Hot & Cold Storage)
                const qCek = query(collection(db, "users", uid, "riwayat_transaksi"), orderBy("timestamp", "desc"));
                const snap = await getDocs(qCek);
                if (snap.size > 20) {
                    let toArchive = [];
                    let toDelete = [];
                    let count = 0;
                    snap.forEach(d => {
                        count++;
                        if(count > 20) {
                            let data = d.data();
                            data.idDoc = d.id;
                            data.timestamp_str = data.timestamp ? data.timestamp.toDate().toISOString() : new Date().toISOString();
                            delete data.timestamp;
                            toArchive.push(data);
                            toDelete.push({ ref: d.ref, data: data, idDoc: d.id });
                        }
                    });
                    
                    if (toArchive.length > 0) {
                        fetch('api_riwayat.php?action=arsip_masal', {
                            method: 'POST',
                            headers: {'Content-Type': 'application/json'},
                            body: JSON.stringify({ uid: uid, data: toArchive })
                        }).then(res => res.json()).then(resData => {
                            if(resData.status === 'success') {
                                toDelete.forEach(item => {
                                    try {
                                        if (item && item.data && item.data.is_po === true && window.syncDeletePOJson) {
                                            window.syncDeletePOJson(Object.assign({}, item.data || {}, {
                                                uid: uid,
                                                idDoc: item.idDoc || item.data.idDoc || '',
                                                doc_id: item.idDoc || item.data.idDoc || '',
                                                user_history_doc_id: item.idDoc || item.data.idDoc || '',
                                                transaction_id: item.idDoc || item.data.idDoc || item.data.trx_id || '',
                                                id_transaksi: item.idDoc || item.data.idDoc || item.data.trx_id || '',
                                                trx_id: item.data.trx_id || '',
                                                status: item.data.status || 'DIARSIPKAN',
                                                status_po: item.data.status_po || item.data.status || 'DIARSIPKAN',
                                                po_active: false,
                                                event_type: 'ARCHIVE_FROM_INDEX',
                                                reason: 'Riwayat PO diarsipkan dari index'
                                            }));
                                        }
                                    } catch(syncErr) {
                                        console.warn('Gagal sync hapus PO dari hosting folder preorder saat arsip:', syncErr);
                                    }
                                    deleteDoc(item.ref || item);
                                });
                            }
                        }).catch(e => console.error("Arsip Error:", e));
                    }                }
                return docRef.id;
            } catch (e) { console.error("Firestore Error:", e); return ""; }  
        };
        
                
        
        // --- SYSTEM DONIGUARD HYBRID ---
        
                window.prosesKajeInternal = async (target, nominal, senderName, senderUid, idDoc) => {
            if(!idDoc || !target) return;
            try {
                const trxRef = window.doc(window.db, "users", senderUid, "riwayat_transaksi", idDoc);
                const trxSnap = await window.getDoc(trxRef);
                if (trxSnap.exists() && trxSnap.data().kaje_credited === true) return;
        
                let q = window.query(window.collection(window.db, 'users'), window.where('username', '==', target));
                let snap = await window.getDocs(q);
                if(snap.empty) {
                    q = window.query(window.collection(window.db, 'users'), window.where('email', '==', target));
                    snap = await window.getDocs(q);
                }
        
                if(!snap.empty) {
                    const tUid = snap.docs[0].id;
                    if (tUid === senderUid) return;
                    const tData = snap.docs[0].data();
                    const tRef = window.doc(window.db, 'users', tUid);
                    const tNewSaldo = (tData.saldo || 0) + parseInt(nominal);
        
                    await window.updateDoc(tRef, { saldo: tNewSaldo });
                    await window.addDoc(window.collection(window.db, 'users', tUid, 'riwayat_transaksi'), {
                        uid: tUid, username: tData.username || 'User', tujuan: senderName,
                        produk: 'Terima Saldo (KAJE)', kode_produk: 'TRANSFER', harga: parseInt(nominal),
                        status: 'BERHASIL', sn: 'Terima dari ' + senderName,
                        trx_id: 'KJIN' + Date.now(), timestamp: window.serverTimestamp()
                    });
                    
                    await window.updateDoc(trxRef, { kaje_credited: true });
        
                    if(window.triggerDoniGuard) {
                        window.triggerDoniGuard({
                            uid: tUid, email: tData.email, action: 'topup', 
                            produk: 'Terima Saldo KAJE dari ' + senderName,
                            nominal: parseInt(nominal), trx_id: 'KJIN' + Date.now(), saldo_akhir_client: tNewSaldo
                        });
                    }
                }
            } catch(e) { console.error("KAJE credit error:", e); }
        };
        
        
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
        
        window.updateFirestoreStatus = async function(idDoc, newStatus, newSN, rawJson) {
            const user = auth.currentUser;
            if(!user) return;
            try { 
                const trxRef = doc(db, "users", user.uid, "riwayat_transaksi", idDoc);
                const trxSnap = await getDoc(trxRef);
                if (trxSnap.exists()) {
                    const data = trxSnap.data();
                    const sOld = (data.status || "").toUpperCase();
                    const sNew = (newStatus || "").toUpperCase();
                    
                    // FIX DONIGUARD V2: Strict Check + Atomic Anti-Double Refund
                    // Refund saldo sekarang dikunci dengan Firebase transaction agar tidak bisa dobel walaupun terpanggil bersamaan.
                    if (sOld === "PENDING" && (sNew === "GAGAL" || sNew === "EXPIRED" || sNew === "CANCELED")) {
                        const refundResult = await runTransaction(db, async (transaction) => {
                            const freshTrxSnap = await transaction.get(trxRef);
                            if (!freshTrxSnap.exists()) return { refunded: false, reason: 'trx_not_found' };
        
                            const freshData = freshTrxSnap.data();
                            const freshOld = (freshData.status || "").toUpperCase();
                            const hrg = parseInt(freshData.harga) || 0;
        
                            if (freshOld !== "PENDING" || freshData.isRefunded || hrg <= 0 || freshData.kode_produk === "TOPUP") {
                                return { refunded: false, reason: 'already_refunded_or_not_valid' };
                            }
        
                            const uRef = doc(db, "users", user.uid);
                            const freshUserSnap = await transaction.get(uRef);
                            if (!freshUserSnap.exists()) return { refunded: false, reason: 'user_not_found' };
        
                            const sld = (freshUserSnap.data().saldo || 0) + hrg;
                            const refundGuardId = ((freshData.trx_id || idDoc) + '-REF');
        
                            transaction.update(uRef, { saldo: sld });
                            transaction.update(trxRef, {
                                isRefunded: true,
                                refund_guard_id: refundGuardId,
                                refund_at: serverTimestamp()
                            });
        
                            return {
                                refunded: true,
                                nominal: hrg,
                                saldo_akhir: sld,
                                refund_guard_id: refundGuardId,
                                produk: freshData.produk || 'Trx'
                            };
                        });
        
                        if (refundResult.refunded && window.triggerDoniGuard) {
                            window.triggerDoniGuard({
                                action: 'topup',
                                trx_id: refundResult.refund_guard_id,
                                produk: 'REFUND: ' + refundResult.produk,
                                nominal: refundResult.nominal,
                                saldo_akhir_client: refundResult.saldo_akhir
                            });
                        }
                    }
                }
                                await updateDoc(trxRef, { status: newStatus, sn: newSN, raw_json: rawJson || '-' }); 
                
                                // LOGIKA AUTO INQUIRY (Tagihan Muncul saat Cek Sukses)
                if (trxSnap.exists()) {
                    const d = trxSnap.data();
                    const sNewNotif = (newStatus || "").toUpperCase();
                    const sOldNotif = (d.status || "").toUpperCase();
                    if ((sNewNotif === 'BERHASIL' || sNewNotif === 'SUKSES') && sOldNotif !== 'BERHASIL' && sOldNotif !== 'SUKSES') {
                        // --- LOGIKA KAJE: KREDIT PENERIMA ---
                        if (d.provider === 'KAJE' || (d.kode_produk && d.kode_produk.startsWith('KAJE'))) {
                            window.prosesKajeInternal(d.tujuan, d.harga, d.username || 'User', user.uid, idDoc);
                        }
        
                                                // PATCH DONI: Buku sekarang manual saja, perubahan status riwayat tidak otomatis dicatat.
        
        if (d.kode_produk === "TOPUP") {
                            if(window.kirimNotifTelegram) window.kirimNotifTelegram('topup', { harga: d.harga || 0, username: d.username || 'Pengguna', trx_id: d.trx_id || idDoc });
                        } else {
                            if(window.kirimNotifTelegram) window.kirimNotifTelegram('transaksi', { produk: d.produk || '-', tujuan: d.tujuan || '-', harga: d.harga || 0, username: d.username || 'Pengguna', trx_id: d.trx_id || idDoc });
                        }
                    }
                    // MODIFIKASI: Deteksi semua jenis Cek (PLN, BPJS, Multifinance, PDAM, dll)
                    // Mengecek kode berawalan: C (CPLA, CPAM), INQ (INQ...), atau CEK
                    if ((newStatus === 'BERHASIL' || newStatus === 'Sukses') && 
                        d.kode_produk && 
                        (d.kode_produk.startsWith('C') || d.kode_produk.startsWith('INQ') || d.kode_produk.startsWith('CEK'))) {
                        
                        console.log("Auto Inquiry Triggered for: " + d.kode_produk);
                        setTimeout(() => window.tampilkanModalTagihan(newSN, d.kode_produk, d.tujuan), 1000);
                    }
                } 
            } catch (e) {}
        }
        
        
        // --- FITUR KIRIM & MINTA SALDO ---
        window.transferType = 'kirim';
        window.bukaModalTransfer = (tipe) => {
            window.transferType = tipe;
            document.getElementById('transferTitle').innerText = tipe === 'kirim' ? 'Kirim Saldo' : 'Minta Saldo';
            let targetInput = document.getElementById('transferTarget');
            targetInput.value = '';
            targetInput.readOnly = false;
            targetInput.style.backgroundColor = "";
            document.getElementById('transferNominal').value = '';
            document.getElementById('modalTransfer').style.display = 'flex';
        };
        
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
            
            document.getElementById('modalRequestSaldo').style.display = 'none';
            window.showNotice('loading', 'Memproses', 'Mentransfer saldo...');
            
            try {
                const myRef = window.doc(window.db, 'users', user.uid);
                const mySnap = await window.getDoc(myRef);
                const mySaldo = mySnap.data().saldo || 0;
                const myName = mySnap.data().username || mySnap.data().nama || 'User';
        
                if(mySaldo < reqData.nominal) throw new Error('Saldo Anda tidak mencukupi untuk memenuhi permintaan ini!');
        if (!(await window.cekSinkronisasiDoniGuard(user.uid, mySaldo))) throw new Error('sedang memproses transaksi harap tunggu');
        
                const myNewSaldo = mySaldo - reqData.nominal;
                await window.updateDoc(myRef, { saldo: myNewSaldo });
                await window.addDoc(window.collection(window.db, 'users', user.uid, 'riwayat_transaksi'), { uid: user.uid, username: myName, tujuan: reqData.dari_nama, produk: 'Kirim Saldo', kode_produk: 'TRANSFER', harga: reqData.nominal, status: 'BERHASIL', sn: 'Memenuhi permintaan ' + reqData.dari_nama, trx_id: 'REQOUT' + Date.now(), timestamp: window.serverTimestamp() });
                if(window.triggerDoniGuard) {
                    window.triggerDoniGuard({
                        action: 'transfer_out',
                        produk: 'Memenuhi Permintaan Saldo ' + reqData.dari_nama,
                        nominal: reqData.nominal,
                        trx_id: 'REQOUT' + Date.now(),
                        saldo_akhir_client: myNewSaldo
                    });
                }
        
                const pemintaRef = window.doc(window.db, 'users', reqData.dari_uid);
                const pemintaSnap = await window.getDoc(pemintaRef);
                const pemintaNewSaldo = (pemintaSnap.data().saldo || 0) + reqData.nominal;
                await window.updateDoc(pemintaRef, { saldo: pemintaNewSaldo });
                await window.addDoc(window.collection(window.db, 'users', reqData.dari_uid, 'riwayat_transaksi'), { uid: reqData.dari_uid, username: pemintaSnap.data().username || 'User', tujuan: myName, produk: 'Terima Saldo', kode_produk: 'TRANSFER', harga: reqData.nominal, status: 'BERHASIL', sn: 'Permintaan dipenuhi ' + myName, trx_id: 'REQIN' + Date.now(), timestamp: window.serverTimestamp() });
                
                await window.addDoc(window.collection(window.db, 'users', reqData.dari_uid, 'notifikasi'), {
                    tipe: 'transfer_masuk',
                    dari_uid: user.uid,
                    dari_nama: myName,
                    nominal: reqData.nominal,
                    status: 'unread',
                    timestamp: window.serverTimestamp()
                });
        
                await window.updateDoc(window.doc(window.db, 'users', user.uid, 'notifikasi', reqData.docId), { status: 'accepted' });
                
                window.showNotice('success', 'Berhasil', 'Permintaan saldo berhasil dipenuhi.');
            } catch(e) {
                window.showNotice('error', 'Gagal', e.message);
                await window.updateDoc(window.doc(window.db, 'users', user.uid, 'notifikasi', reqData.docId), { status: 'pending' });
            }
        };
        
        window.tolakRequestSaldo = async () => {
            const reqData = window.currentRequestData;
            if(!reqData) return;
            const user = window.auth.currentUser;
            if(!user) return;
            
            document.getElementById('modalRequestSaldo').style.display = 'none';
            try {
                await window.updateDoc(window.doc(window.db, 'users', user.uid, 'notifikasi', reqData.docId), { status: 'rejected' });
            } catch(e) { console.error(e); }
        };
        
    </script>

    <script>
        const KLIKRESI_PROXY = "https://www.bhuleemarket.store/klikresi_proxy.php";
                    let ORIGIN_ID = "32.15.01"; // Ganti dengan ID Kecamatan Toko Anda
                const modal = document.getElementById('modalApp');
                const modalInvoice = document.getElementById('modalInvoice');
                const listArea = document.getElementById('listProdukArea');
                const areaFilter = document.getElementById('areaFilter');
                const inputNomor = document.getElementById('nomorHP');
                const badgeOperator = document.getElementById('operatorBadge');
                const loading = document.getElementById('statusLoading');
                const loaderAwal = document.getElementById('globalLoader');
                let markupConfig = { General: 0 };  
                let whatsappAdmin = "628xxx";
        
                // Deklarasi fetchConfig yang redundan dihapus untuk memperbaiki bug Markup.
        
                        let masterData = []; 
                // EXPOSE KE GLOBAL AGAR BISA DIBACA FUNGSI LAIN
                window.masterData = masterData;
                let dataMentah = [];  
                let transaksiPending = {};
                let intervalCek = {}; 
        
                        // 1. DOWNLOAD DATA MASSAL (SINGLE FETCH)
                window.showNotice = function(type, title, msg) {
                    // AUTO-FILTER: Cegah pesan saldo bocor di SEMUA notifikasi (Sukses/Gagal)
                    if (typeof msg === 'string' && window.bersihkanPesan) {
                        msg = window.bersihkanPesan(msg);
                    }
        
                    const modal = document.getElementById('modalNotice');
                    const icon = document.getElementById('noticeIcon');
                    const t = document.getElementById('noticeTitle');
                    const m = document.getElementById('noticeMsg');
                    const btn = document.getElementById('btnNoticeClose');
        
                    modal.style.display = "flex";
                    t.innerText = title; m.innerText = msg;
                    btn.style.display = type === 'loading' ? 'none' : 'block';
        
                    if(type === 'success') icon.innerHTML = '<i class="fas fa-check-circle icon-success"></i>';
                    else if(type === 'error') icon.innerHTML = '<i class="fas fa-times-circle icon-error"></i>';
                    else icon.innerHTML = '<i class="fas fa-circle-notch fa-spin icon-loading"></i>';
                };
                window.tutupNotice = () => document.getElementById('modalNotice').style.display = "none";
        // 1. DOWNLOAD DATA MASSAL (SINGLE FETCH)
                async function sinkronisasiData() {
                    try {
                        const res = await fetch('data_pusat.php?jenis=semua');
                        masterData = await res.json();
        
                        if (!Array.isArray(masterData)) masterData = [];
                        window.masterData = masterData;
        
                        console.log("Sinkronisasi Berhasil:", masterData.length, "produk dimuat.");
                        loaderAwal.style.display = "none";
                    } catch (err) {
                        alert("Sinkronisasi Gagal. Silakan periksa koneksi atau file cache server.");
                        console.error(err);
                    }
                }
                window.addEventListener('DOMContentLoaded', sinkronisasiData);
        
                // CLEANER PESAN
                
;
        
                // 2. LOGIKA FILTERING MENU (SESUAI POLA JSON OKE CONNECT)
                        function bukaMenu(kategori) {
                    document.getElementById('judulMenu').innerText = kategori;
        
                    const modalEl = document.getElementById('modalApp');
                    const akrabUI = document.getElementById('akrabUI');
                    const defaultHead = document.getElementById('defaultModalHeader');
                    const searchInput = document.getElementById('akrabSearch');
                    if(searchInput) searchInput.value = '';
        
                    if (kategori === 'Paket Akrab All' || kategori === 'PO Akrab') {
                        modalEl.classList.add('modal-fullscreen');
                        if(akrabUI) akrabUI.style.display = 'block';
                        if(defaultHead) defaultHead.style.display = 'none';
                    } else {
                        modalEl.classList.remove('modal-fullscreen');
                        if(akrabUI) akrabUI.style.display = 'none';
                        if(defaultHead) defaultHead.style.display = 'flex';
                    }
                    
                    modal.style.display = "flex"; listArea.innerHTML = ""; areaFilter.innerHTML = ""; 
                    inputNomor.value = ""; badgeOperator.style.display = "none";
                    document.getElementById('inputContainer').style.display = "none";
                    document.getElementById('areaFilter').style.display = "grid";
                    document.getElementById('btnKembali').style.display = "none";
                    
                    let filtered = [];
                    
                    // Helper pencarian kata kunci (case-insensitive)
                    const match = (item, keys) => {
                        const p = (item.produk || "").toLowerCase();
                        const k = (item.keterangan || "").toLowerCase();
                        const c = (item.kategori || "").toLowerCase();
                        const list = Array.isArray(keys) ? keys : [keys];
                        return list.some(key => p.includes(key.toLowerCase()) || k.includes(key.toLowerCase()) || c.includes(key.toLowerCase()));
                    };
        
                    if (kategori === 'Pulsa') {
                        filtered = masterData.filter(i => 
        i.kategori === "PULSA" && 
        !i.keterangan.toLowerCase().includes("transfer") &&
        !i.produk.toLowerCase().includes("aktif")
                        );
                    } 
                    else if (kategori === 'Pulsa Transfer') {
                        filtered = masterData.filter(i => 
        i.kategori === "PULSA" && 
        i.keterangan.toLowerCase().includes("transfer")
                        );
                    }
                    else if (kategori === 'By.U') {
                        filtered = masterData.filter(i => match(i, ["by u", "by.u", "byu"]));
                    }
                    // --- LOGIKA FILTER PROVIDER & CETAK VOUCHER BARU ---
                    else if (kategori === 'Telkomsel') {
                        filtered = masterData.filter(i => 
        match(i, ["telkomsel", "cetak perdana telkomsel", "tsel cetak voucher", "voucher tsel"])
                        );
                    }
                    else if (kategori === 'Indosat') {
                        filtered = masterData.filter(i => 
        match(i, ["indosat", "cetak perdana indosat", "isat cetak", "voucher freedom", "voucher data jumbo", "voucher data unlimited"])
                        );
                    }
                    else if (kategori === 'XL') {
                        filtered = masterData.filter(i => 
        match(i, ["xl", "cetak perdana xl", "xl cetak voucher", "xl voucher"])
                        );
                    }
                    else if (kategori === 'Axis') {
                        filtered = masterData.filter(i => 
        match(i, ["axis", "aigo voucher", "voucher combo attack", "voucher combo non attack", "voucher mini data"])
                        );
                    }
                    else if (kategori === 'Tri') {
                        filtered = masterData.filter(i => 
        match(i, ["tri", "three", "cetak perdana tri", "tri cetak vcr", "tri voucher", "tri kuota voucher"])
                        );
                    }
                        else if (kategori === 'Paket Akrab v2') {
                        document.getElementById('inputContainer').style.display = "none";
                        document.getElementById('areaFilter').style.display = "grid";
                        window.loadIcsData();
                    }
        
                    else if (kategori === 'Paket Akrab v2') {
                        document.getElementById('inputContainer').style.display = 'none';
                        document.getElementById('areaFilter').style.display = 'grid';
                        window.loadIcsData();
                    }
            else if (kategori === 'Paket Akrab All') {
                        document.getElementById('inputContainer').style.display = "none";
                        document.getElementById('areaFilter').style.display = "grid";
                        window.loadGabunganData();
                    }
                    else if (kategori === 'Akrab Spesial') {
                        if (window.maintenanceAkrabSpesial) {
        const user = window.auth.currentUser;
        if (!user || user.email !== 'doni888855519@gmail.com') {
            return window.showNotice('error', 'Maintenance', 'Mohon maaf, menu Akrab Spesial sedang dalam perbaikan / maintenance.');
        }
                        }
                        tutupModal();
                        window.navSwitch('akrab_spesial');
                    }
        
                    else if (kategori === 'PO Akrab') {
                        document.getElementById('inputContainer').style.display = "none";
                        document.getElementById('areaFilter').style.display = "grid";
                        window.loadGabunganData();
                    }
        else if (kategori === 'Paket Akrab') {
                        document.getElementById('inputContainer').style.display = "none";
                        document.getElementById('areaFilter').style.display = "grid";
                        window.loadKhfyData();
                    }
                    else if (kategori === 'VA Bank') {
                        const codes = ['BBSVABNI', 'BBSVABCA', 'BBSVABRI', 'BBSVAMDR', 'BBSVAPMT', 'BBSVACIM'];
                        filtered = masterData.filter(i => codes.includes(i.kode));
                    }
        else if (kategori === 'Smartfren') {
                        filtered = masterData.filter(i => 
        match(i, ["smartfren", "cetak perdana smart", "smart cetak voucher", "voucher kuota nonstop"])
                        );
                    }
                    // ---------------------------------------------------
                    else if (kategori === 'E-Wallet') {
                        const walletKeywords = ["dana", "ovo", "gopay", "shopee", "maxim", "linkaja", "doku", "isaku", "indriver", "grab", "astra", "kaspro"];
                        const walletBlacklist = ["cek kuota & perdana", "cek produk digital", "cicilan multi finance", "tagihan kartu kredit", "tagihan online kredit"];
                        filtered = masterData.filter(i => {
        let k = i.keterangan.toLowerCase();
        let p = i.produk.toLowerCase();
        let isBlacklisted = walletBlacklist.some(kw => p.includes(kw) || k.includes(kw));
        if(isBlacklisted) return false;
        
        let isWallet = walletKeywords.some(key => k.includes(key) || p.includes(key));
        // Pastikan GRAB Voucher masuk, dan produk cetak selain Grab dibuang
        let isGrabVoucher = p.includes("grab voucher");
        let isNotPerdana = !k.includes("perdana") && !k.includes("cetak");
        return (isWallet && isNotPerdana) || isGrabVoucher;
                        });
                    }
            else if (kategori === 'DIGITAL') {
                        const gameKeywords = [
        'mobile legend','free fire','pubg','higgs','domino','genshin','roblox','valorant','point blank','call of duty','cod','wild rift','aov','arena breakout','ragnarok','blood strike','chaos','clash royale','clash of clans','delta force','speed drifter','hago','lita','eggy','fc mobile','okegaming','garena','gemscool','razer','steam','unipin','super sus','google play','honor of kings','indo play','life after','lokapala','lord mobile','magic chess','marvel','one punch','new state','stumble','undawn','werewolf','zepeto','spotify','genflix','vidio','wetv','wifi'
                        ];
                        filtered = masterData.filter(i => {
        let kat = (i.kategori || '').toLowerCase();
        let p = (i.produk || '').toLowerCase();
        let k = (i.keterangan || '').toLowerCase();
        
        let isGameKategori = kat === 'games' || kat === 'digital';
        let isGameNama = gameKeywords.some(g => p.includes(g) || k.includes(g));
        let isTPG = p.startsWith('tpg');
        
        let isPulsaOrPaket = p.includes('pulsa') || p.includes('paket') || p.includes('telkomsel') || p.includes('indosat') || p.includes('xl') || p.includes('axis') || p.includes('tri') || p.includes('smartfren');
        let isEwallet = ['dana','ovo','gopay','shopee','linkaja','isaku','doku','maxim','indriver'].some(w => p.includes(w) || k.includes(w));
        
        return ((isGameKategori && isGameNama) || isTPG) && !isPulsaOrPaket && !isEwallet;
                        });
                    }            else if (kategori === "Topup E'Tol") {
                        const etolKeys = ["brizzi", "flazz", "tapcash", "mandiri"];
                        filtered = masterData.filter(i => {
        let p = i.produk.toLowerCase();
        return etolKeys.some(k => p.includes(k));
                        });
                    }
                    else if (kategori === 'Token PLN') {
                        filtered = masterData.filter(i => {
        let p = i.produk.toLowerCase();
        let cat = (i.kategori || "").toLowerCase();
        let isPln = p.includes("pln") || cat.includes("pln");
        let isEtol = ["brizzi", "flazz", "tapcash", "mandiri"].some(k => p.includes(k));
        return isPln && !isEtol;
                        });
                    }
                    else if (kategori === 'Tagihan') {
                        const blacklist = ["TOKEN", "PULSA", "DATA", "VOUCHER", "TELKOMSEL", "INDOSAT", "ISAT", "TRI", "AXIS", "XL", "SMARTFREN", "FREEDOM", "COMBO", "PERDANA", "UNLIMITED", "YELLOW", "OMNI", "PRABAYAR", "GAME", "TOP UP", "SALDO"];
                        const whitelistTagihan = ["CICILAN MULTI FINANCE", "TAGIHAN KARTU KREDIT", "TAGIHAN ONLINE KREDIT"];
                        filtered = masterData.filter(i => {
        let p = (i.produk || "").toUpperCase();
        let c = (i.kategori || "").toUpperCase();
        
        // Jalur Khusus untuk Whitelist
        if (whitelistTagihan.some(kw => p.includes(kw))) return true;
        
        // Tahap 1: Buang yang ada di Blacklist
        if (blacklist.some(kw => p.includes(kw))) return false;
        
        // Tahap 2: Ambil yang sesuai kriteria Tagihan
        return c === 'TAGIHAN' || c === 'FINANCE' || 
               p.includes('BPJS') || 
               (p.includes('PLN') && !p.includes('TOKEN')) || 
               p.includes('PDAM') ||
               p.includes('GAS') ||
               p.includes('PGN') ||
               p.includes('PERTAGAS') ||
               p.includes('INDIHOME') ||
               p.includes('BIZNET') ||
               p.includes('FIRST MEDIA') ||
               p.includes('MY REPUBLIC') ||
               p.includes('CBN') ||
               p.includes('ICONNET') ||
               p.includes('BALI FIBER') ||
               p.includes('CENTRIN') ||
               p.includes('COMET') ||
               p.includes('TIKET') ||
               p.includes('TELKOM');
                        });
                    }
                    else if (kategori === 'Telkomsel') {
                        filtered = masterData.filter(i => 
        i.produk.toLowerCase().includes("telkomsel") || 
        i.keterangan.toLowerCase().includes("telkomsel")
                        );
                    }
                    else {
                        // Default: Filter kategori atau produk lainnya (PLN, Tagihan, Indosat, dll)
                        filtered = masterData.filter(i => 
        (i.kategori && i.kategori.toUpperCase().includes(kategori.toUpperCase())) || 
        (i.produk && i.produk.toUpperCase().includes(kategori.toUpperCase()))
                        );
                    }
        
                    dataMentah = filtered;
                    buatTombolFilter(filtered);
                }
        
            
        
                /* PATCH DONI: Mesin kategori PPOB rapi berdasarkan struktur Daftar Harga Okeconect */
                window.__ppobNorm = function(v) {
                    return String(v || '').toLowerCase().replace(/[._\-\/]+/g, ' ').replace(/\s+/g, ' ').trim();
                };
                window.__ppobText = function(item) {
                    return window.__ppobNorm([(item && item.produk) || '', (item && item.keterangan) || '', (item && item.kategori) || '', (item && item.kode) || ''].join(' '));
                };
                window.__ppobCat = function(item) { return String((item && item.kategori) || '').toUpperCase().trim(); };
                window.__ppobHas = function(text, keys) {
                    text = window.__ppobNorm(text);
                    return (Array.isArray(keys) ? keys : [keys]).some(k => text.includes(window.__ppobNorm(k)));
                };
                window.__ppobInCat = function(item, cats) {
                    const c = window.__ppobCat(item);
                    return (Array.isArray(cats) ? cats : [cats]).some(cat => c === String(cat || '').toUpperCase());
                };
                window.__ppobIsProviderText = function(item, provider) {
                    const t = window.__ppobText(item);
                    const map = {
                        'Telkomsel': ['telkomsel','tsel','t sel','sakti','maxstream','ilmupedia','orbit','omni','bulk tsel','bulk telkomsel'],
                        'Indosat': ['indosat','isat','im3','freedom','yellow'],
                        'XL': ['xl','xtra','hotrod','akrab mini'],
                        'Axis': ['axis','aigo','bronet','owsem'],
                        'Tri': ['tri','three','3 data','happy tri','alwayson'],
                        'Smartfren': ['smartfren','smart','nonstop','volte'],
                        'By.U': ['by u','by.u','byu']
                    };
                    return window.__ppobHas(t, map[provider] || [provider]);
                };
                window.__ppobBlockedProviderCat = function(item) {
                    return window.__ppobInCat(item, ['PULSA','PULSA TRANSFER','SALDO GOJEK','DIGITAL','TAGIHAN','AIR PDAM','FINANCE','PASCABAYAR','TAGIHAN PBB','TOKEN PLN','NOMINAL BEBAS']);
                };
                window.__ppobAllowedProviderCat = function(item, provider) {
                    const c = window.__ppobCat(item);
                    const byProviderCat = {
                        'Telkomsel': ['KUOTA TELKOMSEL','BULK TELKOMSEL','BULK CASHBACK','KUOTA NASIONAL','SMS TELEPON','CETAK VOUCHER'],
                        'Indosat': ['KUOTA INDOSAT','KUOTA NASIONAL','SMS TELEPON','CETAK VOUCHER'],
                        'XL': ['KUOTA XL','KUOTA NASIONAL','SMS TELEPON','CETAK VOUCHER'],
                        'Axis': ['KUOTA AXIS','KUOTA NASIONAL','SMS TELEPON','CETAK VOUCHER'],
                        'Tri': ['KUOTA TRI','KUOTA NASIONAL','SMS TELEPON','CETAK VOUCHER'],
                        'Smartfren': ['KUOTA SMARTFREN','KUOTA NASIONAL','SMS TELEPON','CETAK VOUCHER'],
                        'By.U': ['KUOTA BYU','KUOTA NASIONAL','SMS TELEPON','CETAK VOUCHER']
                    };
                    return (byProviderCat[provider] || []).includes(c);
                };
                window.__ppobWalletKeys = ['dana','ovo','gopay','gojek','shopeepay','shopee pay','linkaja','link aja','grab','maxim','isaku','i saku','doku','kaspro','astrapay','astra pay','indriver','in driver'];
                window.__ppobDigitalKeys = ['mobile legend','free fire','pubg','higgs','domino','genshin','roblox','valorant','point blank','call of duty','cod','wild rift','aov','arena breakout','ragnarok','blood strike','clash','delta force','hago','lita','eggy','fc mobile','garena','gemscool','razer','steam','unipin','super sus','google play','honor of kings','indo play','life after','lokapala','lord mobile','magic chess','marvel','one punch','new state','stumble','undawn','werewolf','zepeto','spotify','genflix','vidio','wetv','wifi id'];
                window.__ppobGetMenuData = function(kategori, source) {
                    const data = Array.isArray(source) ? source : [];
                    const K = String(kategori || '').trim();
                    const has = window.__ppobHas;
                    const cat = window.__ppobInCat;
                    const txt = window.__ppobText;
                    const providerNames = ['Telkomsel','Indosat','XL','Axis','Tri','Smartfren','By.U'];
        
                    if (K === 'Pulsa') {
                        return data.filter(i => {
                            const t = txt(i);
                            return cat(i, 'PULSA') && !has(t, ['transfer','masa aktif','aktif kartu','kuota','data','voucher','paket internet']);
                        });
                    }
                    if (K === 'Pulsa Transfer') {
                        return data.filter(i => cat(i, 'PULSA TRANSFER') || (cat(i, 'PULSA') && has(txt(i), ['transfer'])));
                    }
                    if (providerNames.includes(K)) {
                        return data.filter(i => window.__ppobAllowedProviderCat(i, K) && window.__ppobIsProviderText(i, K) && !window.__ppobBlockedProviderCat(i));
                    }
                    if (K === 'E-Wallet') {
                        return data.filter(i => {
                            const t = txt(i);
                            if (has(t, ['cek kuota','produk digital','cicilan','finance','tagihan','kartu kredit','pascabayar','token pln','pbb','pulsa transfer','perdana','cetak perdana'])) return false;
                            return cat(i, ['SALDO GOJEK','NOMINAL BEBAS']) || window.__ppobWalletKeys.some(w => has(t, w));
                        });
                    }
                    if (K === 'DIGITAL') {
                        return data.filter(i => {
                            const t = txt(i);
                            const isDigital = cat(i, 'DIGITAL') || has(t, window.__ppobDigitalKeys) || String(i.kode || '').toUpperCase().startsWith('TPG');
                            const isWrong = window.__ppobWalletKeys.some(w => has(t, w)) || has(t, ['telkomsel','indosat','xl','axis','tri','smartfren','byu','by u','pulsa','token pln','tagihan','pascabayar','pbb']);
                            return isDigital && !isWrong;
                        });
                    }
                    if (K === 'Token PLN') {
                        return data.filter(i => {
                            const t = txt(i);
                            return (cat(i, 'TOKEN PLN') || has(t, ['token pln','pln prabayar','pln bulanan'])) && !has(t, ['flazz','brizzi','tapcash','e toll','emoney','mandiri e money']);
                        });
                    }
                    if (K === 'Tagihan') {
                        return data.filter(i => {
                            const t = txt(i);
                            if (cat(i, ['PASCABAYAR','TAGIHAN PBB','TOKEN PLN'])) return false;
                            if (has(t, ['pulsa','kuota','voucher data','freedom','combo','perdana','unlimited','yellow','omni','game','top up saldo'])) return false;
                            return cat(i, ['TAGIHAN','AIR PDAM','FINANCE']) || has(t, ['bpjs','pdam','pln bulanan','indihome','biznet','first media','my republic','cbn','iconnet','bali fiber','gas','pgn','pertagas','tiket','telkom','kartu kredit']);
                        });
                    }
                    if (K === 'PBB') return data.filter(i => cat(i, 'TAGIHAN PBB') || has(txt(i), ['pbb']));
                    if (K === 'Pascabayar') return data.filter(i => cat(i, 'PASCABAYAR'));
                    if (K === "Topup E'Tol") return data.filter(i => has(txt(i), ['brizzi','flazz','tapcash','e toll','emoney','e money mandiri','mandiri e money']));
                    if (K === 'VA Bank') {
                        const codes = ['BBSVABNI', 'BBSVABCA', 'BBSVABRI', 'BBSVAMDR', 'BBSVAPMT', 'BBSVACIM'];
                        return data.filter(i => codes.includes(String(i.kode || '').toUpperCase()));
                    }
                    return data.filter(i => {
                        const k = K.toUpperCase();
                        return String(i.kategori || '').toUpperCase().includes(k) || String(i.produk || '').toUpperCase().includes(k);
                    });
                };
        
                window.__legacyBukaMenu = window.bukaMenu || (typeof bukaMenu === 'function' ? bukaMenu : null);
                bukaMenu = window.bukaMenu = function(kategori) {
                    document.getElementById('judulMenu').innerText = kategori;
        
                    const modalEl = document.getElementById('modalApp');
                    const akrabUI = document.getElementById('akrabUI');
                    const defaultHead = document.getElementById('defaultModalHeader');
                    const searchInput = document.getElementById('akrabSearch');
                    if(searchInput) searchInput.value = '';
        
                    if (kategori === 'Paket Akrab All' || kategori === 'PO Akrab') {
                        modalEl.classList.add('modal-fullscreen');
                        if(akrabUI) akrabUI.style.display = 'block';
                        if(defaultHead) defaultHead.style.display = 'none';
                    } else {
                        modalEl.classList.remove('modal-fullscreen');
                        if(akrabUI) akrabUI.style.display = 'none';
                        if(defaultHead) defaultHead.style.display = 'flex';
                    }
        
                    modal.style.display = 'flex';
                    listArea.innerHTML = '';
                    areaFilter.innerHTML = '';
                    areaFilter.classList.remove('ppob-filter-modern', 'ppob-list-mode');
                    inputNomor.value = '';
                    badgeOperator.style.display = 'none';
                    document.getElementById('inputContainer').style.display = 'none';
                    document.getElementById('areaFilter').style.display = 'grid';
                    document.getElementById('btnKembali').style.display = 'none';
        
                    if (kategori === 'Paket Akrab v2') {
                        document.getElementById('inputContainer').style.display = 'none';
                        document.getElementById('areaFilter').style.display = 'grid';
                        return window.loadIcsData();
                    }
                    if (kategori === 'Paket Akrab All' || kategori === 'PO Akrab') {
                        document.getElementById('inputContainer').style.display = 'none';
                        document.getElementById('areaFilter').style.display = 'grid';
                        return window.loadGabunganData();
                    }
                    if (kategori === 'Akrab Spesial') {
                        if (window.maintenanceAkrabSpesial) {
                            const user = window.auth && window.auth.currentUser;
                            if (!user || user.email !== 'doni888855519@gmail.com') {
                                return window.showNotice('error', 'Maintenance', 'Mohon maaf, menu Akrab Spesial sedang dalam perbaikan / maintenance.');
                            }
                        }
                        tutupModal();
                        return window.navSwitch('akrab_spesial');
                    }
                    if (kategori === 'Paket Akrab') {
                        document.getElementById('inputContainer').style.display = 'none';
                        document.getElementById('areaFilter').style.display = 'grid';
                        return window.loadKhfyData();
                    }
        
                    const filtered = window.__ppobGetMenuData(kategori, masterData);
                    dataMentah = filtered;
                    areaFilter.classList.add('ppob-filter-modern');
                    window.buatTombolFilter(filtered);
                };
        
            window.currentProvidersData = [];
            window.isListModeContext = false;
            window.currentMenuContext = '';
        
            function buatTombolFilter(data) {
                let providers = [...new Set(data.map(item => item.produk))].sort();
                window.currentMenuContext = document.getElementById('judulMenu').innerText;
                const listModeMenus = ["Telkomsel", "Indosat", "XL", "Axis", "Tri", "Smartfren", "By.U", "Token PLN"];
                window.isListModeContext = listModeMenus.includes(window.currentMenuContext);
                
                if(window.currentMenuContext === 'Token PLN') {
                    const prioritas = ['Token PLN Prabayar', 'Token PLN Full Reply', 'Token PLN Promo', 'Token PLN Terbaik'];
                    providers.sort((a, b) => {
                        let idxA = prioritas.indexOf(a); let idxB = prioritas.indexOf(b);
                        if(idxA === -1) idxA = 999;
                        if(idxB === -1) idxB = 999;
                        return idxA - idxB || a.localeCompare(b);
                    });
                }
                
                window.currentProvidersData = providers;
                window.renderFilterGroups();
            }
        
            
;
        
            
;
        
        
        
                /* PATCH DONI: Render filter modern, grouping rapi sesuai kategori Okeconect */
                window.__ppobHtml = function(v) {
                    return String(v || '').replace(/[&<>"']/g, function(ch) {
                        return ({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;'})[ch];
                    });
                };
                window.__ppobJs = function(v) {
                    return String(v || '').replace(/\\/g, '\\\\').replace(/'/g, "\\'").replace(/\n/g, ' ').replace(/\r/g, ' ');
                };
                window.__ppobCleanName = function(name) {
                    return String(name || '')
                        .replace(/H2H/gi, '')
                        .replace(/Top\s*Up\s*Saldo\s*/gi, '')
                        .replace(/Saldo\s*/gi, '')
                        .replace(/Customer/gi, '')
                        .replace(/Driver/gi, '')
                        .replace(/Penumpang/gi, '')
                        .replace(/Admin\s*/gi, '')
                        .replace(/\s*\/\s*/g, ' ')
                        .replace(/\s+/g, ' ')
                        .trim();
                };
                window.__ppobBrand = function(text, map, fallback) {
                    const n = window.__ppobNorm(text);
                    for (const row of map) if (row.keys.some(k => n.includes(window.__ppobNorm(k)))) return row.name;
                    return fallback;
                };
                window.__ppobMeta = function(original) {
                    const menu = window.currentMenuContext || '';
                    const clean = window.__ppobCleanName(original);
                    const n = window.__ppobNorm(original + ' ' + clean);
                    let group = clean || 'Lainnya';
                    let label = clean || original;
                    let icon = '';
                    let fa = 'fa-box-open';
                    let order = 500;
        
                    const providerMap = [
                        {name:'Telkomsel', keys:['telkomsel','tsel','t sel']}, {name:'Indosat', keys:['indosat','isat','im3']},
                        {name:'XL', keys:['xl','xtra']}, {name:'Axis', keys:['axis','aigo']}, {name:'Tri', keys:['tri','three']},
                        {name:'Smartfren', keys:['smartfren','smart']}, {name:'By.U', keys:['by u','by.u','byu']}
                    ];
                    const walletMap = [
                        {name:'DANA', keys:['dana']}, {name:'OVO', keys:['ovo']}, {name:'GoPay', keys:['gopay','gojek']},
                        {name:'ShopeePay', keys:['shopeepay','shopee pay','shopee']}, {name:'LinkAja', keys:['linkaja','link aja']},
                        {name:'Grab', keys:['grab']}, {name:'Maxim', keys:['maxim']}, {name:'iSaku', keys:['isaku','i saku']},
                        {name:'DOKU', keys:['doku']}, {name:'Kaspro', keys:['kaspro']}, {name:'AstraPay', keys:['astrapay','astra pay']},
                        {name:'Indriver', keys:['indriver','in driver']}, {name:'Uang Elektronik', keys:['bebas nominal','nominal bebas']}
                    ];
                    const digitalMap = [
                        {name:'Mobile Legends', keys:['mobile legend','mlbb']}, {name:'Free Fire', keys:['free fire','ff ']},
                        {name:'PUBG', keys:['pubg']}, {name:'Higgs Domino', keys:['higgs','domino']}, {name:'Genshin Impact', keys:['genshin']},
                        {name:'Roblox', keys:['roblox']}, {name:'Valorant', keys:['valorant']}, {name:'Google Play', keys:['google play']},
                        {name:'Garena', keys:['garena']}, {name:'Steam', keys:['steam']}, {name:'UniPin', keys:['unipin']},
                        {name:'Vidio', keys:['vidio']}, {name:'WeTV', keys:['wetv']}, {name:'Spotify', keys:['spotify']},
                        {name:'WiFi ID', keys:['wifi id','wifi']}
                    ];
        
                    if (menu === 'Pulsa' || menu === 'Pulsa Transfer') {
                        group = window.__ppobBrand(n, providerMap, 'Operator Lain');
                        label = clean.replace(/Pulsa\s*/i, '').trim() || group;
                        order = ['Telkomsel','Indosat','XL','Axis','Tri','Smartfren','By.U','Operator Lain'].indexOf(group);
                        if (order < 0) order = 99;
                        icon = 'icons/' + group + '.png';
                        fa = 'fa-sim-card';
                    } else if (['Telkomsel','Indosat','XL','Axis','Tri','Smartfren','By.U'].includes(menu)) {
                        if (n.includes('voucher') || n.includes('vcr') || n.includes('aigo')) { group = 'Voucher'; order = 40; fa = 'fa-ticket-alt'; }
                        else if (n.includes('cetak') || n.includes('perdana')) { group = 'Cetak Perdana'; order = 45; fa = 'fa-print'; }
                        else if (n.includes('sms') || n.includes('telepon') || n.includes('telpon') || n.includes('nelpon')) { group = 'SMS & Telepon'; order = 35; fa = 'fa-phone-alt'; }
                        else if (n.includes('bulk') || n.includes('cashback')) { group = 'Bulk / Cashback'; order = 30; fa = 'fa-layer-group'; }
                        else if (n.includes('unlimited')) { group = 'Unlimited'; order = 20; fa = 'fa-infinity'; }
                        else if (n.includes('combo')) { group = 'Combo'; order = 18; fa = 'fa-box'; }
                        else if (n.includes('kuota') || n.includes('data') || n.includes('internet') || n.includes('freedom') || n.includes('yellow') || n.includes('happy') || n.includes('nonstop')) { group = 'Paket Data'; order = 10; fa = 'fa-wifi'; }
                        else { group = 'Paket Lainnya'; order = 90; fa = 'fa-box-open'; }
                        icon = 'icons/' + menu + '.png';
                    } else if (menu === 'E-Wallet') {
                        group = window.__ppobBrand(n, walletMap, clean.split(' ')[0] || 'E-Wallet');
                        order = ['DANA','OVO','GoPay','ShopeePay','LinkAja','Grab','Maxim','iSaku','DOKU','Kaspro','AstraPay','Indriver','Uang Elektronik'].indexOf(group);
                        if (order < 0) order = 99;
                        icon = 'icons/' + group + '.png';
                        fa = 'fa-wallet';
                    } else if (menu === 'DIGITAL') {
                        group = window.__ppobBrand(n, digitalMap, clean.split(' ')[0] || 'Digital');
                        order = ['Mobile Legends','Free Fire','PUBG','Higgs Domino','Genshin Impact','Roblox','Valorant','Google Play','Garena','Steam','UniPin','Vidio','WeTV','Spotify','WiFi ID'].indexOf(group);
                        if (order < 0) order = 99;
                        icon = 'icons/DIGITAL.png';
                        fa = 'fa-gamepad';
                    } else if (menu === 'Token PLN') {
                        if (n.includes('bulanan') || n.includes('pasca')) { group = 'PLN Bulanan'; order = 5; fa = 'fa-file-invoice-dollar'; }
                        else if (n.includes('full reply')) { group = 'PLN Full Reply'; order = 20; }
                        else if (n.includes('promo')) { group = 'PLN Promo'; order = 30; }
                        else if (n.includes('direct')) { group = 'PLN Direct'; order = 40; }
                        else { group = 'Token PLN'; order = 10; }
                        icon = 'icons/Token PLN.png';
                        fa = 'fa-bolt';
                    } else if (menu === 'Tagihan') {
                        if (n.includes('pdam') || n.includes('pam')) { group = 'AIR PDAM'; order = 20; fa = 'fa-tint'; }
                        else if (n.includes('bpjs')) { group = 'BPJS'; order = 10; fa = 'fa-id-card'; }
                        else if (n.includes('pln')) { group = 'PLN Bulanan'; order = 15; fa = 'fa-bolt'; }
                        else if (n.includes('finance') || n.includes('kredit') || n.includes('cicilan')) { group = 'Finance'; order = 30; fa = 'fa-credit-card'; }
                        else if (n.includes('indihome') || n.includes('biznet') || n.includes('first media') || n.includes('my republic') || n.includes('cbn') || n.includes('iconnet') || n.includes('telkom')) { group = 'Internet & TV'; order = 25; fa = 'fa-wifi'; }
                        else if (n.includes('gas') || n.includes('pgn') || n.includes('pertagas')) { group = 'Gas / PGN'; order = 35; fa = 'fa-fire'; }
                        else { group = 'Tagihan Lainnya'; order = 90; fa = 'fa-file-invoice'; }
                        icon = 'icons/Tagihan.png';
                    } else if (menu === 'PBB') {
                        if (n.includes('jawa barat') || n.includes('banten') || n.includes('jakarta') || n.includes('jabar')) { group = 'Jabar / Banten / DKI'; order = 10; }
                        else if (n.includes('jawa tengah') || n.includes('jateng')) { group = 'Jawa Tengah'; order = 20; }
                        else if (n.includes('jawa timur') || n.includes('jatim')) { group = 'Jawa Timur'; order = 30; }
                        else if (n.includes('sumatera')) { group = 'Sumatera'; order = 40; }
                        else if (n.includes('kalimantan')) { group = 'Kalimantan'; order = 50; }
                        else if (n.includes('sulawesi')) { group = 'Sulawesi'; order = 60; }
                        else if (n.includes('ntb') || n.includes('nusa tenggara')) { group = 'NTB / NTT'; order = 70; }
                        else { group = 'Wilayah Lainnya'; order = 90; }
                        icon = 'icons/PBB.png';
                        fa = 'fa-map-marked-alt';
                    } else if (menu === 'Pascabayar') {
                        group = window.__ppobBrand(n, providerMap, 'Pascabayar Lainnya');
                        order = ['Telkomsel','Indosat','XL','Axis','Tri','Smartfren','By.U','Pascabayar Lainnya'].indexOf(group);
                        if (order < 0) order = 99;
                        icon = 'icons/TV & Halo.png';
                        fa = 'fa-file-invoice-dollar';
                    }
        
                    return { original, clean, label, group, icon, fa, order };
                };
                window.__ppobFilterCard = function(meta, opt) {
                    opt = opt || {};
                    const isGroup = !!opt.isGroup;
                    const countText = opt.count ? (opt.count + ' pilihan') : (isGroup ? 'Buka subfilter' : 'Pilih produk');
                    const className = (window.isListModeContext ? 'filter-card-list' : 'filter-card') + (isGroup ? ' folder-card' : '');
                    const click = isGroup ? "window.renderSubFilter('" + window.__ppobJs(meta.group) + "')" : "window.filterTampilan('" + window.__ppobJs(meta.original) + "', this)";
                    const title = window.__ppobHtml(isGroup ? meta.group : (meta.label || meta.clean || meta.original));
                    const sub = window.__ppobHtml(countText);
                    const icon = window.__ppobHtml(meta.icon || ('icons/' + title + '.png'));
                    const fa = window.__ppobHtml(meta.fa || (isGroup ? 'fa-folder' : 'fa-box-open'));
                    const dataProvider = isGroup ? '' : ' data-provider="' + window.__ppobHtml(meta.original) + '"';
                    return '<div class="' + className + '"' + dataProvider + ' onclick="' + click + '">' +
                        '<span class="filter-chip-icon"><i class="fas ' + fa + '"></i><img src="' + icon + '" onerror="this.style.display=\'none\';"></span>' +
                        '<span class="filter-chip-text"><b>' + title + '</b><small>' + sub + '</small></span>' +
                        '<i class="fas ' + (isGroup ? 'fa-folder-open' : 'fa-chevron-right') + ' filter-chip-go"></i>' +
                    '</div>';
                };
                window.buatTombolFilter = buatTombolFilter = function(data) {
                    const providers = [...new Set((Array.isArray(data) ? data : []).map(item => item.produk).filter(Boolean))];
                    window.currentMenuContext = document.getElementById('judulMenu').innerText;
                    const listModeMenus = ['Telkomsel','Indosat','XL','Axis','Tri','Smartfren','By.U','Token PLN','Tagihan','PBB','Pascabayar'];
                    window.isListModeContext = listModeMenus.includes(window.currentMenuContext);
                    providers.sort((a,b) => {
                        const A = window.__ppobMeta(a), B = window.__ppobMeta(b);
                        return (A.order - B.order) || A.group.localeCompare(B.group) || A.clean.localeCompare(B.clean);
                    });
                    window.currentProvidersData = providers;
                    window.renderFilterGroups();
                };
                window.renderFilterGroups = function() {
                    const area = document.getElementById('areaFilter');
                    if(!area) return;
                    const modalApp = document.getElementById('modalApp');
                    if(modalApp) {
                        modalApp.classList.add('ppob-sheet-locked');
                        modalApp.classList.remove('ppob-products-open');
                    }
                    area.classList.add('ppob-filter-modern');
                    area.classList.toggle('ppob-list-mode', !!window.isListModeContext);
                    area.style.display = window.isListModeContext ? 'block' : 'grid';
                    area.style.gridTemplateColumns = window.isListModeContext ? 'none' : 'repeat(2, minmax(0,1fr))';
        
                    const groups = {};
                    (window.currentProvidersData || []).forEach(p => {
                        if(p === 'BAYAR PLN DIRECT' || p === 'PLN PRODUK DIRECT' || p === 'Byu Promo Menarik' || p === '+Masa Aktif Indosat') return;
                        const meta = window.__ppobMeta(p);
                        if(!groups[meta.group]) groups[meta.group] = { meta: meta, items: [] };
                        groups[meta.group].items.push(meta);
                        if(meta.order < groups[meta.group].meta.order) groups[meta.group].meta = meta;
                    });
        
                    const rows = Object.values(groups).sort((a,b) => (a.meta.order - b.meta.order) || a.meta.group.localeCompare(b.meta.group));
                    let html = '';
                    rows.forEach(row => {
                        if(row.items.length > 1) html += window.__ppobFilterCard(Object.assign({}, row.meta, { label: row.meta.group, clean: row.meta.group }), { isGroup:true, count: row.items.length });
                        else html += window.__ppobFilterCard(row.items[0], { isGroup:false });
                    });
                    area.innerHTML = html || '<div style="grid-column:1/-1;padding:22px;text-align:center;color:#94a3b8;font-weight:800;">Produk belum tersedia.</div>';
                };
                window.renderSubFilter = function(groupKey) {
                    const area = document.getElementById('areaFilter');
                    if(!area) return;
                    const modalApp = document.getElementById('modalApp');
                    if(modalApp) {
                        modalApp.classList.add('ppob-sheet-locked');
                        modalApp.classList.remove('ppob-products-open');
                    }
                    area.classList.add('ppob-filter-modern');
                    area.classList.toggle('ppob-list-mode', !!window.isListModeContext);
                    area.style.display = window.isListModeContext ? 'block' : 'grid';
                    area.style.gridTemplateColumns = window.isListModeContext ? 'none' : 'repeat(2, minmax(0,1fr))';
        
                    const items = (window.currentProvidersData || [])
                        .map(p => window.__ppobMeta(p))
                        .filter(meta => meta.group === groupKey)
                        .sort((a,b) => a.clean.localeCompare(b.clean));
        
                    let html = '<div class="ppob-filter-back" onclick="window.renderFilterGroups()"><i class="fas fa-arrow-left"></i><span>Kembali ke filter ' + window.__ppobHtml(groupKey) + '</span></div>';
                    items.forEach(meta => html += window.__ppobFilterCard(meta, { isGroup:false }));
                    area.innerHTML = html;
        
                    const listArea = document.getElementById('listProdukArea');
                    const inputCont = document.getElementById('inputContainer');
                    if(listArea) { listArea.innerHTML = ''; listArea.style.display = 'none'; }
                    if(inputCont) inputCont.style.display = 'none';
                };
        
                    window.filterTampilan = function(namaProvider, tombol) {
                    document.querySelectorAll('.filter-card').forEach(b => b.classList.remove('active'));
                    if(tombol) tombol.classList.add('active');
                    
                    const areaBebas = document.getElementById('areaBebasNominal');
                    const areaList = document.getElementById('listProdukArea');
                    const inputQ = document.getElementById('inputQty');
                    const btnKembali = document.getElementById('btnKembali');
                    const areaFilter = document.getElementById('areaFilter');
                    const inputContainer = document.getElementById('inputContainer');
                    const judulMenu = document.getElementById('judulMenu').innerText;
        
                    const modalApp = document.getElementById('modalApp');
                    if(modalApp) {
                        modalApp.classList.add('ppob-sheet-locked', 'ppob-products-open');
                    }
                    if(areaFilter) areaFilter.style.display = "none";
                    if(btnKembali) btnKembali.style.display = "block";
                    
                        if (judulMenu === "E-Wallet" || judulMenu === "Bebas Nominal Uang Elektronik" || judulMenu === "Token PLN") {
                        if(inputContainer) inputContainer.style.display = "none";
                    } else {
                        if(inputContainer) inputContainer.style.display = "block";
                    }
        
                    if(areaList) {
                        areaList.style.display = "block";
                        areaList.style.maxHeight = "none";
                        areaList.scrollTop = 0;
                    }
                    if(inputQ) inputQ.value = "";
        
                    let isBebasNominal = (namaProvider.toLowerCase().includes('bebas nominal') || namaProvider === 'BBSDN');
                    
                    let res = dataMentah.filter(i => i.produk === namaProvider && i.status === "1");
                    res.sort((a,b)=>parseInt(a.harga)-parseInt(b.harga));
                    
                    let markupTambahan = 0;
                    const config = window.markupConfig || {};
                    if (config[namaProvider] !== undefined) {
                        markupTambahan = parseInt(config[namaProvider]);
                    } else if (config['General'] !== undefined) {
                        markupTambahan = parseInt(config['General']);
                    }
        
                    let html = "";
                        res.forEach(item => {
                        // 1. FILTER: Sembunyikan Kode Bayar & Cek Nama (Agar tidak dobel di menu)
                        const k = item.kode;
                        const hiddenPrefixes = ['BPAM','BPBB','BHOME','BKPR','BKK','BFNC','BYR','PAY','BSAM','BPLA','BNTPLA','BTEL','BBPJS','BCOMET','BCENTRIN','BMST','BTV'];
                        if(k === 'CPLN' || k === 'FLAZZ2200' || (item.produk||'').toUpperCase().includes('CEK NAMA') || hiddenPrefixes.some(p => k.startsWith(p))) return;
        
                        let rawM = config[item.kode] !== undefined ? config[item.kode] : (config[namaProvider] !== undefined ? config[namaProvider] : config['General']);
                        let markupFinal = window.getMarkupValue(rawM, parseInt(item.harga));
                        let hargaFinal = parseInt(item.harga) + markupFinal;
                        
                        // 2. Set Harga 0 untuk Menu Cek (Agar user tahu ini Cek Tagihan)
                        const checkPrefixes = ['CPAM','CPBB','CEK','INQ','CHOME','CKPR','CKK','CFNC','CSAM','CPLA','CNTPLA','CTEL','CBPJS','CCOMET','CCENTRIN','CMST'];
                        if (checkPrefixes.some(p => k.startsWith(p))) hargaFinal = 0;
        
                        let rawDesc = item.keterangan.replace(/H2H/gi, "").trim();
                        let group = (item.produk || "").toLowerCase();
                        let prefix = "";
                        if(!rawDesc.toLowerCase().includes("telkomsel") && (group.includes("telkomsel") || group.includes("tsel"))) prefix = "Tsel ";
                        else if(!rawDesc.toLowerCase().includes("indosat") && (group.includes("indosat") || group.includes("isat"))) prefix = "Isat ";
                        else if(!rawDesc.toLowerCase().includes("xl") && group.includes("xl")) prefix = "XL ";
                        else if(!rawDesc.toLowerCase().includes("axis") && group.includes("axis")) prefix = "Axis ";
                        else if(!rawDesc.toLowerCase().includes("tri") && (group.includes("tri") || group.includes("three"))) prefix = "Tri ";
                        else if(!rawDesc.toLowerCase().includes("smart") && group.includes("smart")) prefix = "Smart ";
                        else if(!rawDesc.toLowerCase().includes("by") && group.includes("by")) prefix = "By.U ";
                        
                    let namaProduk = prefix + rawDesc;
                        
                        // 3. UBAH NAMA TAMPILAN: "Cek..." -> "Cek & Bayar..."
                        if (namaProduk.match(/^(Cek|CEK|Inquiry|INQUIRY)\s/)) {
        namaProduk = namaProduk.replace(/^(Cek|CEK|Inquiry|INQUIRY)\s+/i, "Cek & Bayar ");
                        }
                        
                        let aksiKlik = `siapkanInvoice('${item.kode}','${namaProduk}',${hargaFinal})`;
        
                        html += `<div class="item-produk" onclick="${aksiKlik}">
        <div style="flex:1;">
            <div style="font-weight:bold;font-size:12px;">${namaProduk}</div>
            <div style="font-size:10px; color:#999;">${item.kode}</div>
        </div>
        <div style="font-weight:bold;color:var(--primary);font-size:13px;">Rp ${new Intl.NumberFormat('id-ID').format(hargaFinal)}</div>
                        </div>`;
                    });
                    if(listArea) listArea.innerHTML = html || "<div style='padding:20px; text-align:center; color:#999;'>Produk Tidak Tersedia</div>";
                }
        
                // SMART PREFIX DETECTION (Hanya untuk menu Pulsa/Data)
                inputNomor.addEventListener('input', function() {
                    let num = this.value;
                    let menuSekarang = document.getElementById('judulMenu').innerText;
                    
                    // Batasan Menu yang menggunakan Prefix Detection
                    const menuButuhPrefix = ["Pulsa"];
                    if (!menuButuhPrefix.includes(menuSekarang)) return;
        
                    let op = ""; let allowed = [];
                    if (num.length >= 4) {
                        let p = num.substring(0, 4);
                        if (/^0851/.test(p)) { op = "By.U / Tsel"; allowed = ["By U", "By.U", "Telkomsel"]; }
                        else if (/^08(11|12|13|21|22|23|52|53)/.test(p)) { op = "Telkomsel"; allowed = ["Telkomsel"]; }
                        else if (/^08(14|15|16|55|56|57|58)/.test(p)) { op = "Indosat"; allowed = ["Indosat"]; }
                        else if (/^08(95|96|97|98|99)/.test(p)) { op = "Tri"; allowed = ["Three", "Tri"]; }
                        else if (/^08(17|18|19|59|77|78)/.test(p)) { op = "XL"; allowed = ["XL"]; }
                        else if (/^08(31|32|33|38)/.test(p)) { op = "Axis"; allowed = ["Axis", "XL - Axis"]; }
                        else if (/^08(81|82|83|84|85|86|87|88|89)/.test(p)) { op = "Smartfren"; allowed = ["Smartfren"]; }
                    }
        
                    const btns = document.querySelectorAll('.filter-card');
                    if (op && allowed.length > 0) {
                        badgeOperator.innerText = op; badgeOperator.style.display = "block";
                        let clicked = false;
                        btns.forEach(btn => {
        let prov = ((btn.getAttribute('data-provider') || btn.dataset.provider || btn.innerText || '') + '').toLowerCase();
        let isMatch = allowed.some(key => prov.includes((key || '').toLowerCase()));
        if (isMatch) {
            btn.style.display = 'inline-block';
            if(!clicked) { btn.click(); clicked = true; }
        } else { btn.style.display = 'none'; }
                        });
                    } else {
                        badgeOperator.style.display = "none";
                        btns.forEach(btn => btn.style.display = 'inline-block');
                        if(num.length === 0 && btns.length > 0) btns[0].click();
                    }
                });
        
            // FUNGSI PROSES BEBAS NOMINAL (PENTING: Logika Open Denom)
                        window.prosesBebasNominal = function() {
                    const qty = document.getElementById('inputQty').value;
                    const hp = document.getElementById('nomorHP').value;
                    
                    if(!hp) return window.showNotice('error', 'Gagal', 'Nomor Tujuan wajib diisi!');
                    if(!qty) return window.showNotice('error', 'Gagal', 'Nominal (QTY) wajib diisi!');
                    if(parseInt(qty) < 1000) return window.showNotice('error', 'Gagal', 'Nominal tidak valid');
        
                    // Ambil Markup General sebagai fallback
                    const margin = (markupConfig['General'] || 0);
                    const hargaJual = parseInt(qty) + parseInt(margin);
                    
                    siapkanInvoice('BBSDN', 'Topup Bebas Nominal', hargaJual, qty);
                };
        
        
                        window.siapkanInvoice = function(kode, nama, harga, dariFavorit = false) {
                    const titleMode = "Konfirmasi Pesanan";
                    kode = (kode || '').toString();
                    nama = (nama || kode || 'Produk').toString();
                    harga = parseInt(harga) || 0;
                    const judulMenuEl = document.getElementById('judulMenu');
                    const judulMenu = judulMenuEl ? judulMenuEl.innerText : '';
            if (judulMenu !== "E-Wallet" && judulMenu !== "Bebas Nominal Uang Elektronik" && judulMenu !== "Token PLN" && !dariFavorit) {
                        const hp = document.getElementById('nomorHP').value;
                        if(!hp) return window.showNotice('error', 'Gagal', 'Nomor HP/ID Pelanggan wajib diisi!');
                    }
        
                    let isBebasNominal = (((nama || '').toString().toLowerCase()).includes('bebas nominal') || kode === 'BBSDN');
                    
            let providerKey = "";
                    const n = nama.toUpperCase();
                    if(n.includes("DANA")) providerKey = "DANA";
                    else if(n.includes("OVO")) providerKey = "OVO";
                    else if(n.includes("GOPAY DRIVER")) providerKey = "GOPAY_DRIVER";
                    else if(n.includes("GOPAY") || n.includes("GO-JEK")) providerKey = "GOPAY";
                    else if(n.includes("GRAB DRIVER")) providerKey = "GRAB_DRIVER";
                    else if(n.includes("GRAB")) providerKey = "GRAB";
                    else if(n.includes("SHOPEE")) providerKey = "SHOPEE";
                    else if(n.includes("ISAKU")) providerKey = "ISAKU";
                    else if(n.includes("DOKU")) providerKey = "DOKU";
                    else if(n.includes("KASPRO") || n.includes("KAI PAY")) providerKey = "KASPRO";
            else if(n.includes("ASTRAPAY")) providerKey = "ASTRAPAY";
                    else if(n.includes("PLN")) providerKey = "PLN"; // Aktifkan Mode Cek Nama untuk PLN
        
                    let htmlInvoice = `
                        <div style="background: #f8fafc; border-radius: 15px; padding: 20px; border: 1px solid #edf2f7; margin-bottom: 20px;">
        <div style="text-align: center; margin-bottom: 15px;">
            <div style="font-size: 11px; color: #95a5a6; text-transform: uppercase; letter-spacing: 1px;">${titleMode}</div>
            <div style="font-size: 15px; font-weight: 800; color: #2c3e50; margin-top: 5px;">${nama}</div>
        </div>
        
        <div id="areaNamaTujuan" style="display:none; background: #e6f9ed; color: #27ae60; padding: 12px; border-radius: 10px; margin-bottom: 15px; text-align: center; border: 1px solid #c3e6cb;">
            <div style="font-size: 10px; font-weight: bold; opacity: 0.8;">NAMA TUJUAN:</div>
            <div id="valNamaTujuan" style="font-size: 14px; font-weight: 800;">-</div>
        </div>
        
        <div class="invoice-row" style="border-bottom: 1px dashed #eee; padding-bottom: 10px; margin-bottom: 15px;">
            <span>ID Produk</span>
            <b style="color: #666;">${kode}</b>
        </div>
        <div style="margin-bottom: 15px;">
            <label style="font-size: 10px; font-weight: 700; color: var(--primary); display: block; margin-bottom: 8px; text-transform: uppercase;">Nomor Tujuan / ID Pelanggan</label>
            <div class="input-group" style="margin-bottom: 0;">
                <input type="tel" inputmode="numeric" id="invoiceNomorHP" class="form-input" placeholder="Contoh: 0812xxxx" oninput="window.debounceCekNama('${providerKey}')" style="background: white; border: 2px solid #e1effe; padding-right: 70px;">
                <i class="fas fa-address-card" style="top: 15px;"></i>
                <button type="button" onclick="window.pasteDariClipboard('invoiceNomorHP')" style="position:absolute; right:10px; top:12px; background:var(--primary); color:white; border:none; border-radius:8px; padding:5px 10px; font-size:10px; font-weight:bold; cursor:pointer; z-index:10;">PASTE</button>
            </div>
        </div>`;
        
                    if (isBebasNominal) {
                        htmlInvoice += `
        <div style="margin-bottom: 15px;">
            <label style="font-size: 10px; font-weight: 700; color: var(--success); display: block; margin-bottom: 8px; text-transform: uppercase;">Nominal Top Up</label>
            <div class="input-group" style="margin-bottom: 0;">
                <input type="tel" id="invoiceQty" class="form-input" placeholder="Masukkan Jumlah" oninput="window.hitungHargaBebas(this.value)" style="background: white; border: 2px solid #e6f9ed;">
                <i class="fas fa-coins" style="top: 15px;"></i>
            </div>
        </div>`;
                    }
        
                    htmlInvoice += `
        <div class="invoice-row invoice-total" style="padding-top: 15px; margin-top: 5px;">
            <span>TOTAL BAYAR</span>
            <b id="displayTotalInvoice" style="color: var(--primary); font-size: 18px;">Rp ${new Intl.NumberFormat('id-ID').format(harga)}</b>
        </div>
                        </div>`;
        
                    window.currentInvoiceData = { kode, nama, baseHarga: harga, isBebas: isBebasNominal };
                    document.getElementById('invoiceContent').innerHTML = htmlInvoice;
                    document.getElementById('statusCekNama').style.display = "none";
                    
                    if (document.getElementById('btnKonfirmasiBayar')) {
                        document.getElementById('btnKonfirmasiBayar').disabled = false;
                        document.getElementById('btnKonfirmasiBayar').innerHTML = 'KONFIRMASI BAYAR';
                    }
                    
            if(judulMenu !== "E-Wallet" && judulMenu !== "Token PLN" && !dariFavorit) {
                        document.getElementById('invoiceNomorHP').value = document.getElementById('nomorHP').value;
                        setTimeout(() => window.debounceCekNama(providerKey), 500);
                    }
                    modalInvoice.style.display = "flex";
                }
        
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
                window.tutupModal = () => {
                    const modalApp = document.getElementById('modalApp');
                    if(modalApp) modalApp.classList.remove('ppob-sheet-locked', 'ppob-products-open');
                    modal.style.display = "none";
                };
        
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
        
        
        
                /* PATCH DONI: Produk sering dibeli tersimpan lokal browser */
                window.frequentProductMode = false;
                window.frequentProductKey = 'bhuleemarket_produk_sering_dibeli_v1';
        
                window.getFrequentProducts = function() {
                    try {
                        const raw = localStorage.getItem(window.frequentProductKey);
                        const data = raw ? JSON.parse(raw) : [];
                        return Array.isArray(data) ? data : [];
                    } catch(e) {
                        return [];
                    }
                };
        
                window.saveFrequentProducts = function(list) {
                    try {
                        localStorage.setItem(window.frequentProductKey, JSON.stringify(list || []));
                    } catch(e) {}
                };
        
                window.catatProdukSeringDibeli = function(data, hargaFinal) {
                    try {
                        if(!data || !data.kode || !data.nama) return;
                        let list = window.getFrequentProducts();
                        const kode = String(data.kode);
                        const idx = list.findIndex(x => String(x.kode) === kode);
                        const payload = {
                            kode: kode,
                            nama: String(data.nama || ''),
                            baseHarga: parseInt(data.baseHarga || hargaFinal || 0) || 0,
                            hargaTerakhir: parseInt(hargaFinal || data.baseHarga || 0) || 0,
                            isBebas: !!data.isBebas,
                            count: 1,
                            updatedAt: Date.now()
                        };
                        if(idx >= 0) {
                            list[idx] = Object.assign({}, list[idx], payload, { count: (parseInt(list[idx].count) || 0) + 1 });
                        } else {
                            list.push(payload);
                        }
                        list.sort((a,b) => ((parseInt(b.count)||0) - (parseInt(a.count)||0)) || ((parseInt(b.updatedAt)||0) - (parseInt(a.updatedAt)||0)));
                        window.saveFrequentProducts(list.slice(0, 30));
                        if(window.frequentProductMode) window.renderFrequentProducts();
                    } catch(e) {
                        console.warn('Gagal mencatat produk sering dibeli:', e);
                    }
                };
        
                window.renderFrequentProducts = function() {
                    const wrap = document.getElementById('riwayat-container');
                    if(!wrap) return;
                    const list = window.getFrequentProducts().sort((a,b) => ((parseInt(b.count)||0) - (parseInt(a.count)||0)) || ((parseInt(b.updatedAt)||0) - (parseInt(a.updatedAt)||0))).slice(0, 10);
                    if(!list.length) {
                        wrap.innerHTML = `<div class="history-empty-state"><i class="fas fa-fire"></i><b>Belum ada produk favorit</b><span>Produk akan muncul setelah kamu melakukan pembelian.</span></div>`;
                        return;
                    }
                    let html = '<div class="frequent-product-list">';
                    list.forEach((p, i) => {
                        const nama = String(p.nama || 'Produk').replace(/`/g, '');
                        const kode = String(p.kode || '').replace(/`/g, '');
                        const harga = parseInt(p.baseHarga || p.hargaTerakhir || 0) || 0;
                        const iconHtml = (typeof window.renderHistoryIcon === 'function') ? window.renderHistoryIcon(nama) : '<i class="fas fa-box"></i>';
                        html += `<div class="frequent-product-card" onclick="window.beliUlangProdukSeringDibeli(${i})">
                            <div class="frequent-product-icon">${iconHtml}</div>
                            <div class="frequent-product-info">
                                <div class="frequent-product-name">${nama}</div>
                                <div class="frequent-product-code">${kode}${p.isBebas ? ' • Open Denom' : ''}</div>
                            </div>
                            <div class="frequent-product-right">
                                <div class="frequent-product-price">Rp ${new Intl.NumberFormat('id-ID').format(harga)}</div>
                                <div class="frequent-product-count"><i class="fas fa-repeat"></i> ${parseInt(p.count)||1}x</div>
                            </div>
                        </div>`;
                    });
                    html += '</div>';
                    wrap.innerHTML = html;
                };
        
                window.toggleFrequentProducts = function(forceMode) {
                    const btn = document.getElementById('btnFrequentProducts');
                    const title = document.querySelector('.history-title-main');
                    const sub = document.querySelector('.history-subtitle');
                    const actions = document.querySelector('.history-action-row');
                    window.frequentProductMode = (typeof forceMode === 'boolean') ? forceMode : !window.frequentProductMode;
        
                    if(window.frequentProductMode) {
                        if(btn) {
                            btn.classList.add('active-history');
                            btn.innerHTML = '<i class="fas fa-clock-rotate-left"></i> Kembali ke Riwayat Live';
                        }
                        if(title) title.innerHTML = '<i class="fas fa-fire"></i> Produk Sering Dibeli';
                        if(sub) sub.innerText = '10 produk paling sering kamu beli';
                        if(actions) actions.style.display = 'none';
                        window.renderFrequentProducts();
                    } else {
                        if(btn) {
                            btn.classList.remove('active-history');
                            btn.innerHTML = '<i class="fas fa-fire"></i> Produk sering di beli';
                        }
                        if(title) title.innerHTML = '<i class="fas fa-bolt"></i> Riwayat Live';
                        if(sub) sub.innerText = '10 transaksi terbaru kamu';
                        if(actions) actions.style.display = 'flex';
                        if(window.auth && window.auth.currentUser && typeof window.initRiwayatListener === 'function') {
                            const container = document.getElementById('riwayat-container');
                            if(container) container.innerHTML = "<div class='history-empty-state'><i class='fas fa-circle-notch fa-spin'></i><b>Memuat riwayat</b><span>Sedang mengambil transaksi terbaru...</span></div>";
                            window.initRiwayatListener(window.auth.currentUser);
                        }
                    }
                };
        
                window.beliUlangProdukSeringDibeli = function(index) {
                    const list = window.getFrequentProducts().sort((a,b) => ((parseInt(b.count)||0) - (parseInt(a.count)||0)) || ((parseInt(b.updatedAt)||0) - (parseInt(a.updatedAt)||0))).slice(0, 10);
                    const p = list[index];
                    if(!p) return window.showNotice('error', 'Gagal', 'Data produk tidak ditemukan.');
                    if(typeof window.siapkanInvoice !== 'function') return window.showNotice('error', 'Gagal', 'Fungsi pembayaran belum siap.');
                    window.siapkanInvoice(p.kode, p.nama, parseInt(p.baseHarga || p.hargaTerakhir || 0) || 0, true);
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
        if(window.catatProdukSeringDibeli) window.catatProdukSeringDibeli(data, hargaFinal);
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
                        window.showNotice('error', 'Sistem Error', 'Gagal menghubungkan ke server.');
                    }
                }
        
                

        
        
            
;
        
        
                

        
                        window.kembaliKeFilter = function() {
                    const modalApp = document.getElementById('modalApp');
                    if(modalApp) {
                        modalApp.classList.add('ppob-sheet-locked');
                        modalApp.classList.remove('ppob-products-open');
                    }
                    let area = document.getElementById('areaFilter');
                    if(area) {
                        if(window.isListModeContext) {
                            area.style.display = "block";
                        } else {
                            area.style.display = "grid";
                        }
                        area.scrollTop = 0;
                    }
                    const inputContainer = document.getElementById('inputContainer');
                    if (inputContainer) inputContainer.style.display = "none";
                    const listArea = document.getElementById('listProdukArea');
                    if (listArea) {
                        listArea.innerHTML = "";
                        listArea.style.display = "none";
                        listArea.style.maxHeight = "";
                    }
                    const btn = document.getElementById('btnKembali');
                    if (btn) btn.style.display = "none";
                    document.querySelectorAll('.filter-card, .filter-card-list').forEach(b => b.classList.remove('active'));
                }
        
                
        
                window.applySavedTheme = function() {
                    const savedTheme = localStorage.getItem('bhuleemarket_theme') || 'light';
                    const isDark = savedTheme === 'dark';
                    document.body.classList.toggle('dark-theme', isDark);
                    const icon = document.getElementById('themeToggleIcon');
                    if(icon) icon.className = isDark ? 'fas fa-sun' : 'fas fa-moon';
                    const btn = document.querySelector('.theme-toggle-btn');
                    if(btn) btn.setAttribute('title', isDark ? 'Beralih ke Tema Terang' : 'Beralih ke Tema Gelap');
                };
        
                window.toggleDarkTheme = function() {
                    const isDark = !document.body.classList.contains('dark-theme');
                    document.body.classList.toggle('dark-theme', isDark);
                    localStorage.setItem('bhuleemarket_theme', isDark ? 'dark' : 'light');
                    const icon = document.getElementById('themeToggleIcon');
                    if(icon) icon.className = isDark ? 'fas fa-sun' : 'fas fa-moon';
                    const btn = document.querySelector('.theme-toggle-btn');
                    if(btn) btn.setAttribute('title', isDark ? 'Beralih ke Tema Terang' : 'Beralih ke Tema Gelap');
                };
        
                document.addEventListener('DOMContentLoaded', function(){
                    if(window.applySavedTheme) window.applySavedTheme();
                });
        
                function getHistoryMenuIcon(text) {
                    const p = (text || '').toLowerCase();
                    const imgMap = [
                        {k:['telkomsel','tsel','simpati','kartu as','as '], img:'icons/Telkomsel.png'},
                        {k:['indosat','im3','mentari'], img:'icons/Indosat.png'},
                        {k:['by.u','byu'], img:'icons/By.U.png'},
                        {k:['smartfren','smart'], img:'icons/Smartfren.png'},
                        {k:['tri','three','3 '], img:'icons/Tri.png'},
                        {k:['xl','xtra','hotrod'], img:'icons/XL.png'},
                        {k:['axis','aigo','bronet'], img:'icons/Axis.png'},
                        {k:['grab'], img:'icons/GRAB.png'},
                        {k:['gopay','go pay'], img:'icons/Gopay.png'},
                        {k:['dana'], img:'icons/DANA.png'},
                        {k:['ovo'], img:'icons/OVO.png'},
                        {k:['shopee'], img:'icons/ShopeePay.png'},
                        {k:['linkaja'], img:'icons/LinkAja.png'}
                    ];
                    for(const row of imgMap) {
                        if(row.k.some(key => p.includes(key)) && row.img) return {type:'img', value:row.img};
                    }
                    if(p.includes('pln') || p.includes('token')) return {type:'icon', value:'fa-bolt'};
                    if(p.includes('game') || p.includes('diamond') || p.includes('free fire') || p.includes(' ff') || p.includes('mobile legend') || p.includes(' ml') || p.includes('pubg')) return {type:'icon', value:'fa-gamepad'};
                    if(p.includes('tagihan') || p.includes('pbb') || p.includes('pascabayar') || p.includes('halo')) return {type:'icon', value:'fa-file-invoice-dollar'};
                    if(p.includes('wallet') || p.includes('saldo') || p.includes('topup')) return {type:'icon', value:'fa-wallet'};
                    if(p.includes('akrab') || p.includes('paket') || p.includes('data') || p.includes('pulsa')) return {type:'icon', value:'fa-mobile-alt'};
                    if(p.includes('transfer')) return {type:'icon', value:'fa-exchange-alt'};
                    return {type:'icon', value:'fa-receipt'};
                }
        
                function renderHistoryIcon(text) {
                    const info = getHistoryMenuIcon(text);
                    if(info.type === 'img') return `<img src="${info.value}" alt="icon" onerror="this.outerHTML='<i class=\'fas fa-receipt\'></i>'">`;
                    return `<i class="fas ${info.value}"></i>`;
                }
        
                window.toggleMenuLainnya = function() {
                    const drawer = document.getElementById('menuDrawer');
                    const btn = document.getElementById('btnMore');
                    
                    if (drawer.classList.contains('expanded')) {
                        drawer.classList.remove('expanded');
                        btn.innerHTML = '<i class="fas fa-chevron-down"></i> Menu Lainnya';
                    } else {
                        drawer.classList.add('expanded');
                        btn.innerHTML = '<i class="fas fa-chevron-up"></i> Tutup';
                    }
                }
        
        
        // PATCH DONI: Integrasi Buku Warung Server public_html/Buku/apibuku.php
        window.BUKU_API_URL = 'Buku/apibuku.php';
        window.bukuFilterAktif = 'semua';
        window.bukuCache = [];
        
        window.formatRupiahBuku = function(n) {
            return 'Rp ' + new Intl.NumberFormat('id-ID').format(parseInt(n || 0));
        };
        
        window.bukuRequest = async function(action, payload = {}) {
            const user = window.auth && window.auth.currentUser;
            if(!user) throw new Error('User belum login');
            const body = Object.assign({ uid: user.uid, email: user.email || '' }, payload);
            const req = await fetch(window.BUKU_API_URL + '?action=' + encodeURIComponent(action), {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(body)
            });
            const text = await req.text();
            let res;
            try { res = JSON.parse(text); } catch(e) { throw new Error('Respon apibuku.php bukan JSON: ' + text.slice(0, 80)); }
            if(res.status !== 'success') throw new Error(res.message || 'Gagal memproses Buku');
            return res;
        };
        
        
        window.syncBukuDigital = async function(data) {
            // PATCH DONI: Buku dibuat manual saja, tidak mengambil/mencatat data dari riwayat digital.
            return;
        };
        
        window.syncBukuFisik = async function(data, idDoc) {
            // PATCH DONI: Buku dibuat manual saja, tidak mengambil/mencatat data dari pesanan fisik otomatis.
            return;
        };
        
        
        
        window.getBukuToday = function() {
            const d = new Date();
            d.setMinutes(d.getMinutes() - d.getTimezoneOffset());
            return d.toISOString().slice(0,10);
        };
        
        window.bukuTanggalAktif = window.getBukuToday();
        window.bukuRekapBulanAktif = window.getBukuToday().slice(0,7);
        
        window.formatTanggalBuku = function(dateStr) {
            if(!dateStr) return '-';
            const parts = String(dateStr).slice(0,10).split('-');
            if(parts.length !== 3) return dateStr;
            const d = new Date(Number(parts[0]), Number(parts[1]) - 1, Number(parts[2]));
            return d.toLocaleDateString('id-ID', { weekday:'long', day:'2-digit', month:'long', year:'numeric' });
        };
        
        window.formatBulanBuku = function(monthStr) {
            const parts = String(monthStr || '').split('-');
            if(parts.length !== 2) return 'Bulan ini';
            return new Date(Number(parts[0]), Number(parts[1]) - 1, 1).toLocaleDateString('id-ID', { month:'long', year:'numeric' });
        };
        
        window.getTanggalRowBuku = function(row) {
            return String((row && (row.tanggal || row.created_at)) || '').slice(0,10);
        };
        
        window.loadBukuRekap = async function() {
            const list = document.getElementById('bukuList');
            if(!list) return;
            if(!window.bukuTanggalAktif) window.bukuTanggalAktif = window.getBukuToday();
            list.innerHTML = '<div class="buku-empty"><i class="fas fa-circle-notch fa-spin"></i><br>Memuat data buku...</div>';
            try {
                const res = await window.bukuRequest('list', {});
                window.bukuCache = Array.isArray(res.data) ? res.data : [];
                window.renderBukuRekap(window.bukuCache);
                if(document.getElementById('modalBukuRekap')?.classList.contains('show')) window.renderRekapBukuBulanan();
            } catch(e) {
                list.innerHTML = '<div class="buku-empty" style="color:#ef4444;">Gagal memuat Buku.<br>' + e.message + '<br><br>Pastikan file <b>Buku/apibuku.php</b> sudah dibuat.</div>';
            }
        };
        
        window.renderBukuRekap = function(rows) {
            rows = Array.isArray(rows) ? rows : [];
            const today = window.getBukuToday();
            const selectedDate = window.bukuTanggalAktif || today;
            let inToday=0, outToday=0, inMonth=0, outMonth=0, inDigital=0, inFisik=0;
            rows.forEach(r => {
                const nominal = parseInt(r.nominal || 0);
                const jenis = String(r.jenis || '').toLowerCase();
                const sumber = String(r.sumber || '').toLowerCase();
                const tgl = window.getTanggalRowBuku(r);
                const bln = tgl.slice(0,7);
                if(jenis === 'pemasukan') {
                    if(tgl === today) inToday += nominal;
                    if(bln === today.slice(0,7)) inMonth += nominal;
                    if(sumber === 'digital') inDigital += nominal;
                    if(sumber === 'fisik' || sumber === 'manual') inFisik += nominal;
                } else {
                    if(tgl === today) outToday += nominal;
                    if(bln === today.slice(0,7)) outMonth += nominal;
                }
            });
            const setText = (id, val) => { const el = document.getElementById(id); if(el) el.innerText = window.formatRupiahBuku(val); };
            setText('bukuHariMasuk', inToday);
            setText('bukuHariKeluar', outToday);
            setText('bukuHariLaba', inToday - outToday);
            setText('bukuBulanMasuk', inMonth);
            setText('bukuBulanKeluar', outMonth);
            setText('bukuBulanLaba', inMonth - outMonth);
            setText('bukuDigitalMasuk', inDigital);
            setText('bukuFisikMasuk', inFisik);
        
            const input = document.getElementById('bukuTanggalInput');
            if(input) input.value = selectedDate;
            const label = document.getElementById('bukuTanggalLabel');
            if(label) label.innerText = selectedDate === today ? 'Hari ini' : window.formatTanggalBuku(selectedDate);
        
            let filtered = rows.filter(r => window.getTanggalRowBuku(r) === selectedDate);
            if(window.bukuFilterAktif !== 'semua') filtered = filtered.filter(r => (String(r.sumber || '') + ' ' + String(r.jenis || '')).toLowerCase().includes(window.bukuFilterAktif));
            filtered = filtered.slice().sort((a,b) => String(b.tanggal || b.created_at || '').localeCompare(String(a.tanggal || a.created_at || '')));
            const list = document.getElementById('bukuList');
            if(!list) return;
            if(filtered.length === 0) {
                list.innerHTML = '<div class="buku-empty"><i class="fas fa-book-open" style="font-size:34px; margin-bottom:8px;"></i><br>Belum ada catatan buku pada<br><b>' + window.formatTanggalBuku(selectedDate) + '</b>.</div>';
                return;
            }
            list.innerHTML = filtered.map(r => {
                const jenis = String(r.jenis || '').toLowerCase();
                const isIn = jenis !== 'pengeluaran';
                const sumber = String(r.sumber || 'manual').toUpperCase();
                const tanggal = r.tanggal || r.created_at || '-';
                const hapusBtn = String(r.mode || '').toLowerCase() === 'manual' || String(r.sumber || '').toLowerCase() === 'manual' ? `<i class="fas fa-trash-alt" style="color:#cbd5e1; padding:6px;" onclick="hapusBukuManual('${r.id || r.ref_id || ''}')"></i>` : '';
                return `<div class="buku-item">
                    <div class="buku-item-icon ${isIn ? 'in' : 'out'}"><i class="fas ${isIn ? 'fa-arrow-down' : 'fa-arrow-up'}"></i></div>
                    <div class="buku-item-main">
                        <div class="buku-item-title">${r.judul || '-'}</div>
                        <div class="buku-item-meta">${sumber} • ${tanggal}</div>
                    </div>
                    <div>
                        <div class="buku-item-amount ${isIn ? 'in' : 'out'}">${isIn ? '+' : '-'} ${window.formatRupiahBuku(r.nominal || 0)}</div>
                        ${hapusBtn}
                    </div>
                </div>`;
            }).join('');
        };
        
        window.setTanggalBuku = function(dateStr) {
            if(!dateStr) return;
            window.bukuTanggalAktif = String(dateStr).slice(0,10);
            window.renderBukuRekap(window.bukuCache || []);
        };
        
        window.geserTanggalBuku = function(step) {
            const base = window.bukuTanggalAktif || window.getBukuToday();
            const parts = base.split('-');
            const d = new Date(Number(parts[0]), Number(parts[1]) - 1, Number(parts[2]));
            d.setDate(d.getDate() + Number(step || 0));
            d.setMinutes(d.getMinutes() - d.getTimezoneOffset());
            window.setTanggalBuku(d.toISOString().slice(0,10));
        };
        
        window.setBulanRekap = function(monthStr) {
            if(!monthStr) return;
            window.bukuRekapBulanAktif = String(monthStr).slice(0,7);
            window.renderRekapBukuBulanan();
        };
        
        window.geserBulanRekap = function(step) {
            const base = window.bukuRekapBulanAktif || window.getBukuToday().slice(0,7);
            const parts = base.split('-');
            const d = new Date(Number(parts[0]), Number(parts[1]) - 1 + Number(step || 0), 1);
            d.setMinutes(d.getMinutes() - d.getTimezoneOffset());
            window.setBulanRekap(d.toISOString().slice(0,7));
        };
        
        window.bukaRekapBukuBulanan = function() {
            window.bukuRekapBulanAktif = window.bukuRekapBulanAktif || window.getBukuToday().slice(0,7);
            const modal = document.getElementById('modalBukuRekap');
            if(modal) modal.classList.add('show');
            window.renderRekapBukuBulanan();
        };
        
        window.tutupRekapBukuBulanan = function() {
            const modal = document.getElementById('modalBukuRekap');
            if(modal) modal.classList.remove('show');
        };
        
        window.renderRekapBukuBulanan = function() {
            const area = document.getElementById('bukuRekapBulananArea');
            const label = document.getElementById('bukuRekapBulanLabel');
            if(!area) return;
            const month = window.bukuRekapBulanAktif || window.getBukuToday().slice(0,7);
            if(label) label.innerText = window.formatBulanBuku(month);
            const rows = Array.isArray(window.bukuCache) ? window.bukuCache : [];
            const harian = {};
            let totalMasuk = 0, totalKeluar = 0;
            rows.forEach(r => {
                const tgl = window.getTanggalRowBuku(r);
                if(tgl.slice(0,7) !== month) return;
                const nominal = parseInt(r.nominal || 0);
                const jenis = String(r.jenis || '').toLowerCase();
                if(!harian[tgl]) harian[tgl] = { masuk:0, keluar:0 };
                if(jenis === 'pengeluaran') {
                    harian[tgl].keluar += nominal;
                    totalKeluar += nominal;
                } else {
                    harian[tgl].masuk += nominal;
                    totalMasuk += nominal;
                }
            });
            const dates = Object.keys(harian).sort();
            if(dates.length === 0) {
                area.innerHTML = '<div class="buku-empty" style="margin:0; border:0;">Belum ada rekap untuk ' + window.formatBulanBuku(month) + '.</div>';
                return;
            }
            const body = dates.map(tgl => {
                const d = harian[tgl];
                return `<tr><td>${window.formatTanggalBuku(tgl)}</td><td>${window.formatRupiahBuku(d.masuk)}</td><td>${window.formatRupiahBuku(d.keluar)}</td></tr>`;
            }).join('');
            const labaBersih = totalMasuk - totalKeluar;
            area.innerHTML = `<table class="buku-rekap-table">
                <thead><tr><th>Tanggal</th><th>Pemasukan</th><th>Pengeluaran</th></tr></thead>
                <tbody>
                    ${body}
                    <tr class="buku-rekap-total-row"><td>Total Pemasukan</td><td colspan="2">${window.formatRupiahBuku(totalMasuk)}</td></tr>
                    <tr class="buku-rekap-total-row"><td>Total Pengeluaran</td><td colspan="2">${window.formatRupiahBuku(totalKeluar)}</td></tr>
                    <tr class="buku-rekap-profit-row"><td>Total Laba Bersih</td><td colspan="2">${window.formatRupiahBuku(labaBersih)}</td></tr>
                </tbody>
            </table>`;
        };
        
        window.downloadRekapBukuPDF = function() {
            const month = window.bukuRekapBulanAktif || window.getBukuToday().slice(0,7);
            const rows = Array.isArray(window.bukuCache) ? window.bukuCache : [];
            const harian = {};
            let totalMasuk = 0, totalKeluar = 0;
            rows.forEach(r => {
                const tgl = window.getTanggalRowBuku(r);
                if(tgl.slice(0,7) !== month) return;
                const nominal = parseInt(r.nominal || 0);
                const jenis = String(r.jenis || '').toLowerCase();
                if(!harian[tgl]) harian[tgl] = { masuk:0, keluar:0 };
                if(jenis === 'pengeluaran') {
                    harian[tgl].keluar += nominal;
                    totalKeluar += nominal;
                } else {
                    harian[tgl].masuk += nominal;
                    totalMasuk += nominal;
                }
            });
            const dates = Object.keys(harian).sort();
            if(dates.length === 0) return alert('Belum ada data rekap untuk bulan ini.');
            if(!window.jspdf || !window.jspdf.jsPDF) return alert('Library PDF belum termuat. Pastikan koneksi internet aktif lalu coba lagi.');
        
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF({ orientation:'portrait', unit:'mm', format:'a4' });
            const pageW = doc.internal.pageSize.getWidth();
            const margin = 12;
            let y = 14;
            const lineH = 8;
            const colTanggal = margin;
            const colMasuk = 92;
            const colKeluar = 148;
            const title = 'Rekap Buku - ' + window.formatBulanBuku(month);
            const labaBersih = totalMasuk - totalKeluar;
        
            doc.setFont('helvetica', 'bold');
            doc.setFontSize(15);
            doc.text(title, margin, y);
            y += 7;
            doc.setFont('helvetica', 'normal');
            doc.setFontSize(9);
            doc.text('Diunduh pada ' + new Date().toLocaleString('id-ID'), margin, y);
            y += 10;
        
            const drawHeader = () => {
                doc.setFillColor(241,245,249);
                doc.rect(margin, y - 5.5, pageW - (margin * 2), 8, 'F');
                doc.setFont('helvetica', 'bold');
                doc.setFontSize(9);
                doc.text('Tanggal', colTanggal + 2, y);
                doc.text('Pemasukan', colMasuk + 2, y);
                doc.text('Pengeluaran', colKeluar + 2, y);
                y += lineH;
                doc.setDrawColor(203,213,225);
                doc.line(margin, y - 5, pageW - margin, y - 5);
                doc.setFont('helvetica', 'normal');
            };
        
            drawHeader();
            dates.forEach(tgl => {
                if(y > 276) {
                    doc.addPage();
                    y = 16;
                    drawHeader();
                }
                const d = harian[tgl];
                doc.setFontSize(8.5);
                doc.text(window.formatTanggalBuku(tgl), colTanggal + 2, y);
                doc.text(window.formatRupiahBuku(d.masuk), colMasuk + 2, y);
                doc.text(window.formatRupiahBuku(d.keluar), colKeluar + 2, y);
                doc.setDrawColor(226,232,240);
                doc.line(margin, y + 2.5, pageW - margin, y + 2.5);
                y += lineH;
            });
        
            if(y > 250) {
                doc.addPage();
                y = 16;
            }
            y += 4;
            doc.setFont('helvetica', 'bold');
            doc.setFontSize(10);
            doc.text('Ringkasan Bulanan', margin, y);
            y += 8;
            doc.setFontSize(9);
            doc.text('Total Pemasukan', margin + 2, y);
            doc.text(window.formatRupiahBuku(totalMasuk), colMasuk + 2, y);
            y += 7;
            doc.text('Total Pengeluaran', margin + 2, y);
            doc.text(window.formatRupiahBuku(totalKeluar), colMasuk + 2, y);
            y += 7;
            doc.setFontSize(11);
            doc.text('Total Laba Bersih', margin + 2, y);
            doc.text(window.formatRupiahBuku(labaBersih), colMasuk + 2, y);
        
            doc.save('rekap-buku-' + month + '.pdf');
        };
        
        window.setBukuFilter = function(filter, el) {
            window.bukuFilterAktif = filter;
            document.querySelectorAll('.buku-filter button').forEach(b => b.classList.remove('active'));
            if(el) el.classList.add('active');
            window.renderBukuRekap(window.bukuCache || []);
        };
        
        
        window.tambahBukuManual = function(jenis) {
            window.bukaBukuManualForm(jenis);
        };
        
        window.bukaBukuManualForm = function(jenis) {
            jenis = jenis === 'pengeluaran' ? 'pengeluaran' : 'pemasukan';
            const isOut = jenis === 'pengeluaran';
            const modal = document.getElementById('modalBukuManual');
            const head = document.getElementById('bukuModalHead');
            const title = document.getElementById('bukuModalTitle');
            const sub = document.getElementById('bukuModalSub');
            const saveBtn = document.getElementById('bukuSimpanBtn');
            const jenisInput = document.getElementById('bukuJenisInput');
            const judulInput = document.getElementById('bukuJudulInput');
            const nominalInput = document.getElementById('bukuNominalInput');
            const catatanInput = document.getElementById('bukuCatatanInput');
            if(!modal) return;
        
            jenisInput.value = jenis;
            title.innerText = isOut ? 'Tambah Pengeluaran' : 'Tambah Pemasukan';
            sub.innerText = isOut ? 'Catat modal, belanja barang, atau biaya lain.' : 'Catat hasil jualan manual seperti kopi, makanan, atau barang fisik.';
            head.className = 'buku-modal-head ' + (isOut ? 'out' : 'in');
            saveBtn.className = 'buku-modal-btn save ' + (isOut ? 'out' : 'in');
        
            judulInput.value = '';
            nominalInput.value = '';
            catatanInput.value = '';
            modal.classList.add('show');
            setTimeout(() => judulInput.focus(), 120);
        };
        
        window.tutupBukuManualForm = function() {
            const modal = document.getElementById('modalBukuManual');
            if(modal) modal.classList.remove('show');
        };
        
        window.simpanBukuManualForm = async function() {
            const jenis = document.getElementById('bukuJenisInput').value === 'pengeluaran' ? 'pengeluaran' : 'pemasukan';
            const judul = (document.getElementById('bukuJudulInput').value || '').trim();
            const nominal = parseInt(String(document.getElementById('bukuNominalInput').value || '').replace(/[^0-9]/g, ''));
            const catatan = (document.getElementById('bukuCatatanInput').value || '').trim();
            const label = jenis === 'pengeluaran' ? 'Pengeluaran' : 'Pemasukan';
            const saveBtn = document.getElementById('bukuSimpanBtn');
        
            if(!judul) {
                alert('Judul catatan wajib diisi.');
                document.getElementById('bukuJudulInput').focus();
                return;
            }
            if(!nominal || nominal <= 0) {
                alert('Nominal tidak valid.');
                document.getElementById('bukuNominalInput').focus();
                return;
            }
        
            try {
                if(saveBtn) {
                    saveBtn.disabled = true;
                    saveBtn.innerHTML = '<i class="fas fa-circle-notch fa-spin"></i> Menyimpan...';
                }
                await window.bukuRequest('add_manual', { jenis, sumber: 'manual', judul, nominal, catatan });
                window.tutupBukuManualForm();
                window.showNotice ? window.showNotice('success', 'Berhasil', label + ' berhasil dicatat.') : alert(label + ' berhasil dicatat.');
                window.loadBukuRekap();
            } catch(e) {
                alert('Gagal: ' + e.message);
            } finally {
                if(saveBtn) {
                    saveBtn.disabled = false;
                    saveBtn.innerHTML = '<i class="fas fa-save"></i> Simpan';
                }
            }
        };
        
        
        window.hapusBukuManual = async function(id) {
            if(!id || !(await appConfirm('Konfirmasi', 'Hapus catatan manual ini?'))) return;
            try {
                await window.bukuRequest('delete', { id });
                window.loadBukuRekap();
            } catch(e) { alert('Gagal hapus: ' + e.message); }
        };
        
        
        window.keranjang = [];
        
                window.navSwitch = (menu, el) => {
                    // Reset Style Nav
                    document.querySelectorAll('.nav-item').forEach(i => i.classList.remove('active'));
                    if(el) el.classList.add('active');
        
                    // Sembunyikan Semua Halaman & Elemen Home
                    document.getElementById('globalLoader').style.display = 'none';
                    document.querySelector('.header').style.display = 'none';
                    document.querySelector('.saldo-box').style.display = 'none';
                    document.querySelector('.menu-container').style.display = 'none';
                    document.getElementById('riwayat-container').style.display = 'none';
                    const frequentSwitch = document.getElementById('frequentProductSwitch'); if(frequentSwitch) frequentSwitch.style.display = 'none';
                    document.getElementById('shop-container').style.display = 'none';
                    document.getElementById('btnMoreContainer').style.display = 'none';
                    document.querySelector('.history-container').style.display = 'none';
                    document.getElementById('liveHistoryHeader').style.display = 'none'; // Fix: Sembunyikan Header Riwayat
                    document.querySelectorAll('.full-page').forEach(p => p.style.display = 'none');
        
                    // Tampilkan Judul Header Menu Utama Khusus di Home
                    const mainHeaderElements = [document.querySelector('.header'), document.querySelector('.saldo-box'), document.querySelector('.menu-container'), document.getElementById('shop-container'), document.querySelector('.history-container')];
        
                    if(menu === 'home') {
                        mainHeaderElements.forEach(e => { if(e) e.style.display = 'block'; });
                        document.querySelector('.saldo-box').style.display = 'flex'; 
                        document.getElementById('shop-container').style.display = 'grid';
                        document.getElementById('liveHistoryHeader').style.display = 'flex'; // Fix: Tampilkan kembali di Home
                        const frequentSwitch = document.getElementById('frequentProductSwitch'); if(frequentSwitch) frequentSwitch.style.display = 'flex';
                        if(window.frequentProductMode) window.toggleFrequentProducts(false);
                        window.scrollTo({top: 0, behavior: 'smooth'});
                    } else if(menu === 'shop_full') {
                        document.getElementById('pageAllProduk').style.display = 'block';
                        renderFullShop();
                    } else if(menu === 'etalase') {
                        document.getElementById('pageEtalase').style.display = 'block';
                        renderKeranjang();
            } else if(menu === 'akrab_spesial') {
                        document.getElementById('pageAkrabSpesial').style.display = 'block';
                        window.renderAkrabSystem();
        
                    } else if(menu === 'lapak') {
                        document.getElementById('pageLapak').style.display = 'block';
                        switchLapakTab('barang');
                    } else if(menu === 'pesanan_fisik') {
                        document.getElementById('pagePesananFisik').style.display = 'block';
                        loadPesananFisik();
                    } else if(menu === 'buku') {
                        document.getElementById('pageBuku').style.display = 'block';
                        window.loadBukuRekap();
                    } else if(menu === 'profil') {
                        document.getElementById('pageProfil').style.display = 'block';
                        loadProfileData();
                    }
                };
        
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
                    
                    area.innerHTML = "<p style='text-align:center;color:#999'>Memuat produk Anda...</p>";
        
                    // Query Produk berdasarkan UID Seller
                    const q = window.query(window.collection(window.db, "produk"), window.where("seller_uid", "==", user.uid));
                    
                    window.onSnapshot(q, (snap) => {
                        let html = "";
                        if (snap.empty) {
        area.innerHTML = "<div style='text-align:center; padding:20px; color:#999; border:1px dashed #ccc; border-radius:10px;'>Belum ada barang jualan.<br>Silakan tambah produk di atas.</div>";
        return;
                        }
        
                        snap.forEach(d => {
        const p = d.data();
        html += `<div class="cart-item">
            <img src="${p.img||'https://via.placeholder.com/60'}" class="cart-img" onerror="this.src='https://via.placeholder.com/60'">
            <div class="cart-desc">
                <b style="font-size:13px;">${p.nama}</b>
                <span style="font-size:12px; color:var(--primary); font-weight:bold;">Rp ${new Intl.NumberFormat('id-ID').format(p.harga)}</span>
            </div>
            <div style="display:flex; gap:10px;">
                <i class="fas fa-edit" style="color:#f39c12; cursor:pointer;" onclick="editProdukLapak('${d.id}', '${p.nama}', ${p.harga}, '${p.img||''}')"></i>
                <i class="fas fa-trash-alt" style="color:#e74c3c; cursor:pointer;" onclick="hapusProdukLapak('${d.id}')"></i>
            </div>
        </div>`;
                        });
                        area.innerHTML = html;
                    }, (error) => {
                        console.error("Error load lapak:", error);
                        area.innerHTML = "<p style='color:red; text-align:center;'>Gagal memuat data.</p>";
                    });
                };
        
        
                window.tambahProdukLapak = async () => {
                    const user = window.auth.currentUser;
                    const nama = document.getElementById('lapakNama').value;
                    const harga = document.getElementById('lapakHarga').value;
                    const fileInput = document.getElementById('fileUserLapak');
                    const urlInput = document.getElementById('lapakImg');
                    const btn = event.currentTarget;
                    const oriHtml = btn.innerHTML;
                    
                    if(!nama || !harga) return alert("Nama dan Harga wajib diisi!");
        
                    btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Memposting...';
                    btn.disabled = true;
        
                    let finalUrl = urlInput.value;
        
                    try {
                        // 1. Upload Otomatis
                        if(fileInput.files.length > 0) {
         const file = fileInput.files[0];
         if(file.size > 2 * 1024 * 1024) throw new Error("File maks 2MB!");
        
         const formData = new FormData();
         formData.append('file_etalase', file);
        
         const req = await fetch('upload_etalase.php', { method: 'POST', body: formData });
         const raw = await req.text();
         let res;
         try { res = JSON.parse(raw); } catch(e) { throw new Error("Respon server error"); }
        
         if(res.status === 'success') finalUrl = res.url;
         else throw new Error(res.message || "Gagal upload");
                        }
        
                    // 2. Simpan Firestore
                        await window.addDoc(window.collection(window.db, "produk"), {
        nama: nama,
        harga: parseInt(harga),
        berat: parseInt(document.getElementById('lapakBerat').value) || 1000,
        img: finalUrl,
        seller_uid: user.uid,
        kategori: "FISIK_USER",
        tipe: "fisik"
                        });
                        alert("Barang berhasil diposting!");
                        document.getElementById('lapakNama').value = "";
                        document.getElementById('lapakHarga').value = "";
                        document.getElementById('lapakBerat').value = "";
                        document.getElementById('lapakImg').value = "";
                        fileInput.value = "";
        
                    } catch(e) { 
                        alert("Gagal: " + e.message); 
                    } finally {
                        btn.innerHTML = oriHtml;
                        btn.disabled = false;
                    }
                };
        
                window.hapusProdukLapak = async (id) => {
                    if(await appConfirm('Konfirmasi', 'Hapus barang ini?')) await window.deleteDoc(window.doc(window.db, "produk", id));
                };
        
                window.editProdukLapak = (id, nama, harga, img) => {
                    document.getElementById('editLapakId').value = id;
                    document.getElementById('editLapakNama').value = nama;
                    document.getElementById('editLapakHarga').value = harga;
                    document.getElementById('editLapakImg').value = img;
                    document.getElementById('modalEditLapak').style.display = 'flex';
                };
        
                
                        window.uploadGambarEtalaseUser = async (inputId, outputId) => {
                    const fileInput = document.getElementById(inputId);
                    const output = document.getElementById(outputId);
                    
                    if(fileInput.files.length === 0) return alert("Pilih file gambar dulu!");
                    
                    // Validasi Ukuran: Maksimal 2MB
                    const file = fileInput.files[0];
                    if(file.size > 2 * 1024 * 1024) {
                        return alert("Gagal: Ukuran gambar terlalu besar (Maks 2MB)!");
                    }
                    
                    const formData = new FormData();
                    formData.append('file_etalase', file);
                    
                    const btn = event.currentTarget;
                    const oriText = btn.innerHTML;
                    btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
                    btn.disabled = true;
        
                    try {
                        const req = await fetch('upload_etalase.php', {
        method: 'POST',
        body: formData
                        });
                        
                        // Membaca sebagai teks untuk menangani error HTML dari server
                        const rawText = await req.text();
                        let res;
                        try {
        res = JSON.parse(rawText);
                        } catch (e) {
        console.error("Respon mentah server:", rawText);
        throw new Error("Format respon server tidak valid (Bukan JSON).");
                        }
                        
                        if(res.status === 'success') {
        output.value = res.url;
        alert("Upload Sukses!");
                        } else {
        alert("Gagal: " + (res.message || 'Error'));
                        }
                    } catch(e) {
                        alert("Terjadi Kesalahan: " + e.message);
                    } finally {
                        btn.innerHTML = oriText;
                        btn.disabled = false;
                    }
                };
        
        window.simpanEditLapak = async () => {
                    const id = document.getElementById('editLapakId').value;
                    try {
                        await window.updateDoc(window.doc(window.db, "produk", id), {
        nama: document.getElementById('editLapakNama').value,
        harga: parseInt(document.getElementById('editLapakHarga').value),
        img: document.getElementById('editLapakImg').value
                        });
                        alert("Berhasil diupdate!");
                        document.getElementById('modalEditLapak').style.display = 'none';
                    } catch(e) { alert("Gagal: " + e.message); }
                };
        
        window.loadProfileData = async () => {
                     const user = window.auth.currentUser;
                     if(!user) return;
                     const d = await window.getDoc(window.doc(window.db, "users", user.uid));
                     if(d.exists()) {
                         const data = d.data();
                         window.currentUserProfileData = data;
                         if (window.refreshProfilePhotoUI && window.getProfileUsername) {
                             window.refreshProfilePhotoUI(window.getProfileUsername(data, user), true);
                         }
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
        
                
        

                
                // PATCH DONI: Sanitizer tambahan untuk data lama yang sudah terlanjur menyimpan msg mentah provider.
                window.cleanSafeSNRiwayat = function(txt, fallback = 'Status transaksi sedang diproses') {
                    let s = String(txt || '').trim();
                    if (!s || s === 'undefined' || s === 'null') return '-';
                    if (/(^|[\s,{])req\s*:\s*topup/i.test(s) || /kodereseller\s*:/i.test(s) || /pin\s*:/i.test(s) || /apikey\s*[:=]/i.test(s) || /token\s*[:=]/i.test(s)) {
                        if (s.includes('#')) {
                            s = s.substring(s.indexOf('#') + 1).trim();
                            return s.replace(/\s*@\d{4}-\d{2}-\d{2}\s+\d{2}:\d{2}:\d{2}$/, '').trim();
                        }
                        const statusMatch = s.match(/status\s*[:=]\s*([^,}\n]+)/i);
                        if (statusMatch && statusMatch[1]) return statusMatch[1].replace(/[\"']/g, '').trim();
                        return fallback;
                    }
                    s = s.replace(/(pin\s*[:=]\s*)[^,\s}\"']+/gi, '$1[HIDDEN]');
                    s = s.replace(/(kodereseller\s*[:=]\s*)[^,\s}\"']+/gi, '$1[HIDDEN]');
                    s = s.replace(/(password\s*[:=]\s*)[^,\s}\"']+/gi, '$1[HIDDEN]');
                    s = s.replace(/(token\s*[:=]\s*)[^,\s}\"']+/gi, '$1[HIDDEN]');
                    s = s.replace(/(apikey\s*[:=]\s*)[^,\s}\"']+/gi, '$1[HIDDEN]');
                    return s.trim() || fallback;
                };
        
        
                // PATCH DONI: Override tampilan detail riwayat agar lebih rapi dan profesional
                window.bukaDetailRiwayat = function(str) {
                    const d = JSON.parse(decodeURIComponent(str));
                    if (d.kode_produk === 'TOPUP' && (d.status === 'PENDING' || d.status === 'Pending')) {
                        let mCode = d.metode || 'QRIS';
                        let fallbackBank = (window.bankManualData || []).find(b => b.code === mCode);
                        window.selectedTopupMethod = d.metode_lengkap || fallbackBank || { code: mCode, name: mCode === 'SEABANK' ? 'Transfer Seabank' : 'Scan QRIS All Payment', type: mCode === 'SEABANK' ? 'BANK_MANUAL' : 'MANUAL', img: mCode === 'SEABANK' ? 'icons/seabank.png' : 'icons/qris.jpg', desc: '' };
                        window.currentPendingDocId = d.idDoc;
                        localStorage.setItem('pending_topup', JSON.stringify({ docId: d.idDoc, nominal: d.harga, method: window.selectedTopupMethod, timestamp: new Date().getTime() }));
                        document.getElementById('modalTopup').style.display = "flex";
                        window.renderTopupStep(4, d.harga);
                        return;
                    }
        
                    const modal = document.getElementById('modalDetailRiwayat');
                    const statusUpper = String(d.status || '').toUpperCase();
                    let color = "var(--success)";
                    let statusText = "Transaksi Berhasil";
                    if(statusUpper === "PENDING") { color = "var(--warning)"; statusText = "Transaksi Diproses"; }
                    else if(statusUpper === "GAGAL") { color = "var(--danger)"; statusText = "Transaksi Gagal"; }
        
                    let snContent = window.bersihkanPesan ? window.bersihkanPesan(d.sn) : (d.sn || '-');
                    snContent = window.cleanSafeSNRiwayat ? window.cleanSafeSNRiwayat(snContent) : snContent;
                    if(!snContent || snContent === 'undefined') snContent = "-";
                    const isPaymentLink = String(snContent).startsWith('http');
                    const displaySnContent = isPaymentLink ? 'Menunggu pembayaran, buka link pembayaran untuk melanjutkan.' : snContent;
                    const safeSnCopy = String(displaySnContent).replace(/`/g, '').replace(/'/g, "\\'");
                    const produkText = d.produk || d.nama_produk || '-';
                    const tujuanText = d.tujuan || d.nomor || '-';
                    const trxId = d.trx_id || d.ref_id || d.idDoc || '-';
                    // PATCH DONI: jika riwayat adalah PO, sembunyikan box SN/Keterangan dari detail riwayat user
                    const isRiwayatPO = (
                        d.is_po === true ||
                        d.is_po === 'true' ||
                        String(trxId || '').toUpperCase().startsWith('PO-') ||
                        String(d.reffid || '').toUpperCase().startsWith('PO-') ||
                        String(d.reffid_sementara || '').toUpperCase().startsWith('PO-') ||
                        String(d.reffid_aktif || '').toUpperCase().startsWith('PO-') ||
                        String(produkText || '').toLowerCase().includes('pre-order') ||
                        String(produkText || '').toLowerCase().includes('preorder') ||
                        String(d.status_po || '').trim() !== '' ||
                        d.po_active === true ||
                        d.po_run_locked === true ||
                        d.po_auto_checking === true
                    );
                    const waktuText = d.waktu || (d.timestamp && d.timestamp.toDate ? d.timestamp.toDate().toLocaleString('id-ID') : '-');
                    const iconHtml = typeof renderHistoryIcon === 'function' ? renderHistoryIcon(produkText) : `<i class="fas fa-receipt"></i>`;
        
                    let htmlInfoPLN = '';
                    if ((statusUpper === 'BERHASIL' || statusUpper === 'SUKSES') && String(produkText).toUpperCase().match(/PLN|TOKEN/)) {
                        const parts = String(snContent).split('/');
                        if(parts.length >= 2) {
                            htmlInfoPLN = `<div class="detail-item"><span>Nama Pelanggan</span><span class="detail-val">${parts[1] || '-'}</span></div>${parts[2] ? `<div class="detail-item"><span>Info Meter</span><span class="detail-val">${parts.slice(2).join(' / ')}</span></div>` : ''}`;
                        }
                    }
        
                    const matchVoucher = String(snContent).match(/(\d{12,25})/);
                    const kodeVoucher = matchVoucher ? matchVoucher[0] : null;
                    const htmlKodeVoucher = kodeVoucher ? `<div class="detail-item" style="border-style:dashed; border-color:rgba(127,29,29,0.35);"><span>Kode Voucher</span><span class="detail-val" style="font-family:monospace; letter-spacing:.8px;">${kodeVoucher}</span></div>` : '';
        
                    let html = `
                        <div class="receipt-header pro-detail">
                            <div class="receipt-icon pro" style="background:${color}">${iconHtml}</div>
                            <div style="flex:1; min-width:0;">
                                <div class="receipt-status pro" style="color:${color}">${statusText}</div>
                                <div class="receipt-meta"><i class="far fa-clock"></i> ${waktuText}</div>
                            </div>
                            <div style="width:34px;height:34px;border-radius:13px;background:rgba(15,23,42,0.06);display:flex;align-items:center;justify-content:center;color:#64748b;" onclick="document.getElementById('modalDetailRiwayat').style.display='none'"><i class="fas fa-times"></i></div>
                        </div>
                        <div class="receipt-amount-wrap">
                            <div class="receipt-amount-label">Total Pembayaran</div>
                            <div class="receipt-amount">Rp ${new Intl.NumberFormat('id-ID').format(Number(d.harga || 0))}</div>
                        </div>
                        <div class="detail-item"><span>Produk</span><span class="detail-val">${produkText}</span></div>
                        <div class="detail-item"><span>Tujuan</span><span class="detail-val">${tujuanText}</span></div>
                        <div class="detail-item"><span>ID Transaksi</span><span class="detail-val">#${trxId}</span></div>
                        <div class="detail-item"><span>Status</span><span class="detail-val" style="color:${color}">${d.status || '-'}</span></div>
                        ${htmlInfoPLN}
                        ${htmlKodeVoucher}
                        ${!isRiwayatPO ? `
                        <div style="margin-top:14px; font-size:11px; font-weight:950; color:#64748b; text-transform:uppercase; letter-spacing:.5px;">SN / Keterangan</div>
                        <div class="sn-container">
                            <span class="sn-text" id="snText">${displaySnContent}</span>
                            ${!isPaymentLink ? `<button class="btn-copy" onclick="navigator.clipboard.writeText('${safeSnCopy}'); alert('SN Disalin!')"><i class="far fa-copy"></i></button>` : ''}
                        </div>
                        ` : ''}
                    `;
        
                    if (!isRiwayatPO && isPaymentLink && statusUpper === 'PENDING') {
                        html += `<button class="btn-konfirmasi" style="background:#be123c; margin-top:14px; width:100%; display:flex; justify-content:center; align-items:center; gap:8px;" onclick="window.open('${snContent}', '_blank')"><i class="fas fa-external-link-alt"></i> Lanjutkan Pembayaran</button>`;
                    }
                    if((d.status === "PENDING" || d.status === "Pending") && d.checkout_url) {
                        html += `<button class="btn-konfirmasi" style="background:var(--primary); margin-top:14px; width:100%;" onclick="window.open('${String(d.checkout_url).replace('/v1/', '/v3/')}', '_blank')">Bayar Sekarang</button><button class="btn-batal" style="margin-top:9px; background:#fff5f5; color:var(--danger); border:1px solid #ffcccc; width:100%;" onclick="batalkanTopup('${d.idDoc}', '${d.unique_code || d.trx_id}')">Batalkan Topup</button>`;
                    }
                    if((d.status === "PENDING" || d.status === "Pending") && d.is_po) {
                        html += `<button class="btn-batal" style="margin-top:12px; background:#fff5f5; color:var(--danger); border:1px solid #ffcccc; width:100%; font-weight:bold; padding:12px; border-radius:12px;" onclick="window.batalkanPO('${d.idDoc}', '${d.trx_id}', ${d.harga})"><i class="fas fa-times-circle"></i> Batalkan Pre-Order</button>`;
                    }
                    html += `
                        <div class="detail-action-grid">
                            <button class="btn-konfirmasi" style="background:#00b894; color:white;" onclick="window.isShareMode=false; window.siapkanPrint('${str}')"><i class="fas fa-print"></i> Cetak</button>
                            <button class="btn-konfirmasi" style="background:linear-gradient(135deg, #25D366, #128C7E); color:white;" onclick="window.siapkanShare('${str}')"><i class="fab fa-whatsapp"></i> Bagikan</button>
                            <button class="btn-konfirmasi full" style="background:var(--bg); color:#555; border:1px solid #ddd;" onclick="document.getElementById('modalDetailRiwayat').style.display='none'">Tutup Detail</button>
                        </div>
                    `;
                    document.getElementById('detailRiwayatContent').innerHTML = html;
                    modal.style.display = "flex";
                };
        
                let selectedService = "";
                        
                // --- LOGIKA TOPUP BARU (STEPPED UI) ---
                window.topupData = [
        
                    { id: 'qris_gopay', code: 'QRIS_GOPAY', name: 'QRIS GoPay (Otomatis)', type: 'INDOPAY', fee: 0, img: 'icons/Gopay.png', desc: 'Otomatis dicek sistem. Bayar SESUAI nominal unik.' },
                    { id: 'gopay_tf', code: 'GOPAY_TF', name: 'Transfer GoPay (Otomatis)', type: 'INDOPAY', fee: 0, img: 'icons/Gopay.png', desc: 'Otomatis dicek sistem. Bayar SESUAI nominal unik.' }
                ];
        
                // --- SISTEM INDOPAY HELPERS ---
                window.INDOPAY_GOPAY_NUMBER = '087875705707';
                window.INDOPAY_GOPAY_NAME = 'Siti lestari';
                window.INDOPAY_STATIC_QRIS = '00020101021126610014COM.GO-JEK.WWW01189360091438792752840210G8792752840303UMI51440014ID.CO.QRIS.WWW0215ID10254475936700303UMI5204549953033605802ID5921Juragan Akrab, Grosir6011KARANGANYAR61055711162070703A016304A32F';
        
        
                window.isMetodeIndopayCek = function(method) {
                    if (!method) return false;
                    const code = String(method.code || '').toUpperCase();
                    const type = String(method.type || '').toUpperCase();
                    return (
                        code === 'QRIS_GOPAY' ||
                        code === 'GOPAY_TF' ||
                        code === 'SEABANK' ||
                        type === 'BANK_MANUAL' ||
                        type === 'MANUAL_BANK' ||
                        type === 'MANUAL'
                    );
                };
        
                window.getNominalIndopay = async function(baseNominal) {
                    try {
                        let res = await fetch(`indopay_api.php?action=generate&base_nominal=${baseNominal}`);
                        let data = await res.json();
                        if (data.success) return data.unik_nominal;
                        return baseNominal;
                    } catch(e) {
                        console.error('Error Indopay Generate:', e);
                        return baseNominal;
                    }
                };
        
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
                
                if(window.terimaTopupTelegramIndopay) {
                    window.terimaTopupTelegramIndopay(user.uid, idDoc);
                }
                
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
        
                        window.batalkanTopupSesi = async (isTimeout = false) => {
                    if(window.topupTimerInterval) clearInterval(window.topupTimerInterval);
                    if(isTimeout !== true && !(await appConfirm('Konfirmasi', 'Yakin ingin membatalkan topup ini?'))) return;
                    window.showNotice('loading', 'Memproses', 'Membatalkan transaksi...');
                    try {
                        const user = window.auth.currentUser;
                        let pendingSesi = localStorage.getItem('pending_topup');
                        let docId = window.currentPendingDocId;
                        if(pendingSesi) {
        let pData = JSON.parse(pendingSesi);
        docId = docId || pData.docId;
                        }
                        if(user && docId) {
        const snap = await window.getDoc(window.doc(window.db, "users", user.uid, "riwayat_transaksi", docId));
        if (snap.exists() && (snap.data().status === 'BERHASIL' || snap.data().status === 'Sukses')) {
            localStorage.removeItem('pending_topup');
            window.showNotice('success', 'Sukses', 'Saldo sudah dikonfirmasi oleh admin.');
            window.tutupModalTopup(); return;
        }
        await window.updateDoc(window.doc(window.db, "users", user.uid, "riwayat_transaksi", docId), {
            status: "GAGAL", sn: "Dibatalkan oleh Pengguna"
        });
        if (window.batalkanTopupTelegram) window.batalkanTopupTelegram(user.uid, docId, "Oleh Pengguna");
                        }
                        localStorage.removeItem('pending_topup');
                        window.showNotice('success', 'Berhasil', 'Transaksi telah dibatalkan.');
                        window.tutupModalTopup();
                    } catch(e) { window.showNotice('error', 'Gagal', e.message); }
                };
        
                window.tutupModalTopup = () => {
                    document.getElementById('modalTopup').style.display = "none";
                    window.currentTopupStep = 0;
                    if(window.intervalQrisAuto) { clearInterval(window.intervalQrisAuto); window.intervalQrisAuto = null; }
                };
        
                window.backTopupStep = () => {
                    if(window.currentTopupStep > 1) {
                        window.renderTopupStep(window.currentTopupStep - 1);
                    }
                };
        
                window.renderTopupStep = (step, param = null) => {
                    window.currentTopupStep = step;
                    const area = document.getElementById('areaTopupSteps');
                    const btnBack = document.getElementById('btnBackTopup');
                    const title = document.getElementById('titleTopup');
        
                    if(step === 1) {
                        btnBack.style.display = 'none';
                        title.innerText = "Pilih Metode";
                        if(window.isTopupAuto) {
        area.innerHTML = `
            <div class="tu-cat" onclick="window.renderTopupStep(2, 'QRIS')"><div style="display:flex; align-items:center;"><div class="tu-icon"><i class="fas fa-qrcode"></i></div><div><div style="font-weight:bold; font-size:14px; color:#333;">QRIS (Scan Code)</div><div style="font-size:11px; color:#999;">OVO, DANA, GoPay, ShopeePay</div></div></div><i class="fas fa-chevron-right" style="color:#ccc"></i></div>
            <div class="tu-cat" onclick="window.renderTopupStep(2, 'VA')"><div style="display:flex; align-items:center;"><div class="tu-icon"><i class="fas fa-university"></i></div><div><div style="font-weight:bold; font-size:14px; color:#333;">Virtual Account</div><div style="font-size:11px; color:#999;">BCA, BRI, BNI, Mandiri, dll</div></div></div><i class="fas fa-chevron-right" style="color:#ccc"></i></div>
            <div class="tu-cat" onclick="window.renderTopupStep(2, 'EWALLET')"><div style="display:flex; align-items:center;"><div class="tu-icon"><i class="fas fa-wallet"></i></div><div><div style="font-weight:bold; font-size:14px; color:#333;">E-Wallet</div><div style="font-size:11px; color:#999;">OVO, DANA, ShopeePay, LinkAja</div></div></div><i class="fas fa-chevron-right" style="color:#ccc"></i></div>
            <div class="tu-cat" onclick="window.renderTopupStep(2, 'RETAIL')"><div style="display:flex; align-items:center;"><div class="tu-icon"><i class="fas fa-store"></i></div><div><div style="font-weight:bold; font-size:14px; color:#333;">Alfamart & Retail</div><div style="font-size:11px; color:#999;">Alfamart, Indomaret</div></div></div><i class="fas fa-chevron-right" style="color:#ccc"></i></div>
        `;
                    } else {
        const user = window.auth.currentUser;
        const isAdmin = user && (user.email === 'doni888855519@gmail.com' || user.email === 'suwarno8797@gmail.com');
        const qrisItem = window.topupData.find(x => x.code === 'QRIS_AUTO') || { id: 'qris_auto', code: 'QRIS_AUTO', name: 'QRIS Otomatis (Cepat)', type: 'MANUAL', fee: 0, img: 'icons/qris.jpg', desc: 'Topup otomatis masuk tanpa konfirmasi (1-3 Menit)' };
        const qrisStr = encodeURIComponent(JSON.stringify(qrisItem));
        const qrisClickNew = (window.maintenanceQris && !isAdmin) ? "window.showNotice('error', 'Maintenance', 'Mohon maaf, sistem Topup QRIS sedang dalam pemeliharaan (Maintenance). Silakan gunakan Transfer Bank.')" : "window.renderTopupStep(3, '" + qrisStr + "')";
        
        const qrisGopayItem = window.topupData.find(x => x.code === 'QRIS_GOPAY') || { id: 'qris_gopay', code: 'QRIS_GOPAY', name: 'QRIS GoPay (Otomatis)', type: 'INDOPAY', fee: 0, img: 'icons/Gopay.png', desc: 'Otomatis dicek sistem. Bayar SESUAI nominal unik.' };
        const qrisGopayStr = encodeURIComponent(JSON.stringify(qrisGopayItem));
        const qrisGopayClickNew = "if(window.blockMaintenanceTopupMethod && window.blockMaintenanceTopupMethod({code:'QRIS_GOPAY', name:'QRIS GoPay Otomatis'}, window.auth.currentUser)) return false; window.renderTopupStep(3, '" + qrisGopayStr + "')";
        const qrisGopayBadge = window.isMaintenanceOn(window.maintenanceQrisGopay) ? '<span style="font-size:9px; background:var(--danger); color:white; padding:2px 4px; border-radius:4px; margin-left:5px;">MT</span>' : '<span style="font-size:9px; background:var(--success); color:white; padding:2px 4px; border-radius:4px; margin-left:5px;">AUTO</span>';
        
        const gopayTfItem = window.topupData.find(x => x.code === 'GOPAY_TF') || { id: 'gopay_tf', code: 'GOPAY_TF', name: 'Transfer GoPay (Otomatis)', type: 'INDOPAY', fee: 0, img: 'icons/Gopay.png', desc: 'Otomatis dicek sistem. Bayar SESUAI nominal unik.' };
        const gopayTfStr = encodeURIComponent(JSON.stringify(gopayTfItem));
        const gopayTfClickNew = "if(window.blockMaintenanceTopupMethod && window.blockMaintenanceTopupMethod({code:'GOPAY_TF', name:'Transfer GoPay Otomatis'}, window.auth.currentUser)) return false; window.renderTopupStep(3, '" + gopayTfStr + "')";
        const gopayTfBadge = window.isMaintenanceOn(window.maintenanceGopayTf) ? '<span style="font-size:9px; background:var(--danger); color:white; padding:2px 4px; border-radius:4px; margin-left:5px;">MT</span>' : '<span style="font-size:9px; background:var(--success); color:white; padding:2px 4px; border-radius:4px; margin-left:5px;">AUTO</span>';
        
        const manualMethods = (window.topupData || []).filter(x => x && x.type === 'BANK_MANUAL').concat(window.bankManualData || []);
        const manualMethodsHtml = manualMethods.map(item => {
            const safeItem = item || {};
            const itemParam = encodeURIComponent(JSON.stringify(safeItem));
            const iconHtml = safeItem.img ? `<img src="${safeItem.img}" style="width:24px; height:24px; object-fit:contain;">` : '<i class="fas fa-university"></i>';
            const feeRaw = (safeItem.fee === undefined || safeItem.fee === null || safeItem.fee === '') ? 0 : safeItem.fee;
            const fee = feeRaw.toString().includes('%') ? feeRaw : 'Rp '+new Intl.NumberFormat('id-ID').format(Number(feeRaw) || 0);
            const desc = safeItem.desc || ('Biaya Admin: ' + fee);
            return `<div class="tu-cat" onclick="if(window.blockMaintenanceTopupMethod && window.blockMaintenanceTopupMethod(JSON.parse(decodeURIComponent('${itemParam}')), window.auth.currentUser)) return false; window.renderTopupStep(3, '${itemParam}')"><div style="display:flex; align-items:center;"><div class="tu-icon" style="background:#fff; border:1px solid #eee;">${iconHtml}</div><div><div style="font-weight:bold; font-size:14px; color:#333;">${safeItem.name || 'Metode Topup'}</div><div style="font-size:11px; color:#999;">${desc}</div></div></div><i class="fas fa-chevron-right" style="color:#ccc"></i></div>`;
        }).join('');
        
        area.innerHTML = manualMethodsHtml;
                        }
                    }
                    else if (step === 2) {
                        btnBack.style.display = 'block';
                        title.innerText = param === 'RETAIL' ? 'Pilih Gerai' : (param === 'BANK_MANUAL' ? 'Pilih Bank' : param);
                        let filtered = [];
                        if (param === 'BANK_MANUAL') {
        let localManual = window.topupData.filter(x => x.type === 'BANK_MANUAL');
        let fbManual = window.bankManualData || [];
        filtered = localManual.concat(fbManual);
                        } else if (param === 'RETAIL') {
        filtered = window.topupData.filter(x => x.type === 'RETAIL' || x.type === 'OTC');
                        } else {
        filtered = window.topupData.filter(x => x.type === param);
                        }
                        if(filtered.length === 0) return area.innerHTML = "<div style='text-align:center; padding:20px; color:#999;'>Metode tidak tersedia.</div>";
                        let html = '<div style="background:white; border-radius:15px; border:1px solid #eee; overflow:hidden;">';
                        filtered.forEach(item => {
        let fee = item.fee.toString().includes('%') ? item.fee : 'Rp '+new Intl.NumberFormat('id-ID').format(item.fee);
        const itemParam = encodeURIComponent(JSON.stringify(item));
        html += `<div class="tu-method" onclick="if(window.blockMaintenanceTopupMethod && window.blockMaintenanceTopupMethod(JSON.parse(decodeURIComponent('${itemParam}')), window.auth.currentUser)) return false; window.renderTopupStep(3, '${itemParam}')"><img src="${item.img}" style="width:40px; height:25px; object-fit:contain; margin-right:15px;"><div style="flex:1;"><div style="font-weight:bold; font-size:13px; color:#333;">${item.name}</div><div style="font-size:10px; color:#f39c12;">Biaya Admin: ${fee}</div></div><i class="fas fa-chevron-right" style="color:#eee"></i></div>`;
                        });
                        html += '</div>';
                        area.innerHTML = html;
                    }
                    else if (step === 3) {
                        btnBack.style.display = 'block';
                        title.innerText = "Masukan Nominal";
                        const item = JSON.parse(decodeURIComponent(param));
                        const user = window.auth.currentUser;
                        if (window.blockMaintenanceTopupMethod && window.blockMaintenanceTopupMethod(item, user)) {
                            window.currentTopupStep = 1;
                            window.selectedTopupMethod = null;
                            window.renderTopupStep(1);
                            return;
                        }
                        window.selectedTopupMethod = item;
                        area.innerHTML = `
        <div class="tu-invoice-box">
            <img src="${item.img}" style="height:35px; margin-bottom:10px; border-radius:4px;">
            <div style="font-weight:bold; font-size:16px; color:#333;">${item.name}</div>
            <div style="font-size:12px; color:#999; margin-bottom:20px;">${item.code}</div>
            <div style="text-align:left;">
                <label style="font-size:11px; font-weight:bold; color:#555; display:block; margin-bottom:5px;">Nominal Top Up (Rp)</label>
                <div class="input-group">
                    <input type="tel" id="newTopupNominal" class="form-input" placeholder="Min. 10.000" style="font-size:16px; font-weight:bold; color:var(--primary);">
                    <i class="fas fa-coins"></i>
                </div>
                ${item.type === 'EWALLET' ? `<label style="font-size:11px; font-weight:bold; color:#e67e22; display:block; margin-bottom:5px; margin-top:10px;">Nomor HP E-Wallet (Wajib)</label><div class="input-group"><input type="tel" id="newTopupPhone" class="form-input" placeholder="08xxxx"><i class="fas fa-mobile-alt"></i></div>` : ''}
                <div style="background:#e1effe; color:#7f1d1d; padding:10px; border-radius:10px; font-size:10px; margin-bottom:15px; border:1px solid rgba(127,29,29,0.2);">
                    <i class="fas fa-info-circle"></i> ${item.desc || 'Biaya admin akan ditambahkan otomatis pada total pembayaran.'}
                </div>
                <button class="btn-konfirmasi" onclick="window.prosesTopupNew()">BUAT INVOICE <i class="fas fa-arrow-right"></i></button>
            </div>
        </div>
                        `;
                    }
                    else if (step === 4) {
                        btnBack.style.display = 'none';
                        title.innerText = "Instruksi Pembayaran";
                        const item = window.selectedTopupMethod;
                        const nominal = param;
                        let paymentInfo = '';
                        if((item.type === 'BANK_MANUAL' && item.code !== 'QRIS_GOPAY' && item.code !== 'GOPAY_TF') || item.code === 'SEABANK') {
        const bankName = item.nama_bank || item.name || 'Bank';
        const noRek = item.no_rek || '901338749488';
        const aNama = item.atas_nama || 'Denissa Ermadianis Tarisna Dewi';
        
        paymentInfo = `<div style="background:#f8fafc; border:1px dashed #cbd5e1; padding:15px; border-radius:12px; margin-bottom:15px;"><div style="font-size:11px; color:#64748b; margin-bottom:5px;">Transfer ke Rekening ${bankName}:</div><div style="font-size:24px; font-weight:900; color:var(--primary); letter-spacing:1px; margin-bottom:5px; user-select:all;">${noRek}</div><div style="font-size:12px; font-weight:bold; color:#333;">a/n ${aNama}</div><button onclick="navigator.clipboard.writeText('${noRek}'); window.showNotice('success', 'Disalin', 'No Rekening ${bankName} berhasil disalin!')" style="margin-top:10px; background:#e1effe; color:var(--primary); border:none; padding:5px 10px; border-radius:5px; font-size:11px; cursor:pointer;"><i class="fas fa-copy"></i> Salin Rekening</button><div id="statusIndopayAuto" style="margin-top:12px; color:var(--primary); font-size:11px; font-weight:bold;"><i class="fas fa-spinner fa-spin"></i> Menunggu pembayaran masuk (Indopay)...</div></div>`;
        if(window.currentPendingDocId && window.startIndopayChecker && !window.intervalCek[window.currentPendingDocId]) {
            window.startIndopayChecker(window.currentPendingDocId, nominal);
        }
                        } else if (item.code === 'QRIS_GOPAY') {
        let dinamisQris = window.buatQrisDinamis(window.INDOPAY_STATIC_QRIS, nominal);
        let qrUrl = "https://quickchart.io/qr?text=" + encodeURIComponent(dinamisQris) + "&size=300&ecLevel=M&margin=2";
        paymentInfo = `<div style="background:#f8fafc; border:1px dashed #cbd5e1; padding:15px; border-radius:12px; margin-bottom:15px; text-align:center;">
            <div style="font-size:14px; font-weight:900; color:#333; margin-bottom:10px; text-transform:uppercase;">Juragan AKRAB, Grosir</div>
            <img src="${qrUrl}" onclick="window.showFullscreenQR('${qrUrl}')" style="width:100%; max-width:250px; border-radius:10px; margin-bottom:10px; box-shadow:0 4px 10px rgba(0,0,0,0.1); cursor:pointer;">
            <div style="font-size:12px; font-weight:bold; color:#333;">Scan QRIS ini untuk membayar</div>
            <div style="font-size:11px; color:#555; margin-top:5px;">a/n ${window.INDOPAY_GOPAY_NAME}</div>
            <div style="margin-top:12px; padding:10px; background:#e6f9ed; border-radius:8px; border:1px solid #c3e6cb;">
                <div style="font-size:10px; color:#27ae60; font-weight:bold; margin-bottom:3px;">SALDO DITERIMA:</div>
                <div style="font-size:16px; font-weight:900; color:#27ae60;">Rp ${new Intl.NumberFormat('id-ID').format(nominal)}</div>
            </div>
            <div id="statusIndopayAuto" style="margin-top:10px; color:var(--primary); font-size:11px; font-weight:bold;"><i class="fas fa-spinner fa-spin"></i> Menunggu pembayaran (Indopay)...</div>
        </div>`;
        if(!window.intervalCek[window.currentPendingDocId]) {
            window.startIndopayChecker(window.currentPendingDocId, nominal);
        }
                        } else if (item.code === 'GOPAY_TF') {
        paymentInfo = `<div style="background:#f8fafc; border:1px dashed #cbd5e1; padding:15px; border-radius:12px; margin-bottom:15px; text-align:center;">
            <div style="font-size:11px; color:#64748b; margin-bottom:5px;">Transfer GoPay ke Nomor:</div>
            <div style="font-size:24px; font-weight:900; color:var(--primary); letter-spacing:1px; margin-bottom:5px; user-select:all;">${window.INDOPAY_GOPAY_NUMBER}</div>
            <div style="font-size:12px; font-weight:bold; color:#333;">a/n ${window.INDOPAY_GOPAY_NAME}</div>
            <button onclick="navigator.clipboard.writeText('${window.INDOPAY_GOPAY_NUMBER}'); window.showNotice('success', 'Disalin', 'Nomor GoPay disalin!')" style="margin-top:10px; background:#e1effe; color:var(--primary); border:none; padding:5px 10px; border-radius:5px; font-size:11px; cursor:pointer;"><i class="fas fa-copy"></i> Salin Nomor</button>
            <div style="margin-top:15px; padding:10px; background:#e6f9ed; border-radius:8px; border:1px solid #c3e6cb;">
                <div style="font-size:10px; color:#27ae60; font-weight:bold; margin-bottom:3px;">SALDO DITERIMA:</div>
                <div style="font-size:16px; font-weight:900; color:#27ae60;">Rp ${new Intl.NumberFormat('id-ID').format(nominal)}</div>
            </div>
            <div id="statusIndopayAuto" style="margin-top:15px; color:var(--primary); font-size:11px; font-weight:bold;"><i class="fas fa-spinner fa-spin"></i> Menunggu pembayaran (Indopay)...</div>
        </div>`;
        if(!window.intervalCek[window.currentPendingDocId]) {
            window.startIndopayChecker(window.currentPendingDocId, nominal);
        }
        
                        } else if (item.code === 'QRIS_AUTO' && !window.isTopupAuto) {
        let staticQris = "00020101021126670016COM.NOBUBANK.WWW01189360050300000907180214600239684104160303UMI51440014ID.CO.QRIS.WWW0215ID20254442075210303UMI5204541153033605802ID5919BhuleEmarket6011KARANGANYAR61055711162070703A016304DA77";
        let dinamisQris = window.buatQrisDinamis(staticQris, nominal);
        let qrUrl = "https://quickchart.io/qr?text=" + encodeURIComponent(dinamisQris) + "&size=300&ecLevel=M&margin=2";
        paymentInfo = `<div style="background:#f8fafc; border:1px dashed #cbd5e1; padding:15px; border-radius:12px; margin-bottom:15px; text-align:center;">
            <img src="${qrUrl}" onclick="window.showFullscreenQR('${qrUrl}')" style="width:100%; max-width:250px; border-radius:10px; margin-bottom:10px; box-shadow:0 4px 10px rgba(0,0,0,0.1); cursor:pointer;">
            <div style="font-size:12px; font-weight:bold; color:#333;">Scan QRIS ini untuk membayar</div>
            <div id="statusQrisAuto" style="margin-top:10px; color:var(--primary); font-size:11px; font-weight:bold;"><i class="fas fa-spinner fa-spin"></i> Menunggu pembayaran masuk (1-3 Menit)...</div>
        </div>`;
        
        if(!window.intervalQrisAuto) {
            window.intervalQrisAuto = setInterval(() => window.cekStatusQiospayBerkala(window.currentPendingDocId, nominal), 10000);
        }
                        }
                        let globalInfoHTML = `
        <div style="margin-bottom:15px; padding:12px; background:#e6f9ed; border-radius:10px; border:1px solid #c3e6cb; display:flex; justify-content:space-between; align-items:center;">
            <div style="font-size:11px; color:#27ae60; font-weight:bold;">SALDO DITERIMA:</div>
            <div style="font-size:18px; font-weight:900; color:#27ae60;">Rp ${new Intl.NumberFormat('id-ID').format(nominal)}</div>
        </div>
        <div style="margin-bottom:15px; padding:12px; background:#fff5f5; border-radius:10px; border:1px solid #ffcccc; text-align:center;">
            <div style="font-size:11px; color:#e74c3c; font-weight:bold; margin-bottom:5px;">SISA WAKTU PEMBAYARAN:</div>
            <div id="topupCountdownTimer" style="font-size:22px; font-weight:900; color:#e74c3c; letter-spacing:2px;">03:00:00</div>
        </div>
                        `;
        
                        area.innerHTML = `
        <div class="tu-invoice-box">
            <div style="font-weight:bold; font-size:16px; color:#333; margin-bottom:5px;">Total Pembayaran</div>
            <div style="font-size:24px; font-weight:900; color:var(--danger); margin-bottom:20px;">Rp ${new Intl.NumberFormat('id-ID').format(nominal)}</div>
            ${paymentInfo}
            ${globalInfoHTML}
            <div style="background:#fff8e1; color:#d35400; padding:10px; border-radius:10px; font-size:10.5px; margin-bottom:15px; text-align:left; line-height:1.4;"><i class="fas fa-info-circle"></i> <b>PENTING:</b> Pastikan transfer dengan jumlah yang <b>SAMA PERSIS</b>.</div>
            <button class="btn-konfirmasi" onclick="localStorage.removeItem('pending_topup'); window.tutupModalTopup(); window.bukaRiwayatArsip();">SAYA SUDAH BAYAR</button>
            <button class="btn-batal" onclick="window.batalkanTopupSesi()" style="background:#fff5f5; color:var(--danger); border:1px solid #ffcccc; margin-top:10px;">Batalkan Transaksi</button>
        </div>
                        `;
        
                        if(window.topupTimerInterval) clearInterval(window.topupTimerInterval);
                        let pendingData = JSON.parse(localStorage.getItem('pending_topup') || '{}');
                        let startTime = pendingData.timestamp || new Date().getTime();
                        let expiryTime = startTime + (3 * 60 * 60 * 1000);
        
                        window.topupTimerInterval = setInterval(() => {
        let now = new Date().getTime();
        let diff = expiryTime - now;
        
        if (diff <= 0) {
            clearInterval(window.topupTimerInterval);
            let tEl = document.getElementById('topupCountdownTimer');
            if(tEl) tEl.innerText = "00:00:00";
            window.showNotice('error', 'Waktu Habis', 'Waktu pembayaran telah habis. Transaksi dibatalkan.');
            window.batalkanTopupSesi(true);
        } else {
            let h = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            let m = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
            let s = Math.floor((diff % (1000 * 60)) / 1000);
            let tEl = document.getElementById('topupCountdownTimer');
            if(tEl) {
                tEl.innerText = (h < 10 ? "0" + h : h) + ":" + (m < 10 ? "0" + m : m) + ":" + (s < 10 ? "0" + s : s);
            } else {
                clearInterval(window.topupTimerInterval);
            }
        }
                        }, 1000);
                    }
                };
        
                
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
                    
                    const inputNominal = document.getElementById('newTopupNominal').value.replace(/[^0-9]/g, '');
                    const method = window.selectedTopupMethod;
                    if (window.blockMaintenanceTopupMethod && window.blockMaintenanceTopupMethod(method, user)) {
                        return;
                    }
                    
                    if(!inputNominal) return alert("Masukkan nominal topup!");
                    let baseNominal = parseInt(inputNominal);
        
                    if (method.code === 'QRIS_AUTO') {
                        if (baseNominal < 1000) return alert("Minimal topup QRIS Rp 1.000");
                        if (baseNominal > 495000) return alert("Maksimal topup QRIS Rp 495.000");
                    }
                    else if (method.code === 'SEABANK' && baseNominal < 10000) return alert("Minimal topup Seabank Rp 10.000");
                    else if (baseNominal < 1000) return alert("Minimal topup Rp 1.000");
        
                    if(window.isTopupAuto) {
                        let phone = '';
                        if(method.type === 'EWALLET') {
        const phoneInput = document.getElementById('newTopupPhone');
        phone = phoneInput ? phoneInput.value.replace(/[^0-9]/g, '') : '';
        if(phone.length < 9) return alert("Nomor HP E-Wallet tidak valid!");
                        }
        
                        window.showNotice('loading', 'Memproses', 'Sedang membuat invoice...');
        
                        try {
        const req = await fetch('paydisini_request.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({
                uid: user.uid, amount: baseNominal, service: method.id, email: user.email, ewallet_phone: phone
            })
        });
        const res = await req.json();
        
        if(res.success) {
            const uSnap = await window.getDoc(window.doc(window.db, "users", user.uid));
            const uName = uSnap.exists() ? uSnap.data().username : "-";
            await window.addDoc(window.collection(window.db, "users", user.uid, "riwayat_transaksi"), {
                uid: user.uid, username: uName, tujuan: "Topup Saldo", produk: res.data.service_name || "Topup",
                kode_produk: "TOPUP", harga: baseNominal, status: "PENDING", sn: "Menunggu Pembayaran",
                trx_id: res.data.unique_code, unique_code: res.data.unique_code,
                checkout_url: res.data.checkout_url.replace('/v1/', '/v3/'), timestamp: window.serverTimestamp()
            });
            window.tutupNotice();
            window.tutupModalTopup();
            window.open(res.data.checkout_url.replace('/v1/', '/v3/'), '_blank');
        } else {
            window.showNotice('error', 'Gagal', res.msg || 'Error sistem');
        }
                        } catch(e) {
        window.showNotice('error', 'Error', e.message);
                        }
                    } else {
                        let nominalUnik = baseNominal;
                        let kodeUnik = 0;
        
                        if (window.isMetodeIndopayCek(method)) {
        window.showNotice('loading', 'Memproses', 'Mencari nominal unik Indopay...');
        nominalUnik = await window.getNominalIndopay(baseNominal);
        if (nominalUnik === baseNominal) {
            window.showNotice('error', 'Gagal', 'Server sibuk atau gagal mendapat nominal unik.');
            return;
        }
                        } else {
        window.showNotice('loading', 'Memproses', 'Sedang membuat nominal unik...');
        const reqUnik = await fetch('generate_nominal_qris.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ nominal: baseNominal })
        });
        const resUnik = await reqUnik.json();
        if (resUnik.status !== 'success') {
            window.showNotice('error', 'Gagal', resUnik.message);
            return;
        }
        kodeUnik = resUnik.kode_unik;
        nominalUnik = resUnik.nominal_unik;
        console.log("Generate nominal berhasil, nominal unik: " + resUnik.nominal_unik);
                        }
        
                        window.showNotice('loading', 'Memproses', 'Sedang membuat tagihan...');
        
                        try {
        const uSnap = await window.getDoc(window.doc(window.db, "users", user.uid));
        const uName = uSnap.exists() ? uSnap.data().username : "-";
        const uniqueCode = "TU" + Math.floor(Date.now() / 1000);
        
        const docRef = await window.addDoc(window.collection(window.db, "users", user.uid, "riwayat_transaksi"), {
            uid: user.uid, username: uName, tujuan: "Topup Saldo", produk: "Topup via " + method.name,
            kode_produk: "TOPUP", harga: nominalUnik, status: "PENDING", sn: "Menunggu Transfer Manual",
            trx_id: uniqueCode, unique_code: uniqueCode, metode: method.code, metode_lengkap: method, timestamp: window.serverTimestamp()
        });
        
        const tgMsg = `🔔 REQUEST TOPUP BARU\n\nUser: ${uName}\nEmail: ${user.email}\nMetode: ${method.name}\nNominal: Rp ${new Intl.NumberFormat('id-ID').format(nominalUnik)}\nTrx ID: ${uniqueCode}\n\nMohon cek mutasi rekening/QRIS Anda.`;
        
        fetch(window.TELEGRAM_API_URL, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({
                action: 'manual_request',
                uid: user.uid,
                docId: docRef.id,
                username: uName,
                email: user.email,
                metode: method.name,
                nominal: nominalUnik,
                trx_id: uniqueCode
            })
        }).then(r => r.json()).then(data => {
            if (data.ok && data.message_id) {
                window.updateDoc(window.doc(window.db, "users", user.uid, "riwayat_transaksi", docRef.id), {
                    tg_message_id: data.message_id,
                    tg_text_ori: data.text || tgMsg
                });
            } else {
                console.log('Telegram Manual Request gagal:', data);
            }
        }).catch(e => console.log('Telegram Manual Request Error:', e));
        
        localStorage.setItem('pending_topup', JSON.stringify({ docId: docRef.id, nominal: nominalUnik, method: method, timestamp: new Date().getTime() }));
        window.currentPendingDocId = docRef.id;
        window.tutupNotice();
        window.renderTopupStep(4, nominalUnik);
                        } catch(e) {
        window.showNotice('error', 'Error', e.message);
                        }
                    }
                };
        
                window.tutupModalTopup = () => { 
                    document.getElementById('modalTopup').style.display = "none"; 
                    if(window.intervalQrisAuto) { clearInterval(window.intervalQrisAuto); window.intervalQrisAuto = null; }
                };
                window.tutupRiwayatArsip = () => { document.getElementById('modalArsip').style.display = "none"; };
                window.setNominal = (val) => { document.getElementById('topupAmount').value = val; };
                        window.pilihMetode = (id, type, el) => {
                    selectedService = id;
                    document.querySelectorAll('.topup-card').forEach(c => c.classList.remove('active'));
                    el.classList.add('active');
                    
                    // Logika Tampilkan Input HP E-Wallet
                    const group = document.getElementById('groupEwalletPhone');
                    if(type === 'EWALLET') {
                        group.style.display = 'block';
                        document.getElementById('ewalletPhone').focus();
                    } else {
                        group.style.display = 'none';
                        document.getElementById('ewalletPhone').value = '';
                    }
                };
        
            
                window.batalkanPO = async (idDoc, trxId, harga) => {
                    const currentHour = new Date().getHours();
                    if(currentHour >= 6 && currentHour < 12) {
                        return window.showNotice('error', 'Gagal', 'Pembatalan Pre-Order tidak dapat dilakukan antara jam 06:00 pagi hingga 12:00 siang.');
                    }
        
                    if(!(await appConfirm('Konfirmasi', 'Yakin ingin membatalkan Pre-Order ini? Saldo akan dikembalikan ke akun Anda.'))) return;
                    window.showNotice('loading', 'Memproses', 'Membatalkan Pre-Order dan mengembalikan saldo...');
                    
                    try {
                        const user = window.auth.currentUser;
                        if(!user) return;
                        
                        const trxRef = window.doc(window.db, "users", user.uid, "riwayat_transaksi", idDoc);
                        const snap = await window.getDoc(trxRef);
                        
                        if(snap.exists() && snap.data().status === 'PENDING') {
        const hargaRefund = parseInt(harga) || 0;
        const trxDataAwal = snap.data();
        
        const refundResult = await window.runTransaction(window.db, async (transaction) => {
            const freshTrxSnap = await transaction.get(trxRef);
            if (!freshTrxSnap.exists()) return { refunded: false, reason: 'trx_not_found' };
        
            const freshData = freshTrxSnap.data();
            if ((freshData.status || '').toUpperCase() !== 'PENDING' || freshData.isRefunded || hargaRefund <= 0) {
                return { refunded: false, reason: 'already_refunded_or_not_pending' };
            }
        
            const userRef = window.doc(window.db, "users", user.uid);
            const userSnap = await transaction.get(userRef);
            if (!userSnap.exists()) return { refunded: false, reason: 'user_not_found' };
        
            const newSaldo = (userSnap.data().saldo || 0) + hargaRefund;
            const refundGuardId = ((freshData.trx_id || trxId) + '-REF');
        
            transaction.update(userRef, { saldo: newSaldo });
            transaction.update(trxRef, {
                status: "GAGAL",
                sn: "Dibatalkan oleh Pengguna (Refund Saldo)",
                isRefunded: true,
                refund_guard_id: refundGuardId,
                refund_at: window.serverTimestamp()
            });
        
            return {
                refunded: true,
                saldo_akhir: newSaldo,
                nominal: hargaRefund,
                refund_guard_id: refundGuardId,
                produk: freshData.produk || trxDataAwal.produk || 'Pre-Order'
            };
        });
        
        // Lapor ke DoniGuard hanya jika refund benar-benar berhasil masuk satu kali
        if(refundResult.refunded && window.triggerDoniGuard) {
            window.triggerDoniGuard({
                action: 'topup',
                produk: 'REFUND PO: ' + refundResult.produk,
                nominal: refundResult.nominal,
                trx_id: refundResult.refund_guard_id,
                saldo_akhir_client: refundResult.saldo_akhir
            });
        }
        
        // 4. Update status di collection preorders (Ditambah filter UID agar lolos Security Rules)
        const qPreorder = window.query(window.collection(window.db, "preorders"), 
            window.where("trx_id", "==", trxId),
            window.where("uid", "==", user.uid)
        );
        const preordersSnap = await window.getDocs(qPreorder);
        preordersSnap.forEach(async (docSnap) => {
            await window.updateDoc(docSnap.ref, {
                status: "DIBATALKAN USER",
                cancel_at: window.serverTimestamp()
            });
        });
        
        try {
            if (refundResult.refunded && window.syncDeletePOJson) {
                await window.syncDeletePOJson(Object.assign({}, trxDataAwal, {
                    uid: user.uid,
                    idDoc: idDoc,
                    doc_id: idDoc,
                    user_history_doc_id: idDoc,
                    firestore_doc_id: idDoc,
                    transaction_id: idDoc,
                    id_transaksi: idDoc,
                    trx_id: trxId || trxDataAwal.trx_id || '',
                    status: 'DIBATALKAN',
                    status_po: 'DIBATALKAN',
                    po_active: false,
                    is_po: true,
                    isRefunded: true,
                    refund_guard_id: refundResult.refund_guard_id,
                    refund_at_text: new Date().toISOString(),
                    refund_reason: 'USER_CANCEL_PO_INDEX',
                    sn: 'Dibatalkan oleh Pengguna (Refund Saldo)',
                    latest_raw_response: {
                        status: false,
                        event: 'USER_CANCEL_PO_INDEX',
                        message: 'Pre-Order dibatalkan user dari index dan saldo direfund.',
                        refund_guard_id: refundResult.refund_guard_id,
                        trx_id: trxId || trxDataAwal.trx_id || '',
                        idDoc: idDoc
                    },
                    latest_raw_response_text: window.safeJsonStringifyPO ? window.safeJsonStringifyPO({
                        status: false,
                        event: 'USER_CANCEL_PO_INDEX',
                        message: 'Pre-Order dibatalkan user dari index dan saldo direfund.',
                        refund_guard_id: refundResult.refund_guard_id,
                        trx_id: trxId || trxDataAwal.trx_id || '',
                        idDoc: idDoc
                    }) : '',
                    event_type: 'CANCEL'
                }));
            }
        } catch(syncErr) {
            console.warn('Gagal sync batal PO ke hosting folder:', syncErr);
        }
        
        window.showNotice('success', 'Berhasil', 'Pre-Order dibatalkan dan saldo telah dikembalikan.');
        document.getElementById('modalDetailRiwayat').style.display='none';
                        } else {
        window.showNotice('error', 'Gagal', 'Pre-Order sudah diproses atau dibatalkan.');
        document.getElementById('modalDetailRiwayat').style.display='none';
                        }
                    } catch(e) {
                        window.showNotice('error', 'Gagal', e.message);
                    }
                };
        
        
            window.batalkanTopup = async (idDoc, uniqueCode) => {
                    if(!(await appConfirm('Konfirmasi', 'Yakin ingin membatalkan transaksi ini?'))) return;
                    window.showNotice('loading', 'Memproses', 'Membatalkan...');
                    try {
                        if(window.isTopupAuto && uniqueCode && !uniqueCode.startsWith('TU')) {
        const req = await fetch('paydisini_cancel.php', {
            method: 'POST', headers: { 'Content-Type': 'application/json' }, body: JSON.stringify({ unique_code: uniqueCode })
        });
        const res = await req.json();
        if(!res.success) throw new Error(res.msg || "Gagal membatalkan di server pusat.");
                        }
                        const user = window.auth.currentUser;
                        if(user) {
        const snap = await window.getDoc(window.doc(window.db, "users", user.uid, "riwayat_transaksi", idDoc));
        if (snap.exists() && (snap.data().status === 'BERHASIL' || snap.data().status === 'Sukses')) {
            localStorage.removeItem('pending_topup');
            window.showNotice('success', 'Sukses', 'Saldo sudah dikonfirmasi oleh admin.');
            document.getElementById('modalDetailRiwayat').style.display='none'; return;
        }
        await window.updateDoc(window.doc(window.db, "users", user.uid, "riwayat_transaksi", idDoc), {
            status: "GAGAL", sn: "Dibatalkan oleh Pengguna"
        });
        if(!window.isTopupAuto && window.batalkanTopupTelegram) window.batalkanTopupTelegram(user.uid, idDoc, "Oleh Pengguna");
                        }
                        window.showNotice('success', 'Berhasil', 'Transaksi telah dibatalkan.');
                        document.getElementById('modalDetailRiwayat').style.display='none';
                    } catch(e) { window.showNotice('error', 'Gagal', e.message); }
                };
        
                window.cekStatusTopupManual = async (uniqueCode) => {
                    window.showNotice('loading', 'Mengecek', 'Sedang memverifikasi pembayaran Anda...');
                    try {
                        const req = await fetch('paydisini_cek.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ unique_code: uniqueCode })
                        });
                        const res = await req.json();
                        if(res.success && res.data.status === "Success") {
        window.showNotice('success', 'Berhasil', 'Pembayaran terdeteksi! Saldo akan segera bertambah.');
        setTimeout(() => location.reload(), 2000);
                        } else {
        window.showNotice('error', 'Belum Terdeteksi', 'Pembayaran belum masuk. Mohon selesaikan pembayaran atau tunggu 1-3 menit.');
                        }
                    } catch(e) {
                        window.showNotice('error', 'Error', 'Gagal menghubungi server.');
                    }
                };
        
        
                // LOGIKA DETAIL PRODUK
                    window.bukaDetailProduk = async (id) => {
                    const p = window.allProductsData.find(x => x.id === id);
                    if(!p) return;
                    window.currentProduct = p;
                    
                    let asalToko = "Pusat";
                    if(p.seller_uid && p.seller_uid !== 'ADMIN') {
                        const sDoc = await window.getDoc(window.doc(window.db, "users", p.seller_uid));
                        if(sDoc.exists()) asalToko = sDoc.data().origin_name || "Lokasi Belum Diset";
                    }
        
                    const html = `
                        <img src="${p.img}" style="width:100%; height:160px; object-fit:cover; border-radius:0 0 10px 10px;">
                        <div style="padding:8px;">
        <div style="font-size:15px; color:var(--primary); font-weight:800;">Rp ${new Intl.NumberFormat('id-ID').format(p.harga)}</div>
        <div style="font-size:12px; font-weight:700; margin:2px 0;">${p.nama}</div>
        <div style="font-size:8.5px; color:#777; margin-bottom:6px;"><i class="fas fa-store"></i> Penjual: <b>${p.seller_uid ? 'Pelapak' : 'Official'}</b></div>
        
        <div style="background:#f9f9f9; padding:6px; border-radius:8px; margin-bottom:8px; border:1px solid #f0f0f0;">
            <b style="font-size:9px; display:block; margin-bottom:4px; color:#555;">Informasi Pengiriman</b>
            <div style="display:grid; grid-template-columns: 1fr 1fr; font-size:9px; color:#666;">
                <span><i class="fas fa-shipping-fast"></i> Dari: <b>${asalToko}</b></span>
                <span><i class="fas fa-weight-hanging"></i> Berat: <b>${p.berat || 1000}gr</b></span>
            </div>
            
            <div style="margin-top:6px; padding-top:6px; border-top:1px dashed #ddd;">
                <b style="font-size:9px; display:block; margin-bottom:4px; color:var(--primary);"><i class="fas fa-calculator"></i> Cek Ongkir Mandiri</b>
                <div style="display:grid; grid-template-columns: 1fr 1fr; gap:4px;">
                    <select id="checkProv" class="form-input" onchange="window.loadCities(this.value, 'checkCity')" style="padding:4px; font-size:9px; height:26px;"><option value="">Provinsi</option></select>
                    <select id="checkCity" class="form-input" onchange="window.loadDistricts(this.value, 'checkDist')" style="padding:4px; font-size:9px; height:26px;"><option value="">Kota/Kab</option></select>
                    <select id="checkDist" class="form-input" style="padding:4px; font-size:9px; height:26px;"><option value="">Kecamatan</option></select>
                    <select id="checkKurirCode" class="form-input" style="padding:4px; font-size:9px; height:26px;">
                        <option value="jne">JNE</option><option value="jnt">J&T</option><option value="sicepat">SiCepat</option><option value="spx">Shopee</option><option value="ninja">Ninja</option>
                    </select>
                </div>
                <button onclick="window.cekOngkirDetail()" style="width:100%; margin-top:5px; padding:5px; background:var(--primary); color:white; border:none; border-radius:5px; font-weight:bold; font-size:9px;">CEK HARGA</button>
                <div id="hasilOngkirDetail" style="margin-top:4px; font-size:9px; font-weight:bold; color:var(--success); text-align:center;"></div>
            </div>
        </div>
        
        <b style="font-size:9px; color:#555;">Deskripsi</b>
        <div style="font-size:9px; color:#666; line-height:1.3; margin-top:2px;">${p.deskripsi || p.nama}</div>
                        </div>
                    `;
                    document.getElementById('pdpContent').innerHTML = html;
                    document.getElementById('modalProductDetail').style.display = 'block';
                    window.loadProvinces('checkProv');
                };
        
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
                    
                    if(!(await appConfirm('Konfirmasi Pembayaran', `Bayar Rp ${new Intl.NumberFormat('id-ID').format(totalFinal)}?`))) return;
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
                    
                    const q = window.query(
                        window.collection(window.db, "pesanan_fisik"), 
                        window.where("uid", "==", user.uid), 
                        window.orderBy("timestamp", "desc")
                    );
                    
                    window.onSnapshot(q, (snap) => {
                        if(snap.empty) {
        area.innerHTML = "<div style='text-align:center; margin-top:50px; color:#ccc;'><i class='fas fa-box-open' style='font-size:50px; margin-bottom:10px;'></i><p>Belum ada pesanan fisik.</p></div>";
        return;
                        }
                        
                        let html = "";
                        snap.forEach(d => {
        const data = d.data();
        const idDoc = d.id;
        let statusColor = "#f39c12"; 
        if(data.status === 'DIKIRIM') statusColor = "#3498db";
        if(data.status === 'SELESAI') statusColor = "#2ecc71";
        
        const encodedData = encodeURIComponent(JSON.stringify({...data, id: idDoc, timestamp: data.timestamp ? data.timestamp.seconds : 0}));
        
        html += `<div style="background:white; padding:12px; border-radius:15px; margin-bottom:12px; box-shadow:0 2px 5px rgba(0,0,0,0.05); border:1px solid #eee; display:flex; gap:12px; align-items:center; cursor:pointer;" onclick="bukaDetailPesananFisik('${encodedData}')">
            <img src="${data.produk_img || data.img || 'https://via.placeholder.com/150'}" style="width:65px; height:65px; border-radius:10px; object-fit:cover; background:#f9f9f9;">
            <div style="flex:1;">
                <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:4px;">
                    <span style="font-size:10px; font-weight:bold; color:${statusColor}; text-transform:uppercase;">${data.status}</span>
                    <span style="font-size:9px; color:#999;">${data.timestamp ? new Date(data.timestamp.seconds*1000).toLocaleDateString() : '-'}</span>
                </div>
                <div style="font-weight:700; font-size:13px; color:#333; margin-bottom:2px; line-height:1.3;">${data.produk}</div>
                <div style="font-size:12px; font-weight:800; color:var(--primary);">Rp ${new Intl.NumberFormat('id-ID').format(data.total)}</div>
            </div>
            <i class="fas fa-chevron-right" style="color:#ccc; font-size:12px;"></i>
        </div>`;
                        });
                        area.innerHTML = html;
                    }, (error) => {
                        console.error("Error Load Pesanan:", error);
                        if (error.message.toLowerCase().includes("index")) {
        area.innerHTML = `<div style='text-align:center; padding:20px; color:red; font-size:12px;'>\n                        <b>Database Error: Index Belum Dibuat</b><br>\n                        Buka Console Browser (F12), cari link error berwarna merah, dan klik untuk membuat Index otomatis di Firebase.\n                    </div>`;
                        } else {
        area.innerHTML = `<p style='text-align:center;color:red'>Gagal memuat data: ${error.message}</p>`;
                        }
                    });
                };
        
                    window.switchLapakTab = (tab) => {
                    document.querySelectorAll('.lapak-tab').forEach(t => t.classList.remove('active'));
                    document.getElementById('containerLapakSaya').style.display = 'none';
                    document.getElementById('containerPenjualanSaya').style.display = 'none';
                    document.getElementById('containerAlamatSaya').style.display = 'none';
        
                    if(tab === 'barang') {
                        document.getElementById('tabBarang').classList.add('active');
                        document.getElementById('containerLapakSaya').style.display = 'block';
                        loadProdukLapak();
                    } else if(tab === 'penjualan') {
                        document.getElementById('tabPenjualan').classList.add('active');
                        document.getElementById('containerPenjualanSaya').style.display = 'block';
                        loadPenjualanSaya();
            } else {
                        document.getElementById('tabAlamat').classList.add('active');
                        document.getElementById('containerAlamatSaya').style.display = 'block';
                        window.loadProvinces('sellerProv');
                        
                        // Ambil data alamat tersimpan dari Firestore
                        const user = window.auth.currentUser;
                        const txtLabel = document.getElementById('txtAlamatTersimpan');
                        if(user) {
        window.getDoc(window.doc(window.db, "users", user.uid)).then(d => {
            if(d.exists() && d.data().origin_name) {
                txtLabel.innerText = d.data().origin_name;
            } else {
                txtLabel.innerText = "Belum diset";
            }
        });
                        }
                    }
                };
        
                window.loadPenjualanSaya = () => {
                    const user = window.auth.currentUser;
                    if(!user) return;
                    const area = document.getElementById('listPenjualanSaya');
                    area.innerHTML = "<p style='text-align:center; color:#999; margin-top:30px;'>Memuat pesanan masuk...</p>";
        
                    const q = window.query(
                        window.collection(window.db, "pesanan_fisik"),
                        window.where("seller_uid", "==", user.uid),
                        window.orderBy("timestamp", "desc")
                    );
        
                    window.onSnapshot(q, (snap) => {
                        if(snap.empty) {
        area.innerHTML = "<div style='text-align:center; margin-top:30px; color:#ccc;'><p>Belum ada pesanan masuk.</p></div>";
        return;
                        }
                        let html = "";
                        snap.forEach(d => {
        const data = d.data();
        const id = d.id;
        let statusColor = "#f39c12"; 
        if(data.status === 'DIKIRIM') statusColor = "#3498db";
        if(data.status === 'SELESAI') statusColor = "#2ecc71";
        
        html += `<div class="seller-order-card">
            <div style="display:flex; justify-content:space-between; margin-bottom:10px; border-bottom:1px dashed #eee; padding-bottom:8px;">
                <span style="font-weight:bold; color:${statusColor}; font-size:11px;">${data.status}</span>
                <span style="color:#999; font-size:10px;">${data.timestamp ? new Date(data.timestamp.seconds*1000).toLocaleDateString() : '-'}</span>
            </div>
            <div style="display:flex; gap:12px; align-items:center; margin-bottom:10px;">
                <img src="${data.produk_img || data.img || 'https://via.placeholder.com/150'}" style="width:55px; height:55px; border-radius:8px; object-fit:cover;">
                <div style="flex:1;">
                    <div style="font-weight:bold; font-size:13px; line-height:1.2;">${data.produk}</div>
                    <div style="font-size:11px; color:#666; margin-top:2px;">Pembeli: <b>${data.username}</b></div>
                </div>
            </div>
            <div style="background:#f9f9f9; padding:10px; border-radius:8px; font-size:11px; color:#555; margin-bottom:12px;">
                <div style="margin-bottom:4px;"><b>Alamat:</b> ${data.alamat_lengkap}</div>
                <div><b>Kurir:</b> ${data.kurir}</div>
            </div>
            ${data.status === 'DIKEMAS' ? `<button onclick="prosesInputResi('${id}')" style="width:100%; padding:10px; background:var(--primary); color:white; border:none; border-radius:8px; font-weight:bold; cursor:pointer;">Kirim Barang & Input Resi</button>` : `<div style="font-size:11px; background:#e1effe; color:var(--primary); padding:10px; border-radius:8px; border:1px solid rgba(185,28,28,0.1);"><b>Nomor Resi:</b> ${data.resi}</div>`}
        </div>`;
                        });
                        area.innerHTML = html;
                    }, (err) => {
                        if(err.message.toLowerCase().includes('index')) {
                           area.innerHTML = "<p style='color:red; font-size:11px; text-align:center; padding:20px;'>Database butuh Index. Buka Console Browser (F12) & klik link Firebase yang muncul di error merah.</p>";
                        } else {
                           area.innerHTML = "<p style='color:red; text-align:center;'>Gagal memuat: "+err.message+"</p>";
                        }
                    });
                };
        
                window.prosesInputResi = async (id) => {
                    const resi = await appPrompt('Input Resi', 'Masukkan Nomor Resi Pengiriman untuk Pesanan ini:', 'Nomor resi pengiriman');
                    if(!resi) return;
                    try {
                        await window.updateDoc(window.doc(window.db, "pesanan_fisik", id), {
        resi: resi,
        status: "DIKIRIM"
                        });
                        alert("Nomor Resi berhasil disimpan! Status pesanan kini DIKIRIM.");
                    } catch(e) { alert("Gagal update: "+e.message); }
                };
        
                window.konfirmasiTerimaBarang = async (id) => {
                    if(await appConfirm('Konfirmasi', 'Apakah barang benar-benar sudah diterima? Status akan menjadi SELESAI.')) {
                        try {
        await window.updateDoc(window.doc(window.db, "pesanan_fisik", id), { status: "SELESAI" });
                        } catch(e) { alert("Gagal update: " + e.message); }
                    }
                };
        
                        window.bukaDetailPesananFisik = (str) => {
                    const data = JSON.parse(decodeURIComponent(str));
                    const modalDetail = document.getElementById('modalDetailRiwayat');
                    
                    let icon = "fa-box-open"; let color = "#f39c12";
                    if(data.status === 'DIKIRIM') { icon = "fa-shipping-fast"; color = "#3498db"; }
                    if(data.status === 'SELESAI') { icon = "fa-check-circle"; color = "#2ecc71"; }
                    
                    let html = `
                        <div class="receipt-header">
        <div class="receipt-icon" style="background:${color}"><i class="fas ${icon}"></i></div>
        <div class="receipt-status" style="color:${color}">PESANAN ${data.status}</div>
        <div style="font-size:12px; color:#999; margin-top:5px;">ID Pesanan: #${data.id.slice(0,8).toUpperCase()}</div>
                        </div>
        
                        <div style="background:#f9f9f9; padding:15px; border-radius:15px; display:flex; gap:12px; align-items:center; margin-bottom:20px;">
        <img src="${data.produk_img || 'https://via.placeholder.com/60'}" style="width:60px; height:60px; border-radius:8px; object-fit:cover;">
        <div style="flex:1;">
            <div style="font-weight:700; font-size:13px; line-height:1.2;">${data.produk}</div>
            <div style="font-size:11px; color:#777; margin-top:4px;">Rp ${new Intl.NumberFormat('id-ID').format(data.harga_barang)} x 1</div>
        </div>
                        </div>
        
                        <div style="font-size:13px; font-weight:bold; color:#333; margin-bottom:10px;">Informasi Pengiriman</div>
                        <div class="detail-item"><span>Kurir</span><span class="detail-val">${data.kurir}</span></div>
                        <div class="detail-item"><span>No. Resi</span><span class="detail-val">${data.resi || 'Belum tersedia'}</span></div>
                        <div class="detail-item"><span>Alamat</span><span class="detail-val" style="max-width:70%; text-align:right;">${data.alamat_lengkap}</span></div>
                        
                        <div class="receipt-divider"></div>
                        
                        <div class="detail-item"><span>Subtotal Barang</span><span class="detail-val">Rp ${new Intl.NumberFormat('id-ID').format(data.harga_barang)}</span></div>
                        <div class="detail-item"><span>Ongkos Kirim</span><span class="detail-val">Rp ${new Intl.NumberFormat('id-ID').format(data.ongkir)}</span></div>
                        <div class="detail-item" style="margin-top:10px; font-weight:800; color:#333; font-size:15px;"><span>Total Bayar</span><span>Rp ${new Intl.NumberFormat('id-ID').format(data.total)}</span></div>
                    `;
        
                    if(data.status === 'DIKIRIM') {
                        html += `<button class="btn-konfirmasi" style="margin-top:20px; background:#2ecc71;" onclick="konfirmasiTerimaBarang('${data.id}'); document.getElementById('modalDetailRiwayat').style.display='none';">Pesanan Diterima</button>`;
                        if(data.resi) {
        html += `<button class="btn-konfirmasi" style="margin-top:10px; background:white; color:var(--primary); border:1px solid var(--primary);" onclick="window.lacakResiLive('${data.resi}', '${data.kurir}')"><i class="fas fa-search-location"></i> Lacak Posisi Paket</button>`;
                        }
                    }
                    
                    html += `<button class="btn-konfirmasi" style="margin-top:10px; background:#f0f0f0; color:#555;" onclick="document.getElementById('modalDetailRiwayat').style.display='none'">Tutup</button>`;
                    
                    document.getElementById('detailRiwayatContent').innerHTML = html;
                    modalDetail.style.display = "flex";
                };
        
                        window.lacakResiLive = async (resi, kurir) => {
                    if (!resi || !kurir) return alert("Resi atau kurir tidak valid");
                    const courierCode = kurir.toLowerCase().replace(/\s/g, '');
                    window.showNotice('loading', 'Melacak', 'Mengambil data kurir...');
                    try {
                        const response = await fetch(`${KLIKRESI_PROXY}?action=tracking&resi=${resi}&courier=${courierCode}`);
                        const res = await response.json();
                        if (res.data) {
        let historyHtml = `<div style="text-align:left; max-height:300px; overflow-y:auto; font-size:11px; margin-top:15px; border-top:1px dashed #ddd; padding-top:15px;">`;
        res.data.histories.forEach(h => {
            historyHtml += `<div style="border-left:2px solid var(--primary); padding-left:15px; margin-bottom:15px; position:relative;">
                <div style="width:8px; height:8px; background:var(--primary); border-radius:50%; position:absolute; left:-5px; top:0;"></div>
                <div style="font-weight:bold; color:#333;">${h.status}</div>
                <div style="color:#666; margin:2px 0;">${h.message}</div>
                <div style="font-size:9px; color:#999;">${new Date(h.date).toLocaleString('id-ID')}</div>
            </div>`;
        });
        historyHtml += `</div>`;
        document.getElementById('noticeTitle').innerText = "Status Pengiriman";
        document.getElementById('noticeMsg').innerHTML = `<div style="background:#f0f7ff; padding:10px; border-radius:10px; margin-bottom:10px; text-align:left; font-size:12px;"><b>Resi:</b> ${resi}<br><b>Status:</b> ${res.data.status}</div>${historyHtml}`;
        document.getElementById('btnNoticeClose').style.display = 'block';
                        } else { window.showNotice('error', 'Gagal', 'Resi tidak ditemukan atau belum terupdate.'); }
                    } catch (e) { window.showNotice('error', 'Error', 'Gagal menghubungkan ke server kurir.'); }
                };
        
                        // --- SISTEM TAGIHAN & PEMBAYARAN OTOMATIS ---
            // --- SISTEM TAGIHAN & PEMBAYARAN OTOMATIS (LOGIKA BARU DENGAN CACHE JSON) ---
                                    // --- FUNGSI PARSING TAGIHAN CERDAS & AKURAT ---
                        // --- FUNGSI PARSING TAGIHAN (PERBAIKAN AKURASI NAMA) ---
                        // --- FUNGSI PARSING & KALKULASI TAGIHAN (DIPERBAIKI) ---
                        // --- FUNGSI PARSING & KALKULASI TAGIHAN (FIXED: ERROR FIND) ---
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
                    
                    if(!(await appConfirm('Konfirmasi Pembayaran', `Bayar tagihan senilai Rp ${new Intl.NumberFormat('id-ID').format(data.harga)}?`))) return;
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
            reader.onloadend = function() {
                const base64data = reader.result;
                try {
                    localStorage.setItem(cacheKey, base64data);
                    // Update src setelah berhasil didownload
                    img.src = base64data;
                } catch (e) {
                    console.warn('Penyimpanan Penuh, gagal cache gambar:', e);
                }
            }
            reader.readAsDataURL(blob);
        } catch (e) {
            console.error('Gagal fetch gambar untuk cache:', e);
        }
                        }
                    });
                };
                // Jalankan caching saat halaman selesai dimuat
                window.addEventListener('load', window.setupMenuImageCaching);
        
        
        
        
                        
        
                // --- CANGKOK SYSTEM AKRAB SPESIAL (TEMBAK XL) ---
                window.currentXlNumber = '';
                window.allAkrabProducts = [];
                window.selectedType = '';
                window.selectedCategory = '';
                window.pendingAkrabOrder = null;
        
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
        <h4 style="margin-top:0; margin-bottom:15px; color:#450a0a;"><i class="fas fa-sign-in-alt"></i> Login Nomor Pelanggan</h4>
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
        <div style="background:linear-gradient(135deg, #450a0a, #0f172a); color:white; padding:15px; border-radius:15px; margin-bottom:20px; box-shadow:0 5px 15px rgba(0,0,0,0.1);">
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
        <h3 style="margin-top:0; color:#450a0a; text-align:center; border-bottom:1px dashed #cbd5e1; padding-bottom:12px; margin-bottom:15px; font-size:16px;">Konfirmasi Tembak</h3>
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
                    if(await appConfirm('Konfirmasi', 'Hapus sesi '+num+'?')) { 
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
                    cats.forEach(c => { html += `<button style="padding:8px 16px; border-radius:20px; font-size:11px; font-weight:bold; white-space:nowrap; border:none; margin-right:5px; cursor:pointer; ${c === window.selectedCategory ? 'background:#be123c;color:white;' : 'background:#e2e8f0;color:#475569;'}" onclick="window.selectedCategory='${c}';window.renderCategoryFilters()">${c}</button>`; });
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
                        await window.setDoc(docRef, { uid:uid, username:userSnap.data().username, tujuan:window.currentXlNumber, kategori:'Akrab Spesial', produk:p.name, kode_produk:p.code, harga:price, status:'PENDING', sn:'Diproses', trx_id:refId, provider:'KAJE', timestamp:window.serverTimestamp() });
        
                        const req = await fetch('kaje_proxy.php?api_action=order_package_otp', { method: 'POST', body: JSON.stringify({ destination: window.currentXlNumber, ref_id: refId, code: p.code, payment: method }) });
                        const res = await req.json();
        
                        if (res.success) {
        let trxIdKaje = res.data?.trx_id || refId;
        let snTeks = res.data?.deeplink ? res.data.deeplink : ("#" + trxIdKaje);
        await window.updateDoc(docRef, { sn: snTeks, trx_id: trxIdKaje });
        window.showNotice('success', 'Terkirim', res.data?.deeplink ? 'Cek Riwayat untuk Link Pembayaran' : 'Transaksi sedang diproses pusat.');
                        } else { throw new Error(res.message); }
                    } catch (e) { window.showNotice('error', 'Gagal', e.message); }
                };
        
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
        
                // --- INTEGRASI ICS STORE (PAKET AKRAB V2) ---
                window.icsData = [];
        
                
;
        
                
;
        
                window.escapeAkrabHtml = function(value) {
                    return String(value ?? '').replace(/[&<>"']/g, function(ch) {
                        return ({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;'})[ch];
                    });
                };
        
                window.formatAkrabDesc = function(raw, source) {
                    let text = String(raw || '').replace(/<br\s*\/?\>/gi, '\n').replace(/\r/g, '').replace(/\t/g, ' ');
                    text = text.replace(/Details\s+Kuota\s*:/ig, 'Detail Kuota:');
                    text = text.replace(/noted\s*:/ig, 'Catatan:').replace(/note\s*:/ig, 'Catatan:');
                    const lines = text.split('\n').map(x => x.replace(/\s+/g, ' ').trim()).filter(Boolean);
                    if (!lines.length) return '';
                    const sections = [];
                    let current = null;
                    const iconMap = { 'Detail Kuota': 'fa-signal', 'Syarat Nomor': 'fa-list-check', 'Catatan': 'fa-circle-info', 'Info Produk': 'fa-file-lines' };
                    function addSection(title) {
                        current = { title: title, items: [] };
                        sections.push(current);
                    }
                    lines.forEach(line => {
                        const lower = line.toLowerCase();
                        if (/^detail\s*kuota\s*:?$/.test(lower) || /^kuota\s*:?$/.test(lower)) { addSection('Detail Kuota'); return; }
                        if (/^syarat\s*nomor\s*:?$/.test(lower) || /^syarat\s*:?$/.test(lower)) { addSection('Syarat Nomor'); return; }
                        if (/^(catatan|note|noted)\s*:?$/.test(lower)) { addSection('Catatan'); return; }
                        if (!current) addSection(lower.includes('kuota') || lower.includes('area') ? 'Detail Kuota' : 'Info Produk');
                        current.items.push(line.replace(/^[-~•]+\s*/, ''));
                    });
                    return `<div class="akrab-desc-pretty">${sections.filter(s => s.items.length).map(s => {
                        const icon = iconMap[s.title] || 'fa-file-lines';
                        return `<div class="akrab-desc-section"><div class="akrab-desc-title"><i class="fas ${icon}"></i>${s.title}</div>${s.items.map(item => `<div class="akrab-desc-line">${window.escapeAkrabHtml(item)}</div>`).join('')}</div>`;
                    }).join('')}</div>`;
                };
        
                window.renderAkrabProductCard = function(cfg) {
                    cfg = cfg || {};
                    const source = String(cfg.source || 'AKRAB').toUpperCase();
                    const name = window.escapeAkrabHtml(cfg.name || 'Produk');
                    const price = Number(cfg.price || 0);
                    const stockReady = cfg.stock !== undefined && cfg.stock !== null && cfg.stock !== '';
                    const stock = stockReady ? window.escapeAkrabHtml(cfg.stock) : '';
                    const status = String(cfg.status || '').toUpperCase();
                    const badgeClass = status === 'GANGGUAN' ? 'badge-gangguan' : (status === 'KOSONG' ? 'badge-kosong' : 'badge-preorder');
                    const badge = status ? `<span class="akrab-product-badge ${badgeClass}">${window.escapeAkrabHtml(status)}</span>` : '';
                    const icon = 'fa-box-open';
                    const disabledClass = cfg.disabled ? 'akrab-disabled' : '';
                    const descHtml = window.formatAkrabDesc(cfg.desc || '', source);
                    const clickEvent = cfg.clickEvent || '';
                    return `<div class="item-produk akrab-product-card ${disabledClass}" ${clickEvent}>
        <div class="akrab-product-head">
            <div class="akrab-product-left">
                <span class="akrab-product-icon"><i class="fas ${icon}"></i></span>
                <div class="akrab-product-title-wrap">
                    <div class="akrab-product-title-line"><span class="akrab-product-title">${name}</span>${badge}</div>
                    <div class="akrab-product-meta">
                        <span><i class="fas fa-box-open"></i>Paket Akrab</span>
                        <span class="akrab-product-validity"><i class="fas fa-calendar-check"></i>Kuota 28 hari</span>
                        ${stockReady ? `<span class="akrab-product-stock"><i class="fas fa-cubes"></i>Stok: ${stock}</span>` : ''}
                    </div>
                </div>
            </div>
            <div class="akrab-product-price">Rp ${new Intl.NumberFormat('id-ID').format(price)}</div>
        </div>
        ${descHtml ? `<div class="akrab-product-desc">${descHtml}</div>` : ''}
                    </div>`;
                };
        
        
                
;
        
                
;
        
                
;
        
        
                // --- INTEGRASI ICS STORE (PAKET AKRAB V2) ---
                window.icsData = [];
        
                window.loadIcsData = async function() {
                    const areaList = document.getElementById('listProdukArea');
                    const areaFilter = document.getElementById('areaFilter');
                    
                    if(areaFilter) areaFilter.innerHTML = "";
                    if(areaList) areaList.innerHTML = "<div style='text-align:center; padding:40px;'><i class='fas fa-circle-notch fa-spin'></i> Memuat Produk...</div>";
        
                    try {
                        const req = await fetch('ics_proxy.php?action=list');
                        const res = await req.json();
                        
                    if(res.success && res.data) {
        res.data.forEach(item => {
            if (item.code === 'CFMX') {
                item.type = 'fmax';
                item.price = 0;
            }
        });
        res.data.forEach(function(item) { if (item.type && (item.type.toUpperCase() === 'XDA' || item.type.toUpperCase() === 'AKRAB FRESH (XDA)')) item.type = 'XDA(Smart)'; });
        window.icsData = res.data;
        window.renderIcsFilters();
                        } else {
        if(areaList) areaList.innerHTML = `<div style='text-align:center; padding:20px;'>Gagal: ${res.message || 'Data Kosong'}</div>`;
                        }
                    } catch(e) {
                        console.error(e);
                        if(areaList) areaList.innerHTML = "<div style='text-align:center; color:red; padding:20px;'>Gagal koneksi ke server.</div>";
                    }
                };
        
                window.renderIcsFilters = function() {
                    const rawTypes = window.icsData.map(i => (i.type || 'Lainnya').toUpperCase());
                    const types = [...new Set(rawTypes)].sort();
                    
                    let html = '';
                    types.forEach(t => {
                        html += `<div class="filter-card" onclick="window.filterIcs('${t}', this)" style="min-width:auto; padding:8px 12px; margin:0; display:inline-flex; align-items:center; justify-content:center; height:auto; border-radius:8px; background:white; border:1px solid #eee; white-space:nowrap; flex-shrink:0;">
        <span style="font-size:11px; font-weight:bold; color:#555;">${t}</span>
                        </div>`;
                    });
                    
                    const areaFilter = document.getElementById('areaFilter');
                    if(areaFilter) {
                        areaFilter.innerHTML = html;
                        areaFilter.style.display = "flex";
                        areaFilter.style.overflowX = "auto";
                        areaFilter.style.gap = "8px";
                        areaFilter.style.padding = "10px 5px";
                        areaFilter.style.gridTemplateColumns = "none";
                        areaFilter.style.scrollbarWidth = "none"; 
                    }
                    if(types.length > 0) window.filterIcs(types[0], document.querySelector('#areaFilter .filter-card'));
                };
        
                window.filterIcs = function(type, el) {
                    document.querySelectorAll('.filter-card, .akrab-btn').forEach(e => e.classList.remove('active'));
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
                        let desc = p.description || '';
        
                        const isPO = (arguments.length > 2 ? arguments[2] : false) || document.getElementById('judulMenu').innerText === 'PO Akrab';
                        let isAvailable = isPO || (p.status === 'available' && p.stock > 0);
                        let clickEvent = isPO ? `onclick="window.siapkanInvoicePO('${pCode}', '${pName}', ${finalPrice}, 'ICS')"` : (isAvailable ? `onclick="window.siapkanInvoiceIcs('${pCode}', '${pName}', ${finalPrice}, '${p.type}')"` : `onclick="alert('Stok Habis')"`);
                        let statusText = isPO ? 'PRE-ORDER' : (isAvailable ? '' : 'GANGGUAN');
        
                        html += window.renderAkrabProductCard({
                            name: pName,
                            price: finalPrice,
                            stock: p.stock,
                            desc: desc,
                            status: statusText,
                            source: 'ICS',
                            disabled: !isAvailable && !isPO,
                            clickEvent: clickEvent
                        });
                    });
                    
                    const judulMenuText = document.getElementById('judulMenu') ? document.getElementById('judulMenu').innerText : '';
                    if (window.inlineAkrabMode) {
                        const areaListInline = document.getElementById('inlineAkrabList');
                        if(areaListInline) areaListInline.innerHTML = html || "<div style='padding:20px; text-align:center;'>Produk kosong</div>";
                    } else if (judulMenuText === 'Paket Akrab All' || judulMenuText === 'PO Akrab') {
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
        
                    document.getElementById('modalInvoice').style.display = 'none';
                    window.showNotice('loading', 'Memproses', 'Sedang memproses transaksi...');
        
                    try {
                        const userRef = window.doc(window.db, "users", user.uid);
                        const userSnap = await window.getDoc(userRef);
                        const curSaldo = userSnap.data().saldo || 0;
        
                        if(curSaldo < data.baseHarga) return window.showNotice('error', 'Gagal', 'Saldo tidak mencukupi!');
        if (!(await window.cekSinkronisasiDoniGuard(user.uid, curSaldo))) return;
                        await window.updateDoc(userRef, { saldo: curSaldo - data.baseHarga });
        
                        const req = await fetch(`ics_proxy.php?action=trx`, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ 
            code: data.kode, 
            dest: hp, 
            refid: 'TRX' + Math.floor(Date.now() + Math.random()) 
        })
                        });
                        const res = await req.json();
        
                        if(res.success && res.data) {
        const trxId = res.data.refid;
        const msg = res.data.message || "Transaksi diproses";
        
        window.showNotice('success', 'Berhasil', msg);
        
        // --- INTEGRASI DONIGUARD (FIX: Catat Transaksi ICS/Akrab v2) ---
        if(window.triggerDoniGuard) {
            window.triggerDoniGuard({
                action: 'transaksi',
                produk: data.nama,
                nominal: data.baseHarga,
                trx_id: trxId,
                saldo_akhir_client: curSaldo - data.baseHarga
            });
        }
        // --------------------------------------------------
        
        const docRef = await window.addDoc(window.collection(window.db, "users", user.uid, "riwayat_transaksi"), {
            uid: user.uid,
            username: userSnap.data().username,
            tujuan: hp,
            produk: data.nama,
            kode_produk: data.kode,
            harga: data.baseHarga,
            status: 'PENDING',
            sn: msg,
            trx_id: trxId,
            provider: 'ICS',
            timestamp: window.serverTimestamp()
        });
        
        window.monitorIcsTrx(trxId, docRef.id);
        
                        } else {
        await window.updateDoc(userRef, { saldo: curSaldo }); 
        window.showNotice('error', 'Gagal', (res.data ? res.data.message : res.message) || 'Gagal dari server pusat');
                        }
                    } catch(e) {
                        try {
         const userRef = window.doc(window.db, "users", user.uid);
         const userSnap = await window.getDoc(userRef);
         await window.updateDoc(userRef, { saldo: (userSnap.data().saldo || 0) + data.baseHarga });
                        } catch(ex){}
                        window.showNotice('error', 'Error', 'Terjadi kesalahan sistem: ' + e.message);
                    }
                };
        
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
        
                // --- KHFY RESPONSE GUARD (INDEX) ---
                window.safeParseKhfyResponse = async function(req) {
                    const rawText = await req.text();
                    const cleaned = (rawText || '').trim();
                    if (!cleaned) {
                        return { status: false, success: false, message: 'KHFY mengembalikan response kosong', __raw: '' };
                    }
        
                    try {
                        return JSON.parse(cleaned);
                    } catch(e) {}
        
                    try {
                        const normalized = cleaned.replace(/^\s*\(([\s\S]*)\)\s*;?\s*$/, '$1');
                        return JSON.parse(normalized);
                    } catch(e) {}
        
                    return {
                        status: false,
                        success: false,
                        message: cleaned,
                        __raw: cleaned,
                        __nonJson: true
                    };
                };
        
                window.getKhfyResponseText = function(res) {
                    if (typeof res === 'string') return res;
                    if (!res) return '';
                    const parts = [];
                    try {
                        const d = res.data || {};
                        parts.push(res.message, res.msg, res.keterangan, res.status, res.status_text, res.status_code, res.raw, res.__raw);
                        parts.push(d.message, d.msg, d.keterangan, d.status, d.status_text, d.status_code, d.sn, d.note);
                        if (d.data) parts.push(d.data.message, d.data.msg, d.data.keterangan, d.data.status, d.data.status_text, d.data.status_code, d.data.sn, d.data.note);
                        parts.push(JSON.stringify(res));
                    } catch(e) {}
                    return parts.filter(Boolean).join(' | ');
                };
        
                window.isKhfyFailedResponse = function(res) {
                    const txt = window.getKhfyResponseText(res).toLowerCase()
                        .replace(/"success"\s*:\s*false/gi, '')
                        .replace(/"status"\s*:\s*false/gi, '')
                        .replace(/"pending"\s*:\s*false/gi, '')
                        .replace(/"unknown"\s*:\s*true/gi, '')
                        .replace(/"__nonjson"\s*:\s*true/gi, '');
                    return /\b(gagal|failed|failure|batal|cancel|cancelled|refund|error|invalid)\b/i.test(txt) ||
                           /stock\s+transaksi\s+habis/i.test(txt) ||
                           /transaksi\s+habis/i.test(txt) ||
                           /stok\s+habis/i.test(txt) ||
                           /stock\s+habis/i.test(txt) ||
                           /saldo\s+kurang/i.test(txt) ||
                           /produk\s+kosong/i.test(txt) ||
                           /stok\s+kosong/i.test(txt) ||
                           /stock\s+kosong/i.test(txt);
                };
        
                window.isKhfySuccessResponse = function(res) {
                    if (window.isKhfyFailedResponse(res)) return false;
                    const txt = window.getKhfyResponseText(res).toLowerCase()
                        .replace(/"success"\s*:\s*false/gi, '')
                        .replace(/"status"\s*:\s*false/gi, '')
                        .replace(/"pending"\s*:\s*false/gi, '')
                        .replace(/"unknown"\s*:\s*true/gi, '')
                        .replace(/"__nonjson"\s*:\s*true/gi, '');
                    const d = (res && res.data) ? res.data : (res || {});
                    if (res && (res.success === true || res.status === true)) return true;
                    if (/\b(berhasil|sukses|success|completed|complete|selesai)\b/i.test(txt)) return true;
                    if (d.trxid || d.refid || d.reffid || (d.data && (d.data.trxid || d.data.refid || d.data.reffid))) {
                        return !/\b(pending|proses|processing|menunggu|antrian|antrean)\b/i.test(txt);
                    }
                    return false;
                };
        
                window.isKhfyPendingResponse = function(res) {
                    if (window.isKhfyFailedResponse(res) || window.isKhfySuccessResponse(res)) return false;
                    const txt = window.getKhfyResponseText(res).toLowerCase()
                        .replace(/"success"\s*:\s*false/gi, '')
                        .replace(/"status"\s*:\s*false/gi, '')
                        .replace(/"pending"\s*:\s*false/gi, '')
                        .replace(/"unknown"\s*:\s*true/gi, '')
                        .replace(/"__nonjson"\s*:\s*true/gi, '');
                    return /\b(pending|proses|process|processing|diproses|menunggu|antrian|antrean|queue|waiting)\b/i.test(txt);
                };
        
                window.isKhfyUnauthorizedResponse = function(res) {
                    const txt = window.getKhfyResponseText(res).toLowerCase();
                    return /not\s+authorized|unauthorized|401\s+not\s+authorized|\b401\b|forbidden|\b403\b/i.test(txt);
                };
        
                window.isKhfyUncertainResponse = function(res) {
                    if (window.isKhfyFailedResponse(res) || window.isKhfySuccessResponse(res) || window.isKhfyPendingResponse(res) || window.isKhfyUnauthorizedResponse(res)) return false;
                    const raw = (typeof res === 'string') ? res : JSON.stringify(res || {});
                    const txt = raw.toLowerCase();
                    return txt.includes('http_client_response_body_error') ||
                           txt.includes('http_client_sesponse_body_error') ||
                           txt.includes('response_body_error') ||
                           txt.includes('body_error') ||
                           txt.includes('body error') ||
                           txt.includes('timeout') ||
                           txt.includes('timed out') ||
                           txt.includes('parse') ||
                           txt.includes('__nonjson') ||
                           txt.includes('response kosong');
                };
        
                window.isKhfyMonitorBlocked = function(data) {
                    data = data || {};
                    const status = String(data.status || '').toUpperCase();
                    const text = [data.sn, data.raw_json, data.log_api, data.message, data.refund_reason].filter(Boolean).join(' | ').toLowerCase();
                    if (status === 'BERHASIL' || status === 'SUKSES' || status === 'GAGAL' || status === 'BATAL' || status === 'REFUND') return true;
                    if (data.isRefunded === true) return true;
                    if (/\b(gagal|failed|batal|refund)\b|stock\s+transaksi\s+habis|transaksi\s+habis|stok\s+habis|stock\s+habis|saldo\s+kurang/i.test(text)) return true;
                    if (/not\s+authorized|unauthorized|401\s+not\s+authorized|\b401\b|forbidden|\b403\b/i.test(text)) return true;
                    return false;
                };
        
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
                    if (kode.startsWith("XDA")) return "XDA(Lion)";
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
                    const brands = [...new Set(rawBrands)].filter(b => b !== 'Tes System' && b !== 'PLN Pascabayar').sort();
                    
                    let html = '';
                    brands.forEach(b => {
                        // Tampilan Chip Simpel (Tanpa Icon Bulat)
                        html += `<div class="filter-card" onclick="window.filterKhfy('${b}', this)" style="min-width:auto; padding:8px 12px; margin:0; display:inline-flex; align-items:center; justify-content:center; height:auto; border-radius:8px; background:white; border:1px solid #eee; white-space:nowrap; flex-shrink:0;">
        <span style="font-size:11px; font-weight:bold; color:#555;">${b}</span>
                        </div>`;
                    });
                    const areaFilter = document.getElementById('areaFilter');
                    const areaList = document.getElementById('listProdukArea');
                    
                    if(areaFilter) {
                        areaFilter.innerHTML = html;
                        // Style 1 Baris (Horizontal Scroll)
                        areaFilter.style.display = "flex";
                        areaFilter.style.overflowX = "auto";
                        areaFilter.style.gap = "8px";
                        areaFilter.style.padding = "10px 5px";
                        areaFilter.style.gridTemplateColumns = "none";
                        areaFilter.style.scrollbarWidth = "none"; 
                    }
            // AUTO SELECT: Prioritaskan XDA, jika tidak ada ambil yang pertama
                    const targetName = "XDA(Lion)";
                    const selectedBrand = brands.includes(targetName) ? targetName : (brands.length > 0 ? brands[0] : null);
        
                    if(selectedBrand) {
                        setTimeout(() => {
        const cards = document.querySelectorAll('#areaFilter .filter-card');
        let clicked = false;
        cards.forEach(c => {
            if(!clicked && c.innerText.trim() === selectedBrand) { c.click(); clicked = true; }
        });
        if(!clicked && cards.length > 0) cards[0].click();
                        }, 50);
                    } else {
                        if(areaList) areaList.innerHTML = "<div style='text-align:center; padding:20px; color:#999;'>Silakan pilih kategori di atas</div>";
                    }
                };
        
                window.filterKhfy = async function(brand, el) {
                    document.querySelectorAll('.filter-card, .akrab-btn').forEach(e => e.classList.remove('active'));
                    if(el) el.classList.add('active');
        
                    const products = window.khfyData.filter(i => window.getKhfyCategory(i) === brand && !['BPAL1', 'BPAXXL1', 'BPAXL3', 'XLB75'].includes(i.kode_produk));
                    products.sort((a,b) => parseInt(a.harga_final) - parseInt(b.harga_final));
        
                    let stockMap = {};
                    if (brand === 'Akrab Fresh (XLA)') {
                        const isModal = document.getElementById('judulMenu') && (document.getElementById('judulMenu').innerText === 'Paket Akrab All' || document.getElementById('judulMenu').innerText === 'PO Akrab');
                        const targetArea = window.inlineAkrabMode ? document.getElementById('inlineAkrabList') : (isModal ? document.getElementById('listProdukModalArea') : document.getElementById('listProdukArea'));
                        if (targetArea) targetArea.innerHTML = "<div style='text-align:center; padding:20px; color:#666;'><i class='fas fa-circle-notch fa-spin'></i> Mengecek stok terbaru...</div>";
                    try {
        const reqStock = await fetch('khfy_xla_stock.php');
        const resStock = await reqStock.json();
        if(resStock.ok && resStock.data) {
            resStock.data.forEach(st => {
                stockMap[st.type] = st.sisa_slot;
            });
        }
                        } catch(e) { console.error("Gagal cek stok XLA", e); }
                    }
        
            let html = '';
                    let markup = 0;
                    if(window.markupConfig) {
                        if(brand === 'KDA (PROMO)' && window.markupConfig['KDA (PROMO)'] !== undefined) markup = parseInt(window.markupConfig['KDA (PROMO)']);
                        else if(window.markupConfig['Paket Akrab'] !== undefined) markup = parseInt(window.markupConfig['Paket Akrab']);
                        else if(window.markupConfig['General']) markup = parseInt(window.markupConfig['General']);
                    }
        
            products.forEach(p => {
                        let pName = p.nama_produk || 'Produk';
                        let pCode = p.kode_produk || '-';
                        let rawM = (window.markupConfig && window.markupConfig[pCode] !== undefined) ? window.markupConfig[pCode] : markup;
                        let configMarkup = window.getMarkupValue(rawM, parseInt(p.harga_final));
                        let currentMarkup = (pCode === 'CFMX' || pName.toLowerCase().includes('cek')) ? 0 : configMarkup;
                        let finalPrice = parseInt(p.harga_final) + currentMarkup;
                        let desc = p.deskripsi || '';
        
                        // Cek Status dari JSON (1 = Masalah)
                        const isPO = (arguments.length > 2 ? arguments[2] : false) || document.getElementById('judulMenu').innerText === 'PO Akrab';
                        const isGangguan = (p.gangguan == 1);
                        const isKosong = (p.kosong == 1);
                        const isNotAvailable = !isPO && (isGangguan || isKosong);
        
                        let statusText = "";
                        let clickEvent = '';
                        const sourceName = 'AKRAB';
                        if (p.provider_kaje) {
        clickEvent = isPO ? `onclick="window.siapkanInvoicePO('${pCode}', '${pName}', ${finalPrice}, 'KAJE')"` : `onclick="window.siapkanInvoiceKaje('${pCode}', '${pName}', ${finalPrice})"`;
                        } else {
        clickEvent = isPO ? `onclick="window.siapkanInvoicePO('${pCode}', '${pName}', ${finalPrice}, 'KHFY')"` : `onclick="window.siapkanInvoiceKhfy('${pCode}', '${pName}', ${finalPrice})"`;
                        }
        
                        if (isNotAvailable) {
        clickEvent = `onclick="alert('Maaf, stok produk sedang kosong.')"`;
        statusText = 'KOSONG';
                        } else if (isPO) {
        statusText = 'PRE-ORDER';
                        }
        
                        const stockValue = isNotAvailable ? 0 : ((p.stok !== undefined) ? p.stok : ((typeof stockMap !== 'undefined' && stockMap[pCode] !== undefined) ? stockMap[pCode] : null));
                        html += window.renderAkrabProductCard({
                            name: pName,
                            price: finalPrice,
                            stock: stockValue,
                            desc: desc,
                            status: statusText,
                            source: sourceName,
                            disabled: isNotAvailable,
                            clickEvent: clickEvent
                        });
                    });
                    const judulMenuText = document.getElementById('judulMenu') ? document.getElementById('judulMenu').innerText : '';
                    if (window.inlineAkrabMode) {
                        const areaListInline = document.getElementById('inlineAkrabList');
                        if(areaListInline) areaListInline.innerHTML = html || "<div style='padding:20px; text-align:center;'>Produk kosong</div>";
                    } else if (judulMenuText === 'Paket Akrab All' || judulMenuText === 'PO Akrab') {
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
        
                window.siapkanInvoiceKaje = function(kode, nama, harga) {
                    window.currentInvoiceData = { kode, nama, baseHarga: harga, isKaje: true };
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
            <label style="font-size: 10px; font-weight: 700; color: var(--primary); display: block; margin-bottom: 8px; text-transform: uppercase;">Nomor Tujuan / Target</label>
            <div class="input-group" style="margin-bottom: 0;">
                <input type="tel" inputmode="numeric" id="inputKajeTujuan" class="form-input" placeholder="Masukkan Nomor Target" style="background: white; border: 2px solid #e1effe; color:#333; font-weight:bold; padding-right: 70px;">
                <i class="fas fa-edit" style="top: 15px;"></i>
                <button type="button" onclick="window.pasteDariClipboard('inputKajeTujuan')" style="position:absolute; right:10px; top:12px; background:var(--primary); color:white; border:none; border-radius:8px; padding:5px 10px; font-size:10px; font-weight:bold; cursor:pointer; z-index:10;">PASTE</button>
            </div>
        </div>
        <div class="invoice-row invoice-total" style="padding-top: 15px; margin-top: 5px;">
            <span>TOTAL BAYAR</span>
            <b style="color: var(--primary); font-size: 18px;">Rp ${new Intl.NumberFormat('id-ID').format(harga)}</b>
        </div>
                        </div>
                        <div id="kajeCustomFooter" style="display:flex; gap:10px; margin-top:15px;">
        <button class="btn-konfirmasi" style="flex:1;" onclick="window.prosesBayarKaje()">BAYAR SEKARANG</button>
        <button class="btn-batal" style="flex:1; background:#fff5f5; color:var(--danger); border:1px solid #ffcccc;" onclick="document.getElementById('modalInvoice').style.display='none'">BATAL</button>
                        </div>`;
                    document.getElementById('invoiceContent').innerHTML = html;
                    document.getElementById('statusCekNama').style.display = 'none';
                    document.getElementById('modalInvoice').style.display = 'flex';
                    setTimeout(() => { const inp = document.getElementById('inputKajeTujuan'); if(inp) inp.focus(); }, 300);
                };
        
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
            code: data.kode
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
            produk: data.nama, kode_produk: data.kode, harga: data.baseHarga,
            status: 'PENDING', sn: msg, trx_id: trxId, provider: 'KAJE',
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
                <input type="text" inputmode="text" id="inputKhfyTujuan" class="form-input" placeholder="Tempel Nomor/Link di sini" style="background: white; border: 2px solid #e1effe; color:#333; font-weight:bold; padding-right: 70px;">
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
                    
                    const data = window.currentInvoiceData;
                    // MODIFIKASI: Ambil tujuan dari input dalam invoice
                    const elTujuan = document.getElementById('inputKhfyTujuan');
                    const hp = elTujuan ? String(elTujuan.value || '').trim() : '';
                    
                    if(!hp) return alert("Mohon isi Nomor Tujuan / Link Zona!");
        
                    document.getElementById('modalInvoice').style.display = 'none';
                    window.showNotice('loading', 'Memproses', 'Sedang memproses transaksi...');
        
                    try {
                        // 1. Cek Saldo & Kurangi Dulu
                        const userRef = window.doc(window.db, "users", user.uid);
                        const userSnap = await window.getDoc(userRef);
                        const curSaldo = userSnap.data().saldo || 0;
        
                        if(curSaldo < data.baseHarga) {
        return window.showNotice('error', 'Gagal', 'Saldo tidak mencukupi!');
                        }
        
                        if (!(await window.cekSinkronisasiDoniGuard(user.uid, curSaldo))) return;
        // Potong Saldo Sementara
                        await window.updateDoc(userRef, { saldo: curSaldo - data.baseHarga });
        
                        // --- GENERATE TRX ID AMAN (JANGAN PAKAI TUJUAN/LINK) ---
                        const clientRefId = "KF" + Date.now().toString() + Math.floor(1000 + Math.random() * 9000).toString();
        
                        // 2. Tembak API Khfy via Proxy v2 dengan parameter aman
                        const params = new URLSearchParams({
                            action: 'trx',
                            produk: String(data.kode || ''),
                            tujuan: hp,
                            reff_id: clientRefId
                        });
                        const req = await fetch(`khfy_proxyv2.php?${params.toString()}`);
                        const res = await window.safeParseKhfyResponse(req);
        
                        // 3. LOGIKA DETEKSI KHFY AMAN
                        // Penting: jangan pakai JSON.stringify(...).includes('true') karena __nonJson:true bisa membuat respon GAGAL terbaca sukses/pending.
                        const d = (res && res.data) ? res.data : (res || {});
                        let msg = d.message || d.msg || d.keterangan || (d.data ? (d.data.message || d.data.msg || d.data.keterangan || d.data.sn || d.data.note) : '') || res.message || res.msg || res.keterangan || res.__raw || res.raw || 'Transaksi diproses server';
                        if (String(msg).includes('401') || String(msg).includes('bukan JSON valid') || (window.isKhfyUnauthorizedResponse && window.isKhfyUnauthorizedResponse(res))) {
                            msg = 'Transaksi diproses server. Menunggu update status otomatis.';
                        }
                        const cleanMsg = window.bersihkanPesan ? window.bersihkanPesan(String(msg || '')) : String(msg || '');
                        const isFailed = window.isKhfyFailedResponse(res);
                        const isSuccess = window.isKhfySuccessResponse(res);
                        const isPending = window.isKhfyPendingResponse(res);
                        const isUncertain = window.isKhfyUncertainResponse(res);
                        
                        // GUNAKAN 8 DIGIT KITA SEBAGAI ID UTAMA UNTUK TRACKING
                        const trxId = clientRefId;
        
                        if(isFailed) {
                            await window.updateDoc(userRef, { saldo: curSaldo });
                            const docRef = await window.addDoc(window.collection(window.db, "users", user.uid, "riwayat_transaksi"), {
                                uid: user.uid,
                                username: userSnap.data().username,
                                tujuan: hp,
                                produk: data.nama,
                                kode_produk: data.kode,
                                harga: data.baseHarga,
                                status: 'GAGAL',
                                sn: cleanMsg || 'Transaksi gagal dari server KHFY',
                                trx_id: trxId,
                                provider: 'KHFY',
                                isRefunded: true,
                                refund_reason: 'KHFY_DIRECT_FAIL_RESPONSE',
                                raw_json: JSON.stringify(res || {}),
                                timestamp: window.serverTimestamp()
                            });
                            window.showNotice('error', 'Gagal', cleanMsg || 'Transaksi gagal dari server KHFY. Saldo dikembalikan.');
                            return;
                        }
        
                        if(isSuccess || isPending || isUncertain) {
                            if (isSuccess && !isPending) {
                                window.showNotice('success', 'Berhasil', cleanMsg || 'Transaksi Berhasil.');
                            } else {
                                window.showNotice('success', 'Diproses', cleanMsg || 'Transaksi disimpan sebagai PENDING dan akan dicek otomatis.');
                            }
        
                            // --- INTEGRASI DONIGUARD (CATAT TRANSAKSI KHFY) ---
                            if(window.triggerDoniGuard) {
                                window.triggerDoniGuard({
                                    action: 'transaksi',
                                    produk: data.nama,
                                    nominal: data.baseHarga,
                                    trx_id: trxId,
                                    saldo_akhir_client: curSaldo - data.baseHarga
                                });
                            }
                            // --------------------------------------------------
                            
                            // Simpan Riwayat
                            const docRef = await window.addDoc(window.collection(window.db, "users", user.uid, "riwayat_transaksi"), {
                                uid: user.uid,
                                username: userSnap.data().username,
                                tujuan: hp,
                                produk: data.nama,
                                kode_produk: data.kode,
                                harga: data.baseHarga,
                                status: (isSuccess && !isPending) ? 'BERHASIL' : 'PENDING',
                                sn: cleanMsg || ((isSuccess && !isPending) ? 'Transaksi Berhasil' : 'Transaksi diproses server KHFY'),
                                trx_id: trxId,
                                provider: 'KHFY',
                                raw_json: JSON.stringify(res || {}),
                                timestamp: window.serverTimestamp()
                            });
                            
                            if (isSuccess && !isPending) {
                                if (window.kirimNotifTelegram) {
                                    window.kirimNotifTelegram('transaksi', { produk: data.nama, tujuan: hp, harga: data.baseHarga, username: userSnap.data().username, trx_id: trxId });
                                }
                            }
                            // JALANKAN MONITORING MENGGUNAKAN ID 8 DIGIT (clientRefId)
                            if (!(isSuccess && !isPending)) {
                                window.monitorKhfyTrx(trxId, docRef.id);
                            }
                            return;
                        }
        
                        // GAGAL / RESPON TIDAK DIKENALI -> REFUND SALDO DAN RIWAYAT GAGAL
                        await window.updateDoc(userRef, { saldo: curSaldo });
                        await window.addDoc(window.collection(window.db, "users", user.uid, "riwayat_transaksi"), {
                            uid: user.uid,
                            username: userSnap.data().username,
                            tujuan: hp,
                            produk: data.nama,
                            kode_produk: data.kode,
                            harga: data.baseHarga,
                            status: 'GAGAL',
                            sn: cleanMsg || 'Respon KHFY tidak dikenali. Saldo dikembalikan.',
                            trx_id: trxId,
                            provider: 'KHFY',
                            isRefunded: true,
                            refund_reason: 'KHFY_UNKNOWN_DIRECT_REFUND',
                            raw_json: JSON.stringify(res || {}),
                            timestamp: window.serverTimestamp()
                        });
                        window.showNotice('error', 'Gagal', cleanMsg || 'Respon KHFY tidak dikenali. Saldo dikembalikan.');
                    } catch(e) {
                        console.error(e);
                        // Safety Refund
                        try {
         const userRef = window.doc(window.db, "users", user.uid);
         const userSnap = await window.getDoc(userRef);
         await window.updateDoc(userRef, { saldo: (userSnap.data().saldo || 0) + data.baseHarga });
                        } catch(ex){}
                        window.showNotice('error', 'Error', 'Terjadi kesalahan sistem: ' + e.message);
                    }
                };
        
                // --- FUNGSI MONITORING STATUS (BY REFID 8 DIGIT) ---
                        // --- FUNGSI MONITORING STATUS KHFY (PARSING SEMPURNA v3) ---
                        // --- FUNGSI MONITORING STATUS KHFY (ANTI-FLIP SUKSES->GAGAL) ---
                
                window.siapkanInvoicePO = function(kode, nama, harga, provider) {
                    window.currentInvoiceData = { kode, nama, baseHarga: harga, provider: provider, isPO: true };
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
            const data = window.currentInvoiceData || {};
            const hp = (document.getElementById('inputPOTujuan')?.value || '').trim();
            if(!hp) return alert("Mohon isi Nomor Tujuan!");
        
            document.getElementById('modalInvoice').style.display = 'none';
            window.showNotice('loading', 'Memproses', 'Memasukkan ke antrian Pre-Order...');
        
            try {
                const userRef = window.doc(window.db, "users", user.uid);
                const userSnap = await window.getDoc(userRef);
                const userData = userSnap.exists() ? userSnap.data() : {};
                const curSaldo = Number(userData.saldo || 0);
                const username = userData.username || user.displayName || user.email || "User";
                const hargaPO = Number(data.baseHarga || data.harga || data.price || 0);
                const apiType = window.normalizePOApiType ? window.normalizePOApiType(data) : String(data.provider || 'KHFY').toUpperCase();
        
                if(curSaldo < hargaPO) return window.showNotice('error', 'Gagal', 'Saldo tidak cukup!');
                
                if (!(await window.cekSinkronisasiDoniGuard(user.uid, curSaldo))) return;
        
                // 1. Potong Saldo
                const newSaldo = curSaldo - hargaPO;
                await window.updateDoc(userRef, { saldo: newSaldo });
        
                // Reffid sementara. Nanti saat RUN admin, reffid boleh diganti oleh paneladmin.
                const trxId = 'PO-' + Date.now() + '-' + Math.floor(Math.random() * 1000);
                const msg = "Masuk Antrian Pre-Order Admin";
                const rawInitResponse = {
                    source: 'index',
                    status: 'PENDING',
                    message: msg,
                    note: 'Belum dikirim ke server provider. Menunggu RUN dari paneladmin.',
                    api_type: apiType,
                    reffid_sementara: trxId,
                    created_at: new Date().toISOString()
                };
        
                if(window.triggerDoniGuard) {
                    window.triggerDoniGuard({
                        action: 'transaksi',
                        produk: '(PO) ' + (data.nama || data.produk || data.kode || '-'),
                        nominal: hargaPO,
                        trx_id: trxId,
                        saldo_akhir_client: newSaldo
                    });
                }
        
                // 2. Simpan Riwayat User Firestore dengan data lengkap untuk antrian PO + auto-run
                const riwayatPayload = {
                    uid: user.uid,
                    username: username,
                    tujuan: hp,
                    nomor_tujuan: hp,
                    produk: data.nama || data.produk || data.product_name || data.kode || '-',
                    kode_produk: data.kode || data.kode_produk || data.code || '',
                    harga: hargaPO,
                    status: 'PENDING',
                    status_po: 'PENDING',
                    sn: msg,
                    message: msg,
                    trx_id: trxId,
                    reffid: trxId,
                    reffid_sementara: trxId,
                    reffid_aktif: trxId,
                    provider: apiType,
                    jenis_api: apiType,
                    api_type: apiType,
                    is_po: true,
                    po_active: true,
                    po_run_locked: false,
                    po_auto_checking: false,
                    po_need_new_refid: false,
                    raw_json: window.safeJsonStringifyPO ? window.safeJsonStringifyPO(rawInitResponse) : JSON.stringify(rawInitResponse),
                    raw_response: rawInitResponse,
                    raw_provider_response: rawInitResponse,
                    latest_raw_response: rawInitResponse,
                    latest_raw_response_text: window.safeJsonStringifyPO ? window.safeJsonStringifyPO(rawInitResponse) : JSON.stringify(rawInitResponse),
                    last_server_response: rawInitResponse,
                    last_response_at: new Date().toISOString(),
                    saldo_awal: curSaldo,
                    saldo_akhir: newSaldo,
                    timestamp_ms: Date.now(),
                    timestamp: window.serverTimestamp()
                };
        
                const poDocRef = await window.addDoc(window.collection(window.db, "users", user.uid, "riwayat_transaksi"), riwayatPayload);
                const poDocId = poDocRef.id;
        
                await window.updateDoc(poDocRef, {
                    idDoc: poDocId,
                    user_history_doc_id: poDocId,
                    firestore_doc_id: poDocId
                });
        
                if(window.kirimNotifTelegram) {
                    window.kirimNotifTelegram('preorder', {
                        produk: riwayatPayload.produk,
                        tujuan: hp,
                        harga: hargaPO,
                        username: username,
                        trx_id: trxId,
                        provider: apiType
                    });
                }
        
                // 3. Sinkronisasi ke collection preorders agar paneladmin tetap bisa membaca data lengkap.
                let preorderDocId = '';
                try {
                    const poPayload = Object.assign({}, riwayatPayload, {
                        idDoc: poDocId,
                        user_history_doc_id: poDocId,
                        source_user_doc_id: poDocId,
                        timestamp: window.serverTimestamp()
                    });
                    const preorderRef = await window.addDoc(window.collection(window.db, "preorders"), poPayload);
                    preorderDocId = preorderRef.id;
                    await window.updateDoc(preorderRef, {
                        idDoc: poDocId,
                        preorder_doc_id: preorderDocId,
                        user_history_doc_id: poDocId,
                        source_user_doc_id: poDocId
                    });
                    console.log("Sinkronisasi Pre-Order ke Admin sukses.");
                } catch(err) {
                    console.error("Gagal simpan preorders:", err);
                }
        
                // 4. Sinkronisasi ke hosting JSON folder per transaksi:
                // data PO       -> /preorder/uid/id_transaksi/data.json
                // raw response  -> /preorder/uid/id_transaksi/respon.json
                try {
                    const jsonPayload = Object.assign({}, riwayatPayload, {
                        idDoc: poDocId,
                        doc_id: poDocId,
                        user_history_doc_id: poDocId,
                        firestore_doc_id: poDocId,
                        preorder_doc_id: preorderDocId,
                        timestamp: undefined,
                        timestamp_ms: Date.now(),
                        created_at: new Date().toISOString(),
                        updated_at: new Date().toISOString()
                    });
                    delete jsonPayload.timestamp;
                    await window.syncUpsertPOJson(jsonPayload, 'CREATE');
                } catch(syncErr) {
                    console.warn('Gagal sync preorder ke hosting data.json/respon.json:', syncErr);
                }
        
                window.showNotice('success', 'Berhasil', 'Pesanan berhasil masuk antrian PO!');
            } catch(e) {
                console.error(e);
                window.showNotice('error', 'Error', 'Terjadi kesalahan sistem: ' + e.message);
            }
        };
        
        window.monitorKhfyTrx = async function(trxId, docId) {
                    console.log("Monitoring RefID:", trxId);
                    const user = window.auth.currentUser;
                    if(!user || !docId || !trxId) return;
                    const trxRefForGuard = window.doc(window.db, "users", user.uid, "riwayat_transaksi", docId);
                    try {
                        const beforeSnap = await window.getDoc(trxRefForGuard);
                        if(beforeSnap.exists() && window.isKhfyMonitorBlocked && window.isKhfyMonitorBlocked(beforeSnap.data())) {
                            console.log("KHFY monitor tidak dijalankan karena transaksi sudah final/hold.");
                            window['monitor_'+docId] = false;
                            return;
                        }
                    } catch(ignore) {}
        
                    let attempts = 0;
                    const interval = setInterval(async () => {
                        attempts++;
                        if(attempts > 30) {
                            clearInterval(interval);
                            window['monitor_'+docId] = false;
                            return;
                        }
        
                        try {
        const userNow = window.auth.currentUser;
        if(!userNow) { clearInterval(interval); window['monitor_'+docId] = false; return; }
        const trxRefGuardLoop = window.doc(window.db, "users", userNow.uid, "riwayat_transaksi", docId);
        const guardSnap = await window.getDoc(trxRefGuardLoop);
        if(!guardSnap.exists()) { clearInterval(interval); window['monitor_'+docId] = false; return; }
        if(window.isKhfyMonitorBlocked && window.isKhfyMonitorBlocked(guardSnap.data())) {
            clearInterval(interval);
            window['monitor_'+docId] = false;
            console.log("KHFY monitor dihentikan karena status sudah final/hold.");
            return;
        }
        
        const req = await fetch(`khfy_proxyv2.php?action=status&refid=${encodeURIComponent(trxId)}`);
        const res = await window.safeParseKhfyResponse(req);
        
        if(res.message && String(res.message).includes("Action invalid")) {
            clearInterval(interval);
            window['monitor_'+docId] = false;
            return;
        }
        
        // Jika cek status KHFY ditolak seperti 401 Not authorized, jangan timpa status gagal sebelumnya dan jangan loop terus.
        if(window.isKhfyUnauthorizedResponse && window.isKhfyUnauthorizedResponse(res)) {
            clearInterval(interval);
            window['monitor_'+docId] = false;
            const userAuth = window.auth.currentUser;
            if(userAuth) {
                const trxRefAuth = window.doc(window.db, "users", userAuth.uid, "riwayat_transaksi", docId);
                const authSnap = await window.getDoc(trxRefAuth);
                if(authSnap.exists()) {
                    const oldData = authSnap.data() || {};
                    if(!(window.isKhfyMonitorBlocked && window.isKhfyMonitorBlocked(oldData))) {
                        await window.updateDoc(trxRefAuth, {
                            status: 'PENDING',
                            sn: 'Transaksi diproses server. Menunggu update status otomatis.',
                            raw_json: JSON.stringify(res)
                        });
                    }
                }
            }
            return;
        }
        
        // Parsing Status
        let targetItem = null;
        if (res.data && Array.isArray(res.data)) targetItem = res.data[0];
        else if (res.data && res.data.data && Array.isArray(res.data.data)) targetItem = res.data.data[0];
        else if (res.data) targetItem = res.data;
        else if (res.status || res.sn || res.message || res.__raw || res.raw) targetItem = res;
        
        // FIX DONI KHFY: respon plain text/non-JSON seperti RC=... Gagal, stock transaksi habis wajib final GAGAL.
        // Jangan dianggap belum pasti hanya karena ada __nonJson:true.
        if (window.isKhfyFailedResponse(res)) {
            targetItem = targetItem || res;
            targetItem.status = 'GAGAL';
            targetItem.message = targetItem.message || targetItem.__raw || targetItem.raw || window.getKhfyResponseText(res) || 'Transaksi gagal dari server KHFY';
        } else if (window.isKhfySuccessResponse(res)) {
            targetItem = targetItem || res;
            targetItem.status = targetItem.status || 'BERHASIL';
        } else if (window.isKhfyPendingResponse(res)) {
            targetItem = targetItem || res;
            targetItem.status = targetItem.status || 'PENDING';
        } else if (window.isKhfyUncertainResponse(res)) {
            console.log("Status KHFY belum pasti:", res);
            return;
        }
        
        if(targetItem) {
            let statusAkhir = 'PENDING';
            // Cek Status (Support status_text & status2)
            const st = (targetItem.status || targetItem.status_text || targetItem.message || targetItem.keterangan || targetItem.note || targetItem.__raw || targetItem.raw || '').toUpperCase();
            const stCode = parseInt(targetItem.status2 || targetItem.status_code || 0);
            const allKhfyStatusText = window.getKhfyResponseText(targetItem) + ' | ' + window.getKhfyResponseText(res);
            
            // Logika Penentuan Status: GAGAL wajib didahulukan dari sukses agar RC/TrxID + kata Gagal tidak salah jadi berhasil.
            if(window.isKhfyFailedResponse(targetItem) || window.isKhfyFailedResponse(res) || st.includes('GAGAL') || st.includes('BATAL') || st.includes('REFUND') || st.includes('FAILED') || stCode === 72) statusAkhir = 'GAGAL';
            else if(window.isKhfySuccessResponse(targetItem) || window.isKhfySuccessResponse(res) || st.includes('SUKSES') || st.includes('BERHASIL') || st.includes('SUCCESS') || stCode === 20) statusAkhir = 'BERHASIL';
            
            // Ambil SN/Ket
            let sn = targetItem.sn || targetItem.keterangan || targetItem.note || targetItem.message || targetItem.__raw || targetItem.raw || allKhfyStatusText || '-';
            if (String(sn).includes('401') || String(sn).includes('bukan JSON valid') || String(sn).includes('not authorized')) {
                sn = 'Transaksi diproses server. Menunggu update status otomatis.';
            }
        
            if(statusAkhir !== 'PENDING') {
                clearInterval(interval);
                const user = window.auth.currentUser;
                if(user) {
                    const trxRef = window.doc(window.db, "users", user.uid, "riwayat_transaksi", docId);
                    
                    // --- FITUR PENGAMAN (LOCK STATUS) ---
                    // Cek dulu status di database sekarang. 
                    // Jika SUDAH BERHASIL, JANGAN UBAH JADI GAGAL (abaikan glitch server)
                    const curSnap = await window.getDoc(trxRef);
                    if(curSnap.exists()) {
                        const curData = curSnap.data() || {};
                        const curSt = (curData.status || '').toUpperCase();
                        if(curSt === 'BERHASIL' || curSt === 'SUKSES' || curSt === 'GAGAL' || curSt === 'BATAL' || curSt === 'REFUND' || curData.isRefunded === true || (window.isKhfyMonitorBlocked && window.isKhfyMonitorBlocked(curData))) {
                            console.log("🛡️ Status KHFY dikunci. Mengabaikan update auto-check selanjutnya.");
                            clearInterval(interval);
                            window['monitor_'+docId] = false;
                            return;
                        }
                    }
                    // ------------------------------------
        
                    await window.updateDoc(trxRef, {
                        status: statusAkhir,
                        sn: sn,
                        raw_json: JSON.stringify(res)
                    });
                    window['monitor_'+docId] = false;
                    
                    if(statusAkhir === 'GAGAL') {
                        const trxSnap = await window.getDoc(trxRef);
                        if (trxSnap.exists()) {
                            const refundResult = await window.runTransaction(window.db, async (transaction) => {
                                const freshTrxSnap = await transaction.get(trxRef);
                                if (!freshTrxSnap.exists()) return { refunded: false, reason: 'trx_not_found' };
        
                                const freshData = freshTrxSnap.data();
                                const amount = parseInt(freshData.harga || 0);
                                if (freshData.isRefunded || amount <= 0) {
                                    return { refunded: false, reason: 'already_refunded_or_invalid_amount' };
                                }
        
                                const userRef = window.doc(window.db, "users", user.uid);
                                const uSnap = await transaction.get(userRef);
                                if (!uSnap.exists()) return { refunded: false, reason: 'user_not_found' };
        
                                const newSaldo = (uSnap.data().saldo || 0) + amount;
                                const refundGuardId = ((freshData.trx_id || trxId) + '-REF');
        
                                transaction.update(userRef, { saldo: newSaldo });
                                transaction.update(trxRef, {
                                    isRefunded: true,
                                    refund_guard_id: refundGuardId,
                                    refund_at: window.serverTimestamp(),
                                    refund_reason: 'KHFY_AUTO_CHECK_FINAL_FAILED',
                                    sn: sn + ' (REFUND OTOMATIS)'
                                });
        
                                return {
                                    refunded: true,
                                    nominal: amount,
                                    saldo_akhir: newSaldo,
                                    refund_guard_id: refundGuardId,
                                    produk: freshData.produk || 'Paket Akrab'
                                };
                            });
                            
                            // Lapor Doniguard hanya jika refund benar-benar berhasil masuk satu kali
                            if(refundResult.refunded && window.triggerDoniGuard) {
                                window.triggerDoniGuard({
                                    action: 'topup',
                                    produk: 'REFUND: ' + refundResult.produk,
                                    nominal: refundResult.nominal,
                                    trx_id: refundResult.refund_guard_id,
                                    saldo_akhir_client: refundResult.saldo_akhir
                                });
                            }
                            
                            if(refundResult.refunded) {
                                window.showNotice('error', 'Transaksi Gagal', 'Saldo dikembalikan. Info: ' + sn);
                            } else {
                                window.showNotice('error', 'Transaksi Gagal', 'Refund sudah pernah diproses. Info: ' + sn);
                            }
                        }
                    } else {
                        window.showNotice("success", "Transaksi Sukses", sn);
                        if (window.kirimNotifTelegram && typeof curSnap !== 'undefined' && curSnap.exists()) {
                            const dData = curSnap.data() || {};
                            window.kirimNotifTelegram('transaksi', { produk: dData.produk || '-', tujuan: dData.tujuan || '-', harga: dData.harga || 0, username: dData.username || 'Pengguna', trx_id: dData.trx_id || trxId });
                        }
                    }
                }
            }
        }
                        } catch(e) { console.log("Monitoring Skip:", e); }
                    }, 4000);
                };
                
                // --- INTEGRASI MRF MEDIA (PAKET AKRAB) ---
                window.mrfData = [];
        
                window.getMrfCategory = function(item) {
                    const kode = String(item.kode_produk || item.kode || '').toUpperCase();
                    const operator = String(item.operator || item.kode_provider || item.mrf_group || '').toUpperCase();
                    if (kode.startsWith('XDA') || operator === 'XDA' || operator.includes('XDA')) return 'XDA(Stable)';
                    if (kode.startsWith('XAP') || operator === 'XAP' || operator.includes('XAP')) return 'MRF XAP Promo';
                    if (kode.startsWith('AM') || operator === 'AM' || operator.includes('AM')) return 'MRF AM';
                    if (kode.startsWith('XCLP') || operator.startsWith('XCLP') || operator.includes('XCLP')) return 'MRF Circle / XCLP';
                    return 'MRF Lainnya';
                };
        
        
                window.getMrfMarkupRaw = function(product, brand) {
                    const config = window.markupConfig || {};
                    const kode = String((product && (product.kode_produk || product.kode)) || '').trim();
                    const nama = String((product && (product.nama_produk || product.nama || product.product_name)) || '').trim();
                    const kategori = brand || (typeof window.getMrfCategory === 'function' ? window.getMrfCategory(product || {}) : '');
        
                    if (kode && config[kode] !== undefined) return config[kode];
                    if (nama && config[nama] !== undefined) return config[nama];
                    if (kategori && config[kategori] !== undefined) return config[kategori];
                    if (config['MRF'] !== undefined) return config['MRF'];
                    if (config['Paket Akrab'] !== undefined) return config['Paket Akrab'];
                    if (config['Paket Akrab v2'] !== undefined) return config['Paket Akrab v2'];
                    if (config['General'] !== undefined) return config['General'];
                    return 0;
                };
        
                window.filterMrf = function(brand, el, isPO = false) {
                    document.querySelectorAll('.filter-card, .akrab-btn').forEach(e => e.classList.remove('active'));
                    if(el) el.classList.add('active');
        
                    const products = (Array.isArray(window.mrfData) ? window.mrfData : [])
                        .filter(i => window.getMrfCategory(i) === brand)
                        .sort((a,b) => parseInt(a.harga_final || a.harga || 0) - parseInt(b.harga_final || b.harga || 0));
        
                    let html = '';
        
                    products.forEach(p => {
                        let pName = p.nama_produk || p.nama || 'Produk';
                        let pCode = p.kode_produk || p.kode || '-';
                        let basePrice = parseInt(p.harga_final || p.harga || 0);
                        let rawM = window.getMrfMarkupRaw ? window.getMrfMarkupRaw(p, brand) : 0;
                        let configMarkup = window.getMarkupValue ? window.getMarkupValue(rawM, basePrice) : parseInt(rawM || 0);
                        let currentMarkup = String(pName).toLowerCase().includes('cek') ? 0 : configMarkup;
                        let finalPrice = basePrice + currentMarkup;
                        let desc = (p.deskripsi || p.description || ('Kode: ' + pCode)).replace(/Provider\s*:\s*MRF\s*Media/ig, '').replace(/Operator\s*:\s*MRF/ig, '').trim();
                        const isGangguan = (p.gangguan == 1 || p.gangguan === true);
                        const isKosong = (p.kosong == 1 || p.kosong === true || p.aktif === false);
                        const isNotAvailable = !isPO && (isGangguan || isKosong);
                        let statusText = isPO ? 'PRE-ORDER' : (isGangguan ? 'GANGGUAN' : (isKosong ? 'KOSONG' : ''));
                        const safeCode = String(pCode).replace(/\\/g, '\\\\').replace(/'/g, "\\'");
                        const safeName = String(pName).replace(/\\/g, '\\\\').replace(/'/g, "\\'");
                        let clickEvent = isNotAvailable ? `onclick="alert('Maaf, produk sedang tidak tersedia.')"` : (isPO ? `onclick="window.siapkanInvoiceMrf('${safeCode}', '${safeName}', ${finalPrice}, true)"` : `onclick="window.siapkanInvoiceMrf('${safeCode}', '${safeName}', ${finalPrice}, false)"`);
                        let stokValue = (p.stok !== undefined && p.stok !== null && String(p.stok) !== '0') ? p.stok : null;
        
                        html += window.renderAkrabProductCard({
                            name: pName,
                            price: finalPrice,
                            stock: stokValue,
                            desc: desc,
                            status: statusText,
                            source: 'AKRAB',
                            disabled: isNotAvailable,
                            clickEvent: clickEvent
                        });
                    });
        
                    const judulMenuText = document.getElementById('judulMenu') ? document.getElementById('judulMenu').innerText : '';
                    if (window.inlineAkrabMode) {
                        const areaListInline = document.getElementById('inlineAkrabList');
                        if(areaListInline) areaListInline.innerHTML = html || "<div style='padding:20px; text-align:center;'>Produk kosong</div>";
                    } else if (judulMenuText === 'Paket Akrab All' || judulMenuText === 'PO Akrab') {
                        const modalProduk = document.getElementById('modalProdukList');
                        const areaListModal = document.getElementById('listProdukModalArea');
                        const judulKategori = document.getElementById('judulKategoriModal');
                        if(judulKategori) judulKategori.innerText = String(brand || 'Paket Akrab').replace(/^MRF\s*/i, '');
                        if(areaListModal) areaListModal.innerHTML = html || "<div style='padding:20px; text-align:center;'>Produk kosong</div>";
                        if(modalProduk) modalProduk.style.display = 'flex';
                    } else {
                        const areaList = document.getElementById('listProdukArea');
                        if(areaList) areaList.innerHTML = html || "<div style='padding:20px; text-align:center;'>Produk kosong</div>";
                    }
                };
        
                window.siapkanInvoiceMrf = function(kode, nama, harga, isPreorder = false) {
                    window.currentInvoiceData = {
                        kode,
                        nama,
                        baseHarga: harga,
                        isMrf: true,
                        provider: 'MRF',
                        is_po: !!isPreorder,
                        preorder_mode: isPreorder ? 'po_queue_mrf' : 'mrf_direct',
                        local_preorder_queue: !!isPreorder,
                        po_active: !!isPreorder
                    };
                    const titleMode = isPreorder ? 'Pre-Order MRF' : 'Konfirmasi Pesanan';
                    const noteMode = isPreorder ? 'Pesanan akan masuk ke antrian Pre-Order dan diproses otomatis sesuai urutan sistem.' : 'Pastikan nomor tujuan benar sebelum transaksi diproses.';
                    const buttonMode = isPreorder ? 'MASUKKAN ANTRIAN PO' : 'BAYAR SEKARANG';
                    const html = `
                        <style>#modalInvoice #invoiceFooter { display: none !important; }</style>
                        <div style="background: #f8fafc; border-radius: 15px; padding: 20px; border: 1px solid #edf2f7; margin-bottom: 20px;">
                            <div style="text-align: center; margin-bottom: 15px;">
                                <div style="font-size: 11px; color: #95a5a6; text-transform: uppercase; letter-spacing: 1px;">${titleMode}</div>
                                <div style="font-size: 15px; font-weight: 800; color: #2c3e50; margin-top: 5px;">${nama}</div>
                            </div>
                            <div class="invoice-row" style="border-bottom: 1px dashed #eee; padding-bottom: 10px; margin-bottom: 15px;">
                                <span>Kode Produk</span><b style="color: #666;">${kode}</b>
                            </div>
                            <div style="margin-bottom: 15px;">
                                <label style="font-size: 10px; font-weight: 700; color: var(--primary); display: block; margin-bottom: 8px; text-transform: uppercase;">Nomor Tujuan</label>
                                <div class="input-group" style="margin-bottom: 0;">
                                    <input type="tel" inputmode="numeric" id="inputMrfTujuan" class="form-input" placeholder="Masukkan Nomor Tujuan" style="background: white; border: 2px solid #e1effe; color:#333; font-weight:bold; padding-right: 70px;">
                                    <i class="fas fa-edit" style="top: 15px;"></i>
                                    <button type="button" onclick="window.pasteDariClipboard('inputMrfTujuan')" style="position:absolute; right:10px; top:12px; background:var(--primary); color:white; border:none; border-radius:8px; padding:5px 10px; font-size:10px; font-weight:bold; cursor:pointer; z-index:10;">PASTE</button>
                                </div>
                                <div style="font-size:9px; color:#999; margin-top:5px;">${noteMode}</div>
                            </div>
                            <div class="invoice-row invoice-total" style="padding-top: 15px; margin-top: 5px;">
                                <span>TOTAL BAYAR</span>
                                <b style="color: var(--primary); font-size: 18px;">Rp ${new Intl.NumberFormat('id-ID').format(harga)}</b>
                            </div>
                        </div>
                        <div id="mrfCustomFooter" style="display:flex; gap:10px; margin-top:15px;">
                            <button class="btn-konfirmasi" style="flex:1;" onclick="window.prosesBayarMrf()">${buttonMode}</button>
                            <button class="btn-batal" style="flex:1; background:#fff5f5; color:var(--danger); border:1px solid #ffcccc;" onclick="document.getElementById('modalInvoice').style.display='none'">BATAL</button>
                        </div>`;
                    document.getElementById('invoiceContent').innerHTML = html;
                    document.getElementById('statusCekNama').style.display = 'none';
                    document.getElementById('modalInvoice').style.display = 'flex';
                };
        
                window.prosesBayarMrf = async function() {
                    const user = window.auth.currentUser;
                    if(!user) return;
                    const data = window.currentInvoiceData;
                    const hpEl = document.getElementById('inputMrfTujuan');
                    const hp = hpEl ? String(hpEl.value || '').trim() : '';
                    if(!hp) return alert('Mohon isi Nomor Tujuan!');
        
                    document.getElementById('modalInvoice').style.display = 'none';
                    window.showNotice('loading', 'Memproses', data && data.is_po ? 'Sedang memasukkan Pre-Order MRF ke antrian...' : 'Sedang memproses transaksi...');
        
                    try {
                        const userRef = window.doc(window.db, 'users', user.uid);
                        const userSnap = await window.getDoc(userRef);
                        const curSaldo = userSnap.data().saldo || 0;
                        const username = userSnap.data().username || 'User';
                        if(curSaldo < data.baseHarga) return window.showNotice('error', 'Gagal', 'Saldo tidak mencukupi!');
                        if (!(await window.cekSinkronisasiDoniGuard(user.uid, curSaldo))) return;
        
                        const newSaldo = curSaldo - data.baseHarga;
                        await window.updateDoc(userRef, { saldo: newSaldo });
        
                        const clientRefId = 'FS0049' + new Date().toISOString().replace(/[^0-9]/g, '').slice(2, 14) + Math.floor(1000 + Math.random() * 9000).toString();
        
                        if(data.is_po === true) {
                            const msg = 'Pre-Order berhasil diterima. Pesanan Anda telah masuk antrian sistem dan akan diproses sesuai urutan.';
                            if(window.triggerDoniGuard) {
                                window.triggerDoniGuard({
                                    action: 'transaksi',
                                    produk: '(PO MRF) ' + data.nama,
                                    nominal: data.baseHarga,
                                    trx_id: clientRefId,
                                    saldo_akhir_client: newSaldo
                                });
                            }
        
                            const riwayatPayload = {
                                uid: user.uid,
                                username: username,
                                tujuan: hp,
                                nomor_tujuan: hp,
                                produk: data.nama,
                                kode_produk: data.kode,
                                harga: data.baseHarga,
                                status: 'PENDING',
                                status_po: 'PENDING',
                                sn: msg,
                                message: msg,
                                trx_id: clientRefId,
                                refid: clientRefId,
                                reffid: clientRefId,
                                reffid_sementara: clientRefId,
                                reffid_aktif: clientRefId,
                                provider: 'MRF',
                                jenis_api: 'MRF',
                                api_type: 'MRF',
                                is_mrf: true,
                                is_po: true,
                                po_active: true,
                                po_run_locked: false,
                                po_auto_checking: false,
                                po_need_new_refid: false,
                                preorder_mode: 'po_queue_mrf',
                                local_preorder_queue: true,
                                status_mrf_auto_check: true,
                                markup_source: 'MRF',
                                saldo_awal: curSaldo,
                                saldo_akhir: newSaldo,
                                raw_json: window.safeJsonStringifyPO ? window.safeJsonStringifyPO({ status:true, local_queue:true, refid:clientRefId, provider:'MRF' }) : JSON.stringify({ status:true, local_queue:true, refid:clientRefId, provider:'MRF' }),
                                raw_response: { status:true, local_queue:true, refid:clientRefId, provider:'MRF' },
                                raw_provider_response: { status:true, local_queue:true, refid:clientRefId, provider:'MRF' },
                                latest_raw_response: { status:true, local_queue:true, refid:clientRefId, provider:'MRF' },
                                latest_raw_response_text: window.safeJsonStringifyPO ? window.safeJsonStringifyPO({ status:true, local_queue:true, refid:clientRefId, provider:'MRF' }) : JSON.stringify({ status:true, local_queue:true, refid:clientRefId, provider:'MRF' }),
                                last_server_response: { status:true, local_queue:true, refid:clientRefId, provider:'MRF' },
                                last_response_at: new Date().toISOString(),
                                timestamp_ms: Date.now(),
                                timestamp: window.serverTimestamp()
                            };
        
                            const docRef = await window.addDoc(window.collection(window.db, 'users', user.uid, 'riwayat_transaksi'), riwayatPayload);
                            const poDocId = docRef.id;
                            await window.updateDoc(docRef, {
                                idDoc: poDocId,
                                user_history_doc_id: poDocId,
                                firestore_doc_id: poDocId
                            });
        
                            let preorderDocId = '';
                            try {
                                const poPayload = Object.assign({}, riwayatPayload, {
                                    idDoc: poDocId,
                                    user_history_doc_id: poDocId,
                                    source_user_doc_id: poDocId,
                                    timestamp: window.serverTimestamp()
                                });
                                const preorderRef = await window.addDoc(window.collection(window.db, 'preorders'), poPayload);
                                preorderDocId = preorderRef.id;
                                await window.updateDoc(preorderRef, {
                                    idDoc: poDocId,
                                    preorder_doc_id: preorderDocId,
                                    user_history_doc_id: poDocId,
                                    source_user_doc_id: poDocId
                                });
                            } catch(err) {
                                console.error('Gagal simpan preorder MRF:', err);
                            }
        
                            try {
                                const jsonPayload = Object.assign({}, riwayatPayload, {
                                    idDoc: poDocId,
                                    doc_id: poDocId,
                                    user_history_doc_id: poDocId,
                                    firestore_doc_id: poDocId,
                                    preorder_doc_id: preorderDocId,
                                    timestamp: undefined,
                                    timestamp_ms: Date.now(),
                                    created_at: new Date().toISOString(),
                                    updated_at: new Date().toISOString()
                                });
                                delete jsonPayload.timestamp;
                                if(window.syncUpsertPOJson) await window.syncUpsertPOJson(jsonPayload, 'CREATE');
                            } catch(syncErr) {
                                console.warn('Gagal sync preorder MRF ke hosting data.json/respon.json:', syncErr);
                            }
        
                            if(window.kirimNotifTelegram) {
                                window.kirimNotifTelegram('preorder', {
                                    produk: data.nama,
                                    tujuan: hp,
                                    harga: data.baseHarga,
                                    username: username,
                                    trx_id: clientRefId,
                                    provider: 'MRF'
                                });
                            }
        
                            window.showNotice('success', 'Pre-Order MRF', msg);
                            return;
                        }
        
                        const req = await fetch('mrf_proxy.php?action=trx', {
                            method: 'POST',
                            headers: { 'Content-Type': 'application/json' },
                            body: JSON.stringify({ refid: clientRefId, kode_produk: data.kode, tujuan: hp, qty: 1, harga_jual: data.baseHarga, preorder_mode: 'mrf_direct' })
                        });
                        const res = await req.json().catch(() => ({}));
                        const rawText = JSON.stringify(res || {}).toLowerCase();
                        const statusState = String(res.status_state || (res.data && res.data.status_state) || '').toUpperCase();
                        const statusLabel = String(res.status_label || (res.data && res.data.status_label) || '').toUpperCase();
                        const isSuccess = statusState === 'PENDING' || statusState === 'SUCCESS' || statusLabel === 'PENDING' || statusLabel === 'BERHASIL' || res.pending === true || res.final === false || ((res.status === true || res.success === true) && !rawText.includes('gagal') && !rawText.includes('failed')) || rawText.includes('queued') || rawText.includes('antrian') || rawText.includes('antrean') || rawText.includes('proses') || rawText.includes('pending');
                        const msg = res.msg || res.message || (res.data && res.data.message) || 'Transaksi masuk antrian.';
                        const trxId = (res.data && res.data.refid) ? res.data.refid : (res.refid || clientRefId);
        
                        if(isSuccess) {
                            window.showNotice('success', 'Berhasil', msg);
                            if(window.triggerDoniGuard) {
                                window.triggerDoniGuard({
                                    action: 'transaksi',
                                    produk: data.nama,
                                    nominal: data.baseHarga,
                                    trx_id: trxId,
                                    saldo_akhir_client: newSaldo
                                });
                            }
        
                            const docRef = await window.addDoc(window.collection(window.db, 'users', user.uid, 'riwayat_transaksi'), {
                                uid: user.uid,
                                username: username,
                                tujuan: hp,
                                produk: data.nama,
                                kode_produk: data.kode,
                                harga: data.baseHarga,
                                status: (statusState === 'SUCCESS' || statusLabel === 'BERHASIL') ? 'BERHASIL' : 'PENDING',
                                sn: msg,
                                trx_id: trxId,
                                refid: trxId,
                                reffid: trxId,
                                provider: 'MRF',
                                is_mrf: true,
                                is_po: false,
                                po_active: false,
                                preorder_mode: 'mrf_direct',
                                local_preorder_queue: false,
                                status_mrf_auto_check: true,
                                markup_source: 'MRF',
                                timestamp: window.serverTimestamp()
                            });
        
                            window.showNotice('success', 'Berhasil', msg);
                            if (statusState === 'SUCCESS' || statusLabel === 'BERHASIL') {
                                if (window.kirimNotifTelegram) {
                                    window.kirimNotifTelegram('transaksi', { produk: data.nama, tujuan: hp, harga: data.baseHarga, username: username, trx_id: trxId });
                                }
                            }
                            if(statusState !== 'SUCCESS' && statusLabel !== 'BERHASIL') window.monitorMrfTrx(trxId, docRef.id);
                        } else {
                            await window.updateDoc(userRef, { saldo: curSaldo });
                            window.showNotice('error', 'Gagal', window.bersihkanPesan ? window.bersihkanPesan(msg || 'Gagal dari server') : (msg || 'Gagal dari server'));
                        }
                    } catch(e) {
                        console.error(e);
                        try {
                            const userRef = window.doc(window.db, 'users', user.uid);
                            const userSnap = await window.getDoc(userRef);
                            await window.updateDoc(userRef, { saldo: (userSnap.data().saldo || 0) + (parseInt(data.baseHarga || 0)) });
                        } catch(ex){}
                        window.showNotice('error', 'Error', 'Terjadi kesalahan sistem: ' + e.message);
                    }
                };
        
                window.monitorMrfTrx = async function(trxId, docId) {
                    const userAwal = window.auth.currentUser;
                    if(!userAwal || !trxId || !docId) return;
                    const trxRefAwal = window.doc(window.db, 'users', userAwal.uid, 'riwayat_transaksi', docId);
                    try {
                        const awalSnap = await window.getDoc(trxRefAwal);
                        if(!awalSnap.exists()) return;
                        const awalData = awalSnap.data() || {};
                        const awalStatus = String(awalData.status || '').toUpperCase();
                        if(awalStatus === 'BERHASIL' || awalStatus === 'SUKSES' || awalStatus === 'GAGAL' || awalStatus === 'BATAL' || awalStatus === 'REFUND' || awalData.isRefunded === true) {
                            window['monitor_mrf_'+docId] = false;
                            return;
                        }
                    } catch(ignore) {}
        
                    let attempts = 0;
                    const interval = setInterval(async () => {
                        attempts++;
                        if(attempts > 40) {
                            clearInterval(interval);
                            window['monitor_mrf_'+docId] = false;
                            return;
                        }
                        try {
                            const userNow = window.auth.currentUser;
                            if(!userNow) { clearInterval(interval); window['monitor_mrf_'+docId] = false; return; }
                            const trxRefGuard = window.doc(window.db, 'users', userNow.uid, 'riwayat_transaksi', docId);
                            const guardSnap = await window.getDoc(trxRefGuard);
                            if(!guardSnap.exists()) { clearInterval(interval); window['monitor_mrf_'+docId] = false; return; }
                            const guardData = guardSnap.data() || {};
                            const guardStatus = String(guardData.status || '').toUpperCase();
                            if(guardStatus === 'BERHASIL' || guardStatus === 'SUKSES' || guardStatus === 'GAGAL' || guardStatus === 'BATAL' || guardStatus === 'REFUND' || guardData.isRefunded === true) {
                                clearInterval(interval);
                                window['monitor_mrf_'+docId] = false;
                                return;
                            }
        
                            const req = await fetch(`mrf_proxy.php?action=status&refid=${encodeURIComponent(trxId)}`);
                            const res = await req.json().catch(() => ({}));
                            const data = res.data || res;
                            if(!data) return;
        
                            let statusAkhir = 'PENDING';
                            const st = String(data.status || data.message || res.msg || '').toUpperCase();
                            const code = parseInt(data.status_code || 0);
                            const suksesMap = [20];
                            const gagalMap = [3, 40, 45, 46, 47, 50, 52, 53, 54, 55, 56, 58, 59, 61, 69];
        
                            const stateFromProxy = String(res.status_state || data.status_state || '').toUpperCase();
                            const labelFromProxy = String(res.status_label || data.status_label || '').toUpperCase();
                            if(stateFromProxy === 'SUCCESS' || labelFromProxy === 'BERHASIL') statusAkhir = 'BERHASIL';
                            else if(stateFromProxy === 'FAILED' || labelFromProxy === 'GAGAL') statusAkhir = 'GAGAL';
                            else if(suksesMap.includes(code) || st.includes('SUCCESS') || st.includes('SUKSES') || st.includes('BERHASIL')) statusAkhir = 'BERHASIL';
                            else if(gagalMap.includes(code) || st.includes('FAILED') || st.includes('GAGAL') || st.includes('BATAL') || st.includes('REFUND')) statusAkhir = 'GAGAL';
                            else return;
        
                            clearInterval(interval);
                            window['monitor_mrf_'+docId] = false;
                            const user = window.auth.currentUser;
                            if(!user) return;
                            const trxRef = window.doc(window.db, 'users', user.uid, 'riwayat_transaksi', docId);
                            const curSnap = await window.getDoc(trxRef);
                            if(curSnap.exists()) {
                                const curData = curSnap.data() || {};
                                const curStatus = String(curData.status || '').toUpperCase();
                                if(curStatus === 'BERHASIL' || curStatus === 'SUKSES' || curStatus === 'GAGAL' || curStatus === 'BATAL' || curStatus === 'REFUND' || curData.isRefunded === true) {
                                    return;
                                }
                            }
                            const sn = data.sn || data.message || res.msg || '-';
                            await window.updateDoc(trxRef, { status: statusAkhir, sn: sn, raw_json: JSON.stringify(res), provider: 'MRF', is_mrf: true, preorder_mode: 'mrf_direct', local_preorder_queue: false, po_active: false });
        
                            if(statusAkhir === 'GAGAL') {
                                const refundResult = await window.runTransaction(window.db, async (transaction) => {
                                    const freshTrxSnap = await transaction.get(trxRef);
                                    if (!freshTrxSnap.exists()) return { refunded: false, reason: 'trx_not_found' };
                                    const freshData = freshTrxSnap.data();
                                    const amount = parseInt(freshData.harga || 0);
                                    if (freshData.isRefunded || amount <= 0) return { refunded: false, reason: 'already_refunded_or_invalid_amount' };
        
                                    const userRef = window.doc(window.db, 'users', user.uid);
                                    const uSnap = await transaction.get(userRef);
                                    if (!uSnap.exists()) return { refunded: false, reason: 'user_not_found' };
        
                                    const newSaldo = (uSnap.data().saldo || 0) + amount;
                                    const refundGuardId = ((freshData.trx_id || trxId) + '-REF');
                                    transaction.update(userRef, { saldo: newSaldo });
                                    transaction.update(trxRef, { isRefunded: true, refund_guard_id: refundGuardId, refund_at: window.serverTimestamp(), refund_reason: 'MRF_AUTO_CHECK_FINAL_FAILED', sn: sn + ' (REFUND OTOMATIS)' });
                                    return { refunded: true, nominal: amount, saldo_akhir: newSaldo, refund_guard_id: refundGuardId, produk: freshData.produk || 'Paket Akrab' };
                                });
        
                                if(refundResult.refunded && window.triggerDoniGuard) {
                                    window.triggerDoniGuard({ action: 'topup', produk: 'REFUND: ' + refundResult.produk, nominal: refundResult.nominal, trx_id: refundResult.refund_guard_id, saldo_akhir_client: refundResult.saldo_akhir });
                                }
                                window.showNotice('error', 'Transaksi Gagal', refundResult.refunded ? ('Saldo dikembalikan. Info: ' + sn) : ('Refund sudah pernah diproses. Info: ' + sn));
                            } else {
                                window.showNotice("success", "Transaksi Sukses", sn);
                                if (window.kirimNotifTelegram && typeof curSnap !== 'undefined' && curSnap.exists()) {
                                    const dData = curSnap.data() || {};
                                    window.kirimNotifTelegram('transaksi', { produk: dData.produk || '-', tujuan: dData.tujuan || '-', harga: dData.harga || 0, username: dData.username || 'Pengguna', trx_id: dData.trx_id || trxId });
                                }
                            }
                        } catch(e) { console.log('Monitoring Skip:', e); }
                    }, 5000);
                };
        
        
                window.loadGabunganData = async function() {
                    const isInlineAkrab = !!window.inlineAkrabMode;
                    const areaList = document.getElementById(isInlineAkrab ? 'inlineAkrabList' : 'listProdukArea');
                    const areaFilter = document.getElementById(isInlineAkrab ? 'inlineAkrabFilter' : 'areaFilter');
                    
                    // FIX: Inisialisasi awal agar tidak crash saat .push()
                    window.khfyData = [];
                    window.icsData = [];
                    window.mrfData = [];
                    
                    if(areaFilter) areaFilter.innerHTML = "";
                    if(areaList) areaList.innerHTML = "<div style='text-align:center; padding:40px;'><i class='fas fa-circle-notch fa-spin'></i> Memuat Semua Paket...</div>";
        
                    try {
                        // Ambil Data Paralel (KHFY, ICS, KAJE & MRF) dengan catch individual agar jika 1 mati, yang lain tetap jalan
                        const [reqKhfy, reqIcs, reqKaje, reqMrf] = await Promise.all([
        fetch('khfy_proxy.php?action=list').catch(() => null),
        fetch('ics_proxy.php?action=list').catch(() => null),
        fetch('kaje_proxy.php?api_action=get_products', {method: 'POST', body: '{}'}).catch(() => null),
        fetch('mrf_proxy.php?action=list').catch(() => null)
                        ]);
                        
                        if (reqKhfy) {
        const resKhfy = await reqKhfy.json().catch(() => ({}));
        if (resKhfy.data) window.khfyData = resKhfy.data;
                        }
        
                        if (reqKaje) {
        const resKaje = await reqKaje.json().catch(() => ({}));
        if(resKaje && resKaje.success && resKaje.data && resKaje.data.products) {
            resKaje.data.products.forEach(p => {
                if(p.code.startsWith('KDA')) {
                    window.khfyData.push({
                        kode_produk: p.code,
                        nama_produk: p.name,
                        harga_final: p.price,
                        gangguan: p.status === 'gangguan' ? 1 : 0,
                        kosong: p.status === 'kosong' ? 1 : 0,
                        deskripsi: (p.description || []).join('\n'),
                        provider_kaje: true,
                        stok: p.stock
                    });
                }
            });
        }
                        }
                        
                        if (reqIcs) {
        const resIcs = await reqIcs.json().catch(() => ({}));
        if(resIcs.success && resIcs.data) {
            resIcs.data.forEach(item => {
                if (item.code === 'CFMX') { item.type = 'fmax'; item.price = 0; }
                if (item.type && (item.type.toUpperCase() === 'XDA' || item.type.toUpperCase() === 'AKRAB FRESH (XDA)')) { item.type = 'XDA(Smart)'; }
            });
            window.icsData = resIcs.data;
        }
                        }
        
        
                        if (reqMrf) {
        const resMrf = await reqMrf.json().catch(() => ({}));
        if((resMrf.success || resMrf.status) && Array.isArray(resMrf.data)) {
            window.mrfData = resMrf.data;
        }
                        }
        
                        // FIX: Bersihkan pesan loading segera setelah data siap
                        if (areaList) areaList.innerHTML = "<div style='text-align:center; padding:40px; color:#94a3b8;'><i class='fas fa-hand-pointer'></i><br>Silakan pilih kategori paket di atas</div>";
                        window.renderGabunganFilters();
        
                    } catch(e) {
                        console.error("Bug Load Gabungan:", e);
                        if(areaList) areaList.innerHTML = "<div style='text-align:center; color:red; padding:20px;'>Gagal memproses data produk.</div>";
                    }
                };
                
        
                
                window.filterAkrabSearch = function() {
                    const searchEl = document.getElementById(window.inlineAkrabMode ? 'inlineAkrabSearch' : 'akrabSearch');
                    const q = (searchEl ? searchEl.value : '').toLowerCase();
                    const items = document.querySelectorAll((window.inlineAkrabMode ? '#inlineAkrabList' : '#listProdukArea') + ' > div');
                    items.forEach(item => {
                        const text = item.innerText.toLowerCase();
                        item.style.display = text.includes(q) ? 'block' : 'none';
                    });
                };
        
                window.filterInlineAkrabSearch = function() {
                    const oldMode = !!window.inlineAkrabMode;
                    window.inlineAkrabMode = true;
                    window.filterAkrabSearch();
                    window.inlineAkrabMode = oldMode || true;
                };
        
                window.toggleInlineAkrab = async function() {
                    const wrap = document.getElementById('menuAkrabAll');
                    const list = document.getElementById('inlineAkrabList');
                    const filter = document.getElementById('inlineAkrabFilter');
                    if(!wrap) return;
                    const willOpen = !wrap.classList.contains('open');
                    wrap.classList.toggle('open', willOpen);
                    window.inlineAkrabMode = willOpen;
                    if(willOpen && !window.inlineAkrabLoaded) {
                        if(filter) filter.innerHTML = '';
                        if(list) list.innerHTML = "<div class='inline-akrab-empty'><i class='fas fa-circle-notch fa-spin'></i><br>Memuat semua Paket Akrab...</div>";
                        window.inlineAkrabLoaded = true;
                        if(typeof window.loadGabunganData === 'function') await window.loadGabunganData();
                    }
                };
        
                window.renderGabunganFilters = function() {
                    const isInlineAkrab = !!window.inlineAkrabMode;
                    // FIX: Pastikan data adalah array agar tidak error .map()
                    const rawKhfy = Array.isArray(window.khfyData) ? window.khfyData : [];
                    const rawIcs = Array.isArray(window.icsData) ? window.icsData : [];
                    const rawMrf = Array.isArray(window.mrfData) ? window.mrfData : [];
        
                    const brands = [...new Set(rawKhfy.map(i => window.getKhfyCategory(i)))].filter(b => b !== 'Tes System' && b !== 'PLN Pascabayar' && b !== 'Bonus Akrab').sort();
                    const types = [...new Set(rawIcs.map(i => (i.type || 'Lainnya').toUpperCase()))].filter(t => !t.includes('FMAX') && !t.includes('FLEXMAX') && t !== 'PLN PASCABAYAR' && t !== 'XLA').sort();
                    const mrfBrands = [...new Set(rawMrf.map(i => window.getMrfCategory(i)))].filter(b => ['XDA(Stable)', 'MRF XAP Promo', 'MRF AM', 'MRF Circle / XCLP'].includes(b)).sort((a,b) => {
                        const urut = ['XDA(Stable)', 'MRF XAP Promo', 'MRF AM', 'MRF Circle / XCLP'];
                        return urut.indexOf(a) - urut.indexOf(b);
                    });
        
                    window.akrabDisplayMode = window.akrabDisplayMode || 'normal';
                    window.renderAkrabModeItems = function(mode, brands, types, mrfBrands) {
                        const isPO = mode === 'po';
                        const modeLabel = isPO ? 'Pre-Order' : 'Instan';
                        const cardClass = isPO ? 'po-card' : 'instant-card';
                        let innerHtml = '<div class="akrab-grid">';
        
                        brands.forEach(b => {
                            const brandName = String(b || 'Paket Akrab');
                            const safeBrand = brandName.replace(/\\/g, '\\\\').replace(/'/g, "\\'");
                            const cleanBrand = brandName.replace(/^Akrab\s+/i, '');
                            innerHtml += `<button type="button" class="akrab-btn filter-card ${cardClass}" onclick="window.filterKhfy('${safeBrand}', this, ${isPO})">
        <span class="akrab-chip-icon"><i class="fas ${isPO ? 'fa-clock' : 'fa-bolt'}"></i></span>
        <span class="akrab-chip-text"><b>${cleanBrand}</b><small>Akrab • ${modeLabel}</small></span>
        <span class="akrab-chip-go"><i class="fas fa-chevron-right"></i></span>
                            </button>`;
                        });
        
                        types.forEach(t => {
                            const typeName = String(t || 'LAINNYA');
                            const safeType = typeName.replace(/\\/g, '\\\\').replace(/'/g, "\\'");
                            innerHtml += `<button type="button" class="akrab-btn filter-card ${cardClass}" onclick="window.filterIcs('${safeType}', this, ${isPO})">
        <span class="akrab-chip-icon"><i class="fas ${isPO ? 'fa-clock' : 'fa-box-open'}"></i></span>
        <span class="akrab-chip-text"><b>${typeName}</b><small>Akrab • ${modeLabel}</small></span>
        <span class="akrab-chip-go"><i class="fas fa-chevron-right"></i></span>
                            </button>`;
                        });
        
        
                        (mrfBrands || []).forEach(m => {
                            const mrfName = String(m || 'Paket Akrab');
                            const safeMrf = mrfName.replace(/\\/g, '\\\\').replace(/'/g, "\\'");
                            const cleanMrf = mrfName.replace(/^MRF\s*/i, '');
                            innerHtml += `<button type="button" class="akrab-btn filter-card ${cardClass}" onclick="window.filterMrf('${safeMrf}', this, ${isPO})">
        <span class="akrab-chip-icon"><i class="fas ${isPO ? 'fa-clock' : 'fa-satellite-dish'}"></i></span>
        <span class="akrab-chip-text"><b>${cleanMrf}</b><small>Paket Akrab • ${modeLabel}</small></span>
        <span class="akrab-chip-go"><i class="fas fa-chevron-right"></i></span>
                            </button>`;
                        });
        
                        innerHtml += '</div>';
                        return innerHtml;
                    };
        
                    window.switchAkrabMode = function(mode) {
                        window.akrabDisplayMode = mode === 'po' ? 'po' : 'normal';
                        if (typeof window.renderGabunganFilters === 'function') window.renderGabunganFilters();
                    };
        
                    const activeMode = window.hidePoAkrab ? 'normal' : (window.akrabDisplayMode || 'normal');
                    const normalActive = activeMode !== 'po' ? 'active' : '';
                    const poActive = activeMode === 'po' ? 'active' : '';
                    let html = `<div class="akrab-mode-header">
        <div class="akrab-section-title">Pilih Paket</div>
        <div class="akrab-mode-tabs">
            <button type="button" class="akrab-mode-tab ${normalActive}" onclick="window.switchAkrabMode('normal')"><i class="fas fa-bolt"></i> Paket Akrab</button>
            ${!window.hidePoAkrab ? `<button type="button" class="akrab-mode-tab po-tab ${poActive}" onclick="window.switchAkrabMode('po')"><i class="fas fa-clock"></i> Pre-Order</button>` : ''}
        </div>
                    </div>`;
        
                    html += window.renderAkrabModeItems(activeMode, brands, types, mrfBrands);
                    const areaFilter = document.getElementById(isInlineAkrab ? 'inlineAkrabFilter' : 'areaFilter');
                    if(areaFilter) {
                        areaFilter.innerHTML = html;
                        areaFilter.style.display = 'block';
                        areaFilter.style.gridTemplateColumns = 'none';
                    }
                };
                
                
        
        
        window.onclick = function(e) {
        if(e.target==document.getElementById('modalTopup')) tutupModalTopup();  if(e.target==modal) tutupModal(); if(e.target==modalInvoice) tutupInvoice(); if(e.target==modalDetailRiwayat) modalDetailRiwayat.style.display='none'; if(e.target==document.getElementById('modalProdukList')) document.getElementById('modalProdukList').style.display='none'; }
    </script>
    </div>

    <div id="pageAkrabSpesial" class="full-page">
        <div class="header" style="padding-bottom:20px; margin-bottom:20px;">
            <div style="display:flex; justify-content:space-between; align-items:center;">
                <div style="font-weight:bold; font-size:20px; color:white;"><i class="fas fa-fire" style="color:#ff9f43; margin-right:10px;"></i>Akrab Spesial</div>
                <div onclick="window.navSwitch('home', document.querySelectorAll('.nav-item')[0])" style="background:rgba(255,255,255,0.2); width:35px; height:35px; border-radius:50%; display:flex; align-items:center; justify-content:center; cursor:pointer;">
                    <i class="fas fa-arrow-left" style="color:white; font-size:16px;"></i>
                </div>
            </div>
        </div>
        <div id="akrabSpesialContent" style="padding: 0 10px;"></div>
    </div>

    <div id="pageAllProduk" class="full-page">
        <div class="header" style="padding: 25px 25px 60px; border-radius: 0 0 30px 30px; margin-bottom: -30px;">
            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:15px;">
                <div style="font-weight:bold; font-size:22px; color:white;">Belanja Produk</div>
                <div onclick="navSwitch('etalase')" style="position:relative; cursor:pointer; background:rgba(255,255,255,0.2); width:40px; height:40px; border-radius:12px; display:flex; align-items:center; justify-content:center;">
                    <i class="fas fa-shopping-basket" style="color:white; font-size:18px;"></i>
                    <div id="badgeCart2" class="cart-badge" style="display:none; top:-5px; right:-5px; background:var(--danger); border:2px solid var(--primary);">0</div>
                </div>
            </div>
            <div style="position:relative;">
                <input type="text" placeholder="Cari nama produk..." oninput="handleShopSearch(this.value)" style="width:100%; padding:15px 15px 15px 45px; border-radius:15px; border:none; outline:none; font-size:14px; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
                <i class="fas fa-search" style="position:absolute; left:18px; top:16px; color:var(--primary);"></i>
            </div>
        </div>
        <div id="fullShopContainer" class="product-list" style="padding-top:40px;"></div>
    </div>
    </div>

    <div id="pageEtalase" class="full-page">
        <div class="header" style="padding-bottom:20px; margin-bottom:20px;">
            <div style="font-weight:bold; font-size:20px; color:white;">Keranjang Belanja</div>
        </div>
        <div id="cartList" style="padding: 0 20px;"></div>
        <div style="padding: 20px;">
            <div style="display:flex; justify-content:space-between; font-weight:bold; margin-bottom:15px;"><span>Total:</span><span id="cartTotal">Rp 0</span></div>
            <button class="btn-konfirmasi" onclick="checkoutWA()">Checkout via WhatsApp</button>
        </div>
    </div>

    <div id="pageLapak" class="full-page">
        <div class="header" style="padding-bottom:40px; margin-bottom:0;">
            <div style="display:flex; justify-content:space-between; align-items:center;">
                <div style="font-weight:bold; font-size:20px; color:white;">Manajemen Lapak</div>
                <i class="fas fa-times" onclick="navSwitch('profil')" style="color:white; font-size:20px; cursor:pointer;"></i>
            </div>
        </div>

        <div class="lapak-tabs">
            <div class="lapak-tab active" id="tabBarang" onclick="switchLapakTab('barang')">Lapak Saya</div>
            <div class="lapak-tab" id="tabPenjualan" onclick="switchLapakTab('penjualan')">Penjualan Saya</div>
            <div class="lapak-tab" id="tabAlamat" onclick="switchLapakTab('alamat')">Alamat Saya</div>
        </div>

        <div id="containerLapakSaya" style="padding:20px;">
            <div style="background:white; padding:15px; border-radius:15px; margin-bottom:20px; box-shadow:0 2px 10px rgba(0,0,0,0.05);">
                <h4 style="margin:0 0 10px 0;">Tambah Produk Fisik</h4>
                <input type="text" id="lapakNama" class="form-input" placeholder="Nama Barang" style="margin-bottom:10px; padding:10px;">
                <input type="number" id="lapakHarga" class="form-input" placeholder="Harga (Rp)" style="margin-bottom:10px; padding:10px;">
                <input type="number" id="lapakBerat" class="form-input" placeholder="Berat Barang (Gram). Contoh: 1000" style="margin-bottom:10px; padding:10px;">

                <div style="display:flex; gap:5px; margin-bottom:10px;">
                    <input type="file" id="fileUserLapak" accept="image/*" style="padding:10px; border:2px solid #edf2f7; border-radius:16px; width:100%; background:#f8fafc;">
                </div>
                <input type="text" id="lapakImg" class="form-input" placeholder="URL Gambar (Upload dulu)" readonly style="margin-bottom:10px; padding:10px; background:#eee;">
                <button class="btn-konfirmasi" onclick="tambahProdukLapak()">Posting Barang</button>
            </div>
            <h4 style="margin-bottom:10px;">Barang Jualan Saya</h4>
            <div id="listProdukLapak"></div>
        </div>

        <div id="containerPenjualanSaya" style="padding:20px; display:none;">
            <h4 style="margin-bottom:10px;">Pesanan Masuk</h4>
            <div id="listPenjualanSaya"></div>
        </div>

        <div id="containerAlamatSaya" style="padding:20px; display:none;">
            <div style="background:white; padding:15px; border-radius:15px; margin-bottom:20px; box-shadow:0 2px 10px rgba(0,0,0,0.05);">
                <h4 style="margin:0 0 15px 0;">Pengaturan Alamat Toko</h4>
                <div id="statusAlamatSekarang" style="background:#e1effe; padding:10px; border-radius:10px; margin-bottom:15px; font-size:11px; color:var(--primary); border:1px solid rgba(185,28,28,0.1);">
                    <i class="fas fa-map-marker-alt"></i> Alamat Tersimpan: <b id="txtAlamatTersimpan">Memuat...</b>
                </div>
                <p style="font-size:11px; color:#666; margin-bottom:15px;">Atur alamat asal pengiriman agar sistem dapat menghitung ongkos kirim secara akurat.</p>
                <div class="input-group">
                    <label style="font-size:12px; font-weight:bold;">Provinsi Asal</label>
                    <select id="sellerProv" class="form-input" onchange="window.loadCities(this.value, 'sellerCity')" style="padding-left:15px;">
                        <option value="">Pilih Provinsi</option>
                    </select>
                </div>
                <div class="input-group">
                    <label style="font-size:12px; font-weight:bold;">Kota / Kabupaten Asal</label>
                    <select id="sellerCity" class="form-input" onchange="window.loadDistricts(this.value, 'sellerDist')" style="padding-left:15px;">
                        <option value="">Pilih Kota</option>
                    </select>
                </div>
                <div class="input-group">
                    <label style="font-size:12px; font-weight:bold;">Kecamatan Asal</label>
                    <select id="sellerDist" class="form-input" style="padding-left:15px;">
                        <option value="">Pilih Kecamatan</option>
                    </select>
                </div>
                <button class="btn-konfirmasi" onclick="window.simpanAlamatSeller()">Simpan Alamat Toko</button>
            </div>
        </div>
    </div>
    </div>

    <div id="modalEditLapak" class="modal">
        <div class="modal-content">
            <h3>Edit Barang</h3>
            <input type="hidden" id="editLapakId">
            <div class="input-group"><input type="text" id="editLapakNama" class="form-input" placeholder="Nama"></div>
            <div class="input-group"><input type="number" id="editLapakHarga" class="form-input" placeholder="Harga"></div>
            <div class="input-group"><input type="text" id="editLapakImg" class="form-input" placeholder="URL Gambar" readonly style="background:#eee;"></div>
            <div style="margin-bottom:15px; text-align:center;">
                <input type="file" id="fileEditLapak" accept="image/*" style="font-size:12px;">
                <button onclick="uploadGambarEtalaseUser('fileEditLapak', 'editLapakImg')" style="padding:5px 10px; background:var(--primary); color:white; border:none; border-radius:5px;">Upload Baru</button>
            </div>
            <button class="btn-konfirmasi" onclick="simpanEditLapak()">Simpan Perubahan</button>
            <button class="btn-batal" onclick="document.getElementById('modalEditLapak').style.display='none'">Batal</button>
        </div>
    </div>

    <div id="pageBuku" class="full-page buku-page">
        <div class="buku-header">
            <div class="buku-title">
                <div>
                    <div class="buku-title-main"><i class="fas fa-book"></i> Buku Rekap</div>
                    <div class="buku-title-sub">Buku warung manual untuk mencatat pemasukan dan pengeluaran.</div>
                </div>
                <button class="buku-refresh-btn" onclick="loadBukuRekap()"><i class="fas fa-sync-alt"></i></button>
            </div>
        </div>
        <div class="buku-summary">
            <div class="buku-card full">
                <div>
                    <div class="buku-label">Laba Bersih Hari Ini</div>
                    <div class="buku-value big" id="bukuHariLaba">Rp 0</div>
                </div>
                <span class="buku-pill"><i class="fas fa-calendar-day"></i> Hari ini</span>
            </div>
            <div class="buku-card">
                <div class="buku-label">Pemasukan Hari Ini</div>
                <div class="buku-value" id="bukuHariMasuk">Rp 0</div>
            </div>
            <div class="buku-card">
                <div class="buku-label">Pengeluaran Hari Ini</div>
                <div class="buku-value" id="bukuHariKeluar">Rp 0</div>
            </div>
            <div class="buku-card">
                <div class="buku-label">Pemasukan Bulan Ini</div>
                <div class="buku-value" id="bukuBulanMasuk">Rp 0</div>
            </div>
            <div class="buku-card">
                <div class="buku-label">Pengeluaran Bulan Ini</div>
                <div class="buku-value" id="bukuBulanKeluar">Rp 0</div>
            </div>
            <div class="buku-card full">
                <div>
                    <div class="buku-label">Laba Bersih Bulan Ini</div>
                    <div class="buku-value big" id="bukuBulanLaba">Rp 0</div>
                </div>
                <span class="buku-pill"><i class="fas fa-pen"></i> Manual</span>
            </div>
        </div>
        <div class="buku-actions">
            <button class="buku-action-btn in" onclick="tambahBukuManual('pemasukan')"><i class="fas fa-plus-circle"></i> Pemasukan</button>
            <button class="buku-action-btn out" onclick="tambahBukuManual('pengeluaran')"><i class="fas fa-minus-circle"></i> Pengeluaran</button>
            <button class="buku-action-btn rekap" onclick="bukaRekapBukuBulanan()"><i class="fas fa-chart-column"></i> Rekap & Download PDF</button>
        </div>
        <div class="buku-date-box">
            <div class="buku-date-title">
                <strong><i class="fas fa-calendar-alt"></i> Riwayat Buku Rekap</strong>
                <span id="bukuTanggalLabel">Hari ini</span>
            </div>
            <div class="buku-date-controls">
                <button class="buku-date-btn" onclick="geserTanggalBuku(-1)"><i class="fas fa-chevron-left"></i></button>
                <input id="bukuTanggalInput" class="buku-date-input" type="date" onchange="setTanggalBuku(this.value)">
                <button class="buku-date-btn" onclick="geserTanggalBuku(1)"><i class="fas fa-chevron-right"></i></button>
            </div>
            <button class="buku-today-btn" onclick="setTanggalBuku(getBukuToday())"><i class="fas fa-location-crosshairs"></i> Kembali ke Hari Ini</button>
        </div>
        <div class="buku-filter">
            <button class="active" onclick="setBukuFilter('semua', this)">Semua</button>
            <button onclick="setBukuFilter('pemasukan', this)">Pemasukan</button>
            <button onclick="setBukuFilter('pengeluaran', this)">Pengeluaran</button>
        </div>
        <div id="bukuList" class="buku-list"></div>
    </div>

    <div id="modalBukuRekap" class="buku-modal-overlay" onclick="if(event.target === this) tutupRekapBukuBulanan()">
        <div class="buku-modal-card">
            <div class="buku-modal-head">
                <div>
                    <div class="buku-modal-title"><i class="fas fa-chart-column"></i> Rekap Bulanan</div>
                    <div class="buku-modal-sub">Tabel pemasukan, pengeluaran, dan total laba bersih bulanan.</div>
                </div>
                <button class="buku-modal-close" onclick="tutupRekapBukuBulanan()"><i class="fas fa-times"></i></button>
            </div>
            <div class="buku-modal-body">
                <div class="buku-month-nav">
                    <button class="buku-month-btn" onclick="geserBulanRekap(-1)"><i class="fas fa-chevron-left"></i></button>
                    <div id="bukuRekapBulanLabel" class="buku-month-label">Bulan ini</div>
                    <button class="buku-month-btn" onclick="geserBulanRekap(1)"><i class="fas fa-chevron-right"></i></button>
                </div>
                <button class="buku-today-btn" onclick="setBulanRekap(getBukuToday().slice(0,7))"><i class="fas fa-calendar-check"></i> Kembali ke Bulan Ini</button>
                <div id="bukuRekapBulananArea" class="buku-rekap-table-wrap"></div>
                <button class="buku-pdf-btn" onclick="downloadRekapBukuPDF()"><i class="fas fa-file-pdf"></i> Download Rekap PDF</button>
            </div>
        </div>
    </div>

    <div id="modalBukuManual" class="buku-modal-overlay" onclick="if(event.target === this) tutupBukuManualForm()">
        <div class="buku-modal-card">
            <div id="bukuModalHead" class="buku-modal-head in">
                <div>
                    <div id="bukuModalTitle" class="buku-modal-title">Tambah Pemasukan</div>
                    <div id="bukuModalSub" class="buku-modal-sub">Catat pemasukan atau pengeluaran manual.</div>
                </div>
                <button class="buku-modal-close" onclick="tutupBukuManualForm()"><i class="fas fa-times"></i></button>
            </div>
            <div class="buku-modal-body">
                <input type="hidden" id="bukuJenisInput" value="pemasukan">
                <div class="buku-form-row">
                    <label for="bukuJudulInput">Judul catatan</label>
                    <input id="bukuJudulInput" class="buku-form-control" type="text" placeholder="Contoh: Jual kopi / Beli gula">
                </div>
                <div class="buku-form-row">
                    <label for="bukuNominalInput">Nominal</label>
                    <input id="bukuNominalInput" class="buku-form-control" type="tel" inputmode="numeric" placeholder="Contoh: 15000">
                </div>
                <div class="buku-form-row">
                    <label for="bukuCatatanInput">Catatan tambahan</label>
                    <textarea id="bukuCatatanInput" class="buku-form-control" placeholder="Boleh dikosongkan"></textarea>
                </div>
            </div>
            <div class="buku-modal-actions">
                <button class="buku-modal-btn cancel" onclick="tutupBukuManualForm()">Batal</button>
                <button id="bukuSimpanBtn" class="buku-modal-btn save in" onclick="simpanBukuManualForm()"><i class="fas fa-save"></i> Simpan</button>
            </div>
        </div>
    </div>

    <div id="pageProfil" class="full-page">
        <div class="prof-header">
            <div class="prof-photo-wrap">
                <img id="profProfilePhoto" class="prof-profile-photo" src="https://ui-avatars.com/api/?name=User&background=7f1d1d&color=fff&size=128" alt="Foto Profil" onerror="this.onerror=null;this.src=window.profileFallbackAvatar || 'https://ui-avatars.com/api/?name=User&background=7f1d1d&color=fff&size=128';">
            </div>
            <div id="profNameDisplay" style="font-weight:bold; font-size:18px;">Loading...</div>
            <div id="profEmailDisplay" style="font-size:12px; opacity:0.8;">...</div>
            <button type="button" class="prof-photo-change-btn" onclick="document.getElementById('profilePhotoInput').click()"><i class="fas fa-camera"></i> Ganti Foto Profil</button>
            <input type="file" id="profilePhotoInput" class="photo-hidden-input" accept="image/jpeg,image/png,image/webp" onchange="handleProfilePhotoChange(this)">
        </div>
        <div class="prof-card">
            <div class="prof-row"><span>Username</span><b id="pUser">-</b></div>
            <div class="prof-row"><span>Nomor WhatsApp</span><b id="pWA">-</b></div>
            <div class="prof-row"><span>Sisa Saldo</span><b id="pSaldo" style="color:var(--primary)">-</b></div>
            <div class="prof-row"><span>Terdaftar Sejak</span><b id="pJoin">-</b></div>
        </div>
        <div style="padding:20px;">
            <button class="btn-konfirmasi" onclick="bukaPengaturanPrinter()" style="background:linear-gradient(135deg, #6c5ce7, #a29bfe); margin-bottom:10px; box-shadow: 0 4px 15px rgba(108, 92, 231, 0.3);"><i class="fas fa-print"></i> Pengaturan Printer</button>
            <button id="btnLapak" class="btn-konfirmasi" onclick="navSwitch('lapak')" style="display:none; background: linear-gradient(135deg, #f39c12, #d35400); margin-bottom:15px;"><i class="fas fa-store"></i> Buka Lapak Saya</button>
            <button class="btn-konfirmasi" onclick="navSwitch('pesanan_fisik')" style="display:none !important; background:linear-gradient(135deg, #3498db, #2980b9); margin-bottom:10px;"><i class="fas fa-box"></i> Pesanan Saya</button>
            <button class="btn-batal" onclick="handleLogout()" style="color:var(--danger); background:#fee;"><i class="fas fa-sign-out-alt"></i> Keluar Akun</button>
        </div>
    </div>

    <div id="pagePesananFisik" class="full-page">
        <div class="header" style="padding-bottom:20px; margin-bottom:20px;">
            <div style="display:flex; justify-content:space-between; align-items:center;">
                <div style="font-weight:bold; font-size:20px; color:white;">Pesanan Saya</div>
                <i class="fas fa-times" onclick="navSwitch('profil')" style="color:white; font-size:20px; cursor:pointer;"></i>
            </div>
        </div>
        <div id="listPesananFisik" style="padding:0 20px;"></div>
    </div>

    <div class="bottom-nav">
        <div class="nav-item active" onclick="navSwitch('home', this)">
            <i class="fas fa-store"></i>Etalase
        </div>
        <div class="nav-item" onclick="navSwitch('buku', this)">
            <i class="fas fa-book"></i>Buku
        </div>
        <div class="nav-item" onclick="openQRScanner()">
            <div class="nav-fab"><i class="fas fa-qrcode"></i></div>
        </div>
        <div class="nav-item" onclick="bukaRiwayatArsip()">
            <i class="fas fa-history"></i>Riwayat
        </div>
        <div class="nav-item" onclick="navSwitch('profil', this)">
            <i class="fas fa-user"></i>Profil
        </div>
    </div>

    <div id="modalPrinterSettings" class="modal">
        <div class="modal-content" style="max-height: 90vh; overflow-y: auto;">
            <h3 style="margin-bottom:10px; border-bottom:1px dashed #eee; padding-bottom:10px;">Pengaturan Printer</h3>

            <div style="background:#f0f0f0; padding:15px; border-radius:10px; border:1px solid #ccc; margin-bottom:15px; text-align:center;">
                <div style="font-size:10px; color:#666; margin-bottom:5px; font-weight:bold;"><i class="fas fa-eye"></i> Pratinjau Struk (Live)</div>
                <div style="background:white; padding:10px; box-shadow:0 2px 5px rgba(0,0,0,0.1); display:inline-block; text-align:left; border:1px solid #eee;">
                    <pre id="settingsPreviewArea" style="margin:0; font-family:'Courier New', monospace; font-size:10px; color:black; white-space:pre;">Memuat Preview...</pre>
                </div>
            </div>

            <div class="input-group">
                <label style="font-size:11px; font-weight:bold;">Nama Toko (Header)</label>
                <textarea id="setStoreName" class="form-input" placeholder="Contoh: Konter Pulsa" oninput="updateSettingsPreview()" rows="2"></textarea>
            </div>
            <div class="input-group">
                <label style="font-size:11px; font-weight:bold;">Alamat / Info (Sub-Header)</label>
                <textarea id="setStoreAddress" class="form-input" placeholder="Contoh: Jl. Mawar No. 1" oninput="updateSettingsPreview()" rows="2"></textarea>
            </div>
            <div class="input-group">
                <label style="font-size:11px; font-weight:bold;">Pesan Penutup (Footer)</label>
                <textarea id="setStoreFooter" class="form-input" placeholder="Contoh: Terima Kasih" oninput="updateSettingsPreview()" rows="2"></textarea>
            </div>

            <div style="display:grid; grid-template-columns: 1fr 1fr; gap:10px;">
                <div class="input-group">
                    <label style="font-size:11px; font-weight:bold;">Ukuran Kertas</label>
                    <select id="setPaperSize" class="form-input" onchange="updateSettingsPreview()">
                        <option value="58">58mm</option>
                        <option value="80">80mm</option>
                    </select>
                </div>
                <div class="input-group">
                    <label style="font-size:11px; font-weight:bold;">Markup Default (Rp)</label>
                    <input type="number" id="setGlobalMarkup" class="form-input" placeholder="0" oninput="updateSettingsPreview()">
                </div>
            </div>

            <button class="btn-konfirmasi" onclick="simpanPengaturanPrinter()">SIMPAN PENGATURAN</button>
            <button class="btn-batal" onclick="document.getElementById('modalPrinterSettings').style.display='none'">BATAL</button>
        </div>
    </div>

    <style>
        .chat-fab { background: #25D366; box-shadow: 0 4px 15px rgba(37, 211, 102, 0.4); }
        #modalChatPublic { display: none; position: fixed; bottom: 85px; right: 20px; width: 340px; max-width: 90vw; height: 500px; max-height: 75vh; z-index: 12000; background: #efeae2; border-radius: 16px; box-shadow: 0 10px 30px rgba(0,0,0,0.2); flex-direction: column; overflow: hidden; animation: zoomInWA 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275); align-items: stretch; justify-content: flex-start; }
        @keyframes zoomInWA { from { opacity: 0; transform: scale(0.8) translateY(20px); transform-origin: bottom right; } to { opacity: 1; transform: scale(1) translateY(0); transform-origin: bottom right; } }
        .wa-header { background: #00a884; color: white; padding: 12px 15px; display: flex; align-items: center; justify-content: space-between; flex-shrink: 0; }
        .wa-header-left { display: flex; align-items: center; gap: 10px; }
        .wa-header-icon { width: 35px; height: 35px; background: rgba(255,255,255,0.2); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-size: 18px; flex-shrink: 0; }
        .wa-header-title { display: flex; flex-direction: column; }
        .wa-header-title b { font-size: 14px; line-height: 1.2; }
        .wa-header-title span { font-size: 10px; opacity: 0.9; }
        .wa-tabs { display:flex; background: #00a884; color: white; border-bottom: 1px solid rgba(255,255,255,0.1); flex-shrink: 0; }
        .wa-tab { flex:1; text-align:center; padding: 10px; font-size: 12px; font-weight: bold; cursor: pointer; transition: 0.2s; opacity: 0.7; border-bottom: 3px solid transparent; }
        .wa-tab.active { opacity: 1; border-bottom: 3px solid white; }
        .chat-box { flex: 1; overflow-y: auto; padding: 12px; display: flex; flex-direction: column; gap: 8px; margin-bottom: 0; background-color: #efeae2; background-image: url('https://user-images.githubusercontent.com/15075759/28719144-86dc0f70-73b1-11e7-911d-60d70fcded21.png'); background-size: cover; border-radius: 0; border: none; }
        .chat-bubble { max-width: 80%; padding: 6px 10px 15px 10px; border-radius: 12px; font-size: 11px; position: relative; word-wrap: break-word; line-height: 1.4; box-shadow: 0 1px 2px rgba(0,0,0,0.1); }
        .chat-bubble.me { align-self: flex-end; background: #d9fdd3; color: #111; border-top-right-radius: 0; border-bottom-right-radius: 12px; }
        .chat-bubble.admin { align-self: flex-start; background: #ffffff; color: #111; border-top-left-radius: 0; border-bottom-left-radius: 12px; }
        .chat-name { font-size: 10px; font-weight: bold; margin-bottom: 2px; color: #075e54; display:flex; align-items:center; gap:3px; }
        .chat-time { font-size: 9px; color: #667781; position: absolute; bottom: 4px; right: 8px; }
        .chat-input-bar { display: flex; gap: 8px; align-items: flex-end; background: #f0f2f5; padding: 10px; position: relative; z-index: 20; border-top: none; flex-shrink: 0; }
        .chat-textarea { resize: none; overflow-y: hidden; min-height: 40px; max-height: 120px; padding: 12px 15px; border-radius: 20px; background: white; border: none; flex: 1; font-size: 13px; line-height: 1.4; font-family: inherit; transition: height 0.1s; outline: none; box-sizing: border-box; box-shadow: 0 1px 2px rgba(0,0,0,0.05); }
        .chat-textarea:focus { box-shadow: 0 1px 3px rgba(0,0,0,0.1); }
        .btn-send-chat { width: 42px; height: 42px; border-radius: 50%; background: #00a884; color: white; border: none; display: flex; align-items: center; justify-content: center; cursor: pointer; flex-shrink: 0; box-shadow: 0 2px 5px rgba(0,168,132,0.3); transition: 0.2s; margin-bottom: 0px; }
        .btn-send-chat:active { transform: scale(0.9); }
    </style>
    <div class="chat-fab" onclick="bukaChatPublic()"> <i class="fab fa-whatsapp" style="font-size: 24px;"></i>
        <div id="badgeChat" style="position: absolute; top: -2px; right: -2px; background: #ff7675; color: white; border-radius: 50%; font-size: 9px; width: 16px; height: 16px; display: none; align-items: center; justify-content: center; border: 2px solid white; font-weight:bold;">!</div>
    </div>
    <div id="modalChatPublic">
        <div class="wa-header">
            <div class="wa-header-left">
                <div class="wa-header-icon"><i class="fas fa-headset"></i></div>
                <div class="wa-header-title">
                    <b>BhuleEmarket</b>
                    <span><span style="display:inline-block; width:6px; height:6px; background:#2ecc71; border-radius:50%; margin-right:4px; animation:blink 1s infinite;"></span>Online</span>
                </div>
            </div>
            <i class="fas fa-times" onclick="tutupChatPublic()" style="font-size:18px; color:white; cursor:pointer;"></i>
        </div>

        <div id="areaChatBox" class="chat-box" style="display:flex;">
            <div style="text-align:center; padding:40px; color:#999; background:white; border-radius:10px;"><i class="fas fa-circle-notch fa-spin"></i> Memuat percakapan...</div>
        </div>

        <div id="chatControlsContainer" style="background:#f0f2f5;">
            <div id="chatReplyPreview" class="chat-reply-bar" style="display:none; background:#e2e8f0; border-left:4px solid #00a884; margin:0 10px; margin-top:5px; border-radius:8px;">
                <div class="reply-content">
                    <div class="reply-name" id="replyName" style="color:#00a884;">User</div>
                    <div class="reply-text" id="replyText">Pesan...</div>
                </div>
                <i class="fas fa-times" onclick="cancelReply()" style="color:#999; cursor:pointer; padding:5px;"></i>
            </div>
            <div class="chat-input-bar">
                <textarea id="inputPesanChat" class="chat-textarea" placeholder="Ketik pesan..." rows="1" oninput="autoResizeChat(this)"></textarea>
                <button type="button" onclick="kirimPesanChat()" class="btn-send-chat">
                    <i class="fas fa-paper-plane" style="font-size:16px; margin-left:-2px;"></i>
                </button>
            </div>
        </div>
    </div>
    <style>
        @keyframes blink { 50% { opacity: 0.5; } }
    </style>
    <div id="modalPrintPreview" class="modal" style="z-index: 25000;">
        <div class="modal-content">
            <h3 style="margin-bottom:15px;">Cetak Struk</h3>

            <button id="btnConnectPrinter" class="btn-konfirmasi" onclick="connectPrinter()" style="background:#0984e3; margin-bottom:15px;">
                <i class="fab fa-bluetooth"></i> Hubungkan ke Printer
            </button>
            <div id="statusPrinter" style="text-align:center; font-size:11px; color:#999; margin-bottom:10px;">Status: Belum Terhubung</div>
            <div class="input-group" style="margin-bottom:15px; border-top:1px dashed #eee; padding-top:10px;">
                <label style="font-size:12px; font-weight:bold; color:var(--primary);">Markup / Admin (Rp)</label>
                <input type="number" id="inputLiveMarkup" class="form-input" placeholder="0" oninput="updateLivePreview(this.value)" style="font-weight:bold; color:var(--primary);">
            </div>

            <div style="background:#f8f9fa; border:1px solid #ccc; padding:15px; font-family:'Courier New', monospace; font-size:12px; margin-bottom:15px; max-height:300px; overflow-y:auto; box-shadow:inset 0 2px 5px rgba(0,0,0,0.05);">
                <pre id="printPreviewArea" style="white-space:pre-wrap; margin:0; color:#333;">Memuat Preview...</pre>
            </div>

            <button id="btnPrintNow" class="btn-konfirmasi" onclick="printStruk()" style="background:var(--success);">
                <i class="fas fa-print"></i> PRINT SEKARANG
            </button>
            <button id="btnShareWA" class="btn-konfirmasi" onclick="window.shareStrukToWA()" style="display:none; background:linear-gradient(135deg, #25D366, #128C7E); margin-top:10px;">
                <i class="fab fa-whatsapp"></i> Kirim ke WhatsApp
            </button>

            <button class="btn-batal" onclick="document.getElementById('modalPrintPreview').style.display='none'" style="margin-top:10px;">Tutup</button>
        </div>
    </div>

    <script>
        // Konfigurasi Printer Default
        let printerSettings = {
            storeName: 'Nama Toko',
            address: 'Alamat Toko',
            footer: 'Terima Kasih',
            paperSize: '58',
            markup: 0
        };
        
        // Variabel Global Bluetooth
        let bluetoothDevice;
        let printCharacteristic;
        let currentReceiptData = ''; 
                document.addEventListener('DOMContentLoaded', () => {
            const saved = localStorage.getItem('printerSettings_v1');
            if(saved) printerSettings = JSON.parse(saved);
        });
        
                window.bukaPengaturanPrinter = function() {
            document.getElementById('setStoreName').value = printerSettings.storeName || '';
            document.getElementById('setStoreAddress').value = printerSettings.address || '';
            document.getElementById('setStoreFooter').value = printerSettings.footer || '';
            document.getElementById('setPaperSize').value = printerSettings.paperSize || '58';
            document.getElementById('setGlobalMarkup').value = printerSettings.markup || 0;
            
            document.getElementById('modalPrinterSettings').style.display = 'flex';
            // Render preview awal berdasarkan data saat ini
            window.updateSettingsPreview();
        };
        
        window.updateSettingsPreview = function() {
            // Ambil nilai langsung dari input (Live)
            const sName = document.getElementById('setStoreName').value || 'NAMA TOKO';
            const sAddr = document.getElementById('setStoreAddress').value || 'Alamat Toko';
            const sFoot = document.getElementById('setStoreFooter').value || 'Terima Kasih';
            const sPaper = document.getElementById('setPaperSize').value;
            const sMarkup = parseInt(document.getElementById('setGlobalMarkup').value) || 0;
        
            // Dummy Data Transaksi untuk Preview
            const dummyItem = { produk: "Pulsa Telkomsel 10k", harga: 10500, tujuan: "08123456789", sn: "1234567890" };
            const finalPrice = dummyItem.harga + sMarkup;
            const priceFmt = "Rp " + new Intl.NumberFormat('id-ID').format(finalPrice);
        
            // Logic Render Sederhana
            const width = sPaper === '58' ? 32 : 48;
            const line = '-'.repeat(width);
            
            const center = (txt) => {
                txt = txt.toString();
                let output = ''; let remaining = txt;
                while (remaining.length > 0) {
                    let chunk = remaining.substring(0, width);
                    remaining = remaining.substring(width);
                    const spaces = Math.max(0, Math.floor((width - chunk.length) / 2));
                    output += ' '.repeat(spaces) + chunk;
                    if (remaining.length > 0) output += '\n';
                }
                return output;
            };
        
            const leftRight = (left, right) => {
                left = left.toString(); right = right.toString();
                let output = '';
                const maxLeftLen = width - right.length - 1;
                let remaining = left;
                while (remaining.length > 0) {
                    if (remaining.length <= maxLeftLen) {
                        const spaces = width - remaining.length - right.length;
                        output += remaining + ' '.repeat(spaces) + right;
                        remaining = '';
                    } else {
                        const chunk = remaining.substring(0, maxLeftLen);
                        output += chunk + '\n'; 
                        remaining = remaining.substring(maxLeftLen);
                    }
                }
                return output;
            };
        
            let receipt = '';
            receipt += center(sName.toUpperCase()) + '\n';
            if(sAddr) receipt += center(sAddr) + '\n';
            receipt += line + '\n';
            receipt += leftRight("No. Trx", "TRX-DUMMY") + '\n';
            receipt += leftRight("Waktu", "01/01/26 12:00") + '\n';
            receipt += line + '\n';
            receipt += leftRight(dummyItem.produk, priceFmt) + '\n';
            receipt += "Tujuan : " + dummyItem.tujuan + "\n";
            receipt += "SN : " + dummyItem.sn + "\n";
            receipt += line + '\n';
            receipt += leftRight("TOTAL", priceFmt) + '\n';
            receipt += line + '\n';
            if(sFoot) receipt += center(sFoot) + '\n';
            receipt += center("Preview Tampilan") + '\n';
        
            const previewArea = document.getElementById('settingsPreviewArea');
            previewArea.innerText = receipt;
        };
        
                window.simpanPengaturanPrinter = function() {
            printerSettings.storeName = document.getElementById('setStoreName').value || 'Nama Toko';
            printerSettings.address = document.getElementById('setStoreAddress').value || '';
            printerSettings.footer = document.getElementById('setStoreFooter').value || '';
            printerSettings.paperSize = document.getElementById('setPaperSize').value;
            printerSettings.markup = parseInt(document.getElementById('setGlobalMarkup').value) || 0;
            
            localStorage.setItem('printerSettings_v1', JSON.stringify(printerSettings));
            alert('Pengaturan Tersimpan!');
            document.getElementById('modalPrinterSettings').style.display = 'none';
        };
        
        // Variabel Global Live Preview
        let activePrintData = null;
        let activePrintType = ''; // 'single' atau 'mass'
        
        window.updateLivePreview = function(val) {
            printerSettings.markup = parseInt(val) || 0;
            // Simpan otomatis agar tidak hilang saat reload
            localStorage.setItem('printerSettings_v1', JSON.stringify(printerSettings));
            
            if(activePrintType === 'single' && activePrintData) {
                window.renderSinglePreview(activePrintData);
            } else if(activePrintType === 'mass' && activePrintData) {
                generateStrukMasal(activePrintData);
            }
        };
        
                // Variabel Mode Share
        window.isShareMode = false;
        
        window.siapkanShare = function(strData) {
            window.isShareMode = true;
            window.siapkanPrint(strData);
        };
        
        window.shareStrukToWA = async function() {
            const btn = document.getElementById('btnShareWA');
            const originalText = btn.innerHTML;
            btn.innerHTML = '<i class="fas fa-circle-notch fa-spin"></i> Memproses...';
            btn.disabled = true;
        
            try {
        const element = document.getElementById('printPreviewArea');
        const canvas = await html2canvas(element, {
            scale: 2,
            backgroundColor: "#ffffff",
            logging: false,
            onclone: (clonedDoc) => {
                const el = clonedDoc.getElementById('printPreviewArea');
                el.style.padding = '20px';
                el.style.width = 'auto';
                el.style.color = '#000000';
            }
        });
        
        // 1. JEMBATAN ANDROID: Cek apakah dibuka di Aplikasi BhuleEmarket
        if (window.AndroidShare) {
            // Kirim Base64 Gambar langsung ke Java Android
            const base64Data = canvas.toDataURL("image/jpeg", 0.9);
            window.AndroidShare.shareBase64(base64Data);
            
            btn.innerHTML = originalText;
            btn.disabled = false;
            return; // Stop di sini, biarkan Android yang kerja
        }
        
        // 2. Web Share API (Untuk Browser Chrome/Safari biasa)
        canvas.toBlob(async (blob) => {
            const fileName = 'Struk_' + (activePrintData.trx_id || Date.now()) + '.jpg';
            const file = new File([blob], fileName, { type: "image/jpeg" });
        
            if (navigator.canShare && navigator.canShare({ files: [file] })) {
                try {
                    await navigator.share({
                        files: [file],
                        title: 'Struk Transaksi',
                        text: 'Bukti Transaksi BhuleEmarket'
                    });
                } catch (err) {
                    if (err.name !== 'AbortError') alert('Gagal share: ' + err.message);
                }
            } else {
                // Fallback Download
                const link = document.createElement('a');
                link.download = fileName;
                link.href = canvas.toDataURL("image/jpeg");
                link.click();
                alert("Gambar berhasil disimpan (Browser ini tidak mendukung share gambar langsung).");
            }
            btn.innerHTML = originalText;
            btn.disabled = false;
        }, 'image/jpeg', 0.9);
        // ------------------------------
        
            } catch (e) {
        alert("Gagal membuat gambar: " + e.message);
        btn.innerHTML = originalText;
        btn.disabled = false;
            }
        };
        
        window.siapkanPrint = function(strData) {
            const data = JSON.parse(decodeURIComponent(strData));
            activePrintData = data;
            activePrintType = 'single';
            
            // Set Nilai Input Markup saat modal dibuka
            const inputM = document.getElementById('inputLiveMarkup');
            if(inputM) inputM.value = printerSettings.markup;
        
            window.renderSinglePreview(data);
            document.getElementById('modalPrintPreview').style.display = 'flex';
            updatePrintButtonState();
        };
        
        window.renderSinglePreview = function(data) {
            const markup = parseInt(printerSettings.markup) || 0;
            let rawPrice = parseInt(data.harga) + markup;
            // PEMBULATAN PINTAR (Kelipatan 500 ke atas)
            const finalPrice = Math.ceil(rawPrice / 500) * 500;
            
            const dateObj = new Date();
            const dateStr = dateObj.toLocaleDateString('id-ID');
            const timeStr = dateObj.toLocaleTimeString('id-ID').slice(0,5);
        
            // 1. Tentukan Lebar Kertas (32 chars untuk 58mm)
            const width = printerSettings.paperSize === '58' ? 32 : 48;
            const dashed = '-'.repeat(width);
            const doubleDashed = '='.repeat(width);            // 2. Fungsi Perata Teks (Alignment Helper) - Auto Wrap & Multi-line Support
            const center = (txt) => {
                if(!txt) return '';
                txt = txt.toString();
                
                // FIX: Pecah dulu berdasarkan baris baru (Enter)
                const lines = txt.split('\n');
                let globalOutput = '';
        
                lines.forEach(lineTxt => {
                    let remaining = lineTxt;
                    
                    // Handle empty lines
                    if(remaining.length === 0) {
                        globalOutput += '\n';
                        return;
                    }
        
                    while (remaining.length > 0) {
                        // Ambil potongan teks selebar kertas
                        let chunk = remaining.substring(0, width);
                        remaining = remaining.substring(width);
                        
                        // Hitung spasi untuk rata tengah baris ini
                        const spaces = Math.max(0, Math.floor((width - chunk.length) / 2));
                        
                        // Susun baris
                        globalOutput += ' '.repeat(spaces) + chunk + '\n';
                    }
                });
                
                // Hapus enter terakhir agar tidak double space antar bagian
                return globalOutput.replace(/\n$/, '');
            };
            
            // Helper Align (Kiri - Kanan Wrapping)
            const leftRight = (left, right) => {
                left = left.toString(); 
                right = right.toString();
                let output = '';
                
                // Hitung batas aman lebar kiri (lebar kertas - lebar harga - spasi)
                const maxLeftLen = width - right.length - 1;
        
                // Skenario 1: Teks Muat 1 Baris
                if (left.length <= maxLeftLen) {
                    const spaces = width - left.length - right.length;
                    return left + ' '.repeat(spaces) + right;
                } 
                
                // Skenario 2: Teks Panjang (Wrap ke bawah)
                let remaining = left;
                while (remaining.length > 0) {
                    if (remaining.length <= maxLeftLen) {
                        // Baris Terakhir: Gabung dengan Harga
                        const spaces = width - remaining.length - right.length;
                        output += remaining + ' '.repeat(spaces) + right;
                        remaining = ''; // Selesai
                    } else {
                        // Baris Lanjutan: Cetak potongan teks + Enter
                        // Kita potong per karakter agar format kolom terjaga rapi
                        const chunk = remaining.substring(0, maxLeftLen);
                        output += chunk + '\n'; 
                        remaining = remaining.substring(maxLeftLen);
                    }
                }
                return output;
            };
        
            // 3. Susun Teks Struk
            let receipt = '';
            receipt += center(printerSettings.storeName.toUpperCase()) + '\n';
            if(printerSettings.address) receipt += center(printerSettings.address) + '\n';
            receipt += dashed + '\n';
            
            receipt += dateStr + ' ' + timeStr + '\n';
            receipt += 'No. Trx: ' + (data.trx_id || '-') + '\n';
            receipt += dashed + '\n';
            
            // Item
            let priceFmt = 'Rp ' + new Intl.NumberFormat('id-ID').format(finalPrice);
            receipt += leftRight(data.produk || 'Produk', priceFmt) + '\n';
            
            // Tujuan & SN
            receipt += 'Tujuan : ' + (data.tujuan || '-') + '\n';
            if(data.sn && data.sn !== '-') {
                 // Bersihkan SN agar rapi
                 let cleanSN = data.sn.replace(/SN:|Ref:|Sukses|Berhasil/gi, '').trim();
                 // MODIF: SN Auto Wrap (Anti Potong)
                 receipt += 'SN/Ref :\n' + center(cleanSN) + '\n';
            }
            
            receipt += dashed + '\n';
            receipt += leftRight('TOTAL', priceFmt) + '\n';
            receipt += dashed + '\n';
            
                        if(printerSettings.footer) receipt += center(printerSettings.footer) + '\n';
            receipt += '\n\n\n';
        
            currentReceiptData = receipt;
        
            // 4. Tampilkan Preview ASLI (Menggunakan Pre-formatted Text)
            const previewArea = document.getElementById('printPreviewArea');
            previewArea.innerText = receipt;
            
            // Styling Wajib agar Preview = Hasil Cetak
            Object.assign(previewArea.style, {
                fontFamily: '"Courier New", Courier, monospace',
                whiteSpace: 'pre',
                overflowX: 'auto',
                fontSize: '13px',
                lineHeight: '1.2',
                color: '#000',
                fontWeight: 'bold',
                textAlign: 'left'
            });
        
            document.getElementById('modalPrintPreview').style.display = 'flex';
            updatePrintButtonState();
        };
        
                                function updatePrintButtonState() {
            const btnPrint = document.getElementById('btnPrintNow');
            const btnConnect = document.getElementById('btnConnectPrinter');
            const status = document.getElementById('statusPrinter');
            const btnShare = document.getElementById('btnShareWA');
            const inputMarkup = document.getElementById('inputLiveMarkup') ? document.getElementById('inputLiveMarkup').parentElement : null;
        
            if(inputMarkup) inputMarkup.style.display = 'block';
        
            if(window.isShareMode) {
                if(btnPrint) btnPrint.style.display = 'none';
                if(btnConnect) btnConnect.style.display = 'none';
                if(status) status.style.display = 'none';
                if(btnShare) btnShare.style.display = 'block';
            } else {
                // Mode RawBT: Tombol Connect & Status Bluetooth TIDAK diperlukan
                if(btnShare) btnShare.style.display = 'none';
                
                if(btnConnect) btnConnect.style.display = 'none';
                if(status) status.style.display = 'none';
        
                                if(btnPrint) {
                    btnPrint.style.display = 'block';
                    btnPrint.innerText = "PRINT (Via RawBT)";
                }
            }
        }
        
        window.connectPrinter = async function() {
            try {
                document.getElementById('statusPrinter').innerText = 'Mencari...';
                bluetoothDevice = await navigator.bluetooth.requestDevice({
                    acceptAllDevices: true,
                    optionalServices: ['000018f0-0000-1000-8000-00805f9b34fb', '00001101-0000-1000-8000-00805f9b34fb']
                });
                bluetoothDevice.addEventListener('gattserverdisconnected', onDisconnected);
                const server = await bluetoothDevice.gatt.connect();
                const services = await server.getPrimaryServices();
                let printService = services.find(s => s.uuid.startsWith('000018f0') || s.uuid.includes('18f0')) || services[0];
                const characteristics = await printService.getCharacteristics();
                printCharacteristic = characteristics.find(c => c.properties.write || c.properties.writeWithoutResponse);
                
                alert('Terhubung!');
                updatePrintButtonState();
            } catch (error) {
                alert('Gagal: ' + error.message);
                document.getElementById('statusPrinter').innerText = 'Gagal: ' + error.message;
            }
        };
        
        function onDisconnected() {
            printCharacteristic = null;
            updatePrintButtonState();
        }
        
        window.printStruk = async function() {
            const btn = document.getElementById('btnPrintNow');
            btn.innerText = "Membuka RawBT..."; 
            btn.disabled = true;
        
            try {
        // Encode Data Struk ke Base64
        // Tambahkan perintah ESC/POS Bold On (\x1B\x45\x01) dan Reset (\x1B\x40)
        const textWithBold = '\x1B\x45\x01' + currentReceiptData + '\x1B\x40';
        const base64Data = btoa(textWithBold);
        // Gunakan URL Scheme RawBT
        const rawbtUrl = 'rawbt:base64,' + base64Data;
        
        // FIX: Gunakan Anchor Click untuk memicu Intent Android dengan lebih andal
        const a = document.createElement('a');
        a.href = rawbtUrl;
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        
        // Reset UI setelah eksekusi
        setTimeout(() => {
            document.getElementById('modalPrintPreview').style.display = 'none';
            btn.innerText = "PRINT SEKARANG"; 
            btn.disabled = false;
        }, 1000);
            } catch(e) {
        alert("Gagal: " + e.message);
        btn.innerText = "PRINT SEKARANG"; 
        btn.disabled = false;
            }
        };
    </script>

    <script>
        // Memastikan variabel interval tersedia
        window.intervalCek = window.intervalCek || {};
        
        // Restore Fungsi Helper Bersihkan Pesan (Jaga-jaga jika hilang)
        if(typeof window.bersihkanPesan === 'undefined') {
            window.bersihkanPesan = function(txt) {
                let m = txt; try { m = JSON.parse(txt).body_respon || txt; } catch (e) {}
                
                if (m.includes("kodereseller=") || m.includes("password=")) {
                    if (m.includes("#")) {
                        m = m.substring(m.indexOf("#") + 1).trim();
                    } else {
                        m = "Transaksi Gagal dari Provider";
                    }
                }
                
                m = m.replace(/\.?\s*Saldo\s+[\d\.,\s\-\=]+(@\d{2}:\d{2})?/gi, "").replace(/Hrg\s+[\d\.,]+/gi, "");
                return m.trim();
            };
        }
        
        // Restore Fungsi Cek Status PPOB
        window.cekStatusBerkala = function(idDoc, trxId, tujuan, kode) {
            if(window.intervalCek[idDoc]) return;
            console.log("Memulai Cek Status:", trxId);
            window.intervalCek[idDoc] = setInterval(async () => {
                try {
                    const res = await fetch('cek_status.php', { method: 'POST', body: JSON.stringify({ refID: trxId, tujuan: tujuan, kode_produk: kode }) });
                    const json = await res.json();
                    if(json.status !== "PENDING") { 
                        clearInterval(window.intervalCek[idDoc]); 
                        delete window.intervalCek[idDoc];
                        
                        let psn = json.sn;
                        if(window.bersihkanPesan) psn = window.bersihkanPesan(json.sn);
                        
                        if(window.updateFirestoreStatus) {
                            window.updateFirestoreStatus(idDoc, json.status, psn, JSON.stringify(json));
                        }
                    }
                } catch(e) {}
            }, 10000); 
        };
        
        // Restore Fungsi Cek Status Topup
        window.cekStatusQiospayBerkala = function(idDoc, nominal) {
            if(window.intervalCek[idDoc]) return;
            window.intervalCek[idDoc] = setInterval(async () => {
                try {
                    const req = await fetch('cek_topup.php', {
                        method: 'POST', headers: { 'Content-Type': 'application/json' },
                        body: JSON.stringify({ nominal: nominal, docId: idDoc })
                    });
                    const res = await req.json();
                    if(res.status === 'success') {
                        clearInterval(window.intervalCek[idDoc]);
                        delete window.intervalCek[idDoc];
                        
                        const user = window.auth.currentUser;
                        if(user) {
                            const trxRef = window.doc(window.db, "users", user.uid, "riwayat_transaksi", idDoc);
                            const trxSnap = await window.getDoc(trxRef);
                            if(trxSnap.exists() && (trxSnap.data().status === 'BERHASIL' || trxSnap.data().status === 'Sukses')) return; // Anti-Double
                            
                            const userRef = window.doc(window.db, "users", user.uid);
                            const userSnap = await window.getDoc(userRef);
                            const newSaldo = (userSnap.exists() ? parseInt(userSnap.data().saldo) || 0 : 0) + parseInt(nominal);
                            
                            /* await window.updateDoc(userRef, { saldo: newSaldo }); // DIHAPUS DEMI KEAMANAN */
                            console.log('Pembayaran valid, menunggu cronjob/backend server memproses saldo...');
                            if(window.updateFirestoreStatus) window.updateFirestoreStatus(idDoc, "BERHASIL", "Topup QRIS Otomatis", JSON.stringify(res));
                            
                            if(window.triggerDoniGuard) {
                                window.triggerDoniGuard({
                                    trx_id: 'QRIS-' + idDoc, action: 'topup', produk: 'TOPUP QRIS GOPAY (QIOSPAY)', nominal: parseInt(nominal), saldo_akhir_client: newSaldo
                                });
                            }
                            window.showNotice('success', 'Berhasil', 'Topup QRIS Rp ' + new Intl.NumberFormat('id-ID').format(nominal) + ' masuk!');
                            if(document.getElementById('statusQrisAuto')) {
                                document.getElementById('statusQrisAuto').innerHTML = '<i class="fas fa-check-circle"></i> Pembayaran Diterima!';
                                document.getElementById('statusQrisAuto').style.color = 'var(--success)';
                            }
                            setTimeout(() => {
                                localStorage.removeItem('pending_topup');
                                if(window.tutupModalTopup) window.tutupModalTopup();
                                if(window.bukaRiwayatArsip) window.bukaRiwayatArsip();
                            }, 2000);
                        }
                    }
                } catch(e) {}
            }, 10000);
        };
        
        
        window.cekStatusTopupBerkala = function(idDoc, uniqueCode) {
            if(!window.isTopupAuto) return; // Mode manual tidak mengecek API otomatis
        
            if(intervalCek[idDoc]) return;
            intervalCek[idDoc] = setInterval(async () => {
                try {
                    const req = await fetch('paydisini_cek.php', {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/json' },
                        body: JSON.stringify({ unique_code: uniqueCode })
                    });
                    const res = await req.json();
                    
                    if(res.success && res.data.status === "Success") {
                        clearInterval(intervalCek[idDoc]); 
                        delete intervalCek[idDoc];
        
                        // FIX DONIGUARD: Pastikan User Ada
                        const user = window.auth.currentUser;
                        if(user) {
                            // 1. Ambil Saldo Terakhir dari Firestore (Realtime)
                            const userRef = window.doc(window.db, "users", user.uid);
                            const userSnap = await window.getDoc(userRef);
                            const oldSaldo = userSnap.exists() ? (parseInt(userSnap.data().saldo) || 0) : 0;
                            const nominal = parseInt(res.data.balance); // FIX: Ambil dari balance (Net Settlement)
                            const newSaldo = oldSaldo + nominal;
        
                            // 2. Update Firestore (Client Side) DULUAN
                            // Kita update saldo di client agar sinkron saat DoniGuard mengecek
                            /* await window.updateDoc(userRef, { saldo: newSaldo }); // DIHAPUS DEMI KEAMANAN */
                            console.log('Pembayaran valid, menunggu cronjob/backend server memproses saldo...');
                            if(window.kirimNotifTelegram) window.kirimNotifTelegram('topup', { harga: nominal, username: userSnap.exists() ? (userSnap.data().username || 'User') : 'User', trx_id: uniqueCode });
                            window.updateFirestoreStatus(idDoc, "BERHASIL", "Topup Berhasil");
        
                            // 3. Lapor ke DoniGuard (Server Side)
                            // Kirim 'saldo_akhir_client' yang SUDAH DITAMBAH agar validasi server sukses
                            if(window.triggerDoniGuard) {
                                                                window.triggerDoniGuard({
                                    trx_id: uniqueCode,
                                    action: 'topup',
                                    produk: 'TOPUP PAYDISINI',
                                    nominal: nominal,
                                    saldo_akhir_client: newSaldo
                                });
                            }
                                                        window.showNotice('success', 'Topup Berhasil', 'Saldo Rp '+new Intl.NumberFormat('id-ID').format(nominal)+' Masuk.');
                            try {
                                const uName = userSnap.exists() ? (userSnap.data().username || 'User') : 'User';
                                const tgNow = new Date();
                                const tgDateStr = `${tgNow.getDate()} ${["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"][tgNow.getMonth()]} ${tgNow.getFullYear()} ${tgNow.getHours().toString().padStart(2,'0')}.${tgNow.getMinutes().toString().padStart(2,'0')}.${tgNow.getSeconds().toString().padStart(2,'0')}`;
                                const rawMsg = `✅ TOPUP BERHASIL\n\n👤 Username: ${uName}\n📧 Email: ${user.email}\n💰 Jumlah: Rp ${new Intl.NumberFormat('id-ID').format(nominal)}\n🆔 Trx ID: ${uniqueCode}\n🕒 Waktu: ${tgDateStr}\n\nBhuleEmarket Indonesia\nhttps://www.bhuleemarket.store\nDownload apk:\nhttps://www.bhuleemarket.store/BE.apk`;
                                const encodedMsg = encodeURIComponent(rawMsg);
                                /* PATCH DONI: fetch Telegram langsung dihapus. Notif topup berhasil sekarang lewat window.kirimNotifTelegram -> /bottele/telegram_api.php */
                            } catch(etg) { console.log('TeleErr', etg); }
                        }
                    } else if(res.success && (res.data.status === "Canceled" || res.data.status === "Expired")) {
                        clearInterval(intervalCek[idDoc]);
                        delete intervalCek[idDoc];
                        window.updateFirestoreStatus(idDoc, "GAGAL", "Pembayaran Expired/Batal");
                    }
                } catch(e) {} 
            }, 10000); 
        };
        
        console.log("System Cek Status Berhasil Dipulihkan");
    </script>

    <script>
        window.isModeMasal = false;
        
        window.toggleModeMasal = function() {
            window.isModeMasal = !window.isModeMasal;
            const btn = document.getElementById('btnModeMasal');
            const chkAreas = document.querySelectorAll('.area-chk-masal');
            const fab = document.getElementById('fabCetakMasal');
            
            if(window.isModeMasal) {
                // Mode Aktif
                btn.innerHTML = '<i class="fas fa-times"></i> Batalkan';
                btn.style.background = '#ff7675';
                btn.style.color = 'white';
                chkAreas.forEach(el => el.style.display = 'block');
                fab.style.display = 'block';
                document.getElementById('riwayat-container').style.paddingBottom = '120px';
            } else {
                // Mode Mati
                btn.innerHTML = '<i class="fas fa-print"></i> Cetak Masal';
                btn.style.background = '#e1effe';
                btn.style.color = 'black';
                chkAreas.forEach(el => el.style.display = 'none');
                fab.style.display = 'none';
                document.getElementById('riwayat-container').style.paddingBottom = '10px';
                
                // Reset Checklist
                document.querySelectorAll('.chk-masal').forEach(c => c.checked = false);
                updateButtonMasal();
            }
        };
        
        window.updateButtonMasal = function() {
            const checked = document.querySelectorAll('.chk-masal:checked').length;
            document.getElementById('countMasal').innerText = checked;
            const cntShare = document.getElementById('countMasalShare');
            if(cntShare) cntShare.innerText = checked;
        };
        
        window.prosesShareMasal = function() {
            window.isShareMode = true;
            window.prosesPrintMasal();
        };
        
        
        window.prosesPrintMasal = function() {
            const checkboxes = document.querySelectorAll('.chk-masal:checked');
            if(checkboxes.length === 0) return alert("Pilih minimal 1 transaksi!");
        
            let totalHarga = 0;
            let items = [];
            
            checkboxes.forEach(chk => {
                try {
                    const data = JSON.parse(decodeURIComponent(chk.value));
                    items.push(data);
                    totalHarga += parseInt(data.harga);
                } catch(e) {}
            });
        
            // Generate Struk Gabungan
            generateStrukMasal(items, totalHarga);
        };
        
        function generateStrukMasal(items, totalReal) {
            // Set Konteks Live Preview
            activePrintData = items;
            activePrintType = 'mass';
            const inputM = document.getElementById('inputLiveMarkup');
            if(inputM) inputM.value = printerSettings.markup;
        
            // Gunakan Setting Printer yang ada
            const markupPerItem = parseInt(printerSettings.markup) || 0;
            const width = printerSettings.paperSize === '58' ? 32 : 48;
            const line = '-'.repeat(width);
            const dateObj = new Date();
            const dateStr = dateObj.toLocaleDateString('id-ID');
            const timeStr = dateObj.toLocaleTimeString('id-ID').slice(0,5);
        
            // Helpers (Copy dari sistem printer utama)
            const center = (txt) => {
                if(!txt) return '';
                txt = txt.toString();
                
                // FIX: Support Multi-line Center (Split per enter)
                const lines = txt.split('\n');
                let globalOutput = '';
        
                lines.forEach(lineTxt => {
                    let remaining = lineTxt;
                    while (remaining.length > 0) {
                        let chunk = remaining.substring(0, width);
                        remaining = remaining.substring(width);
                        const spaces = Math.max(0, Math.floor((width - chunk.length) / 2));
                        globalOutput += ' '.repeat(spaces) + chunk + '\n';
                    }
                    // Jika baris kosong (hanya enter), tetap tambahkan enter
                    if(lineTxt === '') globalOutput += '\n';
                });
                
                // Hapus enter terakhir yang berlebih
                return globalOutput.replace(/\n$/, '');
            };
        
            const leftRight = (left, right) => {
                left = left.toString(); right = right.toString();
                let output = '';
                const maxLeftLen = width - right.length - 1;
                let remaining = left;
                while (remaining.length > 0) {
                    if (remaining.length <= maxLeftLen) {
                        const spaces = width - remaining.length - right.length;
                        output += remaining + ' '.repeat(spaces) + right;
                        remaining = '';
                    } else {
                        const chunk = remaining.substring(0, maxLeftLen);
                        output += chunk + '\n'; 
                        remaining = remaining.substring(maxLeftLen);
                    }
                }
                return output;
            };
        
            // MULAI SUSUN STRUK
            let receipt = '';
            receipt += center(printerSettings.storeName.toUpperCase()) + '\n';
            if(printerSettings.address) receipt += center(printerSettings.address) + '\n';
            receipt += line + '\n';
            receipt += center("STRUK REKAPITULASI") + '\n';
            receipt += center(`${dateStr} ${timeStr}`) + '\n';
            receipt += line + '\n';
        
            let totalTagihan = 0;
        
                        items.forEach((item, index) => {
                let rawItem = parseInt(item.harga) + markupPerItem;
                // PEMBULATAN PINTAR (Kelipatan 500 ke atas)
                let hargaItem = Math.ceil(rawItem / 500) * 500;
                totalTagihan += hargaItem;
                
                receipt += `${index+1}. ${item.produk}\n`;
                receipt += leftRight(item.tujuan, 'Rp '+new Intl.NumberFormat('id-ID').format(hargaItem)) + '\n';
            });
        
            receipt += line + '\n';
            receipt += leftRight(`TOTAL (${items.length} Trx)`, 'Rp '+new Intl.NumberFormat('id-ID').format(totalTagihan)) + '\n';
            receipt += line + '\n';
            
            if(printerSettings.footer) receipt += center(printerSettings.footer) + '\n';
            receipt += center('Dicetak Secara Masal') + '\n\n\n';
        
            // Set ke Global & Tampilkan Preview
            currentReceiptData = receipt;
            const previewArea = document.getElementById('printPreviewArea');
            previewArea.innerText = receipt;
            
            // Styling Preview
            Object.assign(previewArea.style, {
                fontFamily: '"Courier New", Courier, monospace',
                whiteSpace: 'pre',
                overflowX: 'auto',
                fontSize: '12px',
                lineHeight: '1.2',
                color: '#000',
                textAlign: 'left'
            });
        
            document.getElementById('modalPrintPreview').style.display = 'flex';
            updatePrintButtonState();
        }
    </script>
    <script>
        // CACHE WARMER SYSTEM (Memastikan icon tersimpan di memory browser)
        (function() {
            const icons = [
                "icons/Pulsa.png", "icons/E-Wallet.png", "icons/Games.png", 
                "icons/Token PLN.png", "icons/Telkomsel.png", "icons/Indosat.png", 
                "icons/By.U.png", "https://cdn-icons-png.flaticon.com/512/2554/2554978.png"
            ];
            icons.forEach(src => { const i = new Image(); i.src = src; });
        })();
    </script>

    <div id="modalMyQR" class="modal" style="z-index: 24000; align-items: center; justify-content: center;">
        <div class="notice-content" style="text-align: center;">
            <h3 style="margin-bottom:10px; color:var(--primary);">QR Akun Saya</h3>
            <p style="font-size:12px; color:#666; margin-bottom:15px;">Tunjukkan QR ini untuk menerima saldo</p>
            <img id="myQrImage" src="" style="width:200px; height:200px; border-radius:10px; margin:0 auto; display:block; box-shadow:0 4px 10px rgba(0,0,0,0.1);">
            <div id="myQrInfo" style="margin-top:15px; font-weight:bold; font-size:14px; color:#333;"></div>
            <button class="btn-konfirmasi" style="margin-top:20px; width:100%;" onclick="document.getElementById('modalMyQR').style.display='none'">TUTUP</button>
        </div>
    </div>

    <div id="modalQRScanner" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:black; z-index:99999; flex-direction:column;">
        <div style="padding:15px; display:flex; justify-content:space-between; align-items:center; background:rgba(0,0,0,0.5); color:white; position:absolute; top:0; width:100%; z-index:2; box-sizing:border-box;">
            <div style="font-weight:bold; font-size:16px;">Scan QR Transfer</div>
            <i class="fas fa-times" onclick="closeQRScanner()" style="font-size:24px; cursor:pointer;"></i>
        </div>
        <div id="qr-reader" style="width:100%; height:100vh; display:flex; align-items:center; justify-content:center;"></div>
    </div>

    <div id="qrisFullscreen" class="qris-overlay">
        <div class="qris-close" onclick="document.getElementById('qrisFullscreen').style.display='none'"><i class="fas fa-times"></i></div>
        <img id="qrisImageFull" src="icons/qris.jpg">
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const maskText = (text) => text.replace(/(ICS|KF|REF|MRF|KJ)-/g, '***-').replace(/\b(KHFY|ICS|KAJE|MRF)\b/gi, 'Paket');
            const walkDOM = (node) => {
                if (node.nodeType === 3) {
                    if (/(ICS|KF|REF|MRF|KJ)-|\b(KHFY|ICS|KAJE|MRF)\b/i.test(node.nodeValue)) {
                        node.nodeValue = maskText(node.nodeValue);
                    }
                } else if (node.nodeType === 1 && !['SCRIPT', 'STYLE', 'INPUT', 'TEXTAREA'].includes(node.nodeName)) {
                    node.childNodes.forEach(walkDOM);
                }
            };
            walkDOM(document.body);
            const observer = new MutationObserver((mutations) => {
                mutations.forEach((m) => {
                    if (m.type === 'childList') {
                        m.addedNodes.forEach((n) => { if (n.nodeType === 1 || n.nodeType === 3) walkDOM(n); });
                    } else if (m.type === 'characterData') {
                        if (/(ICS|KF|REF|MRF|KJ)-|\b(KHFY|ICS|KAJE|MRF)\b/i.test(m.target.nodeValue)) {
                            m.target.nodeValue = maskText(m.target.nodeValue);
                        }
                    }
                });
            });
            observer.observe(document.body, { childList: true, subtree: true, characterData: true });
        });
    </script>

    <script>
        // BACK BUTTON HANDLER UNTUK SMARTPHONE
        window.addEventListener('load', function() {
            history.pushState(null, null, location.href);
            window.onpopstate = function() {
                let modalTertutup = false;
                
                // 1. Tutup modal yang terbuka (Pilihan Produk, Invoice, Detail, dll)
                const modals = document.querySelectorAll('.modal');
                modals.forEach(m => {
                    if (window.getComputedStyle(m).display !== 'none') {
                        m.style.display = 'none';
                        modalTertutup = true;
                    }
                });
        
                // 2. Jika ada elemen fullscreen lain yang terbuka (seperti QRIS)
                const qris = document.getElementById('qrisFullscreen');
                if(qris && window.getComputedStyle(qris).display !== 'none') {
                    qris.style.display = 'none';
                    modalTertutup = true;
                }
        
                // 3. Logika Navigasi
                if (!modalTertutup) {
                    let diHalamanLain = false;
                    const pages = document.querySelectorAll('.full-page');
                    pages.forEach(p => {
                        if (window.getComputedStyle(p).display !== 'none') {
                            diHalamanLain = true;
                        }
                    });
        
                    if (diHalamanLain) {
                        // Sedang di halaman Profil/Keranjang/dll -> Kembali ke Home
                        if(window.navSwitch) window.navSwitch('home', document.querySelectorAll('.nav-item')[0]);
                        history.pushState(null, null, location.href);
                    } else {
                        // Sudah di Home dan tidak ada modal -> Izinkan keluar/tutup browser
                        history.back();
                    }
                } else {
                    // Jika tadi menutup modal, tahan tombol back lagi
                    history.pushState(null, null, location.href);
                }
            };
        });
    </script>

    <script>
        let html5QrCode;
        
        window.showMyQR = async function() {
            const user = window.auth.currentUser;
            if(!user) return alert('Silakan login!');
            
            try {
                const uSnap = await window.getDoc(window.doc(window.db, "users", user.uid));
                const data = uSnap.data();
                const info = data.email || data.username; // QR value prioritizes email
                
                document.getElementById('myQrImage').src = "https://quickchart.io/qr?text=" + encodeURIComponent(info) + "&size=300&ecLevel=M&margin=2";
                document.getElementById('myQrInfo').innerText = data.username || data.nama || info;
                document.getElementById('modalMyQR').style.display = 'flex';
            } catch(e) {
                console.error("Gagal load QR", e);
            }
        };
        
        window.openQRScanner = function() {
            document.getElementById('modalQRScanner').style.display = 'flex';
            if (!html5QrCode) {
                html5QrCode = new Html5Qrcode("qr-reader");
            }
            
            if (!html5QrCode.isScanning) {
                const config = { fps: 10, qrbox: { width: 250, height: 250 } };
                const onSuccess = (decodedText) => {
                    closeQRScanner();
                    bukaModalTransfer('kirim');
                    
                    const targetInput = document.getElementById('transferTarget');
                    if (targetInput) {
                        targetInput.value = decodedText;
                        targetInput.readOnly = true;
                        targetInput.style.backgroundColor = "#e1effe";
                        
                        setTimeout(() => {
                            document.getElementById('transferNominal').focus();
                        }, 500);
                    }
                };
        
                html5QrCode.start({ facingMode: "environment" }, config, onSuccess, () => {})
                .catch((err) => {
                    console.log("Mencoba kamera alternatif...");
                    html5QrCode.start({ facingMode: "user" }, config, onSuccess, () => {})
                    .catch((err2) => {
                        document.getElementById('qr-reader').innerHTML = "<div style='color:red; padding:20px; text-align:center; background:white; border-radius:10px;'>Gagal akses kamera.<br>Pastikan izin aplikasi diberikan di Pengaturan HP.</div>";
                    });
                });
            }
        };
        
        window.closeQRScanner = function() {
            document.getElementById('modalQRScanner').style.display = 'none';
            if (html5QrCode && html5QrCode.isScanning) {
                html5QrCode.stop().then(() => {
                    html5QrCode.clear();
                }).catch(err => console.error(err));
            }
        };
    </script>

    <script>
        // PATCH DONI: Running Text dari public_html/runingtex/apiruning.php tanpa Firebase
        (function() {
            const RUNNING_TEXT_API = 'runingtex/apiruning.php';
            const defaultRunningText = {
                aktif: false,
                text1: 'Selamat datang di BhuleEmarket',
                text2: '',
                baris: 1,
                model: 'biasa',
                warnaText: '#ffffff',
                warnaPelangi: false,
                backgroundTransparan: false,
                warnaBackground: '#0f172a',
                animasi: 'left',
                kecepatan: 14,
                jeda: 1
            };
        
            function safeRunningTextValue(value, fallback) {
                return (value === undefined || value === null || value === '') ? fallback : value;
            }
        
            function normalizeRunningTextConfig(raw) {
                const cfg = Object.assign({}, defaultRunningText, raw || {});
                cfg.aktif = cfg.aktif === true || cfg.aktif === 'true' || cfg.aktif === 1 || cfg.aktif === '1';
                cfg.baris = String(cfg.baris) === '2' ? 2 : 1;
                const rawModel = String(safeRunningTextValue(cfg.model, 'biasa')).toLowerCase();
                cfg.model = ['rgb', 'rgb-led', 'rgbdot', 'dotmatrix', 'matrix', 'rgbmatrix', 'rgn'].includes(rawModel)
                    ? 'rgb'
                    : (['led', 'dot', 'dotled', 'titik', 'titik-led'].includes(rawModel) ? 'led' : 'biasa');
                cfg.animasi = String(safeRunningTextValue(cfg.animasi, 'left')).toLowerCase();
                cfg.warnaText = safeRunningTextValue(cfg.warnaText, '#ffffff');
                cfg.warnaBackground = safeRunningTextValue(cfg.warnaBackground, '#0f172a');
                const rainbowValue = cfg.warnaPelangi ?? cfg.warna_text_pelangi ?? cfg.rainbow ?? cfg.pelangi ?? cfg.textPelangi;
                cfg.warnaPelangi = rainbowValue === true || rainbowValue === 'true' || rainbowValue === 1 || rainbowValue === '1' || rainbowValue === 'ya' || rainbowValue === 'on';
                cfg.backgroundTransparan = cfg.backgroundTransparan === true || cfg.backgroundTransparan === 'true' || cfg.backgroundTransparan === 1 || cfg.backgroundTransparan === '1';
                cfg.kecepatan = Math.max(3, Math.min(60, parseFloat(cfg.kecepatan) || 14));
                cfg.jeda = Math.max(0, Math.min(20, parseFloat(cfg.jeda) || 1));
                cfg.text1 = String(safeRunningTextValue(cfg.text1 || cfg.isiText || cfg.text, defaultRunningText.text1));
                cfg.text2 = String(safeRunningTextValue(cfg.text2, ''));
                return cfg;
            }
        
            function applyRunningText(cfg) {
                const wrap = document.getElementById('runningTextWrap');
                const box = document.getElementById('runningTextBox');
                const content = document.getElementById('runningTextContent');
                const line1 = document.getElementById('runningTextLine1');
                const line2 = document.getElementById('runningTextLine2');
                if (!wrap || !box || !content || !line1 || !line2) return;
        
                if (!cfg.aktif || (!cfg.text1.trim() && !cfg.text2.trim())) {
                    wrap.classList.remove('rt-show');
                    return;
                }
        
                line1.textContent = cfg.text1;
                line2.textContent = cfg.text2;
                line2.style.display = (cfg.baris === 2 && cfg.text2.trim()) ? 'block' : 'none';
        
                box.className = 'running-text-box';
                box.classList.add(cfg.baris === 2 && cfg.text2.trim() ? 'rt-two-lines' : 'rt-one-line');
                box.classList.add(cfg.model === 'rgb' ? 'rt-rgb' : (cfg.model === 'led' ? 'rt-led' : 'rt-biasa'));
                box.classList.add(cfg.warnaPelangi ? 'rt-rainbow' : 'rt-color-normal');
                if (cfg.backgroundTransparan) box.classList.add('rt-transparent');
        
                const allowedAnim = ['left', 'right', 'bounce', 'blink', 'wave', 'bus', 'neon', 'fade'];
                const anim = allowedAnim.includes(cfg.animasi) ? cfg.animasi : 'left';
                box.classList.add('rt-anim-' + anim);
                box.style.setProperty('--rt-speed', cfg.kecepatan + 's');
                box.style.setProperty('--rt-delay', cfg.jeda + 's');
                box.style.setProperty('--rt-color', cfg.warnaText);
                box.style.setProperty('--rt-bg', cfg.backgroundTransparan ? 'transparent' : cfg.warnaBackground);
        
                content.style.removeProperty('animation');
                content.classList.remove('rt-animation-refresh');
                content.querySelectorAll('.running-text-line').forEach(function(el) { el.style.animation = 'none'; });
                requestAnimationFrame(() => {
                    content.classList.add('rt-animation-refresh');
                    content.querySelectorAll('.running-text-line').forEach(function(el) { el.style.animation = ''; });
                });
                wrap.classList.add('rt-show');
            }
        
            async function loadRunningText() {
                try {
                    const res = await fetch(RUNNING_TEXT_API + '?action=get&_=' + Date.now(), { cache: 'no-store' });
                    const data = await res.json();
                    const config = data && data.success !== false ? (data.data || data.setting || data) : defaultRunningText;
                    applyRunningText(normalizeRunningTextConfig(config));
                } catch (err) {
                    console.warn('Running text tidak dapat dimuat:', err);
                    applyRunningText(normalizeRunningTextConfig(defaultRunningText));
                }
            }
        
            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', loadRunningText);
            } else {
                loadRunningText();
            }
        })();
    </script>

    <script>
        // SCRIPT REFRESH CACHE PWA BHULEEMARKET
        // Tujuan: memaksa browser membaca manifest dan icon terbaru.
        const BE_PWA_VERSION = 'be3';
        
        if ('serviceWorker' in navigator) {
            navigator.serviceWorker.getRegistrations().then(function(registrations) {
                registrations.forEach(function(registration) {
                    registration.unregister().then(function() {
                        console.log('Service worker lama berhasil dimatikan untuk update logo PWA.');
                    });
                });
            });
        }
        
        if ('caches' in window) {
            caches.keys().then(function(names) {
                names.forEach(function(name) {
                    caches.delete(name);
                });
            });
        }
        
        window.addEventListener('load', function() {
            const manifestLink = document.querySelector('link[rel="manifest"]');
            if (manifestLink) {
                manifestLink.setAttribute('href', '/manifest.json?v=' + BE_PWA_VERSION + '&t=' + Date.now());
            }
        
            const appleIcon = document.querySelector('link[rel="apple-touch-icon"]');
            if (appleIcon) {
                appleIcon.setAttribute('href', '/icon-192.png?v=' + BE_PWA_VERSION + '&t=' + Date.now());
            }
        
            const icon192 = document.querySelector('link[rel="icon"][sizes="192x192"]');
            if (icon192) {
                icon192.setAttribute('href', '/icon-192.png?v=' + BE_PWA_VERSION + '&t=' + Date.now());
            }
        
            const icon512 = document.querySelector('link[rel="icon"][sizes="512x512"]');
            if (icon512) {
                icon512.setAttribute('href', '/icon-512.png?v=' + BE_PWA_VERSION + '&t=' + Date.now());
            }
        });
    </script>

</body>

</html>