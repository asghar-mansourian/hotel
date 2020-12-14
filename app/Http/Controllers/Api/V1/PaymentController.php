<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\IncrementBalanceRequest;
use App\Http\Resources\V1\CashPayments;
use App\lib\Helpers;
use App\Order;
use App\Payment;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->except(['redirect', 'redirect']);
    }

    public function incrementBalance(IncrementBalanceRequest $request)
    {
        if (request()->has('amount_tl') || request()->has('amount_usd')) {
            if (request()->has('amount_tl')) {
                $payment_balance_type = Payment::PAYMENT_TYPE_BALANCE_ONE;
                $payment_balance = request()->get('amount_tl');
            } else {
                $payment_balance_type = Payment::PAYMENT_TYPE_BALANCE_TWO;
                $payment_balance = request()->get('amount_usd');
            }
        }
        $payment = new Payment();
        $payment->user_id = auth()->user()->id;
        $payment->type = Payment:: PAYMENT_TYPE_CASH;
        $payment->price = $payment_balance;
        $payment->balance_type = $payment_balance_type;
        $payment->description = 'increment balance';
        $payment->save();

        if (Helpers::hasGatePaytr()) {
            return response()->json([
                'payment_url' => (new PaytrController())->pay($payment)
            ]);
        }

        return response()->json([
            'payment_url' => (new PulpalController())->pay($payment)
        ]);
    }

    public function paymentOrder(Order $order)
    {
        $payment = new Payment();
        $payment->user_id = auth()->user()->id;
        $payment->type = Payment:: PAYMENT_TYPE_ONLINE;
        $payment->price = $order->total;
        $payment->description = 'payment by online. payment order';
        $order->payment()->save($payment);

        if (Helpers::hasGatePaytr()) {
            return response()->json([
                'payment_url' => (new PaytrController())->pay($payment)
            ]);
        }

        return response()->json([
            'payment_url' => (new PulpalController())->pay($payment)
        ]);
    }

    public function getPaymentsCash(){
        $payments = auth()->user()->payments()->where('type','cash')->get();
        $payments->map(function($payment){
            $payment->modelable_type ? $payment->price = '-'.$payment->price:$payment->price ='+'.$payment->price;

        });
        return CashPayments::collection($payments);
    }
}
