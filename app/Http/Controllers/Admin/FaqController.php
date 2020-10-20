<?php

namespace App\Http\Controllers\Admin;

use App;
use App\FAQ;
use App\Http\Controllers\Admin\traits\ValidatorRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FAQRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class FaqController extends Controller
{
    use ValidatorRequest;

    public function index()
    {
        $faqs = FAQ::query()
            ->select(FAQ::selectField)
            ->orderBy(FAQ::sortField, FAQ::sortType)
            ->paginate(FAQ::paginateNumber);
        return View::make('admin.faqs.index', compact('faqs'), with([
            'sortField' => FAQ::sortField,
            'sortType' => FAQ::sortType
        ]));

    }

    public function load()
    {
        $faqs = FAQ::query()
            ->select(FAQ::sortField)
            ->orderBy(FAQ::sortArrowFieldChecked, FAQ::sortArrowTypeChecked)
            ->paginate(FAQ::paginateNumber);

        return View::make('admin.faqs.load', compact('faqs'), with([
            'sortField' => FAQ::sortField,
            'sortType' => FAQ::sortType
        ]));

    }

    public function create()
    {
        return view('admin.faqs.create' );
    }

    public function store(Request $request)
    {
        $FAQValidate = new FAQRequest();
        $validate = $this->validateRules($FAQValidate->rules(), $request);
        if ($validate != null)
            return $this->validateRules($FAQValidate->rules(), $request);
        $title = str_replace(' ' , '-' , $request->input('title'));
        FAQ::query()->insert([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
        ]);

        session()->flash('message', __('custom.FAQ.message.create'));
        session()->flash('success', 1);
        return response()->json([], 200);
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $faqs = FAQ::query()
            ->orWhere('title', 'like', '%' . $search . '%')
            ->select(FAQ::selectField)
            ->paginate(FAQ::paginateNumber);

        $countfaqs = FAQ::query()
            ->orWhere('name', 'like', '%' . $search . '%')
            ->count();

        return View::make('admin.faqs.table', compact('faqs'), with([
            'sortField' => FAQ::sortField,
            'sortType' => FAQ::sortType,
            'countfaqs' => $countfaqs,
        ]));
    }

    public function sort(Request $request)
    {
        $sort_field = $request->input('sort_field');
        $sort_type = $request->input('sort_type');

        if ($sort_type == null)
            $sort_type = FAQ::sortType;
        if ($sort_field == null)
            $sort_field = FAQ::sortField;

        $faqs = FAQ::query()
            ->select(FAQ::selectField)
            ->orderBy($sort_field, $sort_type)
            ->paginate(FAQ::paginateNumber);

        return View::make('admin.faqs.table', compact('faqs'), with([
            'sortField' => $sort_field,
            'sortType' => $sort_type
        ]));
    }

    public function edit($id)
    {

        $FAQ = FAQ::query()
            ->where('id', $id)
            ->first();
        return view('admin.faqs.edit', compact('FAQ', 'id'));
    }

    public function update(Request $request, $id)
    {
        $FAQValidate = new FAQRequest();
        $validate = $this->validateRules($FAQValidate->rules(), $request);
        if ($validate != null)
            return $this->validateRules($FAQValidate->rules(), $request);

        FAQ::query()->where('id' , $id)->update([
            'title' => $request->input('title'),
            'content' => $request->input('content'),

        ]);

        session()->flash('message', __('custom.FAQ.message.update'));
        session()->flash('success', 1);
        return response()->json([], 200);
    }

    public function destroy($id)
    {
        FAQ::query()->find($id)->delete();

        session()->flash('message', __('custom.FAQ.message.delete'));
        session()->flash('success', 1);
        return redirect()->back();

    }


}
