<?php

namespace App\Http\Requests\Group\Lounge;

use Illuminate\Foundation\Http\FormRequest;

class StoreLoungeRequest extends FormRequest
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
        return [
            'caption'           => 'required|min:2|max:190',
            'type'              => 'required|in:NO_IMG_NO_POLL,LOUNGE_WITH_IMG,LOUNGE_WITH_POLL',
            'images.*'          => 'encoded_str_imagable',
            'poll_options.*'    => 'min:2|max:190',
        ];
    }
}
