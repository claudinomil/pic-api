<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TurmaUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
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
            'name' => ['required', 'min:3'],
            'escola_id' => ['required', 'integer', 'numeric'],
            'nivel_ensino_id' => ['nullable', 'integer', 'numeric'],
            'professor_id' => ['nullable', 'integer', 'numeric'],
            'quantidade_alunos' => ['required'],
            'sala' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O Nome é requerido.',
            'name.min' => 'O Nome deve ter pelo menos 3 caracteres.',
            'escola_id.required' => 'A Escola é requerido.',
            'escola_id.integer' => 'A Escola deve ser um ítem da lista.',
            'nivel_ensino_id.integer' => 'O Nível Ensino deve ser um ítem da lista.',
            'professor_id.integer' => 'O Professor deve ser um ítem da lista.',
            'quantidade_alunos.required' => 'A Quantidade Alunos é requerido.',
            'sala.required' => 'A Sala é requerido.',
        ];
    }
}
