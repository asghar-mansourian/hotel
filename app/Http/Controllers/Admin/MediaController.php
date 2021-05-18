<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\ValidatorRequest;
use App\Http\Requests\Admin\MediaRequest;
use App\Media;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    use ValidatorRequest;
    public function index()
    {
        $medias = Media::paginate(Media::paginateNumber);

        return view('admin.medias.index',compact('medias'));
    }

    public function create()
    {
        return view('admin.medias.create');
    }

    public function store(Request $request)
    {
        $mediaValidate = new MediaRequest();
        $validate = $this->validateRules($mediaValidate->rules(), $request);
        if ($validate != null)
            return $this->validateRules($mediaValidate->rules(), $request);

        Media::create([
            'name' => $request->name,
            'url' => $request->url,
        ]);

        session()->flash('message', __('custom.media_create_success'));
        session()->flash('success', 1);
        return response()->json([], 200);
    }

    public function edit($id)
    {
        $media = Media::findOrFail($id);

        return view('admin.medias.edit',compact('media'));
    }

    public function update(Request $request,$id)
    {
        $mediaValidate = new MediaRequest();
        $validate = $this->validateRules($mediaValidate->rules(), $request);
        if ($validate != null)
            return $this->validateRules($mediaValidate->rules(), $request);
        Media::find($id)->update([
            'name' => $request->name,
            'url' => $request->url,
        ]);

        session()->flash('message', __('custom.media_create_success'));
        session()->flash('success', 1);
        return response()->json([], 200);
    }

    public function destroy($id)
    {
        Media::find($id)->delete();
        session()->flash('message', __('custom.media_create_success'));
        session()->flash('success', 1);
        return back();
    }
}
