<?php

namespace App\Http\Controllers\Admin;

use App;
use App\Contact;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ContactRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ContactController extends Controller
{

    public function __construct()
    {
        $this->middleware(['permission:read Contact|edit Contact|create Contact|delete Contact']);
    }

    public function index()
    {
        $contacts = Contact::query()
            ->select(Contact::selectField)
            ->orderBy(Contact::sortField, Contact::sortType)
            ->paginate(Contact::paginateNumber);

        return View::make('admin.contacts.index', compact('contacts'), with([
            'sortField' => Contact::sortField,
            'sortType' => Contact::sortType
        ]));

    }

    public function load()
    {
        $contacts = Contact::query()
            ->select(Contact::sortField)
            ->orderBy(Contact::sortArrowFieldChecked, Contact::sortArrowTypeChecked)
            ->paginate(Contact::paginateNumber);

        return View::make('admin.contacts.load', compact('contacts'), with([
            'sortField' => Contact::sortField,
            'sortType' => Contact::sortType
        ]));

    }

    public function show($id)
    {
        $contact = Contact::query()->where('id', $id)->first();
        return view('admin.contacts.show' , compact('contact'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $contacts = Contact::query()
            ->orWhere('name', 'like', '%' . $search . '%')
            ->select(Contact::selectField)
            ->paginate(Contact::paginateNumber);

        $countcontacts = Contact::query()
            ->orWhere('name', 'like', '%' . $search . '%')
            ->count();

        return View::make('admin.contacts.table', compact('contacts'), with([
            'sortField' => Contact::sortField,
            'sortType' => Contact::sortType,
            'countcontacts' => $countcontacts,
        ]));
    }

    public function sort(Request $request)
    {
        $sort_field = $request->input('sort_field');
        $sort_type = $request->input('sort_type');

        if ($sort_type == null)
            $sort_type = Contact::sortType;
        if ($sort_field == null)
            $sort_field = Contact::sortField;

        $contacts = Contact::query()
            ->select(Contact::selectField)
            ->orderBy($sort_field, $sort_type)
            ->paginate(Contact::paginateNumber);

        return View::make('admin.contacts.table', compact('contacts'), with([
            'sortField' => $sort_field,
            'sortType' => $sort_type
        ]));
    }

    public function destroy($id)
    {
        Contact::query()->find($id)->delete();

        session()->flash('message', __('custom.Contact.message.delete'));
        session()->flash('success', 1);
        return redirect()->back();

    }


}
