<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateFuncionarioRequest extends FormRequest
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
            'nome' => "required|min:3|max:80",
            "endereco" => 'required|min:3|max:90',
            "telefone" => "required|min:8|max:30|unique:funcionarios,telefone,{$id},id",
            'comissao' => 'nullable',
            'image' => 'nullable|image',
            'cpf' => "nullable|unique:funcionarios,cpf,{$id},id",
            'rg' => "nullable|unique:funcionarios,rg,{$id},id",

        ];
    }

    public function messages(){
        return [
            'nome.required' => 'Nome é obrigatório',
            'nome.min' => 'Ops! nome está mmuito curto',
            'telefone.unique' => "Ops Esse telefone já foi cadastrado!",
            'rg.unique' => "Ops Esse RG já foi cadastrado!",
            'cpf.unique' => "Ops Esse CPF já foi cadastrado!",
        ];
    }
}
