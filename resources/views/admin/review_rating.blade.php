<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>LaundryHub – Review &amp; Rating</title>
  <link rel="stylesheet" href="{{ asset('assets/css/admin/review_rating.css') }}">
</head>
<body>

<!-- ══════════ SIDEBAR ══════════ -->
<aside class="sidebar">
  <div class="sb-brand">
    <div class="b-icon">🧺</div>
    <div class="b-text">
      <h2>LaundryHub</h2>
      <span>Admin Panel</span>
    </div>
  </div>

  <nav class="sb-nav">
    <div class="ni"><span class="ico">🏠</span> Dashboard</div>

    <div class="nl">Manajemen</div>
    <div class="ni"><span class="ico">👤</span> User / Customer</div>
    <div class="ni"><span class="ico">🏪</span> Mitra Laundry</div>
    <div class="ni"><span class="ico">✅</span> Verifikasi Mitra <span class="nbadge">8</span></div>
    <div class="ni"><span class="ico">📦</span> Pesanan (via Mitra) ›</div>
    <div class="ni"><span class="ico">💳</span> Pembayaran</div>

    <div class="nl">Moderasi</div>
    <div class="ni active"><span class="ico">⭐</span> Review &amp; Rating</div>
    <div class="ni"><span class="ico">🚩</span> Komplain / Laporan <span class="nbadge">2</span></div>

    <div class="nl">Laporan &amp; Analitik</div>
    <div class="ni"><span class="ico">📊</span> Statistik &amp; Laporan</div>
    <div class="ni"><span class="ico">📋</span> Aktivitas</div>

    <div class="nl">Pengaturan</div>
    <div class="ni"><span class="ico">⚙️</span> Pengaturan Platform</div>
    <div class="ni"><span class="ico">🛡️</span> Admin &amp; Role</div>
    <div class="ni"><span class="ico">🔔</span> Notifikasi</div>
  </nav>

  <div class="sb-foot">
    <div class="help-card">
      <p>Butuh bantuan?</p>
      <small>Kunjungi Pusat Bantuan</small>
      <div class="hbtns">
        <button class="hbtn p">🎧 Pusat Bantuan</button>
        <button class="hbtn s">🎧</button>
      </div>
    </div>
  </div>
</aside>

<!-- ══════════ MAIN ══════════ -->
<div class="main">

  <!-- HEADER -->
  <header class="hdr">
    <button class="ham" id="hamBtn"><span></span><span></span><span></span></button>
    <div class="htitle">
      <h1>Review &amp; Rating</h1>
      <p>Kelola semua review dan rating yang diberikan pelanggan terhadap mitra laundry.</p>
    </div>
    <div class="hsearch">
      <span class="sico">🔍</span>
      <input type="text" placeholder="Cari mitra, pelanggan, atau order ID..."/>
    </div>
    <div class="hacts">
      <button class="nbtn">🔔<span class="nbadge2">2</span></button>
      <div class="uprof">
        <div class="uav">SA</div>
        <div class="uinfo"><h4>Super Admin</h4><span>Administrator</span></div>
        <span class="chev">▾</span>
      </div>
    </div>
  </header>

  <!-- PAGE BODY -->
  <div class="pgbody">
    <div class="content">

      <!-- STAT CARDS -->
      <div class="stat-row">
        <div class="scard">
          <div class="sico2 yellow">⭐</div>
          <div class="sd">
            <div class="slabel">Total Review</div>
            <div class="sval">1.248</div>
            <div class="ssub">Semua review</div>
          </div>
        </div>
        <div class="scard">
          <div class="sico2 green">🌟</div>
          <div class="sd">
            <div class="slabel">Rata-rata Rating</div>
            <div class="sval mid">4.6 <span style="font-size:13px;font-weight:500;color:var(--g400)">/ 5</span></div>
            <div class="ssub">Dari semua review</div>
          </div>
        </div>
        <div class="scard">
          <div class="sico2 blue">👍</div>
          <div class="sd">
            <div class="slabel">Review Positif</div>
            <div class="sval">1.032</div>
            <div class="ssub">82,7% dari total</div>
          </div>
        </div>
        <div class="scard">
          <div class="sico2 orange">😐</div>
          <div class="sd">
            <div class="slabel">Review Netral</div>
            <div class="sval">156</div>
            <div class="ssub">12,5% dari total</div>
          </div>
        </div>
        <div class="scard">
          <div class="sico2 red">👎</div>
          <div class="sd">
            <div class="slabel">Review Negatif</div>
            <div class="sval">60</div>
            <div class="ssub">4,8% dari total</div>
          </div>
        </div>
      </div>

      <!-- TABS -->
      <div class="tabs">
        <div class="tab active">Semua <span class="tc">1.248</span></div>
        <div class="tab">Menunggu Review <span class="tc">32</span></div>
        <div class="tab">Disetujui <span class="tc">1.152</span></div>
        <div class="tab">Ditolak <span class="tc">64</span></div>
      </div>

      <!-- TOOLBAR -->
      <div class="toolbar">
        <div class="fsrch">
          <span class="fi">🔍</span>
          <input type="text" placeholder="Cari mitra, pelanggan, atau order ID..."/>
        </div>
        <div class="fsel">
          <select><option>Rating</option><option>5 Bintang</option><option>4 Bintang</option><option>3 Bintang</option><option>≤ 2 Bintang</option></select> ▾
        </div>
        <div class="fsel">
          <select><option>Status</option><option>Disetujui</option><option>Menunggu</option><option>Ditolak</option></select> ▾
        </div>
        <div class="fsel">
          <select><option>Mitra Laundry</option><option>Laundry Bersih Sejahtera</option><option>Quick Wash</option><option>Fresh &amp; Clean</option></select> ▾
        </div>
        <div class="fdate">
          📅 <input type="date"/>
          <span class="farrow">→</span>
          <input type="date"/>
        </div>
        <button class="btn-filter">⚙ Filter</button>
      </div>

      <!-- TABLE -->
      <div class="twrap">
        <table class="dtbl">
          <thead>
            <tr>
              <th style="width:36px;text-align:center"><input type="checkbox"/></th>
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
          <tbody>

            <!-- Row 1 - selected -->
            <tr class="sel" onclick="selectRow(this)">
              <td style="text-align:center"><input type="checkbox" checked/></td>
              <td>
                <div class="rev-cell">
                  <div class="rev-ava">AP</div>
                  <div>
                    <div class="rev-name">Andi Pratama</div>
                    <div class="rev-text">Cucian bersih, wangi dan rapi. Pengantaran tepat waktu, sangat memuaskan!</div>
                  </div>
                </div>
              </td>
              <td><div class="plg-name">Andi Pratama</div><div class="plg-phone">0812-3456-7890</div></td>
              <td>
                <div class="mc">
                  <div class="mlogo blue">🧺</div>
                  <div class="mname">Laundry Bersih<br/>Sejahtera</div>
                </div>
              </td>
              <td><div class="oid">#ORD-2024-0508-0001</div></td>
              <td>
                <div class="stars">
                  <div class="star-row">
                    <span class="star on">★</span><span class="star on">★</span><span class="star on">★</span><span class="star on">★</span><span class="star on">★</span>
                  </div>
                  <span class="snum">5.0</span>
                </div>
              </td>
              <td><div class="tdate">8 Mei 2024</div><div class="ttime">09:20</div></td>
              <td><span class="badge ok">Disetujui</span></td>
              <td><div class="acell"><button class="abtn v">👁</button><button class="abtn">⋯</button></div></td>
            </tr>

            <!-- Row 2 -->
            <tr onclick="selectRow(this)">
              <td style="text-align:center"><input type="checkbox"/></td>
              <td>
                <div class="rev-cell">
                  <div class="rev-ava" style="background:linear-gradient(135deg,#10B981,#059669)">SA</div>
                  <div>
                    <div class="rev-name">Siti Aisyah</div>
                    <div class="rev-text">Pelayanan bagus, cuma pengantaran sedikit terlambat.</div>
                  </div>
                </div>
              </td>
              <td><div class="plg-name">Siti Aisyah</div><div class="plg-phone">0821-9876-5432</div></td>
              <td>
                <div class="mc">
                  <div class="mlogo teal">🔵</div>
                  <div class="mname">Fresh &amp; Clean<br/>Laundry</div>
                </div>
              </td>
              <td><div class="oid">#ORD-2024-0507-0015</div></td>
              <td>
                <div class="stars">
                  <div class="star-row">
                    <span class="star on">★</span><span class="star on">★</span><span class="star on">★</span><span class="star on">★</span><span class="star">★</span>
                  </div>
                  <span class="snum">4.0</span>
                </div>
              </td>
              <td><div class="tdate">7 Mei 2024</div><div class="ttime">15:35</div></td>
              <td><span class="badge ok">Disetujui</span></td>
              <td><div class="acell"><button class="abtn v">👁</button><button class="abtn">⋯</button></div></td>
            </tr>

            <!-- Row 3 -->
            <tr onclick="selectRow(this)">
              <td style="text-align:center"><input type="checkbox"/></td>
              <td>
                <div class="rev-cell">
                  <div class="rev-ava" style="background:linear-gradient(135deg,#F59E0B,#EF4444)">BS</div>
                  <div>
                    <div class="rev-name">Budi Santoso</div>
                    <div class="rev-text">Hasil cucian oke, tapi ada noda yang masih tertinggal di salah satu baju.</div>
                  </div>
                </div>
              </td>
              <td><div class="plg-name">Budi Santoso</div><div class="plg-phone">0813-2345-6789</div></td>
              <td>
                <div class="mc">
                  <div class="mlogo green">🌿</div>
                  <div class="mname">Quick Wash<br/>Laundry</div>
                </div>
              </td>
              <td><div class="oid">#ORD-2024-0508-0002</div></td>
              <td>
                <div class="stars">
                  <div class="star-row">
                    <span class="star on">★</span><span class="star on">★</span><span class="star on">★</span><span class="star">★</span><span class="star">★</span>
                  </div>
                  <span class="snum">3.0</span>
                </div>
              </td>
              <td><div class="tdate">8 Mei 2024</div><div class="ttime">08:50</div></td>
              <td><span class="badge ok">Disetujui</span></td>
              <td><div class="acell"><button class="abtn v">👁</button><button class="abtn">⋯</button></div></td>
            </tr>

            <!-- Row 4 -->
            <tr onclick="selectRow(this)">
              <td style="text-align:center"><input type="checkbox"/></td>
              <td>
                <div class="rev-cell">
                  <div class="rev-ava" style="background:linear-gradient(135deg,#7C3AED,#EC4899)">DL</div>
                  <div>
                    <div class="rev-name">Dewi Lestari</div>
                    <div class="rev-text">Cucian bersih dan rapi, harga terjangkau. Akan langganan lagi!</div>
                  </div>
                </div>
              </td>
              <td><div class="plg-name">Dewi Lestari</div><div class="plg-phone">0822-1122-3344</div></td>
              <td>
                <div class="mc">
                  <div class="mlogo orange">🟠</div>
                  <div class="mname">LaundryKita</div>
                </div>
              </td>
              <td><div class="oid">#ORD-2024-0507-0014</div></td>
              <td>
                <div class="stars">
                  <div class="star-row">
                    <span class="star on">★</span><span class="star on">★</span><span class="star on">★</span><span class="star on">★</span><span class="star on">★</span>
                  </div>
                  <span class="snum">5.0</span>
                </div>
              </td>
              <td><div class="tdate">7 Mei 2024</div><div class="ttime">14:25</div></td>
              <td><span class="badge ok">Disetujui</span></td>
              <td><div class="acell"><button class="abtn v">👁</button><button class="abtn">⋯</button></div></td>
            </tr>

            <!-- Row 5 -->
            <tr onclick="selectRow(this)">
              <td style="text-align:center"><input type="checkbox"/></td>
              <td>
                <div class="rev-cell">
                  <div class="rev-ava" style="background:linear-gradient(135deg,#0D9488,#06B6D4)">FH</div>
                  <div>
                    <div class="rev-name">Fahmi Hidayat</div>
                    <div class="rev-text">Proses cepat, tapi wangi deterjennya kurang suka.</div>
                  </div>
                </div>
              </td>
              <td><div class="plg-name">Fahmi Hidayat</div><div class="plg-phone">0838-7766-5544</div></td>
              <td>
                <div class="mc">
                  <div class="mlogo purple">💜</div>
                  <div class="mname">CleanPro Laundry</div>
                </div>
              </td>
              <td><div class="oid">#ORD-2024-0507-0013</div></td>
              <td>
                <div class="stars">
                  <div class="star-row">
                    <span class="star on">★</span><span class="star on">★</span><span class="star on">★</span><span class="star on">★</span><span class="star">★</span>
                  </div>
                  <span class="snum">4.0</span>
                </div>
              </td>
              <td><div class="tdate">7 Mei 2024</div><div class="ttime">11:15</div></td>
              <td><span class="badge wait">Menunggu</span></td>
              <td><div class="acell"><button class="abtn v">👁</button><button class="abtn">⋯</button></div></td>
            </tr>

            <!-- Row 6 -->
            <tr onclick="selectRow(this)">
              <td style="text-align:center"><input type="checkbox"/></td>
              <td>
                <div class="rev-cell">
                  <div class="rev-ava" style="background:linear-gradient(135deg,#EC4899,#F59E0B)">RM</div>
                  <div>
                    <div class="rev-name">Rina Marlina</div>
                    <div class="rev-text">Sangat puas! Pakaian wangi dan bebas noda. Terima kasih!</div>
                  </div>
                </div>
              </td>
              <td><div class="plg-name">Rina Marlina</div><div class="plg-phone">0856-9988-7766</div></td>
              <td>
                <div class="mc">
                  <div class="mlogo red">🔴</div>
                  <div class="mname">Rapi &amp; Wangi<br/>Laundry</div>
                </div>
              </td>
              <td><div class="oid">#ORD-2024-0506-0022</div></td>
              <td>
                <div class="stars">
                  <div class="star-row">
                    <span class="star on">★</span><span class="star on">★</span><span class="star on">★</span><span class="star on">★</span><span class="star on">★</span>
                  </div>
                  <span class="snum">5.0</span>
                </div>
              </td>
              <td><div class="tdate">6 Mei 2024</div><div class="ttime">16:45</div></td>
              <td><span class="badge ok">Disetujui</span></td>
              <td><div class="acell"><button class="abtn v">👁</button><button class="abtn">⋯</button></div></td>
            </tr>

            <!-- Row 7 -->
            <tr onclick="selectRow(this)">
              <td style="text-align:center"><input type="checkbox"/></td>
              <td>
                <div class="rev-cell">
                  <div class="rev-ava" style="background:linear-gradient(135deg,#4F46E5,#7C3AED)">DS</div>
                  <div>
                    <div class="rev-name">Dimas Saputra</div>
                    <div class="rev-text">Pengantaran sangat lama, komunikasi juga kurang responsif.</div>
                  </div>
                </div>
              </td>
              <td><div class="plg-name">Dimas Saputra</div><div class="plg-phone">0811-2233-4455</div></td>
              <td>
                <div class="mc">
                  <div class="mlogo indigo">📍</div>
                  <div class="mname">Super Laundry<br/>Express</div>
                </div>
              </td>
              <td><div class="oid">#ORD-2024-0506-0021</div></td>
              <td>
                <div class="stars">
                  <div class="star-row">
                    <span class="star on">★</span><span class="star on">★</span><span class="star">★</span><span class="star">★</span><span class="star">★</span>
                  </div>
                  <span class="snum">2.0</span>
                </div>
              </td>
              <td><div class="tdate">6 Mei 2024</div><div class="ttime">13:30</div></td>
              <td><span class="badge rej">Ditolak</span></td>
              <td><div class="acell"><button class="abtn v">👁</button><button class="abtn">⋯</button></div></td>
            </tr>

            <!-- Row 8 -->
            <tr onclick="selectRow(this)">
              <td style="text-align:center"><input type="checkbox"/></td>
              <td>
                <div class="rev-cell">
                  <div class="rev-ava" style="background:linear-gradient(135deg,#06B6D4,#2563EB)">HW</div>
                  <div>
                    <div class="rev-name">Hendra Wijaya</div>
                    <div class="rev-text">Bagus, tapi kemasannya agak basah saat diterima.</div>
                  </div>
                </div>
              </td>
              <td><div class="plg-name">Hendra Wijaya</div><div class="plg-phone">0812-6677-8899</div></td>
              <td>
                <div class="mc">
                  <div class="mlogo cyan">🔷</div>
                  <div class="mname">Laundry Baik Hati</div>
                </div>
              </td>
              <td><div class="oid">#ORD-2024-0505-0018</div></td>
              <td>
                <div class="stars">
                  <div class="star-row">
                    <span class="star on">★</span><span class="star on">★</span><span class="star on">★</span><span class="star">★</span><span class="star">★</span>
                  </div>
                  <span class="snum">3.0</span>
                </div>
              </td>
              <td><div class="tdate">5 Mei 2024</div><div class="ttime">09:10</div></td>
              <td><span class="badge ok">Disetujui</span></td>
              <td><div class="acell"><button class="abtn v">👁</button><button class="abtn">⋯</button></div></td>
            </tr>

          </tbody>
        </table>
      </div>

      <!-- PAGINATION -->
      <div class="pagibar">
        <div class="pginfo">Menampilkan 1 – 8 dari 1.248 data</div>
        <div class="pgright">
          <div class="pps">
            <select><option>10</option><option>25</option><option>50</option></select> / halaman
          </div>
          <div class="pgbtns">
            <button class="pgb nav">‹</button>
            <button class="pgb active">1</button>
            <button class="pgb">2</button>
            <button class="pgb">3</button>
            <button class="pgb">4</button>
            <button class="pgb">5</button>
            <span class="pgdots">…</span>
            <button class="pgb">125</button>
            <button class="pgb nav">›</button>
          </div>
        </div>
      </div>

    </div><!-- /content -->

    <!-- ══════════ DETAIL PANEL ══════════ -->
    <aside class="detail" id="detailPanel">
      <div class="dethdr">
        <h3>Detail Review</h3>
        <button class="cbtn" id="closeDetail">✕</button>
      </div>

      <div class="detbody">

        <!-- Customer -->
        <div class="cust-card">
          <div class="cust-av">AP</div>
          <div>
            <div class="cust-name">Andi Pratama</div>
            <div class="cust-contacts">
              <div class="clink"><span class="lic">📱</span> 0812-3456-7890</div>
              <div class="clink"><span class="lic">✉️</span> andi.pratama@email.com</div>
            </div>
          </div>
        </div>

        <!-- Informasi Order -->
        <div class="dsec">
          <div class="dsec-title">Informasi Order</div>
          <div class="drows">
            <div class="drow">
              <span class="drow-l">Order ID</span>
              <span class="drow-r primary">#ORD-2024-0508-0001</span>
            </div>
            <div class="drow">
              <span class="drow-l">Tanggal Order</span>
              <span class="drow-r">7 Mei 2024, 14:10</span>
            </div>
            <div class="drow">
              <span class="drow-l">Tanggal Selesai</span>
              <span class="drow-r">8 Mei 2024, 09:20</span>
            </div>
            <div class="drow">
              <span class="drow-l">Total Pembayaran</span>
              <span class="drow-r">Rp85.000</span>
            </div>
          </div>
        </div>

        <!-- Mitra Laundry -->
        <div class="dsec">
          <div class="dsec-title">Mitra Laundry</div>
          <div class="mcard">
            <div class="mcard-logo">🧺</div>
            <div>
              <div class="mcard-name">Laundry Bersih Sejahtera</div>
              <div class="mcard-loc">📍 Jakarta Selatan</div>
            </div>
          </div>
        </div>

        <!-- Review & Rating -->
        <div class="dsec">
          <div class="dsec-title">Review &amp; Rating</div>
          <div class="big-stars">
            <span class="bstar on">★</span>
            <span class="bstar on">★</span>
            <span class="bstar on">★</span>
            <span class="bstar on">★</span>
            <span class="bstar on">★</span>
            <span class="bscore">5.0 / 5</span>
          </div>
          <div class="rev-quote">
            Cucian bersih, wangi dan rapi. Pengantaran tepat waktu, sangat memuaskan!
          </div>
          <div class="rev-date">8 Mei 2024, 09:20</div>
        </div>

        <!-- Status Review -->
        <div class="dsec">
          <div class="dsec-title">Status Review</div>
          <div class="status-row">
            <span class="badge ok">Disetujui</span>
          </div>
          <div class="status-by">Oleh Super Admin &nbsp;•&nbsp; 8 Mei 2024, 09:25</div>
        </div>

        <!-- Aksi -->
        <div class="dsec">
          <div class="dsec-title">Aksi</div>
          <div class="d-acts">
            <div class="act-row2">
              <button class="btn-approve">✓ Setujui Review</button>
              <button class="btn-reject">✕ Tolak Review</button>
            </div>
            <button class="btn-spam">⚠ Tandai sebagai Spam</button>
          </div>
        </div>

        <!-- Catatan Admin -->
        <div class="dsec">
          <div class="dsec-title">Catatan Admin</div>
          <textarea class="note-area" placeholder="Tambahkan catatan (opsional)..."></textarea>
        </div>

      </div><!-- /detbody -->

      <div class="detfoot">
        <button class="btn-save">💾 Simpan Catatan</button>
      </div>
    </aside>

  </div><!-- /pgbody -->
</div><!-- /main -->

<script>
  function selectRow(row) {
    document.querySelectorAll('tbody tr').forEach(r => {
      r.classList.remove('sel');
      r.querySelector('input[type=checkbox]').checked = false;
    });
    row.classList.add('sel');
    row.querySelector('input[type=checkbox]').checked = true;
  }

  document.querySelectorAll('.tab').forEach(t =>
    t.addEventListener('click', () => {
      document.querySelectorAll('.tab').forEach(x => x.classList.remove('active'));
      t.classList.add('active');
    })
  );

  document.querySelectorAll('.pgb:not(.nav)').forEach(b =>
    b.addEventListener('click', () => {
      document.querySelectorAll('.pgb:not(.nav)').forEach(x => x.classList.remove('active'));
      b.classList.add('active');
    })
  );

  document.getElementById('closeDetail').addEventListener('click', () => {
    document.getElementById('detailPanel').style.display = 'none';
  });

  document.getElementById('hamBtn').addEventListener('click', () => {
    const sb = document.querySelector('.sidebar');
    sb.style.display = sb.style.display === 'none' ? 'flex' : 'none';
  });
</script>
</body>
</html>