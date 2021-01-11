<?php

namespace App\Http\Controllers\Admin;

use App;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\ValidatorRequest;
use App\Http\Requests\Admin\PageRequest;
use App\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class PageController extends Controller
{
    use ValidatorRequest;

    public function __construct()
    {
        $this->middleware(['permission:read Page|edit Page|create Page|delete Page']);

    }

    public function index()
    {
        $pages = Page::query()
            ->select(Page::selectField)
            ->orderBy(Page::sortField, Page::sortType)
            ->paginate(Page::paginateNumber);
        return View::make('admin.pages.index', compact('pages'), with([
            'sortField' => Page::sortField,
            'sortType' => Page::sortType
        ]));

    }

    public function load()
    {
        $Pages = Page::query()
            ->select(Page::sortField)
            ->orderBy(Page::sortArrowFieldChecked, Page::sortArrowTypeChecked)
            ->paginate(Page::paginateNumber);

        return View::make('admin.pages.load', compact('Pages'), with([
            'sortField' => Page::sortField,
            'sortType' => Page::sortType
        ]));

    }

    public function create()
    {
        return view('admin.pages.create' );
    }

    public function store(Request $request)
    {
        $PageValidate = new PageRequest();
        $validate = $this->validateRules($PageValidate->rules(), $request);
        if ($validate != null)
            return $this->validateRules($PageValidate->rules(), $request);
        $title = str_replace(' ' , '-' , $request->input('title'));
        Page::query()->insert([
            'title' => $request->input('title'),
            'slug' => $title,
            'content' => $request->input('content'),
            'content_ru' => $request->input('contentru') ?? null,
            'content_az' => $request->input('contentaz') ?? null,
            'title_ru' => $request->input('title_ru') ?? null,
            'title_az' => $request->input('title_az') ?? null,
            'status' => $request->input('status'),
        ]);

        session()->flash('message', __('custom.page.message.create'));
        session()->flash('success', 1);
        return response()->json([], 200);
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $pages = Page::query()
            ->orWhere('title', 'like', '%' . $search . '%')
            ->select(Page::selectField)
            ->paginate(Page::paginateNumber);

        $countPages = Page::query()
            ->orWhere('title', 'like', '%' . $search . '%')
            ->count();

        return View::make('admin.pages.index', compact('pages'), with([
            'sortField' => Page::sortField,
            'sortType' => Page::sortType,
            'countPages' => $countPages,
        ]));
    }

    public function sort(Request $request)
    {
        $sort_field = $request->input('sort_field');
        $sort_type = $request->input('sort_type');

        if ($sort_type == null)
            $sort_type = Page::sortType;
        if ($sort_field == null)
            $sort_field = Page::sortField;

        $Pages = Page::query()
            ->select(Page::selectField)
            ->orderBy($sort_field, $sort_type)
            ->paginate(Page::paginateNumber);

        return View::make('admin.pages.table', compact('Pages'), with([
            'sortField' => $sort_field,
            'sortType' => $sort_type
        ]));
    }

    public function edit($id)
    {

        $page = Page::query()
            ->where('id', $id)
            ->first();
        return view('admin.pages.edit', compact('page', 'id'));
    }

    public function update(Request $request, $id)
    {
        $PageValidate = new PageRequest();
        $validate = $this->validateRules($PageValidate->rules(), $request);
        if ($validate != null)
            return $this->validateRules($PageValidate->rules(), $request);
        $title = str_replace(' ' , '-' , $request->input('title'));

        Page::query()->where('id' , $id)->update([
            'title' => $request->input('title'),
            'slug' => $title,
            'content' => $request->input('content'),
            'content_ru' => $request->input('contentru') ?? null,
            'content_az' => $request->input('contentaz') ?? null,
            'title_ru' => $request->input('title_ru') ?? null,
            'title_az' => $request->input('title_az') ?? null,
            'status' => $request->input('status'),
        ]);

        session()->flash('message', __('custom.Page.message.update'));
        session()->flash('success', 1);
        return response()->json([], 200);
    }

    public function destroy($id)
    {
        Page::query()->find($id)->delete();

        session()->flash('message', __('custom.Page.message.delete'));
        session()->flash('success', 1);
        return redirect()->back();

    }


}
