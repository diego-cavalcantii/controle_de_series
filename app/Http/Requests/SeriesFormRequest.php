<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeriesFormRequest extends FormRequest
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
                'nome' => 'required|string|min:2|max:30',
                'genero' => 'required|string|max:255',
                'poster' => 'required|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O campo nome é obrigatório',
            'nome.min' => 'O campo nome deve ter no mínimo :min caracteres',
            'nome.max' => 'O campo nome deve ter no máximo :max caracteres',
            'genero.required' => 'O campo gênero é obrigatório',
            'poster.required' => 'O campo poster é obrigatório',
        ];
    }
}
