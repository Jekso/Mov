<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
	/**
    * --------- Realationship functions ---------
    */

    public function user()
    {
    	return $this->hasMany(User::class);
    }
}
