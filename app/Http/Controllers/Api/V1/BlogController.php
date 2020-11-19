<?php

namespace App\Http\Controllers\Api\V1;

use App\Blog;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\Blogs as BlogResource;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    public function index(Request $request)
    {
        return BlogResource::collection(
            Blog::whereStatus('1')
                ->orderBy('updated_at', $request->input('order_by') ?? Blog::sortType)
                ->paginate($request->input('per_page') ?? 10)
        );
    }

    public function show(Blog $blog)
    {
        return new BlogResource($blog);
    }
}
