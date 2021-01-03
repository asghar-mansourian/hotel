<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BoxItem extends Model
{
    protected $guarded = ['id'];

    public function orderable()
    {
        return $this->morphTo();
    }

    public $timestamps = false;
}
