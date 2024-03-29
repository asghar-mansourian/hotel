<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Member\InvoiceRequest;
use App\Http\Resources\V1\Invoice as InvoiceResource;
use App\Invoice;
use App\Order;

class InvoiceController extends Controller
{

    public function index()
    {
        if (request('country') != null) {
            if (request('status') != null)
                return InvoiceResource::collection(
                    auth()->user()->invoices()->where('country_id', request('country'))->where('status', request('status'))->paginate(
                        request('per_page', 10)
                    )
                );
            return InvoiceResource::collection(
                auth()->user()->invoices()->where('country_id', request('country'))->paginate(
                    request('per_page', 10)
                )
            );
        }
        return InvoiceResource::collection(
            auth()->user()->invoices()->paginate(
                request('per_page', 10)
            )
        );
    }

    public function store(InvoiceRequest $request)
    {
        $data = $request->validated();
        $data['status'] = Order::STATUS_PURCHASED;

        $invoice = auth()->user()->invoices()->create(
            $data
        );

        if (!$invoice) {
            return response([
                'message' => __('member.invoice.failed_success')
            ], 500);
        }
//          cowsel api
//        InvoiceCowsel::Store($request);

        return response([
            'message' => __('member.invoice.store_success'),
            'invoice' => InvoiceResource::make($invoice)
        ]);
    }

    public function getStatusKey()
    {
        $collections = collect([]);

        foreach (Invoice::STATUS_ALL as $key => $value) {
            $collections->put(str_replace('_', ' ', Invoice::STATUS_ALL[$key]), $key);
        }
        $statusKey = $collections->all();
        return response()->json([
            'data' => $statusKey
        ], 200);
    }
}
