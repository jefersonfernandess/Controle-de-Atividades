<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginFormRequest extends FormRequest
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
            'email' => ['required', 'email', 'max:128'],
            'password' => ['required', 'min:3']
        ];
    }

    public function messages() {
        return [
            'email.required' => 'O email é obrigatório!',
            'email.email' => 'O email precisa ser um email válido!',
            'email.max' => 'O email só pode ter até 128 caracteres!',
            'password.required' => 'A senha é obrigatório!',
            'password.min' => 'A senha precisa ter no mínimo 3 caracteres',
        ];
    }
}
