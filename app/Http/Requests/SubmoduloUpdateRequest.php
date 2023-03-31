<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SubmoduloUpdateRequest extends FormRequest
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
            'name' => [
                'required',
                'min:3',
                Rule::unique('submodulos')->ignore($this->id),
            ],
            'menu_text' => [
                'required',
                'min:3',
                Rule::unique('submodulos')->ignore($this->id),
            ],
            'menu_url' => [
                'required',
                'min:3',
                Rule::unique('submodulos')->ignore($this->id),
            ],
            'menu_route' => [
                'required',
                'min:3',
                Rule::unique('submodulos')->ignore($this->id),
            ],
            'menu_icon' => [
                'required',
                'min:3',
                Rule::unique('submodulos')->ignore($this->id),
            ],
            'prefix_permissao' => [
                'required',
                'min:3',
                Rule::unique('submodulos')->ignore($this->id),
            ],
            'prefix_route' => [
                'required',
                'min:3',
                Rule::unique('submodulos')->ignore($this->id),
            ],
            'viewing_order' => [
                'required',
            ]
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O Nome é requerido.',
            'name.min' => 'O Nome deve ter pelo menos 3 caracteres.',
            'name.unique' => 'O Nome já existe.',
            'menu_text.required' => 'O Menu Texto é requerido.',
            'menu_text.min' => 'O Menu Texto deve ter pelo menos 3 caracteres.',
            'menu_text.unique' => 'O Menu Texto já existe.',
            'menu_url.required' => 'O Menu URL é requerido.',
            'menu_url.min' => 'O Menu URL deve ter pelo menos 3 caracteres.',
            'menu_url.unique' => 'O Menu URL já existe.',
            'menu_route.required' => 'O Menu Rota é requerido.',
            'menu_route.min' => 'O Menu Rota deve ter pelo menos 3 caracteres.',
            'menu_route.unique' => 'O Menu Rota já existe.',
            'menu_icon.required' => 'O Menu Ícone é requerido.',
            'menu_icon.min' => 'O Menu Ícone deve ter pelo menos 3 caracteres.',
            'menu_icon.unique' => 'O Menu Ícone já existe.',
            'prefix_permissao.required' => 'O Prefixo Permissão é requerido.',
            'prefix_permissao.min' => 'O Prefixo Permissão deve ter pelo menos 3 caracteres.',
            'prefix_permissao.unique' => 'O Prefixo Permissão já existe.',
            'prefix_route.required' => 'O Prefixo Rota é requerido.',
            'prefix_route.min' => 'O Prefixo Rota deve ter pelo menos 3 caracteres.',
            'prefix_route.unique' => 'O Prefixo Rota já existe.',
            'viewing_order.required' => 'O campo Menu Ordem Visualização é obrigatório'
        ];
    }
}
