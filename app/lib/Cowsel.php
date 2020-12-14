<?php


namespace App\lib;


use App\Http\Controllers\Cowsel\Auth;
use App\Setting;

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
