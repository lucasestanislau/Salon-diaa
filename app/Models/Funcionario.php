<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    //
    protected $fillable = ['nome', 'endereco', 'rg', 'cpf','ativo', 'comissao', 'telefone', 'image'];
}
