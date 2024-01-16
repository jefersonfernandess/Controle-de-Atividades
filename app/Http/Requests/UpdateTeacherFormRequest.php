<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTeacherFormRequest extends FormRequest
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
            'name' => ['required', 'min:3', 'max:128'],
            'email' => ['required', 'email', 'unique:users,email,' . $this->userId]
        ];
    }

    
    public function messages()
    {
        return [
            'name.required' => 'O nome é obrigatório!',
            'name.min' => 'O nome precisa ter no mínimo 3 caracteres!',
            'name.max' => 'O nome só pode ter no máximo 128 caracteres!',
            'email.required' => 'O email é obrigatório!',
            'email.email' => 'O email precisa ser um email válido!',
            'email.unique' => 'Esse email já está sendo usado!',
        ];
    }
}
