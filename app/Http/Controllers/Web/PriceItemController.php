<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\lib\Helpers;
use App\PriceItem;
use App\Setting;

class PriceItemController extends Controller
{

    public function __invoke($weight)
    {
        $price = PriceItem::where('from', '<=', $weight)
            ->where('to', '>=', $weight)
            ->value('price');

        if (Setting::getValue(Setting::FIELD_IS_CALCULATE_THE_WEIGHT)) {
            $price = Helpers::formatPrice($price * $weight);
        }

        if ($weight >= Setting::getValue(Setting::FIELD_MAX_WEIGHT)) {
            $price = Helpers::formatPrice(Setting::getValue(Setting::FIELD_MAX_WEIGHT_PRICE) * $weight);
        }

        return response()->json(
            [
                'price' => $price ?? 0
            ]
        );
    }
}
