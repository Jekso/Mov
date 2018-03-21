<?php

namespace App;

use App\User;
use App\Group;
use App\DataLike;
use App\DataLink;
use App\DataImage;
use App\DataVoice;
use Carbon\Carbon;
use App\DataComment;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{

    protected $table = 'datas';
    protected $touches = ['group'];


	// Data type Constants
    const DATA_WITH_LINK = 0;
    const DATA_WITH_IMG  = 1;
    const DATA_WITH_VOICE = 2;


    public function getTypeAttribute($value)
    {
        if($value == self::DATA_WITH_LINK)
            $value = "DATA_WITH_LINK";
        else if($value == self::DATA_WITH_IMG)
            $value = "DATA_WITH_IMG";
        else if($value == self::DATA_WITH_VOICE)
            $value = "DATA_WITH_VOICE";
        return $value;
    }

    

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

    public function comments()
    {
        return $this->hasMany(DataComment::class);
    }

    public function likes()
    {
        return $this->hasMany(DataLike::class);
    }
}
