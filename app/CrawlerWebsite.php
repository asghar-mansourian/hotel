<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CrawlerWebsite extends Model
{
    protected $fillable = ['link', 'url', 'price','type_price', 'photo'];

    const  paginateNumber = 10;
    const sortType = 'desc';
    const sortField = 'id';
    const selectField = ['id', 'link', 'url', 'price','type_price', 'photo'];
    const sortArrowTypeChecked = 'desc';
    const sortArrowFieldChecked = 'id';
}
