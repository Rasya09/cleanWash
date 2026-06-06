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
                <h1>{{ $laundry->store_name }}</h1>

                <div class="dl-rating">
                    @for($i = 1; $i <= 5; $i++)
                        @if($i <= round($averageRating))⭐@else<span style="opacity:0.3">⭐</span>@endif
                    @endfor
                    {{ number_format($averageRating, 1) }}
                    <span class="dl-rating-count">({{ $reviews->count() }} ulasan)</span>
                </div>

                <div class="dl-alamat">
                    <svg width="13" height="15" viewBox="0 0 24 24" fill="#EF4444"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
                    {{ $fullAddress ?: '-' }}
                </div>

                <p class="dl-deskripsi">
                    {{ $laundry->description ?: 'Belum ada deskripsi.' }}
                </p>
            </div>

            {{-- Kanan: Gambar --}}
            <div class="dl-hero-right">
                {{-- Foto utama: foto pertama dari store_photos, fallback ke logo, fallback placeholder --}}
                @php
                    $mainPhoto = $storePhotoUrls->first()
                        ?? $logoUrl
                        ?? 'https://picsum.photos/600/400';
                @endphp
                <img src="{{ $mainPhoto }}" class="dl-main-img" alt="Foto utama {{ $laundry->store_name }}">

                {{-- Thumbnails: foto ke-2 dst, minimal 3 slot --}}
                <div class="dl-thumbnails">
                    @forelse($storePhotoUrls->skip(1)->take(3) as $i => $url)
                        <img src="{{ $url }}" alt="Foto {{ $i + 2 }}">
                    @empty
                        {{-- Placeholder kalau belum ada foto tambahan --}}
                        @for($i = 1; $i <= 3; $i++)
                            <img src="https://picsum.photos/200/150?random={{ $i }}" alt="Foto {{ $i }}">
                        @endfor
                    @endforelse
                </div>
            </div>
        </section>

        {{-- ===================== BODY: DETAIL + SIDEBAR ===================== --}}
        <div class="dl-body">

            {{-- Card Detail: Daftar Layanan --}}
            <div class="dl-card">
                <h2>Daftar Layanan</h2>
                <div class="dl-divider"></div>

                <div class="dl-layanan-list">
                    @forelse($laundry->activeServices as $service)
                    <div class="dl-layanan-item">
                        <span class="dl-layanan-name">{{ $service->service_name }}</span>
                        <span class="dl-layanan-price">
                            Rp {{ number_format($service->base_price, 0, ',', '.') }}/kg
                        </span>
                    </div>
                    @empty
                    <p style="color:#6b7280; font-size:14px; text-align:center; padding:16px;">
                        Belum ada layanan tersedia.
                    </p>
                    @endforelse
                </div>
            </div>

            {{-- Sidebar Pesan --}}
            <div class="dl-sidebar">
                <p class="dl-sidebar-harga-label">Mulai dari</p>
                <p class="dl-sidebar-harga">
                    @if($startingPrice)
                        Rp {{ number_format($startingPrice, 0, ',', '.') }} <span>/kg</span>
                    @else
                        <span style="font-size:14px; color:#6b7280;">Hubungi mitra</span>
                    @endif
                </p>

                <div class="dl-sidebar-divider"></div>

                <div class="dl-sidebar-row">
                    <span class="dl-sidebar-label">JAM OPERASIONAL</span>
                    <div class="dl-info-box">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/>
                        </svg>
                        @if($laundry->open_time && $laundry->close_time)
                            {{ \Carbon\Carbon::parse($laundry->open_time)->format('H:i') }} –
                            {{ \Carbon\Carbon::parse($laundry->close_time)->format('H:i') }}
                        @else
                            -
                        @endif
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
                            {{ strtoupper(substr($review->user->name ?? 'U', 0, 2)) }}
                        </div>
                        <div class="dl-ulasan-meta">
                            <span class="dl-ulasan-name" style="font-weight:600; display:block;">
                                {{ $review->user->name ?? 'Customer' }}
                            </span>
                            <span class="dl-ulasan-time" style="font-size:12px; color:#6b7280;">
                                {{ $review->created_at->diffForHumans() }}
                            </span>
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
                <p style="color:#6b7280; font-size:14px; text-align:center; padding:20px;">
                    Belum ada ulasan untuk laundry ini.
                </p>
                @endforelse
            </div>
        </section>

    </div>{{-- /dl-container --}}
</div>
@endsection