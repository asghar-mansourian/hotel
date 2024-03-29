<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\lib\Helpers;
use App\Payment;
use App\Setting;
use Illuminate\Support\Facades\Auth;
use function request;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('web')->except(['redirect']);
    }

    public function verify()
    {
        $payments = Payment::query()->where('user_id', Auth::user()->id)
            ->where('type', Payment::PAYMENT_TYPE_CASH)
            ->orderBy('created_at', 'DESC')
            ->latest();

        switch (request()->get('filter_payment')) {
            case 'income':
                $payments->whereNull('modelable_type');
                break;
            case 'output':
                $payments->whereNotNull('modelable_type');
                break;
        }

        $payments = $payments->get();


        if (request()->is('az-balance')) {
            $payments = $payments->where('balance_type', 'tl');
            return view('members.az-balance', compact('payments'));
        } else {
            $payments = $payments->where('balance_type', 'usd');
            return view('members.tl-balance', compact('payments'));
        }

    }
    public function gate($order = null)
    {
        if (request()->isMethod('GET')) {

            if (request()->session()->has('payment_id')) {
                $payment = Payment::find(request()->session()->get('payment_id'));

                return view( 'members.payment_gate_paymes', compact('payment'));
            } else {
                return redirect()->to('/home');
            }
        }

        $payment = new Payment();
        $payment->user_id = auth()->user()->id;
        $payment_balance = null;
        $payment_balance_type = Payment::PAYMENT_TYPE_BALANCE_ONE;

        if (request()->has('amount_tl') || request()->has('amount_usd')) {
            if (request()->has('amount_tl')) {
                $payment_balance_type = Payment::PAYMENT_TYPE_BALANCE_ONE;
                $payment_balance = request()->get('amount_tl');
            } else {
                $payment_balance_type = Payment::PAYMENT_TYPE_BALANCE_TWO;
                $payment_balance = request()->get('amount_usd');
            }
        }

        if (request()->has('total')) {
            $payment_balance = 0;
            foreach (request()->get('total') as $amount) {
                $payment_balance += $amount;
            }
            $payment_balance_type = Payment::PAYMENT_TYPE_BALANCE_ONE;

        }

        if (!$order) {
            $payment->type = Payment:: PAYMENT_TYPE_CASH;
            $payment->balance_type = $payment_balance_type;
            $payment->price = $payment_balance;
            $payment->description = 'payment by online . increment wallet';
            $payment->save();
        } else {
            if (!$payment_balance) {
                $payment_balance = $order->total;
            }
            $payment->type = Payment:: PAYMENT_TYPE_ONLINE;
            $payment->price = $payment_balance;
            $payment->modelable_id = $order;
            $payment->description = 'payment by online . paid order';
            $order->payment()->save($payment);
            $payment->save();
        }

        if (Helpers::getDefaultGate() == Setting::GATE_PAYMES) {
            request()->session()->put('payment_id', $payment->id);

            return view( 'members.payment_gate_paymes', compact('payment'));
        }

        if (Helpers::getDefaultGate() == Setting::GATE_PAYTR) {
            return (new PaytrController())->pay($payment);
        }

        return (new PulpalController())->pay($payment);
    }
}
