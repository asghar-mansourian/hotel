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
    const selectField = ['order_id', 'link', 'id', 'price', 'has_cargo', 'cargo', 'quantity', 'description', 'total', 'product_category_id'];
    const sortArrowTypeChecked = 'desc';
    const sortArrowFieldChecked = 'id';

    const STATUS_ORDERED = 0;
    const STATUS_PURCHASED = 1;
    const STATUS_WAREHOUSE_ABROAD = 2;
    const STATUS_FILL_IN_BOX = 3;
    const STATUS_ON_WAY = 4;
    const STATUS_CUSTOMS_INSPECTION = 5;
    const STATUS_IN_WAREHOUSE = 6;
    const STATUS_COURIER_DELIVERY = 7;
    const STATUS_COMPLETE = 8;
    const STATUS_ALL = [
        self::STATUS_ORDERED => 'ordered',
        self::STATUS_PURCHASED => 'purchased',
        self::STATUS_WAREHOUSE_ABROAD => 'warehouse_abroad',
        self::STATUS_FILL_IN_BOX => 'fill_in_box',
        self::STATUS_ON_WAY => 'on_way',
        self::STATUS_CUSTOMS_INSPECTION => 'customs_inspection',
        self::STATUS_IN_WAREHOUSE => 'in_warehouse',
        self::STATUS_COURIER_DELIVERY => 'courier_delivery',
        self::STATUS_COMPLETE => 'complete',
    ];

    protected $fillable = ['status', 'weight_price', 'weight', 'overseas_warehouse_number', 'domestic_warehouse_number'];

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

    public function productCategory()
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }

    public function statusLogs()
    {
        return $this->morphMany(StatusLog::class, 'orderable');
    }
}
