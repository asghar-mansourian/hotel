<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusLog extends Model
{
    protected $guarded = ['id'];

    public function orderable()
    {
        return $this->morphTo();
    }
}
