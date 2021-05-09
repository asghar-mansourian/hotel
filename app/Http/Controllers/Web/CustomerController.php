<?php

namespace App\Http\Controllers\Web;

use App\Country;
use App\Customer;
use App\CustomerGroup;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\ValidatorRequest;

class CustomerController extends Controller
{
    use ValidatorRequest;

    public function __invoke()
    {
        $countries = Country::whereIn('id', Customer::query()->distinct('country_id')->pluck('country_id'))->get();
        if(\request()->get('customer_groups')!='' and \request()->get('customer_groups')!='all'){
            $customerGroup = CustomerGroup::find(\request()->get('customer_groups'));
            $customers = $customerGroup->customers;
        }
        elseif (\request()->get('name')!='')
            $customers = Customer::where('name','like','%'.\request()->get('name').'%')->get();
        elseif (\request()->get('country_id')!='')
            {
                $customers = Customer::where('country_id',\request()->get('country_id'))->get();
            }
        else
            $customers = Customer::get();
        $customerGroups = CustomerGroup::all();
        return view('web.customers', compact('customers','customerGroups','countries'));
    }
}
