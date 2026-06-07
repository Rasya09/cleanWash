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
        .stepper{
            display:flex;
            justify-content:space-between;
            align-items:center;
            margin-bottom:50px;
            position:relative;
        }
        .stepper::before{
            content:'';
            position:absolute;
            top:20px;
            left:80px;
            right:80px;
            height:3px;
            background:#dbe4ff;
            z-index:1;
        }
        .step{
            position:relative;
            z-index:2;
            text-align:center;
            flex:1;
        }
        .step-circle{
            width:42px;
            height:42px;
            border-radius:50%;
            background:#fff;
            border:3px solid #dbe4ff;
            margin:auto;
            display:flex;
            align-items:center;
            justify-content:center;
            font-weight:600;
            color:#9aa5b5;
        }
        .step.active .step-circle{
            background:#1d3565;
            border-color:#1d3565;
            color:white;
        }
        .step-label{
            margin-top:10px;
            font-size:14px;
            color:#7a869a;
            display:block;
        }
        .step.active .step-label{
            color:#1d3565;
            font-weight:600;
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
    <div class="stepper">
        <div class="step">
            <div class="step-circle">1</div>
            <div class="step-label">Identitas</div>
        </div>
        <div class="step active">
            <div class="step-circle">2</div>
            <div class="step-label">Lokasi</div>
        </div>
        <div class="step">
            <div class="step-circle">3</div>
            <div class="step-label">Foto</div>
        </div>
        <div class="step">
            <div class="step-circle">4</div>
            <div class="step-label">Dokumen</div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h2>Lokasi Toko</h2>
            <p>Masukkan alamat lengkap toko laundry Anda.</p>
        </div>
        <form action="{{ route('user.register.step2.store') }}"
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
                            <option value="">Pilih Provinsi</option>
                        </select>
                    </div>
                    <!-- KOTA -->
                    <div class="form-group">
                        <label>Kota / Kabupaten *</label>
                        <select id="city"
                                name="city"
                                disabled
                                required>
                            <option value="">Pilih Kota</option>
                        </select>
                    </div>
                    <!-- KECAMATAN -->
                    <div class="form-group">
                        <label>Kecamatan *</label>
                        <select id="district"
                                name="district"
                                disabled
                                required>
                            <option value="">Pilih Kecamatan</option>
                        </select>
                    </div>
                    <!-- KELURAHAN -->
                    <div class="form-group">
                        <label>Kelurahan / Desa *</label>
                        <select id="village"
                                name="village"
                                disabled
                                required>
                            <option value="">Pilih Kelurahan</option>
                        </select>
                    </div>
                    <!-- KODE POS -->
                    <div class="form-group">
                        <label>Kode Pos *</label>
                        <input type="text"
                            name="postal_code">
                    </div>
                    <!-- ALAMAT -->
                    <div class="form-group full">
                        <label>Alamat Lengkap *</label>
                        <textarea name="address"></textarea>
                    </div>
                </div>
            </div>
            <div class="footer" style="display:flex; justify-content:space-between; align-items:center;">
                <button type="button" onclick="window.history.back()" class="btn-back" style="background:#fff; color:#183153; border:1px solid #dbe4ff; padding:14px 30px; border-radius:14px; font-weight:600; cursor:pointer; font-size:15px;">Kembali</button>
                <span style="color:#8b97aa; font-size:14px;">Langkah 2 dari 4</span>
                <button type="submit" class="btn">Lanjut</button>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {

    const province = document.getElementById('province');
    const city = document.getElementById('city');
    const district = document.getElementById('district');
    const village = document.getElementById('village');

    // =====================================
    // HELPER
    // =====================================

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

    function wait(ms)
    {
        return new Promise(resolve => setTimeout(resolve, ms));
    }

    // =====================================
    // LOAD PROVINCES
    // =====================================

    async function loadProvinces()
    {
        const response = await fetch(
            'https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json'
        );

        const provinces = await response.json();

        provinces.forEach(item => {

            province.innerHTML += `
                <option value="${item.name}"
                        data-id="${item.id}">
                    ${item.name}
                </option>
            `;

        });
    }

    loadProvinces();

    // =====================================
    // LOAD CITY
    // =====================================

    province.addEventListener('change', async function(){

        city.disabled = false;

        city.innerHTML =
            `<option value="">Pilih Kota</option>`;

        district.innerHTML =
            `<option value="">Pilih Kecamatan</option>`;

        village.innerHTML =
            `<option value="">Pilih Kelurahan</option>`;

        district.disabled = true;
        village.disabled = true;

        const provinceId =
            this.options[this.selectedIndex].dataset.id;

        const response = await fetch(
            `https://www.emsifa.com/api-wilayah-indonesia/api/regencies/${provinceId}.json`
        );

        const cities = await response.json();

        cities.forEach(item => {

            city.innerHTML += `
                <option value="${item.name}"
                        data-id="${item.id}">
                    ${item.name}
                </option>
            `;

        });

    });

    // =====================================
    // LOAD DISTRICT
    // =====================================

    city.addEventListener('change', async function(){

        district.disabled = false;

        district.innerHTML =
            `<option value="">Pilih Kecamatan</option>`;

        village.innerHTML =
            `<option value="">Pilih Kelurahan</option>`;

        village.disabled = true;

        const cityId =
            this.options[this.selectedIndex].dataset.id;

        const response = await fetch(
            `https://www.emsifa.com/api-wilayah-indonesia/api/districts/${cityId}.json`
        );

        const districts = await response.json();

        districts.forEach(item => {

            district.innerHTML += `
                <option value="${item.name}"
                        data-id="${item.id}">
                    ${item.name}
                </option>
            `;

        });

    });

    // =====================================
    // LOAD VILLAGE
    // =====================================

    district.addEventListener('change', async function(){

        village.disabled = false;

        village.innerHTML =
            `<option value="">Pilih Kelurahan</option>`;

        const districtId =
            this.options[this.selectedIndex].dataset.id;

        const response = await fetch(
            `https://www.emsifa.com/api-wilayah-indonesia/api/villages/${districtId}.json`
        );

        const villages = await response.json();

        villages.forEach(item => {

            village.innerHTML += `
                <option value="${item.name}">
                    ${item.name}
                </option>
            `;

        });

    });

    // =====================================
    // AUTO SELECT OPTION
    // =====================================

    function selectOption(selectElement, target)
    {
        const targetNormalized = normalize(target);

        for(let option of selectElement.options)
        {
            const optionNormalized =
                normalize(option.value);

            if(
                optionNormalized.includes(targetNormalized)
                ||
                targetNormalized.includes(optionNormalized)
            )
            {
                selectElement.value = option.value;
                return true;
            }
        }

        return false;
    }

    // =====================================
    // GPS LOCATION
    // =====================================

    async function getLocation()
    {
        if (!navigator.geolocation)
        {
            alert('Browser tidak support GPS');
            return;
        }

        navigator.geolocation.getCurrentPosition(

            async function(position)
            {
                const lat = position.coords.latitude;
                const lon = position.coords.longitude;

                try {

                    const response = await fetch(
                        `https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=${lat}&lon=${lon}`
                    );

                    const data = await response.json();

                    console.log(data);

                    // =====================================
                    // GET DATA
                    // =====================================

                    const provinceName =
                        data.address.state || '';

                    const cityName =
                        data.address.city ||
                        data.address.county ||
                        data.address.city_district ||
                        '';

                    const districtName =
                        data.address.suburb ||
                        data.address.city_district ||
                        data.address.municipality ||
                        '';

                    const villageName =
                        data.address.village ||
                        data.address.hamlet ||
                        '';

                    // =====================================
                    // ADDRESS
                    // =====================================

                    document.querySelector('[name="address"]').value =
                        data.display_name || '';

                    document.querySelector('[name="postal_code"]').value =
                        data.address.postcode || '';

                    // =====================================
                    // PROVINCE
                    // =====================================

                    const provinceFound =
                        selectOption(province, provinceName);

                    if(provinceFound)
                    {
                        province.dispatchEvent(
                            new Event('change')
                        );

                        await wait(1000);
                    }

                    // =====================================
                    // CITY
                    // =====================================

                    const cityFound =
                        selectOption(city, cityName);

                    if(cityFound)
                    {
                        city.dispatchEvent(
                            new Event('change')
                        );

                        await wait(1000);
                    }

                    // =====================================
                    // DISTRICT
                    // =====================================

                    const districtFound =
                        selectOption(district, districtName);

                    if(districtFound)
                    {
                        district.dispatchEvent(
                            new Event('change')
                        );

                        await wait(1000);
                    }

                    // =====================================
                    // VILLAGE
                    // =====================================

                    selectOption(village, villageName);

                    alert('Lokasi berhasil diisi otomatis');

                }
                catch(error)
                {
                    console.log(error);
                    alert('Gagal mengambil lokasi');
                }
            }

        );
    }

    window.getLocation = getLocation;

});
</script>
</body>
</html>