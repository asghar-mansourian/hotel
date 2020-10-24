<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable, SoftDeletes;

    const  paginateNumber = 10;
    const sortType = 'desc';
    const sortField = 'id';
    const selectField = ['name', 'family', 'email', 'status', 'id'];
    const sortArrowTypeChecked = 'desc';
    const sortArrowFieldChecked = 'id';
    const GENDER_MAN = 1;
    const GENDER_WOMAN = 2;
    const GENDER_ALL = [
        self::GENDER_MAN => 'man',
        self::GENDER_WOMAN => 'woman'
    ];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'code', 'phone', 'serial_number', 'citizenship', 'birthdate', 'gender', 'fin', 'address', 'token'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class, 'user_id');
    }
}
