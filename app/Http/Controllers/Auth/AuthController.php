<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Responses\Errors\Errors;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Responses\Auth\UserLoginResponse;
use App\Http\Responses\DefaultSuccessResponse;
use App\Http\Requests\Auth\ResetPasswordRequest;
use App\Http\Responses\Auth\UserRegisterResponse;


class AuthController extends Controller
{

    public function register(RegisterRequest $request)
    {
        // save basic user's data
    	$user = new User;
        $user->save_basic_data($request);
        $user->save();

        // save tags
        $user->interest_tags()->attach($request->tags);

        return $this->success_response(new UserRegisterResponse($user));
    }



    public function login(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();
        if($user)
        {
            if(Hash::check($request->password, $user->password))
            {
                $user->api_token = str_random(60);
                $user->save();
                return $this->success_response(new UserLoginResponse($user)); 
            }
            else
                $error = Errors::WRONG_PASSWORD;
        }
        else
            $error = Errors::NOT_FOUND_USER;

        return $this->error_response($error);
    }





    public function reset_password(ResetPasswordRequest $request)
    {
    	$user = User::where('email', $request->email)->first();
        $token = str_random(60);
        $user->reset_password_token = $token;
        $user->save();
        // send mail to user
        return $this->success_response(new DefaultSuccessResponse());
    }

    public function logout(Request $request)
    {
        $user = $request->user();
    	$user->api_token = str_random(60);
        $user->save();
        return $this->success_response(new DefaultSuccessResponse());
    }
}
