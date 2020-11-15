<?php

namespace App\Http\Controllers\Api\V1;

use App\Currency;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    public function getCurrency(Request $request)
    {
        $from = $request['from'];
        $to = $request['to'];
        $currency = intval($request['currency']);
        $value = Currency::query()
            ->where('from', $from)
            ->where('to', $to)
            ->first()->to_value;
        $value = number_format($value, 2);

        if ($currency == 1) {
            $value = number_format($value, 2);
        } else {
            $value = number_format($value * $currency, 2);
        }
        return response()->json([
            'value' => $value,
        ]);
    }
}
