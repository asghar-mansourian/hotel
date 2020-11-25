<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\TokenViaPaytr;
use Illuminate\Http\Request;
use function view;

class PaytrController extends Controller
{
    use TokenViaPaytr;

    public function pay($payment)
    {
        $token = $this->getToken($payment);

        return view('members.pay_gate_paytr', compact('token'));
    }

    public function callback(Request $request)
    {

        $merchant_key = config('payment.merchant_id');
        $merchant_salt = config('payment.merchant_salt');

        $hash = base64_encode(hash_hmac('sha256', $request->get('merchant_oid') . $merchant_salt . $request->get('status') . $request->get('total_amount'), $merchant_key, true));

        if ($hash != $request->get('hash'))
            die('PAYTR notification failed: bad hash');

        if ($request->get('status') == 'success') {

        } else {

        }

    }
}
