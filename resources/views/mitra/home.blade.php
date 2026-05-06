@extends('mitra.layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/mitra/home.css') }}">
@endsection

@section('content')
<div class="content">

    <!-- LEFT COLUMN -->
    <div class="content-left">

      <!-- Stats Row -->
      <div class="stats-row">
        <div class="stat-card">
          <div class="stat-icon blue">🛍️</div>
          <div>
            <div class="stat-label">Pesanan Hari Ini</div>
            <div class="stat-value">12</div>
            <div class="stat-sub">Total pesanan baru</div>
          </div>
        </div>
        <div class="stat-card">
          <div class="stat-icon orange">⏳</div>
          <div>
            <div class="stat-label">Diproses</div>
            <div class="stat-value">5</div>
            <div class="stat-sub">Sedang dikerjakan</div>
          </div>
        </div>
        <div class="stat-card">
          <div class="stat-icon green">✅</div>
          <div>
            <div class="stat-label">Selesai</div>
            <div class="stat-value">20</div>
            <div class="stat-sub">Pesanan selesai</div>
          </div>
        </div>
        <div class="stat-card">
          <div class="stat-icon purple">💰</div>
          <div>
            <div class="stat-label">Penghasilan Hari Ini</div>
            <div class="stat-value" style="font-size:18px;">Rp 350.000</div>
            <div class="stat-sub">Total penghasilan</div>
          </div>
        </div>
      </div>

      <!-- Pesanan Baru -->
      <div class="section-card">
        <div class="section-header">
          <div class="section-title">
            Pesanan Baru
            <div class="count-badge">3</div>
          </div>
          <a class="link-all" href="#">Lihat Semua ›</a>
        </div>

        <!-- Order 1 -->
        <div class="order-row">
          <div class="avatar-circle">👤</div>
          <div>
            <div class="order-name">Andi Pratama</div>
            <div class="order-phone">0812-3456-7890</div>
          </div>
          <div>
            <div class="order-addr">
              <span class="order-addr-icon">📍</span>
              <div>
                <div class="order-street">Jl. Melati No.12, Cipete</div>
                <div class="order-city">Cipete, Jakarta Selatan</div>
                <div class="order-time">10:30 WIB</div>
              </div>
            </div>
          </div>
          <div class="order-badge badge-kg">Kiloan 5 Kg</div>
          <div class="order-actions">
            <button class="btn-terima">Terima</button>
            <button class="btn-tolak">Tolak</button>
          </div>
        </div>

        <!-- Order 2 -->
        <div class="order-row">
          <div class="avatar-circle">👤</div>
          <div>
            <div class="order-name">Budi Santoso</div>
            <div class="order-phone">0813-2345-6789</div>
          </div>
          <div>
            <div class="order-addr">
              <span class="order-addr-icon">📍</span>
              <div>
                <div class="order-street">Jl. Mawar No.8, Kebayoran</div>
                <div class="order-city">Kebayoran Baru, Jakarta Selatan</div>
                <div class="order-time">09:45 WIB</div>
              </div>
            </div>
          </div>
          <div class="order-badge badge-satuan">Cuci Satuan</div>
          <div class="order-actions">
            <button class="btn-terima">Terima</button>
            <button class="btn-tolak">Tolak</button>
          </div>
        </div>

        <!-- Order 3 -->
        <div class="order-row">
          <div class="avatar-circle">👤</div>
          <div>
            <div class="order-name">Siti Aisyah</div>
            <div class="order-phone">0821-9876-5432</div>
          </div>
          <div>
            <div class="order-addr">
              <span class="order-addr-icon">📍</span>
              <div>
                <div class="order-street">Jl. Kemang Raya No.45</div>
                <div class="order-city">Kemang, Jakarta Selatan</div>
                <div class="order-time">09:15 WIB</div>
              </div>
            </div>
          </div>
          <div class="order-badge badge-kg">Kiloan 3 Kg</div>
          <div class="order-actions">
            <button class="btn-terima">Terima</button>
            <button class="btn-tolak">Tolak</button>
          </div>
        </div>

        <div class="see-more-row">Lihat semua pesanan baru ›</div>
      </div>

      <!-- Pesanan Aktif -->
      <div class="section-card">
        <div class="section-header">
          <div class="section-title">Pesanan Aktif</div>
          <a class="link-all" href="#">Lihat Semua ›</a>
        </div>

        <!-- Active Order 1: Diproses -->
        <div class="active-order-row">
          <div>
            <div class="active-name">Rizky Febrian</div>
            <div class="active-trx">#TRX-230501-001</div>
            <div class="active-loc" style="margin-top:2px;">
              <span style="font-size:12px;color:var(--neutral-500);">📍</span>
              <span class="active-loc-text">Jl. Pramuka No.10, Jakarta Timur</span>
            </div>
          </div>

          <div>
            <div style="display:flex;align-items:center;gap:0;">
              <div class="step-col">
                <div class="step-dot done">✓</div>
                <div class="step-label">Pickup</div>
              </div>
              <div class="step-line done" style="margin-bottom:14px;"></div>
              <div class="step-col">
                <div class="step-dot active">🔵</div>
                <div class="step-label active-lbl">Diproses</div>
              </div>
              <div class="step-line" style="margin-bottom:14px;"></div>
              <div class="step-col">
                <div class="step-dot pending">○</div>
                <div class="step-label">Dikirim</div>
              </div>
              <div class="step-line" style="margin-bottom:14px;"></div>
              <div class="step-col">
                <div class="step-dot pending">○</div>
                <div class="step-label">Selesai</div>
              </div>
            </div>
          </div>

          <div class="est-selesai">
            <span style="font-size:11px;color:var(--neutral-500);">Estimasi Selesai</span>
            <span class="est-date">2 Mei 2024</span>
            <span class="est-time">14:00 WIB</span>
          </div>
        </div>

        <!-- Active Order 2: Dikirim -->
        <div class="active-order-row">
          <div>
            <div class="active-name">Dewi Lestari</div>
            <div class="active-trx">#TRX-230501-002</div>
            <div class="active-loc" style="margin-top:2px;">
              <span style="font-size:12px;color:var(--neutral-500);">📍</span>
              <span class="active-loc-text">Jl. Kembang No.3, Jakarta Selatan</span>
            </div>
          </div>

          <div>
            <div style="display:flex;align-items:center;gap:0;">
              <div class="step-col">
                <div class="step-dot done">✓</div>
                <div class="step-label">Pickup</div>
              </div>
              <div class="step-line done" style="margin-bottom:14px;"></div>
              <div class="step-col">
                <div class="step-dot done">✓</div>
                <div class="step-label">Diproses</div>
              </div>
              <div class="step-line done" style="margin-bottom:14px;"></div>
              <div class="step-col">
                <div class="step-dot active">🚚</div>
                <div class="step-label active-lbl">Dikirim</div>
              </div>
              <div class="step-line" style="margin-bottom:14px;"></div>
              <div class="step-col">
                <div class="step-dot pending">○</div>
                <div class="step-label">Selesai</div>
              </div>
            </div>
          </div>

          <div class="est-selesai">
            <span style="font-size:11px;color:var(--neutral-500);">Estimasi Selesai</span>
            <span class="est-date">2 Mei 2024</span>
            <span class="est-time">16:00 WIB</span>
          </div>
        </div>

        <!-- Active Order 3: Pickup pending -->
        <div class="active-order-row">
          <div>
            <div class="active-name">Fahmi Hidayat</div>
            <div class="active-trx">#TRX-230501-003</div>
            <div class="active-loc" style="margin-top:2px;">
              <span style="font-size:12px;color:var(--neutral-500);">📍</span>
              <span class="active-loc-text">Jl. Taman No.7, Jakarta Barat</span>
            </div>
          </div>

          <div>
            <div style="display:flex;align-items:center;gap:0;">
              <div class="step-col">
                <div class="step-dot done">✓</div>
                <div class="step-label">Pickup</div>
              </div>
              <div class="step-line" style="margin-bottom:14px;"></div>
              <div class="step-col">
                <div class="step-dot pending">○</div>
                <div class="step-label">Diproses</div>
              </div>
              <div class="step-line" style="margin-bottom:14px;"></div>
              <div class="step-col">
                <div class="step-dot pending">○</div>
                <div class="step-label">Dikirim</div>
              </div>
              <div class="step-line" style="margin-bottom:14px;"></div>
              <div class="step-col">
                <div class="step-dot pending">○</div>
                <div class="step-label">Selesai</div>
              </div>
            </div>
          </div>

          <div class="est-selesai">
            <span style="font-size:11px;color:var(--neutral-500);">Estimasi Selesai</span>
            <span class="est-date">3 Mei 2024</span>
            <span class="est-time">10:00 WIB</span>
          </div>
        </div>

        <!-- Promo Banner -->
        <div class="promo-banner">
          <div class="promo-text">
            <div class="promo-icon">🏪</div>
            <div>
              <div class="promo-title">Lengkapi informasi tokomu</div>
              <div class="promo-sub">Lengkapi informasi toko untuk meningkatkan kepercayaan pelanggan</div>
            </div>
          </div>
          <button class="btn-promo">Lengkapi Sekarang</button>
        </div>
      </div>

    </div><!-- /content-left -->

    <!-- RIGHT COLUMN -->
    <div class="content-right">

      <!-- Ringkasan Performa Toko -->
      <div class="panel-card">
        <div class="panel-header">
          <div class="panel-title">Ringkasan Performa Toko</div>
          <div class="period-select">7 Hari Terakhir ▾</div>
        </div>

        <div class="perf-row">
          <div class="perf-label">
            <span class="perf-icon">⭐</span> Rating Toko
          </div>
          <div style="display:flex;align-items:center;gap:4px;">
            <span class="rating-stars">★</span>
            <span class="perf-val">4.8/5.0</span>
          </div>
        </div>

        <div class="perf-row">
          <div class="perf-label">
            <span class="perf-icon">📊</span> Tingkat Penyelesaian Pesanan
          </div>
          <div class="perf-val green">98%</div>
        </div>

        <div class="perf-row">
          <div class="perf-label">
            <span class="perf-icon">💬</span> Waktu Respon Chat
          </div>
          <div class="perf-val blue">2 jam</div>
        </div>

        <div class="perf-row">
          <div class="perf-label">
            <span class="perf-icon">🗓️</span> Pesanan Selesai
          </div>
          <div style="display:flex;align-items:center;gap:6px;">
            <span class="perf-val">45</span>
            <span class="trend up">↑ 12%</span>
          </div>
        </div>

        <div class="perf-row" style="border-bottom:none;">
          <div class="perf-label">
            <span class="perf-icon">❌</span> Pesanan Dibatalkan
          </div>
          <div style="display:flex;align-items:center;gap:6px;">
            <span class="perf-val">2</span>
            <span class="trend down">↓ 5%</span>
          </div>
        </div>

        <div class="perf-link">
          Lihat Performa Toko <span>›</span>
        </div>
      </div>

      <!-- Penghasilan Chart -->
      <div class="panel-card">
        <div style="display:flex;align-items:center;justify-content:space-between;padding:16px 18px 4px;">
          <div class="panel-title">Penghasilan</div>
          <div class="period-select">7 Hari Terakhir ▾</div>
        </div>

        <div style="padding:4px 18px 0;">
          <div style="font-size:11px;color:var(--neutral-500);">Total Penghasilan</div>
          <div style="display:flex;align-items:center;gap:8px;padding-top:2px;">
            <span style="font-size:20px;font-weight:700;">Rp 2.450.000</span>
            <span class="trend up">↑ 18%</span>
          </div>
          <div style="font-size:11px;color:var(--neutral-500);padding-bottom:10px;">Dibandingkan 7 hari sebelumnya</div>
        </div>

        <!-- SVG Chart -->
        <div class="chart-wrap">
          <div class="chart-tooltip">28 Apr<br>Rp 320.000</div>
          <svg class="chart-svg" viewBox="0 0 292 100" xmlns="http://www.w3.org/2000/svg" style="overflow:visible;">
            <defs>
              <linearGradient id="chartGrad" x1="0" y1="0" x2="0" y2="1">
                <stop offset="0%" stop-color="#2563eb" stop-opacity="0.18"/>
                <stop offset="100%" stop-color="#2563eb" stop-opacity="0.01"/>
              </linearGradient>
            </defs>

            <!-- Y axis labels -->
            <text x="0" y="10" font-size="8" fill="#9ca3af" font-family="Poppins">600K</text>
            <text x="0" y="40" font-size="8" fill="#9ca3af" font-family="Poppins">400K</text>
            <text x="0" y="70" font-size="8" fill="#9ca3af" font-family="Poppins">200K</text>
            <text x="0" y="98" font-size="8" fill="#9ca3af" font-family="Poppins">0</text>

            <!-- Grid lines -->
            <line x1="22" y1="8" x2="292" y2="8" stroke="#f3f4f6" stroke-width="1"/>
            <line x1="22" y1="38" x2="292" y2="38" stroke="#f3f4f6" stroke-width="1"/>
            <line x1="22" y1="68" x2="292" y2="68" stroke="#f3f4f6" stroke-width="1"/>
            <line x1="22" y1="96" x2="292" y2="96" stroke="#f3f4f6" stroke-width="1"/>

            <!-- Area fill -->
            <path d="M25,78 C45,75 60,65 80,62 C100,58 110,70 130,67 C150,64 165,55 185,30 C205,40 220,55 240,58 C260,62 275,60 292,62 L292,96 L25,96 Z"
                  fill="url(#chartGrad)"/>

            <!-- Line -->
            <path d="M25,78 C45,75 60,65 80,62 C100,58 110,70 130,67 C150,64 165,55 185,30 C205,40 220,55 240,58 C260,62 275,60 292,62"
                  fill="none" stroke="#2563eb" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>

            <!-- Dot at peak (28 Apr) -->
            <circle cx="185" cy="30" r="5" fill="#2563eb" stroke="white" stroke-width="2"/>
          </svg>
        </div>

        <div class="chart-labels">
          <span>25 Apr</span>
          <span>26 Apr</span>
          <span>27 Apr</span>
          <span>28 Apr</span>
          <span>29 Apr</span>
          <span>30 Apr</span>
          <span>1 Mei</span>
        </div>

        <div class="earn-link">
          Lihat Penghasilan <span>></span>
        </div>
      </div>

    </div><!-- /content-right -->

  </div><!-- /content -->
@endsection