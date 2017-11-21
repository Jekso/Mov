<?php

namespace App\Http\Responses\Group;

use App\User;
use App\Http\Responses\IResponsible;

/**
* 
*/
class UserDiscoverGroupsResponse implements IResponsible
{
	private $most_populer_groups, $may_like_groups;

	function __construct($most_populer_groups, $may_like_groups)
	{
		foreach ($may_like_groups as $group)
		{
			$group->type = ($group->type == 0) ? 'General' : 'Specific';
			$group->users_count = $group->users->count();
			unset($group->users);
		}
		
		foreach ($most_populer_groups as $group)
			$group->type = ($group->type == 0) ? 'General' : 'Specific';

		$this->most_populer_groups = $most_populer_groups;
		$this->may_like_groups = $may_like_groups;
	}

	public function jsonize()
	{
		return [
			'most_populer_groups' => $this->most_populer_groups,
			'may_like_groups' => $this->may_like_groups
		];
	}
}
