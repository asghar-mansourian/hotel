<?php

namespace App\Http\Controllers\Web;

use App\Country;
use App\Http\Controllers\Controller;
use App\PriceItem;
use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    public function __invoke()
    {
        $calculatorCountries = Country::whereIn('id', PriceItem::query()->distinct('countries_id')->pluck('countries_id'))->get();

        return view('web.calculator',compact('calculatorCountries'));
    }
}
