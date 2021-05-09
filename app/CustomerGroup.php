<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Stancl\Tenancy\Database\Concerns\BelongsToTenant;

class CustomerGroup extends Model
{

    protected $guarded = ['id'];

    protected $table = 'customer_groups';
    const  paginateNumber = 10;
    const sortType = 'desc';
    const sortField = 'created_at';
    const selectField = ['name', 'created_at','image'];

    public function customers()
    {
        return $this->belongsToMany(Customer::class,CustomerGroupPivote::class,'customer_group_id');
    }
}
