<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterStudentFormRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {
        return [
            'name' => 'required', 'min:3', 'max:128',
            'email' => 'required', 'email', 'unique:users,' . $this->id ,
            'password' => 'required', 'min:3'
        ];
    }       

    public function messages() {
        return [
            'name.required' => 'O nome é obrigatório!',
            'name.min' => 'O nome precisa ter no mínimo 3 caracteres!',
            'name.max' => 'O nome só pode ter no máximo 128 caracteres!',
            'email.required' => 'O email é obrigatório!',
            'email.email' => 'O email precisa ser um email válido!',
            'email.unique' => 'Esse email já está sendo usado!',
            'password.required' => 'A senha é obrigatório!',
            'password.min' => 'A senha precisa ter no mínimo 3 caracteres',
        ];
    }
}
