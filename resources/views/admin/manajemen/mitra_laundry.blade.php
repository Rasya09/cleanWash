@extends('admin.layouts.app')

@section('css')
  <link rel="stylesheet" href="{{ asset('assets/css/admin/mitra_laundry.css') }}">
  <style>
    /* Tambahan style untuk pagination laravel */
    .pagination-wrapper { margin-top: 20px; display: flex; justify-content: space-between; align-items: center; }
    .pagination { display: flex; gap: 5px; list-style: none; padding: 0; }
    .pagination li a, .pagination li span { padding: 5px 10px; border: 1px solid var(--line); border-radius: 4px; text-decoration: none; color: var(--g700); }
    .pagination li.active span { background: var(--p500); color: #fff; border-color: var(--p500); }
    .pagination li.disabled span { color: var(--g400); cursor: not-allowed; }
    
    /* Warna baru untuk suspended */
    .pill.pink, .pill.suspended { background: #fdf2f8; color: #db2777; border: 1px solid #f9a8d4; }
    .stat-icon.pink { background: #fdf2f8; color: #db2777; }
  </style>
@endsection

@section('content')
    <div class="app">
    <main class="main">
      <section class="content">
        <div class="center-panel">
          
          <!-- Kartu Statistik -->
          <div class="stats">
            <div class="stat-card">
              <div class="stat-icon blue">🏪</div>
              <div>
                <div class="stat-label">Total Mitra</div>
                <div class="stat-value">{{ $totalMitra }}</div>
                <div class="stat-sub">Semua mitra terdaftar</div>
              </div>
            </div>
            <div class="stat-card">
              <div class="stat-icon green">🛡</div>
              <div>
                <div class="stat-label">Terverifikasi</div>
                <div class="stat-value">{{ $verifiedMitra }}</div>
                <div class="stat-sub">{{ $totalMitra > 0 ? round(($verifiedMitra/$totalMitra)*100, 1) : 0 }}% dari total mitra</div>
              </div>
            </div>
            <div class="stat-card">
              <div class="stat-icon orange">⏲</div>
              <div>
                <div class="stat-label">Menunggu Verifikasi</div>
                <div class="stat-value">{{ $pendingMitra }}</div>
                <div class="stat-sub">Perlu review admin</div>
              </div>
            </div>
            <div class="stat-card">
              <div class="stat-icon pink">⏻</div>
              <div>
                <div class="stat-label">Suspended</div>
                <div class="stat-value">{{ $suspendedMitra ?? 0 }}</div>
                <div class="stat-sub">Mitra diblokir sementara</div>
              </div>
            </div>
          </div>

          <!-- Tab Navigasi Status -->
          <div class="tabs">
            <a class="tab {{ !request('status') || request('status') == 'all' ? 'active' : '' }}" href="{{ route('admin.mitra', ['status' => 'all']) }}">Semua</a>
            <a class="tab {{ request('status') == 'approved' ? 'active' : '' }}" href="{{ route('admin.mitra', ['status' => 'approved']) }}">Terverifikasi</a>
            <a class="tab {{ request('status') == 'pending' ? 'active' : '' }}" href="{{ route('admin.mitra', ['status' => 'pending']) }}">Menunggu Verifikasi</a>
            <a class="tab {{ request('status') == 'suspended' ? 'active' : '' }}" href="{{ route('admin.mitra', ['status' => 'suspended']) }}">Suspended</a>
            <a class="tab {{ request('status') == 'rejected' ? 'active' : '' }}" href="{{ route('admin.mitra', ['status' => 'rejected']) }}">Ditolak</a>
          </div>

          <!-- Toolbar (Filter & Search) -->
          <form action="{{ route('admin.mitra') }}" method="GET" class="toolbar">
            <input type="hidden" name="status" value="{{ request('status', 'all') }}">
            <div class="search small">
              <input type="text" name="search" placeholder="Cari mitra laundry..." value="{{ request('search') }}" />
              <button type="submit" style="background:none; border:none; cursor:pointer;"><span>⌕</span></button>
            </div>

            <select name="status" onchange="this.form.submit()">
              <option value="all" {{ request('status') == 'all' ? 'selected' : '' }}>Semua Status</option>
              <option value="approved" {{ request('status') == 'approved' ? 'selected' : '' }}>Approved</option>
              <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
              <option value="suspended" {{ request('status') == 'suspended' ? 'selected' : '' }}>Suspended</option>
              <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>Rejected</option>
            </select>
            <button type="button" class="filter-btn" onclick="window.location.href='{{ route('admin.mitra') }}'">Reset</button>
          </form>

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
                @forelse($mitras as $mitra)
                <tr onclick="openModal({{ json_encode($mitra) }})" style="cursor: pointer;">
                  <td class="check"><input type="checkbox" onclick="event.stopPropagation()"></td>
                  <td>
                    <div class="partner">
                      <div class="logo {{ ['blue','sky','navy','red','orange'][($loop->index % 5)] }}">
                        @if($mitra->logo)
                          <img src="{{ asset('storage/'.$mitra->logo) }}" alt="Logo" style="width:100%; height:100%; border-radius:50%; object-fit:cover;">
                        @else
                          {{ substr($mitra->store_name, 0, 1) }}
                        @endif
                      </div>
                      <div>
                        <strong>{{ $mitra->store_name }}</strong>
                        <span>#MITRA-{{ str_pad($mitra->id, 4, '0', STR_PAD_LEFT) }}</span>
                      </div>
                    </div>
                  </td>
                  <td>{{ $mitra->owner_name }}<br><small>{{ $mitra->phone }}</small></td>
                  <td>{{ $mitra->city }}</td>
                  <td class="rating">★ {{ $mitra->average_rating }} <span>({{ $mitra->reviews_count ?? $mitra->reviews()->count() }})</span></td>
                  <td>
                    @php
                      $statusClass = 'yellow';
                      $statusLabel = 'Menunggu';
                      if($mitra->status == 'approved') { $statusClass = 'green'; $statusLabel = 'Terverifikasi'; }
                      elseif($mitra->status == 'rejected') { $statusClass = 'red'; $statusLabel = 'Ditolak'; }
                      elseif($mitra->status == 'suspended') { $statusClass = 'pink'; $statusLabel = 'Suspended'; }
                    @endphp
                    <span class="pill {{ $statusClass }}">{{ $statusLabel }}</span>
                  </td>
                  <td>{{ $mitra->created_at->format('d M Y') }}</td>
                  <td><button class="icon-btn">◉</button><button class="icon-btn">⋮</button></td>
                </tr>
                @empty
                <tr>
                  <td colspan="8" style="text-align: center; padding: 20px;">Tidak ada data mitra ditemukan.</td>
                </tr>
                @endforelse
              </tbody>
            </table>
          </div>

          <!-- Footer Tabel (Pagination) -->
          <div class="table-footer">
            <div>Menampilkan {{ $mitras->firstItem() ?? 0 }} - {{ $mitras->lastItem() ?? 0 }} dari {{ $mitras->total() }} data</div>
            <div class="pagination-wrapper">
                {{ $mitras->appends(request()->query())->links() }}
            </div>
          </div>
        </div>
      </section>
    </main>
  </div>

  <!-- ========== MODAL DETAIL MITRA ========== -->
  <div class="modal-overlay" id="mitraModal" role="dialog" aria-modal="true" aria-labelledby="modalTitle">
    <div class="modal-box">
      <div class="modal-header">
        <h2 id="modalTitle">Detail Mitra Laundry</h2>
        <button class="modal-close" id="modalClose" aria-label="Tutup">&times;</button>
      </div>

      <div class="modal-body">
        <div class="modal-hero">
          <div class="modal-hero-img" id="modalHeroEmoji">🧺</div>
          <div class="modal-hero-info">
            <span class="pill" id="modalStatusBadge">Status</span>
            <h3 id="modalName">Nama Toko</h3>
            <div class="meta" id="modalId">#ID</div>
            <div class="meta rating" id="modalRating">★ 0.0 <span>(0 ulasan)</span></div>
            <div class="meta" id="modalJoin">Bergabung: -</div>
          </div>
        </div>

        <div class="modal-tabs" role="tablist">
          <button class="active" data-tab="info" role="tab">Informasi</button>
          <button data-tab="layanan" role="tab">Layanan</button>
          <button data-tab="performa" role="tab">Performa</button>
          <button data-tab="dokumen" role="tab">Dokumen</button>
        </div>

        <!-- Tab: Informasi -->
        <div class="modal-tab-content active" id="tab-info">
          <div class="modal-info-grid">
            <div>Pemilik</div>           <div id="modalOwner">-</div>
            <div>No. WhatsApp</div>      <div id="modalPhone">-</div>
            <div>Email</div>             <div id="modalEmail">-</div>
            <div>Alamat Toko</div>       <div id="modalAddress">-</div>
            <div>Kota</div>              <div id="modalCity">-</div>
            <div>Jam Operasional</div>   <div id="modalHours">-</div>
            <div>Antar Jemput</div>      <div><span class="pill green soft" id="modalPickup">Tersedia</span></div>
            <div>Radius Layanan</div>    <div id="modalRadius">-</div>
          </div>
        </div>

        <!-- Tab: Layanan -->
        <div class="modal-tab-content" id="tab-layanan">
          <div class="layanan-list" id="modalLayananList">
            <!-- Dinamis lewat JS -->
          </div>
        </div>

        <!-- Tab: Performa -->
        <div class="modal-tab-content" id="tab-performa">
          <div class="modal-perf-item"><span>⭐ Rating Rata-rata</span><b id="modalPerfRating">0.0</b></div>
          <div class="modal-perf-item"><span>📦 Total Layanan</span><b id="modalTotalServices">0</b></div>
        </div>

        <!-- Tab: Dokumen -->
        <div class="modal-tab-content" id="tab-dokumen">
          <div class="doc-list" id="modalDocList">
            <!-- Dinamis lewat JS -->
          </div>
        </div>

        <div class="modal-footer">
          <div class="row">
            <button class="primary" id="btnViewOrders">▣ Lihat Pesanan Mitra</button>
          </div>
          <button class="danger-btn" id="btnSuspendMitra" style="margin-top:15px; width: 100%;">⏻ Blokir Mitra</button>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
  const modal = document.getElementById('mitraModal');
  const modalClose = document.getElementById('modalClose');
  const btnSuspend = document.getElementById('btnSuspendMitra');
  let selectedMitraId = null;

  window.openModal = function(mitra) {
    selectedMitraId = mitra.id;
    document.getElementById('modalName').textContent = mitra.store_name;
    document.getElementById('modalId').textContent = '#MITRA-' + mitra.id.toString().padStart(4, '0');
    document.getElementById('modalJoin').textContent = 'Bergabung: ' + new Date(mitra.created_at).toLocaleDateString('id-ID', {day:'numeric', month:'long', year:'numeric'});
    
    // Status
    const badge = document.getElementById('modalStatusBadge');
    let statusLabel = 'Menunggu';
    let statusClass = 'yellow';
    if(mitra.status == 'approved') { statusLabel = 'Terverifikasi'; statusClass = 'green'; }
    else if(mitra.status == 'rejected') { statusLabel = 'Ditolak'; statusClass = 'red'; }
    else if(mitra.status == 'suspended') { statusLabel = 'Suspended'; statusClass = 'pink'; }
    badge.textContent = statusLabel;
    badge.className = 'pill ' + statusClass;

    // Suspend Button Text
    btnSuspend.textContent = mitra.status === 'suspended' ? '⏻ Pulihkan Akses Mitra' : '⏻ Blokir Mitra';
    btnSuspend.className = 'danger-btn'; // Always use the same style
    btnSuspend.style.backgroundColor = '';
    btnSuspend.style.color = '';
    btnSuspend.style.borderColor = '';

    // Info
    document.getElementById('modalOwner').textContent = mitra.owner_name;
    document.getElementById('modalPhone').textContent = mitra.phone;
    document.getElementById('modalEmail').textContent = mitra.email;
    document.getElementById('modalAddress').textContent = mitra.address;
    document.getElementById('modalCity').textContent = mitra.city;
    document.getElementById('modalHours').textContent = (mitra.open_time || '07:00') + ' - ' + (mitra.close_time || '21:00');
    document.getElementById('modalRadius').textContent = (mitra.service_radius || '0') + ' km';
    
    // Rating
    document.getElementById('modalRating').innerHTML = '★ ' + (mitra.average_rating || '0.0') + ' <span>(' + (mitra.reviews_count || 0) + ' ulasan)</span>';
    document.getElementById('modalPerfRating').textContent = mitra.average_rating || '0.0';

    // Layanan
    const layananList = document.getElementById('modalLayananList');
    layananList.innerHTML = '';
    if(mitra.services && mitra.services.length > 0) {
        mitra.services.forEach(s => {
            layananList.innerHTML += `
                <div class="layanan-item">
                  <div><strong>${s.service_name}</strong><br><span style="color:var(--muted);font-size:11px">${s.description || '-'}</span></div>
                  <span class="price">Rp ${new Intl.NumberFormat('id-ID').format(s.base_price)}</span>
                </div>
            `;
        });
        document.getElementById('modalTotalServices').textContent = mitra.services.length;
    } else {
        layananList.innerHTML = '<p style="text-align:center; padding:10px; color:var(--g500);">Belum ada layanan.</p>';
        document.getElementById('modalTotalServices').textContent = '0';
    }

    // Dokumen
    const docList = document.getElementById('modalDocList');
    docList.innerHTML = '';
    const docs = [
        { name: 'KTP Pemilik', field: 'ktp', icon: '📄' },
        { name: 'NIB / SIUP', field: 'nib', icon: '🏢' },
        { name: 'NPWP', field: 'npwp', icon: '💳' }
    ];
    docs.forEach(doc => {
        const isUploaded = mitra[doc.field] != null;
        docList.innerHTML += `
            <div class="doc-item">
              <div class="doc-icon">${doc.icon}</div>
              <div class="doc-info">
                <strong>${doc.name}</strong>
                <span>${isUploaded ? 'Sudah diunggah' : 'Belum diunggah'}</span>
              </div>
              <div class="doc-status"><span class="pill ${isUploaded ? 'green' : 'red'} soft">${isUploaded ? 'Ada' : 'Kosong'}</span></div>
            </div>
        `;
    });

    switchTab('info');
    modal.classList.add('active');
    document.body.style.overflow = 'hidden';
  }

  btnSuspend.addEventListener('click', function() {
      if(!selectedMitraId) return;
      const isBlocking = btnSuspend.textContent.includes('Blokir');
      const action = isBlocking ? 'memblokir' : 'memulihkan akses';
      
      if(confirm(`Apakah Anda yakin ingin ${action} mitra ini?`)) {
          fetch(`/admin/mitra-laundry/${selectedMitraId}/suspend`, {
              method: 'POST',
              headers: {
                  'X-CSRF-TOKEN': '{{ csrf_token() }}',
                  'Accept': 'application/json'
              }
          })
          .then(res => res.json())
          .then(data => {
              if(data.success) {
                  alert(data.message);
                  location.reload(); // Refresh to update stats and list
              }
          })
          .catch(err => {
              console.error(err);
              alert('Terjadi kesalahan saat memproses permintaan.');
          });
      }
  });

  function closeModal() {
    modal.classList.remove('active');
    document.body.style.overflow = '';
  }

  modalClose.addEventListener('click', closeModal);
  modal.addEventListener('click', function (e) { if (e.target === modal) closeModal(); });
  
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

  // Auto-open modal if ID is present in URL
  const urlParams = new URLSearchParams(window.location.search);
  const openId = urlParams.get('id');
  if (openId) {
    // Find the mitra data from the rendered list
    const mitrasData = {!! json_encode($mitras->items()) !!};
    const mitraToOpen = mitrasData.find(m => m.id == openId);
    if (mitraToOpen) {
        setTimeout(() => openModal(mitraToOpen), 100);
    }
  }
  });
  </script>
@endpush
