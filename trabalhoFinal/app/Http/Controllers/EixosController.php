<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Eixo;

class EixosController extends Controller
{
    
    public function index()
    {
        $dados = Eixo::all();
        return view('eixos.index', compact(['dados']));
    }

    
    public function create()
    {
        return view ('eixos.create');
    }

    
    public function store(Request $request)
    {
        
        $regras = [
            'nome' => 'required|max:50|min:10',
            
        ];

            $msgs = [
                
                "required" => "O preenchimento do campo [:attribute] é obrigatório!",
                "max" => "O campo [:attribute] possui tamanho máximo de [:max] caracteres!",
                "min" => "O campo [:attribute] possui tamanho mínimo de [:min] caracteres!",
    
            ];

            $request->validate($regras, $msgs);

        Eixo::create(['nome' => $request->nome]);

        return redirect()->route('eixos.index');
    }

   
    public function show($id)
    {
        $aux = Eixo::all()->toArray();
        
        $index = array_search($id, array_column($aux, 'id'));

        $dados = $aux[$index];

        return view('eixos.show', compact('dados'));
    }

    
    public function edit($id)
    {
        $aux = Eixo::all()->toArray();
            
        $index = array_search($id, array_column($aux, 'id'));

        $dados = $aux[$index];    

        return view('eixos.edit', compact('dados'));
    }

    
    public function update(Request $request, $id)
    {
        
        $aux = Eixo::find($id);
        
        $aux->fill(['nome' => $request->nome]);
        $aux->save();

        return redirect()->route('eixos.index');
    }

    
    public function destroy($id)
    {
        Eixo::destroy($id);

        return redirect()->route('eixos.index');
    }
}
