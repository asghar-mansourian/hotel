<?php

namespace App\Http\Controllers\Member\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MemberVerifySms;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers, MemberVerifySms;

    /**
     * @var int
     */
    protected $is_loggedIn = false;
    protected $user;

    public function showLoginForm()
    {
        return view('members.login');
    }

    /**
     * Where to redirect users after login.
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

//    this section is for verify by sms
    public function verifySmsCodeView()
    {
//        if ($id != \auth()->id()) {
//            Auth::logout();
//            return redirect('/login');
//        }

        $user = auth()->user();
        if ($user->verified == '1') {
            return redirect()->route('home');
        }
        $this->sendSms($user);
        return view('members.auth.verify-code-login', compact('user'));
    }

    public function verifySms(Request $request)
    {
        $status = $this->verifySmsCode($request);
        dd($status);
        if (!$status) {
            return response()->json(['success' => false]);
        }
        return response()->json(['success' => true]);

    }

    public function resendSms(Request $request)
    {
        if ($request->id != \auth()->id()) {
            return response()->json(['success' => false]);
        }
        $user = User::whereId($request->id)->first();
        $this->sendSms($user);

        return response()->json(['success' => true]);
    }
//


    protected function credentials(Request $request)
    {
        return $request->only($this->username(), 'password', 'verified');
    }

    protected function attemptLogin(Request $request)
    {

        return $this->guard()->attempt(
            $this->credentials($request), $request->filled('remember')
        );
    }


    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }


}
