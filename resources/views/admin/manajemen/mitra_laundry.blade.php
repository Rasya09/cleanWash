@extends('admin.layouts.app')

@section('css')
  <link rel="stylesheet" href="{{ asset('assets/css/admin/mitra_laundry.css') }}">
    
@endsection

@section('content')
    <!-- Overlay backdrop untuk sidebar mobile -->

    <div class="app">
    <!-- BAGIAN KONTEN UTAMA (Kanan) -->
    <main class="main">

      <!-- Area Konten Utama -->
      <section class="content">
        <!-- Panel Tengah: Statistik & Tabel -->
        <div class="center-panel">
          
          <!-- Kartu Statistik (Summary) -->
          <div class="stats">
            <div class="stat-card">
              <div class="stat-icon blue">🏪</div>
              <div>
                <div class="stat-label">Total Mitra</div>
                <div class="stat-value">248</div>
                <div class="stat-sub">Semua mitra terdaftar</div>
              </div>
            </div>
            <div class="stat-card">
              <div class="stat-icon green">🛡</div>
              <div>
                <div class="stat-label">Terverifikasi</div>
                <div class="stat-value">236</div>
                <div class="stat-sub">95,2% dari total mitra</div>
              </div>
            </div>
            <div class="stat-card">
              <div class="stat-icon orange">⏲</div>
              <div>
                <div class="stat-label">Menunggu Verifikasi</div>
                <div class="stat-value">12</div>
                <div class="stat-sub">Perlu review admin</div>
              </div>
            </div>
            <div class="stat-card">
              <div class="stat-icon red">✕</div>
              <div>
                <div class="stat-label">Ditolak</div>
                <div class="stat-value">8</div>
                <div class="stat-sub">Mitra ditolak verifi</div>
              </div>
            </div>
          </div>

          <!-- Tab Navigasi Status -->
          <div class="tabs">
            <a class="tab active" href="#">Semua</a>
            <a class="tab" href="#">Terverifikasi</a>
            <a class="tab" href="#">Menunggu Verifikasi</a>
            <a class="tab" href="#">Ditolak</a>
            <a class="tab" href="#">Suspended</a>
          </div>

          <!-- Toolbar (Filter & Search) -->
          <div class="toolbar">
            <div class="search small">
              <input type="text" placeholder="Cari mitra laundry..." />
              <span>⌕</span>
            </div>

            <select>
              <option>Status</option>
            </select>
            <select>
              <option>Kota</option>
            </select>
            <select>
              <option>Urutkan</option>
            </select>
            <button class="filter-btn">⏷ Filter</button>
          </div>

          <!-- Tabel Data Mitra -->
          <div class="table-wrap">
            <table>
              <thead>
                <tr>
                  <th class="check"><input type="checkbox"></th>
                  <th>Mitra Laundry</th>
                  <th>Pemilik</th>
                  <th>Kota</th>
                  <th>Rating</th>
                  <th>Status</th>
                  <th>Bergabung</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <!-- Data Row 1 (Contoh Terpilih/Selected) -->
                <tr class="selected">
                  <td class="check"><input type="checkbox" checked></td>
                  <td>
                    <div class="partner">
                      <div class="logo">🧺</div>
                      <div>
                        <strong>Laundry Bersih Sejahtera</strong>
                        <span>#MITRA-0001</span>
                      </div>
                    </div>
                  </td>
                  <td>Andi Pratama<br><small>0812-3456-7890</small></td>
                  <td>Jakarta Selatan</td>
                  <td class="rating">★ 4.8 <span>(128)</span></td>
                  <td><span class="pill green">Terverifikasi</span></td>
                  <td>6 Mei 2024</td>
                  <td><button class="icon-btn">◉</button><button class="icon-btn">⋮</button></td>
                </tr>

                <!-- Data Row 2 -->
                <tr>
                  <td class="check"><input type="checkbox"></td>
                  <td>
                    <div class="partner">
                      <div class="logo blue">◎</div>
                      <div>
                        <strong>Quick Wash Laundry</strong>
                        <span>#MITRA-0002</span>
                      </div>
                    </div>
                  </td>
                  <td>Budi Santoso<br><small>0813-2345-6789</small></td>
                  <td>Bandung</td>
                  <td class="rating">★ 4.6 <span>(98)</span></td>
                  <td><span class="pill green">Terverifikasi</span></td>
                  <td>6 Mei 2024</td>
                  <td><button class="icon-btn">◉</button><button class="icon-btn">⋮</button></td>
                </tr>

                <!-- Data Row 3 -->
                <tr>
                  <td class="check"><input type="checkbox"></td>
                  <td>
                    <div class="partner">
                      <div class="logo sky">☁</div>
                      <div>
                        <strong>Fresh & Clean Laundry</strong>
                        <span>#MITRA-0003</span>
                      </div>
                    </div>
                  </td>
                  <td>Siti Aisyah<br><small>0821-9876-5432</small></td>
                  <td>Surabaya</td>
                  <td class="rating">★ 4.7 <span>(76)</span></td>
                  <td><span class="pill yellow">Menunggu</span></td>
                  <td>5 Mei 2024</td>
                  <td><button class="icon-btn">◉</button><button class="icon-btn">⋮</button></td>
                </tr>

                <!-- Data Row 4 -->
                <tr>
                  <td class="check"><input type="checkbox"></td>
                  <td>
                    <div class="partner">
                      <div class="logo navy">▣</div>
                      <div>
                        <strong>LaundryKita</strong>
                        <span>#MITRA-0004</span>
                      </div>
                    </div>
                  </td>
                  <td>Dewi Lestari<br><small>0822-1122-3344</small></td>
                  <td>Depok</td>
                  <td class="rating">★ 4.5 <span>(64)</span></td>
                  <td><span class="pill green">Terverifikasi</span></td>
                  <td>5 Mei 2024</td>
                  <td><button class="icon-btn">◉</button><button class="icon-btn">⋮</button></td>
                </tr>

                <!-- Data Row 5 -->
                <tr>
                  <td class="check"><input type="checkbox"></td>
                  <td>
                    <div class="partner">
                      <div class="logo red">✦</div>
                      <div>
                        <strong>CleanPro Laundry</strong>
                        <span>#MITRA-0005</span>
                      </div>
                    </div>
                  </td>
                  <td>Fahmi Hidayat<br><small>0838-7766-5544</small></td>
                  <td>Bekasi</td>
                  <td class="rating">★ 4.3 <span>(52)</span></td>
                  <td><span class="pill pink">Suspended</span></td>
                  <td>4 Mei 2024</td>
                  <td><button class="icon-btn">◉</button><button class="icon-btn">⋮</button></td>
                </tr>

                <!-- Data Row 6 -->
                <tr>
                  <td class="check"><input type="checkbox"></td>
                  <td>
                    <div class="partner">
                      <div class="logo sky">⬤</div>
                      <div>
                        <strong>Rapi & Wangi Laundry</strong>
                        <span>#MITRA-0006</span>
                      </div>
                    </div>
                  </td>
                  <td>Rina Marlina<br><small>0856-9988-7766</small></td>
                  <td>Yogyakarta</td>
                  <td class="rating">★ 4.4 <span>(41)</span></td>
                  <td><span class="pill green">Terverifikasi</span></td>
                  <td>3 Mei 2024</td>
                  <td><button class="icon-btn">◉</button><button class="icon-btn">⋮</button></td>
                </tr>

                <!-- Data Row 7 -->
                <tr>
                  <td class="check"><input type="checkbox"></td>
                  <td>
                    <div class="partner">
                      <div class="logo orange">⦿</div>
                      <div>
                        <strong>Super Laundry Express</strong>
                        <span>#MITRA-0007</span>
                      </div>
                    </div>
                  </td>
                  <td>Dimas Saputra<br><small>0811-2233-4455</small></td>
                  <td>Tangerang</td>
                  <td class="rating">★ 4.2 <span>(33)</span></td>
                  <td><span class="pill red">Ditolak</span></td>
                  <td>2 Mei 2024</td>
                  <td><button class="icon-btn">◉</button><button class="icon-btn">⋮</button></td>
                </tr>

                <!-- Data Row 8 -->
                <tr>
                  <td class="check"><input type="checkbox"></td>
                  <td>
                    <div class="partner">
                      <div class="logo blue">◈</div>
                      <div>
                        <strong>Laundry Baik Hati</strong>
                        <span>#MITRA-0008</span>
                      </div>
                    </div>
                  </td>
                  <td>Hendra Wijaya<br><small>0812-6677-8899</small></td>
                  <td>Malang</td>
                  <td class="rating">★ 4.9 <span>(87)</span></td>
                  <td><span class="pill yellow">Menunggu</span></td>
                  <td>1 Mei 2024</td>
                  <td><button class="icon-btn">◉</button><button class="icon-btn">⋮</button></td>
                </tr>
              </tbody>
            </table>
          </div>

          <!-- Footer Tabel (Pagination) -->
          <div class="table-footer">
            <div>Menampilkan 1 - 8 dari 248 data</div>
            <div class="page-size">10 / halaman</div>
            <div class="pagination">
              <button>‹</button>
              <a class="active" href="#">1</a>
              <a href="#">2</a>
              <a href="#">3</a>
              <a href="#">4</a>
              <a href="#">5</a>
              <span>…</span>
              <a href="#">25</a>
              <button>›</button>
            </div>
          </div>
        </div>

        <!-- PANEL DETAIL dihapus: diganti modal popup -->
        <aside class="detail-panel" style="display:none">
          <div class="detail-head">
            <h2>Detail Mitra Laundry</h2>
            <span>×</span>
          </div>

          <!-- Header Detail (Foto & Identitas) -->
          <div class="detail-hero">
            <div class="hero-img"></div>
            <div class="hero-info">
              <span class="pill green">Terverifikasi</span>
              <h3>Laundry Bersih Sejahtera</h3>
              <div class="meta">#MITRA-0001</div>
              <div class="meta rating">★ 4.8 <span>(128 ulasan)</span></div>
              <div class="meta">Bergabung: 6 Mei 2024</div>
            </div>
          </div>

          <!-- Tab Informasi Detail -->
          <div class="detail-tabs">
            <a class="active" href="#">Informasi</a>
            <a href="#">Layanan</a>
            <a href="#">Performa</a>
            <a href="#">Dokumen</a>
            <a href="#">Pesanan</a>
          </div>

          <!-- Konten Seksi Informasi Toko -->
          <div class="detail-section">
            <h4>Informasi Toko</h4>
            <div class="info-grid">
              <div>Pemilik</div><div>Andi Pratama</div>
              <div>No. WhatsApp</div><div>0812-3456-7890</div>
              <div>Email</div><div>andipratama@email.com</div>
              <div>Alamat Toko</div><div>Jl. Melati No.12, Cipete<br>Jakarta Selatan</div>
              <div>Kota</div><div>Jakarta Selatan</div>
              <div>Jam Operasional</div><div>07:00 - 21:00</div>
              <div>Layanan Antar Jemput</div><div><span class="pill green soft">Aktif</span></div>
              <div>Radius Layanan</div><div>5 km</div>
              <div>Metode Pembayaran</div>
              <div class="pay-methods"><span>QRIS</span><span>Cash</span><span>Transfer</span></div>
            </div>
          </div>

          <!-- Konten Seksi Performa -->
          <div class="detail-section">
            <div class="section-head">
              <h4>Ringkasan Performa</h4>
              <select>
                <option>7 Hari Terakhir</option>
              </select>
            </div>

            <div class="perf-item"><span>📊 Tingkat Penyelesaian Pesanan</span><b class="green-text">● 98%</b></div>
            <div class="perf-item"><span>💬 Waktu Respon Chat</span><b>18 menit</b></div>
            <div class="perf-item"><span>📦 Pesanan Selesai</span><b class="green-text">45  +12%</b></div>
            <div class="perf-item"><span>✕ Pesanan Dibatalkan</span><b class="red-text">2  +5%</b></div>
          </div>

          <!-- Tombol Aksi Bawah -->
          <div class="detail-actions">
            <button class="primary">▣ Lihat Pesanan Mitra</button>
            <button class="secondary">⋯</button>
          </div>

          <button class="danger-btn">⏻ Suspend Mitra</button>
        </aside>
      </section>
    </main>
  </div>

  <!-- ========== MODAL DETAIL MITRA ========== -->
  <div class="modal-overlay" id="mitraModal" role="dialog" aria-modal="true" aria-labelledby="modalTitle">
    <div class="modal-box">

      <!-- Header -->
      <div class="modal-header">
        <h2 id="modalTitle">Detail Mitra Laundry</h2>
        <button class="modal-close" id="modalClose" aria-label="Tutup">&times;</button>
      </div>

      <!-- Body -->
      <div class="modal-body">

        <!-- Hero -->
        <div class="modal-hero">
          <div class="modal-hero-img" id="modalHeroEmoji">🧺</div>
          <div class="modal-hero-info">
            <span class="pill green" id="modalStatusBadge">Terverifikasi</span>
            <h3 id="modalName">Laundry Bersih Sejahtera</h3>
            <div class="meta" id="modalId">#MITRA-0001</div>
            <div class="meta rating" id="modalRating">★ 4.8 <span>(128 ulasan)</span></div>
            <div class="meta" id="modalJoin">Bergabung: 6 Mei 2024</div>
          </div>
        </div>

        <!-- Tabs -->
        <div class="modal-tabs" role="tablist">
          <button class="active" data-tab="info" role="tab">Informasi</button>
          <button data-tab="layanan" role="tab">Layanan</button>
          <button data-tab="performa" role="tab">Performa</button>
          <button data-tab="dokumen" role="tab">Dokumen</button>
        </div>

        <!-- Tab: Informasi -->
        <div class="modal-tab-content active" id="tab-info">
          <div class="modal-info-grid">
            <div>Pemilik</div>           <div id="modalOwner">Andi Pratama</div>
            <div>No. WhatsApp</div>      <div id="modalPhone">0812-3456-7890</div>
            <div>Email</div>             <div id="modalEmail">andipratama@email.com</div>
            <div>Alamat Toko</div>       <div id="modalAddress">Jl. Melati No.12, Cipete<br>Jakarta Selatan</div>
            <div>Kota</div>              <div id="modalCity">Jakarta Selatan</div>
            <div>Jam Operasional</div>   <div id="modalHours">07:00 – 21:00</div>
            <div>Antar Jemput</div>      <div><span class="pill green soft" id="modalPickup">Aktif</span></div>
            <div>Radius Layanan</div>    <div id="modalRadius">5 km</div>
            <div>Metode Bayar</div>
            <div class="pay-methods" id="modalPayment">
              <span>QRIS</span><span>Cash</span><span>Transfer</span>
            </div>
          </div>
        </div>

        <!-- Tab: Layanan -->
        <div class="modal-tab-content" id="tab-layanan">
          <div class="layanan-list">
            <div class="layanan-item">
              <div><strong>Cuci + Setrika</strong><br><span style="color:var(--muted);font-size:11px">Reguler 3 hari</span></div>
              <span class="price">Rp 6.000/kg</span>
            </div>
            <div class="layanan-item">
              <div><strong>Cuci Express</strong><br><span style="color:var(--muted);font-size:11px">Selesai hari ini</span></div>
              <span class="price">Rp 10.000/kg</span>
            </div>
            <div class="layanan-item">
              <div><strong>Dry Cleaning</strong><br><span style="color:var(--muted);font-size:11px">2-3 hari kerja</span></div>
              <span class="price">Rp 25.000/item</span>
            </div>
            <div class="layanan-item">
              <div><strong>Cuci Sepatu</strong><br><span style="color:var(--muted);font-size:11px">2 hari</span></div>
              <span class="price">Rp 30.000/pasang</span>
            </div>
            <div class="layanan-item">
              <div><strong>Cuci Karpet</strong><br><span style="color:var(--muted);font-size:11px">3-5 hari kerja</span></div>
              <span class="price">Rp 15.000/m²</span>
            </div>
          </div>
        </div>

        <!-- Tab: Performa -->
        <div class="modal-tab-content" id="tab-performa">
          <div class="section-head" style="margin-bottom:12px">
            <h4 style="margin:0;font-size:13px">Ringkasan Performa</h4>
            <select style="height:30px;padding:0 10px;border-radius:8px;border:1px solid var(--line);font:inherit">
              <option>7 Hari Terakhir</option>
              <option>30 Hari Terakhir</option>
              <option>3 Bulan</option>
            </select>
          </div>
          <div class="modal-perf-item"><span>📊 Tingkat Penyelesaian</span><b class="green-text">● 98%</b></div>
          <div class="modal-perf-item"><span>💬 Waktu Respon Chat</span><b>18 menit</b></div>
          <div class="modal-perf-item"><span>📦 Pesanan Selesai</span><b class="green-text">45 &nbsp;↑ +12%</b></div>
          <div class="modal-perf-item"><span>✕ Pesanan Dibatalkan</span><b class="red-text">2 &nbsp;↑ +5%</b></div>
          <div class="modal-perf-item"><span>⭐ Rating Rata-rata</span><b id="modalPerfRating">4.8</b></div>
          <div class="modal-perf-item"><span>💰 Pendapatan (estimasi)</span><b class="green-text">Rp 2,7 jt</b></div>
        </div>

        <!-- Tab: Dokumen -->
        <div class="modal-tab-content" id="tab-dokumen">
          <div class="doc-list">
            <div class="doc-item">
              <div class="doc-icon">📄</div>
              <div class="doc-info">
                <strong>KTP Pemilik</strong>
                <span>Diunggah 6 Mei 2024</span>
              </div>
              <div class="doc-status"><span class="pill green soft">Terverifikasi</span></div>
            </div>
            <div class="doc-item">
              <div class="doc-icon">🏢</div>
              <div class="doc-info">
                <strong>NIB / SIUP</strong>
                <span>Diunggah 6 Mei 2024</span>
              </div>
              <div class="doc-status"><span class="pill green soft">Terverifikasi</span></div>
            </div>
            <div class="doc-item">
              <div class="doc-icon">📍</div>
              <div class="doc-info">
                <strong>Foto Toko</strong>
                <span>3 foto diunggah</span>
              </div>
              <div class="doc-status"><span class="pill green soft">Terverifikasi</span></div>
            </div>
            <div class="doc-item">
              <div class="doc-icon">🏦</div>
              <div class="doc-info">
                <strong>Rekening Bank</strong>
                <span>BCA - 1234567890</span>
              </div>
              <div class="doc-status"><span class="pill green soft">Terverifikasi</span></div>
            </div>
          </div>
        </div>

        <!-- Footer Aksi -->
        <div class="modal-footer">
          <div class="row">
            <button class="primary">▣ Lihat Pesanan Mitra</button>
            <button class="secondary">⋯</button>
          </div>
          <button class="danger-btn" style="margin-top:0">⏻ Suspend Mitra</button>
        </div>

      </div><!-- /modal-body -->
    </div><!-- /modal-box -->
  </div><!-- /modal-overlay -->

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {

  // ── 1. TABLE SCROLL WRAPPER ───────────────────────────────
  const tableWrap = document.querySelector('.table-wrap');
  if (tableWrap) { tableWrap.style.overflowX = 'auto'; tableWrap.style.webkitOverflowScrolling = 'touch'; }

  // ── 3. DATA MITRA ─────────────────────────────────────────
  const mitraData = [
    { name:'Laundry Bersih Sejahtera', id:'#MITRA-0001', emoji:'🧺', owner:'Andi Pratama',  email:'andipratama@email.com',   phone:'0812-3456-7890', address:'Jl. Melati No.12, Cipete<br>Jakarta Selatan', city:'Jakarta Selatan', hours:'07:00 – 21:00', radius:'5 km', rating:'4.8', ulasan:128, status:'green',  statusLabel:'Terverifikasi', join:'6 Mei 2024' },
    { name:'Quick Wash Laundry',       id:'#MITRA-0002', emoji:'◎',  owner:'Budi Santoso',  email:'budisantoso@email.com',   phone:'0813-2345-6789', address:'Jl. Cihampelas No.45<br>Bandung',             city:'Bandung',         hours:'06:00 – 22:00', radius:'7 km', rating:'4.6', ulasan:98,  status:'green',  statusLabel:'Terverifikasi', join:'6 Mei 2024' },
    { name:'Fresh & Clean Laundry',    id:'#MITRA-0003', emoji:'☁',  owner:'Siti Aisyah',   email:'sitiaisyah@email.com',    phone:'0821-9876-5432', address:'Jl. Rungkut Asri No.8<br>Surabaya',           city:'Surabaya',        hours:'08:00 – 20:00', radius:'4 km', rating:'4.7', ulasan:76,  status:'yellow', statusLabel:'Menunggu',      join:'5 Mei 2024' },
    { name:'LaundryKita',              id:'#MITRA-0004', emoji:'▣',  owner:'Dewi Lestari',  email:'dewilestari@email.com',   phone:'0822-1122-3344', address:'Jl. Margonda Raya No.20<br>Depok',            city:'Depok',           hours:'07:00 – 21:00', radius:'6 km', rating:'4.5', ulasan:64,  status:'green',  statusLabel:'Terverifikasi', join:'5 Mei 2024' },
    { name:'CleanPro Laundry',         id:'#MITRA-0005', emoji:'✦',  owner:'Fahmi Hidayat', email:'fahmihidayat@email.com',  phone:'0838-7766-5544', address:'Jl. Ahmad Yani No.55<br>Bekasi',              city:'Bekasi',          hours:'08:00 – 20:00', radius:'5 km', rating:'4.3', ulasan:52,  status:'pink',   statusLabel:'Suspended',     join:'4 Mei 2024' },
    { name:'Rapi & Wangi Laundry',     id:'#MITRA-0006', emoji:'⬤',  owner:'Rina Marlina',  email:'rinamarlina@email.com',   phone:'0856-9988-7766', address:'Jl. Malioboro No.10<br>Yogyakarta',           city:'Yogyakarta',      hours:'07:00 – 21:00', radius:'8 km', rating:'4.4', ulasan:41,  status:'green',  statusLabel:'Terverifikasi', join:'3 Mei 2024' },
    { name:'Super Laundry Express',    id:'#MITRA-0007', emoji:'⦿',  owner:'Dimas Saputra', email:'dimassaputra@email.com',  phone:'0811-2233-4455', address:'Jl. M.H. Thamrin No.7<br>Tangerang',          city:'Tangerang',       hours:'06:00 – 22:00', radius:'6 km', rating:'4.2', ulasan:33,  status:'red',    statusLabel:'Ditolak',       join:'2 Mei 2024' },
    { name:'Laundry Baik Hati',        id:'#MITRA-0008', emoji:'◈',  owner:'Hendra Wijaya', email:'hendrawijaya@email.com',  phone:'0812-6677-8899', address:'Jl. Ijen No.3<br>Malang',                    city:'Malang',          hours:'07:00 – 20:00', radius:'5 km', rating:'4.9', ulasan:87,  status:'yellow', statusLabel:'Menunggu',      join:'1 Mei 2024' },
  ];

  // ── 4. MODAL LOGIC ────────────────────────────────────────
  const modal     = document.getElementById('mitraModal');
  const modalClose = document.getElementById('modalClose');

  function openModal(d) {
    // Isi data hero
    document.getElementById('modalHeroEmoji').textContent  = d.emoji;
    document.getElementById('modalName').textContent       = d.name;
    document.getElementById('modalId').textContent         = d.id;
    document.getElementById('modalRating').innerHTML       = '★ ' + d.rating + ' <span>(' + d.ulasan + ' ulasan)</span>';
    document.getElementById('modalJoin').textContent       = 'Bergabung: ' + d.join;

    const badge = document.getElementById('modalStatusBadge');
    badge.className  = 'pill ' + d.status;
    badge.textContent = d.statusLabel;

    // Isi data informasi
    document.getElementById('modalOwner').textContent   = d.owner;
    document.getElementById('modalPhone').textContent   = d.phone;
    document.getElementById('modalEmail').textContent   = d.email;
    document.getElementById('modalAddress').innerHTML   = d.address;
    document.getElementById('modalCity').textContent    = d.city;
    document.getElementById('modalHours').textContent   = d.hours;
    document.getElementById('modalRadius').textContent  = d.radius;
    document.getElementById('modalPerfRating').textContent = d.rating;

    // Reset ke tab Informasi
    switchTab('info');

    // Tampilkan modal
    modal.classList.add('active');
    document.body.style.overflow = 'hidden';
  }

  function closeModal() {
    modal.classList.remove('active');
    document.body.style.overflow = '';
    document.querySelectorAll('tbody tr').forEach(r => r.classList.remove('selected'));
  }

  modalClose.addEventListener('click', closeModal);
  modal.addEventListener('click', function (e) {
    if (e.target === modal) closeModal();
  });
  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape') closeModal();
  });

  // ── 5. TAB SWITCHING DALAM MODAL ─────────────────────────
  function switchTab(tabName) {
    document.querySelectorAll('.modal-tabs button').forEach(btn => {
      btn.classList.toggle('active', btn.dataset.tab === tabName);
    });
    document.querySelectorAll('.modal-tab-content').forEach(pane => {
      pane.classList.toggle('active', pane.id === 'tab-' + tabName);
    });
  }
  document.querySelectorAll('.modal-tabs button').forEach(btn => {
    btn.addEventListener('click', () => switchTab(btn.dataset.tab));
  });

  // ── 6. ROW CLICK → buka modal ────────────────────────────
  document.querySelectorAll('tbody tr').forEach((row, i) => {
    const data = mitraData[i];
    if (!data) return;
    row.style.cursor = 'pointer';
    row.addEventListener('click', function (e) {
      // Jangan buka modal kalau klik checkbox
      if (e.target.type === 'checkbox') return;
      document.querySelectorAll('tbody tr').forEach(r => r.classList.remove('selected'));
      this.classList.add('selected');
      openModal(data);
    });
  });

});
</script>
@endpush