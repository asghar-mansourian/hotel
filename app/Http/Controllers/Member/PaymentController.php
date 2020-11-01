<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\lib\pulpal;
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

    public function card(Request $request)
    {

        $price = request('new_balance_val');
        $price = 500;
        $payment = Payment::create([
            'user_id' => Auth::user()->id,
            'price' => $price,
        ]);
        return View::make('members.card', compact('payment'));
    }

    public function gate(Request $request)
    {
        $payment = Payment::find($request['id']);
        $pulpal =new pulpal();
        $payment_link = $pulpal->getUrl($payment->id, $payment->price, "test");

        return redirect($payment_link);
    }
    public function redirect()
    {
        if ($_GET['Status'] == "error")
        {
            $message = "payment failed";
            return View::make('members.check' , compact('message'));
        }
        else{
            $message = "payment successful";
            return View::make('members.check' , compact('message'));
        }

    }

    public function delivery()
    {
//        ExternalId
        if ($_GET['Status'] == "error")
        {
            Payment::find($_GET['ExternalId'])->update(
                [
                    'status' => -1,
                ]
            );
        }
        else{
            Payment::find($_GET['ExternalId'])->update(
                [
                    'status' => 1,
                    'refid' => $_GET['PaymentAttempt'],
                ]
            );
        }

    }
}
