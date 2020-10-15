<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = [
        'name',
    ];

    const  paginateNumber = 10;
    const sortType = 'desc';
    const sortField = 'id';
    const selectField = ['name',  'id'];
    const sortArrowTypeChecked = 'desc';
    const sortArrowFieldChecked = 'id';

    protected $table = 'countries';

    public function regions(){
        return $this->hasMany('App\Region');
    }
}
