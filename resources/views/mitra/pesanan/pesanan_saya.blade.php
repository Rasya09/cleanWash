@extends('mitra.layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/mitra/pesanan_saya.css') }}">
@endsection

@section('content')
<div class="ps-page">

    {{-- Page Header --}}
    <div class="ps-header">
        <h1 class="ps-title">Pesanan Saya</h1>
        <p class="ps-subtitle">Kelola dan pantau semua pesanan laundry Anda di sini.</p>
    </div>

    {{-- Stats Cards --}}
    <div class="ps-stats-grid">
        <div class="ps-stat-card">
            <div class="ps-stat-icon ps-stat-icon--blue">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#3b82f6" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="3" y="3" width="18" height="18" rx="2"/><line x1="3" y1="9" x2="21" y2="9"/><line x1="9" y1="21" x2="9" y2="9"/>
                </svg>
            </div>
            <div class="ps-stat-body">
                <p class="ps-stat-label">TOTAL PESANAN</p>
                <p class="ps-stat-value" id="statTotal">1,284</p>
            </div>
        </div>
        <div class="ps-stat-card">
            <div class="ps-stat-icon ps-stat-icon--orange">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#f97316" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M9 5H7a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-2"/>
                    <rect x="9" y="3" width="6" height="4" rx="1"/><line x1="9" y1="12" x2="15" y2="12"/><line x1="9" y1="16" x2="13" y2="16"/>
                </svg>
            </div>
            <div class="ps-stat-body">
                <p class="ps-stat-label">PERLU DIPROSES</p>
                <p class="ps-stat-value" id="statProses">42</p>
            </div>
        </div>
        <div class="ps-stat-card">
            <div class="ps-stat-icon ps-stat-icon--green">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#22c55e" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10"/><polyline points="9 12 11 14 15 10"/>
                </svg>
            </div>
            <div class="ps-stat-body">
                <p class="ps-stat-label">SELESAI</p>
                <p class="ps-stat-value" id="statSelesai">1,120</p>
            </div>
        </div>
    </div>

    {{-- Table Card --}}
    <div class="ps-table-card">

        {{-- Search --}}
        <div class="ps-search-wrap">
            <svg class="ps-search-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#9ca3af" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/>
            </svg>
            <input type="text" class="ps-search-input" id="psSearch" placeholder="Cari nomor pesanan atau nama pelanggan...">
        </div>

        {{-- Tabs + Actions --}}
        <div class="ps-toolbar">
            <div class="ps-tabs">
                <button class="ps-tab ps-tab--active" data-tab="semua">Semua</button>
                <button class="ps-tab" data-tab="dibatalkan">Dibatalkan</button>
                <button class="ps-tab" data-tab="proses">Proses</button>
                <button class="ps-tab" data-tab="selesai">Selesai</button>
            </div>
            <div class="ps-actions">
                <button class="ps-btn-action" id="btnFilter">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="4" y1="6" x2="20" y2="6"/><line x1="8" y1="12" x2="16" y2="12"/><line x1="11" y1="18" x2="13" y2="18"/>
                    </svg>
                    Filter
                </button>
                <button class="ps-btn-action">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/>
                    </svg>
                    Ekspor
                </button>
            </div>
        </div>

        {{-- Table --}}
        <div class="ps-table-wrap">
            <table class="ps-table">
                <thead>
                    <tr>
                        <th>ID PESANAN</th>
                        <th>PELANGGAN</th>
                        <th>LAYANAN</th>
                        <th>TOTAL</th>
                        <th>STATUS</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody id="psTableBody">
                    {{-- Data akan diisi JS (sementara hardcoded, nanti ganti fetch API) --}}
                </tbody>
            </table>
        </div>

        {{-- Empty State --}}
        <div class="ps-empty" id="psEmpty" style="display:none;">
            <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#d1d5db" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                <path d="M9 5H7a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-2"/>
                <rect x="9" y="3" width="6" height="4" rx="1"/>
            </svg>
            <p>Tidak ada pesanan ditemukan</p>
        </div>

        {{-- Pagination --}}
        <div class="ps-pagination-wrap" id="psPagination">
            <p class="ps-pagination-info" id="psPaginationInfo">HALAMAN 1 DARI 1</p>
            <div class="ps-pagination" id="psPaginationBtns"></div>
        </div>

    </div>
</div>
@endsection

@push('scripts')
<script>
// =============================================
// DATA DUMMY — ganti dengan fetch API nanti
// =============================================
const psOrders = [
    { id: '#ORD-98210', time: 'Hari ini, 09:12',   name: 'Andi Saputra',   initial: 'AS', avatarClass: 'ps-avatar--blue',   layanan: 'Cuci Kering (3kg)',   total: 'Rp 45.000',  status: 'proses' },
    { id: '#ORD-98209', time: 'Kemarin, 16:45',    name: 'Bella Nathania', initial: 'BN', avatarClass: 'ps-avatar--green',  layanan: 'Cuci Setrika (5kg)',  total: 'Rp 75.000',  status: 'selesai' },
    { id: '#ORD-98208', time: 'Kemarin, 14:20',    name: 'Citra Dewi',     initial: 'CD', avatarClass: 'ps-avatar--blue',   layanan: 'Cuci Kiloan (7kg)',   total: 'Rp 98.000',  status: 'proses' },
    { id: '#ORD-98207', time: '11 Mei, 11:30',     name: 'Doni Kusuma',    initial: 'DK', avatarClass: 'ps-avatar--gray',   layanan: 'Dry Cleaning (2pcs)', total: 'Rp 130.000', status: 'selesai' },
    { id: '#ORD-98206', time: '11 Mei, 10:05',     name: 'Farhan Fauzi',   initial: 'FF', avatarClass: 'ps-avatar--gray',   layanan: 'Cuci Kering (10kg)',  total: 'Rp 120.000', status: 'dibatalkan' },
    { id: '#ORD-98205', time: '10 Mei, 08:45',     name: 'Gita Lestari',   initial: 'GL', avatarClass: 'ps-avatar--green',  layanan: 'Cuci Setrika (4kg)',  total: 'Rp 60.000',  status: 'selesai' },
    { id: '#ORD-98204', time: '10 Mei, 07:30',     name: 'Hendra Wijaya',  initial: 'HW', avatarClass: 'ps-avatar--blue',   layanan: 'Cuci Kiloan (6kg)',   total: 'Rp 84.000',  status: 'proses' },
    { id: '#ORD-98203', time: '9 Mei, 15:10',      name: 'Indra Permana',  initial: 'IP', avatarClass: 'ps-avatar--gray',   layanan: 'Dry Cleaning (3pcs)', total: 'Rp 195.000', status: 'dibatalkan' },
    { id: '#ORD-98202', time: '9 Mei, 13:00',      name: 'Julia Sari',     initial: 'JS', avatarClass: 'ps-avatar--green',  layanan: 'Cuci Kering (5kg)',   total: 'Rp 70.000',  status: 'selesai' },
    { id: '#ORD-98201', time: '8 Mei, 10:22',      name: 'Kevin Pratama',  initial: 'KP', avatarClass: 'ps-avatar--blue',   layanan: 'Cuci Setrika (8kg)',  total: 'Rp 112.000', status: 'selesai' },
];

// =============================================
// CONFIG
// =============================================
const ROWS_PER_PAGE = 5;
let currentTab     = 'semua';
let currentPage    = 1;
let currentSearch  = '';

// =============================================
// BADGE CONFIG
// =============================================
const badgeMap = {
    proses:     { class: 'ps-badge--proses',    label: 'DIPROSES' },
    selesai:    { class: 'ps-badge--selesai',   label: 'SELESAI' },
    dibatalkan: { class: 'ps-badge--batal',     label: 'DIBATALKAN' },
};

// =============================================
// FILTER + RENDER
// =============================================
function getFiltered() {
    return psOrders.filter(o => {
        const matchTab    = currentTab === 'semua' || o.status === currentTab;
        const matchSearch = o.id.toLowerCase().includes(currentSearch) ||
                            o.name.toLowerCase().includes(currentSearch);
        return matchTab && matchSearch;
    });
}

function renderTable() {
    const filtered = getFiltered();
    const total    = filtered.length;
    const pages    = Math.max(1, Math.ceil(total / ROWS_PER_PAGE));

    if (currentPage > pages) currentPage = 1;

    const start  = (currentPage - 1) * ROWS_PER_PAGE;
    const paged  = filtered.slice(start, start + ROWS_PER_PAGE);

    const tbody  = document.getElementById('psTableBody');
    const empty  = document.getElementById('psEmpty');
    const pgInfo = document.getElementById('psPaginationInfo');
    const pgBtns = document.getElementById('psPaginationBtns');

    // Empty state
    if (paged.length === 0) {
        tbody.innerHTML = '';
        empty.style.display = 'flex';
    } else {
        empty.style.display = 'none';
        tbody.innerHTML = paged.map(o => {
            const badge = badgeMap[o.status] || { class: '', label: o.status };
            return `
            <tr data-status="${o.status}">
                <td>
                    <p class="ps-order-id">${o.id}</p>
                    <p class="ps-order-time">${o.time}</p>
                </td>
                <td>
                    <div class="ps-customer">
                        <div class="ps-avatar ${o.avatarClass}">${o.initial}</div>
                        <span class="ps-customer-name">${o.name}</span>
                    </div>
                </td>
                <td>${o.layanan}</td>
                <td><span class="ps-total">${o.total}</span></td>
                <td><span class="ps-badge ${badge.class}">${badge.label}</span></td>
                <td><a href="/mitra/pesanan/1?status=${o.status}" class="ps-link-detail">Detail &rsaquo;</a></td>
            </tr>`;
        }).join('');
    }

    // Pagination info
    pgInfo.textContent = `HALAMAN ${currentPage} DARI ${pages}`;

    // Pagination buttons
    pgBtns.innerHTML = '';

    // Prev button
    if (currentPage > 1) {
        const prev = document.createElement('button');
        prev.className = 'ps-page-btn ps-page-btn--nav';
        prev.innerHTML = `<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"/></svg>`;
        prev.addEventListener('click', () => { currentPage--; renderTable(); });
        pgBtns.appendChild(prev);
    }

    // Page number buttons (max 3 shown)
    const startPage = Math.max(1, currentPage - 1);
    const endPage   = Math.min(pages, startPage + 2);

    for (let i = startPage; i <= endPage; i++) {
        const btn = document.createElement('button');
        btn.className = 'ps-page-btn' + (i === currentPage ? ' ps-page-btn--active' : '');
        btn.textContent = i;
        btn.addEventListener('click', (function(page) {
            return function() { currentPage = page; renderTable(); };
        })(i));
        pgBtns.appendChild(btn);
    }

    // Next button
    if (currentPage < pages) {
        const next = document.createElement('button');
        next.className = 'ps-page-btn ps-page-btn--nav';
        next.innerHTML = `<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"/></svg>`;
        next.addEventListener('click', () => { currentPage++; renderTable(); });
        pgBtns.appendChild(next);
    }
}

// =============================================
// EVENT LISTENERS
// =============================================
document.addEventListener('DOMContentLoaded', () => {

    // Tab click
    document.querySelectorAll('.ps-tab').forEach(tab => {
        tab.addEventListener('click', () => {
            document.querySelectorAll('.ps-tab').forEach(t => t.classList.remove('ps-tab--active'));
            tab.classList.add('ps-tab--active');
            currentTab  = tab.dataset.tab;
            currentPage = 1;
            renderTable();
        });
    });

    // Search
    document.getElementById('psSearch').addEventListener('input', (e) => {
        currentSearch = e.target.value.toLowerCase().trim();
        currentPage   = 1;
        renderTable();
    });

    // Initial render
    renderTable();
});
</script>
@endpush