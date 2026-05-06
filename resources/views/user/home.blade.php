@extends('user.layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
@endsection

@section('content')
    <!-- ── HERO ── -->
    <section class="hero">
        <div class="container hero-wrapper">
            <div class="hero-content">
                <h1>Laundry Jadi Lebih<br/>Mudah & Cepat</h1>
                <p>Pesan laundry terdekat, antar jemput atau datang langsung dengan mudah.</p>
                {{-- <a href="#" class="btn-primary">Cari Laundry</a> --}}
            </div>
            <div class="hero-image">
                <img src="{{ asset('assets/images/img-hero.png') }}" alt="Laundry Illustration" />
            </div>
        </div>
    </section>

    <!-- ── SEARCH ── -->
    {{-- <section class="search-section">
        <div class="search-bar">
            <span class="search-icon">
                <svg width="18" height="18" fill="none" stroke="#6d93f2" stroke-width="2" viewBox="0 0 24 24">
                    <circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/>
                </svg>
            </span>
            <input type="text" placeholder="Cari Laundry di sekitar kamu" />
            <button class="btn-search">Cari</button>
        </div>
    </section>
    <div class="search-actions">
        <a href="#" class="btn-action">
            <svg width="18" height="18" fill="none" stroke="#fff" stroke-width="2" viewBox="0 0 24 24">
                <rect x="1" y="3" width="15" height="13" rx="2"/>
                <path d="M16 8h4l3 3v5h-7V8z"/>
                <circle cx="5.5" cy="18.5" r="1.5"/>
                <circle cx="18.5" cy="18.5" r="1.5"/>
            </svg>
            Antar Jemput
            <span class="arrow">></span>
        </a>
        <a href="#" class="btn-action">
            <svg width="18" height="18" fill="none" stroke="#fff" stroke-width="2" viewBox="0 0 24 24">
                <path d="M3 12L12 3l9 9"/><path d="M9 21V12h6v9"/>
            </svg>
            Antar Sendiri
            <span class="arrow">></span>
        </a>
    </div> --}}

    <!-- ── LAUNDRY TERDEKAT ── -->
    <section class="nearby-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Laundry Terpopuler</h2>
                <!-- <a href="#" class="section-link">Lihat Semua</a> -->
            </div>
            <div class="laundry-list" id="laundry-list">
                <!-- Laundry Card 1 -->
                <div class="laundry-card">
                    <img src="https://storage.googleapis.com/tagjs-prod.appspot.com/v1/cJbMtcrhbu/vpjq3z1v_expires_30_days.png" alt="UBR Laundry" class="laundry-card__image" />
                    <div class="laundry-card__body">
                        <div class="laundry-card__info">
                            <span class="laundry-card__name">UBR Laundry</span>
                            <div class="laundry-card__meta">
                                <div class="laundry-card__rating">
                                    <img src="https://storage.googleapis.com/tagjs-prod.appspot.com/v1/cJbMtcrhbu/h2hp5j48_expires_30_days.png" alt="Rating" class="laundry-card__stars" />
                                    <span>5.0</span>
                                </div>
                                <span class="laundry-card__distance">1-2 km</span>
                            </div>
                        </div>
                        <div class="laundry-card__footer">
                            <div class="laundry-card__price">
                                <span>Rp 7.000</span>
                                <span>/kg</span>
                            </div>
                            <button class="btn-detail" onclick="alert('Pressed!')">
                                Lihat Detail
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Laundry Card 2 -->
                <div class="laundry-card">
                    <img src="https://storage.googleapis.com/tagjs-prod.appspot.com/v1/cJbMtcrhbu/nkyyacsq_expires_30_days.png" alt="Sorcha Laundry Arcamanik" class="laundry-card__image" />
                    <div class="laundry-card__body">
                        <div class="laundry-card__info">
                            <span class="laundry-card__name">Sorcha Laundry Arcamanik</span>
                            <div class="laundry-card__meta">
                                <div class="laundry-card__rating">
                                    <img src="https://storage.googleapis.com/tagjs-prod.appspot.com/v1/cJbMtcrhbu/h2hp5j48_expires_30_days.png" alt="Rating" class="laundry-card__stars" />
                                    <span>5.0</span>
                                </div>
                                <span class="laundry-card__distance">1-2 km</span>
                            </div>
                        </div>
                        <div class="laundry-card__footer">
                            <div class="laundry-card__price">
                                <span>Rp 5.000</span>
                                <span>/kg</span>
                            </div>
                            <button class="btn-detail" onclick="alert('Pressed!')">
                                Lihat Detail
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Laundry Card 3 -->
                <div class="laundry-card">
                    <img src="https://storage.googleapis.com/tagjs-prod.appspot.com/v1/cJbMtcrhbu/ao9ji4iu_expires_30_days.png" alt="Laundry Express Bandung" class="laundry-card__image" />
                    <div class="laundry-card__body">
                        <div class="laundry-card__info">
                            <span class="laundry-card__name">Laundry Express Bandung</span>
                            <div class="laundry-card__meta">
                                <div class="laundry-card__rating">
                                    <img src="https://storage.googleapis.com/tagjs-prod.appspot.com/v1/cJbMtcrhbu/h2hp5j48_expires_30_days.png" alt="Rating" class="laundry-card__stars" />
                                    <span>5.0</span>
                                </div>
                                <span class="laundry-card__distance">1-2 km</span>
                            </div>
                        </div>
                        <div class="laundry-card__footer">
                            <div class="laundry-card__price">
                                <span>Rp 7.000</span>
                                <span>/kg</span>
                            </div>
                            <button class="btn-detail" onclick="alert('Pressed!')">
                                Lihat Detail
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Laundry Card 4 -->
                <div class="laundry-card">
                    <img src="https://lh3.googleusercontent.com/gps-cs-s/AHVAwerC8Uw7xVd3TUlh8Ie5568Imt53op2iT9AFkvIazRTuofT7YbBJ9N2MuoUdTVQXhY9K7tX8-YCjSRb_bTzZuxELKdfG_8tDPEksF4BLYSXRRZG1kO2SUw77_-YKhMWZeIetloopDw1iguG-=s1360-w1360-h1020-rw" alt="Molaundry" class="laundry-card__image" />
                    <div class="laundry-card__body">
                        <div class="laundry-card__info">
                            <span class="laundry-card__name">Molaundry</span>
                            <div class="laundry-card__meta">
                                <div class="laundry-card__rating">
                                    <img src="https://storage.googleapis.com/tagjs-prod.appspot.com/v1/cJbMtcrhbu/h2hp5j48_expires_30_days.png" alt="Rating" class="laundry-card__stars" />
                                    <span>5.0</span>
                                </div>
                                <span class="laundry-card__distance">1-2 km</span>
                            </div>
                        </div>
                        <div class="laundry-card__footer">
                            <div class="laundry-card__price">
                                <span>Rp .000</span>
                                <span>/kg</span>
                            </div>
                            <button class="btn-detail" onclick="alert('Pressed!')">
                                Lihat Detail
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ── ANTAR JEMPUT ── -->
    <section class="pickup-section">
        <div class="container pickup-wrapper">
            <div class="pickup-content">
                <h1>Antar Jemput Cepat,<br/>Tanpa Ribet</h1>
                <p>Nikmati layanan antar jemput laundry langsung dari lokasi Anda. Pilih jadwal sesuai kebutuhan, dan biarkan kami yang mengurus sisanya.</p>
            </div>
            <div class="pickup-image">
                <img src="{{ asset('assets/images/pickup.png') }}" alt="Antar Jemput Illustration" />
            </div>
        </div>
    </section>

    <!-- ── LAYANAN LAUNDRY ── -->
    <!-- <section class="services-section">
        <div class="container">
            <h2 class="section-center-title">Layanan Laundry Kami</h2>
            <div class="services-grid" id="services-grid"></div>
        </div>
    </section> -->

    <!-- ── FITUR UNGGULAN ── -->
    <section class="features-section">
        <div class="container">
            <h2 class="section-center-title">Fitur Unggulan Kami</h2>
            <div class="features-list" id="features-list"></div>
        </div>
    </section>

    <!-- ── PROSES KERJA ── -->
    <section class="process-section">
        <div class="container">
            <h2 class="section-center-title">Proses Kerja Kami</h2>
            <div class="process-list" id="process-list"></div>
        </div>
    </section>

    <!-- ── TESTIMONI ── -->
    <section class="testimonial-section">
        <div class="container">
            <h2 class="section-center-title testimonial-section__title">Apa Kata Pengguna Kami</h2>
            <div class="testimonial-stats">
                <div class="testimonial-stat">
                    <span class="testimonial-stat__star">⭐</span>
                    <span class="testimonial-stat__value">5.0</span>
                </div>
                <div class="testimonial-stat testimonial-stat--outline">
                    <span class="testimonial-stat__stars">★★★★★</span>
                </div>
            </div>
            <div class="testimonial-meta">
                <span>Rating Rata-rata</span>
                <span>1.000+ Ulasan</span>
            </div>
            <div class="testimonial-card">
                <div class="testimonial-card__header">
                    <span class="testimonial-card__stars-badge">★★★★★</span>
                    <img src="{{ asset('assets/img/Kutip.png') }}" alt="" srcset="" class="testimonial-card__quote-icon">
                </div>
                <p class="testimonial-card__text">
                    "Layanan antar jemput sangat membantu, cucian bersih dan wangi. Proses cepat dan harga terjangkau. Sangat direkomendasikan untuk yang sibuk!"
                </p>
                <div class="testimonial-card__author">
                    <div class="testimonial-card__avatar"></div>
                    <div>
                        <span class="testimonial-card__name">Millon Zahino</span>
                        <span class="testimonial-card__role">Pelanggan Setia</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ── FORM ULASAN ── -->
    <section class="review-section">
        <div class="container review-wrapper">
            <div class="review-form-box">
                <h3 class="review-form-box__title">Bagaimana Pengalaman Anda?</h3>
                <p class="review-form-box__subtitle">Silahkan berikan rating & ulasan untuk website kami</p>
                <div class="review-emoji" id="review-emoji">😊</div>
                <div class="review-stars" id="review-stars">
                    <span class="star" data-value="1">★</span>
                    <span class="star" data-value="2">★</span>
                    <span class="star" data-value="3">★</span>
                    <span class="star" data-value="4">★</span>
                    <span class="star" data-value="5">★</span>
                </div>
                <textarea class="review-textarea" placeholder="Tuliskan ulasan anda di sini...."></textarea>
                <button class="btn-review-submit">Kirim</button>
                <p class="review-form-box__note">Feedback anda sangat membantu kami menyempurnakan layanan website kami.</p>
            </div>
            <div class="review-illustration">
                <img src="{{ asset('assets/images/review-illustration.png') }}" alt="Review Illustration" />
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        // Data fitur unggulan
        const features = [
            { title: "Tracking",              desc: "Pantau status laundry kamu dengan mudah",              image: "assets/images/tracking.png" },
            { title: "Antar Jemput",          desc: "Laundry dijemput dan diantar kembali",                 image: "assets/images/pickup.png" },
            { title: "Pembayaran Fleksibel",  desc: "Kamu bisa memilih bayar sekarang atau saat selesai",   image: "assets/images/payment.png" },
        ];
 
        function createFeatureCard(feat) {
            return `
                <div class="feature-card">
                    <div class="feature-card__text">
                        <span class="feature-card__title">${feat.title}</span>
                        <span class="feature-card__desc">${feat.desc}</span>
                    </div>
                    <img src="${feat.image}" alt="${feat.title}" class="feature-card__image" />
                </div>
            `;
        }
 
        document.getElementById('features-list').innerHTML =
            features.map(createFeatureCard).join('');

        // Data proses kerja
        const steps = [
            { label: "Pilih Laundry",              image: "assets/images/step-1.png" },
            { label: "Pilih Layanan",              image: "assets/images/step-2.png" },
            { label: "Tracking Laundry hingga selesai", image: "assets/images/step-3.png" },
        ];
 
        function createStepCard(step) {
            return `
                <div class="step-card">
                    <img src="${step.image}" alt="${step.label}" class="step-card__image" />
                    <span class="step-card__label">${step.label}</span>
                </div>
            `;
        }
 
        document.getElementById('process-list').innerHTML =
            steps.map(createStepCard).join('');

        // Star Rating
        const stars = document.querySelectorAll('.star');
        const emoji = document.getElementById('review-emoji');
        const emojiMap = { 1: '😞', 2: '😕', 3: '😐', 4: '😊', 5: '😍' };
        let currentRating = 0;
 
        stars.forEach(star => {
            star.addEventListener('click', () => {
                currentRating = parseInt(star.dataset.value);
                updateStars(currentRating);
                emoji.textContent = emojiMap[currentRating];
            });
            star.addEventListener('mouseover', () => updateStars(parseInt(star.dataset.value)));
            star.addEventListener('mouseout', () => updateStars(currentRating));
        });
 
        function updateStars(rating) {
            stars.forEach(s => {
                s.classList.toggle('star--active', parseInt(s.dataset.value) <= rating);
            });
        }
    </script>
@endpush