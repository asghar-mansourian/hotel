<?php

namespace App\Http\Controllers\Admin;

use App\Helper\settingsHelper;
use App\Http\Controllers\Admin\traits\ValidatorUserRequest;
use App\Http\Controllers\Admin\traits\UserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Helper\allHelper;
use Mpdf\Mpdf;
class UserController extends Controller
{
    use UserRequest, ValidatorUserRequest;

    private $sortType;
    private $sortField;
    private $paginateNumber;
    private $selectField;

    public function __construct()
    {
        $this->sortType = 'desc';
        $this->sortField = 'id';
        $this->paginateNumber = 10;
        $this->selectField = ['name', 'family', 'email', 'status', 'id'];

    }

    public function index()
    {
        $users = DB::table('users')
            ->select($this->selectField)
            ->orderBy($this->sortField , $this->sortType)
            ->paginate($this->paginateNumber);

        return View::make('admin.users.index', compact('users') , with([
            'sortField' => $this->sortField,
            'sortType' => $this->sortType
        ]));

    }

    public function load()
    {
        $sortArrowTypeChecked = 'desc';
        $sortArrowFieldChecked = 'id';

        $users = DB::table('users')
            ->select($this->selectField)
            ->orderBy($sortArrowFieldChecked , $sortArrowTypeChecked)
            ->paginate($this->paginateNumber);

        return View::make('admin.users.load', compact('users') , with([
            'sortField' => $this->sortField,
            'sortType' => $this->sortType
        ]));

    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $validate = $this->validateRules($this->UserValidate(), $request);
        if ($validate != null)
            return $this->validateRules($this->UserValidate(), $request);
        $this->UserStoreInsert($request);

        session()->flash('message', 'User Create Successful');
        session()->flash('success', 'User Create Successful');
        return response()->json([], 200);
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $users = DB::table('users')
            ->orWhere('email', 'like', '%' . $search . '%')
            ->orWhere('name', 'like', '%' . $search . '%')
            ->orWhere('family', 'like', '%' . $search . '%')
            ->select($this->selectField)
            ->paginate($this->paginateNumber);

        $countUsers = DB::table('users')
            ->orWhere('email', 'like', '%' . $search . '%')
            ->orWhere('name', 'like', '%' . $search . '%')
            ->orWhere('family', 'like', '%' . $search . '%')
            ->count();

        return View::make('admin.users.table', compact('users') , with([
            'sortField' => $this->sortField,
            'sortType' => $this->sortType,
            'countUsers' => $countUsers,
        ]));
    }

    public function sort(Request $request)
    {
        $sort_field = $request->input('sort_field');
        $sort_type = $request->input('sort_type');
        if ($sort_type == null)
            $sort_type = $this->sortType;
        if ($sort_field == null)
            $sort_field = $this->sortField;

        $users = DB::table('users')
            ->select($this->selectField)
            ->orderBy($sort_field, $sort_type)
            ->paginate($this->paginateNumber);

        return View::make('admin.users.table',compact('users') , with([
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

        return View::make('admin.users.table', compact('users') , with([
            'sortField' => $this->sortField,
            'sortType' => $this->sortType
        ]));
    }

    public function show(Request $request)
    {

        $id = $request->input('id');
        $user = DB::table('users')
            ->where('id' , $id)
            ->first();

        return View::make('admin.users.show', compact('user'));
    }

    public function edit($id)
    {

        $user = DB::table('users')
            ->where('id' , $id)
            ->first();
        return view('admin.users.edit' , compact('user' , 'id'));
    }

    public function update(Request $request , $id)
    {


        $validate = $this->validateRules($this->UserValidate(), $request);
        if ($validate != null)
            return $this->validateRules($this->UserValidate(), $request);

        $this->UserUpdateEdit($request , $id);

        session()->flash('message', 'User Create Successful');
        session()->flash('success', 'User Create Successful');
        return response()->json([], 200);
    }

    public function export(Request $request , $type)
    {
        if ($type == 'pdf')
        {
            $users = DB::table('users')
                ->orderBy($this->sortField , $this->sortType)
                ->select($this->selectField)
                ->get();


            $fromDate = $request->input('fromDate');
            $toDate = $request->input('toDate');
            $html = view('admin.users.export')->with([
                'records' => $users,
            ]);
            $mpdf = new Mpdf([
                'mode' => 'utf-8',
                'orientation' => 'P',
                'margin_left' => '10',
                'margin_right' => '5',
                'margin_top' => '3',
                'margin_bottom' => '0',
                'margin_header' => '0',
                'margin_footer' => '3'
            ]);
            $mpdf->WriteHTML($html);
            $mpdf->Output('fileNames.pdf');
            return response()->download('fileNames.pdf');
        }


    }

    public function destroy($id)
    {
        DB::table('users')
            ->where('id' , $id)
            ->delete();
        session()->flash('message', 'User Deleted Successful');
        session()->flash('success', 'User Deleted Successful');
        return redirect()->back();

    }
}
