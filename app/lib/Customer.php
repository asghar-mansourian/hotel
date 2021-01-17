<?php
namespace App\lib;
use Illuminate\Support\Str;

class Customer{
    public static function uploadImage($file)
    {
        $image = $file->getClientOriginalName();
        $file_name = Str::random(40).$image;
        $imagePath = public_path('/images/customers/');
        $file->move($imagePath, $file_name);
        return $file_name;
    }

    public static function deleteImage($customer)
    {
        if(file_exists(public_path('/images/customers/'.$customer->image->file_name))){
            unlink(public_path('/images/customers/'.$customer->image->file_name));
        }
        $customer->image->delete();
        return;
    }
}
