@extends('user.layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
@endsection

@section('content')
<!-- ===== HERO ===== -->
<section class="hero">
  <span class="hero-badge">Platform Laundry Digital No.1</span>
  <h1 class="hero-title">
    Laundry Jadi Lebih<br>
    <span class="highlight">Mudah</span> dan Cepat
  </h1>
  <p class="hero-sub">
    Pesan laundry terdekat, pilih antar jemput, dan pantau status cucian Anda secara real-time. Semua dalam satu aplikasi.
  </p>
  <div class="hero-cta">
    <button class="btn-big primary">🔍 Cari Laundry</button>
    <button class="btn-big outline">▶ Cara Kerja</button>
  </div>
  <div class="stats-bar">
    <div class="stat-item">
      <span class="stat-num">1.000+</span>
      <span class="stat-label">Mitra Laundry</span>
    </div>
    <div class="stat-item">
      <span class="stat-num">50K+</span>
      <span class="stat-label">Pengguna Aktif</span>
    </div>
    <div class="stat-item">
      <span class="stat-num">4.9 ★</span>
      <span class="stat-label">Rating Rata-rata</span>
    </div>
    <div class="stat-item">
      <span class="stat-num">30 Mnt</span>
      <span class="stat-label">Est. Penjemputan</span>
    </div>
  </div>
</section>

<!-- ===== LAUNDRY TERDEKAT ===== -->
<section class="section section-alt" id="laundry">
  <div class="section-header">
    <span class="section-tag">Pilihan Terbaik</span>
    <h2 class="section-title">Laundry Terfavorit</h2>
    <p class="section-desc">Temukan mitra laundry terpercaya dengan harga transparan dan layanan terverifikasi.</p>
  </div>
  <div class="cards-grid">
    <div class="laundry-card">
      <div class="card-img c1">
        <div class="card-img-inner">🧺</div>
        <div class="card-badge">★ 5.0</div>
      </div>
      <div class="card-body">
        <div class="card-name">UBR Laundry</div>
        <div class="card-dist">📍 1–2 km</div>
        <div class="card-price">Mulai <strong>Rp 7.500/kg</strong></div>
        <button class="btn-detail">Lihat Detail</button>
      </div>
    </div>
    <div class="laundry-card">
      <div class="card-img c2">
        <div class="card-img-inner">👕</div>
        <div class="card-badge">★ 5.0</div>
      </div>
      <div class="card-body">
        <div class="card-name">Sorcha Laundry Arcamanik</div>
        <div class="card-dist">📍 1–2 km</div>
        <div class="card-price">Mulai <strong>Rp 5.000/kg</strong></div>
        <button class="btn-detail">Lihat Detail</button>
      </div>
    </div>
    <div class="laundry-card">
      <div class="card-img c3">
        <div class="card-img-inner">✨</div>
        <div class="card-badge">★ 5.0</div>
      </div>
      <div class="card-body">
        <div class="card-name">Laundry Express Bandung</div>
        <div class="card-dist">📍 1–2 km</div>
        <div class="card-price">Mulai <strong>Rp 7.600/kg</strong></div>
        <button class="btn-detail">Lihat Detail</button>
      </div>
    </div>
    <div class="laundry-card">
      <div class="card-img c4">
        <div class="card-img-inner">🌸</div>
        <div class="card-badge">★ 5.0</div>
      </div>
      <div class="card-body">
        <div class="card-name">Molaundry</div>
        <div class="card-dist">📍 1–2 km</div>
        <div class="card-price">Mulai <strong>Rp 5.000/kg</strong></div>
        <button class="btn-detail">Lihat Detail</button>
      </div>
    </div>
  </div>
</section>

<!-- ===== PICKUP BANNER ===== -->
<div style="padding: 0 0 80px;" id="layanan">
  <div class="pickup-banner">
    <div class="pickup-content">
      <span class="pickup-badge">Layanan Unggulan</span>
      <h2 class="pickup-title">Antar Jemput Cepat,<br>Tanpa Ribet</h2>
      <p class="pickup-desc">Nikmati layanan antar jemput langsung ke lokasi Anda. Pilih jadwal fleksibel, biarkan kami yang urus semuanya.</p>
      <button class="btn-white">Pesan Sekarang →</button>
    </div>
    <div class="pickup-visual">
      <div class="pickup-visual-inner">
        <span class="pickup-emoji">🛵</span>
      </div>
    </div>
  </div>
</div>

<!-- ===== FITUR UNGGULAN ===== -->
<section class="section">
  <div class="section-header">
    <span class="section-tag">Keunggulan</span>
    <h2 class="section-title">Fitur Unggulan Kami</h2>
    <p class="section-desc">Dirancang agar pengalaman laundry Anda lebih nyaman, transparan, dan terpercaya.</p>
  </div>
  <div class="features-grid">
    <div class="feature-card">
      <div class="feature-icon">📍</div>
      <div class="feature-title">Tracking Real-Time</div>
      <p class="feature-desc">Pantau status cucian kamu langsung — dari pengambilan, proses cuci, setrika, hingga siap antar.</p>
    </div>
    <div class="feature-card">
      <div class="feature-icon">📅</div>
      <div class="feature-title">Jadwal Fleksibel</div>
      <p class="feature-desc">Tentukan waktu penjemputan dan pengantaran sesuai aktivitasmu. Tidak perlu menunggu lama.</p>
    </div>
    <div class="feature-card">
      <div class="feature-icon">💳</div>
      <div class="feature-title">Pembayaran Fleksibel</div>
      <p class="feature-desc">Bayar di awal atau setelah selesai. Tersedia berbagai metode pembayaran digital yang aman.</p>
    </div>
  </div>
</section>

<!-- ===== PROSES KERJA ===== -->
<section class="section section-alt">
  <div class="section-header">
    <span class="section-tag">Cara Mudah</span>
    <h2 class="section-title">Proses Kerja Kami</h2>
    <p class="section-desc">Tiga langkah simpel untuk pakaian bersih, harum, dan siap pakai.</p>
  </div>
  <div class="steps-grid">
    <div class="step-card">
      <div class="step-num">01</div>
      <div class="step-img-wrap">🧺</div>
      <div class="step-title">Pilih Laundry</div>
      <p class="step-desc">Temukan mitra laundry terdekat berdasarkan lokasi, harga, dan ulasan pengguna lain.</p>
    </div>
    <div class="step-card">
      <div class="step-num">02</div>
      <div class="step-img-wrap">👕</div>
      <div class="step-title">Pilih Layanan</div>
      <p class="step-desc">Pilih jenis layanan — cuci kiloan, satuan, setrika, atau bed cover. Semua tersedia.</p>
    </div>
    <div class="step-card">
      <div class="step-num">03</div>
      <div class="step-img-wrap">🔔</div>
      <div class="step-title">Tracking hingga Selesai</div>
      <p class="step-desc">Pantau progress cucian secara real-time dan terima notifikasi saat pakaian siap diantar.</p>
    </div>
  </div>
</section>

<!-- ===== TESTIMONIAL ===== -->
<section class="section-testimonial">
  <div class="testimonial-header">
    <span class="testimonial-tag">Ulasan Pengguna</span>
    <h2 class="testimonial-title">Apa Kata Mereka</h2>
  </div>
  <div class="testimonial-stats">
    <div class="t-stat">
      <span class="t-stat-num">5.0</span>
      <span class="t-stat-stars">★★★★★</span>
      <span class="t-stat-label">Rating Rata-rata</span>
    </div>
    <div class="t-stat">
      <span class="t-stat-num">1K+</span>
      <span class="t-stat-stars">✦✦✦✦✦</span>
      <span class="t-stat-label">Ulasan Masuk</span>
    </div>
  </div>
  <div class="testimonial-card">
    <div class="t-stars">★★★★★</div>
    <p class="t-quote">"Aplikasinya sangat mudah dipakai! Dijemput tepat waktu dan hasilnya bersih banget."</p>
    <div class="t-author">
      <div class="t-avatar">M</div>
      <div>
        <div class="t-name">Millon Zahino</div>
        <div class="t-role">Business Owner · Bandung</div>
      </div>
    </div>
  </div>
  <div class="testimonial-nav">
    <button class="t-nav-btn">←</button>
    <div class="t-dots">
      <div class="t-dot active"></div>
      <div class="t-dot"></div>
      <div class="t-dot"></div>
    </div>
    <button class="t-nav-btn">→</button>
  </div>
</section>

<!-- ===== REVIEW FORM ===== -->
<section class="section-review">
  <div class="review-card">
    <div class="review-heading">
      <h3>Bagaimana Pengalaman Anda?</h3>
      <p>Silahkan berikan rating & ulasan untuk website kami</p>
    </div>
    <div class="review-emoji-row">
      <span class="review-emoji" title="Sangat Buruk">😞</span>
      <span class="review-emoji" title="Buruk">😕</span>
      <span class="review-emoji active" title="Biasa">😊</span>
      <span class="review-emoji" title="Baik">😄</span>
      <span class="review-emoji" title="Sangat Baik">🤩</span>
    </div>
    <div class="review-stars">
      <button class="star-btn lit">★</button>
      <button class="star-btn lit">★</button>
      <button class="star-btn lit">★</button>
      <button class="star-btn lit">★</button>
      <button class="star-btn">★</button>
    </div>
    <div class="review-form">
      <textarea class="review-textarea" placeholder="Tuliskan ulasan anda di sini...."></textarea>
      <button class="review-submit">Kirim</button>
    </div>
    <p class="review-note">Feedback anda sangat membantu kami menyempurnakan layanan website kami.</p>
  </div>
</section>

<!-- Demo toggle button -->
<button class="demo-toggle" id="demoToggle" onclick="simulateLogin()">
  🔐 Simulasi Masuk
</button>

@endsection

@push('scripts')
<script>
 
  /* =========================================================
     STAR RATING
  ========================================================= */
  const stars = document.querySelectorAll('.star-btn');
  stars.forEach((star, i) => {
    star.addEventListener('click', () => {
      stars.forEach((s, j) => s.classList.toggle('lit', j <= i));
    });
    star.addEventListener('mouseenter', () => {
      stars.forEach((s, j) => s.style.color = j <= i ? '#f97316' : '#d0d0d0');
    });
    star.addEventListener('mouseleave', () => {
      stars.forEach(s => s.style.color = '');
    });
  });

  /* =========================================================
     EMOJI SELECTOR
  ========================================================= */
  const emojis = document.querySelectorAll('.review-emoji');
  emojis.forEach(e => {
    e.addEventListener('click', () => {
      emojis.forEach(x => x.classList.remove('active'));
      e.classList.add('active');
    });
  });
</script>
@endpush

