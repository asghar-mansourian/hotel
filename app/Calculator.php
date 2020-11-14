<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calculator extends Model
{
    protected $table = 'calculatores';
    protected $fillable = [
        'from', 'to', 'unit_id', 'country_id', 'discount', 'currency'
    ];

    const  paginateNumber = 10;
    const sortType = 'desc';
    const sortField = 'id';
    const selectField = ['id', 'from', 'to', 'unit_id', 'country_id', 'discount', 'currency'];
    const sortArrowTypeChecked = 'desc';
    const sortArrowFieldChecked = 'id';

    public function country()
    {
        return $this->belongsTo('App\Country');
    }

    public function unit()
    {
        return $this->belongsTo('App\Unit');
    }
}
