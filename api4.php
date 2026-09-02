<?php
// api4.php - Endpoint H2H Akrab (AkrabOke - Dynamic Markup Engine & PPOB dengan Caching & Subfilter)
ini_set('display_errors', 0);
date_default_timezone_set('Asia/Jakarta');

header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization, X-API-KEY');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') { http_response_code(200); exit; }

require_once __DIR__ . '/auth_helper.php';

// CEK STATUS ON/OFF SERVER API4
check_api_status_or_die('api4');

/**
 * Helper: Ekstrak nominal tagihan secara pintar & komprehensif dari respon teks/JSON
 * Mengambil nilai tertinggi jika ditemukan lebih dari satu kandidat nominal (misal: TOTAL BAYAR vs TOTAL TAGIHAN)
 */
function extract_tagihan_amount($rawText, $inqData = []) {
    $candidates = [];

    // 1. Ekstrak dari struktur JSON/Array jika tersedia
    if (is_array($inqData)) {
        foreach (['total_bayar', 'tagihan', 'jumlah', 'total', 'bill_amount', 'ttag', 'total_tagihan'] as $f) {
            if (isset($inqData[$f]) && is_numeric($inqData[$f]) && (int)$inqData[$f] > 0) {
                $candidates[] = (int)$inqData[$f];
            }
        }
    }

    // Bersihkan enter / linebreaks agar regex tidak terputus baris baru
    $normalizedText = str_replace(["\r", "\n"], ' ', $rawText);

    // 2. Daftar Pattern Regex khusus pendeteksi nominal tagihan
    $patterns = [
        '/TTAG:\s*([\d\.\,]+)/i',
        '/TOTAL\s*BAYAR[^\d]*?(?:RP\.?|\:)?\s*([\d\.\,]+)/i',
        '/TOTAL\s*TAGIHAN[^\d]*?(?:RP\.?|\:)?\s*([\d\.\,]+)/i',
        '/JUMLAH\s*TAGIHAN[^\d]*?(?:RP\.?|\:)?\s*([\d\.\,]+)/i',
        '/(?:TAG|TAGIHAN)[^\d]*?(?:RP\.?|\:)\s*([\d\.\,]+)/i',
        '/\/RP\.?\s*([\d\.\,]+)/i',                           // Format Angsuran/Multifinance: /RP1441500/ANGSURAN...
        '/(?:RP\.?)\s*([\d\.\,]+)(?=\/|\s*ANGSURAN|\s*PERIODE)/i', // Format Angsuran tanpa slash depan
        '/RP\.?\s*([\d\.\,]+)/i'                               // Fallback format RP umum
    ];

    foreach ($patterns as $pattern) {
        if (preg_match_all($pattern, $normalizedText, $matches)) {
            foreach ($matches[1] as $val) {
                $cleanVal = (int)preg_replace('/[^\d]/', '', $val);
                // Filter agar tidak sengaja mengambil nominal kecil (<100)
                if ($cleanVal >= 100) {
                    $candidates[] = $cleanVal;
                }
            }
        }
    }

    if (empty($candidates)) {
        return 0;
    }

    // Selalu ambil nilai nominal TERTINGGI untuk mencegah kurang bayar
    return max($candidates);
}

/**
 * Helper: Deteksi Otomatis Subfilter (Brand/Provider/Layanan)
 */
function detect_subfilter($nama, $kode, $filter) {
    $namaUpper   = strtoupper($nama);
    $kodeUpper   = strtoupper($kode);
    $filterUpper = strtoupper($filter);

    // 1. Dompet Digital / E-Wallet / E-Money
    if (strpos($namaUpper, 'GOPAY') !== false || strpos($namaUpper, 'GO-PAY') !== false || strpos($kodeUpper, 'GJK') === 0 || strpos($kodeUpper, 'GJD') === 0 || strpos($kodeUpper, 'GPY') === 0 || strpos($kodeUpper, 'BBSGOP') !== false) {
        return 'GOPAY';
    }
    if (strpos($namaUpper, 'GRAB') !== false || strpos($kodeUpper, 'GRB') === 0 || strpos($kodeUpper, 'GRD') === 0) {
        return 'GRAB';
    }
    if (strpos($namaUpper, 'OVO') !== false || strpos($kodeUpper, 'OVO') !== false || strpos($kodeUpper, 'NOVO') !== false) {
        return 'OVO';
    }
    if (strpos($namaUpper, 'DANA') !== false || strpos($kodeUpper, 'BBSD') === 0 || strpos($kodeUpper, 'BBSDN') === 0) {
        return 'DANA';
    }
    if (strpos($namaUpper, 'SHOPEE') !== false || strpos($namaUpper, 'SHOPEEPAY') !== false || strpos($kodeUpper, 'SHP') === 0 || strpos($kodeUpper, 'SHOPE') === 0 || strpos($kodeUpper, 'SHOPDR') === 0) {
        return 'SHOPEEPAY';
    }
    if (strpos($namaUpper, 'LINKAJA') !== false || strpos($namaUpper, 'LINK AJA') !== false || strpos($kodeUpper, 'LINK') === 0 || strpos($kodeUpper, 'LJAE') === 0) {
        return 'LINKAJA';
    }
    if (strpos($namaUpper, 'ISAKU') !== false || strpos($namaUpper, 'I-SAKU') !== false || strpos($kodeUpper, 'ISAKU') === 0) {
        return 'ISAKU';
    }
    if (strpos($namaUpper, 'MAXIM') !== false || strpos($kodeUpper, 'MAXIM') === 0 || strpos($kodeUpper, 'MAXC') === 0) {
        return 'MAXIM';
    }
    if (strpos($namaUpper, 'ASTRAPAY') !== false || strpos($kodeUpper, 'ASPY') === 0 || strpos($kodeUpper, 'BBSASTR') === 0) {
        return 'ASTRAPAY';
    }
    if (strpos($namaUpper, 'KASPRO') !== false || strpos($kodeUpper, 'KASP') === 0) {
        return 'KASPRO';
    }
    if (strpos($namaUpper, 'DOKU') !== false || strpos($kodeUpper, 'DOKU') === 0) {
        return 'DOKU';
    }

    // 2. Operator Seluler / Pulsa / Data / BYU
    if (strpos($namaUpper, 'TELKOMSEL') !== false || strpos($namaUpper, 'SIMPATI') !== false || strpos($namaUpper, 'KARTU AS') !== false || strpos($namaUpper, 'TSEL') !== false || strpos($kodeUpper, 'MAST') === 0 || strpos($kodeUpper, 'SBD') === 0 || strpos($kodeUpper, 'TDH') === 0 || strpos($kodeUpper, 'TDM') === 0 || strpos($kodeUpper, 'TDO') === 0 || strpos($kodeUpper, 'VTJ') === 0) {
        return 'TELKOMSEL';
    }
    if (strpos($namaUpper, 'INDOSAT') !== false || strpos($namaUpper, 'ISAT') !== false || strpos($namaUpper, 'IM3') !== false || strpos($kodeUpper, 'IDN') === 0 || strpos($kodeUpper, 'IDF') === 0 || strpos($kodeUpper, 'IFM') === 0 || strpos($kodeUpper, 'VIF') === 0 || strpos($kodeUpper, 'IDY') === 0) {
        return 'INDOSAT';
    }
    if (strpos($namaUpper, 'XL') !== false || strpos($kodeUpper, 'XCA') === 0 || strpos($kodeUpper, 'XVIP') === 0 || strpos($kodeUpper, 'XCF') === 0 || strpos($kodeUpper, 'XFM') === 0 || strpos($kodeUpper, 'XBD') === 0 || strpos($kodeUpper, 'XDO') === 0 || strpos($kodeUpper, 'XLA') === 0) {
        return 'XL';
    }
    if (strpos($namaUpper, 'AXIS') !== false || strpos($kodeUpper, 'AXO') === 0 || strpos($kodeUpper, 'AXD') === 0 || strpos($kodeUpper, 'AXM') === 0 || strpos($kodeUpper, 'AIGO') === 0 || strpos($kodeUpper, 'VAX') === 0) {
        return 'AXIS';
    }
    if (strpos($namaUpper, 'SMARTFREN') !== false || strpos($namaUpper, 'SMART') !== false || strpos($kodeUpper, 'SMD') === 0 || strpos($kodeUpper, 'SFP') === 0 || strpos($kodeUpper, 'VSM') === 0 || strpos($kodeUpper, 'VSD') === 0) {
        return 'SMARTFREN';
    }
    if (strpos($namaUpper, 'BYU') !== false || strpos($namaUpper, 'BY.U') !== false || strpos($namaUpper, 'BY U') !== false || strpos($kodeUpper, 'BYU') === 0 || strpos($kodeUpper, 'VBYU') === 0) {
        return 'BYU';
    }
    if (strpos($namaUpper, 'THREE') !== false || strpos($namaUpper, 'TRI') !== false || strpos($kodeUpper, 'TGM') === 0 || strpos($kodeUpper, 'TDC') === 0 || strpos($kodeUpper, 'TRH') === 0 || strpos($kodeUpper, 'TDL') === 0 || strpos($kodeUpper, 'TD3') === 0) {
        return 'TRI';
    }

    // 3. E-Money / Bank Card
    if (strpos($namaUpper, 'BRIZZI') !== false || strpos($kodeUpper, 'EBRI') === 0) {
        return 'BRI';
    }
    if (strpos($namaUpper, 'MANDIRI') !== false || strpos($namaUpper, 'EMONEY') !== false || strpos($kodeUpper, 'MAN') === 0) {
        return 'MANDIRI';
    }
    if (strpos($namaUpper, 'TAP CASH') !== false || strpos($kodeUpper, 'BNI') === 0) {
        return 'BNI';
    }
    if (strpos($namaUpper, 'FLAZZ') !== false || strpos($kodeUpper, 'FLAZZ') === 0) {
        return 'BCA';
    }

    // 4. Game Digital
    if (strpos($namaUpper, 'FREE FIRE') !== false || strpos($namaUpper, 'FREEFIRE') !== false || strpos($kodeUpper, 'FF') === 0) {
        return 'FREE FIRE';
    }
    if (strpos($namaUpper, 'MOBILE LEGEND') !== false || strpos($namaUpper, 'MOBILE LEGENDS') !== false || strpos($kodeUpper, 'DML') === 0 || strpos($kodeUpper, 'ML') === 0) {
        return 'MOBILE LEGENDS';
    }
    if (strpos($namaUpper, 'PUBG') !== false || strpos($kodeUpper, 'PUBG') === 0) {
        return 'PUBG';
    }
    if (strpos($namaUpper, 'CALL OF DUTY') !== false || strpos($namaUpper, 'CODM') !== false || strpos($kodeUpper, 'CODM') === 0) {
        return 'CALL OF DUTY';
    }
    if (strpos($namaUpper, 'HONOR OF KING') !== false || strpos($namaUpper, 'HONOR OF KINGS') !== false || strpos($kodeUpper, 'HOK') === 0) {
        return 'HONOR OF KINGS';
    }
    if (strpos($namaUpper, 'POINT BLANK') !== false || strpos($kodeUpper, 'PB') === 0) {
        return 'POINT BLANK';
    }
    if (strpos($namaUpper, 'ROBLOX') !== false || strpos($kodeUpper, 'RBX') === 0 || strpos($kodeUpper, 'RBUX') === 0) {
        return 'ROBLOX';
    }
    if (strpos($namaUpper, 'ARENA BREAKOUT') !== false || strpos($kodeUpper, 'AB') === 0) {
        return 'ARENA BREAKOUT';
    }
    if (strpos($namaUpper, 'ZEPETO') !== false || strpos($kodeUpper, 'ZPAF') === 0) {
        return 'ZEPETO';
    }
    if (strpos($namaUpper, 'BLOOD STRIKE') !== false || strpos($kodeUpper, 'BSAF') === 0) {
        return 'BLOOD STRIKE';
    }
    if (strpos($namaUpper, 'FC MOBILE') !== false || strpos($kodeUpper, 'FMAF') === 0) {
        return 'FC MOBILE';
    }
    if (strpos($namaUpper, 'ONE PUNCH MAN') !== false || strpos($kodeUpper, 'OPMAF') === 0) {
        return 'ONE PUNCH MAN';
    }
    if (strpos($namaUpper, 'STEAM') !== false || strpos($kodeUpper, 'GVSM') === 0) {
        return 'STEAM';
    }
    if (strpos($namaUpper, 'RAZER') !== false || strpos($kodeUpper, 'RZRG') === 0) {
        return 'RAZER GOLD';
    }
    if (strpos($namaUpper, 'AOV') !== false || strpos($kodeUpper, 'AOV') === 0) {
        return 'AOV';
    }
    if (strpos($namaUpper, 'UNIPIN') !== false || strpos($kodeUpper, 'VUNI') === 0) {
        return 'UNIPIN';
    }
    if (strpos($namaUpper, 'GEMSCOOL') !== false || strpos($kodeUpper, 'VGC') === 0) {
        return 'GEMSCOOL';
    }

    // 5. PPOB / Tagihan / TV / Internet
    if (strpos($namaUpper, 'PLN') !== false || strpos($kodeUpper, 'PLN') === 0) {
        return 'PLN';
    }
    if (strpos($namaUpper, 'BPJS') !== false || strpos($kodeUpper, 'CBPJS') === 0 || strpos($kodeUpper, 'BBPJS') === 0) {
        return 'BPJS';
    }
    if (strpos($namaUpper, 'PDAM') !== false || strpos($namaUpper, 'PAM') !== false || strpos($kodeUpper, 'CPAM') === 0 || strpos($kodeUpper, 'BPAM') === 0) {
        return 'PDAM';
    }
    if (strpos($namaUpper, 'PBB') !== false || strpos($kodeUpper, 'CPBB') === 0 || strpos($kodeUpper, 'BPBB') === 0) {
        return 'PBB';
    }
    if (strpos($namaUpper, 'TELKOM') !== false) {
        return 'TELKOM';
    }
    if (strpos($namaUpper, 'SAMSAT') !== false || strpos($kodeUpper, 'CSAM') === 0 || strpos($kodeUpper, 'BSAM') === 0) {
        return 'SAMSAT';
    }
    if (strpos($namaUpper, 'K-VISION') !== false || strpos($namaUpper, 'KVISION') !== false || strpos($kodeUpper, 'KTV') === 0) {
        return 'K-VISION';
    }
    if (strpos($namaUpper, 'NEX') !== false || strpos($kodeUpper, 'NEX') === 0) {
        return 'NEX PARABOLA';
    }
    if (strpos($namaUpper, 'MNC') !== false) {
        return 'MNC';
    }
    if (strpos($namaUpper, 'INDOVISION') !== false) {
        return 'INDOVISION';
    }
    if (strpos($namaUpper, 'TRANSVISION') !== false) {
        return 'TRANSVISION';
    }
    if (strpos($namaUpper, 'VIDIO') !== false) {
        return 'VIDIO';
    }
    if (strpos($namaUpper, 'SPOTIFY') !== false) {
        return 'SPOTIFY';
    }
    if (strpos($namaUpper, 'WETV') !== false) {
        return 'WETV';
    }
    if (strpos($namaUpper, 'GENFLIX') !== false) {
        return 'GENFLIX';
    }
    if (strpos($namaUpper, 'BIZNET') !== false) {
        return 'BIZNET';
    }
    if (strpos($namaUpper, 'FIRST MEDIA') !== false) {
        return 'FIRST MEDIA';
    }
    if (strpos($namaUpper, 'MY REPUBLIC') !== false || strpos($namaUpper, 'MYREPUBLIC') !== false) {
        return 'MY REPUBLIC';
    }
    if (strpos($namaUpper, 'ICONNET') !== false) {
        return 'ICONNET';
    }
    if (strpos($namaUpper, 'BALI FIBER') !== false) {
        return 'BALI FIBER';
    }

    // Fallback: Ambil kata pertama nama produk
    $words = explode(' ', trim($nama));
    if (!empty($words[0]) && strlen($words[0]) > 1) {
        return strtoupper($words[0]);
    }

    return strtoupper($filter);
}

/**
 * Helper: Ambil data dari pusat & perbarui file cache JSON di server
 */
function fetch_and_write_product_cache($cacheFile) {
    $ch = curl_init('https://okeconnect.com/harga/json?id=905ccd028329b0a');
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT        => 20,
        CURLOPT_SSL_VERIFYPEER => false
    ]);
    $res = curl_exec($ch);
    curl_close($ch);

    $productsRaw = json_decode($res, true);
    if (!is_array($productsRaw)) {
        if (file_exists($cacheFile)) {
            $existing = json_decode(file_get_contents($cacheFile), true);
            if (is_array($existing)) return $existing;
        }
        return [
            'info' => [
                'tanggal'               => date('d'),
                'bulan'                 => date('m'),
                'tahun'                 => date('Y'),
                'jam'                   => date('H'),
                'menit'                 => date('i'),
                'updated_at'            => date('d-m-Y H:i:s') . ' WIB',
                'last_updated_timestamp' => time()
            ],
            'data' => []
        ];
    }

    // Extrak & Flatten array jika dari pusat berbentuk terkelompok Kategori
    $flatProducts = [];
    $isGrouped = false;
    foreach ($productsRaw as $key => $val) {
        if (is_string($key) && is_array($val)) {
            $isGrouped = true;
            break;
        }
    }

    if ($isGrouped) {
        foreach ($productsRaw as $categoryName => $items) {
            if (is_array($items)) {
                foreach ($items as $item) {
                    if (is_array($item)) {
                        $item['_extracted_filter'] = $categoryName;
                        $flatProducts[] = $item;
                    }
                }
            }
        }
    } else {
        foreach ($productsRaw as $item) {
            if (is_array($item)) {
                $cat = $item['filter'] ?? $item['kategori'] ?? $item['category'] ?? $item['kelompok'] ?? $item['type'] ?? 'UMUM';
                $item['_extracted_filter'] = $cat;
                $flatProducts[] = $item;
            }
        }
    }

    $processedList = [];
    foreach ($flatProducts as $p) {
        $kode       = $p['kode'] ?? $p['Kode'] ?? '';
        $nama       = $p['keterangan'] ?? $p['Keterangan'] ?? $p['produk'] ?? $p['Produk'] ?? '';
        $hargaModal = (int)($p['harga'] ?? $p['Harga'] ?? 0);
        if ($hargaModal < 0) $hargaModal = 0;

        $statusRaw = (string)($p['status'] ?? $p['Status'] ?? '1');
        $statusStr = (in_array(strtolower($statusRaw), ['1', 'open', 'ready'], true)) ? 'READY' : 'GANGGUAN';
        $filterTag = strtoupper(trim($p['_extracted_filter'] ?? 'UMUM'));
        $subFilterTag = detect_subfilter($nama, $kode, $filterTag);

        $processedList[] = [
            'kode'        => $kode,
            'nama'        => $nama,
            'harga_modal' => $hargaModal,
            'filter'      => $filterTag,
            'subfilter'   => $subFilterTag,
            'status'      => $statusStr,
            'stock'       => '999'
        ];
    }

    // Simpan kamus kode => nama produk untuk keterangan buku besar saldo (audit)
    ledger_cache_products($processedList);

    $cacheContent = [
        'info' => [
            'tanggal'               => date('d'),
            'bulan'                 => date('m'),
            'tahun'                 => date('Y'),
            'jam'                   => date('H'),
            'menit'                 => date('i'),
            'updated_at'            => date('d-m-Y H:i:s') . ' WIB',
            'last_updated_timestamp' => time()
        ],
        'data' => $processedList
    ];

    @file_put_contents($cacheFile, json_encode($cacheContent, JSON_PRETTY_PRINT));
    return $cacheContent;
}

/**
 * Helper: Ambil data cache, jika kadaluarsa (> 8 menit) jadwalkan update otomatis di background
 */
function get_or_update_product_cache($cacheFile, $ttlSeconds = 480) {
    $now = time();
    $cacheData = null;

    if (file_exists($cacheFile)) {
        $raw = file_get_contents($cacheFile);
        $cacheData = json_decode($raw, true);
    }

    $lastUpdated = $cacheData['info']['last_updated_timestamp'] ?? 0;
    $isExpired   = ($now - $lastUpdated) > $ttlSeconds;

    if (!$cacheData || !is_array($cacheData['data'] ?? null)) {
        // Cache belum ada / eror -> Tarik fresh langsung
        $cacheData = fetch_and_write_product_cache($cacheFile);
    } elseif ($isExpired) {
        // Cache kadaluarsa -> Pakai cache lama untuk respon cepat, lalu update cache di background
        register_shutdown_function(function() use ($cacheFile) {
            fetch_and_write_product_cache($cacheFile);
        });
    }

    return $cacheData;
}

// SIMPAN BACA INPUT PARAMETER
$rawInput = file_get_contents('php://input');
$input = json_decode($rawInput, true);
if (!is_array($input)) $input = $_POST;
$input = array_merge($_GET, $input);

$headers = array_change_key_case(getallheaders(), CASE_UPPER);
$apiKey = $headers['X-API-KEY'] ?? $input['api_key'] ?? '';

$user = validate_api_key($apiKey);
if (!$user) {
    http_response_code(401);
    echo json_encode(['status' => false, 'message' => 'Akses Ditolak: API Key tidak valid atau akun ditangguhkan!']);
    exit;
}

$userMarkup = get_user_markup_for_api($user, 'api4');
$action = strtolower(trim($input['action'] ?? 'list'));

switch ($action) {
    case 'list':
    case 'produk':
        $cacheFile = __DIR__ . '/cache_produk_api4.json';
        $cacheObj  = get_or_update_product_cache($cacheFile, 480); // TTL 8 Menit
        $cachedProducts = $cacheObj['data'] ?? [];

        $allKodes = array_flip(array_map(function($item) {
            return strtoupper($item['kode'] ?? '');
        }, $cachedProducts));

        $result = [];
        foreach ($cachedProducts as $p) {
            $kodeUpper  = strtoupper($p['kode'] ?? '');
            $hargaModal = (int)($p['harga_modal'] ?? 0);

            $twinBayarKode = "";
            if (strpos($kodeUpper, "CEK") !== false) {
                $twinBayarKode = str_replace("CEK", "BYR", $kodeUpper);
            } elseif (substr($kodeUpper, 0, 1) === "C") {
                $twinBayarKode = "B" . substr($kodeUpper, 1);
            }
            $isCek = ($twinBayarKode !== "" && isset($allKodes[$twinBayarKode])) || strpos($kodeUpper, "CEK") !== false || (substr($kodeUpper, 0, 1) === "C" && strlen($kodeUpper) > 3);
            $appliedMarkup = $isCek ? 0 : $userMarkup;

            $hargaJual = $hargaModal + $appliedMarkup;
            if ($hargaJual < 0) {
                $hargaJual = 0;
            }

            $result[] = [
                'kode'      => $p['kode'],
                'nama'      => $p['nama'],
                'harga'     => $hargaJual,
                'filter'    => $p['filter'],
                'subfilter' => $p['subfilter'],
                'status'    => $p['status'],
                'stock'     => $p['stock']
            ];
        }

        echo json_encode([
            'status'     => true,
            'message'    => 'Daftar produk AkrabOke berhasil diambil',
            'cache_info' => $cacheObj['info'] ?? null,
            'data'       => $result
        ]);
        break;

    case 'cek':
        // Cek Tagihan PPOB (Inquiry Tahap 1)
        $kode   = strtoupper(trim($input['kode'] ?? ''));
        $target = trim($input['target'] ?? $input['tujuan'] ?? '');

        if (!$kode || !$target) {
            echo json_encode(['status' => false, 'message' => 'Parameter tidak lengkap (butuh: kode, tujuan)']);
            exit;
        }

        $refPusat = 'INQ-' . date('YmdHis') . rand(100, 999);
        $gwRes = call_okeconnect_api([
            'type'    => 'inquiry',
            'product' => $kode,
            'dest'    => $target,
            'refID'   => $refPusat
        ]);

        $rawText   = $gwRes['raw_response'] ?? json_encode($gwRes);
        $statusTrx = detect_trx_status($gwRes, $rawText);

        // PERBAIKAN: Jika respon mengandung kata indikator transaksi duplikat/repeat dari pusat, paksa status ke GAGAL
        if (preg_match('/(sudah pernah|trx ke-\d+|gunakan format)/i', $rawText)) {
            $statusTrx = 'GAGAL';
        }

        $cleanMsg  = clean_api_message($rawText);

        // Auto-Polling Loop jika respon awal masih PENDING / 'akan diproses'
        $maxRetries = 5;
        for ($i = 0; $i < $maxRetries; $i++) {
            if ($statusTrx === 'BERHASIL' || $statusTrx === 'GAGAL' || preg_match('/(TTAG|TOTAL|TAGIHAN):\s*\d+/i', $rawText)) {
                break;
            }
            if ($statusTrx === 'PENDING' || strpos(strtolower($rawText), 'akan diproses') !== false || strpos(strtolower($rawText), 'diproses') !== false) {
                sleep(2);
                $gwRes = call_okeconnect_api([
                    'check'   => 1,
                    'product' => $kode,
                    'dest'    => $target,
                    'refID'   => $refPusat
                ]);
                $rawText   = $gwRes['raw_response'] ?? json_encode($gwRes);
                $statusTrx = detect_trx_status($gwRes, $rawText);
                
                // PERBAIKAN DI RETRY LOOP
                if (preg_match('/(sudah pernah|trx ke-\d+|gunakan format)/i', $rawText)) {
                    $statusTrx = 'GAGAL';
                }

                $cleanMsg  = clean_api_message($rawText);
            } else {
                break;
            }
        }

        // EVALUASI PENGECEKAN
        $isDuplicateWarning = preg_match('/(sudah pernah|trx ke-\d+|gunakan format)/i', $rawText);

        if (!$isDuplicateWarning && ($statusTrx === 'BERHASIL' || ($statusTrx !== 'GAGAL' && preg_match('/(TTAG|TOTAL|TAGIHAN|SUKSES)/i', $rawText)))) {
            if (strpos($kode, "CEK") !== false) {
                $kodeBayar = str_replace("CEK", "BYR", $kode);
            } elseif (substr($kode, 0, 1) === "C") {
                $kodeBayar = 'B' . substr($kode, 1);
            } else {
                $kodeBayar = $kode;
            }
            
            // Menggunakan helper deteksi nominal otomatis & komprehensif
            $inqData = $gwRes['data'] ?? [];
            $tagihan = extract_tagihan_amount($rawText, $inqData);

            $paymentToken = base64_encode($user['username'] . '|' . $kodeBayar . '|' . $target . '|' . $refPusat);

            $inqToken = [
                'ref_inq'       => $refPusat,
                'dest'          => $target,
                'kode'          => $kode,
                'kode_bayar'    => $kodeBayar,
                'tagihan'       => $tagihan,
                'payment_token' => $paymentToken,
                'time'          => time(),
                'msg'           => $cleanMsg
            ];

            $pathTmp = __DIR__ . '/inquiry_tmp/';
            if (!is_dir($pathTmp)) @mkdir($pathTmp, 0755, true);
            file_put_contents($pathTmp . 'inq_' . md5($paymentToken) . '.json', json_encode($inqToken));

            echo json_encode([
                'status'  => true,
                'message' => 'Pengecekan Berhasil',
                'data'    => [
                    'ref_inq_pandawa' => $refPusat,
                    'tujuan'          => $target,
                    'payment_token'   => $paymentToken,
                    'keterangan'      => $cleanMsg
                ]
            ]);
        } else {
            echo json_encode(['status' => false, 'message' => 'Cek Gagal/Masih Diproses: ' . $cleanMsg]);
        }
        break;

    case 'order':
    case 'bayar':
        $isPayToken = false;
        $tagihanDariCek = 0;
        $refidReseller = trim($input['ref_id'] ?? $input['refid'] ?? '');

        if (!empty($input['payment_token'])) {
            $decoded = base64_decode($input['payment_token']);
            $parts = explode('|', $decoded);
            if (count($parts) === 4 && $parts[0] === $user['username']) {
                $kode   = strtoupper($parts[1]);
                $target = $parts[2];
                $refPusat = $parts[3];
                $isPayToken = true;

                $pathToken = __DIR__ . '/inquiry_tmp/inq_' . md5($input['payment_token']) . '.json';
                if (file_exists($pathToken)) {
                    $savedToken = json_decode(file_get_contents($pathToken), true);
                    if (time() - ($savedToken['time'] ?? 0) <= 600 && ($savedToken['payment_token'] ?? '') === $input['payment_token']) {
                        $tagihanDariCek = (int)($savedToken['tagihan'] ?? 0);
                        @unlink($pathToken);
                    } else {
                        @unlink($pathToken);
                        echo json_encode(['status' => false, 'message' => 'Payment token sudah kadaluarsa (lebih dari 10 menit) atau tidak cocok']);
                        exit;
                    }
                } else {
                    echo json_encode(['status' => false, 'message' => 'Payment token tidak ditemukan atau sudah pernah digunakan']);
                    exit;
                }
            } else {
                echo json_encode(['status' => false, 'message' => 'Payment token tidak valid']); exit;
            }
        } else {
            $kode   = strtoupper(trim($input['kode_produk'] ?? $input['kode'] ?? ''));
            $target = trim($input['target'] ?? $input['tujuan'] ?? '');
            
            // Pengecekan produk tagihan PPOB (Bayar) dengan mengabaikan BYU, BNI, BBS, BSAF, BEIN, BERITA, BELI
            $isPpobBayarCode = (strpos($kode, "BYR") !== false || strpos($kode, "BAYAR") !== false || (substr($kode, 0, 1) === "B" && strlen($kode) > 3 && strpos($kode, "BYU") !== 0 && strpos($kode, "BNI") !== 0 && strpos($kode, "BBS") !== 0 && strpos($kode, "BSAF") !== 0 && strpos($kode, "BEIN") !== 0 && strpos($kode, "BERITA") !== 0 && strpos($kode, "BELI") !== 0));

            if ($isPpobBayarCode) {
                echo json_encode(['status' => false, 'message' => 'Pembayaran tagihan PPOB wajib menggunakan payment_token hasil Inquiry Tahap 1']); exit;
            }
        }

        if (!$kode || !$target) {
            echo json_encode(['status' => false, 'message' => 'Parameter tidak lengkap (butuh: kode/payment_token, target)']);
            exit;
        }

        $refidH2H = $refidReseller ?: ('TRX-' . date('YmdHis') . rand(100, 999));

        // Cek Transaksi Duplikat
        $existing = find_transaction_by_any_refid($user['id'], $refidH2H);
        if ($existing) {
            $isSuccessOrPending = ($existing['status'] === 'BERHASIL' || $existing['status'] === 'PENDING');
            echo json_encode([
                'status'  => $isSuccessOrPending,
                'message' => clean_api_message($existing['message'] ?: 'Transaksi duplikat terdeteksi'),
                'data'    => [
                    'ref_id'       => $existing['refid_h2h'],
                    'ref_reseller' => $refidReseller ?: $existing['refid_h2h'],
                    'kode'         => $existing['kode_produk'],
                    'tujuan'       => $existing['target'],
                    'harga'        => (int)($existing['harga'] ?? 0),
                    'status_trx'   => strtolower($existing['status']),
                    'sn'           => clean_api_message($existing['sn'] ?? '-'),
                    'sisa_saldo'   => (int)$user['saldo']
                ]
            ]);
            exit;
        }

        // Ambil harga modal server menggunakan cache agar transaksi super cepat
        $cacheFile = __DIR__ . '/cache_produk_api4.json';
        $cacheObj  = get_or_update_product_cache($cacheFile, 480);
        $cachedProducts = $cacheObj['data'] ?? [];

        $adminServer = 0;
        foreach ($cachedProducts as $p) {
            if (strtoupper($p['kode'] ?? '') === $kode) {
                $adminServer = (int)($p['harga_modal'] ?? 0);
                break;
            }
        }

        if ($adminServer < 0) $adminServer = 0;
        $qty = (int)($input['qty'] ?? 0);

        $isCekOrder = (substr($kode, 0, 1) === "C" || strpos($kode, "CEK") !== false);
        $appliedMarkupOrder = $isCekOrder ? 0 : $userMarkup;

        if ($qty > 0) {
            $hargaModal = $qty + $adminServer;
            $hargaJual  = $qty + $adminServer + $appliedMarkupOrder;
        } elseif ($tagihanDariCek > 0) {
            $hargaModal = $tagihanDariCek + $adminServer;
            $hargaJual  = $tagihanDariCek + $adminServer + $appliedMarkupOrder;
        } else {
            $hargaModal = $adminServer;
            $hargaJual  = $adminServer + $appliedMarkupOrder;
        }

        if ($hargaJual < 0) $hargaJual = 0;

        if ((int)$user['saldo'] < $hargaJual) {
            echo json_encode(['status' => false, 'message' => 'Saldo H2H Anda tidak mencukupi. Tagihan/Harga: Rp ' . number_format($hargaJual, 0, ',', '.')]);
            exit;
        }

        // Potong Saldo User + Catat ke Buku Besar Saldo (Audit)
        ledger_charge($user['id'], $hargaJual, array(
            'jenis'       => 'PEMBELIAN',
            'refid'       => $refidH2H,
            'refid_pusat' => $refPusat,
            'kode_produk' => $kode,
            'target'      => $target,
            'server'      => 'api4',
            'status'      => 'PENDING',
            'keterangan'  => 'Beli ' . ledger_product_name($kode) . ' (' . $target . ')',
            'catatan'     => 'Order dikirim ke Server 4 (OkeConnect)',
        ));

        if (!$isPayToken) {
            $refPusat = 'OK-' . date('YmdHis') . rand(100, 999);
        }

        // 1. Simpan Transaksi Awal ke Riwayat H2H dengan Status PENDING
        $trxRecord = [
            'trx_id'       => 'TRX4-' . time() . rand(100, 999),
            'user_id'      => $user['id'],
            'username'     => $user['username'],
            'nomorwa'      => $user['nomorwa'],
            'refid_h2h'    => $refidH2H,
            'refid_pusat'  => $refPusat,
            'server'       => 'api4.php',
            'server_code'  => 'api4',
            'kode_produk'  => $kode,
            'target'       => $target,
            'harga'        => $hargaJual,
            'status'       => 'PENDING',
            'sn'           => '-',
            'message'      => 'Order diterima, sedang diproses',
            'created_at'   => date('Y-m-d H:i:s')
        ];
        save_user_transaction($user['id'], $trxRecord);

        // 2. Hit Ke Server OkeConnect Pusat
        $params = [
            'type'    => 'order',
            'product' => $kode,
            'dest'    => $target,
            'refID'   => $refPusat
        ];
        if ($qty > 0) $params['qty'] = $qty;

        $gwRes = call_okeconnect_api($params);

        $rawText   = $gwRes['raw_response'] ?? json_encode($gwRes);
        $statusTrx = detect_trx_status($gwRes, $rawText);

        // PERBAIKAN: Jika respon mengandung kata indikator transaksi duplikat/repeat dari pusat, paksa status ke GAGAL
        if (preg_match('/(sudah pernah|trx ke-\d+|gunakan format)/i', $rawText)) {
            $statusTrx = 'GAGAL';
        }

        $cleanMsg  = clean_api_message($rawText);

        // Jika GAGAL instan dari respon order pusat, refund saldo & update ke GAGAL
        if ($statusTrx === 'GAGAL') {
            // Refund saldo + Catat ke Buku Besar Saldo (Audit)
            ledger_refund($user['id'], $hargaJual, array(
                'refid'       => $refidH2H,
                'refid_pusat' => $refPusat,
                'kode_produk' => $kode,
                'target'      => $target,
                'server'      => 'api4',
                'status'      => 'GAGAL',
                'keterangan'  => 'Refund ' . ledger_product_name($kode) . ' (' . $target . ')',
                'catatan'     => 'Order ditolak server pusat: ' . $cleanMsg,
            ));
            $trxRecord['status']  = 'GAGAL';
            $trxRecord['message'] = $cleanMsg;
            save_user_transaction($user['id'], $trxRecord);
        } else {
            $trxRecord['message'] = $cleanMsg;
            save_user_transaction($user['id'], $trxRecord);
        }

        $allUsersData = get_users_data();
        $uIdx = array_search($user['id'], array_column($allUsersData, 'id'));
        $sisaSaldo = ($uIdx !== false) ? (int)($allUsersData[$uIdx]['saldo'] ?? 0) : (int)$user['saldo'];

        echo json_encode([
            'status'  => ($trxRecord['status'] !== 'GAGAL'),
            'message' => 'Order ' . ($trxRecord['status'] === 'GAGAL' ? 'Gagal: ' : 'diterima: ') . $cleanMsg,
            'data'    => [
                'ref_id'       => $refidH2H,
                'ref_reseller' => $refidReseller ?: $refidH2H,
                'kode'         => $kode,
                'tujuan'       => $target,
                'harga'        => $hargaJual,
                'status_trx'   => strtolower($trxRecord['status']),
                'sn'           => clean_api_message($trxRecord['sn'] ?? '-'),
                'sisa_saldo'   => $sisaSaldo
            ]
        ]);
        break;

    case 'status':
    case 'check':
        $refid = trim($input['refid'] ?? $input['ref_id'] ?? '');
        if (!$refid) {
            echo json_encode(['status' => false, 'message' => 'Parameter refid wajib diisi']);
            exit;
        }

        $trx = find_transaction_by_any_refid($user['id'], $refid);
        if (!$trx) {
            echo json_encode(['status' => false, 'message' => 'Transaksi tidak ditemukan']);
            exit;
        }

        // PROTEKSI LOKAL: Jika status lokal SUDAH GAGAL atau BERHASIL, langsung kembalikan pesan lokal
        if ($trx['status'] === 'GAGAL' || $trx['status'] === 'BERHASIL') {
            $statusStr = strtolower($trx['status']);
            echo json_encode([
                'status'  => ($trx['status'] === 'BERHASIL'),
                'message' => 'Status Transaksi',
                'data'    => [
                    'ref_id'     => $trx['refid_h2h'],
                    'kode'       => $trx['kode_produk'],
                    'tujuan'     => $trx['target'],
                    'status_trx' => $statusStr,
                    'sn'         => clean_api_message($trx['sn'] ?? '-'),
                    'keterangan' => clean_api_message($trx['message'] ?? '-')
                ]
            ]);
            exit;
        }

        // Hanya jika status lokal masih PENDING, sistem melakukan cek realtime ke pusat
        $trx = sync_transaction_status($user['id'], $trx, false);

        $statusStr = strtolower($trx['status']);
        $isSuccessOrPending = ($trx['status'] === 'BERHASIL' || $trx['status'] === 'PENDING');

        echo json_encode([
            'status'  => $isSuccessOrPending,
            'message' => 'Status Transaksi',
            'data'    => [
                'ref_id'     => $trx['refid_h2h'],
                'kode'       => $trx['kode_produk'],
                'tujuan'     => $trx['target'],
                'status_trx' => $statusStr,
                'sn'         => clean_api_message($trx['sn']),
                'keterangan' => clean_api_message($trx['message'])
            ]
        ]);
        break;

    default:
        echo json_encode(['status' => false, 'message' => 'Action API tidak valid']);
        break;
}