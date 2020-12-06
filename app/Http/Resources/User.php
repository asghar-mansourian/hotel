<?php

namespace App\Http\Resources;

use App\Country;
use App\Http\Resources\V1\Region;
use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "branch_id" => $this->branch_id,
            "name" => $this->name,
            "family" => $this->family,
            "email" => $this->email,
            "status" => $this->status,
            "email_verified_at" => $this->email_verified_at,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
            "region_id" => $this->region_id,
            "region" => Region::make(\App\Region::find($this->region_id)),
            "country" => Region::make(Country::find($this->getRegion())),
            "code" => $this->code,
            "sms_code" => $this->sms_code,
            "sms_verified_at" => $this->sms_verified_at,
            "verified" => $this->verified,
            "phone" => $this->phone,
            "serial_number" => $this->serial_number,
            "citizenship" => $this->citizenship,
            "birthdate" => $this->birthdate,
            "gender" => $this->gender,
            "fin" => $this->fin,
            "address" => $this->address,
            "balance" => $this->balance,
            "usd_balance" => $this->usd_balance,
            "deleted_at" => $this->deleted_at,
            "token" => $this->token,
        ];
    }

    /**
     * @return mixed
     */
    public function getRegion()
    {
        return \App\Region::find($this->region_id)->country_id;
    }
}
