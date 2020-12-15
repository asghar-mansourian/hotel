<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class Crawler extends JsonResource
{

    public function toArray($request)
    {

        return [
            'name' => $this->name,
            'link' => $this->link,
            'price' => $this->price,
            'price_type' => $this->type_price,
            'photo' => url('images/' . $this->photo),
        ];
    }
}
