<?php


namespace App\Http\Controllers\Cowsel;

use Illuminate\Support\Facades\Http;

class Buy
{
    public static function store($request)
    {
        $url = sprintf("%s/android/alis_satis/separis_alis/store/%s",
            env('COWSEL_API_URL'),
            181
        );

        $response = Http::withHeaders(['Authorization' => 'bf88a6c967481ce8baeec1424df980f3d95a909b'])
            ->post(
                $url
            );
        $responseId = substr($response->body(),strpos($response->body(),'[')+1,strpos($response->body(),']')-1);
        return self::urunStore($request,$responseId);
    }

    public static function urunStore($request,$buyStoreResponseId)
    {
        $url = sprintf("%s/android/alis_satis/separis_alis/urunStore",
            env('COWSEL_API_URL')
        );
        $description = self::description($request->product_type,$request->order_track,$request->order_date,$request->description);
        return Http::withHeaders(['Authorization' => 'bf88a6c967481ce8baeec1424df980f3d95a909b'])
            ->asForm()
            ->post(
                $url,
                [
                    'name' => $request->name,
                    'factor_id' => $buyStoreResponseId,
                    'qty' => $request->quantity,
                    'price' => $request->price,
                    'description' => $description,
                ]
            );
    }

    private static function description($type,$orderTrackingCode,$date,$description=null){
        if($description)
            $description = 'product type: '.$type. '; order tracking code: '.$orderTrackingCode.'; date: '.$date.'; description: '.$description;
        else
            $description = $description = 'product type: '.$type. '; order tracking code: '.$orderTrackingCode.'; date: '.$date;
        return $description;
    }
}
