@extends('mitra.layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/mitra/perfoma_toko.css') }}">
@endsection

@section('content')
    <div class="page">

  <!-- Header -->
  <div class="header">
    <div class="header-title">
      <h1>Performa Toko</h1>
      <p>Pantau perkembangan toko dan kinerja bisnis Anda</p>
    </div>
    <div class="header-actions">
      <button class="btn">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
        1 – 31 Mei 2024
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width:12px;height:12px"><polyline points="6 9 12 15 18 9"/></svg>
      </button>
      <button class="btn btn-primary">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
        Unduh Laporan
      </button>
    </div>
  </div>

  <!-- KPI Cards -->
  <div class="kpi-grid">

    <div class="kpi-card">
      <div class="kpi-label">
        <div class="icon icon-blue">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#3b82f6" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
        </div>
        Total Dilihat
      </div>
      <div class="kpi-value">2.450</div>
      <div class="kpi-change up">
        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="18 15 12 9 6 15"/></svg>
        18,6% <span>dari Apr 2024</span>
      </div>
    </div>

    <div class="kpi-card">
      <div class="kpi-label">
        <div class="icon icon-purple">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#8b5cf6" stroke-width="2"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>
        </div>
        Total Pesanan
      </div>
      <div class="kpi-value">186</div>
      <div class="kpi-change up">
        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="18 15 12 9 6 15"/></svg>
        16,2% <span>dari Apr 2024</span>
      </div>
    </div>

    <div class="kpi-card">
      <div class="kpi-label">
        <div class="icon icon-green">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#10b981" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
        </div>
        Pesanan Selesai
      </div>
      <div class="kpi-value">176</div>
      <div class="kpi-change up">
        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="18 15 12 9 6 15"/></svg>
        16,8% <span>dari Apr 2024</span>
      </div>
    </div>

    <div class="kpi-card">
      <div class="kpi-label">
        <div class="icon icon-orange">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#f97316" stroke-width="2"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/><polyline points="17 6 23 6 23 12"/></svg>
        </div>
        Tingkat Konversi
      </div>
      <div class="kpi-value">7,59%</div>
      <div class="kpi-change up">
        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="18 15 12 9 6 15"/></svg>
        1,2% <span>dari Apr 2024</span>
      </div>
    </div>

    <div class="kpi-card">
      <div class="kpi-label">
        <div class="icon icon-cyan">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#06b6d4" stroke-width="2"><path d="M16 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="8.5" cy="7" r="4"/><line x1="20" y1="8" x2="20" y2="14"/><line x1="23" y1="11" x2="17" y2="11"/></svg>
        </div>
        Pelanggan Baru
      </div>
      <div class="kpi-value">42</div>
      <div class="kpi-change up">
        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="18 15 12 9 6 15"/></svg>
        10,5% <span>dari Apr 2024</span>
      </div>
    </div>

    <div class="kpi-card">
      <div class="kpi-label">
        <div class="icon icon-red">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#ef4444" stroke-width="2"><polyline points="17 1 21 5 17 9"/><path d="M3 11V9a4 4 0 014-4h14"/><polyline points="7 23 3 19 7 15"/><path d="M21 13v2a4 4 0 01-4 4H3"/></svg>
        </div>
        Repeat Order
      </div>
      <div class="kpi-value">38,7%</div>
      <div class="kpi-change up">
        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="18 15 12 9 6 15"/></svg>
        3,4% <span>dari Apr 2024</span>
      </div>
    </div>

  </div><!-- /kpi-grid -->

  <!-- Main Grid: Chart + Donut -->
  <div class="main-grid">

    <!-- Grafik Performa -->
    <div class="card">
      <div class="chart-header">
        <span class="card-title" style="margin-bottom:0">Grafik Performa</span>
        <button class="select-btn">
          Harian
          <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
        </button>
      </div>

      <div class="legend">
        <div class="legend-item"><div class="legend-dot dot-blue"></div> Dilihat</div>
        <div class="legend-item"><div class="legend-dot dot-purple"></div> Pesanan</div>
        <div class="legend-item"><div class="legend-dot dot-green"></div> Pesanan Selesai</div>
      </div>

      <div class="chart-wrap">
        <svg class="chart" viewBox="0 0 660 200" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
          <defs>
            <linearGradient id="gBlue" x1="0" y1="0" x2="0" y2="1"><stop offset="0%" stop-color="#3b82f6" stop-opacity=".15"/><stop offset="100%" stop-color="#3b82f6" stop-opacity="0"/></linearGradient>
            <linearGradient id="gPurple" x1="0" y1="0" x2="0" y2="1"><stop offset="0%" stop-color="#8b5cf6" stop-opacity=".12"/><stop offset="100%" stop-color="#8b5cf6" stop-opacity="0"/></linearGradient>
            <linearGradient id="gGreen" x1="0" y1="0" x2="0" y2="1"><stop offset="0%" stop-color="#10b981" stop-opacity=".10"/><stop offset="100%" stop-color="#10b981" stop-opacity="0"/></linearGradient>
          </defs>

          <!-- Y gridlines -->
          <line x1="40" y1="10"  x2="650" y2="10"  stroke="#f3f4f6" stroke-width="1"/>
          <line x1="40" y1="52"  x2="650" y2="52"  stroke="#f3f4f6" stroke-width="1"/>
          <line x1="40" y1="94"  x2="650" y2="94"  stroke="#f3f4f6" stroke-width="1"/>
          <line x1="40" y1="136" x2="650" y2="136" stroke="#f3f4f6" stroke-width="1"/>
          <line x1="40" y1="178" x2="650" y2="178" stroke="#f3f4f6" stroke-width="1"/>

          <!-- Y labels -->
          <text x="32" y="14"  font-size="9" fill="#9ca3af" text-anchor="end">2.000</text>
          <text x="32" y="56"  font-size="9" fill="#9ca3af" text-anchor="end">1.500</text>
          <text x="32" y="98"  font-size="9" fill="#9ca3af" text-anchor="end">1.000</text>
          <text x="32" y="140" font-size="9" fill="#9ca3af" text-anchor="end">500</text>
          <text x="32" y="182" font-size="9" fill="#9ca3af" text-anchor="end">0</text>

          <!-- Blue area (Dilihat) — range ~700-1600 mapped to 10-178 -->
          <!-- map: val 2000→10, 0→178  slope=(10-178)/2000=-0.084  y=178-val*0.084 -->
          <path d="
            M40,120 C55,118 65,112 80,114 C95,116 105,108 120,110
            C135,112 145,104 160,106 C175,108 185,100 200,102
            C215,104 225,96 240,98 C255,100 265,92 280,90
            C295,88 305,75 320,60 C335,50 345,56 360,64
            C375,72 385,70 400,74 C415,78 425,75 440,78
            C455,81 465,84 480,82 C495,80 510,84 525,88
            C540,92 555,96 570,100 C585,104 600,106 620,108 L620,178 L40,178 Z"
            fill="url(#gBlue)" stroke="none"/>
          <path d="
            M40,120 C55,118 65,112 80,114 C95,116 105,108 120,110
            C135,112 145,104 160,106 C175,108 185,100 200,102
            C215,104 225,96 240,98 C255,100 265,92 280,90
            C295,88 305,75 320,60 C335,50 345,56 360,64
            C375,72 385,70 400,74 C415,78 425,75 440,78
            C455,81 465,84 480,82 C495,80 510,84 525,88
            C540,92 555,96 570,100 C585,104 600,106 620,108"
            fill="none" stroke="#3b82f6" stroke-width="2" stroke-linecap="round"/>

          <!-- Purple area (Pesanan) — range ~300-600 -->
          <path d="
            M40,148 C55,147 65,144 80,145 C95,146 105,143 120,144
            C135,145 145,142 160,143 C175,144 185,141 200,142
            C215,143 225,140 240,141 C255,142 265,139 280,140
            C295,141 305,136 320,134 C335,132 345,134 360,136
            C375,138 385,137 400,138 C415,139 425,138 440,139
            C455,140 465,141 480,140 C495,139 510,141 525,142
            C540,143 555,144 570,145 C585,146 600,147 620,148 L620,178 L40,178 Z"
            fill="url(#gPurple)" stroke="none"/>
          <path d="
            M40,148 C55,147 65,144 80,145 C95,146 105,143 120,144
            C135,145 145,142 160,143 C175,144 185,141 200,142
            C215,143 225,140 240,141 C255,142 265,139 280,140
            C295,141 305,136 320,134 C335,132 345,134 360,136
            C375,138 385,137 400,138 C415,139 425,138 440,139
            C455,140 465,141 480,140 C495,139 510,141 525,142
            C540,143 555,144 570,145 C585,146 600,147 620,148"
            fill="none" stroke="#8b5cf6" stroke-width="2" stroke-linecap="round"/>

          <!-- Green area (Selesai) — range ~100-200 -->
          <path d="
            M40,165 C55,164 65,163 80,164 C95,165 105,163 120,164
            C135,165 145,163 160,164 C175,165 185,163 200,164
            C215,165 225,163 240,164 C255,165 265,163 280,163
            C295,163 305,161 320,160 C335,159 345,160 360,161
            C375,162 385,161 400,162 C415,163 425,162 440,163
            C455,164 465,164 480,163 C495,162 510,163 525,164
            C540,165 555,165 570,165 C585,165 600,165 620,165 L620,178 L40,178 Z"
            fill="url(#gGreen)" stroke="none"/>
          <path d="
            M40,165 C55,164 65,163 80,164 C95,165 105,163 120,164
            C135,165 145,163 160,164 C175,165 185,163 200,164
            C215,165 225,163 240,164 C255,165 265,163 280,163
            C295,163 305,161 320,160 C335,159 345,160 360,161
            C375,162 385,161 400,162 C415,163 425,162 440,163
            C455,164 465,164 480,163 C495,162 510,163 525,164
            C540,165 555,165 570,165 C585,165 600,165 620,165"
            fill="none" stroke="#10b981" stroke-width="2" stroke-linecap="round"/>

          <!-- Tooltip vertical line -->
          <line x1="320" y1="10" x2="320" y2="178" stroke="#d1d5db" stroke-width="1" stroke-dasharray="4,3"/>

          <!-- Dots at tooltip point -->
          <circle cx="320" cy="60" r="5" fill="#fff" stroke="#3b82f6" stroke-width="2"/>
          <circle cx="320" cy="134" r="5" fill="#fff" stroke="#8b5cf6" stroke-width="2"/>
          <circle cx="320" cy="160" r="5" fill="#fff" stroke="#10b981" stroke-width="2"/>
        </svg>

        <!-- Tooltip -->
        <div class="tooltip-box">
          <div class="tooltip-date">16 Mei 2024</div>
          <div class="tooltip-row"><div class="tooltip-dot" style="background:#3b82f6"></div> Dilihat <span class="tooltip-val">1.450</span></div>
          <div class="tooltip-row"><div class="tooltip-dot" style="background:#8b5cf6"></div> Pesanan <span class="tooltip-val">120</span></div>
          <div class="tooltip-row"><div class="tooltip-dot" style="background:#10b981"></div> Selesai <span class="tooltip-val">112</span></div>
        </div>
      </div>

      <div class="x-axis">
        <span>1 Mei</span>
        <span>6 Mei</span>
        <span>11 Mei</span>
        <span>16 Mei</span>
        <span>21 Mei</span>
        <span>26 Mei</span>
        <span>31 Mei</span>
      </div>
    </div>

    <!-- Sumber Trafik -->
    <div class="card">
      <div class="card-title">Sumber Trafik Dilihat</div>

      <div class="donut-wrap">
        <svg class="donut-svg" width="130" height="130" viewBox="0 0 130 130">
          <!-- Donut slices: total 360 -->
          <!-- Blue 63.2% = 227.5deg, Green 22.1% = 79.6deg, Orange 8.7% = 31.3deg, Gray 6% = 21.6deg -->
          <!-- Using stroke-dasharray technique -->
          <circle cx="65" cy="65" r="50" fill="none" stroke="#f3f4f6" stroke-width="22"/>
          <!-- Blue 63.2% starts at -90deg -->
          <circle cx="65" cy="65" r="50" fill="none" stroke="#3b82f6" stroke-width="22"
            stroke-dasharray="197.9 314.2" stroke-dashoffset="78.5" transform="rotate(-90 65 65)"/>
          <!-- Green 22.1% -->
          <circle cx="65" cy="65" r="50" fill="none" stroke="#22c55e" stroke-width="22"
            stroke-dasharray="69.2 314.2" stroke-dashoffset="-119.4" transform="rotate(-90 65 65)"/>
          <!-- Orange 8.7% -->
          <circle cx="65" cy="65" r="50" fill="none" stroke="#f97316" stroke-width="22"
            stroke-dasharray="27.3 314.2" stroke-dashoffset="-188.6" transform="rotate(-90 65 65)"/>
          <!-- Gray 6% -->
          <circle cx="65" cy="65" r="50" fill="none" stroke="#9ca3af" stroke-width="22"
            stroke-dasharray="18.8 314.2" stroke-dashoffset="-215.9" transform="rotate(-90 65 65)"/>
        </svg>

        <div class="donut-legend">
          <div class="donut-row"><div class="donut-dot" style="background:#3b82f6"></div> Aplikasi LaundryKita <span class="donut-pct">63,2%</span></div>
          <div class="donut-row"><div class="donut-dot" style="background:#22c55e"></div> Pencarian <span class="donut-pct">22,1%</span></div>
          <div class="donut-row"><div class="donut-dot" style="background:#f97316"></div> Promo / Diskon <span class="donut-pct">8,7%</span></div>
          <div class="donut-row"><div class="donut-dot" style="background:#9ca3af"></div> Lainnya <span class="donut-pct">6,0%</span></div>
        </div>
      </div>

      <div class="info-box">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
        Mayoritas pelanggan menemukan toko Anda melalui <a href="#">Aplikasi LaundryKita</a>.
      </div>
    </div>

  </div><!-- /main-grid -->

  <!-- Bottom Grid: Service Table + Heatmap -->
  <div class="bottom-grid">

    <!-- Performa Layanan -->
    <div class="card">
      <div class="card-title">Performa Layanan</div>
      <table>
        <thead>
          <tr>
            <th>Layanan</th>
            <th>Dilihat</th>
            <th>Pesanan</th>
            <th>Selesai</th>
            <th>Tingkat Konversi</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><div class="service-name"><div class="service-img">🧺</div> Cuci Kiloan</div></td>
            <td><div class="metric-val">1.250</div><div class="metric-chg up">↑ 12,4%</div></td>
            <td><div class="metric-val">98</div><div class="metric-chg up">↑ 18,3%</div></td>
            <td><div class="metric-val">94</div><div class="metric-chg up">↑ 20,5%</div></td>
            <td><div class="metric-val">7,84% <span class="up" style="font-size:11px">↑ 1,3%</span></div></td>
          </tr>
          <tr>
            <td><div class="service-name"><div class="service-img">👔</div> Cuci Satuan (Kemeja)</div></td>
            <td><div class="metric-val">620</div><div class="metric-chg up">↑ 10,1%</div></td>
            <td><div class="metric-val">42</div><div class="metric-chg up">↑ 11,8%</div></td>
            <td><div class="metric-val">40</div><div class="metric-chg up">↑ 14,3%</div></td>
            <td><div class="metric-val">6,77% <span class="down" style="font-size:11px">↓ 0,8%</span></div></td>
          </tr>
          <tr>
            <td><div class="service-name"><div class="service-img">🛏️</div> Cuci Bed Cover</div></td>
            <td><div class="metric-val">310</div><div class="metric-chg up">↑ 8,7%</div></td>
            <td><div class="metric-val">28</div><div class="metric-chg up">↑ 7,7%</div></td>
            <td><div class="metric-val">27</div><div class="metric-chg up">↑ 8,0%</div></td>
            <td><div class="metric-val">9,03% <span class="down" style="font-size:11px">↓ 0,3%</span></div></td>
          </tr>
          <tr>
            <td><div class="service-name"><div class="service-img">👟</div> Cuci Sepatu</div></td>
            <td><div class="metric-val">270</div><div class="metric-chg up">↑ 15,2%</div></td>
            <td><div class="metric-val">18</div><div class="metric-chg up">↑ 20,0%</div></td>
            <td><div class="metric-val">15</div><div class="metric-chg up">↑ 15,4%</div></td>
            <td><div class="metric-val">6,67% <span class="up" style="font-size:11px">↑ 0,6%</span></div></td>
          </tr>
          <tr>
            <td><div class="service-name"><div class="service-img">👕</div> Setrika</div></td>
            <td><div class="metric-val">210</div><div class="metric-chg up">↑ 11,0%</div></td>
            <td><div class="metric-val">12</div><div class="metric-chg up">↑ 9,1%</div></td>
            <td><div class="metric-val">12</div><div class="metric-chg up">↑ 9,1%</div></td>
            <td><div class="metric-val">5,71% <span class="down" style="font-size:11px">↓ 0,4%</span></div></td>
          </tr>
        </tbody>
      </table>
      <div class="see-all"><a href="#">Lihat Semua Layanan ›</a></div>
    </div>

    <!-- Heatmap + Insight -->
    <div class="card">
      <div class="card-title">Waktu Paling Banyak Dilihat</div>

      <div class="heatmap-wrap" id="heatmap"></div>

      <div class="heatmap-x">
        <span>00:00</span><span>04:00</span><span>08:00</span><span>12:00</span><span>16:00</span><span>20:00</span>
      </div>

      <div class="heatmap-legend">
        <span>Rendah</span>
        <div class="heatmap-legend-bar">
          <div class="heatmap-legend-cell" style="background:#dbeafe"></div>
          <div class="heatmap-legend-cell" style="background:#bfdbfe"></div>
          <div class="heatmap-legend-cell" style="background:#93c5fd"></div>
          <div class="heatmap-legend-cell" style="background:#60a5fa"></div>
          <div class="heatmap-legend-cell" style="background:#3b82f6"></div>
          <div class="heatmap-legend-cell" style="background:#1d4ed8"></div>
        </div>
        <span>Tinggi</span>
      </div>

      <div class="insight-title">Insight Performa</div>

      <div class="insight-item">
        <div class="insight-icon" style="background:#dcfce7">
          <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#16a34a" stroke-width="2.5"><polyline points="18 15 12 9 6 15"/></svg>
        </div>
        Performa toko Anda meningkat 15.2% dibanding bulan lalu.
      </div>

      <div class="insight-item">
        <div class="insight-icon" style="background:#fef9c3">
          <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#ca8a04" stroke-width="2"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
        </div>
        Layanan Cuci Kiloan menjadi layanan paling diminati pelanggan.
      </div>

      <div class="insight-item">
        <div class="insight-icon" style="background:#eff6ff">
          <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#2563eb" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
        </div>
        Waktu paling ramai dilihat antara jam 10.00 - 16.00.
      </div>
    </div>

  </div><!-- /bottom-grid -->

  <!-- Footer -->
  <div class="footer">
    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#9ca3af" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
    Data diperbarui setiap hari pukul 00.00 WIB
  </div>

</div><!-- /page -->
@endsection

@push('scripts')
    <script>
// ── Heatmap generator ──
(function(){
  const days = ['Sen','Sel','Rab','Kam','Jum','Sab','Min'];
  const hours = 24; // columns
  const colors = ['#dbeafe','#bfdbfe','#93c5fd','#60a5fa','#3b82f6','#1d4ed8'];

  // Activity pattern: higher mid-day, lower early morning
  function intensity(day, hour){
    let base = 0;
    if(hour >= 10 && hour <= 16) base = 3;
    else if(hour >= 7 && hour < 10) base = 2;
    else if(hour >= 17 && hour <= 20) base = 2;
    else if(hour >= 21 || hour <= 5) base = 0;
    else base = 1;
    // Weekend slightly lower
    if(day >= 5) base = Math.max(0, base - 1);
    // Add some randomness
    let r = Math.floor(Math.random() * 2);
    return Math.min(5, base + r);
  }

  const wrap = document.getElementById('heatmap');
  const grid = document.createElement('div');
  grid.className = 'heatmap-grid';

  // Day labels
  const dayLabels = document.createElement('div');
  dayLabels.className = 'heatmap-days';
  days.forEach(d => {
    const el = document.createElement('div');
    el.className = 'heatmap-day';
    el.textContent = d;
    dayLabels.appendChild(el);
  });
  grid.appendChild(dayLabels);

  // Columns (hours)
  const cols = document.createElement('div');
  cols.className = 'heatmap-cols';
  for(let h = 0; h < hours; h++){
    const col = document.createElement('div');
    col.className = 'heatmap-col';
    for(let d = 0; d < 7; d++){
      const cell = document.createElement('div');
      cell.className = 'heatmap-cell';
      cell.style.background = colors[intensity(d, h)];
      col.appendChild(cell);
    }
    cols.appendChild(col);
  }
  grid.appendChild(cols);
  wrap.appendChild(grid);
})();
</script>
@endpush