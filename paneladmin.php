<!DOCTYPE html>
<html lang="id" data-theme="light">

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="color-scheme" content="light dark" />
    <title>Admin Panel — PayNusa Control Center</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;700&display=swap"
      rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
    /* ========================================================================
       PAYNUSA CONTROL CENTER — DESIGN SYSTEM v2
       Skala UI default .675  =>  25% lebih kecil dari tampilan sebelumnya
       ===================================================================== */
    *, *::before, *::after { box-sizing: border-box; }
    /* Reset mandiri — tidak bergantung pada preflight CDN */
    html, body, h1, h2, h3, h4, h5, p, ul, ol, li, figure { margin: 0; padding: 0; }
    ul, ol { list-style: none; }
    img, svg, canvas, video { display: block; max-width: 100%; }
    button { background: none; border: 0; padding: 0; color: inherit; cursor: pointer; }
    input, select, textarea { font: inherit; color: inherit; }
    table { border-collapse: collapse; }
    
    :root {
      --ui-scale: .675;
      --sb-w: 15.5rem;
      --sb-w-min: 4.5rem;
      --r-sm: .45rem; --r: .7rem; --r-lg: .95rem; --r-xl: 1.2rem;
      --font: 'Plus Jakarta Sans', ui-sans-serif, system-ui, -apple-system, 'Segoe UI', Roboto, sans-serif;
      --mono: 'JetBrains Mono', ui-monospace, SFMono-Regular, Menlo, Consolas, monospace;
      --topbar-h: 3.6rem;
    }
    html { font-size: calc(16px * var(--ui-scale)); -webkit-text-size-adjust: 100%; }
    
    [data-theme="light"] {
      color-scheme: light;
      --bg: #edf1f7; --bg-2: #e3e9f2;
      --sb-1: #0b1220; --sb-2: #101a2e; --sb-text: #8fa1bf; --sb-hover: rgba(255,255,255,.07);
      --sb-active: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
      --surface: #ffffff; --surface-2: #f8fafc; --surface-3: #f1f5f9;
      --border: #e4e9f0; --border-2: #d6dde8;
      --text: #0f172a; --text-2: #475569; --muted: #8593a8;
      --pri: #4f46e5; --pri-2: #7c3aed; --pri-soft: #eef2ff; --pri-text: #4338ca; --pri-line: #c7d2fe;
      --ok: #047857; --ok-soft: #ecfdf5; --ok-line: #a7f3d0;
      --warn: #b45309; --warn-soft: #fffbeb; --warn-line: #fde68a;
      --bad: #e11d48; --bad-soft: #fff1f2; --bad-line: #fecdd3;
      --info: #0369a1; --info-soft: #f0f9ff; --info-line: #bae6fd;
      --sh-1: 0 1px 2px rgba(15,23,42,.06);
      --sh-2: 0 1px 2px rgba(15,23,42,.05), 0 10px 26px -14px rgba(15,23,42,.22);
      --sh-3: 0 30px 70px -24px rgba(15,23,42,.38);
      --ring: 0 0 0 3px rgba(79,70,229,.16);
      --top-bg: rgba(255,255,255,.82);
      --row-hover: rgba(79,70,229,.045);
      --scrim: rgba(15,23,42,.45);
    }
    [data-theme="dark"] {
      color-scheme: dark;
      --bg: #070c16; --bg-2: #0a1120;
      --sb-1: #060a13; --sb-2: #0c1424; --sb-text: #8ba0c2; --sb-hover: rgba(255,255,255,.06);
      --sb-active: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
      --surface: #0f172a; --surface-2: #131d33; --surface-3: #182238;
      --border: #1f2a41; --border-2: #2b3752;
      --text: #e7eefb; --text-2: #a8b8d0; --muted: #7587a4;
      --pri: #818cf8; --pri-2: #a78bfa; --pri-soft: rgba(99,102,241,.16); --pri-text: #c7d2fe; --pri-line: rgba(99,102,241,.38);
      --ok: #34d399; --ok-soft: rgba(16,185,129,.14); --ok-line: rgba(16,185,129,.32);
      --warn: #fbbf24; --warn-soft: rgba(245,158,11,.14); --warn-line: rgba(245,158,11,.32);
      --bad: #fb7185; --bad-soft: rgba(244,63,94,.14); --bad-line: rgba(244,63,94,.32);
      --info: #38bdf8; --info-soft: rgba(14,165,233,.14); --info-line: rgba(14,165,233,.32);
      --sh-1: 0 1px 2px rgba(0,0,0,.45);
      --sh-2: 0 1px 2px rgba(0,0,0,.4), 0 14px 34px -16px rgba(0,0,0,.75);
      --sh-3: 0 34px 80px -26px rgba(0,0,0,.85);
      --ring: 0 0 0 3px rgba(129,140,248,.26);
      --top-bg: rgba(15,23,42,.8);
      --row-hover: rgba(129,140,248,.07);
      --scrim: rgba(2,6,16,.7);
    }
    
    body {
      margin: 0; font-family: var(--font); background: var(--bg); color: var(--text);
      height: 100vh; overflow: hidden; font-size: 1rem; line-height: 1.45;
      -webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale;
    }
    h1,h2,h3,h4,p { margin: 0; }
    button, input, select, textarea { font-family: inherit; }
    a { color: var(--pri); text-decoration: none; }
    ::selection { background: var(--pri); color: #fff; }
    
    *::-webkit-scrollbar { width: .5rem; height: .5rem; }
    *::-webkit-scrollbar-track { background: transparent; }
    *::-webkit-scrollbar-thumb { background: var(--border-2); border-radius: 99px; }
    *::-webkit-scrollbar-thumb:hover { background: var(--muted); }
    .no-sb::-webkit-scrollbar { height: 0; width: 0; }
    .no-sb { scrollbar-width: none; }
    
    .hidden { display: none !important; }
    .mono { font-family: var(--mono); }
    .muted { color: var(--muted); }
    
    /* ===================== LAYOUT SHELL ===================== */
    .sidebar {
      width: var(--sb-w); background: linear-gradient(180deg, var(--sb-1) 0%, var(--sb-2) 100%);
      height: 100vh; position: fixed; left: 0; top: 0; z-index: 100;
      display: flex; flex-direction: column; transition: width .25s cubic-bezier(.4,0,.2,1), transform .25s;
      border-right: 1px solid rgba(255,255,255,.06);
    }
    body.sb-collapsed .sidebar { width: var(--sb-w-min); }
    
    .sb-head {
      height: var(--topbar-h); padding: 0 .9rem; display: flex; align-items: center; gap: .6rem;
      border-bottom: 1px solid rgba(255,255,255,.07); flex-shrink: 0;
    }
    .sb-logo {
      width: 2.1rem; height: 2.1rem; border-radius: .6rem; flex-shrink: 0;
      background: linear-gradient(135deg, #6366f1, #a855f7); color: #fff;
      display: grid; place-items: center; font-size: .95rem;
      box-shadow: 0 6px 16px -4px rgba(99,102,241,.75);
    }
    .sb-brand { display: flex; flex-direction: column; line-height: 1.1; min-width: 0; }
    .sb-brand b { color: #fff; font-size: .95rem; font-weight: 800; letter-spacing: -.02em; }
    .sb-brand span { color: #64748b; font-size: .58rem; font-weight: 700; letter-spacing: .14em; text-transform: uppercase; }
    body.sb-collapsed .sb-brand, body.sb-collapsed .sb-label, body.sb-collapsed .sb-item span,
    body.sb-collapsed .sb-item .sb-badge, body.sb-collapsed .sb-foot-info { display: none; }
    body.sb-collapsed .sb-item { justify-content: center; padding: 0 .55rem; }
    
    .sb-nav { flex: 1; overflow-y: auto; padding: .7rem .6rem 1rem; display: flex; flex-direction: column; gap: .12rem; }
    .sb-label {
      font-size: .56rem; font-weight: 800; letter-spacing: .13em; text-transform: uppercase;
      color: #5b6b86; padding: .75rem .65rem .3rem;
    }
    .sb-item {
      display: flex; align-items: center; gap: .65rem; padding: .55rem .65rem; border-radius: var(--r);
      color: var(--sb-text); font-size: .78rem; font-weight: 600; cursor: pointer; position: relative;
      transition: background .18s, color .18s; user-select: none; white-space: nowrap;
    }
    .sb-item i { width: 1.1rem; text-align: center; font-size: .85rem; opacity: .85; flex-shrink: 0; }
    .sb-item:hover { background: var(--sb-hover); color: #e2e8f0; }
    .sb-item.active { background: var(--sb-active); color: #fff; box-shadow: 0 8px 20px -8px rgba(99,102,241,.9); }
    .sb-item.active i { opacity: 1; }
    .sb-item .sb-badge {
      margin-left: auto; background: rgba(251,191,36,.16); color: #fbbf24; border: 1px solid rgba(251,191,36,.3);
      font-size: .58rem; font-weight: 800; padding: .05rem .35rem; border-radius: 99px;
    }
    .sb-item.danger { margin-top: .5rem; color: #fb7185; background: rgba(244,63,94,.1); border: 1px solid rgba(244,63,94,.2); justify-content: center; }
    .sb-item.danger:hover { background: rgba(244,63,94,.18); color: #fecdd3; }
    
    .sb-foot { padding: .6rem; border-top: 1px solid rgba(255,255,255,.07); flex-shrink: 0; }
    .sb-foot-card {
      display: flex; align-items: center; gap: .55rem; padding: .5rem; border-radius: var(--r);
      background: rgba(255,255,255,.05); border: 1px solid rgba(255,255,255,.06);
    }
    .sb-avatar {
      width: 1.9rem; height: 1.9rem; border-radius: .55rem; flex-shrink: 0; display: grid; place-items: center;
      background: linear-gradient(135deg, #10b981, #0ea5e9); color: #fff; font-weight: 800; font-size: .72rem;
    }
    .sb-foot-info { min-width: 0; line-height: 1.2; }
    .sb-foot-info b { color: #e2e8f0; font-size: .72rem; display: block; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; }
    .sb-foot-info span { color: #64748b; font-size: .6rem; }
    
    .main-content {
      margin-left: var(--sb-w); width: calc(100% - var(--sb-w)); height: 100vh;
      display: flex; flex-direction: column; overflow: hidden; transition: margin .25s, width .25s;
    }
    body.sb-collapsed .main-content { margin-left: var(--sb-w-min); width: calc(100% - var(--sb-w-min)); }
    
    .topbar {
      height: var(--topbar-h); flex-shrink: 0; display: flex; align-items: center; gap: .7rem;
      padding: 0 1rem; background: var(--top-bg); backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px);
      border-bottom: 1px solid var(--border); z-index: 90;
    }
    .tb-title { min-width: 0; }
    .tb-title h3 { font-size: .95rem; font-weight: 800; letter-spacing: -.02em; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
    .tb-title p { font-size: .64rem; color: var(--muted); font-weight: 600; }
    .tb-actions { margin-left: auto; display: flex; align-items: center; gap: .4rem; }
    
    .icon-btn {
      width: 2rem; height: 2rem; border-radius: var(--r); border: 1px solid var(--border); background: var(--surface);
      color: var(--text-2); display: grid; place-items: center; cursor: pointer; font-size: .78rem;
      transition: .18s; position: relative;
    }
    .icon-btn:hover { border-color: var(--pri-line); color: var(--pri); background: var(--pri-soft); }
    .icon-btn.on { border-color: var(--pri-line); color: var(--pri); background: var(--pri-soft); }
    .icon-btn .dot {
      position: absolute; top: -.18rem; right: -.18rem; min-width: .9rem; height: .9rem; padding: 0 .18rem;
      border-radius: 99px; background: var(--bad); color: #fff; font-size: .55rem; font-weight: 800;
      display: grid; place-items: center; border: 2px solid var(--surface);
    }
    .tb-search {
      display: flex; align-items: center; gap: .45rem; height: 2rem; padding: 0 .6rem; min-width: 14rem;
      border: 1px solid var(--border); border-radius: var(--r); background: var(--surface-2); color: var(--muted);
      cursor: pointer; font-size: .74rem; transition: .18s;
    }
    .tb-search:hover { border-color: var(--pri-line); background: var(--surface); }
    .tb-search kbd {
      margin-left: auto; font-family: var(--mono); font-size: .58rem; font-weight: 700; padding: .1rem .3rem;
      border: 1px solid var(--border-2); border-radius: .3rem; background: var(--surface); color: var(--muted);
    }
    .content-body { flex: 1; overflow-y: auto; padding: 1.1rem; position: relative; }
    
    /* ===================== PAGE HEADER ===================== */
    .page-head { display: flex; align-items: flex-end; justify-content: space-between; gap: 1rem; margin-bottom: .9rem; flex-wrap: wrap; }
    .page-head h2 { font-size: 1.15rem; font-weight: 800; letter-spacing: -.03em; display: flex; align-items: center; gap: .5rem; }
    .page-head h2 i { color: var(--pri); font-size: 1rem; }
    .page-head p { font-size: .72rem; color: var(--muted); font-weight: 600; margin-top: .15rem; }
    .page-head-actions { display: flex; align-items: center; gap: .4rem; flex-wrap: wrap; }
    
    .page-section { display: none !important; animation: fadeUp .28s cubic-bezier(.4,0,.2,1); }
    .page-section.active { display: block !important; }
    .page-section.active.stack { display: flex !important; }
    @keyframes fadeUp { from { opacity: 0; transform: translateY(6px); } to { opacity: 1; transform: none; } }
    
    .stack { display: flex; flex-direction: column; gap: .9rem; }
    .row { display: flex; align-items: center; gap: .5rem; }
    .row-wrap { display: flex; align-items: center; gap: .5rem; flex-wrap: wrap; }
    
    /* ===================== CARD ===================== */
    .card {
      background: var(--surface); border: 1px solid var(--border); border-radius: var(--r-lg);
      box-shadow: var(--sh-1); overflow: hidden;
    }
    .card-panel { /* alias lama */
      background: var(--surface); border: 1px solid var(--border); border-radius: var(--r-lg); box-shadow: var(--sh-1);
    }
    .card-head {
      display: flex; align-items: center; justify-content: space-between; gap: .75rem;
      padding: .7rem .85rem; border-bottom: 1px solid var(--border); background: var(--surface-2);
    }
    .card-title { font-size: .8rem; font-weight: 800; letter-spacing: -.01em; display: flex; align-items: center; gap: .45rem; }
    .card-title i { color: var(--pri); font-size: .8rem; }
    .card-sub { font-size: .64rem; color: var(--muted); font-weight: 600; }
    .card-body { padding: .85rem; }
    .card-pad { padding: .85rem; }
    
    /* ===================== STAT CARDS ===================== */
    .stat-grid { display: grid; grid-template-columns: repeat(4, minmax(0,1fr)); gap: .7rem; }
    .stat {
      background: var(--surface); border: 1px solid var(--border); border-radius: var(--r-lg); padding: .75rem .85rem;
      box-shadow: var(--sh-1); position: relative; overflow: hidden; transition: .2s;
    }
    .stat:hover { transform: translateY(-2px); box-shadow: var(--sh-2); border-color: var(--pri-line); }
    .stat::after {
      content: ""; position: absolute; inset: 0 0 auto 0; height: 2px;
      background: linear-gradient(90deg, var(--c1), var(--c2)); opacity: .9;
    }
    .stat-top { display: flex; align-items: center; justify-content: space-between; gap: .5rem; }
    .stat-label { font-size: .62rem; font-weight: 800; text-transform: uppercase; letter-spacing: .08em; color: var(--muted); }
    .stat-ico {
      width: 1.85rem; height: 1.85rem; border-radius: .55rem; display: grid; place-items: center; font-size: .78rem;
      background: var(--tint); color: var(--fg); border: 1px solid var(--line);
    }
    .stat-value { font-size: 1.35rem; font-weight: 800; letter-spacing: -.035em; margin-top: .35rem; line-height: 1.1; }
    .stat-note { font-size: .62rem; color: var(--muted); font-weight: 600; margin-top: .15rem; display: flex; align-items: center; gap: .3rem; }
    
    /* ===================== TABLE ===================== */
    .tbl-wrap { overflow-x: auto; }
    table.tbl { width: 100%; border-collapse: collapse; text-align: left; font-size: .75rem; color: var(--text-2); }
    table.tbl thead th {
      position: sticky; top: 0; z-index: 2; background: var(--surface-2); color: var(--muted);
      font-size: .6rem; font-weight: 800; text-transform: uppercase; letter-spacing: .07em;
      padding: .5rem .7rem; border-bottom: 1px solid var(--border); white-space: nowrap;
    }
    table.tbl tbody td { padding: .5rem .7rem; border-bottom: 1px solid var(--border); vertical-align: middle; }
    table.tbl tbody tr { transition: background .15s; }
    table.tbl tbody tr:hover { background: var(--row-hover); }
    table.tbl tbody tr:last-child td { border-bottom: 0; }
    .tbl-empty { padding: 2rem 1rem; text-align: center; color: var(--muted); font-size: .74rem; font-weight: 600; }
    .tbl-empty i { display: block; font-size: 1.5rem; margin-bottom: .5rem; opacity: .5; }
    .cell-strong { font-weight: 700; color: var(--text); }
    .cell-mono { font-family: var(--mono); font-size: .68rem; color: var(--pri-text); font-weight: 500; }
    .cell-sub { font-size: .62rem; color: var(--muted); font-weight: 600; }
    .cell-money { font-weight: 800; color: var(--ok); font-variant-numeric: tabular-nums; }
    
    /* ===================== BADGE ===================== */
    .badge {
      display: inline-flex; align-items: center; gap: .25rem; padding: .12rem .45rem; border-radius: 99px;
      font-size: .6rem; font-weight: 800; letter-spacing: .02em; border: 1px solid transparent; white-space: nowrap;
    }
    .b-ok { background: var(--ok-soft); color: var(--ok); border-color: var(--ok-line); }
    .b-warn { background: var(--warn-soft); color: var(--warn); border-color: var(--warn-line); }
    .b-bad { background: var(--bad-soft); color: var(--bad); border-color: var(--bad-line); }
    .b-info { background: var(--info-soft); color: var(--info); border-color: var(--info-line); }
    .b-pri { background: var(--pri-soft); color: var(--pri-text); border-color: var(--pri-line); }
    .b-mute { background: var(--surface-3); color: var(--muted); border-color: var(--border-2); }
    .pill-dot { width: .34rem; height: .34rem; border-radius: 99px; background: currentColor; }
    
    /* ===================== BUTTON ===================== */
    .btn {
      display: inline-flex; align-items: center; justify-content: center; gap: .35rem; height: 2rem; padding: 0 .75rem;
      border-radius: var(--r); border: 1px solid var(--border-2); background: var(--surface); color: var(--text-2);
      font-size: .74rem; font-weight: 700; cursor: pointer; transition: .16s; white-space: nowrap;
    }
    .btn:hover { border-color: var(--pri-line); color: var(--pri); background: var(--pri-soft); }
    .btn:active { transform: scale(.97); }
    .btn:disabled { opacity: .45; cursor: not-allowed; transform: none; }
    .btn-pri {
      background: linear-gradient(135deg, #4f46e5, #7c3aed); color: #fff; border-color: transparent;
      box-shadow: 0 6px 16px -6px rgba(99,102,241,.85);
    }
    .btn-pri:hover { background: linear-gradient(135deg, #4338ca, #6d28d9); color: #fff; filter: brightness(1.05); }
    .btn-ok { background: linear-gradient(135deg, #059669, #10b981); color: #fff; border-color: transparent; box-shadow: 0 6px 16px -6px rgba(16,185,129,.8); }
    .btn-ok:hover { color: #fff; filter: brightness(1.06); }
    .btn-soft { background: var(--pri-soft); color: var(--pri-text); border-color: var(--pri-line); }
    .btn-soft:hover { background: var(--pri-soft); color: var(--pri-text); filter: brightness(.98); }
    .btn-danger { background: var(--bad-soft); color: var(--bad); border-color: var(--bad-line); }
    .btn-danger:hover { background: var(--bad-soft); color: var(--bad); filter: brightness(.97); }
    .btn-warn { background: var(--warn-soft); color: var(--warn); border-color: var(--warn-line); }
    .btn-warn:hover { color: var(--warn); }
    .btn-ghost { background: transparent; border-color: transparent; }
    .btn-ghost:hover { background: var(--surface-3); }
    .btn-sm { height: 1.65rem; padding: 0 .55rem; font-size: .68rem; }
    .btn-xs { height: 1.4rem; padding: 0 .45rem; font-size: .62rem; border-radius: var(--r-sm); }
    .btn-block { width: 100%; }
    .btn-lg { height: 2.4rem; font-size: .8rem; }
    
    /* ===================== INPUT ===================== */
    .inp, .inp-dark, select.inp, textarea.inp {
      width: 100%; height: 2rem; padding: 0 .6rem; border: 1px solid var(--border-2); border-radius: var(--r);
      background: var(--surface-2); color: var(--text); font-size: .74rem; outline: none; transition: .16s;
    }
    textarea.inp { height: auto; padding: .5rem .6rem; line-height: 1.5; resize: vertical; }
    .inp:focus, .inp-dark:focus { border-color: var(--pri); box-shadow: var(--ring); background: var(--surface); }
    .inp::placeholder { color: var(--muted); }
    .lbl { display: block; font-size: .62rem; font-weight: 800; color: var(--text-2); margin-bottom: .25rem; letter-spacing: .03em; text-transform: uppercase; }
    .field { margin-bottom: .7rem; }
    .inp-icon { position: relative; display: flex; align-items: center; }
    .inp-icon > i { position: absolute; left: .6rem; color: var(--muted); font-size: .72rem; pointer-events: none; }
    .inp-icon .inp { padding-left: 1.85rem; }
    .inp-suffix { position: absolute; right: .5rem; }
    
    /* ===================== CHIPS / SEGMENTED ===================== */
    .chipbar { display: flex; gap: .3rem; padding: .25rem; background: var(--surface-2); border: 1px solid var(--border); border-radius: var(--r-lg); overflow-x: auto; }
    .chip {
      padding: .3rem .65rem; border-radius: var(--r); font-size: .68rem; font-weight: 700; white-space: nowrap;
      color: var(--muted); background: transparent; border: 1px solid transparent; cursor: pointer; transition: .15s;
    }
    .chip:hover { color: var(--text); background: var(--surface-3); }
    .chip.active { background: var(--surface); color: var(--pri-text); border-color: var(--pri-line); box-shadow: var(--sh-1); }
    .chip.active.alt { color: var(--ok); border-color: var(--ok-line); }
    
    /* ===================== SWITCH ===================== */
    .switch { position: relative; display: inline-block; width: 2.2rem; height: 1.2rem; flex-shrink: 0; }
    .switch input { opacity: 0; width: 0; height: 0; }
    .switch .track {
      position: absolute; inset: 0; background: var(--border-2); border-radius: 99px; transition: .2s; cursor: pointer;
    }
    .switch .track::before {
      content: ""; position: absolute; height: .9rem; width: .9rem; left: .15rem; top: .15rem; background: #fff;
      border-radius: 99px; transition: .2s; box-shadow: 0 1px 3px rgba(0,0,0,.3);
    }
    .switch input:checked + .track { background: var(--pri); }
    .switch input:checked + .track::before { transform: translateX(1rem); }
    
    /* ===================== PAGINATION ===================== */
    .pgn {
      display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: .5rem;
      padding: .5rem .75rem; background: var(--surface-2); border-top: 1px solid var(--border); font-size: .68rem;
    }
    .pgn-info { color: var(--muted); font-weight: 600; }
    .pgn-info b { color: var(--text); }
    .pgn-nav { display: flex; align-items: center; gap: .3rem; }
    
    /* ===================== KEY-VALUE ===================== */
    .kv { display: grid; grid-template-columns: repeat(2, minmax(0,1fr)); gap: .45rem; }
    .kv-item { background: var(--surface-2); border: 1px solid var(--border); border-radius: var(--r); padding: .45rem .6rem; }
    .kv-item span { display: block; font-size: .6rem; color: var(--muted); font-weight: 700; text-transform: uppercase; letter-spacing: .05em; }
    .kv-item b { font-size: .74rem; font-weight: 700; word-break: break-all; }
    
    /* ===================== LIST ITEMS (promo/voucher/etc) ===================== */
    .list-item { background: var(--surface-2); border: 1px solid var(--border); border-radius: var(--r); padding: .6rem; }
    .list-item + .list-item { margin-top: .5rem; }
    .thumb {
      border-radius: var(--r-sm); background: var(--surface-3); border: 1px solid var(--border-2);
      display: grid; place-items: center; overflow: hidden; position: relative; flex-shrink: 0;
    }
    .thumb img { width: 100%; height: 100%; object-fit: cover; }
    .thumb .ph { font-size: .58rem; color: var(--muted); font-weight: 700; }
    .thumb input[type="file"] { position: absolute; inset: 0; opacity: 0; cursor: pointer; }
    
    /* ===================== MODAL ===================== */
    .modal {
      position: fixed; inset: 0; background: var(--scrim); backdrop-filter: blur(6px); -webkit-backdrop-filter: blur(6px);
      z-index: 200; display: flex; align-items: center; justify-content: center; padding: 1rem;
      animation: fadeIn .18s ease;
    }
    .modal.hidden { display: none !important; }
    @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
    .modal-card {
      background: var(--surface); border: 1px solid var(--border); border-radius: var(--r-xl); box-shadow: var(--sh-3);
      width: 100%; display: flex; flex-direction: column; max-height: 90vh; animation: pop .22s cubic-bezier(.34,1.4,.64,1);
    }
    @keyframes pop { from { opacity: 0; transform: translateY(10px) scale(.97); } to { opacity: 1; transform: none; } }
    .modal-head { display: flex; align-items: flex-start; justify-content: space-between; gap: .75rem; padding: .85rem 1rem; border-bottom: 1px solid var(--border); flex-shrink: 0; }
    .modal-head h3 { font-size: .9rem; font-weight: 800; letter-spacing: -.02em; }
    .modal-head p { font-size: .68rem; color: var(--muted); font-weight: 600; margin-top: .1rem; }
    .modal-x { width: 1.8rem; height: 1.8rem; border-radius: var(--r); border: 1px solid var(--border); background: var(--surface-2); color: var(--muted); cursor: pointer; flex-shrink: 0; transition: .16s; }
    .modal-x:hover { background: var(--bad-soft); color: var(--bad); border-color: var(--bad-line); }
    .modal-body { padding: 1rem; overflow-y: auto; flex: 1; }
    .modal-foot { display: flex; justify-content: flex-end; gap: .4rem; padding: .75rem 1rem; border-top: 1px solid var(--border); background: var(--surface-2); flex-shrink: 0; }
    .w-md { max-width: 32rem; } .w-lg { max-width: 42rem; } .w-xl { max-width: 58rem; }
    
    /* ===================== TOAST ===================== */
    .toast-wrap { position: fixed; right: 1rem; bottom: 1rem; z-index: 400; display: flex; flex-direction: column; gap: .5rem; pointer-events: none; }
    .toast {
      pointer-events: auto; display: flex; align-items: flex-start; gap: .55rem; min-width: 16rem; max-width: 24rem;
      background: var(--surface); border: 1px solid var(--border); border-left: 3px solid var(--pri);
      border-radius: var(--r); padding: .6rem .7rem; box-shadow: var(--sh-3); animation: slideIn .25s cubic-bezier(.34,1.3,.64,1);
    }
    .toast.out { animation: slideOut .2s forwards; }
    @keyframes slideIn { from { opacity: 0; transform: translateX(20px); } to { opacity: 1; transform: none; } }
    @keyframes slideOut { to { opacity: 0; transform: translateX(20px); } }
    .toast i.ti { font-size: .85rem; margin-top: .1rem; }
    .toast b { display: block; font-size: .74rem; font-weight: 800; }
    .toast p { font-size: .68rem; color: var(--muted); font-weight: 600; margin-top: .1rem; word-break: break-word; }
    .toast.ok { border-left-color: var(--ok); } .toast.ok i.ti { color: var(--ok); }
    .toast.err { border-left-color: var(--bad); } .toast.err i.ti { color: var(--bad); }
    .toast.warn { border-left-color: var(--warn); } .toast.warn i.ti { color: var(--warn); }
    .toast.info i.ti { color: var(--pri); }
    
    /* ===================== COMMAND PALETTE ===================== */
    .palette { position: fixed; inset: 0; z-index: 300; background: var(--scrim); backdrop-filter: blur(6px); display: flex; align-items: flex-start; justify-content: center; padding-top: 8vh; }
    .palette.hidden { display: none !important; }
    .palette-card { width: 100%; max-width: 34rem; background: var(--surface); border: 1px solid var(--border); border-radius: var(--r-xl); box-shadow: var(--sh-3); overflow: hidden; animation: pop .2s cubic-bezier(.34,1.4,.64,1); }
    .palette-inp { display: flex; align-items: center; gap: .55rem; padding: .75rem .9rem; border-bottom: 1px solid var(--border); }
    .palette-inp input { flex: 1; border: 0; outline: none; background: transparent; color: var(--text); font-size: .9rem; font-weight: 600; }
    .palette-list { max-height: 22rem; overflow-y: auto; padding: .35rem; }
    .palette-group { font-size: .58rem; font-weight: 800; letter-spacing: .1em; text-transform: uppercase; color: var(--muted); padding: .5rem .55rem .25rem; }
    .palette-item { display: flex; align-items: center; gap: .6rem; padding: .45rem .55rem; border-radius: var(--r); cursor: pointer; font-size: .76rem; font-weight: 600; color: var(--text-2); }
    .palette-item i { width: 1.1rem; text-align: center; color: var(--muted); font-size: .78rem; }
    .palette-item small { margin-left: auto; font-size: .6rem; color: var(--muted); font-weight: 700; }
    .palette-item.sel { background: var(--pri-soft); color: var(--pri-text); }
    .palette-item.sel i { color: var(--pri); }
    .palette-empty { padding: 1.5rem; text-align: center; color: var(--muted); font-size: .74rem; font-weight: 600; }
    
    /* ===================== MINI CHART ===================== */
    .bars { display: flex; align-items: flex-end; gap: .3rem; height: 7rem; }
    .bar-col { flex: 1; display: flex; flex-direction: column; align-items: center; gap: .3rem; min-width: 0; }
    .bar {
      width: 100%; max-width: 2rem; border-radius: .3rem .3rem .15rem .15rem; min-height: .18rem;
      background: linear-gradient(180deg, var(--pri-2), var(--pri)); transition: .3s; position: relative;
    }
    .bar:hover { filter: brightness(1.15); }
    .bar-col small { font-size: .56rem; color: var(--muted); font-weight: 700; white-space: nowrap; }
    .donut-wrap { display: flex; align-items: center; gap: 1rem; }
    .donut { width: 7rem; height: 7rem; border-radius: 50%; flex-shrink: 0; position: relative; }
    .donut::after { content: ""; position: absolute; inset: 22%; background: var(--surface); border-radius: 50%; }
    .donut-center { position: absolute; inset: 0; display: grid; place-items: center; z-index: 2; text-align: center; }
    .donut-center b { font-size: 1rem; font-weight: 800; display: block; line-height: 1; }
    .donut-center span { font-size: .55rem; color: var(--muted); font-weight: 700; }
    .legend { display: flex; flex-direction: column; gap: .35rem; flex: 1; min-width: 0; }
    .legend-row { display: flex; align-items: center; gap: .4rem; font-size: .68rem; font-weight: 600; color: var(--text-2); }
    .legend-row i { width: .5rem; height: .5rem; border-radius: .15rem; flex-shrink: 0; }
    .legend-row b { margin-left: auto; font-weight: 800; color: var(--text); }
    
    /* ===================== SKELETON ===================== */
    .sk { background: linear-gradient(90deg, var(--surface-3) 25%, var(--border) 37%, var(--surface-3) 63%); background-size: 400% 100%; animation: shimmer 1.3s infinite; border-radius: var(--r-sm); }
    @keyframes shimmer { 0% { background-position: 100% 0; } 100% { background-position: 0 0; } }
    .spin { animation: spin .9s linear infinite; display: inline-block; }
    @keyframes spin { to { transform: rotate(360deg); } }
    
    /* ===================== FLOATING SAVE BAR ===================== */
    .floating-save {
      position: sticky; bottom: -.4rem; margin: .6rem -.85rem -.85rem; z-index: 60;
      background: var(--surface); border-top: 1px solid var(--border); padding: .6rem .85rem;
      display: flex; align-items: center; justify-content: space-between; gap: .75rem; box-shadow: 0 -10px 30px -18px rgba(15,23,42,.4);
    }
    .floating-save p { font-size: .74rem; font-weight: 800; }
    .floating-save small { font-size: .64rem; color: var(--muted); font-weight: 600; }
    
    /* ===================== LOGIN ===================== */
    .login-container {
      position: fixed; inset: 0; z-index: 500; display: flex; align-items: center; justify-content: center; padding: 1rem;
      background: radial-gradient(1200px 600px at 15% 10%, #312e81 0%, transparent 55%),
                  radial-gradient(900px 500px at 85% 90%, #6d28d9 0%, transparent 55%),
                  linear-gradient(135deg, #070c16 0%, #0b1220 60%, #111c33 100%);
      overflow: hidden;
    }
    .login-container.hidden { display: none !important; }
    .login-orb { position: absolute; border-radius: 50%; filter: blur(60px); opacity: .35; pointer-events: none; }
    .login-orb.a { width: 24rem; height: 24rem; background: #4f46e5; top: -6rem; left: -5rem; animation: float 12s ease-in-out infinite; }
    .login-orb.b { width: 20rem; height: 20rem; background: #06b6d4; bottom: -6rem; right: -4rem; animation: float 15s ease-in-out infinite reverse; }
    @keyframes float { 0%,100% { transform: translate(0,0); } 50% { transform: translate(1.5rem, -1.5rem); } }
    .login-grid {
      position: absolute; inset: 0; opacity: .35;
      background-image: linear-gradient(rgba(255,255,255,.045) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,.045) 1px, transparent 1px);
      background-size: 44px 44px; mask-image: radial-gradient(circle at 50% 45%, #000 20%, transparent 75%);
      -webkit-mask-image: radial-gradient(circle at 50% 45%, #000 20%, transparent 75%);
    }
    .login-card {
      position: relative; z-index: 2; width: 100%; max-width: 24rem; padding: 1.6rem 1.5rem;
      background: rgba(255,255,255,.06); border: 1px solid rgba(255,255,255,.12); border-radius: var(--r-xl);
      backdrop-filter: blur(20px); -webkit-backdrop-filter: blur(20px); box-shadow: 0 30px 80px -20px rgba(0,0,0,.7);
      text-align: center; animation: pop .35s cubic-bezier(.34,1.3,.64,1);
    }
    .login-logo {
      width: 3.4rem; height: 3.4rem; margin: 0 auto .8rem; border-radius: 1rem; display: grid; place-items: center;
      background: linear-gradient(135deg, #6366f1, #a855f7); color: #fff; font-size: 1.4rem;
      box-shadow: 0 12px 30px -8px rgba(99,102,241,.85);
    }
    .login-title { font-size: 1.25rem; font-weight: 800; color: #fff; letter-spacing: -.03em; }
    .login-subtitle { font-size: .74rem; color: #94a3b8; font-weight: 600; margin-top: .2rem; }
    .login-sec { display: inline-flex; align-items: center; gap: .35rem; margin-top: .6rem; padding: .2rem .55rem; border-radius: 99px; background: rgba(16,185,129,.14); border: 1px solid rgba(16,185,129,.3); color: #34d399; font-size: .58rem; font-weight: 800; letter-spacing: .06em; }
    .login-form-group { margin-top: .9rem; text-align: left; }
    .login-form-group label { display: block; margin-bottom: .3rem; font-weight: 800; font-size: .6rem; color: #cbd5e1; text-transform: uppercase; letter-spacing: .08em; }
    .login-input-wrapper { position: relative; display: flex; align-items: center; }
    .login-input-wrapper i.icon-left { position: absolute; left: .75rem; color: #64748b; font-size: .74rem; z-index: 2; }
    .login-input-wrapper input {
      width: 100%; height: 2.5rem; padding: 0 2.3rem 0 2.1rem; border: 1px solid rgba(255,255,255,.14);
      border-radius: var(--r); background: rgba(255,255,255,.07); color: #fff; font-size: .8rem; outline: none; transition: .18s;
    }
    .login-input-wrapper input::placeholder { color: #64748b; }
    .login-input-wrapper input:focus { border-color: #818cf8; box-shadow: 0 0 0 3px rgba(129,140,248,.22); background: rgba(255,255,255,.1); }
    .login-eye { position: absolute; right: .6rem; background: none; border: 0; color: #64748b; cursor: pointer; font-size: .74rem; z-index: 2; }
    .login-eye:hover { color: #cbd5e1; }
    .login-btn {
      width: 100%; height: 2.6rem; margin-top: 1.1rem; border: 0; border-radius: var(--r); cursor: pointer;
      background: linear-gradient(135deg, #6366f1, #a855f7); color: #fff; font-weight: 800; font-size: .78rem;
      letter-spacing: .04em; box-shadow: 0 12px 26px -10px rgba(99,102,241,.9); transition: .18s;
      display: inline-flex; align-items: center; justify-content: center; gap: .45rem;
    }
    .login-btn:hover { filter: brightness(1.08); transform: translateY(-1px); }
    .login-btn:disabled { opacity: .7; cursor: progress; transform: none; }
    .login-feats { display: flex; justify-content: center; gap: 1rem; margin-top: 1.1rem; flex-wrap: wrap; }
    .login-feats span { display: inline-flex; align-items: center; gap: .3rem; font-size: .6rem; color: #94a3b8; font-weight: 700; }
    .login-feats i { color: #818cf8; font-size: .6rem; }
    
    /* ===================== MOBILE ===================== */
    .burger-btn { display: none; }
    .overlay-mobile { display: none; position: fixed; inset: 0; background: var(--scrim); z-index: 99; }
    .overlay-mobile.active { display: block; }
    @media (max-width: 900px) {
      .stat-grid { grid-template-columns: repeat(2, minmax(0,1fr)); }
      .tb-search { min-width: 0; width: 2rem; padding: 0; justify-content: center; }
      .tb-search span, .tb-search kbd { display: none; }
    }
    @media (max-width: 768px) {
      .sidebar { transform: translateX(-100%); width: 15.5rem !important; }
      .sidebar.active { transform: translateX(0); }
      .main-content { margin-left: 0 !important; width: 100% !important; }
      .burger-btn { display: grid; }
      .sb-collapse-btn { display: none; }
      .kv { grid-template-columns: 1fr; }
      .stat-grid { grid-template-columns: 1fr 1fr; }
      
      /* Pemaksaan normalisasi untuk membatalkan efek collapsed di HP */
      body.sb-collapsed .sb-brand { display: flex !important; }
      body.sb-collapsed .sb-label, body.sb-collapsed .sb-foot-info { display: block !important; }
      body.sb-collapsed .sb-item span { display: inline-block !important; }
      body.sb-collapsed .sb-item .sb-badge { display: inline-flex !important; }
      body.sb-collapsed .sb-item { justify-content: flex-start !important; padding: .55rem .65rem !important; }
    }
    @media (max-width: 520px) { .stat-grid { grid-template-columns: 1fr; } }
    
    .sb-collapse-btn {
      position: absolute; right: -.55rem; top: 1.15rem; width: 1.15rem; height: 1.15rem; border-radius: 99px;
      background: var(--surface); border: 1px solid var(--border-2); color: var(--muted); font-size: .5rem;
      display: grid; place-items: center; cursor: pointer; z-index: 101; box-shadow: var(--sh-1);
    }
    body.sb-collapsed .sb-collapse-btn i { transform: rotate(180deg); }
    
    @media print { .sidebar, .topbar, .floating-save { display: none !important; } .main-content { margin-left: 0 !important; width: 100% !important; } body { overflow: visible; height: auto; } .content-body { overflow: visible; } }
    </style>
  </head>

  <body>

    <!-- ==================== LOGIN ==================== -->
    <div id="loginView" class="login-container">
      <div class="login-orb a"></div>
      <div class="login-orb b"></div>
      <div class="login-grid"></div>

      <div class="login-card">
        <div class="login-logo"><i class="fas fa-shield-halved"></i></div>
        <h2 class="login-title">PayNusa Admin</h2>
        <p class="login-subtitle">Control Center — Panel Administrator PPOB</p>
        <div class="login-sec"><i class="fas fa-lock"></i> AES-256-CBC SECURED CHANNEL</div>

        <form id="loginForm" onsubmit="doAdminLogin(event)" autocomplete="off">
          <div class="login-form-group">
            <label>Nomor Handphone Admin</label>
            <div class="login-input-wrapper">
              <i class="fas fa-phone icon-left"></i>
              <input type="tel" id="admPhone" placeholder="081234567890" required autocomplete="username" />
            </div>
          </div>
          <div class="login-form-group">
            <label>Kata Sandi</label>
            <div class="login-input-wrapper">
              <i class="fas fa-lock icon-left"></i>
              <input type="password" id="admPass" placeholder="••••••••" required autocomplete="current-password" />
              <button type="button" class="login-eye" onclick="togglePassVis(this)"
                title="Tampilkan sandi"><i class="fas fa-eye"></i></button>
            </div>
          </div>
          <button type="submit" class="login-btn" id="loginBtn">
            <span>MASUK KE PANEL</span> <i class="fas fa-arrow-right"></i>
          </button>
        </form>

        <div class="login-feats">
          <span><i class="fas fa-circle-check"></i> Monitoring Realtime</span>
          <span><i class="fas fa-circle-check"></i> Audit Refund</span>
          <span><i class="fas fa-circle-check"></i> Markup Produk</span>
        </div>
      </div>
    </div>

    <!-- ==================== ADMIN PANEL ==================== -->
    <div id="adminView" class="hidden">
      <div class="overlay-mobile" id="mobileOverlay" onclick="toggleSidebar()"></div>

      <aside class="sidebar" id="sidebar">
        <button class="sb-collapse-btn" onclick="toggleSidebarCollapse()"
          title="Persempit / lebarkan menu"><i class="fas fa-chevron-left"></i></button>

        <div class="sb-head">
          <div class="sb-logo"><i class="fas fa-shield-halved"></i></div>
          <div class="sb-brand">
            <b>PayNusa</b>
            <span>Control Center</span>
          </div>
          <i class="fas fa-times hidden" id="closeSidebar" onclick="toggleSidebar()"
            style="margin-left:auto;color:#94a3b8;cursor:pointer;font-size:.8rem;"></i>
        </div>

        <ul class="sb-nav no-sb">
          <li class="sb-label">Monitoring</li>
          <li class="sb-item active" id="tab-dashboard" onclick="switchTab('dashboard')">
            <i class="fas fa-chart-pie"></i><span>Dashboard</span>
          </li>
          <li class="sb-item" id="tab-tx" onclick="switchTab('tx')"><i class="fas fa-receipt"></i><span>Semua Transaksi</span>
          </li>
          <li class="sb-item" id="tab-topup_queue" onclick="switchTab('topup_queue')">
            <i class="fas fa-wallet"></i><span>Antrian Topup</span><span class="sb-badge hidden" id="badgeTopup">0</span>
          </li>
          <li class="sb-item" id="tab-refund_audit" onclick="switchTab('refund_audit')">
            <i class="fas fa-rotate-left"></i><span>Audit Refund</span>
          </li>

          <li class="sb-label">Manajemen</li>
          <li class="sb-item" id="tab-users" onclick="switchTab('users')"><i class="fas fa-users"></i><span>Control Users</span>
          </li>
          <li class="sb-item" id="tab-markup" onclick="switchTab('markup')"><i class="fas fa-tags"></i><span>Markup Produk</span>
          </li>
          <li class="sb-item" id="tab-promo" onclick="switchTab('promo')">
            <i class="fas fa-gift"></i><span>Promo &amp; Voucher</span>
          </li>

          <li class="sb-label">Sistem</li>
          <li class="sb-item" id="tab-landing" onclick="switchTab('landing')">
            <i class="fas fa-desktop"></i><span>Landing Page</span>
          </li>
          <li class="sb-item" id="tab-settings" onclick="switchTab('settings')">
            <i class="fas fa-sliders"></i><span>Pengaturan Utama</span>
          </li>
          <li class="sb-item" id="tab-livechat" onclick="switchTab('livechat')">
            <i class="fas fa-comments"></i><span>Live Chat</span>
          </li>
          <li class="sb-item" id="tab-doniguard" onclick="switchTab('doniguard')">
            <i class="fas fa-shield-halved"></i><span>Doniguard</span>
          </li>

          <li class="sb-item danger" onclick="logoutAdmin()"><i class="fas fa-right-from-bracket"></i><span>Keluar Sistem</span>
          </li>
        </ul>

        <div class="sb-foot">
          <div class="sb-foot-card">
            <div class="sb-avatar" id="admAvatar">AD</div>
            <div class="sb-foot-info">
              <b id="admFootName">Administrator</b>
              <span><i class="fas fa-circle" style="font-size:.34rem;color:#34d399;"></i> Sesi aktif</span>
            </div>
          </div>
        </div>
      </aside>

      <div class="main-content">
        <header class="topbar">
          <button class="icon-btn burger-btn" onclick="toggleSidebar()" title="Menu"><i class="fas fa-bars"></i></button>
          <div class="tb-title">
            <h3 id="admHeaderTitle">PayNusa Admin Center</h3>
            <p id="admHeaderSub">Ringkasan operasional PPOB hari ini</p>
          </div>

          <div class="tb-actions">
            <button class="tb-search" onclick="openPalette()" title="Cari cepat (Ctrl+K)">
              <i class="fas fa-magnifying-glass"></i><span>Cari menu, user, ref ID…</span><kbd>Ctrl K</kbd>
            </button>

            <span class="badge b-mute" id="liveClock" title="Waktu server lokal"><i class="far fa-clock"></i> --:--:--</span>

            <select class="inp" id="uiScaleSel" onchange="setUiScale(this.value)" title="Skala tampilan"
              style="width:auto;height:2rem;font-size:.68rem;font-weight:700;">
              <option value="0.6">Skala 60%</option>
              <option value="0.675" selected>Skala 75% (kompak)</option>
              <option value="0.7875">Skala 87%</option>
              <option value="0.9">Skala 100% (lama)</option>
              <option value="1">Skala 111%</option>
            </select>

            <button class="icon-btn" id="btnAutoRefresh" onclick="toggleAutoRefresh()"
              title="Auto refresh 30 detik"><i class="fas fa-rotate"></i></button>
            <button class="icon-btn" onclick="toggleTheme()" id="btnTheme"
              title="Mode gelap / terang"><i class="fas fa-moon"></i></button>
            <button class="icon-btn" onclick="switchTab('topup_queue')" id="btnBell"
              title="Antrian topup pending"><i class="fas fa-bell"></i><span class="dot hidden" id="bellDot">0</span></button>
            <button class="icon-btn" onclick="initAdminDashboard()"
              title="Muat ulang semua data"><i class="fas fa-arrows-rotate"></i></button>
            <span class="badge b-mute" id="admProfileName" title="Akun aktif">Administrator</span>
          </div>
        </header>

        <div class="content-body" id="contentBody">

          <!-- ==================== TAB: DASHBOARD ==================== -->
          <section id="sec-dashboard" class="page-section active stack">
            <div class="page-head">
              <div>
                <h2><i class="fas fa-chart-pie"></i> Dashboard Operasional</h2>
                <p>Pemantauan realtime seluruh transaksi &amp; saldo pengguna</p>
              </div>
              <div class="page-head-actions">
                <span class="badge b-mute" id="lastSyncBadge"><i class="fas fa-clock-rotate-left"></i> Belum disinkron</span>
                <button class="btn btn-soft btn-sm" onclick="exportTxCSV()"><i class="fas fa-file-csv"></i> Ekspor CSV</button>
                <button class="btn btn-pri btn-sm" onclick="fetchTransactions()"><i class="fas fa-arrows-rotate"></i> Muat
                  Ulang</button>
              </div>
            </div>

            <div class="stat-grid">
              <div class="stat"
                style="--c1:#4f46e5;--c2:#7c3aed;--tint:var(--pri-soft);--fg:var(--pri-text);--line:var(--pri-line);">
                <div class="stat-top">
                  <span class="stat-label">Total Pengguna</span>
                  <span class="stat-ico"><i class="fas fa-users"></i></span>
                </div>
                <div class="stat-value" id="statTotalUsers">0</div>
                <div class="stat-note"><i class="fas fa-user-check"></i> <span id="statAdminCount">0 admin</span></div>
              </div>
              <div class="stat" style="--c1:#059669;--c2:#10b981;--tint:var(--ok-soft);--fg:var(--ok);--line:var(--ok-line);">
                <div class="stat-top">
                  <span class="stat-label">Total Saldo Beredar</span>
                  <span class="stat-ico"><i class="fas fa-coins"></i></span>
                </div>
                <div class="stat-value" id="statTotalBalance">Rp0</div>
                <div class="stat-note"><i class="fas fa-wallet"></i> Kewajiban platform</div>
              </div>
              <div class="stat"
                style="--c1:#0284c7;--c2:#38bdf8;--tint:var(--info-soft);--fg:var(--info);--line:var(--info-line);">
                <div class="stat-top">
                  <span class="stat-label">Total Transaksi</span>
                  <span class="stat-ico"><i class="fas fa-receipt"></i></span>
                </div>
                <div class="stat-value" id="statTotalTx">0</div>
                <div class="stat-note"><i class="fas fa-hourglass-half"></i> <span id="statPendingTx">0 pending</span></div>
              </div>
              <div class="stat"
                style="--c1:#d97706;--c2:#f59e0b;--tint:var(--warn-soft);--fg:var(--warn);--line:var(--warn-line);">
                <div class="stat-top">
                  <span class="stat-label">Volume Transaksi</span>
                  <span class="stat-ico"><i class="fas fa-arrow-trend-up"></i></span>
                </div>
                <div class="stat-value" id="statVolumeTx">Rp0</div>
                <div class="stat-note"><i class="fas fa-check-double"></i> <span id="statSuccessRate">0% sukses</span></div>
              </div>
            </div>

            <div style="display:grid;grid-template-columns:1.6fr 1fr;gap:.9rem;" class="dash-analytics">
              <div class="card">
                <div class="card-head">
                  <div>
                    <div class="card-title"><i class="fas fa-chart-column"></i> Volume 7 Hari Terakhir</div>
                    <div class="card-sub">Akumulasi nilai transaksi sukses per hari</div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="bars" id="chart7d"></div>
                </div>
              </div>
              <div class="card">
                <div class="card-head">
                  <div>
                    <div class="card-title"><i class="fas fa-circle-nodes"></i> Komposisi Status</div>
                    <div class="card-sub">Distribusi seluruh transaksi</div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="donut-wrap">
                    <div class="donut" id="donutStatus">
                      <div class="donut-center">
                        <div><b id="donutTotal">0</b><span>TOTAL</span></div>
                      </div>
                    </div>
                    <div class="legend" id="donutLegend"></div>
                  </div>
                </div>
              </div>
            </div>

            <div class="card">
              <div class="card-head">
                <div>
                  <div class="card-title"><i class="fas fa-bolt"></i> Transaksi Terbaru Seluruh User</div>
                  <div class="card-sub">5 aktivitas terakhir yang masuk ke sistem</div>
                </div>
                <div class="row">
                  <button class="btn btn-ghost btn-sm" onclick="switchTab('tx')">Lihat Semua
                    <i class="fas fa-arrow-right"></i></button>
                  <button class="btn btn-soft btn-sm" onclick="fetchTransactions()"><i class="fas fa-arrows-rotate"></i></button>
                </div>
              </div>
              <div class="tbl-wrap">
                <table class="tbl">
                  <thead>
                    <tr>
                      <th>Ref ID</th>
                      <th>Pengguna</th>
                      <th>Produk / Layanan</th>
                      <th>Tujuan</th>
                      <th>Total</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody id="dashTxTable"></tbody>
                </table>
              </div>
            </div>
          </section>

          <!-- ==================== TAB: MARKUP ==================== -->
          <section id="sec-markup" class="page-section stack">
            <div class="page-head">
              <div>
                <h2><i class="fas fa-tags"></i> Markup Produk</h2>
                <p>Atur selisih harga jual per produk — dukung nominal tetap (1000) atau persen (5%)</p>
              </div>
              <div class="page-head-actions">
                <span class="badge b-mute" id="markupCountInfo">0 produk</span>
                <span class="badge b-warn" id="markupDirtyInfo" style="display:none;"><i class="fas fa-pen"></i> Perubahan belum disimpan</span>
              </div>
            </div>

            <div class="card">
              <div class="card-body" style="display:flex;flex-direction:column;gap:.55rem;">
                <div class="chipbar no-sb" id="markupFilterCats"></div>
                <div class="chipbar no-sb" id="markupFilterProvs" style="display:none;"></div>

                <div class="row-wrap">
                  <div class="inp-icon" style="width:16rem;max-width:100%;">
                    <i class="fas fa-magnifying-glass"></i>
                    <input type="text" id="markupSearch" class="inp" placeholder="Cari nama / kode produk…"
                      oninput="loadMarkupTable()">
                  </div>
                  <input type="text" id="massMarkupInp" class="inp" placeholder="Nilai massal (cth: 1000 atau 5%)"
                    style="width:14rem;max-width:100%;">
                  <button class="btn btn-soft btn-sm" onclick="applyMassMarkup()"><i class="fas fa-check-double"></i> Terapkan ke
                    Terpilih</button>
                  <button class="btn btn-sm"
                    onclick="document.getElementById('chkAllMarkup').click()"><i class="fas fa-list-check"></i> Pilih
                    Semua</button>
                  <button class="btn btn-ghost btn-sm" onclick="clearMarkupSelection()"><i class="fas fa-xmark"></i>
                    Kosongkan</button>
                </div>

                <div class="tbl-wrap" style="max-height:56vh;">
                  <table class="tbl">
                    <thead>
                      <tr>
                        <th style="width:2.2rem;"><input type="checkbox" id="chkAllMarkup"
                            onchange="toggleAllMarkup(this.checked)" style="width:.85rem;height:.85rem;accent-color:var(--pri);">
                        </th>
                        <th>Kategori</th>
                        <th>Produk</th>
                        <th>Harga Asli</th>
                        <th style="width:7rem;">Markup</th>
                        <th>Harga Akhir</th>
                      </tr>
                    </thead>
                    <tbody id="markupTableBody"></tbody>
                  </table>
                </div>

                <div class="floating-save">
                  <div>
                    <p>Simpan Perubahan Markup</p>
                    <small>Perubahan tersimpan ke server setelah tombol simpan ditekan.</small>
                  </div>
                  <button class="btn btn-ok btn-lg" onclick="saveAdminMarkup()"
                    id="btnSaveMarkup"><i class="fas fa-floppy-disk"></i> SIMPAN PERUBAHAN</button>
                </div>
              </div>
            </div>
          </section>

          <!-- ==================== TAB: USERS ==================== -->
          <section id="sec-users" class="page-section stack">
            <div class="page-head">
              <div>
                <h2><i class="fas fa-users"></i> Control Users</h2>
                <p>Kelola saldo, poin, data diri, dan hak akses akun pengguna</p>
              </div>
              <div class="page-head-actions">
                <span class="badge b-pri" id="userCountInfo">0 User</span>
                <button class="btn btn-soft btn-sm" onclick="exportUsersCSV()"><i class="fas fa-file-csv"></i> Ekspor CSV</button>
                <button class="btn btn-sm" onclick="fetchUsers()"><i class="fas fa-arrows-rotate"></i> Refresh</button>
              </div>
            </div>

            <div class="card">
              <div class="card-body" style="padding-bottom:.6rem;">
                <div class="row-wrap">
                  <div class="inp-icon" style="width:20rem;max-width:100%;">
                    <i class="fas fa-magnifying-glass"></i>
                    <input type="text" id="userSearch" class="inp" oninput="renderUsersTable(1)"
                      placeholder="Cari nama, nomor HP, atau UID…">
                  </div>
                  <select class="inp" id="userFilterRole" onchange="renderUsersTable(1)" style="width:auto;">
                    <option value="">Semua jenis akun</option>
                    <option value="admin">Admin saja</option>
                    <option value="member">Member saja</option>
                  </select>
                  <select class="inp" id="userSort" onchange="renderUsersTable(1)" style="width:auto;">
                    <option value="">Urutkan: default</option>
                    <option value="balance_desc">Saldo tertinggi</option>
                    <option value="balance_asc">Saldo terendah</option>
                    <option value="name_asc">Nama A-Z</option>
                  </select>
                </div>
              </div>
              <div class="tbl-wrap">
                <table class="tbl">
                  <thead>
                    <tr>
                      <th>UID</th>
                      <th>Nama</th>
                      <th>No. HP</th>
                      <th>Email</th>
                      <th>Kota</th>
                      <th>Saldo</th>
                      <th>Poin</th>
                      <th>Jenis Akun</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody id="userTableBody"></tbody>
                </table>
              </div>
              <div id="userPagination" class="pgn"></div>
            </div>
          </section>

          <!-- ==================== TAB: PROMO & VOUCHER ==================== -->
          <section id="sec-promo" class="page-section stack">
            <div class="page-head">
              <div>
                <h2><i class="fas fa-gift"></i> Promo &amp; Voucher</h2>
                <p>Banner promosi dan kode voucher yang tampil di aplikasi pengguna</p>
              </div>
              <div class="page-head-actions">
                <span class="badge b-mute" id="promoCountInfo">0 promo · 0 voucher</span>
              </div>
            </div>

            <div style="display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:.9rem;" class="promo-grid">
              <div class="card">
                <div class="card-head">
                  <div class="card-title"><i class="fas fa-bullhorn"></i> Banner Promo Utama</div>
                  <button class="btn btn-pri btn-xs" onclick="addPromoRow()"><i class="fas fa-plus"></i> Tambah</button>
                </div>
                <div class="card-body" id="promoListContainer"></div>
              </div>

              <div class="card">
                <div class="card-head">
                  <div class="card-title"><i class="fas fa-ticket"></i> Kelola Voucher</div>
                  <button class="btn btn-ok btn-xs" onclick="addVoucherRow()"><i class="fas fa-plus"></i> Tambah</button>
                </div>
                <div class="card-body" id="voucherListContainer"></div>
              </div>
            </div>

            <button class="btn btn-pri btn-lg btn-block" onclick="saveSiteSettings()"><i class="fas fa-floppy-disk"></i> Simpan
              Perubahan Promo &amp; Voucher</button>
          </section>

          <!-- ==================== TAB: LANDING PAGE ==================== -->
          <section id="sec-landing" class="page-section stack">
            <div class="page-head">
              <div>
                <h2><i class="fas fa-desktop"></i> Landing Page</h2>
                <p>Konten halaman depan aplikasi — judul, slogan, dan slider promosi</p>
              </div>
              <div class="page-head-actions">
                <button class="btn btn-sm" onclick="loadLandingAdmin()"><i class="fas fa-arrows-rotate"></i> Muat Ulang</button>
              </div>
            </div>

            <div class="card" style="max-width:52rem;margin:0 auto;width:100%;">
              <div class="card-head">
                <div class="card-title"><i class="fas fa-pen-to-square"></i> Identitas Halaman</div>
              </div>
              <div class="card-body">
                <div style="display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:.7rem;">
                  <div>
                    <label class="lbl">Judul Aplikasi</label>
                    <input type="text" id="lndTitle" class="inp" placeholder="PayNusa" />
                  </div>
                  <div>
                    <label class="lbl">Teks Versi</label>
                    <input type="text" id="lndVersion" class="inp" placeholder="Versi 5.72.0" />
                  </div>
                </div>
                <div style="margin-top:.7rem;">
                  <label class="lbl">Slogan (gunakan \n untuk baris baru)</label>
                  <textarea id="lndSlogan" class="inp" style="height:5rem;"
                    placeholder="Harga Lebih Murah\ndari Aplikasi Lainnya"></textarea>
                </div>

                <div style="margin-top:1.1rem;padding-top:.9rem;border-top:1px solid var(--border);">
                  <div class="row" style="justify-content:space-between;margin-bottom:.6rem;">
                    <div class="card-title" style="color:var(--pri-text);"><i class="fas fa-images"></i> Main Slider (Gambar Besar
                      + Teks)</div>
                    <button class="btn btn-soft btn-xs" onclick="addMainSlider()"><i class="fas fa-plus"></i> Tambah
                      Slider</button>
                  </div>
                  <div id="lndMainSliders"></div>
                </div>

                <div style="margin-top:1.1rem;padding-top:.9rem;border-top:1px solid var(--border);">
                  <div class="row" style="justify-content:space-between;margin-bottom:.6rem;">
                    <div class="card-title" style="color:var(--ok);"><i class="fas fa-rectangle-ad"></i> Secondary Slider (Gambar
                      Promo Kecil)</div>
                    <button class="btn btn-ok btn-xs" onclick="addSecSlider()"><i class="fas fa-plus"></i> Tambah Promo</button>
                  </div>
                  <div id="lndSecSliders"></div>
                </div>

                <button class="btn btn-pri btn-lg btn-block" style="margin-top:1rem;"
                  onclick="saveLandingAdmin()"><i class="fas fa-floppy-disk"></i> Simpan Perubahan Landing Page</button>
              </div>
            </div>
          </section>

          <!-- ==================== TAB: PENGATURAN UTAMA ==================== -->
          <section id="sec-settings" class="page-section stack">
            <div class="page-head">
              <div>
                <h2><i class="fas fa-sliders"></i> Pengaturan Utama</h2>
                <p>Identitas aplikasi, kanal QRIS, rekening, dan metode pembayaran</p>
              </div>
              <div class="page-head-actions">
                <button class="btn btn-sm" onclick="fetchSettings()"><i class="fas fa-arrows-rotate"></i> Muat Ulang</button>
              </div>
            </div>

            <div style="display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:.9rem;align-items:start;"
              class="settings-grid">
              <div class="card">
                <div class="card-head">
                  <div class="card-title"><i class="fas fa-building"></i> Identitas Aplikasi</div>
                </div>
                <div class="card-body">
                  <div class="list-item" style="display:flex;align-items:center;gap:.7rem;">
                    <div class="thumb" style="width:3.2rem;height:3.2rem;">
                      <img id="appLogoPreview" src="" style="object-fit:contain;padding:.15rem;">
                      <input type="file" accept="image/*" onchange="uploadAppLogo(this)" title="Upload Logo Aplikasi">
                    </div>
                    <div style="flex:1;">
                      <p style="font-size:.72rem;font-weight:800;color:var(--pri-text);">Logo Aplikasi Utama</p>
                      <small style="font-size:.62rem;color:var(--muted);font-weight:600;">Klik kotak untuk mengganti logo di
                        seluruh aplikasi.</small>
                    </div>
                  </div>

                  <div class="field" style="margin-top:.7rem;">
                    <label class="lbl">Nama Aplikasi</label>
                    <input type="text" id="confSiteName" class="inp" placeholder="Contoh: PayNusa" />
                  </div>
                  <div class="field">
                    <label class="lbl">Judul / Slogan Aplikasi</label>
                    <input type="text" id="confAppTitle" class="inp" placeholder="PayNusa — Bayar Semua Tagihan Jadi Mudah" />
                  </div>
                  <div class="field">
                    <label class="lbl">Nomor WA / CS</label>
                    <input type="text" id="confCsPhone" class="inp" placeholder="081234567890" />
                  </div>
                  <div class="field">
                    <label class="lbl">Email CS / Helpdesk</label>
                    <input type="text" id="confCsEmail" class="inp" placeholder="support@paynusa.co.id" />
                  </div>
                </div>
              </div>

              <div class="stack">
                <div class="card">
                  <div class="card-head">
                    <div class="card-title"><i class="fas fa-qrcode"></i> QRIS Dinamis</div>
                    <button id="btnToggleQris" class="btn btn-ok btn-xs" onclick="toggleQrisActive()">Aktif</button>
                  </div>
                  <div class="card-body">
                    <div class="field">
                      <label class="lbl">Nama Merchant / Atas Nama QRIS</label>
                      <input type="text" id="confQrisName" class="inp" placeholder="Contoh: PAYNUSA OFFICIAL" />
                    </div>
                    <div class="field" style="margin-bottom:0;">
                      <label class="lbl">Teks Mentah QRIS Statis (EMVCo)</label>
                      <textarea id="confQrisStatic" class="inp mono" style="height:5.5rem;font-size:.66rem;"
                        placeholder="00020101021126670016COM.NOBUBANK..."></textarea>
                      <small style="font-size:.6rem;color:var(--muted);font-weight:600;">String mentah QRIS dari merchant/bank
                        Anda untuk generate QRIS dinamis saat top up.</small>
                    </div>
                  </div>
                </div>

                <div class="card">
                  <div class="card-head">
                    <div class="card-title"><i class="fas fa-credit-card"></i> Metode Pembayaran</div>
                    <span class="card-sub">Kanal yang tampil di halaman checkout</span>
                  </div>
                  <div class="card-body" id="pmListContainer"></div>
                </div>
              </div>

              <div class="card">
                <div class="card-head">
                  <div class="card-title"><i class="fas fa-building-columns"></i> Metode Top Up Manual</div>
                  <button class="btn btn-ok btn-xs" onclick="addManualTopupRow()"><i class="fas fa-plus"></i> Tambah</button>
                </div>
                <div class="card-body" id="manualTopupListContainer"></div>
              </div>

              <div class="card">
                <div class="card-head">
                  <div class="card-title"><i class="fas fa-piggy-bank"></i> Rekening Bank Penampung</div>
                  <button class="btn btn-soft btn-xs" onclick="addBankRow()"><i class="fas fa-plus"></i> Tambah</button>
                </div>
                <div class="card-body" id="bankListContainer"></div>
              </div>

              <div class="card">
                <div class="card-head">
                  <div class="card-title"><i class="fas fa-percent"></i> Biaya Admin Top Up</div>
                  <button class="btn btn-soft btn-xs" onclick="addTopupFeeRow()"><i class="fas fa-plus"></i> Tambah</button>
                </div>
                <div class="card-body" id="topupFeeListContainer"></div>
              </div>
            </div>

            <button class="btn btn-pri btn-lg btn-block" onclick="saveSiteSettings()"><i class="fas fa-floppy-disk"></i> Simpan
              Pengaturan Aplikasi</button>
          </section>

          <!-- ==================== TAB: SEMUA TRANSAKSI ==================== -->
          <section id="sec-tx" class="page-section stack">
            <div class="page-head">
              <div>
                <h2><i class="fas fa-receipt"></i> Semua Transaksi</h2>
                <p>Riwayat lengkap transaksi seluruh pengguna beserta kontrol status</p>
              </div>
              <div class="page-head-actions">
                <span class="badge b-mute" id="txCountInfo">0 transaksi</span>
                <button class="btn btn-soft btn-sm" onclick="exportTxCSV()"><i class="fas fa-file-csv"></i> Ekspor CSV</button>
                <button class="btn btn-sm" onclick="fetchTransactions()"><i class="fas fa-arrows-rotate"></i> Muat Ulang</button>
              </div>
            </div>

            <div class="card">
              <div class="card-body" style="padding-bottom:.6rem;">
                <div class="row-wrap">
                  <div class="inp-icon" style="width:20rem;max-width:100%;">
                    <i class="fas fa-magnifying-glass"></i>
                    <input type="text" id="txSearch" class="inp" oninput="renderAllTxTable(1)"
                      placeholder="Cari ref ID, nama, HP, produk, tujuan…">
                  </div>
                  <div class="chipbar no-sb" id="txStatusChips">
                    <button class="chip active" data-st="" onclick="setTxStatusFilter(this,'')">Semua</button>
                    <button class="chip" data-st="success" onclick="setTxStatusFilter(this,'success')">Sukses</button>
                    <button class="chip" data-st="pending" onclick="setTxStatusFilter(this,'pending')">Pending</button>
                    <button class="chip" data-st="failed" onclick="setTxStatusFilter(this,'failed')">Gagal</button>
                  </div>
                </div>
              </div>
              <div class="tbl-wrap">
                <table class="tbl">
                  <thead>
                    <tr>
                      <th>Ref ID</th>
                      <th>Waktu</th>
                      <th>Pengguna</th>
                      <th>Produk</th>
                      <th>Tujuan</th>
                      <th>Total</th>
                      <th>Metode</th>
                      <th>Status</th>
                      <th>Aksi Admin</th>
                    </tr>
                  </thead>
                  <tbody id="allTxTableBody"></tbody>
                </table>
              </div>
              <div id="txPagination" class="pgn"></div>
            </div>
          </section>

          <!-- ==================== TAB: AUDIT REFUND ==================== -->
          <section id="sec-refund_audit" class="page-section stack">
            <div class="page-head">
              <div>
                <h2><i class="fas fa-rotate-left"></i> Audit Refund</h2>
                <p>Monitoring pengembalian dana otomatis &amp; manual untuk transaksi gagal</p>
              </div>
              <div class="page-head-actions">
                <span class="badge b-ok"><i class="fas fa-lock"></i> Secured Idempotency</span>
                <button class="btn btn-soft btn-sm" onclick="exportRefundCSV()"><i class="fas fa-file-csv"></i> Ekspor</button>
                <button class="btn btn-sm" onclick="fetchTransactions()"><i class="fas fa-arrows-rotate"></i> Refresh</button>
              </div>
            </div>

            <div class="stat-grid">
              <div class="stat" style="--c1:#e11d48;--c2:#fb7185;--tint:var(--bad-soft);--fg:var(--bad);--line:var(--bad-line);">
                <div class="stat-top">
                  <span class="stat-label">Log Gagal / Refund</span><span class="stat-ico"><i class="fas fa-triangle-exclamation"></i></span>
                </div>
                <div class="stat-value" id="statRefundTotal">0</div>
                <div class="stat-note">Transaksi bermasalah</div>
              </div>
              <div class="stat" style="--c1:#059669;--c2:#10b981;--tint:var(--ok-soft);--fg:var(--ok);--line:var(--ok-line);">
                <div class="stat-top">
                  <span class="stat-label">Dana Ter-refund</span><span class="stat-ico"><i class="fas fa-money-bill-transfer"></i></span>
                </div>
                <div class="stat-value" id="statRefundVolume">Rp0</div>
                <div class="stat-note">Total nominal dikembalikan</div>
              </div>
              <div class="stat"
                style="--c1:#4f46e5;--c2:#7c3aed;--tint:var(--pri-soft);--fg:var(--pri-text);--line:var(--pri-line);">
                <div class="stat-top">
                  <span class="stat-label">Refund Selesai</span><span class="stat-ico"><i class="fas fa-circle-check"></i></span>
                </div>
                <div class="stat-value" id="statRefundDone">0</div>
                <div class="stat-note">Terkunci idempoten</div>
              </div>
              <div class="stat"
                style="--c1:#d97706;--c2:#f59e0b;--tint:var(--warn-soft);--fg:var(--warn);--line:var(--warn-line);">
                <div class="stat-top">
                  <span class="stat-label">Metode Non-Saldo</span><span class="stat-ico"><i class="fas fa-building-columns"></i></span>
                </div>
                <div class="stat-value" id="statRefundOther">0</div>
                <div class="stat-note">Perlu penanganan manual</div>
              </div>
            </div>

            <div class="card">
              <div class="tbl-wrap">
                <table class="tbl">
                  <thead>
                    <tr>
                      <th>Ref ID</th>
                      <th>Waktu</th>
                      <th>User / No. HP</th>
                      <th>Produk &amp; Tujuan</th>
                      <th>Total</th>
                      <th>Metode</th>
                      <th>Status Refund</th>
                      <th>Idempotency Lock</th>
                      <th>Aksi Admin</th>
                    </tr>
                  </thead>
                  <tbody id="refundAuditTable"></tbody>
                </table>
              </div>
              <div id="refundPagination" class="pgn"></div>
            </div>
          </section>

          <!-- ==================== TAB: ANTRIAN TOPUP ==================== -->
          <section id="sec-topup_queue" class="page-section stack">
            <div class="page-head">
              <div>
                <h2><i class="fas fa-wallet"></i> Antrian Top Up Saldo</h2>
                <p>Verifikasi manual pembayaran masuk dari pengguna</p>
              </div>
              <div class="page-head-actions">
                <span class="badge b-warn" id="topupCountInfo">0 antrian</span>
                <button class="btn btn-sm" onclick="fetchTransactions()"><i class="fas fa-arrows-rotate"></i> Refresh
                  Antrian</button>
              </div>
            </div>
            <div id="topupQueueCardsContainer" style="display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:.8rem;">
            </div>
          </section>

          <!-- ==================== TAB: LIVE CHAT ==================== -->
          <section id="sec-livechat" class="page-section stack">
            <div class="page-head">
              <div>
                <h2><i class="fas fa-comments"></i> Public Live Chat Manager</h2>
                <p>Pantau percakapan pengguna realtime, hapus pesan, dan kirim pesan palsu/admin</p>
              </div>
              <div class="page-head-actions">
                <button class="btn btn-danger btn-sm" onclick="clearAllLiveChatAdmin()"><i class="fas fa-trash"></i> Bersihkan
                  Semua Chat</button>
                <button class="btn btn-pri btn-sm" onclick="fetchLiveChatAdmin()"><i class="fas fa-arrows-rotate"></i>
                  Refresh</button>
              </div>
            </div>

            <div style="display:grid;grid-template-columns:1.2fr 0.8fr;gap:.9rem;" class="dash-analytics">
              <div class="card">
                <div class="card-head">
                  <div class="card-title"><i class="fas fa-message"></i> Riwayat Percakapan Realtime</div>
                  <span class="badge b-ok"><span class="pill-dot"></span>Live Stream</span>
                </div>
                <div class="card-body">
                  <div id="adminChatBox" class="space-y-3 max-h-[40vh] overflow-y-auto no-sb p-2"></div>
                </div>
              </div>

              <div class="card">
                <div class="card-head">
                  <div class="card-title"><i class="fas fa-user-ninja"></i> Kirim Pesan / Fake Chat</div>
                </div>
                <div class="card-body space-y-3">
                  <p class="cell-sub leading-relaxed">Anda dapat mengirim pesan asli sebagai Admin ataupun membuat chat palsu
                    dengan mengisi username bebas agar chat terlihat aktif tanpa indikator admin.</p>
                  <div class="field">
                    <label class="lbl">Username Pengirim (Bebas / Fake)</label>
                    <input type="text" id="admFakeUser" class="inp" placeholder="Contoh: Rian Pratama, Siti99, dll"
                      value="PayNusa Official" />
                  </div>
                  <div class="field">
                    <label class="lbl">Pesan Chat</label>
                    <textarea id="admFakeMsg" class="inp" style="height:5rem;" placeholder="Tulis isi obrolan..."></textarea>
                  </div>
                  <button class="btn btn-pri btn-block" onclick="sendChatAsAdmin()"><i class="fas fa-paper-plane"></i> Kirim Pesan
                    Sekarang</button>
                </div>
              </div>
            </div>
          </section>

          <!-- ==================== TAB: DONIGUARD ==================== -->
          <section id="sec-doniguard" class="page-section stack">
            <div class="page-head">
              <div>
                <h2><i class="fas fa-shield-halved"></i> Doniguard</h2>
                <p>Log mutasi saldo berurutan — jejak audit setiap pergerakan dana</p>
              </div>
              <div class="page-head-actions">
                <span class="badge b-mute" id="dgCountInfo">0 log</span>
                <button class="btn btn-soft btn-sm" onclick="exportDoniguardCSV()"><i class="fas fa-file-csv"></i> Ekspor</button>
                <button class="btn btn-sm" onclick="fetchDoniguard()"><i class="fas fa-arrows-rotate"></i> Refresh Log</button>
              </div>
            </div>

            <div class="card">
              <div class="card-body" style="padding-bottom:.6rem;">
                <div class="row-wrap">
                  <div style="width:20rem;max-width:100%;">
                    <select id="dgSelectUser" class="inp" onchange="filterDoniguard()">
                      <option value="">-- Pilih User --</option>
                    </select>
                  </div>
                  <div class="chipbar no-sb">
                    <button class="chip active" onclick="setDgTypeFilter(this,'')">Semua</button>
                    <button class="chip" onclick="setDgTypeFilter(this,'in')">Saldo Masuk</button>
                    <button class="chip" onclick="setDgTypeFilter(this,'out')">Saldo Keluar</button>
                  </div>
                  <button class="btn btn-danger btn-sm" id="btnClearDoniguard" onclick="clearDoniguardUser()"
                    style="display:none;"><i class="fas fa-trash"></i> Bersihkan Log User Ini</button>
                </div>
              </div>
              <div class="tbl-wrap" style="max-height:62vh;">
                <table class="tbl">
                  <thead>
                    <tr>
                      <th>Waktu</th>
                      <th>UID User</th>
                      <th>Keterangan</th>
                      <th>Nominal</th>
                      <th>Tipe</th>
                      <th>Saldo Awal</th>
                      <th>Saldo Akhir</th>
                      <th>Log Full</th>
                    </tr>
                  </thead>
                  <tbody id="doniguardTableBody"></tbody>
                </table>
              </div>
            </div>
          </section>

        </div>
      </div>
    </div>

    <!-- ==================== MODAL: RIWAYAT USER ==================== -->
    <div id="modalUserHistory" class="modal hidden">
      <div class="modal-card w-xl">
        <div class="modal-head">
          <div>
            <h3><i class="fas fa-clock-rotate-left" style="color:var(--pri);"></i> Riwayat Transaksi Pengguna</h3>
            <p id="historyModalSubtitle">Memuat...</p>
          </div>
          <button onclick="closeUserHistory()" class="modal-x" title="Tutup"><i class="fas fa-xmark"></i></button>
        </div>
        <div class="modal-body" style="padding:0;">
          <div class="tbl-wrap">
            <table class="tbl">
              <thead>
                <tr>
                  <th>Ref ID</th>
                  <th>Waktu</th>
                  <th>Produk</th>
                  <th>Tujuan</th>
                  <th>Total</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody id="userHistoryTableBody"></tbody>
            </table>
          </div>
        </div>
        <div id="userHistoryPagination" class="pgn"></div>
      </div>
    </div>

    <!-- ==================== MODAL: DETAIL TRANSAKSI ==================== -->
    <div id="modalTxDetail" class="modal hidden">
      <div class="modal-card w-lg">
        <div class="modal-head">
          <div>
            <h3><i class="fas fa-file-lines" style="color:var(--pri);"></i> Detail Transaksi &amp; Respon Server</h3>
            <p>Termasuk raw response JSON dari provider</p>
          </div>
          <button onclick="closeModalTxDetail()" class="modal-x" title="Tutup"><i class="fas fa-xmark"></i></button>
        </div>
        <div class="modal-body" id="modalTxDetailContent"></div>
        <div class="modal-foot">
          <button onclick="closeModalTxDetail()" class="btn btn-sm">Tutup</button>
          <button id="btnLiveCheckModal" onclick="" class="btn btn-pri btn-sm"><i class="fas fa-bolt"></i> Live Cek Status
            Server</button>
        </div>
      </div>
    </div>

    <!-- ==================== MODAL: CROPPER ==================== -->
    <div id="cropperModal" class="modal hidden" style="background:rgba(2,6,16,.92);z-index:250;">
      <div class="modal-card w-lg">
        <div class="modal-head">
          <h3><i class="fas fa-crop-simple" style="color:var(--pri);"></i> Sesuaikan Gambar</h3>
          <button onclick="closeCropper()" class="modal-x"><i class="fas fa-xmark"></i></button>
        </div>
        <div class="modal-body" style="background:var(--surface-3);display:grid;place-items:center;min-height:20rem;">
          <img id="cropperImage" src="" style="max-width:100%;max-height:60vh;">
        </div>
        <div class="modal-foot">
          <button onclick="closeCropper()" class="btn btn-sm">Batal</button>
          <button onclick="performCropAndUpload()" class="btn btn-pri btn-sm"><i class="fas fa-crop-simple"></i> Potong &amp;
            Upload</button>
        </div>
      </div>
    </div>

    <!-- ==================== MODAL: EDIT USER ==================== -->
    <div id="modalUser" class="modal hidden">
      <div class="modal-card w-md">
        <div class="modal-head">
          <div>
            <h3><i class="fas fa-user-pen" style="color:var(--pri);"></i> Edit Data User</h3>
            <p>Perubahan langsung tersimpan ke database</p>
          </div>
          <button onclick="closeModalUser()" class="modal-x"><i class="fas fa-xmark"></i></button>
        </div>
        <div class="modal-body">
          <input type="hidden" id="editUid" />
          <div style="display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:.6rem;">
            <div><label class="lbl">Nama Lengkap</label><input type="text" id="editName" class="inp" /></div>
            <div><label class="lbl">Nomor Handphone</label><input type="text" id="editPhone" class="inp" /></div>
          </div>
          <div style="display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:.6rem;margin-top:.6rem;">
            <div><label class="lbl">Email</label><input type="email" id="editEmail" class="inp" /></div>
            <div><label class="lbl">Kota / Domisili</label><input type="text" id="editAddress" class="inp" /></div>
          </div>
          <div style="display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:.6rem;margin-top:.6rem;">
            <div><label class="lbl">Saldo (Rp)</label><input type="number" id="editBalance" class="inp" /></div>
            <div><label class="lbl">Poin</label><input type="number" id="editPoints" class="inp" /></div>
            <div>
              <label class="lbl">Jenis Akun</label>
              <select id="editJenisAkun" class="inp">
                <option value="member">member</option>
                <option value="admin">admin</option>
              </select>
            </div>
          </div>
          <div class="row-wrap"
            style="margin-top:.5rem;padding:.5rem .6rem;border:1px dashed var(--border-2);border-radius:var(--r);background:var(--surface-2);">
            <span class="badge b-pri"><i class="fas fa-plus-minus"></i> Penyesuaian cepat</span>
            <button class="btn btn-xs" onclick="quickAdjustBalance(1000)">+1.000</button>
            <button class="btn btn-xs" onclick="quickAdjustBalance(5000)">+5.000</button>
            <button class="btn btn-xs" onclick="quickAdjustBalance(10000)">+10.000</button>
            <button class="btn btn-xs" onclick="quickAdjustBalance(50000)">+50.000</button>
            <button class="btn btn-xs" onclick="quickAdjustBalance(100000)">+100.000</button>
          </div>
          <div
            style="display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:.6rem;margin-top:.7rem;padding-top:.7rem;border-top:1px solid var(--border);">
            <div><label class="lbl">PIN (Opsional)</label><input type="password" id="editPin" maxlength="6" class="inp"
                placeholder="Kosongkan jika tetap" /></div>
            <div><label class="lbl">Kata Sandi Baru (Opsional)</label><input type="password" id="editPass" class="inp"
                placeholder="Kosongkan jika tetap" /></div>
          </div>
        </div>
        <div class="modal-foot">
          <button onclick="closeModalUser()" class="btn btn-sm">Batal</button>
          <button onclick="submitSaveUser()" class="btn btn-pri btn-sm"><i class="fas fa-floppy-disk"></i> Simpan
            Perubahan</button>
        </div>
      </div>
    </div>

    <!-- ==================== COMMAND PALETTE ==================== -->
    <div id="palette" class="palette hidden" onclick="if(event.target===this)closePalette()">
      <div class="palette-card">
        <div class="palette-inp">
          <i class="fas fa-magnifying-glass" style="color:var(--muted);"></i>
          <input type="text" id="paletteInput" placeholder="Ketik untuk mencari menu, user, ref ID, atau produk…"
            oninput="renderPalette()" autocomplete="off">
          <kbd class="mono"
            style="font-size:.58rem;color:var(--muted);border:1px solid var(--border-2);padding:.1rem .3rem;border-radius:.3rem;">ESC</kbd>
        </div>
        <div class="palette-list" id="paletteList"></div>
      </div>
    </div>

    <!-- ==================== TOAST ==================== -->
    <div class="toast-wrap" id="toastWrap"></div>

    <style>
    @media (max-width: 1180px) {
      .dash-analytics { grid-template-columns: 1fr !important; }
      .settings-grid { grid-template-columns: 1fr !important; }
      .promo-grid { grid-template-columns: 1fr !important; }
      #topupQueueCardsContainer { grid-template-columns: repeat(2, minmax(0,1fr)) !important; }
    }
    @media (max-width: 640px) {
      #topupQueueCardsContainer { grid-template-columns: 1fr !important; }
      .tb-title p { display: none; }
    }
    </style>

    <script>
    /* ========================================================================
       PAYNUSA CONTROL CENTER — APP LOGIC v2
       Semua endpoint & alur bisnis dipertahankan dari versi sebelumnya.
       ===================================================================== */
    let currentAdmin = null;
    const SEC_KEY = CryptoJS.enc.Utf8.parse('P@yNus4_S3cUr3_2026_AES_KEY_!@#$');
    
    function encData(data) {
      data._ts = Date.now();
      const iv = CryptoJS.lib.WordArray.random(16);
      const encrypted = CryptoJS.AES.encrypt(JSON.stringify(data), SEC_KEY, { iv: iv, mode: CryptoJS.mode.CBC, padding: CryptoJS.pad.Pkcs7 });
      return CryptoJS.enc.Base64.stringify(iv.concat(encrypted.ciphertext));
    }
    function decData(payload) {
      const data = CryptoJS.enc.Base64.parse(payload);
      const iv = CryptoJS.lib.WordArray.create(data.words.slice(0, 4));
      const ciphertext = CryptoJS.lib.WordArray.create(data.words.slice(4));
      const decrypted = CryptoJS.AES.decrypt({ ciphertext: ciphertext }, SEC_KEY, { iv: iv, mode: CryptoJS.mode.CBC, padding: CryptoJS.pad.Pkcs7 });
      return JSON.parse(decrypted.toString(CryptoJS.enc.Utf8));
    }
    async function secureFetch(url, payload = {}) {
      const res = await fetch(url, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json', 'X-Requested-With': 'XMLHttpRequest', 'X-Secure-Req': 'true' },
        body: JSON.stringify({ payload: encData(payload) })
      });
      const text = await res.text();
      try {
        const json = JSON.parse(text);
        if (json.enc_data) return decData(json.enc_data);
        return json;
      } catch (e) { return { status: false, message: "Secure fetch error" }; }
    }
    
    let usersData = [];
    let allTxData = [];
    let siteSettings = {};
    let currentPageUsers = 1;
    let currentPageTx = 1;
    let currentPageRefund = 1;
    const ITEMS_PER_PAGE = 40;
    
    const rp = (n) => "Rp" + Math.round(n || 0).toLocaleString("id-ID");
    const esc = (s) => String(s === null || s === undefined ? '' : s).replace(/[&<>"']/g, c => ({ '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;' }[c]));
    const fmtDate = (d) => d ? new Date(d).toLocaleString('id-ID', { day: '2-digit', month: 'short', year: 'numeric', hour: '2-digit', minute: '2-digit' }) : '-';
    const $ = (id) => document.getElementById(id);
    const setTxt = (id, v) => { const el = $(id); if (el) el.textContent = v; };
    const emptyRow = (span, text, icon) => `<tr><td colspan="${span}" class="tbl-empty"><i class="fas ${icon || 'fa-inbox'}"></i>${esc(text)}</td></tr>`;
    
    /* ---------------- Toast (pengganti alert) ---------------- */
    function toast(message, type = 'info', title) {
      const wrap = $('toastWrap');
      if (!wrap) { if (type === 'err') alert(message); return; }
      const conf = {
        ok: { i: 'fa-circle-check', t: title || 'Berhasil' },
        err: { i: 'fa-circle-xmark', t: title || 'Gagal' },
        warn: { i: 'fa-triangle-exclamation', t: title || 'Perhatian' },
        info: { i: 'fa-circle-info', t: title || 'Informasi' }
      }[type] || { i: 'fa-circle-info', t: title || 'Informasi' };
      const el = document.createElement('div');
      el.className = 'toast ' + type;
      el.innerHTML = `<i class="fas ${conf.i} ti"></i><div style="flex:1;"><b>${esc(conf.t)}</b><p>${esc(message)}</p></div>`;
      wrap.appendChild(el);
      setTimeout(() => { el.classList.add('out'); setTimeout(() => el.remove(), 220); }, 4200);
    }
    const okMsg = (m) => toast(m, 'ok');
    const errMsg = (m) => toast(m, 'err');
    
    /* ---------------- Tema, Skala UI, Sidebar, Jam ---------------- */
    function applyTheme(t) {
      document.documentElement.setAttribute('data-theme', t);
      const b = $('btnTheme');
      if (b) b.innerHTML = t === 'dark' ? '<i class="fas fa-sun"></i>' : '<i class="fas fa-moon"></i>';
      try { localStorage.setItem('pn_theme', t); } catch (e) {}
    }
    function toggleTheme() {
      applyTheme(document.documentElement.getAttribute('data-theme') === 'dark' ? 'light' : 'dark');
    }
    function applyUiScale(v) {
      document.documentElement.style.setProperty('--ui-scale', v);
      try { localStorage.setItem('pn_scale', v); } catch (e) {}
    }
    function setUiScale(v) { applyUiScale(v); }
    function toggleSidebarCollapse() {
      document.body.classList.toggle('sb-collapsed');
      try { localStorage.setItem('pn_sbcollapsed', document.body.classList.contains('sb-collapsed') ? '1' : '0'); } catch (e) {}
    }
    function startClock() {
      const tick = () => {
        const el = $('liveClock');
        if (el) el.innerHTML = '<i class="far fa-clock"></i> ' + new Date().toLocaleTimeString('id-ID', { hour12: false });
      };
      tick(); setInterval(tick, 1000);
    }
    let autoRefreshTimer = null;
    function toggleAutoRefresh() {
      const btn = $('btnAutoRefresh');
      if (autoRefreshTimer) {
        clearInterval(autoRefreshTimer); autoRefreshTimer = null;
        if (btn) btn.classList.remove('on');
        toast('Auto refresh dimatikan.', 'info');
      } else {
        autoRefreshTimer = setInterval(() => { if (currentAdmin) fetchTransactions(); }, 30000);
        if (btn) btn.classList.add('on');
        toast('Data akan dimuat ulang otomatis tiap 30 detik.', 'ok');
      }
    }
    
    /* ---------------- Login / Logout ---------------- */
    function togglePassVis(btn) {
      const inp = $('admPass');
      const show = inp.type === 'password';
      inp.type = show ? 'text' : 'password';
      btn.innerHTML = show ? '<i class="fas fa-eye-slash"></i>' : '<i class="fas fa-eye"></i>';
    }
    
    async function doAdminLogin(e) {
      e.preventDefault();
      const phone = $("admPhone").value;
      const pass = $("admPass").value;
      const btn = $('loginBtn');
      if (btn) { btn.disabled = true; btn.innerHTML = '<i class="fas fa-circle-notch spin"></i> <span>MEMVERIFIKASI…</span>'; }
      try {
        const data = await secureFetch("manager.php?action=login", { phone, password: pass });
        if (data.status && data.data) {
          if (data.data.jenis_akun === "admin") {
            currentAdmin = data.data;
            $("loginView").classList.add("hidden");
            $("adminView").classList.remove("hidden");
            const label = currentAdmin.user.name + " (" + currentAdmin.user.phone + ")";
            setTxt("admProfileName", label);
            setTxt("admFootName", currentAdmin.user.name || 'Administrator');
            const av = $('admAvatar');
            if (av) av.textContent = (currentAdmin.user.name || 'AD').trim().split(/\s+/).map(w => w[0]).slice(0, 2).join('').toUpperCase();
            initAdminDashboard();
          } else {
            errMsg("Akses ditolak! Akun Anda bukan akun Admin.");
          }
        } else {
          errMsg(data.message || "Login gagal");
        }
      } catch (err) {
        errMsg("Gagal terhubung ke server manager.php");
      } finally {
        if (btn) { btn.disabled = false; btn.innerHTML = '<span>MASUK KE PANEL</span> <i class="fas fa-arrow-right"></i>'; }
      }
    }
    
    function logoutAdmin() {
      if (!confirm("Keluar dari panel admin?")) return;
      currentAdmin = null;
      if (autoRefreshTimer) { clearInterval(autoRefreshTimer); autoRefreshTimer = null; }
      $("adminView").classList.add("hidden");
      $("loginView").classList.remove("hidden");
      $("admPass").value = '';
    }
    
    function toggleSidebar() {
      const sb = $('sidebar');
      const overlay = $('mobileOverlay');
      const closeBtn = $('closeSidebar');
      sb.classList.toggle('active');
      overlay.classList.toggle('active');
      if (window.innerWidth <= 768) {
        closeBtn.classList.toggle('hidden', !sb.classList.contains('active'));
      }
    }
    
    const TAB_LIST = ["dashboard", "users", "promo", "settings", "tx", "topup_queue", "refund_audit", "markup", "landing", "doniguard", "livechat"];
    const TAB_META = {
      dashboard: { t: "PayNusa Admin Center", s: "Ringkasan operasional PPOB hari ini", i: "fa-chart-pie" },
      tx: { t: "Semua Transaksi", s: "Riwayat lengkap transaksi seluruh pengguna", i: "fa-receipt" },
      topup_queue: { t: "Antrian Top Up", s: "Verifikasi pembayaran masuk dari pengguna", i: "fa-wallet" },
      refund_audit: { t: "Audit Refund", s: "Log pengembalian saldo transaksi gagal", i: "fa-rotate-left" },
      users: { t: "Control Users", s: "Kelola data, saldo, dan hak akses pengguna", i: "fa-users" },
      markup: { t: "Markup Produk", s: "Atur selisih harga jual per produk", i: "fa-tags" },
      promo: { t: "Promo & Voucher", s: "Banner promosi dan kode voucher", i: "fa-gift" },
      landing: { t: "Landing Page", s: "Konten halaman depan aplikasi", i: "fa-desktop" },
      livechat: { t: "Public Live Chat", s: "Kelola obrolan publik & kirim fake chat", i: "fa-comments" },
      settings: { t: "Pengaturan Utama", s: "Identitas aplikasi & kanal pembayaran", i: "fa-sliders" },
      doniguard: { t: "Doniguard", s: "Jejak audit mutasi saldo pengguna", i: "fa-shield-halved" }
    };
    
    function switchTab(name) {
      TAB_LIST.forEach(t => {
        const sec = $("sec-" + t); if (sec) sec.classList.remove("active");
        const tab = $("tab-" + t); if (tab) tab.classList.remove("active");
      });
      const targetSec = $("sec-" + name); if (targetSec) targetSec.classList.add("active");
      const targetTab = $("tab-" + name); if (targetTab) targetTab.classList.add("active");
    
      const meta = TAB_META[name] || TAB_META.dashboard;
      const siteName = (siteSettings && siteSettings.site_name) ? siteSettings.site_name : "PayNusa";
      setTxt("admHeaderTitle", name === 'dashboard' ? siteName + " Admin Center" : meta.t);
      setTxt("admHeaderSub", meta.s);
    
      if (name === 'tx' || name === 'dashboard') fetchTransactions();
      if (name === 'livechat') fetchLiveChatAdmin();
      if (window.innerWidth <= 768) {
        $('sidebar').classList.remove('active');
        $('mobileOverlay').classList.remove('active');
        $('closeSidebar').classList.add('hidden');
      }
      const cb = $('contentBody'); if (cb) cb.scrollTop = 0;
    }
    
    /* ---------------- Command Palette (Ctrl+K) ---------------- */
    let paletteItems = [];
    let paletteSel = 0;
    function buildPaletteItems() {
      const items = TAB_LIST.map(t => ({ g: 'Menu', i: TAB_META[t].i, label: TAB_META[t].t, hint: 'Buka halaman', run: () => switchTab(t) }));
      items.push({ g: 'Aksi', i: 'fa-arrows-rotate', label: 'Muat ulang semua data', hint: 'Refresh', run: () => initAdminDashboard() });
      items.push({ g: 'Aksi', i: 'fa-moon', label: 'Ganti mode gelap / terang', hint: 'Tema', run: () => toggleTheme() });
      items.push({ g: 'Aksi', i: 'fa-file-csv', label: 'Ekspor transaksi ke CSV', hint: 'Unduh', run: () => exportTxCSV() });
      items.push({ g: 'Aksi', i: 'fa-right-from-bracket', label: 'Keluar dari panel', hint: 'Logout', run: () => logoutAdmin() });
    
      usersData.slice(0, 60).forEach(u => {
        items.push({ g: 'Pengguna', i: 'fa-user', label: (u.user?.name || '-') + ' — ' + (u.user?.phone || u.uid), hint: rp(u.balance), run: () => { switchTab('users'); openEditUser(u.uid); } });
      });
      allTxData.slice(0, 80).forEach(t => {
        items.push({ g: 'Transaksi', i: 'fa-receipt', label: t.ref + ' — ' + (t.product || '-'), hint: rp(t.total), run: () => { switchTab('tx'); openTxDetailAdmin(t.ref); } });
      });
      return items;
    }
    function openPalette() {
      paletteItems = buildPaletteItems();
      paletteSel = 0;
      $('palette').classList.remove('hidden');
      const inp = $('paletteInput');
      inp.value = '';
      renderPalette();
      setTimeout(() => inp.focus(), 30);
    }
    function closePalette() { $('palette').classList.add('hidden'); }
    function renderPalette() {
      const q = $('paletteInput').value.toLowerCase().trim();
      const list = q ? paletteItems.filter(it => (it.label + ' ' + it.g).toLowerCase().includes(q)) : paletteItems;
      const shown = list.slice(0, 40);
      if (paletteSel >= shown.length) paletteSel = 0;
      const box = $('paletteList');
      if (!shown.length) { box.innerHTML = '<div class="palette-empty"><i class="fas fa-magnifying-glass"></i> Tidak ada hasil untuk “' + esc(q) + '”</div>'; box._items = []; return; }
      box._items = shown;
      let lastG = '';
      box.innerHTML = shown.map((it, i) => {
        const head = it.g !== lastG ? `<div class="palette-group">${esc(it.g)}</div>` : '';
        lastG = it.g;
        return head + `<div class="palette-item ${i === paletteSel ? 'sel' : ''}" onmouseenter="paletteSel=${i};renderPaletteSel()" onclick="runPalette(${i})"><i class="fas ${it.i}"></i><span style="overflow:hidden;text-overflow:ellipsis;white-space:nowrap;">${esc(it.label)}</span><small>${esc(it.hint || '')}</small></div>`;
      }).join('');
    }
    function renderPaletteSel() {
      const box = $('paletteList');
      [...box.querySelectorAll('.palette-item')].forEach((el, i) => el.classList.toggle('sel', i === paletteSel));
    }
    function runPalette(i) {
      const box = $('paletteList');
      const it = (box._items || [])[i];
      if (!it) return;
      closePalette();
      it.run();
    }
    
    document.addEventListener('keydown', (e) => {
      if ((e.ctrlKey || e.metaKey) && e.key.toLowerCase() === 'k') { e.preventDefault(); if (currentAdmin) openPalette(); return; }
      if (e.key === 'Escape') {
        if (!$('palette').classList.contains('hidden')) { closePalette(); return; }
        ['modalTxDetail', 'modalUser', 'modalUserHistory'].forEach(id => { if (!$(id).classList.contains('hidden')) $(id).classList.add('hidden'); });
        return;
      }
      if (!$('palette').classList.contains('hidden')) {
        const box = $('paletteList');
        const n = (box._items || []).length;
        if (e.key === 'ArrowDown') { e.preventDefault(); paletteSel = (paletteSel + 1) % n; renderPaletteSel(); }
        if (e.key === 'ArrowUp') { e.preventDefault(); paletteSel = (paletteSel - 1 + n) % n; renderPaletteSel(); }
        if (e.key === 'Enter') { e.preventDefault(); runPalette(paletteSel); }
      }
    });
    
    /* ========================================================================
       MARKUP PRODUK
       ===================================================================== */
    let GLOBAL_MARKUP = {};
    let RAW_PRODUCTS = [];
    const MARKUP_SERVICES = [
      { id: 'pulsa', name: 'PULSA', provs: ["Telkomsel", "Indosat", "XL", "Axis", "Tri", "Smartfren", "By.U"] },
      { id: 'data', name: 'PAKET DATA', provs: ["Telkomsel", "Indosat", "XL", "Axis", "Tri", "Smartfren", "By.U"] },
      { id: 'pln', name: 'TOKEN PLN', provs: [] },
      { id: 'emoney', name: 'E-MONEY', provs: ["DANA", "OVO", "GoPay", "ShopeePay", "LinkAja", "iSaku", "Grab", "Maxim"] },
      { id: 'game', name: 'GAME', provs: ["Mobile Legends", "Free Fire", "PUBG", "Call of Duty", "Honor of Kings", "Roblox", "Razer Gold", "Unipin", "Google Play", "Steam", "AOV"] },
      { id: 'tf_bebas', name: 'TF BEBAS', provs: ["DANA", "GoPay", "ShopeePay", "OVO", "LinkAja", "iSaku", "AstraPay", "Doku", "KasPro"] },
      { id: 'xl_akrab', name: 'XL AKRAB', provs: [] },
      { id: 'all', name: 'SEMUA / LAINNYA', provs: [] }
    ];
    let curMarkupSvc = 'pulsa';
    let curMarkupProv = 'Telkomsel';
    let markupDirty = false;
    
    function renderMarkupFilters() {
      const catContainer = $('markupFilterCats');
      if (catContainer) {
        catContainer.innerHTML = MARKUP_SERVICES.map(s =>
          `<button onclick="setMarkupSvc('${s.id}')" class="chip ${curMarkupSvc === s.id ? 'active' : ''}">${esc(s.name)}</button>`
        ).join('');
      }
      const provContainer = $('markupFilterProvs');
      if (provContainer) {
        const svc = MARKUP_SERVICES.find(x => x.id === curMarkupSvc);
        if (svc && svc.provs && svc.provs.length > 0) {
          provContainer.style.display = 'flex';
          if (!svc.provs.includes(curMarkupProv)) curMarkupProv = svc.provs[0];
          provContainer.innerHTML = svc.provs.map(p =>
            `<button onclick="setMarkupProv('${esc(p)}')" class="chip alt ${curMarkupProv === p ? 'active' : ''}">${esc(p)}</button>`
          ).join('');
        } else {
          provContainer.style.display = 'none';
          curMarkupProv = '';
        }
      }
      loadMarkupTable();
    }
    function setMarkupSvc(id) { curMarkupSvc = id; renderMarkupFilters(); }
    function setMarkupProv(p) { curMarkupProv = p; renderMarkupFilters(); }
    
    async function loadMarkupData() {
      try {
        let r1 = await fetch('markup.php?action=get_admin');
        let j = await r1.json();
        GLOBAL_MARKUP = Array.isArray(j) ? {} : (j || {});
      } catch (e) { GLOBAL_MARKUP = {}; }
      try {
        let d = await secureFetch('api/api4.php?action=list');
        let arr = d.data || d.produk || d.products || d.result || d;
        if (!Array.isArray(arr) && typeof arr === 'object') {
          arr = Object.values(arr).filter(v => v && typeof v === 'object' && (v.kode || v.code));
        }
        RAW_PRODUCTS = (Array.isArray(arr) ? arr : []).map(p => ({
          kode: p.kode || p.code,
          nama: p.nama || p.name,
          harga: p.harga || p.price,
          filter: p.filter || p.kategori || 'LAINNYA'
        }));
        RAW_PRODUCTS.unshift({
          kode: 'XL_AKRAB_GLOBAL',
          nama: 'MARKUP GLOBAL XL AKRAB (Semua Produk)',
          harga: 0,
          filter: 'XL AKRAB'
        });
      } catch (e) { RAW_PRODUCTS = []; }
      markupDirty = false;
      const di = $('markupDirtyInfo'); if (di) di.style.display = 'none';
    }
    
    function calcMarkupAdd(mk, hargaAsli) {
      const as = Number(hargaAsli) || 0;
      return String(mk).includes('%') ? Math.round(as * parseFloat(mk) / 100) : parseInt(mk) || 0;
    }
    
    function updateMarkupRow(el, kode, hargaAsli) {
      GLOBAL_MARKUP[kode] = el.value;
      const ad = calcMarkupAdd(el.value || '0', hargaAsli);
      const row = el.closest('tr');
      if (row) row.querySelector('.final-price').textContent = 'Rp' + ((Number(hargaAsli) || 0) + ad).toLocaleString('id-ID');
      markupDirty = true;
      const di = $('markupDirtyInfo'); if (di) di.style.display = 'inline-flex';
    }
    
    function getMarkupFiltered() {
      let filtered = RAW_PRODUCTS || [];
      if (curMarkupSvc === 'xl_akrab') {
        filtered = filtered.filter(p => p.kode === 'XL_AKRAB_GLOBAL' || p.kode.toUpperCase().startsWith('XLA') || p.kode.toUpperCase().startsWith('FMX') || p.kode.toUpperCase().startsWith('KDA') || p.kode.toUpperCase().startsWith('XDA'));
      } else if (curMarkupSvc !== 'all') {
        filtered = filtered.filter(p => {
          if (p.kode === 'XL_AKRAB_GLOBAL') return false;
          const f = (p.filter || "").toLowerCase();
          const sf = (p.subfilter || "").toLowerCase();
          const nm = (p.nama || "").toLowerCase();
          const cd = (p.kode || "").toLowerCase();
          const targetKey = curMarkupProv.toLowerCase();
    
          if (curMarkupSvc === 'pulsa') {
            if (!f.includes("pulsa")) return false;
            if (!targetKey) return true;
            if (targetKey.includes("telkomsel")) return (sf.includes("telkomsel") || nm.includes("telkomsel") || sf.includes("tsel")) && !sf.includes("byu") && !nm.includes("by u") && !nm.includes("byu");
            if (targetKey.includes("indosat")) return sf.includes("indosat") || nm.includes("indosat") || sf.includes("isat");
            if (targetKey.includes("xl")) return sf.includes("xl") || nm.includes("xl");
            if (targetKey.includes("axis")) return sf.includes("axis") || nm.includes("axis");
            if (targetKey.includes("tri")) return sf.includes("tri") || nm.includes("three") || nm.includes("tri");
            if (targetKey.includes("smart")) return sf.includes("smart") || sf.includes("fren") || nm.includes("smartfren");
            if (targetKey.includes("by.u") || targetKey.includes("byu")) return sf.includes("byu") || nm.includes("by u") || nm.includes("byu") || cd.startsWith("byu");
            return sf.includes(targetKey) || nm.includes(targetKey);
          }
          if (curMarkupSvc === 'data') {
            if (!(f.includes("kuota") || f.includes("data") || f.includes("bulk"))) return false;
            if (!targetKey) return true;
            if (targetKey.includes("telkomsel")) return (f.includes("telkomsel") || sf.includes("telkomsel") || nm.includes("telkomsel") || nm.includes("tsel"));
            if (targetKey.includes("indosat")) return f.includes("indosat") || sf.includes("indosat") || nm.includes("indosat") || nm.includes("isat");
            if (targetKey.includes("xl")) return f.includes("xl") || sf.includes("xl") || nm.includes("xl");
            if (targetKey.includes("axis")) return f.includes("axis") || sf.includes("axis") || nm.includes("axis");
            if (targetKey.includes("tri")) return f.includes("tri") || sf.includes("tri") || nm.includes("three") || nm.includes("tri");
            if (targetKey.includes("smart")) return f.includes("smart") || sf.includes("smart") || nm.includes("smartfren");
            if (targetKey.includes("by.u") || targetKey.includes("byu")) return f.includes("byu") || sf.includes("byu") || nm.includes("by u") || nm.includes("byu");
            return f.includes(targetKey) || sf.includes(targetKey) || nm.includes(targetKey);
          }
          if (curMarkupSvc === 'pln') {
            return f.includes("token pln") || nm.includes("token pln");
          }
          if (curMarkupSvc === 'emoney') {
            if (!(f.includes("dompet digital") || f.includes("nominal bebas"))) return false;
            if (!targetKey) return true;
            if (targetKey.includes("gopay")) return sf.includes("gopay") || nm.includes("gopay");
            if (targetKey.includes("ovo")) return sf.includes("ovo") || nm.includes("ovo");
            if (targetKey.includes("dana")) return sf.includes("dana") || nm.includes("dana");
            if (targetKey.includes("shopee")) return sf.includes("shopeepay") || nm.includes("shopee");
            if (targetKey.includes("linkaja")) return sf.includes("linkaja") || nm.includes("link");
            if (targetKey.includes("isaku")) return sf.includes("isaku") || nm.includes("isaku");
            if (targetKey.includes("grab")) return sf.includes("grab") || nm.includes("grab");
            if (targetKey.includes("maxim")) return sf.includes("maxim") || nm.includes("maxim");
            return sf.includes(targetKey) || nm.includes(targetKey);
          }
          if (curMarkupSvc === 'tf_bebas') {
            if (!f.includes("nominal bebas")) return false;
            if (!targetKey) return true;
            if (targetKey.includes("dana")) return sf.includes("dana") || nm.includes("dana");
            if (targetKey.includes("gopay")) return sf.includes("gopay") || nm.includes("gopay");
            if (targetKey.includes("shopee")) return sf.includes("shopeepay") || sf.includes("shopee") || nm.includes("shopee");
            if (targetKey.includes("ovo")) return sf.includes("ovo") || nm.includes("ovo");
            if (targetKey.includes("link")) return sf.includes("link") || nm.includes("link");
            if (targetKey.includes("isaku")) return sf.includes("isaku") || nm.includes("isaku");
            if (targetKey.includes("astra")) return sf.includes("astrapay") || nm.includes("astrapay");
            if (targetKey.includes("doku")) return sf.includes("doku") || nm.includes("doku");
            if (targetKey.includes("kaspro")) return sf.includes("kaspro") || nm.includes("kaspro");
            return sf.includes(targetKey) || nm.includes(targetKey);
          }
          if (curMarkupSvc === 'game') {
            if (!targetKey) return f.includes("digital");
            if (targetKey.includes("mobile legends") || targetKey.includes("ml")) return sf.includes("mobile legends") || nm.includes("mobile legend");
            if (targetKey.includes("free fire") || targetKey.includes("ff")) return sf.includes("free fire") || nm.includes("free fire");
            if (targetKey.includes("pubg")) return sf.includes("pubg") || nm.includes("pubg");
            if (targetKey.includes("call of duty") || targetKey.includes("cod")) return sf.includes("call of duty") || nm.includes("cod");
            if (targetKey.includes("honor of kings") || targetKey.includes("hok")) return sf.includes("honor of king");
            if (targetKey.includes("roblox")) return sf.includes("roblox") || nm.includes("roblox");
            if (targetKey.includes("razer")) return sf.includes("razer") || nm.includes("razer");
            if (targetKey.includes("unipin")) return sf.includes("unipin") || nm.includes("unipin");
            if (targetKey.includes("google")) return sf.includes("google") || nm.includes("google");
            if (targetKey.includes("steam")) return sf.includes("steam") || nm.includes("steam");
            if (targetKey.includes("aov")) return sf.includes("aov") || nm.includes("aov");
            return sf.includes(targetKey) || nm.includes(targetKey);
          }
          return false;
        });
      }
      const q = (($('markupSearch') && $('markupSearch').value) || '').toLowerCase().trim();
      if (q) filtered = filtered.filter(p => (p.nama || '').toLowerCase().includes(q) || (p.kode || '').toLowerCase().includes(q));
      return filtered;
    }
    
    function loadMarkupTable() {
      const filtered = getMarkupFiltered();
      const tb = $('markupTableBody');
      if (!tb) return;
      setTxt('markupCountInfo', filtered.length + ' produk');
      tb.innerHTML = filtered.map(p => {
        let mk = GLOBAL_MARKUP[p.kode] || (p.kode === 'XL_AKRAB_GLOBAL' ? '250' : '0');
        let as = Number(p.harga) || 0;
        let ad = calcMarkupAdd(mk, as);
        return `<tr>
          <td><input type="checkbox" class="chk-markup" data-kode="${esc(p.kode)}" style="width:.85rem;height:.85rem;accent-color:var(--pri);"></td>
          <td><span class="badge b-mute">${esc(p.filter || '-')}</span></td>
          <td><div class="cell-strong">${esc(p.nama)}</div><div class="cell-sub mono">${esc(p.kode)}</div></td>
          <td>Rp${as.toLocaleString('id-ID')}</td>
          <td><input type="text" class="inp" style="height:1.6rem;font-size:.68rem;width:6rem;" value="${esc(mk)}" oninput="updateMarkupRow(this, '${esc(p.kode)}', ${as})"></td>
          <td class="cell-money final-price">Rp${(as + ad).toLocaleString('id-ID')}</td>
        </tr>`;
      }).join('') || emptyRow(6, 'Tidak ada produk pada filter ini', 'fa-box-open');
      const chk = $('chkAllMarkup'); if (chk) chk.checked = false;
    }
    
    function toggleAllMarkup(checked) {
      document.querySelectorAll('.chk-markup').forEach(el => el.checked = checked);
    }
    function clearMarkupSelection() {
      document.querySelectorAll('.chk-markup').forEach(el => el.checked = false);
      const chk = $('chkAllMarkup'); if (chk) chk.checked = false;
    }
    
    function applyMassMarkup() {
      const val = $('massMarkupInp').value;
      if (!val) return toast("Masukkan nilai markup terlebih dahulu.", 'warn');
      const sel = document.querySelectorAll('.chk-markup:checked');
      if (!sel.length) return toast("Belum ada produk yang dicentang.", 'warn');
      sel.forEach(el => { GLOBAL_MARKUP[el.dataset.kode] = val; });
      markupDirty = true;
      const di = $('markupDirtyInfo'); if (di) di.style.display = 'inline-flex';
      loadMarkupTable();
      toast(sel.length + ' produk ditandai dengan markup ' + val + '. Jangan lupa disimpan.', 'ok');
    }
    
    async function saveAdminMarkup() {
      const btn = $('btnSaveMarkup');
      if (btn) { btn.disabled = true; btn.innerHTML = '<i class="fas fa-circle-notch spin"></i> MENYIMPAN…'; }
      try {
        const res = await fetch('markup.php?action=save_admin', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify(GLOBAL_MARKUP)
        });
        const d = await res.json();
        okMsg(d.message || "Markup berhasil disimpan ke server!");
        markupDirty = false;
        const di = $('markupDirtyInfo'); if (di) di.style.display = 'none';
      } catch (e) { errMsg('Gagal menyimpan markup ke server.'); }
      finally { if (btn) { btn.disabled = false; btn.innerHTML = '<i class="fas fa-floppy-disk"></i> SIMPAN PERUBAHAN'; } }
    }
    
    /* ========================================================================
       DATA LOADER
       ===================================================================== */
    async function initAdminDashboard() {
      await fetchUsers();
      await fetchTransactions();
      await fetchSettings();
      await loadMarkupData();
      await loadLandingAdmin();
      await fetchDoniguard();
      renderMarkupFilters();
      renderStats();
    }
    
    async function fetchUsers() {
      try {
        const data = await secureFetch("manager.php?action=list_users");
        if (data.status) {
          const rawUsers = data.users || [];
          const uniqueUsers = [];
          const seenPhones = new Set();
          for (const u of rawUsers) {
            const phone = String(u.user?.phone || u.phone || u.uid || "");
            if (phone && seenPhones.has(phone)) continue;
            if (phone) seenPhones.add(phone);
            uniqueUsers.push(u);
          }
          usersData = uniqueUsers;
          renderUsersTable();
          if (typeof populateDgUsers === 'function') populateDgUsers();
        }
      } catch (e) {}
    }
    
    async function fetchTransactions() {
      try {
        const data = await secureFetch("manager.php?action=list_all_tx");
        if (data.status) {
          allTxData = data.transactions || [];
          renderDashTxTable();
          renderAllTxTable();
          renderTopupQueueCards();
          renderRefundAuditTable();
          renderCharts();
          renderStats();
          const lb = $('lastSyncBadge');
          if (lb) lb.innerHTML = '<i class="fas fa-clock-rotate-left"></i> Sinkron ' + new Date().toLocaleTimeString('id-ID', { hour12: false });
        }
      } catch (e) {}
    }
    
    async function fetchSettings() {
      try {
        const data = await secureFetch("seting.php");
        if (data.status && data.settings) {
          siteSettings = data.settings;
          if (siteSettings.site_name) setTxt("admHeaderTitle", siteSettings.site_name + " Admin Center");
          renderSettingsForm();
        }
      } catch (e) {}
    }
    
    function renderStats() {
      setTxt("statTotalUsers", usersData.length);
      const totalBal = usersData.reduce((acc, u) => acc + (u.balance || 0), 0);
      setTxt("statTotalBalance", rp(totalBal));
      setTxt("statTotalTx", allTxData.length);
      const vol = allTxData.filter(t => t.status === "success").reduce((acc, t) => acc + (t.total || 0), 0);
      setTxt("statVolumeTx", rp(vol));
    
      /* indikator tambahan */
      setTxt("statAdminCount", usersData.filter(u => u.jenis_akun === 'admin').length + " admin");
      const pending = allTxData.filter(t => t.status === 'pending').length;
      setTxt("statPendingTx", pending + " pending");
      const rate = allTxData.length ? Math.round((allTxData.filter(t => t.status === 'success').length / allTxData.length) * 100) : 0;
      setTxt("statSuccessRate", rate + "% sukses");
      setTxt("txCountInfo", allTxData.length + " transaksi");
    
      const badge = $('badgeTopup'), dot = $('bellDot');
      const q = countPendingTopups();
      if (badge) { badge.textContent = q; badge.classList.toggle('hidden', q === 0); }
      if (dot) { dot.textContent = q; dot.classList.toggle('hidden', q === 0); }
    }
    
    const countPendingTopups = () => allTxData.filter(t => (t.sid === 'topup' || (t.product || '').toLowerCase().includes('top up')) && t.status === 'pending').length;
    
    const statusBadge = (s) => {
      const v = String(s || '').toLowerCase();
      if (v === 'success') return '<span class="badge b-ok"><span class="pill-dot"></span>SUCCESS</span>';
      if (v === 'pending') return '<span class="badge b-warn"><span class="pill-dot"></span>PENDING</span>';
      return '<span class="badge b-bad"><span class="pill-dot"></span>' + esc(String(s || 'failed').toUpperCase()) + '</span>';
    };
    
    function renderDashTxTable() {
      const tb = $("dashTxTable");
      if (!tb) return;
      tb.innerHTML = allTxData.slice(0, 5).map(t => `
        <tr>
          <td><span class="cell-mono">${esc(t.ref)}</span></td>
          <td class="cell-strong">${esc(t.user_name || '-')}</td>
          <td>${esc(t.product)}</td>
          <td>${esc(t.customer)}</td>
          <td class="cell-money">${rp(t.total)}</td>
          <td>${statusBadge(t.status)}${t.refund_status === 'DONE' ? ' <span class="badge b-ok">REFUNDED</span>' : ''}</td>
          <td><button onclick="openTxDetailAdmin('${esc(t.ref)}')" class="btn btn-xs btn-soft">Detail</button></td>
        </tr>
      `).join('') || emptyRow(7, 'Belum ada transaksi', 'fa-receipt');
    }
    
    /* ---------------- Mini Analytics ---------------- */
    function renderCharts() {
      const box = $('chart7d');
      if (box) {
        const days = [];
        for (let i = 6; i >= 0; i--) {
          const d = new Date(); d.setHours(0, 0, 0, 0); d.setDate(d.getDate() - i);
          days.push({ key: d.toDateString(), label: d.toLocaleDateString('id-ID', { weekday: 'short' }), total: 0, count: 0 });
        }
        const idx = {};
        days.forEach((d, i) => idx[d.key] = i);
        allTxData.forEach(t => {
          if (t.status !== 'success' || !t.date) return;
          const d = new Date(t.date); d.setHours(0, 0, 0, 0);
          const k = d.toDateString();
          if (idx[k] !== undefined) { days[idx[k]].total += (t.total || 0); days[idx[k]].count++; }
        });
        const max = Math.max(1, ...days.map(d => d.total));
        box.innerHTML = days.map(d => `
          <div class="bar-col" title="${d.label}: ${rp(d.total)} (${d.count} transaksi)">
            <div class="bar" style="height:${Math.max(2, Math.round((d.total / max) * 100))}%;"></div>
            <small>${d.label}</small>
          </div>`).join('');
      }
    
      const donut = $('donutStatus'), legend = $('donutLegend');
      if (donut && legend) {
        const total = allTxData.length || 0;
        const parts = [
          { k: 'Sukses', c: '#10b981', n: allTxData.filter(t => t.status === 'success').length },
          { k: 'Pending', c: '#f59e0b', n: allTxData.filter(t => t.status === 'pending').length },
          { k: 'Gagal', c: '#f43f5e', n: allTxData.filter(t => t.status !== 'success' && t.status !== 'pending').length }
        ];
        let acc = 0;
        const stops = parts.map(p => {
          const from = total ? (acc / total) * 100 : 0; acc += p.n;
          const to = total ? (acc / total) * 100 : 0;
          return `${p.c} ${from}% ${to}%`;
        }).join(', ');
        donut.style.background = total ? `conic-gradient(${stops})` : 'var(--surface-3)';
        setTxt('donutTotal', total);
        legend.innerHTML = parts.map(p => `
          <div class="legend-row"><i style="background:${p.c};"></i>${p.k}<b>${p.n} <span class="muted" style="font-weight:600;">(${total ? Math.round(p.n / total * 100) : 0}%)</span></b></div>
        `).join('');
      }
    }
    
    /* ========================================================================
       CONTROL USERS
       ===================================================================== */
    function getFilteredUsers() {
      const q = ($('userSearch').value || '').toLowerCase();
      const role = ($('userFilterRole') && $('userFilterRole').value) || '';
      const sort = ($('userSort') && $('userSort').value) || '';
      let filtered = usersData.filter(u =>
        (u.user?.name || '').toLowerCase().includes(q) ||
        (u.user?.phone || '').includes(q) ||
        String(u.uid || '').toLowerCase().includes(q)
      );
      if (role) filtered = filtered.filter(u => (u.jenis_akun || 'member') === role);
      if (sort === 'balance_desc') filtered.sort((a, b) => (b.balance || 0) - (a.balance || 0));
      if (sort === 'balance_asc') filtered.sort((a, b) => (a.balance || 0) - (b.balance || 0));
      if (sort === 'name_asc') filtered.sort((a, b) => String(a.user?.name || '').localeCompare(String(b.user?.name || '')));
      return filtered;
    }
    
    function renderUsersTable(page = currentPageUsers) {
      currentPageUsers = page;
      const filtered = getFilteredUsers();
      setTxt("userCountInfo", filtered.length + " User");
    
      const totalPages = Math.ceil(filtered.length / ITEMS_PER_PAGE) || 1;
      if (currentPageUsers > totalPages) currentPageUsers = totalPages;
      const start = (currentPageUsers - 1) * ITEMS_PER_PAGE;
      const paginated = filtered.slice(start, start + ITEMS_PER_PAGE);
    
      const tb = $("userTableBody");
      tb.innerHTML = paginated.map(u => `
        <tr>
          <td><span class="cell-mono">${esc(u.uid)}</span></td>
          <td class="cell-strong">${esc(u.user?.name || '-')}</td>
          <td>${esc(u.user?.phone || '-')}</td>
          <td>${esc(u.user?.email || '-')}</td>
          <td>${esc(u.user?.address || '-')}</td>
          <td class="cell-money">${rp(u.balance)}</td>
          <td><span class="badge b-info">${u.points || 0}</span></td>
          <td>${u.jenis_akun === 'admin' ? '<span class="badge b-pri"><i class="fas fa-user-shield"></i> admin</span>' : '<span class="badge b-mute">member</span>'}</td>
          <td>
            <div class="row">
              <button onclick="openUserHistory('${esc(u.uid)}')" class="btn btn-xs btn-ok">Riwayat</button>
              <button onclick="openEditUser('${esc(u.uid)}')" class="btn btn-xs btn-soft">Edit</button>
              <button onclick="deleteUser('${esc(u.uid)}')" class="btn btn-xs btn-danger">Hapus</button>
            </div>
          </td>
        </tr>
      `).join('') || emptyRow(9, 'Data pengguna tidak ditemukan', 'fa-user-slash');
    
      renderPaginationControls("userPagination", currentPageUsers, totalPages, filtered.length, "renderUsersTable");
    }
    
    function openEditUser(uid) {
      const u = usersData.find(x => String(x.uid) === String(uid) || String(x.user?.phone) === String(uid));
      if (!u) return toast("Data user tidak ditemukan", 'err');
      $("editUid").value = u.uid || u.user?.uid || uid;
      $("editName").value = u.user?.name || '';
      $("editPhone").value = u.user?.phone || '';
      $("editEmail").value = u.user?.email || '';
      $("editAddress").value = u.user?.address || '';
      $("editBalance").value = u.balance || 0;
      $("editPoints").value = u.points || 0;
      $("editJenisAkun").value = u.jenis_akun || 'member';
      $("editPin").value = '';
      $("editPass").value = '';
      $("modalUser").classList.remove("hidden");
    }
    function closeModalUser() { $("modalUser").classList.add("hidden"); }
    
    function quickAdjustBalance(amount) {
      const inp = $("editBalance");
      inp.value = (parseFloat(inp.value) || 0) + amount;
      inp.focus();
    }
    
    async function submitSaveUser() {
      const uid = ($("editUid").value || "").trim();
      const name = $("editName").value;
      const phone = $("editPhone").value;
      const email = $("editEmail").value;
      const address = $("editAddress").value;
      const balance = parseFloat($("editBalance").value) || 0;
      const points = parseInt($("editPoints").value) || 0;
      const jenis_akun = $("editJenisAkun").value;
      const pin = $("editPin").value;
      const password = $("editPass").value;
    
      if (!uid || uid === "undefined" || uid === "guest") return toast("UID User tidak valid!", 'err');
    
      const uIdx = usersData.findIndex(x => String(x.uid) === String(uid));
      const saldoAwal = uIdx !== -1 ? (usersData[uIdx].balance || 0) : 0;
    
      const payloadObj = {
        uid: uid, balance: balance, points: points, jenis_akun: jenis_akun,
        user: { name: name, phone: phone, email: email, address: address }
      };
      if (pin) payloadObj.pin = pin;
      if (password) payloadObj.password = password;
    
      let success = false, responseMsg = "";
      try {
        const data = await secureFetch("manager.php?action=update_user_admin", payloadObj);
        const explicitFail = (data.status === false || data.success === false);
        if (!explicitFail) {
          responseMsg = data.message || "Saldo & Data User berhasil diperbarui!";
          success = true;
        } else {
          responseMsg = data.message || "Server menolak perubahan.";
        }
      } catch (e) { responseMsg = "Koneksi terputus"; }
    
      if (success) {
        if (saldoAwal !== balance) {
          const diff = balance - saldoAwal;
          fetch('../doniguard/doniguard.php?action=log', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ uid: uid, desc: 'Penyesuaian saldo oleh Admin', amount: Math.abs(diff), type: diff > 0 ? 'in' : 'out', saldo_awal: saldoAwal, saldo_akhir: balance })
          }).catch(e => console.error(e));
        }
    
        if (uIdx !== -1) {
          usersData[uIdx].balance = balance;
          usersData[uIdx].points = points;
          usersData[uIdx].jenis_akun = jenis_akun;
          if (!usersData[uIdx].user) usersData[uIdx].user = {};
          usersData[uIdx].user.name = name;
          usersData[uIdx].user.phone = phone;
          usersData[uIdx].user.email = email;
          usersData[uIdx].user.address = address;
          renderUsersTable();
        }
        okMsg(responseMsg || "Saldo berhasil diperbarui!");
        closeModalUser();
        await fetchUsers();
      } else {
        errMsg("Gagal menyimpan ke server: " + (responseMsg || "User tidak ditemukan di server"));
      }
    }
    
    async function deleteUser(uid) {
      if (!uid || uid === "undefined") return toast("Gagal: UID User tidak valid atau belum disinkron!", 'err');
      if (!confirm("Yakin ingin menghapus akun user ini beserta riwayatnya?")) return;
      try {
        const data = await secureFetch("manager.php?action=delete_user", { uid });
        toast(data.message || "User dihapus.", 'ok');
        initAdminDashboard();
      } catch (e) { errMsg("Gagal menghapus user."); }
    }
    
    /* ========================================================================
       RIWAYAT TRANSAKSI PER USER
       ===================================================================== */
    let currentUserHistoryUid = null;
    let currentHistoryPage = 1;
    
    function openUserHistory(uid) {
      currentUserHistoryUid = uid;
      currentHistoryPage = 1;
      const u = usersData.find(x => String(x.uid) === String(uid));
      const titleName = u ? (u.user?.name || u.user?.phone || uid) : uid;
      setTxt("historyModalSubtitle", "UID: " + uid + " | Nama: " + titleName);
      renderUserHistoryTable();
      $("modalUserHistory").classList.remove("hidden");
    }
    function closeUserHistory() {
      $("modalUserHistory").classList.add("hidden");
      currentUserHistoryUid = null;
    }
    
    function renderUserHistoryTable(page = currentHistoryPage) {
      currentHistoryPage = page;
      if (!currentUserHistoryUid) return;
      const u = usersData.find(x => String(x.uid) === String(currentUserHistoryUid));
      const uPhone = u ? String(u.user?.phone || "") : "";
      const userTx = allTxData.filter(t => String(t.uid) === String(currentUserHistoryUid) || (uPhone && String(t.user_phone) === uPhone));
    
      const totalPages = Math.ceil(userTx.length / ITEMS_PER_PAGE) || 1;
      if (currentHistoryPage > totalPages) currentHistoryPage = totalPages;
      const start = (currentHistoryPage - 1) * ITEMS_PER_PAGE;
      const paginated = userTx.slice(start, start + ITEMS_PER_PAGE);
    
      $("userHistoryTableBody").innerHTML = paginated.map(t => `
        <tr>
          <td><span class="cell-mono">${esc(t.ref)}</span></td>
          <td class="cell-sub">${fmtDate(t.date)}</td>
          <td>${esc(t.product)}</td>
          <td>${esc(t.customer)}</td>
          <td class="cell-money">${rp(t.total)}</td>
          <td>${statusBadge(t.status)}</td>
          <td>
            <div class="row" style="gap:.25rem;">
              <button onclick="openTxDetailAdmin('${esc(t.ref)}')" class="btn btn-xs btn-soft"><i class="fas fa-bolt"></i> Detail &amp; Cek</button>
              <button onclick="deleteTxAdmin('${esc(t.ref)}')" class="btn btn-xs btn-danger" title="Hapus Riwayat Transaksi ini"><i class="fas fa-trash"></i></button>
            </div>
          </td>
        </tr>
      `).join('') || emptyRow(7, 'Tidak ada riwayat transaksi', 'fa-clock-rotate-left');
    
      renderPaginationControls("userHistoryPagination", currentHistoryPage, totalPages, userTx.length, "renderUserHistoryTable");
    }
    
    /* ========================================================================
       PENGATURAN (Settings / Promo / Voucher / Bank / Metode Pembayaran)
       ===================================================================== */
    function renderSettingsForm() {
      $("confSiteName").value = siteSettings.site_name || '';
      $("appLogoPreview").src = siteSettings.app_logo ? '../' + siteSettings.app_logo : '';
      $("confAppTitle").value = siteSettings.app_title || '';
      $("confCsPhone").value = siteSettings.cs_phone || '';
      $("confCsEmail").value = siteSettings.cs_email || '';
      $("confQrisStatic").value = siteSettings.qris_static || '';
      $("confQrisName").value = siteSettings.qris_name || '';
    
      const btnQris = $("btnToggleQris");
      if (btnQris) {
        const qrisActive = siteSettings.qris_active !== false;
        btnQris.textContent = qrisActive ? "Aktif" : "Nonaktif";
        btnQris.className = qrisActive ? "btn btn-ok btn-xs" : "btn btn-xs";
      }
    
      /* Metode top up manual */
      const mtContainer = $("manualTopupListContainer");
      if (mtContainer) {
        mtContainer.innerHTML = (siteSettings.manual_topups || []).map((m, i) => `
          <div class="list-item">
            <div class="row" style="justify-content:space-between;margin-bottom:.45rem;">
              <span class="badge b-pri"><i class="fas fa-building-columns"></i> Metode Manual #${i + 1}</span>
              <div class="row">
                <button class="btn btn-xs ${m.active !== false ? 'btn-ok' : ''}" onclick="siteSettings.manual_topups[${i}].active=!siteSettings.manual_topups[${i}].active;renderSettingsForm()">${m.active !== false ? 'Aktif' : 'Nonaktif'}</button>
                <button class="btn btn-xs btn-danger" onclick="siteSettings.manual_topups.splice(${i},1);renderSettingsForm()">Hapus</button>
              </div>
            </div>
            <div style="display:flex;gap:.5rem;align-items:flex-start;">
              <div class="thumb" style="width:2.6rem;height:2.6rem;">
                ${m.logo ? `<img src="${esc(m.logo)}" style="object-fit:contain;">` : `<span class="ph">Logo</span>`}
                <input type="file" accept="image/png, image/jpeg" onchange="uploadLogoTopup(this, ${i})" title="Upload Logo">
              </div>
              <div style="flex:1;display:flex;flex-direction:column;gap:.35rem;">
                <input type="text" value="${esc(m.bank)}" onchange="siteSettings.manual_topups[${i}].bank=this.value" class="inp" style="height:1.7rem;font-size:.68rem;" placeholder="Nama Bank / E-Wallet (Cth: BCA)" />
                <input type="text" value="${esc(m.number)}" onchange="siteSettings.manual_topups[${i}].number=this.value" class="inp mono" style="height:1.7rem;font-size:.68rem;" placeholder="Nomor Rekening" />
                <input type="text" value="${esc(m.holder)}" onchange="siteSettings.manual_topups[${i}].holder=this.value" class="inp" style="height:1.7rem;font-size:.68rem;" placeholder="Atas Nama" />
              </div>
            </div>
          </div>
        `).join('') || '<div class="tbl-empty"><i class="fas fa-building-columns"></i>Belum ada metode top up manual</div>';
      }
    
      /* Banner promo */
      const prContainer = $("promoListContainer");
      if (prContainer) {
        prContainer.innerHTML = (siteSettings.promos || []).map((p, i) => `
          <div class="list-item">
            <div style="display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:.35rem;">
              <input type="text" value="${esc(p.t)}" onchange="siteSettings.promos[${i}].t=this.value" class="inp" style="height:1.7rem;font-size:.68rem;" placeholder="Judul Promo" />
              <input type="text" value="${esc(p.s)}" onchange="siteSettings.promos[${i}].s=this.value" class="inp" style="height:1.7rem;font-size:.68rem;" placeholder="Subjudul" />
            </div>
            <div class="row" style="margin-top:.35rem;">
              <input type="text" value="${esc(p.e)}" onchange="siteSettings.promos[${i}].e=this.value" class="inp" style="width:4rem;height:1.7rem;font-size:.68rem;" placeholder="Emoji" />
              <button class="btn btn-xs btn-danger" onclick="siteSettings.promos.splice(${i},1);renderSettingsForm()"><i class="fas fa-trash"></i> Hapus</button>
            </div>
          </div>
        `).join('') || '<div class="tbl-empty"><i class="fas fa-bullhorn"></i>Belum ada banner promo</div>';
      }
    
      /* Voucher */
      const vcContainer = $("voucherListContainer");
      if (vcContainer) {
        vcContainer.innerHTML = (siteSettings.vouchers || []).map((v, i) => `
          <div class="list-item">
            <div style="display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:.35rem;">
              <input type="text" value="${esc(v.code)}" onchange="siteSettings.vouchers[${i}].code=this.value" class="inp mono" style="height:1.7rem;font-size:.68rem;" placeholder="Kode Voucher" />
              <input type="text" value="${esc(v.title)}" onchange="siteSettings.vouchers[${i}].title=this.value" class="inp" style="height:1.7rem;font-size:.68rem;" placeholder="Judul Voucher" />
              <input type="number" value="${v.val}" onchange="siteSettings.vouchers[${i}].val=parseInt(this.value)" class="inp" style="height:1.7rem;font-size:.68rem;" placeholder="Nominal Potongan" />
              <input type="number" value="${v.min}" onchange="siteSettings.vouchers[${i}].min=parseInt(this.value)" class="inp" style="height:1.7rem;font-size:.68rem;" placeholder="Min. Transaksi" />
            </div>
            <div class="row" style="margin-top:.35rem;justify-content:flex-end;">
              <button class="btn btn-xs btn-danger" onclick="siteSettings.vouchers.splice(${i},1);renderSettingsForm()"><i class="fas fa-trash"></i> Hapus</button>
            </div>
          </div>
        `).join('') || '<div class="tbl-empty"><i class="fas fa-ticket"></i>Belum ada voucher aktif</div>';
      }
      setTxt('promoCountInfo', (siteSettings.promos || []).length + ' promo · ' + (siteSettings.vouchers || []).length + ' voucher');
    
      /* Rekening bank penampung */
      const bkContainer = $("bankListContainer");
      if (bkContainer) {
        bkContainer.innerHTML = (siteSettings.banks || []).map((b, i) => `
          <div class="list-item row" style="gap:.35rem;">
            <input type="text" value="${esc(b.bank)}" onchange="siteSettings.banks[${i}].bank=this.value" class="inp" style="width:6rem;height:1.7rem;font-size:.68rem;" placeholder="Bank" />
            <input type="text" value="${esc(b.number)}" onchange="siteSettings.banks[${i}].number=this.value" class="inp mono" style="flex:1;height:1.7rem;font-size:.68rem;" placeholder="No Rekening" />
            <input type="text" value="${esc(b.holder)}" onchange="siteSettings.banks[${i}].holder=this.value" class="inp" style="flex:1;height:1.7rem;font-size:.68rem;" placeholder="Atas Nama" />
            <button class="btn btn-xs btn-danger" onclick="siteSettings.banks.splice(${i},1);renderSettingsForm()"><i class="fas fa-trash"></i></button>
          </div>
        `).join('') || '<div class="tbl-empty"><i class="fas fa-piggy-bank"></i>Belum ada rekening penampung</div>';
      }
    
      /* Biaya Admin Top Up */
      const tfContainer = $("topupFeeListContainer");
      if (tfContainer) {
        tfContainer.innerHTML = (siteSettings.topup_fees || []).map((f, i) => `
          <div class="list-item">
            <div class="row" style="gap:.35rem;">
              <input type="number" value="${f.min}" onchange="siteSettings.topup_fees[${i}].min=parseInt(this.value)" class="inp" style="flex:1;height:1.7rem;font-size:.68rem;" placeholder="Min Top Up" />
              <span class="muted" style="font-size:.68rem;">-</span>
              <input type="number" value="${f.max}" onchange="siteSettings.topup_fees[${i}].max=parseInt(this.value)" class="inp" style="flex:1;height:1.7rem;font-size:.68rem;" placeholder="Max Top Up" />
            </div>
            <div class="row" style="margin-top:.35rem;">
              <input type="text" value="${esc(f.fee)}" onchange="siteSettings.topup_fees[${i}].fee=this.value" class="inp" style="flex:1;height:1.7rem;font-size:.68rem;" placeholder="Biaya (Cth: 2000 atau 0.5%)" />
              <button class="btn btn-xs btn-danger" onclick="siteSettings.topup_fees.splice(${i},1);renderSettingsForm()"><i class="fas fa-trash"></i> Hapus</button>
            </div>
          </div>
        `).join('') || '<div class="tbl-empty"><i class="fas fa-percent"></i>Belum ada aturan biaya admin top up</div>';
      }
    
    
      /* Metode pembayaran */
      const defaultPmList = [
        { id: "saldo", name: "Saldo Utama", active: true },
        { id: "va", name: "Virtual Account Bank", active: true },
        { id: "retail", name: "Alfamart / Indomaret", active: true },
        { id: "card", name: "Kartu Kredit / Debit", active: true }
      ];
      if (!siteSettings.payment_methods || !siteSettings.payment_methods.length) siteSettings.payment_methods = defaultPmList;
      const pmContainer = $("pmListContainer");
      if (pmContainer) {
        pmContainer.innerHTML = (siteSettings.payment_methods || []).map((m, i) => `
          <div class="list-item row" style="justify-content:space-between;">
            <span style="font-size:.74rem;font-weight:700;">${esc(m.name)}</span>
            <button class="btn btn-xs ${m.active !== false ? 'btn-ok' : ''}" onclick="siteSettings.payment_methods[${i}].active=!siteSettings.payment_methods[${i}].active;renderSettingsForm()">${m.active !== false ? 'Aktif' : 'Nonaktif'}</button>
          </div>
        `).join('');
      }
    }
    
    /* ========================================================================
       LANDING PAGE
       ===================================================================== */
    let landingDataAdmin = { title: "", version: "", slogan: "", main_sliders: [], sec_sliders: [] };
    
    async function loadLandingAdmin() {
      try {
        const res = await fetch('../icons/syslndng.php?action=get');
        landingDataAdmin = await res.json();
        renderLandingAdmin();
      } catch (e) { console.log("Gagal load landing data"); }
    }
    
    function renderLandingAdmin() {
      $('lndTitle').value = landingDataAdmin.title || '';
      $('lndVersion').value = landingDataAdmin.version || '';
      $('lndSlogan').value = landingDataAdmin.slogan || '';
    
      const mainCont = $('lndMainSliders');
      if (mainCont) mainCont.innerHTML = (landingDataAdmin.main_sliders || []).map((s, i) => `
        <div class="list-item" style="display:flex;gap:.6rem;">
          <div class="thumb" style="width:6rem;height:7.5rem;">
            ${s.img ? `<img src="../${esc(s.img)}">` : `<span class="ph">No Image</span>`}
            <input type="file" accept="image/*" onchange="uploadLandingImg(this, 'main', ${i})">
          </div>
          <div style="flex:1;display:flex;flex-direction:column;gap:.4rem;">
            <textarea onchange="landingDataAdmin.main_sliders[${i}].text=this.value" class="inp" style="height:4rem;font-size:.68rem;" placeholder="Teks testimoni / promo">${esc(s.text || '')}</textarea>
            <div class="row-wrap">
              <label class="row" style="font-size:.68rem;font-weight:700;gap:.3rem;cursor:pointer;">
                <input type="checkbox" onchange="landingDataAdmin.main_sliders[${i}].bg=this.checked" ${s.bg ? 'checked' : ''} style="accent-color:var(--pri);"> Teks Background
              </label>
              <input type="color" onchange="landingDataAdmin.main_sliders[${i}].color=this.value" value="${esc(s.color || '#cc0000')}" style="width:2rem;height:1.6rem;border:1px solid var(--border-2);border-radius:var(--r-sm);background:transparent;padding:0;cursor:pointer;">
            </div>
            <button onclick="deleteLandingImg('${esc(s.img)}'); landingDataAdmin.main_sliders.splice(${i},1); renderLandingAdmin();" class="btn btn-xs btn-danger"><i class="fas fa-trash"></i> Hapus Slider</button>
          </div>
        </div>
      `).join('') || '<div class="tbl-empty"><i class="fas fa-images"></i>Belum ada slider utama</div>';
    
      const secCont = $('lndSecSliders');
      if (secCont) secCont.innerHTML = (landingDataAdmin.sec_sliders || []).map((s, i) => `
        <div class="list-item" style="display:flex;align-items:center;gap:.6rem;">
          <div class="thumb" style="width:7rem;height:3.5rem;">
            ${s.img ? `<img src="../${esc(s.img)}">` : `<span class="ph">No Image</span>`}
            <input type="file" accept="image/*" onchange="uploadLandingImg(this, 'sec', ${i})">
          </div>
          <button onclick="deleteLandingImg('${esc(s.img)}'); landingDataAdmin.sec_sliders.splice(${i},1); renderLandingAdmin();" class="btn btn-xs btn-danger" style="flex:1;"><i class="fas fa-trash"></i> Hapus Promo</button>
        </div>
      `).join('') || '<div class="tbl-empty"><i class="fas fa-rectangle-ad"></i>Belum ada slider promo</div>';
    }
    
    function addMainSlider() {
      landingDataAdmin.main_sliders = landingDataAdmin.main_sliders || [];
      landingDataAdmin.main_sliders.push({ img: '', text: '', bg: true, color: '#cc0000' });
      renderLandingAdmin();
    }
    function addSecSlider() {
      landingDataAdmin.sec_sliders = landingDataAdmin.sec_sliders || [];
      landingDataAdmin.sec_sliders.push({ img: '' });
      renderLandingAdmin();
    }
    
    let cropper = null;
    let currentCropType = '';
    let currentCropIndex = -1;
    
    function uploadLandingImg(input, type, index) {
      const file = input.files[0];
      if (!file) return;
    
      if (type === 'sec') {
        const fd = new FormData();
        fd.append('image', file);
        fd.append('action', 'upload');
        fetch('../icons/syslndng.php', { method: 'POST', body: fd })
          .then(res => res.json())
          .then(data => {
            if (data.status) {
              landingDataAdmin.sec_sliders[index].img = data.url;
              renderLandingAdmin();
              okMsg('Gambar promo berhasil diunggah');
            } else errMsg(data.message || 'Gagal mengunggah gambar');
          });
        input.value = '';
        return;
      }
    
      const reader = new FileReader();
      reader.onload = function (e) {
        $('cropperModal').classList.remove('hidden');
        const image = $('cropperImage');
        image.src = e.target.result;
        if (cropper) cropper.destroy();
        cropper = new Cropper(image, { aspectRatio: 4 / 5, viewMode: 1, background: false });
        currentCropType = type;
        currentCropIndex = index;
        input.value = '';
      };
      reader.readAsDataURL(file);
    }
    
    function closeCropper() {
      $('cropperModal').classList.add('hidden');
      if (cropper) cropper.destroy();
      cropper = null;
    }
    
    async function performCropAndUpload() {
      if (!cropper) return;
      const canvas = cropper.getCroppedCanvas({
        width: currentCropType === 'main' ? 800 : 780,
        height: currentCropType === 'main' ? 1000 : 360,
      });
      canvas.toBlob(async (blob) => {
        const fd = new FormData();
        fd.append('image', blob, 'cropped.jpg');
        fd.append('action', 'upload');
        $('cropperModal').classList.add('hidden');
        try {
          const res = await fetch('../icons/syslndng.php', { method: 'POST', body: fd });
          const data = await res.json();
          if (data.status) {
            if (currentCropType === 'main') landingDataAdmin.main_sliders[currentCropIndex].img = data.url;
            else landingDataAdmin.sec_sliders[currentCropIndex].img = data.url;
            renderLandingAdmin();
            okMsg('Gambar berhasil diunggah');
          } else errMsg(data.message || 'Gagal upload');
        } catch (e) { errMsg('Gagal upload gambar'); }
        if (cropper) cropper.destroy();
        cropper = null;
      }, 'image/jpeg', 0.85);
    }
    
    async function deleteLandingImg(url) {
      if (!url) return;
      try {
        await fetch('../icons/syslndng.php', {
          method: 'POST', headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify({ action: 'delete', url: url })
        });
      } catch (e) {}
    }
    
    async function saveLandingAdmin() {
      landingDataAdmin.title = $('lndTitle').value;
      landingDataAdmin.version = $('lndVersion').value;
      landingDataAdmin.slogan = $('lndSlogan').value;
      try {
        const res = await fetch('../icons/syslndng.php', {
          method: 'POST', headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify({ action: 'save', ...landingDataAdmin })
        });
        const data = await res.json();
        okMsg(data.message || 'Berhasil disimpan');
      } catch (e) { errMsg('Gagal menyimpan landing page'); }
    }
    
    /* ---------------- Row adders ---------------- */
    function addPromoRow() {
      siteSettings.promos = siteSettings.promos || [];
      siteSettings.promos.push({ t: "Promo Baru", s: "Deskripsi promo", c1: "#4f46e5", c2: "#7c3aed", e: "🎁" });
      renderSettingsForm();
    }
    function addVoucherRow() {
      siteSettings.vouchers = siteSettings.vouchers || [];
      siteSettings.vouchers.push({ code: "DISCOUNT5", title: "Diskon Rp5.000", desc: "Min. Rp20.000", val: 5000, type: "flat", min: 20000, max: 5000, svc: [], exp: "31 Des 2026", claimed: true, used: false });
      renderSettingsForm();
    }
    function toggleQrisActive() {
      siteSettings.qris_active = siteSettings.qris_active === false ? true : false;
      renderSettingsForm();
    }
    function addManualTopupRow() {
      siteSettings.manual_topups = siteSettings.manual_topups || [];
      siteSettings.manual_topups.push({ id: 'mt_' + Date.now(), logo: '', bank: '', number: '', holder: '', active: true });
      renderSettingsForm();
    }
    function addBankRow() {
      siteSettings.banks = siteSettings.banks || [];
      siteSettings.banks.push({ bank: "BCA", number: "0000000000", holder: "Nama Pemilik" });
      renderSettingsForm();
    }
    function addTopupFeeRow() {
      siteSettings.topup_fees = siteSettings.topup_fees || [];
      siteSettings.topup_fees.push({ min: 0, max: 400000, fee: "2000" });
      renderSettingsForm();
    }
    
    async function uploadAppLogo(inputEl) {
      const file = inputEl.files[0];
      if (!file) return;
      const formData = new FormData();
      formData.append('logo', file);
      try {
        const res = await fetch('upload_logo.php', { method: 'POST', body: formData });
        const data = await res.json();
        if (data.status) {
          siteSettings.app_logo = data.url;
          $('appLogoPreview').src = '../' + data.url;
          okMsg('Logo aplikasi berhasil diunggah!');
        } else errMsg('Upload gagal: ' + data.message);
      } catch (e) { errMsg('Terjadi kesalahan saat upload logo'); }
    }
    
    async function uploadLogoTopup(inputEl, index) {
      const file = inputEl.files[0];
      if (!file) return;
      const formData = new FormData();
      formData.append('logo', file);
      try {
        const res = await fetch('upload_logo.php', { method: 'POST', body: formData });
        const data = await res.json();
        if (data.status) {
          siteSettings.manual_topups[index].logo = data.url;
          renderSettingsForm();
          okMsg('Logo metode top up diperbarui');
        } else errMsg('Upload gagal: ' + data.message);
      } catch (e) { errMsg('Terjadi kesalahan saat upload'); }
    }
    
    async function saveSiteSettings() {
      siteSettings.site_name = $("confSiteName").value;
      siteSettings.app_title = $("confAppTitle").value;
      siteSettings.cs_phone = $("confCsPhone").value;
      siteSettings.cs_email = $("confCsEmail").value;
      siteSettings.qris_static = $("confQrisStatic").value;
      siteSettings.qris_name = $("confQrisName").value;
      try {
        const data = await secureFetch("seting.php", { settings: siteSettings });
        okMsg(data.message || "Pengaturan berhasil disimpan!");
      } catch (e) { errMsg("Gagal menyimpan pengaturan."); }
    }
    
    /* ========================================================================
       ANTRIAN TOP UP
       ===================================================================== */
    function getPendingTopups() {
      return allTxData.filter(t => (t.sid === 'topup' || (t.product || '').toLowerCase().includes('top up')) && t.status === 'pending');
    }
    
    function renderTopupQueueCards() {
      const container = $("topupQueueCardsContainer");
      if (!container) return;
      const pendingTopups = getPendingTopups();
      setTxt('topupCountInfo', pendingTopups.length + ' antrian');
    
      if (!pendingTopups.length) {
        container.innerHTML = `<div class="card tbl-empty" style="grid-column:1/-1;padding:2.5rem;"><i class="fas fa-circle-check"></i>Tidak ada antrian top up pending saat ini.</div>`;
        return;
      }
    
      container.innerHTML = pendingTopups.map(t => `
        <div class="card" style="position:relative;overflow:hidden;border-color:var(--pri-line);">
          <div style="position:absolute;inset:0 0 auto 0;height:3px;background:linear-gradient(90deg,var(--pri),var(--pri-2));"></div>
          <div class="card-body" style="display:flex;flex-direction:column;gap:.6rem;">
            <div class="row" style="justify-content:space-between;align-items:flex-start;">
              <div class="row">
                <div style="width:1.9rem;height:1.9rem;border-radius:.55rem;background:linear-gradient(135deg,var(--pri),var(--pri-2));color:#fff;display:grid;place-items:center;font-weight:800;font-size:.72rem;">P</div>
                <div>
                  <p style="font-size:.68rem;font-weight:800;letter-spacing:.05em;text-transform:uppercase;">PayNusa Card</p>
                  <p class="cell-sub">${esc(t.method || 'Top Up QRIS Dinamis')}</p>
                </div>
              </div>
              <span class="badge b-warn"><span class="pill-dot"></span>PENDING</span>
            </div>
    
            <div style="padding:.5rem .6rem;border-radius:var(--r);background:var(--surface-2);border:1px solid var(--border);">
              <p class="cell-sub" style="text-transform:uppercase;letter-spacing:.06em;">Nominal Transfer Wajib</p>
              <p style="font-size:1.3rem;font-weight:800;color:var(--ok);letter-spacing:-.03em;">${rp(t.total)}</p>
              <p class="cell-mono">Ref: ${esc(t.ref)}</p>
            </div>
    
            <div class="kv" style="grid-template-columns:1fr;">
              <div class="kv-item"><span>Pengguna</span><b>${esc(t.user_name || '-')}</b></div>
              <div class="kv-item"><span>No. HP</span><b class="mono" style="font-size:.7rem;">${esc(t.user_phone || t.customer || '-')}</b></div>
              <div class="kv-item"><span>Waktu</span><b style="font-size:.7rem;">${fmtDate(t.date)}</b></div>
            </div>
    
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:.4rem;">
              <button onclick="changeTxStatus('${esc(t.uid)}', '${esc(t.ref)}', 'success')" class="btn btn-ok btn-sm"><i class="fas fa-check"></i> Terima</button>
              <button onclick="changeTxStatus('${esc(t.uid)}', '${esc(t.ref)}', 'failed')" class="btn btn-danger btn-sm"><i class="fas fa-xmark"></i> Tolak</button>
            </div>
          </div>
        </div>
      `).join('');
    }
    
    /* ========================================================================
       SEMUA TRANSAKSI
       ===================================================================== */
    let txStatusFilter = '';
    function setTxStatusFilter(el, st) {
      txStatusFilter = st;
      document.querySelectorAll('#txStatusChips .chip').forEach(c => c.classList.remove('active'));
      el.classList.add('active');
      renderAllTxTable(1);
    }
    function getFilteredTx() {
      const q = (($('txSearch') && $('txSearch').value) || '').toLowerCase().trim();
      return allTxData.filter(t => {
        if (txStatusFilter && String(t.status) !== txStatusFilter) return false;
        if (!q) return true;
        return [t.ref, t.user_name, t.user_phone, t.product, t.customer, t.method]
          .some(v => String(v || '').toLowerCase().includes(q));
      });
    }
    
    function renderAllTxTable(page = currentPageTx) {
      currentPageTx = page;
      const list = getFilteredTx();
      const totalPages = Math.ceil(list.length / ITEMS_PER_PAGE) || 1;
      if (currentPageTx > totalPages) currentPageTx = totalPages;
      const start = (currentPageTx - 1) * ITEMS_PER_PAGE;
      const paginated = list.slice(start, start + ITEMS_PER_PAGE);
    
      $("allTxTableBody").innerHTML = paginated.map(t => `
        <tr>
          <td><span class="cell-mono">${esc(t.ref)}</span></td>
          <td class="cell-sub">${fmtDate(t.date)}</td>
          <td><span class="cell-strong">${esc(t.user_name || '-')}</span><div class="cell-sub">${esc(t.user_phone || '-')}</div></td>
          <td>${esc(t.product)}</td>
          <td>${esc(t.customer)}</td>
          <td class="cell-money">${rp(t.total)}</td>
          <td><span class="badge b-mute">${esc(t.method || '-')}</span></td>
          <td>${statusBadge(t.status)}</td>
          <td>
            <div class="row-wrap" style="gap:.25rem;">
              <button onclick="openTxDetailAdmin('${esc(t.ref)}')" class="btn btn-xs btn-soft">Detail</button>
              <button onclick="liveCheckTxStatusAdmin('${esc(t.ref)}')" class="btn btn-xs btn-warn">Live Cek</button>
              <button onclick="changeTxStatus('${esc(t.uid)}', '${esc(t.ref)}', 'success')" class="btn btn-xs btn-ok">Sukses</button>
              <button onclick="changeTxStatus('${esc(t.uid)}', '${esc(t.ref)}', 'failed')" class="btn btn-xs btn-danger">Gagal</button>
              <button onclick="deleteTxAdmin('${esc(t.ref)}')" class="btn btn-xs btn-danger"><i class="fas fa-trash"></i></button>
            </div>
          </td>
        </tr>
      `).join('') || emptyRow(9, 'Belum ada data transaksi', 'fa-receipt');
    
      renderPaginationControls("txPagination", currentPageTx, totalPages, list.length, "renderAllTxTable");
    }
    
    function openTxDetailAdmin(ref) {
      const t = allTxData.find(x => x.ref === ref);
      if (!t) return;
      const raw = t.raw_response ? JSON.stringify(t.raw_response, null, 2) : "Data respon mentah belum tersimpan.";
      $("modalTxDetailContent").innerHTML = `
        <div class="kv">
          <div class="kv-item"><span>Ref ID</span><b class="mono" style="color:var(--pri-text);">${esc(t.ref)}</b></div>
          <div class="kv-item"><span>Pengguna</span><b>${esc(t.user_name || '-')} (${esc(t.user_phone || '-')})</b></div>
          <div class="kv-item"><span>Produk</span><b>${esc(t.product)}</b></div>
          <div class="kv-item"><span>Tujuan</span><b>${esc(t.customer)}</b></div>
          <div class="kv-item"><span>Total</span><b style="color:var(--ok);">${rp(t.total)}</b></div>
          <div class="kv-item"><span>Status</span><b>${statusBadge(t.status)}</b></div>
          <div class="kv-item"><span>SN / Token</span><b class="mono" style="color:var(--warn);">${esc(t.token || t.serial || '-')}</b></div>
          <div class="kv-item"><span>Waktu</span><b style="font-size:.7rem;">${fmtDate(t.date)}</b></div>
        </div>
        <div style="margin-top:.8rem;">
          <label class="lbl">Raw Server Response (JSON)</label>
          <pre class="mono" style="background:var(--surface-2);border:1px solid var(--border);border-radius:var(--r);padding:.6rem;font-size:.66rem;max-height:16rem;overflow:auto;white-space:pre-wrap;word-break:break-all;margin:0;">${esc(raw)}</pre>
        </div>
        <div class="row" style="margin-top:.7rem;justify-content:flex-end;">
          <button class="btn btn-xs" onclick="copyText('${esc(t.ref)}')"><i class="fas fa-copy"></i> Salin Ref ID</button>
        </div>
      `;
      $("btnLiveCheckModal").setAttribute("onclick", `liveCheckTxStatusAdmin('${esc(t.ref)}')`);
      $("modalTxDetail").classList.remove("hidden");
    }
    function closeModalTxDetail() { $("modalTxDetail").classList.add("hidden"); }
    
    function copyText(txt) {
      if (navigator.clipboard && navigator.clipboard.writeText) {
        navigator.clipboard.writeText(txt).then(() => toast('Disalin: ' + txt, 'ok')).catch(() => toast('Gagal menyalin', 'err'));
      } else {
        const ta = document.createElement('textarea');
        ta.value = txt; document.body.appendChild(ta); ta.select();
        try { document.execCommand('copy'); toast('Disalin: ' + txt, 'ok'); } catch (e) { errMsg('Gagal menyalin'); }
        ta.remove();
      }
    }
    
    async function liveCheckTxStatusAdmin(ref) {
      try {
        const res = await fetch("cektrx.php", {
          method: "POST", headers: { "Content-Type": "application/json" },
          body: JSON.stringify({ action: "status", refid: ref })
        });
        const data = await res.json();
        
        const t = allTxData.find(x => x.ref === ref);
        if (t) {
          t.raw_response = data;
          await secureFetch("manager.php?action=save_tx", { uid: t.uid || ('u_' + t.user_phone), tx: t });
        }
    
        toast("Respon live cektrx.php: " + JSON.stringify(data), 'info', 'Live Status ' + ref);
        initAdminDashboard();
      } catch (e) { errMsg("Gagal melakukan Live Check Status"); }
    }
    
    async function deleteTxAdmin(ref) {
      if (!confirm("Yakin ingin menghapus riwayat transaksi " + ref + "?")) return;
      try {
        let data = await secureFetch("manager.php?action=delete_tx", { ref, refid: ref });
        if (!data.status) data = await secureFetch("manager.php?action=delete_transaction", { ref, refid: ref });
        toast(data.message || "Riwayat transaksi berhasil dihapus", 'ok');
        await initAdminDashboard();
        if (!$("modalUserHistory").classList.contains("hidden")) renderUserHistoryTable();
      } catch (e) { errMsg("Gagal menghapus riwayat transaksi"); }
    }
    
    /* ========================================================================
       AUDIT REFUND
       ===================================================================== */
    function getRefundList() {
      return allTxData.filter(t => t.status === "failed" || t.refund_status === "DONE" || t.refund_status === "ALREADY_DONE");
    }
    
    function renderRefundAuditTable(page = currentPageRefund) {
      const tb = $("refundAuditTable");
      if (!tb) return;
      currentPageRefund = page;
    
      const filtered = getRefundList();
      const statDone = filtered.filter(t => t.refund_status === "DONE" || t.refund_status === "ALREADY_DONE").length;
      const statOther = filtered.filter(t => !t.method || !t.method.toLowerCase().includes("saldo")).length;
      const statVol = filtered.filter(t => t.refund_status === "DONE" || t.refund_status === "ALREADY_DONE").reduce((a, b) => a + (b.total || 0), 0);
    
      setTxt("statRefundTotal", filtered.length);
      setTxt("statRefundVolume", rp(statVol));
      setTxt("statRefundDone", statDone);
      setTxt("statRefundOther", statOther);
    
      const totalPages = Math.ceil(filtered.length / ITEMS_PER_PAGE) || 1;
      if (currentPageRefund > totalPages) currentPageRefund = totalPages;
      const start = (currentPageRefund - 1) * ITEMS_PER_PAGE;
      const paginated = filtered.slice(start, start + ITEMS_PER_PAGE);
    
      tb.innerHTML = paginated.map(t => {
        const isDone = t.refund_status === "DONE" || t.refund_status === "ALREADY_DONE";
        const isSaldo = t.method && t.method.toLowerCase().includes("saldo");
        let statusBadgeHtml = "";
        if (t.refund_status === "DONE") {
          statusBadgeHtml = "<span class='badge b-ok'><i class='fas fa-check'></i> REFUNDED (DONE)</span>";
        } else if (t.refund_status === "ALREADY_DONE") {
          statusBadgeHtml = "<span class='badge b-info'><i class='fas fa-lock'></i> IDEMPOTENT (DONE)</span>";
        } else if (isSaldo && t.status === "failed") {
          statusBadgeHtml = "<span class='badge b-warn'><i class='fas fa-hourglass-half'></i> SIAP REFUND</span>";
        } else {
          statusBadgeHtml = "<span class='badge b-mute'>NON-SALDO / NONE</span>";
        }
        const lockBadge = isDone
          ? "<span class='badge b-ok mono'>LOCK-" + esc(String(t.ref).slice(-6)) + "</span>"
          : "<span class='badge b-mute mono'>UNLOCKED</span>";
        const processBtn = (!isDone && isSaldo)
          ? "<button onclick=\"changeTxStatus('" + esc(t.uid) + "', '" + esc(t.ref) + "', 'failed')\" class='btn btn-xs btn-ok'>Proses Refund</button>"
          : "";
    
        return "<tr>" +
          "<td><span class='cell-mono'>" + esc(t.ref) + "</span></td>" +
          "<td class='cell-sub'>" + fmtDate(t.date) + "</td>" +
          "<td><span class='cell-strong'>" + esc(t.user_name || "-") + "</span><div class='cell-sub'>" + esc(t.user_phone || t.customer || "-") + "</div></td>" +
          "<td><span class='cell-strong'>" + esc(t.product || "-") + "</span><div class='cell-sub'>Tujuan: " + esc(t.customer || "-") + "</div></td>" +
          "<td class='cell-money'>" + rp(t.total) + "</td>" +
          "<td><span class='badge b-mute'>" + esc(t.method || "Saldo PayNusa") + "</span></td>" +
          "<td>" + statusBadgeHtml + "</td>" +
          "<td>" + lockBadge + "</td>" +
          "<td><div class='row' style='gap:.25rem;'>" +
            "<button onclick=\"openTxDetailAdmin('" + esc(t.ref) + "')\" class='btn btn-xs btn-soft'>Detail</button>" +
            processBtn +
            "<button onclick=\"deleteTxAdmin('" + esc(t.ref) + "')\" class='btn btn-xs btn-danger'>Hapus</button>" +
          "</div></td>" +
        "</tr>";
      }).join('') || emptyRow(9, 'Tidak ada log pengembalian saldo', 'fa-rotate-left');
    
      renderPaginationControls("refundPagination", currentPageRefund, totalPages, filtered.length, "renderRefundAuditTable");
    }
    
    function renderPaginationControls(containerId, currentPage, totalPages, totalItems, funcName) {
      const container = $(containerId);
      if (!container) return;
      if (totalItems === 0) { container.innerHTML = ""; return; }
      const startItem = (currentPage - 1) * ITEMS_PER_PAGE + 1;
      const endItem = Math.min(currentPage * ITEMS_PER_PAGE, totalItems);
      container.innerHTML = `
        <div class="pgn-info">Menampilkan <b>${startItem}-${endItem}</b> dari <b>${totalItems}</b> data</div>
        <div class="pgn-nav">
          <button onclick="${funcName}(${currentPage - 1})" ${currentPage === 1 ? 'disabled' : ''} class="btn btn-xs"><i class="fas fa-chevron-left"></i> Prev</button>
          <span class="pgn-info">Halaman <b>${currentPage}</b> dari <b>${totalPages}</b></span>
          <button onclick="${funcName}(${currentPage + 1})" ${currentPage >= totalPages ? 'disabled' : ''} class="btn btn-xs">Next <i class="fas fa-chevron-right"></i></button>
        </div>
      `;
    }
    
    /* ========================================================================
       DONIGUARD
       ===================================================================== */
    let doniguardData = [];
    let dgTypeFilter = '';
    
    async function fetchDoniguard() {
      try {
        const res = await fetch('../doniguard/doniguard.php?action=get');
        const data = await res.json();
        if (data.status) {
          doniguardData = [];
          for (const uid in data.data) {
            const logs = data.data[uid];
            logs.forEach(l => { doniguardData.push({ uid, ...l }); });
          }
          doniguardData.sort((a, b) => new Date(b.waktu) - new Date(a.waktu));
          renderDoniguard();
        }
      } catch (e) { console.error(e); }
    }
    
    function setDgTypeFilter(el, type) {
      dgTypeFilter = type;
      el.parentNode.querySelectorAll('.chip').forEach(c => c.classList.remove('active'));
      el.classList.add('active');
      renderDoniguard();
    }
    function filterDoniguard() { renderDoniguard(); }
    
    function populateDgUsers() {
      const sel = $("dgSelectUser");
      if (!sel) return;
      const currentVal = sel.value;
      sel.innerHTML = '<option value="">-- Pilih User --</option>' + usersData.map(u => `<option value="${esc(u.uid)}">${esc(u.user?.name || '-')} (${esc(u.user?.phone || u.uid)})</option>`).join('');
      sel.value = currentVal;
    }
    
    async function clearDoniguardUser() {
      const uid = $("dgSelectUser").value;
      if (!uid) return;
      if (!confirm("Yakin ingin menghapus seluruh log mutasi (Doniguard) untuk user ini?")) return;
      
      try {
        const res = await fetch('../doniguard/doniguard.php?action=clear', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify({ uid: uid })
        });
        const data = await res.json();
        if (data.status) {
          toast("Log Doniguard berhasil dibersihkan", "ok");
          fetchDoniguard();
        } else {
          toast(data.message || "Gagal membersihkan log", "err");
        }
      } catch (e) {
        toast("Terjadi kesalahan saat membersihkan log", "err");
      }
    }
    
    function renderDoniguard() {
      const selectedUid = $("dgSelectUser").value;
      const btnClear = $("btnClearDoniguard");
      
      if (!selectedUid) {
        $("doniguardTableBody").innerHTML = emptyRow(8, 'Silakan pilih user terlebih dahulu untuk melihat log', 'fa-user');
        setTxt('dgCountInfo', '0 log');
        if (btnClear) btnClear.style.display = 'none';
        return;
      }
    
      if (btnClear) btnClear.style.display = 'inline-flex';
    
      const filtered = doniguardData.filter(d =>
        String(d.uid) === String(selectedUid) && (!dgTypeFilter || String(d.type) === dgTypeFilter)
      );
      setTxt('dgCountInfo', filtered.length + ' log');
    
      $("doniguardTableBody").innerHTML = filtered.map(d => `
        <tr>
          <td class="cell-sub">${esc(d.waktu)}</td>
          <td><span class="cell-mono">${esc(d.uid)}</span></td>
          <td class="cell-strong">${esc(d.desc)}</td>
          <td style="font-weight:800;color:${d.type === 'in' ? 'var(--ok)' : 'var(--bad)'};">${rp(d.amount)}</td>
          <td>${d.type === 'in' ? '<span class="badge b-ok">IN</span>' : '<span class="badge b-bad">OUT</span>'}</td>
          <td>${rp(d.saldo_awal)}</td>
          <td class="cell-strong">${rp(d.saldo_akhir)}</td>
          <td class="cell-sub" style="font-style:italic;max-width:18rem;">${esc(d.keterangan_full)}</td>
        </tr>
      `).join('') || emptyRow(8, 'Tidak ada log Doniguard untuk user ini', 'fa-shield-halved');
    }
    
    /* ========================================================================
       AKSI STATUS TRANSAKSI
       ===================================================================== */
    async function changeTxStatus(uid, ref, status) {
      if (!uid || uid === "undefined" || String(uid).trim() === "") {
        const txObj = allTxData.find(x => x.ref === ref);
        uid = (txObj && txObj.uid) ? txObj.uid : (txObj && txObj.user_phone ? "u_" + txObj.user_phone : "");
      }
      if (!confirm("Ubah status transaksi " + ref + " menjadi " + status.toUpperCase() + "?")) return;
      try {
        const data = await secureFetch("manager.php?action=update_tx_status", { uid, ref, status });
        toast(data.message || ("Status " + ref + " diperbarui."), 'ok');
        initAdminDashboard();
      } catch (e) { errMsg("Gagal memperbarui status transaksi"); }
    }
    
    /* ========================================================================
       EKSPOR CSV
       ===================================================================== */
    function downloadCSV(filename, rows) {
      const csv = rows.map(r => r.map(c => {
        const v = String(c === null || c === undefined ? '' : c).replace(/"/g, '""');
        return /[",;\n]/.test(v) ? '"' + v + '"' : v;
      }).join(';')).join('\r\n');
      const blob = new Blob(["\ufeff" + csv], { type: 'text/csv;charset=utf-8;' });
      const a = document.createElement('a');
      a.href = URL.createObjectURL(blob);
      a.download = filename;
      document.body.appendChild(a); a.click(); a.remove();
      setTimeout(() => URL.revokeObjectURL(a.href), 1500);
      toast(rows.length - 1 + ' baris diekspor ke ' + filename, 'ok');
    }
    function exportTxCSV() {
      if (!allTxData.length) return toast('Belum ada data transaksi untuk diekspor.', 'warn');
      const rows = [['Ref ID', 'Waktu', 'UID', 'Nama', 'No HP', 'Produk', 'Tujuan', 'Total', 'Metode', 'Status', 'Refund', 'SN/Token']];
      getFilteredTx().forEach(t => rows.push([t.ref, t.date ? new Date(t.date).toLocaleString('id-ID') : '', t.uid, t.user_name, t.user_phone, t.product, t.customer, t.total, t.method, t.status, t.refund_status || '', t.token || t.serial || '']));
      downloadCSV('paynusa-transaksi-' + Date.now() + '.csv', rows);
    }
    function exportUsersCSV() {
      if (!usersData.length) return toast('Belum ada data user untuk diekspor.', 'warn');
      const rows = [['UID', 'Nama', 'No HP', 'Email', 'Kota', 'Saldo', 'Poin', 'Jenis Akun']];
      getFilteredUsers().forEach(u => rows.push([u.uid, u.user?.name, u.user?.phone, u.user?.email, u.user?.address, u.balance, u.points, u.jenis_akun || 'member']));
      downloadCSV('paynusa-users-' + Date.now() + '.csv', rows);
    }
    function exportRefundCSV() {
      const list = getRefundList();
      if (!list.length) return toast('Belum ada log refund untuk diekspor.', 'warn');
      const rows = [['Ref ID', 'Waktu', 'UID', 'Nama', 'Produk', 'Tujuan', 'Total', 'Metode', 'Status', 'Refund Status']];
      list.forEach(t => rows.push([t.ref, t.date ? new Date(t.date).toLocaleString('id-ID') : '', t.uid, t.user_name, t.product, t.customer, t.total, t.method, t.status, t.refund_status || '']));
      downloadCSV('paynusa-refund-audit-' + Date.now() + '.csv', rows);
    }
    function exportDoniguardCSV() {
      if (!doniguardData.length) return toast('Belum ada log Doniguard untuk diekspor.', 'warn');
      const rows = [['Waktu', 'UID', 'Keterangan', 'Nominal', 'Tipe', 'Saldo Awal', 'Saldo Akhir', 'Log Full']];
      doniguardData.forEach(d => rows.push([d.waktu, d.uid, d.desc, d.amount, d.type, d.saldo_awal, d.saldo_akhir, d.keterangan_full]));
      downloadCSV('paynusa-doniguard-' + Date.now() + '.csv', rows);
    }
    
    /* ========================================================================
       LIVE CHAT ADMIN CONTROLLER
       ===================================================================== */
    let adminChatList = [];
    async function fetchLiveChatAdmin() {
      try {
        const res = await fetch('../livechat/apichat.php?action=list');
        const data = await res.json();
        if (data && data.status && Array.isArray(data.data)) {
          adminChatList = data.data;
          renderAdminChatUI();
        }
      } catch(e){}
    }
    function renderAdminChatUI() {
      const box = $('adminChatBox');
      if (!box) return;
      if (!adminChatList.length) {
        box.innerHTML = '<div class="tbl-empty"><i class="fas fa-comments"></i>Belum ada obrolan live chat</div>';
        return;
      }
      box.innerHTML = adminChatList.map(c => `
        <div class="list-item flex items-start justify-between gap-3">
          <div class="flex-1 min-w-0">
            <div class="row mb-1">
              <span class="badge b-pri">${esc(c.username)}</span>
              <span class="cell-sub mono">${esc(c.time || '')}</span>
            </div>
            ${c.reply_to ? `<div class="p-1 rounded bg-slate-100 dark:bg-slate-800 text-[10px] text-slate-500 mb-1 border-l-2 border-indigo-500">Balas <b>${esc(c.reply_to.username)}</b>: ${esc(c.reply_to.message)}</div>` : ''}
            <p class="text-[12px] font-medium txt leading-relaxed break-words">${esc(c.message)}</p>
          </div>
          <button class="btn btn-xs btn-danger" onclick="deleteChatAdmin('${esc(c.id)}')" title="Hapus Chat"><i class="fas fa-trash"></i></button>
        </div>
      `).join('');
    }
    async function deleteChatAdmin(id) {
      if (!confirm('Hapus pesan ini dari live chat?')) return;
      try {
        await fetch('../livechat/apichat.php?action=delete', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify({ id: id })
        });
        toast('Pesan berhasil dihapus', 'ok');
        fetchLiveChatAdmin();
      } catch(e) { errMsg('Gagal menghapus pesan'); }
    }
    async function clearAllLiveChatAdmin() {
      if (!confirm('Yakin ingin membersihkan SELURUH riwayat live chat?')) return;
      try {
        await fetch('../livechat/apichat.php?action=clear', { method: 'POST' });
        toast('Semua pesan live chat dibersihkan', 'ok');
        fetchLiveChatAdmin();
      } catch(e) { errMsg('Gagal membersihkan chat'); }
    }
    async function sendChatAsAdmin() {
      const u = ($('admFakeUser').value || '').trim();
      const m = ($('admFakeMsg').value || '').trim();
      if (!u || !m) return toast('Username dan pesan wajib diisi', 'warn');
      try {
        await fetch('../livechat/apichat.php?action=send', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify({ uid: 'admin_agent', username: u, message: m })
        });
        $('admFakeMsg').value = '';
        toast('Pesan berhasil dikirim ke Live Chat', 'ok');
        fetchLiveChatAdmin();
      } catch(e) { errMsg('Gagal mengirim pesan'); }
    }
    
    /* ========================================================================
       BOOTSTRAP
       ===================================================================== */
    window.addEventListener("DOMContentLoaded", () => {
      console.log("🔒 Secure Admin Panel Initialized (AES-256-CBC Active)");
      // Sesi login tidak tersimpan di memori browser
      try {
        const t = localStorage.getItem('pn_theme');
        if (t) applyTheme(t); else applyTheme(window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');
        const s = localStorage.getItem('pn_scale');
        if (s) { applyUiScale(s); const sel = $('uiScaleSel'); if (sel) sel.value = s; }
        if (localStorage.getItem('pn_sbcollapsed') === '1') document.body.classList.add('sb-collapsed');
      } catch (e) { applyTheme('light'); }
      startClock();
      document.getElementById('admPass').addEventListener('keydown', (e) => { if (e.key === 'Enter') e.target.blur(); });
    });
    </script>
  </body>

</html>
