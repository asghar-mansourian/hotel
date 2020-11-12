<?php


namespace App\lib;


class User
{
    public static function getGenderName($genderKey)
    {
        return \App\User::GENDER_ALL[$genderKey];
    }
}
