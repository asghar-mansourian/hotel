<?php

namespace App\Http\Controllers\Member;

use App\Country;
use App\CountryDetail;
use App\Http\Controllers\Controller;

class CountryDetailController extends Controller
{


    public function index()
    {
        $countries = Country::all();
        $details = CountryDetail::all();

        return view('members.country-detail.index', compact('countries', 'details'));
    }
}
