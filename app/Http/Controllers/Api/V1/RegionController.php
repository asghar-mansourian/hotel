<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\Region as RegionResource;
use App\Region;

class RegionController extends Controller
{
    public function __invoke()
    {
        return RegionResource::collection(
            Region::all()
        );
    }
}
