<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>LaundryHub - User / Customer</title>

  <!-- CSS Utama -->
  <link rel="stylesheet" href="{{ asset('assets/css/admin/user.css') }}">

  <!-- Google Font: Inter -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>
  <div class="app">

    <!-- OVERLAY untuk menutup sidebar di mobile/tablet -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- ===========================
         BAGIAN SIDEBAR (Navigasi Kiri)
         =========================== -->
    <aside class="sidebar" id="sidebar">

      <!-- Logo & Identitas Aplikasi -->
      <div class="brand">
        <div class="brand-icon">
          <i class="fa-solid fa-square-plus"></i>
        </div>
        <div>
          <div class="brand-title">LaundryHub</div>
          <div class="brand-subtitle">Admin Panel</div>
        </div>
      </div>

      <!-- Navigasi Menu -->
      <nav class="menu">
        <a class="menu-item" href="#"><i class="fa-regular fa-house"></i><span>Dashboard</span></a>

        <div class="menu-group">MANAJEMEN</div>

        <a class="menu-item active" href="#"><i class="fa-regular fa-user"></i><span>User / Customer</span></a>
        <a class="menu-item" href="#"><i class="fa-regular fa-building"></i><span>Mitra Laundry</span></a>
        <a class="menu-item" href="#">
          <i class="fa-regular fa-circle-check"></i>
          <span>Verifikasi Mitra</span>
          <span class="badge red">8</span>
        </a>
        <a class="menu-item" href="#">
          <i class="fa-regular fa-clipboard"></i>
          <span>Pesanan (via Mitra)</span>
          <i class="fa-solid fa-chevron-right chevron"></i>
        </a>
        <a class="menu-item" href="#"><i class="fa-regular fa-credit-card"></i><span>Pembayaran</span></a>

        <div class="menu-group">MODERASI</div>
        <a class="menu-item" href="#"><i class="fa-regular fa-star"></i><span>Review & Rating</span></a>
        <a class="menu-item" href="#">
          <i class="fa-regular fa-circle-exclamation"></i>
          <span>Komplain / Laporan</span>
          <span class="badge red">2</span>
        </a>

        <div class="menu-group">LAPORAN & ANALITIK</div>
        <a class="menu-item" href="#"><i class="fa-solid fa-chart-simple"></i><span>Statistik & Laporan</span></a>
        <a class="menu-item" href="#"><i class="fa-regular fa-clock"></i><span>Aktivitas</span></a>

        <div class="menu-group">PENGATURAN</div>
        <a class="menu-item" href="#"><i class="fa-solid fa-gear"></i><span>Pengaturan Platform</span></a>
        <a class="menu-item" href="#"><i class="fa-regular fa-user"></i><span>Admin & Role</span></a>
        <a class="menu-item" href="#"><i class="fa-regular fa-bell"></i><span>Notifikasi</span></a>
      </nav>

      <!-- Kartu Bantuan / Support -->
      <div class="help-card">
        <div class="help-title">Butuh bantuan?</div>
        <div class="help-text">Kunjungi Pusat Bantuan kami</div>
        <button class="help-btn">Pusat Bantuan</button>
        <div class="help-illustration">🎧</div>
      </div>

    </aside>

    <!-- ===========================
         BAGIAN KONTEN UTAMA (Kanan)
         =========================== -->
    <main class="main">

      <!-- Topbar / Header Atas -->
      <header class="topbar">
        <div class="top-left">
          <!-- Tombol hamburger: toggle sidebar di tablet/mobile -->
          <button class="icon-btn" id="sidebarToggle" aria-label="Toggle Sidebar">
            <i class="fa-solid fa-bars"></i>
          </button>
          <div class="top-left-text">
            <h1>User / Customer</h1>
            <div class="breadcrumb">Dashboard <span>›</span> User / Customer</div>
          </div>
        </div>

        <!-- Notifikasi & Profil Admin -->
        <div class="top-right">
          <button class="notif" aria-label="Notifikasi">
            <i class="fa-regular fa-bell"></i>
            <span class="dot">3</span>
          </button>
          <div class="profile">
            <img src="https://i.pravatar.cc/100?img=12" alt="Admin" />
            <div class="profile-info">
              <div class="profile-name">Super Admin</div>
              <div class="profile-role">Administrator</div>
            </div>
            <i class="fa-solid fa-chevron-down"></i>
          </div>
        </div>
      </header>

      <!-- Area Isi Halaman -->
      <div class="content-area">

        <!-- ===========================
             Barisan Kartu KPI
             =========================== -->
        <div class="cards">

          <div class="card kpi purple">
            <div class="kpi-icon"><i class="fa-solid fa-user"></i></div>
            <div class="kpi-text">
              <div class="kpi-label">Total Customer</div>
              <div class="kpi-value">12.458 <span class="up">↑ 12,5%</span></div>
              <div class="kpi-sub">Dibanding minggu lalu</div>
            </div>
          </div>

          <div class="card kpi green">
            <div class="kpi-icon"><i class="fa-solid fa-user-plus"></i></div>
            <div class="kpi-text">
              <div class="kpi-label">Customer Baru</div>
              <div class="kpi-value">356 <span class="up">↑ 8,4%</span></div>
              <div class="kpi-sub">Dibanding minggu lalu</div>
            </div>
          </div>

          <div class="card kpi orange">
            <div class="kpi-icon"><i class="fa-solid fa-user-check"></i></div>
            <div class="kpi-text">
              <div class="kpi-label">Customer Aktif</div>
              <div class="kpi-value">8.942 <span class="up">↑ 11,2%</span></div>
              <div class="kpi-sub">Dibanding minggu lalu</div>
            </div>
          </div>

          <div class="card kpi red">
            <div class="kpi-icon"><i class="fa-solid fa-user-xmark"></i></div>
            <div class="kpi-text">
              <div class="kpi-label">Customer Diblokir</div>
              <div class="kpi-value">68 <span class="down">↓ 2,1%</span></div>
              <div class="kpi-sub">Dibanding minggu lalu</div>
            </div>
          </div>

        </div>

        <!-- ===========================
             Tabel Data Customer
             =========================== -->
        <div class="card table-card">

          <!-- Header Tabel -->
          <div class="table-head">
            <div class="table-head-left">
              <h2>Daftar Customer</h2>
              <div class="tabs">
                <a class="tab active" href="#">Semua</a>
                <a class="tab" href="#">Aktif</a>
                <a class="tab" href="#">Diblokir</a>
              </div>
            </div>

            <div class="actions">
              <div class="search">
                <input type="text" placeholder="Cari nama, email atau no. hp..." />
                <i class="fa-solid fa-magnifying-glass"></i>
              </div>
              <button class="filter-btn"><i class="fa-solid fa-filter"></i> Filter</button>
              <button class="add-btn">
                <i class="fa-solid fa-plus"></i>
                <span>Tambah Customer</span>
              </button>
            </div>
          </div>

          <!-- Wrapper scroll horizontal untuk tabel -->
          <div class="table-wrapper">
            <table class="data-table">
              <thead>
                <tr>
                  <th class="checkbox-col"><input type="checkbox" /></th>
                  <th>Customer</th>
                  <th>No. HP</th>
                  <th>Email</th>
                  <th>Total Pesanan</th>
                  <th>Bergabung</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>

                <!-- Row 1 -->
                <tr>
                  <td><input type="checkbox" /></td>
                  <td>
                    <div class="customer">
                      <img src="https://i.pravatar.cc/100?img=32" alt="" />
                      <span>Andi Pratama</span>
                      <small>Baru</small>
                    </div>
                  </td>
                  <td>0812-3456-7890</td>
                  <td>andi.pratama@email.com</td>
                  <td>18</td>
                  <td>6 Mei 2024<br><span>10:30 WIB</span></td>
                  <td><span class="status active">Aktif</span></td>
                  <td>
                    <div class="row-actions">
                      <button title="Lihat"><i class="fa-regular fa-eye"></i></button>
                      <button title="Edit"><i class="fa-regular fa-pen-to-square"></i></button>
                      <button title="Lainnya"><i class="fa-solid fa-ellipsis-vertical"></i></button>
                    </div>
                  </td>
                </tr>

                <!-- Row 2 -->
                <tr>
                  <td><input type="checkbox" /></td>
                  <td>
                    <div class="customer">
                      <img src="https://i.pravatar.cc/100?img=13" alt="" />
                      <span>Budi Santoso</span>
                    </div>
                  </td>
                  <td>0813-2345-6789</td>
                  <td>budi.santoso@email.com</td>
                  <td>25</td>
                  <td>5 Mei 2024<br><span>09:45 WIB</span></td>
                  <td><span class="status active">Aktif</span></td>
                  <td>
                    <div class="row-actions">
                      <button title="Lihat"><i class="fa-regular fa-eye"></i></button>
                      <button title="Edit"><i class="fa-regular fa-pen-to-square"></i></button>
                      <button title="Lainnya"><i class="fa-solid fa-ellipsis-vertical"></i></button>
                    </div>
                  </td>
                </tr>

                <!-- Row 3 -->
                <tr>
                  <td><input type="checkbox" /></td>
                  <td>
                    <div class="customer">
                      <img src="https://i.pravatar.cc/100?img=47" alt="" />
                      <span>Citra Lestari</span>
                      <small>Baru</small>
                    </div>
                  </td>
                  <td>0821-9876-5432</td>
                  <td>citra.lestari@email.com</td>
                  <td>3</td>
                  <td>4 Mei 2024<br><span>14:20 WIB</span></td>
                  <td><span class="status active">Aktif</span></td>
                  <td>
                    <div class="row-actions">
                      <button title="Lihat"><i class="fa-regular fa-eye"></i></button>
                      <button title="Edit"><i class="fa-regular fa-pen-to-square"></i></button>
                      <button title="Lainnya"><i class="fa-solid fa-ellipsis-vertical"></i></button>
                    </div>
                  </td>
                </tr>

                <!-- Row 4 -->
                <tr>
                  <td><input type="checkbox" /></td>
                  <td>
                    <div class="customer">
                      <img src="https://i.pravatar.cc/100?img=15" alt="" />
                      <span>Dewi Anggraini</span>
                    </div>
                  </td>
                  <td>0822-1122-3344</td>
                  <td>dewi.anggraini@email.com</td>
                  <td>12</td>
                  <td>2 Mei 2024<br><span>16:10 WIB</span></td>
                  <td><span class="status active">Aktif</span></td>
                  <td>
                    <div class="row-actions">
                      <button title="Lihat"><i class="fa-regular fa-eye"></i></button>
                      <button title="Edit"><i class="fa-regular fa-pen-to-square"></i></button>
                      <button title="Lainnya"><i class="fa-solid fa-ellipsis-vertical"></i></button>
                    </div>
                  </td>
                </tr>

                <!-- Row 5 -->
                <tr>
                  <td><input type="checkbox" /></td>
                  <td>
                    <div class="customer">
                      <img src="https://i.pravatar.cc/100?img=5" alt="" />
                      <span>Fahmi Hidayat</span>
                    </div>
                  </td>
                  <td>0838-7766-5544</td>
                  <td>fahmi.hidayat@email.com</td>
                  <td>7</td>
                  <td>1 Mei 2024<br><span>11:25 WIB</span></td>
                  <td><span class="status blocked">Diblokir</span></td>
                  <td>
                    <div class="row-actions">
                      <button title="Lihat"><i class="fa-regular fa-eye"></i></button>
                      <button title="Edit"><i class="fa-regular fa-pen-to-square"></i></button>
                      <button title="Lainnya"><i class="fa-solid fa-ellipsis-vertical"></i></button>
                    </div>
                  </td>
                </tr>

                <!-- Row 6 -->
                <tr>
                  <td><input type="checkbox" /></td>
                  <td>
                    <div class="customer">
                      <img src="https://i.pravatar.cc/100?img=44" alt="" />
                      <span>Gita Putri</span>
                    </div>
                  </td>
                  <td>0856-9988-7766</td>
                  <td>gita.putri@email.com</td>
                  <td>9</td>
                  <td>30 Apr 2024<br><span>13:05 WIB</span></td>
                  <td><span class="status active">Aktif</span></td>
                  <td>
                    <div class="row-actions">
                      <button title="Lihat"><i class="fa-regular fa-eye"></i></button>
                      <button title="Edit"><i class="fa-regular fa-pen-to-square"></i></button>
                      <button title="Lainnya"><i class="fa-solid fa-ellipsis-vertical"></i></button>
                    </div>
                  </td>
                </tr>

                <!-- Row 7 -->
                <tr>
                  <td><input type="checkbox" /></td>
                  <td>
                    <div class="customer">
                      <img src="https://i.pravatar.cc/100?img=21" alt="" />
                      <span>Hendra Wijaya</span>
                    </div>
                  </td>
                  <td>0811-2233-4455</td>
                  <td>hendra.wijaya@email.com</td>
                  <td>15</td>
                  <td>29 Apr 2024<br><span>08:50 WIB</span></td>
                  <td><span class="status active">Aktif</span></td>
                  <td>
                    <div class="row-actions">
                      <button title="Lihat"><i class="fa-regular fa-eye"></i></button>
                      <button title="Edit"><i class="fa-regular fa-pen-to-square"></i></button>
                      <button title="Lainnya"><i class="fa-solid fa-ellipsis-vertical"></i></button>
                    </div>
                  </td>
                </tr>

                <!-- Row 8 -->
                <tr>
                  <td><input type="checkbox" /></td>
                  <td>
                    <div class="customer">
                      <img src="https://i.pravatar.cc/100?img=41" alt="" />
                      <span>Ika Nurhaliza</span>
                    </div>
                  </td>
                  <td>0823-6677-8899</td>
                  <td>ika.nurhaliza@email.com</td>
                  <td>6</td>
                  <td>28 Apr 2024<br><span>17:40 WIB</span></td>
                  <td><span class="status blocked">Diblokir</span></td>
                  <td>
                    <div class="row-actions">
                      <button title="Lihat"><i class="fa-regular fa-eye"></i></button>
                      <button title="Edit"><i class="fa-regular fa-pen-to-square"></i></button>
                      <button title="Lainnya"><i class="fa-solid fa-ellipsis-vertical"></i></button>
                    </div>
                  </td>
                </tr>

              </tbody>
            </table>
          </div>
          <!-- /.table-wrapper -->

          <!-- Footer Tabel (Pagination & Info) -->
          <div class="table-footer">
            <div class="footer-left">Menampilkan 1 - 8 dari 12.458 data</div>
            <div class="footer-right">
              <select>
                <option>10 / halaman</option>
                <option>25 / halaman</option>
                <option>50 / halaman</option>
              </select>
              <div class="pager">
                <button class="nav"><i class="fa-solid fa-chevron-left"></i></button>
                <button class="page active">1</button>
                <button class="page">2</button>
                <button class="page">3</button>
                <button class="page">4</button>
                <button class="page">5</button>
                <span>...</span>
                <button class="page">1246</button>
                <button class="nav"><i class="fa-solid fa-chevron-right"></i></button>
              </div>
            </div>
          </div>

        </div>
        <!-- /.table-card -->

      </div>
      <!-- /.content-area -->

    </main>
  </div>

  <!-- ===========================
       JavaScript: Sidebar Toggle
       =========================== -->
  <script>
    const toggle  = document.getElementById('sidebarToggle');
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

    toggle.addEventListener('click', () => {
      sidebar.classList.contains('open') ? closeSidebar() : openSidebar();
    });

    overlay.addEventListener('click', closeSidebar);

    // Tutup sidebar saat resize ke desktop
    window.addEventListener('resize', () => {
      if (window.innerWidth > 1024) closeSidebar();
    });
  </script>

</body>
</html>