<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateSaidaRequest extends FormRequest
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
            'descricao' => 'required|min:4',
            'valor' => 'required|numeric|min:0',
        ];
    }

    public function messages()
    {
        return [
            'descricao.required' => 'Por favor, informe uma descrição',
            'descricao.min' => 'A descrição está muito curta',
            'valor.required' => 'Por favor, informe um valor',
            'valor.numeric' => 'O valor deve ser numérico',
            'valor.min' => 'O valor deve ser maior ou igual a 0 (ZERO)',
        ];
    }
}
