<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index($contactId = null)
    {
        $user = Auth::user();
        
        // Ambil daftar orang yang pernah chat dengan user ini
        $contactIds = Message::where('sender_id', $user->id)
            ->orWhere('receiver_id', $user->id)
            ->get()
            ->map(function ($message) use ($user) {
                return $message->sender_id === $user->id ? $message->receiver_id : $message->sender_id;
            })
            ->unique();

        $contacts = User::whereIn('id', $contactIds)->get();

        $activeContact = null;
        $messages = collect();

        if ($contactId) {
            $activeContact = User::findOrFail($contactId);
            $messages = Message::where(function ($q) use ($user, $contactId) {
                $q->where('sender_id', $user->id)->where('receiver_id', $contactId);
            })->orWhere(function ($q) use ($user, $contactId) {
                $q->where('sender_id', $contactId)->where('receiver_id', $user->id);
            })->orderBy('created_at', 'asc')->get();

            // Tandai pesan sudah dibaca
            Message::where('sender_id', $contactId)->where('receiver_id', $user->id)->update(['is_read' => true]);
        }

        $view = match($user->role) {
            'admin' => 'admin.chat',
            'mitra' => 'mitra.layanan_customer.manajemen_chat',
            default => 'user.chat'
        };

        return view($view, compact('contacts', 'activeContact', 'messages'));
    }

    public function sendMessage(Request $request)
    {
        $request->validate([
            'receiver_id' => 'required|exists:users,id',
            'message' => 'required|string',
        ]);

        $msg = Message::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $request->receiver_id,
            'message' => $request->message,
            'is_read' => false,
        ]);

        return response()->json([
            'success' => true,
            'data' => $msg
        ]);
    }
}
