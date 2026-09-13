<?php
// =====================================================================
//  BekasiAC — Panel Admin
//  Deploy: upload file ini ke public_html/paneladmin.php
//  API gambar: public_html/api/api.php  |  Folder: public_html/image/
// =====================================================================
?><!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
<meta name="theme-color" content="#0A2540">
<title>BekasiAC — Panel Admin</title>
<link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90'>❄️</text></svg>">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
<style>
:root{
  --navy:#0A2540; --ink:#0F172A; --brand:#0284C7; --sky:#0EA5E9;
  --green:#10B981; --amber:#F59E0B; --red:#EF4444; --violet:#8B5CF6;
  --bg:#EEF2F7; --card:#fff; --muted:#64748B; --line:#E2E8F0;
  --r:16px; --sh:0 10px 30px rgba(10,37,64,.1);
  --font:'Plus Jakarta Sans',system-ui,sans-serif;
}
*{box-sizing:border-box;margin:0;padding:0;-webkit-tap-highlight-color:transparent}
body{font-family:var(--font);background:var(--bg);color:var(--ink);font-size:14px;height:100vh;overflow:hidden}
button,input,select,textarea{font-family:inherit}
/* splash */
#splash{position:fixed;inset:0;background:linear-gradient(160deg,#071A33,#0A2540 60%,#0C4A6E);z-index:9999;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:14px;transition:opacity .5s}
#splash .lg{font-size:64px;animation:pl 1.6s infinite}
@keyframes pl{50%{transform:scale(1.12)}}
#splash h2{color:#fff;letter-spacing:2px;font-weight:800}
#splash p{color:#7DD3FC;font-size:11px;font-weight:700;letter-spacing:3px}
/* toast */
#toast{position:fixed;top:16px;right:16px;left:16px;background:#0A2540;color:#fff;padding:14px 18px;border-radius:14px;font-size:13px;font-weight:700;z-index:9000;display:none;box-shadow:var(--sh);animation:tin .3s}
@media(min-width:700px){#toast{left:auto;min-width:320px;max-width:420px}}
@keyframes tin{from{transform:translateY(-16px);opacity:0}}
/* login */
#loginWrap{position:fixed;inset:0;z-index:8000;background:radial-gradient(800px 400px at 80% 0%,#1D4ED8 0%,transparent 60%),linear-gradient(160deg,#071A33,#0A2540 60%,#0C4A6E);display:flex;align-items:center;justify-content:center;padding:20px}
.login-card{background:#fff;border-radius:26px;padding:34px 28px;width:100%;max-width:400px;box-shadow:0 30px 80px rgba(0,0,0,.4);text-align:center}
.login-card .mark{width:66px;height:66px;border-radius:20px;background:linear-gradient(135deg,#0EA5E9,#2563EB);font-size:34px;display:flex;align-items:center;justify-content:center;margin:0 auto 14px;box-shadow:0 10px 26px rgba(37,99,235,.4)}
.login-card h1{font-size:22px;letter-spacing:-.5px}
.login-card p{font-size:12.5px;color:var(--muted);margin:6px 0 20px}
.f-group{margin-bottom:12px;text-align:left}
.f-group label{display:block;font-size:12px;font-weight:800;margin-bottom:6px;color:#334155}
.f-group input,.f-group select,.f-group textarea{width:100%;padding:13px 14px;border:1.5px solid var(--line);border-radius:13px;font-size:13.5px;outline:none;background:#F8FAFC}
.f-group input:focus,.f-group select:focus,.f-group textarea:focus{border-color:var(--sky);background:#fff;box-shadow:0 0 0 4px rgba(14,165,233,.12)}
.btn{display:inline-flex;align-items:center;justify-content:center;gap:8px;border:none;cursor:pointer;font-weight:800;border-radius:13px;transition:.2s;font-size:13px;padding:12px 18px}
.btn-block{width:100%;padding:15px;font-size:14px}
.btn-p{background:linear-gradient(90deg,#0EA5E9,#2563EB);color:#fff}
.btn-g{background:linear-gradient(90deg,#10B981,#059669);color:#fff}
.btn-d{background:#FEE2E2;color:#B91C1C}.btn-d:hover{background:#FECACA}
.btn-navy{background:var(--navy);color:#fff}
.btn-light{background:#F1F5F9;color:#475569}
.btn-wa{background:#22C55E;color:#fff}
/* layout */
#layout{display:none;height:100vh}
#layout.on{display:flex}
.sidebar{width:264px;background:linear-gradient(180deg,#071A33,#0A2540 70%,#0B2F55);color:#CBD5E1;display:flex;flex-direction:column;flex-shrink:0;z-index:600}
.sb-head{padding:22px 20px 16px;display:flex;align-items:center;gap:11px;border-bottom:1px solid rgba(255,255,255,.08)}
.sb-mark{width:42px;height:42px;border-radius:14px;background:linear-gradient(135deg,#0EA5E9,#2563EB);display:flex;align-items:center;justify-content:center;font-size:22px;flex-shrink:0}
.sb-head b{color:#fff;font-size:16px;display:block;letter-spacing:-.3px}
.sb-head small{font-size:10px;color:#7DD3FC;font-weight:700;letter-spacing:1.5px}
.sb-x{display:none;margin-left:auto;background:none;border:none;color:#fff;font-size:22px;cursor:pointer}
.sb-nav{flex:1;overflow-y:auto;padding:14px 12px;display:flex;flex-direction:column;gap:4px}
.sb-label{font-size:10px;font-weight:800;letter-spacing:1.5px;color:#475569;padding:12px 12px 6px}
.sb-item{display:flex;align-items:center;gap:12px;padding:12px 14px;border-radius:13px;cursor:pointer;font-size:13.5px;font-weight:700;transition:.2s;border:1px solid transparent;color:#94A3B8}
.sb-item:hover{background:rgba(255,255,255,.06);color:#fff}
.sb-item.on{background:linear-gradient(90deg,rgba(14,165,233,.25),rgba(14,165,233,.05));color:#fff;border-color:rgba(14,165,233,.3)}
.sb-item .ic{font-size:18px;width:26px;text-align:center}
.badge{margin-left:auto;background:var(--red);color:#fff;font-size:10.5px;font-weight:800;padding:2px 9px;border-radius:99px;display:none}
.sb-foot{padding:14px;border-top:1px solid rgba(255,255,255,.08)}
.logout{width:100%;background:rgba(239,68,68,.12);border:1px solid rgba(239,68,68,.3);color:#FCA5A5;padding:13px;border-radius:13px;font-weight:800;cursor:pointer;font-size:13px}
.logout:hover{background:var(--red);color:#fff}
.main{flex:1;display:flex;flex-direction:column;min-width:0}
.topbar{background:rgba(255,255,255,.9);backdrop-filter:blur(12px);border-bottom:1px solid var(--line);padding:12px 16px;display:flex;align-items:center;gap:10px;position:sticky;top:0;z-index:500}
@media(min-width:900px){.topbar{padding:14px 28px}}
.burger{display:flex;width:42px;height:42px;border:1.5px solid var(--line);background:#fff;border-radius:12px;align-items:center;justify-content:center;font-size:19px;cursor:pointer}
@media(min-width:1100px){.burger{display:none}}
.topbar h2{font-size:16px;font-weight:800;letter-spacing:-.3px}
@media(min-width:900px){.topbar h2{font-size:19px}}
.top-right{margin-left:auto;display:flex;align-items:center;gap:8px}
.pill-user{background:#F1F5F9;border:1px solid var(--line);padding:8px 14px;border-radius:99px;font-size:11.5px;font-weight:700;color:#475569;max-width:200px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap}
@media(max-width:640px){.pill-user{display:none}}
.icon-btn{width:42px;height:42px;border-radius:12px;border:1.5px solid var(--line);background:#fff;cursor:pointer;font-size:18px;display:flex;align-items:center;justify-content:center}
.content{flex:1;overflow-y:auto;padding:16px;-webkit-overflow-scrolling:touch}
@media(min-width:900px){.content{padding:26px 28px}}
.page{display:none;animation:fin .3s}
.page.on{display:block}
@keyframes fin{from{opacity:0;transform:translateY(8px)}}
/* cards & widgets */
.welcome{background:linear-gradient(135deg,#0A2540,#0C4A6E 60%,#0369A1);border-radius:22px;color:#fff;padding:24px 20px;display:grid;gap:16px;margin-bottom:18px;position:relative;overflow:hidden;box-shadow:var(--sh)}
@media(min-width:800px){.welcome{grid-template-columns:1fr auto;align-items:center;padding:30px 32px}}
.welcome::after{content:'';position:absolute;width:300px;height:300px;background:rgba(14,165,233,.2);border-radius:50%;right:-90px;top:-90px;filter:blur(20px)}
.welcome h1{font-size:20px;letter-spacing:-.5px;position:relative;z-index:2}
@media(min-width:800px){.welcome h1{font-size:26px}}
.welcome p{font-size:12.5px;color:#BAE6FD;margin-top:6px;display:flex;align-items:center;gap:8px;position:relative;z-index:2}
.dot{width:9px;height:9px;border-radius:50%;background:#4ADE80;box-shadow:0 0 12px #4ADE80;animation:pl 2s infinite}
.clock{background:rgba(255,255,255,.08);border:1px solid rgba(255,255,255,.15);border-radius:16px;padding:14px 22px;text-align:center;position:relative;z-index:2;backdrop-filter:blur(6px)}
.clock b{font-size:26px;letter-spacing:1px;color:#7DD3FC;display:block}
.clock small{font-size:10.5px;color:#BAE6FD;font-weight:700;text-transform:uppercase}
.stats{display:grid;grid-template-columns:repeat(2,1fr);gap:12px;margin-bottom:18px}
@media(min-width:800px){.stats{grid-template-columns:repeat(4,1fr);gap:16px}}
.stat{background:#fff;border:1px solid var(--line);border-radius:18px;padding:18px 16px;box-shadow:0 2px 10px rgba(10,37,64,.05);position:relative;overflow:hidden}
.stat::before{content:'';position:absolute;left:0;top:0;bottom:0;width:5px}
.stat small{font-size:10.5px;font-weight:800;color:var(--muted);text-transform:uppercase;letter-spacing:.5px}
.stat b{font-size:24px;display:block;margin-top:4px;letter-spacing:-.5px}
.stat .sub{font-size:11px;color:var(--muted);margin-top:2px}
.grid2{display:grid;gap:14px;margin-bottom:18px}
@media(min-width:1000px){.grid2{grid-template-columns:1.4fr 1fr;gap:16px}}
.card{background:#fff;border:1px solid var(--line);border-radius:18px;padding:18px;box-shadow:0 2px 10px rgba(10,37,64,.05);margin-bottom:14px}
@media(min-width:800px){.card{padding:22px}}
.card-h{display:flex;justify-content:space-between;align-items:center;gap:10px;margin-bottom:14px;flex-wrap:wrap}
.card-h h3{font-size:15px;font-weight:800}
.card-h p{font-size:12px;color:var(--muted)}
.tools{display:flex;gap:8px;flex-wrap:wrap}
.search{padding:11px 14px;border:1.5px solid var(--line);border-radius:12px;font-size:13px;outline:none;background:#F8FAFC;min-width:160px}
.search:focus{border-color:var(--sky);background:#fff}
.chips{display:flex;gap:7px;flex-wrap:wrap;margin-bottom:12px}
.chip{border:1.5px solid var(--line);background:#F8FAFC;padding:8px 15px;border-radius:99px;font-size:12px;font-weight:700;cursor:pointer;color:#475569}
.chip.on{background:var(--navy);color:#fff;border-color:var(--navy)}
/* tabel -> kartu di HP */
.tbl-wrap{overflow-x:auto;border:1px solid var(--line);border-radius:14px}
table{width:100%;border-collapse:collapse;font-size:13px;min-width:640px}
th,td{padding:12px 14px;text-align:left;border-bottom:1px solid var(--line);vertical-align:top}
th{background:#F8FAFC;font-size:10.5px;text-transform:uppercase;letter-spacing:.5px;color:var(--muted)}
tr:last-child td{border:none}
@media(max-width:760px){
  .tbl-wrap{border:none;overflow:visible}
  table,thead,tbody,tr,th,td{display:block;width:100%;min-width:0}
  thead{display:none}
  tbody tr{background:#fff;border:1px solid var(--line);border-radius:16px;padding:16px;margin-bottom:12px;box-shadow:0 2px 10px rgba(10,37,64,.05)}
  tbody td{border:none!important;padding:7px 0!important}
  tbody td::before{content:attr(data-l);display:block;font-size:10px;font-weight:800;color:var(--muted);text-transform:uppercase;letter-spacing:.5px;margin-bottom:2px}
  tbody td.no-l::before{display:none}
}
.st-sel{padding:9px 12px;border-radius:10px;font-size:12px;font-weight:800;border:1.5px solid var(--line);cursor:pointer;width:100%}
.st-Dipesan{background:#FEF9C3;border-color:#FDE047;color:#854D0E}
.st-DiTerima{background:#DCFCE7;border-color:#86EFAC;color:#15803D}
.st-DiTolak{background:#FEE2E2;border-color:#FCA5A5;color:#B91C1C}
.btn-xs{padding:9px 13px;font-size:11.5px;border-radius:10px;margin:2px 2px 2px 0}
/* katalog grid */
.kat-grid{display:grid;gap:12px;grid-template-columns:1fr}
@media(min-width:700px){.kat-grid{grid-template-columns:repeat(2,1fr)}}
@media(min-width:1200px){.kat-grid{grid-template-columns:repeat(3,1fr)}}
.kat{background:#fff;border:1.5px solid var(--line);border-radius:16px;overflow:hidden;transition:.2s}
.kat:hover{box-shadow:var(--sh);border-color:#7DD3FC}
.kat img{width:100%;height:150px;object-fit:cover;background:#F1F5F9}
.kat-ph{height:150px;display:flex;align-items:center;justify-content:center;font-size:52px;background:linear-gradient(135deg,#F0F9FF,#E0F2FE)}
.kat-b{padding:14px}
.kat-b b{font-size:13.5px;display:block;line-height:1.4}
.kat-b small{font-size:11.5px;color:var(--muted)}
.kat-cat{display:inline-block;font-size:10px;font-weight:800;padding:3px 10px;border-radius:99px;background:#F0F9FF;color:#0369A1;margin-bottom:8px}
.kat-price{color:var(--brand);font-weight:800;font-size:15px;margin:8px 0}
/* galeri grid */
.gal-grid{display:grid;grid-template-columns:repeat(2,1fr);gap:12px}
@media(min-width:800px){.gal-grid{grid-template-columns:repeat(4,1fr)}}
.gal{border-radius:16px;overflow:hidden;border:1.5px solid var(--line);background:#fff;position:relative}
.gal img{width:100%;height:140px;object-fit:cover;display:block}
@media(min-width:800px){.gal img{height:170px}}
.gal-cap{padding:10px 12px;font-size:12px;font-weight:700}
.gal-del{position:absolute;top:8px;right:8px;background:rgba(239,68,68,.92);color:#fff;border:none;width:32px;height:32px;border-radius:10px;cursor:pointer;font-size:14px}
/* modal */
.modal{display:none;position:fixed;inset:0;z-index:1000;background:rgba(7,26,51,.65);backdrop-filter:blur(5px);align-items:flex-end;justify-content:center}
.modal.open{display:flex}
@media(min-width:700px){.modal{align-items:center;padding:20px}}
.m-card{background:#fff;width:100%;max-width:520px;max-height:92vh;overflow-y:auto;border-radius:24px 24px 0 0;padding:24px 20px 30px;position:relative;animation:sheetUp .3s}
@media(min-width:700px){.m-card{border-radius:22px;padding:28px}}
@keyframes sheetUp{from{transform:translateY(50px);opacity:0}}
.grab{width:44px;height:5px;background:#E2E8F0;border-radius:99px;margin:0 auto 16px}
@media(min-width:700px){.grab{display:none}}
.m-x{position:absolute;top:16px;right:16px;width:34px;height:34px;border-radius:50%;background:#F1F5F9;border:none;cursor:pointer;font-size:16px;color:#64748B}
.m-card h3{font-size:17px;font-weight:800;margin-bottom:4px;padding-right:40px}
.m-sub{font-size:12px;color:var(--muted);margin-bottom:16px}
.img-prev{width:100%;height:170px;object-fit:cover;border-radius:14px;border:1.5px dashed #CBD5E1;background:#F8FAFC;margin-top:8px;display:none}
.drop{border:2px dashed #CBD5E1;border-radius:14px;padding:20px;text-align:center;background:#F8FAFC;cursor:pointer;transition:.2s}
.drop:hover,.drop.over{border-color:var(--sky);background:#F0F9FF}
.kv{background:#F8FAFC;border:1px solid var(--line);border-radius:12px;padding:12px 14px;font-size:12.5px;margin-bottom:10px}
.kv .r{display:flex;justify-content:space-between;gap:10px;padding:6px 0;border-bottom:1px dashed #E2E8F0}
.kv .r:last-child{border:none}
.kv .k{color:var(--muted)}.kv .v{font-weight:700;text-align:right}
/* confirm */
#confirmBox .m-card{max-width:360px;text-align:center}
/* bottom nav admin (HP) */
.bnav{display:grid;grid-template-columns:repeat(5,1fr);position:fixed;bottom:0;left:0;right:0;z-index:550;background:rgba(255,255,255,.95);backdrop-filter:blur(12px);border-top:1px solid var(--line);padding:8px 4px calc(8px + env(safe-area-inset-bottom))}
@media(min-width:1100px){.bnav{display:none}}
.bn{display:flex;flex-direction:column;align-items:center;gap:2px;background:none;border:none;font-size:9.5px;font-weight:800;color:#94A3B8;cursor:pointer;padding:6px 2px;border-radius:10px;position:relative}
.bn .i{font-size:20px}
.bn.on{color:var(--brand)}
.bn .bdot{position:absolute;top:2px;right:calc(50% - 18px);background:var(--red);color:#fff;font-size:9px;min-width:17px;height:17px;border-radius:99px;display:none;align-items:center;justify-content:center;font-weight:800}
@media(max-width:1099px){.content{padding-bottom:90px}
  .sidebar{position:fixed;top:0;left:0;bottom:0;transform:translateX(-105%);transition:.3s;box-shadow:20px 0 60px rgba(0,0,0,.3)}
  .sidebar.open{transform:none}
  .sb-x{display:block}
  #sbOverlay{display:none;position:fixed;inset:0;background:rgba(0,0,0,.5);z-index:590}
  #sbOverlay.on{display:block}
}
canvas.chartbox{max-height:260px}
.rev-card{background:#F8FAFC;border:1.5px solid var(--line);border-radius:14px;padding:14px;margin-bottom:10px}
.rev-card .stars{color:#F59E0B;font-size:13px;letter-spacing:1px}
.quick{display:grid;grid-template-columns:repeat(2,1fr);gap:10px}
@media(min-width:700px){.quick{grid-template-columns:repeat(4,1fr)}}
.quick button{background:#F8FAFC;border:1.5px solid var(--line);border-radius:14px;padding:16px 10px;font-weight:800;font-size:12.5px;cursor:pointer;transition:.2s}
.quick button:hover{border-color:var(--sky);background:#F0F9FF;transform:translateY(-2px)}
.quick span{font-size:24px;display:block;margin-bottom:6px}
.hide{display:none!important}
</style>
</head>
<body oncontextmenu="return false">

<div id="splash"><div class="lg">❄️</div><h2>BEKASIAC</h2><p>SECURE ADMIN PANEL</p></div>
<div id="toast"></div>

<!-- LOGIN -->
<div id="loginWrap" style="display:none">
  <div class="login-card">
    <div class="mark">❄️</div>
    <h1>Panel Admin</h1>
    <p>Masuk untuk mengelola pesanan, katalog & galeri <b>BekasiAC</b>.</p>
    <form id="loginForm" onsubmit="return false">
      <div class="f-group"><label>Email admin</label><input type="email" id="adEmail" placeholder="admin@bekasiac.id" required></div>
      <div class="f-group"><label>Kata sandi</label><input type="password" id="adPass" placeholder="••••••••" required></div>
      <button class="btn btn-p btn-block" id="loginBtn" onclick="doLogin()">🔓 Masuk Dashboard</button>
    </form>
    <p style="margin:14px 0 0;font-size:11px;color:#94A3B8">🔒 Hanya email terdaftar yang bisa masuk.</p>
  </div>
</div>

<!-- LAYOUT -->
<div id="layout">
  <div id="sbOverlay" onclick="toggleSB()"></div>
  <aside class="sidebar" id="sidebar">
    <div class="sb-head"><div class="sb-mark">❄️</div><div><b>BekasiAC</b><small>ADMIN PANEL</small></div><button class="sb-x" onclick="toggleSB()">✕</button></div>
    <nav class="sb-nav">
      <div class="sb-label">MENU UTAMA</div>
      <div class="sb-item on" data-p="dashboard" onclick="go('dashboard',this)"><span class="ic">📊</span>Dashboard</div>
      <div class="sb-item" data-p="orders" onclick="go('orders',this)"><span class="ic">🛒</span>Pesanan<span class="badge" id="bdgOrder">0</span></div>
      <div class="sb-item" data-p="katalog" onclick="go('katalog',this)"><span class="ic">🏷️</span>Katalog</div>
      <div class="sb-label">KONTEN</div>
      <div class="sb-item" data-p="galeri" onclick="go('galeri',this)"><span class="ic">📸</span>Galeri Foto</div>
      <div class="sb-item" data-p="video" onclick="go('video',this)"><span class="ic">🎥</span>Video YouTube</div>
      <div class="sb-item" data-p="ulasan" onclick="go('ulasan',this)"><span class="ic">⭐</span>Ulasan</div>
      <div class="sb-label">LAINNYA</div>
      <div class="sb-item" data-p="pelanggan" onclick="go('pelanggan',this)"><span class="ic">👥</span>Pelanggan</div>
      <div class="sb-item" data-p="pengaturan" onclick="go('pengaturan',this)"><span class="ic">⚙️</span>Pengaturan</div>
    </nav>
    <div class="sb-foot"><button class="logout" onclick="doLogout()">⏻ Keluar</button></div>
  </aside>

  <div class="main">
    <div class="topbar">
      <button class="burger" onclick="toggleSB()">☰</button>
      <h2 id="pageTitle">📊 Dashboard</h2>
      <div class="top-right">
        <select id="notifMode" onchange="localStorage.setItem('bac_notif',this.value);toast('Mode notifikasi: '+this.options[this.selectedIndex].text)" style="padding:9px 12px;border-radius:11px;border:1.5px solid var(--line);font-size:12px;font-weight:800;color:var(--brand);background:#F0F9FF;cursor:pointer">
          <option value="normal">🔔 Notif</option><option value="voice">🗣️ Suara</option>
        </select>
        <button class="icon-btn" onclick="testAPI()" title="Tes koneksi API gambar">🔌</button>
        <div class="pill-user" id="adminMail">…</div>
      </div>
    </div>

    <div class="content">
      <!-- DASHBOARD -->
      <div class="page on" id="pg-dashboard">
        <div class="welcome">
          <div><h1 id="greet">Selamat datang 👋</h1><p><span class="dot"></span><span id="greetSub">BekasiAC berjalan normal • pantau pesanan real-time</span></p></div>
          <div class="clock"><b id="clock">00:00:00</b><small id="datestr">…</small></div>
        </div>
        <div class="stats">
          <div class="stat" style="--c:var(--sky)" ><span style="position:absolute;left:0;top:0;bottom:0;width:5px;background:var(--sky);border-radius:5px"></span><small>Total Pesanan</small><b id="stOrder">0</b><div class="sub" id="stOrderSub">—</div></div>
          <div class="stat"><span style="position:absolute;left:0;top:0;bottom:0;width:5px;background:var(--green);border-radius:5px"></span><small>Perlu Diproses</small><b id="stPending" style="color:#D97706">0</b><div class="sub">status "Dipesan"</div></div>
          <div class="stat"><span style="position:absolute;left:0;top:0;bottom:0;width:5px;background:var(--violet);border-radius:5px"></span><small>Estimasi Omzet</small><b id="stOmzet" style="font-size:19px">Rp 0</b><div class="sub">dari pesanan diterima</div></div>
          <div class="stat"><span style="position:absolute;left:0;top:0;bottom:0;width:5px;background:var(--amber);border-radius:5px"></span><small>Pelanggan</small><b id="stUser">0</b><div class="sub" id="stKatSub">— katalog</div></div>
        </div>
        <div class="grid2">
          <div class="card"><div class="card-h"><div><h3>📈 Pesanan 7 Hari Terakhir</h3><p>Tren order masuk per hari</p></div></div><canvas class="chartbox" id="chTrend"></canvas></div>
          <div class="card"><div class="card-h"><div><h3>🍩 Komposisi Status</h3><p>Perbandingan status pesanan</p></div></div><canvas class="chartbox" id="chStatus"></canvas></div>
        </div>
        <div class="grid2">
          <div class="card"><div class="card-h"><div><h3>🆕 Pesanan Terbaru</h3><p>5 order paling baru</p></div><button class="btn btn-light btn-xs" onclick="go('orders')">Lihat semua →</button></div><div id="recentOrders" style="font-size:13px;color:var(--muted)">Memuat…</div></div>
          <div class="card"><div class="card-h"><div><h3>⚡ Aksi Cepat</h3><p>Pintasan tugas harian</p></div></div>
            <div class="quick">
              <button onclick="openKatModal()"><span>➕</span>Tambah Katalog</button>
              <button onclick="go('orders')"><span>🛒</span>Cek Pesanan</button>
              <button onclick="go('galeri')"><span>📸</span>Upload Foto</button>
              <button onclick="go('pengaturan')"><span>⚙️</span>Pengaturan</button>
            </div>
            <div class="kv" style="margin-top:12px"><div class="r"><span class="k">💾 Storage gambar (hosting)</span><span class="v" id="storageInfo">…</span></div><div class="r"><span class="k">🔌 API bridge</span><span class="v" id="apiInfo" style="font-size:11px">api/api.php</span></div></div>
          </div>
        </div>
      </div>

      <!-- ORDERS -->
      <div class="page" id="pg-orders">
        <div class="card">
          <div class="card-h"><div><h3>🛒 Pesanan Masuk</h3><p>Real-time • klik baris untuk detail</p></div>
            <div class="tools"><button class="btn btn-g btn-xs" onclick="exportCSV()">📥 Export CSV</button><button class="btn btn-light btn-xs" onclick="aktifkanAutostart()">🛡️ Autostart</button></div></div>
          <div class="tools" style="margin-bottom:12px"><input class="search" id="qOrder" placeholder="🔍 Cari nama / WA / layanan…" oninput="renderOrders()"></div>
          <div class="chips" id="chipStatus">
            <button class="chip on" data-s="all" onclick="setStatusF('all',this)">Semua</button>
            <button class="chip" data-s="Dipesan" onclick="setStatusF('Dipesan',this)">🟡 Dipesan</button>
            <button class="chip" data-s="Di Terima" onclick="setStatusF('Di Terima',this)">🟢 Diterima</button>
            <button class="chip" data-s="Di Tolak" onclick="setStatusF('Di Tolak',this)">🔴 Ditolak</button>
          </div>
          <div class="tbl-wrap"><table><thead><tr><th>Waktu</th><th>Pelanggan</th><th>Layanan</th><th>Total & Status</th><th>Aksi</th></tr></thead><tbody id="tbOrders"><tr><td colspan="5" style="text-align:center">Menghubungkan live…</td></tr></tbody></table></div>
        </div>
      </div>

      <!-- KATALOG -->
      <div class="page" id="pg-katalog">
        <div class="card">
          <div class="card-h"><div><h3>🏷️ Manajemen Katalog</h3><p id="katCount">— item</p></div><button class="btn btn-p" onclick="openKatModal()">➕ Tambah Baru</button></div>
          <div class="tools" style="margin-bottom:12px"><input class="search" id="qKat" style="flex:1;min-width:180px" placeholder="🔍 Cari produk / layanan…" oninput="renderKatalog()"></div>
          <div class="chips" id="chipKat">
            <button class="chip on" onclick="setKatF('all',this)">Semua</button>
            <button class="chip" onclick="setKatF('beli_ac',this)">📦 AC Baru</button>
            <button class="chip" onclick="setKatF('cuci',this)">❄️ Cuci</button>
            <button class="chip" onclick="setKatF('bongkar_pasang',this)">🔧 Bongkar/Pasang</button>
            <button class="chip" onclick="setKatF('servis',this)">🛠️ Servis</button>
          </div>
          <div class="kat-grid" id="katGrid"><div style="color:var(--muted)">Memuat…</div></div>
        </div>
      </div>

      <!-- GALERI -->
      <div class="page" id="pg-galeri">
        <div class="grid2" style="grid-template-columns:1fr">
          <div class="card"><div class="card-h"><div><h3>📸 Upload Dokumentasi</h3><p>Tersimpan di hosting: <b>image/</b> via api.php</p></div></div>
            <div class="f-group"><label>Judul pekerjaan</label><input id="galTitle" placeholder="cth: Cuci AC 2 unit — Harapan Indah"></div>
            <div class="drop" id="galDrop" onclick="document.getElementById('galFile').click()">📁 <b>Klik / drop foto di sini</b><br><small style="color:var(--muted)">JPG/PNG/WEBP • maks 5MB</small><input type="file" id="galFile" accept="image/*" style="display:none"><img class="img-prev" id="galPrev"></div>
            <button class="btn btn-p btn-block" style="margin-top:12px" id="galBtn" onclick="uploadGaleri()">🚀 Simpan Dokumentasi</button>
          </div>
        </div>
        <div class="card"><div class="card-h"><div><h3>🖼️ Daftar Foto</h3><p id="galCount">— foto</p></div></div><div class="gal-grid" id="galGrid"></div></div>
      </div>

      <!-- VIDEO -->
      <div class="page" id="pg-video">
        <div class="card"><div class="card-h"><div><h3>🎥 Tambah Video YouTube</h3><p>Tempel link / ID video</p></div></div>
          <div class="f-group"><label>Judul video</label><input id="ytTitle" placeholder="cth: Proses cuci AC split…"></div>
          <div class="f-group"><label>Link / ID YouTube</label><input id="ytLink" placeholder="https://youtu.be/xxxx atau xxxx"></div>
          <button class="btn btn-block" style="background:#EF4444;color:#fff" onclick="simpanYT()">🚀 Simpan Video</button>
        </div>
        <div class="card"><div class="card-h"><div><h3>📺 Daftar Video</h3></div></div><div id="ytList"></div></div>
      </div>

      <!-- ULASAN -->
      <div class="page" id="pg-ulasan">
        <div class="card"><div class="card-h"><div><h3>⭐ Ulasan Pelanggan</h3><p>Dari website (real) — hapus yang spam</p></div><button class="btn btn-light btn-xs" onclick="loadUlasan()">🔄 Muat ulang</button></div><div id="ulasanList"></div></div>
      </div>

      <!-- PELANGGAN -->
      <div class="page" id="pg-pelanggan">
        <div class="card"><div class="card-h"><div><h3>👥 Database Pelanggan</h3><p id="userCount">— orang</p></div></div>
          <div class="tools" style="margin-bottom:12px"><input class="search" id="qUser" style="flex:1" placeholder="🔍 Cari nama / email…" oninput="renderUsers()"></div>
          <div class="tbl-wrap"><table><thead><tr><th>Nama</th><th>Email</th><th>Terdaftar</th></tr></thead><tbody id="tbUsers"></tbody></table></div>
        </div>
      </div>

      <!-- PENGATURAN -->
      <div class="page" id="pg-pengaturan">
        <div class="card"><div class="card-h"><div><h3>⚙️ Pengaturan Website</h3><p>Tampil otomatis di halaman depan</p></div></div>
          <div class="f-group"><label>📱 No. WhatsApp admin (format 62…)</label><input id="setWA" placeholder="62817387060"></div>
          <div class="f-group"><label>📢 Teks pengumuman (bar atas)</label><input id="setAnnounce" placeholder="Tulis promo / info…"></div>
          <div class="f-group"><label style="display:flex;gap:8px;align-items:center"><input type="checkbox" id="setAnnounceOn" style="width:18px;height:18px" checked> Tampilkan pengumuman</label></div>
          <div class="f-group"><label>🎉 Judul promo</label><input id="setPromoT" placeholder="cth: Promo cuci 2 gratis 1…"></div>
          <div class="f-group"><label>🎉 Deskripsi promo</label><textarea id="setPromoD" rows="2" placeholder="Syarat & cara klaim…"></textarea></div>
          <div class="f-group"><label style="display:flex;gap:8px;align-items:center"><input type="checkbox" id="setPromoOn" style="width:18px;height:18px" checked> Tampilkan banner promo</label></div>
          <div class="f-group"><label>🦸 Judul hero (boleh HTML)</label><input id="setHeroT" placeholder="AC Dingin Lagi dalam Sekejap."></div>
          <div class="f-group"><label>🦸 Sub-judul hero</label><textarea id="setHeroS" rows="2"></textarea></div>
          <button class="btn btn-g btn-block" onclick="simpanSettings()">💾 Simpan Pengaturan</button>
        </div>
        <div class="card"><div class="card-h"><div><h3>🔌 API Gambar (Hosting)</h3><p>Bridge: <b>api/api.php</b> → folder <b>image/</b></p></div><button class="btn btn-navy btn-xs" onclick="testAPI()">Tes Koneksi</button></div>
          <div class="kv"><div class="r"><span class="k">Status</span><span class="v" id="apiStatus">…</span></div><div class="r"><span class="k">Base URL</span><span class="v" id="apiBase" style="font-size:11px;word-break:break-all">…</span></div><div class="r"><span class="k">Total file</span><span class="v" id="apiFiles">…</span></div><div class="r"><span class="k">Ukuran</span><span class="v" id="apiBytes">…</span></div></div>
          <p style="font-size:12px;color:var(--muted)">Jika "gagal terhubung", pastikan struktur di hosting:<br><b>public_html/index.php</b> • <b>public_html/paneladmin.php</b> • <b>public_html/api/api.php</b> • <b>public_html/image/</b> (chmod 755)</p>
        </div>
      </div>

    </div>
  </div>
</div>

<!-- bottom nav admin -->
<nav class="bnav" id="bnav" style="display:none">
  <button class="bn on" data-p="dashboard" onclick="go('dashboard')"> <span class="i">📊</span>Dash</button>
  <button class="bn" data-p="orders" onclick="go('orders')"><span class="i">🛒</span>Order<span class="bdot" id="bdotOrder">0</span></button>
  <button class="bn" data-p="katalog" onclick="go('katalog')"><span class="i">🏷️</span>Katalog</button>
  <button class="bn" data-p="galeri" onclick="go('galeri')"><span class="i">📸</span>Galeri</button>
  <button class="bn" onclick="toggleSB()"><span class="i">☰</span>Menu</button>
</nav>

<!-- MODAL KATALOG -->
<div class="modal" id="katModal"><div class="m-card">
  <div class="grab"></div><button class="m-x" onclick="closeM('katModal')">✕</button>
  <h3 id="katModalT">➕ Tambah Katalog</h3><p class="m-sub">Foto otomatis tersimpan di hosting via api.php</p>
  <input type="hidden" id="kId"><input type="hidden" id="kOldImg">
  <div class="f-group"><label>Kategori</label><select id="kKat" onchange="document.getElementById('kAcBox').style.display=this.value==='beli_ac'?'block':'none'"><option value="beli_ac">📦 Beli AC Baru + Instalasi</option><option value="cuci">❄️ Cuci & Perawatan</option><option value="bongkar_pasang">🔧 Bongkar / Pasang</option><option value="servis">🛠️ Servis Perbaikan</option></select></div>
  <div class="f-group"><label>Nama produk / layanan</label><input id="kNama" placeholder="cth: Sharp 0.5 PK + Pasang"></div>
  <div class="f-group"><label>Harga tampil</label><input id="kHarga" placeholder="cth: Rp 2.850.000"></div>
  <div class="f-group"><label>Deskripsi singkat</label><textarea id="kDesc" rows="2" placeholder="Keunggulan, garansi, cakupan…"></textarea></div>
  <div id="kAcBox" style="background:#F8FAFC;border:1.5px dashed #CBD5E1;border-radius:14px;padding:14px;margin-bottom:12px">
    <div class="f-group"><label>Spesifikasi (1 baris = 1 spek)</label><textarea id="kSpecs" rows="4" placeholder="Daya: 344 Watt&#10;Kapasitas: 5000 BTU/h&#10;Refrigerant: R32"></textarea></div>
    <div class="f-group" style="margin:0"><label>Foto produk <small id="kImgHint" style="color:var(--green);font-weight:600"></small></label>
      <div class="drop" onclick="document.getElementById('kFile').click()">📷 <b>Klik untuk pilih / ganti foto</b><br><small style="color:var(--muted)">JPG/PNG/WEBP • maks 5MB</small><input type="file" id="kFile" accept="image/*" style="display:none"><img class="img-prev" id="kPrev"></div>
    </div>
  </div>
  <button class="btn btn-p btn-block" id="kBtn" onclick="simpanKatalog()">💾 Simpan</button>
</div></div>

<!-- MODAL DETAIL ORDER -->
<div class="modal" id="orderModal"><div class="m-card">
  <div class="grab"></div><button class="m-x" onclick="closeM('orderModal')">✕</button>
  <h3>📄 Detail Pesanan</h3><p class="m-sub" id="oDate">-</p>
  <div class="kv"><div class="r"><span class="k">ID</span><span class="v" id="oId" style="font-family:monospace;font-size:11px">-</span></div><div class="r"><span class="k">Status</span><span class="v" id="oStatus">-</span></div><div class="r"><span class="k">Jadwal</span><span class="v" id="oTgl">-</span></div><div class="r"><span class="k">Email</span><span class="v" id="oEmail" style="font-size:11px">-</span></div></div>
  <div style="font-size:12px;font-weight:800;margin:8px 0 6px">Layanan:</div><div class="kv" id="oItems"></div>
  <div class="kv" style="background:#EFF6FF;border-color:#BFDBFE"><div class="r"><span class="k" style="color:var(--navy);font-weight:800">TOTAL</span><span class="v" id="oTotal" style="color:var(--navy);font-size:16px">Rp 0</span></div></div>
  <div style="font-size:12px;font-weight:800;margin:8px 0 6px">Kontak & lokasi:</div>
  <div class="kv"><div class="r"><span class="k">Nama</span><span class="v" id="oNama">-</span></div><div class="r"><span class="k">WA</span><span class="v" id="oWA">-</span></div><div class="r"><span class="k">Area</span><span class="v" id="oArea">-</span></div><div class="r"><span class="k">Alamat</span><span class="v" id="oAlamat" style="font-weight:500;max-width:60%">-</span></div></div>
  <div style="display:flex;gap:8px"><button class="btn btn-wa" style="flex:1" id="oWaBtn">💬 Hubungi WA</button><button class="btn btn-navy" style="flex:1" onclick="closeM('orderModal')">Tutup</button></div>
</div></div>

<!-- CONFIRM -->
<div class="modal" id="confirmBox"><div class="m-card">
  <div style="font-size:46px">⚠️</div><h3 id="cfTitle" style="padding:0">Hapus data?</h3><p class="m-sub" id="cfMsg">Tindakan ini tidak bisa dibatalkan.</p>
  <div style="display:flex;gap:10px"><button class="btn btn-light" style="flex:1" onclick="closeM('confirmBox')">Batal</button><button class="btn" style="flex:1;background:var(--red);color:#fff" id="cfYes">Ya, Hapus</button></div>
</div></div>

<script type="module">
import { initializeApp } from "https://www.gstatic.com/firebasejs/10.8.0/firebase-app.js";
import { getAuth, signInWithEmailAndPassword, onAuthStateChanged, signOut } from "https://www.gstatic.com/firebasejs/10.8.0/firebase-auth.js";
import { getFirestore, collection, getDocs, getDoc, addDoc, deleteDoc, doc, updateDoc, setDoc, onSnapshot } from "https://www.gstatic.com/firebasejs/10.8.0/firebase-firestore.js";

const firebaseConfig = {
  apiKey: "AIzaSyCzYtyo13CzZIpjJ8Zb-AxOuwYlfSTpscA",
  authDomain: "teknik-ac.firebaseapp.com",
  projectId: "teknik-ac",
  storageBucket: "teknik-ac.firebasestorage.app",
  messagingSenderId: "865223751567",
  appId: "1:865223751567:web:121532643353db1156fdfa"
};
const app = initializeApp(firebaseConfig);
const auth = getAuth(app);
const db = getFirestore(app);
window._db=db; window._auth=auth;
window._fs={ collection, getDocs, getDoc, addDoc, deleteDoc, doc, updateDoc, setDoc, onSnapshot };
window._login=(e,p)=>signInWithEmailAndPassword(auth,e,p);
window._logout=()=>signOut(auth);

const ADMINS=['doni888855519@gmail.com','setiatehnik09@gmail.com','cahyokukuh94@gmail.com'];
onAuthStateChanged(auth,(user)=>{
  const sp=document.getElementById('splash');
  setTimeout(()=>{ sp.style.opacity='0'; setTimeout(()=>sp.remove(),500); },700);
  if(user){
    if(!ADMINS.includes(user.email)){ window._logout(); toast('⛔ Email tidak punya akses admin','err'); return; }
    document.getElementById('loginWrap').style.display='none';
    document.getElementById('layout').classList.add('on');
    document.getElementById('bnav').style.display='';
    document.getElementById('adminMail').textContent='👋 '+user.email;
    boot();
  }else{
    document.getElementById('loginWrap').style.display='flex';
    document.getElementById('layout').classList.remove('on');
    document.getElementById('bnav').style.display='none';
    if(window._unsub) window._unsub();
  }
});
</script>

<script>
/* ================= CORE ================= */
const API_URL='api/api.php';
function toast(msg,type=''){
  const t=document.getElementById('toast');
  t.textContent=msg;
  t.style.display='block';
  t.style.background=type==='err'?'#DC2626':type==='ok'?'#059669':'#0A2540';
  clearTimeout(window._tt); window._tt=setTimeout(()=>t.style.display='none',3200);
}
function openM(id){ document.getElementById(id).classList.add('open'); }
function closeM(id){ document.getElementById(id).classList.remove('open'); }
function toggleSB(){ document.getElementById('sidebar').classList.toggle('open'); document.getElementById('sbOverlay').classList.toggle('on'); }
const TITLES={dashboard:'📊 Dashboard',orders:'🛒 Pesanan Masuk',katalog:'🏷️ Katalog',galeri:'📸 Galeri Foto',video:'🎥 Video YouTube',ulasan:'⭐ Ulasan',pelanggan:'👥 Pelanggan',pengaturan:'⚙️ Pengaturan'};
function go(p){
  document.querySelectorAll('.page').forEach(x=>x.classList.remove('on'));
  document.getElementById('pg-'+p).classList.add('on');
  document.getElementById('pageTitle').textContent=TITLES[p]||p;
  document.querySelectorAll('.sb-item').forEach(x=>x.classList.toggle('on',x.dataset.p===p));
  document.querySelectorAll('.bn').forEach(x=>x.classList.toggle('on',x.dataset.p===p));
  if(window.innerWidth<1100){ document.getElementById('sidebar').classList.remove('open'); document.getElementById('sbOverlay').classList.remove('on'); }
  document.querySelector('.content').scrollTop=0;
}
function ask(title,msg,cb){
  document.getElementById('cfTitle').textContent=title;
  document.getElementById('cfMsg').textContent=msg;
  document.getElementById('cfYes').onclick=()=>{ closeM('confirmBox'); cb(); };
  openM('confirmBox');
}
// clock
setInterval(()=>{
  const n=new Date(), h=n.getHours();
  const g=h<11?'Selamat pagi':h<15?'Selamat siang':h<18?'Selamat sore':'Selamat malam';
  document.getElementById('greet').textContent=g+', Admin 👋';
  document.getElementById('clock').textContent=n.toLocaleTimeString('id-ID',{hour12:false});
  document.getElementById('datestr').textContent=n.toLocaleDateString('id-ID',{weekday:'long',day:'numeric',month:'long',year:'numeric'});
},1000);
document.getElementById('notifMode').value=localStorage.getItem('bac_notif')||'normal';

/* ================= AUTH ================= */
async function doLogin(){
  const e=document.getElementById('adEmail').value.trim(), p=document.getElementById('adPass').value;
  const b=document.getElementById('loginBtn'); b.textContent='Memeriksa…'; b.disabled=true;
  try{ await window._login(e,p); toast('Login berhasil 🎉','ok'); }
  catch(err){ toast('Email / sandi salah ❌','err'); }
  b.textContent='🔓 Masuk Dashboard'; b.disabled=false;
}
function doLogout(){ if(window._unsub) window._unsub(); window._logout().then(()=>toast('Anda keluar 👋')); }
function aktifkanAutostart(){
  if(window.AndroidControl&&window.AndroidControl.openAutostartSettings){ window.AndroidControl.openAutostartSettings(); toast('Aktifkan autostart untuk aplikasi ini 🛡️'); }
  else toast('Buka via aplikasi Android admin untuk fitur ini');
}

/* ================= API GAMBAR (hosting) ================= */
async function apiUpload(file,prefix='bekasiac'){
  const fd=new FormData(); fd.append('file',file); fd.append('prefix',prefix);
  const r=await fetch(API_URL+'?action=upload',{method:'POST',body:fd});
  const j=await r.json();
  if(j.status!=='success') throw new Error(j.message||'Upload gagal');
  return j; // {url, filename}
}
async function apiDeleteByUrl(url){
  if(!url||url.indexOf('/image/')<0) return false; // hanya file hosting sendiri
  try{
    const r=await fetch(API_URL,{method:'POST',headers:{'Content-Type':'application/json'},body:JSON.stringify({action:'delete',url})});
    const j=await r.json(); return j.status==='success';
  }catch(e){ return false; }
}
function fmtBytes(b){ if(!b&&b!==0) return '-'; if(b<1024) return b+' B'; if(b<1048576) return (b/1024).toFixed(1)+' KB'; return (b/1048576).toFixed(2)+' MB'; }
async function testAPI(){
  const set=(t)=>{ document.getElementById('apiStatus').textContent=t; };
  toast('🔌 Menguji api/api.php…'); set('Menghubungi…');
  try{
    const r=await fetch(API_URL+'?action=ping'); const j=await r.json();
    if(j.status==='success'){
      document.getElementById('apiStatus').textContent='✅ Terhubung';
      document.getElementById('apiBase').textContent=j.base_url||'-';
      document.getElementById('apiFiles').textContent=(j.files||0)+' file';
      document.getElementById('apiBytes').textContent=fmtBytes(j.bytes||0);
      document.getElementById('storageInfo').textContent=(j.files||0)+' file • '+fmtBytes(j.bytes||0);
      document.getElementById('apiInfo').textContent=j.base_url||'api/api.php';
      toast('✅ API gambar terhubung!','ok');
    } else throw new Error(j.message);
  }catch(e){ set('❌ Gagal: '+e.message); toast('❌ API tidak terjangkau: '+e.message,'err'); }
}

/* ================= DATA GLOBAL ================= */
let ORDERS=[], KATALOG=[], USERS={}, USERS_ARR=[], GALERI=[];
let fStatus='all', fKat='all';
let chTrend=null, chStatus=null;

function boot(){
  loadUsers().then(()=>listenOrders());
  loadKatalog(); loadGaleri(); loadYT(); loadUlasan(); loadSettings(); testAPI();
  if('Notification' in window && Notification.permission==='default') Notification.requestPermission().catch(()=>{});
}
function beep(){
  try{
    const ctx=new (window.AudioContext||window.webkitAudioContext)();
    [523,659,784].forEach((f,i)=>{ const o=ctx.createOscillator(),g=ctx.createGain(); o.connect(g);g.connect(ctx.destination); o.frequency.value=f; o.type='sine'; g.gain.setValueAtTime(.001,ctx.currentTime+i*.15); g.gain.exponentialRampToValueAtTime(.5,ctx.currentTime+i*.15+.02); g.gain.exponentialRampToValueAtTime(.001,ctx.currentTime+i*.15+.3); o.start(ctx.currentTime+i*.15); o.stop(ctx.currentTime+i*.15+.35); });
  }catch(e){}
}
function notifyOrder(o){
  const mode=localStorage.getItem('bac_notif')||'normal';
  const items=(o.items||[]).map(x=>x.nama).join(', ');
  // Android bridge (kompatibel aplikasi lama)
  if(window.AndroidControl&&window.AndroidControl.sendNotification){
    const msg=`Dari: ${o.namaPengorder||'-'}\nLokasi: ${o.lokasi||'-'}\nJasa: ${items}\nTotal: Rp ${(o.total||0).toLocaleString('id-ID')}`;
    window.AndroidControl.sendNotification('Pesanan Baru! ❄️',msg,mode==='voice','dewasa','wanita',1.0);
  }
  // Browser
  beep();
  if('Notification' in window && Notification.permission==='granted'){
    try{ new Notification('🧊 Pesanan Baru — BekasiAC',{body:`${o.namaPengorder} • Rp ${(o.total||0).toLocaleString('id-ID')}\n${items}`}); }catch(e){}
  }
}

/* ================= PESANAN ================= */
function listenOrders(){
  const { collection, onSnapshot }=window._fs;
  if(window._unsub) window._unsub();
  let first=true;
  window._unsub=onSnapshot(collection(window._db,'orders'),(snap)=>{
    if(!first){
      snap.docChanges().forEach(ch=>{ if(ch.type==='added') notifyOrder({id:ch.doc.id,...ch.doc.data()}); });
    }
    first=false;
    ORDERS=[]; snap.forEach(d=>ORDERS.push({id:d.id,...d.data()}));
    ORDERS.sort((a,b)=>((b.createdAt?.toMillis?.()||0)-(a.createdAt?.toMillis?.()||0)));
    renderOrders(); renderDash();
  },()=>{ document.getElementById('tbOrders').innerHTML='<tr><td colspan="5" style="text-align:center;color:red">Koneksi live terputus. Refresh halaman.</td></tr>'; });
}
function setStatusF(s,el){ fStatus=s; document.querySelectorAll('#chipStatus .chip').forEach(c=>c.classList.remove('on')); el.classList.add('on'); renderOrders(); }
function renderOrders(){
  const q=(document.getElementById('qOrder').value||'').toLowerCase();
  const tb=document.getElementById('tbOrders');
  let arr=ORDERS.filter(o=>(fStatus==='all'||o.status===fStatus));
  if(q) arr=arr.filter(o=>JSON.stringify(o).toLowerCase().includes(q));
  const pend=ORDERS.filter(o=>o.status==='Dipesan').length;
  const bdg=document.getElementById('bdgOrder');
  bdg.style.display=pend?'inline-block':'none'; bdg.textContent=pend;
  const bdot=document.getElementById('bdotOrder');
  bdot.style.display=pend?'flex':'none'; bdot.textContent=pend;
  if(!arr.length){ tb.innerHTML='<tr><td colspan="5" style="text-align:center;color:var(--muted)">Tidak ada pesanan.</td></tr>'; return; }
  tb.innerHTML=arr.map(o=>{
    const dt=o.createdAt?.toDate?o.createdAt.toDate().toLocaleDateString('id-ID',{day:'numeric',month:'short',hour:'2-digit',minute:'2-digit'}):'-';
    const items=(o.items||[]).map(x=>'• '+x.nama+(x.qty>1?` (${x.qty}x)`:'')).join('<br>');
    const cls=o.status==='Di Terima'?'st-DiTerima':o.status==='Di Tolak'?'st-DiTolak':'st-Dipesan';
    const uname=USERS[o.userId]||'Tanpa username';
    return `<tr>
      <td data-l="Waktu" style="white-space:nowrap;font-size:12px;color:var(--muted)">${dt}</td>
      <td data-l="Pelanggan"><b>👤 ${uname}</b><br><span style="font-size:12px">A/n: <b>${o.namaPengorder||'-'}</b></span><br><span style="font-size:11px;color:var(--muted)">✉️ ${o.email||'-'}</span><br><span style="font-size:11.5px;color:#15803D;font-weight:800">📱 ${o.whatsappUser||'-'}</span></td>
      <td data-l="Layanan" style="font-size:12px">${items}</td>
      <td data-l="Total & Status"><b style="color:#059669">Rp ${(o.total||0).toLocaleString('id-ID')}</b><br><select class="st-sel ${cls}" style="margin-top:8px" onchange="ubahStatus('${o.id}',this)"><option ${o.status==='Dipesan'?'selected':''}>Dipesan</option><option ${o.status==='Di Terima'?'selected':''}>Di Terima</option><option ${o.status==='Di Tolak'?'selected':''}>Di Tolak</option></select></td>
      <td data-l="Aksi" class="no-l"><button class="btn btn-wa btn-xs" onclick="waOrder('${o.id}')">💬 WA</button><button class="btn btn-navy btn-xs" onclick="detailOrder('${o.id}')">Detail</button><button class="btn btn-d btn-xs" onclick="hapusOrder('${o.id}')">Hapus</button></td>
    </tr>`;
  }).join('');
}
async function ubahStatus(id,el){
  el.className='st-sel '+(el.value==='Di Terima'?'st-DiTerima':el.value==='Di Tolak'?'st-DiTolak':'st-Dipesan');
  try{ await window._fs.updateDoc(window._fs.doc(window._db,'orders',id),{status:el.value}); toast('Status → '+el.value,'ok'); }
  catch(e){ toast('Gagal update ❌','err'); }
}
function waOrder(id){
  const o=ORDERS.find(x=>x.id===id); if(!o||!o.whatsappUser) return toast('No. WA tidak tersedia','err');
  const msg=`Halo ${o.namaPengorder||'Kak'}, kami dari *BekasiAC* ❄️. Pesanan Anda (Rp ${(o.total||0).toLocaleString('id-ID')}) sudah kami terima & sedang diproses. Terima kasih! 🙏`;
  window.open('https://wa.me/'+o.whatsappUser+'?text='+encodeURIComponent(msg),'_blank');
}
function detailOrder(id){
  const o=ORDERS.find(x=>x.id===id); if(!o) return;
  document.getElementById('oId').textContent=o.id;
  document.getElementById('oDate').textContent=o.createdAt?.toDate?'Dibuat: '+o.createdAt.toDate().toLocaleDateString('id-ID',{day:'numeric',month:'long',year:'numeric',hour:'2-digit',minute:'2-digit'})+' WIB':'-';
  document.getElementById('oStatus').textContent=o.status||'Dipesan';
  document.getElementById('oTgl').textContent=o.tanggalPengerjaan||'-';
  document.getElementById('oEmail').textContent=o.email||'-';
  document.getElementById('oItems').innerHTML=(o.items||[]).map(it=>`<div class="r"><span class="k" style="color:var(--ink);font-weight:600">${it.nama} ${it.qty>1?`(${it.qty}x)`:''}</span><span class="v">${it.harga}</span></div>`).join('');
  document.getElementById('oTotal').textContent='Rp '+(o.total||0).toLocaleString('id-ID');
  document.getElementById('oNama').textContent=o.namaPengorder||'-';
  document.getElementById('oWA').textContent=o.whatsappUser||'-';
  document.getElementById('oArea').textContent=o.lokasi||'-';
  document.getElementById('oAlamat').textContent=o.alamat||'-';
  document.getElementById('oWaBtn').onclick=()=>waOrder(id);
  openM('orderModal');
}
function hapusOrder(id){ ask('Hapus pesanan?','Data hilang dari riwayat pelanggan juga.',async()=>{ await window._fs.deleteDoc(window._fs.doc(window._db,'orders',id)); toast('Pesanan dihapus 🗑️','ok'); }); }
function exportCSV(){
  if(!ORDERS.length) return toast('Belum ada data','err');
  let csv='ID;Waktu;Nama;WA;Email;Layanan;Total;Status;Jadwal;Area;Alamat\n';
  ORDERS.forEach(o=>{
    const dt=o.createdAt?.toDate?o.createdAt.toDate().toLocaleString('id-ID'):'-';
    const lay=(o.items||[]).map(x=>x.nama).join(' | ').replace(/;/g,',');
    csv+=`"${o.id}";"${dt}";"${o.namaPengorder||''}";"${o.whatsappUser||''}";"${o.email||''}";"${lay}";${o.total||0};"${o.status||''}";"${o.tanggalPengerjaan||''}";"${o.lokasi||''}";"${(o.alamat||'').replace(/"/g,"'")}"\n`;
  });
  const a=document.createElement('a'); a.href=URL.createObjectURL(new Blob(["\ufeff"+csv],{type:'text/csv'})); a.download='bekasiac-pesanan.csv'; a.click();
  toast('CSV terunduh 📥','ok');
}

/* ================= DASHBOARD ================= */
function renderDash(){
  const total=ORDERS.length;
  const pend=ORDERS.filter(o=>o.status==='Dipesan').length;
  const omzet=ORDERS.filter(o=>o.status==='Di Terima').reduce((s,o)=>s+(o.total||0),0);
  document.getElementById('stOrder').textContent=total;
  document.getElementById('stPending').textContent=pend;
  document.getElementById('stOmzet').textContent='Rp '+omzet.toLocaleString('id-ID');
  document.getElementById('stUser').textContent=USERS_ARR.length;
  document.getElementById('stOrderSub').textContent=KATALOG.length+' item katalog • '+GALERI.length+' foto';
  document.getElementById('stKatSub').textContent=KATALOG.length+' item katalog';
  // recent
  document.getElementById('recentOrders').innerHTML = ORDERS.length
    ? ORDERS.slice(0,5).map(o=>`<div style="display:flex;justify-content:space-between;gap:8px;padding:10px 0;border-bottom:1px dashed var(--line);cursor:pointer" onclick="go('orders');detailOrder('${o.id}')"><span><b>${o.namaPengorder||'-'}</b><br><small style="color:var(--muted)">${(o.items||[]).map(x=>x.nama).join(', ').slice(0,40)}</small></span><span style="text-align:right"><b style="color:#059669">Rp ${(o.total||0).toLocaleString('id-ID')}</b><br><small style="color:var(--muted)">${o.status}</small></span></div>`).join('')
    : 'Belum ada pesanan.';
  drawCharts();
}
function drawCharts(){
  try{
    const days=[...Array(7)].map((_,i)=>{ const d=new Date(); d.setDate(d.getDate()-(6-i)); return d; });
    const labels=days.map(d=>d.toLocaleDateString('id-ID',{weekday:'short'}));
    const counts=days.map(d=>ORDERS.filter(o=>{ if(!o.createdAt?.toDate) return false; const t=o.createdAt.toDate(); return t.toDateString()===d.toDateString(); }).length);
    if(chTrend) chTrend.destroy();
    chTrend=new Chart(document.getElementById('chTrend'),{type:'bar',data:{labels,datasets:[{data:counts,backgroundColor:'rgba(14,165,233,.75)',borderRadius:8}]},options:{plugins:{legend:{display:false}},scales:{y:{beginAtZero:true,ticks:{stepSize:1}}}}});
    const a=ORDERS.filter(o=>o.status==='Dipesan').length,b=ORDERS.filter(o=>o.status==='Di Terima').length,c=ORDERS.filter(o=>o.status==='Di Tolak').length;
    if(chStatus) chStatus.destroy();
    chStatus=new Chart(document.getElementById('chStatus'),{type:'doughnut',data:{labels:['Dipesan','Diterima','Ditolak'],datasets:[{data:[a,b,c],backgroundColor:['#FDE047','#34D399','#FCA5A5'],borderWidth:0}]},options:{cutout:'62%',plugins:{legend:{position:'bottom'}}}});
  }catch(e){}
}

/* ================= PENGGUNA ================= */
async function loadUsers(){
  try{
    const s=await window._fs.getDocs(window._fs.collection(window._db,'users'));
    USERS={}; USERS_ARR=[];
    s.forEach(d=>{ const v=d.data(); USERS[d.id]=v.username||'Tanpa nama'; USERS_ARR.push({id:d.id,...v}); });
    document.getElementById('userCount').textContent=USERS_ARR.length+' orang';
    renderUsers();
  }catch(e){}
}
function renderUsers(){
  const q=(document.getElementById('qUser').value||'').toLowerCase();
  let arr=USERS_ARR; if(q) arr=arr.filter(u=>JSON.stringify(u).toLowerCase().includes(q));
  document.getElementById('tbUsers').innerHTML=arr.length?arr.map(u=>`<tr><td data-l="Nama"><b>👤 ${u.username||'-'}</b></td><td data-l="Email">${u.email||'-'}</td><td data-l="Terdaftar" style="font-size:12px">${u.createdAt?.toDate?u.createdAt.toDate().toLocaleDateString('id-ID'):'-'}</td></tr>`).join(''):'<tr><td colspan="3" style="text-align:center;color:var(--muted)">Belum ada pelanggan.</td></tr>';
}

/* ================= KATALOG ================= */
const KAT_LABEL={beli_ac:'📦 AC Baru',cuci:'❄️ Cuci',bongkar_pasang:'🔧 Bongkar/Pasang',servis:'🛠️ Servis'};
function setKatF(f,el){ fKat=f; document.querySelectorAll('#chipKat .chip').forEach(c=>c.classList.remove('on')); el.classList.add('on'); renderKatalog(); }
async function loadKatalog(){
  try{
    const s=await window._fs.getDocs(window._fs.collection(window._db,'services'));
    KATALOG=[]; s.forEach(d=>KATALOG.push({id:d.id,...d.data()}));
    KATALOG.sort((a,b)=>(a.kategori||'').localeCompare(b.kategori||''));
    renderKatalog(); renderDash();
  }catch(e){}
}
function renderKatalog(){
  const q=(document.getElementById('qKat').value||'').toLowerCase();
  let arr=KATALOG.filter(k=>(fKat==='all'||k.kategori===fKat));
  if(q) arr=arr.filter(k=>JSON.stringify(k).toLowerCase().includes(q));
  document.getElementById('katCount').textContent=arr.length+' item tampil • '+KATALOG.length+' total';
  document.getElementById('katGrid').innerHTML=arr.length?arr.map(k=>`
    <div class="kat">${k.imgUrl?`<img src="${k.imgUrl}" loading="lazy" onclick="window.open('${k.imgUrl}','_blank')">`:`<div class="kat-ph">${k.kategori==='beli_ac'?'📦':k.kategori==='cuci'?'❄️':k.kategori==='bongkar_pasang'?'🔧':'🛠️'}</div>`}
    <div class="kat-b"><span class="kat-cat">${KAT_LABEL[k.kategori]||k.kategori}</span><b>${k.nama}</b><small>${(k.desc||'').slice(0,60)}</small><div class="kat-price">${k.harga}</div>
    <div><button class="btn btn-light btn-xs" onclick="editKat('${k.id}')">✏️ Edit</button><button class="btn btn-d btn-xs" onclick="hapusKat('${k.id}')">🗑️ Hapus</button></div></div></div>`).join('')
    :'<div style="color:var(--muted)">Tidak ada data.</div>';
}
function openKatModal(){
  ['kId','kNama','kHarga','kDesc','kSpecs'].forEach(id=>document.getElementById(id).value='');
  document.getElementById('kOldImg').value='';
  document.getElementById('kFile').value='';
  document.getElementById('kPrev').style.display='none';
  document.getElementById('kImgHint').textContent='';
  document.getElementById('katModalT').textContent='➕ Tambah Katalog';
  document.getElementById('kKat').value='beli_ac';
  document.getElementById('kAcBox').style.display='block';
  openM('katModal');
}
function editKat(id){
  const k=KATALOG.find(x=>x.id===id); if(!k) return;
  document.getElementById('katModalT').textContent='✏️ Edit Katalog';
  document.getElementById('kId').value=k.id;
  document.getElementById('kOldImg').value=k.imgUrl||'';
  document.getElementById('kKat').value=k.kategori||'cuci';
  document.getElementById('kNama').value=k.nama||'';
  document.getElementById('kHarga').value=k.harga||'';
  document.getElementById('kDesc').value=k.desc||'';
  let specs=k.specs||'';
  if(specs.includes('<li>')) specs=specs.replace(/<[^>]+>/g,'\n').replace(/\n+/g,'\n').trim();
  document.getElementById('kSpecs').value=specs;
  document.getElementById('kAcBox').style.display=(k.kategori==='beli_ac')?'block':'none';
  const pv=document.getElementById('kPrev');
  if(k.imgUrl){ pv.src=k.imgUrl; pv.style.display='block'; document.getElementById('kImgHint').textContent='(biarkan jika tidak diganti)'; }
  else { pv.style.display='none'; document.getElementById('kImgHint').textContent=''; }
  document.getElementById('kFile').value='';
  openM('katModal');
}
document.getElementById('kFile').addEventListener('change',e=>{
  const f=e.target.files[0]; if(!f) return;
  const pv=document.getElementById('kPrev'); pv.src=URL.createObjectURL(f); pv.style.display='block';
});
async function simpanKatalog(){
  const id=document.getElementById('kId').value;
  const kat=document.getElementById('kKat').value, nama=document.getElementById('kNama').value.trim(),
        harga=document.getElementById('kHarga').value.trim(), desc=document.getElementById('kDesc').value.trim();
  if(!nama||!harga) return toast('Nama & harga wajib diisi','err');
  const btn=document.getElementById('kBtn'); btn.textContent='⏳ Menyimpan…'; btn.disabled=true;
  try{
    let specsHtml='';
    const raw=document.getElementById('kSpecs').value.trim();
    if(raw&&kat==='beli_ac'){ specsHtml='<ul>'+raw.split('\n').filter(l=>l.trim()).map(l=>`<li>${l.trim()}</li>`).join('')+'</ul>'; }
    let imgUrl=document.getElementById('kOldImg').value||'';
    const f=document.getElementById('kFile').files[0];
    if(kat==='beli_ac'&&f){
      if(f.size>5*1024*1024) throw new Error('Foto maksimal 5MB');
      toast('⏳ Mengunggah foto ke hosting…');
      const up=await apiUpload(f,'katalog');
      if(imgUrl&&imgUrl!==up.url) await apiDeleteByUrl(imgUrl); // hapus lama
      imgUrl=up.url;
    } else if(kat!=='beli_ac'){
      if(imgUrl) await apiDeleteByUrl(imgUrl);
      imgUrl=''; specsHtml='';
    }
    const data={kategori:kat,nama,harga,desc,specs:specsHtml,imgUrl,timestamp:new Date()};
    if(id){ await window._fs.updateDoc(window._fs.doc(window._db,'services',id),data); toast('Katalog diperbarui ✅','ok'); }
    else { await window._fs.addDoc(window._fs.collection(window._db,'services'),data); toast('Katalog ditambahkan ✅','ok'); }
    closeM('katModal'); loadKatalog(); testAPI();
  }catch(e){ toast('Gagal: '+e.message,'err'); }
  btn.textContent='💾 Simpan'; btn.disabled=false;
}
function hapusKat(id){
  const k=KATALOG.find(x=>x.id===id);
  ask('Hapus katalog?','"'+(k?.nama||'')+'" akan dihapus permanen.',async()=>{
    await window._fs.deleteDoc(window._fs.doc(window._db,'services',id));
    if(k?.imgUrl) await apiDeleteByUrl(k.imgUrl);
    toast('Katalog dihapus 🗑️','ok'); loadKatalog(); testAPI();
  });
}

/* ================= GALERI ================= */
document.getElementById('galFile').addEventListener('change',e=>{
  const f=e.target.files[0]; if(!f) return;
  const pv=document.getElementById('galPrev'); pv.src=URL.createObjectURL(f); pv.style.display='block';
});
['dragover','dragenter'].forEach(ev=>document.getElementById('galDrop').addEventListener(ev,e=>{e.preventDefault();e.currentTarget.classList.add('over');}));
['dragleave','drop'].forEach(ev=>document.getElementById('galDrop').addEventListener(ev,e=>{e.preventDefault();e.currentTarget.classList.remove('over');}));
document.getElementById('galDrop').addEventListener('drop',e=>{
  const f=e.dataTransfer.files[0]; if(!f) return;
  document.getElementById('galFile').files=e.dataTransfer.files;
  const pv=document.getElementById('galPrev'); pv.src=URL.createObjectURL(f); pv.style.display='block';
});
async function loadGaleri(){
  try{
    const s=await window._fs.getDocs(window._fs.collection(window._db,'gallery'));
    GALERI=[]; s.forEach(d=>GALERI.push({id:d.id,...d.data()}));
    GALERI.sort((a,b)=>((b.timestamp?.toMillis?.()||0)-(a.timestamp?.toMillis?.()||0)));
    document.getElementById('galCount').textContent=GALERI.length+' foto';
    document.getElementById('galGrid').innerHTML=GALERI.length?GALERI.map(g=>`<div class="gal"><img src="${g.url}" loading="lazy" onclick="window.open('${g.url}','_blank')"><button class="gal-del" onclick="hapusGaleri('${g.id}')">🗑</button><div class="gal-cap">${g.title||''}</div></div>`).join(''):'<div style="color:var(--muted)">Belum ada foto.</div>';
    renderDash();
  }catch(e){}
}
async function uploadGaleri(){
  const title=document.getElementById('galTitle').value.trim();
  const f=document.getElementById('galFile').files[0];
  if(!title) return toast('Isi judul dulu ya','err');
  if(!f) return toast('Pilih foto dulu ya','err');
  if(f.size>5*1024*1024) return toast('Foto maksimal 5MB','err');
  const btn=document.getElementById('galBtn'); btn.textContent='⏳ Mengunggah…'; btn.disabled=true;
  try{
    const up=await apiUpload(f,'galeri');
    await window._fs.addDoc(window._fs.collection(window._db,'gallery'),{title,url:up.url,timestamp:new Date()});
    toast('Dokumentasi tersimpan ✅','ok');
    document.getElementById('galTitle').value='';document.getElementById('galFile').value='';
    document.getElementById('galPrev').style.display='none';
    loadGaleri(); testAPI();
  }catch(e){ toast('Gagal: '+e.message,'err'); }
  btn.textContent='🚀 Simpan Dokumentasi'; btn.disabled=false;
}
function hapusGaleri(id){
  const g=GALERI.find(x=>x.id===id);
  ask('Hapus foto?','File di hosting ikut dihapus.',async()=>{
    await window._fs.deleteDoc(window._fs.doc(window._db,'gallery',id));
    if(g?.url) await apiDeleteByUrl(g.url);
    toast('Foto dihapus 🗑️','ok'); loadGaleri(); testAPI();
  });
}

/* ================= YOUTUBE ================= */
function ytID(url){
  url=(url||'').trim(); if(!url) return '';
  try{
    if(url.includes('youtube.com')||url.includes('youtu.be')){
      if(url.includes('youtu.be')) return new URL(url).pathname.slice(1).split('?')[0];
      const u=new URL(url);
      if(u.searchParams.has('v')) return u.searchParams.get('v');
      if(u.pathname.includes('/embed/')) return u.pathname.split('/embed/')[1];
      if(u.pathname.includes('/shorts/')) return u.pathname.split('/shorts/')[1];
    }
  }catch(e){}
  return url;
}
async function loadYT(){
  try{
    const s=await window._fs.getDocs(window._fs.collection(window._db,'youtube_videos'));
    let arr=[]; s.forEach(d=>arr.push({id:d.id,...d.data()}));
    arr.sort((a,b)=>((b.timestamp?.toMillis?.()||0)-(a.timestamp?.toMillis?.()||0)));
    document.getElementById('ytList').innerHTML=arr.length?arr.map(v=>`<div class="rev-card" style="display:flex;gap:12px;align-items:center"><iframe style="width:130px;height:74px;border-radius:10px;border:none;flex-shrink:0" src="https://www.youtube.com/embed/${v.videoId}"></iframe><div style="flex:1"><b style="font-size:13px">${v.title}</b><br><small style="color:var(--muted)">ID: ${v.videoId}</small></div><button class="btn btn-d btn-xs" onclick="hapusYT('${v.id}')">Hapus</button></div>`).join(''):'<div style="color:var(--muted)">Belum ada video.</div>';
  }catch(e){}
}
async function simpanYT(){
  const t=document.getElementById('ytTitle').value.trim(), l=document.getElementById('ytLink').value.trim();
  if(!t||!l) return toast('Isi judul & link dulu','err');
  const id=ytID(l); if(!id) return toast('Link tidak valid','err');
  await window._fs.addDoc(window._fs.collection(window._db,'youtube_videos'),{title:t,videoId:id,timestamp:new Date()});
  toast('Video tersimpan ✅','ok'); document.getElementById('ytTitle').value='';document.getElementById('ytLink').value=''; loadYT();
}
function hapusYT(id){ ask('Hapus video?','Video hilang dari website.',async()=>{ await window._fs.deleteDoc(window._fs.doc(window._db,'youtube_videos',id)); toast('Video dihapus 🗑️','ok'); loadYT(); }); }

/* ================= ULASAN ================= */
async function loadUlasan(){
  const box=document.getElementById('ulasanList'); box.innerHTML='<div style="color:var(--muted)">Memuat…</div>';
  try{
    const s=await window._fs.getDocs(window._fs.collection(window._db,'reviews'));
    let arr=[]; s.forEach(d=>arr.push({id:d.id,...d.data()}));
    arr.sort((a,b)=>((b.createdAt?.toMillis?.()||0)-(a.createdAt?.toMillis?.()||0)));
    box.innerHTML=arr.length?arr.map(r=>`<div class="rev-card"><div class="stars">${'★'.repeat(r.rating||5)}</div><p style="font-style:italic;margin:8px 0">"${(r.comment||'').replace(/</g,'&lt;')}"</p><div style="display:flex;justify-content:space-between;align-items:center;gap:8px;flex-wrap:wrap"><small><b>${r.name||'-'}</b> • 📍 ${r.area||'-'} • ${r.createdAt?.toDate?r.createdAt.toDate().toLocaleDateString('id-ID'):'-'}</small><button class="btn btn-d btn-xs" onclick="hapusUlasan('${r.id}')">Hapus</button></div>${r.photoUrl?`<img src="${r.photoUrl}" style="width:100%;height:150px;object-fit:cover;border-radius:10px;margin-top:10px" onclick="window.open('${r.photoUrl}','_blank')">`:''}</div>`).join(''):'<div style="color:var(--muted)">Belum ada ulasan real dari website.</div>';
  }catch(e){ box.innerHTML='<div style="color:var(--muted)">Gagal memuat.</div>'; }
}
function hapusUlasan(id){ ask('Hapus ulasan?','Ulasan hilang dari website.',async()=>{ await window._fs.deleteDoc(window._fs.doc(window._db,'reviews',id)); toast('Ulasan dihapus 🗑️','ok'); loadUlasan(); }); }

/* ================= PENGATURAN ================= */
async function loadSettings(){
  try{
    const s=await window._fs.getDoc(window._fs.doc(window._db,'settings','store'));
    if(!s.exists()) return;
    const d=s.data();
    if(d.waAdmin) document.getElementById('setWA').value=d.waAdmin;
    if(d.announcement) document.getElementById('setAnnounce').value=d.announcement;
    if(d.announcementActive===false) document.getElementById('setAnnounceOn').checked=false;
    if(d.promoTitle) document.getElementById('setPromoT').value=d.promoTitle;
    if(d.promoDesc) document.getElementById('setPromoD').value=d.promoDesc;
    if(d.promoActive===false) document.getElementById('setPromoOn').checked=false;
    if(d.heroTitle) document.getElementById('setHeroT').value=d.heroTitle.replace(/<[^>]*>/g,'');
    if(d.heroSub) document.getElementById('setHeroS').value=d.heroSub;
  }catch(e){}
}
async function simpanSettings(){
  const wa=document.getElementById('setWA').value.replace(/[^0-9]/g,'');
  if(wa&&wa.length<10) return toast('No. WA tidak valid','err');
  await window._fs.setDoc(window._fs.doc(window._db,'settings','store'),{
    waAdmin:wa||'62817387060',
    announcement:document.getElementById('setAnnounce').value||'',
    announcementActive:document.getElementById('setAnnounceOn').checked,
    promoTitle:document.getElementById('setPromoT').value||'',
    promoDesc:document.getElementById('setPromoD').value||'',
    promoActive:document.getElementById('setPromoOn').checked,
    heroTitle:document.getElementById('setHeroT').value||'',
    heroSub:document.getElementById('setHeroS').value||'',
    updatedAt:new Date()
  },{merge:true});
  toast('Pengaturan tersimpan ✅','ok');
}
</script>
</body>
</html>
