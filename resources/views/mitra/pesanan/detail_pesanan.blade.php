@extends('mitra.layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/mitra/detail_pesanan.css') }}">
@endsection

@section('content')

@php
    /**
     * $pesanan = App\Models\Order
     * Relations: $pesanan->user, $pesanan->items, $pesanan->statusHistories, $pesanan->driver
     */

    $statusMap = [
        'masuk'               => ['label' => 'Masuk',               'class' => 'badge--masuk',       'dot' => '#faad14'],
        'aktif'               => ['label' => 'Dikonfirmasi',        'class' => 'badge--aktif',       'dot' => '#1677ff'],
        'pickup'              => ['label' => 'Pickup',              'class' => 'badge--pickup',      'dot' => '#1677ff'],
        'ditimbang'           => ['label' => 'Ditimbang',           'class' => 'badge--aktif',       'dot' => '#1677ff'],
        'menunggu_pembayaran' => ['label' => 'Menunggu Pembayaran', 'class' => 'badge--masuk',       'dot' => '#faad14'],
        'diproses'            => ['label' => 'Diproses',            'class' => 'badge--diproses',    'dot' => '#faad14'],
        'pengantaran'         => ['label' => 'Pengantaran',         'class' => 'badge--pengantaran', 'dot' => '#1677ff'],
        'selesai'             => ['label' => 'Selesai',             'class' => 'badge--selesai',     'dot' => '#52c41a'],
        'gagal_pickup'        => ['label' => 'Gagal Pickup',        'class' => 'badge--gagal',       'dot' => '#ff4d4f'],
        'dibatalkan'          => ['label' => 'Dibatalkan',          'class' => 'badge--batal',       'dot' => '#8c8c8c'],
    ];
    $si = $statusMap[$pesanan->status] ?? ['label' => $pesanan->status, 'class' => 'badge--masuk', 'dot' => '#faad14'];

    /* Timeline steps */
    $timelineSteps = [
        'pesanan_diterima' => [
            'label' => 'Pesanan Diterima',
            'desc'  => 'Pesanan berhasil diterima oleh toko',
        ],
        'pickup'           => [
            'label' => 'Pickup Berhasil',
            'desc'  => 'Kurir berhasil mengambil pakaian dari alamat pelanggan',
        ],
        'diproses'         => [
            'label' => 'Sedang Diproses',
            'desc'  => 'Pakaian sedang dalam proses pencucian dan pengeringan',
        ],
        'pengantaran'      => [
            'label' => 'Dalam Pengantaran',
            'desc'  => 'Kurir akan mengantar pakaian ke alamat pelanggan',
        ],
        'selesai'          => [
            'label' => 'Selesai',
            'desc'  => 'Pesanan telah diterima pelanggan',
        ],
    ];

    $stepOrder  = ['masuk', 'aktif', 'pickup', 'ditimbang', 'menunggu_pembayaran', 'diproses', 'pengantaran', 'selesai'];
    $currentIdx = array_search($pesanan->status, $stepOrder);

    /* Harga */
    $subtotal = $pesanan->subtotal    ?? 0;
    $ongkir   = $pesanan->ongkir      ?? 0;
    $diskon   = $pesanan->diskon      ?? 0;
    $total    = $pesanan->total_bayar ?? 0;
    $lunas    = $pesanan->status_bayar === 'lunas';

    /* Inisial pelanggan */
    $namaUser = $pesanan->user->name ?? 'U';
    $initials = implode('', array_map(fn($w) => strtoupper($w[0]), array_slice(explode(' ', $namaUser), 0, 2)));

    /* Riwayat pesanan customer — query langsung tanpa relasi orders() */
    $riwayatPesanan = \App\Models\Order::where('user_id', $pesanan->user_id)
        ->with('items')
        ->latest()
        ->take(3)
        ->get();

    $totalPesananUser = \App\Models\Order::where('user_id', $pesanan->user_id)->count();
@endphp

<div class="mdp-page">

    <div class="mdp-topnav">
        <a href="{{ route('mitra.pesanan') }}" class="mdp-back">
            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M19 12H5M12 5l-7 7 7 7"/></svg>
            Kembali
        </a>
    </div>

    @if($errors->any())
    <div style="background-color: #fef2f2; border-left: 4px solid #ef4444; color: #b91c1c; padding: 12px 16px; margin: 16px 24px; border-radius: 4px; font-size: 14px;">
        <strong style="display: block; margin-bottom: 4px;">Terjadi kesalahan:</strong>
        <ul style="margin: 0; padding-left: 20px;">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    {{-- ── HERO HEADER ── --}}
    <div class="mdp-hero mdp-hero--{{ $pesanan->status }}">
        <div class="mdp-hero-left">
            <div class="mdp-hero-id">#{{ $pesanan->order_code }}</div>
            <div class="mdp-hero-meta">
                Hari ini, {{ $pesanan->created_at->format('H:i') }} WIB
                &nbsp;·&nbsp;
                {{ $pesanan->created_at->format('d M Y') }}
            </div>
            <div class="mdp-hero-total-label">Total Pembayaran</div>
            <div class="mdp-hero-total">Rp {{ number_format($total, 0, ',', '.') }}</div>
        </div>
        <div class="mdp-hero-right">
            <div class="mdp-hero-status-wrap">
                <span class="mdp-hero-dot"></span>
                {{ $si['label'] }}
            </div>
            @if(!in_array($pesanan->status, ['dibatalkan','gagal_pickup']))
            <div class="mdp-hero-est">
                Est. selesai: {{ $pesanan->tanggal_pickup ? $pesanan->tanggal_pickup->format('d M') . ', ' . \Carbon\Carbon::parse($pesanan->waktu_pickup)->format('H:i') . ' WIB' : '-' }}
            </div>
            @endif
        </div>
    </div>

    {{-- ── BODY ── --}}
    <div class="mdp-body">

        {{-- ══ KOLOM KIRI ══ --}}
        <div class="mdp-left">

            {{-- Alert --}}
            @if(session('success'))
            <div class="mdp-alert mdp-alert--success">
                <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg>
                {{ session('success') }}
            </div>
            @endif

            {{-- ── STATUS PESANAN ── --}}
            <div class="mdp-card">
                <div class="mdp-card-head">
                    <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
                    <span class="mdp-card-title">Status Pesanan</span>
                    <span class="mdp-card-sub">Progres terkini pesanan ini</span>
                    <span class="mdp-status-badge {{ $si['class'] }}">
                        <span class="mdp-dot" style="background:{{ $si['dot'] }}"></span>
                        {{ $si['label'] }}
                    </span>
                </div>

                {{-- Stepper / Timeline --}}
                @if(!in_array($pesanan->status, ['gagal_pickup', 'dibatalkan']))
                <div class="mdp-timeline">
                    @php
                        $histories = $pesanan->statusHistories->keyBy('status_baru');
                        $tlSteps = [
                            ['key' => 'masuk',               'label' => 'Pesanan Diterima',    'desc' => 'Pesanan berhasil diterima oleh toko'],
                            ['key' => 'pickup',              'label' => 'Pickup Berhasil',     'desc' => 'Kurir berhasil mengambil pakaian dari pelanggan'],
                            ['key' => 'ditimbang',           'label' => 'Ditimbang',           'desc' => 'Barang ditimbang untuk menentukan total biaya'],
                            ['key' => 'menunggu_pembayaran', 'label' => 'Menunggu Pembayaran', 'desc' => 'Menunggu pembayaran dari pelanggan'],
                            ['key' => 'diproses',            'label' => 'Sedang Diproses',     'desc' => 'Pakaian sedang dalam proses pencucian dan pengeringan'],
                            ['key' => 'pengantaran',         'label' => 'Dalam Pengantaran',   'desc' => 'Kurir akan mengantar pakaian ke alamat pelanggan'],
                            ['key' => 'selesai',             'label' => 'Selesai',             'desc' => 'Pesanan telah diterima pelanggan'],
                        ];
                        $stepKeys   = array_column($tlSteps, 'key');
                        $curTlIdx   = array_search($pesanan->status, $stepKeys);
                        if ($curTlIdx === false) $curTlIdx = 0;
                    @endphp

                    @foreach($tlSteps as $i => $step)
                    @php
                        $isDone   = $i < $curTlIdx;
                        $isActive = $i === $curTlIdx;
                        $hist     = $histories->get($step['key']);
                        $isLast   = $i === count($tlSteps) - 1;
                    @endphp
                    <div class="mdp-tl-item {{ $isDone ? 'tl--done' : ($isActive ? 'tl--active' : 'tl--pending') }} {{ $isLast ? 'tl--last' : '' }}">
                        <div class="mdp-tl-left">
                            <div class="mdp-tl-icon">
                                @if($isDone)
                                <svg width="11" height="11" fill="none" stroke="white" stroke-width="3" viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg>
                                @elseif($isActive)
                                <svg width="11" height="11" fill="white" viewBox="0 0 24 24"><circle cx="12" cy="12" r="5"/></svg>
                                @endif
                            </div>
                            @if(!$isLast)<div class="mdp-tl-line"></div>@endif
                        </div>
                        <div class="mdp-tl-content">
                            <div class="mdp-tl-label" style="display: flex; justify-content: space-between; align-items: center;">
                                <span>{{ $step['label'] }}</span>
                            </div>
                            <div class="mdp-tl-desc">{{ $step['desc'] }}</div>
                            @if($hist)
                            <div class="mdp-tl-time">
                                <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
                                {{ $hist->created_at->format('d M Y · H:i') }} WIB
                                @if($isActive && $hist->catatan)
                                &nbsp;·&nbsp;<strong class="mdp-tl-badge">{{ $hist->catatan }}</strong>
                                @endif
                                @if($hist->status_baru === 'pickup' && $pesanan->foto_pickup)
                                <div style="margin-top: 5px;">
                                    <a href="{{ asset('storage/' . $pesanan->foto_pickup) }}" target="_blank" style="color: #1a56e8; text-decoration: none; font-weight: 500; display: inline-flex; align-items: center; gap: 4px; font-size: 12px;">
                                        <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" y1="3" x2="12" y2="15"/></svg>
                                        Lihat Foto PickUp
                                    </a>
                                </div>
                                @endif
                                @if($hist->status_baru === 'selesai' && $pesanan->foto_pengantaran)
                                <div style="margin-top: 5px;">
                                    <a href="{{ asset('storage/' . $pesanan->foto_pengantaran) }}" target="_blank" style="color: #1a56e8; text-decoration: none; font-weight: 500; display: inline-flex; align-items: center; gap: 4px; font-size: 12px;">
                                        <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" y1="3" x2="12" y2="15"/></svg>
                                        Lihat Foto Pengantaran
                                    </a>
                                </div>
                                @endif
                            </div>
                            @elseif(!$isDone && !$isActive)
                            <div class="mdp-tl-time mdp-tl-time--est">
                                Estimasi: {{ $pesanan->tanggal_pickup ? $pesanan->tanggal_pickup->format('d M Y') . ' · ' . $pesanan->waktu_pickup . ' WIB' : '-' }}
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                {{-- Gagal / Batal --}}
                <div class="mdp-alasan {{ $pesanan->status === 'gagal_pickup' ? 'mdp-alasan--gagal' : 'mdp-alasan--batal' }}">
                    <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                    <span>{{ $pesanan->alasan_gagal ?? $pesanan->alasan_batal ?? 'Tidak ada keterangan.' }}</span>
                </div>
                @endif

                {{-- Aksi update status --}}
                @if(!in_array($pesanan->status, ['selesai','dibatalkan','gagal_pickup']))
                <div class="mdp-card-actions">
                    @if($pesanan->status === 'masuk')
                    <button class="mdp-btn mdp-btn--terima" onclick="document.getElementById('modalTerima').classList.add('active')">
                        <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg>
                        Terima Pesanan
                    </button>
                    <button class="mdp-btn mdp-btn--tolak" onclick="document.getElementById('modalTolak').classList.add('active')">
                        <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="15" y1="9" x2="9" y2="15"/><line x1="9" y1="9" x2="15" y2="15"/></svg>
                        Tolak
                    </button>
                    @elseif($pesanan->status === 'pickup')
                    <button class="mdp-btn mdp-btn--update" onclick="document.getElementById('modalTimbang').classList.add('active')" style="background-color: #1677ff; color: white;">
                        <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M4 10h16v11a1 1 0 01-1 1H5a1 1 0 01-1-1V10z"/><path d="M7 6h10M9 6V4a2 2 0 012-2h2a2 2 0 012 2v2M8 14h8"/></svg>
                        Input Timbangan
                    </button>
                    @elseif($pesanan->status === 'menunggu_pembayaran')
                    <button id="btnMenungguKirim" class="mdp-btn mdp-btn--update" onclick="document.getElementById('modalKirimInvoice').classList.add('active')" style="background-color: #1a56e8; color: white;">
                        <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" y1="3" x2="12" y2="15"/></svg>
                        <span class="btn-text">Kirim Invoice</span>
                    </button>
                    @else
                    <button class="mdp-btn mdp-btn--update" onclick="document.getElementById('modalUpdate').classList.add('active')">
                        <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><polyline points="1 4 1 10 7 10"/><path d="M3.51 15a9 9 0 102.13-9.36L1 10"/></svg>
                        Update Status
                    </button>
                    @endif

                    @if(in_array($pesanan->status, ['aktif', 'diproses', 'pengantaran']))
                    <button id="btnKirimInvoiceManual" class="mdp-btn mdp-btn--update" onclick="document.getElementById('modalKirimInvoice').classList.add('active')" style="background-color: #1a56e8; color: white; border-color: #1a56e8;">
                        <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" y1="3" x2="12" y2="15"/></svg>
                        <span class="btn-text">Kirim Invoice</span>
                    </button>
                    @endif

                </div>
                @endif
            </div>

            {{-- ── RINCIAN LAYANAN ── --}}
            <div class="mdp-card">
                <div class="mdp-card-head">
                    <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>
                    <span class="mdp-card-title">Rincian Layanan</span>
                    <span class="mdp-card-sub">Detail item yang dipesan</span>
                </div>

                <div class="mdp-layanan-list">
                    @foreach($pesanan->items as $item)
                    <div class="mdp-layanan-row">
                        <div class="mdp-layanan-icon">
                            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="4"/><path d="M12 2v2m0 16v2M4.93 4.93l1.41 1.41m11.32 11.32l1.41 1.41M2 12h2m16 0h2M4.93 19.07l1.41-1.41M18.36 5.64l1.41-1.41"/></svg>
                        </div>
                        @php
                            $namaLayananLower = strtolower($item->nama_layanan);
                            $isKiloan = str_contains($namaLayananLower, 'cuci kering') || str_contains($namaLayananLower, 'setrika');
                            $unit = $isKiloan ? 'Kg' : (str_contains($namaLayananLower, 'sepatu') ? 'Pasang' : (str_contains($namaLayananLower, 'karpet') ? 'Meter' : 'Pcs'));
                            $qty = floatval($isKiloan ? $item->berat_aktual : $item->qty);
                            $price = $isKiloan ? $item->harga_per_kg : $item->harga_satuan;
                            if (is_null($price) || $price == 0) {
                                $laundryService = \App\Models\LaundryService::find($item->jenis_layanan);
                                $price = $laundryService ? $laundryService->base_price : $item->subtotal;
                            }
                        @endphp
                        <div class="mdp-layanan-info">
                            <div class="mdp-layanan-name">{{ $item->nama_layanan }}</div>
                            <div class="mdp-layanan-qty">
                                {{ $qty ?? '0' }} {{ $unit }}
                                × Rp {{ number_format($price, 0, ',', '.') }}/{{ $unit }}
                            </div>
                        </div>
                        <div class="mdp-layanan-right">
                            <div class="mdp-layanan-harga">Rp {{ number_format($item->subtotal ?? 0, 0, ',', '.') }}</div>
                            <div class="mdp-layanan-berat">{{ $qty ?? '0' }} {{ $unit }}</div>
                        </div>
                    </div>
                    @endforeach

                    @if($ongkir > 0)
                    <div class="mdp-layanan-row">
                        <div class="mdp-layanan-icon">
                            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="1" y="3" width="15" height="13" rx="2"/><path d="M16 8h4l3 3v5h-7V8z"/><circle cx="5.5" cy="18.5" r="1.5"/><circle cx="18.5" cy="18.5" r="1.5"/></svg>
                        </div>
                        <div class="mdp-layanan-info">
                            <div class="mdp-layanan-name">Antar Jemput</div>
                            <div class="mdp-layanan-qty">Pickup + Delivery</div>
                        </div>
                        <div class="mdp-layanan-right">
                            <div class="mdp-layanan-harga">Rp {{ number_format($ongkir, 0, ',', '.') }}</div>
                            <div class="mdp-layanan-berat">1 trip</div>
                        </div>
                    </div>
                    @endif
                </div>

                {{-- Subtotal rows --}}
                <div class="mdp-price-rows">
                    <div class="mdp-price-row">
                        <span>Subtotal layanan</span>
                        <span>Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                    </div>
                    @if($ongkir > 0)
                    <div class="mdp-price-row">
                        <span>Biaya antar jemput</span>
                        <span>Rp {{ number_format($ongkir, 0, ',', '.') }}</span>
                    </div>
                    @endif
                    @if($diskon > 0)
                    <div class="mdp-price-row mdp-price-row--diskon">
                        <span>Diskon</span>
                        <span>- Rp {{ number_format($diskon, 0, ',', '.') }}</span>
                    </div>
                    @endif
                    <div class="mdp-price-row mdp-price-row--total">
                        <span>Total</span>
                        <span>Rp {{ number_format($total, 0, ',', '.') }}</span>
                    </div>
                </div>

                {{-- Catatan --}}
                @if($pesanan->catatan)
                <div class="mdp-catatan">
                    <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/></svg>
                    <span>{{ $pesanan->catatan }}</span>
                </div>
                @endif
            </div>

        </div>{{-- /mdp-left --}}

        {{-- ══ KOLOM KANAN ══ --}}
        <div class="mdp-right">

            {{-- ── PELANGGAN ── --}}
            <div class="mdp-card">
                <div class="mdp-customer-header">
                    <div class="mdp-avatar">{{ $initials }}</div>
                    <div>
                        <div class="mdp-customer-name">{{ $pesanan->user->name ?? '-' }}</div>
                        <div class="mdp-customer-phone">{{ $pesanan->user->phone ?? '-' }}</div>
                        <div class="mdp-customer-meta">
                            ⭐ Pelanggan sejak {{ optional($pesanan->user->created_at)->format('F Y') ?? '-' }}
                            &nbsp;·&nbsp;
                            {{ $totalPesananUser }} pesanan
                        </div>
                    </div>
                </div>
                <div class="mdp-customer-actions">
                    <a href="https://wa.me/{{ preg_replace('/\D/', '', $pesanan->user->phone ?? '') }}" target="_blank" class="mdp-btn-cust mdp-btn-cust--wa">
                        <svg width="14" height="14" fill="currentColor" viewBox="0 0 17 17"><path d="M0.833052 6.56C2.74945 10.7339 6.15946 14.0524 10.399 15.8514L11.0786 16.1542C12.6334 16.8469 14.4612 16.3206 15.4095 14.9071L16.2976 13.5834C16.5863 13.153 16.4984 12.5734 16.095 12.248L13.0832 9.81819C12.6408 9.4613 11.9903 9.54443 11.6519 10.0011L10.7202 11.2584C8.32935 10.079 6.3883 8.13795 5.20895 5.74714L6.4662 4.81542C6.92286 4.477 7.00599 3.82649 6.6491 3.3841L4.21923 0.372161C3.89389-0.0311206 3.31438-0.119088 2.88402 0.169481L1.55118 1.06318C0.128832 2.01689-0.394548 3.85974 0.314183 5.41868L0.832272 6.5583L0.833052 6.56Z"/></svg>
                        WhatsApp
                    </a>
                    <a href="{{ route('mitra.chat', ['contact_id' => $pesanan->user->id]) }}" class="mdp-btn-cust mdp-btn-cust--telp">
                        <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
                        Chat Customer
                    </a>
                </div>

                {{-- Riwayat pesanan --}}
                <div class="mdp-riwayat-head">RIWAYAT PESANAN</div>
                <div class="mdp-riwayat-list">
                    @forelse($riwayatPesanan as $rw)
                    <div class="mdp-riwayat-row {{ $rw->id === $pesanan->id ? 'riwayat--active' : '' }}">
                        <div class="mdp-rw-left">
                            <div class="mdp-rw-code">#{{ $rw->order_code }}</div>
                            <div class="mdp-rw-layanan">
                                @foreach($rw->items->take(1) as $ri)
                                    {{ $ri->nama_layanan }}{{ $ri->estimasi_berat ? ' ' . floatval($ri->estimasi_berat) . 'kg' : '' }}
                                @endforeach
                            </div>
                        </div>
                        <div class="mdp-rw-right">
                            <div class="mdp-rw-total">Rp {{ number_format($rw->total_bayar ?? 0, 0, ',', '.') }}</div>
                            <div class="mdp-rw-date {{ $rw->id === $pesanan->id ? 'rw-date--now' : '' }}">
                                {{ $rw->id === $pesanan->id ? 'Hari ini' : $rw->created_at->format('d M Y') }}
                            </div>
                        </div>
                    </div>
                    @empty
                    <p class="mdp-riwayat-empty">Belum ada riwayat pesanan.</p>
                    @endforelse
                </div>
                <a href="#" class="mdp-riwayat-more">
                    Lihat semua riwayat ›
                </a>
            </div>

            {{-- ── INFO PESANAN ── --}}
            <div class="mdp-card">
                <div class="mdp-card-head">
                    <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                    <span class="mdp-card-title">Info Pesanan</span>
                </div>
                <div class="mdp-info-rows">
                    <div class="mdp-info-row">
                        <span class="mdp-info-key">No. Pesanan</span>
                        <span class="mdp-info-val mdp-info-val--code">#{{ $pesanan->order_code }}</span>
                    </div>
                    <div class="mdp-info-row">
                        <span class="mdp-info-key">Tanggal Masuk</span>
                        <span class="mdp-info-val">{{ $pesanan->created_at->format('d M Y, H:i') }}</span>
                    </div>
                    <div class="mdp-info-row">
                        <span class="mdp-info-key">Est. Selesai</span>
                        <span class="mdp-info-val mdp-info-val--blue">
                            {{ $pesanan->tanggal_pickup ? $pesanan->tanggal_pickup->format('d M Y') . ', ' . \Carbon\Carbon::parse($pesanan->waktu_pickup)->format('H:i') . ' WIB' : '-' }}
                        </span>
                    </div>
                    <div class="mdp-info-row">
                        <span class="mdp-info-key">Berat Aktual</span>
                        <span class="mdp-info-val">
                            {{ floatval($pesanan->items->sum('estimasi_berat') ?? 0) }} kg
                        </span>
                    </div>
                    <div class="mdp-info-row">
                        <span class="mdp-info-key">Kurir</span>
                        <span class="mdp-info-val">{{ $pesanan->driver->name ?? '-' }}</span>
                    </div>
                    <div class="mdp-info-row">
                        <span class="mdp-info-key">Pembayaran</span>
                        @if($lunas)
                            <a href="{{ route('user.pesanan.invoice', $pesanan->id) }}" target="_blank" style="text-decoration: none;" title="Lihat Invoice Pembayaran">
                                <span class="mdp-pay-badge pay--lunas" style="cursor: pointer; box-shadow: 0 2px 4px rgba(0,0,0,0.05); transition: transform 0.2s;">
                                    Lunas 📄
                                </span>
                            </a>
                        @else
                            <span class="mdp-pay-badge pay--belum">
                                Belum Lunas
                            </span>
                        @endif
                    </div>
                    <div class="mdp-info-row">
                        <span class="mdp-info-key">Alamat Pickup</span>
                        <span class="mdp-info-val">{{ $pesanan->alamat_pickup ?? '-' }}</span>
                    </div>
                </div>
            </div>

        </div>{{-- /mdp-right --}}

    </div>{{-- /mdp-body --}}
</div>

{{-- ═══ MODAL: Terima Pesanan ═══ --}}
<div class="mdp-modal-overlay" id="modalTerima">
    <div class="mdp-modal">
        <div class="mdp-modal-icon mdp-modal-icon--green">
            <svg width="22" height="22" fill="none" stroke="#16a34a" stroke-width="2.5" viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg>
        </div>
        <h3 class="mdp-modal-title">Terima Pesanan?</h3>
        <p class="mdp-modal-desc">Konfirmasi bahwa Anda menerima pesanan <strong>#{{ $pesanan->order_code }}</strong> dari {{ $pesanan->user->name ?? 'pelanggan' }}.</p>
        <form action="{{ route('mitra.pesanan.terima', $pesanan->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mdp-modal-actions">
                <button type="button" class="mdp-modal-btn mdp-modal-btn--ghost" onclick="document.getElementById('modalTerima').classList.remove('active')">Batal</button>
                <button type="submit" class="mdp-modal-btn mdp-modal-btn--green">Terima & Kirim Invoice</button>
            </div>
        </form>
    </div>
</div>

{{-- ═══ MODAL: Tolak / Batalkan ═══ --}}
<div class="mdp-modal-overlay" id="modalTolak">
    <div class="mdp-modal">
        <div class="mdp-modal-icon mdp-modal-icon--red">
            <svg width="22" height="22" fill="none" stroke="#dc2626" stroke-width="2.5" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="15" y1="9" x2="9" y2="15"/><line x1="9" y1="9" x2="15" y2="15"/></svg>
        </div>
        <h3 class="mdp-modal-title">Tolak Pesanan?</h3>
        <p class="mdp-modal-desc">Berikan alasan penolakan pesanan ini.</p>
        <form action="{{ route('mitra.pesanan.tolak', $pesanan->id) }}" method="POST">
            @csrf
            @method('PUT')
            <textarea name="alasan" class="mdp-modal-textarea" placeholder="Alasan penolakan..." rows="3" required></textarea>
            <div class="mdp-modal-actions">
                <button type="button" class="mdp-modal-btn mdp-modal-btn--ghost" onclick="document.getElementById('modalTolak').classList.remove('active')">Batal</button>
                <button type="submit" class="mdp-modal-btn mdp-modal-btn--red">Ya, Tolak</button>
            </div>
        </form>
    </div>
</div>

{{-- ═══ MODAL: Update Status ═══ --}}
<div class="mdp-modal-overlay" id="modalUpdate">
    <div class="mdp-modal" style="position: relative;">
        <!-- Tombol X Close -->
        <button type="button" onclick="document.getElementById('modalUpdate').classList.remove('active')" style="position: absolute; top: 15px; left: 15px; background: transparent; border: none; font-size: 24px; cursor: pointer; color: #9ca3af; line-height: 1; padding: 0;">
            &times;
        </button>

        <div class="mdp-modal-icon mdp-modal-icon--blue">
            <svg width="22" height="22" fill="none" stroke="#1a56e8" stroke-width="2.5" viewBox="0 0 24 24"><polyline points="1 4 1 10 7 10"/><path d="M3.51 15a9 9 0 102.13-9.36L1 10"/></svg>
        </div>
        <h3 class="mdp-modal-title">Update Status Pesanan</h3>
        <p class="mdp-modal-desc">Pilih status baru untuk pesanan ini.</p>
        <form action="{{ route('mitra.pesanan.update', $pesanan->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            @if($pesanan->status === 'aktif')
                <div style="margin-top: 15px;">
                    <label style="display: block; font-size: 13px; margin-bottom: 6px; color: var(--neutral-600);">Foto Bukti PickUp <span style="color: red">*</span></label>
                    <input type="file" name="foto_pickup" accept="image/*" class="mdp-modal-textarea" style="padding: 8px;" required>
                </div>
            @elseif($pesanan->status === 'pengantaran')
                <div style="margin-top: 15px;">
                    <label style="display: block; font-size: 13px; margin-bottom: 6px; color: var(--neutral-600);">Foto Bukti Pengantaran <span style="color: red">*</span></label>
                    <input type="file" name="foto_pengantaran" accept="image/*" class="mdp-modal-textarea" style="padding: 8px;" required>
                </div>
            @else
                <textarea name="catatan" class="mdp-modal-textarea" placeholder="Catatan (opsional)..." rows="2" style="margin-top: 15px;"></textarea>
            @endif

            <div class="mdp-modal-actions" style="margin-top: 15px;">
                @if($pesanan->status === 'aktif')
                    <button type="submit" name="status_baru" value="gagal_pickup" class="mdp-modal-btn mdp-modal-btn--red">Pickup Gagal</button>
                    <button type="submit" name="status_baru" value="pickup" class="mdp-modal-btn mdp-modal-btn--blue">Pickup Berhasil</button>
                @elseif($pesanan->status === 'diproses')
                    <button type="submit" name="status_baru" value="pengantaran" class="mdp-modal-btn mdp-modal-btn--blue" style="width: 100%;">Mulai Pengantaran & Kirim Invoice</button>
                @elseif($pesanan->status === 'pengantaran')
                    <button type="submit" name="status_baru" value="selesai" class="mdp-modal-btn mdp-modal-btn--green" style="width: 100%;">Tandai Selesai & Kirim Pesan Ulasan</button>
                @endif
            </div>
        </form>
    </div>
</div>

{{-- ═══ MODAL: Input Timbangan ═══ --}}
<div class="mdp-modal-overlay" id="modalTimbang">
    <div class="mdp-modal">
        <div class="mdp-modal-icon mdp-modal-icon--blue">
            <svg width="22" height="22" fill="none" stroke="#1a56e8" stroke-width="2.5" viewBox="0 0 24 24"><path d="M4 10h16v11a1 1 0 01-1 1H5a1 1 0 01-1-1V10z"/><path d="M7 6h10M9 6V4a2 2 0 012-2h2a2 2 0 012 2v2M8 14h8"/></svg>
        </div>
        <h3 class="mdp-modal-title">Input Timbangan</h3>
        <p class="mdp-modal-desc">Masukkan berat aktual barang. Status akan diperbarui ke <strong>Menunggu Pembayaran</strong>.</p>
        <form action="{{ route('mitra.pesanan.update', $pesanan->id) }}" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="status_baru" value="menunggu_pembayaran">

            @foreach($pesanan->items as $item)
            @php
                $namaLayananLower = strtolower($item->nama_layanan);
                $isKiloan = str_contains($namaLayananLower, 'cuci kering') || str_contains($namaLayananLower, 'setrika');
                $unit = $isKiloan ? 'Kg' : (str_contains($namaLayananLower, 'sepatu') ? 'Pasang' : (str_contains($namaLayananLower, 'karpet') ? 'Meter' : 'Pcs'));
                $price = $isKiloan ? $item->harga_per_kg : $item->harga_satuan;
                if (is_null($price) || $price == 0) {
                    $laundryService = \App\Models\LaundryService::find($item->jenis_layanan);
                    $price = $laundryService ? $laundryService->base_price : $item->subtotal;
                }
            @endphp
            <div style="margin-bottom: 15px; padding: 12px; background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 8px;">
                <label style="display: block; font-size: 13px; margin-bottom: 8px; font-weight: 600; color: #1e293b;">
                    {{ $item->nama_layanan }}
                </label>
                <div style="display: flex; gap: 10px; align-items: center;">
                    <div style="flex: 1; position: relative;">
                        <input type="number" name="timbangan[{{ $item->id }}]" step="0.1" min="0.1" class="mdp-modal-textarea input-timbangan" style="height: 38px; padding-right: 50px; margin: 0;" data-price="{{ $price }}" placeholder="0" required>
                        <span style="position: absolute; right: 12px; top: 50%; transform: translateY(-50%); font-size: 12px; font-weight: 500; color: #64748b;">{{ $unit }}</span>
                    </div>
                    <div style="font-size: 14px; font-weight: 700; color: #0f172a; width: 120px; text-align: right;">
                        <span class="timbangan-subtotal" data-price="{{ $price }}">Rp 0</span>
                    </div>
                </div>
                <div style="font-size: 11px; color: #64748b; margin-top: 6px;">Harga: Rp {{ number_format($price, 0, ',', '.') }} / {{ $unit }}</div>
            </div>
            @endforeach

            <textarea name="catatan" class="mdp-modal-textarea" placeholder="Catatan (opsional)..." rows="2"></textarea>
            <div class="mdp-modal-actions">
                <button type="button" class="mdp-modal-btn mdp-modal-btn--ghost" onclick="document.getElementById('modalTimbang').classList.remove('active')">Batal</button>
                <button type="submit" class="mdp-modal-btn mdp-modal-btn--blue">Simpan & Kirim Invoice</button>
            </div>
        </form>
    </div>
</div>

{{-- 🔹🔹🔹 MODAL: Kirim Invoice 🔹🔹🔹 --}}
<div class="mdp-modal-overlay" id="modalKirimInvoice">
    <div class="mdp-modal" style="max-width: 700px
; padding: 0; overflow: hidden; display: flex; flex-direction: column;">
        <div style="padding: 15px 20px; border-bottom: 1px solid #eee; display: flex; justify-content: space-between; align-items: center; background: #f9fafb;">
            <h3 style="margin: 0; font-size: 16px; color: #333;">Invoice</h3>
        </div>

        <div style="padding: 20px; overflow-y: auto; max-height: 60vh; background: #fff;">
            {{-- Invoice Layout --}}
            <div style="font-family: 'Poppins', sans-serif; color: #333; line-height: 1.6;">
                @php
                    $isLunas = $pesanan->status_bayar === 'lunas';
                    if ($pesanan->status === 'pengantaran') {
                        $invoiceTag = 'Sedang Dikirim';
                        $tagColor = '#3b82f6'; // blue
                        $showQuantity = true;
                    } elseif ($isLunas || in_array($pesanan->status, ['diproses', 'selesai'])) {
                        $invoiceTag = 'Lunas';
                        $tagColor = '#10b981'; // green
                        $showQuantity = true;
                    } elseif ($pesanan->status === 'menunggu_pembayaran') {
                        $invoiceTag = 'Menunggu Pembayaran';
                        $tagColor = '#f59e0b'; // orange
                        $showQuantity = true;
                    } else {
                        $invoiceTag = 'Terkonfirmasi';
                        $tagColor = '#6366f1'; // indigo
                        $showQuantity = false;
                    }

                    // --- Format Teks WhatsApp ---
                    $waText = "*INVOICE CLEANWASH*\n";
                    $waText .= "-------------------------\n";
                    $waText .= "*Status:* " . strtoupper($invoiceTag) . "\n";
                    $waText .= "*No:* " . $pesanan->order_code . "\n";
                    $waText .= "*Tanggal:* " . $pesanan->created_at->format('d M Y') . "\n\n";

                    $waText .= "*Mitra:* " . ($pesanan->mitraLaundry->store_name ?? '-') . "\n";
                    $waText .= "*Telp:* " . ($pesanan->mitraLaundry->phone ?? '-') . "\n";
                    $waText .= "*Alamat:* " . ($pesanan->mitraLaundry->address ?? '-') . "\n\n";

                    $waText .= "*Pelanggan:* " . ($pesanan->user->name ?? '-') . "\n";
                    $waText .= "*Telp:* " . ($pesanan->user->phone ?? '-') . "\n";
                    $waText .= "*Alamat:* " . ($pesanan->address ?? '-') . "\n\n";

                    $waText .= "*Rincian Layanan:*\n";

                    foreach($pesanan->items as $item) {
                        $namaLayananLower = strtolower($item->nama_layanan);
                        $isKiloan = str_contains($namaLayananLower, 'cuci kering') || str_contains($namaLayananLower, 'setrika');
                        $satuan = $isKiloan ? 'kg' : (str_contains($namaLayananLower, 'sepatu') ? 'pasang' : (str_contains($namaLayananLower, 'karpet') ? 'meter' : 'pcs'));

                        $harga = $isKiloan ? $item->harga_per_kg : $item->harga_satuan;
                        if (is_null($harga) || $harga == 0) {
                            $laundryService = \App\Models\LaundryService::find($item->jenis_layanan);
                            $harga = $laundryService ? $laundryService->base_price : $item->subtotal;
                        }

                        $jumlah = floatval($isKiloan ? ($item->berat_aktual ?? $item->estimasi_berat ?? 0) : ($item->qty ?? 0));

                        $waText .= "- " . ($item->nama_layanan ?? 'Layanan Laundry') . ":\n";

                        if ($showQuantity) {
                            $waText .= "  Rp " . number_format((float) $harga, 0, ',', '.') . " x " . $jumlah . " " . $satuan . " = *Rp " . number_format((float) $item->subtotal, 0, ',', '.') . "*\n";
                        } else {
                            $waText .= "  Rp " . number_format((float) $harga, 0, ',', '.') . " / " . $satuan . "\n";
                        }
                    }

                    if ($showQuantity) {
                        $waText .= "\n";
                        if ($pesanan->ongkir > 0) {
                            $waText .= "*Ongkir:* Rp " . number_format((float) $pesanan->ongkir, 0, ',', '.') . "\n";
                        }
                        if ($pesanan->diskon > 0) {
                            $waText .= "*Diskon:* -Rp " . number_format((float) $pesanan->diskon, 0, ',', '.') . "\n";
                        }
                        $waText .= "*TOTAL KESELURUHAN:* Rp " . number_format($pesanan->total_bayar, 0, ',', '.') . "\n";
                    } else {
                        $waText .= "\n_(Jumlah barang dan total keseluruhan akan ditentukan setelah ditimbang)_\n";
                    }

                    if ($invoiceTag === 'Menunggu Pembayaran') {
                        $waText .= "\nSilakan cek detail pesanan dan lakukan pembayaran melalui link berikut:\n";
                        $waText .= route('user.detail-pesanan', $pesanan->id) . "\n";
                    } elseif ($invoiceTag === 'Lunas') {
                        $waText .= "\nSilakan lihat struk/invoice pembayaran Anda melalui link berikut:\n";
                        $waText .= route('user.pesanan.invoice', $pesanan->id) . "\n";
                    }

                    $waText .= "-------------------------\n";
                    $waText .= "Terima kasih telah mempercayakan cucian Anda kepada kami!";

                    $encodedWaText = rawurlencode($waText);
                                                $waNumber = preg_replace('/\D/', '', $pesanan->user->phone ?? '');
                @endphp
                <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 30px;">
                    <div>
                        <img src="{{ asset('assets/images/CW.png') }}" alt="Clean Wash Logo" style="height: 60px;">
                    </div>
                                                <div style="text-align: right;">
                        <span style="display: inline-block; background-color: {{ $tagColor }}; color: white; padding: 4px 12px; border-radius: 999px; font-size: 12px; font-weight: 600; margin-bottom: 10px;">{{ strtoupper($invoiceTag) }}</span>
                        <p style="margin: 0; font-size: 13px;"><strong>INVOICE NO:</strong> {{ $pesanan->order_code }}</p>
                        <p style="margin: 0; font-size: 13px;"><strong>TANGGAL:</strong> {{ $pesanan->created_at->format('d M Y') }}</p>
                    </div>
                </div>

                <div style="display: flex; justify-content: space-between; margin-bottom: 30px; font-size: 13px;">
                    <div style="width: 45%;">
                        <h3 style="font-size: 12px; color: #9ca3af; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 8px; margin-top:0;">Penagihan Kepada:</h3>
                        <p style="margin: 3px 0;"><strong>{{ $pesanan->user->name ?? '-' }}</strong></p>
                        <p style="margin: 3px 0;">{{ $pesanan->user->phone ?? '-' }}</p>
                        <p style="margin: 3px 0;">{{ $pesanan->alamat_pengantaran ?? $pesanan->alamat_pickup ?? 'Alamat tidak tersedia' }}</p>
                    </div>
                    <div style="width: 45%;">
                        <h3 style="font-size: 12px; color: #9ca3af; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 8px; margin-top:0;">Layanan Laundry:</h3>
                        <p style="margin: 3px 0;"><strong>{{ $pesanan->mitraLaundry->store_name ?? '-' }}</strong></p>
                        <p style="margin: 3px 0;">{{ $pesanan->mitraLaundry->user->phone ?? '-' }}</p>
                        <p style="margin: 3px 0;">{{ $pesanan->mitraLaundry->address ?? '-' }}</p>
                    </div>
                </div>

                <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px; font-size: 13px;">
                    <thead>
                        <tr>
                            <th style="padding: 10px; text-align: left; border-bottom: 1px solid #e5e7eb; background: #f9fafb; color: #6b7280; font-weight: 500;">Deskripsi Layanan</th>
                            <th style="padding: 10px; text-align: right; border-bottom: 1px solid #e5e7eb; background: #f9fafb; color: #6b7280; font-weight: 500;">Harga Dasar</th>
                            @if($showQuantity)
                            <th style="padding: 10px; text-align: right; border-bottom: 1px solid #e5e7eb; background: #f9fafb; color: #6b7280; font-weight: 500;">Jumlah</th>
                            <th style="padding: 10px; text-align: right; border-bottom: 1px solid #e5e7eb; background: #f9fafb; color: #6b7280; font-weight: 500;">Subtotal</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pesanan->items as $item)
                        @php
                            $namaLayananLower = strtolower($item->nama_layanan);
                            $isKiloan = str_contains($namaLayananLower, 'cuci kering') || str_contains($namaLayananLower, 'setrika');
                            $satuan = $isKiloan ? 'kg' : (str_contains($namaLayananLower, 'sepatu') ? 'pasang' : (str_contains($namaLayananLower, 'karpet') ? 'meter' : 'pcs'));

                            $harga = $isKiloan ? $item->harga_per_kg : $item->harga_satuan;
                            if (is_null($harga) || $harga == 0) {
                                $laundryService = \App\Models\LaundryService::find($item->jenis_layanan);
                                $harga = $laundryService ? $laundryService->base_price : $item->subtotal;
                            }

                            $jumlah = floatval($isKiloan ? ($item->berat_aktual ?? $item->estimasi_berat ?? 0) : ($item->qty ?? 0));
                        @endphp
                        <tr>
                            <td style="padding: 10px; border-bottom: 1px solid #e5e7eb;">{{ $item->nama_layanan ?? 'Layanan Laundry' }}</td>
                            <td style="padding: 10px; text-align: right; border-bottom: 1px solid #e5e7eb;">Rp {{ number_format((float) $harga, 0, ',', '.') }} / {{ $satuan }}</td>
                            @if($showQuantity)
                            <td style="padding: 10px; text-align: right; border-bottom: 1px solid #e5e7eb;">{{ $jumlah }} {{ $satuan }}</td>
                            <td style="padding: 10px; text-align: right; border-bottom: 1px solid #e5e7eb;">Rp {{ number_format((float) $item->subtotal, 0, ',', '.') }}</td>
                            @endif
                        </tr>
                        @endforeach

                        @if($showQuantity)
                            @if($pesanan->ongkir > 0)
                            <tr>
                                <td colspan="3" style="padding: 10px; text-align: right; border-bottom: 1px solid #e5e7eb;">Biaya Ongkir</td>
                                <td style="padding: 10px; text-align: right; border-bottom: 1px solid #e5e7eb;">Rp {{ number_format((float) $pesanan->ongkir, 0, ',', '.') }}</td>
                            </tr>
                            @endif

                            @if($pesanan->diskon > 0)
                            <tr>
                                <td colspan="3" style="padding: 10px; text-align: right; border-bottom: 1px solid #e5e7eb;">Diskon</td>
                                <td style="padding: 10px; text-align: right; border-bottom: 1px solid #e5e7eb;">-Rp {{ number_format((float) $pesanan->diskon, 0, ',', '.') }}</td>
                            </tr>
                            @endif

                            <tr style="font-weight: bold; font-size: 14px;">
                                <td colspan="3" style="padding: 10px; text-align: right; border-top: 2px solid #e5e7eb;">TOTAL KESELURUHAN</td>
                                <td style="padding: 10px; text-align: right; border-top: 2px solid #e5e7eb; color: #4f46e5;">Rp {{ number_format($pesanan->total_bayar, 0, ',', '.') }}</td>
                            </tr>
                        @else
                            <tr style="font-style: italic; font-size: 12px; color: #6b7280;">
                                <td colspan="2" style="padding: 15px 10px; text-align: center; border-top: 2px solid #e5e7eb;">
                                    Jumlah barang dan total keseluruhan akan ditentukan setelah ditimbang.
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

        <div style="padding: 15px 20px; border-top: 1px solid #eee; background: #f9fafb; display: flex; justify-content: flex-end; gap: 10px;">
            <button type="button" onclick="document.getElementById('modalKirimInvoice').classList.remove('active')" style="padding: 8px 16px; border-radius: 6px; border: 1px solid #d1d5db; background: white; color: #374151; font-weight: 500; cursor: pointer;">Batal</button>
            <a id="btnKirimSekarang" href="https://wa.me/{{ $waNumber }}?text={{ $encodedWaText }}" target="_blank" onclick="document.getElementById('modalKirimInvoice').classList.remove('active');" style="padding: 8px 16px; border-radius: 6px; border: none; background: #1a56e8; color: white; font-weight: 500; cursor: pointer; text-decoration: none; display: inline-block;">Kirim Sekarang</a>
        </div>
    </div>
</div>

<div class="mdp-modal-overlay" id="modalKirimUlasan">
    <div class="mdp-modal" style="max-width: 500px; padding: 0; overflow: hidden; display: flex; flex-direction: column;">
        <div style="padding: 15px 20px; border-bottom: 1px solid #eee; display: flex; justify-content: space-between; align-items: center; background: #f9fafb;">
            <h3 style="margin: 0; font-size: 16px; color: #333;">Pesan Selesai & Ulasan</h3>
        </div>

        <div style="padding: 20px; background: #fff; font-family: 'Poppins', sans-serif; color: #333; line-height: 1.6;">
            @php
                // --- Format Teks WhatsApp Ulasan ---
                $waReviewText = "*PESANAN SELESAI*\n";
                $waReviewText .= "-------------------------\n";
                $waReviewText .= "Halo *" . ($pesanan->user->name ?? 'Pelanggan') . "*, pesanan laundry Anda telah selesai!\n\n";

                $waReviewText .= "*No. Pesanan:* " . $pesanan->order_code . "\n";
                $waReviewText .= "*Status:* SELESAI\n\n";

                $waReviewText .= "*Mitra:* " . ($pesanan->mitraLaundry->store_name ?? 'CleanWash') . "\n";
                $waReviewText .= "*Telp:* " . ($pesanan->mitraLaundry->phone ?? '-') . "\n";
                $waReviewText .= "*Alamat:* " . ($pesanan->mitraLaundry->address ?? '-') . "\n\n";

                $waReviewText .= "Bagaimana pengalaman Anda menggunakan layanan kami?\n";
                $waReviewText .= "Yuk, berikan ulasan Anda melalui link berikut ini:\n";
                $waReviewText .= route('user.detail-pesanan', $pesanan->id) . "?show_review=1\n\n";

                $waReviewText .= "-------------------------\n";
                $waReviewText .= "Terima kasih telah mempercayakan cucian Anda kepada kami!";

                $encodedWaReviewText = rawurlencode($waReviewText);
            @endphp
            <div style="text-align: center; margin-bottom: 20px;">
                <h4 style="margin: 10px 0 5px;">Pesanan Selesai</h4>
                <p style="font-size: 13px; color: #6b7280; margin: 0;">Kirimkan pesan WhatsApp ke pelanggan untuk memberitahu bahwa pesanan telah selesai dan meminta ulasan.</p>
            </div>

            <div style="background: #f3f4f6; padding: 15px; border-radius: 8px; font-size: 12px; white-space: pre-wrap; font-family: monospace; color: #4b5563;">{{ $waReviewText }}</div>
        </div>

        <div style="padding: 15px 20px; border-top: 1px solid #eee; background: #f9fafb; display: flex; justify-content: flex-end; gap: 10px;">
            <button type="button" onclick="document.getElementById('modalKirimUlasan').classList.remove('active')" style="padding: 8px 16px; border-radius: 6px; border: 1px solid #d1d5db; background: white; color: #374151; font-weight: 500; cursor: pointer;">Batal</button>
            <a href="https://wa.me/{{ $waNumber ?? preg_replace('/\D/', '', $pesanan->user->phone ?? '') }}?text={{ $encodedWaReviewText }}" target="_blank" onclick="document.getElementById('modalKirimUlasan').classList.remove('active');" style="padding: 8px 16px; border-radius: 6px; border: none; background: #10b981; color: white; font-weight: 500; cursor: pointer; text-decoration: none; display: inline-block;">Kirim Pesan</a>
        </div>
    </div>
</div>

@endsection

@push('scripts')
@if(session('show_invoice_modal'))
<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById('modalKirimInvoice').classList.add('active');
    });
</script>
@endif
@if(session('show_review_modal'))
<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById('modalKirimUlasan').classList.add('active');
    });
</script>
@endif
<script>
document.querySelectorAll('.mdp-modal-overlay').forEach(function(overlay) {
    overlay.addEventListener('click', function(e) {
        if (e.target === this) this.classList.remove('active');
    });
});

document.querySelectorAll('.input-timbangan').forEach(function(input) {
    input.addEventListener('input', function() {
        let val = parseFloat(this.value) || 0;
        let price = parseFloat(this.getAttribute('data-price')) || 0;
        let subtotal = val * price;
        let subtotalEl = this.closest('div').nextElementSibling.querySelector('.timbangan-subtotal');
        if (subtotalEl) {
            subtotalEl.textContent = 'Rp ' + new Intl.NumberFormat('id-ID').format(subtotal);
        }
    });
});

document.addEventListener("DOMContentLoaded", function() {
    const orderId = "{{ $pesanan->id }}";
    const currentStatus = "{{ $pesanan->status }}";
    const isLunas = {{ $pesanan->status_bayar === 'lunas' ? 'true' : 'false' }};
    const storageKey = 'invoice_sent_' + orderId + '_' + currentStatus;
    const lunasKey = 'invoice_sent_' + orderId + '_lunas';

    function updateButtonTexts() {
        const btnManual = document.getElementById('btnKirimInvoiceManual');
        if (btnManual) {
            const span = btnManual.querySelector('.btn-text');
            if (span) span.textContent = 'Kirim Invoice Lagi';
        }
        const btnMenunggu = document.getElementById('btnMenungguKirim');
        if (btnMenunggu) {
            const span = btnMenunggu.querySelector('.btn-text');
            if (span) span.textContent = 'Kirim Invoice Lagi';
        }
    }

    if (localStorage.getItem(storageKey) === 'true') {
        updateButtonTexts();
    }

    // Auto popup Invoice Lunas jika belum dikirim (Semi-Otomatis untuk Mitra)
    if (isLunas && localStorage.getItem(lunasKey) !== 'true') {
        const modalInvoice = document.getElementById('modalKirimInvoice');
        const modalUlasan = document.getElementById('modalKirimUlasan');
        // Pastikan tidak bertabrakan dengan modal ulasan
        if (modalInvoice && (!modalUlasan || !modalUlasan.classList.contains('active'))) {
            modalInvoice.classList.add('active');
        }
    }

    const btnKirimSekarang = document.getElementById('btnKirimSekarang');
    if (btnKirimSekarang) {
        btnKirimSekarang.addEventListener('click', function() {
            localStorage.setItem(storageKey, 'true');
            if (isLunas) {
                localStorage.setItem(lunasKey, 'true');
            }
            updateButtonTexts();
        });
    }
});
</script>
@endpush
