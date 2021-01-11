<?php


namespace App\Http\Controllers\Traits;


use App\Basket;
use App\Http\Controllers\Member\CrawlerWebsiteController;
use App\Http\Requests\Member\BasketRequest;
use App\lib\Helpers;
use App\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

trait StoreOrder
{
    public function store(Request $request)
    {
        $orders = Basket::query()->whereIn('id', $request->basketItem)->get();
        if ($orders->sum('total') <= floatval(auth()->user()->balance)) {
            $paymentType = 1;
        } else {
            $paymentType = 0;
        }

        $countryId = $orders->first()->country_id;
        $branchId = $orders->first()->branch_id ?? null;
        $links = $request->get('link');
        $prices = $request->get('price');

        $quantities = $request->get('quantity');
        $specifications = $request->get('specification');
        $colors = $request->get('color');
        $descriptions = $request->get('description');

        $order = false;
        DB::transaction(function () use (&$order, $orders, $countryId, $paymentType, $branchId, $links, $prices, $quantities, $specifications, $colors, $descriptions) {
            $order = auth()->user()->orders()->create(
                [
                    'country_id' => $countryId,
                    'payment_type' => $paymentType,
                    'branch_id' => null
                ]
            );
//            $myorder = [
//                'color' =>
//            ];

            //                cowsel
//            $cowsel_id = OrderAlias::storeGetId();

            foreach ($orders as $item) {
                $orderItem = new OrderItem();
                $orderItem->link = $item->link;
                $orderItem->price = $item->price;
                $orderItem->has_cargo = $item->has_cargo;
                $orderItem->cargo = $item->cargo;
                $orderItem->quantity = $item->quantity;
                $orderItem->status = $paymentType ? OrderItem::STATUS_ORDERED : OrderItem::STATUS_BASKET;
                $orderItem->specification = $item->specification;
                $orderItem->color = $item->color;
                $orderItem->description = $item->description;
                $orderItem->total = $this->calcTotalOrderPrice($orderItem);

//                cowsel
//                OrderAlias::urunStore($orderItem , $cowsel_id);
                $order->orderItems()->save($orderItem);

            }

            $order->total = $order->orderItems()->sum('total');
            $order->save();
        });
        return $this->stored($order);
    }

    private function calcTotalOrderPrice($orderItem)
    {
        $total = ($orderItem->quantity * $orderItem->price) + $orderItem->cargo;

        $percentage = ((Helpers::getTaxOrder() / 100) * $total);

        return str_replace(',', '', number_format((float)($total + $percentage), 2));
    }

    public function stored($order)
    {
        return $order;
    }

    public function storeToBasket(BasketRequest $request)
    {
        $countryId = $request->get('country_id');
        $paymentType = $request->get('payment_type');
        $branchId = $request->get('branch_id') ?? null;

        $links = $request->get('link');
        $prices = $request->get('price');
//        $has_cargos = $request->get('has_cargo');
//        $cargos = $request->get('cargo');
        $quantities = $request->get('quantity');
        $specifications = $request->get('specification');
        $colors = $request->get('color');
        $descriptions = $request->get('description');
        if ($request->has('cargo')) {
            $has_cargos = 1;
            $cargos = $request->get('cargo');
        } else {
            $has_cargos = 0;
            $cargos = 0;
        }
        $order = false;
        $crawel_model = new CrawlerWebsiteController();
        DB::transaction(function () use (&$order, $crawel_model, $cargos, $has_cargos, $countryId, $paymentType, $branchId, $links, $prices, $quantities, $specifications, $colors, $descriptions) {
            foreach ($links as $key => $link) {
                $basketItem = new Basket();
                $basketItem->link = $link;
                $basketItem->country_id = $countryId;
                $basketItem->branch_id = null;
                $basketItem->user_id = auth()->user()->id;
                $basketItem->price = $prices[$key];
                $basketItem->has_cargo = $cargos[$key] ? "1" : "0";
                $basketItem->cargo = $cargos[$key] ?? 0;
                $basketItem->quantity = $quantities[$key];
                $basketItem->specification = $specifications[$key];
                $basketItem->color = $colors[$key];
                $basketItem->description = $descriptions[$key];
                $resultPrice = $crawel_model->get($link);
                $basketItem->total = $this->calcTotalOrderPrice($basketItem);
                if ($resultPrice) {
                    if ($resultPrice != $prices[$key]) {
                        continue;
                    }
                }
                $basketItem->save();

            }

        });
        if (request()->is('api/v*')) {
            return response()->json([
                "message" => "save order has been successful",
            ], 200);
        } else {
            return redirect()->to('/basket');
        }


    }

    public function basket()
    {
        $baskets = Basket::where('user_id', auth()->user()->id)->get();
        return view('members.basket', compact('baskets'));
    }


}
