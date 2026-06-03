@extends('mitra.layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/mitra/tambah_layanan.css') }}">
    <style>
        /* CSS kustom untuk mereset cache browser secara instan */
        .tl-grid-2 {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 16px;
        }

        @media (max-width: 600px) {
            .tl-grid-2 {
                grid-template-columns: 1fr;
            }
        }

        .tl-input-group {
            display: flex;
            align-items: stretch;
            width: 100%;
        }

        .tl-input-group .tl-input {
            border-radius: 0 !important;
            flex: 1;
            margin: 0;
        }

        .tl-input-group > *:first-child {
            border-top-left-radius: 9px !important;
            border-bottom-left-radius: 9px !important;
        }

        .tl-input-group > *:last-child {
            border-top-right-radius: 9px !important;
            border-bottom-right-radius: 9px !important;
        }

        .tl-addon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 54px;
            border: 1px solid #e5e7eb;
            background: #f8fafc;
            color: #6b7280;
            font-weight: 700;
            padding: 0 14px;
            font-size: 13px;
            box-sizing: border-box;
        }

        .tl-addon + .tl-input,
        .tl-input + .tl-addon {
            margin-left: -1px;
        }

        input[type="time"].tl-input {
            padding: 10px 12px;
            font-family: inherit;
            font-size: 13.5px;
            height: 42px;
            box-sizing: border-box;
        }

        .tl-days {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 4px;
        }

        .tl-day-chip {
            position: relative;
            cursor: pointer;
            user-select: none;
        }

        .tl-day-chip input {
            position: absolute;
            opacity: 0;
            pointer-events: none;
        }

        .tl-day-chip span {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 52px;
            height: 38px;
            border: 1px solid #e5e7eb;
            border-radius: 10px;
            background: #ffffff;
            color: #4b5563;
            font-size: 13px;
            font-weight: 600;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.02);
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .tl-day-chip:hover span {
            border-color: #3b82f6;
            color: #2563eb;
            background: #f8fafc;
        }

        .tl-day-chip input:checked + span {
            border-color: #2563eb;
            background: #2563eb;
            color: #ffffff;
            box-shadow: 0 4px 10px rgba(37, 99, 235, 0.2);
        }

        .tl-toggle-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            padding: 16px 20px;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            background: #ffffff;
            margin-bottom: 12px;
            cursor: pointer;
            box-sizing: border-box;
            transition: all 0.2s ease;
        }

        .tl-toggle-row:hover {
            border-color: #3b82f6;
            background: #f9fafb;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.05);
        }

        .tl-toggle-row:has(input:checked) {
            border-color: #3b82f6;
            background: #eff6ff;
        }

        .tl-toggle-copy strong {
            display: block;
            margin-bottom: 3px;
            font-size: 13.5px;
            font-weight: 600;
            color: #1f2937;
        }

        .tl-toggle-copy span {
            color: #6b7280;
            font-size: 12px;
            font-weight: 400;
        }

        .tl-switch {
            position: relative;
            width: 48px;
            height: 28px;
            flex: 0 0 auto;
        }

        .tl-switch input {
            position: absolute;
            opacity: 0;
        }

        .tl-switch span {
            position: absolute;
            inset: 0;
            border-radius: 999px;
            background: #d1d5db;
            transition: background 0.2s;
        }

        .tl-switch span::after {
            content: "";
            position: absolute;
            top: 3px;
            left: 3px;
            width: 22px;
            height: 22px;
            border-radius: 50%;
            background: #ffffff;
            box-shadow: 0 2px 4px rgba(15, 23, 42, 0.15);
            transition: transform 0.2s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .tl-switch input:checked + span {
            background: #2563eb;
        }

        .tl-switch input:checked + span::after {
            transform: translateX(20px);
        }

        .tl-review-summary {
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
        }
    </style>
@endsection

@section('content')
{{-- Content: Tambah Layanan --}}

<div class="tl-page">

    {{-- Main Content --}}
    <div class="tl-layout">

        {{-- Stepper --}}
        <div class="tl-stepper" id="stepperContainer">
            <div class="tl-step tl-step--active" data-step="1">
                <div class="tl-step-circle tl-step-circle--active">1</div>
                <div class="tl-step-label">
                    <p class="tl-step-name">Informasi Dasar</p>
                    <p class="tl-step-desc">Nama dan kategori layanan</p>
                </div>
            </div>
            <div class="tl-step-line"></div>
            <div class="tl-step" data-step="2">
                <div class="tl-step-circle">2</div>
                <div class="tl-step-label">
                    <p class="tl-step-name">Detail Layanan</p>
                    <p class="tl-step-desc">Deskripsi dan estimasi</p>
                </div>
            </div>
            <div class="tl-step-line"></div>
            <div class="tl-step" data-step="3">
                <div class="tl-step-circle">3</div>
                <div class="tl-step-label">
                    <p class="tl-step-name">Harga & Durasi</p>
                    <p class="tl-step-desc">Harga dan waktu pengerjaan</p>
                </div>
            </div>
            <div class="tl-step-line"></div>
            <div class="tl-step" data-step="4">
                <div class="tl-step-circle">4</div>
                <div class="tl-step-label">
                    <p class="tl-step-name">Opsi Tambahan</p>
                    <p class="tl-step-desc">Variasi dan catatan (opsional)</p>
                </div>
            </div>
            <div class="tl-step-line"></div>
            <div class="tl-step" data-step="5">
                <div class="tl-step-circle">5</div>
                <div class="tl-step-label">
                    <p class="tl-step-name">Tinjau & Publikasikan</p>
                    <p class="tl-step-desc">Periksa kembali sebelum aktif</p>
                </div>
            </div>
        </div>

        {{-- Form Area --}}
        <div class="tl-form-area">
            <div class="tl-form-header">
                <h2 class="tl-form-title" id="formTitle">Informasi Dasar</h2>
                <p class="tl-form-desc" id="formDesc">Lengkapi informasi dasar layanan Anda.</p>
            </div>

            <form id="multiStepForm" action="#" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Step 1: Informasi Dasar --}}
                <div class="tl-step-content" id="stepContent1">
                    {{-- Nama Layanan --}}
                    <div class="tl-field">
                        <label class="tl-label">Nama Layanan <span class="tl-required">*</span></label>
                        <div class="tl-input-wrap">
                            <input
                                type="text"
                                name="nama_layanan"
                                class="tl-input"
                                placeholder="Contoh: Cuci Kiloan Regular"
                                maxlength="50"
                                id="namaLayanan"
                                oninput="updateCounter('namaLayanan','namaCounter',50)"
                                required
                            >
                            <span class="tl-counter" id="namaCounter">0/50</span>
                        </div>
                    </div>

                    {{-- Kategori Layanan --}}
                    <div class="tl-field">
                        <label class="tl-label">Kategori Layanan <span class="tl-required">*</span></label>
                        <div class="tl-select-wrap">
                            <select name="kategori_layanan" class="tl-select" id="kategoriLayanan" required>
                                <option value="" disabled selected>Pilih kategori layanan</option>
                                <option value="kiloan">Cuci Kiloan</option>
                                <option value="satuan">Cuci Satuan</option>
                                <option value="setrika">Setrika</option>
                                <option value="express">Express</option>
                                <option value="dry_clean">Dry Clean</option>
                            </select>
                            <svg class="tl-select-arrow" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#9ca3af" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg>
                        </div>
                    </div>

                    {{-- Subkategori --}}
                    <div class="tl-field">
                        <label class="tl-label">Subkategori <span class="tl-optional">(Opsional)</span></label>
                        <div class="tl-select-wrap">
                            <select name="subkategori" class="tl-select" id="subkategoriLayanan">
                                <option value="" disabled selected>Pilih subkategori</option>
                                <option value="reguler">Reguler</option>
                                <option value="express">Express</option>
                                <option value="super_express">Super Express</option>
                            </select>
                            <svg class="tl-select-arrow" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#9ca3af" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg>
                        </div>
                    </div>

                    {{-- Tag / Label --}}
                    <div class="tl-field">
                        <label class="tl-label">Tag / Label <span class="tl-optional">(Opsional)</span></label>
                        <div class="tl-input-wrap">
                            <input
                                type="text"
                                name="tag"
                                class="tl-input"
                                placeholder="Contoh: Cepat, Rapi, Wangi"
                                maxlength="50"
                                id="tagInput"
                                oninput="updateTagCounter()"
                            >
                            <span class="tl-counter" id="tagCounter">0/5</span>
                        </div>
                        <p class="tl-field-hint">Maksimal 5 tag. Dipisahkan dengan koma.</p>
                    </div>

                    {{-- Tips Box --}}
                    <div class="tl-tips-box">
                        <div class="tl-tips-icon">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#3b82f6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/>
                            </svg>
                        </div>
                        <div>
                            <p class="tl-tips-title">Tips</p>
                            <p class="tl-tips-text">Gunakan nama layanan yang jelas dan mudah dipahami pelanggan agar lebih mudah ditemukan.</p>
                        </div>
                    </div>
                </div>

                {{-- Step 2: Detail Layanan --}}
                <div class="tl-step-content" id="stepContent2" style="display: none;">
                    {{-- Deskripsi Layanan --}}
                    <div class="tl-field">
                        <label class="tl-label">Deskripsi Layanan <span class="tl-required">*</span></label>
                        <div class="tl-input-wrap">
                            <textarea
                                id="deskripsiLayanan"
                                name="deskripsi"
                                class="tl-input"
                                placeholder="Contoh: Layanan cuci kiloan menggunakan deterjen premium, bersih & wangi."
                                maxlength="300"
                                style="min-height: 112px; resize: vertical;"
                                oninput="updateCounter('deskripsiLayanan','deskripsiCounter',300)"
                                required
                            ></textarea>
                            <span class="tl-counter" id="deskripsiCounter">0/300</span>
                        </div>
                    </div>

                    {{-- Hari Operasional --}}
                    <div class="tl-field">
                        <label class="tl-label">Hari Operasional <span class="tl-required">*</span></label>
                        <div class="tl-days" id="dayOptions">
                            <label class="tl-day-chip"><input type="checkbox" name="hari[]" value="Sen" checked><span>Sen</span></label>
                            <label class="tl-day-chip"><input type="checkbox" name="hari[]" value="Sel" checked><span>Sel</span></label>
                            <label class="tl-day-chip"><input type="checkbox" name="hari[]" value="Rab" checked><span>Rab</span></label>
                            <label class="tl-day-chip"><input type="checkbox" name="hari[]" value="Kam" checked><span>Kam</span></label>
                            <label class="tl-day-chip"><input type="checkbox" name="hari[]" value="Jum" checked><span>Jum</span></label>
                            <label class="tl-day-chip"><input type="checkbox" name="hari[]" value="Sab"><span>Sab</span></label>
                            <label class="tl-day-chip"><input type="checkbox" name="hari[]" value="Min"><span>Min</span></label>
                        </div>
                    </div>

                    {{-- Jam Operasional --}}
                    <div class="tl-grid-2">
                        <div class="tl-field">
                            <label class="tl-label">Jam Buka <span class="tl-required">*</span></label>
                            <input type="time" name="jam_buka" class="tl-input" value="08:00" id="jamBuka" required>
                        </div>
                        <div class="tl-field">
                            <label class="tl-label">Jam Tutup <span class="tl-required">*</span></label>
                            <input type="time" name="jam_tutup" class="tl-input" value="18:00" id="jamTutup" required>
                        </div>
                    </div>
                </div>

                {{-- Step 3: Harga & Durasi --}}
                <div class="tl-step-content" id="stepContent3" style="display: none;">
                    <div class="tl-grid-2">
                        <div class="tl-field">
                            <label class="tl-label">Harga Dasar <span class="tl-required">*</span></label>
                            <div class="tl-input-group">
                                <span class="tl-addon">Rp</span>
                                <input type="number" name="harga_dasar" class="tl-input" placeholder="7000" min="0" step="500" value="7000" id="basePrice" required>
                            </div>
                        </div>
                        <div class="tl-field">
                            <label class="tl-label">Satuan Harga <span class="tl-required">*</span></label>
                            <div class="tl-select-wrap">
                                <select name="satuan" class="tl-select" id="priceUnit" required>
                                    <option value="kg" selected>per kg</option>
                                    <option value="item">per item</option>
                                    <option value="paket">per paket</option>
                                </select>
                                <svg class="tl-select-arrow" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#9ca3af" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg>
                            </div>
                        </div>
                    </div>

                    <div class="tl-grid-2">
                        <div class="tl-field">
                            <label class="tl-label">Minimal Order</label>
                            <div class="tl-input-group">
                                <input type="number" name="minimal_order" class="tl-input" placeholder="3" min="1" value="3" id="minimumOrder">
                                <span class="tl-addon" id="minimumUnit">kg</span>
                            </div>
                        </div>
                        <div class="tl-field">
                            <label class="tl-label">Estimasi Pengerjaan (Hari) <span class="tl-required">*</span></label>
                            <div class="tl-input-group">
                                <input type="number" name="estimasi" class="tl-input" placeholder="2" min="1" value="2" id="duration" required>
                                <span class="tl-addon">Hari</span>
                            </div>
                        </div>
                    </div>

                    {{-- Layanan Express --}}
                    <div class="tl-field">
                        <label class="tl-toggle-row">
                            <span class="tl-toggle-copy">
                                <strong>Layanan Express</strong>
                                <span>Harga paket akan ditambah dengan biaya tambahan</span>
                            </span>
                            <span class="tl-switch">
                                <input type="checkbox" name="express_tersedia" id="expressAvailable">
                                <span aria-hidden="true"></span>
                            </span>
                        </label>
                    </div>

                    {{-- Paket Tambahan --}}
                    <div class="tl-field">
                        <label class="tl-label">Paket / Harga Tambahan <span class="tl-optional">(Opsional)</span></label>
                        <div id="packageList" style="display:grid; gap:12px; margin-top:8px;">
                            <div style="display:flex; gap:12px; align-items:center;">
                                <input type="text" name="package_name[]" class="tl-input" placeholder="NAMA PAKET" value="Paket Hemat 5 kg">
                                <input type="number" name="package_price[]" class="tl-input" placeholder="HARGA (RP)" value="30000">
                                <button type="button" class="tl-btn-remove-pkg" onclick="this.parentElement.remove()" style="padding: 10px 14px; border: 1px solid #fca5a5; background: #fff; color: #ef4444; border-radius: 9px; cursor: pointer;">✕</button>
                            </div>
                            <div style="display:flex; gap:12px; align-items:center;">
                                <input type="text" name="package_name[]" class="tl-input" placeholder="NAMA PAKET" value="Paket Keluarga 10 kg">
                                <input type="number" name="package_price[]" class="tl-input" placeholder="HARGA (RP)" value="55000">
                                <button type="button" class="tl-btn-remove-pkg" onclick="this.parentElement.remove()" style="padding: 10px 14px; border: 1px solid #fca5a5; background: #fff; color: #ef4444; border-radius: 9px; cursor: pointer;">✕</button>
                            </div>
                        </div>
                        <button type="button" id="btnAddPackage" class="tl-btn-add-pkg" style="margin-top:12px; padding: 8px 16px; border: 1px dashed #3b82f6; background: #eff6ff; color: #2563eb; border-radius: 9px; cursor: pointer; font-size: 13px; font-weight: 600;">+ Tambah Paket</button>
                    </div>
                </div>

                {{-- Step 4: Opsi Tambahan --}}
                <div class="tl-step-content" id="stepContent4" style="display: none;">
                    <div class="tl-field">
                        <label class="tl-toggle-row">
                            <span class="tl-toggle-copy">
                                <strong>Layanan antar-jemput</strong>
                                <span>Tawarkan layanan pickup & delivery ke pelanggan.</span>
                            </span>
                            <span class="tl-switch">
                                <input type="checkbox" name="antar_jemput" id="pickupAvailable" checked>
                                <span aria-hidden="true"></span>
                            </span>
                        </label>
                    </div>

                    <div class="tl-field">
                        <label class="tl-toggle-row">
                            <span class="tl-toggle-copy">
                                <strong>Bisa Drop-Off</strong>
                                <span>Pelanggan akan langsung mengantar ke toko.</span>
                            </span>
                            <span class="tl-switch">
                                <input type="checkbox" name="dropoff" id="dropoffAvailable" checked>
                                <span aria-hidden="true"></span>
                            </span>
                        </label>
                    </div>

                    <div class="tl-field" id="jangkauanField">
                        <label class="tl-label">Jangkauan Pickup</label>
                        <div class="tl-input-wrap">
                            <input type="text" name="jangkauan" class="tl-input" placeholder="Contoh: Radius 3 km dari toko" value="Radius 3 km dari toko" id="jangkauanPickup">
                        </div>
                    </div>

                    <div class="tl-field">
                        <label class="tl-label">Catatan untuk Pelanggan <span class="tl-optional">(Opsional)</span></label>
                        <textarea name="catatan" class="tl-input" placeholder="Contoh: Pisahkan pakaian berwarna & putih. Tidak menerima pakaian dengan noda darah." id="catatanPelanggan" style="min-height: 100px; resize: vertical;"></textarea>
                    </div>
                    <div class="tl-field">
                        <label class="tl-label">Syarat & Ketentuan <span class="tl-optional">(Opsional)</span></label>
                        <textarea name="syarat" class="tl-input" placeholder="Contoh: Toko tidak bertanggung jawab atas kerusakan akibat bahan pakaian yang sensitif." id="syaratKetentuan" style="min-height: 100px; resize: vertical;"></textarea>
                    </div>
                </div>

                {{-- Step 5: Tinjau & Publikasikan --}}
                <div class="tl-step-content" id="stepContent5" style="display: none;">
                    <div class="tl-field">
                        <label class="tl-toggle-row">
                            <span class="tl-toggle-copy">
                                <strong>Terima Voucher & Promo</strong>
                                <span>Layanan ini dapat menggunakan voucher dari platform.</span>
                            </span>
                            <span class="tl-switch">
                                <input type="checkbox" name="terima_voucher" id="terimaVoucher" checked>
                                <span aria-hidden="true"></span>
                            </span>
                        </label>
                    </div>

                    <div class="tl-field">
                        <label class="tl-toggle-row">
                            <span class="tl-toggle-copy">
                                <strong>Tampilkan di Halaman Utama</strong>
                                <span>Rekomendasikan layanan ke lebih banyak pelanggan.</span>
                            </span>
                            <span class="tl-switch">
                                <input type="checkbox" name="tampil_utama" id="tampilUtama">
                                <span aria-hidden="true"></span>
                            </span>
                        </label>
                    </div>

                    <div class="tl-field">
                        <label class="tl-toggle-row">
                            <span class="tl-toggle-copy">
                                <strong>Status Aktif</strong>
                                <span>Layanan tampil di aplikasi pelanggan setelah dipublikasikan.</span>
                            </span>
                            <span class="tl-switch">
                                <input type="checkbox" name="status_aktif" id="serviceActive" checked>
                                <span aria-hidden="true"></span>
                            </span>
                        </label>
                    </div>

                    <div class="tl-field">
                        <label class="tl-toggle-row">
                            <span class="tl-toggle-copy">
                                <strong>Notifikasi Pesanan Baru</strong>
                                <span>Aktifkan notifikasi setiap ada pesanan layanan ini.</span>
                            </span>
                            <span class="tl-switch">
                                <input type="checkbox" name="notifikasi_baru" id="notifikasiBaru" checked>
                                <span aria-hidden="true"></span>
                            </span>
                        </label>
                    </div>

                    {{-- Review Summary --}}
                    <div class="tl-review-summary" style="margin-top: 20px; padding: 20px; background: #f8fafc; border: 1px solid #e5e7eb; border-radius: 12px;">
                        <h4 style="margin: 0 0 14px 0; font-size: 15px; font-weight: 700; color: #1f2937; border-bottom: 1px dashed #e5e7eb; padding-bottom: 8px;">Ringkasan Informasi</h4>
                        <ul style="list-style: none; padding: 0; margin: 0; display: grid; gap: 10px; font-size: 13px; color: #4b5563;">
                            <li style="display: flex; justify-content: space-between;"><span style="color: #6b7280;">Nama Layanan:</span> <strong id="summaryName" style="color: #1f2937;">-</strong></li>
                            <li style="display: flex; justify-content: space-between;"><span style="color: #6b7280;">Kategori:</span> <strong id="summaryCategory" style="color: #1f2937;">-</strong></li>
                            <li style="display: flex; justify-content: space-between;"><span style="color: #6b7280;">Subkategori:</span> <strong id="summarySubcategory" style="color: #1f2937;">-</strong></li>
                            <li style="display: flex; justify-content: space-between;"><span style="color: #6b7280;">Deskripsi:</span> <strong id="summaryDesc" style="color: #1f2937; max-width: 60%; text-align: right; font-weight: 500;">-</strong></li>
                            <li style="display: flex; justify-content: space-between;"><span style="color: #6b7280;">Hari Aktif:</span> <strong id="summaryDays" style="color: #1f2937;">-</strong></li>
                            <li style="display: flex; justify-content: space-between;"><span style="color: #6b7280;">Jam Operasional:</span> <strong id="summaryHours" style="color: #1f2937;">-</strong></li>
                            <li style="display: flex; justify-content: space-between;"><span style="color: #6b7280;">Harga Dasar:</span> <strong id="summaryPrice" style="color: #1f2937;">-</strong></li>
                            <li style="display: flex; justify-content: space-between;"><span style="color: #6b7280;">Minimal Order:</span> <strong id="summaryMinOrder" style="color: #1f2937;">-</strong></li>
                            <li style="display: flex; justify-content: space-between;"><span style="color: #6b7280;">Estimasi:</span> <strong id="summaryDuration" style="color: #1f2937;">-</strong></li>
                            <li style="display: flex; justify-content: space-between;"><span style="color: #6b7280;">Layanan Express:</span> <strong id="summaryExpress" style="color: #1f2937;">-</strong></li>
                            <li style="display: flex; justify-content: space-between; flex-direction: column; gap: 4px; border-top: 1px dashed #e5e7eb; padding-top: 8px;">
                                <span style="color: #6b7280;">Paket Tambahan:</span>
                                <div id="summaryPackages" style="font-weight: 600; color: #1f2937; margin-left: 8px;">-</div>
                            </li>
                            <li style="display: flex; justify-content: space-between; border-top: 1px dashed #e5e7eb; padding-top: 8px;"><span style="color: #6b7280;">Antar-Jemput:</span> <strong id="summaryPickup" style="color: #1f2937;">-</strong></li>
                            <li style="display: flex; justify-content: space-between;"><span style="color: #6b7280;">Bisa Drop-Off:</span> <strong id="summaryDropoff" style="color: #1f2937;">-</strong></li>
                            <li style="display: flex; justify-content: space-between;"><span style="color: #6b7280;">Jangkauan Pickup:</span> <strong id="summaryRange" style="color: #1f2937;">-</strong></li>
                        </ul>
                    </div>
                </div>
            </form>
        </div>

        {{-- Right Sidebar --}}
        <div class="tl-sidebar">

            {{-- Upload Foto --}}
            <div class="tl-sidebar-card">
                <p class="tl-sidebar-title">Foto Layanan <span class="tl-required">*</span></p>
                <p class="tl-sidebar-desc">Upload foto terbaik layanan Anda.</p>
                <div class="tl-upload-zone" id="uploadZone">
                    <input type="file" id="fotoUpload" accept="image/jpg,image/png" class="tl-upload-input" onchange="previewImage(event)">
                    <div class="tl-upload-content" id="uploadContent">
                        <div class="tl-upload-icon">
                            <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="#3b82f6" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/>
                                <line x1="12" y1="5" x2="12" y2="11"/><line x1="9" y1="8" x2="15" y2="8"/>
                            </svg>
                        </div>
                        <p class="tl-upload-cta">Klik untuk upload foto</p>
                        <p class="tl-upload-or">atau drag &amp; drop file di sini</p>
                        <p class="tl-upload-hint">Format: JPG, PNG (maks. 2MB)</p>
                        <p class="tl-upload-hint">Rasio yang disarankan 4:3 atau 1:1</p>
                    </div>
                    <img id="uploadPreview" class="tl-upload-preview" src="" alt="preview" style="display:none;">
                </div>
            </div>

            {{-- Tips Foto --}}
            <div class="tl-sidebar-card tl-sidebar-card--tips">
                <p class="tl-sidebar-title">Tips Foto Layanan</p>
                <ul class="tl-tips-list">
                    <li>
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#22c55e" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                        Gunakan foto yang jelas dan terang
                    </li>
                    <li>
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#22c55e" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                        Tampilkan hasil layanan dengan rapi
                    </li>
                    <li>
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#22c55e" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                        Hindari foto blur atau terlalu gelap
                    </li>
                    <li>
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#22c55e" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                        Foto yang baik meningkatkan kepercayaan pelanggan
                    </li>
                </ul>
            </div>

        </div>{{-- end sidebar --}}

    </div>{{-- end layout --}}

    {{-- Bottom Actions --}}
    <div class="tl-actions">
        <button type="button" class="tl-btn-batal" id="btnPrev">Batal</button>
        <button type="button" class="tl-btn-next" id="btnNext">
            Selanjutnya
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"/></svg>
        </button>
        <button type="submit" form="multiStepForm" class="tl-btn-next" id="btnSubmit" style="display: none; background: #16a34a;">
            Publikasikan Layanan
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 10 12"/></svg>
        </button>
    </div>

</div>{{-- end tl-page --}}

<script>
let currentStep = 1;
const totalSteps = 5;

const stepHeaders = {
    1: { title: "Informasi Dasar", desc: "Lengkapi informasi dasar layanan Anda." },
    2: { title: "Detail Layanan", desc: "Tentukan deskripsi lengkap, hari operasional, dan jam operasional." },
    3: { title: "Harga & Durasi", desc: "Atur harga dasar, satuan harga, minimal order, dan paket tambahan." },
    4: { title: "Opsi Tambahan", desc: "Konfigurasi ketersediaan layanan antar-jemput, drop-off, dan catatan pelanggan." },
    5: { title: "Tinjau & Publikasikan", desc: "Periksa kembali semua detail sebelum mengaktifkan layanan ini." }
};

function updateCounter(inputId, counterId, max) {
    const el = document.getElementById(inputId);
    if (!el) return;
    const val = el.value.length;
    document.getElementById(counterId).textContent = val + '/' + max;
}

function updateTagCounter() {
    const val = document.getElementById('tagInput').value;
    const tags = val.split(',').filter(t => t.trim() !== '').length;
    document.getElementById('tagCounter').textContent = Math.min(tags, 5) + '/5';
}

function previewImage(event) {
    const file = event.target.files[0];
    if (!file) return;
    const reader = new FileReader();
    reader.onload = function(e) {
        const preview = document.getElementById('uploadPreview');
        const content = document.getElementById('uploadContent');
        preview.src = e.target.result;
        preview.style.display = 'block';
        content.style.display = 'none';
    };
    reader.readAsDataURL(file);
}

function updateStepUI() {
    // Perbarui judul form
    document.getElementById("formTitle").textContent = stepHeaders[currentStep].title;
    document.getElementById("formDesc").textContent = stepHeaders[currentStep].desc;

    // Sembunyikan semua konten step, tampilkan yang aktif
    for (let i = 1; i <= totalSteps; i++) {
        const content = document.getElementById(`stepContent${i}`);
        if (content) {
            content.style.display = i === currentStep ? "block" : "none";
        }
    }

    // Perbarui Stepper lingkaran di samping kiri
    const steps = document.querySelectorAll("#stepperContainer .tl-step");
    steps.forEach((step, idx) => {
        const stepNum = idx + 1;
        const circle = step.querySelector(".tl-step-circle");
        
        if (stepNum === currentStep) {
            step.classList.add("tl-step--active");
            circle.classList.add("tl-step-circle--active");
        } else {
            step.classList.remove("tl-step--active");
            circle.classList.remove("tl-step-circle--active");
        }
    });

    // Perbarui Tombol Aksi di Bawah
    const btnPrev = document.getElementById("btnPrev");
    const btnNext = document.getElementById("btnNext");
    const btnSubmit = document.getElementById("btnSubmit");

    if (currentStep === 1) {
        btnPrev.textContent = "Batal";
        btnPrev.style.display = "inline-flex";
        btnNext.style.display = "inline-flex";
        btnSubmit.style.display = "none";
    } else {
        btnPrev.textContent = "Sebelumnya";
        btnPrev.style.display = "inline-flex";
        
        if (currentStep === totalSteps) {
            btnNext.style.display = "none";
            btnSubmit.style.display = "inline-flex";
        } else {
            btnNext.style.display = "inline-flex";
            btnSubmit.style.display = "none";
        }
    }

    // Jika masuk Step 5, perbarui ringkasan
    if (currentStep === 5) {
        updateSummary();
    }

    // Scroll ke bagian atas form secara halus pada mobile/tab
    const formArea = document.querySelector(".tl-form-area");
    if (formArea) {
        formArea.scrollIntoView({ behavior: "smooth", block: "start" });
    }
}

function updateSummary() {
    const nama = document.getElementById("namaLayanan").value || "-";
    const katVal = document.getElementById("kategoriLayanan").value;
    const kategori = katVal ? document.getElementById("kategoriLayanan").options[document.getElementById("kategoriLayanan").selectedIndex].text : "-";
    const subVal = document.getElementById("subkategoriLayanan").value;
    const subkategori = subVal ? document.getElementById("subkategoriLayanan").options[document.getElementById("subkategoriLayanan").selectedIndex].text : "-";
    const desc = document.getElementById("deskripsiLayanan").value || "-";

    const selectedDays = Array.from(document.querySelectorAll("#dayOptions input:checked")).map(el => el.value).join(", ") || "Tidak ada";
    const jamBuka = document.getElementById("jamBuka").value || "08:00";
    const jamTutup = document.getElementById("jamTutup").value || "18:00";

    const harga = document.getElementById("basePrice").value ? "Rp " + parseInt(document.getElementById("basePrice").value).toLocaleString("id-ID") : "-";
    const unit = document.getElementById("priceUnit").value || "kg";
    const minOrderVal = document.getElementById("minimumOrder").value || "0";
    const minOrder = `${minOrderVal} ${unit}`;
    const durasi = document.getElementById("duration").value ? document.getElementById("duration").value + " Hari" : "-";
    const express = document.getElementById("expressAvailable").checked ? "Tersedia" : "Tidak Tersedia";

    // Paket tambahan
    const packageItems = [];
    const packageNames = document.getElementsByName("package_name[]");
    const packagePrices = document.getElementsByName("package_price[]");
    for (let i = 0; i < packageNames.length; i++) {
        if (packageNames[i] && packageNames[i].value.trim()) {
            const pName = packageNames[i].value.trim();
            const pPrice = packagePrices[i] && packagePrices[i].value ? "Rp " + parseInt(packagePrices[i].value).toLocaleString("id-ID") : "Rp 0";
            packageItems.push(`${pName} (${pPrice})`);
        }
    }
    const packagesHtml = packageItems.length > 0 ? packageItems.map(item => `<div style="padding: 2px 0;">• ${item}</div>`).join("") : "Tidak ada";

    const pickup = document.getElementById("pickupAvailable").checked ? "Aktif" : "Nonaktif";
    const dropoff = document.getElementById("dropoffAvailable").checked ? "Aktif" : "Nonaktif";
    const jangkauan = document.getElementById("jangkauanPickup").value || "-";

    document.getElementById("summaryName").textContent = nama;
    document.getElementById("summaryCategory").textContent = kategori;
    document.getElementById("summarySubcategory").textContent = subkategori;
    document.getElementById("summaryDesc").textContent = desc;
    document.getElementById("summaryDays").textContent = selectedDays;
    document.getElementById("summaryHours").textContent = `${jamBuka} - ${jamTutup}`;
    document.getElementById("summaryPrice").textContent = `${harga} / ${unit}`;
    document.getElementById("summaryMinOrder").textContent = minOrder;
    document.getElementById("summaryDuration").textContent = durasi;
    document.getElementById("summaryExpress").textContent = express;
    document.getElementById("summaryPackages").innerHTML = packagesHtml;
    document.getElementById("summaryPickup").textContent = pickup;
    document.getElementById("summaryDropoff").textContent = dropoff;
    document.getElementById("summaryRange").textContent = jangkauan;
}

function validateCurrentStep() {
    // Validasi input wajib pada langkah saat ini
    const activeContent = document.getElementById(`stepContent${currentStep}`);
    if (!activeContent) return true;

    const requiredFields = activeContent.querySelectorAll("[required]");
    for (let field of requiredFields) {
        if (!field.value.trim()) {
            field.reportValidity();
            return false;
        }
    }
    return true;
}

// Event Listeners untuk Navigasi Stepper
document.getElementById("btnNext").addEventListener("click", () => {
    if (validateCurrentStep()) {
        if (currentStep < totalSteps) {
            currentStep++;
            updateStepUI();
        }
    }
});

document.getElementById("btnPrev").addEventListener("click", () => {
    if (currentStep === 1) {
        if (confirm("Apakah Anda yakin ingin membatalkan tambah layanan?")) {
            window.history.back();
        }
    } else {
        currentStep--;
        updateStepUI();
    }
});

// Tambah paket dinamis
document.getElementById("btnAddPackage").addEventListener("click", () => {
    const packageList = document.getElementById("packageList");
    const item = document.createElement("div");
    item.style.display = "flex";
    item.style.gap = "12px";
    item.style.alignItems = "center";
    item.innerHTML = `
        <input type="text" name="package_name[]" class="tl-input" placeholder="NAMA PAKET" required>
        <input type="number" name="package_price[]" class="tl-input" placeholder="HARGA (RP)" required>
        <button type="button" class="tl-btn-remove-pkg" onclick="this.parentElement.remove()" style="padding: 10px 14px; border: 1px solid #fca5a5; background: #fff; color: #ef4444; border-radius: 9px; cursor: pointer;">✕</button>
    `;
    packageList.appendChild(item);
});

// Update label minimal order unit secara real-time
document.getElementById("priceUnit").addEventListener("change", (e) => {
    document.getElementById("minimumUnit").textContent = e.target.value;
});

// Submit Form
document.getElementById("multiStepForm").addEventListener("submit", (e) => {
    e.preventDefault();
    if (validateCurrentStep()) {
        alert("Layanan berhasil dipublikasikan!");
        // Submit form atau redirect
    }
});

// Drag & Drop Foto
const zone = document.getElementById('uploadZone');
if (zone) {
    zone.addEventListener('dragover', e => { e.preventDefault(); zone.classList.add('tl-upload-zone--drag'); });
    zone.addEventListener('dragleave', () => zone.classList.remove('tl-upload-zone--drag'));
    zone.addEventListener('drop', e => {
        e.preventDefault();
        zone.classList.remove('tl-upload-zone--drag');
        const file = e.dataTransfer.files[0];
        if (file) {
            const input = document.getElementById('fotoUpload');
            const dt = new DataTransfer();
            dt.items.add(file);
            input.files = dt.files;
            previewImage({ target: input });
        }
    });
}

// Inisialisasi awal
updateStepUI();
</script>
@endsection

