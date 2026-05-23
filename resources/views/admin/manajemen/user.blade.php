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
              <div class="kpi-value">12.458 <span class="up">↑ 12,5%</span></div>
              <div class="kpi-sub">Dibanding minggu lalu</div>
            </div>
          </div>

          <!-- Customer Baru -->
          <div class="card kpi green">
            <div class="kpi-icon"><i class="fa-solid fa-user-plus"></i></div>
            <div class="kpi-text">
              <div class="kpi-label">Customer Baru</div>
              <div class="kpi-value">356 <span class="up">↑ 8,4%</span></div>
              <div class="kpi-sub">Dibanding minggu lalu</div>
            </div>
          </div>

          <!-- Customer Aktif -->
          <div class="card kpi orange">
            <div class="kpi-icon"><i class="fa-solid fa-user-check"></i></div>
            <div class="kpi-text">
              <div class="kpi-label">Customer Aktif</div>
              <div class="kpi-value">8.942 <span class="up">↑ 11,2%</span></div>
              <div class="kpi-sub">Dibanding minggu lalu</div>
            </div>
          </div>

          <!-- Customer Diblokir -->
          <div class="card kpi red">
            <div class="kpi-icon"><i class="fa-solid fa-user-xmark"></i></div>
            <div class="kpi-text">
              <div class="kpi-label">Customer Diblokir</div>
              <div class="kpi-value">68 <span class="down">↓ 2,1%</span></div>
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
              <!-- Row 1 -->
              <tr>
                <td><input type="checkbox" /></td>
                <td>
                  <div class="customer">
                    <img src="https://i.pravatar.cc/100?img=32" alt="" />
                    <span>Andi Pratama</span>
                    <small>Baru</small>
                  </div>
                </td>
                <td>0812-3456-7890</td>
                <td>andi.pratama@email.com</td>
                <td>18</td>
                <td>6 Mei 2024<br><span>10:30 WIB</span></td>
                <td><span class="status active">Aktif</span></td>
                <td>
                  <div class="row-actions">
                    <button><i class="fa-regular fa-eye"></i></button>
                    <button><i class="fa-regular fa-pen-to-square"></i></button>
                    <button><i class="fa-solid fa-ellipsis-vertical"></i></button>
                  </div>
                </td>
              </tr>

              <!-- Row 2 -->
              <tr>
                <td><input type="checkbox" /></td>
                <td><div class="customer"><img src="https://i.pravatar.cc/100?img=13" alt="" /><span>Budi Santoso</span></div></td>
                <td>0813-2345-6789</td>
                <td>budi.santoso@email.com</td>
                <td>25</td>
                <td>5 Mei 2024<br><span>09:45 WIB</span></td>
                <td><span class="status active">Aktif</span></td>
                <td><div class="row-actions"><button><i class="fa-regular fa-eye"></i></button><button><i class="fa-regular fa-pen-to-square"></i></button><button><i class="fa-solid fa-ellipsis-vertical"></i></button></div></td>
              </tr>

              <!-- Row 3 -->
              <tr>
                <td><input type="checkbox" /></td>
                <td><div class="customer"><img src="https://i.pravatar.cc/100?img=47" alt="" /><span>Citra Lestari</span><small>Baru</small></div></td>
                <td>0821-9876-5432</td>
                <td>citra.lestari@email.com</td>
                <td>3</td>
                <td>4 Mei 2024<br><span>14:20 WIB</span></td>
                <td><span class="status active">Aktif</span></td>
                <td><div class="row-actions"><button><i class="fa-regular fa-eye"></i></button><button><i class="fa-regular fa-pen-to-square"></i></button><button><i class="fa-solid fa-ellipsis-vertical"></i></button></div></td>
              </tr>

              <!-- Row 4 -->
              <tr>
                <td><input type="checkbox" /></td>
                <td><div class="customer"><img src="https://i.pravatar.cc/100?img=15" alt="" /><span>Dewi Anggraini</span></div></td>
                <td>0822-1122-3344</td>
                <td>dewi.anggraini@email.com</td>
                <td>12</td>
                <td>2 Mei 2024<br><span>16:10 WIB</span></td>
                <td><span class="status active">Aktif</span></td>
                <td><div class="row-actions"><button><i class="fa-regular fa-eye"></i></button><button><i class="fa-regular fa-pen-to-square"></i></button><button><i class="fa-solid fa-ellipsis-vertical"></i></button></div></td>
              </tr>

              <!-- Row 5 -->
              <tr>
                <td><input type="checkbox" /></td>
                <td><div class="customer"><img src="https://i.pravatar.cc/100?img=5" alt="" /><span>Fahmi Hidayat</span></div></td>
                <td>0838-7766-5544</td>
                <td>fahmi.hidayat@email.com</td>
                <td>7</td>
                <td>1 Mei 2024<br><span>11:25 WIB</span></td>
                <td><span class="status blocked">Diblokir</span></td>
                <td><div class="row-actions"><button><i class="fa-regular fa-eye"></i></button><button><i class="fa-regular fa-pen-to-square"></i></button><button><i class="fa-solid fa-ellipsis-vertical"></i></button></div></td>
              </tr>

              <!-- Row 6 -->
              <tr>
                <td><input type="checkbox" /></td>
                <td><div class="customer"><img src="https://i.pravatar.cc/100?img=44" alt="" /><span>Gita Putri</span></div></td>
                <td>0856-9988-7766</td>
                <td>gita.putri@email.com</td>
                <td>9</td>
                <td>30 Apr 2024<br><span>13:05 WIB</span></td>
                <td><span class="status active">Aktif</span></td>
                <td><div class="row-actions"><button><i class="fa-regular fa-eye"></i></button><button><i class="fa-regular fa-pen-to-square"></i></button><button><i class="fa-solid fa-ellipsis-vertical"></i></button></div></td>
              </tr>

              <!-- Row 7 -->
              <tr>
                <td><input type="checkbox" /></td>
                <td><div class="customer"><img src="https://i.pravatar.cc/100?img=21" alt="" /><span>Hendra Wijaya</span></div></td>
                <td>0811-2233-4455</td>
                <td>hendra.wijaya@email.com</td>
                <td>15</td>
                <td>29 Apr 2024<br><span>08:50 WIB</span></td>
                <td><span class="status active">Aktif</span></td>
                <td><div class="row-actions"><button><i class="fa-regular fa-eye"></i></button><button><i class="fa-regular fa-pen-to-square"></i></button><button><i class="fa-solid fa-ellipsis-vertical"></i></button></div></td>
              </tr>

              <!-- Row 8 -->
              <tr>
                <td><input type="checkbox" /></td>
                <td><div class="customer"><img src="https://i.pravatar.cc/100?img=41" alt="" /><span>Ika Nurhaliza</span></div></td>
                <td>0823-6677-8899</td>
                <td>ika.nurhaliza@email.com</td>
                <td>6</td>
                <td>28 Apr 2024<br><span>17:40 WIB</span></td>
                <td><span class="status blocked">Diblokir</span></td>
                <td><div class="row-actions"><button><i class="fa-regular fa-eye"></i></button><button><i class="fa-regular fa-pen-to-square"></i></button><button><i class="fa-solid fa-ellipsis-vertical"></i></button></div></td>
              </tr>
            </tbody>
          </table>

          <!-- Footer Tabel (Pagination & Info Data) -->
          <div class="table-footer">
            <div class="footer-left">Menampilkan 1 - 8 dari 12.458 data</div>
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