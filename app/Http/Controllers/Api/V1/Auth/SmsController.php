<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Currency;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MemberVerifySms;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Http\Request;

class SmsController extends Controller
{
    use MemberVerifySms;
    public function sendSmsToUser()
    {

        $this->sendSms(auth()->user());
        return response()->json([
            'code' => auth()->user()->sms_code,
        ],200);

    }

    public function verifiedUser(Request  $request)
    {
        $userCode = auth()->user()->sms_code;
        $code = $request->code;
        if ($userCode == $code){
           auth()->user()->update([
               'verified' => 1
           ]);
           return response()->json([
               'message' => 'verify has been successfuly'
           ],200);
        }
        else{
            return response()->json([
                'message' => 'the verify code is not true'
            ],403);
        }
    }
}
