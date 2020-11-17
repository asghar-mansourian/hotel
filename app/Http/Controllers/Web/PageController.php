<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Page;

class PageController extends Controller
{

    public function __invoke($slug)
    {
        $page = Page::findViaSlug($slug);

        return view('web.page', compact('page'));
    }
}
