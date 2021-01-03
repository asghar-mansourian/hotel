<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use App\OrderItem;
use App\Payment;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class OrderController extends Controller
{


    public function index()
    {
        $status = \request()->get('status') ?? 0;
        $purchased = \request()->get('purchased') ?? 0;
        $warehouse_abroad = \request()->get('warehouse_abroad') ?? 0;
        $invoices = collect();
        $orders = collect();

        if ($purchased && $status == 1) {
            $orders = DB::table('order_items')
                ->leftJoin('orders', 'order_items.order_id', 'orders.id')
                ->leftJoin('users', 'orders.user_id', 'users.id')
                ->select(DB::raw('1 as type'), 'users.name as name', 'users.family as family', 'order_items.id as id', 'order_items.link as website', 'order_items.status', 'order_items.price as price', 'order_items.created_at as date')
                ->where('order_items.deleted_at', null)
                ->where('order_items.status', $status)
                ->get();

        } elseif ($warehouse_abroad && $status == 2) {
            $orders = DB::table('order_items')
                ->leftJoin('orders', 'order_items.order_id', 'orders.id')
                ->leftJoin('users', 'orders.user_id', 'users.id')
                ->select(DB::raw('1 as type'), 'users.name as name', 'users.family as family', 'order_items.id as id', 'order_items.link as website', 'order_items.status', 'order_items.price as price', 'order_items.created_at as date')
                ->where('order_items.deleted_at', null)
                ->where('order_items.status', $status)
                ->get();

            $invoices = DB::table('invoices')
                ->leftJoin('users', 'invoices.user_id', 'users.id')
                ->select(DB::raw('2 as type'), 'users.name as name', 'users.family as family', 'invoices.id as id', 'invoices.shop as website', 'invoices.status', 'invoices.price as price', 'invoices.created_at as date')
                ->where('invoices.deleted_at', null)
                ->where('invoices.status', $status)
                ->get();
        } elseif ($status == 6 || $status == 7 || $status == 8) {
            $orders = DB::table('order_items')
                ->leftJoin('orders', 'order_items.order_id', 'orders.id')
                ->leftJoin('users', 'orders.user_id', 'users.id')
                ->select(DB::raw('1 as type'), 'users.name as name', 'users.family as family', 'order_items.id as id', 'order_items.link as website', 'order_items.status', 'order_items.price as price', 'order_items.created_at as date')
                ->where('order_items.deleted_at', null)
                ->where('order_items.status', $status)
                ->get();

            $invoices = DB::table('invoices')
                ->leftJoin('users', 'invoices.user_id', 'users.id')
                ->select(DB::raw('2 as type'), 'users.name as name', 'users.family as family', 'invoices.id as id', 'invoices.shop as website', 'invoices.status', 'invoices.price as price', 'invoices.created_at as date')
                ->where('invoices.deleted_at', null)
                ->where('invoices.status', $status)
                ->get();
        } else {
            $orders = DB::table('order_items')
                ->leftJoin('orders', 'order_items.order_id', 'orders.id')
                ->leftJoin('users', 'orders.user_id', 'users.id')
                ->select(DB::raw('1 as type'), 'users.name as name', 'users.family as family', 'order_items.id as id', 'order_items.link as website', 'order_items.status', 'order_items.price as price', 'order_items.created_at as date')
                ->where('order_items.deleted_at', null)
                ->where('order_items.status', 0)
                ->get();

            $invoices = DB::table('invoices')
                ->leftJoin('users', 'invoices.user_id', 'users.id')
                ->select(DB::raw('2 as type'), 'users.name as name', 'users.family as family', 'invoices.id as id', 'invoices.shop as website', 'invoices.status', 'invoices.price as price', 'invoices.created_at as date')
                ->where('invoices.deleted_at', null)
                ->where('invoices.status', 0)
                ->get();
        }


        $orders = $invoices->merge($orders);
        $count_order = (int)floor(count($orders) / 10);
        $counts = count($orders);
//        $orders = collect($orders)->forPage($_GET['page'] ?? "1" , 10);

        return View::make('admin.orders.index', compact('orders', 'counts'), with([
            'sortField' => Order::sortField,
            'count_order' => $count_order,
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
                ->whereHas('user', function (Builder $query) use ($search) {
                })
                ->select(Order::selectField)
                ->paginate(30);

        $countorders = Payment::query()
            ->orWhere('price', 'like', '%' . $search . '%')
            ->count();

        return View::make('admin.orders.index', compact('orders'), with([
            'sortField' => Order::sortField,
            'sortType' => Order::sortType,
            'countorders' => $countorders,
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
        orderItem::query()->where('order_id', $id)->delete();
        session()->flash('message', __('custom.order.message.delete'));
        session()->flash('success', 1);
        return redirect()->back();

    }

    public function status($id, $type)
    {
        OrderItem::query()->find($id)->update([
            'status' => $type,
        ]);


        session()->flash('message', __('custom.order.message.update'));
        session()->flash('success', 1);
        return redirect()->back();

    }

}
