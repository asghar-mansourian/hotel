<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use App\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class OrderItemsController extends Controller
{


    public function index()
    {
        $orders = OrderItem::query()
            ->with('order')
            ->select(OrderItem::selectField)
            ->orderBy(OrderItem::sortField, OrderItem::sortType)
            ->paginate(OrderItem::paginateNumber);

        return View::make('admin.orderItems.index', compact('orders'), with([
            'sortField' => Order::sortField,
            'sortType' => Order::sortType
        ]));

    }

    public function load()
    {
        $orders = OrderItem::query()
            ->select(OrderItem::sortField)
            ->orderBy(OrderItem::sortArrowFieldChecked, OrderItem::sortArrowTypeChecked)
            ->paginate(OrderItem::paginateNumber);

        return View::make('admin.orderItems.load', compact('orders'), with([
            'sortField' => OrderItem::sortField,
            'sortType' => OrderItem::sortType
        ]));

    }

    public function show($id)
    {
        $order = OrderItem::query()
            ->with('order')
            ->where('id', $id)
            ->first();
        return view('admin.orderItems.show' , compact('order'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $orders = OrderItem::query()
            ->orWhere('link', 'like', '%' . $search . '%')
            ->orWhere('order_id', 'like', '%' . $search . '%')
            ->select(OrderItem::selectField)
            ->paginate(OrderItem::paginateNumber);

        $countorders = OrderItem::query()
            ->orWhere('link', 'like', '%' . $search . '%')
            ->count();

        return View::make('admin.orderItems.index', compact('orders'), with([
            'sortField' => OrderItem::sortField,
            'sortType' => OrderItem::sortType,
            'countorders' => $countorders,
        ]));
    }

    public function sort(Request $request)
    {
        $sort_field = $request->input('sort_field');
        $sort_type = $request->input('sort_type');

        if ($sort_type == null)
            $sort_type = OrderItem::sortType;
        if ($sort_field == null)
            $sort_field = OrderItem::sortField;

        $orders = OrderItem::query()
            ->select(OrderItem::selectField)
            ->orderBy($sort_field, $sort_type)
            ->paginate(OrderItema::paginateNumber);

        return View::make('admin.orderItems.table', compact('orders'), with([
            'sortField' => $sort_field,
            'sortType' => $sort_type
        ]));
    }

    public function destroy($id)
    {
        OrderItem::query()->find($id)->delete();

        session()->flash('message', __('custom.order.message.delete'));
        session()->flash('success', 1);
        return redirect()->back();

    }

}
