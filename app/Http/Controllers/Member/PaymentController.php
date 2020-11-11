<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\lib\Helpers;
use App\lib\pulpal;
use App\Payment;
use Illuminate\Support\Facades\View;
use function request;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('web')->except(['redirect', 'redirect']);
    }

    public function verify()
    {
        return view('members.az-balance');
    }

    public function gate($order = null)
    {
        $payment = new Payment();
        $payment->user_id = auth()->user()->id;
        $payment->type = Payment:: PAYMENT_TYPE_ONLINE;

        if (request()->has('amount_azn')) {
            $payment->price = request()->get('amount_azn');
            $payment->description = 'payment by online . increment wallet';
            $payment->save();
        } elseif ($order) {
            $payment->price = $order->total;
            $payment->description = 'payment by online . paid order';
            $order->payment()->save($payment);
        }

        $pulpal = new pulpal();
        $payment_link = $pulpal->getUrl(
            $payment->id,
            Helpers::convertPriceToGatePulpal($payment->price),
            $payment->description
        );

        return redirect($payment_link);
    }

    public function redirect()
    {
        $this->delivery();

        if (request()->Status == "error") {
            $message = "payment failed";
            return View::make('members.check', compact('message'));
        } else {
            $message = "payment successful";
            return View::make('members.check', compact('message'));
        }

    }

    public function delivery()
    {
        if (request()->Status == "error") {
            Payment::find(request()->ExternalId)->update(
                [
                    'status' => -1,
                ]
            );
        } else {
            $payment = Payment::find(request()->ExternalId);

            $payment->update(
                [
                    'status' => 1,
                    'refid' => request()->PaymentAttempt,
                ]
            );

            $payment->user->increment('balance', $payment->price);
        }

    }
}
