@extends('mitra.layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/mitra/profil_toko.css') }}">
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
            @if ($mitra->logo)
                <img src="{{ asset('storage/' . $mitra->logo) }}" class="store-logo" alt="Logo">
            @else
                <div class="store-thumb-placeholder">
                    {{ strtoupper(substr($mitra->store_name, 0, 2)) }}
                </div>
            @endif

            <div class="store-info">
                <div class="store-name-row">
                    <span class="store-name">
                        {{ $mitra->store_name }}
                    </span>
                    <div class="verified-badge"><i class="fas fa-check"></i></div>
                </div>
                <div class="rating-row">
                    <span class="stars">★★★★★</span>
                    <span class="rating-score">4.8</span>
                    <span class="rating-count">(120 ulasan)</span>
                </div>
                <div class="store-meta">
                    <div class="meta-item">
                        <i class="fas fa-location-dot"></i>
                        {{ $mitra->address }}
                    </div>
                    <div class="meta-item">
                        <i class="fas fa-phone"></i>
                        {{ $mitra->phone }}
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
                        <td>{{ $mitra->store_name }}</td>
                    </tr>
                    <tr>
                        <td>Deskripsi<span class="sep">:</span></td>
                        <td>{{ $mitra->description }}</td>
                    </tr>
                    <tr>
                        <td>Alamat Lengkap<span class="sep">:</span></td>
                        <td>{{ $mitra->address }}</td>
                    </tr>
                    <tr>
                        <td>No Telepon<span class="sep">:</span></td>
                        <td>{{ $mitra->phone }}</td>
                    </tr>
                    <tr>
                        <td>Jam Operasional<span class="sep">:</span></td>
                        <td>
                            @if ($mitra->operational_days && $mitra->open_time && $mitra->close_time)
                                {{ $mitra->open_time }}
                                -
                                {{ $mitra->close_time }}
                                WIB
                                ({{ implode(', ', $mitra->operational_days) }})
                            @else
                                Belum diatur
                            @endif
                        </td>
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
                            {{ $mitra->service_radius ? $mitra->service_radius . ' km' : 'Belum diatur' }}
                        </span>
                    </div>
                    <div class="delivery-row">
                        <span class="delivery-label">Biaya Pickup</span>
                        <span class="delivery-value">
                            {{ $mitra->pickup_fee ? 'Rp ' . number_format($mitra->pickup_fee, 0, ',', '.') : 'Belum diatur' }}
                        </span>
                    </div>
                </div>
                <a href="{{ route('mitra.pengiriman') }}">
                    <button class="btn-delivery">
                        <i class="fas fa-sliders"></i> Atur Pengiriman
                    </button>
                </a>
            </div>

        </div>
    </div>
@endsection
