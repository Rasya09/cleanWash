@extends('mitra.layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/mitra/profil_toko.css') }}">
<style>
    /* Additional Styles for Services */
    .service-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
        gap: 16px;
        margin-top: 20px;
    }
    .service-item {
        background: #fff;
        border: 1px solid var(--border);
        border-radius: 12px;
        padding: 16px;
        transition: all 0.2s;
        display: flex;
        flex-direction: column;
        gap: 10px;
    }
    .service-item:hover {
        border-color: var(--blue-primary);
        box-shadow: var(--shadow-hover);
        transform: translateY(-2px);
    }
    .service-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
    }
    .service-icon-box {
        width: 40px;
        height: 40px;
        background: var(--blue-light);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
    }
    .service-name-box h4 {
        font-size: 15px;
        font-weight: 700;
        color: var(--text-dark);
        margin-bottom: 2px;
    }
    .service-cat {
        font-size: 11px;
        color: var(--text-soft);
        text-transform: uppercase;
        font-weight: 700;
        letter-spacing: 0.5px;
    }
    .service-price {
        font-size: 14px;
        font-weight: 800;
        color: var(--blue-primary);
    }
    .service-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: auto;
        padding-top: 10px;
        border-top: 1px dashed var(--border);
        font-size: 12px;
        color: var(--text-soft);
    }
    .empty-state {
        text-align: center;
        padding: 40px 20px;
        color: var(--text-soft);
    }
    .empty-state i {
        font-size: 40px;
        margin-bottom: 12px;
        opacity: 0.5;
    }
</style>
@endsection

@section('content')

  <div class="main-profil">
    <!-- Page Header -->
    <div class="page-header">
        <h1>Profil Toko</h1>
        <p>Kelola informasi toko laundry Anda</p>
    </div>

    <!-- Store Hero Card -->
    <div class="store-hero">
        @if($mitra && $mitra->logo)
            <img
                src="{{ asset('storage/' . $mitra->logo) }}"
                class="store-logo"
                alt="Logo">
        @elseif($mitra)
            <div class="store-thumb-placeholder">
                {{ strtoupper(substr($mitra->store_name,0,2)) }}
            </div>
        @endif

        <div class="store-info">
        <div class="store-name-row">
            <span class="store-name">
                {{ $mitra->store_name ?? 'Nama Toko' }}
            </span>
            @if($mitra && $mitra->status === 'approved')
                <div class="verified-badge" title="Toko Terverifikasi"><i class="fas fa-check"></i></div>
            @endif
        </div>
        <div class="rating-row">
            @php
                $avgRating = $mitra ? $mitra->averageRating() : 0;
                $reviewCount = $mitra ? $mitra->reviews()->where('status', 'ok')->count() : 0;
            @endphp
            <span class="stars">
                @for($i=1; $i<=5; $i++)
                    <i class="fa{{ $i <= round($avgRating) ? 's' : 'r' }} fa-star"></i>
                @endfor
            </span>
            <span class="rating-score">{{ number_format($avgRating, 1) }}</span>
            <span class="rating-count">({{ $reviewCount }} ulasan)</span>
        </div>
        <div class="store-meta">
            <div class="meta-item">
            <i class="fas fa-location-dot"></i>
            {{ $mitra->address ?? 'Alamat belum diatur' }}
            </div>
            <div class="meta-item">
            <i class="fas fa-phone"></i>
            {{ $mitra->phone ?? '-' }}
            </div>
            <div class="meta-item">
            <i class="far fa-clock"></i>
            {{ $mitra->operational_hours ?? 'Belum diatur' }}
            </div>
        </div>
        </div>

        <button class="btn-edit"><a href="{{ route('mitra.edit.profil') }}">Edit Profil</a></button>
    </div>

    <!-- Two Column Grid -->
    <div class="grid-2">

        <!-- Informasi Toko -->
        <div class="card">
            <div class="card-title">Informasi Toko</div>
            <table class="info-table">
                <tr>
                    <td>Nama Toko<span class="sep">:</span></td>
                    <td>{{ $mitra->store_name ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Deskripsi<span class="sep">:</span></td>
                    <td>{{ $mitra->description ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Alamat Lengkap<span class="sep">:</span></td>
                    <td>{{ $mitra->address ?? '-' }}</td>
                </tr>
                <tr>
                    <td>No Telepon<span class="sep">:</span></td>
                    <td>{{ $mitra->phone ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Jam Operasional<span class="sep">:</span></td>
                    <td>{{ $mitra->operational_hours ?? 'Belum diatur' }}</td>
                </tr>
            </table>
        </div>

        <!-- Pengaturan Pengiriman -->
        <div class="card">
            <div class="card-title">Pengaturan Pengiriman</div>
            <div class="delivery-rows">
                <div class="delivery-row">
                    <span class="delivery-label">Area Layanan</span>
                    <span class="delivery-value">
                        {{ ($mitra && $mitra->service_radius)
                        ? $mitra->service_radius . ' km'
                        : 'Belum diatur' }}
                    </span>
                </div>
                <div class="delivery-row">
                    <span class="delivery-label">Biaya Pickup</span>
                    <span class="delivery-value">
                        {{ ($mitra && $mitra->pickup_fee)
                        ? 'Rp ' . number_format($mitra->pickup_fee,0,',','.')
                        : 'Belum diatur' }}
                    </span>
                </div>
            </div>
            <button class="btn-delivery">
                <i class="fas fa-sliders"></i> Atur Pengiriman
            </button>
        </div>

    </div>

    <!-- LAYANAN TOKO SECTION -->
    <div class="card" style="margin-bottom: 22px;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <div class="card-title" style="margin-bottom: 0;">Layanan Toko</div>
            <a href="{{ route('mitra.tambah-layanan') }}" style="font-size: 13px; font-weight: 700; color: var(--blue-primary); text-decoration: none;">+ Tambah Layanan</a>
        </div>
        
        @if($mitra && $mitra->layanans->count() > 0)
            <div class="service-grid">
                @foreach($mitra->layanans as $layanan)
                    <div class="service-item">
                        <div class="service-header">
                            <div class="service-name-box">
                                <div class="service-cat">{{ $layanan->kategori }}</div>
                                <h4>{{ $layanan->nama }}</h4>
                            </div>
                            <div class="service-icon-box">
                                @php
                                    $icon = match($layanan->kategori) {
                                        'kiloan' => '🧺',
                                        'satuan' => '👕',
                                        'setrika' => '💨',
                                        'express' => '⚡',
                                        default => '📋'
                                    };
                                @endphp
                                {{ $icon }}
                            </div>
                        </div>
                        <div class="service-price">
                            {{ $layanan->hargaFormatted() }} / {{ $layanan->satuan }}
                        </div>
                        <div class="service-footer">
                            <span><i class="far fa-clock"></i> {{ $layanan->estimasi_hari }} Hari</span>
                            <span style="color: {{ $layanan->is_active ? 'var(--green)' : 'var(--text-soft)' }}">
                                {{ $layanan->is_active ? 'Aktif' : 'Nonaktif' }}
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="empty-state">
                <i class="fas fa-concierge-bell"></i>
                <p>Belum ada layanan yang ditambahkan.</p>
            </div>
        @endif
    </div>

    <!-- RATING & ULASAN SECTION -->
    <div class="grid-2">
        <div class="card">
            <div class="card-title">Rating & Ulasan</div>
            
            @php
                $activeReviews = $mitra ? $mitra->reviews()->where('status', 'ok')->orderByDesc('created_at')->get() : collect();
            @endphp

            @if($activeReviews->count() > 0)
                <div class="rating-hero">
                    <div class="rating-big">{{ number_format($avgRating, 1) }}</div>
                    <div class="rating-detail">
                        <div class="stars-big">
                            @for($i=1; $i<=5; $i++)
                                <i class="fa{{ $i <= round($avgRating) ? 's' : 'r' }} fa-star"></i>
                            @endfor
                        </div>
                        <div class="ulasan-count">{{ $reviewCount }} ulasan terverifikasi</div>
                    </div>
                </div>

                <div class="review-list">
                    @foreach($activeReviews->take(5) as $review)
                        <div class="review-item">
                            @php
                                $colors = ['av-blue', 'av-teal', 'av-orange'];
                                $color = $colors[$loop->index % 3];
                            @endphp
                            <div class="avatar {{ $color }}">
                                {{ strtoupper(substr($review->pelanggan->name ?? 'U', 0, 1)) }}
                            </div>
                            <div class="review-body">
                                <div class="reviewer-row">
                                    <div class="reviewer-name">{{ $review->pelanggan->name ?? 'Pelanggan' }}</div>
                                    <div style="display: flex; align-items: center; gap: 8px;">
                                        <div style="font-size: 11px; color: var(--text-soft);">{{ $review->created_at->diffForHumans() }}</div>
                                        <button type="button" class="btn-report" onclick="openReportModal({{ $review->id }}, '{{ $review->pelanggan->name ?? 'Pelanggan' }}')" style="background: none; border: none; color: var(--error); cursor: pointer; font-size: 11px; font-weight: 600;" title="Laporkan ulasan ini">
                                            <i class="fas fa-flag"></i> Laporkan
                                        </button>
                                    </div>
                                </div>
                                <div class="review-stars">
                                    @for($i=1; $i<=5; $i++)
                                        <i class="fa{{ $i <= $review->rating ? 's' : 'r' }} fa-star"></i>
                                    @endfor
                                </div>
                                <div class="review-text">
                                    {{ $review->komentar ?? 'Tidak ada komentar.' }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                @if($activeReviews->count() > 5)
                    <button class="btn-see-all">Lihat Semua Ulasan</button>
                @endif
            @else
                <div class="empty-state">
                    <i class="fas fa-star-half-alt"></i>
                    <p>Belum ada ulasan dari pelanggan.</p>
                </div>
            @endif
        </div>

        <!-- Performa Toko Singkat -->
        <div class="card">
            <div class="card-title">Performa Toko</div>
            <div class="delivery-rows">
                <div class="delivery-row">
                    <span class="delivery-label">Pesanan Selesai</span>
                    <span class="delivery-value">0</span>
                </div>
                <div class="delivery-row">
                    <span class="delivery-label">Kecepatan Respon</span>
                    <span class="delivery-value">-</span>
                </div>
                <div class="delivery-row">
                    <span class="delivery-label">Kepuasan Pelanggan</span>
                    <span class="delivery-value">{{ number_format($avgRating * 20, 0) }}%</span>
                </div>
            </div>
            <button class="btn-delivery" style="border-color: var(--secondary); color: var(--secondary);">
                <i class="fas fa-chart-line"></i> Lihat Performa Lengkap
            </button>
        </div>
    </div>

  </div>

  <!-- Modal Laporkan Ulasan -->
  <div id="reportModal" class="modal-overlay" style="display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.5); z-index: 9999; align-items: center; justify-content: center;">
      <div class="modal-content" style="background: #fff; width: 90%; max-width: 400px; padding: 24px; border-radius: 16px; box-shadow: var(--shadow-md);">
          <h3 style="margin-bottom: 8px; font-size: 18px; font-weight: 800;">Laporkan Ulasan</h3>
          <p style="font-size: 13px; color: var(--text-soft); margin-bottom: 20px;">Laporkan ulasan dari <strong id="reportedUserName"></strong> jika mengandung kata kasar, spam, atau informasi palsu.</p>
          
          <form action="{{ route('mitra.review.report') }}" method="POST">
              @csrf
              <input type="hidden" name="review_id" id="reportReviewId">
              <div style="margin-bottom: 20px;">
                  <label style="display: block; font-size: 13px; font-weight: 700; margin-bottom: 8px;">Alasan Pelaporan</label>
                  <textarea name="alasan" required style="width: 100%; min-height: 100px; padding: 12px; border: 1px solid var(--border); border-radius: 8px; font-family: inherit; font-size: 13px; resize: none;" placeholder="Tuliskan alasan Anda melaporkan ulasan ini..."></textarea>
              </div>
              <div style="display: flex; gap: 12px;">
                  <button type="button" onclick="closeReportModal()" style="flex: 1; padding: 12px; border: 1px solid var(--border); background: #fff; border-radius: 10px; font-weight: 700; cursor: pointer;">Batal</button>
                  <button type="submit" style="flex: 1; padding: 12px; border: none; background: var(--error); color: #fff; border-radius: 10px; font-weight: 700; cursor: pointer;">Kirim Laporan</button>
              </div>
          </form>
      </div>
  </div>

@endsection

@push('scripts')
<script>
    function openReportModal(reviewId, userName) {
        document.getElementById('reportReviewId').value = reviewId;
        document.getElementById('reportedUserName').textContent = userName;
        document.getElementById('reportModal').style.display = 'flex';
    }

    function closeReportModal() {
        document.getElementById('reportModal').style.display = 'none';
    }

    // Close modal when clicking outside
    window.onclick = function(event) {
        const modal = document.getElementById('reportModal');
        if (event.target == modal) {
            closeReportModal();
        }
    }
</script>
@endpush