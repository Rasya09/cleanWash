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
          <div class="sval" id="stat-total">0</div>
          <div class="ssub">Semua review</div>
        </div>
      </div>
      <div class="scard">
        <div class="sico2 green">🏅</div>
        <div class="sd">
          <div class="slabel">Rata-rata Rating</div>
          <div class="sval mid" id="stat-avg">0<span style="font-size:13px;font-weight:500;color:var(--g400)">/5</span></div>
          <div class="ssub">Dari semua review</div>
        </div>
      </div>
      <div class="scard">
        <div class="sico2 blue">👍</div>
        <div class="sd">
          <div class="slabel">Review Positif</div>
          <div class="sval" id="stat-pos">0</div>
          <div class="ssub" id="sub-pos">0% dari total</div>
        </div>
      </div>
      <div class="scard">
        <div class="sico2 orange">😐</div>
        <div class="sd">
          <div class="slabel">Review Netral</div>
          <div class="sval" id="stat-net">0</div>
          <div class="ssub" id="sub-net">0% dari total</div>
        </div>
      </div>
      <div class="scard">
        <div class="sico2 red">👎</div>
        <div class="sd">
          <div class="slabel">Review Negatif</div>
          <div class="sval" id="stat-neg">0</div>
          <div class="ssub" id="sub-neg">0% dari total</div>
        </div>
      </div>
    </div>

    {{-- TABS --}}
    <div class="tabs" id="tabsBar">
      <div class="tab active" data-tab="semua">Semua <span class="tc" id="tc-semua">0</span></div>
      <div class="tab" data-tab="wait">Menunggu <span class="tc" id="tc-wait">0</span></div>
      <div class="tab" data-tab="ok">Disetujui <span class="tc" id="tc-ok">0</span></div>
      <div class="tab" data-tab="spam">Spam <span class="tc" id="tc-spam">0</span></div>
    </div>

    {{-- TOOLBAR --}}
    <div class="toolbar">
      <div class="fsrch">
        <i class="fa-solid fa-magnifying-glass fi"></i>
        <input type="text" id="searchInput" placeholder="Cari pelanggan atau isi ulasan..." />
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
          <option value="wait">Menunggu</option>
          <option value="ok">Disetujui</option>
          <option value="spam">Spam</option>
        </select>
      </div>
      <div class="fdate">
        <i class="fa-regular fa-calendar" style="font-size:12px"></i>
        <input type="date" id="filterDateFrom" />
        <span class="farrow">→</span>
        <input type="date" id="filterDateTo" />
      </div>
      <button class="btn-filter" id="btnFilter">
        <i class="fa-solid fa-sliders"></i> Reset
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
      <button class="btn-reject" id="btnHapus">
        <i class="fa-solid fa-trash-can"></i> Hapus Review
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
const reviews = @json($reviewsData);

/* ─── STATE ─── */
let activeTab='semua', searchQ='', filterRating='', filterStatus='', filterMitra='';
let currentPage=1, pageSize=8;
let selectedId=null;
let selectedIdRaw=null;

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

function updateStats() {
    const total = reviews.length;
    const okCount = reviews.filter(r => r.status === 'ok').length;
    const spamCount = reviews.filter(r => r.status === 'spam').length;
    const waitCount = reviews.filter(r => r.status === 'wait').length;

    const avgRating = total > 0 ? (reviews.reduce((sum, r) => sum + r.rating, 0) / total).toFixed(1) : '0';
    
    const posCount = reviews.filter(r => r.rating >= 4).length;
    const netCount = reviews.filter(r => r.rating === 3).length;
    const negCount = reviews.filter(r => r.rating <= 2).length;

    document.getElementById('stat-total').textContent = total.toLocaleString('id-ID');
    document.getElementById('stat-avg').innerHTML = `${avgRating}<span style="font-size:13px;font-weight:500;color:var(--g400)">/5</span>`;
    
    document.getElementById('stat-pos').textContent = posCount.toLocaleString('id-ID');
    document.getElementById('stat-net').textContent = netCount.toLocaleString('id-ID');
    document.getElementById('stat-neg').textContent = negCount.toLocaleString('id-ID');

    const pct = (val) => total > 0 ? ((val / total) * 100).toFixed(1) + '%' : '0%';
    document.getElementById('sub-pos').textContent = `${pct(posCount)} dari total`;
    document.getElementById('sub-net').textContent = `${pct(netCount)} dari total`;
    document.getElementById('sub-neg').textContent = `${pct(negCount)} dari total`;

    // Tab counters
    document.getElementById('tc-semua').textContent = total;
    document.getElementById('tc-ok').textContent = okCount;
    document.getElementById('tc-spam').textContent = spamCount;
    document.getElementById('tc-wait').textContent = waitCount;
}

/* ═══════════════════════════════════════════════════════════════
   RENDER TABLE
═══════════════════════════════════════════════════════════════ */
function getFiltered(){
  return reviews.filter(r=>{
    if(activeTab==='ok'   && r.status!=='ok')   return false;
    if(activeTab==='spam' && r.status!=='spam') return false;
    if(activeTab==='wait' && r.status!=='wait') return false;
    if(filterRating && r.rating!==parseInt(filterRating)) return false;
    if(filterStatus && r.status!==filterStatus) return false;
    if(searchQ){
      const q=searchQ.toLowerCase();
      if(!r.pelanggan.nama.toLowerCase().includes(q) &&
         !r.teks.toLowerCase().includes(q)) return false;
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
          <div class="rev-ava" style="background:${r.pelanggan.inisial?'linear-gradient(135deg,'+r.warna+',#06B6D4)':'var(--g200)'}">${r.pelanggan.inisial}</div>
          <div>
            <div class="rev-name">${r.pelanggan.nama}</div>
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
          <div class="action-menu-wrap">
            <button class="abtn btn-action-toggle" title="Opsi lain" onclick="event.stopPropagation();toggleActionMenu(this)">
              <i class="fa-solid fa-ellipsis-vertical"></i>
            </button>
            <div class="action-dropdown">
              <button onclick="changeStatus('${r.id_raw}', 'ok', 'Disetujui')">
                <i class="fa-solid fa-check"></i> Setujui
              </button>
              <button onclick="changeStatus('${r.id_raw}', 'spam', 'Spam')">
                <i class="fa-solid fa-triangle-exclamation"></i> Spam
              </button>
              <div class="ad-divider"></div>
              <button class="ad-delete" onclick="changeStatus('${r.id_raw}', 'deleted', 'Dihapus')">
                <i class="fa-solid fa-trash-can"></i> Hapus
              </button>
            </div>
          </div>
        </div>
      </td>
    </tr>
  `).join('');

  /* click baris */
  tbody.querySelectorAll('tr[data-id]').forEach(tr=>{
    tr.addEventListener('click',()=>openDetail(tr.dataset.id));
  });

  /* Close dropdowns on click outside */
  document.addEventListener('click', () => {
    document.querySelectorAll('.action-dropdown.show').forEach(d => d.classList.remove('show'));
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
  const filtered = getFiltered();
  const tp = Math.ceil(filtered.length / pageSize) || 1;
  if(p < 1 || p > tp) return;
  currentPage = p;
  renderTable();
  window.scrollTo({top: 0, behavior: 'smooth'});
}

/* ═══════════════════════════════════════════════════════════════
   DETAIL PANEL
═══════════════════════════════════════════════════════════════ */
function openDetail(id){
  const r=reviews.find(x=>x.id===id);if(!r)return;
  selectedId=id;
  selectedIdRaw=r.id_raw;

  document.querySelectorAll('tr[data-id]').forEach(tr=>{
    tr.classList.toggle('sel',tr.dataset.id===id);
  });

  const panel=document.getElementById('detailPanel');
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
      <div class="dsec-title"><span class="si ${r.status==='ok'?'green':r.status==='deleted'?'red':'orange'}"><i class="fa-solid fa-circle-check"></i></span>Status Review</div>
      <div class="drows">
        <div class="drow"><span class="drow-l">Status</span><span class="drow-r">${statusBadge(r.status,r.statusLabel)}</span></div>
        ${approvedRow}
      </div>
    </div>
  `;

  panel.style.display='flex';

  /* Footer aksi: sembunyikan tombol yang tidak relevan */
  const btnSetujui=document.getElementById('btnSetujui');
  const btnSpam   =document.getElementById('btnSpam');
  const btnHapus  =document.getElementById('btnHapus');
  
  btnSetujui.disabled = (r.status === 'ok');
  btnSetujui.style.opacity = (r.status === 'ok' ? '.45' : '1');
  
  btnSpam.disabled = (r.status === 'spam');
  btnSpam.style.opacity = (r.status === 'spam' ? '.45' : '1');

  btnHapus.disabled = (r.status === 'deleted');
  btnHapus.style.opacity = (r.status === 'deleted' ? '.45' : '1');

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
  selectedIdRaw=null;
  document.querySelectorAll('tr[data-id]').forEach(tr=>tr.classList.remove('sel'));
}

function toggleActionMenu(btn) {
    const dropdown = btn.nextElementSibling;
    const isOpen = dropdown.classList.contains('show');
    document.querySelectorAll('.action-dropdown.show').forEach(d => d.classList.remove('show'));
    if (!isOpen) dropdown.classList.add('show');
}

function changeStatus(id, status, label){
  const r=reviews.find(x=>x.id_raw == id);if(!r)return;
  
  const confirmMsg = status === 'deleted' ? 'Apakah Anda yakin ingin menghapus review ini secara permanen dari database?' : `Ubah status review menjadi ${label}?`;
  if (!confirm(confirmMsg)) return;

  fetch(`/admin/review-rating/${id}/status`, {
      method: 'POST',
      headers: {
          'Content-Type': 'application/json',
          'Accept': 'application/json', 
          'X-CSRF-TOKEN': '{{ csrf_token() }}'
      },
      body: JSON.stringify({ status: status })
  })
  .then(async response => {
      const data = await response.json();
      if (response.ok && data.success) {
          if (status === 'deleted') {
              const idx = reviews.findIndex(x => x.id_raw == id);
              if (idx !== -1) reviews.splice(idx, 1);
              closeDetail();
          } else {
              r.status=status; r.statusLabel=label;
              r.approvedBy='Super Admin';
              const now=new Date();
              r.approvedAt=now.toLocaleDateString('id-ID',{day:'numeric',month:'long',year:'numeric'})
                +', '+now.toLocaleTimeString('id-ID',{hour:'2-digit',minute:'2-digit'});
          }
          
          updateStats();
          renderTable();
          if (status !== 'deleted') openDetail(r.id);
          alert(data.message);
      } else {
          alert('Gagal memperbarui status: ' + (data.message || 'Terjadi kesalahan pada server.'));
      }
  })
  .catch(error => {
      console.error('Error:', error);
      alert('Terjadi kesalahan koneksi atau sistem.');
  });
}

/* ═══════════════════════════════════════════════════════════════
   INIT
═══════════════════════════════════════════════════════════════ */
document.addEventListener('DOMContentLoaded',()=>{

  updateStats();
  renderTable();

  /* Detail close */
  document.getElementById('detailClose').addEventListener('click', closeDetail);

  /* Footer aksi */
  document.getElementById('btnSetujui').addEventListener('click',()=>{
    if(!selectedIdRaw)return;
    changeStatus(selectedIdRaw,'ok','Disetujui');
  });
  document.getElementById('btnHapus').addEventListener('click',()=>{
    if(!selectedIdRaw)return;
    changeStatus(selectedIdRaw,'deleted','Dihapus');
  });
  document.getElementById('btnSpam').addEventListener('click',()=>{
    if(!selectedIdRaw)return;
    changeStatus(selectedIdRaw,'spam','Spam');
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

  /* Reset filter */
  document.getElementById('btnFilter').addEventListener('click',()=>{
    filterRating=filterStatus=searchQ='';
    ['filterRating','filterStatus'].forEach(id=>{document.getElementById(id).value='';});
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