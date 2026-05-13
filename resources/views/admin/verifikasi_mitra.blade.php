<!DOCTYPE html>
<html lang="id">
<head>
  <!-- Meta Tags & Basic Setup -->
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>LaundryHub - Verifikasi Mitra</title>

  <!-- External Fonts & Icons -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <link rel="stylesheet" href="{{ asset('assets/css/admin/verifikasi_mitra.css') }}">
</head>

<body>
  <!-- Main Application Container -->
  <div class="app">
    
    <!-- Sidebar Navigation -->
    <aside class="sidebar">
      <!-- Brand Header -->
      <div class="brand">
        <div class="brand-logo">
          <i class="fa-solid fa-bag-shopping"></i>
        </div>
        <div class="brand-text">
          <div class="brand-name">LaundryHub</div>
          <div class="brand-sub">Admin Panel</div>
        </div>
      </div>

      <!-- Main Navigation Menu -->
      <nav class="menu">
        <!-- Dashboard Section -->
        <a href="#" class="menu-item"><i class="fa-solid fa-house"></i><span>Dashboard</span></a>

        <!-- Manajemen Section -->
        <div class="menu-section">Manajemen</div>
        <a href="#" class="menu-item"><i class="fa-solid fa-users"></i><span>User / Customer</span></a>
        <a href="#" class="menu-item"><i class="fa-solid fa-store"></i><span>Mitra Laundry</span></a>
        <a href="#" class="menu-item active"><i class="fa-solid fa-circle-check"></i><span>Verifikasi Mitra</span><span class="badge">8</span></a>
        <a href="#" class="menu-item"><i class="fa-solid fa-cart-shopping"></i><span>Pesanan (via Mitra)</span></a>
        <a href="#" class="menu-item"><i class="fa-solid fa-credit-card"></i><span>Pembayaran</span></a>

        <!-- Moderasi Section -->
        <div class="menu-section">Moderasi</div>
        <a href="#" class="menu-item"><i class="fa-regular fa-star"></i><span>Review & Rating</span></a>
        <a href="#" class="menu-item"><i class="fa-regular fa-flag"></i><span>Komplain / Laporan</span><span class="badge red">2</span></a>

        <!-- Laporan & Analitik Section -->
        <div class="menu-section">Laporan & Analitik</div>
        <a href="#" class="menu-item"><i class="fa-solid fa-chart-column"></i><span>Statistik & Laporan</span></a>
        <a href="#" class="menu-item"><i class="fa-solid fa-chart-line"></i><span>Aktivitas</span></a>

        <!-- Pengaturan Section -->
        <div class="menu-section">Pengaturan</div>
        <a href="#" class="menu-item"><i class="fa-solid fa-gear"></i><span>Pengaturan Platform</span></a>
        <a href="#" class="menu-item"><i class="fa-solid fa-user-gear"></i><span>Admin & Role</span></a>
        <a href="#" class="menu-item"><i class="fa-regular fa-bell"></i><span>Notifikasi</span></a>
      </nav>

      <!-- Help/Support Card -->
      <div class="help-card">
        <div>
          <div class="help-title">Butuh bantuan?</div>
          <div class="help-sub">Kunjungi Pusat Bantuan</div>
        </div>
        <button>Pusat Bantuan</button>
      </div>
    </aside>

    <!-- Main Content Area -->
    <main class="main">
      
      <!-- Top Navigation Bar -->
      <header class="topbar">
        <div class="top-left">
          <button class="icon-btn"><i class="fa-solid fa-bars"></i></button>
        </div>
        <div class="top-right">
          <!-- Notification Bell -->
          <button class="icon-bell">
            <i class="fa-regular fa-bell"></i>
            <span class="notif">3</span>
          </button>
          <!-- User Profile -->
          <div class="profile">
            <img src="https://i.pravatar.cc/100?img=12" alt="Admin" />
            <div class="profile-text">
              <div class="profile-name">Super Admin</div>
              <div class="profile-role">Administrator</div>
            </div>
            <i class="fa-solid fa-chevron-down chevron"></i>
          </div>
        </div>
      </header>

      <!-- Page Header -->
      <div class="page-head">
        <div>
          <h1>Verifikasi Mitra</h1>
          <p>Verifikasi dan kelola pendaftaran mitra laundry baru.</p>
        </div>
        <div class="date-pill">
          <i class="fa-regular fa-calendar"></i>
          <span>1 Mei 2024 - 7 Mei 2024</span>
          <i class="fa-solid fa-chevron-down"></i>
        </div>
      </div>

      <!-- Statistics Cards Section -->
      <section class="stats">
        <!-- Total Registrations Card -->
        <div class="stat-card violet">
          <div class="stat-icon"><i class="fa-solid fa-users"></i></div>
          <div class="stat-content">
            <div class="stat-title">Total Pendaftaran</div>
            <div class="stat-value">48</div>
            <div class="stat-foot"><span class="up">↑ 12,5%</span> Dibanding minggu lalu</div>
          </div>
        </div>

        <!-- Pending Verification Card -->
        <div class="stat-card orange">
          <div class="stat-icon"><i class="fa-solid fa-hourglass-half"></i></div>
          <div class="stat-content">
            <div class="stat-title">Menunggu Verifikasi</div>
            <div class="stat-value">35</div>
            <div class="stat-foot"><span class="up">↑ 10,8%</span> Dibanding minggu lalu</div>
          </div>
        </div>

        <!-- Approved Card -->
        <div class="stat-card green">
          <div class="stat-icon"><i class="fa-solid fa-circle-check"></i></div>
          <div class="stat-content">
            <div class="stat-title">Disetujui</div>
            <div class="stat-value">12</div>
            <div class="stat-foot"><span class="up">↑ 8,3%</span> Dibanding minggu lalu</div>
          </div>
        </div>

        <!-- Rejected Card -->
        <div class="stat-card red">
          <div class="stat-icon"><i class="fa-solid fa-circle-xmark"></i></div>
          <div class="stat-content">
            <div class="stat-title">Ditolak</div>
            <div class="stat-value">1</div>
            <div class="stat-foot"><span class="down">↓ 4,2%</span> Dibanding minggu lalu</div>
          </div>
        </div>
      </section>

      <!-- Main Content Grid - Dual Panel Layout -->
      <section class="content-grid">
        
        <!-- Left Panel: Pending List -->
        <div class="panel list-panel">
          <!-- Panel Header with Search & Filters -->
          <div class="panel-head">
            <h2>Daftar Menunggu Verifikasi</h2>
            <div class="search-row">
              <div class="search-box">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" placeholder="Cari nama laundry..." />
              </div>
              <div class="filter-box">Semua Kota <i class="fa-solid fa-chevron-down"></i></div>
              <div class="filter-icon"><i class="fa-solid fa-filter"></i></div>
            </div>
          </div>

          <!-- Pending Items List -->
          <div class="pending-list">
            <!-- Sample Pending Items -->
            <div class="pending-item active">
              <img src="https://i.pravatar.cc/80?img=1" alt="" />
              <div class="pending-text">
                <div class="pending-name">Laundry Bersih Sejahtera</div>
                <div class="pending-city">Jakarta Selatan</div>
                <div class="pending-date">Didaftarkan: 6 Mei 2024, 10:23</div>
              </div>
              <span class="pill orange">Menunggu</span>
            </div>

            <div class="pending-item">
              <img src="https://i.pravatar.cc/80?img=2" alt="" />
              <div class="pending-text">
                <div class="pending-name">Quick Wash Laundry</div>
                <div class="pending-city">Bandung</div>
                <div class="pending-date">Didaftarkan: 6 Mei 2024, 09:15</div>
              </div>
              <span class="pill orange">Menunggu</span>
            </div>

            <div class="pending-item">
              <img src="https://i.pravatar.cc/80?img=3" alt="" />
              <div class="pending-text">
                <div class="pending-name">Fresh & Clean Laundry</div>
                <div class="pending-city">Surabaya</div>
                <div class="pending-date">Didaftarkan: 5 Mei 2024, 16:40</div>
              </div>
              <span class="pill orange">Menunggu</span>
            </div>

            <div class="pending-item">
              <img src="https://i.pravatar.cc/80?img=4" alt="" />
              <div class="pending-text">
                <div class="pending-name">Rapi & Wangi Laundry</div>
                <div class="pending-city">Bekasi</div>
                <div class="pending-date">Didaftarkan: 5 Mei 2024, 13:20</div>
              </div>
              <span class="pill orange">Menunggu</span>
            </div>

            <div class="pending-item">
              <img src="https://i.pravatar.cc/80?img=5" alt="" />
              <div class="pending-text">
                <div class="pending-name">Laundry Express</div>
                <div class="pending-city">Tangerang</div>
                <div class="pending-date">Didaftarkan: 4 Mei 2024, 11:05</div>
              </div>
              <span class="pill orange">Menunggu</span>
            </div>

            <div class="pending-item">
              <img src="https://i.pravatar.cc/80?img=6" alt="" />
              <div class="pending-text">
                <div class="pending-name">Ceria Laundry</div>
                <div class="pending-city">Bogor</div>
                <div class="pending-date">Didaftarkan: 4 Mei 2024, 09:47</div>
              </div>
              <span class="pill orange">Menunggu</span>
            </div>
          </div>

          <!-- Pagination Controls -->
          <div class="pagination-wrap">
            <div class="pagination-info">Menampilkan 1 - 6 dari 35 data</div>
            <div class="pagination">
              <button><i class="fa-solid fa-chevron-left"></i></button>
              <button class="active">1</button>
              <button>2</button>
              <button>3</button>
              <button>4</button>
              <button>5</button>
              <button><i class="fa-solid fa-chevron-right"></i></button>
            </div>
          </div>
        </div>

        <!-- Right Panel: Partner Details -->
        <div class="panel detail-panel">
          <!-- Detail Panel Header with Action Buttons -->
          <div class="panel-head detail-head">
            <h2>Detail Pendaftaran Mitra</h2>
            <div class="action-group">
              <button class="btn secondary"><i class="fa-solid fa-xmark"></i> Tolak Pendaftaran</button>
              <button class="btn primary"><i class="fa-solid fa-check"></i> Setujui Pendaftaran</button>
            </div>
          </div>

          <!-- Partner Profile Card -->
          <div class="partner-card">
            <div class="partner-avatar">
              <img src="https://i.pravatar.cc/160?img=1" alt="" />
            </div>
            <div class="partner-info">
              <h3>Laundry Bersih Sejahtera</h3>
              <div class="meta-line">
                <span><i class="fa-solid fa-location-dot"></i> Jakarta Selatan</span>
                <span><i class="fa-regular fa-calendar"></i> Didaftarkan: 6 Mei 2024, 10:23</span>
              </div>
              <div class="tags">
                <span class="tag yellow">Menunggu Verifikasi</span>
                <span class="tag green">Antar Jemput: Aktif</span>
              </div>
            </div>
          </div>

          <!-- Information Grid - Laundry Info & Documents -->
          <div class="info-grid">
            <!-- Laundry Information -->
            <div class="info-box">
              <h4>Informasi Laundry</h4>
              <div class="info-list">
                <div class="info-row"><i class="fa-regular fa-user"></i><span>Nama Pemilik</span><b>Budi Santoso</b></div>
                <div class="info-row"><i class="fa-regular fa-envelope"></i><span>Email</span><b>bersihjsejahtera@gmail.com</b></div>
                <div class="info-row"><i class="fa-solid fa-phone"></i><span>No. Telepon</span><b>0812-3456-7890</b></div>
                <div class="info-row"><i class="fa-solid fa-location-dot"></i><span>Alamat</span><b>Jl. Kemang Raya No. 12, Bangka, Mampang Prapatan, Jakarta Selatan</b></div>
                <div class="info-row"><i class="fa-regular fa-clock"></i><span>Jam Operasional</span><b>08:00 - 21:00</b></div>
                <div class="info-row"><i class="fa-solid fa-route"></i><span>Radius Antar Jemput</span><b>5 km</b></div>
                <div class="info-row"><i class="fa-solid fa-weight-scale"></i><span>Minimum Berat</span><b>3 Kg</b></div>
                <div class="info-row"><i class="fa-solid fa-credit-card"></i><span>Metode Pembayaran</span><b>QRIS, Transfer Bank, Tunai</b></div>
              </div>
            </div>

            <!-- Supporting Documents -->
            <div class="info-box">
              <h4>Dokumen Pendukung</h4>
              <div class="doc-list">
                <div class="doc-row">
                  <div class="doc-left">
                    <div class="doc-ico blue"><i class="fa-solid fa-file-lines"></i></div>
                    <div>
                      <div class="doc-title">KTP Pemilik</div>
                      <div class="doc-sub">Budi Santoso.ktp.jpg</div>
                    </div>
                  </div>
                  <span class="doc-status">Valid</span>
                  <button class="eye-btn"><i class="fa-regular fa-eye"></i></button>
                </div>

                <div class="doc-row">
                  <div class="doc-left">
                    <div class="doc-ico gray"><i class="fa-solid fa-file-pdf"></i></div>
                    <div>
                      <div class="doc-title">NIB / Izin Usaha</div>
                      <div class="doc-sub">NIB-1234567890.pdf</div>
                    </div>
                  </div>
                  <span class="doc-status">Valid</span>
                  <button class="eye-btn"><i class="fa-regular fa-eye"></i></button>
                </div>

                <div class="doc-row">
                  <div class="doc-left">
                    <div class="doc-ico green"><i class="fa-regular fa-image"></i></div>
                    <div>
                      <div class="doc-title">Foto Tempat Usaha</div>
                      <div class="doc-sub">tempat-usaha.jpg</div>
                    </div>
                  </div>
                  <span class="doc-status">Valid</span>
                  <button class="eye-btn"><i class="fa-regular fa-eye"></i></button>
                </div>

                <div class="doc-row">
                  <div class="doc-left">
                    <div class="doc-ico mint"><i class="fa-solid fa-file-lines"></i></div>
                    <div>
                      <div class="doc-title">NPWP</div>
                      <div class="doc-sub">npwp-budi-santoso.pdf</div>
                    </div>
                  </div>
                  <span class="doc-status">Valid</span>
                  <button class="eye-btn"><i class="fa-regular fa-eye"></i></button>
                </div>
              </div>
            </div>
          </div>

          <!-- Laundry Photos Gallery -->
          <div class="photo-box">
            <h4>Foto Tempat Laundry</h4>
            <div class="photo-list">
              <img src="https://images.unsplash.com/photo-1527515637462-cff94eecc1ac?auto=format&fit=crop&w=400&q=80" alt="" />
              <img src="https://images.unsplash.com/photo-1581578731548-c64695cc6952?auto=format&fit=crop&w=400&q=80" alt="" />
              <img src="https://images.unsplash.com/photo-1517677208171-0bc6725a3e60?auto=format&fit=crop&w=400&q=80" alt="" />
              <img src="https://images.unsplash.com/photo-1522708323590-d24dbb6b0267?auto=format&fit=crop&w=400&q=80" alt="" />
              <div class="photo-more">
                <i class="fa-solid fa-plus"></i>
                <span>Lihat Semua</span>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
  </div>
</body>
</html>