<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateRequestEntrada;
use App\Models\Entrada;
use App\Models\Funcionario;
use App\Models\Servico;
use Illuminate\Http\Request;
use App\Models\Pagamento;

class FinanceiroEntradaController extends Controller
{
    protected $entrada;
    public function __construct(Entrada $entrada)
    {
        $this->entrada = $entrada;
    }

    public function index(){
        $entradas = $this->entrada->orderByDesc('created_at')->get();

        return view('admin.financeiro.entrada.index', [
            'entradas' => $entradas,
        ]);
    }

    public function edit($id){
        $entrada = $this->entrada->find($id);
        $servicos = Servico::all();
        $funcionarios = Funcionario::where('ativo', 1)->get();;
        
        if($entrada){
            return view('admin.financeiro.entrada.edit', [
                'entrada' => $entrada,
                'servicos' => $servicos,
                'funcionarios' => $funcionarios,
            ]);
        }else{
            return redirect()->back();
        }
    }
    public function update(StoreUpdateRequestEntrada $request){
        $entrada = $this->entrada->find($request->id);
        //pega todos os dados da nova request
        $entrada_new = $request->all();
        
        if($entrada){
            $servico = Servico::find($request->servico_id);
            $entrada_new['valor'] = $servico->preco;
            $entrada_new['descricao'] = "Entrada Referente: ". $servico->descricao;
            $entrada_atualizada = $entrada->update($entrada_new);

            
            if($entrada_atualizada && $request->funcionario_id != null){
                $pagamento_old = Pagamento::where('entrada_id', $entrada_new['id'])->first();
                $funcionario = Funcionario::find($entrada_new['funcionario_id']);
                $pagamento_old['valor'] = $servico->preco * ($funcionario->comissao / 100);
                $pagamento_old['funcionario_id'] = $funcionario->id;
                $pagamento_old->update();     
                return redirect()->route('financeiro.entrada.index')->with('success', 'Entrada Atualizada com sucesso');
            }else{
                $pagamento_old = Pagamento::where('entrada_id', $entrada_new['id'])->first();
                $pagamento_old->delete();
                return redirect()->route('financeiro.entrada.index')->with('success', 'Entrada Atualizada com sucesso');
            }
        }else{
            return redirect()->back()->with('error', 'Erro ao atualizar entrada');
        }
    }

    public function create(){

        $servicos = Servico::all();
        $funcionarios = Funcionario::where('ativo', 1)->get();;

        return view('admin.financeiro.entrada.create', [
            'servicos' => $servicos,
            'funcionarios' => $funcionarios,
        ]);
    }
    public function store(StoreUpdateRequestEntrada $request){
     
        $servico = Servico::find($request->servico_id);
        
        $entrada = [];

        $entrada['servico_id'] = $servico->id;

        $entrada['descricao'] = "Entrada Referente: ". $servico->descricao;
        $entrada['valor'] = $servico->preco;
        if(isset($request->desconto)){
            $entrada['desconto'] = $request->desconto;
        }else{
            $entrada['desconto'] = 0;
        }

        if(isset($request->funcionario_id)){
            $entrada['funcionario_id'] = $request->funcionario_id;
            $result = Entrada::create($entrada);
            
            $funcionario = Funcionario::find($request->funcionario_id);

            $valorPagamento = ($funcionario->comissao / 100) * $entrada['valor'];
            $dataPagamento = [];
            $dataPagamento['funcionario_id'] = $request->funcionario_id;
            $dataPagamento['valor'] = $valorPagamento;
            $dataPagamento['entrada_id'] = $result->id;

            Pagamento::create($dataPagamento);
        }else{
            $result = Entrada::create($entrada);
        }

       if($result){
        return redirect()->route('financeiro.entrada.create')->with('success', 'Entrada Registrada com sucesso!');
        }else{
            return redirect()->route('financeiro.entrada.create')->with('error', 'Erro ao Registrar');
        }
    }

     private function criarPagamento($id_funcionario, $valor){
        return true;
    }


}
  /*
            if(!$pagamento->pago){
                $pagamento->delete();
                //criar outro pagamento

            }else{
                //se já foi pago, apenas retorne com um erro
                return redirect()->back()->with('error', 'A comissão dessa entrada já foi pago!!');
            }*/