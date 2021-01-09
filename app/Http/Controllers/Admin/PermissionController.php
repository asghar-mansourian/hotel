<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\ValidatorRequest;
use App\Http\Requests\Admin\PermissionRequest;
use App\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class PermissionController extends Controller
{
    use ValidatorRequest;

    public function __construct()
    {
        $this->middleware(['permission:read Permission|edit Permission|create Permission|delete Permission']);

    }

    public function index()
    {
        $permissions = Permission::query()
            ->select(Permission::selectField)
            ->orderBy(Permission::sortField, Permission::sortType)
            ->paginate(Permission::paginateNumber);
        return View::make('admin.permission.index', compact('permissions'), with([
            'sortField' => Permission::sortField,
            'sortType' => Permission::sortType
        ]));

    }

    public function load()
    {
        $permissions = Permission::query()
            ->select(Permission::sortField)
            ->orderBy(Permission::sortArrowFieldChecked, Permission::sortArrowTypeChecked)
            ->paginate(Permission::paginateNumber);

        return View::make('admin.permission.load', compact('permissions'), with([
            'sortField' => Permission::sortField,
            'sortType' => Permission::sortType
        ]));

    }

    public function create()
    {
        return view('admin.permission.create');
    }

    public function store(Request $request)
    {
        $PermissionValidate = new PermissionRequest();
        $validate = $this->validateRules($PermissionValidate->rules(), $request);
        if ($validate != null)
            return $this->validateRules($PermissionValidate->rules(), $request);
        Permission::query()->insert([
            'name' => $request->input('name'),
            'guard_name' => 'admin',
        ]);
        session()->flash('message', __('admin.permission_message_create'));
        session()->flash('success', 1);
        return response()->json([], 200);
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $permissions = Permission::query()
            ->orWhere('name', 'like', '%' . $search . '%')
            ->select(Permission::selectField)
            ->paginate(Permission::paginateNumber);

        $countPermissions = Permission::query()
            ->orWhere('name', 'like', '%' . $search . '%')
            ->count();

        return View::make('admin.permission.index', compact('permissions'), with([
            'sortField' => Permission::sortField,
            'sortType' => Permission::sortType,
            'countPermissions' => $countPermissions,
        ]));
    }

    public function sort(Request $request)
    {
        $sort_field = $request->input('sort_field');
        $sort_type = $request->input('sort_type');

        if ($sort_type == null)
            $sort_type = Permission::sortType;
        if ($sort_field == null)
            $sort_field = Permission::sortField;

        $permissions = Permission::query()
            ->select(Permission::selectField)
            ->orderBy($sort_field, $sort_type)
            ->paginate(Permission::paginateNumber);

        return View::make('admin.permission.table', compact('permissions'), with([
            'sortField' => $sort_field,
            'sortType' => $sort_type
        ]));
    }

    public function edit($id)
    {

        $permission = Permission::query()
            ->where('id', $id)
            ->first();
        return view('admin.permission.edit', compact('permission', 'id'));
    }

    public function update(Request $request, $id)
    {
        $PermissionValidate = new PermissionRequest();
        $validate = $this->validateRules($PermissionValidate->rules(), $request);
        if ($validate != null)
            return $this->validateRules($PermissionValidate->rules(), $request);
        Permission::query()->where('id', $id)->update([
            'name' => $request->input('name'),
            'guard_name' => 'admin'
        ]);
        session()->flash('message', __('admin.permission_message_update'));
        session()->flash('success', 1);
        return response()->json([], 200);
    }

    public function destroy($id)
    {
        $permission = Permission::findOrfail($id);
        $permission->roles()->detach();
        $permission->delete();

        session()->flash('message', __('admin.permission_message_delete'));
        session()->flash('success', 1);
        return redirect()->back();

    }
}
