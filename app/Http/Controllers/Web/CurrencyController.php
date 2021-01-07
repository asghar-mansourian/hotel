<?php

namespace App\Http\Controllers\Web;

use App\Currency;
use Carbon\Carbon;
use Goutte\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Symfony\Component\HttpClient\HttpClient;


class CurrencyController
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

    public static function getCurrencyFromTwoApi()
    {
        $urlWeb = 'https://www.limak.az/calculate-currency';
        $checkExpireCurrency = Currency::query()->where('from', 'azn')->first();
        if (!!!$checkExpireCurrency) {

            $res = Http::get($urlWeb);
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
        } else {
            $checkExpireCurrency = Carbon::parse($checkExpireCurrency->created_at)->addDay(1) < now();

            if ($checkExpireCurrency) {
                Currency::where('id', '!=', null)->get()->each->delete();
                $res = Http::get($urlWeb);
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
        }


        return;

    }

    public static function getCurrencyFromCrawel()
    {
        $lists = [
//            'try' => 'usd',
            'try' => 'rub',
//            'try' => 'eur',
//            'eur' => 'usd',
//            'eur' => 'rub',
//            'eur' => 'try',
//            'usd' => 'try',
            'usd' => 'rub',
//            'usd' => 'eur',
//            'rub' => 'eur',
            'rub' => 'usd',
            'rub' => 'try',
        ];
        $checkExpireCurrency = Currency::query()->where('from', 'rub')->first();
        if (!!!$checkExpireCurrency) {
            $client = new Client(HttpClient::create(['timeout' => 800]));
            $crawler = $client->request('GET', 'https://www.x-rates.com/calculator/?from=' . 'rub' . '&to=' . 'usd' . '&amount=1');
            $result = $crawler->filter('.ccOutputRslt')->first()->text();
            $result = Str::of($result)->substr(0, 4);


            Currency::create([
                'from' => 'rub',
                'to' => 'usd',
                'from_value' => 1,
                'to_value' => $result,
            ]);
            foreach ($lists as $key => $list) {
                $client = new Client(HttpClient::create(['timeout' => 800]));
                $crawler = $client->request('GET', 'https://www.x-rates.com/calculator/?from=' . $key . '&to=' . $list . '&amount=1');
                $result = $crawler->filter('.ccOutputRslt')->first()->text();
                $result = Str::of($result)->substr(0, 4);


                Currency::create([
                    'from' => $key,
                    'to' => $list,
                    'from_value' => 1,
                    'to_value' => $result,
                ]);
            }
        } else {
            $checkExpireCurrency = Carbon::parse($checkExpireCurrency->created_at)->addDay(1) < now();
            if ($checkExpireCurrency) {
                Currency::where('from', 'rub')->get()->each->delete();
                Currency::where('to', 'rub')->get()->each->delete();
                $client = new Client(HttpClient::create(['timeout' => 800]));
                $crawler = $client->request('GET', 'https://www.x-rates.com/calculator/?from=' . 'rub' . '&to=' . 'usd' . '&amount=1');
                $result = $crawler->filter('.ccOutputRslt')->first()->text();
                $result = Str::of($result)->substr(0, 4);

                Currency::updateOrCreate(['from' => 'rub',
                    'to' => 'usd',], [
                    'from' => 'rub',
                    'to' => 'usd',
                    'from_value' => 1,
                    'to_value' => $result,
                ]);
                foreach ($lists as $key => $list) {
                    $client = new Client(HttpClient::create(['timeout' => 800]));
                    $crawler = $client->request('GET', 'https://www.x-rates.com/calculator/?from=' . $key . '&to=' . $list . '&amount=1');
                    $result = $crawler->filter('.ccOutputRslt')->first()->text();
                    $result = Str::of($result)->substr(0, 4);


                    Currency::updateOrCreate(['from' => $key,
                        'to' => $list,], [
                        'from' => $key,
                        'to' => $list,
                        'from_value' => 1,
                        'to_value' => $result,
                    ]);
                }
            }
        }


        return;
    }

    public function getCurrencyCalculator(Request $request)
    {
        $from = $request['from'];
        $unit = $request['unit'];
        $to = $request['to'];
        $currency = $request['currency'];

        $value = Currency::query()
            ->where('from', $from)
            ->where('to', $to)
            ->first()->to_value;
        if ($currency == 1) {
            return response()->json(number_format($value, 2));
        } else {
            return response()->json(number_format($value * $currency, 2));
        }

    }

    public function convertOnce($key, $list)
    {
        $client = new Client();
        $crawler = $client->request('GET', 'https://www.x-rates.com/calculator/?from=' . $key . '&to=' . $list . '&amount=1');
        $result = $crawler->filter('.ccOutputRslt')->first()->text();
        $result = Str::of($result)->substr(0, 4);

        Currency::create([
            'from' => $key,
            'to' => $list,
            'from_value' => 1,
            'to_value' => $result,
        ]);
    }
}
