<?php

namespace App\Http\Controllers\Member\Inquiry;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InquiryController extends Controller
{
    public function index()
    {
        return view('members.inquiry.index');
    }
}
