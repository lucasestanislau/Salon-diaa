<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Entrada;
use App\Models\Saida;
use Carbon\Carbon;
use Illuminate\Http\Request;

class GraficoController extends Controller
{

    public function anual(){

        return view('admin.graficos.anual');
    }

    public function xdias(){
        $saidaLast12Days = $this->getValorSaidaLastXDays(12);
        $entradaLast12Days = $this->getValorEntradaLastXDays(12);

        dd($entradaLast12Days);
        return $saidaLast12Days;
    }

        /*retorna a soma dos valores das saidas dos ultimos 12 dias */
        public function getValorSaidaLastXDays($days){

            $valorTotalArray = [];
            $count = 1;
    
            while($count <= $days){
                $date = Carbon::today()->subDays($count);
                $valorTotal = Saida::whereDate('created_at', $date)->sum('valor');
                
                $valorTotalArray[] = $valorTotal;
                $count++;
            }
            return $valorTotalArray;
        }

            /*retorna a soma dos valores das entradas dos ultimos 12 dias */
    public function getValorEntradaLastXDays($days){
        $valorTotalArray = [];
        $count = 1;

        while($count <= $days){
            $date = Carbon::today()->subDays($count);
            $valorTotal = Entrada::whereDate('created_at', $date)->sum('valor');
            
            $valorTotalArray[] = $valorTotal;
            $count++;
        }
        
        return $valorTotalArray;
    
    }
}
