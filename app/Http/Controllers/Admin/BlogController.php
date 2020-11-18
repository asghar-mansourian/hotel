<?php

namespace App\Http\Controllers\Admin;

use App;
use App\Admin;
use App\Blog;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\ValidatorRequest;
use App\Http\Requests\Admin\BlogRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class BlogController extends Controller
{
    use ValidatorRequest;

    public function index()
    {
        $blogs = Blog::query()
            ->select(Blog::selectField)
            ->orderBy(Blog::sortField, Blog::sortType)
            ->paginate(Blog::paginateNumber);
        return View::make('admin.blogs.index', compact('blogs'), with([
            'sortField' => Blog::sortField,
            'sortType' => Blog::sortType
        ]));


    }

    public function load()
    {
        $blogs = Blog::query()
            ->select(Blog::sortField)
            ->orderBy(Blog::sortArrowFieldChecked, Blog::sortArrowTypeChecked)
            ->paginate(Blog::paginateNumber);

        return View::make('admin.blogs.load', compact('blogs'), with([
            'sortField' => Blog::sortField,
            'sortType' => Blog::sortType
        ]));

    }

    public function create()
    {
        $authores = Admin::query()->get();
        return view('admin.blogs.create', compact('authores'));
    }

    public function store(Request $request)
    {
        $BlogValidate = new BlogRequest();
        $validate = $this->validateRules($BlogValidate->rules(), $request);
        if ($validate != null)
            return $this->validateRules($BlogValidate->rules(), $request);
        $title = str_replace(' ', '-', $request->input('title'));

        if ($request->hasFile('picture')) {
            $image = $request->file('picture');
            $format = $image->getClientOriginalExtension();

            $fileName = $image->getClientOriginalName();
            $fileName = substr($fileName, 0, strrpos($fileName, '.'));
            $fileName = str_replace(' ', '', $fileName);
            $Random_Number = rand(0, 9999);
            $name = $fileName . '-' . $Random_Number . '.' . $format;

            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
        }
        Blog::query()->insert([
            'title' => $request->input('title'),
            'slug' => $title,
            'picture' => $name,
            'content' => $request->input('content'),
            'author_id' => $request->input('author_id'),
            'status' => $request->input('status'),
        ]);

        session()->flash('message', __('custom.Blog.message.create'));
        session()->flash('success', 1);
        return response()->json([], 200);
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $blogs = Blog::query()
            ->orWhere('title', 'like', '%' . $search . '%')
            ->select(Blog::selectField)
            ->paginate(Blog::paginateNumber);

        $countblogs = Blog::query()
            ->orWhere('title', 'like', '%' . $search . '%')
            ->count();

        return View::make('admin.blogs.index', compact('blogs'), with([
            'sortField' => Blog::sortField,
            'sortType' => Blog::sortType,
            'countblogs' => $countblogs,
        ]));
    }

    public function sort(Request $request)
    {
        $sort_field = $request->input('sort_field');
        $sort_type = $request->input('sort_type');

        if ($sort_type == null)
            $sort_type = Blog::sortType;
        if ($sort_field == null)
            $sort_field = Blog::sortField;

        $blogs = Blog::query()
            ->select(Blog::selectField)
            ->orderBy($sort_field, $sort_type)
            ->paginate(Blog::paginateNumber);

        return View::make('admin.blogs.table', compact('blogs'), with([
            'sortField' => $sort_field,
            'sortType' => $sort_type
        ]));
    }

    public function edit($id)
    {
        $authores = Admin::query()->get();
        $blog = Blog::query()
            ->where('id', $id)
            ->first();
        return view('admin.blogs.edit', compact('blog', 'id', 'authores'));
    }

    public function update(Request $request, $id)
    {
        $BlogValidate = new BlogRequest();
        $validate = $this->validateRules($BlogValidate->rules(), $request);
        if ($validate != null)
            return $this->validateRules($BlogValidate->rules(), $request);
        $title = str_replace(' ', '-', $request->input('title'));

        if ($request->hasFile('new_picture')) {
            $image = $request->file('new_picture');
            $format = $image->getClientOriginalExtension();

            $fileName = $image->getClientOriginalName();
            $fileName = substr($fileName, 0, strrpos($fileName, '.'));
            $fileName = str_replace(' ', '', $fileName);
            $Random_Number = rand(0, 9999);
            $name = $fileName . '-' . $Random_Number . '.' . $format;

            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
        }
        else{
            $name = $request->input('picture');
        }

        Blog::query()->where('id', $id)->update([
            'title' => $request->input('title'),
            'slug' => $title,
            'picture' => $name,
            'content' => $request->input('content'),
            'author_id' => $request->input('author_id'),
            'status' => $request->input('status'),
        ]);

        session()->flash('message', __('custom.Blog.message.update'));
        session()->flash('success', 1);
        return response()->json([], 200);
    }

    public function destroy($id)
    {
        Blog::query()->find($id)->delete();

        session()->flash('message', __('custom.Blog.message.delete'));
        session()->flash('success', 1);
        return redirect()->back();

    }


}
