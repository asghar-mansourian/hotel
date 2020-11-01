<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $fillable = ['from' , 'to' , 'from_value' , 'to_value'];
}
