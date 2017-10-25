<?php

namespace App;

use App\DataImage;
use Illuminate\Database\Eloquent\Model;

class DataImageContent extends Model
{
    
    /**
    * --------- Realationship functions ---------
    */

    public function image()
    {
    	return $this->belongsTo(DataImage::class);
    }
}
