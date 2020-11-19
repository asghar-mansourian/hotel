<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Slider extends Model
{
    use Notifiable;
    protected $fillable=['title', 'picture', 'order_by'];


    const  paginateNumber = 10;
    const sortType = 'asc';
    const sortField = 'order_by';
    const selectField = ['title', 'picture', 'order_by', 'id'];
    const sortArrowTypeChecked = 'desc';
    const sortArrowFieldChecked = 'id';
}
