<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Member\PaytrController;
use App\Http\Controllers\Member\PulpalController;
use App\Http\Requests\IncrementBalanceRequest;
use App\Http\Resources\V1\CashPayments;
use App\lib\Helpers;
use App\Order;
use App\Payment;
use App\Setting;

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

        if (Helpers::getDefaultGate()) {
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

        if (Helpers::getDefaultGate()) {
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
    public function gate($order = null)
    {
        if (request()->isMethod('GET')) {

            if (request()->session()->has('payment_id')) {
                $payment = Payment::find(request()->session()->get('payment_id'));

                return view( '.members.payment_gate_paymes', compact('payment'));
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
            $order = is_numeric($order) ? Order::findOrFail($order) : $order;

            if (!$payment_balance) {
                $payment_balance = $order->total;
            }

            $payment->user_id = $order->user->id;
            $payment->type = Payment:: PAYMENT_TYPE_ONLINE;
            $payment->price = $payment_balance;
            $payment->modelable_id = $order;
            $payment->description = 'payment by online . paid order';
            $order->payment()->save($payment);
            $payment->save();
        }

        if (Helpers::getDefaultGate() == Setting::GATE_PAYMES) {
            $url = url("/paymes/pay/{$payment->id}");

            return response()->json(['pay_url' => $url]);
        }

        if (Helpers::getDefaultGate() == Setting::GATE_PAYTR) {
            return (new PaytrController())->pay($payment);
        }

        return (new PulpalController())->pay($payment);
    }

}
