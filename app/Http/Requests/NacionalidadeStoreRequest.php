<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NacionalidadeStoreRequest extends FormRequest
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
            'name' => ['required', 'min:3', 'unique:nacionalidades'],
            'nation' => ['required', 'min:3', 'unique:nacionalidades']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O Nome é requerido.',
            'name.min' => 'O Nome deve ter pelo menos 3 caracteres.',
            'name.unique' => 'O Nome já existe.',
            'nation.required' => 'A Nação é requerido.',
            'nation.min' => 'A Nação deve ter pelo menos 3 caracteres.',
            'nation.unique' => 'A Nação já existe.'
        ];
    }
}
