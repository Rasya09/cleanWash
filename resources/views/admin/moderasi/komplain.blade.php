@extends('admin.layouts.app')

@section('css')
  <link rel="stylesheet" href="{{ asset('assets/css/admin/komplain.css') }}">
@endsection

@section('content')

{{-- ═══ PELAPOR POPUP MODAL ═══ --}}
<div class="pelapor-modal-overlay" id="pelaporModal">
  <div class="pelapor-modal">
    <div class="pm-header">
      <h4>Informasi Pelapor</h4>
      <button class="pm-close" id="pmClose">✕</button>
    </div>
    <div class="pm-body">
      <div class="pm-avatar-row">
        <div class="pm-avatar" id="pmAvatar"></div>
        <div>
          <div class="pm-name" id="pmName"></div>
          <div class="pm-role">Pelanggan</div>
        </div>
      </div>
      <div class="pm-info-list" id="pmInfoList"></div>
    </div>
    <div class="pm-footer">
      <button class="pm-btn-wa" id="pmWa">
        <i class="fa-brands fa-whatsapp"></i> WhatsApp
      </button>
      <button class="pm-btn-email" id="pmEmail">
        <i class="fa-solid fa-envelope"></i> Email
      </button>
    </div>
  </div>
</div>

<main class="main">
{{-- ═══ PAGE BODY ═══ --}}
<div class="pgbody">

  {{-- MAIN CONTENT --}}
  <div class="content" id="mainContent">

    {{-- STAT CARDS --}}
    <div class="stat-row">
      <div class="scard">
        <div class="sico2 indigo">📋</div>
        <div>
          <div class="slabel">Total Laporan</div>
          <div class="sval" id="stat-total">186</div>
          <div class="ssub">Semua laporan</div>
        </div>
      </div>
      <div class="scard">
        <div class="sico2 orange">⏳</div>
        <div>
          <div class="slabel">Menunggu Tindak Lanjut</div>
          <div class="sval" id="stat-wait">32</div>
          <div class="ssub">17,2% dari total</div>
        </div>
      </div>
      <div class="scard">
        <div class="sico2 blue">⚙️</div>
        <div>
          <div class="slabel">Sedang Diproses</div>
          <div class="sval" id="stat-proc">68</div>
          <div class="ssub">36,6% dari total</div>
        </div>
      </div>
      <div class="scard">
        <div class="sico2 green">✅</div>
        <div>
          <div class="slabel">Selesai</div>
          <div class="sval" id="stat-done">78</div>
          <div class="ssub">41,9% dari total</div>
        </div>
      </div>
      <div class="scard">
        <div class="sico2 red">❌</div>
        <div>
          <div class="slabel">Ditolak</div>
          <div class="sval" id="stat-rej">8</div>
          <div class="ssub">4,3% dari total</div>
        </div>
      </div>
    </div>

    {{-- TABS --}}
    <div class="tabs" id="tabsBar">
      <div class="tab active" data-tab="semua">Semua <span class="tc" id="tc-semua">186</span></div>
      <div class="tab" data-tab="wait">Menunggu <span class="tc" id="tc-wait">32</span></div>
      <div class="tab" data-tab="proc">Diproses <span class="tc" id="tc-proc">68</span></div>
      <div class="tab" data-tab="done">Selesai <span class="tc" id="tc-done">78</span></div>
      <div class="tab" data-tab="rej">Ditolak <span class="tc" id="tc-rej">8</span></div>
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
            <th>Mitra Laundry</th>
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
      <div class="foot-row">
        <button class="btn-proc" id="btnProses">
          <i class="fa-solid fa-play"></i> Proses Laporan
        </button>
        <button class="btn-info" id="btnMintaInfo">
          <i class="fa-solid fa-comment-dots"></i> Minta Info Tambahan
        </button>
      </div>
      <button class="btn-reject" id="btnTolak">
        <i class="fa-solid fa-xmark"></i> Tolak Laporan
      </button>
    </div>
  </div>

</div>{{-- /pgbody --}}
</main>

@endsection

@push('scripts')
<script>
'use strict';

/* ─── DATA ─────────────────────────────────────────────── */
const complaints = [
  {
    id:'CMP-2024-0508-0001',
    pelapor:{nama:'Andi Pratama',inisial:'AP',warna:'#2563EB',hp:'0812-3456-7890',email:'andi.pratama@email.com',alamat:'Jl. Melati No. 12, Cipete Jakarta Selatan'},
    tipe:{nama:'Pakaian Rusak',ico:'👕',cls:'red'},
    mitra:{nama:'Laundry Bersih Sejahtera',inisial:'LB',cls:'blue'},
    orderId:'#ORD-2024-0508-0001',prioritas:'high',prioritasLabel:'Tinggi',
    status:'wait',statusLabel:'Menunggu',
    tanggal:'8 Mei 2024',jam:'09:20',
    orderTanggal:'7 Mei 2024, 14:10',orderSelesai:'8 Mei 2024, 09:20',
    totalBayar:'Rp85.000',
    deskripsi:'Pakaian saya (kemeja putih) rusak pada bagian lengan setelah dicuci. Mohon ganti rugi atau perbaikan.',
    lampiran:3,photos:['🧥','👔','📸'],dibuat:'8 Mei 2024, 09:20'
  },
  {
    id:'CMP-2024-0508-0002',
    pelapor:{nama:'Siti Aisyah',inisial:'SA',warna:'#10B981',hp:'0821-9876-5432',email:'siti.aisyah@email.com',alamat:'Jl. Kenanga No. 5, Tebet Jakarta Selatan'},
    tipe:{nama:'Terlambat Diambil',ico:'⏰',cls:'orange'},
    mitra:{nama:'Quick Wash Laundry',inisial:'QW',cls:'teal'},
    orderId:'#ORD-2024-0508-0002',prioritas:'med',prioritasLabel:'Sedang',
    status:'proc',statusLabel:'Diproses',
    tanggal:'8 Mei 2024',jam:'08:45',
    orderTanggal:'6 Mei 2024, 10:00',orderSelesai:'8 Mei 2024, 08:00',
    totalBayar:'Rp60.000',
    deskripsi:'Pakaian sudah seharusnya selesai kemarin tapi baru bisa diambil hari ini. Mohon penjelasan.',
    lampiran:1,photos:['📦'],dibuat:'8 Mei 2024, 08:45'
  },
  {
    id:'CMP-2024-0507-0015',
    pelapor:{nama:'Budi Santoso',inisial:'BS',warna:'#F59E0B',hp:'0813-2345-6789',email:'budi.santoso@email.com',alamat:'Jl. Anggrek No. 8, Kebayoran Jakarta Selatan'},
    tipe:{nama:'Hasil Cucian Buruk',ico:'✅',cls:'blue'},
    mitra:{nama:'Fresh & Clean Laundry',inisial:'FC',cls:'green'},
    orderId:'#ORD-2024-0507-0015',prioritas:'high',prioritasLabel:'Tinggi',
    status:'proc',statusLabel:'Diproses',
    tanggal:'7 Mei 2024',jam:'15:35',
    orderTanggal:'5 Mei 2024, 09:30',orderSelesai:'7 Mei 2024, 14:00',
    totalBayar:'Rp120.000',
    deskripsi:'Pakaian masih kotor setelah dicuci. Ada noda yang tidak hilang pada bagian kerah.',
    lampiran:2,photos:['👗','🔍'],dibuat:'7 Mei 2024, 15:35'
  },
  {
    id:'CMP-2024-0507-0014',
    pelapor:{nama:'Dewi Lestari',inisial:'DL',warna:'#7C3AED',hp:'0822-1122-3344',email:'dewi.lestari@email.com',alamat:'Jl. Dahlia No. 3, Pancoran Jakarta Selatan'},
    tipe:{nama:'Kehilangan Barang',ico:'🎒',cls:'orange'},
    mitra:{nama:'LaundryKita',inisial:'LK',cls:'orange'},
    orderId:'#ORD-2024-0507-0014',prioritas:'high',prioritasLabel:'Tinggi',
    status:'wait',statusLabel:'Menunggu',
    tanggal:'7 Mei 2024',jam:'14:25',
    orderTanggal:'4 Mei 2024, 11:00',orderSelesai:'7 Mei 2024, 13:00',
    totalBayar:'Rp95.000',
    deskripsi:'Jaket kulit saya hilang setelah proses laundry. Nilainya cukup besar, mohon segera ditangani.',
    lampiran:1,photos:['🧥'],dibuat:'7 Mei 2024, 14:25'
  },
  {
    id:'CMP-2024-0507-0013',
    pelapor:{nama:'Fahmi Hidayat',inisial:'FH',warna:'#EF4444',hp:'0838-7766-5544',email:'fahmi.hidayat@email.com',alamat:'Jl. Mawar No. 17, Mampang Jakarta Selatan'},
    tipe:{nama:'Pelayanan Buruk',ico:'⭐',cls:'purple'},
    mitra:{nama:'CleanPro Laundry',inisial:'CP',cls:'purple'},
    orderId:'#ORD-2024-0507-0013',prioritas:'med',prioritasLabel:'Sedang',
    status:'done',statusLabel:'Selesai',
    tanggal:'7 Mei 2024',jam:'11:15',
    orderTanggal:'3 Mei 2024, 08:00',orderSelesai:'7 Mei 2024, 10:00',
    totalBayar:'Rp45.000',
    deskripsi:'Staff tidak ramah dan tidak informatif terkait status cucian. Pengalaman yang sangat buruk.',
    lampiran:0,photos:[],dibuat:'7 Mei 2024, 11:15'
  },
  {
    id:'CMP-2024-0506-0010',
    pelapor:{nama:'Rini Wulandari',inisial:'RW',warna:'#06B6D4',hp:'0815-5566-7788',email:'rini.wulandari@email.com',alamat:'Jl. Cempaka No. 22, Cilandak Jakarta Selatan'},
    tipe:{nama:'Tagihan Salah',ico:'💰',cls:'green'},
    mitra:{nama:'Bersih Kilat',inisial:'BK',cls:'cyan'},
    orderId:'#ORD-2024-0506-0010',prioritas:'low',prioritasLabel:'Rendah',
    status:'done',statusLabel:'Selesai',
    tanggal:'6 Mei 2024',jam:'16:00',
    orderTanggal:'2 Mei 2024, 13:00',orderSelesai:'6 Mei 2024, 15:00',
    totalBayar:'Rp75.000',
    deskripsi:'Tagihan yang diterima lebih besar dari yang seharusnya. Ada biaya tambahan yang tidak jelas.',
    lampiran:2,photos:['📄','💳'],dibuat:'6 Mei 2024, 16:00'
  },
  {
    id:'CMP-2024-0506-0009',
    pelapor:{nama:'Ahmad Fauzi',inisial:'AF',warna:'#4F46E5',hp:'0819-2233-4455',email:'ahmad.fauzi@email.com',alamat:'Jl. Seruni No. 9, Jagakarsa Jakarta Selatan'},
    tipe:{nama:'Pakaian Rusak',ico:'👕',cls:'red'},
    mitra:{nama:'Laundry Express',inisial:'LE',cls:'indigo'},
    orderId:'#ORD-2024-0506-0009',prioritas:'med',prioritasLabel:'Sedang',
    status:'rej',statusLabel:'Ditolak',
    tanggal:'6 Mei 2024',jam:'10:30',
    orderTanggal:'1 Mei 2024, 09:00',orderSelesai:'6 Mei 2024, 09:00',
    totalBayar:'Rp55.000',
    deskripsi:'Warna celana berubah setelah dicuci. Awalnya biru tua, sekarang menjadi pucat.',
    lampiran:1,photos:['👖'],dibuat:'6 Mei 2024, 10:30'
  },
  {
    id:'CMP-2024-0505-0005',
    pelapor:{nama:'Lina Marlina',inisial:'LM',warna:'#0D9488',hp:'0823-6677-8899',email:'lina.marlina@email.com',alamat:'Jl. Tulip No. 14, Pesanggrahan Jakarta Selatan'},
    tipe:{nama:'Kehilangan Barang',ico:'🎒',cls:'orange'},
    mitra:{nama:'Sparkle Laundry',inisial:'SL',cls:'red'},
    orderId:'#ORD-2024-0505-0005',prioritas:'high',prioritasLabel:'Tinggi',
    status:'proc',statusLabel:'Diproses',
    tanggal:'5 Mei 2024',jam:'09:10',
    orderTanggal:'29 Apr 2024, 10:00',orderSelesai:'5 Mei 2024, 08:00',
    totalBayar:'Rp110.000',
    deskripsi:'Sepasang kaus kaki dan satu baju anak tidak ada dalam hasil laundry yang dikembalikan.',
    lampiran:0,photos:[],dibuat:'5 Mei 2024, 09:10'
  }
];

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
const statusBadge = (s,l) => `<span class="badge ${s}">${l}</span>`;
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
        <div class="plcell pl-clickable" data-pelapor-id="${c.id}" title="Lihat profil pelapor">
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
        <div class="mc">
          <div class="mlogo ${c.mitra.cls}" style="color:#fff;font-weight:700">${c.mitra.inisial}</div>
          <span class="mname">${c.mitra.nama}</span>
        </div>
      </td>
      <td><span class="oid">${c.orderId}</span></td>
      <td>${prioBadge(c.prioritas,c.prioritasLabel)}</td>
      <td>${statusBadge(c.status,c.statusLabel)}</td>
      <td><div class="tdate">${c.tanggal}</div><div class="ttime">${c.jam}</div></td>
      <td>
        <div class="acell">
          <button class="abtn v btn-view" data-id="${c.id}" title="Lihat Detail"><i class="fa-solid fa-eye"></i></button>
          <button class="abtn btn-more" data-id="${c.id}" title="Lainnya"><i class="fa-solid fa-ellipsis"></i></button>
        </div>
      </td>
    </tr>
  `).join('');

  /* events */
  tbody.querySelectorAll('tr[data-id]').forEach(tr=>{
    tr.addEventListener('click',e=>{
      if(e.target.closest('.row-check,.abtn,.pl-clickable')) return;
      openDetail(tr.dataset.id);
    });
  });
  tbody.querySelectorAll('.btn-view').forEach(btn=>{
    btn.addEventListener('click',e=>{e.stopPropagation();openDetail(btn.dataset.id);});
  });
  tbody.querySelectorAll('.btn-more').forEach(btn=>{
    btn.addEventListener('click',e=>e.stopPropagation());
  });
  tbody.querySelectorAll('.pl-clickable').forEach(cell=>{
    cell.addEventListener('click',e=>{e.stopPropagation();openPelaporModal(cell.dataset.pelaporId);});
  });

  renderPagination(total);
  updateTabCounts();
}

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
    btn.addEventListener('click',()=>{currentPage=parseInt(btn.dataset.pg);renderTable();});
  });
  const prev=document.getElementById('pgPrev');
  const next=document.getElementById('pgNext');
  if(prev)prev.addEventListener('click',()=>{if(currentPage>1){currentPage--;renderTable();}});
  if(next)next.addEventListener('click',()=>{if(currentPage<totalPages){currentPage++;renderTable();}});
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

/* ─── PELAPOR MODAL ──────────────────────────────────── */
function openPelaporModal(id){
  const c=complaints.find(x=>x.id===id);if(!c)return;
  const p=c.pelapor;
  document.getElementById('pmAvatar').style.background=p.warna;
  document.getElementById('pmAvatar').textContent=p.inisial;
  document.getElementById('pmName').textContent=p.nama;
  document.getElementById('pmInfoList').innerHTML=`
    <div class="pm-info-row">
      <div class="pm-info-icon blue"><i class="fa-solid fa-phone"></i></div>
      <div><div class="pm-info-label">No. WhatsApp</div><div class="pm-info-val">${p.hp}</div></div>
    </div>
    <div class="pm-info-row">
      <div class="pm-info-icon green"><i class="fa-solid fa-envelope"></i></div>
      <div><div class="pm-info-label">Email</div><div class="pm-info-val">${p.email}</div></div>
    </div>
    <div class="pm-info-row">
      <div class="pm-info-icon orange"><i class="fa-solid fa-location-dot"></i></div>
      <div><div class="pm-info-label">Alamat</div><div class="pm-info-val">${p.alamat}</div></div>
    </div>`;
  document.getElementById('pmWa').onclick=()=>window.open(`https://wa.me/${p.hp.replace(/\D/g,'')}`, '_blank');
  document.getElementById('pmEmail').onclick=()=>{window.location.href=`mailto:${p.email}`;};
  document.getElementById('pelaporModal').classList.add('show');
  document.body.style.overflow='hidden';
}
function closePelaporModal(){
  document.getElementById('pelaporModal').classList.remove('show');
  document.body.style.overflow='';
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
        <div class="drow"><span class="drow-l">Nama</span><span class="drow-r">${c.pelapor.nama}</span></div>
        <div class="drow"><span class="drow-l">No. WhatsApp</span>
          <span class="drow-r" style="display:flex;align-items:center;gap:6px">${c.pelapor.hp}<i class="fa-brands fa-whatsapp" style="color:#25D366;font-size:14px"></i></span></div>
        <div class="drow"><span class="drow-l">Email</span><span class="drow-r">${c.pelapor.email}</span></div>
        <div class="drow"><span class="drow-l">Alamat</span><span class="drow-r" style="max-width:180px">${c.pelapor.alamat}</span></div>
      </div>
    </div>
    <div class="dsec">
      <div class="dsec-title"><span class="si green"><i class="fa-solid fa-cart-shopping"></i></span>Informasi Order</div>
      <div class="drows">
        <div class="drow"><span class="drow-l">Order ID</span><span class="drow-r primary">${c.orderId}</span></div>
        <div class="drow"><span class="drow-l">Mitra Laundry</span><span class="drow-r">${c.mitra.nama}</span></div>
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
  if(c.status==='proc'){
    document.getElementById('btnProses').innerHTML='<i class="fa-solid fa-check"></i> Tandai Selesai';
    document.getElementById('btnProses').style.background='var(--success)';
  }else{
    document.getElementById('btnProses').innerHTML='<i class="fa-solid fa-play"></i> Proses Laporan';
    document.getElementById('btnProses').style.background='var(--primary)';
  }
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
document.getElementById('btnProses').addEventListener('click',()=>{
  if(!selectedId)return;
  const c=complaints.find(x=>x.id===selectedId);if(!c)return;
  if(c.status==='wait'){c.status='proc';c.statusLabel='Diproses';}
  else if(c.status==='proc'){c.status='done';c.statusLabel='Selesai';closeDetail();}
  renderTable();
  if(selectedId)openDetail(selectedId);
});
document.getElementById('btnTolak').addEventListener('click',()=>{
  if(!selectedId)return;
  const c=complaints.find(x=>x.id===selectedId);if(!c)return;
  if(confirm(`Tolak laporan ${c.id}?`)){c.status='rej';c.statusLabel='Ditolak';closeDetail();renderTable();}
});
document.getElementById('btnMintaInfo').addEventListener('click',()=>{
  alert('Fitur minta info tambahan akan segera tersedia.');
});

/* ─── INIT ───────────────────────────────────────────── */
document.addEventListener('DOMContentLoaded',()=>{

  renderTable();

  /* Pelapor modal */
  document.getElementById('pmClose').addEventListener('click',closePelaporModal);
  document.getElementById('pelaporModal').addEventListener('click',e=>{
    if(e.target===e.currentTarget)closePelaporModal();
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