<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateServicoRequest;
use App\Models\Servico;
use Illuminate\Http\Request;

class ServicoController extends Controller
{
    protected $servico;

    public function __construct(Servico $servico)
    {
        $this->servico = $servico;
    }

    public function index(){

        $servicos = $this->servico->get();
       
        return view('admin.servicos.create', [
            'servicos' => $servicos,
        ]);
    }
    
    public function store(StoreUpdateServicoRequest $request){

        $data = $request->all();

        $result = $this->servico->create($data);

        if($result){
            return redirect()->route('servicos.index')->with('success', 'Serviço/Produto cadastrado com sucesso!');
        }else{
            return redirect()->route('servicos.index')->with('error', 'Erro ao cadastrar');
        }
    }

    public function edit($id){
        $servico = $this->servico->find($id);

        if($servico){
            $servicos = $this->servico->get();

           return view('admin.servicos.create', [
                'servicos' => $servicos,
                'servico' => $servico,
            ]);
        }else{
            return redirect()->back();
        }
    }

    public function update(StoreUpdateServicoRequest $request){

        $servico = $this->servico->find($request->id);

        if(!$servico){
            return redirect()->back();
        }
        $data = $request->all();
        $servico->update($data);

        return redirect()->route('servicos.index')->with('success', 'Serviço/Produto atualizado com sucesso!');
    }

}
