<?php

namespace App\Http\Controllers\Admin\traits;


trait scopeHelper
{

    public function scopeSearch($query, $search)
    {

        if ($search == "") {
            return $query;
        }
        foreach ($this->fillable as $item) {

            if ($item == "user_id") {

                return $query->with(['user' => function ($query) use ($search) {
                    $query->where('email', 'like', '%' . $search . '%');
                }]);
                continue;
            }
            $query->orWhere($item, 'like', '%' . $search . '%');
        }
    }

    public function scopeOrderByWith($query, $with, $type, $field)
    {
        if ($with) {
            $query->with([$with => function ($query) use ($type, $field) {
                $query->OrderBy($field, $type);
            }]);
        } else {
            $query->OrderBy($field, $type);
        }

        return $query;
    }
}
