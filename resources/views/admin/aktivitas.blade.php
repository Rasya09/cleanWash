<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>LaundryHub - Aktivitas</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('assets/css/admin/aktivitas.css') }}">
</head>
<body>
  <div class="app">
    <aside class="sidebar">
      <div class="brand">
        <div class="brand-icon">🧺</div>
        <div>
          <div class="brand-title">LaundryHub</div>
          <div class="brand-subtitle">Admin Panel</div>
        </div>
      </div>

      <nav class="menu">
        <a href="#" class="menu-item">Dashboard</a>

        <div class="menu-group">MANAJEMEN</div>
        <a href="#" class="menu-item">User / Customer</a>
        <a href="#" class="menu-item">Mitra Laundry</a>
        <a href="#" class="menu-item">Verifikasi Mitra <span class="badge red">8</span></a>
        <a href="#" class="menu-item">Pesanan (via Mitra)</a>
        <a href="#" class="menu-item">Pembayaran</a>
        <a href="#" class="menu-item">Review & Rating</a>
        <a href="#" class="menu-item">Komplain / Laporan <span class="badge red">2</span></a>
        <a href="#" class="menu-item">Statistik & Laporan</a>
        <a href="#" class="menu-item active">Aktivitas</a>

        <div class="menu-group">PENGATURAN</div>
        <a href="#" class="menu-item">Pengaturan Platform</a>
        <a href="#" class="menu-item">Admin & Role</a>
        <a href="#" class="menu-item">Notifikasi</a>
      </nav>

      <div class="help-card">
        <div class="help-title">Butuh bantuan?</div>
        <div class="help-text">Kunjungi Pusat Bantuan</div>
        <button class="btn btn-primary">Pusat Bantuan</button>
      </div>
    </aside>
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <main class="main">
      <header class="topbar">
        <div class="page-title-wrap">
          <button class="icon-btn" id="menuToggle">☰</button>
          <div>
            <h1>Aktivitas</h1>
            <p>Pantau semua aktivitas pengguna di platform.</p>
          </div>
        </div>

        <div class="topbar-right">
          <div class="search-box">
            <input type="text" placeholder="Cari mitra, pesanan, pelanggan..." />
          </div>
          <button class="icon-btn bell">🔔<span class="notif-dot">3</span></button>
          <div class="profile">
            <img src="https://i.pravatar.cc/100?img=12" alt="Profile">
            <div>
              <div class="profile-name">Super Admin</div>
              <div class="profile-role">Administrator</div>
            </div>
          </div>
        </div>
      </header>

      <section class="stats">
        <div class="stat-card blue">
          <div class="stat-icon">👥</div>
          <div>
            <div class="stat-label">Total Aktivitas</div>
            <div class="stat-value">3.852</div>
            <div class="stat-sub">Semua aktivitas</div>
          </div>
        </div>

        <div class="stat-card green">
          <div class="stat-icon">👤</div>
          <div>
            <div class="stat-label">Pengguna Aktif</div>
            <div class="stat-value">28</div>
            <div class="stat-sub">Hari ini</div>
          </div>
        </div>

        <div class="stat-card orange">
          <div class="stat-icon">🕒</div>
          <div>
            <div class="stat-label">Aktivitas Hari Ini</div>
            <div class="stat-value">412</div>
            <div class="stat-sub positive">↑ 12.5% dari kemarin</div>
          </div>
        </div>

        <div class="stat-card purple">
          <div class="stat-icon">📅</div>
          <div>
            <div class="stat-label">Aktivitas Minggu Ini</div>
            <div class="stat-value">2.891</div>
            <div class="stat-sub positive">↑ 8.3% dari minggu lalu</div>
          </div>
        </div>

        <div class="stat-card red">
          <div class="stat-icon">🛡️</div>
          <div>
            <div class="stat-label">Aktivitas Mencurigakan</div>
            <div class="stat-value">7</div>
            <div class="stat-sub">Perlu ditinjau</div>
          </div>
        </div>
      </section>

      <section class="content">
        <div class="left-panel">
          <div class="filters">
            <div class="filter search">
              <input type="text" placeholder="Cari aktivitas, pengguna, atau deskripsi..." />
            </div>
            <select class="filter">
              <option>Semua Pengguna</option>
            </select>
            <select class="filter">
              <option>Semua Modul</option>
            </select>
            <select class="filter">
              <option>Semua Aktivitas</option>
            </select>
            <button class="filter date">📅 1 Mei 2024 - 31 Mei 2024</button>
            <button class="filter button-outline">Filter</button>
          </div>

          <div class="table-wrap">
            <table>
              <thead>
                <tr>
                  <th>Waktu</th>
                  <th>Pengguna</th>
                  <th>Modul</th>
                  <th>Aktivitas</th>
                  <th>Deskripsi</th>
                  <th>IP Address</th>
                  <th>Lokasi</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <tr class="selected">
                  <td>8 Mei 2024<br><span>09:20:15</span></td>
                  <td>
                    <div class="user-cell">
                      <img src="https://i.pravatar.cc/100?img=11" alt="">
                      <div><strong>Andi Pratama</strong><span>Super Admin</span></div>
                    </div>
                  </td>
                  <td><span class="tag blue">Pesanan</span></td>
                  <td><span class="status green"></span>Dibuat</td>
                  <td>Membuat pesanan baru<br><span>Order ID: #ORD-2024-0508-0001</span></td>
                  <td>192.168.1.10</td>
                  <td>Jakarta, Indonesia</td>
                  <td><button class="dots">...</button></td>
                </tr>

                <tr>
                  <td>8 Mei 2024<br><span>08:14:42</span></td>
                  <td>
                    <div class="user-cell">
                      <img src="https://i.pravatar.cc/100?img=32" alt="">
                      <div><strong>Siti Aisyah</strong><span>Admin Operasional</span></div>
                    </div>
                  </td>
                  <td><span class="tag green">Mitra Laundry</span></td>
                  <td><span class="status green"></span>Diperbarui</td>
                  <td>Memperbarui data mitra laundry<br><span>Mitra: Fresh & Clean Laundry</span></td>
                  <td>192.168.1.25</td>
                  <td>Surabaya, Indonesia</td>
                  <td><button class="dots">...</button></td>
                </tr>

                <tr>
                  <td>8 Mei 2024<br><span>09:15:30</span></td>
                  <td>
                    <div class="user-cell">
                      <img src="https://i.pravatar.cc/100?img=15" alt="">
                      <div><strong>Budi Santoso</strong><span>Admin Keuangan</span></div>
                    </div>
                  </td>
                  <td><span class="tag purple">Pembayaran</span></td>
                  <td><span class="status green"></span>Verifikasi</td>
                  <td>Memverifikasi pembayaran<br><span>TRX ID: TRX-2024-0508-0002</span></td>
                  <td>192.168.1.30</td>
                  <td>Bandung, Indonesia</td>
                  <td><button class="dots">...</button></td>
                </tr>

                <tr>
                  <td>8 Mei 2024<br><span>08:57:00</span></td>
                  <td>
                    <div class="user-cell">
                      <img src="https://i.pravatar.cc/100?img=24" alt="">
                      <div><strong>Dewi Lestari</strong><span>Admin Operasional</span></div>
                    </div>
                  </td>
                  <td><span class="tag red">Komplain</span></td>
                  <td><span class="status blue"></span>Diproses</td>
                  <td>Memproses komplain pelanggan<br><span>CMP ID: CMP-2024-0507-0014</span></td>
                  <td>192.168.1.25</td>
                  <td>Surabaya, Indonesia</td>
                  <td><button class="dots">...</button></td>
                </tr>
              </tbody>
            </table>
          </div>

          <div class="pagination">
            <div class="pagination-info">Menampilkan 1 - 10 dari 3.852 data</div>
            <div class="pagination-controls">
              <select>
                <option>10 / halaman</option>
              </select>
              <button>‹</button>
              <button class="active">1</button>
              <button>2</button>
              <button>3</button>
              <button>4</button>
              <button>5</button>
              <span>...</span>
              <button>386</button>
              <button>›</button>
            </div>
          </div>
        </div>

        <aside class="detail-panel">
          <div class="detail-header">
            <h2>Detail Aktivitas</h2>
            <button class="close-btn">×</button>
          </div>

          <div class="detail-status">
            <span class="dot green"></span>
            <div>
              <div class="detail-state">Dibuat</div>
              <div class="detail-desc">Membuat pesanan baru</div>
              <div class="detail-time">8 Mei 2024, 09:20:15</div>
            </div>
          </div>

          <div class="detail-section">
            <h3>Informasi Pengguna</h3>
            <div class="profile-mini">
              <img src="https://i.pravatar.cc/100?img=11" alt="">
              <div>
                <div class="profile-mini-name">Andi Pratama</div>
                <div>Super Admin</div>
                <div>andi.pratama@email.com</div>
              </div>
            </div>
          </div>

          <div class="detail-section">
            <h3>Informasi Aktivitas</h3>
            <div class="kv">
              <div>Modul</div><div>Pesanan</div>
              <div>Tipe Aktivitas</div><div>Dibuat</div>
              <div>Deskripsi</div><div>Membuat pesanan baru</div>
              <div>Order ID</div><div>#ORD-2024-0508-0001</div>
            </div>
          </div>

          <div class="detail-section">
            <h3>Informasi Teknis</h3>
            <div class="kv">
              <div>IP Address</div><div>192.168.1.10</div>
              <div>Lokasi</div><div>Jakarta, Indonesia</div>
              <div>Browser</div><div>Google Chrome</div>
              <div>OS</div><div>Windows 11</div>
              <div>Device</div><div>Desktop</div>
              <div>User Agent</div><div>Mozilla/5.0 ...</div>
            </div>
          </div>

          <div class="detail-section">
            <h3>Data Perubahan</h3>
            <pre>{
  "order_id": "#ORD-2024-0508-0001",
  "customer": "Andi Pratama",
  "service": "Cuci Kiloan",
  "berat": "8.5 kg",
  "total": "85000",
  "status": "Menunggu Pickup"
}</pre>
          </div>

          <button class="btn btn-outline full">Lihat Detail Order</button>
        </aside>
      </section>
    </main>
  </div>

  <script>
    document.addEventListener("DOMContentLoaded", function () {
  const menuToggle = document.getElementById("menuToggle");
  const sidebar = document.querySelector(".sidebar");
  
  // 1. Pastikan overlay tersedia
  let overlay = document.getElementById("sidebarOverlay");
  if (!overlay) {
    overlay = document.createElement("div");
    overlay.id = "sidebarOverlay";
    overlay.className = "sidebar-overlay";
    document.body.appendChild(overlay);
  }

  // 2. Fungsi Toggle Buka/Tutup
  menuToggle.addEventListener("click", function (e) {
    e.stopPropagation();
    sidebar.classList.toggle("active");
    overlay.classList.toggle("active");

    if (sidebar.classList.contains("active")) {
      document.body.style.overflow = "hidden";
    } else {
      document.body.style.overflow = "auto";
    }
  });

  // 3. Klik Overlay untuk Menutup
  overlay.addEventListener("click", function () {
    sidebar.classList.remove("active");
    overlay.classList.remove("active");
    document.body.style.overflow = "auto"; // Normal kembali
  });

  // 4. Klik di dalam sidebar tidak menutup menu
  sidebar.addEventListener("click", function (e) {
    e.stopPropagation();
  });
  
});
  </script>
</body>
</html>