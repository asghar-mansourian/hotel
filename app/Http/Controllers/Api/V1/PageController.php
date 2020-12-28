<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\Page as PageResource;
use App\Page;

class PageController extends Controller
{

    public function __invoke($slug)
    {
        return PageResource::make(
            Page::find($slug)
        );
    }
}
