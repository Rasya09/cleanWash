@extends('mitra.layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/mitra/manajemen_chat.css') }}?v={{ time() }}">
<style>
  .contact-action-btn {
    background: none;
    border: none;
    color: #ef4444;
    cursor: pointer;
    padding: 4px;
    border-radius: 4px;
    display: none;
  }
  .chat-item:hover .contact-action-btn {
    display: block;
  }
  .chat-item.active {
    background-color: #f3f4f6;
  }
  .empty-state {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 100%;
    color: #6b7280;
    text-align: center;
    padding: 20px;
  }
  .chat-item-top {
    display: flex;
    justify-content: space-between;
    align-items: center;
  }
</style>
@endsection

@section('content')
<div class="main-wrap">

  <main class="content">

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

        <div class="chat-list-body" id="contactList">
          @forelse($contacts as $contact)
          <div class="chat-item" id="contact-{{ $contact->id }}" onclick="selectContact({{ $contact->id }}, '{{ $contact->name }}', '{{ $contact->email }}', '{{ $contact->phone ?? '-' }}')">
            <div class="chat-avatar ca-blue">{{ strtoupper(substr($contact->name, 0, 1)) }}</div>
            <div class="chat-item-body">
              <div class="chat-item-top">
                <span class="chat-name">{{ $contact->name }}</span>
                <span class="chat-time" id="time-{{ $contact->id }}" style="font-size: 11px; color: #9ca3af;">
                  {{ $contact->latest_message ? \Carbon\Carbon::parse($contact->latest_message->created_at)->format('H:i') : '' }}
                </span>
              </div>
              <div class="chat-item-top">
                <div class="chat-preview" id="preview-{{ $contact->id }}">{{ $contact->latest_message ? $contact->latest_message->message : 'Mulai obrolan baru' }}</div>
                <button class="contact-action-btn" onclick="deleteChat(event, {{ $contact->id }})" title="Hapus Percakapan">
                  <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                </button>
              </div>
            </div>
          </div>
          @empty
          <div style="padding: 20px; text-align: center; color: #9ca3af; font-size: 14px;">Belum ada percakapan.</div>
          @endforelse
        </div>
      </div>

      <!-- CENTER: Chat Window -->
      <div class="chat-window">

        <!-- Contact Bar -->
        <div class="chat-contact-bar">
          <button class="mobile-btn-left" onclick="toggleLeftPanel()">
            <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/></svg>
          </button>
          <div class="contact-avatar" id="activeAvatar">U</div>
          <div class="contact-info">
            <div class="contact-name">
              <strong id="activeContactName">Pilih kontak</strong>
              <span class="pelanggan-badge">Pelanggan</span>
            </div>
            <div class="contact-sub">Pilih kontak di samping untuk memulai</div>
          </div>
          <div class="contact-stats">
            <div class="cstat">
              <div class="cslabel">Total Pesanan</div>
              <div class="csval">-</div>
            </div>
            <div class="cstat">
              <div class="cslabel">Total Belanja</div>
              <div class="csval">-</div>
            </div>
          </div>
          <button class="mobile-btn-right" onclick="toggleRightPanel()">
            <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
          </button>
        </div>

        <!-- Messages -->
        <div class="messages-area" id="messagesArea">
          <div class="empty-state">Silakan pilih kontak di sidebar untuk mulai mengobrol.</div>
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
            <input class="msg-input" type="text" placeholder="Tulis pesan..." id="msgInput" disabled>
            <div class="input-icons">
              <span class="input-icon" title="Emoji" onclick="toggleEmojiPicker()">😊</span>
            </div>
            <button class="send-btn" onclick="sendMessage()" id="chatSendBtn" disabled>✈ Kirim</button>
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
          <div class="info-row"><span class="info-icon">👤</span> <span id="rightPanelName">Nama Pelanggan</span></div>
          <div class="info-row">
            <span class="info-icon">📞</span>
            <span id="rightPanelPhone">-</span>
            <span class="info-wa">●</span>
          </div>
          <div class="info-row"><span class="info-icon">✉️</span> <span id="rightPanelEmail">-</span></div>
        </div>

        <!-- Riwayat Pesanan -->
        <div class="info-section">
          <div class="catatan-header">
            <h4>Riwayat Pesanan</h4>
            <a href="#" id="viewAllOrdersBtn" class="add-catatan" style="text-decoration:none;">Lihat Semua</a>
          </div>
          <div class="catatan-box" id="orderHistoryContainer" style="padding: 0;">
            <div style="padding: 14px;">Memuat riwayat...</div>
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
  const sendBtn = document.getElementById('chatSendBtn');
  
  const activeContactNameEl = document.getElementById('activeContactName');
  const activeAvatarEl = document.getElementById('activeAvatar');
  const rightPanelNameEl = document.getElementById('rightPanelName');
  const rightPanelPhoneEl = document.getElementById('rightPanelPhone');
  const rightPanelEmailEl = document.getElementById('rightPanelEmail');

  let activeContactId = null;
  const initialContactId = "{{ $explicitContactId ?? '' }}";

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
        <div class="msg-avatar">${activeAvatarEl.innerText}</div>
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

  // Select Contact
  async function selectContact(contactId, contactName, contactEmail, contactPhone) {
    activeContactId = contactId;
    
    // Update DOM Immediately for basics
    activeContactNameEl.innerText = contactName;
    const initial = contactName.charAt(0).toUpperCase();
    activeAvatarEl.innerText = initial;
    rightPanelNameEl.innerText = contactName;
    rightPanelEmailEl.innerText = contactEmail;
    rightPanelPhoneEl.innerText = contactPhone;
    
    // Reset stats & history
    document.querySelector('.cstat:nth-child(1) .csval').innerText = '...';
    document.querySelector('.cstat:nth-child(2) .csval').innerText = '...';
    document.getElementById('orderHistoryContainer').innerHTML = '<div style="padding: 14px;">Memuat riwayat...</div>';
    
    // Enable inputs
    msgInput.disabled = false;
    sendBtn.disabled = false;
    
    // Update active class on sidebar
    document.querySelectorAll('.chat-item').forEach(el => el.classList.remove('active'));
    const contactEl = document.getElementById('contact-' + contactId);
    if(contactEl) contactEl.classList.add('active');

    if(window.innerWidth <= 768) {
      toggleLeftPanel(); // Close sidebar on mobile
    }

    loadMessages();

    // Fetch User Details & Order History
    try {
      const res = await fetch(`/chat/user-details/${contactId}`);
      if(res.ok) {
        const data = await res.json();
        
        // Update Stats
        document.querySelector('.cstat:nth-child(1) .csval').innerText = data.stats.total_pesanan;
        document.querySelector('.cstat:nth-child(2) .csval').innerText = 'Rp ' + data.stats.total_belanja.toLocaleString('id-ID');
        
        // Update Email and Phone in case it's more accurate from DB
        rightPanelEmailEl.innerText = data.user.email;
        rightPanelPhoneEl.innerText = data.user.phone;

        // Setup Lihat Semua button
        const viewAllBtn = document.getElementById('viewAllOrdersBtn');
        viewAllBtn.href = `/mitra/pesanan-saya?search=${encodeURIComponent(data.user.name)}`;

        // Render Recent Orders
        const historyContainer = document.getElementById('orderHistoryContainer');
        if(data.recent_orders && data.recent_orders.length > 0) {
            let html = '<div style="display: flex; flex-direction: column;">';
            data.recent_orders.forEach(order => {
                let badgeColor = '#f59e0b'; // pending
                if(order.status === 'Selesai') badgeColor = '#10b981';
                if(order.status === 'Batal') badgeColor = '#ef4444';
                
                html += `
                <div style="padding: 12px 14px; border-bottom: 1px solid #f3f4f6; font-size: 13px;">
                  <div style="display:flex; justify-content:space-between; margin-bottom: 4px;">
                    <span style="font-weight: 600;">${order.order_code}</span>
                    <span style="color: ${badgeColor}; font-weight: 500; font-size: 12px;">${order.status}</span>
                  </div>
                  <div style="display:flex; justify-content:space-between; color: #6b7280; font-size: 12px;">
                    <span>${order.date}</span>
                    <span style="font-weight: 500; color: #374151;">Rp ${order.amount.toLocaleString('id-ID')}</span>
                  </div>
                </div>`;
            });
            html += '</div>';
            historyContainer.innerHTML = html;
        } else {
            historyContainer.innerHTML = '<div style="padding: 14px; text-align: center; color: #9ca3af;">Belum ada riwayat pesanan.</div>';
        }
      }
    } catch (e) {
      console.error('Failed to load user details', e);
      document.getElementById('orderHistoryContainer').innerHTML = '<div style="padding: 14px; color: red;">Gagal memuat data.</div>';
    }
  }

  // Delete Chat
  async function deleteChat(e, contactId) {
    e.stopPropagation();
    if(!confirm("Apakah Anda yakin ingin menghapus seluruh riwayat percakapan ini?")) return;

    try {
      const token = document.querySelector('meta[name="csrf-token"]').content;
      await fetch(`/chat/thread/${contactId}`, {
        method: 'DELETE',
        headers: { 'X-CSRF-TOKEN': token, 'Accept': 'application/json' }
      });
      
      const contactEl = document.getElementById('contact-' + contactId);
      if(contactEl) contactEl.remove();

      if(activeContactId == contactId) {
        activeContactId = null;
        activeContactNameEl.innerText = 'Pilih kontak';
        activeAvatarEl.innerText = 'U';
        msgInput.disabled = true;
        sendBtn.disabled = true;
        area.innerHTML = '<div class="empty-state">Silakan pilih kontak di sidebar untuk mulai mengobrol.</div>';
      }
    } catch (error) {
      console.error('Error deleting chat', error);
      alert('Gagal menghapus percakapan.');
    }
  }

  // Fetch past messages
  async function loadMessages() {
    if(!activeContactId) return;
    
    try {
      const res = await fetch(`/chat/messages/${activeContactId}`);
      const data = await res.json();
      
      area.innerHTML = '<div class="day-label">Hari ini</div>';
      data.messages.forEach(msg => renderMessage(msg));
    } catch (e) {
      console.error('Error loading messages', e);
    }
  }

  // Send message
  async function sendMessage() {
    if(!activeContactId) return;

    const text = msgInput.value.trim();
    if (!text) return;
    
    const tempMsg = {
      sender_id: currentUserId,
      message: text,
      created_at: new Date().toISOString()
    };
    renderMessage(tempMsg);
    msgInput.value = '';

    updateSidebarPreview(activeContactId, text, tempMsg.created_at);

    try {
      const token = document.querySelector('meta[name="csrf-token"]').content;
      await fetch(`/chat/send/${activeContactId}`, {
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

  function updateSidebarPreview(contactId, message, timestamp) {
    const previewEl = document.getElementById('preview-' + contactId);
    const timeEl = document.getElementById('time-' + contactId);
    if(previewEl) previewEl.innerText = message;
    if(timeEl && timestamp) timeEl.innerText = formatTime(timestamp);
  }

  msgInput.addEventListener('keydown', function(e) {
    if(e.key === 'Enter' && !e.shiftKey) {
      e.preventDefault();
      sendMessage();
    }
  });

  // Listen to Reverb Websocket
  document.addEventListener("DOMContentLoaded", () => {
      if(initialContactId) {
          const contactEl = document.getElementById('contact-' + initialContactId);
          if(contactEl) contactEl.click();
      }

      setTimeout(() => {
          if (window.Echo) {
              window.Echo.private(`chat.${currentUserId}`)
                  .listen('.message.sent', (e) => {
                      const msg = e.message;
                      if (msg.sender_id == activeContactId) {
                          renderMessage(msg);
                      }
                      updateSidebarPreview(msg.sender_id, msg.message, msg.created_at);
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

  // Mobile sidebar logic
  function toggleLeftPanel() {
    document.querySelector('.chat-list-panel').classList.toggle('open');
    document.getElementById('leftOverlay').classList.toggle('active');
  }
  function toggleRightPanel() {
    document.querySelector('.profile-panel').classList.toggle('open');
    document.getElementById('rightOverlay').classList.toggle('active');
  }

</script>
@endpush
