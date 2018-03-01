<?php

namespace App\Http\Responses\Group\Lounge;

use App\User;
use App\Http\Responses\IResponsible;
use App\Http\Responses\Group\HelperGroupResponse;

/**
* 
*/
class GroupLoungesIndexResponse implements IResponsible
{
	private $group_with_lounges;

	function __construct($group_with_lounges)
	{
		$this->group_with_lounges = $group_with_lounges;
	}

	public function jsonize()
	{
		return [
			'group' => HelperGroupResponse::render_group($this->group_with_lounges),
			'lounges' => $this->render_lounges($this->group_with_lounges->lounges)
		];
	}


	private function render_lounges($lounges)
	{
		$all = [];
		foreach ($lounges as $lounge)
		{
			$all[] = [
				'id' 			=> $lounge->id,
                'caption' 		=> $lounge->caption,
                'type' 			=> $lounge->type,
                'created_at' 	=> HelperGroupResponse::render_date($lounge->created_at),
                'updated_at' 	=> $lounge->updated_at,
                'user'			=> HelperGroupResponse::render_user($lounge->user),
                'images' 		=> $lounge->images->pluck('img'),
                'poll_options'	=> $this->render_poll_option($lounge->poll_options)
			];
		}
		return $all;
	}


	private function render_poll_option($polls)
	{
		$all = [];
		foreach ($polls as $poll)
		{
			$all[] = [
				'id'			=> $poll->id,
				'option' 		=> $poll->option,
				'users_count'	=> $poll->users->count(),
				'users'			=> $this->render_poll_users($poll->users)
			];
		}
		return $all;
	}


	private function render_poll_users($users)
	{
		$all = [];
		foreach ($users as $user)
			$all[] = HelperGroupResponse::render_user($user);
		return $all;
	}
}
