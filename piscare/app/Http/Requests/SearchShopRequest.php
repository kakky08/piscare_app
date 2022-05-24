<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchShopRequest extends FormRequest
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
            'keyword' => 'max:30',
            'area' => 'max:4',
        ];
    }

    public function attributes()
    {
        return [
            'keyword' => 'キーワード',
            'area' => 'エリア'
        ];
    }
}
