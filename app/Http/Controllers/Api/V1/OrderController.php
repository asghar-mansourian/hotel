<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\StoreOrder;
use App\Http\Resources\V1\Order as OrderResource;
use App\Order;
use App\Payment;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    use StoreOrder;


    public function index()
    {
        return OrderResource::collection(
            auth()->user()->orders()->with('orderItems')->paginate(
                request('per_page', 10)
            )
        );
    }

    public function stored($order)
    {
        // check balance
        if ($order->payment_type == Order::PAYMENT_TYPE_CASH) {
            return $this->paidViaCash($order);
        }

        if ($order->payment_type == Order::PAYMENT_TYPE_ONLINE) {
            return $this->paidViaOnline($order);
        }
    }


    public function paidViaCash($order)
    {
        // if balance less order total then remove order & order items
        if (auth()->user()->balance < $order->total) {

            $order->orderItems()->delete();
            $order->delete();

            return response()->json([
                'message' => 'your balance is less of order price total. please try again'
            ], 402);
        }

        DB::transaction(function () use ($order) {
            $user = auth()->user();

            $payment = new Payment();
            $payment->user_id = $user->id;
            $payment->type = Payment:: PAYMENT_TYPE_CASH;
            $payment->description = 'payment by wallet';
            $payment->price = $order->total;
            $payment->status = Payment::PAYMENT_STATUS_PAID;
            $order->payment()->save($payment);

            $user->decrement('balance', $order->total);

            $order->status = 1;
            $order->save();
        });

        return response()->json([
            'message' => 'Successfully paid'
        ]);
    }

    public function paidViaOnline($order)
    {
        return (new PaymentController())->paymentOrder($order);
    }
}
