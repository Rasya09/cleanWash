<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>LaundryHub – Pembayaran</title>
  <link rel="stylesheet" href="{{ asset('assets/css/admin/pembayaran.css') }}">
</head>
<body>

<!-- ══════════════ SIDEBAR ══════════════ -->
<aside class="sidebar">
  <div class="sidebar-brand">
    <div class="brand-icon">🧺</div>
    <div class="brand-text">
      <h2>LaundryHub</h2>
      <span>Admin Panel</span>
    </div>
  </div>

  <nav class="sidebar-nav">
    <div class="nav-section">
      <div class="nav-item"><span class="ni">🏠</span> Dashboard</div>
    </div>

    <div class="nav-section">
      <div class="nav-label">Manajemen</div>
      <div class="nav-item"><span class="ni">👤</span> User / Customer</div>
      <div class="nav-item"><span class="ni">🏪</span> Mitra Laundry</div>
      <div class="nav-item">
        <span class="ni">✅</span> Verifikasi Mitra
        <span class="nav-badge">8</span>
      </div>
      <div class="nav-item"><span class="ni">📦</span> Pesanan (via Mitra) ›</div>
      <div class="nav-item active"><span class="ni">💳</span> Pembayaran</div>
    </div>

    <div class="nav-section">
      <div class="nav-label">Moderasi</div>
      <div class="nav-item"><span class="ni">⭐</span> Review &amp; Rating</div>
      <div class="nav-item">
        <span class="ni">🚩</span> Komplain / Laporan
        <span class="nav-badge">2</span>
      </div>
    </div>

    <div class="nav-section">
      <div class="nav-label">Laporan &amp; Analitik</div>
      <div class="nav-item"><span class="ni">📊</span> Statistik &amp; Laporan</div>
      <div class="nav-item"><span class="ni">📋</span> Aktivitas</div>
    </div>

    <div class="nav-section">
      <div class="nav-label">Pengaturan</div>
      <div class="nav-item"><span class="ni">⚙️</span> Pengaturan Platform</div>
      <div class="nav-item"><span class="ni">🛡️</span> Admin &amp; Role</div>
      <div class="nav-item"><span class="ni">🔔</span> Notifikasi</div>
    </div>
  </nav>

  <div class="sidebar-footer">
    <div class="help-card">
      <p>Butuh bantuan?</p>
      <small>Kunjungi Pusat Bantuan</small>
      <div class="help-btns">
        <button class="btn-help p">🎧 Pusat Bantuan</button>
        <button class="btn-help s">🎧</button>
      </div>
    </div>
  </div>
</aside>

<!-- ══════════════ MAIN ══════════════ -->
<div class="main">

  <!-- HEADER -->
  <header class="header">
    <button class="ham" id="hamBtn" title="Toggle Sidebar">
      <span></span><span></span><span></span>
    </button>

    <div class="header-title">
      <h1>Pembayaran</h1>
      <p>Kelola semua transaksi pembayaran di platform.</p>
    </div>

    <div class="header-search">
      <span class="search-ico">🔍</span>
      <input type="text" placeholder="Cari transaksi, order ID, mitra..."/>
    </div>

    <div class="header-actions">
      <button class="notif-btn">
        🔔 <span class="notif-badge">3</span>
      </button>
      <div class="user-profile">
        <div class="u-avatar">SA</div>
        <div class="u-info">
          <h4>Super Admin</h4>
          <span>Administrator</span>
        </div>
        <span class="chevron">▾</span>
      </div>
    </div>
  </header>

  <!-- PAGE BODY -->
  <div class="page-body">

    <!-- CONTENT -->
    <div class="content">

      <!-- STAT CARDS -->
      <div class="stat-row">
        <div class="stat-card">
          <div class="stat-icon blue">💳</div>
          <div class="stat-data">
            <div class="stat-label">Total Transaksi</div>
            <div class="stat-value">1.248</div>
            <div class="stat-sub">Semua transaksi</div>
          </div>
        </div>

        <div class="stat-card">
          <div class="stat-icon green">✅</div>
          <div class="stat-data">
            <div class="stat-label">Berhasil</div>
            <div class="stat-value">1.102</div>
            <div class="stat-sub">88,28% dari total</div>
          </div>
        </div>

        <div class="stat-card">
          <div class="stat-icon orange">⏳</div>
          <div class="stat-data">
            <div class="stat-label">Menunggu</div>
            <div class="stat-value">68</div>
            <div class="stat-sub">5,45% dari total</div>
          </div>
        </div>

        <div class="stat-card">
          <div class="stat-icon red">❌</div>
          <div class="stat-data">
            <div class="stat-label">Gagal</div>
            <div class="stat-value">78</div>
            <div class="stat-sub">6,25% dari total</div>
          </div>
        </div>

        <div class="stat-card">
          <div class="stat-icon purple">💰</div>
          <div class="stat-data">
            <div class="stat-label">Total Nominal</div>
            <div class="stat-value big">Rp125.430.000</div>
            <div class="stat-sub">Semua transaksi</div>
          </div>
        </div>
      </div>

      <!-- TABS -->
      <div class="tab-bar">
        <div class="tab-item active">Semua</div>
        <div class="tab-item">Berhasil</div>
        <div class="tab-item">Menunggu</div>
        <div class="tab-item">Gagal</div>
        <div class="tab-item">Refund</div>
      </div>

      <!-- TOOLBAR -->
      <div class="toolbar">
        <div class="f-search">
          <span class="ico">🔍</span>
          <input type="text" placeholder="Cari transaksi, order ID, mitra..."/>
        </div>

        <div class="f-select">
          <select><option>Status</option><option>Berhasil</option><option>Menunggu</option><option>Gagal</option></select>
          ▾
        </div>

        <div class="f-date">📅 <input type="date" placeholder="Tanggal Mulai"/></div>
        <div class="f-date">📅 <input type="date" placeholder="Tanggal Selesai"/></div>

        <div class="f-select">
          <select><option>Metode Pembayaran</option><option>QRIS</option><option>Cash</option><option>Transfer Bank</option><option>E-Wallet</option></select>
          ▾
        </div>

        <button class="btn-filter">⚙ Filter</button>
        <button class="btn-export">⬇ Export</button>
      </div>

      <!-- TABLE -->
      <div class="table-wrap">
        <table class="data-table">
          <thead>
            <tr>
              <th style="width:40px;text-align:center"><input type="checkbox"/></th>
              <th>ID Transaksi</th>
              <th>Order ID</th>
              <th>Mitra Laundry</th>
              <th>Metode Pembayaran</th>
              <th>Nominal</th>
              <th>Status</th>
              <th>Waktu Pembayaran</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>

            <!-- Row 1 – selected -->
            <tr class="sel" onclick="selectRow(this)">
              <td style="text-align:center"><input type="checkbox" checked/></td>
              <td><div class="trx-id">TRX-2024-0508-0001</div></td>
              <td><div class="ord-id">#ORD-2024-0508-0001</div></td>
              <td>
                <div class="mitra-cell">
                  <div class="m-logo blue">🧺</div>
                  <div class="m-name">Laundry Bersih<br/>Sejahtera</div>
                </div>
              </td>
              <td><span class="pm-tag qris">QRIS</span></td>
              <td><div class="nominal">Rp85.000</div></td>
              <td><span class="badge berhasil">Berhasil</span></td>
              <td>
                <div class="waktu-date">8 Mei 2024</div>
                <div class="waktu-time">09:20</div>
              </td>
              <td>
                <div class="act-cell">
                  <button class="act-btn view">👁</button>
                  <button class="act-btn">⋯</button>
                </div>
              </td>
            </tr>

            <!-- Row 2 -->
            <tr onclick="selectRow(this)">
              <td style="text-align:center"><input type="checkbox"/></td>
              <td><div class="trx-id">TRX-2024-0508-0002</div></td>
              <td><div class="ord-id">#ORD-2024-0508-0002</div></td>
              <td>
                <div class="mitra-cell">
                  <div class="m-logo teal">🔵</div>
                  <div class="m-name">Quick Wash<br/>Laundry</div>
                </div>
              </td>
              <td><span class="pm-tag cash">Cash</span></td>
              <td><div class="nominal">Rp45.000</div></td>
              <td><span class="badge berhasil">Berhasil</span></td>
              <td>
                <div class="waktu-date">8 Mei 2024</div>
                <div class="waktu-time">08:50</div>
              </td>
              <td>
                <div class="act-cell">
                  <button class="act-btn view">👁</button>
                  <button class="act-btn">⋯</button>
                </div>
              </td>
            </tr>

            <!-- Row 3 -->
            <tr onclick="selectRow(this)">
              <td style="text-align:center"><input type="checkbox"/></td>
              <td><div class="trx-id">TRX-2024-0507-0015</div></td>
              <td><div class="ord-id">#ORD-2024-0507-0015</div></td>
              <td>
                <div class="mitra-cell">
                  <div class="m-logo green">🌿</div>
                  <div class="m-name">Fresh &amp; Clean<br/>Laundry</div>
                </div>
              </td>
              <td><span class="pm-tag transfer">Transfer Bank</span></td>
              <td><div class="nominal">Rp120.000</div></td>
              <td><span class="badge berhasil">Berhasil</span></td>
              <td>
                <div class="waktu-date">7 Mei 2024</div>
                <div class="waktu-time">15:35</div>
              </td>
              <td>
                <div class="act-cell">
                  <button class="act-btn view">👁</button>
                  <button class="act-btn">⋯</button>
                </div>
              </td>
            </tr>

            <!-- Row 4 -->
            <tr onclick="selectRow(this)">
              <td style="text-align:center"><input type="checkbox"/></td>
              <td><div class="trx-id">TRX-2024-0507-0014</div></td>
              <td><div class="ord-id">#ORD-2024-0507-0014</div></td>
              <td>
                <div class="mitra-cell">
                  <div class="m-logo orange">🟠</div>
                  <div class="m-name">LaundryKita</div>
                </div>
              </td>
              <td><span class="pm-tag qris">QRIS</span></td>
              <td><div class="nominal">Rp75.000</div></td>
              <td><span class="badge menunggu">Menunggu</span></td>
              <td>
                <div class="waktu-date">7 Mei 2024</div>
                <div class="waktu-time">14:25</div>
              </td>
              <td>
                <div class="act-cell">
                  <button class="act-btn view">👁</button>
                  <button class="act-btn">⋯</button>
                </div>
              </td>
            </tr>

            <!-- Row 5 -->
            <tr onclick="selectRow(this)">
              <td style="text-align:center"><input type="checkbox"/></td>
              <td><div class="trx-id">TRX-2024-0507-0013</div></td>
              <td><div class="ord-id">#ORD-2024-0507-0013</div></td>
              <td>
                <div class="mitra-cell">
                  <div class="m-logo purple">💜</div>
                  <div class="m-name">CleanPro Laundry</div>
                </div>
              </td>
              <td><span class="pm-tag ewallet">E-Wallet</span></td>
              <td><div class="nominal">Rp70.000</div></td>
              <td><span class="badge berhasil">Berhasil</span></td>
              <td>
                <div class="waktu-date">7 Mei 2024</div>
                <div class="waktu-time">11:15</div>
              </td>
              <td>
                <div class="act-cell">
                  <button class="act-btn view">👁</button>
                  <button class="act-btn">⋯</button>
                </div>
              </td>
            </tr>

            <!-- Row 6 -->
            <tr onclick="selectRow(this)">
              <td style="text-align:center"><input type="checkbox"/></td>
              <td><div class="trx-id">TRX-2024-0506-0022</div></td>
              <td><div class="ord-id">#ORD-2024-0506-0022</div></td>
              <td>
                <div class="mitra-cell">
                  <div class="m-logo red">🔴</div>
                  <div class="m-name">Rapi &amp; Wangi<br/>Laundry</div>
                </div>
              </td>
              <td><span class="pm-tag cash">Cash</span></td>
              <td><div class="nominal">Rp30.000</div></td>
              <td><span class="badge berhasil">Berhasil</span></td>
              <td>
                <div class="waktu-date">6 Mei 2024</div>
                <div class="waktu-time">16:45</div>
              </td>
              <td>
                <div class="act-cell">
                  <button class="act-btn view">👁</button>
                  <button class="act-btn">⋯</button>
                </div>
              </td>
            </tr>

            <!-- Row 7 -->
            <tr onclick="selectRow(this)">
              <td style="text-align:center"><input type="checkbox"/></td>
              <td><div class="trx-id">TRX-2024-0506-0021</div></td>
              <td><div class="ord-id">#ORD-2024-0506-0021</div></td>
              <td>
                <div class="mitra-cell">
                  <div class="m-logo indigo">📍</div>
                  <div class="m-name">Super Laundry<br/>Express</div>
                </div>
              </td>
              <td><span class="pm-tag transfer">Transfer Bank</span></td>
              <td><div class="nominal">Rp150.000</div></td>
              <td><span class="badge gagal">Gagal</span></td>
              <td>
                <div class="waktu-date">6 Mei 2024</div>
                <div class="waktu-time">13:30</div>
              </td>
              <td>
                <div class="act-cell">
                  <button class="act-btn view">👁</button>
                  <button class="act-btn">⋯</button>
                </div>
              </td>
            </tr>

            <!-- Row 8 -->
            <tr onclick="selectRow(this)">
              <td style="text-align:center"><input type="checkbox"/></td>
              <td><div class="trx-id">TRX-2024-0505-0018</div></td>
              <td><div class="ord-id">#ORD-2024-0505-0018</div></td>
              <td>
                <div class="mitra-cell">
                  <div class="m-logo cyan">🔷</div>
                  <div class="m-name">Laundry Baik Hati</div>
                </div>
              </td>
              <td><span class="pm-tag qris">QRIS</span></td>
              <td><div class="nominal">Rp60.000</div></td>
              <td><span class="badge berhasil">Berhasil</span></td>
              <td>
                <div class="waktu-date">5 Mei 2024</div>
                <div class="waktu-time">09:10</div>
              </td>
              <td>
                <div class="act-cell">
                  <button class="act-btn view">👁</button>
                  <button class="act-btn">⋯</button>
                </div>
              </td>
            </tr>

          </tbody>
        </table>
      </div>

      <!-- PAGINATION -->
      <div class="pagi-bar">
        <div class="pagi-info">Menampilkan 1 – 8 dari 1.248 data</div>
        <div class="pagi-right">
          <div class="pp-select">
            <select><option>10</option><option>25</option><option>50</option></select>
            / halaman
          </div>
          <div class="pg-btns">
            <button class="pg-btn nav">‹</button>
            <button class="pg-btn active">1</button>
            <button class="pg-btn">2</button>
            <button class="pg-btn">3</button>
            <button class="pg-btn">4</button>
            <button class="pg-btn">5</button>
            <span class="pg-dots">…</span>
            <button class="pg-btn">125</button>
            <button class="pg-btn nav">›</button>
          </div>
        </div>
      </div>

    </div><!-- /content -->

    <!-- ══════════════ DETAIL PANEL ══════════════ -->
    <aside class="detail" id="detailPanel">
      <div class="detail-hdr">
        <h3>Detail Pembayaran</h3>
        <button class="close-btn" id="closeDetail">✕</button>
      </div>

      <div class="detail-body">

        <!-- Hero -->
        <div class="d-hero">
          <span class="badge berhasil" style="display:inline-flex;margin-bottom:10px">Berhasil</span>
          <div class="d-amount">Rp85.000</div>
          <div class="d-trxid">TRX-2024-0508-0001</div>
        </div>

        <!-- Informasi Transaksi -->
        <div class="d-section">
          <div class="d-section-title">
            <div class="si blue">ℹ</div>
            Informasi Transaksi
          </div>
          <div class="d-rows">
            <div class="d-row">
              <span class="d-row-label">Order ID</span>
              <span class="d-row-value primary">#ORD-2024-0508-0001</span>
            </div>
            <div class="d-row">
              <span class="d-row-label">Mitra Laundry</span>
              <span class="d-row-value">Laundry Bersih Sejahtera</span>
            </div>
            <div class="d-row">
              <span class="d-row-label">Pelanggan</span>
              <span class="d-row-value">Andi Pratama</span>
            </div>
            <div class="d-row">
              <span class="d-row-label">Waktu Pembayaran</span>
              <span class="d-row-value">8 Mei 2024, 09:20</span>
            </div>
            <div class="d-row">
              <span class="d-row-label">Status</span>
              <span><span class="badge berhasil">Berhasil</span></span>
            </div>
          </div>
        </div>

        <!-- Rincian Pembayaran -->
        <div class="d-section">
          <div class="d-section-title">
            <div class="si green">💵</div>
            Rincian Pembayaran
          </div>
          <div class="rincian-rows">
            <div class="r-row">
              <span class="r-label">Subtotal</span>
              <span class="r-value">Rp85.000</span>
            </div>
            <div class="r-row">
              <span class="r-label">Biaya Layanan</span>
              <span class="r-value">Rp0</span>
            </div>
            <div class="r-row">
              <span class="r-label">Diskon</span>
              <span class="r-value red">- Rp0</span>
            </div>
            <div class="r-divider"></div>
            <div class="r-row total">
              <span class="r-label">Total</span>
              <span class="r-value">Rp85.000</span>
            </div>
          </div>
        </div>

        <!-- Metode Pembayaran -->
        <div class="d-section">
          <div class="d-section-title">
            <div class="si purple">💳</div>
            Metode Pembayaran
          </div>
          <div class="pm-card">
            <div class="pm-icon-box">
              <span class="qris-text">QR</span>
            </div>
            <div class="pm-info">
              <h4>QRIS</h4>
              <p>Scan QR Code</p>
              <div class="pm-meta">
                <div class="pm-meta-row">
                  <span class="pm-meta-label">Merchant</span>
                  <span class="pm-meta-value">LaundryHub</span>
                </div>
                <div class="pm-meta-row">
                  <span class="pm-meta-label">Ref ID</span>
                  <span class="pm-meta-value">QRS-240508-0001</span>
                </div>
                <div class="pm-meta-row">
                  <span class="pm-meta-label">Status Pembayaran</span>
                  <span class="pm-status-dot">Berhasil</span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Aksi -->
        <div class="d-section">
          <div class="d-section-title">
            <div class="si blue">⚡</div>
            Aksi
          </div>
        </div>

      </div><!-- /detail-body -->

      <!-- Footer -->
      <div class="detail-footer">
        <div class="d-foot-row">
          <button class="btn-da primary">📄 Lihat Order</button>
          <button class="btn-da sec">🖨 Cetak Struk</button>
        </div>
        <button class="btn-refund">↩ Proses Refund</button>
      </div>
    </aside>

  </div><!-- /page-body -->
</div><!-- /main -->

<script>
  // Row selection
  function selectRow(row) {
    document.querySelectorAll('tbody tr').forEach(r => {
      r.classList.remove('sel');
      r.querySelector('input[type=checkbox]').checked = false;
    });
    row.classList.add('sel');
    row.querySelector('input[type=checkbox]').checked = true;
  }

  // Tabs
  document.querySelectorAll('.tab-item').forEach(tab => {
    tab.addEventListener('click', () => {
      document.querySelectorAll('.tab-item').forEach(t => t.classList.remove('active'));
      tab.classList.add('active');
    });
  });

  // Pagination
  document.querySelectorAll('.pg-btn:not(.nav)').forEach(btn => {
    btn.addEventListener('click', () => {
      document.querySelectorAll('.pg-btn:not(.nav)').forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
    });
  });

  // Close detail panel
  document.getElementById('closeDetail').addEventListener('click', () => {
    document.getElementById('detailPanel').style.display = 'none';
  });

  // Hamburger toggle
  document.getElementById('hamBtn').addEventListener('click', () => {
    const sb = document.querySelector('.sidebar');
    sb.style.display = sb.style.display === 'none' ? 'flex' : 'none';
  });
</script>
</body>
</html>