<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Override;

class LoginUserRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'email'],
            'password' => ['required', 'string', 'min:6'],
            'remember' => ['nullable'],
        ];
    }


    public function messages(): array
    {
        return [
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Email không hợp lệ',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.string' => 'Vui lòng nhập dạng chuỗi',
            'password.min' => 'Mật khẩu ít nhất 6 ký tự',
            'remember.nullable' => 'Không hợp lệ',
        ];
    }
}
