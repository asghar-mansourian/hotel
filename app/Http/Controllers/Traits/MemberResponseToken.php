<?php


namespace App\Http\Controllers\Traits;


use App\Http\Resources\User as UserResource;

trait MemberResponseToken
{
    protected function respondWithToken($token, $message)
    {
        return response()->json([
            'message' => $message,
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 1000*1000*1000*1000,
            'user' => UserResource::make(auth()->user())
        ]);
    }
}
