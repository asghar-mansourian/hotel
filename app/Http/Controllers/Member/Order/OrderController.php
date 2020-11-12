<?php

namespace App\Http\Controllers\Member\Order;

use App\Branch;
use App\Country;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Member\PaymentController;
use App\Http\Controllers\Traits\StoreOrder;
use App\Order;
use App\OrderItem;
use App\Payment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    use StoreOrder;

    public function index()
    {
        $orders = OrderItem::query();
        $user = Auth::user();

        if (isset($_GET['type'])) {
            $type = $_GET['type'];
            $orders->where('status', $type);
        }
        $orders
            ->with(
                [
                    'order.user' => function ($query) use ($user) {
                        $query->where('id', $user->id);
                    }
                ]);
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

            request()->session()->flash('danger', 1);
            request()->session()->flash('message', 'member.general.message.your_balance_is_less');

            return back();
        }

        DB::transaction(function () use ($order) {
            $user = auth()->user();

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

        request()->session()->flash('message', __('member.general.message.paid_successful'));
        request()->session()->flash('success', 1);

        return redirect()->route('orders.index');
    }

    public function paidViaOnline($order)
    {
        return (new PaymentController())->gate($order);
    }
}
