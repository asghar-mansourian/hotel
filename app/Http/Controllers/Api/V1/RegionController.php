<?php

namespace App\Http\Controllers\Api\V1;

use App\Country;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\Region as RegionResource;

class RegionController extends Controller
{
    public function __invoke()
    {
        if (request()->filled('country_id')) {
            $country = Country::findOrFail(
                request()->get('country_id')
            );
        } else {
            $country = Country::getCompanyCountry();
        }

        return RegionResource::collection(
            $country->regions
        );
    }
}
