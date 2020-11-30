<?php


namespace App\Http\Controllers\Traits;


use App\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

trait MemberVerifySms
{

    protected $code;


    protected function generateCodeForUserSmsVerify()
    {
        $code = rand(00000, 99999);
        return $code;
    }

    public function removeSmsSessions($user_id)
    {
        session()->forget("verifysms.$user_id");
    }

    public function sendSms($user, $resend = false)
    {
        $user_id=$user->id;
        $code = $this->generateCodeForUserSmsVerify();
//        echo $code;
        //        Todo: use sms api
        session()->push("verifysms.$user->id.varifysms_email_user", $user->email);
        session()->push("verifysms.$user->id.varifysms_user", $user->id);
        session()->push("verifysms.$user->id.varifysms_code_user", $code);
//        dd(session('verifysms'));
        if (!$resend) {
            return view('members.auth.verify-code-login', compact('user_id'));
        }
    }

    public function verifySmsCode(Request $request)
    {
        $code = session('verifysms')[$request->id]['varifysms_code_user'][0];
        $user_id = session('verifysms')[$request->id]['varifysms_user'][0];
        if (is_null($user_id) || $request->sms_code != $code ) {
            session()->push("verifysms.$user_id.varifysms_redirect_user", true);

        } else {
            $user=User::where('id', $user_id)->update(['verified' => '1']);
        }

    }

}
