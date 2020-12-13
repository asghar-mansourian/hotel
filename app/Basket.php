<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Basket extends Model
{
    use SoftDeletes;
    public $timestamps = true;

    protected $fillable = [
        'branch_id' , 'user_id' , 'price' , 'quantity' , 'color' , 'description' , 'country_id' , 'specification' , 'link',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
