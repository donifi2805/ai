<!DOCTYPE html>
<html lang="id" class="dark">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>TestrxBox Tools</title>
<link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
<style>
        :root {
            --ink: #edf4ff;
            --muted: #93a4bd;
            --muted-strong: #bdcbe0;
            --canvas: #07111f;
            --surface: rgba(14, 27, 47, 0.88);
            --surface-raised: #14243d;
            --surface-input: #0a1729;
            --line: rgba(148, 163, 184, 0.16);
            --line-strong: rgba(129, 140, 248, 0.38);
            --primary: #6d5dfc;
            --primary-bright: #8b7fff;
            --teal: #2dd4bf;
            --danger: #fb7185;
            --shadow: 0 20px 52px rgba(0, 0, 0, 0.28);
        }

        * { -webkit-tap-highlight-color: transparent; }
        html { min-height: 100%; background: var(--canvas); }
        body {
            min-width: 320px;
            min-height: 100vh;
            margin: 0;
            color: var(--ink);
            font-family: Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            background:
                radial-gradient(circle at 12% -10%, rgba(109, 93, 252, 0.22), transparent 28rem),
                radial-gradient(circle at 96% 22%, rgba(45, 212, 191, 0.10), transparent 24rem),
                var(--canvas);
        }
        button, input, textarea, select { font: inherit; }
        button { touch-action: manipulation; }
        button:focus-visible, input:focus-visible, textarea:focus-visible, select:focus-visible, a:focus-visible {
            outline: 3px solid rgba(129, 140, 248, 0.9);
            outline-offset: 3px;
        }
        .modal-message-success { color: #6ee7b7; }
        .modal-message-error { color: #fda4af; }
        .modal-message-info { color: #93c5fd; }
        .custom-scrollbar::-webkit-scrollbar { width: 5px; height: 5px; }
        .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: #43536c; border-radius: 99px; }

        .app-shell {
            width: min(100%, 1180px);
            min-height: 100vh;
            margin: 0 auto;
            padding: max(18px, env(safe-area-inset-top)) max(16px, env(safe-area-inset-right)) max(32px, env(safe-area-inset-bottom)) max(16px, env(safe-area-inset-left));
        }
        .app-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 14px;
            margin: 2px 2px 24px;
        }
        .brand {
            display: flex;
            align-items: center;
            min-width: 0;
            gap: 12px;
        }
        .brand-mark {
            display: grid;
            width: 42px;
            height: 42px;
            flex: 0 0 42px;
            place-items: center;
            color: white;
            border: 1px solid rgba(255,255,255,.18);
            border-radius: 14px;
            background: linear-gradient(145deg, #8b7fff, #5544dc 58%, #3d2c9d);
            box-shadow: 0 10px 24px rgba(81, 65, 214, .35), inset 0 1px rgba(255,255,255,.24);
        }
        .brand-mark svg { width: 23px; height: 23px; }
        .brand-eyebrow, .section-eyebrow {
            margin: 0 0 3px;
            color: #a7b8d2;
            font-size: 10px;
            font-weight: 800;
            line-height: 1;
            letter-spacing: .13em;
            text-transform: uppercase;
        }
        .brand h1 {
            margin: 0;
            color: #f8fbff;
            font-size: clamp(1.15rem, 4.8vw, 1.5rem);
            font-weight: 800;
            line-height: 1.15;
            letter-spacing: -.035em;
        }
        .connection-pill {
            display: inline-flex;
            align-items: center;
            flex: 0 0 auto;
            gap: 7px;
            padding: 8px 10px;
            color: #b8f6e9;
            font-size: 11px;
            font-weight: 700;
            white-space: nowrap;
            border: 1px solid rgba(45, 212, 191, .20);
            border-radius: 999px;
            background: rgba(20, 102, 100, .17);
        }
        .connection-pill::before {
            width: 7px;
            height: 7px;
            content: "";
            border-radius: 999px;
            background: var(--teal);
            box-shadow: 0 0 0 4px rgba(45, 212, 191, .12);
        }

        .workspace {
            display: grid;
            grid-template-columns: minmax(0, 1fr);
            gap: 14px;
            align-items: start;
        }
        .app-card {
            position: relative;
            overflow: hidden;
            padding: 16px;
            border: 1px solid var(--line);
            border-radius: 20px;
            background: linear-gradient(145deg, rgba(22, 39, 65, .92), var(--surface));
            box-shadow: var(--shadow), inset 0 1px rgba(255,255,255,.035);
        }
        .app-card::before {
            position: absolute;
            top: 0;
            right: 20px;
            left: 20px;
            height: 1px;
            content: "";
            background: linear-gradient(90deg, transparent, rgba(255,255,255,.16), transparent);
        }
        .section-heading {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 12px;
            margin-bottom: 14px;
        }
        .section-title {
            margin: 0;
            color: #f4f8ff;
            font-size: 16px;
            font-weight: 780;
            line-height: 1.2;
            letter-spacing: -.02em;
        }
        .section-description {
            margin: 4px 0 0;
            color: var(--muted);
            font-size: 12px;
            line-height: 1.45;
        }
        .section-badge {
            display: inline-flex;
            align-items: center;
            padding: 6px 8px;
            color: #c7c2ff;
            font-size: 10px;
            font-weight: 800;
            line-height: 1;
            letter-spacing: .06em;
            text-transform: uppercase;
            border: 1px solid rgba(139,127,255,.24);
            border-radius: 999px;
            background: rgba(109,93,252,.14);
        }

        .file-state {
            display: flex;
            align-items: center;
            min-width: 0;
            gap: 10px;
            padding: 11px 12px;
            border: 1px solid rgba(148,163,184,.13);
            border-radius: 13px;
            background: rgba(7, 17, 31, .48);
        }
        #mainIndicator {
            width: 9px;
            height: 9px;
            box-shadow: 0 0 0 4px rgba(248,113,113,.13);
        }
        #mainIndicator.bg-green-500 { box-shadow: 0 0 0 4px rgba(52,211,153,.14); }
        .file-state-copy { min-width: 0; }
        .file-state-label { display: block; margin-bottom: 2px; color: var(--muted); font-size: 10px; font-weight: 800; letter-spacing: .08em; text-transform: uppercase; }
        #versionIndicator { display: block; overflow: hidden; color: #e7efff; font-size: 13px; line-height: 1.3; text-overflow: ellipsis; white-space: nowrap; }
        .file-actions { display: grid; grid-template-columns: repeat(4, minmax(0, 1fr)); gap: 8px; margin-top: 12px; }
        .action-tile {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-width: 0;
            min-height: 68px;
            gap: 5px;
            padding: 8px 4px;
            color: #c7d4e9;
            font-size: 10px;
            font-weight: 750;
            line-height: 1.05;
            border: 1px solid rgba(148,163,184,.14);
            border-radius: 14px;
            background: rgba(8, 21, 38, .70);
            transition: transform .18s ease, border-color .18s ease, background .18s ease, color .18s ease;
        }
        .action-tile .action-icon { font-size: 20px; line-height: 1; }
        .action-tile:hover { color: #fff; border-color: rgba(139,127,255,.58); background: rgba(84, 68, 220, .24); transform: translateY(-1px); }
        .action-tile.action-save:hover { border-color: rgba(45,212,191,.58); background: rgba(13,148,136,.19); }

        .ai-card { border-color: rgba(109,93,252,.24); }
        .ai-panel {
            padding: 13px;
            border: 1px solid rgba(139,127,255,.23);
            border-radius: 16px;
            background: linear-gradient(145deg, rgba(70, 58, 172, .20), rgba(7, 18, 35, .26));
        }
        .ai-panel-head { display: flex; align-items: flex-start; justify-content: space-between; gap: 10px; margin-bottom: 11px; }
        .ai-panel-title { display: flex; align-items: center; gap: 7px; margin: 0; color: #ddd9ff; font-size: 13px; font-weight: 800; }
        .ai-meta { display: flex; align-items: center; gap: 6px; margin-top: 6px; }
        .request-chip, .external-link {
            display: inline-flex;
            align-items: center;
            min-height: 22px;
            padding: 4px 7px;
            color: #bcc5f9;
            font-size: 10px;
            font-weight: 700;
            text-decoration: none;
            border: 1px solid rgba(139,127,255,.28);
            border-radius: 7px;
            background: rgba(40, 36, 107, .33);
        }
        .external-link { color: #bdeef3; border-color: rgba(45,212,191,.24); background: rgba(13, 91, 95, .18); }
        #aiLoadingIndicator { align-self: center; color: #8bf4e1; font-size: 10px; }
        .field-label { display: block; margin: 0 0 7px; color: #a8b8d0; font-size: 10px; font-weight: 800; letter-spacing: .08em; text-transform: uppercase; }
        .ai-model { margin-bottom: 10px; }
        select, input[type="text"], textarea {
            color: #eaf1fb !important;
            border-color: rgba(148,163,184,.22) !important;
            background: var(--surface-input) !important;
            box-shadow: inset 0 1px 3px rgba(0,0,0,.20) !important;
        }
        select { min-height: 42px; font-size: 12px !important; }
        input[type="text"] { min-height: 44px; font-size: 13px !important; }
        textarea { min-height: 105px; font-size: 11px !important; line-height: 1.55; resize: vertical; }
        select:focus, input[type="text"]:focus, textarea:focus { border-color: rgba(129,140,248,.9) !important; box-shadow: 0 0 0 3px rgba(109,93,252,.14) !important; }
        .prompt-row { display: grid; grid-template-columns: minmax(0, 1fr) auto auto; gap: 8px; }
        .icon-button, .prompt-apply {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 44px;
            border-radius: 11px;
            transition: transform .18s ease, filter .18s ease, box-shadow .18s ease;
        }
        .prompt-apply { padding: 0 13px; color: white; font-size: 12px; font-weight: 800; background: linear-gradient(135deg, #7566ff, #5d48e3) !important; box-shadow: 0 8px 18px rgba(72,57,210,.25); }
        .icon-button { width: 44px; padding: 0; font-size: 16px; background: rgba(244,63,94,.76) !important; }
        .prompt-apply:hover, .icon-button:hover, .run-actions button:hover, .backup-actions button:hover, .upload-specific:hover { filter: brightness(1.1); transform: translateY(-1px); }
        #aiActivityLog { border-color: rgba(45,212,191,.35) !important; border-radius: 13px; background: #06151d !important; }
        .command-label { margin-top: 2px; }
        .run-actions { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 8px; }
        .run-actions button, .backup-actions button {
            min-height: 50px;
            padding: 9px 8px;
            font-size: 12px;
            font-weight: 800;
            border: 1px solid rgba(255,255,255,.09);
            border-radius: 13px;
            box-shadow: none;
        }
        .run-actions span, .backup-actions span { font-size: 17px; }
        .run-actions button:first-child { background: linear-gradient(135deg, #3973ea, #2757bd) !important; }
        .run-actions button:nth-child(2) { background: linear-gradient(135deg, #119d92, #087970) !important; }
        .run-actions button:nth-child(3) { background: linear-gradient(135deg, #6555d7, #4c3fa7) !important; }
        .run-actions button:nth-child(4) { background: linear-gradient(135deg, #c34b69, #98344d) !important; }

        .publish-card { padding-bottom: 17px; }
        .export-grid { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 8px; }
        .export-card {
            display: flex;
            gap: 5px;
            padding: 5px;
            border: 1px solid rgba(148,163,184,.16);
            border-radius: 13px;
            background: rgba(7,17,31,.46) !important;
        }
        .export-card button:first-child { min-width: 0; min-height: 38px; color: #c7d4e9; font-size: 11px; }
        .export-card button:last-child { width: 38px; min-width: 38px; border-radius: 9px; background: #13836d !important; }
        .upload-specific {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 47px;
            gap: 7px;
            margin: 10px 0 0;
            color: #fff;
            font-size: 12px;
            font-weight: 800;
            border: 1px solid rgba(167, 155, 255, .24);
            border-radius: 13px;
            background: linear-gradient(135deg, #6c5ce7, #4e3cc9) !important;
        }
        .backup-divider { height: 1px; margin: 14px 0; background: var(--line); }
        .backup-actions { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 8px; }
        .backup-actions button { flex-direction: row; gap: 7px; }
        .backup-actions button:first-child { background: linear-gradient(135deg, #c77a18, #a4590b) !important; }
        .backup-actions button:last-child { background: linear-gradient(135deg, #2486c0, #17619b) !important; }

        .preview-card { overflow: visible; }
        .preview-tools { display: grid; grid-template-columns: 1fr 1fr; gap: 8px; margin-bottom: 14px; }
        .preview-tools button {
            min-height: 43px;
            padding: 8px;
            color: #d5dff0;
            font-size: 12px;
            font-weight: 750;
            border: 1px solid rgba(148,163,184,.17);
            border-radius: 12px;
            background: rgba(9,22,39,.70) !important;
            box-shadow: none;
        }
        .preview-tools button:hover { color: white; border-color: rgba(139,127,255,.55); background: rgba(84,68,220,.27) !important; }
        #btnLockPage:hover { border-color: rgba(251,113,133,.52); background: rgba(190,24,93,.30) !important; }
        .device-stage {
            position: relative;
            display: flex;
            justify-content: center;
            padding: 16px 4px 8px;
            overflow: hidden;
            border: 1px solid rgba(148,163,184,.12);
            border-radius: 17px;
            background: radial-gradient(circle at 50% 0%, rgba(109,93,252,.13), transparent 58%), rgba(5,13,25,.50);
        }
        .device-stage::before { position: absolute; top: 0; width: 76px; height: 3px; content: ""; border-radius: 0 0 99px 99px; background: rgba(139,127,255,.7); }
        #previewContainer {
            border-width: 7px !important;
            border-color: #050b15 !important;
            border-radius: 2rem !important;
            box-shadow: 0 18px 38px rgba(0,0,0,.55), 0 0 0 1px rgba(255,255,255,.1) !important;
        }
        #previewNotch > div { height: 18px !important; border-radius: 0 0 10px 10px !important; background: #050b15 !important; }
        #previewNav { height: 43px; padding: 0 14px; color: #8594aa; font-size: 10px; background: #050b15 !important; }
        #previewNav button { min-height: 36px; padding: 6px 7px; }
        .console-grid { display: grid; grid-template-columns: 1fr; gap: 8px; margin-top: 14px; }
        .console-panel { height: 132px; overflow: hidden; border-radius: 13px; background: #07101e !important; }
        .console-panel > div:first-child { padding: 8px 10px; font-size: 10px; }
        .console-panel > div:first-child button { min-height: 24px; padding: 3px 7px; font-size: 10px; }
        .console-panel > div:last-child { padding: 9px 10px; font-size: 10px; }
        .console-error { border-color: rgba(248,113,113,.35) !important; }
        .console-error > div:first-child { background: rgba(127,29,29,.72) !important; }
        .console-system { border-color: rgba(45,212,191,.30) !important; }
        .console-system > div:first-child { background: rgba(6,95,70,.64) !important; }

        .app-footer { display: flex; justify-content: center; gap: 10px; margin-top: 20px; color: #667893; font-size: 10px; }
        .app-footer span + span::before { margin-right: 10px; content: "•"; color: #536178; }

        #previewSettingsModal, #backupModal, #restoreModal, #serverFilesModal, #serverUploadModal, #alertModal { background: rgba(2, 8, 18, .78) !important; backdrop-filter: blur(8px); }
        #previewSettingsModal > div, #backupModal > div, #restoreModal > div, #serverFilesModal > div, #serverUploadModal > div, #alertModal > div {
            overflow: hidden;
            border-color: rgba(148,163,184,.20) !important;
            border-radius: 19px !important;
            background: #101e33 !important;
            box-shadow: 0 22px 70px rgba(0,0,0,.55) !important;
        }
        #previewSettingsModal > div, #backupModal > div, #alertModal > div { width: min(100%, 380px); }
        #restoreModal > div, #serverFilesModal > div, #serverUploadModal > div { width: min(100%, 520px); }
        #previewSettingsModal input, #backupModal input, #backupModal select { min-height: 42px; }

        .hacker-bg { background: repeating-linear-gradient(0deg, rgba(10,17,40,0.85) 0px, rgba(10,17,40,0.85) 2px, transparent 2px, transparent 4px), radial-gradient(circle at center, #001210 0%, #000 100%); animation: hackerFlicker 0.15s infinite; }
        .hacker-scan-line { position: absolute; top: -10%; left: 0; width: 100%; height: 6px; background: rgba(0, 255, 170, 0.4); box-shadow: 0 0 15px rgba(0, 255, 170, 0.8); animation: hScan 1.8s linear infinite; z-index: 5; }
        @keyframes hScan { to { top: 110%; } }
        @keyframes hackerFlicker { 0%,100% { opacity: 0.98; } 50% { opacity: 1; } }
        .glitch-text { font-weight: bold; text-shadow: 0 0 5px #0fa, 0 0 15px #0fa; color: #0f0; }

        @media (min-width: 680px) {
            .app-shell { padding-right: 24px; padding-left: 24px; }
            .app-card { padding: 20px; }
            .console-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); }
        }
        @media (min-width: 980px) {
            .workspace { grid-template-columns: minmax(360px, .88fr) minmax(440px, 1.12fr); gap: 18px; }
            .source-card, .ai-card { grid-column: 1; }
            .publish-card, .preview-card { grid-column: 2; }
            .preview-card { grid-row: span 2; }
            .app-card { padding: 21px; }
        }
        @media (max-width: 380px) {
            .app-shell { padding-right: 12px; padding-left: 12px; }
            .connection-pill { padding: 7px; font-size: 0; }
            .connection-pill::before { margin: 1px; }
            .app-card { padding: 14px; border-radius: 18px; }
            .action-tile { min-height: 64px; }
            .prompt-row { grid-template-columns: minmax(0, 1fr) auto; }
            .prompt-apply { grid-column: 1 / -1; grid-row: 2; }
        }
        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after { scroll-behavior: auto !important; transition-duration: .01ms !important; animation-duration: .01ms !important; animation-iteration-count: 1 !important; }
        }
    </style>
</head>
<body class="text-gray-200">
<div class="app-shell">
    <header class="app-header">
        <div class="brand">
            <div class="brand-mark" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M7.5 4.5h-1A2.5 2.5 0 0 0 4 7v10a2.5 2.5 0 0 0 2.5 2.5h11A2.5 2.5 0 0 0 20 17v-5"/><path d="M13 4.5h5.5v5.5"/><path d="m11 13 7.5-8.5"/><path d="M8 9.5v5h5"/></svg>
            </div>
            <div>
                <p class="brand-eyebrow">Mobile workspace</p>
                <h1>TestrxBox Tools</h1>
            </div>
        </div>
        <span class="connection-pill">Siap dipakai</span>
    </header>

    <input type="file" id="fileUploader" accept=".html,.htm,.txt,.php" style="display: none;" onchange="handleFileSelect(event)">
    <textarea id="hiddenEditor" style="display: none;"></textarea>

    <main class="workspace" aria-label="Ruang kerja TestrxBox">
        <section class="app-card source-card" aria-labelledby="source-title">
            <div class="section-heading">
                <div>
                    <p class="section-eyebrow">01 · Sumber kode</p>
                    <h2 id="source-title" class="section-title">Mulai dari file Anda</h2>
                    <p class="section-description">Impor, tempel, atau salin kode yang sedang dikerjakan.</p>
                </div>
                <span class="section-badge">Editor</span>
            </div>
            <div class="file-state" aria-live="polite">
                <div id="mainIndicator" class="status-dot w-4 h-4 rounded-full bg-red-500 transition-colors flex-shrink-0"></div>
                <div class="file-state-copy">
                    <span class="file-state-label">Dokumen aktif</span>
                    <span id="versionIndicator" class="font-mono font-bold whitespace-nowrap">[ KOSONG ]</span>
                </div>
            </div>
            <div class="file-actions" id="gridCompactBar">
                <button type="button" onclick="triggerFileUpload()" class="action-tile bg-gray-700" aria-label="Pilih file lokal">
                    <span class="action-icon" aria-hidden="true">📁</span><span>Lokal</span>
                </button>
                <button type="button" onclick="openServerFilesModal()" class="action-tile bg-blue-800" aria-label="Pilih file dari server">
                    <span class="action-icon" aria-hidden="true">☁️</span><span>Server</span>
                </button>
                <button type="button" onclick="pasteIntoMainEditor()" class="action-tile bg-gray-700" aria-label="Tempel kode dari papan klip">
                    <span class="action-icon" aria-hidden="true">📋</span><span>Tempel</span>
                </button>
                <button type="button" onclick="copyToClipboard()" class="action-tile action-save bg-emerald-700" aria-label="Salin kode ke papan klip">
                    <span class="action-icon" aria-hidden="true">✂️</span><span>Salin</span>
                </button>
            </div>
        </section>

        <section class="app-card ai-card" aria-labelledby="ai-title">
            <div class="section-heading">
                <div>
                    <p class="section-eyebrow">02 · Asisten</p>
                    <h2 id="ai-title" class="section-title">Modifikasi dengan AI</h2>
                    <p class="section-description">Uraikan perubahan atau jalankan instruksi JSON secara langsung.</p>
                </div>
                <span class="section-badge">AI</span>
            </div>

            <div class="ai-panel">
                <div class="ai-panel-head">
                    <div>
                        <p class="ai-panel-title"><span aria-hidden="true">✨</span> AI Modifikator</p>
                        <div class="ai-meta">
                            <span class="request-chip" title="Total API hit di sesi ini">Req: <span id="aiReqCount" class="font-mono font-bold text-white ml-1">0</span></span>
                            <a href="https://aistudio.google.com/app/plan_information" target="_blank" rel="noopener noreferrer" class="external-link">Pusat AI ↗</a>
                        </div>
                    </div>
                    <span id="aiLoadingIndicator" class="hidden animate-pulse font-mono">Memproses…</span>
                </div>
                <div class="ai-model">
                    <label class="field-label" for="aiModelSelect">Model aktif</label>
                    <select id="aiModelSelect" class="w-full rounded-lg px-3 cursor-pointer">
                        <option value="gemini-3.5-flash">⚡ Gemini 3.5 Flash — cepat & ringan</option>
                        <option value="gemini-3.1-pro-preview">🧠 Gemini 3.1 Pro Preview — analitis</option>
                    </select>
                </div>
                <div class="prompt-row">
                    <input type="text" id="aiDirectPrompt" class="min-w-0 rounded-lg px-3" placeholder="Contoh: ubah warna tombol Rapi Kode menjadi merah">
                    <button type="button" onclick="executeAiPrompt()" class="prompt-apply bg-indigo-600" aria-label="Terapkan perintah AI">🪄 <span class="ml-1">Terapkan</span></button>
                    <button type="button" onclick="window.aiMemory=[]; document.getElementById('aiDirectPrompt').value=''; showAlert('Memori AI berhasil dikosongkan! AI siap untuk topik baru.', 'success');" class="icon-button bg-rose-700" title="Hapus ingatan AI" aria-label="Hapus ingatan AI">🗑️</button>
                </div>
            </div>

            <div id="aiActivityLog" class="hidden w-full p-3 font-mono overflow-y-auto custom-scrollbar flex-col gap-1 z-10 relative"></div>
            <div>
                <label class="field-label command-label" for="quickCommandInput">Perintah JSON</label>
                <textarea id="quickCommandInput" rows="3" class="w-full rounded-xl p-3 font-mono custom-scrollbar" placeholder='[{"snippet":"...","target":"...","action":"replace"}]'></textarea>
            </div>
            <div class="run-actions">
                <button type="button" onclick="applyAndExecute()" class="bg-blue-600 text-white flex justify-center items-center gap-2"><span aria-hidden="true">▶️</span> Jalankan</button>
                <button type="button" onclick="autoPasteAndExecute()" class="bg-teal-600 text-white flex justify-center items-center gap-2"><span aria-hidden="true">🚀</span> Auto-run</button>
                <button type="button" onclick="appBeautifyCodesHandler()" class="bg-indigo-700 text-white flex justify-center items-center gap-2"><span aria-hidden="true">🪄</span> Rapi Kode</button>
                <button type="button" onclick="appFixSyntaxApiTarget()" class="bg-rose-700 text-white flex justify-center items-center gap-2"><span aria-hidden="true">🩺</span> Syntax Fix</button>
            </div>
        </section>

        <section class="app-card publish-card" aria-labelledby="publish-title">
            <div class="section-heading">
                <div>
                    <p class="section-eyebrow">03 · Publikasi</p>
                    <h2 id="publish-title" class="section-title">Simpan & unggah</h2>
                    <p class="section-description">Ekspor hasil kerja atau kelola cadangan dengan cepat.</p>
                </div>
                <span class="section-badge">Deploy</span>
            </div>
            <div class="export-grid">
                <div class="export-card bg-gray-700">
                    <button type="button" onclick="downloadResult('index')" class="flex-1 bg-transparent text-white font-bold rounded-lg truncate">📥 Index</button>
                    <button type="button" onclick="uploadToPublic('index')" class="shrink-0 bg-green-600 text-white flex items-center justify-center" title="Upload index ke server" aria-label="Upload index ke server">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/></svg>
                    </button>
                </div>
                <div class="export-card bg-gray-700">
                    <button type="button" onclick="downloadResult('paneladmin')" class="flex-1 bg-transparent text-white font-bold rounded-lg truncate">📥 Panel</button>
                    <button type="button" onclick="uploadToPublic('paneladmin')" class="shrink-0 bg-green-600 text-white flex items-center justify-center" title="Upload paneladmin ke server" aria-label="Upload paneladmin ke server">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/></svg>
                    </button>
                </div>
            </div>
            <button type="button" onclick="openServerUploadModal()" class="upload-specific bg-indigo-600"><span aria-hidden="true">☁️</span> Upload ke folder spesifik</button>
            <div class="backup-divider" aria-hidden="true"></div>
            <div class="backup-actions">
                <button type="button" onclick="openBackupModal()" class="bg-amber-600 text-white flex items-center justify-center"><span aria-hidden="true">📦</span> Backup</button>
                <button type="button" onclick="openRestoreModal()" class="bg-sky-600 text-white flex items-center justify-center"><span aria-hidden="true">🔄</span> Restore</button>
            </div>
        </section>

        <section class="app-card preview-card" aria-labelledby="preview-title">
            <div class="section-heading">
                <div>
                    <p class="section-eyebrow">04 · Pratinjau</p>
                    <h2 id="preview-title" class="section-title">Layar mobile</h2>
                    <p class="section-description">Periksa tampilan sebelum kode dipublikasikan.</p>
                </div>
                <span class="section-badge">Live</span>
            </div>
            <div class="preview-tools">
                <button type="button" onclick="openPreviewSettingsModal()" class="bg-gray-700">⚙️ Pengaturan</button>
                <button type="button" id="btnLockPage" onclick="toggleLock()" class="bg-gray-700">🔒 Kunci layar</button>
            </div>
            <div class="device-stage">
                <div id="previewContainer" class="border-8 border-gray-900 overflow-hidden bg-white relative shadow-2xl flex flex-col mx-auto" style="border-radius: 2.5rem; transition: all 0.3s ease; width: 100%; max-width: 380px;">
                    <div id="previewNotch" class="absolute top-0 inset-x-0 h-6 flex justify-center z-10 pointer-events-none"><div class="h-5 bg-gray-900 rounded-b-xl" style="width: 100px;"></div></div>
                    <div id="iframeWrapper" class="relative w-full overflow-hidden bg-white"><iframe id="mobilePreview" title="Pratinjau kode mobile" class="border-none absolute top-0 left-0" style="transform-origin: top left; max-width: none !important;"></iframe></div>
                    <div id="previewNav" class="w-full flex justify-around items-center shrink-0 z-10">
                        <button type="button" onclick="historyBackPreview()">❮ Kembali</button>
                        <button type="button" onclick="forceUpdatePreview()">● Muat ulang</button>
                        <button type="button" class="cursor-default" aria-label="Recent">■ Recent</button>
                    </div>
                </div>
            </div>
            <div class="console-grid">
                <div class="console-panel console-error border border-red-800 flex flex-col">
                    <div class="text-white font-bold flex justify-between items-center"><span>⚠️ Deteksi error</span><button type="button" onclick="document.getElementById('errorConsole').innerHTML=''" class="bg-red-700 text-white rounded transition-colors" title="Bersihkan log">Bersihkan</button></div>
                    <div id="errorConsole" class="font-mono text-red-400 overflow-y-auto flex-1 whitespace-pre-wrap break-all custom-scrollbar"></div>
                </div>
                <div class="console-panel console-system border border-green-800 flex flex-col">
                    <div class="text-white font-bold flex justify-between items-center"><span>✓ Aktivitas sistem</span><button type="button" onclick="document.getElementById('sysConsole').innerHTML=''" class="bg-green-700 text-white rounded transition-colors" title="Bersihkan log">Bersihkan</button></div>
                    <div id="sysConsole" class="font-mono text-green-400 overflow-y-auto flex-1 whitespace-pre-wrap break-all custom-scrollbar"></div>
                </div>
            </div>
        </section>
    </main>

    <footer class="app-footer" aria-label="Kontak">
        <span>ig@donitata1717</span><span>wa 6285156776974</span><span>modder &amp; programmer</span>
    </footer>
</div>
<div id="previewSettingsModal" class="fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center z-50 p-4 hidden">
<div class="bg-gray-800 rounded-2xl shadow-2xl border border-gray-700 w-full max-w-sm mx-auto border border-gray-700 flex flex-col">
<div class="p-4 border-b border-gray-700 flex justify-between items-center">
<h3 class="text-lg font-bold text-indigo-400">Pengaturan Pratinjau</h3>
<button onclick="closePreviewSettingsModal()" class="text-gray-400 hover:text-white text-xl">✖</button>
</div>
<div class="p-5 flex flex-col gap-4">
<div class="grid grid-cols-2 gap-3">
<div>
<label class="text-xs text-gray-400">Lebar Asli (px)</label>
<input type="text" id="previewWidth" value="360" class="w-full bg-gray-900 text-white border border-gray-600 rounded px-3 py-2 mt-1">
</div>
<div>
<label class="text-xs text-gray-400">Tinggi Asli (px)</label>
<input type="text" id="previewHeight" value="760" class="w-full bg-gray-900 text-white border border-gray-600 rounded px-3 py-2 mt-1">
</div>
</div>
<div>
<label class="text-xs text-gray-400">Tingkat Skala/Zoom (%)</label>
<input type="text" id="previewScale" value="100" class="w-full bg-gray-900 text-white border border-gray-600 rounded px-3 py-2 mt-1">
</div>
</div>
<div class="p-4 border-t border-gray-700">
<button onclick="applyAndCloseSettings()" class="w-full bg-teal-600 hover:bg-teal-500 text-white font-bold py-2 rounded-md shadow">Terapkan & Tutup</button>
</div>
</div>
</div>
<div id="backupModal" class="fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center z-50 p-4 hidden">
<div class="bg-gray-800 rounded-2xl shadow-2xl border border-gray-700 w-full max-w-sm mx-auto border border-gray-700 flex flex-col">
<div class="p-4 border-b border-gray-700">
<h3 class="text-lg font-bold text-amber-400">Simpan Backup Kode</h3>
</div>
<div class="p-5 flex flex-col gap-4">
<div>
<label class="text-sm text-gray-300">Nama File Backup</label>
<input type="text" id="backupFilename" placeholder="contoh: update_nav_baru" class="w-full bg-gray-900 text-white border border-gray-600 rounded px-3 py-2 mt-1 focus:outline-none focus:border-amber-400">
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
<button onclick="executeBackup()" class="flex-1 bg-amber-600 hover:bg-amber-500 text-white font-bold py-2 rounded-md">Simpan</button>
</div>
</div>
</div>
<div id="restoreModal" class="fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center z-50 p-4 hidden">
<div class="bg-gray-800 rounded-2xl shadow-2xl border border-gray-700 w-full max-w-md mx-auto border border-gray-700 flex flex-col" style="max-height: 80vh;">
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
<div class="bg-gray-800 rounded-2xl shadow-2xl border border-gray-700 w-full max-w-md mx-auto border border-gray-700 flex flex-col" style="max-height: 80vh;">
<div class="p-4 border-b border-gray-700 flex justify-between items-center">
<h3 class="text-lg font-bold text-blue-400">Pilih File Hosting</h3>
<button onclick="closeServerFilesModal()" class="text-gray-400 hover:text-white text-xl">✖</button>
</div>
<div class="p-2 overflow-y-auto custom-scrollbar flex-1" id="serverFilesListContainer">
<div id="serverFilesList" class="flex flex-col gap-2">
<p class="text-gray-400 text-sm text-center py-4">Memuat data...</p>
</div>
</div>
</div>
</div>
<div id="serverUploadModal" class="fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center z-50 p-4 hidden">
<div class="bg-gray-800 rounded-2xl shadow-2xl border border-gray-700 w-full max-w-md mx-auto border border-gray-700 flex flex-col" style="max-height: 80vh;">
<div class="p-4 border-b border-gray-700 flex flex-col gap-3">
<div class="flex justify-between items-center">
<h3 class="text-lg font-bold text-indigo-400">Pilih Folder & Upload</h3>
<button onclick="closeServerUploadModal()" class="text-gray-400 hover:text-white text-xl">✖</button>
</div>
<button onclick="promptSaveToServer(currentUploadPath)" class="w-full bg-emerald-600 hover:bg-emerald-500 text-white font-bold py-2 rounded-md shadow flex items-center justify-center gap-2">
<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12">
</path>
</svg> Upload Di Sini</button>
</div>
<div class="p-2 overflow-y-auto custom-scrollbar flex-1" id="serverUploadListContainer">
<div id="serverUploadList" class="flex flex-col gap-2">
<p class="text-gray-400 text-sm text-center py-4">Memuat data...</p>
</div>
</div>
</div>
</div>
<div id="hackerOverlay" class="fixed inset-0 z-[100] bg-black p-6 hidden flex-col items-center justify-center font-mono overflow-hidden transition-all duration-300">
<div class="absolute inset-0 hacker-bg z-0">
</div>
<div class="hacker-scan-line pointer-events-none">
</div>
<div class="relative z-10 w-full max-w-lg mx-auto">
<div class="text-center mb-6">
<h1 class="text-4xl uppercase glitch-text tracking-widest mb-1">⚠️ OVERRIDE KODE ⚠️</h1>
<p class="text-teal-500 text-sm opacity-80 animate-pulse">Executing Injection JSON Modifier System v3.4</p>
</div>
<div class="bg-gray-900 border border-green-600 rounded p-4 h-64 overflow-hidden relative shadow-[0_0_25px_rgba(0,255,170,0.15)] flex flex-col">
<div class="w-full flex items-center gap-2 mb-2 pb-2 border-b border-green-800">
<div class="w-3 h-3 rounded-full bg-red-500 animate-pulse">
</div>
<div class="w-3 h-3 rounded-full bg-yellow-500 animate-pulse" style="animation-delay:0.2s">
</div>
<div class="w-3 h-3 rounded-full bg-green-500 animate-pulse" style="animation-delay:0.4s">
</div>
<span class="text-xs text-green-700 ml-2 font-bold">Root [Console Akses...]</span>
</div>
<div id="hackTerminal" class="flex-1 font-mono text-xs md:text-sm text-green-400 break-all overflow-hidden flex flex-col gap-1 tracking-tight">
</div>
</div>
</div>
</div>
<div id="alertModal" class="fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center z-50 p-4 hidden">
<div class="bg-gray-800 rounded-2xl shadow-2xl border border-gray-700 p-6 w-full max-w-sm mx-auto text-center border border-gray-700 z-[60]">
<p id="modal-message" class="text-lg mb-6">
</p>
<button onclick="document.getElementById('alertModal').classList.add('hidden')" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-8 rounded-lg w-full">OK</button>
</div>
</div>
<script>
        let versionCounter = 0;
        let isPageLocked = false;
        let previewHistory = [];
        let previewTimeout;
        const apiFile = 'testrx_api.php';
        let currentServerPath = '';
        
        const editor = {
            getValue: () => document.getElementById('hiddenEditor').value,
            setValue: (val) => {
                document.getElementById('hiddenEditor').value = val;
                updateIndicators();
                clearTimeout(previewTimeout);
                previewTimeout = setTimeout(() => { forceUpdatePreview(); }, 1000);
            }
        };

        function showAlert(message, type = 'info') {
            const msgEl = document.getElementById('modal-message');
            msgEl.className = 'text-lg mb-6 ' + (type === 'success' ? 'modal-message-success' : type === 'error' ? 'modal-message-error' : 'modal-message-info');
            msgEl.textContent = message;
            document.getElementById('alertModal').classList.remove('hidden');
        }

        // --- SISTEM SALIN KODE KE CLIPBOARD ---
        async function copyToClipboard() {
            const content = editor.getValue();
            if (!content) return showAlert("Kode masih kosong!", 'error');
            try {
                await navigator.clipboard.writeText(content);
                showAlert("Kode berhasil disalin ke Clipboard!", "success");
            } catch (err) {
                showAlert("Gagal menyalin kode. Browser tidak mendukung fitur ini.", "error");
            }
        }

        // --- SISTEM UPLOAD KE INDEX/PANELADMIN DENGAN PROMPT ---
        async function uploadToPublic(type) {
            const content = editor.getValue();
            if (!content) return showAlert("Kode masih kosong!", 'error');

            let ext = prompt(`Simpan file sebagai format apa?\n\nKetik "php" atau "html" (Tanpa tanda kutip).\nPerhatian: Ini akan menimpa file ${type}.(format) jika sudah ada di direktori server.`, "php");
            
            if (ext === null) return; 
            ext = ext.trim().toLowerCase();
            
            if (ext !== 'php' && ext !== 'html') {
                return showAlert("Dibatalkan: Format yang diketik tidak valid. Hanya menerima 'php' atau 'html'.", 'error');
            }

            const formData = new FormData();
            formData.append('action', 'upload_public');
            formData.append('type', type);
            formData.append('ext', '.' + ext);
            formData.append('content', content);

            try {
                const res = await fetch(apiFile, { method: 'POST', body: formData });
                const json = await res.json();
                showAlert(json.msg, json.status);
            } catch (err) {
                showAlert("Gagal menghubungi API server.", 'error');
            }
        }

        async function uploadToServer(type) {
            const content = editor.getValue();
            if (!content) return showAlert("Kode masih kosong!", 'error');
            
            const formData = new FormData();
            formData.append('action', 'upload_debug');
            formData.append('type', type);
            formData.append('content', content);

            try {
                const res = await fetch(apiFile, { method: 'POST', body: formData });
                const json = await res.json();
                showAlert(json.msg, json.status);
            } catch (err) {
                showAlert("Gagal menghubungi API server.", 'error');
            }
        }

        function openBackupModal() { document.getElementById('backupModal').classList.remove('hidden'); }
        function closeBackupModal() { document.getElementById('backupModal').classList.add('hidden'); }
        
        async function executeBackup() {
            const content = editor.getValue();
            const filename = document.getElementById('backupFilename').value.trim();
            const ext = document.getElementById('backupExt').value;
            
            if (!content) return showAlert("Kode masih kosong!", 'error');
            if (!filename) return showAlert("Harap masukkan nama file!", 'error');

            const formData = new FormData();
            formData.append('action', 'backup');
            formData.append('filename', filename);
            formData.append('ext', ext);
            formData.append('content', content);

            try {
                const res = await fetch(apiFile, { method: 'POST', body: formData });
                const json = await res.json();
                closeBackupModal();
                showAlert(json.msg, json.status);
            } catch (err) {
                showAlert("Gagal melakukan backup.", 'error');
            }
        }

        function openRestoreModal() {
            document.getElementById('restoreModal').classList.remove('hidden');
            loadBackups();
        }
        function closeRestoreModal() { document.getElementById('restoreModal').classList.add('hidden'); }

        async function loadBackups() {
            const listDiv = document.getElementById('restoreList');
            listDiv.innerHTML = '<p class="text-gray-400 text-sm text-center py-4">Memuat data...</p>';
            
            try {
                const res = await fetch(apiFile + '?action=list_backups');
                const json = await res.json();
                
                if (json.data && json.data.length > 0) {
                    listDiv.innerHTML = '';
                    json.data.forEach(item => {
                        listDiv.innerHTML += `
                            <div class="flex justify-between items-center bg-gray-900 p-3 rounded border border-gray-700">
<div class="overflow-hidden pr-2">
<p class="text-sm font-bold text-gray-200 truncate">${item.name}</p>
<p class="text-xs text-gray-500">${item.date}</p>
</div>
<div class="flex gap-2 shrink-0">
<button onclick="restoreFile('${item.name}')" class="bg-blue-600 hover:bg-blue-500 text-white text-xs font-bold py-1.5 px-3 rounded shadow">
                                        Restore
                                    </button>
<button onclick="deleteBackupFile('${item.name}')" class="bg-red-600 hover:bg-red-500 text-white text-xs font-bold py-1.5 px-3 rounded shadow">
                                        Hapus
                                    </button>
</div>
</div>
                        `;
                    });
                } else {
                    listDiv.innerHTML = '<p class="text-gray-400 text-sm text-center py-4">Belum ada file backup.</p>';
                }
            } catch (err) {
                listDiv.innerHTML = '<p class="text-red-400 text-sm text-center py-4">Gagal memuat daftar backup.</p>';
            }
        }

        async function restoreFile(filename) {
            const formData = new FormData();
            formData.append('action', 'get_backup');
            formData.append('filename', filename);

            try {
                const res = await fetch(apiFile, { method: 'POST', body: formData });
                const json = await res.json();
                if (json.status === 'success') {
                    editor.setValue(json.content);
                    closeRestoreModal();
                    showAlert(`File ${filename} berhasil dimuat ke editor!`, 'success');
                } else {
                    showAlert(json.msg, 'error');
                }
            } catch (err) {
                showAlert("Gagal mengambil file backup.", 'error');
            }
        }

        async function deleteBackupFile(filename) {
            if (!confirm(`Peringatan: Apakah Anda yakin ingin menghapus backup '${filename}' secara permanen?`)) {
                return;
            }

            const formData = new FormData();
            formData.append('action', 'delete_backup');
            formData.append('filename', filename);

            try {
                const res = await fetch(apiFile, { method: 'POST', body: formData });
                const json = await res.json();
                if (json.status === 'success') {
                    showAlert(json.msg, 'success');
                    loadBackups(); 
                } else {
                    showAlert(json.msg, 'error');
                }
            } catch (err) {
                showAlert("Gagal menghapus file backup.", 'error');
            }
        }

        function applyPreviewSettings() {
            const w = parseFloat(document.getElementById('previewWidth').value) || 360;
            const h = parseFloat(document.getElementById('previewHeight').value) || 760;
            const s = parseFloat(document.getElementById('previewScale').value) || 100;
            
            const iframe = document.getElementById('mobilePreview');
            const wrapper = document.getElementById('iframeWrapper');
            
            if (iframe && wrapper) {
                const availableWidth = wrapper.clientWidth;
                if(availableWidth === 0) return;

                iframe.style.width = w + 'px';
                iframe.style.height = h + 'px';
                iframe.style.maxWidth = 'none'; 
                
                const autoScale = availableWidth / w;
                const finalScale = autoScale * (s / 100);
                
                iframe.style.transform = `scale(${finalScale})`;
                wrapper.style.height = (h * finalScale) + 'px';
            }
        }

        // == [MODS CORE] API UPGRADE EVENT HANDLER LAYAR FOKUS ISOLATOR TOUCH GESTUR & CUBIT I-FRAME!! ==
        function toggleLock() {
            const btn = document.getElementById('btnLockPage');
            const pBox = document.getElementById('previewContainer');
            
            isPageLocked = !isPageLocked;
            
            /* Menjalankan Auto Render Layar Pembatas Kegelapan Sistem Mode Isolator Root ! */
            let layXIsolator = document.getElementById('shieldBgLockerV5');
            if(!layXIsolator){
                layXIsolator = document.createElement('div'); layXIsolator.id = 'shieldBgLockerV5';
                layXIsolator.className = 'fixed inset-0 bg-gray-900 bg-opacity-95 z-[5000] hidden backdrop-blur-sm pointer-events-auto touch-none overflow-hidden';
                document.body.appendChild(layXIsolator);
            }

            if (isPageLocked) {
                /* [PHASE KUNCI START] Membekukan Root Touch Browser, Anti Goyang Event  */
                document.body.style.overflow = 'hidden';
                document.body.style.touchAction = 'none';
                
                /* Menghapus gaya default lama UI tombol lock n menggiring nya menjadi Mode Remote Control Tombol Sentral Bawah Posisi Atas (Sisa Ruang) !!! */
                btn.classList.replace('bg-gray-700', 'bg-rose-600');
                btn.innerHTML = '🔒 Bebaskan Buka Kunci';
                btn.style.cssText = 'position:fixed !important; bottom:25px; left:50%; transform:translateX(-50%); z-index:9999; box-shadow: 0 0px 45px rgba(225,29,72,1); width: 85%; max-width:350px; font-size:15px; font-weight:bold; letter-spacing:1px; background-image:linear-gradient(135deg,#e11d48, #be123c); touch-action:manipulation; cursor:pointer; overflow:visible !important; border:1px solid #fda4af';
                
                /* Peringkat Max Z-Index untuk Wadah HP Iframe Menabrak Lapisan Background Hijab Layar Dimmer Di Belakang... Box Berposisi Absolute Fix */
                pBox.classList.add('fixed', 'm-auto', 'z-[9000]');
                pBox.style.cssText = 'top:25px; left:0; right:0; touch-action:none; bottom:110px; box-shadow: 0 10px 45px -5px rgba(16,185,129,0.3) !important'; 
                
                /* Me-Rewrite Pola Isolator Touch CSS3 Webview Device Target... AGAR Box Khusus IFrame/HP Emulator tetap responsife pinch Gestur (Scroll n Cubit-To-Zoom Allow Target Inner Pointer Engine Web Browser Lokal Engine  !!) !! */
                const injWrapScaleZoneHackPinchViewportMobileApi = document.getElementById('iframeWrapper');
                if(injWrapScaleZoneHackPinchViewportMobileApi) { injWrapScaleZoneHackPinchViewportMobileApi.style.touchAction = 'pan-x pan-y pinch-zoom'; }
                
                layXIsolator.classList.remove('hidden');

            } else {
                /* [PHASE BUKA/NORMALIZE END] MeLepaskan Semuanya Ke LayOuting Engine Testrx Lintas Div Origin*/
                document.body.style.overflow = '';
                document.body.style.touchAction = ''; // Hidup Kembali Layar Ide Web 
                
                btn.classList.replace('bg-rose-600', 'bg-gray-700');
                btn.textContent = '🔒 Kunci Layar';
                btn.style.cssText = ''; /* RESET Hancurkan Mod */

                pBox.classList.remove('fixed', 'm-auto', 'z-[9000]');
                pBox.style.cssText = 'border-radius: 2.5rem; transition: all 0.3s ease; width: 100%; max-width: 380px; touch-action: auto'; 
                
                layXIsolator.classList.add('hidden');
            }
        }

        function MatikanLogikaMetodeAsliLamaTrigerDiTimpaSinglesTembakAPIAtas() { /* Menimpa Block scope Bawah Yg ditinggal Oleh Regex  Bawaaan*/
            const btn = document.getElementById('btnLockPage');
            isPageLocked = !isPageLocked;
            if (isPageLocked) {
                document.body.style.overflow = 'hidden';
                btn.classList.replace('bg-gray-700', 'bg-rose-600');
                btn.textContent = 'Buka Kunci';
            } else {
                document.body.style.overflow = '';
                btn.classList.replace('bg-rose-600', 'bg-gray-700');
                btn.textContent = 'Kunci Layar';
            }
        }

        function forceUpdatePreview() {
            const iframe = document.getElementById('mobilePreview');
            if (!iframe) return;
            const htmlContent = editor.getValue();
            
            const interceptScript = `
                <script>
                    window.onerror = function(msg, url, line, col, error) {
                        window.parent.postMessage({ type: 'error', msg: msg + ' (Baris: ' + line + ')' }, '*');
                        return false;
                    };
                    const origLog = console.log;
                    console.log = function(...args) {
                        window.parent.postMessage({ type: 'log', msg: args.join(' ') }, '*');
                        origLog.apply(console, args);
                    };
                    const origWarn = console.warn;
                    console.warn = function(...args) {
                        window.parent.postMessage({ type: 'log', msg: 'WARN: ' + args.join(' ') }, '*');
                        origWarn.apply(console, args);
                    };
                    const origError = console.error;
                    console.error = function(...args) {
                        window.parent.postMessage({ type: 'error', msg: 'ERR: ' + args.join(' ') }, '*');
                        origError.apply(console, args);
                    };
                    const origInfo = console.info;
                    console.info = function(...args) {
                        window.parent.postMessage({ type: 'log', msg: 'INFO: ' + args.join(' ') }, '*');
                        origInfo.apply(console, args);
                    };
                <\/script>
            `;
            
            let injectedHtml = htmlContent;
            if (injectedHtml.includes('<head>')) {
                injectedHtml = injectedHtml.replace('<head>', '<head>\n' + interceptScript);
            } else {
                injectedHtml = interceptScript + '\n' + injectedHtml;
            }

            iframe.srcdoc = injectedHtml;
            
            if (previewHistory.length === 0 || previewHistory[previewHistory.length - 1] !== htmlContent) {
                previewHistory.push(htmlContent);
            }
        }

        window.addEventListener('message', function(e) {
            if (e.data && e.data.type) {
                const errConsole = document.getElementById('errorConsole');
                const sysConsole = document.getElementById('sysConsole');
                const time = new Date().toLocaleTimeString();
                
                if (e.data.type === 'error') {
                    if (errConsole) {
                        errConsole.innerHTML += `[${time}] ${e.data.msg}<br>`;
                        errConsole.scrollTop = errConsole.scrollHeight;
                    }
                } else if (e.data.type === 'log') {
                    if (sysConsole) {
                        sysConsole.innerHTML += `[${time}] ${e.data.msg}<br>`;
                        sysConsole.scrollTop = sysConsole.scrollHeight;
                    }
                }
            }
        });

        function historyBackPreview() {
            if (previewHistory.length > 1) {
                previewHistory.pop();
                const previousHtml = previewHistory[previewHistory.length - 1];
                editor.setValue(previousHtml);
                showAlert("Kembali ke versi kode sebelumnya.", "info");
            } else {
                showAlert("Tidak ada riwayat halaman sebelumnya.", "error");
            }
        }

        document.addEventListener('DOMContentLoaded', () => {
            setTimeout(() => { applyPreviewSettings(); forceUpdatePreview(); }, 300);
            window.addEventListener('resize', applyPreviewSettings);
        });

        function updateIndicators() {
            const mainIndicator = document.getElementById('mainIndicator');
            if (editor.getValue().length > 0) {
                mainIndicator.classList.replace('bg-red-500', 'bg-green-500');
                document.getElementById('versionIndicator').textContent = 'Versi ' + versionCounter;
            } else {
                mainIndicator.classList.replace('bg-green-500', 'bg-red-500');
                document.getElementById('versionIndicator').textContent = '[ KOSONG ]';
            }
        }

        function downloadResult(baseFilename) {
            const content = editor.getValue();
            if (!content) return showAlert("Kode kosong.", 'error');
            const blob = new Blob([content], { type: 'text/plain;charset=utf-8' });
            const a = document.createElement('a');
            a.href = URL.createObjectURL(blob);
            a.download = baseFilename + '.php';
            a.click();
        }

        function triggerFileUpload() { document.getElementById('fileUploader').click(); }
        
        function handleFileSelect(e) {
            const file = e.target.files[0];
            if (!file) return;

            const reader = new FileReader();
            reader.onload = function(event) { 
                editor.setValue(event.target.result); 
                versionCounter++;
                updateIndicators();
                showAlert("File '" + file.name + "' berhasil dimuat!", "success");
            };
            reader.onerror = function() { showAlert("Error: Gagal membaca file.", 'error'); };
            reader.readAsText(file);
            
            e.target.value = null;
        }

        async function pasteIntoMainEditor() {
            try { 
                const text = await navigator.clipboard.readText();
                editor.setValue(text); 
                versionCounter++;
                showAlert("Kode berhasil ditempel!", "success");
            } catch (err) {
                showAlert("Gagal menempel kode.", "error");
            }
        }
        
        function openPreviewSettingsModal() { document.getElementById('previewSettingsModal').classList.remove('hidden'); }
        function closePreviewSettingsModal() { document.getElementById('previewSettingsModal').classList.add('hidden'); }
        function applyAndCloseSettings() { applyPreviewSettings(); closePreviewSettingsModal(); }

        async function autoPasteAndExecute() {
            const cmdInput = document.getElementById('quickCommandInput');
            cmdInput.value = '';
            try {
                const text = await navigator.clipboard.readText();
                if (!text) return showAlert("Clipboard kosong!", "error");
                cmdInput.value = text;
                applyAndExecute();
            } catch (err) {
                showAlert("Gagal mengakses Clipboard. Pastikan izin browser diberikan.", "error");
            }
        }

        function openServerFilesModal() {
            document.getElementById('serverFilesModal').classList.remove('hidden');
            loadServerFiles(currentServerPath);
        }
        function closeServerFilesModal() { document.getElementById('serverFilesModal').classList.add('hidden'); }

        async function loadServerFiles(path = '') {
            currentServerPath = path;
            const listDiv = document.getElementById('serverFilesList');
            listDiv.innerHTML = '<p class="text-gray-400 text-sm text-center py-4">Memuat data server...</p>';
            try {
                const res = await fetch(apiFile + '?action=list_server_files&path=' + encodeURIComponent(path));
                const json = await res.json();
                if (json.status === 'success') {
                    listDiv.innerHTML = '';
                    if (path !== '') {
                        const parentPath = path.includes('/') ? path.substring(0, path.lastIndexOf('/')) : '';
                        listDiv.innerHTML += `
                            <div class="flex items-center bg-gray-700 p-3 rounded border border-gray-600 hover:bg-gray-500 transition cursor-pointer mb-2" onclick="loadServerFiles('${parentPath}')">
<span class="text-white text-sm font-bold">📁 .. (Kembali ke Folder Atas)</span>
</div>
                        `;
                    }
                    if (json.data.length > 0) {
                        json.data.forEach(item => {
                            if (item.type === 'dir') {
                                listDiv.innerHTML += `
                                    <div class="flex items-center bg-gray-800 p-3 rounded border border-gray-700 hover:bg-gray-600 transition cursor-pointer mb-1" onclick="loadServerFiles('${item.path}')">
<span class="text-yellow-400 font-bold mr-3 text-lg">📁</span>
<span class="text-sm font-bold text-gray-200 truncate">${item.name}</span>
</div>
                                `;
                            } else {
                                listDiv.innerHTML += `
                                    <div class="flex justify-between items-center bg-gray-900 p-3 rounded border border-gray-700 hover:bg-gray-800 transition mb-1">
<div class="overflow-hidden pr-2 flex-1 cursor-pointer" onclick="loadServerFileContent('${item.path}')">
<p class="text-sm font-bold text-gray-200 truncate">
<span class="text-blue-400 mr-2">📄</span>${item.name}</p>
<p class="text-xs text-gray-500 ml-6">${item.size} KB</p>
</div>
<div class="flex gap-2 shrink-0">
<button onclick="loadServerFileContent('${item.path}')" class="bg-indigo-600 hover:bg-indigo-500 text-white text-xs font-bold py-1.5 px-3 rounded shadow">Pilih</button>
<button onclick="downloadServerFile('${item.path}')" class="bg-emerald-600 hover:bg-emerald-500 text-white text-xs font-bold py-1.5 px-3 rounded shadow">Download</button>
</div>
</div>
                                `;
                            }
                        });
                    } else {
                        listDiv.innerHTML += '<p class="text-gray-400 text-sm text-center py-4">Folder ini kosong.</p>';
                    }
                }
            } catch (err) {
                listDiv.innerHTML = '<p class="text-red-400 text-sm text-center py-4">Gagal memuat daftar file/folder.</p>';
            }
        }

        function downloadServerFile(filepath) {
            window.open(apiFile + '?action=download_server_file&file=' + encodeURIComponent(filepath), '_blank');
        }
        /*
            const listDiv = document.getElementById('serverFilesList');
            listDiv.innerHTML = '<p class="text-gray-400 text-sm text-center py-4">Memuat data server...</p>';
            try {
                const res = await fetch(apiFile + '?action=list_server_files');
                const json = await res.json();
                if (json.status === 'success' && json.data.length > 0) {
                    listDiv.innerHTML = '';
                    json.data.forEach(item => {
                        listDiv.innerHTML += `
                            <div class="flex justify-between items-center bg-gray-900 p-3 rounded border border-gray-700 hover:bg-gray-800 transition cursor-pointer" onclick="loadServerFileContent('${item.name}')">
<div class="overflow-hidden pr-2">
<p class="text-sm font-bold text-gray-200 truncate">${item.name}</p>
<p class="text-xs text-gray-500">${item.size} KB</p>
</div>
<button class="bg-indigo-600 hover:bg-indigo-500 text-white text-xs font-bold py-1 px-3 rounded shadow">Pilih</button>
</div>
                        `;
                    });
                } else {
                    listDiv.innerHTML = '<p class="text-gray-400 text-sm text-center py-4">Tidak ada file ditemukan di server.</p>';
                }
            } catch (err) {
                listDiv.innerHTML = '<p class="text-red-400 text-sm text-center py-4">Gagal memuat daftar file.</p>';
            }
        }

        */
        async function loadServerFileContent(filename) {
            const formData = new FormData();
            formData.append('action', 'get_server_file');
            formData.append('filename', filename);
            try {
                const res = await fetch(apiFile, { method: 'POST', body: formData });
                const json = await res.json();
                if (json.status === 'success') {
                    editor.setValue(json.content);
                    closeServerFilesModal();
                    showAlert(`File ${filename} berhasil dimuat!`, 'success');
                } else {
                    showAlert(json.msg, 'error');
                }
            } catch (err) {
                showAlert("Gagal mengambil file server.", 'error');
            }
        }

        let currentUploadPath = '';

        function openServerUploadModal() {
            document.getElementById('serverUploadModal').classList.remove('hidden');
            loadServerUploadFiles(currentUploadPath);
        }
        function closeServerUploadModal() { document.getElementById('serverUploadModal').classList.add('hidden'); }

        async function loadServerUploadFiles(path = '') {
            currentUploadPath = path;
            const listDiv = document.getElementById('serverUploadList');
            listDiv.innerHTML = '<p class="text-gray-400 text-sm text-center py-4">Memuat data server...</p>';
            try {
                const res = await fetch(apiFile + '?action=list_server_files&path=' + encodeURIComponent(path));
                const json = await res.json();
                if (json.status === 'success') {
                    listDiv.innerHTML = '';
                    if (path !== '') {
                        const parentPath = path.includes('/') ? path.substring(0, path.lastIndexOf('/')) : '';
                        listDiv.innerHTML += `
                            <div class="flex items-center bg-gray-700 p-3 rounded border border-gray-600 hover:bg-gray-500 transition cursor-pointer mb-2" onclick="loadServerUploadFiles('${parentPath}')">
<span class="text-white text-sm font-bold">📁 .. (Kembali ke Folder Atas)</span>
</div>
                        `;
                    }
                    if (json.data.length > 0) {
                        json.data.forEach(item => {
                            if (item.type === 'dir') {
                                listDiv.innerHTML += `
                                    <div class="flex items-center bg-gray-800 p-3 rounded border border-gray-700 hover:bg-gray-600 transition cursor-pointer mb-1" onclick="loadServerUploadFiles('${item.path}')">
<span class="text-yellow-400 font-bold mr-3 text-lg">📁</span>
<span class="text-sm font-bold text-gray-200 truncate">${item.name}</span>
</div>
                                `;
                            } else {
                                listDiv.innerHTML += `
                                    <div class="flex justify-between items-center bg-gray-900 p-3 rounded border border-gray-700 hover:bg-gray-800 transition mb-1">
<div class="overflow-hidden pr-2 flex-1 cursor-default">
<p class="text-sm font-bold text-gray-200 truncate">
<span class="text-blue-400 mr-2">📄</span>${item.name}</p>
<p class="text-xs text-gray-500 ml-6">${item.size} KB</p>
</div>
<div class="flex gap-2 shrink-0">
<button onclick="downloadServerFile('${item.path}')" class="bg-emerald-600 hover:bg-emerald-500 text-white text-xs font-bold py-1.5 px-3 rounded shadow">Download</button>
</div>
</div>
                                `;
                            }
                        });
                    } else {
                        listDiv.innerHTML += '<p class="text-gray-400 text-sm text-center py-4">Folder ini kosong.</p>';
                    }
                }
            } catch (err) {
                listDiv.innerHTML = '<p class="text-red-400 text-sm text-center py-4">Gagal memuat daftar.</p>';
            }
        }

        async function promptSaveToServer(path) {
            const content = editor.getValue();
            if (!content) return showAlert("Kode masih kosong!", 'error');
            
            let ext = prompt(`Simpan file di folder: /${path || 'Utama'}\n\nSebagai format apa? Ketik "php" atau "html" (Tanpa tanda kutip)`, "php");
            if (ext === null) return;
            ext = ext.trim().toLowerCase();
            if (ext !== 'php' && ext !== 'html') return showAlert("Format tidak valid! Harus php atau html.", 'error');

            let filename = prompt("Masukkan nama file (tanpa ekstensi):\n*Peringatan: akan menimpa file jika nama sudah ada.", "");
            if (filename === null || filename.trim() === '') return showAlert("Nama file tidak boleh kosong!", 'error');
            
            const formData = new FormData();
            formData.append('action', 'upload_custom');
            formData.append('path', path);
            formData.append('filename', filename.trim());
            formData.append('ext', '.' + ext);
            formData.append('content', content);

            try {
                const res = await fetch(apiFile, { method: 'POST', body: formData });
                const json = await res.json();
                if (json.status === 'success') {
                    showAlert(json.msg, 'success');
                    loadServerUploadFiles(path);
                } else {
                    showAlert(json.msg, 'error');
                }
            } catch (err) {
                showAlert("Gagal mengupload file ke server.", 'error');
            }
        }

        function escapeRegExp(string) { return string.replace(/[.*+?^${}()|[\]\\]/g, '\\$&'); }
        async function appBeautifyCodesHandler() {
            let scriptBoxVal = editor.getValue();
            if(!scriptBoxVal || scriptBoxVal.trim() === "") {
                return showAlert("Gagal Di Rapihkan, Blok editor kosong.", "error");
            }
            try {
                /* Basic mock Formatter Indent Replace Methods JS */
                let codeRawClean=scriptBoxVal.replace(/(>)\s*(<)/g, '$1\n$2').trim();
                editor.setValue(codeRawClean);
                versionCounter++;
                showAlert("Susunan tab struktur script diperbaiki sementara di editor, tambah API jika kurang mendalam !", "info");
            } catch(exx) {
                 showAlert("Formatting Parsing gagal dijalankan.", "error");
            }
        }

        async function appFixSyntaxApiTarget() {
            let getValsSysEditor = editor.getValue();
            if(!getValsSysEditor || getValsSysEditor.length <= 1) return showAlert("Tidak Ada data Script ditelaah, Gagal perbaikan syntax!", "error");
            let errorLogs = document.getElementById('errorConsole').innerText || "Tidak ada log error spesifik di console.";
            showAlert("Mengirim kode ke Gemini 3.5 Flash untuk analisis syntax...", "info");
            const apiKey = "AQ.Ab8RN6KX5ZcPbeZ2fFzdVbAf9b3o8DlCvREbkiPLVqT2rSiUaw";
            const promptText = "Perbaiki syntax error pada kode berikut. KEMBALIKAN KODE MURNI SAJA tanpa format markdown (seperti awalan ```html atau penutup ```). Jadikan log error berikut sebagai petunjuk perbaikan: " + errorLogs + "\n\nKODE MENTAH:\n" + getValsSysEditor;
            try {
                const selectedAiModel = document.getElementById('aiModelSelect') ? document.getElementById('aiModelSelect').value : "gemini-3.5-flash";
                const response = await fetch("https://generativelanguage.googleapis.com/v1beta/models/" + selectedAiModel + ":generateContent?key=" + apiKey, {
                    method: "POST",
                    headers: { "Content-Type": "application/json" },
                    body: JSON.stringify({
                        contents: [{ parts: [{ text: promptText }] }],
                        generationConfig: { temperature: 0.1 }
                    })
                });
                const data = await response.json();
                if (data.candidates && data.candidates.length > 0) {
                    let fixedCode = data.candidates[0].content.parts[0].text;
                    fixedCode = fixedCode.replace(/^```[a-zA-Z]*\n/mi, '').replace(/\n```$/m, '').trim();
                    editor.setValue(fixedCode);
                    document.getElementById('errorConsole').innerHTML = "";
                    showAlert("Syntax berhasil diperbaiki oleh Gemini AI 3.5 Flash!", "success");
                } else {
                    console.error("AI Error:", data);
                    showAlert("AI tidak mengembalikan format perbaikan yang valid.", "error");
                }
            } catch (err) {
                showAlert("Gagal terhubung ke Gemini AI: " + err.message, "error");
            }
        }
        async function appFixSyntaxApiTarget_OLD() {
             /* Target Placeholder Bridge Linter System Button Connecter Hook */
             let getValsSysEditor= editor.getValue();
             if(!getValsSysEditor || getValsSysEditor.length <= 1) return showAlert("Tidak Ada data Script ditelaah, Gagal perbaikan syntax!");
             showAlert("Diagnostic Linter / Syntax API Engine aktif di latar belakang (Membutuhkan Back-End logic implementor valid per bahasa). Status Syntax Error Checker Call OK! ", "success"); 
        }

        async function executeAiPrompt() {
            var input = document.getElementById('aiDirectPrompt').value;
            var code = editor.getValue();
            if (!input) return showAlert("Masukkan instruksi AI terlebih dahulu!", "error");
            var aiIndicator = document.getElementById('aiLoadingIndicator');
            var logBox = document.getElementById('aiActivityLog');
            aiIndicator.classList.remove('hidden');
            if(logBox) { logBox.innerHTML = ''; logBox.classList.remove('hidden'); logBox.classList.add('flex'); }
            
            function addLog(msg, type='info') {
                if(!logBox) return;
                var t = new Date().toLocaleTimeString();
                var color = type === 'error' ? 'text-red-400' : (type === 'success' ? 'text-green-400' : 'text-teal-300');
                logBox.innerHTML += '<div><span class="text-gray-500">[' + t + ']</span> <span class="' + color + '">' + msg + '</span></div>';
                logBox.scrollTop = logBox.scrollHeight;
            }
            
            addLog("Mempersiapkan konteks Sandbox...");
            addLog("Membaca source code (" + code.length + " karakter)...");
            
            var key = "AQ.Ab8RN6KX5ZcPbeZ2fFzdVbAf9b3o8DlCvREbkiPLVqT2rSiUaw";
            if (typeof window.aiMemory === 'undefined') window.aiMemory = [];
            window.aiMemory.push(input);
            var memoryText = window.aiMemory.length > 1 ? "Riwayat Instruksi Anda Sebelumnya (Konteks obrolan):\n- " + window.aiMemory.slice(0, -1).join("\n- ") + "\n\n" : "";
            if (window.aiMemory.length > 1) addLog("Memuat " + (window.aiMemory.length - 1) + " memori percakapan sebelumnya...", "info");
            
            var promptStr = "Anda mesin pembuat Array JSON. JANGAN berikan teks pengantar apapun. Hasilkan murni Array JSON.\nATURAN STRING JSON: Wajib gunakan tanda \\\\n untuk baris baru. Escape semua tanda kutip ganda.\nContoh Format:\n[{\"snippet\":\"KODE BARU\",\"target\":\"1 BARIS JANGKAR ASLI (Copas Murni)\",\"action\":\"replace\"}]\n\n" + memoryText + "Instruksi Saat Ini: " + input + "\n\nKonteks Kode:\n" + code;
            
            try {
                var selectedAiModel = document.getElementById('aiModelSelect') ? document.getElementById('aiModelSelect').value : "gemini-3.5-flash";
                addLog("Menghubungi endpoint: " + selectedAiModel, "info");
                
                var res = await fetch("https://generativelanguage.googleapis.com/v1beta/models/" + selectedAiModel + ":generateContent?key=" + key, {
                    method: "POST",
                    headers: { "Content-Type": "application/json" },
                    body: JSON.stringify({
                        contents: [{ parts: [{ text: promptStr }] }],
                        generationConfig: { temperature: 0.1 }
                    })
                });
                addLog("Menerima aliran data respons AI...", "info");
                var js = await res.json();
                
                if (js.candidates && js.candidates.length > 0) {
                    addLog("Ekstraksi Array JSON (Metode Bracket)...");
                    var txt = js.candidates[0].content.parts[0].text;
                    var bStart = txt.indexOf('[');
                    var bEnd = txt.lastIndexOf(']');
                    if (bStart !== -1 && bEnd !== -1) txt = txt.substring(bStart, bEnd + 1);
                    
                    try {
                        var parsed = JSON.parse(txt);
                        addLog("Format JSON Valid! Mengeksekusi Modifikasi...", "success");
                        setTimeout(() => {
                            document.getElementById('quickCommandInput').value = JSON.stringify(parsed, null, 2);
                            document.getElementById('aiDirectPrompt').value = "";
                            aiIndicator.classList.add('hidden');
                            if(logBox) { logBox.classList.add('hidden'); logBox.classList.remove('flex'); }
                            applyAndExecute(); 
                        }, 800);
                    } catch(e) {
                        addLog("FATAL: Respons gagal diparse sebagai JSON!", "error");
                        console.error("AI Mentah:", txt);
                        aiIndicator.classList.add('hidden');
                    }
                } else {
                    var errMsg = (js.error && js.error.message) ? js.error.message : "Ditolak oleh Server / Kosong.";
                    addLog("API ERROR: " + errMsg, "error");
                    aiIndicator.classList.add('hidden');
                }
            } catch(e) {
                addLog("KONEKSI TERPUTUS: " + e.message, "error");
                aiIndicator.classList.add('hidden');
            }
            var reqCountEl = document.getElementById('aiReqCount');
            if (reqCountEl) reqCountEl.innerText = parseInt(reqCountEl.innerText) + 1;
        }
        async function executeAiPrompt_BROKEN() {
            var input = document.getElementById('aiDirectPrompt').value;
            var code = editor.getValue();
            if (!input) return showAlert("Masukkan instruksi AI terlebih dahulu!", "error");
            var aiIndicator = document.getElementById('aiLoadingIndicator');
            var logBox = document.getElementById('aiActivityLog');
            aiIndicator.classList.remove('hidden');
            if(logBox) { logBox.innerHTML = ''; logBox.classList.remove('hidden'); logBox.classList.add('flex'); }
            
            function addLog(msg, type='info') {
                if(!logBox) return;
                var t = new Date().toLocaleTimeString();
                var color = type === 'error' ? 'text-red-400' : (type === 'success' ? 'text-green-400' : 'text-teal-300');
                logBox.innerHTML += '<div><span class="text-gray-500">[' + t + ']</span> <span class="' + color + '">' + msg + '</span></div>';
                logBox.scrollTop = logBox.scrollHeight;
            }
            
            addLog("Mempersiapkan konteks Sandbox...");
            addLog("Membaca source code (" + code.length + " karakter)...");
            addLog("Membangun Strict-Schema JSON Modifikator...");
            
            var key = "AQ.Ab8RN6KX5ZcPbeZ2fFzdVbAf9b3o8DlCvREbkiPLVqT2rSiUaw";
            if (typeof window.aiMemory === 'undefined') window.aiMemory = [];
            window.aiMemory.push(input);
            var memoryText = window.aiMemory.length > 1 ? "Riwayat Instruksi Anda Sebelumnya (Gunakan ini untuk memahami konteks kelanjutan):\n- " + window.aiMemory.slice(0, -1).join("\n- ") + "\n\n" : "";
            if (window.aiMemory.length > 1) addLog("Memuat " + (window.aiMemory.length - 1) + " memori percakapan sebelumnya...", "info");
            var promptStr = "Anda adalah mesin Modifikator. Tugas Anda memodifikasi kode dengan Array JSON.\nPASTIKAN: Properti 'target' HANYA 1 BARIS KODE ASLI yang persis (Case-Sensitive, tanpa diubah spasi/indentasinya) dari Konteks Kode.\n\n" + memoryText + "Instruksi Saat Ini: " + input + "\n\nKonteks Kode:\n" + code;
            
            try {
                addLog("Menghubungi endpoint Google Gemini API...", "info");
                var selectedAiModel = document.getElementById('aiModelSelect') ? document.getElementById('aiModelSelect').value : "gemini-3.5-flash";
                addLog("Menggunakan Model AI: " + selectedAiModel, "info");
                var res = await fetch("https://generativelanguage.googleapis.com/v1beta/models/" + selectedAiModel + ":generateContent?key=" + key, {
                    method: "POST",
                    headers: { "Content-Type": "application/json" },
                    body: JSON.stringify({
                        contents: [{ parts: [{ text: promptStr }] }],
                        generationConfig: {
                            temperature: 0.1,
                            responseMimeType: "application/json",
                            responseSchema: {
                                type: "ARRAY",
                                items: {
                                    type: "OBJECT",
                                    properties: {
                                        snippet: { type: "STRING", description: "Kode baru pengganti/sisipan (gunakan enter asli bila perlu)" },
                                        target: { type: "STRING", description: "Target jangkar: Harus 1 BARIS EKSKULSIF akurat sama persis (copy-paste) dari Konteks Kode." },
                                        action: { type: "STRING", description: "Wajib isi dengan: replace, insertBefore, atau insertAfter" }
                                    },
                                    required: ["snippet", "target", "action"]
                                }
                            }
                        }
                    })
                });
                addLog("Menerima aliran data respons AI...", "info");
                var js = await res.json();
                if (js.candidates && js.candidates.length > 0) {
                    addLog("Ekstraksi kandidat output berhasil...", "success");
                    var txt = js.candidates[0].content.parts[0].text;
                    try {
                        addLog("Memvalidasi skema JSON Modifikator V3.4...");
                        var parsed = JSON.parse(txt);
                        addLog("Format JSON PATEN! Meneruskan ke eksekutor utama...", "success");
                        setTimeout(() => {
                            document.getElementById('quickCommandInput').value = JSON.stringify(parsed, null, 2);
                            document.getElementById('aiDirectPrompt').value = "";
                            aiIndicator.classList.add('hidden');
                            if(logBox) { logBox.classList.add('hidden'); logBox.classList.remove('flex'); }
                            applyAndExecute(); 
                        }, 1200);
                    } catch(e) {
                        addLog("FATAL: Respons gagal diparse sebagai JSON!", "error");
                        aiIndicator.classList.add('hidden');
                    }
                } else {
                    addLog("ERROR: Response AI kosong atau ditolak dari server.", "error");
                    aiIndicator.classList.add('hidden');
                }
            } catch(e) {
                addLog("KONEKSI TERPUTUS: " + e.message, "error");
                aiIndicator.classList.add('hidden');
            }
        }
        async function executeAiPrompt_OLD2() {
            var input = document.getElementById('aiDirectPrompt').value;
            var code = editor.getValue();
            if (!input) return showAlert("Masukkan instruksi AI terlebih dahulu!", "error");
            
            document.getElementById('aiLoadingIndicator').classList.remove('hidden');
            showAlert("Memproses logika ke AI... (Ini butuh beberapa detik)", "info");
            
            var key = "AQ.Ab8RN6KX5ZcPbeZ2fFzdVbAf9b3o8DlCvREbkiPLVqT2rSiUaw";
            var promptStr = "Anda mesin pembuat Array JSON. JANGAN berikan teks pengantar apapun. Hasilkan murni Array JSON.\nATURAN STRING JSON: Wajib gunakan tanda \\\\n untuk baris baru. Escape semua tanda kutip ganda.\nContoh Format:\n[{\"snippet\":\"KODE BARU\",\"target\":\"1 BARIS JANGKAR ASLI\",\"action\":\"replace\"}]\n\nInstruksi: " + input + "\n\nKonteks Kode:\n" + code;

            try {
                var res = await fetch("https://generativelanguage.googleapis.com/v1beta/models/gemini-3.5-flash:generateContent?key=" + key, {
                    method: "POST",
                    headers: { "Content-Type": "application/json" },
                    body: JSON.stringify({ contents: [{ parts: [{ text: promptStr }] }], generationConfig: { temperature: 0.1 } })
                });
                var js = await res.json();
                document.getElementById('aiLoadingIndicator').classList.add('hidden');
                
                if (js.candidates && js.candidates.length > 0) {
                    var txt = js.candidates[0].content.parts[0].text;
                    
                    // SISTEM EKSTRAKSI ARRAY OTOMATIS (Mencegah AI Yapping)
                    var bracketStart = txt.indexOf('[');
                    var bracketEnd = txt.lastIndexOf(']');
                    if (bracketStart !== -1 && bracketEnd !== -1) {
                        txt = txt.substring(bracketStart, bracketEnd + 1);
                    }
                    
                    try {
                        JSON.parse(txt);
                        document.getElementById('quickCommandInput').value = txt;
                        document.getElementById('aiDirectPrompt').value = "";
                        applyAndExecute(); 
                    } catch(e) {
                        console.error("Teks Mentah dari AI yang gagal di-parse:", txt);
                        showAlert("Gagal: Format JSON dari AI kurang sempurna. Coba berikan instruksi yang lebih jelas.", "error");
                    }
                }
            } catch(e) {
                document.getElementById('aiLoadingIndicator').classList.add('hidden');
                showAlert("Error API AI.", "error");
            }
        }
        async function executeAiPrompt_OLD() {
            var input = document.getElementById('aiDirectPrompt').value;
            var code = editor.getValue();
            if (!input) return showAlert("Masukkan instruksi AI terlebih dahulu!", "error");
            
            document.getElementById('aiLoadingIndicator').classList.remove('hidden');
            showAlert("Mengirim instruksi dan memindai struktur ke AI...", "info");
            
            var key = "AQ.Ab8RN6KX5ZcPbeZ2fFzdVbAf9b3o8DlCvREbkiPLVqT2rSiUaw";
            var promptStr = "Anda mesin Modifikator. Balas HANYA dengan Array JSON valid, tanpa teks/markdown.\nAturan Array JSON:\n[{\"snippet\":\"KODE BARU\",\"target\":\"BARIS JANGKAR ASLI (1 BARIS SAJA)\",\"action\":\"replace\"}]\n\nInstruksi User: " + input + "\n\nKode Saat Ini:\n" + code;

            try {
                var res = await fetch("https://generativelanguage.googleapis.com/v1beta/models/gemini-3.5-flash:generateContent?key=" + key, {
                    method: "POST",
                    headers: { "Content-Type": "application/json" },
                    body: JSON.stringify({ contents: [{ parts: [{ text: promptStr }] }], generationConfig: { temperature: 0.1 } })
                });
                var js = await res.json();
                document.getElementById('aiLoadingIndicator').classList.add('hidden');
                
                if (js.candidates && js.candidates.length > 0) {
                    var txt = js.candidates[0].content.parts[0].text;
                    txt = txt.split("```json").join("").split("```").join("").trim();
                    try {
                        JSON.parse(txt);
                        document.getElementById('quickCommandInput').value = txt;
                        document.getElementById('aiDirectPrompt').value = "";
                        applyAndExecute(); 
                    } catch(e) {
                        showAlert("Gagal: AI merespons tetapi gagal meracik format JSON yang paten.", "error");
                    }
                }
            } catch(e) {
                document.getElementById('aiLoadingIndicator').classList.add('hidden');
                showAlert("Error Koneksi API AI.", "error");
            }
        }
        let isSystemHackingActive = false;
        function applyAndExecute() {
            if(isSystemHackingActive) return;
            const commandInput = document.getElementById('quickCommandInput').value;
            if (!editor.getValue()) return showAlert("Kesalahan: Kode utama file basis target masih kosong!", 'error');
            try { JSON.parse(commandInput); } catch(e) { return showAlert("Format Data Command Target Array (JSON) tidak valid.", "error"); }

            isSystemHackingActive = true;
            document.getElementById('hackerOverlay').classList.remove('hidden');
            document.getElementById('hackerOverlay').classList.add('flex');
            
            const term = document.getElementById('hackTerminal');
            term.innerHTML = "";
            
            const logs = [ 
                ">> [SYSTEM START] Memuat Data Payload Perintah AI Modifikator...",
                ">> Memeriksa Stabilitas Enkripsi Ke Firewall Testrx... [200 OK]", 
                ">> Engine Menguraikan Skrip Tag Identifikasi Metode (Single-Line Target)... ",
                ">> Re-Injecting Dan Menimpa Logika Object memory asli.  <span class='animate-pulse bg-green-400 text-black px-1'>RUN_AS_ADMIN</span>", 
                ">> Meregenerasi Antarmuka Kode Dom Pada Display Mobile Layar Target...", 
                ">> ✔ EKSEKUSI PENEMBUSAN SELESAI & DIPASANG (COMPLETE OVERWRITE)"
            ];
            
            let accumDelay = 0;
            for(let i = 0; i < logs.length; i++) {
                accumDelay += (800 - Math.random() * 200);
                setTimeout(() => { term.innerHTML += `<div class='animate-pulse'>${logs[i]}</div>`; }, accumDelay);
            }

            setTimeout(() => {
                document.getElementById('hackerOverlay').classList.add('hidden'); 
                document.getElementById('hackerOverlay').classList.remove('flex');
                isSystemHackingActive = false;
                /* Bypass Ke Asal (Setelah Terminal Delay Beraksi 5 detik!)*/
                applyAndExecuteTargetEngineCore();
            }, 5000);
        }

        function applyAndExecuteTargetEngineCore() {
            let currentHtml = editor.getValue();
            const commandInput = document.getElementById('quickCommandInput').value;
            
            if (!currentHtml) return showAlert("Kesalahan: Kode utama masih kosong!", 'error');
            if (!commandInput) return showAlert("Kesalahan: Box perintah kosong.", 'error');

            try {
                let cmds = JSON.parse(commandInput);
                if (!Array.isArray(cmds)) cmds = [cmds];
                
                for (let i = 0; i < cmds.length; i++) {
                    const cmd = cmds[i];
                    const flags = (cmd.global ? 'g' : '') + 'm'; 
                    let searchPattern = cmd.regex ? new RegExp(cmd.target, flags) : new RegExp(escapeRegExp(cmd.target), flags);
                    
                    if (!searchPattern.test(currentHtml)) {
                        return showAlert(`Peringatan: 'target' pada perintah ke-${i+1} tidak ditemukan dalam kode.`, 'error');
                    }

                    if (cmd.action === 'replace') currentHtml = currentHtml.replace(searchPattern, cmd.snippet || "");
                    if (cmd.action === 'insertBefore') currentHtml = currentHtml.replace(searchPattern, (cmd.snippet || "") + '\n$&');
                    if (cmd.action === 'insertAfter') currentHtml = currentHtml.replace(searchPattern, '$&\n' + (cmd.snippet || ""));
                }
                
                editor.setValue(currentHtml);
                versionCounter++;
                showAlert("Perintah Cepat berhasil dieksekusi!", "success");
            } catch (e) {
                showAlert("Format JSON tidak valid atau gagal diproses.", "error");
            }
        }
    </script>
    <script>
        // ⚡ OVO-KIRIM: SYSTEM FUNCTION HOISTING GLOBAL PATCH REWRITTER (FIX KAKU BOX MOBILE SCALING & PRE-LOAD LOGIC RUN ANIM) ⚡

        /* == A) ENGINE FIX KUNCI LAYAR CUBIT (ANTI FREEZE IFRAME) == */
        window.toggleLock = function() {
            const btn = document.getElementById('btnLockPage');
            const pBox = document.getElementById('previewContainer');
            
            const bgLockerId = 'dimmerGlobalCubitZoomMobileX5';
            let shadowBgAman = document.getElementById(bgLockerId);
            
            isPageLocked = !isPageLocked;
            
            /* Membuat Layar Backrop Kegelapan Pembungkam Background Base secara independen dari Container Emulator!*/
            if(!shadowBgAman) {
                shadowBgAman = document.createElement('div');
                shadowBgAman.id = bgLockerId;
                /* Membunuh Sentuhan Geser/Bocor untuk Latar Belakang UI Textarea SAJA. Biarkan Browser mencubit ke dalam Kanvas Relatif/Posisi Center !! */
                shadowBgAman.className = 'fixed inset-0 bg-gray-900 bg-opacity-95 z-[9900] hidden backdrop-blur-md pointer-events-auto touch-none overflow-hidden';
                document.body.appendChild(shadowBgAman);
            }

            if (isPageLocked) {
                /* Isolasi Background, No Pan View Untuk Dasar File Murni DOM Level Body, Scroll Terpenjara Aman di View Dasar IDE Web Master Nya */
                document.body.style.overflow = 'hidden';
                shadowBgAman.classList.remove('hidden');

                /* Menghijack Posisional Tombol & Layout Pratinjau Emulator Tanpa Ganggu touch/css iframe! Tampilan Cubitan Alami dari iOS/Chrome hidup bebas Disini Tanpa Kram!!! */
                btn.classList.replace('bg-gray-700', 'bg-rose-600');
                btn.innerHTML = '🔓 Buka Isolasi Kunci Layar';
                btn.style.cssText = 'position:fixed !important; bottom:25px; left:50%; transform:translateX(-50%); z-index:9999; box-shadow: 0 5px 35px rgba(225,29,72,0.6); padding:16px 25px; width: auto; font-size:14px; font-weight:800; border:2px solid #fda4af; cursor:pointer; touch-action:manipulation; background:#e11d48;';
                
                pBox.classList.add('fixed');
                pBox.style.cssText = 'top:45%; left:50%; transform:translate(-50%, -50%); z-index:9995; width:100%; max-width:390px; box-shadow: 0 0px 50px rgba(0,0,0,1); margin:0 !important; max-height:85vh;';
                
                /* Jauhkan atribut manipulatif asing di dalem bungkus internal emulator saat Lock On !!! Biarkan pure rendering mesin */
                const iframeScaleBumper = document.getElementById('iframeWrapper');
                if(iframeScaleBumper) iframeScaleBumper.style.touchAction = ''; 
                
            } else {
                /* Pulihkan / Copot Perintah - Normalisasi Mode Editing Web IDE !! */
                document.body.style.overflow = '';
                shadowBgAman.classList.add('hidden');

                btn.style.cssText = ''; 
                btn.classList.replace('bg-rose-600', 'bg-gray-700');
                btn.innerHTML = '🔒 Kunci Layar';
                
                pBox.classList.remove('fixed');
                pBox.style.cssText = 'border-radius: 2.5rem; transition: all 0.3s ease; width: 100%; max-width: 380px;';
            }
        };

        /* == B) UPDATE RUN AUTOMATIS JSON APPLY : TAHAP KOMPILE/CEK AWAL BARU NAMPILIN ANIMASI, BATES ANIMASI 3 DETIK (SMART LOGIC ALGHORITHMS ) !! == */
        window.applyAndExecute = function() {
            if(isSystemHackingActive) return;
            
            const commandInput = document.getElementById('quickCommandInput').value;
            let currentHtml = editor.getValue();
            
            if (!currentHtml) return showAlert("Kesalahan Ulangi Uji Data: Kode Target Sandbox Di Editor Terdeteksi Kosong.", "error");
            if (!commandInput) return showAlert("Gagal Di Proses: Box Format Code Array Modificator JSON Kosong...", "error");

            let dataCommandsCompileRunParams;
            try {
                dataCommandsCompileRunParams = JSON.parse(commandInput);
                if (!Array.isArray(dataCommandsCompileRunParams)) dataCommandsCompileRunParams = [dataCommandsCompileRunParams];
            } catch(exeCheckErr1) {
                return showAlert("ERROR FORMAT INVALID DATA BIND: Cek Kelengkapan String Pada Syntx Pembukaan Block/Array Object (Kutipan salah tidak bisa compile Data Perbaikan/Injek)!", "error");
            }

            /* -- KATEGORI B (PRE-CALCULATE CHECK ! Tunda Animasi Jalan Sia-Sia Menunggu Kesiapan) -- */
            let checkHTMLDraftValidationsSimulateCoreParamsDataStrRunMemorySystemSandboxModeFinalHTMLParamsMemSysLogixTargetCoreRender1BaseSysCodeBlocksAppRunModesFinalRun = currentHtml;
            for (let numAraySysCheckLoopZ1=0; numAraySysCheckLoopZ1 < dataCommandsCompileRunParams.length; numAraySysCheckLoopZ1++) {
                let cmdsHookCoreRefParamTargetData = dataCommandsCompileRunParams[numAraySysCheckLoopZ1];
                const renderRunFlagSyntaxCompilerParamSysRulesHookBase1Flagz2StringStrMemLogic= (cmdsHookCoreRefParamTargetData.global ? 'g' : '') + 'm';
                let renderCompilerSyntaxPatternsToSysParamA = cmdsHookCoreRefParamTargetData.regex ? new RegExp(cmdsHookCoreRefParamTargetData.target, renderRunFlagSyntaxCompilerParamSysRulesHookBase1Flagz2StringStrMemLogic) : new RegExp(escapeRegExp(cmdsHookCoreRefParamTargetData.target), renderRunFlagSyntaxCompilerParamSysRulesHookBase1Flagz2StringStrMemLogic);

                /* BOM ! DETEKSI HARDEST : KALO TUDEL TARGET TEKS SALAH JALAN NYASAR => TEMBAK STOP MUKA SEBELUM KIBARKAN ANGGAPAN ! */
                if (!renderCompilerSyntaxPatternsToSysParamA.test(checkHTMLDraftValidationsSimulateCoreParamsDataStrRunMemorySystemSandboxModeFinalHTMLParamsMemSysLogixTargetCoreRender1BaseSysCodeBlocksAppRunModesFinalRun)) {
                    return showAlert("❌ VALIDASI BERHENTI DINI\nGAGAL DI-COMPILE [Index Aksi File Injek Tuntutan Teks No: " + (numAraySysCheckLoopZ1 + 1) + "].. 'TARGET ANCHOR TEXT' KATA KERANGKA TIADA KEHIT ATAU LARI DARI FILE AWAL!!!", "error");
                }
                if (cmdsHookCoreRefParamTargetData.action === 'replace') {
                    checkHTMLDraftValidationsSimulateCoreParamsDataStrRunMemorySystemSandboxModeFinalHTMLParamsMemSysLogixTargetCoreRender1BaseSysCodeBlocksAppRunModesFinalRun = checkHTMLDraftValidationsSimulateCoreParamsDataStrRunMemorySystemSandboxModeFinalHTMLParamsMemSysLogixTargetCoreRender1BaseSysCodeBlocksAppRunModesFinalRun.replace(renderCompilerSyntaxPatternsToSysParamA, cmdsHookCoreRefParamTargetData.snippet || "");
                } else if (cmdsHookCoreRefParamTargetData.action === 'insertBefore') {
                    checkHTMLDraftValidationsSimulateCoreParamsDataStrRunMemorySystemSandboxModeFinalHTMLParamsMemSysLogixTargetCoreRender1BaseSysCodeBlocksAppRunModesFinalRun = checkHTMLDraftValidationsSimulateCoreParamsDataStrRunMemorySystemSandboxModeFinalHTMLParamsMemSysLogixTargetCoreRender1BaseSysCodeBlocksAppRunModesFinalRun.replace(renderCompilerSyntaxPatternsToSysParamA, (cmdsHookCoreRefParamTargetData.snippet || "") + '\n</body>');
                } else if (cmdsHookCoreRefParamTargetData.action === 'insertAfter') {
                     checkHTMLDraftValidationsSimulateCoreParamsDataStrRunMemorySystemSandboxModeFinalHTMLParamsMemSysLogixTargetCoreRender1BaseSysCodeBlocksAppRunModesFinalRun = checkHTMLDraftValidationsSimulateCoreParamsDataStrRunMemorySystemSandboxModeFinalHTMLParamsMemSysLogixTargetCoreRender1BaseSysCodeBlocksAppRunModesFinalRun.replace(renderCompilerSyntaxPatternsToSysParamA, '</body>\n' + (cmdsHookCoreRefParamTargetData.snippet || ""));
                }
            }

            /* -- SEMUA JALUR CHECK PARAMETER JSON DI TEST BED BERES DILAKUI LULUS CEK VALID!! -- JALANKAN EFEK SCREEN TERMINAL RUNNYA DENGAN TUNDA (CEPET, COMPRESIFIED PANCUT ANIM DI LIMITAS MS=2.6 Detik!)) !! */
            isSystemHackingActive = true;
            document.getElementById('hackerOverlay').classList.remove('hidden');
            document.getElementById('hackerOverlay').classList.add('flex');
            const sysConsoleBawahAjaLogsB1C1TerminalParamRenderLogsRenderBypassTermBaseDomStringElementRootTerm = document.getElementById('hackTerminal');
            sysConsoleBawahAjaLogsB1C1TerminalParamRenderLogsRenderBypassTermBaseDomStringElementRootTerm.innerHTML = "";

            const strListParamTerminalTextLoadingRenderDelayScreenCoreAIODataInfoTextLamaPencetSysCUIBawaanyaArrayTeksDataSystemCoretCoretTerminal1zLogsB1A4Run = [
                 ">> ✅ OKE 1 / 4 [VERIFIED-PASS-OK!] Tembusan Valid Test-Bench Object Editor Coder JSON Format Array Coder Data... (PASS LULUS CUMA BUTUH RENDERING TIMPA!!) ",
                 ">> 🔥 Jumper Single Line : Anchor Target Di Lokasi Canvas Ada Cocok Terkonfirmasi.... OK ✅ !! (Siapkan Render Object Tancapan Script Pengikat Core Asli Data!)", 
                 ">> ⚠️ Injecting Memaksa Override Modifkasi Base LayOut File Engine Tanpa Syarat System Lock Down!!! 🚀",
                 ">> SYSTEM REBUILDS => UPDATE DOM !!",
                 ">> FINISHING EXEC !... [Bypass Render Anim Setup Success!] "
            ];
            
            let kalkulatorLoadingDataIntervalRangkapanMSDataBaseIntervalKejutanSuntikanHitDlayZmsTimeMsTmrLogikMsCoreRunDelayBatasMSArrayDelayAccumLogsStrSystemHitLajuHitAkrDelayLamaMemBase = 0;
            for(let xPzTarik1ZSystemZmsAjaAzzPindahXqMs = 0; xPzTarik1ZSystemZmsAjaAzzPindahXqMs < strListParamTerminalTextLoadingRenderDelayScreenCoreAIODataInfoTextLamaPencetSysCUIBawaanyaArrayTeksDataSystemCoretCoretTerminal1zLogsB1A4Run.length; xPzTarik1ZSystemZmsAjaAzzPindahXqMs++) {
                /* Lakukan Lompatan Speed Super agar anim cepat di habisi sebelum timeout besar (Di Perhitungkan tidak mentok lebih atas MS: ~2400 an Max !)  */
                kalkulatorLoadingDataIntervalRangkapanMSDataBaseIntervalKejutanSuntikanHitDlayZmsTimeMsTmrLogikMsCoreRunDelayBatasMSArrayDelayAccumLogsStrSystemHitLajuHitAkrDelayLamaMemBase += (400 - Math.random() * 50);
                setTimeout(() => {
                     sysConsoleBawahAjaLogsB1C1TerminalParamRenderLogsRenderBypassTermBaseDomStringElementRootTerm.innerHTML += `<div class='animate-pulse text-yellow-300'>${strListParamTerminalTextLoadingRenderDelayScreenCoreAIODataInfoTextLamaPencetSysCUIBawaanyaArrayTeksDataSystemCoretCoretTerminal1zLogsB1A4Run[xPzTarik1ZSystemZmsAjaAzzPindahXqMs]}</div>`;
                }, kalkulatorLoadingDataIntervalRangkapanMSDataBaseIntervalKejutanSuntikanHitDlayZmsTimeMsTmrLogikMsCoreRunDelayBatasMSArrayDelayAccumLogsStrSystemHitLajuHitAkrDelayLamaMemBase);
            }

            // TIMER TOTAL PURE BYPASS COMPROMI TERTUTUP = Limit Maksimum Detik 3000 Milisec [ 3S PAS MATIKAN PENAMPAKAN ] -- LANGSUNG TARUH CORE EDIT !! 
            setTimeout(() => {
                document.getElementById('hackerOverlay').classList.add('hidden');
                document.getElementById('hackerOverlay').classList.remove('flex');
                
                /* Sifat Value Nya Tarik Ulang */
                editor.setValue(checkHTMLDraftValidationsSimulateCoreParamsDataStrRunMemorySystemSandboxModeFinalHTMLParamsMemSysLogixTargetCoreRender1BaseSysCodeBlocksAppRunModesFinalRun);
                versionCounter++;
                
                isSystemHackingActive = false;
                showAlert("🎉 Sukses Diterapkan Ke Engine !! Validasi Check-Sump Modus Eksekusi Array SingeLine System Inject OKE !! 🚀💥 !! ", "success");
            }, 3000);
        };
    </script>

</body>
</html>