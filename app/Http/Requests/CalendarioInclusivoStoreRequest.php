<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CalendarioInclusivoStoreRequest extends FormRequest
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
            'data_evento' => ['required', 'date_format:d/m/Y'],
            'evento' => ['required', 'min:3']
        ];
    }

    public function messages()
    {
        return [
            'data_evento.required' => 'A Data Evento é requerido.',
            'data_evento.date_format' => 'A Data Evento não é uma data válida.',
            'evento.required' => 'O Evento é requerido.',
            'evento.min' => 'O Evento deve ter pelo menos 3 caracteres.',
        ];
    }
}
