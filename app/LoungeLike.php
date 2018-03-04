<?php

namespace App;

use App\User;
use App\Lounge;
use Illuminate\Database\Eloquent\Model;

class LoungeLike extends Model
{
    protected $fillable = ['user_id'];
    protected $hidden = ['lounge_id', 'user_id'];
    
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
