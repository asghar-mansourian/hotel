<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    const  paginateNumber = 100;
    const sortType = 'desc';
    const sortField = 'id';
    const selectField = ['id', 'key'];
    const sortArrowTypeChecked = 'desc';
    const sortArrowFieldChecked = 'id';
    public $timestamps = false;

    public function scopeGetValue($query, $key)
    {
        return $query->where('key', $key)->value('value') ?? '';
    }

    public function notificationMessages()
    {
        return $this->hasMany(NotificationMessage::class, 'notification_id');
    }
}
