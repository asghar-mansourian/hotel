<?php

namespace App\Http\Controllers\Admin;

use App;
use App\Calculator;
use App\Country;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\ValidatorRequest;
use App\Http\Requests\Admin\CalculatorRequest;
use App\Region;
use App\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class CalculatorController extends Controller
{
    use ValidatorRequest;

    public function index()
    {
        $calculatores = Calculator::query()
            ->with('country')
            ->select(Calculator::selectField)
            ->orderBy(Calculator::sortField, Calculator::sortType)
            ->paginate(Calculator::paginateNumber);
        return View::make('admin.calculatores.index', compact('calculatores'), with([
            'sortField' => Calculator::sortField,
            'sortType' => Calculator::sortType
        ]));

    }

    public function load()
    {
        $calculatores = Calculator::query()
            ->select(Calculator::sortField)
            ->orderBy(Calculator::sortArrowFieldChecked, Calculator::sortArrowTypeChecked)
            ->paginate(Calculator::paginateNumber);

        return View::make('admin.calculatores.load', compact('calculatores'), with([
            'sortField' => Calculator::sortField,
            'sortType' => Calculator::sortType
        ]));

    }

    public function create()
    {
        $countries = Country::query()->get();
        $units = Unit::query()->get();
        return view('admin.calculatores.create', compact('countries', 'units'));
    }

    public function store(Request $request)
    {
        $CalculatorValidate = new CalculatorRequest();
        $validate = $this->validateRules($CalculatorValidate->rules(), $request);
        if ($validate != null)
            return $this->validateRules($CalculatorValidate->rules(), $request);

        Calculator::query()->insert([
            'currency' => $request->input('currency'),
            'from' => $request->input('from'),
            'to' => $request->input('to'),
            'discount' => $request->input('discount'),
            'unit_id' => $request->input('unit_id'),
            'country_id' => $request->input('country_id'),
        ]);

        session()->flash('message', __('custom.Region.message.create'));
        session()->flash('success', 1);
        return response()->json([], 200);
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $calculatores = Calculator::query()
            ->orWhere('from', 'like', '%' . $search . '%')
            ->orWhere('to', 'like', '%' . $search . '%')
            ->orWhere('name', 'like', '%' . $search . '%')
            ->orWhere('currency', 'like', '%' . $search . '%')
            ->select(Calculator::selectField)
            ->paginate(Calculator::paginateNumber);

        $countcalculatores = Calculator::query()
            ->orWhere('name', 'like', '%' . $search . '%')
            ->count();

        return View::make('admin.calculatores.index', compact('calculatores'), with([
            'sortField' => Calculator::sortField,
            'sortType' => Calculator::sortType,
            'countcalculatores' => $countcalculatores,
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

        $calculatores = Region::query()
            ->select(Region::selectField)
            ->orderBy($sort_field, $sort_type)
            ->paginate(Region::paginateNumber);

        return View::make('admin.calculatores.table', compact('calculatores'), with([
            'sortField' => $sort_field,
            'sortType' => $sort_type
        ]));
    }

    public function edit($id)
    {
        $countries = Country::query()->get();
        $units = Unit::query()->get();
        $calculator = Calculator::query()
            ->where('id', $id)
            ->first();
        return view('admin.calculatores.edit', compact('calculator', 'id', 'units', 'countries'));
    }

    public function update(Request $request, $id)
    {
        $CalculatorValidate = new CalculatorRequest();
        $validate = $this->validateRules($CalculatorValidate->rules(), $request);
        if ($validate != null)
            return $this->validateRules($CalculatorValidate->rules(), $request);

        Calculator::query()->where('id', $id)->update([
            'currency' => $request->input('currency'),
            'from' => $request->input('from'),
            'to' => $request->input('to'),
            'discount' => $request->input('discount'),
            'unit_id' => $request->input('unit_id'),
            'country_id' => $request->input('country_id'),
        ]);

        session()->flash('message', __('custom.Region.message.update'));
        session()->flash('success', 1);
        return response()->json([], 200);
    }

    public function destroy($id)
    {
        Calculator::query()->find($id)->delete();

        session()->flash('message', __('custom.Region.message.delete'));
        session()->flash('success', 1);
        return redirect()->back();

    }


}
