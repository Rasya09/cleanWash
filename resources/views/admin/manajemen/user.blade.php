@extends('admin.layouts.app')

@section('css')
  <link rel="stylesheet" href="{{ asset('assets/css/admin/user.css') }}">
@endsection

@section('content')
    <div class="app">
    <!-- BAGIAN KONTEN UTAMA (Kanan) -->
    <main class="main">
      <!-- Header Halaman -->
      <div class="page-head">
        <div>
          <h1>Manajemen User</h1>
          <p>Kelola data customer terdaftar di platform.</p>
        </div>
      </div>
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
                  <td><input type="checkbox"></td>
                  <td>
                      <div class="customer" onclick="openCustomerDetail('{{ $customer->id }}')" style="cursor:pointer">
                          <img src="https://ui-avatars.com/api/?name={{ urlencode($customer->name) }}&background=random" alt="">
                          <span>{{ $customer->name }}</span>
                      </div>
                  </td>
                  <td>{{ $customer->phone ?? '-' }}</td>
                  <td>{{ $customer->email }}</td>
                  <td>0</td>
                  <td>
                      {{ $customer->created_at->translatedFormat('d M Y') }}<br>
                      <span style="color:#94a3b8; font-size:11px">{{ $customer->created_at->format('H:i') }} WIB</span>
                  </td>
                  <td>
                      <span class="status {{ $customer->status }}">
                          {{ $customer->status == 'active' ? 'Aktif' : 'Diblokir' }}
                      </span>
                  </td>
                  <td>
                      <div class="row-actions">
                        <button type="button" onclick="openCustomerDetail('{{ $customer->id }}')" title="Lihat Detail">
                            <i class="fa-solid fa-eye"></i>
                        </button>
                      </div>
                  </td>
              </tr>
              @empty
              <tr>
                  <td colspan="8" style="text-align:center; padding: 40px; color: #94a3b8;">
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
                {{ $customers->firstItem() ?? 0 }}
                -
                {{ $customers->lastItem() ?? 0 }}
                dari
                {{ $customers->total() }}
                data
            </div>
            <div class="footer-right">
              {{ $customers->links() }}
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
  const customers = @json($customers->items());

  // ── 1. TABLE HORIZONTAL SCROLL WRAPPER ───────────────────
  const table = document.querySelector('.data-table');
  if (table && !table.parentElement.classList.contains('table-scroll-wrap')) {
    const wrap = document.createElement('div');
    wrap.className = 'table-scroll-wrap';
    table.parentNode.insertBefore(wrap, table);
    wrap.appendChild(table);
  }

  // ── 2. MODAL DETAIL CUSTOMER ──────────────────────────────
  const modal     = document.getElementById('customerModal');
  const modalClose = document.getElementById('modalClose');

  window.openCustomerDetail = function(id) {
    const data = customers.find(c => c.id == id);
    if (!data) return;

    // Isi profil
    const avatarUrl = `https://ui-avatars.com/api/?name=${encodeURIComponent(data.name)}&background=random`;
    document.getElementById('modalAvatar').src   = avatarUrl;
    document.getElementById('modalName').textContent = data.name;
    document.getElementById('modalId').textContent   = '#CUST-' + String(data.id).padStart(4, '0');
    
    // Format tanggal join
    const joinDate = new Date(data.created_at);
    const options = { year: 'numeric', month: 'long', day: 'numeric' };
    document.getElementById('modalJoin').textContent = joinDate.toLocaleDateString('id-ID', options);
    
    document.getElementById('modalRating').textContent = '4.8 (32 ulasan)'; // Placeholder
    document.getElementById('modalPerfRating').textContent = '4.8';

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
    document.getElementById('modalPhone').textContent  = data.phone || '-';
    document.getElementById('modalEmail').textContent  = data.email;
    document.getElementById('modalOrders').textContent = '0 pesanan';
    document.getElementById('modalOrdersPerf').textContent = '0';

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
  };

  window.closeModal = function() {
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

  // ── 3. AUTO-OPEN DETAIL DARI URL ─────────────────────────
  const urlParams = new URLSearchParams(window.location.search);
  const targetId = urlParams.get('id');
  if (targetId) {
    // Beri sedikit delay agar data 'customers' sudah siap (jika load async)
    // Karena ini blade, data sudah ada di variabel 'customers' di atas
    setTimeout(() => {
        window.openCustomerDetail(targetId);
    }, 500);
  }
});
</script>
@endpush