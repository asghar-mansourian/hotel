<?php

namespace App\Http\Controllers\Admin;

use App\Country;
use App\CountryDetail;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\ValidatorRequest;
use App\Http\Requests\Admin\CountryDetailRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class CountryDetailController extends Controller
{
    use ValidatorRequest;

    public function __construct()
    {
        $this->middleware(['permission:read CountryDetail|edit CountryDetail|create CountryDetail|delete CountryDetail']);
    }

    public function index()
    {
        $countries = CountryDetail::paginate(CountryDetail::paginateNumber);

        return View::make('admin.countries.details.index', compact('countries'), with([
            'sortField' => CountryDetail::sortField,
            'sortType' => CountryDetail::sortType
        ]));
    }

    public function create()
    {
        $countries = Country::query()->get();
        return view('admin.countries.details.create', compact('countries'));
    }

    public function store(Request $request)
    {
        $DetailValidate = new CountryDetailRequest();
        $validate = $this->validateRules($DetailValidate->rules(), $request);


        if ($validate != null)
            return $this->validateRules($DetailValidate->rules(), $request);


        for ($i = 0; $i < count($request->names); $i++) {
            $details[] = [
                'name' => $request->names[$i],
                'name_ru' => $request->names_ru[$i],
                'value' => $request->values[$i],
                'value_ru' => $request->values_ru[$i],
                'can_copy' => $request->copy[$i],
                'country_id' => $request->input('country_id'),
            ];
        }


        CountryDetail::query()->insert($details);

        session()->flash('message', __('custom.CountryDetails.message.create'));
        session()->flash('success', 1);
        return response()->json([], 200);
    }

    public function load()
    {
        $countries = CountryDetail::query()
            ->select(CountryDetail::sortField)
            ->orderBy(CountryDetail::sortArrowFieldChecked, CountryDetail::sortArrowTypeChecked)
            ->paginate(CountryDetail::paginateNumber);

        return View::make('admin.countries.load', compact('countries'), with([
            'sortField' => CountryDetail::sortField,
            'sortType' => CountryDetail::sortType
        ]));

    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $countries = CountryDetail::query()
            ->orWhere('name', 'like', '%' . $search . '%')
            ->select(CountryDetail::selectField)
            ->paginate(CountryDetail::paginateNumber);

        $countcountries = CountryDetail::query()
            ->orWhere('name', 'like', '%' . $search . '%')
            ->count();

        return View::make('admin.countries.table', compact('countries'), with([
            'sortField' => CountryDetail::sortField,
            'sortType' => CountryDetail::sortType,
            'countcountries' => $countcountries,
        ]));
    }

    public function sort(Request $request)
    {
        $sort_field = $request->input('sort_field');
        $sort_type = $request->input('sort_type');

        if ($sort_type == null)
            $sort_type = CountryDetail::sortType;
        if ($sort_field == null)
            $sort_field = CountryDetail::sortField;

        $countries = CountryDetail::query()
            ->select(CountryDetail::selectField)
            ->orderBy($sort_field, $sort_type)
            ->paginate(CountryDetail::paginateNumber);

        return View::make('admin.countries.details.table', compact('countries'), with([
            'sortField' => $sort_field,
            'sortType' => $sort_type
        ]));
    }

    public function edit($id)
    {
        $countries = Country::query()->get();

        $country_details = CountryDetail::query()
            ->where('id', $id)
            ->first();

        return view('admin.countries.details.edit', compact('countries', 'country_details', 'id'));
    }

    public function update(Request $request, $id)
    {
        $DetailValidate = new CountryDetailRequest();
        $validate = $this->validateRules($DetailValidate->rules(), $request);

        if ($validate != null)
            return $this->validateRules($DetailValidate->rules(), $request);


        CountryDetail::query()->where('id', $id)->update([
            'name' => $request->names['0'],
            'name_ru' => $request->names_ru['0'],
            'value' => $request->values['0'],
            'value_ru' => $request->values_ru['0'],
            'can_copy' => $request->copy['0'],
            'country_id' => $request->input('country_id'),
        ]);

        session()->flash('message', __('custom.Country.Details.message.update'));
        session()->flash('success', 1);
        return response()->json([], 200);
    }

    public function destroy($id)
    {
        CountryDetail::query()->find($id)->delete();

        session()->flash('message', __('custom.Country.Details.message.delete'));
        session()->flash('success', 1);
        return redirect()->back();

    }

}
