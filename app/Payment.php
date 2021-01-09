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
        'type', 'description', 'price', 'refid', 'status', 'ip', 'extra', 'authority', 'user_id', 'balance_type', 'modelable_type'
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
    protected $table = 'payments';
    const sortType = 'desc';
    const sortField = 'id';
    const selectField = ['id', 'price', 'discount', 'refid', 'status', 'user_id', 'ip', 'extra'];
    const sortArrowTypeChecked = 'desc';
    const sortArrowFieldChecked = 'id';

    const PAYMENT_TYPE_ONLINE = 'online';
    const PAYMENT_TYPE_CASH = 'cash';
    const PAYMENT_TYPE_BALANCE_ONE = 'tl';
    const PAYMENT_TYPE_BALANCE_TWO = 'usd';

    const PAYMENT_TYPE_BALANCE_TYPES = [
        self::PAYMENT_TYPE_BALANCE_TWO => self::PAYMENT_TYPE_BALANCE_TWO,
        self::PAYMENT_TYPE_BALANCE_ONE => self::PAYMENT_TYPE_BALANCE_ONE,
    ];

    const PAYMENT_STATUS_PAID = 1;
    const PAYMENT_STATUS_NO_PAID = 0;

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function orderable()
    {
        return $this->morphTo('modelable');
    }
}
