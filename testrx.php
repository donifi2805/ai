<!DOCTYPE html>
<html lang="id" class="dark">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>TestrxBox Tools</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/js-beautify/1.14.9/beautify-html.min.js">
  </script>
  <style>
    :root {
      --bg-color: #1a202c;
      --surface-color: #2d3748;
      --border-color: #4a5568;
      --text-color: #e2e8f0;
    }
    body {
      background-color: var(--bg-color);
      color: var(--text-color);
      font-family: "Inter", sans-serif;
    }
    .modal-message-success { color: #4ade80; }
    .modal-message-error { color: #f87171; }
    .modal-message-info { color: #60a5fa; }
    .custom-scrollbar::-webkit-scrollbar { width: 6px; }
    .custom-scrollbar::-webkit-scrollbar-track { background: #1f2937; }
    .custom-scrollbar::-webkit-scrollbar-thumb { background: #4b5563; border-radius: 4px; }
    @media (max-width: 768px) {
      body { zoom: 0.8; }
    }
    .app-card {
      background-color: #1e293b;
      border-radius: 1.5rem;
      padding: 1.25rem;
      box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.4);
      border: 1px solid #334155;
      margin-bottom: 0.5rem;
    }
    button { touch-action: manipulation; }
    
    /* HACKER THEME ASSETS */
    .hacker-bg {
      background: repeating-linear-gradient(0deg, rgba(10, 17, 40, 0.85) 0px, rgba(10, 17, 40, 0.85) 2px, transparent 2px, transparent 4px), radial-gradient(circle at center, #001210 0%, #000 100%);
      animation: hackerFlicker 0.15s infinite;
    }
    .hacker-scan-line {
      position: absolute; top: -10%; left: 0; width: 100%; height: 6px;
      background: rgba(0, 255, 170, 0.4); box-shadow: 0 0 15px rgba(0, 255, 170, 0.8);
      animation: hScan 1.8s linear infinite; z-index: 5;
    }
    @keyframes hScan { to { top: 110%; } }
    @keyframes hackerFlicker { 0%, 100% { opacity: 0.98; } 50% { opacity: 1; } }
    .glitch-text { font-weight: bold; text-shadow: 0 0 5px #0fa, 0 0 15px #0fa; color: #0f0; }
    
    /* LIGHT THEME OVERRIDES */
    body.theme-light { background-color: #e2e8f0 !important; color: #0f172a !important; }
    body.theme-light .app-card { background-color: #ffffff !important; border: 1px solid #cbd5e1 !important; box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1) !important; }
    body.theme-light .bg-gray-900, body.theme-light .bg-gray-800, body.theme-light .bg-gray-700 { background-color: #f8fafc !important; border: 1px solid #cbd5e1 !important; color: #1e293b !important; }
    body.theme-light .text-gray-200, body.theme-light .text-gray-400, body.theme-light .text-gray-500 { color: #334155 !important; }
    body.theme-light textarea, body.theme-light input { background-color: #f8fafc !important; color: #0f172a !important; border-color: #94a3b8 !important; }
    body.theme-light select { background-color: #ffffff !important; color: #0f172a !important; border-color: #cbd5e1 !important; }
    body.theme-light button.bg-transparent, body.theme-light button.bg-transparent * { color: #334155 !important; }
    body.theme-light button.bg-transparent:hover { color: #ffffff !important; background-color: #3b82f6 !important; border-color: transparent !important;}
    body.theme-light button.bg-transparent:hover * { color: #ffffff !important; }
    body.theme-light #previewNav { background-color: #cbd5e1 !important; border-top: 2px solid #94a3b8 !important; }
    body.theme-light #previewNav button { color: #0f172a !important; font-weight: 900 !important; text-shadow: none !important; }
    body.theme-light #previewNav button:hover { color: #2563eb !important; }
    body.theme-light .text-indigo-400 { color: #4338ca !important; }
    body.theme-light .text-blue-400 { color: #1d4ed8 !important; }
    body.theme-light .text-yellow-400 { color: #b45309 !important; }
    body.theme-light .text-green-400 { color: #15803d !important; }
    body.theme-light .text-red-400 { color: #b91c1c !important; }
    body.theme-light .text-indigo-500 { color: #0f766e !important; }
    body.theme-light .bg-red-900, body.theme-light .bg-green-900 { background-color: #f1f5f9 !important; border-bottom: 2px solid #cbd5e1 !important; }
    body.theme-light .bg-red-900 span { color: #991b1b !important; font-weight: bold; }
    body.theme-light .bg-green-900 span { color: #166534 !important; font-weight: bold; }
    body.theme-light #errorConsole { color: #dc2626 !important; font-weight: 600; }
    body.theme-light #sysConsole { color: #16a34a !important; font-weight: 600; }
    
    /* B&W THEME */
    body.theme-bw { background-color: #ffffff !important; color: #000000 !important; filter: grayscale(100%); font-family: "Times New Roman", serif !important; }
    body.theme-bw * { border-radius: 0 !important; }
    body.theme-bw .app-card, body.theme-bw .bg-gray-900, body.theme-bw .bg-gray-800 { background-color: #ffffff !important; border: 2px solid #000 !important; color: #000 !important; box-shadow: 4px 4px 0 #000 !important; }
    body.theme-bw button { background: #fff !important; border: 2px solid #000 !important; color: #000 !important; box-shadow: 3px 3px 0 #000 !important; font-weight: 900 !important; }
    body.theme-bw textarea { background: #fff !important; border: 2px solid #000 !important; color: #000 !important; }
    
    /* PITCH BLACK THEME */
    body.theme-pitch-black { background-color: #000000 !important; color: #555555 !important; }
    body.theme-pitch-black .app-card, body.theme-pitch-black .bg-gray-900, body.theme-pitch-black .bg-gray-800, body.theme-pitch-black .bg-gray-700 { background-color: #030303 !important; border-color: #111111 !important; color: #666666 !important; box-shadow: none !important; }
    body.theme-pitch-black button { filter: brightness(0.4) grayscale(0.5) !important; border: 1px solid #222 !important; }
    body.theme-pitch-black textarea { background-color: #000000 !important; border-color: #1a1a1a !important; color: #444444 !important; }
    
    /* DIM THEME */
    body.theme-dim { background-color: #1c1917 !important; color: #a8a29e !important; }
    body.theme-dim .app-card, body.theme-dim .bg-gray-900, body.theme-dim .bg-gray-800, body.theme-dim .bg-gray-700 { background-color: #292524 !important; border-color: #44403c !important; color: #d6d3d1 !important; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.5) !important; }
    body.theme-dim button { filter: sepia(0.4) brightness(0.7) !important; }
    body.theme-dim textarea { background-color: #1c1917 !important; border-color: #57534e !important; color: #e7e5e4 !important; }
    
    /* HACKER THEME */
    body.theme-hacker { background-color: #000000 !important; color: #00ff00 !important; font-family: "Courier New", monospace !important; }
    body.theme-hacker * { font-family: "Courier New", monospace !important; }
    body.theme-hacker .app-card, body.theme-hacker .bg-gray-900, body.theme-hacker .bg-gray-800, body.theme-hacker .bg-gray-700 { background-color: rgba(0, 15, 0, 0.9) !important; border: 1px solid #00aa00 !important; color: #00ff00 !important; box-shadow: 0 0 8px rgba(0, 255, 0, 0.15) !important; }
    body.theme-hacker button { background: #000 !important; border: 1px solid #00ff00 !important; color: #00ff00 !important; text-shadow: 0 0 3px #00ff00; border-radius: 0 !important; box-shadow: none !important; }
    body.theme-hacker button:hover { background: #00ff00 !important; color: #000 !important; }
    body.theme-hacker textarea { background: #000 !important; border: 1px solid #00aa00 !important; color: #00ff00 !important; text-shadow: 0 0 1px #00ff00; }
  </style>
</head>

<body class="bg-gray-900 text-gray-200">
  <div class="flex flex-col min-h-screen max-w-screen-xl mx-auto p-4 gap-4 mt-2">
    <header class="text-center flex justify-between items-center px-2">
      <h1 class="text-3xl font-bold text-indigo-400">TestrxBox Tools</h1>
      <button id="btnModeToggle" onclick="toggleEditMode()" class="bg-indigo-600 hover:bg-indigo-500 text-white font-bold py-2 px-3 rounded-lg text-xs shadow-md transition-colors">🔄 Mode: Normal</button>
    </header>
    <div class="mt-2 flex justify-center">
      <select id="themeSelector" onchange="changeTheme(this.value)" class="bg-gray-800 border border-gray-600 text-gray-200 text-xs md:text-sm font-bold rounded-lg px-3 py-2 focus:outline-none focus:border-indigo-500 shadow-md cursor-pointer transition-colors hover:bg-gray-700">
        <option value="default">🎨 Tema: Default (Gelap)</option>
        <option value="light">☀️ Tema: Terang</option>
        <option value="bw">📄 Tema: Hitam Putih (Kertas)</option>
        <option value="pitch-black">🌑 Tema: Tempat Gelap</option>
        <option value="dim">🌆 Tema: Remang-remang</option>
        <option value="hacker">💻 Tema: Ala Hacker</option>
      </select>
    </div>
    <input type="file" id="fileUploader" accept=".html,.htm,.txt,.php" style="display: none" onchange="handleFileSelect(event)" />
    <textarea id="hiddenEditor" style="display: none"></textarea>

    <div class="flex flex-col app-card gap-3">
      <div class="flex items-center gap-3">
        <div id="mainIndicator" class="w-4 h-4 rounded-full bg-red-500 transition-colors flex-shrink-0"></div>
        <span id="versionIndicator" class="text-2xl font-mono font-bold text-gray-600 whitespace-nowrap">[ KOSONG ]</span>
      </div>
      <div class="grid grid-cols-4 gap-1 mt-4 px-1 pb-1 items-stretch" id="gridCompactBar">
        <button onclick="triggerFileUpload()" class="flex flex-col items-center justify-center bg-gray-700 hover:bg-blue-600 text-white font-bold py-3 rounded-xl transition-colors shadow-sm w-full min-w-0 hide-in-edit-mode">
          <span class="text-lg leading-tight mb-1">📁</span>
          <span class="text-[0.60rem] leading-none text-center whitespace-nowrap overflow-hidden truncate px-0.5">Lokal</span>
        </button>
        <button onclick="openServerFilesModal()" class="flex flex-col items-center justify-center bg-blue-800 hover:bg-blue-700 text-white font-bold py-3 rounded-xl transition-colors shadow-sm w-full min-w-0">
          <span class="text-lg leading-tight mb-1">☁️</span>
          <span class="text-[0.60rem] leading-none text-center whitespace-nowrap overflow-hidden truncate px-0.5">Server</span>
        </button>
        <button onclick="pasteIntoMainEditor()" class="flex flex-col items-center justify-center bg-gray-700 hover:bg-indigo-600 text-white font-bold py-3 rounded-xl transition-colors shadow-sm w-full min-w-0 hide-in-edit-mode">
          <span class="text-lg leading-tight mb-1">📋</span>
          <span class="text-[0.60rem] leading-none text-center whitespace-nowrap overflow-hidden truncate px-0.5">Tempel</span>
        </button>
        <button onclick="copyToClipboard()" class="flex flex-col items-center justify-center bg-green-700 hover:bg-green-600 text-white font-bold py-3 rounded-xl transition-colors shadow-sm w-full min-w-0">
          <span class="text-lg leading-tight mb-1">✂️</span>
          <span class="text-[0.60rem] leading-none text-center whitespace-nowrap overflow-hidden truncate px-0.5">Salin</span>
        </button>
      </div>
    </div>

    <div class="app-card flex flex-col gap-3">
      <textarea id="quickCommandInput" rows="3" class="w-full bg-gray-900 border border-gray-600 rounded-xl shadow-inner text-xs font-mono p-3 text-white focus:outline-none focus:border-indigo-500 custom-scrollbar" placeholder='[{"snippet":"...","target":"...","endTarget":"...","action":"replace"}]'></textarea>
      <div class="grid grid-cols-2 gap-2">
        <button onclick="applyAndExecute()" class="w-full bg-blue-600 hover:bg-blue-500 text-white font-bold py-3 px-4 rounded-xl shadow-md transition-colors flex justify-center items-center gap-2">
          <span class="text-xl">▶️</span> Run
        </button>
        <button onclick="autoPasteAndExecute()" class="w-full bg-indigo-600 hover:bg-indigo-500 text-white font-bold py-3 px-4 rounded-xl shadow-md transition-colors flex justify-center items-center gap-2">
          <span class="text-xl">🚀</span> Auto-Run
        </button>
        <button onclick="appBeautifyCodesHandler()" class="w-full bg-indigo-700 hover:bg-indigo-600 text-white font-bold py-3 px-4 rounded-xl shadow-md transition-colors flex justify-center items-center gap-2">
          <span class="text-xl">🪄</span> Rapi Kode
        </button>
        <button onclick="openDelCommenterModal()" class="w-full bg-pink-700 hover:bg-pink-600 text-white font-bold py-3 px-4 rounded-xl shadow-md transition-colors flex justify-center items-center gap-2">
          <span class="text-xl">💬</span> Del Comenter
        </button>
      </div>
    </div>

    <div class="app-card flex flex-col gap-3">
      <div id="btnSimpanFileContainer" style="display: none;" class="w-full mb-2">
        <button onclick="saveActiveFileDirect()" class="w-full bg-emerald-600 hover:bg-emerald-500 text-white text-base font-bold py-4 px-4 rounded-xl shadow-lg transition-colors flex items-center justify-center gap-2">
          <span class="text-2xl">💾</span> Simpan File
        </button>
      </div>
      <div class="hide-in-edit-mode grid grid-cols-2 gap-3 w-full mb-4">
        <div class="flex gap-1 w-full bg-gray-700 p-1 rounded-xl shadow-inner border border-gray-600">
          <button onclick="downloadResult('index')" class="flex-1 bg-transparent hover:bg-indigo-600 text-white text-xs font-bold py-2 px-1 rounded-lg transition-colors truncate">📥 Index</button>
          <button onclick="uploadToPublic('index')" class="w-10 shrink-0 bg-green-600 hover:bg-green-500 text-white rounded-lg transition-colors flex items-center justify-center shadow-md" title="Upload index ke server">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
            </svg>
          </button>
        </div>
        <div class="flex gap-1 w-full bg-gray-700 p-1 rounded-xl shadow-inner border border-gray-600">
          <button onclick="downloadResult('paneladmin')" class="flex-1 bg-transparent hover:bg-indigo-600 text-white text-xs font-bold py-2 px-1 rounded-lg transition-colors truncate">📥 Panel</button>
          <button onclick="uploadToPublic('paneladmin')" class="w-10 shrink-0 bg-green-600 hover:bg-green-500 text-white rounded-lg transition-colors flex items-center justify-center shadow-md" title="Upload paneladmin ke server">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
            </svg>
          </button>
        </div>
        <button onclick="openServerUploadModal()" class="col-span-2 bg-indigo-600 hover:bg-indigo-500 text-white text-sm font-bold py-3 px-2 rounded-xl transition-colors truncate shadow-md flex items-center justify-center gap-2">
          <span class="text-xl">☁️</span> Upload Ke Folder Spesifik
        </button>
      </div>
      <div class="hide-in-edit-mode grid grid-cols-2 gap-3 w-full">
        <button onclick="openBackupModal()" class="bg-yellow-600 hover:bg-yellow-500 text-white font-bold py-3 px-4 rounded-xl transition-colors shadow-md flex flex-col items-center justify-center gap-1">
          <span class="text-2xl">📦</span><span class="text-xs">Backup</span>
        </button>
        <button onclick="openRestoreModal()" class="bg-blue-600 hover:bg-blue-500 text-white font-bold py-3 px-4 rounded-xl transition-colors shadow-md flex flex-col items-center justify-center gap-1">
          <span class="text-2xl">🔄</span><span class="text-xs">Restore</span>
        </button>
      </div>
    </div>

    <div class="app-card flex flex-col gap-3">
      <h2 class="text-xl font-bold text-indigo-400">Pratinjau Layar (Mobile)</h2>
      <div class="mt-2 flex gap-2">
        <button onclick="openPreviewSettingsModal()" class="flex-1 bg-gray-700 hover:bg-indigo-600 text-white py-3 px-4 rounded-xl text-sm font-bold transition-colors shadow-md flex items-center justify-center gap-2">⚙️ Pengaturan</button>
        <button id="btnLockPage" onclick="toggleLock()" class="flex-1 bg-gray-700 hover:bg-pink-600 text-white py-3 px-4 rounded-xl text-sm font-bold transition-colors shadow-md flex items-center justify-center gap-2">🔒 Kunci Layar</button>
      </div>
      <div class="flex justify-center mt-4 w-full px-2">
        <div id="previewContainer" class="border-8 border-gray-900 overflow-hidden bg-white relative shadow-2xl flex flex-col mx-auto" style="border-radius: 2.5rem; transition: all 0.3s ease; width: 100%; max-width: 380px">
          <div id="previewNotch" class="absolute top-0 inset-x-0 h-6 flex justify-center z-10 pointer-events-none">
            <div class="h-5 bg-gray-900 rounded-b-xl" style="width: 100px"></div>
          </div>
          <div id="iframeWrapper" class="relative w-full overflow-hidden bg-white">
            <iframe id="mobilePreview" class="border-none absolute top-0 left-0" style="transform-origin: top left; max-width: none !important"></iframe>
          </div>
          <div id="previewNav" class="h-12 bg-gray-900 w-full flex justify-around items-center px-6 shrink-0 text-gray-400 z-10">
            <button onclick="historyBackPreview()" class="p-2 hover:text-white transition-colors">❮ Back</button>
            <button onclick="forceUpdatePreview()" class="p-2 hover:text-white transition-colors">● Home</button>
            <button class="p-2 hover:text-white transition-colors cursor-default">■ Recent</button>
          </div>
        </div>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4 w-full">
        <div class="bg-gray-900 rounded-md border border-red-800 flex flex-col h-48">
          <div class="bg-red-900 text-white text-xs font-bold p-2 px-3 flex justify-between items-center">
            <span>Console: Deteksi Error</span>
            <button onclick="document.getElementById('errorConsole').innerHTML = ''" class="bg-red-700 hover:bg-red-600 text-white rounded px-2 py-0.5 transition-colors" title="Bersihkan Log">Clear</button>
          </div>
          <div id="errorConsole" class="p-3 font-mono text-xs text-red-400 overflow-y-auto flex-1 whitespace-pre-wrap break-all custom-scrollbar"></div>
        </div>
        <div class="bg-gray-900 rounded-md border border-green-800 flex flex-col h-48">
          <div class="bg-green-900 text-white text-xs font-bold p-2 px-3 flex justify-between items-center">
            <span>Console: Sistem Berjalan</span>
            <button onclick="document.getElementById('sysConsole').innerHTML = ''" class="bg-green-700 hover:bg-green-600 text-white rounded px-2 py-0.5 transition-colors" title="Bersihkan Log">Clear</button>
          </div>
          <div id="sysConsole" class="p-3 font-mono text-xs text-green-400 overflow-y-auto flex-1 whitespace-pre-wrap break-all custom-scrollbar"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="text-center text-gray-500 text-xs mt-4 pb-4">
    <p>ig@donitata1717</p>
    <p>wa 6285156776974</p>
    <p>modder&amp;programer.</p>
  </div>

  <!-- REAL TRAFFIC GLOBAL API LOADER (SYSTEM PROXY) -->
  <div id="globalFetchDataSpinerLoaderTestrx" class="fixed inset-0 z-[9999] flex flex-col justify-center items-center bg-gray-900 bg-opacity-80 backdrop-blur-sm hidden touch-none transition-all duration-300 pointer-events-auto">
    <div class="animate-spin rounded-full h-14 w-14 border-t-2 border-b-2 border-indigo-500 border-l-2 border-l-transparent border-r-2 border-r-transparent mb-4 shadow-[0_0_20px_rgba(99,102,241,0.5)]"></div>
    <span class="text-indigo-400 font-mono text-sm tracking-widest animate-pulse font-bold bg-gray-900 py-1 px-4 border border-indigo-900 rounded drop-shadow-[0_2px_5px_rgba(0,255,200,0.5)]">🚀 REQUESTING ENGINE SERVER ...</span>
  </div>

  <!-- MODALS -->
  <div id="previewSettingsModal" class="fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center z-50 p-4 hidden">
    <div class="bg-gray-800 rounded-2xl shadow-2xl border border-gray-700 w-full max-w-sm mx-auto flex flex-col">
      <div class="p-4 border-b border-gray-700 flex justify-between items-center">
        <h3 class="text-lg font-bold text-indigo-400">Pengaturan Pratinjau</h3>
        <button onclick="closePreviewSettingsModal()" class="text-gray-400 hover:text-white text-xl">✖</button>
      </div>
      <div class="p-5 flex flex-col gap-4">
        <div class="grid grid-cols-2 gap-3">
          <div>
            <label class="text-xs text-gray-400">Lebar Asli (px)</label>
            <input type="text" id="previewWidth" value="360" class="w-full bg-gray-900 text-white border border-gray-600 rounded px-3 py-2 mt-1" />
          </div>
          <div>
            <label class="text-xs text-gray-400">Tinggi Asli (px)</label>
            <input type="text" id="previewHeight" value="760" class="w-full bg-gray-900 text-white border border-gray-600 rounded px-3 py-2 mt-1" />
          </div>
        </div>
        <div>
          <label class="text-xs text-gray-400">Tingkat Skala/Zoom (%)</label>
          <input type="text" id="previewScale" value="100" class="w-full bg-gray-900 text-white border border-gray-600 rounded px-3 py-2 mt-1" />
        </div>
      </div>
      <div class="p-4 border-t border-gray-700">
        <button onclick="applyAndCloseSettings()" class="w-full bg-indigo-600 hover:bg-indigo-500 text-white font-bold py-2 rounded-md shadow">Terapkan &amp; Tutup</button>
      </div>
    </div>
  </div>

  <div id="backupModal" class="fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center z-50 p-4 hidden">
    <div class="bg-gray-800 rounded-2xl shadow-2xl border border-gray-700 w-full max-w-sm mx-auto flex flex-col">
      <div class="p-4 border-b border-gray-700">
        <h3 class="text-lg font-bold text-yellow-400">Simpan Backup Kode</h3>
      </div>
      <div class="p-5 flex flex-col gap-4">
        <div>
          <label class="text-sm text-gray-300">Nama File Backup</label>
          <input type="text" id="backupFilename" placeholder="contoh: update_nav_baru" class="w-full bg-gray-900 text-white border border-gray-600 rounded px-3 py-2 mt-1 focus:outline-none focus:border-yellow-400" />
        </div>
        <div>
          <label class="text-sm text-gray-300">Ekstensi</label>
          <select id="backupExt" class="w-full bg-gray-900 text-white border border-gray-600 rounded px-3 py-2 mt-1">
            <option value=".php">.php</option>
            <option value=".html">.html</option>
          </select>
        </div>
      </div>
      <div class="p-4 border-t border-gray-700 flex gap-2">
        <button onclick="closeBackupModal()" class="flex-1 bg-gray-600 hover:bg-gray-500 text-white py-2 rounded-md">Batal</button>
        <button onclick="executeBackup()" class="flex-1 bg-yellow-600 hover:bg-yellow-500 text-white font-bold py-2 rounded-md">Simpan</button>
      </div>
    </div>
  </div>

  <div id="restoreModal" class="fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center z-50 p-4 hidden">
    <div class="bg-gray-800 rounded-2xl shadow-2xl border border-gray-700 w-full max-w-md mx-auto flex flex-col" style="max-height: 80vh">
      <div class="p-4 border-b border-gray-700 flex justify-between items-center">
        <h3 class="text-lg font-bold text-blue-400">Restore Backup</h3>
        <button onclick="closeRestoreModal()" class="text-gray-400 hover:text-white text-xl">✖</button>
      </div>
      <div class="p-2 overflow-y-auto custom-scrollbar flex-1" id="restoreListContainer">
        <div id="restoreList" class="flex flex-col gap-2">
          <p class="text-gray-400 text-sm text-center py-4">Memuat data...</p>
        </div>
      </div>
    </div>
  </div>

  <div id="serverFilesModal" class="fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center z-50 p-4 hidden">
    <div class="bg-gray-800 rounded-2xl shadow-2xl border border-gray-700 w-full max-w-md mx-auto flex flex-col" style="max-height: 80vh">
      <div class="p-4 border-b border-gray-700 flex flex-col gap-3">
        <div class="flex justify-between items-center">
          <h3 class="text-lg font-bold text-blue-400">Pilih File Hosting</h3>
          <button onclick="closeServerFilesModal()" class="text-gray-400 hover:text-white text-xl">✖</button>
        </div>
        <button onclick="createNewFolderInCurrentPath()" class="w-full bg-indigo-600 hover:bg-indigo-500 text-white font-bold py-2 rounded-md shadow flex items-center justify-center gap-2 text-xs md:text-sm transition-colors">
          📁 Buat Folder Di Sini
        </button>
      </div>
      <div class="p-2 overflow-y-auto custom-scrollbar flex-1" id="serverFilesListContainer">
        <div id="serverFilesList" class="flex flex-col gap-2">
          <p class="text-gray-400 text-sm text-center py-4">Memuat data...</p>
        </div>
      </div>
    </div>
  </div>

  <!-- MODAL SERVER UPLOAD & OVERWRITE -->
  <div id="serverUploadModal" class="fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center z-50 p-4 hidden">
    <div class="bg-gray-800 rounded-2xl shadow-2xl border border-gray-700 w-full max-w-md mx-auto flex flex-col" style="max-height: 80vh">
      <div class="p-4 border-b border-gray-700 flex flex-col gap-3">
        <div class="flex justify-between items-center">
          <h3 class="text-lg font-bold text-indigo-400">Pilih Folder &amp; Upload</h3>
          <button onclick="closeServerUploadModal()" class="text-gray-400 hover:text-white text-xl">✖</button>
        </div>
        <button onclick="promptSaveToServer(currentUploadPath)" class="w-full bg-green-600 hover:bg-green-500 text-white font-bold py-2 rounded-md shadow flex items-center justify-center gap-2">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
          </svg>
          Upload Sebagai File Baru
        </button>
      </div>
      <div class="p-2 overflow-y-auto custom-scrollbar flex-1" id="serverUploadListContainer">
        <div id="serverUploadList" class="flex flex-col gap-2">
          <p class="text-gray-400 text-sm text-center py-4">Memuat data...</p>
        </div>
      </div>
    </div>
  </div>

  <!-- MODAL HACKER OVERLAY -->
  <div id="hackerOverlay" class="fixed inset-0 z-[100] bg-black p-6 hidden flex-col items-center justify-center font-mono overflow-hidden transition-all duration-300">
    <div class="absolute inset-0 hacker-bg z-0"></div>
    <div class="hacker-scan-line pointer-events-none"></div>
    <div class="relative z-10 w-full max-w-lg mx-auto">
      <div class="text-center mb-6">
        <h1 class="text-4xl uppercase glitch-text tracking-widest mb-1">⚠️ OVERRIDE KODE ⚠️</h1>
        <p class="text-indigo-500 text-sm opacity-80 animate-pulse">Executing Injection JSON Modifier System v3.6 Engine dt17tools</p>
      </div>
      <div class="bg-gray-900 border border-green-600 rounded p-4 h-64 overflow-hidden relative shadow-[0_0_25px_rgba(0,255,170,0.15)] flex flex-col">
        <div class="w-full flex items-center gap-2 mb-2 pb-2 border-b border-green-800">
          <div class="w-3 h-3 rounded-full bg-red-500 animate-pulse"></div>
          <div class="w-3 h-3 rounded-full bg-yellow-500 animate-pulse" style="animation-delay: 0.2s"></div>
          <div class="w-3 h-3 rounded-full bg-green-500 animate-pulse" style="animation-delay: 0.4s"></div>
          <span class="text-xs text-green-700 ml-2 font-bold">Root [Console Akses...]</span>
        </div>
        <div id="hackTerminal" class="flex-1 font-mono text-xs md:text-sm text-green-400 break-all overflow-hidden flex flex-col gap-1 tracking-tight"></div>
      </div>
    </div>
  </div>

  <!-- ALERT MODAL -->
  <div id="alertModal" class="fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center z-50 p-4 hidden">
    <div class="bg-gray-800 rounded-2xl shadow-2xl border border-gray-700 p-6 w-full max-w-sm mx-auto text-center z-[60]">
      <p id="modal-message" class="text-lg mb-6 whitespace-pre-wrap break-words max-h-[60vh] overflow-y-auto custom-scrollbar"></p>
      <div class="flex gap-2 w-full">
        <button onclick="document.getElementById('alertModal').classList.add('hidden')" class="flex-1 bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-lg shadow-md transition-colors">OK</button>
        <button id="btnCopyAlert" onclick="copyAlertMessage()" style="display: none" class="flex-1 bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-lg shadow-md transition-colors flex items-center justify-center gap-1">📋 Salin Error</button>
      </div>
    </div>
  </div>

  <!-- MODAL DOWNLOAD FORMAT -->
  <div id="downloadFormatModal" class="fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center z-50 p-4 hidden">
    <div class="bg-gray-800 rounded-2xl shadow-2xl border border-gray-700 w-full max-w-xs mx-auto flex flex-col">
      <div class="p-4 border-b border-gray-700 flex justify-between items-center">
        <h3 class="text-lg font-bold text-indigo-400">Pilih Format Unduh</h3>
        <button onclick="closeDownloadFormatModal()" class="text-gray-400 hover:text-white text-xl">✖</button>
      </div>
      <div class="p-5 flex flex-col gap-3">
        <button onclick="executeDownload('php')" class="w-full bg-blue-600 hover:bg-blue-500 text-white font-bold py-3 rounded-lg shadow-md transition-colors">Unduh sebagai .PHP</button>
        <button onclick="executeDownload('html')" class="w-full bg-green-600 hover:bg-green-500 text-white font-bold py-3 rounded-lg shadow-md transition-colors">Unduh sebagai .HTML</button>
      </div>
    </div>
  </div>

  <!-- PERBAIKAN: MODAL DEL COMMENTER RESPONSIVE -->
  <div id="commenterModal" class="fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center z-50 p-4 hidden">
    <div class="bg-gray-800 rounded-2xl shadow-2xl border border-gray-700 w-[95%] md:w-full max-w-lg mx-auto flex flex-col max-h-[90vh] overflow-hidden">
      <div class="p-4 border-b border-gray-700 flex justify-between items-center">
        <h3 class="text-lg font-bold text-purple-400 truncate pr-2">💬 Del Comenter</h3>
        <button onclick="closeDelCommenterModal()" class="text-gray-400 hover:text-white text-xl shrink-0">✖</button>
      </div>
      <div class="p-3 bg-gray-900 flex justify-between items-center border-b border-gray-700 gap-2">
        <span id="commentCountInfo" class="text-[10px] md:text-xs text-gray-300 font-mono truncate">Total: 0</span>
        <button onclick="deleteAllComments()" class="bg-red-600 hover:bg-red-500 text-white text-[10px] md:text-xs font-bold py-2 px-3 rounded shadow shrink-0">🗑️ Hapus Semua</button>
      </div>
      <div class="p-3 overflow-y-auto custom-scrollbar flex-1 flex flex-col gap-3" id="commentListContainer"></div>
    </div>
  </div>

  <script>
    // [CORE UPDATE TESTRX V3 FETCH HOOK TRAFFIC LISTENER NETWORK]
    // FUNGSI INI AKAN OTOMATIS MENANGKAP SETIAP CALL ASLI API PHP PADA FUNGSI FILE & UPLOAD NYATA ANDA!
    let globalFetchTraficReqX02A = 0;
    const sysOriginalFetchAPINativeTarget = window.fetch;
    window.fetch = async function(...reqArgumentsTestXHRX) {
      globalFetchTraficReqX02A++;
      const uiLoaderIndication = document.getElementById("globalFetchDataSpinerLoaderTestrx");
      if (uiLoaderIndication) uiLoaderIndication.classList.remove("hidden");
      try {
        return await sysOriginalFetchAPINativeTarget.apply(this, reqArgumentsTestXHRX);
      } finally {
        globalFetchTraficReqX02A--;
        if (globalFetchTraficReqX02A <= 0) {
          globalFetchTraficReqX02A = 0;
          // Extra small delay logic For UX Smooth Release (Cegah kedip kaget!)
          setTimeout(() => { 
              if(globalFetchTraficReqX02A === 0 && uiLoaderIndication) {
                  uiLoaderIndication.classList.add("hidden");
              }
          }, 350);
        }
      }
    };
    
    function changeTheme(themeName) {
      document.body.className = "bg-gray-900 text-gray-200 transition-colors duration-500";
      if (themeName !== "default") { document.body.classList.add("theme-" + themeName); }
      localStorage.setItem("testrx_theme", themeName);
    }
    
    document.addEventListener("DOMContentLoaded", () => {
      const savedTheme = localStorage.getItem("testrx_theme") || "default";
      if (savedTheme !== "default") {
        const sel = document.getElementById("themeSelector");
        if (sel) sel.value = savedTheme;
        changeTheme(savedTheme);
      }
    });
    
    let versionCounter = 0;
    let isPageLocked = false;
    let previewHistory = [];
    let previewTimeout;
    const apiFile = "testrx_api.php";
    let currentServerPath = "";
    
    const editor = {
      getValue: () => document.getElementById("hiddenEditor").value,
      setValue: (val) => {
        document.getElementById("hiddenEditor").value = val;
        updateIndicators();
        clearTimeout(previewTimeout);
        previewTimeout = setTimeout(() => { forceUpdatePreview(); }, 1000);
      },
    };
    
    function copyAlertMessage() {
      const msg = document.getElementById("modal-message").innerText;
      navigator.clipboard.writeText(msg).then(() => {
          const btn = document.getElementById("btnCopyAlert");
          if (btn) {
            const ori = btn.innerHTML;
            btn.innerHTML = "✅ Tersalin!";
            setTimeout(() => (btn.innerHTML = ori), 2000);
          }
        }).catch((err) => alert("Gagal menyalin teks!"));
    }
    
    function showAlert(message, type = "info") {
      const msgEl = document.getElementById("modal-message");
      msgEl.className = "text-lg mb-6 " + (type === "success" ? "modal-message-success" : type === "error" ? "modal-message-error" : "modal-message-info");
      msgEl.textContent = message;
      const copyBtn = document.getElementById("btnCopyAlert");
      if (copyBtn) copyBtn.style.display = type === "error" ? "flex" : "none";
      document.getElementById("alertModal").classList.remove("hidden");
    }
    
    async function copyToClipboard() {
      const content = editor.getValue();
      if (!content) return showAlert("Kode masih kosong!", "error");
      try {
        await navigator.clipboard.writeText(content);
        showAlert("Kode berhasil disalin ke Clipboard!", "success");
      } catch (err) { showAlert("Gagal menyalin kode. Browser tidak mendukung fitur ini.", "error"); }
    }
    
    async function uploadToPublic(type) {
      const content = editor.getValue();
      if (!content) return showAlert("Kode masih kosong!", "error");
    
      let ext = prompt(`Simpan file sebagai format apa?\n\nKetik "php" atau "html" (Tanpa tanda kutip).\nPerhatian: Ini akan menimpa file ${type}.(format) jika sudah ada di direktori server.`, "php");
      if (ext === null) return;
      ext = ext.trim().toLowerCase();
      if (ext !== "php" && ext !== "html") return showAlert("Dibatalkan: Format yang diketik tidak valid. Hanya menerima 'php' atau 'html'.", "error");
    
      const formData = new FormData();
      formData.append("action", "upload_public");
      formData.append("type", type);
      formData.append("ext", "." + ext);
      formData.append("content", content);
    
      try {
        const res = await fetch(apiFile, { method: "POST", body: formData });
        const json = await res.json();
        showAlert(json.msg, json.status);
      } catch (err) { showAlert("Gagal menghubungi API server.", "error"); }
    }
    
    function openBackupModal() { document.getElementById("backupModal").classList.remove("hidden"); }
    function closeBackupModal() { document.getElementById("backupModal").classList.add("hidden"); }
    
    async function executeBackup() {
      const content = editor.getValue();
      const filename = document.getElementById("backupFilename").value.trim();
      const ext = document.getElementById("backupExt").value;
      if (!content) return showAlert("Kode masih kosong!", "error");
      if (!filename) return showAlert("Harap masukkan nama file!", "error");
    
      const formData = new FormData();
      formData.append("action", "backup");
      formData.append("filename", filename);
      formData.append("ext", ext);
      formData.append("content", content);
    
      try {
        const res = await fetch(apiFile, { method: "POST", body: formData });
        const json = await res.json();
        closeBackupModal();
        showAlert(json.msg, json.status);
      } catch (err) { showAlert("Gagal melakukan backup.", "error"); }
    }
    
    function openRestoreModal() { document.getElementById("restoreModal").classList.remove("hidden"); loadBackups(); }
    function closeRestoreModal() { document.getElementById("restoreModal").classList.add("hidden"); }
    
    async function loadBackups() {
      const listDiv = document.getElementById("restoreList");
      listDiv.innerHTML = '<p class="text-gray-400 text-sm text-center py-4">Memuat data...</p>';
      try {
        const res = await fetch(apiFile + "?action=list_backups");
        const json = await res.json();
        if (json.data && json.data.length > 0) {
          listDiv.innerHTML = "";
          json.data.forEach((item) => {
            listDiv.innerHTML += `
              <div class="flex justify-between items-center bg-gray-900 p-3 rounded border border-gray-700">
                <div class="overflow-hidden pr-2">
                  <p class="text-sm font-bold text-gray-200 truncate">${item.name}</p>
                  <p class="text-xs text-gray-500">${item.date}</p>
                </div>
                <div class="flex gap-2 w-full md:w-auto shrink-0 mt-1 md:mt-0 ml-0 md:ml-7">
                  <button onclick="restoreFile('${item.name}')" class="bg-blue-600 hover:bg-blue-500 text-white text-xs font-bold py-1.5 px-3 rounded shadow">Restore</button>
                  <button onclick="deleteBackupFile('${item.name}')" class="bg-red-600 hover:bg-red-500 text-white text-xs font-bold py-1.5 px-3 rounded shadow">Hapus</button>
                </div>
              </div>`;
          });
        } else { listDiv.innerHTML = '<p class="text-gray-400 text-sm text-center py-4">Belum ada file backup.</p>'; }
      } catch (err) { listDiv.innerHTML = '<p class="text-red-400 text-sm text-center py-4">Gagal memuat daftar backup.</p>'; }
    }
    
    async function restoreFile(filename) {
      const formData = new FormData();
      formData.append("action", "get_backup");
      formData.append("filename", filename);
      try {
        const res = await fetch(apiFile, { method: "POST", body: formData });
        const json = await res.json();
        if (json.status === "success") {
          editor.setValue(json.content);
          closeRestoreModal();
          showAlert(`File ${filename} berhasil dimuat ke editor!`, "success");
        } else { showAlert(json.msg, "error"); }
      } catch (err) { showAlert("Gagal mengambil file backup.", "error"); }
    }
    
    async function deleteBackupFile(filename) {
      if (!confirm(`Peringatan: Apakah Anda yakin ingin menghapus backup '${filename}' secara permanen?`)) return;
      const formData = new FormData();
      formData.append("action", "delete_backup");
      formData.append("filename", filename);
      try {
        const res = await fetch(apiFile, { method: "POST", body: formData });
        const json = await res.json();
        if (json.status === "success") { showAlert(json.msg, "success"); loadBackups(); } 
        else { showAlert(json.msg, "error"); }
      } catch (err) { showAlert("Gagal menghapus file backup.", "error"); }
    }
    
    function applyPreviewSettings() {
      const w = parseFloat(document.getElementById("previewWidth").value) || 360;
      const h = parseFloat(document.getElementById("previewHeight").value) || 760;
      const s = parseFloat(document.getElementById("previewScale").value) || 100;
      const iframe = document.getElementById("mobilePreview");
      const wrapper = document.getElementById("iframeWrapper");
      if (iframe && wrapper) {
        const availableWidth = wrapper.clientWidth;
        if (availableWidth === 0) return;
        iframe.style.width = w + "px";
        iframe.style.height = h + "px";
        iframe.style.maxWidth = "none";
        const autoScale = availableWidth / w;
        const finalScale = autoScale * (s / 100);
        iframe.style.transform = `scale(${finalScale})`;
        wrapper.style.height = h * finalScale + "px";
      }
    }
    
    function forceUpdatePreview() {
      const iframe = document.getElementById("mobilePreview");
      if (!iframe) return;
      const htmlContent = editor.getValue();
      const interceptScript = `
        <script>
          window.onerror = function(msg, url, line, col, error) { window.parent.postMessage({ type: 'error', msg: msg + ' (Baris: ' + line + ')' }, '*'); return false; };
          const origLog = console.log; console.log = function(...args) { window.parent.postMessage({ type: 'log', msg: args.join(' ') }, '*'); origLog.apply(console, args); };
          const origWarn = console.warn; console.warn = function(...args) { window.parent.postMessage({ type: 'log', msg: 'WARN: ' + args.join(' ') }, '*'); origWarn.apply(console, args); };
          const origError = console.error; console.error = function(...args) { window.parent.postMessage({ type: 'error', msg: 'ERR: ' + args.join(' ') }, '*'); origError.apply(console, args); };
          const origInfo = console.info; console.info = function(...args) { window.parent.postMessage({ type: 'log', msg: 'INFO: ' + args.join(' ') }, '*'); origInfo.apply(console, args); };
        <\/script>
      `;
      let injectedHtml = htmlContent;
      if (injectedHtml.includes("<head>")) { injectedHtml = injectedHtml.replace("<head>", "<head>\n" + interceptScript); } 
      else { injectedHtml = interceptScript + "\n" + injectedHtml; }
      iframe.srcdoc = injectedHtml;
      if (previewHistory.length === 0 || previewHistory[previewHistory.length - 1] !== htmlContent) {
        previewHistory.push(htmlContent);
      }
    }
    
    window.addEventListener("message", function (e) {
      if (e.data && e.data.type) {
        const errConsole = document.getElementById("errorConsole");
        const sysConsole = document.getElementById("sysConsole");
        const time = new Date().toLocaleTimeString();
        if (e.data.type === "error") {
          if (errConsole) { errConsole.innerHTML += `[${time}] ${e.data.msg}<br>`; errConsole.scrollTop = errConsole.scrollHeight; }
        } else if (e.data.type === "log") {
          if (sysConsole) { sysConsole.innerHTML += `[${time}] ${e.data.msg}<br>`; sysConsole.scrollTop = sysConsole.scrollHeight; }
        }
      }
    });
    
    function historyBackPreview() {
      if (previewHistory.length > 1) {
        previewHistory.pop();
        const previousHtml = previewHistory[previewHistory.length - 1];
        editor.setValue(previousHtml);
        showAlert("Kembali ke versi kode sebelumnya.", "info");
      } else { showAlert("Tidak ada riwayat halaman sebelumnya.", "error"); }
    }
    
    document.addEventListener("DOMContentLoaded", () => {
      setTimeout(() => { applyPreviewSettings(); forceUpdatePreview(); }, 300);
      window.addEventListener("resize", applyPreviewSettings);
    });
    
    function updateIndicators() {
      const mainIndicator = document.getElementById("mainIndicator");
      if (editor.getValue().length > 0) {
        mainIndicator.classList.replace("bg-red-500", "bg-green-500");
        document.getElementById("versionIndicator").textContent = "Versi " + versionCounter;
      } else {
        mainIndicator.classList.replace("bg-green-500", "bg-red-500");
        document.getElementById("versionIndicator").textContent = "[ KOSONG ]";
      }
    }
    
    let currentDownloadBaseFilename = "";
    function downloadResult(baseFilename) {
      const content = editor.getValue();
      if (!content) return showAlert("Kode kosong.", "error");
      currentDownloadBaseFilename = baseFilename;
      document.getElementById("downloadFormatModal").classList.remove("hidden");
    }
    
    function closeDownloadFormatModal() {
      document.getElementById("downloadFormatModal").classList.add("hidden");
    }
    
    function executeDownload(ext) {
      const content = editor.getValue();
      if (!content) return showAlert("Kode kosong.", "error");
      const blob = new Blob([content], { type: "text/plain;charset=utf-8" });
      const a = document.createElement("a");
      a.href = URL.createObjectURL(blob);
      a.download = currentDownloadBaseFilename + "." + ext;
      a.click();
      closeDownloadFormatModal();
    }
    
    function triggerFileUpload() { document.getElementById("fileUploader").click(); }
    
    function handleFileSelect(e) {
      const file = e.target.files[0];
      if (!file) return;
      const reader = new FileReader();
      reader.onload = function (event) {
        editor.setValue(event.target.result);
        versionCounter++;
        updateIndicators();
        showAlert("File '" + file.name + "' berhasil dimuat!", "success");
      };
      reader.onerror = function () { showAlert("Error: Gagal membaca file.", "error"); };
      reader.readAsText(file);
      e.target.value = null;
    }
    
    async function pasteIntoMainEditor() {
      try {
        const text = await navigator.clipboard.readText();
        editor.setValue(text);
        versionCounter++;
        showAlert("Kode berhasil ditempel!", "success");
      } catch (err) { showAlert("Gagal menempel kode.", "error"); }
    }
    
    function openPreviewSettingsModal() { document.getElementById("previewSettingsModal").classList.remove("hidden"); }
    function closePreviewSettingsModal() { document.getElementById("previewSettingsModal").classList.add("hidden"); }
    function applyAndCloseSettings() { applyPreviewSettings(); closePreviewSettingsModal(); }
    
    async function autoPasteAndExecute() {
      const cmdInput = document.getElementById("quickCommandInput");
      cmdInput.value = "";
      try {
        const text = await navigator.clipboard.readText();
        if (!text) return showAlert("Clipboard kosong!", "error");
        cmdInput.value = text;
        applyAndExecute();
      } catch (err) { showAlert("Gagal mengakses Clipboard. Pastikan izin browser diberikan.", "error"); }
    }
    
    function openServerFilesModal() { document.getElementById("serverFilesModal").classList.remove("hidden"); loadServerFiles(currentServerPath); }
    function closeServerFilesModal() { document.getElementById("serverFilesModal").classList.add("hidden"); }
    
    async function createNewFolderInCurrentPath() {
      let folderName = prompt("Buat folder baru di path: /" + (currentServerPath || "Utama") + "\n\nMasukkan nama folder baru:", "");
      if (folderName === null) return;
      folderName = folderName.trim();
      if (!folderName) return showAlert("Nama folder tidak boleh kosong!", "error");
      const formData = new FormData();
      formData.append("action", "create_folder");
      formData.append("path", currentServerPath);
      formData.append("foldername", folderName);
      try {
        const res = await fetch(apiFile, { method: "POST", body: formData });
        const json = await res.json();
        if (json.status === "success") { showAlert(json.msg || "Folder berhasil dibuat!", "success"); loadServerFiles(currentServerPath); } 
        else { showAlert(json.msg || "Gagal membuat folder.", "error"); }
      } catch (err) { showAlert("Gagal menghubungi server untuk membuat folder.", "error"); }
    }
    
    async function loadServerFiles(path = "") {
      currentServerPath = path;
      const listDiv = document.getElementById("serverFilesList");
      listDiv.innerHTML = '<p class="text-gray-400 text-sm text-center py-4">Memuat data server...</p>';
      try {
        const res = await fetch(apiFile + "?action=list_server_files&path=" + encodeURIComponent(path));
        const json = await res.json();
        if (json.status === "success") {
          listDiv.innerHTML = "";
          if (path !== "") {
            const parentPath = path.includes("/") ? path.substring(0, path.lastIndexOf("/")) : "";
            listDiv.innerHTML += `
              <div class="flex items-center bg-gray-700 p-3 md:p-4 rounded-xl border border-gray-600 hover:bg-gray-500 active:bg-gray-400 transition-all cursor-pointer mb-3 shadow-md gap-3" onclick="loadServerFiles('${parentPath}')">
                <span class="text-white text-sm md:text-base font-bold flex items-center gap-2"><span class="text-xl">🔙</span> Kembali ke Folder Atas</span>
              </div>`;
          }
          if (json.data.length > 0) {
            json.data.forEach((item) => {
              if (item.type === "dir") {
                listDiv.innerHTML += `
                  <div class="flex items-center justify-between bg-gray-800 p-3 md:p-4 rounded-xl border border-gray-700 hover:bg-gray-600 active:bg-gray-500 transition-all cursor-pointer mb-2 shadow-sm" onclick="loadServerFiles('${item.path}')">
                    <span class="text-yellow-400 font-bold mr-3 text-xl drop-shadow-md">📁</span>
                    <span class="text-sm md:text-base font-bold text-gray-200 truncate flex-1">${item.name}</span>
                    <span class="text-gray-500 text-xs">➔</span>
                  </div>`;
              } else {
                listDiv.innerHTML += `
                  <div class="flex flex-col md:flex-row justify-between items-start md:items-center bg-gray-900 p-3 md:p-4 rounded-xl border border-gray-700 hover:bg-gray-800 transition-all mb-2 shadow-sm gap-3">
                    <div class="overflow-hidden w-full flex-1 cursor-pointer flex flex-col justify-center" onclick="loadServerFileContent('${item.path}')">
                      <p class="text-sm font-bold text-gray-200 truncate"><span class="text-blue-400 mr-2 text-lg drop-shadow-md">📄</span>${item.name}</p>
                      <p class="text-xs text-gray-500 mt-1 ml-7 flex items-center gap-1">📏 ${item.size} KB</p>
                    </div>
                    <div class="flex gap-2 w-full md:w-auto shrink-0 mt-1 md:mt-0 ml-0 md:ml-7">
                      <button onclick="loadServerFileContent('${item.path}')" class="flex-1 md:flex-none bg-indigo-600 hover:bg-indigo-500 active:bg-indigo-700 text-white text-xs md:text-sm font-bold py-2 px-4 rounded-lg shadow-md transition-colors flex items-center justify-center gap-1">✨ Pilih</button>
                      <button onclick="downloadServerFile('${item.path}')" class="flex-1 md:flex-none bg-green-600 hover:bg-green-500 active:bg-green-700 text-white text-xs md:text-sm font-bold py-2 px-4 rounded-lg shadow-md transition-colors flex items-center justify-center gap-1">📥 Unduh</button>
                    </div>
                  </div>`;
              }
            });
          } else { listDiv.innerHTML += '<p class="text-gray-400 text-sm text-center py-4">Folder ini kosong.</p>'; }
        }
      } catch (err) { listDiv.innerHTML = '<p class="text-red-400 text-sm text-center py-4">Gagal memuat daftar file/folder.</p>'; }
    }
    
    function downloadServerFile(filepath) {
      window.open(apiFile + "?action=download_server_file&file=" + encodeURIComponent(filepath), "_blank");
    }
    
    async function loadServerFileContent(filename) {
      const formData = new FormData();
      formData.append("action", "get_server_file");
      formData.append("filename", filename);
      try {
        const res = await fetch(apiFile, { method: "POST", body: formData });
        const json = await res.json();
        if (json.status === "success") {
          editor.setValue(json.content);
          activeEditingFilePath = filename;
          closeServerFilesModal();
          showAlert(`File ${filename} berhasil dimuat!`, "success");
        } else { showAlert(json.msg, "error"); }
      } catch (err) { showAlert("Gagal mengambil file server.", "error"); }
    }
    
    let currentUploadPath = "";
    function openServerUploadModal() { document.getElementById("serverUploadModal").classList.remove("hidden"); loadServerUploadFiles(currentUploadPath); }
    function closeServerUploadModal() { document.getElementById("serverUploadModal").classList.add("hidden"); }
    
    // PERBAIKAN FITUR TIMPA BUTTON 
    async function loadServerUploadFiles(path = "") {
      currentUploadPath = path;
      const listDiv = document.getElementById("serverUploadList");
      listDiv.innerHTML = '<p class="text-gray-400 text-sm text-center py-4">Memuat data server...</p>';
      try {
        const res = await fetch(apiFile + "?action=list_server_files&path=" + encodeURIComponent(path));
        const json = await res.json();
        if (json.status === "success") {
          listDiv.innerHTML = "";
          if (path !== "") {
            const parentPath = path.includes("/") ? path.substring(0, path.lastIndexOf("/")) : "";
            listDiv.innerHTML += `
              <div class="flex items-center bg-gray-700 p-3 md:p-4 rounded-xl border border-gray-600 hover:bg-gray-500 active:bg-gray-400 transition-all cursor-pointer mb-3 shadow-md gap-3" onclick="loadServerUploadFiles('${parentPath}')">
                <span class="text-white text-sm md:text-base font-bold flex items-center gap-2"><span class="text-xl">🔙</span> Kembali ke Folder Atas</span>
              </div>`;
          }
          if (json.data.length > 0) {
            json.data.forEach((item) => {
              if (item.type === "dir") {
                listDiv.innerHTML += `
                  <div class="flex items-center justify-between bg-gray-800 p-3 md:p-4 rounded-xl border border-gray-700 hover:bg-gray-600 active:bg-gray-500 transition-all cursor-pointer mb-2 shadow-sm" onclick="loadServerUploadFiles('${item.path}')">
                    <span class="text-yellow-400 font-bold mr-3 text-xl drop-shadow-md">📁</span>
                    <span class="text-sm md:text-base font-bold text-gray-200 truncate flex-1">${item.name}</span>
                    <span class="text-gray-500 text-xs">➔</span>
                  </div>`;
              } else {
                listDiv.innerHTML += `
                  <div class="flex flex-col md:flex-row justify-between items-start md:items-center bg-gray-900 p-3 md:p-4 rounded-xl border border-gray-700 hover:bg-gray-800 transition-all mb-2 shadow-sm gap-3">
                    <div class="overflow-hidden w-full flex-1 cursor-default flex flex-col justify-center">
                      <p class="text-sm font-bold text-gray-200 truncate"><span class="text-blue-400 mr-2 text-lg drop-shadow-md">📄</span>${item.name}</p>
                      <p class="text-xs text-gray-500 mt-1 ml-7 flex items-center gap-1">📏 ${item.size} KB</p>
                    </div>
                    <div class="flex gap-2 w-full md:w-auto shrink-0 mt-2 md:mt-0 ml-0 md:ml-7">
                      <button onclick="overwriteServerFile('${item.path}')" class="flex-1 md:flex-none bg-red-800 hover:bg-red-700 active:bg-red-900 text-white text-[10px] md:text-xs font-bold py-2 px-3 rounded-lg shadow-md transition-colors flex items-center justify-center gap-1">🔄 Timpa</button>
                      <button onclick="downloadServerFile('${item.path}')" class="flex-1 md:flex-none bg-green-600 hover:bg-green-500 active:bg-green-700 text-white text-[10px] md:text-xs font-bold py-2 px-3 rounded-lg shadow-md transition-colors flex items-center justify-center gap-1">📥 Unduh</button>
                    </div>
                  </div>`;
              }
            });
          } else { listDiv.innerHTML += '<p class="text-gray-400 text-sm text-center py-4">Folder ini kosong.</p>'; }
        }
      } catch (err) { listDiv.innerHTML = '<p class="text-red-400 text-sm text-center py-4">Gagal memuat daftar.</p>'; }
    }
    
    // FITUR FUNGSI UNTUK OVERWRITE (TIMPA) LANGSUNG
    async function overwriteServerFile(filepath) {
      const content = editor.getValue();
      if (!content) return showAlert("Kode masih kosong! Isi editor terlebih dahulu.", "error");
      if (!confirm("Yakin ingin menimpa file:\n" + filepath + "\ndengan isi editor saat ini?")) return;
      
      const parts = filepath.split("/");
      const filenameWithExt = parts.pop();
      const path = parts.join("/");
      
      const dotIdx = filenameWithExt.lastIndexOf(".");
      const filename = dotIdx !== -1 ? filenameWithExt.substring(0, dotIdx) : filenameWithExt;
      const ext = dotIdx !== -1 ? filenameWithExt.substring(dotIdx) : "";
    
      const formData = new FormData();
      formData.append("action", "upload_custom");
      formData.append("path", path);
      formData.append("filename", filename);
      formData.append("ext", ext);
      formData.append("content", content);
    
      try {
        const res = await fetch(apiFile, { method: "POST", body: formData });
        const json = await res.json();
        if (json.status === "success") {
          showAlert(`File ${filenameWithExt} berhasil ditimpa!`, "success");
        } else {
          showAlert(json.msg, "error");
        }
      } catch (err) {
        showAlert("Gagal menghubungi server untuk menimpa file.", "error");
      }
    }
    
    async function promptSaveToServer(path) {
      const content = editor.getValue();
      if (!content) return showAlert("Kode masih kosong!", "error");
      let ext = prompt(`Simpan file di folder: /${path || "Utama"}\n\nSebagai format apa? Ketik "php" atau "html" (Tanpa tanda kutip)`, "php");
      if (ext === null) return;
      ext = ext.trim().toLowerCase();
      if (ext !== "php" && ext !== "html") return showAlert("Format tidak valid! Harus php atau html.", "error");
      let filename = prompt("Masukkan nama file (tanpa ekstensi):\n*Peringatan: akan menimpa file jika nama sudah ada.", "");
      if (filename === null || filename.trim() === "") return showAlert("Nama file tidak boleh kosong!", "error");
      const formData = new FormData();
      formData.append("action", "upload_custom");
      formData.append("path", path);
      formData.append("filename", filename.trim());
      formData.append("ext", "." + ext);
      formData.append("content", content);
      try {
        const res = await fetch(apiFile, { method: "POST", body: formData });
        const json = await res.json();
        if (json.status === "success") { showAlert(json.msg, "success"); loadServerUploadFiles(path); } 
        else { showAlert(json.msg, "error"); }
      } catch (err) { showAlert("Gagal mengupload file ke server.", "error"); }
    }
    
    function escapeRegExp(string) { return string.replace(/[.*+?^${}()|[\]\\]/g, "\\$&"); }
    
    async function appBeautifyCodesHandler() {
      let scriptBoxVal = editor.getValue();
      if (!scriptBoxVal || scriptBoxVal.trim() === "") { return showAlert("Gagal Di Rapihkan, Blok editor kosong.", "error"); }
      try {
        if (typeof html_beautify !== "undefined") {
          let formattedCode = html_beautify(scriptBoxVal, {
            indent_size: 2, 
            max_preserve_newlines: 1,
            preserve_newlines: true,
            indent_inner_html: true,
            indent_scripts: "keep",
            end_with_newline: true,
            wrap_line_length: 130,
            wrap_attributes: "auto",
            unformatted: ["b", "i", "u", "a", "span"]
          });
          editor.setValue(formattedCode);
          versionCounter++;
          showAlert("Kode berhasil disusun dan dirapikan otomatis!", "success");
        } else { showAlert("Library beautifier belum terkonfigurasi.", "error"); }
      } catch (exx) { showAlert("Formatting Parsing gagal dijalankan.", "error"); }
    }
    
    let isSystemHackingActive = false;
    
    window.toggleLock = function () {
      const btn = document.getElementById("btnLockPage");
      const pBox = document.getElementById("previewContainer");
      const bgLockerId = "dimmerGlobalCubitZoomMobileX5";
      let shadowBgAman = document.getElementById(bgLockerId);
      isPageLocked = !isPageLocked;
      
      if (!shadowBgAman) {
        shadowBgAman = document.createElement("div");
        shadowBgAman.id = bgLockerId;
        shadowBgAman.className = "fixed inset-0 bg-gray-900 bg-opacity-95 z-[9900] hidden backdrop-blur-md pointer-events-auto touch-none overflow-hidden";
        document.body.appendChild(shadowBgAman);
      }
      
      if (isPageLocked) {
        document.body.style.overflow = "hidden";
        shadowBgAman.classList.remove("hidden");
        btn.classList.replace("bg-gray-700", "bg-pink-600");
        btn.innerHTML = "🔓 Buka Isolasi Kunci Layar";
        btn.style.cssText = "position:fixed !important; bottom:25px; left:50%; transform:translateX(-50%); z-index:9999; box-shadow: 0 5px 35px rgba(225,29,72,0.6); padding:16px 25px; width: auto; font-size:14px; font-weight:800; border:2px solid #fda4af; cursor:pointer; touch-action:manipulation; background:#e11d48;";
        pBox.classList.add("fixed");
        pBox.style.cssText = "top:45%; left:50%; transform:translate(-50%, -50%); z-index:9995; width:100%; max-width:390px; box-shadow: 0 0px 50px rgba(0,0,0,1); margin:0 !important; max-height:85vh;";
        const iframeScaleBumper = document.getElementById("iframeWrapper");
        if (iframeScaleBumper) iframeScaleBumper.style.touchAction = "";
      } else {
        document.body.style.overflow = "";
        shadowBgAman.classList.add("hidden");
        btn.style.cssText = "";
        btn.classList.replace("bg-pink-600", "bg-gray-700");
        btn.innerHTML = "🔒 Kunci Layar";
        pBox.classList.remove("fixed");
        pBox.style.cssText = "border-radius: 2.5rem; transition: all 0.3s ease; width: 100%; max-width: 380px;";
      }
    };
    
    window.applyAndExecute = function () {
      if (isSystemHackingActive) return;
      const commandInput = document.getElementById("quickCommandInput").value;
      let currentHtml = editor.getValue();
      if (!currentHtml) return showAlert("Kode Target Sandbox Di Editor Terdeteksi Kosong.", "error");
      if (!commandInput) return showAlert("Box Format Code Array Modificator JSON Kosong...", "error");
      
      let dataCommandsCompileRunParams;
      try {
        dataCommandsCompileRunParams = JSON.parse(commandInput);
        if (!Array.isArray(dataCommandsCompileRunParams)) dataCommandsCompileRunParams = [dataCommandsCompileRunParams];
      } catch (exeCheckErr1) { return showAlert("ERROR FORMAT INVALID DATA BIND: Cek Kelengkapan String Pada Syntx JSON", "error"); }
      
      let checkHTMLDraftValidationsSimulate = currentHtml;
      for (let numAraySysCheckLoopZ1 = 0; numAraySysCheckLoopZ1 < dataCommandsCompileRunParams.length; numAraySysCheckLoopZ1++) {
        let cmdsHook = dataCommandsCompileRunParams[numAraySysCheckLoopZ1];
        const flagz = (cmdsHook.global ? "g" : "") + "m";
        let regexObj = cmdsHook.regex ? new RegExp(cmdsHook.target, flagz) : new RegExp(escapeRegExp(cmdsHook.target), flagz);
        
        if (!regexObj.test(checkHTMLDraftValidationsSimulate) || (cmdsHook.endTarget && !checkHTMLDraftValidationsSimulate.includes(cmdsHook.endTarget))) {
          return showAlert("❌ VALIDASI BERHENTI DINI\nKode patokan tidak ditemukan di dalam struktur file!\n\nTarget yang luput:\n\"" + cmdsHook.target + "\"", "error");
        }
        
        if (cmdsHook.endTarget && cmdsHook.action === "replace") {
          let startIdx = checkHTMLDraftValidationsSimulate.indexOf(cmdsHook.target);
          let endIdx = checkHTMLDraftValidationsSimulate.indexOf(cmdsHook.endTarget, startIdx);
          if (startIdx !== -1 && endIdx !== -1) {
            endIdx += cmdsHook.endTarget.length;
            checkHTMLDraftValidationsSimulate = checkHTMLDraftValidationsSimulate.substring(0, startIdx) + (cmdsHook.snippet || "") + checkHTMLDraftValidationsSimulate.substring(endIdx);
          } else { checkHTMLDraftValidationsSimulate = checkHTMLDraftValidationsSimulate.replace(regexObj, cmdsHook.snippet || ""); }
        } else if (cmdsHook.action === "replace") {
          checkHTMLDraftValidationsSimulate = checkHTMLDraftValidationsSimulate.replace(regexObj, cmdsHook.snippet || "");
        } else if (cmdsHook.action === "insertBefore") {
          checkHTMLDraftValidationsSimulate = checkHTMLDraftValidationsSimulate.replace(regexObj, (cmdsHook.snippet || "") + "\n$&");
        } else if (cmdsHook.action === "insertAfter") {
          checkHTMLDraftValidationsSimulate = checkHTMLDraftValidationsSimulate.replace(regexObj, "$&\n" + (cmdsHook.snippet || ""));
        }
      }
      
      isSystemHackingActive = true;
      document.getElementById("hackerOverlay").classList.remove("hidden");
      document.getElementById("hackerOverlay").classList.add("flex");
      const term = document.getElementById("hackTerminal");
      term.innerHTML = "";
      
      const logs = [
          ">> ✅ [VERIFIED-PASS-OK!] Tembusan Valid Test-Bench JSON Array...",
          ">> 🔥 Target Cocok Terkonfirmasi.... OK ✅ !!",
          ">> ⚠️ Injecting Memaksa Override Modifkasi Base LayOut File Engine!! 🚀",
          ">> SYSTEM REBUILDS => UPDATE DOM !!",
          ">> FINISHING EXEC !... [Bypass Render Anim Success!] "
      ];
      
      let accumDelay = 0;
      for (let i = 0; i < logs.length; i++) {
        accumDelay += 400 - Math.random() * 50;
        setTimeout(() => { term.innerHTML += `<div class='animate-pulse text-yellow-300'>${logs[i]}</div>`; }, accumDelay);
      }
      
      setTimeout(() => {
        document.getElementById("hackerOverlay").classList.add("hidden");
        document.getElementById("hackerOverlay").classList.remove("flex");
        editor.setValue(checkHTMLDraftValidationsSimulate);
        versionCounter++;
        if (typeof appBeautifyCodesHandler === "function") appBeautifyCodesHandler();
        isSystemHackingActive = false;
        showAlert("🎉 Sukses Diterapkan Ke Engine !! Validasi Modus Eksekusi Inject OKE !! 🚀💥", "success");
      }, 3000);
    };
    
    let activeEditingFilePath = "";
    let isEditFileMode = false;
    let detectedComments = [];
    
    function toggleEditMode() {
      isEditFileMode = !isEditFileMode;
      const btn = document.getElementById("btnModeToggle");
      const editOnlyElems = document.querySelectorAll(".hide-in-edit-mode");
      const btnSimpan = document.getElementById("btnSimpanFileContainer");
      if (isEditFileMode) {
        if (btn) { btn.innerHTML = "✏️ Mode: Edit File"; btn.className = "bg-amber-600 hover:bg-amber-500 text-white font-bold py-2 px-3 rounded-lg text-xs shadow-md transition-colors"; }
        editOnlyElems.forEach(el => el.style.setProperty("display", "none", "important"));
        if (btnSimpan) btnSimpan.style.display = "block";
      } else {
        if (btn) { btn.innerHTML = "🔄 Mode: Normal"; btn.className = "bg-indigo-600 hover:bg-indigo-500 text-white font-bold py-2 px-3 rounded-lg text-xs shadow-md transition-colors"; }
        editOnlyElems.forEach(el => el.style.removeProperty("display"));
        if (btnSimpan) btnSimpan.style.display = "none";
      }
    }
    
    async function saveActiveFileDirect() {
      const content = editor.getValue();
      if (!content) return showAlert("Kode masih kosong!", "error");
      if (!activeEditingFilePath) return showAlert("Belum ada file hosting yang dipilih! Silakan pilih file terlebih dahulu melalui tombol Server.", "error");
      const parts = activeEditingFilePath.split("/");
      const filenameWithExt = parts.pop();
      const path = parts.join("/");
      const dotIdx = filenameWithExt.lastIndexOf(".");
      const filename = dotIdx !== -1 ? filenameWithExt.substring(0, dotIdx) : filenameWithExt;
      const ext = dotIdx !== -1 ? filenameWithExt.substring(dotIdx) : ".php";
      
      const formData = new FormData();
      formData.append("action", "upload_custom");
      formData.append("path", path);
      formData.append("filename", filename);
      formData.append("ext", ext);
      formData.append("content", content);
      try {
        const res = await fetch(apiFile, { method: "POST", body: formData });
        const json = await res.json();
        if (json.status === "success") { showAlert("File '" + activeEditingFilePath + "' berhasil disimpan & ditimpa!", "success"); } 
        else { showAlert(json.msg || "Gagal menyimpan file.", "error"); }
      } catch (err) { showAlert("Gagal menyimpan file ke server.", "error"); }
    }
    
    // PERBAIKAN: UI DEL COMMENTER KHUSUS MOBILE TWEAK CSS DAN JS
    function openDelCommenterModal() {
      const code = editor.getValue();
      if (!code) return showAlert("Kode masih kosong!", "error");
      const commentRegex = /(\/\*[\s\S]*?\*\/|<!--[\s\S]*?-->|\/\/[^\n]*|#[^\n]*)/g;
      detectedComments = [];
      let match;
      while ((match = commentRegex.exec(code)) !== null) {
        const text = match[0].trim();
        if (text) detectedComments.push({ text: match[0], index: match.index });
      }
      
      const container = document.getElementById("commentListContainer");
      const countEl = document.getElementById("commentCountInfo");
      container.innerHTML = "";
      countEl.textContent = "Total Komentar: " + detectedComments.length;
      
      if (detectedComments.length === 0) {
        container.innerHTML = '<p class="text-gray-400 text-sm text-center py-4">Tidak ditemukan komentar pada kode.</p>';
      } else {
        detectedComments.forEach((c, idx) => {
          const card = document.createElement("div");
          // Update CSS Classes agar fleksibel di layar sempit
          card.className = "bg-gray-800 p-2 md:p-3 rounded-lg border border-gray-600 flex justify-between items-center gap-2 shadow";
          card.innerHTML = `
            <div class="flex-1 min-w-0 pr-1">
              <pre class="text-[10px] md:text-xs text-purple-300 font-mono whitespace-pre-wrap break-words max-h-24 overflow-y-auto custom-scrollbar bg-gray-900 p-2 rounded">${escapeHtml(c.text)}</pre>
            </div>
            <button onclick="deleteSingleComment(${idx})" class="bg-red-600 hover:bg-red-500 text-white text-[10px] md:text-xs font-bold py-2 px-3 rounded shadow shrink-0">Hapus</button>
          `;
          container.appendChild(card);
        });
      }
      document.getElementById("commenterModal").classList.remove("hidden");
    }
    
    function closeDelCommenterModal() { document.getElementById("commenterModal").classList.add("hidden"); }
    function escapeHtml(str) { return str.replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/"/g, "&quot;"); }
    
    function deleteSingleComment(idx) {
      if (idx < 0 || idx >= detectedComments.length) return;
      const item = detectedComments[idx];
      let code = editor.getValue();
      code = code.substring(0, item.index) + code.substring(item.index + item.text.length);
      editor.setValue(code);
      openDelCommenterModal();
    }
    
    function deleteAllComments() {
      let code = editor.getValue();
      if (!code) return;
      code = code.replace(/(\/\*[\s\S]*?\*\/|<!--[\s\S]*?-->|\/\/[^\n]*|#[^\n]*)/g, "");
      editor.setValue(code);
      openDelCommenterModal();
      showAlert("Seluruh komentar berhasil dihapus!", "success");
    }
  </script>
</body>

</html>
