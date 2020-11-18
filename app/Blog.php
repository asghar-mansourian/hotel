<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Blog extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'slug', 'content', 'status', 'picture', 'author_id', 'content_ru', 'content_az'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [

    ];

    const  paginateNumber = 10;
    const sortType = 'asc';
    const sortField = 'created_at';
    const selectField = ['title', 'slug', 'created_at', 'content', 'author_id', 'picture', 'status', 'id'];
    const sortArrowTypeChecked = 'desc';
    const sortArrowFieldChecked = 'id';

    public function author()
    {
        return $this->belongsTo(Admin::class, 'author_id', 'id');
    }

}
