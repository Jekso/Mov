<?php

namespace App\Http\Requests\Group\Data;

use Illuminate\Foundation\Http\FormRequest;

class StoreDataRequest extends FormRequest
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
            'type'              => 'required|in:DATA_WITH_LINK,DATA_WITH_IMG,DATA_WITH_VOICE,DATA_WITH_FILE',
            'images.*'          => 'required_if:type,DATA_WITH_IMG|encoded_str_imagable',
            'voice_notes.*'     => 'required_if:type,DATA_WITH_VOICE|encoded_str_voicable',
            'data_files.*'      => 'required_if:type,DATA_WITH_FILE|encoded_str_filable',
            'links.*'           => 'required_if:type,DATA_WITH_LINK|url|min:2|max:190',
        ];
    }
}
