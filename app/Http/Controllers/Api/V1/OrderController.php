<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\StoreOrder;
use App\Http\Resources\V1\Order as OrderResource;

class OrderController extends Controller
{
    use StoreOrder;


    public function index()
    {
        return OrderResource::collection(
            auth()->user()->orders()->with('orderItems')->paginate(
                request('per_page', 10)
            )
        );
    }

    public function stored($order)
    {

        if (!$order) {
            return response([
                'message' => __('member.order.failed_success')
            ], 500);
        }

        return response([
            'message' => __('member.order.store_success')
        ]);
    }
}
