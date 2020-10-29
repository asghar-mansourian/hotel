<?php

namespace App;

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
        'description'
    ];
    const  paginateNumber = 10;
    const sortType = 'desc';
    const sortField = 'id';
    const selectField = ['user_id', 'country_id' , 'id' ,
        'branch_id' , 'shop' , 'product_type'
        , 'quantity' , 'price' , 'order_track' , 'order_date' , 'order_file' , 'description'];
    const sortArrowTypeChecked = 'desc';
    const sortArrowFieldChecked = 'id';

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
}
