<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport"
      content="width=device-width, initial-scale=1.0">

<title>Register Mitra - Step 3</title>

<style>

body{
    margin:0;
    font-family:Poppins,sans-serif;
    background:#f4f6ff;
}

.container{
    width:90%;
    max-width:900px;
    margin:40px auto;
}

.header{
    text-align:center;
    margin-bottom:40px;
}

.header h1{
    color:#1f3566;
}

.steps{
    display:flex;
    justify-content:center;
    gap:40px;
    margin-bottom:40px;
}

.step{
    text-align:center;
}

.step-circle{
    width:45px;
    height:45px;
    border-radius:50%;
    background:#dfe6ff;
    display:flex;
    align-items:center;
    justify-content:center;
    margin:auto;
    font-weight:bold;
}

.step.active .step-circle{
    background:#1f3566;
    color:white;
}

.card{
    background:white;
    border-radius:25px;
    overflow:hidden;
    box-shadow:0 5px 20px rgba(0,0,0,.08);
}

.card-header{
    background:#1f3566;
    color:white;
    padding:35px;
}

.card-body{
    padding:35px;
}

.form-group{
    margin-bottom:30px;
}

label{
    display:block;
    margin-bottom:10px;
    font-weight:600;
}

.upload-box{
    border:2px dashed #cdd6f4;
    border-radius:20px;
    padding:40px;
    text-align:center;
    background:#f8f9ff;
}

input[type=file]{
    margin-top:15px;
}

.preview{
    display:flex;
    gap:15px;
    flex-wrap:wrap;
    margin-top:20px;
}

.preview img{
    width:120px;
    height:120px;
    object-fit:cover;
    border-radius:15px;
}

.footer{
    padding:30px 35px;
    display:flex;
    justify-content:space-between;
    align-items:center;
    border-top:1px solid #eee;
}

.btn{
    background:#1f3566;
    color:white;
    border:none;
    padding:14px 35px;
    border-radius:14px;
    cursor:pointer;
    font-size:15px;
    font-weight:600;
}

</style>
</head>
<body>

<div class="container">
    <div class="header">
        <h1>Daftarkan Toko Laundry Anda</h1>
        <p>Upload foto dan logo toko laundry Anda.</p>
    </div>
    <div class="steps">
        <div class="step">
            <div class="step-circle">1</div>
            <span>Identitas</span>
        </div>
        <div class="step">
            <div class="step-circle">2</div>
            <span>Lokasi</span>
        </div>
        <div class="step active">
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
            <h2>Foto Toko</h2>
            <p>Upload logo dan foto toko laundry Anda.</p>
        </div>
        @if ($errors->any())
            <div style="
                background:#ffdede;
                color:#a70000;
                padding:15px;
                border-radius:10px;
                margin-bottom:20px;
            ">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('user.register.step3.store', $mitra->id) }}"
              method="POST"
              enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <!-- LOGO -->
                <div class="form-group">
                    <label>Logo Toko</label>
                    <div class="upload-box">

                        <p>Upload logo toko (maks 1)</p>

                        <input type="file"
                               name="logo"
                               id="logoInput"
                               accept="image/*">

                        <div class="preview"
                             id="logoPreview">
                        </div>

                    </div>

                </div>

                <!-- STORE PHOTO -->

                <div class="form-group">

                    <label>Foto Toko</label>

                    <div class="upload-box">

                        <p>
                            Upload minimal 2 foto,
                            maksimal 3 foto
                        </p>

                        <input type="file"
                               name="store_photos[]"
                               id="storeInput"
                               multiple
                               accept="image/*">

                        <div class="preview"
                             id="storePreview">
                        </div>

                    </div>

                </div>

            </div>

            <div class="footer">

                <span>Langkah 3 dari 4</span>

                <button type="submit"
                        class="btn">
                    Lanjut
                </button>

            </div>

        </form>

    </div>

</div>

<script>
// =========================
// LOGO PREVIEW
// =========================
document
.getElementById('logoInput')
.addEventListener('change', function(e){
    const preview =
        document.getElementById('logoPreview');
    preview.innerHTML = '';
    const file = e.target.files[0];
    if(file)
    {
        const img =
            document.createElement('img');
        img.src =
            URL.createObjectURL(file);
        preview.appendChild(img);
    }
});
// =========================
// STORE PREVIEW
// =========================
document
.getElementById('storeInput')
.addEventListener('change', function(e){
    const preview =
        document.getElementById('storePreview');
    preview.innerHTML = '';
    const files = e.target.files;
    if(files.length < 2)
    {
        alert('Minimal upload 2 foto');
        return;
    }
    if(files.length > 5)
    {
        alert('Maksimal 5 foto');
        return;
    }
    Array.from(files).forEach(file => {
        const img =
            document.createElement('img');
        img.src =
            URL.createObjectURL(file);
        preview.appendChild(img);
    });
});
</script>
</body>
</html>