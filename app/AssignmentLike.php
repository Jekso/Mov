<?php

namespace App;

use App\User;
use App\Assignment;
use Illuminate\Database\Eloquent\Model;

class AssignmentLike extends Model
{
    
    /**
    * --------- Realationship functions ---------
    */

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function assignment()
    {
    	return $this->belongsTo(Assignment::class);
    }
}
