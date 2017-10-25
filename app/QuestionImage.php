<?php

namespace App;

use App\Question;
use Illuminate\Database\Eloquent\Model;

class QuestionImage extends Model
{
    
    /**
    * --------- Realationship functions ---------
    */

    public function question()
    {
    	return $this->belongsTo(Question::class);
    }
}
