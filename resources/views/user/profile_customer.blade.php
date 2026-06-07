@extends('user.layouts.profile')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/ProfileCustomer.css') }}">
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

        // Cek apakah user sudah punya toko laundry
        // Sesuaikan dengan relasi/field di model User Anda
        $hasToko = Auth::user()->toko !== null; // atau sesuai relasi Anda
    @endphp
    <main class="main-content">
        <div class="content-header">
            <h1 class="page-title">Profil Saya</h1>
            @if($hasToko)
                <p class="page-desc">Kelola informasi akun dan toko laundry Anda.</p>
            @else
                <p class="page-desc">Kelola informasi akun Anda untuk pengalaman laundry yang lebih mudah.</p>
            @endif
        </div>

        <div class="content-body">

            {{-- ===== INFORMASI PRIBADI ===== --}}
            <section class="info-section">
                <h2 class="section-title">Informasi Pribadi</h2>

                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" value="{{ Auth::user()->name }}" disabled/>
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" value="{{ Auth::user()->email }}" disabled/>
                </div>

                <div class="form-group">
                    <label>Nomor HP</label>
                    <input type="tel" value="{{ Auth::user()->phone }}" disabled/>
                </div>

                <button class="btn-edit" onclick="openModal()">Edit Data</button>
            </section>

            {{-- ===== SIDEBAR KANAN ===== --}}
            <aside class="store-sidebar">

                @if(Auth::user()->role == 'user')
                    {{-- ===== STATE: BELUM PUNYA TOKO ===== --}}
                    <div class="store-cta-card">
                        <span class="badge-baru">Baru</span>
                        <div class="store-cta-top">
                            <div class="store-cta-text">
                                <p class="store-cta-sub">Punya Laundry?</p>
                                <h3 class="store-cta-title">Buka Toko Laundry<br>Seperti di Shopee!</h3>
                            </div>
                            <div class="store-cta-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none">
                                    <rect x="2" y="7" width="20" height="14" rx="2" fill="#dbeafe" stroke="#1a56e8" stroke-width="1.5"/>
                                    <path d="M8 7V5a4 4 0 018 0v2" stroke="#1a56e8" stroke-width="1.5" stroke-linecap="round"/>
                                    <path d="M8 12h8M8 16h5" stroke="#1a56e8" stroke-width="1.5" stroke-linecap="round"/>
                                </svg>
                            </div>
                        </div>
                        <ul class="store-cta-list">
                            <li>
                                <svg class="check-icon" xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#1a56e8" stroke-width="2.5"><path d="M20 6L9 17l-5-5"/></svg>
                                Punya toko sendiri
                            </li>
                            <li>
                                <svg class="check-icon" xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#1a56e8" stroke-width="2.5"><path d="M20 6L9 17l-5-5"/></svg>
                                Kelola layanan &amp; harga
                            </li>
                            <li>
                                <svg class="check-icon" xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#1a56e8" stroke-width="2.5"><path d="M20 6L9 17l-5-5"/></svg>
                                Terima pesanan dari pelanggan
                            </li>
                            <li>
                                <svg class="check-icon" xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#1a56e8" stroke-width="2.5"><path d="M20 6L9 17l-5-5"/></svg>
                                Tingkatkan omzet laundry
                            </li>
                        </ul>
                        <a href="{{ route('user.register.step1') }}" class="btn-buka-toko">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                            Buka Toko Sekarang
                        </a>
                    </div>

                    <div class="store-status-card">
                        <h4 class="store-status-title">Status Toko Anda</h4>
                        <p class="store-status-desc">Anda belum memiliki toko laundry.</p>
                    </div>

                @else
                {{-- ===== STATE: SUDAH PUNYA TOKO ===== --}}
                <div class="toko-info-card">
                    <h4 class="toko-info-title">Toko Laundry Saya</h4>

                    <div class="toko-info-box">
                        <div class="toko-info-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none">
                                <rect x="2" y="7" width="20" height="14" rx="2" fill="#dbeafe" stroke="#1a56e8" stroke-width="1.5"/>
                                <path d="M8 7V5a4 4 0 018 0v2" stroke="#1a56e8" stroke-width="1.5" stroke-linecap="round"/>
                                <path d="M8 12h8M8 16h5" stroke="#1a56e8" stroke-width="1.5" stroke-linecap="round"/>
                            </svg>
                        </div>
                        <div class="toko-info-detail">
                            <p class="toko-info-name">{{ $mitra->store_name }}</p>
                            <span class="badge-aktif">Aktif</span>
                            <p class="toko-info-address">{{ $mitra->address }}</p>
                        </div>
                    </div>

                    <a href="{{ route('mitra.dashboard') }}" class="btn-kelola-toko">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 00.33 1.82l.06.06a2 2 0 010 2.83 2 2 0 01-2.83 0l-.06-.06a1.65 1.65 0 00-1.82-.33 1.65 1.65 0 00-1 1.51V21a2 2 0 01-4 0v-.09A1.65 1.65 0 009 19.4a1.65 1.65 0 00-1.82.33l-.06.06a2 2 0 01-2.83-2.83l.06-.06A1.65 1.65 0 004.68 15a1.65 1.65 0 00-1.51-1H3a2 2 0 010-4h.09A1.65 1.65 0 004.6 9a1.65 1.65 0 00-.33-1.82l-.06-.06a2 2 0 012.83-2.83l.06.06A1.65 1.65 0 009 4.68a1.65 1.65 0 001-1.51V3a2 2 0 014 0v.09a1.65 1.65 0 001 1.51 1.65 1.65 0 001.82-.33l.06-.06a2 2 0 012.83 2.83l-.06.06A1.65 1.65 0 0019.4 9a1.65 1.65 0 001.51 1H21a2 2 0 010 4h-.09a1.65 1.65 0 00-1.51 1z"/></svg>
                        Kelola Toko Saya
                    </a>
                </div>
                @endif

            </aside>

        </div>
    </main>
@endauth
<div class="modal-overlay" id="editModal">
    <div class="modal-box">
        <div class="modal-header">
            <h3>Edit Profil</h3>
            <button
                type="button"
                class="btn-close"
                onclick="closeModal()">
                &times;
            </button>
        </div>
        <form
            action="{{ route('user.profile.update') }}"
            method="POST">
            @csrf
            <div class="form-group">
                <label>Nama Lengkap</label>
                <input
                    type="text"
                    name="name"
                    value="{{ Auth::user()->name }}"
                    required>
            </div>
            <div class="form-group">
                <label>Alamat Email</label>
                <input
                    type="text"
                    name="email"
                    value="{{ Auth::user()->email }}"
                    required>
            </div>
            <div class="form-group">
                <label>Nomor HP</label>
                <div class="phone-input">
                    <span>+62</span>
                    <input
                        type="text"
                        id="phone"
                        name="phone"
                        value="{{ substr(Auth::user()->phone,2) }}"
                        required>
                </div>
            </div>
            <div class="modal-footer">
                <button
                    type="button"
                    class="btn-cancel"
                    onclick="closeModal()">
                    Batal
                </button>
                <button
                    type="submit"
                    class="btn-save">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
    <script>

function openModal()
{
    document
        .getElementById('editModal')
        .style.display = 'flex';
}

function closeModal()
{
    document
        .getElementById('editModal')
        .style.display = 'none';
}

document
.getElementById('phone')
?.addEventListener('input', function(){

    this.value =
        this.value.replace(/\D/g,'');

    if(this.value.startsWith('0'))
    {
        this.value =
            this.value.substring(1);
    }

});

</script>
@endpush