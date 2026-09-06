@extends('mitra.layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/mitra/edit_profil.css') }}">
@endsection

@section('content')

@if(session('success'))

<script>
Swal.fire({
    icon:'success',
    title:'Berhasil',
    text:'{{ session("success") }}'
});
</script>

@endif

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

    @if ($errors->any())
        <div style="background: #fee2e2; color: #b91c1c; padding: 14px 20px; border-radius: 10px; margin-bottom: 20px; border: 1px solid #fca5a5;">
            <ul style="margin: 0; padding-left: 20px; font-size: 14px; font-weight: 500;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form id="form-profil" action="{{ route('mitra.update.profil') }}" method="POST" enctype="multipart/form-data" onsubmit="document.querySelectorAll('select').forEach(s => s.disabled = false)">
        @csrf
        <!-- Card 1: Foto Toko -->
        <div class="card">
            <div class="card-title">
                <i class="fas fa-image"></i>
                Foto Toko
            </div>
            <div class="photo-section">
                <div class="photo-preview" id="photo-preview">
                    @if($mitra->logo)
                        <img
                            id="photo-img"
                            src="{{ asset('storage/' . $mitra->logo) }}"
                            alt="Foto Toko">
                    @else
                        <span id="photo-initials">
                            {{ strtoupper(substr($mitra->store_name,0,2)) }}
                        </span>
                        <img
                            id="photo-img"
                            src=""
                            alt="Foto Toko"
                            style="display:none;">
                    @endif
                </div>
                <div class="photo-actions">
                    <p><span>Upload foto toko Anda</span> Format JPG, PNG atau WEBP. Ukuran maksimal 2MB.</p>
                    <div style="display:flex;gap:10px;flex-wrap:wrap;">
                        <input type="file" id="file-input" name="logo" accept="image/*"/>
                        <button type="button" class="btn-upload" onclick="document.getElementById('file-input').click()">
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
                <select class="form-select" id="sel-kota" name="city" disabled>
                    <option value="">Pilih Kota</option>
                </select>
                <i class="fas fa-chevron-down select-icon"></i>
                </div>
            </div>

            <!-- Kecamatan & Kelurahan -->
            <div class="form-group">
                <label class="form-label">Kecamatan <span class="required">*</span></label>
                <div class="select-wrap">
                <select class="form-select" id="sel-kecamatan" name="district" onchange="loadKelurahan(this.value)" disabled>
                    <option value="">Pilih Kecamatan</option>
                </select>
                <i class="fas fa-chevron-down select-icon"></i>
                </div>
            </div>
            <div class="form-group">
                <label class="form-label">Kelurahan / Desa <span class="required">*</span></label>
                <div class="select-wrap">
                <select class="form-select" id="sel-kelurahan" name="village" disabled>
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
                <textarea
                    class="form-textarea"
                    style="min-height:76px;"
                    name="address"
                    id="address"
                    maxlength="250"
                    placeholder="Contoh: Jl. Melati No.12, RT 03/RW 05"
                    oninput="countChar('address','count-address',250)"
                >{{ old('address', $mitra->address) }}</textarea>

                <div class="char-count">
                    <span id="count-address">
                        {{ strlen(old('address', $mitra->address ?? '')) }}
                    </span>/250
                </div>
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
                    <input type="checkbox" id="sen" name="operational_days[]" value="Senin" {{ in_array('Senin', $mitra->operational_days ?? []) ? 'checked' : '' }}/>
                    <label for="sen">Senin</label>
                </div>
                <div class="hari-chip">
                    <input type="checkbox" id="sel" name="operational_days[]" value="Selasa" {{ in_array('Selasa', $mitra->operational_days ?? []) ? 'checked' : '' }}/>
                    <label for="sel">Selasa</label>
                </div>
                <div class="hari-chip">
                    <input type="checkbox" id="rab" name="operational_days[]" value="Rabu" {{ in_array('Rabu', $mitra->operational_days ?? []) ? 'checked' : '' }}/>
                    <label for="rab">Rabu</label>
                </div>
                <div class="hari-chip">
                    <input type="checkbox" id="kam" name="operational_days[]" value="Kamis" {{ in_array('Kamis', $mitra->operational_days ?? []) ? 'checked' : '' }}/>
                    <label for="kam">Kamis</label>
                </div>
                <div class="hari-chip">
                    <input type="checkbox" id="jum" name="operational_days[]" value="Jumat" {{ in_array('Jumat', $mitra->operational_days ?? []) ? 'checked' : '' }}/>
                    <label for="jum">Jumat</label>
                </div>
                <div class="hari-chip">
                    <input type="checkbox" id="sab" name="operational_days[]" value="Sabtu" {{ in_array('Sabtu', $mitra->operational_days ?? []) ? 'checked' : '' }}/>
                    <label for="sab">Sabtu</label>
                </div>
                <div class="hari-chip">
                    <input type="checkbox" id="min" name="operational_days[]" value="Minggu" {{ in_array('Minggu', $mitra->operational_days ?? []) ? 'checked' : '' }}/>
                    <label for="min">Minggu</label>
                </div>
                </div>
            </div>

            <!-- Jam Buka & Tutup -->
            <div class="form-group full">
                <label class="form-label">Jam Buka - Tutup <span class="required">*</span></label>
                <div class="jam-row">
                <input type="time" class="form-input" name="open_time" value="{{ old('open_time', $mitra->open_time) }}"/>
                <span class="jam-sep">-</span>
                <input type="time" class="form-input" name="close_time" value="{{ old('close_time', $mitra->close_time) }}"/>
                </div>
            </div>

            </div>
        </div>

        <!-- Action Buttons -->
        <div class="action-bar">
            <button class="btn-cancel " onclick="history.back()">
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
document.addEventListener('DOMContentLoaded', async function () {
    const BASE =
        'https://www.emsifa.com/api-wilayah-indonesia/api';
    const provinceSelect =
        document.getElementById('sel-provinsi');
    const citySelect =
        document.getElementById('sel-kota');
    const districtSelect =
        document.getElementById('sel-kecamatan');
    const villageSelect =
        document.getElementById('sel-kelurahan');
    // =========================
    // DATA DARI DATABASE
    // =========================
    const selectedProvince =
        @json($mitra->province);
    const selectedCity =
        @json($mitra->city);
    const selectedDistrict =
        @json($mitra->district);
    const selectedVillage =
        @json($mitra->village);
    // =========================
    // LOAD PROVINSI
    // =========================
    async function loadProvinsi()
    {
        const response =
            await fetch(
                `${BASE}/provinces.json`
            );
        const provinces =
            await response.json();
        provinceSelect.innerHTML =
            '<option value="">Pilih Provinsi</option>';
        let selectedProvinceId = null;
        provinces.forEach(item => {
            const isSelected =
                item.name.trim().toUpperCase() ===
                selectedProvince.trim().toUpperCase();
            if(isSelected)
            {
                selectedProvinceId = item.id;
            }
            provinceSelect.innerHTML += `
                <option
                    value="${item.name}"
                    data-id="${item.id}"
                    ${isSelected ? 'selected' : ''}>
                    ${item.name}
                </option>
            `;
        });
        if(selectedProvinceId)
        {
            await loadKota(selectedProvinceId);
        }
    }
    // =========================
    // LOAD KOTA
    // =========================
    async function loadKota(provinceId)
    {
        citySelect.disabled = false;
        const response =
            await fetch(
                `${BASE}/regencies/${provinceId}.json`
            );
        const cities =
            await response.json();
        citySelect.innerHTML =
            '<option value="">Pilih Kota</option>';
        let selectedCityId = null;
        cities.forEach(item => {
            const isSelected =
                item.name.trim().toUpperCase() ===
                selectedCity.trim().toUpperCase();
            if(isSelected)
            {
                selectedCityId = item.id;
            }
            citySelect.innerHTML += `
                <option
                    value="${item.name}"
                    data-id="${item.id}"
                    ${isSelected ? 'selected' : ''}>
                    ${item.name}
                </option>
            `;
        });
        if(selectedCityId)
        {
            await loadKecamatan(selectedCityId);
        }
    }
    // =========================
    // LOAD KECAMATAN
    // =========================
    async function loadKecamatan(cityId)
    {
        districtSelect.disabled = false;
        const response =
            await fetch(
                `${BASE}/districts/${cityId}.json`
            );
        const districts =
            await response.json();
        districtSelect.innerHTML =
            '<option value="">Pilih Kecamatan</option>';
        let selectedDistrictId = null;
        districts.forEach(item => {
            const isSelected =
                item.name.trim().toUpperCase() ===
                selectedDistrict.trim().toUpperCase();
            if(isSelected)
            {
                selectedDistrictId = item.id;
            }
            districtSelect.innerHTML += `
                <option
                    value="${item.name}"
                    data-id="${item.id}"
                    ${isSelected ? 'selected' : ''}>
                    ${item.name}
                </option>
            `;
        });
        if(selectedDistrictId)
        {
            await loadKelurahan(selectedDistrictId);
        }
    }
    // =========================
    // LOAD KELURAHAN
    // =========================
    async function loadKelurahan(districtId)
    {
        villageSelect.disabled = false;
        const response =
            await fetch(
                `${BASE}/villages/${districtId}.json`
            );
        const villages =
            await response.json();
        villageSelect.innerHTML =
            '<option value="">Pilih Kelurahan</option>';
        villages.forEach(item => {
            const isSelected =
                item.name.trim().toUpperCase() ===
                selectedVillage.trim().toUpperCase();
            villageSelect.innerHTML += `
                <option
                    value="${item.name}"
                    ${isSelected ? 'selected' : ''}>
                    ${item.name}
                </option>
            `;
        });
    }
    // =========================
    // CHANGE PROVINSI
    // =========================
    provinceSelect.addEventListener(
        'change',
        async function(){
            const provinceId =
                this.options[
                    this.selectedIndex
                ].dataset.id;
            districtSelect.innerHTML =
                '<option value="">Pilih Kecamatan</option>';
            villageSelect.innerHTML =
                '<option value="">Pilih Kelurahan</option>';
            await loadKota(provinceId);
        }
    );
    // =========================
    // CHANGE KOTA
    // =========================
    citySelect.addEventListener(
        'change',
        async function(){
            const cityId =
                this.options[
                    this.selectedIndex
                ].dataset.id;
            villageSelect.innerHTML =
                '<option value="">Pilih Kelurahan</option>';
            await loadKecamatan(cityId);
        }
    );
    // =========================
    // CHANGE KECAMATAN
    // =========================
    districtSelect.addEventListener(
        'change',
        async function(){
            const districtId =
                this.options[
                    this.selectedIndex
                ].dataset.id;
            await loadKelurahan(districtId);
        }
    );
    // =========================
    // START
    // =========================
    await loadProvinsi();
});

document
.getElementById('file-input')
.addEventListener('change', function(e){
    const file = e.target.files[0];
    if(!file) return;
    const photoImg =
        document.getElementById('photo-img');
    const photoInitials =
        document.getElementById('photo-initials');
    if(photoInitials)
    {
        photoInitials.style.display = 'none';
    }
    photoImg.src =
        URL.createObjectURL(file);
    photoImg.style.display =
        'block';
});

</script>
@endpush
