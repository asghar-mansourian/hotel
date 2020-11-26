<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\lib\Helpers;
use App\Payment;
use function request;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('web')->except(['redirect']);
    }

    public function verify()
    {
        if (request()->is('az-balance')) {
            return view('members.az-balance');
        } else {
            return view('members.tl-balance');
        }

    }

    public function gate($order = null)
    {
        $payment = new Payment();
        $payment->user_id = auth()->user()->id;

        if (request()->has('amount_azn')) {
            $payment->type = Payment:: PAYMENT_TYPE_CASH;
            $payment->price = request()->get('amount_azn');
            $payment->description = 'payment by online . increment wallet';
            $payment->save();
        } elseif ($order) {
            $payment->type = Payment:: PAYMENT_TYPE_ONLINE;
            $payment->price = $order->total;
            $payment->description = 'payment by online . paid order';
            $order->payment()->save($payment);
        }

        if (Helpers::hasGatePaytr()) {
            return (new PaytrController())->pay($payment);
        }

        return (new PulpalController())->pay($payment);
    }
}
