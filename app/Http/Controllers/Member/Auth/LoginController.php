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
        $this->middleware('guest')->except('logout');
    }

    public function beforeLogin(Request $request)
    {

//        check if user filled email and password
        if ($request->has('email')) {
            $this->validateLogin($request);
            //          find user in database
            $this->user = User::where('email', $request->email)->first();
            //            sessions for identify user
            if (is_object($this->user)) {
                $user_id=$this->user->id;
                $this->removeSmsSessions($this->user->id);
                //            sessions for identify user
                session()->push("verifysms.$user_id.varifysms_email_user", $this->user->email);
                session()->push("verifysms.$user_id.varifysms_password_user", $request->password);
            }
        } elseif ($request->has('sms_code')) {
            $this->verifySmsCode($request);
        }

    }

    public function login(Request $request)
    {
        $request->merge(['verified' => '1']);

        $this->beforeLogin($request);

        if ($request->has('email') && $this->user->verified == '0') {
            return $this->sendSms($this->user);
        } elseif ($request->has('sms_code')) {

            if (isset(session('verifysms')[$request->id]['varifysms_redirect_user'])) {
                return redirect()->route('login')->withErrors([trans('website.smscodeerror')]);
            }

            $request->merge(['password' => session('verifysms')[$request->id]['varifysms_password_user'][0]]);
            $request->merge(['email' => session('verifysms')[$request->id]['varifysms_email_user'][0]]);
        }

        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    protected function authenticated(Request $request, $user)
    {
//        $this->removeSmsSessions($user);
    }


    protected function credentials(Request $request)
    {
        return $request->only($this->username(), 'password', 'verified');
    }

    protected function attemptLogin(Request $request)
    {
        $this->removeSmsSessions($request->id);
        if (isset($request['id']) && isset($request['sms_code'])) {
            unset($request['id']);
            unset($request['sms_code']);
        }

        return $this->guard()->attempt(
            $this->credentials($request), $request->filled('remember')
        );
    }


    public function logout()
    {
        $user = \auth()->user();
        $this->removeSmsSessions($user->id);
        Auth::logout();
        return redirect('/login');
    }


}
