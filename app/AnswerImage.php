<?php

namespace App;

use App\Answer;
use Illuminate\Database\Eloquent\Model;

class AnswerImage extends Model
{
    /**
    * --------- Realationship functions ---------
    */

    public function answer()
    {
    	return $this->belongsTo(Answer::class);
    }
}
