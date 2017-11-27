<?php

namespace App\Http\Requests\Group;

use App\InterestTag;
use Illuminate\Foundation\Http\FormRequest;

class StoreGroupRequest extends FormRequest
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
        $interest_tags = InterestTag::all()->implode('id', ',');
        return [
            'group_code'            => 'required_if:is_private,1|unique:groups|min:10|max:190',
            'name'                  => 'required|min:2|max:190',
            'img'                   => 'encoded_str_imagable',
            'tags.*'                => 'in:'.$interest_tags,
            'is_private'            => 'required|boolean',
            'type'                  => 'required|in:General,Specific',
            'additional_info.grade' => 'integer',
            'additional_info.year'  => 'integer',
        ];
    }
}
