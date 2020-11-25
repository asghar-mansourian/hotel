<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\ValidatorRequest;
use App\Http\Requests\Admin\ScriptRequest;
use App\Page;
use App\Script;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ScriptController extends Controller
{
    use ValidatorRequest;

    public function index()
    {
        $scripts = Script::query()
            ->select(Script::selectField)
            ->orderBy(Script::sortField, script::sortType)
            ->paginate(Script::paginateNumber);

        return View::make('admin.scripts.index', compact('scripts'), with([
            'sortField' => Script::sortField,
            'sortType' => Script::sortType
        ]));
    }

    public function create()
    {
        $authores = Admin::query()->get();
        return view('admin.scripts.create', compact('authores'));
    }


    public function store(Request $request)
    {
        $scriptValidate = new ScriptRequest();
        $validate = $this->validateRules($scriptValidate->rules(), $request);
        if ($validate != null)
            return $this->validateRules($scriptValidate->rules(), $request);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $format = $file->getClientOriginalExtension();

            $fileName = $file->getClientOriginalName();
            $fileName = substr($fileName, 0, strrpos($fileName, '.'));
            $fileName = str_replace(' ', '', $fileName);
            $Random_Number = rand(0, 9999);
            $name = $fileName . '-' . $Random_Number . '.' . $format;

            $destinationPath = public_path('/admin/scripts/files');
            $file->move($destinationPath, $name);
        }
        Script::query()->insert([
            'name' => $request->input('title'),
            'content' => $request->input('content') ?? null,
            'file' => $name ?? null,
            'status' => $request->input('status'),
        ]);

        session()->flash('message', __('admin.scriptmessagecreate'));
        session()->flash('success', 1);
        return response()->json([], 200);
    }

    public function update(Request $request, $id)
    {
        $scriptValidate = new ScriptRequest();
        $validate = $this->validateRules($scriptValidate->rules(), $request);
        if ($validate != null)
            return $this->validateRules($scriptValidate->rules(), $request);

        $name=$request->input('hidden_file');
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $format = $file->getClientOriginalExtension();

            $fileName = $file->getClientOriginalName();
            $fileName = substr($fileName, 0, strrpos($fileName, '.'));
            $fileName = str_replace(' ', '', $fileName);
            $Random_Number = rand(0, 9999);
            $name = $fileName . '-' . $Random_Number . '.' . $format;

            $destinationPath = public_path('/admin/scripts/files');
            $file->move($destinationPath, $name);
        }
        Script::query()->where('id' , $id)->update([
            'name' => $request->input('title'),
            'content' => $request->input('content') ?? null,
            'file' => $name ?? null,
            'status' => $request->input('status'),
        ]);

        session()->flash('message', __('admin.scriptmessageupdate'));
        session()->flash('success', 1);
        return response()->json([], 200);
    }

    public function edit($id)
    {
        $page = Page::query()
            ->where('id', $id)
            ->first();
        $script = Script::query()
            ->where('id', $id)
            ->first();
        return view('admin.scripts.edit', compact('script', 'page', 'id'));
    }


    public function load()
    {
        $orders = script::query()
            ->select(script::sortField)
            ->orderBy(script::sortArrowFieldChecked, script::sortArrowTypeChecked)
            ->paginate(script::paginateNumber);

        return View::make('admin.scripts.load', compact('orders'), with([
            'sortField' => script::sortField,
            'sortType' => script::sortType
        ]));

    }

    public function show($id)
    {
        $script = script::query()
            ->with('country', 'user')
            ->where('id', $id)
            ->first();
        return view('admin.scripts.show', compact('script'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $scripts = script::query()
            ->orWhere('name', 'like', '%' . $search . '%')
            ->orWhere('content', 'like', '%' . $search . '%')
            ->select(script::selectField)
            ->paginate(script::paginateNumber);

        return View::make('admin.scripts.index', compact('scripts'), with([
            'sortField' => script::sortField,
            'sortType' => script::sortType,
        ]));
    }

    public function destroy($id)
    {
        script::query()->find($id)->delete();

        session()->flash('message', __('admin.scriptmessagedelete'));
        session()->flash('success', 1);
        return redirect()->back();

    }

}
