<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Entrada;
use App\Models\Pagamento;
use App\Models\Saida;
use Carbon\Carbon as CarbonCarbon;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    protected $entrada;
    protected $saida;
    protected $pagamento;

    public function __construct(Entrada $entrada, Saida $saida, Pagamento $pagamento)
    {
     $this->entrada = $entrada;
     $this->saida = $saida;   
     $this->pagamento = $pagamento;   
    }

    /* retorna valores de HOJE */
    public function index(){
        $valorTotalEntrada = $this->getValorTotalEntradaHoje();
        $valorTotalSaida = $this->getValorTotalSaidaHoje();
        $saidaLast12Days = $this->getValorSaidaLastXDays(12);
        $entradaLast12Days = $this->getValorEntradaLastXDays(12);
        $saldoLast12Days = $this->getSaldoLastXDays($entradaLast12Days, $saidaLast12Days);
        $datasXdias = $this->getArrayDatasXLastDias(12);

       //dd(array_reverse($datasXdias));
        return view('home', [
            'valorTotalEntrada' => $valorTotalEntrada,
            'valorTotalSaida' => $valorTotalSaida,
            'saldoLast12Days' => array_reverse($saldoLast12Days),
            'labelDatas' => array_reverse($datasXdias),
        ]);
    }

    public function getArrayDatasXLastDias($dias){
        $valorTotalArray = [];
        $count = 1;

        while($count <= $dias){
            $date = Carbon::today()->subDays($count)->format('d-m-Y');
            $valorTotalArray[] =  $date;
            $count++;
        }
        return $valorTotalArray;
    }


    /*Retorna o saldo dos odis arrays passados por parametro */
    public function getSaldoLastXDays($entradas, $saidas){
        $saldo = [];
        foreach($entradas as $key => $value){
            $saldo[$key] = $value - $saidas[$key];
        }

        return $saldo;
    }

    /*retorna a soma dos valores das entradas dos ultimos 12 dias */
    public function getValorEntradaLastXDays($days){
        $valorTotalArray = [];
        $count = 1;

        while($count <= $days){
            $date = Carbon::today()->subDays($count);
            $valorTotal = $this->entrada->whereDate('created_at', $date)->sum('valor');
            
            $valorTotalArray[] = $valorTotal;
            $count++;
        }
        
        return $valorTotalArray;
    
    }

    /*retorna a soma dos valores das saidas dos ultimos 12 dias */
    public function getValorSaidaLastXDays($days){

        $valorTotalArray = [];
        $count = 1;

        while($count <= $days){
            $date = Carbon::today()->subDays($count);
            $valorTotal = $this->saida->whereDate('created_at', $date)->sum('valor');
            
            $valorTotalArray[] = $valorTotal;
            $count++;
        }
        return $valorTotalArray;
    }

    /*Retorna o total de todos os valor que entraram no caixa */
    public function getValorTotalEntradaHoje(){
        $entradas = $this->entrada->whereDate('created_at', Carbon::today())->get();
        $valorTotal = 0;
        foreach($entradas as $entrada){
            $valorTotal += $entrada->valor;
        }
        return $valorTotal;
    }
    /*Retoorna o total de todos os valores que sairam do caixa */
    public function getValorTotalSaidaHoje(){
        $saidas = $this->saida->whereDate('created_at', Carbon::today())->get();
        $valorTotalSaida = 0;
        foreach($saidas as $saida){
            $valorTotalSaida += $saida->valor;
        }
        $valorTotalPagamentosPago = $this->getPagamentosPagos();
        return $valorTotalSaida + $valorTotalPagamentosPago;
    }

    /* Retorna o total de todos os pagamentos que foram pagos HOJE para funcionários */
    public function getPagamentosPagos(){
        $pagamentosPagos = $this->pagamento->where('pago', 1)->whereDate('created_at', Carbon::today())->get();
        $valorTotal = 0;
        foreach($pagamentosPagos as $pagamentoPago){
            $valorTotal += $pagamentoPago->valor;
        }
        return $valorTotal;
    }
}
