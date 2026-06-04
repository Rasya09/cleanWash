@extends('admin.layouts.app')

@section('css')
  <link rel="stylesheet" href="{{ asset('assets/css/admin/notifikasi.css') }}">
@endsection

@section('content')
<!-- MAIN WRAPPER -->
<div class="main-wrapper">

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
        <input type="text" placeholder="Cari notifikasi, judul, modul..." />
      </div>
      <button class="topbar-icon-btn notif-btn">
        <i class="fa-solid fa-bell"></i>
        <span class="dot-badge">1</span>
      </button>
      <div class="topbar-user-wrap">
        <div class="topbar-user" id="notifProfileToggle" role="button" tabindex="0" aria-haspopup="true" aria-expanded="false">
          <div class="user-avatar">SA</div>
          <div class="user-info">
            <span class="user-name">Super Admin</span>
            <span class="user-role">Administrator</span>
          </div>
          <i class="fa-solid fa-chevron-down notif-profile-chevron"></i>
        </div>
        <div class="topbar-user-menu" id="notifProfileMenu">
          <a href="#" class="topbar-user-menu-item">Pengaturan Akun</a>
          <div class="topbar-user-menu-divider"></div>
          <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="topbar-user-menu-item logout-item">Log out</button>
          </form>
        </div>
      </div>
    </div>
  </header>

  <!-- CONTENT -->
  <div class="content-area">

    <!-- STATS CARDS -->
    <div class="stats-grid">
      <div class="stat-card stat-total">
        <div class="stat-icon"><i class="fa-solid fa-paper-plane"></i></div>
        <div class="stat-info">
          <div class="stat-label">Total Notifikasi</div>
          <div class="stat-value">12.458</div>
          <div class="stat-sub">Semua notifikasi</div>
        </div>
      </div>
      <div class="stat-card stat-sent">
        <div class="stat-icon"><i class="fa-solid fa-circle-check"></i></div>
        <div class="stat-info">
          <div class="stat-label">Terkirim</div>
          <div class="stat-value">11.032</div>
          <div class="stat-sub">88,6% dari total</div>
        </div>
      </div>
      <div class="stat-card stat-scheduled">
        <div class="stat-icon"><i class="fa-solid fa-clock"></i></div>
        <div class="stat-info">
          <div class="stat-label">Terjadwal</div>
          <div class="stat-value">1.245</div>
          <div class="stat-sub">10,0% dari total</div>
        </div>
      </div>
      <div class="stat-card stat-failed">
        <div class="stat-icon"><i class="fa-solid fa-circle-xmark"></i></div>
        <div class="stat-info">
          <div class="stat-label">Gagal Terkirim</div>
          <div class="stat-value">181</div>
          <div class="stat-sub">1,4% dari total</div>
        </div>
      </div>
    </div>

    <!-- TABLE SECTION + DETAIL PANEL (inline, visible ≥1100px) -->
    <div class="table-detail-wrapper">

      <!-- TABLE SECTION -->
      <div class="table-section" id="tableSection">

        <!-- FILTER BAR -->
        <div class="filter-bar">
          <div class="filter-search">
            <i class="fa-solid fa-search"></i>
            <input type="text" placeholder="Cari judul notifikasi, modul, atau penerima..." id="tableSearch" />
          </div>
          <select class="filter-select">
            <option>Semua Modul</option>
            <option>Pesanan</option>
            <option>Pembayaran</option>
            <option>Review & Rating</option>
            <option>Verifikasi Mitra</option>
            <option>Komplain</option>
            <option>Laporan</option>
            <option>Marketing</option>
            <option>Keamanan</option>
          </select>
          <select class="filter-select">
            <option>Semua Tipe</option>
            <option>Email</option>
            <option>Push</option>
            <option>SMS</option>
          </select>
          <select class="filter-select">
            <option>Status</option>
            <option>Terkirim</option>
            <option>Terjadwal</option>
            <option>Gagal</option>
            <option>Draf</option>
          </select>
          <div class="filter-date">
            <i class="fa-regular fa-calendar"></i>
            <span>1 Mei 2024 - 31 Mei 2024</span>
          </div>
          <button class="btn-filter"><i class="fa-solid fa-filter"></i> Filter</button>
        </div>

        <!-- TABS -->
        <div class="tabs-bar">
          <div class="tabs-left">
            <button class="tab-btn active" data-tab="semua">Semua <span class="tab-count">12.458</span></button>
            <button class="tab-btn" data-tab="terkirim">Terkirim <span class="tab-count">11.032</span></button>
            <button class="tab-btn" data-tab="terjadwal">Terjadwal <span class="tab-count">1.245</span></button>
            <button class="tab-btn" data-tab="gagal">Gagal <span class="tab-count">181</span></button>
            <button class="tab-btn" data-tab="draf">Draf <span class="tab-count">156</span></button>
          </div>
          <button class="btn-primary" id="btnBuatNotif">
            <i class="fa-solid fa-plus"></i> <span class="btn-label">Buat Notifikasi</span>
          </button>
        </div>

        <!-- TABLE -->
        <div class="table-wrapper">
          <table class="notif-table" id="notifTable">
            <thead>
              <tr>
                <th class="th-check"><input type="checkbox" id="checkAll" /></th>
                <th>Judul Notifikasi</th>
                <th>Modul</th>
                <th>Tipe</th>
                <th>Penerima</th>
                <th>Status</th>
                <th>Waktu</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody id="notifTableBody">
              <!-- Rows injected by JS -->
            </tbody>
          </table>
        </div>

        <!-- PAGINATION -->
        <div class="pagination-bar">
          <span class="pagination-info">Menampilkan 1 - 10 dari 12.458 data</span>
          <div class="pagination-right">
            <select class="page-size-select">
              <option>10 / halaman</option>
              <option>25 / halaman</option>
              <option>50 / halaman</option>
            </select>
            <div class="pagination-btns">
              <button class="page-btn" disabled><i class="fa-solid fa-chevron-left"></i></button>
              <button class="page-btn active">1</button>
              <button class="page-btn">2</button>
              <button class="page-btn">3</button>
              <button class="page-btn">4</button>
              <button class="page-btn">5</button>
              <span class="page-ellipsis">…</span>
              <button class="page-btn">1.246</button>
              <button class="page-btn"><i class="fa-solid fa-chevron-right"></i></button>
            </div>
          </div>
        </div>
      </div>

      <!-- DETAIL PANEL — inline sidebar (visible ≥1100px only via CSS) -->
      <div class="detail-panel" id="detailPanel">
        <div class="detail-header">
          <h3>Detail Notifikasi</h3>
          <button class="detail-close" id="detailClose"><i class="fa-solid fa-xmark"></i></button>
        </div>
        <div class="detail-body" id="detailBody">
          <div class="detail-empty">
            <i class="fa-solid fa-bell-slash"></i>
            <p>Pilih notifikasi untuk melihat detail</p>
          </div>
        </div>
      </div>

    </div><!-- /table-detail-wrapper -->
  </div><!-- /content-area -->
</div><!-- /main-wrapper -->

<!-- DETAIL POPUP — overlay modal (visible <1100px) -->
<div class="detail-popup-overlay" id="detailPopupOverlay">
  <div class="detail-popup-box" id="detailPopupBox">
    <div class="detail-header">
      <h3>Detail Notifikasi</h3>
      <button class="detail-close" id="detailPopupClose"><i class="fa-solid fa-xmark"></i></button>
    </div>
    <div class="detail-body" id="detailPopupBody">
      <!-- Content injected by JS -->
    </div>
  </div>
</div>

<!-- SIDEBAR BACKDROP (mobile full-screen overlay) -->
<div class="sidebar-backdrop" id="sidebarBackdrop"></div>

<!-- MODAL BUAT NOTIFIKASI -->
<div class="modal-overlay" id="modalOverlay">
  <div class="modal-box">
    <div class="modal-header">
      <h3><i class="fa-solid fa-plus"></i> Buat Notifikasi Baru</h3>
      <button class="modal-close" id="modalClose"><i class="fa-solid fa-xmark"></i></button>
    </div>
    <div class="modal-body">
      <div class="form-group">
        <label>Judul Notifikasi</label>
        <input type="text" placeholder="Masukkan judul notifikasi..." class="form-input" />
      </div>
      <div class="form-row">
        <div class="form-group">
          <label>Modul</label>
          <select class="form-input">
            <option>Pilih Modul</option>
            <option>Pesanan</option>
            <option>Pembayaran</option>
            <option>Marketing</option>
          </select>
        </div>
        <div class="form-group">
          <label>Tipe</label>
          <select class="form-input">
            <option>Pilih Tipe</option>
            <option>Email</option>
            <option>Push</option>
            <option>SMS</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label>Penerima</label>
        <select class="form-input">
          <option>Pilih Penerima</option>
          <option>Customer</option>
          <option>Mitra Laundry</option>
          <option>Admin</option>
        </select>
      </div>
      <div class="form-group">
        <label>Konten Notifikasi</label>
        <textarea class="form-input form-textarea" placeholder="Tulis isi notifikasi..."></textarea>
      </div>
    </div>
    <div class="modal-footer">
      <button class="btn-secondary" id="modalCancel">Batal</button>
      <button class="btn-primary">Simpan sebagai Draf</button>
      <button class="btn-primary btn-send"><i class="fa-solid fa-paper-plane"></i> Kirim Sekarang</button>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script>
  /* =========================================
   LAUNDRYHUB – NOTIFIKASI ADMIN PANEL
   script.js — RESPONSIVE UPDATE
   ========================================= */

'use strict';

// ─── DATA ────────────────────────────────────────────────────────────────────
const notifications = @json($notificationsData);

// ─── HELPERS ─────────────────────────────────────────────────────────────────
function statusClass(s) {
  if (s === 'Terkirim') return 'stat-terkirim';
  if (s === 'Terjadwal') return 'stat-terjadwal';
  if (s === 'Gagal') return 'stat-gagal';
  return 'stat-draf';
}

function pct(val, total) {
  if (!total) return '0%';
  return Math.round((val / total) * 100) + '%';
}

/** True jika layar dalam mode popup (lebar < 1100px) */
function isPopupMode() {
  return window.innerWidth < 1100;
}

// ─── RENDER TABLE ────────────────────────────────────────────────────────────
function renderTable(data) {
  const tbody = document.getElementById('notifTableBody');
  if (!data.length) {
    tbody.innerHTML = `<tr><td colspan="8" style="text-align:center;padding:32px;color:var(--text-faint);">
      <i class="fa-solid fa-inbox" style="font-size:24px;display:block;margin-bottom:8px;"></i>Tidak ada data notifikasi</td></tr>`;
    return;
  }

  tbody.innerHTML = data.map((n, idx) => {
    const tipeHtml = n.tipe.map(t => `<span class="tipe-chip">${t}</span>`).join('');
    const waktLines = n.waktu.split('\n');
    return `
    <tr data-idx="${idx}" class="notif-row">
      <td><input type="checkbox" class="row-check" /></td>
      <td>
        <div class="notif-title-cell">
          <div class="row-icon" style="background:${n.iconBg};color:${n.iconColor}">
            <i class="fa-solid ${n.iconClass}"></i>
          </div>
          <div class="notif-title-info">
            <div class="title-main">${n.judul}</div>
            <div class="title-sub">${n.sub}</div>
          </div>
        </div>
      </td>
      <td><span class="module-badge ${n.modulClass}">${n.modul}</span></td>
      <td><div class="tipe-chips">${tipeHtml}</div></td>
      <td style="font-size:12.5px;color:var(--text-muted)">${n.penerima}</td>
      <td>
        <span class="status-badge ${statusClass(n.status)}">${n.status}</span>
        ${n.rate ? `<span class="stat-rate">${n.rate}</span>` : ''}
      </td>
      <td style="font-size:12px;color:var(--text-muted);white-space:nowrap">
        ${waktLines[0]}<br/><span style="color:var(--text-faint)">${waktLines[1] || ''}</span>
      </td>
      <td><button class="aksi-btn"><i class="fa-solid fa-ellipsis"></i></button></td>
    </tr>`;
  }).join('');

  // Click rows → detail
  tbody.querySelectorAll('.notif-row').forEach(tr => {
    tr.addEventListener('click', e => {
      if (e.target.closest('.aksi-btn') || e.target.closest('.row-check')) return;
      const idx = parseInt(tr.dataset.idx);
      tbody.querySelectorAll('.notif-row').forEach(r => r.classList.remove('selected'));
      tr.classList.add('selected');

      if (isPopupMode()) {
        showDetailPopup(data[idx]);
      } else {
        showDetailPanel(data[idx]);
      }
    });
  });

  // Aksi btn → stop propagation
  tbody.querySelectorAll('.aksi-btn').forEach(btn => {
    btn.addEventListener('click', e => e.stopPropagation());
  });
}

// ─── BUILD DETAIL HTML ───────────────────────────────────────────────────────
function buildDetailHTML(n) {
  const sentPct = pct(n.statTerkirim, n.statTotal);
  const readPct = pct(n.statTerbaca, n.statTotal);
  const failPct = pct(n.statGagal, n.statTotal);
  const kontenHtml = n.konten.replace(/\n/g, '<br/>');

  return `
    <div>
      <span class="detail-status-badge ${statusClass(n.status)}" style="margin-bottom:8px;display:inline-flex">${n.status}</span>
      <div class="detail-notif-title">${n.judul}</div>
      <div class="detail-notif-sub">${n.sub}</div>
    </div>

    <div class="detail-divider"></div>

    <div>
      <div class="detail-section-title">Informasi Notifikasi</div>
      <div class="detail-info-grid">
        <div class="detail-info-row"><span class="detail-info-key">ID Notifikasi</span><span class="detail-info-val" style="font-size:11px">#${n.id}</span></div>
        <div class="detail-info-row"><span class="detail-info-key">Modul</span><span class="detail-info-val"><span class="module-badge ${n.modulClass}" style="font-size:11px">${n.modul}</span></span></div>
        <div class="detail-info-row"><span class="detail-info-key">Tipe</span><span class="detail-info-val">${n.tipe.join(', ')}</span></div>
        <div class="detail-info-row"><span class="detail-info-key">Penerima</span><span class="detail-info-val">${n.penerima}</span></div>
        <div class="detail-info-row"><span class="detail-info-key">Dibuat oleh</span><span class="detail-info-val">${n.dibuat}</span></div>
        <div class="detail-info-row"><span class="detail-info-key">Dibuat pada</span><span class="detail-info-val" style="font-size:11px">${n.dibuatPada}</span></div>
      </div>
    </div>

    <div class="detail-divider"></div>

    <div>
      <div class="detail-section-title">Konten Notifikasi</div>
      <div class="detail-info-row" style="margin-bottom:8px"><span class="detail-info-key">Bahasa</span><span class="detail-info-val">${n.bahasa}</span></div>
      <div class="detail-content-box">${kontenHtml}</div>
    </div>

    <div class="detail-divider"></div>

    <div>
      <div class="detail-section-title">Statistik Pengiriman</div>
      <div class="detail-stat-row"><span class="detail-stat-key">Total Penerima</span><span class="detail-stat-val">${n.statTotal.toLocaleString('id-ID')}</span></div>
      <div class="detail-stat-row"><span class="detail-stat-key">Terkirim</span><span class="detail-stat-val val-green">${n.statTerkirim.toLocaleString('id-ID')} (${sentPct})</span></div>
      <div class="detail-stat-row"><span class="detail-stat-key">Terbaca</span><span class="detail-stat-val">${n.statTerbaca.toLocaleString('id-ID')} (${readPct})</span></div>
      <div class="detail-stat-row"><span class="detail-stat-key">Gagal</span><span class="detail-stat-val val-red">${n.statGagal.toLocaleString('id-ID')} (${failPct})</span></div>
    </div>

    <div class="detail-divider"></div>

    <div>
      <div class="detail-section-title">Aksi</div>
      <div class="detail-aksi">
        <button class="btn-kirim-ulang"><i class="fa-solid fa-paper-plane"></i> Kirim Ulang</button>
        <button class="btn-duplikat"><i class="fa-solid fa-copy"></i> Duplikat</button>
        <button class="btn-hapus"><i class="fa-solid fa-trash"></i> Hapus</button>
      </div>
    </div>
  `;
}

// ─── SHOW DETAIL — Inline panel (≥1100px) ────────────────────────────────────
function showDetailPanel(n) {
  const body = document.getElementById('detailBody');
  body.innerHTML = buildDetailHTML(n);
  const panel = document.getElementById('detailPanel');
  panel.style.animation = 'fadeIn .2s ease';
}

// ─── SHOW DETAIL — Popup modal (<1100px) ─────────────────────────────────────
function showDetailPopup(n) {
  const overlay = document.getElementById('detailPopupOverlay');
  const body    = document.getElementById('detailPopupBody');
  body.innerHTML = buildDetailHTML(n);
  body.scrollTop = 0;

  overlay.classList.add('open');
  document.body.style.overflow = 'hidden';
}

function closeDetailPopup() {
  const overlay = document.getElementById('detailPopupOverlay');
  overlay.classList.remove('open');
  document.body.style.overflow = '';
}

// ─── FILTER / SEARCH ─────────────────────────────────────────────────────────
function filterData() {
  const q = document.getElementById('tableSearch').value.toLowerCase();
  const activeTab = document.querySelector('.tab-btn.active').dataset.tab;

  return notifications.filter(n => {
    const matchTab = activeTab === 'semua' ||
      (activeTab === 'terkirim' && n.status === 'Terkirim') ||
      (activeTab === 'terjadwal' && n.status === 'Terjadwal') ||
      (activeTab === 'gagal' && n.status === 'Gagal') ||
      (activeTab === 'draf' && n.status === 'Draf');
    const matchQ = !q || n.judul.toLowerCase().includes(q) || n.sub.toLowerCase().includes(q) || n.penerima.toLowerCase().includes(q);
    return matchTab && matchQ;
  });
}

// ─── CLEAR DETAIL ─────────────────────────────────────────────────────────────
function clearDetail() {
  const body = document.getElementById('detailBody');
  body.innerHTML = `
    <div class="detail-empty">
      <i class="fa-solid fa-bell-slash"></i>
      <p>Pilih notifikasi untuk melihat detail</p>
    </div>`;
}

// ─── SIDEBAR TOGGLE ──────────────────────────────────────────────────────────
function openSidebar() {
  const sidebar  = document.getElementById('sidebar');
  const backdrop = document.getElementById('sidebarBackdrop');
  if (!sidebar) return;
  sidebar.classList.add('open');
  backdrop.classList.add('active');
  document.body.style.overflow = 'hidden';
}

function closeSidebar() {
  const sidebar  = document.getElementById('sidebar');
  const backdrop = document.getElementById('sidebarBackdrop');
  if (!sidebar) return;
  sidebar.classList.remove('open');
  backdrop.classList.remove('active');
  document.body.style.overflow = '';
}

// ─── INIT ─────────────────────────────────────────────────────────────────────
document.addEventListener('DOMContentLoaded', () => {
  renderTable(notifications);

  // Search
  document.getElementById('tableSearch').addEventListener('input', () => {
    renderTable(filterData());
    clearDetail();
  });

  // Tabs
  document.querySelectorAll('.tab-btn').forEach(btn => {
    btn.addEventListener('click', () => {
      document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
      renderTable(filterData());
      clearDetail();
    });
  });

  // Select All checkbox
  document.getElementById('checkAll').addEventListener('change', function () {
    document.querySelectorAll('.row-check').forEach(cb => cb.checked = this.checked);
  });

  // Detail inline close
  document.getElementById('detailClose').addEventListener('click', () => {
    clearDetail();
    document.querySelectorAll('.notif-row').forEach(r => r.classList.remove('selected'));
  });

  // Detail popup close
  document.getElementById('detailPopupClose').addEventListener('click', () => {
    closeDetailPopup();
    document.querySelectorAll('.notif-row').forEach(r => r.classList.remove('selected'));
  });

  // Close popup by clicking backdrop
  document.getElementById('detailPopupOverlay').addEventListener('click', e => {
    if (e.target === document.getElementById('detailPopupOverlay')) {
      closeDetailPopup();
      document.querySelectorAll('.notif-row').forEach(r => r.classList.remove('selected'));
    }
  });

  // Modal Buat Notifikasi
  const modalOverlay = document.getElementById('modalOverlay');
  document.getElementById('btnBuatNotif').addEventListener('click', () => {
    modalOverlay.classList.add('open');
    document.body.style.overflow = 'hidden';
  });
  const closeModal = () => {
    modalOverlay.classList.remove('open');
    document.body.style.overflow = '';
  };
  document.getElementById('modalClose').addEventListener('click', closeModal);
  document.getElementById('modalCancel').addEventListener('click', closeModal);
  modalOverlay.addEventListener('click', e => {
    if (e.target === modalOverlay) closeModal();
  });

  // Pagination buttons
  document.querySelectorAll('.page-btn').forEach(btn => {
    btn.addEventListener('click', function () {
      if (this.disabled || this.querySelector('i')) return;
      document.querySelectorAll('.page-btn').forEach(b => {
        if (!b.querySelector('i')) b.classList.remove('active');
      });
      this.classList.add('active');
    });
  });

  // Auto-open first row detail on desktop
  if (!isPopupMode()) {
    const firstRow = document.querySelector('.notif-row');
    if (firstRow) firstRow.click();
  }

  // On resize: switch behaviour if needed
  window.addEventListener('resize', () => {
    // If now in wide mode and popup is open, close it
    if (!isPopupMode()) {
      const popupOverlay = document.getElementById('detailPopupOverlay');
      if (popupOverlay.classList.contains('open')) {
        closeDetailPopup();
      }
    }
    // If now in wide mode, ensure sidebar overflow is reset
    if (window.innerWidth > 768) {
      document.body.style.overflow = '';
      const backdrop = document.getElementById('sidebarBackdrop');
      backdrop.classList.remove('active');
    }
  });

  // ESC closes popup / sidebar
  document.addEventListener('keydown', e => {
    if (e.key === 'Escape') {
      closeDetailPopup();
      closeSidebar();
      document.getElementById('modalOverlay').classList.remove('open');
      document.body.style.overflow = '';
    }
  });

  const notifProfileToggle = document.getElementById('notifProfileToggle');
  const notifProfileMenu = document.getElementById('notifProfileMenu');
  const notifProfileChevron = document.querySelector('.notif-profile-chevron');

  if (notifProfileToggle && notifProfileMenu) {
    notifProfileToggle.addEventListener('click', function (e) {
      e.stopPropagation();
      const isOpen = notifProfileMenu.classList.toggle('active');
      notifProfileToggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
      notifProfileChevron?.classList.toggle('rotate', isOpen);
    });

    document.addEventListener('click', function (e) {
      if (!notifProfileToggle.contains(e.target) && !notifProfileMenu.contains(e.target)) {
        notifProfileMenu.classList.remove('active');
        notifProfileToggle.setAttribute('aria-expanded', 'false');
        notifProfileChevron?.classList.remove('rotate');
      }
    });
  }
});
</script>
@endpush