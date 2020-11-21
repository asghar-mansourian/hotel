<?php

namespace App\Http\Controllers\Member\Courier;

use App\Http\Controllers\Controller;
use App\Invoice;
use App\Order;
use App\Stock;

class CourierController extends Controller
{
    public function index()
    {
        $stocks = Stock::all();

        $orders = Order::where('status', Order::STATUS_COURIER_DELIVERY)->get();

        $invoices = Invoice::where('status', Invoice::STATUS_COURIER_DELIVERY)->get();

        return view('members.courier.index', compact('stocks', 'orders', 'invoices'));
    }
}
