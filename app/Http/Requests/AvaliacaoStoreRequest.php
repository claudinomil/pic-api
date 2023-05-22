<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AvaliacaoStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'resposta_pergunta_3' => ['required']
        ];
    }

    public function messages()
    {
        return [
            'resposta_pergunta_3.required' => 'A Resposta da Pergunta 3 é requerido.'
        ];
    }
}
