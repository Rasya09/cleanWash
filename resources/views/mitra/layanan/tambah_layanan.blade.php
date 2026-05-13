@extends('mitra.layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/mitra/tambah_layanan.css') }}">
@endsection

@section('content')
{{-- Content: Tambah Layanan --}}

<div class="tl-page">

    {{-- Breadcrumb + Header --}}
    <div class="tl-page-header">
        <div>
            <div class="tl-breadcrumb">
                <a href="#" class="tl-breadcrumb-link">Layanan Saya</a>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#9ca3af" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"/></svg>
                <span class="tl-breadcrumb-current">Tambah Layanan</span>
            </div>
            <h1 class="tl-title">Tambah Layanan</h1>
            <p class="tl-subtitle">Lengkapi informasi layanan Anda dengan benar</p>
        </div>
        <a href="#" class="tl-btn-back">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"/></svg>
            Kembali ke Daftar Layanan
        </a>
    </div>

    {{-- Main Content --}}
    <div class="tl-layout">

        {{-- Stepper --}}
        <div class="tl-stepper">
            <div class="tl-step tl-step--active">
                <div class="tl-step-circle tl-step-circle--active">1</div>
                <div class="tl-step-label">
                    <p class="tl-step-name">Informasi Dasar</p>
                    <p class="tl-step-desc">Nama dan kategori layanan</p>
                </div>
            </div>
            <div class="tl-step-line"></div>
            <div class="tl-step">
                <div class="tl-step-circle">2</div>
                <div class="tl-step-label">
                    <p class="tl-step-name">Detail Layanan</p>
                    <p class="tl-step-desc">Deskripsi dan estimasi</p>
                </div>
            </div>
            <div class="tl-step-line"></div>
            <div class="tl-step">
                <div class="tl-step-circle">3</div>
                <div class="tl-step-label">
                    <p class="tl-step-name">Harga & Durasi</p>
                    <p class="tl-step-desc">Harga dan waktu pengerjaan</p>
                </div>
            </div>
            <div class="tl-step-line"></div>
            <div class="tl-step">
                <div class="tl-step-circle">4</div>
                <div class="tl-step-label">
                    <p class="tl-step-name">Opsi Tambahan</p>
                    <p class="tl-step-desc">Variasi dan catatan (opsional)</p>
                </div>
            </div>
            <div class="tl-step-line"></div>
            <div class="tl-step">
                <div class="tl-step-circle">5</div>
                <div class="tl-step-label">
                    <p class="tl-step-name">Tinjau & Publikasikan</p>
                    <p class="tl-step-desc">Periksa kembali sebelum aktif</p>
                </div>
            </div>
        </div>

        {{-- Form Area --}}
        <div class="tl-form-area">
            <div class="tl-form-header">
                <h2 class="tl-form-title">Informasi Dasar</h2>
                <p class="tl-form-desc">Lengkapi informasi dasar layanan Anda.</p>
            </div>

            <form action="#" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Nama Layanan --}}
                <div class="tl-field">
                    <label class="tl-label">Nama Layanan <span class="tl-required">*</span></label>
                    <div class="tl-input-wrap">
                        <input
                            type="text"
                            name="nama_layanan"
                            class="tl-input"
                            placeholder="Contoh: Cuci Kiloan"
                            maxlength="50"
                            id="namaLayanan"
                            oninput="updateCounter('namaLayanan','namaCounter',50)"
                        >
                        <span class="tl-counter" id="namaCounter">0/50</span>
                    </div>
                </div>

                {{-- Kategori Layanan --}}
                <div class="tl-field">
                    <label class="tl-label">Kategori Layanan <span class="tl-required">*</span></label>
                    <div class="tl-select-wrap">
                        <select name="kategori_layanan" class="tl-select">
                            <option value="" disabled selected>Pilih kategori layanan</option>
                            <option value="kiloan">Cuci Kiloan</option>
                            <option value="satuan">Cuci Satuan</option>
                            <option value="setrika">Setrika</option>
                            <option value="express">Express</option>
                            <option value="dry_clean">Dry Clean</option>
                        </select>
                        <svg class="tl-select-arrow" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#9ca3af" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg>
                    </div>
                </div>

                {{-- Subkategori --}}
                <div class="tl-field">
                    <label class="tl-label">Subkategori <span class="tl-optional">(Opsional)</span></label>
                    <div class="tl-select-wrap">
                        <select name="subkategori" class="tl-select">
                            <option value="" disabled selected>Pilih subkategori</option>
                            <option value="reguler">Reguler</option>
                            <option value="express">Express</option>
                            <option value="super_express">Super Express</option>
                        </select>
                        <svg class="tl-select-arrow" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#9ca3af" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg>
                    </div>
                </div>

                {{-- Tag / Label --}}
                <div class="tl-field">
                    <label class="tl-label">Tag / Label <span class="tl-optional">(Opsional)</span></label>
                    <div class="tl-input-wrap">
                        <input
                            type="text"
                            name="tag"
                            class="tl-input"
                            placeholder="Contoh: Cepat, Rapi, Wangi"
                            maxlength="50"
                            id="tagInput"
                            oninput="updateTagCounter()"
                        >
                        <span class="tl-counter" id="tagCounter">0/5</span>
                    </div>
                    <p class="tl-field-hint">Maksimal 5 tag. Dipisahkan dengan koma.</p>
                </div>

                {{-- Tips Box --}}
                <div class="tl-tips-box">
                    <div class="tl-tips-icon">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#3b82f6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/>
                        </svg>
                    </div>
                    <div>
                        <p class="tl-tips-title">Tips</p>
                        <p class="tl-tips-text">Gunakan nama layanan yang jelas dan mudah dipahami pelanggan agar lebih mudah ditemukan.</p>
                    </div>
                </div>

            </form>
        </div>

        {{-- Right Sidebar --}}
        <div class="tl-sidebar">

            {{-- Upload Foto --}}
            <div class="tl-sidebar-card">
                <p class="tl-sidebar-title">Foto Layanan <span class="tl-required">*</span></p>
                <p class="tl-sidebar-desc">Upload foto terbaik layanan Anda.</p>
                <div class="tl-upload-zone" id="uploadZone">
                    <input type="file" id="fotoUpload" accept="image/jpg,image/png" class="tl-upload-input" onchange="previewImage(event)">
                    <div class="tl-upload-content" id="uploadContent">
                        <div class="tl-upload-icon">
                            <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="#3b82f6" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/>
                                <line x1="12" y1="5" x2="12" y2="11"/><line x1="9" y1="8" x2="15" y2="8"/>
                            </svg>
                        </div>
                        <p class="tl-upload-cta">Klik untuk upload foto</p>
                        <p class="tl-upload-or">atau drag &amp; drop file di sini</p>
                        <p class="tl-upload-hint">Format: JPG, PNG (maks. 2MB)</p>
                        <p class="tl-upload-hint">Rasio yang disarankan 4:3 atau 1:1</p>
                    </div>
                    <img id="uploadPreview" class="tl-upload-preview" src="" alt="preview" style="display:none;">
                </div>
            </div>

            {{-- Tips Foto --}}
            <div class="tl-sidebar-card tl-sidebar-card--tips">
                <p class="tl-sidebar-title">Tips Foto Layanan</p>
                <ul class="tl-tips-list">
                    <li>
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#22c55e" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                        Gunakan foto yang jelas dan terang
                    </li>
                    <li>
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#22c55e" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                        Tampilkan hasil layanan dengan rapi
                    </li>
                    <li>
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#22c55e" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                        Hindari foto blur atau terlalu gelap
                    </li>
                    <li>
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#22c55e" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                        Foto yang baik meningkatkan kepercayaan pelanggan
                    </li>
                </ul>
            </div>

        </div>{{-- end sidebar --}}

    </div>{{-- end layout --}}

    {{-- Bottom Actions --}}
    <div class="tl-actions">
        <button type="button" class="tl-btn-batal">Batal</button>
        <button type="button" class="tl-btn-next">
            Selanjutnya
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"/></svg>
        </button>
    </div>

</div>{{-- end tl-page --}}

<script>
function updateCounter(inputId, counterId, max) {
    const val = document.getElementById(inputId).value.length;
    document.getElementById(counterId).textContent = val + '/' + max;
}

function updateTagCounter() {
    const val = document.getElementById('tagInput').value;
    const tags = val.split(',').filter(t => t.trim() !== '').length;
    document.getElementById('tagCounter').textContent = Math.min(tags, 5) + '/5';
}

function previewImage(event) {
    const file = event.target.files[0];
    if (!file) return;
    const reader = new FileReader();
    reader.onload = function(e) {
        const preview = document.getElementById('uploadPreview');
        const content = document.getElementById('uploadContent');
        preview.src = e.target.result;
        preview.style.display = 'block';
        content.style.display = 'none';
    };
    reader.readAsDataURL(file);
}

// Drag & Drop
const zone = document.getElementById('uploadZone');
if (zone) {
    zone.addEventListener('dragover', e => { e.preventDefault(); zone.classList.add('tl-upload-zone--drag'); });
    zone.addEventListener('dragleave', () => zone.classList.remove('tl-upload-zone--drag'));
    zone.addEventListener('drop', e => {
        e.preventDefault();
        zone.classList.remove('tl-upload-zone--drag');
        const file = e.dataTransfer.files[0];
        if (file) {
            const input = document.getElementById('fotoUpload');
            const dt = new DataTransfer();
            dt.items.add(file);
            input.files = dt.files;
            previewImage({ target: input });
        }
    });
}
</script>
@endsection

