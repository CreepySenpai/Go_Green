<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditCategoryRequest extends FormRequest
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
        return [
            'cate_name' => 'unique:Categories,cate_name,' . $this->segment(4) . ',cate_id'
             // vị trí thứ tự của đường dẫn được phân cách bởi / -> dùng để loại trừ giá trị cột cate_id
        ];
    }

    public function messages()
    {
        return [
            'cate_name.unique' => 'Tên Danh Mục Đã Bị Trùng!!!'
        ];
    }
}
