<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FcmFirebaseController extends Controller
{
    public function __invoke(Request $request)
    {
        $token = $request->get('token');

        if (!$token)
            return response([
                'message' => __('member.parameter_firebase_not_is_empty'),
            ], 422);

        auth()->user()->update([
            'fcm_firebase_token' => $token
        ]);

        return response([
            'message' => __('member.token_saved_successfully'),
        ]);
    }
}
