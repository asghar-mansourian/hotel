<?php


namespace App\Http\Controllers\Traits;


use App\Courier;
use App\CourierProductItem;
use App\Http\Requests\StoreCourierRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

trait StoreCourier
{

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
}
