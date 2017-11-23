<?php

namespace App;

use App\User;
use App\Group;
use App\AssignmentLike;
use App\AssignmentComment;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    protected $touches = ['group'];

    
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

    public function comments()
    {
        return $this->hasMany(AssignmentComment::class);
    }

    public function likes()
    {
        return $this->hasMany(AssignmentLike::class);
    }
}
