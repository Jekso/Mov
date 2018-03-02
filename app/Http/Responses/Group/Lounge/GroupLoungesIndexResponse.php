<?php

namespace App\Http\Responses\Group\Lounge;

use App\User;
use App\Http\Responses\IResponsible;
use App\Http\Responses\Group\HelperGroupResponse;
use App\Http\Responses\Group\Lounge\HelperGroupLoungeResponse;

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
			'group' 	=> HelperGroupResponse::render_group($this->group_with_lounges),
			'lounges' 	=> $this->render_lounges($this->group_with_lounges->lounges)
		];
	}


	private function render_lounges($lounges)
	{
		$all = [];
		foreach ($lounges as $lounge)
			$all[] = HelperGroupLoungeResponse::render_lounge($lounge);
		return $all;
	}


}
