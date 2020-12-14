<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Country;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Cowsel\Customer as CowselCustomer;
use App\Http\Controllers\Traits\MemberRegister;
use App\Http\Controllers\Traits\MemberResponseToken;
use App\Http\Resources\V1\Region;
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

    public function getRegion($id)
    {
        $country = Country::findOrFail($id);
        $regions = $country->regions;
        $regions->map(function($region){
            return $region->name = __('member.'.$region->name);
        });
        return Region::collection($regions);
    }

    protected function registered(Request $request, $user)
    {
        (new CowselCustomer())->register($user);
    }
}
