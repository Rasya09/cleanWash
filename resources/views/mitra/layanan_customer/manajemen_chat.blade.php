@extends('mitra.layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/mitra/manajemen_chat.css') }}?v={{ time() }}">
@endsection

@section('content')
<!-- ═══════════════════ MAIN ═══════════════════ -->
<div class="main-wrap">

  <!-- CONTENT -->
  <main class="content">

    <!-- Page Header -->
    {{-- <div class="page-header">
      <div>
        <h1>Manajemen Chat</h1>
        <p>Kelola semua percakapan dengan pelanggan Anda</p>
      </div>
      <button class="btn-settings">⚙️ Pengaturan Auto Reply</button>
    </div> --}}

    <!-- ══════════ CHAT LAYOUT ══════════ -->
    <div class="chat-layout">
      <!-- Mobile Overlays -->
      <div class="panel-overlay" id="leftOverlay" onclick="toggleLeftPanel()"></div>
      <div class="panel-overlay" id="rightOverlay" onclick="toggleRightPanel()"></div>

      <!-- LEFT: Daftar Chat -->
      <div class="chat-list-panel">
        <div class="chat-list-header">
          <div class="chat-list-title">
            <h2>Daftar Chat</h2>
            <div class="chat-list-actions">
              <button class="icon-btn" title="Filter">⚙️</button>
              <button class="icon-btn" title="Cari">🔍</button>
            </div>
          </div>
          <div class="chat-tabs">
            <button class="chat-tab active">Semua</button>
            <button class="chat-tab">Belum Dibalas</button>
            <button class="chat-tab">Selesai</button>
          </div>
        </div>

        <div class="chat-list-body">
          <div class="chat-item active">
            <div class="chat-avatar ca-blue">U</div>
            <div class="chat-item-body">
              <div class="chat-item-top">
                <span class="chat-name">{{ $contact->name ?? 'User' }}</span>
              </div>
              <div class="chat-preview">Pelanggan Aktif</div>
            </div>
          </div>
        </div>
      </div>

      <!-- CENTER: Chat Window -->
      <div class="chat-window">

        <!-- Contact Bar -->
        <div class="chat-contact-bar">
          <button class="mobile-btn-left" onclick="toggleLeftPanel()">
            <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/></svg>
          </button>
          <div class="contact-avatar">U</div>
          <div class="contact-info">
            <div class="contact-name">
              <strong>{{ $contact->name ?? 'User' }}</strong>
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
          <button class="mobile-btn-right" onclick="toggleRightPanel()">
            <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
          </button>
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
          <div class="emoji-picker" id="emojiPicker">
            <button class="emoji-btn" onclick="insertEmoji('😊')">😊</button>
            <button class="emoji-btn" onclick="insertEmoji('😂')">😂</button>
            <button class="emoji-btn" onclick="insertEmoji('👍')">👍</button>
            <button class="emoji-btn" onclick="insertEmoji('🙏')">🙏</button>
            <button class="emoji-btn" onclick="insertEmoji('🥰')">🥰</button>
            <button class="emoji-btn" onclick="insertEmoji('😎')">😎</button>
            <button class="emoji-btn" onclick="insertEmoji('🤔')">🤔</button>
            <button class="emoji-btn" onclick="insertEmoji('😭')">😭</button>
            <button class="emoji-btn" onclick="insertEmoji('🔥')">🔥</button>
            <button class="emoji-btn" onclick="insertEmoji('✨')">✨</button>
          </div>
          <div class="input-row">
            <input class="msg-input" type="text" placeholder="Tulis pesan..." id="msgInput">
            <div class="input-icons">
              <span class="input-icon" title="Emoji" onclick="toggleEmojiPicker()">😊</span>
              <span class="input-icon" title="Lampiran" onclick="document.getElementById('fileAttachment').click()">📎</span>
              <input type="file" id="fileAttachment" style="display:none" onchange="handleFileUpload(event)">
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
          <div class="info-row"><span class="info-icon">👤</span> {{ $contact->name ?? 'User' }}</div>
          <div class="info-row">
            <span class="info-icon">📞</span>
            {{ $contact->phone ?? '-' }}
            <span class="info-wa">●</span>
          </div>
          <div class="info-row"><span class="info-icon">✉️</span> {{ $contact->email ?? '-' }}</div>
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
  const currentUserId = document.querySelector('meta[name="user-id"]').content;
  const area = document.getElementById('messagesArea');
  const msgInput = document.getElementById('msgInput');

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
      insertQuickReply(btn);
    });
  });

  // Format time HH:MM
  function formatTime(dateStr) {
    const d = new Date(dateStr);
    return d.getHours().toString().padStart(2,'0') + ':' + d.getMinutes().toString().padStart(2,'0');
  }

  // Render a single message bubble
  function renderMessage(msg) {
    const isSent = msg.sender_id == currentUserId;
    const time = formatTime(msg.created_at);
    
    const div = document.createElement('div');
    div.className = 'msg-row ' + (isSent ? 'sent' : '');
    
    let innerHTML = '';
    if (isSent) {
      innerHTML = `
        <div>
          <div class="msg-bubble sent">${msg.message.replace(/\n/g, '<br>')}</div>
          <div class="msg-meta">${time} <span class="msg-check">✓✓</span></div>
        </div>
        <div class="msg-avatar store">🏪</div>
      `;
    } else {
      innerHTML = `
        <div class="msg-avatar">C</div>
        <div>
          <div class="msg-bubble received">${msg.message.replace(/\n/g, '<br>')}</div>
          <div class="msg-meta">${time}</div>
        </div>
      `;
    }
    
    div.innerHTML = innerHTML;
    area.appendChild(div);
    area.scrollTop = area.scrollHeight;
  }

  // Fetch past messages
  async function loadMessages() {
    try {
      const res = await fetch('/chat/messages');
      const data = await res.json();
      
      area.innerHTML = '';
      data.messages.forEach(msg => renderMessage(msg));
    } catch (e) {
      console.error('Error loading messages', e);
    }
  }

  // Send message
  async function sendMessage() {
    const text = msgInput.value.trim();
    if (!text) return;
    
    const tempMsg = {
      sender_id: currentUserId,
      message: text,
      created_at: new Date().toISOString()
    };
    renderMessage(tempMsg);
    msgInput.value = '';

    try {
      const token = document.querySelector('meta[name="csrf-token"]').content;
      await fetch('/chat/send', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': token,
          'Accept': 'application/json'
        },
        body: JSON.stringify({ message: text })
      });
    } catch (e) {
      console.error('Error sending message', e);
    }
  }

  msgInput.addEventListener('keydown', function(e) {
    if(e.key === 'Enter' && !e.shiftKey) {
      e.preventDefault();
      sendMessage();
    }
  });

  // Init
  loadMessages();

  // Listen to Reverb Websocket
  document.addEventListener("DOMContentLoaded", () => {
      setTimeout(() => {
          if (window.Echo) {
              window.Echo.private(`chat.${currentUserId}`)
                  .listen('.message.sent', (e) => {
                      renderMessage(e.message);
                  });
          }
      }, 1000); 
  });

  function insertQuickReply(btn) {
    msgInput.value = btn.innerText;
    msgInput.focus();
  }

  function toggleEmojiPicker() {
    document.getElementById('emojiPicker').classList.toggle('active');
  }

  function insertEmoji(emoji) {
    msgInput.value += emoji;
    msgInput.focus();
    toggleEmojiPicker(); 
  }

  function handleFileUpload(event) {
    const file = event.target.files[0];
    if(file) {
      msgInput.value = `[File: ${file.name}]`;
      sendMessage();
    }
  }

  // Mobile sidebar logic
  function toggleLeftPanel() {
    document.querySelector('.chat-list-panel').classList.toggle('open');
    document.getElementById('leftOverlay').classList.toggle('active');
  }
  function toggleRightPanel() {
    document.querySelector('.profile-panel').classList.toggle('open');
    document.getElementById('rightOverlay').classList.toggle('active');
  }

  // Auto scroll to bottom
  if(area) area.scrollTop = area.scrollHeight;
</script>
@endpush
