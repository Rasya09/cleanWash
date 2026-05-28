@extends('user.layouts.profile')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/alamat_saya.css') }}">
@endsection

@section('konten')
@auth
    @php
        $name = Auth::user()->name;

        $words = explode(' ', $name);

        if(count($words) >= 2){
            $initial = strtoupper(substr($words[0],0,1) . substr($words[1],0,1));
        } else {
            $initial = strtoupper(substr($name,0,2));
        }
    @endphp
    <main class="main-content">
        <div class="page-header">
            <div>
                <h1 class="page-title">Alamat Saya</h1>
                <p class="page-subtitle">Kelola semua alamat pickup dan pengiriman laundry Anda.</p>
            </div>
            <button class="btn-tambah" data-open="popup-alamat" onclick="openModal()">+ Tambah Alamat</button>
            
        </div>

        {{-- <div class="stats-row">
            <div class="stat-card">
                <div class="stat-icon red">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z"/><circle cx="12" cy="9" r="2.5"/></svg>
                </div>
                <div>
                    <p class="stat-number">2</p>
                    <p class="stat-label">Total Alamat</p>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon blue">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                </div>
                <div>
                    <p class="stat-number">1</p>
                    <p class="stat-label">Alamat Utama</p>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon teal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M8 22C8.55228 22 9 21.5523 9 21C9 20.4477 8.55228 20 8 20C7.44772 20 7 20.4477 7 21C7 21.5523 7.44772 22 8 22Z" stroke="#2ab5a0" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M19 22C19.5523 22 20 21.5523 20 21C20 20.4477 19.5523 20 19 20C18.4477 20 18 20.4477 18 21C18 21.5523 18.4477 22 19 22Z" stroke="#2ab5a0" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M2.05005 2.0498H4.05005L6.71005 14.4698C6.80763 14.9247 7.06072 15.3313 7.42576 15.6197C7.7908 15.908 8.24495 16.0602 8.71005 16.0498H18.49C18.9452 16.0491 19.3865 15.8931 19.7411 15.6076C20.0956 15.3222 20.3422 14.9243 20.4401 14.4798L22.09 7.0498H5.12005" stroke="#2ab5a0" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <div>
                    <p class="stat-number">12</p>
                    <p class="stat-label">Total Pesanan</p>
                </div>
            </div>
        </div> --}}

        <div class="search-filter-row">
            <div class="search-box">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#aaa" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                <input type="text" placeholder="Cari alamat..." />
            </div>
            <div class="filter-tabs">
                {{-- <button class="filter-tab active">Semua</button> --}}
                {{-- <button class="filter-tab">Utama</button> --}}
                {{-- <button class="filter-tab">Lainnya</button> --}}
            </div>
        </div>

        <div class="address-grid">
            @foreach($addresses as $address)
            <div class="address-card {{ $address->is_primary ? 'primary' : '' }}">
                <!-- HEADER -->
                <div class="address-card-header">
                    <div class="address-card-icon">
                        <svg width="22"
                            height="22"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="#6d93f2"
                            stroke-width="2">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                            <polyline points="9 22 9 12 15 12 15 22"/>
                        </svg>
                    </div>
                    <div class="address-card-info">
                        <!-- LABEL -->
                        <p class="address-card-title">
                            {{ $address->label }} - {{ $address->recipient_name }}
                            ( {{ $address->phone }} )
                        </p>
                        <!-- PRIMARY -->
                        @if($address->is_primary)
                            <span class="badge-utama ">
                                ★ Alamat Utama
                            </span>
                        @endif
                    </div>
                    <!-- ===================================== -->
                    <!-- ADDRESS CARD -->
                    <!-- ===================================== -->

                    <div class="dropdown">
                        <!-- BUTTON DOTS -->
                        <button type="button" class="btn-dots">
                            <svg width="18"
                                height="18"
                                viewBox="0 2 24 24"
                                fill="currentColor">
                                <circle cx="12" cy="5" r="1.5"/>
                                <circle cx="12" cy="12" r="1.5"/>
                                <circle cx="12" cy="19" r="1.5"/>
                            </svg>
                        </button>
                        <!-- DROPDOWN MENU -->
                        <div class="dropdown-menu">
                            <!-- UPDATE -->
                            <button type="button"
                                    class="dropdown-item btn-edit"
                                    data-id="{{ $address->id }}"
                                    data-update-url="{{ route('alamat.update', $address->id) }}"
                                    data-label="{{ $address->label }}"
                                    data-recipient="{{ $address->recipient_name }}"
                                    data-phone="{{ $address->phone }}"
                                    data-address="{{ $address->address }}"
                                    data-province="{{ $address->province }}"
                                    data-city="{{ $address->city }}"
                                    data-postal="{{ $address->postal_code }}">
                                Memperbarui
                            </button>
                            <!-- DELETE -->
                            <form action="{{ route('alamat.delete', $address->id) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="dropdown-item delete">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- ADDRESS -->
                <p class="address-street">
                    {{ $address->address }}
                </p>
                <!-- DETAIL -->
                <p class="address-detail-text">
                    {{ $address->province }},
                    {{ $address->city }},
                    {{ $address->postal_code }}
                </p>
                <!-- TAG -->
                <div class="address-tags">
                    <span class="address-tag">
                        {{ $address->city }}
                    </span>
                    <span class="address-tag">
                        {{ $address->postal_code }}
                    </span>
                </div>
                <!-- PRIMARY FOOTER -->
                @if($address->is_primary)
                <div class="address-footer-btn">
                    <svg width="14"
                        height="14"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2">
                        <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>
                    </svg>
                    Alamat Utama
                </div>
                @else
                    <form action="{{ route('alamat.primary', $address->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit"
                                class="address-footer-btn secondary">
                            <svg width="14"
                                height="14"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2">
                                <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>
                            </svg>
                            Jadikan Utama
                        </button>
                    </form>
                @endif
            </div>
            @endforeach
        </div>
    </main>

    <!-- OVERLAY MODAL -->
    <div class="overlay hidden" id="overlay">
        <div class="modal">
            @if ($errors->any())

                <div style="color:red">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif
            <form id="form-alamat" action="{{ route('alamat.store') }}"
                method="POST">
                @csrf
                <!-- ===================================== -->
                <!-- FORM -->
                <!-- ===================================== -->
                <div class="form-grid">
                    <!-- LABEL -->
                    <div class="form-group">
                        <label>
                            Kategori Alamat
                            <span class="req">*</span>
                        </label>
                        <input type="text"
                            name="label"
                            placeholder="Contoh: Rumah, Kantor, Kos..."
                            required />
                    </div>
                    <!-- RECIPIENT -->
                    <div class="form-group">
                        <label>
                            Penerima
                            <span class="req">*</span>
                        </label>
                        <input type="text"
                            name="recipient_name"
                            placeholder="Nama penerima..."
                            required />
                    </div>
                    <!-- ADDRESS -->
                    <div class="form-group full">
                        <label>
                            Alamat Lengkap
                            <span class="req">*</span>
                        </label>
                        <textarea name="address"
                                placeholder="Nama jalan, nomor rumah, RT/RW..."
                                required></textarea>
                    </div>
                    <!-- PROVINCE -->
                    <div class="form-group">
                        <label>
                            Kelurahan / Kecamatan
                            <span class="req">*</span>
                        </label>
                        <input type="text"
                            name="province"
                            placeholder="Contoh: Rajabasa" />
                    </div>
                    <!-- CITY -->
                    <div class="form-group">
                        <label>
                            Kota
                            <span class="req">*</span>
                        </label>
                        <input type="text"
                            name="city"
                            placeholder="Contoh: Bandar Lampung"
                            required />
                    </div>
                    <!-- POSTAL CODE -->
                    <div class="form-group">
                        <label>
                            Kode Pos
                            <span class="req">*</span>
                        </label>
                        <input type="text"
                            name="postal_code"
                            placeholder="Contoh: 35142" />
                    </div>
                    <!-- PHONE -->
                    <div class="form-group">
                        <label>
                            Nomor HP
                            <span class="req">*</span>
                        </label>
                        <input type="tel"
                            name="phone"
                            placeholder="+62 812-xxxx-xxxx" />
                    </div>
                </div>
                <!-- ===================================== -->
                <!-- GPS -->
                <!-- ===================================== -->
                <input type="hidden"
                    name="latitude"
                    id="latitude">
                <input type="hidden"
                    name="longitude"
                    id="longitude">
                <!-- ===================================== -->
                <!-- PRIMARY -->
                <!-- ===================================== -->
                <div class="toggle-row">
                    <div class="toggle-text">
                        <strong>
                            Jadikan Alamat Utama
                        </strong>
                        <span>
                            Alamat ini akan otomatis dipilih saat order
                        </span>
                    </div>
                    <label class="toggle">
                        <input type="checkbox"
                            name="is_primary"
                            value="1" />
                        <span class="toggle-track"></span>
                    </label>
                </div>
                <!-- ===================================== -->
                <!-- LOCATION BUTTON -->
                <!-- ===================================== -->
                <button type="button"
                        class="btn-location"
                        onclick="getLocation()">
                    Gunakan Lokasi Saya
                </button>
                <!-- ===================================== -->
                <!-- FOOTER -->
                <!-- ===================================== -->
                <div class="modal-footer">
                    <button type="button"
                            class="btn-batal"
                            id="btn-batal">
                        Batal
                    </button>
                    <button type="submit"
                            class="btn-simpan">
                        Simpan Alamat
                    </button>
                </div>
            </form>
        </div>
    </div>
@endauth
@endsection

@push('scripts')
<script>
const overlay = document.getElementById('overlay');
const formAlamat = document.getElementById('form-alamat');

/* ===================================== */
/* OPEN MODAL */
/* ===================================== */
function openModal()
{
    overlay.classList.remove('hidden');
    formAlamat.reset();
    formAlamat.action = "{{ route('alamat.store') }}";
    const oldMethod = document.getElementById('method-put');
    if(oldMethod){
        oldMethod.remove();
    }
}

/* ===================================== */
/* CLOSE MODAL */
/* ===================================== */
function closeModal()
{
    overlay.classList.add('hidden');
}

/* ===================================== */
/* BUTTON CANCEL */
/* ===================================== */
document.getElementById('btn-batal')
    .addEventListener('click', closeModal);

/* ===================================== */
/* CLOSE OUTSIDE */
/* ===================================== */
overlay.addEventListener('click', function(e){
    if(e.target === overlay){
        closeModal();
    }
});

/* ===================================== */
/* DROPDOWN */
/* ===================================== */
document.querySelectorAll('.btn-dots').forEach(button => {
    button.addEventListener('click', function(e){
        e.stopPropagation();
        const dropdown = this.closest('.dropdown');
        document.querySelectorAll('.dropdown')
            .forEach(d => {
                if(d !== dropdown){
                    d.classList.remove('active');
                }
            });
        dropdown.classList.toggle('active');
    });
});

/* ===================================== */
/* CLOSE DROPDOWN */
/* ===================================== */
document.addEventListener('click', () => {
    document.querySelectorAll('.dropdown')
        .forEach(d => d.classList.remove('active'));
});

/* ===================================== */
/* EDIT */
/* ===================================== */
document.querySelectorAll('.btn-edit').forEach(button => {
    button.addEventListener('click', function(){
        overlay.classList.remove('hidden');
        document.querySelector('[name="label"]').value =
            this.dataset.label;
        document.querySelector('[name="recipient_name"]').value =
            this.dataset.recipient;
        document.querySelector('[name="phone"]').value =
            this.dataset.phone;
        document.querySelector('[name="address"]').value =
            this.dataset.address;
        document.querySelector('[name="province"]').value =
            this.dataset.province;
        document.querySelector('[name="city"]').value =
            this.dataset.city;
        document.querySelector('[name="postal_code"]').value =
            this.dataset.postal;
        /* ===================================== */
        /* UPDATE ACTION */
        /* ===================================== */
        formAlamat.action =
            `/user/alamat/${this.dataset.id}/update`;
        /* ===================================== */
        /* REMOVE OLD METHOD */
        /* ===================================== */
        const oldMethod =
            document.getElementById('method-put');
        if(oldMethod){
            oldMethod.remove();
        }
        /* ===================================== */
        /* ADD METHOD PUT */
        /* ===================================== */
        formAlamat.insertAdjacentHTML(
            'beforeend',
            `
            <input type="hidden"
                name="_method"
                value="PUT"
                id="method-put">
            `
        );
    });
});

/* ===================================== */
/* GET LOCATION */
/* ===================================== */
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
            document.getElementById('latitude').value = lat;
            document.getElementById('longitude').value = lon;
            try
            {
                const response = await fetch(
                    `https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=${lat}&lon=${lon}`
                );
                const data = await response.json();
                document.querySelector('[name="address"]').value =
                    data.display_name || '';
                document.querySelector('[name="city"]').value =
                    data.address.city ||
                    data.address.town ||
                    data.address.county ||
                    '';
                document.querySelector('[name="province"]').value =
                    data.address.suburb ||
                    data.address.village ||
                    '';
                document.querySelector('[name="postal_code"]').value =
                    data.address.postcode || '';
                alert('Alamat berhasil diisi otomatis');
            }
            catch(error)
            {
                console.log(error);
                alert('Gagal mengambil alamat');
            }
        },
        function(error)
        {
            alert('Lokasi gagal diambil');
        }
    );
}
</script>
@endpush