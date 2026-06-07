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
    {{-- <button class="btn-big primary">🔍 Cari Laundry</button>
    <button class="btn-big outline">▶ Cara Kerja</button> --}}
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

<!-- ===== PICKUP BANNER ===== -->
<div style="padding: 0 0 80px;" id="layanan">
  <div class="pickup-banner">
    <div class="pickup-content">
      <span class="pickup-badge">Layanan Unggulan</span>
      <h2 class="pickup-title">Antar Jemput Cepat,<br>Tanpa Ribet</h2>
      <p class="pickup-desc">Nikmati layanan antar jemput langsung ke lokasi Anda. Pilih jadwal fleksibel, biarkan kami yang urus semuanya.</p>
      {{-- <button class="btn-white">Pesan Sekarang →</button> --}}
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

    <form action="" method="POST">
      @csrf

      {{-- Input hidden diisi JS --}}
      <input type="hidden" name="emoji" id="emojiInput" value="3">
      <input type="hidden" name="star"  id="starInput"  value="4">

      <div class="review-rating-container">
        <div class="review-emoji-row">
          <span class="review-emoji" data-value="1" title="Sangat Buruk">😞</span>
          <span class="review-emoji" data-value="2" title="Buruk">😕</span>
          <span class="review-emoji active" data-value="3" title="Biasa">😊</span>
          <span class="review-emoji" data-value="4" title="Baik">😄</span>
          <span class="review-emoji" data-value="5" title="Sangat Baik">🤩</span>
        </div>

        <div class="review-stars">
          <button type="button" class="star-btn" data-value="1">★</button>
          <button type="button" class="star-btn" data-value="2">★</button>
          <button type="button" class="star-btn" data-value="3">★</button>
          <button type="button" class="star-btn" data-value="4">★</button>
          <button type="button" class="star-btn" data-value="5">★</button>
        </div>
      </div>

      <div class="review-form">
        <textarea name="ulasan" class="review-textarea"
                  placeholder="Tuliskan ulasan anda di sini...."></textarea>
        <button type="submit" class="review-submit">Kirim</button>
      </div>

    </form>

    <p class="review-note">Feedback anda sangat membantu kami menyempurnakan layanan website kami.</p>
  </div>
</section>

@endsection

@push('scripts')
<script>

// Sinkronisasi Star dan Emoji
const stars = document.querySelectorAll('.star-btn');
const emojis = document.querySelectorAll('.review-emoji');
const starInput = document.getElementById('starInput');
const emojiInput = document.getElementById('emojiInput');

function updateRating(value) {
  // Update Stars
  stars.forEach((s, j) => s.classList.toggle('lit', j < value));
  starInput.value = value;

  // Update Emoji
  emojis.forEach(x => x.classList.remove('active'));
  const activeEmoji = document.querySelector(`.review-emoji[data-value="${value}"]`);
  if (activeEmoji) activeEmoji.classList.add('active');
  emojiInput.value = value;
}

// Event Listeners for Stars
stars.forEach((star, i) => {
  star.addEventListener('click', () => updateRating(i + 1));
});

// Event Listeners for Emojis
emojis.forEach(emoji => {
  emoji.addEventListener('click', () => updateRating(emoji.dataset.value));
});

// Set Initial State (Misal 5 Bintang)
updateRating(5);
</script>
@endpush
