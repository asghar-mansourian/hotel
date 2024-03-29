<?php

namespace App\Http\Controllers\Member\Auth;

use App\Country;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MemberRegister;
use App\Http\Controllers\Traits\MemberVerifySms;
use App\Providers\RouteServiceProvider;
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

    private function customSelectedFields()
    {
        $locale = app()->getLocale();

        $name = app()->getLocale() !== 'en' ? "name_{$locale} as name" : 'name';

        return [$name, 'id'];
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));


        $this->guard()->login($user);

        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 201)
            : redirect($this->redirectPath());
    }

    protected function registered(Request $request, $user)
    {
        return redirect()->route('panel');

        $this->sendSms($user);
// cowsel api
//        (new CowselCustomer())->register($user);

        return $this->verifySmsCodeView();
    }

    public function verifySmsCodeView()
    {
        $user = auth()->user();

        if ($user->verified == '1') {
            return redirect()->route('home');
        }
        return view('members.auth.verify-code-login', compact('user'));
    }

}
