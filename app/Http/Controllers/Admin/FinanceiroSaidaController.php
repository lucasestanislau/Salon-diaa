<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSaidaRequest;
use App\Models\Saida;
use Illuminate\Http\Request;

class FinanceiroSaidaController extends Controller
{
    protected $saida;

    public function __construct(Saida $saida)
    {
        $this->saida = $saida;
    }

    public function index(){
        $saidas = $this->saida->orderByDesc('created_at')->get();

        return view('admin.financeiro.saida.index', [
            'saidas' => $saidas,
        ]);
    }
    public function create(){
        return view('admin.financeiro.saida.create');
    }
    public function store(StoreUpdateSaidaRequest $request){
        $data = $request->all();

        $result = Saida::create($data);

        if($result){
            return redirect()->route('financeiro.saida.create')->with('success', 'Saída registrada com sucesso!');
        }else{
            return redirect()->route('financeiro.saida.create')->with('error', 'ERRO ao registrar saída!');
        }
    }

    public function edit($id){
        $saida = $this->saida->find($id);
        if($saida){
            return view('admin.financeiro.saida.edit', [
                'saida' => $saida,
            ]);
        }else{
            return redirect()->back();
        }
    }

    public function update(StoreUpdateSaidaRequest $request){

        $saida = $this->saida->find($request->id);

        if($saida){
            $saida->update($request->all());

            return redirect()->route('financeiro.saida.index')->with('success', 'Saída atualizada com sucesso!');
        }else{
            return redirect()->route('financeiro.saida.index')->with('error', 'ERRO ao atualizar saída!');
        }
    }
}
