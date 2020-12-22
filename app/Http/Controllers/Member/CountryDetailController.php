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
        $details = CountryDetail::query()->select($this->customSelectedFields())->get();
        return view('members.country-detail.index', compact('countries', 'details'));
    }
    private function customSelectedFields()
    {
        $locale = app()->getLocale();

        $name = app()->getLocale() !== 'en' ? "name_{$locale} as name" : 'name';
        $value = app()->getLocale() !== 'en' ? "value_{$locale} as value" : 'value';

        return [$name , $value , 'country_id' , 'can_copy'];

    }
}
