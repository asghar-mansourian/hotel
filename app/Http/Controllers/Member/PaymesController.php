<?php

namespace App\Http\Controllers\Member;

use App\Basket;
use App\Courier;
use App\Http\Controllers\Controller;
use App\Http\Requests\GatePaymesRequest;
use App\Order;
use App\OrderItem;
use App\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PaymesController extends Controller
{
    public function payViewForm(Payment $payment)
    {
        return view('members.payment_gate_paymes_api', compact('payment'));
    }

    public function pay(GatePaymesRequest $request)
    {
        $payment = Payment::find($request->get('payment_id'));

        $user = $payment->user ;

        if (!$user){
            return back()->with('message', __('member.paid_failed_user_not_logged'))->with('danger', true);
        }

        $price = $payment->price;

        $cardNumber = $request->get('card-number') . $request->get('card-number-1') . $request->get('card-number-2') . $request->get('card-number-3');
        $holder = $request->get('holder');
        $expMonth = $request->get('expMonth');
        $expYear = substr($request->get('expYear'), 2);
        $cvv = $request->get('cvv');
        $randIP = "" . mt_rand(0, 255) . "." . mt_rand(0, 255) . "." . mt_rand(0, 255) . "." . mt_rand(0, 255);

        $url = "https://web.paym.es/api/authorize";

        $arParams = array(
            "secret" => env('PAYMES_SECRET', null),
            "operationId" => $payment->id,

            "number" => $cardNumber,
            "installmentsNumber" => "1",
            "expiryMonth" => $expMonth,
            "expiryYear" => $expYear,
            "cvv" => $cvv,

            "owner" => $user->name . ' ' . $user->family,

            "bilingFirstname" => $user->name,
            "bilingLastname" => $user->family ? $user->family : $user->name,
            "bilingEmail" => $user->email,
            "bilingPhone" => $user->phone,
            "bilingCountrycode" => "TR",
            "bilingAddressline1" => "LİNEX",
            "bilingCity" => "ISTANBUL",

            "deliveryFirstname" => "SHTORMEX DİJİTAL PAZARLAMA VE",
            "deliveryLastname" => "TİCARET LİMİTED ŞİRKETİ",
            "deliveryPhone" => "0994552002252",
            "deliveryAddressline1" => "FATİH MAH. PROF. DR. AZİZ SANCAR CAD. SALIMBEY APT NO 20/2 D7",
            "deliveryCity" => "ISTANBUL",

            "clientIp" => $randIP,

            "productName" => "Gömlek",
            "productSku" => "215",
            "productQuantity" => "1",
            "productPrice" => $price,
            "currency" => $payment->balance_type == Payment::PAYMENT_TYPE_BALANCE_TWO ? "USD" : "TRY",
        );

        $response = Http::asForm()
            ->post(
                $url,
                $arParams
            )->object();

        if (!is_object($response)) {
            return back()->with('message', __('member.paid_failed'))->with('danger', true);
        }

        if ($response->message == 'billingLastname is null') {
            return back()->with('message', $response->message)->with('danger', true);
        }

        if ($response->status == 'ERROR') {
            return back()->with('message', $response->message)->with('danger', true);
        }

        if ($response->message === '3DS Enrolled Card.' || $response->message === 'AUTHORIZE') {
            $reference = $response->payuPaymentReference;
            if (!empty($reference)) {
                $payment->update(['refid' => $reference]);
                if (($response->message === '3DS Enrolled Card.') && (!empty($response->paymentResult->url))) {
                    return redirect()->to($response->paymentResult->url);
                }
            }
        } else {
            return back()->with('message', $response->message)->with('danger', true);
        }
    }

    public function callback(Request $request)
    {
        if (isset($request->payuPaymentReference)
            && !empty($request->payuPaymentReference)
            && isset($request->message)
            && !empty($request->message)
        ) {

            $payment = Payment::where('refid', $request->payuPaymentReference)->first();

            $referenNo = $request->payuPaymentReference;

            if ($request->message == 'AUTHORIZED' && $payment->status) {
                return view('members.check')->with([
                    'message' => __('member.general.message.paid_successful')
                ]);
            }

            if ($request->message == 'AUTHORIZED' && !$payment->status) {

                $payment_type_balance = $payment->balance_type;
                $modelable_id = $payment->modelable_id;
                $modelable_type = $payment->modelable_type;


                if ($payment->modelable_type == "App\Order" && $payment->modelable_id != null) {
                    $orders = OrderItem::where('order_id', $payment->modelable_id)->get();
                    foreach ($orders as $item) {
                        Basket::where('link', $item->link)->where('user_id', $payment->user_id)->delete();
                        $item->update(['status'=>OrderItem::STATUS_ORDERED]);
                    }
                    Order::query()->where('id',$payment->modelable_id)->update(['status'=>1]);
                }

                // paid debt balance.
//                if ($payment->orderable) {
//                    if ($payment->orderable->getModel()->getTable() === DebtFactor::query()->getModel()->getTable()) {
//                        $debtFactor = $payment->orderable;
//
//                        foreach ($debtFactor->debtFactorItems as $debtFactorItem) {
//                            $debtFactorItem->debtAmount()->update(['status_paid' => DebtAmount::STATUS_PAID]);
//                            if ($debtFactorItem->debtAmount) {
//                                // change status paid.
//                                if ($debtFactorItem->debtAmount->orderable->getModel()->getTable() === Courier::query()->getModel()->getTable()) {
//                                    $debtFactorItem->debtAmount->orderable->update(['status_paid' => 1]);
//                                }
//                            }
//                        }
//                    }
//                }

                $payment->update(
                    [
                        'status' => 1,
                        'refid' => $referenNo
                    ]
                );

                if ($payment->where('type', Payment::PAYMENT_TYPE_CASH)->exists()) {
                    if ($modelable_id == null && $modelable_type == null) {
                        if ($payment_type_balance == Payment::PAYMENT_TYPE_BALANCE_ONE) {
                            $payment->user->increment('balance', $payment->price);
//                            BalanceCowsel::increase($payment->user, $payment->price, 'TL');
                        } else {
                            $payment->user->increment('usd_balance', $payment->price);
//                            BalanceCowsel::increase($payment->user, $payment->price, 'USD');
                        }
                    }

                }

            } else {
//                dd($request->all(), 177, $user, tenant('id'));
                $payment->update(
                    [
                        'status' => 0,
                        'refid' => $referenNo
                    ]
                );

                return view('members.check')->with([
                    'message' => __('member.general.message.paid_unsuccessful')
                ]);
            }
        } else {
//            dd($request->all(),190, $user);
            return view('members.check')->with([
                'message' => __('member.general.message.paid_unsuccessful')
            ]);
        }


        return view('members.check')->with([
            'message' => __('member.general.message.paid_successful')
        ]);
    }
}
