@extends('mitra.layouts.app')

@section('content')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('assets/css/mitra/gambar.css') }}">

{{-- Form upload --}}
<form id="formUpload" action="{{ route('mitra.gambar.upload') }}" method="POST" enctype="multipart/form-data" style="display:none;">
    @csrf
    <input type="file" id="inputFileAsli" name="foto" accept="image/jpg,image/jpeg,image/png,image/webp">
</form>

{{-- Form hapus --}}
<form id="formHapus" action="{{ route('mitra.gambar.hapus') }}" method="POST" style="display:none;">
    @csrf
    @method('DELETE')
    <input type="hidden" name="index" id="indexHapus" value="">
</form>

{{-- Modal Konfirmasi Hapus --}}
<div id="modalHapus" style="display:none; position:fixed; inset:0; z-index:9999; background:rgba(0,0,0,0.4); align-items:center; justify-content:center;">
    <div style="background:#fff; border-radius:16px; padding:28px 24px; width:360px; box-shadow:0 20px 60px rgba(0,0,0,0.15); font-family:'Plus Jakarta Sans',sans-serif;">
        <div style="display:flex; align-items:center; gap:12px; margin-bottom:16px;">
            <div style="width:40px;height:40px;background:#fee2e2;border-radius:50%;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#ef4444" stroke-width="2.5">
                    <polyline points="3 6 5 6 21 6"/>
                    <path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/>
                    <path d="M10 11v6M14 11v6"/>
                    <path d="M9 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2"/>
                </svg>
            </div>
            <div>
                <h4 style="font-size:15px;font-weight:700;color:#111827;margin:0;">Hapus Foto</h4>
                <p style="font-size:13px;color:#6b7280;margin:4px 0 0;">Foto yang dihapus tidak dapat dikembalikan.</p>
            </div>
        </div>
        <div style="display:flex;gap:10px;margin-top:20px;">
            <button onclick="tutupModal()"
                style="flex:1;padding:10px;border:1px solid #e5e7eb;border-radius:8px;background:#fff;font-size:14px;font-weight:600;color:#374151;cursor:pointer;">
                Batal
            </button>
            <button onclick="konfirmasiHapus()"
                style="flex:1;padding:10px;border:none;border-radius:8px;background:#ef4444;font-size:14px;font-weight:600;color:#fff;cursor:pointer;">
                Hapus
            </button>
        </div>
    </div>
</div>

@php
    $photos     = $mitra->store_photos ?? [];
    $photoUrls  = $mitra->store_photo_urls;
    $photoCount = count($photos);
@endphp

{{-- Flash Messages --}}
@if(session('success'))
    <div id="flashSuccess" style="background:#d1fae5;color:#065f46;padding:12px 16px;border-radius:8px;margin-bottom:16px;font-size:14px;transition:opacity 0.5s ease;">
        ✓ {{ session('success') }}
    </div>
@endif
@if(session('error'))
    <div id="flashError" style="background:#fee2e2;color:#991b1b;padding:12px 16px;border-radius:8px;margin-bottom:16px;font-size:14px;transition:opacity 0.5s ease;">
        ✕ {{ session('error') }}
    </div>
@endif

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

                @foreach($photos as $index => $photo)
                <div class="kotak-foto-item dari-galeri">
                    @if($photoCount > 2)
                    <span class="badge-silang-hapus" onclick="hapusFoto({{ $index }})">×</span>
                    @endif
                    <div class="area-gambar-file"
                         style="background-image: url('{{ asset('storage/' . $photo) }}')">
                    </div>
                    <div class="footer-kartu-foto">
                        <div class="grup-detail-kiri">
                            <span class="nama-file-foto">{{ basename($photo) }}</span>
                            <span class="tag-label-aktif">Aktif</span>
                        </div>
                        <span class="titik-tiga-opsi">⋮</span>
                    </div>
                </div>
                @endforeach

                @if($photoCount < 4)
                <div class="kotak-tambah-placeholder" id="uploadSlot"
                     onclick="document.getElementById('inputFileAsli').click()">
                    <div class="lingkaran-plus-icon">+</div>
                    <span class="label-tambah-foto">Tambah Foto</span>
                    <span class="sub-label-tambah">Maks. 4 foto</span>
                </div>
                @endif

            </div>

            <div class="notifikasi-alert-biru">
                <span class="ikon-info-svg">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                        <circle cx="12" cy="12" r="10"/>
                        <line x1="12" y1="16" x2="12" y2="12"/>
                        <line x1="12" y1="8" x2="12.01" y2="8"/>
                    </svg>
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

    {{-- PREVIEW KANAN --}}
    <div class="sisi-preview-kanan">
        <h3>Preview di Halaman Toko</h3>
        <p class="deskripsi-preview-top">Berikut adalah tampilan toko Anda di aplikasi pelanggan.</p>

        <div class="bingkai-hp-mockup">
            <div class="kontainer-slider-banner">
                <span class="panah-slider slider-kiri" id="btnMundur">‹</span>
                <div class="view-slider-gambar" id="layarGambarSlider"></div>
                <span class="panah-slider slider-kanan" id="btnMaju">›</span>
                <span class="angka-indikator-slider" id="teksIndikator">
                    {{ $photoCount > 0 ? '1/' . $photoCount : '0/0' }}
                </span>
            </div>

            <div class="detail-badan-hp">
                <h2 class="nama-laundry-title">
                    {{ $mitra->store_name }}
                    <span class="centang-verifikasi">✓</span>
                </h2>

                <div class="baris-ulasan-rating">
                    <span class="bintang-emas">★</span>
                    <span class="nilai-skor">{{ number_format($mitra->average_rating, 1) }}</span>
                    <span class="jumlah-ulasan">({{ $mitra->reviews()->count() }} ulasan)</span>
                </div>

                <div class="tab-menu-hp">
                    <span class="item-tab-hp active" onclick="gantiTabHp(event, 'panelInfo')">Info Toko</span>
                    <span class="item-tab-hp" onclick="gantiTabHp(event, 'panelLayanan')">Layanan</span>
                </div>

                <div class="konten-tab-hp-wrapper">
                    <div class="isi-panel-hp active" id="panelInfo">
                        <div class="seksi-galeri-mini-hp" style="margin-top:10px;">
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
    const daftarGambarDB = @json($photoUrls);
    let indexYangAkanDihapus = null;

    document.addEventListener("DOMContentLoaded", function () {
        let indeksSekarang = 0;
        const layarGambarSlider = document.getElementById('layarGambarSlider');
        const teksIndikator     = document.getElementById('teksIndikator');
        const inputFileAsli     = document.getElementById('inputFileAsli');

        // Auto-dismiss flash messages
        ['flashSuccess', 'flashError'].forEach(function(id) {
            const el = document.getElementById(id);
            if (el) {
                setTimeout(function() {
                    el.style.opacity = '0';
                    setTimeout(function() { el.remove(); }, 500);
                }, 2500);
            }
        });

        function updatePreview() {
            if (!layarGambarSlider) return;
            if (daftarGambarDB.length > 0) {
                layarGambarSlider.style.backgroundImage = `url('${daftarGambarDB[indeksSekarang]}')`;
                teksIndikator.innerText = `${indeksSekarang + 1}/${daftarGambarDB.length}`;
            } else {
                layarGambarSlider.style.backgroundImage = 'none';
                teksIndikator.innerText = '0/0';
            }

            const mini = document.getElementById('miniGalleryContainer');
            if (mini) {
                mini.innerHTML = '';
                daftarGambarDB.forEach((url, idx) => {
                    let item = document.createElement('div');
                    item.className = 'kotak-mini-img';
                    item.style.backgroundImage = `url('${url}')`;
                    if (idx === indeksSekarang) item.style.border = '2px solid #2563eb';
                    item.onclick = () => { indeksSekarang = idx; updatePreview(); };
                    mini.appendChild(item);
                });
            }
        }

        if (inputFileAsli) {
            inputFileAsli.addEventListener('change', function () {
                if (this.files.length > 0) {
                    document.getElementById('formUpload').submit();
                }
            });
        }

        document.getElementById('btnMaju')?.addEventListener('click', function () {
            if (daftarGambarDB.length > 0) {
                indeksSekarang = (indeksSekarang + 1) % daftarGambarDB.length;
                updatePreview();
            }
        });

        document.getElementById('btnMundur')?.addEventListener('click', function () {
            if (daftarGambarDB.length > 0) {
                indeksSekarang = (indeksSekarang - 1 + daftarGambarDB.length) % daftarGambarDB.length;
                updatePreview();
            }
        });

        window.gantiTabHp = function (e, targetId) {
            document.querySelectorAll('.item-tab-hp').forEach(t => t.classList.remove('active'));
            document.querySelectorAll('.isi-panel-hp').forEach(p => p.classList.remove('active'));
            e.currentTarget.classList.add('active');
            const panel = document.getElementById(targetId);
            if (panel) panel.classList.add('active');
        };

        // Buka modal hapus
        window.hapusFoto = function (index) {
            indexYangAkanDihapus = index;
            const modal = document.getElementById('modalHapus');
            modal.style.display = 'flex';
        };

        // Tutup modal
        window.tutupModal = function () {
            document.getElementById('modalHapus').style.display = 'none';
            indexYangAkanDihapus = null;
        };

        // Konfirmasi hapus → submit form
        window.konfirmasiHapus = function () {
            if (indexYangAkanDihapus === null) return;
            document.getElementById('indexHapus').value = indexYangAkanDihapus;
            document.getElementById('formHapus').submit();
        };

        // Klik di luar modal → tutup
        document.getElementById('modalHapus').addEventListener('click', function (e) {
            if (e.target === this) tutupModal();
        });

        updatePreview();
    });
</script>
@endpush