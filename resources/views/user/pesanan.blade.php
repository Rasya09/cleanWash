@extends('user.layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/daftar_pesanan.css') }}">
@endsection

@section('content')
<main class="ps-page">
    <div class="ps-container">

        <div class="ps-header">
            <h1 class="ps-title">Pesanan Saya</h1>
        </div>

        {{-- Success / Error --}}
        @if(session('success'))
        <div class="ps-alert ps-alert-success">{{ session('success') }}</div>
        @endif

        @if($orders->isEmpty())
        <div class="ps-empty">
            <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="#CBD5E1" stroke-width="1.5">
                <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2"/>
                <rect x="9" y="3" width="6" height="4" rx="1"/>
            </svg>
            <p>Belum ada pesanan</p>
            <a href="{{ route('user.buat-pesanan') }}" class="ps-btn-buat">Buat Pesanan</a>
        </div>
        @else

        <div class="ps-list">
            @foreach($orders as $order)
            <div class="ps-card">
                <div class="ps-card-header">
                    <div class="ps-card-info">
                        <span class="ps-order-code">{{ $order->order_code }}</span>
                        <span class="ps-laundry-name">{{ $order->mitraLaundry->store_name ?? '-' }}</span>
                    </div>
                    <span class="ps-badge ps-badge-{{ $order->status }}">
                        {{ ucfirst(str_replace('_', ' ', $order->status)) }}
                    </span>
                </div>

                <div class="ps-card-body">
                    <div class="ps-card-row">
                        <span class="ps-label">Layanan</span>
                        <span class="ps-value">
                            {{ $order->items->pluck('nama_layanan')->join(', ') }}
                        </span>
                    </div>
                    <div class="ps-card-row">
                        <span class="ps-label">Jadwal Pickup</span>
                        <span class="ps-value">
                            {{ \Carbon\Carbon::parse($order->tanggal_pickup)->format('d M Y') }}
                            {{ \Carbon\Carbon::parse($order->waktu_pickup)->format('H:i') }} WIB
                        </span>
                    </div>
                    <div class="ps-card-row">
                        <span class="ps-label">Total</span>
                        <span class="ps-value ps-total">
                            {{ $order->total_bayar > 0 ? $order->totalFormatted() : 'Menunggu konfirmasi' }}
                        </span>
                    </div>
                </div>

                <div class="ps-card-footer">
                    <span class="ps-date">{{ $order->created_at->diffForHumans() }}</span>
                    <a href="{{ route('user.detail-pesanan', $order->id) }}" class="ps-btn-detail">
                        Lihat Detail →
                    </a>
                </div>
            </div>
            @endforeach
        </div>

        {{-- Pagination --}}
        @if($orders->hasPages())
        <div class="ps-pagination">
            {{ $orders->links() }}
        </div>
        @endif

        @endif

    </div>
</main>
@endsection

@section('js')
@endsection