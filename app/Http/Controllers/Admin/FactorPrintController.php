<?php

namespace App\Http\Controllers\Admin;

use App\Box;
use App\Currency;
use App\Http\Controllers\Controller;
use App\OrderBarcode;

class FactorPrintController extends Controller
{
    public function printFactorWarehouseAbroad($barcode, $factor_type)
    {
        if ($factor_type == 3) {
            $box = Box::where('barcode', $barcode)->first();

            $boxWeight = 0;
            $user = null;

            $box->boxItems->each(function ($boxItem) use (&$boxWeight, &$user) {
                $boxWeight += $boxItem->orderable->weight;

                if (!$user) {
                    $getTable = $boxItem->orderable()->getModel()->getTable();

                    if ($getTable == 'invoices') {
                        $user = $boxItem->orderable->user;
                    } elseif ($getTable == 'order_items') {
                        $user = $boxItem->orderable->order->user;
                    }
                }
            });


            return view('admin.print_pages.factor_box', compact('box', 'boxWeight', 'user'));
        }

        $barcode = OrderBarcode::where('barcode', $barcode);
        if (!$barcode->exists()) {
            return response()->json(['message' => 'Barcode Not Found!!!ٔ']);
        }

        $barcode = $barcode->first();

        $getTable = $barcode->orderable()->getModel()->getTable();

        if ($getTable == 'invoices') {
            $user = $barcode->orderable->user;
        } elseif ($getTable == 'order_items') {
            $user = $barcode->orderable->order->user;
        }

        $toValue = Currency::query()
            ->where('from', 'TRY')
            ->where('to', 'USD')
            ->first()->to_value;

        $priceDollar = $barcode->orderable->price * $toValue;

        if ($factor_type == 1) {
            return view('admin.print_pages.factor_warehouse_abroad', compact('barcode', 'user', 'priceDollar'));
        } elseif ($factor_type == 2) {
            return view('admin.print_pages.factor2_warehouse_abroad', compact('barcode', 'user', 'priceDollar'));
        }
    }
}
