@extends('user.layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/buat_pesanan.css') }}?v=2">
@endsection

@section('content')
<main class="bp-page">
    <div class="bp-container">

        {{-- Back --}}
        <a href="{{ url()->previous() }}" class="bp-back">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M15 18l-6-6 6-6"/>
            </svg>
            Kembali
        </a>

        {{-- Laundry Card --}}
        <div class="bp-laundry-card">
            <img src="{{ $laundry->logo ? asset('storage/'.$laundry->logo) : asset('assets/images/laundry-placeholder.jpg') }}"
                 alt="{{ $laundry->store_name }}"
                 class="bp-laundry-img">
            <div class="bp-laundry-info">
                <h2 class="bp-laundry-name">{{ $laundry->store_name }}</h2>
                <div class="bp-laundry-meta">
                    <span class="bp-rating">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="#FBBF24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                        4.8
                    </span>
                    <span class="bp-dot">·</span>
                    <span class="bp-distance">
                        <svg width="11" height="13" viewBox="0 0 24 24" fill="#EF4444"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
                        1.2 km
                    </span>
                    <span class="bp-dot">·</span>
                    <span class="bp-address">{{ $laundry->address }}, {{ $laundry->city }}</span>
                </div>
            </div>
        </div>

        {{-- Form --}}
        <form id="formBuatPesanan" action="{{ route('user.pesanan.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- ✅ field name harus mitra_laundry_id --}}
            <input type="hidden" name="mitra_laundry_id" value="{{ $laundry->id }}">

            {{-- Error bag Modal --}}
            @if($errors->any())
            <div class="bp-modal-overlay active" id="modalError" onclick="this.classList.remove('active')" style="z-index: 9999;">
                <div class="bp-modal" style="text-align: center; max-width: 400px; padding: 30px 20px;">
                    <div style="width: 60px; height: 60px; border-radius: 50%; background: #fee2e2; display: flex; align-items: center; justify-content: center; margin: 0 auto 15px;">
                        <svg width="30" height="30" fill="none" stroke="#ef4444" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                    </div>
                    <h3 style="font-size: 18px; color: #1e293b; margin-bottom: 10px; font-weight: 600;">Mohon Maaf</h3>
                    <p style="font-size: 14px; color: #64748b; margin-bottom: 20px; line-height: 1.5;">
                        @foreach($errors->all() as $error)
                            {{ $error }}<br>
                        @endforeach
                    </p>
                    <button type="button" class="bp-btn-lanjutkan" onclick="document.getElementById('modalError').classList.remove('active')" style="width: 100%; padding: 10px; border-radius: 8px;">
                        Mengerti
                    </button>
                </div>
            </div>
            @endif

            {{-- Daftar Layanan (dinamis) --}}
            <div id="daftarLayanan">
                {{-- Item pertama --}}
                <div class="bp-layanan-item" data-index="0">
                    <div class="bp-layanan-header">
                        <h3 class="bp-section-title">Pilih Layanan</h3>
                        <button type="button" class="bp-btn-hapus-layanan" onclick="hapusLayanan(this)" style="display:none">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 6L6 18M6 6l12 12"/></svg>
                            Hapus
                        </button>
                    </div>

                    <div class="bp-radio-group">
                        @foreach($laundry->services as $service)
                        @if($service->is_active)
                        <label class="bp-radio-label">
                            <input type="radio" name="layanan[0]" value="{{ $service->id }}" class="bp-radio-input" data-name="{{ $service->service_name }}" data-price="{{ $service->base_price }}">
                            <span class="bp-radio-custom"></span>
                            {{ $service->service_name }}
                        </label>
                        @endif
                        @endforeach
                    </div>
                    <div class="bp-divider"></div>
                </div>
            </div>

            {{-- Tombol Tambah Layanan --}}
            <button type="button" class="bp-btn-tambah" id="btnTambahLayanan" onclick="tambahLayanan()">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M12 5v14M5 12h14"/></svg>
                Tambah Layanan
            </button>

            {{-- Foto Barang --}}
            <div class="bp-section">
                <h3 class="bp-section-title">Foto Barang <span style="color: #ef4444; font-size: 14px;">*</span></h3>
                <p class="bp-section-desc">Upload foto pakaian/barang yang akan dicuci (Wajib)</p>
                <div class="bp-upload-area" id="uploadArea" onclick="document.getElementById('fotoInput').click()">
                    <div class="bp-upload-placeholder" id="uploadPlaceholder">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#9CA3AF" stroke-width="1.5">
                            <path d="M23 19a2 2 0 01-2 2H3a2 2 0 01-2-2V8a2 2 0 012-2h4l2-3h6l2 3h4a2 2 0 012 2z"/>
                            <circle cx="12" cy="13" r="4"/>
                        </svg>
                        <p class="bp-upload-text">Klik untuk upload foto</p>
                        <p class="bp-upload-hint">JPG, PNG maksimal 2MB</p>
                    </div>
                    <img id="fotoPreview" class="bp-foto-preview" style="display:none" alt="Preview foto">
                    <input type="file" id="fotoInput" name="foto_barang" accept="image/jpeg,image/png" style="display:none" onchange="previewFoto(this)">
                </div>
            </div>

            {{-- Jadwal --}}
            <div class="bp-section bp-jadwal-section">
                <div class="bp-jadwal-grid">
                    <div class="bp-jadwal-col">
                        <label class="bp-input-label" for="pilihTanggal">Pilih Tanggal</label>
                        <div class="bp-input-wrapper">
                            <input type="date" id="pilihTanggal" name="tanggal" class="bp-input" onclick="this.showPicker()" required>
                            <svg class="bp-input-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/>
                            </svg>
                        </div>
                    </div>
                    <div class="bp-jadwal-col">
                        <label class="bp-input-label" for="pilihWaktu">Pilih Waktu</label>
                        <div class="bp-input-wrapper">
                            <select id="pilihWaktu" name="waktu" class="bp-input" required>
                                <option value="">Pilih Waktu</option>
                            </select>
                            <svg class="bp-input-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Catatan (hidden, diisi dari modal) --}}
            <input type="hidden" name="catatan" id="inputCatatan">

            {{-- Submit hidden, dipanggil dari modal --}}
            <button type="submit" id="btnSubmitForm" style="display:none"></button>
        </form>

        {{-- Tombol Lanjutkan --}}
        <div class="bp-footer-action">
            <button type="button" class="bp-btn-lanjutkan" onclick="tampilkanRingkasan()">
                Lanjutkan Pesanan
            </button>
        </div>

    </div>{{-- /bp-container --}}
</main>

{{-- ===================== MODAL RINGKASAN ===================== --}}
<div class="bp-modal-overlay" id="modalRingkasan" onclick="tutupModal(event)">
    <div class="bp-modal" role="dialog" aria-modal="true" aria-labelledby="modalTitle">
        <div class="bp-modal-header">
            <h2 class="bp-modal-title" id="modalTitle">Ringkasan Pesanan</h2>
            <button class="bp-modal-close" onclick="tutupModalBtn()" aria-label="Tutup">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M18 6L6 18M6 6l12 12"/>
                </svg>
            </button>
        </div>

        <div class="bp-modal-body">
            <p class="bp-modal-laundry">{{ $laundry->store_name }}</p>

            <div class="bp-modal-rows" id="modalLayananList">
                {{-- Diisi JS --}}
            </div>

            <div class="bp-modal-row">
                <span class="bp-modal-label">Jadwal</span>
                <span class="bp-modal-value" id="modalJadwal">—</span>
            </div>

            <div class="bp-modal-divider"></div>

            <div class="bp-modal-catatan">
                <p class="bp-modal-catatan-label">Catatan Tambahan</p>
                <textarea id="modalCatatanInput" class="bp-modal-catatan-input"
                    placeholder="Contoh: pisahkan pakaian putih, jangan gunakan pewangi, dll" rows="3"></textarea>
            </div>
        </div>

        <div class="bp-modal-footer">
            <button class="bp-btn-konfirmasi" onclick="konfirmasiPesanan()">
                Lanjutkan Pesanan
            </button>
        </div>
    </div>
</div>

@endsection

@section('js')
@php
    $servicesData = $laundry->services->filter(function($service) {
        return $service->is_active;
    })->map(function($service) {
        return [
            'id' => $service->id,
            'service_name' => $service->service_name,
            'base_price' => $service->base_price,
            'label' => $service->service_name
        ];
    })->values()->all();
@endphp
<script>
    // Pass dynamic services to Javascript
    window.laundryServices = @json($servicesData);
</script>
<script src="{{ asset('assets/js/user/buat_pesanan.js') }}?v=3"></script>
@endsection
