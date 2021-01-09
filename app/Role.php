<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
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

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'role_has_permissions', 'role_id', 'permission_id');
    }
}
