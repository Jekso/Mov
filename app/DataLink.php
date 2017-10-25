<?php

namespace App;

use App\Data;
use Illuminate\Database\Eloquent\Model;

class DataLink extends Model
{
    
    /**
    * --------- Realationship functions ---------
    */

    public function data()
    {
    	return $this->belongsTo(Data::class);
    }
}
