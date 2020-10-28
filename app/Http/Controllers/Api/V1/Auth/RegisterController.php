<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Cowsel\Auth;
use App\Http\Controllers\Traits\MemberRegister;
use App\Http\Controllers\Traits\MemberResponseToken;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    use MemberRegister, MemberResponseToken;

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        $token = auth()->guard()->login($user);

        $this->registered($request, $user);

        return $this->respondWithToken($token, 'Registered successfully');
    }

    protected function registered(Request $request, $user)
    {
        $response = Auth::Login()->object();

        if ($response->Sonuc == 1) {
            $user->token = $response->Token;

            $response = Auth::register($user)->object();

            if (isset($response->code)) {
                if ($response->code == 1)
                    $user->code = $response->data->code;
            }

            $user->save();
        }
    }
}
