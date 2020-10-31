<?php

namespace App\Http\Controllers\Member\Order;

use App\Branch;
use App\Country;
use App\Http\Controllers\Controller;
use App\Http\Requests\Member\OrderRequest;
use App\lib\Helpers;
use App\OrderItem;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function create()
    {
        $countries = Country::all();

        $branches = Branch::latest()->get();

        return view('members.orders.create', compact('countries', 'branches'));
    }

    public function store(OrderRequest $request)
    {
        $countryId = $request->get('country_id');
        $paymentType = $request->get('payment_type');
        $branchId = $request->get('branch_id');

        $links = $request->get('link');
        $prices = $request->get('price');
        $has_cargos = $request->get('has_cargo');
        $cargos = $request->get('cargo');
        $quantities = $request->get('quantity');
        $specifications = $request->get('specification');
        $descriptions = $request->get('description');

        $order = false;
        DB::transaction(function () use (&$order, $countryId, $paymentType, $branchId, $links, $prices, $has_cargos, $cargos, $quantities, $specifications, $descriptions) {

            $order = auth()->user()->orders()->create(
                [
                    'country_id' => $countryId,
                    'payment_type' => $paymentType,
                    'branch_id' => $branchId
                ]
            );

            foreach ($links as $key => $link) {

                $orderItem = new OrderItem();
                $orderItem->link = $link;
                $orderItem->price = $prices[$key];
                $orderItem->has_cargo = $has_cargos[$key];
                $orderItem->cargo = $cargos[$key] ?? 0;
                $orderItem->quantity = $quantities[$key];
                $orderItem->specification = $specifications[$key];
                $orderItem->description = $descriptions[$key];
                $orderItem->total = $this->calcTotalOrderPrice($orderItem);

                $order->orderItems()->save($orderItem);
            }

            $order->total = $order->orderItems()->sum('total');
            $order->save();
        });

        if ($order) {
            session()->flash('message', __('member.general.message.create_success'));
            session()->flash('success', 1);
        } else {
            $request->session()->flash('danger', 1);
            $request->session()->flash('message', 'member.general.message.create_failed');
        }

        return back();
    }

    private function calcTotalOrderPrice(OrderItem $orderItem)
    {
        $total = ($orderItem->quantity * $orderItem->price) + $orderItem->cargo;

        $percentage = ((Helpers::getTaxOrder() / 100) * $total);

        return number_format((float)($total + $percentage), 2);
    }
}
