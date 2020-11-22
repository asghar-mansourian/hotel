<?php

namespace App;

use App\Collections\InvoiceCollection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'branch_id',
        'country_id',
        'shop',
        'product_type',
        'quantity',
        'price',
        'order_track',
        'order_date',
        'order_file',
        'description',
        'status',
    ];
    const  paginateNumber = 10;
    const sortType = 'desc';
    const sortField = 'id';
    const selectField = ['user_id', 'country_id', 'id',
        'branch_id', 'shop', 'product_type'
        , 'quantity', 'price', 'order_track', 'order_date', 'order_file', 'description' , 'status'];
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

    public function newCollection(array $models = [])
    {
        return new InvoiceCollection($models);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }

    public function CourierProductItems()
    {
        return $this->morphMany(CourierProductItem::class, 'productable');
    }
}
