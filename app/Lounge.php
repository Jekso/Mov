<?php

namespace App;

use App\User;
use App\Group;
use App\LoungeImage;
use App\LoungePollOption;
use Illuminate\Database\Eloquent\Model;

class Lounge extends Model
{

	// lounge type Constants
    const LOUNGE_WITH_NULL = 0;
    const LOUNGE_WITH_IMG  = 1;
    const LOUNGE_WITH_POLL = 2;




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

    public function images()
    {
    	return $this->hasMany(LoungeImage::class);
    }

    public function poll_options()
    {
    	return $this->hasMany(LoungePollOption::class);
    }
}
