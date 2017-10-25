<?php

namespace App;

use App\User;
use App\Group;
use App\DataLink;
use App\DataImage;
use App\DataVoice;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{

	// Data type Constants
    const DATA_WITH_LINK = 0;
    const DATA_WITH_IMG  = 1;
    const DATA_WITH_VOICE = 2;


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

    public function links()
    {
    	return $this->hasMany(DataLink::class);
    }

    public function images()
    {
    	return $this->hasMany(DataImage::class);
    }

    public function voice_notes()
    {
    	return $this->hasMany(DataVoice::class);
    }
}
