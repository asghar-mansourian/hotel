<?php

namespace App\Http\Controllers\Admin;

use App\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class OrderController extends Controller
{


    public function index()
    {
        $orders = Order::query()
            ->with('user' , 'branch' , 'country')
            ->select(Order::selectField)
            ->orderBy(Order::sortField, Order::sortType)
            ->paginate(Order::paginateNumber);

        return View::make('admin.orders.index', compact('orders'), with([
            'sortField' => Order::sortField,
            'sortType' => Order::sortType
        ]));

    }

    public function load()
    {
        $orders = Order::query()
            ->select(Order::sortField)
            ->orderBy(Order::sortArrowFieldChecked, Order::sortArrowTypeChecked)
            ->paginate(Order::paginateNumber);

        return View::make('admin.orders.load', compact('orders'), with([
            'sortField' => Order::sortField,
            'sortType' => Order::sortType
        ]));

    }

    public function show($id)
    {
        $order = Order::query()
            ->with('branch' , 'country')
            ->where('id', $id)
            ->first();

        return view('admin.orders.show' , compact('order'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $orders = order::query()
            ->orWhere('name', 'like', '%' . $search . '%')
            ->select(order::selectField)
            ->paginate(order::paginateNumber);

        $countorders = order::query()
            ->orWhere('name', 'like', '%' . $search . '%')
            ->count();

        return View::make('admin.orders.table', compact('orders'), with([
            'sortField' => order::sortField,
            'sortType' => order::sortType,
            'countorders' => $countorders,
        ]));
    }

    public function sort(Request $request)
    {
        $sort_field = $request->input('sort_field');
        $sort_type = $request->input('sort_type');

        if ($sort_type == null)
            $sort_type = order::sortType;
        if ($sort_field == null)
            $sort_field = order::sortField;

        $orders = order::query()
            ->select(order::selectField)
            ->orderBy($sort_field, $sort_type)
            ->paginate(order::paginateNumber);

        return View::make('admin.orders.table', compact('orders'), with([
            'sortField' => $sort_field,
            'sortType' => $sort_type
        ]));
    }

    public function destroy($id)
    {
        order::query()->find($id)->delete();

        session()->flash('message', __('custom.order.message.delete'));
        session()->flash('success', 1);
        return redirect()->back();

    }

}
