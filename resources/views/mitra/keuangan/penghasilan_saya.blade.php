@extends('mitra.layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/mitra/penghasilan_saya.css') }}">
@endsection

@section('content')
    <!-- ═══════════════════ MAIN ═══════════════════ -->
<div class="main-wrap">

  <main class="content">

    <!-- PAGE HEADER -->
    <div class="page-header">
      <div>
        <h1>Penghasilan Saya</h1>
        <p>Pantau penghasilan dan transaksi bisnis laundry Anda</p>
      </div>
      <div class="header-actions">
        <button class="date-picker-btn">📅 1 – 31 Mei 2024 ▾</button>
        <button class="btn-download">⬇ Unduh Laporan</button>
      </div>
    </div>

    <!-- STAT CARDS -->
    <div class="stat-grid">
      <div class="stat-card">
        <div class="stat-icon-wrap si-blue">💰</div>
        <div class="stat-body">
          <div class="stat-label">Total Penghasilan</div>
          <div class="stat-value">Rp8.450.000</div>
          <div class="stat-trend">↑ 18.5% dari Apr 2024</div>
        </div>
      </div>
      <div class="stat-card">
        <div class="stat-icon-wrap si-green">💵</div>
        <div class="stat-body">
          <div class="stat-label">Penghasilan Bersih</div>
          <div class="stat-value">Rp7.850.000</div>
          <div class="stat-sub">Setelah potongan &amp; biaya</div>
        </div>
      </div>
      <div class="stat-card">
        <div class="stat-icon-wrap si-purple">📋</div>
        <div class="stat-body">
          <div class="stat-label">Total Pesanan Selesai</div>
          <div class="stat-value">186</div>
          <div class="stat-trend">↑ 15.2% dari Apr 2024</div>
        </div>
      </div>
      <div class="stat-card">
        <div class="stat-icon-wrap si-orange">📈</div>
        <div class="stat-body">
          <div class="stat-label">Rata-rata per Pesanan</div>
          <div class="stat-value">Rp45.430</div>
          <div class="stat-trend">↑ 2.1% dari Apr 2024</div>
        </div>
      </div>
    </div>

    <!-- MAIN GRID: Chart + Rincian -->
    <div class="main-grid">

      <!-- Grafik -->
      <div class="panel">
        <div class="panel-header">
          <h3>Grafik Penghasilan</h3>
          <select class="period-select">
            <option>Harian</option>
            <option>Mingguan</option>
            <option>Bulanan</option>
          </select>
        </div>
        <div class="chart-legend">
          <div class="legend-item"><div class="legend-dot ld-blue"></div> Penghasilan</div>
          <div class="legend-item"><div class="legend-dot ld-green"></div> Penghasilan Bersih</div>
        </div>
        <div class="chart-wrap">
          <canvas id="revenueChart"></canvas>
          <div class="chart-tooltip" id="chartTooltip">
            <div class="tt-date">16 Mei 2024</div>
            <div class="tt-row"><div class="tt-dot" style="background:#3B82F6"></div><span class="tt-label">Penghasilan</span><span class="tt-val">Rp1.250.000</span></div>
            <div class="tt-row"><div class="tt-dot" style="background:#22C55E"></div><span class="tt-label">Bersih</span><span class="tt-val">Rp1.150.000</span></div>
          </div>
        </div>
      </div>

      <!-- Rincian -->
      <div class="panel">
        <div class="panel-header">
          <h3>Rincian Penghasilan</h3>
        </div>
        <div class="rincian-list">
          <div class="rincian-row">
            <span class="rincian-label">Total Penghasilan</span>
            <span class="rincian-val">Rp8.450.000</span>
          </div>
          <div class="rincian-row">
            <span class="rincian-label">Potongan Aplikasi (3%) <span class="rincian-info" title="Biaya platform">ⓘ</span></span>
            <span class="rincian-val red">– Rp253.500</span>
          </div>
          <div class="rincian-row">
            <span class="rincian-label">Biaya Layanan Pembayaran <span class="rincian-info" title="Biaya payment gateway">ⓘ</span></span>
            <span class="rincian-val red">– Rp146.500</span>
          </div>
          <div class="rincian-row">
            <span class="rincian-label">Diskon yang Diberikan <span class="rincian-info" title="Total diskon ke pelanggan">ⓘ</span></span>
            <span class="rincian-val red">– Rp200.000</span>
          </div>
          <div class="rincian-row">
            <span class="rincian-label" style="font-weight:700;">Penghasilan Bersih</span>
            <span class="rincian-val green">Rp7.850.000</span>
          </div>
        </div>
      </div>
    </div>

    <!-- BOTTOM GRID: Transaksi + Donut + Ringkasan -->
    <div class="bottom-grid">

      <!-- Transaksi Terbaru -->
      <div class="panel">
        <div class="trans-header">
          <h3>Transaksi Terbaru</h3>
          <button class="btn-lihat">Lihat Semua Transaksi</button>
        </div>
        <table>
          <thead>
            <tr>
              <th>Tanggal</th>
              <th>No. Pesanan</th>
              <th>Pelanggan</th>
              <th>Layanan</th>
              <th>Status</th>
              <th style="text-align:right;">Penghasilan</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>31 Mei 2024, 14:32</td>
              <td style="font-weight:600;color:var(--gray-800);">#INV-2405-0132</td>
              <td>Andi Setiawan</td>
              <td>Cuci Kiloan (4 kg)<br>Setrika</td>
              <td><span class="status-badge sb-selesai">Selesai</span></td>
              <td style="text-align:right;font-weight:600;">Rp65.000</td>
            </tr>
            <tr>
              <td>31 Mei 2024, 10:15</td>
              <td style="font-weight:600;color:var(--gray-800);">#INV-2405-0131</td>
              <td>Dewi Nur A.</td>
              <td>Cuci Bed Cover</td>
              <td><span class="status-badge sb-selesai">Selesai</span></td>
              <td style="text-align:right;font-weight:600;">Rp35.000</td>
            </tr>
            <tr>
              <td>30 Mei 2024, 18:20</td>
              <td style="font-weight:600;color:var(--gray-800);">#INV-2405-0129</td>
              <td>Rizky Maulana</td>
              <td>Cuci Kiloan (7 kg)<br>Setrika</td>
              <td><span class="status-badge sb-selesai">Selesai</span></td>
              <td style="text-align:right;font-weight:600;">Rp95.000</td>
            </tr>
            <tr>
              <td>30 Mei 2024, 16:05</td>
              <td style="font-weight:600;color:var(--gray-800);">#INV-2405-0128</td>
              <td>Siti Fatimah</td>
              <td>Cuci Satuan (Kemeja)</td>
              <td><span class="status-badge sb-selesai">Selesai</span></td>
              <td style="text-align:right;font-weight:600;">Rp15.000</td>
            </tr>
            <tr>
              <td>30 Mei 2024, 09:50</td>
              <td style="font-weight:600;color:var(--gray-800);">#INV-2405-0127</td>
              <td>Budi Santoso</td>
              <td>Cuci Kiloan (3 kg)</td>
              <td><span class="status-badge sb-selesai">Selesai</span></td>
              <td style="text-align:right;font-weight:600;">Rp48.000</td>
            </tr>
          </tbody>
        </table>
        <div class="trans-footer">
          <span class="lihat-semua-link">Lihat semua transaksi ›</span>
        </div>
      </div>

      <!-- Right Column -->
      <div class="right-col">

        <!-- Donut Chart -->
        <div class="panel">
          <div class="panel-header">
            <h3>Penghasilan per Metode Pembayaran</h3>
          </div>
          <div class="donut-wrap">
            <div class="donut-svg-wrap">
              <svg width="110" height="110" viewBox="0 0 110 110">
                <!-- BG circle -->
                <circle cx="55" cy="55" r="40" fill="none" stroke="#F3F4F6" stroke-width="18"/>
                <!-- Transfer Bank 62% -->
                <circle cx="55" cy="55" r="40" fill="none" stroke="#3B82F6" stroke-width="18"
                  stroke-dasharray="155.5 251" stroke-dashoffset="0"
                  transform="rotate(-90 55 55)"/>
                <!-- E-Wallet 25% -->
                <circle cx="55" cy="55" r="40" fill="none" stroke="#22C55E" stroke-width="18"
                  stroke-dasharray="62.75 251" stroke-dashoffset="-155.5"
                  transform="rotate(-90 55 55)"/>
                <!-- Tunai 13% -->
                <circle cx="55" cy="55" r="40" fill="none" stroke="#F59E0B" stroke-width="18"
                  stroke-dasharray="32.75 251" stroke-dashoffset="-218.25"
                  transform="rotate(-90 55 55)"/>
              </svg>
            </div>
            <div class="donut-legend">
              <div class="dl-item">
                <div class="dl-dot" style="background:#3B82F6;"></div>
                <div>
                  <div class="dl-label">Transfer Bank</div>
                  <div class="dl-val">Rp5.250.000 (62%)</div>
                </div>
              </div>
              <div class="dl-item">
                <div class="dl-dot" style="background:#22C55E;"></div>
                <div>
                  <div class="dl-label">E-Wallet</div>
                  <div class="dl-val">Rp2.150.000 (25%)</div>
                </div>
              </div>
              <div class="dl-item">
                <div class="dl-dot" style="background:#F59E0B;"></div>
                <div>
                  <div class="dl-label">Tunai</div>
                  <div class="dl-val">Rp1.050.000 (13%)</div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Ringkasan Bulanan -->
        <div class="panel">
          <div class="panel-header">
            <h3>Ringkasan Bulanan</h3>
          </div>
          <div class="ringkasan-list">
            <div class="rb-row">
              <span class="rb-month">Apr 2024</span>
              <span class="rb-val">Rp7.130.000</span>
            </div>
            <div class="rb-row">
              <span class="rb-month">Mar 2024</span>
              <span class="rb-val">Rp6.245.000</span>
            </div>
            <div class="rb-row">
              <span class="rb-month">Feb 2024</span>
              <span class="rb-val">Rp5.780.000</span>
            </div>
          </div>
          <div class="panel-footer">
            <span class="panel-footer-link">Lihat Semua ▾</span>
          </div>
        </div>

      </div>
    </div>

  </main>
</div>
@endsection

@push('scripts')
    <script>
// ── Simple Canvas Line Chart ──────────────────────────────
(function() {
  const canvas = document.getElementById('revenueChart');
  const tooltip = document.getElementById('chartTooltip');
  const wrap = canvas.parentElement;

  function resize() {
    canvas.width  = wrap.clientWidth;
    canvas.height = wrap.clientHeight;
    draw();
  }

  const labels = ['1 Mei','6 Mei','11 Mei','16 Mei','21 Mei','26 Mei','31 Mei'];
  const revenue = [520000, 780000, 920000, 1250000, 880000, 1050000, 1100000];
  const bersih  = [470000, 700000, 840000, 1150000, 800000, 960000, 1010000];

  function fmt(v) {
    if (v >= 1000000) return 'Rp' + (v/1000000).toFixed(1) + 'jt';
    return 'Rp' + (v/1000).toFixed(0) + 'rb';
  }
  function fmtFull(v) {
    return 'Rp' + v.toLocaleString('id-ID');
  }

  function draw() {
    const ctx = canvas.getContext('2d');
    const W = canvas.width, H = canvas.height;
    const pad = { top: 16, right: 16, bottom: 36, left: 68 };
    const gW = W - pad.left - pad.right;
    const gH = H - pad.top - pad.bottom;

    ctx.clearRect(0, 0, W, H);

    const allVals = [...revenue, ...bersih];
    const maxV = Math.max(...allVals) * 1.15;
    const minV = 0;

    function xPos(i) { return pad.left + (i / (labels.length - 1)) * gW; }
    function yPos(v) { return pad.top + gH - ((v - minV) / (maxV - minV)) * gH; }

    // Grid lines + Y labels
    const yTicks = [0, 500000, 1000000, 1500000];
    ctx.font = '11px Plus Jakarta Sans, sans-serif';
    ctx.fillStyle = '#9CA3AF';
    ctx.textAlign = 'right';
    yTicks.forEach(v => {
      const y = yPos(v);
      ctx.beginPath();
      ctx.strokeStyle = '#F3F4F6';
      ctx.lineWidth = 1;
      ctx.moveTo(pad.left, y);
      ctx.lineTo(W - pad.right, y);
      ctx.stroke();
      ctx.fillText(v === 0 ? 'Rp0' : 'Rp' + (v/1000).toFixed(0) + '.000', pad.left - 6, y + 4);
    });

    // X labels
    ctx.textAlign = 'center';
    ctx.fillStyle = '#9CA3AF';
    labels.forEach((l, i) => {
      ctx.fillText(l, xPos(i), H - 8);
    });

    // Draw line helper
    function drawLine(data, color, fill) {
      ctx.beginPath();
      data.forEach((v, i) => {
        const x = xPos(i), y = yPos(v);
        i === 0 ? ctx.moveTo(x, y) : ctx.lineTo(x, y);
      });
      if (fill) {
        ctx.lineTo(xPos(data.length - 1), yPos(0));
        ctx.lineTo(xPos(0), yPos(0));
        ctx.closePath();
        const grad = ctx.createLinearGradient(0, pad.top, 0, H - pad.bottom);
        grad.addColorStop(0, fill + '33');
        grad.addColorStop(1, fill + '00');
        ctx.fillStyle = grad;
        ctx.fill();
      } else {
        ctx.strokeStyle = color;
        ctx.lineWidth = 2.5;
        ctx.lineJoin = 'round';
        ctx.lineCap = 'round';
        ctx.stroke();
      }
    }

    // Filled areas
    ctx.save();
    drawLine(revenue, '#3B82F6', '#3B82F6');
    drawLine(bersih,  '#22C55E', '#22C55E');
    ctx.restore();

    // Lines
    ctx.save();
    drawLine(revenue, '#3B82F6');
    drawLine(bersih,  '#22C55E');
    ctx.restore();

    // Dots
    [{ data: revenue, color: '#3B82F6' }, { data: bersih, color: '#22C55E' }].forEach(({ data, color }) => {
      data.forEach((v, i) => {
        const x = xPos(i), y = yPos(v);
        ctx.beginPath();
        ctx.arc(x, y, 4, 0, Math.PI * 2);
        ctx.fillStyle = 'white';
        ctx.fill();
        ctx.strokeStyle = color;
        ctx.lineWidth = 2;
        ctx.stroke();
      });
    });

    // Special dot on 16 Mei (index 3)
    const sx = xPos(3), sy = yPos(revenue[3]);
    ctx.beginPath();
    ctx.arc(sx, sy, 6, 0, Math.PI * 2);
    ctx.fillStyle = '#3B82F6';
    ctx.fill();
    ctx.strokeStyle = 'white';
    ctx.lineWidth = 2;
    ctx.stroke();

    const sx2 = xPos(3), sy2 = yPos(bersih[3]);
    ctx.beginPath();
    ctx.arc(sx2, sy2, 6, 0, Math.PI * 2);
    ctx.fillStyle = '#22C55E';
    ctx.fill();
    ctx.strokeStyle = 'white';
    ctx.lineWidth = 2;
    ctx.stroke();
  }

  // Hover tooltip
  canvas.addEventListener('mousemove', e => {
    const rect = canvas.getBoundingClientRect();
    const mx = e.clientX - rect.left;
    const W = canvas.width;
    const pad = { left: 68, right: 16 };
    const gW = W - pad.left - pad.right;
    const idx = Math.round((mx - pad.left) / gW * (labels.length - 1));
    if (idx < 0 || idx >= labels.length) { tooltip.style.display = 'none'; return; }

    tooltip.style.display = 'block';
    tooltip.querySelector('.tt-date').textContent = labels[idx];
    tooltip.querySelectorAll('.tt-val')[0].textContent = fmtFull(revenue[idx]);
    tooltip.querySelectorAll('.tt-val')[1].textContent = fmtFull(bersih[idx]);

    let tx = e.clientX - wrap.getBoundingClientRect().left + 10;
    let ty = e.clientY - wrap.getBoundingClientRect().top - 50;
    if (tx + 180 > wrap.clientWidth) tx -= 200;
    tooltip.style.left = tx + 'px';
    tooltip.style.top  = ty + 'px';
  });
  canvas.addEventListener('mouseleave', () => { tooltip.style.display = 'none'; });

  window.addEventListener('resize', resize);
  resize();
})();
</script>
@endpush
