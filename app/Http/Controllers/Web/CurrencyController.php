<?php

namespace App\Http\Controllers\Web;

use App\Currency;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
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
        $this->urlWeb = 'https://www.limak.az/calculate-currency';
    }

    public function getCurrency()
    {

        $init = 1;
        $res = Http::get($this->url, [
            'access_key' => $this->apiKey,
            "currencies" => $this->currencies,
            "source" => $this->unit,
            "format" => "1"
        ]);
        $result = $res->json();
        $result = $result['quotes'];
        foreach ($result as $key => $value) {
            $key = Str::of($key)->replace($this->unit, "");
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
            ->where('from', $from)
            ->where('to', $to)
            ->first();
        if ($unit == $this->unit) {
            $value = $value->to_value * $currency;
            dd($value);
        } else {
            $value = ($value->from_value / $value->to_value) * $currency;
            dd($value);
        }


    }

    public function getCurrencyFromTwoApi()
    {

        $checkExpireCurrency = Currency::query()->first();
        $checkExpireCurrency = Carbon::parse($checkExpireCurrency->created_at)->addDay(1) < now();
        if ($checkExpireCurrency) {
            Currency::delete();
            $res = Http::get($this->urlWeb);

            $result = $res->json();
            $result = $result['currencies'];

            foreach ($result as $value) {
                $from = Str::of($value['name'])->substr(0, 3);
                $to = Str::of($value['name'])->substr(4, 3);
                $from_value = 1;
                $to_value = $value['val'];
                Currency::create([
                    'from' => $from,
                    'to' => $to,
                    'from_value' => $from_value,
                    'to_value' => $to_value,
                ]);
            }
            return;
        }


        return;

    }

    public function getCurrencyCalculator(Request $request)
    {
        $from = $request['from'];
        $unit = $request['unit'];
        $to = $request['to'];
        $currency = intval($request['currency']);

        $value = Currency::query()
            ->where('from', $from)
            ->where('to', $to)
            ->first()->to_value;

        if ($currency == 1) {
            return response()->json($value);
        } else {
            return response()->json($value * $currency);
        }

    }
}
