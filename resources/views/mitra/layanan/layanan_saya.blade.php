@extends('mitra.layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/mitra/layanan_saya.css') }}">
@endsection

@section('content')
<div class="main">

  <!-- Content -->
  <main class="content">
    <div class="page-header">
      <div>
        <h1>Layanan Saya</h1>
        <p>Kelola semua layanan laundry yang tersedia di toko Anda</p>
      </div>
      <button class="btn-primary">
        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"><path d="M7 2v10M2 7h10"/></svg>
        Tambah Layanan
      </button>
    </div>

    <!-- Stats -->
    <div class="stats-grid">
      <div class="stat-card">
        <div class="stat-icon blue">
          <svg width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.6"><rect x="3" y="3" width="14" height="14" rx="3"/><path d="M7 8h6M7 11h4"/></svg>
        </div>
        <div>
          <div class="stat-label">Total Layanan</div>
          <div class="stat-value">6</div>
          <div class="stat-unit">layanan</div>
        </div>
      </div>

      <div class="stat-card">
        <div class="stat-icon green">
          <svg width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.7"><circle cx="10" cy="10" r="7"/><path d="M7 10l2 2 4-4" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </div>
        <div>
          <div class="stat-label">Layanan Aktif</div>
          <div class="stat-value">5</div>
          <div class="stat-unit">layanan</div>
        </div>
      </div>

      <div class="stat-card">
        <div class="stat-icon orange">
          <svg width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.7"><circle cx="10" cy="10" r="7"/><path d="M10 7v4M10 13v.5" stroke-linecap="round"/></svg>
        </div>
        <div>
          <div class="stat-label">Layanan Nonaktif</div>
          <div class="stat-value">1</div>
          <div class="stat-unit">layanan</div>
        </div>
      </div>

      <div class="stat-card featured">
        <div class="stat-icon purple">
          <svg width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M10 3l1.9 5.8H18l-4.9 3.6 1.9 5.8L10 14.6l-5 3.6 1.9-5.8L2 9.8h6.1L10 3z"/></svg>
        </div>
        <div>
          <div class="stat-label">Paling Dipesan</div>
          <div class="stat-value">Cuci Kiloan</div>
          <div class="stat-sub">128 pesanan</div>
        </div>
      </div>
    </div>

    <!-- Table Card -->
    <div class="table-card">
      <div class="table-header">
        <div class="table-title">Daftar Layanan</div>
        <div class="table-controls">
          <select class="select-filter">
            <option>Semua Kategori</option>
            <option>Cuci</option>
            <option>Setrika</option>
            <option>Cuci Spesial</option>
            <option>Lainnya</option>
          </select>
          <div class="search-wrap">
            <input type="text" class="search-input" placeholder="Cari layanan...">
            <svg class="search-icon" width="14" height="14" viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="1.6"><circle cx="6" cy="6" r="4"/><path d="M10 10l2.5 2.5"/></svg>
          </div>
        </div>
      </div>

      <table>
        <thead>
          <tr>
            <th>Nama Layanan</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th>Estimasi</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <!-- Row 1 -->
          <tr>
            <td>
              <div class="service-row">
                <div class="service-icon blue">📋</div>
                <div>
                  <div class="service-name">Cuci Kiloan</div>
                  <div class="service-desc">Cuci pakaian berdasarkan berat (minimal 2 kg)</div>
                </div>
              </div>
            </td>
            <td><span class="tag cuci">Cuci</span></td>
            <td>
              <div class="price">Rp 7.000 / kg</div>
              <div class="price-sub">Minimal 2 kg</div>
            </td>
            <td>
              <div class="estimation">2 - 3 hari<small>Pengerjaan</small></div>
            </td>
            <td>
              <div class="toggle-wrap">
                <div class="toggle on"></div>
                <span class="toggle-label on">Aktif</span>
              </div>
            </td>
            <td>
              <div class="action-btns">
                <div class="btn-icon">
                  <svg width="13" height="13" viewBox="0 0 13 13" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M9 2l2 2-6 6H3V8l6-6z"/></svg>
                </div>
                <div class="btn-icon danger">
                  <svg width="13" height="13" viewBox="0 0 13 13" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M2 3.5h9M5 3.5V2.5h3v1M4 3.5l.5 7h4l.5-7"/></svg>
                </div>
              </div>
            </td>
          </tr>

          <!-- Row 2 -->
          <tr>
            <td>
              <div class="service-row">
                <div class="service-icon orange">🏠</div>
                <div>
                  <div class="service-name">Cuci Satuan</div>
                  <div class="service-desc">Cuci pakaian satuan (kemeja, celana, dll)</div>
                </div>
              </div>
            </td>
            <td><span class="tag cuci">Cuci</span></td>
            <td>
              <div class="price">Mulai Rp 5.000</div>
              <div class="price-sub">Per item</div>
            </td>
            <td>
              <div class="estimation">1 - 2 hari<small>Pengerjaan</small></div>
            </td>
            <td>
              <div class="toggle-wrap">
                <div class="toggle on"></div>
                <span class="toggle-label on">Aktif</span>
              </div>
            </td>
            <td>
              <div class="action-btns">
                <div class="btn-icon">
                  <svg width="13" height="13" viewBox="0 0 13 13" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M9 2l2 2-6 6H3V8l6-6z"/></svg>
                </div>
                <div class="btn-icon danger">
                  <svg width="13" height="13" viewBox="0 0 13 13" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M2 3.5h9M5 3.5V2.5h3v1M4 3.5l.5 7h4l.5-7"/></svg>
                </div>
              </div>
            </td>
          </tr>

          <!-- Row 3 -->
          <tr>
            <td>
              <div class="service-row">
                <div class="service-icon purple">👗</div>
                <div>
                  <div class="service-name">Setrika</div>
                  <div class="service-desc">Setrika pakaian rapi dan wangi</div>
                </div>
              </div>
            </td>
            <td><span class="tag setrika">Setrika</span></td>
            <td>
              <div class="price">Rp 4.000 / kg</div>
            </td>
            <td>
              <div class="estimation">1 hari<small>Pengerjaan</small></div>
            </td>
            <td>
              <div class="toggle-wrap">
                <div class="toggle on"></div>
                <span class="toggle-label on">Aktif</span>
              </div>
            </td>
            <td>
              <div class="action-btns">
                <div class="btn-icon">
                  <svg width="13" height="13" viewBox="0 0 13 13" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M9 2l2 2-6 6H3V8l6-6z"/></svg>
                </div>
                <div class="btn-icon danger">
                  <svg width="13" height="13" viewBox="0 0 13 13" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M2 3.5h9M5 3.5V2.5h3v1M4 3.5l.5 7h4l.5-7"/></svg>
                </div>
              </div>
            </td>
          </tr>

          <!-- Row 4 -->
          <tr>
            <td>
              <div class="service-row">
                <div class="service-icon green">🛏️</div>
                <div>
                  <div class="service-name">Cuci Bed Cover</div>
                  <div class="service-desc">Cuci bed cover, selimut, dan sejenisnya</div>
                </div>
              </div>
            </td>
            <td><span class="tag cuci-spesial">Cuci Spesial</span></td>
            <td>
              <div class="price">Rp 25.000</div>
              <div class="price-sub">Per item</div>
            </td>
            <td>
              <div class="estimation">2 - 4 hari<small>Pengerjaan</small></div>
            </td>
            <td>
              <div class="toggle-wrap">
                <div class="toggle on"></div>
                <span class="toggle-label on">Aktif</span>
              </div>
            </td>
            <td>
              <div class="action-btns">
                <div class="btn-icon">
                  <svg width="13" height="13" viewBox="0 0 13 13" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M9 2l2 2-6 6H3V8l6-6z"/></svg>
                </div>
                <div class="btn-icon danger">
                  <svg width="13" height="13" viewBox="0 0 13 13" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M2 3.5h9M5 3.5V2.5h3v1M4 3.5l.5 7h4l.5-7"/></svg>
                </div>
              </div>
            </td>
          </tr>

          <!-- Row 5 -->
          <tr>
            <td>
              <div class="service-row">
                <div class="service-icon red">🪟</div>
                <div>
                  <div class="service-name">Cuci Gorden</div>
                  <div class="service-desc">Cuci gorden / tirai berbagai ukuran</div>
                </div>
              </div>
            </td>
            <td><span class="tag cuci-spesial">Cuci Spesial</span></td>
            <td>
              <div class="price">Rp 15.000 / kg</div>
            </td>
            <td>
              <div class="estimation">3 - 5 hari<small>Pengerjaan</small></div>
            </td>
            <td>
              <div class="toggle-wrap">
                <div class="toggle on"></div>
                <span class="toggle-label on">Aktif</span>
              </div>
            </td>
            <td>
              <div class="action-btns">
                <div class="btn-icon">
                  <svg width="13" height="13" viewBox="0 0 13 13" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M9 2l2 2-6 6H3V8l6-6z"/></svg>
                </div>
                <div class="btn-icon danger">
                  <svg width="13" height="13" viewBox="0 0 13 13" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M2 3.5h9M5 3.5V2.5h3v1M4 3.5l.5 7h4l.5-7"/></svg>
                </div>
              </div>
            </td>
          </tr>

          <!-- Row 6 -->
          <tr>
            <td>
              <div class="service-row">
                <div class="service-icon gray">👟</div>
                <div>
                  <div class="service-name">Cuci Sepatu</div>
                  <div class="service-desc">Cuci sepatu semua jenis</div>
                </div>
              </div>
            </td>
            <td><span class="tag lainnya">Lainnya</span></td>
            <td>
              <div class="price">Rp 20.000</div>
              <div class="price-sub">Per pasang</div>
            </td>
            <td>
              <div class="estimation">2 - 3 hari<small>Pengerjaan</small></div>
            </td>
            <td>
              <div class="toggle-wrap">
                <div class="toggle off"></div>
                <span class="toggle-label off">Nonaktif</span>
              </div>
            </td>
            <td>
              <div class="action-btns">
                <div class="btn-icon">
                  <svg width="13" height="13" viewBox="0 0 13 13" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M9 2l2 2-6 6H3V8l6-6z"/></svg>
                </div>
                <div class="btn-icon danger">
                  <svg width="13" height="13" viewBox="0 0 13 13" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M2 3.5h9M5 3.5V2.5h3v1M4 3.5l.5 7h4l.5-7"/></svg>
                </div>
              </div>
            </td>
          </tr>
        </tbody>
      </table>

      <div class="table-footer">
        <div class="table-info">Menampilkan 1 - 6 dari 6 layanan</div>
        <div class="pagination">
          <div class="page-btn nav">&#8249;</div>
          <div class="page-btn active">1</div>
          <div class="page-btn nav">&#8250;</div>
        </div>
      </div>
    </div>
  </main>
@endsection

@push('scripts')
    <script>
  // Toggle interactivity
  document.querySelectorAll('.toggle').forEach(t => {
    t.addEventListener('click', () => {
      const label = t.nextElementSibling;
      if (t.classList.contains('on')) {
        t.classList.remove('on'); t.classList.add('off');
        label.classList.remove('on'); label.classList.add('off');
        label.textContent = 'Nonaktif';
      } else {
        t.classList.remove('off'); t.classList.add('on');
        label.classList.remove('off'); label.classList.add('on');
        label.textContent = 'Aktif';
      }
    });
  });
</script>
@endpush
