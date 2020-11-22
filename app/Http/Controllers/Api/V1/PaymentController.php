<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\IncrementBalanceRequest;
use App\lib\Helpers;
use App\lib\pulpal;
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
        $payment = new Payment();
        $payment->user_id = auth()->user()->id;
        $payment->type = Payment:: PAYMENT_TYPE_ONLINE;
        $payment->price = $request->get('amount');
        $payment->description = 'increment balance';
        $payment->save();

        $pulpal = new pulpal();
        $payment_link = $pulpal->getUrl(
            $payment->id,
            Helpers::convertPriceToGatePulpal($payment->price),
            $payment->description
        );

        return response()->json([
            'payment_url' => $payment_link
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

        $pulpal = new pulpal();
        $payment_link = $pulpal->getUrl(
            $payment->id,
            Helpers::convertPriceToGatePulpal($payment->price),
            $payment->description
        );

        return response()->json([
            'payment_url' => $payment_link
        ]);
    }
}
