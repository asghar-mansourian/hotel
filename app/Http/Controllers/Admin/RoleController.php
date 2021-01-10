<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\ValidatorRequest;
use App\Http\Requests\Admin\RoleRequest;
use App\Permission;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class RoleController extends Controller
{
    use ValidatorRequest;

    public function __construct()
    {
        $this->middleware(['permission:read Role|edit Role|create Role|delete Role']);
    }


    public function index()
    {
        $roles = Role::query()
            ->select(Role::selectField)
            ->orderBy(Role::sortField, Role::sortType)
            ->paginate(Role::paginateNumber);
        return View::make('admin.roles.index', compact('roles'), with([
            'sortField' => Role::sortField,
            'sortType' => Role::sortType
        ]));

    }

    public function load()
    {
        $roles = Role::query()
            ->select(Role::sortField)
            ->orderBy(Role::sortArrowFieldChecked, Role::sortArrowTypeChecked)
            ->paginate(Role::paginateNumber);

        return View::make('admin.roles.load', compact('roles'), with([
            'sortField' => Role::sortField,
            'sortType' => Role::sortType
        ]));

    }

    public function create()
    {
        $permissions = Permission::all();
        return view('admin.roles.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $RoleValidate = new RoleRequest();
        $validate = $this->validateRules($RoleValidate->rules(), $request);
        if ($validate != null)
            return $this->validateRules($RoleValidate->rules(), $request);
        $role = new Role();
        $role->name = $request->name;
        $role->guard_name = 'admin';
        $role->save();
        $role->permissions()->sync($request->permissions);
        session()->flash('message', __('admin.roles.create'));
        session()->flash('success', 1);
        return response()->json([], 200);
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $roles = Page::query()
            ->orWhere('name', 'like', '%' . $search . '%')
            ->select(Role::selectField)
            ->paginate(Role::paginateNumber);

        $countPages = Role::query()
            ->orWhere('name', 'like', '%' . $search . '%')
            ->count();

        return View::make('admin.roles.index', compact('roles'), with([
            'sortField' => Roles::sortField,
            'sortType' => Role::sortType,
            'countPages' => $countPages,
        ]));
    }

    public function sort(Request $request)
    {
        $sort_field = $request->input('sort_field');
        $sort_type = $request->input('sort_type');

        if ($sort_type == null)
            $sort_type = Page::sortType;
        if ($sort_field == null)
            $sort_field = Page::sortField;

        $roles = Role::query()
            ->select(Role::selectField)
            ->orderBy($sort_field, $sort_type)
            ->paginate(Role::paginateNumber);

        return View::make('admin.roles.table', compact('roles'), with([
            'sortField' => $sort_field,
            'sortType' => $sort_type
        ]));
    }

    public function edit($id)
    {

        $role = Role::query()
            ->where('id', $id)
            ->first();
        $permissions = Permission::all();
        return view('admin.roles.edit', compact('role', 'id', 'permissions'));
    }

    public function update(Request $request, $id)
    {
        $roleValidate = new RoleRequest();
        $validate = $this->validateRules($roleValidate->rules(), $request);
        if ($validate != null)
            return $this->validateRules($roleValidate->rules(), $request);
        Role::query()->where('id', $id)->update([
            'name' => $request->input('name'),
            'guard_name' => 'admin'
        ]);
        $role = Role::findOrFail($id);
        $role->permissions()->sync($request->permissions);
        session()->flash('message', __('custom.Page.message.update'));
        session()->flash('success', 1);
        return response()->json([], 200);
    }

    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->permissions()->detach();
        $role->delete();
        session()->flash('message', __('custom.Page.message.delete'));
        session()->flash('success', 1);
        return redirect()->back();

    }

}
