<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Mitra</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }
        body{
            font-family:'Poppins', sans-serif;
            background:#f5f7ff;
            min-height:100vh;
            padding:40px 20px;
        }
        .container{
            max-width:950px;
            margin:auto;
        }
        .title{
            text-align:center;
            margin-bottom:10px;
            font-size:42px;
            font-weight:700;
            color:#183153;
        }
        .subtitle{
            text-align:center;
            color:#7a869a;
            margin-bottom:50px;
            font-size:17px;
        }
        /* ===================================
           STEPPER
        =================================== */
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
            background:#183153;
            border-color:#183153;
            color:#fff;
        }
        .step-label{
            margin-top:10px;
            font-size:14px;
            color:#7a869a;
        }
        .step.active .step-label{
            color:#183153;
            font-weight:600;
        }
        /* ===================================
           CARD
        =================================== */
        .card{
            background:#fff;
            border-radius:28px;
            overflow:hidden;
            box-shadow:0 10px 30px rgba(0,0,0,0.08);
        }
        .card-header{
            background:linear-gradient(135deg,#183153,#244b82);
            padding:35px;
            color:#fff;
        }
        .card-header h2{
            font-size:30px;
            margin-bottom:8px;
        }
        .card-header p{
            opacity:0.8;
        }
        .card-body{
            padding:40px;
        }
        .grid{
            display:grid;
            grid-template-columns:1fr 1fr;
            gap:24px;
        }
        .form-group{
            display:flex;
            flex-direction:column;
        }
        .form-group.full{
            grid-column:1 / -1;
        }
        label{
            font-size:14px;
            font-weight:600;
            margin-bottom:10px;
            color:#183153;
        }
        input,
        textarea{
            border:1px solid #dbe4ff;
            background:#f8faff;
            border-radius:14px;
            padding:16px;
            font-size:15px;
            font-family:'Poppins';
            outline:none;
        }
        textarea{
            min-height:140px;
            resize:none;
        }
        input:focus,
        textarea:focus{
            border-color:#5f8dff;
        }
        /* ===================================
           FOOTER
        =================================== */
        .card-footer{
            padding:30px 40px;
            border-top:1px solid #eef2ff;
            display:flex;
            justify-content:space-between;
            align-items:center;
        }
        .step-info{
            color:#8b97aa;
            font-size:14px;
        }
        .btn-next{
            border:none;
            background:#183153;
            color:#fff;
            padding:16px 30px;
            border-radius:14px;
            cursor:pointer;
            font-size:15px;
            font-weight:600;
        }
        .btn-next:hover{
            background:#244b82;
        }
        .phone-field{
            display:flex;
            align-items:center;
        }

        .phone-prefix{
            padding:0 12px;
            font-weight:600;
            color:#555;
        }
        
        /* ===================================
           CUSTOM TOGGLE
        =================================== */
        .custom-toggle {
            position: relative;
            display: inline-block;
            width: 40px;
            height: 22px;
        }
        .custom-toggle input {
            opacity: 0;
            width: 0;
            height: 0;
        }
        .custom-toggle .slider {
            position: absolute;
            cursor: pointer;
            top: 0; left: 0; right: 0; bottom: 0;
            background-color: #dbe4ff;
            transition: .3s;
            border-radius: 30px;
            box-shadow: inset 0 2px 4px rgba(0,0,0,0.05);
        }
        .custom-toggle .slider:before {
            position: absolute;
            content: "";
            height: 16px;
            width: 16px;
            left: 3px;
            bottom: 3px;
            background-color: white;
            transition: .3s cubic-bezier(0.68, -0.55, 0.265, 1.55);
            border-radius: 50%;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        }
        .custom-toggle input:checked + .slider {
            background-color: #4285f4;
        }
        .custom-toggle input:checked + .slider:before {
            transform: translateX(18px);
        }
        .toggle-text {
            font-size: 13px; 
            font-weight: 500; 
            color: #7a869a; 
            cursor: pointer;
            user-select: none;
            transition: color 0.3s;
        }
        .custom-toggle input:checked ~ .toggle-text {
            color: #183153;
        }

        @media(max-width:768px){
            .grid{
                grid-template-columns:1fr;
            }
            .title{
                font-size:30px;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <!-- TITLE -->
    <h1 class="title">
        Daftarkan Toko Laundry Anda
    </h1>
    <p class="subtitle">
        Bergabung bersama ribuan mitra laundry dan jangkau lebih banyak pelanggan di sekitar Anda.
    </p>
    <!-- STEPPER -->
    <div class="stepper">
        <div class="step active">
            <div class="step-circle">1</div>
            <div class="step-label">Identitas</div>
        </div>
        <div class="step">
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
    <!-- CARD -->
    <div class="card">
        <div class="card-header">
            <h2>Identitas Toko</h2>
            <p>
                Informasi dasar toko dan pemilik usaha laundry
            </p>
        </div>
        <form action="{{ route('user.register.step1.store') }}"
              method="POST">
            @csrf
            <div class="card-body">
                <div class="grid">
                    <!-- STORE -->
                    <div class="form-group">
                        <label>
                            Nama Toko *
                        </label>
                        <input type="text"
                               name="store_name"
                               value="{{ $mitra->store_name ?? '' }}"
                               placeholder="Contoh: Laundry Bersih Jaya">
                    </div>
                    <!-- OWNER -->
                    <div class="form-group">
                        <label>
                            Nama Pemilik *
                        </label>
                        <input type="text"
                               name="owner_name"
                               value="{{ $mitra->owner_name ?? '' }}"
                               placeholder="Nama pemilik">
                    </div>
                    <!-- PHONE -->
                    <div class="form-group">
                        <label>
                            No Telepon / WhatsApp *
                        </label>

                        <input type="tel"
                                name="phone"
                                id="phone"
                                value="{{ $mitra->phone ?? '' }}"
                                placeholder="81234567891"
                                required>
                        
                        <div style="display: flex; align-items: center; gap: 8px; margin-top: 10px;">
                            <label class="custom-toggle" style="margin-bottom: 0;">
                                <input type="checkbox" id="useAccountPhone">
                                <span class="slider"></span>
                            </label>
                            <span class="toggle-text" onclick="document.getElementById('useAccountPhone').click()">Samakan dengan akun</span>
                        </div>
                    </div>
                    <!-- EMAIL -->
                    <div class="form-group">
                        <label>
                            Email Bisnis
                        </label>
                        <input type="email"
                               name="email"
                               value="{{ $mitra->email ?? '' }}"
                               placeholder="email@toko.com">
                    </div>
                    <!-- DESCRIPTION -->
                    <div class="form-group full">
                        <label>
                            Deskripsi Toko
                        </label>
                        <textarea name="description"
                                  placeholder="Ceritakan tentang usaha laundry Anda...">{{ $mitra->description ?? '' }}</textarea>
                    </div>
                </div>
            </div>
            <!-- FOOTER -->
            <div class="card-footer" style="display:flex; justify-content:space-between; align-items:center;">
                <a href="{{ url('/') }}" class="btn-back" style="text-decoration:none; color:#183153; font-weight:600; padding:14px 24px; border-radius:14px; border:1px solid #dbe4ff; background:#fff; font-size:15px;">Kembali ke Beranda</a>
                <div class="step-info" style="color:#8b97aa; font-size:14px;">
                    Langkah 1 dari 4
                </div>
                <button type="submit"
                        class="btn-next" style="background:#183153; color:#fff; padding:14px 30px; border-radius:14px; border:none; font-weight:600; font-size:15px; cursor:pointer;">
                    Lanjut
                </button>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const phoneInput = document.getElementById('phone');
    const useAccountPhone = document.getElementById('useAccountPhone');
    
    // Ambil nomor HP user dan hilangkan 62 atau 0 di depannya
    let userPhone = "{{ Auth::user()->phone ?? '' }}";
    if (userPhone.startsWith('62')) {
        userPhone = userPhone.substring(2);
    } else if (userPhone.startsWith('0')) {
        userPhone = userPhone.substring(1);
    }

    useAccountPhone.addEventListener('change', function() {
        if (this.checked) {
            phoneInput.value = userPhone;
            phoneInput.setAttribute('readonly', true);
            phoneInput.style.backgroundColor = '#eef2ff';
            phoneInput.style.color = '#7a869a';
        } else {
            phoneInput.value = '';
            phoneInput.removeAttribute('readonly');
            phoneInput.style.backgroundColor = '#f8faff';
            phoneInput.style.color = 'inherit';
        }
    });

    phoneInput.addEventListener('input', function(){
        this.value = this.value.replace(/\D/g,'');
        if(this.value.startsWith('0')){
            this.value = this.value.substring(1);
        }
    });
});
</script>

</body>
</html>
