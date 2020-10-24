<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;

class PanelController extends Controller
{
    public function index()
    {
        return view('members.panel');
    }
}
