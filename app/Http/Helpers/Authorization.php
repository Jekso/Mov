<?php

namespace App\Http\Helpers;

use Illuminate\Auth\Access\AuthorizationException;

Class Authorization
{
	
    public static function authorize_group_element($group, $element)
    {
    	if($group->id != $element->group_id)
    		throw new AuthorizationException();
    }


    public static function authorize_lounge_element($lounge, $element)
    {
    	if($lounge->id != $element->lounge_id)
    		throw new AuthorizationException();
    }

    public static function authorize_data_element($data, $element)
    {
    	if($data->id != $element->data_id)
    		throw new AuthorizationException();
    }

    public static function authorize_assignment_element($assignment, $element)
    {
    	if($assignment->id != $element->assignment_id)
    		throw new AuthorizationException();
    }

    public static function authorize_question_element($question, $element)
    {
    	if($question->id != $element->question_id)
    		throw new AuthorizationException();
    }
}
