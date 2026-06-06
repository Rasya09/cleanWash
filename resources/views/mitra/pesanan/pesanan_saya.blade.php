@extends('mitra.layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/mitra/pesanan_saya.css') }}">
@endsection

@section('content')
<div class="ps-page">

    {{-- Page Header --}}
    <div class="ps-header">
        <h1 class="ps-title">Pesanan Saya</h1>
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
                <p class="ps-stat-value" id="statTotal">{{ number_format($stats['total'], 0, ',', '.') }}</p>
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
                <p class="ps-stat-value" id="statProses">{{ number_format($stats['proses'], 0, ',', '.') }}</p>
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
                <p class="ps-stat-value" id="statSelesai">{{ number_format($stats['selesai'], 0, ',', '.') }}</p>
            </div>
        </div>
    </div>

    {{-- Table Card --}}
    <div class="ps-table-card">

        {{-- Search --}}
        <form method="GET" action="{{ route('mitra.pesanan') }}" class="ps-search-wrap" style="display: flex; flex: 1;">
            <input type="hidden" name="tab" value="{{ request('tab', 'semua') }}">
            <svg class="ps-search-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#9ca3af" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/>
            </svg>
            <input type="text" name="search" class="ps-search-input" id="psSearch" placeholder="Cari nomor pesanan atau nama pelanggan..." value="{{ request('search') }}">
            <button type="submit" style="display: none;"></button>
        </form>

        {{-- Tabs + Actions --}}
        <div class="ps-toolbar">
            <div class="ps-tabs">
                <a href="{{ route('mitra.pesanan', ['tab' => 'semua', 'search' => request('search')]) }}" class="ps-tab {{ request('tab', 'semua') == 'semua' ? 'ps-tab--active' : '' }}">Semua</a>
                <a href="{{ route('mitra.pesanan', ['tab' => 'dibatalkan', 'search' => request('search')]) }}" class="ps-tab {{ request('tab') == 'dibatalkan' ? 'ps-tab--active' : '' }}">Dibatalkan</a>
                <a href="{{ route('mitra.pesanan', ['tab' => 'proses', 'search' => request('search')]) }}" class="ps-tab {{ request('tab') == 'proses' ? 'ps-tab--active' : '' }}">Proses</a>
                <a href="{{ route('mitra.pesanan', ['tab' => 'selesai', 'search' => request('search')]) }}" class="ps-tab {{ request('tab') == 'selesai' ? 'ps-tab--active' : '' }}">Selesai</a>
            </div>
            <div class="ps-actions">
                <button class="ps-btn-action" id="btnFilter">
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
                <tbody id="psTableBody">
                    @forelse($orders as $order)
                        @php
                            $badgeClass = match($order->status) {
                                'selesai' => 'ps-badge--selesai',
                                'dibatalkan', 'gagal_pickup' => 'ps-badge--batal',
                                default => 'ps-badge--proses',
                            };
                            $badgeLabel = match($order->status) {
                                'selesai' => 'SELESAI',
                                'dibatalkan' => 'DIBATALKAN',
                                'gagal_pickup' => 'GAGAL PICKUP',
                                'masuk' => 'MASUK',
                                'aktif' => 'AKTIF',
                                'pickup' => 'PICKUP',
                                'menunggu_pembayaran' => 'BAYAR',
                                'diproses' => 'DIPROSES',
                                'pengantaran' => 'DIANTAR',
                                default => strtoupper($order->status)
                            };
                            $initial = strtoupper(substr($order->user->name ?? '?', 0, 2));
                            $avatarClasses = ['ps-avatar--blue', 'ps-avatar--green', 'ps-avatar--orange', 'ps-avatar--gray'];
                            $avatarClass = $avatarClasses[$order->user_id % 4] ?? 'ps-avatar--gray';
                        @endphp
                        <tr>
                            <td>
                                <p class="ps-order-id">{{ $order->order_code }}</p>
                                <p class="ps-order-time">{{ $order->created_at->format('d M Y, H:i') }}</p>
                            </td>
                            <td>
                                <div class="ps-customer">
                                    <div class="ps-avatar {{ $avatarClass }}">{{ $initial }}</div>
                                    <span class="ps-customer-name">{{ $order->user->name ?? 'User' }}</span>
                                </div>
                            </td>
                            <td>{{ $order->items->pluck('nama_layanan')->join(', ') }}</td>
                            <td><span class="ps-total">{{ $order->total_bayar > 0 ? $order->totalFormatted() : '-' }}</span></td>
                            <td><span class="ps-badge {{ $badgeClass }}">{{ $badgeLabel }}</span></td>
                            <td><a href="{{ route('mitra.pesanan.detail', $order->id) }}" class="ps-link-detail">Detail &rsaquo;</a></td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center" style="padding: 40px 0;">
                                <div class="ps-empty" style="display:flex; flex-direction:column; align-items:center;">
                                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#d1d5db" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M9 5H7a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-2"/>
                                        <rect x="9" y="3" width="6" height="4" rx="1"/>
                                    </svg>
                                    <p style="margin-top:10px; color:#9ca3af;">Tidak ada pesanan ditemukan</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        @if($orders->hasPages())
        {{ $orders->appends(request()->query())->links('mitra.layouts.pagination', ['prefix' => 'ps-']) }}
        @endif

    </div>
</div>
@endsection

@push('scripts')
<script>
// Logic pencarian otomatis submit ketika enter
document.getElementById('psSearch').addEventListener('keypress', function (e) {
    if (e.key === 'Enter') {
        e.preventDefault();
        this.closest('form').submit();
    }
});
</script>
@endpush