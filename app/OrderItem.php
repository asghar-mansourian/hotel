<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderItem extends Model
{
    use SoftDeletes;

    const HAS_CARGO_FALSE = 0;
    const HAS_CARGO_TRUE = 1;

    const  paginateNumber = 10;
    const sortType = 'desc';
    const sortField = 'id';
    const selectField = ['order_id', 'link', 'id', 'price', 'has_cargo', 'cargo', 'quantity', 'description', 'total'];
    const sortArrowTypeChecked = 'desc';
    const sortArrowFieldChecked = 'id';
    const STATUS_ORDERED = 0; // Yolda
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
    protected $fillable = ['status'];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function boxItems()
    {
        return $this->morphMany(BoxItem::class, 'orderable');
    }

    public function orderBarcode()
    {
        return $this->morphOne(OrderBarcode::class, 'orderable');
    }
}
