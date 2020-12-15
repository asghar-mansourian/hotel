<?php


namespace App\Http\Controllers\Cowsel;

use App\Http\Controllers\Cowsel\Customer as CowselCustomer;
use App\lib\Cowsel;
use Illuminate\Support\Facades\Http;

class Balance
{
    public static function increase($balance,$currency_type)
    {
        if (!auth()->user()->cowsel_id) {
            (new CowselCustomer())->login(auth()->user());
        }

        $url = sprintf("%s/android/cari/cari/balance/increase",
            env('COWSEL_API_URL')
        );
        $response = Http::withHeaders(['Authorization' => Cowsel::getToken()])
            ->asForm()
            ->post(
                $url,
                [
                    'customer_id' => auth()->user()->cowsel_id,
                    'balance' => $balance,
                    'currency_type' => $currency_type
                ]
            );
        return true;
    }

    public static function decrease($balance,$currency_type)
    {
        if (!auth()->user()->cowsel_id) {
            (new CowselCustomer())->login(auth()->user());
        }

        $url = sprintf("%s/android/cari/cari/balance/decrease",
            env('COWSEL_API_URL')
        );
        $response = Http::withHeaders(['Authorization' => Cowsel::getToken()])
            ->asForm()
            ->post(
                $url,
                [
                    'customer_id' => auth()->user()->cowsel_id,
                    'balance' => $balance,
                    'currency_type' => $currency_type
                ]
            );

        return true;
    }

}
