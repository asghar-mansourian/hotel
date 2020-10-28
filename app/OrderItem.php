<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderItem extends Model
{
    use SoftDeletes;

    const HAS_CARGO_FALSE = 0;
    const HAS_CARGO_TRUE = 1;

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
