<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\PriceItem;
use App\Setting;

class PriceItemController extends Controller
{

    public function __invoke($weight)
    {
        $price = PriceItem::where('from', '<=', $weight)
            ->where('to', '>=', $weight)
            ->value('price');

        if ($weight >= Setting::getValue(Setting::FIELD_MAX_WEIGHT)) {
            $price = Setting::getValue(Setting::FIELD_MAX_WEIGHT_PRICE);
        }

        return response()->json(
            [
                'price' => $price ?? 0
            ]
        );
    }
}
