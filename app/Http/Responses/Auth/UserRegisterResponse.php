<?php

namespace App\Http\Responses\Auth;

use App\User;
use App\Http\Responses\IResponsible;

/**
* 
*/
class UserRegisterResponse implements IResponsible
{
	private $user ;

	function __construct(User $user)
	{
		$this->user = $user->load('role', 'interest_tags');
	}

	public function jsonize()
	{
		return [
			'user' => [
			    'username' 	 => $this->user->username,
			    'email' 	 => $this->user->email,
			    'api_token'  => $this->user->api_token,
			    'birth_date' => $this->user->birth_date,
			    'gender' 	 => ($this->user->gender == 'm') ? 'Male' : 'Female',
			    'avatar' 	 => asset('files/users/images/'.$this->user->avatar),
			    'bio' 		 => $this->user->bio,
			    'role'		 => $this->user->role->role,
			    'tags'		 => $this->user->interest_tags->pluck('tag')
			]
		];
	}
}
