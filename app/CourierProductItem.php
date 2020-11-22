<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourierProductItem extends Model
{
    public $timestamps = false;

    public function productable()
    {
        return $this->morphTo('productable');
    }
}
