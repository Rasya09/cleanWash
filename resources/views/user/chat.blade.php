@extends('user.layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/css/chat.css') }}?v={{ time() }}">
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
  .chat-contact-item:hover .contact-action-btn {
    display: block;
  }
  .chat-contact-item.active {
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
  }
</style>
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
      <div class="chat-contact-list" id="contactList">
        
        @forelse($contacts as $contact)
        <div class="chat-contact-item" id="contact-{{ $contact->id }}" onclick="selectContact({{ $contact->id }}, '{{ $contact->name }}')">
          <div class="contact-avatar-wrapper">
            <div class="contact-avatar">
              <span class="material-symbols-outlined" style="font-size: 24px; color: #9CA3AF;">store</span>
            </div>
            <div class="online-dot"></div>
          </div>
          <div class="contact-info">
            <div class="contact-name-row">
              <span class="contact-name">{{ $contact->name }}</span>
              <span class="contact-time" id="time-{{ $contact->id }}">{{ $contact->latest_message ? \Carbon\Carbon::parse($contact->latest_message->created_at)->format('H:i') : '' }}</span>
            </div>
            <div class="contact-msg-row">
              <span class="contact-preview" id="preview-{{ $contact->id }}">{{ $contact->latest_message ? $contact->latest_message->message : 'Mulai obrolan baru' }}</span>
              <button class="contact-action-btn" onclick="deleteChat(event, {{ $contact->id }})" title="Hapus Percakapan">
                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
              </button>
            </div>
          </div>
        </div>
        @empty
        <div style="padding: 20px; text-align: center; color: #9ca3af; font-size: 14px;">Belum ada percakapan.</div>
        @endforelse

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
            <div class="chat-header-name" id="activeContactName">Pilih kontak</div>
            <div class="chat-header-status">Online</div>
        </div>
      </div>
    </div>

    <!-- Messages -->
    <div class="chat-messages" id="chatMessagesArea">
      <div class="empty-state">Silakan pilih kontak di sidebar untuk mulai mengobrol.</div>
    </div>

    <!-- Input Area -->
    <div class="chat-input-container">
      <div class="chat-input-wrapper">
        <input type="text" class="chat-input-field" placeholder="Ketik pesan di sini..." id="chatInputField" disabled>
        
        <button class="chat-send-btn" onclick="sendUserMessage()" id="chatSendBtn" disabled>
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
  const sendBtn = document.getElementById('chatSendBtn');
  const activeContactNameEl = document.getElementById('activeContactName');
  
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
    messagesArea.appendChild(div);
    messagesArea.scrollTop = messagesArea.scrollHeight;
  }

  // Select Contact
  function selectContact(contactId, contactName) {
    activeContactId = contactId;
    activeContactNameEl.innerText = contactName;
    
    // Enable inputs
    input.disabled = false;
    sendBtn.disabled = false;
    
    // Update active class on sidebar
    document.querySelectorAll('.chat-contact-item').forEach(el => el.classList.remove('active'));
    const contactEl = document.getElementById('contact-' + contactId);
    if(contactEl) contactEl.classList.add('active');

    if(window.innerWidth <= 768) {
      toggleUserSidebar(); // Close sidebar on mobile after selecting
    }

    loadMessages();
  }

  // Delete Chat
  async function deleteChat(e, contactId) {
    e.stopPropagation(); // Prevent opening the chat
    if(!confirm("Apakah Anda yakin ingin menghapus seluruh riwayat percakapan ini?")) return;

    try {
      const token = document.querySelector('meta[name="csrf-token"]').content;
      await fetch(`/chat/thread/${contactId}`, {
        method: 'DELETE',
        headers: { 'X-CSRF-TOKEN': token, 'Accept': 'application/json' }
      });
      
      // Remove from sidebar
      const contactEl = document.getElementById('contact-' + contactId);
      if(contactEl) contactEl.remove();

      // If deleted is active, clear main area
      if(activeContactId == contactId) {
        activeContactId = null;
        activeContactNameEl.innerText = 'Pilih kontak';
        input.disabled = true;
        sendBtn.disabled = true;
        messagesArea.innerHTML = '<div class="empty-state">Silakan pilih kontak di sidebar untuk mulai mengobrol.</div>';
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
      
      messagesArea.innerHTML = '<div class="chat-date-separator"><span>Hari ini</span></div>';
      data.messages.forEach(msg => renderMessage(msg));
    } catch (e) {
      console.error('Error loading messages', e);
    }
  }

  // Send message
  async function sendUserMessage() {
    if(!activeContactId) return;

    const text = input.value.trim();
    if (!text) return;
    
    const tempMsg = {
      sender_id: currentUserId,
      message: text,
      created_at: new Date().toISOString()
    };
    renderMessage(tempMsg);
    input.value = '';

    // Update sidebar preview instantly
    updateSidebarPreview(activeContactId, text, tempMsg.created_at);

    try {
      const token = document.querySelector('meta[name="csrf-token"]').content;
      const res = await fetch(`/chat/send/${activeContactId}`, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': token,
          'Accept': 'application/json'
        },
        body: JSON.stringify({ message: text })
      });
      // Optionally handle failure and remove tempMsg
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

  input.addEventListener('keydown', function(e) {
    if(e.key === 'Enter' && !e.shiftKey) {
      e.preventDefault();
      sendUserMessage();
    }
  });

  // Listen to Reverb Websocket
  document.addEventListener("DOMContentLoaded", () => {
      // Auto-select if URL has explicit contact
      if(initialContactId) {
          const contactEl = document.getElementById('contact-' + initialContactId);
          if(contactEl) {
              contactEl.click();
          }
      }

      setTimeout(() => {
          if (window.Echo) {
              window.Echo.private(`chat.${currentUserId}`)
                  .listen('.message.sent', (e) => {
                      const msg = e.message;
                      
                      // If message is from active contact, render it
                      if (msg.sender_id == activeContactId) {
                          renderMessage(msg);
                      }
                      
                      // Always update sidebar preview
                      updateSidebarPreview(msg.sender_id, msg.message, msg.created_at);
                  });
          }
      }, 1000); // Wait for Echo
  });

  // Mobile sidebar toggle logic
  function toggleUserSidebar() {
    document.querySelector('.chat-sidebar').classList.toggle('open');
    document.getElementById('userSidebarOverlay').classList.toggle('active');
  }
</script>
@endpush