<?php


namespace App\lib;


use App\Http\Controllers\Cowsel\Auth;
use App\Setting;
use Illuminate\Support\Facades\Http;

class Cowsel
{
    /**
     * @param false $take_new_token
     * @return string
     */
    public static function getToken($take_new_token = false)
    {
        if ($take_new_token) {
            return self::refreshToken();
        }

        if (!Setting::getValue(Setting::FIELD_COWSEL_TOKEN)) {
            return self::refreshToken();
        } elseif (auth()->check()) {
            $url = sprintf("%s/android/cari/cari/show/%s/0/0/0",
                env('COWSEL_API_URL'),
                auth()->user()->email
            );

            $response = Http::withHeaders(['Authorization' => Setting::getValue(Setting::FIELD_COWSEL_TOKEN)])
                ->get($url)
                ->object();
            if (isset($response->message)) {
                if ($response->message == 'Token Hatası.') {
                    Setting::where('key', Setting::FIELD_COWSEL_TOKEN)->update(['value' => '']);

                    self::getToken();
                }
            }

        }

        return Setting::getValue(Setting::FIELD_COWSEL_TOKEN);
    }


    /**
     * @return string
     */
    public static function refreshToken(): string
    {
        $response = Auth::Login()->object();

        if ($response->Sonuc == 1) {
            $token = $response->Token;

            Setting::where('key', Setting::FIELD_COWSEL_TOKEN)->update(['value' => $token]);

            return $token;
        }

        Setting::where('key', Setting::FIELD_COWSEL_TOKEN)->update(['value' => '']);

        return '';
    }
}
