<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pagamento extends Model
{
    protected $fillable = ['funcionario_id', 'valor', 'entrada_id'];
}
