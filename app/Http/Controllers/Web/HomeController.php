<?php

namespace App\Http\Controllers\Web;

use App\Blog;
use App\Calculator;
use App\Country;
use App\Http\Controllers\Controller;
use App\lib\Helpers;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        CurrencyController::getCurrencyFromCrawel();
        CurrencyController::getCurrencyFromTwoApi();

        $blogs = Blog::latest()->take(2)->get();

        $countries = Country::whereIn('id', Calculator::query()->distinct('country_id')->pluck('country_id')->take(2))->get();

        return view('web.home', compact('blogs', 'countries'));
    }

    public function setLocale($locale)
    {
        if (Helpers::getLocales()->where('locale', $locale)->count()) {
            Session::put('applocale', $locale);
        }

        return back();
    }
}
