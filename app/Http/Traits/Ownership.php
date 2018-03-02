<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Storage;

trait Ownership
{
	
	/**
	*	Groups Ownership
	*/

	public function is_joined($group)
    {       
        return ($this->groups()->where('group_id', $group->id)->count() > 0);
    }


    public function is_creator($group)
    {
        $group = $this->groups()->where('group_id', $group->id)->first();
        if($group)
            return ($group->pivot->role === self::GROUP_CREATOR);
        return false;
    }



    /**
	*	Groups Lounges Ownership
	*/

    public function is_lounge_owner($lounge)
    {
    	return ($this->lounges()->where('id', $lounge->id)->count() > 0);
    }

    public function is_lounge_comment_owner($comment)
    {
    	return ($this->lounge_comments()->where('id', $comment->id)->count() > 0);
    }

    public function is_lounge_like_owner($like)
    {
    	return ($this->lounge_likes()->where('id', $like->id)->count() > 0);
    }


    /**
	*	Groups Data Ownership
	*/

    public function is_data_owner($data)
    {
    	return ($this->data()->where('id', $data->id)->count() > 0);
    }

    public function is_data_comment_owner($comment)
    {
    	return ($this->data_comments()->where('id', $comment->id)->count() > 0);
    }

    public function is_data_like_owner($like)
    {
    	return ($this->data_likes()->where('id', $like->id)->count() > 0);
    }


    /**
	*	Groups Assignment Ownership
	*/

    public function is_assignment_owner($assignment)
    {
    	return ($this->assignments()->where('id', $assignment->id)->count() > 0);
    }

    public function is_assignment_comment_owner($comment)
    {
    	return ($this->assignment_comments()->where('id', $comment->id)->count() > 0);
    }

    public function is_assignment_like_owner($like)
    {
    	return ($this->assignment_likes()->where('id', $like->id)->count() > 0);
    }


    /**
	*	Groups Questions Ownership
	*/

    public function is_question_owner($question)
    {
    	return ($this->questions()->where('id', $question->id)->count() > 0);
    }

    public function is_question_comment_owner($comment)
    {
    	return ($this->question_comments()->where('id', $comment->id)->count() > 0);
    }

    public function is_question_like_owner($like)
    {
    	return ($this->question_likes()->where('id', $like->id)->count() > 0);
    }
}
