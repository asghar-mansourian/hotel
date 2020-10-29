<?php

namespace App\Http\Controllers\Member\Order;

use App\Branch;
use App\Country;
use App\Http\Controllers\Controller;
use App\Http\Requests\Member\OrderRequest;

class OrderController extends Controller
{
    public function create()
    {
        $countries = Country::all();

        $branches = Branch::latest()->get();

        return view('members.orders.create', compact('countries', 'branches'));
    }

    public function store(OrderRequest $request)
    {
        $invoice = auth()->user()->invoices()->create(
            $request->validated()
        );

        if ($invoice) {
            session()->flash('message', __('member.general.message.create_success'));
            session()->flash('success', 1);
        } else {
            $request->session()->flash('danger', 1);
            $request->session()->flash('message', 'member.general.message.create_failed');
        }

        return back();
    }
}
