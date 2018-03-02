<?php

namespace App\Http\Responses\Group\Lounge;

use App\User;
use App\Http\Responses\IResponsible;
use App\Http\Responses\Group\HelperGroupResponse;
use App\Http\Responses\Group\Lounge\HelperGroupLoungeResponse;

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
			'lounge' 		=> HelperGroupLoungeResponse::render_lounge($this->lounge), 
			'comments'		=> HelperGroupResponse::render_comments($this->lounge->comments),
			'likes'			=> HelperGroupResponse::render_likes($this->lounge->likes)
		];
	}

}
