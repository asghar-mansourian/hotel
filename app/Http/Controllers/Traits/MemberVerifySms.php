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
        do {
            $code = rand(00000, 99999);

            $exists = User::where('sms_code', $code)->exists();

            if (!$exists) {
                return $code;
            }

        } while (!$exists);
    }


    public function sendSms($user)
    {
        $code = $this->generateCodeForUserSmsVerify();
        is_object($user) ? $user->update(['sms_code' => $code, 'sms_verified_at' => Carbon::now()->toDateTimeString()]) : null;

        //        Todo: use sms api
    }

    public function isExpTime($user)
    {
        $now_time = Carbon::now()->toDateTimeString();
        $code_created_time = $user->sms_verified_at;
        $expire_sms_duration = config()->get('app.expire_time');
        $expire_time = strtotime($code_created_time) + $expire_sms_duration;
        if (strtotime($now_time) < $expire_time) {
            return false;
        }
        return true;

    }

    public function verifySmsCode(Request $request)
    {
        $user = auth()->user();
        $expired = $this->isExpTime($user);

        if ($expired || is_null($user) || $request->sms_code != $user->sms_code) {
            return false;
        }
        $user->update(['verified' => '1']);
        return true;

    }

}
