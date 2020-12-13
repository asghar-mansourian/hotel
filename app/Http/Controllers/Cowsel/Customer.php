<?php


namespace App\Http\Controllers\Cowsel;


use App\lib\Cowsel;
use Illuminate\Support\Facades\Http;

class Customer
{
    public function login($user)
    {
        $url = sprintf("%s/android/cari/cari/show/%s/0/0/0",
            env('COWSEL_API_URL'),
            $user->email
        );

        $response = Http::withHeaders(['Authorization' => Cowsel::getToken()])
            ->get($url)
            ->object();


        if ($response->code == 1) {
            if (!isset($response->data->cr_no)) {
                $this->register($user);

                return;
            }

            if ($user->cowsel_id != $response->data->cr_no) {

                $user->cowsel_id = $response->data->cr_no;
                $user->code = $response->data->cr_kod;

                $user->save();
            }
        }
    }

    /**
     * @param $user
     */
    public function register($user)
    {
        $url = sprintf("%s/android/cari/cari/store",
            env('COWSEL_API_URL')
        );

        $response = Http::withHeaders(['Authorization' => Cowsel::getToken()])
            ->asForm()
            ->post(
                $url,
                [
                    'name' => $user->name,
                    'family' => $user->family,
                    'email' => $user->email,
                    'phone' => $user->phone,
                    'address' => $user->address,
                    'fin' => $user->fin,
//                    'gender' => User::GENDER_ALL[$user->gender],
//                    'serial_number' => $user->serial_number,
//                    'birthdate' => $user->birthdate,
//                    'citizenship' => $user->citizenship
                ]
            )->object();


        if ($response->code == 1) {
            $user->code = $response->data->code;
            $user->cowsel_id = $response->data->id;

            $user->save();
        }
    }

}
