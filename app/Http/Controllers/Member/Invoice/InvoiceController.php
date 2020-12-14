<?php

namespace App\Http\Controllers\Member\Invoice;

use App\Branch;
use App\Country;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Cowsel\Invoice as InvoiceCowsel;
use App\Http\Requests\Member\InvoiceRequest;
use App\Invoice;

class InvoiceController extends Controller
{
    public function index()
    {
        $branches = Branch::all();
        $countries = Country::getCountriesWithoutCompanyCountry()->with('invoices.branch')->get();

        return view('members.invoices.index', compact('countries', 'branches'));
    }


    public function create()
    {
        $countries = Country::getCountriesWithoutCompanyCountry()->get();

        $branches = Branch::latest()->get();

        return view('members.invoices.create', compact('countries', 'branches'));
    }

    public function store(InvoiceRequest $request)
    {

        $invoice = auth()->user()->invoices()->create(
            $request->validated()
        );

        if ($invoice) {

            InvoiceCowsel::Store($request);

            $request->session()->flash('message', __('member.invoice.message.create_success'));
            $request->session()->flash('success', 1);
        } else {
            $request->session()->flash('danger', 1);
            $request->session()->flash('message', 'member.invoicemessage.create_failed');
        }

        return redirect()->route('invoices.index');
    }

    public function update(InvoiceRequest $request)
    {

        auth()->user()->invoices()->whereId($request->invoice_id)->update(
            $request->validated()
        );

        $request->session()->flash('message', __('member.invoice.message.update_success'));
        $request->session()->flash('success', 1);

        return response()->json(['success' => true]);

    }


    public function destroy(Invoice $invoice)
    {
        $invoice = $invoice->delete();
        if ($invoice) {
            request()->session()->flash('message', __('member.invoice.message.deleted_success'));
            request()->session()->flash('success', 1);
        } else {
            request()->session()->flash('danger', 1);
            request()->session()->flash('message', 'member.invoice.message.deleted_failed');
        }

        return back();
    }
}
