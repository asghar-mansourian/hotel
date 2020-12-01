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
        $this->middleware('guest')->except(['logout', 'verifySmsCodeView', 'verifySms', 'resendSms']);
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

        \auth()->loginUsingId($user->id);
//        dd(\auth()->user());
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

        return $this->verifySmsCodeView($user->id);

    }

    public function verifySmsCodeView($id)
    {
        if ($id != \auth()->id()) {
           \auth()->logout();
            return redirect('/login');
        }

        $user = User::findOrFail($id);
        if ($user->verified == '1') {
            return redirect()->route('home');
        }
        $this->sendSms($user);
        return view('members.auth.verify-code-login', compact('user'));
    }

}
