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

                    {{-- STEP 2 --}}
                    <div class="tl-step-content" id="step2" style="display:none;">

                        <div class="tl-review-summary">

                            <h4>Ringkasan Layanan</h4>

                            <ul>

                                <li>
                                    Nama :
                                    <strong id="summaryName"></strong>
                                </li>

                                <li>
                                    Hari :
                                    <strong id="summaryDays"></strong>
                                </li>

                                <li>
                                    Harga :
                                    <strong id="summaryPrice"></strong>
                                </li>

                                <li>
                                    Estimasi :
                                    <strong id="summaryDuration"></strong>
                                </li>

                                <li>
                                    Minimal Order :
                                    <strong id="summaryMin"></strong>
                                </li>

                                <li>
                                    Maksimal Order :
                                    <strong id="summaryMax"></strong>
                                </li>

                            </ul>

                        </div>

                    </div>

                </form>

                <div class="tl-actions">

                    <button type="button" class="tl-btn-next" id="btnNext">

                        Selanjutnya

                    </button>

                    <button type="submit" form="multiStepForm" class="tl-btn-next" id="btnSubmit"
                        style="display:none;">

                        Publikasikan Layanan

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

const btnSubmit =
    document.getElementById('btnSubmit');

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

    document.getElementById('summaryName')
        .textContent = nama;

    document.getElementById('summaryPrice')
        .textContent =
            'Rp ' +
            Number(harga).toLocaleString('id-ID');

    document.getElementById('summaryDuration')
        .textContent =
            estimasi + ' Hari';

    document.getElementById('summaryDays')
        .textContent =
            [...hari]
            .map(x => x.value)
            .join(', ');

    document.getElementById('summaryMin')
        .textContent =
            document.querySelector(
                '[name="minimal_order"]'
            ).value || '-';

    document.getElementById('summaryMax')
        .textContent =
            document.querySelector(
                '[name="maksimal_order"]'
            ).value || '-';

    document.getElementById('step1')
        .style.display = 'none';

    document.getElementById('step2')
        .style.display = 'block';

    btnNext.style.display = 'none';
    btnSubmit.style.display = 'inline-flex';
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