<?php

namespace App;

use App\Data;
use App\Group;
use App\Lounge;
use App\Question;
use App\UserRole;
use App\Assignment;
use App\InterestTag;
use App\Http\Traits\Helpers;
use App\Http\Traits\Ownership;
use Illuminate\Support\Facades\Storage;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use Helpers;
    use Ownership;

    // Default Model Params
    protected $fillable = ['username', 'email', 'password', 'birth_date', 'gender', 'bio'];
    protected $hidden   = ['password', 'remember_token', 'user_role_id', 'reset_password_token'];


    // user roles in group Constants
    const GROUP_USER    = 0;
    const GROUP_EDITOR  = 1;
    const GROUP_CREATOR = 2;


    // if user is banned Constant
    const USER_BANNED = 1;


    // default avatar
    const DEFAULT_IMG = 'default.png';

    public function getAvatarAttribute($value)
    {
        return asset('files/users/images/'.$value);
    }

    public function getGenderAttribute($value)
    {
        return ($value == 'm') ? 'Male' : 'Female';
    }


    /**
    * --------- Helper functions ---------
    */


    public function save_basic_data($request)
    {
        $this->username             = $request->username;
        $this->password             = bcrypt($request->password);
        $this->email                = $request->email;
        $this->avatar = ($request->has('avatar')) ? $this->generate_and_store_img($request->avatar, 'users_images') : self::DEFAULT_IMG;
        $this->birth_date           = $request->birth_date;
        $this->gender               = $request->gender;
        $this->bio                  = $request->bio;
        $this->api_token            = str_random(60);
        $this->reset_password_token = str_random(60);
        $this->user_role_id         = $request->role;
    }




    /**
    * --------- Realationship functions ---------
    */

    public function role()
    {
        return $this->belongsTo(UserRole::class, 'user_role_id');
    }

    public function groups()
    {
        return $this->belongsToMany(Group::class)->withPivot('role', 'is_banned');
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
