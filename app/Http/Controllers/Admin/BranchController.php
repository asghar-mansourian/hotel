<?php

namespace App\Http\Controllers\Admin;

use App;
use App\Branch;
use App\Http\Controllers\Admin\traits\ValidatorRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BranchRequest;
use App\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class BranchController extends Controller
{
    use ValidatorRequest;

    public function index()
    {
        $branches = Branch::query()
            ->with('region')
            ->select(Branch::selectField)
            ->orderBy(Branch::sortField, Branch::sortType)
            ->paginate(Branch::paginateNumber);


        return View::make('admin.branches.index', compact('branches'), with([
            'sortField' => Branch::sortField,
            'sortType' => Branch::sortType
        ]));

    }

    public function load()
    {
        $branches = Branch::query()
            ->select(Branch::sortField)
            ->orderBy(Branch::sortArrowFieldChecked, Branch::sortArrowTypeChecked)
            ->paginate(Branch::paginateNumber);

        return View::make('admin.branches.load', compact('branches'), with([
            'sortField' => Branch::sortField,
            'sortType' => Branch::sortType
        ]));

    }

    public function create()
    {
        $regions = App\Region::all();
        return view('admin.branches.create' , compact('regions'));
    }

    public function store(Request $request)
    {
        $BranchValidate = new BranchRequest();
        $validate = $this->validateRules($BranchValidate->rules(), $request);
        if ($validate != null)
            return $this->validateRules($BranchValidate->rules(), $request);

        Branch::query()->insert([
            'title' => $request->input('title'),
            'region_id' => $request->input('region_id'),
        ]);

        session()->flash('message', __('custom.Branch.message.create'));
        session()->flash('success', 1);
        return response()->json([], 200);
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $branches = Branch::query()
            ->orWhere('title', 'like', '%' . $search . '%')
            ->select(Branch::selectField)
            ->paginate(Branch::paginateNumber);

        $countbranches = Branch::query()
            ->orWhere('title', 'like', '%' . $search . '%')
            ->count();

        return View::make('admin.branches.index', compact('branches'), with([
            'sortField' => Branch::sortField,
            'sortType' => Branch::sortType,
            'countbranches' => $countbranches,
        ]));
    }

    public function sort(Request $request)
    {
        $sort_field = $request->input('sort_field');
        $sort_type = $request->input('sort_type');

        if ($sort_type == null)
            $sort_type = Branch::sortType;
        if ($sort_field == null)
            $sort_field = Branch::sortField;

        $branches = Branch::query()
            ->select(Branch::selectField)
            ->orderBy($sort_field, $sort_type)
            ->paginate(Branch::paginateNumber);

        return View::make('admin.branches.table', compact('branches'), with([
            'sortField' => $sort_field,
            'sortType' => $sort_type
        ]));
    }

    public function edit($id)
    {
        $regions = Region::all();
        $branch = Branch::query()
            ->where('id', $id)
            ->first();
        return view('admin.branches.edit', compact('branch', 'id' , 'regions'));
    }

    public function update(Request $request, $id)
    {
        $BranchValidate = new BranchRequest();
        $validate = $this->validateRules($BranchValidate->rules(), $request);
        if ($validate != null)
            return $this->validateRules($BranchValidate->rules(), $request);

        Branch::query()->where('id' , $id)->update([
            'region_id' => $request->input('region_id'),
            'title' => $request->input('title'),
        ]);

        session()->flash('message', __('custom.Branch.message.update'));
        session()->flash('success', 1);
        return response()->json([], 200);
    }

    public function destroy($id)
    {
        Branch::query()->find($id)->delete();
        session()->flash('message', __('custom.Branch.message.delete'));
        session()->flash('success', 1);
        return redirect()->back();
    }


}
