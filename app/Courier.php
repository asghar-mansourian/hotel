<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courier extends Model
{
    const  paginateNumber = 10;
    const sortType = 'desc';
    const sortField = 'id';
    const selectField = ['city', 'district', 'stock_id', 'user_id', 'id' ,  'street' , 'home' , 'phone' , 'address'];
    const sortArrowTypeChecked = 'desc';
    const sortArrowFieldChecked = 'id';
    public function productItems()
    {
        return $this->hasMany(CourierProductItem::class, 'courier_id');
    }

    public function stock()
    {
        return $this->belongsTo(Stock::class);
    }
}
