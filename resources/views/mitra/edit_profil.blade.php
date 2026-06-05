@extends('mitra.layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/mitra/edit_profil.css') }}">
@endsection

@section('content')
<div class="main-edit">
    <!-- Page Header -->
    <div class="page-header">
        <button class="btn-back" onclick="history.back()">
            <i class="fas fa-arrow-left"></i>
        </button>
        <div class="header-text">
            <h1>Edit Profil Toko</h1>
            <p>Perbarui informasi toko laundry Anda</p>
        </div>
    </div>

    <form action="{{ route('mitra.update.profil') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- Card 1: Foto Toko -->
        <div class="card">
            <div class="card-title">
                <i class="fas fa-image"></i>
                Foto Toko
            </div>
            <div class="photo-section">
                <div class="photo-preview" id="photo-preview">
                    <span id="photo-initials">LBJ</span>
                    <img id="photo-img" src="" alt="Foto Toko"/>
                </div>  
                <div class="photo-actions">
                    <p><span>Upload foto toko Anda</span> Format JPG, PNG atau WEBP. Ukuran maksimal 2MB.</p>
                    <div style="display:flex;gap:10px;flex-wrap:wrap;">
                        <input type="file" id="file-input" accept="image/*" onchange="handlePhoto(this)"/>
                        <button class="btn-upload" onclick="document.getElementById('file-input').click()">
                            <i class="fas fa-upload"></i> Ganti Foto
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 2: Informasi Toko -->
        <div class="card">
            <div class="card-title">
                <i class="fas fa-store"></i>
                Informasi Toko
            </div>
            <div class="form-grid">
                <!-- Nama Toko -->
                <div class="form-group full">
                    <label class="form-label">Nama Toko <span class="required">*</span></label>
                    <input type="text" class="form-input" placeholder="Contoh: Laundry Bersih Jaya"
                        maxlength="60" id="nama-toko"
                        name="store_name"
                        value="{{ old('store_name', $mitra->store_name) }}"
                        oninput="countChar('nama-toko','count-nama',60)"/>
                    <div class="char-count"><span id="count-nama">16</span>/60</div>
                </div>
                <!-- Deskripsi -->
                <div class="form-group full">
                    <label class="form-label">Deskripsi Toko <span class="required">*</span> <span class="hint">— Tampil di halaman profil publik</span></label>
                    <textarea class="form-textarea" placeholder="Ceritakan keunggulan toko Anda..."
                        maxlength="200" id="deskripsi"
                        name="description"
                        oninput="countChar('deskripsi','count-desc',200)">{{ old('description', $mitra->description) }}</textarea>
                    <div class="char-count"><span id="count-desc">72</span>/200</div>
                </div>
                <!-- Provinsi & Kota -->
                <div class="form-group">
                    <label class="form-label">Provinsi <span class="required">*</span></label>
                    <div class="select-wrap">
                        <select class="form-select" id="sel-provinsi" name="province">
                            <option value="{{ old('province', $mitra->province) }}">Pilih Provinsi</option>
                        </select>
                        <i class="fas fa-chevron-down select-icon"></i>
                    </div>
                </div>
            <div class="form-group">
                <label class="form-label">Kota / Kabupaten <span class="required">*</span></label>
                <div class="select-wrap">
                <select class="form-select" id="sel-kota" onchange="loadKecamatan(this.value)" disabled>
                    <option value="">Pilih Kota</option>
                </select>
                <i class="fas fa-chevron-down select-icon"></i>
                </div>
            </div>

            <!-- Kecamatan & Kelurahan -->
            <div class="form-group">
                <label class="form-label">Kecamatan <span class="required">*</span></label>
                <div class="select-wrap">
                <select class="form-select" id="sel-kecamatan" onchange="loadKelurahan(this.value)" disabled>
                    <option value="">Pilih Kecamatan</option>
                </select>
                <i class="fas fa-chevron-down select-icon"></i>
                </div>
            </div>
            <div class="form-group">
                <label class="form-label">Kelurahan / Desa <span class="required">*</span></label>
                <div class="select-wrap">
                <select class="form-select" id="sel-kelurahan" disabled>
                    <option value="">Pilih Kelurahan</option>
                </select>
                <i class="fas fa-chevron-down select-icon"></i>
                </div>
            </div>

            <!-- Kode Pos -->
            <div class="form-group">
                <label class="form-label">Kode Pos <span class="required">*</span></label>
                <input type="text" class="form-input" id="kode-pos"
                        name="postal_code"
                        value="{{ old('postal_code', $mitra->postal_code) }}"
                        placeholder="Contoh: 12120" maxlength="5"
                        oninput="this.value=this.value.replace(/\D/g,'')"/>
            </div>

            <!-- Alamat Lengkap -->
            <div class="form-group full">
                <label class="form-label">
                Alamat Lengkap <span class="required">*</span>
                </label>
                <textarea class="form-textarea" style="min-height:76px;" placeholder="Contoh: Jl. Melati No.12, RT 03/RW 05">{{ old('address', $mitra->address) }}</textarea>
            </div>

            <!-- No Telepon -->
            <div class="form-group">
                <label class="form-label">
                No Telepon / WhatsApp <span class="required">*</span>
                </label>
                <div class="input-group">
                <input type="tel" class="form-input" placeholder="812-3456-7890" name="phone" value="{{ old('phone', $mitra->phone) }}"/>
                </div>
            </div>

            </div>
        </div>

        <!-- Card 3: Jam Operasional -->
        <div class="card">
            <div class="card-title">
            <i class="far fa-clock"></i>
            Jam Operasional
            </div>
            <div class="form-grid">

            <!-- Hari Operasional -->
            <div class="form-group full">
                <label class="form-label">Hari Operasional <span class="required">*</span></label>
                <div class="hari-grid">
                <div class="hari-chip">
                    <input type="checkbox" id="sen"/>
                    <label for="sen">Senin</label>
                </div>
                <div class="hari-chip">
                    <input type="checkbox" id="sel"/>
                    <label for="sel">Selasa</label>
                </div>
                <div class="hari-chip">
                    <input type="checkbox" id="rab"/>
                    <label for="rab">Rabu</label>
                </div>
                <div class="hari-chip">
                    <input type="checkbox" id="kam"/>
                    <label for="kam">Kamis</label>
                </div>
                <div class="hari-chip">
                    <input type="checkbox" id="jum"/>
                    <label for="jum">Jumat</label>
                </div>
                <div class="hari-chip">
                    <input type="checkbox" id="sab"/>
                    <label for="sab">Sabtu</label>
                </div>
                <div class="hari-chip">
                    <input type="checkbox" id="min"/>
                    <label for="min">Minggu</label>
                </div>
                </div>
            </div>

            <!-- Jam Buka & Tutup -->
            <div class="form-group full">
                <label class="form-label">Jam Buka – Tutup <span class="required">*</span></label>
                <div class="jam-row">
                <input type="time" class="form-input"/>
                <span class="jam-sep">–</span>
                <input type="time" class="form-input"/>
                </div>
            </div>

            </div>
        </div>

        <!-- Action Buttons -->
        <div class="action-bar">
            <button class="btn-cancel">
                <i class="fas fa-times" style="margin-right:6px;"></i>Batalkan
            </button>
            <button class="btn-save" type="submit">
                <i class="fas fa-save"></i> Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
// ─── Character counter ───
function countChar(inputId, countId, max) {
    const val = document.getElementById(inputId).value.length;
    document.getElementById(countId).textContent = val;
}

// ─── Photo preview ───
function handlePhoto(input) {
    const file = input.files[0];
    if (!file) return;
    const reader = new FileReader();
    reader.onload = (e) => {
    const img = document.getElementById('photo-img');
    const initials = document.getElementById('photo-initials');
    img.src = e.target.result;
    img.style.display = 'block';
    initials.style.display = 'none';
    };
    reader.readAsDataURL(file);
}
function removePhoto() {
    const img = document.getElementById('photo-img');
    const initials = document.getElementById('photo-initials');
    img.src = ''; img.style.display = 'none';
    initials.style.display = 'block';
    document.getElementById('file-input').value = '';
}

// ─── Wilayah API (emsifa) ───
const BASE = 'https://www.emsifa.com/api-wilayah-indonesia/api';

function setLoading(el, loading) {
    el.disabled = loading;
    if (loading) el.innerHTML = '<option value="">Memuat...</option>';
}

function resetSelect(el, placeholder) {
    el.innerHTML = `<option value="">${placeholder}</option>`;
    el.disabled = true;
}

async function loadProvinsi() {
    const sel = document.getElementById('sel-provinsi');
    setLoading(sel, true);
    try {
    const res = await fetch(`${BASE}/provinces.json`);
    const data = await res.json();
    sel.innerHTML = '<option value="">Pilih Provinsi</option>';
    data.forEach(p => {
        sel.innerHTML += `<option value="${p.id}">${p.name}</option>`;
    });
    sel.disabled = false;
    } catch(e) { sel.innerHTML = '<option value="">Gagal memuat</option>'; }
}

async function loadKota(provId) {
    resetSelect(document.getElementById('sel-kota'), 'Pilih Kota');
    resetSelect(document.getElementById('sel-kecamatan'), 'Pilih Kecamatan');
    resetSelect(document.getElementById('sel-kelurahan'), 'Pilih Kelurahan');
    if (!provId) return;
    const sel = document.getElementById('sel-kota');
    setLoading(sel, true);
    try {
    const res = await fetch(`${BASE}/regencies/${provId}.json`);
    const data = await res.json();
    sel.innerHTML = '<option value="">Pilih Kota</option>';
    data.forEach(k => {
        sel.innerHTML += `<option value="${k.id}">${k.name}</option>`;
    });
    sel.disabled = false;
    } catch(e) { sel.innerHTML = '<option value="">Gagal memuat</option>'; }
}

async function loadKecamatan(kotaId) {
    resetSelect(document.getElementById('sel-kecamatan'), 'Pilih Kecamatan');
    resetSelect(document.getElementById('sel-kelurahan'), 'Pilih Kelurahan');
    if (!kotaId) return;
    const sel = document.getElementById('sel-kecamatan');
    setLoading(sel, true);
    try {
    const res = await fetch(`${BASE}/districts/${kotaId}.json`);
    const data = await res.json();
    sel.innerHTML = '<option value="">Pilih Kecamatan</option>';
    data.forEach(k => {
        sel.innerHTML += `<option value="${k.id}">${k.name}</option>`;
    });
    sel.disabled = false;
    } catch(e) { sel.innerHTML = '<option value="">Gagal memuat</option>'; }
}

async function loadKelurahan(kecId) {
    resetSelect(document.getElementById('sel-kelurahan'), 'Pilih Kelurahan');
    if (!kecId) return;
    const sel = document.getElementById('sel-kelurahan');
    setLoading(sel, true);
    try {
    const res = await fetch(`${BASE}/villages/${kecId}.json`);
    const data = await res.json();
    sel.innerHTML = '<option value="">Pilih Kelurahan</option>';
    data.forEach(k => {
        sel.innerHTML += `<option value="${k.id}">${k.name}</option>`;
    });
    sel.disabled = false;
    } catch(e) { sel.innerHTML = '<option value="">Gagal memuat</option>'; }
}

// Init
countChar('nama-toko', 'count-nama', 60);
countChar('deskripsi', 'count-desc', 200);
loadProvinsi();
</script>
@endpush
