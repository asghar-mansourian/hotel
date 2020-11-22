<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Courier extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'stock_id' => $this->stock_id,
            'district' => $this->district,
            'city' => $this->city,
            'street' => $this->street,
            'home' => $this->home,
            'phone' => $this->phone,
            'address' => $this->address
        ];
    }
}
