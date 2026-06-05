@extends('admin.layouts.app')

@section('css')
  <link rel="stylesheet" href="{{ asset('assets/css/admin/verifikasi_mitra.css') }}">
@endsection

@section('content')
    <div class="app">
    <!-- Main Content Area -->
    <main class="main">
      <!-- Page Header -->
      <div class="page-head">
        <div>
          <h1>Verifikasi Mitra</h1>
          <p>Verifikasi dan kelola pendaftaran mitra laundry baru.</p>
        </div>
        <div class="date-pill">
          <i class="fa-regular fa-calendar"></i>
          <span>1 Mei 2024 - 7 Mei 2024</span>
          <i class="fa-solid fa-chevron-down"></i>
        </div>
      </div>

      <!-- Statistics Cards Section -->
      <section class="stats">
        <!-- Total Registrations Card -->
        <div class="stat-card violet">
          <div class="stat-icon"><i class="fa-solid fa-users"></i></div>
          <div class="stat-content">
            <div class="stat-title">Total Pendaftaran</div>
            <div class="stat-value">
                {{ $total }}
            </div>
            <div class="stat-foot"><span class="up">↑ 12,5%</span> Dibanding minggu lalu</div>
          </div>
        </div>

        <!-- Pending Verification Card -->
        <div class="stat-card orange">
          <div class="stat-icon"><i class="fa-solid fa-hourglass-half"></i></div>
          <div class="stat-content">
            <div class="stat-title">Menunggu Verifikasi</div>
            <div class="stat-value">
                {{ $pending }}
            </div>
            <div class="stat-foot"><span class="up">↑ 10,8%</span> Dibanding minggu lalu</div>
          </div>
        </div>

        <!-- Approved Card -->
        <div class="stat-card green">
          <div class="stat-icon"><i class="fa-solid fa-circle-check"></i></div>
          <div class="stat-content">
            <div class="stat-title">Disetujui</div>
            <div class="stat-value">
                {{ $approved }}
            </div>
            <div class="stat-foot"><span class="up">↑ 8,3%</span> Dibanding minggu lalu</div>
          </div>
        </div>

        <!-- Rejected Card -->
        <div class="stat-card red">
          <div class="stat-icon"><i class="fa-solid fa-circle-xmark"></i></div>
          <div class="stat-content">
            <div class="stat-title">Ditolak</div>
            <div class="stat-value">
                {{ $rejected }}
            </div>
            <div class="stat-foot"><span class="down">↓ 4,2%</span> Dibanding minggu lalu</div>
          </div>
        </div>
      </section>

      <!-- Main Content Grid - Dual Panel Layout -->
      <div class="panel list-panel">
          <!-- Panel Header with Search & Filters -->
          <div class="panel-head">
            <h2>Daftar Menunggu Verifikasi</h2>
            <div class="search-row">
              <div class="search-box">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" placeholder="Cari nama laundry..." />
              </div>
            </div>
          </div>

          {{-- ========================================= --}}
          {{-- LIST DATA MITRA --}}
          {{-- ========================================= --}}
          <div class="pending-list">
              @foreach($mitras as $mitra)
              <div class="pending-item"
                  onclick="openDetail({{ $mitra->id }})">
                  <img src="{{ asset('storage/' . $mitra->logo) }}"
                      alt="Logo">
                  <div class="pending-text">
                      <div class="pending-name">
                          {{ $mitra->store_name }}
                      </div>
                      <div class="pending-city">
                          {{ $mitra->city }}
                      </div>
                      <div class="pending-date">
                          Didaftarkan:
                          {{ $mitra->created_at->format('d M Y, H:i') }}
                      </div>
                  </div>
                  <span class="pill orange">
                      {{ ucfirst($mitra->verification_status) }}
                  </span>
              </div>
              @endforeach
          </div>
            {{-- ========================================= --}}
            {{-- POPUP DETAIL --}}
            {{-- ========================================= --}}
            <div class="detail-overlay"
                id="detailOverlay">
                <div class="detail-modal">
                    {{-- CLOSE --}}
                    <button class="close-detail"
                          onclick="closeDetail()">
                      ✕
                    </button>
                    {{-- RIGHT PANEL --}}
                    <div class="panel detail-panel">
                        {{-- HEADER --}}
                        <div class="panel-head detail-head">
                            <h2>
                              Detail Pendaftaran Mitra
                            </h2>
                            <div class="action-group">
                                {{-- APPROVE --}}
                                <form id="approveForm" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn primary">
                                        <i class="fa-solid fa-check"></i>
                                        Setujui
                                    </button>
                                </form>
                                {{-- BUTTON TOLAK --}}
                                <button
                                    type="button"
                                    class="btn secondary"
                                    onclick="openRejectModal()">
                                    <i class="fa-solid fa-xmark"></i>
                                    Tolak
                                </button>
                            </div>
                            {{-- FORM PENOLAKAN --}}
                            <div id="rejectModal" class="reject-overlay">
                                <div class="reject-box">
                                    <h3>Alasan Penolakan</h3>
                                    <form id="rejectForm" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <textarea
                                            name="rejection_reason"
                                            required
                                            placeholder="Masukkan alasan penolakan..."></textarea>
                                        <div class="reject-actions">
                                            <button
                                                type="button"
                                                class="btn-cancel"
                                                onclick="closeRejectModal()">
                                                Batal
                                            </button>
                                            <button
                                                type="submit"
                                                class="btn-danger">
                                                Kirim Penolakan
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        {{-- PROFILE --}}
                        <div class="partner-card">
                            <div class="partner-avatar">
                                <img id="detailLogo"
                                    src=""
                                    alt="">
                            </div>
                            <div class="partner-info">
                                <h3 id="detailStoreName">
                                  -
                                </h3>
                                <div class="meta-line">
                                    <span>
                                        <i class="fa-solid fa-location-dot"></i>
                                        <span id="detailCity"></span>
                                    </span>
                                    <span>
                                        <i class="fa-regular fa-calendar"></i>
                                        <span id="detailDate"></span>
                                    </span>
                                </div>
                                <div class="tags">
                                    <span class="tag yellow"
                                        id="detailStatus">
                                    </span>
                                </div>
                            </div>
                        </div>
                        {{-- INFO --}}
                        <div class="info-grid">
                            {{-- LEFT --}}
                            <div class="info-box">
                                <h4>
                                    Informasi Laundry
                                </h4>
                                <div class="info-list">
                                    <div class="info-row">
                                        <span>Nama Pemilik</span>
                                        <b id="detailOwner"></b>
                                    </div>
                                    <div class="info-row">
                                        <span>Email</span>
                                        <b id="detailEmail"></b>
                                    </div>
                                    <div class="info-row">
                                        <span>No Telepon</span>
                                        <b id="detailPhone"></b>
                                    </div>
                                    <div class="info-row">
                                        <span>Alamat</span>
                                        <b id="detailAddress"></b>
                                    </div>
                                    <div class="info-row">
                                        <span>Deskripsi</span>
                                        <b id="detailDescription"></b>
                                    </div>
                                </div>
                            </div>
                            {{-- RIGHT --}}
                            <div class="info-box">
                                <h4>
                                    Dokumen Pendukung
                                </h4>
                                <div class="doc-list">
                                  {{-- KTP --}}
                                    <div class="doc-row">
                                        <div class="doc-left">
                                            <div class="doc-ico blue">
                                                <i class="fa-solid fa-file-lines"></i>
                                            </div>
                                            <div>
                                                <div class="doc-title">
                                                    KTP
                                                </div>
                                                <div class="doc-sub"
                                                    id="ktpName">
                                                </div>
                                            </div>
                                        </div>
                                        <button id="ktpLink"
                                                type="button"
                                                class="eye-btn">
                                            <i class="fa-regular fa-eye"></i>
                                        </button>
                                    </div>
                                    {{-- NIB --}}
                                    <div class="doc-row">
                                        <div class="doc-left">
                                            <div class="doc-ico gray">
                                                <i class="fa-solid fa-file-lines"></i>
                                            </div>
                                            <div>
                                                <div class="doc-title">
                                                    NIB
                                                </div>
                                                <div class="doc-sub"
                                                    id="nibName">
                                                </div>
                                            </div>
                                        </div>
                                        <button id="nibLink"
                                                type="button"
                                                class="eye-btn">
                                            <i class="fa-regular fa-eye"></i>
                                        </button>
                                    </div>
                                    {{-- NPWP --}}
                                    <div class="doc-row">
                                        <div class="doc-left">
                                            <div class="doc-ico mint">
                                                <i class="fa-solid fa-file-lines"></i>
                                            </div>
                                            <div>
                                                <div class="doc-title">
                                                    NPWP
                                                </div>
                                                <div class="doc-sub"
                                                    id="npwpName">
                                                </div>
                                            </div>
                                        </div>
                                        <button id="npwpLink"
                                                type="button"
                                                class="eye-btn">
                                            <i class="fa-regular fa-eye"></i>
                                        </button>
                                    </div>
                              </div>
                          </div>
                      </div>
                        {{-- FOTO TOKO --}}
                        <div class="photo-box">
                            <h4>
                              Foto Tempat Laundry
                            </h4>
                            <div class="photo-list"
                              id="photoList">

                            </div>
                        </div>
                    </div>
                </div>
                <div id="documentModal" class="document-modal">
                    <div class="document-content">
                        <div class="document-header">
                            <h3 id="documentTitle">
                                Preview Dokumen
                            </h3>
                            <button
                                type="button"
                                class="preview-close"
                                onclick="closeDocument()">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                        </div>
                        <div class="document-body">
                            <img
                                id="documentImage"
                                style="display:none;"
                            >
                            <iframe
                                id="documentFrame"
                                style="display:none;">
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>

          <!-- Pagination Controls -->
          <div class="pagination-wrap">
            <div class="pagination-info">Menampilkan 1 - 6 dari 35 data</div>
            <div class="pagination">
              <button><i class="fa-solid fa-chevron-left"></i></button>
              <button class="active">1</button>
              <button>2</button>
              <button>3</button>
              <button>4</button>
              <button>5</button>
              <button><i class="fa-solid fa-chevron-right"></i></button>
            </div>
          </div>
        </div>
    </main>
  </div>
@endsection

@push('scripts')
{{-- ========================================= --}}
{{-- DATA JSON --}}
{{-- ========================================= --}}
<script>

const mitraData = @json($mitras);

function openDetail(id)
{
    const mitra =
        mitraData.find(item => item.id == id);

    document.getElementById('detailOverlay')
        .classList.add('show');

    // =====================================
    // BASIC INFO
    // =====================================

    document.getElementById('detailLogo').src =
        `/storage/${mitra.logo}`;

    document.getElementById('detailStoreName').innerText =
        mitra.store_name;

    document.getElementById('detailCity').innerText =
        mitra.city;

    document.getElementById('detailDate').innerText =
        new Date(mitra.created_at)
            .toLocaleString('id-ID');

    document.getElementById('detailStatus').innerText =
        mitra.status;

    // =====================================
    // INFO
    // =====================================

    document.getElementById('detailOwner').innerText =
        mitra.owner_name;

    document.getElementById('detailEmail').innerText =
        mitra.email;

    document.getElementById('detailPhone').innerText =
        mitra.phone;

    document.getElementById('detailAddress').innerText =
        `
        ${mitra.address},
        ${mitra.village},
        ${mitra.district},
        ${mitra.city},
        ${mitra.province}
        `;

    document.getElementById('detailDescription').innerText =
        mitra.description;

    // =====================================
    // DOCUMENT
    // =====================================

    document.getElementById('ktpName').innerText =
    mitra.ktp.split('/').pop();

    document.getElementById('nibName').innerText =
        mitra.nib.split('/').pop();

    document.getElementById('npwpName').innerText =
        mitra.npwp
            ? mitra.npwp.split('/').pop()
            : '-';

    document.getElementById('ktpLink').onclick = () =>
        openDocument(
            `/storage/${mitra.ktp}`,
            'KTP Pemilik'
        );

    document.getElementById('nibLink').onclick = () =>
        openDocument(
            `/storage/${mitra.nib}`,
            'NIB / Izin Usaha'
        );

    document.getElementById('npwpLink').onclick = () =>
        openDocument(
            `/storage/${mitra.npwp}`,
            'NPWP'
        );

    // =====================================
    // PHOTO STORE
    // =====================================

    let photoHTML = '';

    if(mitra.store_photos)
    {
        JSON.parse(mitra.store_photos)
            .forEach(photo => {

                photoHTML += `
                    <img src="/storage/${photo}">
                `;

            });
    }

    document.getElementById('photoList')
        .innerHTML = photoHTML;

    // =====================================
    // FORM ACTION
    // =====================================

    document.getElementById('approveForm')
        .action =
        `/admin/mitra/${mitra.id}/approve`;

    document.getElementById('rejectForm')
        .action =
        `/admin/mitra/${mitra.id}/reject`;
}

function closeDetail()
{
    document.getElementById('detailOverlay')
        .classList.remove('show');
}

function openDocument(url, title)
{
    document
        .getElementById('documentModal')
        .classList.add('show');

    document
        .getElementById('documentTitle')
        .innerText = title;

    const image =
        document.getElementById('documentImage');

    const frame =
        document.getElementById('documentFrame');

    const ext =
        url.split('.').pop().toLowerCase();

    if(['jpg','jpeg','png','webp'].includes(ext))
    {
        image.style.display = 'block';
        frame.style.display = 'none';

        image.src = url;
    }
    else
    {
        frame.style.display = 'block';
        image.style.display = 'none';

        frame.src = url;
    }
}

function closeDocument()
{
    document
        .getElementById('documentModal')
        .classList.remove('show');

    document
        .getElementById('documentFrame')
        .src = '';

    document
        .getElementById('documentImage')
        .src = '';
}

const documentModal =
    document.getElementById('documentModal');

documentModal.addEventListener('click', function(e){

    if(e.target === documentModal)
    {
        closeDocument();
    }

});

function closePreview()
{
    document.getElementById('previewModal')
        .classList.remove('show');

    document.getElementById('previewImage')
        .style.display = 'none';

    document.getElementById('previewPdf')
        .style.display = 'none';
}

function openRejectModal()
{
    document
        .getElementById('rejectModal')
        .classList.add('show');
}

function closeRejectModal()
{
    document
        .getElementById('rejectModal')
        .classList.remove('show');
}

// CLOSE OUTSIDE
document.getElementById('detailOverlay')
    .addEventListener('click', function(e){

        if(e.target.id === 'detailOverlay')
        {
            closeDetail();
        }

    });

</script>
@endpush