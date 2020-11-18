<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\PriceItem;

class PriceItemController extends Controller
{

    public function __invoke($weight)
    {
        $price = PriceItem::where('from', '<=', $weight)
            ->where('to', '>=', $weight)
            ->value('price');

        return response()->json(
            [
                'price' => $price ?? 0
            ]
        );
    }
}
