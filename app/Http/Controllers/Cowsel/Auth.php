<?php


namespace App\Http\Controllers\Cowsel;


use Illuminate\Support\Facades\Http;

class Auth
{
    public static function Login()
    {
        $url = sprintf("%s/android/kullanici/login/login/%s/%s/%s",
            env('COWSEL_API_URL'),
            env('COWSEL_API_COMPANY_ID'),
            env('COWSEL_API_USERNAME'),
            env('COWSEL_API_PASSWORD')
        );

        return Http::get($url);
    }
}
