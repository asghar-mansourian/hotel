<?php

namespace App\Http\Controllers\Web;

use App;
use App\Blog;
use App\Faq;
use App\Http\Controllers\Admin\traits\ValidatorRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class FaqController extends Controller
{
    use ValidatorRequest;

    public function index()
    {
        $faqs = Faq::query()
            ->select(Faq::selectField)
            ->orderBy(Faq::sortField, Blog::sortType)
            ->paginate(Faq::paginateNumber);
        return View::make('web.faq', compact('faqs'), with([
            'sortField' => Faq::sortField,
            'sortType' => Faq::sortType
        ]));

    }


}
