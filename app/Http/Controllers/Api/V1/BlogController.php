<?php

namespace App\Http\Controllers\Api\V1;

use App\Blog;
use App\Http\Controllers\Admin\traits\ValidatorRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\Blogs as BlogResource;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    use ValidatorRequest;

    public function index(Request $request)
    {
        $blogs = Blog::whereStatus('1')->paginate($request->input('paginate') ?? 10);

        return new BlogResource($blogs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Blog $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {


        return new BlogResource($blog);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Blog $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Blog $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {

//        $BlogValidate = new BlogRequest();
//        $validate = $this->validateRules($BlogValidate->rules(), $request);
//
//        if ($validate != null) {
//            return response()->json($this->validateRules($BlogValidate->rules(), $request), 422);
//        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Blog $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        //
    }
}
