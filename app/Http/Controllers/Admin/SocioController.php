<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SocioRequest;
use App\Models\Socio;
use Illuminate\Http\Request;

class SocioController extends Controller
{
    protected $socio;

    public function __construct(Socio $socio)
    {
        $this->socio = $socio;
    }

    public function create(){
        return view('admin.socios.create');
    }

    public function store(SocioRequest $request){

        $result = $this->socio->create($request->all());

        if($result){
            return redirect()->route('socio.create')->with('success', 'Sócio Cadastrado com sucesso!');
        }else{
            return redirect()->route('socio.create')->with('success', 'Erro ao cadastrar sócio!');
        }
    }
    
}
