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
                <div class="dl-ulasan-item">
                    <div class="dl-ulasan-header">
                        <div class="dl-ulasan-avatar">AD</div>
                        <div class="dl-ulasan-meta">
                            <span class="dl-ulasan-name">Adzril</span>
                            <span class="dl-ulasan-time">5 jam lalu</span>
                        </div>
                    </div>
                    <div class="dl-ulasan-stars">⭐⭐⭐⭐⭐</div>
                    <p class="dl-ulasan-text">
                        Pelayanan sangat baik, cucian bersih, wangi, barang lengkap dan pelayan sangat ramah,
                        puas banget dengan Adzril Laundry!
                    </p>
                </div>

                <div class="dl-ulasan-item">
                    <div class="dl-ulasan-header">
                        <div class="dl-ulasan-avatar">SK</div>
                        <div class="dl-ulasan-meta">
                            <span class="dl-ulasan-name">Sukir</span>
                            <span class="dl-ulasan-time">2 hari lalu</span>
                        </div>
                    </div>
                    <div class="dl-ulasan-stars">⭐⭐⭐⭐⭐</div>
                    <p class="dl-ulasan-text">
                        Pelayanan sangat baik, cucian bersih, wangi, barang lengkap dan pelayan sangat ramah,
                        puas banget dengan Adzril Laundry!
                    </p>
                </div>
            </div>
        </section>

    </div>{{-- /dl-container --}}
</div>
@endsection