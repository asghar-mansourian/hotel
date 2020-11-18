<?php

namespace App\Http\Controllers\Admin;

use App;
use App\Faq;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\ValidatorRequest;
use App\Http\Requests\Admin\FaqRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class FaqController extends Controller
{
    use ValidatorRequest;

    public function index()
    {
        $faqs = Faq::query()
            ->select(Faq::selectField)
            ->orderBy(Faq::sortField, Faq::sortType)
            ->paginate(Faq::paginateNumber);
        return View::make('admin.faqs.index', compact('faqs'), with([
            'sortField' => Faq::sortField,
            'sortType' => Faq::sortType
        ]));

    }

    public function load()
    {
        $faqs = Faq::query()
            ->select(Faq::sortField)
            ->orderBy(Faq::sortArrowFieldChecked, Faq::sortArrowTypeChecked)
            ->paginate(Faq::paginateNumber);

        return View::make('admin.faqs.load', compact('faqs'), with([
            'sortField' => Faq::sortField,
            'sortType' => Faq::sortType
        ]));

    }

    public function create()
    {
        return view('admin.faqs.create');
    }

    public function store(Request $request)
    {
        $FAQValidate = new FaqRequest();
        $validate = $this->validateRules($FAQValidate->rules(), $request);
        if ($validate != null)
            return $this->validateRules($FAQValidate->rules(), $request);
        $title = str_replace(' ', '-', $request->input('title'));
        Faq::query()->insert([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'content_ru' => $request->input('contentru') ?? null,
            'content_az' => $request->input('contentaz') ?? null,
            'title_ru' => $request->input('title_ru') ?? null,
            'title_az' => $request->input('title_az') ?? null,
        ]);

        session()->flash('message', __('custom.FAQ.message.create'));
        session()->flash('success', 1);
        return response()->json([], 200);
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $faqs = Faq::query()
            ->orWhere('title', 'like', '%' . $search . '%')
            ->select(Faq::selectField)
            ->paginate(Faq::paginateNumber);

        $countfaqs = Faq::query()
            ->orWhere('name', 'like', '%' . $search . '%')
            ->count();

        return View::make('admin.faqs.table', compact('faqs'), with([
            'sortField' => Faq::sortField,
            'sortType' => Faq::sortType,
            'countfaqs' => $countfaqs,
        ]));
    }

    public function sort(Request $request)
    {
        $sort_field = $request->input('sort_field');
        $sort_type = $request->input('sort_type');

        if ($sort_type == null)
            $sort_type = Faq::sortType;
        if ($sort_field == null)
            $sort_field = Faq::sortField;

        $faqs = Faq::query()
            ->select(Faq::selectField)
            ->orderBy($sort_field, $sort_type)
            ->paginate(Faq::paginateNumber);

        return View::make('admin.faqs.table', compact('faqs'), with([
            'sortField' => $sort_field,
            'sortType' => $sort_type
        ]));
    }

    public function edit($id)
    {

        $FAQ = Faq::query()
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

        Faq::query()->where('id', $id)->update([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'content_ru' => $request->input('contentru') ?? null,
            'content_az' => $request->input('contentaz') ?? null,
            'title_ru' => $request->input('title_ru') ?? null,
            'title_az' => $request->input('title_az') ?? null,
        ]);

        session()->flash('message', __('custom.FAQ.message.update'));
        session()->flash('success', 1);
        return response()->json([], 200);
    }

    public function destroy($id)
    {
        Faq::query()->find($id)->delete();

        session()->flash('message', __('custom.FAQ.message.delete'));
        session()->flash('success', 1);
        return redirect()->back();

    }


}
