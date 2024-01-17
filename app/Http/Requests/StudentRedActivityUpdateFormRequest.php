<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRedActivityUpdateFormRequest extends FormRequest
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
            'editor' => ['required', 'max:5000']
        ];
    }

    public function messages() {
        return [
            'editor.required' => 'Você precisa responder a atividade!',
            'editor.max' => 'O máximo é de 5000 caracteres'
        ];
    }
}
