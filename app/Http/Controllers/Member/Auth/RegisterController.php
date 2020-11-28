<?php

namespace App\Http\Controllers\Member\Auth;

use App\Country;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Cowsel\Auth;
use App\Http\Controllers\Traits\MemberRegister;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{

    use RegistersUsers, MemberRegister;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        $countries = Country::query()
        ->select($this->customSelectedFields())
        ->get();

        return view('members.register', compact('countries'));
    }

    private function customSelectedFields()
    {
        $locale = app()->getLocale();

        $name = app()->getLocale() !== 'en' ? "name_{$locale} as name" : 'name';

        return [$name, 'id'];
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
