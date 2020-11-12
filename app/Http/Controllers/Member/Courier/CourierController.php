<?php

namespace App\Http\Controllers\Member\Courier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CourierController extends Controller
{
    public function index()
    {
        return view('members.courier.index');
    }
}
