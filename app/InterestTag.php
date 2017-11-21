<?php

namespace App;

use App\User;
use App\Group;
use Illuminate\Database\Eloquent\Model;

class InterestTag extends Model
{

    protected $hidden = ['created_at', 'updated_at'];

    

	/**
    * --------- Realationship functions ---------
    */
    
    public function users()
    {
    	return $this->belongsToMany(User::class);
    }

    public function groups()
    {
    	return $this->belongsToMany(Group::class);
    }
}
