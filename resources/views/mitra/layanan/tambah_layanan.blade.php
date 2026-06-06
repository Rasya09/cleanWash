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
                                Nama Layanan
                                <span class="tl-required">*</span>
                            </label>

                            <div class="tl-input-wrap">
                                <input type="text" name="nama_layanan" class="tl-input"
                                    placeholder="Contoh: Cuci Kiloan Reguler" maxlength="50" id="namaLayanan" required>

                                <span class="tl-counter" id="namaCounter">
                                    0/50
                                </span>
                            </div>
                        </div>

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

                                    <span class="tl-addon">/kg</span>
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

                        <div class="tl-grid-2">

                            <div class="tl-field">
                                <label class="tl-label">
                                    Minimal Order
                                </label>

                                <div class="tl-input-group">

                                    <input type="number" name="minimal_order" class="tl-input" min="1">

                                    <span class="tl-addon">
                                        Kg
                                    </span>

                                </div>
                            </div>

                            <div class="tl-field">
                                <label class="tl-label">
                                    Maksimal Order
                                </label>

                                <div class="tl-input-group">

                                    <input type="number" name="maksimal_order" class="tl-input" min="1">

                                    <span class="tl-addon">
                                        Kg
                                    </span>

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

const btnNext =
    document.getElementById('btnNext');



btnNext.addEventListener('click', () => {

    const nama =
        document.getElementById('namaLayanan').value;

    const harga =
        document.getElementById('basePrice').value;

    const estimasi =
        document.getElementById('duration').value;

    const hari =
        document.querySelectorAll(
            'input[name="hari[]"]:checked'
        );

    if(
        nama === '' ||
        harga === '' ||
        estimasi === '' ||
        hari.length === 0
    ){
        Swal.fire({
            icon:'warning',
            title:'Form Belum Lengkap',
            text:'Mohon lengkapi seluruh data layanan.'
        });

        return;
    }

    const minOrderVal = document.querySelector('[name="minimal_order"]').value;
    const maxOrderVal = document.querySelector('[name="maksimal_order"]').value;

    if (minOrderVal !== '' && maxOrderVal !== '' && parseInt(minOrderVal) > parseInt(maxOrderVal)) {
        Swal.fire({
            icon: 'warning',
            title: 'Kesalahan Batas Order',
            text: 'Maksimal order tidak boleh lebih kecil dari minimal order.'
        });
        return;
    }

    const hariStr = [...hari].map(x => x.value).join(', ');
    const minOrder = minOrderVal || '-';
    const maxOrder = maxOrderVal || '-';

    const htmlContent = `
        <div style="text-align:left; font-family:inherit;">
            <div style="padding:15px; background:#eff6ff; border-radius:12px; margin-bottom:15px; border:1px solid #bfdbfe;">
                <h4 style="margin:0; font-size:16px; color:#1e3a8a; font-weight:700;">${nama}</h4>
                <span style="font-size:13px; color:#3b82f6; font-weight:500;">Estimasi: ${estimasi} Hari</span>
            </div>
            <div style="display:grid; grid-template-columns:1fr 1fr; gap:10px;">
                <div style="background:#f8fafc; padding:12px; border-radius:8px; border:1px solid #e2e8f0;">
                    <div style="font-size:11px; color:#64748b; text-transform:uppercase; font-weight:600; margin-bottom:4px;">Harga Dasar</div>
                    <div style="font-size:14px; font-weight:700; color:#0f172a;">Rp ${Number(harga).toLocaleString('id-ID')} <span style="font-size:11px; color:#64748b; font-weight:400;">/ kg</span></div>
                </div>
                <div style="background:#f8fafc; padding:12px; border-radius:8px; border:1px solid #e2e8f0;">
                    <div style="font-size:11px; color:#64748b; text-transform:uppercase; font-weight:600; margin-bottom:4px;">Batas Order</div>
                    <div style="font-size:14px; font-weight:700; color:#0f172a;"><span style="font-size:12px; font-weight:500; color:#64748b;">Min:</span> ${minOrder} kg <br> <span style="font-size:12px; font-weight:500; color:#64748b;">Max:</span> ${maxOrder} kg</div>
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
        confirmButtonText: 'Publikasikan Layanan',
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

document
.getElementById('namaLayanan')
.addEventListener('input', function(){

    document.getElementById('namaCounter')
        .textContent =
        this.value.length + '/50';

});

</script>
@endpush