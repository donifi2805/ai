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

          <li class="sb-label">Pelacakan Transaksi</li>
          <li class="sb-item" id="tab-txtrace" onclick="switchTab('txtrace')">
            <i class="fas fa-satellite-dish"></i><span>Tracking Center</span><span class="sb-badge hidden" id="badgeTrace">0</span>
          </li>
          <li class="sb-item" id="tab-txintel" onclick="switchTab('txintel')">
            <i class="fas fa-chart-line"></i><span>Analitik Transaksi</span>
          </li>
          <li class="sb-item" id="tab-txuser" onclick="switchTab('txuser')">
            <i class="fas fa-user-magnifying-glass"></i><span>Pelacakan Pengguna</span>
          </li>
          <li class="sb-item" id="tab-txrecon" onclick="switchTab('txrecon')">
            <i class="fas fa-scale-balanced"></i><span>Rekonsiliasi</span>
          </li>
          <li class="sb-item" id="tab-txalert" onclick="switchTab('txalert')">
            <i class="fas fa-tower-broadcast"></i><span>Alert &amp; Watchlist</span><span class="sb-badge hidden" id="badgeAlert">0</span>
          </li>
          <li class="sb-item" id="tab-txaudit" onclick="switchTab('txaudit')">
            <i class="fas fa-clipboard-list"></i><span>Jejak Audit Admin</span>
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

          <!-- ==================== TAB: TRACKING CENTER ==================== -->
          <section id="sec-txtrace" class="page-section stack">
            <div class="page-head">
              <div>
                <h2><i class="fas fa-satellite-dish"></i> Tracking Center</h2>
                <p>Pelacakan mendalam seluruh transaksi user dengan filter lanjutan, skor risiko &amp; jejak audit</p>
              </div>
              <div class="page-head-actions">
                <span class="badge b-mute" id="txiCountInfo">0 hasil</span>
                <span class="badge b-mute" id="txiAutoInfo"><i class="fas fa-rotate"></i> Auto: mati</span>
                <button class="btn btn-soft btn-sm" onclick="txiToggleAuto()"><i class="fas fa-stopwatch"></i> Auto Lacak</button>
                <button class="btn btn-sm" onclick="txiRefresh()"><i class="fas fa-arrows-rotate"></i> Muat Ulang</button>
              </div>
            </div>

            <div class="stat-grid">
              <div class="stat" style="--c1:#4f46e5;--c2:#7c3aed;--tint:var(--pri-soft);--fg:var(--pri-text);--line:var(--pri-line);">
                <div class="stat-top"><span class="stat-label">Volume Terfilter</span><span class="stat-ico"><i class="fas fa-coins"></i></span></div>
                <div class="stat-value" id="txiKpiVolume">Rp0</div>
                <div class="stat-note"><i class="fas fa-filter"></i> <span id="txiKpiCount">0 transaksi</span></div>
              </div>
              <div class="stat" style="--c1:#059669;--c2:#10b981;--tint:var(--ok-soft);--fg:var(--ok);--line:var(--ok-line);">
                <div class="stat-top"><span class="stat-label">Estimasi Margin</span><span class="stat-ico"><i class="fas fa-arrow-trend-up"></i></span></div>
                <div class="stat-value" id="txiKpiMargin">Rp0</div>
                <div class="stat-note"><i class="fas fa-percent"></i> <span id="txiKpiMarginPct">0%</span> dari volume</div>
              </div>
              <div class="stat" style="--c1:#d97706;--c2:#f59e0b;--tint:var(--warn-soft);--fg:var(--warn);--line:var(--warn-line);">
                <div class="stat-top"><span class="stat-label">Pending Tertahan</span><span class="stat-ico"><i class="fas fa-hourglass-half"></i></span></div>
                <div class="stat-value" id="txiKpiPending">Rp0</div>
                <div class="stat-note"><i class="fas fa-triangle-exclamation"></i> <span id="txiKpiSla">0 langgar SLA</span></div>
              </div>
              <div class="stat" style="--c1:#e11d48;--c2:#fb7185;--tint:var(--bad-soft);--fg:var(--bad);--line:var(--bad-line);">
                <div class="stat-top"><span class="stat-label">Risiko Tinggi</span><span class="stat-ico"><i class="fas fa-shield-virus"></i></span></div>
                <div class="stat-value" id="txiKpiRisk">0</div>
                <div class="stat-note"><i class="fas fa-clone"></i> <span id="txiKpiDup">0 duplikat</span></div>
              </div>
            </div>

            <div class="card">
              <div class="card-body" style="padding-bottom:.6rem;">
                <div class="row-wrap" style="align-items:flex-end;gap:.5rem;">
                  <div style="flex:1 1 18rem;min-width:14rem;">
                    <label class="lbl">Pencarian universal</label>
                    <div class="inp-icon">
                      <i class="fas fa-magnifying-glass"></i>
                      <input type="text" id="txiSearch" class="inp" oninput="txiRender(1)" placeholder="Ref ID, UID, nama, HP, produk, tujuan, SN, keterangan…">
                    </div>
                  </div>
                  <div style="width:9rem;">
                    <label class="lbl">Mode cari</label>
                    <select id="txiSearchMode" class="inp" onchange="txiRender(1)">
                      <option value="loose">Mengandung</option>
                      <option value="exact">Sama persis</option>
                      <option value="regex">Regex</option>
                    </select>
                  </div>
                  <div style="width:9rem;">
                    <label class="lbl">Status</label>
                    <select id="txiStatus" class="inp" onchange="txiRender(1)">
                      <option value="">Semua status</option>
                      <option value="success">Success</option>
                      <option value="pending">Pending</option>
                      <option value="failed">Failed</option>
                    </select>
                  </div>
                  <div style="width:11rem;">
                    <label class="lbl">Metode bayar</label>
                    <select id="txiMethod" class="inp" onchange="txiRender(1)"><option value="">Semua metode</option></select>
                  </div>
                  <div style="width:11rem;">
                    <label class="lbl">Layanan / kategori</label>
                    <select id="txiService" class="inp" onchange="txiRender(1)"><option value="">Semua layanan</option></select>
                  </div>
                  <div style="width:12rem;">
                    <label class="lbl">Pengguna</label>
                    <select id="txiUser" class="inp" onchange="txiRender(1)"><option value="">Semua pengguna</option></select>
                  </div>
                </div>

                <div class="row-wrap" style="align-items:flex-end;gap:.5rem;margin-top:.55rem;">
                  <div style="width:9rem;"><label class="lbl">Nominal min</label><input type="number" id="txiMin" class="inp" oninput="txiRender(1)" placeholder="0"></div>
                  <div style="width:9rem;"><label class="lbl">Nominal maks</label><input type="number" id="txiMax" class="inp" oninput="txiRender(1)" placeholder="~"></div>
                  <div style="width:11rem;"><label class="lbl">Dari tanggal</label><input type="date" id="txiFrom" class="inp" onchange="txiRender(1)"></div>
                  <div style="width:11rem;"><label class="lbl">Sampai tanggal</label><input type="date" id="txiTo" class="inp" onchange="txiRender(1)"></div>
                  <div style="width:10rem;">
                    <label class="lbl">Tanda khusus</label>
                    <select id="txiSpecial" class="inp" onchange="txiRender(1)">
                      <option value="">Tanpa filter</option>
                      <option value="flag">Hanya ditandai</option>
                      <option value="note">Ada catatan admin</option>
                      <option value="tag">Ada label</option>
                      <option value="dup">Terindikasi duplikat</option>
                      <option value="sla">Melanggar SLA</option>
                      <option value="risk">Risiko tinggi</option>
                      <option value="norefund">Gagal tanpa refund</option>
                      <option value="orphan">User tidak dikenal</option>
                    </select>
                  </div>
                  <div style="width:8rem;">
                    <label class="lbl">Baris/hal.</label>
                    <select id="txiPageSize" class="inp" onchange="txiRender(1)">
                      <option>25</option><option selected>50</option><option>100</option><option>250</option>
                    </select>
                  </div>
                </div>

                <div class="row-wrap" style="margin-top:.55rem;gap:.35rem;">
                  <div class="chipbar no-sb" id="txiPresetBar">
                    <button class="chip active" onclick="txiSetPreset(this,'all')">Semua waktu</button>
                    <button class="chip" onclick="txiSetPreset(this,'today')">Hari ini</button>
                    <button class="chip" onclick="txiSetPreset(this,'yesterday')">Kemarin</button>
                    <button class="chip" onclick="txiSetPreset(this,'7d')">7 hari</button>
                    <button class="chip" onclick="txiSetPreset(this,'30d')">30 hari</button>
                    <button class="chip" onclick="txiSetPreset(this,'month')">Bulan ini</button>
                    <button class="chip" onclick="txiSetPreset(this,'lastmonth')">Bulan lalu</button>
                  </div>
                  <span style="flex:1"></span>
                  <button class="btn btn-xs btn-soft" onclick="txiResetFilters()"><i class="fas fa-eraser"></i> Reset</button>
                  <button class="btn btn-xs btn-soft" onclick="txiShareLink()"><i class="fas fa-link"></i> Salin Tautan Filter</button>
                  <button class="btn btn-xs btn-soft" onclick="txiSaveView()"><i class="fas fa-bookmark"></i> Simpan Tampilan</button>
                </div>
                <div class="row-wrap" id="txiViewBar" style="margin-top:.45rem;gap:.3rem;"></div>
              </div>

              <div class="card-body" style="padding-top:0;padding-bottom:.55rem;">
                <div class="row-wrap" style="gap:.3rem;padding:.45rem .55rem;border:1px dashed var(--border-2);border-radius:var(--r);background:var(--surface-2);">
                  <span class="badge b-pri"><i class="fas fa-list-check"></i> <span id="txiSelInfo">0 dipilih</span></span>
                  <button class="btn btn-xs btn-ok" onclick="txiBulkStatus('success')"><i class="fas fa-check"></i> Tandai Sukses</button>
                  <button class="btn btn-xs btn-warn" onclick="txiBulkStatus('pending')"><i class="fas fa-clock"></i> Tandai Pending</button>
                  <button class="btn btn-xs btn-danger" onclick="txiBulkStatus('failed')"><i class="fas fa-xmark"></i> Tandai Gagal</button>
                  <button class="btn btn-xs btn-soft" onclick="txiBulkLiveCheck()"><i class="fas fa-bolt"></i> Live Cek Massal</button>
                  <button class="btn btn-xs btn-soft" onclick="txiBulkFlag(true)"><i class="fas fa-flag"></i> Tandai Pantau</button>
                  <button class="btn btn-xs btn-soft" onclick="txiBulkFlag(false)"><i class="far fa-flag"></i> Lepas Pantau</button>
                  <button class="btn btn-xs btn-soft" onclick="txiBulkTag()"><i class="fas fa-hashtag"></i> Beri Label</button>
                  <button class="btn btn-xs btn-soft" onclick="txiCopySelectedRefs()"><i class="fas fa-copy"></i> Salin Ref</button>
                  <button class="btn btn-xs btn-soft" onclick="txiExport('csv')"><i class="fas fa-file-csv"></i> CSV</button>
                  <button class="btn btn-xs btn-soft" onclick="txiExport('json')"><i class="fas fa-file-code"></i> JSON</button>
                  <button class="btn btn-xs btn-soft" onclick="txiExport('ndjson')"><i class="fas fa-database"></i> NDJSON</button>
                  <button class="btn btn-xs btn-danger" onclick="txiBulkDelete()"><i class="fas fa-trash"></i> Hapus</button>
                </div>
              </div>

              <div class="tbl-wrap">
                <table class="tbl">
                  <thead>
                    <tr>
                      <th style="width:1.8rem;"><input type="checkbox" id="txiCheckAll" onclick="txiToggleAll(this.checked)"></th>
                      <th class="txi-sort" onclick="txiSort('ref')">Ref ID <i class="fas fa-sort"></i></th>
                      <th class="txi-sort" onclick="txiSort('ts')">Waktu <i class="fas fa-sort"></i></th>
                      <th class="txi-sort" onclick="txiSort('user')">Pengguna <i class="fas fa-sort"></i></th>
                      <th class="txi-sort" onclick="txiSort('product')">Produk / Layanan <i class="fas fa-sort"></i></th>
                      <th>Tujuan</th>
                      <th class="txi-sort" onclick="txiSort('total')">Total <i class="fas fa-sort"></i></th>
                      <th class="txi-sort" onclick="txiSort('margin')">Margin <i class="fas fa-sort"></i></th>
                      <th class="txi-sort" onclick="txiSort('method')">Metode <i class="fas fa-sort"></i></th>
                      <th class="txi-sort" onclick="txiSort('status')">Status <i class="fas fa-sort"></i></th>
                      <th class="txi-sort" onclick="txiSort('age')">Usia <i class="fas fa-sort"></i></th>
                      <th class="txi-sort" onclick="txiSort('risk')">Risiko <i class="fas fa-sort"></i></th>
                      <th>Label</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody id="txiTableBody"></tbody>
                </table>
              </div>
              <div id="txiPagination" class="pgn"></div>
            </div>
          </section>

          <!-- ==================== TAB: ANALITIK TRANSAKSI ==================== -->
          <section id="sec-txintel" class="page-section stack">
            <div class="page-head">
              <div>
                <h2><i class="fas fa-chart-line"></i> Analitik Transaksi</h2>
                <p>Pembedahan performa transaksi: tren, jam sibuk, produk teratas, dan perilaku pengguna</p>
              </div>
              <div class="page-head-actions">
                <select id="txiIntelRange" class="inp" onchange="txiRenderAnalytics()" style="width:auto;height:2rem;font-size:.68rem;font-weight:700;">
                  <option value="7">7 hari terakhir</option>
                  <option value="14">14 hari terakhir</option>
                  <option value="30" selected>30 hari terakhir</option>
                  <option value="90">90 hari terakhir</option>
                  <option value="0">Seluruh data</option>
                </select>
                <button class="btn btn-soft btn-sm" onclick="txiExportAnalytics()"><i class="fas fa-file-csv"></i> Ekspor Ringkasan</button>
                <button class="btn btn-sm" onclick="txiRenderAnalytics()"><i class="fas fa-arrows-rotate"></i> Hitung Ulang</button>
              </div>
            </div>

            <div class="stat-grid" id="txiIntelKpi"></div>

            <div class="card">
              <div class="card-head"><h3><i class="fas fa-chart-column"></i> Tren Harian (Volume &amp; Jumlah)</h3><span class="badge b-mute" id="txiTrendInfo">-</span></div>
              <div class="card-body"><div class="bar-chart" id="txiTrendChart" style="display:flex;align-items:flex-end;gap:.2rem;height:11rem;"></div></div>
            </div>

            <div style="display:grid;grid-template-columns:1.3fr 1fr;gap:.8rem;" class="txi-two">
              <div class="card">
                <div class="card-head"><h3><i class="fas fa-fire"></i> Heatmap Jam Sibuk</h3><span class="badge b-mute">Hari × Jam</span></div>
                <div class="card-body"><div id="txiHeatmap" style="overflow:auto;"></div></div>
              </div>
              <div class="card">
                <div class="card-head"><h3><i class="fas fa-hourglass-half"></i> Umur Transaksi Pending</h3><span class="badge b-warn" id="txiAgingTotal">0</span></div>
                <div class="card-body"><div id="txiAging" class="stack"></div></div>
              </div>
            </div>

            <div style="display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:.8rem;" class="txi-two">
              <div class="card">
                <div class="card-head"><h3><i class="fas fa-crown"></i> Pengguna Teratas</h3><button class="btn btn-xs btn-soft" onclick="txiExportTop('user')"><i class="fas fa-download"></i></button></div>
                <div class="tbl-wrap"><table class="tbl"><thead><tr><th>#</th><th>Pengguna</th><th>Tx</th><th>Volume</th><th>Sukses</th><th></th></tr></thead><tbody id="txiTopUsers"></tbody></table></div>
              </div>
              <div class="card">
                <div class="card-head"><h3><i class="fas fa-box-open"></i> Produk Terlaris</h3><button class="btn btn-xs btn-soft" onclick="txiExportTop('product')"><i class="fas fa-download"></i></button></div>
                <div class="tbl-wrap"><table class="tbl"><thead><tr><th>#</th><th>Produk</th><th>Tx</th><th>Volume</th><th>Margin</th><th>Gagal</th></tr></thead><tbody id="txiTopProducts"></tbody></table></div>
              </div>
            </div>

            <div style="display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:.8rem;" class="txi-three">
              <div class="card">
                <div class="card-head"><h3><i class="fas fa-credit-card"></i> Metode Pembayaran</h3></div>
                <div class="tbl-wrap"><table class="tbl"><thead><tr><th>Metode</th><th>Tx</th><th>Volume</th><th>Share</th></tr></thead><tbody id="txiByMethod"></tbody></table></div>
              </div>
              <div class="card">
                <div class="card-head"><h3><i class="fas fa-layer-group"></i> Kategori Layanan</h3></div>
                <div class="tbl-wrap"><table class="tbl"><thead><tr><th>Layanan</th><th>Tx</th><th>Volume</th><th>Sukses</th></tr></thead><tbody id="txiByService"></tbody></table></div>
              </div>
              <div class="card">
                <div class="card-head"><h3><i class="fas fa-circle-exclamation"></i> Penyebab Kegagalan</h3></div>
                <div class="tbl-wrap"><table class="tbl"><thead><tr><th>Keterangan</th><th>Jumlah</th><th>Nilai</th></tr></thead><tbody id="txiFailReasons"></tbody></table></div>
              </div>
            </div>
          </section>

          <!-- ==================== TAB: REKONSILIASI ==================== -->
          <section id="sec-txrecon" class="page-section stack">
            <div class="page-head">
              <div>
                <h2><i class="fas fa-scale-balanced"></i> Rekonsiliasi &amp; Integritas Data</h2>
                <p>Pencocokan saldo pengguna, buku besar Doniguard, dan catatan transaksi</p>
              </div>
              <div class="page-head-actions">
                <span class="badge b-mute" id="txiReconScore">Skor: -</span>
                <button class="btn btn-soft btn-sm" onclick="txiExportRecon()"><i class="fas fa-file-csv"></i> Ekspor Laporan</button>
                <button class="btn btn-sm" onclick="txiRunRecon()"><i class="fas fa-play"></i> Jalankan Pemeriksaan</button>
              </div>
            </div>
            <div class="stat-grid" id="txiReconKpi"></div>
            <div class="card">
              <div class="card-head"><h3><i class="fas fa-clipboard-check"></i> Hasil Pemeriksaan</h3><span class="badge b-mute" id="txiReconIssueCount">0 temuan</span></div>
              <div class="tbl-wrap" style="max-height:34rem;">
                <table class="tbl">
                  <thead><tr><th>Tingkat</th><th>Jenis Temuan</th><th>Referensi</th><th>Pengguna</th><th>Keterangan</th><th>Selisih / Nilai</th><th>Aksi</th></tr></thead>
                  <tbody id="txiReconBody"></tbody>
                </table>
              </div>
            </div>
            <div class="card">
              <div class="card-head"><h3><i class="fas fa-user-shield"></i> Rekonsiliasi Saldo Per Pengguna</h3><span class="badge b-mute">Saldo tercatat vs buku besar</span></div>
              <div class="tbl-wrap" style="max-height:30rem;">
                <table class="tbl">
                  <thead><tr><th>Pengguna</th><th>Saldo Sistem</th><th>Saldo Akhir Ledger</th><th>Selisih</th><th>Total Belanja</th><th>Total Topup Sukses</th><th>Status</th><th>Aksi</th></tr></thead>
                  <tbody id="txiReconUserBody"></tbody>
                </table>
              </div>
            </div>
          </section>

          <!-- ==================== TAB: PELACAKAN PENGGUNA ==================== -->
          <section id="sec-txuser" class="page-section stack">
            <div class="page-head">
              <div>
                <h2><i class="fas fa-user-magnifying-glass"></i> Pelacakan Per Pengguna</h2>
                <p>Profil transaksi, linimasa gabungan, dan rekening koran tiap pengguna</p>
              </div>
              <div class="page-head-actions">
                <button class="btn btn-soft btn-sm" onclick="txiExportUserRanking()"><i class="fas fa-file-csv"></i> Ekspor Peringkat</button>
                <button class="btn btn-sm" onclick="txiRenderUserTrace()"><i class="fas fa-arrows-rotate"></i> Muat Ulang</button>
              </div>
            </div>
            <div style="display:grid;grid-template-columns:20rem 1fr;gap:.8rem;" class="txi-two">
              <div class="card">
                <div class="card-body" style="padding-bottom:.5rem;">
                  <div class="inp-icon"><i class="fas fa-magnifying-glass"></i>
                    <input type="text" id="txiUserSearch" class="inp" oninput="txiRenderUserList()" placeholder="Cari nama / HP / UID…">
                  </div>
                  <select id="txiUserSort" class="inp" onchange="txiRenderUserList()" style="margin-top:.4rem;">
                    <option value="vol">Urut: volume terbesar</option>
                    <option value="tx">Urut: transaksi terbanyak</option>
                    <option value="fail">Urut: kegagalan terbanyak</option>
                    <option value="last">Urut: aktivitas terbaru</option>
                    <option value="risk">Urut: risiko tertinggi</option>
                  </select>
                </div>
                <div class="tbl-wrap" style="max-height:38rem;"><div id="txiUserList" class="stack" style="padding:.4rem;"></div></div>
              </div>
              <div class="card">
                <div class="card-head"><h3><i class="fas fa-id-card-clip"></i> Profil Transaksi</h3>
                  <div class="row-wrap" style="gap:.3rem;">
                    <button class="btn btn-xs btn-soft" onclick="txiPrintStatement()"><i class="fas fa-print"></i> Cetak Rekening Koran</button>
                    <button class="btn btn-xs btn-soft" onclick="txiExportStatement()"><i class="fas fa-file-csv"></i> Ekspor</button>
                  </div>
                </div>
                <div class="card-body" id="txiUserProfile"><div class="tbl-empty"><i class="fas fa-user"></i>Pilih pengguna di sisi kiri untuk melihat detail pelacakan</div></div>
              </div>
            </div>
          </section>

          <!-- ==================== TAB: ALERT & WATCHLIST ==================== -->
          <section id="sec-txalert" class="page-section stack">
            <div class="page-head">
              <div>
                <h2><i class="fas fa-tower-broadcast"></i> Alert &amp; Watchlist Transaksi</h2>
                <p>Mesin aturan otomatis untuk mendeteksi transaksi mencurigakan secara realtime</p>
              </div>
              <div class="page-head-actions">
                <span class="badge b-bad" id="txiAlertCount">0 alert aktif</span>
                <button class="btn btn-soft btn-sm" onclick="txiAckAll()"><i class="fas fa-check-double"></i> Tandai Terbaca</button>
                <button class="btn btn-sm" onclick="txiRenderAlerts()"><i class="fas fa-arrows-rotate"></i> Evaluasi Ulang</button>
              </div>
            </div>

            <div class="card">
              <div class="card-head"><h3><i class="fas fa-sliders"></i> Konfigurasi Aturan</h3>
                <button class="btn btn-xs btn-pri" onclick="txiSaveRules()"><i class="fas fa-floppy-disk"></i> Simpan Aturan</button>
              </div>
              <div class="card-body">
                <div class="row-wrap" style="align-items:flex-end;gap:.5rem;">
                  <div style="width:11rem;"><label class="lbl">Nominal besar ≥ (Rp)</label><input type="number" id="txiRuleAmount" class="inp" value="500000"></div>
                  <div style="width:11rem;"><label class="lbl">SLA pending (menit)</label><input type="number" id="txiRuleSla" class="inp" value="60"></div>
                  <div style="width:11rem;"><label class="lbl">Beruntun gagal ≥</label><input type="number" id="txiRuleFail" class="inp" value="3"></div>
                  <div style="width:12rem;"><label class="lbl">Velocity (tx/jam) ≥</label><input type="number" id="txiRuleVelocity" class="inp" value="6"></div>
                  <div style="width:12rem;"><label class="lbl">Jendela duplikat (menit)</label><input type="number" id="txiRuleDupWindow" class="inp" value="15"></div>
                  <div style="width:12rem;"><label class="lbl">Notifikasi desktop</label>
                    <select id="txiRuleNotify" class="inp"><option value="0">Nonaktif</option><option value="1">Aktif</option></select>
                  </div>
                </div>
              </div>
            </div>

            <div style="display:grid;grid-template-columns:1.4fr 1fr;gap:.8rem;" class="txi-two">
              <div class="card">
                <div class="card-head"><h3><i class="fas fa-bell"></i> Feed Alert</h3>
                  <select id="txiAlertFilter" class="inp" onchange="txiRenderAlerts()" style="width:auto;height:1.8rem;font-size:.65rem;font-weight:700;">
                    <option value="open">Belum ditangani</option><option value="all">Semua</option><option value="ack">Sudah ditangani</option>
                  </select>
                </div>
                <div class="tbl-wrap" style="max-height:34rem;">
                  <table class="tbl"><thead><tr><th>Tingkat</th><th>Aturan</th><th>Ref ID</th><th>Pengguna</th><th>Detail</th><th>Waktu</th><th>Aksi</th></tr></thead><tbody id="txiAlertBody"></tbody></table>
                </div>
              </div>
              <div class="card">
                <div class="card-head"><h3><i class="fas fa-flag"></i> Watchlist Ditandai</h3><span class="badge b-mute" id="txiWatchCount">0</span></div>
                <div class="tbl-wrap" style="max-height:34rem;">
                  <table class="tbl"><thead><tr><th>Ref ID</th><th>Pengguna</th><th>Total</th><th>Status</th><th>Catatan</th><th></th></tr></thead><tbody id="txiWatchBody"></tbody></table>
                </div>
              </div>
            </div>
          </section>

          <!-- ==================== TAB: JEJAK AUDIT ADMIN ==================== -->
          <section id="sec-txaudit" class="page-section stack">
            <div class="page-head">
              <div>
                <h2><i class="fas fa-clipboard-list"></i> Jejak Audit Admin</h2>
                <p>Catatan seluruh tindakan admin terhadap transaksi pengguna pada perangkat ini</p>
              </div>
              <div class="page-head-actions">
                <span class="badge b-mute" id="txiAuditCount">0 entri</span>
                <button class="btn btn-soft btn-sm" onclick="txiExportAudit()"><i class="fas fa-file-csv"></i> Ekspor</button>
                <button class="btn btn-danger btn-sm" onclick="txiClearAudit()"><i class="fas fa-trash"></i> Bersihkan</button>
              </div>
            </div>
            <div class="card">
              <div class="card-body" style="padding-bottom:.5rem;">
                <div class="inp-icon" style="width:22rem;max-width:100%;"><i class="fas fa-magnifying-glass"></i>
                  <input type="text" id="txiAuditSearch" class="inp" oninput="txiRenderAudit()" placeholder="Cari aksi, ref, atau admin…">
                </div>
              </div>
              <div class="tbl-wrap" style="max-height:40rem;">
                <table class="tbl"><thead><tr><th>Waktu</th><th>Admin</th><th>Aksi</th><th>Ref / Target</th><th>Detail</th></tr></thead><tbody id="txiAuditBody"></tbody></table>
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

    <!-- ==================== MODAL: PELACAKAN TRANSAKSI ==================== -->
    <div id="txiModal" class="modal hidden">
      <div class="modal-card w-xl">
        <div class="modal-head">
          <div>
            <h3><i class="fas fa-route" style="color:var(--pri);"></i> Pelacakan Transaksi</h3>
            <p id="txiModalSub">-</p>
          </div>
          <button onclick="txiCloseModal()" class="modal-x" title="Tutup"><i class="fas fa-xmark"></i></button>
        </div>
        <div class="modal-body" style="padding:0;">
          <div class="chipbar no-sb" id="txiModalTabs" style="padding:.5rem .7rem;border-bottom:1px solid var(--border);">
            <button class="chip active" onclick="txiModalTab(this,'ringkas')">Ringkasan</button>
            <button class="chip" onclick="txiModalTab(this,'linimasa')">Linimasa</button>
            <button class="chip" onclick="txiModalTab(this,'keuangan')">Rincian Keuangan</button>
            <button class="chip" onclick="txiModalTab(this,'risiko')">Analisa Risiko</button>
            <button class="chip" onclick="txiModalTab(this,'terkait')">Transaksi Terkait</button>
            <button class="chip" onclick="txiModalTab(this,'catatan')">Catatan &amp; Label</button>
            <button class="chip" onclick="txiModalTab(this,'raw')">Data Mentah</button>
          </div>
          <div id="txiModalBody" style="padding:.7rem;"></div>
        </div>
        <div class="modal-foot">
          <button onclick="txiCloseModal()" class="btn btn-sm">Tutup</button>
          <button onclick="txiModalCopyAll()" class="btn btn-sm btn-soft"><i class="fas fa-copy"></i> Salin Ringkasan</button>
          <button onclick="txiModalPrint()" class="btn btn-sm btn-soft"><i class="fas fa-print"></i> Cetak Bukti</button>
          <button onclick="txiModalLiveCheck()" class="btn btn-pri btn-sm"><i class="fas fa-bolt"></i> Live Cek Status</button>
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
      .txi-two { grid-template-columns: 1fr !important; }
      .txi-three { grid-template-columns: 1fr !important; }
    }
    .txi-sort { cursor: pointer; user-select: none; white-space: nowrap; }
    .txi-sort:hover { color: var(--pri); }
    .txi-sort i { font-size: .55rem; opacity: .45; margin-left: .15rem; }
    tr.txi-flagged > td { background: var(--warn-soft) !important; }
    #txiTableBody input[type=checkbox], #txiCheckAll { accent-color: var(--pri); cursor: pointer; }
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
    
    const TAB_LIST = ["dashboard", "users", "promo", "settings", "tx", "topup_queue", "refund_audit", "markup", "landing", "doniguard", "livechat", "txtrace", "txintel", "txuser", "txrecon", "txalert", "txaudit"];
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
      doniguard: { t: "Doniguard", s: "Jejak audit mutasi saldo pengguna", i: "fa-shield-halved" },
      txtrace: { t: "Tracking Center", s: "Pelacakan mendalam transaksi seluruh pengguna", i: "fa-satellite-dish" },
      txintel: { t: "Analitik Transaksi", s: "Tren, jam sibuk, produk teratas & performa", i: "fa-chart-line" },
      txuser: { t: "Pelacakan Pengguna", s: "Profil transaksi & rekening koran per pengguna", i: "fa-user-magnifying-glass" },
      txrecon: { t: "Rekonsiliasi", s: "Pencocokan saldo, ledger & integritas data", i: "fa-scale-balanced" },
      txalert: { t: "Alert & Watchlist", s: "Deteksi otomatis transaksi mencurigakan", i: "fa-tower-broadcast" },
      txaudit: { t: "Jejak Audit Admin", s: "Rekaman tindakan admin atas transaksi", i: "fa-clipboard-list" }
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
      if (name === 'txtrace') { txiPopulateSelects(); txiRender(); }
      if (name === 'txintel') txiRenderAnalytics();
      if (name === 'txuser') txiRenderUserTrace();
      if (name === 'txrecon') txiRunRecon();
      if (name === 'txalert') { txiApplyRulesToForm(); txiRenderAlerts(); }
      if (name === 'txaudit') txiRenderAudit();
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
          txiRebuild();
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
       TRANSACTION TRACKING SUITE — PayNusa Control Center
       Mesin pelacakan transaksi lintas pengguna: normalisasi, filter lanjutan,
       skor risiko, rekonsiliasi saldo, alert otomatis, dan jejak audit.
       ===================================================================== */
    const TXI = {
      rows: [],           /* transaksi ternormalisasi */
      byRef: {},
      page: 1,
      sortKey: 'ts',
      sortDir: -1,
      selected: new Set(),
      auto: null,
      meta: {},           /* anotasi lokal: flag, note, tags */
      views: [],          /* tampilan filter tersimpan */
      alerts: [],
      audit: [],
      recon: { issues: [], users: [] },
      activeUser: null,
      modalRef: null,
      modalTab: 'ringkas',
      rules: { amount: 500000, sla: 60, fail: 3, velocity: 6, dup: 15, notify: 0 },
      lastSignature: ''
    };

    const TXI_LS = {
      meta: 'pn_txi_meta_v1',
      views: 'pn_txi_views_v1',
      audit: 'pn_txi_audit_v1',
      rules: 'pn_txi_rules_v1',
      ack: 'pn_txi_ack_v1'
    };

    function txiLoad(key, def) {
      try { const v = localStorage.getItem(key); return v ? JSON.parse(v) : def; } catch (e) { return def; }
    }
    function txiStore(key, val) {
      try { localStorage.setItem(key, JSON.stringify(val)); return true; } catch (e) { return false; }
    }

    /* ---------- util ---------- */
    const txiNum = (v) => { const n = Number(String(v === null || v === undefined ? 0 : v).toString().replace(/[^\d.-]/g, '')); return isFinite(n) ? n : 0; };
    const txiLower = (v) => String(v === null || v === undefined ? '' : v).toLowerCase();
    function txiParseTime(v) {
      if (!v) return 0;
      if (typeof v === 'number') return v < 1e12 ? v * 1000 : v;
      const s = String(v).trim();
      if (/^\d+$/.test(s)) { const n = Number(s); return n < 1e12 ? n * 1000 : n; }
      let t = Date.parse(s);
      if (!isNaN(t)) return t;
      /* format "dd/mm/yyyy hh:mm" atau "yyyy-mm-dd hh:mm:ss" */
      let m = s.match(/^(\d{1,2})[\/-](\d{1,2})[\/-](\d{4})[ T]?(\d{2})?:?(\d{2})?:?(\d{2})?/);
      if (m) return new Date(+m[3], +m[2] - 1, +m[1], +(m[4] || 0), +(m[5] || 0), +(m[6] || 0)).getTime();
      m = s.match(/^(\d{4})-(\d{2})-(\d{2})[ T](\d{2}):(\d{2}):?(\d{2})?/);
      if (m) return new Date(+m[1], +m[2] - 1, +m[3], +m[4], +m[5], +(m[6] || 0)).getTime();
      return 0;
    }
    function txiRelTime(ms) {
      if (!ms) return '-';
      const d = Date.now() - ms;
      const a = Math.abs(d), suf = d >= 0 ? ' lalu' : ' lagi';
      if (a < 60000) return Math.round(a / 1000) + ' dtk' + suf;
      if (a < 3600000) return Math.round(a / 60000) + ' mnt' + suf;
      if (a < 86400000) return Math.round(a / 3600000) + ' jam' + suf;
      if (a < 2592000000) return Math.round(a / 86400000) + ' hari' + suf;
      return Math.round(a / 2592000000) + ' bln' + suf;
    }
    const txiDur = (ms) => {
      if (!ms || ms < 0) return '-';
      const m = Math.floor(ms / 60000);
      if (m < 60) return m + 'm';
      const h = Math.floor(m / 60);
      if (h < 24) return h + 'j ' + (m % 60) + 'm';
      return Math.floor(h / 24) + 'h ' + (h % 24) + 'j';
    };
    const txiDayKey = (ms) => { const d = new Date(ms); return d.getFullYear() + '-' + String(d.getMonth() + 1).padStart(2, '0') + '-' + String(d.getDate()).padStart(2, '0'); };
    function txiHash(str) {
      let h = 5381;
      for (let i = 0; i < str.length; i++) h = ((h << 5) + h + str.charCodeAt(i)) >>> 0;
      return h.toString(16).toUpperCase().padStart(8, '0');
    }

    /* ---------- normalisasi transaksi ---------- */
    function txiCanonStatus(s) {
      const v = txiLower(s).trim();
      if (['success', 'sukses', 'berhasil', 'done', 'settled', 'paid', 'completed', '1'].includes(v)) return 'success';
      if (['pending', 'proses', 'process', 'processing', 'menunggu', 'waiting', 'unpaid', '0'].includes(v)) return 'pending';
      if (!v) return 'pending';
      return 'failed';
    }
    function txiServiceOf(t) {
      if (t.sid) {
        const map = { topup: 'Top Up Saldo', tarik: 'Tarik Tunai', qris: 'QRIS Merchant', pulsa: 'Pulsa', data: 'Paket Data', pln: 'PLN', game: 'Voucher Game', ewallet: 'E-Wallet' };
        if (map[t.sid]) return map[t.sid];
      }
      if (t.serviceName) return String(t.serviceName);
      const p = txiLower(t.product);
      if (p.includes('top up saldo') || p.includes('topup')) return 'Top Up Saldo';
      if (p.includes('tarik tunai')) return 'Tarik Tunai';
      if (p.includes('pln') || p.includes('listrik') || p.includes('token')) return 'PLN';
      if (p.includes('pulsa')) return 'Pulsa';
      if (p.includes('data') || p.includes('kuota')) return 'Paket Data';
      if (p.includes('bpjs')) return 'BPJS';
      if (p.includes('pdam')) return 'PDAM';
      if (p.includes('game') || p.includes('diamond') || p.includes('uc ')) return 'Voucher Game';
      if (p.includes('dana') || p.includes('ovo') || p.includes('gopay') || p.includes('shopeepay')) return 'E-Wallet';
      return 'Lainnya';
    }
    function txiDirectionOf(t, svc) {
      if (svc === 'Top Up Saldo') return 'in';
      if (svc === 'Tarik Tunai') return 'out';
      return 'out';
    }

    function txiNormalize() {
      const userIdx = {};
      (usersData || []).forEach(u => {
        const key = String(u.uid || '');
        userIdx[key] = u;
        if (u.user && u.user.phone) userIdx['p_' + String(u.user.phone)] = u;
      });

      const rows = (allTxData || []).map((t, i) => {
        const ts = txiParseTime(t.date || t.timestamp || t.created_at || t.waktu);
        const status = txiCanonStatus(t.status);
        const svc = txiServiceOf(t);
        const total = txiNum(t.total);
        const amount = txiNum(t.amount) || total;
        const admin = txiNum(t.admin);
        const disc = txiNum(t.discount);
        const modal = txiNum(t.harga_asli != null ? t.harga_asli : (t.price_base != null ? t.price_base : (t.modal != null ? t.modal : 0)));
        let margin = txiNum(t.profit || t.margin);
        if (!margin) {
          if (modal > 0) margin = total - modal;
          else margin = admin - disc;
        }
        const uref = userIdx[String(t.uid || '')] || userIdx['p_' + String(t.user_phone || '')] || null;
        const phone = t.user_phone || (uref && uref.user ? uref.user.phone : '') || '';
        const name = t.user_name || (uref && uref.user ? uref.user.name : '') || '';
        const uid = t.uid || (uref ? uref.uid : (phone ? 'u_' + phone : 'unknown'));
        const ref = String(t.ref || t.refid || t.id || ('NOREF-' + i));
        const meta = TXI.meta[ref] || {};
        const settled = txiParseTime(t.settled_at || t.updated_at || t.date_success);
        return {
          i, raw: t, ref, uid, phone, name,
          userKnown: !!uref,
          product: String(t.product || '-'),
          productCode: String(t.productCode || t.kode || ''),
          customer: String(t.customer || '-'),
          customerName: String(t.customerName || ''),
          service: svc,
          direction: txiDirectionOf(t, svc),
          method: String(t.method || '-'),
          methodId: String(t.methodId || ''),
          status,
          rawStatus: String(t.status || ''),
          refundStatus: String(t.refund_status || ''),
          note: String(t.keterangan || t.message || t.note || ''),
          serial: String(t.token || t.serial || t.sn || ''),
          ts, settled,
          age: ts ? Date.now() - ts : 0,
          settleMs: (settled && ts && settled > ts) ? settled - ts : 0,
          total, amount, admin, disc, modal, margin,
          marginPct: total ? (margin / total) * 100 : 0,
          flag: !!meta.flag,
          adminNote: meta.note || '',
          tags: Array.isArray(meta.tags) ? meta.tags : [],
          fingerprint: txiHash([uid, t.product, t.customer, total].join('|')),
          dup: false, risk: 0, riskReasons: []
        };
      });

      /* deteksi duplikat: user+produk+tujuan+nominal dalam jendela waktu */
      const win = (TXI.rules.dup || 15) * 60000;
      const groups = {};
      rows.forEach(r => { (groups[r.fingerprint] = groups[r.fingerprint] || []).push(r); });
      Object.values(groups).forEach(g => {
        if (g.length < 2) return;
        g.sort((a, b) => a.ts - b.ts);
        for (let i = 1; i < g.length; i++) {
          if (g[i].ts && g[i - 1].ts && (g[i].ts - g[i - 1].ts) <= win) { g[i].dup = true; g[i - 1].dup = true; }
        }
      });

      /* velocity per user per jam */
      const vel = {};
      rows.forEach(r => {
        if (!r.ts) return;
        const k = r.uid + '|' + Math.floor(r.ts / 3600000);
        vel[k] = (vel[k] || 0) + 1;
      });
      rows.forEach(r => { r.velocity = r.ts ? (vel[r.uid + '|' + Math.floor(r.ts / 3600000)] || 1) : 1; });

      rows.forEach(r => txiScoreRisk(r));
      rows.sort((a, b) => b.ts - a.ts);

      TXI.rows = rows;
      TXI.byRef = {};
      rows.forEach(r => { TXI.byRef[r.ref] = r; });
      return rows;
    }

    function txiScoreRisk(r) {
      let s = 0; const why = [];
      const R = TXI.rules;
      if (r.total >= R.amount) { s += 25; why.push('Nominal besar (' + rp(r.total) + ')'); }
      if (r.total >= R.amount * 4) { s += 15; why.push('Nominal sangat besar'); }
      if (r.dup) { s += 30; why.push('Terindikasi duplikat dalam ' + R.dup + ' menit'); }
      if (r.status === 'pending' && r.age > R.sla * 60000) { s += 20; why.push('Pending melebihi SLA ' + R.sla + ' menit'); }
      if (r.status === 'failed' && !r.refundStatus) { s += 20; why.push('Gagal tanpa catatan refund'); }
      if (r.velocity >= R.velocity) { s += 15; why.push('Velocity tinggi: ' + r.velocity + ' tx/jam'); }
      if (!r.userKnown) { s += 15; why.push('Pengguna tidak terdaftar di database'); }
      if (r.margin < 0) { s += 20; why.push('Margin negatif ' + rp(r.margin)); }
      if (r.status === 'success' && !r.serial && r.service !== 'Top Up Saldo' && r.service !== 'QRIS Merchant' && r.service !== 'Lainnya') { s += 10; why.push('Sukses tanpa SN/token'); }
      if (r.ts && (r.ts - Date.now()) > 3600000) { s += 25; why.push('Timestamp di masa depan'); }
      if (!r.ts) { s += 10; why.push('Tanggal transaksi tidak valid'); }
      const h = r.ts ? new Date(r.ts).getHours() : 12;
      if (r.total >= R.amount && (h >= 0 && h < 5)) { s += 10; why.push('Transaksi besar dini hari'); }
      r.risk = Math.min(100, s);
      r.riskReasons = why;
      r.riskLevel = r.risk >= 60 ? 'tinggi' : (r.risk >= 30 ? 'sedang' : 'rendah');
      return r.risk;
    }

    const txiRiskBadge = (r) => {
      const cls = r.risk >= 60 ? 'b-bad' : (r.risk >= 30 ? 'b-warn' : 'b-ok');
      return `<span class="badge ${cls}" title="${esc(r.riskReasons.join(' • ') || 'Tidak ada indikator risiko')}">${r.risk}</span>`;
    };

    /* ---------- filter ---------- */
    function txiVal(id, def) { const el = $(id); return el ? el.value : (def !== undefined ? def : ''); }

    function txiFilter() {
      const q = txiVal('txiSearch').trim();
      const mode = txiVal('txiSearchMode', 'loose');
      const st = txiVal('txiStatus');
      const method = txiVal('txiMethod');
      const svc = txiVal('txiService');
      const user = txiVal('txiUser');
      const min = txiVal('txiMin'), max = txiVal('txiMax');
      const from = txiVal('txiFrom'), to = txiVal('txiTo');
      const special = txiVal('txiSpecial');
      const fromMs = from ? new Date(from + 'T00:00:00').getTime() : 0;
      const toMs = to ? new Date(to + 'T23:59:59.999').getTime() : 0;
      let rx = null;
      if (mode === 'regex' && q) { try { rx = new RegExp(q, 'i'); } catch (e) { rx = null; } }
      const ql = q.toLowerCase();

      return TXI.rows.filter(r => {
        if (st && r.status !== st) return false;
        if (method && r.method !== method) return false;
        if (svc && r.service !== svc) return false;
        if (user && r.uid !== user) return false;
        if (min !== '' && r.total < Number(min)) return false;
        if (max !== '' && r.total > Number(max)) return false;
        if (fromMs && r.ts < fromMs) return false;
        if (toMs && r.ts > toMs) return false;
        if (special === 'flag' && !r.flag) return false;
        if (special === 'note' && !r.adminNote) return false;
        if (special === 'tag' && !r.tags.length) return false;
        if (special === 'dup' && !r.dup) return false;
        if (special === 'sla' && !(r.status === 'pending' && r.age > TXI.rules.sla * 60000)) return false;
        if (special === 'risk' && r.risk < 60) return false;
        if (special === 'norefund' && !(r.status === 'failed' && !r.refundStatus)) return false;
        if (special === 'orphan' && r.userKnown) return false;
        if (!q) return true;
        const hay = [r.ref, r.uid, r.name, r.phone, r.product, r.productCode, r.customer, r.customerName, r.method, r.service, r.serial, r.note, r.tags.join(' '), r.adminNote];
        if (rx) return hay.some(v => rx.test(String(v || '')));
        if (mode === 'exact') return hay.some(v => txiLower(v) === ql);
        return hay.some(v => txiLower(v).includes(ql));
      });
    }

    function txiSortRows(list) {
      const k = TXI.sortKey, d = TXI.sortDir;
      const get = {
        ref: r => r.ref, ts: r => r.ts, user: r => (r.name || r.phone || r.uid).toLowerCase(),
        product: r => r.product.toLowerCase(), total: r => r.total, margin: r => r.margin,
        method: r => r.method.toLowerCase(), status: r => r.status, age: r => r.age, risk: r => r.risk
      }[k] || (r => r.ts);
      return list.slice().sort((a, b) => {
        const x = get(a), y = get(b);
        if (x === y) return b.ts - a.ts;
        return (x > y ? 1 : -1) * d;
      });
    }

    function txiSort(key) {
      if (TXI.sortKey === key) TXI.sortDir *= -1; else { TXI.sortKey = key; TXI.sortDir = (key === 'ref' || key === 'user' || key === 'product' || key === 'method' || key === 'status') ? 1 : -1; }
      txiRender(1);
    }

    function txiSetPreset(el, p) {
      if (el && el.parentElement) [...el.parentElement.children].forEach(c => c.classList.remove('active'));
      if (el) el.classList.add('active');
      const f = $('txiFrom'), t = $('txiTo');
      const d = new Date(); d.setHours(0, 0, 0, 0);
      const iso = (x) => x.getFullYear() + '-' + String(x.getMonth() + 1).padStart(2, '0') + '-' + String(x.getDate()).padStart(2, '0');
      if (p === 'all') { f.value = ''; t.value = ''; }
      else if (p === 'today') { f.value = iso(d); t.value = iso(d); }
      else if (p === 'yesterday') { const y = new Date(d); y.setDate(y.getDate() - 1); f.value = iso(y); t.value = iso(y); }
      else if (p === '7d') { const s = new Date(d); s.setDate(s.getDate() - 6); f.value = iso(s); t.value = iso(d); }
      else if (p === '30d') { const s = new Date(d); s.setDate(s.getDate() - 29); f.value = iso(s); t.value = iso(d); }
      else if (p === 'month') { f.value = iso(new Date(d.getFullYear(), d.getMonth(), 1)); t.value = iso(d); }
      else if (p === 'lastmonth') { f.value = iso(new Date(d.getFullYear(), d.getMonth() - 1, 1)); t.value = iso(new Date(d.getFullYear(), d.getMonth(), 0)); }
      txiRender(1);
    }

    function txiResetFilters() {
      ['txiSearch', 'txiMin', 'txiMax', 'txiFrom', 'txiTo'].forEach(id => { const e = $(id); if (e) e.value = ''; });
      ['txiStatus', 'txiMethod', 'txiService', 'txiUser', 'txiSpecial'].forEach(id => { const e = $(id); if (e) e.value = ''; });
      const sm = $('txiSearchMode'); if (sm) sm.value = 'loose';
      const bar = $('txiPresetBar'); if (bar) [...bar.children].forEach((c, i) => c.classList.toggle('active', i === 0));
      TXI.selected.clear();
      txiRender(1);
      toast('Filter pelacakan direset', 'ok');
    }

    function txiPopulateSelects() {
      const fill = (id, values, keyer) => {
        const el = $(id); if (!el) return;
        const cur = el.value;
        const first = el.options[0] ? el.options[0].outerHTML : '';
        el.innerHTML = first + values.map(v => `<option value="${esc(v.v)}">${esc(v.l)}</option>`).join('');
        el.value = cur;
      };
      const methods = [...new Set(TXI.rows.map(r => r.method).filter(Boolean))].sort();
      fill('txiMethod', methods.map(m => ({ v: m, l: m })));
      const svcs = [...new Set(TXI.rows.map(r => r.service).filter(Boolean))].sort();
      fill('txiService', svcs.map(s => ({ v: s, l: s })));
      const seen = {}, users = [];
      TXI.rows.forEach(r => { if (!seen[r.uid]) { seen[r.uid] = 1; users.push({ v: r.uid, l: (r.name || '(tanpa nama)') + ' — ' + (r.phone || r.uid) }); } });
      users.sort((a, b) => a.l.localeCompare(b.l));
      fill('txiUser', users);
    }

    /* ---------- tabel tracking center ---------- */
    function txiRender(page) {
      if (!$('txiTableBody')) return;
      if (page) TXI.page = page;
      const all = txiFilter();
      const sorted = txiSortRows(all);
      const size = Number(txiVal('txiPageSize', 50)) || 50;
      const totalPages = Math.ceil(sorted.length / size) || 1;
      if (TXI.page > totalPages) TXI.page = totalPages;
      const start = (TXI.page - 1) * size;
      const view = sorted.slice(start, start + size);

      $('txiTableBody').innerHTML = view.map(r => {
        const slaBad = r.status === 'pending' && r.age > TXI.rules.sla * 60000;
        return `
        <tr class="${r.flag ? 'txi-flagged' : ''}">
          <td><input type="checkbox" class="txi-cb" data-ref="${esc(r.ref)}" ${TXI.selected.has(r.ref) ? 'checked' : ''} onclick="txiToggleRow('${esc(r.ref)}',this.checked)"></td>
          <td>
            <span class="cell-mono">${esc(r.ref)}</span>
            <div class="cell-sub">${r.dup ? '<span class="badge b-bad">DUPLIKAT</span> ' : ''}${r.flag ? '<span class="badge b-warn"><i class="fas fa-flag"></i></span> ' : ''}${r.adminNote ? '<span class="badge b-mute" title="' + esc(r.adminNote) + '"><i class="fas fa-note-sticky"></i></span>' : ''}</div>
          </td>
          <td class="cell-sub">${fmtDate(r.ts || null)}<div class="cell-sub">${txiRelTime(r.ts)}</div></td>
          <td>
            <span class="cell-strong">${esc(r.name || '(tanpa nama)')}</span>
            <div class="cell-sub">${esc(r.phone || r.uid)}${r.userKnown ? '' : ' <span class="badge b-bad">ORPHAN</span>'}</div>
          </td>
          <td>${esc(r.product)}<div class="cell-sub">${esc(r.service)}</div></td>
          <td>${esc(r.customer)}${r.customerName ? '<div class="cell-sub">' + esc(r.customerName) + '</div>' : ''}</td>
          <td class="cell-money">${rp(r.total)}</td>
          <td class="cell-money" style="color:${r.margin < 0 ? 'var(--bad)' : 'var(--ok)'};">${rp(r.margin)}</td>
          <td><span class="badge b-mute">${esc(r.method)}</span></td>
          <td>${statusBadge(r.status)}${r.refundStatus ? ' <span class="badge b-ok">RF</span>' : ''}</td>
          <td class="cell-sub" style="${slaBad ? 'color:var(--bad);font-weight:800;' : ''}">${txiDur(r.age)}${slaBad ? ' <i class="fas fa-triangle-exclamation"></i>' : ''}</td>
          <td>${txiRiskBadge(r)}</td>
          <td>${r.tags.length ? r.tags.map(t => '<span class="badge b-pri">' + esc(t) + '</span>').join(' ') : '<span class="cell-sub">-</span>'}</td>
          <td>
            <div class="row-wrap" style="gap:.2rem;">
              <button class="btn btn-xs btn-soft" onclick="txiOpenModal('${esc(r.ref)}')" title="Lacak detail"><i class="fas fa-route"></i></button>
              <button class="btn btn-xs btn-warn" onclick="txiLiveCheck('${esc(r.ref)}')" title="Live cek provider"><i class="fas fa-bolt"></i></button>
              <button class="btn btn-xs btn-ok" onclick="txiSetStatus('${esc(r.ref)}','success')" title="Tandai sukses"><i class="fas fa-check"></i></button>
              <button class="btn btn-xs btn-danger" onclick="txiSetStatus('${esc(r.ref)}','failed')" title="Tandai gagal"><i class="fas fa-xmark"></i></button>
              <button class="btn btn-xs btn-soft" onclick="txiToggleFlagOne('${esc(r.ref)}')" title="Tandai pantau"><i class="${r.flag ? 'fas' : 'far'} fa-flag"></i></button>
              <button class="btn btn-xs btn-soft" onclick="txiTraceUser('${esc(r.uid)}')" title="Lacak pengguna"><i class="fas fa-user-magnifying-glass"></i></button>
            </div>
          </td>
        </tr>`;
      }).join('') || emptyRow(14, 'Tidak ada transaksi yang cocok dengan filter', 'fa-magnifying-glass');

      renderPaginationControls('txiPagination', TXI.page, totalPages, sorted.length, 'txiRender');
      txiRenderKpi(all);
      setTxt('txiCountInfo', all.length.toLocaleString('id-ID') + ' hasil');
      txiUpdateSelInfo();
      const ca = $('txiCheckAll');
      if (ca) ca.checked = view.length > 0 && view.every(r => TXI.selected.has(r.ref));
    }

    function txiRenderKpi(list) {
      const vol = list.filter(r => r.status === 'success').reduce((a, r) => a + r.total, 0);
      const margin = list.filter(r => r.status === 'success').reduce((a, r) => a + r.margin, 0);
      const pend = list.filter(r => r.status === 'pending');
      const pendVol = pend.reduce((a, r) => a + r.total, 0);
      const sla = pend.filter(r => r.age > TXI.rules.sla * 60000).length;
      setTxt('txiKpiVolume', rp(vol));
      setTxt('txiKpiCount', list.length.toLocaleString('id-ID') + ' transaksi');
      setTxt('txiKpiMargin', rp(margin));
      setTxt('txiKpiMarginPct', (vol ? (margin / vol * 100).toFixed(2) : '0.00') + '%');
      setTxt('txiKpiPending', rp(pendVol));
      setTxt('txiKpiSla', sla + ' langgar SLA');
      setTxt('txiKpiRisk', list.filter(r => r.risk >= 60).length);
      setTxt('txiKpiDup', list.filter(r => r.dup).length + ' duplikat');
    }

    /* ---------- seleksi & aksi massal ---------- */
    function txiToggleRow(ref, on) { if (on) TXI.selected.add(ref); else TXI.selected.delete(ref); txiUpdateSelInfo(); }
    function txiToggleAll(on) {
      document.querySelectorAll('.txi-cb').forEach(cb => { cb.checked = on; const r = cb.dataset.ref; if (on) TXI.selected.add(r); else TXI.selected.delete(r); });
      txiUpdateSelInfo();
    }
    function txiUpdateSelInfo() {
      const n = TXI.selected.size;
      const sum = [...TXI.selected].reduce((a, ref) => a + ((TXI.byRef[ref] && TXI.byRef[ref].total) || 0), 0);
      setTxt('txiSelInfo', n + ' dipilih' + (n ? ' • ' + rp(sum) : ''));
    }
    const txiSelectedRows = () => [...TXI.selected].map(r => TXI.byRef[r]).filter(Boolean);

    async function txiBulkStatus(status) {
      const rows = txiSelectedRows();
      if (!rows.length) return toast('Pilih minimal satu transaksi terlebih dahulu', 'warn');
      if (!confirm('Ubah status ' + rows.length + ' transaksi menjadi ' + status.toUpperCase() + '?')) return;
      let ok = 0, fail = 0;
      for (const r of rows) {
        try {
          const d = await secureFetch('manager.php?action=update_tx_status', { uid: r.uid, ref: r.ref, status });
          if (d && d.status !== false) ok++; else fail++;
          txiLog('ubah_status', r.ref, 'Status → ' + status + ' (' + (r.name || r.uid) + ')');
        } catch (e) { fail++; }
      }
      toast(ok + ' transaksi diperbarui' + (fail ? ', ' + fail + ' gagal' : ''), fail ? 'warn' : 'ok');
      TXI.selected.clear();
      await initAdminDashboard();
    }

    async function txiBulkLiveCheck() {
      const rows = txiSelectedRows();
      if (!rows.length) return toast('Pilih transaksi yang ingin dicek', 'warn');
      toast('Menjalankan live check untuk ' + rows.length + ' transaksi…', 'info');
      let ok = 0;
      for (const r of rows) {
        try {
          const res = await fetch('cektrx.php', { method: 'POST', headers: { 'Content-Type': 'application/json' }, body: JSON.stringify({ action: 'status', refid: r.ref }) });
          const data = await res.json();
          r.raw.raw_response = data;
          await secureFetch('manager.php?action=save_tx', { uid: r.uid, tx: r.raw });
          ok++;
          txiLog('live_check', r.ref, 'Live cek provider dijalankan');
        } catch (e) {}
      }
      toast(ok + ' transaksi tersinkron dengan provider', 'ok');
      await initAdminDashboard();
    }

    function txiBulkFlag(on) {
      const rows = txiSelectedRows();
      if (!rows.length) return toast('Pilih transaksi terlebih dahulu', 'warn');
      rows.forEach(r => { txiSetMeta(r.ref, { flag: on }); r.flag = on; });
      txiLog(on ? 'tandai_pantau' : 'lepas_pantau', rows.length + ' transaksi', rows.map(r => r.ref).slice(0, 12).join(', '));
      toast(rows.length + ' transaksi ' + (on ? 'masuk' : 'keluar dari') + ' watchlist', 'ok');
      txiRender(); txiRenderAlerts();
    }

    function txiBulkTag() {
      const rows = txiSelectedRows();
      if (!rows.length) return toast('Pilih transaksi terlebih dahulu', 'warn');
      const tag = prompt('Masukkan label (pisahkan dengan koma untuk beberapa label):', '');
      if (tag === null) return;
      const tags = tag.split(',').map(s => s.trim()).filter(Boolean);
      rows.forEach(r => {
        const merged = [...new Set([...(r.tags || []), ...tags])];
        txiSetMeta(r.ref, { tags: merged }); r.tags = merged;
      });
      txiLog('beri_label', rows.length + ' transaksi', 'Label: ' + tags.join(', '));
      toast('Label diterapkan ke ' + rows.length + ' transaksi', 'ok');
      txiRender();
    }

    function txiCopySelectedRefs() {
      const rows = txiSelectedRows();
      if (!rows.length) return toast('Belum ada transaksi dipilih', 'warn');
      copyText(rows.map(r => r.ref).join('\n'));
    }

    async function txiBulkDelete() {
      const rows = txiSelectedRows();
      if (!rows.length) return toast('Pilih transaksi terlebih dahulu', 'warn');
      if (!confirm('HAPUS PERMANEN ' + rows.length + ' transaksi? Tindakan ini tidak dapat dibatalkan.')) return;
      let ok = 0;
      for (const r of rows) {
        try {
          let d = await secureFetch('manager.php?action=delete_tx', { ref: r.ref, refid: r.ref, uid: r.uid });
          if (!d || !d.status) d = await secureFetch('manager.php?action=delete_transaction', { ref: r.ref, refid: r.ref, uid: r.uid });
          ok++;
          txiLog('hapus_transaksi', r.ref, 'Dihapus oleh admin (' + rp(r.total) + ')');
        } catch (e) {}
      }
      toast(ok + ' transaksi dihapus', 'ok');
      TXI.selected.clear();
      await initAdminDashboard();
    }

    function txiToggleFlagOne(ref) {
      const r = TXI.byRef[ref]; if (!r) return;
      r.flag = !r.flag; txiSetMeta(ref, { flag: r.flag });
      txiLog(r.flag ? 'tandai_pantau' : 'lepas_pantau', ref, r.flag ? 'Masuk watchlist' : 'Keluar watchlist');
      toast(ref + (r.flag ? ' ditandai untuk dipantau' : ' dilepas dari watchlist'), 'ok');
      txiRender(); txiRenderAlerts();
    }

    async function txiSetStatus(ref, status) {
      const r = TXI.byRef[ref]; if (!r) return;
      if (!confirm('Ubah status ' + ref + ' menjadi ' + status.toUpperCase() + '?')) return;
      try {
        const d = await secureFetch('manager.php?action=update_tx_status', { uid: r.uid, ref, status });
        txiLog('ubah_status', ref, 'Status → ' + status);
        toast((d && d.message) || ('Status ' + ref + ' diperbarui'), 'ok');
        await initAdminDashboard();
      } catch (e) { toast('Gagal memperbarui status transaksi', 'err'); }
    }

    async function txiLiveCheck(ref) {
      const r = TXI.byRef[ref]; if (!r) return;
      try {
        const res = await fetch('cektrx.php', { method: 'POST', headers: { 'Content-Type': 'application/json' }, body: JSON.stringify({ action: 'status', refid: ref }) });
        const data = await res.json();
        r.raw.raw_response = data;
        await secureFetch('manager.php?action=save_tx', { uid: r.uid, tx: r.raw });
        txiLog('live_check', ref, 'Respon: ' + JSON.stringify(data).slice(0, 180));
        toast('Respon provider: ' + JSON.stringify(data).slice(0, 200), 'info', 'Live Status ' + ref);
        await initAdminDashboard();
        if (TXI.modalRef === ref) txiOpenModal(ref);
      } catch (e) { toast('Gagal melakukan live check', 'err'); }
    }

    function txiSetMeta(ref, patch) {
      TXI.meta[ref] = Object.assign({}, TXI.meta[ref] || {}, patch);
      txiStore(TXI_LS.meta, TXI.meta);
    }

    /* ---------- auto tracking ---------- */
    function txiToggleAuto() {
      if (TXI.auto) { clearInterval(TXI.auto); TXI.auto = null; setTxt('txiAutoInfo', 'Auto: mati'); toast('Auto lacak dimatikan', 'info'); return; }
      TXI.auto = setInterval(() => { fetchTransactions(); }, 20000);
      setTxt('txiAutoInfo', 'Auto: 20 detik');
      toast('Auto lacak aktif — menyegarkan tiap 20 detik', 'ok');
    }
    function txiRefresh() { fetchTransactions(); toast('Memuat ulang data pelacakan…', 'info'); }

    /* ---------- tampilan tersimpan & tautan filter ---------- */
    function txiCollectFilters() {
      const ids = ['txiSearch', 'txiSearchMode', 'txiStatus', 'txiMethod', 'txiService', 'txiUser', 'txiMin', 'txiMax', 'txiFrom', 'txiTo', 'txiSpecial', 'txiPageSize'];
      const o = {}; ids.forEach(i => { const e = $(i); if (e) o[i] = e.value; });
      o._sk = TXI.sortKey; o._sd = TXI.sortDir;
      return o;
    }
    function txiApplyFilters(o) {
      Object.keys(o || {}).forEach(k => { if (k[0] === '_') return; const e = $(k); if (e) e.value = o[k]; });
      if (o._sk) TXI.sortKey = o._sk;
      if (o._sd) TXI.sortDir = o._sd;
      txiRender(1);
    }
    function txiSaveView() {
      const name = prompt('Nama tampilan filter:', 'Tampilan ' + (TXI.views.length + 1));
      if (!name) return;
      TXI.views.push({ name, f: txiCollectFilters() });
      txiStore(TXI_LS.views, TXI.views);
      txiRenderViews();
      toast('Tampilan "' + name + '" disimpan', 'ok');
    }
    function txiRenderViews() {
      const bar = $('txiViewBar'); if (!bar) return;
      bar.innerHTML = TXI.views.length
        ? TXI.views.map((v, i) => `<span class="badge b-pri" style="cursor:pointer;" onclick="txiApplyFilters(TXI.views[${i}].f)">${esc(v.name)} <i class="fas fa-xmark" style="margin-left:.25rem;" onclick="event.stopPropagation();txiDeleteView(${i})"></i></span>`).join('')
        : '<span class="cell-sub">Belum ada tampilan filter tersimpan.</span>';
    }
    function txiDeleteView(i) { TXI.views.splice(i, 1); txiStore(TXI_LS.views, TXI.views); txiRenderViews(); toast('Tampilan dihapus', 'ok'); }
    function txiShareLink() {
      const f = txiCollectFilters();
      const url = location.origin + location.pathname + '#txi=' + encodeURIComponent(btoa(unescape(encodeURIComponent(JSON.stringify(f)))));
      copyText(url);
    }
    function txiLoadHashFilters() {
      const m = location.hash.match(/#txi=(.+)$/);
      if (!m) return;
      try { txiApplyFilters(JSON.parse(decodeURIComponent(escape(atob(decodeURIComponent(m[1])))))); } catch (e) {}
    }

    /* ---------- ekspor ---------- */
    function txiExport(fmt) {
      const rows = TXI.selected.size ? txiSelectedRows() : txiSortRows(txiFilter());
      if (!rows.length) return toast('Tidak ada data untuk diekspor', 'warn');
      const plain = rows.map(r => ({
        ref: r.ref, waktu: r.ts ? new Date(r.ts).toISOString() : '', uid: r.uid, nama: r.name, hp: r.phone,
        layanan: r.service, produk: r.product, kode_produk: r.productCode, tujuan: r.customer, nama_tujuan: r.customerName,
        nominal: r.amount, admin: r.admin, diskon: r.disc, total: r.total, modal: r.modal, margin: r.margin,
        metode: r.method, status: r.status, refund: r.refundStatus, sn: r.serial, keterangan: r.note,
        risiko: r.risk, level_risiko: r.riskLevel, duplikat: r.dup ? 'ya' : 'tidak', velocity: r.velocity,
        usia: txiDur(r.age), label: r.tags.join('|'), catatan_admin: r.adminNote, ditandai: r.flag ? 'ya' : 'tidak'
      }));
      const stamp = Date.now();
      if (fmt === 'json') return txiDownloadText('paynusa-tracking-' + stamp + '.json', JSON.stringify(plain, null, 2), 'application/json');
      if (fmt === 'ndjson') return txiDownloadText('paynusa-tracking-' + stamp + '.ndjson', plain.map(o => JSON.stringify(o)).join('\n'), 'application/x-ndjson');
      const head = Object.keys(plain[0]);
      downloadCSV('paynusa-tracking-' + stamp + '.csv', [head, ...plain.map(o => head.map(h => o[h]))]);
    }
    function txiDownloadText(filename, text, mime) {
      const blob = new Blob(['\ufeff' + text], { type: (mime || 'text/plain') + ';charset=utf-8;' });
      const a = document.createElement('a');
      a.href = URL.createObjectURL(blob); a.download = filename;
      document.body.appendChild(a); a.click(); a.remove();
      setTimeout(() => URL.revokeObjectURL(a.href), 1500);
      toast('Berkas ' + filename + ' diunduh', 'ok');
    }

    /* ---------- modal pelacakan detail ---------- */
    function txiOpenModal(ref) {
      const r = TXI.byRef[ref]; if (!r) return toast('Transaksi tidak ditemukan', 'err');
      TXI.modalRef = ref;
      $('txiModalSub').textContent = r.ref + ' • ' + (r.name || r.uid) + ' • ' + rp(r.total);
      $('txiModal').classList.remove('hidden');
      txiRenderModalBody();
    }
    function txiCloseModal() { $('txiModal').classList.add('hidden'); TXI.modalRef = null; }
    function txiModalTab(el, tab) {
      if (el && el.parentElement) [...el.parentElement.children].forEach(c => c.classList.remove('active'));
      if (el) el.classList.add('active');
      TXI.modalTab = tab; txiRenderModalBody();
    }
    function txiModalLiveCheck() { if (TXI.modalRef) txiLiveCheck(TXI.modalRef); }

    function txiRenderModalBody() {
      const r = TXI.byRef[TXI.modalRef]; if (!r) return;
      const box = $('txiModalBody'); if (!box) return;
      const kv = (rows) => '<div class="kv">' + rows.map(([k, v]) => `<div class="kv-item"><span>${esc(k)}</span><b>${v}</b></div>`).join('') + '</div>';
      const t = TXI.modalTab;

      if (t === 'ringkas') {
        box.innerHTML = kv([
          ['Ref ID', '<span class="mono" style="color:var(--pri-text);">' + esc(r.ref) + '</span>'],
          ['Status', statusBadge(r.status) + (r.refundStatus ? ' <span class="badge b-ok">' + esc(r.refundStatus) + '</span>' : '')],
          ['Pengguna', esc(r.name || '-') + ' (' + esc(r.phone || '-') + ')'],
          ['UID', '<span class="mono">' + esc(r.uid) + '</span>'],
          ['Layanan', esc(r.service)],
          ['Produk', esc(r.product) + (r.productCode ? ' <span class="mono cell-sub">[' + esc(r.productCode) + ']</span>' : '')],
          ['Tujuan', esc(r.customer) + (r.customerName ? ' — ' + esc(r.customerName) : '')],
          ['Total', '<span style="color:var(--ok);">' + rp(r.total) + '</span>'],
          ['Metode', esc(r.method)],
          ['SN / Token', '<span class="mono" style="color:var(--warn);">' + esc(r.serial || '-') + '</span>'],
          ['Waktu Dibuat', fmtDate(r.ts || null)],
          ['Usia Transaksi', txiDur(r.age)],
          ['Skor Risiko', txiRiskBadge(r) + ' <span class="cell-sub">' + r.riskLevel + '</span>'],
          ['Fingerprint', '<span class="mono">' + esc(r.fingerprint) + '</span>'],
          ['Keterangan', esc(r.note || '-')]
        ]);
      } else if (t === 'linimasa') {
        const ev = txiBuildTimeline(r);
        box.innerHTML = ev.length ? `<div class="stack">${ev.map(e => `
          <div class="list-item" style="display:flex;gap:.6rem;align-items:flex-start;">
            <span class="badge ${e.cls}" style="min-width:5.5rem;justify-content:center;"><i class="fas ${e.icon}"></i> ${esc(e.tag)}</span>
            <div style="flex:1;min-width:0;">
              <b style="font-size:.72rem;">${esc(e.title)}</b>
              <div class="cell-sub">${esc(e.desc)}</div>
            </div>
            <span class="cell-sub mono" style="white-space:nowrap;">${e.ts ? fmtDate(e.ts) : '-'}</span>
          </div>`).join('')}</div>` : '<div class="tbl-empty"><i class="fas fa-timeline"></i>Belum ada peristiwa tercatat</div>';
      } else if (t === 'keuangan') {
        const line = (k, v, c) => `<div class="kv-item"><span>${k}</span><b style="${c ? 'color:' + c : ''}">${rp(v)}</b></div>`;
        box.innerHTML = `<div class="kv">
          ${line('Nominal Produk', r.amount)}
          ${line('Biaya Admin', r.admin, 'var(--warn)')}
          ${line('Diskon / Potongan', -Math.abs(r.disc), 'var(--info)')}
          ${line('Total Dibayar Pengguna', r.total, 'var(--ok)')}
          ${line('Harga Modal (provider)', r.modal)}
          ${line('Estimasi Margin', r.margin, r.margin < 0 ? 'var(--bad)' : 'var(--ok)')}
          <div class="kv-item"><span>Persentase Margin</span><b>${r.marginPct.toFixed(2)}%</b></div>
          <div class="kv-item"><span>Arah Dana</span><b>${r.direction === 'in' ? 'Masuk (kredit saldo)' : 'Keluar (debit saldo)'}</b></div>
          <div class="kv-item"><span>Sumber Dana</span><b>${esc(r.method)}</b></div>
          <div class="kv-item"><span>Durasi Penyelesaian</span><b>${r.settleMs ? txiDur(r.settleMs) : 'belum tercatat'}</b></div>
        </div>
        <div style="margin-top:.7rem;padding:.55rem;border:1px dashed var(--border-2);border-radius:var(--r);background:var(--surface-2);">
          <b style="font-size:.7rem;">Dampak ke Saldo Pengguna</b>
          <div class="cell-sub" style="margin-top:.2rem;">${r.status === 'success'
            ? (r.direction === 'in' ? 'Saldo bertambah ' + rp(r.total) : 'Saldo berkurang ' + rp(r.total))
            : (r.status === 'pending' ? 'Belum ada mutasi final — dana masih tertahan.' : 'Transaksi gagal — saldo seharusnya dikembalikan penuh ' + rp(r.total) + (r.refundStatus ? ' (refund: ' + esc(r.refundStatus) + ')' : ' (BELUM ADA CATATAN REFUND)'))}</div>
        </div>`;
      } else if (t === 'risiko') {
        box.innerHTML = `<div class="kv">
            <div class="kv-item"><span>Skor Risiko</span><b>${txiRiskBadge(r)} / 100</b></div>
            <div class="kv-item"><span>Klasifikasi</span><b>${esc(r.riskLevel.toUpperCase())}</b></div>
            <div class="kv-item"><span>Velocity Pengguna</span><b>${r.velocity} tx/jam</b></div>
            <div class="kv-item"><span>Duplikat</span><b>${r.dup ? 'Terindikasi' : 'Tidak'}</b></div>
          </div>
          <div style="margin-top:.7rem;"><label class="lbl">Indikator Terdeteksi</label>
          ${r.riskReasons.length ? '<ul class="stack" style="margin-top:.3rem;">' + r.riskReasons.map(x => `<li class="list-item"><i class="fas fa-triangle-exclamation" style="color:var(--warn);margin-right:.4rem;"></i>${esc(x)}</li>`).join('') + '</ul>'
            : '<div class="tbl-empty"><i class="fas fa-shield-halved"></i>Tidak ada indikator risiko pada transaksi ini</div>'}</div>`;
      } else if (t === 'terkait') {
        const rel = TXI.rows.filter(x => x.ref !== r.ref && (x.uid === r.uid || x.customer === r.customer || x.fingerprint === r.fingerprint))
          .sort((a, b) => Math.abs(a.ts - r.ts) - Math.abs(b.ts - r.ts)).slice(0, 40);
        box.innerHTML = `<div class="tbl-wrap" style="max-height:24rem;"><table class="tbl">
          <thead><tr><th>Ref ID</th><th>Waktu</th><th>Produk</th><th>Total</th><th>Status</th><th>Relasi</th><th></th></tr></thead>
          <tbody>${rel.map(x => `<tr>
            <td><span class="cell-mono">${esc(x.ref)}</span></td>
            <td class="cell-sub">${fmtDate(x.ts || null)}</td>
            <td>${esc(x.product)}</td>
            <td class="cell-money">${rp(x.total)}</td>
            <td>${statusBadge(x.status)}</td>
            <td>${x.fingerprint === r.fingerprint ? '<span class="badge b-bad">Identik</span>' : (x.uid === r.uid ? '<span class="badge b-pri">User sama</span>' : '<span class="badge b-mute">Tujuan sama</span>')}</td>
            <td><button class="btn btn-xs btn-soft" onclick="txiOpenModal('${esc(x.ref)}')">Lacak</button></td>
          </tr>`).join('') || emptyRow(7, 'Tidak ada transaksi terkait', 'fa-link-slash')}</tbody></table></div>`;
      } else if (t === 'catatan') {
        box.innerHTML = `
          <label class="lbl">Catatan Admin</label>
          <textarea id="txiNoteInput" class="inp" rows="4" placeholder="Tulis catatan investigasi untuk transaksi ini…">${esc(r.adminNote)}</textarea>
          <label class="lbl" style="margin-top:.6rem;">Label (pisahkan dengan koma)</label>
          <input type="text" id="txiTagInput" class="inp" value="${esc(r.tags.join(', '))}" placeholder="mis: investigasi, chargeback, prioritas">
          <div class="row-wrap" style="margin-top:.6rem;gap:.35rem;">
            <button class="btn btn-sm btn-pri" onclick="txiSaveNote()"><i class="fas fa-floppy-disk"></i> Simpan Catatan</button>
            <button class="btn btn-sm btn-soft" onclick="txiToggleFlagOne('${esc(r.ref)}');txiRenderModalBody()"><i class="fas fa-flag"></i> ${r.flag ? 'Lepas dari' : 'Tambah ke'} Watchlist</button>
            <button class="btn btn-sm btn-soft" onclick="txiClearNote()"><i class="fas fa-eraser"></i> Hapus Anotasi</button>
          </div>
          <div class="row-wrap" style="margin-top:.6rem;gap:.25rem;">
            ${['investigasi', 'chargeback', 'prioritas', 'refund manual', 'palsu', 'sudah dihubungi'].map(t2 => `<button class="chip" onclick="txiQuickTag('${t2}')">+ ${t2}</button>`).join('')}
          </div>`;
      } else {
        const raw = r.raw.raw_response ? JSON.stringify(r.raw.raw_response, null, 2) : 'Belum ada respon mentah tersimpan.';
        box.innerHTML = `
          <label class="lbl">Raw Response Provider</label>
          <pre class="mono" style="background:var(--surface-2);border:1px solid var(--border);border-radius:var(--r);padding:.6rem;font-size:.66rem;max-height:14rem;overflow:auto;white-space:pre-wrap;word-break:break-all;margin:0;">${esc(raw)}</pre>
          <label class="lbl" style="margin-top:.6rem;">Objek Transaksi Tersimpan</label>
          <pre class="mono" style="background:var(--surface-2);border:1px solid var(--border);border-radius:var(--r);padding:.6rem;font-size:.66rem;max-height:14rem;overflow:auto;white-space:pre-wrap;word-break:break-all;margin:0;">${esc(JSON.stringify(r.raw, null, 2))}</pre>
          <div class="row-wrap" style="margin-top:.5rem;gap:.3rem;">
            <button class="btn btn-xs btn-soft" onclick="copyText(JSON.stringify(TXI.byRef['${esc(r.ref)}'].raw))"><i class="fas fa-copy"></i> Salin JSON</button>
            <button class="btn btn-xs btn-soft" onclick="txiDownloadText('tx-${esc(r.ref)}.json', JSON.stringify(TXI.byRef['${esc(r.ref)}'].raw, null, 2), 'application/json')"><i class="fas fa-download"></i> Unduh JSON</button>
          </div>`;
      }
    }

    function txiBuildTimeline(r) {
      const ev = [];
      ev.push({ ts: r.ts, tag: 'DIBUAT', cls: 'b-pri', icon: 'fa-plus', title: 'Transaksi dibuat oleh pengguna', desc: r.product + ' → ' + r.customer + ' senilai ' + rp(r.total) + ' via ' + r.method });
      if (r.method && txiLower(r.method).includes('saldo')) ev.push({ ts: r.ts, tag: 'DEBIT', cls: 'b-warn', icon: 'fa-wallet', title: 'Saldo pengguna didebit', desc: 'Pemotongan saldo sebesar ' + rp(r.total) });
      const dg = (typeof doniguardData !== 'undefined' && Array.isArray(doniguardData)) ? doniguardData.filter(d => String(d.uid) === String(r.uid) && Math.abs(txiNum(d.amount)) === Math.abs(r.total)) : [];
      dg.slice(0, 3).forEach(d => ev.push({ ts: txiParseTime(d.waktu), tag: 'LEDGER', cls: 'b-mute', icon: 'fa-book', title: 'Mutasi Doniguard: ' + (d.desc || '-'), desc: 'Saldo ' + rp(d.saldo_awal) + ' → ' + rp(d.saldo_akhir) }));
      if (r.status === 'pending') ev.push({ ts: r.ts, tag: 'PENDING', cls: 'b-warn', icon: 'fa-hourglass-half', title: 'Menunggu konfirmasi', desc: 'Sudah tertahan selama ' + txiDur(r.age) + (r.age > TXI.rules.sla * 60000 ? ' — MELEBIHI SLA' : '') });
      if (r.status === 'success') ev.push({ ts: r.settled || r.ts, tag: 'SUKSES', cls: 'b-ok', icon: 'fa-circle-check', title: 'Transaksi berhasil diselesaikan', desc: r.serial ? 'SN/Token: ' + r.serial : 'Diselesaikan tanpa nomor seri' });
      if (r.status === 'failed') ev.push({ ts: r.settled || r.ts, tag: 'GAGAL', cls: 'b-bad', icon: 'fa-circle-xmark', title: 'Transaksi gagal', desc: r.note || 'Tidak ada keterangan dari provider' });
      if (r.refundStatus) ev.push({ ts: r.settled || r.ts, tag: 'REFUND', cls: 'b-ok', icon: 'fa-rotate-left', title: 'Refund tercatat: ' + r.refundStatus, desc: 'Dana ' + rp(r.total) + ' dikembalikan ke saldo pengguna' });
      if (r.raw.raw_response) ev.push({ ts: r.settled || r.ts, tag: 'PROVIDER', cls: 'b-mute', icon: 'fa-server', title: 'Respon provider tersimpan', desc: JSON.stringify(r.raw.raw_response).slice(0, 160) });
      TXI.audit.filter(a => a.ref === r.ref).forEach(a => ev.push({ ts: a.ts, tag: 'ADMIN', cls: 'b-pri', icon: 'fa-user-shield', title: a.action + ' oleh ' + a.admin, desc: a.detail }));
      return ev.filter(e => e).sort((a, b) => (a.ts || 0) - (b.ts || 0));
    }

    function txiSaveNote() {
      const r = TXI.byRef[TXI.modalRef]; if (!r) return;
      const note = ($('txiNoteInput') || {}).value || '';
      const tags = (($('txiTagInput') || {}).value || '').split(',').map(s => s.trim()).filter(Boolean);
      txiSetMeta(r.ref, { note, tags });
      r.adminNote = note; r.tags = tags;
      txiLog('catatan', r.ref, 'Catatan diperbarui: ' + note.slice(0, 120));
      toast('Catatan & label tersimpan', 'ok');
      txiRender(); txiRenderModalBody();
    }
    function txiClearNote() {
      const r = TXI.byRef[TXI.modalRef]; if (!r) return;
      if (!confirm('Hapus seluruh anotasi transaksi ini?')) return;
      delete TXI.meta[r.ref]; txiStore(TXI_LS.meta, TXI.meta);
      r.adminNote = ''; r.tags = []; r.flag = false;
      toast('Anotasi dihapus', 'ok'); txiRender(); txiRenderModalBody();
    }
    function txiQuickTag(t) {
      const inp = $('txiTagInput'); if (!inp) return;
      const cur = inp.value.split(',').map(s => s.trim()).filter(Boolean);
      if (!cur.includes(t)) cur.push(t);
      inp.value = cur.join(', ');
    }
    function txiModalCopyAll() {
      const r = TXI.byRef[TXI.modalRef]; if (!r) return;
      copyText([`Ref: ${r.ref}`, `Waktu: ${fmtDate(r.ts || null)}`, `Pengguna: ${r.name} (${r.phone})`, `Produk: ${r.product}`,
      `Tujuan: ${r.customer}`, `Total: ${rp(r.total)}`, `Metode: ${r.method}`, `Status: ${r.status}`, `SN: ${r.serial || '-'}`,
      `Risiko: ${r.risk} (${r.riskLevel})`].join('\n'));
    }
    function txiModalPrint() {
      const r = TXI.byRef[TXI.modalRef]; if (!r) return;
      const w = window.open('', '_blank', 'width=680,height=860');
      if (!w) return toast('Popup diblokir browser', 'err');
      const row = (k, v) => `<tr><td style="padding:6px 10px;color:#555;border-bottom:1px solid #eee;">${k}</td><td style="padding:6px 10px;font-weight:700;border-bottom:1px solid #eee;">${v}</td></tr>`;
      w.document.write(`<html><head><title>Bukti ${esc(r.ref)}</title></head><body style="font-family:system-ui,sans-serif;padding:26px;">
        <h2 style="margin:0 0 4px;">${esc((siteSettings && siteSettings.site_name) || 'PayNusa')}</h2>
        <p style="margin:0 0 16px;color:#666;font-size:13px;">Bukti Transaksi Resmi — dicetak ${new Date().toLocaleString('id-ID')}</p>
        <table style="width:100%;border-collapse:collapse;font-size:13px;">
        ${row('Ref ID', esc(r.ref))}${row('Waktu', fmtDate(r.ts || null))}${row('Pengguna', esc(r.name) + ' (' + esc(r.phone) + ')')}
        ${row('Layanan', esc(r.service))}${row('Produk', esc(r.product))}${row('Tujuan', esc(r.customer))}
        ${row('Nominal', rp(r.amount))}${row('Biaya Admin', rp(r.admin))}${row('Diskon', rp(r.disc))}
        ${row('Total', '<span style="color:#059669;">' + rp(r.total) + '</span>')}${row('Metode', esc(r.method))}
        ${row('Status', esc(r.status.toUpperCase()))}${row('SN / Token', esc(r.serial || '-'))}
        </table><p style="margin-top:20px;font-size:11px;color:#888;">Dokumen ini dihasilkan otomatis oleh Admin Control Center.</p>
        </body></html>`);
      w.document.close(); w.focus(); setTimeout(() => w.print(), 350);
      txiLog('cetak_bukti', r.ref, 'Bukti transaksi dicetak');
    }

    /* ========================================================================
       ANALITIK TRANSAKSI
       ===================================================================== */
    function txiRangeRows() {
      const d = Number(txiVal('txiIntelRange', 30));
      if (!d) return TXI.rows;
      const from = Date.now() - d * 86400000;
      return TXI.rows.filter(r => r.ts >= from);
    }

    function txiRenderAnalytics() {
      if (!$('txiIntelKpi')) return;
      const rows = txiRangeRows();
      const succ = rows.filter(r => r.status === 'success');
      const vol = succ.reduce((a, r) => a + r.total, 0);
      const margin = succ.reduce((a, r) => a + r.margin, 0);
      const aov = succ.length ? vol / succ.length : 0;
      const rate = rows.length ? (succ.length / rows.length * 100) : 0;
      const users = new Set(rows.map(r => r.uid)).size;
      const failed = rows.filter(r => r.status === 'failed');
      const days = Math.max(1, new Set(rows.map(r => txiDayKey(r.ts))).size);
      const kpi = [
        { l: 'Volume Sukses', v: rp(vol), n: succ.length + ' transaksi sukses', c: ['#059669', '#10b981'], t: 'ok', i: 'fa-coins' },
        { l: 'Estimasi Margin', v: rp(margin), n: (vol ? (margin / vol * 100).toFixed(2) : 0) + '% dari volume', c: ['#4f46e5', '#7c3aed'], t: 'pri', i: 'fa-arrow-trend-up' },
        { l: 'Rata-rata Nilai', v: rp(aov), n: 'AOV per transaksi', c: ['#0284c7', '#38bdf8'], t: 'info', i: 'fa-calculator' },
        { l: 'Tingkat Sukses', v: rate.toFixed(1) + '%', n: failed.length + ' gagal • ' + rows.filter(r => r.status === 'pending').length + ' pending', c: ['#d97706', '#f59e0b'], t: 'warn', i: 'fa-gauge-high' },
        { l: 'Pengguna Aktif', v: users, n: (rows.length / days).toFixed(1) + ' tx/hari', c: ['#4f46e5', '#7c3aed'], t: 'pri', i: 'fa-users' },
        { l: 'Nilai Kegagalan', v: rp(failed.reduce((a, r) => a + r.total, 0)), n: failed.filter(r => !r.refundStatus).length + ' belum direfund', c: ['#e11d48', '#fb7185'], t: 'bad', i: 'fa-circle-exclamation' }
      ];
      const tint = { ok: 'var(--ok-soft);--fg:var(--ok);--line:var(--ok-line)', pri: 'var(--pri-soft);--fg:var(--pri-text);--line:var(--pri-line)', info: 'var(--info-soft);--fg:var(--info);--line:var(--info-line)', warn: 'var(--warn-soft);--fg:var(--warn);--line:var(--warn-line)', bad: 'var(--bad-soft);--fg:var(--bad);--line:var(--bad-line)' };
      $('txiIntelKpi').innerHTML = kpi.map(k => `
        <div class="stat" style="--c1:${k.c[0]};--c2:${k.c[1]};--tint:${tint[k.t]};">
          <div class="stat-top"><span class="stat-label">${k.l}</span><span class="stat-ico"><i class="fas ${k.i}"></i></span></div>
          <div class="stat-value">${k.v}</div><div class="stat-note">${k.n}</div>
        </div>`).join('');

      /* tren harian */
      const nDays = Number(txiVal('txiIntelRange', 30)) || 30;
      const span = Math.min(nDays || 30, 60);
      const buckets = [];
      const bidx = {};
      for (let i = span - 1; i >= 0; i--) {
        const d = new Date(); d.setHours(0, 0, 0, 0); d.setDate(d.getDate() - i);
        const k = txiDayKey(d.getTime());
        bidx[k] = buckets.length;
        buckets.push({ k, label: d.toLocaleDateString('id-ID', { day: '2-digit', month: 'short' }), vol: 0, n: 0, fail: 0 });
      }
      rows.forEach(r => { const b = buckets[bidx[txiDayKey(r.ts)]]; if (!b) return; b.n++; if (r.status === 'success') b.vol += r.total; if (r.status === 'failed') b.fail++; });
      const maxV = Math.max(1, ...buckets.map(b => b.vol));
      $('txiTrendChart').innerHTML = buckets.map(b => `
        <div class="bar-col" style="flex:1;display:flex;flex-direction:column;justify-content:flex-end;align-items:center;height:100%;" title="${b.label}: ${rp(b.vol)} • ${b.n} tx • ${b.fail} gagal">
          <div style="width:100%;background:linear-gradient(180deg,var(--pri),var(--pri-2));border-radius:.25rem .25rem 0 0;height:${Math.max(2, Math.round(b.vol / maxV * 100))}%;"></div>
          <small style="font-size:.5rem;color:var(--muted);margin-top:.2rem;transform:rotate(-60deg);white-space:nowrap;">${b.label}</small>
        </div>`).join('');
      setTxt('txiTrendInfo', 'Puncak ' + rp(maxV) + ' • total ' + rp(buckets.reduce((a, b) => a + b.vol, 0)));

      /* heatmap */
      const dayNames = ['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'];
      const grid = Array.from({ length: 7 }, () => new Array(24).fill(0));
      rows.forEach(r => { if (!r.ts) return; const d = new Date(r.ts); grid[d.getDay()][d.getHours()]++; });
      const mx = Math.max(1, ...grid.flat());
      $('txiHeatmap').innerHTML = `<table style="border-collapse:separate;border-spacing:2px;font-size:.55rem;">
        <tr><td></td>${Array.from({ length: 24 }, (_, h) => `<td style="color:var(--muted);text-align:center;">${h}</td>`).join('')}</tr>
        ${grid.map((row, di) => `<tr><td style="color:var(--muted);padding-right:.3rem;font-weight:700;">${dayNames[di]}</td>${row.map((v, h) => {
          const a = v / mx;
          return `<td title="${dayNames[di]} ${h}:00 — ${v} transaksi" style="width:1.05rem;height:1.05rem;border-radius:.2rem;background:${v ? `rgba(79,70,229,${(0.12 + a * 0.85).toFixed(2)})` : 'var(--surface-3)'};color:${a > .55 ? '#fff' : 'var(--muted)'};text-align:center;">${v || ''}</td>`;
        }).join('')}</tr>`).join('')}</table>`;

      /* aging pending */
      const pend = rows.filter(r => r.status === 'pending');
      const band = [{ l: '< 15 menit', max: 15 * 60000, n: 0, v: 0 }, { l: '15 – 60 menit', max: 3600000, n: 0, v: 0 },
      { l: '1 – 6 jam', max: 6 * 3600000, n: 0, v: 0 }, { l: '6 – 24 jam', max: 86400000, n: 0, v: 0 }, { l: '> 24 jam', max: Infinity, n: 0, v: 0 }];
      pend.forEach(r => { const b = band.find(b => r.age < b.max); if (b) { b.n++; b.v += r.total; } });
      const mxb = Math.max(1, ...band.map(b => b.n));
      $('txiAging').innerHTML = band.map(b => `
        <div class="list-item">
          <div class="row" style="justify-content:space-between;"><b style="font-size:.7rem;">${b.l}</b><span class="cell-sub">${b.n} tx • ${rp(b.v)}</span></div>
          <div style="height:.4rem;background:var(--surface-3);border-radius:99px;margin-top:.25rem;overflow:hidden;"><div style="height:100%;width:${Math.round(b.n / mxb * 100)}%;background:linear-gradient(90deg,var(--warn),var(--bad));"></div></div>
        </div>`).join('');
      setTxt('txiAgingTotal', pend.length + ' pending');

      /* agregasi */
      const agg = (keyer) => {
        const m = {};
        rows.forEach(r => {
          const k = keyer(r) || '-';
          const o = m[k] || (m[k] = { k, n: 0, vol: 0, margin: 0, succ: 0, fail: 0, last: 0 });
          o.n++; if (r.status === 'success') { o.succ++; o.vol += r.total; o.margin += r.margin; }
          if (r.status === 'failed') o.fail++;
          o.last = Math.max(o.last, r.ts);
        });
        return Object.values(m).sort((a, b) => b.vol - a.vol || b.n - a.n);
      };

      const uAgg = agg(r => r.uid + '||' + (r.name || '(tanpa nama)') + '||' + (r.phone || '-'));
      TXI.aggUsers = uAgg;
      $('txiTopUsers').innerHTML = uAgg.slice(0, 15).map((o, i) => {
        const [uid, nm, ph] = o.k.split('||');
        return `<tr><td class="cell-sub">${i + 1}</td>
          <td><span class="cell-strong">${esc(nm)}</span><div class="cell-sub">${esc(ph)}</div></td>
          <td>${o.n}</td><td class="cell-money">${rp(o.vol)}</td>
          <td><span class="badge ${o.n && o.succ / o.n > .8 ? 'b-ok' : 'b-warn'}">${o.n ? Math.round(o.succ / o.n * 100) : 0}%</span></td>
          <td><button class="btn btn-xs btn-soft" onclick="txiTraceUser('${esc(uid)}')"><i class="fas fa-user-magnifying-glass"></i></button></td></tr>`;
      }).join('') || emptyRow(6, 'Belum ada data', 'fa-users');

      const pAgg = agg(r => r.product);
      TXI.aggProducts = pAgg;
      $('txiTopProducts').innerHTML = pAgg.slice(0, 15).map((o, i) => `
        <tr><td class="cell-sub">${i + 1}</td><td>${esc(o.k)}</td><td>${o.n}</td>
        <td class="cell-money">${rp(o.vol)}</td><td class="cell-money" style="color:var(--ok);">${rp(o.margin)}</td>
        <td>${o.fail ? '<span class="badge b-bad">' + o.fail + '</span>' : '<span class="cell-sub">0</span>'}</td></tr>`).join('') || emptyRow(6, 'Belum ada data', 'fa-box-open');

      const mAgg = agg(r => r.method);
      const totVol = mAgg.reduce((a, o) => a + o.vol, 0) || 1;
      $('txiByMethod').innerHTML = mAgg.map(o => `<tr><td>${esc(o.k)}</td><td>${o.n}</td><td class="cell-money">${rp(o.vol)}</td>
        <td><div class="row" style="gap:.3rem;"><div style="flex:1;height:.35rem;background:var(--surface-3);border-radius:99px;overflow:hidden;"><div style="height:100%;width:${Math.round(o.vol / totVol * 100)}%;background:var(--pri);"></div></div><span class="cell-sub">${Math.round(o.vol / totVol * 100)}%</span></div></td></tr>`).join('') || emptyRow(4, 'Belum ada data', 'fa-credit-card');

      const sAgg = agg(r => r.service);
      $('txiByService').innerHTML = sAgg.map(o => `<tr><td>${esc(o.k)}</td><td>${o.n}</td><td class="cell-money">${rp(o.vol)}</td>
        <td><span class="badge ${o.n && o.succ / o.n > .8 ? 'b-ok' : 'b-warn'}">${o.n ? Math.round(o.succ / o.n * 100) : 0}%</span></td></tr>`).join('') || emptyRow(4, 'Belum ada data', 'fa-layer-group');

      const fm = {};
      rows.filter(r => r.status === 'failed').forEach(r => {
        const k = (r.note || 'Tanpa keterangan provider').slice(0, 90);
        const o = fm[k] || (fm[k] = { k, n: 0, v: 0 }); o.n++; o.v += r.total;
      });
      $('txiFailReasons').innerHTML = Object.values(fm).sort((a, b) => b.n - a.n).slice(0, 20)
        .map(o => `<tr><td>${esc(o.k)}</td><td><span class="badge b-bad">${o.n}</span></td><td class="cell-money">${rp(o.v)}</td></tr>`).join('')
        || emptyRow(3, 'Tidak ada kegagalan pada rentang ini', 'fa-circle-check');
    }

    function txiExportAnalytics() {
      const rows = txiRangeRows();
      const succ = rows.filter(r => r.status === 'success');
      const out = [['Metrik', 'Nilai'],
      ['Rentang (hari)', txiVal('txiIntelRange', 30) || 'semua'],
      ['Total transaksi', rows.length], ['Sukses', succ.length],
      ['Pending', rows.filter(r => r.status === 'pending').length],
      ['Gagal', rows.filter(r => r.status === 'failed').length],
      ['Volume sukses', succ.reduce((a, r) => a + r.total, 0)],
      ['Estimasi margin', succ.reduce((a, r) => a + r.margin, 0)],
      ['Rata-rata nilai', succ.length ? Math.round(succ.reduce((a, r) => a + r.total, 0) / succ.length) : 0],
      ['Pengguna aktif', new Set(rows.map(r => r.uid)).size],
      ['Transaksi risiko tinggi', rows.filter(r => r.risk >= 60).length],
      ['Terindikasi duplikat', rows.filter(r => r.dup).length]];
      downloadCSV('paynusa-analitik-' + Date.now() + '.csv', out);
    }
    function txiExportTop(kind) {
      const list = kind === 'user' ? (TXI.aggUsers || []) : (TXI.aggProducts || []);
      if (!list.length) return toast('Belum ada data untuk diekspor', 'warn');
      const head = kind === 'user' ? ['UID', 'Nama', 'HP', 'Transaksi', 'Volume', 'Margin', 'Sukses', 'Gagal'] : ['Produk', 'Transaksi', 'Volume', 'Margin', 'Sukses', 'Gagal'];
      const rows = list.map(o => kind === 'user' ? [...o.k.split('||'), o.n, o.vol, o.margin, o.succ, o.fail] : [o.k, o.n, o.vol, o.margin, o.succ, o.fail]);
      downloadCSV('paynusa-top-' + kind + '-' + Date.now() + '.csv', [head, ...rows]);
    }

    /* ========================================================================
       REKONSILIASI & INTEGRITAS
       ===================================================================== */
    function txiRunRecon() {
      if (!$('txiReconBody')) return;
      const issues = [];
      const add = (level, type, ref, user, desc, val) => issues.push({ level, type, ref, user, desc, val });

      const refCount = {};
      TXI.rows.forEach(r => { refCount[r.ref] = (refCount[r.ref] || 0) + 1; });

      TXI.rows.forEach(r => {
        if (refCount[r.ref] > 1) add('kritis', 'Ref ID ganda', r.ref, r.name || r.uid, 'Ref ID muncul ' + refCount[r.ref] + '× dalam basis data', r.total);
        if (!r.ts) add('sedang', 'Tanggal tidak valid', r.ref, r.name || r.uid, 'Field tanggal kosong atau tidak dapat diurai', r.total);
        if (r.ts && r.ts - Date.now() > 3600000) add('kritis', 'Timestamp masa depan', r.ref, r.name || r.uid, 'Tercatat pada ' + fmtDate(r.ts), r.total);
        if (!r.userKnown) add('sedang', 'Pengguna tidak dikenal', r.ref, r.uid, 'UID/HP tidak ditemukan di daftar pengguna', r.total);
        if (r.total <= 0) add('sedang', 'Nominal nol/negatif', r.ref, r.name || r.uid, 'Total transaksi = ' + rp(r.total), r.total);
        if (r.margin < 0) add('sedang', 'Margin negatif', r.ref, r.name || r.uid, 'Harga jual di bawah modal', r.margin);
        if (r.status === 'failed' && !r.refundStatus) add('kritis', 'Gagal tanpa refund', r.ref, r.name || r.uid, 'Transaksi gagal namun tidak ada catatan pengembalian dana', r.total);
        if (r.status === 'success' && !r.serial && ['Pulsa', 'Paket Data', 'PLN', 'Voucher Game'].includes(r.service)) add('ringan', 'Sukses tanpa SN', r.ref, r.name || r.uid, 'Produk ' + r.service + ' sukses tetapi tidak ada SN/token', r.total);
        if (r.dup) add('sedang', 'Dugaan duplikat', r.ref, r.name || r.uid, 'Identik dengan transaksi lain dalam ' + TXI.rules.dup + ' menit', r.total);
        if (r.status === 'pending' && r.age > 86400000) add('kritis', 'Pending menggantung', r.ref, r.name || r.uid, 'Tertahan selama ' + txiDur(r.age), r.total);
        if (Math.abs((r.amount + r.admin - r.disc) - r.total) > 1 && r.amount > 0) add('ringan', 'Komponen biaya tidak seimbang', r.ref, r.name || r.uid, `Nominal ${rp(r.amount)} + admin ${rp(r.admin)} - diskon ${rp(r.disc)} ≠ total ${rp(r.total)}`, (r.amount + r.admin - r.disc) - r.total);
      });

      /* rekonsiliasi saldo per pengguna */
      const ledgerLast = {};
      if (typeof doniguardData !== 'undefined' && Array.isArray(doniguardData)) {
        const sorted = doniguardData.slice().sort((a, b) => txiParseTime(a.waktu) - txiParseTime(b.waktu));
        sorted.forEach(d => { ledgerLast[String(d.uid)] = txiNum(d.saldo_akhir); });
      }
      const users = (usersData || []).map(u => {
        const uid = String(u.uid);
        const mine = TXI.rows.filter(r => String(r.uid) === uid);
        const spend = mine.filter(r => r.status === 'success' && r.direction === 'out').reduce((a, r) => a + r.total, 0);
        const topup = mine.filter(r => r.status === 'success' && r.direction === 'in').reduce((a, r) => a + r.total, 0);
        const sys = txiNum(u.balance);
        const led = ledgerLast[uid];
        const diff = (led === undefined) ? null : sys - led;
        return { uid, name: (u.user && u.user.name) || '-', phone: (u.user && u.user.phone) || '-', sys, led, diff, spend, topup, tx: mine.length };
      });
      users.forEach(u => {
        if (u.diff !== null && Math.abs(u.diff) > 1) add(Math.abs(u.diff) > 50000 ? 'kritis' : 'sedang', 'Selisih saldo vs ledger', u.uid, u.name, 'Saldo sistem ' + rp(u.sys) + ' vs ledger ' + rp(u.led), u.diff);
        if (u.sys < 0) add('kritis', 'Saldo negatif', u.uid, u.name, 'Saldo pengguna bernilai ' + rp(u.sys), u.sys);
      });

      const order = { kritis: 0, sedang: 1, ringan: 2 };
      issues.sort((a, b) => order[a.level] - order[b.level] || Math.abs(b.val) - Math.abs(a.val));
      TXI.recon = { issues, users };

      const cnt = (l) => issues.filter(i => i.level === l).length;
      const score = Math.max(0, 100 - Math.min(100, cnt('kritis') * 5 + cnt('sedang') * 2 + cnt('ringan')));
      setTxt('txiReconScore', 'Skor integritas: ' + score + '/100');
      setTxt('txiReconIssueCount', issues.length + ' temuan');

      $('txiReconKpi').innerHTML = [
        { l: 'Temuan Kritis', v: cnt('kritis'), n: 'Perlu tindakan segera', c: ['#e11d48', '#fb7185'], t: 'bad', i: 'fa-circle-exclamation' },
        { l: 'Temuan Sedang', v: cnt('sedang'), n: 'Perlu ditinjau', c: ['#d97706', '#f59e0b'], t: 'warn', i: 'fa-triangle-exclamation' },
        { l: 'Temuan Ringan', v: cnt('ringan'), n: 'Catatan kualitas data', c: ['#0284c7', '#38bdf8'], t: 'info', i: 'fa-circle-info' },
        { l: 'Skor Integritas', v: score + '/100', n: users.filter(u => u.diff !== null && Math.abs(u.diff) > 1).length + ' saldo tidak cocok', c: ['#059669', '#10b981'], t: 'ok', i: 'fa-shield-heart' }
      ].map(k => `<div class="stat" style="--c1:${k.c[0]};--c2:${k.c[1]};--tint:var(--${k.t === 'bad' ? 'bad' : k.t === 'warn' ? 'warn' : k.t === 'info' ? 'info' : 'ok'}-soft);--fg:var(--${k.t === 'bad' ? 'bad' : k.t === 'warn' ? 'warn' : k.t === 'info' ? 'info' : 'ok'});--line:var(--${k.t === 'bad' ? 'bad' : k.t === 'warn' ? 'warn' : k.t === 'info' ? 'info' : 'ok'}-line);">
        <div class="stat-top"><span class="stat-label">${k.l}</span><span class="stat-ico"><i class="fas ${k.i}"></i></span></div>
        <div class="stat-value">${k.v}</div><div class="stat-note">${k.n}</div></div>`).join('');

      const lvBadge = (l) => `<span class="badge ${l === 'kritis' ? 'b-bad' : l === 'sedang' ? 'b-warn' : 'b-mute'}">${l.toUpperCase()}</span>`;
      $('txiReconBody').innerHTML = issues.slice(0, 400).map(i => `
        <tr><td>${lvBadge(i.level)}</td><td><b style="font-size:.7rem;">${esc(i.type)}</b></td>
        <td><span class="cell-mono">${esc(i.ref)}</span></td><td>${esc(i.user)}</td>
        <td class="cell-sub">${esc(i.desc)}</td><td class="cell-money">${rp(i.val)}</td>
        <td>${TXI.byRef[i.ref] ? `<button class="btn btn-xs btn-soft" onclick="txiOpenModal('${esc(i.ref)}')">Lacak</button>` : `<button class="btn btn-xs btn-soft" onclick="txiTraceUser('${esc(i.ref)}')">Pengguna</button>`}</td></tr>`).join('')
        || emptyRow(7, 'Tidak ditemukan masalah integritas. Data bersih.', 'fa-shield-heart');

      $('txiReconUserBody').innerHTML = users.sort((a, b) => Math.abs(b.diff || 0) - Math.abs(a.diff || 0)).map(u => `
        <tr><td><span class="cell-strong">${esc(u.name)}</span><div class="cell-sub">${esc(u.phone)}</div></td>
        <td class="cell-money">${rp(u.sys)}</td><td class="cell-money">${u.led === undefined ? '<span class="cell-sub">tidak ada ledger</span>' : rp(u.led)}</td>
        <td class="cell-money" style="color:${u.diff && Math.abs(u.diff) > 1 ? 'var(--bad)' : 'var(--ok)'};">${u.diff === null ? '-' : rp(u.diff)}</td>
        <td class="cell-money">${rp(u.spend)}</td><td class="cell-money">${rp(u.topup)}</td>
        <td>${u.diff === null ? '<span class="badge b-mute">N/A</span>' : (Math.abs(u.diff) <= 1 ? '<span class="badge b-ok">COCOK</span>' : '<span class="badge b-bad">SELISIH</span>')}</td>
        <td><button class="btn btn-xs btn-soft" onclick="txiTraceUser('${esc(u.uid)}')"><i class="fas fa-user-magnifying-glass"></i></button></td></tr>`).join('')
        || emptyRow(8, 'Belum ada data pengguna', 'fa-users');

      toast(issues.length + ' temuan integritas • skor ' + score + '/100', issues.length ? 'warn' : 'ok');
    }

    function txiExportRecon() {
      if (!TXI.recon.issues.length) txiRunRecon();
      const rows = [['Tingkat', 'Jenis', 'Referensi', 'Pengguna', 'Keterangan', 'Nilai']];
      TXI.recon.issues.forEach(i => rows.push([i.level, i.type, i.ref, i.user, i.desc, i.val]));
      rows.push([], ['Pengguna', 'Saldo Sistem', 'Saldo Ledger', 'Selisih', 'Belanja', 'Topup']);
      TXI.recon.users.forEach(u => rows.push([u.name + ' (' + u.phone + ')', u.sys, u.led === undefined ? '' : u.led, u.diff === null ? '' : u.diff, u.spend, u.topup]));
      downloadCSV('paynusa-rekonsiliasi-' + Date.now() + '.csv', rows);
    }

    /* ========================================================================
       PELACAKAN PER PENGGUNA
       ===================================================================== */
    function txiUserStats() {
      const m = {};
      TXI.rows.forEach(r => {
        const o = m[r.uid] || (m[r.uid] = { uid: r.uid, name: r.name, phone: r.phone, tx: 0, vol: 0, margin: 0, succ: 0, fail: 0, pend: 0, last: 0, first: Infinity, risk: 0, flagged: 0, topup: 0, spend: 0 });
        o.tx++; o.last = Math.max(o.last, r.ts); o.first = Math.min(o.first, r.ts || Infinity);
        o.risk = Math.max(o.risk, r.risk);
        if (r.flag) o.flagged++;
        if (r.status === 'success') { o.succ++; o.vol += r.total; o.margin += r.margin; if (r.direction === 'in') o.topup += r.total; else o.spend += r.total; }
        else if (r.status === 'failed') o.fail++; else o.pend++;
        if (!o.name && r.name) o.name = r.name;
        if (!o.phone && r.phone) o.phone = r.phone;
      });
      (usersData || []).forEach(u => { const o = m[String(u.uid)]; if (o) { o.balance = txiNum(u.balance); o.points = txiNum(u.points); o.role = u.jenis_akun || 'member'; } });
      return Object.values(m);
    }

    function txiRenderUserList() {
      const box = $('txiUserList'); if (!box) return;
      const q = txiLower(txiVal('txiUserSearch'));
      const sort = txiVal('txiUserSort', 'vol');
      let list = txiUserStats().filter(u => !q || [u.name, u.phone, u.uid].some(v => txiLower(v).includes(q)));
      const cmp = { vol: (a, b) => b.vol - a.vol, tx: (a, b) => b.tx - a.tx, fail: (a, b) => b.fail - a.fail, last: (a, b) => b.last - a.last, risk: (a, b) => b.risk - a.risk };
      list.sort(cmp[sort] || cmp.vol);
      box.innerHTML = list.slice(0, 300).map(u => `
        <div class="list-item" style="cursor:pointer;${TXI.activeUser === u.uid ? 'border-color:var(--pri);background:var(--pri-soft);' : ''}" onclick="txiTraceUser('${esc(u.uid)}')">
          <div class="row" style="justify-content:space-between;gap:.3rem;">
            <b style="font-size:.72rem;">${esc(u.name || '(tanpa nama)')}</b>
            ${u.risk >= 60 ? '<span class="badge b-bad">RISIKO</span>' : (u.flagged ? '<span class="badge b-warn"><i class="fas fa-flag"></i></span>' : '')}
          </div>
          <div class="cell-sub">${esc(u.phone || u.uid)}</div>
          <div class="row" style="justify-content:space-between;margin-top:.2rem;">
            <span class="cell-sub">${u.tx} tx • ${u.fail} gagal</span>
            <b style="font-size:.68rem;color:var(--ok);">${rp(u.vol)}</b>
          </div>
        </div>`).join('') || '<div class="tbl-empty"><i class="fas fa-user-slash"></i>Tidak ada pengguna cocok</div>';
    }

    function txiTraceUser(uid) {
      TXI.activeUser = String(uid);
      switchTab('txuser');
      txiRenderUserList();
      txiRenderUserProfile();
    }

    function txiRenderUserTrace() { txiRenderUserList(); txiRenderUserProfile(); }

    function txiRenderUserProfile() {
      const box = $('txiUserProfile'); if (!box) return;
      const uid = TXI.activeUser;
      if (!uid) { box.innerHTML = '<div class="tbl-empty"><i class="fas fa-user"></i>Pilih pengguna di sisi kiri untuk melihat detail pelacakan</div>'; return; }
      const u = txiUserStats().find(x => x.uid === uid);
      const rows = TXI.rows.filter(r => r.uid === uid).sort((a, b) => b.ts - a.ts);
      if (!u) { box.innerHTML = '<div class="tbl-empty"><i class="fas fa-user-slash"></i>Pengguna tidak memiliki transaksi</div>'; return; }
      const dg = (typeof doniguardData !== 'undefined' && Array.isArray(doniguardData)) ? doniguardData.filter(d => String(d.uid) === uid) : [];
      const fav = {};
      rows.forEach(r => { fav[r.service] = (fav[r.service] || 0) + 1; });
      const favTop = Object.entries(fav).sort((a, b) => b[1] - a[1])[0];
      const dest = {};
      rows.forEach(r => { if (r.customer && r.customer !== '-') dest[r.customer] = (dest[r.customer] || 0) + 1; });

      box.innerHTML = `
        <div class="kv">
          <div class="kv-item"><span>Nama</span><b>${esc(u.name || '-')}</b></div>
          <div class="kv-item"><span>Nomor HP</span><b class="mono">${esc(u.phone || '-')}</b></div>
          <div class="kv-item"><span>UID</span><b class="mono">${esc(u.uid)}</b></div>
          <div class="kv-item"><span>Peran</span><b>${esc(u.role || 'member')}</b></div>
          <div class="kv-item"><span>Saldo Saat Ini</span><b style="color:var(--ok);">${rp(u.balance || 0)}</b></div>
          <div class="kv-item"><span>Total Transaksi</span><b>${u.tx}</b></div>
          <div class="kv-item"><span>Volume Sukses</span><b>${rp(u.vol)}</b></div>
          <div class="kv-item"><span>Total Belanja</span><b>${rp(u.spend)}</b></div>
          <div class="kv-item"><span>Total Topup</span><b>${rp(u.topup)}</b></div>
          <div class="kv-item"><span>Kontribusi Margin</span><b style="color:var(--pri-text);">${rp(u.margin)}</b></div>
          <div class="kv-item"><span>Rasio Sukses</span><b>${u.tx ? Math.round(u.succ / u.tx * 100) : 0}% (${u.fail} gagal, ${u.pend} pending)</b></div>
          <div class="kv-item"><span>Rata-rata Nilai</span><b>${rp(u.succ ? u.vol / u.succ : 0)}</b></div>
          <div class="kv-item"><span>Layanan Favorit</span><b>${favTop ? esc(favTop[0]) + ' (' + favTop[1] + '×)' : '-'}</b></div>
          <div class="kv-item"><span>Aktivitas Terakhir</span><b>${fmtDate(u.last || null)} <span class="cell-sub">${txiRelTime(u.last)}</span></b></div>
          <div class="kv-item"><span>Pertama Bertransaksi</span><b>${u.first === Infinity ? '-' : fmtDate(u.first)}</b></div>
          <div class="kv-item"><span>Skor Risiko Maks</span><b>${u.risk} <span class="cell-sub">${u.flagged} ditandai</span></b></div>
        </div>

        <div class="row-wrap" style="margin-top:.6rem;gap:.3rem;">
          <button class="btn btn-xs btn-soft" onclick="txiFilterByUser('${esc(uid)}')"><i class="fas fa-filter"></i> Buka di Tracking Center</button>
          <button class="btn btn-xs btn-soft" onclick="openEditUser('${esc(uid)}')"><i class="fas fa-user-pen"></i> Edit Pengguna</button>
          <button class="btn btn-xs btn-soft" onclick="copyText('${esc(u.phone || uid)}')"><i class="fas fa-copy"></i> Salin Kontak</button>
        </div>

        <div style="margin-top:.7rem;">
          <label class="lbl">Tujuan yang Sering Diisi</label>
          <div class="row-wrap" style="gap:.25rem;">${Object.entries(dest).sort((a, b) => b[1] - a[1]).slice(0, 12).map(([d, n]) => `<span class="badge b-mute">${esc(d)} <b style="margin-left:.2rem;">${n}×</b></span>`).join('') || '<span class="cell-sub">-</span>'}</div>
        </div>

        <div style="margin-top:.8rem;">
          <label class="lbl">Linimasa Transaksi &amp; Mutasi Saldo</label>
          <div class="tbl-wrap" style="max-height:22rem;">
            <table class="tbl"><thead><tr><th>Waktu</th><th>Jenis</th><th>Keterangan</th><th>Nilai</th><th>Saldo</th><th>Status</th><th></th></tr></thead>
            <tbody>${txiMergeUserTimeline(rows, dg).map(e => `<tr>
              <td class="cell-sub">${fmtDate(e.ts || null)}</td>
              <td><span class="badge ${e.kind === 'tx' ? 'b-pri' : 'b-mute'}">${e.kind === 'tx' ? 'TRANSAKSI' : 'LEDGER'}</span></td>
              <td>${esc(e.title)}<div class="cell-sub">${esc(e.sub)}</div></td>
              <td class="cell-money" style="color:${e.dir === 'in' ? 'var(--ok)' : 'var(--bad)'};">${e.dir === 'in' ? '+' : '-'}${rp(Math.abs(e.val))}</td>
              <td class="cell-sub">${e.bal === null ? '-' : rp(e.bal)}</td>
              <td>${e.status ? statusBadge(e.status) : '<span class="cell-sub">-</span>'}</td>
              <td>${e.ref ? `<button class="btn btn-xs btn-soft" onclick="txiOpenModal('${esc(e.ref)}')">Lacak</button>` : ''}</td>
            </tr>`).join('') || emptyRow(7, 'Belum ada aktivitas', 'fa-timeline')}</tbody></table>
          </div>
        </div>`;
    }

    function txiMergeUserTimeline(rows, dg) {
      const ev = rows.map(r => ({ kind: 'tx', ts: r.ts, title: r.product, sub: r.service + ' → ' + r.customer + ' • ' + r.method + ' • ' + r.ref, val: r.total, dir: r.direction, bal: null, status: r.status, ref: r.ref }));
      dg.forEach(d => ev.push({ kind: 'ledger', ts: txiParseTime(d.waktu), title: d.desc || 'Mutasi saldo', sub: d.keterangan_full || '', val: txiNum(d.amount), dir: txiLower(d.type) === 'in' ? 'in' : 'out', bal: txiNum(d.saldo_akhir), status: '', ref: '' }));
      return ev.sort((a, b) => b.ts - a.ts).slice(0, 400);
    }

    function txiFilterByUser(uid) {
      switchTab('txtrace');
      const el = $('txiUser'); if (el) el.value = uid;
      txiRender(1);
      toast('Tracking Center difilter untuk pengguna terpilih', 'ok');
    }

    function txiExportStatement() {
      if (!TXI.activeUser) return toast('Pilih pengguna terlebih dahulu', 'warn');
      const rows = TXI.rows.filter(r => r.uid === TXI.activeUser);
      if (!rows.length) return toast('Pengguna tidak memiliki transaksi', 'warn');
      const out = [['Ref ID', 'Waktu', 'Layanan', 'Produk', 'Tujuan', 'Arah', 'Nominal', 'Admin', 'Total', 'Metode', 'Status', 'SN']];
      rows.sort((a, b) => a.ts - b.ts).forEach(r => out.push([r.ref, r.ts ? new Date(r.ts).toLocaleString('id-ID') : '', r.service, r.product, r.customer, r.direction === 'in' ? 'Masuk' : 'Keluar', r.amount, r.admin, r.total, r.method, r.status, r.serial]));
      downloadCSV('rekening-koran-' + TXI.activeUser + '-' + Date.now() + '.csv', out);
    }

    function txiPrintStatement() {
      if (!TXI.activeUser) return toast('Pilih pengguna terlebih dahulu', 'warn');
      const u = txiUserStats().find(x => x.uid === TXI.activeUser);
      const rows = TXI.rows.filter(r => r.uid === TXI.activeUser).sort((a, b) => b.ts - a.ts);
      const w = window.open('', '_blank', 'width=900,height=1000');
      if (!w) return toast('Popup diblokir browser', 'err');
      w.document.write(`<html><head><title>Rekening Koran ${esc(u.name || u.uid)}</title></head><body style="font-family:system-ui,sans-serif;padding:24px;">
        <h2 style="margin:0;">${esc((siteSettings && siteSettings.site_name) || 'PayNusa')} — Rekening Koran</h2>
        <p style="color:#666;font-size:13px;margin:4px 0 14px;">${esc(u.name || '-')} • ${esc(u.phone || '-')} • UID ${esc(u.uid)}<br>
        Saldo: ${rp(u.balance || 0)} • Total ${u.tx} transaksi • Volume ${rp(u.vol)} • Dicetak ${new Date().toLocaleString('id-ID')}</p>
        <table style="width:100%;border-collapse:collapse;font-size:11.5px;">
        <thead><tr style="background:#f1f5f9;">${['Waktu', 'Ref ID', 'Produk', 'Tujuan', 'Metode', 'Total', 'Status'].map(h => `<th style="padding:6px;border:1px solid #e2e8f0;text-align:left;">${h}</th>`).join('')}</tr></thead>
        <tbody>${rows.map(r => `<tr>
          <td style="padding:5px;border:1px solid #eee;">${r.ts ? new Date(r.ts).toLocaleString('id-ID') : '-'}</td>
          <td style="padding:5px;border:1px solid #eee;font-family:monospace;">${esc(r.ref)}</td>
          <td style="padding:5px;border:1px solid #eee;">${esc(r.product)}</td>
          <td style="padding:5px;border:1px solid #eee;">${esc(r.customer)}</td>
          <td style="padding:5px;border:1px solid #eee;">${esc(r.method)}</td>
          <td style="padding:5px;border:1px solid #eee;text-align:right;">${rp(r.total)}</td>
          <td style="padding:5px;border:1px solid #eee;">${esc(r.status.toUpperCase())}</td></tr>`).join('')}</tbody></table>
        </body></html>`);
      w.document.close(); w.focus(); setTimeout(() => w.print(), 400);
      txiLog('cetak_rekening', TXI.activeUser, 'Rekening koran dicetak (' + rows.length + ' transaksi)');
    }

    function txiExportUserRanking() {
      const list = txiUserStats().sort((a, b) => b.vol - a.vol);
      if (!list.length) return toast('Belum ada data pengguna', 'warn');
      const rows = [['UID', 'Nama', 'HP', 'Saldo', 'Transaksi', 'Sukses', 'Gagal', 'Pending', 'Volume', 'Belanja', 'Topup', 'Margin', 'Risiko Maks', 'Aktivitas Terakhir']];
      list.forEach(u => rows.push([u.uid, u.name, u.phone, u.balance || 0, u.tx, u.succ, u.fail, u.pend, u.vol, u.spend, u.topup, u.margin, u.risk, u.last ? new Date(u.last).toLocaleString('id-ID') : '']));
      downloadCSV('paynusa-peringkat-pengguna-' + Date.now() + '.csv', rows);
    }

    /* ========================================================================
       ALERT ENGINE & WATCHLIST
       ===================================================================== */
    function txiEvaluateAlerts() {
      const R = TXI.rules;
      const acked = txiLoad(TXI_LS.ack, {});
      const out = [];
      const push = (level, rule, r, detail) => {
        const id = rule + '|' + r.ref;
        out.push({ id, level, rule, ref: r.ref, uid: r.uid, user: r.name || r.phone || r.uid, detail, ts: r.ts, ack: !!acked[id] });
      };
      TXI.rows.forEach(r => {
        if (r.total >= R.amount && r.status !== 'failed') push(r.total >= R.amount * 4 ? 'kritis' : 'sedang', 'Nominal Besar', r, 'Transaksi ' + rp(r.total) + ' pada ' + r.product);
        if (r.status === 'pending' && r.age > R.sla * 60000) push(r.age > 86400000 ? 'kritis' : 'sedang', 'Pelanggaran SLA', r, 'Pending selama ' + txiDur(r.age) + ' (batas ' + R.sla + ' menit)');
        if (r.dup) push('sedang', 'Dugaan Duplikat', r, 'Sama persis dengan transaksi lain dalam ' + R.dup + ' menit');
        if (r.velocity >= R.velocity) push('sedang', 'Velocity Tinggi', r, r.velocity + ' transaksi dalam satu jam oleh pengguna ini');
        if (r.status === 'failed' && !r.refundStatus) push('kritis', 'Gagal Tanpa Refund', r, 'Nilai ' + rp(r.total) + ' belum dikembalikan');
        if (r.margin < 0) push('sedang', 'Margin Negatif', r, 'Margin ' + rp(r.margin) + ' pada ' + r.product);
        if (!r.userKnown) push('ringan', 'Pengguna Tak Dikenal', r, 'UID ' + r.uid + ' tidak ada di basis pengguna');
        if (r.flag) push('ringan', 'Watchlist Manual', r, r.adminNote || 'Ditandai admin untuk pemantauan');
      });
      /* beruntun gagal per pengguna */
      const byUser = {};
      TXI.rows.slice().sort((a, b) => a.ts - b.ts).forEach(r => { (byUser[r.uid] = byUser[r.uid] || []).push(r); });
      Object.values(byUser).forEach(list => {
        let streak = 0;
        list.forEach(r => {
          if (r.status === 'failed') { streak++; if (streak >= R.fail) push('kritis', 'Kegagalan Beruntun', r, streak + ' transaksi gagal berturut-turut'); }
          else if (r.status === 'success') streak = 0;
        });
      });
      const order = { kritis: 0, sedang: 1, ringan: 2 };
      out.sort((a, b) => order[a.level] - order[b.level] || b.ts - a.ts);
      TXI.alerts = out;
      return out;
    }

    function txiRenderAlerts() {
      txiEvaluateAlerts();
      const open = TXI.alerts.filter(a => !a.ack);
      const badge = $('badgeAlert');
      if (badge) { badge.textContent = open.length; badge.classList.toggle('hidden', open.length === 0); }
      const traceBadge = $('badgeTrace');
      if (traceBadge) { const n = TXI.rows.filter(r => r.risk >= 60).length; traceBadge.textContent = n; traceBadge.classList.toggle('hidden', n === 0); }
      setTxt('txiAlertCount', open.length + ' alert aktif');

      if (!$('txiAlertBody')) return;
      const mode = txiVal('txiAlertFilter', 'open');
      const list = mode === 'all' ? TXI.alerts : (mode === 'ack' ? TXI.alerts.filter(a => a.ack) : open);
      const lv = (l) => `<span class="badge ${l === 'kritis' ? 'b-bad' : l === 'sedang' ? 'b-warn' : 'b-mute'}">${l.toUpperCase()}</span>`;
      $('txiAlertBody').innerHTML = list.slice(0, 300).map(a => `
        <tr style="${a.ack ? 'opacity:.55;' : ''}">
          <td>${lv(a.level)}</td><td><b style="font-size:.7rem;">${esc(a.rule)}</b></td>
          <td><span class="cell-mono">${esc(a.ref)}</span></td><td>${esc(a.user)}</td>
          <td class="cell-sub">${esc(a.detail)}</td><td class="cell-sub">${txiRelTime(a.ts)}</td>
          <td><div class="row-wrap" style="gap:.2rem;">
            <button class="btn btn-xs btn-soft" onclick="txiOpenModal('${esc(a.ref)}')"><i class="fas fa-route"></i></button>
            <button class="btn btn-xs ${a.ack ? 'btn-soft' : 'btn-ok'}" onclick="txiAck('${esc(a.id)}', ${a.ack ? 'false' : 'true'})"><i class="fas fa-check"></i></button>
          </div></td></tr>`).join('') || emptyRow(7, 'Tidak ada alert pada filter ini', 'fa-bell-slash');

      const watch = TXI.rows.filter(r => r.flag);
      setTxt('txiWatchCount', watch.length + ' transaksi');
      $('txiWatchBody').innerHTML = watch.map(r => `
        <tr><td><span class="cell-mono">${esc(r.ref)}</span></td><td>${esc(r.name || r.uid)}</td>
        <td class="cell-money">${rp(r.total)}</td><td>${statusBadge(r.status)}</td>
        <td class="cell-sub">${esc(r.adminNote || '-')}</td>
        <td><div class="row-wrap" style="gap:.2rem;">
          <button class="btn btn-xs btn-soft" onclick="txiOpenModal('${esc(r.ref)}')"><i class="fas fa-route"></i></button>
          <button class="btn btn-xs btn-danger" onclick="txiToggleFlagOne('${esc(r.ref)}')"><i class="fas fa-xmark"></i></button>
        </div></td></tr>`).join('') || emptyRow(6, 'Watchlist kosong', 'fa-flag');

      if (String(TXI.rules.notify) === '1') txiDesktopNotify(open);
    }

    function txiAck(id, on) {
      const acked = txiLoad(TXI_LS.ack, {});
      if (on) acked[id] = Date.now(); else delete acked[id];
      txiStore(TXI_LS.ack, acked);
      txiLog(on ? 'tandai_alert' : 'buka_alert', id.split('|')[1] || '-', 'Alert: ' + id.split('|')[0]);
      txiRenderAlerts();
    }
    function txiAckAll() {
      const acked = txiLoad(TXI_LS.ack, {});
      TXI.alerts.forEach(a => { acked[a.id] = Date.now(); });
      txiStore(TXI_LS.ack, acked);
      toast('Semua alert ditandai terbaca', 'ok');
      txiRenderAlerts();
    }
    function txiSaveRules() {
      TXI.rules = {
        amount: Number(txiVal('txiRuleAmount', 500000)) || 500000,
        sla: Number(txiVal('txiRuleSla', 60)) || 60,
        fail: Number(txiVal('txiRuleFail', 3)) || 3,
        velocity: Number(txiVal('txiRuleVelocity', 6)) || 6,
        dup: Number(txiVal('txiRuleDupWindow', 15)) || 15,
        notify: Number(txiVal('txiRuleNotify', 0)) || 0
      };
      txiStore(TXI_LS.rules, TXI.rules);
      if (TXI.rules.notify && 'Notification' in window && Notification.permission === 'default') Notification.requestPermission();
      txiLog('ubah_aturan', '-', JSON.stringify(TXI.rules));
      toast('Aturan alert tersimpan & diterapkan ulang', 'ok');
      txiRebuild();
    }
    function txiApplyRulesToForm() {
      const set = (id, v) => { const e = $(id); if (e) e.value = v; };
      set('txiRuleAmount', TXI.rules.amount); set('txiRuleSla', TXI.rules.sla);
      set('txiRuleFail', TXI.rules.fail); set('txiRuleVelocity', TXI.rules.velocity);
      set('txiRuleDupWindow', TXI.rules.dup); set('txiRuleNotify', TXI.rules.notify);
    }
    let txiNotified = {};
    function txiDesktopNotify(open) {
      if (!('Notification' in window) || Notification.permission !== 'granted') return;
      open.filter(a => a.level === 'kritis' && !txiNotified[a.id]).slice(0, 3).forEach(a => {
        txiNotified[a.id] = 1;
        try { new Notification('Alert Transaksi: ' + a.rule, { body: a.ref + ' — ' + a.detail }); } catch (e) {}
      });
    }

    /* ========================================================================
       JEJAK AUDIT ADMIN
       ===================================================================== */
    function txiLog(action, ref, detail) {
      const entry = { ts: Date.now(), admin: (currentAdmin && (currentAdmin.name || currentAdmin.phone)) || 'admin', action, ref: String(ref || '-'), detail: String(detail || '') };
      TXI.audit.unshift(entry);
      if (TXI.audit.length > 800) TXI.audit.length = 800;
      txiStore(TXI_LS.audit, TXI.audit);
      txiRenderAudit();
    }
    function txiRenderAudit() {
      if (!$('txiAuditBody')) return;
      const q = txiLower(txiVal('txiAuditSearch'));
      const list = TXI.audit.filter(a => !q || [a.action, a.ref, a.admin, a.detail].some(v => txiLower(v).includes(q)));
      setTxt('txiAuditCount', TXI.audit.length + ' entri');
      $('txiAuditBody').innerHTML = list.slice(0, 500).map(a => `
        <tr><td class="cell-sub">${fmtDate(a.ts)}<div class="cell-sub">${txiRelTime(a.ts)}</div></td>
        <td><span class="badge b-pri">${esc(a.admin)}</span></td>
        <td><b style="font-size:.7rem;">${esc(a.action)}</b></td>
        <td><span class="cell-mono">${esc(a.ref)}</span></td>
        <td class="cell-sub">${esc(a.detail)}</td></tr>`).join('') || emptyRow(5, 'Belum ada aktivitas admin tercatat', 'fa-clipboard');
    }
    function txiExportAudit() {
      if (!TXI.audit.length) return toast('Belum ada jejak audit', 'warn');
      const rows = [['Waktu', 'Admin', 'Aksi', 'Ref', 'Detail']];
      TXI.audit.forEach(a => rows.push([new Date(a.ts).toLocaleString('id-ID'), a.admin, a.action, a.ref, a.detail]));
      downloadCSV('paynusa-audit-admin-' + Date.now() + '.csv', rows);
    }
    function txiClearAudit() {
      if (!confirm('Bersihkan seluruh jejak audit admin di perangkat ini?')) return;
      TXI.audit = []; txiStore(TXI_LS.audit, TXI.audit); txiRenderAudit();
      toast('Jejak audit dibersihkan', 'ok');
    }

    /* ========================================================================
       ORKESTRASI
       ===================================================================== */
    function txiRebuild() {
      TXI.meta = txiLoad(TXI_LS.meta, {});
      txiNormalize();
      txiPopulateSelects();
      txiRender();
      txiRenderAnalytics();
      txiRenderAlerts();
      txiRenderUserList();
      if (TXI.activeUser) txiRenderUserProfile();
      if ($('txiReconBody') && TXI.recon.issues.length) txiRunRecon();
      txiRenderAudit();
    }

    function txiBoot() {
      TXI.meta = txiLoad(TXI_LS.meta, {});
      TXI.views = txiLoad(TXI_LS.views, []);
      TXI.audit = txiLoad(TXI_LS.audit, []);
      TXI.rules = Object.assign(TXI.rules, txiLoad(TXI_LS.rules, {}));
      txiApplyRulesToForm();
      txiRenderViews();
      txiRenderAudit();
      txiLoadHashFilters();
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
      try { txiBoot(); } catch (e) { console.warn('TXI boot', e); }
      document.getElementById('admPass').addEventListener('keydown', (e) => { if (e.key === 'Enter') e.target.blur(); });
    });
    </script>
  </body>

</html>
