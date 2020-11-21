<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{

    protected $fillable =['address'];

    const  paginateNumber = 10;
    const sortType = 'asc';
    const sortField = 'created_at';
    const selectField = ['address','id'];
    const sortArrowTypeChecked = 'desc';
    const sortArrowFieldChecked = 'id';


}
