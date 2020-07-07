<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateRequestEntrada extends FormRequest
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
            "servico_id"=>'required',

            "valor_final" => 'numeric|min:0',
        ];
    }
    
    public function messages(){
        return [
            'valor_final.min' => "O valor total não pode ser menor do que 0 (Zero)",
            'servico_id.required' => "Deve ser informado um serviço!",
        ];
    }
}
