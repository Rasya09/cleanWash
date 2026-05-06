@extends('mitra.layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/mitra/gagal_pickup.css') }}">

@endsection

@section('content')
{{-- Content: Gagal Pickup / Pembatalan --}}
{{-- Pasang di dalam layout Laravel kamu (setelah sidebar & navbar) --}}

<div class="gp-page">

    {{-- Page Header --}}
    <div class="gp-header">
        <h1 class="gp-title">Gagal Pickup / Pembatalan</h1>
    </div>

    {{-- Info Banner --}}
    <div class="gp-info-banner">
        <div class="gp-info-icon">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#3b82f6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/>
            </svg>
        </div>
        <div class="gp-info-text">
            <p class="gp-info-title">Informasi</p>
            <p class="gp-info-desc">Berikut adalah daftar pesanan yang gagal pickup atau dibatalkan oleh pelanggan.<br>
                Pastikan untuk menindaklanjuti sesuai kebijakan layanan.</p>
        </div>
        <div class="gp-info-illustration">
            <svg width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect x="8" y="8" width="36" height="44" rx="4" fill="#dbeafe" stroke="#93c5fd" stroke-width="1.5"/>
                <line x1="16" y1="20" x2="36" y2="20" stroke="#93c5fd" stroke-width="2" stroke-linecap="round"/>
                <line x1="16" y1="27" x2="36" y2="27" stroke="#93c5fd" stroke-width="2" stroke-linecap="round"/>
                <line x1="16" y1="34" x2="28" y2="34" stroke="#93c5fd" stroke-width="2" stroke-linecap="round"/>
                <circle cx="46" cy="46" r="12" fill="#fee2e2" stroke="#fca5a5" stroke-width="1.5"/>
                <line x1="41" y1="41" x2="51" y2="51" stroke="#ef4444" stroke-width="2.5" stroke-linecap="round"/>
                <line x1="51" y1="41" x2="41" y2="51" stroke="#ef4444" stroke-width="2.5" stroke-linecap="round"/>
            </svg>
        </div>
    </div>

    {{-- Stats Cards --}}
    <div class="gp-stats-grid">
        <div class="gp-stat-card">
            <div class="gp-stat-icon gp-stat-icon--red">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#ef4444" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10"/><line x1="8" y1="12" x2="16" y2="12"/>
                </svg>
            </div>
            <div class="gp-stat-body">
                <p class="gp-stat-label">Total Gagal Pickup</p>
                <p class="gp-stat-value">18</p>
                <p class="gp-stat-sub">Dalam 30 hari terakhir</p>
            </div>
        </div>
        <div class="gp-stat-card">
            <div class="gp-stat-icon gp-stat-icon--orange">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#f97316" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="3" y="3" width="18" height="18" rx="2"/><line x1="9" y1="9" x2="15" y2="15"/><line x1="15" y1="9" x2="9" y2="15"/>
                </svg>
            </div>
            <div class="gp-stat-body">
                <p class="gp-stat-label">Dibatalkan Pelanggan</p>
                <p class="gp-stat-value">26</p>
                <p class="gp-stat-sub">Dalam 30 hari terakhir</p>
            </div>
        </div>
        <div class="gp-stat-card">
            <div class="gp-stat-icon gp-stat-icon--yellow">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#eab308" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/>
                </svg>
            </div>
            <div class="gp-stat-body">
                <p class="gp-stat-label">Dibatalkan Mitra</p>
                <p class="gp-stat-value">7</p>
                <p class="gp-stat-sub">Dalam 30 hari terakhir</p>
            </div>
        </div>
        <div class="gp-stat-card">
            <div class="gp-stat-icon gp-stat-icon--purple">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#8b5cf6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="22 7 13.5 15.5 8.5 10.5 2 17"/><polyline points="16 7 22 7 22 13"/>
                </svg>
            </div>
            <div class="gp-stat-body">
                <p class="gp-stat-label">Persentase Pembatalan</p>
                <p class="gp-stat-value">2,4%</p>
                <p class="gp-stat-sub">Dari total pesanan</p>
            </div>
        </div>
    </div>

    {{-- Table Card --}}
    <div class="gp-table-card">

        {{-- Toolbar --}}
        <div class="gp-toolbar">
            <div class="gp-search-wrap">
                <svg class="gp-search-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#9ca3af" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/>
                </svg>
                <input type="text" class="gp-search-input" placeholder="Cari nomor pesanan / nama pelanggan...">
            </div>
            <div class="gp-toolbar-right">
                <button class="gp-btn-date">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/>
                    </svg>
                    01 Mei 2024 – 31 Mei 2024
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="6 9 12 15 18 9"/>
                    </svg>
                </button>
                <button class="gp-btn-filter">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="4" y1="6" x2="20" y2="6"/><line x1="8" y1="12" x2="16" y2="12"/><line x1="11" y1="18" x2="13" y2="18"/>
                    </svg>
                    Filter
                </button>
            </div>
        </div>

        {{-- Table --}}
        <div class="gp-table-wrap">
            <table class="gp-table">
                <thead>
                    <tr>
                        <th>No. Pesanan</th>
                        <th>Pelanggan</th>
                        <th>Tanggal</th>
                        <th>Alasan</th>
                        <th>Status</th>
                        <th>Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Row 1 --}}
                    <tr>
                        <td>
                            <p class="gp-order-id">#TRX-240501-0123</p>
                            <p class="gp-order-sub">Kiloan 5 Kg</p>
                        </td>
                        <td>
                            <p class="gp-customer-name">Rasya Ganteng</p>
                            <p class="gp-customer-phone">0812-3456-7890</p>
                        </td>
                        <td>
                            <p class="gp-date">30 Mei 2024</p>
                            <p class="gp-time">10:30 WIB</p>
                        </td>
                        <td>Pelanggan tidak di rumah</td>
                        <td><span class="gp-badge gp-badge--gagal">Gagal Pickup</span></td>
                        <td><button class="gp-btn-detail">Lihat Detail</button></td>
                    </tr>
                    {{-- Row 2 --}}
                    <tr>
                        <td>
                            <p class="gp-order-id">#TRX-240529-0108</p>
                            <p class="gp-order-sub">Cuci Satuan</p>
                        </td>
                        <td>
                            <p class="gp-customer-name">Mang Uwyyyy</p>
                            <p class="gp-customer-phone">0821-9876-5432</p>
                        </td>
                        <td>
                            <p class="gp-date">29 Mei 2024</p>
                            <p class="gp-time">09:15 WIB</p>
                        </td>
                        <td>Perubahan jadwal</td>
                        <td><span class="gp-badge gp-badge--batal">Dibatalkan</span></td>
                        <td><button class="gp-btn-detail">Lihat Detail</button></td>
                    </tr>
                    {{-- Row 3 --}}
                    <tr>
                        <td>
                            <p class="gp-order-id">#TRX-240528-0097</p>
                            <p class="gp-order-sub">Kiloan 3 Kg</p>
                        </td>
                        <td>
                            <p class="gp-customer-name">Mang Ijalll Ihirrr</p>
                            <p class="gp-customer-phone">0813-2345-6789</p>
                        </td>
                        <td>
                            <p class="gp-date">28 Mei 2024</p>
                            <p class="gp-time">14:20 WIB</p>
                        </td>
                        <td>Tidak jadi laundry</td>
                        <td><span class="gp-badge gp-badge--batal">Dibatalkan</span></td>
                        <td><button class="gp-btn-detail">Lihat Detail</button></td>
                    </tr>
                    {{-- Row 4 --}}
                    <tr>
                        <td>
                            <p class="gp-order-id">#TRX-240527-0085</p>
                            <p class="gp-order-sub">Kiloan 7 Kg</p>
                        </td>
                        <td>
                            <p class="gp-customer-name">Adzril</p>
                            <p class="gp-customer-phone">0812-1122-3344</p>
                        </td>
                        <td>
                            <p class="gp-date">27 Mei 2024</p>
                            <p class="gp-time">11:00 WIB</p>
                        </td>
                        <td>Tidak bisa melayani</td>
                        <td><span class="gp-badge gp-badge--batal">Dibatalkan</span></td>
                        <td><button class="gp-btn-detail">Lihat Detail</button></td>
                    </tr>
                    {{-- Row 5 --}}
                    <tr>
                        <td>
                            <p class="gp-order-id">#TRX-240526-0072</p>
                            <p class="gp-order-sub">Cuci Satuan</p>
                        </td>
                        <td>
                            <p class="gp-customer-name">Rizky Febrian</p>
                            <p class="gp-customer-phone">0857-7788-9900</p>
                        </td>
                        <td>
                            <p class="gp-date">26 Mei 2024</p>
                            <p class="gp-time">16:45 WIB</p>
                        </td>
                        <td>Alamat tidak ditemukan</td>
                        <td><span class="gp-badge gp-badge--gagal">Gagal Pickup</span></td>
                        <td><button class="gp-btn-detail">Lihat Detail</button></td>
                    </tr>
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="gp-pagination-wrap">
            <p class="gp-pagination-info">Menampilkan 1 – 5 dari 51 data</p>
            <div class="gp-pagination">
                <button class="gp-page-btn gp-page-btn--nav" disabled>
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"/></svg>
                </button>
                <button class="gp-page-btn gp-page-btn--active">1</button>
                <button class="gp-page-btn">2</button>
                <button class="gp-page-btn">3</button>
                <span class="gp-page-ellipsis">...</span>
                <button class="gp-page-btn">11</button>
                <button class="gp-page-btn gp-page-btn--nav">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"/></svg>
                </button>
            </div>
        </div>

    </div>{{-- end table card --}}
</div>{{-- end gp-page --}}
@endsection

