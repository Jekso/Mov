<?php

namespace App\Http\Requests\Group;

use App\InterestTag;
use Illuminate\Foundation\Http\FormRequest;

class UpdateGroupRequest extends FormRequest
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
            'name'                  => 'min:2|max:190',
            'img'                   => 'encoded_str_imagable',
            'tags.*'                => 'in:'.$interest_tags,
            'is_private'            => 'boolean',
            'type'                  => 'in:General,Specific',
            'additional_info.grade' => 'integer',
            'additional_info.year'  => 'integer',
        ];
    }
}
