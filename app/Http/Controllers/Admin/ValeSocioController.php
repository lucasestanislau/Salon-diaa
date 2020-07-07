<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValeSocioRequest;
use App\Models\Socio;
use App\Models\Valesocio;
use Illuminate\Cache\RedisTaggedCache;
use Illuminate\Http\Request;

class ValeSocioController extends Controller
{
    protected $vale;

    public function __construct(Valesocio $vale)
    {
        $this->vale = $vale;
    }

    public function index(){
        $vales = $this->vale->get();
        $socios = Socio::get();
        return view('admin.ValeSocio.index', ['vales' => $vales, 'socios' => $socios]);
    }

    public function create(){
        $socios = Socio::get();

        return view('admin.ValeSocio.create', ['socios' => $socios]);
    }

    public function edit($id){

        $vale = $this->vale->find($id);

        if($vale){
            $socios = Socio::get();
            return view('admin.ValeSocio.edit', [ 'vale' => $vale, 'socios' => $socios]);
        }else{
            return redirect()->back();
        }
    }

    public function update(ValeSocioRequest $request){
        $vale = $this->vale->find($request->id);

        if($vale){
            $vale->update($request->all());
            return redirect()->route('valesocio.index')->with('success', 'Atualizado com sucesso!');
        }else{
            return redirect()->back()->with('error', 'Erro ao atualizar');
        }
    }
    
    public function store(ValeSocioRequest $request){

        $result = $this->vale->create($request->all());

        if($result){
            return redirect()->route('valesocio.create')->with('success', 'Vale Sócio registrado com sucesso');
        }else{
            return redirect()->route('valesocio.create')->with('error', 'ERRO ao registrar Vale');
        }
    }
}
