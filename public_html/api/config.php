<?php
/**
 * ============================================================
 *  PAYNUSA — KONFIGURASI API AMAN (config.php)
 *  Letak file : public_html/api/config.php
 * ============================================================
 *
 *  PAYNUSA_API_KEY
 *  - Kunci rahasia bersama (shared secret) untuk menandatangani
 *    setiap request dari index.html (HMAC-SHA256).
 *  - HARUS PERSIS SAMA dengan konstanta API_KEY di index.html.
 *  - Ganti dengan rahasia acak Anda sendiri (min. 32 karakter),
 *    lalu ikut ubah API_KEY di index.html.
 *
 *  PAYNUSA_MANAGER_URL
 *  - Kosongkan ('') untuk deteksi otomatis (disarankan).
 *  - Isi manual hanya jika deteksi otomatis gagal di hosting Anda,
 *    contoh : 'http://127.0.0.1/manager.php'
 * ============================================================
 */

define('PAYNUSA_API_KEY', '722f3adc3c5d10726f50ba5484527ed2aa7e6e80b87d97295eb70269ae4d4129');

define('PAYNUSA_MANAGER_URL', '');
