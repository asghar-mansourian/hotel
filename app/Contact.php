<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'name',  'email', 'message'
    ];

    const  paginateNumber = 10;
    const sortType = 'desc';
    const sortField = 'id';
    const selectField = ['name',  'id' , 'email', 'message'];
    const sortArrowTypeChecked = 'desc';
    const sortArrowFieldChecked = 'id';

}
