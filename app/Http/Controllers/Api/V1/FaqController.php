<?php

namespace App\Http\Controllers\Api\V1;

use App\Faq;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\Faq as FaqResource;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function __invoke(Request $request)
    {
        return FaqResource::collection(
            Faq::orderBy('id', 'desc')->get()
        );
    }
}
