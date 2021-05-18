<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Media;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function __invoke()
    {
        $medias = Media::all();

        return view('web.medias',compact('medias'));
    }
}
