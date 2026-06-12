<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport"
      content="width=device-width, initial-scale=1.0">

<title>Register Mitra - Step 4</title>

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
    color:white;
}
.step-label{
    margin-top:10px;
    font-size:14px;
    color:#7a869a;
    display:block;
}
.step.active .step-label{
    color:#183153;
    font-weight:600;
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
    padding:30px;
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
        <p>Lengkapi dokumen usaha Anda.</p>
    </div>

    <div class="stepper">
        <div class="step">
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
        <div class="step active">
            <div class="step-circle">4</div>
            <div class="step-label">Dokumen</div>
        </div>
    </div>

    <div class="card">

        <div class="card-header">
            <h2>Dokumen Usaha</h2>
            <p>Upload dokumen untuk verifikasi mitra laundry.</p>
        </div>
        <form action="{{ route('user.register.step4.store', $mitra->id) }}"
              method="POST"
              enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <!-- KTP -->
                <div class="form-group">
                    <label>KTP *</label>
                    <div class="upload-box">
                        <input
                            type="file"
                            name="ktp"
                            id="ktpInput"
                            accept=".jpg,.jpeg,.png,.pdf"
                            required>
                        <div
                            class="preview"
                            id="ktpPreview">
                        </div>
                    </div>
                </div>
                <!-- NIB -->
                <div class="form-group">
                    <label>NIB *</label>
                    <div class="upload-box">
                        <input
                            type="file"
                            name="nib"
                            id="nibInput"
                            accept=".jpg,.jpeg,.png,.pdf"
                            required>
                        <div
                            class="preview"
                            id="nibPreview">
                        </div>
                    </div>
                </div>
                <!-- NPWP -->
                <div class="form-group">
                    <label>NPWP (Opsional)</label>
                    <div class="upload-box">
                        <input
                            type="file"
                            name="npwp"
                            id="npwpInput"
                            accept=".jpg,.jpeg,.png,.pdf">
                        <div
                            class="preview"
                            id="npwpPreview">
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer" style="display:flex; justify-content:space-between; align-items:center;">
                <button type="button" onclick="window.history.back()" class="btn-back" style="background:#fff; color:#183153; border:1px solid #dbe4ff; padding:14px 30px; border-radius:14px; font-weight:600; cursor:pointer; font-size:15px;">Kembali</button>
                <span style="color:#8b97aa; font-size:14px;">Langkah 4 dari 4</span>
                <button type="submit" class="btn" style="background:#183153;">Kirim Pengajuan</button>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if ($errors->any())
<script>
document.addEventListener('DOMContentLoaded', function(){

    Swal.fire({
        icon:'error',
        title:'Upload Dokumen Gagal',
        html:`{!! implode('<br>', $errors->all()) !!}`
    });

});
</script>
@endif

<script>

const MAX_SIZE = 2 * 1024 * 1024;

// =========================
// GENERIC PREVIEW
// =========================

function setupPreview(inputId, previewId)
{
    const input =
        document.getElementById(inputId);

    const preview =
        document.getElementById(previewId);

    input.addEventListener('change', function(e){

        preview.innerHTML = '';

        const file =
            e.target.files[0];

        if(!file) return;

        if(file.size > MAX_SIZE)
        {
            Swal.fire({
                icon:'error',
                title:'File Terlalu Besar',
                text:'Ukuran file maksimal 2 MB'
            });

            input.value = '';

            return;
        }

        const wrapper =
            document.createElement('div');

        wrapper.style.position = 'relative';
        wrapper.style.display = 'inline-block';

        // =====================
        // IMAGE
        // =====================

        if(file.type.startsWith('image/'))
        {
            const img =
                document.createElement('img');

            img.src =
                URL.createObjectURL(file);

            img.style.width = '150px';
            img.style.height = '150px';
            img.style.objectFit = 'cover';
            img.style.borderRadius = '10px';

            wrapper.appendChild(img);
        }

        // =====================
        // PDF
        // =====================

        else
        {
            const pdf =
                document.createElement('div');

            pdf.innerHTML =
                '📄 ' + file.name;

            pdf.style.padding = '20px';
            pdf.style.background = '#f5f5f5';
            pdf.style.borderRadius = '10px';

            wrapper.appendChild(pdf);
        }

        // =====================
        // DELETE BUTTON
        // =====================

        const remove =
            document.createElement('button');

        remove.type = 'button';

        remove.innerHTML = '×';

        remove.style.position = 'absolute';
        remove.style.top = '-8px';
        remove.style.right = '-8px';
        remove.style.width = '28px';
        remove.style.height = '28px';
        remove.style.border = 'none';
        remove.style.borderRadius = '50%';
        remove.style.background = '#ff4d4f';
        remove.style.color = '#fff';
        remove.style.cursor = 'pointer';

        remove.onclick = () => {

            preview.innerHTML = '';

            input.value = '';

        };

        wrapper.appendChild(remove);

        preview.appendChild(wrapper);

    });
}

// =========================
// INIT
// =========================

setupPreview(
    'ktpInput',
    'ktpPreview'
);

setupPreview(
    'nibInput',
    'nibPreview'
);

setupPreview(
    'npwpInput',
    'npwpPreview'
);

</script>

</body>
</html>