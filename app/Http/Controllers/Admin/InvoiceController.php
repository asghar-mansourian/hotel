<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Invoice;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class InvoiceController extends Controller
{


    public function index()
    {
        $invoices = Invoice::query()
            ->with('country' , 'user')
            ->select(Invoice::selectField)
            ->orderBy(Invoice::sortField, Invoice::sortType)
            ->paginate(Invoice::paginateNumber);

        return View::make('admin.invoices.index', compact('invoices'), with([
            'sortField' => Invoice::sortField,
            'sortType' => Invoice::sortType
        ]));

    }

    public function load()
    {
        $orders = Invoice::query()
            ->select(Invoice::sortField)
            ->orderBy(Invoice::sortArrowFieldChecked, Invoice::sortArrowTypeChecked)
            ->paginate(Invoice::paginateNumber);

        return View::make('admin.invoices.load', compact('orders'), with([
            'sortField' => Invoice::sortField,
            'sortType' => Invoice::sortType
        ]));

    }

    public function show($id)
    {
        $invoice = Invoice::query()
            ->with('country' , 'user')
            ->where('id', $id)
            ->first();
        return view('admin.invoices.show' , compact('invoice'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $invoices = Invoice::query()
            ->orWhere('shop', 'like', '%' . $search . '%')
            ->select(Invoice::selectField)
            ->paginate(Invoice::paginateNumber);

        $countinvocies = Invoice::query()
            ->orWhere('shop', 'like', '%' . $search . '%')
            ->count();

        return View::make('admin.invoices.index', compact('invoices'), with([
            'sortField' => Invoice::sortField,
            'sortType' => Invoice::sortType,
            'countorders' => $countinvocies,
        ]));
    }

    public function sort(Request $request)
    {
        $sort_field = $request->input('sort_field');
        $sort_type = $request->input('sort_type');

        if ($sort_type == null)
            $sort_type = Invoice::sortType;
        if ($sort_field == null)
            $sort_field = Invoice::sortField;

        $orders = Invoice::query()
            ->select(Invoice::selectField)
            ->orderBy($sort_field, $sort_type)
            ->paginate(Invoicea::paginateNumber);

        return View::make('admin.invoices.table', compact('orders'), with([
            'sortField' => $sort_field,
            'sortType' => $sort_type
        ]));
    }

    public function destroy($id)
    {
        Invoice::query()->find($id)->delete();

        session()->flash('message', __('custom.order.message.delete'));
        session()->flash('success', 1);
        return redirect()->back();

    }
    public function status($id , $type)
    {
        Invoice::query()->find($id)->update([
            'status' => $type,
        ]);
        session()->flash('message', __('custom.invoice.message.update'));
        session()->flash('success', 1);
        return redirect()->back();

    }
}
