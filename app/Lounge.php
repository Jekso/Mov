<?php

namespace App;

use App\User;
use App\Group;
use Carbon\Carbon;
use App\LoungeLike;
use App\LoungeImage;
use App\LoungeComment;
use App\LoungePollOption;
use App\Http\Traits\Helpers;
use Illuminate\Database\Eloquent\Model;

class Lounge extends Model
{
    use Helpers;

    protected $hidden = ['user_id', 'group_id'];
    protected $touches = ['group'];

	// lounge type Constants
    const NO_IMG_NO_POLL = 0;
    const LOUNGE_WITH_IMG  = 1;
    const LOUNGE_WITH_POLL = 2;

    public function getTypeAttribute($value)
    {
        if($value == self::NO_IMG_NO_POLL)
            $value = "NO_IMG_NO_POLL";
        else if($value == self::LOUNGE_WITH_IMG)
            $value = "LOUNGE_WITH_IMG";
        else if($value == self::LOUNGE_WITH_POLL)
            $value = "LOUNGE_WITH_POLL";
        return $value;
    }

    

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->diffForHumans();
    }


    /**
    * --------- Helpers functions ---------
    */

    public function save_basic_data($request)
    {
        $this->caption = $request->caption;
        $this->user_id = $request->user()->id;
        $this->type = $request->type;
    }


    public function save_lounge_images($images)
    {
        foreach ($images as $image)
        {
            $image_name = $this->generate_and_store_img($image, 'lounges_images');
            $this->images()->save(new LoungeImage(['img' => $image_name]));
        }
    }


    public function save_lounge_poll_options($options)
    {
        foreach ($options as $option)
            $this->poll_options()->save(new LoungePollOption(['option' => $option]));
    }



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

    public function comments()
    {
        return $this->hasMany(LoungeComment::class);
    }

    public function likes()
    {
        return $this->hasMany(LoungeLike::class);
    }
}
