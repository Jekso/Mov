<?php

namespace App;

use App\User;
use App\Group;
use App\Answer;
use App\QuestionLike;
use App\QuestionImage;
use App\QuestionComment;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{

    protected $touches = ['group'];


	// question_anonymous Const
	const ASK_ANONYMOUSLY = 1;	




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

    public function comments()
    {
    	return $this->hasMany(QuestionComment::class);
    }

    public function likes()
    {
        return $this->hasMany(QuestionLike::class);
    }

    public function images()
    {
    	return $this->hasMany(QuestionImage::class);
    }

    public function answers()
    {
    	return $this->hasMany(Answer::class);
    }
}
