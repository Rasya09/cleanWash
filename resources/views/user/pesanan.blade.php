@extends('user.layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/pesanan.css') }}">
@endsection

@section('content')
<main class="container page-content">
    <!-- Store Info -->
    <section class="store-info card">
        <img class="store-img" src="{{ asset('assets/images/moLaundry.png') }}" alt="MoLAUNDRY"
            onerror="this.src='../../assets/img/unnamed-2-1.png';">
        <div class="store-details">
            <h2>Laundry MoLAUNDRY</h2>
            <div class="store-meta">
                <span class="rating">⭐ 4.8</span>
                <span class="distance">📍 1.2 km</span>
            </div>
            <p class="address">Jl. Soekarno Hatta, Bandung</p>
        </div>
    </section>

    <!-- Order Form Group as a HTML Form -->
    <form id="mainOrderForm" class="order-form card">
        <div class="layanan-section" id="layanan-container">
            <div class="layanan-group group-1">
                <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom: 16px;">
                    <h3 style="margin:0;">Pilih Layanan</h3>
                    <button type="button" class="btn-remove-layanan" title="Hapus Pesanan" aria-label="Hapus Pesanan">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                            <line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line>
                        </svg>
                    </button>
                </div>
                <div class="layanan-options main-layanan-options">
                    <button type="button" class="layanan-btn">Cuci Kiloan</button>
                    <button type="button" class="layanan-btn">Cuci Satuan</button>
                    <button type="button" class="layanan-btn">Cuci Karpet</button>
                    <button type="button" class="layanan-btn">Cuci Tas</button>
                    <button type="button" class="layanan-btn">Cuci Sepatu</button>
                </div>
                <div class="paket-section" style="margin-top: 16px; display: none;">
                    <h3 style="font-size: 16px; margin-bottom: 12px; color: #444;">Pilih Paket</h3>
                    <div class="layanan-options">
                        <button type="button" class="layanan-btn">Cuci Saja</button>
                        <button type="button" class="layanan-btn">Cuci + Setrika</button>
                        <button type="button" class="layanan-btn">Express</button>
                    </div>
                </div>
            </div>
            
            <div class="tambah-pesanan" id="add-order-container">
                <button type="button" class="btn-text" id="btn-tambah-pesanan">+ Tambah Pesanan</button>
            </div>
        </div>

        <!-- Upload Foto Native -->
        <div class="upload-section">
            <div class="upload-header">
                <h3>Foto Barang</h3>
                <p>Upload foto pakaian/barang yang akan dicuci</p>
            </div>
            <div class="upload-box" id="upload-box" style="padding: 20px; cursor: pointer;">
                <span id="upload-text" style="display:block; margin-bottom: 8px;">Klik di sini untuk upload foto</span>
                <span class="upload-hint" id="upload-hint" style="display:block; font-size:12px; color:#666;">JPG, PNG maksimal 5MB</span>
                <input type="file" id="foto-barang" name="foto_barang" accept="image/jpeg, image/png" style="display:none;">
            </div>
        </div>

        <!-- Antar Jemput Detail Native -->
        <div class="datetime-section">
            <div class="datetime-group">
                <label for="date-input">Pilih Tanggal</label>
                <div class="datetime-input">
                    <input type="date" name="tanggal" id="date-input" value="2026-02-20" style="border:none; outline:none; font-size:15px; width:100%; color:var(--text-main); font-family:inherit; background:transparent;">
                </div>
            </div>
            <div class="datetime-group">
                <label for="time-input">Pilih Waktu</label>
                <div class="datetime-input">
                    <input type="time" name="waktu" id="time-input" value="09:00" style="border:none; outline:none; font-size:15px; width:100%; color:var(--text-main); font-family:inherit; background:transparent;">
                </div>
            </div>
        </div>

        <button type="submit" class="btn-primary w-100 mt-20" style="box-sizing:border-box;">Lanjutkan Pesanan</button>
    </form>

    <div id="orderModal" class="modal-overlay">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Ringkasan Pesanan</h2>
                <button id="closeModal" class="close-btn">&times;</button>
            </div>
            
            <div class="modal-body">
                <h3 class="laundry-name">Laundry MoLaundry</h3>
                
                <div class="order-details">
                    <div class="detail-row">
                        <span class="detail-label">Layanan:</span>
                        <!-- Static values since JS dependency is removed -->
                        <span class="detail-value" id="summary-layanan">Cuci Kiloan</span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Paket:</span>
                        <span class="detail-value" id="summary-paket">Cuci + Setrika</span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Jadwal:</span>
                        <span class="detail-value" id="summary-jadwal">20 Feb, 09.00</span>
                    </div>
                </div>

                <div class="price-estimate">
                    <span class="info-icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
                    </span>
                    <span>Mulai dari <strong>Rp7.000/kg</strong></span>
                </div>
                
                <div class="note-section">
                    <label for="catatan">Catatan Tambahan</label>
                    <textarea id="catatan" placeholder="Contoh: pisahkan pakaian putih, jangan gunakan pewangi, dll."></textarea>
                </div>

                <p class="disclaimer-text">
                    Total akhir akan dikonfirmasi setelah laundry ditimbang oleh mitra laundry.
                </p>
            </div>

            <div class="modal-footer">
                <a href="{{ route('detail_pesanan') }}" class="btn-primary w-100" style="display:inline-block; text-decoration:none; box-sizing:border-box;">Lanjutkan Pemesanan</a>
            </div>
        </div>
    </div>
</main>
@endsection

@push('scripts')
    <script>
        const form = document.getElementById('mainOrderForm');
        const modal = document.getElementById('orderModal');
        const closeModal = document.getElementById('closeModal');

        const layananButtons = document.querySelectorAll('.layanan-btn');
        const paketButtons = document.querySelectorAll('.paket-btn');

        const uploadBox = document.getElementById('upload-box');
        const fileInput = document.getElementById('foto-barang');
        const uploadText = document.getElementById('upload-text');

        let selectedLayanan = "Cuci Kiloan";
        let selectedPaket = "Cuci Saja";

        // Pilih layanan
        layananButtons.forEach(btn => {
            btn.addEventListener('click', () => {
                layananButtons.forEach(b => b.classList.remove('active'));
                btn.classList.add('active');
                selectedLayanan = btn.innerText;
            });
        });

        // Pilih paket
        paketButtons.forEach(btn => {
            btn.addEventListener('click', () => {
                paketButtons.forEach(b => b.classList.remove('active'));
                btn.classList.add('active');
                selectedPaket = btn.innerText;
            });
        });

        // Upload file
        uploadBox.addEventListener('click', () => {
            fileInput.click();
        });

        fileInput.addEventListener('change', () => {
            if (fileInput.files.length > 0) {
                uploadText.innerText = fileInput.files[0].name;
            }
        });

        // Submit form -> tampilkan modal
        form.addEventListener('submit', (e) => {
            e.preventDefault();

            const tanggal = document.getElementById('date-input').value;
            const waktu = document.getElementById('time-input').value;

            document.getElementById('summary-layanan').innerText = selectedLayanan;
            document.getElementById('summary-paket').innerText = selectedPaket;
            document.getElementById('summary-jadwal').innerText = `${tanggal}, ${waktu}`;

            modal.style.display = 'flex';
        });

        // Tutup modal
        closeModal.addEventListener('click', () => {
            modal.style.display = 'none';
        });

        // Klik luar modal = tutup
        window.addEventListener('click', (e) => {
            if (e.target === modal) {
                modal.style.display = 'none';
            }
        });
    </script>
@endpush