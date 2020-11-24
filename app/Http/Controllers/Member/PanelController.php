<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Web\CurrencyController;
use App\Payment;
use Illuminate\Support\Facades\Auth;

class PanelController extends Controller
{
    public function index()
    {
        CurrencyController::getCurrencyFromCrawel();
        CurrencyController::getCurrencyFromTwoApi();
        $wallet = Auth::user()->balance;
        $payments = Payment::where('user_id' , Auth::user()->id)
            ->orderBy('created_at','DESC')
            ->latest()
            ->paginate(10);

        return view('members.panel' , compact('payments' ,'wallet'));
    }
}
