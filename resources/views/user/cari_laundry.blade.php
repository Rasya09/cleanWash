@extends('user.layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/cari_laundry.css') }}">
@endsection

@section('content')
<!-- ===== HERO ===== -->
<section class="section-hero">
  <div class="hero-grid-bg"></div>
  <div class="hero-glow"></div>
  <span class="hero-badge">12 mitra tersedia di sekitar kamu</span>
  <h1 class="hero-title">
    Temukan laundry terpercaya<br>
    sesuai lokasi &amp; kebutuhan Anda
  </h1>
  <p class="hero-desc">
    Bandingkan harga, layanan, dan ulasan dari ratusan mitra laundry terdekat
  </p>

  <div class="search-bar">
    <span class="search-icon">🔍</span>
    <input class="search-input" type="text" placeholder="Cari laundry di sekitar kamu…" />
    <div class="search-divider"></div>
    <button class="search-btn">Cari</button>
  </div>

  <div class="location-info">
    <span>Lokasi terdeteksi:</span>
    <strong>Sukamulya, Kec. Cinambo, Kota Bandung</strong>
    <span>· Menampilkan dalam radius 5 km</span>
  </div>
</section>

<!-- ===== MAIN BODY ===== -->
<div class="body-layout">

  <!-- Mobile filter toggle -->
  <button class="filter-toggle-btn" id="filterToggle">
    🔧 Tampilkan Filter Pencarian
  </button>

  <!-- ===== SIDEBAR FILTER ===== -->
  <aside class="sidebar" id="sidebar">
    <div class="sidebar-title">FILTER PENCARIAN</div>

    <div class="filter-section">
      <div class="filter-label">Urutkan</div>
      <select class="filter-select">
        <option>Terdekat dari lokasi</option>
        <option>Rating tertinggi</option>
        <option>Harga termurah</option>
      </select>
    </div>

    <div class="filter-divider"></div>

    <div class="filter-section">
      <div class="filter-label">Layanan</div>
      <button class="filter-chip active">
        <span>Semua Layanan</span>
        <span class="filter-chip-count">12</span>
      </button>
      <button class="filter-chip">
        <span>Antar Jemput</span>
        <span class="filter-chip-count">8</span>
      </button>
      <button class="filter-chip">
        <span>Cuci Express</span>
        <span class="filter-chip-count">10</span>
      </button>
      <button class="filter-chip">
        <span>Cuci Sepatu</span>
        <span class="filter-chip-count">6</span>
      </button>
    </div>

    <div class="filter-divider"></div>

    <div class="filter-section">
      <div class="filter-label">Status</div>
      <div class="filter-status-row">
        <button class="btn-status primary">Semua</button>
        <button class="btn-status outline">Buka Sekarang</button>
      </div>
    </div>

    <div class="filter-divider"></div>

    <div class="filter-section">
      <div class="filter-label">Harga Maksimal / kg</div>
      <div class="price-range">
        <input type="range" min="5000" max="12000" value="12000" class="price-slider" />
        <div class="price-labels">
          <span>Rp 5.000</span>
          <span>Rp 12.000</span>
        </div>
      </div>
    </div>

    <div class="filter-divider"></div>

    <button class="btn-reset">↺ Reset Filter</button>
  </aside>

  <!-- ===== RESULTS ===== -->
  <section class="results-area">
    <div class="results-header">
      Menampilkan <b>4 dari 12</b> mitra laundry ditemukan
    </div>

    <!-- Card 1 -->
    <article class="laundry-card">
      <div class="card-image-area">
        <span class="card-image-emoji">🏬</span>
        <span class="card-corner-badge">🏆 #1 Terbaik</span>
      </div>
      <div class="card-content">
        <div class="card-head">
          <div class="card-name">UBR Laundry 1</div>
          <span class="card-distance-badge">📍 1 – 2 km</span>
        </div>
        <div class="card-rating-row">
          <span class="card-stars">★★★★★</span>
          <span class="card-rating-num">5.0</span>
          <span class="card-rating-count">(200 ulasan)</span>
        </div>
        <div class="card-address">
          <span>📍</span>
          <span>Jl. Sukamulya IV, Sukamulya, Kec. Cinambo, Kota Bandung, Jawa Barat</span>
        </div>
        <div class="card-status">
          <span class="status-dot"></span>
          <span class="span-time"><b>Buka</b> · 09:00 – 22:00</span>
        </div>
        <div class="card-footer">
          <div class="card-tags-row">
            <span class="service-tag tag-pickup">🛵 Antar Jemput</span>
            <span class="service-tag tag-express">⚡ Cuci Express</span>
            <span class="service-tag tag-shoes">👟 Cuci Sepatu</span>
          </div>
          <div class="card-price-block">
            <div>
              <div class="price-label">Mulai dari</div>
              <div class="price-amount">Rp 7.000<span class="unit">/kg</span></div>
            </div>
            <button class="btn-detail-card">Lihat Detail →</button>
          </div>
        </div>
      </div>
    </article>

    <!-- Card 2 -->
    <article class="laundry-card">
      <div class="card-image-area v2">
        <span class="card-image-emoji">🧺</span>
        <span class="card-corner-badge">⭐ Populer</span>
      </div>
      <div class="card-content">
        <div class="card-head">
          <div class="card-name">UBR Laundry 2</div>
          <span class="card-distance-badge">📍 1 – 2 km</span>
        </div>
        <div class="card-rating-row">
          <span class="card-stars">★★★★★</span>
          <span class="card-rating-num">5.0</span>
          <span class="card-rating-count">(200 ulasan)</span>
        </div>
        <div class="card-address">
          <span>📍</span>
          <span>Jl. Sukamulya IV, Sukamulya, Kec. Cinambo, Kota Bandung, Jawa Barat</span>
        </div>
        <div class="card-status">
          <span class="status-dot"></span>
          <span class="span-time"><b>Buka</b> · 09:00 – 22:00</span>
        </div>
        <div class="card-footer">
          <div class="card-tags-row">
            <span class="service-tag tag-pickup">🛵 Antar Jemput</span>
            <span class="service-tag tag-express">⚡ Cuci Express</span>
            <span class="service-tag tag-shoes">👟 Cuci Sepatu</span>
          </div>
          <div class="card-price-block">
            <div>
              <div class="price-label">Mulai dari</div>
              <div class="price-amount">Rp 7.000<span class="unit">/kg</span></div>
            </div>
            <button class="btn-detail-card">Lihat Detail →</button>
          </div>
        </div>
      </div>
    </article>

    <!-- Card 3 -->
    <article class="laundry-card">
      <div class="card-image-area v3">
        <span class="card-image-emoji">🫧</span>
        <span class="card-corner-badge">💨 Express</span>
      </div>
      <div class="card-content">
        <div class="card-head">
          <div class="card-name">UBR Laundry 3</div>
          <span class="card-distance-badge">📍 1 – 2 km</span>
        </div>
        <div class="card-rating-row">
          <span class="card-stars">★★★★★</span>
          <span class="card-rating-num">5.0</span>
          <span class="card-rating-count">(200 ulasan)</span>
        </div>
        <div class="card-address">
          <span>📍</span>
          <span>Jl. Sukamulya IV, Sukamulya, Kec. Cinambo, Kota Bandung, Jawa Barat</span>
        </div>
        <div class="card-status">
          <span class="status-dot"></span>
          <span class="span-time"><b>Buka</b> · 09:00 – 22:00</span>
        </div>
        <div class="card-footer">
          <div class="card-tags-row">
            <span class="service-tag tag-pickup">🛵 Antar Jemput</span>
            <span class="service-tag tag-express">⚡ Cuci Express</span>
            <span class="service-tag tag-shoes">👟 Cuci Sepatu</span>
          </div>
          <div class="card-price-block">
            <div>
              <div class="price-label">Mulai dari</div>
              <div class="price-amount">Rp 7.000<span class="unit">/kg</span></div>
            </div>
            <button class="btn-detail-card">Lihat Detail →</button>
          </div>
        </div>
      </div>
    </article>

    <!-- Card 4 -->
    <article class="laundry-card">
      <div class="card-image-area v4">
        <span class="card-image-emoji">👕</span>
        <span class="card-corner-badge">🆕 Baru</span>
      </div>
      <div class="card-content">
        <div class="card-head">
          <div class="card-name">UBR Laundry 4</div>
          <span class="card-distance-badge">📍 1 – 2 km</span>
        </div>
        <div class="card-rating-row">
          <span class="card-stars">★★★★★</span>
          <span class="card-rating-num">5.0</span>
          <span class="card-rating-count">(200 ulasan)</span>
        </div>
        <div class="card-address">
          <span>📍</span>
          <span>Jl. Sukamulya IV, Sukamulya, Kec. Cinambo, Kota Bandung, Jawa Barat</span>
        </div>
        <div class="card-status">
          <span class="status-dot"></span>
          <span class="span-time"><b>Buka</b> · 09:00 – 22:00</span>
        </div>
        <div class="card-footer">
          <div class="card-tags-row">
            <span class="service-tag tag-pickup">🛵 Antar Jemput</span>
            <span class="service-tag tag-express">⚡ Cuci Express</span>
            <span class="service-tag tag-iron">🧴 Setrika</span>
          </div>
          <div class="card-price-block">
            <div>
              <div class="price-label">Mulai dari</div>
              <div class="price-amount">Rp 7.000<span class="unit">/kg</span></div>
            </div>
            <button class="btn-detail-card">Lihat Detail →</button>
          </div>
        </div>
      </div>
    </article>

    <!-- Pagination -->
    <div class="pagination">
      <button class="page-btn disabled">‹</button>
      <button class="page-btn active">1</button>
      <button class="page-btn">2</button>
      <button class="page-btn">3</button>
      <button class="page-btn">›</button>
    </div>
  </section>
</div>
@endsection

@push('scripts')
    <script>
        /* ===== STATE ===== */
        let isLoggedIn = false;

        /* ===== HAMBURGER ===== */
        const hamburger = document.getElementById('hamburger');
        const mobileNav = document.getElementById('mobileNav');

        hamburger.addEventListener('click', () => {
            const isOpen = hamburger.classList.toggle('open');
            if (isOpen) {
            mobileNav.style.display = 'flex';
            requestAnimationFrame(() => mobileNav.classList.add('open'));
            } else {
            mobileNav.classList.remove('open');
            setTimeout(() => { mobileNav.style.display = 'none'; }, 250);
            }
        });

        function closeMobileNav() {
            hamburger.classList.remove('open');
            mobileNav.classList.remove('open');
            setTimeout(() => { mobileNav.style.display = 'none'; }, 250);
        }

        document.addEventListener('click', (e) => {
            if (!mobileNav.contains(e.target) && !hamburger.contains(e.target)) {
            if (mobileNav.classList.contains('open')) closeMobileNav();
            }
        });

        /* ===== DESKTOP DROPDOWN ===== */
        const desktopDropdown = document.getElementById('desktopDropdown');
        function toggleDropdown() {
            desktopDropdown.classList.toggle('open');
        }
        document.addEventListener('click', (e) => {
            const navUser = document.getElementById('navUserDesktop');
            if (navUser && !navUser.contains(e.target)) {
            desktopDropdown.classList.remove('open');
            }
        });

        /* ===== LOGIN / LOGOUT ===== */
        function updateUI() {
            const isMobile = window.innerWidth <= 1024;
            const navActionsDesktop    = document.getElementById('navActionsDesktop');
            const navUserDesktop       = document.getElementById('navUserDesktop');
            const mobileNavActions     = document.getElementById('mobileNavActions');
            const mobileUserProfile    = document.getElementById('mobileUserProfile');
            const mobileUserLinks      = document.getElementById('mobileUserLinks');
            const mobileProfileDivider = document.getElementById('mobileProfileDivider');

            if (isLoggedIn) {
            navActionsDesktop.style.display = 'none';
            navUserDesktop.style.display = isMobile ? 'none' : 'flex';
            mobileNavActions.classList.add('hidden');
            mobileUserProfile.classList.add('visible');
            mobileUserLinks.style.display = 'flex';
            mobileProfileDivider.style.display = 'block';
            } else {
            navActionsDesktop.style.display = isMobile ? 'none' : 'flex';
            navUserDesktop.style.display = 'none';
            mobileNavActions.classList.remove('hidden');
            mobileUserProfile.classList.remove('visible');
            mobileUserLinks.style.display = 'none';
            mobileProfileDivider.style.display = 'none';
            }
        }

        function simulateLogin() { isLoggedIn = true; updateUI(); }
        function simulateLogout() {
            isLoggedIn = false;
            desktopDropdown.classList.remove('open');
            updateUI();
        }
        window.addEventListener('resize', () => { if (isLoggedIn) updateUI(); });

        /* ===== FILTER TOGGLE (mobile) ===== */
        const filterToggle = document.getElementById('filterToggle');
        const sidebar = document.getElementById('sidebar');
        filterToggle.addEventListener('click', () => {
            const open = sidebar.classList.toggle('open');
            filterToggle.innerHTML = open ? '✕ Sembunyikan Filter' : '🔧 Tampilkan Filter Pencarian';
        });
    </script>
@endpush