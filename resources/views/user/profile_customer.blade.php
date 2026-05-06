@extends('user.layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/ProfileCustomer.css') }}">
@endsection

@section('content')
    <div class="layout">
        <aside class="sidebar">
            <div class="profile-card">
                <div class="profile-banner"></div>
                <div class="profile-avatar">
                    <img src="../assets/img/Avatar.png" alt="Avatar" />
                </div>
                <div class="profile-info">
                    <h3 class="profile-name">Rizky Pratama</h3>
                    <!-- <p class="profile-email"><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="c4b6adbeafbd84a1bca5a9b4a8a1eaa7aba9">[email&#160;protected]</a></p> -->
                    <span class="profile-badge">Customer Aktif</span>
                </div>
                <button class="hamburger" onclick="toggleNav()" aria-label="Toggle menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>

            <nav class="sidebar-nav" id="sidebar-nav">
                <a href="ProfileCustomer.html" class="nav-item active">Profil Saya</a>
                <a href="alamatsaya.html" class="nav-item">Alamat Saya</a>
                <a href="keamanan-akun.html" class="nav-item">Keamanan Akun</a>
                <a href="Login.html" class="nav-item logout">Logout</a>
            </nav>
        </aside>

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
                        <input type="text" value="Rizky Pratama" disabled/>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" value="rizky@example.com" disabled/>
                    </div>

                    <div class="form-group">
                        <label>Nomor HP</label>
                        <input type="tel" value="+62 812-3456-7890" disabled/>
                    </div>

                    <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="text" value="10/05/1995" disabled/>
                    </div>

                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <div class="radio-group">
                            <label class="radio-label">
                                <input type="radio" name="gender" checked /> Laki-Laki
                            </label>
                            <label class="radio-label">
                                <input type="radio" name="gender" /> Perempuan
                            </label>
                        </div>
                    </div>

                    <button class="btn-edit">Edit Data</button>
                </section>

                <div class="right-column">
                    <section class="address-section">
                        <div class="section-title-row">
                            <img src="../assets/Icon/home icon.png" alt="" class="section-icon" />
                            <h2 class="section-title">Alamat Tersimpan</h2>
                        </div>

                        <div class="address-list">
                            <div class="address-item">
                                <img src="../assets/Icon/Location Icon.png" alt="" class="pin-icon" />
                                <div>
                                    <p class="address-name">Alamat Utama</p>
                                    <p class="address-detail">Jl. Soekarno Hatta No.12, Bandar Lampung</p>
                                </div>
                            </div>

                            <div class="address-item">
                                <img src="../assets/Icon/Location Icon.png" alt="" class="pin-icon" />
                                <div>
                                    <p class="address-name">Alamat Kos / Rumah</p>
                                    <p class="address-detail">Jl. Melati No. 5, Kedaton, Bandar Lampung</p>
                                </div>
                            </div>

                            <button class="btn-tambah">
                                <svg class="icon-plus" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M5 12H19"/>
                                    <path d="M12 5V19"/>
                                </svg>
                                Tambah Alamat
                            </button>
                        </div>
                    </section>

                    <section class="order-section">
                        <div class="section-title-row">
                            <img src="../assets/Icon/keranjang icon.png" alt="" class="section-icon" />
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

    </div>
@endsection