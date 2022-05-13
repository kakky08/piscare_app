<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MaterialUpdateRequest extends FormRequest
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
            'materials' => 'required|array',
            'materials.*.materialName' => 'required|required_with:materials.*.quantity|max:30',
            'materials.*.quantity' => 'required|required_with:materials.*.materialName|max:30',
        ];
    }

    public function attributes()
    {
        return [
            'materials' => '材料・調味料や分量',
            'materials.*.materialName' => '材料・調味料',
            'materials.*.quantity' => '分量'
        ];
    }
}
