@extends('admin.layouts.app')

@section('css')
  <link rel="stylesheet" href="{{ asset('assets/css/admin/notifikasi.css') }}">
@endsection

@section('content')
<main class="main-wrapper">
  <!-- TOPBAR -->
  <header class="topbar">
    <button class="topbar-toggle" id="sidebarToggle"><i class="fa-solid fa-bars"></i></button>
    <div class="topbar-title header-title-block">
      <h2>Notifikasi</h2>
      <p>Kelola dan pantau semua notifikasi yang dikirimkan melalui platform.</p>
    </div>
    <div class="topbar-right">
      <div class="search-box">
        <i class="fa-solid fa-search"></i>
        <input type="text" placeholder="Cari notifikasi..." />
      </div>
      <button class="topbar-icon-btn notif-btn">
        <i class="fa-solid fa-bell"></i>
        <span class="dot-badge">1</span>
      </button>
      <div class="topbar-user-wrap">
        <div class="topbar-user" id="notifProfileToggle">
          <div class="user-avatar">SA</div>
          <div class="user-info">
            <span class="user-name">Super Admin</span>
            <span class="user-role">Administrator</span>
          </div>
          <i class="fa-solid fa-chevron-down notif-profile-chevron"></i>
        </div>
      </div>
    </div>
  </header>

  <div class="content-area">

    <!-- STATS CARDS -->
    <div class="stats-grid">
      <div class="stat-card">
        <div class="stat-icon" style="background:#eff6ff; color:var(--primary)"><i class="fa-solid fa-bell"></i></div>
        <div class="sd">
          <div class="stat-label">Total Notifikasi</div>
          <div class="stat-value" id="stat-total">0</div>
          <div class="stat-sub">Semua notifikasi</div>
        </div>
      </div>
      <div class="stat-card">
        <div class="stat-icon" style="background:#f5f3ff; color:#7c3aed"><i class="fa-solid fa-star"></i></div>
        <div class="sd">
          <div class="stat-label">Review & Rating</div>
          <div class="stat-value" id="stat-review">0</div>
          <div class="stat-sub" id="sub-review">0% dari total</div>
        </div>
      </div>
      <div class="stat-card">
        <div class="stat-icon" style="background:#fef2f2; color:#dc2626"><i class="fa-solid fa-circle-exclamation"></i></div>
        <div class="sd">
          <div class="stat-label">Komplain / Laporan</div>
          <div class="stat-value" id="stat-komplain">0</div>
          <div class="stat-sub" id="sub-komplain">0% dari total</div>
        </div>
      </div>
    </div>

    <!-- MAIN BODY (Identical to Review) -->
    <div class="table-detail-wrapper" style="flex:1; display:flex; overflow:hidden; margin-top:12px; gap:16px;">

      <!-- TABLE SECTION -->
      <div class="table-section" style="flex:1; display:flex; flex-direction:column; min-width:0; background:#fff; border-radius:10px; border:1px solid #e2e8f0; overflow:hidden;">
        
        <!-- TABS -->
        <div class="tabs-bar">
          <div class="tabs-left">
            <button class="tab-btn active" data-tab="semua">Semua <span class="tab-count" id="tab-count-semua">0</span></button>
            <button class="tab-btn" data-tab="Review & Rating">Review & Rating <span class="tab-count" id="tab-count-review">0</span></button>
            <button class="tab-btn" data-tab="Komplain">Komplain <span class="tab-count" id="tab-count-komplain">0</span></button>
          </div>
          <button class="btn-primary" id="btnBuatNotif" style="background:var(--primary); color:#fff; padding:6px 12px; border-radius:6px; font-size:12px; margin-right:10px">
            <i class="fa-solid fa-plus"></i> Buat Notifikasi
          </button>
        </div>

        <!-- FILTER TOOLBAR -->
        <div class="filter-bar" style="display:flex; gap:10px; padding:12px; border-bottom:1px solid #f1f5f9; flex-wrap:wrap">
          <div class="filter-search" style="flex:1; position:relative">
            <i class="fa-solid fa-search" style="position:absolute; left:12px; top:50%; transform:translateY(-50%); color:#94a3b8"></i>
            <input type="text" id="tableSearch" placeholder="Cari notifikasi..." style="width:100%; padding:8px 12px 8px 34px; border:1px solid #e2e8f0; border-radius:6px; font-size:13px">
          </div>
          <select id="filterModul" style="padding:8px 12px; border:1px solid #e2e8f0; border-radius:6px; font-size:13px; color:#64748b">
            <option value="semua">Semua Modul</option>
            <option value="Review & Rating">Review & Rating</option>
            <option value="Komplain">Komplain / Laporan</option>
          </select>
          <button id="btnResetFilter" style="padding:8px 12px; background:#f1f5f9; border-radius:6px; font-size:13px; color:#64748b"><i class="fa-solid fa-rotate-left"></i> Reset</button>
        </div>

        <!-- TABLE -->
        <div class="table-wrapper">
          <table class="notif-table">
            <thead>
              <tr>
                <th width="40"><input type="checkbox" id="checkAll"></th>
                <th>Judul Notifikasi</th>
                <th>Modul</th>
                <th>Tipe</th>
                <th>Penerima</th>
                <th>Waktu</th>
                <th width="60">Aksi</th>
              </tr>
            </thead>
            <tbody id="notifTableBody"></tbody>
          </table>
        </div>

        <!-- PAGINATION -->
        <div class="pagination-bar">
          <span class="pagination-info" id="paginationInfo"></span>
          <div class="pagination-right" style="display:flex; align-items:center; gap:12px">
            <select id="pageSizeSelect" class="page-size-select">
              <option value="10">10 / halaman</option>
              <option value="25">25 / halaman</option>
            </select>
            <div class="pagination-btns" id="paginationBtns"></div>
          </div>
        </div>
      </div>

      <!-- DETAIL PANEL (Identical to Review) -->
      <div class="detail-panel" id="detailPanel" style="display:none">
        <div class="detail-header">
          <h3>Detail Notifikasi</h3>
          <button class="detail-close" id="detailClose">✕</button>
        </div>
        <div class="detail-body" id="detailBody"></div>
      </div>

    </div>
  </div>
</main>

<!-- Modal Overlay for Mobile Detail -->
<div class="detail-popup-overlay" id="detailPopupOverlay">
    <div class="detail-popup-box">
        <div class="detail-header">
            <h3>Detail Notifikasi</h3>
            <button class="detail-close" id="detailPopupClose">✕</button>
        </div>
        <div class="detail-body" id="detailPopupBody"></div>
    </div>
</div>

@endsection

@push('scripts')
<script>
'use strict';
let notifications = @json($notificationsData);
let activeTab = 'semua', searchQ = '', filterModul = 'semua';
let currentPage = 1, pageSize = 10;
let selectedIdRaw = null;

function updateStats() {
    const total = notifications.length;
    const reviewCount = notifications.filter(n => n.modul === 'Review & Rating').length;
    const komplainCount = notifications.filter(n => n.modul === 'Komplain').length;

    document.getElementById('stat-total').textContent = total.toLocaleString('id-ID');
    document.getElementById('stat-review').textContent = reviewCount.toLocaleString('id-ID');
    document.getElementById('stat-komplain').textContent = komplainCount.toLocaleString('id-ID');

    const calcPct = (val) => total > 0 ? ((val / total) * 100).toFixed(1) + '%' : '0%';
    document.getElementById('sub-review').textContent = `${calcPct(reviewCount)} dari total`;
    document.getElementById('sub-komplain').textContent = `${calcPct(komplainCount)} dari total`;

    document.getElementById('tab-count-semua').textContent = total;
    document.getElementById('tab-count-review').textContent = reviewCount;
    document.getElementById('tab-count-komplain').textContent = komplainCount;
}

function getFiltered() {
    return notifications.filter(n => {
        if (activeTab !== 'semua' && n.modul !== activeTab) return false;
        if (filterModul !== 'semua' && n.modul !== filterModul) return false;
        if (searchQ) {
            const q = searchQ.toLowerCase();
            return n.judul.toLowerCase().includes(q) || n.penerima.toLowerCase().includes(q);
        }
        return true;
    });
}

function renderTable() {
    const filtered = getFiltered();
    const total = filtered.length;
    const start = (currentPage - 1) * pageSize;
    const pageData = filtered.slice(start, start + pageSize);
    const tbody = document.getElementById('notifTableBody');

    if (!pageData.length) {
        tbody.innerHTML = `<tr><td colspan="7" style="text-align:center;padding:40px;color:#94a3b8">Tidak ada data notifikasi</td></tr>`;
        updatePagination(0, 0);
        return;
    }

    tbody.innerHTML = pageData.map((n) => `
        <tr class="notif-row ${selectedIdRaw == n.id_raw ? 'selected' : ''}" onclick="openDetail('${n.id_raw}')">
            <td><input type="checkbox" onclick="event.stopPropagation()"></td>
            <td>
                <div style="display:flex; align-items:center; gap:10px">
                    <div style="width:32px; height:32px; background:${n.iconBg}; color:${n.iconColor}; border-radius:6px; display:flex; align-items:center; justify-content:center">
                        <i class="fa-solid ${n.iconClass}"></i>
                    </div>
                    <div>
                        <div style="font-weight:600; color:#0f172a">${n.judul}</div>
                        <div style="font-size:11.5px; color:#64748b">${n.sub}</div>
                    </div>
                </div>
            </td>
            <td><span class="module-badge ${n.modulClass}">${n.modul}</span></td>
            <td><div style="display:flex; gap:4px">${n.tipe.map(t => `<span style="background:#f1f5f9; padding:2px 6px; border-radius:4px; font-size:11px">${t}</span>`).join('')}</div></td>
            <td>${n.penerima}</td>
            <td style="font-size:12px; color:#64748b">${n.waktu.replace('\n', '<br>')}</td>
            <td>
                <div class="action-menu-wrap">
                    <button class="aksi-btn" onclick="event.stopPropagation();toggleActionMenu(this)"><i class="fa-solid fa-ellipsis-vertical"></i></button>
                    <div class="action-dropdown">
                        <button class="ad-delete" onclick="event.stopPropagation();deleteNotif('${n.id_raw}')"><i class="fa-solid fa-trash"></i> Hapus</button>
                    </div>
                </div>
            </td>
        </tr>
    `).join('');

    updatePagination(total, pageData.length);
}

function updatePagination(total, currentCount) {
    const tp = Math.ceil(total / pageSize) || 1;
    const start = total === 0 ? 0 : (currentPage - 1) * pageSize + 1;
    const end = (currentPage - 1) * pageSize + currentCount;
    document.getElementById('paginationInfo').textContent = `Menampilkan ${start} - ${end} dari ${total} data`;
    
    let h = `<button class="page-btn" ${currentPage === 1 ? 'disabled' : ''} onclick="goPage(${currentPage - 1})">‹</button>`;
    for (let i = 1; i <= tp; i++) {
        if (i === 1 || i === tp || (i >= currentPage - 1 && i <= currentPage + 1)) {
            h += `<button class="page-btn ${i === currentPage ? 'active' : ''}" onclick="goPage(${i})">${i}</button>`;
        } else if (i === currentPage - 2 || i === currentPage + 2) {
            h += `<span style="padding:0 4px; color:#94a3b8">…</span>`;
        }
    }
    h += `<button class="page-btn" ${currentPage === tp ? 'disabled' : ''} onclick="goPage(${currentPage + 1})">›</button>`;
    document.getElementById('paginationBtns').innerHTML = h;
}

function goPage(p) { currentPage = p; renderTable(); clearDetail(); window.scrollTo({top:0, behavior:'smooth'}); }

function toggleActionMenu(btn) {
    const dropdown = btn.nextElementSibling;
    const isOpen = dropdown.classList.contains('show');
    document.querySelectorAll('.action-dropdown.show').forEach(d => d.classList.remove('show'));
    if (!isOpen) dropdown.classList.add('show');
}

function openDetail(idRaw) {
    const n = notifications.find(x => x.id_raw == idRaw);
    if (!n) return;
    selectedIdRaw = idRaw;
    renderTable();

    const html = `
        <div style="padding-bottom:16px; border-bottom:1px solid #f1f5f9">
            <div style="font-weight:700; font-size:16px; color:#0f172a">${n.judul}</div>
            <div style="font-size:13px; color:#64748b; margin-top:4px">${n.sub}</div>
        </div>
        <div style="margin-top:16px">
            <div style="font-size:12px; font-weight:700; color:#94a3b8; text-transform:uppercase; margin-bottom:10px">Informasi Notifikasi</div>
            <div style="display:flex; flex-direction:column; gap:8px">
                <div style="display:flex; justify-content:space-between; font-size:13px"><span style="color:#64748b">Modul</span><span class="module-badge ${n.modulClass}">${n.modul}</span></div>
                <div style="display:flex; justify-content:space-between; font-size:13px"><span style="color:#64748b">Penerima</span><span style="font-weight:600">${n.penerima}</span></div>
                <div style="display:flex; justify-content:space-between; font-size:13px"><span style="color:#64748b">Waktu</span><span style="font-weight:600">${n.dibuatPada}</span></div>
            </div>
        </div>
        <div style="margin-top:20px; padding:12px; background:#f8fafc; border-radius:8px; font-size:13px; color:#334155; line-height:1.6">
            ${n.konten.replace(/\n/g, '<br>')}
        </div>
        <div style="margin-top:auto; padding-top:20px">
            <button onclick="deleteNotif('${n.id_raw}')" style="width:100%; padding:10px; background:#fff; color:#dc2626; border:1.5px solid #dc2626; border-radius:6px; font-weight:600; cursor:pointer">
                <i class="fa-solid fa-trash"></i> Hapus Notifikasi
            </button>
        </div>
    `;

    if (window.innerWidth < 1100) {
        document.getElementById('detailPopupBody').innerHTML = html;
        document.getElementById('detailPopupOverlay').classList.add('open');
    } else {
        document.getElementById('detailBody').innerHTML = html;
        document.getElementById('detailPanel').style.display = 'flex';
    }
}

function clearDetail() {
    selectedIdRaw = null;
    document.getElementById('detailPanel').style.display = 'none';
    document.getElementById('detailPopupOverlay').classList.remove('open');
}

window.deleteNotif = function(id) {
    if (!confirm('Hapus notifikasi ini secara permanen dari database?')) return;
    fetch(`/admin/notifikasi/${id}`, {
        method: 'DELETE',
        headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
    })
    .then(r => r.json())
    .then(data => {
        if (data.success) {
            notifications = notifications.filter(n => n.id_raw != id);
            updateStats(); renderTable(); clearDetail();
            alert(data.message);
        }
    });
};

document.addEventListener('DOMContentLoaded', () => {
    updateStats(); renderTable();
    document.getElementById('detailClose').onclick = clearDetail;
    document.getElementById('detailPopupClose').onclick = clearDetail;
    document.getElementById('tableSearch').oninput = (e) => { searchQ = e.target.value; currentPage = 1; renderTable(); };
    document.getElementById('filterModul').onchange = (e) => { filterModul = e.target.value; currentPage = 1; renderTable(); };
    document.getElementById('btnResetFilter').onclick = () => { searchQ = ''; filterModul = 'semua'; document.getElementById('tableSearch').value = ''; document.getElementById('filterModul').value = 'semua'; currentPage = 1; renderTable(); };
    document.querySelectorAll('.tab-btn').forEach(b => b.onclick = () => { document.querySelectorAll('.tab-btn').forEach(x => x.classList.remove('active')); b.classList.add('active'); activeTab = b.dataset.tab; currentPage = 1; renderTable(); clearDetail(); });
    document.addEventListener('click', () => document.querySelectorAll('.action-dropdown.show').forEach(d => d.classList.remove('show')));
});
</script>
@endpush
