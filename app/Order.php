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


    const STATUS_ORDERED = 0;
    const STATUS_WAREHOUSE_ABROAD = 1;
    const STATUS_ON_WAY = 2;
    const STATUS_CUSTOMS_INSPECTION = 3;
    const STATUS_IN_WAREHOUSE = 4;
    const STATUS_COURIER_DELIVERY = 5;
    const STATUS_RETURN = 6;
    const STATUS_COMPLETE = 7;
    const STATUS_ALL = [
        self::STATUS_ORDERED => 'ordered',
        self::STATUS_WAREHOUSE_ABROAD => 'warehouse_abroad',
        self::STATUS_ON_WAY => 'on_way',
        self::STATUS_CUSTOMS_INSPECTION => 'customs_inspection',
        self::STATUS_IN_WAREHOUSE => 'in_warehouse',
        self::STATUS_COURIER_DELIVERY => 'courier_delivery',
        self::STATUS_RETURN => 'return',
        self::STATUS_COMPLETE => 'complete',
    ];

    const  paginateNumber = 10;
    const sortType = 'desc';
    const sortField = 'id';
    const selectField = ['user_id', 'branch_id', 'id', 'link','country_id', 'total', 'payment_type', 'status'];
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
