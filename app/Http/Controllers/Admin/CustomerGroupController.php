<?php

namespace App\Http\Controllers\Admin;

use App\CustomerGroup;
use App\CustomerGroupPivote;
use App\Http\Controllers\Controller;
use App\Customer;
use App\Http\Controllers\Traits\ValidatorRequest;
use App\Http\Requests\Admin\CustomerGroupRequest;
use Illuminate\Http\Request;

class CustomerGroupController extends Controller
{
    use ValidatorRequest;

    public function index()
    {
        $customerGroups = CustomerGroup::paginate(CustomerGroup::paginateNumber);
        return view('admin.customer_groups.index',compact('customerGroups'),with([
            'sortField' => CustomerGroup::sortField,
            'sortType' => CustomerGroup::sortType
        ]));
    }
    public function create(){
        $customers = Customer::all();
        return view('admin.customer_groups.create',compact('customers'));
    }

    public function store(Request $request)
    {
        $CustomerValidate = new CustomerGroupRequest();
        $validate = $this->validateRules($CustomerValidate->rules(), $request);
        if ($validate != null)
            return $this->validateRules($CustomerValidate->rules(), $request);
        if ($request->hasFile('picture')) {
            $image = $request->file('picture');
            $format = $image->getClientOriginalExtension();

            $fileName = $image->getClientOriginalName();
            $fileName = substr($fileName, 0, strrpos($fileName, '.'));
            $fileName = str_replace(' ', '', $fileName);
            $Random_Number = rand(0, 9999);
            $name = $fileName . '-' . $Random_Number . '.' . $format;

            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
        }
        $customerGroup = new CustomerGroup();
        $customerGroup->name = $request->name;
        $customerGroup->image = $name;
        $customerGroup->save();

        if($request->customer_ids){
                $customerGroup->customers()->attach($request->customer_ids);
        }
        request()->session()->flash('message', __('member.general.message.customer_groups_create_successful'));
        request()->session()->flash('success', 1);
        return response()->json([],200);
    }

    public function edit($id)
    {
        $customerGroup = CustomerGroup::find($id);
        $customers = Customer::all();
        $customerGroupCustomers = $customerGroup->customers()->pluck('customer_id')->toArray();

        return view('admin.customer_groups.edit',compact('customerGroup','customers','customerGroupCustomers'));
    }

    public function update(Request $request,$id){
        $CustomerValidate = new CustomerGroupRequest();
        $validate = $this->validateRules($CustomerValidate->rules(), $request);
        if ($validate != null)
            return $this->validateRules($CustomerValidate->rules(), $request);
        if ($request->hasFile('new_picture')) {
            $image = $request->file('new_picture');
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
            $name = $request->input('picture');
        }

        $customerGroup = CustomerGroup::findOrFail($id);
        $customerGroup->update([
            'name' => $request->name,
            'image' => $name
        ]);
        if($request->customer_ids){
            $customerGroup->customers()->sync($request->customer_ids);
        }
        request()->session()->flash('message', __('member.general.message.customer_groups_update_successful'));
        request()->session()->flash('success', 1);
        return response()->json([],200);
    }

    public function delete($id){
        $customerGroup = CustomerGroup::findOrFail($id);
        $customerGroup->customers()->delete();
        $customerGroup->delete();
        request()->session()->flash('message', __('member.general.message.customer_groups_delete_successful'));
        request()->session()->flash('success', 1);
        return redirect('admin/customer-groups/');
    }
}
