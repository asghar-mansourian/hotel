<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class Balance extends JsonResource
{

    public function toArray($request)
    {
        return [
            'balance' => $this->balance
        ];
    }
}
