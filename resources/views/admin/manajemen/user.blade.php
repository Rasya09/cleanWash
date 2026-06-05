@extends('admin.layouts.app')

@section('css')
  <link rel="stylesheet" href="{{ asset('assets/css/admin/user.css') }}">
@endsection

@section('content')
    <div class="app">
    <!-- BAGIAN KONTEN UTAMA (Kanan) -->
    <main class="main">
      <!-- Area Isi Halaman -->
      <section class="content">
        <!-- Barisan Kartu KPI (Key Performance Indicator) -->
        <div class="cards">
          <!-- Total Customer -->
          <div class="card kpi purple">
            <div class="kpi-icon"><i class="fa-solid fa-user"></i></div>
            <div class="kpi-text">
              <div class="kpi-label">Total Customer</div>
              <div class="kpi-value">{{ number_format($totalCustomer,0,',','.') }} <span class="up">↑ 12,5%</span></div>
              <div class="kpi-sub">Dibanding minggu lalu</div>
            </div>
          </div>
          <!-- Customer Baru -->
          <div class="card kpi green">
            <div class="kpi-icon"><i class="fa-solid fa-user-plus"></i></div>
            <div class="kpi-text">
              <div class="kpi-label">Customer Baru</div>
              <div class="kpi-value">{{ $customerBaru }} <span class="up">↑ 8,4%</span></div>
              <div class="kpi-sub">Dibanding minggu lalu</div>
            </div>
          </div>
          <!-- Customer Aktif -->
          <div class="card kpi orange">
            <div class="kpi-icon"><i class="fa-solid fa-user-check"></i></div>
            <div class="kpi-text">
              <div class="kpi-label">Customer Aktif</div>
              <div class="kpi-value">{{ number_format($customerAktif,0,',','.') }} <span class="up">↑ 11,2%</span></div>
              <div class="kpi-sub">Dibanding minggu lalu</div>
            </div>
          </div>
          <!-- Customer Diblokir -->
          <div class="card kpi red">
            <div class="kpi-icon"><i class="fa-solid fa-user-xmark"></i></div>
            <div class="kpi-text">
              <div class="kpi-label">Customer Diblokir</div>
              <div class="kpi-value">{{ number_format($customerBlocked,0,',','.') }} <span class="down">↓ 2,1%</span></div>
              <div class="kpi-sub">Dibanding minggu lalu</div>
            </div>
          </div>
        </div>
        <!-- Bagian Tabel Data Customer -->
        <div class="card table-card">
          <!-- Header Tabel (Judul, Tab, & Filter) -->
          <div class="table-head">
            <div>
              <h2>Daftar Customer</h2>
              <div class="tabs">
                <a class="tab active" href="#">Semua</a>
                <a class="tab" href="#">Aktif</a>
                <a class="tab" href="#">Diblokir</a>
              </div>
            </div>
            <div class="actions">
              <div class="search">
                <input type="text" placeholder="Cari nama, email atau no. hp..." />
                <i class="fa-solid fa-magnifying-glass"></i>
              </div>
              <button class="filter-btn"><i class="fa-solid fa-filter"></i> Filter</button>
              <button class="add-btn"><i class="fa-solid fa-plus"></i> Tambah Customer</button>
            </div>
          </div>
          <!-- Tabel Data -->
          <table class="data-table">
            <thead>
              <tr>
                <th class="checkbox-col"><input type="checkbox" /></th>
                <th>Customer</th>
                <th>No. HP</th>
                <th>Email</th>
                <th>Total Pesanan</th>
                <th>Bergabung</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @forelse($customers as $customer)
              <tr>
                  <td>
                      <input type="checkbox">
                  </td>
                  <td>
                      <div class="customer">
                          <img
                              src="https://ui-avatars.com/api/?name={{ urlencode($customer->name) }}"
                              alt=""
                          >
                          <span>
                              {{ $customer->name }}
                          </span>

                      </div>
                  </td>
                  <td>
                      {{ $customer->phone ?? '-' }}
                  </td>
                  <td>
                      {{ $customer->email }}
                  </td>
                  <td>
                      0
                  </td>
                  <td>
                      {{ $customer->created_at->format('d M Y') }}
                      <br>
                      <span>
                          {{ $customer->created_at->format('H:i') }} WIB
                      </span>
                  </td>
                  <td>
                      <span class="status {{ $customer->status }}">
                          {{ $customer->status == 'active'
                              ? 'Aktif'
                              : 'Diblokir' }}
                      </span>
                  </td>
                  <td>
                      <button>
                          <i class="fa-solid fa-ellipsis-vertical"></i>
                      </button>
                  </td>
              </tr>
              @empty
              <tr>
                  <td colspan="8" style="text-align:center">
                      Belum ada customer terdaftar
                  </td>
              </tr>
              @endforelse
              </tbody>
          </table>

          <!-- Footer Tabel (Pagination & Info Data) -->
          <div class="table-footer">
            <div class="footer-left">
                Menampilkan
                {{ $customers->firstItem() }}
                -
                {{ $customers->lastItem() }}
                dari
                {{ $customers->total() }}
                data
            </div>
            <div class="footer-right">
              <select>
                <option>10 / halaman</option>
              </select>
              <div class="pager">
                <button class="nav"><i class="fa-solid fa-chevron-left"></i></button>
                <button class="page active">1</button>
                <button class="page">2</button>
                <button class="page">3</button>
                <button class="page">4</button>
                <button class="page">5</button>
                <span>...</span>
                <button class="page">1246</button>
                <button class="nav"><i class="fa-solid fa-chevron-right"></i></button>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
  </div>

  <!-- ===================== MODAL DETAIL CUSTOMER ===================== -->
  <div class="modal-backdrop" id="customerModal">
    <div class="modal-panel">

      <!-- Header Modal -->
      <div class="modal-header">
        <h3>Detail Customer</h3>
        <button class="modal-close" id="modalClose"><i class="fa-solid fa-xmark"></i></button>
      </div>

      <!-- Profil Customer -->
      <div class="modal-profile">
        <img class="modal-avatar" id="modalAvatar" src="" alt="" />
        <div class="modal-profile-info">
          <div class="modal-verified-badge" id="modalBadge">
            <i class="fa-solid fa-circle-check"></i> Terverifikasi
          </div>
          <p class="modal-name" id="modalName">–</p>
          <p class="modal-id"  id="modalId">#CUST-0001</p>
          <div class="modal-meta">
            <span><i class="fa-regular fa-star"></i> <span id="modalRating">4.8 (32 ulasan)</span></span>
            <span><i class="fa-regular fa-calendar"></i> Bergabung: <span id="modalJoin">–</span></span>
          </div>
        </div>
      </div>

      <!-- Tab Navigasi -->
      <div class="modal-tabs">
        <button class="modal-tab active" data-tab="info">Informasi</button>
        <button class="modal-tab" data-tab="pesanan">Pesanan</button>
        <button class="modal-tab" data-tab="performa">Performa</button>
      </div>

      <!-- Konten Tab: Informasi -->
      <div class="modal-tab-content" id="tab-info">
        <div class="modal-section">
          <p class="modal-section-title">Informasi Akun</p>
          <div class="modal-info-row">
            <span class="modal-info-label">No. HP</span>
            <span class="modal-info-value" id="modalPhone">–</span>
          </div>
          <div class="modal-info-row">
            <span class="modal-info-label">Email</span>
            <span class="modal-info-value" id="modalEmail">–</span>
          </div>
          <div class="modal-info-row">
            <span class="modal-info-label">Status Akun</span>
            <span class="modal-info-value" id="modalStatus">–</span>
          </div>
          <div class="modal-info-row">
            <span class="modal-info-label">Total Pesanan</span>
            <span class="modal-info-value" id="modalOrders">–</span>
          </div>
        </div>
        <div class="modal-section">
          <p class="modal-section-title">Preferensi</p>
          <div class="modal-info-row">
            <span class="modal-info-label">Metode Bayar</span>
            <span class="modal-info-value">
              <span class="modal-chip">QRIS</span>
              <span class="modal-chip">Transfer</span>
            </span>
          </div>
          <div class="modal-info-row">
            <span class="modal-info-label">Notifikasi</span>
            <span class="modal-info-value"><span class="modal-chip green">Aktif</span></span>
          </div>
        </div>
      </div>

      <!-- Konten Tab: Pesanan (tersembunyi) -->
      <div class="modal-tab-content" id="tab-pesanan" style="display:none">
        <div class="modal-section">
          <p class="modal-section-title">Riwayat Pesanan</p>
          <div class="modal-perf-row">
            <span class="modal-perf-left"><i class="fa-solid fa-box"></i> Total Pesanan</span>
            <span class="modal-perf-value blue" id="modalOrdersPerf">–</span>
          </div>
          <div class="modal-perf-row">
            <span class="modal-perf-left"><i class="fa-solid fa-circle-check"></i> Pesanan Selesai</span>
            <span class="modal-perf-value green">–</span>
          </div>
          <div class="modal-perf-row">
            <span class="modal-perf-left"><i class="fa-solid fa-circle-xmark"></i> Dibatalkan</span>
            <span class="modal-perf-value" style="color:#ef4444">0</span>
          </div>
        </div>
      </div>

      <!-- Konten Tab: Performa (tersembunyi) -->
      <div class="modal-tab-content" id="tab-performa" style="display:none">
        <div class="modal-section">
          <div class="modal-perf-header">
            <p class="modal-section-title" style="margin:0">Ringkasan Performa</p>
            <button class="modal-period-btn">7 Hari Terakhir <i class="fa-solid fa-chevron-down"></i></button>
          </div>
          <div class="modal-perf-row">
            <span class="modal-perf-left"><i class="fa-solid fa-chart-line"></i> Tingkat Penyelesaian</span>
            <span class="modal-perf-value green">98%</span>
          </div>
          <div class="modal-perf-row">
            <span class="modal-perf-left"><i class="fa-regular fa-comment-dots"></i> Waktu Respon</span>
            <span class="modal-perf-value blue">18 menit</span>
          </div>
          <div class="modal-perf-row">
            <span class="modal-perf-left"><i class="fa-solid fa-star"></i> Rating Rata-rata</span>
            <span class="modal-perf-value" id="modalPerfRating">–</span>
          </div>
        </div>
      </div>

      <!-- Footer Tombol Aksi -->
      <div class="modal-footer">
        <button class="modal-btn-primary">
          <i class="fa-regular fa-eye"></i> Lihat Pesanan Customer
        </button>
        <button class="modal-btn-danger" id="modalBlockBtn">
          <i class="fa-solid fa-ban"></i> <span id="modalBlockLabel">Blokir Customer</span>
        </button>
      </div>

    </div>
  </div>
  <!-- ===================== END MODAL ===================== -->

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {

  // ── 1. TABLE HORIZONTAL SCROLL WRAPPER ───────────────────
  const table = document.querySelector('.data-table');
  if (table && !table.parentElement.classList.contains('table-scroll-wrap')) {
    const wrap = document.createElement('div');
    wrap.className = 'table-scroll-wrap';
    table.parentNode.insertBefore(wrap, table);
    wrap.appendChild(table);
  }

  // ── 3. MODAL DETAIL CUSTOMER ──────────────────────────────
  const modal     = document.getElementById('customerModal');
  const modalClose = document.getElementById('modalClose');

  // Data per baris tabel (index sesuai urutan <tr>)
  const customerData = [
    { name:'Andi Pratama',   id:'#CUST-0001', phone:'0812-3456-7890', email:'andi.pratama@email.com',   join:'6 Mei 2024',  status:'active', orders:18, avatar:'https://i.pravatar.cc/100?img=32', rating:'4.7' },
    { name:'Budi Santoso',   id:'#CUST-0002', phone:'0813-2345-6789', email:'budi.santoso@email.com',   join:'5 Mei 2024',  status:'active', orders:25, avatar:'https://i.pravatar.cc/100?img=13', rating:'4.9' },
    { name:'Citra Lestari',  id:'#CUST-0003', phone:'0821-9876-5432', email:'citra.lestari@email.com',  join:'4 Mei 2024',  status:'active', orders:3,  avatar:'https://i.pravatar.cc/100?img=47', rating:'4.5' },
    { name:'Dewi Anggraini', id:'#CUST-0004', phone:'0822-1122-3344', email:'dewi.anggraini@email.com', join:'2 Mei 2024',  status:'active', orders:12, avatar:'https://i.pravatar.cc/100?img=15', rating:'4.8' },
    { name:'Fahmi Hidayat',  id:'#CUST-0005', phone:'0838-7766-5544', email:'fahmi.hidayat@email.com',  join:'1 Mei 2024',  status:'blocked',orders:7,  avatar:'https://i.pravatar.cc/100?img=5',  rating:'3.2' },
    { name:'Gita Putri',     id:'#CUST-0006', phone:'0856-9988-7766', email:'gita.putri@email.com',     join:'30 Apr 2024', status:'active', orders:9,  avatar:'https://i.pravatar.cc/100?img=44', rating:'4.6' },
    { name:'Hendra Wijaya',  id:'#CUST-0007', phone:'0811-2233-4455', email:'hendra.wijaya@email.com',  join:'29 Apr 2024', status:'active', orders:15, avatar:'https://i.pravatar.cc/100?img=21', rating:'4.7' },
    { name:'Ika Nurhaliza',  id:'#CUST-0008', phone:'0823-6677-8899', email:'ika.nurhaliza@email.com',  join:'28 Apr 2024', status:'blocked',orders:6,  avatar:'https://i.pravatar.cc/100?img=41', rating:'2.8' },
  ];

  function openModal(data) {
    // Isi profil
    document.getElementById('modalAvatar').src   = data.avatar;
    document.getElementById('modalName').textContent = data.name;
    document.getElementById('modalId').textContent   = data.id;
    document.getElementById('modalJoin').textContent = data.join;
    document.getElementById('modalRating').textContent = data.rating + ' (32 ulasan)';
    document.getElementById('modalPerfRating').textContent = data.rating;

    // Badge status
    const badge = document.getElementById('modalBadge');
    if (data.status === 'blocked') {
      badge.className = 'modal-status-blocked';
      badge.innerHTML = '<i class="fa-solid fa-ban"></i> Diblokir';
    } else {
      badge.className = 'modal-verified-badge';
      badge.innerHTML = '<i class="fa-solid fa-circle-check"></i> Terverifikasi';
    }

    // Info akun
    document.getElementById('modalPhone').textContent  = data.phone;
    document.getElementById('modalEmail').textContent  = data.email;
    document.getElementById('modalOrders').textContent = data.orders + ' pesanan';
    document.getElementById('modalOrdersPerf').textContent = data.orders;

    const statusEl = document.getElementById('modalStatus');
    if (data.status === 'blocked') {
      statusEl.innerHTML = '<span class="status blocked">Diblokir</span>';
      document.getElementById('modalBlockLabel').textContent = 'Aktifkan Customer';
    } else {
      statusEl.innerHTML = '<span class="status active">Aktif</span>';
      document.getElementById('modalBlockLabel').textContent = 'Blokir Customer';
    }

    // Reset ke tab pertama
    switchTab('info');

    modal.classList.add('open');
    document.body.style.overflow = 'hidden';
  }

  function closeModal() {
    modal.classList.remove('open');
    document.body.style.overflow = '';
  }

  // Tab switching
  function switchTab(name) {
    document.querySelectorAll('.modal-tab').forEach(t => t.classList.toggle('active', t.dataset.tab === name));
    document.querySelectorAll('.modal-tab-content').forEach(c => c.style.display = c.id === 'tab-' + name ? '' : 'none');
  }

  document.querySelectorAll('.modal-tab').forEach(btn => {
    btn.addEventListener('click', () => switchTab(btn.dataset.tab));
  });

  // Tutup modal
  modalClose.addEventListener('click', closeModal);
  modal.addEventListener('click', e => { if (e.target === modal) closeModal(); });
  document.addEventListener('keydown', e => { if (e.key === 'Escape') closeModal(); });

  // Pasang event ke setiap baris tabel — klik eye button atau nama customer
  document.querySelectorAll('.data-table tbody tr').forEach((row, i) => {
    const data = customerData[i];
    if (!data) return;

    // Klik tombol eye
    const eyeBtn = row.querySelector('.row-actions button:first-child');
    if (eyeBtn) eyeBtn.addEventListener('click', () => openModal(data));

    // Klik nama/avatar customer
    const customerCell = row.querySelector('.customer');
    if (customerCell) {
      customerCell.style.cursor = 'pointer';
      customerCell.addEventListener('click', () => openModal(data));
    }
  });

});
</script>
@endpush