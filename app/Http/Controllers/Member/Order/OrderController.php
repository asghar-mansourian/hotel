<?php

namespace App\Http\Controllers\Member\Order;

use App\Branch;
use App\Country;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\StoreOrder;
use App\Order;
use App\OrderItem;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    use StoreOrder;

    public function index()
    {
        $user = Auth::user();

        $orders = OrderItem::query()
            ->with(['order.user' => function ($query) use ($user) {
                $query->where('id', $user->id);
            }])
            ->get();
        $countries = Country::all();

        return view('members.orders.index', compact('orders', 'countries'));
    }

    public function create()
    {
        $countries = Country::all();

        $branches = Branch::latest()->get();

        return view('members.orders.create', compact('countries', 'branches'));
    }

    public function stored($order)
    {
        if ($order) {
            request()->session()->flash('message', __('member.general.message.create_success'));
            request()->session()->flash('success', 1);
        } else {
            request()->session()->flash('danger', 1);
            request()->session()->flash('message', 'member.general.message.create_failed');
        }

        return back();
    }
}
