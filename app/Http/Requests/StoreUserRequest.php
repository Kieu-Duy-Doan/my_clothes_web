<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'address' => 'nullable|string|max:255'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Vui lòng nhập tên',
            'email.required' => 'Vui lòng nhập email',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'address.nullable' => 'Địa chỉ không hợp lệ',
            'address.max' => 'Địa chỉ chỉ gồm 255 ký tự',
            'name.max' => 'Tên chỉ gồm 255 ký tự',
            'email.email' => 'Email không hợp lệ',
            'email.unique' => 'Email đã tồn tại',
            'password.string' => 'Vui lòng nhập mật khẩu chuỗi',
            'name.string' => 'Vui lòng nhập tên chuỗi',
        ];
    }
}
