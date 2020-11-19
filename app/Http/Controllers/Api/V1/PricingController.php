<?php

namespace App\Http\Controllers\Api\V1;

use App\Calculator;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\Pricing as PricingResource;

class PricingController extends Controller
{
    public function list()
    {
        return PricingResource::collection(
            Calculator::all()
        );
    }
}
