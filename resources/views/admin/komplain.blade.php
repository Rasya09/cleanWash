<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>LaundryHub – Komplain / Laporan</title>
<link rel="stylesheet" href="{{ asset('assets/css/admin/komplain.css') }}"></head>
<body>

<!-- ══════════ SIDEBAR ══════════ -->
<aside class="sidebar">
  <div class="sb-brand">
    <div class="b-icon">🧺</div>
    <div class="b-text"><h2>LaundryHub</h2><span>Admin Panel</span></div>
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
    <div class="ni"><span class="ico">⭐</span> Review &amp; Rating</div>
    <div class="ni active"><span class="ico">🚩</span> Komplain / Laporan <span class="nbadge">2</span></div>

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
      <h1>Komplain / Laporan</h1>
      <p>Kelola semua komplain dan laporan yang masuk dari pelanggan.</p>
    </div>
    <div class="hsearch">
      <span class="sico">🔍</span>
      <input type="text" placeholder="Cari order ID, pelanggan, atau mitra..."/>
    </div>
    <div class="hacts">
      <button class="nbtn">🔔<span class="nbadge2">3</span></button>
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
          <div class="sico2 indigo">📋</div>
          <div>
            <div class="slabel">Total Laporan</div>
            <div class="sval">186</div>
            <div class="ssub">Semua laporan</div>
          </div>
        </div>
        <div class="scard">
          <div class="sico2 orange">⏳</div>
          <div>
            <div class="slabel">Menunggu Tindak Lanjut</div>
            <div class="sval">32</div>
            <div class="ssub">17,2% dari total</div>
          </div>
        </div>
        <div class="scard">
          <div class="sico2 blue">⚙️</div>
          <div>
            <div class="slabel">Sedang Diproses</div>
            <div class="sval">68</div>
            <div class="ssub">36,6% dari total</div>
          </div>
        </div>
        <div class="scard">
          <div class="sico2 green">✅</div>
          <div>
            <div class="slabel">Selesai</div>
            <div class="sval">78</div>
            <div class="ssub">41,9% dari total</div>
          </div>
        </div>
        <div class="scard">
          <div class="sico2 red">❌</div>
          <div>
            <div class="slabel">Ditolak</div>
            <div class="sval">8</div>
            <div class="ssub">4,3% dari total</div>
          </div>
        </div>
      </div>

      <!-- TABS -->
      <div class="tabs">
        <div class="tab active">Semua <span class="tc">186</span></div>
        <div class="tab">Menunggu <span class="tc">32</span></div>
        <div class="tab">Diproses <span class="tc">68</span></div>
        <div class="tab">Selesai <span class="tc">78</span></div>
        <div class="tab">Ditolak <span class="tc">8</span></div>
      </div>

      <!-- TOOLBAR -->
      <div class="toolbar">
        <div class="fsrch">
          <span class="fi">🔍</span>
          <input type="text" placeholder="Cari order ID, pelanggan, atau mitra..."/>
        </div>
        <div class="fsel">
          <select><option>Status</option><option>Menunggu</option><option>Diproses</option><option>Selesai</option><option>Ditolak</option></select> ▾
        </div>
        <div class="fsel">
          <select><option>Kategori</option><option>Pakaian Rusak</option><option>Kehilangan Barang</option><option>Terlambat</option><option>Pelayanan Buruk</option><option>Harga Tidak Sesuai</option><option>Lainnya</option></select> ▾
        </div>
        <div class="fsel">
          <select><option>Prioritas</option><option>Tinggi</option><option>Sedang</option><option>Rendah</option></select> ▾
        </div>
        <div class="fdate">📅 <input type="date"/></div>
        <button class="btn-filter">⚙ Filter</button>
      </div>

      <!-- TABLE -->
      <div class="twrap">
        <table class="dtbl">
          <thead>
            <tr>
              <th style="width:36px;text-align:center"><input type="checkbox"/></th>
              <th>ID Laporan</th>
              <th>Pelapor</th>
              <th>Tipe Laporan</th>
              <th>Mitra Laundry</th>
              <th>Order ID</th>
              <th>Prioritas</th>
              <th>Status</th>
              <th>Tanggal</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>

            <!-- Row 1 - selected -->
            <tr class="sel" onclick="selectRow(this)">
              <td style="text-align:center"><input type="checkbox" checked/></td>
              <td><div class="cmpid">CMP-2024-0508-0001</div></td>
              <td>
                <div class="plcell">
                  <div class="plav" style="background:linear-gradient(135deg,#2563EB,#06B6D4)">AP</div>
                  <div>
                    <div class="plname">Andi Pratama</div>
                    <div class="plphone">0812-3456-7890</div>
                  </div>
                </div>
              </td>
              <td>
                <div class="tipecell">
                  <div class="tipe-ico red">👕</div>
                  <div class="tipename">Pakaian Rusak</div>
                </div>
              </td>
              <td>
                <div class="mc">
                  <div class="mlogo blue">🧺</div>
                  <div class="mname">Laundry Bersih<br/>Sejahtera</div>
                </div>
              </td>
              <td><div class="oid">#ORD-2024-0508-0001</div></td>
              <td><span class="prio high">Tinggi</span></td>
              <td><span class="badge wait">Menunggu</span></td>
              <td><div class="tdate">8 Mei 2024</div><div class="ttime">09:20</div></td>
              <td><div class="acell"><button class="abtn v">👁</button><button class="abtn">⋯</button></div></td>
            </tr>

            <!-- Row 2 -->
            <tr onclick="selectRow(this)">
              <td style="text-align:center"><input type="checkbox"/></td>
              <td><div class="cmpid">CMP-2024-0508-0002</div></td>
              <td>
                <div class="plcell">
                  <div class="plav" style="background:linear-gradient(135deg,#10B981,#059669)">SA</div>
                  <div>
                    <div class="plname">Siti Aisyah</div>
                    <div class="plphone">0821-9876-5432</div>
                  </div>
                </div>
              </td>
              <td>
                <div class="tipecell">
                  <div class="tipe-ico orange">🕐</div>
                  <div class="tipename">Terlambat Diambil</div>
                </div>
              </td>
              <td>
                <div class="mc">
                  <div class="mlogo teal">🔵</div>
                  <div class="mname">Quick Wash Laundry</div>
                </div>
              </td>
              <td><div class="oid">#ORD-2024-0508-0002</div></td>
              <td><span class="prio med">Sedang</span></td>
              <td><span class="badge proc">Diproses</span></td>
              <td><div class="tdate">8 Mei 2024</div><div class="ttime">08:45</div></td>
              <td><div class="acell"><button class="abtn v">👁</button><button class="abtn">⋯</button></div></td>
            </tr>

            <!-- Row 3 -->
            <tr onclick="selectRow(this)">
              <td style="text-align:center"><input type="checkbox"/></td>
              <td><div class="cmpid">CMP-2024-0507-0015</div></td>
              <td>
                <div class="plcell">
                  <div class="plav" style="background:linear-gradient(135deg,#F59E0B,#EF4444)">BS</div>
                  <div>
                    <div class="plname">Budi Santoso</div>
                    <div class="plphone">0813-2345-6789</div>
                  </div>
                </div>
              </td>
              <td>
                <div class="tipecell">
                  <div class="tipe-ico blue">🧹</div>
                  <div class="tipename">Hasil Cucian Buruk</div>
                </div>
              </td>
              <td>
                <div class="mc">
                  <div class="mlogo green">🌿</div>
                  <div class="mname">Fresh &amp; Clean<br/>Laundry</div>
                </div>
              </td>
              <td><div class="oid">#ORD-2024-0507-0015</div></td>
              <td><span class="prio high">Tinggi</span></td>
              <td><span class="badge proc">Diproses</span></td>
              <td><div class="tdate">7 Mei 2024</div><div class="ttime">15:35</div></td>
              <td><div class="acell"><button class="abtn v">👁</button><button class="abtn">⋯</button></div></td>
            </tr>

            <!-- Row 4 -->
            <tr onclick="selectRow(this)">
              <td style="text-align:center"><input type="checkbox"/></td>
              <td><div class="cmpid">CMP-2024-0507-0014</div></td>
              <td>
                <div class="plcell">
                  <div class="plav" style="background:linear-gradient(135deg,#7C3AED,#EC4899)">DL</div>
                  <div>
                    <div class="plname">Dewi Lestari</div>
                    <div class="plphone">0822-1122-3344</div>
                  </div>
                </div>
              </td>
              <td>
                <div class="tipecell">
                  <div class="tipe-ico orange">📦</div>
                  <div class="tipename">Kehilangan Barang</div>
                </div>
              </td>
              <td>
                <div class="mc">
                  <div class="mlogo orange">🟠</div>
                  <div class="mname">LaundryKita</div>
                </div>
              </td>
              <td><div class="oid">#ORD-2024-0507-0014</div></td>
              <td><span class="prio high">Tinggi</span></td>
              <td><span class="badge wait">Menunggu</span></td>
              <td><div class="tdate">7 Mei 2024</div><div class="ttime">14:25</div></td>
              <td><div class="acell"><button class="abtn v">👁</button><button class="abtn">⋯</button></div></td>
            </tr>

            <!-- Row 5 -->
            <tr onclick="selectRow(this)">
              <td style="text-align:center"><input type="checkbox"/></td>
              <td><div class="cmpid">CMP-2024-0507-0013</div></td>
              <td>
                <div class="plcell">
                  <div class="plav" style="background:linear-gradient(135deg,#0D9488,#06B6D4)">FH</div>
                  <div>
                    <div class="plname">Fahmi Hidayat</div>
                    <div class="plphone">0838-7766-5544</div>
                  </div>
                </div>
              </td>
              <td>
                <div class="tipecell">
                  <div class="tipe-ico red">😤</div>
                  <div class="tipename">Pelayanan Buruk</div>
                </div>
              </td>
              <td>
                <div class="mc">
                  <div class="mlogo purple">💜</div>
                  <div class="mname">CleanPro Laundry</div>
                </div>
              </td>
              <td><div class="oid">#ORD-2024-0507-0013</div></td>
              <td><span class="prio med">Sedang</span></td>
              <td><span class="badge done">Selesai</span></td>
              <td><div class="tdate">7 Mei 2024</div><div class="ttime">11:15</div></td>
              <td><div class="acell"><button class="abtn v">👁</button><button class="abtn">⋯</button></div></td>
            </tr>

            <!-- Row 6 -->
            <tr onclick="selectRow(this)">
              <td style="text-align:center"><input type="checkbox"/></td>
              <td><div class="cmpid">CMP-2024-0506-0022</div></td>
              <td>
                <div class="plcell">
                  <div class="plav" style="background:linear-gradient(135deg,#EC4899,#F59E0B)">RM</div>
                  <div>
                    <div class="plname">Rina Marlina</div>
                    <div class="plphone">0856-9988-7766</div>
                  </div>
                </div>
              </td>
              <td>
                <div class="tipecell">
                  <div class="tipe-ico gray">⏰</div>
                  <div class="tipename">Terlambat Selesai</div>
                </div>
              </td>
              <td>
                <div class="mc">
                  <div class="mlogo red">🔴</div>
                  <div class="mname">Rapi &amp; Wangi<br/>Laundry</div>
                </div>
              </td>
              <td><div class="oid">#ORD-2024-0506-0022</div></td>
              <td><span class="prio med">Sedang</span></td>
              <td><span class="badge proc">Diproses</span></td>
              <td><div class="tdate">6 Mei 2024</div><div class="ttime">16:45</div></td>
              <td><div class="acell"><button class="abtn v">👁</button><button class="abtn">⋯</button></div></td>
            </tr>

            <!-- Row 7 -->
            <tr onclick="selectRow(this)">
              <td style="text-align:center"><input type="checkbox"/></td>
              <td><div class="cmpid">CMP-2024-0506-0021</div></td>
              <td>
                <div class="plcell">
                  <div class="plav" style="background:linear-gradient(135deg,#4F46E5,#7C3AED)">DS</div>
                  <div>
                    <div class="plname">Dimas Saputra</div>
                    <div class="plphone">0811-2233-4455</div>
                  </div>
                </div>
              </td>
              <td>
                <div class="tipecell">
                  <div class="tipe-ico green">🏷️</div>
                  <div class="tipename">Harga Tidak Sesuai</div>
                </div>
              </td>
              <td>
                <div class="mc">
                  <div class="mlogo indigo">📍</div>
                  <div class="mname">Super Laundry<br/>Express</div>
                </div>
              </td>
              <td><div class="oid">#ORD-2024-0506-0021</div></td>
              <td><span class="prio low">Rendah</span></td>
              <td><span class="badge done">Selesai</span></td>
              <td><div class="tdate">6 Mei 2024</div><div class="ttime">13:30</div></td>
              <td><div class="acell"><button class="abtn v">👁</button><button class="abtn">⋯</button></div></td>
            </tr>

            <!-- Row 8 -->
            <tr onclick="selectRow(this)">
              <td style="text-align:center"><input type="checkbox"/></td>
              <td><div class="cmpid">CMP-2024-0505-0018</div></td>
              <td>
                <div class="plcell">
                  <div class="plav" style="background:linear-gradient(135deg,#06B6D4,#2563EB)">HW</div>
                  <div>
                    <div class="plname">Hendra Wijaya</div>
                    <div class="plphone">0812-6677-8899</div>
                  </div>
                </div>
              </td>
              <td>
                <div class="tipecell">
                  <div class="tipe-ico gray">⋯</div>
                  <div class="tipename">Lainnya</div>
                </div>
              </td>
              <td>
                <div class="mc">
                  <div class="mlogo cyan">🔷</div>
                  <div class="mname">Laundry Baik Hati</div>
                </div>
              </td>
              <td><div class="oid">#ORD-2024-0505-0018</div></td>
              <td><span class="prio low">Rendah</span></td>
              <td><span class="badge rej">Ditolak</span></td>
              <td><div class="tdate">5 Mei 2024</div><div class="ttime">09:10</div></td>
              <td><div class="acell"><button class="abtn v">👁</button><button class="abtn">⋯</button></div></td>
            </tr>

          </tbody>
        </table>
      </div>

      <!-- PAGINATION -->
      <div class="pagibar">
        <div class="pginfo">Menampilkan 1 – 8 dari 186 data</div>
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
            <button class="pgb">19</button>
            <button class="pgb nav">›</button>
          </div>
        </div>
      </div>

    </div><!-- /content -->

    <!-- ══════════ DETAIL PANEL ══════════ -->
    <aside class="detail" id="detailPanel">
      <div class="dethdr">
        <h3>Detail Komplain</h3>
        <button class="cbtn" id="closeDetail">✕</button>
      </div>

      <div class="detbody">

        <!-- Hero -->
        <div class="d-hero">
          <div class="d-status-badge">Menunggu Tindak Lanjut</div>
          <div class="d-cmpid">CMP-2024-0508-0001</div>
          <div class="d-created">Dibuat: 8 Mei 2024, 09:20</div>
        </div>

        <!-- Informasi Pelapor -->
        <div class="dsec">
          <div class="dsec-title"><div class="si blue">👤</div> Informasi Pelapor</div>
          <div class="drows">
            <div class="drow">
              <span class="drow-l">Nama</span>
              <span class="drow-r">Andi Pratama</span>
            </div>
            <div class="drow">
              <span class="drow-l">No. WhatsApp</span>
              <span class="drow-r">0812-3456-7890 📱</span>
            </div>
            <div class="drow">
              <span class="drow-l">Email</span>
              <span class="drow-r">andi.pratama@email.com</span>
            </div>
            <div class="drow">
              <span class="drow-l">Alamat</span>
              <span class="drow-r">Jl. Melati No. 12, Cipete Jakarta Selatan</span>
            </div>
          </div>
        </div>

        <!-- Informasi Order -->
        <div class="dsec">
          <div class="dsec-title"><div class="si green">🛒</div> Informasi Order</div>
          <div class="drows">
            <div class="drow">
              <span class="drow-l">Order ID</span>
              <span class="drow-r primary">#ORD-2024-0508-0001</span>
            </div>
            <div class="drow">
              <span class="drow-l">Mitra Laundry</span>
              <span class="drow-r">Laundry Bersih Sejahtera</span>
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

        <!-- Tipe & Prioritas -->
        <div class="dsec">
          <div class="dsec-title"><div class="si orange">⚠️</div> Tipe &amp; Prioritas</div>
          <div class="tp-grid">
            <div class="tp-row">
              <span class="tp-label">Tipe Laporan</span>
              <span class="tp-val">Pakaian Rusak</span>
            </div>
            <div class="tp-row">
              <span class="tp-label">Prioritas</span>
              <span class="prio high">Tinggi</span>
            </div>
          </div>
        </div>

        <!-- Deskripsi Laporan -->
        <div class="dsec">
          <div class="dsec-title"><div class="si red">📝</div> Deskripsi Laporan</div>
          <div class="desc-text">
            Pakaian saya (kemeja putih) rusak pada bagian lengan setelah dicuci. Mohon ganti rugi atau perbaikan.
          </div>
          <div class="photos">
            <div class="photo-thumb">🖼️</div>
            <div class="photo-thumb">👔</div>
            <div class="photo-thumb">🧥</div>
          </div>
          <div class="lampiran-row">
            <div class="lmp-left">📎 Lampiran <span class="lmp-count">3 file</span></div>
            <span class="lmp-toggle">Lihat semua ▾</span>
          </div>
        </div>

        <!-- Aksi section label (in body) -->
        <div class="dsec">
          <div class="dsec-title"><div class="si blue">⚡</div> Aksi</div>
        </div>

      </div><!-- /detbody -->

      <!-- Footer -->
      <div class="detfoot">
        <div class="foot-row">
          <button class="btn-proc">▶ Proses Laporan</button>
          <button class="btn-info">💬 Minta Info Tambahan</button>
        </div>
        <button class="btn-reject">✕ Tolak Laporan</button>
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