<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomDetail extends Model
{
    protected $table = 'room_details';

    protected $guarded = ['id'];

    const paginateNumber = 10;

    public function room()
    {
        return $this->belongsTo(ProjectRoom::class,'project_room_id');
    }
}
