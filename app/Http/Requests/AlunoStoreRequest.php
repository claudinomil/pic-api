<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlunoStoreRequest extends FormRequest
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
            'data_nascimento' => ['required', 'date_format:d/m/Y'],
            'genero_id' => ['required', 'integer', 'numeric'],
            'turma_id' => ['required', 'integer', 'numeric'],
            'raca_id' => ['required', 'integer', 'numeric'],
            'nacionalidade_id' => ['nullable', 'integer', 'numeric'],
            'naturalidade_id' => ['nullable', 'integer', 'numeric'],
            'pai' => ['nullable', 'min:3'],
            'mae' => ['nullable', 'min:3'],
            'telefone_pai' => ['nullable', 'numeric', 'digits:10'],
            'telefone_mae' => ['nullable', 'numeric', 'digits:10'],
            'cpf' => ['required', 'unique:alunos', 'cpf'],
            'cep' => ['nullable', 'digits:8'],
            'numero' => ['nullable', 'numeric'],
            'complemento' => ['nullable', 'min:1']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O Nome é requerido.',
            'name.min' => 'O Nome deve ter pelo menos 3 caracteres.',
            'data_nascimento.required' => 'O Nascimento é requerido.',
            'data_nascimento.date_format' => 'O Nascimento não é uma data válida.',
            'genero_id.required' => 'O Gênero é requerido.',
            'genero_id.integer' => 'O Gênero deve ser um ítem da lista.',
            'turma_id.required' => 'A Turma é requerido.',
            'turma_id.integer' => 'A Turma deve ser um ítem da lista.',
            'raca_id.required' => 'A Raça é requerido.',
            'raca_id.integer' => 'A Raça deve ser um ítem da lista.',
            'nacionalidade_id.integer' => 'A Nacionalidade deve ser um ítem da lista.',
            'naturalidade_id.integer' => 'A Naturalidade deve ser um ítem da lista.',
            'pai.min' => 'O Pai deve ter pelo menos 3 caracteres.',
            'mae.min' => 'A Mãe deve ter pelo menos 3 caracteres.',
            'telefone_pai.numeric' => 'O Telefone 1 deve ser um número válido.',
            'telefone_pai.digits' => 'O Telefone 1 deve ser um número válido.',
            'telefone_mae.numeric' => 'O Telefone 2 deve ser um número válido.',
            'telefone_mae.digits' => 'O Telefone 2 deve ser um número válido.',
            'cpf.required' => 'O CPF é requerido.',
            'cpf.unique' => 'O CPF já existe.',
            'cpf.cpf' => 'O CPF não é um número válido.',
            'cep.digits' => 'O CEP deve ter 8 dígitos.',
            'numero.numeric' => 'O Número deve ser um número.',
            'complemento.min' => 'O Complemento deve ter pelo menos 1 caractere.'
        ];
    }
}
