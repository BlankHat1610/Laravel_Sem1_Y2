<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestCategory extends FormRequest
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
            'c_name' => 'required|unique:categories,c_name,' . $this->id,
            'c_icon'   => 'required',

        ];
    }

    public function messages()
    {
        return [
            'c_name.required' => 'Trường này không được để trống',
            'c_name.unique'   => 'Tên danh mục đã tồn tại',
            'c_icon.required' => 'Trường này không được để trống',
        ];
    }
}
