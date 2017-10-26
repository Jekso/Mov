<?php

namespace App;

use App\Data;
use App\User;
use Illuminate\Database\Eloquent\Model;

class DataComment extends Model
{
    
    /**
    * --------- Realationship functions ---------
    */

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function data()
    {
    	return $this->belongsTo(Data::class);
    }
}
