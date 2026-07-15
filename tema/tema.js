(function () {
    'use strict';

    const STORAGE_KEY = 'bhuleemarket_app_theme';
    const LEGACY_KEY = 'bhuleemarket_theme';
    const BASE_PATH = '/tema/';
    const FALLBACK = {
        default: 'classic',
        themes: [
            { id:'classic', name:'Klasik Merah', description:'Tampilan asli yang familiar.', style:'classic.css', accent:'#991b1b', surface:'#fff7f7', layout:'Menu geser', icon:'fa-layer-group', dark:false, menuOrder:[] },
            { id:'aurora', name:'Aurora Bento', description:'Kartu lembut dan menu bento empat kolom.', style:'aurora.css', accent:'#7c3aed', surface:'#eef2ff', layout:'Bento 4 kolom', icon:'fa-wand-magic-sparkles', dark:false, menuOrder:['E-Wallet','Pulsa','DIGITAL','Token PLN'] },
            { id:'minimal', name:'Minimal Store', description:'Menu dua kolom berbentuk daftar.', style:'minimal.css', accent:'#047857', surface:'#ecfdf5', layout:'Daftar 2 kolom', icon:'fa-list-check', dark:false, menuOrder:['Pulsa','E-Wallet','Token PLN','Tagihan'] },
            { id:'midnight', name:'Midnight Dock', description:'Dashboard gelap dengan menu tiga kolom.', style:'midnight.css', accent:'#22d3ee', surface:'#0f172a', layout:'Grid 3 kolom', icon:'fa-moon', dark:true, menuOrder:['DIGITAL','Pulsa','E-Wallet','Token PLN'] }
        ]
    };

    let catalog = FALLBACK;
    let selectedId = null;
    let appliedId = null;
    let previewTimer = null;
    let originalMenuNodes = [];

    function getStoredTheme() {
        const saved = localStorage.getItem(STORAGE_KEY);
        if (saved) return saved;
        return localStorage.getItem(LEGACY_KEY) === 'dark' ? 'midnight' : 'classic';
    }

    function getTheme(id) {
        return catalog.themes.find(function (theme) { return theme.id === id; }) || catalog.themes[0];
    }

    function rememberOriginalMenu() {
        const grid = document.getElementById('mainPpobMenuGrid');
        if (grid && !originalMenuNodes.length) originalMenuNodes = Array.from(grid.children);
    }

    function arrangeMenu(theme) {
        const grid = document.getElementById('mainPpobMenuGrid');
        if (!grid) return;
        rememberOriginalMenu();
        const order = Array.isArray(theme.menuOrder) ? theme.menuOrder : [];
        const normalizedOrder = order.map(function (item) { return String(item).trim().toLowerCase(); });
        const nodes = originalMenuNodes.slice().sort(function (a, b) {
            const aText = (a.querySelector('span') || {}).textContent || '';
            const bText = (b.querySelector('span') || {}).textContent || '';
            const ai = normalizedOrder.indexOf(aText.trim().toLowerCase());
            const bi = normalizedOrder.indexOf(bText.trim().toLowerCase());
            if (ai === -1 && bi === -1) return originalMenuNodes.indexOf(a) - originalMenuNodes.indexOf(b);
            if (ai === -1) return 1;
            if (bi === -1) return -1;
            return ai - bi;
        });
        nodes.forEach(function (node) { grid.appendChild(node); });
    }

    function updateThemeButton(theme) {
        const icon = document.getElementById('themeToggleIcon');
        if (icon) icon.className = 'fas ' + (theme.icon || 'fa-palette');
        document.querySelectorAll('.theme-toggle-btn').forEach(function (button) {
            button.title = 'Tema aktif: ' + theme.name;
            button.setAttribute('aria-label', 'Pilih tema tampilan. Tema aktif ' + theme.name);
        });
        const meta = document.querySelector('meta[name="theme-color"]');
        if (meta) meta.content = theme.accent;
    }

    function applyTheme(id, options) {
        options = options || {};
        const theme = getTheme(id);
        const link = document.getElementById('appThemeStylesheet');
        if (link) link.href = BASE_PATH + theme.style;
        document.body.dataset.appTheme = theme.id;
        document.documentElement.dataset.appTheme = theme.id;
        document.body.classList.toggle('dark-theme', !!theme.dark);
        arrangeMenu(theme);
        updateThemeButton(theme);
        appliedId = theme.id;
        if (options.persist) {
            localStorage.setItem(STORAGE_KEY, theme.id);
            localStorage.setItem(LEGACY_KEY, theme.dark ? 'dark' : 'light');
        }
        renderChoices();
        return theme;
    }

    function renderChoices() {
        const list = document.getElementById('themePickerList');
        if (!list) return;
        list.innerHTML = catalog.themes.map(function (theme) {
            const selected = theme.id === selectedId ? ' selected' : '';
            return '<button type="button" class="theme-choice' + selected + '" data-theme-id="' + theme.id + '" style="--choice-accent:' + theme.accent + ';--choice-surface:' + theme.surface + '">' +
                '<span class="theme-choice-check"><i class="fas fa-check"></i></span>' +
                '<span class="theme-mini" aria-hidden="true"><span class="theme-mini-head"></span><span class="theme-mini-balance"></span><span class="theme-mini-menu"><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i></span></span>' +
                '<span class="theme-choice-info"><span class="theme-choice-name"><i class="fas ' + theme.icon + '"></i> ' + theme.name + '</span><span class="theme-choice-layout">' + theme.layout + '</span><span class="theme-choice-desc">' + theme.description + '</span></span>' +
            '</button>';
        }).join('');
        list.querySelectorAll('.theme-choice').forEach(function (button) {
            button.addEventListener('click', function () {
                selectedId = button.dataset.themeId;
                renderChoices();
                updateStatus('Tema dipilih. Tekan Pratinjau atau Terapkan.', 'fa-circle-check');
            });
        });
    }

    function updateStatus(text, icon) {
        const status = document.getElementById('themePickerStatus');
        if (status) status.innerHTML = '<i class="fas ' + (icon || 'fa-circle-info') + '"></i> ' + text;
    }

    function openPicker() {
        clearTimeout(previewTimer);
        document.body.classList.remove('theme-previewing');
        if (appliedId !== getStoredTheme()) applyTheme(getStoredTheme());
        selectedId = appliedId || getStoredTheme();
        renderChoices();
        updateStatus('Pilihan tersimpan otomatis di perangkat ini.', 'fa-cloud-arrow-down');
        const modal = document.getElementById('themePickerModal');
        if (modal) {
            modal.classList.add('is-open');
            modal.setAttribute('aria-hidden', 'false');
        }
    }

    function closePicker(restorePreview) {
        const modal = document.getElementById('themePickerModal');
        if (modal) {
            modal.classList.remove('is-open');
            modal.setAttribute('aria-hidden', 'true');
        }
        if (restorePreview && appliedId !== getStoredTheme()) applyTheme(getStoredTheme());
    }

    function previewSelected() {
        const before = getStoredTheme();
        const theme = applyTheme(selectedId || before);
        closePicker(false);
        document.body.classList.add('theme-previewing');
        clearTimeout(previewTimer);
        previewTimer = setTimeout(function () {
            document.body.classList.remove('theme-previewing');
            applyTheme(before);
            openPicker();
            selectedId = theme.id;
            renderChoices();
            updateStatus('Pratinjau selesai. Terapkan jika Anda menyukainya.', 'fa-eye');
        }, 7000);
    }

    function saveSelected() {
        clearTimeout(previewTimer);
        document.body.classList.remove('theme-previewing');
        const theme = applyTheme(selectedId || appliedId || catalog.default, { persist:true });
        closePicker(false);
        if (window.showNotice) window.showNotice('success', 'Tema diterapkan', theme.name + ' kini menjadi tampilan utama.');
    }

    async function loadCatalog() {
        try {
            const response = await fetch(BASE_PATH + 'themes.json?v=1', { cache:'no-store' });
            if (!response.ok) throw new Error('HTTP ' + response.status);
            const data = await response.json();
            if (data && Array.isArray(data.themes) && data.themes.length) catalog = data;
        } catch (error) {
            console.warn('Katalog tema lokal tidak dapat dimuat, menggunakan katalog bawaan.', error);
        }
        const wanted = getStoredTheme();
        const valid = catalog.themes.some(function (theme) { return theme.id === wanted; }) ? wanted : (catalog.default || 'classic');
        selectedId = valid;
        applyTheme(valid);
    }

    window.openThemePanel = openPicker;
    window.closeThemePanel = function () { closePicker(true); };
    window.previewSelectedTheme = previewSelected;
    window.applySelectedTheme = saveSelected;
    window.applySavedTheme = function () { applyTheme(getStoredTheme()); };
    window.toggleDarkTheme = openPicker;

    document.addEventListener('DOMContentLoaded', function () {
        rememberOriginalMenu();
        loadCatalog();
        const modal = document.getElementById('themePickerModal');
        if (modal) modal.addEventListener('click', function (event) { if (event.target === modal) closePicker(true); });
        document.addEventListener('keydown', function (event) { if (event.key === 'Escape') closePicker(true); });
    });
})();
