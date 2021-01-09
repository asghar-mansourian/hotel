<?php

namespace App\Http\Controllers\Admin;

use App;
use App\Country;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\ValidatorRequest;
use App\Http\Requests\Admin\CountryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class CountryController extends Controller
{
    use ValidatorRequest;

    public function __construct()
    {
        $this->middleware(['permission:read Country|edit Country|create Country|delete Country']);
    }

    public function index()
    {
        $countries = Country::query()
            ->select(Country::selectField)
            ->orderBy(Country::sortField, Country::sortType)
            ->paginate(Country::paginateNumber);

        return View::make('admin.countries.index', compact('countries'), with([
            'sortField' => Country::sortField,
            'sortType' => Country::sortType
        ]));

    }

    public function load()
    {
        $countries = Country::query()
            ->select(Country::sortField)
            ->orderBy(Country::sortArrowFieldChecked, Country::sortArrowTypeChecked)
            ->paginate(Country::paginateNumber);

        return View::make('admin.countries.load', compact('countries'), with([
            'sortField' => Country::sortField,
            'sortType' => Country::sortType
        ]));

    }

    public function create()
    {

        return view('admin.countries.create');
    }

    public function store(Request $request)
    {
        $CountryValidate = new CountryRequest();
        $validate = $this->validateRules($CountryValidate->rules(), $request);
        if ($validate != null)
            return $this->validateRules($CountryValidate->rules(), $request);

        if ($request->hasFile('flag')) {
            $image = $request->file('flag');
            $format = $image->getClientOriginalExtension();

            $fileName = $image->getClientOriginalName();
            $fileName = substr($fileName, 0, strrpos($fileName, '.'));
            $fileName = str_replace(' ', '', $fileName);
            $Random_Number = rand(0, 9999);
            $name = $fileName . '-' . $Random_Number . '.' . $format;

            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
        }

        Country::query()->insert([
            'name' => $request->input('name'),
            'name_ru' => $request->input('name_ru'),
            'flag' => $name,
            'currency' => $request->input('currency'),
        ]);

        session()->flash('message', __('custom.Country.message.create'));
        session()->flash('success', 1);
        return response()->json([], 200);
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $countries = Country::query()
            ->orWhere('name', 'like', '%' . $search . '%')
            ->orWhere('currency', 'like', '%' . $search . '%')
            ->select(Country::selectField)
            ->paginate(Country::paginateNumber);

        $countcountries = Country::query()
            ->orWhere('name', 'like', '%' . $search . '%')
            ->count();

        return View::make('admin.countries.index', compact('countries'), with([
            'sortField' => Country::sortField,
            'sortType' => Country::sortType
        ]));
    }

    public function sort(Request $request)
    {
        $sort_field = $request->input('sort_field');
        $sort_type = $request->input('sort_type');

        if ($sort_type == null)
            $sort_type = Country::sortType;
        if ($sort_field == null)
            $sort_field = Country::sortField;

        $countries = Country::query()
            ->select(Country::selectField)
            ->orderBy($sort_field, $sort_type)
            ->paginate(Country::paginateNumber);

        return View::make('admin.countries.table', compact('countries'), with([
            'sortField' => $sort_field,
            'sortType' => $sort_type
        ]));
    }

    public function edit($id)
    {

        $country = Country::query()
            ->where('id', $id)
            ->first();
        return view('admin.countries.edit', compact('country', 'id'));
    }

    public function update(Request $request, $id)
    {
        $CountryValidate = new CountryRequest();
        $validate = $this->validateRules($CountryValidate->rules(), $request);
        if ($validate != null)
            return $this->validateRules($CountryValidate->rules(), $request);

        if ($request->hasFile('new_flag')) {
            $image = $request->file('new_flag');
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
            $name = $request->input('flag');
        }
        Country::query()->where('id' , $id)->update([
            'name' => $request->input('name'),
            'name_ru' => $request->input('name_ru'),
            'flag' => $name,
            'currency' => $request->input('currency'),
        ]);

        session()->flash('message', __('custom.Country.message.update'));
        session()->flash('success', 1);
        return response()->json([], 200);
    }

    public function destroy($id)
    {
        Country::query()->find($id)->delete();

        session()->flash('message', __('custom.Country.message.delete'));
        session()->flash('success', 1);
        return redirect()->back();

    }


}
