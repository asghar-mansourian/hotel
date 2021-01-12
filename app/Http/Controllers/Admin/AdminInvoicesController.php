<?php

namespace App\Http\Controllers\Admin;

use App\Country;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\ValidatorRequest;
use App\Http\Requests\Member\InvoiceRequest;
use App\Invoice;
use App\lib\Helpers;
use App\Order;
use App\ProductCategory;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class AdminInvoicesController extends Controller
{
    use ValidatorRequest;

    public function index()
    {
        $invoices = Invoice::where('status','15')->paginate(Invoice::paginateNumber);
        return view('admin.admin_invoices.index', compact('invoices'))->with([
            'sortField' => Invoice::sortField,
            'sortType' => Invoice::sortType
        ]);
    }

    public function create()
    {
        $countries = Country::all();
        $users = User::all();
        return view('admin.admin_invoices.create',compact('countries','users'));
    }

    public function store(Request $request)
    {
        $invoiceValidate = new InvoiceRequest();
        $validate = $this->validateRules($invoiceValidate->rules(), $request);
        if ($validate != null)
            return $this->validateRules($invoiceValidate->rules(), $request);
        $invoice = new Invoice();
        $invoice->order_file = $request->hasFile('order_file') ? Helpers::upload($request, $request->order_file, '/app/invoice-files') : null;
        $invoice->shop = $request->shop;
        $invoice->product_type = $request->product_type;
        $invoice->quantity = $request->quantity;
        $invoice->price = $request->price;
        $invoice->order_track = $request->order_track;
        $invoice->order_date = $request->order_date;
        $invoice->country_id = $request->country_id;
        $invoice->description = $request->description;
        if($request->user_id != ''){
            $invoice->status = Order::STATUS_PURCHASED;
            $invoice->user_id = $request->user_id;
        }
        else{
            $invoice->status = 15;
            $invoice->user_id = 0;
        }
        $invoice->save();
        session()->flash('message', __('custom.invoice.message.create'));
        session()->flash('success', 1);
        return response()->json([], 200);

    }

    public function edit($id)
    {
        $invoice = Invoice::findorfail($id);
        $countries = Country::all();
        $users = User::all();
        return view('admin.admin_invoices.edit',compact('invoice','countries','users'));
    }
    public function update(Request $request,$id)
    {
        $invoiceValidate = new InvoiceRequest();
        $validate = $this->validateRules($invoiceValidate->rules(), $request);
        if ($validate != null)
            return $this->validateRules($invoiceValidate->rules(), $request);
        $invoice = Invoice::findorfail($id);
        if($request->hasFile('order_file'))
            $invoice->order_file = Helpers::upload($request, $request->order_file, '/app/invoice-files');
        $invoice->shop = $request->shop;
        $invoice->product_type = $request->product_type;
        $invoice->quantity = $request->quantity;
        $invoice->price = $request->price;
        $invoice->order_track = $request->order_track;
        $invoice->order_date = $request->order_date;
        $invoice->country_id = $request->country_id;
        $invoice->description = $request->description;
        if($request->user_id != ''){
            $invoice->status = Order::STATUS_PURCHASED;
            $invoice->user_id = $request->user_id;
        }
        $invoice->update();
        session()->flash('message', __('custom.invoice.message.update'));
        session()->flash('success', 1);
        return response()->json([], 200);
    }
    public function search(Request $request)
    {
        $search = $request->input('search');
        $invoices = Invoice::query()
            ->where('status','=',15)
            ->where(function ($q)use($search){
                $q->orWhere('shop', 'like', '%' . $search . '%')->orWhere('product_type', 'like', '%' . $search . '%');
            })
            ->paginate(Invoice::paginateNumber);
        $countInvoices = Invoice::query()
            ->where('status','=',15)
            ->where(function ($q)use($search){
                $q->orWhere('shop', 'like', '%' . $search . '%')->orWhere('product_type', 'like', '%' . $search . '%');
            })
            ->count();

        return View::make('admin.admin_invoices.index', compact('invoices'), with([
            'sortField' => 'created_at',
            'sortType' => 'asc',
            'countInvoices' => $countInvoices,
        ]));
    }


    public function destroy($id)
    {
        $invoice = Invoice::findOrfail($id);
//        $file = storage_path() . '/app/invoice-files/'. $invoice->order_file;
//        if(file_exists($file)){
//            unlink($file);
//        }
        $invoice->delete();
        request()->session()->flash('message', __('admin.invoice.message.deleted_success'));
        request()->session()->flash('success', 1);
        return redirect()->back();
    }
    public function sort(Request $request)
    {
        $sort_field = $request->input('sort_field');
        $sort_type = $request->input('sort_type');

        if ($sort_type == null)
            $sort_type = Invoice::sortType;
        if ($sort_field == null)
            $sort_field = Invoice::sortField;

        $invoices = Invoice::query()
            ->where('status','=',15)
            ->orderBy($sort_field, $sort_type)
            ->paginate(Invoice::paginateNumber);

        return View::make('admin.admin_invoices.table', compact('invoices'), with([
            'sortField' => $sort_field,
            'sortType' => $sort_type
        ]));
    }
    public function load()
    {
        $invoices = Invoice::query()
            ->where('status','=',15)
            ->orderBy(Invoice::sortArrowFieldChecked, Invoice::sortArrowTypeChecked)
            ->paginate(Invoice::paginateNumber);

        return View::make('admin.admin_invoices.load', compact('invoices'), with([
            'sortField' => Invoice::sortField,
            'sortType' => Invoice::sortType
        ]));

    }
}
