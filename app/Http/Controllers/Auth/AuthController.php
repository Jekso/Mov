<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function register(Request $request)
    {
    	return 'register';
    }

    public function login(Request $request)
    {
    	return 'login';
    }

    public function reset_password(Request $request)
    {
    	return 'reset password';
    }

    public function logout(Request $request)
    {
    	return 'logout';
    }
}
