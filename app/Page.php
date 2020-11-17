<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Page extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'slug', 'content', 'status'
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
    const sortType = 'desc';
    const sortField = 'id';
    const selectField = ['title', 'content', 'status', 'id'];
    const sortArrowTypeChecked = 'desc';
    const sortArrowFieldChecked = 'id';
    const GENDER_MAN = 1;
    const GENDER_WOMAN = 2;
    const GENDER_ALL = [
        self::GENDER_MAN => 'gender_man',
        self::GENDER_WOMAN => 'gender_woman',
    ];


    public function scopeFindViaSlug($query, $slug)
    {
        return $query->where('slug', $slug)->where('status', 0)->first() ?? abort(404);
    }
}
