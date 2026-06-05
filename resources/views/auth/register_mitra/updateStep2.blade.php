<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Mitra - Step 2</title>
    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }
        body{
            font-family:sans-serif;
            background:#f5f7ff;
            color:#1e2b4f;
        }
        .container{
            width:100%;
            max-width:1000px;
            margin:auto;
            padding:50px 20px;
        }
        .header{
            text-align:center;
            margin-bottom:40px;
        }
        .header h1{
            font-size:48px;
            margin-bottom:10px;
        }
        .header p{
            color:#7a86a8;
            font-size:18px;
        }
        .steps{
            display:flex;
            justify-content:center;
            align-items:center;
            gap:40px;
            margin-bottom:40px;
        }
        .step{
            display:flex;
            flex-direction:column;
            align-items:center;
            gap:10px;
        }
        .step-circle{
            width:40px;
            height:40px;
            border-radius:50%;
            background:#dfe6ff;
            display:flex;
            justify-content:center;
            align-items:center;
            font-weight:bold;
        }
        .step.active .step-circle{
            background:#1d3565;
            color:white;
        }
        .card{
            background:white;
            border-radius:24px;
            overflow:hidden;
            box-shadow:0 10px 30px rgba(0,0,0,.08);
        }
        .card-header{
            background:#1d3565;
            color:white;
            padding:40px;
        }
        .card-header h2{
            font-size:36px;
            margin-bottom:10px;
        }
        .card-body{
            padding:40px;
        }
        .grid{
            display:grid;
            grid-template-columns:1fr 1fr;
            gap:25px;
        }
        .form-group{
            display:flex;
            flex-direction:column;
            gap:10px;
        }
        .form-group.full{
            grid-column:1 / -1;
        }
        label{
            font-weight:600;
        }
        input,
        textarea{
            width:100%;
            padding:16px;
            border:1px solid #dbe2ff;
            border-radius:14px;
            background:#f5f7ff;
            font-size:15px;
        }
        textarea{
            height:130px;
            resize:none;
        }
        .footer{
            padding:30px 40px;
            border-top:1px solid #eee;
            display:flex;
            justify-content:space-between;
            align-items:center;
        }
        .btn{
            background:#1d3565;
            color:white;
            border:none;
            padding:14px 30px;
            border-radius:14px;
            cursor:pointer;
            font-weight:600;
        }
        select{
            width:100%;
            padding:16px;
            border:1px solid #dbe2ff;
            border-radius:14px;
            background:#f5f7ff;
            font-size:15px;
        }
        .btn-location{
            height:54px;
            border:none;
            border-radius:14px;
            background:#1d3565;
            color:white;
            font-weight:600;
            cursor:pointer;
        }
    </style>

</head>
<body>
<div class="container">
    <div class="header">
        <h1>Daftarkan Toko Laundry Anda</h1>
        <p>Lengkapi alamat toko laundry Anda.</p>
    </div>
    <div class="steps">
        <div class="step">
            <div class="step-circle">1</div>
            <span>Identitas</span>
        </div>
        <div class="step active">
            <div class="step-circle">2</div>
            <span>Lokasi</span>
        </div>
        <div class="step">
            <div class="step-circle">3</div>
            <span>Foto</span>
        </div>
        <div class="step">
            <div class="step-circle">4</div>
            <span>Dokumen</span>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h2>Lokasi Toko</h2>
            <p>Masukkan alamat lengkap toko laundry Anda.</p>
        </div>
        <form action="{{ route('user.register.reapply.step2.update', $mitra->id) }}"
              method="POST">
            @csrf
            <div class="card-body">
                <div class="grid">
                    <!-- PROVINSI -->
                    <div class="form-group">
                        <label>Provinsi *</label>
                        <select id="province"
                                name="province"
                                required>
                            <option value="{{ old('province', $mitra->province) }}">Pilih Provinsi</option>
                        </select>
                    </div>
                    <!-- KOTA -->
                    <div class="form-group">
                        <label>Kota / Kabupaten *</label>
                        <select id="city"
                                name="city"
                                disabled
                                required>
                            <option value="{{ old('city', $mitra->city) }}">Pilih Kota</option>
                        </select>
                    </div>
                    <!-- KECAMATAN -->
                    <div class="form-group">
                        <label>Kecamatan *</label>
                        <select id="district"
                                name="district"
                                disabled
                                required>
                            <option value="{{ old('district', $mitra->district) }}">Pilih Kecamatan</option>
                        </select>
                    </div>
                    <!-- KELURAHAN -->
                    <div class="form-group">
                        <label>Kelurahan / Desa *</label>
                        <select id="village"
                                name="village"
                                disabled
                                required>
                            <option value="{{ old('village', $mitra->village) }}">Pilih Kelurahan</option>
                        </select>
                    </div>
                    <!-- KODE POS -->
                    <div class="form-group">
                        <label>Kode Pos *</label>
                        <input type="text"
                            name="postal_code"
                            value="{{ old('postal_code', $mitra->postal_code) }}">
                    </div>
                    <!-- ALAMAT -->
                    <div class="form-group full">
                        <label>Alamat Lengkap *</label>
                        <textarea name="address" required>{{ old('address', $mitra->address) }}</textarea>
                    </div>
                </div>
            </div>
            <div class="footer">
                <span>Langkah 2 dari 4</span>
                <button type="submit"
                        class="btn">
                    Lanjut
                </button>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', async () => {

    const province = document.getElementById('province');
    const city = document.getElementById('city');
    const district = document.getElementById('district');
    const village = document.getElementById('village');

    const selectedProvince = @json($mitra->province);
    const selectedCity = @json($mitra->city);
    const selectedDistrict = @json($mitra->district);
    const selectedVillage = @json($mitra->village);

    // ===============================
    // HELPER
    // ===============================

    function normalize(text)
    {
        return text
            ?.toLowerCase()
            .replace(/kota/g, '')
            .replace(/kabupaten/g, '')
            .replace(/city/g, '')
            .replace(/\s+/g, ' ')
            .trim();
    }

    function selectOption(select, target)
    {
        const targetNormalized = normalize(target);

        for(let option of select.options)
        {
            if(
                normalize(option.value) === targetNormalized
                ||
                normalize(option.text) === targetNormalized
            )
            {
                select.value = option.value;
                return option.dataset.id;
            }
        }

        return null;
    }

    // ===============================
    // LOAD PROVINCES
    // ===============================

    async function loadProvinces()
    {
        const response = await fetch(
            'https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json'
        );

        const provinces = await response.json();

        province.innerHTML =
            '<option value="">Pilih Provinsi</option>';

        provinces.forEach(item => {

            province.innerHTML += `
                <option value="${item.name}"
                        data-id="${item.id}">
                    ${item.name}
                </option>
            `;

        });

        return provinces;
    }

    // ===============================
    // LOAD CITIES
    // ===============================

    async function loadCities(provinceId)
    {
        city.disabled = false;

        const response = await fetch(
            `https://www.emsifa.com/api-wilayah-indonesia/api/regencies/${provinceId}.json`
        );

        const cities = await response.json();

        city.innerHTML =
            '<option value="">Pilih Kota</option>';

        cities.forEach(item => {

            city.innerHTML += `
                <option value="${item.name}"
                        data-id="${item.id}">
                    ${item.name}
                </option>
            `;

        });

        return cities;
    }

    // ===============================
    // LOAD DISTRICTS
    // ===============================

    async function loadDistricts(cityId)
    {
        district.disabled = false;

        const response = await fetch(
            `https://www.emsifa.com/api-wilayah-indonesia/api/districts/${cityId}.json`
        );

        const districts = await response.json();

        district.innerHTML =
            '<option value="">Pilih Kecamatan</option>';

        districts.forEach(item => {

            district.innerHTML += `
                <option value="${item.name}"
                        data-id="${item.id}">
                    ${item.name}
                </option>
            `;

        });

        return districts;
    }

    // ===============================
    // LOAD VILLAGES
    // ===============================

    async function loadVillages(districtId)
    {
        village.disabled = false;

        const response = await fetch(
            `https://www.emsifa.com/api-wilayah-indonesia/api/villages/${districtId}.json`
        );

        const villages = await response.json();

        village.innerHTML =
            '<option value="">Pilih Kelurahan</option>';

        villages.forEach(item => {

            village.innerHTML += `
                <option value="${item.name}">
                    ${item.name}
                </option>
            `;

        });

        return villages;
    }

    // ===============================
    // MANUAL CHANGE
    // ===============================

    province.addEventListener('change', async function(){

        const provinceId =
            this.options[this.selectedIndex].dataset.id;

        if(!provinceId) return;

        await loadCities(provinceId);

        district.innerHTML =
            '<option>Pilih Kecamatan</option>';

        village.innerHTML =
            '<option>Pilih Kelurahan</option>';

        district.disabled = true;
        village.disabled = true;
    });

    city.addEventListener('change', async function(){

        const cityId =
            this.options[this.selectedIndex].dataset.id;

        if(!cityId) return;

        await loadDistricts(cityId);

        village.innerHTML =
            '<option>Pilih Kelurahan</option>';

        village.disabled = true;
    });

    district.addEventListener('change', async function(){

        const districtId =
            this.options[this.selectedIndex].dataset.id;

        if(!districtId) return;

        await loadVillages(districtId);
    });

    // ===============================
    // AUTO FILL DATA LAMA
    // ===============================

    await loadProvinces();

    if(selectedProvince)
    {
        const provinceId =
            selectOption(province, selectedProvince);

        if(provinceId)
        {
            await loadCities(provinceId);

            const cityId =
                selectOption(city, selectedCity);

            if(cityId)
            {
                await loadDistricts(cityId);

                const districtId =
                    selectOption(
                        district,
                        selectedDistrict
                    );

                if(districtId)
                {
                    await loadVillages(districtId);

                    selectOption(
                        village,
                        selectedVillage
                    );
                }
            }
        }
    }

});
</script>
</body>
</html>