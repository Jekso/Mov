<?php

namespace App;

use App\User;
use App\Answer;
use Illuminate\Database\Eloquent\Model;

class AnswerComment extends Model
{

    /**
    * --------- Realationship functions ---------
    */

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function answer()
    {
    	return $this->belongsTo(Answer::class);
    }
}
