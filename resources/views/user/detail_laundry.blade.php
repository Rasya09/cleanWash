@extends('user.layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/detail_laundry.css') }}?v=2">
@endsection

@section('content')
<div class="detail-laundry">
    <div class="dl-container">

        {{-- ===================== HERO ===================== --}}
        <section class="dl-hero">
            {{-- Kiri: Info --}}
            <div class="dl-hero-left">
                <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                    <h1>{{ $laundry->store_name }}</h1>
                    <button type="button" onclick="openReportStoreModal()" style="background: #fef2f2; color: #dc2626; border: 1px solid #fecaca; padding: 6px 12px; border-radius: 8px; font-size: 12px; font-weight: 600; cursor: pointer; display: flex; align-items: center; gap: 6px;">
                        <i class="fas fa-flag"></i> Laporkan Toko
                    </button>
                </div>

                <div class="dl-rating">
                    @php
                        $avg = $laundry->averageRating();
                        $rcount = $laundry->reviews()->where('status', 'ok')->count();
                    @endphp
                    @for($i=1; $i<=5; $i++)
                        {{ $i <= round($avg) ? '★' : '☆' }}
                    @endfor
                    {{ number_format($avg, 1) }}
                    <span class="dl-rating-count">({{ $rcount }} ulasan)</span>
                </div>

                <div class="dl-alamat">
                    <svg width="13" height="15" viewBox="0 0 24 24" fill="#EF4444"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
                    {{ $laundry->address }}
                </div>

                <p class="dl-deskripsi">
                    {{ $laundry->description ?? 'Belum ada deskripsi untuk toko ini.' }}
                </p>
            </div>

            {{-- Kanan: Gambar --}}
            <div class="dl-hero-right">
                @if($laundry->logo)
                    <img src="{{ asset('storage/' . $laundry->logo) }}" class="dl-main-img" alt="Foto utama laundry">
                @else
                    <img src="https://picsum.photos/600/400" class="dl-main-img" alt="Foto utama laundry">
                @endif
                <div class="dl-thumbnails">
                    @php
                        $photos = collect($laundry->store_photos ?? []);
                    @endphp
                    @foreach($photos as $photo)
                        <img src="{{ asset('storage/' . $photo) }}" alt="Foto Toko">
                    @endforeach
                </div>
            </div>
        </section>

        {{-- ===================== BODY: DETAIL + SIDEBAR ===================== --}}
        <div class="dl-body">
            {{-- Card Detail --}}
            <div class="dl-card">
                <h2>Tentang Laundry</h2>
                <div class="dl-divider"></div>

                <p class="dl-card-desc">
                    {{ $laundry->description ?? 'Belum ada informasi tambahan.' }}
                </p>

                <p class="dl-layanan-title">Daftar Layanan</p>
                <div class="dl-layanan-list">
                    @forelse($laundry->layanans as $layanan)
                        <div class="dl-layanan-item">
                            <span class="dl-layanan-name">{{ $layanan->nama }}</span>
                            <span class="dl-layanan-price">{{ $layanan->hargaFormatted() }}/{{ $layanan->satuan }}</span>
                        </div>
                    @empty
                        <p style="color:#6b7280; font-size:14px;">Belum ada layanan tersedia.</p>
                    @endforelse
                </div>
            </div>

            {{-- Sidebar Pesan --}}
            <div class="dl-sidebar">
                <p class="dl-sidebar-harga-label">Mulai dari</p>
                <p class="dl-sidebar-harga">Rp {{ number_format($laundry->layanans->min('harga') ?? 0, 0, ',', '.') }} <span>/{{ $laundry->layanans->first()?->satuan ?? 'kg' }}</span></p>

                <div class="dl-sidebar-divider"></div>

                <div class="dl-sidebar-row">
                    <span class="dl-sidebar-label">Jam Operasional</span>
                    <div class="dl-info-box">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/>
                        </svg>
                        {{ $laundry->operational_hours ?? '09:00 – 21:00' }}
                    </div>
                </div>

                <div class="dl-sidebar-row">
                    <span class="dl-sidebar-label">Estimasi Waktu</span>
                    <div class="dl-estimasi-grid">
                        <div class="dl-estimasi-item">
                            <span class="label">Regular</span>
                            <span class="value">{{ $laundry->layanans->where('subkategori', 'reguler')->first()?->estimasi_hari ?? '2-3' }} hari</span>
                        </div>
                        <div class="dl-estimasi-item express">
                            <span class="label">Express</span>
                            <span class="value">{{ $laundry->layanans->where('subkategori', 'express')->first()?->estimasi_hari ?? '-' }} hari</span>
                        </div>
                    </div>
                </div>

                <div class="dl-sidebar-row">
                    <span class="dl-sidebar-label">Layanan Tambahan</span>
                    <div class="dl-info-box">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M5 12h14M12 5l7 7-7 7"/>
                        </svg>
                        Radius Layanan: {{ $laundry->service_radius ?? '-' }} km
                    </div>
                </div>

                <a href="{{ route('user.buat-pesanan', $laundry->id) }}" class="dl-btn-pesan">
                    Pesan Sekarang
                </a>
            </div>

        </div>{{-- /dl-body --}}

        {{-- ===================== ULASAN ===================== --}}
        <section class="dl-ulasan">
            <h2>Ulasan Customer</h2>

            <div class="dl-ulasan-list">
                @php
                    $activeReviews = $laundry->reviews()->where('status', 'ok')->latest()->get();
                @endphp
                @forelse($activeReviews as $review)
                <div class="dl-ulasan-item" style="border-bottom: 1px solid #e5e7eb; padding-bottom: 16px; margin-bottom: 16px;">
                    <div class="dl-ulasan-header" style="display:flex; align-items:center; gap:12px; margin-bottom:8px;">
                        <div class="dl-ulasan-avatar" style="width:40px; height:40px; background:#e0e7ff; color:#4f46e5; border-radius:50%; display:flex; align-items:center; justify-content:center; font-weight:bold;">
                            {{ strtoupper(substr($review->user->name ?? 'U', 0, 2)) }}
                        </div>
                        <div class="dl-ulasan-meta">
                            <span class="dl-ulasan-name" style="font-weight:600; display:block;">{{ $review->user->name ?? 'Customer' }}</span>
                            <span class="dl-ulasan-time" style="font-size:12px; color:#6b7280;">{{ $review->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                    <div class="dl-ulasan-stars" style="color:#F59E0B; margin-bottom:8px;">
                        {!! str_repeat('★', $review->rating) !!}{!! str_repeat('<span style="color:#d1d5db;">★</span>', 5 - $review->rating) !!}
                    </div>
                    <p class="dl-ulasan-text" style="font-size:14px; color:#374151; line-height:1.5;">
                        {{ $review->komentar ?? 'Tidak ada komentar.' }}
                    </p>
                </div>
                @empty
                <p style="color:#6b7280; font-size:14px; text-align:center; padding:20px;">Belum ada ulasan untuk laundry ini.</p>
                @endforelse
            </div>
        </section>

    </div>{{-- /dl-container --}}
</div>

{{-- MODAL LAPORKAN TOKO --}}
<div id="reportStoreModal" style="display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.5); z-index: 9999; align-items: center; justify-content: center;">
    <div style="background: #fff; width: 90%; max-width: 450px; padding: 28px; border-radius: 20px; box-shadow: 0 20px 25px -5px rgba(0,0,0,0.1);">
        <h3 style="margin-bottom: 8px; font-size: 20px; font-weight: 800; color: #111827;">Laporkan Toko</h3>
        <p style="font-size: 14px; color: #6b7280; margin-bottom: 24px;">Bantu kami memahami apa yang terjadi di <strong>{{ $laundry->store_name }}</strong>. Laporan Anda bersifat rahasia.</p>
        
        <form action="{{ route('user.laundry.report') }}" method="POST">
            @csrf
            <input type="hidden" name="mitra_id" value="{{ $laundry->id }}">
            
            <div style="margin-bottom: 20px;">
                <label style="display: block; font-size: 14px; font-weight: 700; color: #374151; margin-bottom: 10px;">Alasan Pelaporan</label>
                <select name="alasan_kategori" onchange="updateAlasanText(this)" style="width: 100%; padding: 12px; border: 1px solid #d1d5db; border-radius: 10px; font-size: 14px; margin-bottom: 12px; font-family: inherit;">
                    <option value="">Pilih alasan...</option>
                    <option value="Penipuan / Fraud">Penipuan / Fraud</option>
                    <option value="Layanan Tidak Sesuai">Layanan Tidak Sesuai</option>
                    <option value="Perilaku Tidak Menyenangkan">Perilaku Tidak Menyenangkan</option>
                    <option value="Informasi Toko Palsu">Informasi Toko Palsu</option>
                    <option value="Lainnya">Lainnya</option>
                </select>
                <textarea name="alasan" id="alasanTextarea" required style="width: 100%; min-height: 120px; padding: 14px; border: 1px solid #d1d5db; border-radius: 12px; font-family: inherit; font-size: 14px; resize: none;" placeholder="Ceritakan lebih detail mengenai laporan Anda..."></textarea>
            </div>

            <div style="display: flex; gap: 12px;">
                <button type="button" onclick="closeReportStoreModal()" style="flex: 1; padding: 14px; border: 1px solid #e5e7eb; background: #fff; border-radius: 12px; font-weight: 700; color: #4b5563; cursor: pointer; transition: all 0.2s;">Batal</button>
                <button type="submit" style="flex: 1; padding: 14px; border: none; background: #dc2626; color: #fff; border-radius: 12px; font-weight: 700; cursor: pointer; transition: all 0.2s;">Kirim Laporan</button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    function openReportStoreModal() {
        document.getElementById('reportStoreModal').style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }

    function closeReportStoreModal() {
        document.getElementById('reportStoreModal').style.display = 'none';
        document.body.style.overflow = '';
    }

    function updateAlasanText(select) {
        const textarea = document.getElementById('alasanTextarea');
        if(select.value && select.value !== 'Lainnya') {
            textarea.value = "[" + select.value + "] ";
            textarea.focus();
        }
    }

    // Close modal when clicking outside
    window.onclick = function(event) {
        const modal = document.getElementById('reportStoreModal');
        if (event.target == modal) {
            closeReportStoreModal();
        }
    }
</script>
@endpush
@endsection