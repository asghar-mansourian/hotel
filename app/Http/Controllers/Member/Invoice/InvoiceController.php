<?php

namespace App\Http\Controllers\Member\Invoice;

use App\Branch;
use App\Country;
use App\Http\Controllers\Controller;
use App\Http\Requests\Member\InvoiceRequest;

class InvoiceController extends Controller
{
    public function create()
    {
        $countries = Country::all();

        $branches = Branch::latest()->get();

        return view('members.invoices.create', compact('countries', 'branches'));
    }

    public function store(InvoiceRequest $request)
    {
        $invoice = auth()->user()->invoices()->create(
            $request->validated()
        );

        if ($invoice) {
            $request->session()->flash('message', __('member.invoice.message.create_success'));
            $request->session()->flash('success', 1);
        } else {
            $request->session()->flash('danger', 1);
            $request->session()->flash('message', 'member.invoice.message.create_failed');
        }

        return back();
    }
}
