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

  <form action="{{ route('cari-laundry') }}" method="GET" class="search-bar">
    <span class="search-icon">🔍</span>
    <input class="search-input" type="text" name="q" value="{{ request('q') }}" placeholder="Cari laundry di sekitar kamu…" />
    <div class="search-divider"></div>
    <button type="submit" class="search-btn">Cari</button>
  </form>

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
      Menampilkan <b>{{ $laundries->firstItem() ?? 0 }} - {{ $laundries->lastItem() ?? 0 }}</b> dari <b>{{ $laundries->total() }}</b> mitra laundry ditemukan
    </div>

    @forelse($laundries as $laundry)
    <!-- Laundry Card -->
    <article class="laundry-card">
      <div class="card-image-area">
        @if($laundry->logo)
            <img src="{{ asset('storage/' . $laundry->logo) }}" alt="{{ $laundry->store_name }}" style="width: 100%; height: 100%; object-fit: cover; border-radius: 12px 12px 0 0;">
        @else
            <span class="card-image-emoji">🏬</span>
        @endif
        @if($loop->first)
            <span class="card-corner-badge">🏆 #1 Terbaik</span>
        @endif
      </div>
      <div class="card-content">
        <div class="card-head">
          <div class="card-name">{{ $laundry->store_name }}</div>
          <span class="card-distance-badge">📍 {{ $laundry->city ?? 'Kota Tidak Set' }}</span>
        </div>
        <div class="card-rating-row">
          @php
            $avg = $laundry->averageRating();
            $rcount = $laundry->reviews()->where('status', 'ok')->count();
          @endphp
          <span class="card-stars">
            @for($i=1; $i<=5; $i++)
                {{ $i <= round($avg) ? '★' : '☆' }}
            @endfor
          </span>
          <span class="card-rating-num">{{ number_format($avg, 1) }}</span>
          <span class="card-rating-count">({{ $rcount }} ulasan)</span>
        </div>
        <div class="card-address">
          <span>📍</span>
          <span>{{ $laundry->address }}</span>
        </div>
        <div class="card-status">
          <span class="status-dot"></span>
          <span class="span-time"><b>Buka</b> · {{ $laundry->operational_hours ?? '09:00 – 22:00' }}</span>
        </div>
        <div class="card-footer">
          <div class="card-tags-row">
            @foreach($laundry->layanans->take(3) as $lay)
                <span class="service-tag">{{ $lay->nama }}</span>
            @endforeach
          </div>
          <div class="card-price-block">
            <div>
              <div class="price-label">Mulai dari</div>
              @php
                $minPrice = $laundry->layanans->min('harga') ?? 0;
              @endphp
              <div class="price-amount">Rp {{ number_format($minPrice, 0, ',', '.') }}<span class="unit">/{{ $laundry->layanans->first()?->satuan ?? 'kg' }}</span></div>
            </div>
            <a href="{{ route('user.detail-laundry', $laundry->id) }}" class="btn-detail-card" style="text-decoration: none;">Lihat Detail →</a>
          </div>
        </div>
      </div>
    </article>
    @empty
    <div class="empty-state" style="text-align: center; padding: 50px; grid-column: 1 / -1;">
        <div style="font-size: 50px; margin-bottom: 20px;">🔍</div>
        <h3>Tidak ada laundry ditemukan</h3>
        <p>Coba gunakan kata kunci pencarian lain.</p>
    </div>
    @endforelse

    <!-- Pagination -->
    <div class="pagination">
        {{ $laundries->links() }}
    </div>
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
    </script>
@endpush