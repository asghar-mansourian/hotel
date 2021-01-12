<?php

namespace App\Http\Middleware;

use App\lib\Helpers;
use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

class Locale
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Session::has('applocale') && Helpers::getLocales()->where('locale', Session::has('applocale'))) {
            App::setLocale(Session::get('applocale'));
        } else {
            App::setLocale(Config::get('app.fallback_locale'));
        }

        if (auth()->check()) {
            auth()->user()->update(['current_lang' => App::getLocale()]);
        }
        return $next($request);
    }
}
