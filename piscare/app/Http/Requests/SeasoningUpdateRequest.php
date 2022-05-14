<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeasoningUpdateRequest extends FormRequest
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
            'edit_postId' => 'required',
            'seasonings.*.seasoningName' => 'required|required_with:seasonings.*.quantity|max:30',
            'seasonings.*.quantity' => 'required|required_with:seasonings.*.seasoningName|max:30',
        ];
    }

    public function attributes()
    {
        return [
            'seasonings.*.seasoningName' => '調味料の名前',
            'seasonings.*.quantity' => '調味料の分量'
        ];
    }
}
