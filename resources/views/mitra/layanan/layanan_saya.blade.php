@extends('mitra.layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/mitra/layanan_saya.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/mitra/tambah_layanan.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/mitra/edit_layanan.css') }}">
@endsection

@section('content')
    <div class="main">
        <!-- Content -->
        <main class="content">
            {{-- Section Daftar Layanan Saya --}}
            <div id="layananSayaList">
                <div class="page-header">
                    <div>
                        <h1>Layanan Saya</h1>
                        <p>Kelola dan pantau semua jenis layanan laundry yang Anda tawarkan.</p>
                    </div>
                    <button class="btn-primary" onclick="window.location.href='{{ route('mitra.tambah-layanan') }}'">
                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" stroke="currentColor"
                            stroke-width="2.2" stroke-linecap="round">
                            <path d="M7 2v10M2 7h10" />
                        </svg>
                        Tambah Layanan
                    </button>
                </div>

                <!-- Stats -->
                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-icon blue">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor"
                                stroke-width="1.6">
                                <rect x="3" y="3" width="14" height="14" rx="3" />
                                <path d="M7 8h6M7 11h4" />
                            </svg>
                        </div>
                        <div>
                            <div class="stat-label">Total Layanan</div>
                            <div class="stat-value">{{ $totalServices }}</div>
                            <div class="stat-unit">layanan</div>
                        </div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-icon green">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor"
                                stroke-width="1.7">
                                <circle cx="10" cy="10" r="7" />
                                <path d="M7 10l2 2 4-4" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <div>
                            <div class="stat-label">Layanan Aktif</div>
                            <div class="stat-value">{{ $activeServices }}</div>
                            <div class="stat-unit">layanan</div>
                        </div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-icon orange">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor"
                                stroke-width="1.7">
                                <circle cx="10" cy="10" r="7" />
                                <path d="M10 7v4M10 13v.5" stroke-linecap="round" />
                            </svg>
                        </div>
                        <div>
                            <div class="stat-label">Layanan Nonaktif</div>
                            <div class="stat-value">{{ $inactiveServices }}</div>
                            <div class="stat-unit">layanan</div>
                        </div>
                    </div>
                </div>

                <!-- Table Card -->
                <div class="table-card">
                    <table>
                        <thead>
                            <tr>
                                <th>Nama Layanan</th>
                                <th>Harga</th>
                                <th>Estimasi</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($services as $service)
                                <tr>
                                    <td>
                                        <div class="service-row">
                                            <div>
                                                <div class="service-name">
                                                    {{ $service->service_name }}
                                                </div>
                                                <div class="service-desc">
                                                    Hari:
                                                    {{ implode(', ', $service->operational_days ?? []) }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="price">
                                            Rp {{ number_format($service->base_price, 0, ',', '.') }}
                                            / kg
                                        </div>
                                        @if ($service->minimum_order)
                                            <div class="price-sub">
                                                Minimal
                                                {{ $service->minimum_order }}
                                                kg
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="estimation">
                                            {{ $service->estimated_days }}
                                            Hari
                                            <small>
                                                Pengerjaan
                                            </small>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="toggle-wrap">
                                            @if ($service->is_active)
                                                <span class="toggle-label on">
                                                    Aktif
                                                </span>
                                            @else
                                                <span class="toggle-label off">
                                                    Nonaktif
                                                </span>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <div class="action-btns">
                                            <a href="#" class="btn-icon">
                                                <svg width="13" height="13" viewBox="0 0 13 13" fill="none"
                                                    stroke="currentColor" stroke-width="1.6">
                                                    <path d="M9 2l2 2-6 6H3V8l6-6z" />
                                                </svg>
                                            </a>
                                            <a href="#" class="btn-icon danger">
                                                <svg width="13" height="13" viewBox="0 0 13 13" fill="none"
                                                    stroke="currentColor" stroke-width="1.6">
                                                    <path d="M2 3.5h9M5 3.5V2.5h3v1M4 3.5l.5 7h4l.5-7" />
                                                </svg>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" style="text-align:center;padding:40px;">
                                        Belum ada layanan
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="table-footer">
                        <div class="table-info">Total {{ $totalServices }} layanan</div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection

@push('scripts')
@endpush
