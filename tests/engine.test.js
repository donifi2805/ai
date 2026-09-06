/* ============================================================================
 * UJI MESIN PRESISI TestrxBox Tools v4.0  (tanpa browser, cukup: node)
 * Cara pakai :  node tests/engine.test.js
 * Sumber uji : skrip di dalam ../testrx.php (atau ../index.html)
 * ========================================================================== */
"use strict";
const fs = require("fs");
const path = require("path");

/* ---------- Stub DOM (hanya yang disentuh saat skrip dimuat) ---------- */
function makeEl() {
  const cls = new Set();
  return {
    className: "", checked: false, value: "", innerHTML: "", textContent: "", dataset: {},
    classList: {
      add: c => cls.add(c), remove: c => cls.delete(c), contains: c => cls.has(c),
      toggle: c => (cls.has(c) ? cls.delete(c) : cls.add(c)),
      replace: (a, b) => { cls.delete(a); cls.add(b); }
    },
    style: { setProperty() { }, removeProperty() { }, cssText: "" },
    appendChild() { }, remove() { }, addEventListener() { }, scrollIntoView() { },
    focus() { }, select() { }, setSelectionRange() { }, clientWidth: 400, scrollTop: 0, scrollHeight: 0
  };
}
global.document = {
  addEventListener() { }, getElementById: () => makeEl(), createElement: () => makeEl(),
  querySelectorAll: () => [], body: makeEl(), activeElement: null, execCommand: () => false
};
global.window = { addEventListener() { }, fetch: async () => ({ ok: false }), isSecureContext: true, innerWidth: 1200, innerHeight: 800 };
global.localStorage = { _d: {}, getItem(k) { return this._d[k] || null; }, setItem(k, v) { this._d[k] = String(v); }, removeItem(k) { delete this._d[k]; } };
function defineGlobal(name, value) {
  try { global[name] = value; }
  catch (e) { Object.defineProperty(global, name, { value: value, configurable: true, writable: true }); }
}
defineGlobal("navigator", { clipboard: null });
defineGlobal("Blob", class { constructor(parts) { this.size = (parts || []).map(String).join("").length; } });
defineGlobal("URL", { createObjectURL: () => "blob:x", revokeObjectURL() { } });
global.alert = () => { }; global.prompt = () => null; global.confirm = () => true;
global.setInterval = () => 0;

/* ---------- Ambil skrip utama dari berkas alat ---------- */
const htmlPath = process.argv[2] || path.join(__dirname, "..", "testrx.php");
const html = fs.readFileSync(htmlPath, "utf8");
const blocks = [];
const re = /<script>\s*([\s\S]*?)\s*<\/script>/g;
let mm;
while ((mm = re.exec(html)) !== null) blocks.push(mm[1]);
if (!blocks.length) { console.error("Skrip utama tidak ditemukan di " + htmlPath); process.exit(2); }
const code = blocks.reduce((a, b) => (b.length > a.length ? b : a));
console.log("Sumber uji: " + path.basename(htmlPath) + " (" + (html.length / 1024).toFixed(0) + " KB, skrip " + code.split("\n").length + " baris)");

eval(code + "\n;globalThis.__T = { RX: RX, ENGINE: ENGINE, SETTINGS: SETTINGS };");
const { RX, ENGINE, SETTINGS } = globalThis.__T;

/* ---------- Kerangka uji ---------- */
let pass = 0, fail = 0;
function ok(name, cond, extra) {
  if (cond) { pass++; console.log("  ✅ " + name); }
  else { fail++; console.log("  ❌ " + name + (extra !== undefined ? "\n     → " + extra : "")); }
}
function section(t) { console.log("\n▸ " + t); }
function run(src, cmds, opts, st) { return ENGINE.runPipeline(src, cmds, st || SETTINGS, opts || {}); }

/* ================= 1. EXACT ================= */
section("1. Pencocokan EXACT 1:1 + replace");
const src1 = [
  "<!DOCTYPE html>", "<html>", "  <body>",
  '    <h1 id="judul">Teks Lama</h1>',
  '    <div class="kartu">', "      <p>isi lama</p>", "    </div>",
  "  </body>", "</html>"
].join("\n");
let r = run(src1, [{ snippet: '    <h1 id="judul">Teks Baru</h1>', target: '    <h1 id="judul">Teks Lama</h1>', endTarget: "", action: "replace", regex: false, global: false }]);
ok("eksekusi sukses", r.ok === true, JSON.stringify(r.report[0].errors || r.report[0].error));
ok("teks lama hilang", r.output.indexOf("Teks Lama") === -1);
ok("teks baru ada", r.output.indexOf("Teks Baru") !== -1);
ok("tier = EXACT", r.report[0].tier === "EXACT 1:1", r.report[0].tier);
ok("jumlah baris tetap", r.output.split("\n").length === src1.split("\n").length);
ok("laporan lokasi baris 4", /baris 4/.test(r.report[0].lines.join(",")), r.report[0].lines.join(","));

/* ================= 2. SMART WHITESPACE ================= */
section("2. Pencocokan toleran whitespace / EOL");
r = run(src1, [{ snippet: "GANTI", target: '<h1 id="judul">Teks Lama</h1>', action: "replace" }]);
ok("target tanpa indentasi tetap ditemukan", r.ok === true, r.report[0].error);
ok("cocok sebagai substring EXACT", r.report[0].tier === RX.TIER.EXACT, r.report[0].tier);

r = run(src1, [{ snippet: "GANTI2", target: '<h1   id="judul" >Teks    Lama</h1>', action: "replace" }]);
ok("spasi internal berbeda tetap ditemukan", r.ok === true, r.report[0].error);
ok("tier = WS-STRIPPED (usaha terakhir)", r.report[0].tier === RX.TIER.STRIP, r.report[0].tier);
ok("ada peringatan tier longgar", r.report[0].warns.join(" ").indexOf("WS-STRIPPED") !== -1, r.report[0].warns.join(" | "));
ok("penggantian tepat di lokasi h1", r.output.indexOf('GANTI2\n    <div class="kartu">') !== -1, JSON.stringify(r.output.split("\n").slice(2, 6)));

r = run('<div   class="a"\n     id="b">x</div>', [{ snippet: "OK", target: '<div class="a" id="b">', action: "replace" }]);
ok("atribut ter-wrap newline tetap cocok (tier CANON)", r.ok === true && r.report[0].tier === RX.TIER.CANON, r.output + " | " + r.report[0].tier + " | " + r.report[0].error);

const srcCrlf = src1.replace(/\n/g, "\r\n");
r = run(srcCrlf, [{ snippet: "GANTI", target: '<h1 id="judul">Teks Lama</h1>', action: "replace" }]);
ok("sumber CRLF tetap cocok", r.ok === true, r.report[0].error);
ok("EOL terdeteksi CRLF", r.eol === "CRLF", r.eol);
ok("keluaran mempertahankan CRLF", /\r\n/.test(r.output) && r.output.split("\r\n").length === 9);

const srcTab = src1.replace(/    <h1/, "\t<h1").replace(/ {6}<p/, "\t\t<p");
r = run(srcTab, [{ snippet: "X", target: '      <p>isi lama</p>', action: "replace" }]);
ok("tab vs spasi ditoleransi", r.ok === true, r.report[0].error);

/* ================= 3. RENTANG ================= */
section("3. Rentang target → endTarget");
r = run(src1, [{ snippet: '    <div class="kartu">\n      <span>blok baru</span>\n    </div>', target: '    <div class="kartu">', endTarget: "    </div>", action: "replace" }]);
ok("rentang diganti", r.ok === true, r.report[0].error);
ok("isi lama di tengah hangus", r.output.indexOf("isi lama") === -1);
ok("blok baru utuh", r.output.indexOf("<span>blok baru</span>") !== -1);
ok("jumlah </div> tetap 1", (r.output.match(/<\/div>/g) || []).length === 1);
ok("endTier terisi", !!r.report[0].endTier, r.report[0].endTier);

r = run(src1, [{ snippet: "SISIP", target: '    <div class="kartu">', endTarget: "    </div>", action: "replace", includeEnd: false }]);
ok("includeEnd=false mempertahankan endTarget", r.ok && /SISIP\n {0,4}<\/div>/.test(r.output), JSON.stringify(r.output.split("\n").slice(4, 7)));

r = run(src1, [{ snippet: "", target: '    <div class="kartu">', endTarget: "    </div>", action: "delete" }]);
ok("action delete menghapus blok + barisnya", r.ok && r.output.indexOf("kartu") === -1 && r.output.split("\n").length === 6, r.output);

r = run(src1, [{ snippet: "X", target: '    <div class="kartu">', endTarget: "TIDAK_ADA_DI_FILE", action: "replace" }]);
ok("endTarget hilang → eksekusi ditolak", r.ok === false);
ok("pesan error menyebut endTarget", /endTarget/.test(String(r.report[0].errors || r.report[0].error)));

r = run(src1, [{ snippet: "X", target: '    <div class="kartu">', endTarget: "TIDAK_ADA_DI_FILE", action: "replace", endTargetRequired: false }]);
ok("endTargetRequired=false → fallback ke target saja", r.ok === true, r.report[0].error);
ok("ada peringatan fallback", r.report[0].warns.join(" ").indexOf("dipersempit") !== -1);

/* ================= 4. INSERT ================= */
section("4. insertBefore / insertAfter + indentasi cerdas");
r = run(src1, [{ snippet: '<button id="baru">Klik</button>', target: '    <div class="kartu">', action: "insertAfter" }]);
ok("insertAfter sukses", r.ok === true, r.report[0].error);
ok("target tetap utuh", r.output.indexOf('    <div class="kartu">') !== -1);
ok("snippet mendapat indentasi baris target", r.output.indexOf('    <div class="kartu">\n    <button id="baru">Klik</button>\n') !== -1, JSON.stringify(r.output.split("\n").slice(3, 7)));

r = run(src1, [{ snippet: "<!-- sisip atas -->", target: '    <h1 id="judul">Teks Lama</h1>', action: "insertBefore" }]);
ok("insertBefore sukses", r.ok === true);
ok("posisi di atas target + indentasi", r.output.indexOf("    <!-- sisip atas -->\n    <h1") !== -1, JSON.stringify(r.output.split("\n").slice(2, 5)));

r = run(src1, [{ snippet: "  baris1\nbaris2", target: '    <h1 id="judul">Teks Lama</h1>', action: "insertAfter" }]);
ok("snippet multiline di-reindent", r.ok && r.output.indexOf("    baris1\n    baris2") !== -1, JSON.stringify(r.output.split("\n").slice(3, 7)));

/* ================= 5. GLOBAL / OCCURRENCE ================= */
section("5. global, occurrence, mode ketat");
const src2 = ['<li class="item">A</li>', '<li class="item">B</li>', '<li class="item">C</li>'].join("\n");
r = run(src2, [{ snippet: "X", target: '<li class="item">', action: "replace" }]);
ok("bawaan: hanya kecocokan pertama", r.ok && r.output.indexOf("XA</li>") === 0 && r.output.indexOf("B") !== -1, r.output);

r = run(src2, [{ snippet: "X", target: '<li class="item">', action: "replace", global: true }]);
ok("global=true mengubah semua", r.ok && (r.output.match(/X/g) || []).length === 3, r.output);
ok("peringatan mode global muncul", r.report[0].warns.join(" ").indexOf("global") !== -1);

r = run(src2, [{ snippet: "Y", target: '<li class="item">', action: "replace", occurrence: 2 }]);
ok("occurrence=2 memilih kecocokan kedua", r.ok && r.output.indexOf("YB</li>") !== -1 && r.output.indexOf(">A<") !== -1, r.output);

r = run(src2, [{ snippet: "Z", target: '<li class="item">', action: "replace", occurrence: 9 }]);
ok("occurrence melebihi jumlah → ditolak", r.ok === false && /occurrence/i.test(String(r.report[0].errors || r.report[0].error)));

r = run(src2, [{ snippet: "Z", target: '<li class="item">', action: "replace" }], {}, Object.assign({}, SETTINGS, { strictUniqueness: true }));
ok("strictUniqueness menolak target tak unik", r.ok === false && /ketat/i.test(String(r.report[0].errors || r.report[0].error)));

/* ================= 6. REGEX ================= */
section("6. Mode regex");
const src3 = '<div id="kotak_1730001">A</div>\n<div id="kotak_8842">B</div>';
r = run(src3, [{ snippet: "<!-- dibuang -->", target: '<div id="kotak_\\d+">.*?<\\/div>', action: "replace", regex: true, global: true }]);
ok("regex global mengganti kedua div dinamis", r.ok && (r.output.match(/<!-- dibuang -->/g) || []).length === 2, r.output);
ok("tier = REGEX", r.report[0].tier === RX.TIER.REGEX, r.report[0].tier);
const normBad = ENGINE.normalizeCommand({ target: "([unclosed", regex: true, action: "replace" }, 0);
ok("regex tidak valid terdeteksi validator", normBad.ok === false && /regex/i.test(normBad.errs.join(" ")), normBad.errs.join(" "));

/* ================= 7. SARAN FUZZY ================= */
section("7. Target tidak ditemukan → saran jangkar mirip");
r = run(src1, [{ snippet: "X", target: '    <h1 id="judul">Teks Lama Sekali</h1>', action: "replace" }]);
ok("eksekusi ditolak", r.ok === false);
ok("saran diberikan", Array.isArray(r.report[0].suggestion) && r.report[0].suggestion.length > 0, JSON.stringify(r.report[0].suggestion));
ok("saran teratas = baris 4, kemiripan tinggi", r.report[0].suggestion[0].line === 4 && r.report[0].suggestion[0].pct >= 70, JSON.stringify(r.report[0].suggestion[0]));
ok("teks saran bisa langsung jadi target", run(src1, [{ snippet: "X", target: r.report[0].suggestion[0].text, action: "replace" }]).ok === true);

/* ================= 8. PARSER JSON ================= */
section("8. Parser JSON toleran (auto-repair)");
let p = ENGINE.parseCommands('```json\n[{"snippet":"A","target":"B","action":"replace",}]\n```', SETTINGS);
ok("pagar markdown + trailing comma diperbaiki", p.ok === true && p.commands.length === 1, p.error);
ok("catatan perbaikan tercatat", p.notes.length >= 2, p.notes.join(" | "));

p = ENGINE.parseCommands('[{"snippet":"baris1\nbaris2","target":"X","action":"replace"}]', SETTINGS);
ok("newline mentah di dalam string diperbaiki", p.ok === true && p.commands[0].snippet === "baris1\nbaris2", p.error);

p = ENGINE.parseCommands('Berikut perintahnya:\n[{"snippet":"A","target":"B"}]\nSemoga membantu!', SETTINGS);
ok("prose di sekitar array dibuang", p.ok === true && p.commands.length === 1, p.error);

p = ENGINE.parseCommands('[{"snippet":"harga \\$5","target":"B"}]', SETTINGS);
ok("escape \\$ dikoreksi", p.ok === true && p.commands[0].snippet === "harga $5", p.error + " | " + JSON.stringify(p.commands));

p = ENGINE.parseCommands('[{"snippet":"A","target":"B"} // komentar\n]', SETTINGS);
ok("komentar // dibuang", p.ok === true, p.error);

p = ENGINE.parseCommands('{"snippet":"A","target":"B"}', SETTINGS);
ok("objek tunggal dibungkus array", p.ok === true && Array.isArray(p.commands) && p.commands.length === 1, p.error);

p = ENGINE.parseCommands('[{"snippet":"A" "target":"B"}]', SETTINGS);
ok("JSON rusak → error deskriptif + lokasi", p.ok === false && /JSON TIDAK VALID/.test(p.error) && /Lokasi/.test(p.error), p.error);

p = ENGINE.parseCommands("", SETTINGS);
ok("box kosong → pesan jelas", p.ok === false && /kosong/i.test(p.error), p.error);

p = ENGINE.parseCommands('[{"snippet":"A","target":"B",}]', Object.assign({}, SETTINGS, { autoRepairJSON: false }));
ok("autoRepairJSON=false → tetap menolak JSON rusak", p.ok === false);

/* ================= 9. VALIDATOR ================= */
section("9. Validator perintah");
let n = ENGINE.normalizeCommand({ snippet: "A", target: "B", action: "ngawur" }, 0);
ok("action tak dikenal ditolak", n.ok === false && /action/.test(n.errs.join(" ")), n.errs.join(" "));
n = ENGINE.normalizeCommand({ snippet: "A", target: "" }, 0);
ok("target kosong ditolak", n.ok === false);
n = ENGINE.normalizeCommand({ snippet: "", target: "B", action: "replace" }, 0);
ok("snippet kosong → peringatan", n.ok === true && n.warns.length > 0, n.warns.join(" | "));
n = ENGINE.normalizeCommand({ snippet: "A", target: "B", action: "replace", fooBar: 1 }, 0);
ok("kunci tak dikenal → peringatan", n.warns.join(" ").indexOf("fooBar") !== -1);
n = ENGINE.normalizeCommand({ snippet: "A", target: "B" }, 0);
ok("bawaan: replace, includeEnd=true, occurrence=1, smartIndent=true",
  n.cmd.action === "replace" && n.cmd.includeEnd === true && n.cmd.occurrence === 1 && n.cmd.smartIndent === true);

/* ================= 10. INTEGRITAS & DIFF ================= */
section("10. Cek integritas & diff");
let ig = ENGINE.integrityCheck("<div><div></div>");
ok("tag tidak seimbang terdeteksi", ig.items.some(i => i.msg.indexOf("<div>") !== -1), JSON.stringify(ig.items));
ig = ENGINE.integrityCheck('<div id="a"></div><span id="a"></span>');
ok("ID duplikat terdeteksi", ig.items.some(i => /duplikat/i.test(i.msg)), JSON.stringify(ig.items));
ig = ENGINE.integrityCheck('<div id="a"></div>\n```json\n');
ok("sisa pagar markdown terdeteksi", ig.items.some(i => /markdown/.test(i.msg)));
ig = ENGINE.integrityCheck('<div id="a"><p>x</p></div>');
ok("kode sehat = 0 isu", ig.items.length === 0, JSON.stringify(ig.items));

const d = ENGINE.lineDiff("a\nb\nc\nd\ne\nf\ng\nh\ni\nj", "a\nb\nc\nX\nY\ne\nf\ng\nh\ni\nj", 3);
ok("diff minimal: 1 hapus 2 tambah", d.del === 1 && d.ins === 2, JSON.stringify({ del: d.del, ins: d.ins }));
ok("diff menandai baris", d.rows.some(x => x.t === "del" && x.x === "d") && d.rows.some(x => x.t === "ins" && x.x === "X"));

/* ================= 11. MULTI-PERINTAH + FILE NYATA ================= */
section("11. Multi-perintah berantai + berkas nyata");
r = run(src1, [
  { label: "ganti judul", snippet: '    <h1 id="judul">Judul v2</h1>', target: '    <h1 id="judul">Teks Lama</h1>', action: "replace" },
  { label: "sisip tombol", snippet: '    <button onclick="go()">Go</button>', target: '    <h1 id="judul">Judul v2</h1>', action: "insertAfter" },
  { label: "buang isi", snippet: "", target: "      <p>isi lama</p>", action: "delete" }
]);
ok("3 perintah berantai sukses", r.ok === true && r.applied === 3, JSON.stringify(r.report.map(x => x.errors || x.error)));
ok("perintah ke-2 melihat hasil perintah ke-1", r.output.indexOf('<button onclick="go()">Go</button>') !== -1);
ok("isi lama terhapus", r.output.indexOf("isi lama") === -1);
ok("delta karakter tercatat", typeof r.deltaChars === "number");
ok("label perintah tercatat di laporan", r.report[0].label === "ganti judul", r.report[0].label);

const realFile = fs.readFileSync(htmlPath, "utf8");
r = run(realFile, [
  { label: "ubah judul tab", snippet: '  <title>TestrxBox Tools — Precision Engine v4.0 (UJI)</title>', target: '  <title>TestrxBox Tools — Precision Engine v4.0</title>', action: "replace" },
  { label: "sisip meta", snippet: '  <meta name="generator" content="dt17tools" />', target: '  <meta charset="UTF-8" />', action: "insertAfter" }
]);
ok("injeksi ke berkas alat ini sendiri sukses", r.ok === true, JSON.stringify(r.report.map(x => x.errors || x.error)));
ok("judul berubah", r.output.indexOf("(UJI)</title>") !== -1);
ok("meta tersisip setelah charset", r.output.indexOf('<meta charset="UTF-8" />\r\n  <meta name="generator"') !== -1 || r.output.indexOf('<meta charset="UTF-8" />\n  <meta name="generator"') !== -1);
ok("tidak ada isu integritas baru", r.newIssues.length === 0, JSON.stringify(r.newIssues.map(i => i.msg)));

const t0 = Date.now();
ENGINE.runPipeline(realFile, [{ snippet: "X", target: "ID_TIDAK_ADA_XX", action: "replace" }], SETTINGS, {});
const ms = Date.now() - t0;
ok("gagal + saran fuzzy pada file " + (realFile.length / 1024).toFixed(0) + "KB < 3 detik (" + ms + " ms)", ms < 3000);

/* ================= 12. KONSISTENSI PASCA-BEAUTIFY ================= */
section("12. Jangkar lama tetap ditemukan setelah format berubah");
r = run(src1.replace(/ {4}/g, "        ").replace(/ {6}/g, "            "), [{ snippet: "GANTI", target: '    <h1 id="judul">Teks Lama</h1>', action: "replace" }]);
ok("jangkar indentasi-4 cocok di file indentasi-8", r.ok === true, r.report[0].error);

console.log("\n==================================");
console.log("HASIL: " + pass + " lulus, " + fail + " gagal");
console.log("==================================");
process.exit(fail ? 1 : 0);
