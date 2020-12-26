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
            ->where('to', '>=', $weight);

        if ($price->exists()) {
            $has_weight = $price->value('has_weight');

            if ($has_weight) {
                $price = Helpers::formatPrice($price->value('price') * $weight);
            } else {
                $price = $price->value('price');
            }
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
