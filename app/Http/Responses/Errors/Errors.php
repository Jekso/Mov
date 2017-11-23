<?php

namespace App\Http\Responses\Errors;

class Errors
{
	// user_errors
	const NOT_FOUND_USER  = 'There is no account associated with this email.';
	const WRONG_PASSWORD  = 'Invalid login, wrong email or password.';

	// groups_errors
	const USER_ALREADY_JOINED = 'you already joined this group.';

	// general erros
	const TESTING  = 'Stop Testing dude, 34an ana m4 tal3 deen omy coding we tegy t3mly feha Kevin metnek ya mtnaaaaak.';
	const UNAUTHENTICATED  = 'Unauthenticated.';
}