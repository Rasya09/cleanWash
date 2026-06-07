@extends('mitra.layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/mitra/tambah_layanan.css') }}">
@endsection

@section('content')
    {{-- Content: Tambah Layanan --}}
    <div class="tl-page">
        {{-- Main Content --}}
        <div class="tl-layout">
            {{-- Form Area --}}
            <div class="tl-form-area">
                <div class="tl-form-header">
                    <h2 class="tl-form-title" id="formTitle">Informasi Dasar</h2>
                    <p class="tl-form-desc" id="formDesc">Lengkapi informasi dasar layanan Anda.</p>
                </div>

                <form id="multiStepForm" action="{{ route('mitra.update-layanan',$service->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    {{-- STEP 1 --}}
                    <div class="tl-step-content" id="step1">

                        <div class="tl-field">
                            <label class="tl-label">
                                Nama Layanan <span class="tl-required">*</span>
                            </label>
                            <div class="tl-input-wrap">
                                <select name="nama_layanan" class="tl-input" id="namaLayanan" required style="appearance: auto; padding-right: 15px;">
                                    <option value="" disabled>Pilih Layanan</option>
                                    <option value="Cuci Kering" {{ old('nama_layanan', $service->getRawOriginal('service_name')) == 'Cuci Kering' ? 'selected' : '' }}>Cuci Kering</option>
                                    <option value="Cuci Satuan" {{ old('nama_layanan', $service->getRawOriginal('service_name')) == 'Cuci Satuan' ? 'selected' : '' }}>Cuci Satuan</option>
                                    <option value="Cuci Sepatu" {{ old('nama_layanan', $service->getRawOriginal('service_name')) == 'Cuci Sepatu' ? 'selected' : '' }}>Cuci Sepatu</option>
                                    <option value="Cuci Karpet" {{ old('nama_layanan', $service->getRawOriginal('service_name')) == 'Cuci Karpet' ? 'selected' : '' }}>Cuci Karpet</option>
                                    <option value="Setrika Aja" {{ old('nama_layanan', $service->getRawOriginal('service_name')) == 'Setrika Aja' ? 'selected' : '' }}>Setrika Aja</option>
                                </select>
                            </div>
                        </div>

                        <style>
                            .toggle-switch { position: relative; display: inline-block; width: 44px; height: 24px; }
                            .toggle-switch input { opacity: 0; width: 0; height: 0; }
                            .toggle-slider { position: absolute; cursor: pointer; top: 0; left: 0; right: 0; bottom: 0; background-color: #cbd5e1; transition: .3s; border-radius: 34px; }
                            .toggle-slider:before { position: absolute; content: ""; height: 18px; width: 18px; left: 3px; bottom: 3px; background-color: white; transition: .3s; border-radius: 50%; }
                            .toggle-switch input:checked + .toggle-slider { background-color: #3b82f6; }
                            .toggle-switch input:checked + .toggle-slider:before { transform: translateX(20px); }
                        </style>

                        <div class="tl-grid-2">

                            <div class="tl-field">
                                <label class="tl-label">
                                    Harga Dasar
                                    <span class="tl-required">*</span>
                                </label>

                                <div class="tl-input-group">
                                    <span class="tl-addon">Rp</span>

                                    <input type="number" name="harga_dasar" class="tl-input" id="basePrice" min="0"
                                        required value="{{ old('harga_dasar', $service->base_price) }}">

                                    <span class="tl-addon unit-addon">/ Kg</span>
                                </div>
                            </div>

                            <div class="tl-field">
                                <label class="tl-label">
                                    Estimasi Pengerjaan
                                    <span class="tl-required">*</span>
                                </label>

                                <div class="tl-input-group">

                                    <input type="number" name="estimasi" class="tl-input" id="duration" min="1"
                                        required value="{{ old('estimasi', $service->estimated_days) }}">

                                    <span class="tl-addon">
                                        Hari
                                    </span>

                                </div>
                            </div>

                        </div>

                        <!-- Toggles Wrapper -->
                        <div id="togglesWrapper" style="display: none; margin-top: 20px; border-top: 1px dashed #e2e8f0; padding-top: 20px;">
                            
                            <!-- Toggle + Setrika (Hanya Cuci Kering) -->
                            <div class="tl-field" id="wrapSetrika" style="display: none; align-items: center; justify-content: space-between;">
                                <div>
                                    <label class="tl-label" style="margin: 0;">Tambah + Setrika?</label>
                                    <p style="font-size: 12px; color: #64748b; margin: 0;">Layanan ini otomatis mendapatkan opsi setrika</p>
                                </div>
                                <label class="toggle-switch">
                                    <input type="checkbox" name="is_setrika" value="1" id="isSetrika" {{ $service->is_setrika ? 'checked' : '' }}>
                                    <span class="toggle-slider"></span>
                                </label>
                            </div>

                            <!-- Toggle Batas Order -->
                            <div class="tl-field" id="wrapBatasOrderToggle" style="display: none; align-items: center; justify-content: space-between; margin-top: 15px;">
                                <div>
                                    <label class="tl-label" style="margin: 0;">Gunakan Batas Order?</label>
                                    <p style="font-size: 12px; color: #64748b; margin: 0;">Tetapkan minimal atau maksimal pemesanan</p>
                                </div>
                                <label class="toggle-switch">
                                    <input type="checkbox" id="toggleBatasOrder" {{ ($service->minimum_order || $service->maximum_order) ? 'checked' : '' }}>
                                    <span class="toggle-slider"></span>
                                </label>
                            </div>

                        </div>

                        <!-- Fields Batas Order (Hidden by default) -->
                        <div class="tl-grid-2" id="wrapBatasOrderFields" style="display: none; margin-top: 15px;">
                            <div class="tl-field">
                                <label class="tl-label" id="labelMinOrder">Minimal Order</label>
                                <div class="tl-input-group">
                                    <input type="number" name="minimal_order" class="tl-input" id="minimal_order" min="1" value="{{ old('minimal_order', $service->minimum_order) }}">
                                    <span class="tl-addon unit-addon">Kg</span>
                                </div>
                            </div>
                            <div class="tl-field" id="wrapMaxOrder">
                                <label class="tl-label">Maksimal Order</label>
                                <div class="tl-input-group">
                                    <input type="number" name="maksimal_order" class="tl-input" id="maksimal_order" min="1" value="{{ old('maksimal_order', $service->maximum_order) }}">
                                    <span class="tl-addon unit-addon">Kg</span>
                                </div>
                            </div>
                        </div>
                        <div class="tl-field">
                            <label class="tl-toggle-row">
                                <span class="tl-toggle-copy">
                                    <strong>Status Layanan</strong>
                                    <span>
                                        Aktifkan atau nonaktifkan layanan.
                                    </span>
                                </span>
                                <span class="tl-switch">
                                    <input
                                        type="checkbox"
                                        name="is_active"
                                        {{ $service->is_active ? 'checked' : '' }}>
                                    <span></span>
                                </span>
                            </label>
                        </div>
                    </div>


                </form>

                <div class="tl-actions">
                    <button type="button" class="tl-btn-next" id="btnNext">
                        Simpan Perubahan
                    </button>
                </div>
            </div>
        </div>{{-- end layout --}}
    </div>{{-- end tl-page --}}

    <script></script>
@endsection

@push('scripts')
    <script>

const btnNext = document.getElementById('btnNext');
const selectLayanan = document.getElementById('namaLayanan');
const unitAddons = document.querySelectorAll('.unit-addon');
const togglesWrapper = document.getElementById('togglesWrapper');
const wrapSetrika = document.getElementById('wrapSetrika');
const wrapBatasOrderToggle = document.getElementById('wrapBatasOrderToggle');
const wrapBatasOrderFields = document.getElementById('wrapBatasOrderFields');
const wrapMaxOrder = document.getElementById('wrapMaxOrder');
const labelMinOrder = document.getElementById('labelMinOrder');
const toggleBatasOrder = document.getElementById('toggleBatasOrder');
const isSetrika = document.getElementById('isSetrika');
const minOrderInput = document.getElementById('minimal_order');
const maxOrderInput = document.getElementById('maksimal_order');

function updateUI() {
    const val = selectLayanan.value;
    
    // Reset state initially
    togglesWrapper.style.display = 'block';
    wrapSetrika.style.display = 'none';
    wrapBatasOrderToggle.style.display = 'none';
    wrapBatasOrderFields.style.display = 'none';
    wrapMaxOrder.style.display = 'block';
    labelMinOrder.textContent = 'Minimal Order';
    
    // Default unit
    let unit = 'Kg';

    if (val === 'Cuci Kering') {
        wrapSetrika.style.display = 'flex';
        wrapBatasOrderToggle.style.display = 'flex';
        unit = 'Kg';
    } else if (val === 'Cuci Satuan') {
        wrapBatasOrderToggle.style.display = 'flex';
        unit = 'Satuan';
    } else if (val === 'Cuci Sepatu') {
        togglesWrapper.style.display = 'none'; 
        unit = 'Pasang';
    } else if (val === 'Cuci Karpet') {
        togglesWrapper.style.display = 'none'; 
        wrapBatasOrderFields.style.display = 'grid';
        wrapMaxOrder.style.display = 'none';
        labelMinOrder.textContent = 'Minimal Ukuran';
        unit = 'Meter';
    } else if (val === 'Setrika Aja') {
        wrapBatasOrderToggle.style.display = 'flex';
        unit = 'Kg';
    }

    // Apply Batas Order state
    if (val !== 'Cuci Karpet' && val !== 'Cuci Sepatu') {
        if (toggleBatasOrder.checked) {
            wrapBatasOrderFields.style.display = 'grid';
        } else {
            wrapBatasOrderFields.style.display = 'none';
            // Don't clear values on initial load if they exist, but clear if unchecked later
        }
    }

    // Update units
    unitAddons.forEach(el => {
        if (el.textContent.includes('/')) {
            el.textContent = '/ ' + unit;
        } else {
            el.textContent = unit;
        }
    });
}

// Initial Call
if (selectLayanan.value) {
    updateUI();
}

selectLayanan.addEventListener('change', function() {
    // When manually changed, reset the toggles and values
    toggleBatasOrder.checked = false;
    isSetrika.checked = false;
    minOrderInput.value = '';
    maxOrderInput.value = '';
    updateUI();
});

toggleBatasOrder.addEventListener('change', function() {
    if (this.checked) {
        wrapBatasOrderFields.style.display = 'grid';
    } else {
        wrapBatasOrderFields.style.display = 'none';
        minOrderInput.value = '';
        maxOrderInput.value = '';
    }
});

btnNext.addEventListener('click', () => {
    const nama = selectLayanan.value;
    const harga = document.getElementById('basePrice').value;
    const estimasi = document.getElementById('duration').value;

    if (nama === '' || harga === '' || estimasi === '') {
        Swal.fire({
            icon:'warning',
            title:'Form Belum Lengkap',
            text:'Mohon lengkapi seluruh data layanan.'
        });
        return;
    }

    const minOrderVal = minOrderInput.value;
    const maxOrderVal = maxOrderInput.value;

    if (nama !== 'Cuci Karpet' && toggleBatasOrder.checked && minOrderVal !== '' && maxOrderVal !== '' && parseInt(minOrderVal) > parseInt(maxOrderVal)) {
        Swal.fire({
            icon: 'warning',
            title: 'Kesalahan Batas Order',
            text: 'Maksimal order tidak boleh lebih kecil dari minimal order.'
        });
        return;
    }

    if (nama === 'Cuci Karpet' && minOrderVal === '') {
        Swal.fire({
            icon: 'warning',
            title: 'Form Belum Lengkap',
            text: 'Mohon isi Minimal Ukuran untuk Cuci Karpet.'
        });
        return;
    }
    const minOrder = minOrderVal || '-';
    const maxOrder = maxOrderVal || '-';
    let batasStr = '';

    if (nama === 'Cuci Sepatu') {
        batasStr = 'Tidak Ada Batasan';
    } else if (nama === 'Cuci Karpet') {
        batasStr = `<span style="font-size:12px; font-weight:500; color:#64748b;">Min Ukuran:</span> ${minOrder} Meter`;
    } else {
        batasStr = toggleBatasOrder.checked 
            ? `<span style="font-size:12px; font-weight:500; color:#64748b;">Min:</span> ${minOrder} <br> <span style="font-size:12px; font-weight:500; color:#64748b;">Max:</span> ${maxOrder}`
            : 'Tidak Ada Batasan';
    }

    const setrikaBadge = isSetrika.checked ? `<span style="background: #e0e7ff; color: #4f46e5; padding: 2px 8px; border-radius: 12px; font-size: 11px; margin-left: 5px; vertical-align: top;">+ Setrika</span>` : '';

    const htmlContent = `
        <div style="text-align:left; font-family:inherit;">
            <div style="padding:15px; background:#eff6ff; border-radius:12px; margin-bottom:15px; border:1px solid #bfdbfe;">
                <h4 style="margin:0; font-size:16px; color:#1e3a8a; font-weight:700;">${nama} ${setrikaBadge}</h4>
                <span style="font-size:13px; color:#3b82f6; font-weight:500;">Estimasi: ${estimasi} Hari</span>
            </div>
            <div style="display:grid; grid-template-columns:1fr 1fr; gap:10px;">
                <div style="background:#f8fafc; padding:12px; border-radius:8px; border:1px solid #e2e8f0;">
                    <div style="font-size:11px; color:#64748b; text-transform:uppercase; font-weight:600; margin-bottom:4px;">Harga Dasar</div>
                    <div style="font-size:14px; font-weight:700; color:#0f172a;">Rp ${Number(harga).toLocaleString('id-ID')}</div>
                </div>
                <div style="background:#f8fafc; padding:12px; border-radius:8px; border:1px solid #e2e8f0;">
                    <div style="font-size:11px; color:#64748b; text-transform:uppercase; font-weight:600; margin-bottom:4px;">Batas Order / Ukuran</div>
                    <div style="font-size:14px; font-weight:700; color:#0f172a;">${batasStr}</div>
                </div>
            </div>
        </div>
    `;

    Swal.fire({
        title: '<strong>Ringkasan Perubahan</strong>',
        html: htmlContent,
        showCancelButton: true,
        confirmButtonColor: '#2563eb',
        cancelButtonColor: '#ef4444',
        confirmButtonText: 'Simpan Perubahan',
        cancelButtonText: 'Batal',
        customClass: {
            popup: 'rounded-xl',
            title: 'text-xl font-bold text-gray-800'
        }
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('multiStepForm').submit();
        }
    });
});
</script>
@endpush