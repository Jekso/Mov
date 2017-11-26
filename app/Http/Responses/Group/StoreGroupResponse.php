<?php

namespace App\Http\Responses\Group;

use App\User;
use App\Http\Responses\IResponsible;

/**
* 
*/
class StoreGroupResponse implements IResponsible
{
	private $group;

	function __construct($group)
	{
		$this->group = $group;
	}

	public function jsonize()
	{
		return [
			'group' => $this->group
		];
	}
}
