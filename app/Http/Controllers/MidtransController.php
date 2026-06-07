<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Midtrans\Notification;

class MidtransController extends Controller
{
    public function callback()
    {
        $notification = new Notification();

        $transaction = $notification->transaction_status;
        $orderId = $notification->order_id;

        $order = Order::where(
            'transaction_id',
            $orderId
        )->first();

        if (!$order) {
            return response()->json([
                'message' => 'Order not found'
            ]);
        }

        if ($transaction == 'settlement') {

            $order->update([
                'payment_status' => 'paid',
                'status' => 'menunggu_konfirmasi'
            ]);
        }

        return response()->json([
            'success' => true
        ]);
    }
}
