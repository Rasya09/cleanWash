@section('css-sidebar')
  <link rel="stylesheet" href="{{ asset('assets/css/mitra/sidebar.css') }}">
@endsection

<style>
    /* ── SIDEBAR ── */
  .sidebar {
    width: var(--sidebar-width);
    background: var(--white);
    height: 100vh;
    position: fixed;
    top: 0; left: 0;
    display: flex;
    flex-direction: column;
    border-right: 1px solid var(--neutral-100);
    z-index: 100;
    overflow-y: auto;
  }

  .sidebar-logo {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 18px 16px;
    border-bottom: 1px solid var(--neutral-100);
  }

  .logo-icon {
    width: 38px; height: 38px;
    background: var(--primary);
    border-radius: 10px;
    display: flex; align-items: center; justify-content: center;
    color: white; font-size: 18px;
  }

  .logo-text { line-height: 1.2; }
  .logo-text .name { font-weight: 700; font-size: 13px; color: var(--neutral); }
  .logo-text .sub { font-size: 11px; color: var(--neutral-500); }

  .sidebar-nav { padding: 12px 0; flex: 1; }

  .nav-section-label {
    font-size: 10px; font-weight: 600;
    color: var(--neutral-500);
    letter-spacing: 0.8px;
    text-transform: uppercase;
    padding: 12px 16px 4px;
  }

  .nav-item {
    display: flex; align-items: center; gap: 10px;
    padding: 9px 16px;
    font-size: 13px; font-weight: 500;
    color: var(--neutral-500);
    cursor: pointer;
    border-radius: 0;
    transition: all 0.15s;
    text-decoration: none;
  }

  .nav-item:hover { background: var(--neutral-50); color: var(--primary); }

  .nav-item.active {
    background: var(--primary-light);
    color: var(--primary);
    font-weight: 600;
    border-right: 3px solid var(--primary);
  }

  .nav-item svg { flex-shrink: 0; opacity: 0.7; }
  .nav-item.active svg { opacity: 1; }

  .sidebar-help {
    margin: 12px;
    background: linear-gradient(135deg, #e0f2fe 0%, #eff6ff 100%);
    border-radius: var(--radius-md);
    padding: 14px;
    position: relative;
    overflow: hidden;
  }

  .help-title { font-size: 12px; font-weight: 700; color: var(--neutral); }
  .help-sub { font-size: 11px; color: var(--neutral-500); margin-bottom: 10px; }

  .btn-help {
    background: var(--primary);
    color: white;
    border: none;
    padding: 7px 16px;
    border-radius: 8px;
    font-size: 12px; font-weight: 600;
    cursor: pointer;
    font-family: 'Poppins', sans-serif;
  }

  .help-avatar {
    position: absolute; right: 10px; bottom: 0;
    font-size: 32px;
    line-height: 1;
  }
</style>

<!-- ═══ SIDEBAR ═══ -->
<aside class="sidebar">
    <a href="{{ route('home-mitra') }}">
        <div class="sidebar-logo">
            <div class="logo-icon">🧺</div>
            <div class="logo-text">
            <div class="name">Mitra Laundry</div>
            <div class="sub">Dashboard</div>
        </div>
    </div>
    </a>

  <nav class="sidebar-nav">
    <div class="nav-section-label">Pesanan</div>
    <a class="nav-item active" href="{{ route('pesanan-saya') }}">
      <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
      Pesanan Saya
    </a>
    <a class="nav-item" href="{{ route('gagal-pickup') }}">
      <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
      Gagal Pickup/Pembatalan
    </a>
    <a class="nav-item" href="{{ route('pengaturan-pengiriman') }}">
      <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
      Pengaturan Pengiriman
    </a>

    <div class="nav-section-label">Layanan</div>
    <a class="nav-item" href="{{ route('layanan-saya') }}">
      <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M9 9h6M9 12h6M9 15h4"/></svg>
      Layanan Saya
    </a>
    <a class="nav-item" href="{{ route('tambah-layanan') }}">
      <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M12 4v16m8-8H4"/></svg>
      Tambah Layanan
    </a>

    <div class="nav-section-label">Pusat Promosi</div>
    <a class="nav-item" href="{{ route('gambar-toko') }}">
      <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><polygon points="23 7 16 12 23 17 23 7"/><rect x="1" y="5" width="15" height="14" rx="2" ry="2"/></svg>
      Gambar Toko
    </a>
    <a class="nav-item" href="{{ route('diskon') }}">
      <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M7 7h10M7 12h6"/><rect x="2" y="3" width="20" height="18" rx="2"/></svg>
      Diskon
    </a>
    <a class="nav-item" href="{{ route('voucher-toko') }}">
      <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M20 12V22H4V12M22 7H2v5h20V7zM12 22V7M12 7H7.5a2.5 2.5 0 010-5C11 2 12 7 12 7zM12 7h4.5a2.5 2.5 0 000-5C13 2 12 7 12 7z"/></svg>
      Voucher Toko Saya
    </a>

    <div class="nav-section-label">Layanan Customer</div>
    <a class="nav-item" href="{{ route('penilaian-toko') }}">
      <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/></svg>
      Penilaian Toko
    </a>
    <a class="nav-item" href="{{ route('manajemen-chat') }}">
      <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
      Manajemen Chat
    </a>

    <div class="nav-section-label">Keuangan</div>
    <a class="nav-item" href="{{ route('penghasilan-saya') }}">
      <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 000 7h5a3.5 3.5 0 010 7H6"/></svg>
      Penghasilan Saya
    </a>
    <a class="nav-item" href="{{ route('saldo-saya') }}">
      <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><rect x="2" y="5" width="20" height="14" rx="2"/><line x1="2" y1="10" x2="22" y2="10"/></svg>
      Saldo Saya
    </a>
    <a class="nav-item" href="{{ route('rekening-bank') }}">
      <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
      Rekening Bank
    </a>

    <div class="nav-section-label">Data</div>
    <a class="nav-item" href="{{ route('performa-toko') }}">
      <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
      Performa Toko
    </a>
    <a class="nav-item" href="{{ route('kesehatan-toko') }}">
      <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"/></svg>
      Kesehatan Toko
    </a>
  </nav>

  <div class="sidebar-help">
    <div class="help-title">Butuh bantuan?</div>
    <div class="help-sub">Kunjungi Pusat Bantuan</div>
    <button class="btn-help">Pusat Bantuan</button>
    <div class="help-avatar">🎧</div>
  </div>
</aside>