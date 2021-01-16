<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerReviews extends Model
{
    protected $guarded = ['id'];

    protected $table = 'customer_reviews';
    const  paginateNumber = 10;
    const sortType = 'desc';
    const sortField = 'created_at';
    const selectField = ['name', 'description','description_ru'];
    public function image()
    {
        return $this->morphOne('App\Image','imageable');
    }
}
