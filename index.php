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

  <title>Pandawa-Digital - Super App PPOB</title>

  <link rel="manifest" href="manifest.json">
  <meta name="theme-color" content="#2563eb">
  <link rel="apple-touch-icon" href="icon-192.png">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

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
    :root {
      --primary: #2563eb;
      --primary-hover: #1d4ed8;
      --primary-light: #eff6ff;
      --accent: #0ea5e9;
      --bg: #f8fafc;
      --surface: #ffffff;
      --white: #ffffff;
      --success: #10b981;
      --warning: #f59e0b;
      --danger: #ef4444;
      --text-dark: #0f172a;
      --text-grey: #64748b;
      --text-light: #94a3b8;
      --border-color: #f1f5f9;
      --grad-main: linear-gradient(135deg, #1e3a8a 0%, #2563eb 55%, #3b82f6 100%);
      --grad-accent: linear-gradient(135deg, #0ea5e9 0%, #2563eb 100%);
      --shadow-sm: 0 2px 8px rgba(15, 23, 42, 0.04);
      --shadow-md: 0 8px 24px rgba(15, 23, 42, 0.06);
      --shadow-lg: 0 16px 36px rgba(15, 23, 42, 0.08);
      --shadow-xl: 0 20px 48px rgba(37, 99, 235, 0.14);
      --radius-sm: 14px;
      --radius-md: 20px;
      --radius-lg: 26px;
      --radius-xl: 32px;
      --font-main: 'Plus Jakarta Sans', 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
    }

    * {
      box-sizing: border-box;
      -webkit-tap-highlight-color: transparent;
    }

    body {
      margin: 0;
      font-family: var(--font-main);
      background: var(--bg);
      padding-bottom: 95px;
      color: var(--text-dark);
      min-height: 100vh;
      font-size: 13.5px;
      line-height: 1.5;
      -webkit-font-smoothing: antialiased;
    }

    ::selection {
      background: #dbeafe;
      color: #1e40af;
    }

    /* HEADER MODERN GLASS */
    .header {
      background: var(--grad-main);
      padding: 38px 20px 80px;
      border-radius: 0 0 38px 38px;
      position: relative;
      z-index: 1;
      box-shadow: 0 12px 30px rgba(37, 99, 235, 0.22);
      overflow: hidden;
    }

    .header::before {
      content: '';
      position: absolute;
      top: -40px;
      right: -40px;
      width: 180px;
      height: 180px;
      background: radial-gradient(circle, rgba(255, 255, 255, 0.15) 0%, transparent 70%);
      border-radius: 50%;
      pointer-events: none;
    }

    .header::after {
      content: '';
      position: absolute;
      bottom: 10px;
      left: -30px;
      width: 140px;
      height: 140px;
      background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
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

    /* SALDO BOX MODERN WALLET CARD */
    .saldo-box {
      margin: -60px 16px 22px;
      background: #ffffff;
      padding: 22px;
      border-radius: 26px;
      box-shadow: 0 18px 40px -10px rgba(37, 99, 235, 0.16), 0 4px 12px rgba(15, 23, 42, 0.03);
      position: relative;
      z-index: 10;
      border: 1px solid rgba(255, 255, 255, 0.9);
      display: flex;
      flex-direction: column;
      overflow: hidden;
      backdrop-filter: blur(20px);
    }

    .saldo-info {
      display: flex;
      justify-content: space-between;
      align-items: center;
      border-bottom: 1px dashed #f1f5f9;
      padding-bottom: 16px;
      margin-bottom: 6px;
    }

    .btn-topup {
      background: linear-gradient(135deg, #2563eb, #3b82f6);
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 14px;
      font-size: 13px;
      font-weight: 700;
      cursor: pointer;
      box-shadow: 0 6px 18px rgba(37, 99, 235, 0.28);
      transition: all 0.25s ease;
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .btn-topup:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 22px rgba(37, 99, 235, 0.38);
    }

    .btn-topup:active {
      transform: scale(0.96);
    }

    .action-grid {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 10px;
      margin-top: 16px;
      padding-top: 6px;
    }

    .action-item {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      gap: 8px;
      cursor: pointer;
      transition: all 0.25s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    .action-item:hover .action-icon {
      transform: translateY(-4px) scale(1.05);
      box-shadow: 0 12px 24px rgba(37, 99, 235, 0.18);
      border-color: #bfdbfe;
    }

    .action-item:active {
      transform: scale(0.95);
    }

    .action-icon {
      width: 50px;
      height: 50px;
      background: linear-gradient(145deg, #eff6ff, #dbeafe);
      color: var(--primary);
      border-radius: 18px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 20px;
      box-shadow: 0 6px 16px rgba(37, 99, 235, 0.08);
      border: 1.5px solid #ffffff;
      transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    .action-text {
      font-size: 11.5px;
      font-weight: 700;
      color: var(--text-dark);
      letter-spacing: -0.2px;
    }

    /* MENU UTAMA MODERN CARD */
    .menu-container {
      background: #ffffff;
      margin: 0 16px 22px;
      border-radius: 26px;
      padding: 8px 16px 22px;
      box-shadow: var(--shadow-md);
      border: 1px solid var(--border-color);
      position: relative;
      z-index: 2;
    }

    .cat-title {
      padding: 16px 6px 14px;
      font-weight: 800;
      font-size: 15px;
      color: var(--text-dark);
      display: flex;
      align-items: center;
      gap: 10px;
      letter-spacing: -0.3px;
    }

    .cat-title::before {
      content: '';
      display: block;
      width: 5px;
      height: 18px;
      background: linear-gradient(to bottom, #2563eb, #38bdf8);
      border-radius: 6px;
      box-shadow: 0 2px 6px rgba(37, 99, 235, 0.3);
    }

    .menu-grid {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 22px 10px;
      padding: 6px 4px;
    }

    .menu-item {
      text-align: center;
      font-size: 12px;
      cursor: pointer;
      color: var(--text-dark);
      font-weight: 700;
      letter-spacing: -0.2px;
      line-height: 1.35;
      transition: all 0.25s ease;
    }

    .menu-item:hover .icon-box {
      transform: translateY(-5px) scale(1.05);
      box-shadow: 0 14px 28px rgba(37, 99, 235, 0.15);
      border-color: #bfdbfe;
    }

    .menu-item:active {
      transform: scale(0.92);
      opacity: 0.85;
    }

    #menuDrawer {
      max-height: 0;
      opacity: 0;
      overflow: hidden;
      transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    }

    #menuDrawer.expanded {
      max-height: 800px;
      opacity: 1;
      margin-top: 16px;
    }

    #btnMoreContainer {
      text-align: center;
      margin-top: 16px;
      padding-top: 16px;
      border-top: 1px dashed #f1f5f9;
    }

    .icon-box {
      width: 58px;
      height: 58px;
      margin: 0 auto 10px;
      border-radius: 20px;
      display: flex;
      align-items: center;
      justify-content: center;
      background: linear-gradient(145deg, #ffffff, #f8fafc);
      box-shadow: 0 8px 20px rgba(15, 23, 42, 0.05), inset 0 2px 4px rgba(255, 255, 255, 0.9);
      border: 1.5px solid #f1f5f9;
      overflow: hidden;
      transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    .menu-item:active .icon-box {
      transform: scale(0.88) translateY(4px);
      box-shadow: 0 4px 10px rgba(37, 99, 235, 0.06);
    }

    .icon-box img {
      width: 65%;
      height: 65%;
      object-fit: contain;
      transition: transform 0.3s ease;
    }

    .menu-item:hover .icon-box img,
    .menu-item:hover .icon-box i {
      transform: scale(1.1);
    }

    /* RIWAYAT TRANSAKSI (List View Modern) */
    .history-container {
      padding: 0 16px;
      margin-bottom: 22px;
      max-height: 240px;
      overflow-y: auto;
    }

    .history-card {
      background: #ffffff;
      padding: 14px 16px;
      border-radius: 20px;
      margin-bottom: 12px;
      border: 1px solid #f1f5f9;
      cursor: pointer;
      transition: all 0.25s ease;
      display: flex;
      align-items: center;
      gap: 14px;
      box-shadow: 0 4px 14px rgba(15, 23, 42, 0.03);
    }

    .history-card:hover {
      transform: translateY(-3px);
      box-shadow: 0 10px 24px rgba(15, 23, 42, 0.07);
      border-color: #e2e8f0;
    }

    .history-card:active {
      background: #f8fafc;
      transform: scale(0.98);
    }

    .h-icon {
      width: 44px;
      height: 44px;
      border-radius: 14px;
      background: #eff6ff;
      color: var(--primary);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 18px;
      flex-shrink: 0;
      box-shadow: inset 0 0 0 1px rgba(37, 99, 235, 0.1);
    }

    .h-content {
      flex: 1;
    }

    .h-prod {
      font-weight: 800;
      font-size: 13.5px;
      color: var(--text-dark);
      margin-bottom: 4px;
      line-height: 1.3;
      letter-spacing: -0.3px;
    }

    .h-date {
      font-size: 11px;
      color: var(--text-grey);
      font-weight: 600;
      display: flex;
      align-items: center;
      gap: 6px;
    }

    .h-right {
      text-align: right;
    }

    .h-price {
      font-weight: 900;
      color: var(--text-dark);
      font-size: 14.5px;
      margin-bottom: 6px;
      letter-spacing: -0.3px;
    }

    .h-badge {
      font-size: 9.5px;
      padding: 5px 10px;
      border-radius: 100px;
      font-weight: 800;
      display: inline-block;
      letter-spacing: 0.4px;
      text-transform: uppercase;
    }

    .bg-BERHASIL {
      background: rgba(16, 185, 129, 0.12);
      color: #059669;
      border: 1px solid rgba(16, 185, 129, 0.2);
    }

    .bg-PENDING {
      background: rgba(245, 158, 11, 0.12);
      color: #d97706;
      border: 1px solid rgba(245, 158, 11, 0.2);
    }

    .bg-GAGAL {
      background: rgba(239, 68, 68, 0.12);
      color: #dc2626;
      border: 1px solid rgba(239, 68, 68, 0.2);
    }

    .loading-badge {
      position: absolute;
      top: 5px;
      right: 5px;
      font-size: 8px;
      color: #0088cc;
      display: block;
    }

    .fa-spin {
      animation: spin 1s infinite linear;
    }

    @keyframes spin {
      100% {
        transform: rotate(360deg);
      }
    }

    /* MODAL MODERN BOTTOM SHEET */
    .modal {
      display: none;
      position: fixed;
      bottom: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(15, 23, 42, 0.5);
      backdrop-filter: blur(8px);
      -webkit-backdrop-filter: blur(8px);
      align-items: flex-end;
      z-index: 11000;
    }

    .modal-content {
      background: #ffffff;
      width: 100%;
      height: auto;
      max-height: 94vh;
      padding: 28px 22px 24px;
      border-radius: 32px 32px 0 0 !important;
      display: flex;
      flex-direction: column;
      animation: slideUpSmooth 0.35s cubic-bezier(0.16, 1, 0.3, 1);
      box-sizing: border-box;
      position: relative;
      box-shadow: 0 -15px 45px rgba(15, 23, 42, 0.2);
    }

    .modal-content::before {
      content: '';
      position: absolute;
      top: 12px;
      left: 50%;
      transform: translateX(-50%);
      width: 48px;
      height: 5px;
      background: #e2e8f0;
      border-radius: 10px;
      z-index: 9999;
    }

    @keyframes slideUpSmooth {
      from {
        transform: translateY(100%);
      }
      to {
        transform: translateY(0);
      }
    }

    @keyframes slideUp {
      from {
        transform: translateY(100%);
      }
      to {
        transform: translateY(0);
      }
    }

    .input-group {
      position: relative;
      margin-bottom: 16px;
    }

    .input-group i {
      position: absolute;
      left: 16px;
      top: 18px;
      color: #94a3b8;
      font-size: 18px;
      transition: 0.3s;
      z-index: 5;
    }

    .form-input {
      width: 100%;
      padding: 14px 14px 14px 44px;
      border: 2px solid #e2e8f0;
      border-radius: 16px;
      font-size: 13.5px;
      outline: none;
      background: #f8fafc;
      box-sizing: border-box;
      transition: all 0.25s ease;
      color: var(--text-dark);
      font-weight: 600;
      font-family: inherit;
    }

    .form-input:focus {
      border-color: var(--primary);
      background: #fff;
      box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.12);
    }

    .form-input:focus+i {
      color: var(--primary);
    }

    #areaFilter {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 10px;
      padding: 10px 0;
      max-height: 50vh;
      overflow-y: auto;
    }

    .filter-card-list {
      display: flex;
      align-items: center;
      background: white;
      padding: 16px;
      border-bottom: 1px solid #f1f5f9;
      cursor: pointer;
      transition: 0.2s;
    }

    .filter-card-list:last-child {
      border-bottom: none;
    }

    .filter-card-list:active {
      background: #f0f7ff;
    }

    .filter-card-list img {
      width: 36px;
      height: 36px;
      object-fit: contain;
      margin-right: 15px;
    }

    .filter-card-list span {
      flex: 1;
      font-weight: 700;
      font-size: 14px;
      color: #1e293b;
      text-align: left;
    }

    .filter-card-list i {
      color: #cbd5e1;
      font-size: 14px;
    }

    .filter-card {
      background: white;
      border: 1px solid #e2e8f0;
      border-radius: 14px;
      padding: 12px 10px;
      text-align: center;
      cursor: pointer;
      transition: 0.25s ease;
      box-shadow: var(--shadow-sm);
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
    }

    .filter-card:hover {
      border-color: #bfdbfe;
      box-shadow: var(--shadow-md);
      transform: translateY(-2px);
    }

    .filter-card:active {
      transform: scale(0.95);
      background: #f0f7ff;
    }

    .filter-card.active {
      border-color: var(--primary);
      background: #eff6ff;
    }

    .filter-card img {
      width: 34px;
      height: 34px;
      object-fit: contain;
      margin-bottom: 6px;
    }

    .filter-card span {
      display: block;
      font-size: 10.5px;
      font-weight: 700;
      color: #334155;
      line-height: 1.25;
      word-break: break-word;
    }

    /* INVOICE & RECEIPT MODERN */
    .invoice-header {
      background: linear-gradient(135deg, #f8fafc, #eff6ff);
      padding: 20px;
      border-radius: 18px;
      margin-bottom: 16px;
      text-align: center;
      border: 1px solid #e2e8f0;
    }

    .invoice-row {
      display: flex;
      justify-content: space-between;
      margin-bottom: 10px;
      font-size: 13px;
      color: #475569;
    }

    .invoice-total {
      font-size: 17px;
      font-weight: 800;
      color: #0f172a;
      border-top: 1px dashed #cbd5e1;
      padding-top: 12px;
      margin-top: 12px;
      display: flex;
      justify-content: space-between;
    }

    .btn-konfirmasi {
      width: 100%;
      padding: 15px;
      background: linear-gradient(135deg, #2563eb, #1d4ed8);
      color: white;
      border: none;
      border-radius: 16px;
      font-weight: 800;
      font-size: 15px;
      cursor: pointer;
      margin-top: 16px;
      box-shadow: 0 8px 22px rgba(37, 99, 235, 0.28);
      transition: all 0.25s ease;
    }

    .btn-konfirmasi:hover {
      transform: translateY(-2px);
      box-shadow: 0 12px 28px rgba(37, 99, 235, 0.38);
    }

    .btn-konfirmasi:active {
      transform: scale(0.97);
    }

    .btn-batal {
      width: 100%;
      padding: 14px;
      background: #f1f5f9;
      color: #475569;
      border: none;
      border-radius: 16px;
      font-weight: 800;
      font-size: 14.5px;
      cursor: pointer;
      margin-top: 10px;
      transition: all 0.2s ease;
    }

    .btn-batal:hover {
      background: #e2e8f0;
      color: #1e293b;
    }

    .sn-box {
      background: #f8fafc;
      padding: 12px;
      border-radius: 12px;
      font-family: monospace;
      font-size: 12px;
      color: #1e293b;
      word-break: break-all;
      margin-top: 12px;
      line-height: 1.4;
      border: 1px solid #e2e8f0;
    }

    #operatorBadge {
      position: absolute;
      right: 75px;
      top: 15px;
      font-size: 10.5px;
      background: #eff6ff;
      color: var(--primary);
      padding: 5px 12px;
      border-radius: 100px;
      font-weight: 800;
      display: none;
      z-index: 6;
      text-transform: uppercase;
      border: 1px solid #bfdbfe;
    }

    /* PRODUCT LIST & CARDS */
    .product-list {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 16px;
      padding: 0 16px 28px;
    }

    .product-card {
      background: #ffffff;
      border-radius: 22px;
      overflow: hidden;
      box-shadow: 0 6px 18px rgba(15, 23, 42, 0.04);
      border: 1px solid #f1f5f9;
      display: flex;
      flex-direction: column;
      transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .product-card:hover {
      transform: translateY(-6px);
      box-shadow: 0 18px 36px rgba(15, 23, 42, 0.1);
      border-color: #cbd5e1;
    }

    .product-info {
      padding: 14px;
      flex: 1;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      gap: 10px;
    }

    .btn-buy-shop {
      width: 100%;
      padding: 9px 12px;
      border: 1px solid #bfdbfe !important;
      color: #2563eb !important;
      background: linear-gradient(135deg, #eff6ff, #dbeafe) !important;
      border-radius: 12px;
      margin-top: 8px;
      font-size: 12px;
      font-weight: 800;
      cursor: pointer;
      transition: all 0.2s ease;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 6px;
    }

    .btn-buy-shop:hover {
      background: #2563eb !important;
      color: #ffffff !important;
      border-color: #2563eb !important;
      box-shadow: 0 4px 12px rgba(37, 99, 235, 0.25);
    }

    /* LOADER KEREN DENGAN EFEK BLUR */
    #globalLoader {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(255, 255, 255, 0.96);
      backdrop-filter: blur(16px);
      -webkit-backdrop-filter: blur(16px);
      z-index: 99999;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      transition: opacity 0.5s ease;
    }

    .loader-logo-box {
      width: 86px;
      height: 86px;
      background: white;
      border-radius: 24px;
      padding: 14px;
      box-shadow: 0 15px 35px rgba(37, 99, 235, 0.15), 0 0 0 1px rgba(226, 232, 240, 0.8);
      display: flex;
      align-items: center;
      justify-content: center;
      margin-bottom: 24px;
      animation: pulseLogo 2s infinite ease-in-out;
    }

    .custom-spinner {
      width: 44px;
      height: 44px;
      border: 4px solid #e1effe;
      border-top: 4px solid var(--primary);
      border-radius: 50%;
      animation: spin 0.8s linear infinite;
    }

    @keyframes pulseLogo {
      0% {
        transform: scale(1);
        box-shadow: 0 8px 20px rgba(15, 23, 42, 0.06);
      }
      50% {
        transform: scale(1.06);
        box-shadow: 0 20px 40px rgba(37, 99, 235, 0.22);
      }
      100% {
        transform: scale(1);
        box-shadow: 0 8px 20px rgba(15, 23, 42, 0.06);
      }
    }

    /* AUTH UI FLAT MINIMALIST (PERFORMANCE OPTIMIZED) */
    #authOverlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: radial-gradient(circle at top right, #eff6ff, #dbeafe, #f8fafc);
      z-index: 10000;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 20px;
      box-sizing: border-box;
      overflow-y: auto;
    }

    .auth-fx-bg {
      position: absolute;
      top: -10%;
      left: -10%;
      width: 120%;
      height: 120%;
      background: radial-gradient(circle at 20% 30%, rgba(37, 99, 235, 0.15) 0%, transparent 40%),
                  radial-gradient(circle at 80% 70%, rgba(16, 185, 129, 0.1) 0%, transparent 40%);
      z-index: 0;
      filter: blur(60px);
      animation: bgPulse 10s infinite alternate ease-in-out;
    }

    @keyframes bgPulse {
      0% { transform: translate(0, 0) scale(1); }
      100% { transform: translate(2%, 2%) scale(1.05); }
    }

    .auth-card {
      position: relative;
      z-index: 10;
      width: 100%;
      max-width: 410px;
      background: rgba(255, 255, 255, 0.94);
      backdrop-filter: blur(24px);
      -webkit-backdrop-filter: blur(24px);
      border-radius: 32px;
      padding: 40px 32px;
      box-shadow: 0 25px 50px -12px rgba(15, 23, 42, 0.22),
                  inset 0 1px 0 rgba(255, 255, 255, 0.8);
      border: 1px solid rgba(255, 255, 255, 0.6);
      color: var(--text-dark);
      animation: fadeInUp 0.5s cubic-bezier(0.16, 1, 0.3, 1);
      display: flex;
      flex-direction: column;
      gap: 20px;
    }

    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(30px);
      } 
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .auth-brand {
      text-align: center;
      margin-bottom: 4px;
    }

    .brand-logo-glow {
      width: 96px;
      height: 96px;
      object-fit: contain;
      margin-bottom: 14px;
      filter: drop-shadow(0 10px 20px rgba(37, 99, 235, 0.22));
      animation: logoFloat 4s infinite ease-in-out alternate;
    }

    @keyframes logoFloat {
      0% { transform: translateY(0) rotate(0deg); }
      100% { transform: translateY(-8px) rotate(2deg); }
    }

    .auth-h1 {
      font-size: 28px;
      font-weight: 900;
      margin: 0;
      background: linear-gradient(135deg, #0f172a 0%, #2563eb 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      letter-spacing: -0.8px;
    }

    .auth-desc {
      color: var(--text-grey);
      font-size: 13.5px;
      margin-top: 6px;
      font-weight: 500;
    }

    .form-area {
      display: flex;
      flex-direction: column;
      gap: 16px;
    }

    .inp-wrapper {
      position: relative;
    }

    .inp-modern {
      width: 100%;
      background: rgba(241, 245, 249, 0.8);
      border: 2px solid rgba(226, 232, 240, 0.8);
      border-radius: 16px;
      padding: 15px 16px 15px 50px;
      color: var(--text-dark);
      font-size: 14px;
      font-weight: 600;
      font-family: inherit;
      transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
      outline: none;
      box-sizing: border-box;
    }

    .inp-modern::placeholder {
      color: #94a3b8;
      font-weight: 500;
    }

    .inp-modern:focus {
      background: #ffffff;
      border-color: var(--primary);
      box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.15), 0 8px 20px rgba(37, 99, 235, 0.05);
    }

    .inp-icon {
      position: absolute;
      left: 18px;
      top: 50%;
      transform: translateY(-50%);
      color: #94a3b8;
      font-size: 18px;
      transition: all 0.3s;
    }

    .inp-modern:focus ~ .inp-icon {
      color: var(--primary);
      transform: translateY(-50%) scale(1.1);
    }

    .inp-eye {
      position: absolute;
      right: 18px;
      top: 50%;
      transform: translateY(-50%);
      color: #94a3b8;
      cursor: pointer;
      padding: 5px;
      transition: all 0.3s;
    }

    .inp-eye:hover {
      color: var(--primary);
    }

    .reset-link {
      text-align: right;
      margin-top: -6px;
    }

    .reset-link span {
      font-size: 12.5px;
      color: var(--primary);
      font-weight: 700;
      cursor: pointer;
      transition: 0.2s;
    }

    .reset-link span:hover {
      text-decoration: underline;
    }

    .btn-modern-auth {
      width: 100%;
      padding: 16px;
      border-radius: 16px;
      background: linear-gradient(135deg, #2563eb, #1d4ed8);
      color: #ffffff;
      font-weight: 800;
      font-size: 15px;
      border: none;
      cursor: pointer;
      box-shadow: 0 10px 25px -5px rgba(37, 99, 235, 0.4);
      transition: all 0.25s ease;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
      margin-top: 4px;
    }

    .btn-modern-auth:hover {
      transform: translateY(-2px);
      box-shadow: 0 14px 30px -5px rgba(37, 99, 235, 0.5);
    }

    .btn-modern-auth:active {
      transform: scale(0.97);
    }

    .auth-switcher {
      text-align: center;
      font-size: 13.5px;
      color: var(--text-grey);
      margin-top: 4px;
      font-weight: 600;
    }

    .link-accent {
      color: var(--primary);
      font-weight: 800;
      cursor: pointer;
      margin-left: 4px;
      transition: 0.2s;
    }

    .link-accent:hover {
      text-decoration: underline;
    }

    .notice-content {
      background: #ffffff;
      width: 90%;
      max-width: 380px;
      padding: 30px 24px 26px;
      border-radius: 28px;
      text-align: center;
      box-shadow: 0 25px 50px -12px rgba(15, 23, 42, 0.25);
      border: 1px solid #f1f5f9;
      animation: popInSmooth 0.35s cubic-bezier(0.16, 1, 0.3, 1);
    }

    @keyframes popInSmooth {
      from { transform: scale(0.9); opacity: 0; }
      to { transform: scale(1); opacity: 1; }
    }

    .notice-icon {
      font-size: 56px;
      margin-bottom: 16px;
      line-height: 1;
    }

    .icon-success { color: var(--success); }
    .icon-error { color: var(--danger); }
    .icon-loading { color: var(--primary); }

    #modalBroadcast .modal-content {
      background: white;
      width: 90%;
      max-width: 400px;
      padding: 24px;
      border-radius: 24px !important;
      text-align: center;
      position: relative;
    }

    #broadcastImg {
      width: 100%;
      max-height: 220px;
      object-fit: cover;
      border-radius: 16px;
      margin-bottom: 16px;
      display: none;
    }

    #broadcastTitle {
      font-weight: 800;
      font-size: 19px;
      color: #0f172a;
      margin-bottom: 10px;
      line-height: 1.3;
    }

    #broadcastMsg {
      font-size: 13.5px;
      color: #475569;
      line-height: 1.6;
      margin-bottom: 20px;
      text-align: left;
      max-height: 200px;
      overflow-y: auto;
    }

    .btn-close-bc {
      background: linear-gradient(135deg, #2563eb, #1d4ed8);
      color: white;
      border: none;
      padding: 14px;
      border-radius: 16px;
      font-weight: 800;
      width: 100%;
      cursor: pointer;
      box-shadow: 0 8px 20px rgba(37, 99, 235, 0.28);
    }

    .bill-header {
      background: #eff6ff;
      color: #2563eb;
      padding: 14px;
      border-radius: 14px;
      margin-bottom: 14px;
      text-align: center;
      font-weight: 800;
      font-size: 15px;
      border: 1px solid #bfdbfe;
    }

    .bill-table {
      width: 100%;
      border-collapse: collapse;
      font-size: 13px;
      margin-bottom: 12px;
      color: #334155;
    }

    .bill-table tr {
      border-bottom: 1px dashed #e2e8f0;
    }

    .bill-table td {
      padding: 10px 4px;
      vertical-align: top;
    }

    .bill-table .label {
      color: #64748b;
      width: 45%;
      font-weight: 500;
    }

    .bill-table .value {
      font-weight: 700;
      text-align: right;
      color: #0f172a;
    }

    .tu-cat {
      padding: 16px;
      border-radius: 18px;
      border: 1px solid #e2e8f0;
      margin-bottom: 12px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      cursor: pointer;
      transition: all 0.2s ease;
      background: white;
      box-shadow: var(--shadow-sm);
    }

    .tu-cat:hover {
      border-color: #bfdbfe;
      box-shadow: var(--shadow-md);
      transform: translateY(-2px);
    }

    .tu-cat:active {
      transform: scale(0.98);
      background: #f0f7ff;
    }

    .tu-icon {
      width: 48px;
      height: 48px;
      border-radius: 14px;
      background: linear-gradient(135deg, #eff6ff, #dbeafe);
      color: var(--primary);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 22px;
      margin-right: 15px;
      box-shadow: 0 4px 10px rgba(37, 99, 235, 0.08);
    }

    .tu-method {
      display: flex;
      align-items: center;
      padding: 16px;
      border-bottom: 1px solid #f1f5f9;
      cursor: pointer;
      transition: 0.2s;
    }

    .tu-method:last-child {
      border-bottom: none;
    }

    .tu-method:hover {
      background: #f8fafc;
    }

    .tu-invoice-box {
      background: #fff;
      border: 1px solid #e2e8f0;
      border-radius: 24px;
      padding: 26px 20px;
      text-align: center;
      box-shadow: var(--shadow-md);
      margin-bottom: 20px;
      animation: slideUp 0.3s;
    }

    /* CHAT V2 WHATSAPP STYLE */
    .chat-fab {
      position: fixed;
      bottom: 100px;
      right: 20px;
      width: 52px;
      height: 52px;
      background: linear-gradient(135deg, #10b981, #059669);
      color: white;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      box-shadow: 0 8px 20px rgba(16, 185, 129, 0.35);
      z-index: 9998;
      cursor: pointer;
      transition: all 0.25s ease;
      font-size: 24px;
      border: 2px solid #ffffff;
    }

    .chat-fab:hover {
      transform: translateY(-3px) scale(1.05);
      box-shadow: 0 12px 28px rgba(16, 185, 129, 0.45);
    }

    .chat-box {
      flex: 1;
      overflow-y: auto;
      background: #f1f5f9;
      padding: 12px;
      border-radius: 16px;
      border: 1px solid #e2e8f0;
      display: flex;
      flex-direction: column;
      gap: 6px;
      margin-bottom: 10px;
    }

    .chat-bubble {
      max-width: 82%;
      padding: 8px 12px;
      border-radius: 14px;
      font-size: 13px;
      position: relative;
      word-wrap: break-word;
      line-height: 1.4;
      box-shadow: 0 2px 6px rgba(15, 23, 42, 0.04);
    }

    .chat-bubble.me {
      align-self: flex-end;
      background: #dcfce7;
      color: #14532d;
      border-bottom-right-radius: 4px;
    }

    .chat-bubble.other {
      align-self: flex-start;
      background: white;
      color: #1e293b;
      border-bottom-left-radius: 4px;
    }

    .chat-bubble.admin {
      align-self: flex-start;
      background: #fef3c7;
      color: #78350f;
      border: 1px solid #fde68a;
    }

    .chat-name {
      font-size: 11px;
      font-weight: 700;
      margin-bottom: 2px;
      color: #475569;
      display: flex;
      align-items: center;
      gap: 4px;
    }

    .chat-time {
      font-size: 9.5px;
      color: #94a3b8;
      text-align: right;
      margin-top: 2px;
    }

    .chat-input-bar {
      display: flex;
      gap: 8px;
      align-items: flex-end;
      background: white;
      padding: 10px 12px;
      border-top: 1px solid #e2e8f0;
      position: relative;
      z-index: 20;
    }

    .chat-textarea {
      resize: none;
      overflow-y: hidden;
      min-height: 42px;
      max-height: 120px;
      padding: 12px 16px;
      border-radius: 20px;
      background: #f8fafc;
      border: 1px solid #cbd5e1;
      flex: 1;
      font-size: 13.5px;
      line-height: 1.4;
      font-family: inherit;
      outline: none;
    }

    .chat-textarea:focus {
      background: white;
      border-color: var(--primary);
      box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.12);
    }

    .btn-send-chat {
      width: 42px;
      height: 42px;
      border-radius: 50%;
      background: var(--primary);
      color: white;
      border: none;
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      flex-shrink: 0;
      box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
      transition: 0.2s;
    }

    .btn-send-chat:active {
      transform: scale(0.92);
    }

    .chat-reply-bar {
      background: #f8fafc;
      padding: 10px 14px;
      border-left: 4px solid var(--primary);
      display: flex;
      justify-content: space-between;
      align-items: center;
      font-size: 12px;
      border-top: 1px solid #e2e8f0;
      width: 100%;
      box-sizing: border-box;
    }

    .reply-content {
      flex: 1;
      overflow: hidden;
      margin-right: 10px;
    }

    .reply-name {
      font-weight: 800;
      color: var(--primary);
      margin-bottom: 2px;
      font-size: 11px;
    }

    .reply-text {
      color: #64748b;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
      font-size: 11px;
    }

    .quoted-msg {
      background: rgba(0, 0, 0, 0.04);
      border-left: 3px solid #cbd5e1;
      padding: 6px 10px;
      border-radius: 6px;
      margin-bottom: 6px;
      font-size: 11px;
      display: block;
      color: inherit;
    }

    .reply-btn {
      margin-left: 8px;
      color: #94a3b8;
      cursor: pointer;
      font-size: 14px;
      padding: 4px;
      transition: 0.2s;
    }

    .reply-btn:hover {
      color: var(--primary);
      background: #eff6ff;
      border-radius: 50%;
    }

    .chat-name-row {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 3px;
    }

    /* FULLSCREEN QRIS CSS */
    .qris-overlay {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(15, 23, 42, 0.92);
      backdrop-filter: blur(10px);
      z-index: 30000;
      align-items: center;
      justify-content: center;
      flex-direction: column;
    }

    .qris-overlay img {
      max-width: 88%;
      max-height: 80%;
      border-radius: 20px;
      box-shadow: 0 20px 50px rgba(0, 0, 0, 0.5);
      border: 2px solid rgba(255, 255, 255, 0.2);
    }

    .qris-close {
      position: absolute;
      top: 24px;
      right: 24px;
      color: white;
      font-size: 26px;
      cursor: pointer;
      width: 44px;
      height: 44px;
      display: flex;
      align-items: center;
      justify-content: center;
      background: rgba(255, 255, 255, 0.15);
      border-radius: 50%;
      transition: 0.2s;
    }

    .qris-close:hover {
      background: rgba(255, 255, 255, 0.3);
    }

    /* CSS MODAL FULLSCREEN & AKRAB UI */
    .modal-fullscreen {
      align-items: flex-start !important;
    }

    .modal-fullscreen .modal-content {
      height: 100vh !important;
      max-height: 100vh !important;
      border-radius: 0 !important;
      padding: 0 !important;
    }

    .modal-fullscreen .modal-content::before {
      display: none !important;
    }

    .akrab-header {
      background: linear-gradient(135deg, #1e3a8a, #2563eb);
      color: white;
      padding: 20px 18px;
      display: flex;
      align-items: center;
      gap: 15px;
      position: sticky;
      top: 0;
      z-index: 10;
      box-shadow: 0 4px 15px rgba(37, 99, 235, 0.2);
    }

    .akrab-search-container {
      padding: 14px 16px;
      background: #fff;
      border-bottom: 1px solid #f1f5f9;
    }

    .akrab-search-input {
      width: 100%;
      padding: 14px 16px 14px 44px;
      border: 1.5px solid #e2e8f0;
      border-radius: 14px;
      font-size: 14px;
      outline: none;
      background: #f8fafc;
      transition: all 0.25s ease;
      font-family: inherit;
    }

    .akrab-search-input:focus {
      background: #ffffff;
      border-color: var(--primary);
      box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.12);
    }

    .akrab-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 12px;
      padding: 16px;
      background: #fff;
    }

    .akrab-btn {
      background: #f8fafc;
      border: 1.5px solid #e2e8f0;
      border-radius: 16px;
      padding: 14px 8px;
      text-align: center;
      font-size: 11px;
      font-weight: 800;
      color: #334155;
      cursor: pointer;
      transition: all 0.25s ease;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      gap: 6px;
    }

    .akrab-btn:hover {
      border-color: #bfdbfe;
      transform: translateY(-2px);
    }

    .akrab-btn i {
      font-size: 18px;
      margin-bottom: 2px;
    }

    .akrab-btn.active {
      background: #eff6ff;
      border-color: #2563eb;
      color: #2563eb;
      box-shadow: 0 4px 12px rgba(37, 99, 235, 0.15);
    }

    .akrab-section-title {
      padding: 0 16px;
      font-size: 11.5px;
      font-weight: 800;
      color: #94a3b8;
      text-transform: uppercase;
      margin-top: 14px;
      letter-spacing: 0.5px;
    }

    /* BOTTOM NAV FLOATING MODERN DOCK */
    .bottom-nav {
      position: fixed;
      bottom: 20px;
      left: 20px;
      right: 20px;
      max-width: 460px;
      margin: 0 auto;
      height: 70px;
      background: rgba(255, 255, 255, 0.94);
      backdrop-filter: blur(24px);
      -webkit-backdrop-filter: blur(24px);
      display: flex;
      justify-content: space-around;
      align-items: center;
      padding: 0 16px;
      box-shadow: 0 20px 45px rgba(15, 23, 42, 0.14), 0 0 0 1px rgba(226, 232, 240, 0.85);
      z-index: 9999;
      border-radius: 30px;
    }

    .nav-item {
      text-align: center;
      color: #94a3b8;
      font-size: 11px;
      font-weight: 600;
      flex: 1;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      height: 100%;
      cursor: pointer;
      transition: all 0.25s cubic-bezier(0.34, 1.56, 0.64, 1);
      position: relative;
    }

    .nav-item.active {
      color: var(--primary);
      font-weight: 800;
    }

    .nav-item i {
      font-size: 20px;
      margin-bottom: 4px;
      display: block;
      transition: all 0.25s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    .nav-item:hover {
      color: #475569;
    }

    .nav-item.active i {
      transform: translateY(-3px) scale(1.15);
      color: var(--primary);
    }

    .nav-fab {
      background: linear-gradient(135deg, #2563eb, #1d4ed8);
      color: white;
      width: 60px;
      height: 60px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      position: absolute;
      top: -26px;
      box-shadow: 0 12px 26px rgba(37, 99, 235, 0.4);
      border: 4px solid #ffffff;
      font-size: 24px;
      transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    .nav-fab:hover {
      transform: translateY(-4px) scale(1.06);
      box-shadow: 0 16px 34px rgba(37, 99, 235, 0.5);
    }

    .nav-fab:active {
      transform: scale(0.94);
    }

    /* CART & SHOP UPDATES */
    .btn-see-more {
      width: 100%;
      padding: 14px;
      background: #ffffff;
      border: 2px solid #e2e8f0;
      color: var(--text-dark);
      font-weight: 800;
      border-radius: 16px;
      margin-top: 8px;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
      font-size: 13.5px;
      box-shadow: 0 4px 12px rgba(15, 23, 42, 0.03);
      transition: all 0.25s ease;
    }

    .btn-see-more:hover {
      background: var(--primary);
      color: #ffffff;
      border-color: var(--primary);
      box-shadow: 0 8px 24px rgba(37, 99, 235, 0.25);
    }

    .cart-item {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background: white;
      padding: 16px;
      border-radius: 18px;
      margin-bottom: 12px;
      box-shadow: var(--shadow-sm);
      border: 1px solid #f1f5f9;
    }

    .cart-img {
      width: 64px;
      height: 64px;
      border-radius: 14px;
      object-fit: cover;
      background: #f8fafc;
      border: 1px solid #e2e8f0;
    }

    .cart-desc {
      display: flex;
      flex-direction: column;
      gap: 4px;
    }

    .full-page {
      display: none;
      padding-bottom: 100px;
      animation: fadeIn 0.3s;
    }

    .prof-header {
      background: var(--grad-main);
      padding: 45px 20px 65px;
      border-radius: 0 0 38px 38px;
      text-align: center;
      color: white;
      margin-bottom: -40px;
      box-shadow: 0 10px 30px rgba(37, 99, 235, 0.2);
    }

    .prof-card {
      background: white;
      margin: 0 16px 20px;
      padding: 22px;
      border-radius: 24px;
      box-shadow: var(--shadow-md);
      position: relative;
      z-index: 2;
      border: 1px solid #f1f5f9;
    }

    .prof-row {
      display: flex;
      justify-content: space-between;
      padding: 14px 0;
      border-bottom: 1px dashed #e2e8f0;
      font-size: 13.5px;
    }

    .prof-row:last-child {
      border-bottom: none;
    }

    .cart-badge {
      position: absolute;
      top: -5px;
      right: 25%;
      background: var(--danger);
      color: white;
      font-size: 9.5px;
      font-weight: 800;
      padding: 3px 6px;
      border-radius: 100px;
      display: none;
    }

    /* PDP MODERN */
    .pdp-container {
      background: #f8fafc;
      height: 100%;
      display: flex;
      flex-direction: column;
      overflow-y: auto;
      padding-bottom: 90px;
    }

    .pdp-image {
      width: 100%;
      height: 360px;
      object-fit: cover;
      border-bottom: 1px solid #e2e8f0;
    }

    .pdp-header {
      padding: 18px 20px;
      background: white;
      margin-bottom: 12px;
      border-bottom: 1px solid #f1f5f9;
    }

    .pdp-price {
      font-size: 26px;
      color: var(--primary);
      font-weight: 900;
      margin: 6px 0;
      letter-spacing: -0.5px;
    }

    .pdp-title {
      font-size: 17px;
      font-weight: 800;
      line-height: 1.4;
      color: #0f172a;
    }

    .pdp-desc-box {
      padding: 18px 20px;
      background: white;
      margin-bottom: 12px;
      border-top: 1px solid #f1f5f9;
      border-bottom: 1px solid #f1f5f9;
    }

    .pdp-label {
      font-weight: 800;
      font-size: 14.5px;
      margin-bottom: 10px;
      display: block;
      color: #0f172a;
    }

    .pdp-desc-text {
      font-size: 13.5px;
      color: #475569;
      line-height: 1.6;
      white-space: pre-wrap;
    }

    .pdp-footer {
      position: fixed;
      bottom: 0;
      left: 0;
      width: 100%;
      background: white;
      padding: 14px 20px;
      box-shadow: 0 -4px 20px rgba(15, 23, 42, 0.08);
      display: flex;
      gap: 12px;
      z-index: 100;
      box-sizing: border-box;
      border-top: 1px solid #f1f5f9;
    }

    .btn-cart-add {
      flex: 1;
      background: #f59e0b;
      color: white;
      border: none;
      padding: 14px;
      border-radius: 16px;
      font-weight: 800;
      font-size: 14px;
      cursor: pointer;
      box-shadow: 0 6px 16px rgba(245, 158, 11, 0.28);
    }

    .btn-buy-now {
      flex: 1;
      background: linear-gradient(135deg, #2563eb, #1d4ed8);
      color: white;
      border: none;
      padding: 14px;
      border-radius: 16px;
      font-weight: 800;
      font-size: 14px;
      cursor: pointer;
      box-shadow: 0 6px 16px rgba(37, 99, 235, 0.28);
    }

    .lapak-tabs {
      display: flex;
      background: white;
      border-bottom: 1px solid #e2e8f0;
      margin-top: -24px;
      border-radius: 24px 24px 0 0;
      position: relative;
      z-index: 10;
      box-shadow: var(--shadow-sm);
    }

    .lapak-tab {
      flex: 1;
      text-align: center;
      padding: 16px;
      font-size: 13.5px;
      font-weight: 700;
      color: #64748b;
      cursor: pointer;
      border-bottom: 3px solid transparent;
      transition: all 0.2s ease;
    }

    .lapak-tab.active {
      color: var(--primary);
      font-weight: 800;
      border-bottom-color: var(--primary);
    }

    .seller-order-card {
      background: white;
      padding: 16px;
      border-radius: 20px;
      margin-bottom: 14px;
      box-shadow: var(--shadow-sm);
      border: 1px solid #f1f5f9;
    }

    .order-tabs {
      display: flex;
      background: white;
      padding: 0 12px;
      border-bottom: 1px solid #e2e8f0;
      overflow-x: auto;
    }

    .order-tab {
      padding: 16px;
      font-size: 13.5px;
      color: #64748b;
      white-space: nowrap;
      cursor: pointer;
      border-bottom: 2.5px solid transparent;
      font-weight: 600;
    }

    .order-tab.active {
      color: var(--primary);
      border-bottom-color: var(--primary);
      font-weight: 800;
    }

    .order-card {
      background: white;
      padding: 16px;
      margin-bottom: 12px;
      border-radius: 18px;
      border: 1px solid #f1f5f9;
      box-shadow: var(--shadow-sm);
    }

    .order-status {
      font-size: 11px;
      font-weight: 800;
      float: right;
      color: var(--primary);
      text-transform: uppercase;
    }

    .pagination-container {
      display: flex;
      justify-content: center;
      gap: 8px;
      margin-top: 18px;
      padding: 10px;
    }

    .page-num {
      width: 36px;
      height: 36px;
      display: flex;
      align-items: center;
      justify-content: center;
      background: #ffffff;
      border: 1px solid #e2e8f0;
      border-radius: 12px;
      cursor: pointer;
      font-weight: 800;
      font-size: 13px;
      color: #334155;
      transition: all 0.2s ease;
    }

    .page-num:hover {
      border-color: #bfdbfe;
      background: #eff6ff;
    }

    .page-num.active {
      background: var(--primary);
      color: white;
      border-color: var(--primary);
      box-shadow: 0 4px 12px rgba(37, 99, 235, 0.25);
    }

    .filter-date-box {
      display: flex;
      gap: 10px;
      align-items: center;
      margin-bottom: 16px;
      background: #ffffff;
      padding: 12px 16px;
      border-radius: 16px;
      border: 1.5px solid #e2e8f0;
      box-shadow: var(--shadow-sm);
    }

    .filter-date-box input {
      flex: 1;
      border: none;
      background: transparent;
      outline: none;
      font-size: 13.5px;
      font-weight: 700;
      color: #0f172a;
      font-family: inherit;
    }

    @keyframes fadeIn {
      from { opacity: 0; }
      to { opacity: 1; }
    }

    /* PBB SMART LOCATION SELECTOR */
    .pbb-header-box {
      background: linear-gradient(135deg, #1e3a8a, #2563eb);
      color: white;
      padding: 22px 20px;
      border-radius: 24px;
      margin-bottom: 16px;
      box-shadow: 0 10px 28px rgba(37, 99, 235, 0.22);
      position: relative;
      overflow: hidden;
      border: 1px solid rgba(255, 255, 255, 0.2);
    }
    .pbb-header-box::after {
      content: '';
      position: absolute;
      right: -30px;
      bottom: -30px;
      width: 140px;
      height: 140px;
      background: radial-gradient(circle, rgba(255,255,255,0.18) 0%, transparent 70%);
      border-radius: 50%;
      pointer-events: none;
    }
    .pbb-search-box {
      position: relative;
      margin-bottom: 14px;
    }
    .pbb-search-input {
      width: 100%;
      padding: 15px 16px 15px 48px;
      border: 2px solid #e2e8f0;
      border-radius: 18px;
      font-size: 14px;
      font-weight: 600;
      color: var(--text-dark);
      background: #f8fafc;
      outline: none;
      transition: all 0.25s ease;
      font-family: inherit;
    }
    .pbb-search-input:focus {
      background: #ffffff;
      border-color: var(--primary);
      box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.12);
    }
    .pbb-search-box i {
      position: absolute;
      left: 18px;
      top: 50%;
      transform: translateY(-50%);
      color: #94a3b8;
      font-size: 18px;
    }
    .pbb-region-tabs {
      display: flex;
      gap: 8px;
      overflow-x: auto;
      padding-bottom: 8px;
      margin-bottom: 16px;
      scrollbar-width: none;
    }
    .pbb-region-tabs::-webkit-scrollbar {
      display: none;
    }
    .pbb-region-tab {
      padding: 10px 16px;
      border-radius: 100px;
      background: #f1f5f9;
      color: #64748b;
      font-size: 12.5px;
      font-weight: 700;
      white-space: nowrap;
      cursor: pointer;
      border: 1px solid transparent;
      transition: all 0.2s ease;
    }
    .pbb-region-tab:hover {
      background: #e2e8f0;
      color: #1e293b;
    }
    .pbb-region-tab.active {
      background: var(--primary);
      color: white;
      border-color: var(--primary);
      box-shadow: 0 4px 14px rgba(37, 99, 235, 0.28);
    }
    .pbb-section-title {
      font-size: 13.5px;
      font-weight: 800;
      color: #1e293b;
      margin: 20px 0 12px;
      display: flex;
      align-items: center;
      gap: 8px;
      padding-bottom: 8px;
      border-bottom: 1.5px dashed #e2e8f0;
    }
    .pbb-grid {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 12px;
    }
    @media (max-width: 550px) {
      .pbb-grid {
        grid-template-columns: 1fr;
      }
    }
    .pbb-card {
      background: #ffffff;
      border: 1px solid #e2e8f0;
      border-radius: 18px;
      padding: 15px 16px;
      cursor: pointer;
      transition: all 0.25s ease;
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 12px;
      box-shadow: var(--shadow-sm);
    }
    .pbb-card:hover {
      border-color: #bfdbfe;
      box-shadow: var(--shadow-md);
      transform: translateY(-3px);
    }
    .pbb-card:active {
      transform: scale(0.98);
      background: #f8fafc;
    }
    .pbb-icon-badge {
      width: 44px;
      height: 44px;
      border-radius: 14px;
      background: linear-gradient(135deg, #eff6ff, #dbeafe);
      color: var(--primary);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 18px;
      flex-shrink: 0;
    }
    .pbb-info {
      flex: 1;
      min-width: 0;
    }
    .pbb-city-name {
      font-weight: 800;
      font-size: 13.5px;
      color: #0f172a;
      margin-bottom: 3px;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
    }
    .pbb-city-meta {
      font-size: 11px;
      color: #64748b;
      font-weight: 600;
      display: flex;
      align-items: center;
      gap: 6px;
    }
    .pbb-badge {
      font-size: 9px;
      padding: 2px 6px;
      border-radius: 6px;
      font-weight: 800;
      text-transform: uppercase;
    }
    .badge-kota { background: #e0e7ff; color: #6d28d9; }
    .badge-kabupaten { background: #dcfce7; color: #15803d; }
    .badge-provinsi { background: #fef3c7; color: #b45309; }
    .pbb-arrow {
      color: #cbd5e1;
      font-size: 14px;
      transition: all 0.2s ease;
    }
    .pbb-card:hover .pbb-arrow {
      color: var(--primary);
      transform: translateX(3px);
    }
  </style>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
  <script>
    document.addEventListener('input', function(e) {
        const phoneInputIds = ['nomorHP', 'invoiceNomorHP', 'newTopupPhone', 'inputIcsTujuan', 'inputKhfyTujuan', 'inputPOTujuan', 'inputWzTujuan'];
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
      <div class="auth-brand">
        <img src="icons/pandawa.png" class="brand-logo-glow" alt="Logo">
        <h1 class="auth-h1">Pandawa-Digital</h1>
        <p class="auth-desc">Agen Resmi PPOB & AKRAB 2026.   cepat mudah dan stabil</p>
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

      <div class="reset-link">
        <span onclick="handleResetPassword()">Lupa kata sandi?</span>
      </div>

      <button id="btnLogin" class="btn-modern-auth" onclick="handleLogin()">
        Login <i class="fas fa-arrow-right"></i>
      </button>

      <button onclick="handleGoogleLogin()" style="width:100%; padding:14px; border-radius:14px; border:1px solid #cbd5e1; background:white; color:#333; font-weight:700; font-size:13px; cursor:pointer; display:flex; align-items:center; justify-content:center; gap:10px; margin-top:10px; transition:0.2s;">
        <img src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg" width="18"> MASUK DENGAN GOOGLE
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

      <button class="btn-modern-auth" style="background: linear-gradient(135deg, #10b981, #059669); margin-top:10px;" onclick="handleRegister()">
        DAFTAR GRATIS <i class="fas fa-paper-plane"></i>
      </button>

      <div class="auth-switcher">
        Sudah punya akun? <span class="link-accent" onclick="toggleAuth('login')">Masuk Akun</span>
      </div>
    </div>
  </div>
  <div id="globalLoader">
    <div class="loader-logo-box">
      <img src="icons/pandawa.png" style="width: 100%; height: 100%; object-fit: contain;">
    </div>
    <div class="custom-spinner"></div>
    <p style="margin-top: 20px; font-weight: 700; color: #333; font-size: 13px; letter-spacing: 0.5px;">Memuat Data...</p>
    <p style="margin-top: 5px; font-size: 10px; color: #888;">Sinkronisasi Produk & Akun</p>
  </div>

  <div id="mainAppContent">

    <div class="header">
      <div class="header-top" style="display:flex; align-items:center; gap: 15px; padding-top: 10px; position: relative; z-index: 2;">
        <div style="width: 50px; height: 50px; background: rgba(255,255,255,0.1); backdrop-filter: blur(10px); border-radius: 16px; display: flex; align-items: center; justify-content: center; border: 1px solid rgba(255,255,255,0.2); box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
          <img src="icons/pandawa.png" style="height: 32px; width: auto; object-fit: contain;">
        </div>
        <div style="flex:1;">
          <div style="font-size:11px; color:#94a3b8; font-weight: 600; margin-bottom:2px; display:flex; align-items:center; gap:5px;"><i class="fas fa-sun" style="color:#facc15;"></i> Selamat Datang,</div>
          <div id="headerName" style="font-weight:800; font-size:19px; color:#fff; letter-spacing: -0.5px; text-shadow: 0 2px 4px rgba(0,0,0,0.2); line-height:1.2;">Pengguna</div>

          <div style="font-size:10px; color:#cbd5e1; font-weight:bold; margin-top:2px;"><i class="fas fa-code-branch"></i> v1.0.7</div>
        </div>
        <div style="display: flex; gap: 8px;">
          <div onclick="bukaRiwayatArsip()" style="width: 38px; height: 38px; background: rgba(255,255,255,0.1); backdrop-filter: blur(10px); border-radius: 12px; display: flex; align-items: center; justify-content: center; cursor: pointer; border: 1px solid rgba(255,255,255,0.1); transition: 0.2s;">
            <i class="fas fa-bell" style="color:#fff; font-size:15px;"></i>
          </div>
          <div onclick="handleLogout()" style="width: 38px; height: 38px; background: rgba(239, 68, 68, 0.15); backdrop-filter: blur(10px); border-radius: 12px; display: flex; align-items: center; justify-content: center; cursor: pointer; border: 1px solid rgba(239, 68, 68, 0.3); transition: 0.2s;">
            <i class="fas fa-sign-out-alt" style="color:#fca5a5; font-size:15px;"></i>
          </div>
        </div>
      </div>
    </div>

    <div class="saldo-box">
      <div class="saldo-info">
        <div>
          <div style="font-size:12px; color:#777; margin-bottom:5px; display:flex; align-items:center; gap:5px;"><i class="fas fa-wallet" style="color:var(--primary)"></i> Saldo Kamu</div>
          <div id="saldoValue" style="font-size:28px; font-weight:900; color:#0f172a; letter-spacing:-0.6px;">Rp 0</div>
        </div>
        <i class="fas fa-history" style="font-size: 20px; color: #cbd5e1; cursor: pointer;" onclick="bukaRiwayatArsip()"></i>
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

    <div class="menu-container">
      <div class="cat-title">Menu Utama</div>
      <div class="menu-grid">
        <div class="menu-item" onclick="bukaMenu('Pulsa')">
          <div class="icon-box"><i class="fas fa-mobile-alt" style="font-size:28px; color:#3b82f6;"></i></div><span>Pulsa</span>
        </div>
        <div class="menu-item" onclick="bukaMenu('E-Wallet')">
          <div class="icon-box"><i class="fas fa-wallet" style="font-size:26px; color:#10b981;"></i></div><span>E-Wallet</span>
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
        <div class="menu-item" id="menuAkrabAll" onclick="bukaMenu('Paket Akrab All')">
          <div class="icon-box"><i class="fas fa-users" style="font-size:24px; color:#14b8a6;"></i></div><span>Paket Akrab</span>
        </div>
        <div class="menu-item" onclick="bukaMenu('PBB')">
          <div class="icon-box"><i class="fas fa-landmark" style="font-size:26px; color:#e11d48;"></i></div><span>PBB</span>
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
        <div id="btnMore" onclick="toggleMenuLainnya()" style="background:#f0f7ff; padding:8px 20px; border-radius:20px; display:inline-block; font-size:12px; font-weight:bold; color:var(--primary); cursor:pointer; transition:0.2s;">
          <i class="fas fa-chevron-down"></i> Menu Lainnya
        </div>
      </div>
    </div>
  </div>



  <div id="appBanner" style="display: none; background: linear-gradient(135deg, #0f172a 0%, #1e3a8a 100%); border: 1px solid rgba(255,255,255,0.1); border-radius: 20px; padding: 16px; margin: 0 15px 20px; align-items: center; justify-content: space-between; box-shadow: 0 10px 25px rgba(30, 58, 138, 0.3); position: relative; z-index: 2; overflow: hidden;">
    <div style="position: absolute; top: -20px; right: -20px; width: 100px; height: 100px; background: rgba(255,255,255,0.05); border-radius: 50%; filter: blur(10px);"></div>
    <div style="display: flex; align-items: center; gap: 14px; flex: 1; position: relative; z-index: 3;">
      <div style="width: 48px; height: 48px; background: rgba(255,255,255,0.1); backdrop-filter: blur(10px); border-radius: 14px; display: flex; justify-content: center; align-items: center; border: 1px solid rgba(255,255,255,0.2); flex-shrink: 0; animation: pulseIcon 2s infinite;">
        <i class="fab fa-android" style="font-size: 26px; color: #a4c639;"></i>
      </div>
      <div>
        <div style="font-weight: 900; font-size: 14px; color: #ffffff; margin-bottom: 3px; letter-spacing: 0.5px;">Pandawa Digital App</div>
        <div style="font-size: 10.5px; color: #94a3b8; line-height: 1.4;">Install untuk transaksi lebih cepat, ringan & aman! 🚀</div>
      </div>
    </div>
    <a href="Pandawa.apk" style="background: #ffffff; color: #1e3a8a; padding: 10px 18px; border-radius: 20px; font-size: 12px; font-weight: 800; text-decoration: none; box-shadow: 0 4px 15px rgba(0,0,0,0.2); transition: all 0.2s; white-space: nowrap; margin-left: 10px; position: relative; z-index: 3;">INSTALL</a>
    <style>
      @keyframes pulseIcon {
        0% {
          transform: scale(1);
        }

        50% {
          transform: scale(1.08);
        }

        100% {
          transform: scale(1);
        }
      }
    </style>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
        // Deteksi 100% akurat: Cek apakah interface Java (AndroidShare) tersedia dari AIDE
        const isApp = typeof AndroidShare !== 'undefined';
        const banner = document.getElementById('appBanner');
        if (banner) {
            banner.style.display = isApp ? 'none' : 'flex';
        }
    });
  </script>


  <div id="h2hDashboard" style="display:none; padding: 20px; padding-top: 40px; animation: fadeIn 0.3s; padding-bottom: 20px;">
    <div style="background:var(--grad-main); padding: 25px 20px; border-radius: 20px; color: white; margin-bottom: 20px; box-shadow: 0 10px 20px rgba(0,153,255,0.2); display:flex; flex-direction:column; gap:10px;">
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

    <button onclick="window.open('https://www.pandawa-digital.com/getdoc.php', '_blank')" style="width:100%; padding:15px; background:linear-gradient(135deg, #2c3e50, #34495e); color:white; border:none; border-radius:12px; font-weight:800; font-size:13px; box-shadow:0 4px 15px rgba(44,62,80,0.3); cursor:pointer; display:flex; align-items:center; justify-content:center; gap:8px;">
      <i class="fas fa-laptop-code"></i> Tutorial Connect Web 2 Host
    </button>

    <button onclick="handleLogout()" style="width:100%; padding:15px; background:#fff5f5; color:var(--danger); border:1px solid #ffcccc; border-radius:12px; font-weight:800; font-size:13px; margin-top:10px; cursor:pointer; display:flex; align-items:center; justify-content:center; gap:8px;">
      <i class="fas fa-sign-out-alt"></i> Keluar Akun
    </button>
  </div>


  <div id="liveHistoryHeader" style="display:flex; align-items:center; padding:12px 20px 8px;">
    <div style="font-weight:bold; font-size:14px; color:#555; flex:1;">Riwayat Live</div>
    <div id="btnModeMasal" onclick="toggleModeMasal()" style="font-size:10px; font-weight:bold; background:#e1effe; color:black; padding:6px 12px; border-radius:15px; cursor:pointer; margin-right:10px; transition:0.2s;">
      <i class="fas fa-print"></i> Cetak Masal
    </div>
    <div style="font-size:10px; color:var(--primary); font-weight:bold; cursor:pointer;" onclick="bukaRiwayatArsip()">Lihat Semua <i class="fas fa-chevron-right"></i></div>
  </div>
  <div id="riwayat-container" class="history-container">
    <p style="text-align:center; font-size:11px; color:#999; padding:10px;">Memuat riwayat...</p>
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
          <button type="button" onclick="window.pasteDariClipboard('nomorHP')" style="position:absolute; right:8px; top:8px; background:var(--primary); color:white; border:none; border-radius:10px; padding:0 12px; height: 29px; font-size:10px; font-weight:bold; cursor:pointer; z-index:10; box-shadow: 0 2px 5px rgba(37,99,235,0.2);">PASTE</button>
        </div>

        <div id="areaBebasNominal" style="display:none; margin-top:10px; background: rgba(0,102,178,0.03); padding: 15px; border-radius: 16px; border: 1px dashed rgba(0,102,178,0.2);">
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
      <div style="background:#f0f9ff; padding:10px; border-radius:8px; margin:15px 0; text-align:center; border:1px solid #b3e5fc;">
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
    <div class="modal-content" style="height:auto; max-height:85vh; overflow-y:auto; border-radius: 25px 25px 0 0; padding: 20px 25px;">
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
    import { getFirestore, collection, onSnapshot, addDoc, query, orderBy, limit, serverTimestamp, updateDoc, doc, setDoc, getDoc, deleteDoc, where, getDocs, initializeFirestore, persistentLocalCache, persistentMultipleTabManager } from "https://www.gstatic.com/firebasejs/10.7.1/firebase-firestore.js";
    
    const firebaseConfig = {
      apiKey: "AIzaSyDYj0BA6cZDUxNBA7lmxBoXzah7H4y8yu4",
      authDomain: "pandawa-store.firebaseapp.com",
      projectId: "pandawa-store",
      storageBucket: "pandawa-store.firebasestorage.app",
      messagingSenderId: "974440930132",
      appId: "1:974440930132:web:57fcb857cfd5ac51b386c1"
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
    window.setDoc = setDoc; window.getDoc = getDoc; window.updateDoc = updateDoc; window.doc = doc; window.serverTimestamp = serverTimestamp; window.collection = collection; window.addDoc = addDoc; window.getDocs = getDocs; window.where = where; window.query = query; window.onSnapshot = onSnapshot; window.deleteDoc = deleteDoc; window.orderBy = orderBy; window.limit = limit;
    
    window.kirimNotifTelegram = function(tipe, data) {
        const botToken = "7507761189:AAGUCYltzj_IMuDRgjUzUPiZDz4nbVXvOME";
        const chatId = "-1002997407612";
        let threadId = (tipe === 'transaksi' || tipe === 'preorder') ? "6" : "7";
        
        let text = "";
        let now = new Date();
        let months = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
        let timeStr = now.getDate() + " " + months[now.getMonth()] + " " + now.getFullYear() + " | " + now.getHours().toString().padStart(2,'0') + "." + now.getMinutes().toString().padStart(2,'0') + "." + now.getSeconds().toString().padStart(2,'0');
    
        if (tipe === 'transaksi') {
            let tujuanMasked = "-";
            if (data.tujuan) {
                let tStr = data.tujuan.toString();
                tujuanMasked = tStr.length > 5 ? tStr.substring(0, tStr.length - 5) + "*****" : "*****";
            }
            text = `<b>✅ TRANSAKSI BERHASIL</b>\n━━━━━━━━━━━━━━━━━━\n📦 Produk : ${data.produk}\n🎯 Tujuan : ${tujuanMasked}\n💸 Harga : Rp${new Intl.NumberFormat('id-ID').format(data.harga)}\n🕒 Waktu : ${timeStr}\n👤 User : ${data.username}\n🆔 ID Transaksi : ${data.trx_id}\n━━━━━━━━━━━━━━━━━━\n🎉 Pesanan Anda telah berhasil diproses.\nTerima kasih atas kepercayaan Anda menggunakan layanan kami.\nwww.pandawa-digital.com`;
        } else if (tipe === 'preorder') {
            let tujuanMasked = "-";
            if (data.tujuan) {
                let tStr = data.tujuan.toString();
                tujuanMasked = tStr.length > 5 ? tStr.substring(0, tStr.length - 5) + "*****" : "*****";
            }
            text = `<b>⏳ PRE-ORDER MASUK</b>\n━━━━━━━━━━━━━━━━━━\n📦 Produk : ${data.produk}\n🎯 Tujuan : ${tujuanMasked}\n💸 Harga : Rp${new Intl.NumberFormat('id-ID').format(data.harga)}\n🕒 Waktu : ${timeStr}\n👤 User : ${data.username}\n🆔 ID Transaksi : ${data.trx_id}\n📌 Status : Pending (Dalam Antrian)\n━━━━━━━━━━━━━━━━━━\n🎉 Pesanan Pre-Order Anda telah masuk antrian.\nTerima kasih atas kepercayaan Anda menggunakan layanan kami.\nwww.pandawa-digital.com`;
        } else if (tipe === 'topup') {
            text = `<b>✅ DEPOSIT BERHASIL</b>\n━━━━━━━━━━━━━━━━━━\n💳 Jumlah : Rp${new Intl.NumberFormat('id-ID').format(data.harga)}\n🕒 Waktu : ${timeStr}\n👤 User ID : ${data.username}\n📌 Status : Berhasil\n🆔 ID Transaksi : ${data.trx_id}\n━━━━━━━━━━━━━━━━━━\n✨ Deposit berhasil diproses ke akun Anda.\nTerima kasih telah menggunakan layanan kami.\nwww.pandawa-digital.com`;
        }
    
                    text = text.replace(/ICS/gi, '(***)').replace(/KHFY/gi, '(****)').replace(/KAJE/gi, '(****)');
    
        if (data.tujuan && data.tujuan.toString().length > 5) {
            let tStr = data.tujuan.toString();
            let masked = tStr.substring(0, tStr.length - 5) + "*****";
            text = text.split(tStr).join(masked); 
        }
    
        fetch(`https://api.telegram.org/bot${botToken}/sendMessage`, {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ chat_id: chatId, message_thread_id: threadId, text: text, parse_mode: "HTML" })
        }).catch(e => console.log(e));
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
                window.markupConfigArray = Array.isArray(mData) ? mData : [];
                window.markupWzProducts = {};
    
                if (Array.isArray(mData)) {
                    mData.forEach(item => {
                        if (!item || typeof item !== 'object') return;
                        if(item.kode_produk) window.markupConfig[String(item.kode_produk).toUpperCase()] = item.markup;
                        if(item.markup_key) window.markupConfig[String(item.markup_key).toUpperCase()] = item.markup;
                        if(item.nama_produk) window.markupConfig[item.nama_produk] = item.markup;
                    });
                } else if (mData && typeof mData === 'object') {
                    Object.keys(mData).forEach(key => {
                        if (key === 'wz_products' && mData[key] && typeof mData[key] === 'object') {
                            Object.keys(mData[key]).forEach(code => {
                                const row = mData[key][code];
                                const markup = row && typeof row === 'object' ? row.markup : row;
                                window.markupConfig[String(code).toUpperCase()] = markup;
                                window.markupWzProducts[String(code).toUpperCase()] = markup;
                            });
                        } else {
                            const val = mData[key];
                            window.markupConfig[key] = val && typeof val === 'object' && 'markup' in val ? val.markup : val;
                        }
                    });
                }
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
            const btnLogin = document.getElementById('btnLogin');
            if (btnLogin) {
                btnLogin.innerHTML = 'Login <i class="fas fa-arrow-right"></i>';
                btnLogin.disabled = false;
                btnLogin.style.opacity = '1';
                btnLogin.style.cursor = 'pointer';
            }
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
    
        if(!username || !nama || !wa || !email || !pass || !passConfirm) return alert("Mohon lengkapi semua data!");
        
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
                createdAt: serverTimestamp() 
            });
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
        
        const qRiwayat = query(collection(db, "users", user.uid, "riwayat_transaksi"), orderBy("timestamp", "desc"), limit(10));
        
        unsubscribeRiwayat = onSnapshot(qRiwayat, (snap) => {
            const container = document.getElementById('riwayat-container');
            let html = "";
            
            snap.forEach((docSnap) => {
                const data = docSnap.data();
                                    const idDoc = docSnap.id;
    
                                    // LOGIKA BARU: AUTO-CEK STATUS PENDING (Topup & PPOB)
                                    if(data.status === 'PENDING') {
                    if(data.is_po === true) {
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
                    } else if (data.provider === 'WZ' || (data.trx_id && String(data.trx_id).toLowerCase().startsWith('wz'))) {
                        if(window.monitorWzTrx && !window['monitor_'+idDoc]) {
                            window['monitor_'+idDoc] = true;
                            window.monitorWzTrx(data.trx_id, idDoc);
                        }
                    } else if (data.provider !== 'KHFY') {
                        // FIX: Cek Transaksi Umum (JANGAN CEK KHFY DISINI)
                        if(window.cekStatusBerkala) window.cekStatusBerkala(idDoc, data.trx_id, data.tujuan, data.kode_produk);
                    } else {
                        // FIX: Aktifkan monitoring Khfy jika halaman direfresh (Single Instance)
                        if(window.monitorKhfyTrx && !window['monitor_'+idDoc]) {
                            window['monitor_'+idDoc] = true;
                            window.monitorKhfyTrx(data.trx_id, idDoc);
                        }
                    }
                }
                let waktuStr = data.timestamp ? data.timestamp.toDate().toLocaleTimeString('id-ID').slice(0,5) : "";
                const dataString = encodeURIComponent(JSON.stringify({idDoc, ...data, waktu: waktuStr}));
    
                let iconClass = "fa-receipt";
                let pLower = (data.produk || "").toLowerCase();
                if(pLower.includes("pulsa") || pLower.includes("telkomsel") || pLower.includes("indosat")) iconClass = "fa-mobile-alt";
                else if(pLower.includes("pln") || pLower.includes("token")) iconClass = "fa-bolt";
                else if(pLower.includes("dana") || pLower.includes("gopay") || pLower.includes("ovo") || pLower.includes("shopee")) iconClass = "fa-wallet";
                else if(pLower.includes("game") || pLower.includes("diamond") || pLower.includes("ff")) iconClass = "fa-gamepad";
    
                                    html += `<div class="history-card" id="card-${idDoc}">
                    <div class="area-chk-masal" style="display:none; margin-right:12px;">
                        <input type="checkbox" class="chk-masal" value="${encodeURIComponent(JSON.stringify(data))}" onchange="updateButtonMasal()" style="transform:scale(1.3); accent-color:var(--primary);">
                    </div>
                    <div style="flex:1; display:flex; align-items:center; width:100%;" onclick="if(!window.isModeMasal) bukaDetailRiwayat('${dataString}')">
                        <div class="h-icon"><i class="fas ${iconClass}"></i></div>
                        <div class="h-content">
                            <div class="h-prod">${data.produk}</div>
                            <div class="h-date"><i class="far fa-clock"></i> ${waktuStr} &bull; <i class="fas fa-bullseye" style="margin-left:4px;"></i> ${data.tujuan}</div>
                        </div>
                        <div class="h-right">
                            <div class="h-price">Rp ${new Intl.NumberFormat('id-ID').format(data.harga)}</div>
                            <div class="h-badge bg-${data.status}">${data.status}</div>
                        </div>
                    </div>
                </div>`;
            });
            container.innerHTML = html || "<p style='text-align:center;font-size:11px;color:#999;padding:10px;'>Belum ada transaksi.</p>";
        });
    }
    
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
                        toDelete.push(d.ref);
                    }
                });
                
                if (toArchive.length > 0) {
                    fetch('api_riwayat.php?action=arsip_masal', {
                        method: 'POST',
                        headers: {'Content-Type': 'application/json'},
                        body: JSON.stringify({ uid: uid, data: toArchive })
                    }).then(res => res.json()).then(resData => {
                        if(resData.status === 'success') {
                            toDelete.forEach(ref => deleteDoc(ref));
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
                
                // FIX DONIGUARD: Strict Check + Anti-Double Refund
                // Refund hanya diproses jika status lama masih PENDING dan transaksi belum pernah diberi tanda isRefunded.
                if (sOld === "PENDING" && (sNew === "GAGAL" || sNew === "EXPIRED" || sNew === "CANCELED") && !data.isRefunded) {
                    const hrg = parseInt(data.harga) || 0;
                    if (hrg > 0 && data.kode_produk !== "TOPUP") {
                        const uRef = doc(db, "users", user.uid);
                        const uSnap = await getDoc(uRef);
                        if (uSnap.exists()) {
                            const sld = (uSnap.data().saldo || 0) + hrg;
                            const refundGuardId = ((data.trx_id || idDoc) + '-REF');
    
                            // Tandai transaksi sebagai sudah direfund sebelum/bersamaan dengan laporan guard.
                            await updateDoc(trxRef, {
                                isRefunded: true,
                                refund_guard_id: refundGuardId,
                                refund_at: window.serverTimestamp ? window.serverTimestamp() : new Date()
                            });
    
                            await updateDoc(uRef, { saldo: sld });
    
                            // Kirim ID refund yang konsisten agar DoniGuard tidak mencatat refund ganda.
                            if (window.triggerDoniGuard) {
                                window.triggerDoniGuard({ 
                                    action: 'topup', 
                                    trx_id: refundGuardId, 
                                    produk: 'REFUND: ' + (data.produk || 'Trx'), 
                                    nominal: hrg, 
                                    saldo_akhir_client: sld 
                                });
                            }
                        }
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
    
                    if (d.kode_produk === "TOPUP" || (d.produk && (d.produk.toUpperCase().includes("TOPUP") || d.produk.toUpperCase().includes("DEPOSIT") || d.produk.toUpperCase().includes("SALDO")))) {
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
    const KLIKRESI_PROXY = "https://www.pandawa-digital.com/klikresi_proxy.php";
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
                    console.log("Sinkronisasi Berhasil:", masterData.length, "produk dimuat.");
                    loaderAwal.style.display = "none";
                } catch (err) {
                    alert("Sinkronisasi Gagal. Silakan periksa koneksi atau file cache server.");
                    console.error(err);
                }
            }
            window.addEventListener('DOMContentLoaded', sinkronisasiData);
    
            // CLEANER PESAN
            window.bersihkanPesan = function(txt) {
        if (!txt) return "";
        // PENGECUALIAN: Jika ini adalah pesan pengecekan saldo user (lokal), jangan diubah
        if (txt === "Saldo tidak cukup!" || txt === "Saldo tidak mencukupi." || txt === "Saldo Anda tidak mencukupi!") return txt;
    
        let m = txt; try { m = JSON.parse(txt).body_respon || txt; } catch (e) {}
        
        const lower = m.toLowerCase();
        // Filter khusus: Hanya ubah jika pesan datang dari server PROVIDER yang menandakan saldo reseller (admin) habis
        const technicalBalanceErrors = [
            "not enough balance", 
            "insufficient balance", 
            "saldo reseller tidak cukup", 
            "reseller balance",
            "saldo anda tidak cukup untuk melakukan transaksi ini"
        ];
    
        if (technicalBalanceErrors.some(err => lower.includes(err))) {
            return "Admin Belum Restok segera hubungi admin supaya cepat merestok";
        }
        
        // SENSOR KEAMANAN KHFY: Hapus URL API dan kredensial reseller
        if (m.includes("kodereseller=") || m.includes("password=")) {
            if (m.includes("#")) {
                m = m.substring(m.indexOf("#") + 1).trim();
            } else {
                m = "Transaksi Gagal dari Provider";
            }
        }
        
        // Pembersihan teks umum (angka saldo, harga, dll)
        m = m.replace(/\.?\s*Saldo\s+[\d\.,\s\-\=]+(@\d{2}:\d{2})?/gi, "").replace(/Hrg\s+[\d\.,]+/gi, "").replace(/\.?\s*Trx ke-\d+\s+gunakan format yang benar/gi, "");
        return m.trim();
    };
    
            // --- SISTEM PEMILIHAN LOKASI PINTAR PBB ---
            window.allPbbLocations = [];
            window.selectedPbbRegion = 'SEMUA';
            window.searchPbbKeyword = '';

            window.getCityInfo = function(keterangan, produk) {
                let ket = (keterangan || "").replace(/H2H/gi, "").trim();
                let cityClean = ket
                    .replace(/^(Cek|Bayar|Inquiry)\s+(Tagihan\s+)?(PBB\s+)?/i, "")
                    .replace(/^(Cek|Bayar|Inquiry)\s+/i, "")
                    .replace(/^Tagihan PBB\s+/i, "")
                    .trim();
                
                let tipe = "KABUPATEN";
                if (cityClean.toUpperCase().startsWith("KOTA ")) tipe = "KOTA";
                else if (cityClean.toUpperCase().startsWith("KAB ") || cityClean.toUpperCase().startsWith("KABUPATEN ")) tipe = "KABUPATEN";
                else if (cityClean.toUpperCase().includes("DKI") || cityClean.toUpperCase().includes("PROVINSI")) tipe = "PROVINSI";
                
                let regionClean = "Wilayah Lainnya";
                let prod = (produk || "").toUpperCase();
                if (prod.includes("SUMATERA")) regionClean = "Sumatera";
                else if (prod.includes("RIAU")) regionClean = "Riau & Kep. Riau";
                else if (prod.includes("JABAR") || prod.includes("BANTEN") || prod.includes("JAKARTA")) regionClean = "DKI, Jabar & Banten";
                else if (prod.includes("JAWA TENGAH")) regionClean = "Jawa Tengah & DIY";
                else if (prod.includes("JAWA TIMUR")) regionClean = "Jawa Timur";
                else if (prod.includes("KALIMANTAN")) regionClean = "Kalimantan";
                else if (prod.includes("SULAWESI")) regionClean = "Sulawesi";
                else if (prod.includes("BALI")) regionClean = "Bali";
                else if (prod.includes("NTB")) regionClean = "Nusa Tenggara Barat";
                else if (prod.includes("NTT")) regionClean = "Nusa Tenggara Timur";
                else if (prod.includes("PAPUA")) regionClean = "Papua";
                
                return { cityClean, tipe, regionClean };
            };

            window.switchPbbRegion = function(regionName) {
                window.selectedPbbRegion = regionName;
                window.renderPbbLocationsOnly();
            };

            window.filterPbbSmart = function(keyword) {
                window.searchPbbKeyword = keyword.toLowerCase().trim();
                window.renderPbbLocationsOnly();
            };

            window.renderPbbSystem = function() {
                const listArea = document.getElementById('listProdukArea');
                if (!listArea) return;
                
                const regions = ['SEMUA', 'DKI, Jabar & Banten', 'Jawa Tengah & DIY', 'Jawa Timur', 'Sumatera', 'Riau & Kep. Riau', 'Kalimantan', 'Sulawesi', 'Bali', 'Nusa Tenggara Barat', 'Nusa Tenggara Timur', 'Papua'];
                
                let htmlHeader = `
                <div class="pbb-header-box">
                    <div style="font-size: 11px; font-weight: 800; text-transform: uppercase; letter-spacing: 1px; opacity: 0.9; margin-bottom: 4px;"><i class="fas fa-landmark"></i> Pajak Bumi & Bangunan (PBB)</div>
                    <div style="font-size: 18px; font-weight: 900; line-height: 1.3;">Sistem Pemilihan Lokasi Pintar</div>
                    <div style="font-size: 12px; opacity: 0.85; margin-top: 4px;">Cek & bayar tagihan PBB dari 160+ Kota/Kabupaten se-Indonesia secara mudah & real-time.</div>
                </div>
                
                <div class="pbb-search-box">
                    <input type="text" id="pbbSearchInput" class="pbb-search-input" placeholder="🔍 Cari Kota/Kabupaten (contoh: Surabaya, Bogor, Medan)..." oninput="window.filterPbbSmart(this.value)">
                    <i class="fas fa-search"></i>
                </div>
                
                <div class="pbb-region-tabs" id="pbbRegionTabs">
                    ${regions.map(r => `<div class="pbb-region-tab ${r === window.selectedPbbRegion ? 'active' : ''}" onclick="window.switchPbbRegion('${r}')">${r === 'SEMUA' ? '🌐 Semua Wilayah (' + window.allPbbLocations.length + ')' : r}</div>`).join('')}
                </div>
                
                <div id="pbbCardsContainer"></div>
                `;
                
                listArea.innerHTML = htmlHeader;
                window.renderPbbLocationsOnly();
            };

            window.renderPbbLocationsOnly = function() {
                const container = document.getElementById('pbbCardsContainer');
                if (!container) return;
                
                document.querySelectorAll('.pbb-region-tab').forEach(tab => {
                    if (tab.innerText.includes(window.selectedPbbRegion) || (window.selectedPbbRegion === 'SEMUA' && tab.innerText.includes('Semua Wilayah'))) {
                        tab.classList.add('active');
                    } else {
                        tab.classList.remove('active');
                    }
                });
                
                let filtered = window.allPbbLocations.filter(loc => {
                    let matchRegion = window.selectedPbbRegion === 'SEMUA' || loc.regionClean === window.selectedPbbRegion;
                    let matchSearch = !window.searchPbbKeyword || loc.cityClean.toLowerCase().includes(window.searchPbbKeyword) || loc.keterangan.toLowerCase().includes(window.searchPbbKeyword) || loc.regionClean.toLowerCase().includes(window.searchPbbKeyword);
                    return matchRegion && matchSearch;
                });
                
                if (filtered.length === 0) {
                    container.innerHTML = `
                    <div style="text-align:center; padding: 40px 20px; background: #f8fafc; border-radius: 20px; border: 1.5px dashed #cbd5e1; margin-top: 10px;">
                        <i class="fas fa-search-location" style="font-size: 45px; color: #94a3b8; margin-bottom: 12px;"></i>
                        <div style="font-weight: 800; font-size: 15px; color: #334155;">Lokasi Tidak Ditemukan</div>
                        <div style="font-size: 12px; color: #64748b; margin-top: 4px;">Coba gunakan kata kunci kota lain atau pilih tab 'Semua Wilayah'.</div>
                    </div>`;
                    return;
                }
                
                if (window.selectedPbbRegion === 'SEMUA' && !window.searchPbbKeyword) {
                    const groupOrder = ['DKI, Jabar & Banten', 'Jawa Tengah & DIY', 'Jawa Timur', 'Sumatera', 'Riau & Kep. Riau', 'Kalimantan', 'Sulawesi', 'Bali', 'Nusa Tenggara Barat', 'Nusa Tenggara Timur', 'Papua', 'Wilayah Lainnya'];
                    let htmlGrouped = "";
                    
                    groupOrder.forEach(reg => {
                        let locsInGroup = filtered.filter(l => l.regionClean === reg);
                        if (locsInGroup.length === 0) return;
                        
                        htmlGrouped += `<div class="pbb-section-title"><i class="fas fa-map-pin" style="color:var(--primary);"></i> Wilayah ${reg} <span style="font-size:11px; font-weight:700; color:#64748b; background:#f1f5f9; padding:2px 8px; border-radius:100px;">${locsInGroup.length} Lokasi</span></div>`;
                        htmlGrouped += `<div class="pbb-grid">`;
                        locsInGroup.forEach(loc => {
                            let badgeClass = loc.tipe === 'KOTA' ? 'badge-kota' : (loc.tipe === 'KABUPATEN' ? 'badge-kabupaten' : 'badge-provinsi');
                            htmlGrouped += `
                            <div class="pbb-card" onclick="siapkanInvoice('${loc.kode}', '${loc.namaProduk.replace(/'/g, "\'")}', ${loc.hargaFinal})">
                                <div class="pbb-icon-badge"><i class="fas fa-file-invoice-dollar"></i></div>
                                <div class="pbb-info">
                                    <div class="pbb-city-name" title="${loc.cityClean}">${loc.cityClean}</div>
                                    <div class="pbb-city-meta">
                                        <span class="pbb-badge ${badgeClass}">${loc.tipe}</span>
                                        <span>• Cek & Bayar</span>
                                    </div>
                                </div>
                                <i class="fas fa-chevron-right pbb-arrow"></i>
                            </div>`;
                        });
                        htmlGrouped += `</div>`;
                    });
                    container.innerHTML = htmlGrouped;
                    return;
                }
                
                let htmlGrid = `<div class="pbb-section-title"><i class="fas fa-list-ul" style="color:var(--primary);"></i> Menampilkan ${filtered.length} Lokasi PBB</div>`;
                htmlGrid += `<div class="pbb-grid">`;
                filtered.forEach(loc => {
                    let badgeClass = loc.tipe === 'KOTA' ? 'badge-kota' : (loc.tipe === 'KABUPATEN' ? 'badge-kabupaten' : 'badge-provinsi');
                    htmlGrid += `
                    <div class="pbb-card" onclick="siapkanInvoice('${loc.kode}', '${loc.namaProduk.replace(/'/g, "\'")}', ${loc.hargaFinal})">
                        <div class="pbb-icon-badge"><i class="fas fa-file-invoice-dollar"></i></div>
                        <div class="pbb-info">
                            <div class="pbb-city-name" title="${loc.cityClean}">${loc.cityClean}</div>
                            <div class="pbb-city-meta">
                                <span class="pbb-badge ${badgeClass}">${loc.tipe}</span>
                                <span style="font-size:10px; color:#94a3b8;">${loc.regionClean}</span>
                            </div>
                        </div>
                        <i class="fas fa-chevron-right pbb-arrow"></i>
                    </div>`;
                });
                htmlGrid += `</div>`;
                container.innerHTML = htmlGrid;
            };

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
                else if (kategori === 'PBB') {
                    filtered = masterData.filter(i => 
                        (i.kategori && i.kategori.toUpperCase().includes('PBB')) || 
                        (i.produk && i.produk.toUpperCase().includes('PBB'))
                    );
                    dataMentah = filtered;
                    document.getElementById('inputContainer').style.display = "none";
                    document.getElementById('areaFilter').style.display = "none";
                    document.getElementById('listProdukArea').style.display = "block";
                    document.getElementById('btnKembali').style.display = "none";
                    
                    const config = window.markupConfig || {};
                    window.allPbbLocations = [];
                    window.selectedPbbRegion = 'SEMUA';
                    window.searchPbbKeyword = '';
                    
                    filtered.forEach(item => {
                        if (item.status !== "1") return;
                        const k = item.kode;
                        const hiddenPrefixes = ['BPAM','BPBB','BHOME','BKPR','BKK','BFNC','BYR','PAY','BSAM','BPLA','BNTPLA','BTEL','BBPJS','BCOMET','BCENTRIN','BMST','BTV'];
                        if(k === 'CPLN' || k === 'FLAZZ2200' || (item.produk||'').toUpperCase().includes('CEK NAMA') || hiddenPrefixes.some(p => k.startsWith(p))) return;
                        
                        let rawM = config[item.kode] !== undefined ? config[item.kode] : (config[item.produk] !== undefined ? config[item.produk] : config['General']);
                        let markupFinal = window.getMarkupValue(rawM, parseInt(item.harga));
                        let hargaFinal = parseInt(item.harga) + markupFinal;
                        const checkPrefixes = ['CPAM','CPBB','CEK','INQ','CHOME','CKPR','CKK','CFNC','CSAM','CPLA','CNTPLA','CTEL','CBPJS','CCOMET','CCENTRIN','CMST'];
                        if (checkPrefixes.some(p => k.startsWith(p))) hargaFinal = 0;
                        
                        let namaProduk = item.keterangan.replace(/H2H/gi, "").trim();
                        if (namaProduk.match(/^(Cek|CEK|Inquiry|INQUIRY)\s/)) {
                            namaProduk = namaProduk.replace(/^(Cek|CEK|Inquiry|INQUIRY)\s+/i, "Cek & Bayar ");
                        }
                        
                        let { cityClean, tipe, regionClean } = window.getCityInfo(item.keterangan, item.produk);
                        
                        window.allPbbLocations.push({
                            kode: item.kode,
                            namaProduk: namaProduk,
                            hargaFinal: hargaFinal,
                            keterangan: item.keterangan,
                            produk: item.produk || "Tagihan PBB",
                            cityClean: cityClean,
                            tipe: tipe,
                            regionClean: regionClean
                        });
                    });
                    
                    window.allPbbLocations.sort((a, b) => a.cityClean.localeCompare(b.cityClean));
                    window.renderPbbSystem();
                    return;
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
    
        window.renderFilterGroups = function() {
            let area = document.getElementById('areaFilter');
            if(window.isListModeContext) {
                area.style.display = "block"; area.style.gridTemplateColumns = "none";
            } else {
                area.style.display = "grid"; area.style.gridTemplateColumns = "repeat(3, 1fr)";
            }
    
            const specialIcons = { 'Telkomsel': 'icons/Telkomsel.png', 'Indosat': 'icons/Indosat.png', 'By.U': 'icons/By.U.png', 'XL': 'icons/XL.png', 'PBB': 'icons/PBB.png', 'Pascabayar': 'icons/TV & Halo.png', 'Axis': 'icons/Axis.png', 'Tri': 'icons/Tri.png', 'Smartfren': 'icons/Smartfren.png', 'Cetak Voucher': 'icons/Voucher.png', 'Token PLN': 'icons/Token PLN.png' };
    
            let cleanProviders = [];
            window.currentProvidersData.forEach(p => {
                if(p === 'BAYAR PLN DIRECT' || p === 'PLN PRODUK DIRECT' || p === 'Byu Promo Menarik' || p === '+Masa Aktif Indosat') return;
                let clean = p.replace(/H2H/gi, "").replace(/Top\s*Up\s*Saldo\s*/gi, "").replace(/Saldo\s*/gi, "").replace("Customer", "").replace("Driver", "").replace("Penumpang", "").replace(/Admin\s*/gi, "").replace(/\s*\/\s*/g, " ").replace(/\s+/g, " ").trim();
                cleanProviders.push({ original: p, clean: clean });
            });
    
            let groups = {};
            cleanProviders.forEach(p => {
                let words = p.clean.split(" ");
                let groupKey = words[0]; 
                if ((words[0].toUpperCase() === "CETAK" || words[0].toUpperCase() === "PAKET") && words.length > 1) groupKey = words[0] + " " + words[1];
                if (!groups[groupKey]) groups[groupKey] = [];
                groups[groupKey].push(p);
            });
    
            let html = "";
            for (let key in groups) {
                let items = groups[key];
                let isGroup = items.length > 1;
                
                let displayName = isGroup ? key : items[0].clean;
                let logoUrl = specialIcons[window.currentMenuContext] ? specialIcons[window.currentMenuContext] : 'icons/' + displayName + '.png';
                let imgTag = '<img src="' + logoUrl + '" onerror="this.onerror=null; this.src=\'https://via.placeholder.com/50?text=' + displayName.charAt(0) + '\';">';
    
                if (isGroup) {
                    let onClickAction = "window.renderSubFilter('" + key + "')";
                    if (window.isListModeContext) {
    html += '<div class="filter-card-list" onclick="' + onClickAction + '">';
    html += imgTag;
    html += '<span style="font-weight:800; color:var(--primary);">' + displayName + ' <span style="font-size:10px; background:#e2e8f0; color:#475569; padding:2px 6px; border-radius:10px; margin-left:5px;">' + items.length + ' Item</span></span>';
    html += '<i class="fas fa-folder" style="color:#f59e0b; font-size:16px;"></i>';
    html += '</div>';
                    } else {
    html += '<div class="filter-card" onclick="' + onClickAction + '" style="background:#fffbeb; border-color:#fde68a;">';
    html += '<i class="fas fa-folder" style="font-size:28px; color:#f59e0b; margin-bottom:6px;"></i>';
    html += '<span style="color:#d97706; font-weight:800;">' + displayName + '</span>';
    html += '</div>';
                    }
                } else {
                    let providerStr = items[0].original;
                    let onClickAction = "window.filterTampilan('" + providerStr + "', this)";
                    if (window.isListModeContext) {
    html += '<div class="filter-card-list" onclick="' + onClickAction + '">';
    html += imgTag;
    html += '<span>' + displayName + '</span>';
    html += '<i class="fas fa-chevron-right"></i>';
    html += '</div>';
                    } else {
    html += '<div class="filter-card" data-provider="' + providerStr + '" onclick="' + onClickAction + '">';
    html += imgTag;
    html += '<span>' + displayName + '</span>';
    html += '</div>';
                    }
                }
            }
            area.innerHTML = html;
        };
    
        window.renderSubFilter = function(groupKey) {
            let area = document.getElementById('areaFilter');
            const specialIcons = { 'Telkomsel': 'icons/Telkomsel.png', 'Indosat': 'icons/Indosat.png', 'By.U': 'icons/By.U.png', 'XL': 'icons/XL.png', 'PBB': 'icons/PBB.png', 'Pascabayar': 'icons/TV & Halo.png', 'Axis': 'icons/Axis.png', 'Tri': 'icons/Tri.png', 'Smartfren': 'icons/Smartfren.png', 'Cetak Voucher': 'icons/Voucher.png', 'Token PLN': 'icons/Token PLN.png' };
    
            let cleanProviders = [];
            window.currentProvidersData.forEach(p => {
                if(p === 'BAYAR PLN DIRECT' || p === 'PLN PRODUK DIRECT' || p === 'Byu Promo Menarik' || p === '+Masa Aktif Indosat') return;
                let clean = p.replace(/H2H/gi, "").replace(/Top\s*Up\s*Saldo\s*/gi, "").replace(/Saldo\s*/gi, "").replace("Customer", "").replace("Driver", "").replace("Penumpang", "").replace(/Admin\s*/gi, "").replace(/\s*\/\s*/g, " ").replace(/\s+/g, " ").trim();
                let words = clean.split(" ");
                let gKey = words[0];
                if ((words[0].toUpperCase() === "CETAK" || words[0].toUpperCase() === "PAKET") && words.length > 1) gKey = words[0] + " " + words[1];
                if (gKey === groupKey) cleanProviders.push({ original: p, clean: clean });
            });
    
            let html = '<div onclick="window.renderFilterGroups()" style="grid-column: 1 / -1; background:#f1f5f9; padding:10px 15px; border-radius:12px; cursor:pointer; display:flex; align-items:center; gap:10px; margin-bottom:10px; font-weight:bold; color:var(--primary); border:1px solid #cbd5e1;">';
            html += '<i class="fas fa-arrow-left"></i> Kembali (Kategori ' + groupKey + ')';
            html += '</div>';
    
            cleanProviders.forEach((item, index) => {
                let displayName = item.clean;
                let providerStr = item.original;
                let logoUrl = specialIcons[window.currentMenuContext] ? specialIcons[window.currentMenuContext] : 'icons/' + displayName + '.png';
                let imgTag = '<img src="' + logoUrl + '" onerror="this.onerror=null; this.src=\'https://via.placeholder.com/50?text=' + displayName.charAt(0) + '\';">';
    
                let onClickAction = "window.filterTampilan('" + providerStr + "', this)";
                if (window.isListModeContext) {
                    html += '<div class="filter-card-list" onclick="' + onClickAction + '">';
                    html += imgTag;
                    html += '<span>' + displayName + '</span>';
                    html += '<i class="fas fa-chevron-right"></i>';
                    html += '</div>';
                } else {
                    html += '<div class="filter-card" id="filter-sub-' + index + '" data-provider="' + providerStr + '" onclick="' + onClickAction + '">';
                    html += imgTag;
                    html += '<span>' + displayName + '</span>';
                    html += '</div>';
                }
            });
            
            area.innerHTML = html;
            const listArea = document.getElementById('listProdukArea');
            const inputCont = document.getElementById('inputContainer');
            if(listArea) { listArea.innerHTML = ""; listArea.style.display = "none"; }
            if(inputCont) inputCont.style.display = "none";
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
    
                if(areaFilter) areaFilter.style.display = "none";
                if(btnKembali) btnKembali.style.display = "block";
                
                    if (judulMenu === "E-Wallet" || judulMenu === "Bebas Nominal Uang Elektronik" || judulMenu === "Token PLN") {
                    if(inputContainer) inputContainer.style.display = "none";
                } else {
                    if(inputContainer) inputContainer.style.display = "block";
                }
    
                if(areaList) areaList.style.display = "block";
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
    let prov = btn.getAttribute('data-provider').toLowerCase();
    let isMatch = allowed.some(key => prov.includes(key.toLowerCase()));
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
    
    
                    window.siapkanInvoice = function(kode, nama, harga) {
                const judulMenu = document.getElementById('judulMenu').innerText;
                let isPbb = (judulMenu === "PBB" || judulMenu === "Tagihan PBB" || kode.startsWith("CPBB") || kode.startsWith("BPBB") || (nama||"").toUpperCase().includes("PBB"));
                if (judulMenu !== "E-Wallet" && judulMenu !== "Bebas Nominal Uang Elektronik" && judulMenu !== "Token PLN" && !isPbb) {
                    const hp = document.getElementById('nomorHP').value;
                    if(!hp) return window.showNotice('error', 'Gagal', 'Nomor HP/ID Pelanggan wajib diisi!');
                }
    
                let isBebasNominal = (nama.toLowerCase().includes('bebas nominal') || kode === 'BBSDN');
                
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
        <div style="font-size: 11px; color: #95a5a6; text-transform: uppercase; letter-spacing: 1px;">Konfirmasi Pesanan</div>
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
        <label style="font-size: 10px; font-weight: 700; color: var(--primary); display: block; margin-bottom: 8px; text-transform: uppercase;">${isPbb ? 'Nomor Objek Pajak (NOP) / ID Pelanggan PBB' : 'Nomor Tujuan / ID Pelanggan'}</label>
        <div class="input-group" style="margin-bottom: 0;">
            <input type="tel" inputmode="numeric" id="invoiceNomorHP" class="form-input" placeholder="${isPbb ? 'Contoh: 3578xxxxxxxxxxxxxxxx (18 digit NOP)' : 'Contoh: 0812xxxx'}" oninput="window.debounceCekNama('${providerKey}')" style="background: white; border: 2px solid #e1effe; padding-right: 70px;">
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
                
        if(judulMenu !== "E-Wallet" && judulMenu !== "Token PLN") {
                    if (!isPbb || document.getElementById('nomorHP').value) {
                        document.getElementById('invoiceNomorHP').value = document.getElementById('nomorHP').value;
                        setTimeout(() => window.debounceCekNama(providerKey), 500);
                    }
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
                    window.showNotice('error', 'Sistem Error', 'Gagal menghubungkan ke server.');
                }
            }
    
            window.cekStatusBerkala = function(idDoc, trxId, tujuan, kode) {
                if(intervalCek[idDoc]) return;
                intervalCek[idDoc] = setInterval(async () => {
                    try {
    const res = await fetch('cek_status.php', { method: 'POST', body: JSON.stringify({ refID: trxId, tujuan: tujuan, kode_produk: kode }) });
    const json = await res.json();
    if(json.status !== "PENDING") { clearInterval(intervalCek[idDoc]); window.updateFirestoreStatus(idDoc, json.status, window.bersihkanPesan(json.sn), JSON.stringify(json)); }
                    } catch(e) {}
                }, 10000); 
            }
    
    
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
            if(window.kirimNotifTelegram) window.kirimNotifTelegram('topup', { harga: nominal, username: userSnap.exists() ? (userSnap.data().username || 'User') : 'User', trx_id: 'QRIS-' + idDoc });
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
                                                                                                                                                        try {
                const uName = userSnap.exists() ? (userSnap.data().username || 'User') : 'User';
                const tgNow = new Date();
                const tgDateStr = `${tgNow.getDate()}/${tgNow.getMonth()+1}/${tgNow.getFullYear()} ${tgNow.getHours().toString().padStart(2,'0')}:${tgNow.getMinutes().toString().padStart(2,'0')}`;
                const tgMsg = `✅ *TOPUP SALDO BERHASIL*\n━━━━━━━━━━━━━━━━━━\n👤 User: ${uName}\n📧 Email: ${user.email}\n💰 Jumlah: Rp ${new Intl.NumberFormat('id-ID').format(nominal)}\n🆔 Trx ID: ${uniqueCode}\n🕒 Waktu: ${tgDateStr}\n━━━━━━━━━━━━━━━━━━\n🏢 Pandawa-Digital\n🌐 https://www.pandawa-digital.com`;
                
                fetch("https://api.telegram.org/bot8659828786:AAGvN2hYGOBVvytFULdb7_v_hOCFDGOO7VA/sendMessage", {
                    method: "POST",
                    headers: { "Content-Type": "application/json" },
                    body: JSON.stringify({
                        chat_id: "-1003897469545",
                        text: tgMsg,
                        parse_mode: "Markdown"
                    })
                });
            } catch(etg) { console.log('TeleErr', etg); }
            window.showNotice('success', 'Topup Berhasil', 'Saldo Rp '+new Intl.NumberFormat('id-ID').format(nominal)+' Masuk.');
        }
    } else if(res.success && (res.data.status === "Canceled" || res.data.status === "Expired")) {
        clearInterval(intervalCek[idDoc]);
        delete intervalCek[idDoc];
        window.updateFirestoreStatus(idDoc, "GAGAL", "Pembayaran Expired/Batal");
    }
                    } catch(e) {} 
                }, 10000); 
            }
    
                    window.kembaliKeFilter = function() {
                let area = document.getElementById('areaFilter');
                if(window.isListModeContext) {
                    area.style.display = "block";
                } else {
                    area.style.display = "grid";
                }
                const inputContainer = document.getElementById('inputContainer');
                if (inputContainer) inputContainer.style.display = "none";
                const listArea = document.getElementById('listProdukArea');
                if (listArea) { listArea.innerHTML = ""; listArea.style.display = "none"; }
                const btn = document.getElementById('btnKembali');
                if (btn) btn.style.display = "none";
                document.querySelectorAll('.filter-card, .filter-card-list').forEach(b => b.classList.remove('active'));
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
                document.getElementById('shop-container').style.display = 'none';
                document.getElementById('btnMoreContainer').style.display = 'none';
                document.querySelector('.history-container').style.display = 'none';
                document.getElementById('liveHistoryHeader').style.display = 'none'; // Fix: Sembunyikan Header Riwayat
                document.querySelectorAll('.full-page').forEach(p => p.style.display = 'none');
    
                // Tampilkan Judul Header Menu Utama Khusus di Home
                const mainHeaderElements = [document.querySelector('.header'), document.querySelector('.saldo-box'), document.querySelector('.menu-container'), document.getElementById('shop-container'), document.getElementById('btnMoreContainer'), document.querySelector('.history-container')];
    
                if(menu === 'home') {
                    mainHeaderElements.forEach(e => { if(e) e.style.display = 'block'; });
                    document.querySelector('.saldo-box').style.display = 'flex'; 
                    document.getElementById('shop-container').style.display = 'grid';
                    document.getElementById('liveHistoryHeader').style.display = 'flex'; // Fix: Tampilkan kembali di Home
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
                if(confirm("Hapus barang ini?")) await window.deleteDoc(window.doc(window.db, "produk", id));
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
                    
                    // Sinkronisasi Sesi LocalStorage jika ditekan dari riwayat
                    localStorage.setItem('pending_topup', JSON.stringify({
    docId: d.idDoc, nominal: d.harga, method: window.selectedTopupMethod, timestamp: new Date().getTime()
                    }));
                    
                    document.getElementById('modalTopup').style.display = "flex";
                    window.renderTopupStep(4, d.harga);
                    return;
                }
    
                const modal = document.getElementById('modalDetailRiwayat');
                
                // Config Icon & Color
                let icon = "fa-check"; let color = "var(--success)"; let statusText = "Transaksi Berhasil";
                if(d.status === "PENDING") { icon = "fa-clock"; color = "var(--warning)"; statusText = "Menunggu Pembayaran"; }
                else if(d.status === "GAGAL") { icon = "fa-times"; color = "var(--danger)"; statusText = "Transaksi Gagal"; }
                
                // 1. Parsing SN
                let snContent = window.bersihkanPesan(d.sn);
                if(!snContent || snContent === 'undefined') snContent = "-";
    
                let isPaymentLink = snContent.startsWith('http');
                let displaySnContent = isPaymentLink ? 'Menunggu Pembayaran...' : snContent;
    
                // 2. Ekstraksi Kode Voucher (Cari angka 12-25 digit dalam SN)
                let matchVoucher = snContent.match(/(\d{12,25})/);
                let kodeVoucher = matchVoucher ? matchVoucher[0] : null;
                let htmlKodeVoucher = "";
                let htmlInfoPLN = "";
    
                // MODIFIKASI: Tampilan Khusus Token PLN (Parser SN)
                let isPLN = (d.produk.toUpperCase().includes('PLN') || d.produk.toUpperCase().includes('TOKEN') || (d.sn && d.sn.toUpperCase().includes('KWH')));
                if ((d.status === 'BERHASIL' || d.status === 'Sukses') && isPLN) {
                    let cleanSN = window.bersihkanPesan(d.sn).replace(/SN\s*\/\s*Ref[\s\:]*/gi, '').trim();
                    // Format: TOKEN/NAMA/TARIF/DAYA/KWH
                    let parts = cleanSN.split('/');
                    let matchToken = cleanSN.match(/(?:\d[\s-]*){20}/);
                    if (matchToken || parts.length >= 2) {
    // matchToken moved to outer scope
    let token = matchToken ? matchToken[0].trim() : parts[0].trim();
    let nama = parts[1] ? parts[1].trim() : '-';
    // Ambil sisa bagian (Tarif/Daya) dan bersihkan pesan error/warning setelah tanda titik
    let volt = parts.slice(2).join('/').split(' . ')[0].trim();
    
    htmlInfoPLN = `<div style="background:#f0f9ff; border:1px solid #b3e5fc; padding:8px; border-radius:10px; margin-bottom:10px; margin-top:5px;">
        <div style="font-size:10px; font-weight:bold; color:#0099ff; margin-bottom:4px; border-bottom:1px dashed #b3e5fc; padding-bottom:2px;"><i class="fas fa-bolt"></i> INFO TOKEN PLN</div>
        <div style="display:grid; grid-template-columns: 60px 1fr; gap:2px; font-size:10px; margin-bottom:2px;">
            <span style="color:#666;">Nama:</span><b style="color:#333;">${nama}</b>
        </div>
        <div style="display:grid; grid-template-columns: 60px 1fr; gap:2px; font-size:10px; margin-bottom:4px;">
            <span style="color:#666;">Volt:</span><b style="color:#333;">${volt}</b>
        </div>
        <div style="background:white; border:1px solid #e1effe; padding:5px; border-radius:6px; text-align:center;">
            <div style="font-size:9px; color:#888;">TOKEN</div>
            <div style="font-size:16px; font-weight:900; color:#333; letter-spacing:1.5px; user-select:all;">${token}</div>
        </div>
    </div>`;
                    }
                }
                let htmlTutorial = "";
    
                    // --- LOGIKA DETEKSI VOUCHER (MODE KETAT) ---
                const namaP = (d.produk || "").toLowerCase();
                
                // MODIF: Matikan tutorial cara pakai khusus Paket Akrab/KHFY
                const isPaketAkrab = (d.provider === 'KHFY') || namaP.includes('akrab') || namaP.includes('fmx') || namaP.includes('xla') || namaP.includes('xda');
    
                if((d.status === 'BERHASIL' || d.status === 'Sukses') && !isPaketAkrab) {
                    let prefix = "";
                    let isVoucher = false;
    
                    // 1. Deteksi Provider (Hanya set prefix, jangan set isVoucher dulu)
                    if(namaP.includes('telkomsel') || namaP.includes('tsel') || namaP.includes('by.u') || namaP.includes('simpati') || namaP.includes('loop') || namaP.includes('omn') || namaP.includes('kartu as')) prefix = "*133*";
                    else if(namaP.includes('indosat') || namaP.includes('isat') || namaP.includes('freedom') || namaP.includes('yellow') || namaP.includes('unli') || namaP.includes('data jumbo') || namaP.includes('mini') || namaP.includes('im3')) prefix = "*556*";
                    else if(namaP.includes('xl') || namaP.includes('hotrod') || namaP.includes('flex') || namaP.includes('bebas puas') || namaP.includes('harian') || namaP.includes('mingguan') || namaP.includes('akrab') || namaP.includes('xtra') || (namaP.includes('act vocer') && namaP.includes(','))) prefix = "*817*";
                    else if(namaP.includes('axis') || namaP.includes('aigo') || namaP.includes('bronet') || namaP.includes('combo') || namaP.includes('mini data') || namaP.includes('owl') || namaP.includes('warnet')) prefix = "*838*";
                    else if(namaP.includes('tri') || namaP.includes('three') || namaP.includes('aon') || namaP.includes('happy') || namaP.includes('kuota voucher') || namaP.includes('janet') || namaP.includes('cinta') || namaP.includes('pamax')) prefix = "*111*";
                    else if(namaP.includes('smart') || namaP.includes('smf') || namaP.includes('nonstop') || namaP.includes('super kuota') || namaP.includes('gokil') || namaP.includes('volume')) prefix = "*999*";
    
                    // 2. VALIDASI KETAT: isVoucher hanya TRUE jika ada kata kunci ini
                    if (prefix) {
    const kwWajib = ["voucher", "vcr", "voc", "fisik", "gesek", "cetak", "aigo", "perdana", "kpk", "scratch"];
    if (kwWajib.some(k => namaP.includes(k))) {
        isVoucher = true;
    }
                    }
    
                    // Jika terdeteksi sebagai voucher
                    if(isVoucher) {
    // A. Jika Kode Voucher DITEMUKAN di SN
    if(kodeVoucher) {
        // Tampilkan Kode Voucher di bawah ID
        htmlKodeVoucher = `<div class="detail-item" style="background:#f0f9ff; padding:8px 10px; border-radius:8px; border:1px dashed #0066b2; margin-bottom:10px;"><span style="font-weight:bold; color:#0066b2;">Kode Voucher</span><span class="detail-val" style="font-family:monospace; font-size:15px; font-weight:800; color:#333; letter-spacing:1px;">${kodeVoucher}</span></div>`;
        
        // Tutorial Spesifik (Kode Lengkap + Tombol Salin)
        let fullDial = `${prefix}${kodeVoucher}#`;
        htmlTutorial = `
        <div style="background:#fff8e1; color:#d35400; padding:12px; border-radius:12px; font-size:12px; margin-top:15px; border:1px solid #f39c12;">
            <div style="margin-bottom:8px; font-weight:bold; font-size:13px;"><i class="fas fa-lightbulb"></i> Cara Pakai Voucher</div>
            <div style="font-family:monospace; font-size:14px; font-weight:bold; color:#333; margin-bottom:10px; background:white; padding:8px; border-radius:6px; border:1px solid #ddd; text-align:center;">Ketik ${fullDial}</div>
            <button onclick="navigator.clipboard.writeText('${fullDial}'); alert('Kode Dial Disalin!')" style="width:100%; background:#d35400; border:none; color:white; padding:10px; border-radius:8px; font-weight:bold; cursor:pointer;">
                <i class="far fa-copy"></i> Salin Kode Dial
            </button>
        </div>`;
    } 
    // B. Jika Kode TIDAK DITEMUKAN (Fallback ke tutorial umum)
    else {
        htmlTutorial = `<div style="background:#fff8e1; color:#d35400; padding:10px; border-radius:8px; font-size:12px; margin-top:10px; text-align:center; border:1px dashed #f39c12; line-height:1.4;">
            <i class="fas fa-info-circle"></i> Cara Pakai: Ketik <b>${prefix}KodeSN#</b> lalu Panggil
        </div>`;
    }
                    }
                }
    
                let html = `
                    <div class="receipt-header">
    <div class="receipt-icon" style="background:${color}"><i class="fas ${icon}"></i></div>
    <div class="receipt-status" style="color:${color}">${statusText}</div>
    <div style="font-size:12px; color:#999; margin-top:5px;">${d.waktu}</div>
                    </div>
                    
                    <div style="text-align:center;">
    <div style="font-size:12px; color:#777; font-weight:500;">Total Pembayaran</div>
    <div class="receipt-amount">Rp ${new Intl.NumberFormat('id-ID').format(d.harga)}</div>
                    </div>
                    
                    <div class="receipt-divider"></div>
                    
                    <div class="detail-item"><span>Produk</span><span class="detail-val">${d.produk}</span></div>
                    <div class="detail-item"><span>Tujuan</span><span class="detail-val">${d.tujuan}</span></div>
                    <div class="detail-item"><span>ID Transaksi</span><span class="detail-val">#${d.trx_id || '-'}</span></div>
                    
                    ${htmlInfoPLN}
                    ${htmlKodeVoucher}
                    
                    <div style="margin-top:20px; font-size:12px; font-weight:bold; color:#555;">SN / Keterangan:</div>
                    <div class="sn-container">
    <span class="sn-text" id="snText">${displaySnContent}</span>
    ${!isPaymentLink ? `<button class="btn-copy" onclick="navigator.clipboard.writeText('${displaySnContent}'); alert('SN Disalin!')"><i class="far fa-copy"></i></button>` : ''}
                    </div>
                    ${htmlTutorial}
                `;
    
                if (isPaymentLink && d.status === 'PENDING') {
                    html += `<button class="btn-konfirmasi" style="background:#0ea5e9; margin-top:20px; width:100%; display:flex; justify-content:center; align-items:center; gap:8px; box-shadow: 0 4px 15px rgba(14, 165, 233, 0.3);" onclick="window.open('${snContent}', '_blank')"><i class="fas fa-external-link-alt"></i> Lanjutkan Pembayaran (DANA)</button>`;
                }
    
        if((d.status === "PENDING" || d.status === "Pending") && d.checkout_url) {
                    html += `
                    <button class="btn-konfirmasi" style="background:var(--primary); margin-top:20px; width:100%;" onclick="window.open('${d.checkout_url.replace('/v1/', '/v3/')}', '_blank')">Bayar Sekarang</button>
                    <button class="btn-batal" style="margin-top:10px; background:#fff5f5; color:var(--danger); border:1px solid #ffcccc;" onclick="batalkanTopup('${d.idDoc}', '${d.unique_code || d.trx_id}')">Batalkan Topup</button>`;
                }
    
                if((d.status === "PENDING" || d.status === "Pending") && d.is_po) {
                     html += `<button class="btn-batal" style="margin-top:15px; background:#fff5f5; color:var(--danger); border:1px solid #ffcccc; width:100%; font-weight:bold; padding:12px; border-radius:8px;" onclick="window.batalkanPO('${d.idDoc}', '${d.trx_id}', ${d.harga})"><i class="fas fa-times-circle"></i> Batalkan Pre-Order</button>`;
                }
    
        html += `
                <button class="btn-konfirmasi" style="margin-top:20px; background:#00b894; color:white; box-shadow: 0 4px 15px rgba(0, 184, 148, 0.3);" onclick="window.isShareMode=false; window.siapkanPrint('${str}')"><i class="fas fa-print"></i> Cetak Struk</button>
                    <button class="btn-konfirmasi" style="margin-top:10px; background:linear-gradient(135deg, #25D366, #128C7E); color:white; box-shadow: 0 4px 15px rgba(37, 211, 102, 0.3);" onclick="window.siapkanShare('${str}')"><i class="fab fa-whatsapp"></i> Bagikan</button>
                    <button class="btn-konfirmasi" style="margin-top:10px; background:var(--bg); color:#555; border:1px solid #ddd;" onclick="document.getElementById('modalDetailRiwayat').style.display='none'">Tutup</button>
                `;
                
                document.getElementById('detailRiwayatContent').innerHTML = html;
                modal.style.display = "flex";
            }
            
            let selectedService = "";
                    
            // --- LOGIKA TOPUP BARU (STEPPED UI) ---
            window.topupData = [
                { id: 'qris_auto', code: 'QRIS_AUTO', name: 'QRIS Otomatis (Cepat)', type: 'MANUAL', fee: 0, img: 'icons/qris.jpg', desc: 'Topup otomatis masuk tanpa konfirmasi (1-3 Menit)' },
                { id: 'qris_gopay', code: 'QRIS_GOPAY', name: 'QRIS GoPay (Otomatis)', type: 'INDOPAY', fee: 0, img: 'icons/Gopay.png', desc: 'Otomatis dicek sistem. Bayar SESUAI nominal unik.' },
                { id: 'gopay_tf', code: 'GOPAY_TF', name: 'Transfer GoPay (Otomatis)', type: 'INDOPAY', fee: 0, img: 'icons/Gopay.png', desc: 'Otomatis dicek sistem. Bayar SESUAI nominal unik.' }
            ];
    
            // --- SISTEM INDOPAY HELPERS ---
            window.INDOPAY_GOPAY_NUMBER = '087875705707';
            window.INDOPAY_GOPAY_NAME = 'Siti lestari';
            window.INDOPAY_STATIC_QRIS = '00020101021126610014COM.GO-JEK.WWW01189360091438792752840210G8792752840303UMI51440014ID.CO.QRIS.WWW0215ID10254475936700303UMI5204549953033605802ID5921Juragan Akrab, Grosir6011KARANGANYAR61055711162070703A016304A32F';
    
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
                if(isTimeout !== true && !confirm("Yakin ingin membatalkan topup ini?")) return;
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
    
    area.innerHTML = `
        <div class="tu-cat" onclick="window.renderTopupStep(2, 'BANK_MANUAL')"><div style="display:flex; align-items:center;"><div class="tu-icon"><i class="fas fa-university"></i></div><div><div style="font-weight:bold; font-size:14px; color:#333;">Transfer Bank Manual</div><div style="font-size:11px; color:#999;">Pilihan Transfer Bank & E-Wallet Lengkap</div></div></div><i class="fas fa-chevron-right" style="color:#ccc"></i></div>
        <div class="tu-cat" onclick="${qrisClickNew}"><div style="display:flex; align-items:center;"><div class="tu-icon" style="background: linear-gradient(135deg, #e6f9ed, #a8e6cf); color: var(--success);"><i class="fas fa-qrcode"></i></div><div><div style="font-weight:bold; font-size:14px; color:#333;">QRIS (Otomatis) ${window.maintenanceQris ? '<span style="font-size:9px; background:var(--danger); color:white; padding:2px 4px; border-radius:4px; margin-left:5px;">MT</span>' : '<span style="font-size:9px; background:var(--success); color:white; padding:2px 4px; border-radius:4px; margin-left:5px;">AUTO</span>'}</div><div style="font-size:11px; color:#999;">Saldo masuk otomatis (1-3 Menit)</div></div></div><i class="fas fa-chevron-right" style="color:#ccc"></i></div>
        <div class="tu-cat" onclick="${qrisGopayClickNew}"><div style="display:flex; align-items:center;"><div class="tu-icon" style="background: #fff; border:1px solid #eee;"><img src="icons/Gopay.png" style="width:24px; height:24px; object-fit:contain;"></div><div><div style="font-weight:bold; font-size:14px; color:#333;">QRIS GoPay ${qrisGopayBadge}</div><div style="font-size:11px; color:#999;">Dicek otomatis. Bayar SESUAI nominal unik.</div></div></div><i class="fas fa-chevron-right" style="color:#ccc"></i></div>
        <div class="tu-cat" onclick="${gopayTfClickNew}"><div style="display:flex; align-items:center;"><div class="tu-icon" style="background: #fff; border:1px solid #eee;"><img src="icons/Gopay.png" style="width:24px; height:24px; object-fit:contain;"></div><div><div style="font-weight:bold; font-size:14px; color:#333;">Transfer GoPay ${gopayTfBadge}</div><div style="font-size:11px; color:#999;">Dicek otomatis. Bayar SESUAI nominal unik.</div></div></div><i class="fas fa-chevron-right" style="color:#ccc"></i></div>
    `;
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
            <div style="background:#e1effe; color:#0066b2; padding:10px; border-radius:10px; font-size:10px; margin-bottom:15px; border:1px solid rgba(0,102,178,0.2);">
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
    
    paymentInfo = `<div style="background:#f8fafc; border:1px dashed #cbd5e1; padding:15px; border-radius:12px; margin-bottom:15px;"><div style="font-size:11px; color:#64748b; margin-bottom:5px;">Transfer ke Rekening ${bankName}:</div><div style="font-size:24px; font-weight:900; color:var(--primary); letter-spacing:1px; margin-bottom:5px; user-select:all;">${noRek}</div><div style="font-size:12px; font-weight:bold; color:#333;">a/n ${aNama}</div><button onclick="navigator.clipboard.writeText('${noRek}'); window.showNotice('success', 'Disalin', 'No Rekening ${bankName} berhasil disalin!')" style="margin-top:10px; background:#e1effe; color:var(--primary); border:none; padding:5px 10px; border-radius:5px; font-size:11px; cursor:pointer;"><i class="fas fa-copy"></i> Salin Rekening</button></div>`;
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
    let staticQris = "00020101021126670016COM.NOBUBANK.WWW01189360050300000907180214600239684104160303UMI51440014ID.CO.QRIS.WWW0215ID20254442075210303UMI5204541153033605802ID5919Mini Market Pandawa6011KARANGANYAR61055711162070703A016304DA77";
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
    
                    if (method.code === 'QRIS_GOPAY' || method.code === 'GOPAY_TF') {
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
    
    const tgMsg = `🔔 *REQUEST TOPUP BARU* 🔔\n\n👤 *User:* ${uName}\n📧 *Email:* ${user.email}\n💳 *Metode:* ${method.name}\n💰 *Nominal:* Rp ${new Intl.NumberFormat('id-ID').format(nominalUnik)}\n🆔 *Trx ID:* ${uniqueCode}\n\nMohon cek mutasi rekening/QRIS Anda.`;
    const tgBody = { chat_id: "-1003897469545", text: tgMsg, parse_mode: "Markdown", reply_markup: { inline_keyboard: [ [ { text: "✅ Terima", callback_data: `A_${docRef.id}_${user.uid}` }, { text: "❌ Tolak", callback_data: `R_${docRef.id}_${user.uid}` } ] ] } };
    
    fetch(`https://api.telegram.org/bot8659828786:AAGvN2hYGOBVvytFULdb7_v_hOCFDGOO7VA/sendMessage`, {
        method: 'POST', headers: { 'Content-Type': 'application/json' }, body: JSON.stringify(tgBody)
    }).then(r=>r.json()).then(data => {
        if(data.ok && data.result) window.updateDoc(window.doc(window.db, "users", user.uid, "riwayat_transaksi", docRef.id), { tg_message_id: data.result.message_id, tg_text_ori: tgMsg });
    }).catch(e=>console.log(e));
    
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
    
                if(!confirm("Yakin ingin membatalkan Pre-Order ini? Saldo akan dikembalikan ke akun Anda.")) return;
                window.showNotice('loading', 'Memproses', 'Membatalkan Pre-Order dan mengembalikan saldo...');
                
                try {
                    const user = window.auth.currentUser;
                    if(!user) return;
                    
                    const trxRef = window.doc(window.db, "users", user.uid, "riwayat_transaksi", idDoc);
                    const snap = await window.getDoc(trxRef);
                    
                    if(snap.exists() && snap.data().status === 'PENDING') {
    const userRef = window.doc(window.db, "users", user.uid);
    const userSnap = await window.getDoc(userRef);
    const newSaldo = (userSnap.data().saldo || 0) + parseInt(harga);
    
    // 1. Kembalikan saldo
    await window.updateDoc(userRef, { saldo: newSaldo });
    
    // 2. Ubah status riwayat
    await window.updateDoc(trxRef, { status: "GAGAL", sn: "Dibatalkan oleh Pengguna (Refund Saldo)" });
    
    // 3. Lapor ke DoniGuard
    if(window.triggerDoniGuard) {
        window.triggerDoniGuard({
            action: 'topup',
            produk: 'REFUND PO: ' + (snap.data().produk || 'Pre-Order'),
            nominal: parseInt(harga),
                            trx_id: ((snap.data().trx_id || trxId) + '-REF'),
            saldo_akhir_client: newSaldo
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
                if(!confirm("Yakin ingin membatalkan transaksi ini?")) return;
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
        ${data.status === 'DIKEMAS' ? `<button onclick="prosesInputResi('${id}')" style="width:100%; padding:10px; background:var(--primary); color:white; border:none; border-radius:8px; font-weight:bold; cursor:pointer;">Kirim Barang & Input Resi</button>` : `<div style="font-size:11px; background:#e1effe; color:var(--primary); padding:10px; border-radius:8px; border:1px solid rgba(0,153,255,0.1);"><b>Nomor Resi:</b> ${data.resi}</div>`}
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
                const resi = prompt("Masukkan Nomor Resi Pengiriman untuk Pesanan ini:");
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
                if(confirm("Apakah barang benar-benar sudah diterima? Status akan menjadi SELESAI.")) {
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
        code: (data.kodeOrder || data.kode), 
        dest: hp, 
        refid: 'IS-' + hp + '-' + Math.floor(10000000 + Math.random() * 90000000).toString() 
    })
                    });
                    const res = await req.json();
    
                    if(res.success && res.data) {
    const trxId = res.data.refid;
    const msg = res.data.message || "Transaksi diproses";
    
    window.showNotice('success', 'Berhasil', msg);
    
    // --- INTEGRASI DONIGUARD (FIX: Catat Transaksi ICS/Akrab v2) ---
    // Menyamakan saldo buku besar dengan saldo firestore setelah pembelian
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
    
    await window.addDoc(window.collection(window.db, "users", user.uid, "riwayat_transaksi"), {
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
                    } else {
    const freshUserSnap = await window.getDoc(userRef);
    const latestCurSaldo = freshUserSnap.exists() ? (freshUserSnap.data().saldo || 0) : 0;
    await window.updateDoc(userRef, { saldo: latestCurSaldo + data.baseHarga }); 
    window.showNotice('error', 'Gagal', window.bersihkanPesan((res.data ? res.data.message : res.message) || 'Gagal dari server pusat'));
                    }
                } catch(e) {
                    try {
     const userRef = window.doc(window.db, "users", user.uid);
     const freshUserSnapCatch = await window.getDoc(userRef);
     const latestCurSaldoCatch = freshUserSnapCatch.exists() ? (freshUserSnapCatch.data().saldo || 0) : 0;
     await window.updateDoc(userRef, { saldo: latestCurSaldoCatch + data.baseHarga });
                    } catch(ex){}
                    window.showNotice('error', 'Error', 'Terjadi kesalahan sistem: ' + e.message);
                }
            };
    
    
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
        code: String(data.kodeOrder || data.kode || ''), 
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
                const targetName = "Akrab Fresh (XDA)";
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
                document.querySelectorAll('.filter-card').forEach(e => e.classList.remove('active'));
                if(el) el.classList.add('active');
    
                const products = window.khfyData.filter(i => window.getKhfyCategory(i) === brand && !['BPAL1', 'BPAXXL1', 'BPAXL3', 'XLB75'].includes(i.kode_produk));
                products.sort((a,b) => parseInt(a.harga_final) - parseInt(b.harga_final));
    
                let stockMap = {};
                if (brand === 'Akrab Fresh (XLA)') {
                    const isModal = document.getElementById('judulMenu') && (document.getElementById('judulMenu').innerText === 'Paket Akrab All' || document.getElementById('judulMenu').innerText === 'PO Akrab');
                    const targetArea = isModal ? document.getElementById('listProdukModalArea') : document.getElementById('listProdukArea');
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
                    let desc = (p.deskripsi || '').replace(/\n/g, '<br>');
                    
                    // Cek Status dari JSON (1 = Masalah)
                    const isPO = (arguments.length > 2 ? arguments[2] : false) || document.getElementById('judulMenu').innerText === 'PO Akrab';
                    const isGangguan = (p.gangguan == 1);
                    const isKosong = (p.kosong == 1);
                    const isNotAvailable = !isPO && (isGangguan || isKosong);
                    
                    let statusBadge = "";
                    let divStyle = "flex-direction:column; align-items:flex-start;";
                    let clickEvent = '';
                    if (p.provider_kaje) {
    let pOrderCode = p.kode_order_kaje || p.kode_produk_asli || pCode;
    clickEvent = isPO ? `onclick="window.siapkanInvoicePO('${pCode}', '${pName}', ${finalPrice}, 'KAJE', '${pOrderCode}')"` : `onclick="window.siapkanInvoiceKaje('${pCode}', '${pName}', ${finalPrice}, '${pOrderCode}')"`;
                    } else {
    clickEvent = isPO ? `onclick="window.siapkanInvoicePO('${pCode}', '${pName}', ${finalPrice}, 'KHFY')"` : `onclick="window.siapkanInvoiceKhfy('${pCode}', '${pName}', ${finalPrice})"`;
                    }
                    
                    if (isNotAvailable) {
    divStyle += " opacity:0.6; background:#fff0f0;";
    clickEvent = `onclick="alert('Maaf, produk ini sedang gangguan atau stok kosong.')"`;
    if(isGangguan) statusBadge = `<span style="font-size:9px; color:white; background:red; padding:2px 4px; border-radius:4px; margin-left:5px;">GANGGUAN</span>`;
    else if(isKosong) statusBadge = `<span style="font-size:9px; color:white; background:orange; padding:2px 4px; border-radius:4px; margin-left:5px;">KOSONG</span>`;
                    } else if (isPO) {
    statusBadge = `<span style="font-size:9px; background:#f39c12; color:white; padding:2px 4px; border-radius:4px; margin-left:5px;">PRE-ORDER</span>`;
                    }
    
                    html += `<div class="item-produk" ${clickEvent} style="${divStyle}">
    <div style="width:100%; display:flex; justify-content:space-between; align-items:center;">
        <div>
            <div style="font-weight:bold;font-size:12px;">${pName} ${statusBadge}</div>
            <div style="font-size:10px; color:#999;">${pCode}</div>
            ${(p.stok !== undefined || (typeof stockMap !== 'undefined' && stockMap[pCode] !== undefined)) ? `<div style="font-size:10px; color:#10ac84; margin-top:2px; font-weight:bold;"><i class="fas fa-cubes"></i> Stok: ${p.stok !== undefined ? p.stok : stockMap[pCode]}</div>` : ''}
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
    
            window.siapkanInvoiceKaje = function(kode, nama, harga, kodeOrder) {
                window.currentInvoiceData = { kode, kodeOrder: (kodeOrder || kode), nama, baseHarga: harga, isKaje: true };
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
                
                const data = window.currentInvoiceData;
                // MODIFIKASI: Ambil tujuan dari input dalam invoice
                const elTujuan = document.getElementById('inputKhfyTujuan');
                const hp = elTujuan ? elTujuan.value : '';
                
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
    
                    // --- GENERATE TRX ID (8 DIGIT ANGKA RANDOM) SESUAI REQUEST ---
                    const clientRefId = "KF-" + hp + "-" + Math.floor(1000000 + Math.random() * 9000000).toString();
    
                    // 2. Tembak API Khfy via Proxy (Kirim reff_id buatan sendiri)
                    const req = await fetch(`khfy_proxy.php?action=trx&produk=${data.kode}&tujuan=${hp}&reff_id=${clientRefId}`);
                    const res = await req.json();
    
                    // 3. LOGIKA DETEKSI SUKSES SUPER TOLERAN
                    let isSuccess = false;
                    const fullResString = JSON.stringify(res).toLowerCase();
                    
                    if (res.success === true || res.status === true || fullResString.includes('true')) isSuccess = true;
                    if (fullResString.includes('proses') || fullResString.includes('pending') || fullResString.includes('berhasil') || fullResString.includes('sukses')) isSuccess = true;
                    
                    const d = res.data || res;
                    // Cek indikator lain
                    if (d.trxid || d.refid || (d.data && d.data.trxid)) isSuccess = true;
    
                    const msg = d.message || d.msg || (d.data ? d.data.message : '') || res.message || 'Transaksi diproses server';
                    
                    // GUNAKAN 8 DIGIT KITA SEBAGAI ID UTAMA UNTUK TRACKING
                    const trxId = clientRefId;
    
                    if(isSuccess) {
                        window.showNotice('success', 'Berhasil', msg);
    
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
        status: 'PENDING',
        sn: msg,
        trx_id: trxId,
        provider: 'KHFY',
        timestamp: window.serverTimestamp()
    });
    
    // JALANKAN MONITORING MENGGUNAKAN ID 8 DIGIT (clientRefId)
    window.monitorKhfyTrx(trxId, docRef.id);
    
                    } else {
    // GAGAL MURNI -> REFUND SALDO
    await window.updateDoc(userRef, { saldo: curSaldo }); 
    window.showNotice('error', 'Gagal', window.bersihkanPesan(msg || 'Gagal dari server pusat'));
                    }
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
            const curSaldo = userSnap.data().saldo || 0;
            const username = userSnap.data().username || "User";
    
            if(curSaldo < data.baseHarga) return window.showNotice('error', 'Gagal', 'Saldo tidak cukup!');
            
            if (!(await window.cekSinkronisasiDoniGuard(user.uid, curSaldo))) return;
    // 1. Potong Saldo
            const newSaldo = curSaldo - data.baseHarga;
            await window.updateDoc(userRef, { saldo: newSaldo });
    
            const trxId = 'PO-' + Date.now() + '-' + Math.floor(Math.random() * 1000);
            const msg = "Masuk Antrian Pre-Order Admin";
    
            if(window.triggerDoniGuard) {
                window.triggerDoniGuard({
                    action: 'transaksi',
                    produk: '(PO) ' + data.nama,
                    nominal: data.baseHarga,
                    trx_id: trxId,
                    saldo_akhir_client: newSaldo
                });
            }
    
            // 2. Simpan Riwayat User
            await window.addDoc(window.collection(window.db, "users", user.uid, "riwayat_transaksi"), {
                uid: user.uid,
                username: username,
                tujuan: hp,
                produk: data.nama,
                kode_produk: data.kode,
                kode_order_kaje: (data.provider === 'KAJE' ? String(data.kodeOrder || data.kode || '').replace(/^KDA/, 'XDA') : (data.kodeOrder || data.kode)),
                harga: data.baseHarga,
                status: 'PENDING',
                sn: msg,
                trx_id: trxId,
                provider: data.provider || 'KHFY',
                is_po: true,
                timestamp: window.serverTimestamp()
            });
    
            if(window.kirimNotifTelegram) window.kirimNotifTelegram('preorder', { produk: data.nama, tujuan: hp, harga: data.baseHarga, username: username, trx_id: trxId });
    
            // 3. SINKRONISASI KE ADMIN (PERBAIKAN: Menambahkan field produk & username agar tampil di panel)
            try {
                const poPayload = {
                    uid: user.uid,
                    username: username, 
                    tujuan: hp,
                    produk: data.nama, 
                    kode_produk: data.kode,
                    kode_order_kaje: (data.provider === 'KAJE' ? String(data.kodeOrder || data.kode || '').replace(/^KDA/, 'XDA') : (data.kodeOrder || data.kode)),
                    provider: data.provider || 'KHFY',
                    trx_id: trxId,
                    harga: data.baseHarga,
                    timestamp: window.serverTimestamp(),
                    status: 'PENDING' 
                };
                await window.addDoc(window.collection(window.db, "preorders"), poPayload);
                console.log("Sinkronisasi Pre-Order ke Admin sukses.");
            } catch(err) {
                console.error("Gagal simpan preorders:", err);
            }
    
            window.showNotice('success', 'Berhasil', 'Pesanan berhasil masuk antrian PO!');
        } catch(e) {
            console.error(e);
            window.showNotice('error', 'Error', 'Terjadi kesalahan sistem: ' + e.message);
        }
    };
    
    window.monitorKhfyTrx = async function(trxId, docId) {
                console.log("Monitoring RefID:", trxId);
                let attempts = 0;
                const interval = setInterval(async () => {
                    attempts++;
                    if(attempts > 30) clearInterval(interval);
    
                    try {
    const req = await fetch(`khfy_cekstatus.php?refid=${trxId}`);
    const res = await req.json();
    
    if(res.message && res.message.includes("Action invalid")) {
        clearInterval(interval);
        return;
    }
    
    // Parsing Status
    let targetItem = null;
    if (res.data && Array.isArray(res.data)) targetItem = res.data[0];
    else if (res.data && res.data.data && Array.isArray(res.data.data)) targetItem = res.data.data[0];
    else if (res.data) targetItem = res.data;
    else if (res.status && res.sn) targetItem = res;
    
    if(targetItem) {
        let statusAkhir = 'PENDING';
        // Cek Status (Support status_text & status2)
        const st = (targetItem.status || targetItem.status_text || targetItem.message || '').toUpperCase();
        const stCode = parseInt(targetItem.status2 || 0);
        
        // Logika Penentuan Status
        if(st.includes('SUKSES') || st.includes('BERHASIL') || st.includes('SUCCESS') || stCode === 20) statusAkhir = 'BERHASIL';
        else if(st.includes('GAGAL') || st.includes('BATAL') || st.includes('REFUND') || st.includes('FAILED') || stCode === 72) statusAkhir = 'GAGAL';
        
        // Ambil SN/Ket
        const sn = targetItem.sn || targetItem.keterangan || targetItem.note || targetItem.message || '-';
    
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
                    const curSt = (curSnap.data().status || '').toUpperCase();
                    if(curSt === 'BERHASIL' || curSt === 'SUKSES') {
                        console.log("🛡️ Status dikunci (Sudah Berhasil). Mengabaikan update selanjutnya.");
                        return;
                    }
                }
                // ------------------------------------
    
                await window.updateDoc(trxRef, {
                    status: statusAkhir,
                    sn: sn,
                    raw_json: JSON.stringify(res)
                });
                
                if(statusAkhir === 'GAGAL') {
                    const trxSnap = await window.getDoc(trxRef);
                    if (!trxSnap.data().isRefunded) {
                        const amount = parseInt(trxSnap.data().harga || 0);
                        const userRef = window.doc(window.db, "users", user.uid);
                        const uSnap = await window.getDoc(userRef);
                        
                        await window.updateDoc(userRef, { saldo: (uSnap.data().saldo || 0) + amount });
                        await window.updateDoc(trxRef, { isRefunded: true, sn: sn + ' (REFUND OTOMATIS)' });
                        
                        // Lapor Doniguard (Refund)
                        if(window.triggerDoniGuard) {
                            window.triggerDoniGuard({
                                action: 'topup',
                                produk: 'REFUND: ' + (trxSnap.data().produk || 'Paket Akrab'),
                                nominal: amount,
                                                                    trx_id: ((trxSnap.data().trx_id || trxId) + '-REF'),
                                saldo_akhir_client: (uSnap.data().saldo || 0) + amount
                            });
                        }
                        
                        window.showNotice('error', 'Transaksi Gagal', 'Saldo dikembalikan. Info: ' + sn);
                    }
                } else {
                    window.showNotice('success', 'Transaksi Sukses', sn);
                }
            }
        }
    }
                    } catch(e) { console.log("Monitoring Skip:", e); }
                }, 4000);
            };
            
    
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
                if(!user) return;
    
                const data = window.currentInvoiceData;
                const hp = (document.getElementById('inputWzTujuan') || {}).value || '';
                if(!hp) return alert("Mohon isi Nomor Tujuan!");
    
                document.getElementById('modalInvoice').style.display = 'none';
                window.showNotice('loading', 'Memproses', 'Sedang memproses transaksi WZ...');
    
                try {
                    const userRef = window.doc(window.db, "users", user.uid);
                    const userSnap = await window.getDoc(userRef);
                    const curSaldo = userSnap.data().saldo || 0;
                    const username = userSnap.data().username || "User";
    
                    if(curSaldo < data.baseHarga) return window.showNotice('error', 'Gagal', 'Saldo tidak mencukupi!');
                    if (!(await window.cekSinkronisasiDoniGuard(user.uid, curSaldo))) return;
    
                    await window.updateDoc(userRef, { saldo: curSaldo - data.baseHarga });
    
                    const clientRefId = "wz" + Date.now() + Math.floor(1000 + Math.random() * 9000);
                    const req = await fetch('wz_proxy.php?action=order', {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/json' },
                        body: JSON.stringify({
                            code: data.kode,
                            destination: hp,
                            order_id: clientRefId
                        })
                    });
                    const res = await req.json();
    
                    const resText = JSON.stringify(res).toLowerCase();
                    const wzData = (res && typeof res.data === 'object' && res.data !== null) ? res.data : {};
                    const wzStatus = String(res.status || wzData.status || '').toLowerCase();
                    const wzMsg = String(res.message || wzData.message || '').toLowerCase();
                    const trxId = wzData.order_id || res.order_id || res.refid || res.reffid || clientRefId;
                    const msg = res.message || wzData.message || 'Transaksi WZ diproses';
                    const isOrderRejected = res.success === false || wzStatus.includes('error') || wzStatus.includes('failed') || wzStatus.includes('gagal') || wzMsg.includes('tidak ditemukan') || wzMsg.includes('not found');
                    const isSuccess = !isOrderRejected && res.success === true && ['pending','process','processing','success','sukses','berhasil'].some(k => (wzStatus || resText).includes(k));
    
                    if(isSuccess) {
                        window.showNotice('success', 'Berhasil', msg);
    
                        if(window.triggerDoniGuard) {
                            window.triggerDoniGuard({
                                action: 'transaksi',
                                produk: data.nama,
                                nominal: data.baseHarga,
                                trx_id: trxId,
                                saldo_akhir_client: curSaldo - data.baseHarga
                            });
                        }
    
                        const docRef = await window.addDoc(window.collection(window.db, "users", user.uid, "riwayat_transaksi"), {
                            uid: user.uid,
                            username: username,
                            tujuan: hp,
                            produk: data.nama,
                            kode_produk: data.kode,
                            harga: data.baseHarga,
                            status: 'PENDING',
                            sn: msg,
                            trx_id: trxId,
                            provider: 'WZ',
                            raw_json: JSON.stringify(res),
                            timestamp: window.serverTimestamp()
                        });
    
                        if(window.kirimNotifTelegram) window.kirimNotifTelegram('transaksi', { produk: data.nama, tujuan: hp, harga: data.baseHarga, username: username, trx_id: trxId });
                        window.monitorWzTrx(trxId, docRef.id);
                    } else {
                        await window.updateDoc(userRef, { saldo: curSaldo });
                        window.showNotice('error', 'Gagal', window.bersihkanPesan ? window.bersihkanPesan(msg || 'Order WZ gagal') : (msg || 'Order WZ gagal'));
                    }
                } catch(e) {
                    console.error(e);
                    try {
                        const userRef = window.doc(window.db, "users", user.uid);
                        const userSnap = await window.getDoc(userRef);
                        await window.updateDoc(userRef, { saldo: (userSnap.data().saldo || 0) + data.baseHarga });
                    } catch(ex){}
                    window.showNotice('error', 'Error', 'Terjadi kesalahan WZ: ' + e.message);
                }
            };
    
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
                
                // FIX: Inisialisasi awal agar tidak crash saat .push()
                window.khfyData = [];
                window.icsData = [];
                window.wzData = [];
                
                if(areaFilter) areaFilter.innerHTML = "";
                if(areaList) areaList.innerHTML = "<div style='text-align:center; padding:40px;'><i class='fas fa-circle-notch fa-spin'></i> Memuat Semua Paket...</div>";
    
                try {
                    // Ambil Data Paralel (KHFY, ICS & KAJE) dengan catch individual agar jika 1 mati, yang lain tetap jalan
                    const [reqKhfy, reqIcs, reqKaje, reqWz] = await Promise.all([
    fetch('khfy_proxy.php?action=list').catch(() => null),
    fetch('ics_proxy.php?action=list').catch(() => null),
    fetch('kaje_proxy.php?api_action=get_products', {method: 'POST', body: '{}'}).catch(() => null),
    fetch('wz_proxy.php?action=products').catch(() => null)
                    ]);
                    
                    if (reqKhfy) {
    const resKhfy = await reqKhfy.json().catch(() => ({}));
    if (resKhfy.data) window.khfyData = resKhfy.data;
                    }
    
                    if (reqKaje) {
    const resKaje = await reqKaje.json().catch(() => ({}));
    if(resKaje && resKaje.success && resKaje.data && resKaje.data.products) {
        resKaje.data.products.forEach(p => {
            if(p.code && (p.code.startsWith('XDA') || p.code.startsWith('KDA'))) {
                const kodeAsliKaje = p.code;
                const kodeTampilKda = kodeAsliKaje.startsWith('XDA') ? kodeAsliKaje.replace(/^XDA/, 'KDA') : kodeAsliKaje;
                window.khfyData.push({
                    kode_produk: kodeTampilKda,
                    kode_order_kaje: kodeAsliKaje,
                    kode_produk_asli: kodeAsliKaje,
                    nama_produk: (p.name || '').replace(/XDA/g, 'KDA'),
                    harga_final: p.price,
                    gangguan: p.status === 'gangguan' ? 1 : 0,
                    kosong: p.status === 'kosong' ? 1 : 0,
                    deskripsi: Array.isArray(p.description) ? p.description.join('\n').replace(/XDA/g, 'KDA') : String(p.description || '').replace(/XDA/g, 'KDA'),
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
        });
        window.icsData = resIcs.data;
    }
                    }
    
                    if (reqWz) {
    const resWz = await reqWz.json().catch(() => ({}));
    if(resWz.success && Array.isArray(resWz.data)) {
        window.wzData = resWz.data;
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
                const q = document.getElementById('akrabSearch').value.toLowerCase();
                const items = document.querySelectorAll('#listProdukArea > div');
                items.forEach(item => {
                    const text = item.innerText.toLowerCase();
                    item.style.display = text.includes(q) ? 'block' : 'none';
                });
            };
    
            
            window.renderGabunganFilters = function() {
                // FIX: Pastikan data adalah array agar tidak error .map()
                const rawKhfy = Array.isArray(window.khfyData) ? window.khfyData : [];
                const rawIcs = Array.isArray(window.icsData) ? window.icsData : [];
    
                const brands = [...new Set(rawKhfy.map(i => window.getKhfyCategory(i)))].filter(b => b !== 'Tes System' && b !== 'Akrab Fresh (XDA)' && b !== 'PLN Pascabayar' && b !== 'Bonus Akrab').sort();
                const types = [...new Set(rawIcs.map(i => (i.type || 'Lainnya').toUpperCase()))].filter(t => !t.includes('FMAX') && !t.includes('FLEXMAX') && t !== 'PLN Pascabayar' && t !== 'Akrab Fresh (XDA)' && t !== 'XLA').sort();
    
                let html = '<div class="akrab-section-title">Pilih Paket</div><div class="akrab-grid">';
                
                brands.forEach(b => {
                    html += `<div class="akrab-btn" onclick="window.filterKhfy('${b}', this, false)">
    <i class="fas fa-bolt" style="color:#f59e0b"></i>
    <span>${b.replace('Akrab ', '')}</span>
                    </div>`;
                });
    
                types.forEach(t => {
                    html += `<div class="akrab-btn" onclick="window.filterIcs('${t}', this, false)">
    <i class="fas fa-bolt" style="color:#3b82f6"></i>
    <span>${t}</span>
                    </div>`;
                });
    
                if(Array.isArray(window.wzData) && window.wzData.length > 0) {
                    html += `<div class="akrab-btn" onclick="window.filterWz(this)">
    <i class="fas fa-tags" style="color:#10b981"></i>
    <span>Cuan+(Promo)</span>
                    </div>`;
                }
    
    
                if(!window.hidePoAkrab) {
                    html += '</div><div class="akrab-section-title">Antrian (PO)</div><div class="akrab-grid">';
                    brands.forEach(b => {
    html += `<div class="akrab-btn" onclick="window.filterKhfy('${b}', this, true)" style="border-style:dashed;">
        <i class="fas fa-clock" style="color:#94a3b8"></i>
        <span>${b.replace('Akrab ', '')}</span>
    </div>`;
                    });
    
                    types.forEach(t => {
    html += `<div class="akrab-btn" onclick="window.filterIcs('${t}', this, true)" style="border-style:dashed;">
        <i class="fas fa-clock" style="color:#94a3b8"></i>
        <span>${t}</span>
    </div>`;
                    });
                }
                
                html += '</div>';
                const areaFilter = document.getElementById('areaFilter');
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
        <div id="statusAlamatSekarang" style="background:#e1effe; padding:10px; border-radius:10px; margin-bottom:15px; font-size:11px; color:var(--primary); border:1px solid rgba(0,153,255,0.1);">
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

  <div id="pageProfil" class="full-page">
    <div class="prof-header">
      <div style="width:70px; height:70px; background:rgba(255,255,255,0.2); border-radius:50%; margin:0 auto 10px; display:flex; align-items:center; justify-content:center; font-size:30px;"><i class="fas fa-user"></i></div>
      <div id="profNameDisplay" style="font-weight:bold; font-size:18px;">Loading...</div>
      <div id="profEmailDisplay" style="font-size:12px; opacity:0.8;">...</div>
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
      <button class="btn-konfirmasi" onclick="navSwitch('pesanan_fisik')" style="background:linear-gradient(135deg, #3498db, #2980b9); margin-bottom:10px;"><i class="fas fa-box"></i> Pesanan Saya</button>
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
    <div class="nav-item" onclick="bukaMenu('Paket Akrab All')">
      <i class="fas fa-shopping-bag"></i>Belanja
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
    .chat-fab {
      background: #25D366;
      box-shadow: 0 4px 15px rgba(37, 211, 102, 0.4);
    }

    #modalChatPublic {
      display: none;
      position: fixed;
      bottom: 85px;
      right: 20px;
      width: 340px;
      max-width: 90vw;
      height: 500px;
      max-height: 75vh;
      z-index: 12000;
      background: #efeae2;
      border-radius: 16px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
      flex-direction: column;
      overflow: hidden;
      animation: zoomInWA 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
      align-items: stretch;
      justify-content: flex-start;
    }

    @keyframes zoomInWA {
      from {
        opacity: 0;
        transform: scale(0.8) translateY(20px);
        transform-origin: bottom right;
      }

      to {
        opacity: 1;
        transform: scale(1) translateY(0);
        transform-origin: bottom right;
      }
    }

    .wa-header {
      background: #00a884;
      color: white;
      padding: 12px 15px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      flex-shrink: 0;
    }

    .wa-header-left {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .wa-header-icon {
      width: 35px;
      height: 35px;
      background: rgba(255, 255, 255, 0.2);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      font-size: 18px;
      flex-shrink: 0;
    }

    .wa-header-title {
      display: flex;
      flex-direction: column;
    }

    .wa-header-title b {
      font-size: 14px;
      line-height: 1.2;
    }

    .wa-header-title span {
      font-size: 10px;
      opacity: 0.9;
    }

    .wa-tabs {
      display: flex;
      background: #00a884;
      color: white;
      border-bottom: 1px solid rgba(255, 255, 255, 0.1);
      flex-shrink: 0;
    }

    .wa-tab {
      flex: 1;
      text-align: center;
      padding: 10px;
      font-size: 12px;
      font-weight: bold;
      cursor: pointer;
      transition: 0.2s;
      opacity: 0.7;
      border-bottom: 3px solid transparent;
    }

    .wa-tab.active {
      opacity: 1;
      border-bottom: 3px solid white;
    }

    .chat-box {
      flex: 1;
      overflow-y: auto;
      padding: 12px;
      display: flex;
      flex-direction: column;
      gap: 8px;
      margin-bottom: 0;
      background-color: #efeae2;
      background-image: url('https://user-images.githubusercontent.com/15075759/28719144-86dc0f70-73b1-11e7-911d-60d70fcded21.png');
      background-size: cover;
      border-radius: 0;
      border: none;
    }

    .chat-bubble {
      max-width: 80%;
      padding: 6px 10px 15px 10px;
      border-radius: 12px;
      font-size: 11px;
      position: relative;
      word-wrap: break-word;
      line-height: 1.4;
      box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
    }

    .chat-bubble.me {
      align-self: flex-end;
      background: #d9fdd3;
      color: #111;
      border-top-right-radius: 0;
      border-bottom-right-radius: 12px;
    }

    .chat-bubble.admin {
      align-self: flex-start;
      background: #ffffff;
      color: #111;
      border-top-left-radius: 0;
      border-bottom-left-radius: 12px;
    }

    .chat-name {
      font-size: 10px;
      font-weight: bold;
      margin-bottom: 2px;
      color: #075e54;
      display: flex;
      align-items: center;
      gap: 3px;
    }

    .chat-time {
      font-size: 9px;
      color: #667781;
      position: absolute;
      bottom: 4px;
      right: 8px;
    }

    .chat-input-bar {
      display: flex;
      gap: 8px;
      align-items: flex-end;
      background: #f0f2f5;
      padding: 10px;
      position: relative;
      z-index: 20;
      border-top: none;
      flex-shrink: 0;
    }

    .chat-textarea {
      resize: none;
      overflow-y: hidden;
      min-height: 40px;
      max-height: 120px;
      padding: 12px 15px;
      border-radius: 20px;
      background: white;
      border: none;
      flex: 1;
      font-size: 13px;
      line-height: 1.4;
      font-family: inherit;
      transition: height 0.1s;
      outline: none;
      box-sizing: border-box;
      box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
    }

    .chat-textarea:focus {
      box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    }

    .btn-send-chat {
      width: 42px;
      height: 42px;
      border-radius: 50%;
      background: #00a884;
      color: white;
      border: none;
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      flex-shrink: 0;
      box-shadow: 0 2px 5px rgba(0, 168, 132, 0.3);
      transition: 0.2s;
      margin-bottom: 0px;
    }

    .btn-send-chat:active {
      transform: scale(0.9);
    }
  </style>
  <div class="chat-fab" onclick="bukaChatPublic()"> <i class="fab fa-whatsapp" style="font-size: 24px;"></i>
    <div id="badgeChat" style="position: absolute; top: -2px; right: -2px; background: #ff7675; color: white; border-radius: 50%; font-size: 9px; width: 16px; height: 16px; display: none; align-items: center; justify-content: center; border: 2px solid white; font-weight:bold;">!</div>
  </div>
  <div id="modalChatPublic">
    <div class="wa-header">
      <div class="wa-header-left">
        <div class="wa-header-icon"><i class="fas fa-headset"></i></div>
        <div class="wa-header-title">
          <b>Cs-Pandawa</b>
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
    @keyframes blink {
      50% {
        opacity: 0.5;
      }
    }
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
    
    // 1. JEMBATAN ANDROID: Cek apakah dibuka di Aplikasi MyPandawa
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
                    text: 'Bukti Transaksi Pandawa-Digital'
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
                            const rawMsg = `✅ TOPUP BERHASIL\n\n👤 Username: ${uName}\n📧 Email: ${user.email}\n💰 Jumlah: Rp ${new Intl.NumberFormat('id-ID').format(nominal)}\n🆔 Trx ID: ${uniqueCode}\n🕒 Waktu: ${tgDateStr}\n\nPandawa-Digital Indonesia\nhttps://www.pandawa-digital.com\nDownload apk:\nhttps://www.pandawa-digital.com/Pandawa.apk`;
                            const encodedMsg = encodeURIComponent(rawMsg);
                            fetch(`https://api.telegram.org/bot8490021696:AAGv-lgFCmKCg5x0Tr6xnqS3pQEEENAEZNA/sendMessage?chat_id=-1003888145818&text=${encodedMsg}`);
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
        const maskText = (text) => text.replace(/(ICS|KF|REF)-/g, '***-');
        const walkDOM = (node) => {
            if (node.nodeType === 3) {
                if (/(ICS|KF|REF)-/.test(node.nodeValue)) {
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
                    if (/(ICS|KF|REF)-/.test(m.target.nodeValue)) {
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
    // SCRIPT PEMBUNUH SERVICE WORKER & CACHE LAMA
    if ('serviceWorker' in navigator) {
        navigator.serviceWorker.getRegistrations().then(function(registrations) {
            for(let registration of registrations) {
                registration.unregister().then(function() {
                    console.log('Service worker lama berhasil dimatikan!');
                });
            }
        });
    }
    
    // Hapus Cache Storage
    if ('caches' in window) {
        caches.keys().then(function(names) {
            for (let name of names) {
                caches.delete(name);
            }
        });
    }
  </script>

</body>

</html>