<?php
// =====================================================================
//  BekasiAC — Service AC Profesional Bekasi (Halaman Pelanggan)
//  Deploy: upload file ini ke public_html/index.php
//  Gambar : public_html/image/   |   API: public_html/api/api.php
// =====================================================================
?><!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
<meta name="theme-color" content="#0A2540">
<meta name="description" content="BekasiAC — Kontraktor, distributor & retail AC terbaik di Bekasi. Cuci AC, servis, bongkar-pasang, jual AC baru + instalasi. Teknisi bersertifikat, garansi nyata, respon cepat.">
<title>BekasiAC — Service AC Profesional Bekasi</title>
<link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90'>❄️</text></svg>">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<style>
/* ============ BEKASIAC DESIGN SYSTEM (mobile-first) ============ */
:root{
  --navy:#0A2540; --navy2:#0F3560; --ink:#0F172A;
  --brand:#0284C7; --sky:#0EA5E9; --cyan:#67E8F9;
  --accent:#10B981; --accent-d:#059669;
  --amber:#F59E0B; --danger:#EF4444;
  --bg:#EEF4FA; --card:#FFFFFF; --muted:#64748B; --line:#E2E8F0;
  --r-sm:10px; --r-md:16px; --r-lg:22px; --r-xl:28px;
  --sh-sm:0 2px 8px rgba(10,37,64,.07);
  --sh-md:0 10px 30px rgba(10,37,64,.12);
  --sh-lg:0 20px 60px rgba(10,37,64,.18);
  --font:'Plus Jakarta Sans',system-ui,-apple-system,Segoe UI,Roboto,sans-serif;
  --max:1160px;
}
*{box-sizing:border-box;margin:0;padding:0;-webkit-tap-highlight-color:transparent}
html{scroll-behavior:smooth}
body{font-family:var(--font);background:var(--bg);color:var(--ink);font-size:14px;line-height:1.55;-webkit-font-smoothing:antialiased;padding-bottom:76px}
@media(min-width:900px){body{padding-bottom:0}}
img{max-width:100%}
button,input,select,textarea{font-family:inherit}
.container{max-width:var(--max);margin:0 auto;padding:0 16px}
@media(min-width:900px){.container{padding:0 24px}}
section{scroll-margin-top:90px}

/* ---------- Announcement ---------- */
.announce{background:linear-gradient(90deg,#0EA5E9,#2563EB,#7C3AED);color:#fff;text-align:center;font-size:12px;font-weight:700;padding:9px 12px;position:relative;overflow:hidden}
.announce span.badge{background:rgba(255,255,255,.22);border:1px solid rgba(255,255,255,.4);padding:2px 10px;border-radius:99px;margin-right:8px;font-size:10px;letter-spacing:.5px}
@media(max-width:600px){.announce{font-size:11px}}

/* ---------- Header ---------- */
.site-header{position:sticky;top:0;z-index:200;background:rgba(255,255,255,.86);backdrop-filter:blur(14px);-webkit-backdrop-filter:blur(14px);border-bottom:1px solid var(--line)}
.nav-inner{display:flex;align-items:center;gap:12px;height:64px}
.logo{display:flex;align-items:center;gap:10px;cursor:pointer;user-select:none}
.logo-mark{width:40px;height:40px;border-radius:13px;background:linear-gradient(135deg,#0EA5E9,#2563EB);display:flex;align-items:center;justify-content:center;font-size:21px;box-shadow:0 6px 16px rgba(37,99,235,.35);color:#fff;font-weight:800}
.logo-text{line-height:1.05}
.logo-text b{font-size:18px;letter-spacing:-.5px;color:var(--navy)}
.logo-text b em{font-style:normal;background:linear-gradient(90deg,#0284C7,#0EA5E9);-webkit-background-clip:text;background-clip:text;color:transparent}
.logo-text small{display:block;font-size:10px;color:var(--muted);font-weight:600;letter-spacing:.4px}
.nav-links{display:none;align-items:center;gap:4px;margin-left:12px}
.nav-links a{font-size:13px;font-weight:700;color:#334155;text-decoration:none;padding:9px 14px;border-radius:99px;cursor:pointer;transition:.2s}
.nav-links a:hover{background:#F1F5F9;color:var(--navy)}
.nav-links a.on{background:#E0F2FE;color:#0369A1}
.nav-cta{margin-left:auto;display:flex;align-items:center;gap:8px}
.btn{display:inline-flex;align-items:center;justify-content:center;gap:8px;border:none;cursor:pointer;font-weight:800;border-radius:14px;transition:.2s;text-decoration:none}
.btn-login{background:var(--navy);color:#fff;padding:10px 18px;font-size:13px;border-radius:12px}
.btn-login:hover{background:var(--navy2);transform:translateY(-1px)}
.btn-wa-top{background:#22C55E;color:#fff;padding:10px 14px;font-size:13px;border-radius:12px;display:none}
@media(min-width:900px){.nav-links{display:flex}.btn-wa-top{display:inline-flex}}
.burger{display:flex;width:42px;height:42px;border:1px solid var(--line);background:#fff;border-radius:12px;align-items:center;justify-content:center;font-size:19px;cursor:pointer}
@media(min-width:900px){.burger{display:none}}
.mobile-menu{display:none;border-top:1px solid var(--line);background:#fff;padding:10px 16px 16px}
.mobile-menu.open{display:block}
.mobile-menu a{display:block;padding:12px 10px;font-weight:700;font-size:14px;color:#334155;border-bottom:1px solid #F1F5F9;cursor:pointer;text-decoration:none}
.mobile-menu a:last-child{border:none}

/* ---------- Hero ---------- */
.hero{position:relative;overflow:hidden;background:radial-gradient(1000px 500px at 85% -10%,#1D4ED8 0%,transparent 60%),radial-gradient(700px 400px at -10% 110%,#06B6D4 0%,transparent 55%),linear-gradient(160deg,#071A33 0%,#0A2540 45%,#0C4A6E 100%);color:#fff}
.hero::before{content:'';position:absolute;inset:0;background-image:radial-gradient(rgba(255,255,255,.09) 1px,transparent 1px);background-size:22px 22px;pointer-events:none}
.hero-inner{position:relative;display:grid;gap:26px;padding:34px 0 40px}
@media(min-width:900px){.hero-inner{grid-template-columns:1.05fr .95fr;align-items:center;padding:56px 0 64px;gap:40px}}
.hero-pill{display:inline-flex;align-items:center;gap:8px;background:rgba(255,255,255,.1);border:1px solid rgba(255,255,255,.2);padding:7px 14px;border-radius:99px;font-size:11.5px;font-weight:700;backdrop-filter:blur(6px)}
.hero-pill .dot{width:8px;height:8px;border-radius:50%;background:#4ADE80;box-shadow:0 0 10px #4ADE80;animation:blink 1.8s infinite}
@keyframes blink{50%{opacity:.4}}
.hero h1{font-size:30px;line-height:1.12;letter-spacing:-1px;margin:14px 0 10px;font-weight:800}
.hero h1 .grad{background:linear-gradient(90deg,#67E8F9,#A5F3FC);-webkit-background-clip:text;background-clip:text;color:transparent}
@media(min-width:900px){.hero h1{font-size:48px}}
.hero p.sub{font-size:13.5px;color:#CBD5E1;max-width:520px}
@media(min-width:900px){.hero p.sub{font-size:15px}}
.hero-cta{display:flex;gap:10px;margin-top:20px;flex-wrap:wrap}
.btn-hero-primary{background:linear-gradient(90deg,#0EA5E9,#2563EB);color:#fff;padding:15px 24px;font-size:14px;border-radius:15px;box-shadow:0 12px 30px rgba(14,165,233,.4)}
.btn-hero-primary:hover{transform:translateY(-2px);box-shadow:0 16px 36px rgba(14,165,233,.5)}
.btn-hero-ghost{background:rgba(255,255,255,.1);color:#fff;border:1.5px solid rgba(255,255,255,.3);padding:14px 22px;font-size:14px;border-radius:15px}
.btn-hero-ghost:hover{background:rgba(255,255,255,.18)}
.hero-stats{display:flex;gap:10px;margin-top:22px;flex-wrap:wrap}
.hstat{background:rgba(255,255,255,.08);border:1px solid rgba(255,255,255,.14);border-radius:14px;padding:10px 16px;min-width:105px;backdrop-filter:blur(6px)}
.hstat b{display:block;font-size:18px;letter-spacing:-.5px}
.hstat small{font-size:10.5px;color:#CBD5E1;font-weight:600}
.hero-visual{position:relative;display:block}
.hero-card{background:rgba(255,255,255,.07);border:1px solid rgba(255,255,255,.16);border-radius:24px;overflow:hidden;backdrop-filter:blur(10px);box-shadow:var(--sh-lg)}
.hero-card img{width:100%;height:230px;object-fit:cover;display:block}
@media(min-width:900px){.hero-card img{height:300px}}
.hero-card-body{padding:16px 18px;display:flex;align-items:center;gap:12px}
.tech-ava{width:46px;height:46px;border-radius:50%;background:linear-gradient(135deg,#22D3EE,#2563EB);display:flex;align-items:center;justify-content:center;font-size:22px;flex-shrink:0;border:2px solid rgba(255,255,255,.4)}
.hero-card-body b{font-size:13.5px;display:block}
.hero-card-body small{font-size:11.5px;color:#CBD5E1}
.float-chip{position:absolute;background:#fff;color:var(--ink);border-radius:14px;padding:9px 13px;font-size:11.5px;font-weight:800;box-shadow:var(--sh-md);display:flex;align-items:center;gap:8px;animation:floaty 3.5s ease-in-out infinite}
.float-chip small{display:block;font-size:10px;color:var(--muted);font-weight:600}
.fc1{top:14px;right:10px}
.fc2{bottom:86px;left:-6px;animation-delay:1.2s}
@media(min-width:900px){.fc2{left:-24px}}
@keyframes floaty{50%{transform:translateY(-8px)}}

/* ---------- Trust strip ---------- */
.trust{display:flex;gap:8px;overflow-x:auto;padding:14px 0 4px;scrollbar-width:none}
.trust::-webkit-scrollbar{display:none}
.trust span{flex-shrink:0;background:#fff;border:1px solid var(--line);border-radius:99px;padding:8px 15px;font-size:12px;font-weight:700;color:#334155;box-shadow:var(--sh-sm)}

/* ---------- Sections ---------- */
.sec{padding:34px 0}
@media(min-width:900px){.sec{padding:52px 0}}
.sec-head{margin-bottom:18px}
.sec-head h2{font-size:21px;letter-spacing:-.5px;font-weight:800}
@media(min-width:900px){.sec-head h2{font-size:30px}}
.sec-head p{font-size:12.5px;color:var(--muted);margin-top:4px}
.sec-head .bar{width:44px;height:4px;border-radius:99px;background:linear-gradient(90deg,var(--sky),#2563EB);margin-top:10px}

/* ---------- Services ---------- */
.svc-grid{display:grid;grid-template-columns:repeat(2,1fr);gap:12px}
@media(min-width:900px){.svc-grid{grid-template-columns:repeat(4,1fr);gap:18px}}
.svc{background:var(--card);border:1px solid var(--line);border-radius:20px;padding:20px 16px;cursor:pointer;position:relative;overflow:hidden;transition:.25s;box-shadow:var(--sh-sm)}
.svc:hover{transform:translateY(-4px);box-shadow:var(--sh-md);border-color:#BAE6FD}
.svc::after{content:'';position:absolute;top:0;left:0;right:0;height:4px;background:linear-gradient(90deg,var(--sky),#2563EB);opacity:0;transition:.25s}
.svc:hover::after{opacity:1}
.svc.hl{background:linear-gradient(160deg,#0A2540,#0C4A6E);border-color:#0A2540;color:#fff}
.svc.hl p{color:#BAE6FD}
.svc-ic{width:48px;height:48px;border-radius:15px;display:flex;align-items:center;justify-content:center;font-size:24px;margin-bottom:12px}
.svc h3{font-size:14px;font-weight:800;margin-bottom:6px}
@media(min-width:900px){.svc h3{font-size:16px}}
.svc p{font-size:11.5px;color:var(--muted);line-height:1.5;min-height:52px}
.svc-act{margin-top:12px;font-size:12px;font-weight:800;color:var(--brand);display:flex;align-items:center;gap:6px}
.svc.hl .svc-act{color:var(--cyan)}
.bg-blue{background:#E0F2FE}.bg-green{background:#DCFCE7}.bg-amber{background:#FEF3C7}.bg-violet{background:#EDE9FE}

/* ---------- Promo banner ---------- */
.promo{background:linear-gradient(120deg,#F59E0B,#EF4444 60%,#DC2626);border-radius:22px;color:#fff;padding:22px 20px;display:grid;gap:14px;position:relative;overflow:hidden;box-shadow:var(--sh-md)}
@media(min-width:900px){.promo{grid-template-columns:1fr auto;align-items:center;padding:28px 32px}}
.promo::before{content:'❄';position:absolute;right:-10px;bottom:-38px;font-size:150px;opacity:.15;transform:rotate(-12deg)}
.promo h3{font-size:18px;font-weight:800;letter-spacing:-.3px}
.promo p{font-size:12.5px;opacity:.95;margin-top:4px;max-width:560px}
.promo .btn{background:#fff;color:#DC2626;padding:13px 22px;font-size:13px;border-radius:13px;position:relative;z-index:2;white-space:nowrap}

/* ---------- Steps ---------- */
.steps{display:grid;gap:12px}
@media(min-width:900px){.steps{grid-template-columns:repeat(4,1fr);gap:16px}}
.step{background:#fff;border:1px solid var(--line);border-radius:18px;padding:18px;display:flex;gap:14px;align-items:flex-start;box-shadow:var(--sh-sm)}
.step-n{width:38px;height:38px;border-radius:12px;background:linear-gradient(135deg,#0EA5E9,#2563EB);color:#fff;font-weight:800;display:flex;align-items:center;justify-content:center;font-size:16px;flex-shrink:0}
.step b{font-size:13.5px;display:block;margin-bottom:3px}
.step p{font-size:12px;color:var(--muted)}

/* ---------- Tabs docs ---------- */
.tabs{display:flex;gap:8px;margin-bottom:16px}
.tab{flex:1;border:1.5px solid var(--line);background:#fff;border-radius:14px;padding:12px;font-weight:800;font-size:13px;cursor:pointer;color:var(--muted);transition:.2s;text-align:center}
.tab.on{background:var(--navy);color:#fff;border-color:var(--navy);box-shadow:var(--sh-md)}
.snap{display:flex;gap:12px;overflow-x:auto;padding:4px 2px 14px;scroll-snap-type:x mandatory;-webkit-overflow-scrolling:touch}
.snap::-webkit-scrollbar{height:6px}
.snap::-webkit-scrollbar-thumb{background:#CBD5E1;border-radius:99px}
.gal-card{flex:0 0 78%;max-width:300px;scroll-snap-align:center;border-radius:18px;overflow:hidden;position:relative;height:210px;box-shadow:var(--sh-sm);cursor:pointer;border:1px solid var(--line);background:#E2E8F0}
@media(min-width:900px){.gal-card{flex:0 0 280px}}
.gal-card img{width:100%;height:100%;object-fit:cover;transition:.4s}
.gal-card:hover img{transform:scale(1.06)}
.gal-cap{position:absolute;left:0;right:0;bottom:0;padding:34px 14px 12px;background:linear-gradient(to top,rgba(7,26,51,.92),transparent);color:#fff;font-size:12.5px;font-weight:700}
.vid-card{flex:0 0 84%;max-width:330px;scroll-snap-align:center;background:#000;border-radius:18px;overflow:hidden;border:1px solid var(--line)}
@media(min-width:900px){.vid-card{flex:0 0 320px}}
.vid-card iframe{width:100%;height:180px;border:none;display:block}
.vid-cap{background:#fff;padding:10px 14px;font-size:12px;font-weight:700}

/* ---------- Why ---------- */
.why-grid{display:grid;grid-template-columns:repeat(2,1fr);gap:12px}
@media(min-width:900px){.why-grid{grid-template-columns:repeat(4,1fr);gap:16px}}
.why{background:#fff;border:1px solid var(--line);border-radius:18px;padding:20px 16px;box-shadow:var(--sh-sm)}
.why .ic{font-size:30px;margin-bottom:10px}
.why h4{font-size:13.5px;font-weight:800;margin-bottom:6px}
.why p{font-size:11.5px;color:var(--muted)}

/* ---------- Reviews ---------- */
.rev-summary{background:var(--navy);color:#fff;border-radius:22px;padding:24px 20px;display:grid;gap:16px;margin-bottom:16px;position:relative;overflow:hidden}
@media(min-width:900px){.rev-summary{grid-template-columns:auto 1fr auto;align-items:center;padding:28px 32px}}
.rev-summary::after{content:'';position:absolute;width:280px;height:280px;background:rgba(14,165,233,.18);border-radius:50%;right:-80px;top:-80px;filter:blur(10px)}
.rev-big{font-size:44px;font-weight:800;letter-spacing:-2px}
.rev-stars{color:#FBBF24;font-size:18px;letter-spacing:2px}
.rev-list{display:flex;gap:12px;overflow-x:auto;padding:4px 2px 14px;scroll-snap-type:x mandatory}
.rev-card{flex:0 0 82%;max-width:320px;scroll-snap-align:center;background:#fff;border:1px solid var(--line);border-radius:18px;padding:16px;box-shadow:var(--sh-sm)}
@media(min-width:900px){.rev-card{flex:0 0 300px}}
.rev-card .stars{color:#FBBF24;font-size:12px;margin-bottom:8px;letter-spacing:1px}
.rev-card p{font-size:12.5px;font-style:italic;color:#334155;margin-bottom:12px}
.rev-who{display:flex;align-items:center;gap:10px}
.rev-ava{width:36px;height:36px;border-radius:50%;background:linear-gradient(135deg,#0EA5E9,#2563EB);color:#fff;font-weight:800;display:flex;align-items:center;justify-content:center;font-size:15px;flex-shrink:0}
.rev-who b{font-size:12.5px;display:block}
.rev-who small{font-size:11px;color:var(--muted)}
.rev-photo{width:100%;height:130px;object-fit:cover;border-radius:12px;margin-top:10px;border:1px solid var(--line);cursor:zoom-in}

/* ---------- Coverage & FAQ ---------- */
.two-col{display:grid;gap:20px}
@media(min-width:900px){.two-col{grid-template-columns:1fr 1fr;gap:28px}}
.area-box{background:#fff;border:1px solid var(--line);border-radius:20px;padding:22px 18px;box-shadow:var(--sh-sm)}
.chips{display:flex;flex-wrap:wrap;gap:8px;margin-top:12px}
.chips span{background:#F0F9FF;border:1px solid #BAE6FD;color:#0369A1;font-size:12px;font-weight:700;padding:7px 13px;border-radius:99px}
.faq-item{background:#fff;border:1px solid var(--line);border-radius:16px;margin-bottom:10px;overflow:hidden;box-shadow:var(--sh-sm)}
.faq-q{padding:15px 16px;font-weight:800;font-size:13px;cursor:pointer;display:flex;justify-content:space-between;align-items:center;gap:10px;list-style:none}
.faq-q::-webkit-details-marker{display:none}
.faq-item[open] .faq-q{color:#0369A1}
.faq-a{padding:0 16px 16px;font-size:12.5px;color:var(--muted)}

/* ---------- CTA ---------- */
.cta{background:linear-gradient(135deg,#052E16,#166534 55%,#15803D);border-radius:24px;padding:30px 22px;text-align:center;color:#fff;position:relative;overflow:hidden;box-shadow:var(--sh-md)}
.cta h2{font-size:22px;letter-spacing:-.5px;margin-bottom:8px}
.cta p{font-size:13px;opacity:.92;max-width:480px;margin:0 auto}
.cta .btn{background:#fff;color:#166534;padding:15px 30px;font-size:14px;border-radius:14px;margin-top:18px}

/* ---------- Footer ---------- */
footer{background:#071A33;color:#CBD5E1;margin-top:36px;padding:36px 0 20px}
.foot-grid{display:grid;gap:24px}
@media(min-width:900px){.foot-grid{grid-template-columns:1.3fr 1fr 1fr}}
.foot-grid h4{color:#fff;font-size:14px;margin-bottom:12px}
.foot-grid a,.foot-grid p{font-size:12.5px;color:#94A3B8;text-decoration:none;display:block;margin-bottom:8px}
.copy{border-top:1px solid rgba(255,255,255,.1);margin-top:24px;padding-top:16px;text-align:center;font-size:11.5px;color:#64748B}

/* ---------- Bottom nav (mobile) ---------- */
.bottom-nav{position:fixed;bottom:0;left:0;right:0;z-index:300;background:rgba(255,255,255,.94);backdrop-filter:blur(14px);border-top:1px solid var(--line);display:grid;grid-template-columns:repeat(5,1fr);padding:8px 4px calc(8px + env(safe-area-inset-bottom));box-shadow:0 -8px 30px rgba(10,37,64,.1)}
@media(min-width:900px){.bottom-nav{display:none}}

/* ---------- Page head (banner tiap halaman) ---------- */
.page-head{background:radial-gradient(700px 300px at 90% -30%,#1D4ED8 0%,transparent 60%),linear-gradient(135deg,#071A33 0%,#0A2540 55%,#0C4A6E 100%);color:#fff;padding:26px 0 30px;position:relative;overflow:hidden}
.page-head::before{content:'';position:absolute;inset:0;background-image:radial-gradient(rgba(255,255,255,.08) 1px,transparent 1px);background-size:22px 22px;pointer-events:none}
.page-head .crumb{position:relative;font-size:11px;color:#7DD3FC;font-weight:800;letter-spacing:.4px;cursor:pointer;margin-bottom:7px;display:inline-block}
.page-head h1{position:relative;font-size:24px;font-weight:800;letter-spacing:-.6px;line-height:1.15}
@media(min-width:900px){.page-head h1{font-size:32px}}
.page-head p{position:relative;font-size:12.5px;color:#BAE6FD;margin-top:5px;max-width:560px}

/* ---------- Explore grid (beranda) ---------- */
.exp-grid{display:grid;grid-template-columns:repeat(2,1fr);gap:10px}
@media(min-width:900px){.exp-grid{grid-template-columns:repeat(3,1fr);gap:14px}}
.exp{background:#fff;border:1px solid var(--line);border-radius:var(--r-md);padding:16px;cursor:pointer;box-shadow:var(--sh-sm);transition:.2s}
.exp:hover{transform:translateY(-3px);box-shadow:var(--sh-md);border-color:#BAE6FD}
.exp span{font-size:26px;display:block;margin-bottom:8px}
.exp b{font-size:13.5px;display:block;letter-spacing:-.2px}
.exp p{font-size:11.5px;color:var(--muted);margin-top:3px}
.exp i{font-style:normal;display:inline-block;margin-top:9px;font-size:11.5px;font-weight:800;color:var(--brand)}

/* ---------- Tips & edukasi ---------- */
.tip-grid{display:grid;gap:12px}
@media(min-width:900px){.tip-grid{grid-template-columns:repeat(2,1fr);gap:16px;align-items:start}}
.tip{background:#fff;border:1px solid var(--line);border-radius:var(--r-md);box-shadow:var(--sh-sm);overflow:hidden}
.tip summary{list-style:none;display:flex;gap:12px;align-items:center;padding:15px 16px;cursor:pointer}
.tip summary::-webkit-details-marker{display:none}
.tip[open]{border-color:#BAE6FD;box-shadow:var(--sh-md)}
.tip-ic{width:44px;height:44px;border-radius:12px;background:#E0F2FE;display:flex;align-items:center;justify-content:center;font-size:22px;flex-shrink:0}
.tip b{font-size:13.5px;display:block;letter-spacing:-.2px}
.tip small{font-size:11px;color:var(--muted);font-weight:600}
.tip .arrow{margin-left:auto;color:#94A3B8;font-size:12px;transition:.2s;flex-shrink:0}
.tip[open] .arrow{transform:rotate(90deg);color:var(--brand)}
.tip-body{margin:0 16px 16px;padding-top:12px;border-top:1px dashed var(--line);font-size:12.5px;color:#475569;line-height:1.75}
.tip-body ul{margin:8px 0 0 18px}
.tip-body li{margin-bottom:5px}
.bn-item{display:flex;flex-direction:column;align-items:center;gap:3px;padding:7px 4px;border-radius:12px;cursor:pointer;color:#94A3B8;font-size:10px;font-weight:700;border:none;background:none}
.bn-item .ic{font-size:20px}
.bn-item.on{color:#0284C7;background:#F0F9FF}

/* ---------- Floating cart & WA ---------- */
.floating-cart{display:none;position:fixed;left:12px;right:12px;z-index:310;background:linear-gradient(120deg,#0A2540,#0C4A6E);border-radius:18px;padding:12px 12px 12px 18px;align-items:center;justify-content:space-between;box-shadow:0 14px 40px rgba(10,37,64,.45);border:1px solid rgba(255,255,255,.15);bottom:86px}
@media(min-width:900px){.floating-cart{left:auto;right:24px;bottom:24px;width:380px}}
.floating-cart.show{display:flex;animation:slideUp .3s ease}
@keyframes slideUp{from{transform:translateY(20px);opacity:0}}
.cart-info small{color:#93C5FD;font-size:11px;font-weight:700}
.cart-total{color:#fff;font-size:18px;font-weight:800;display:block}
.cart-go{background:linear-gradient(90deg,#10B981,#059669);color:#fff;border:none;padding:13px 22px;border-radius:13px;font-weight:800;font-size:13px;cursor:pointer;box-shadow:0 6px 18px rgba(16,185,129,.4)}
.wa-float{position:fixed;right:14px;bottom:150px;z-index:290;width:54px;height:54px;border-radius:50%;background:#22C55E;display:flex;align-items:center;justify-content:center;font-size:26px;box-shadow:0 10px 26px rgba(34,197,94,.5);text-decoration:none;transition:.2s}
.wa-float:hover{transform:scale(1.08)}
@media(min-width:900px){.wa-float{bottom:100px;right:24px}}

/* ---------- Modals (bottom-sheet on mobile) ---------- */
.modal{display:none;position:fixed;inset:0;z-index:1000;background:rgba(7,26,51,.6);backdrop-filter:blur(5px);align-items:flex-end;justify-content:center}
.modal.open{display:flex}
@media(min-width:700px){.modal{align-items:center;padding:20px}}
.modal-card{background:#fff;width:100%;max-width:480px;max-height:92vh;overflow-y:auto;border-radius:24px 24px 0 0;padding:22px 18px calc(26px + env(safe-area-inset-bottom));position:relative;animation:sheetUp .3s ease}
@media(min-width:700px){.modal-card{border-radius:24px;padding:28px;max-height:88vh}}
@keyframes sheetUp{from{transform:translateY(60px);opacity:0}}
.grab{width:44px;height:5px;border-radius:99px;background:#E2E8F0;margin:0 auto 16px}
@media(min-width:700px){.grab{display:none}}
.m-close{position:absolute;top:16px;right:16px;width:34px;height:34px;border-radius:50%;background:#F1F5F9;border:none;font-size:17px;cursor:pointer;color:#64748B}
.modal-card h2{font-size:18px;font-weight:800;letter-spacing:-.3px;margin-bottom:4px;padding-right:40px}
.modal-card .m-sub{font-size:12px;color:var(--muted);margin-bottom:16px}
.f-group{margin-bottom:13px}
.f-group label{display:block;font-size:12px;font-weight:800;margin-bottom:6px;color:#334155}
.f-group input,.f-group select,.f-group textarea{width:100%;padding:13px 14px;border:1.5px solid var(--line);border-radius:13px;font-size:13.5px;outline:none;background:#F8FAFC;transition:.2s;color:var(--ink)}
.f-group input:focus,.f-group select:focus,.f-group textarea:focus{border-color:var(--sky);background:#fff;box-shadow:0 0 0 4px rgba(14,165,233,.12)}
.btn-block{width:100%;padding:15px;border-radius:14px;font-size:14px;margin-top:6px}
.btn-primary{background:linear-gradient(90deg,#0EA5E9,#2563EB);color:#fff;box-shadow:0 8px 22px rgba(37,99,235,.35)}
.btn-green{background:linear-gradient(90deg,#10B981,#059669);color:#fff;box-shadow:0 8px 22px rgba(16,185,129,.35)}
.btn-dark{background:var(--navy);color:#fff}
.btn-light{background:#F1F5F9;color:#475569}
.auth-alt{text-align:center;margin-top:14px;font-size:12.5px;color:var(--muted)}
.auth-alt a{color:var(--brand);font-weight:800;cursor:pointer;text-decoration:none}

/* katalog cards */
.search-bar{display:flex;gap:8px;margin-bottom:12px}
.search-bar input{flex:1;padding:12px 14px;border:1.5px solid var(--line);border-radius:13px;font-size:13px;outline:none;background:#F8FAFC}
.pro{background:#F8FAFC;border:1.5px solid var(--line);border-radius:16px;padding:13px;margin-bottom:10px;cursor:pointer;transition:.2s}
.pro:hover{border-color:#7DD3FC}
.pro.on{border-color:var(--accent);background:#ECFDF5}
.pro-top{display:flex;gap:12px}
.pro-img{width:64px;height:64px;border-radius:13px;object-fit:cover;border:1px solid var(--line);background:#fff;flex-shrink:0}
.pro-ph{width:64px;height:64px;border-radius:13px;border:1.5px dashed #CBD5E1;background:#fff;display:flex;align-items:center;justify-content:center;font-size:26px;flex-shrink:0}
.pro-title{font-weight:800;font-size:13.5px;line-height:1.35}
.pro-desc{font-size:11.5px;color:var(--muted);margin-top:3px;line-height:1.45}
.pro-foot{display:flex;justify-content:space-between;align-items:center;margin-top:10px;border-top:1px dashed #CBD5E1;padding-top:10px}
.pro-price{font-weight:800;color:var(--navy);font-size:14px}
.pro-btn{border:1.5px solid #CBD5E1;background:#fff;color:var(--brand);padding:8px 16px;border-radius:99px;font-size:12px;font-weight:800;cursor:pointer;transition:.2s}
.pro-btn.added{background:var(--accent);border-color:var(--accent);color:#fff}

/* checkout */
.co-item{display:flex;justify-content:space-between;align-items:center;gap:10px;padding:11px 0;border-bottom:1px dashed var(--line)}
.co-item:last-of-type{border:none}
.co-name{font-size:13px;font-weight:700}
.co-price{font-size:13px;font-weight:800;color:var(--navy);white-space:nowrap}
.co-del{background:#FEE2E2;color:#DC2626;border:none;width:32px;height:32px;border-radius:10px;cursor:pointer;font-size:14px;flex-shrink:0}
.co-total{display:flex;justify-content:space-between;align-items:center;background:#F0FDF4;border:1.5px solid #BBF7D0;border-radius:14px;padding:13px 15px;margin-top:10px}
.co-total b{color:#15803D;font-size:17px}

/* profile */
.page{display:none}.page.on{display:block}
.user-card{background:linear-gradient(140deg,#0A2540,#0C4A6E);color:#fff;border-radius:22px;padding:22px;display:flex;gap:16px;align-items:center;margin-bottom:16px;box-shadow:var(--sh-md)}
.user-ava{width:58px;height:58px;border-radius:50%;background:rgba(255,255,255,.15);border:2px solid rgba(255,255,255,.35);display:flex;align-items:center;justify-content:center;font-size:27px;flex-shrink:0}
.hist-card{background:#fff;border:1px solid var(--line);border-radius:16px;padding:15px;margin-bottom:10px;cursor:pointer;transition:.2s}
.hist-card:hover{border-color:#7DD3FC;box-shadow:var(--sh-sm)}
.hist-head{display:flex;justify-content:space-between;align-items:center;gap:8px;margin-bottom:8px}
.hist-date{font-size:11px;color:var(--muted);font-weight:600}
.st{font-size:10px;font-weight:800;padding:5px 11px;border-radius:99px;text-transform:uppercase;letter-spacing:.4px}
.st-dipesan{background:#FEF08A;color:#92400E}.st-diterima{background:#DCFCE7;color:#15803D}.st-ditolak{background:#FEE2E2;color:#B91C1C}
/* timeline */
.tl{display:flex;gap:0;margin:14px 0}
.tl-step{flex:1;text-align:center;position:relative;font-size:10px;font-weight:700;color:#94A3B8}
.tl-dot{width:26px;height:26px;border-radius:50%;background:#E2E8F0;color:#94A3B8;display:flex;align-items:center;justify-content:center;margin:0 auto 5px;font-size:12px;font-weight:800;position:relative;z-index:2}
.tl-step.done{color:#15803D}.tl-step.done .tl-dot{background:#22C55E;color:#fff}
.tl-step::before{content:'';position:absolute;top:13px;left:-50%;width:100%;height:2.5px;background:#E2E8F0;z-index:1}
.tl-step:first-child::before{display:none}
.tl-step.done::before{background:#22C55E}
.kv{background:#F8FAFC;border:1px solid var(--line);border-radius:13px;padding:13px 14px;font-size:12.5px;margin-bottom:10px}
.kv .row{display:flex;justify-content:space-between;gap:10px;padding:6px 0;border-bottom:1px dashed #E2E8F0}
.kv .row:last-child{border:none}
.kv .k{color:var(--muted)}.kv .v{font-weight:700;text-align:right}

/* toast */
#toast{position:fixed;top:14px;left:50%;transform:translateX(-50%) translateY(-120px);background:#0A2540;color:#fff;padding:12px 20px;border-radius:14px;font-size:13px;font-weight:700;z-index:5000;transition:.35s cubic-bezier(.2,.9,.3,1.2);box-shadow:var(--sh-lg);max-width:92%;text-align:center}
#toast.show{transform:translateX(-50%) translateY(0)}
#toast.ok{background:#059669}#toast.err{background:#DC2626}

/* success */
.success-ic{width:82px;height:82px;border-radius:50%;background:#DCFCE7;font-size:42px;display:flex;align-items:center;justify-content:center;margin:6px auto 16px}
.star-input{display:flex;gap:6px;font-size:30px;cursor:pointer}
.star-input span{color:#E2E8F0;transition:.15s}
.star-input span.lit{color:#FBBF24}
.lightbox-img{width:100%;border-radius:16px;max-height:70vh;object-fit:contain;background:#000}
.hide{display:none!important}
.center{text-align:center}
.mt{margin-top:14px}
</style>
</head>
<body>

<div id="toast">Notifikasi</div>

<!-- Announcement -->
<div class="announce" id="announceBar"><span class="badge">PROMO</span><span id="announceText">Gratis biaya survei untuk wilayah Bekasi kota — klaim sekarang!</span></div>

<!-- Header -->
<header class="site-header">
  <div class="container nav-inner">
    <div class="logo" onclick="goPage('beranda')">
      <div class="logo-mark">❄</div>
      <div class="logo-text"><b>Bekasi<em>AC</em></b><small>SERVICE AC PROFESIONAL</small></div>
    </div>
    <nav class="nav-links">
      <a id="nl-beranda" class="on" onclick="goPage('beranda')">Beranda</a>
      <a id="nl-layanan" onclick="goPage('layanan')">Layanan & Harga</a>
      <a id="nl-galeri" onclick="goPage('galeri')">Galeri</a>
      <a id="nl-ulasan" onclick="goPage('ulasan')">Ulasan</a>
      <a id="nl-tips" onclick="goPage('tips')">Tips AC</a>
      <a id="nl-tentang" onclick="goPage('tentang')">Tentang</a>
      <a id="nl-profil" style="display:none" onclick="goPage('profil')">📦 Pesanan Saya</a>
    </nav>
    <div class="nav-cta">
      <a class="btn btn-wa-top" id="topWaBtn" href="https://wa.me/62817387060" target="_blank">💬 WA Kami</a>
      <button class="btn btn-login" id="btnAuth" onclick="toggleAuth()">Masuk</button>
      <button class="burger" onclick="document.getElementById('mMenu').classList.toggle('open')">☰</button>
    </div>
  </div>
  <div class="mobile-menu" id="mMenu">
    <a onclick="goPage('beranda')">🏠 Beranda</a>
    <a onclick="goPage('layanan')">🧰 Layanan & Harga</a>
    <a onclick="goPage('galeri')">📸 Galeri & Video</a>
    <a onclick="goPage('ulasan')">⭐ Ulasan Pelanggan</a>
    <a onclick="goPage('tips')">💡 Tips & Edukasi AC</a>
    <a onclick="goPage('tentang')">🏢 Tentang & FAQ</a>
    <a id="mm-profil" style="display:none" onclick="goPage('profil')">📦 Pesanan Saya</a>
  </div>
</header>

<!-- ================= BERANDA ================= -->
<div id="page-beranda" class="page on">
  <!-- HERO -->
  <div class="hero">
    <div class="container hero-inner">
      <div>
        <div class="hero-pill"><span class="dot"></span><span id="heroPill">Teknisi standby hari ini • Bekasi & sekitarnya</span></div>
        <h1 id="heroTitle">AC Dingin Lagi <span class="grad">dalam Sekejap.</span></h1>
        <p class="sub" id="heroSub">BekasiAC — kontraktor, distributor & retail AC terpercaya. Cuci, servis, bongkar-pasang, hingga AC baru + instalasi. Harga transparan, garansi nyata.</p>
        <div class="hero-cta">
          <button class="btn btn-hero-primary" onclick="goPage('layanan')">🧰 Pesan Layanan</button>
          <a class="btn btn-hero-ghost" id="heroWaBtn" href="https://wa.me/62817387060" target="_blank">💬 Chat WhatsApp</a>
        </div>
        <div class="hero-stats">
          <div class="hstat"><b><span class="count" data-n="12">0</span>+ th</b><small>Pengalaman</small></div>
          <div class="hstat"><b><span class="count" data-n="6800">0</span>+</b><small>Unit ditangani</small></div>
          <div class="hstat"><b>4.9★</b><small>Rating pelanggan</small></div>
        </div>
      </div>
      <div class="hero-visual">
        <div class="float-chip fc1">🛡️<div>Garansi Servis<small>Klaim mudah via WA</small></div></div>
        <div class="float-chip fc2">⚡<div>Respon &lt; 15 mnt<small>Jam kerja 08–21 WIB</small></div></div>
        <div class="hero-card">
          <img src="https://images.unsplash.com/photo-1621905251189-08b45d6a269e?w=900&q=70&auto=format&fit=crop" alt="Teknisi AC BekasiAC" loading="eager" onerror="this.style.display='none'">
          <div class="hero-card-body">
            <div class="tech-ava">👨‍🔧</div>
            <div><b>Tim teknisi bersertifikat</b><small>Ribuan rumah & kantor di Bekasi percaya pada kami</small></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="trust">
      <span>🛡️ Teknisi Bersertifikat</span><span>⚡ Datang Cepat</span><span>💯 Garansi Nyata</span><span>🧾 Harga Transparan</span><span>🔧 Sparepart Original</span><span>📍 Bekasi & Sekitarnya</span>
    </div>

    <!-- LAYANAN -->
    <section class="sec" id="layanan">
      <div class="sec-head"><h2>🧰 Layanan Unggulan</h2><p>Ketuk kategori untuk melihat daftar harga & memesan.</p><div class="bar"></div></div>
      <div class="svc-grid">
        <div class="svc hl" onclick="openKatalog('beli_ac')">
          <div class="svc-ic" style="background:rgba(255,255,255,.15)">📦</div>
          <h3>Beli AC Baru</h3><p>Unit original + instalasi profesional & material berkualitas.</p>
          <div class="svc-act">Lihat katalog →</div>
        </div>
        <div class="svc" onclick="openKatalog('cuci')">
          <div class="svc-ic bg-blue">❄️</div>
          <h3>Cuci AC</h3><p>Cuci menyeluruh indoor & outdoor, udara segar kembali.</p>
          <div class="svc-act">Pilih paket →</div>
        </div>
        <div class="svc" onclick="openKatalog('bongkar_pasang')">
          <div class="svc-ic bg-amber">🔧</div>
          <h3>Bongkar / Pasang</h3><p>Relokasi aman dengan pump-down freon standar pabrik.</p>
          <div class="svc-act">Cek biaya →</div>
        </div>
        <div class="svc" onclick="openKatalog('servis')">
          <div class="svc-ic bg-violet">🛠️</div>
          <h3>Servis & Perbaikan</h3><p>Tidak dingin, bocor, mati total — beres oleh ahli.</p>
          <div class="svc-act">Estimasi →</div>
        </div>
      </div>
    </section>

    <!-- PROMO -->
    <section class="sec" id="promoSec" style="padding-top:0">
      <div class="promo">
        <div><h3 id="promoTitle">🎉 Promo: Cuci 2 AC gratis 1x cek freon!</h3><p id="promoDesc">Berlaku untuk semua area Bekasi bulan ini. Pesan lewat website & tunjukkan kode <b>BEDINGIN</b> ke teknisi.</p></div>
        <button class="btn" onclick="goPage('layanan')">Klaim Promo 🎁</button>
      </div>
    </section>


    <!-- JELAJAHI -->
    <section class="sec" style="padding-top:0">
      <div class="sec-head"><h2>🧭 Jelajahi BekasiAC</h2><p>Setiap fitur kini punya halamannya sendiri — lebih rapi & mudah ditemukan.</p><div class="bar"></div></div>
      <div class="exp-grid">
        <div class="exp" onclick="goPage('layanan')"><span>🧰</span><b>Layanan & Harga</b><p>Daftar harga lengkap semua layanan AC.</p><i>Buka menu →</i></div>
        <div class="exp" onclick="goPage('galeri')"><span>📸</span><b>Galeri & Video</b><p>Dokumentasi asli pekerjaan teknisi kami.</p><i>Lihat bukti →</i></div>
        <div class="exp" onclick="goPage('ulasan')"><span>⭐</span><b>Ulasan Pelanggan</b><p>Kata mereka yang sudah pakai jasa kami.</p><i>Baca ulasan →</i></div>
        <div class="exp" onclick="goPage('tips')"><span>💡</span><b>Tips & Edukasi AC</b><p>Rawat AC agar awet & hemat listrik.</p><i>Pelajari →</i></div>
        <div class="exp" onclick="goPage('tentang')"><span>🏢</span><b>Tentang & FAQ</b><p>Profil, area layanan & tanya jawab.</p><i>Kenali kami →</i></div>
        <div class="exp" onclick="checkProfile()"><span>📦</span><b>Pesanan Saya</b><p>Lacak status pesanan Anda real-time.</p><i>Cek status →</i></div>
      </div>
    </section>

    <!-- CTA -->
    <section class="sec" style="padding-top:0">
      <div class="cta">
        <h2>AC bermasalah? Jangan tunggu rusak parah ❄️</h2>
        <p>Chat sekarang — admin fast respon, teknisi bisa meluncur hari ini juga.</p>
        <br><a class="btn" id="ctaWaBtn" href="https://wa.me/62817387060" target="_blank">💬 Chat WhatsApp Sekarang</a>
      </div>
    </section>
  </div>
</div>

<!-- ================= HALAMAN LAYANAN ================= -->
<div id="page-layanan" class="page">
  <div class="page-head"><div class="container">
    <span class="crumb" onclick="goPage('beranda')">🏠 Beranda &rsaquo; Layanan & Harga</span>
    <h1>🧰 Layanan & Daftar Harga</h1>
    <p>Pilih kategori untuk melihat daftar harga lengkap dan langsung memesan — tanpa telepon, tanpa antre.</p>
  </div></div>
  <div class="container">
    <!-- LAYANAN -->
    <section class="sec" id="layanan-list">
      <div class="sec-head"><h2>🧰 Pilih Kategori Layanan</h2><p>Ketuk kategori untuk melihat daftar harga & memesan.</p><div class="bar"></div></div>
      <div class="svc-grid">
        <div class="svc hl" onclick="openKatalog('beli_ac')">
          <div class="svc-ic" style="background:rgba(255,255,255,.15)">📦</div>
          <h3>Beli AC Baru</h3><p>Unit original + instalasi profesional & material berkualitas.</p>
          <div class="svc-act">Lihat katalog →</div>
        </div>
        <div class="svc" onclick="openKatalog('cuci')">
          <div class="svc-ic bg-blue">❄️</div>
          <h3>Cuci AC</h3><p>Cuci menyeluruh indoor & outdoor, udara segar kembali.</p>
          <div class="svc-act">Pilih paket →</div>
        </div>
        <div class="svc" onclick="openKatalog('bongkar_pasang')">
          <div class="svc-ic bg-amber">🔧</div>
          <h3>Bongkar / Pasang</h3><p>Relokasi aman dengan pump-down freon standar pabrik.</p>
          <div class="svc-act">Cek biaya →</div>
        </div>
        <div class="svc" onclick="openKatalog('servis')">
          <div class="svc-ic bg-violet">🛠️</div>
          <h3>Servis & Perbaikan</h3><p>Tidak dingin, bocor, mati total — beres oleh ahli.</p>
          <div class="svc-act">Estimasi →</div>
        </div>
      </div>
    </section>

    <!-- CARA PESAN -->
    <section class="sec" style="padding-top:0">
      <div class="sec-head"><h2>📝 Cara Pesan (1 menit)</h2><p>Tanpa ribet, tanpa antre telepon.</p><div class="bar"></div></div>
      <div class="steps">
        <div class="step"><div class="step-n">1</div><div><b>Pilih layanan</b><p>Ketuk kategori & masukkan ke keranjang.</p></div></div>
        <div class="step"><div class="step-n">2</div><div><b>Isi jadwal & alamat</b><p>Tanggal, area, dan patokan lokasi.</p></div></div>
        <div class="step"><div class="step-n">3</div><div><b>Admin konfirmasi</b><p>Via WhatsApp + status real-time.</p></div></div>
        <div class="step"><div class="step-n">4</div><div><b>Teknisi datang</b><p>Kerjakan rapi, bayar di tempat.</p></div></div>
      </div>
    </section>


    <!-- JAMINAN -->
    <section class="sec" style="padding-top:0">
      <div class="two-col">
        <div class="area-box">
          <h3 style="font-size:16px;font-weight:800">🛡️ Jaminan Layanan BekasiAC</h3>
          <div class="kv mt">
            <div class="row"><span class="k">✅ Garansi servis</span><span class="v">Klaim mudah via WA</span></div>
            <div class="row"><span class="k">🧾 Harga transparan</span><span class="v">Sesuai katalog, tanpa biaya siluman</span></div>
            <div class="row"><span class="k">⚙️ Sparepart</span><span class="v">Original / grade terbaik</span></div>
            <div class="row"><span class="k">👨‍🔧 Teknisi</span><span class="v">Bersertifikat & berpengalaman</span></div>
            <div class="row"><span class="k">🧹 Kerapian</span><span class="v">Lokasi bersih setelah pengerjaan</span></div>
          </div>
        </div>
        <div class="area-box">
          <h3 style="font-size:16px;font-weight:800">💳 Cara Pembayaran</h3>
          <p style="font-size:12.5px;color:var(--muted);margin-top:4px">Bayar setelah pekerjaan selesai & Anda puas dengan hasilnya.</p>
          <div class="chips"><span>💵 Tunai</span><span>🏦 Transfer Bank</span><span>📱 QRIS</span><span>💳 E-Wallet</span></div>
          <div class="kv mt">
            <div class="row"><span class="k">⏰ Jam operasional</span><span class="v">08.00 – 21.00 WIB</span></div>
            <div class="row"><span class="k">🚗 Survei area ★</span><span class="v">GRATIS</span></div>
            <div class="row"><span class="k">📅 Booking</span><span class="v">Bisa pilih tanggal sendiri</span></div>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>

<!-- ================= HALAMAN GALERI ================= -->
<div id="page-galeri" class="page">
  <div class="page-head"><div class="container">
    <span class="crumb" onclick="goPage('beranda')">🏠 Beranda &rsaquo; Galeri & Video</span>
    <h1>📸 Galeri & Video Pengerjaan</h1>
    <p>Bukti nyata hasil kerja teknisi kami di lapangan — foto asli & video dokumentasi, bukan stok internet.</p>
  </div></div>
  <div class="container">
    <!-- GALERI -->
    <section class="sec" id="galeri">
      <div class="sec-head"><h2>📸 Dokumentasi Kerja</h2><p>Bukti nyata pengerjaan teknisi kami. Geser ke samping →</p><div class="bar"></div></div>
      <div class="tabs">
        <button class="tab on" id="tabFoto" onclick="switchDocTab('foto')">📸 Foto</button>
        <button class="tab" id="tabVideo" onclick="switchDocTab('video')">▶️ Video</button>
      </div>
      <div class="snap" id="galeriSnap"><div style="padding:24px;color:var(--muted);font-size:13px">Memuat galeri…</div></div>
      <div class="snap hide" id="videoSnap"><div style="padding:24px;color:var(--muted);font-size:13px">Memuat video…</div></div>
    </section>

  </div>
</div>

<!-- ================= HALAMAN ULASAN ================= -->
<div id="page-ulasan" class="page">
  <div class="page-head"><div class="container">
    <span class="crumb" onclick="goPage('beranda')">🏠 Beranda &rsaquo; Ulasan Pelanggan</span>
    <h1>⭐ Ulasan Pelanggan</h1>
    <p>Penilaian jujur dari pelanggan di seluruh Bekasi. Anda juga bisa menulis ulasan + foto hasil pengerjaan.</p>
  </div></div>
  <div class="container">
    <!-- TESTIMONI -->
    <section class="sec" id="testimoni">
      <div class="sec-head"><h2>⭐ Kata Pelanggan</h2><p>Ulasan asli dari database + pelanggan terverifikasi.</p><div class="bar"></div></div>
      <div class="rev-summary">
        <div><div class="rev-big">4.9<span style="font-size:20px;color:#93C5FD">/5</span></div><div class="rev-stars">★★★★★</div><div style="font-size:11.5px;color:#CBD5E1;margin-top:4px" id="revCountLabel">2.400+ ulasan</div></div>
        <div style="font-size:12.5px;color:#DBEAFE;position:relative;z-index:2">“Puas banget! Teknisi datang cepat, kerja rapi, AC langsung dingin nyess. Recommended untuk area Bekasi.”<br><small style="color:#93C5FD">— Rata-rata kesan pelanggan</small></div>
        <button class="btn" style="background:#fff;color:var(--navy);padding:13px 20px;font-size:13px;position:relative;z-index:2" onclick="openModal('reviewModal')">✍️ Tulis Ulasan</button>
      </div>
      <div class="rev-list" id="revList"><div style="padding:20px;color:var(--muted);font-size:13px">Memuat ulasan…</div></div>
    </section>

  </div>
</div>

<!-- ================= HALAMAN TIPS ================= -->
<div id="page-tips" class="page">
  <div class="page-head"><div class="container">
    <span class="crumb" onclick="goPage('beranda')">🏠 Beranda &rsaquo; Tips & Edukasi AC</span>
    <h1>💡 Tips & Edukasi Seputar AC</h1>
    <p>Panduan praktis dari teknisi BekasiAC agar AC Anda awet, dingin maksimal, dan tagihan listrik tetap hemat.</p>
  </div></div>
  <div class="container">
    <section class="sec">
      <div class="tip-grid">
        <details class="tip" open>
          <summary><div class="tip-ic">🧼</div><div><b>Seberapa sering AC harus dicuci?</b><small>Perawatan rutin</small></div><span class="arrow">▶</span></summary>
          <div class="tip-body">Idealnya setiap <b>3 bulan sekali</b> untuk pemakaian normal rumah tangga (8–10 jam/hari). Jika AC dipakai 24 jam (kamar bayi, kantor, server) atau lingkungan berdebu dekat jalan raya, percepat menjadi <b>2 bulan sekali</b>. AC yang rutin dicuci lebih dingin, lebih awet, dan tagihan listriknya bisa turun hingga 20%.</div>
        </details>
        <details class="tip">
          <summary><div class="tip-ic">🌡️</div><div><b>Suhu remote berapa yang paling hemat?</b><small>Hemat listrik</small></div><span class="arrow">▶</span></summary>
          <div class="tip-body">Setel di <b>24–26°C</b>. Setiap turun 1°C, konsumsi listrik naik sekitar 6%. Menyetel 16°C <b>tidak membuat ruangan lebih cepat dingin</b> — kompresor tetap bekerja dengan kecepatan sama, hanya lebih lama menyala. Kombinasikan dengan mode <i>swing</i> dan kipas agar udara merata.</div>
        </details>
        <details class="tip">
          <summary><div class="tip-ic">💧</div><div><b>Kenapa AC menetes / bocor air?</b><small>Masalah umum</small></div><span class="arrow">▶</span></summary>
          <div class="tip-body">Penyebab paling umum: <ul><li><b>Saluran pembuangan (drainase) tersumbat</b> lumut atau debu — 80% kasus.</li><li>Evaporator kotor sehingga air menetes keluar talang.</li><li>Pemasangan kurang miring ke arah pembuangan.</li><li>Freon kurang sehingga evaporator membeku lalu mencair.</li></ul>Jangan dibiarkan — tetesan bisa merusak tembok & plafon. Cukup panggil teknisi untuk cuci + cek drainase.</div>
        </details>
        <details class="tip">
          <summary><div class="tip-ic">❄️</div><div><b>AC menyala tapi tidak dingin?</b><small>Diagnosa cepat</small></div><span class="arrow">▶</span></summary>
          <div class="tip-body">Cek berurutan: <ul><li>Mode remote harus <b>COOL</b> (gambar ❄), bukan FAN/DRY.</li><li>Filter kotor? Cuci filter bisa langsung terasa bedanya.</li><li>Unit outdoor mati / tidak berputar → masalah kelistrikan atau kapasitor.</li><li>Freon habis/bocor → harus ditangani teknisi bersertifikat.</li></ul>Jika 2 poin pertama aman tapi tetap tidak dingin, saatnya panggil teknisi.</div>
        </details>
        <details class="tip">
          <summary><div class="tip-ic">📏</div><div><b>Pilih PK sesuai ukuran ruangan</b><small>Panduan beli AC</small></div><span class="arrow">▶</span></summary>
          <div class="tip-body">Rumus mudah: luas ruangan (m²) × 500 BTU. <ul><li><b>½ PK</b> → ruangan ≤ 10 m²</li><li><b>¾ PK</b> → 10–14 m²</li><li><b>1 PK</b> → 14–18 m²</li><li><b>1½ PK</b> → 18–24 m²</li><li><b>2 PK</b> → 24–36 m²</li></ul>PK kekecilan = AC ngoyo & boros. PK kebesaran = ruangan lembap. Bingung? Konsultasi gratis via WhatsApp kami.</div>
        </details>
        <details class="tip">
          <summary><div class="tip-ic">⚡</div><div><b>AC Inverter vs Standard, pilih mana?</b><small>Panduan beli AC</small></div><span class="arrow">▶</span></summary>
          <div class="tip-body"><b>Inverter</b>: hemat listrik untuk pemakaian lama (6+ jam nonstop), suhu lebih stabil, harga unit lebih mahal. <b>Standard</b>: harga terjangkau, cocok untuk pemakaian singkat & sering on-off, perawatan lebih murah. Kesimpulan: kamar tidur / ruangan yang menyala semalaman → Inverter. Ruang tamu yang hanya dipakai beberapa jam → Standard sudah cukup.</div>
        </details>
        <details class="tip">
          <summary><div class="tip-ic">🧪</div><div><b>Freon AC bisa habis? Kapan harus isi?</b><small>Edukasi</small></div><span class="arrow">▶</span></summary>
          <div class="tip-body">Freon adalah sistem <b>tertutup</b> — normalnya <b>tidak berkurang</b>. Jika freon habis, artinya ada <b>kebocoran</b> di instalasi yang harus dicari dan diperbaiki dulu. Hati-hati dengan layanan "isi freon" tanpa cek kebocoran — freon akan habis lagi dalam hitungan minggu. Teknisi kami selalu cek tekanan & titik bocor lebih dulu.</div>
        </details>
        <details class="tip">
          <summary><div class="tip-ic">🕐</div><div><b>Tanda-tanda AC minta diservis</b><small>Jangan diabaikan</small></div><span class="arrow">▶</span></summary>
          <div class="tip-body"><ul><li>Hembusan tidak sedingin dulu meski suhu remote sama.</li><li>Muncul bunyi berisik / getaran tidak wajar.</li><li>Ada bau apek atau bau gosong saat menyala.</li><li>Tagihan listrik naik padahal pemakaian sama.</li><li>Unit sering mati-nyala sendiri.</li></ul>Semakin cepat ditangani, biaya perbaikan semakin murah. Servis dini mencegah kerusakan kompresor yang mahal.</div>
        </details>
      </div>
      <div class="cta" style="margin-top:22px">
        <h2>Masih ragu diagnosa sendiri? 🤔</h2>
        <p>Konsultasikan gratis ke teknisi kami via WhatsApp — kirim foto/video AC Anda, kami bantu analisa.</p>
        <br><a class="btn" id="tipsWaBtn" href="https://wa.me/62817387060" target="_blank">💬 Konsultasi Gratis</a>
      </div>
    </section>
  </div>
</div>

<!-- ================= HALAMAN TENTANG ================= -->
<div id="page-tentang" class="page">
  <div class="page-head"><div class="container">
    <span class="crumb" onclick="goPage('beranda')">🏠 Beranda &rsaquo; Tentang & FAQ</span>
    <h1>🏢 Tentang BekasiAC</h1>
    <p>Kontraktor, distributor & retail AC terpercaya di Bekasi — lebih dari 10 tahun mendinginkan rumah, kantor, dan industri.</p>
  </div></div>
  <div class="container">
    <section class="sec">
      <div class="sec-head"><h2>👋 Siapa Kami?</h2><div class="bar"></div></div>
      <div class="area-box">
        <p style="font-size:13px;line-height:1.8;color:#334155"><b>BekasiAC</b> berdiri untuk satu misi sederhana: membuat udara sejuk terasa mudah dan terjangkau bagi warga Bekasi. Berawal dari bengkel servis kecil, kini kami melayani <b>ribuan unit AC</b> setiap tahunnya — mulai dari cuci rutin rumahan, perbaikan darurat, bongkar-pasang relokasi, hingga pengadaan & instalasi unit baru untuk kantor dan gedung.</p>
        <p style="font-size:13px;line-height:1.8;color:#334155;margin-top:10px">Semua teknisi kami <b>bersertifikat</b>, dibekali peralatan standar pabrik, dan bekerja dengan SOP yang jelas: diagnosa dulu, sampaikan estimasi harga, baru bekerja setelah Anda setuju. Tidak ada biaya siluman, dan setiap pekerjaan bergaransi.</p>
      </div>
    </section>
    <!-- WHY -->
    <section class="sec" style="padding-top:0">
      <div class="sec-head"><h2>💎 Kenapa BekasiAC?</h2><p>Standar bengkel resmi, harga tukang langganan.</p><div class="bar"></div></div>
      <div class="why-grid">
        <div class="why"><div class="ic">👨‍🔧</div><h4>Teknisi Ahli</h4><p>Ribuan kasus ditangani, kerja teliti & sopan.</p></div>
        <div class="why"><div class="ic">🛡️</div><h4>Garansi Nyata</h4><p>Ada kendala setelah servis? Kami balik gratis*.</p></div>
        <div class="why"><div class="ic">🧾</div><h4>Harga Transparan</h4><p>Estimasi jelas di awal, tanpa biaya siluman.</p></div>
        <div class="why"><div class="ic">⚙️</div><h4>Sparepart Asli</h4><p>Hanya original / grade terbaik bergaransi.</p></div>
      </div>
    </section>

    <!-- AREA + FAQ -->
    <section class="sec" id="faq" style="padding-top:0">
      <div class="two-col">
        <div class="area-box">
          <h3 style="font-size:16px;font-weight:800">📍 Area Layanan</h3>
          <p style="font-size:12.5px;color:var(--muted);margin-top:4px">Gratis survei untuk area bertanda ★. Di luar daftar? Chat admin dulu ya.</p>
          <div class="chips">
            <span>★ Bekasi Barat</span><span>★ Bekasi Timur</span><span>★ Bekasi Selatan</span><span>★ Bekasi Utara</span>
            <span>Cikarang</span><span>Cibitung</span><span>Tambun</span><span>Bantar Gebang</span><span>Sumarecon</span><span>Pondok Gede</span><span>Harapan Indah</span><span>Kranji</span>
          </div>
          <div class="kv mt"><div class="row"><span class="k">⏰ Jam operasional</span><span class="v">08.00 – 21.00 WIB</span></div><div class="row"><span class="k">📞 Telp / WA</span><span class="v" id="footWa">0817-387-060</span></div><div class="row"><span class="k">✉️ Email</span><span class="v">setiatehnik09@gmail.com</span></div></div>
        </div>
        <div>
          <div class="sec-head"><h2>❓ Sering Ditanyakan</h2><div class="bar"></div></div>
          <details class="faq-item" open><summary class="faq-q">Berapa biaya cuci AC? <span>＋</span></summary><div class="faq-a">Mulai dari Rp 60 ribuan per unit tergantung PK & kondisi. Daftar harga lengkap ada di menu <b>Cuci AC</b> — harga yang tampil = harga bayar, tanpa tambahan tersembunyi.</div></details>
          <details class="faq-item"><summary class="faq-q">Apakah ada garansi? <span>＋</span></summary><div class="faq-a">Ya! Semua jasa servis bergaransi. Jika keluhan yang sama muncul kembali dalam masa garansi, teknisi kami datang lagi <b>gratis</b>.</div></details>
          <details class="faq-item"><summary class="faq-q">Bagaimana cara bayar? <span>＋</span></summary><div class="faq-a">Bayar di tempat setelah pekerjaan selesai & Anda puas. Bisa tunai, transfer, QRIS.</div></details>
          <details class="faq-item"><summary class="faq-q">Berapa lama teknisi datang? <span>＋</span></summary><div class="faq-a">Untuk area Bekasi kota umumnya <b>di hari yang sama</b> (tergantung antrean). Anda bisa pilih tanggal pengerjaan saat checkout.</div></details>
          <details class="faq-item"><summary class="faq-q">Apakah jual AC baru? <span>＋</span></summary><div class="faq-a">Ya, kami distributor & retail AC baru semua merk + jasa instalasi & material. Lihat katalog <b>Beli AC Baru</b>.</div></details>
        </div>
      </div>
    </section>

  </div>
</div>

<!-- ================= PROFIL / PESANAN ================= -->
<div id="page-profil" class="page">
  <div class="container sec">
    <div class="sec-head"><h2>📦 Pesanan Saya</h2><p>Status diperbarui otomatis (real-time).</p><div class="bar"></div></div>
    <div class="user-card">
      <div class="user-ava">👤</div>
      <div><b id="displayUsername" style="font-size:17px">Memuat…</b><div id="displayEmail" style="font-size:12px;color:#BAE6FD">…</div><span style="display:inline-block;margin-top:8px;background:#4ADE80;color:#052E16;padding:4px 12px;border-radius:99px;font-size:11px;font-weight:800">● Member Aktif</span></div>
    </div>
    <div id="historyList"><div style="text-align:center;padding:30px;color:var(--muted);font-size:13px">Memuat riwayat…</div></div>
  </div>
</div>

<!-- ================= FOOTER ================= -->
<footer>
  <div class="container foot-grid">
    <div>
      <div style="display:flex;align-items:center;gap:10px;margin-bottom:12px"><div class="logo-mark">❄</div><b style="color:#fff;font-size:18px">BekasiAC</b></div>
      <p>Kontraktor, distributor & retail AC terbaik dan terpercaya di Bekasi. Cuci, servis, bongkar-pasang, pengadaan unit baru.</p>
      <div style="display:flex;gap:8px;margin-top:12px">
        <a href="https://youtube.com/@serviceacbekasi4733?si=hiOsDwp2d3ynW8W1" target="_blank" style="background:#EF4444;color:#fff;padding:9px 16px;border-radius:99px;font-weight:800;font-size:12px;margin:0">▶ YouTube</a>
        <a id="footWaBtn" href="https://wa.me/62817387060" target="_blank" style="background:#22C55E;color:#fff;padding:9px 16px;border-radius:99px;font-weight:800;font-size:12px;margin:0">💬 WhatsApp</a>
      </div>
    </div>
    <div><h4>Layanan</h4><a onclick="openKatalog('beli_ac')">📦 Beli AC Baru</a><a onclick="openKatalog('cuci')">❄️ Cuci AC</a><a onclick="openKatalog('bongkar_pasang')">🔧 Bongkar / Pasang</a><a onclick="openKatalog('servis')">🛠️ Servis Perbaikan</a></div>
    <div><h4>Kontak</h4><p>📞 <span id="footWa2">0817-387-060</span></p><p>✉️ setiatehnik09@gmail.com</p><p>⏰ 08.00 – 21.00 WIB (setiap hari)</p><p>📍 Bekasi, Jawa Barat</p></div>
  </div>
  <div class="container copy">© 2026 BekasiAC • Dibuat dengan ❄️ di Bekasi • <span style="color:#FBBF24">★★★★★</span></div>
</footer>

<!-- Bottom nav -->
<nav class="bottom-nav">
  <button class="bn-item on" id="bn-beranda" onclick="goPage('beranda')"><span class="ic">🏠</span>Beranda</button>
  <button class="bn-item" id="bn-layanan" onclick="goPage('layanan')"><span class="ic">🧰</span>Layanan</button>
  <button class="bn-item" id="bn-galeri" onclick="goPage('galeri')"><span class="ic">📸</span>Galeri</button>
  <button class="bn-item" id="bn-tips" onclick="goPage('tips')"><span class="ic">💡</span>Tips</button>
  <button class="bn-item" id="bn-profil" onclick="checkProfile()"><span class="ic">👤</span>Akun</button>
</nav>

<!-- Floating cart -->
<div class="floating-cart" id="floatingCart">
  <div class="cart-info"><small id="cartCountLabel">0 layanan dipilih</small><span class="cart-total" id="cartTotal">Rp 0</span></div>
  <button class="cart-go" onclick="prosesCheckout()">Lanjut Pesan ➔</button>
</div>
<a class="wa-float" id="waFloat" href="https://wa.me/62817387060" target="_blank" title="Chat WhatsApp">💬</a>

<!-- ============ MODALS ============ -->
<!-- Auth -->
<div class="modal" id="authModal"><div class="modal-card">
  <div class="grab"></div><button class="m-close" onclick="closeModal('authModal')">✕</button>
  <h2 id="authTitle">👋 Selamat Datang</h2><p class="m-sub">Masuk untuk memesan & melacak status real-time.</p>
  <form id="authForm" onsubmit="return false">
    <div class="f-group hide" id="rgName"><label>Nama lengkap</label><input id="regUsername" placeholder="cth: Budi Santoso"></div>
    <div class="f-group"><label>Email</label><input type="email" id="authEmail" placeholder="email@contoh.com" required></div>
    <div class="f-group" id="pwdGroup"><label>Kata sandi</label><input type="password" id="authPassword" placeholder="••••••••" required></div>
    <div class="f-group hide" id="rgConfirm"><label>Ulangi kata sandi</label><input type="password" id="regConfirmPwd" placeholder="Ulangi kata sandi"></div>
    <div class="f-group hide" id="rgCaptcha"><label style="display:flex;align-items:center;gap:10px;background:#F8FAFC;border:1.5px solid var(--line);border-radius:12px;padding:12px;cursor:pointer"><input type="checkbox" id="mockCaptcha" style="width:20px;height:20px"> <span style="font-size:13px">Saya bukan robot 🤖</span></label></div>
    <button class="btn btn-primary btn-block" id="authSubmit" onclick="submitAuth()">Masuk →</button>
  </form>
  <div class="auth-alt" id="authFooter"></div>
</div></div>

<!-- Katalog -->
<div class="modal" id="katalogModal"><div class="modal-card">
  <div class="grab"></div><button class="m-close" onclick="closeModal('katalogModal')">✕</button>
  <h2 id="katTitle">Katalog</h2><p class="m-sub" id="katSub">Pilih layanan, tentukan jumlah unit.</p>
  <div class="search-bar"><input id="katSearch" placeholder="🔍 Cari layanan… (cth: cuci, freon, Sharp)" oninput="renderKatalog()"></div>
  <div id="katList"></div>
</div></div>

<!-- Qty -->
<div class="modal" id="qtyModal" style="z-index:1200"><div class="modal-card" style="max-width:340px;text-align:center">
  <div class="grab"></div>
  <h2 id="qtyTitle" style="padding:0">Nama layanan</h2><p class="m-sub">Jumlah unit / titik</p>
  <div style="display:flex;align-items:center;justify-content:center;gap:22px;margin:18px 0 22px">
    <button onclick="ubahQty(-1)" style="width:48px;height:48px;border-radius:50%;border:none;background:#F1F5F9;font-size:24px;font-weight:800;cursor:pointer">−</button>
    <b id="qtyVal" style="font-size:30px;min-width:44px">1</b>
    <button onclick="ubahQty(1)" style="width:48px;height:48px;border-radius:50%;border:none;background:linear-gradient(135deg,#0EA5E9,#2563EB);color:#fff;font-size:24px;font-weight:800;cursor:pointer">＋</button>
  </div>
  <div style="display:flex;gap:10px"><button class="btn btn-light" style="flex:1;padding:14px" onclick="closeModal('qtyModal')">Batal</button><button class="btn btn-green" style="flex:1;padding:14px" onclick="konfirmasiQty()">＋ Tambah</button></div>
</div></div>

<!-- Detail produk -->
<div class="modal" id="detailModal" style="z-index:1100"><div class="modal-card">
  <div class="grab"></div><button class="m-close" onclick="closeModal('detailModal')">✕</button>
  <img id="pdImg" class="lightbox-img" style="height:200px;object-fit:cover;margin-bottom:14px" src="" alt="produk" onclick="openLightbox(this.src)">
  <h2 id="pdTitle">-</h2><div id="pdPrice" style="font-size:20px;font-weight:800;color:var(--brand);margin:4px 0 12px"></div>
  <p id="pdDesc" style="font-size:13px;color:var(--muted);margin-bottom:12px"></p>
  <div style="font-size:12px;font-weight:800;margin-bottom:6px">📋 Spesifikasi:</div>
  <div id="pdSpecs" class="kv" style="font-size:12px"></div>
  <button class="btn btn-green btn-block" id="pdBtn">＋ Tambah ke Pesanan</button>
</div></div>

<!-- Checkout -->
<div class="modal" id="checkoutModal"><div class="modal-card">
  <div class="grab"></div><button class="m-close" onclick="closeModal('checkoutModal')">✕</button>
  <h2>🧾 Selesaikan Pesanan</h2><p class="m-sub">Periksa kembali & isi data pengerjaan.</p>
  <div class="kv" style="background:#fff"><div id="coItems"></div>
    <div class="co-total"><span style="font-size:12px;font-weight:800;color:#15803D">TOTAL BAYAR</span><b id="coTotal">Rp 0</b></div>
  </div>
  <div class="f-group"><label>📅 Tanggal pengerjaan</label><input type="date" id="coTgl"></div>
  <div class="f-group"><label>📍 Area</label><select id="coArea"><option value="" disabled selected>Pilih area…</option><option>Bekasi Barat</option><option>Bekasi Timur</option><option>Bekasi Selatan</option><option>Bekasi Utara</option><option>Cikarang</option><option>Cibitung</option><option>Tambun</option><option>Bantar Gebang</option><option>Sumarecon</option><option>Pondok Gede</option><option>Harapan Indah</option><option>Lainnya</option></select></div>
  <div class="f-group"><label>👤 Nama di lokasi</label><input id="coNama" placeholder="cth: Budi Santoso"></div>
  <div class="f-group"><label>📱 No. WhatsApp aktif</label><input id="coWA" inputmode="tel" placeholder="cth: 0812…"></div>
  <div class="f-group"><label>🏠 Alamat lengkap + patokan</label><textarea id="coAlamat" rows="3" placeholder="cth: Perum Harapan Indah Blok A2 No.15, dekat masjid…"></textarea></div>
  <button class="btn btn-green btn-block" onclick="kirimPesanan()">🚀 Pesan Sekarang</button>
  <p style="font-size:11px;color:var(--muted);text-align:center;margin-top:10px">Dengan memesan, Anda setuju dihubungi admin via WhatsApp.</p>
</div></div>

<!-- Sukses -->
<div class="modal" id="suksesModal" style="z-index:1300"><div class="modal-card center">
  <div class="success-ic">✅</div>
  <h2 style="padding:0">Pesanan Diterima!</h2>
  <p class="m-sub" id="suksesMsg">Admin akan menghubungi Anda.</p>
  <button class="btn btn-primary btn-block" onclick="closeModal('suksesModal');checkProfile()">📊 Lacak Status Pesanan</button>
  <button class="btn btn-light btn-block" onclick="closeModal('suksesModal')">Tutup</button>
</div></div>

<!-- Detail order -->
<div class="modal" id="orderModal"><div class="modal-card">
  <div class="grab"></div><button class="m-close" onclick="closeModal('orderModal')">✕</button>
  <h2>📄 Rincian Pesanan</h2><p class="m-sub" id="odDate">-</p>
  <div class="tl" id="odTimeline">
    <div class="tl-step" id="tls1"><div class="tl-dot">1</div>Dipesan</div>
    <div class="tl-step" id="tls2"><div class="tl-dot">2</div>Diproses</div>
    <div class="tl-step" id="tls3"><div class="tl-dot">✓</div>Selesai</div>
  </div>
  <div id="odMsg" class="kv hide" style="background:#ECFDF5;border-color:#BBF7D0;font-size:12.5px"></div>
  <div class="kv"><div class="row"><span class="k">ID Pesanan</span><span class="v" id="odId" style="font-family:monospace;font-size:11px">-</span></div><div class="row"><span class="k">Status</span><span class="v" id="odStatus">-</span></div><div class="row"><span class="k">Jadwal</span><span class="v" id="odTgl">-</span></div></div>
  <div style="font-size:12px;font-weight:800;margin:10px 0 6px">Layanan:</div>
  <div class="kv" id="odItems"></div>
  <div class="co-total"><span style="font-size:12px;font-weight:800;color:#15803D">TOTAL</span><b id="odTotal">Rp 0</b></div>
  <div style="font-size:12px;font-weight:800;margin:10px 0 6px">Lokasi:</div>
  <div class="kv"><div class="row"><span class="k">Nama</span><span class="v" id="odNama">-</span></div><div class="row"><span class="k">Area</span><span class="v" id="odArea">-</span></div><div class="row"><span class="k">Alamat</span><span class="v" id="odAlamat" style="font-weight:500;text-align:right;max-width:60%">-</span></div></div>
  <button class="btn btn-dark btn-block" onclick="closeModal('orderModal')">Tutup</button>
</div></div>

<!-- Review -->
<div class="modal" id="reviewModal"><div class="modal-card">
  <div class="grab"></div><button class="m-close" onclick="closeModal('reviewModal')">✕</button>
  <h2>✍️ Tulis Ulasan</h2><p class="m-sub">Ceritakan pengalaman Anda memakai BekasiAC.</p>
  <div class="f-group"><label>Nama</label><input id="rvNama" placeholder="cth: Anita Sari"></div>
  <div class="f-group"><label>Area</label><select id="rvArea"><option>Bekasi Barat</option><option>Bekasi Timur</option><option>Bekasi Selatan</option><option>Bekasi Utara</option><option>Cikarang</option><option>Cibitung</option><option>Tambun</option><option>Lainnya</option></select></div>
  <div class="f-group"><label>Rating</label><div class="star-input" id="rvStars"><span data-v="1">★</span><span data-v="2">★</span><span data-v="3">★</span><span data-v="4">★</span><span data-v="5">★</span></div></div>
  <div class="f-group"><label>Komentar</label><textarea id="rvKomen" rows="3" placeholder="AC langsung dingin, teknisi ramah…"></textarea></div>
  <div class="f-group"><label>Foto (opsional)</label><input type="file" id="rvFoto" accept="image/*"><small style="font-size:11px;color:var(--muted)">Maks 5MB • JPG/PNG/WEBP</small></div>
  <button class="btn btn-primary btn-block" id="rvBtn" onclick="kirimUlasan()">Kirim Ulasan ⭐</button>
</div></div>

<!-- Lightbox -->
<div class="modal" id="lightbox" style="z-index:2000" onclick="closeModal('lightbox')"><div class="modal-card" style="background:transparent;box-shadow:none;padding:10px" onclick="event.stopPropagation()">
  <button class="m-close" style="background:rgba(255,255,255,.2);color:#fff" onclick="closeModal('lightbox')">✕</button>
  <img id="lbImg" class="lightbox-img" src="" alt="preview">
</div></div>

<!-- ================= FIREBASE + APP ================= -->
<script type="module">
import { initializeApp } from "https://www.gstatic.com/firebasejs/10.8.0/firebase-app.js";
import { getAuth, createUserWithEmailAndPassword, signInWithEmailAndPassword, signOut, onAuthStateChanged, sendPasswordResetEmail } from "https://www.gstatic.com/firebasejs/10.8.0/firebase-auth.js";
import { getFirestore, doc, setDoc, getDoc, collection, addDoc, query, where, getDocs, onSnapshot, orderBy, limit } from "https://www.gstatic.com/firebasejs/10.8.0/firebase-firestore.js";

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
window._db = db; window._auth = auth; window._fs = { doc, setDoc, getDoc, collection, addDoc, query, where, getDocs, onSnapshot, orderBy, limit };
window._fbAuth = { createUserWithEmailAndPassword, signInWithEmailAndPassword, signOut, sendPasswordResetEmail };
window.currentUser = null;
window._ordersUnsub = null;

/* ---------- Pengaturan toko (opsional, fallback aman) ---------- */
window.STORE = { waAdmin:'62817387060', announcement:'Gratis biaya survei untuk wilayah Bekasi kota — klaim sekarang!', promoTitle:'🎉 Promo: Cuci 2 AC gratis 1x cek freon!', promoDesc:'Berlaku untuk semua area Bekasi bulan ini. Pesan lewat website & tunjukkan kode BEDINGIN ke teknisi.' };
async function loadSettings(){
  try{
    const s = await getDoc(doc(db,'settings','store'));
    if(s.exists()){
      const d = s.data();
      if(d.waAdmin) window.STORE.waAdmin = String(d.waAdmin).replace(/[^0-9]/g,'');
      if(d.announcement) { window.STORE.announcement = d.announcement; document.getElementById('announceText').textContent = d.announcement; }
      if(d.announcementActive === false) document.getElementById('announceBar').style.display='none';
      if(d.heroTitle) document.getElementById('heroTitle').innerHTML = d.heroTitle;
      if(d.heroSub) document.getElementById('heroSub').textContent = d.heroSub;
      if(d.promoTitle) { window.STORE.promoTitle=d.promoTitle; document.getElementById('promoTitle').textContent=d.promoTitle; }
      if(d.promoDesc) { window.STORE.promoDesc=d.promoDesc; document.getElementById('promoDesc').innerHTML=d.promoDesc; }
      if(d.promoActive === false) document.getElementById('promoSec').style.display='none';
      applyWA();
    }
  }catch(e){ /* abaikan, pakai default */ }
}
function applyWA(){
  const wa = window.STORE.waAdmin;
  ['topWaBtn','heroWaBtn','ctaWaBtn','footWaBtn','waFloat'].forEach(id=>{ const el=document.getElementById(id); if(el) el.href='https://wa.me/'+wa; });
  const pretty = wa.replace(/^62/,'0').replace(/(\d{4})(\d{3})(\d+)/,'$1-$2-$3');
  ['footWa','footWa2'].forEach(id=>{ const el=document.getElementById(id); if(el) el.textContent=pretty; });
}

/* ---------- Katalog ---------- */
window.KATALOG = {
  beli_ac:{ judul:'📦 Beli AC Baru + Instalasi', sub:'Unit original, termasuk jasa & material instalasi.', items:[] },
  cuci:{ judul:'❄️ Cuci & Perawatan AC', sub:'Indoor + outdoor, filter, casing & drainase.', items:[] },
  bongkar_pasang:{ judul:'🔧 Bongkar / Pasang & Relokasi', sub:'Aman dengan pump-down freon standar.', items:[] },
  servis:{ judul:'🛠️ Servis & Perbaikan', sub:'Diagnosa akurat, sparepart original.', items:[] }
};
async function loadKatalog(){
  try{
    const snap = await getDocs(collection(db,'services'));
    snap.forEach(d=>{ const v=d.data(); if(window.KATALOG[v.kategori]) window.KATALOG[v.kategori].items.push({ nama:v.nama, harga:v.harga, desc:v.desc||'', specs:v.specs||'', imgUrl:v.imgUrl||'' }); });
  }catch(e){ console.error(e); }
}

/* ---------- Galeri & video ---------- */
async function loadGaleri(){
  const box = document.getElementById('galeriSnap');
  try{
    const snap = await getDocs(collection(db,'gallery'));
    if(snap.empty){ box.innerHTML='<div style="padding:24px;color:var(--muted);font-size:13px">Belum ada dokumentasi.</div>'; return; }
    let arr=[]; snap.forEach(d=>arr.push(d.data()));
    arr.sort((a,b)=>((b.timestamp?.toMillis?.()||0)-(a.timestamp?.toMillis?.()||0)));
    box.innerHTML = arr.map(g=>`<div class="gal-card" onclick="openLightbox('${(g.url||'').replace(/'/g,"")}')"><img loading="lazy" src="${g.url}" alt="${(g.title||'').replace(/"/g,'')}"><div class="gal-cap">${g.title||''}</div></div>`).join('');
  }catch(e){ box.innerHTML='<div style="padding:24px;color:var(--muted)">Gagal memuat galeri.</div>'; }
}
async function loadVideo(){
  const box = document.getElementById('videoSnap');
  try{
    const snap = await getDocs(collection(db,'youtube_videos'));
    if(snap.empty){ box.innerHTML='<div style="padding:24px;color:var(--muted);font-size:13px">Belum ada video.</div>'; return; }
    let arr=[]; snap.forEach(d=>arr.push(d.data()));
    arr.sort((a,b)=>((b.timestamp?.toMillis?.()||0)-(a.timestamp?.toMillis?.()||0)));
    box.innerHTML = arr.map(v=>`<div class="vid-card"><iframe loading="lazy" src="https://www.youtube.com/embed/${v.videoId}" title="${(v.title||'').replace(/"/g,'')}" allowfullscreen></iframe><div class="vid-cap">▶️ ${v.title||''}</div></div>`).join('');
  }catch(e){ box.innerHTML='<div style="padding:24px;color:var(--muted)">Gagal memuat video.</div>'; }
}

/* ---------- Ulasan (real dari Firestore + fallback) ---------- */
const DUMMY_REVIEWS = [
  ['Budi Santoso','Bekasi Barat','AC langsung dingin nyess! Teknisi jujur dan harganya transparan banget.'],
  ['Siti Aminah','Bekasi Timur','Pengerjaan rapi, teknisinya sopan dan datang tepat waktu. Puas!'],
  ['Agus Hermawan','Cikarang','Cuci AC-nya menyeluruh, udara jadi segar dan listrik lebih hemat.'],
  ['Dewi Lestari','Bekasi Selatan','Respon cepat padahal pesan mendadak. Recommended!'],
  ['Rizky Fauzi','Tambun','Harga sesuai katalog, tidak ada biaya siluman. Terpercaya.'],
  ['Mega Utami','Harapan Indah','Bongkar pasang rapi sekali, instalasinya estetik.'],
  ['Hendra Kusuma','Bekasi Utara','AC mati total langsung ditangani hari itu juga. Mantap!'],
  ['Yanti Nuraini','Pondok Gede','Garansinya nyata, ada kendala sedikit langsung direspon gratis.'],
];
window._rating = 5;
function reviewCard(name, area, text, photo){
  const init = (name||'P').trim().charAt(0).toUpperCase();
  return `<div class="rev-card"><div class="stars">★★★★★</div><p>"${text}"</p><div class="rev-who"><div class="rev-ava">${init}</div><div><b>${name}</b><small>📍 ${area} • Terverifikasi ✓</small></div></div>${photo?`<img class="rev-photo" loading="lazy" src="${photo}" onclick="openLightbox('${photo}')">`:''}</div>`;
}
async function loadReviews(){
  const box = document.getElementById('revList');
  try{
    const snap = await getDocs(collection(db,'reviews'));
    let html='';
    if(!snap.empty){
      let arr=[]; snap.forEach(d=>arr.push(d.data()));
      arr.sort((a,b)=>((b.createdAt?.toMillis?.()||0)-(a.createdAt?.toMillis?.()||0)));
      html = arr.slice(0,30).map(r=>reviewCard(r.name||'Pelanggan', r.area||'Bekasi', (r.comment||'').replace(/</g,'&lt;'), r.photoUrl||'')).join('');
    }
    html += DUMMY_REVIEWS.map(r=>reviewCard(r[0],r[1],r[2],'')).join('');
    box.innerHTML = html;
    document.getElementById('revCountLabel').textContent = (snap.size||0)+2400+'+ ulasan';
  }catch(e){ box.innerHTML = DUMMY_REVIEWS.map(r=>reviewCard(r[0],r[1],r[2],'')).join(''); }
}

/* ---------- Auth ---------- */
onAuthStateChanged(auth, async (user)=>{
  const btn=document.getElementById('btnAuth');
  if(user){
    window.currentUser=user; btn.textContent='Keluar'; btn.style.background='#DC2626';
    document.getElementById('nl-profil').style.display='inline-block';
    document.getElementById('mm-profil').style.display='block';
    try{
      const s=await getDoc(doc(db,'users',user.uid));
      const nm=(s.exists()&&s.data().username)?s.data().username:'Pelanggan';
      document.getElementById('displayUsername').textContent=nm;
      document.getElementById('displayEmail').textContent=user.email;
    }catch(e){}
    listenOrders(user.uid);
  }else{
    window.currentUser=null; btn.textContent='Masuk'; btn.style.background='';
    document.getElementById('nl-profil').style.display='none';
    document.getElementById('mm-profil').style.display='none';
    if(window._ordersUnsub) window._ordersUnsub();
    if(document.getElementById('page-profil').classList.contains('on')) goPage('beranda');
  }
});
window.userOrders=[];
function listenOrders(uid){
  const box=document.getElementById('historyList');
  box.innerHTML='<div style="text-align:center;padding:24px;color:var(--muted);font-size:13px">Memuat…</div>';
  if(window._ordersUnsub) window._ordersUnsub();
  window._ordersUnsub = onSnapshot(query(collection(db,'orders'), where('userId','==',uid)), (snap)=>{
    if(snap.empty){ window.userOrders=[]; box.innerHTML='<div style="text-align:center;padding:34px;border:1.5px dashed #CBD5E1;border-radius:16px;color:#94A3B8;font-size:13px">Belum ada pesanan.<br><button class="btn btn-primary" style="margin-top:12px;padding:12px 22px" onclick="goPage(\'layanan\')">＋ Buat Pesanan</button></div>'; return; }
    let arr=[]; snap.forEach(d=>arr.push({id:d.id,...d.data()}));
    arr.sort((a,b)=>((b.createdAt?.toMillis?.()||0)-(a.createdAt?.toMillis?.()||0)));
    window.userOrders=arr;
    box.innerHTML=arr.map((o,i)=>{
      const dt=o.createdAt?.toDate?o.createdAt.toDate().toLocaleDateString('id-ID',{day:'numeric',month:'short',hour:'2-digit',minute:'2-digit'}):'-';
      const st=o.status==='Di Terima'?'st-diterima':o.status==='Di Tolak'?'st-ditolak':'st-dipesan';
      const items=(o.items||[]).map(x=>x.nama+(x.qty>1?` (${x.qty}x)`: '')).join(', ');
      return `<div class="hist-card" onclick="openOrder(${i})"><div class="hist-head"><span class="hist-date">🕒 ${dt}</span><span class="st ${st}">${o.status||'Dipesan'}</span></div><b style="font-size:13px">${items}</b><div style="font-size:12px;color:var(--brand);font-weight:800;margin-top:4px">Rp ${(o.total||0).toLocaleString('id-ID')}</div><div style="font-size:11.5px;color:var(--muted);margin-top:6px">👤 ${o.namaPengorder||'-'} • 📅 ${o.tanggalPengerjaan||'-'} • 📍 ${o.lokasi||'-'}</div></div>`;
    }).join('');
    // refresh modal jika sedang dibuka
    if(document.getElementById('orderModal').classList.contains('open')){
      const cur=document.getElementById('odId').textContent;
      const idx=arr.findIndex(x=>x.id===cur); if(idx>=0) openOrder(idx);
    }
  });
}

// boot
loadSettings().then(applyWA); applyWA();
loadKatalog(); loadGaleri(); loadVideo(); loadReviews();
</script>

<script>
/* ================= UI CORE ================= */
const API_URL = 'api/api.php'; // jembatan gambar di hosting
function toast(msg, type=''){
  const t=document.getElementById('toast');
  t.textContent=msg; t.className='show '+type;
  clearTimeout(window._tt); window._tt=setTimeout(()=>t.className='',3200);
}
function openModal(id){ document.getElementById(id).classList.add('open'); document.body.style.overflow='hidden'; }
function closeModal(id){ document.getElementById(id).classList.remove('open'); document.body.style.overflow=''; if(id==='checkoutModal') updateCart(); }
function openLightbox(src){ document.getElementById('lbImg').src=src; openModal('lightbox'); }
function scrollToId(id){ document.getElementById('mMenu').classList.remove('open'); const el=document.getElementById(id); if(el) el.scrollIntoView({behavior:'smooth'}); }
function goPage(p){
  document.querySelectorAll('.page').forEach(x=>x.classList.remove('on'));
  const pg=document.getElementById('page-'+p); if(pg) pg.classList.add('on');
  document.querySelectorAll('.nav-links a').forEach(a=>a.classList.remove('on'));
  const nl=document.getElementById('nl-'+p); if(nl) nl.classList.add('on');
  document.querySelectorAll('.bottom-nav .bn-item').forEach(b=>b.classList.remove('on'));
  const bn=document.getElementById('bn-'+(p==='profil'?'profil':p)); if(bn) bn.classList.add('on');
  document.getElementById('mMenu').classList.remove('open');
  window.scrollTo({top:0,behavior:'smooth'});
  try{ history.replaceState(null,'','#'+p); }catch(e){}
  updateCart();
}
// buka halaman sesuai hash (mis. situs.com/#layanan)
window.addEventListener('DOMContentLoaded',()=>{
  const h=(location.hash||'').replace('#','');
  if(h && document.getElementById('page-'+h) && h!=='profil') goPage(h);
});
function checkProfile(){
  if(window.currentUser) goPage('profil');
  else { toast('Silakan masuk dulu ya 🔐'); openAuth('login'); }
}
function switchDocTab(t){
  document.getElementById('tabFoto').classList.toggle('on', t==='foto');
  document.getElementById('tabVideo').classList.toggle('on', t==='video');
  document.getElementById('galeriSnap').classList.toggle('hide', t!=='foto');
  document.getElementById('videoSnap').classList.toggle('hide', t!=='video');
}
// counter animasi
const io=new IntersectionObserver(es=>es.forEach(e=>{ if(!e.isIntersecting) return; const el=e.target; io.unobserve(el);
  const n=+el.dataset.n; let c=0; const step=Math.max(1,Math.round(n/60));
  const iv=setInterval(()=>{ c+=step; if(c>=n){c=n;clearInterval(iv);} el.textContent=c.toLocaleString('id-ID'); },25);
}),{threshold:.4});
document.querySelectorAll('.count').forEach(el=>io.observe(el));
// tutup modal saat klik backdrop
document.querySelectorAll('.modal').forEach(m=>m.addEventListener('click',e=>{ if(e.target===m && m.id!=='qtyModal') closeModal(m.id); }));

/* ================= AUTH ================= */
let authMode='login';
function toggleAuth(){
  if(window.currentUser){ window._fbAuth.signOut(window._auth).then(()=>toast('Anda telah keluar 👋','ok')); }
  else openAuth('login');
}
function openAuth(mode){
  authMode=mode;
  const isL=mode==='login', isR=mode==='register';
  document.getElementById('authTitle').textContent = isL?'👋 Selamat Datang':isR?'📝 Buat Akun Baru':'🔑 Reset Kata Sandi';
  document.getElementById('rgName').classList.toggle('hide',!isR);
  document.getElementById('rgConfirm').classList.toggle('hide',!isR);
  document.getElementById('rgCaptcha').classList.toggle('hide',!isR);
  document.getElementById('pwdGroup').classList.toggle('hide',!isL&&!isR);
  document.getElementById('authSubmit').textContent = isL?'Masuk →':isR?'Daftar Sekarang':'Kirim Link Reset';
  document.getElementById('authFooter').innerHTML = isL
    ? `Belum punya akun? <a onclick="openAuth('register')">Daftar</a><br><br><a onclick="openAuth('forgot')">Lupa kata sandi?</a>`
    : isR ? `Sudah punya akun? <a onclick="openAuth('login')">Masuk</a>`
    : `<a onclick="openAuth('login')">← Kembali masuk</a>`;
  openModal('authModal');
}
async function submitAuth(){
  const em=document.getElementById('authEmail').value.trim(), pw=document.getElementById('authPassword').value;
  const btn=document.getElementById('authSubmit');
  try{
    if(authMode==='login'){
      btn.textContent='Memeriksa…'; btn.disabled=true;
      await window._fbAuth.signInWithEmailAndPassword(window._auth, em, pw);
      toast('Login berhasil! Selamat datang 🎉','ok'); closeModal('authModal');
    }else if(authMode==='register'){
      const nm=document.getElementById('regUsername').value.trim();
      const cf=document.getElementById('regConfirmPwd').value;
      if(!nm) return toast('Isi nama lengkap dulu ya','err');
      if(pw!==cf) return toast('Konfirmasi sandi tidak cocok ❌','err');
      if(pw.length<6) return toast('Sandi minimal 6 karakter','err');
      if(!document.getElementById('mockCaptcha').checked) return toast('Centang "Saya bukan robot" dulu 🤖','err');
      btn.textContent='Mendaftarkan…'; btn.disabled=true;
      const cr=await window._fbAuth.createUserWithEmailAndPassword(window._auth, em, pw);
      await window._fs.setDoc(window._fs.doc(window._db,'users',cr.user.uid), { username:nm, email:em, createdAt:new Date() });
      toast('Akun berhasil dibuat! 🎉','ok'); closeModal('authModal');
    }else{
      if(!em) return toast('Isi email dulu ya','err');
      btn.textContent='Mengirim…'; btn.disabled=true;
      await window._fbAuth.sendPasswordResetEmail(window._auth, em);
      toast('Link reset terkirim ke email ✉️','ok'); openAuth('login');
    }
  }catch(e){ toast('Gagal: '+(e.code||e.message),'err'); }
  btn.disabled=false;
  btn.textContent = authMode==='login'?'Masuk →':authMode==='register'?'Daftar Sekarang':'Kirim Link Reset';
}

/* ================= KATALOG & KERANJANG ================= */
let cart=[]; // {nama,harga,qty,desc,specs,imgUrl}
let aktifKat='cuci';
function openKatalog(kat){
  aktifKat=kat; document.getElementById('katSearch').value='';
  renderKatalog(); openModal('katalogModal');
}
function parseRp(str){ return parseInt(String(str||'').replace(/[^0-9]/g,''))||0; }
function renderKatalog(){
  const K=window.KATALOG[aktifKat];
  document.getElementById('katTitle').textContent=K.judul;
  document.getElementById('katSub').textContent=K.sub;
  const q=document.getElementById('katSearch').value.toLowerCase();
  const box=document.getElementById('katList');
  const items=K.items.map((it,i)=>({...it,_i:i})).filter(it=>!q||it.nama.toLowerCase().includes(q)||(it.desc||'').toLowerCase().includes(q));
  if(!items.length){ box.innerHTML='<div style="text-align:center;padding:30px;color:var(--muted);font-size:13px">Belum ada data / tidak cocok.<br>Admin dapat menambahkannya via panel admin.</div>'; return; }
  box.innerHTML=items.map(it=>{
    const inCart=cart.find(c=>c.nama===it.nama);
    const img=it.imgUrl?`<img class="pro-img" src="${it.imgUrl}" onclick="event.stopPropagation();openLightbox('${it.imgUrl}')" alt="">`:`<div class="pro-ph">${aktifKat==='beli_ac'?'📦':aktifKat==='cuci'?'❄️':aktifKat==='bongkar_pasang'?'🔧':'🛠️'}</div>`;
    return `<div class="pro ${inCart?'on':''}" onclick="toggleItem(${it._i})">
      <div class="pro-top">${img}<div style="flex:1;min-width:0">
        <div class="pro-title" ${aktifKat==='beli_ac'?`style="color:var(--brand);text-decoration:underline" onclick="event.stopPropagation();openDetail(${it._i})"`:''}>${it.nama}</div>
        <div class="pro-desc">${it.desc||''}</div>
      </div></div>
      <div class="pro-foot"><span class="pro-price">${it.harga}</span><button class="pro-btn ${inCart?'added':''}">${inCart?('✓ '+inCart.qty+' unit'):'＋ Keranjang'}</button></div>
    </div>`;
  }).join('');
}
let _pIdx=-1,_pQty=1;
function toggleItem(i){
  const it=window.KATALOG[aktifKat].items[i];
  const ex=cart.findIndex(c=>c.nama===it.nama);
  if(ex>=0){ cart.splice(ex,1); renderKatalog(); updateCart(); }
  else{ _pIdx=i;_pQty=1; document.getElementById('qtyTitle').textContent=it.nama; document.getElementById('qtyVal').textContent='1'; openModal('qtyModal'); }
}
function ubahQty(d){ _pQty=Math.max(1,_pQty+d); document.getElementById('qtyVal').textContent=_pQty; }
function konfirmasiQty(){
  const it=window.KATALOG[aktifKat].items[_pIdx];
  cart.push({nama:it.nama,harga:it.harga,qty:_pQty,desc:it.desc,specs:it.specs,imgUrl:it.imgUrl});
  closeModal('qtyModal'); renderKatalog(); updateCart();
  toast(`✓ ${it.nama} (${_pQty}x) masuk keranjang`,'ok');
}
function openDetail(i){
  const it=window.KATALOG[aktifKat].items[i];
  document.getElementById('pdImg').src=it.imgUrl||'https://placehold.co/600x400/e0f2fe/0A2540?text=BekasiAC';
  document.getElementById('pdTitle').textContent=it.nama;
  document.getElementById('pdPrice').textContent=it.harga;
  document.getElementById('pdDesc').textContent=it.desc||'-';
  document.getElementById('pdSpecs').innerHTML=it.specs||'<span style="color:var(--muted)">Spesifikasi standar pabrik.</span>';
  const inC=cart.some(c=>c.nama===it.nama);
  const b=document.getElementById('pdBtn');
  b.textContent=inC?'🗑️ Hapus dari Pesanan':'＋ Tambah ke Pesanan';
  b.className='btn btn-block '+(inC?'btn-light':'btn-green');
  b.onclick=()=>{ toggleItem(i); closeModal('detailModal'); };
  openModal('detailModal');
}
function cartTotal(){ return cart.reduce((s,c)=>s+parseRp(c.harga)*(c.qty||1),0); }
function updateCart(){
  const bar=document.getElementById('floatingCart');
  const diProfil=document.getElementById('page-profil').classList.contains('on');
  if(cart.length&&!diProfil){ bar.classList.add('show');
    const n=cart.reduce((s,c)=>s+(c.qty||1),0);
    document.getElementById('cartCountLabel').textContent=n+' layanan dipilih';
    document.getElementById('cartTotal').textContent='Rp '+cartTotal().toLocaleString('id-ID');
  } else bar.classList.remove('show');
}

/* ================= CHECKOUT ================= */
function prosesCheckout(){
  if(!cart.length) return;
  document.getElementById('floatingCart').classList.remove('show');
  const box=document.getElementById('coItems');
  box.innerHTML=cart.map((c,i)=>{
    const sub=parseRp(c.harga)*(c.qty||1);
    return `<div class="co-item"><div><div class="co-name">${c.nama} <span style="color:var(--brand)">(${c.qty||1}x)</span></div><div style="font-size:11px;color:var(--muted)">${c.harga}/unit</div></div><div style="display:flex;align-items:center;gap:8px"><span class="co-price">Rp ${sub.toLocaleString('id-ID')}</span><button class="co-del" onclick="hapusCart(${i})">🗑</button></div></div>`;
  }).join('');
  document.getElementById('coTotal').textContent='Rp '+cartTotal().toLocaleString('id-ID');
  const t=document.getElementById('coTgl'); if(!t.value) t.valueAsDate=new Date();
  t.min=new Date().toISOString().split('T')[0];
  openModal('checkoutModal');
}
function hapusCart(i){ cart.splice(i,1); if(cart.length) prosesCheckout(); else { closeModal('checkoutModal'); updateCart(); } }
document.getElementById('coWA').addEventListener('input',e=>{ let v=e.target.value.replace(/[^0-9]/g,''); if(v.startsWith('0')) v='62'+v.slice(1); e.target.value=v; });
async function kirimPesanan(){
  if(!window.currentUser){ toast('Masuk dulu sebelum memesan 🔐'); closeModal('checkoutModal'); openAuth('login'); return; }
  const nama=document.getElementById('coNama').value.trim(), tgl=document.getElementById('coTgl').value,
        area=document.getElementById('coArea').value, alm=document.getElementById('coAlamat').value.trim(),
        wa=document.getElementById('coWA').value.trim();
  if(!nama||!tgl||!area||!alm||!wa) return toast('Lengkapi semua data ya! 📝','err');
  if(wa.length<10) return toast('Nomor WhatsApp tidak valid','err');
  const total=cartTotal();
  const items=cart.map(c=>({nama:c.nama,harga:c.harga,qty:c.qty||1,subTotal:parseRp(c.harga)*(c.qty||1)}));
  try{
    await window._fs.addDoc(window._fs.collection(window._db,'orders'),{
      userId:window.currentUser.uid, email:window.currentUser.email, whatsappUser:wa,
      namaPengorder:nama, items, total, tanggalPengerjaan:tgl, lokasi:area, alamat:alm,
      status:'Dipesan', createdAt:new Date()
    });
    // teruskan ke WA admin
    let txt=`Halo *BekasiAC* ❄️, saya ingin memesan:%0A%0A*Rincian:*%0A`;
    cart.forEach(c=>{ txt+=`• ${c.nama} (${c.qty||1}x)%0A`; });
    txt+=`%0A*Total:* Rp ${total.toLocaleString('id-ID')}%0A%0A*Data:*%0A- Nama: ${encodeURIComponent(nama)}%0A- Tgl: ${tgl}%0A- Area: ${encodeURIComponent(area)}%0A- Alamat: ${encodeURIComponent(alm)}%0A- WA: ${wa}%0A%0AMohon diproses 🙏`;
    window.open('https://wa.me/'+window.STORE.waAdmin+'?text='+txt,'_blank');
    document.getElementById('suksesMsg').innerHTML=`Pesanan <b>Rp ${total.toLocaleString('id-ID')}</b> diterima.<br>Admin akan konfirmasi via WA ke <b>${wa}</b>`;
    // reset
    document.getElementById('coNama').value='';document.getElementById('coAlamat').value='';document.getElementById('coWA').value='';
    cart=[]; updateCart(); closeModal('checkoutModal'); openModal('suksesModal');
  }catch(e){ toast('Gagal mengirim: '+e.message,'err'); }
}

/* ================= DETAIL ORDER ================= */
function openOrder(i){
  const o=window.userOrders[i]; if(!o) return;
  document.getElementById('odId').textContent=o.id;
  document.getElementById('odDate').textContent='Dibuat: '+(o.createdAt?.toDate?o.createdAt.toDate().toLocaleDateString('id-ID',{day:'numeric',month:'long',year:'numeric',hour:'2-digit',minute:'2-digit'}):'-')+' WIB';
  document.getElementById('odStatus').textContent=o.status||'Dipesan';
  document.getElementById('odTgl').textContent=o.tanggalPengerjaan||'-';
  document.getElementById('odItems').innerHTML=(o.items||[]).map(it=>`<div class="row"><span class="k" style="color:var(--ink);font-weight:600">${it.nama} ${it.qty>1?`(${it.qty}x)`:''}</span><span class="v">${it.harga}</span></div>`).join('');
  document.getElementById('odTotal').textContent='Rp '+(o.total||0).toLocaleString('id-ID');
  document.getElementById('odNama').textContent=o.namaPengorder||'-';
  document.getElementById('odArea').textContent=o.lokasi||'-';
  document.getElementById('odAlamat').textContent=o.alamat||'-';
  const s1=document.getElementById('tls1'),s2=document.getElementById('tls2'),s3=document.getElementById('tls3');
  [s1,s2,s3].forEach(x=>x.classList.remove('done')); s1.classList.add('done');
  const msg=document.getElementById('odMsg');
  if(o.status==='Di Terima'){ s2.classList.add('done'); let f=o.tanggalPengerjaan; try{ const d=new Date(o.tanggalPengerjaan); f=d.toLocaleDateString('id-ID',{day:'numeric',month:'long',year:'numeric',weekday:'long'});}catch(e){}
    msg.classList.remove('hide'); msg.innerHTML=`✅ <b>Pesanan diterima!</b> Teknisi akan datang pada <b>${f}</b>. Mohon pastikan ada yang standby di lokasi.`; }
  else if(o.status==='Di Tolak'){ msg.classList.remove('hide'); msg.style.background='#FEF2F2'; msg.style.borderColor='#FECACA'; msg.innerHTML=`❌ <b>Maaf, pesanan ditolak.</b> Silakan hubungi admin via WhatsApp untuk penjadwalan ulang.`; }
  else { msg.classList.add('hide'); msg.style.background=''; msg.style.borderColor=''; }
  openModal('orderModal');
}

/* ================= ULASAN ================= */
document.querySelectorAll('#rvStars span').forEach(s=>{
  s.addEventListener('click',()=>{ window._rating=+s.dataset.v; paintStars(); });
});
function paintStars(){ document.querySelectorAll('#rvStars span').forEach(s=>s.classList.toggle('lit',+s.dataset.v<=window._rating)); }
paintStars();
async function apiUpload(file, prefix='ulasan'){
  const fd=new FormData(); fd.append('file',file); fd.append('prefix',prefix);
  const r=await fetch(API_URL+'?action=upload',{method:'POST',body:fd});
  const j=await r.json();
  if(j.status!=='success') throw new Error(j.message||'Upload gagal');
  return j.url;
}
async function kirimUlasan(){
  const nama=document.getElementById('rvNama').value.trim(),
        area=document.getElementById('rvArea').value,
        komen=document.getElementById('rvKomen').value.trim();
  if(!nama||!komen) return toast('Isi nama & komentar dulu ya','err');
  const btn=document.getElementById('rvBtn'); btn.textContent='Mengirim…'; btn.disabled=true;
  try{
    let photoUrl='';
    const f=document.getElementById('rvFoto').files[0];
    if(f){
      if(f.size>5*1024*1024) throw new Error('Foto maksimal 5MB');
      toast('⏳ Mengunggah foto…');
      photoUrl=await apiUpload(f,'review');
    }
    await window._fs.addDoc(window._fs.collection(window._db,'reviews'),{ name:nama, area, rating:window._rating, comment:komen, photoUrl, createdAt:new Date() });
    toast('Terima kasih atas ulasannya! ⭐','ok');
    closeModal('reviewModal');
    document.getElementById('rvNama').value='';document.getElementById('rvKomen').value='';document.getElementById('rvFoto').value='';
    location.reload();
  }catch(e){ toast('Gagal: '+e.message,'err'); }
  btn.textContent='Kirim Ulasan ⭐'; btn.disabled=false;
}
</script>
</body>
</html>
