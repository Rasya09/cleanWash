@extends('user.layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/detail_laundry.css') }}?v=3">
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
                        ⭐⭐⭐⭐⭐ {{ number_format($reviews->avg('rating') ?? 0, 1) }}
                        <span class="dl-rating-count">({{ $reviews->count() }} ulasan)</span>
                    </div>

                    <div class="dl-alamat">
                        <svg width="13" height="15" viewBox="0 0 24 24" fill="#EF4444">
                            <path
                                d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" />
                        </svg>
                        {{ $laundry->address }}, {{ $laundry->village }}, {{ $laundry->district }}, {{ $laundry->city }},
                        {{ $laundry->province }}
                    </div>

                    <p class="dl-deskripsi">
                        {{ $laundry->description ?? 'Laundry profesional siap melayani kebutuhan Anda dengan sepenuh hati.' }}
                    </p>
                </div>

            {{-- Kanan: Gambar --}}
            <div class="dl-hero-right">
                @php
                    $photos = is_array($laundry->store_photos) ? $laundry->store_photos : (json_decode($laundry->store_photos, true) ?? []);
                    $mainPhoto = count($photos) > 0 ? asset('storage/' . $photos[0]) : asset('storage/' . $laundry->logo);
                @endphp
                <img src="{{ $mainPhoto }}" id="mainPhoto" class="dl-main-img" alt="Foto utama laundry" style="object-fit: cover; height: 100%;">
                <div class="dl-thumbnails">
                    @foreach(array_slice($photos, 0, 4) as $photo)
                        <img src="{{ asset('storage/' . $photo) }}" alt="Foto toko" style="object-fit: cover; cursor: pointer;" onclick="document.getElementById('mainPhoto').src=this.src">
                    @endforeach
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
                    @if(isset($laundry->services) && $laundry->services->count() > 0)
                        @foreach($laundry->services as $service)
                            @php
                                $namaLayananLower = strtolower($service->service_name);
                                $isKiloan = str_contains($namaLayananLower, 'cuci kering') || str_contains($namaLayananLower, 'setrika');
                                $unit = $isKiloan ? 'kg' : (str_contains($namaLayananLower, 'sepatu') ? 'pasang' : (str_contains($namaLayananLower, 'karpet') ? 'meter' : 'pcs'));
                            @endphp
                            <div class="dl-layanan-item">
                                <span class="dl-layanan-name">{{ $service->service_name }}</span>
                                <span class="dl-layanan-price">Rp {{ number_format($service->base_price, 0, ',', '.') }}/{{ $unit }}</span>
                            </div>
                        @endforeach
                    @else
                        <div class="dl-layanan-item" style="color:#6b7280; font-size:14px; border:none;">
                            Belum ada layanan yang ditambahkan oleh mitra.
                        </div>
                    @endif
                </div>
            </div>

                {{-- Sidebar Pesan --}}
                <div class="dl-sidebar">
                    <p class="dl-sidebar-harga-label">Mulai dari</p>
                    @php
                        $cheapestService =
                            isset($laundry->services) && $laundry->services->count() > 0
                                ? $laundry->services->sortBy('base_price')->first()
                                : null;
                        if ($cheapestService) {
                            $namaLayananLower = strtolower($cheapestService->service_name);
                            $isKiloan =
                                str_contains($namaLayananLower, 'cuci kering') ||
                                str_contains($namaLayananLower, 'setrika');
                            $unit = $isKiloan
                                ? 'kg'
                                : (str_contains($namaLayananLower, 'sepatu')
                                    ? 'pasang'
                                    : (str_contains($namaLayananLower, 'karpet')
                                        ? 'meter'
                                        : 'pcs'));
                            $minPrice = $cheapestService->base_price;
                        } else {
                            $minPrice = 0;
                            $unit = 'kg';
                        }
                    @endphp
                    <p class="dl-sidebar-harga">Rp {{ number_format($minPrice, 0, ',', '.') }}
                        <span>/{{ $unit }}</span>
                    </p>

                <div class="dl-sidebar-divider"></div>

                <div class="dl-sidebar-row" style="margin-bottom: 12px;">
                    <span class="dl-sidebar-label">HARI OPERASIONAL</span>
                    <div class="dl-info-box">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin-right: 6px;">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line>
                        </svg>
                        @if(!empty($laundry->operational_days) && is_array($laundry->operational_days))
                            {{ implode(', ', $laundry->operational_days) }}
                        @else
                            Tiap Hari
                        @endif
                    </div>
                </div>

                    <div class="dl-sidebar-row">
                        <span class="dl-sidebar-label">JAM OPERASIONAL</span>
                        <div class="dl-info-box">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2">
                                <circle cx="12" cy="12" r="10" />
                                <path d="M12 6v6l4 2" />
                            </svg>
                            @if ($laundry->open_time && $laundry->close_time)
                                {{ \Carbon\Carbon::parse($laundry->open_time)->format('H:i') }} –
                                {{ \Carbon\Carbon::parse($laundry->close_time)->format('H:i') }}
                            @else
                                -
                            @endif
                        </div>
                    </div>

                    @if (isset($laundry->services) && $laundry->services->count() > 0)
                        <a href="{{ route('user.chat', ['contact_id' => $laundry->user_id]) }}" class="dl-btn-chat"
                            style="display: flex; justify-content: center; align-items: center; gap: 8px; background-color: #10B981; color: white; padding: 14px; border-radius: 12px; font-weight: 600; font-size: 15px; text-decoration: none; margin-bottom: 12px; transition: all 0.2s; border: 1px solid #059669;">
                            Chat Mitra
                        </a>

                        <a href="{{ route('user.buat-pesanan', ['laundry_id' => $laundry->id]) }}" class="dl-btn-pesan">
                            Pesan Sekarang
                        </a>
                    @else
                        <button class="dl-btn-pesan" style="background-color: #9CA3AF; cursor: not-allowed;" disabled>
                            Belum Ada Layanan
                        </button>
                    @endif
                </div>

            </div>{{-- /dl-body --}}

            {{-- ===================== ULASAN ===================== --}}
            <section class="dl-ulasan">
                <h2>Ulasan Customer</h2>

                <div class="dl-ulasan-list">
                    @forelse($reviews as $review)
                        <div class="dl-ulasan-item"
                            style="border-bottom: 1px solid #e5e7eb; padding-bottom: 16px; margin-bottom: 16px;">
                            <div class="dl-ulasan-header"
                                style="display:flex; align-items:center; gap:12px; margin-bottom:8px;">
                                <div class="dl-ulasan-avatar"
                                    style="width:40px; height:40px; background:#e0e7ff; color:#4f46e5; border-radius:50%; display:flex; align-items:center; justify-content:center; font-weight:bold;">
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

                            @if ($review->reply)
                                <div
                                    style="margin-top:12px; padding:12px; background:#f9fafb; border-left:4px solid #3b82f6; border-radius:4px;">
                                    <p style="font-size:13px; font-weight:600; color:#1e3a8a; margin-bottom:4px;">Balasan
                                        Mitra:</p>
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
