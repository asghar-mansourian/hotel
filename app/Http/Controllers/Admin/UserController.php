<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\traits\ValidatorRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;

class UserController extends Controller
{
    use ValidatorRequest;

    public function index()
    {
        $users = User::query()
            ->select(User::selectField)
            ->orderBy(User::sortField, User::sortType)
            ->paginate(User::paginateNumber);

        return View::make('admin.users.index', compact('users'), with([
            'sortField' => User::sortField,
            'sortType' => User::sortType
        ]));

    }

    public function load()
    {

        $users = User::query()
            ->select(User::sortField)
            ->orderBy(User::sortArrowFieldChecked, User::sortArrowTypeChecked)
            ->paginate(User::paginateNumber);

        return View::make('admin.users.load', compact('users'), with([
            'sortField' => User::sortField,
            'sortType' => User::sortType
        ]));

    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $UserValidate = new UserRequest();
        $validate = $this->validateRules($UserValidate->rules(), $request);
        if ($validate != null)
            return $this->validateRules($UserValidate->rules(), $request);

        User::query()->insert([
            'name' => $request->input('name'),
            'family' => $request->input('family'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'status' => $request->input('status'),
        ]);

        session()->flash('message', trans('custom.user.message.create'));
        session()->flash('success', 1);
        return response()->json([], 200);
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $users = User::query()
            ->orWhere('email', 'like', '%' . $search . '%')
            ->orWhere('name', 'like', '%' . $search . '%')
            ->orWhere('family', 'like', '%' . $search . '%')
            ->select(User::$this->selectField)
            ->paginate(User::paginateNumber);

        $countUsers = User::query()
            ->orWhere('email', 'like', '%' . $search . '%')
            ->orWhere('name', 'like', '%' . $search . '%')
            ->orWhere('family', 'like', '%' . $search . '%')
            ->count();

        return View::make('admin.users.table', compact('users'), with([
            'sortField' => User::sortField,
            'sortType' => User::sortType,
            'countUsers' => $countUsers,
        ]));
    }

    public function sort(Request $request)
    {
        $sort_field = $request->input('sort_field');
        $sort_type = $request->input('sort_type');

        if ($sort_type == null)
            $sort_type = User::sortType;
        if ($sort_field == null)
            $sort_field = User::sortField;

        $users = DB::table('users')
            ->select(User::selectField)
            ->orderBy($sort_field, $sort_type)
            ->paginate(User::paginateNumber);

        return View::make('admin.users.table', compact('users'), with([
            'sortField' => $sort_field,
            'sortType' => $sort_type
        ]));
    }

    public function filter(Request $request)
    {
        $filter = $request->input('filter');

        if ($filter == null) {
            $users = DB::table('users')
                ->select($this->selectField)
                ->latest()
                ->paginate('10');
            return View::make('admin.users.table', compact('users'));

        }
        $filter = explode('|', $filter);
        $filter_type = $filter[0];
        $filter_value = $filter[1];
        $users = DB::table('users')
            ->select($this->selectField)
            ->where($filter_type, $filter_value)
            ->latest()
            ->paginate('10');

        return View::make('admin.users.table', compact('users'), with([
            'sortField' => $this->sortField,
            'sortType' => $this->sortType
        ]));
    }

    public function show(Request $request)
    {

        $id = $request->input('id');
        $user = User::query()
            ->where('id', $id)
            ->first();

        return View::make('admin.users.show', compact('user'));
    }

    public function edit($id)
    {

        $user = DB::table('users')
            ->where('id', $id)
            ->first();
        return view('admin.users.edit', compact('user', 'id'));
    }

    public function update(Request $request, $id)
    {
        $UserValidate = new UserRequest();
        $validate = $this->validateRules($UserValidate->rules(), $request);
        if ($validate != null)
            return $this->validateRules($UserValidate->rules(), $request);

        User::query()->where('id' , $id)->update([
            'name' => $request->input('name'),
            'family' => $request->input('family'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'status' => $request->input('status'),
        ]);

        session()->flash('message', trans('custom.user.message.update'));
        session()->flash('success', 1);
        return response()->json([], 200);
    }

    public function destroy($id)
    {
        User::query()->find($id)->delete();

        session()->flash('message', trans('custom.user.message.delete'));
        session()->flash('success', 1);
        return redirect()->back();

    }
}
