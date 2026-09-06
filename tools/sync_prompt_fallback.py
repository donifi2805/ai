#!/usr/bin/env python3
# -*- coding: utf-8 -*-
"""
tools/sync_prompt_fallback.py
-----------------------------
Menyinkronkan SALINAN DARURAT prompt yang tertanam di dalam testrx.php / index.html
dengan isi testrx_prompt.json (sumber kebenaran).

Jalankan setiap kali Anda menyunting testrx_prompt.json:

    python3 tools/sync_prompt_fallback.py

Salinan darurat hanya dipakai bila fetch("testrx_prompt.json") dan
testrx_api.php?action=get_prompt sama-sama gagal (mis. halaman dibuka lewat file://).
"""
import io
import json
import os
import re
import sys

ROOT = os.path.dirname(os.path.dirname(os.path.abspath(__file__)))
PROMPT = os.path.join(ROOT, "testrx_prompt.json")
TARGETS = ["testrx.php", "index.html"]
BLOCK = re.compile(
    r'(<script type="application/json" id="promptFallbackData">\r?\n)[\s\S]*?(\r?\n[ \t]*</script>)'
)


def main():
    if not os.path.isfile(PROMPT):
        sys.exit("File tidak ditemukan: " + PROMPT)

    with io.open(PROMPT, encoding="utf-8") as f:
        raw = f.read().strip()

    json.loads(raw)  # pastikan JSON valid sebelum ditempelkan

    # "</" di-escape menjadi "<\/" agar tidak pernah menutup elemen <script> lebih awal.
    # JSON.parse tetap membaca "<\/" sebagai "/".
    payload = raw.replace("</", "<\\/")

    changed = 0
    for name in TARGETS:
        path = os.path.join(ROOT, name)
        if not os.path.isfile(path):
            print("  dilewati (tidak ada): " + name)
            continue
        with io.open(path, encoding="utf-8", newline="") as f:
            html = f.read()

        eol = "\r\n" if "\r\n" in html else "\n"
        body = payload.replace("\r\n", "\n")
        if eol == "\r\n":
            body = body.replace("\n", "\r\n")

        if not BLOCK.search(html):
            print("  GAGAL: blok promptFallbackData tidak ditemukan di " + name)
            continue

        new_html = BLOCK.sub(lambda m: m.group(1) + body + m.group(2), html, count=1)
        if new_html == html:
            print("  sudah sinkron: " + name)
            continue

        with io.open(path, "w", encoding="utf-8", newline="") as f:
            f.write(new_html)
        changed += 1
        print("  diperbarui: " + name + " (" + format(len(new_html.encode("utf-8")), ",") + " byte)")

    # verifikasi hasil
    for name in TARGETS:
        path = os.path.join(ROOT, name)
        if not os.path.isfile(path):
            continue
        with io.open(path, encoding="utf-8") as f:
            html = f.read()
        m = re.search(
            r'<script type="application/json" id="promptFallbackData">\s*([\s\S]*?)\s*</script>', html)
        if not m:
            continue
        data = json.loads(m.group(1).replace("<\\/", "</"))
        ref = json.loads(raw)
        status = "COCOK" if data.get("prompt") == ref.get("prompt") else "BERBEDA"
        print("  verifikasi %s: v%s | %d karakter prompt | %s"
              % (name, data.get("version", "?"), len(data.get("prompt", "")), status))

    print("Selesai. %d berkas diperbarui." % changed)


if __name__ == "__main__":
    main()
