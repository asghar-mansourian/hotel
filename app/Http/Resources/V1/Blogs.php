<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class Blogs extends JsonResource
{

    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
