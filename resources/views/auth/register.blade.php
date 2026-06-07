<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clean Wash - Registrasi</title>

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap"/>
    <link rel="stylesheet" href="{{ asset('assets/css/Registrasi.css') }}"/>
</head>

<body>

    <div class="card">
        <!-- ===================================== -->
        <!-- PANEL KIRI -->
        <!-- ===================================== -->
        <div class="panel-left">
            <div class="logo">
                <img class="logo-icon" src="{{ asset('assets/images/logo.png') }}" alt="Clean Wash Logo"/>
            </div>
            <div class="left-body">
                <h2 class="left-heading">
                    Daftar Akun
                </h2>
                <p class="left-desc">
                    Daftarkan diri anda untuk mulai menggunakan
                    layanan laundry terpercaya kami.
                </p>
                <div class="illustration">
                    <img class="illus-img" src="{{ asset('assets/images/Vector.svg') }}" alt="Ilustrasi Laundry"/>
                </div>
            </div>
            <p class="left-footer">
                © 2026 Clean Wash
            </p>
        </div>

        <!-- ===================================== -->
        <!-- PANEL KANAN -->
        <!-- ===================================== -->
        <div class="panel-right">
            <div class="form-wrap">
                <h1 class="form-title">
                    Daftar
                </h1>
                <p class="form-subtitle">
                    Buat akun baru untuk memulai
                </p>

                <!-- ERROR VALIDATION -->
                @if ($errors->any())
                    <div class="error-box">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- FORM -->
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <!-- NAMA -->
                    <div class="field">
                        <span class="field-icon">
                            <img src="{{ asset('assets/icons/User_fill.png') }}" alt="User Icon"/>
                        </span>
                        <input type="text" name="name" placeholder="Nama Lengkap" autocomplete="name" value="{{ old('name') }}" required/>
                    </div>
                    <!-- EMAIL -->
                    <div class="field">
                        <span class="field-icon">
                            <img src="{{ asset('assets/icons/Icon Masukan Email.png') }}" alt="Email Icon"/>
                        </span>
                        <input type="email" name="email" placeholder="Masukan Email" autocomplete="email" value="{{ old('email') }}" required/>
                    </div>
                    <!-- PHONE -->
                    <div class="field phone-field">
                        <span class="phone-prefix">
                            +62
                        </span>
                        <input
                            type="tel"
                            name="phone"
                            id="phone"
                            placeholder="81111111111"
                            value="{{ old('phone') }}"
                            required>
                    </div>
                    <!-- PASSWORD -->
                    <div class="field">
                        <span class="field-icon">
                            <img src="{{ asset('assets/icons/password-01.png') }}" alt="Password Icon"/>
                        </span>
                        <input type="password" name="password" placeholder="Masukkan Password" autocomplete="new-password" required/>
                    </div>
                    <!-- KONFIRMASI PASSWORD -->
                    <div class="field">
                        <span class="field-icon">
                            <img
                                src="{{ asset('assets/icons/password-01.png') }}" alt="Konfirmasi Password Icon"/>
                        </span>
                        <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" autocomplete="new-password" required/>
                    </div>
                    <!-- BUTTON -->
                    <button  class="btn-daftar" type="submit"> 
                        Daftar
                    </button>
                </form>
                <!-- FOOTER -->
                <p class="form-footer">
                    Sudah punya akun?
                    <a href="{{ route('login') }}" class="link-login">
                        Login
                    </a>
                </p>
            </div>
        </div>
    </div>

<script>
document.getElementById('phone')
.addEventListener('input', function(){

    this.value =
        this.value.replace(/\D/g,'');

    if(this.value.startsWith('0')){
        this.value =
            this.value.substring(1);
    }

});
</script>

</body>
</html>