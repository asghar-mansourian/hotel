<?php

namespace App\Http\Controllers\Web;

use App;
use App\Contact;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\ValidatorRequest;
use Illuminate\Http\Request;

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
            'email' => ['required', 'string', 'email', 'max:255'],
            'message' => ['required', 'string',  'max:255'],
        ]);
        Contact::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'message' => $request->input('message'),
        ]);

        return redirect()->back()->with('success' , 'Send Message Successful');
    }




}
