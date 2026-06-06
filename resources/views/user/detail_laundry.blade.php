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
                <h1>Adzril Laundry</h1>

                <div class="dl-rating">
                    ⭐⭐⭐⭐⭐ 4.9
                    <span class="dl-rating-count">(367 ulasan)</span>
                </div>

                <div class="dl-alamat">
                    <svg width="13" height="15" viewBox="0 0 24 24" fill="#EF4444"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
                    Jl. Kebon Jeruk No. 2, Tangerang Selatan
                </div>

                <p class="dl-deskripsi">
                    Adzril Laundry hadir untuk memberikan layanan cuci pakaian yang bersih, rapi, dan wangi.
                    Dengan proses pencucian yang higienis serta tenaga kerja yang berpengalaman, kami siap
                    membantu menjaga pakaian Anda tetap dalam kondisi terbaik setiap hari.
                </p>
            </div>

            {{-- Kanan: Gambar --}}
            <div class="dl-hero-right">
                <img src="https://picsum.photos/600/400" class="dl-main-img" alt="Foto utama laundry">
                <div class="dl-thumbnails">
                    <img src="https://picsum.photos/200/150?random=1" alt="Foto 1">
                    <img src="https://picsum.photos/200/150?random=2" alt="Foto 2">
                    <img src="https://picsum.photos/200/150?random=3" alt="Foto 3">
                </div>
            </div>
        </section>

        {{-- ===================== BODY: DETAIL + SIDEBAR ===================== --}}
        <div class="dl-body">

            {{-- Card Detail: Hanya berisi Daftar Layanan --}}
            <div class="dl-card">
                <h2>Daftar Layanan</h2>
                <div class="dl-divider"></div>

                <div class="dl-layanan-list">
                    <div class="dl-layanan-item">
                        <span class="dl-layanan-name">Cuci Kiloan</span>
                        <span class="dl-layanan-price">Rp 5.000/kg</span>
                    </div>
                    <div class="dl-layanan-item">
                        <span class="dl-layanan-name">Cuci Setrika</span>
                        <span class="dl-layanan-price">Rp 7.000/kg</span>
                    </div>
                    <div class="dl-layanan-item">
                        <span class="dl-layanan-name">Setrika Saja</span>
                        <span class="dl-layanan-price">Rp 4.000/kg</span>
                    </div>
                </div>
            </div>

            {{-- Sidebar Pesan --}}
            <div class="dl-sidebar">
                <p class="dl-sidebar-harga-label">Mulai dari</p>
                <p class="dl-sidebar-harga">Rp 5.000 <span>/kg</span></p>

                <div class="dl-sidebar-divider"></div>

                <div class="dl-sidebar-row">
                    <span class="dl-sidebar-label">Jam Operasional</span>
                    <div class="dl-info-box">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/>
                        </svg>
                        09:00 – 21:00
                    </div>
                </div>

                
                <a href="{{ route('user.buat-pesanan') }}" class="dl-btn-pesan">
                    Pesan Sekarang
                </a>
            </div>

        </div>{{-- /dl-body --}}

        {{-- ===================== ULASAN ===================== --}}
        <section class="dl-ulasan">
            <h2>Ulasan Customer</h2>

            <div class="dl-ulasan-list">
                @forelse($reviews as $review)
                <div class="dl-ulasan-item" style="border-bottom: 1px solid #e5e7eb; padding-bottom: 16px; margin-bottom: 16px;">
                    <div class="dl-ulasan-header" style="display:flex; align-items:center; gap:12px; margin-bottom:8px;">
                        <div class="dl-ulasan-avatar" style="width:40px; height:40px; background:#e0e7ff; color:#4f46e5; border-radius:50%; display:flex; align-items:center; justify-content:center; font-weight:bold;">
                            {{ strtoupper(substr($review->user->name ?? 'User', 0, 2)) }}
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
                        {{ $review->comment ?? 'Tidak ada komentar.' }}
                    </p>
                    
                    @if($review->reply)
                    <div style="margin-top:12px; padding:12px; background:#f9fafb; border-left:4px solid #3b82f6; border-radius:4px;">
                        <p style="font-size:13px; font-weight:600; color:#1e3a8a; margin-bottom:4px;">Balasan Mitra:</p>
                        <p style="font-size:13px; color:#4b5563; line-height:1.4;">{{ $review->reply }}</p>
                    </div>
                    @endif
                </div>
                @empty
                <p style="color:#6b7280; font-size:14px; text-align:center; padding:20px;">Belum ada ulasan untuk laundry ini.</p>
                @endforelse
            </div>
        </section>

    </div>{{-- /dl-container --}}
</div>
@endsection