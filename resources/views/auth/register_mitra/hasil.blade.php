<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport"
      content="width=device-width, initial-scale=1.0">

<title>Pengajuan Berhasil</title>

<style>

body{
    margin:0;
    font-family:Poppins,sans-serif;
    background:#f4f6ff;
    display:flex;
    justify-content:center;
    align-items:center;
    height:100vh;
}

.card{
    background:white;
    padding:50px;
    border-radius:25px;
    text-align:center;
    width:500px;
    box-shadow:0 5px 20px rgba(0,0,0,.08);
}

h1{
    color:#1f3566;
}

p{
    color:#666;
    margin:20px 0;
}

.btn{
    display:inline-block;
    background:#1f3566;
    color:white;
    padding:14px 35px;
    border-radius:14px;
    text-decoration:none;
}

.reason-box{
    background:#fff3f3;
    border:1px solid #ffcaca;
    color:#c0392b;
    padding:15px;
    border-radius:12px;
    margin:20px 0;
    text-align:left;
}

</style>
</head>
<body>

<div class="card">

    @if($mitra->status == 'draft')
    <h1>📝 Draft Pendaftaran</h1>
    <p>
        Data pendaftaran mitra Anda belum selesai.
        Silakan lanjutkan pengisian formulir.
    </p>
    <a href="{{$nextStep}}"
    class="btn">
        Lanjutkan Pendaftaran
    </a>
    @endif

    @if($mitra->status == 'pending')
    <h1>⏳ Menunggu Verifikasi</h1>
    <p>
        Pengajuan mitra laundry Anda telah
        berhasil dikirim dan sedang menunggu
        proses verifikasi admin.
    </p>
    <a href="/"
    class="btn">
        Kembali ke Beranda
    </a>
    @endif

    @if($mitra->status == 'approved')

    <h1>✅ Pengajuan Disetujui</h1>
    <p>
        Selamat! Pengajuan mitra laundry Anda
        telah disetujui dan akun Anda sudah
        dapat mengakses dashboard mitra.
    </p>
    <a href="{{ route('mitra.dashboard') }}"
    class="btn">
        Masuk Dashboard Mitra
    </a>
    @endif

    @if($mitra->status == 'rejected')
    <h1>❌ Pengajuan Ditolak</h1>
    <div class="reason-box">
        <strong>Alasan Penolakan:</strong>
        <br>
        {{ $mitra->rejection_reason }}
    </div>
    <p>
        Silakan perbaiki data yang diperlukan
        kemudian ajukan kembali pendaftaran.
    </p>
    <a href="{{ route('user.home') }}"
    class="btn">
        Kembali
    </a>
    <a href="{{ route('user.register.reapply', ['id' => $mitra->id]) }}"
    class="btn">
        Perbaiki Pengajuan
    </a>
    @endif

</div>

</body>
</html>