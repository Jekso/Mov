<?php

namespace App;


use App\Data;
use App\User;
use App\Lounge;
use App\Question;
use App\Assignment;
use App\InterestTag;
use App\GroupAdditionalInfo;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{

    protected $hidden = ['id', 'updated_at', 'pivot'];

    // group type Constants
	const GENERAL_GROUP  = 0;
	const SPECIFIC_GROUP = 1;


    // group is_private Constants
    const PUBLIC_GROUP  = 0;
    const PRIVATE_GROUP = 1;




    /**
    * --------- Realationship functions ---------
    */

    public function additional_info()
    {
    	return $this->hasOne(GroupAdditionalInfo::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }


    public function interest_tags()
    {
    	return $this->belongsToMany(InterestTag::class);
    }

    public function lounges()
    {
    	return $this->hasMany(Lounge::class);
    }

    public function data()
    {
    	return $this->hasMany(Data::class);
    }

    public function questions()
    {
    	return $this->hasMany(Question::class);
    }

    public function assignments()
    {
    	return $this->hasMany(Assignment::class);
    }
}
