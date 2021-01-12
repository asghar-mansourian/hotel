<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NotificationMessage extends Model
{
    const SMS_TYPE = 1;
    const EMAIL_TYPE = 2;
    const FIREBASE_TYPE = 3;

    const TYPE_ALL = [
        self::SMS_TYPE,
        self::EMAIL_TYPE,
        self::FIREBASE_TYPE
    ];

    public $timestamps = false;
    protected $guarded = ['id'];
}
