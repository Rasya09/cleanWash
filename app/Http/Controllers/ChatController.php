<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Events\MessageSent;

class ChatController extends Controller
{
    /**
     * Get the ID of the other user in the chat
     */
    private function getContactId()
    {
        $user = Auth::user();
        if ($user->role === 'mitra') {
            // Mitra chats with User
            return User::where('role', 'user')->first()->id;
        } else {
            // User chats with Mitra
            return User::where('role', 'mitra')->first()->id;
        }
    }

    /**
     * Fetch messages between authenticated user and their contact
     */
    public function fetchMessages()
    {
        $userId = Auth::id();
        $contactId = $this->getContactId();

        $messages = Message::where(function($query) use ($userId, $contactId) {
            $query->where('sender_id', $userId)
                  ->where('receiver_id', $contactId);
        })->orWhere(function($query) use ($userId, $contactId) {
            $query->where('sender_id', $contactId)
                  ->where('receiver_id', $userId);
        })->orderBy('created_at', 'asc')->get();

        return response()->json([
            'messages' => $messages,
            'current_user_id' => $userId,
            'contact_id' => $contactId
        ]);
    }

    /**
     * Send a new message
     */
    public function sendMessage(Request $request)
    {
        $request->validate([
            'message' => 'required|string'
        ]);

        $senderId = Auth::id();
        $receiverId = $this->getContactId();

        $message = Message::create([
            'sender_id' => $senderId,
            'receiver_id' => $receiverId,
            'message' => $request->message,
            'is_read' => false
        ]);

        // Broadcast the event
        broadcast(new MessageSent($message))->toOthers();

        return response()->json([
            'status' => 'success',
            'message' => $message
        ]);
    }
}
