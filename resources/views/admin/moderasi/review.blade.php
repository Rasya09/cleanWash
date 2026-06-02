@extends('admin.layouts.app')

@section('css')
  <link rel="stylesheet" href="{{ asset('assets/css/admin/review.css') }}">
@endsection

@section('content')

<main class="main">
<div class="pgbody">

  {{-- ══════════ MAIN CONTENT ══════════ --}}
  <div class="content" id="mainContent">

    {{-- STAT CARDS --}}
    <div class="stat-row">
      <div class="scard">
        <div class="sico2 yellow">⭐</div>
        <div class="sd">
          <div class="slabel">Total Review</div>
          <div class="sval" id="stat-total">1.248</div>
          <div class="ssub">Semua review</div>
        </div>
      </div>
      <div class="scard">
        <div class="sico2 green">🏅</div>
        <div class="sd">
          <div class="slabel">Rata-rata Rating</div>
          <div class="sval mid" id="stat-avg">4.6<span style="font-size:13px;font-weight:500;color:var(--g400)">/5</span></div>
          <div class="ssub">Dari semua review</div>
        </div>
      </div>
      <div class="scard">
        <div class="sico2 blue">👍</div>
        <div class="sd">
          <div class="slabel">Review Positif</div>
          <div class="sval" id="stat-pos">1.032</div>
          <div class="ssub">82,7% dari total</div>
        </div>
      </div>
      <div class="scard">
        <div class="sico2 orange">😐</div>
        <div class="sd">
          <div class="slabel">Review Netral</div>
          <div class="sval" id="stat-net">156</div>
          <div class="ssub">12,5% dari total</div>
        </div>
      </div>
      <div class="scard">
        <div class="sico2 red">👎</div>
        <div class="sd">
          <div class="slabel">Review Negatif</div>
          <div class="sval" id="stat-neg">60</div>
          <div class="ssub">4,8% dari total</div>
        </div>
      </div>
    </div>

    {{-- TABS --}}
    <div class="tabs" id="tabsBar">
      <div class="tab active" data-tab="semua">Semua <span class="tc" id="tc-semua">1.248</span></div>
      <div class="tab" data-tab="wait">Menunggu Review <span class="tc" id="tc-wait">32</span></div>
      <div class="tab" data-tab="ok">Disetujui <span class="tc" id="tc-ok">1.152</span></div>
      <div class="tab" data-tab="rej">Ditolak <span class="tc" id="tc-rej">64</span></div>
    </div>

    {{-- TOOLBAR --}}
    <div class="toolbar">
      <div class="fsrch">
        <i class="fa-solid fa-magnifying-glass fi"></i>
        <input type="text" id="searchInput" placeholder="Cari mitra, pelanggan, atau order ID..." />
      </div>
      <div class="fsel">
        <i class="fa-solid fa-star" style="color:var(--g400);font-size:12px"></i>
        <select id="filterRating">
          <option value="">Rating</option>
          <option value="5">★★★★★ 5.0</option>
          <option value="4">★★★★☆ 4.0</option>
          <option value="3">★★★☆☆ 3.0</option>
          <option value="2">★★☆☆☆ 2.0</option>
          <option value="1">★☆☆☆☆ 1.0</option>
        </select>
      </div>
      <div class="fsel">
        <i class="fa-solid fa-circle-dot" style="color:var(--g400);font-size:12px"></i>
        <select id="filterStatus">
          <option value="">Status</option>
          <option value="ok">Disetujui</option>
          <option value="wait">Menunggu</option>
          <option value="rej">Ditolak</option>
        </select>
      </div>
      <div class="fsel">
        <i class="fa-solid fa-store" style="color:var(--g400);font-size:12px"></i>
        <select id="filterMitra">
          <option value="">Mitra Laundry</option>
          <option value="Laundry Bersih Sejahtera">Laundry Bersih Sejahtera</option>
          <option value="Fresh & Clean Laundry">Fresh &amp; Clean Laundry</option>
          <option value="Quick Wash Laundry">Quick Wash Laundry</option>
          <option value="LaundryKita">LaundryKita</option>
          <option value="CleanPro Laundry">CleanPro Laundry</option>
        </select>
      </div>
      <div class="fdate">
        <i class="fa-regular fa-calendar" style="font-size:12px"></i>
        <input type="date" id="filterDateFrom" />
        <span class="farrow">→</span>
        <input type="date" id="filterDateTo" />
      </div>
      <button class="btn-filter" id="btnFilter">
        <i class="fa-solid fa-sliders"></i> Filter
      </button>
    </div>

    {{-- TABLE --}}
    <div class="twrap">
      <table class="dtbl" id="reviewTable">
        <thead>
          <tr>
            <th style="width:38px"><input type="checkbox" id="checkAll" /></th>
            <th>Review</th>
            <th>Pelanggan</th>
            <th>Mitra Laundry</th>
            <th>Order ID</th>
            <th>Rating</th>
            <th>Tanggal</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody id="tableBody"></tbody>
      </table>
    </div>

    {{-- PAGINATION --}}
    <div class="pagibar">
      <span class="pginfo" id="pgInfo">Menampilkan 1 – 8 dari 1.248 data</span>
      <div class="pgright">
        <div class="pps">
          <span>Tampilkan</span>
          <select id="pgSize">
            <option value="8">10</option>
            <option value="25">25</option>
            <option value="50">50</option>
          </select>
          <span>/ halaman</span>
        </div>
        <div class="pgbtns" id="pgBtns"></div>
      </div>
    </div>

  </div>{{-- /content --}}

  {{-- ══════════ DETAIL PANEL ══════════ --}}
  <div class="detail" id="detailPanel" style="display:none">
    <div class="dethdr">
      <h3>Detail Review</h3>
      <button class="cbtn" id="detailClose" title="Tutup">✕</button>
    </div>
    <div class="detbody" id="detailBody"></div>
    <div class="detfoot" id="detailFoot">
      <div class="foot-row">
        <button class="btn-proc" id="btnSetujui">
          <i class="fa-solid fa-check"></i> Setujui Review
        </button>
        <button class="btn-info" id="btnSpam">
          <i class="fa-solid fa-triangle-exclamation"></i> Tandai Spam
        </button>
      </div>
      <button class="btn-reject" id="btnTolak">
        <i class="fa-solid fa-xmark"></i> Tolak Review
      </button>
    </div>
  </div>

</div>{{-- /pgbody --}}
</main>

@endsection

@push('scripts')
<script>
/* ═══════════════════════════════════════════════════════════════
   DATA
═══════════════════════════════════════════════════════════════ */
const reviews = [
  {
    id:'RV-001',
    nama:'Andi Pratama', inisial:'AP', warna:'#2563EB',
    teks:'Cucian bersih, wangi dan rapi. Pengantaran tepat waktu, sangat memuaskan!',
    pelanggan:{nama:'Andi Pratama', hp:'0812-3456-7890', email:'andi.pratama@email.com'},
    mitra:{nama:'Laundry Bersih Sejahtera', logo:'LB', warna:'blue', kota:'Jakarta Selatan'},
    orderId:'#ORD-2024-0508-0001',
    rating:5,
    tglOrder:'7 Mei 2024, 14:10',
    tglSelesai:'8 Mei 2024, 09:20',
    totalBayar:'Rp85.000',
    tanggal:'8 Mei 2024', jam:'09:20',
    status:'ok', statusLabel:'Disetujui',
    approvedBy:'Super Admin', approvedAt:'8 Mei 2024, 09:25',
  },
  {
    id:'RV-002',
    nama:'Siti Aisyah', inisial:'SA', warna:'#10B981',
    teks:'Pelayanan bagus, cuma pengambilan sedikit telat tapi overall oke.',
    pelanggan:{nama:'Siti Aisyah', hp:'0821-9876-5432', email:'siti.aisyah@email.com'},
    mitra:{nama:'Fresh & Clean Laundry', logo:'FC', warna:'green', kota:'Jakarta Pusat'},
    orderId:'#ORD-2024-0507-0015',
    rating:4,
    tglOrder:'6 Mei 2024, 10:00',
    tglSelesai:'7 Mei 2024, 15:35',
    totalBayar:'Rp62.000',
    tanggal:'7 Mei 2024', jam:'15:35',
    status:'ok', statusLabel:'Disetujui',
    approvedBy:'Super Admin', approvedAt:'7 Mei 2024, 16:00',
  },
  {
    id:'RV-003',
    nama:'Budi Santoso', inisial:'BS', warna:'#F59E0B',
    teks:'Hasil cucian oke, tapi ada baju yang kusut setelah dicuci. Perlu diperbaiki.',
    pelanggan:{nama:'Budi Santoso', hp:'0813-2345-6789', email:'budi.santoso@email.com'},
    mitra:{nama:'Quick Wash Laundry', logo:'QW', warna:'orange', kota:'Jakarta Timur'},
    orderId:'#ORD-2024-0508-0002',
    rating:3,
    tglOrder:'7 Mei 2024, 08:00',
    tglSelesai:'8 Mei 2024, 08:50',
    totalBayar:'Rp48.000',
    tanggal:'8 Mei 2024', jam:'08:50',
    status:'ok', statusLabel:'Disetujui',
    approvedBy:'Super Admin', approvedAt:'8 Mei 2024, 09:00',
  },
  {
    id:'RV-004',
    nama:'Dewi Lestari', inisial:'DL', warna:'#7C3AED',
    teks:'Cucian bersih dan wangi. Pelayanan ramah dan tepat waktu. Puas!',
    pelanggan:{nama:'Dewi Lestari', hp:'0822-1122-3344', email:'dewi.lestari@email.com'},
    mitra:{nama:'LaundryKita', logo:'LK', warna:'purple', kota:'Jakarta Barat'},
    orderId:'#ORD-2024-0507-0014',
    rating:5,
    tglOrder:'6 Mei 2024, 12:00',
    tglSelesai:'7 Mei 2024, 14:25',
    totalBayar:'Rp75.000',
    tanggal:'7 Mei 2024', jam:'14:25',
    status:'ok', statusLabel:'Disetujui',
    approvedBy:'Super Admin', approvedAt:'7 Mei 2024, 15:00',
  },
  {
    id:'RV-005',
    nama:'Fahmi Hidayat', inisial:'FH', warna:'#EF4444',
    teks:'Proses cepat, tapi ada kancing baju yang lepas setelah dicuci.',
    pelanggan:{nama:'Fahmi Hidayat', hp:'0838-7766-5544', email:'fahmi.hidayat@email.com'},
    mitra:{nama:'CleanPro Laundry', logo:'CP', warna:'red', kota:'Jakarta Utara'},
    orderId:'#ORD-2024-0507-0013',
    rating:4,
    tglOrder:'6 Mei 2024, 09:00',
    tglSelesai:'7 Mei 2024, 11:15',
    totalBayar:'Rp55.000',
    tanggal:'7 Mei 2024', jam:'11:15',
    status:'wait', statusLabel:'Menunggu',
    approvedBy:null, approvedAt:null,
  },
  {
    id:'RV-006',
    nama:'Rini Wulandari', inisial:'RW', warna:'#06B6D4',
    teks:'Laundry kiloan terbaik! Harga terjangkau dan hasil memuaskan.',
    pelanggan:{nama:'Rini Wulandari', hp:'0815-5566-7788', email:'rini.wulandari@email.com'},
    mitra:{nama:'Laundry Bersih Sejahtera', logo:'LB', warna:'blue', kota:'Jakarta Selatan'},
    orderId:'#ORD-2024-0506-0010',
    rating:5,
    tglOrder:'5 Mei 2024, 11:00',
    tglSelesai:'6 Mei 2024, 16:00',
    totalBayar:'Rp90.000',
    tanggal:'6 Mei 2024', jam:'16:00',
    status:'ok', statusLabel:'Disetujui',
    approvedBy:'Super Admin', approvedAt:'6 Mei 2024, 16:30',
  },
  {
    id:'RV-007',
    nama:'Ahmad Fauzi', inisial:'AF', warna:'#4F46E5',
    teks:'Kecewa, pakaian dikembalikan masih berbau. Tidak sesuai ekspektasi.',
    pelanggan:{nama:'Ahmad Fauzi', hp:'0819-2233-4455', email:'ahmad.fauzi@email.com'},
    mitra:{nama:'Fresh & Clean Laundry', logo:'FC', warna:'green', kota:'Jakarta Pusat'},
    orderId:'#ORD-2024-0506-0009',
    rating:2,
    tglOrder:'5 Mei 2024, 09:00',
    tglSelesai:'6 Mei 2024, 10:30',
    totalBayar:'Rp42.000',
    tanggal:'6 Mei 2024', jam:'10:30',
    status:'rej', statusLabel:'Ditolak',
    approvedBy:'Super Admin', approvedAt:'6 Mei 2024, 11:00',
  },
  {
    id:'RV-008',
    nama:'Maya Sari', inisial:'MS', warna:'#D97706',
    teks:'Pelayanan standar, perlu ditingkatkan lagi kualitas cucinya.',
    pelanggan:{nama:'Maya Sari', hp:'0856-4433-2211', email:'maya.sari@email.com'},
    mitra:{nama:'Quick Wash Laundry', logo:'QW', warna:'orange', kota:'Jakarta Timur'},
    orderId:'#ORD-2024-0505-0007',
    rating:3,
    tglOrder:'4 Mei 2024, 13:00',
    tglSelesai:'5 Mei 2024, 14:00',
    totalBayar:'Rp38.000',
    tanggal:'5 Mei 2024', jam:'14:00',
    status:'wait', statusLabel:'Menunggu',
    approvedBy:null, approvedAt:null,
  },
];

/* ─── STATE ─── */
let activeTab='semua', searchQ='', filterRating='', filterStatus='', filterMitra='';
let currentPage=1, pageSize=8;
let selectedId=null;

const overlay=document.getElementById('sidebarOverlay');
function showOverlay(cb){
  overlay.classList.add('active');
  overlay._closeCallback=cb;
  document.body.style.overflow='hidden';
}
function hideOverlay(){
  overlay.classList.remove('active');
  overlay._closeCallback=null;
  document.body.style.overflow='';
}

/* ═══════════════════════════════════════════════════════════════
   HELPERS
═══════════════════════════════════════════════════════════════ */
function stars(n, big=false){
  let h='';
  for(let i=1;i<=5;i++){
    const cls=big?'bstar':'star';
    h+=`<span class="${cls}${i<=n?' on':''}">${i<=n?'★':'☆'}</span>`;
  }
  return h;
}

function statusBadge(s,l){
  return `<span class="badge ${s}">${l}</span>`;
}

/* ═══════════════════════════════════════════════════════════════
   RENDER TABLE
═══════════════════════════════════════════════════════════════ */
function getFiltered(){
  return reviews.filter(r=>{
    if(activeTab==='wait' && r.status!=='wait') return false;
    if(activeTab==='ok'   && r.status!=='ok')   return false;
    if(activeTab==='rej'  && r.status!=='rej')  return false;
    if(filterRating && r.rating!==parseInt(filterRating)) return false;
    if(filterStatus && r.status!==filterStatus) return false;
    if(filterMitra  && r.mitra.nama!==filterMitra) return false;
    if(searchQ){
      const q=searchQ.toLowerCase();
      if(!r.nama.toLowerCase().includes(q) &&
         !r.mitra.nama.toLowerCase().includes(q) &&
         !r.orderId.toLowerCase().includes(q)) return false;
    }
    return true;
  });
}

function renderTable(){
  const filtered=getFiltered();
  const total=filtered.length;
  const start=(currentPage-1)*pageSize;
  const page=filtered.slice(start,start+pageSize);

  const tbody=document.getElementById('tableBody');
  tbody.innerHTML=page.map(r=>`
    <tr data-id="${r.id}" class="${selectedId===r.id?'sel':''}">
      <td><input type="checkbox" class="row-check"></td>
      <td>
        <div class="rev-cell">
          <div class="rev-ava" style="background:${r.inisial?'linear-gradient(135deg,'+r.warna+',#06B6D4)':'var(--g200)'}">${r.inisial}</div>
          <div>
            <div class="rev-name">${r.nama}</div>
            <div class="rev-text">${r.teks}</div>
          </div>
        </div>
      </td>
      <td>
        <div class="plg-name">${r.pelanggan.nama}</div>
        <div class="plg-phone">${r.pelanggan.hp}</div>
      </td>
      <td>
        <div class="mc">
          <div class="mlogo ${r.mitra.warna}" style="color:#fff;font-size:10px;font-weight:700">${r.mitra.logo}</div>
          <span class="mname">${r.mitra.nama}</span>
        </div>
      </td>
      <td><span class="oid">${r.orderId}</span></td>
      <td>
        <div class="stars">
          <div class="star-row">${stars(r.rating)}</div>
          <span class="snum">${r.rating.toFixed(1)}</span>
        </div>
      </td>
      <td>
        <div class="tdate">${r.tanggal}</div>
        <div class="ttime">${r.jam}</div>
      </td>
      <td>${statusBadge(r.status,r.statusLabel)}</td>
      <td>
        <div class="acell">
          <button class="abtn v" title="Lihat detail" onclick="event.stopPropagation();openDetail('${r.id}')">
            <i class="fa-regular fa-eye"></i>
          </button>
          <button class="abtn" title="Opsi lain" onclick="event.stopPropagation()">
            <i class="fa-solid fa-ellipsis-vertical"></i>
          </button>
        </div>
      </td>
    </tr>
  `).join('');

  /* click baris */
  tbody.querySelectorAll('tr[data-id]').forEach(tr=>{
    tr.addEventListener('click',()=>openDetail(tr.dataset.id));
  });

  /* pagination */
  const totalPages=Math.max(1,Math.ceil(total/pageSize));
  document.getElementById('pgInfo').textContent=
    `Menampilkan ${total===0?0:start+1} – ${Math.min(start+pageSize,total)} dari ${total.toLocaleString('id-ID')} data`;
  renderPagination(totalPages);
}

function renderPagination(tp){
  const c=document.getElementById('pgBtns');
  let h='';
  h+=`<button class="pgb nav" onclick="goPage(${currentPage-1})" ${currentPage===1?'disabled':''}>&#8249;</button>`;
  const pages=[];
  if(tp<=6){for(let i=1;i<=tp;i++)pages.push(i);}
  else{
    pages.push(1);
    if(currentPage>3)pages.push('…');
    for(let i=Math.max(2,currentPage-1);i<=Math.min(tp-1,currentPage+1);i++)pages.push(i);
    if(currentPage<tp-2)pages.push('…');
    pages.push(tp);
  }
  pages.forEach(p=>{
    if(p==='…') h+=`<span class="pgdots">…</span>`;
    else h+=`<button class="pgb${p===currentPage?' active':''}" onclick="goPage(${p})">${p}</button>`;
  });
  h+=`<button class="pgb nav" onclick="goPage(${currentPage+1})" ${currentPage===tp?'disabled':''}>&#8250;</button>`;
  c.innerHTML=h;
}

function goPage(p){
  const tp=Math.ceil(getFiltered().length/pageSize)||1;
  if(p<1||p>tp)return;
  currentPage=p; renderTable();
}

/* ═══════════════════════════════════════════════════════════════
   DETAIL PANEL
═══════════════════════════════════════════════════════════════ */
function openDetail(id){
  const r=reviews.find(x=>x.id===id);if(!r)return;
  selectedId=id;

  document.querySelectorAll('tr[data-id]').forEach(tr=>{
    tr.classList.toggle('sel',tr.dataset.id===id);
  });

  const panel=document.getElementById('detailPanel');
  const foot =document.getElementById('detailFoot');
  const body =document.getElementById('detailBody');

  const approvedRow=r.approvedBy
    ?`<div class="drow"><span class="drow-l">Oleh</span><span class="drow-r">${r.approvedBy} &bull; ${r.approvedAt}</span></div>`:'';

  body.innerHTML=`
    <div class="d-hero">
      <div class="d-status-badge">${r.statusLabel}</div>
      <div class="d-cmpid">${r.id}</div>
      <div class="d-created">Dikirim: ${r.tanggal}, ${r.jam}</div>
    </div>
    <div class="dsec">
      <div class="dsec-title"><span class="si blue"><i class="fa-solid fa-user"></i></span>Informasi Pelanggan</div>
      <div class="drows">
        <div class="drow"><span class="drow-l">Nama</span><span class="drow-r">${r.pelanggan.nama}</span></div>
        <div class="drow"><span class="drow-l">No. WhatsApp</span>
          <span class="drow-r" style="display:flex;align-items:center;gap:6px">${r.pelanggan.hp}<i class="fa-brands fa-whatsapp" style="color:#25D366;font-size:14px"></i></span></div>
        <div class="drow"><span class="drow-l">Email</span><span class="drow-r">${r.pelanggan.email}</span></div>
      </div>
    </div>
    <div class="dsec">
      <div class="dsec-title"><span class="si green"><i class="fa-solid fa-cart-shopping"></i></span>Informasi Order</div>
      <div class="drows">
        <div class="drow"><span class="drow-l">Order ID</span><span class="drow-r primary">${r.orderId}</span></div>
        <div class="drow"><span class="drow-l">Mitra Laundry</span>
          <span class="drow-r" style="display:flex;align-items:center;gap:6px">
            <span class="mlogo ${r.mitra.warna}" style="color:#fff;font-size:9px;font-weight:700;width:20px;height:20px;border-radius:4px;display:inline-flex;align-items:center;justify-content:center">${r.mitra.logo}</span>
            ${r.mitra.nama}
          </span>
        </div>
        <div class="drow"><span class="drow-l">Tanggal Order</span><span class="drow-r">${r.tglOrder}</span></div>
        <div class="drow"><span class="drow-l">Tanggal Selesai</span><span class="drow-r">${r.tglSelesai}</span></div>
        <div class="drow"><span class="drow-l">Total Bayar</span><span class="drow-r">${r.totalBayar}</span></div>
      </div>
    </div>
    <div class="dsec">
      <div class="dsec-title"><span class="si yellow"><i class="fa-solid fa-star"></i></span>Review &amp; Rating</div>
      <div class="tp-grid">
        <div class="tp-row"><span class="tp-label">Rating</span>
          <span class="tp-val" style="display:flex;align-items:center;gap:6px">
            ${stars(r.rating,false)}
            <span style="font-weight:600;color:var(--g900)">${r.rating.toFixed(1)}</span>
          </span>
        </div>
      </div>
      <div class="desc-text" style="margin-top:8px">${r.teks}</div>
    </div>
    <div class="dsec">
      <div class="dsec-title"><span class="si ${r.status==='ok'?'green':r.status==='rej'?'red':'orange'}"><i class="fa-solid fa-circle-check"></i></span>Status Review</div>
      <div class="drows">
        <div class="drow"><span class="drow-l">Status</span><span class="drow-r">${statusBadge(r.status,r.statusLabel)}</span></div>
        ${approvedRow}
      </div>
    </div>
    <div class="dsec">
      <div class="dsec-title"><span class="si indigo"><i class="fa-solid fa-note-sticky"></i></span>Catatan Admin</div>
      <textarea class="note-area" id="noteArea" placeholder="Tambahkan catatan admin di sini..."></textarea>
      <button class="btn-save" id="btnSave" style="margin-top:8px;width:100%">
        <i class="fa-solid fa-floppy-disk"></i> Simpan Catatan
      </button>
    </div>
  `;

  panel.style.display='flex';

  /* Footer aksi: sembunyikan tombol yang tidak relevan */
  const btnSetujui=document.getElementById('btnSetujui');
  const btnTolak  =document.getElementById('btnTolak');
  if(r.status==='ok'){
    btnSetujui.disabled=true; btnSetujui.style.opacity='.45';
    btnTolak.disabled=false;  btnTolak.style.opacity='1';
  } else if(r.status==='rej'){
    btnSetujui.disabled=false; btnSetujui.style.opacity='1';
    btnTolak.disabled=true;    btnTolak.style.opacity='.45';
  } else {
    btnSetujui.disabled=false; btnSetujui.style.opacity='1';
    btnTolak.disabled=false;   btnTolak.style.opacity='1';
  }

  /* Bind save note */
  document.getElementById('btnSave').addEventListener('click',()=>{
    const note=document.getElementById('noteArea');
    if(note && note.value.trim()) alert('Catatan berhasil disimpan.');
  });

  /* Mobile: slide up + overlay */
  if(window.innerWidth<=768){
    requestAnimationFrame(()=>requestAnimationFrame(()=>{
      panel.classList.add('panel-open');
      showOverlay(closeDetail);
      document.body.style.overflow='hidden';
    }));
  }
}

function closeDetail(){
  const panel=document.getElementById('detailPanel');
  if(window.innerWidth<=768){
    panel.classList.remove('panel-open');
    hideOverlay();
    setTimeout(()=>{panel.style.display='none';},310);
  } else {
    panel.style.display='none';
  }
  selectedId=null;
  document.querySelectorAll('tr[data-id]').forEach(tr=>tr.classList.remove('sel'));
}

function changeStatus(id, status, label){
  const r=reviews.find(x=>x.id===id);if(!r)return;
  r.status=status; r.statusLabel=label;
  if(status!=='wait'){
    r.approvedBy='Super Admin';
    const now=new Date();
    r.approvedAt=now.toLocaleDateString('id-ID',{day:'numeric',month:'long',year:'numeric'})
      +', '+now.toLocaleTimeString('id-ID',{hour:'2-digit',minute:'2-digit'});
  }
  renderTable();
  openDetail(id);
}

/* ═══════════════════════════════════════════════════════════════
   INIT
═══════════════════════════════════════════════════════════════ */
document.addEventListener('DOMContentLoaded',()=>{

  renderTable();

  /* Detail close */
  document.getElementById('detailClose').addEventListener('click', closeDetail);

  /* Footer aksi */
  document.getElementById('btnSetujui').addEventListener('click',()=>{
    if(!selectedId)return;
    changeStatus(selectedId,'ok','Disetujui');
  });
  document.getElementById('btnTolak').addEventListener('click',()=>{
    if(!selectedId)return;
    const r=reviews.find(x=>x.id===selectedId);if(!r)return;
    if(confirm(`Tolak review ${r.id}?`)){changeStatus(selectedId,'rej','Ditolak');}
  });
  document.getElementById('btnSpam').addEventListener('click',()=>{
    alert('Fitur tandai spam akan segera tersedia.');
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
    searchQ=e.target.value; currentPage=1; renderTable();
  });

  /* Dropdowns */
  document.getElementById('filterRating').addEventListener('change',e=>{filterRating=e.target.value;currentPage=1;renderTable();});
  document.getElementById('filterStatus').addEventListener('change',e=>{filterStatus=e.target.value;currentPage=1;renderTable();});
  document.getElementById('filterMitra').addEventListener('change',e=>{filterMitra=e.target.value;currentPage=1;renderTable();});

  /* Reset filter */
  document.getElementById('btnFilter').addEventListener('click',()=>{
    filterRating=filterStatus=filterMitra=searchQ='';
    ['filterRating','filterStatus','filterMitra'].forEach(id=>{document.getElementById(id).value='';});
    document.getElementById('searchInput').value='';
    currentPage=1; renderTable();
  });

  /* Page size */
  document.getElementById('pgSize').addEventListener('change',e=>{
    pageSize=parseInt(e.target.value); currentPage=1; renderTable();
  });

  /* Check all */
  document.getElementById('checkAll').addEventListener('change',function(){
    document.querySelectorAll('.row-check').forEach(cb=>cb.checked=this.checked);
  });

  /* Auto-open first row */
  if(reviews[0]) setTimeout(()=>openDetail(reviews[0].id),50);

  overlay.addEventListener('click',()=>{
    if(overlay._closeCallback) overlay._closeCallback();
  });
});
</script>
@endpush