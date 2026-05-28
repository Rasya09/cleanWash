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
    @endphp
    <main class="main-content">
        <div class="content-header">
            <h1 class="page-title">Profil Saya</h1>
            <p class="page-desc">Kelola informasi akun Anda untuk pengalaman laundry yang lebih mudah.</p>
        </div>

        <div class="content-body">

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

                <button class="btn-edit">Edit Data</button>
            </section>

            <div class="right-column">
                <section class="address-section">
                    <div class="section-title-row">
                        <img src="{{ asset('assets/icons/Location Icon.png') }}" alt="" class="section-icon" />
                        <h2 class="section-title">Alamat Tersimpan</h2>
                    </div>

                    <div class="address-list">
                        <div class="address-item">
                            <img src="{{ asset('assets/icons/Location Icon.png') }}" alt="" class="pin-icon" />
                            <div>
                                <p class="address-name">Alamat Utama</p>
                                <p class="address-detail">Jl. Soekarno Hatta No.12, Bandar Lampung</p>
                            </div>
                        </div>

                        <div class="address-item">
                            <img src="{{ asset('assets/icons/Location Icon.png') }}" alt="" class="pin-icon" />
                            <div>
                                <p class="address-name">Alamat Kos / Rumah</p>
                                <p class="address-detail">Jl. Melati No. 5, Kedaton, Bandar Lampung</p>
                            </div>
                        </div>

                        {{-- <button class="btn-tambah">
                            <svg class="icon-plus" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M5 12H19"/>
                                <path d="M12 5V19"/>
                            </svg>
                            Tambah Alamat
                        </button> --}}
                    </div>
                </section>

                <section class="order-section">
                    <div class="section-title-row">
                        <img src="{{ asset('assets/icons/keranjang icon.png') }}" alt="" class="section-icon" />
                        <h2 class="section-title">Ringkasan Pesanan</h2>
                    </div>

                    <div class="order-summary">
                        <div class="order-stat">
                            <span class="stat-number">12</span>
                            <span class="stat-label">Pesanan</span>
                        </div>
                        <div class="order-stat">
                            <span class="stat-number">9</span>
                            <span class="stat-label">Selesai</span>
                        </div>
                        <div class="order-stat">
                            <span class="stat-number">3</span>
                            <span class="stat-label">Diproses</span>
                        </div>
                    </div>
                </section>
            </div>

        </div>
    </main>
@endauth
@endsection