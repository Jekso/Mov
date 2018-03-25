<?php

namespace App;

use App\DataVoice;
use Illuminate\Database\Eloquent\Model;

class DataVoiceContent extends Model
{

    /**
    * --------- Realationship functions ---------
    */

    public function voice()
    {
    	return $this->belongsTo(DataVoice::class, 'data_voice_id');
    }
}
