<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Image;
use Illuminate\Http\Request;
use Response;

class ImageController extends Controller
{
    public function store($file_name,$relate)
    {
        $image = $relate->image()->create([
           'file_name' => $file_name
        ]);
    }

    public function show($id)
    {
        $image = Image::findorfail($id);
        return Response::make(\Storage::get("comment/".$image->file_name),200);
    }
}
