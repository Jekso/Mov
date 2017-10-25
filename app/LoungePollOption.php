<?php

namespace App;

use App\User;
use App\Lounge;
use Illuminate\Database\Eloquent\Model;

class LoungePollOption extends Model
{
    
    /**
    * --------- Realationship functions ---------
    */

    public function lounge()
    {
    	return $this->belongsTo(Lounge::class);
    }

    public function users()
    {
    	return $this->belongsToMany(User::class);
    }
}
