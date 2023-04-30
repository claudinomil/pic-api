<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'name' => ['required'],
            'email' => ['nullable', 'unique:users', 'email'],
            'layout_mode' => ['required'],
            'layout_style' => ['required'],
            'grupo_id' => ['required'],
            'situacao_id' => ['required'],
            'sistema_acesso_id' => ['required']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O Nome é requerido.',
            'email.unique' => 'O E-mail já existe.',
            'email.email' => 'O E-mail deve ser um endereço válido.',
            'layout_mode.required' => 'O Modo é requerido.',
            'layout_style.required' => 'O Estilo é requerido.',
            'grupo_id.required' => 'O Grupo é requerido.',
            'situacao_id.required' => 'A Situação  é requerido.',
            'sistema_acesso_id.required' => 'O Sistema Acesso  é requerido.'
        ];
    }
}
