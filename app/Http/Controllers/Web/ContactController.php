<?php

namespace App\Http\Controllers\Web;

use App;
use App\Contact;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\ValidatorRequest;
use App\Mail\contactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    use ValidatorRequest;

    public function index()
    {
        return view('web.contact');

    }

    public function store(Request $request)
    {
        $request->validate([
//            'serial_number' => ['required', 'max:9', 'unique:users'],
            'name' => ['required', 'string', 'max:255'],
//            'area_code' => ['required', 'string', 'max:255'],
            'telephone' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'message' => ['required', 'string',  'max:255'],
        ]);
        Mail::to('info@garantigroup.com.az')->send(new contactUs($request));
        Contact::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'message' => $request->input('message'),
            'telephone' => $request->input('telephone')
        ]);

        return redirect()->back()->with('success' , __('website.send_contact_successful'));
    }




}
