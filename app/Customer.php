<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $guarded = ['id'];

    protected $table = 'customers';
    const  paginateNumber = 10;
    const sortType = 'desc';
    const sortField = 'created_at';
    const selectField = ['name', 'link','picture', 'created_at'];

    public function image()
    {
        return $this->morphOne('App\Image','imageable');
    }
}
