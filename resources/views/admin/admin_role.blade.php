<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>LaundryHub – Admin & Role</title>
  <link rel="stylesheet" href="admin-role.css"/>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
  <link rel="stylesheet" href="{{ asset('assets/css/admin/admin_role.css') }}">
</head>
<body>

<!-- ===== SIDEBAR ===== -->
<aside class="sidebar" id="sidebar">
  <div class="sidebar-brand">
    <div class="brand-icon"><i class="fas fa-tshirt"></i></div>
    <div class="brand-text">
      <span class="brand-name">LaundryHub</span>
      <span class="brand-sub">Admin Panel</span>
    </div>
  </div>

  <nav class="sidebar-nav">
    <div class="nav-section-title">DASHBOARD</div>
    <a href="#" class="nav-item"><i class="fas fa-gauge-high"></i><span>Dashboard</span></a>

    <div class="nav-section-title">MANAJEMEN</div>
    <a href="#" class="nav-item"><i class="fas fa-users"></i><span>User / Customer</span></a>
    <a href="#" class="nav-item"><i class="fas fa-store"></i><span>Mitra Laundry</span></a>
    <a href="#" class="nav-item has-badge"><i class="fas fa-user-check"></i><span>Verifikasi Mitra</span><span class="badge red">8</span></a>
    <a href="#" class="nav-item has-arrow"><i class="fas fa-box"></i><span>Pesanan (via Mitra)</span><i class="fas fa-chevron-right arrow-icon"></i></a>
    <a href="#" class="nav-item"><i class="fas fa-credit-card"></i><span>Pembayaran</span></a>
    <a href="#" class="nav-item"><i class="fas fa-star"></i><span>Review & Rating</span></a>
    <a href="#" class="nav-item has-badge"><i class="fas fa-file-alt"></i><span>Komplain / Laporan</span><span class="badge red">2</span></a>

    <div class="nav-section-title">LAPORAN & ANALITIK</div>
    <a href="#" class="nav-item"><i class="fas fa-chart-bar"></i><span>Statistik & Laporan</span></a>
    <a href="#" class="nav-item"><i class="fas fa-clock-rotate-left"></i><span>Aktivitas</span></a>

    <div class="nav-section-title">PENGATURAN</div>
    <a href="#" class="nav-item"><i class="fas fa-sliders"></i><span>Pengaturan Platform</span></a>
    <a href="#" class="nav-item active"><i class="fas fa-user-shield"></i><span>Admin & Role</span></a>
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
      <h1>Admin &amp; Role</h1>
      <p>Kelola data admin, pengguna sistem, dan hak akses (role).</p>
    </div>
    <div class="topbar-right">
      <div class="search-box">
        <i class="fas fa-magnifying-glass"></i>
        <input type="text" placeholder="Cari admin, email, atau role..." id="globalSearch"/>
      </div>
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

  <!-- CONTENT AREA -->
  <div class="content-area">

    <!-- LEFT: MAIN PANEL -->
    <main class="admin-main">

      <!-- TABS -->
      <div class="tabs-bar">
        <button class="tab active" data-tab="admin">Admin</button>
        <button class="tab" data-tab="role">Role</button>
      </div>

      <!-- STAT CARDS -->
      <div class="stat-cards">
        <div class="stat-card">
          <div class="stat-icon blue"><i class="fas fa-users"></i></div>
          <div class="stat-body">
            <span class="stat-label">Total Admin</span>
            <span class="stat-value">28</span>
            <span class="stat-desc">Semua admin terdaftar</span>
          </div>
        </div>
        <div class="stat-card">
          <div class="stat-icon green"><i class="fas fa-circle-check"></i></div>
          <div class="stat-body">
            <span class="stat-label">Aktif</span>
            <span class="stat-value">24</span>
            <span class="stat-desc">85,7% dari total admin</span>
          </div>
        </div>
        <div class="stat-card">
          <div class="stat-icon orange"><i class="fas fa-clock"></i></div>
          <div class="stat-body">
            <span class="stat-label">Nonaktif</span>
            <span class="stat-value">3</span>
            <span class="stat-desc">10,7% dari total admin</span>
          </div>
        </div>
        <div class="stat-card">
          <div class="stat-icon red"><i class="fas fa-circle-xmark"></i></div>
          <div class="stat-body">
            <span class="stat-label">Diblokir</span>
            <span class="stat-value">1</span>
            <span class="stat-desc">3,6% dari total admin</span>
          </div>
        </div>
      </div>

      <!-- TOOLBAR -->
      <div class="toolbar">
        <div class="toolbar-left">
          <div class="search-inline">
            <i class="fas fa-magnifying-glass"></i>
            <input type="text" placeholder="Cari admin, email, atau no. telepon..." id="tableSearch"/>
          </div>
          <div class="select-wrap">
            <select id="filterRole">
              <option value="">Semua Role</option>
              <option value="Super Admin">Super Admin</option>
              <option value="Admin Operasional">Admin Operasional</option>
              <option value="Admin Keuangan">Admin Keuangan</option>
              <option value="Admin Customer Service">Admin Customer Service</option>
              <option value="Admin Laporan">Admin Laporan</option>
              <option value="Admin Verifikasi">Admin Verifikasi</option>
              <option value="Admin Marketing">Admin Marketing</option>
              <option value="Admin IT">Admin IT</option>
            </select>
            <i class="fas fa-chevron-down"></i>
          </div>
          <div class="select-wrap">
            <select id="filterStatus">
              <option value="">Status</option>
              <option value="Aktif">Aktif</option>
              <option value="Nonaktif">Nonaktif</option>
              <option value="Diblokir">Diblokir</option>
            </select>
            <i class="fas fa-chevron-down"></i>
          </div>
          <button class="btn-filter"><i class="fas fa-sliders"></i> Filter</button>
        </div>
        <button class="btn-primary" onclick="openModal()">
          <i class="fas fa-plus"></i> Tambah Admin
        </button>
      </div>

      <!-- TABLE -->
      <div class="table-wrap">
        <table class="admin-table" id="adminTable">
          <thead>
            <tr>
              <th><input type="checkbox" id="checkAll"/></th>
              <th>Admin</th>
              <th>Role</th>
              <th>Email</th>
              <th>Status</th>
              <th>Terakhir Aktif</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody id="tableBody">
            <!-- rows injected by JS -->
          </tbody>
        </table>
      </div>

      <!-- PAGINATION -->
      <div class="pagination-bar">
        <span class="pagination-info" id="paginationInfo">Menampilkan 1 - 10 dari 28 data</span>
        <div class="pagination-right">
          <div class="select-wrap sm">
            <select id="perPage">
              <option value="10">10 / halaman</option>
              <option value="20">20 / halaman</option>
              <option value="50">50 / halaman</option>
            </select>
            <i class="fas fa-chevron-down"></i>
          </div>
          <div class="page-controls" id="pageControls"></div>
        </div>
      </div>

    </main>

    <!-- RIGHT PANEL -->
    <aside class="right-panel">

      <!-- Ringkasan Role -->
      <div class="panel-card">
        <div class="panel-card-header">
          <div>
            <h3 class="panel-title">Ringkasan Role</h3>
          </div>
          <a href="#" class="link-blue">Kelola Role</a>
        </div>
        <ul class="role-list">
          <li class="role-item">
            <span class="role-icon purple"><i class="fas fa-crown"></i></span>
            <div class="role-info">
              <span class="role-name">Super Admin</span>
              <span class="role-count">1 admin</span>
            </div>
          </li>
          <li class="role-item">
            <span class="role-icon blue"><i class="fas fa-sliders"></i></span>
            <div class="role-info">
              <span class="role-name">Admin Operasional</span>
              <span class="role-count">6 admin</span>
            </div>
          </li>
          <li class="role-item">
            <span class="role-icon green"><i class="fas fa-coins"></i></span>
            <div class="role-info">
              <span class="role-name">Admin Keuangan</span>
              <span class="role-count">4 admin</span>
            </div>
          </li>
          <li class="role-item">
            <span class="role-icon orange"><i class="fas fa-headset"></i></span>
            <div class="role-info">
              <span class="role-name">Admin Customer Service</span>
              <span class="role-count">3 admin</span>
            </div>
          </li>
          <li class="role-item">
            <span class="role-icon teal"><i class="fas fa-chart-bar"></i></span>
            <div class="role-info">
              <span class="role-name">Admin Laporan</span>
              <span class="role-count">3 admin</span>
            </div>
          </li>
          <li class="role-item">
            <span class="role-icon blue2"><i class="fas fa-user-check"></i></span>
            <div class="role-info">
              <span class="role-name">Admin Verifikasi</span>
              <span class="role-count">2 admin</span>
            </div>
          </li>
          <li class="role-item">
            <span class="role-icon red"><i class="fas fa-bullhorn"></i></span>
            <div class="role-info">
              <span class="role-name">Admin Marketing</span>
              <span class="role-count">2 admin</span>
            </div>
          </li>
          <li class="role-item">
            <span class="role-icon gray"><i class="fas fa-laptop-code"></i></span>
            <div class="role-info">
              <span class="role-name">Admin IT</span>
              <span class="role-count">2 admin</span>
            </div>
          </li>
          <li class="role-item">
            <span class="role-icon dark"><i class="fas fa-ellipsis"></i></span>
            <div class="role-info">
              <span class="role-name">Lainnya</span>
              <span class="role-count">3 admin</span>
            </div>
          </li>
        </ul>
      </div>

      <!-- Aktivitas Terakhir -->
      <div class="panel-card">
        <div class="panel-card-header">
          <h3 class="panel-title">Aktivitas Terakhir</h3>
          <a href="#" class="link-blue">Lihat Semua</a>
        </div>
        <ul class="activity-list">
          <li class="activity-item">
            <span class="act-icon green"><i class="fas fa-user-plus"></i></span>
            <div class="act-info">
              <p><strong>Andi Pratama</strong> ditambahkan</p>
              <span>Oleh Super Admin • 8 Mei 2024, 09:20 WIB</span>
            </div>
          </li>
          <li class="activity-item">
            <span class="act-icon blue"><i class="fas fa-pen"></i></span>
            <div class="act-info">
              <p><strong>Role Admin Keuangan</strong> diperbarui</p>
              <span>Oleh Budi Santoso • 7 Mei 2024, 16:30 WIB</span>
            </div>
          </li>
          <li class="activity-item">
            <span class="act-icon red"><i class="fas fa-ban"></i></span>
            <div class="act-info">
              <p><strong>Agus Setiawan</strong> diblokir</p>
              <span>Oleh Super Admin • 6 Mei 2024, 11:15 WIB</span>
            </div>
          </li>
          <li class="activity-item">
            <span class="act-icon green"><i class="fas fa-user-plus"></i></span>
            <div class="act-info">
              <p><strong>Siti Aisyah</strong> diaktifkan</p>
              <span>Oleh Super Admin • 5 Mei 2024, 10:05 WIB</span>
            </div>
          </li>
          <li class="activity-item">
            <span class="act-icon red"><i class="fas fa-trash"></i></span>
            <div class="act-info">
              <p><strong>Rina Marlina</strong> dihapus</p>
              <span>Oleh Super Admin • 3 Mei 2024, 08:40 WIB</span>
            </div>
          </li>
        </ul>
      </div>

    </aside>
  </div>
</div>

<!-- ===== MODAL: TAMBAH ADMIN ===== -->
<div class="modal-overlay" id="modalOverlay">
  <div class="modal">
    <div class="modal-header">
      <h2>Tambah Admin</h2>
      <button class="modal-close" onclick="closeModal()"><i class="fas fa-xmark"></i></button>
    </div>
    <div class="modal-body">
      <div class="form-row">
        <div class="form-group">
          <label>Nama Lengkap</label>
          <input type="text" placeholder="Masukkan nama lengkap" id="mNama"/>
        </div>
        <div class="form-group">
          <label>No. Telepon</label>
          <input type="text" placeholder="0812-xxxx-xxxx" id="mPhone"/>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group">
          <label>Email</label>
          <input type="email" placeholder="email@laundryhub.com" id="mEmail"/>
        </div>
        <div class="form-group">
          <label>Role</label>
          <div class="select-wrap">
            <select id="mRole">
              <option value="">Pilih Role</option>
              <option>Super Admin</option>
              <option>Admin Operasional</option>
              <option>Admin Keuangan</option>
              <option>Admin Customer Service</option>
              <option>Admin Laporan</option>
              <option>Admin Verifikasi</option>
              <option>Admin Marketing</option>
              <option>Admin IT</option>
            </select>
            <i class="fas fa-chevron-down"></i>
          </div>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group">
          <label>Password</label>
          <input type="password" placeholder="Buat password" id="mPass"/>
        </div>
        <div class="form-group">
          <label>Status</label>
          <div class="select-wrap">
            <select id="mStatus">
              <option value="Aktif">Aktif</option>
              <option value="Nonaktif">Nonaktif</option>
            </select>
            <i class="fas fa-chevron-down"></i>
          </div>
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <button class="btn-cancel" onclick="closeModal()">Batal</button>
      <button class="btn-primary" onclick="addAdmin()"><i class="fas fa-plus"></i> Tambah Admin</button>
    </div>
  </div>
</div>

<!-- DROPDOWN CONTEXT MENU -->
<div class="context-menu" id="contextMenu">
  <button class="ctx-item" id="ctxEdit"><i class="fas fa-pen"></i> Edit Admin</button>
  <button class="ctx-item" id="ctxToggle"><i class="fas fa-toggle-on"></i> Nonaktifkan</button>
  <button class="ctx-item" id="ctxBlock"><i class="fas fa-ban"></i> Blokir Admin</button>
  <div class="ctx-divider"></div>
  <button class="ctx-item danger" id="ctxDelete"><i class="fas fa-trash"></i> Hapus Admin</button>
</div>

<!-- TOAST -->
<div class="toast" id="toast">
  <i class="fas fa-circle-check"></i>
  <span id="toastMsg">Berhasil!</span>
</div>

<script>
  /* ============================================
   LaundryHub – admin-role.js
============================================ */

// ── DATA ────────────────────────────────────
const adminData = [
  { id:1,  name:'Super Admin',   phone:'0812-3456-7890', role:'Super Admin',          email:'admin@laundryhub.com',          status:'Aktif',    last:'8 Mei 2024, 10:15 WIB', me:true,  img:'https://i.pravatar.cc/36?img=12' },
  { id:2,  name:'Andi Pratama',  phone:'0812-3456-7891', role:'Admin Operasional',    email:'andi.pratama@laundryhub.com',   status:'Aktif',    last:'8 Mei 2024, 09:42 WIB', me:false, img:'https://i.pravatar.cc/36?img=3'  },
  { id:3,  name:'Budi Santoso',  phone:'0812-3456-7892', role:'Admin Keuangan',       email:'budi.santoso@laundryhub.com',   status:'Aktif',    last:'7 Mei 2024, 16:30 WIB', me:false, img:'https://i.pravatar.cc/36?img=5'  },
  { id:4,  name:'Siti Aisyah',   phone:'0812-3456-7893', role:'Admin Customer Service',email:'siti.aisyah@laundryhub.com',   status:'Aktif',    last:'8 Mei 2024, 08:55 WIB', me:false, img:'https://i.pravatar.cc/36?img=9'  },
  { id:5,  name:'Dewi Lestari',  phone:'0812-3456-7894', role:'Admin Laporan',        email:'dewi.lestari@laundryhub.com',   status:'Aktif',    last:'7 Mei 2024, 14:20 WIB', me:false, img:'https://i.pravatar.cc/36?img=16' },
  { id:6,  name:'Fahmi Hidayat', phone:'0812-3456-7895', role:'Admin Verifikasi',     email:'fahmi.hidayat@laundryhub.com',  status:'Nonaktif', last:'2 Mei 2024, 11:10 WIB', me:false, img:'https://i.pravatar.cc/36?img=7'  },
  { id:7,  name:'Rina Marlina',  phone:'0812-3456-7896', role:'Admin Marketing',      email:'rina.marlina@laundryhub.com',   status:'Aktif',    last:'6 Mei 2024, 17:45 WIB', me:false, img:'https://i.pravatar.cc/36?img=20' },
  { id:8,  name:'Agus Setiawan', phone:'0812-3456-7897', role:'Admin IT',             email:'agus.setiawan@laundryhub.com',  status:'Diblokir', last:'—',                      me:false, img:'https://i.pravatar.cc/36?img=8'  },
  { id:9,  name:'Maya Putri',    phone:'0812-3456-7898', role:'Admin Operasional',    email:'maya.putri@laundryhub.com',     status:'Aktif',    last:'8 Mei 2024, 07:30 WIB', me:false, img:'https://i.pravatar.cc/36?img=22' },
  { id:10, name:'Rudi Hermawan', phone:'0812-3456-7899', role:'Admin Keuangan',       email:'rudi.hermawan@laundryhub.com',  status:'Nonaktif', last:'1 Mei 2024, 09:05 WIB', me:false, img:'https://i.pravatar.cc/36?img=11' },
  { id:11, name:'Hendra Wijaya', phone:'0812-3456-7900', role:'Admin Operasional',    email:'hendra.wijaya@laundryhub.com',  status:'Aktif',    last:'8 Mei 2024, 11:00 WIB', me:false, img:'https://i.pravatar.cc/36?img=15' },
  { id:12, name:'Lina Susanti',  phone:'0812-3456-7901', role:'Admin Customer Service',email:'lina.susanti@laundryhub.com',  status:'Aktif',    last:'7 Mei 2024, 13:22 WIB', me:false, img:'https://i.pravatar.cc/36?img=25' },
  { id:13, name:'Tono Bagus',    phone:'0812-3456-7902', role:'Admin Laporan',        email:'tono.bagus@laundryhub.com',     status:'Aktif',    last:'6 Mei 2024, 09:15 WIB', me:false, img:'https://i.pravatar.cc/36?img=18' },
  { id:14, name:'Wulan Ayu',     phone:'0812-3456-7903', role:'Admin Marketing',      email:'wulan.ayu@laundryhub.com',      status:'Aktif',    last:'5 Mei 2024, 15:40 WIB', me:false, img:'https://i.pravatar.cc/36?img=26' },
  { id:15, name:'Joko Prasetyo', phone:'0812-3456-7904', role:'Admin Verifikasi',     email:'joko.prasetyo@laundryhub.com',  status:'Aktif',    last:'4 Mei 2024, 12:00 WIB', me:false, img:'https://i.pravatar.cc/36?img=60' },
  { id:16, name:'Eka Saputra',   phone:'0812-3456-7905', role:'Admin IT',             email:'eka.saputra@laundryhub.com',    status:'Aktif',    last:'3 Mei 2024, 10:30 WIB', me:false, img:'https://i.pravatar.cc/36?img=61' },
  { id:17, name:'Nurul Hidayah', phone:'0812-3456-7906', role:'Admin Keuangan',       email:'nurul.hidayah@laundryhub.com',  status:'Aktif',    last:'2 Mei 2024, 08:45 WIB', me:false, img:'https://i.pravatar.cc/36?img=44' },
  { id:18, name:'Bayu Kurniawan',phone:'0812-3456-7907', role:'Admin Operasional',    email:'bayu.kurniawan@laundryhub.com', status:'Aktif',    last:'8 Mei 2024, 06:50 WIB', me:false, img:'https://i.pravatar.cc/36?img=55' },
  { id:19, name:'Fitri Rahayu',  phone:'0812-3456-7908', role:'Admin Customer Service',email:'fitri.rahayu@laundryhub.com',  status:'Aktif',    last:'7 Mei 2024, 16:10 WIB', me:false, img:'https://i.pravatar.cc/36?img=49' },
  { id:20, name:'Dian Pratiwi',  phone:'0812-3456-7909', role:'Admin Laporan',        email:'dian.pratiwi@laundryhub.com',   status:'Nonaktif', last:'1 Mei 2024, 07:20 WIB', me:false, img:'https://i.pravatar.cc/36?img=45' },
  { id:21, name:'Irfan Maulana', phone:'0812-3456-7910', role:'Admin Verifikasi',     email:'irfan.maulana@laundryhub.com',  status:'Aktif',    last:'8 Mei 2024, 09:05 WIB', me:false, img:'https://i.pravatar.cc/36?img=56' },
  { id:22, name:'Siska Amelia',  phone:'0812-3456-7911', role:'Admin Keuangan',       email:'siska.amelia@laundryhub.com',   status:'Aktif',    last:'6 Mei 2024, 14:55 WIB', me:false, img:'https://i.pravatar.cc/36?img=47' },
  { id:23, name:'Pandu Santoso', phone:'0812-3456-7912', role:'Admin Marketing',      email:'pandu.santoso@laundryhub.com',  status:'Aktif',    last:'5 Mei 2024, 11:30 WIB', me:false, img:'https://i.pravatar.cc/36?img=59' },
  { id:24, name:'Tiara Dewi',    phone:'0812-3456-7913', role:'Admin Operasional',    email:'tiara.dewi@laundryhub.com',     status:'Aktif',    last:'4 Mei 2024, 13:45 WIB', me:false, img:'https://i.pravatar.cc/36?img=48' },
  { id:25, name:'Yusuf Hakim',   phone:'0812-3456-7914', role:'Admin IT',             email:'yusuf.hakim@laundryhub.com',    status:'Aktif',    last:'3 Mei 2024, 09:00 WIB', me:false, img:'https://i.pravatar.cc/36?img=57' },
  { id:26, name:'Rahmi Putri',   phone:'0812-3456-7915', role:'Admin Laporan',        email:'rahmi.putri@laundryhub.com',    status:'Aktif',    last:'2 Mei 2024, 10:15 WIB', me:false, img:'https://i.pravatar.cc/36?img=43' },
  { id:27, name:'Galih Wahyu',   phone:'0812-3456-7916', role:'Admin Customer Service',email:'galih.wahyu@laundryhub.com',   status:'Aktif',    last:'1 Mei 2024, 15:00 WIB', me:false, img:'https://i.pravatar.cc/36?img=52' },
  { id:28, name:'Mira Anggraini',phone:'0812-3456-7917', role:'Admin Operasional',    email:'mira.anggraini@laundryhub.com', status:'Aktif',    last:'8 Mei 2024, 08:00 WIB', me:false, img:'https://i.pravatar.cc/36?img=46' },
];

// ── STATE ────────────────────────────────────
let currentPage  = 1;
let perPage      = 10;
let filteredData = [...adminData];
let contextRowId = null;

// ── ROLE BADGE CLASS MAP ─────────────────────
const roleClassMap = {
  'Super Admin':           'super-admin',
  'Admin Operasional':     'admin-operasional',
  'Admin Keuangan':        'admin-keuangan',
  'Admin Customer Service':'admin-cs',
  'Admin Laporan':         'admin-laporan',
  'Admin Verifikasi':      'admin-verifikasi',
  'Admin Marketing':       'admin-marketing',
  'Admin IT':              'admin-it',
};

// ── RENDER TABLE ─────────────────────────────
function renderTable() {
  const tbody = document.getElementById('tableBody');
  const start = (currentPage - 1) * perPage;
  const end   = Math.min(start + perPage, filteredData.length);
  const page  = filteredData.slice(start, end);

  if (page.length === 0) {
    tbody.innerHTML = `<tr><td colspan="7" style="text-align:center;padding:36px;color:var(--text-sub);">Tidak ada data yang ditemukan.</td></tr>`;
    return;
  }

  tbody.innerHTML = page.map(a => `
    <tr data-id="${a.id}">
      <td><input type="checkbox" class="row-check" data-id="${a.id}"/></td>
      <td>
        <div class="admin-cell">
          <img src="${a.img}" alt="${a.name}" class="admin-avatar" onerror="this.src='https://ui-avatars.com/api/?name=${encodeURIComponent(a.name)}&size=36&background=eff6ff&color=2563eb'"/>
          <div class="admin-name-wrap">
            <div class="name">
              ${a.name}
              ${a.me ? '<span class="tag-anda">Anda</span>' : ''}
            </div>
            <div class="phone">${a.phone}</div>
          </div>
        </div>
      </td>
      <td><span class="role-badge ${roleClassMap[a.role] || ''}">${a.role}</span></td>
      <td>${a.email}</td>
      <td><span class="status-dot ${a.status.toLowerCase()}">${a.status}</span></td>
      <td>${a.last}</td>
      <td>
        <button class="btn-dots" onclick="openCtx(event, ${a.id})">
          <i class="fas fa-ellipsis"></i>
        </button>
      </td>
    </tr>
  `).join('');

  document.getElementById('paginationInfo').textContent =
    `Menampilkan ${start + 1} - ${end} dari ${filteredData.length} data`;

  renderPagination();
}

// ── PAGINATION ───────────────────────────────
function renderPagination() {
  const total = Math.ceil(filteredData.length / perPage);
  const ctrl  = document.getElementById('pageControls');

  let html = `<button class="btn-page" onclick="goPage(${currentPage - 1})" ${currentPage === 1 ? 'disabled' : ''}>
    <i class="fas fa-chevron-left"></i></button>`;

  for (let i = 1; i <= total; i++) {
    if (total > 7 && i > 3 && i < total - 1 && Math.abs(i - currentPage) > 1) {
      if (i === 4 || i === total - 2) html += `<span style="padding:0 4px;color:var(--text-light)">…</span>`;
      continue;
    }
    html += `<button class="btn-page ${i === currentPage ? 'active' : ''}" onclick="goPage(${i})">${i}</button>`;
  }

  html += `<button class="btn-page" onclick="goPage(${currentPage + 1})" ${currentPage === total ? 'disabled' : ''}>
    <i class="fas fa-chevron-right"></i></button>`;

  ctrl.innerHTML = html;
}

function goPage(p) {
  const total = Math.ceil(filteredData.length / perPage);
  if (p < 1 || p > total) return;
  currentPage = p;
  renderTable();
}

// ── FILTER ───────────────────────────────────
function applyFilters() {
  const q      = document.getElementById('tableSearch').value.toLowerCase();
  const role   = document.getElementById('filterRole').value;
  const status = document.getElementById('filterStatus').value;

  filteredData = adminData.filter(a => {
    const matchQ      = !q || a.name.toLowerCase().includes(q) || a.email.toLowerCase().includes(q) || a.phone.includes(q);
    const matchRole   = !role   || a.role === role;
    const matchStatus = !status || a.status === status;
    return matchQ && matchRole && matchStatus;
  });

  currentPage = 1;
  renderTable();
}

document.getElementById('tableSearch').addEventListener('input', applyFilters);
document.getElementById('filterRole').addEventListener('change', applyFilters);
document.getElementById('filterStatus').addEventListener('change', applyFilters);

document.getElementById('perPage').addEventListener('change', function () {
  perPage = parseInt(this.value);
  currentPage = 1;
  renderTable();
});

// ── CHECK ALL ────────────────────────────────
document.getElementById('checkAll').addEventListener('change', function () {
  document.querySelectorAll('.row-check').forEach(cb => cb.checked = this.checked);
});

// ── MODAL ────────────────────────────────────
function openModal() {
  document.getElementById('modalOverlay').classList.add('open');
}
function closeModal() {
  document.getElementById('modalOverlay').classList.remove('open');
}
document.getElementById('modalOverlay').addEventListener('click', function (e) {
  if (e.target === this) closeModal();
});

function addAdmin() {
  const name   = document.getElementById('mNama').value.trim();
  const phone  = document.getElementById('mPhone').value.trim();
  const email  = document.getElementById('mEmail').value.trim();
  const role   = document.getElementById('mRole').value;
  const status = document.getElementById('mStatus').value;

  if (!name || !email || !role) {
    showToast('Mohon lengkapi semua field wajib!');
    return;
  }

  const newAdmin = {
    id: adminData.length + 1,
    name, phone, role, email, status,
    last: '—',
    me: false,
    img: `https://ui-avatars.com/api/?name=${encodeURIComponent(name)}&size=36&background=eff6ff&color=2563eb`
  };

  adminData.unshift(newAdmin);
  applyFilters();
  closeModal();
  showToast(`${name} berhasil ditambahkan!`);

  // Reset form
  ['mNama','mPhone','mEmail','mPass'].forEach(id => document.getElementById(id).value = '');
  document.getElementById('mRole').value = '';
  document.getElementById('mStatus').value = 'Aktif';
}

// ── CONTEXT MENU ─────────────────────────────
const ctxMenu = document.getElementById('contextMenu');

function openCtx(e, id) {
  e.stopPropagation();
  contextRowId = id;
  const admin = adminData.find(a => a.id === id);

  // Update toggle label
  document.getElementById('ctxToggle').innerHTML =
    admin.status === 'Aktif'
      ? '<i class="fas fa-toggle-off"></i> Nonaktifkan'
      : '<i class="fas fa-toggle-on"></i> Aktifkan';

  ctxMenu.style.top  = `${Math.min(e.clientY, window.innerHeight - 180)}px`;
  ctxMenu.style.left = `${Math.min(e.clientX - 160, window.innerWidth - 170)}px`;
  ctxMenu.classList.add('open');
}

function closeCtx() { ctxMenu.classList.remove('open'); }
document.addEventListener('click', closeCtx);

document.getElementById('ctxEdit').addEventListener('click', () => {
  showToast('Fitur edit admin segera hadir.');
});

document.getElementById('ctxToggle').addEventListener('click', () => {
  const admin = adminData.find(a => a.id === contextRowId);
  if (!admin) return;
  admin.status = admin.status === 'Aktif' ? 'Nonaktif' : 'Aktif';
  applyFilters();
  showToast(`${admin.name} berhasil ${admin.status === 'Aktif' ? 'diaktifkan' : 'dinonaktifkan'}.`);
});

document.getElementById('ctxBlock').addEventListener('click', () => {
  const admin = adminData.find(a => a.id === contextRowId);
  if (!admin) return;
  admin.status = 'Diblokir';
  applyFilters();
  showToast(`${admin.name} telah diblokir.`);
});

document.getElementById('ctxDelete').addEventListener('click', () => {
  const idx = adminData.findIndex(a => a.id === contextRowId);
  if (idx === -1) return;
  const name = adminData[idx].name;
  adminData.splice(idx, 1);
  applyFilters();
  showToast(`${name} berhasil dihapus.`);
});

// ── TABS ─────────────────────────────────────
document.querySelectorAll('.tab').forEach(tab => {
  tab.addEventListener('click', () => {
    document.querySelectorAll('.tab').forEach(t => t.classList.remove('active'));
    tab.classList.add('active');
    if (tab.dataset.tab !== 'admin') showToast('Tab "' + tab.textContent.trim() + '" belum tersedia.');
  });
});

// ── SIDEBAR TOGGLE ───────────────────────────
const sidebar = document.getElementById('sidebar');
let overlay = null;

document.getElementById('menuToggle').addEventListener('click', () => {
  if (sidebar.classList.contains('open')) {
    sidebar.classList.remove('open');
    overlay && overlay.remove(); overlay = null;
  } else {
    sidebar.classList.add('open');
    overlay = document.createElement('div');
    overlay.style.cssText = 'position:fixed;inset:0;background:rgba(0,0,0,.35);z-index:99;';
    document.body.appendChild(overlay);
    overlay.addEventListener('click', () => {
      sidebar.classList.remove('open');
      overlay.remove(); overlay = null;
    });
  }
});

// ── TOAST ────────────────────────────────────
let toastTimer;
function showToast(msg) {
  const toast = document.getElementById('toast');
  document.getElementById('toastMsg').textContent = msg;
  toast.classList.add('show');
  clearTimeout(toastTimer);
  toastTimer = setTimeout(() => toast.classList.remove('show'), 3000);
}

// ── GLOBAL SEARCH (topbar) ───────────────────
document.getElementById('globalSearch').addEventListener('input', function () {
  document.getElementById('tableSearch').value = this.value;
  applyFilters();
});

// ── INIT ─────────────────────────────────────
renderTable();
</script>
</body>
</html>