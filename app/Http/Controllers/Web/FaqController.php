<?php

namespace App\Http\Controllers\Web;

use App;
use App\Blog;
use App\Faq;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\ValidatorRequest;
use Illuminate\Support\Facades\View;

class FaqController extends Controller
{
    use ValidatorRequest;

    public function index()
    {
        $faqs = Faq::query()
            ->select($this->customSelectedFields())
            ->orderBy(Faq::sortField, Blog::sortType)
            ->paginate(Faq::paginateNumber);

        return View::make('web.faq', compact('faqs'), with([
            'sortField' => Faq::sortField,
            'sortType' => Faq::sortType
        ]));

    }

    private function customSelectedFields()
    {
        $locale = app()->getLocale();

        $content = app()->getLocale() !== 'en' ? "content_{$locale} as content" : 'content';
        $title = app()->getLocale() !== 'en' ? "title_{$locale} as title" : 'title';

        return [$title, $content, 'id'];
    }

}
