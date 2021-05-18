<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectRoom extends Model
{
    protected $table = 'project_rooms';

    protected $guarded = ['id'];

    const paginateNumber = 10;

    public function project()
    {
        return $this->belongsTo(Project::class,'project_id');
    }

    public function image()
    {
        return $this->morphMany('App\Image','imageable');
    }

}
