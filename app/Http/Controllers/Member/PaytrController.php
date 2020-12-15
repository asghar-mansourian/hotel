<?php

namespace App\Http\Controllers\Member;

use App\Basket;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Cowsel\Balance as BalanceCowsel;
use App\Http\Controllers\Traits\TokenViaPaytr;
use App\OrderItem;
use App\Payment;
use Illuminate\Http\Request;
use function view;

class PaytrController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['callback']);
    }

    use TokenViaPaytr;

    public function pay($payment)
    {
        $token = $this->getToken($payment);
        if (!$token) {
            request()->session()->flash('danger', 1);
            request()->session()->flash('message', __('member.payment_failed_try_again'));

            return back();
        }

        return view('members.pay_gate_paytr', compact('token'));
    }

    public function callback(Request $request)
    {
        // these code for get
        if ($request->method() === 'GET') {
            if ($request->has('success')) {
                return view('members.check')->with([
                    'message' => __('member.general.message.paid_successful')
                ]);
            }

            return view('members.check')->with([
                'message' => __('member.general.message.paid_unsuccessful')
            ]);
        }

        // these code for post
        $merchant_key = config('payment.merchant_id');
        $merchant_salt = config('payment.merchant_salt');

        $hash = base64_encode(hash_hmac('sha256', $request->get('merchant_oid') . $merchant_salt . $request->get('status') . $request->get('total_amount'), $merchant_key, true));


        $payment = Payment::find($request->get('merchant_oid'));
        $payment_type_balance = $payment->balance_type;
        $modelable_id = $payment->modelable_id;
        $modelable_type = $payment->modelable_type;

        if ($request->get('status') == 'success') {
            if ($payment->modelable_type == "App\Order" && $payment->modelable_id != null){
                $orders = OrderItem::where('order_id' , $payment->modelable_id)->get();
                foreach ($orders as $item){
                    Basket::where('link' , $item->link)->where('user_id' , $payment->user_id)->delete();
                }
            }
            $payment->update(
                [
                    'status' => 1,
                    'refid' => $request->get('merchant_oid')
                ]
            );

            if ($payment->where('type', Payment::PAYMENT_TYPE_CASH)->exists()) {
                if ($modelable_id == null && $modelable_type == null) {
                    if ($payment_type_balance == Payment::PAYMENT_TYPE_BALANCE_ONE) {
                        $payment->user->increment('balance', $payment->price);
                        BalanceCowsel::increase($payment->price, 'TL');
                    } else {
                        $payment->user->increment('usd_balance', $payment->price);
                        BalanceCowsel::increase($payment->price, 'USD');
                    }
                }

            }
        } else {
            $payment->update(
                [
                    'status' => 0,
                    'refid' => $request->get('merchant_oid')
                ]
            );
        }

        return "OK";
    }
}
