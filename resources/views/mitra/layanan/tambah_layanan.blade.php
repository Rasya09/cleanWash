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

                <form id="multiStepForm" action="{{ route('mitra.store-layanan') }}" method="POST">

                    @csrf

                    {{-- STEP 1 --}}
                    <div class="tl-step-content" id="step1">

                        <div class="tl-field">
                            <label class="tl-label">
                                Nama Layanan <span class="tl-required">*</span>
                            </label>
                            <div class="tl-input-wrap">
                                <select name="nama_layanan" class="tl-input" id="namaLayanan" required style="appearance: auto; padding-right: 15px;">
                                    <option value="" disabled selected>Pilih Layanan</option>
                                    <option value="Cuci Kering">Cuci Kering</option>
                                    <option value="Cuci Satuan">Cuci Satuan</option>
                                    <option value="Cuci Sepatu">Cuci Sepatu</option>
                                    <option value="Cuci Karpet">Cuci Karpet</option>
                                    <option value="Setrika Aja">Setrika Aja</option>
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

                        <div class="tl-field">
                            <label class="tl-label">
                                Hari Operasional
                                <span class="tl-required">*</span>
                            </label>

                            <div class="tl-days">

                                <label class="tl-day-chip">
                                    <input type="checkbox" name="hari[]" value="Senin">
                                    <span>Sen</span>
                                </label>

                                <label class="tl-day-chip">
                                    <input type="checkbox" name="hari[]" value="Selasa">
                                    <span>Sel</span>
                                </label>

                                <label class="tl-day-chip">
                                    <input type="checkbox" name="hari[]" value="Rabu">
                                    <span>Rab</span>
                                </label>

                                <label class="tl-day-chip">
                                    <input type="checkbox" name="hari[]" value="Kamis">
                                    <span>Kam</span>
                                </label>

                                <label class="tl-day-chip">
                                    <input type="checkbox" name="hari[]" value="Jumat">
                                    <span>Jum</span>
                                </label>

                                <label class="tl-day-chip">
                                    <input type="checkbox" name="hari[]" value="Sabtu">
                                    <span>Sab</span>
                                </label>

                                <label class="tl-day-chip">
                                    <input type="checkbox" name="hari[]" value="Minggu">
                                    <span>Min</span>
                                </label>

                            </div>
                        </div>

                        <div class="tl-grid-2">

                            <div class="tl-field">
                                <label class="tl-label">
                                    Harga Dasar
                                    <span class="tl-required">*</span>
                                </label>

                                <div class="tl-input-group">
                                    <span class="tl-addon">Rp</span>

                                    <input type="number" name="harga_dasar" class="tl-input" id="basePrice" min="0"
                                        required>

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
                                        required>

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
                                    <input type="checkbox" name="is_setrika" value="1" id="isSetrika">
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
                                    <input type="checkbox" id="toggleBatasOrder">
                                    <span class="toggle-slider"></span>
                                </label>
                            </div>

                        </div>

                        <!-- Fields Batas Order (Hidden by default) -->
                        <div class="tl-grid-2" id="wrapBatasOrderFields" style="display: none; margin-top: 15px;">
                            <div class="tl-field">
                                <label class="tl-label" id="labelMinOrder">Minimal Order</label>
                                <div class="tl-input-group">
                                    <input type="number" name="minimal_order" class="tl-input" id="minimal_order" min="1">
                                    <span class="tl-addon unit-addon">Kg</span>
                                </div>
                            </div>

                            <div class="tl-field" id="wrapMaxOrder">
                                <label class="tl-label">Maksimal Order</label>
                                <div class="tl-input-group">
                                    <input type="number" name="maksimal_order" class="tl-input" id="maksimal_order" min="1">
                                    <span class="tl-addon unit-addon">Kg</span>
                                </div>
                            </div>
                        </div>

                    </div>



                </form>

                <div class="tl-actions">
                    <button type="button" class="tl-btn-next" id="btnNext">
                        Selanjutnya
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

selectLayanan.addEventListener('change', function() {
    const val = this.value;
    
    // Reset state
    togglesWrapper.style.display = 'block';
    wrapSetrika.style.display = 'none';
    wrapBatasOrderToggle.style.display = 'none';
    wrapBatasOrderFields.style.display = 'none';
    wrapMaxOrder.style.display = 'block';
    labelMinOrder.textContent = 'Minimal Order';
    toggleBatasOrder.checked = false;
    isSetrika.checked = false;
    minOrderInput.value = '';
    maxOrderInput.value = '';
    
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
        togglesWrapper.style.display = 'none'; // tidak ada setrika, tidak ada batas order
        unit = 'Pasang';
    } else if (val === 'Cuci Karpet') {
        // Karpet: Wajib minimal order (ukuran meter), tidak ada maksimal
        togglesWrapper.style.display = 'none'; 
        wrapBatasOrderFields.style.display = 'grid';
        wrapMaxOrder.style.display = 'none';
        labelMinOrder.textContent = 'Minimal Ukuran';
        unit = 'Meter';
    } else if (val === 'Setrika Aja') {
        wrapBatasOrderToggle.style.display = 'flex';
        unit = 'Kg';
    }

    // Update units
    unitAddons.forEach(el => {
        if (el.textContent.includes('/')) {
            el.textContent = '/ ' + unit;
        } else {
            el.textContent = unit;
        }
    });
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
    const hari = document.querySelectorAll('input[name="hari[]"]:checked');

    if (nama === '' || harga === '' || estimasi === '' || hari.length === 0) {
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

    // Untuk karpet wajib isi minimal ukuran
    if (nama === 'Cuci Karpet' && minOrderVal === '') {
        Swal.fire({
            icon: 'warning',
            title: 'Form Belum Lengkap',
            text: 'Mohon isi Minimal Ukuran untuk Cuci Karpet.'
        });
        return;
    }

    const hariStr = [...hari].map(x => x.value).join(', ');
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
                <div style="grid-column: span 2; background:#f8fafc; padding:12px; border-radius:8px; border:1px solid #e2e8f0;">
                    <div style="font-size:11px; color:#64748b; text-transform:uppercase; font-weight:600; margin-bottom:4px;">Hari Operasional</div>
                    <div style="font-size:14px; font-weight:600; color:#0f172a;">${hariStr}</div>
                </div>
            </div>
        </div>
    `;

    Swal.fire({
        title: '<strong>Ringkasan Layanan</strong>',
        html: htmlContent,
        showCancelButton: true,
        confirmButtonColor: '#2563eb',
        cancelButtonColor: '#ef4444',
        confirmButtonText: 'Simpan Layanan',
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