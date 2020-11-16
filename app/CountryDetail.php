<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CountryDetail extends Model
{


    const  paginateNumber = 10;
    const sortType = 'desc';
    const sortField = 'id';
    const selectField = ['country_id', 'id', 'name', 'value'];
    const sortArrowTypeChecked = 'desc';
    const sortArrowFieldChecked = 'id';
    protected $fillable = ['id', 'country_id', 'name', 'value'];
    protected $with = ['country'];


    public function country()
    {
        return $this->belongsTo('App\Country');
    }


}
