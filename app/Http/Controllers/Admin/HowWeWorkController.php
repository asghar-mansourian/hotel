<?php

namespace App\Http\Controllers\Admin;

use App\HowWeWork;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\HowWeWorkRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\ValidatorRequest;

class HowWeWorkController extends Controller
{
    use ValidatorRequest;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $howWeWorks = HowWeWork::paginate(HowWeWork::paginateNumber);
        return view('admin.how_we_work.index',compact('howWeWorks'),with([
                    'sortField' => HowWeWork::sortField,
                    'sortType' => HowWeWork::sortType
        ]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.how_we_work.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $howWorkValidate = new HowWeWorkRequest();
        $validate = $this->validateRules($howWorkValidate->rules(), $request);
        if ($validate != null)
            return $this->validateRules($howWorkValidate->rules(), $request);
        $howWork = new HowWeWork();
        $howWork->title = $request->title;
        $howWork->title_ru = $request->title_ru;
        $howWork->description = $request->description;
        $howWork->description_ru = $request->description_ru;
        $howWork->save();
        request()->session()->flash('message', __('admin.howWorkCreateSuccessful'));
        request()->session()->flash('success', 1);
        return response()->json([], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $howWork = HowWeWork::findOrFail($id);
        return view('admin.how_we_work.edit',compact('howWork'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $howWorkValidate = new HowWeWorkRequest();
        $validate = $this->validateRules($howWorkValidate->rules(), $request);
        if ($validate != null)
            return $this->validateRules($howWorkValidate->rules(), $request);
        $howWork = HowWeWork::findOrFail($id);
        $howWork->title = $request->title;
        $howWork->title_ru = $request->title_ru;
        $howWork->description = $request->description;
        $howWork->description_ru = $request->description_ru;
        $howWork->save();
        request()->session()->flash('message', __('admin.howWorkUpdateSuccessful'));
        request()->session()->flash('success', 1);
        return response()->json([], 200);
    }
    public function search(Request $request)
    {
        $search = $request->input('search');
        $howWeWorks = HowWeWork::query()
            ->orWhere('title', 'like', '%' . $search . '%')
            ->orWhere('title_ru', 'like', '%' . $search . '%')
            ->orWhere('description', 'like', '%' . $search . '%')
            ->orWhere('description', 'like', '%' . $search . '%')
            ->select(HowWeWork::selectField)
            ->paginate(HowWeWork::paginateNumber);
        return view('admin.how_we_work.index', compact('howWeWorks'), with([
            'sortField' => HowWeWork::sortField,
            'sortType' => HowWeWork::sortType,
        ]));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $howWork = HowWeWork::findOrFail($id);
        $howWork->delete();
        request()->session()->flash('message', __('admin.howWorkDeleteSuccessful'));
        request()->session()->flash('success', 1);
        return redirect('admin/how_we_work/');
    }
}
