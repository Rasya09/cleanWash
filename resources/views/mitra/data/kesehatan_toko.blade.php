@extends('mitra.layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/mitra/kesehatan_toko.css') }}">
@endsection

@section('content')
{{-- Content: Kesehatan Toko --}}

<div class="kt-page">

    {{-- Page Header --}}
    <div class="kt-page-header">
        <div>
            <div class="kt-title-row">
                <h1 class="kt-title">Kesehatan Toko</h1>
                <button class="kt-info-btn" title="Info">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#9ca3af" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                </button>
            </div>
            <p class="kt-subtitle">Pantau kesehatan toko Anda agar performa tetap optimal</p>
        </div>
        <div class="kt-header-actions">
            <button class="kt-btn-date">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                1 – 31 Mei 2024
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg>
            </button>
            <button class="kt-btn-unduh">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
                Unduh Laporan
            </button>
        </div>
    </div>

    {{-- Skor + Perbandingan --}}
    <div class="kt-score-row">

        {{-- Skor Utama --}}
        <div class="kt-score-main">
            <div class="kt-score-left">
                <div class="kt-score-icon">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#22c55e" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
                </div>
                <div>
                    <p class="kt-score-label">Skor Kesehatan Toko</p>
                    <div class="kt-score-value-row">
                        <span class="kt-score-num">92</span>
                        <span class="kt-score-denom">/100</span>
                        <span class="kt-score-status kt-score-status--sehat">Sehat</span>
                    </div>
                    <div class="kt-score-trend">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#16a34a" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="18 15 12 9 6 15"/></svg>
                        <span>8 poin dari Apr 2024</span>
                    </div>
                </div>
            </div>
            <div class="kt-score-right">
                <p class="kt-score-desc">Toko Anda dalam kondisi <strong>sehat!</strong> Pertahankan performa yang sudah baik dan tingkatkan aspek yang masih perlu ditingkatkan.</p>
                <div class="kt-progress-bar-wrap">
                    <div class="kt-progress-track">
                        <div class="kt-progress-fill" style="width: 92%"></div>
                        <div class="kt-progress-dot" style="left: 92%"></div>
                    </div>
                    <div class="kt-progress-labels">
                        <span>0</span><span>25</span><span>50</span><span>75</span><span>100</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Perbandingan --}}
        <div class="kt-compare-card">
            <p class="kt-compare-title">Perbandingan Skor</p>
            <div class="kt-compare-row">
                <span class="kt-compare-month">Apr 2024</span>
                <div class="kt-compare-track">
                    <div class="kt-compare-fill kt-compare-fill--gray" style="width: 84%"></div>
                </div>
                <span class="kt-compare-score">84/100</span>
            </div>
            <div class="kt-compare-row">
                <span class="kt-compare-month">Mei 2024</span>
                <div class="kt-compare-track">
                    <div class="kt-compare-fill kt-compare-fill--green" style="width: 92%"></div>
                </div>
                <span class="kt-compare-score kt-compare-score--green">92/100</span>
            </div>
        </div>

    </div>

    {{-- Detail Kesehatan Toko (5 cards) --}}
    <div class="kt-section">
        <h2 class="kt-section-title">Detail Kesehatan Toko</h2>
        <div class="kt-detail-grid">

            <div class="kt-detail-card">
                <div class="kt-detail-icon kt-detail-icon--green">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#22c55e" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                </div>
                <p class="kt-detail-label">Tingkat Pesanan Selesai</p>
                <div class="kt-detail-score-row">
                    <span class="kt-detail-score">96<span class="kt-detail-denom">/100</span></span>
                    <span class="kt-badge kt-badge--sangat-baik">Sangat Baik</span>
                </div>
                <p class="kt-detail-desc">Pertahankan ketepatan penyelesaian pesanan.</p>
            </div>

            <div class="kt-detail-card">
                <div class="kt-detail-icon kt-detail-icon--yellow">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#eab308" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                </div>
                <p class="kt-detail-label">Rating & Penilaian</p>
                <div class="kt-detail-score-row">
                    <span class="kt-detail-score">90<span class="kt-detail-denom">/100</span></span>
                    <span class="kt-badge kt-badge--sangat-baik">Sangat Baik</span>
                </div>
                <p class="kt-detail-desc">Terus jaga kualitas layanan dan kepuasan pelanggan.</p>
            </div>

            <div class="kt-detail-card">
                <div class="kt-detail-icon kt-detail-icon--blue">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#3b82f6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                </div>
                <p class="kt-detail-label">Kecepatan Respon Chat</p>
                <div class="kt-detail-score-row">
                    <span class="kt-detail-score">88<span class="kt-detail-denom">/100</span></span>
                    <span class="kt-badge kt-badge--baik">Baik</span>
                </div>
                <p class="kt-detail-desc">Respon pelanggan dengan cepat untuk meningkatkan skor.</p>
            </div>

            <div class="kt-detail-card">
                <div class="kt-detail-icon kt-detail-icon--red">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#ef4444" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="8" y1="12" x2="16" y2="12"/></svg>
                </div>
                <p class="kt-detail-label">Tingkat Pembatalan</p>
                <div class="kt-detail-score-row">
                    <span class="kt-detail-score">95<span class="kt-detail-denom">/100</span></span>
                    <span class="kt-badge kt-badge--sangat-baik">Sangat Baik</span>
                </div>
                <p class="kt-detail-desc">Tingkat pembatalan pesanan sangat rendah.</p>
            </div>

            <div class="kt-detail-card">
                <div class="kt-detail-icon kt-detail-icon--purple">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#8b5cf6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2"/><line x1="3" y1="9" x2="21" y2="9"/><line x1="9" y1="21" x2="9" y2="9"/></svg>
                </div>
                <p class="kt-detail-label">Ketersediaan Layanan</p>
                <div class="kt-detail-score-row">
                    <span class="kt-detail-score">85<span class="kt-detail-denom">/100</span></span>
                    <span class="kt-badge kt-badge--baik">Baik</span>
                </div>
                <p class="kt-detail-desc">Lengkapi informasi layanan agar lebih menarik.</p>
            </div>

        </div>
    </div>

    {{-- Selamat Banner --}}
    <div class="kt-congrats-banner">
        <div class="kt-congrats-left">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#16a34a" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
            <div>
                <p class="kt-congrats-title">Selamat!</p>
                <p class="kt-congrats-desc">Kesehatan toko Anda lebih baik dari <strong>78%</strong> toko lainnya di kategori Laundry.</p>
            </div>
        </div>
        <button class="kt-btn-tips">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
            Lihat Tips Peningkatan
        </button>
    </div>

    {{-- Bottom Section: Faktor + Chart/Pencapaian --}}
    <div class="kt-bottom-grid">

        {{-- LEFT: Faktor + Tips --}}
        <div class="kt-bottom-left">
            <h2 class="kt-section-title">Faktor yang Perlu Ditingkatkan</h2>

            <div class="kt-faktor-list">
                <div class="kt-faktor-item">
                    <div class="kt-faktor-icon kt-faktor-icon--blue">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#3b82f6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                    </div>
                    <div class="kt-faktor-info">
                        <p class="kt-faktor-name">Kecepatan Respon Chat</p>
                        <p class="kt-faktor-desc">Rata-rata waktu respon Anda 12 menit</p>
                    </div>
                    <span class="kt-badge kt-badge--perlu">Perlu Ditingkatkan</span>
                    <button class="kt-btn-detail">Lihat Detail</button>
                </div>

                <div class="kt-faktor-item">
                    <div class="kt-faktor-icon kt-faktor-icon--purple">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#8b5cf6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2"/><line x1="3" y1="9" x2="21" y2="9"/><line x1="9" y1="21" x2="9" y2="9"/></svg>
                    </div>
                    <div class="kt-faktor-info">
                        <p class="kt-faktor-name">Ketersediaan Layanan</p>
                        <p class="kt-faktor-desc">2 layanan belum lengkap informasinya</p>
                    </div>
                    <span class="kt-badge kt-badge--perlu">Perlu Ditingkatkan</span>
                    <button class="kt-btn-detail">Lihat Detail</button>
                </div>

                <div class="kt-faktor-item">
                    <div class="kt-faktor-icon kt-faktor-icon--green">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#22c55e" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
                    </div>
                    <div class="kt-faktor-info">
                        <p class="kt-faktor-name">Foto & Media Toko</p>
                        <p class="kt-faktor-desc">Tambahkan lebih banyak foto toko & layanan</p>
                    </div>
                    <span class="kt-badge kt-badge--disarankan">Disarankan</span>
                    <button class="kt-btn-detail">Lihat Detail</button>
                </div>
            </div>

            {{-- Tips Box --}}
            <div class="kt-tips-box">
                <div class="kt-tips-header">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                    <p class="kt-tips-title">Tips Meningkatkan Kesehatan Toko</p>
                </div>
                <ul class="kt-tips-list">
                    <li>
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#3b82f6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                        Balas chat pelanggan kurang dari 5 menit.
                    </li>
                    <li>
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#3b82f6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                        Jaga kualitas layanan untuk mendapatkan rating tinggi.
                    </li>
                    <li>
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#3b82f6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                        Pastikan semua layanan memiliki informasi lengkap.
                    </li>
                    <li>
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#3b82f6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                        Hindari pembatalan pesanan agar skor tetap maksimal.
                    </li>
                </ul>
            </div>
        </div>

        {{-- RIGHT: Chart + Pencapaian --}}
        <div class="kt-bottom-right">
            <h2 class="kt-section-title">Riwayat Skor Kesehatan</h2>
            <div class="kt-chart-card">
                <div class="kt-chart-wrap">
                    <svg viewBox="0 0 560 200" xmlns="http://www.w3.org/2000/svg" class="kt-chart-svg">
                        <defs>
                            <linearGradient id="chartGrad" x1="0" y1="0" x2="0" y2="1">
                                <stop offset="0%" stop-color="#3b82f6" stop-opacity="0.15"/>
                                <stop offset="100%" stop-color="#3b82f6" stop-opacity="0"/>
                            </linearGradient>
                        </defs>
                        {{-- Y gridlines --}}
                        <line x1="40" y1="20" x2="545" y2="20" stroke="#f3f4f6" stroke-width="1"/>
                        <line x1="40" y1="57" x2="545" y2="57" stroke="#f3f4f6" stroke-width="1"/>
                        <line x1="40" y1="94" x2="545" y2="94" stroke="#f3f4f6" stroke-width="1"/>
                        <line x1="40" y1="131" x2="545" y2="131" stroke="#f3f4f6" stroke-width="1"/>
                        <line x1="40" y1="168" x2="545" y2="168" stroke="#f3f4f6" stroke-width="1"/>
                        {{-- Y labels --}}
                        <text x="32" y="24" text-anchor="end" font-size="10" fill="#9ca3af">100</text>
                        <text x="32" y="61" text-anchor="end" font-size="10" fill="#9ca3af">75</text>
                        <text x="32" y="98" text-anchor="end" font-size="10" fill="#9ca3af">50</text>
                        <text x="32" y="135" text-anchor="end" font-size="10" fill="#9ca3af">25</text>
                        <text x="32" y="172" text-anchor="end" font-size="10" fill="#9ca3af">0</text>
                        {{-- Area fill --}}
                        <path d="M60,131 L145,113 L230,120 L315,94 L400,76 L485,58 L485,168 L60,168 Z" fill="url(#chartGrad)"/>
                        {{-- Line --}}
                        <polyline points="60,131 145,113 230,120 315,94 400,76 485,58"
                            fill="none" stroke="#3b82f6" stroke-width="2.5" stroke-linejoin="round" stroke-linecap="round"/>
                        {{-- Dots --}}
                        <circle cx="60"  cy="131" r="4" fill="#fff" stroke="#3b82f6" stroke-width="2"/>
                        <circle cx="145" cy="113" r="4" fill="#fff" stroke="#3b82f6" stroke-width="2"/>
                        <circle cx="230" cy="120" r="4" fill="#fff" stroke="#3b82f6" stroke-width="2"/>
                        <circle cx="315" cy="94"  r="4" fill="#fff" stroke="#3b82f6" stroke-width="2"/>
                        <circle cx="400" cy="76"  r="4" fill="#fff" stroke="#3b82f6" stroke-width="2"/>
                        <circle cx="485" cy="58"  r="5" fill="#3b82f6" stroke="#fff" stroke-width="2"/>
                        {{-- Tooltip box at last point --}}
                        <rect x="480" y="30" width="70" height="36" rx="6" fill="#1e40af"/>
                        <text x="515" y="46" text-anchor="middle" font-size="9" fill="#bfdbfe">Mei 2024</text>
                        <text x="515" y="60" text-anchor="middle" font-size="11" font-weight="bold" fill="#fff">92/100</text>
                        {{-- X labels --}}
                        <text x="60"  y="185" text-anchor="middle" font-size="10" fill="#9ca3af">Des 2023</text>
                        <text x="145" y="185" text-anchor="middle" font-size="10" fill="#9ca3af">Jan 2024</text>
                        <text x="230" y="185" text-anchor="middle" font-size="10" fill="#9ca3af">Feb 2024</text>
                        <text x="315" y="185" text-anchor="middle" font-size="10" fill="#9ca3af">Mar 2024</text>
                        <text x="400" y="185" text-anchor="middle" font-size="10" fill="#9ca3af">Apr 2024</text>
                        <text x="485" y="185" text-anchor="middle" font-size="10" fill="#9ca3af">Mei 2024</text>
                    </svg>
                </div>
            </div>

            {{-- Pencapaian --}}
            <div class="kt-pencapaian-section">
                <h2 class="kt-section-title">Pencapaian</h2>
                <div class="kt-pencapaian-grid">
                    <div class="kt-pencapaian-card">
                        <div class="kt-pencapaian-icon kt-pencapaian-icon--green">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#16a34a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="6"/><path d="M15.477 12.89 17 22l-5-3-5 3 1.523-9.11"/></svg>
                        </div>
                        <div>
                            <p class="kt-pencapaian-name">7 Hari Berturut-turut</p>
                            <p class="kt-pencapaian-desc">Tidak ada pesanan dibatalkan</p>
                            <p class="kt-pencapaian-date">Diperoleh 20 Mei 2024</p>
                        </div>
                    </div>
                    <div class="kt-pencapaian-card">
                        <div class="kt-pencapaian-icon kt-pencapaian-icon--blue">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                        </div>
                        <div>
                            <p class="kt-pencapaian-name">Rating Tinggi</p>
                            <p class="kt-pencapaian-desc">Raih rating 4.8+</p>
                            <p class="kt-pencapaian-date">Diperoleh 15 Mei 2024</p>
                        </div>
                    </div>
                    <div class="kt-pencapaian-card">
                        <div class="kt-pencapaian-icon kt-pencapaian-icon--purple">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#7c3aed" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                        </div>
                        <div>
                            <p class="kt-pencapaian-name">Respon Cepat</p>
                            <p class="kt-pencapaian-desc">Respon chat &lt; 5 menit</p>
                            <p class="kt-pencapaian-date">Diperoleh 10 Mei 2024</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>{{-- end bottom grid --}}

    {{-- Footer Info Bar --}}
    <div class="kt-footer-bar">
        <div class="kt-footer-left">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#3b82f6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
            <span>Skor kesehatan toko diperbarui setiap hari pukul 00.00 WIB berdasarkan performa toko Anda.</span>
        </div>
        <a href="#" class="kt-footer-link">Pelajari Cara Kerja Skor &rsaquo;</a>
    </div>

</div>{{-- end kt-page --}}
@endsection