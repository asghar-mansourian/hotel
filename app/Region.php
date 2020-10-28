<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $fillable = [
        'name','description'
    ];

    const  paginateNumber = 10;
    const sortType = 'desc';
    const sortField = 'id';
    const selectField = ['name',  'id' , 'description' , 'country_id'];
    const sortArrowTypeChecked = 'desc';
    const sortArrowFieldChecked = 'id';

    public function country(){
        return $this->belongsTo('App\Country');
    }

    public function branches()
    {
        return $this->hasMany('Branch');
    }
}
