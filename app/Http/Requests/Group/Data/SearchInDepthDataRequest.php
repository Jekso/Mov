<?php

namespace App\Http\Requests\Group\Data;

use Illuminate\Foundation\Http\FormRequest;

class SearchInDepthDataRequest extends FormRequest
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
            'query'         => 'required|max:190',
            'filters.type'  => 'required|in:DATA_WITH_IMG,DATA_WITH_VOICE'
        ];
    }
}
