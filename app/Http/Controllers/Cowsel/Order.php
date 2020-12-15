<?php


namespace App\Http\Controllers\Cowsel;

use App\Http\Controllers\Cowsel\Customer as CowselCustomer;
use App\lib\Cowsel;
use Illuminate\Support\Facades\Http;

class Order
{
    public static function store($request)
    {
        if (!auth()->user()->cowsel_id) {
            (new CowselCustomer())->login(auth()->user());
        }

        $url = sprintf("%s/android/alis_satis/separis_satis/store/%s",
            env('COWSEL_API_URL'),
            auth()->user()->cowsel_id
        );

        $response = Http::withHeaders(['Authorization' => Cowsel::getToken()])
            ->post(
                $url
            );
        $responseId = substr(
            $response->body(),
            strpos($response->body(), '[') + 1, strpos($response->body(), ']') - 1
        );

        return self::urunStore($request, $responseId);
    }

    public static function storeGetId()
    {
        if (!auth()->user()->cowsel_id) {
            (new CowselCustomer())->login(auth()->user());
        }

        $url = sprintf("%s/android/alis_satis/separis_satis/store/%s",
            env('COWSEL_API_URL'),
            auth()->user()->cowsel_id
        );

        $response = Http::withHeaders(['Authorization' => Cowsel::getToken()])
            ->post(
                $url
            );
        $responseId = substr(
            $response->body(),
            strpos($response->body(), '[') + 1, strpos($response->body(), ']') - 1
        );

        return $responseId;
    }

    public static function urunStore($request, $buyStoreResponseId)
    {
        $url = sprintf("%s/android/alis_satis/separis_satis/urunStore",
            env('COWSEL_API_URL')
        );
        $description = self::description(
            $request->color,
            $request->link,
            $request->specification,
            $request->description
        );

        return Http::withHeaders(['Authorization' => Cowsel::getToken()])
            ->asForm()
            ->post(
                $url,
                [
                    'factor_id' => $buyStoreResponseId,
                    'buy_price' => $request->price,
                    'sell_price' => $request->total,
                    'qty' => $request->quantity,
                    'description' => $description,
                    'name' => 'order',
                ]
            );
    }

    private static function description($color, $link, $size, $description = null)
    {
        return !$description ?
            'color: ' . $color . '; link: ' . $link . '; specification: ' . $size :
            'color: ' . $color . '; link: ' . $link . '; specification: ' . $size . '; description: ' . $description;
    }
}
