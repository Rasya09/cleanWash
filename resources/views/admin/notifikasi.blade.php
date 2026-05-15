<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>LaundryHub – Notifikasi</title>
  <link rel="stylesheet" href="{{ asset('assets/css/admin/notifikasi.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/admin/notifikasi-responsive.css') }}">
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
</head>
<body>

<!-- SIDEBAR OVERLAY (mobile backdrop) -->
<div class="sidebar-overlay" id="sidebarOverlay"></div>

<!-- SIDEBAR -->
<aside class="sidebar" id="sidebar">
  <div class="sidebar-logo">
    <div class="logo-icon"><i class="fa-solid fa-shirt"></i></div>
    <div class="logo-text">
      <span class="logo-name">LaundryHub</span>
      <span class="logo-sub">Admin Panel</span>
    </div>
  </div>

  <nav class="sidebar-nav">
    <div class="nav-section-label">DASHBOARD</div>
    <a href="#" class="nav-item"><i class="fa-solid fa-gauge-high"></i> Dashboard</a>

    <div class="nav-section-label">MANAJEMEN</div>
    <a href="#" class="nav-item"><i class="fa-solid fa-users"></i> User / Customer</a>
    <a href="#" class="nav-item"><i class="fa-solid fa-store"></i> Mitra Laundry</a>
    <a href="#" class="nav-item"><i class="fa-solid fa-clipboard-check"></i> Verifikasi Mitra <span class="badge">8</span></a>
    <a href="#" class="nav-item has-sub">
      <i class="fa-solid fa-box"></i> Pesanan (via Mitra)
      <i class="fa-solid fa-chevron-right sub-arrow"></i>
    </a>
    <a href="#" class="nav-item"><i class="fa-solid fa-credit-card"></i> Pembayaran</a>
    <a href="#" class="nav-item"><i class="fa-solid fa-star"></i> Review &amp; Rating</a>
    <a href="#" class="nav-item"><i class="fa-solid fa-triangle-exclamation"></i> Komplain / Laporan <span class="badge">2</span></a>

    <div class="nav-section-label">LAPORAN &amp; ANALITIK</div>
    <a href="#" class="nav-item"><i class="fa-solid fa-chart-bar"></i> Statistik &amp; Laporan</a>
    <a href="#" class="nav-item"><i class="fa-solid fa-clock-rotate-left"></i> Aktivitas</a>

    <div class="nav-section-label">PENGATURAN</div>
    <a href="#" class="nav-item"><i class="fa-solid fa-sliders"></i> Pengaturan Platform</a>
    <a href="#" class="nav-item"><i class="fa-solid fa-user-shield"></i> Admin &amp; Role</a>
    <a href="#" class="nav-item active"><i class="fa-solid fa-bell"></i> Notifikasi</a>
  </nav>

  <div class="sidebar-help">
    <div class="help-title">Butuh bantuan?</div>
    <a href="#" class="help-link">Kunjungi Pusat Bantuan</a>
    <button class="btn-help"><i class="fa-solid fa-headset"></i> Pusat Bantuan</button>
  </div>
</aside>

<!-- MAIN WRAPPER -->
<div class="main-wrapper">

  <!-- TOPBAR -->
  <header class="topbar">
    <button class="topbar-toggle" id="sidebarToggle"><i class="fa-solid fa-bars"></i></button>
    <div class="topbar-title">
      <h1>Notifikasi</h1>
      <p>Kelola dan pantau semua notifikasi yang dikirimkan melalui platform.</p>
    </div>
    <div class="topbar-right">
      <div class="search-box">
        <i class="fa-solid fa-search"></i>
        <input type="text" placeholder="Cari notifikasi, judul, modul..." />
      </div>
      <button class="topbar-icon-btn notif-btn">
        <i class="fa-solid fa-bell"></i>
        <span class="dot-badge">1</span>
      </button>
      <div class="topbar-user">
        <div class="user-avatar">SA</div>
        <div class="user-info">
          <span class="user-name">Super Admin</span>
          <span class="user-role">Administrator</span>
        </div>
        <i class="fa-solid fa-chevron-down"></i>
      </div>
    </div>
  </header>

  <!-- CONTENT -->
  <div class="content-area">

    <!-- STATS CARDS -->
    <div class="stats-grid">
      <div class="stat-card stat-total">
        <div class="stat-icon"><i class="fa-solid fa-paper-plane"></i></div>
        <div class="stat-info">
          <div class="stat-label">Total Notifikasi</div>
          <div class="stat-value">12.458</div>
          <div class="stat-sub">Semua notifikasi</div>
        </div>
      </div>
      <div class="stat-card stat-sent">
        <div class="stat-icon"><i class="fa-solid fa-circle-check"></i></div>
        <div class="stat-info">
          <div class="stat-label">Terkirim</div>
          <div class="stat-value">11.032</div>
          <div class="stat-sub">88,6% dari total</div>
        </div>
      </div>
      <div class="stat-card stat-scheduled">
        <div class="stat-icon"><i class="fa-solid fa-clock"></i></div>
        <div class="stat-info">
          <div class="stat-label">Terjadwal</div>
          <div class="stat-value">1.245</div>
          <div class="stat-sub">10,0% dari total</div>
        </div>
      </div>
      <div class="stat-card stat-failed">
        <div class="stat-icon"><i class="fa-solid fa-circle-xmark"></i></div>
        <div class="stat-info">
          <div class="stat-label">Gagal Terkirim</div>
          <div class="stat-value">181</div>
          <div class="stat-sub">1,4% dari total</div>
        </div>
      </div>
    </div>

    <!-- TABLE SECTION + DETAIL PANEL -->
    <div class="table-detail-wrapper">

      <!-- TABLE SECTION -->
      <div class="table-section" id="tableSection">

        <!-- FILTER BAR -->
        <div class="filter-bar">
          <div class="filter-search">
            <i class="fa-solid fa-search"></i>
            <input type="text" placeholder="Cari judul notifikasi, modul, atau penerima..." id="tableSearch" />
          </div>
          <!-- Selects wrapped for responsive row layout on mobile -->
          <div class="filter-selects-row">
            <select class="filter-select">
              <option>Semua Modul</option>
              <option>Pesanan</option>
              <option>Pembayaran</option>
              <option>Review &amp; Rating</option>
              <option>Verifikasi Mitra</option>
              <option>Komplain</option>
              <option>Laporan</option>
              <option>Marketing</option>
              <option>Keamanan</option>
            </select>
            <select class="filter-select">
              <option>Semua Tipe</option>
              <option>Email</option>
              <option>Push</option>
              <option>SMS</option>
            </select>
            <select class="filter-select">
              <option>Status</option>
              <option>Terkirim</option>
              <option>Terjadwal</option>
              <option>Gagal</option>
              <option>Draf</option>
            </select>
          </div>
          <div class="filter-date">
            <i class="fa-regular fa-calendar"></i>
            <span>1 Mei 2024 - 31 Mei 2024</span>
          </div>
          <button class="btn-filter"><i class="fa-solid fa-filter"></i> Filter</button>
        </div>

        <!-- TABS -->
        <div class="tabs-bar">
          <div class="tabs-left">
            <button class="tab-btn active" data-tab="semua">Semua <span class="tab-count">12.458</span></button>
            <button class="tab-btn" data-tab="terkirim">Terkirim <span class="tab-count">11.032</span></button>
            <button class="tab-btn" data-tab="terjadwal">Terjadwal <span class="tab-count">1.245</span></button>
            <button class="tab-btn" data-tab="gagal">Gagal <span class="tab-count">181</span></button>
            <button class="tab-btn" data-tab="draf">Draf <span class="tab-count">156</span></button>
          </div>
          <button class="btn-primary" id="btnBuatNotif">
            <i class="fa-solid fa-plus"></i> Buat Notifikasi
          </button>
        </div>

        <!-- TABLE -->
        <div class="table-wrapper">
          <table class="notif-table" id="notifTable">
            <thead>
              <tr>
                <th class="th-check"><input type="checkbox" id="checkAll" /></th>
                <th>Judul Notifikasi</th>
                <th>Modul</th>
                <th>Tipe</th>
                <th>Penerima</th>
                <th>Status</th>
                <th>Waktu</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody id="notifTableBody">
              <!-- Rows injected by JS -->
            </tbody>
          </table>
        </div>

        <!-- PAGINATION -->
        <div class="pagination-bar">
          <span class="pagination-info">Menampilkan 1 - 10 dari 12.458 data</span>
          <div class="pagination-right">
            <select class="page-size-select">
              <option>10 / halaman</option>
              <option>25 / halaman</option>
              <option>50 / halaman</option>
            </select>
            <div class="pagination-btns">
              <button class="page-btn" disabled><i class="fa-solid fa-chevron-left"></i></button>
              <button class="page-btn active">1</button>
              <button class="page-btn">2</button>
              <button class="page-btn">3</button>
              <button class="page-btn">4</button>
              <button class="page-btn">5</button>
              <span class="page-ellipsis">…</span>
              <button class="page-btn">1.246</button>
              <button class="page-btn"><i class="fa-solid fa-chevron-right"></i></button>
            </div>
          </div>
        </div>
      </div>

      <!-- DETAIL PANEL -->
      <div class="detail-panel" id="detailPanel">
        <div class="detail-header">
          <h3>Detail Notifikasi</h3>
          <button class="detail-close" id="detailClose"><i class="fa-solid fa-xmark"></i></button>
        </div>

        <div class="detail-body" id="detailBody">
          <div class="detail-empty">
            <i class="fa-solid fa-bell-slash"></i>
            <p>Pilih notifikasi untuk melihat detail</p>
          </div>
        </div>
      </div>

    </div><!-- /table-detail-wrapper -->
  </div><!-- /content-area -->
</div><!-- /main-wrapper -->

<!-- MODAL BUAT NOTIFIKASI -->
<div class="modal-overlay" id="modalOverlay">
  <div class="modal-box">
    <div class="modal-header">
      <h3><i class="fa-solid fa-plus"></i> Buat Notifikasi Baru</h3>
      <button class="modal-close" id="modalClose"><i class="fa-solid fa-xmark"></i></button>
    </div>
    <div class="modal-body">
      <div class="form-group">
        <label>Judul Notifikasi</label>
        <input type="text" placeholder="Masukkan judul notifikasi..." class="form-input" />
      </div>
      <div class="form-row">
        <div class="form-group">
          <label>Modul</label>
          <select class="form-input">
            <option>Pilih Modul</option>
            <option>Pesanan</option>
            <option>Pembayaran</option>
            <option>Marketing</option>
          </select>
        </div>
        <div class="form-group">
          <label>Tipe</label>
          <select class="form-input">
            <option>Pilih Tipe</option>
            <option>Email</option>
            <option>Push</option>
            <option>SMS</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label>Penerima</label>
        <select class="form-input">
          <option>Pilih Penerima</option>
          <option>Customer</option>
          <option>Mitra Laundry</option>
          <option>Admin</option>
        </select>
      </div>
      <div class="form-group">
        <label>Konten Notifikasi</label>
        <textarea class="form-input form-textarea" placeholder="Tulis isi notifikasi..."></textarea>
      </div>
    </div>
    <div class="modal-footer">
      <button class="btn-secondary" id="modalCancel">Batal</button>
      <button class="btn-primary">Simpan sebagai Draf</button>
      <button class="btn-primary btn-send"><i class="fa-solid fa-paper-plane"></i> Kirim Sekarang</button>
    </div>
  </div>
</div>

<script>
  /* =========================================
   LAUNDRYHUB – NOTIFIKASI ADMIN PANEL
   script.js
   ========================================= */

'use strict';

// ─── DATA ────────────────────────────────────────────────────────────────────
const notifications = [
  {
    id: 'NTF-2024-0508-0001',
    judul: 'Pesanan Baru Diterima',
    sub: 'Pesanan via Mitra',
    modul: 'Pesanan',
    tipe: ['Email', 'Push'],
    penerima: 'Mitra Laundry',
    status: 'Terkirim',
    rate: '92%',
    waktu: '8 Mei 2024\n09:20 WIB',
    bahasa: 'Bahasa Indonesia',
    dibuat: 'Super Admin',
    dibuatPada: '8 Mei 2024, 09:10 WIB',
    konten: 'Pesanan baru telah diterima!\nAnda memiliki pesanan baru dari Laundry Bersih Sejahtera.\n\nOrder ID: #ORD-2024-0508-0001\n\nSilakan cek detail pesanan di aplikasi.\n\nTerima kasih.',
    statTotal: 248, statTerkirim: 229, statTerbaca: 189, statGagal: 19,
    iconClass: 'fa-cart-shopping', iconBg: '#eff6ff', iconColor: '#2563eb',
    modulClass: 'mod-pesanan'
  },
  {
    id: 'NTF-2024-0508-0002',
    judul: 'Pembayaran Berhasil',
    sub: 'Pembayaran order #ORD-2024-0508-0001',
    modul: 'Pembayaran',
    tipe: ['Email', 'Push', 'SMS'],
    penerima: 'Customer',
    status: 'Terkirim',
    rate: '100%',
    waktu: '8 Mei 2024\n09:15 WIB',
    bahasa: 'Bahasa Indonesia',
    dibuat: 'System',
    dibuatPada: '8 Mei 2024, 09:14 WIB',
    konten: 'Pembayaran Anda sebesar Rp 75.000 untuk order #ORD-2024-0508-0001 telah berhasil diproses.\n\nTerima kasih telah menggunakan LaundryHub!',
    statTotal: 1, statTerkirim: 1, statTerbaca: 1, statGagal: 0,
    iconClass: 'fa-credit-card', iconBg: '#f0fdf4', iconColor: '#16a34a',
    modulClass: 'mod-pembayaran'
  },
  {
    id: 'NTF-2024-0509-0003',
    judul: 'Pengingat Review',
    sub: 'Berikan review untuk order selesai',
    modul: 'Review & Rating',
    tipe: ['Push'],
    penerima: 'Customer',
    status: 'Terjadwal',
    rate: '',
    waktu: '9 Mei 2024\n10:00 WIB',
    bahasa: 'Bahasa Indonesia',
    dibuat: 'Super Admin',
    dibuatPada: '8 Mei 2024, 11:00 WIB',
    konten: 'Pesanan Anda sudah selesai! Bagaimana pengalaman Anda?\n\nBerikan review dan bantu pelanggan lain menemukan laundry terbaik.',
    statTotal: 0, statTerkirim: 0, statTerbaca: 0, statGagal: 0,
    iconClass: 'fa-star', iconBg: '#f5f3ff', iconColor: '#7c3aed',
    modulClass: 'mod-review'
  },
  {
    id: 'NTF-2024-0507-0004',
    judul: 'Verifikasi Mitra Disetujui',
    sub: 'Akun mitra laundry Anda telah diverifikasi',
    modul: 'Verifikasi Mitra',
    tipe: ['Email', 'Push'],
    penerima: 'Mitra Laundry',
    status: 'Terkirim',
    rate: '100%',
    waktu: '7 Mei 2024\n16:30 WIB',
    bahasa: 'Bahasa Indonesia',
    dibuat: 'Admin',
    dibuatPada: '7 Mei 2024, 16:25 WIB',
    konten: 'Selamat! Akun mitra laundry Anda telah berhasil diverifikasi.\n\nAnda sekarang dapat menerima pesanan dari pelanggan LaundryHub.',
    statTotal: 1, statTerkirim: 1, statTerbaca: 1, statGagal: 0,
    iconClass: 'fa-shield-check', iconBg: '#fffbeb', iconColor: '#d97706',
    modulClass: 'mod-verifikasi'
  },
  {
    id: 'NTF-2024-0507-0005',
    judul: 'Komplain Baru Diterima',
    sub: 'Komplain #CMP-2024-0507-0014',
    modul: 'Komplain',
    tipe: ['Email', 'Push'],
    penerima: 'Admin',
    status: 'Terkirim',
    rate: '100%',
    waktu: '7 Mei 2024\n15:10 WIB',
    bahasa: 'Bahasa Indonesia',
    dibuat: 'System',
    dibuatPada: '7 Mei 2024, 15:09 WIB',
    konten: 'Terdapat komplain baru yang masuk dan memerlukan tindakan segera.\n\nID Komplain: #CMP-2024-0507-0014\n\nSilakan segera tangani komplain ini.',
    statTotal: 3, statTerkirim: 3, statTerbaca: 3, statGagal: 0,
    iconClass: 'fa-triangle-exclamation', iconBg: '#fef2f2', iconColor: '#dc2626',
    modulClass: 'mod-komplain'
  },
  {
    id: 'NTF-2024-0507-0006',
    judul: 'Laporan Harian Platform',
    sub: 'Ringkasan aktivitas platform harian',
    modul: 'Laporan',
    tipe: ['Email'],
    penerima: 'Admin',
    status: 'Terkirim',
    rate: '100%',
    waktu: '7 Mei 2024\n09:00 WIB',
    bahasa: 'Bahasa Indonesia',
    dibuat: 'System',
    dibuatPada: '7 Mei 2024, 09:00 WIB',
    konten: 'Laporan Harian LaundryHub – 6 Mei 2024\n\nTotal Pesanan: 342\nPendapatan: Rp 18.750.000\nMitra Aktif: 128\nCustomer Baru: 45',
    statTotal: 5, statTerkirim: 5, statTerbaca: 4, statGagal: 0,
    iconClass: 'fa-chart-bar', iconBg: '#f1f5f9', iconColor: '#64748b',
    modulClass: 'mod-laporan'
  },
  {
    id: 'NTF-2024-0506-0007',
    judul: 'Promo Spesial Untuk Anda!',
    sub: 'Dapatkan diskon 20% untuk cuci kiloan',
    modul: 'Marketing',
    tipe: ['Push', 'SMS'],
    penerima: 'Customer (Segment)',
    status: 'Gagal',
    rate: '12%',
    waktu: '6 Mei 2024\n18:20 WIB',
    bahasa: 'Bahasa Indonesia',
    dibuat: 'Super Admin',
    dibuatPada: '6 Mei 2024, 17:00 WIB',
    konten: 'Promo eksklusif hanya untuk Anda! 🎉\n\nDapatkan DISKON 20% untuk layanan cuci kiloan.\nBerlaku: 7–10 Mei 2024\n\nGunakan kode: LAUNDRY20',
    statTotal: 4820, statTerkirim: 578, statTerbaca: 210, statGagal: 4242,
    iconClass: 'fa-bullhorn', iconBg: '#fdf4ff', iconColor: '#9333ea',
    modulClass: 'mod-marketing'
  },
  {
    id: 'NTF-2024-0506-0008',
    judul: 'Pesanan Dalam Proses',
    sub: 'Order #ORD-2024-0506-0012 sedang diproses',
    modul: 'Pesanan',
    tipe: ['Push'],
    penerima: 'Customer',
    status: 'Terkirim',
    rate: '95%',
    waktu: '6 Mei 2024\n14:05 WIB',
    bahasa: 'Bahasa Indonesia',
    dibuat: 'System',
    dibuatPada: '6 Mei 2024, 14:04 WIB',
    konten: 'Pesanan Anda sedang diproses!\n\nOrder ID: #ORD-2024-0506-0012\nLaundry: Bersih Kilat Jaya\n\nEstimasi selesai: 8 Mei 2024',
    statTotal: 1, statTerkirim: 1, statTerbaca: 1, statGagal: 0,
    iconClass: 'fa-cart-shopping', iconBg: '#eff6ff', iconColor: '#2563eb',
    modulClass: 'mod-pesanan'
  },
  {
    id: 'NTF-2024-0506-0009',
    judul: 'Pesanan Selesai',
    sub: 'Order #ORD-2024-0506-0012 telah selesai',
    modul: 'Pesanan',
    tipe: ['Email', 'Push', 'SMS'],
    penerima: 'Customer',
    status: 'Terkirim',
    rate: '100%',
    waktu: '6 Mei 2024\n16:45 WIB',
    bahasa: 'Bahasa Indonesia',
    dibuat: 'System',
    dibuatPada: '6 Mei 2024, 16:44 WIB',
    konten: 'Pesanan Anda telah selesai!\n\nOrder ID: #ORD-2024-0506-0012\n\nSilakan jemput pakaian Anda atau tunggu pengiriman.\nTerima kasih telah menggunakan LaundryHub!',
    statTotal: 1, statTerkirim: 1, statTerbaca: 1, statGagal: 0,
    iconClass: 'fa-circle-check', iconBg: '#f0fdf4', iconColor: '#16a34a',
    modulClass: 'mod-pesanan'
  },
  {
    id: 'NTF-2024-0505-0010',
    judul: 'Reset Password',
    sub: 'Permintaan reset password akun Anda',
    modul: 'Keamanan',
    tipe: ['Email'],
    penerima: 'User',
    status: 'Terkirim',
    rate: '100%',
    waktu: '5 Mei 2024\n11:30 WIB',
    bahasa: 'Bahasa Indonesia',
    dibuat: 'System',
    dibuatPada: '5 Mei 2024, 11:29 WIB',
    konten: 'Kami menerima permintaan reset password untuk akun Anda.\n\nKlik tautan di bawah untuk membuat password baru.\nTautan ini akan kedaluwarsa dalam 30 menit.\n\nJika Anda tidak meminta ini, abaikan email ini.',
    statTotal: 1, statTerkirim: 1, statTerbaca: 1, statGagal: 0,
    iconClass: 'fa-lock', iconBg: '#ecfeff', iconColor: '#0e7490',
    modulClass: 'mod-keamanan'
  }
];

// ─── HELPERS ─────────────────────────────────────────────────────────────────
function statusClass(s) {
  if (s === 'Terkirim') return 'stat-terkirim';
  if (s === 'Terjadwal') return 'stat-terjadwal';
  if (s === 'Gagal') return 'stat-gagal';
  return 'stat-draf';
}

function pct(val, total) {
  if (!total) return '0%';
  return Math.round((val / total) * 100) + '%';
}

// ─── RENDER TABLE ────────────────────────────────────────────────────────────
function renderTable(data) {
  const tbody = document.getElementById('notifTableBody');
  if (!data.length) {
    tbody.innerHTML = `<tr><td colspan="8" style="text-align:center;padding:32px;color:var(--text-faint);">
      <i class="fa-solid fa-inbox" style="font-size:24px;display:block;margin-bottom:8px;"></i>Tidak ada data notifikasi</td></tr>`;
    return;
  }

  tbody.innerHTML = data.map((n, idx) => {
    const tipeHtml = n.tipe.map(t => `<span class="tipe-chip">${t}</span>`).join('');
    const waktLines = n.waktu.split('\n');
    return `
    <tr data-idx="${idx}" class="notif-row">
      <td><input type="checkbox" class="row-check" /></td>
      <td>
        <div class="notif-title-cell">
          <div class="row-icon" style="background:${n.iconBg};color:${n.iconColor}">
            <i class="fa-solid ${n.iconClass}"></i>
          </div>
          <div class="notif-title-info">
            <div class="title-main">${n.judul}</div>
            <div class="title-sub">${n.sub}</div>
          </div>
        </div>
      </td>
      <td><span class="module-badge ${n.modulClass}">${n.modul}</span></td>
      <td><div class="tipe-chips">${tipeHtml}</div></td>
      <td style="font-size:12.5px;color:var(--text-muted)">${n.penerima}</td>
      <td>
        <span class="status-badge ${statusClass(n.status)}">${n.status}</span>
        ${n.rate ? `<span class="stat-rate">${n.rate}</span>` : ''}
      </td>
      <td style="font-size:12px;color:var(--text-muted);white-space:nowrap">
        ${waktLines[0]}<br/><span style="color:var(--text-faint)">${waktLines[1] || ''}</span>
      </td>
      <td><button class="aksi-btn"><i class="fa-solid fa-ellipsis"></i></button></td>
    </tr>`;
  }).join('');

  // Click rows → detail
  tbody.querySelectorAll('.notif-row').forEach(tr => {
    tr.addEventListener('click', e => {
      if (e.target.closest('.aksi-btn') || e.target.closest('.row-check')) return;
      const idx = parseInt(tr.dataset.idx);
      showDetail(data[idx]);
      tbody.querySelectorAll('.notif-row').forEach(r => r.classList.remove('selected'));
      tr.classList.add('selected');
    });
  });

  // Aksi btn → stop propagation
  tbody.querySelectorAll('.aksi-btn').forEach(btn => {
    btn.addEventListener('click', e => e.stopPropagation());
  });
}

// ─── SHOW DETAIL ─────────────────────────────────────────────────────────────
function showDetail(n) {
  const panel = document.getElementById('detailPanel');
  const body = document.getElementById('detailBody');

  const sentPct = pct(n.statTerkirim, n.statTotal);
  const readPct = pct(n.statTerbaca, n.statTotal);
  const failPct = pct(n.statGagal, n.statTotal);
  const kontenHtml = n.konten.replace(/\n/g, '<br/>');

  body.innerHTML = `
    <div>
      <span class="detail-status-badge ${statusClass(n.status)}" style="margin-bottom:8px;display:inline-flex">${n.status}</span>
      <div class="detail-notif-title">${n.judul}</div>
      <div class="detail-notif-sub">${n.sub}</div>
    </div>

    <div class="detail-divider"></div>

    <div>
      <div class="detail-section-title">Informasi Notifikasi</div>
      <div class="detail-info-grid">
        <div class="detail-info-row"><span class="detail-info-key">ID Notifikasi</span><span class="detail-info-val" style="font-size:11px">#${n.id}</span></div>
        <div class="detail-info-row"><span class="detail-info-key">Modul</span><span class="detail-info-val"><span class="module-badge ${n.modulClass}" style="font-size:11px">${n.modul}</span></span></div>
        <div class="detail-info-row"><span class="detail-info-key">Tipe</span><span class="detail-info-val">${n.tipe.join(', ')}</span></div>
        <div class="detail-info-row"><span class="detail-info-key">Penerima</span><span class="detail-info-val">${n.penerima}</span></div>
        <div class="detail-info-row"><span class="detail-info-key">Dibuat oleh</span><span class="detail-info-val">${n.dibuat}</span></div>
        <div class="detail-info-row"><span class="detail-info-key">Dibuat pada</span><span class="detail-info-val" style="font-size:11px">${n.dibuatPada}</span></div>
      </div>
    </div>

    <div class="detail-divider"></div>

    <div>
      <div class="detail-section-title">Konten Notifikasi</div>
      <div class="detail-info-row" style="margin-bottom:8px"><span class="detail-info-key">Bahasa</span><span class="detail-info-val">${n.bahasa}</span></div>
      <div class="detail-content-box">${kontenHtml}</div>
    </div>

    <div class="detail-divider"></div>

    <div>
      <div class="detail-section-title">Statistik Pengiriman</div>
      <div class="detail-stat-row"><span class="detail-stat-key">Total Penerima</span><span class="detail-stat-val">${n.statTotal.toLocaleString('id-ID')}</span></div>
      <div class="detail-stat-row"><span class="detail-stat-key">Terkirim</span><span class="detail-stat-val val-green">${n.statTerkirim.toLocaleString('id-ID')} (${sentPct})</span></div>
      <div class="detail-stat-row"><span class="detail-stat-key">Terbaca</span><span class="detail-stat-val">${n.statTerbaca.toLocaleString('id-ID')} (${readPct})</span></div>
      <div class="detail-stat-row"><span class="detail-stat-key">Gagal</span><span class="detail-stat-val val-red">${n.statGagal.toLocaleString('id-ID')} (${failPct})</span></div>
    </div>

    <div class="detail-divider"></div>

    <div>
      <div class="detail-section-title">Aksi</div>
      <div class="detail-aksi">
        <button class="btn-kirim-ulang"><i class="fa-solid fa-paper-plane"></i> Kirim Ulang</button>
        <button class="btn-duplikat"><i class="fa-solid fa-copy"></i> Duplikat</button>
        <button class="btn-hapus"><i class="fa-solid fa-trash"></i> Hapus</button>
      </div>
    </div>
  `;

  // On mobile (≤768px) show panel as full-screen overlay via class
  panel.classList.add('is-open');
}

// ─── FILTER / SEARCH ─────────────────────────────────────────────────────────
function filterData() {
  const q = document.getElementById('tableSearch').value.toLowerCase();
  const activeTab = document.querySelector('.tab-btn.active').dataset.tab;

  return notifications.filter(n => {
    const matchTab = activeTab === 'semua' ||
      (activeTab === 'terkirim' && n.status === 'Terkirim') ||
      (activeTab === 'terjadwal' && n.status === 'Terjadwal') ||
      (activeTab === 'gagal' && n.status === 'Gagal') ||
      (activeTab === 'draf' && n.status === 'Draf');
    const matchQ = !q || n.judul.toLowerCase().includes(q) || n.sub.toLowerCase().includes(q) || n.penerima.toLowerCase().includes(q);
    return matchTab && matchQ;
  });
}

// ─── INIT ─────────────────────────────────────────────────────────────────────
document.addEventListener('DOMContentLoaded', () => {
  renderTable(notifications);

  // Search
  document.getElementById('tableSearch').addEventListener('input', () => {
    renderTable(filterData());
    clearDetail();
  });

  // Tabs
  document.querySelectorAll('.tab-btn').forEach(btn => {
    btn.addEventListener('click', () => {
      document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
      renderTable(filterData());
      clearDetail();
    });
  });

  // Select All checkbox
  document.getElementById('checkAll').addEventListener('change', function () {
    document.querySelectorAll('.row-check').forEach(cb => cb.checked = this.checked);
  });

  // Detail close — juga menyembunyikan panel di mobile
  document.getElementById('detailClose').addEventListener('click', () => {
    document.getElementById('detailPanel').classList.remove('is-open');
    clearDetail();
    document.querySelectorAll('.notif-row').forEach(r => r.classList.remove('selected'));
  });

  // Sidebar toggle + overlay
  const sidebar = document.getElementById('sidebar');
  const overlay = document.getElementById('sidebarOverlay');

  function openSidebar() {
    sidebar.classList.add('open');
    overlay.classList.add('active');
    document.body.style.overflow = 'hidden';
  }
  function closeSidebar() {
    sidebar.classList.remove('open');
    overlay.classList.remove('active');
    document.body.style.overflow = '';
  }

  document.getElementById('sidebarToggle').addEventListener('click', () => {
    sidebar.classList.contains('open') ? closeSidebar() : openSidebar();
  });
  overlay.addEventListener('click', closeSidebar);

  // Tutup sidebar saat nav item diklik di mobile
  sidebar.querySelectorAll('.nav-item').forEach(item => {
    item.addEventListener('click', () => {
      if (window.innerWidth <= 768) closeSidebar();
    });
  });

  // Modal Buat Notifikasi
  const modalOverlay = document.getElementById('modalOverlay');
  document.getElementById('btnBuatNotif').addEventListener('click', () => {
    modalOverlay.classList.add('open');
  });
  document.getElementById('modalClose').addEventListener('click', () => {
    modalOverlay.classList.remove('open');
  });
  document.getElementById('modalCancel').addEventListener('click', () => {
    modalOverlay.classList.remove('open');
  });
  modalOverlay.addEventListener('click', e => {
    if (e.target === modalOverlay) modalOverlay.classList.remove('open');
  });

  // Pagination buttons
  document.querySelectorAll('.page-btn').forEach(btn => {
    btn.addEventListener('click', function () {
      if (this.disabled || this.querySelector('i')) return;
      document.querySelectorAll('.page-btn').forEach(b => {
        if (!b.querySelector('i')) b.classList.remove('active');
      });
      this.classList.add('active');
    });
  });

  // Auto-open first row detail
  const firstRow = document.querySelector('.notif-row');
  if (firstRow) firstRow.click();
});

function clearDetail() {
  const panel = document.getElementById('detailPanel');
  const body = document.getElementById('detailBody');
  panel.classList.remove('is-open');
  body.innerHTML = `
    <div class="detail-empty">
      <i class="fa-solid fa-bell-slash"></i>
      <p>Pilih notifikasi untuk melihat detail</p>
    </div>`;
}
</script>
</body>
</html>