<?php

namespace App;

use App\User;
use App\Group;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    
    /**
    * --------- Realationship functions ---------
    */

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function group()
    {
    	return $this->belongsTo(Group::class);
    }
}
