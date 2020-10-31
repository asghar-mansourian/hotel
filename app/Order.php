<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    protected $guarded = ['id'];

    const PAYMENT_TYPE_ONLINE = 0;
    const PAYMENT_TYPE_CASH = 1;
    const PAYMENT_TYPE_ALL = [
        self::PAYMENT_TYPE_ONLINE => 'online',
        self::PAYMENT_TYPE_CASH => 'cash'
    ];
    const  paginateNumber = 10;
    const sortType = 'desc';
    const sortField = 'id';
    const selectField = ['user_id', 'branch_id' , 'id' , 'country_id' , 'total' , 'payment_type' , 'status'];
    const sortArrowTypeChecked = 'desc';
    const sortArrowFieldChecked = 'id';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'order_id');
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }
}
