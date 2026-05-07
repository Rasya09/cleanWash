@extends('mitra.layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/mitra/penilaian_toko.css') }}">
@endsection

@section('content')
    <!-- ═══════════════════ MAIN ═══════════════════ -->
<div class="main-wrap">

  <!-- CONTENT -->
  <main class="content">

    <!-- Page Header -->
    <div class="page-header">
      <div>
        <h1>Penilaian Toko</h1>
        <p>Lihat rating dan ulasan pelanggan terhadap toko Anda</p>
      </div>
      <button class="btn-outline">⬇ Unduh Laporan</button>
    </div>

    <!-- ── STAT CARDS ── -->
    <div class="stat-grid">

      <!-- Rating Toko -->
      <div class="stat-card" style="flex-direction:column; gap:6px;">
        <div style="display:flex; justify-content:space-between; align-items:flex-start; width:100%;">
          <div>
            <div class="label">Rating Toko</div>
            <div class="value">4.8</div>
          </div>
          <span class="trend">↑ 0.2</span>
        </div>
        <div class="stars-row">
          <span class="star-filled">★</span><span class="star-filled">★</span>
          <span class="star-filled">★</span><span class="star-filled">★</span>
          <span class="star-half" style="color:#F59E0B;">★</span>
        </div>
        <div class="sub">Sangat Baik &nbsp;·&nbsp; <span style="color:var(--gray-400)">vs bulan lalu</span></div>
      </div>

      <!-- Total Ulasan -->
      <div class="stat-card">
        <div>
          <div class="label">Total Ulasan</div>
          <div class="value">128</div>
          <div class="sub">dari 96 pelanggan</div>
        </div>
        <div class="stat-icon-wrap purple">💬</div>
      </div>

      <!-- Ulasan Positif -->
      <div class="stat-card">
        <div>
          <div class="label">Ulasan Positif</div>
          <div class="value">118 <span style="font-size:16px;font-weight:500;color:var(--gray-500)">(92%)</span></div>
          <div class="sub">Pelanggan puas</div>
        </div>
        <div class="stat-icon-wrap green">😊</div>
      </div>

      <!-- Ulasan Netral -->
      <div class="stat-card">
        <div>
          <div class="label">Ulasan Netral</div>
          <div class="value">8 <span style="font-size:16px;font-weight:500;color:var(--gray-500)">(6%)</span></div>
          <div class="sub">Pelanggan cukup puas</div>
        </div>
        <div class="stat-icon-wrap yellow">😐</div>
      </div>

      <!-- Ulasan Negatif -->
      <div class="stat-card">
        <div>
          <div class="label">Ulasan Negatif</div>
          <div class="value">2 <span style="font-size:16px;font-weight:500;color:var(--gray-500)">(2%)</span></div>
          <div class="sub">Perlu ditingkatkan</div>
        </div>
        <div class="stat-icon-wrap red">😞</div>
      </div>
    </div>

    <!-- ── MIDDLE GRID ── -->
    <div class="middle-grid">

      <!-- Ringkasan Rating -->
      <div class="panel">
        <h3>Ringkasan Rating</h3>
        <div class="rating-summary">
          <div class="rating-big">
            <div class="num">4.8</div>
            <div class="stars-row">
              <span class="star-filled">★</span><span class="star-filled">★</span>
              <span class="star-filled">★</span><span class="star-filled">★</span>
              <span class="star-half" style="color:#F59E0B;">★</span>
            </div>
            <small>dari 128 ulasan</small>
          </div>
          <div class="bar-list">
            <div class="bar-row">
              <span class="star-label">5 <span style="color:#F59E0B;">★</span></span>
              <div class="bar-track"><div class="bar-fill" style="width:77%"></div></div>
              <span class="bar-count">98 (77%)</span>
            </div>
            <div class="bar-row">
              <span class="star-label">4 <span style="color:#F59E0B;">★</span></span>
              <div class="bar-track"><div class="bar-fill" style="width:16%"></div></div>
              <span class="bar-count">20 (16%)</span>
            </div>
            <div class="bar-row">
              <span class="star-label">3 <span style="color:#F59E0B;">★</span></span>
              <div class="bar-track"><div class="bar-fill" style="width:6%"></div></div>
              <span class="bar-count">8 (6%)</span>
            </div>
            <div class="bar-row">
              <span class="star-label">2 <span style="color:#F59E0B;">★</span></span>
              <div class="bar-track"><div class="bar-fill" style="width:1%"></div></div>
              <span class="bar-count">1 (1%)</span>
            </div>
            <div class="bar-row">
              <span class="star-label">1 <span style="color:#F59E0B;">★</span></span>
              <div class="bar-track"><div class="bar-fill" style="width:1%"></div></div>
              <span class="bar-count">1 (1%)</span>
            </div>
          </div>
        </div>
      </div>

      <!-- Rating per Kategori + Promo Box -->
      <div style="display:grid; grid-template-columns:1fr 1fr; gap:16px;">

        <div class="panel">
          <h3>Rating per Kategori</h3>
          <div style="display:flex; flex-direction:column; gap:0;">

            <div class="kategori-item">
              <div class="kat-label"><span class="kicon">🛁</span> Kualitas Layanan</div>
              <div class="kat-right">
                <div class="kat-stars">
                  <span class="star-filled">★</span><span class="star-filled">★</span>
                  <span class="star-filled">★</span><span class="star-filled">★</span>
                  <span class="star-half" style="color:#F59E0B;">★</span>
                </div>
                <span class="kat-score">4.8</span>
              </div>
            </div>

            <div class="kategori-item">
              <div class="kat-label"><span class="kicon">👕</span> Kualitas Hasil Cucian</div>
              <div class="kat-right">
                <div class="kat-stars">
                  <span class="star-filled">★</span><span class="star-filled">★</span>
                  <span class="star-filled">★</span><span class="star-filled">★</span>
                  <span class="star-half" style="color:#F59E0B;">★</span>
                </div>
                <span class="kat-score">4.9</span>
              </div>
            </div>

            <div class="kategori-item">
              <div class="kat-label"><span class="kicon">⏱️</span> Kecepatan</div>
              <div class="kat-right">
                <div class="kat-stars">
                  <span class="star-filled">★</span><span class="star-filled">★</span>
                  <span class="star-filled">★</span><span class="star-filled">★</span>
                  <span class="star-empty">★</span>
                </div>
                <span class="kat-score">4.7</span>
              </div>
            </div>

            <div class="kategori-item">
              <div class="kat-label"><span class="kicon">💲</span> Harga</div>
              <div class="kat-right">
                <div class="kat-stars">
                  <span class="star-filled">★</span><span class="star-filled">★</span>
                  <span class="star-filled">★</span><span class="star-filled">★</span>
                  <span class="star-empty">★</span>
                </div>
                <span class="kat-score">4.6</span>
              </div>
            </div>

            <div class="kategori-item" style="border-bottom:none;">
              <div class="kat-label"><span class="kicon">🧑‍💼</span> Sikap Kurir / Staff</div>
              <div class="kat-right">
                <div class="kat-stars">
                  <span class="star-filled">★</span><span class="star-filled">★</span>
                  <span class="star-filled">★</span><span class="star-filled">★</span>
                  <span class="star-half" style="color:#F59E0B;">★</span>
                </div>
                <span class="kat-score">4.9</span>
              </div>
            </div>

          </div>
        </div>

        <!-- Promo Box -->
        <div class="panel promo-box" style="padding:24px 16px;">
          <div class="promo-icon">⭐</div>
          <p>Pertahankan kualitas bagus ini!</p>
          <small>Pelanggan merasa puas dengan layanan Anda.</small>
        </div>

      </div>
    </div>

    <!-- ── BOTTOM GRID ── -->
    <div class="bottom-grid">

      <!-- Ulasan Terbaru -->
      <div>
        <h3 style="font-size:15px; font-weight:700; margin-bottom:14px;">Ulasan Terbaru</h3>

        <div class="filter-tabs">
          <button class="tab active">Semua (128)</button>
          <button class="tab">5 ★ (98)</button>
          <button class="tab">4 ★ (20)</button>
          <button class="tab">3 ★ (8)</button>
          <button class="tab">2 ★ (1)</button>
          <button class="tab">1 ★ (1)</button>
        </div>

        <div class="review-list">

          <!-- Review 1 -->
          <div class="review-card">
            <div class="avatar av-blue">AS</div>
            <div class="review-body">
              <div class="review-top">
                <span class="reviewer-name">Andi Setiawan</span>
                <span class="pelanggan-badge">Pelanggan</span>
              </div>
              <div class="review-meta">
                <span>Pesanan #INV-2405-0123</span>
                <span>·</span>
                <span>Cuci Kiloan</span>
              </div>
              <div class="review-star-row">
                <div class="review-stars">
                  <span class="star-filled">★</span><span class="star-filled">★</span>
                  <span class="star-filled">★</span><span class="star-filled">★</span>
                  <span class="star-filled">★</span>
                </div>
                <span class="review-date">25 Mei 2024, 10:30</span>
              </div>
              <div class="review-text">Pelayanan cepat, hasil cucian bersih dan wangi. Kurir pickup juga ramah!</div>
              <div class="review-images">
                <div class="review-img">🧺</div>
                <div class="review-img">👔</div>
              </div>
            </div>
            <button class="review-more">⋮</button>
          </div>

          <!-- Review 2 -->
          <div class="review-card">
            <div class="avatar av-indigo">DN</div>
            <div class="review-body">
              <div class="review-top">
                <span class="reviewer-name">Dewi Nur</span>
                <span class="pelanggan-badge">Pelanggan</span>
              </div>
              <div class="review-meta">
                <span>Pesanan #INV-2405-0111</span>
                <span>·</span>
                <span>Cuci Satuan</span>
              </div>
              <div class="review-star-row">
                <div class="review-stars">
                  <span class="star-filled">★</span><span class="star-filled">★</span>
                  <span class="star-filled">★</span><span class="star-filled">★</span>
                  <span class="star-empty">★</span>
                </div>
                <span class="review-date">23 Mei 2024, 16:45</span>
              </div>
              <div class="review-text">Hasil cucian bagus, rapi dan wangi. Cuma sedikit lebih lama dari estimasi.</div>
            </div>
            <button class="review-more">⋮</button>
          </div>

          <!-- Review 3 -->
          <div class="review-card">
            <div class="avatar av-green">RM</div>
            <div class="review-body">
              <div class="review-top">
                <span class="reviewer-name">Rizky Maulana</span>
                <span class="pelanggan-badge">Pelanggan</span>
              </div>
              <div class="review-meta">
                <span>Pesanan #INV-2405-0098</span>
                <span>·</span>
                <span>Cuci Kiloan</span>
              </div>
              <div class="review-star-row">
                <div class="review-stars">
                  <span class="star-filled">★</span><span class="star-filled">★</span>
                  <span class="star-filled">★</span><span class="star-filled">★</span>
                  <span class="star-filled">★</span>
                </div>
                <span class="review-date">21 Mei 2024, 09:15</span>
              </div>
              <div class="review-text">Mantap! Selalu puas langganan di sini.</div>
              <div class="review-images">
                <div class="review-img">🧺</div>
              </div>
            </div>
            <button class="review-more">⋮</button>
          </div>

          <!-- Review 4 -->
          <div class="review-card">
            <div class="avatar av-pink">SF</div>
            <div class="review-body">
              <div class="review-top">
                <span class="reviewer-name">Siti Fatimah</span>
                <span class="pelanggan-badge">Pelanggan</span>
              </div>
              <div class="review-meta">
                <span>Pesanan #INV-2405-0087</span>
                <span>·</span>
                <span>Setrika</span>
              </div>
              <div class="review-star-row">
                <div class="review-stars">
                  <span class="star-filled">★</span><span class="star-filled">★</span>
                  <span class="star-empty">★</span><span class="star-empty">★</span>
                  <span class="star-empty">★</span>
                </div>
                <span class="review-date">20 Mei 2024, 18:20</span>
              </div>
              <div class="review-text">Setrikanya kurang rapi di bagian kerah baju.</div>
            </div>
            <button class="review-more">⋮</button>
          </div>

        </div>
      </div>

      <!-- Apa Kata Pelanggan -->
      <div class="sidebar-panel">
        <h3>Apa Kata Pelanggan</h3>
        <div class="kata-list">

          <div class="kata-item">
            <div class="kata-icon green">😊</div>
            <div class="kata-info">
              <strong>92%</strong>
              <small>Pelanggan puas dengan kualitas hasil cucian</small>
            </div>
          </div>

          <div class="kata-item">
            <div class="kata-icon blue">😄</div>
            <div class="kata-info">
              <strong>89%</strong>
              <small>Pelanggan puas dengan pelayanan kurir</small>
            </div>
          </div>

          <div class="kata-item">
            <div class="kata-icon yellow">😐</div>
            <div class="kata-info">
              <strong>85%</strong>
              <small>Pelanggan merasa harga sesuai kualitas</small>
            </div>
          </div>

          <div class="kata-item">
            <div class="kata-icon red">😞</div>
            <div class="kata-info">
              <strong>2%</strong>
              <small>Pelanggan mengalami kendala</small>
            </div>
          </div>

        </div>

        <button class="btn-primary">Lihat Semua Ulasan</button>
      </div>

    </div>

  </main>
</div>
@endsection

@push('scripts')
    <script>
    // Tab filter interactivity
    document.querySelectorAll('.tab').forEach(btn => {
        btn.addEventListener('click', () => {
        document.querySelectorAll('.tab').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        });
    });
    </script>
@endpush