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
            'editor' => ['required']
        ];
    }

    public function messages() {
        return [
            'name.required' => 'O <b style="color:red;">NOME</b> é obrigatório!',
            'editor.required' => 'A <b style="color:red;">DESCRIÇÃO</b> é obrigatória!'
        ];
    }
}
