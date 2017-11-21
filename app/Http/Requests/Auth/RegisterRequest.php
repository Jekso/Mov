<?php

namespace App\Http\Requests\Auth;

use App\UserRole;
use App\InterestTag;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $user_roles = UserRole::all()->implode('id', ',');
        $interest_tags = InterestTag::all()->implode('id', ',');
        return [
            'username'   => 'required|max:190',
            'email'      => 'required|email|unique:users|max:190',
            'password'   => 'required|confirmed|max:190|min:8|alpha_num',
            'birth_date' => 'date',
            'gender'     => 'in:m,f',
            'avatar'     => 'encoded_str_imagable',
            'role'       => 'required|in:'.$user_roles,
            'tags.*'     => 'in:'.$interest_tags
        ];
    }
}
