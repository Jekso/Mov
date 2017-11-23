<?php

namespace App\Http\Responses;

use App\User;
use App\Http\Responses\IResponsible;

/**
* 
*/
class DefaultSuccessResponse implements IResponsible
{

	function __construct()
	{

	}

	public function jsonize()
	{
		return [
			'success' => 1
		];
	}
}
