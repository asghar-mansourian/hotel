<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    protected $table = 'comments';

    protected $guarded = ['id'];
    public function image()
    {
        return $this->morphOne('App\Image','imageable');
    }

    public function inquirys()
    {
        return $this->hasMany('App\Inquiry','parent_id');
    }

    public function inquiry()
    {
        return $this->belongsTo('App\Inquiry','parent_id');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
