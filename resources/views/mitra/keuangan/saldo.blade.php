@extends('mitra.layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/mitra/saldo.css') }}">
@endsection

@section('content')
    <!-- MAIN CONTENT -->
<main class="main">

  <!-- Page Header -->
  <div class="page-header">
    <div class="page-title">
      <h1>Saldo Saya</h1>
      <p>Kelola saldo dan transaksi keuangan toko Anda</p>
    </div>
    <div class="page-actions">
      <button class="btn-outline">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
        Riwayat Penarikan
      </button>
      <button class="btn-primary">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
        Tarik Saldo
      </button>
    </div>
  </div>

  <!-- Top Grid: Balance + Summary -->
  <div class="top-grid">

    <!-- Left: Balance Card + Sub -->
    <div>
      <div class="balance-card">
        <div class="balance-label">
          Saldo Tersedia
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 8v4l3 3"/></svg>
        </div>
        <div class="balance-amount">Rp5.860.000</div>
        <div class="balance-note">Saldo akan dicairkan ke rekening utama Anda</div>
        <button class="btn-withdraw-white">Tarik Saldo</button>

        <!-- Wallet Illustration -->
        <div class="balance-illustration">
          <div class="wallet-img">
            <div class="wallet-flap"></div>
            <div class="wallet-body"></div>
            <div class="coin1"></div>
            <div class="coin2"></div>
          </div>
        </div>
      </div>

      <div class="balance-sub">
        <div class="balance-sub-item">
          <div class="sub-label">
            Saldo Tertahan
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 8v4l3 3"/></svg>
          </div>
          <div class="sub-amount">Rp1.240.000</div>
        </div>
        <div class="balance-sub-item">
          <div class="sub-label">
            Total Saldo
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 8v4l3 3"/></svg>
          </div>
          <div class="sub-amount">Rp7.100.000</div>
        </div>
      </div>
    </div>

    <!-- Right: Summary -->
    <div class="summary-card">
      <div class="summary-title">Ringkasan Saldo</div>

      <!-- Total Masuk -->
      <div class="summary-item">
        <div class="summary-icon green">
          <svg viewBox="0 0 24 24" fill="none" stroke="#16A34A" stroke-width="2.2"><path d="M12 4v16m0 0l-4-4m4 4l4-4" stroke-width="0"/><circle cx="12" cy="12" r="9" stroke="#16A34A" stroke-width="1.8"/><path d="M12 8v8m-4-4h8" stroke="#16A34A" stroke-width="2"/></svg>
        </div>
        <div class="summary-info">
          <div class="summary-info-label">Total Masuk</div>
          <div class="summary-amount-row">
            <span class="summary-amount">Rp12.650.000</span>
            <span class="summary-badge">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M7 17l10-10M7 7h10v10"/></svg>
              18.4%
            </span>
            <span class="summary-from">dari Apr 2024</span>
          </div>
        </div>
        <div class="summary-arrow">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 18l6-6-6-6"/></svg>
        </div>
      </div>

      <!-- Total Keluar -->
      <div class="summary-item">
        <div class="summary-icon orange">
          <svg viewBox="0 0 24 24" fill="none" stroke="#D97706" stroke-width="2"><circle cx="12" cy="12" r="9"/><path d="M12 8v8m4-4H8"/></svg>
        </div>
        <div class="summary-info">
          <div class="summary-info-label">Total Keluar (Penarikan &amp; Biaya)</div>
          <div class="summary-amount-row">
            <span class="summary-amount red">Rp6.790.000</span>
            <span class="summary-badge">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M7 17l10-10M7 7h10v10"/></svg>
              6.2%
            </span>
            <span class="summary-from">dari Apr 2024</span>
          </div>
        </div>
        <div class="summary-arrow">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 18l6-6-6-6"/></svg>
        </div>
      </div>

      <!-- Transaksi -->
      <div class="summary-item">
        <div class="summary-icon purple">
          <svg viewBox="0 0 24 24" fill="none" stroke="#7C3AED" stroke-width="1.8"><path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/></svg>
        </div>
        <div class="summary-info">
          <div class="summary-info-label">Transaksi</div>
          <div class="summary-amount-row">
            <span class="summary-amount">38</span>
          </div>
          <div class="summary-sub">Transaksi berhasil</div>
        </div>
        <div class="summary-arrow">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 18l6-6-6-6"/></svg>
        </div>
      </div>
    </div>
  </div>

  <!-- Table + Right Panel -->
  <div class="content-grid">
    <!-- Table Section -->
    <div class="table-section">
      <!-- Tabs -->
      <div class="tabs-bar">
        <div class="tabs">
          <div class="tab active">Semua</div>
          <div class="tab">Pemasukan</div>
          <div class="tab">Pengeluaran</div>
          <div class="tab">Penarikan</div>
          <div class="tab">Biaya</div>
        </div>
        <div class="tabs-right">
          <div class="date-filter">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
            – 31 Mei 2024
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 9l-7 7-7-7"/></svg>
          </div>
          <div class="filter-btn">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M3 4h18M7 8h10M11 12h4"/></svg>
            Filter
          </div>
        </div>
      </div>

      <!-- Table -->
      <table class="data-table">
        <thead>
          <tr>
            <th>Tanggal</th>
            <th>Deskripsi</th>
            <th>Kategori</th>
            <th>Status</th>
            <th>Jumlah</th>
            <th>Saldo Akhir</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <!-- Row 1 -->
          <tr>
            <td>
              <div class="tx-cell">
                <div class="tx-icon in">
                  <svg viewBox="0 0 24 24" fill="none" stroke="#16A34A" stroke-width="2.2"><path d="M12 5v14m-7-7l7 7 7-7"/></svg>
                </div>
                <div>
                  <div class="tx-date-main">31 Mei 2024</div>
                  <div class="tx-date-time">14:32</div>
                </div>
              </div>
            </td>
            <td>
              <div class="tx-desc">Pembayaran pesanan #INV-2405-0132</div>
              <div class="tx-sub">Andi Setiawan</div>
            </td>
            <td><span class="cat-badge masuk">Pemasukan</span></td>
            <td><span class="status-badge berhasil">Berhasil</span></td>
            <td><span class="amount-in">+ Rp65.000</span></td>
            <td><span class="saldo-akhir">Rp5.860.000</span></td>
            <td><button class="more-btn"><svg viewBox="0 0 24 24" fill="currentColor"><circle cx="12" cy="5" r="1.5"/><circle cx="12" cy="12" r="1.5"/><circle cx="12" cy="19" r="1.5"/></svg></button></td>
          </tr>

          <!-- Row 2 -->
          <tr>
            <td>
              <div class="tx-cell">
                <div class="tx-icon in">
                  <svg viewBox="0 0 24 24" fill="none" stroke="#16A34A" stroke-width="2.2"><path d="M12 5v14m-7-7l7 7 7-7"/></svg>
                </div>
                <div>
                  <div class="tx-date-main">30 Mei 2024</div>
                  <div class="tx-date-time">16:05</div>
                </div>
              </div>
            </td>
            <td>
              <div class="tx-desc">Pembayaran pesanan #INV-2405-0128</div>
              <div class="tx-sub">Siti Fatimah</div>
            </td>
            <td><span class="cat-badge masuk">Pemasukan</span></td>
            <td><span class="status-badge berhasil">Berhasil</span></td>
            <td><span class="amount-in">+ Rp15.000</span></td>
            <td><span class="saldo-akhir">Rp5.795.000</span></td>
            <td><button class="more-btn"><svg viewBox="0 0 24 24" fill="currentColor"><circle cx="12" cy="5" r="1.5"/><circle cx="12" cy="12" r="1.5"/><circle cx="12" cy="19" r="1.5"/></svg></button></td>
          </tr>

          <!-- Row 3 -->
          <tr>
            <td>
              <div class="tx-cell">
                <div class="tx-icon out">
                  <svg viewBox="0 0 24 24" fill="none" stroke="#DC2626" stroke-width="2.2"><path d="M12 19V5m7 7l-7-7-7 7"/></svg>
                </div>
                <div>
                  <div class="tx-date-main">30 Mei 2024</div>
                  <div class="tx-date-time">10:20</div>
                </div>
              </div>
            </td>
            <td>
              <div class="tx-desc">Penarikan saldo ke Bank BCA (•••• 1234)</div>
            </td>
            <td><span class="cat-badge penarikan">Penarikan</span></td>
            <td><span class="status-badge berhasil">Berhasil</span></td>
            <td><span class="amount-out">- Rp1.000.000</span></td>
            <td><span class="saldo-akhir">Rp5.780.000</span></td>
            <td><button class="more-btn"><svg viewBox="0 0 24 24" fill="currentColor"><circle cx="12" cy="5" r="1.5"/><circle cx="12" cy="12" r="1.5"/><circle cx="12" cy="19" r="1.5"/></svg></button></td>
          </tr>

          <!-- Row 4 -->
          <tr>
            <td>
              <div class="tx-cell">
                <div class="tx-icon fee">
                  <svg viewBox="0 0 24 24" fill="none" stroke="#D97706" stroke-width="1.8"><rect x="3" y="3" width="18" height="18" rx="3"/><path d="M9 9h6M9 12h4"/></svg>
                </div>
                <div>
                  <div class="tx-date-main">29 Mei 2024</div>
                  <div class="tx-date-time">09:15</div>
                </div>
              </div>
            </td>
            <td>
              <div class="tx-desc">Biaya layanan aplikasi (3%)</div>
              <div class="tx-sub">#INV-2405-0126</div>
            </td>
            <td><span class="cat-badge biaya">Biaya</span></td>
            <td><span class="status-badge berhasil">Berhasil</span></td>
            <td><span class="amount-out">- Rp22.500</span></td>
            <td><span class="saldo-akhir">Rp6.780.000</span></td>
            <td><button class="more-btn"><svg viewBox="0 0 24 24" fill="currentColor"><circle cx="12" cy="5" r="1.5"/><circle cx="12" cy="12" r="1.5"/><circle cx="12" cy="19" r="1.5"/></svg></button></td>
          </tr>

          <!-- Row 5 -->
          <tr>
            <td>
              <div class="tx-cell">
                <div class="tx-icon in">
                  <svg viewBox="0 0 24 24" fill="none" stroke="#16A34A" stroke-width="2.2"><path d="M12 5v14m-7-7l7 7 7-7"/></svg>
                </div>
                <div>
                  <div class="tx-date-main">28 Mei 2024</div>
                  <div class="tx-date-time">18:45</div>
                </div>
              </div>
            </td>
            <td>
              <div class="tx-desc">Pembayaran pesanan #INV-2405-0123</div>
              <div class="tx-sub">Dewi Nur A.</div>
            </td>
            <td><span class="cat-badge masuk">Pemasukan</span></td>
            <td><span class="status-badge berhasil">Berhasil</span></td>
            <td><span class="amount-in">+ Rp48.000</span></td>
            <td><span class="saldo-akhir">Rp6.802.500</span></td>
            <td><button class="more-btn"><svg viewBox="0 0 24 24" fill="currentColor"><circle cx="12" cy="5" r="1.5"/><circle cx="12" cy="12" r="1.5"/><circle cx="12" cy="19" r="1.5"/></svg></button></td>
          </tr>
        </tbody>
      </table>
    </div>

    <!-- Right: Recent Withdrawal -->
    <div class="recent-withdraw">
      <div class="rw-title">Penarikan Terakhir</div>

      <div class="rw-bank-icon">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M3 21h18M3 10h18M5 6l7-3 7 3M4 10v11M20 10v11M8 10v11M12 10v11M16 10v11"/></svg>
      </div>

      <div class="rw-amount">Rp1.000.000</div>
      <div class="rw-date">30 Mei 2024, 10:20</div>

      <div class="rw-status">
        <span class="status-badge berhasil">Berhasil</span>
      </div>

      <div class="rw-details">
        <div class="rw-detail-row">
          <span class="rw-detail-key">Rekening Tujuan</span>
          <span class="rw-detail-val">BCA (•••• 1234)</span>
        </div>
        <div class="rw-detail-row">
          <span class="rw-detail-key">Atas Nama</span>
          <span class="rw-detail-val">Laundry Bersih Jaya</span>
        </div>
        <div class="rw-detail-row">
          <span class="rw-detail-key">No. Referensi</span>
          <span class="rw-detail-val">WD-2405-0032</span>
        </div>
      </div>

      <div class="rw-link">
        Lihat Semua Penarikan
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 18l6-6-6-6"/></svg>
      </div>
    </div>
  </div>

  <!-- Security Banner -->
  <div class="security-banner">
    <div class="security-left">
      <div class="security-icon">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
      </div>
      <div class="security-text">
        <h4>Keamanan Saldo Terjamin</h4>
        <p>Saldo Anda aman bersama kami. Penarikan hanya dapat dilakukan ke rekening bank yang telah terverifikasi.</p>
      </div>
    </div>
    <button class="btn-manage-bank">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="2" y="5" width="20" height="14" rx="3"/><path d="M2 10h20"/></svg>
      Kelola Rekening Bank
    </button>
  </div>

</main>
@endsection
