<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SocioRequest extends FormRequest
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
            'nome' => "required|unique:socios,nome,{$id},id"
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'Informe um nome',
            'nome.unique' => 'Esse nome já foi cadastrado',
        ];
    }
}
