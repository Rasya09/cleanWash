@extends('mitra.layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/mitra/home.css') }}">
<style>
    /* Override to make left column full width since right column is removed */
    .content {
        display: block;
    }
    .content-left {
        width: 100%;
        max-width: 100%;
    }
</style>
@endsection

@section('content')
<div class="content">

    <!-- FULL WIDTH COLUMN -->
    <div class="content-left">

      <!-- Stats Row -->
      <div class="stats-row">
        <div class="stat-card">
          <div class="stat-icon blue">🛍️</div>
          <div>
            <div class="stat-label">Pesanan Hari Ini</div>
            <div class="stat-value">{{ $stats['pesanan_hari_ini'] }}</div>
            <div class="stat-sub">Total pesanan baru</div>
          </div>
        </div>
        <div class="stat-card">
          <div class="stat-icon orange">⏳</div>
          <div>
            <div class="stat-label">Pesanan Aktif</div>
            <div class="stat-value">{{ $stats['pesanan_aktif'] }}</div>
            <div class="stat-sub">Sedang dikerjakan / dikirim</div>
          </div>
        </div>
      </div>

      <!-- Pesanan Baru / Terbaru -->
      <div class="section-card">
        <div class="section-header">
          <div class="section-title">
            Pesanan Terbaru
            <div class="count-badge">{{ count($recentOrders) }}</div>
          </div>
          <a class="link-all" href="{{ route('mitra.pesanan') }}">Lihat Semua ›</a>
        </div>

        @forelse($recentOrders as $order)
        <div class="order-row" style="align-items: center;">
          <div class="avatar-circle">👤</div>
          <div>
            <div class="order-name">{{ $order->user->name ?? 'Pelanggan' }}</div>
            <div class="order-phone">{{ $order->user->phone ?? '-' }}</div>
          </div>
          <div style="flex: 1;">
            <div class="order-addr">
              <span class="order-addr-icon">📍</span>
              <div>
                <div class="order-street">{{ $order->userAddress->address ?? 'Alamat tidak diketahui' }}</div>
                <div class="order-time">{{ $order->created_at->format('d M Y, H:i') }} WIB</div>
              </div>
            </div>
          </div>
          <div class="order-badge badge-kg">Status: {{ ucfirst($order->status) }}</div>
          <div class="order-actions">
            <a href="{{ route('mitra.pesanan.detail', $order->id) }}" class="btn-terima" style="text-decoration: none; padding: 6px 12px; background: #2563eb; color: white; border-radius: 6px; font-size: 13px;">Lihat Detail</a>
          </div>
        </div>
        @empty
        <div style="padding: 40px 20px; text-align: center; color: #6b7280;">
          <div>Belum ada pesanan terbaru</div>
        </div>
        @endforelse

        @if(count($recentOrders) > 0)
        <a href="{{ route('mitra.pesanan') }}" class="see-more-row" style="text-decoration: none; display: block;">Lihat semua pesanan ›</a>
        @endif
      </div>

      <!-- Promo Banner -->
      <div class="promo-banner" style="margin-top: 20px;">
        <div class="promo-text">
          <div class="promo-icon">🏪</div>
          <div>
            <div class="promo-title">Lengkapi informasi tokomu</div>
            <div class="promo-sub">Lengkapi informasi toko untuk meningkatkan kepercayaan pelanggan</div>
          </div>
        </div>
        <a href="{{ route('mitra.profil') }}" class="btn-promo" style="text-decoration: none; text-align: center;">Lengkapi Sekarang</a>
      </div>

    </div>

</div>
@endsection
