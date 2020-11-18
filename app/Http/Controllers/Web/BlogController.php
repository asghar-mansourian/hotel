<?php

namespace App\Http\Controllers\Web;

use App;
use App\Blog;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\ValidatorRequest;
use Illuminate\Support\Facades\View;

class BlogController extends Controller
{
    use ValidatorRequest;

    public function index()
    {
        $blogs = Blog::query()
            ->with('author')
            ->select(Blog::selectField)
            ->orderBy(Blog::sortField, Blog::sortType)
            ->paginate(Blog::paginateNumber);
        return View::make('web.blog', compact('blogs'), with([
            'sortField' => Blog::sortField,
            'sortType' => Blog::sortType
        ]));

    }

    public function singel($slug)
    {
        $blog = Blog::query()
            ->with('author')
            ->select(Blog::selectField)
            ->where('slug' , $slug)
            ->first();

        $last_news = Blog::query()
            ->select(Blog::selectField)
            ->orderBy('created_at', 'desc')
            ->take(3)->get();

        return View::make('web.singel', compact('blog', 'last_news'), with([
            'sortField' => Blog::sortField,
            'sortType' => Blog::sortType
        ]));

    }




}
