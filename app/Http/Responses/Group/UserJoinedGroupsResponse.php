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
		$this->groups = $groups;
	}

	public function jsonize()
	{
		return [
			'groups' => $this->groups
		];
	}
}
