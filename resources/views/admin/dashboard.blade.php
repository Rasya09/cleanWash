<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>LaundryHub - Admin Panel</title>
  <link rel="preconnect" href="https://fonts.googleapis.com"/>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="{{ asset('assets/css/admin/dashboard.css') }}">

</head>
<body>

<div class="app-wrapper">

  <!-- ====== SIDEBAR ====== -->
  <aside class="sidebar">
    <!-- Logo -->
    <div class="sidebar-logo">
      <div class="sidebar-logo-icon">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
        </svg>
      </div>
      <div class="sidebar-logo-text">
        <h1>LaundryHub</h1>
        <span>Admin Panel</span>
      </div>
    </div>

    <!-- Nav -->
    <nav class="sidebar-nav">

      <!-- Dashboard -->
      <a class="nav-item active" href="#">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
        </svg>
        Dashboard
      </a>

      <!-- Manajemen -->
      <div class="nav-section-label">Manajemen</div>

      <a class="nav-item" href="#">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
        </svg>
        User / Customer
      </a>

      <a class="nav-item" href="#">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
        </svg>
        Mitra Laundry
      </a>

      <a class="nav-item" href="#">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
        </svg>
        Verifikasi Mitra
        <span class="nav-badge">8</span>
      </a>

      <a class="nav-item" href="#">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
        </svg>
        Pesanan (via Mitra)
        <span class="nav-arrow">›</span>
      </a>

      <a class="nav-item" href="#">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
        </svg>
        Pembayaran
      </a>

      <!-- Moderasi -->
      <div class="nav-section-label">Moderasi</div>

      <a class="nav-item" href="#">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
        </svg>
        Review &amp; Rating
      </a>

      <a class="nav-item" href="#">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
        </svg>
        Komplain / Laporan
        <span class="nav-badge">2</span>
      </a>

      <!-- Laporan & Analitik -->
      <div class="nav-section-label">Laporan &amp; Analitik</div>

      <a class="nav-item" href="#">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
        </svg>
        Statistik &amp; Laporan
      </a>

      <a class="nav-item" href="#">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
        </svg>
        Aktivitas
      </a>

      <!-- Pengaturan -->
      <div class="nav-section-label">Pengaturan</div>

      <a class="nav-item" href="#">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
        </svg>
        Pengaturan Platform
      </a>

      <a class="nav-item" href="#">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zM3 5h.01M21 5h.01M3 19h.01M21 19h.01"/>
        </svg>
        Admin &amp; Role
      </a>

      <a class="nav-item" href="#">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
        </svg>
        Notifikasi
      </a>

    </nav>

    <!-- Bottom Help -->
    <div class="sidebar-bottom">
      <div class="sidebar-help-box">
        <p>Butuh bantuan?</p>
        <span>Kunjungi Pusat Bantuan</span>
        <div class="sidebar-help-row">
          <button class="btn-help">Pusat Bantuan</button>
          <div class="help-icon">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z"/>
            </svg>
          </div>
        </div>
      </div>
    </div>

  </aside>

  <!-- ====== HEADER ====== -->
  <header class="header">
    <button class="header-menu-btn">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
      </svg>
    </button>
    <div class="header-title-block">
      <h2>Dashboard</h2>
      <p>Selamat datang kembali, Admin! Berikut ringkasan performa platform Anda.</p>
    </div>
    <div class="header-spacer"></div>

    <!-- Date Range -->
    <button class="header-date-range">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
      </svg>
      1 Mei 2024 – 7 Mei 2024
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
      </svg>
    </button>

    <!-- Notification -->
    <div class="header-notif">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
      </svg>
      <span class="notif-badge">3</span>
    </div>

    <!-- User -->
    <div class="header-user">
      <div class="header-avatar">
        <svg viewBox="0 0 36 36" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:100%;">
          <rect width="36" height="36" fill="#4B5563"/>
          <circle cx="18" cy="14" r="7" fill="#9CA3AF"/>
          <path d="M4 34c0-7.732 6.268-14 14-14s14 6.268 14 14" fill="#6B7280"/>
        </svg>
      </div>
      <div class="header-user-info">
        <div class="user-name">Super Admin</div>
        <div class="user-role">Administrator</div>
      </div>
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
      </svg>
    </div>
  </header>

  <!-- ====== MAIN CONTENT ====== -->
  <main class="main-content">

    <!-- STATS GRID -->
    <div class="stats-grid">

      <!-- Total Customer -->
      <div class="stat-card">
        <div class="stat-icon blue">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
          </svg>
        </div>
        <div class="stat-info">
          <div class="stat-label">Total Customer</div>
          <div class="stat-value">12.458</div>
          <div class="stat-change up">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M3.293 9.707a1 1 0 010-1.414l6-6a1 1 0 011.414 0l6 6a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L4.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
            </svg>
            12,5%
          </div>
          <div class="stat-compare">Dibanding minggu lalu</div>
        </div>
      </div>

      <!-- Total Mitra Laundry -->
      <div class="stat-card">
        <div class="stat-icon green">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" style="color:#16A34A">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
          </svg>
        </div>
        <div class="stat-info">
          <div class="stat-label">Total Mitra Laundry</div>
          <div class="stat-value">248</div>
          <div class="stat-change up">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M3.293 9.707a1 1 0 010-1.414l6-6a1 1 0 011.414 0l6 6a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L4.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
            </svg>
            8,3%
          </div>
          <div class="stat-compare">Dibanding minggu lalu</div>
        </div>
      </div>

      <!-- Mitra Terverifikasi -->
      <div class="stat-card">
        <div class="stat-icon teal">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" style="color:#0D9488">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
          </svg>
        </div>
        <div class="stat-info">
          <div class="stat-label">Mitra Terverifikasi</div>
          <div class="stat-value">236</div>
          <div class="stat-change up">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M3.293 9.707a1 1 0 010-1.414l6-6a1 1 0 011.414 0l6 6a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L4.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
            </svg>
            9,1%
          </div>
          <div class="stat-compare">Dibanding minggu lalu</div>
        </div>
      </div>

      <!-- Total Penghasilan -->
      <div class="stat-card">
        <div class="stat-icon orange">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" style="color:#F97316">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
          </svg>
        </div>
        <div class="stat-info">
          <div class="stat-label">Total Penghasilan Platform</div>
          <div class="stat-value rp">Rp 24.350.000</div>
          <div class="stat-change up">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M3.293 9.707a1 1 0 010-1.414l6-6a1 1 0 011.414 0l6 6a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L4.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
            </svg>
            15,7%
          </div>
          <div class="stat-compare">Dibanding minggu lalu</div>
        </div>
      </div>

    </div>
    <!-- END STATS GRID -->


    <!-- MIDDLE ROW: Line Chart + Verifikasi -->
    <div class="mid-row">

      <!-- Line Chart Card -->
      <div class="card">
        <div class="section-header">
          <div class="section-title">
            Grafik Penghasilan Platform
            <span class="info-icon">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
              </svg>
            </span>
          </div>
          <button class="dropdown-btn">
            7 Hari Terakhir
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
            </svg>
          </button>
        </div>
        <div class="chart-wrapper">
          <svg id="lineChart" class="chart-svg"></svg>
        </div>
      </div>

      <!-- Verifikasi Mitra Card -->
      <div class="card">
        <div class="section-header">
          <div class="section-title">
            Mitra Laundry Perlu Verifikasi
            <span class="section-badge">8</span>
          </div>
          <a class="section-link" href="#">Lihat Semua</a>
        </div>

        <div class="verif-list">

          <div class="verif-item">
            <div class="verif-avatar dark">LB</div>
            <div class="verif-info">
              <div class="verif-name">Laundry Bersih Sejahtera</div>
              <div class="verif-location">Jakarta Selatan</div>
            </div>
            <div class="verif-date-block">
              <span class="verif-date-label">Didaftarkan</span>
              <span class="verif-date-value">6 Mei 2024</span>
            </div>
            <button class="btn-verif">Verifikasi</button>
          </div>

          <div class="verif-item">
            <div class="verif-avatar blue">QW</div>
            <div class="verif-info">
              <div class="verif-name">Quick Wash Laundry</div>
              <div class="verif-location">Bandung</div>
            </div>
            <div class="verif-date-block">
              <span class="verif-date-label">Didaftarkan</span>
              <span class="verif-date-value">6 Mei 2024</span>
            </div>
            <button class="btn-verif">Verifikasi</button>
          </div>

          <div class="verif-item">
            <div class="verif-avatar teal">FC</div>
            <div class="verif-info">
              <div class="verif-name">Fresh &amp; Clean Laundry</div>
              <div class="verif-location">Surabaya</div>
            </div>
            <div class="verif-date-block">
              <span class="verif-date-label">Didaftarkan</span>
              <span class="verif-date-value">5 Mei 2024</span>
            </div>
            <button class="btn-verif">Verifikasi</button>
          </div>

          <div class="verif-item">
            <div class="verif-avatar navy">LK</div>
            <div class="verif-info">
              <div class="verif-name">LaundryKita</div>
              <div class="verif-location">Depok</div>
            </div>
            <div class="verif-date-block">
              <span class="verif-date-label">Didaftarkan</span>
              <span class="verif-date-value">5 Mei 2024</span>
            </div>
            <button class="btn-verif">Verifikasi</button>
          </div>

        </div>

        <div class="verif-see-more">
          <a href="#">Lihat semua mitra perlu verifikasi ›</a>
        </div>
      </div>

    </div>
    <!-- END MIDDLE ROW -->


    <!-- BOTTOM ROW: Aktivitas + Mitra Teraktif + Penghasilan -->
    <div class="bottom-row">

      <!-- Aktivitas Terbaru -->
      <div class="card">
        <div class="section-header">
          <div class="section-title">Aktivitas Terbaru</div>
          <a class="section-link" href="#">Lihat Semua</a>
        </div>
        <div class="activity-list">

          <div class="activity-item">
            <div class="activity-icon green">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
              </svg>
            </div>
            <div class="activity-text">
              <p>Mitra <strong>"Laundry Bersih Sejahtera"</strong> telah diverifikasi</p>
              <span class="activity-time">2 menit yang lalu</span>
            </div>
          </div>

          <div class="activity-item">
            <div class="activity-icon orange">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
              </svg>
            </div>
            <div class="activity-text">
              <p>Pembayaran mitra <strong>"Quick Wash Laundry"</strong> sebesar Rp 2.450.000 berhasil diproses</p>
              <span class="activity-time">15 menit yang lalu</span>
            </div>
          </div>

          <div class="activity-item">
            <div class="activity-icon blue">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
              </svg>
            </div>
            <div class="activity-text">
              <p>User baru <strong>"Budi Santoso"</strong> telah mendaftar</p>
              <span class="activity-time">1 jam yang lalu</span>
            </div>
          </div>

          <div class="activity-item">
            <div class="activity-icon red">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
              </svg>
            </div>
            <div class="activity-text">
              <p>Review dilaporkan pada <strong>"LaundryKita"</strong></p>
              <span class="activity-time">2 jam yang lalu</span>
            </div>
          </div>

        </div>
      </div>

      <!-- Mitra Laundry Teraktif -->
      <div class="card">
        <div class="section-header">
          <div class="section-title">Mitra Laundry Teraktif</div>
          <a class="section-link" href="#">Lihat Semua</a>
        </div>
        <div class="mitra-list">

          <div class="mitra-item">
            <span class="mitra-rank">1</span>
            <div class="mitra-logo d1">LE</div>
            <div class="mitra-info">
              <div class="mitra-name">Laundry Express</div>
              <div class="mitra-orders">156 pesanan (via mitra)</div>
            </div>
            <div class="mitra-right">
              <div class="mitra-rating">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                </svg>
                4.8
              </div>
              <div class="mitra-growth">↑ 18%</div>
            </div>
          </div>

          <div class="mitra-item">
            <span class="mitra-rank">2</span>
            <div class="mitra-logo d2">BR</div>
            <div class="mitra-info">
              <div class="mitra-name">Bersih &amp; Rapi Laundry</div>
              <div class="mitra-orders">142 pesanan (via mitra)</div>
            </div>
            <div class="mitra-right">
              <div class="mitra-rating">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                </svg>
                4.7
              </div>
              <div class="mitra-growth">↑ 12%</div>
            </div>
          </div>

          <div class="mitra-item">
            <span class="mitra-rank">3</span>
            <div class="mitra-logo d3">QW</div>
            <div class="mitra-info">
              <div class="mitra-name">Quick Wash Laundry</div>
              <div class="mitra-orders">128 pesanan (via mitra)</div>
            </div>
            <div class="mitra-right">
              <div class="mitra-rating">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                </svg>
                4.6
              </div>
              <div class="mitra-growth">↑ 10%</div>
            </div>
          </div>

          <div class="mitra-item">
            <span class="mitra-rank">4</span>
            <div class="mitra-logo d4">FL</div>
            <div class="mitra-info">
              <div class="mitra-name">Fresh Laundry</div>
              <div class="mitra-orders">112 pesanan (via mitra)</div>
            </div>
            <div class="mitra-right">
              <div class="mitra-rating">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                </svg>
                4.5
              </div>
              <div class="mitra-growth">↑ 8%</div>
            </div>
          </div>

          <div class="mitra-item">
            <span class="mitra-rank">5</span>
            <div class="mitra-logo d5">LK</div>
            <div class="mitra-info">
              <div class="mitra-name">LaundryKita</div>
              <div class="mitra-orders">98 pesanan (via mitra)</div>
            </div>
            <div class="mitra-right">
              <div class="mitra-rating">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                </svg>
                4.4
              </div>
              <div class="mitra-growth">↑ 6%</div>
            </div>
          </div>

        </div>
      </div>

      <!-- Penghasilan Platform -->
      <div class="card">
        <div class="section-header">
          <div class="section-title">Penghasilan Platform</div>
          <a class="section-link" href="#">Lihat Laporan</a>
        </div>
        <div class="revenue-total-label">Total Penghasilan</div>
        <div class="revenue-value">Rp 24.350.000</div>
        <div class="revenue-change">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M3.293 9.707a1 1 0 010-1.414l6-6a1 1 0 011.414 0l6 6a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L4.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
          </svg>
          15,7%
        </div>
        <div class="revenue-compare">Dibanding 24 – 30 Apr 2024</div>
        <div class="chart-wrapper">
          <svg id="barChart" class="chart-svg"></svg>
        </div>
      </div>

    </div>
    <!-- END BOTTOM ROW -->

  </main>

</div>

<script>
// ===== CHARTS.JS =====

document.addEventListener('DOMContentLoaded', () => {
  drawLineChart();
  drawBarChart();
});

// Line Chart - Grafik Penghasilan Platform
function drawLineChart() {
  const svg = document.getElementById('lineChart');
  if (!svg) return;

  const W = svg.parentElement.offsetWidth || 600;
  const H = 200;
  const padL = 48, padR = 20, padT = 16, padB = 36;

  svg.setAttribute('viewBox', `0 0 ${W} ${H}`);
  svg.setAttribute('width', W);
  svg.setAttribute('height', H);

  const labels = ['1 Mei', '2 Mei', '3 Mei', '4 Mei', '5 Mei', '6 Mei', '7 Mei'];
  const values = [14, 21, 19, 24, 32, 30, 26];
  const maxVal = 40;
  const steps = [0, 10, 20, 30, 40];

  const xStep = (W - padL - padR) / (labels.length - 1);
  const yScale = (H - padT - padB) / maxVal;

  let html = '';

  // Grid lines
  steps.forEach(v => {
    const y = padT + (maxVal - v) * yScale;
    html += `<line class="chart-grid-line" x1="${padL}" y1="${y}" x2="${W - padR}" y2="${y}"/>`;
    html += `<text class="chart-axis-label" x="${padL - 6}" y="${y + 3.5}" text-anchor="end">${v === 0 ? '0' : v + ' jt'}</text>`;
  });

  // Points
  const pts = values.map((v, i) => ({
    x: padL + i * xStep,
    y: padT + (maxVal - v) * yScale
  }));

  // Area path
  let areaPath = `M ${pts[0].x} ${H - padB}`;
  pts.forEach(p => { areaPath += ` L ${p.x} ${p.y}`; });
  areaPath += ` L ${pts[pts.length - 1].x} ${H - padB} Z`;

  // Line path
  let linePath = `M ${pts[0].x} ${pts[0].y}`;
  pts.forEach((p, i) => { if (i > 0) linePath += ` L ${p.x} ${p.y}`; });

  html += `<path class="chart-line-area" d="${areaPath}"/>`;
  html += `<path class="chart-line-path" d="${linePath}"/>`;

  // Points circles
  pts.forEach(p => {
    html += `<circle class="chart-point" cx="${p.x}" cy="${p.y}" r="4"/>`;
  });

  // X axis labels
  labels.forEach((lbl, i) => {
    const x = padL + i * xStep;
    html += `<text class="chart-axis-label" x="${x}" y="${H - 6}" text-anchor="middle">${lbl}</text>`;
  });

  svg.innerHTML = html;
}

// Bar Chart - Penghasilan Platform
function drawBarChart() {
  const svg = document.getElementById('barChart');
  if (!svg) return;

  const W = svg.parentElement.offsetWidth || 280;
  const H = 130;
  const padL = 36, padR = 10, padT = 10, padB = 28;

  svg.setAttribute('viewBox', `0 0 ${W} ${H}`);
  svg.setAttribute('width', W);
  svg.setAttribute('height', H);

  const labels = ['1 Mei', '2 Mei', '3 Mei', '4 Mei', '5 Mei', '6 Mei', '7 Mei'];
  const values = [14, 18, 20, 25, 33, 28, 24];
  const maxVal = 40;
  const steps = [0, 10, 20, 30, 40];

  const chartW = W - padL - padR;
  const chartH = H - padT - padB;
  const barW = (chartW / labels.length) * 0.55;
  const gap = chartW / labels.length;

  let html = '';

  // Grid lines + Y labels
  steps.forEach(v => {
    const y = padT + chartH - (v / maxVal) * chartH;
    html += `<line class="chart-grid-line" x1="${padL}" y1="${y}" x2="${W - padR}" y2="${y}"/>`;
    html += `<text class="chart-axis-label" x="${padL - 4}" y="${y + 3.5}" text-anchor="end">${v === 0 ? '0' : v + ' jt'}</text>`;
  });

  // Bars
  values.forEach((v, i) => {
    const barH = (v / maxVal) * chartH;
    const x = padL + i * gap + (gap - barW) / 2;
    const y = padT + chartH - barH;
    html += `<rect class="bar-rect" x="${x}" y="${y}" width="${barW}" height="${barH}" rx="3"/>`;
    html += `<text class="chart-axis-label" x="${x + barW / 2}" y="${H - 6}" text-anchor="middle">${labels[i].replace(' Mei', '')}</text>`;
  });

  svg.innerHTML = html;
}

// Responsive redraw
window.addEventListener('resize', () => {
  drawLineChart();
  drawBarChart();
});

</script>

</body>
</html>
