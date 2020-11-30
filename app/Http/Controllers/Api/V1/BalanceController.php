<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\Balance as BalanceResource;

class BalanceController extends Controller
{
    public function __invoke()
    {
        return BalanceResource::make(auth()->user());
    }
}

