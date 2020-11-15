<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use App\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class OrderController extends Controller
{


    public function index()
    {
        $orders = Order::query()
            ->with('user', 'branch', 'country')
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
        if (session()->has('sort_type') && session()->has('sort_field')) {
            $field = session()->get('sort_field');
            $type = session()->get('sort_type');
        } else {
            $field = Order::sortField;
            $type = Order::sortType;
        }
        $search = "";
        if (session()->has('search')) {
            $search = session()->get('search');
        }
        $orders = Order::query()
            ->Search($search)
            ->select(Order::selectField)
            ->orderBy($field, $type)
            ->paginate(Order::paginateNumber);

        return View::make('admin.orders.load', compact('orders'), with([
            'sortField' => Order::sortField,
            'sortType' => Order::sortType
        ]));

    }

    public function show($id)
    {
        $order = Order::query()
            ->with('branch', 'country')
            ->where('id', $id)
            ->first();

        return view('admin.orders.show', compact('order'));
    }


    public function search(Request $request)
    {
        $search = $request->input('search');

        $orders =
            Order::query()
                ->orWhere('authority', 'like', '%' . $search . '%')
                ->orWhere('price', 'like', '%' . $search . '%')
                ->orWhere('refid', 'like', '%' . $search . '%')
                ->select(Order::selectField)
                ->paginate(Order::paginateNumber);


        $countorders = Payment::query()
            ->orWhere('price', 'like', '%' . $search . '%')
            ->count();

        return View::make('admin.orders.table', compact('orders'), with([
            'sortField' => Order::sortField,
            'sortType' => Order::sortType,
            'countorders' => $countorders,
            'paginate' => false,
        ]));
    }

    public function sort(Request $request)
    {
        $sort_field = $request->input('sort_field');
        $sort_type = $request->input('sort_type');

        if ($sort_type == null)
            $sort_type = Order::sortType;
        if ($sort_field == null)
            $sort_field = Order::sortField;
        $search = "";
        if (session()->has('search')) {
            $search = session()->get('search');
        }
        session()->put('sort_type', $sort_type);
        session()->put('sort_field', $sort_field);

        $orders = order::query()
//            ->with('user')
//            ->Search($search)
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
