<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
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
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'password' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '名前は必須です',
            'email.required' => 'メールアドレスは必須です',
            'password.required' => 'パスワードは必須です',
        ];
    }
}
