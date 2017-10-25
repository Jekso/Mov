<?php

namespace App;

use App\Data;
use App\DataVoiceContent;
use Illuminate\Database\Eloquent\Model;

class DataVoice extends Model
{
    
    /**
    * --------- Realationship functions ---------
    */

    public function data()
    {
    	return $this->belongsTo(Data::class);
    }

    public function voice_contents()
    {
    	return $this->hasMany(DataVoiceContent::class);
    }
}
