@extends('mitra.layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/mitra/penilaian_toko.css') }}?v={{ time() }}">
@endsection

@section('content')
    <!-- ═══════════════════ MAIN ═══════════════════ -->
<div class="main-wrap">

  <!-- CONTENT -->
  <main class="content">

    <!-- Page Header -->
    <div class="page-header">
      <div>
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
            <div class="value">{{ number_format($rataRata, 1) }}</div>
          </div>
          <span class="trend"></span>
        </div>
        <div class="stars-row">
          {!! str_repeat('<span class="star-filled">★</span>', floor($rataRata)) !!}
          @if(fmod($rataRata, 1) >= 0.5) <span class="star-half" style="color:#F59E0B;">★</span> @endif
          {!! str_repeat('<span class="star-empty" style="color:#e5e7eb;">★</span>', 5 - ceil($rataRata)) !!}
        </div>
        <div class="sub">Keseluruhan</div>
      </div>

      <!-- Total Ulasan -->
      <div class="stat-card">
        <div>
          <div class="label">Total Ulasan</div>
          <div class="value">{{ $totalUlasan }}</div>
          <div class="sub">dari {{ $totalPelanggan }} pelanggan</div>
        </div>
        <div class="stat-icon-wrap purple">💬</div>
      </div>

      <!-- Ulasan Positif -->
      <div class="stat-card">
        <div>
          <div class="label">Ulasan Positif</div>
          <div class="value">{{ $ulasanPositif }} <span style="font-size:16px;font-weight:500;color:var(--gray-500)">({{ $totalUlasan > 0 ? round(($ulasanPositif / $totalUlasan) * 100) : 0 }}%)</span></div>
          <div class="sub">Pelanggan puas</div>
        </div>
        <div class="stat-icon-wrap green">😊</div>
      </div>

      <!-- Ulasan Netral -->
      <div class="stat-card">
        <div>
          <div class="label">Ulasan Netral</div>
          <div class="value">{{ $ulasanNetral }} <span style="font-size:16px;font-weight:500;color:var(--gray-500)">({{ $totalUlasan > 0 ? round(($ulasanNetral / $totalUlasan) * 100) : 0 }}%)</span></div>
          <div class="sub">Pelanggan cukup puas</div>
        </div>
        <div class="stat-icon-wrap yellow">😐</div>
      </div>

      <!-- Ulasan Negatif -->
      <div class="stat-card">
        <div>
          <div class="label">Ulasan Negatif</div>
          <div class="value">{{ $ulasanNegatif }} <span style="font-size:16px;font-weight:500;color:var(--gray-500)">({{ $totalUlasan > 0 ? round(($ulasanNegatif / $totalUlasan) * 100) : 0 }}%)</span></div>
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
            <div class="num">{{ number_format($rataRata, 1) }}</div>
            <div class="stars-row">
              {!! str_repeat('<span class="star-filled">★</span>', floor($rataRata)) !!}
              @if(fmod($rataRata, 1) >= 0.5) <span class="star-half" style="color:#F59E0B;">★</span> @endif
              {!! str_repeat('<span class="star-empty" style="color:#e5e7eb;">★</span>', 5 - ceil($rataRata)) !!}
            </div>
            <small>dari {{ $totalUlasan }} ulasan</small>
          </div>
          <div class="bar-list">
            <div class="bar-row">
              <span class="star-label">5 <span style="color:#F59E0B;">★</span></span>
              <div class="bar-track"><div class="bar-fill" style="width:{{ $totalUlasan > 0 ? round(($rating5 / $totalUlasan) * 100) : 0 }}%"></div></div>
              <span class="bar-count">{{ $rating5 }} ({{ $totalUlasan > 0 ? round(($rating5 / $totalUlasan) * 100) : 0 }}%)</span>
            </div>
            <div class="bar-row">
              <span class="star-label">4 <span style="color:#F59E0B;">★</span></span>
              <div class="bar-track"><div class="bar-fill" style="width:{{ $totalUlasan > 0 ? round(($rating4 / $totalUlasan) * 100) : 0 }}%"></div></div>
              <span class="bar-count">{{ $rating4 }} ({{ $totalUlasan > 0 ? round(($rating4 / $totalUlasan) * 100) : 0 }}%)</span>
            </div>
            <div class="bar-row">
              <span class="star-label">3 <span style="color:#F59E0B;">★</span></span>
              <div class="bar-track"><div class="bar-fill" style="width:{{ $totalUlasan > 0 ? round(($rating3 / $totalUlasan) * 100) : 0 }}%"></div></div>
              <span class="bar-count">{{ $rating3 }} ({{ $totalUlasan > 0 ? round(($rating3 / $totalUlasan) * 100) : 0 }}%)</span>
            </div>
            <div class="bar-row">
              <span class="star-label">2 <span style="color:#F59E0B;">★</span></span>
              <div class="bar-track"><div class="bar-fill" style="width:{{ $totalUlasan > 0 ? round(($rating2 / $totalUlasan) * 100) : 0 }}%"></div></div>
              <span class="bar-count">{{ $rating2 }} ({{ $totalUlasan > 0 ? round(($rating2 / $totalUlasan) * 100) : 0 }}%)</span>
            </div>
            <div class="bar-row">
              <span class="star-label">1 <span style="color:#F59E0B;">★</span></span>
              <div class="bar-track"><div class="bar-fill" style="width:{{ $totalUlasan > 0 ? round(($rating1 / $totalUlasan) * 100) : 0 }}%"></div></div>
              <span class="bar-count">{{ $rating1 }} ({{ $totalUlasan > 0 ? round(($rating1 / $totalUlasan) * 100) : 0 }}%)</span>
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
          @forelse($reviews as $review)
          <div class="review-card">
            <div class="avatar av-blue">{{ strtoupper(substr($review->user->name ?? 'U', 0, 2)) }}</div>
            <div class="review-body">
              <div class="review-top">
                <span class="reviewer-name">{{ $review->user->name ?? 'Customer' }}</span>
                <span class="pelanggan-badge">Pelanggan</span>
              </div>
              <div class="review-meta">
                <span>Pesanan #{{ $review->order->order_code ?? '-' }}</span>
              </div>
              <div class="review-star-row">
                <div class="review-stars">
                  {!! str_repeat('<span class="star-filled">★</span>', $review->rating) !!}
                  {!! str_repeat('<span class="star-empty" style="color:#e5e7eb;">★</span>', 5 - $review->rating) !!}
                </div>
                <span class="review-date">{{ $review->created_at->format('d M Y, H:i') }}</span>
              </div>
              <div class="review-text">{{ $review->comment ?? 'Tidak ada komentar.' }}</div>
              
              @if($review->reply)
              <div style="margin-top:12px; padding:12px; background:#f9fafb; border-left:4px solid #3b82f6; border-radius:4px;">
                  <p style="font-size:13px; font-weight:600; color:#1e3a8a; margin-bottom:4px;">Balasan Anda:</p>
                  <p style="font-size:13px; color:#4b5563; margin:0;">{{ $review->reply }}</p>
              </div>
              @endif
            </div>
            <div class="review-actions" style="display: flex; align-items: flex-start; gap: 8px; margin-left: auto;">
              @if(!$review->reply)
              <button class="btn-balas" onclick="openReplyModal('{{ $review->user->name ?? 'Customer' }}', {{ $review->id }})">
                <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"/></svg>
                Balas
              </button>
              @endif
              <button class="review-more" style="margin-left: 0;">⋮</button>
            </div>
          </div>
          @empty
          <p style="color:#6b7280; font-size:14px; text-align:center; padding:20px;">Belum ada ulasan untuk toko Anda.</p>
          @endforelse
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

<!-- Modal Balas Ulasan -->
<div class="modal-overlay" id="replyModal">
  <div class="modal-box">
    <div class="modal-header">
      <h3 class="modal-title">Balas Ulasan</h3>
      <button class="modal-close" onclick="closeReplyModal()">✕</button>
    </div>
    <form id="replyForm" method="POST" action="">
      @csrf
      <div class="modal-body">
        <p class="modal-subtitle">Membalas ulasan dari <strong id="replyCustomerName">Pelanggan</strong></p>
        <textarea name="reply" class="reply-textarea" id="replyText" required placeholder="Tulis balasan Anda di sini... (Misal: Terima kasih atas ulasannya...)"></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn-cancel" onclick="closeReplyModal()">Batal</button>
        <button type="submit" class="btn-submit">Kirim Balasan</button>
      </div>
    </form>
  </div>
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

    // Modal Balas Ulasan
    const replyModal = document.getElementById('replyModal');
    const replyCustomerName = document.getElementById('replyCustomerName');
    const replyText = document.getElementById('replyText');
    const replyForm = document.getElementById('replyForm');

    window.openReplyModal = function(customerName, reviewId) {
        replyCustomerName.textContent = customerName;
        replyText.value = '';
        replyForm.action = '/mitra/review/' + reviewId + '/reply';
        replyModal.classList.add('active');
        document.body.style.overflow = 'hidden'; // prevent scroll
    }

    window.closeReplyModal = function() {
        replyModal.classList.remove('active');
        document.body.style.overflow = '';
    }
    </script>
@endpush