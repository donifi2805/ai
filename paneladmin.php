<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <title>Admin Panel - AC Bekasi</title>
<style>
        :root {
            --primary: #0f172a; 
            --primary-light: #1e293b;
            --secondary: #3b82f6; 
            --accent: #10b981; 
            --danger: #ef4444; 
            --bg-main: #f1f5f9; 
            --bg-card: #ffffff; 
            --text-main: #1e293b; 
            --text-light: #64748b; 
            --border: #e2e8f0; 
            --font-main: 'Inter', system-ui, sans-serif;
            --radius-lg: 16px;
            --radius-md: 12px;
            --shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
            --glass: rgba(255, 255, 255, 0.8);
        }

        * { box-sizing: border-box; margin: 0; padding: 0; font-family: var(--font-main); user-select: none; -webkit-user-select: none; -webkit-tap-highlight-color: transparent; -webkit-touch-callout: none; -webkit-user-drag: none; }
        body { background: var(--bg-main); color: var(--text-main); font-size: 14px; overflow: hidden; height: 100vh; }

        #customToast { position: fixed; top: 20px; right: 20px; background: white; padding: 15px 20px; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.15); display: none; z-index: 9999; border-left: 4px solid var(--secondary); font-weight: 600; font-size: 13px; animation: slideIn 0.3s ease; }
        @keyframes slideIn { from { transform: translateX(100%); } to { transform: translateX(0); } }

        #login-screen { position: fixed; top:0; left:0; width:100%; height:100%; background: #0f172a; display: flex; align-items: center; justify-content: center; z-index: 5000; padding: 20px;}
        .login-box { background: white; padding: 30px; border-radius: 12px; width: 100%; max-width: 380px; box-shadow: 0 10px 25px rgba(0,0,0,0.5); }
        .login-box h2 { color: var(--primary); text-align: center; margin-bottom: 25px; font-weight: 800; }
        
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; font-size: 12px; font-weight: 700; margin-bottom: 6px; color: #475569; }
        .form-group input, .form-group select, .form-group textarea { width: 100%; padding: 10px; border: 1px solid var(--border); border-radius: 6px; outline: none; font-size: 13.5px; font-family: inherit; }
        .form-group input:focus, .form-group select:focus, .form-group textarea:focus { border-color: var(--secondary); box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.15); }
        .btn-login { width: 100%; background: var(--secondary); color: white; padding: 14px; border: none; border-radius: 6px; font-weight: bold; cursor: pointer; margin-top: 10px; font-size: 14px;}

        #admin-layout { display: none; width: 100%; height: 100%; }
        
        .sidebar { width: 280px; background: rgba(15, 23, 26, 0.98); backdrop-filter: blur(12px); color: white; display: flex; flex-direction: column; flex-shrink: 0; z-index: 2000; transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1); border-right: 1px solid rgba(255,255,255,0.05); }
        .sidebar-header { padding: 30px 20px; font-size: 1.3rem; font-weight: 900; background: linear-gradient(to bottom, rgba(255,255,255,0.03), transparent); border-bottom: 1px solid rgba(255,255,255,0.05); display: flex; align-items: center; justify-content: space-between; letter-spacing: -0.5px; }
        .close-sidebar-btn { display: none; background: none; border: none; color: white; font-size: 1.5rem; cursor: pointer; }
        
        .nav-links { list-style: none; padding: 20px 15px; flex-grow: 1; overflow-y: auto; display: flex; flex-direction: column; gap: 8px; }
        .nav-links li { padding: 12px 16px; cursor: pointer; display: flex; align-items: center; gap: 12px; color: #94a3b8; font-weight: 600; font-size: 13.5px; border-radius: var(--radius-md); transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); border: 1px solid transparent; position: relative; }
        .nav-links li:hover { background: rgba(59, 130, 246, 0.08); color: #f8fafc; transform: translateX(5px); }
        .nav-links li.active { background: linear-gradient(90deg, rgba(59, 130, 246, 0.15) 0%, rgba(59, 130, 246, 0.02) 100%); color: var(--secondary); border: 1px solid rgba(59, 130, 246, 0.2); box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); }
        .nav-links li.active::before { content: ''; position: absolute; left: 0; top: 25%; height: 50%; width: 4px; background: var(--secondary); border-radius: 0 4px 4px 0; shadow: 0 0 10px var(--secondary); }
        
        /* BADGE NOTIFIKASI PESANAN */
        .badge-notif { background: var(--danger); color: white; padding: 2px 8px; border-radius: 50px; font-size: 10px; font-weight: 800; margin-left: auto; display: none; box-shadow: 0 2px 8px rgba(239, 68, 68, 0.4); border: 1px solid rgba(255,255,255,0.1); }
        
        .logout-btn { margin: 20px; padding: 14px; background: rgba(239, 68, 68, 0.05); color: #fca5a5; text-align: center; cursor: pointer; font-weight: 700; font-size: 13px; border-radius: var(--radius-md); border: 1px solid rgba(239, 68, 68, 0.2); transition: all 0.3s ease; display: flex; align-items: center; justify-content: center; gap: 8px; }
        .logout-btn:hover { background: var(--danger); color: white; transform: translateY(-2px); box-shadow: 0 8px 20px rgba(239, 68, 68, 0.3); border-color: transparent; }

        .sidebar-overlay { display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); z-index: 1500; opacity: 0; transition: opacity 0.3s ease; }
        
        .main-content { flex-grow: 1; display: flex; flex-direction: column; overflow-y: auto; background: var(--bg-main); width: 100%; }
        .topbar { background: var(--glass); backdrop-filter: blur(10px); padding: 15px 25px; border-bottom: 1px solid var(--border); display: flex; justify-content: space-between; align-items: center; position: sticky; top: 0; z-index: 100; }
        .topbar-left { display: flex; align-items: center; gap: 15px; }
        .menu-toggle { display: none; background: none; border: none; font-size: 1.5rem; color: var(--primary); cursor: pointer; padding: 5px; }
        .topbar-title { font-size: 1.1rem; color: var(--primary); font-weight: 800;}
        .topbar-email { font-size: 12px; font-weight: 600; color: var(--text-light); background: #f1f5f9; padding: 6px 12px; border-radius: 50px;}

        .content-area { padding: 20px; }
        .page-section { display: none; animation: fadeIn 0.3s ease; }
        .page-section.active { display: block; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }

        .widget-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 15px; margin-bottom: 25px; }
        .widget-card { background: var(--bg-card); padding: 24px; border-radius: var(--radius-lg); box-shadow: var(--shadow); border: 1px solid var(--border); display: flex; flex-direction: column; gap: 8px; transition: transform 0.3s; position: relative; overflow: hidden; }
        .widget-card::after { content: ''; position: absolute; top: 0; left: 0; width: 4px; height: 100%; background: var(--secondary); }
        .widget-card:hover { transform: translateY(-5px); }
        .widget-title { font-size: 11px; color: var(--text-light); font-weight: 700; text-transform: uppercase; }
        .widget-value { font-size: 1.8rem; font-weight: 800; color: var(--primary); }

        .card { background: var(--bg-card); border-radius: 10px; padding: 20px; box-shadow: 0 2px 4px rgba(0,0,0,0.02); border: 1px solid var(--border); margin-bottom: 20px; }
        .card-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px; padding-bottom: 15px; border-bottom: 1px solid var(--border); flex-wrap: wrap; gap: 10px;}
        .card-header h3 { font-size: 1.1rem; color: var(--primary); font-weight: 700; margin: 0;}
        
        .btn-add { background: var(--secondary); color: white; border: none; padding: 10px 16px; border-radius: 6px; cursor: pointer; font-size: 12px; font-weight: 600; white-space: nowrap;}

        .filter-group { display: flex; gap: 8px; margin-bottom: 15px; flex-wrap: wrap;}
        .btn-filter { background: #f1f5f9; color: var(--text-main); border: 1px solid var(--border); padding: 6px 12px; border-radius: 50px; font-size: 11.5px; font-weight: 600; cursor: pointer; transition: 0.2s;}
        .btn-filter.active { background: var(--primary); color: white; border-color: var(--primary); }
        .btn-filter:hover:not(.active) { background: #e2e8f0; }
        
        .table-responsive { overflow-x: auto; border-radius: 6px; border: 1px solid var(--border);}
        table { width: 100%; border-collapse: collapse; font-size: 12.5px; min-width: 600px; }
        th, td { padding: 12px 15px; text-align: left; border-bottom: 1px solid var(--border); vertical-align: top; }
        th { color: var(--text-light); font-weight: 700; text-transform: uppercase; font-size: 10.5px; background: #f8fafc; white-space: nowrap;}
        
        .status-select { padding: 6px 10px; border-radius: 6px; font-size: 11.5px; font-weight: 700; border: 1px solid var(--border); outline: none; cursor: pointer; }
        .status-dipesan { background: #fef08a; color: #854d0e; }
        .status-diterima { background: #dcfce7; color: #166534; }
        .status-ditolak { background: #fee2e2; color: #991b1b; }

        .btn-action { border: none; padding: 6px 12px; border-radius: 4px; font-weight: 600; cursor: pointer; font-size: 11px; margin-right: 5px; transition: 0.2s;}
        .btn-action:hover { filter: brightness(0.9); transform: translateY(-1px);}
        .btn-delete { background: #fee2e2; color: #991b1b; }
        .btn-edit { background: #fef08a; color: #854d0e; }
        .btn-detail { background: #eff6ff; color: var(--secondary); border: 1px solid #bfdbfe; }
        
        .gallery-layout { display: grid; grid-template-columns: 1fr 2fr; gap: 20px; }

        /* MODAL KHUSUS ADMIN */
        .modal { display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(15,23,42,0.7); z-index: 9999; align-items: center; justify-content: center; backdrop-filter: blur(4px);}
        .modal-content { background: white; padding: 25px; border-radius: 12px; width: 90%; max-width: 500px; max-height: 90vh; overflow-y: auto; position: relative; }
        .close-modal { position: absolute; right: 20px; top: 20px; font-size: 20px; cursor: pointer; color: #94a3b8; }

        @media (max-width: 768px) {
            .menu-toggle { display: block; }
            .topbar-email { display: none; }
            .sidebar { position: fixed; top: 0; left: 0; height: 100%; transform: translateX(-100%); width: 85%; }
            .sidebar.open { transform: translateX(0); box-shadow: 20px 0 50px rgba(0,0,0,0.4); }
            .close-sidebar-btn { display: block; }
            .sidebar-overlay.active { display: block; opacity: 1; }
            .content-area { padding: 16px; }
            
            /* MODERN TABLE TO CARD TRANSFORMATION */
            .table-responsive { border: none; overflow: visible; }
            table, thead, tbody, th, td, tr { display: block; width: 100%; }
            thead { display: none; }
            tr { background: white; margin-bottom: 20px; border-radius: var(--radius-lg); padding: 20px; border: 1px solid var(--border); box-shadow: var(--shadow); }
            td { border: none !important; padding: 10px 0 !important; display: flex; flex-direction: column; gap: 4px; position: relative; border-bottom: 1px solid #f8fafc !important; }
            td:last-child { border-bottom: none !important; margin-top: 10px; }
            
            td::before {
                content: attr(data-label);
                font-size: 10px;
                text-transform: uppercase;
                font-weight: 800;
                color: var(--text-light);
                letter-spacing: 0.05em;
            }

            .status-select { width: 100% !important; max-width: none !important; height: 45px; font-size: 13px !important; }
            .btn-action { height: 45px; display: flex; align-items: center; justify-content: center; font-size: 14px !important; margin-bottom: 10px !important; }
        }
            .topbar-email { display: none; }
            .sidebar { position: fixed; top: 0; left: 0; height: 100%; transform: translateX(-100%); }
            .sidebar.open { transform: translateX(0); box-shadow: 4px 0 15px rgba(0,0,0,0.3); }
            .close-sidebar-btn { display: block; }
            .sidebar-overlay.active { display: block; opacity: 1; }
            .content-area { padding: 15px; }
            .card { padding: 15px; border-radius: 8px;}
            .gallery-layout { grid-template-columns: 1fr; }

            table { min-width: 100%; font-size: 10px; }
            th, td { padding: 8px 6px; }
            th { font-size: 9px; white-space: normal; }
            
            #tableOrders td { font-size: 10px !important; }
            #tableOrders td strong { font-size: 11px !important; }
            #tableOrders td span { font-size: 9.5px !important; line-height: 1.2 !important; }
            
            .status-select { padding: 4px; font-size: 9px !important; width: 100%; text-align: center; }
            
            .btn-action { padding: 6px; font-size: 9px; width: 100%; margin: 0; text-align: center; margin-bottom: 4px;}
            .btn-action:last-child { margin-bottom: 0;}
        }
    
        /* --- ADVANCED DASHBOARD STYLES --- */
        .welcome-banner { 
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%); 
            padding: 30px; 
            border-radius: var(--radius-lg); 
            color: white; 
            margin-bottom: 25px; 
            display: flex; 
            justify-content: space-between; 
            align-items: center; 
            box-shadow: var(--shadow); 
            position: relative; 
            overflow: hidden; 
            border: 1px solid rgba(255,255,255,0.05);
        }
        .welcome-banner::before { 
            content: ''; 
            position: absolute; 
            top: -50%; 
            right: -10%; 
            width: 300px; 
            height: 300px; 
            background: rgba(59, 130, 246, 0.15); 
            border-radius: 50%; 
            filter: blur(60px); 
            z-index: 1;
        }
        .welcome-text { position: relative; z-index: 2; }
        .welcome-text h1 { font-size: 1.6rem; margin-bottom: 8px; font-weight: 800; letter-spacing: -0.5px; }
        .welcome-text p { font-size: 13px; color: #94a3b8; display: flex; align-items: center; gap: 8px; }
        .live-clock-box { text-align: right; position: relative; z-index: 2; background: rgba(255,255,255,0.03); padding: 15px; border-radius: var(--radius-md); border: 1px solid rgba(255,255,255,0.05); backdrop-filter: blur(5px); }
        #live-time { font-size: 1.8rem; font-weight: 900; letter-spacing: 1px; color: #3b82f6; line-height: 1; margin-bottom: 5px; }
        #live-date { font-size: 11px; color: #94a3b8; font-weight: 700; text-transform: uppercase; }
        .status-dot { width: 10px; height: 10px; background: #10b981; border-radius: 50%; display: inline-block; box-shadow: 0 0 12px #10b981; animation: pulse-green 2s infinite; }
        @keyframes pulse-green { 0% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.7); } 70% { transform: scale(1); box-shadow: 0 0 0 10px rgba(16, 185, 129, 0); } 100% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(16, 185, 129, 0); } }
    

        /* CUSTOM MODALS */
        .c-modal-overlay { display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(15,23,42,0.8); z-index: 10000; align-items: center; justify-content: center; backdrop-filter: blur(5px); opacity: 0; transition: opacity 0.3s ease;}
        .c-modal-overlay.show { opacity: 1; }
        .c-modal-box { background: white; padding: 25px; border-radius: 16px; width: 90%; max-width: 350px; text-align: center; box-shadow: 0 20px 25px -5px rgba(0,0,0,0.1), 0 10px 10px -5px rgba(0,0,0,0.04); transform: scale(0.9); transition: transform 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275); }
        .c-modal-overlay.show .c-modal-box { transform: scale(1); }
        .c-modal-icon { font-size: 40px; margin-bottom: 15px; }
        .c-modal-title { font-size: 18px; font-weight: 800; color: var(--primary); margin-bottom: 10px; }
        .c-modal-desc { font-size: 13px; color: var(--text-light); margin-bottom: 25px; line-height: 1.5; }
        .c-modal-actions { display: flex; gap: 10px; justify-content: center; }
        .c-btn { padding: 12px 20px; border-radius: 8px; font-weight: 700; cursor: pointer; border: none; font-size: 13px; flex: 1; transition: all 0.2s; }
        .c-btn-cancel { background: #f1f5f9; color: #475569; }
        .c-btn-cancel:hover { background: #e2e8f0; }
        .c-btn-confirm { background: var(--danger); color: white; }
        .c-btn-confirm:hover { background: #dc2626; box-shadow: 0 4px 12px rgba(220, 38, 38, 0.3); }
        .c-btn-ok { background: var(--secondary); color: white; width: 100%; }
        .btn-whatsapp { background: #25D366; color: white; border: none; }
        .btn-whatsapp:hover { background: #128C7E; box-shadow: 0 4px 10px rgba(37, 211, 102, 0.3); }
        
.c-btn-ok:hover { background: #2563eb; box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3); }
</style>
  </head>
  <body oncontextmenu="return false;">

    <div id="app-splash" style="position:fixed; top:0; left:0; width:100%; height:100%; background:#0f172a; display:flex; flex-direction:column; align-items:center; justify-content:center; z-index:10000; transition: opacity 0.5s ease;">
	  <div style="font-size:60px; margin-bottom:20px; animation: pulse 2s infinite;">❄️</div>
	  <h2 style="color:white; font-weight:800; letter-spacing:1.5px; font-family:'Inter', sans-serif;">GO-AC BEKASI</h2>
	  <p style="color:#64748b; margin-top:10px; font-size:11px; text-transform:uppercase; font-weight:700;">Initializing Secure Panel...</p>
    </div>
    <style>@keyframes pulse { 0% { transform: scale(0.95); opacity:0.6; } 50% { transform: scale(1.05); opacity:1; } 100% { transform: scale(0.95); opacity:0.6; } }</style>

    <div id="customToast">Notifikasi</div>


    <div id="cAlertModal" class="c-modal-overlay">
	  <div class="c-modal-box">
		<div class="c-modal-icon">⚠️</div>
		<div class="c-modal-title">Pemberitahuan</div>
		<div class="c-modal-desc" id="cAlertMsg"></div>
		<button class="c-btn c-btn-ok" onclick="closeCustomAlert()">Mengerti</button>
	  </div>
    </div>


    <div id="cConfirmModal" class="c-modal-overlay">
	  <div class="c-modal-box">
		<div class="c-modal-icon">❓</div>
		<div class="c-modal-title">Konfirmasi Tindakan</div>
		<div class="c-modal-desc" id="cConfirmMsg">Apakah anda yakin?</div>
		<div class="c-modal-actions">
		  <button class="c-btn c-btn-cancel" onclick="closeCustomConfirm()">Batal</button>
		  <button class="c-btn c-btn-confirm" id="cConfirmBtn">Ya, Lanjutkan</button>
		</div>
	  </div>
    </div>
    <div id="voiceSettingsModal" class="modal">
	  <div class="modal-content">
		<span class="close-modal" onclick="document.getElementById('voiceSettingsModal').style.display='none'">&times;</span>
		<h3 style="margin-bottom: 15px; color: var(--primary);">⚙️ Setelan Asisten Suara</h3>

		<div class="form-group">
		  <label>Umur Suara</label>
		  <select id="vUmur">
			<option value="anak">👶 Anak Kecil</option>
			<option value="dewasa" selected>👨 Dewasa (Standar)</option>
			<option value="tua">👴 Orang Tua</option>
		  </select>
		</div>
		<div class="form-group">
		  <label>Gender Suara</label>
		  <select id="vGender">
			<option value="wanita" selected>👩 Wanita</option>
			<option value="pria">👨 Pria</option>
		  </select>
		</div>
		<div class="form-group">
		  <label>Logat / Aksen</label>
		  <select id="vLogat">
			<option value="indo" selected>🇮🇩 Indonesia Standar</option>
			<option value="jawa">🌾 Logat Jawa</option>
			<option value="sunda">🏔️ Logat Sunda</option>
		  </select>
		</div>
		<div class="form-group">
		  <label>Kecepatan Bicara: <span id="valSpeed">1.0</span>x</label>
		  <input type="range" id="vKecepatan" min="0.5" max="2.0" step="0.1" value="1.0" oninput="document.getElementById('valSpeed').innerText=this.value" style="width:100%; accent-color:var(--secondary);">
		</div>

		<div style="display:flex; gap:10px; margin-top:15px;">
		  <button class="btn-login" onclick="previewSuara()" style="background:#f59e0b; flex:1; margin-top:0;">🔊 Pratinjau</button>
		  <button class="btn-login" onclick="simpanVoiceSettings()" style="flex:1; margin-top:0;">💾 Simpan</button>
		</div>
	  </div>
    </div>
<script>
        document.addEventListener('DOMContentLoaded', () => {
            if(document.getElementById('vUmur')) document.getElementById('vUmur').value = localStorage.getItem('goac_v_umur') || 'dewasa';
            if(document.getElementById('vGender')) document.getElementById('vGender').value = localStorage.getItem('goac_v_gender') || 'wanita';
            if(document.getElementById('vLogat')) document.getElementById('vLogat').value = localStorage.getItem('goac_v_logat') || 'indo';
            const speed = localStorage.getItem('goac_v_kecepatan') || '1.0';
            if(document.getElementById('vKecepatan')) {
                document.getElementById('vKecepatan').value = speed;
                document.getElementById('valSpeed').innerText = speed;
            }
        });
        function simpanVoiceSettings() {
            localStorage.setItem('goac_v_umur', document.getElementById('vUmur').value);
            localStorage.setItem('goac_v_gender', document.getElementById('vGender').value);
            localStorage.setItem('goac_v_logat', document.getElementById('vLogat').value);
            localStorage.setItem('goac_v_kecepatan', document.getElementById('vKecepatan').value);
            document.getElementById('voiceSettingsModal').style.display='none';
            window.showToast("✅ Setelan Suara Disimpan!");
        }
                function previewSuara() {
            if(window.AndroidControl && window.AndroidControl.previewVoice) {
                let u = document.getElementById('vUmur').value;
                let g = document.getElementById('vGender').value;
                let k = parseFloat(document.getElementById('vKecepatan').value);
                window.AndroidControl.previewVoice(u, g, k);
            } else {
                window.customAlert("Pratinjau hanya berfungsi saat aplikasi di HP Android.");
            }
        }
</script>

	<div class="sidebar-overlay" id="sidebarOverlay" onclick="toggleSidebar()"></div>

    <div id="serviceModal" class="modal">
	  <div class="modal-content">
		<span class="close-modal" onclick="closeModal('serviceModal')">&times;</span>
		<h3 id="serviceModalTitle" style="margin-bottom: 20px; color: var(--primary);">Tambah Data Baru</h3>
		<form id="formService">
		  <input type="hidden" id="srvDocId" value="">
		  <input type="hidden" id="srvOldImgUrl" value="">
		  <div class="form-group">
			<label>Kategori</label>
			<select id="srvCategory" required onchange="toggleAcFields()">
			  <option value="beli_ac">📦 Beli AC Baru & Instalasi</option>
			  <option value="cuci">❄️ Cuci & Perawatan</option>
			  <option value="bongkar_pasang">🔧 Pasang / Bongkar Relokasi</option>
			  <option value="servis">🛠️ Servis Perbaikan</option>
			</select>
		  </div>
		  <div class="form-group"><label>Nama Produk / Layanan</label><input type="text" id="srvName" placeholder="Cth: Sharp 0.5 PK + Pasang" required></div>
		  <div class="form-group"><label>Harga Tampil (Teks)</label><input type="text" id="srvPriceText" placeholder="Cth: Rp 2.850.000" required></div>
		  <div class="form-group"><label>Deskripsi Singkat</label><textarea id="srvDesc" rows="2" placeholder="Cth: Unit baru garansi pabrik..."></textarea></div>

		  <div id="extraFieldsAC" style="background: #f8fafc; padding: 15px; border-radius: 8px; border: 1px dashed #cbd5e1; margin-bottom: 15px; display: block;">
			<h4 style="font-size: 12px; margin-bottom: 10px; color: var(--secondary);">Khusus Kategori AC Baru</h4>
			<div class="form-group">
			  <label>Spesifikasi AC (Tulis 1 spek per baris)</label>
			  <textarea id="srvSpecs" rows="4" placeholder="Daya Listrik: 344 Watt&#10;Kapasitas: 5000 BTU/h&#10;Refrigerant: R32"></textarea>
			</div>
			<div class="form-group">
			  <label>Unggah Foto Produk <span id="imgStatus" style="color:var(--accent);font-weight:normal;"></span></label>
			  <input type="file" id="srvImgFile" accept="image/*" capture="environment" style="background: white;">
			</div>
		  </div>
		  <button type="submit" id="btnSubmitService" class="btn-login" style="width: 100%;">💾 Simpan Data</button>
		</form>
	  </div>
    </div>

    <div id="adminOrderDetailModal" class="modal">
	  <div class="modal-content">
		<span class="close-modal" onclick="closeModal('adminOrderDetailModal')">&times;</span>
		<h3 style="margin-bottom: 5px; color: var(--primary);">Detail Lengkap Pesanan</h3>
		<p style="font-size: 11px; color: var(--text-muted); margin-bottom: 20px;" id="aodDate">-</p>

		<div style="background:#f8fafc; padding:15px; border-radius:8px; font-size:12px; border:1px solid var(--border); margin-bottom:15px;">
		  <div style="display:flex; justify-content:space-between; margin-bottom:8px; border-bottom:1px dashed #e2e8f0; padding-bottom:8px;">
			<span style="color:var(--text-muted);">ID Transaksi</span>
			<span id="aodId" style="font-family:monospace; font-weight:700; cursor:pointer;" onclick="window.copyToClipboard(this.innerText)" title="Klik untuk salin ID"></span>
		  </div>
		  <div style="display:flex; justify-content:space-between; margin-bottom:8px; border-bottom:1px dashed #e2e8f0; padding-bottom:8px;">
			<span style="color:var(--text-muted);">Status</span>
			<span id="aodStatus" style="font-weight:700; color:var(--accent);"></span>
		  </div>
		  <div style="display:flex; justify-content:space-between; margin-bottom:8px; border-bottom:1px dashed #e2e8f0; padding-bottom:8px;">
			<span style="color:var(--text-muted);">Jadwal Teknisi</span>
			<span id="aodTanggal" style="font-weight:700;"></span>
		  </div>
		  <div style="display:flex; justify-content:space-between;">
			<span style="color:var(--text-muted);">Akun (Email)</span>
			<span id="aodEmail" style="font-weight:700; color:var(--secondary);"></span>
		  </div>
		</div>

		<h4 style="font-size: 12px; margin-bottom: 8px;">Daftar Layanan Dipesan:</h4>
		<div id="aodItemsList" style="background:#f8fafc; padding:15px; border-radius:8px; font-size:12px; border:1px solid var(--border); margin-bottom:15px;"></div>

		<div style="background: #eff6ff; border:1px solid #bfdbfe; padding:15px; border-radius:8px; font-size:12px; margin-bottom:15px; display:flex; justify-content:space-between;">
		  <span style="color: var(--primary); font-size: 14px; font-weight: bold;">TOTAL TAGIHAN</span>
		  <span id="aodTotal" style="color: var(--primary); font-size: 16px; font-weight: 900;">Rp 0</span>
		</div>

		<h4 style="font-size: 12px; margin-bottom: 8px;">Lokasi & Kontak Pengerjaan:</h4>
		<div style="background:#f8fafc; padding:15px; border-radius:8px; font-size:12px; border:1px solid var(--border); margin-bottom:15px;">
		  <div style="display:flex; justify-content:space-between; margin-bottom:8px; border-bottom:1px dashed #e2e8f0; padding-bottom:8px;">
			<span style="color:var(--text-muted);">Atas Nama</span>
			<span id="aodNama" style="font-weight:700;"></span>
		  </div>
		  <div style="display:flex; justify-content:space-between; margin-bottom:8px; border-bottom:1px dashed #e2e8f0; padding-bottom:8px;">
			<span style="color:var(--text-muted);">Area / Wilayah</span>
			<span id="aodArea" style="font-weight:700;"></span>
		  </div>
		  <div style="display:flex; flex-direction:column;">
			<span style="color:var(--text-muted); margin-bottom:5px;">Alamat Lengkap</span>
			<span id="aodAlamat" style="font-weight:600; line-height:1.5;"></span>
		  </div>
		</div>

		<button class="btn-full" style="background: var(--primary); width: 100%; padding:12px; color:white; border:none; border-radius:6px; cursor:pointer; font-weight:bold;" onclick="closeModal('adminOrderDetailModal')">Tutup Rincian</button>
	  </div>
    </div>

    <div id="login-screen">
	  <div class="login-box">
		<h2>Admin Dasbor</h2>
		<form id="adminLoginForm">
		  <div class="form-group"><label>Email Admin</label><input type="email" id="adminEmail" required></div>
		  <div class="form-group"><label>Kata Sandi</label><input type="password" id="adminPassword" required></div>
		  <button type="submit" class="btn-login">Masuk Sistem</button>
		</form>
	  </div>
    </div>

    <div id="admin-layout">
	  <aside class="sidebar" id="appSidebar">
		<div class="sidebar-header"><span>❄️ Panel Admin</span><button class="close-sidebar-btn" onclick="toggleSidebar()">&times;</button></div>
		<ul class="nav-links">
		  <li class="active" onclick="switchMenu('dashboard', this)">📊 Dasbor Utama</li>
		  <li onclick="switchMenu('orders', this)">🛒 Pesanan Masuk <span id="sidebarNotifOrder" class="badge-notif">0</span></li>
		  <li onclick="switchMenu('services', this)">🏷️ Manajemen Katalog</li>
		  <li onclick="switchMenu('users', this)">👥 Database Pelanggan</li>
		  <li onclick="switchMenu('gallery', this)">📸 Dokumentasi Kerja</li>

		  <li onclick="switchMenu('youtube', this)">🎥 Video YouTube</li>
		</ul>
		<div class="logout-btn" onclick="logoutAdmin()">Keluar Sistem ➔</div>
	  </aside>

	  <main class="main-content">
		<div class="topbar">
		  <div class="topbar-left">
			<button class="menu-toggle" onclick="toggleSidebar()">☰</button>
			<h2 class="topbar-title">AC Bekasi</h2>
			<select id="notifMode" onchange="changeNotifMode(this)" style="margin-left:15px; padding:6px 10px; border-radius:6px; background:#eff6ff; font-size:11px; border:1px solid #bfdbfe; font-weight:800; color:var(--secondary); outline:none; cursor:pointer; box-shadow: 0 2px 5px rgba(0,0,0,0.05);">
			  <option value="normal">🔔 Notif Biasa</option>
			  <option value="voice">🗣️ Asisten Suara</option>
			</select>
			<button onclick="document.getElementById('voiceSettingsModal').style.display='flex'" style="margin-left:8px; padding:6px; background:#f1f5f9; border:1px solid #cbd5e1; border-radius:6px; cursor:pointer; box-shadow: 0 2px 5px rgba(0,0,0,0.05);">⚙️</button>
		  </div>
<script>
                    function changeNotifMode(elem) {
                        localStorage.setItem('goac_notif_mode', elem.value);
                        const t = document.getElementById('customToast'); 
                        t.innerText = "Mode Diubah: " + (elem.value === 'voice' ? "🗣️ Asisten Suara" : "🔔 Notif Biasa"); 
                        t.style.display = 'block'; 
                        setTimeout(() => t.style.display = 'none', 3000);
                    }
                    document.addEventListener('DOMContentLoaded', () => {
                        const savedMode = localStorage.getItem('goac_notif_mode') || 'normal';
                        if(document.getElementById('notifMode')) document.getElementById('notifMode').value = savedMode;
                    });
</script>
		  <div class="topbar-email" id="topbar-email">Memuat...</div>
		</div>

		<div class="content-area">

		  <div id="sec-dashboard" class="page-section active">
			<div class="welcome-banner">
			  <div class="welcome-text">
				<h1 id="greeting-msg">Memuat Sapaan...</h1>
				<p><span class="status-dot"></span> Go-AC Bekasi Dashboard Aktif</p>
			  </div>
			  <div class="live-clock-box">
				<div id="live-time">00:00:00</div>
				<div id="live-date">...</div>
			  </div>
			</div>

			<div class="widget-grid">
			  <div class="widget-card" style="border-bottom: 4px solid var(--secondary); border-radius: 16px;"><span class="widget-title">Total Pesanan</span><span class="widget-value" id="countOrders">0</span></div>
			  <div class="widget-card" style="border-bottom: 4px solid var(--accent); border-radius: 16px;"><span class="widget-title">Total Layanan</span><span class="widget-value" id="countServices">0</span></div>
			  <div class="widget-card" style="border-bottom: 4px solid #8b5cf6; border-radius: 16px;"><span class="widget-title">Pelanggan</span><span class="widget-value" id="countUsers">0</span></div>
			  <div class="widget-card" style="border-bottom: 4px solid #f59e0b; border-radius: 16px;"><span class="widget-title">Galeri Foto</span><span class="widget-value" id="countGallery">0</span></div>
			</div>
		  </div>
		</div>

		<div id="sec-orders" class="page-section">
		  <div class="card">
			<div class="card-header">
			  <h3>Daftar Pesanan Pelanggan</h3>
			  <button class="btn-add" style="background:#8b5cf6; margin-right:10px;" onclick="aktifkanAutostart()">🛡️ Izin Autostart</button>
			</div>
			<div class="table-responsive">
			  <table>
				<thead><tr><th>Waktu Order</th><th>Pelanggan & Lokasi</th><th>Layanan</th><th>Total & Status</th><th>Aksi</th></tr></thead>
				<tbody id="tableOrders"><tr><td colspan="5" style="text-align: center;">Memuat data live...</td></tr></tbody>
			  </table>
			</div>
		  </div>
		</div>

		<div id="sec-services" class="page-section">
		  <div class="card">
			<div class="card-header">
			  <h3>Manajemen Katalog & Layanan</h3>
			  <button class="btn-add" onclick="openAddServiceModal()">➕ Tambah Baru</button>
			</div>
			<div class="filter-group">
			  <button class="btn-filter active" onclick="filterServices('all', this)">Semua</button>
			  <button class="btn-filter" onclick="filterServices('beli_ac', this)">AC Baru</button>
			  <button class="btn-filter" onclick="filterServices('cuci', this)">Cuci AC</button>
			  <button class="btn-filter" onclick="filterServices('bongkar_pasang', this)">Bongkar/Pasang</button>
			  <button class="btn-filter" onclick="filterServices('servis', this)">Servis Perbaikan</button>
			</div>
			<div class="table-responsive">
			  <table>
				<thead><tr><th>Kategori</th><th>Nama Item</th><th>Harga</th><th>Aksi</th></tr></thead>
				<tbody id="tableServices"><tr><td colspan="4" style="text-align: center;">Memuat katalog...</td></tr></tbody>
			  </table>
			</div>
		  </div>
		</div>

		<div id="sec-users" class="page-section">
		  <div class="card">
			<div class="card-header"><h3>Database Pelanggan</h3></div>
			<div class="table-responsive">
			  <table>
				<thead><tr><th>Username</th><th>Email / Kontak</th><th>Tgl Terdaftar</th></tr></thead>
				<tbody id="tableUsers"><tr><td colspan="3" style="text-align: center;">Memuat...</td></tr></tbody>
			  </table>
			</div>
		  </div>
		</div>

		<div id="sec-gallery" class="page-section">
		  <div class="gallery-layout">
			<div class="card" style="height: max-content;">
			  <div class="card-header"><h3>Unggah Dokumentasi</h3></div>
			  <div class="form-group"><label>Judul Pekerjaan</label><input type="text" id="galTitle" placeholder="Cth: Cuci AC Perumahan..."></div>
			  <div class="form-group"><label>Pilih File Foto</label><input type="file" id="galFile" accept="image/*" style="padding: 10px; background: #f8fafc;"></div>
			  <button class="btn-add" style="width: 100%; padding: 14px; display:flex; justify-content:center;" onclick="uploadFotoGaleri()">🚀 Simpan Dokumentasi</button>
			</div>
			<div class="card">
			  <div class="card-header"><h3>Daftar Foto Dokumentasi</h3></div>
			  <div class="table-responsive">
				<table>
				  <thead><tr><th>Preview</th><th>Pekerjaan</th><th>Aksi</th></tr></thead>
				  <tbody id="tableGallery"><tr><td colspan="3" style="text-align: center;">Memuat...</td></tr></tbody>
				</table>
			  </div>
			</div>
		  </div>
		</div>


		<div id="sec-youtube" class="page-section">
		  <div class="gallery-layout">
			<div class="card" style="height: max-content;">
			  <div class="card-header"><h3>Tambah Video YouTube</h3></div>
			  <div class="form-group"><label>Judul Video</label><input type="text" id="ytTitle" placeholder="Cth: Proses Cuci AC Split..."></div>
			  <div class="form-group"><label>Link / ID YouTube</label><input type="text" id="ytLink" placeholder="Cth: https://youtu.be/abc123xyz atau abc123xyz"></div>
			  <button class="btn-add" style="width: 100%; padding: 14px; display:flex; justify-content:center; background: #ef4444;" onclick="simpanVideoYouTube()">🚀 Simpan Video</button>
			</div>
			<div class="card">
			  <div class="card-header"><h3>Daftar Video YouTube</h3></div>
			  <div class="table-responsive">
				<table>
				  <thead><tr><th>Preview</th><th>Judul & ID</th><th>Aksi</th></tr></thead>
				  <tbody id="tableYouTube"><tr><td colspan="3" style="text-align: center;">Memuat...</td></tr></tbody>
				</table>
			  </div>
			</div>
		  </div>
		</div>

	</div>
	</main>
    </div>

<script>
        function toggleSidebar() {
            document.getElementById('appSidebar').classList.toggle('open');
            document.getElementById('sidebarOverlay').classList.toggle('active');
        }
        
        function aktifkanAutostart() {
            if(window.AndroidControl) {
                window.AndroidControl.openAutostartSettings();
                window.customAlert("Cari aplikasi Go-AC Admin dan aktifkan izin Autostart agar notifikasi selalu muncul.");
            }
        }
function switchMenu(page, elem) {
            document.querySelectorAll('.nav-links li').forEach(li => li.classList.remove('active'));
            elem.classList.add('active');
            document.querySelectorAll('.page-section').forEach(sec => sec.classList.remove('active'));
            document.getElementById('sec-' + page).classList.add('active');
            if(window.innerWidth <= 768) toggleSidebar();
        }
        function closeModal(id) { 
            document.getElementById(id).style.display = 'none'; 
            if(id === 'serviceModal') document.getElementById('formService').reset(); 
        }

        function toggleAcFields() {
            const category = document.getElementById('srvCategory').value;
            const extraFields = document.getElementById('extraFieldsAC');
            if(category === 'beli_ac') extraFields.style.display = 'block';
            else extraFields.style.display = 'none';
        }

        function openAddServiceModal() {
            document.getElementById('formService').reset();
            document.getElementById('srvDocId').value = ""; 
            document.getElementById('srvOldImgUrl').value = ""; 
            document.getElementById('serviceModalTitle').innerText = "Tambah Data Baru";
            document.getElementById('btnSubmitService').innerText = "➕ Tambah Data";
            document.getElementById('imgStatus').innerText = "";
            toggleAcFields(); 
            document.getElementById('serviceModal').style.display = 'flex';
        }
</script>

<script type="module">
        import { initializeApp } from "https://www.gstatic.com/firebasejs/10.8.0/firebase-app.js";
        import { getAuth, signInWithEmailAndPassword, onAuthStateChanged, signOut } from "https://www.gstatic.com/firebasejs/10.8.0/firebase-auth.js";
        import { getFirestore, collection, getDocs, addDoc, deleteDoc, doc, updateDoc, query, orderBy, onSnapshot } from "https://www.gstatic.com/firebasejs/10.8.0/firebase-firestore.js";

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

        window.servicesCache = []; 
        window.adminOrdersCache = []; 
        window.usersDictCache = {}; 
        window.adminOrdersUnsubscribe = null;

        window.customAlert = function(msg) { document.getElementById('cAlertMsg').innerText = msg; const m = document.getElementById('cAlertModal'); m.style.display = 'flex'; setTimeout(() => m.classList.add('show'), 10); };
        window.closeCustomAlert = function() { const m = document.getElementById('cAlertModal'); m.classList.remove('show'); setTimeout(() => m.style.display = 'none', 300); };
        window.customConfirmAction = null;
        window.customConfirm = function(msg, callback) { document.getElementById('cConfirmMsg').innerText = msg; window.customConfirmAction = callback; const m = document.getElementById('cConfirmModal'); m.style.display = 'flex'; setTimeout(() => m.classList.add('show'), 10); document.getElementById('cConfirmBtn').onclick = function() { window.closeCustomConfirm(); if(window.customConfirmAction) window.customConfirmAction(); }; };
        window.closeCustomConfirm = function() { const m = document.getElementById('cConfirmModal'); m.classList.remove('show'); setTimeout(() => m.style.display = 'none', 300); };

        
        window.copyToClipboard = function(text) {
            if (!text || text === '-') return;
            if (window.AndroidControl && window.AndroidControl.copyToClipboard) {
                window.AndroidControl.copyToClipboard(text);
            } else {
                navigator.clipboard.writeText(text).then(() => {
                    window.showToast("📋 Berhasil disalin!");
                });
            }
        };
window.showToast = function(msg) {
            const t = document.getElementById('customToast'); t.innerText = msg; t.style.display = 'block';
            setTimeout(() => t.style.display = 'none', 3000);
        }

        const URL_UPLOAD_PHP = 'https://servisacbekasi.my.id/gambarac/upload.php';

        const allowedAdminEmails = ['doni888855519@gmail.com', 'setiatehnik09@gmail.com', 'cahyokukuh94@gmail.com'];
        onAuthStateChanged(auth, (user) => {
            const splash = document.getElementById('app-splash');
            if(splash) { 
                splash.style.opacity = '0';
                setTimeout(() => splash.remove(), 600);
            }
            if (user) {
                if (!allowedAdminEmails.includes(user.email)) {
                    signOut(auth);
                    window.customAlert("Akses Ditolak: Email Anda tidak memiliki izin admin.");
                    return;
                }
                document.getElementById('login-screen').style.display = 'none';
                document.getElementById('admin-layout').style.display = 'flex';
                                document.getElementById('topbar-email').innerText = "👋 Admin : " + user.email;
                
                // --- DASHBOARD CLOCK & GREETING LOGIC ---
                function updateDashboardMeta() {
                    const now = new Date();
                    const hours = now.getHours();
                    let greeting = "Selamat Malam";
                    if (hours < 11) greeting = "Selamat Pagi";
                    else if (hours < 15) greeting = "Selamat Siang";
                    else if (hours < 18) greeting = "Selamat Sore";
                    
                    const greetEl = document.getElementById('greeting-msg');
                    if(greetEl) greetEl.innerText = `${greeting}, Doni!`;

                    const timeStr = now.toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit', second: '2-digit', hour12: false });
                    const dateStr = now.toLocaleDateString('id-ID', { weekday: 'long', day: 'numeric', month: 'long', year: 'numeric' });
                    
                    const timeEl = document.getElementById('live-time');
                    const dateEl = document.getElementById('live-date');
                    if(timeEl) timeEl.innerText = timeStr;
                    if(dateEl) dateEl.innerText = dateStr;
                }
                setInterval(updateDashboardMeta, 1000);
                updateDashboardMeta();

                
                // Load data
                window.loadUsers().then(() => { window.loadOrdersLive(); });
                window.loadYouTube();
                
window.loadGallery(); 
                window.loadServices();
            } else {
                document.getElementById('login-screen').style.display = 'flex';
                document.getElementById('admin-layout').style.display = 'none';
                if(window.adminOrdersUnsubscribe) window.adminOrdersUnsubscribe();
            }
        });

        document.getElementById('adminLoginForm').addEventListener('submit', async (e) => {
            e.preventDefault();
            const inputEmail = document.getElementById('adminEmail').value;
            const allowedAdminEmails = ['doni888855519@gmail.com', 'setiatehnik09@gmail.com', 'cahyokukuh94@gmail.com'];
            if (!allowedAdminEmails.includes(inputEmail)) {
                window.customAlert("Akses Ditolak: Email tidak terdaftar sebagai admin.");
                return;
            }
            try { await signInWithEmailAndPassword(auth, inputEmail, document.getElementById('adminPassword').value); window.showToast("Berhasil Login!");
            } catch (err) { window.customAlert("Email atau sandi salah."); }
        });

        window.logoutAdmin = function() { 
            if(window.adminOrdersUnsubscribe) window.adminOrdersUnsubscribe();
            signOut(auth).then(() => { window.showToast("Keluar."); }); 
        }

        async function uploadFileHelper(file) {
            const formData = new FormData(); formData.append("file", file);
            try {
                const response = await fetch(URL_UPLOAD_PHP, { method: 'POST', body: formData });
                const result = await response.json();
                if(result.status === "success") return result.url;
                else throw new Error(result.message);
            } catch(e) { throw new Error("Gagal terhubung ke upload.php"); }
        }

        // ================= PENGGUNA =================
        window.loadUsers = async function() {
            try {
                const snapshot = await getDocs(collection(db, "users"));
                const countEl = document.getElementById('countUsers'); if(countEl) countEl.innerText = snapshot.size; 
                const tb = document.getElementById('tableUsers'); if(tb) tb.innerHTML = '';
                
                if (snapshot.empty) { if(tb) tb.innerHTML = `<tr><td colspan="3" style="text-align:center;">Belum ada pelanggan terdaftar.</td></tr>`; return; }

                window.usersDictCache = {}; 

                snapshot.forEach(docSnap => {
                    const data = docSnap.data();
                    let dateStr = "-";
                    if(data.createdAt) { try { if (typeof data.createdAt.toDate === 'function') { dateStr = data.createdAt.toDate().toLocaleDateString('id-ID'); } } catch(err) {} }
                    
                    let uName = data.username ? data.username : 'Tanpa Nama';
                    let uEmail = data.email ? data.email : '-';
                    
                    window.usersDictCache[docSnap.id] = uName;

                    if(tb) {
                        tb.innerHTML += `<tr><td><strong>👤 ${uName}</strong></td><td>${uEmail}</td><td style="font-size:12px;">${dateStr}</td></tr>`;
                    }
                });
            } catch(e) { console.error("Gagal load user:", e); }
        }

        // ================= PESANAN (KOLOM DIGABUNG AGAR LEBIH KECIL) =================
        let isInitialLoad = true;
                window.loadOrdersLive = function() {
            const countEl = document.getElementById('countOrders');
            const tb = document.getElementById('tableOrders');
            const notifBadge = document.getElementById('sidebarNotifOrder');
            
            if (window.adminOrdersUnsubscribe) window.adminOrdersUnsubscribe();

            let initialDataCheck = true; // Gunakan variabel lokal agar lebih stabil

            window.adminOrdersUnsubscribe = onSnapshot(collection(db, "orders"), (snapshot) => {
                snapshot.docChanges().forEach((change) => {
                    if (change.type === "added" && !initialDataCheck) {
                        const data = change.doc.data();
                        if (window.AndroidControl) {
                            let nama = data.namaPengorder || "Pelanggan";
                            let lokasi = data.lokasi || data.alamat || "Cek Detail";
                            let items = data.items ? data.items.map(it => it.nama).join(", ") : "-";
                            let total = "Rp " + (data.total || 0).toLocaleString('id-ID');
                            
                            let pesanNotif = `Dari: ${nama}\nLokasi: ${lokasi}\nJasa: ${items}\nTotal: ${total}`;
                            
                            let useVoice = localStorage.getItem('goac_notif_mode') === 'voice';
                            let u = localStorage.getItem('goac_v_umur') || 'dewasa';
                            let g = localStorage.getItem('goac_v_gender') || 'wanita';
                            let k = parseFloat(localStorage.getItem('goac_v_kecepatan') || '1.0');
                            
                            window.AndroidControl.sendNotification("Pesanan Baru! ❄️", pesanNotif, useVoice, u, g, k);
                        }
                    }
                });
                initialDataCheck = false;

                if (snapshot.empty) {
                    if(countEl) countEl.innerText = "0";
                    tb.innerHTML = `<tr><td colspan="5" style="text-align:center;">Belum ada pesanan masuk.</td></tr>`;
                    window.adminOrdersCache = [];
                    return;
                }
                // ... sisa kode render tabel tetap sama ...

                if (snapshot.empty) {
                    if(countEl) countEl.innerText = "0";
                    tb.innerHTML = `<tr><td colspan="5" style="text-align:center;">Belum ada pesanan masuk.</td></tr>`;
                    window.adminOrdersCache = [];
                    if(notifBadge) notifBadge.style.display = 'none';
                    return;
                }

                if(countEl) countEl.innerText = snapshot.size;

                let ordersData = [];
                let unreadCount = 0; 

                snapshot.forEach(doc => {
                    const d = doc.data();
                    ordersData.push({id: doc.id, ...d});
                    if(d.status === "Dipesan") unreadCount++;
                });
                
                ordersData.sort((a,b) => { 
                    let t1 = a.createdAt ? a.createdAt.toMillis() : 0; 
                    let t2 = b.createdAt ? b.createdAt.toMillis() : 0; 
                    return t2 - t1; 
                });

                if(notifBadge) {
                    if(unreadCount > 0) {
                        notifBadge.innerText = unreadCount;
                        notifBadge.style.display = 'inline-block';
                    } else {
                        notifBadge.style.display = 'none';
                    }
                }

                window.adminOrdersCache = ordersData; 
                tb.innerHTML = '';

                ordersData.forEach((data, index) => {
                    let dateStr = data.createdAt ? data.createdAt.toDate().toLocaleDateString('id-ID', {day:'numeric', month:'short', hour:'2-digit', minute:'2-digit'}) : "-";
                    let itemsStr = ''; if(data.items) data.items.forEach(it => { itemsStr += `• ${it.nama}<br>`; });
                    let selectColor = data.status === "Di Terima" ? "status-diterima" : data.status === "Di Tolak" ? "status-ditolak" : "status-dipesan";
                    
                    let theUsername = window.usersDictCache[data.userId] || "Tanpa Username";
                    let thePemesan = data.namaPengorder || "-";

                    tb.innerHTML += `
                        <tr>
                            <td data-label="Waktu" style="font-size:11px; color:#64748b; white-space:nowrap;">${dateStr}</td>
                            <td data-label="Pelanggan">
                                <strong style="color:var(--primary); font-size:13px;">👤 ${theUsername}</strong><br>
                                <span style="font-size:11px; color:var(--text-main); display:inline-block; margin-top:2px;">A/n: <strong>${thePemesan}</strong></span><br>
                                <span style="font-size:10px; color:#64748b;">✉️ ${data.email}</span><br><span style="font-size:10px; color:#25D366; font-weight:700; cursor:pointer;" onclick="window.copyToClipboard('${data.whatsappUser || ''}')" title="Klik untuk salin nomor">📱 WA: ${data.whatsappUser || '-'}</span>
                            </td>
                            <td data-label="Layanan" style="font-size:11px; min-width: 150px;">${itemsStr}</td>
                            <td data-label="Total & Status">
                                <div style="font-weight:900; color:var(--accent); font-size:13px; margin-bottom:6px; white-space:nowrap;">Rp ${(data.total||0).toLocaleString('id-ID')}</div>
                                <select class="status-select ${selectColor}" onchange="updateStatusPesanan('${data.id}', this)" style="width:100%; max-width:120px;">
                                    <option value="Dipesan" ${data.status==='Dipesan'?'selected':''}>Dipesan</option>
                                    <option value="Di Terima" ${data.status==='Di Terima'?'selected':''}>Di Terima</option>
                                    <option value="Di Tolak" ${data.status==='Di Tolak'?'selected':''}>Di Tolak</option>
                                </select>
                            </td>
                            <td data-label="Aksi" style="vertical-align:top;">
                                <button class="btn-action btn-whatsapp" style="display:block; width:100%; margin-bottom:5px;" onclick="window.hubungiPengorderViaWA('${data.whatsappUser}', '${thePemesan}')">💬 Hubungi WA</button>
                                <button class="btn-action btn-detail" style="display:block; width:100%; margin-bottom:5px;" onclick="openAdminOrderDetail(${index})">Lihat Detail</button>
                                <button class="btn-action btn-delete" style="display:block; width:100%;" onclick="hapusPesananUser('${data.id}')">Hapus</button>
                            </td>
                        </tr>
                    `;
                });
            }, (error) => {
                console.error("Error Realtime Orders:", error);
                tb.innerHTML = `<tr><td colspan="5" style="text-align:center; color:red;">Koneksi Live Terputus. Silakan Refresh Web.</td></tr>`;
            });
        }

        window.updateStatusPesanan = async function(id, el) {
            el.className = 'status-select';
            if(el.value === "Dipesan") el.classList.add("status-dipesan");
            if(el.value === "Di Terima") el.classList.add("status-diterima");
            if(el.value === "Di Tolak") el.classList.add("status-ditolak");
            try { await updateDoc(doc(db, "orders", id), { status: el.value }); window.showToast(`Status -> ${el.value}`); } 
            catch(e) { window.customAlert("Gagal update!"); }
        }

        // FUNGSI HAPUS PESANAN OLEH ADMIN
        window.hapusPesananUser = async function(orderId) {
            window.customConfirm("Hapus pesanan ini secara permanen? Data ini akan hilang dari riwayat pelanggan!", async () => {
                try {
                    await deleteDoc(doc(db, "orders", orderId));
                    window.showToast("🗑️ Pesanan dihapus.");
                } catch(e) { window.customAlert("Gagal menghapus: " + e.message); }
            });
        }

        // FUNGSI MEMBUKA POP-UP DETAIL PESANAN DI ADMIN
        window.hubungiPengorderViaWA = function(noWA, nama) {
            if(!noWA || noWA === '-') return window.customAlert("Nomor WhatsApp tidak tersedia untuk pesanan ini.");
            const pesan = `Halo ${nama}, kami dari Admin *Go-AC Bekasi*. Ingin mengonfirmasi pesanan Anda yang telah masuk ke sistem kami. Mohon ditunggu ya!`;
            window.open(`https://wa.me/${noWA}?text=${encodeURIComponent(pesan)}`, '_blank');
        };

        
window.openAdminOrderDetail = function(index) {
            const data = window.adminOrdersCache[index];
            if(!data) return;

            document.getElementById('aodId').innerText = data.id;
            document.getElementById('aodDate').innerText = data.createdAt ? "Dibuat pada: " + data.createdAt.toDate().toLocaleDateString('id-ID', {day:'numeric',month:'short',year:'numeric',hour:'2-digit',minute:'2-digit'}) + " WIB" : "-";
            document.getElementById('aodStatus').innerText = data.status || 'Dipesan';
            document.getElementById('aodTanggal').innerText = data.tanggalPengerjaan || '-';
            document.getElementById('aodEmail').innerText = data.email || '-';
            
            let itemsHtml = '';
            if(data.items) {
                data.items.forEach(it => {
                    itemsHtml += `<div style="display:flex; justify-content:space-between; margin-bottom:8px; border-bottom:1px dashed #e2e8f0; padding-bottom:8px;"><span style="font-weight:600; color:var(--text-dark);">${it.nama}</span><span style="font-weight:600;">${it.harga}</span></div>`;
                });
            }
            document.getElementById('aodItemsList').innerHTML = itemsHtml;
            document.getElementById('aodTotal').innerText = "Rp " + (data.total||0).toLocaleString('id-ID');
            document.getElementById('aodNama').innerText = data.namaPengorder || data.email;
            document.getElementById('aodArea').innerText = data.lokasi || '-';
            document.getElementById('aodAlamat').innerText = data.alamat || '-';

            document.getElementById('adminOrderDetailModal').style.display = 'flex';
        }

        // ================= MANAJEMEN KATALOG & LAYANAN (TAMBAH & EDIT) =================
        document.getElementById('formService').addEventListener('submit', async (e) => {
            e.preventDefault();
            const btn = e.target.querySelector('button[type="submit"]');
            btn.innerText = "⏳ Memproses..."; btn.disabled = true;

            const docId = document.getElementById('srvDocId').value; 
            const oldImgUrl = document.getElementById('srvOldImgUrl').value;
            const kategori = document.getElementById('srvCategory').value;
            const nama = document.getElementById('srvName').value;
            const harga = document.getElementById('srvPriceText').value;
            const desc = document.getElementById('srvDesc').value;
            const fileInput = document.getElementById('srvImgFile');
            
            const rawSpecs = document.getElementById('srvSpecs').value;
            let parsedSpecs = "";
            if (rawSpecs.trim() !== "") {
                const lines = rawSpecs.split('\n');
                parsedSpecs = "<ul>";
                lines.forEach(line => { if(line.trim() !== "") parsedSpecs += `<li>${line.trim()}</li>`; });
                parsedSpecs += "</ul>";
            }

            try {
                let finalImgUrl = oldImgUrl; 
                if(kategori === 'beli_ac' && fileInput.files.length > 0) finalImgUrl = await uploadFileHelper(fileInput.files[0]);
                else if (kategori !== 'beli_ac') { finalImgUrl = ""; parsedSpecs = ""; }

                const dataToSave = { kategori: kategori, nama: nama, harga: harga, desc: desc, specs: parsedSpecs, imgUrl: finalImgUrl, timestamp: new Date() };

                if(docId) { await updateDoc(doc(db, "services", docId), dataToSave); window.showToast("✅ Data berhasil diperbarui!"); } 
                else { await addDoc(collection(db, "services"), dataToSave); window.showToast("✅ Item baru berhasil ditambahkan!"); }

                closeModal('serviceModal'); window.loadServices();
            } catch (error) { window.customAlert("Error: " + error.message); }
            btn.disabled = false;
        });

        window.loadServices = async function() {
            try {
                const snapshot = await getDocs(collection(db, "services"));
                const countEl = document.getElementById('countServices'); if(countEl) countEl.innerText = snapshot.size;

                window.servicesCache = []; 
                snapshot.forEach(docSnap => { window.servicesCache.push({ id: docSnap.id, ...docSnap.data() }); });
                window.servicesCache.sort((a,b) => a.kategori.localeCompare(b.kategori));
                renderServicesTable('all');
            } catch(e) { console.error(e); }
        }

        window.filterServices = function(katFilter, btnElem) {
            document.querySelectorAll('.btn-filter').forEach(btn => btn.classList.remove('active'));
            btnElem.classList.add('active'); renderServicesTable(katFilter);
        }

        function renderServicesTable(filterCategory) {
            const tb = document.getElementById('tableServices'); tb.innerHTML = '';
            let filteredData = window.servicesCache;
            if(filterCategory !== 'all') filteredData = window.servicesCache.filter(item => item.kategori === filterCategory);
            if(filteredData.length === 0) return tb.innerHTML = '<tr><td colspan="4" style="text-align:center;">Tidak ada data pada kategori ini.</td></tr>';

            filteredData.forEach(data => {
                let catLabel = data.kategori === 'beli_ac' ? "📦 AC Baru" : data.kategori === 'cuci' ? "❄️ Cuci" : data.kategori === 'bongkar_pasang' ? "🔧 Pasang/Bongkar" : "🛠️ Servis";
                let imgHtml = data.imgUrl ? `<img src="${data.imgUrl}" style="width:40px;height:40px;object-fit:cover;border-radius:4px;display:block;margin-top:5px;">` : '';
                tb.innerHTML += `<tr><td data-label="Kategori"><span style="font-size:11px; font-weight:bold; color:var(--text-light);">${catLabel}</span>${imgHtml}</td><td data-label="Nama Item"><strong>${data.nama}</strong><br><span style="font-size:11px; color:#64748b;">${data.desc.substring(0,30)}...</span></td><td data-label="Harga" style="color:var(--accent); font-weight:bold;">${data.harga}</td><td data-label="Aksi"><button class="btn-action btn-edit" onclick="bukaEditService('${data.id}')">Edit</button><button class="btn-action btn-delete" onclick="hapusService('${data.id}')">Hapus</button></td></tr>`;
            });
        }

        window.bukaEditService = function(id) {
            const data = window.servicesCache.find(item => item.id === id);
            if(!data) return;

            document.getElementById('serviceModalTitle').innerText = "Edit Data Layanan";
            document.getElementById('btnSubmitService').innerText = "💾 Perbarui Data";
            document.getElementById('srvDocId').value = data.id;
            document.getElementById('srvOldImgUrl').value = data.imgUrl || "";
            document.getElementById('srvCategory').value = data.kategori;
            document.getElementById('srvName').value = data.nama;
            document.getElementById('srvPriceText').value = data.harga;
            document.getElementById('srvDesc').value = data.desc;

            let rawTextSpecs = "";
            if(data.specs && data.specs.includes('<li>')) rawTextSpecs = data.specs.replace(/<ul>/g, '').replace(/<\/ul>/g, '').replace(/<li>/g, '').replace(/<\/li>/g, '\n').trim();
            document.getElementById('srvSpecs').value = rawTextSpecs;
            if(data.imgUrl) document.getElementById('imgStatus').innerText = "(Sudah ada gambar, biarkan jika tidak diganti)"; else document.getElementById('imgStatus').innerText = "";

            toggleAcFields(); document.getElementById('serviceModal').style.display = 'flex';
        }

        window.hapusService = async function(id) {
            window.customConfirm("Yakin ingin menghapus item ini permanen?", async () => { await deleteDoc(doc(db, "services", id)); window.showToast("🗑️ Item dihapus."); window.loadServices(); });
        }

        // ================= GALERI =================
        window.loadGallery = async function() {
            try {
                const snapshot = await getDocs(collection(db, "gallery"));
                const countEl = document.getElementById('countGallery'); if(countEl) countEl.innerText = snapshot.size;
                const tb = document.getElementById('tableGallery'); tb.innerHTML = '';
                let galleries = [];
                snapshot.forEach(doc => galleries.push({id: doc.id, ...doc.data()}));
                galleries.sort((a,b) => { let t1 = a.timestamp ? a.timestamp.toMillis() : 0; let t2 = b.timestamp ? b.timestamp.toMillis() : 0; return t2 - t1; });

                galleries.forEach(data => { tb.innerHTML += `<tr><td><img src="${data.url}" style="width:50px;height:50px;object-fit:cover;border-radius:6px;"></td><td style="font-weight:600;">${data.title}</td><td><button class="btn-action btn-delete" onclick="hapusGaleri('${data.id}')">Hapus</button></td></tr>`; });
            } catch(e) { console.error(e); }
        }

        window.uploadFotoGaleri = async function() {
            const fileInput = document.getElementById('galFile'); const titleInput = document.getElementById('galTitle').value;
            if(fileInput.files.length === 0) return window.customAlert("Pilih foto!"); if(!titleInput) return window.customAlert("Isi keterangan foto!");
            window.showToast("⏳ Mengunggah Dokumentasi...");
            try {
                const fileUrl = await uploadFileHelper(fileInput.files[0]);
                await addDoc(collection(db, "gallery"), { title: titleInput, url: fileUrl, timestamp: new Date() });
                window.showToast("✅ Dokumentasi tersimpan!");
                document.getElementById('galTitle').value = ''; fileInput.value = ''; window.loadGallery(); 
            } catch(e) { window.customAlert(e.message); }
        }

        window.hapusGaleri = async function(id) {
            window.customConfirm("Hapus dokumentasi ini?", async () => { await deleteDoc(doc(db, "gallery", id)); window.showToast("🗑️ Terhapus."); window.loadGallery(); });
        }
    

        // ================= YOUTUBE VIDEO =================
        function extractYouTubeID(url) {
            let videoID = url;
            try {
                if(url.includes('youtube.com') || url.includes('youtu.be')) {
                    const urlObj = new URL(url);
                    if(urlObj.hostname.includes('youtu.be')) {
                        videoID = urlObj.pathname.slice(1).split('?')[0];
                    } else if(urlObj.searchParams.has('v')) {
                        videoID = urlObj.searchParams.get('v');
                    } else if(urlObj.pathname.includes('/embed/')) {
                        videoID = urlObj.pathname.split('/embed/')[1];
                    } else if(urlObj.pathname.includes('/shorts/')) {
                        videoID = urlObj.pathname.split('/shorts/')[1];
                    }
                }
            } catch(e) {}
            return videoID.trim();
        }

        window.loadYouTube = async function() {
            try {
                const snapshot = await getDocs(collection(db, "youtube_videos"));
                const tb = document.getElementById('tableYouTube'); 
                if(!tb) return;
                tb.innerHTML = '';
                if(snapshot.empty) {
                    tb.innerHTML = '<tr><td colspan="3" style="text-align:center;">Belum ada video.</td></tr>';
                    return;
                }
                let videos = [];
                snapshot.forEach(doc => videos.push({id: doc.id, ...doc.data()}));
                videos.sort((a,b) => { let t1 = a.timestamp ? a.timestamp.toMillis() : 0; let t2 = b.timestamp ? b.timestamp.toMillis() : 0; return t2 - t1; });

                videos.forEach(data => { 
                    tb.innerHTML += `<tr><td><iframe style="width:120px;height:68px;border-radius:6px;border:none;pointer-events:none;" src="https://www.youtube.com/embed/${data.videoId}"></iframe></td><td><strong>${data.title}</strong><br><span style="font-size:10px;color:#64748b;">ID: ${data.videoId}</span></td><td><button class="btn-action btn-delete" onclick="hapusVideoYouTube('${data.id}')">Hapus</button></td></tr>`; 
                });
            } catch(e) { console.error(e); }
        }

        window.simpanVideoYouTube = async function() {
            const titleInput = document.getElementById('ytTitle').value;
            const linkInput = document.getElementById('ytLink').value;
            if(!titleInput) return window.customAlert("Isi judul video!");
            if(!linkInput) return window.customAlert("Isi link atau ID YouTube!");
            
            const videoId = extractYouTubeID(linkInput);
            if(!videoId) return window.customAlert("Link/ID tidak valid!");

            window.showToast("⏳ Menyimpan Video...");
            try {
                await addDoc(collection(db, "youtube_videos"), { title: titleInput, videoId: videoId, timestamp: new Date() });
                window.showToast("✅ Video tersimpan!");
                document.getElementById('ytTitle').value = ''; 
                document.getElementById('ytLink').value = ''; 
                window.loadYouTube(); 
            } catch(e) { window.customAlert(e.message); }
        }

        window.hapusVideoYouTube = async function(id) {
            window.customConfirm("Hapus video ini?", async () => { await deleteDoc(doc(db, "youtube_videos", id)); window.showToast("🗑️ Video terhapus."); window.loadYouTube(); });
        }

</script>
  </body>
</html>

