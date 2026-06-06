@extends('mitra.layouts.app')

@section('content')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('assets/css/mitra/gambar.css') }}">

<input type="file" id="inputFileAsli" accept="image/*" multiple style="display: none;">

<div class="super-container-promosi">
    
    <div class="sisi-galeri-kiri">
        <div class="kembali-link">
            <span class="panah-kembali">‹</span> Kembali
        </div>
        
        <div class="header-promosi-top">
            <div class="grup-teks-header">
                <h2>Gambar Toko</h2>
                <p class="sub-judul-app">Tampilkan toko laundry Anda dengan foto terbaik untuk menarik lebih banyak pelanggan.</p>
            </div>
            </div>

        <div class="card-putih-galeri">
            <div class="pembungkus-judul-section">
                <h3>Galeri Foto Toko</h3>
                <p class="deskripsi-section">Tambahkan foto untuk menampilkan suasana toko, fasilitas, dan layanan Anda. (Min. 2 foto, Maks. 4 foto)</p>
            </div>
            
            <div class="grid-foto-laundry" id="galleryGrid">
                <div class="kotak-foto-item dari-galeri">
                    <span class="badge-silang-hapus" onclick="hapusFoto(this)">×</span>
                    <div class="area-gambar-file" style="background-image: url('https://images.unsplash.com/photo-1545173168-9f1947e8017e?auto=format&fit=crop&w=400&q=80')"></div>
                    <div class="footer-kartu-foto">
                        <div class="grup-detail-kiri">
                            <span class="nama-file-foto">tampak-depan.jpg</span>
                            <span class="tag-label-aktif">Aktif</span>
                        </div>
                        <span class="titik-tiga-opsi">⋮</span>
                    </div>
                </div>

                <div class="kotak-foto-item dari-galeri">
                    <span class="badge-silang-hapus" onclick="hapusFoto(this)">×</span>
                    <div class="area-gambar-file" style="background-image: url('https://images.unsplash.com/photo-1517677208171-0bc6725a3e60?auto=format&fit=crop&w=400&q=80')"></div>
                    <div class="footer-kartu-foto">
                        <div class="grup-detail-kiri">
                            <span class="nama-file-foto">mesin-cuci.jpg</span>
                            <span class="tag-label-aktif">Aktif</span>
                        </div>
                        <span class="titik-tiga-opsi">⋮</span>
                    </div>
                </div>

                <div class="kotak-foto-item dari-galeri">
                    <span class="badge-silang-hapus" onclick="hapusFoto(this)">×</span>
                    <div class="area-gambar-file" style="background-image: url('https://images.unsplash.com/photo-1604335377466-a8c8291bb18e?auto=format&fit=crop&w=400&q=80')"></div>
                    <div class="footer-kartu-foto">
                        <div class="grup-detail-kiri">
                            <span class="nama-file-foto">area-setrika.jpg</span>
                            <span class="tag-label-aktif">Aktif</span>
                        </div>
                        <span class="titik-tiga-opsi">⋮</span>
                    </div>
                </div>

                <div class="kotak-foto-item dari-galeri">
                    <span class="badge-silang-hapus" onclick="hapusFoto(this)">×</span>
                    <div class="area-gambar-file" style="background-image: url('https://images.unsplash.com/photo-1582719508461-905c673771fd?auto=format&fit=crop&w=400&q=80')"></div>
                    <div class="footer-kartu-foto">
                        <div class="grup-detail-kiri">
                            <span class="nama-file-foto">resepsionis.jpg</span>
                            <span class="tag-label-aktif">Aktif</span>
                        </div>
                        <span class="titik-tiga-opsi">⋮</span>
                    </div>
                </div>

                <div class="kotak-tambah-placeholder" id="uploadSlot">
                    <div class="lingkaran-plus-icon">+</div>
                    <span class="label-tambah-foto">Tambah Foto</span>
                    <span class="sub-label-tambah">Maks. 4 foto</span>
                </div>
            </div>

            <div class="notifikasi-alert-biru">
                <span class="ikon-info-svg">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><line x1="12" y1="16" x2="12" y2="12"/><line x1="12" y1="8" x2="12.01" y2="8"/></svg>
                </span>
                <span class="teks-alert-info">Sistem mewajibkan minimal 2 foto aktif agar halaman profil toko Anda tidak kosong.</span>
            </div>
        </div>

        <div class="card-putih-tips">
            <h3>Tips Foto yang Menarik</h3>
            <div class="grid-layout-tips">
                <div class="item-tips-konten">
                    <div class="box-ikon-wrapper">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="2"><path d="M15 14c.2-1 .7-1.7 1.5-2.5 1-.9 1.5-2.2 1.5-3.5A5.5 5.5 0 0 0 12.5 2.5 5.5 5.5 0 0 0 7 8c0 1.3.5 2.6 1.5 3.5.8.8 1.3 1.5 1.5 2.5M9 18h6M10 22h4"/></svg>
                    </div>
                    <div class="teks-tips-wrapper">
                        <h4>Pencahayaan yang baik</h4>
                        <p>Gunakan pencahayaan alami atau ruangan yang terang.</p>
                    </div>
                </div>
                <div class="item-tips-konten">
                    <div class="box-ikon-wrapper">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="2"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>
                    </div>
                    <div class="teks-tips-wrapper">
                        <h4>Tampilkan area penting</h4>
                        <p>Foto bagian depan toko, mesin, area setrika, dan ruang tunggu.</p>
                    </div>
                </div>
                <div class="item-tips-konten">
                    <div class="box-ikon-wrapper">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="2"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                    </div>
                    <div class="teks-tips-wrapper">
                        <h4>Jaga kebersihan</h4>
                        <p>Pastikan toko terlihat bersih dan rapi untuk meningkatkan kepercayaan pelanggan.</p>
                    </div>
                </div>
                <div class="item-tips-konten">
                    <div class="box-ikon-wrapper">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="2"><rect x="3" y="3" width="17" height="17" rx="2" ry="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
                    </div>
                    <div class="teks-tips-wrapper">
                        <h4>Gunakan foto asli</h4>
                        <p>Foto asli toko Anda bersih dan rapi, bukan dari internet.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="sisi-preview-kanan">
        <h3>Preview di Halaman Toko</h3>
        <p class="deskripsi-preview-top">Berikut adalah tampilan toko Anda di aplikasi pelanggan.</p>

        <div class="bingkai-hp-mockup">
            <div class="kontainer-slider-banner">
                <span class="panah-slider slider-kiri" id="btnMundur">‹</span>
                <div class="view-slider-gambar" id="layarGambarSlider"></div>
                <span class="panah-slider slider-kanan" id="btnMaju">›</span>
                <span class="angka-indikator-slider" id="teksIndikator">1/4</span>
            </div>

            <div class="detail-badan-hp">
                <h2 class="nama-laundry-title">Laundry Bersih Jaya <span class="centang-verifikasi">✓</span></h2>
                
                <div class="baris-ulasan-rating">
                    <span class="bintang-emas">★</span>
                    <span class="nilai-skor">4.8</span>
                    <span class="jumlah-ulasan">(120 ulasan)</span>
                    <span class="titik-pemisah">•</span>
                    <span class="pin-lokasi-svg">
                        <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                    </span>
                    <span class="jarak-teks"><strong class="distance-bold">5 km</strong> dari lokasi Anda</span>
                </div>

                <div class="tab-menu-hp">
                    <span class="item-tab-hp active" onclick="gantiTabHp(event, 'panelInfo')">Info Toko</span>
                    <span class="item-tab-hp" onclick="gantiTabHp(event, 'panelLayanan')">Layanan</span>
                </div>

                <div class="konten-tab-hp-wrapper">
                    <div class="isi-panel-hp active" id="panelInfo">
                        <div class="seksi-galeri-mini-hp" style="margin-top: 10px;">
                            <h6>Galeri Toko</h6>
                            <div class="grid-galeri-mini" id="miniGalleryContainer"></div>
                        </div>
                    </div>
                </div>

                <button class="tombol-aplikasi-footer">Lihat Toko di Aplikasi</button>
            </div>
        </div>
    </div>

</div>
@endsection

@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        let indeksSekarang = 0;
        const layarGambarSlider = document.getElementById('layarGambarSlider');
        const teksIndikator = document.getElementById('teksIndikator');
        const btnMundur = document.getElementById('btnMundur');
        const btnMaju = document.getElementById('btnMaju');
        const uploadSlot = document.getElementById('uploadSlot');
        const galleryGrid = document.getElementById('galleryGrid');
        const inputFileAsli = document.getElementById('inputFileAsli');

        // 1. Fungsi Sinkronisasi Data & Validasi Batas Minimal 2 & Maksimal 4 Foto
        function updateSistemGaleri() {
            let daftarGambar = [];
            let semuaFotoCard = document.querySelectorAll('.kotak-foto-item.dari-galeri');
            
            semuaFotoCard.forEach(el => {
                let imgDiv = el.querySelector('.area-gambar-file');
                let url = imgDiv.style.backgroundImage.replace(/^url\(["']?/, '').replace(/["']?\)$/, '');
                daftarGambar.push(url);
            });

            // LOGIKA PROTEKSI MINIMAL 2 FOTO: Sembunyikan icon hapus (×) jika jumlah foto sisa 2 atau kurang
            semuaFotoCard.forEach(card => {
                let tombolSilang = card.querySelector('.badge-silang-hapus');
                if (tombolSilang) {
                    if (semuaFotoCard.length <= 2) {
                        tombolSilang.style.display = 'none'; 
                    } else {
                        tombolSilang.style.display = 'flex';
                    }
                }
            });

            // LOGIKA MAKSIMAL 4 FOTO: Sembunyikan slot tambah jika sudah mencapai 4 foto
            if (uploadSlot) {
                if (daftarGambar.length >= 4) {
                    uploadSlot.style.display = 'none';
                } else {
                    uploadSlot.style.display = 'flex';
                }
            }

            if (indeksSekarang >= daftarGambar.length) {
                indeksSekarang = Math.max(0, daftarGambar.length - 1);
            }

            // Tampilan Slider Utama HP
            if (layarGambarSlider && daftarGambar.length > 0) {
                layarGambarSlider.style.backgroundImage = `url('${daftarGambar[indeksSekarang]}')`;
                teksIndikator.innerText = `${indeksSekarang + 1}/${daftarGambar.length}`;
            } else if(layarGambarSlider) {
                layarGambarSlider.style.backgroundImage = 'none';
                teksIndikator.innerText = '0/0';
            }

            // Render Ulang Galeri Mini HP
            const miniGalleryContainer = document.getElementById('miniGalleryContainer');
            if (miniGalleryContainer) {
                miniGalleryContainer.innerHTML = '';
                daftarGambar.forEach((url, idx) => {
                    let item = document.createElement('div');
                    item.className = 'kotak-mini-img';
                    if (idx === indeksSekarang) {
                        item.style.border = '2px solid #2563eb';
                    }
                    item.style.backgroundImage = `url('${url}')`;
                    item.onclick = function() {
                        indeksSekarang = idx;
                        updateSistemGaleri();
                    };
                    miniGalleryContainer.appendChild(item);
                });
            }
        }

        // 2. Logika Unggah Berkas Baru via Klik Slot Kotak Plus (+)
        if (uploadSlot) {
            uploadSlot.addEventListener('click', function() {
                let jumlahSekarang = document.querySelectorAll('.kotak-foto-item.dari-galeri').length;
                if (jumlahSekarang >= 4) {
                    alert("Maksimal unggahan adalah 4 foto.");
                    return;
                }
                inputFileAsli.click();
            });
        }

        inputFileAsli.addEventListener('change', function(e) {
            const files = e.target.files;
            
            for (let i = 0; i < files.length; i++) {
                let jumlahSekarang = document.querySelectorAll('.kotak-foto-item.dari-galeri').length;
                if (jumlahSekarang >= 4) break;

                let file = files[i];
                let reader = new FileReader();

                reader.onload = function(event) {
                    let itemBaru = document.createElement('div');
                    itemBaru.className = 'kotak-foto-item dari-galeri';
                    itemBaru.innerHTML = `
                        <span class="badge-silang-hapus" onclick="hapusFoto(this)">×</span>
                        <div class="area-gambar-file" style="background-image: url('${event.target.result}')"></div>
                        <div class="footer-kartu-foto">
                            <div class="grup-detail-kiri">
                                <span class="nama-file-foto">${file.name}</span>
                                <span class="tag-label-aktif">Aktif</span>
                            </div>
                            <span class="titik-tiga-opsi">⋮</span>
                        </div>
                    `;
                    galleryGrid.insertBefore(itemBaru, uploadSlot);
                    indeksSekarang = document.querySelectorAll('.kotak-foto-item.dari-galeri').length - 1;
                    updateSistemGaleri();
                }
                reader.readAsDataURL(file);
            }
            inputFileAsli.value = ''; // Reset file input buffer
        });

        // 3. Logika Hapus Berkas dengan Proteksi Batas Minimum
        window.hapusFoto = function(element) {
            let jumlahSekarang = document.querySelectorAll('.kotak-foto-item.dari-galeri').length;
            
            if (jumlahSekarang <= 2) {
                alert("Gagal menghapus! Minimal harus ada 2 foto toko tersimpan.");
                return;
            }

            if(confirm("Apakah Anda yakin ingin menghapus foto ini?")) {
                element.closest('.kotak-foto-item').remove();
                updateSistemGaleri();
            }
        };

        // Event Navigasi Slider Mockup HP
        if (btnMaju && btnMundur) {
            btnMaju.addEventListener('click', function() {
                let total = document.querySelectorAll('.kotak-foto-item.dari-galeri').length;
                if(total > 0) {
                    indeksSekarang = (indeksSekarang + 1) % total;
                    updateSistemGaleri();
                }
            });

            btnMundur.addEventListener('click', function() {
                let total = document.querySelectorAll('.kotak-foto-item.dari-galeri').length;
                if(total > 0) {
                    indeksSekarang = (indeksSekarang - 1 + total) % total;
                    updateSistemGaleri();
                }
            });
        }

        window.gantiTabHp = function(e, targetId) {
            document.querySelectorAll('.item-tab-hp').forEach(t => t.classList.remove('active'));
            document.querySelectorAll('.isi-panel-hp').forEach(p => p.classList.remove('active'));
            e.currentTarget.classList.add('active');
            if(document.getElementById(targetId)) {
                document.getElementById(targetId).classList.add('active');
            }
        };

        // Inisialisasi awal sistem galeri
        updateSistemGaleri();
    });
</script>
@endpush