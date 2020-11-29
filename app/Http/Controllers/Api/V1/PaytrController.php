<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\TokenViaPaytr;

class PaytrController extends Controller
{
    use TokenViaPaytr;

    public function pay($payment)
    {
        $token = $this->getToken($payment);
        if (!$token) {
            return response()->json([
                'message' => __('member.payment_failed_try_again')
            ], 422);
        }

        return config('payment.url_gate') . $token;
    }

}
