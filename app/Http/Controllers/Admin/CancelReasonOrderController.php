<?php

namespace App\Http\Controllers\Admin;

use App;
use App\CancelReasonOrder;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\ValidatorRequest;
use App\Http\Requests\Admin\CancelReasonOrderRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class CancelReasonOrderController extends Controller
{
    use ValidatorRequest;

    public function index()
    {
        $cancel_reason_orders = CancelReasonOrder::query()
            ->select(CancelReasonOrder::selectField)
            ->orderBy(CancelReasonOrder::sortField, CancelReasonOrder::sortType)
            ->paginate(CancelReasonOrder::paginateNumber);
        return View::make('admin.cancel_reason_orders.index', compact('cancel_reason_orders'), with([
            'sortField' => CancelReasonOrder::sortField,
            'sortType' => CancelReasonOrder::sortType
        ]));

    }

    public function load()
    {
        $cancel_reason_orders = App\CancelReasonOrder::query()
            ->select(CancelReasonOrder::sortField)
            ->orderBy(CancelReasonOrder::sortArrowFieldChecked, CancelReasonOrder::sortArrowTypeChecked)
            ->paginate(CancelReasonOrder::paginateNumber);

        return View::make('admin.cancel_reason_orders.load', compact('cancel_reason_orders'), with([
            'sortField' => CancelReasonOrder::sortField,
            'sortType' => CancelReasonOrder::sortType
        ]));

    }

    public function create()
    {
        return view('admin.cancel_reason_orders.create');
    }

    public function store(Request $request)
    {
        CancelReasonOrder::query()->insert([
            'description' => $request->input('description') ?? null,
            'description_ru' => $request->input('description_ru') ?? null,
            'description_az' => $request->input('description_az') ?? null,
        ]);

        session()->flash('message', __('custom.CancelReasonOrder.message.create'));
        session()->flash('success', 1);
        return response()->json([], 200);
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $cancel_reason_orders = CancelReasonOrder::query()
            ->orWhere('title', 'like', '%' . $search . '%')
            ->select(CancelReasonOrder::selectField)
            ->paginate(CancelReasonOrder::paginateNumber);

        $countcancel_reason_orders = CancelReasonOrder::query()
            ->orWhere('name', 'like', '%' . $search . '%')
            ->count();

        return View::make('admin.cancel_reason_orders.table', compact('cancel_reason_orders'), with([
            'sortField' => CancelReasonOrder::sortField,
            'sortType' => CancelReasonOrder::sortType,
            'countcancel_reason_orders' => $countcancel_reason_orders,
        ]));
    }

    public function sort(Request $request)
    {
        $sort_field = $request->input('sort_field');
        $sort_type = $request->input('sort_type');

        if ($sort_type == null)
            $sort_type = CancelReasonOrder::sortType;
        if ($sort_field == null)
            $sort_field = CancelReasonOrder::sortField;

        $cancel_reason_orders = CancelReasonOrder::query()
            ->select(CancelReasonOrder::selectField)
            ->orderBy($sort_field, $sort_type)
            ->paginate(CancelReasonOrder::paginateNumber);

        return View::make('admin.cancel_reason_orders.table', compact('cancel_reason_orders'), with([
            'sortField' => $sort_field,
            'sortType' => $sort_type
        ]));
    }

    public function edit($id)
    {

        $CancelReasonOrder = CancelReasonOrder::query()
            ->where('id', $id)
            ->first();
        return view('admin.cancel_reason_orders.edit', compact('CancelReasonOrder', 'id'));
    }

    public function update(Request $request, $id)
    {
        CancelReasonOrder::query()->where('id', $id)->update([
            'description' => $request->input('description') ?? null,
            'description_ru' => $request->input('description_ru') ?? null,
            'description_az' => $request->input('description_az') ?? null,
        ]);

        session()->flash('message', __('custom.CancelReasonOrder.message.update'));
        session()->flash('success', 1);
        return response()->json([], 200);
    }

    public function destroy($id)
    {
        CancelReasonOrder::query()->find($id)->delete();

        session()->flash('message', __('custom.CancelReasonOrder.message.delete'));
        session()->flash('success', 1);
        return redirect()->back();

    }


}
