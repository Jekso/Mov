<?php

namespace App\Http\Responses\Group\Lounge;

use App\Http\Responses\Group\HelperGroupResponse;


/**
* 
*/
class HelperGroupLoungeResponse
{


	public static function render_lounge($lounge)
	{
		return [
			'id' 			=> $lounge->id,
            'caption' 		=> $lounge->caption,
            'type' 			=> $lounge->type,
            'created_at' 	=> HelperGroupResponse::render_date($lounge->created_at),
            'updated_at' 	=> $lounge->updated_at,
            'user'			=> HelperGroupResponse::render_user($lounge->user),
            'images' 		=> $lounge->images->pluck('img'),
            'poll_options'	=> self::render_poll_option($lounge->poll_options)
		];
	}


	public static function render_poll_option($polls)
	{
		$all = [];
		foreach ($polls as $poll)
		{
			$all[] = [
				'id'			=> $poll->id,
				'option' 		=> $poll->option,
				'users_count'	=> $poll->users->count(),
				'users'			=> self::render_poll_users($poll->users)
			];
		}
		return $all;
	}


	private static function render_poll_users($users)
	{
		$all = [];
		foreach ($users as $user)
			$all[] = HelperGroupResponse::render_user($user);
		return $all;
	}
}
