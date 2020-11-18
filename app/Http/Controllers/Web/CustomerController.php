<?php

namespace App\Http\Controllers\Web;

use App\Customer;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\ValidatorRequest;

class CustomerController extends Controller
{
    use ValidatorRequest;

    public function __invoke()
    {
        $customers = Customer::all();

        return view('web.customers', compact('customers'));
    }
}
