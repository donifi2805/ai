/* ============================================================================
 * UJI JALUR CADANGAN PROMPT (fallback) TestrxBox Tools v4.0
 * Memastikan tombol "📋 Salin Prompt" tetap bekerja walau:
 *   (a) file testrx_prompt.json tidak bisa diambil (mis. dibuka lewat file://)
 *   (b) testrx_api.php juga tidak menjawab
 *   -> alat harus memakai salinan darurat yang tertanam di dalam HTML
 * Cara pakai : npm i jsdom && node tests/fallback.test.js
 * ========================================================================== */
"use strict";
const fs = require("fs");
const path = require("path");

function loadJsdom() {
  const cands = [process.env.JSDOM_PATH, "jsdom", path.join(__dirname, "..", "node_modules", "jsdom"),
    path.join(process.env.HOME || "/root", ".jsdomtest", "node_modules", "jsdom")].filter(Boolean);
  for (const c of cands) { try { return require(c); } catch (e) { } }
  return null;
}
const m = loadJsdom();
if (!m) { console.log("⚠️  jsdom tidak tersedia — uji dilewati (npm install jsdom)"); process.exit(0); }
const { JSDOM, VirtualConsole } = m;

const ROOT = path.join(__dirname, "..");
const htmlPath = process.argv[2] || path.join(ROOT, "testrx.php");
const html = fs.readFileSync(htmlPath, "utf8");
const promptObj = JSON.parse(fs.readFileSync(path.join(ROOT, "testrx_prompt.json"), "utf8"));

let pass = 0, fail = 0;
const ok = (n, c, x) => { if (c) { pass++; console.log("  ✅ " + n); } else { fail++; console.log("  ❌ " + n + (x !== undefined ? "\n     → " + x : "")); } };
const wait = ms => new Promise(r => setTimeout(r, ms));

async function build(fetchImpl) {
  const errors = [];
  const vc = new VirtualConsole();
  vc.on("jsdomError", e => errors.push(String(e.detail || e.message)));
  const dom = new JSDOM(html, {
    runScripts: "dangerously", url: "http://localhost/testrx.php", pretendToBeVisual: true, virtualConsole: vc,
    beforeParse(w) {
      w.fetch = fetchImpl;
      w.alert = () => { }; w.confirm = () => false; w.prompt = () => null; w.open = () => null;
      w.document.execCommand = () => true;
      w.Element.prototype.scrollIntoView = function () { };
      w.URL.createObjectURL = () => "blob:mock"; w.URL.revokeObjectURL = () => { };
    }
  });
  await wait(700);
  return { dom, errors };
}

(async function () {
  console.log("\n▸ K1. File JSON & API mati total → salinan darurat tertanam");
  const dead = () => Promise.reject(new TypeError("Failed to fetch"));
  let { dom, errors } = await build(dead);
  let w = dom.window, d = w.document;
  ok("tidak ada galat fatal", errors.length === 0, errors.slice(0, 2).join(" | "));
  ok("prompt tetap termuat dari fallback", w.eval("PROMPT_DATA && PROMPT_DATA.version") === "4.0", String(w.eval("PROMPT_DATA && PROMPT_DATA.version")));
  ok("badge sumber menyebut salinan darurat", /darurat/.test(d.getElementById("promptSourceBadge").textContent), d.getElementById("promptSourceBadge").textContent);
  ok("isi fallback identik dengan file JSON", w.eval("PROMPT_DATA.prompt") === promptObj.prompt);
  const p1 = w.eval("copyPromptFromJSON()");
  if (p1 && p1.then) await p1;
  await wait(60);
  ok("tombol salin tetap bekerja", d.getElementById("toastStack").children.length > 0);
  ok("teks yang disalin = prompt lengkap", w.eval("currentPromptText()") === promptObj.prompt);
  w.close();

  console.log("\n▸ K2. File JSON 404 tetapi API hidup → prompt lewat testrx_api.php");
  const apiOnly = (input) => {
    const url = String(input);
    const body = t => ({ ok: true, status: 200, text: async () => t, json: async () => JSON.parse(t) });
    if (url.indexOf("action=get_prompt") !== -1) return Promise.resolve(body(JSON.stringify({ status: "success", data: promptObj })));
    return Promise.resolve({ ok: false, status: 404, text: async () => "not found", json: async () => { throw new Error("bukan JSON"); } });
  };
  ({ dom, errors } = await build(apiOnly));
  w = dom.window; d = w.document;
  ok("prompt termuat lewat API", w.eval("PROMPT_DATA && PROMPT_DATA.version") === "4.0");
  ok("badge sumber menyebut testrx_api.php", /testrx_api\.php/.test(d.getElementById("promptSourceBadge").textContent), d.getElementById("promptSourceBadge").textContent);
  ok("badge berwarna aman (bukan gagal)", d.getElementById("promptSourceBadge").className.indexOf("badge-ok") !== -1, d.getElementById("promptSourceBadge").className);
  w.close();

  console.log("\n▸ K3. Semua jalur mati & fallback dirusak → peringatan jelas");
  const rusak = html.replace(/(<script type="application\/json" id="promptFallbackData">)[\s\S]*?(<\/script>)/,
    "$1{ ini bukan json valid }$2");
  const errors3 = [];
  const vc3 = new VirtualConsole();
  vc3.on("jsdomError", e => errors3.push(String(e.detail || e.message)));
  const dom3 = new JSDOM(rusak, {
    runScripts: "dangerously", url: "http://localhost/testrx.php", virtualConsole: vc3,
    beforeParse(w) {
      w.fetch = dead; w.alert = () => { }; w.confirm = () => false; w.prompt = () => null;
      w.document.execCommand = () => true; w.Element.prototype.scrollIntoView = function () { };
    }
  });
  await wait(700);
  const d3 = dom3.window.document;
  ok("alat tetap hidup tanpa prompt", /GAGAL/.test(d3.getElementById("promptSourceBadge").textContent), d3.getElementById("promptSourceBadge").textContent);
  ok("peringatan ditampilkan ke pengguna", d3.getElementById("toastStack").textContent.indexOf("Prompt JSON tidak termuat") !== -1, d3.getElementById("toastStack").textContent);
  const p3 = dom3.window.eval("copyPromptFromJSON()");
  if (p3 && p3.then) await p3;
  await wait(60);
  ok("menyalin prompt memberi pesan error, bukan diam", /GAGAL DIMUAT/.test(d3.getElementById("modal-message").textContent), d3.getElementById("modal-message").textContent.slice(0, 90));
  dom3.window.close();

  console.log("\n==================================");
  console.log("HASIL: " + pass + " lulus, " + fail + " gagal");
  console.log("==================================");
  process.exit(fail ? 1 : 0);
})().catch(e => { console.error("UJI GAGAL:", e); process.exit(2); });
