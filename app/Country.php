<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{

    const  paginateNumber = 10;
    const sortType = 'desc';
    const sortField = 'id';
    const selectField = ['name', 'id' , 'flag' , 'currency'];
    const sortArrowTypeChecked = 'desc';
    const sortArrowFieldChecked = 'id';
    protected $fillable = [
        'name',  'flag' , 'currency'
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

    public function details()
    {
        return $this->hasMany(CountryDetail::class);
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }
}
