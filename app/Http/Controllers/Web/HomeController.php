<?php

namespace App\Http\Controllers\Web;

use App\Blog;
use App\Calculator;
use App\Country;
use App\Customer;
use App\Http\Controllers\Controller;
use App\lib\Helpers;
use App\Slider;
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

        $blogs = Blog::select($this->customSelectedFields())->latest()->take(3)->get();

        $countries = Country::whereIn('id', Calculator::query()->distinct('country_id')->pluck('country_id')->take(2))->get();

        $customers = Customer::paginate(16);

        $sliders = Slider::all();

        return view('web.home', compact('sliders' , 'blogs', 'countries','customers'));
    }

    public function setLocale($locale)
    {
        if (Helpers::getLocales()->where('locale', $locale)->count()) {
            Session::put('applocale', $locale);
        }

        return back();
    }

    private function customSelectedFields()
    {
        $locale = app()->getLocale();

        $content = app()->getLocale() !== 'en' ? "content_{$locale} as content" : 'content';
        $title = app()->getLocale() !== 'en' ? "title_{$locale} as title" : 'title';

        return [$title, 'slug', 'created_at', $content, 'author_id', 'picture', 'status', 'id'];
    }
}
