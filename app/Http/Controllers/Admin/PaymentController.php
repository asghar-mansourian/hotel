<?php

namespace App\Http\Controllers\Admin;

use App;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\ValidatorRequest;
use App\Http\Requests\Admin\PaymentRequest;
use App\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class PaymentController extends Controller
{
    use ValidatorRequest;

    public function __construct()
    {
        $this->middleware(['permission:read Payment|edit Payment|create Payment|delete Payment']);

    }

    public function index()
    {
        $payments = Payment::query()
            ->with('user')
            ->select(Payment::selectField)
            ->orderBy(Payment::sortField, Payment::sortType)
            ->paginate(Payment::paginateNumber);
        return View::make('admin.payments.index', compact('payments'), with([
            'sortField' => Payment::sortField,
            'sortType' => Payment::sortType
        ]));

    }

    public function load()
    {
        $payments = Payment::query()
            ->with('user')
            ->select(Payment::selectField)
            ->orderBy(Payment::sortArrowFieldChecked, Payment::sortArrowTypeChecked)
            ->paginate(Payment::paginateNumber);

        return View::make('admin.payments.load', compact('payments'), with([
            'sortField' => Payment::sortField,
            'sortType' => Payment::sortType
        ]));

    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $payments = Payment::query()
            ->orWhere('authority', 'like', '%' . $search . '%')
            ->orWhere('price', 'like', '%' . $search . '%')
            ->orWhere('refid', 'like', '%' . $search . '%')
            ->select(Payment::selectField)
            ->paginate(Payment::paginateNumber);

        $countpayments = Payment::query()
            ->orWhere('price', 'like', '%' . $search . '%')
            ->count();

        return View::make('admin.payments.index', compact('payments'), with([
            'sortField' => Payment::sortField,
            'sortType' => Payment::sortType,
            'countpayments' => $countpayments,
        ]));
    }

    public function show($id)
    {
        $payment = Payment::query()
            ->with( 'user')
            ->where('id', $id)
            ->first();

        return view('admin.payments.show' , compact('payment'));
    }
    public function sort(Request $request)
    {
        $sort_field = $request->input('sort_field');
        $sort_type = $request->input('sort_type');

        if ($sort_type == null)
            $sort_type = Payment::sortType;
        if ($sort_field == null)
            $sort_field = Payment::sortField;

        $payments = Payment::query()
            ->select(Payment::selectField)
            ->orderBy($sort_field, $sort_type)
            ->paginate(Payment::paginateNumber);

        return View::make('admin.payments.table', compact('payments'), with([
            'sortField' => $sort_field,
            'sortType' => $sort_type
        ]));
    }


    public function destroy($id)
    {
        Payment::query()->find($id)->delete();

        session()->flash('message', __('custom.Payment.message.delete'));
        session()->flash('success', 1);
        return redirect()->back();

    }


}
