<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PriceItem extends Model
{


    const  paginateNumber = 10;
    const sortType = 'desc';
    const sortField = 'id';
    const selectField = ['from', 'id', 'to', 'price'];
    const sortArrowTypeChecked = 'desc';
    const sortArrowFieldChecked = 'id';
    protected $fillable = ['from', 'id', 'to', 'price'];
}
