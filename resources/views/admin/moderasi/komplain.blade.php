@extends('admin.layouts.app')

@section('css')
  <link rel="stylesheet" href="{{ asset('assets/css/admin/komplain.css') }}">
@endsection

@section('content')

{{-- ═══ COMBINED INFO MODAL (Pelapor & Terlapor) ═══ --}}
<div class="pelapor-modal-overlay" id="combinedModal">
  <div class="pelapor-modal" style="max-width: 480px; width: 95%; max-height: 90vh; overflow-y: auto; border-radius: 16px;">
    <div class="pm-header" style="position: sticky; top: 0; background: #fff; z-index: 10; border-bottom: 1px solid #f1f5f9;">
      <h4>Detail Pihak Terkait</h4>
      <button class="pm-close" id="combinedClose">✕</button>
    </div>
    <div class="pm-body" style="padding: 20px;">
      
      <!-- SECTION: PELAPOR -->
      <div style="background: #f8fafc; padding: 16px; border-radius: 12px; border: 1px solid #e2e8f0; margin-bottom: 20px;">
        <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 12px;">
            <div style="font-size: 11px; color: #64748b; font-weight: 800; text-transform: uppercase; letter-spacing: 0.5px; display: flex; align-items: center; gap: 6px;">
                <i class="fa-solid fa-bullhorn"></i> Pelapor
            </div>
            <span id="cmbPelaporType" style="font-size: 10px; padding: 2px 8px; border-radius: 20px; font-weight: 700; background: #e2e8f0; color: #475569;">Pelanggan</span>
        </div>
        <div class="pm-avatar-row" style="margin-bottom: 15px;">
          <div class="pm-avatar" id="cmbPelaporAvatar" style="width: 48px; height: 48px; font-size: 18px;"></div>
          <div>
            <div class="pm-name" id="cmbPelaporName" style="font-size: 16px; font-weight: 800;"></div>
            <div class="pm-role" id="cmbPelaporRole" style="font-size: 12px; color: #64748b;">Customer / Pelanggan</div>
          </div>
        </div>
        <div class="pm-info-list" id="cmbPelaporInfo" style="gap: 10px;"></div>
        <div style="margin-top: 15px; padding-top: 15px; border-top: 1px dashed #cbd5e1;">
            <a id="cmbPelaporLink" href="#" style="display: flex; align-items: center; justify-content: center; gap: 8px; width: 100%; padding: 10px; background: #fff; color: #64748b; border: 1.5px solid #cbd5e1; border-radius: 8px; font-weight: 700; text-decoration: none; font-size: 13px; transition: all 0.2s;">
                <i class="fa-solid fa-user-gear"></i> Lihat Profil Pelapor
            </a>
        </div>
      </div>

      <div style="display: flex; justify-content: center; margin: -10px 0 10px;">
        <div style="background: #fff; width: 32px; height: 32px; border-radius: 50%; display: flex; align-items: center; justify-content: center; border: 1px solid #e2e8f0; color: #94a3b8; font-size: 12px; z-index: 2;">
            <i class="fa-solid fa-arrows-up-down"></i>
        </div>
      </div>

      <!-- SECTION: TERLAPOR -->
      <div style="background: #fff; padding: 16px; border-radius: 12px; border: 2px solid #3b82f6; box-shadow: 0 4px 12px rgba(59, 130, 246, 0.08);">
        <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 12px;">
            <div style="font-size: 11px; color: #3b82f6; font-weight: 800; text-transform: uppercase; letter-spacing: 0.5px; display: flex; align-items: center; gap: 6px;">
                <i class="fa-solid fa-user-shield"></i> Terlapor
            </div>
            <span id="cmbTerlaporType" style="font-size: 10px; padding: 2px 8px; border-radius: 20px; font-weight: 700; background: #dbeafe; color: #1e40af;">Mitra Laundry</span>
        </div>
        <div class="pm-avatar-row" style="margin-bottom: 15px;">
          <div class="pm-avatar" id="cmbTerlaporAvatar" style="width: 48px; height: 48px; font-size: 18px; background: #3b82f6; color: #fff;"></div>
          <div>
            <div class="pm-name" id="cmbTerlaporName" style="font-size: 16px; font-weight: 800;"></div>
            <div class="pm-role" id="cmbTerlaporRole" style="font-size: 12px; color: #64748b;">Unit Laundry / Toko</div>
          </div>
        </div>
        <div class="pm-info-list" id="cmbTerlaporInfo" style="gap: 10px;"></div>
        <div style="margin-top: 15px; padding-top: 15px; border-top: 1px dashed #dbeafe;">
            <a id="cmbTerlaporLink" href="#" style="display: flex; align-items: center; justify-content: center; gap: 8px; width: 100%; padding: 10px; background: #3b82f6; color: #fff; border-radius: 8px; font-weight: 700; text-decoration: none; font-size: 13px; transition: all 0.2s; box-shadow: 0 2px 4px rgba(59, 130, 246, 0.2);">
                <i class="fa-solid fa-arrow-up-right-from-square"></i> Lihat di Manajemen Terlapor
            </a>
        </div>
      </div>

    </div>
  </div>
</div>

<main class="main">
{{-- ═══ PAGE BODY ═══ --}}
<div class="pgbody">

  {{-- MAIN CONTENT --}}
  <div class="content" id="mainContent">

    {{-- STAT CARDS --}}
    @php
      $total = $komplains->count();
      $wait = $komplains->where('status', 'pending')->count();
      $proc = $komplains->where('status', 'proc')->count();
      $done = $komplains->where('status', 'selesai')->count();
      $rej = $komplains->where('status', 'ditolak')->count();
    @endphp
    <div class="stat-row">
      <div class="scard">
        <div class="sico2 indigo">📋</div>
        <div>
          <div class="slabel">Total Laporan</div>
          <div class="sval" id="stat-total">{{ $total }}</div>
          <div class="ssub">Semua laporan</div>
        </div>
      </div>
      <div class="scard">
        <div class="sico2 orange">⏳</div>
        <div>
          <div class="slabel">Menunggu Tindak Lanjut</div>
          <div class="sval" id="stat-wait">{{ $wait }}</div>
          <div class="ssub">{{ $total > 0 ? round(($wait/$total)*100, 1) : 0 }}% dari total</div>
        </div>
      </div>
      <div class="scard">
        <div class="sico2 blue">⚙️</div>
        <div>
          <div class="slabel">Sedang Diproses</div>
          <div class="sval" id="stat-proc">{{ $proc }}</div>
          <div class="ssub">{{ $total > 0 ? round(($proc/$total)*100, 1) : 0 }}% dari total</div>
        </div>
      </div>
      <div class="scard">
        <div class="sico2 green">✅</div>
        <div>
          <div class="slabel">Selesai</div>
          <div class="sval" id="stat-done">{{ $done }}</div>
          <div class="ssub">{{ $total > 0 ? round(($done/$total)*100, 1) : 0 }}% dari total</div>
        </div>
      </div>
      <div class="scard">
        <div class="sico2 red">❌</div>
        <div>
          <div class="slabel">Ditolak</div>
          <div class="sval" id="stat-rej">{{ $rej }}</div>
          <div class="ssub">{{ $total > 0 ? round(($rej/$total)*100, 1) : 0 }}% dari total</div>
        </div>
      </div>
    </div>

    {{-- TABS --}}
    <div class="tabs" id="tabsBar">
      <div class="tab active" data-tab="semua">Semua <span class="tc" id="tc-semua">{{ $total }}</span></div>
      <div class="tab" data-tab="wait">Menunggu <span class="tc" id="tc-wait">{{ $wait }}</span></div>
      <div class="tab" data-tab="proc">Diproses <span class="tc" id="tc-proc">{{ $proc }}</span></div>
      <div class="tab" data-tab="done">Selesai <span class="tc" id="tc-done">{{ $done }}</span></div>
      <div class="tab" data-tab="rej">Ditolak <span class="tc" id="tc-rej">{{ $rej }}</span></div>
    </div>

    {{-- TOOLBAR --}}
    <div class="toolbar">
      <div class="fsrch">
        <i class="fa-solid fa-magnifying-glass fi"></i>
        <input type="text" id="searchInput" placeholder="Cari order ID, pelanggan, atau mitra..." />
      </div>
      <div class="fsel">
        <i class="fa-solid fa-circle-dot" style="color:var(--g400);font-size:12px"></i>
        <select id="filterStatus">
          <option value="">Status</option>
          <option value="wait">Menunggu</option>
          <option value="proc">Diproses</option>
          <option value="done">Selesai</option>
          <option value="rej">Ditolak</option>
        </select>
      </div>
      <div class="fsel">
        <i class="fa-solid fa-tag" style="color:var(--g400);font-size:12px"></i>
        <select id="filterKategori">
          <option value="">Kategori</option>
          <option value="Pakaian Rusak">Pakaian Rusak</option>
          <option value="Terlambat Diambil">Terlambat Diambil</option>
          <option value="Hasil Cucian Buruk">Hasil Cucian Buruk</option>
          <option value="Kehilangan Barang">Kehilangan Barang</option>
          <option value="Pelayanan Buruk">Pelayanan Buruk</option>
          <option value="Tagihan Salah">Tagihan Salah</option>
        </select>
      </div>
      <div class="fsel">
        <i class="fa-solid fa-flag" style="color:var(--g400);font-size:12px"></i>
        <select id="filterPrioritas">
          <option value="">Prioritas</option>
          <option value="high">Tinggi</option>
          <option value="med">Sedang</option>
          <option value="low">Rendah</option>
        </select>
      </div>
      <div class="fdate">
        <i class="fa-regular fa-calendar" style="font-size:12px"></i>
        <input type="date" id="filterDate" />
      </div>
      <button class="btn-filter" id="btnFilter">
        <i class="fa-solid fa-sliders"></i> Filter
      </button>
    </div>

    {{-- TABLE --}}
    <div class="twrap">
      <table class="dtbl" id="komplainTable">
        <thead>
          <tr>
            <th style="width:40px"><input type="checkbox" id="checkAll" /></th>
            <th>ID Laporan</th>
            <th>Pelapor</th>
            <th>Tipe Laporan</th>
            <th>Terlapor / Mitra</th>
            <th>Order ID</th>
            <th>Prioritas</th>
            <th>Status</th>
            <th>Tanggal</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody id="tableBody"></tbody>
      </table>
    </div>

    {{-- PAGINATION --}}
    <div class="pagibar">
      <span class="pginfo" id="pgInfo">Menampilkan 1 – 10 dari 186 data</span>
      <div class="pgright">
        <div class="pps">
          <span>Tampilkan</span>
          <select id="pgSize">
            <option value="10">10</option>
            <option value="25">25</option>
            <option value="50">50</option>
          </select>
          <span>/ halaman</span>
        </div>
        <div class="pgbtns" id="pgBtns"></div>
      </div>
    </div>

  </div>{{-- /content --}}

  {{-- DETAIL PANEL --}}
  <div class="detail" id="detailPanel" style="display:none">
    <div class="dethdr">
      <h3>Detail Komplain</h3>
      <button class="cbtn" id="detailClose" title="Tutup">✕</button>
    </div>
    <div class="detbody" id="detailBody"></div>
    <div class="detfoot" id="detailFoot" style="display:none">
      <div style="font-size:11px; color:var(--text-muted); font-weight:700; text-transform:uppercase; margin-bottom:10px; padding-left:4px;">Tindak Lanjut</div>
      <div class="foot-row">
        <button class="btn-reject" id="btnTolak" style="width: 100%; font-size: 11px; padding: 10px 4px;">
          <i class="fa-solid fa-xmark"></i> Tolak Laporan
        </button>
      </div>
    </div>
  </div>

</div>{{-- /pgbody --}}
</main>

@endsection

@push('scripts')
<script>
'use strict';

/* ─── DATA ─────────────────────────────────────────────── */
const complaints = {!! json_encode($komplains->map(function($c) {
    $isStoreReport = $c->mitra_laundry_id !== null;
    // Jika reporter adalah mitra (punya mitra_laundry), berarti mitra melapor user
    $isMitraReporting = $c->reporter?->mitraLaundry !== null;
    
    return [
        'id' => 'CMP-' . str_pad($c->id, 4, '0', STR_PAD_LEFT),
        'realId' => $c->id,
        'reporterId' => $c->reporter_id,
        'isMitraReporting' => $isMitraReporting,
        'pelapor' => [
            'nama' => $c->reporter?->name ?? 'User',
            'inisial' => strtoupper(substr($c->reporter?->name ?? 'U', 0, 2)),
            'warna' => $isMitraReporting ? '#3b82f6' : ($isStoreReport ? '#EF4444' : '#2563EB'),
            'hp' => $c->reporter?->phone ?? '-',
            'email' => $c->reporter?->email ?? '-',
            'alamat' => $c->reporter?->mitraLaundry?->address ?? '-',
        ],
        'reportedUser' => [
            'id' => $c->reported_user_id,
            'nama' => $c->reportedUser?->name ?? 'User',
            'inisial' => strtoupper(substr($c->reportedUser?->name ?? 'U', 0, 2)),
            'hp' => $c->reportedUser?->phone ?? '-',
            'email' => $c->reportedUser?->email ?? '-',
            'alamat' => $c->reportedUser?->mitraLaundry?->address ?? '-',
        ],
        'tipe' => [
            'nama' => $isStoreReport ? 'Laporan Toko' : ($isMitraReporting ? 'Laporan User' : 'Laporan Ulasan'),
            'ico' => $isStoreReport ? '🏬' : ($isMitraReporting ? '👤' : '🚩'),
            'cls' => $isStoreReport ? 'orange' : ($isMitraReporting ? 'blue' : 'red')
        ],
        'mitra' => [
            'id' => $c->mitra_laundry_id ?? $c->reportedUser?->mitraLaundry?->id,
            'nama' => $c->mitraLaundry?->store_name ?? $c->reportedUser?->mitraLaundry?->store_name ?? 'Mitra Toko',
            'inisial' => strtoupper(substr($c->mitraLaundry?->store_name ?? $c->reportedUser?->mitraLaundry?->store_name ?? 'MT', 0, 2)),
            'cls' => 'blue',
            'pemilik' => $c->mitraLaundry?->user?->name ?? $c->reportedUser?->name ?? 'Pemilik',
            'hp' => $c->mitraLaundry?->user?->phone ?? $c->reportedUser?->phone ?? '-',
            'email' => $c->mitraLaundry?->user?->email ?? $c->reportedUser?->email ?? '-',
            'alamat' => $c->mitraLaundry?->address ?? $c->reportedUser?->mitraLaundry?->address ?? '-',
        ],
        'orderId' => $c->review?->order?->order_code ?? '-',
        'prioritas' => $isStoreReport ? 'high' : 'med',
        'prioritasLabel' => $isStoreReport ? 'Tinggi' : 'Sedang',
        'status' => match($c->status) {
            'pending' => 'wait',
            'proc'    => 'proc',
            'selesai' => 'done',
            'ditolak' => 'rej',
            default   => 'wait'
        },
        'statusLabel' => match($c->status) {
            'pending' => 'Menunggu',
            'proc'    => 'Diproses',
            'selesai' => 'Selesai',
            'ditolak' => 'Ditolak',
            default   => 'Menunggu'
        },
        'tanggal' => $c->created_at->format('d M Y'),
        'jam' => $c->created_at->format('H:i'),
        'orderTanggal' => $c->review?->order?->created_at?->format('d M Y, H:i') ?? '-',
        'orderSelesai' => $c->review?->order?->updated_at?->format('d M Y, H:i') ?? '-',
        'totalBayar' => 'Rp ' . number_format($c->review?->order?->total_bayar ?? 0, 0, ',', '.'),
        'deskripsi' => '<b>Alasan Pelaporan:</b><br>' . $c->alasan . ($isStoreReport ? '' : '<br><br><b>Isi Ulasan:</b><br>' . ($c->review?->komentar ?? '-')),
        'lampiran' => 0,
        'photos' => [],
        'dibuat' => $c->created_at->format('d M Y, H:i')
    ];
})->values()->all()) !!};

/* ─── STATE ─────────────────────────────────────────── */
let activeTab      = 'semua';
let selectedId     = null;
let currentPage    = 1;
let pageSize       = 10;
let searchQ        = '';
let filterStatus   = '';
let filterKategori = '';
let filterPrioritas= '';

/* ─── HELPERS ────────────────────────────────────────── */
const statusBadge = (s,l) => {
    let cls = 'wait';
    if(s === 'selesai') cls = 'done';
    if(s === 'ditolak') cls = 'rej';
    return `<span class="badge ${cls}">${l}</span>`;
};
const prioBadge   = (p,l) => `<span class="prio ${p}">${l}</span>`;
const avatarStyle = c     => `background:${c}`;

/* ─── FILTER ─────────────────────────────────────────── */
function applyFilters(){
  return complaints.filter(c=>{
    const mTab  = activeTab==='semua'||c.status===activeTab;
    const mSrch = !searchQ||[c.id,c.pelapor.nama,c.mitra.nama,c.orderId].some(v=>v.toLowerCase().includes(searchQ));
    const mStat = !filterStatus    ||c.status===filterStatus;
    const mKat  = !filterKategori  ||c.tipe.nama===filterKategori;
    const mPrio = !filterPrioritas ||c.prioritas===filterPrioritas;
    return mTab&&mSrch&&mStat&&mKat&&mPrio;
  });
}

/* ─── RENDER TABLE ───────────────────────────────────── */
function renderTable(){
  const filtered = applyFilters();
  const total    = filtered.length;
  const start    = (currentPage-1)*pageSize;
  const slice    = filtered.slice(start,start+pageSize);

  document.getElementById('pgInfo').textContent=
    `Menampilkan ${total?start+1:0} – ${Math.min(start+pageSize,total)} dari ${total} data`;

  const tbody = document.getElementById('tableBody');
  if(!slice.length){
    tbody.innerHTML=`<tr><td colspan="10" style="text-align:center;padding:40px;color:var(--g400)">
      <i class="fa-solid fa-inbox" style="font-size:28px;display:block;margin-bottom:10px"></i>
      Tidak ada data ditemukan</td></tr>`;
    renderPagination(0);
    return;
  }

  tbody.innerHTML = slice.map(c=>`
    <tr data-id="${c.id}" class="${selectedId===c.id?'sel':''}">
      <td><input type="checkbox" class="row-check" data-id="${c.id}"/></td>
      <td><span class="cmpid">${c.id}</span></td>
      <td>
        <div class="plcell pl-clickable" onclick="event.stopPropagation(); openCombinedModal('${c.id}')" title="Lihat detail pihak terkait">
          <div class="plav" style="${avatarStyle(c.pelapor.warna)}">${c.pelapor.inisial}</div>
          <div>
            <div class="plname">${c.pelapor.nama}</div>
            <div class="plphone">${c.pelapor.hp}</div>
          </div>
        </div>
      </td>
      <td>
        <div class="tipecell">
          <div class="tipe-ico ${c.tipe.cls}">${c.tipe.ico}</div>
          <span class="tipename">${c.tipe.nama}</span>
        </div>
      </td>
      <td>
        <div class="mc pl-clickable" onclick="event.stopPropagation(); openCombinedModal('${c.id}')" title="Lihat detail pihak terkait">
          <div class="mlogo ${c.isMitraReporting ? 'blue' : c.mitra.cls}" style="color:#fff;font-weight:700">
            ${c.isMitraReporting ? c.reportedUser.inisial : c.mitra.inisial}
          </div>
          <span class="mname">${c.isMitraReporting ? c.reportedUser.nama : c.mitra.nama}</span>
        </div>
      </td>
      <td><span class="oid">${c.orderId}</span></td>
      <td>${prioBadge(c.prioritas,c.prioritasLabel)}</td>
      <td>${statusBadge(c.status,c.statusLabel)}</td>
      <td><div class="tdate">${c.tanggal}</div><div class="ttime">${c.jam}</div></td>
      <td>
        <div class="acell action-menu-wrap">
          <button class="abtn btn-more" data-id="${c.id}" title="Aksi" onclick="toggleActionDropdown(event, '${c.id}')">
            <i class="fa-solid fa-ellipsis"></i>
          </button>
          <div class="action-dropdown" id="dropdown-${c.id}" style="display:none; position:absolute; right:0; top:100%; z-index:100; background:#fff; border:1px solid var(--border); border-radius:8px; box-shadow:var(--shadow-md); padding:6px; min-width:180px;">
            <div style="font-size:10px; color:var(--text-muted); padding:4px 12px; font-weight:700; text-transform:uppercase;">Tindak Lanjut Mitra</div>
            <button onclick="window.open('https://wa.me/${c.pelapor.hp.replace(/\D/g,'')}', '_blank')" style="width:100%; text-align:left; background:none; border:none; padding:8px 12px; font-size:12px; cursor:pointer; display:flex; align-items:center; gap:8px; color:var(--text-main);">
                <i class="fa-brands fa-whatsapp" style="color:#25D366; width:16px;"></i> WhatsApp Mitra
            </button>
            <button onclick="triggerFollowUpM('${c.id}')" style="width:100%; text-align:left; background:none; border:none; padding:8px 12px; font-size:12px; cursor:pointer; display:flex; align-items:center; gap:8px; color:var(--text-main);">
                <i class="fa-solid fa-comment" style="color:#2563eb; width:16px;"></i> Open Chat Mitra
            </button>
            
            <hr style="border:none; border-top:1px solid #f1f5f9; margin:4px 0;">
            <div style="font-size:10px; color:var(--text-muted); padding:4px 12px; font-weight:700; text-transform:uppercase;">Tindak Lanjut Pelapor</div>
            <button onclick="window.open('https://wa.me/${c.pelapor.hp.replace(/\D/g,'')}', '_blank')" style="width:100%; text-align:left; background:none; border:none; padding:8px 12px; font-size:12px; cursor:pointer; display:flex; align-items:center; gap:8px; color:var(--text-main);">
                <i class="fa-brands fa-whatsapp" style="color:#25D366; width:16px;"></i> WhatsApp Pelapor
            </button>
            <button onclick="triggerFollowUpP('${c.id}')" style="width:100%; text-align:left; background:none; border:none; padding:8px 12px; font-size:12px; cursor:pointer; display:flex; align-items:center; gap:8px; color:var(--text-main);">
                <i class="fa-solid fa-comment" style="color:#14b8a6; width:16px;"></i> Open Chat Pelapor
            </button>

            <hr style="border:none; border-top:1px solid #f1f5f9; margin:4px 0;">
            <button onclick="openDetail('${c.id}')" style="width:100%; text-align:left; background:none; border:none; padding:8px 12px; font-size:12px; cursor:pointer; display:flex; align-items:center; gap:8px; color:var(--text-main);">
                <i class="fa-solid fa-eye" style="color:#64748b; width:16px;"></i> Lihat Detail
            </button>
          </div>
        </div>
      </td>
    </tr>
  `).join('');

  /* events */
  tbody.querySelectorAll('tr[data-id]').forEach(tr=>{
    tr.addEventListener('click',e=>{
      if(e.target.closest('.row-check,.action-menu-wrap,.pl-clickable')) return;
      openDetail(tr.dataset.id);
    });
  });

  tbody.querySelectorAll('.pl-clickable').forEach(cell=>{
    cell.addEventListener('click',e=>{e.stopPropagation();openPelaporModal(cell.dataset.pelaporId);});
  });

  renderPagination(total);
  updateTabCounts();
}

/* ─── DROPDOWN ACTIONS ───────────────────────────────── */
function toggleActionDropdown(e, id) {
    e.stopPropagation();
    // Close all other dropdowns
    document.querySelectorAll('.action-dropdown').forEach(d => {
        if(d.id !== 'dropdown-'+id) d.style.display = 'none';
    });
    const el = document.getElementById('dropdown-'+id);
    el.style.display = el.style.display === 'none' ? 'block' : 'none';
}

function triggerFollowUpM(id) {
    selectedId = id;
    document.getElementById('btnFollowUp').click();
}

function triggerFollowUpP(id) {
    selectedId = id;
    document.getElementById('btnFollowUpReporter').click();
}

// Close dropdowns on window click
window.addEventListener('click', () => {
    document.querySelectorAll('.action-dropdown').forEach(d => d.style.display = 'none');
});

/* ─── PAGINATION ─────────────────────────────────────── */
function renderPagination(total){
  const totalPages = Math.ceil(total/pageSize)||1;
  const container  = document.getElementById('pgBtns');
  const makeBtn    = n=>`<button class="pgb ${n===currentPage?'active':''}" data-pg="${n}">${n}</button>`;
  let html = `<button class="pgb nav" id="pgPrev" ${currentPage===1?'disabled':''}>‹</button>`;
  if(totalPages<=7){for(let i=1;i<=totalPages;i++)html+=makeBtn(i);}
  else{
    html+=makeBtn(1);
    if(currentPage>3)html+=`<span class="pgdots">…</span>`;
    const lo=Math.max(2,currentPage-1),hi=Math.min(totalPages-1,currentPage+1);
    for(let i=lo;i<=hi;i++)html+=makeBtn(i);
    if(currentPage<totalPages-2)html+=`<span class="pgdots">…</span>`;
    html+=makeBtn(totalPages);
  }
  html+=`<button class="pgb nav" id="pgNext" ${currentPage===totalPages?'disabled':''}>›</button>`;
  container.innerHTML=html;
  container.querySelectorAll('.pgb[data-pg]').forEach(btn=>{
    btn.addEventListener('click',()=>{
        goPage(parseInt(btn.dataset.pg));
    });
  });
  const prev=document.getElementById('pgPrev');
  const next=document.getElementById('pgNext');
  if(prev)prev.addEventListener('click',()=>{if(currentPage>1){goPage(currentPage-1);}});
  if(next)next.addEventListener('click',()=>{if(currentPage<totalPages){goPage(currentPage+1);}});
}

function goPage(p){
    currentPage = p;
    renderTable();
    window.scrollTo({top: 0, behavior: 'smooth'});
}

/* ─── TAB COUNTS ─────────────────────────────────────── */
function updateTabCounts(){
  const counts={semua:complaints.length,wait:0,proc:0,done:0,rej:0};
  complaints.forEach(c=>{if(counts[c.status]!==undefined)counts[c.status]++;});
  Object.entries(counts).forEach(([k,v])=>{const el=document.getElementById('tc-'+k);if(el)el.textContent=v;});
  ['total','wait','proc','done','rej'].forEach(k=>{
    const el=document.getElementById('stat-'+k);
    if(el)el.textContent=k==='total'?counts.semua:counts[k];
  });
}

/* ─── COMBINED MODAL ───────────────────────────────────── */
function openCombinedModal(id) {
  const c = complaints.find(x => x.id === id);
  if (!c) return;

  // 1. POPULATE PELAPOR
  const p = c.pelapor;
  document.getElementById('cmbPelaporAvatar').style.background = p.warna;
  document.getElementById('cmbPelaporAvatar').textContent = p.inisial;
  document.getElementById('cmbPelaporName').textContent = p.nama;
  document.getElementById('cmbPelaporType').textContent = c.isMitraReporting ? 'Mitra' : 'Customer';
  document.getElementById('cmbPelaporRole').textContent = c.isMitraReporting ? 'Pemilik Laundry' : 'Customer / Pelanggan';
  
  document.getElementById('cmbPelaporInfo').innerHTML = `
    <div class="pm-info-row" style="margin-bottom: 8px;">
      <div class="pm-info-icon blue" style="width:24px; height:24px; font-size:10px;"><i class="fa-solid fa-phone"></i></div>
      <div><div class="pm-info-val" style="font-size:13px; font-weight:600;">${p.hp}</div></div>
    </div>
    <div class="pm-info-row" style="margin-bottom: 8px;">
      <div class="pm-info-icon green" style="width:24px; height:24px; font-size:10px;"><i class="fa-solid fa-envelope"></i></div>
      <div><div class="pm-info-val" style="font-size:13px;">${p.email}</div></div>
    </div>
    <div class="pm-info-row">
      <div class="pm-info-icon orange" style="width:24px; height:24px; font-size:10px;"><i class="fa-solid fa-location-dot"></i></div>
      <div><div class="pm-info-val" style="font-size:12px; color:#64748b; line-height:1.4;">${p.alamat}</div></div>
    </div>`;

  const pelaporLinkEl = document.getElementById('cmbPelaporLink');
  if (c.isMitraReporting) {
    // Jika pelapor adalah mitra, kita perlu ID mitra-nya. 
    // Berdasarkan data mapping, kita gunakan mitra_laundry_id pelapor jika tersedia.
    // Di mapping saat ini kita belum simpan mitra_id pelapor secara eksplisit jika dia mitra.
    // Kita asumsikan reporterId adalah user id, dan link ke user management sudah cukup atau jika dia mitra link ke mitra management.
    // Untuk simplifikasi, kita arahkan ke profil user yang juga menampilkan role mitra.
    pelaporLinkEl.href = `{{ route('admin.user') }}?id=${c.reporterId}`;
    pelaporLinkEl.innerHTML = '<i class="fa-solid fa-user-gear"></i> Lihat Profil Pelapor';
  } else {
    pelaporLinkEl.href = `{{ route('admin.user') }}?id=${c.reporterId}`;
    pelaporLinkEl.innerHTML = '<i class="fa-solid fa-user-gear"></i> Lihat Profil Pelapor';
  }

  // 2. POPULATE TERLAPOR
  const t = c.mitra_laundry_id ? c.mitra : c.reportedUser;
  const isMitra = c.mitra_laundry_id !== null;

  document.getElementById('cmbTerlaporAvatar').textContent = t.inisial;
  document.getElementById('cmbTerlaporName').textContent = t.nama;
  document.getElementById('cmbTerlaporType').textContent = isMitra ? 'Mitra Laundry' : 'Customer';
  document.getElementById('cmbTerlaporRole').textContent = isMitra ? 'Unit Laundry / Toko' : 'Pihak Terlapor';

  document.getElementById('cmbTerlaporInfo').innerHTML = `
    <div class="pm-info-row" style="margin-bottom: 8px;">
      <div class="pm-info-icon blue" style="width:24px; height:24px; font-size:10px; background:#dbeafe; color:#1e40af;"><i class="fa-solid fa-phone"></i></div>
      <div><div class="pm-info-val" style="font-size:13px; font-weight:600;">${t.hp}</div></div>
    </div>
    <div class="pm-info-row" style="margin-bottom: 8px;">
      <div class="pm-info-icon green" style="width:24px; height:24px; font-size:10px; background:#dcfce7; color:#166534;"><i class="fa-solid fa-envelope"></i></div>
      <div><div class="pm-info-val" style="font-size:13px;">${t.email}</div></div>
    </div>
    <div class="pm-info-row">
      <div class="pm-info-icon orange" style="width:24px; height:24px; font-size:10px; background:#ffedd5; color:#9a3412;"><i class="fa-solid fa-location-dot"></i></div>
      <div><div class="pm-info-val" style="font-size:12px; color:#64748b; line-height:1.4;">${t.alamat}</div></div>
    </div>`;

  const linkEl = document.getElementById('cmbTerlaporLink');
  if (isMitra) {
    linkEl.href = `{{ route('admin.mitra') }}?id=${t.id}`;
    linkEl.innerHTML = '<i class="fa-solid fa-store"></i> Lihat di Manajemen Toko';
  } else {
    linkEl.href = `{{ route('admin.user') }}?id=${c.reportedUser.id}`;
    linkEl.innerHTML = '<i class="fa-solid fa-user-gear"></i> Lihat di Manajemen User';
  }

  document.getElementById('combinedModal').classList.add('show');
  document.body.style.overflow = 'hidden';
}

function closeCombinedModal() {
  document.getElementById('combinedModal').classList.remove('show');
  document.body.style.overflow = '';
}

/* ─── OVERLAY HELPER ─────────────────────────────────── */
const overlay = document.getElementById('sidebarOverlay');

function showOverlay(cb){
  overlay.classList.add('active');
  overlay._closeCallback = cb;
  document.body.style.overflow='hidden';
}
function hideOverlay(){
  overlay.classList.remove('active');
  overlay._closeCallback = null;
  document.body.style.overflow='';
}

/* ─── DETAIL PANEL ────────────────────────────────────── */
function openDetail(id){
  const c=complaints.find(x=>x.id===id);if(!c)return;
  selectedId=id;

  document.querySelectorAll('tr[data-id]').forEach(tr=>{
    tr.classList.toggle('sel',tr.dataset.id===id);
  });

  const panel=document.getElementById('detailPanel');
  const foot =document.getElementById('detailFoot');
  const body =document.getElementById('detailBody');

  const statusLabelMap={wait:'Menunggu Tindak Lanjut',proc:'Sedang Diproses',done:'Selesai',rej:'Ditolak'};

  const photosHtml=c.photos.length
    ?`<div class="photos">${c.photos.map(p=>`<div class="photo-thumb">${p}</div>`).join('')}</div>`:'';

  const lampiranHtml=c.lampiran
    ?`<div class="lampiran-row">
        <div class="lmp-left"><i class="fa-solid fa-paperclip" style="color:var(--g400)"></i><span>Lampiran</span><span class="lmp-count">${c.lampiran} file</span></div>
        <span class="lmp-toggle">Lihat</span></div>`:'' ;

  body.innerHTML=`
    <div class="d-hero">
      <div class="d-status-badge">${statusLabelMap[c.status]}</div>
      <div class="d-cmpid">${c.id}</div>
      <div class="d-created">Dibuat: ${c.dibuat}</div>
    </div>
    <div class="dsec">
      <div class="dsec-title"><span class="si blue"><i class="fa-solid fa-user"></i></span>Informasi Pelapor</div>
      <div class="drows">
        <div class="drow">
            <span class="drow-l">Nama</span>
            <span class="drow-r">
                ${c.pelapor.nama} 
                <a href="/admin/chat/${c.reporterId}" style="margin-left:8px; color:var(--primary); text-decoration:none; font-size:11px; font-weight:700;" title="Buka Chat Langsung">
                    <i class="fa-solid fa-comment"></i> Chat
                </a>
            </span>
        </div>
        <div class="drow"><span class="drow-l">No. WhatsApp</span>
          <span class="drow-r" style="display:flex;align-items:center;gap:6px">${c.pelapor.hp}<i class="fa-brands fa-whatsapp" style="color:#25D366;font-size:14px"></i></span></div>
        <div class="drow"><span class="drow-l">Email</span><span class="drow-r">${c.pelapor.email}</span></div>
        <div class="drow"><span class="drow-l">Alamat</span><span class="drow-r" style="max-width:180px">${c.pelapor.alamat}</span></div>
      </div>
    </div>
    <div class="dsec">
      <div class="dsec-title"><span class="si green"><i class="fa-solid fa-cart-shopping"></i></span>Informasi Terkait</div>
      <div class="drows">
        <div class="drow"><span class="drow-l">Order ID</span><span class="drow-r primary">${c.orderId}</span></div>
        <div class="drow"><span class="drow-l">${c.isMitraReporting ? 'User Terlapor' : 'Mitra Laundry'}</span><span class="drow-r">${c.isMitraReporting ? c.reportedUser.nama : c.mitra.nama}</span></div>
        <div class="drow"><span class="drow-l">Tanggal Order</span><span class="drow-r">${c.orderTanggal}</span></div>
        <div class="drow"><span class="drow-l">Tanggal Selesai</span><span class="drow-r">${c.orderSelesai}</span></div>
        <div class="drow"><span class="drow-l">Total Bayar</span><span class="drow-r">${c.totalBayar}</span></div>
      </div>
    </div>
    <div class="dsec">
      <div class="dsec-title"><span class="si orange"><i class="fa-solid fa-flag"></i></span>Tipe &amp; Prioritas</div>
      <div class="tp-grid">
        <div class="tp-row"><span class="tp-label">Tipe Laporan</span><span class="tp-val">${c.tipe.nama}</span></div>
        <div class="tp-row"><span class="tp-label">Prioritas</span>${prioBadge(c.prioritas,c.prioritasLabel)}</div>
      </div>
    </div>
    <div class="dsec">
      <div class="dsec-title"><span class="si red"><i class="fa-solid fa-file-lines"></i></span>Deskripsi Laporan</div>
      <div class="desc-text">${c.deskripsi}</div>
      ${photosHtml}${lampiranHtml}
    </div>
    <div style="margin-top:16px; padding-top:16px; border-top:1px solid #f1f5f9;">
      <div class="det-label" style="margin-bottom:12px; font-size:11px; color:var(--text-muted); font-weight:700; text-transform:uppercase;">Hubungan Pihak Terkait</div>
      <div onclick="openCombinedModal('${c.id}')" style="display:flex; align-items:center; gap:12px; padding:12px; background:linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%); border-radius:12px; cursor:pointer; border:1px solid #e2e8f0; transition:all 0.2s; box-shadow: 0 2px 4px rgba(0,0,0,0.02);" onmouseover="this.style.borderColor='var(--primary)'; this.style.transform='translateY(-2px)'" onmouseout="this.style.borderColor='#e2e8f0'; this.style.transform='translateY(0)'">
        <div style="display: flex; align-items: center; -webkit-mask-image: linear-gradient(to right, black 70%, transparent 100%);">
            <div style="width:32px; height:32px; background:var(--primary); color:#fff; border-radius:50%; display:flex; align-items:center; justify-content:center; font-size:11px; font-weight:700; border: 2px solid #fff; z-index: 2;">${c.pelapor.inisial}</div>
            <div style="width:32px; height:32px; background:#3b82f6; color:#fff; border-radius:50%; display:flex; align-items:center; justify-content:center; font-size:11px; font-weight:700; border: 2px solid #fff; margin-left: -12px; z-index: 1;">${c.mitra_laundry_id ? c.mitra.inisial : c.reportedUser.inisial}</div>
        </div>
        <div style="flex:1;">
          <div style="font-size:12px; font-weight:800; color:var(--text-main);">Lihat Detail Kedua Pihak</div>
          <div style="font-size:10px; color:var(--text-muted);">Pelapor vs Terlapor</div>
        </div>
        <i class="fa-solid fa-up-right-and-down-left-from-center" style="font-size:12px; color:var(--primary);"></i>
      </div>
    </div>`;

  /* Tampilkan panel */
  panel.style.display='flex';

  /* Mobile: slide up + overlay */
  if(window.innerWidth<=768){
    /* Tambah sedikit jeda agar display:flex sempat render sebelum transition */
    requestAnimationFrame(()=>requestAnimationFrame(()=>{
      panel.classList.add('panel-open');
      showOverlay(closeDetail);
      document.body.style.overflow='hidden';
    }));
  }

  /* Tombol aksi */
  foot.style.display=(c.status==='wait'||c.status==='proc')?'flex':'none';
}

function closeDetail(){
  const panel=document.getElementById('detailPanel');
  if(window.innerWidth<=768){
    panel.classList.remove('panel-open');
    hideOverlay();
    /* Sembunyikan setelah animasi selesai */
    setTimeout(()=>{panel.style.display='none';},310);
  }else{
    panel.style.display='none';
  }
  selectedId=null;
  document.querySelectorAll('tr[data-id]').forEach(tr=>tr.classList.remove('sel'));
}

/* ─── FOOTER ACTIONS ─────────────────────────────────── */
document.getElementById('btnTolak').addEventListener('click',()=>{
  if(!selectedId)return;
  const c=complaints.find(x=>x.id===selectedId);if(!c)return;
  if(confirm(`Tolak laporan ${c.id}?`)){c.status='rej';c.statusLabel='Ditolak';closeDetail();renderTable();}
});

/* ─── INIT ───────────────────────────────────────────── */
document.addEventListener('DOMContentLoaded',()=>{

  renderTable();

  /* Combined modal */
  document.getElementById('combinedClose').addEventListener('click',closeCombinedModal);
  document.getElementById('combinedModal').addEventListener('click',e=>{
    if(e.target===e.currentTarget)closeCombinedModal();
  });

  /* Detail close button */
  document.getElementById('detailClose').addEventListener('click',closeDetail);

  /* Overlay tap-to-close */
  overlay.addEventListener('click',()=>{
    if(overlay._closeCallback) overlay._closeCallback();
  });

  /* Tabs */
  document.querySelectorAll('.tab').forEach(tab=>{
    tab.addEventListener('click',()=>{
      document.querySelectorAll('.tab').forEach(t=>t.classList.remove('active'));
      tab.classList.add('active');
      activeTab=tab.dataset.tab; currentPage=1;
      closeDetail(); renderTable();
    });
  });

  /* Search */
  document.getElementById('searchInput').addEventListener('input',e=>{
    searchQ=e.target.value.toLowerCase();currentPage=1;renderTable();
  });

  /* Filters */
  ['filterStatus','filterKategori','filterPrioritas'].forEach(id=>{
    document.getElementById(id).addEventListener('change',e=>{
      if(id==='filterStatus')filterStatus=e.target.value;
      if(id==='filterKategori')filterKategori=e.target.value;
      if(id==='filterPrioritas')filterPrioritas=e.target.value;
      currentPage=1;renderTable();
    });
  });

  /* Page size */
  document.getElementById('pgSize').addEventListener('change',e=>{
    pageSize=parseInt(e.target.value);currentPage=1;renderTable();
  });

  /* Reset filter */
  document.getElementById('btnFilter').addEventListener('click',()=>{
    filterStatus=filterKategori=filterPrioritas=searchQ='';
    ['filterStatus','filterKategori','filterPrioritas'].forEach(id=>{document.getElementById(id).value='';});
    document.getElementById('searchInput').value='';
    currentPage=1;renderTable();
  });

  /* Check all */
  document.getElementById('checkAll').addEventListener('change',function(){
    document.querySelectorAll('.row-check').forEach(cb=>cb.checked=this.checked);
  });

  /* Auto-open first row */
  if(complaints[0])setTimeout(()=>openDetail(complaints[0].id),50);
});
</script>
@endpush