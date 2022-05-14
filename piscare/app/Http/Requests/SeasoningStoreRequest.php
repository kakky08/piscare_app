<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeasoningStoreRequest extends FormRequest
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
            'store_postId' => 'required',
            'store_seasoning' => 'required|string|max:30',
            'store_seasoning_quantity' => 'required|max:30',
        ];
    }

    public function attributes()
    {
        return [
            'store_seasoning' => '調味料の名前',
            'store_seasoning_quantity' => '調味料の分量'
        ];
    }
}
