<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'email' => ['required', 'email'],            // Email là bắt buộc và phải đúng định dạng

            'name'=>['required'],
            'tel'=>['required'],
            'address'=>['required']

        ];
    }
    public function messages(): array
    {
        return [
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email phải đúng định dạng',

            'name.required'=> 'Tên không được bỏ trống',
            'tel.required'=> 'Số điện thoại  không được bỏ trống',
            'address.required'=> 'Địa chỉ không được bỏ trống',
        ];
    }
}
