<?php

namespace App;

use App\User;
use App\Lounge;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class LoungeComment extends Model
{
    protected $hidden = ['lounge_id', 'user_id'];

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->diffForHumans();
    }

    
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
