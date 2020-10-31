<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Payment extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type' , 'description' , 'price' , 'refid' , 'status' ,'ip' , 'extra' , 'authority' , 'user_id'
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
    const selectField = ['id','price', 'discount', 'refid' , 'status' , 'user_id' , 'ip' , 'extra'];
    const sortArrowTypeChecked = 'desc';
    const sortArrowFieldChecked = 'id';
    public function user(){
        return $this->belongsTo('App\User' , 'user_id');
    }
}
