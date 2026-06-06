@extends('user.layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/chat.css') }}?v={{ time() }}">
@endsection

@section('content')
<!-- Chat Container -->
<div class="chat-wrapper">

  <!-- Sidebar Overlay for Mobile -->
  <div class="chat-sidebar-overlay" id="userSidebarOverlay" onclick="toggleUserSidebar()"></div>

  <!-- LEFT: Sidebar -->
  <div class="chat-sidebar">
    <div class="chat-sidebar-header">
      <a href="{{ url('/') }}" class="btn-kembali">
        <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
        Kembali
      </a>
      <div class="chat-search">
        <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
        <input type="text" placeholder="Cari percakapan...">
      </div>
    </div>

      <!-- Contact List -->
      <div class="chat-contact-list">
        
        <!-- Active Contact -->
        <div class="chat-contact-item active">
          <div class="contact-avatar-wrapper">
            <div class="contact-avatar">
              <span class="material-symbols-outlined" style="font-size: 24px; color: #9CA3AF;">store</span>
            </div>
            <div class="online-dot"></div>
          </div>
          <div class="contact-info">
            <div class="contact-name-row">
              <span class="contact-name">{{ $contact->name ?? 'Mitra Laundry' }}</span>
              <span class="contact-time">Aktif</span>
            </div>
            <div class="contact-msg-row">
              <span class="contact-preview">Klik untuk mulai obrolan</span>
            </div>
          </div>
        </div>

      </div>
  </div>

  <!-- RIGHT: Main Chat Area -->
  <div class="chat-main">
    
    <!-- Header -->
    <div class="chat-header">
      <div class="chat-header-left">
        <!-- Mobile Toggle Button -->
        <button class="mobile-toggle-btn" onclick="toggleUserSidebar()">
          <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/></svg>
        </button>
        <div class="contact-avatar">
          <span class="material-symbols-outlined" style="font-size: 24px; color: #9CA3AF;">store</span>
        </div>
        <div class="chat-header-title">
            <div class="chat-header-name">{{ $contact->name ?? 'Mitra Laundry' }}</div>
            <div class="chat-header-status">Online</div>
        </div>
      </div>
      <div class="chat-header-actions">
        <!-- Phone -->
        <button class="header-action-btn">
          <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
        </button>
        <!-- Video -->
        <button class="header-action-btn">
          <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
        </button>
        <!-- Info -->
        <button class="header-action-btn">
          <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        </button>
        <!-- More -->
        <button class="header-action-btn">
          <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"/></svg>
        </button>
      </div>
    </div>

    <!-- Messages -->
    <div class="chat-messages" id="chatMessagesArea">
      
      <div class="chat-date-separator"><span>Hari ini</span></div>

      <!-- Received -->
      <div class="msg-wrapper received">
        <div class="msg-avatar"></div>
        <div class="msg-content">
          <div class="msg-bubble received">
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to m
          </div>
          <div class="msg-meta">10:38</div>
        </div>
      </div>

      <!-- Received -->
      <div class="msg-wrapper received">
        <div class="msg-avatar"></div>
        <div class="msg-content">
          <div class="msg-bubble received">
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the i
          </div>
          <div class="msg-meta">10:39</div>
        </div>
      </div>

      <!-- Sent -->
      <div class="msg-wrapper sent">
        <div class="msg-content">
          <div class="msg-bubble sent">
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to m
          </div>
          <div class="msg-meta">10:41 <span class="msg-check">✓✓</span></div>
        </div>
        <div class="msg-avatar"></div>
      </div>

      <!-- Received -->
      <div class="msg-wrapper received">
        <div class="msg-avatar"></div>
        <div class="msg-content">
          <div class="msg-bubble received">
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the i
          </div>
          <div class="msg-meta">10:42</div>
        </div>
      </div>

      <!-- Sent -->
      <div class="msg-wrapper sent">
        <div class="msg-content">
          <div class="msg-bubble sent">
            Lorem Ipsum is simply dummy text of the printing and
          </div>
          <div class="msg-meta">10:43 <span class="msg-check">✓✓</span></div>
        </div>
        <div class="msg-avatar"></div>
      </div>
      


    </div>

    <!-- Input Area -->
    <div class="chat-input-container">
      <div class="chat-input-wrapper">
        <button class="input-action">
          <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        </button>
        <button class="input-action">
          <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"/></svg>
        </button>
        
        <input type="text" class="chat-input-field" placeholder="Ketik pesan di sini..." id="chatInputField">
        
        <button class="chat-send-btn" onclick="sendUserMessage()">
          <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
        </button>
      </div>
    </div>

  </div>
</div>
@endsection

@push('scripts')
<script>
  const currentUserId = document.querySelector('meta[name="user-id"]').content;
  const messagesArea = document.getElementById('chatMessagesArea');
  const input = document.getElementById('chatInputField');

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
    div.className = 'msg-wrapper ' + (isSent ? 'sent' : 'received');
    
    let innerHTML = '';
    if (isSent) {
      innerHTML = `
        <div class="msg-content">
          <div class="msg-bubble sent">${msg.message.replace(/\n/g, '<br>')}</div>
          <div class="msg-meta">${time} <span class="msg-check">✓✓</span></div>
        </div>
        <div class="msg-avatar"></div>
      `;
    } else {
      innerHTML = `
        <div class="msg-avatar"></div>
        <div class="msg-content">
          <div class="msg-bubble received">${msg.message.replace(/\n/g, '<br>')}</div>
          <div class="msg-meta">${time}</div>
        </div>
      `;
    }
    
    div.innerHTML = innerHTML;
    
    // Check if typing indicator exists
    const typingIndicator = messagesArea.querySelector('.typing-indicator');
    if (typingIndicator) {
      messagesArea.insertBefore(div, typingIndicator);
    } else {
      messagesArea.appendChild(div);
    }
    messagesArea.scrollTop = messagesArea.scrollHeight;
  }

  // Fetch past messages
  async function loadMessages() {
    try {
      const res = await fetch('/chat/messages');
      const data = await res.json();
      
      // Clear dummy messages (keep the date separator if you want, but here we just clear all)
      messagesArea.innerHTML = '<div class="chat-date-separator"><span>Hari ini</span></div>';
      
      data.messages.forEach(msg => renderMessage(msg));
    } catch (e) {
      console.error('Error loading messages', e);
    }
  }

  // Send message
  async function sendUserMessage() {
    const text = input.value.trim();
    if (!text) return;
    
    // Optimistic UI update could go here, but since we want to be sure it's saved, 
    // we just send it to backend. Or we render it immediately with a "sending" state.
    const tempMsg = {
      sender_id: currentUserId,
      message: text,
      created_at: new Date().toISOString()
    };
    renderMessage(tempMsg);
    input.value = '';

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

  input.addEventListener('keydown', function(e) {
    if(e.key === 'Enter' && !e.shiftKey) {
      e.preventDefault();
      sendUserMessage();
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
      }, 1000); // Wait for Echo to initialize via Vite app.js
  });

  // Mobile sidebar toggle logic
  function toggleUserSidebar() {
    document.querySelector('.chat-sidebar').classList.toggle('open');
    document.getElementById('userSidebarOverlay').classList.toggle('active');
  }
</script>
@endpush