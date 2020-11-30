<?php

namespace App\Http\Controllers\Member\Auth;

use App\Country;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Cowsel\Auth;
use App\Http\Controllers\Traits\MemberRegister;
use App\Http\Controllers\Traits\MemberVerifySms;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RegisterController extends Controller
{

    use RegistersUsers, MemberRegister, MemberVerifySms;

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


    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));


//        $this->guard()->login($user);

        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 201)
            : redirect($this->redirectPath());
    }


    private function customSelectedFields()
    {
        $locale = app()->getLocale();

        $name = app()->getLocale() !== 'en' ? "name_{$locale} as name" : 'name';

        return [$name, 'id'];
    }

    protected function registered(Request $request, $user)
    {
//        Todo: remove this comment
        /*$response = Auth::Login()->object();


        if ($response->Sonuc == 1) {
            $user->token = $response->Token;

            $response = Auth::register($user)->object();

            if (isset($response->code)) {
                if ($response->code == 1)
                    $user->code = $response->data->code;
            }

            $user->save();
        }*/

//        send sms for verify user

        //        event(new Registered($user = $this->create($request->all())));
        $this->removeSmsSessions($user->id);
        session()->push("verifysms.$user->id.varifysms_password_user", $request->password);
//        session('verifysms')[$user->id]['varifysms_password_user'][0];
        return $this->sendSms($user);

    }


    public function resendSms(Request $request)
    {
        $this->sendSms($request->id, true);
        return response()->json(true);
    }

}
