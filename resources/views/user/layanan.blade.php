@extends('user.layouts.app')

@section('css')
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:wght@500;600;700;800&family=Instrument+Sans:wght@400;500;600&family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('assets/css/layanan.css') }}?v={{ time() }}">
@endsection

@section('content')

<!-- ===== HERO ===== -->
<section class="section-hero">
  <div class="hero-grid-bg"></div>
  <div class="hero-glow"></div>
  <span class="hero-badge">6 Layanan Tersedia</span>
  <h1 class="hero-title">
    Layanan Laundry<br>
    <span class="highlight">Terlengkap</span> untuk Anda
  </h1>
  <p class="hero-desc">
    Dari cuci kiloan harian hingga perawatan khusus, semua tersedia dengan standar kebersihan terjamin.
  </p>
  <div class="stats-bar">
    <div class="stat-item">
      <span class="stat-num">500+</span>
      <span class="stat-label">Mitra Aktif</span>
    </div>
    <div class="stat-item">
      <span class="stat-num">50K+</span>
      <span class="stat-label">Pesanan Selesai</span>
    </div>
    <div class="stat-item">
      <span class="stat-num">4.9 ★</span>
      <span class="stat-label">Rating Rata-rata</span>
    </div>
    <div class="stat-item">
      <span class="stat-num">24 Jam</span>
      <span class="stat-label">Layanan Express</span>
    </div>
  </div>
</section>

<!-- ===== MAIN CONTENT ===== -->
<div class="content">

  <!-- Layanan Unggulan -->
  <div class="section-label-row">
    <span class="section-label">Layanan Unggulan</span>
    <div class="section-divider"></div>
  </div>

  <div class="featured-grid">

    <!-- Cuci Kiloan -->
    <div class="service-card">
      <div class="card-popular-badge">🔥 Terpopuler</div>
      <div class="card-image c-wash">
        <div class="card-circle"></div>
        <span class="card-emoji">🫧</span>
      </div>
      <div class="card-body">
        <div class="card-title">Cuci Kiloan</div>
        <div class="card-desc">Solusi cuci pakaian harian yang efisien. Dicuci bersih, dikeringkan, dan dikemas rapi.</div>
        <div class="card-tags">
          <span class="tag tag-default">Pilihan Utama</span>
          <span class="tag tag-green">Ramah Lingkungan</span>
        </div>
        <div class="card-pricing">
          <div>
            <div class="price-from">Mulai dari</div>
            <div><span class="price-val">Rp 7.000</span><span class="price-unit">/ kg</span></div>
          </div>
          <div style="text-align:right;">
            <div class="est-label">Estimasi</div>
            <div class="est-val">1–2 hari</div>
          </div>
        </div>
        <button class="btn-detail">Lihat Detail →</button>
      </div>
    </div>

    <!-- Cuci Satuan -->
    <div class="service-card">
      <div class="card-popular-badge">🔥 Terpopuler</div>
      <div class="card-image c-satuan">
        <div class="card-circle"></div>
        <span class="card-emoji">👗</span>
      </div>
      <div class="card-body">
        <div class="card-title">Cuci Satuan</div>
        <div class="card-desc">Untuk pakaian tertentu dengan perhitungan per item. Cocok untuk pakaian spesial.</div>
        <div class="card-tags">
          <span class="tag tag-default">Per Item</span>
          <span class="tag tag-yellow">Hati-hati</span>
        </div>
        <div class="card-pricing">
          <div>
            <div class="price-from">Mulai dari</div>
            <div><span class="price-val">Rp 8.000</span><span class="price-unit">/ pcs</span></div>
          </div>
          <div style="text-align:right;">
            <div class="est-label">Estimasi</div>
            <div class="est-val">1–2 hari</div>
          </div>
        </div>
        <button class="btn-detail">Lihat Detail →</button>
      </div>
    </div>

  </div>

  <!-- Layanan Lainnya -->
  <div class="section-label-row" style="margin-top: 8px;">
    <span class="section-label">Layanan Lainnya</span>
    <div class="section-divider"></div>
  </div>

  <div class="other-grid">

    <!-- Cuci Express -->
    <div class="service-card other-card">
      <div class="card-image c-express">
        <div class="card-circle"></div>
        <span class="card-emoji" style="font-size:52px;">⚡</span>
      </div>
      <div class="card-body">
        <div class="card-title-sm">Cuci Express</div>
        <div class="card-desc">Selesai lebih cepat dari layanan biasa. Ideal saat kamu butuh pakaian dalam waktu singkat.</div>
        <div class="card-tags">
          <span class="tag tag-default">6 Jam Selesai</span>
          <span class="tag tag-grey">Prioritas</span>
        </div>
        <div class="card-pricing">
          <div>
            <div class="price-from">Mulai dari</div>
            <div><span class="price-val">Rp 12.000</span><span class="price-unit">/ kg</span></div>
          </div>
          <div style="text-align:right;">
            <div class="est-label">Estimasi</div>
            <div class="est-val">6–12 jam</div>
          </div>
        </div>
        <button class="btn-detail">Lihat Detail →</button>
      </div>
    </div>

    <!-- Cuci Sepatu -->
    <div class="service-card other-card">
      <div class="card-image c-shoes">
        <div class="card-circle"></div>
        <span class="card-emoji" style="font-size:52px;">👟</span>
      </div>
      <div class="card-body">
        <div class="card-title-sm">Cuci Sepatu</div>
        <div class="card-desc">Perawatan sepatu agar tetap bersih dan awet. Dari sneakers hingga formal shoes.</div>
        <div class="card-tags">
          <span class="tag tag-default">Per Pasang</span>
          <span class="tag tag-green">Anti Jamur</span>
        </div>
        <div class="card-pricing">
          <div>
            <div class="price-from">Mulai dari</div>
            <div><span class="price-val">Rp 25.000</span><span class="price-unit">/ pasang</span></div>
          </div>
          <div style="text-align:right;">
            <div class="est-label">Estimasi</div>
            <div class="est-val">2–3 hari</div>
          </div>
        </div>
        <button class="btn-detail">Lihat Detail →</button>
      </div>
    </div>

    <!-- Cuci Tas -->
    <div class="service-card other-card">
      <div class="card-image c-bag">
        <div class="card-circle"></div>
        <span class="card-emoji" style="font-size:52px;">👜</span>
      </div>
      <div class="card-body">
        <div class="card-title-sm">Cuci Tas</div>
        <div class="card-desc">Bersihkan tas tanpa merusak bahan. Perawatan khusus sesuai material tas Anda.</div>
        <div class="card-tags">
          <span class="tag tag-default">Semua Material</span>
          <span class="tag tag-yellow">Perawatan Khusus</span>
        </div>
        <div class="card-pricing">
          <div>
            <div class="price-from">Mulai dari</div>
            <div><span class="price-val">Rp 30.000</span><span class="price-unit">/ tas</span></div>
          </div>
          <div style="text-align:right;">
            <div class="est-label">Estimasi</div>
            <div class="est-val">2–3 hari</div>
          </div>
        </div>
        <button class="btn-detail">Lihat Detail →</button>
      </div>
    </div>

    <!-- Cuci Karpet -->
    <div class="service-card other-card">
      <div class="card-image c-carpet">
        <div class="card-circle"></div>
        <span class="card-emoji" style="font-size:52px;">🪣</span>
      </div>
      <div class="card-body">
        <div class="card-title-sm">Cuci Karpet</div>
        <div class="card-desc">Untuk karpet dan item besar. Bersih hingga ke serat terdalam dengan mesin khusus.</div>
        <div class="card-tags">
          <span class="tag tag-default">Per m²</span>
          <span class="tag tag-green">Deep Clean</span>
        </div>
        <div class="card-pricing">
          <div>
            <div class="price-from">Mulai dari</div>
            <div><span class="price-val">Rp 15.000</span><span class="price-unit">/ m²</span></div>
          </div>
          <div style="text-align:right;">
            <div class="est-label">Estimasi</div>
            <div class="est-val">3–5 hari</div>
          </div>
        </div>
        <button class="btn-detail">Lihat Detail →</button>
      </div>
    </div>

    <!-- Setrika -->
    <div class="service-card other-card">
      <div class="card-image c-iron">
        <div class="card-circle"></div>
        <span class="card-emoji" style="font-size:52px;">♨️</span>
      </div>
      <div class="card-body">
        <div class="card-title-sm">Setrika</div>
        <div class="card-desc">Pakaian rapi dan wangi tanpa kerutan. Cocok untuk pakaian kerja dan formal harian.</div>
        <div class="card-tags">
          <span class="tag tag-default">Per Kg</span>
          <span class="tag tag-grey">Wangi Tahan Lama</span>
        </div>
        <div class="card-pricing">
          <div>
            <div class="price-from">Mulai dari</div>
            <div><span class="price-val">Rp 5.000</span><span class="price-unit">/ kg</span></div>
          </div>
          <div style="text-align:right;">
            <div class="est-label">Estimasi</div>
            <div class="est-val">1 hari</div>
          </div>
        </div>
        <button class="btn-detail">Lihat Detail →</button>
      </div>
    </div>

    <!-- Antar Jemput -->
    <div class="service-card other-card">
      <div class="card-image c-pickup">
        <div class="card-circle"></div>
        <span class="card-emoji" style="font-size:52px;">🛵</span>
      </div>
      <div class="card-body">
        <div class="card-title-sm">Antar Jemput</div>
        <div class="card-desc">Kami jemput dan antar pakaian langsung ke pintu rumah Anda. Tanpa perlu keluar!</div>
        <div class="card-tags">
          <span class="tag tag-green">Gratis Jemput</span>
          <span class="tag tag-yellow">Min. 3 kg</span>
        </div>
        <div class="card-pricing">
          <div>
            <div class="price-from">Biaya antar</div>
            <div><span class="price-val">Rp 5.000</span><span class="price-unit">/ km</span></div>
          </div>
          <div style="text-align:right;">
            <div class="est-label">Estimasi</div>
            <div class="est-val">Sama hari</div>
          </div>
        </div>
        <button class="btn-detail">Lihat Detail →</button>
      </div>
    </div>

  </div>

  <!-- CTA Banner -->
  <div class="cta-banner">
    <div class="cta-bg1"></div>
    <div class="cta-bg2"></div>
    <div class="cta-content">
      <div class="cta-title">Belum menemukan layanan yang cocok?</div>
      <div class="cta-desc">Hubungi tim kami untuk layanan kustom sesuai kebutuhan spesial Anda.</div>
    </div>
    <button class="btn-cta">💬 Hubungi Kami</button>
  </div>

</div>

@endsection

{{-- Scripts navbar dihandle oleh user.layouts.app --}}