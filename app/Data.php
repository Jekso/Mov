<?php

namespace App;

use App\User;
use App\Group;
use App\DataFile;
use App\DataLike;
use App\DataLink;
use App\DataImage;
use App\DataVoice;
use Carbon\Carbon;
use App\DataComment;
use App\Http\Traits\Helpers;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    use Helpers;

    protected $table = 'datas';
    protected $touches = ['group'];


	// Data type Constants
    const DATA_WITH_LINK = 0;
    const DATA_WITH_IMG  = 1;
    const DATA_WITH_VOICE = 2;
    const DATA_WITH_FILE = 3;


    public function getTypeAttribute($value)
    {
        if($value == self::DATA_WITH_LINK)
            $value = "DATA_WITH_LINK";
        else if($value == self::DATA_WITH_IMG)
            $value = "DATA_WITH_IMG";
        else if($value == self::DATA_WITH_VOICE)
            $value = "DATA_WITH_VOICE";
        else if($value == self::DATA_WITH_FILE)
            $value = "DATA_WITH_FILE";
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


    public function save_data_links($links)
    {
        foreach ($links as $link)
            $this->links()->save(new DataLink(['link' => $link]));
    }


    public function save_data_images($images)
    {
        foreach ($images as $image)
        {
            $image_name = $this->generate_and_store_img($image, 'data_images');
            $this->images()->save(new DataImage(['img' => $image_name]));
        }
    }


    public function save_data_voice_notes($voice_notes)
    {
        foreach ($voice_notes as $voice_note)
        {
            $voice_note_name = $this->generate_and_store_file($voice_note, 'data_audio');
            $this->voice_notes()->save(new DataVoice(['voice' => $voice_note_name]));
        }
    }


    public function save_data_files($files)
    {
        foreach ($files as $file)
        {
            $file_name = $this->generate_and_store_file($file, 'data_files');
            $this->files()->save(new DataFile(['file' => $file_name]));
        }
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

    public function files()
    {
        return $this->hasMany(DataFile::class);
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
