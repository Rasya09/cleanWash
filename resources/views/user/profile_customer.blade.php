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

                <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input type="text" value="{{ Auth::user()->tanggal_lahir ?? '10/05/1995' }}" disabled/>
                </div>

                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <div class="gender-group">
                        <label class="radio-label">
                            <input type="radio" name="gender" value="laki" {{ (Auth::user()->gender ?? 'laki') == 'laki' ? 'checked' : '' }} disabled>
                            <span>Laki-Laki</span>
                        </label>
                        <label class="radio-label">
                            <input type="radio" name="gender" value="perempuan" {{ (Auth::user()->gender ?? '') == 'perempuan' ? 'checked' : '' }} disabled>
                            <span>Perempuan</span>
                        </label>
                    </div>
                </div>

                <button class="btn-edit">Edit Data</button>
            </section>

            {{-- ===== KOLOM KANAN (Alamat + Pesanan) ===== --}}
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

                        <button class="btn-tambah">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M5 12H19"/><path d="M12 5V19"/>
                            </svg>
                            Tambah Alamat
                        </button>
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

            {{-- ===== SIDEBAR KANAN ===== --}}
            <aside class="store-sidebar">

                @if(!$hasToko)
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
                    <a href="{{ route('toko.buat') }}" class="btn-buka-toko">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                        Buka Toko Sekarang
                    </a>
                </div>

                <div class="store-status-card">
                    <h4 class="store-status-title">Status Toko Anda</h4>
                    <p class="store-status-desc">Anda belum memiliki toko laundry.</p>
                    <a href="#" class="store-cara-kerja">Lihat Cara Kerja</a>
                </div>

                <div class="store-aksi-card">
                    <h4 class="store-aksi-title">Aksi Cepat</h4>
                    <a href="#" class="aksi-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#1a56e8" stroke-width="1.8"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg>
                        <span>Kelola Layanan</span>
                        <svg class="aksi-arrow" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#9aa5c4" stroke-width="2"><path d="M9 18l6-6-6-6"/></svg>
                    </a>
                    <a href="#" class="aksi-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#1a56e8" stroke-width="1.8"><path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"/></svg>
                        <span>Kelola Harga</span>
                        <svg class="aksi-arrow" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#9aa5c4" stroke-width="2"><path d="M9 18l6-6-6-6"/></svg>
                    </a>
                    <a href="#" class="aksi-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#1a56e8" stroke-width="1.8"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
                        <span>Kelola Jam Operasional</span>
                        <svg class="aksi-arrow" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#9aa5c4" stroke-width="2"><path d="M9 18l6-6-6-6"/></svg>
                    </a>
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
                            <p class="toko-info-name">{{ Auth::user()->toko->nama_toko ?? 'Laundry Bersih' }}</p>
                            <span class="badge-aktif">Aktif</span>
                            <p class="toko-info-address">{{ Auth::user()->toko->alamat ?? 'Jl. Melati No. 5, Kedaton, Bandar Lampung' }}</p>
                        </div>
                    </div>

                    <div class="toko-meta">
                        <div class="toko-meta-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="#f59e0b" stroke="#f59e0b" stroke-width="1"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                            <span class="meta-label">Rating Toko</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="#f59e0b" stroke="#f59e0b" stroke-width="1"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                            <span class="meta-value">4.8 <span class="meta-ulasan">(120 ulasan)</span></span>
                        </div>
                        <div class="toko-meta-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#1a56e8" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg>
                            <span class="meta-label">Bergabung sejak</span>
                            <span class="meta-value">12 Mar 2024</span>
                        </div>
                    </div>
                </div>

                <div class="toko-performa-card">
                    <h4 class="toko-performa-title">Performa Toko (30 Hari Terakhir)</h4>
                    <div class="performa-list">
                        <div class="performa-item">
                            <span class="performa-label">Total Pesanan</span>
                            <span class="performa-value">47</span>
                        </div>
                        <div class="performa-item">
                            <span class="performa-label">Pesanan Selesai</span>
                            <span class="performa-value">40</span>
                        </div>
                        <div class="performa-item">
                            <span class="performa-label">Tingkat Penyelesaian</span>
                            <span class="performa-value highlight-green">98%</span>
                        </div>
                        <div class="performa-item">
                            <span class="performa-label">Rating Rata-rata</span>
                            <span class="performa-value">
                                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="#f59e0b" stroke="#f59e0b" stroke-width="1"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                                4.8
                            </span>
                        </div>
                    </div>
                    <a href="{{ route('toko.kelola') }}" class="btn-kelola-toko">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 00.33 1.82l.06.06a2 2 0 010 2.83 2 2 0 01-2.83 0l-.06-.06a1.65 1.65 0 00-1.82-.33 1.65 1.65 0 00-1 1.51V21a2 2 0 01-4 0v-.09A1.65 1.65 0 009 19.4a1.65 1.65 0 00-1.82.33l-.06.06a2 2 0 01-2.83-2.83l.06-.06A1.65 1.65 0 004.68 15a1.65 1.65 0 00-1.51-1H3a2 2 0 010-4h.09A1.65 1.65 0 004.6 9a1.65 1.65 0 00-.33-1.82l-.06-.06a2 2 0 012.83-2.83l.06.06A1.65 1.65 0 009 4.68a1.65 1.65 0 001-1.51V3a2 2 0 014 0v.09a1.65 1.65 0 001 1.51 1.65 1.65 0 001.82-.33l.06-.06a2 2 0 012.83 2.83l-.06.06A1.65 1.65 0 0019.4 9a1.65 1.65 0 001.51 1H21a2 2 0 010 4h-.09a1.65 1.65 0 00-1.51 1z"/></svg>
                        Kelola Toko Saya
                    </a>
                </div>
                @endif

            </aside>

        </div>
    </main>
@endauth
@endsection