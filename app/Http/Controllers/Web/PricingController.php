<?php

namespace App\Http\Controllers\Web;

use App\Calculator;
use App\Country;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PricingController extends Controller
{
    public function index()
    {
        $countries = Country::whereIn('id', Calculator::query()->distinct('country_id')->pluck('country_id'))->get();

        return view('web.pricing')->with(compact('countries'));
    }
}
