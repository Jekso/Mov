<?php

namespace App;

use App\Lounge;
use Illuminate\Database\Eloquent\Model;

class LoungeImage extends Model
{
    
    /**
    * --------- Realationship functions ---------
    */

    public function lounge()
    {
    	return $this->belongsTo(Lounge::class);
    }
}
