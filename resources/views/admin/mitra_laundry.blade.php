<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <title>LaundryHub - Mitra Laundry</title>

  <!-- Pengaturan Font & Assets -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
  <link rel="stylesheet" href="{{ asset('assets/css/admin/mitra_laundry.css') }}">

</head>
<body>
  <div class="app">
    <!-- BAGIAN SIDEBAR (Navigasi Kiri) -->
    <aside class="sidebar">
      <!-- Identitas Brand -->
      <div class="brand">
        <div class="brand-icon">⌂</div>
        <div>
          <div class="brand-title">LaundryHub</div>
          <div class="brand-subtitle">Admin Panel</div>
        </div>
      </div>

      <!-- Menu Navigasi -->
      <nav class="menu">
        <a class="menu-item" href="#"><span>⌂</span>Dashboard</a>

        <div class="menu-group">MANAJEMEN</div>
        <a class="menu-item" href="#"><span>👤</span>User / Customer</a>
        <a class="menu-item active" href="#"><span>🏪</span>Mitra Laundry</a>
        <a class="menu-item" href="#"><span>☑</span>Verifikasi Mitra <em class="badge red">8</em></a>
        <a class="menu-item" href="#"><span>▣</span>Pesanan (via Mitra) <span class="chev">›</span></a>
        <a class="menu-item" href="#"><span>💳</span>Pembayaran</a>

        <div class="menu-group">MODERASI</div>
        <a class="menu-item" href="#"><span>☆</span>Review & Rating</a>
        <a class="menu-item" href="#"><span>☍</span>Komplain / Laporan <em class="badge red">2</em></a>

        <div class="menu-group">LAPORAN & ANALITIK</div>
        <a class="menu-item" href="#"><span>▤</span>Statistik & Laporan</a>
        <a class="menu-item" href="#"><span>◔</span>Aktivitas</a>

        <div class="menu-group">PENGATURAN</div>
        <a class="menu-item" href="#"><span>⚙</span>Pengaturan Platform</a>
        <a class="menu-item" href="#"><span>👥</span>Admin & Role</a>
        <a class="menu-item" href="#"><span>🔔</span>Notifikasi</a>
      </nav>

      <!-- Kartu Bantuan -->
      <div class="help-card">
        <div class="help-title">Butuh bantuan?</div>
        <div class="help-text">Kunjungi Pusat Bantuan</div>
        <button>Pusat Bantuan</button>
      </div>
    </aside>

    <!-- BAGIAN KONTEN UTAMA (Kanan) -->
    <main class="main">
      <!-- Topbar / Header Atas -->
      <header class="topbar">
        <div class="page-title-wrap">
          <div class="hamburger">☰</div>
          <div>
            <h1>Mitra Laundry</h1>
            <p>Kelola semua mitra laundry yang terdaftar di platform.</p>
          </div>
        </div>

        <div class="topbar-actions">
          <div class="search">
            <input type="text" placeholder="Cari mitra laundry..." />
            <span>⌕</span>
          </div>

          <div class="notification">
            <span>🔔</span>
            <em>3</em>
          </div>

          <!-- Profil User Admin -->
          <div class="profile">
            <div class="avatar"></div>
            <div class="profile-text">
              <strong>Super Admin</strong>
              <span>Administrator</span>
            </div>
            <div class="chev">⌄</div>
          </div>
        </div>
      </header>

      <!-- Area Konten Utama -->
      <section class="content">
        <!-- Panel Tengah: Statistik & Tabel -->
        <div class="center-panel">
          
          <!-- Kartu Statistik (Summary) -->
          <div class="stats">
            <div class="stat-card">
              <div class="stat-icon blue">🏪</div>
              <div>
                <div class="stat-label">Total Mitra</div>
                <div class="stat-value">248</div>
                <div class="stat-sub">Semua mitra terdaftar</div>
              </div>
            </div>
            <div class="stat-card">
              <div class="stat-icon green">🛡</div>
              <div>
                <div class="stat-label">Terverifikasi</div>
                <div class="stat-value">236</div>
                <div class="stat-sub">95,2% dari total mitra</div>
              </div>
            </div>
            <div class="stat-card">
              <div class="stat-icon orange">⏲</div>
              <div>
                <div class="stat-label">Menunggu Verifikasi</div>
                <div class="stat-value">12</div>
                <div class="stat-sub">Perlu review admin</div>
              </div>
            </div>
            <div class="stat-card">
              <div class="stat-icon red">✕</div>
              <div>
                <div class="stat-label">Ditolak</div>
                <div class="stat-value">8</div>
                <div class="stat-sub">Mitra ditolak verifi</div>
              </div>
            </div>
          </div>

          <!-- Tab Navigasi Status -->
          <div class="tabs">
            <a class="tab active" href="#">Semua</a>
            <a class="tab" href="#">Terverifikasi</a>
            <a class="tab" href="#">Menunggu Verifikasi</a>
            <a class="tab" href="#">Ditolak</a>
            <a class="tab" href="#">Suspended</a>
          </div>

          <!-- Toolbar (Filter & Search) -->
          <div class="toolbar">
            <div class="search small">
              <input type="text" placeholder="Cari mitra laundry..." />
              <span>⌕</span>
            </div>

            <select>
              <option>Status</option>
            </select>
            <select>
              <option>Kota</option>
            </select>
            <select>
              <option>Urutkan</option>
            </select>
            <button class="filter-btn">⏷ Filter</button>
          </div>

          <!-- Tabel Data Mitra -->
          <div class="table-wrap">
            <table>
              <thead>
                <tr>
                  <th class="check"><input type="checkbox"></th>
                  <th>Mitra Laundry</th>
                  <th>Pemilik</th>
                  <th>Kota</th>
                  <th>Rating</th>
                  <th>Status</th>
                  <th>Bergabung</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <!-- Data Row 1 (Contoh Terpilih/Selected) -->
                <tr class="selected">
                  <td class="check"><input type="checkbox" checked></td>
                  <td>
                    <div class="partner">
                      <div class="logo">🧺</div>
                      <div>
                        <strong>Laundry Bersih Sejahtera</strong>
                        <span>#MITRA-0001</span>
                      </div>
                    </div>
                  </td>
                  <td>Andi Pratama<br><small>0812-3456-7890</small></td>
                  <td>Jakarta Selatan</td>
                  <td class="rating">★ 4.8 <span>(128)</span></td>
                  <td><span class="pill green">Terverifikasi</span></td>
                  <td>6 Mei 2024</td>
                  <td><button class="icon-btn">◉</button><button class="icon-btn">⋮</button></td>
                </tr>

                <!-- Data Row 2 -->
                <tr>
                  <td class="check"><input type="checkbox"></td>
                  <td>
                    <div class="partner">
                      <div class="logo blue">◎</div>
                      <div>
                        <strong>Quick Wash Laundry</strong>
                        <span>#MITRA-0002</span>
                      </div>
                    </div>
                  </td>
                  <td>Budi Santoso<br><small>0813-2345-6789</small></td>
                  <td>Bandung</td>
                  <td class="rating">★ 4.6 <span>(98)</span></td>
                  <td><span class="pill green">Terverifikasi</span></td>
                  <td>6 Mei 2024</td>
                  <td><button class="icon-btn">◉</button><button class="icon-btn">⋮</button></td>
                </tr>

                <!-- Data Row 3 -->
                <tr>
                  <td class="check"><input type="checkbox"></td>
                  <td>
                    <div class="partner">
                      <div class="logo sky">☁</div>
                      <div>
                        <strong>Fresh & Clean Laundry</strong>
                        <span>#MITRA-0003</span>
                      </div>
                    </div>
                  </td>
                  <td>Siti Aisyah<br><small>0821-9876-5432</small></td>
                  <td>Surabaya</td>
                  <td class="rating">★ 4.7 <span>(76)</span></td>
                  <td><span class="pill yellow">Menunggu</span></td>
                  <td>5 Mei 2024</td>
                  <td><button class="icon-btn">◉</button><button class="icon-btn">⋮</button></td>
                </tr>

                <!-- Data Row 4 -->
                <tr>
                  <td class="check"><input type="checkbox"></td>
                  <td>
                    <div class="partner">
                      <div class="logo navy">▣</div>
                      <div>
                        <strong>LaundryKita</strong>
                        <span>#MITRA-0004</span>
                      </div>
                    </div>
                  </td>
                  <td>Dewi Lestari<br><small>0822-1122-3344</small></td>
                  <td>Depok</td>
                  <td class="rating">★ 4.5 <span>(64)</span></td>
                  <td><span class="pill green">Terverifikasi</span></td>
                  <td>5 Mei 2024</td>
                  <td><button class="icon-btn">◉</button><button class="icon-btn">⋮</button></td>
                </tr>

                <!-- Data Row 5 -->
                <tr>
                  <td class="check"><input type="checkbox"></td>
                  <td>
                    <div class="partner">
                      <div class="logo red">✦</div>
                      <div>
                        <strong>CleanPro Laundry</strong>
                        <span>#MITRA-0005</span>
                      </div>
                    </div>
                  </td>
                  <td>Fahmi Hidayat<br><small>0838-7766-5544</small></td>
                  <td>Bekasi</td>
                  <td class="rating">★ 4.3 <span>(52)</span></td>
                  <td><span class="pill pink">Suspended</span></td>
                  <td>4 Mei 2024</td>
                  <td><button class="icon-btn">◉</button><button class="icon-btn">⋮</button></td>
                </tr>

                <!-- Data Row 6 -->
                <tr>
                  <td class="check"><input type="checkbox"></td>
                  <td>
                    <div class="partner">
                      <div class="logo sky">⬤</div>
                      <div>
                        <strong>Rapi & Wangi Laundry</strong>
                        <span>#MITRA-0006</span>
                      </div>
                    </div>
                  </td>
                  <td>Rina Marlina<br><small>0856-9988-7766</small></td>
                  <td>Yogyakarta</td>
                  <td class="rating">★ 4.4 <span>(41)</span></td>
                  <td><span class="pill green">Terverifikasi</span></td>
                  <td>3 Mei 2024</td>
                  <td><button class="icon-btn">◉</button><button class="icon-btn">⋮</button></td>
                </tr>

                <!-- Data Row 7 -->
                <tr>
                  <td class="check"><input type="checkbox"></td>
                  <td>
                    <div class="partner">
                      <div class="logo orange">⦿</div>
                      <div>
                        <strong>Super Laundry Express</strong>
                        <span>#MITRA-0007</span>
                      </div>
                    </div>
                  </td>
                  <td>Dimas Saputra<br><small>0811-2233-4455</small></td>
                  <td>Tangerang</td>
                  <td class="rating">★ 4.2 <span>(33)</span></td>
                  <td><span class="pill red">Ditolak</span></td>
                  <td>2 Mei 2024</td>
                  <td><button class="icon-btn">◉</button><button class="icon-btn">⋮</button></td>
                </tr>

                <!-- Data Row 8 -->
                <tr>
                  <td class="check"><input type="checkbox"></td>
                  <td>
                    <div class="partner">
                      <div class="logo blue">◈</div>
                      <div>
                        <strong>Laundry Baik Hati</strong>
                        <span>#MITRA-0008</span>
                      </div>
                    </div>
                  </td>
                  <td>Hendra Wijaya<br><small>0812-6677-8899</small></td>
                  <td>Malang</td>
                  <td class="rating">★ 4.9 <span>(87)</span></td>
                  <td><span class="pill yellow">Menunggu</span></td>
                  <td>1 Mei 2024</td>
                  <td><button class="icon-btn">◉</button><button class="icon-btn">⋮</button></td>
                </tr>
              </tbody>
            </table>
          </div>

          <!-- Footer Tabel (Pagination) -->
          <div class="table-footer">
            <div>Menampilkan 1 - 8 dari 248 data</div>
            <div class="page-size">10 / halaman</div>
            <div class="pagination">
              <button>‹</button>
              <a class="active" href="#">1</a>
              <a href="#">2</a>
              <a href="#">3</a>
              <a href="#">4</a>
              <a href="#">5</a>
              <span>…</span>
              <a href="#">25</a>
              <button>›</button>
            </div>
          </div>
        </div>

        <!-- PANEL DETAIL (Sisi Kanan) -->
        <aside class="detail-panel">
          <div class="detail-head">
            <h2>Detail Mitra Laundry</h2>
            <span>×</span>
          </div>

          <!-- Header Detail (Foto & Identitas) -->
          <div class="detail-hero">
            <div class="hero-img"></div>
            <div class="hero-info">
              <span class="pill green">Terverifikasi</span>
              <h3>Laundry Bersih Sejahtera</h3>
              <div class="meta">#MITRA-0001</div>
              <div class="meta rating">★ 4.8 <span>(128 ulasan)</span></div>
              <div class="meta">Bergabung: 6 Mei 2024</div>
            </div>
          </div>

          <!-- Tab Informasi Detail -->
          <div class="detail-tabs">
            <a class="active" href="#">Informasi</a>
            <a href="#">Layanan</a>
            <a href="#">Performa</a>
            <a href="#">Dokumen</a>
            <a href="#">Pesanan</a>
          </div>

          <!-- Konten Seksi Informasi Toko -->
          <div class="detail-section">
            <h4>Informasi Toko</h4>
            <div class="info-grid">
              <div>Pemilik</div><div>Andi Pratama</div>
              <div>No. WhatsApp</div><div>0812-3456-7890</div>
              <div>Email</div><div>andipratama@email.com</div>
              <div>Alamat Toko</div><div>Jl. Melati No.12, Cipete<br>Jakarta Selatan</div>
              <div>Kota</div><div>Jakarta Selatan</div>
              <div>Jam Operasional</div><div>07:00 - 21:00</div>
              <div>Layanan Antar Jemput</div><div><span class="pill green soft">Aktif</span></div>
              <div>Radius Layanan</div><div>5 km</div>
              <div>Metode Pembayaran</div>
              <div class="pay-methods"><span>QRIS</span><span>Cash</span><span>Transfer</span></div>
            </div>
          </div>

          <!-- Konten Seksi Performa -->
          <div class="detail-section">
            <div class="section-head">
              <h4>Ringkasan Performa</h4>
              <select>
                <option>7 Hari Terakhir</option>
              </select>
            </div>

            <div class="perf-item"><span>📊 Tingkat Penyelesaian Pesanan</span><b class="green-text">● 98%</b></div>
            <div class="perf-item"><span>💬 Waktu Respon Chat</span><b>18 menit</b></div>
            <div class="perf-item"><span>📦 Pesanan Selesai</span><b class="green-text">45  +12%</b></div>
            <div class="perf-item"><span>✕ Pesanan Dibatalkan</span><b class="red-text">2  +5%</b></div>
          </div>

          <!-- Tombol Aksi Bawah -->
          <div class="detail-actions">
            <button class="primary">▣ Lihat Pesanan Mitra</button>
            <button class="secondary">⋯</button>
          </div>

          <button class="danger-btn">⏻ Suspend Mitra</button>
        </aside>
      </section>
    </main>
  </div>
</body>
</html>