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
    private $need_verify_code;

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


    public function login(Request $request)
    {

        $this->need_verify_code = false;
        $request->merge(['verified' => '1']);
        $is_loggedIn=false;
        $user=null;

        if ($request->has('email')) {
            $this->validateLogin($request);

            if (method_exists($this, 'hasTooManyLoginAttempts') &&
                $this->hasTooManyLoginAttempts($request)) {
                $this->fireLockoutEvent($request);

                return $this->sendLockoutResponse($request);
            }

            $user = User::where('email', $request->email)->first();
            session()->put('varifysms_email_user_id_' . $user->id, $request->email);
            session()->put('varifysms_password_user_id_' . $user->id, $request->password);
            $is_loggedIn = $this->guard()->attempt($this->credentials($request), $request->filled('remember'));
        }

        if (is_object($user) > 0 && !is_null($user) && !$is_loggedIn) {
            $this->need_verify_code = true;
            return $this->verifySms($user->id);
        }

        if ($request->has('sms_code')) {
            $request->merge(['password' => session()->get('varifysms_password_user_id_' . $request->id)]);
            $request->merge(['email' => session()->get('varifysms_email_user_id_' . $request->id)]);
            $this->verifySmsCode($request);
            if (session()->get('varifysms_redirect_user_id_' . $request->id))
                return redirect('login')->withErrors(['the code is not correct! try again for login']);

        }

        session()->forget('varifysms_redirect_user_id_' . $request->id);
        session()->forget('varifysms_password_user_id_' . $request->id);
        session()->forget('varifysms_email_user_id_' . $request->id);

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    protected function credentials(Request $request)
    {
        return $request->only($this->username(), 'password', 'verified');
    }

    protected function attemptLogin(Request $request)
    {
        if (isset($request['id']) && isset($request['sms_code'])){
            unset($request['id']);
            unset($request['sms_code']);
        }

        return $this->guard()->attempt(
            $this->credentials($request), $request->filled('remember')
        );
    }


    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    private function needVerifyUser(Request $request)
    {
        $this->need_verify_code = false;
        $user = User::where('email', $request->email)->first();
        $request->merge(['verified' => '1']);
        $is_loggedIn = $this->guard()->attempt($this->credentials($request), $request->filled('remember'));

        if (is_object($user) > 0 && !is_null($user) && !$is_loggedIn) {
            return $this->need_verify_code = true;
        } else {
            return false;
        }

    }
}
