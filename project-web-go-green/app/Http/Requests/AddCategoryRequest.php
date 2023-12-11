<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // Check cate_name value receive in form is unique
        return [
            'cate_name' => 'unique:Categories,cate_name'
        ];
    }

    public function messages()
    {
        return [
            'cate_name.unique' => 'Tên Danh Mục Đã Bị Trùng!!!'
        ];
    }
}
