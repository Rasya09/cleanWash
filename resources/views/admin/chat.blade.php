@extends('admin.layouts.app')

@section('css')
<style>
    .chat-app {
        display: flex;
        height: calc(100vh - 64px);
        background: #f8fafc;
        margin-left: 220px; /* Sidebar width */
    }
    .chat-sidebar {
        width: 320px;
        background: #fff;
        border-right: 1px solid #e2e8f0;
        display: flex;
        flex-direction: column;
    }
    .chat-header {
        padding: 20px;
        border-bottom: 1px solid #f1f5f9;
        font-weight: 800;
        font-size: 18px;
    }
    .contact-list {
        flex: 1;
        overflow-y: auto;
    }
    .contact-item {
        padding: 15px 20px;
        display: flex;
        align-items: center;
        gap: 12px;
        cursor: pointer;
        transition: background 0.2s;
        border-bottom: 1px solid #f8fafc;
        text-decoration: none;
        color: inherit;
    }
    .contact-item:hover { background: #f1f5f9; }
    .contact-item.active { background: #eff6ff; border-left: 4px solid #2563eb; }
    .contact-avatar {
        width: 44px;
        height: 44px;
        border-radius: 50%;
        background: #2563eb;
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
    }
    .contact-info { flex: 1; min-width: 0; }
    .contact-name { font-weight: 700; font-size: 14px; margin-bottom: 2px; }
    .contact-last-msg { font-size: 12px; color: #64748b; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }

    .chat-main {
        flex: 1;
        display: flex;
        flex-direction: column;
        background: #fff;
    }
    .chat-messages {
        flex: 1;
        padding: 24px;
        overflow-y: auto;
        display: flex;
        flex-direction: column;
        gap: 16px;
        background: #f8fafc;
    }
    .message {
        max-width: 70%;
        padding: 12px 16px;
        border-radius: 12px;
        font-size: 14px;
        line-height: 1.5;
        position: relative;
    }
    .message.sent {
        align-self: flex-end;
        background: #2563eb;
        color: #fff;
        border-bottom-right-radius: 2px;
    }
    .message.received {
        align-self: flex-start;
        background: #fff;
        color: #1e293b;
        border-bottom-left-radius: 2px;
        box-shadow: 0 1px 2px rgba(0,0,0,0.05);
    }
    .message-time {
        font-size: 10px;
        margin-top: 4px;
        opacity: 0.7;
        display: block;
        text-align: right;
    }
    .chat-input-area {
        padding: 20px;
        border-top: 1px solid #e2e8f0;
        display: flex;
        gap: 12px;
    }
    .chat-input {
        flex: 1;
        padding: 12px 16px;
        border: 1px solid #cbd5e1;
        border-radius: 10px;
        outline: none;
        font-family: inherit;
    }
    .chat-input:focus { border-color: #2563eb; }
    .btn-send {
        background: #2563eb;
        color: #fff;
        border: none;
        padding: 0 20px;
        border-radius: 10px;
        font-weight: 700;
        cursor: pointer;
    }
    .empty-chat {
        flex: 1;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        color: #94a3b8;
    }
    @media (max-width: 768px) {
        .chat-app { margin-left: 0; }
        .chat-sidebar { width: 80px; }
        .contact-info { display: none; }
        .chat-header { display: none; }
    }
</style>
@endsection

@section('content')
<div class="chat-app">
    <!-- Sidebar Kontak -->
    <aside class="chat-sidebar">
        <div class="chat-header">Pesan</div>
        <div class="contact-list">
            @foreach($contacts as $contact)
                <a href="{{ route('chat.index', $contact->id) }}" class="contact-item {{ $activeContact && $activeContact->id == $contact->id ? 'active' : '' }}">
                    <div class="contact-avatar" style="background: {{ $contact->role == 'mitra' ? '#14b8a6' : '#2563eb' }}">
                        {{ strtoupper(substr($contact->name, 0, 1)) }}
                    </div>
                    <div class="contact-info">
                        <div class="contact-name">{{ $contact->name }}</div>
                        <div class="contact-last-msg">{{ ucfirst($contact->role) }}</div>
                    </div>
                </a>
            @endforeach
        </div>
    </aside>

    <!-- Area Chat -->
    <main class="chat-main">
        @if($activeContact)
            <div class="chat-header" style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #e2e8f0;">
                <div style="display: flex; align-items: center; gap: 12px;">
                    <div class="contact-avatar" style="width: 32px; height: 32px; font-size: 12px; background: {{ $activeContact->role == 'mitra' ? '#14b8a6' : '#2563eb' }}">
                        {{ strtoupper(substr($activeContact->name, 0, 1)) }}
                    </div>
                    <span>{{ $activeContact->name }}</span>
                </div>
            </div>

            <div class="chat-messages" id="chatMessages">
                @foreach($messages as $msg)
                    <div class="message {{ $msg->sender_id == auth()->id() ? 'sent' : 'received' }}">
                        {!! nl2br(e($msg->message)) !!}
                        <span class="message-time">{{ $msg->created_at->format('H:i') }}</span>
                    </div>
                @endforeach
            </div>

            <form class="chat-input-area" id="chatForm">
                @csrf
                <input type="hidden" id="receiverId" value="{{ $activeContact->id }}">
                <input type="text" class="chat-input" id="messageInput" placeholder="Ketik pesan..." autocomplete="off">
                <button type="submit" class="btn-send">Kirim</button>
            </form>
        @else
            <div class="empty-chat">
                <i class="fa-regular fa-comments" style="font-size: 48px; margin-bottom: 16px;"></i>
                <p>Pilih percakapan untuk memulai chat</p>
            </div>
        @endif
    </main>
</div>
@endsection

@push('scripts')
<script>
    const chatMessages = document.getElementById('chatMessages');
    if(chatMessages) chatMessages.scrollTop = chatMessages.scrollHeight;

    const chatForm = document.getElementById('chatForm');
    if(chatForm) {
        chatForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const msgInput = document.getElementById('messageInput');
            const msg = msgInput.value.trim();
            const receiverId = document.getElementById('receiverId').value;

            if(!msg) return;

            fetch("{{ route('chat.send') }}", {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    receiver_id: receiverId,
                    message: msg
                })
            })
            .then(res => res.json())
            .then(data => {
                if(data.success) {
                    // Append message locally
                    const div = document.createElement('div');
                    div.className = 'message sent';
                    div.innerHTML = msg.replace(/\n/g, '<br>') + '<span class="message-time">Baru saja</span>';
                    chatMessages.appendChild(div);
                    chatMessages.scrollTop = chatMessages.scrollHeight;
                    msgInput.value = '';
                }
            });
        });
    }
</script>
@endpush
