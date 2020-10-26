<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Member\InvoiceRequest;
use App\Http\Resources\V1\Invoice as InvoiceResource;

class InvoiceController extends Controller
{

    public function store(InvoiceRequest $request)
    {
        $invoice = auth()->user()->invoices()->create(
            $request->validated()
        );

        if (!$invoice) {
            return response([
                'message' => __('member.invoice.failed_success')
            ], 500);
        }

        return response([
            'message' => __('member.invoice.store_success'),
            'invoice' => InvoiceResource::make($invoice)
        ]);
    }
}
