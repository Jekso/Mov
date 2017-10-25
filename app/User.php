<?php

namespace App;

use App\Data;
use App\Group;
use App\Question;
use App\UserRole;
use App\InterestTag;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;


    // Default Model Params
    protected $fillable = ['name', 'email', 'password',];
    protected $hidden   = ['password', 'remember_token',];


    // user roles in group Constants
    const GROUP_USER    = 0;
    const GROUP_EDITOR  = 1;
    const GROUP_CREATOR = 2;


    // if user is banned Constant
    const USER_BANNED = 1;




    /**
    * --------- Realationship functions ---------
    */

    public function role()
    {
        return $this->belongsTo(UserRole::class);
    }

    public function groups()
    {
        return $this->belongsToMany(Group::class);
    }

    public function interest_tags()
    {
        return $this->belongsToMany(InterestTag::class);
    }

    public function marked_data()
    {
        return $this->belongsToMany(Data::class);
    }

    public function marked_questions()
    {
        return $this->belongsToMany(Question::class);
    }
}
