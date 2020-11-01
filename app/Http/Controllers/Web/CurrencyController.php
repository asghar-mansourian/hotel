<?php

namespace App\Http\Controllers\Web;

use App\Currency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class CurrencyController extends Controller
{
    protected $unit;
    protected $currencies;
    protected $apiKey;
    protected $url;
    public function __construct()
    {
        $this->unit = "USD";
        $this->currencies = "AZN,EUR";
        $this->apiKey = '2d07e07e96c9e8f6662d2e61b26471d3';
        $this->url = 'http://apilayer.net/api/live';
    }
    public function getCurrency()
    {

        $init = 1;
        $res = Http::get( $this->url , [
            'access_key'=>$this->apiKey,
            "currencies"=> $this->currencies,
            "source"=> $this->unit,
            "format"=> "1"
        ]);
        $result = $res->json();
        $result = $result['quotes'];
        foreach ($result as $key => $value){
            $key = Str::of($key)->replace($this->unit , "");
            Currency::create([
                'from' => $this->unit,
                'to' => $key,
                'from_value' => $init,
                'to_value' => $value,
            ]);
        }
        return;
//        $res = Currency::query()->get();
//        foreach ($res as $key => $value) {
//            dd($value->from_value / $value->to_value);
////            Currency::create([
////                'from' => "azn",
////                'to' => "usd",
////                'from_value' => $init,
////                'to_value' => $value,
////            ]);
//        }
//        dd($res);
    }

    public function convert(Request $request)
    {
        $from = $request['from'];
        $unit = $request['unit'];
        $to = $request['to'];
        $currency = intval($request['currency']);

        $value = Currency::query()
            ->where('from' , $from)
            ->where('to' , $to)
            ->first();

        if ($unit == $this->unit){
            $value = $value->to_value  * $currency;
            dd($value);
        }
        else{
            $value = ( $value->from_value / $value->to_value ) * $currency;
            dd($value);
        }


    }
}
