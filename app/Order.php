<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    const PAYMENT_TYPE_ONLINE = 0;
    const PAYMENT_TYPE_CASH = 1;
    const PAYMENT_TYPE_ALL = [
        self::PAYMENT_TYPE_ONLINE => 'online',
        self::PAYMENT_TYPE_CASH => 'cash'
    ];
    const  paginateNumber = 10;
    const sortType = 'desc';
    const sortField = 'id';
    const selectField = ['user_id', 'region_id' , 'id' , 'country_id' , 'totalPrice' , 'payment_type' , 'status'];
    const sortArrowTypeChecked = 'desc';
    const sortArrowFieldChecked = 'id';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class, 'order_id');
    }

    public function region()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function country()
    {
        return $this->belongsTo(Contact::class, 'country_id');
    }
}
