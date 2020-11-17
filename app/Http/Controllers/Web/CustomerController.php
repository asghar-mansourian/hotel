<?php

namespace App\Http\Controllers\Web;

use App\Customer;
use App\Http\Controllers\Admin\traits\ValidatorRequest;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    use ValidatorRequest;

    public function __invoke()
    {
        $customers = Customer::all();

        return view('web.customers', compact('customers'));
    }
}
