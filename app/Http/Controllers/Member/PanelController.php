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

        $wallet_usd = Auth::user()->usd_balance;

        $payments = Payment::where('user_id', Auth::user()->id)
            ->where('type', Payment::PAYMENT_TYPE_CASH)
            ->orderBy('created_at', 'DESC')
            ->latest();

        switch (request()->get('filter_payment')) {
            case 'income':
                $payments->whereNull('modelable_type');
                break;
            case 'output':
                $payments->whereNotNull('modelable_type');
                break;
        }

        $payments = $payments->get();

        return view('members.panel', compact('payments', 'wallet', 'wallet_usd'));
    }
}
