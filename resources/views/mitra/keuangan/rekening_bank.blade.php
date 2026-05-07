@extends('mitra.layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/mitra/rekening_bank.css') }}">
@endsection

@section('content')
    <!-- MAIN -->
<main class="main">

  <!-- Page Header -->
  <div class="page-header">
    <div class="page-title">
      <h1>Rekening Bank</h1>
      <p>Kelola rekening bank untuk pencairan saldo dan transaksi keuangan</p>
    </div>
    <button class="btn-primary">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M12 4v16m8-8H4"/></svg>
      Tambah Rekening
    </button>
  </div>

  <!-- Stats Grid -->
  <div class="stats-grid">
    <!-- Total Rekening -->
    <div class="stat-card">
      <div class="stat-icon blue">
        <svg viewBox="0 0 24 24" fill="none" stroke="#2563EB" stroke-width="1.6">
          <path d="M3 21h18M3 10h18M5 6l7-3 7 3M4 10v11M20 10v11M8 10v11M12 10v11M16 10v11"/>
        </svg>
      </div>
      <div class="stat-info">
        <div class="stat-label">Total Rekening</div>
        <div class="stat-value">2</div>
        <div class="stat-sub">Rekening terdaftar</div>
      </div>
    </div>

    <!-- Rekening Aktif -->
    <div class="stat-card">
      <div class="stat-icon green">
        <svg viewBox="0 0 24 24" fill="none" stroke="#16A34A" stroke-width="1.8">
          <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
        </svg>
      </div>
      <div class="stat-info">
        <div class="stat-label">Rekening Aktif</div>
        <div class="stat-value">1</div>
        <div class="stat-sub">Siap untuk pencairan</div>
      </div>
    </div>

    <!-- Rekening Nonaktif -->
    <div class="stat-card">
      <div class="stat-icon orange">
        <svg viewBox="0 0 24 24" fill="none" stroke="#D97706" stroke-width="1.8">
          <circle cx="12" cy="12" r="9"/>
          <path d="M12 7v5l3 3"/>
        </svg>
      </div>
      <div class="stat-info">
        <div class="stat-label">Rekening Nonaktif</div>
        <div class="stat-value">1</div>
        <div class="stat-sub">Tidak aktif</div>
      </div>
    </div>

    <!-- Pencairan Tertunda -->
    <div class="stat-card">
      <div class="stat-icon purple">
        <svg viewBox="0 0 24 24" fill="none" stroke="#7C3AED" stroke-width="1.8">
          <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>
        </svg>
      </div>
      <div class="stat-info">
        <div class="stat-label">Pencairan Tertunda</div>
        <div class="stat-value large">Rp0</div>
        <div class="stat-sub">Tidak ada pencairan tertunda</div>
      </div>
    </div>
  </div>

  <!-- Info Banner -->
  <div class="info-banner">
    <div class="info-banner-left">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <circle cx="12" cy="12" r="10"/>
        <path d="M12 8v4m0 4h.01"/>
      </svg>
      <div class="info-banner-text">
        <h4>Pastikan informasi rekening sudah benar</h4>
        <p>Dana akan dicairkan ke rekening utama yang berstatus aktif.</p>
      </div>
    </div>
    <button class="info-banner-link">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <circle cx="12" cy="12" r="10"/>
        <path d="M12 8v4m0 4h.01"/>
      </svg>
      Pelajari lebih lanjut
    </button>
  </div>

  <!-- Account Table -->
  <div class="account-section">
    <div class="account-section-header">
      <h3>Daftar Rekening Bank</h3>
    </div>
    <table class="account-table">
      <thead>
        <tr>
          <th>Bank</th>
          <th>No. Rekening</th>
          <th>Atas Nama</th>
          <th>Jenis Rekening</th>
          <th>Status</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <!-- BCA Row -->
        <tr>
          <td>
            <div class="bank-cell">
              <div class="bank-logo">
                <div class="bca-logo">
                  <!-- BCA simplified shield -->
                  <svg width="14" height="16" viewBox="0 0 14 16" fill="none">
                    <path d="M7 0L14 3.5V10C14 13 10.5 15.5 7 16C3.5 15.5 0 13 0 10V3.5L7 0Z" fill="#003d82"/>
                    <path d="M4 8C4 6.34 5.34 5 7 5C8.66 5 10 6.34 10 8C10 9.66 8.66 11 7 11C5.34 11 4 9.66 4 8Z" fill="white" opacity="0.9"/>
                  </svg>
                  <span class="bca-text">BCA</span>
                </div>
              </div>
              <div>
                <div class="bank-info-name">
                  Bank BCA
                  <span class="utama-badge">Utama</span>
                </div>
                <div class="bank-info-sub">PT Bank Central Asia Tbk</div>
              </div>
            </div>
          </td>
          <td>
            <div class="acc-num-main">1234 5678 9012</div>
            <div class="acc-num-masked">
              •••• •••• 9012
              <button class="copy-btn" title="Salin nomor rekening">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="9" y="9" width="13" height="13" rx="2"/><path d="M5 15H4a2 2 0 01-2-2V4a2 2 0 012-2h9a2 2 0 012 2v1"/></svg>
              </button>
            </div>
          </td>
          <td>Laundry Bersih Jaya</td>
          <td>Rekening Perusahaan</td>
          <td>
            <div class="status-aktif">Aktif</div>
            <div class="status-desc">Rekening utama untuk<br>pencairan</div>
          </td>
          <td>
            <button class="more-btn">
              <svg viewBox="0 0 24 24" fill="currentColor"><circle cx="12" cy="5" r="1.5"/><circle cx="12" cy="12" r="1.5"/><circle cx="12" cy="19" r="1.5"/></svg>
            </button>
          </td>
        </tr>

        <!-- Mandiri Row -->
        <tr>
          <td>
            <div class="bank-cell">
              <div class="bank-logo">
                <div class="mandiri-logo">
                  <div class="mandiri-bars">
                    <div class="mandiri-bar"></div>
                    <div class="mandiri-bar"></div>
                    <div class="mandiri-bar"></div>
                    <div class="mandiri-bar"></div>
                    <div class="mandiri-bar"></div>
                  </div>
                  <span class="mandiri-name">mandiri</span>
                </div>
              </div>
              <div>
                <div class="bank-info-name">Bank Mandiri</div>
                <div class="bank-info-sub">PT Bank Mandiri (Persero) Tbk</div>
              </div>
            </div>
          </td>
          <td>
            <div class="acc-num-main">9876 5432 1098</div>
            <div class="acc-num-masked">
              •••• •••• 1098
              <button class="copy-btn" title="Salin nomor rekening">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="9" y="9" width="13" height="13" rx="2"/><path d="M5 15H4a2 2 0 01-2-2V4a2 2 0 012-2h9a2 2 0 012 2v1"/></svg>
              </button>
            </div>
          </td>
          <td>Laundry Bersih Jaya</td>
          <td>Rekening Perusahaan</td>
          <td>
            <div class="status-nonaktif">Nonaktif</div>
            <div class="status-desc">Tidak digunakan untuk<br>pencairan</div>
          </td>
          <td>
            <button class="more-btn">
              <svg viewBox="0 0 24 24" fill="currentColor"><circle cx="12" cy="5" r="1.5"/><circle cx="12" cy="12" r="1.5"/><circle cx="12" cy="19" r="1.5"/></svg>
            </button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>

  <!-- Terms Section -->
  <div class="terms-section">
    <div class="terms-header">
      <div class="terms-header-left">
        <div class="terms-shield-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
          </svg>
        </div>
        <span class="terms-title">Syarat &amp; Ketentuan Rekening Bank</span>
      </div>
      <span class="terms-link">Lihat Syarat Lengkap</span>
    </div>

    <div class="terms-grid">
      <!-- Item 1 -->
      <div class="terms-item">
        <div class="terms-item-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
            <path d="M12 8v4m0 4h.01"/>
          </svg>
        </div>
        <div>
          <div class="terms-item-title">Rekening atas nama bisnis</div>
          <div class="terms-item-desc">Pastikan rekening bank yang didaftarkan atas nama bisnis/toko Anda.</div>
        </div>
      </div>

      <!-- Item 2 -->
      <div class="terms-item">
        <div class="terms-item-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
            <path d="M9 12l2 2 4-4"/>
            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
          </svg>
        </div>
        <div>
          <div class="terms-item-title">Rekening aktif</div>
          <div class="terms-item-desc">Pastikan rekening dalam kondisi aktif dan tidak diblokir.</div>
        </div>
      </div>

      <!-- Item 3 -->
      <div class="terms-item">
        <div class="terms-item-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
            <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2"/>
            <rect x="9" y="3" width="6" height="4" rx="1"/>
            <path d="M9 12h6m-6 4h4"/>
          </svg>
        </div>
        <div>
          <div class="terms-item-title">Informasi valid</div>
          <div class="terms-item-desc">Informasi rekening yang salah dapat menyebabkan pencairan gagal.</div>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer Help -->
  <div class="help-footer">
    Butuh bantuan? Hubungi <a href="#">Layanan Mitra</a>
  </div>

</main>

@endsection
