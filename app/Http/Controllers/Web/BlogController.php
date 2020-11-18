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
            ->select($this->customSelectedFields())
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
            ->select($this->customSelectedFields())
            ->where('slug', $slug)
            ->first();

        $last_news = Blog::query()
            ->select($this->customSelectedFields())
            ->orderBy('created_at', 'desc')
            ->take(3)->get();

        return View::make('web.singel', compact('blog', 'last_news'), with([
            'sortField' => Blog::sortField,
            'sortType' => Blog::sortType
        ]));

    }

    private function customSelectedFields()
    {
        $locale = app()->getLocale();

        $content = app()->getLocale() !== 'en' ? "content_{$locale} as content" : 'content';
        $title = app()->getLocale() !== 'en' ? "title_{$locale} as title" : 'title';

        return [$title, 'slug', 'created_at', $content, 'author_id', 'picture', 'status', 'id'];
    }

}
