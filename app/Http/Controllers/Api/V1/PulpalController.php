<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\lib\Helpers;
use App\lib\pulpal;

class PulpalController extends Controller
{
    public function pay($payment)
    {
        return (new pulpal())->getUrl(
            $payment->id,
            Helpers::convertPriceToGatePulpal($payment->price),
            $payment->description
        );
    }
}
