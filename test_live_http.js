/* =====================================================================
 * LIVE HTTP TEST — klien asli (dikestrak dari index.html) <-> server
 * Node yang CERMINKAN logika PHP (_secure.php + transfer.php +
 * pembayaran.php) termasuk verifkasi HMAC, ts, nonce, origin, dan
 * validasi nominal. Membuktikan alur nyata lewat HTTP JSON.
 * ===================================================================== */
const http = require('http');
const crypto = require('crypto');
const fs = require('fs');

const html = fs.readFileSync('index.html', 'utf8');
const secJs = html.slice(html.indexOf('const API_KEY = '), html.indexOf('/* ==================== KATALOG LAYANAN'));
const { API_KEY, SEC, secSign, callSecureApi } = new Function(secJs + '\nreturn { API_KEY, SEC, secSign, callSecureApi };')();

const usedNonces = new Map(); // nonce -> ts
const store = {
  users: [
    { uid: 'alice01', user: { name: 'Alice Rahayu', phone: '081111111111', email: 'alice@mail.com' }, balance: 150000, points: 100, settings: {}, pin: '123456', jenis_akun: 'member' },
    { uid: 'bob0001', user: { name: 'Bob Santoso', phone: '082222222222', email: 'bob@mail.com' }, balance: 30000, points: 50, settings: {}, pin: '654321', jenis_akun: 'member' },
  ],
};

function strField(d, k, max) {
  if (typeof d[k] !== 'string') return null;
  const v = d[k].trim();
  return (v === '' || v.length > max) ? null : v;
}
function intField(d, k, min, max) {
  const v = d[k];
  let n;
  if (typeof v === 'number' && Number.isSafeInteger(v)) n = v;
  else if (typeof v === 'string' && /^\d+$/.test(v)) n = parseInt(v, 10);
  else return null;
  if (n < min || n > max) return null;
  return n;
}
function findUser(id) {
  const s = String(id);
  return store.users.find(u => [String(u.uid), String(u.user.phone), String(u.user.name), String(u.user.email)].includes(s));
}

// CERMIN pn_verify_envelope
function verify(req, rawBody) {
  const fail = (code, msg) => ({ ok: false, code, message: msg });
  if (req.method !== 'POST') return fail(405, 'Metode tidak diizinkan');
  // origin
  const origin = req.headers.origin || '';
  if (origin !== '') {
    const m = String(origin).match(/^https?:\/\/([^/:]+)/i);
    const host = (req.headers.host || '').toLowerCase().replace(/:\d+$/, '');
    if (m && host) {
      const oh = m[1].toLowerCase(), sh = host;
      const same = oh === sh || (oh.length > sh.length + 1 && oh.slice(-(sh.length + 1)) === '.' + sh) || (sh.length > oh.length + 1 && sh.slice(-(oh.length + 1)) === '.' + oh);
      if (!same) return fail(403, 'Origin tidak diizinkan');
    }
  }
  if (!rawBody || rawBody.length > 65536) return fail(400, 'Payload tidak valid');
  let body; try { body = JSON.parse(rawBody); } catch (e) { return fail(400, 'Payload tidak valid'); }
  if (!body || typeof body.payload !== 'string' || typeof body.sig !== 'string' || body.payload === '') return fail(400, 'Payload tidak valid');
  const expect = crypto.createHmac('sha256', API_KEY).update(body.payload, 'utf8').digest('base64');
  if (expect !== body.sig) return fail(401, 'Tanda tangan tidak valid — akses ditolak');
  let env; try { env = JSON.parse(body.payload); } catch (e) { return fail(400, 'Payload tidak valid'); }
  for (const k of ['v', 'ts', 'nonce', 'action', 'data']) if (!(k in env)) return fail(400, 'Payload tidak lengkap');
  if (env.v !== 1) return fail(400, 'Versi payload tidak dikenal');
  const now = Math.floor(Date.now() / 1000);
  if (!Number.isInteger(env.ts) || Math.abs(now - env.ts) > 300) return fail(401, 'Permintaan kedaluwarsa (timeout)');
  if (!/^[A-Za-z0-9]{8,64}$/.test(env.nonce)) return fail(400, 'Nonce tidak valid');
  if (!/^[a-z_]{2,32}$/.test(env.action)) return fail(400, 'Aksi tidak valid');
  if (typeof env.data !== 'object' || env.data === null || Array.isArray(env.data)) return fail(400, 'Data tidak valid');
  if (usedNonces.has(env.nonce)) return fail(409, 'Permintaan duplikat (replay diblokir)');
  usedNonces.set(env.nonce, now);
  return { ok: true, env };
}

function resJSON(res, code, obj) {
  res.writeHead(code, { 'Content-Type': 'application/json; charset=utf-8', 'X-Content-Type-Options': 'nosniff', 'X-Frame-Options': 'DENY', 'Cache-Control': 'no-store' });
  res.end(JSON.stringify(obj));
}

// CERMIN transfer.php
function handleTransfer(req, res, env) {
  const d = env.data;
  if (env.action === 'cek_tujuan') {
    const uid = strField(d, 'uid', 64), target = strField(d, 'target', 128);
    if (uid === null || target === null) return resJSON(res, 400, { status: false, message: 'Data tidak lengkap', data: null });
    const me = findUser(uid), tgt = findUser(target);
    if (!tgt) return resJSON(res, 200, { status: true, message: '', data: { found: false, self: false } });
    return resJSON(res, 200, { status: true, message: '', data: { found: true, self: !!(me && String(me.uid) === String(tgt.uid)), target_uid: tgt.uid, target_name: tgt.user.name } });
  }
  if (env.action === 'kirim') {
    const uid = strField(d, 'uid', 64), target = strField(d, 'target', 128), amount = intField(d, 'amount', 1000, 999999999);
    if (uid === null || target === null) return resJSON(res, 400, { status: false, message: 'Data tidak lengkap', data: null });
    if (amount === null) return resJSON(res, 400, { status: false, message: 'Nominal tidak valid — minimal transfer Rp 1.000', data: null });
    const me = findUser(uid), tgt = findUser(target);
    if (!me) return resJSON(res, 404, { status: false, message: 'Akun tidak ditemukan', data: null });
    if (!tgt) return resJSON(res, 400, { status: false, message: 'Pengguna tujuan tidak ditemukan', data: null });
    if (String(me.uid) === String(tgt.uid)) return resJSON(res, 400, { status: false, message: 'Tidak bisa transfer ke diri sendiri', data: null });
    if (Number(me.balance) < amount) return resJSON(res, 400, { status: false, message: 'Saldo tidak mencukupi', data: null });
    const newBalance = Number(me.balance) - amount;
    const ref = 'PN' + String(Date.now()).slice(-8) + String(100000 + Math.floor(Math.random() * 899999));
    const date = new Date().toISOString();
    me.balance = newBalance;
    const tx = { id: 'k' + Math.random().toString(36).slice(2, 9), ref, sid: 'kirim_saldo', serviceName: 'Kirim Saldo', product: 'Transfer ke ' + tgt.user.name, customer: tgt.uid, customerName: tgt.user.name, amount, admin: 0, discount: 0, total: amount, method: 'Saldo PayNusa', status: 'success', date };
    return resJSON(res, 200, { status: true, message: 'Berhasil mengirim saldo', data: { balance: newBalance, ref, tx, target_uid: tgt.uid, target_name: tgt.user.name } });
  }
  return resJSON(res, 400, { status: false, message: 'Aksi tidak dikenal', data: null });
}

// CERMIN pembayaran.php
function handlePembayaran(req, res, env) {
  const d = env.data;
  if (env.action === 'debit') {
    const uid = strField(d, 'uid', 64), amount = intField(d, 'amount', 1, 999999999);
    if (uid === null) return resJSON(res, 400, { status: false, message: 'Data tidak lengkap', data: null });
    if (amount === null) return resJSON(res, 400, { status: false, message: 'Nominal tidak valid — nominal harus bilangan bulat positif', data: null });
    const me = findUser(uid);
    if (!me) return resJSON(res, 404, { status: false, message: 'Akun tidak ditemukan', data: null });
    if (Number(me.balance) < amount) return resJSON(res, 400, { status: false, message: 'Saldo tidak mencukupi', data: null });
    me.balance = Number(me.balance) - amount;
    let refId = null;
    if (typeof d.ref === 'string' && d.ref && d.ref.length <= 40 && /^[A-Za-z0-9_-]+$/.test(d.ref)) refId = d.ref;
    return resJSON(res, 200, { status: true, message: 'Saldo berhasil dipotong', data: { balance: me.balance, ref: refId } });
  }
  return resJSON(res, 400, { status: false, message: 'Aksi tidak dikenal', data: null });
}

const server = http.createServer((req, res) => {
  let raw = '';
  req.on('data', (c) => { raw += c; });
  req.on('end', () => {
    const v = verify(req, raw);
    if (!v.ok) return resJSON(res, v.code, { status: false, message: v.message, data: null });
    if (req.url.startsWith('/api/transfer.php')) return handleTransfer(req, res, v.env);
    if (req.url.startsWith('/api/pembayaran.php')) return handlePembayaran(req, res, v.env);
    resJSON(res, 404, { status: false, message: 'Not found', data: null });
  });
});

let pass = 0, fail = 0;
const ok = (cond, name, extra) => { if (cond) { pass++; console.log('  PASS  ' + name); } else { fail++; console.log('  FAIL  ' + name + (extra !== undefined ? '  -> ' + JSON.stringify(extra) : '')); } };

server.listen(0, '127.0.0.1', async () => {
  const base = 'http://127.0.0.1:' + server.address().port;
  console.log('Server mirror PHP di', base);

  console.log('\n=== A. Klien asli index.html (callSecureApi) via HTTP ===');
  let r = await callSecureApi(base + '/api/transfer.php', 'cek_tujuan', { uid: 'alice01', target: '082222222222' });
  ok(r.status === true && r.data.found === true && r.data.target_name === 'Bob Santoso', 'cek_tujuan via callSecureApi', r);

  const balBefore = store.users[0].balance;
  r = await callSecureApi(base + '/api/transfer.php', 'kirim', { uid: 'alice01', target: 'bob0001', amount: 20000 });
  ok(r.status === true && r.data.balance === balBefore - 20000 && r.data.tx.sid === 'kirim_saldo', 'kirim via callSecureApi -> saldo terpotong', r.data);
  ok(r.data.tx.total === 20000 && r.data.tx.method === 'Saldo PayNusa', 'tx berbentuk sesuai sistem lama');

  const balB = store.users[1].balance;
  r = await callSecureApi(base + '/api/pembayaran.php', 'debit', { uid: 'bob0001', amount: 10000, ref: 'PN77700011' });
  ok(r.status === true && r.data.balance === balB - 10000 && r.data.ref === 'PN77700011', 'debit via callSecureApi -> saldo terpotong', r.data);

  console.log('\n=== B. Serangan langsung (bypass klien, fetch manual) ===');
  // 1) request polos tanpa envelope (simulasi canary/scanner)
  let raw = await fetch(base + '/api/transfer.php', { method: 'POST', headers: { 'Content-Type': 'application/json' }, body: JSON.stringify({ action: 'kirim', amount: -5000 }) }).then(x => x.json());
  ok(raw.status === false && raw.message === 'Payload tidak valid', 'canary polos -> 400 Payload tidak valid', raw);

  // 2) envelope tanpa tanda tangan
  raw = await fetch(base + '/api/transfer.php', { method: 'POST', body: JSON.stringify({ payload: JSON.stringify({ v: 1, ts: Math.floor(Date.now() / 1000), nonce: 'attk000001', action: 'kirim', data: { uid: 'alice01', target: 'bob0001', amount: 1000 } }) }) }).then(x => x.json());
  ok(raw.status === false, 'envelope tanpa sig -> ditolak', raw);

  // 3) tanda tangan dengan KEY SALAH
  const p3 = JSON.stringify({ v: 1, ts: Math.floor(Date.now() / 1000), nonce: 'attk000002', action: 'kirim', data: { uid: 'alice01', target: 'bob0001', amount: 1000 } });
  raw = await fetch(base + '/api/transfer.php', { method: 'POST', body: JSON.stringify({ payload: p3, sig: crypto.createHmac('sha256', 'key-penyerang').update(p3).digest('base64') }) }).then(x => x.json());
  ok(raw.status === false && raw.message.includes('Tanda tangan'), 'key salah -> 401', raw);

  // 4) replay: kirim 2x body yang sama persis
  const p4 = JSON.stringify({ v: 1, ts: Math.floor(Date.now() / 1000), nonce: 'attk000003', action: 'debit', data: { uid: 'alice01', amount: 10000 } });
  const s4 = crypto.createHmac('sha256', API_KEY).update(p4).digest('base64');
  const r4a = await fetch(base + '/api/pembayaran.php', { method: 'POST', body: JSON.stringify({ payload: p4, sig: s4 }) }).then(x => x.json());
  const r4b = await fetch(base + '/api/pembayaran.php', { method: 'POST', body: JSON.stringify({ payload: p4, sig: s4 }) }).then(x => x.json());
  ok(r4a.status === true && r4b.status === false && r4b.message.includes('duplikat'), 'replay 2x -> kali ke-2 ditolak (409)', { a: r4a.status, b: r4b.message });

  // 5) nominal negatif via attacker dengan KEY BENER (worst case: key bocor)
  const p5 = JSON.stringify({ v: 1, ts: Math.floor(Date.now() / 1000), nonce: 'attk000004', action: 'kirim', data: { uid: 'alice01', target: 'bob0001', amount: -100000 } });
  raw = await fetch(base + '/api/transfer.php', { method: 'POST', body: JSON.stringify({ payload: p5, sig: crypto.createHmac('sha256', API_KEY).update(p5).digest('base64') }) }).then(x => x.json());
  ok(raw.status === false && raw.message.includes('Nominal tidak valid'), 'key bocor + nominal negatif -> TETAP DITOLAK server', raw);
  ok(store.users[0].balance > 0, 'saldo tidak berubah (tidak ada exploit negatif)');

  // 6) nominal 0
  const p6 = JSON.stringify({ v: 1, ts: Math.floor(Date.now() / 1000), nonce: 'attk000005', action: 'debit', data: { uid: 'alice01', amount: 0 } });
  raw = await fetch(base + '/api/pembayaran.php', { method: 'POST', body: JSON.stringify({ payload: p6, sig: crypto.createHmac('sha256', API_KEY).update(p6).digest('base64') }) }).then(x => x.json());
  ok(raw.status === false && raw.message.includes('Nominal tidak valid'), 'key bocor + nominal 0 -> TETAP DITOLAK server', raw);

  // 7) origin cross-site (raw http agar header Origin pasti terkirim)
  const p7 = JSON.stringify({ v: 1, ts: Math.floor(Date.now() / 1000), nonce: 'attk000006', action: 'debit', data: { uid: 'alice01', amount: 1000 } });
  const body7 = JSON.stringify({ payload: p7, sig: crypto.createHmac('sha256', API_KEY).update(p7).digest('base64') });
  raw = await new Promise((resolve, reject) => {
    const req = http.request(base + '/api/pembayaran.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json', 'Origin': 'https://evil.com', 'Content-Length': Buffer.byteLength(body7) },
    }, (res) => { let d = ''; res.on('data', (c) => d += c); res.on('end', () => resolve({ http: res.statusCode, ...JSON.parse(d) })); });
    req.on('error', reject);
    req.end(body7);
  });
  ok(raw.http === 403 && raw.status === false && raw.message === 'Origin tidak diizinkan', 'origin evil.com -> 403', raw);
  // kontrol: origin yang sama dengan host -> boleh
  const p7b = JSON.stringify({ v: 1, ts: Math.floor(Date.now() / 1000), nonce: 'attk000007', action: 'debit', data: { uid: 'alice01', amount: 1000 } });
  const body7b = JSON.stringify({ payload: p7b, sig: crypto.createHmac('sha256', API_KEY).update(p7b).digest('base64') });
  raw = await new Promise((resolve, reject) => {
    const req = http.request(base + '/api/pembayaran.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json', 'Origin': base, 'Content-Length': Buffer.byteLength(body7b) },
    }, (res) => { let d = ''; res.on('data', (c) => d += c); res.on('end', () => resolve({ http: res.statusCode, ...JSON.parse(d) })); });
    req.on('error', reject);
    req.end(body7b);
  });
  ok(raw.http === 200 && raw.status === true, 'origin sama dengan host -> diizinkan', raw);

  // 8) GET (bukan POST)
  raw = await fetch(base + '/api/transfer.php').then(x => x.json());
  ok(raw.status === false && raw.message === 'Metode tidak diizinkan', 'GET -> 405', raw);

  server.close();
  console.log('\n================= HASIL =================');
  console.log('PASS: ' + pass + '   FAIL: ' + fail);
  process.exit(fail ? 1 : 0);
});
