<?php

namespace App\Http\Controllers\Member\AddressesAbroad;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AddressesAbroadController extends Controller
{
    public function index()
    {
        return view('members.addresses_abroad.index');
    }
}
