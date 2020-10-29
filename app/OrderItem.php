<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderItem extends Model
{
    use SoftDeletes;
    const  paginateNumber = 10;
    const sortType = 'desc';
    const sortField = 'id';
    const selectField = ['order_id', 'link' , 'id' , 'price' , 'has_cargo' , 'cargo' , 'quantity' , 'description' , 'total'];
    const sortArrowTypeChecked = 'desc';
    const sortArrowFieldChecked = 'id';
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
