<?php

namespace App\Http\Responses\Auth;

use App\Http\Responses\IResponsible;
use Illuminate\Database\Eloquent\Collection;

/**
* 
*/
class UserRolesResponse implements IResponsible
{
	private $roles ;

	function __construct(Collection $roles)
	{
		$this->roles = $roles;
	}

	public function jsonize()
	{
		return ['roles' => $this->roles->pluck('role', 'id')];
	}
}
