<?php

namespace App\Http\Controllers\Admin;

use App;
use App\Admin;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\ValidatorRequest;
use App\Http\Requests\Admin\AdminRequest;
use App\Http\Requests\Admin\AdminUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    use ValidatorRequest;

    public function __construct()
    {
        $this->middleware(['permission:read Admin|edit Admin|create Admin|delete Admin']);
    }

    public function index()
    {
        $admins = Admin::query()
            ->select(Admin::selectField)
            ->orderBy(Admin::sortField, Admin::sortType)
            ->paginate(Admin::paginateNumber);
        return View::make('admin.admins.index', compact('admins'), with([
            'sortField' => Admin::sortField,
            'sortType' => Admin::sortType
        ]));

    }

    public function load()
    {
        $admins = Admin::query()
            ->select(Admin::sortField)
            ->orderBy(Admin::sortArrowFieldChecked, Admin::sortArrowTypeChecked)
            ->paginate(Admin::paginateNumber);

        return View::make('admin.admins.load', compact('admins'), with([
            'sortField' => Admin::sortField,
            'sortType' => Admin::sortType
        ]));

    }

    public function create()
    {
        return view('admin.admins.create');
    }

    public function store(Request $request)
    {
        $AdminValidate = new AdminRequest();
        $validate = $this->validateRules($AdminValidate->rules(), $request);
        if ($validate != null)
            return $this->validateRules($AdminValidate->rules(), $request);
        Admin::query()->insert([
            'name' => $request->input('name'),
            'family' => $request->input('family'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'status' => $request->input('status')
        ]);

        session()->flash('message', __('custom.Admin.message.create'));
        session()->flash('success', 1);
        return response()->json([], 200);
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $admins = Admin::query()
            ->orWhere('name', 'like', '%' . $search . '%')
            ->orWhere('family', 'like', '%' . $search . '%')
            ->orWhere('email', 'like', '%' . $search . '%')
            ->select(Admin::selectField)
            ->paginate(Admin::paginateNumber);

        $countadmins = Admin::query()
            ->orWhere('name', 'like', '%' . $search . '%')
            ->orWhere('family', 'like', '%' . $search . '%')
            ->orWhere('email', 'like', '%' . $search . '%')
            ->count();

        return View::make('admin.admins.index', compact('admins'), with([
            'sortField' => Admin::sortField,
            'sortType' => Admin::sortType,
            'countadmins' => $countadmins,
        ]));
    }

    public function sort(Request $request)
    {
        $sort_field = $request->input('sort_field');
        $sort_type = $request->input('sort_type');

        if ($sort_type == null)
            $sort_type = Admin::sortType;
        if ($sort_field == null)
            $sort_field = Admin::sortField;

        $admins = Admin::query()
            ->select(Admin::selectField)
            ->orderBy($sort_field, $sort_type)
            ->paginate(Admin::paginateNumber);

        return View::make('admin.admins.table', compact('admins'), with([
            'sortField' => $sort_field,
            'sortType' => $sort_type
        ]));
    }

    public function edit($id)
    {

        $Admin = Admin::query()
            ->where('id', $id)
            ->first();
        return view('admin.admins.edit', compact('Admin', 'id'));
    }

    public function update(Request $request, $id)
    {
        $AdminValidate = new AdminUpdateRequest();
        $validate = $this->validateRules($AdminValidate->rules(), $request);
        if ($validate != null)
            return $this->validateRules($AdminValidate->rules(), $request);
        if ($request->input('password') != '')
            Admin::query()->where('id', $id)->update([
                'name' => $request->input('name'),
                'family' => $request->input('family'),
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password')),
                'status' => $request->input('status')
            ]);
        else
            Admin::query()->where('id', $id)->update([
                'name' => $request->input('name'),
                'family' => $request->input('family'),
                'email' => $request->input('email'),
                'status' => $request->input('status')
            ]);

        session()->flash('message', __('custom.Admin.message.update'));
        session()->flash('success', 1);
        return response()->json([], 200);
    }

    public function destroy($id)
    {
        Admin::query()->find($id)->delete();

        session()->flash('message', __('custom.Admin.message.delete'));
        session()->flash('success', 1);
        return redirect()->back();

    }

    public function assignRole($id)
    {
        $admin = Admin::findOrFail($id);
        $roles = Role::all();
        return view('admin.admins.assign_role', compact('admin', 'id', 'roles'));
    }

    public function assignRoleAdmin(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);
        $admin->syncRoles($request->role);
        session()->flash('message', __('custom.Admin.message.assign_role'));
        session()->flash('success', 1);
        return response()->json([], 200);
    }

}
