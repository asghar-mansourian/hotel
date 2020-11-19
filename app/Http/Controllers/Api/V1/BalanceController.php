<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\Balance as BalanceResource;
use App\User;

class BalanceController extends Controller
{


    public function getBalance($id)
    {
        $user = User::select('balance')->whereId($id)->get();
//        var_dump($user);
        if ($user->count() == 0) {
            return response()->json(['data' => 'Not Found!'], 404);
        }
        return new BalanceResource($user);
    }
}

