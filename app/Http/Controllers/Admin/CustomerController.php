<?php

namespace App\Http\Controllers\Admin;

use App\Country;
use App\Customer;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Member\ImageController;
use App\Http\Controllers\Traits\ValidatorRequest;
use App\Http\Requests\Admin\CustomerRequest;
use App\Http\Requests\Admin\UpdateCustomerRequest;
use App\lib\Customer as CustomerHelper;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    use ValidatorRequest;

    public function __construct()
    {
        $this->middleware(['permission:read Customer|edit Customer|create Customer|delete Customer']);
    }


    public function index()
    {
        $customers = Customer::paginate(Customer::paginateNumber);

        return view('admin.customers.index', compact('customers'), with([
            'sortField' => Customer::sortField,
            'sortType' => Customer::sortType
        ]));
    }

    public function create()
    {
        $countries = Country::all();
        return view('admin.customers.create',compact('countries'));
    }

    public function store(Request $request)
    {
        $CustomerValidate = new CustomerRequest();
        $validate = $this->validateRules($CustomerValidate->rules(), $request);
        if ($validate != null)
            return $this->validateRules($CustomerValidate->rules(), $request);
        $customer = new Customer();
        $file_name = CustomerHelper::uploadImage($request->file('picture'));
        $customer->name = $request->name;
        $customer->link = $request->link;
        $customer->country_id = $request->country_id;
        $customer->save();
        //save image address by morph relation
        $image = new ImageController();
        $image->store($file_name,$customer);
        request()->session()->flash('message', __('member.general.message.customer_create_successful'));
        request()->session()->flash('success', 1);
        return response()->json([], 200);
    }

    public function edit($id)
    {
        $countries = Country::all();

        $customer = Customer::findorfail($id);
        return view('admin.customers.edit',compact('customer','countries'));
    }

    public function update(Request $request,$id)
    {
        $CustomerValidate = new UpdateCustomerRequest();
        $validate = $this->validateRules($CustomerValidate->rules(), $request);
        if ($validate != null)
            return $this->validateRules($CustomerValidate->rules(), $request);
        $customer = Customer::findorfail($id);
        if($request->hasFile('picture'))
        {
            CustomerHelper::deleteImage($customer);
            $file_name = CustomerHelper::uploadImage($request->file('picture'));
            $image = new ImageController();
            $image->store($file_name,$customer);
            $customer->update([
                'name' => $request->name,
                'link' => $request->link,
                'country_id' => $request->country_id

            ]);
            session()->flash('message', __('admin.general.message.customer_update_successful'));
            session()->flash('success', 1);
            return response()->json([], 200);
        }
        $customer->update([
            'name' => $request->name,
            'link' => $request->link,
            'country_id' => $request->country_id
        ]);
        session()->flash('message', __('admin.general.message.customer_update_successful'));
        session()->flash('success', 1);
        return response()->json([], 200);
    }

    public function delete($id)
    {
        $customer = Customer::findorfail($id);
        CustomerHelper::deleteImage($customer);
        $customer->delete();
        session()->flash('message', __('admin.general.message.customer_delete_successful'));
        session()->flash('success', 1);
        return redirect('admin/customers/');
    }
    public function search(Request  $request)
    {
        $search = $request->search;
        $customers = Customer::where('name', 'like', '%' . $search . '%')->orWhere('link', 'like', '%' . $search . '%')->paginate(Customer::paginateNumber);
        return view('admin.customers.index',compact('customers'),with([
        'sortField' => Customer::sortField,
        'sortType' => Customer::sortType
    ]));
    }
}
