<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\ResourceCollection;

class Balance extends ResourceCollection
{

    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
