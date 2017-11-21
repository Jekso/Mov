<?php

namespace App\Http\Controllers;

use App\UserRole;
use Illuminate\Http\Request;
use App\Http\Responses\User\UserRolesResponse;

class UserController extends Controller
{
    
    public function get_roles()
    {
        $roles = UserRole::all();
        return $this->success_response(new UserRolesResponse($roles));
    }
}
