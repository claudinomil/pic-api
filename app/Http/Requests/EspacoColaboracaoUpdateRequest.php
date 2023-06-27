<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EspacoColaboracaoUpdateRequest extends FormRequest
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
            'aluno_id' => ['required', 'integer', 'numeric'],
            'professor_id' => ['required', 'integer', 'numeric'],
            'observacao_resumo' => ['required', 'min:3', 'max:100'],
            'observacao' => ['required', 'min:3', 'max:1000']
        ];
    }

    public function messages()
    {
        return [
            'aluno_id.required' => 'O Aluno é requerido.',
            'aluno_id.integer' => 'O Aluno deve ser um ítem da lista.',
            'professor_id.required' => 'O Professor é requerido.',
            'professor_id.integer' => 'O Professor deve ser um ítem da lista.',
            'observacao_resumo.required' => 'A Observação Resumo é requerido.',
            'observacao_resumo.min' => 'A Observação Resumo deve ter no mínimo 3 caracteres.',
            'observacao_resumo.max' => 'A Observação Resumo deve ter no máximo 100 caracteres.',
            'observacao.required' => 'A Observação é requerido.',
            'observacao.min' => 'A Observação deve ter no mínimo 3 caracteres.',
            'observacao.max' => 'A Observação deve ter no máximo 100 caracteres.',
        ];
    }
}
