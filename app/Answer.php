<?php

namespace App;

use App\User;
use App\Question;
use App\AnswerImage;
use App\AnswerComment;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{

    protected $touches = ['question'];


	// is_true Constant
	const ANSWER_IS_TRUE = 1;




    /**
    * --------- Realationship functions ---------
    */

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function question()
    {
    	return $this->belongsTo(Question::class);
    }

    public function comments()
    {
    	return $this->hasMany(AnswerComment::class);
    }

    public function images()
    {
    	return $this->hasMany(AnswerImage::class);
    }
}
