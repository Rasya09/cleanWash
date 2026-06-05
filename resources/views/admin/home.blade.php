@extends('admin.layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/admin/dashboard.css') }}">
@endsection

@section('content')
  <!-- ====== MAIN CONTENT ====== -->
  <main class="main-content">
    <!-- STATS GRID -->
    <div class="stats-grid">

      <!-- Total Customer -->
      <div class="stat-card">
        <div class="stat-icon blue">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
          </svg>
        </div>
        <div class="stat-info">
          <div class="stat-label">Total Customer</div>
          <div class="stat-value">
              {{ number_format($totalCustomer, 0, ',', '.') }}
          </div>
          <div class="stat-change {{ $customerGrowth >= 0 ? 'up' : 'down' }}">
              @if($customerGrowth >= 0)
                  ↑ {{ $customerGrowth }}%
              @else
                  ↓ {{ abs($customerGrowth) }}%
              @endif
          </div>
          <div class="stat-compare">
              Dibanding kemarin
          </div>
        </div>
      </div>
      <!-- Total Mitra Laundry -->
      <div class="stat-card">
        <div class="stat-icon green">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" style="color:#16A34A">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
          </svg>
        </div>
        <div class="stat-info">
          <div class="stat-label">Total Mitra Laundry</div>
          <div class="stat-value">
              {{ number_format($totalMitra, 0, ',', '.') }}
          </div>
          <div class="stat-change {{ $mitraGrowth >= 0 ? 'up' : 'down' }}">
              @if($mitraGrowth >= 0)
                  ↑ {{ $mitraGrowth }}%
              @else
                  ↓ {{ abs($mitraGrowth) }}%
              @endif
          </div>
          <div class="stat-compare">
              Dibanding kemarin
          </div>
          {{-- <div class="stat-change up">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M3.293 9.707a1 1 0 010-1.414l6-6a1 1 0 011.414 0l6 6a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L4.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
            </svg>
            8,3%
          </div>
          <div class="stat-compare">Dibanding Kemarin</div> --}}
        </div>
      </div>
      <!-- Mitra Terverifikasi -->
      <div class="stat-card">
        <div class="stat-icon teal">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" style="color:#0D9488">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
          </svg>
        </div>
        <div class="stat-info">
          <div class="stat-label">Mitra Perlu Verifikasi</div>
          <div class="stat-value">
              {{ number_format($pendingMitraCount , 0, ',', '.') }}
          </div>
          <div class="stat-change">
              {{ $pendingMitraCount }} pengajuan
          </div>

          <div class="stat-compare">
              Menunggu persetujuan admin
          </div>
          {{-- <div class="stat-change up">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M3.293 9.707a1 1 0 010-1.414l6-6a1 1 0 011.414 0l6 6a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L4.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
            </svg>
            9,1%
          </div>
          <div class="stat-compare">Dibanding minggu lalu</div> --}}
        </div>
      </div>
    </div>
    <!-- END STATS GRID -->
    <!-- MIDDLE ROW: Line Chart + Verifikasi -->
    <div class="mid-row">
      <!-- Mitra Laundry Teraktif -->
      <div class="card">
        <div class="section-header">
          <div class="section-title">Mitra Laundry Teraktif</div>
          <a class="section-link" href="#">Lihat Semua</a>
        </div>
        <div class="mitra-list">
          <div class="mitra-item">
            <span class="mitra-rank">1</span>
            <div class="mitra-logo d1">LE</div>
            <div class="mitra-info">
              <div class="mitra-name">Laundry Express</div>
              <div class="mitra-orders">156 pesanan (via mitra)</div>
            </div>
            <div class="mitra-right">
              <div class="mitra-rating">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                </svg>
                4.8
              </div>
              <div class="mitra-growth">↑ 18%</div>
            </div>
          </div>
          <div class="mitra-item">
            <span class="mitra-rank">2</span>
            <div class="mitra-logo d2">BR</div>
            <div class="mitra-info">
              <div class="mitra-name">Bersih &amp; Rapi Laundry</div>
              <div class="mitra-orders">142 pesanan (via mitra)</div>
            </div>
            <div class="mitra-right">
              <div class="mitra-rating">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                </svg>
                4.7
              </div>
              <div class="mitra-growth">↑ 12%</div>
            </div>
          </div>
          <div class="mitra-item">
            <span class="mitra-rank">3</span>
            <div class="mitra-logo d3">QW</div>
            <div class="mitra-info">
              <div class="mitra-name">Quick Wash Laundry</div>
              <div class="mitra-orders">128 pesanan (via mitra)</div>
            </div>
            <div class="mitra-right">
              <div class="mitra-rating">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                </svg>
                4.6
              </div>
              <div class="mitra-growth">↑ 10%</div>
            </div>
          </div>
          <div class="mitra-item">
            <span class="mitra-rank">4</span>
            <div class="mitra-logo d4">FL</div>
            <div class="mitra-info">
              <div class="mitra-name">Fresh Laundry</div>
              <div class="mitra-orders">112 pesanan (via mitra)</div>
            </div>
            <div class="mitra-right">
              <div class="mitra-rating">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                </svg>
                4.5
              </div>
              <div class="mitra-growth">↑ 8%</div>
            </div>
          </div>
          <div class="mitra-item">
            <span class="mitra-rank">5</span>
            <div class="mitra-logo d5">LK</div>
            <div class="mitra-info">
              <div class="mitra-name">LaundryKita</div>
              <div class="mitra-orders">98 pesanan (via mitra)</div>
            </div>
            <div class="mitra-right">
              <div class="mitra-rating">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                </svg>
                4.4
              </div>
              <div class="mitra-growth">↑ 6%</div>
            </div>
          </div>
        </div>
      </div>
      <!-- Verifikasi Mitra Card -->
      <div class="card">
        <div class="section-header">
          <div class="section-title">
            Mitra Laundry Perlu Verifikasi
            <span class="section-badge">
                {{ $pendingMitra->count() }}
            </span>
          </div>
          <a class="section-link" href="#">Lihat Semua</a>
        </div>
        <div class="verif-list">
            @forelse($pendingMitra as $mitra)
                <div class="verif-item">
                    <div class="verif-avatar dark">
                        {{ strtoupper(substr($mitra->store_name,0,2)) }}
                    </div>
                    <div class="verif-info">
                        <div class="verif-name">
                            {{ $mitra->store_name }}
                        </div>
                        <div class="verif-location">
                            {{ $mitra->city }}
                        </div>
                    </div>
                    <div class="verif-date-block">
                        <span class="verif-date-label">
                            Didaftarkan
                        </span>
                        <span class="verif-date-value">
                            {{ $mitra->created_at->format('d M Y') }}
                        </span>
                    </div>
                    <a href="{{ route('admin.verifikasi') }}"
                      class="btn-verif">
                        Verifikasi
                    </a>
                </div>
            @empty
                <div class="empty-state">
                    <i class="fa-solid fa-circle-check"></i>
                    <h4>Tidak Ada Mitra Menunggu Verifikasi</h4>
                    <p>
                        Semua pendaftaran mitra telah ditinjau.
                    </p>
                </div>
            @endforelse
        </div>
      </div>
    </div>
    <!-- END MIDDLE ROW -->
    <!-- BOTTOM ROW: Aktivitas + Mitra Teraktif + Penghasilan -->
    <div class="bottom-row">
      <!-- Aktivitas Terbaru -->
      <div class="card">
        <div class="section-header">
          <div class="section-title">Aktivitas Terbaru</div>
          <a class="section-link" href="#">Lihat Semua</a>
        </div>
        <div class="activity-list">
          <div class="activity-item">
            <div class="activity-icon green">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
              </svg>
            </div>
            <div class="activity-text">
              <p>Mitra <strong>"Laundry Bersih Sejahtera"</strong> telah diverifikasi</p>
              <span class="activity-time">2 menit yang lalu</span>
            </div>
          </div>
          <div class="activity-item">
            <div class="activity-icon orange">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
              </svg>
            </div>
            <div class="activity-text">
              <p>Pembayaran mitra <strong>"Quick Wash Laundry"</strong> sebesar Rp 2.450.000 berhasil diproses</p>
              <span class="activity-time">15 menit yang lalu</span>
            </div>
          </div>
          <div class="activity-item">
            <div class="activity-icon blue">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
              </svg>
            </div>
            <div class="activity-text">
              <p>User baru <strong>"Budi Santoso"</strong> telah mendaftar</p>
              <span class="activity-time">1 jam yang lalu</span>
            </div>
          </div>
          <div class="activity-item">
            <div class="activity-icon red">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
              </svg>
            </div>
            <div class="activity-text">
              <p>Review dilaporkan pada <strong>"LaundryKita"</strong></p>
              <span class="activity-time">2 jam yang lalu</span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- END BOTTOM ROW -->
  </main>
@endsection

@push('scripts')
@endpush