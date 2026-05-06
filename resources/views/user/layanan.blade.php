@extends('user.layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/layanan.css') }}">
@endsection

@section('content')
<!-- ── LAYANAN LAUNDRY ── -->
<section class="services-section">
    <div class="container">
        <h2 class="section-center-title">Cari Laundry Dengan Layanan</h2>
        <div class="services-grid" id="services-grid">
            <!-- card 1 -->
            <div class="service-card">
                <span class="service-badge">🔥 Terpopuler</span>
                <div class="service-card__top">
                    <div class="service-card__text">
                        <h3 class="service-card__name">Cuci Kiloan</h3>
                        <p class="service-card__desc">Cocok untuk kebutuhan laundry harian</p>
                    </div>
                    <img src="{{ asset('assets/images/kiloan.png') }}" alt="Cuci Kiloan" class="service-card__image" />
                </div>
                <button class="btn-service-detail" onclick="alert('Pressed!')">Cari Laundry</button>
            </div>
            <!-- card 2 -->
            <div class="service-card">
                <span class="service-badge">🔥 Terpopuler</span>
                <div class="service-card__top">
                    <div class="service-card__text">
                        <h3 class="service-card__name">Cuci Satuan</h3>
                        <p class="service-card__desc">Untuk pakaian tertentu dengan perhitungan satuan</p>
                    </div>
                    <img src="{{ asset('assets/images/satuan.png') }}" alt="Cuci Satuan" class="service-card__image" />
                </div>
                <button class="btn-service-detail" onclick="alert('Pressed!')">Cari Laundry</button>
            </div>                
            <!-- card 3 -->
            <div class="service-card">
                <div class="service-card__top">
                    <div class="service-card__text">
                        <h3 class="service-card__name">Cuci Express</h3>
                        <p class="service-card__desc">Selesai lebih cepat dari layanan biasa</p>
                    </div>
                    <img src="{{ asset('assets/images/express.png') }}" alt="Cuci Express" class="service-card__image" />
                </div>
                <button class="btn-service-detail" onclick="alert('Pressed!')">Cari Laundry</button>
            </div>
            <!-- card 4 -->
            <div class="service-card">
                <div class="service-card__top">
                    <div class="service-card__text">
                        <h3 class="service-card__name">Cuci Sepatu</h3>
                        <p class="service-card__desc">Perawatan sepatu agar tetap bersih dan awet</p>
                    </div>
                    <img src="{{ asset('assets/images/sepatu.png') }}" alt="Cuci Sepatu" class="service-card__image" />
                </div>
                <button class="btn-service-detail" onclick="alert('Pressed!')">Cari Laundry</button>
            </div>
            <!-- card 5 -->
            <div class="service-card">
                <div class="service-card__top">
                    <div class="service-card__text">
                        <h3 class="service-card__name">Cuci Tas</h3>
                        <p class="service-card__desc">Bersihkan tas tanpa merusak bahan</p>
                    </div>
                    <img src="{{ asset('assets/images/tas.png') }}" alt="Cuci Tas" class="service-card__image" />
                </div>
                <button class="btn-service-detail" onclick="alert('Pressed!')">Cari Laundry</button>
            </div>
            <!-- card 6 -->
            <div class="service-card">
                <div class="service-card__top">
                    <div class="service-card__text">
                        <h3 class="service-card__name">Cuci Karpet</h3>
                        <p class="service-card__desc">Untuk karpet dan item besar</p>
                    </div>
                    <img src="{{ asset('assets/images/karpet.png') }}" alt="Cuci Karpet" class="service-card__image" />
                </div>
                <button class="btn-service-detail" onclick="alert('Pressed!')">Cari Laundry</button>
            </div>
        </div>
    </div>
</section>
@endsection