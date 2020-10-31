<?php

namespace App\Http\Controllers\Api\V1;

use App\Branch;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\Branch as BranchResource;

class BranchController extends Controller
{
    public function __invoke()
    {
        return BranchResource::collection(
            Branch::query()->paginate(
                request('per_page', 10)
            )
        );
    }



}
