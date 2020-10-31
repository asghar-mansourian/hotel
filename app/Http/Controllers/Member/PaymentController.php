<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class PaymentController extends Controller
{
    public function verify()
    {
        return view('members.az-balance');
    }

    public function card(Request  $request)
    {
        $price = 1;
       $payment = Payment::create([
           'user_id' => Auth::user()->id,
           'price' => $price,
           'status' => 0,
       ]);
        return View::make('members.card' , compact('payment'));
    }


    public function redirect()
    {
            return View::make('members.check' );
    }

    public function delivery()
    {
        Payment::create([
            'user_id' => 123,
            'price' => 123,
            'status' => 0,
        ]);
    }
}