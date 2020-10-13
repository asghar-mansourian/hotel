<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
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

        return $this->respondWithToken($token, 'Registered successfully');
    }
}
