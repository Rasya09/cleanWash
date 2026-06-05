@extends('user.layouts.profile')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/ProfileCustomer.css') }}">
@endsection

@section('konten')
@auth
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