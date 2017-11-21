<?php

namespace App;

use App\Data;
use App\Group;
use App\Question;
use App\UserRole;
use App\InterestTag;
use Illuminate\Support\Facades\Storage;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;


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



    /**
    * --------- Helper functions ---------
    */

    public function generate_avatar($encoded_img_str)
    {
        $extension = explode(';', explode('/', $encoded_img_str)[1])[0];
        $image_name = str_random(40).'.'.$extension;
        $image = base64_decode(substr($encoded_img_str, strpos($encoded_img_str, ",")+1));
        Storage::disk('images')->put($image_name, $image);
        return $image_name;
    }

    public function save_basic_data($request)
    {
        $this->username             = $request->username;
        $this->password             = bcrypt($request->password);
        $this->email                = $request->email;
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
