<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Page;

class PageController extends Controller
{

    public function __invoke($id)
    {
        $page = Page::select($this->customSelectedFields())->where('id' , $id)->first();


        return view('web.page', compact('page'));
    }

    public function customSelectedFields()
    {
        $locale = app()->getLocale();

        $content = app()->getLocale() !== 'en' ? "content_{$locale} as content" : 'content';
        $title = app()->getLocale() !== 'en' ? "title_{$locale} as title" : 'title';

        return [$title, $content, 'slug', 'status'];
    }
}
