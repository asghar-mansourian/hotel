<?php

namespace App\Http\Controllers\Member\TlBalance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TlBalanceController extends Controller
{
    public function index()
    {
        return view('members.tl_balance.index');
    }
}
