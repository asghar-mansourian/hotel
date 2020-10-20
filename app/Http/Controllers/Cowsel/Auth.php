<?php


namespace App\Http\Controllers\Cowsel;


use App\User;
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

    public static function register($user)
    {
        $url = sprintf("%s/android/cari/cari/store",
            env('COWSEL_API_URL')
        );

        return Http::withHeaders(['Authorization' => auth()->user()->token])
            ->asForm()
            ->post(
                $url,
                [
                    'name' => $user->name,
                    'email' => $user->email,
                    'phone' => $user->phone,
                    'address' => $user->address,
                    'fin' => $user->fin,
                    'gender' => User::GENDER_ALL[$user->gender],
                    'serial_number' => $user->serial_number,
                    'birthdate' => $user->birthdate,
                    'citizenship' => $user->citizenship
                ]
            );
    }
}
