<?php

namespace App\Http\Controllers\Api\V1;

use App\Country;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\Country as CountryResource;

class CountryController extends Controller
{
    public function __invoke()
    {
        return CountryResource::collection(
            Country::all()
        );
    }
}
