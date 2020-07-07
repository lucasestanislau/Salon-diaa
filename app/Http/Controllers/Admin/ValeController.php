<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValeRequest;
use App\Models\Funcionario;
use App\Models\Vale;
use Illuminate\Http\Request;

class ValeController extends Controller
{

    protected $vale;

    public function __construct(Vale $vale)
    {
        $this->vale = $vale;
    }
    
    public function index(){

        $vales = Vale::orderByDesc('created_at')->get();
        $funcionarios = Funcionario::get();

        return view('admin.vale.index', [
            'vales' => $vales,
            'funcionarios' => $funcionarios
        ]);
    }

    public function create(){
        $funcionarios = Funcionario::where('ativo', 1)->get();;

        return view('admin.vale.create', [
            'funcionarios' => $funcionarios
        ]);
    }
    public function edit($id){
        $vale = Vale::find($id);
        $funcionarios = Funcionario::where('ativo', 1)->get();;
        if($vale){
            return view('admin.vale.edit', [ 'vale' => $vale , 'funcionarios' => $funcionarios]);
        }else{
            return redirect()->back();
        }
    }

    public function update(ValeRequest $request){
        $vale = $this->vale->find($request->id);

        if($vale){
            $vale->update($request->all());
            
            return redirect()->route('vale.index')->with('success', 'Vale Atualizado com sucesso');
        }else{
            return redirect()->route('vale.index')->with('error', 'Erro ao Atualizar Vale');
        }

    }

    public function store(ValeRequest $request){
        
        $result = Vale::create($request->all());

        if($result){
            return redirect()->route('vale.create')->with('success', 'Vale Registrado com sucesso');
        }else{
            return redirect()->route('vale.create')->with('error', 'Erro ao registrar Vale');
        }
    }
}
