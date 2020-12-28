<?php

namespace App\Http\Controllers\Api\V1;

use App\CountryDetail;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\Country as CountryResource;


class CountryDetailController extends Controller
{
    public function __invoke()
    {
        return CountryResource::collection(
            CountryDetail::all()
        );
    }

}
