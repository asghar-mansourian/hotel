<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $table = 'medias';

    protected $guarded = ['id'];

    const paginateNumber = 10;
}
