<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\TokenViaPaytr;
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

        if ($request->get('status') == 'success') {

            $payment->update(
                [
                    'status' => 1,
                    'refid' => $request->get('merchant_oid')
                ]
            );

            if ($payment->where('type', Payment::PAYMENT_TYPE_CASH)->exists()) {
                $payment->user->increment('balance', $payment->price);
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
