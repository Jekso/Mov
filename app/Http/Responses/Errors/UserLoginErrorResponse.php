<?php

namespace App\Http\Responses\Errors;

use App\Http\Responses\IResponsible;

/**
* 
*/
class UserLoginErrorResponse implements IResponsible
{
	private $error ;
	const NOT_FOUND_USER  = 'There is no account associated with this email.';
	const WRONG_PASSWORD  = 'Invalid login, wrong email or password.';

	function __construct($error)
	{
		$this->error = $error;
	}

	public function jsonize()
	{
		return [
			'login' => [$this->error]
		];
	}
}
