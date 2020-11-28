<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
        public $timestamps = false;
        const  paginateNumber = 100;
        const sortType = 'desc';
        const sortField = 'id';
        const selectField = ['id', 'key', 'value'];
        const sortArrowTypeChecked = 'desc';
        const sortArrowFieldChecked = 'id';



        public function scopeGetValue($query, $key)
        {
            return $query->where('key', $key)->value('value') ?? '';
        }
}
