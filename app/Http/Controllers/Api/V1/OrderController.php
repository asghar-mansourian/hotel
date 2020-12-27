<?php

namespace App\Http\Controllers\Api\V1;

use App\Basket;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\StoreOrder;
use App\Http\Resources\V1\Order as OrderResource;
use App\Order;
use App\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    use StoreOrder;


    public function index()
    {
        if(request('status') != null)
        {
            $type = request('status');
            return OrderResource::collection(
                auth()->user()->orders()->where('status',$type)->with('orderItems')->paginate(
                    request('per_page', 10)
                )
            );
        }
        return OrderResource::collection(
            auth()->user()->orders()->with('orderItems')->paginate(
                request('per_page', 10)
            )
        );
    }

    public function stored($order)
    {
        // check balance
        if ($order->payment_type == Order::PAYMENT_TYPE_CASH) {
            return $this->paidViaCash($order);
        }

        if ($order->payment_type == Order::PAYMENT_TYPE_ONLINE) {
            return $this->paidViaOnline($order);
        }
    }


    public function paidViaCash($order)
    {
        // if balance less order total then remove order & order items
        if (auth()->user()->balance < $order->total) {

            $order->orderItems()->delete();
            $order->delete();

            return response()->json([
                'message' => 'your balance is less of order price total. please try again'
            ], 402);
        }

        DB::transaction(function () use ($order) {
            $user = auth()->user();
            foreach ($order->orderItems as $item){
                Basket::where('link' , $item->link)->where('user_id' , $user->id)->delete();
            }
            $payment = new Payment();
            $payment->user_id = $user->id;
            $payment->type = Payment:: PAYMENT_TYPE_CASH;
            $payment->description = 'payment by wallet';
            $payment->price = $order->total;
            $payment->status = Payment::PAYMENT_STATUS_PAID;
            $order->payment()->save($payment);

            $user->decrement('balance', $order->total);

            $order->status = 1;
            $order->save();
        });

        return response()->json([
            'message' => 'Successfully paid'
        ]);
    }

    public function paidViaOnline($order)
    {
        return (new PaymentController())->paymentOrder($order);
    }

    public function getStatusKey()
    {
        $collections = collect([]);


        foreach (Order::STATUS_ALL as $key=>$value){
            $collections->put(str_replace('_',' ',Order::STATUS_ALL[$key]),$key);
        }
        $statusKey = $collections->all();
        return response()->json([
            'data' => $statusKey
        ] , 200);
    }


    public function basket()
    {
        $baskets = Basket::where('user_id' , auth()->user()->id)->get();
        return response()->json([
            'data' => $baskets,
        ] , 200);
    }

    public function deleteBasket(Request $request)
    {
        $basket = Basket::where('id' , $request->id)->where('user_id' , auth()->user()->id)->first();
        if (!!$basket){
            Basket::where('id' , $request->id)->delete();

        }

        return response()->json([
            'message' => 'deleted successful',
        ] , 200);

    }
}
