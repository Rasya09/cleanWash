@extends('user.layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/pembayaran.css') }}">
@endsection

@section('content')
    <div class="page-title-section">
        <h2>CleanWash</h2>
        <h1>Pembayaran</h1>
    </div>

    <main class="container-main">
        <div class="left-column">
            <!-- Address Card -->
            <section class="address-card">
                <div class="address-icon-bg">
                    <img alt="Delivery"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuAbow42IL8rRS0xPACbHY4t9BEOceUHT-Bu5sNttZzDJZq2l7mE1drWT5exPT93CLlxEM49oGfxg35pVycKNCZW55LLKdFsZ92qQVlX_rW1wtqfhflvVY05g3XXflQHkxhEueDDEaEdizOxD6A3PRiZHtuBYUg4-HdGIPymVhgHtJebZHR3i4ut4L1Y-18TAw8-fjQB9Nx4tZCAOHS5ioz7ORUspMvyN4l5qwCWAgPVpxMT6bX_U5fr2qO3oiqrbrwcyWWgsBTwu8k" />
                </div>
                <div class="address-details">
                    <span class="material-symbols-outlined icon">location_on</span>
                    <div class="address-text">
                        <h3>Budi Santoso</h3>
                        <p>Jl. Gembong No. 7, Sukamulya, Kec. Cinambo, Kota Bandung, 40294</p>
                    </div>
                </div>
            </section>

            <!-- Rincian Layanan Card -->
            <section class="service-details-card">
                <h2>Rincian Layanan</h2>
                <div class="order-items">
                    <div class="item-row">
                        <div class="item-info">
                            <h4>Cuci Kiloan</h4>
                            <p>3 kg &bull; Rp 7.000/kg</p>
                        </div>
                        <span class="item-price">Rp 21.000</span>
                    </div>

                    <div class="item-row">
                        <div class="item-info">
                            <h4>Cuci Sepatu</h4>
                            <p>1 pasang</p>
                        </div>
                        <span class="item-price">Rp 25.000</span>
                    </div>

                    <div class="item-row instruksi-box">
                        <div class="item-info">
                            <h4>Instruksi:</h4>
                            <p>"Cuci dengan pewangi pakaian yang soft, jangan dijemur langsung kena matahari"</p>
                        </div>
                    </div>

                    <div class="summary-row">
                        <span>Subtotal</span>
                        <span>Rp 46.000</span>
                    </div>

                    <div class="summary-row">
                        <span>Biaya Antar Jemput</span>
                        <span>Rp 10.000</span>
                    </div>

                    <div class="summary-row"
                        style="border-bottom: 1px solid var(--border-color); padding-bottom: 16px;">
                        <span>Ekstra Layanan</span>
                        <span>Rp 5.000</span>
                    </div>

                    <div class="total-row">
                        <span>Total Pembayaran</span>
                        <span class="total-price">Rp 61.000</span>
                    </div>
                </div>
            </section>
        </div>

        <div class="right-column">
            <div class="payment-card">
                <div class="payment-methods">
                    <label class="method-option">
                        <input type="radio" name="payment_method" value="online" checked />
                        <div class="method-box">
                            <span class="material-symbols-outlined icon">credit_card</span>
                            <h4>Bayar Sekarang</h4>
                            <p>Pembayaran online instan</p>
                        </div>
                    </label>

                    <label class="method-option">
                        <input type="radio" name="payment_method" value="cod" />
                        <div class="method-box">
                            <span class="material-symbols-outlined icon">handshake</span>
                            <h4>Bayar Setelah Selesai</h4>
                            <p>COD / Bayar nanti</p>
                        </div>
                    </label>
                </div>

                <div class="action-section">
                    <button id="btn-lanjut" class="btn-primary" style="width: 100%; border: none; cursor: pointer; display: flex; align-items: center; justify-content: center; gap: 10px;">
                        <span id="btn-text">Lanjutkan Pembayaran</span>
                        <span class="material-symbols-outlined icon">arrow_forward</span>
                    </button>
                    <p class="security-note">Aman & Terenkripsi. 256-bit SSL Protection.</p>
                    <p class="terms-note">
                        Dengan melanjutkan, Anda menyetujui Ketentuan Layanan &amp; Kebijakan Privasi CleanWash.
                    </p>
                </div>

            </div>
        </div>
    </main>

    <div id="paymentModal" class="modal-overlay" style="display: none;">
        <main class="page-modal-wrapper">
            <div class="modal-container">
                <div class="modal-header">
                    <h2>Pilih Pembayaran Instan</h2>
                    <span class="material-symbols-outlined" id="closeModal" style="cursor:pointer;">close</span>
                </div>
                <div class="modal-content">
                    <div class="modal-section-v2">
                        <div class="section-header">
                            <span class="material-symbols-outlined icon">account_balance</span>
                            <h3>Transfer Bank</h3>
                        </div>
                        <div class="bank-card">
                            <div class="bank-card-content">
                                <div class="bank-card-top">
                                    <div>
                                        <p class="bank-label">Bank BCA</p>
                                        <p class="bank-number">123456789</p>
                                    </div>
                                    <button class="btn-copy">Copy</button>
                                </div>
                                <div class="bank-card-bottom">
                                    <p class="bank-label">Atas Nama</p>
                                    <p class="bank-name">Laundry MoLAUNDRY</p>
                                </div>
                            </div>
                        </div>
                        <p class="transfer-subtext">Silakan transfer sesuai nominal total hingga 3 digit terakhir.</p>
                    </div>
                    
                    <div class="modal-section-v2">
                        <div class="section-header">
                            <span class="material-symbols-outlined icon">qr_code_2</span>
                            <h3>QRIS</h3>
                        </div>
                        <div class="qris-card">
                            <div class="qris-img-bg">
                                <img alt="QRIS Code" src="../assets/img/QRIS.png" />
                            </div>
                            <div class="qris-text">
                                <p class="qris-name">Laundry MoLAUNDRY</p>
                                <p class="qris-nmid">NMID: ID1234567890</p>
                            </div>
                        </div>
                    </div>
 
                    <div class="modal-section-v2">
                        <div class="section-header">
                            <span class="material-symbols-outlined icon">cloud_upload</span>
                            <h3>Unggah Bukti Pembayaran</h3>
                        </div>
                        <label class="upload-dropzone" for="proof-upload">
                            <div class="upload-dropzone-content">
                                <span class="material-symbols-outlined icon-large">image</span>
                                <p class="upload-title">Klik untuk unggah atau seret file</p>
                                <p class="upload-subtitle">PNG, JPG atau PDF (Maks. 5MB)</p>
                            </div>
                            <input id="proof-upload" accept="image/*,application/pdf" type="file" style="display:none;" />
                        </label>
                    </div>
                </div>
 
                <div class="modal-footer-v2">
                    <button id="btn-konfirmasi" class="btn-primary-gradient">Konfirmasi Pembayaran</button>
                    <p class="security-text">Payment is secured and encrypted.</p>
                </div>
            </div>
        </main>
    </div>

        <!-- MODAL SUKSES: BAYAR SEKARANG -->
    <div id="successModal" class="modal-overlay">
        <div class="modal-container cod-modal-container">
            <div class="success-bg-shape-1"></div>
            <div class="success-bg-shape-2"></div>
 
            <button id="closeSuccessModal" class="cod-close-btn" aria-label="Tutup">
                <span class="material-symbols-outlined">close</span>
            </button>
 
            <div class="success-icon-wrapper">
                <div class="success-icon-bg">
                    <span class="material-symbols-outlined icon">check_circle</span>
                </div>
                <div class="success-ripple"></div>
            </div>
 
            <h1 class="success-title">Pembayaran Dikonfirmasi!</h1>
            <p class="success-desc">
                Terima kasih! Pembayaran Anda telah berhasil diverifikasi. Proses pencucian akan segera dimulai.
            </p>
 
            <div class="success-details">
                <div class="success-detail-card">
                    <div class="success-detail-icon">
                        <span class="material-symbols-outlined icon">payments</span>
                    </div>
                    <div class="success-detail-text">
                        <label>Status</label>
                        <p>Berhasil</p>
                    </div>
                </div>
            </div>
 
            <div class="success-actions">
                <a href="detailpesanan_sudahbayar.html" class="btn-primary-pill">Lihat Pesanan Saya</a>
            </div>
        </div>
    </div>

    <!-- bayar nanti popup -->
     <div id="codModal" class="modal-overlay">
        <div class="modal-container cod-modal-container">
            <div class="success-bg-shape-1"></div>
            <div class="success-bg-shape-2"></div>
 
            <button id="closeCODModal" class="cod-close-btn" aria-label="Tutup">
                <span class="material-symbols-outlined">close</span>
            </button>
 
            <div class="success-icon-wrapper">
                <div class="success-icon-bg">
                    <span class="material-symbols-outlined icon">check_circle</span>
                </div>
                <div class="success-ripple"></div>
            </div>
 
            <h1 class="success-title">Pesanan Dikonfirmasi!</h1>
            <p class="success-desc">
                Terima kasih! Pesanan Anda telah berhasil dibuat. Pembayaran dapat dilakukan setelah laundry selesai diproses.
            </p>
 
            <div class="success-details">
                <div class="success-detail-card">
                    <div class="success-detail-icon">
                        <span class="material-symbols-outlined icon">payments</span>
                    </div>
                    <div class="success-detail-text">
                        <label>Status</label>
                        <p>Bayar Setelah Selesai</p>
                    </div>
                </div>
            </div>
 
            <div class="success-actions">
                <a href="detailpesanan.html" class="btn-primary-pill">Lihat Pesanan Saya</a>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        const btnLanjut      = document.getElementById('btn-lanjut');
        const btnText        = document.getElementById('btn-text');
        const modalBayar     = document.getElementById('paymentModal');
        const modalCOD       = document.getElementById('codModal');
        const modalSukses    = document.getElementById('successModal');
        const closeModalBtn  = document.getElementById('closeModal');
        const closeCODBtn    = document.getElementById('closeCODModal');
        const closeSuccessBtn= document.getElementById('closeSuccessModal');
        const btnKonfirmasi  = document.getElementById('btn-konfirmasi');
        const radioButtons   = document.querySelectorAll('input[name="payment_method"]');
 
        // Ganti teks tombol berdasarkan pilihan radio
        radioButtons.forEach(radio => {
            radio.addEventListener('change', function() {
                btnText.innerText = this.value === 'online'
                    ? 'Lanjutkan Pembayaran'
                    : 'Lanjut Proses';
            });
        });
 
        // Klik tombol lanjut
        btnLanjut.addEventListener('click', function() {
            const selected = document.querySelector('input[name="payment_method"]:checked').value;
            if (selected === 'online') {
                modalBayar.classList.add('active');
            } else {
                modalCOD.classList.add('active');
            }
        });
 
        // Konfirmasi pembayaran → tutup modal bayar → buka modal sukses
        btnKonfirmasi.addEventListener('click', function() {
            modalBayar.classList.remove('active');
            setTimeout(() => {
                modalSukses.classList.add('active');
            }, 250);
        });
 
        // Tutup modal bayar sekarang
        closeModalBtn.addEventListener('click', () => modalBayar.classList.remove('active'));
 
        // Tutup modal sukses
        closeSuccessBtn.addEventListener('click', () => modalSukses.classList.remove('active'));
 
        // Tutup modal COD
        closeCODBtn.addEventListener('click', () => modalCOD.classList.remove('active'));
 
        // Klik overlay untuk tutup semua modal
        [modalBayar, modalCOD, modalSukses].forEach(modal => {
            modal.addEventListener('click', function(e) {
                if (e.target === this) this.classList.remove('active');
            });
        });
    </script>
@endpush