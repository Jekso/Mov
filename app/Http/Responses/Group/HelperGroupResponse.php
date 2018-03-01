<?php

namespace App\Http\Responses\Group;


/**
* 
*/
class HelperGroupResponse
{
	public static function render_group($group)
	{
		return [
			    'group_code' 	=> $group->group_code,
			    'name' 			=> $group->name,
			    'img' 			=> $group->img,
			    'desc' 			=> $group->desc,
			    'is_private' 	=> $group->is_private,
			    'type' 			=> $group->type,
			    'additional_info' => 
			    [
			    	'grade'			=> $group->additional_info->grade,
			    	'year'			=> $group->additional_info->year,
			    	'faculty'		=> $group->additional_info->faculty->faculty,
			    	'university'	=> $group->additional_info->university->university,
			    ],
			    'created_at' 	=> self::render_date($group->created_at),
			    'updated_at' 	=> $group->updated_at
			];
	}


	public static function render_user($user)
	{
		return [
                	'username' 	=> $user->username,
                	'avatar'	=> $user->avatar
                ];
	}


	public static function render_date($date)
	{
		return $date->format('Y-m-d H:i:s');
	}
}
