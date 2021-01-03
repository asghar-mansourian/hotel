<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderBarcode extends Model
{
    public function orderable()
    {
        return $this->morphTo();
    }
}
