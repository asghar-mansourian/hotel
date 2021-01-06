<?php

namespace App;

use App\Collections\InvoiceCollection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use SoftDeletes;

    const  paginateNumber = 10;
    const sortType = 'desc';
    const sortField = 'id';
    const selectField = ['user_id', 'country_id', 'id',
        'branch_id', 'shop', 'product_type'
        , 'quantity', 'price', 'order_track', 'order_date', 'order_file', 'description', 'status', 'product_category_id'];
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
    const STATUS_CANCEL = 9;
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
        self::STATUS_CANCEL => 'cancel',
    ];

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
        'product_category_id',
        'weight_price',
        'weight',
        'overseas_warehouse_number',
        'domestic_warehouse_number',
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
