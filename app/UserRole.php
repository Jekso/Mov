<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{

	protected $hidden = ['created_at', 'updated_at'];

	/**
    * --------- Realationship functions ---------
    */

    public function user()
    {
    	return $this->hasMany(User::class);
    }
}
