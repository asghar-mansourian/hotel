<?php


namespace App\Http\Controllers\Traits;


use App\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

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
        $user->update(['sms_code'=> $code, 'sms_verified_at'=> Carbon::now()->toDateTimeString()]);

        //        Todo: use sms api
        session()->push("verifysms.$user->id.varifysms_email_user", $user->email);
        session()->push("verifysms.$user->id.varifysms_user", $user->id);
        session()->push("verifysms.$user->id.varifysms_code_user", $code);
//        dd(session('verifysms'));
        if (!$resend) {
            return view('members.auth.verify-code-login', compact('user_id'));
        }
    }

    public function isExpTime($user)
    {
        $now_time= Carbon::now()->toDateTimeString();
        $code_created_time= $user->sms_verified_at;
        $expire_sms_duration= env('SMS_CODE_EXPIRE_TIME');
        $expire_time=strtotime($code_created_time)+$expire_sms_duration;
        if (strtotime($now_time) < $expire_time){
            return false;
        }
        return true;

    }
    public function verifySmsCode(Request $request)
    {
        $user_id = session('verifysms')[$request->id]['varifysms_user'][0];
        $user=User::whereId($user_id)->first();
        $expired=$this->isExpTime($user);

        if ($expired || is_null($user_id) || $request->sms_code != $user->sms_code ) {
            session()->push("verifysms.$user_id.varifysms_redirect_user", true);
        } else {
            $user->update(['verified' => '1']);
        }

    }

}
