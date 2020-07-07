<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValeRequest extends FormRequest
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
            'descricao' => 'required|',
            "valor" => 'numeric|min:0',
            'funcionario_id' => 'required'
        ];
    }

    public function messages(){
        return [ 
            'descricao.required' => 'Informa uma descrição!',
            'valor.numeric' => 'O valor deve ser numérico',
            'funcionario_id' => 'Selecione o funcionário'
        ];
    }
}
