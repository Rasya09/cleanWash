<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>LaundryHub – Pengaturan Platform</title>
  {{-- Base styles --}}
  <link rel="stylesheet" href="{{ asset('assets/css/admin/pengaturan_platform.css') }}">
  {{-- Responsive overrides (link SETELAH base) --}}
  <link rel="stylesheet" href="{{ asset('assets/css/admin/pengaturan_platform_responsive.css') }}">
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
</head>
<body>

<!-- ===== SIDEBAR ===== -->
<aside class="sidebar">
  <div class="sidebar-brand">
    <div class="brand-icon"><i class="fas fa-tshirt"></i></div>
    <div class="brand-text">
      <span class="brand-name">LaundryHub</span>
      <span class="brand-sub">Admin Panel</span>
    </div>
  </div>

  <nav class="sidebar-nav">
    <a href="#" class="nav-item"><i class="fas fa-gauge-high"></i><span>Dashboard</span></a>

    <div class="nav-section-title">MANAJEMEN</div>
    <a href="#" class="nav-item"><i class="fas fa-users"></i><span>User / Customer</span></a>
    <a href="#" class="nav-item"><i class="fas fa-store"></i><span>Mitra Laundry</span></a>
    <a href="#" class="nav-item has-badge"><i class="fas fa-user-check"></i><span>Verifikasi Mitra</span><span class="badge">8</span></a>
    <a href="#" class="nav-item has-arrow"><i class="fas fa-box"></i><span>Pesanan (via Mitra)</span><i class="fas fa-chevron-right arrow"></i></a>
    <a href="#" class="nav-item"><i class="fas fa-credit-card"></i><span>Pembayaran</span></a>
    <a href="#" class="nav-item"><i class="fas fa-star"></i><span>Review & Rating</span></a>
    <a href="#" class="nav-item has-badge"><i class="fas fa-file-alt"></i><span>Komplain / Laporan</span><span class="badge">2</span></a>

    <div class="nav-section-title">LAPORAN & ANALITIK</div>
    <a href="#" class="nav-item"><i class="fas fa-chart-bar"></i><span>Statistik & Laporan</span></a>
    <a href="#" class="nav-item"><i class="fas fa-clock-rotate-left"></i><span>Aktivitas</span></a>

    <div class="nav-section-title">PENGATURAN</div>
    <a href="#" class="nav-item active"><i class="fas fa-sliders"></i><span>Pengaturan Platform</span></a>
    <a href="#" class="nav-item"><i class="fas fa-user-shield"></i><span>Admin & Role</span></a>
    <a href="#" class="nav-item"><i class="fas fa-bell"></i><span>Notifikasi</span></a>
  </nav>

  <div class="sidebar-help">
    <p class="help-title">Butuh bantuan?</p>
    <a href="#" class="help-link">Kunjungi Pusat Bantuan</a>
    <div class="help-actions">
      <button class="btn-help">Pusat Bantuan</button>
      <button class="btn-headset"><i class="fas fa-headset"></i></button>
    </div>
  </div>
</aside>

<!-- ===== MAIN WRAPPER ===== -->
<div class="main-wrapper">

  <!-- TOPBAR -->
  <header class="topbar">
    <button class="menu-toggle" id="menuToggle"><i class="fas fa-bars"></i></button>
    <div class="topbar-title">
      <h1>Pengaturan Platform</h1>
      <p>Kelola konfigurasi dan pengaturan utama platform LaundryHub.</p>
    </div>
    <div class="topbar-right">
      <!-- Search bar desktop -->
      <div class="search-box">
        <i class="fas fa-magnifying-glass"></i>
        <input type="text" id="desktopSearch" placeholder="Cari pengaturan..." />
      </div>
      <!-- Tombol search mobile -->
      <button class="btn-mobile-search" id="mobileSearchToggle" title="Cari">
        <i class="fas fa-magnifying-glass"></i>
      </button>
      <button class="notif-btn">
        <i class="fas fa-bell"></i>
        <span class="notif-badge">3</span>
      </button>
      <div class="user-profile">
        <img src="https://i.pravatar.cc/36?img=12" alt="Admin" class="avatar"/>
        <div class="user-info">
          <span class="user-name">Super Admin</span>
          <span class="user-role">Administrator</span>
        </div>
        <i class="fas fa-chevron-down"></i>
      </div>
    </div>
  </header>

  <!-- Mobile Search Bar (muncul di bawah topbar saat tombol diklik) -->
  <div class="mobile-search-bar" id="mobileSearchBar">
    <div class="search-box">
      <i class="fas fa-magnifying-glass"></i>
      <input type="text" id="mobileSearch" placeholder="Cari pengaturan..." />
    </div>
  </div>

  <!-- CONTENT AREA -->
  <div class="content-area">
    <!-- LEFT: SETTINGS CONTENT -->
    <main class="settings-main">

      <!-- TABS -->
      <div class="tabs-wrapper">
        <div class="tabs">
          <button class="tab active" data-tab="umum">Umum</button>
          <button class="tab" data-tab="aplikasi">Aplikasi</button>
          <button class="tab" data-tab="pesanan">Pesanan</button>
          <button class="tab" data-tab="pembayaran">Pembayaran</button>
          <button class="tab" data-tab="notifikasi">Notifikasi</button>
          <button class="tab" data-tab="keamanan">Keamanan</button>
          <button class="tab" data-tab="integrasi">Integrasi</button>
          <button class="tab" data-tab="lainnya">Lainnya</button>
        </div>
      </div>

      <!-- SECTION: Informasi Platform -->
      <section class="settings-section">
        <div class="section-header">
          <h2>Informasi Platform</h2>
          <p>Informasi dasar tentang platform LaundryHub.</p>
        </div>

        <div class="section-body">
          <div class="logo-area">
            <div class="logo-preview">
              <i class="fas fa-tshirt"></i>
            </div>
            <button class="btn-outline-sm">Ubah Logo</button>
            <p class="logo-hint">PNG, JPG maksimal 2MB</p>
          </div>

          <div class="form-grid">
            <div class="form-group">
              <label>Nama Platform</label>
              <input type="text" value="LaundryHub" />
            </div>
            <div class="form-group">
              <label>URL Platform</label>
              <input type="text" value="https://laundryhub.com" />
            </div>
            <div class="form-group">
              <label>Email Kontak</label>
              <input type="email" value="support@laundryhub.com" />
            </div>
            <div class="form-group">
              <label>No. Telepon</label>
              <input type="text" value="0812-3456-7890" />
            </div>
            <div class="form-group">
              <label>Deskripsi Platform</label>
              <textarea rows="3">Platform manajemen laundry terintegrasi untuk pelanggan, mitra, dan admin.</textarea>
            </div>
            <div class="form-group">
              <label>Alamat Kantor</label>
              <textarea rows="3">Jl. Melati No.12, Cipete
Jakarta Selatan, DKI Jakarta 12410</textarea>
            </div>
          </div>

          <div class="section-footer">
            <button class="btn-primary" onclick="showToast('Perubahan berhasil disimpan!')">Simpan Perubahan</button>
          </div>
        </div>
      </section>

      <!-- SECTION: Pengaturan Regional -->
      <section class="settings-section">
        <div class="section-header">
          <h2>Pengaturan Regional</h2>
          <p>Pengaturan zona waktu, mata uang, dan wilayah.</p>
        </div>

        <div class="section-body">
          <div class="form-grid">
            <div class="form-group">
              <label>Zona Waktu</label>
              <div class="select-wrap">
                <select>
                  <option>Asia/Jakarta (WIB)</option>
                  <option>Asia/Makassar (WITA)</option>
                  <option>Asia/Jayapura (WIT)</option>
                </select>
                <i class="fas fa-chevron-down"></i>
              </div>
            </div>
            <div class="form-group">
              <label>Bahasa</label>
              <div class="select-wrap">
                <select>
                  <option>Bahasa Indonesia</option>
                  <option>English</option>
                </select>
                <i class="fas fa-chevron-down"></i>
              </div>
            </div>
            <div class="form-group">
              <label>Mata Uang</label>
              <div class="select-wrap">
                <select>
                  <option>Rupiah (IDR)</option>
                  <option>USD</option>
                </select>
                <i class="fas fa-chevron-down"></i>
              </div>
            </div>
            <div class="form-group">
              <label>Format Tanggal</label>
              <div class="select-wrap">
                <select>
                  <option>DD MMM YYYY (08 Mei 2024)</option>
                  <option>DD/MM/YYYY</option>
                  <option>YYYY-MM-DD</option>
                </select>
                <i class="fas fa-chevron-down"></i>
              </div>
            </div>
            <div class="form-group">
              <label>Format Waktu</label>
              <div class="select-wrap">
                <select>
                  <option>24 Jam (14:30)</option>
                  <option>12 Jam (2:30 PM)</option>
                </select>
                <i class="fas fa-chevron-down"></i>
              </div>
            </div>
            <div class="form-group">
              <label>Negara Default</label>
              <div class="select-wrap">
                <select>
                  <option>Indonesia</option>
                  <option>Malaysia</option>
                </select>
                <i class="fas fa-chevron-down"></i>
              </div>
            </div>
          </div>

          <div class="section-footer">
            <button class="btn-primary" onclick="showToast('Pengaturan regional disimpan!')">Simpan Perubahan</button>
          </div>
        </div>
      </section>

      <!-- SECTION: Pengaturan Sistem -->
      <section class="settings-section">
        <div class="section-header">
          <h2>Pengaturan Sistem</h2>
          <p>Pengaturan operasional sistem platform.</p>
        </div>

        <div class="section-body">
          <div class="toggle-grid">
            <div class="toggle-item">
              <div class="toggle-info">
                <span class="toggle-label">Maintenance Mode</span>
                <span class="toggle-desc">Aktifkan mode maintenance (situs tidak dapat diakses oleh pengguna).</span>
              </div>
              <label class="toggle-switch">
                <input type="checkbox" id="maintenance"/>
                <span class="slider"></span>
              </label>
            </div>

            <div class="toggle-item">
              <div class="toggle-info">
                <span class="toggle-label">Pengiriman Email Transaksi</span>
                <span class="toggle-desc">Kirim email otomatis untuk transaksi dan notifikasi penting.</span>
              </div>
              <label class="toggle-switch">
                <input type="checkbox" id="emailTransaksi" checked/>
                <span class="slider"></span>
              </label>
            </div>

            <div class="toggle-item">
              <div class="toggle-info">
                <span class="toggle-label">Registrasi Mitra Baru</span>
                <span class="toggle-desc">Izinkan mitra laundry melakukan registrasi baru.</span>
              </div>
              <label class="toggle-switch">
                <input type="checkbox" id="registrasiMitra" checked/>
                <span class="slider"></span>
              </label>
            </div>

            <div class="toggle-item">
              <div class="toggle-info">
                <span class="toggle-label">Auto Cancel Pesanan</span>
                <span class="toggle-desc">Batalkan pesanan otomatis jika melewati batas waktu.</span>
              </div>
              <label class="toggle-switch">
                <input type="checkbox" id="autoCancel" checked/>
                <span class="slider"></span>
              </label>
            </div>

            <div class="toggle-item">
              <div class="toggle-info">
                <span class="toggle-label">Auto Approve Mitra</span>
                <span class="toggle-desc">Setujui mitra laundry secara otomatis setelah registrasi.</span>
              </div>
              <label class="toggle-switch">
                <input type="checkbox" id="autoApprove"/>
                <span class="slider"></span>
              </label>
            </div>

            <div class="toggle-item">
              <div class="toggle-info">
                <span class="toggle-label">Fitur Chat Aktif</span>
                <span class="toggle-desc">Aktifkan fitur chat antara pelanggan dan mitra.</span>
              </div>
              <label class="toggle-switch">
                <input type="checkbox" id="fiturChat" checked/>
                <span class="slider"></span>
              </label>
            </div>
          </div>

          <div class="section-footer">
            <button class="btn-primary" onclick="showToast('Pengaturan sistem disimpan!')">Simpan Perubahan</button>
          </div>
        </div>
      </section>

    </main>

    <!-- RIGHT: SIDEBAR PANEL -->
    <aside class="right-panel">

      <!-- Ringkasan Pengaturan -->
      <div class="panel-card">
        <h3 class="panel-title">Ringkasan Pengaturan</h3>
        <p class="panel-sub">Ringkasan konfigurasi platform saat ini.</p>
        <ul class="info-list">
          <li>
            <span class="info-icon blue"><i class="fas fa-code-branch"></i></span>
            <span class="info-key">Versi Aplikasi</span>
            <span class="info-val">v2.3.1</span>
          </li>
          <li>
            <span class="info-icon green"><i class="fas fa-circle-check"></i></span>
            <span class="info-key">Environment</span>
            <span class="info-val">Production</span>
          </li>
          <li>
            <span class="info-icon teal"><i class="fas fa-database"></i></span>
            <span class="info-key">Database</span>
            <span class="info-val">MySQL 8.0</span>
          </li>
          <li>
            <span class="info-icon purple"><i class="fas fa-server"></i></span>
            <span class="info-key">PHP Version</span>
            <span class="info-val">8.2.12</span>
          </li>
          <li>
            <span class="info-icon orange"><i class="fas fa-globe"></i></span>
            <span class="info-key">Server</span>
            <span class="info-val">Nginx 1.24.0</span>
          </li>
          <li>
            <span class="info-icon gray"><i class="fas fa-rotate"></i></span>
            <span class="info-key">Updated Terakhir</span>
            <span class="info-val">8 Mei 2024, 10:15 WIB</span>
          </li>
        </ul>
      </div>

      <!-- Aksi Cepat -->
      <div class="panel-card">
        <h3 class="panel-title">Aksi Cepat</h3>
        <p class="panel-sub">Tindakan cepat untuk pengelolaan platform.</p>
        <ul class="action-list">
          <li class="action-item" onclick="showToast('Cache berhasil dibersihkan!')">
            <span class="action-icon blue"><i class="fas fa-broom"></i></span>
            <span>Bersihkan Cache</span>
            <i class="fas fa-chevron-right action-arrow"></i>
          </li>
          <li class="action-item" onclick="showToast('Backup database dimulai...')">
            <span class="action-icon green"><i class="fas fa-database"></i></span>
            <span>Backup Database</span>
            <i class="fas fa-chevron-right action-arrow"></i>
          </li>
          <li class="action-item" onclick="showToast('Membuka log aktivitas...')">
            <span class="action-icon teal"><i class="fas fa-file-lines"></i></span>
            <span>Logs Aktivitas</span>
            <i class="fas fa-chevron-right action-arrow"></i>
          </li>
          <li class="action-item" onclick="showToast('Reset pengaturan berhasil!')">
            <span class="action-icon red"><i class="fas fa-arrow-rotate-left"></i></span>
            <span>Reset Pengaturan</span>
            <i class="fas fa-chevron-right action-arrow"></i>
          </li>
          <li class="action-item" onclick="showToast('Mengekspor pengaturan...')">
            <span class="action-icon purple"><i class="fas fa-download"></i></span>
            <span>Export Pengaturan</span>
            <i class="fas fa-chevron-right action-arrow"></i>
          </li>
        </ul>
      </div>

      <!-- Catatan -->
      <div class="panel-card">
        <h3 class="panel-title">Catatan</h3>
        <p class="panel-sub">Tambahkan catatan terkait pengaturan platform.</p>
        <textarea class="notes-area" placeholder="Tulis catatan di sini..."></textarea>
        <button class="btn-secondary" onclick="showToast('Catatan disimpan!')">Simpan Catatan</button>
      </div>

    </aside>
  </div>
</div>

<!-- TOAST NOTIFICATION -->
<div class="toast" id="toast">
  <i class="fas fa-circle-check"></i>
  <span id="toastMsg">Perubahan disimpan!</span>
</div>

<script>
/* ============================================================
   LaundryHub Admin Panel – Script
============================================================ */

// ── TOAST NOTIFICATION ──────────────────────────────────────
let toastTimer = null;

function showToast(msg) {
  const toast    = document.getElementById('toast');
  const toastMsg = document.getElementById('toastMsg');
  toastMsg.textContent = msg;
  toast.classList.add('show');
  if (toastTimer) clearTimeout(toastTimer);
  toastTimer = setTimeout(() => toast.classList.remove('show'), 3000);
}

// ── TAB SWITCHING ───────────────────────────────────────────
document.querySelectorAll('.tab').forEach(tab => {
  tab.addEventListener('click', () => {
    document.querySelectorAll('.tab').forEach(t => t.classList.remove('active'));
    tab.classList.add('active');
    if (tab.getAttribute('data-tab') !== 'umum') {
      showToast(`Tab "${tab.textContent}" belum tersedia.`);
    }
  });
});

// ── SIDEBAR TOGGLE (MOBILE) ─────────────────────────────────
const menuToggle = document.getElementById('menuToggle');
const sidebar    = document.querySelector('.sidebar');
let overlay = null;

function openSidebar() {
  sidebar.classList.add('open');
  overlay = document.createElement('div');
  overlay.style.cssText = 'position:fixed;inset:0;background:rgba(0,0,0,.35);z-index:199;transition:opacity .25s;';
  document.body.appendChild(overlay);
  overlay.addEventListener('click', closeSidebar);
}

function closeSidebar() {
  sidebar.classList.remove('open');
  if (overlay) { overlay.remove(); overlay = null; }
}

menuToggle.addEventListener('click', () => {
  sidebar.classList.contains('open') ? closeSidebar() : openSidebar();
});

// ── MOBILE SEARCH TOGGLE ────────────────────────────────────
const mobileSearchToggle = document.getElementById('mobileSearchToggle');
const mobileSearchBar    = document.getElementById('mobileSearchBar');
const mobileSearchInput  = document.getElementById('mobileSearch');

mobileSearchToggle.addEventListener('click', () => {
  mobileSearchBar.classList.toggle('open');
  if (mobileSearchBar.classList.contains('open')) {
    mobileSearchInput.focus();
  }
});

// ── SEARCH: live filter sections (desktop + mobile) ─────────
function filterSections(query) {
  const q = query.toLowerCase().trim();
  document.querySelectorAll('.settings-section').forEach(sec => {
    sec.style.display = (!q || sec.textContent.toLowerCase().includes(q)) ? '' : 'none';
  });
}

document.getElementById('desktopSearch').addEventListener('input', e => filterSections(e.target.value));
mobileSearchInput.addEventListener('input', e => filterSections(e.target.value));

// ── TOGGLE SWITCH FEEDBACK ───────────────────────────────────
document.querySelectorAll('.toggle-switch input[type="checkbox"]').forEach(checkbox => {
  checkbox.addEventListener('change', () => {
    const label = checkbox.closest('.toggle-item').querySelector('.toggle-label').textContent;
    const state = checkbox.checked ? 'diaktifkan' : 'dinonaktifkan';
    showToast(`${label} berhasil ${state}.`);
  });
});

// ── NAV ITEM ACTIVE STATE ────────────────────────────────────
document.querySelectorAll('.nav-item').forEach(item => {
  item.addEventListener('click', () => {
    if (!item.classList.contains('has-arrow')) {
      document.querySelectorAll('.nav-item').forEach(n => n.classList.remove('active'));
      item.classList.add('active');
    }
  });
});

// ── SAVE NOTES WITH Ctrl+Enter ───────────────────────────────
document.querySelector('.notes-area').addEventListener('keydown', e => {
  if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') showToast('Catatan disimpan!');
});

// ── LOGO PREVIEW: klik untuk ganti ──────────────────────────
document.querySelector('.logo-preview').addEventListener('click', () => {
  const inp = document.createElement('input');
  inp.type = 'file';
  inp.accept = 'image/png, image/jpeg';
  inp.onchange = e => {
    const file = e.target.files[0];
    if (!file) return;
    if (file.size > 2 * 1024 * 1024) { showToast('Ukuran file melebihi 2MB!'); return; }
    const reader = new FileReader();
    reader.onload = ev => {
      document.querySelector('.logo-preview').innerHTML =
        `<img src="${ev.target.result}" style="width:100%;height:100%;object-fit:cover;border-radius:8px;" />`;
      showToast('Logo berhasil diubah!');
    };
    reader.readAsDataURL(file);
  };
  inp.click();
});

// ── SCROLL ANIMATION (fade-in sections) ─────────────────────
const observer = new IntersectionObserver(entries => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      entry.target.style.opacity = '1';
      entry.target.style.transform = 'translateY(0)';
      observer.unobserve(entry.target);
    }
  });
}, { threshold: 0.06 });

document.querySelectorAll('.settings-section, .panel-card').forEach(el => {
  el.style.opacity = '0';
  el.style.transform = 'translateY(14px)';
  el.style.transition = 'opacity .4s ease, transform .4s ease';
  observer.observe(el);
});
</script>
</body>
</html>