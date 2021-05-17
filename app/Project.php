<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects';

    protected $guarded = ['id'];

    const paginateNumber = 10;
}
