<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>LaundryHub – Pesanan (via Mitra)</title>
  <link rel="stylesheet" href="{{ asset('assets/css/admin/pesanan.css') }}">
</head>
<body>

<!-- ════════════════════ SIDEBAR ════════════════════ -->
<aside class="sidebar">
  <div class="sidebar-brand">
    <div class="brand-icon">🧺</div>
    <div class="brand-text">
      <h2>LaundryHub</h2>
      <span>Admin Panel</span>
    </div>
  </div>

  <nav class="sidebar-nav">
    <!-- Main -->
    <div class="nav-section">
      <div class="nav-item">
        <span class="nav-icon">🏠</span> Dashboard
      </div>
    </div>

    <!-- Manajemen -->
    <div class="nav-section">
      <div class="nav-section-label">Manajemen</div>
      <div class="nav-item">
        <span class="nav-icon">👤</span> User / Customer
      </div>
      <div class="nav-item">
        <span class="nav-icon">🏪</span> Mitra Laundry
      </div>
      <div class="nav-item">
        <span class="nav-icon">✅</span> Verifikasi Mitra
        <span class="nav-badge">8</span>
      </div>
      <div class="nav-item active">
        <span class="nav-icon">📦</span> Pesanan (via Mitra)
      </div>
      <div class="nav-item">
        <span class="nav-icon">💳</span> Pembayaran
      </div>
    </div>

    <!-- Moderasi -->
    <div class="nav-section">
      <div class="nav-section-label">Moderasi</div>
      <div class="nav-item">
        <span class="nav-icon">⭐</span> Review & Rating
      </div>
      <div class="nav-item">
        <span class="nav-icon">🚩</span> Komplain / Laporan
        <span class="nav-badge">2</span>
      </div>
    </div>

    <!-- Laporan & Analitik -->
    <div class="nav-section">
      <div class="nav-section-label">Laporan &amp; Analitik</div>
      <div class="nav-item">
        <span class="nav-icon">📊</span> Statistik &amp; Laporan
      </div>
      <div class="nav-item">
        <span class="nav-icon">📋</span> Aktivitas
      </div>
    </div>

    <!-- Pengaturan -->
    <div class="nav-section">
      <div class="nav-section-label">Pengaturan</div>
      <div class="nav-item">
        <span class="nav-icon">⚙️</span> Pengaturan Platform
      </div>
      <div class="nav-item">
        <span class="nav-icon">🛡️</span> Admin &amp; Role
      </div>
      <div class="nav-item">
        <span class="nav-icon">🔔</span> Notifikasi
      </div>
    </div>
  </nav>

  <div class="sidebar-footer">
    <div class="help-card">
      <p>Butuh bantuan?</p>
      <small>Kunjungi Pusat Bantuan</small>
      <div class="help-buttons">
        <button class="btn-help primary">🎧 Pusat Bantuan</button>
        <button class="btn-help secondary">🎧</button>
      </div>
    </div>
  </div>
</aside>

<!-- ════════════════════ MAIN WRAPPER ════════════════════ -->
<div class="main-wrapper">

  <!-- HEADER -->
  <header class="header">
    <button class="hamburger-btn" title="Toggle Sidebar">
      <span></span><span></span><span></span>
    </button>

    <div class="header-title">
      <h1>Pesanan (via Mitra)</h1>
      <p>Kelola semua pesanan yang masuk dari mitra laundry.</p>
    </div>

    <div class="header-search">
      <span class="search-icon">🔍</span>
      <input type="text" placeholder="Cari pesanan, mitra, pelanggan..." />
    </div>

    <div class="header-actions">
      <button class="notif-btn" title="Notifikasi">
        🔔
        <span class="notif-badge">3</span>
      </button>

      <div class="user-profile">
        <div class="user-avatar-placeholder">SA</div>
        <div class="user-info">
          <h4>Super Admin</h4>
          <span>Administrator</span>
        </div>
        <span class="chevron-icon">▾</span>
      </div>
    </div>
  </header>

  <!-- PAGE BODY -->
  <div class="page-body">

    <!-- TABLE AREA -->
    <div class="table-area">

      <!-- Tabs -->
      <div class="tab-bar">
        <div class="tab-item active">Semua <span class="tab-count">248</span></div>
        <div class="tab-item">Menunggu Pickup <span class="tab-count">32</span></div>
        <div class="tab-item">Diproses <span class="tab-count">68</span></div>
        <div class="tab-item">Selesai <span class="tab-count">120</span></div>
        <div class="tab-item">Dibatalkan <span class="tab-count">28</span></div>
      </div>

      <!-- Filter Bar -->
      <div class="filter-bar">
        <div class="filter-search">
          <span class="si">🔍</span>
          <input type="text" placeholder="Cari pesanan, mitra, pelanggan..." />
        </div>

        <div class="filter-select">
          <select>
            <option>Status</option>
            <option>Menunggu Pickup</option>
            <option>Diproses</option>
            <option>Selesai</option>
            <option>Dibatalkan</option>
          </select>
          ▾
        </div>

        <div class="filter-date">
          📅 <input type="date" placeholder="Tanggal Mulai" />
        </div>

        <div class="filter-date">
          📅 <input type="date" placeholder="Tanggal Selesai" />
        </div>

        <div class="filter-select">
          <select>
            <option>Kota</option>
            <option>Jakarta</option>
            <option>Bandung</option>
            <option>Surabaya</option>
          </select>
          ▾
        </div>

        <button class="btn-filter">⚙ Filter</button>
      </div>

      <!-- Table -->
      <div class="table-wrapper">
        <table class="data-table">
          <thead>
            <tr>
              <th class="th-checkbox"><input type="checkbox" /></th>
              <th>ID Pesanan</th>
              <th>Mitra Laundry</th>
              <th>Pelanggan</th>
              <th>Layanan</th>
              <th>Berat</th>
              <th>Total</th>
              <th>Status</th>
              <th>Dibuat</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <!-- Row 1 - Active -->
            <tr class="active-row" onclick="selectRow(this)">
              <td class="checkbox-cell"><input type="checkbox" checked /></td>
              <td><div class="order-id">#ORD-2024-0508-0001</div></td>
              <td>
                <div class="mitra-cell">
                  <div class="mitra-logo blue">🧺</div>
                  <div class="mitra-name">Laundry Bersih<br/>Sejahtera</div>
                </div>
              </td>
              <td>
                <div class="pelanggan-name">Andi Pratama</div>
                <div class="pelanggan-phone">0812-3456-7890</div>
              </td>
              <td>
                <div class="layanan-main">Cuci Kiloan</div>
                <div class="layanan-more">+ 2 layanan</div>
              </td>
              <td><div class="berat-val">8.5 kg</div></td>
              <td><div class="total-val">Rp85.000</div></td>
              <td><span class="status-badge menunggu-pickup">Menunggu Pickup</span></td>
              <td>
                <div class="dibuat-date">8 Mei 2024</div>
                <div class="dibuat-time">09:15</div>
              </td>
              <td>
                <div class="action-cell">
                  <button class="action-btn view" title="Lihat">👁</button>
                  <button class="action-btn more" title="Lainnya">⋯</button>
                </div>
              </td>
            </tr>

            <!-- Row 2 -->
            <tr onclick="selectRow(this)">
              <td class="checkbox-cell"><input type="checkbox" /></td>
              <td><div class="order-id">#ORD-2024-0508-0002</div></td>
              <td>
                <div class="mitra-cell">
                  <div class="mitra-logo teal">🔵</div>
                  <div class="mitra-name">Quick Wash<br/>Laundry</div>
                </div>
              </td>
              <td>
                <div class="pelanggan-name">Budi Santoso</div>
                <div class="pelanggan-phone">0813-2345-6789</div>
              </td>
              <td>
                <div class="layanan-main">Cuci Satuan</div>
                <div class="layanan-more">+ 1 layanan</div>
              </td>
              <td><div class="berat-val">3 pcs</div></td>
              <td><div class="total-val">Rp45.000</div></td>
              <td><span class="status-badge diproses">Diproses</span></td>
              <td>
                <div class="dibuat-date">8 Mei 2024</div>
                <div class="dibuat-time">08:45</div>
              </td>
              <td>
                <div class="action-cell">
                  <button class="action-btn view" title="Lihat">👁</button>
                  <button class="action-btn more" title="Lainnya">⋯</button>
                </div>
              </td>
            </tr>

            <!-- Row 3 -->
            <tr onclick="selectRow(this)">
              <td class="checkbox-cell"><input type="checkbox" /></td>
              <td><div class="order-id">#ORD-2024-0507-0015</div></td>
              <td>
                <div class="mitra-cell">
                  <div class="mitra-logo green">🌿</div>
                  <div class="mitra-name">Fresh &amp; Clean<br/>Laundry</div>
                </div>
              </td>
              <td>
                <div class="pelanggan-name">Siti Aisyah</div>
                <div class="pelanggan-phone">0821-9876-5432</div>
              </td>
              <td>
                <div class="layanan-main">Cuci Kiloan</div>
                <div class="layanan-more">+ 3 layanan</div>
              </td>
              <td><div class="berat-val">12 kg</div></td>
              <td><div class="total-val">Rp120.000</div></td>
              <td><span class="status-badge diproses">Diproses</span></td>
              <td>
                <div class="dibuat-date">7 Mei 2024</div>
                <div class="dibuat-time">15:30</div>
              </td>
              <td>
                <div class="action-cell">
                  <button class="action-btn view" title="Lihat">👁</button>
                  <button class="action-btn more" title="Lainnya">⋯</button>
                </div>
              </td>
            </tr>

            <!-- Row 4 -->
            <tr onclick="selectRow(this)">
              <td class="checkbox-cell"><input type="checkbox" /></td>
              <td><div class="order-id">#ORD-2024-0507-0014</div></td>
              <td>
                <div class="mitra-cell">
                  <div class="mitra-logo orange">🟠</div>
                  <div class="mitra-name">LaundryKita</div>
                </div>
              </td>
              <td>
                <div class="pelanggan-name">Dewi Lestari</div>
                <div class="pelanggan-phone">0822-1122-3344</div>
              </td>
              <td>
                <div class="layanan-main">Cuci Satuan</div>
                <div class="layanan-more">+ 2 layanan</div>
              </td>
              <td><div class="berat-val">5 pcs</div></td>
              <td><div class="total-val">Rp75.000</div></td>
              <td><span class="status-badge menunggu">Menunggu</span></td>
              <td>
                <div class="dibuat-date">7 Mei 2024</div>
                <div class="dibuat-time">14:20</div>
              </td>
              <td>
                <div class="action-cell">
                  <button class="action-btn view" title="Lihat">👁</button>
                  <button class="action-btn more" title="Lainnya">⋯</button>
                </div>
              </td>
            </tr>

            <!-- Row 5 -->
            <tr onclick="selectRow(this)">
              <td class="checkbox-cell"><input type="checkbox" /></td>
              <td><div class="order-id">#ORD-2024-0507-0013</div></td>
              <td>
                <div class="mitra-cell">
                  <div class="mitra-logo purple">💜</div>
                  <div class="mitra-name">CleanPro Laundry</div>
                </div>
              </td>
              <td>
                <div class="pelanggan-name">Fahmi Hidayat</div>
                <div class="pelanggan-phone">0838-7766-5544</div>
              </td>
              <td>
                <div class="layanan-main">Cuci Kiloan</div>
              </td>
              <td><div class="berat-val">7 kg</div></td>
              <td><div class="total-val">Rp70.000</div></td>
              <td><span class="status-badge selesai">Selesai</span></td>
              <td>
                <div class="dibuat-date">7 Mei 2024</div>
                <div class="dibuat-time">11:10</div>
              </td>
              <td>
                <div class="action-cell">
                  <button class="action-btn view" title="Lihat">👁</button>
                  <button class="action-btn more" title="Lainnya">⋯</button>
                </div>
              </td>
            </tr>

            <!-- Row 6 -->
            <tr onclick="selectRow(this)">
              <td class="checkbox-cell"><input type="checkbox" /></td>
              <td><div class="order-id">#ORD-2024-0506-0022</div></td>
              <td>
                <div class="mitra-cell">
                  <div class="mitra-logo red">🔴</div>
                  <div class="mitra-name">Rapi &amp; Wangi<br/>Laundry</div>
                </div>
              </td>
              <td>
                <div class="pelanggan-name">Rina Marlina</div>
                <div class="pelanggan-phone">0856-9988-7766</div>
              </td>
              <td>
                <div class="layanan-main">Cuci Satuan</div>
                <div class="layanan-more">+ 1 layanan</div>
              </td>
              <td><div class="berat-val">2 pcs</div></td>
              <td><div class="total-val">Rp30.000</div></td>
              <td><span class="status-badge selesai">Selesai</span></td>
              <td>
                <div class="dibuat-date">6 Mei 2024</div>
                <div class="dibuat-time">16:40</div>
              </td>
              <td>
                <div class="action-cell">
                  <button class="action-btn view" title="Lihat">👁</button>
                  <button class="action-btn more" title="Lainnya">⋯</button>
                </div>
              </td>
            </tr>

            <!-- Row 7 -->
            <tr onclick="selectRow(this)">
              <td class="checkbox-cell"><input type="checkbox" /></td>
              <td><div class="order-id">#ORD-2024-0506-0021</div></td>
              <td>
                <div class="mitra-cell">
                  <div class="mitra-logo indigo">📍</div>
                  <div class="mitra-name">Super Laundry<br/>Express</div>
                </div>
              </td>
              <td>
                <div class="pelanggan-name">Dimas Saputra</div>
                <div class="pelanggan-phone">0811-2233-4455</div>
              </td>
              <td>
                <div class="layanan-main">Cuci Kiloan</div>
                <div class="layanan-more">+ 4 layanan</div>
              </td>
              <td><div class="berat-val">15 kg</div></td>
              <td><div class="total-val">Rp150.000</div></td>
              <td><span class="status-badge dibatalkan">Dibatalkan</span></td>
              <td>
                <div class="dibuat-date">6 Mei 2024</div>
                <div class="dibuat-time">13:25</div>
              </td>
              <td>
                <div class="action-cell">
                  <button class="action-btn view" title="Lihat">👁</button>
                  <button class="action-btn more" title="Lainnya">⋯</button>
                </div>
              </td>
            </tr>

            <!-- Row 8 -->
            <tr onclick="selectRow(this)">
              <td class="checkbox-cell"><input type="checkbox" /></td>
              <td><div class="order-id">#ORD-2024-0505-0018</div></td>
              <td>
                <div class="mitra-cell">
                  <div class="mitra-logo cyan">🔷</div>
                  <div class="mitra-name">Laundry Baik<br/>Hati</div>
                </div>
              </td>
              <td>
                <div class="pelanggan-name">Hendra Wijaya</div>
                <div class="pelanggan-phone">0812-6677-8899</div>
              </td>
              <td>
                <div class="layanan-main">Cuci Satuan</div>
              </td>
              <td><div class="berat-val">4 pcs</div></td>
              <td><div class="total-val">Rp60.000</div></td>
              <td><span class="status-badge dibatalkan">Dibatalkan</span></td>
              <td>
                <div class="dibuat-date">5 Mei 2024</div>
                <div class="dibuat-time">09:05</div>
              </td>
              <td>
                <div class="action-cell">
                  <button class="action-btn view" title="Lihat">👁</button>
                  <button class="action-btn more" title="Lainnya">⋯</button>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <!-- Pagination -->
      <div class="pagination-bar">
        <div class="pagination-info">Menampilkan 1 – 8 dari 248 data</div>
        <div class="pagination-controls">
          <div class="per-page-select">
            <select>
              <option>10</option>
              <option>25</option>
              <option>50</option>
            </select>
            / halaman
          </div>

          <div class="page-buttons">
            <button class="page-btn nav">‹</button>
            <button class="page-btn active">1</button>
            <button class="page-btn">2</button>
            <button class="page-btn">3</button>
            <button class="page-btn">4</button>
            <button class="page-btn">5</button>
            <span class="page-dots">…</span>
            <button class="page-btn">25</button>
            <button class="page-btn nav">›</button>
          </div>
        </div>
      </div>

    </div><!-- /table-area -->

    <!-- DETAIL PANEL -->
    <aside class="detail-panel">
      <div class="detail-header">
        <h3>Detail Pesanan</h3>
        <button class="close-btn" title="Tutup">✕</button>
      </div>

      <div class="detail-body">

        <!-- Order Meta -->
        <div class="order-meta">
          <div class="order-meta-top">
            <div class="order-meta-id">#ORD-2024-0508-0001</div>
            <span class="status-badge menunggu-pickup">Menunggu Pickup</span>
          </div>
          <div class="order-meta-rows">
            <div class="order-meta-row">
              <span class="order-meta-label">Dibuat</span>
              <span class="order-meta-value">8 Mei 2024, 09:15</span>
            </div>
            <div class="order-meta-row">
              <span class="order-meta-label">Mitra</span>
              <span class="order-meta-value">Laundry Bersih Sejahtera</span>
            </div>
            <div class="order-meta-row">
              <span class="order-meta-label">Pickup</span>
              <span class="order-meta-value">Hari ini, 10:00 – 12:00</span>
            </div>
          </div>
        </div>

        <!-- Customer Info -->
        <div class="detail-section">
          <div class="detail-section-title">
            <div class="section-icon blue">👤</div>
            Informasi Pelanggan
          </div>
          <div class="customer-name">Andi Pratama</div>
          <div class="customer-contacts">
            <div class="customer-contact-row">
              <div class="contact-icon wa">📱</div>
              0812-3456-7890
            </div>
            <div class="customer-contact-row">
              <div class="contact-icon mail">✉️</div>
              andipratama@email.com
            </div>
            <div class="customer-contact-row">
              <div class="contact-icon loc">📍</div>
              Jl. Melati No. 12, Cipete Jakarta Selatan
            </div>
          </div>
        </div>

        <!-- Service Detail -->
        <div class="detail-section">
          <div class="detail-section-title">
            <div class="section-icon green">🧺</div>
            Detail Layanan
          </div>
          <div class="service-rows">
            <div class="service-row">
              <span class="service-name">Cuci Kiloan</span>
              <span class="service-weight">8.5 kg</span>
              <span class="service-price">Rp68.000</span>
            </div>
            <div class="service-row">
              <span class="service-name">Setrika</span>
              <span class="service-weight">8.5 kg</span>
              <span class="service-price">Rp17.000</span>
            </div>
            <div class="service-row">
              <span class="service-name">Lipat</span>
              <span class="service-weight">8.5 kg</span>
              <span class="service-price">Rp0</span>
            </div>
          </div>
          <div class="service-divider"></div>
          <div class="service-summary">
            <div class="service-sum-row">
              <span class="service-sum-label">Subtotal</span>
              <span class="service-sum-value">Rp85.000</span>
            </div>
            <div class="service-sum-row">
              <span class="service-sum-label">Biaya Pickup</span>
              <span class="service-sum-value">Rp0</span>
            </div>
            <div class="service-sum-row total">
              <span class="service-sum-label">Total</span>
              <span class="service-sum-value">Rp85.000</span>
            </div>
          </div>
        </div>

        <!-- Notes -->
        <div class="detail-section">
          <div class="detail-section-title">
            <div class="section-icon orange">✏️</div>
            Catatan
          </div>
          <div class="notes-card">
            Pakaian kantor dan kemeja putih. Tolong dilipat rapi dan diberi pewangi.
          </div>
        </div>

        <!-- Status History -->
        <div class="detail-section">
          <div class="detail-section-title">
            <div class="section-icon purple">🕐</div>
            Riwayat Status
          </div>
          <div class="history-list">
            <div class="history-item">
              <div class="history-dot-wrap">
                <div class="history-dot filled"></div>
                <div class="history-line"></div>
              </div>
              <div class="history-content">
                <div class="history-label">Pesanan Dibuat</div>
                <div class="history-time">8 Mei 2024, 09:15</div>
              </div>
            </div>
            <div class="history-item">
              <div class="history-dot-wrap">
                <div class="history-dot filled"></div>
                <div class="history-line"></div>
              </div>
              <div class="history-content">
                <div class="history-label">Menunggu Pickup</div>
                <div class="history-time">8 Mei 2024, 09:15</div>
              </div>
            </div>
            <div class="history-item inactive">
              <div class="history-dot-wrap">
                <div class="history-dot pending"></div>
                <div class="history-line"></div>
              </div>
              <div class="history-content">
                <div class="history-label">Diproses</div>
              </div>
            </div>
            <div class="history-item inactive">
              <div class="history-dot-wrap">
                <div class="history-dot pending"></div>
              </div>
              <div class="history-content">
                <div class="history-label">Selesai</div>
              </div>
            </div>
          </div>
        </div>

      </div><!-- /detail-body -->

      <!-- Footer Actions -->
      <div class="detail-footer">
        <div class="footer-actions">
          <button class="btn-action primary">📞 Hubungi Mitra</button>
          <button class="btn-action secondary">💬 Chat Mitra</button>
        </div>
        <button class="btn-cancel">✕ Batalkan Pesanan</button>
      </div>

    </aside><!-- /detail-panel -->

  </div><!-- /page-body -->
</div><!-- /main-wrapper -->

<script>
  // Row selection
  function selectRow(row) {
    document.querySelectorAll('tbody tr').forEach(r => r.classList.remove('active-row'));
    document.querySelectorAll('tbody input[type="checkbox"]').forEach(c => c.checked = false);
    row.classList.add('active-row');
    row.querySelector('input[type="checkbox"]').checked = true;
  }

  // Tab switching
  document.querySelectorAll('.tab-item').forEach(tab => {
    tab.addEventListener('click', () => {
      document.querySelectorAll('.tab-item').forEach(t => t.classList.remove('active'));
      tab.classList.add('active');
    });
  });

  // Page buttons
  document.querySelectorAll('.page-btn:not(.nav)').forEach(btn => {
    btn.addEventListener('click', () => {
      document.querySelectorAll('.page-btn:not(.nav)').forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
    });
  });

  // Close detail panel
  document.querySelector('.close-btn').addEventListener('click', () => {
    document.querySelector('.detail-panel').style.display = 'none';
  });

  // Hamburger (demo only)
  document.querySelector('.hamburger-btn').addEventListener('click', () => {
    document.querySelector('.sidebar').style.display =
      document.querySelector('.sidebar').style.display === 'none' ? 'flex' : 'none';
  });
</script>
</body>
</html>