<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    protected $fillable = ['descricao', 'funcionario_id', 'servico_id','valor', 'desconto' ];
}
