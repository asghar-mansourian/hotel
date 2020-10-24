<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    const  paginateNumber = 10;
    const sortType = 'desc';
    const sortField = 'id';
    const selectField = ['name', 'id'];
    const sortArrowTypeChecked = 'desc';
    const sortArrowFieldChecked = 'id';
    protected $fillable = [
        'name',
    ];
    protected $table = 'countries';

    public static function getCompanyCountry()
    {
        $countryId = Setting::getValue(Setting::FIELD_COMPANY_COUNTRY_ID);

        return Country::find($countryId);
    }

    public function regions()
    {
        return $this->hasMany('App\Region');
    }
}
