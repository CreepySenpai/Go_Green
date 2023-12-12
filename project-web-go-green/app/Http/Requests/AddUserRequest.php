<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddUserRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'email',
            'password' => 'alphaNum|min:5',
            'role' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'email.email' => 'Email Hợp Lệ!',
            'name.required' => 'Chưa có tên!',
            'role.required' => 'Yêu cầu vai trò của người dùng!'
        ];
    }
}
