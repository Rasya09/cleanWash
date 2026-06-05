@extends('admin.layouts.app')

@section('css')
  <link rel="stylesheet" href="{{ asset('assets/css/admin/user.css') }}">
@endsection

@section('content')
    <div class="app">
    <!-- BAGIAN KONTEN UTAMA (Kanan) -->
    <main class="main">
      <!-- Area Isi Halaman -->
      <section class="content">
        <!-- Barisan Kartu KPI (Key Performance Indicator) -->
        <div class="cards">
          <!-- Total Customer -->
          <div class="card kpi purple">
            <div class="kpi-icon"><i class="fa-solid fa-user"></i></div>
            <div class="kpi-text">
              <div class="kpi-label">Total Customer</div>
              <div class="kpi-value">{{ number_format($totalCustomer,0,',','.') }} <span class="up">↑ 12,5%</span></div>
              <div class="kpi-sub">Dibanding minggu lalu</div>
            </div>
          </div>
          <!-- Customer Baru -->
          <div class="card kpi green">
            <div class="kpi-icon"><i class="fa-solid fa-user-plus"></i></div>
            <div class="kpi-text">
              <div class="kpi-label">Customer Baru</div>
              <div class="kpi-value">{{ $customerBaru }} <span class="up">↑ 8,4%</span></div>
              <div class="kpi-sub">Dibanding minggu lalu</div>
            </div>
          </div>
          <!-- Customer Aktif -->
          <div class="card kpi orange">
            <div class="kpi-icon"><i class="fa-solid fa-user-check"></i></div>
            <div class="kpi-text">
              <div class="kpi-label">Customer Aktif</div>
              <div class="kpi-value">{{ number_format($customerAktif,0,',','.') }} <span class="up">↑ 11,2%</span></div>
              <div class="kpi-sub">Dibanding minggu lalu</div>
            </div>
          </div>
          <!-- Customer Diblokir -->
          <div class="card kpi red">
            <div class="kpi-icon"><i class="fa-solid fa-user-xmark"></i></div>
            <div class="kpi-text">
              <div class="kpi-label">Customer Diblokir</div>
              <div class="kpi-value">{{ number_format($customerBlocked,0,',','.') }} <span class="down">↓ 2,1%</span></div>
              <div class="kpi-sub">Dibanding minggu lalu</div>
            </div>
          </div>
        </div>
        <!-- Bagian Tabel Data Customer -->
        <div class="card table-card">
          <!-- Header Tabel (Judul, Tab, & Filter) -->
          <div class="table-head">
            <div>
              <h2>Daftar Customer</h2>
              <div class="tabs">
                <a class="tab active" href="#">Semua</a>
                <a class="tab" href="#">Aktif</a>
                <a class="tab" href="#">Diblokir</a>
              </div>
            </div>
            <div class="actions">
              <div class="search">
                <input type="text" placeholder="Cari nama, email atau no. hp..." />
                <i class="fa-solid fa-magnifying-glass"></i>
              </div>
              <button class="filter-btn"><i class="fa-solid fa-filter"></i> Filter</button>
              <button class="add-btn"><i class="fa-solid fa-plus"></i> Tambah Customer</button>
            </div>
          </div>
          <!-- Tabel Data -->
          <table class="data-table">
            <thead>
              <tr>
                <th class="checkbox-col"><input type="checkbox" /></th>
                <th>Customer</th>
                <th>No. HP</th>
                <th>Email</th>
                <th>Total Pesanan</th>
                <th>Bergabung</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @forelse($customers as $customer)
              <tr>
                  <td>
                      <input type="checkbox">
                  </td>
                  <td>
                      <div class="customer">
                          <img
                              src="https://ui-avatars.com/api/?name={{ urlencode($customer->name) }}"
                              alt=""
                          >
                          <span>
                              {{ $customer->name }}
                          </span>

                      </div>
                  </td>
                  <td>
                      {{ $customer->phone ?? '-' }}
                  </td>
                  <td>
                      {{ $customer->email }}
                  </td>
                  <td>
                      0
                  </td>
                  <td>
                      {{ $customer->created_at->format('d M Y') }}
                      <br>
                      <span>
                          {{ $customer->created_at->format('H:i') }} WIB
                      </span>
                  </td>
                  <td>
                      <span class="status {{ $customer->status }}">
                          {{ $customer->status == 'active'
                              ? 'Aktif'
                              : 'Diblokir' }}
                      </span>
                  </td>
                  <td>
                      <button>
                          <i class="fa-solid fa-ellipsis-vertical"></i>
                      </button>
                  </td>
              </tr>
              @empty
              <tr>
                  <td colspan="8" style="text-align:center">
                      Belum ada customer terdaftar
                  </td>
              </tr>
              @endforelse
              </tbody>
          </table>

          <!-- Footer Tabel (Pagination & Info Data) -->
          <div class="table-footer">
            <div class="footer-left">
                Menampilkan
                {{ $customers->firstItem() }}
                -
                {{ $customers->lastItem() }}
                dari
                {{ $customers->total() }}
                data
            </div>
            <div class="footer-right">
              <select>
                <option>10 / halaman</option>
              </select>
              <div class="pager">
                <button class="nav"><i class="fa-solid fa-chevron-left"></i></button>
                <button class="page active">1</button>
                <button class="page">2</button>
                <button class="page">3</button>
                <button class="page">4</button>
                <button class="page">5</button>
                <span>...</span>
                <button class="page">1246</button>
                <button class="nav"><i class="fa-solid fa-chevron-right"></i></button>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
  </div>
@endsection

@push('scripts')
    
@endpush