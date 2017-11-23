<?php

namespace App\Http\Responses\Group;

use App\User;
use App\Http\Responses\IResponsible;

/**
* 
*/
class UserJoinedGroupsResponse implements IResponsible
{
	private $groups;

	function __construct($groups)
	{
		foreach ($groups as $group)
		{
			$group->type = ($group->type == 0) ? 'General' : 'Specific';
			$group->last_active = $group->updated_at->diffForHumans();
		}
		$this->groups = $groups;
	}

	public function jsonize()
	{
		return [
			'groups' => $this->groups
		];
	}
}
