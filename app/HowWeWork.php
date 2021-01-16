<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HowWeWork extends Model
{
    protected $table = 'how_we_works';

    protected $guarded = ['id'];

    const  paginateNumber = 10;
    const sortType = 'desc';
    const sortField = 'id';
    const selectField = ['title', 'title_ru','description','description_ru', 'id'];
    const sortArrowTypeChecked = 'desc';
    const sortArrowFieldChecked = 'id';
}
