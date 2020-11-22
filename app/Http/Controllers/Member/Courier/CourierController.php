<?php

namespace App\Http\Controllers\Member\Courier;

use App\Courier;
use App\CourierProductItem;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCourierRequest;
use App\Invoice;
use App\Order;
use App\Stock;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CourierController extends Controller
{
    public function index()
    {
        $stocks = Stock::all();

        $orders = Order::where('status', Order::STATUS_COURIER_DELIVERY)->get();

        $invoices = Invoice::where('status', Invoice::STATUS_COURIER_DELIVERY)->get();

        return view('members.courier.index', compact('stocks', 'orders', 'invoices'));
    }

    public function store(StoreCourierRequest $request)
    {
        DB::transaction(function () use ($request) {
            $courier = new Courier();
            $courier->stock_id = $request->stock_id;
            $courier->district = $request->district;
            $courier->city = $request->city;
            $courier->street = $request->street;
            $courier->home = $request->home;
            $courier->phone = $request->phone;
            $courier->address = $request->address;
            auth()->user()->couriers()->save($courier);


            foreach ($request->products as $product) {
                list($model, $id) = explode('-', $product);

                $modelStr = "App\\" . Str::studly($model);

                $model = $modelStr::find($id);

                $courierProductItem = new CourierProductItem();
                $courierProductItem->courier_id = $courier->id;
                $model->CourierProductItems()->save($courierProductItem);
            }

        });

        request()->session()->flash('message', __('member.general.message.create_success'));
        request()->session()->flash('success', 1);

        return back();
    }
}
