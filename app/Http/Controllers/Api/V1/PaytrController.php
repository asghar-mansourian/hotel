<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\TokenViaPaytr;

class PaytrController extends Controller
{
    use TokenViaPaytr;

    public function pay($payment)
    {
        return config('payment.url_gate') . $this->getToken($payment);
    }

}
