<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\ValidatorRequest;
use App\Http\Requests\Admin\SliderRequest;
use App\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class SliderController extends Controller
{
    use ValidatorRequest;

    public function __construct()
    {
        $this->middleware(['permission:read Slider|edit Slider|create Slider|delete Slider']);
    }


    public function index()
    {
        $sliders = Slider::query()
            ->select(Slider::selectField)
            ->orderBy(Slider::sortField, Slider::sortType)
            ->paginate(Slider::paginateNumber);
        return View::make('admin.sliders.index', compact('sliders'), with([
            'sortField' => Slider::sortField,
            'sortType' => Slider::sortType
        ]));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sliders.create');
    }
    public function load()
    {
        $sliders = Slider::query()
            ->select(Slider::sortField)
            ->orderBy(Slider::sortArrowFieldChecked, Slider::sortArrowTypeChecked)
            ->paginate(Slider::paginateNumber);

        return View::make('admin.sliders.load', compact('sliders'), with([
            'sortField' => Slider::sortField,
            'sortType' => Slider::sortType
        ]));

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $SliderValidate = new SliderRequest();
        $validate = $this->validateRules($SliderValidate->rules(), $request);
        if ($validate != null)
            return $this->validateRules($SliderValidate->rules(), $request);

        if ($request->hasFile('picture')) {
            $image = $request->file('picture');
            $format = $image->getClientOriginalExtension();

            $fileName = $image->getClientOriginalName();
            $fileName = substr($fileName, 0, strrpos($fileName, '.'));
            $fileName = str_replace(' ', '', $fileName);
            $Random_Number = rand(0, 9999);
            $name = $fileName . '-' . $Random_Number . '.' . $format;

            $destinationPath = public_path('/slider/images');
            $image->move($destinationPath, $name);
        }
        Slider::query()->insert([
            'title' => $request->input('title'),
            'picture' => $name,
            'order_by' => $request->input('order_by'),
        ]);

        session()->flash('message', __('custom.Blog.message.create'));
        session()->flash('success', 1);
        return response()->json([], 200);
    }
    public function update(Request $request, $id)
    {
        $SliderValidate = new SliderRequest();
        $validate = $this->validateRules($SliderValidate->rules(), $request);
        if ($validate != null)
            return $this->validateRules($SliderValidate->rules(), $request);

        if ($request->hasFile('new_picture')) {
            $image = $request->file('new_picture');
            $format = $image->getClientOriginalExtension();

            $fileName = $image->getClientOriginalName();
            $fileName = substr($fileName, 0, strrpos($fileName, '.'));
            $fileName = str_replace(' ', '', $fileName);
            $Random_Number = rand(0, 9999);
            $name = $fileName . '-' . $Random_Number . '.' . $format;

            $destinationPath = public_path('/slider/images');
            $image->move($destinationPath, $name);
        }
        else{
            $name = $request->input('picture');
        }

        Slider::query()->where('id', $id)->update([

            'title' => $request->input('title'),
            'picture' => $name,
            'order_by' => $request->input('order_by'),
        ]);

        session()->flash('message', __('custom.Slider.message.update'));
        session()->flash('success', 1);
        return response()->json([], 200);
    }
    public function search(Request $request)
    {
        $search = $request->input('search');
        $sliders = Slider::query()
            ->orWhere('title', 'like', '%' . $search . '%')
            ->select(Slider::selectField)
            ->paginate(Slider::paginateNumber);

        $countslider = Slider::query()
            ->orWhere('title', 'like', '%' . $search . '%')
            ->count();

        return View::make('admin.sliders.index', compact('sliders'), with([
            'sortField' => Slider::sortField,
            'sortType' => Slider::sortType,
            'countsliders' => $countslider,
        ]));
    }

    public function sort(Request $request)
    {
        $sort_field = $request->input('sort_field');
        $sort_type = $request->input('sort_type');

        if ($sort_type == null)
            $sort_type = Slider::sortType;
        if ($sort_field == null)
            $sort_field = Slider::sortField;

        $sliders = Slider::query()
            ->select(Slider::selectField)
            ->orderBy($sort_field, $sort_type)
            ->paginate(Slider::paginateNumber);

        return View::make('admin.sliders.table', compact('sliders'), with([
            'sortField' => $sort_field,
            'sortType' => $sort_type
        ]));
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $authores = Admin::query()->get();
        $slider = Slider::query()
            ->where('id', $id)
            ->first();
        return view('admin.sliders.edit', compact('slider', 'id', 'authores'));
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Slider::query()->find($id)->delete();

        session()->flash('message', __('custom.Slider.message.delete'));
        session()->flash('success', 1);
        return redirect()->back();

    }
}
