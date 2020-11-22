<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\Stock as StockResource;
use App\Stock;

class StockController extends Controller
{
    public function __invoke()
    {
        return StockResource::collection(
            Stock::all()
        );
    }


}
