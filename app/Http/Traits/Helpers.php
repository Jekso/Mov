<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Storage;

trait Helpers
{
	
	public function generate_and_store_img($encoded_img_str, $driver)
    {
        $extension = explode(';', explode('/', $encoded_img_str)[1])[0];
        $image_name = str_random(40).'.'.$extension;
        $image = base64_decode(substr($encoded_img_str, strpos($encoded_img_str, ",")+1));
        Storage::disk($driver)->put($image_name, $image);
        return $image_name;
    }


    public function generate_and_store_file($encoded_file_str, $driver)
    {
        $extension = explode(';', explode('/', $encoded_file_str)[1])[0];
        $file_name = str_random(40).'.'.$extension;
        $file = base64_decode(substr($encoded_file_str, strpos($encoded_file_str, ",")+1));
        Storage::disk($driver)->put($file_name, $file);
        return $file_name;
    }

}
