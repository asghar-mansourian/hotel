<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        "admin/users/search",
        "admin/users/sort",
        "admin/countries/load",
        "admin/countries/search",
        "admin/countries/sort",
        "admin/countries/load",
        "admin/regions/search",
        "admin/regions/sort",
        "admin/regions/load",
        "admin/blogs/search",
        "admin/blogs/sort",
        "admin/blogs/load",
        "admin/pages/search",
        "admin/pages/sort",
        "admin/pages/load",
        "setting/getCurrency",
        "convert",
    ];
}
