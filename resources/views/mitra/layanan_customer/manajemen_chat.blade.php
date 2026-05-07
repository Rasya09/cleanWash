@extends('mitra.layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/mitra/manajemen_chat.css') }}">
@endsection

@section('content')
<!-- ═══════════════════ MAIN ═══════════════════ -->
<div class="main-wrap">

  <!-- CONTENT -->
  <main class="content">

    <!-- Page Header -->
    <div class="page-header">
      <div>
        <h1>Manajemen Chat</h1>
        <p>Kelola semua percakapan dengan pelanggan Anda</p>
      </div>
      <button class="btn-settings">⚙️ Pengaturan Auto Reply</button>
    </div>

    <!-- ══════════ CHAT LAYOUT ══════════ -->
    <div class="chat-layout">

      <!-- LEFT: Daftar Chat -->
      <div class="chat-list-panel">
        <div class="chat-list-header">
          <div class="chat-list-title">
            <h2>Daftar Chat <span class="chat-count">12</span></h2>
            <div class="chat-list-actions">
              <button class="icon-btn" title="Filter">⚙️</button>
              <button class="icon-btn" title="Cari">🔍</button>
            </div>
          </div>
          <div class="chat-tabs">
            <button class="chat-tab active">Semua <span class="tab-badge">12</span></button>
            <button class="chat-tab">Belum Dibalas <span class="tab-badge orange">5</span></button>
            <button class="chat-tab">Selesai</button>
          </div>
        </div>

        <div class="chat-list-body">

          <!-- Item 1 – active -->
          <div class="chat-item active">
            <div class="chat-avatar ca-blue">AS</div>
            <div class="chat-item-body">
              <div class="chat-item-top">
                <span class="chat-name">Andi Setiawan</span>
                <span class="chat-time">10:30</span>
              </div>
              <div style="display:flex;align-items:center;gap:6px;">
                <span class="new-badge">● Baru</span>
              </div>
              <div class="chat-preview">Halo, apakah cucian saya sudah selesai?</div>
            </div>
            <div class="unread-dot">2</div>
          </div>

          <!-- Item 2 -->
          <div class="chat-item">
            <div class="chat-avatar ca-pink">DN</div>
            <div class="chat-item-body">
              <div class="chat-item-top">
                <span class="chat-name">Dewi Nur A.</span>
                <span class="chat-time">09:45</span>
              </div>
              <div class="chat-preview">Terima kasih, pelayanannya bagus 👍</div>
            </div>
          </div>

          <!-- Item 3 -->
          <div class="chat-item">
            <div class="chat-avatar ca-green">RM</div>
            <div class="chat-item-body">
              <div class="chat-item-top">
                <span class="chat-name">Rizky Maulana</span>
                <span class="chat-time">09:30</span>
              </div>
              <div class="chat-preview">Bisa minta foto cuciannya sebelum dikirim?</div>
            </div>
            <div class="unread-dot">1</div>
          </div>

          <!-- Item 4 -->
          <div class="chat-item">
            <div class="chat-avatar ca-purple">SF</div>
            <div class="chat-item-body">
              <div class="chat-item-top">
                <span class="chat-name">Siti Fatimah</span>
                <span class="chat-time">08:50</span>
              </div>
              <div class="chat-preview">Kapan kurir akan pickup ya?</div>
            </div>
          </div>

          <!-- Item 5 -->
          <div class="chat-item">
            <div class="chat-avatar ca-indigo">BS</div>
            <div class="chat-item-body">
              <div class="chat-item-top">
                <span class="chat-name">Budi Santoso</span>
                <span class="chat-time">Kemarin</span>
              </div>
              <div class="chat-preview">Apakah ada promo bulan ini?</div>
            </div>
            <div class="unread-dot">2</div>
          </div>

          <!-- Item 6 -->
          <div class="chat-item">
            <div class="chat-avatar ca-gray-text">N</div>
            <div class="chat-item-body">
              <div class="chat-item-top">
                <span class="chat-name">Nanda Pratama</span>
                <span class="chat-time">Kemarin</span>
              </div>
              <div class="chat-preview">Baik, ditunggu ya kak 🙏</div>
            </div>
          </div>

          <!-- Item 7 -->
          <div class="chat-item">
            <div class="chat-avatar ca-teal">YP</div>
            <div class="chat-item-body">
              <div class="chat-item-top">
                <span class="chat-name">Yuliana Putri</span>
                <span class="chat-time">2 Hari lalu</span>
              </div>
              <div class="chat-preview">Cucian saya ada noda, bisa dibantu?</div>
            </div>
            <div class="unread-dot">1</div>
          </div>

          <!-- Item 8 -->
          <div class="chat-item">
            <div class="chat-avatar ca-orange">FR</div>
            <div class="chat-item-body">
              <div class="chat-item-top">
                <span class="chat-name">Fajar Ramadhan</span>
                <span class="chat-time">2 Hari lalu</span>
              </div>
              <div class="chat-preview">Terima kasih banyak!</div>
            </div>
          </div>

          <div class="load-more">Muat lebih banyak ▾</div>
        </div>
      </div>

      <!-- CENTER: Chat Window -->
      <div class="chat-window">

        <!-- Contact Bar -->
        <div class="chat-contact-bar">
          <div class="contact-avatar">AS</div>
          <div class="contact-info">
            <div class="contact-name">
              <strong>Andi Setiawan</strong>
              <span class="pelanggan-badge">Pelanggan</span>
            </div>
            <div class="contact-sub">Pelanggan sejak Mei 2024</div>
          </div>
          <div class="contact-stats">
            <div class="cstat">
              <div class="cslabel">Total Pesanan</div>
              <div class="csval">5 pesanan</div>
            </div>
            <div class="cstat">
              <div class="cslabel">Total Belanja</div>
              <div class="csval">Rp450.000</div>
            </div>
          </div>
        </div>

        <!-- Order Bar -->
        <div class="order-bar">
          <span>Pesanan #INV-2405-0132</span>
          <span class="dot">•</span>
          <span>Pickup: 20 Mei 2024</span>
          <span class="dot">•</span>
          <span>3 Item</span>
          <span class="dot">•</span>
          <span>Total: Rp65.000</span>
          <button class="detail-link">Lihat Detail Pesanan</button>
        </div>

        <!-- Messages -->
        <div class="messages-area" id="messagesArea">

          <div class="day-label">Hari ini</div>

          <!-- Received -->
          <div class="msg-row">
            <div class="msg-avatar">AS</div>
            <div>
              <div class="msg-bubble received">
                Halo, apakah cucian saya sudah selesai ya?<br>
                Kira-kira kapan bisa di pickup?
              </div>
              <div class="msg-meta">10:30</div>
            </div>
          </div>

          <!-- Sent -->
          <div class="msg-row sent">
            <div>
              <div class="msg-bubble sent">
                Halo kak Andi, terima kasih telah menghubungi Laundry Bersih Jaya 😊<br><br>
                Cucian kakak sedang dalam proses finishing ya.<br><br>
                Estimasi selesai hari ini jam 16.00. Kurir akan pickup setelahnya.
              </div>
              <div class="msg-meta">10:32 <span class="msg-check">✓✓</span></div>
            </div>
            <div class="msg-avatar store">🏪</div>
          </div>

          <!-- Received -->
          <div class="msg-row">
            <div class="msg-avatar">AS</div>
            <div>
              <div class="msg-bubble received">
                Baik kak, terima kasih informasinya 🙏
              </div>
              <div class="msg-meta">10:33</div>
            </div>
          </div>

          <!-- Sent -->
          <div class="msg-row sent">
            <div>
              <div class="msg-bubble sent">
                Sama-sama kak, ditunggu ya 😊
              </div>
              <div class="msg-meta">10:33 <span class="msg-check">✓✓</span></div>
            </div>
            <div class="msg-avatar store">🏪</div>
          </div>

        </div>

        <!-- Input Area -->
        <div class="chat-input-area">
          <div class="quick-tabs">
            <button class="quick-tab active">⚡ Balasan Cepat</button>
            <button class="quick-tab">📝 Catatan</button>
          </div>
          <div class="quick-replies">
            <button class="quick-reply">Pesanan sedang diproses</button>
            <button class="quick-reply">Estimasi selesai hari ini</button>
            <button class="quick-reply">Kurir akan pickup segera</button>
            <button class="quick-reply">Terima kasih</button>
          </div>
          <div class="input-row">
            <input class="msg-input" type="text" placeholder="Tulis pesan..." id="msgInput">
            <div class="input-icons">
              <span class="input-icon" title="Emoji">😊</span>
              <span class="input-icon" title="Lampiran">📎</span>
            </div>
            <button class="send-btn" onclick="sendMessage()">✈ Kirim</button>
          </div>
        </div>

      </div>

      <!-- RIGHT: Profile Panel -->
      <div class="profile-panel">

        <div class="profile-top">
          <button class="btn-profile">👤 Lihat Profil</button>
        </div>

        <!-- Informasi Pelanggan -->
        <div class="info-section">
          <h4>Informasi Pelanggan</h4>
          <div class="info-row"><span class="info-icon">👤</span> Andi Setiawan</div>
          <div class="info-row">
            <span class="info-icon">📞</span>
            0812-3456-7890
            <span class="info-wa">●</span>
          </div>
          <div class="info-row"><span class="info-icon">✉️</span> andi.setiawan@email.com</div>
          <div class="info-row"><span class="info-icon">📍</span> Jl. Melati No.12, RT 02/RW 05 Jakarta Selatan</div>
        </div>

        <!-- Riwayat Pesanan -->
        <div class="info-section">
          <div class="riwayat-header">
            <h4>Riwayat Pesanan</h4>
            <span class="lihat-semua">Lihat Semua</span>
          </div>

          <div class="order-item">
            <div class="order-left">
              <div class="order-id">#INV-2405-0132</div>
              <div class="order-date">20 Mei 2024</div>
            </div>
            <div class="order-right">
              <div class="order-status os-diproses">Diproses</div>
              <div class="order-amount">Rp65.000</div>
            </div>
          </div>

          <div class="order-item">
            <div class="order-left">
              <div class="order-id">#INV-2405-0101</div>
              <div class="order-date">15 Mei 2024</div>
            </div>
            <div class="order-right">
              <div class="order-status os-selesai">Selesai</div>
              <div class="order-amount">Rp75.000</div>
            </div>
          </div>

          <div class="order-item">
            <div class="order-left">
              <div class="order-id">#INV-2405-0067</div>
              <div class="order-date">8 Mei 2024</div>
            </div>
            <div class="order-right">
              <div class="order-status os-selesai">Selesai</div>
              <div class="order-amount">Rp60.000</div>
            </div>
          </div>

          <div class="order-item">
            <div class="order-left">
              <div class="order-id">#INV-2405-0023</div>
              <div class="order-date">1 Mei 2024</div>
            </div>
            <div class="order-right">
              <div class="order-status os-selesai">Selesai</div>
              <div class="order-amount">Rp80.000</div>
            </div>
          </div>

          <div class="order-item">
            <div class="order-left">
              <div class="order-id">#INV-2404-0288</div>
              <div class="order-date">25 Apr 2024</div>
            </div>
            <div class="order-right">
              <div class="order-status os-selesai">Selesai</div>
              <div class="order-amount">Rp70.000</div>
            </div>
          </div>

        </div>

        <!-- Catatan Pelanggan -->
        <div class="info-section">
          <div class="catatan-header">
            <h4>Catatan Pelanggan</h4>
            <span class="add-catatan">＋ Tambah Catatan</span>
          </div>
          <div class="catatan-box">
            Pelanggan ramah dan sering menggunakan layanan cuci kiloan.
            <div class="catatan-meta">Dicatat oleh Anda · 15 Mei 2024</div>
          </div>
        </div>

      </div>
    </div><!-- end chat-layout -->

  </main>
</div>
@endsection

@push('scripts')
    <script>
  // Tab switching – chat list
  document.querySelectorAll('.chat-tab').forEach(tab => {
    tab.addEventListener('click', () => {
      document.querySelectorAll('.chat-tab').forEach(t => t.classList.remove('active'));
      tab.classList.add('active');
    });
  });

  // Tab switching – quick reply / catatan
  document.querySelectorAll('.quick-tab').forEach(tab => {
    tab.addEventListener('click', () => {
      document.querySelectorAll('.quick-tab').forEach(t => t.classList.remove('active'));
      tab.classList.add('active');
    });
  });

  // Quick reply click
  document.querySelectorAll('.quick-reply').forEach(btn => {
    btn.addEventListener('click', () => {
      document.getElementById('msgInput').value = btn.textContent;
      document.getElementById('msgInput').focus();
    });
  });

  // Chat item click
  document.querySelectorAll('.chat-item').forEach(item => {
    item.addEventListener('click', () => {
      document.querySelectorAll('.chat-item').forEach(i => i.classList.remove('active'));
      item.classList.add('active');
      const dot = item.querySelector('.unread-dot');
      if (dot) dot.remove();
    });
  });

  // Send message
  function sendMessage() {
    const input = document.getElementById('msgInput');
    const text = input.value.trim();
    if (!text) return;

    const area = document.getElementById('messagesArea');
    const now = new Date();
    const time = now.getHours().toString().padStart(2,'0') + ':' + now.getMinutes().toString().padStart(2,'0');

    const row = document.createElement('div');
    row.className = 'msg-row sent';
    row.innerHTML = `
      <div>
        <div class="msg-bubble sent">${text.replace(/\n/g,'<br>')}</div>
        <div class="msg-meta">${time} <span class="msg-check">✓✓</span></div>
      </div>
      <div class="msg-avatar store">🏪</div>
    `;
    area.appendChild(row);
    area.scrollTop = area.scrollHeight;
    input.value = '';
  }

  document.getElementById('msgInput').addEventListener('keydown', e => {
    if (e.key === 'Enter' && !e.shiftKey) { e.preventDefault(); sendMessage(); }
  });

  // Auto scroll to bottom
  const area = document.getElementById('messagesArea');
  area.scrollTop = area.scrollHeight;
</script>
@endpush
