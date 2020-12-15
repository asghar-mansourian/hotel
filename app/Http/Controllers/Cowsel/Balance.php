<?php


namespace App\Http\Controllers\Cowsel;

use App\Http\Controllers\Cowsel\Customer as CowselCustomer;
use App\lib\Cowsel;
use App\Payment;
use App\Setting;
use Illuminate\Support\Facades\Http;

class Balance
{
    public static function increase($user, $balance, $currency_type)
    {
        if (!$user->cowsel_id) {
            (new CowselCustomer())->login($user);
        }

        $url = sprintf("%s/android/cari/cari/balance/increase",
            env('COWSEL_API_URL')
        );

        $response = Http::withHeaders(['Authorization' => Cowsel::getToken()])
            ->asForm()
            ->post(
                $url,
                [
                    'customer_id' => $user->cowsel_id,
                    'balance' => $balance,
                    'currency_type' => $currency_type
                ]
            );

        if (isset($response->message)) {
            if ($response->message == 'Token Hatası.') {
                Setting::where('key', Setting::FIELD_COWSEL_TOKEN)->update(['value' => '']);

                self::increase($user, $balance, $currency_type);
            }
        }

        return true;
    }

    public static function decrease($balance, $currency_type)
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

        if (isset($response->message)) {
            if ($response->message == 'Token Hatası.') {
                Setting::where('key', Setting::FIELD_COWSEL_TOKEN)->update(['value' => '']);

                self::decrease($balance, $currency_type);
            }
        }

        return true;
    }

    public function storeUSDPaymentsOfCowsel()
    {
        if (!auth()->user()->cowsel_id) {
            (new CowselCustomer())->login(auth()->user());
        }

        $url = sprintf("%s/android/cari/cari/balanceList/%s",
            env('COWSEL_API_URL'),
            auth()->user()->cowsel_id
        );

        $response = Http::withHeaders(['Authorization' => Cowsel::getToken()])
            ->get($url)
            ->object();

        if (isset($response->code)) {
            if ($response->code == 1) {

                foreach ($response->data as $currency) {
                    if ($currency->price_currency == '$' && $currency->debt_price) {

                        Payment::firstOrCreate(
                            [
                                'user_id' => auth()->user()->id,
                                'price' => $currency->debt_price,
                                'description' => "unit_price:{$currency->unit_price};explanation:{$currency->explanation};date:{$currency->date}",
                                'balance_type' => Payment::PAYMENT_TYPE_BALANCE_TWO
                            ],
                            [
                                'type' => Payment:: PAYMENT_TYPE_CASH,
                                'modelable_type' => 'DecreaseUSD',
                                'status' => 1
                            ]
                        );
                    }
                }
            } elseif (isset($response->message)) {
                if ($response->message == 'Token Hatası.') {
                    Setting::where('key', Setting::FIELD_COWSEL_TOKEN)->update(['value' => '']);

                    $this->storeUSDPaymentsOfCowsel();
                }
            }
        }
    }

    public function syncBalancesOfCowsel($user)
    {
        if (!auth()->user()->cowsel_id) {
            (new CowselCustomer())->login(auth()->user());
        }

        $url = sprintf("%s/android/cari/cari/balanceCurrencies/%s",
            env('COWSEL_API_URL'),
            auth()->user()->cowsel_id
        );

        $response = Http::withHeaders(['Authorization' => Cowsel::getToken()])
            ->get($url)
            ->object();

        if (isset($response->code)) {
            if ($response->code == 1) {

                foreach ($response->data as $currency) {

                    if ($currency->currency_name === 'TL') {
                        $user->balance = $currency->currency_value;
                    } elseif ($currency->currency_name === 'USD') {
                        $user->usd_balance = $currency->currency_value;
                    }
                }

                $user->save();
            }
        } elseif (isset($response->message)) {
            if ($response->message == 'Token Hatası.') {
                Setting::where('key', Setting::FIELD_COWSEL_TOKEN)->update(['value' => '']);

                $this->syncBalancesOfCowsel($user);
            }
        }
    }
}
