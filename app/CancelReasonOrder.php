<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CancelReasonOrder extends Model
{

    public $timestamps = false;
    const  paginateNumber = 10;
    const sortType = 'desc';
    const sortField = 'id';
    const selectField = ['id', 'description', 'description_ru', 'description_az'];
    const sortArrowTypeChecked = 'desc';
    const sortArrowFieldChecked = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'description',
        'description_ru',
        'description_az'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [

    ];

}
