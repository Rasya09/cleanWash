@extends('user.layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/cari_laundry.css') }}">
@endsection

@section('content')
<!-- ===== HERO ===== -->
<section class="section-hero">
  <div class="hero-grid-bg"></div>
  <div class="hero-glow"></div>
  <span class="hero-badge">{{ $laundries->count() }} mitra tersedia di sekitar kamu</span>
  <h1 class="hero-title">
    Temukan laundry terpercaya<br>
    sesuai lokasi &amp; kebutuhan Anda
  </h1>
  <p class="hero-desc">
    Bandingkan harga, layanan, dan ulasan dari ratusan mitra laundry terdekat
  </p>

  <form class="search-bar" method="GET" action="">
    <span class="search-icon">🔍</span>
    <input class="search-input" name="search" type="text" placeholder="Cari laundry di sekitar kamu…" value="{{ request('search') }}" />
    <div class="search-divider"></div>
    <button type="submit" class="search-btn">Cari</button>
  </form>
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
      Menampilkan <b>{{ $laundries->count() }}</b> mitra laundry ditemukan
    </div>

    @forelse($laundries as $laundry)
    <article class="laundry-card">
      <div class="card-image-area" style="background-image: url('{{ asset('storage/' . $laundry->logo) }}'); background-size: cover; background-position: center; border-right: 1px solid #eee;">
        @if($loop->first)
        <span class="card-corner-badge">🏆 #1 Terbaik</span>
        @elseif($loop->iteration == 2)
        <span class="card-corner-badge" style="background-color: var(--blue-subtle); color: var(--primary);">⭐ Populer</span>
        @endif
      </div>
      <div class="card-content">
        <div class="card-head">
          <div class="card-name">{{ $laundry->store_name }}</div>
          <span class="card-distance-badge">📍 1 – 2 km</span>
        </div>
        <div class="card-rating-row">
          <span class="card-stars">★★★★★</span>
          <span class="card-rating-num">5.0</span>
          <span class="card-rating-count">(Belum ada ulasan)</span>
        </div>
        <div class="card-address">
          <span>📍</span>
          <span>{{ $laundry->address }}, {{ $laundry->village }}, {{ $laundry->district }}, {{ $laundry->city }}, {{ $laundry->province }}</span>
        </div>
        <div class="card-status">
          <span class="status-dot"></span>
          <span class="span-time"><b>Buka</b> · {{ $laundry->open_time ?? '08:00' }} – {{ $laundry->close_time ?? '20:00' }}</span>
        </div>
        <div class="card-footer">
          <div class="card-tags-row">
            <span class="service-tag tag-pickup">🛵 Antar Jemput</span>
            <span class="service-tag tag-express">⚡ Cuci Express</span>
          </div>
          <div class="card-price-block">
            <div>
              <div class="price-label">Mulai dari</div>
              @php
                $minPrice = $laundry->layanans->min('harga') ?? 0;
              @endphp
              <div class="price-amount">Rp {{ number_format($minPrice, 0, ',', '.') }}<span class="unit">/{{ $laundry->layanans->first()?->satuan ?? 'kg' }}</span></div>
            </div>
            <a href="{{ route('user.detail-laundry') }}?id={{ $laundry->id }}" style="text-decoration: none;">
              <button class="btn-detail-card">Lihat Detail →</button>
            </a>
          </div>
        </div>
      </div>
    </article>
    @empty
    <div style="text-align: center; padding: 40px; color: #666;">
        Belum ada mitra laundry yang tersedia.
    </div>
    @endforelse

    <!-- Pagination -->
    @if($laundries->count() > 0)
    <div class="pagination">
      <button class="page-btn disabled">‹</button>
      <button class="page-btn active">1</button>
      <button class="page-btn disabled">›</button>
    </div>
    @endif
  </section>
</div>
@endsection

@push('scripts')
    <script>

        /* ===== FILTER TOGGLE (mobile) ===== */
        const filterToggle = document.getElementById('filterToggle');
        const sidebar = document.getElementById('sidebar');
        if (filterToggle && sidebar) {
            filterToggle.addEventListener('click', () => {
                const open = sidebar.classList.toggle('open');
                filterToggle.innerHTML = open ? '✕ Sembunyikan Filter' : '🔧 Tampilkan Filter Pencarian';
            });
        }

        // Interaksi filter layanan
        const filterChips = document.querySelectorAll('.filter-chip');
        if (filterChips.length > 0) {
            const btnSemuaLayanan = filterChips[0];
            const otherChips = Array.from(filterChips).slice(1);

            btnSemuaLayanan.addEventListener('click', () => {
                btnSemuaLayanan.classList.add('active');
                otherChips.forEach(chip => chip.classList.remove('active'));
            });

            otherChips.forEach(chip => {
                chip.addEventListener('click', () => {
                    chip.classList.toggle('active');
                    const anyActive = otherChips.some(c => c.classList.contains('active'));
                    if (anyActive) {
                        btnSemuaLayanan.classList.remove('active');
                    } else {
                        btnSemuaLayanan.classList.add('active');
                    }
                });
            });
        }

        // Interaksi filter status
        const btnStatuses = document.querySelectorAll('.btn-status');
        if (btnStatuses.length > 0) {
            btnStatuses.forEach(btn => {
                btn.addEventListener('click', () => {
                    btnStatuses.forEach(b => {
                        b.classList.remove('primary');
                        b.classList.add('outline');
                    });
                    btn.classList.remove('outline');
                    btn.classList.add('primary');
                });
            });
        }

        // Tombol reset filter
        const btnReset = document.querySelector('.btn-reset');
        const priceSlider = document.querySelector('.price-slider');
        const filterSelect = document.querySelector('.filter-select');

        if (btnReset) {
            btnReset.addEventListener('click', () => {
                if (filterChips.length > 0) {
                    filterChips[0].classList.add('active');
                    for (let i = 1; i < filterChips.length; i++) {
                        filterChips[i].classList.remove('active');
                    }
                }
                
                if (btnStatuses.length > 0) {
                    btnStatuses[0].classList.add('primary');
                    btnStatuses[0].classList.remove('outline');
                    if (btnStatuses[1]) {
                        btnStatuses[1].classList.remove('primary');
                        btnStatuses[1].classList.add('outline');
                    }
                }

                if (priceSlider) {
                    priceSlider.value = priceSlider.max;
                }

                if (filterSelect) {
                    filterSelect.selectedIndex = 0;
                }
            });
        }

        // Live search filter
        const searchInput = document.querySelector('.search-input');
        const laundryCards = document.querySelectorAll('.laundry-card');

        if (searchInput) {
            searchInput.addEventListener('input', function(e) {
                const keyword = e.target.value.toLowerCase();
                let visibleCount = 0;
                
                laundryCards.forEach(card => {
                    const name = card.querySelector('.card-name').innerText.toLowerCase();
                    if (name.includes(keyword)) {
                        card.style.display = 'block'; // Or flex/grid depending on original layout, usually block or flex. Let's use '' to reset to default.
                        card.style.display = '';
                        visibleCount++;
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        }
    </script>
@endpush