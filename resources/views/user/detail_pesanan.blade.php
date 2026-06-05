@extends('user.layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/detailpesanan.css') }}">
@endsection

@section('content')

{{-- PAGE BAR --}}
<div class="page-bar">
    <div class="page-bar__inner">
        <div class="page-bar__left">
            <a href="{{ route('user.pesanan') }}" class="page-bar__back">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                    <path d="M15 18l-6-6 6-6"/>
                </svg>
                Pesanan Saya
            </a>
            <p class="page-bar__id">
                <span>ID Pesanan: </span>
                <strong>{{ $pesanan->order_code }}</strong>
            </p>
        </div>
        <div class="page-bar__date">Tanggal: {{ $pesanan->created_at->translatedFormat('d F Y') }}</div>
    </div>
</div>

<main class="detail-page">
    <div class="detail-page__header">
        <h1>Detail Pesanan</h1>
        <p>Lihat status dan rincian lengkap pesanan laundry Anda.</p>
    </div>

    @if(session('success'))
    <div class="detail-alert">{{ session('success') }}</div>
    @endif

    <div class="detail-layout">

        {{-- ══════════════════════════════════════
             KOLOM KIRI
        ══════════════════════════════════════ --}}
        <div class="detail-left">

            {{-- ── STATUS PESANAN ── --}}
            <section class="detail-card">
                <div class="card-title-row">
                    <div class="card-title-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="20" viewBox="0 0 15 20" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M6.5 0C4.98122 0 3.75 1.23122 3.75 2.75V4.75C3.75 5.16421 4.08579 5.5 4.5 5.5H10.5C10.9142 5.5 11.25 5.16421 11.25 4.75V2.75C11.25 1.23122 10.0188 0 8.5 0H6.5ZM5.25 2.75C5.25 2.05964 5.80964 1.5 6.5 1.5H8.5C9.19036 1.5 9.75 2.05964 9.75 2.75V4H5.25V2.75Z" fill="currentColor"/>
                            <path d="M2.25346 2.85483C2.25371 2.71463 2.11335 2.61816 1.98693 2.67877C0.801611 3.24701 0 4.45697 0 5.83545V16.3249C0 18.0357 1.27431 19.4785 2.97197 19.6899C5.97904 20.0644 9.02096 20.0644 12.028 19.6899C13.7257 19.4785 15 18.0357 15 16.3249V5.83546C15 4.45679 14.2016 3.24669 13.0165 2.67855C12.8903 2.618 12.75 2.71422 12.75 2.85426V4.75001C12.75 5.99265 11.7426 7.00001 10.5 7.00001H4.5C3.25736 7.00001 2.25 5.99265 2.25 4.75001L2.25346 2.85483Z" fill="currentColor"/>
                        </svg>
                    </div>
                    <h2 class="card-title">Status Pesanan</h2>
                </div>

                @php
                    $statusLabel = [
                        'masuk'        => 'Menunggu Konfirmasi',
                        'aktif'        => 'Pesanan Diterima',
                        'pickup'       => 'Driver Menuju Lokasi',
                        'diproses'     => 'Sedang Diproses',
                        'pengantaran'  => 'Sedang Diantar',
                        'selesai'      => 'Selesai',
                        'gagal_pickup' => 'Gagal Pickup',
                        'dibatalkan'   => 'Dibatalkan',
                    ];

                    /* Peta status → nomor step aktif */
                    $stepMap = [
                        'masuk'        => 0,
                        'aktif'        => 1,
                        'pickup'       => 2,
                        'diproses'     => 3,
                        'pengantaran'  => 4,
                        'selesai'      => 5,
                        'gagal_pickup' => 2,
                        'dibatalkan'   => 0,
                    ];
                    $step = $stepMap[$pesanan->status] ?? 0;

                    $steps = [
                        ['label' => 'Pesanan Diterima', 'num' => 1],
                        ['label' => 'Pickup',           'num' => 2],
                        ['label' => 'Ditimbang',        'num' => 3],
                        ['label' => 'Pengantaran',      'num' => 4],
                        ['label' => 'Selesai',          'num' => 5],
                    ];
                @endphp

                <div class="status-badge status-badge--{{ $pesanan->status }}">
                    <span class="status-dot"></span>
                    {{ $statusLabel[$pesanan->status] ?? ucfirst($pesanan->status) }}
                </div>

                {{-- Progress Steps --}}
                <div class="progress-steps">
                    @foreach($steps as $i => $s)
                        @php
                            $isDone   = $step > $s['num'];
                            $isActive = $step === $s['num'];
                            $dotClass = $isDone ? 'progress-step__dot--done' : ($isActive ? 'progress-step__dot--active' : '');
                            $stepClass = $isDone ? 'progress-step--done' : ($isActive ? 'progress-step--active' : '');
                        @endphp
                        <div class="progress-step {{ $stepClass }}">
                            <div class="progress-step__dot {{ $dotClass }}"></div>
                            <span class="progress-step__label">{{ $s['label'] }}</span>
                        </div>
                        @if($i < count($steps) - 1)
                            <div class="progress-line {{ $step > $s['num'] ? 'progress-line--done' : '' }}"></div>
                        @endif
                    @endforeach
                </div>

                <p class="estimasi-text">
                    Jadwal Pickup:
                    <strong>
                        {{ $pesanan->tanggal_pickup->translatedFormat('d M Y') }}
                        – {{ \Carbon\Carbon::parse($pesanan->waktu_pickup)->format('H:i') }} WIB
                    </strong>
                </p>
            </section>

            {{-- ── INFORMASI LAUNDRY ── --}}
            <section class="detail-card">
                <div class="card-title-row">
                    <div class="card-title-icon card-title-icon--blue">
                        <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/>
                            <polyline points="9 22 9 12 15 12 15 22"/>
                        </svg>
                    </div>
                    <h2 class="card-title">Informasi Laundry</h2>
                </div>
                <div class="laundry-info">
                    <div class="laundry-info__img-wrap">
                        <img src="{{ $pesanan->mitraLaundry->logo
                                        ? asset('storage/'.$pesanan->mitraLaundry->logo)
                                        : asset('assets/images/laundry-placeholder.jpg') }}"
                             alt="{{ $pesanan->mitraLaundry->store_name }}"
                             class="laundry-info__img">
                    </div>
                    <div class="laundry-info__body">
                        <span class="laundry-info__name">{{ $pesanan->mitraLaundry->store_name }}</span>
                        <div class="laundry-info__rating">
                            <span class="laundry-info__stars">★★★★★</span>
                            <span class="laundry-info__score">5.0</span>
                            <span class="laundry-info__review">(128 ulasan)</span>
                        </div>
                        <div class="laundry-info__meta">
                            <span class="laundry-info__meta-item">
                                <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/>
                                    <circle cx="12" cy="10" r="3"/>
                                </svg>
                                {{ $pesanan->mitraLaundry->address }}, {{ $pesanan->mitraLaundry->city }}
                            </span>
                            @if($pesanan->mitraLaundry->jam_buka && $pesanan->mitraLaundry->jam_tutup)
                            <span class="laundry-info__meta-item">
                                <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/>
                                </svg>
                                {{ \Carbon\Carbon::parse($pesanan->mitraLaundry->jam_buka)->format('H:i') }}
                                – {{ \Carbon\Carbon::parse($pesanan->mitraLaundry->jam_tutup)->format('H:i') }}
                            </span>
                            @endif
                        </div>
                        <div class="laundry-info__actions">
                            <button class="btn-outline-primary">
                                <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/>
                                </svg>
                                Lihat Detail Laundry
                            </button>
                        </div>
                    </div>
                </div>
            </section>

            {{-- ── DETAIL LAYANAN ── --}}
            <section class="detail-card">
                <div class="card-title-row">
                    <div class="card-title-icon card-title-icon--blue">
                        <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2"/>
                            <rect x="9" y="3" width="6" height="4" rx="1"/>
                        </svg>
                    </div>
                    <h2 class="card-title">Detail Layanan</h2>
                </div>
                <div class="layanan-list">

                    {{-- Layanan --}}
                    <div class="layanan-row">
                        <span class="layanan-row__key">
                            <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <polyline points="9 11 12 14 22 4"/>
                                <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"/>
                            </svg>
                            Layanan
                        </span>
                        <span class="layanan-row__val">
                            {{ $pesanan->items->pluck('nama_layanan')->join(', ') ?: '-' }}
                        </span>
                    </div>

                    {{-- Paket --}}
                    <div class="layanan-row">
                        <span class="layanan-row__key">
                            <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <polyline points="1 4 1 10 7 10"/>
                                <path d="M3.51 15a9 9 0 102.13-9.36L1 10"/>
                            </svg>
                            Paket
                        </span>
                        <span class="layanan-row__val">
                            <span class="layanan-row__val--badge">
                                {{ ucfirst($pesanan->paket ?? 'Express') }}
                            </span>
                        </span>
                    </div>

                    {{-- Estimasi Selesai --}}
                    @if($pesanan->estimasi_selesai)
                    <div class="layanan-row">
                        <span class="layanan-row__key">
                            <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/>
                            </svg>
                            Estimasi Selesai
                        </span>
                        <span class="layanan-row__val">{{ $pesanan->estimasi_selesai }}</span>
                    </div>
                    @endif

                    {{-- Metode Pembayaran --}}
                    <div class="layanan-row">
                        <span class="layanan-row__key">
                            <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <rect x="1" y="4" width="22" height="16" rx="2"/>
                                <path d="M1 10h22"/>
                            </svg>
                            Metode Pembayaran
                        </span>
                        <span class="layanan-row__val">{{ strtoupper($pesanan->metode_bayar) }}</span>
                    </div>

                    {{-- Metode Pengantaran --}}
                    <div class="layanan-row">
                        <span class="layanan-row__key">
                            <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <rect x="1" y="3" width="15" height="13"/>
                                <polygon points="16 8 20 8 23 11 23 16 16 16 16 8"/>
                                <circle cx="5.5" cy="18.5" r="2.5"/>
                                <circle cx="18.5" cy="18.5" r="2.5"/>
                            </svg>
                            Metode Pengantaran
                        </span>
                        <span class="layanan-row__val">Antar Jemput</span>
                    </div>

                    {{-- Instruksi / Catatan --}}
                    @if($pesanan->catatan)
                    <div class="layanan-row layanan-row--full">
                        <span class="layanan-row__key">
                            <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"/>
                                <path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/>
                            </svg>
                            Instruksi
                        </span>
                        <span class="layanan-row__val">{{ $pesanan->catatan }}</span>
                    </div>
                    @endif
                </div>
            </section>

            {{-- ── PICKUP ── --}}
            <section class="detail-card">
                <div class="card-title-row">
                    <div class="card-title-icon card-title-icon--red">
                        <svg width="14" height="14" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                        </svg>
                    </div>
                    <h2 class="card-title">Pickup</h2>
                </div>
                <div class="pickup-grid">

                    {{-- Alamat Pickup --}}
                    <div class="pickup-box pickup-box--full">
                        <div class="pickup-box__label">
                            <svg width="12" height="12" fill="none" stroke="var(--red-500)" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/>
                                <circle cx="12" cy="10" r="3"/>
                            </svg>
                            Alamat Pickup
                        </div>
                        <p class="pickup-box__val pickup-box__val--primary">{{ $pesanan->alamat_pickup }}</p>
                    </div>

                    {{-- Estimasi Tiba --}}
                    <div class="pickup-box">
                        <div class="pickup-box__label">
                            <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/>
                            </svg>
                            Estimasi Tiba
                        </div>
                        <p class="pickup-box__val pickup-box__val--bold">
                            {{ $pesanan->tanggal_pickup->translatedFormat('d M Y') }} – 14.00 WIB
                        </p>
                    </div>

                    {{-- Jadwal Pickup --}}
                    <div class="pickup-box">
                        <div class="pickup-box__label">
                            <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/>
                            </svg>
                            Jadwal Pickup
                        </div>
                        <p class="pickup-box__val pickup-box__val--bold">
                            {{ $pesanan->tanggal_pickup->translatedFormat('d M') }}
                            – {{ \Carbon\Carbon::parse($pesanan->waktu_pickup)->format('H:i') }}
                        </p>
                    </div>
                </div>
            </section>

            {{-- ── RIWAYAT AKTIVITAS ── --}}
            <section class="detail-card">
                <div class="card-title-row">
                    <div class="card-title-icon card-title-icon--blue">
                        <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/>
                        </svg>
                    </div>
                    <h2 class="card-title">Riwayat Aktivitas</h2>
                </div>
                <div class="timeline">
                    @forelse($pesanan->statusHistories as $history)
                    @php
                        $isLast   = $loop->last;
                        $isActive = $loop->last && !in_array($pesanan->status, ['selesai', 'dibatalkan', 'gagal_pickup']);
                    @endphp
                    <div class="timeline-item {{ !$isLast ? 'timeline-item--has-line' : '' }}">
                        <div class="timeline-item__dot {{ $isActive ? 'timeline-item__dot--active' : 'timeline-item__dot--done' }}">
                            @if($isActive)
                                <svg width="8" height="8" viewBox="0 0 8 8" fill="white">
                                    <circle cx="4" cy="4" r="3"/>
                                </svg>
                            @else
                                <svg width="10" height="10" viewBox="0 0 10 10" fill="none" stroke="white" stroke-width="2">
                                    <polyline points="2,5 4,7.5 8,2.5"/>
                                </svg>
                            @endif
                        </div>
                        @if(!$isLast)
                        <div class="timeline-item__line {{ $isActive ? 'timeline-item__line--gradient' : 'timeline-item__line--done' }}"></div>
                        @endif
                        <div class="timeline-item__content">
                            <span class="timeline-item__title">
                                {{ $statusLabel[$history->status_baru] ?? ucfirst($history->status_baru) }}
                            </span>
                            <span class="timeline-item__time">
                                {{ \Carbon\Carbon::parse($history->created_at)->translatedFormat('d M Y') }}
                                – {{ \Carbon\Carbon::parse($history->created_at)->format('H:i') }} WIB
                            </span>
                            @if($history->catatan)
                            <div class="timeline-item__desc">{{ $history->catatan }}</div>
                            @endif
                        </div>
                    </div>
                    @empty
                    <p style="font-size:13px;color:var(--neutral-400);padding:8px 0;">Belum ada aktivitas.</p>
                    @endforelse

                    {{-- Pending steps (hanya jika belum selesai/batal) --}}
                    @if(!in_array($pesanan->status, ['selesai', 'dibatalkan', 'gagal_pickup']))
                    <div class="timeline-item timeline-item--has-line timeline-item--pending">
                        <div class="timeline-item__dot timeline-item__dot--pending"></div>
                        <div class="timeline-item__line timeline-item__line--pending"></div>
                        <div class="timeline-item__content">
                            <span class="timeline-item__title timeline-item__title--muted">Siap Diantar</span>
                            <span class="timeline-item__time">Menunggu...</span>
                        </div>
                    </div>
                    <div class="timeline-item timeline-item--pending">
                        <div class="timeline-item__dot timeline-item__dot--pending"></div>
                        <div class="timeline-item__content">
                            <span class="timeline-item__title timeline-item__title--muted">Pesanan Selesai</span>
                            <span class="timeline-item__time">Menunggu...</span>
                        </div>
                    </div>
                    @endif
                </div>
            </section>

        </div>{{-- /detail-left --}}

        {{-- ══════════════════════════════════════
             KOLOM KANAN (SIDEBAR)
        ══════════════════════════════════════ --}}
        <div class="detail-right">

            {{-- ── RINGKASAN HARGA ── --}}
            <section class="side-card">
                <div class="card-title-row">
                    <div class="card-title-icon card-title-icon--blue">
                        <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <rect x="1" y="4" width="22" height="16" rx="2"/>
                            <path d="M1 10h22"/>
                        </svg>
                    </div>
                    <h2 class="card-title">Ringkasan Harga & Pembayaran</h2>
                </div>

                <div class="price-breakdown">
                    @forelse($pesanan->items as $item)
                    <div class="price-row">
                        <span class="price-row__label">{{ $item->nama_layanan }}</span>
                        <span class="price-row__val {{ $item->subtotal > 0 ? '' : 'price-row__val--pending' }}">
                            {{ $item->subtotal > 0 ? $item->subtotalFormatted() : 'Menunggu timbang' }}
                        </span>
                    </div>
                    @if($item->harga_per_kg && $item->berat_aktual)
                    <div class="price-row price-row--sub">
                        <span class="price-row__label">
                            {{ $item->berat_aktual }} kg × {{ $item->hargaFormatted() }}/kg
                        </span>
                        <span class="price-row__val">{{ $item->subtotalFormatted() }}</span>
                    </div>
                    @endif
                    @empty
                    <div class="price-row">
                        <span class="price-row__label" style="color:var(--neutral-400);font-size:12.5px;">Menunggu konfirmasi layanan…</span>
                    </div>
                    @endforelse

                    @if($pesanan->ongkir > 0)
                    <div class="price-row">
                        <span class="price-row__label">Antar jemput</span>
                        <span class="price-row__val">Rp {{ number_format($pesanan->ongkir, 0, ',', '.') }}</span>
                    </div>
                    @endif

                    @if($pesanan->diskon > 0)
                    <div class="price-row price-row--discount">
                        <span class="price-row__label">Diskon</span>
                        <span class="price-row__val">- Rp {{ number_format($pesanan->diskon, 0, ',', '.') }}</span>
                    </div>
                    @endif
                </div>

                <div class="price-divider"></div>

                <div class="price-total">
                    <span class="price-total__label">Total</span>
                    <span class="price-total__val {{ $pesanan->total_bayar > 0 ? '' : 'price-total__val--pending' }}">
                        {{ $pesanan->total_bayar > 0 ? $pesanan->totalFormatted() : 'Menunggu konfirmasi' }}
                    </span>
                </div>

                <div class="payment-status">
                    <span class="payment-status__key">Status Pembayaran</span>
                    <span class="payment-status__badge {{ $pesanan->status_bayar === 'lunas' ? 'payment-status__badge--paid' : 'payment-status__badge--unpaid' }}">
                        {{ $pesanan->status_bayar === 'lunas' ? 'Sudah Dibayar' : 'Belum Dibayar' }}
                    </span>
                </div>

                @if($pesanan->status_bayar !== 'lunas' && $pesanan->total_bayar > 0)
                <a href="{{ route('user.pembayaran') }}" class="btn-bayar">
                    <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <rect x="1" y="4" width="22" height="16" rx="2"/><path d="M1 10h22"/>
                    </svg>
                    Bayar Sekarang
                </a>
                @endif
            </section>

            {{-- ── AKSI ── --}}
            <section class="side-card">
                <div class="card-title-row">
                    <div class="card-title-icon card-title-icon--blue">
                        <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="1"/><circle cx="19" cy="12" r="1"/><circle cx="5" cy="12" r="1"/>
                        </svg>
                    </div>
                    <h2 class="card-title">Aksi</h2>
                </div>
                <div class="aksi-list">

                    <button class="btn-aksi">
                        <div class="btn-aksi__icon">
                            <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 10.8a19.79 19.79 0 01-3.07-8.63A2 2 0 012.18 0h3a2 2 0 012 1.72c.13 1 .37 1.97.72 2.9a2 2 0 01-.45 2.11L6.09 7.91a16 16 0 006 6l1.18-1.18a2 2 0 012.11-.45c.93.35 1.9.59 2.9.72A2 2 0 0122 16.92z"/>
                            </svg>
                        </div>
                        Hubungi Laundry
                    </button>

                    <button class="btn-aksi">
                        <div class="btn-aksi__icon">
                            <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/>
                                <polyline points="14 2 14 8 20 8"/>
                            </svg>
                        </div>
                        Lihat Invoice
                    </button>

                    <a href="{{ route('user.buat-pesanan') }}" class="btn-aksi">
                        <div class="btn-aksi__icon">
                            <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <polyline points="1 4 1 10 7 10"/>
                                <path d="M3.51 15a9 9 0 102.13-9.36L1 10"/>
                            </svg>
                        </div>
                        Pesan Lagi
                    </a>

                    @if($pesanan->isMasuk())
                    <form method="POST"
                          action="{{ route('user.pesanan.cancel', $pesanan->id) }}"
                          onsubmit="return confirm('Yakin ingin membatalkan pesanan ini?')">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="alasan_batal" value="Dibatalkan oleh customer">
                        <button type="submit" class="btn-aksi btn-aksi--danger">
                            <div class="btn-aksi__icon btn-aksi__icon--danger">
                                <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <circle cx="12" cy="12" r="10"/>
                                    <line x1="15" y1="9" x2="9" y2="15"/>
                                    <line x1="9" y1="9" x2="15" y2="15"/>
                                </svg>
                            </div>
                            Batalkan Pesanan
                        </button>
                    </form>
                    @endif

                </div>
            </section>

        </div>{{-- /detail-right --}}
    </div>
</main>

@endsection
