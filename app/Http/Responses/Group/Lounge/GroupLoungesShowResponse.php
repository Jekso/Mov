<?php

namespace App\Http\Responses\Group\Lounge;

use App\User;
use App\Http\Responses\IResponsible;
use App\Http\Responses\Group\HelperGroupResponse;

/**
* 
*/
class GroupLoungesShowResponse implements IResponsible
{
	private $lounge;

	function __construct($lounge)
	{
		$this->lounge = $lounge;
	}

	public function jsonize()
	{
		return [
			'lounge' => [
				'id' 			=> $this->lounge->id,
	            'caption' 		=> $this->lounge->caption,
	            'type' 			=> $this->lounge->type,
	            'created_at' 	=> HelperGroupResponse::render_date($this->lounge->created_at),
	            'updated_at' 	=> $this->lounge->updated_at,
			]
		];
	}

}
