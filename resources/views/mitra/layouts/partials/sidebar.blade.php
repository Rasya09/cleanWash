<link rel="stylesheet" href="{{ asset('assets/css/mitra/sidebar.css') }}">


<!-- ═══ SIDEBAR ═══ -->
<aside class="sidebar">
    <div class="sidebar-logo">
        <a href="{{ route('mitra.dashboard') }}" class="nav-brand" style="display: flex; align-items: center; text-decoration: none;">
            <img class="nav-logo-icon" src="{{ asset('assets/images/CW.png') }}" alt="Clean Wash Logo" style="height: 40px; width: auto;" />
        </a>
    </div>

  <nav class="sidebar-nav">
    <div class="nav-section-label">Pesanan</div>
    <a class="nav-item {{ request()->routeIs('mitra.pesanan') ? 'active' : '' }}" href="{{ route('mitra.pesanan') }}">
      <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
      Pesanan Saya
    </a>
    <a class="nav-item {{ request()->routeIs('mitra.gagal-pickup') ? 'active' : '' }}" href="{{ route('mitra.gagal-pickup') }}">
      <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
      Gagal Pickup/Pembatalan
    </a>

    <div class="nav-section-label">Layanan</div>
    <a class="nav-item {{ request()->routeIs('mitra.layanan') ? 'active' : '' }}" href="{{ route('mitra.layanan') }}">
      <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M9 9h6M9 12h6M9 15h4"/></svg>
      Layanan Saya
    </a>
    <a class="nav-item {{ request()->routeIs('mitra.tambah-layanan') ? 'active' : '' }}" href="{{ route('mitra.tambah-layanan') }}">
      <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M12 4v16m8-8H4"/></svg>
      Tambah Layanan
    </a>

    <div class="nav-section-label">Pusat Promosi</div>
    <a class="nav-item {{ request()->routeIs('mitra.gambar') ? 'active' : '' }}" href="{{ route('mitra.gambar') }}">
      <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><polygon points="23 7 16 12 23 17 23 7"/><rect x="1" y="5" width="15" height="14" rx="2" ry="2"/></svg>
      Gambar Toko
    </a>

    <div class="nav-section-label">Layanan Customer</div>
    <a class="nav-item {{ request()->routeIs('mitra.penilaian') ? 'active' : '' }}" href="{{ route('mitra.penilaian') }}">
      <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.１１８l-3.976-2.888c-.784-.57-.38-１．８１.588-１．８１h4．９１４a１ １ ０ ００．９５１-.６９l１．５１９-４．６７４z"/></svg>
      Penilaian Toko
    </a>
    <a class="nav-item {{ request()->routeIs('mitra.chat') ? 'active' : '' }}" href="{{ route('mitra.chat') }}">
      <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
      Manajemen Chat
    </a>

    <div class="nav-section-label">Keuangan</div>

    <a class="nav-item {{ request()->routeIs('mitra.saldo') ? 'active' : '' }}" href="{{ route('mitra.saldo') }}">
      <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><rect x="2" y="5" width="20" height="14" rx="2"/><line x1="2" y1="10" x2="22" y2="10"/></svg>
      Saldo Saya
    </a>
    <a class="nav-item {{ request()->routeIs('mitra.rekening') ? 'active' : '' }}" href="{{ route('mitra.rekening') }}">
      <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
      Rekening Bank
    </a>

  </nav>

  <div class="sidebar-help">
    <div class="help-title">Butuh bantuan?</div>
    <div class="help-sub">Kunjungi Pusat Bantuan</div>
    <button class="btn-help">Pusat Bantuan</button>
    <div class="help-avatar">🎧</div>
  </div>
</aside>
