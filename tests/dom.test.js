/* ============================================================================
 * UJI ANTARMUKA (DOM) TestrxBox Tools v4.0 dengan jsdom
 * Cara pakai :  npm i jsdom        (sekali saja)
 *               node tests/dom.test.js
 * Uji ini memuat ../testrx.php di dalam DOM tiruan, menjalankan init, lalu
 * memakai alur nyata: salin prompt -> muat kode -> dry-run -> diff -> terapkan.
 * ========================================================================== */
"use strict";
const fs = require("fs");
const path = require("path");

function loadJSDOM() {
  const candidates = [
    process.env.JSDOM_PATH,
    "jsdom",
    path.join(__dirname, "..", "node_modules", "jsdom"),
    path.join(process.env.HOME || "/root", ".jsdomtest", "node_modules", "jsdom")
  ].filter(Boolean);
  for (const c of candidates) { try { return require(c); } catch (e) { } }
  return null;
}
const jsdomModule = loadJSDOM();
const JSDOM = jsdomModule ? jsdomModule.JSDOM : null;
const VirtualConsole = jsdomModule ? jsdomModule.VirtualConsole : null;
if (!JSDOM) {
  console.log("⚠️  jsdom tidak ditemukan — uji DOM dilewati.\n    Pasang dulu dengan: npm install jsdom");
  process.exit(0);
}

const ROOT = path.join(__dirname, "..");
const htmlPath = process.argv[2] || path.join(ROOT, "testrx.php");
const html = fs.readFileSync(htmlPath, "utf8");
const promptRaw = fs.readFileSync(path.join(ROOT, "testrx_prompt.json"), "utf8");
const promptObj = JSON.parse(promptRaw);

/* ---------- fetch tiruan yang melayani file lokal + API PHP ---------- */
function fakeFetch(input) {
  const url = String(input);
  const body = (text, ok) => ({
    ok: ok !== false, status: ok === false ? 404 : 200,
    text: async () => text, json: async () => JSON.parse(text)
  });
  if (url.indexOf("testrx_prompt.json") === 0 || url.indexOf("testrx_prompt.json?") !== -1) return Promise.resolve(body(promptRaw));
  if (url.indexOf("testrx_api.php") !== -1) {
    if (url.indexOf("action=get_prompt") !== -1) {
      return Promise.resolve(body(JSON.stringify({ status: "success", file: "testrx_prompt.json", size: promptRaw.length, data: promptObj })));
    }
    if (url.indexOf("action=diagnostic") !== -1) {
      return Promise.resolve(body(JSON.stringify({
        status: "success",
        data: {
          api_version: "4.0", php_version: "8.2.0", base_dir: "/home/user/public_html", writable: true,
          backup_ok: true, backup_count: 2, auto_backup_count: 5, post_max_size: "64M",
          upload_max_size: "32M", memory_limit: "256M", server_software: "Apache", https: true,
          key_protection: false, prompt_file: true, files: { "index.html": 233344, "testrx_prompt.json": 24908 }
        }
      })));
    }
    if (url.indexOf("action=list_backups") !== -1) return Promise.resolve(body(JSON.stringify({ status: "success", data: [{ name: "uji.html", date: "2026-09-05 10:00:00", size: 12.4 }] })));
    if (url.indexOf("action=list_server_files") !== -1) {
      return Promise.resolve(body(JSON.stringify({
        status: "success", path: "",
        data: [{ type: "dir", name: "testrxbackup", path: "testrxbackup" },
               { type: "file", name: "index.html", path: "index.html", size: 227.9, date: "2026-09-05 12:00" }]
      })));
    }
    return Promise.resolve(body(JSON.stringify({ status: "success", msg: "ok (tiruan)" })));
  }
  return Promise.resolve(body("", false));
}

/* ---------- siapkan DOM ---------- */
const errors = [];
const vc = new VirtualConsole();
vc.on("jsdomError", e => errors.push("jsdomError: " + (e.detail || e.message)));
vc.on("error", (...a) => errors.push("console.error: " + a.join(" ")));

const dom = new JSDOM(html, {
  runScripts: "dangerously",
  url: "http://localhost/testrx.php",
  pretendToBeVisual: true,
  virtualConsole: vc,
  beforeParse(window) {
    window.fetch = fakeFetch;
    window.alert = () => { };
    window.confirm = () => false;
    window.prompt = () => null;
    window.open = () => null;
    window.html_beautify = s => s;                     // pengganti CDN js-beautify
    window.document.execCommand = () => true;          // jalur salin cadangan
    window.URL.createObjectURL = () => "blob:mock";
    window.URL.revokeObjectURL = () => { };
    window.scrollTo = () => { };
    window.Element.prototype.scrollIntoView = function () { };
    window.addEventListener("error", e => errors.push("window.onerror: " + e.message));
  }
});
const win = dom.window;
const doc = win.document;
const ev = expr => win.eval(expr);
const wait = ms => new Promise(r => setTimeout(r, ms));

let pass = 0, fail = 0;
function ok(name, cond, extra) {
  if (cond) { pass++; console.log("  ✅ " + name); }
  else { fail++; console.log("  ❌ " + name + (extra !== undefined ? "\n     → " + extra : "")); }
}
function section(t) { console.log("\n▸ " + t); }
function txt(id) { const e = doc.getElementById(id); return e ? (e.textContent || "") : "(tidak ada)"; }
function val(id) { const e = doc.getElementById(id); return e ? e.value : ""; }
function hidden(id) { const e = doc.getElementById(id); return e ? e.classList.contains("hidden") : true; }

(async function main() {
  await wait(600);                                     // tunggu DOMContentLoaded + init async

  section("A. Pemuatan halaman");
  ok("tidak ada galat skrip saat load", errors.length === 0, errors.slice(0, 3).join("\n"));
  ok("judul halaman benar", /TestrxBox Tools/.test(doc.title), doc.title);
  ok("APP.version = 4.0.0", ev("APP.version") === "4.0.0", ev("APP.version"));
  ok("mesin RX & ENGINE siap", ev("typeof RX.findAnchor") === "function" && ev("typeof ENGINE.runPipeline") === "function");
  ok("konsol sistem terisi log siap", /siap/.test(txt("sysConsole")), txt("sysConsole").slice(0, 120));

  section("B. Sistem prompt dari file JSON");
  ok("PROMPT_DATA termuat", ev("PROMPT_DATA && PROMPT_DATA.version") === "4.0", String(ev("PROMPT_DATA && PROMPT_DATA.version")));
  ok("sumber = testrx_prompt.json", /testrx_prompt\.json/.test(txt("promptSourceBadge")), txt("promptSourceBadge"));
  ok("badge versi prompt", /v4\.0/.test(txt("promptVersionBadge")), txt("promptVersionBadge"));
  const copyPromise = ev("copyPromptFromJSON()");
  if (copyPromise && typeof copyPromise.then === "function") await copyPromise;
  await wait(80);
  ok("copyPromptFromJSON() berjalan tanpa galat", errors.length === 0, errors.slice(0, 2).join("\n"));
  ok("toast muncul setelah menyalin", doc.getElementById("toastStack").children.length > 0);
  ok("isi prompt sesuai file JSON", ev("currentPromptText()") === promptObj.prompt, "panjang: " + ev("currentPromptText().length"));
  ev("openPromptModal()");
  await wait(120);
  ok("modal prompt terbuka", !hidden("promptModal"));
  ok("pratinjau prompt terisi", val("promptPreviewBox").length > 5000, val("promptPreviewBox").length);
  ev("document.getElementById('promptVariantSelect').value='prompt_short'; renderPromptVariant();");
  ok("varian ringkas tersedia", val("promptPreviewBox").indexOf("VERSI RINGKAS") !== -1, val("promptPreviewBox").slice(0, 60));
  ev("document.getElementById('promptVariantSelect').value='prompt'; renderPromptVariant(); closePromptModal();");
  ok("modal prompt ditutup", hidden("promptModal"));

  section("C. Editor, statistik, undo/redo");
  const sample = [
    "<!DOCTYPE html>", "<html>", "  <head>", "    <title>Demo</title>", "  </head>",
    "  <body>", '    <h1 id="judul">Lama</h1>', '    <div id="kartu" class="p-2">', "      <p>isi</p>", "    </div>",
    "  </body>", "</html>"
  ].join("\n");
  ev("editor.setValue(" + JSON.stringify(sample) + ", 'uji muat')");
  await wait(50);
  ok("indikator versi terisi", /Versi/.test(txt("versionIndicator")), txt("versionIndicator"));
  ok("statistik baris = 12", txt("stLines").replace(/\D/g, "") === "12", txt("stLines"));
  ok("tipe file terdeteksi HTML", txt("stType") === "HTML", txt("stType"));
  ok("EOL terdeteksi LF", txt("stEol") === "LF", txt("stEol"));
  ev("editor.setValue(editor.getValue() + '\\n<!-- tambahan -->', 'ubah lagi')");
  ev("editorUndo()");
  ok("undo mengembalikan isi", ev("editor.getValue()") === sample);
  ev("editorRedo()");
  ok("redo mengembalikan perubahan", ev("editor.getValue()").indexOf("tambahan") !== -1);
  ev("editorUndo()");

  section("D. Dry-run + validasi presisi");
  const cmdGood = JSON.stringify([{
    label: "ganti judul", snippet: '    <h1 id="judul">Baru</h1>',
    target: '    <h1 id="judul">Lama</h1>', endTarget: "", action: "replace", regex: false, global: false
  }]);
  doc.getElementById("quickCommandInput").value = cmdGood;
  ev("updateCommandBadges()");
  ok("badge jumlah perintah", /1 PERINTAH/.test(txt("cmdCountBadge")), txt("cmdCountBadge"));
  ok("badge JSON valid", /VALID/.test(txt("cmdJsonBadge")), txt("cmdJsonBadge"));
  ev("runDryRun()");
  await wait(80);
  ok("modal dry-run terbuka", !hidden("dryRunModal"));
  ok("laporan menyebut SEMUA PERINTAH LOLOS", /SEMUA PERINTAH LOLOS/.test(txt("dryRunReportBox")));
  ok("laporan menyebut tier & baris", /EXACT 1:1/.test(txt("dryRunReportBox")) && /baris 7/.test(txt("dryRunReportBox")), txt("dryRunReportBox").slice(0, 300));
  ok("diff dry-run tergambar", doc.getElementById("dryRunDiffBox") && /diff-ins/.test(doc.getElementById("dryRunDiffBox").innerHTML));
  ev("closeDryRunModal()");

  const cmdBad = JSON.stringify([{ snippet: "X", target: '    <h1 id="judul">Lama Sekali</h1>', action: "replace" }]);
  doc.getElementById("quickCommandInput").value = cmdBad;
  ev("runDryRun()");
  await wait(80);
  ok("target gagal → laporan ADA PERINTAH GAGAL", /ADA PERINTAH GAGAL/.test(txt("dryRunReportBox")));
  ok("saran jangkar ditampilkan", /KEMIRIPAN/.test(txt("dryRunReportBox")), txt("dryRunReportBox").slice(0, 200));
  ok("tombol eksekusi terkunci", /Terkunci/.test(doc.getElementById("btnDryRunExecute").textContent), doc.getElementById("btnDryRunExecute").textContent);
  ev("useSuggestion(0,0)");
  await wait(400);
  ok("perbaikan saran menulis ulang box JSON", ev("JSON.parse(document.getElementById('quickCommandInput').value)[0].target") === '    <h1 id="judul">Lama</h1>', val("quickCommandInput").slice(0, 160));
  ok("cek ulang setelah saran lolos", /SEMUA PERINTAH LOLOS/.test(txt("dryRunReportBox")), txt("dryRunReportBox").slice(0, 160));
  ev("closeDryRunModal()");

  section("E. JSON rusak diperbaiki otomatis");
  doc.getElementById("quickCommandInput").value = '```json\n[{"snippet":"A","target":"B",}]\n```';
  ev("updateCommandBadges()");
  ok("badge: JSON valid (diperbaiki)", /diperbaiki/.test(txt("cmdJsonBadge")), txt("cmdJsonBadge"));
  doc.getElementById("quickCommandInput").value = '[{"snippet":"A" "target":"B"}]';
  ev("updateCommandBadges()");
  ok("badge: JSON rusak", /RUSAK/.test(txt("cmdJsonBadge")), txt("cmdJsonBadge"));

  section("F. Eksekusi penuh lewat pratinjau diff");
  ev("SETTINGS.hackerAnim='off'");
  doc.getElementById("quickCommandInput").value = cmdGood;
  ev("applyAndExecute({})");
  await wait(60);
  ok("modal diff terbuka", !hidden("diffModal"));
  ok("diff menampilkan baris baru", /Baru/.test(doc.getElementById("diffBox").textContent));
  ok("ringkasan diff menampilkan jumlah perintah", /PERINTAH 1\/1/.test(txt("diffSummary")), txt("diffSummary"));
  ev("confirmDiffApply()");
  await wait(120);
  ok("kode editor berubah setelah diterapkan", ev("editor.getValue()").indexOf('<h1 id="judul">Baru</h1>') !== -1, ev("editor.getValue()").slice(120, 220));
  ok("teks lama hilang", ev("editor.getValue()").indexOf(">Lama<") === -1);
  ok("snapshot otomatis tersimpan", ev("snapshotStore().length") >= 1, ev("snapshotStore().length"));
  ok("modal ringkasan sukses muncul", /EKSEKUSI SUKSES/.test(txt("modal-message")), txt("modal-message").slice(0, 120));
  ev("closeAlert()");
  ev("editorUndo()");
  ok("undo pasca-eksekusi memulihkan kode", ev("editor.getValue()").indexOf(">Lama<") !== -1);

  section("G. Pencari jangkar (Anchor Finder)");
  ev("openAnchorFinder()");
  doc.getElementById("anchorQuery").value = 'id="kartu"';
  ev("runAnchorSearch()");
  await wait(60);
  ok("hasil pencarian muncul", /BARIS COCOK/.test(txt("anchorResultList")), txt("anchorResultList").slice(0, 120));
  ok("badge unik ditampilkan", /UNIK/.test(txt("anchorResultList")));
  ev("anchorCmds.length = 0; anchorMake(0,'insertAfter')");
  ok("perintah tercetak valid", ev("JSON.parse(document.getElementById('anchorGeneratedJSON').textContent)[0].action") === "insertAfter", txt("anchorGeneratedJSON").slice(0, 120));
  ok("target tercetak = baris asli file", ev("JSON.parse(document.getElementById('anchorGeneratedJSON').textContent)[0].target").indexOf('id="kartu"') !== -1);
  ev("sendGeneratedToCommandBox()");
  await wait(40);
  ok("perintah masuk ke box JSON", val("quickCommandInput").indexOf("insertAfter") !== -1);
  ok("modal anchor tertutup", hidden("anchorFinderModal"));
  doc.getElementById("anchorLineJump").value = "8";
  ev("jumpToLine()");
  ok("lompat baris bekerja", /BARIS 8|baris 8/i.test(txt("anchorResultList")) || ev("anchorLastResults[0].line") === 8, ev("anchorLastResults[0] && anchorLastResults[0].line"));

  section("H. Integritas, snapshot, diagnostik, setelan");
  ev("checkIntegrityNow()");
  await wait(30);
  ok("cek integritas melaporkan hasil", /INTEGRITAS/.test(txt("modal-message")), txt("modal-message").slice(0, 80));
  ev("closeAlert()");

  ev("openSnapshotModal()");
  await wait(30);
  ok("daftar snapshot tampil", /Muat ke Editor/.test(txt("snapshotList")), txt("snapshotList").slice(0, 100));
  ev("closeSnapshotModal()");

  ev("runDiagnostics()");
  await wait(250);
  ok("diagnostik: baris API", /testrx_api\.php/.test(txt("diagReportBox")), txt("diagReportBox").slice(0, 200));
  ok("diagnostik: PHP tiruan terbaca", /8\.2\.0/.test(txt("diagReportBox")));
  ok("diagnostik: prompt JSON ok", /testrx_prompt\.json/.test(txt("diagReportBox")));
  ev("closeDiagModal()");

  ev("openEngineSettings()");
  await wait(30);
  ok("panel setelan tergambar", doc.getElementById("engineSettingsList").children.length >= 9, doc.getElementById("engineSettingsList").children.length);
  ev("document.getElementById('set_diffPreview').classList.remove('on'); saveEngineSettings();");
  ok("setelan tersimpan ke localStorage", ev("JSON.parse(localStorage.getItem('testrx_engine_settings_v4')).diffPreview") === false);
  ev("SETTINGS.diffPreview = true;");

  section("I. Operasi server & preview");
  ev("openServerFilesModal()");
  await wait(120);
  ok("daftar file server tampil", /index\.html/.test(txt("serverFilesList")), txt("serverFilesList").slice(0, 120));
  ok("folder server tampil", /testrxbackup/.test(txt("serverFilesList")));
  ev("closeServerFilesModal()");
  ev("forceUpdatePreview()");
  await wait(30);
  ok("iframe pratinjau terisi", (doc.getElementById("mobilePreview").getAttribute("srcdoc") || "").length > 100);
  ok("skrip penyadap konsol disuntikkan", /window\.onerror/.test(doc.getElementById("mobilePreview").getAttribute("srcdoc") || ""));
  ev("toggleEditMode()");
  ok("mode edit menampilkan textarea", doc.getElementById("hiddenEditor").style.display === "block");
  ev("toggleEditMode()");
  ok("mode normal menyembunyikan textarea", doc.getElementById("hiddenEditor").style.display === "none");

  section("J. Berkas prompt JSON");
  ok("prompt punya varian lengkap & ringkas", typeof promptObj.prompt === "string" && typeof promptObj.prompt_short === "string");
  ok("target_file_trigger sesuai alat", JSON.stringify(promptObj.target_file_trigger) === JSON.stringify(["index.html", "index.php", "paneladmin.html", "paneladmin.php"]));
  ok("schema_keys mendokumentasikan kunci baru", ["occurrence", "endOccurrence", "includeEnd", "label", "delete"].every(k =>
    Object.keys(promptObj.schema_keys).concat(promptObj.actions.map(a => a.name)).indexOf(k) !== -1));
  ok("fallback tertanam sinkron dengan file", ev("JSON.parse(document.getElementById('promptFallbackData').textContent.trim()).prompt") === promptObj.prompt);

  console.log("\n==================================");
  console.log("HASIL: " + pass + " lulus, " + fail + " gagal");
  if (errors.length) { console.log("\nGalat tertangkap (" + errors.length + "):"); errors.slice(0, 8).forEach(e => console.log("  - " + e)); }
  console.log("==================================");
  win.close();
  process.exit(fail ? 1 : 0);
})().catch(e => { console.error("UJI GAGAL MENJALAN:", e); process.exit(2); });
