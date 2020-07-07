<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateFuncionarioRequest;
use App\Models\Funcionario;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
{
    protected $funcionario;

    public function __construct(Funcionario $funcionario)
    {
        $this->funcionario = $funcionario;
    }

    public function index(){
        $funcionarios = $this->funcionario->where('ativo', 1)->get();

        return view('admin.funcionarios.index', [
            'funcionarios' => $funcionarios,
        ]);
    }
    
    public function create(){
        return view('admin.funcionarios.create');
    }

    public function store(StoreUpdateFuncionarioRequest $request){
 
        $data = $request->except('image');
    
        $data['ativo'] = true;

        $result = $this->funcionario->create($data);

        if($result){
            return redirect()->route('funcionarios.create')->with('success', 'Funcionário cadastrado com sucesso!');
        }else{
            return redirect()->route('funcionarios.create')->with('error', 'Erro ao cadastrar funcionário');
        }
        
    }

    public function edit($id){
        $funcionario = $this->funcionario->find($id);

        if(!$funcionario){
            return redirect()->back();
        }

        return view('admin.funcionarios.edit', [
            'funcionario' => $funcionario
        ]);
    }

    public function update(StoreUpdateFuncionarioRequest $request){
        $funcionario = $this->funcionario->find($request->id);

        if(!$funcionario){
            return redirect()->back();
        }

        $data = $request->all();

        $funcionario->update($data);

        return redirect()->route('funcionarios.index');
    }

    public function desativar($id){
        $status = false;

        $funcionario = $this->funcionario->find($id);

        if($funcionario){
            $funcionario->update(['ativo' => $status]);
            return redirect()->route('funcionarios.index')->with('success', 'Funcionário desativado com sucesso!');
        }else{
            return redirect()->route('funcionarios.index')->with('error', 'ERRO ao desativar funcionário');
        }  
    }

    
    public function details($id){
        $funcionario = $this->funcionario->find($id);

        return view('admin.funcionarios.details', [
            'funcionario' => $funcionario
        ]);
    }
}
