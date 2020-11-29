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

        do {
            $code = rand(00000, 99999);

            $exists = User::where('sms_code', $code)->exists();
            if (!$exists) {
                return $code;
            }

        } while (!$exists);
    }

    public function verifySms($user_id, $resend = false)
    {
        $code = $this->generateCodeForUserSmsVerify();
        //        Todo: use sms api
        session()->put('varifysms_user_id_' . $user_id, $user_id);
        if (session()->exists(['varifysms_code_' . $user_id])) {
            session()->forget('varifysms_code_' . $user_id);
        }
        session()->put('varifysms_code_' . $user_id, $code);

        if (!$resend) {
            return view('members.auth.verify-code-login', compact('user_id'));
        }
    }

    public function verifySmsCode(Request $request)
    {
        $code = session()->get('varifysms_code_' . $request->id);
        $user_id = session()->get('varifysms_user_id_' . $request->id);
        session()->put('varifysms_redirect_user_id_' . $user_id, false);

        if ($request->sms_code == $code) {
            User::where('id', $user_id)->update(['sms_code' => $request->sms_code, 'verified' => '1']);
        } else {
            session()->put('varifysms_redirect_user_id_' . $user_id, true);
        }

        session()->forget('varifysms_user_id_' . $user_id);
        session()->forget('varifysms_code_' . $user_id);
    }

}
