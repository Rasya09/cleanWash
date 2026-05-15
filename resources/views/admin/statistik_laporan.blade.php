<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>LaundryHub - Statistik & Laporan</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('assets/css/admin/statistik_laporan.css') }}">
  <script src="https://cdn.jsdelivr.net/npm/chart.js@4.5.0"></script>
</head>
<body>
  <div class="app">
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <aside class="sidebar" id="sidebar">
      <div class="brand">
        <div class="brand-logo">◎</div>
        <div>
          <div class="brand-name">LaundryHub</div>
          <div class="brand-subtitle">Admin Panel</div>
        </div>
        <button class="close-sidebar" id="closeSidebar">✕</button>
      </div>

      <nav class="menu">
        <a href="#" class="menu-item active">Dashboard</a>

        <div class="menu-section">Manajemen</div>
        <a href="#" class="menu-item">User / Customer</a>
        <a href="#" class="menu-item">Mitra Laundry</a>
        <a href="#" class="menu-item">Verifikasi Mitra <span class="badge">8</span></a>
        <a href="#" class="menu-item">Pesanan (via Mitra)</a>
        <a href="#" class="menu-item">Pembayaran</a>
        <a href="#" class="menu-item">Review & Rating</a>
        <a href="#" class="menu-item">Komplain / Laporan <span class="badge red">2</span></a>

        <div class="menu-section">Laporan & Analitik</div>
        <a href="#" class="menu-item active-sub">Statistik & Laporan</a>
        <a href="#" class="menu-item">Aktivitas</a>

        <div class="menu-section">Pengaturan</div>
        <a href="#" class="menu-item">Pengaturan Platform</a>
        <a href="#" class="menu-item">Admin & Role</a>
        <a href="#" class="menu-item">Notifikasi</a>
      </nav>

      <div class="help-box">
        <div class="help-title">Butuh bantuan?</div>
        <div class="help-text">Kunjungi Pusat Bantuan</div>
        <button>Pusat Bantuan</button>
      </div>
    </aside>

    <main class="main">
      <header class="topbar">
        <div class="page-title-wrap">
          <button class="icon-btn" id="menuToggle">☰</button>
          <div>
            <h1>Statistik & Laporan</h1>
            <p>Pantau performa platform dan buat laporan berdasarkan periode tertentu.</p>
          </div>
        </div>

        <div class="top-actions">
          <div class="search">
            <input type="text" placeholder="Cari mitra, pesanan, pelanggan..." />
            <span>⌕</span>
          </div>
          <button class="icon-circle">🔔<span class="notif-dot">3</span></button>
          <div class="profile">
            <div class="avatar"></div>
            <div>
              <div class="profile-name">Super Admin</div>
              <div class="profile-role">Administrator</div>
            </div>
            <span>▾</span>
          </div>
        </div>
      </header>

      <div class="toolbar">
        <div class="tabs">
          <a class="tab active">Ringkasan</a>
          <a class="tab">Hari ini</a>
          <a class="tab">Minggu ini</a>
          <a class="tab">Bulan ini</a>
          <a class="tab">3 Bulan Terakhir</a>
          <a class="tab">Tahun ini</a>
          <a class="tab">Kustom</a>
        </div>
        <div class="filters">
          <button class="date-btn">📅 1 Mei 2024 - 31 Mei 2024 ▾</button>
          <button class="filter-btn">Filter</button>
        </div>
      </div>

      <section class="stats-grid">
        <div class="stat-card">
          <div class="stat-icon blue">👜</div>
          <div>
            <div class="stat-label">Total Pesanan</div>
            <div class="stat-value">2.458</div>
            <div class="stat-meta up">↑ 18,6% <span>vs 1 - 30 Apr 2024</span></div>
          </div>
        </div>

        <div class="stat-card">
          <div class="stat-icon green">💰</div>
          <div>
            <div class="stat-label">Total Pendapatan</div>
            <div class="stat-value">Rp125.430.000</div>
            <div class="stat-meta up">↑ 21,4% <span>vs 1 - 30 Apr 2024</span></div>
          </div>
        </div>

        <div class="stat-card">
          <div class="stat-icon purple">👥</div>
          <div>
            <div class="stat-label">Pelanggan Aktif</div>
            <div class="stat-value">1.856</div>
            <div class="stat-meta up">↑ 16,2% <span>vs 1 - 30 Apr 2024</span></div>
          </div>
        </div>

        <div class="stat-card">
          <div class="stat-icon orange">🏪</div>
          <div>
            <div class="stat-label">Mitra Aktif</div>
            <div class="stat-value">248</div>
            <div class="stat-meta up">↑ 9,1% <span>vs 1 - 30 Apr 2024</span></div>
          </div>
        </div>

        <div class="stat-card">
          <div class="stat-icon red">❤</div>
          <div>
            <div class="stat-label">Tingkat Selesai</div>
            <div class="stat-value">92,4%</div>
            <div class="stat-meta up">↑ 4,8% <span>vs 1 - 30 Apr 2024</span></div>
          </div>
        </div>
      </section>

      <section class="grid-layout">
        <div class="panel chart-panel">
          <div class="panel-header">
            <h2>Tren Pesanan</h2>
            <button class="small-select">Harian ▾</button>
          </div>
          <div class="chart-box">
            <canvas id="trendChart"></canvas>
          </div>
        </div>

        <div class="panel pie-panel">
          <div class="panel-header">
            <h2>Distribusi Status Pesanan</h2>
          </div>
          <div class="pie-wrap">
            <div class="donut">
              <div class="donut-center">
                <strong>2.458</strong>
                <span>Total</span>
              </div>
            </div>
            <ul class="legend">
              <li><span class="dot green"></span> Selesai <b>2.271 (92,4%)</b></li>
              <li><span class="dot yellow"></span> Menunggu <b>112 (4,6%)</b></li>
              <li><span class="dot gray"></span> Diproses <b>48 (2,0%)</b></li>
              <li><span class="dot red"></span> Dibatalkan <b>27 (1,0%)</b></li>
            </ul>
          </div>
        </div>

        <div class="panel summary-panel">
          <div class="panel-header">
            <h2>Ringkasan Performa</h2>
          </div>
          <div class="summary-list">
            <div class="summary-item">
              <span>Rata-rata Nilai Pesanan</span>
              <b>Rp51.041</b>
              <small class="up">↑ 2,4%</small>
            </div>
            <div class="summary-item">
              <span>Rata-rata Waktu Selesai</span>
              <b>1,7 hari</b>
              <small class="down">↓ 0,2 hari</small>
            </div>
            <div class="summary-item">
              <span>Tingkat Kepuasan (Rating)</span>
              <b>4,6 / 5</b>
              <small class="up">↑ 0,2</small>
            </div>
            <div class="summary-item">
              <span>Tingkat Komplain</span>
              <b>2,1%</b>
              <small class="up">↑ 0,6%</small>
            </div>
          </div>
        </div>

        <div class="panel donut-panel">
          <div class="panel-header">
            <h2>Pendapatan per Metode Pembayaran</h2>
          </div>
          <div class="pie-wrap">
            <div class="donut payment-donut">
              <div class="donut-center">
                <strong>Rp125.430.000</strong>
                <span>Total</span>
              </div>
            </div>
            <ul class="legend">
              <li><span class="dot blue"></span> QRIS <b>Rp78.650.000 (62,7%)</b></li>
              <li><span class="dot green"></span> Transfer Bank <b>Rp28.430.000 (22,7%)</b></li>
              <li><span class="dot pink"></span> E-Wallet <b>Rp13.870.000 (11,0%)</b></li>
              <li><span class="dot yellow"></span> Cash <b>Rp4.480.000 (3,6%)</b></li>
            </ul>
          </div>
        </div>

        <div class="panel list-panel">
          <div class="panel-header">
            <h2>Top 5 Mitra Laundry (Pendapatan)</h2>
            <button class="small-select">Pendapatan ▾</button>
          </div>
          <ol class="rank-list">
            <li><span>Laundry Bersih Sejahtera</span><b>Rp18.750.000</b></li>
            <li><span>Fresh & Clean Laundry</span><b>Rp14.230.000</b></li>
            <li><span>Quick Wash Laundry</span><b>Rp12.890.000</b></li>
            <li><span>LaundryKita</span><b>Rp9.450.000</b></li>
            <li><span>CleanPro Laundry</span><b>Rp7.860.000</b></li>
          </ol>
          <div class="panel-link">Lihat semua mitra →</div>
        </div>

        <div class="panel list-panel">
          <div class="panel-header">
            <h2>Top 5 Layanan</h2>
            <button class="small-select">Jumlah Pesanan ▾</button>
          </div>
          <ol class="rank-list">
            <li><span>Cuci Kiloan</span><b>1.245</b></li>
            <li><span>Cuci Satuan</span><b>586</b></li>
            <li><span>Setrika</span><b>413</b></li>
            <li><span>Bed Cover</span><b>128</b></li>
            <li><span>Karpet</span><b>86</b></li>
          </ol>
          <div class="panel-link">Lihat semua layanan →</div>
        </div>

        <div class="panel report-panel">
          <div class="panel-header">
            <h2>Laporan Cepat</h2>
          </div>
          <div class="report-list">
            <div class="report-item">
              <div>
                <b>Laporan Penjualan</b>
                <span>Pendapatan & transaksi</span>
              </div>
              <div class="report-actions">
                <button>PDF</button>
                <button>Excel</button>
              </div>
            </div>
            <div class="report-item">
              <div>
                <b>Laporan Pesanan</b>
                <span>Ringkasan semua pesanan</span>
              </div>
              <div class="report-actions">
                <button>PDF</button>
                <button>Excel</button>
              </div>
            </div>
            <div class="report-item">
              <div>
                <b>Laporan Mitra</b>
                <span>Performa mitra laundry</span>
              </div>
              <div class="report-actions">
                <button>PDF</button>
                <button>Excel</button>
              </div>
            </div>
            <div class="report-item">
              <div>
                <b>Laporan Pelanggan</b>
                <span>Aktivitas & pertumbuhan</span>
              </div>
              <div class="report-actions">
                <button>PDF</button>
                <button>Excel</button>
              </div>
            </div>
          </div>
          <button class="full-report-btn">Lihat Semua Laporan</button>
        </div>
      </section>

      <section class="insight-panel">
        <h2>Insight & Rekomendasi</h2>
        <div class="insight-grid">
          <div class="insight-card">
            <h3>Pendapatan Meningkat</h3>
            <p>Total pendapatan naik 21,4% dibanding periode sebelumnya.</p>
            <a href="#">Lihat detail →</a>
          </div>
          <div class="insight-card">
            <h3>Pesanan Terbanyak</h3>
            <p>Hari dengan pesanan terbanyak adalah Sabtu, 25 Mei 2024 (132 pesanan).</p>
            <a href="#">Lihat detail →</a>
          </div>
          <div class="insight-card">
            <h3>Layanan Favorit</h3>
            <p>Layanan Cuci Kiloan menjadi yang paling diminati pelanggan.</p>
            <a href="#">Lihat detail →</a>
          </div>
          <div class="insight-card">
            <h3>Waktu Selesai</h3>
            <p>Rata-rata waktu selesai 1,7 hari.</p>
            <a href="#">Lihat detail →</a>
          </div>
        </div>
      </section>
    </main>
  </div>

  <script>
    // --- FUNGSI SIDEBAR MENU ---
    const menuToggle = document.getElementById('menuToggle');
    const sidebar = document.getElementById('sidebar');
    const closeSidebar = document.getElementById('closeSidebar');
    const sidebarOverlay = document.getElementById('sidebarOverlay');

    function toggleMenu() {
      sidebar.classList.toggle('show');
      sidebarOverlay.classList.toggle('show');
    }

    // Event listeners untuk membuka/menutup sidebar
    menuToggle.addEventListener('click', toggleMenu);
    closeSidebar.addEventListener('click', toggleMenu);
    sidebarOverlay.addEventListener('click', toggleMenu);


    // --- FUNGSI CHART.JS ---
    const ctx = document.getElementById('trendChart').getContext('2d');

    new Chart(ctx, {
      type: 'line',
      data: {
        labels: ['1 Mei', '6 Mei', '11 Mei', '16 Mei', '21 Mei', '26 Mei', '31 Mei'],
        datasets: [
          {
            label: 'Pesanan',
            data: [120, 150, 132, 178, 140, 165, 155],
            borderColor: '#2563eb',
            backgroundColor: 'rgba(37, 99, 235, 0.10)',
            pointBackgroundColor: '#2563eb',
            pointBorderColor: '#fff',
            pointBorderWidth: 2,
            pointRadius: 4,
            tension: 0.4,
            fill: true
          },
          {
            label: 'Pendapatan (Rp)',
            data: [80, 110, 95, 130, 105, 145, 120],
            borderColor: '#10b981',
            backgroundColor: 'rgba(16, 185, 129, 0.08)',
            pointBackgroundColor: '#10b981',
            pointBorderColor: '#fff',
            pointBorderWidth: 2,
            pointRadius: 4,
            tension: 0.4,
            fill: false
          }
        ]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: true,
            position: 'top',
            align: 'start',
            labels: {
              usePointStyle: true,
              boxWidth: 8,
              boxHeight: 8
            }
          }
        },
        scales: {
          x: {
            grid: {
              display: false
            }
          },
          y: {
            beginAtZero: true,
            grid: {
              color: '#e5e7eb'
            },
            ticks: {
              stepSize: 50
            }
          }
        }
      }
    });
  </script>
</body>
</html>