<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vale extends Model
{
    protected $fillable = [ 'descricao', 'valor', 'funcionario_id'];
}
