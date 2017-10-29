<?php

namespace App\Http\Controllers\Auth;

use App\UserRole;
use App\InterestTag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\LogOutRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Responses\Auth\UserRolesResponse;
use App\Http\Requests\Auth\ResetPasswordRequest;

class AuthController extends Controller
{

    public function get_roles()
    {
        $roles = UserRole::all();
        return $this->success_response(new UserRolesResponse($roles));
    }



    public function register(RegisterRequest $request)
    {
    	return 'register';
    }

    public function login(LoginRequest $request)
    {
    	return 'login';
    }

    public function reset_password(ResetPasswordRequest $request)
    {
    	return 'reset password';
    }

    public function logout(LogOutRequest $request)
    {
    	return 'logout';
    }
}
