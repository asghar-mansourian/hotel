<?php

namespace App\Http\Controllers\Api\V1;

use App\Courier;
use App\CourierProductItem;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\StoreCourier;
use App\Http\Requests\StoreCourierRequest;
use App\Http\Resources\V1\Courier as CourierResource;
use App\Invoice;
use App\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CourierController extends Controller
{
    use StoreCourier;

    public function index()
    {
        return CourierResource::collection(
            auth()->user()->couriers
        );
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

        return $this->stored();
    }

    public function stored()
    {
        return response([
            'message' => __('member.general.message.create_success'),
        ]);
    }

    public function productItems()
    {
        $orders = auth()->user()->orders()->where('status', Order::STATUS_COURIER_DELIVERY)->get();

        $invoices = auth()->user()->invoices()->where('status', Invoice::STATUS_COURIER_DELIVERY)->get();

        return response([
            'orders' => $orders,
            'invoices' => $invoices
        ]);
    }
}
