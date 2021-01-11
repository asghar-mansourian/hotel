<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{

    protected $fillable = [
        'name', 'guard_name'
    ];
    const  paginateNumber = 10;
    const sortType = 'asc';
    const sortField = 'created_at';
    const selectField = ['name', 'guard_name', 'created_at', 'id'];
    const sortArrowTypeChecked = 'desc';
    const sortArrowFieldChecked = 'id';

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_has_permissions', 'permission_id', 'rolle_id');
    }
}
