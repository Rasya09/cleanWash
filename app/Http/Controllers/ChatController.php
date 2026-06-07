<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    /**
     * Helper to get list of contacts for the authenticated user, 
     * ordered by latest message. If an explicit contactId is passed 
     * (e.g. from starting a new chat), include them at the top if not present.
     */
    private function getContacts($userId, $explicitContactId = null)
    {
        $contactIds = Message::where('sender_id', $userId)
            ->pluck('receiver_id')
            ->concat(Message::where('receiver_id', $userId)->pluck('sender_id'))
            ->unique()
            ->filter(function($id) use ($userId) {
                return $id !== $userId;
            })->values()->toArray();

        // If explicit contact is not in list, add it
        if ($explicitContactId && !in_array($explicitContactId, $contactIds)) {
            array_unshift($contactIds, $explicitContactId);
        }

        if (empty($contactIds)) {
            return collect([]);
        }

        $contacts = User::with('mitraLaundry')->whereIn('id', $contactIds)->get()->map(function($contact) use ($userId) {
            if ($contact->role === 'mitra' && $contact->mitraLaundry) {
                $contact->name = $contact->mitraLaundry->store_name;
            }
            
            $latestMsg = Message::where(function($q) use ($userId, $contact) {
                    $q->where('sender_id', $userId)->where('receiver_id', $contact->id);
                })->orWhere(function($q) use ($userId, $contact) {
                    $q->where('sender_id', $contact->id)->where('receiver_id', $userId);
                })->orderBy('created_at', 'desc')->first();
                
            $contact->latest_message = $latestMsg;
            return $contact;
        })->sortByDesc(function($contact) {
            return $contact->latest_message ? $contact->latest_message->created_at : \Carbon\Carbon::now()->addYear(); // Put empty new chats at the top
        })->values();

        return $contacts;
    }

    /**
     * Show User chat page
     */
    public function index(Request $request)
    {
        $explicitContactId = $request->query('contact_id');
        $orderCode = $request->query('order_code');
        $orderContext = null;

        if ($orderCode) {
            $orderContext = \App\Models\Order::with('items')->where('order_code', $orderCode)->first();
        }

        $contacts = $this->getContacts(Auth::id(), $explicitContactId);
        return view('user.chat', compact('contacts', 'explicitContactId', 'orderContext'));
    }

    /**
     * Show Mitra chat page
     */
    public function indexMitra(Request $request)
    {
        $explicitContactId = $request->query('contact_id');
        $contacts = $this->getContacts(Auth::id(), $explicitContactId);
        return view('mitra.layanan_customer.manajemen_chat', compact('contacts', 'explicitContactId'));
    }

    /**
     * Fetch messages between authenticated user and a contact
     */
    public function fetchMessages($contactId)
    {
        $userId = Auth::id();

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
    public function sendMessage(Request $request, $contactId)
    {
        $request->validate([
            'receiver_id' => 'required|exists:users,id',
            'message' => 'required|string',
        ]);

        $senderId = Auth::id();

        $message = Message::create([
            'sender_id' => $senderId,
            'receiver_id' => $contactId,
            'message' => $request->message,
            'is_read' => false
        ]);

        // Broadcast the event gracefully
        try {
            broadcast(new \App\Events\MessageSent($message))->toOthers();
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::warning('Failed to broadcast message: ' . $e->getMessage());
        }

        return response()->json([
            'status' => 'success',
            'message' => $message
        ]);
    }

    /**
     * Delete entire chat thread with a contact
     */
    public function deleteChat($contactId)
    {
        $userId = Auth::id();

        Message::where(function($query) use ($userId, $contactId) {
            $query->where('sender_id', $userId)
                  ->where('receiver_id', $contactId);
        })->orWhere(function($query) use ($userId, $contactId) {
            $query->where('sender_id', $contactId)
                  ->where('receiver_id', $userId);
        })->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Chat deleted'
        ]);
    }

    /**
     * Get User details for Mitra Chat sidebar
     */
    public function getUserDetails($userId)
    {
        $user = User::find($userId);
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $mitraId = Auth::user()->mitraLaundry->id ?? null;
        if (!$mitraId) {
            return response()->json(['error' => 'Mitra not found'], 404);
        }

        $orders = \App\Models\Order::where('mitra_laundry_id', $mitraId)
            ->where('user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->get();

        $totalPesanan = $orders->count();
        $totalBelanja = $orders->whereIn('status', ['selesai'])->sum('total_bayar');

        return response()->json([
            'user' => [
                'name' => $user->name,
                'email' => $user->email,
                'phone' => $user->phone ?? '-',
            ],
            'stats' => [
                'total_pesanan' => $totalPesanan,
                'total_belanja' => $totalBelanja,
            ],
            'recent_orders' => $orders->take(5)->map(function ($order) {
                return [
                    'id' => $order->id,
                    'order_code' => $order->order_code ?? '#INV-' . $order->id,
                    'date' => \Carbon\Carbon::parse($order->created_at)->format('d M Y'),
                    'status' => ucfirst($order->status),
                    'amount' => $order->total_bayar,
                ];
            })
        ]);
    }
}
