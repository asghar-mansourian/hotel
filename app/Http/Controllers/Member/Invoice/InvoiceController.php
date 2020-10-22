<?php

namespace App\Http\Controllers\Member\Invoice;

use App\Http\Controllers\Controller;

class InvoiceController extends Controller
{
    public function create()
    {
        return view('members.invoices.create');
    }

    public function store()
    {

    }
}
