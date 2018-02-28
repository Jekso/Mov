<?php

namespace App\Http\Responses\Group\Lounge;

use App\User;
use App\Http\Responses\IResponsible;

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
			'group' => 
			[
			    "group_code" 	=> $this->group_with_lounges->group_code,
			    "name" 			=> $this->group_with_lounges->name,
			    "img" 			=> $this->group_with_lounges->img,
			    "desc" 			=> $this->group_with_lounges->desc,
			    "is_private" 	=> $this->group_with_lounges->is_private,
			    "type" 			=> $this->group_with_lounges->type,
			    "created_at" 	=> $this->group_with_lounges->created_at->format('Y-m-d H:i:s'),
			    "updated_at" 	=> $this->group_with_lounges->updated_at
			],
			'lounges' => $this->group_with_lounges['lounges']
		];
	}
}
