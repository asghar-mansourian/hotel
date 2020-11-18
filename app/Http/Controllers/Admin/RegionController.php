<?php

namespace App\Http\Controllers\Admin;

use App;
use App\Country;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\ValidatorRequest;
use App\Http\Requests\Admin\RegionRequest;
use App\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class RegionController extends Controller
{
    use ValidatorRequest;

    public function index()
    {
        $regions = Region::query()
            ->with('country')
            ->select(Region::selectField)
            ->orderBy(Region::sortField, Region::sortType)
            ->paginate(Region::paginateNumber);
        return View::make('admin.regions.index', compact('regions'), with([
            'sortField' => Region::sortField,
            'sortType' => Region::sortType
        ]));

    }

    public function load()
    {
        $regions = Region::query()
            ->select(Region::sortField)
            ->orderBy(Region::sortArrowFieldChecked, Region::sortArrowTypeChecked)
            ->paginate(Region::paginateNumber);

        return View::make('admin.regions.load', compact('regions'), with([
            'sortField' => Region::sortField,
            'sortType' => Region::sortType
        ]));

    }

    public function create()
    {
        $countries = Country::query()->get();
        return view('admin.regions.create' , compact('countries'));
    }

    public function store(Request $request)
    {
        $RegionValidate = new RegionRequest();
        $validate = $this->validateRules($RegionValidate->rules(), $request);
        if ($validate != null)
            return $this->validateRules($RegionValidate->rules(), $request);

        Region::query()->insert([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'country_id' => $request->input('country_id'),
        ]);

        session()->flash('message', __('custom.Region.message.create'));
        session()->flash('success', 1);
        return response()->json([], 200);
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $regions = Region::query()
            ->orWhere('name', 'like', '%' . $search . '%')
            ->select(Region::selectField)
            ->paginate(Region::paginateNumber);

        $countregions = Region::query()
            ->orWhere('name', 'like', '%' . $search . '%')
            ->count();

        return View::make('admin.regions.index', compact('regions'), with([
            'sortField' => Region::sortField,
            'sortType' => Region::sortType,
            'countregions' => $countregions,
        ]));
    }

    public function sort(Request $request)
    {
        $sort_field = $request->input('sort_field');
        $sort_type = $request->input('sort_type');

        if ($sort_type == null)
            $sort_type = Region::sortType;
        if ($sort_field == null)
            $sort_field = Region::sortField;

        $regions = Region::query()
            ->select(Region::selectField)
            ->orderBy($sort_field, $sort_type)
            ->paginate(Region::paginateNumber);

        return View::make('admin.regions.table', compact('regions'), with([
            'sortField' => $sort_field,
            'sortType' => $sort_type
        ]));
    }

    public function edit($id)
    {

        $Region = Region::query()
            ->where('id', $id)
            ->first();
        return view('admin.regions.edit', compact('Region', 'id'));
    }

    public function update(Request $request, $id)
    {
        $RegionValidate = new RegionRequest();
        $validate = $this->validateRules($RegionValidate->rules(), $request);
        if ($validate != null)
            return $this->validateRules($RegionValidate->rules(), $request);

        Region::query()->where('id' , $id)->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'country_id' => $request->input('country_id'),
        ]);

        session()->flash('message', __('custom.Region.message.update'));
        session()->flash('success', 1);
        return response()->json([], 200);
    }

    public function destroy($id)
    {
        Region::query()->find($id)->delete();

        session()->flash('message', __('custom.Region.message.delete'));
        session()->flash('success', 1);
        return redirect()->back();

    }


}
