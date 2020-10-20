<?php

namespace App\Http\Controllers\Web;

use App;
use App\Blog;
use App\Admin;
use App\Contact;
use App\Http\Controllers\Admin\traits\ValidatorRequest;
use App\Http\Controllers\Controller;
use App\Rules\ExistsGender;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

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
