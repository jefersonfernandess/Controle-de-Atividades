<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActivityStoreFormRequest extends FormRequest
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
            'name' => ['required'],
            'editor' => ['required', 'max:5000'],
            'dicipline' => ['required']
        ];
    }

    public function messages() {
        return [
            'name.required' => 'O NOME é obrigatório!',
            'editor.required' => 'A DESCRIÇÃO é obrigatória!',
            'editor.max' => 'O MÁXIMO é de 5000 caracteres!',
            'dicipline' => 'Você precisa SELECIONAR uma diciplina '
        ];
    }
}
