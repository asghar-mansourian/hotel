<?php


namespace App\Http\Controllers\Cowsel;

use App\Http\Controllers\Cowsel\Customer as CowselCustomer;
use App\lib\Cowsel;
use Illuminate\Support\Facades\Http;

class Invoice
{
    public static function store($request)
    {
        if (!auth()->user()->cowsel_id) {
            (new CowselCustomer())->login(auth()->user());
        }

        $url = sprintf("%s/android/alis_satis/separis_alis/store/%s",
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

    public static function urunStore($request, $buyStoreResponseId)
    {
        $url = sprintf("%s/android/alis_satis/separis_alis/urunStore",
            env('COWSEL_API_URL')
        );

        $description = self::description(
            $request->product_type,
            $request->order_track,
            $request->order_date,
            $request->description
        );

        return Http::withHeaders(['Authorization' => Cowsel::getToken()])
            ->asForm()
            ->post(
                $url,
                [
                    'name' => $request->shop,
                    'factor_id' => $buyStoreResponseId,
                    'qty' => $request->quantity,
                    'price' => $request->price,
                    'description' => $description,
                ]
            );
    }

    private static function description($type, $orderTrackingCode, $date, $description = null)
    {
        return !$description ?
            'product type: ' . $type . '; order tracking code: ' . $orderTrackingCode . '; date: ' . $date :
            'product type: ' . $type . '; order tracking code: ' . $orderTrackingCode . '; date: ' . $date . '; description: ' . $description;
    }
}
