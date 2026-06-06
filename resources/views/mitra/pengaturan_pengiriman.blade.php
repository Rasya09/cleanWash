@extends('mitra.layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/mitra/pengatur_pengiriman.css') }}">
@endsection

@section('content')
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: '{{ session('success') }}'
            });
        </script>
    @endif

    <div class="main-pengiriman">
        <!-- Page Header -->
        <div class="page-header">
            <button class="btn-back" onclick="history.back()">
                <i class="fas fa-arrow-left"></i>
            </button>
            <div class="header-text">
                <h1>Pengaturan Pengiriman</h1>
                <p>Kelola area layanan dan biaya pengiriman toko Anda</p>
            </div>
        </div>
        <form action="{{ route('mitra.pengiriman.update') }}" method="POST" id="pengiriman-form">
            @csrf
            <!-- Summary -->
            <div class="summary-card">
                <h3>
                    <i class="fas fa-eye"></i>
                    Ringkasan Pengaturan
                </h3>
                <div class="summary-grid">
                    <div class="summary-item">
                        <span class="s-label">
                            Area Layanan
                        </span>
                        <span class="s-value" id="sum-area">
                            {{ $mitra->service_radius ?? 5 }} km
                        </span>
                    </div>
                    <div class="summary-item">
                        <span class="s-label">
                            Biaya Pickup
                        </span>
                        <span class="s-value" id="sum-pickup">
                            Rp {{ number_format($mitra->pickup_fee ?? 0, 0, ',', '.') }}
                        </span>
                    </div>
                </div>
            </div>
            <!-- Card -->
            <div class="card">
                <div class="card-title">
                    <i class="fas fa-map-location-dot"></i>
                    Area Layanan
                </div>
                <div class="form-grid">
                    <!-- Radius -->
                    <div class="form-group full">
                        <label class="form-label">
                            Radius Jangkauan Pickup & Antar
                            <span class="required">*</span>
                        </label>
                        <div class="range-wrap">
                            <div class="range-header">
                                <span>
                                    Geser untuk atur jarak
                                </span>
                                <span class="range-value" id="radius-val">
                                    {{ $mitra->service_radius ?? "" }} km
                                </span>
                            </div>
                            <input type="range" id="radius-slider" min="1" max="25"
                                value="{{ $mitra->service_radius ?? 5 }}" oninput="updateRadius(this.value)">
                            <input type="hidden" name="service_radius" id="radius-input"
                                value="{{ $mitra->service_radius ?? 5 }}">
                            <div class="range-ticks">
                                <span>1 km</span>
                                <span>5 km</span>
                                <span>10 km</span>
                                <span>15 km</span>
                                <span>20 km</span>
                                <span>25 km</span>
                            </div>
                        </div>
                        <div class="info-box info-blue">
                            <i class="fas fa-circle-info"></i>
                            <span>
                                Pelanggan di luar radius ini tidak dapat menggunakan layanan pickup.
                            </span>
                        </div>
                    </div>
                    <!-- Pickup Fee -->
                    <div class="form-group">
                        <label class="form-label">
                            Biaya Pickup
                            <span class="required">*</span>
                        </label>
                        <div class="input-addon">
                            <span class="addon-pre">
                                Rp
                            </span>
                            <input type="text" class="form-input" id="pickup-display"
                                value="{{ number_format($mitra->pickup_fee ?? 0, 0, ',', '.') }}" oninput="formatPickup(this)">
                        </div>
                        <input type="hidden" name="pickup_fee" id="pickup-hidden" value="{{ $mitra->pickup_fee ?? 0 }}">
                        <span class="form-hint">
                            Biaya yang dikenakan ketika kurir menjemput pakaian pelanggan.
                        </span>
                    </div>
                </div>
            </div>
            <!-- Action -->
            <div class="action-bar">
                <button type="submit" class="btn-save">
                    <i class="fas fa-save"></i>
                    Simpan Pengaturan
                </button>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        function updateRadius(value) {
            document.getElementById(
                    'radius-val'
                ).innerText =
                value + ' km';
            document.getElementById(
                    'radius-input'
                ).value =
                value;
            document.getElementById(
                    'sum-area'
                ).innerText =
                value + ' km';
            const percent =
                ((value - 1) / (25 - 1)) * 100;
            document.getElementById(
                    'radius-slider'
                ).style.background =
                `linear-gradient(
            to right,
            #2563eb ${percent}%,
            #e5e7eb ${percent}%
        )`;
        }
        function formatPickup(input) {
            let raw =
                input.value.replace(/\D/g, '');
            let value =
                parseInt(raw || 0);
            input.value =
                value.toLocaleString('id-ID');
            document.getElementById(
                    'pickup-hidden'
                ).value =
                value;
            document.getElementById(
                    'sum-pickup'
                ).innerText =
                'Rp ' +
                value.toLocaleString('id-ID');
        }
        document
            .getElementById('pengiriman-form')
            .addEventListener('submit', function(e) {
                const radius =
                    document.getElementById(
                        'radius-input'
                    ).value;
                const pickup =
                    document.getElementById(
                        'pickup-hidden'
                    ).value;
                if (radius == '' || pickup == '') {
                    e.preventDefault();
                    Swal.fire({
                        icon: 'warning',
                        title: 'Data Belum Lengkap',
                        text: 'Mohon lengkapi seluruh pengaturan pengiriman.'
                    });
                    return false;
                }
            });
        window.onload = function() {
            updateRadius(
                document.getElementById(
                    'radius-slider'
                ).value
            );
        };
    </script>
@endpush
