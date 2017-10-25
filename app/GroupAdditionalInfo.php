<?php

namespace App;

use App\Group;
use Illuminate\Database\Eloquent\Model;

class GroupAdditionalInfo extends Model
{
	
	/**
    * --------- Realationship functions ---------
    */

    public function group()
    {
    	return $this->belongsTo(Group::class);
    }
}
