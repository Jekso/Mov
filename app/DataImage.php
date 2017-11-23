<?php

namespace App;

use App\Data;
use App\DataImageContent;
use Illuminate\Database\Eloquent\Model;

class DataImage extends Model
{

    
    /**
    * --------- Realationship functions ---------
    */

    public function data()
    {
    	return $this->belongsTo(Data::class);
    }

    public function image_contents()
    {
    	return $this->hasMany(DataImageContent::class);
    }
}
