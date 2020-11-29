<?php

namespace App;

use App\Http\Controllers\Traits\scopeHelper;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable, SoftDeletes, scopeHelper;

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
        'name', 'family', 'email', 'password', 'code', 'sms_code', 'verified', 'phone', 'serial_number', 'citizenship', 'birthdate', 'gender', 'region_id', 'branch_id', 'fin', 'address', 'token'
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

    public function getFullNameAttribute()
    {
        return trim("{$this->name} {$this->family}");
    }

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

    public function payments()
    {
        return $this->hasMany('App\Payment');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id');
    }

    public function couriers()
    {
        return $this->hasMany(Courier::class, 'user_id');
    }

    public function branches()
    {
        return $this->hasMany(Branch::class, 'branch_id');
    }

    public function region()
    {
        return $this->belongsTo(Region::class, 'region_id');
    }

}
