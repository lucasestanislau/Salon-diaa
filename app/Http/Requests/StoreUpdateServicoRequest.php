<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateServicoRequest extends FormRequest
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
        $id = $this->id;

        return [
            'descricao' => "required|unique:servicos,descricao,{$id},id",
            'preco' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'descricao.required' => 'A descrição precisa ser preenchida',
            'descricao.unique' => 'Esse serviço já foi cadastrado',
            'preco.required' => 'O valor precisa ser informado',
        ];
    }
}
