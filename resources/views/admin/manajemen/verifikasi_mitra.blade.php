@extends('admin.layouts.app')

@section('css')
  <link rel="stylesheet" href="{{ asset('assets/css/admin/verifikasi_mitra.css') }}">
  <style>
    .flash-banner {
      margin-bottom: 14px;
      padding: 12px 16px;
      border-radius: 12px;
      font-size: 13px;
      font-weight: 500;
    }
    .flash-banner.success { background: #e9f8ef; color: #15803d; border: 1px solid #bbf7d0; }
    .flash-banner.error { background: #ffe6e6; color: #b91c1c; border: 1px solid #fecaca; }
    .empty-state {
      padding: 32px 16px;
      text-align: center;
      color: #6b7280;
      font-size: 14px;
    }
    .reject-modal {
      display: none;
      position: fixed;
      inset: 0;
      background: rgba(15, 23, 42, 0.45);
      z-index: 2000;
      align-items: center;
      justify-content: center;
      padding: 16px;
    }
    .reject-modal.open { display: flex; }
    .reject-modal-box {
      background: #fff;
      border-radius: 16px;
      padding: 20px;
      width: 100%;
      max-width: 420px;
      box-shadow: 0 20px 40px rgba(0,0,0,.12);
    }
    .reject-modal-box h3 { margin: 0 0 8px; font-size: 16px; }
    .reject-modal-box p { margin: 0 0 12px; color: #6b7280; font-size: 13px; }
    .reject-modal-box textarea {
      width: 100%;
      min-height: 90px;
      border: 1px solid #e5e7eb;
      border-radius: 10px;
      padding: 10px 12px;
      font: inherit;
      resize: vertical;
      margin-bottom: 14px;
    }
    .reject-modal-actions { display: flex; gap: 10px; justify-content: flex-end; }
    .list-pagination { margin-top: 12px; }
    .list-pagination nav { display: flex; justify-content: center; gap: 6px; flex-wrap: wrap; }
    .list-pagination a, .list-pagination span {
      padding: 6px 11px;
      border-radius: 8px;
      border: 1px solid #e5e7eb;
      font-size: 13px;
      text-decoration: none;
      color: #374151;
    }
    .list-pagination span.current { background: #2563eb; color: #fff; border-color: #2563eb; }
    a.pending-item { text-decoration: none; color: inherit; display: flex; }
    select.filter-select {
      appearance: auto;
      cursor: pointer;
      min-width: 120px;
      padding-right: 28px;
    }
  </style>
@endsection

@section('content')
@php
  $fmtChange = function (?float $change): array {
    if ($change === null) {
      return ['text' => '—', 'class' => ''];
    }
    if ($change >= 0) {
      return ['text' => '↑ ' . number_format($change, 1, ',', '.') . '%', 'class' => 'up'];
    }
    return ['text' => '↓ ' . number_format(abs($change), 1, ',', '.') . '%', 'class' => 'down'];
  };
  $weekStart = now()->startOfWeek();
  $weekEnd = now()->endOfWeek();
  $queryKeep = request()->only(['q', 'city', 'page']);
@endphp

<div class="app">
  <main class="main">

    @if(session('success'))
      <div class="flash-banner success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
      <div class="flash-banner error">{{ session('error') }}</div>
    @endif

    <div class="page-head">
      <div>
        <h1>Verifikasi Mitra</h1>
        <p>Verifikasi dan kelola pendaftaran mitra laundry baru.</p>
      </div>
      <div class="date-pill">
        <i class="fa-regular fa-calendar"></i>
        <span>{{ $weekStart->translatedFormat('j M Y') }} - {{ $weekEnd->translatedFormat('j M Y') }}</span>
        <i class="fa-solid fa-chevron-down"></i>
      </div>
    </div>

    <section class="stats">
      @php $tc = $fmtChange($stats['total_change']); @endphp
      <div class="stat-card violet">
        <div class="stat-icon"><i class="fa-solid fa-users"></i></div>
        <div class="stat-content">
          <div class="stat-title">Total Pendaftaran</div>
          <div class="stat-value">{{ number_format($stats['total'], 0, ',', '.') }}</div>
          <div class="stat-foot">
            @if($tc['class'])<span class="{{ $tc['class'] }}">{{ $tc['text'] }}</span>@else<span>{{ $tc['text'] }}</span>@endif
            Dibanding minggu lalu
          </div>
        </div>
      </div>

      @php $pc = $fmtChange($stats['pending_change']); @endphp
      <div class="stat-card orange">
        <div class="stat-icon"><i class="fa-solid fa-hourglass-half"></i></div>
        <div class="stat-content">
          <div class="stat-title">Menunggu Verifikasi</div>
          <div class="stat-value">{{ number_format($stats['pending'], 0, ',', '.') }}</div>
          <div class="stat-foot">
            @if($pc['class'])<span class="{{ $pc['class'] }}">{{ $pc['text'] }}</span>@else<span>{{ $pc['text'] }}</span>@endif
            Dibanding minggu lalu
          </div>
        </div>
      </div>

      @php $ac = $fmtChange($stats['approved_change']); @endphp
      <div class="stat-card green">
        <div class="stat-icon"><i class="fa-solid fa-circle-check"></i></div>
        <div class="stat-content">
          <div class="stat-title">Disetujui</div>
          <div class="stat-value">{{ number_format($stats['approved'], 0, ',', '.') }}</div>
          <div class="stat-foot">
            @if($ac['class'])<span class="{{ $ac['class'] }}">{{ $ac['text'] }}</span>@else<span>{{ $ac['text'] }}</span>@endif
            Dibanding minggu lalu
          </div>
        </div>
      </div>

      @php $rc = $fmtChange($stats['rejected_change']); @endphp
      <div class="stat-card red">
        <div class="stat-icon"><i class="fa-solid fa-circle-xmark"></i></div>
        <div class="stat-content">
          <div class="stat-title">Ditolak</div>
          <div class="stat-value">{{ number_format($stats['rejected'], 0, ',', '.') }}</div>
          <div class="stat-foot">
            @if($rc['class'])<span class="{{ $rc['class'] }}">{{ $rc['text'] }}</span>@else<span>{{ $rc['text'] }}</span>@endif
            Dibanding minggu lalu
          </div>
        </div>
      </div>
    </section>

    <section class="content-grid {{ $selected ? 'show-detail' : '' }}" id="contentGrid">

      <div class="panel list-panel">
        <div class="panel-head list-head">
          <h2>Daftar Menunggu Verifikasi</h2>
          <form class="search-row" method="GET" action="{{ route('admin.verifikasi') }}">
            @if($selected)
              <input type="hidden" name="mitra" value="{{ $selected->id }}">
            @endif
            <div class="search-box">
              <i class="fa-solid fa-magnifying-glass"></i>
              <input type="text" name="q" value="{{ $filters['q'] }}" placeholder="Cari nama laundry..." />
            </div>
            <select name="city" class="filter-box filter-select" onchange="this.form.submit()">
              <option value="">Semua Kota</option>
              @foreach($cities as $cityName)
                <option value="{{ $cityName }}" @selected($filters['city'] === $cityName)>{{ $cityName }}</option>
              @endforeach
            </select>
            <button type="submit" class="filter-icon" title="Terapkan filter">
              <i class="fa-solid fa-filter"></i>
            </button>
          </form>
        </div>

        <div class="pending-list">
          @forelse($pendingList as $item)
            @php
              $detailUrl = route('admin.verifikasi', array_merge($queryKeep, ['mitra' => $item->id, 'page' => $pendingList->currentPage()]));
              $isActive = $selected && $selected->id === $item->id;
            @endphp
            <a href="{{ $detailUrl }}" class="pending-item {{ $isActive ? 'active' : '' }}">
              <img src="{{ $item->avatarUrl() }}" alt="" />
              <div class="pending-text">
                <div class="pending-name">{{ $item->store_name }}</div>
                <div class="pending-city">{{ $item->city ?? '—' }}</div>
                <div class="pending-date">Didaftarkan: {{ $item->created_at->translatedFormat('j M Y, H:i') }}</div>
              </div>
              <span class="pill orange">Menunggu</span>
            </a>
          @empty
            <div class="empty-state">
              Tidak ada pendaftaran yang menunggu verifikasi.
            </div>
          @endforelse
        </div>

        @if($pendingList->hasPages())
          <div class="pagination-wrap">
            <div class="pagination-info">
              Menampilkan {{ $pendingList->firstItem() }} - {{ $pendingList->lastItem() }} dari {{ $pendingList->total() }} data
            </div>
            <div class="list-pagination">
              {{ $pendingList->withQueryString()->links() }}
            </div>
          </div>
        @elseif($pendingList->total() > 0)
          <div class="pagination-wrap">
            <div class="pagination-info">
              Menampilkan {{ $pendingList->total() }} data
            </div>
          </div>
        @endif
      </div>

      <div class="panel detail-panel">
        @if($selected)
          <div class="panel-head detail-head">
            <div class="head-title-wrap">
              <button type="button" class="btn-back" onclick="hideDetail()"><i class="fa-solid fa-arrow-left"></i></button>
              <h2>Detail Pendaftaran Mitra</h2>
            </div>
            <div class="action-group">
              <button type="button" class="btn secondary" onclick="openRejectModal()">
                <i class="fa-solid fa-xmark"></i> Tolak
              </button>
              <form method="POST"
                    action="{{ route('admin.verifikasi.approve', $selected) }}"
                    style="display:inline"
                    onsubmit="return confirm('Setujui pendaftaran {{ addslashes($selected->store_name) }}?');">
                @csrf
                <input type="hidden" name="q" value="{{ $filters['q'] }}">
                <input type="hidden" name="city" value="{{ $filters['city'] }}">
                <button type="submit" class="btn primary">
                  <i class="fa-solid fa-check"></i> Setujui
                </button>
              </form>
            </div>
          </div>

          <div class="partner-card">
            <div class="partner-avatar">
              <img src="{{ $selected->avatarUrl() }}" alt="" />
            </div>
            <div class="partner-info">
              <h3>{{ $selected->store_name }}</h3>
              <div class="meta-line">
                <span><i class="fa-solid fa-location-dot"></i> {{ $selected->city ?? '—' }}</span>
                <span><i class="fa-regular fa-calendar"></i> Didaftarkan: {{ $selected->created_at->translatedFormat('j M Y, H:i') }}</span>
              </div>
              <div class="tags">
                <span class="tag yellow">{{ $selected->statusLabel() }}</span>
                @if($selected->description)
                  <span class="tag green">{{ \Illuminate\Support\Str::limit($selected->description, 40) }}</span>
                @endif
              </div>
            </div>
          </div>

          <div class="info-grid">
            <div class="info-box">
              <h4>Informasi Laundry</h4>
              <div class="info-list">
                <div class="info-row"><i class="fa-regular fa-user"></i><span>Nama Pemilik</span><b>{{ $selected->owner_name }}</b></div>
                <div class="info-row"><i class="fa-regular fa-envelope"></i><span>Email</span><b>{{ $selected->email ?? '—' }}</b></div>
                <div class="info-row"><i class="fa-solid fa-phone"></i><span>No. Telepon</span><b>{{ $selected->phone }}</b></div>
                <div class="info-row"><i class="fa-solid fa-location-dot"></i><span>Alamat</span><b>{{ $selected->fullAddress() }}</b></div>
                @if($selected->description)
                  <div class="info-row"><i class="fa-solid fa-align-left"></i><span>Deskripsi</span><b>{{ $selected->description }}</b></div>
                @endif
              </div>
            </div>

            <div class="info-box">
              <h4>Dokumen Pendukung</h4>
              <div class="doc-list">
                <div class="doc-row">
                  <div class="doc-left">
                    <div class="doc-ico blue"><i class="fa-solid fa-file-lines"></i></div>
                    <div>
                      <div class="doc-title">KTP Pemilik</div>
                      <div class="doc-sub">{{ $selected->ktp ? basename($selected->ktp) : 'Belum diunggah' }}</div>
                    </div>
                  </div>
                  <span class="doc-status">{{ $selected->ktp ? 'Valid' : '—' }}</span>
                  @if($selected->fileUrl($selected->ktp))
                    <a href="{{ $selected->fileUrl($selected->ktp) }}" target="_blank" rel="noopener" class="eye-btn"><i class="fa-regular fa-eye"></i></a>
                  @else
                    <span class="eye-btn" style="opacity:.4;pointer-events:none"><i class="fa-regular fa-eye"></i></span>
                  @endif
                </div>
                <div class="doc-row">
                  <div class="doc-left">
                    <div class="doc-ico gray"><i class="fa-solid fa-file-pdf"></i></div>
                    <div>
                      <div class="doc-title">NIB / Izin Usaha</div>
                      <div class="doc-sub">{{ $selected->nib ? basename($selected->nib) : 'Belum diunggah' }}</div>
                    </div>
                  </div>
                  <span class="doc-status">{{ $selected->nib ? 'Valid' : '—' }}</span>
                  @if($selected->fileUrl($selected->nib))
                    <a href="{{ $selected->fileUrl($selected->nib) }}" target="_blank" rel="noopener" class="eye-btn"><i class="fa-regular fa-eye"></i></a>
                  @else
                    <span class="eye-btn" style="opacity:.4;pointer-events:none"><i class="fa-regular fa-eye"></i></span>
                  @endif
                </div>
                @if($selected->npwp)
                <div class="doc-row">
                  <div class="doc-left">
                    <div class="doc-ico gray"><i class="fa-solid fa-file-pdf"></i></div>
                    <div>
                      <div class="doc-title">NPWP</div>
                      <div class="doc-sub">{{ basename($selected->npwp) }}</div>
                    </div>
                  </div>
                  <span class="doc-status">Valid</span>
                  @if($selected->fileUrl($selected->npwp))
                    <a href="{{ $selected->fileUrl($selected->npwp) }}" target="_blank" rel="noopener" class="eye-btn"><i class="fa-regular fa-eye"></i></a>
                  @endif
                </div>
                @endif
              </div>
            </div>
          </div>

          @php
            $photos = collect($selected->store_photos ?? []);
          @endphp
          @if($photos->isNotEmpty())
            <div class="photo-box">
              <h4>Foto Tempat Laundry</h4>
              <div class="photo-list">
                @foreach($photos->take(3) as $photoPath)
                  <a href="{{ $selected->fileUrl($photoPath) }}" target="_blank" rel="noopener">
                    <img src="{{ $selected->fileUrl($photoPath) }}" alt="Foto toko" />
                  </a>
                @endforeach
                @if($photos->count() > 3)
                  <div class="photo-more">
                    <i class="fa-solid fa-plus"></i>
                    <span>+{{ $photos->count() - 3 }} foto</span>
                  </div>
                @endif
              </div>
            </div>
          @endif
        @else
          <div class="empty-state" style="min-height:280px;display:flex;align-items:center;justify-content:center">
            Pilih mitra dari daftar untuk melihat detail dan melakukan verifikasi.
          </div>
        @endif
      </div>
    </section>
  </main>
</div>

@if($selected)
<div class="reject-modal" id="rejectModal">
  <div class="reject-modal-box">
    <h3>Tolak Pendaftaran</h3>
    <p>Berikan alasan penolakan untuk <strong>{{ $selected->store_name }}</b> (opsional).</p>
    <form method="POST" action="{{ route('admin.verifikasi.reject', $selected) }}" id="rejectForm">
      @csrf
      <input type="hidden" name="q" value="{{ $filters['q'] }}">
      <input type="hidden" name="city" value="{{ $filters['city'] }}">
      <textarea name="reason" placeholder="Contoh: Dokumen KTP tidak jelas..."></textarea>
      <div class="reject-modal-actions">
        <button type="button" class="btn secondary" onclick="closeRejectModal()">Batal</button>
        <button type="submit" class="btn primary" style="background:#ef4444;border-color:#ef4444">
          <i class="fa-solid fa-xmark"></i> Tolak
        </button>
      </div>
    </form>
  </div>
</div>
@endif
@endsection

@push('scripts')
@php
  $verifikasiListUrl = route('admin.verifikasi', request()->only(['q', 'city', 'page']));
@endphp
<script>
  function hideDetail() {
    document.getElementById('contentGrid').classList.remove('show-detail');
    const baseUrl = @json($verifikasiListUrl);
    if (window.innerWidth <= 1280 && window.location.search.includes('mitra=')) {
      window.location.href = baseUrl;
    }
  }

  function openRejectModal() {
    document.getElementById('rejectModal')?.classList.add('open');
    document.body.style.overflow = 'hidden';
  }

  function closeRejectModal() {
    document.getElementById('rejectModal')?.classList.remove('open');
    document.body.style.overflow = '';
  }

  document.getElementById('rejectModal')?.addEventListener('click', function (e) {
    if (e.target === this) closeRejectModal();
  });

  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape') closeRejectModal();
  });
</script>
@endpush