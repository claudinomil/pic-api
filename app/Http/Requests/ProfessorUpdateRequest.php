<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfessorUpdateRequest extends FormRequest
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
            'estado_civil_id' => ['nullable', 'integer', 'numeric'],
            'escolaridade_id' => ['nullable', 'integer', 'numeric'],
            'nacionalidade_id' => ['nullable', 'integer', 'numeric'],
            'naturalidade_id' => ['nullable', 'integer', 'numeric'],
            'pai' => ['nullable', 'min:3'],
            'mae' => ['nullable', 'min:3'],
            'email' => [
                'nullable',
                Rule::unique('professores')->ignore($this->id),
                'email'
            ],
            'telefone_1' => ['nullable', 'numeric', 'digits:10'],
            'telefone_2' => ['nullable', 'numeric', 'digits:10'],
            'celular_1' => ['nullable', 'numeric', 'digits:11'],
            'celular_2' => ['nullable', 'numeric', 'digits:11'],
            'funcao_id' => ['nullable', 'integer', 'numeric'],
            'data_admissao' => ['required', 'date_format:d/m/Y'],
            'data_demissao' => ['nullable', 'date_format:d/m/Y'],
            'profissional_identidade_orgao_id' => ['nullable', 'integer', 'numeric'],
            'profissional_identidade_estado_id' => ['nullable', 'integer', 'numeric'],
            'profissional_identidade_numero' => ['nullable', 'numeric'],
            'profissional_identidade_data_emissao' => ['nullable', 'date_format:d/m/Y'],
            'cpf' => [
                'required',
                Rule::unique('professores')->ignore($this->id),
                'cpf'
            ],
            'pis' => [
                'nullable',
                Rule::unique('professores')->ignore($this->id),
                'nis'
            ],
            'pasep' => [
                'nullable',
                Rule::unique('professores')->ignore($this->id),
                'nis'
            ],
            'carteira_trabalho' => [
                'nullable',
                Rule::unique('professores')->ignore($this->id),
                'numeric'
            ]
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
            'estado_civil_id.integer' => 'O Estado Civil deve ser um ítem da lista.',
            'escolaridade_id.integer' => 'A Escolaridade deve ser um ítem da lista.',
            'nacionalidade_id.integer' => 'A Nacionalidade deve ser um ítem da lista.',
            'naturalidade_id.integer' => 'A Naturalidade deve ser um ítem da lista.',
            'pai.min' => 'O Pai deve ter pelo menos 3 caracteres.',
            'mae.min' => 'A Mãe deve ter pelo menos 3 caracteres.',
            'email.unique' => 'O E-mail já existe.',
            'email.email' => 'O E-mail deve ser um endereço válido.',
            'telefone_1.numeric' => 'O Telefone 1 deve ser um número válido.',
            'telefone_1.digits' => 'O Telefone 1 deve ser um número válido.',
            'telefone_2.numeric' => 'O Telefone 2 deve ser um número válido.',
            'telefone_2.digits' => 'O Telefone 2 deve ser um número válido.',
            'celular_1.numeric' => 'O Celular 1 deve ser um número válido.',
            'celular_1.digits' => 'O Celular 1 deve ser um número válido.',
            'celular_2.numeric' => 'O Celular 2 deve ser um número válido.',
            'celular_2.digits' => 'O Celular 2 deve ser um número válido.',
            'funcao_id.integer' => 'A Função deve ser um ítem da lista.',
            'data_admissao.required' => 'O Data Admissão é requerido.',
            'data_admissao.date_format' => 'O Data Admissão não é uma data válida.',
            'data_demissao.date_format' => 'O Data Demissão não é uma data válida.',
            'profissional_identidade_orgao_id.integer' => 'A Identidade Profissional (Òrgão) deve ser um ítem da lista.',
            'profissional_identidade_estado_id.integer' => 'A Identidade Profissional (Estado) deve ser um ítem da lista.',
            'profissional_identidade_numero.numeric' => 'A Identidade Profissional (Número) deve ser um número válido.',
            'profissional_identidade_data_emissao.date_format' => 'A Identidade Profissional (Emissão) não é uma data válida.',
            'cpf.required' => 'O CPF é requerido.',
            'cpf.unique' => 'O CPF já existe.',
            'cpf.cpf' => 'O CPF não é um número válido.',
            'pis.unique' => 'O PIS já existe.',
            'pis.nis' => 'O PIS não é um número válido.',
            'pasep.unique' => 'O PASEP já existe.',
            'pasep.nis' => 'O PASEP não é um número válido.',
            'carteira_trabalho.unique' => 'O Carteira de Trabalho já existe.',
            'carteira_trabalho.numeric' => 'A Carteira de Trabalho não é um número válido.'
        ];
    }
}
