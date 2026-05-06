@extends('mitra.layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/mitra/pesanan_saya.css') }}">
    
@endsection

@section('content')
    {{-- Content: Pesanan Saya --}}
{{-- Pasang di dalam layout Laravel kamu (setelah sidebar & navbar) --}}

<div class="ps-page">

    {{-- Page Header --}}
    <div class="ps-header">
        <h1 class="ps-title">Pesnan Saya</h1>
        <p class="ps-subtitle">Kelola dan pantau semua pesanan laundry Anda di sini.</p>
    </div>

    {{-- Stats Cards --}}
    <div class="ps-stats-grid">
        <div class="ps-stat-card">
            <div class="ps-stat-icon ps-stat-icon--blue">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#3b82f6" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="3" y="3" width="18" height="18" rx="2"/><line x1="3" y1="9" x2="21" y2="9"/><line x1="9" y1="21" x2="9" y2="9"/>
                </svg>
            </div>
            <div class="ps-stat-body">
                <p class="ps-stat-label">TOTAL PESANAN</p>
                <p class="ps-stat-value">1,284</p>
            </div>
        </div>
        <div class="ps-stat-card">
            <div class="ps-stat-icon ps-stat-icon--orange">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#f97316" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M9 5H7a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-2"/>
                    <rect x="9" y="3" width="6" height="4" rx="1"/><line x1="9" y1="12" x2="15" y2="12"/><line x1="9" y1="16" x2="13" y2="16"/>
                </svg>
            </div>
            <div class="ps-stat-body">
                <p class="ps-stat-label">PERLU DIPROSES</p>
                <p class="ps-stat-value">42</p>
            </div>
        </div>
        <div class="ps-stat-card">
            <div class="ps-stat-icon ps-stat-icon--green">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#22c55e" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10"/><polyline points="9 12 11 14 15 10"/>
                </svg>
            </div>
            <div class="ps-stat-body">
                <p class="ps-stat-label">SELESAI</p>
                <p class="ps-stat-value">1,120</p>
            </div>
        </div>
    </div>

    {{-- Table Card --}}
    <div class="ps-table-card">

        {{-- Search --}}
        <div class="ps-search-wrap">
            <svg class="ps-search-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#9ca3af" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/>
            </svg>
            <input type="text" class="ps-search-input" placeholder="Cari nomor pesanan...">
        </div>

        {{-- Tabs + Actions --}}
        <div class="ps-toolbar">
            <div class="ps-tabs">
                <button class="ps-tab ps-tab--active">Semua</button>
                <button class="ps-tab">Dibatalkan</button>
                <button class="ps-tab">Proses</button>
                <button class="ps-tab">Selesai</button>
            </div>
            <div class="ps-actions">
                <button class="ps-btn-action">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="4" y1="6" x2="20" y2="6"/><line x1="8" y1="12" x2="16" y2="12"/><line x1="11" y1="18" x2="13" y2="18"/>
                    </svg>
                    Filter
                </button>
                <button class="ps-btn-action">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/>
                    </svg>
                    Ekspor
                </button>
            </div>
        </div>

        {{-- Table --}}
        <div class="ps-table-wrap">
            <table class="ps-table">
                <thead>
                    <tr>
                        <th>ID PESANAN</th>
                        <th>PELANGGAN</th>
                        <th>LAYANAN</th>
                        <th>TOTAL</th>
                        <th>STATUS</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Row 1 --}}
                    <tr>
                        <td>
                            <p class="ps-order-id">#ORD-98210</p>
                            <p class="ps-order-time">Hari ini, 09:12</p>
                        </td>
                        <td>
                            <div class="ps-customer">
                                <div class="ps-avatar ps-avatar--blue">AS</div>
                                <span class="ps-customer-name">Andi Saputra</span>
                            </div>
                        </td>
                        <td>Cuci Kering (3kg)</td>
                        <td><span class="ps-total">Rp 45.000</span></td>
                        <td><span class="ps-badge ps-badge--proses">DIPROSES</span></td>
                        <td><a href="#" class="ps-link-detail">Detail <span>&rsaquo;</span></a></td>
                    </tr>
                    {{-- Row 2 --}}
                    <tr>
                        <td>
                            <p class="ps-order-id">#ORD-98209</p>
                            <p class="ps-order-time">Kemarin, 16:45</p>
                        </td>
                        <td>
                            <div class="ps-customer">
                                <div class="ps-avatar ps-avatar--green">BN</div>
                                <span class="ps-customer-name">Bella Nathania</span>
                            </div>
                        </td>
                        <td>Cuci Setrika (5kg)</td>
                        <td><span class="ps-total">Rp 75.000</span></td>
                        <td><span class="ps-badge ps-badge--selesai">SELESAI</span></td>
                        <td><a href="#" class="ps-link-detail">Detail <span>&rsaquo;</span></a></td>
                    </tr>
                    {{-- Row 3 --}}
                    <tr>
                        <td>
                            <p class="ps-order-id">#ORD-98206</p>
                            <p class="ps-order-time">11 Mei, 10:05</p>
                        </td>
                        <td>
                            <div class="ps-customer">
                                <div class="ps-avatar ps-avatar--gray">FF</div>
                                <span class="ps-customer-name">Farhan Fauzi</span>
                            </div>
                        </td>
                        <td>Cuci Kering (10kg)</td>
                        <td><span class="ps-total">Rp 120.000</span></td>
                        <td><span class="ps-badge ps-badge--batal">Dibatalkan</span></td>
                        <td><a href="#" class="ps-link-detail">Detail <span>&rsaquo;</span></a></td>
                    </tr>
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="ps-pagination-wrap">
            <p class="ps-pagination-info">HALAMAN 1 DARI 321</p>
            <div class="ps-pagination">
                <button class="ps-page-btn ps-page-btn--active">1</button>
                <button class="ps-page-btn">2</button>
                <button class="ps-page-btn">3</button>
                <button class="ps-page-btn ps-page-btn--nav">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"/></svg>
                </button>
            </div>
        </div>

    </div>{{-- end table card --}}
</div>{{-- end ps-page --}}
@endsection