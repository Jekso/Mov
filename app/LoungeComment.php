<?php

namespace App;

use App\User;
use App\Lounge;
use Illuminate\Database\Eloquent\Model;

class LoungeComment extends Model
{
    
    /**
    * --------- Realationship functions ---------
    */

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function lounge()
    {
    	return $this->belongsTo(Lounge::class);
    }
}
