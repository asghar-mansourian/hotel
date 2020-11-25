<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Script extends Model
{
    protected $fillable = [
        'name',
        'content',
        'file',
        'status',
    ];
    const  paginateNumber = 10;
    const sortType = 'desc';
    const sortField = 'id';
    const selectField = ['name', 'id' ,'content', 'file', 'status'];
    const sortArrowTypeChecked = 'desc';
    const sortArrowFieldChecked = 'id';


//    public function getStatusAttribute($value)
//    {
//        if ($value == 0) {
//            return 'deactivate';
//        } elseif ($value == 1) {
//            return 'active';
//        }
//
//    }

}
