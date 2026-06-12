<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clean Wash - Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" />
    <link rel="stylesheet" href="{{ asset('assets/css/Login.css') }}" />
</head>
<body>
    <div class="card">
        <!-- Panel Kiri -->
        <div class="panel-left">
            <div class="logo">
                <img class="logo-icon" src="{{ asset('assets/images/logo.png') }}" alt="Clean Wash Logo" />
            </div>

        <div class="left-body">
                <h2 class="left-heading">Selamat Datang</h2>
                <p class="left-desc">Daftarkan diri anda untuk mulai menggunakan layanan laundry terpercaya kami.</p>
                <div class="illustration">
                    <img class="illus-img" src="{{ asset('assets/images/Vector.svg') }}" alt="Ilustrasi Laundry" />
                </div>
            </div>

            <p class="left-footer">© 2026 Clean Wash</p>
        </div>

        <!-- Panel Kanan -->
        <div class="panel-right">
            <div class="form-wrap">
                <h1 class="form-title">Masuk</h1>
                <p class="form-subtitle">Buat akun baru Anda</p>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="field">
                        <span class="field-icon">
                            <img src="{{ asset('assets/icons/User_fill.png') }}" alt="User Icon" />
                        </span>
                        <input 
                            type="email" 
                            name="email"
                            placeholder="Masukkan Email" 
                            autocomplete="username"
                            value="{{ old('email') }}"
                            maxlength="255"
                            required
                        />
                    </div>

                    <div class="field">
                        <span class="field-icon">
                            <img src="{{ asset('assets/icons/password-01.png') }}" alt="Password Icon" />
                        </span>
                        <input 
                            type="password" 
                            name="password"
                            placeholder="Masukkan Password" 
                            autocomplete="current-password"
                            maxlength="50"
                            required
                        />
                    </div>

                    <button class="btn-login" type="submit">Login</button>

                </form>

                <p class="form-footer">
                    Belum memiliki akun?
                    <a href="{{ route('register') }}" class="link-register">Register</a>
                </p>
            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if ($errors->any())
    <script>
    Swal.fire({
        icon: 'error',
        title: 'Login Gagal',
        html: `{!! implode('<br>', $errors->all()) !!}`,
        confirmButtonText: 'OK'
    });
    </script>
    @endif
    @if(session('error'))
    <script>
    Swal.fire({
        icon: 'error',
        title: 'Login Gagal',
        text: '{{ session('error') }}',
        confirmButtonText: 'OK'
    });
    </script>
    @endif
    @if(session('success'))
    <script>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: '{{ session('success') }}',
        timer: 2000,
        showConfirmButton: false
    });
    </script>
    @endif
</body>
</html>