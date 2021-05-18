<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects';

    protected $guarded = ['id'];

    const paginateNumber = 10;

    const STATUS_FINISHED = '1';
    const STATUS_UNFINISHED = '0';
    const STATUS_ALL=[
        self::STATUS_FINISHED => 'finished',
        self::STATUS_UNFINISHED => 'unfinished'
    ];
    public function image()
    {
        return $this->morphMany('App\Image','imageable');
    }

    public function rooms()
    {
        return $this->hasMany(ProjectRoom::class);
    }

}
