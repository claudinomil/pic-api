<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EstadoCivilUpdateRequest extends FormRequest
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
                Rule::unique('estados_civis')->ignore($this->id),
                ]
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O Nome é requerido.',
            'name.min' => 'O Nome deve ter pelo menos 3 caracteres.',
            'name.unique' => 'O Nome já existe.'
        ];
    }
}
