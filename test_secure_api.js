/* =====================================================================
 * TEST PAYNUSA SECURE API
 * 1) Ekstrak modul SEC dari index.html, cross-check SHA-256/HMAC/b64
 *    terhadap node:crypto.
 * 2) Simulasi server-side (cermin logika _secure.php/transfer.php/
 *    pembayaran.php) + serangan: tamper sig, key salah, replay, ts
 *    kedaluwarsa, nominal negatif/nol/di-bawah-minimum, dsb.
 * ===================================================================== */
const fs = require('fs');
const crypto = require('crypto');

const html = fs.readFileSync('index.html', 'utf8');
const start = html.indexOf('const API_KEY = ');
const end = html.indexOf('/* ==================== KATALOG LAYANAN');
if (start === -1 || end === -1) { console.error('FATAL: blok SEC tidak ditemukan di index.html'); process.exit(1); }
const secJs = html.slice(start, end);

// ---- muat modul SEC (bawa dari browser ke Node) --------------------
const factory = new Function(secJs + '\nreturn { API_KEY, SEC, secSign, callSecureApi };');
const exports_ = factory();
const API_KEY = exports_.API_KEY;
const SEC = exports_.SEC;
const secSign = exports_.secSign;

let pass = 0, fail = 0;
function ok(cond, name, extra) {
  if (cond) { pass++; console.log('  PASS  ' + name); }
  else { fail++; console.log('  FAIL  ' + name + (extra !== undefined ? '  -> ' + JSON.stringify(extra) : '')); }
}
const sha256ref = (s) => crypto.createHash('sha256').update(s, 'utf8').digest();
const hmacRef = (key, s) => crypto.createHmac('sha256', key).update(s, 'utf8').digest();
const sameBytes = (a, b) => Buffer.from(a).equals(Buffer.from(b));

console.log('\n=== 1. API KEY sinkron (index.html <-> config.php) ===');
const cfg = fs.readFileSync('public_html/api/config.php', 'utf8');
const cfgKey = (cfg.match(/PAYNUSA_API_KEY'\s*,\s*'([0-9a-f]{64})'/) || [])[1];
ok(API_KEY === cfgKey, 'API_KEY index.html == PAYNUSA_API_KEY config.php', { js: API_KEY, cfg: cfgKey });

console.log('\n=== 2. SHA-256 (pure-JS vs node:crypto) ===');
[
  '', 'abc', 'The quick brown fox jumps over the lazy dog',
  'Halo 🌍 PayNusa — éèê ë ü', '0123456789',
  'a'.repeat(55), 'a'.repeat(56), 'a'.repeat(63), 'a'.repeat(64), 'a'.repeat(65),
  'a'.repeat(119), 'a'.repeat(120), 'x'.repeat(200), 'y'.repeat(1000),
].forEach((s, i) => {
  ok(sameBytes(SEC.sha256Bytes(SEC.toUtf8(s)), sha256ref(s)), 'sha256[' + i + '] len=' + s.length);
});

console.log('\n=== 3. HMAC-SHA256 (pure-JS vs node:crypto) ===');
[
  ['kunci123', 'pesan uji'],
  [API_KEY, '{"v":1,"ts":123,"nonce":"abc","action":"kirim","data":{"a":1}}'],
  ['x'.repeat(64), 'batas tepat 64'],
  ['x'.repeat(65), 'lebih dari 64 (key di-hash dulu)'],
  ['x'.repeat(200), 'key panjang'],
  [API_KEY, 'unicode 🇮🇩 payload'],
  ['key', ''],
].forEach(([k, m], i) => {
  ok(sameBytes(SEC.hmacSha256Bytes(SEC.toUtf8(k), SEC.toUtf8(m)), hmacRef(k, m)), 'hmac[' + i + '] keylen=' + k.length);
});

console.log('\n=== 4. Base64 (pure-JS vs Buffer) ===');
[
  SEC.hmacSha256Bytes(SEC.toUtf8(API_KEY), SEC.toUtf8('test')),
  new Uint8Array([0, 1, 2, 250, 255]),
].forEach((b, i) => {
  ok(SEC.b64(b) === Buffer.from(b).toString('base64'), 'b64[' + i + ']');
});

console.log('\n=== 5. Envelope dari klien (secSign) ===');
const env1 = secSign('kirim', { uid: 'abc123', target: '081234567890', amount: 10000 });
ok(typeof env1.payload === 'string' && env1.payload.length > 0, 'payload adalah string JSON');
const parsed = JSON.parse(env1.payload);
ok(parsed.v === 1, 'payload.v === 1');
ok(Number.isInteger(parsed.ts) && Math.abs(Date.now() / 1000 - parsed.ts) < 5, 'payload.ts = unix detik sekarang');
ok(/^[A-Za-z0-9]{8,64}$/.test(parsed.nonce), 'payload.nonce format valid');
ok(parsed.action === 'kirim', 'payload.action terkirim');
ok(parsed.data && parsed.data.amount === 10000, 'payload.data terkirim');
ok(env1.sig === crypto.createHmac('sha256', API_KEY).update(env1.payload, 'utf8').digest('base64'),
  'sig = base64 HMAC-SHA256(payload, API_KEY) — format yang diverifikasi PHP');

/* =====================================================================
 * 6. SIMULASI SERVER — cermin persis logika _secure.php + endpoint
 * ===================================================================== */
const usedNonces = new Set();
const nonceTtl = 600;
let nowSec = Math.floor(Date.now() / 1000);

// cermin pn_check_origin
function checkOrigin(origin, host) {
  if (origin === '' || origin === undefined) return true;
  const m = String(origin).match(/^https?:\/\/([^/:]+)/i);
  if (!m || !m[1]) return true;
  const oh = m[1].toLowerCase();
  const sh = String(host || '').toLowerCase().replace(/:\d+$/, '');
  if (!sh) return true;
  return oh === sh ||
    (oh.length > sh.length + 1 && oh.slice(-(sh.length + 1)) === '.' + sh) ||
    (sh.length > oh.length + 1 && sh.slice(-(oh.length + 1)) === '.' + oh);
}

// cermin pn_verify_envelope (kembali {ok, env, err, code})
function verifyEnvelope(body, opts = {}) {
  const key = opts.key || API_KEY;
  const now = opts.now !== undefined ? opts.now : nowSec;
  const originOk = checkOrigin(opts.origin, opts.host || 'paynusa.example.com');
  if (!originOk) return { ok: false, code: 403, err: 'Origin tidak diizinkan' };
  if (typeof body !== 'object' || body === null || !body.payload || !body.sig) return { ok: false, code: 400, err: 'Payload tidak valid' };
  if (typeof body.payload !== 'string' || typeof body.sig !== 'string' || body.payload === '') return { ok: false, code: 400, err: 'Payload tidak valid' };
  const expect = crypto.createHmac('sha256', key).update(body.payload, 'utf8').digest('base64');
  if (expect !== body.sig) return { ok: false, code: 401, err: 'Tanda tangan tidak valid — akses ditolak' };
  let env; try { env = JSON.parse(body.payload); } catch (e) { return { ok: false, code: 400, err: 'Payload tidak valid' }; }
  if (typeof env !== 'object' || env === null || Array.isArray(env)) return { ok: false, code: 400, err: 'Payload tidak valid' };
  for (const k of ['v', 'ts', 'nonce', 'action', 'data']) if (!(k in env)) return { ok: false, code: 400, err: 'Payload tidak lengkap' };
  if (env.v !== 1) return { ok: false, code: 400, err: 'Versi payload tidak dikenal' };
  if (!Number.isInteger(env.ts) || Math.abs(now - env.ts) > 300) return { ok: false, code: 401, err: 'Permintaan kedaluwarsa (timeout)' };
  if (typeof env.nonce !== 'string' || !/^[A-Za-z0-9]{8,64}$/.test(env.nonce)) return { ok: false, code: 400, err: 'Nonce tidak valid' };
  if (typeof env.action !== 'string' || !/^[a-z_]{2,32}$/.test(env.action)) return { ok: false, code: 400, err: 'Aksi tidak valid' };
  if (typeof env.data !== 'object' || env.data === null || Array.isArray(env.data)) return { ok: false, code: 400, err: 'Data tidak valid' };
  // rate limit: di-simulasikan lewat opts.limit (skip detail)
  // nonce replay (cermin store .nonce_store.json, TTL 600s)
  if (usedNonces.has(env.nonce)) return { ok: false, code: 409, err: 'Permintaan duplikat (replay diblokir)' };
  usedNonces.add(env.nonce);
  return { ok: true, env };
}

// cermin pn_str_field / pn_int_field
function strField(d, k, max) {
  if (typeof d[k] !== 'string') return null;
  const v = d[k].trim();
  return (v === '' || v.length > max) ? null : v;
}
function intField(d, k, min, max) {
  const v = d[k];
  let n;
  // PHP: is_int hanya untuk int murni; JSON 1000.0 -> float -> DITOLAK.
  // Node: tiru dengan Number.isSafeInteger (lebih ketat pada 1e21 dsb).
  if (typeof v === 'number' && Number.isSafeInteger(v)) n = v;
  else if (typeof v === 'string' && /^\d+$/.test(v)) n = parseInt(v, 10);
  else return null;
  if (n < min || n > max) return null;
  return n;
}

// cermin pn_find_user
function findUser(users, id) {
  const s = String(id);
  return users.find(u => [String(u.uid || ''), String(u.user && u.user.phone || ''), String(u.user && u.user.name || ''), String(u.user && u.user.email || '')].includes(s));
}

// ====== MOCK DATA (meniru bentuk manager.php list_users) ======
const store = {
  users: [
    { uid: 'user_alice', user: { name: 'Alice Rahayu', phone: '081111111111', email: 'alice@mail.com' }, balance: 150000, points: 100, settings: {}, pin: '123456', jenis_akun: 'member' },
    { uid: 'user_bob',   user: { name: 'Bob Santoso', phone: '082222222222', email: 'bob@mail.com' }, balance: 25000, points: 50, settings: {}, pin: '654321', jenis_akun: 'member' },
    { uid: 'user_cici',  user: { name: 'Cici', phone: '083333333333', email: 'cici@mail.com' }, balance: 0, points: 0, settings: {}, pin: '', jenis_akun: 'member' },
  ],
};

// ====== MOCK transfer.php action=kirim (cermin alur file PHP) ======
const TF_MIN = 1000, TF_MAX = 999999999;
function mockKirim(env) {
  const d = env.data;
  const uid = strField(d, 'uid', 64);
  const target = strField(d, 'target', 128);
  const amount = intField(d, 'amount', TF_MIN, TF_MAX);
  if (uid === null || target === null) return { code: 400, status: false, message: 'Data tidak lengkap' };
  if (amount === null) return { code: 400, status: false, message: 'Nominal tidak valid — minimal transfer Rp 1.000' };
  const me = findUser(store.users, uid);
  const tgt = findUser(store.users, target);
  if (!me) return { code: 404, status: false, message: 'Akun tidak ditemukan' };
  if (!tgt) return { code: 400, status: false, message: 'Pengguna tujuan tidak ditemukan' };
  if (String(me.uid) === String(tgt.uid)) return { code: 400, status: false, message: 'Tidak bisa transfer ke diri sendiri' };
  const balMe = Number(me.balance) || 0;
  if (balMe < amount) return { code: 400, status: false, message: 'Saldo tidak mencukupi' };
  // (cooldown 30s diuji terpisah di bawah — file limit)
  const newBalance = balMe - amount;
  const ref = 'PN' + String(Date.now()).slice(-8) + String(100000 + Math.floor(Math.random() * 899999));
  const date = new Date().toISOString();
  const kirimTx = { id: 'k' + Math.random().toString(36).slice(2, 9), ref, sid: 'kirim_saldo', serviceName: 'Kirim Saldo', product: 'Transfer ke ' + (tgt.user.name || tgt.uid), customer: tgt.uid, customerName: tgt.user.name || '', amount, admin: 0, discount: 0, total: amount, method: 'Saldo PayNusa', status: 'success', date };
  const rxTx = { id: 'r' + Math.random().toString(36).slice(2, 9), ref, sid: 'terima_saldo', serviceName: 'Terima Saldo', product: 'Transfer dari ' + me.user.name, customer: me.uid, customerName: me.user.name, amount, admin: 0, discount: 0, total: amount, method: 'Terima Saldo', status: 'success', date };
  // write: potong + simpan tx (mock: mutasi store)
  me.balance = newBalance;
  tgt.balance = Number(tgt.balance || 0) + 0; // penerima dikredit saat clientnya klaim (is_claimed) — sesuai sistem lama
  return { code: 200, status: true, message: 'Berhasil mengirim saldo', data: { balance: newBalance, ref, tx: kirimTx, rxTx, target_uid: tgt.uid, target_name: tgt.user.name } };
}

// ====== MOCK pembayaran.php action=debit (cermin alur file PHP) ======
const DEBIT_MIN = 1, DEBIT_MAX = 999999999;
function mockDebit(env) {
  const d = env.data;
  const uid = strField(d, 'uid', 64);
  const amount = intField(d, 'amount', DEBIT_MIN, DEBIT_MAX);
  if (uid === null) return { code: 400, status: false, message: 'Data tidak lengkap' };
  if (amount === null) return { code: 400, status: false, message: 'Nominal tidak valid — nominal harus bilangan bulat positif' };
  const me = findUser(store.users, uid);
  if (!me) return { code: 404, status: false, message: 'Akun tidak ditemukan' };
  const balMe = Number(me.balance) || 0;
  if (balMe < amount) return { code: 400, status: false, message: 'Saldo tidak mencukupi' };
  me.balance = balMe - amount;
  let refId = null;
  if (typeof d.ref === 'string' && d.ref !== '' && d.ref.length <= 40 && /^[A-Za-z0-9_-]+$/.test(d.ref)) refId = d.ref;
  return { code: 200, status: true, message: 'Saldo berhasil dipotong', data: { balance: me.balance, ref: refId } };
}

// helper: kirim aksi valid (sign pakai API_KEY benar)
function call(action, data, opts = {}) {
  const sig = crypto.createHmac('sha256', opts.key || API_KEY).update(JSON.stringify({ v: 1, ts: opts.ts !== undefined ? opts.ts : nowSec, nonce: opts.nonce || ('n' + Math.random().toString(36).slice(2, 10)), action, data }), 'utf8').digest('base64');
  const payload = JSON.stringify({ v: 1, ts: opts.ts !== undefined ? opts.ts : nowSec, nonce: opts.nonce || ('n' + Math.random().toString(36).slice(2, 10)), action, data });
  // pastikan sig sesuai payload (bangun ulang agar konsisten)
  const sig2 = crypto.createHmac('sha256', opts.key || API_KEY).update(payload, 'utf8').digest('base64');
  const body = { payload, sig: sig2 };
  const v = verifyEnvelope(body, opts);
  if (!v.ok) return { code: v.code, status: false, message: v.err, rejected: true };
  if (action === 'kirim') return mockKirim(v.env);
  if (action === 'debit') return mockDebit(v.env);
  if (action === 'cek_tujuan') {
    const uid = strField(v.env.data, 'uid', 64);
    const target = strField(v.env.data, 'target', 128);
    if (uid === null || target === null) return { code: 400, status: false, message: 'Data tidak lengkap' };
    const me = findUser(store.users, uid);
    const tgt = findUser(store.users, target);
    if (!tgt) return { code: 200, status: true, data: { found: false, self: false } };
    return { code: 200, status: true, data: { found: true, self: !!(me && tgt && String(me.uid) === String(tgt.uid)), target_uid: tgt.uid, target_name: tgt.user.name || '' } };
  }
  return { code: 400, status: false, message: 'Aksi tidak dikenal' };
}

console.log('\n=== 6. Validasi envelope (anti canary / forjikan / replay) ===');
{
  const r = call('cek_tujuan', { uid: 'user_alice', target: 'user_bob' });
  ok(r.code === 200 && r.status === true, 'request valid diterima server');
  ok(r.data && r.data.found === true && r.data.self === false && r.data.target_name === 'Bob Santoso', 'cek_tujuan data benar', r.data);

  // tamper payload setelah signing
  const p = JSON.stringify({ v: 1, ts: nowSec, nonce: 'tamper000001', action: 'kirim', data: { uid: 'user_alice', target: 'user_bob', amount: 1000 } });
  const s = crypto.createHmac('sha256', API_KEY).update(p, 'utf8').digest('base64');
  const tampered = p.replace('1000', '99999999');
  let v = verifyEnvelope({ payload: tampered, sig: s });
  ok(!v.ok && v.code === 401, 'payload ditamper -> 401 ditolak', v);

  // key salah
  v = verifyEnvelope({ payload: p, sig: crypto.createHmac('sha256', 'key-salah').update(p, 'utf8').digest('base64') });
  ok(!v.ok && v.code === 401, 'HMAC dengan key salah -> 401', v);

  // ts kedaluwarsa (lampau & masa depan)
  ok(call('kirim', {}, { ts: nowSec - 301, nonce: 'tsL1' }).code === 401, 'ts -301dtk -> 401 (replay lama)');
  ok(call('kirim', {}, { ts: nowSec + 301, nonce: 'tsF1' }).code === 401, 'ts +301dtk -> 401 (clock skew)');

  // replay nonce yang sama
  const nonceReplay = 'replaynonce1';
  const r1 = call('cek_tujuan', { uid: 'user_alice', target: 'user_bob' }, { nonce: nonceReplay });
  const r2 = call('cek_tujuan', { uid: 'user_alice', target: 'user_bob' }, { nonce: nonceReplay });
  ok(r1.status === true && r2.code === 409, 'nonce diulang -> 409 (replay diblokir)');

  // format envelope buruk
  let rb = verifyEnvelope({ payload: 'bukan-json', sig: 'xxx' });
  ok(!rb.ok, 'payload bukan JSON + sig salah -> ditolak', rb);
  rb = verifyEnvelope({ sig: 'x' });
  ok(!rb.ok, 'body tanpa payload -> ditolak', rb);
  const p2 = JSON.stringify({ v: 2, ts: nowSec, nonce: 'vvv1', action: 'kirim', data: {} });
  rb = verifyEnvelope({ payload: p2, sig: crypto.createHmac('sha256', API_KEY).update(p2, 'utf8').digest('base64') });
  ok(!rb.ok && rb.code === 400, 'versi payload != 1 -> 400', rb);
  const p3 = JSON.stringify({ v: 1, ts: nowSec, nonce: 'aaa', action: 'kirim', data: {} });
  rb = verifyEnvelope({ payload: p3, sig: crypto.createHmac('sha256', API_KEY).update(p3, 'utf8').digest('base64') });
  ok(!rb.ok && rb.code === 400, 'nonce terlalu pendek -> 400', rb);
  const p4 = JSON.stringify({ v: 1, ts: nowSec, nonce: 'noncenya1', action: 'KIRIM', data: {} });
  rb = verifyEnvelope({ payload: p4, sig: crypto.createHmac('sha256', API_KEY).update(p4, 'utf8').digest('base64') });
  ok(!rb.ok && rb.code === 400, 'action kapital "KIRIM" -> 400 (regex a-z_)', rb);
  const p5 = JSON.stringify({ v: 1, ts: nowSec, nonce: 'noncenya2', action: 'kirim' });
  rb = verifyEnvelope({ payload: p5, sig: crypto.createHmac('sha256', API_KEY).update(p5, 'utf8').digest('base64') });
  ok(!rb.ok && rb.code === 400, 'field data hilang -> 400', rb);

  // Origin cross-site
  ok(checkOrigin('https://evil.com', 'paynusa.example.com') === false, 'Origin domain lain -> DITOLAK');
  ok(checkOrigin('http://paynusa.example.com:80', 'paynusa.example.com') === true, 'Origin sama (dengan port) -> boleh');
  ok(checkOrigin('https://sub.paynusa.example.com', 'paynusa.example.com') === true, 'Origin subdomain -> boleh');
  ok(checkOrigin('https://paynusa.example.com', 'sub.paynusa.example.com') === true, 'Origin parent vs host sub -> boleh');
  ok(checkOrigin('https://paynusa-evil.com', 'paynusa.example.com') === false, 'Domain mirip "paynusa-evil.com" -> DITOLAK');

  // request langsung tanpa tanda tangan (simulasi canary scanner)
  rb = verifyEnvelope({ payload: '{"v":1,"ts":' + nowSec + ',"nonce":"cany1234","action":"kirim","data":{"uid":"user_alice","target":"user_bob","amount":1000}}', sig: 'AAAA' });
  ok(!rb.ok && rb.code === 401, 'request canary tanpa sig valid -> 401');

  // payload tidak bisa di-decode (sig dibuat dari string bukan JSON valid)
  const pj = 'bukan-json-tapi-string';
  rb = verifyEnvelope({ payload: pj, sig: crypto.createHmac('sha256', API_KEY).update(pj, 'utf8').digest('base64') });
  ok(!rb.ok && rb.code === 400, 'payload sig-valid tapi bukan JSON -> 400', rb);
}

console.log('\n=== 7. Aturan nominal transfer (kirim) ===');
{
  const base = { uid: 'user_alice', target: 'user_bob' };
  ok(call('kirim', { ...base, amount: 0 }).status === false && /Nominal tidak valid/.test(call('kirim', { ...base, amount: 0 }).message), 'amount 0 -> DITOLAK (bukan transfer)');
  ok(call('kirim', { ...base, amount: -50000 }).status === false, 'amount -50000 -> DITOLAK (saldo tak bisa negatif)');
  ok(call('kirim', { ...base, amount: -1 }).status === false, 'amount -1 -> DITOLAK');
  ok(call('kirim', { ...base, amount: 999 }).status === false && /minimal/i.test(call('kirim', { ...base, amount: 999 }).message), 'amount 999 -> DITOLAK (di bawah min 1.000)');
  ok(call('kirim', { ...base, amount: 1000.5 }).status === false, 'amount 1000.5 (desimal) -> DITOLAK');
  ok(call('kirim', { ...base, amount: 'abc' }).status === false, 'amount "abc" -> DITOLAK');
  ok(call('kirim', { ...base, amount: '1000.5' }).status === false, 'amount "1000.5" (string desimal) -> DITOLAK');
  ok(call('kirim', { ...base, amount: null }).status === false, 'amount null -> DITOLAK');
  ok(call('kirim', { ...base, amount: 1000000000000 }).status === false, 'amount > 999.999.999 -> DITOLAK');

  // valid
  const b0 = store.users[0].balance;
  const r = call('kirim', { ...base, amount: 10000 });
  ok(r.status === true && r.data.balance === b0 - 10000, 'amount 10000 valid -> saldo pengirim terpotong', r.data && r.data.balance);
  ok(r.data.tx && r.data.tx.sid === 'kirim_saldo' && r.data.tx.total === 10000 && r.data.tx.ref.startsWith('PN'), 'tx kirim berbentuk sesuai sistem lama');
  ok(r.data.rxTx && r.data.rxTx.sid === 'terima_saldo' && r.data.rxTx.customer === 'user_alice', 'rxTx (Terima Saldo) dibuat untuk penerima');
  ok(String(r.data.tx.ref) === String(r.data.rxTx.ref), 'ref kirim == ref terima (pasangan)');
  ok(r.data.balance === store.users[0].balance, 'saldo store sinkron dengan respon');

  // saldo kurang
  ok(call('kirim', { uid: 'user_bob', target: 'user_alice', amount: 999999999 }).message === 'Saldo tidak mencukupi', 'saldo kurang -> "Saldo tidak mencukupi"');
  // saldo 0
  ok(call('kirim', { uid: 'user_cici', target: 'user_bob', amount: 1000 }).message === 'Saldo tidak mencukupi', 'penyimbang saldo 0 -> DITOLAK');
  // ke diri sendiri
  ok(call('kirim', { uid: 'user_alice', target: 'user_alice', amount: 1000 }).message === 'Tidak bisa transfer ke diri sendiri', 'transfer ke diri sendiri -> DITOLAK');
  ok(call('kirim', { uid: 'user_alice', target: '081111111111', amount: 1000 }).message === 'Tidak bisa transfer ke diri sendiri', 'tujuan = no HP diri sendiri -> DITOLAK');
  // tujuan tak ada
  ok(call('kirim', { uid: 'user_alice', target: 'ghost123', amount: 1000 }).message === 'Pengguna tujuan tidak ditemukan', 'tujuan tak dikenal -> DITOLAK');
  // akun sendiri tak ada
  ok(call('kirim', { uid: 'ghost', target: 'user_bob', amount: 1000 }).code === 404, 'akun pengirim tak dikenal -> 404');
  // lookup via nama / email (sesuai sistem lama)
  ok(call('cek_tujuan', { uid: 'user_alice', target: 'Bob Santoso' }).data.found === true, 'cek_tujuan via nama lengkap');
  ok(call('cek_tujuan', { uid: 'user_alice', target: 'bob@mail.com' }).data.found === true, 'cek_tujuan via email');
  ok(call('cek_tujuan', { uid: 'user_alice', target: '082222222222' }).data.found === true, 'cek_tujuan via no HP');
  ok(call('cek_tujuan', { uid: 'user_alice', target: 'ghost' }).data.found === false, 'cek_tujuan tak ditemukan -> found:false');
}

console.log('\n=== 8. Cooldown 30 detik (transfer) ===');
{
  // cermin file .tflimit_<uid>.ts
  const lastTf = {};
  function cooldownCheck(uid, now) {
    const last = lastTf[uid] || 0;
    return now - last >= 30 ? (lastTf[uid] = now, true) : false;
  }
  const nowT = 1000000;
  ok(cooldownCheck('user_alice', nowT) === true, 'transfer pertama -> boleh');
  ok(cooldownCheck('user_alice', nowT + 10) === false, '10 dtk kemudian -> DITOLAK (cooldown)');
  ok(cooldownCheck('user_alice', nowT + 29) === false, '29 dtk kemudian -> DITOLAK');
  ok(cooldownCheck('user_alice', nowT + 30) === true, '30 dtk kemudian -> boleh');
}

console.log('\n=== 9. Aturan pemotongan saldo (pembayaran debit) ===');
{
  const b = store.users[1].balance; // bob
  const r0 = call('debit', { uid: 'user_bob', amount: 0 });
  ok(r0.status === false && /Nominal tidak valid/.test(r0.message), 'debit 0 -> DITOLAK');
  ok(call('debit', { uid: 'user_bob', amount: -100 }).status === false, 'debit -100 -> DITOLAK');
  ok(call('debit', { uid: 'user_bob', amount: 12.5 }).status === false, 'debit 12.5 desimal -> DITOLAK');
  ok(call('debit', { uid: 'user_bob', amount: 1000000000000 }).status === false, 'debit > max -> DITOLAK');

  const r = call('debit', { uid: 'user_bob', amount: 20000, ref: 'PN12345678123456' });
  ok(r.status === true && r.data.balance === b - 20000, 'debit 20000 valid -> saldo terpotong', r.data);
  ok(r.data.ref === 'PN12345678123456', 'ref dipetakan ke transaksi');

  const b2 = store.users[1].balance;
  const r2 = call('debit', { uid: 'user_bob', amount: b2 });
  ok(r2.status === true && r2.data.balance === 0, 'debit seluruh saldo -> saldo 0 (bukan negatif)');
  ok(call('debit', { uid: 'user_bob', amount: 1 }).message === 'Saldo tidak mencukupi', 'debit saat saldo 0 -> DITOLAK');
  ok(call('debit', { uid: 'ghost', amount: 1000 }).code === 404, 'debit akun tak dikenal -> 404');
  // lookup via no HP
  const r3 = call('debit', { uid: '081111111111', amount: 1 });
  ok(r3.status === true, 'debit via no HP (fallback S.uid kosong) -> berhasil');
}

console.log('\n=== 10. Skenario end-to-end (alur client index.html) ===');
{
  // Client: prosesKirimSaldo -> cek_tujuan -> kirim (sign dengan API_KEY client)
  const clientPayload = JSON.stringify({ v: 1, ts: nowSec, nonce: 'e2e00001', action: 'kirim', data: { uid: 'user_alice', target: '082222222222', amount: 25000 } });
  const clientSig = crypto.createHmac('sha256', API_KEY).update(clientPayload, 'utf8').digest('base64');
  // server memverifikasi persis seperti _secure.php (hash_equals vs base64)
  const v = verifyEnvelope({ payload: clientPayload, sig: clientSig });
  ok(v.ok, 'e2e: envelope client lolos verifikasi server');
  const balBefore = findUser(store.users, 'user_alice').balance;
  const out = mockKirim(v.env);
  ok(out.status === true && out.data.balance === balBefore - 25000, 'e2e: transfer 25rb sukses, saldo pengirim terpotong tepat', out.data && out.data.balance);

  // Client: payNow metode saldo -> debit
  const p2 = JSON.stringify({ v: 1, ts: nowSec, nonce: 'e2e00002', action: 'debit', data: { uid: 'user_alice', amount: 5000, ref: 'PN55500011' } });
  const s2 = crypto.createHmac('sha256', API_KEY).update(p2, 'utf8').digest('base64');
  const v2 = verifyEnvelope({ payload: p2, sig: s2 });
  const out2 = v2.ok ? mockDebit(v2.env) : v2;
  ok(out2.status === true, 'e2e: debit pembayaran via API berhasil');
  ok(typeof out2.data.balance === 'number' && out2.data.balance >= 0, 'e2e: saldo baru non-negatif dikembalikan ke client', out2.data && out2.data.balance);
}

console.log('\n================= HASIL =================');
console.log('PASS: ' + pass + '   FAIL: ' + fail);
process.exit(fail ? 1 : 0);
