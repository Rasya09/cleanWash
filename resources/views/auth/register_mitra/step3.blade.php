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
.preview{
    display:flex;
    flex-wrap:wrap;
    gap:12px;
    margin-top:15px;
}

.preview img{
    width:120px;
    height:120px;
    object-fit:cover;
    border-radius:12px;
    border:1px solid #ddd;
}

.preview-item{
    position:relative;
    display:inline-block;
}

.remove-image{
    position:absolute;
    top:-8px;
    right:-8px;
    width:28px;
    height:28px;
    border:none;
    border-radius:50%;
    background:#ff4d4f;
    color:#fff;
    cursor:pointer;
    font-size:18px;
    font-weight:bold;
}

</style>
</head>
<body>

<div class="container">

    <div class="header">
        <h1>Daftarkan Toko Laundry Anda</h1>
        <p>Upload foto dan logo toko laundry Anda.</p>
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

        <div class="step active">
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
            <h2>Foto Toko</h2>
            <p>Upload logo dan foto toko laundry Anda.</p>
        </div>

        <form
            action="{{ route('user.register.step3.store', $mitra->id) }}"
            method="POST"
            enctype="multipart/form-data">

            @csrf

            <div class="card-body">

                <!-- ========================= -->
                <!-- LOGO -->
                <!-- ========================= -->

                <div class="form-group">

                    <label>Logo Toko</label>

                    <div class="upload-box">

                        <p>
                            Upload 1 logo toko
                            <br>
                            Format JPG, JPEG, PNG
                            <br>
                            Maksimal 2 MB
                        </p>

                        <input
                            type="file"
                            name="logo"
                            id="logoInput"
                            accept=".jpg,.jpeg,.png,image/*">

                        <div
                            class="preview"
                            id="logoPreview">
                        </div>

                    </div>

                </div>

                <!-- ========================= -->
                <!-- STORE PHOTO -->
                <!-- ========================= -->

                <div class="form-group">

                    <label>Foto Toko</label>

                    <div class="upload-box">

                        <p>
                            Upload minimal 2 foto
                            <br>
                            Maksimal 3 foto
                            <br>
                            Setiap foto maksimal 2 MB
                        </p>

                        <input
                            type="file"
                            id="storeInput"
                            name="store_photos[]"
                            multiple
                            accept=".jpg,.jpeg,.png,image/*">

                        <small
                            id="photoCounter"
                            style="
                                display:block;
                                margin-top:10px;
                                color:#666;
                            ">
                            0 / 3 foto dipilih
                        </small>

                        <div
                            class="preview"
                            id="storePreview">
                        </div>

                    </div>

                </div>

            </div>

            <div
                class="footer"
                style="
                    display:flex;
                    justify-content:space-between;
                    align-items:center;
                ">

                <button
                    type="button"
                    onclick="window.history.back()"
                    class="btn-back"
                    style="
                        background:#fff;
                        color:#183153;
                        border:1px solid #dbe4ff;
                        padding:14px 30px;
                        border-radius:14px;
                        font-weight:600;
                        cursor:pointer;
                        font-size:15px;
                    ">
                    Kembali
                </button>

                <span
                    style="
                        color:#8b97aa;
                        font-size:14px;
                    ">
                    Langkah 3 dari 4
                </span>

                <button
                    type="submit"
                    class="btn"
                    style="background:#183153;">
                    Lanjut
                </button>

            </div>

        </form>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if ($errors->any())
<script>
document.addEventListener('DOMContentLoaded', function () {

    Swal.fire({
        icon: 'error',
        title: 'Upload Gagal',
        html: `{!! implode('<br>', $errors->all()) !!}`,
        confirmButtonText: 'OK'
    });

});
</script>
@endif

<script>
const MAX_SIZE = 2 * 1024 * 1024; // 2 MB

let selectedFiles = [];

// =====================================
// LOGO PREVIEW
// =====================================

document
.getElementById('logoInput')
.addEventListener('change', function(e){

    const preview =
        document.getElementById('logoPreview');

    preview.innerHTML = '';

    const file = e.target.files[0];

    if(!file) return;

    if(file.size > MAX_SIZE)
    {
        Swal.fire({
            icon:'error',
            title:'File Terlalu Besar',
            text:'Logo maksimal 2 MB'
        });

        this.value = '';
        return;
    }

    const wrapper =
        document.createElement('div');

    wrapper.style.position = 'relative';
    wrapper.style.display = 'inline-block';

    const img =
        document.createElement('img');

    img.src =
        URL.createObjectURL(file);

    img.style.width = '120px';
    img.style.height = '120px';
    img.style.objectFit = 'cover';
    img.style.borderRadius = '10px';

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
    remove.style.fontSize = '18px';
    remove.style.fontWeight = 'bold';

    remove.onclick = () => {

        preview.innerHTML = '';

        document.getElementById('logoInput').value = '';

    };

    wrapper.appendChild(img);
    wrapper.appendChild(remove);

    preview.appendChild(wrapper);

});

// =====================================
// STORE PHOTO PREVIEW
// =====================================

document
.getElementById('storeInput')
.addEventListener('change', function(e){

    const files =
        Array.from(e.target.files);

    for(const file of files)
    {
        if(file.size > MAX_SIZE)
        {
            Swal.fire({
                icon:'error',
                title:'File Terlalu Besar',
                text:'Setiap foto maksimal 2 MB'
            });

            continue;
        }

        if(selectedFiles.length >= 3)
        {
            Swal.fire({
                icon:'warning',
                title:'Batas Tercapai',
                text:'Maksimal upload 3 foto toko'
            });

            break;
        }

        selectedFiles.push(file);
    }

    renderPreview();

    this.value = '';

});

// =====================================
// RENDER PREVIEW
// =====================================

function renderPreview()
{
    
    const preview =
        document.getElementById('storePreview');

    preview.innerHTML = '';

    document.getElementById('photoCounter').textContent =
    `${selectedFiles.length} / 3 foto dipilih`;

    selectedFiles.forEach((file,index)=>{

        const wrapper =
            document.createElement('div');

        wrapper.style.position = 'relative';
        wrapper.style.display = 'inline-block';
        wrapper.style.margin = '10px';

        const img =
            document.createElement('img');

        img.src =
            URL.createObjectURL(file);

        img.style.width = '120px';
        img.style.height = '120px';
        img.style.objectFit = 'cover';
        img.style.borderRadius = '10px';

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
        remove.style.cursor = 'pointer';
        remove.style.background = '#ff4d4f';
        remove.style.color = '#fff';
        remove.style.fontSize = '18px';
        remove.style.fontWeight = 'bold';

        remove.onclick = function(){

            selectedFiles.splice(index,1);

            renderPreview();

        };

        wrapper.appendChild(img);
        wrapper.appendChild(remove);

        preview.appendChild(wrapper);

    });

}

// =====================================
// FORM SUBMIT
// =====================================

document
.querySelector('form')
.addEventListener('submit', function(e){

    if(selectedFiles.length < 2)
    {
        e.preventDefault();

        Swal.fire({
            icon:'error',
            title:'Foto Toko Kurang',
            text:'Minimal upload 2 foto toko'
        });

        return;
    }

    const dataTransfer =
        new DataTransfer();

    selectedFiles.forEach(file => {
        dataTransfer.items.add(file);
    });

    document.getElementById('storeInput').files =
        dataTransfer.files;

});
</script>
</body>
</html>