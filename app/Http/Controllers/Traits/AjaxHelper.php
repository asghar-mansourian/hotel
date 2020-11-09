<?php

namespace App\Http\Controllers\Admin\traits;


trait AjaxHelper{
    public $search;
    public $field;
    public $type;
    public function load($model)
    {
        if (session()->has('sort_type') && session()->has('sort_field'))
        {
            $this->field = session()->has('sort_field');
            $this->type = session()->has('sort_type');
        }
        else{
            $this->field = $model::sortField;
            $this->type = $model::sortType;
        }
        $this->search = "";
        if (session()->has('search')){
            $this->search = session()->get('search');
        }

    }

}
