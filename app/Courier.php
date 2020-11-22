<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courier extends Model
{
    public function productItems()
    {
        return $this->hasMany(CourierProductItem::class, 'courier_id');
    }
}
