@extends('mitra.layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/mitra/diskon.css') }}">
    
@endsection

@section('content')
   <!-- ═══════════════════ MAIN ═══════════════════ -->
<div class="main-wrap">

  <!-- CONTENT -->
  <main class="content">

    <!-- Page Header -->
    <div class="page-header">
      <div>
        <h1>Diskon</h1>
        <p>Buat dan kelola diskon untuk menarik lebih banyak pelanggan</p>
      </div>
      <button class="btn-primary">＋ Buat Diskon Baru</button>
    </div>

    <!-- Stat Cards -->
    <div class="stat-grid">
      <div class="stat-card">
        <div class="stat-icon blue">🏷️</div>
        <div class="stat-info">
          <small>Total Diskon</small>
          <strong>8</strong>
          <span>Semua waktu</span>
        </div>
      </div>
      <div class="stat-card">
        <div class="stat-icon green">✅</div>
        <div class="stat-info">
          <small>Diskon Aktif</small>
          <strong>4</strong>
          <span>Sedang berjalan</span>
        </div>
      </div>
      <div class="stat-card">
        <div class="stat-icon orange">⏰</div>
        <div class="stat-info">
          <small>Akan Berakhir</small>
          <strong>2</strong>
          <span>Dalam 3 hari</span>
        </div>
      </div>
      <div class="stat-card">
        <div class="stat-icon purple">⏸️</div>
        <div class="stat-info">
          <small>Tidak Aktif</small>
          <strong>2</strong>
          <span>Nonaktif / Kadaluarsa</span>
        </div>
      </div>
    </div>

    <!-- Toolbar -->
    <div class="toolbar">
      <div class="search-box">
        <span class="search-icon">🔍</span>
        <input type="text" placeholder="Cari nama diskon atau kode...">
      </div>
      <select class="select-box">
        <option>Semua Status</option>
        <option>Aktif</option>
        <option>Tidak Aktif</option>
        <option>Berakhir</option>
        <option>Kadaluarsa</option>
      </select>
      <select class="select-box">
        <option>Semua Jenis Diskon</option>
        <option>Persentase</option>
        <option>Nominal</option>
      </select>
      <button class="filter-btn">⚙️ Filter</button>
    </div>

    <!-- Table -->
    <div class="table-wrap">
      <table>
        <thead>
          <tr>
            <th>Nama Diskon</th>
            <th>Kode Diskon</th>
            <th>Jenis</th>
            <th>Nilai Diskon</th>
            <th>Periode</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>

          <!-- Row 1 -->
          <tr>
            <td>
              <div class="discount-name-cell">
                <div class="discount-icon blue">%</div>
                <div class="discount-info">
                  <strong>Diskon Cuci Kiloan</strong>
                  <small>Diskon spesial untuk layanan cuci kiloan</small>
                </div>
              </div>
            </td>
            <td><span class="code-pill">CUCIKILOAN10 <span class="copy-icon" title="Salin">📋</span></span></td>
            <td><span class="type-badge">Persentase</span></td>
            <td class="discount-val">10%<small>Maks. Rp20.000</small></td>
            <td class="period-cell">01 Mei 2024<small>– 31 Mei 2024</small></td>
            <td><span class="status aktif">Aktif</span></td>
            <td>
              <div class="actions">
                <button class="action-btn edit" title="Edit">✏️</button>
                <button class="action-btn del" title="Hapus">🗑️</button>
              </div>
            </td>
          </tr>

          <!-- Row 2 -->
          <tr>
            <td>
              <div class="discount-name-cell">
                <div class="discount-icon green">🎁</div>
                <div class="discount-info">
                  <strong>Diskon Pelanggan Baru</strong>
                  <small>Untuk pelanggan baru pertama kali</small>
                </div>
              </div>
            </td>
            <td><span class="code-pill">WELCOME15 <span class="copy-icon">📋</span></span></td>
            <td><span class="type-badge">Persentase</span></td>
            <td class="discount-val">15%<small>Maks. Rp25.000</small></td>
            <td class="period-cell">20 Apr 2024<small>– 20 Mei 2024</small></td>
            <td><span class="status aktif">Aktif</span></td>
            <td>
              <div class="actions">
                <button class="action-btn edit">✏️</button>
                <button class="action-btn del">🗑️</button>
              </div>
            </td>
          </tr>

          <!-- Row 3 -->
          <tr>
            <td>
              <div class="discount-name-cell">
                <div class="discount-icon purple">🛒</div>
                <div class="discount-info">
                  <strong>Hemat Akhir Pekan</strong>
                  <small>Diskon setiap akhir pekan</small>
                </div>
              </div>
            </td>
            <td><span class="code-pill">WEEKEND20 <span class="copy-icon">📋</span></span></td>
            <td><span class="type-badge">Persentase</span></td>
            <td class="discount-val">20%<small>Maks. Rp30.000</small></td>
            <td class="period-cell">Setiap Sabtu – Minggu<small>(Berlaku terus)</small></td>
            <td><span class="status aktif">Aktif</span></td>
            <td>
              <div class="actions">
                <button class="action-btn edit">✏️</button>
                <button class="action-btn del">🗑️</button>
              </div>
            </td>
          </tr>

          <!-- Row 4 -->
          <tr>
            <td>
              <div class="discount-name-cell">
                <div class="discount-icon orange">⏰</div>
                <div class="discount-info">
                  <strong>Diskon Libur Lebaran</strong>
                  <small>Promo spesial libur lebaran</small>
                </div>
              </div>
            </td>
            <td><span class="code-pill">LEBARAN24 <span class="copy-icon">📋</span></span></td>
            <td><span class="type-badge">Persentase</span></td>
            <td class="discount-val">25%<small>Maks. Rp50.000</small></td>
            <td class="period-cell">01 Apr 2024<small>– 15 Apr 2024</small></td>
            <td><span class="status berakhir">Berakhir</span></td>
            <td>
              <div class="actions">
                <button class="action-btn edit">✏️</button>
                <button class="action-btn del">🗑️</button>
              </div>
            </td>
          </tr>

          <!-- Row 5 -->
          <tr>
            <td>
              <div class="discount-name-cell">
                <div class="discount-icon red">🏷️</div>
                <div class="discount-info">
                  <strong>Gratis Ongkir Pickup</strong>
                  <small>Gratis biaya pickup minimal Rp50.000</small>
                </div>
              </div>
            </td>
            <td><span class="code-pill">GRATISPICKUP <span class="copy-icon">📋</span></span></td>
            <td><span class="type-badge">Nominal</span></td>
            <td class="discount-val">Rp 5.000<small>Min. belanja Rp50.000</small></td>
            <td class="period-cell">10 Apr 2024<small>– 10 Mei 2024</small></td>
            <td><span class="status tidak">Tidak Aktif</span></td>
            <td>
              <div class="actions">
                <button class="action-btn edit">✏️</button>
                <button class="action-btn del">🗑️</button>
              </div>
            </td>
          </tr>

          <!-- Row 6 -->
          <tr>
            <td>
              <div class="discount-name-cell">
                <div class="discount-icon gray">%</div>
                <div class="discount-info">
                  <strong>Diskon Setrika</strong>
                  <small>Diskon layanan setrika</small>
                </div>
              </div>
            </td>
            <td><span class="code-pill">SETRIKA10 <span class="copy-icon">📋</span></span></td>
            <td><span class="type-badge">Persentase</span></td>
            <td class="discount-val">10%<small>Maks. Rp10.000</small></td>
            <td class="period-cell">01 Mar 2024<small>– 31 Mar 2024</small></td>
            <td><span class="status kadaluarsa">Kadaluarsa</span></td>
            <td>
              <div class="actions">
                <button class="action-btn edit">✏️</button>
                <button class="action-btn del">🗑️</button>
              </div>
            </td>
          </tr>

        </tbody>
      </table>

      <!-- Pagination Footer -->
      <div class="table-footer">
        <span>Menampilkan 1 – 6 dari 8 diskon</span>
        <div class="pagination">
          <button class="page-btn nav" disabled>‹</button>
          <button class="page-btn active">1</button>
          <button class="page-btn">2</button>
          <button class="page-btn nav">›</button>
        </div>
      </div>
    </div>

  </main>
</div>
@endsection