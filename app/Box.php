<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Box extends Model
{
    const  paginateNumber = 50;
    const sortType = 'desc';
    const sortField = 'created_at';
    const selectField = ['created_at'];

    const STATUS_FILL_IN_BOX = 0;
    const STATUS_BOX_AIR_SEND = 1;
    const STATUS_BOX_CAME_TO_DOMESTIC = 2;
    const STATUS_IN_WAREHOUSE = 3;
    const STATUS_ALL = [
        self::STATUS_FILL_IN_BOX => 'fill_in_box',
        self::STATUS_BOX_AIR_SEND => 'box_air_send',
        self::STATUS_BOX_CAME_TO_DOMESTIC => 'box_came_to_domestic',
        self::STATUS_IN_WAREHOUSE => 'in_warehouse',
    ];

    protected $guarded = ['id'];
    protected $table = 'boxes';

    public function boxItems()
    {
        return $this->hasMany(BoxItem::class, 'box_id');
    }
}
