@extends('user.layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/detail_laundry.css') }}">
@endsection

@section('content')
    <div class="detail-laundry">
        <div class="container">
            <!--- HERO SECTION --->
            <section class="hero">
                <div class="container-hero">
                    <div class="hero-left">
                        <h1>Adzril Laundry</h1>
                        <p class="rating">⭐⭐⭐⭐⭐ 4.9 <span class="kecil">(367 ulasan)</span></p>
                        <p class="alamat">Jl. Kebon Jeruk No. 2, Tangerang Selatan</p>
                        <p class="deskripsi">Adzril Laundry hadir untuk memberikan layanan cuci pakaian yang bersih, rapi, dan wangi. Dengan proses pencucian yang higienis serta tenaga kerja yang berpengalaman, kami siap membantu menjaga pakaian Anda tetap dalam kondisi terbaik setiap hari.</p>
                    </div>  
                    <div class="hero-right">
                        <img src="https://picsum.photos/200/150" class="main-img">

                        <div class="thumbnails">
                            <img src="https://picsum.photos/200/150">
                            <img src="https://picsum.photos/200/150">
                            <img src="https://picsum.photos/200/150">
                        </div>
                    </div>
                </div>
            </section>

            <!--- DETAIL SECTION --->
            <section class="detail">
                <div class="container-detail">
                    <div class="card-detail">
                        <h2>Adzril Laundry</h2>
                        <hr>
                        <p class="rating">⭐⭐⭐⭐⭐ 4.9 <span class="kecil">(367 ulasan)</span></p>
                        <p class="alamat">Jl. Kebon Jeruk No. 2, Tangerang Selatan</p>               
                        <p>Adzril Laundry hadir untuk memberikan layanan cuci pakaian yang bersih, rapi, dan wangi. Dengan proses pencucian yang higienis serta tenaga kerja yang berpengalaman, kami siap membantu menjaga pakaian Anda tetap dalam kondisi terbaik setiap hari.</p>  
                        <div class="box1">
                            <p>Cuci Kiloan - Rp 5.000/Kg</p>
                        </div>
                        <div class="box2">
                            <p>Cuci Setrika - Rp 7.000/Kg</p>
                        </div>
                        <div class="box3">
                            <p>Setrika Saja - Rp 4.000/Kg</p>
                        </div>
                    </div>

                    <div class="pesan-sekarang">
                        <h4>Mulai dari</h4>
                        <p><span class="biru">Rp 5.000</span>/Kg</p>
                        <h4>Buka - Tutup</h4>
                        <div class="jam-box">
                            <p><i class="fa-solid fa-clock"></i> 09:00 - 21:00</p>
                        </div>
                        <hr>
                        <h4>Estimasi Waktu</h4>
                        <div class="estimasi-box">
                            <div class="regular">
                                <p>Regular 2-3 hari</p>
                            </div>
                            <div class="express">
                                <p>Express</p>
                                <p class="kecil-expres">6 jam + biaya</p>
                            </div>
                        </div>
                        <div class="antar-jemput">
                            <p><i class="fa-solid fa-motorcycle"></i> Antar Jemput</p>
                        </div>
                        <a href="{{ route('pesanan') }}" class="btn-pesan">Pesan Sekarang</a>
                    </div>
                </div>
            </section>

            <!---RATING SECTION--->
            <section class="rating">
                <div class="container-rating">
                    <h2>Ulasan Customer</h2>
                    <div class="card-ulasan">

                        <div class="profile-user1">
                            <div class="profile1">
                                <i class="fa-solid fa-user"></i>
                            </div>
                            <div class="nama1">
                                <p>Adzril</p>
                                <p class="rating">⭐⭐⭐⭐⭐<span class="kecil">  5 jam lalu</span></p>
                            </div>
                            <p>Pelayanan sangat baik, cucian bersih, wangi, barang lengkap dan pelayan sangat ramah, puas banget dengan adzril laundry !!!!!!</p>
                        </div>

                        <hr>

                        <div class="profile-user2">
                            <div class="profile2">
                                <i class="fa-solid fa-user"></i>
                            </div>
                            <div class="nama2">
                                <p>Sukir</p>
                                <p class="rating">⭐⭐⭐⭐⭐<span class="kecil"> 2 hari lalu</span></p>
                            </div>
                            <p>Pelayanan sangat baik, cucian bersih, wangi, barang lengkap dan pelayan sangat ramah, puas banget dengan adzril laundry !!!!!!</p>
                        </div>

                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection