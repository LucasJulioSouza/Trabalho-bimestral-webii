<?php

namespace App\Http\Controllers;

use App\Models\Professor;
use App\Models\Eixo;
use Illuminate\Http\Request;

class ProfessorController extends Controller
{
    
    
    public function index()
    {
        $dados = Professor::all();
        $eixos = Eixo::all();
        
        foreach ($dados as $professor) {
            $eixo = $eixos->firstWhere('id', $professor->eixo);
            $professor->eixo = $eixo->nome;
        }
        return view('professores.index', compact('dados'));
    
    
       
    }

   
    public function create()
    {
        $eixo = Eixo::all();
        return view('professores.create',compact(['eixo']));
    }

  
    public function store(Request $request)
    {
        $regras = [
            'nome' => 'required|max:100|min:10',
            'email' => 'required|max:250|min:15|unique:email',
            'siape' => 'required|max:10|min:8|unique:siape',
            
            
        ];

            $msgs = [
                
                "required" => "O preenchimento do campo [:attribute] é obrigatório!",
                "max" => "O campo [:attribute] possui tamanho máximo de [:max] caracteres!",
                "min" => "O campo [:attribute] possui tamanho mínimo de [:min] caracteres!",
    
            ];

            $request->validate($regras, $msgs);

        $status = (bool) $request->input('status');
        if ($status) {
            
            Professor::create(['status'=>$request->$status, 'nome' => $request->nome,'email' => $request->email,'siape' => $request->siape,'eixo' => $request->eixos ]);
        
        } else {
            
            Professor::create(['status'=>$request->$status, 'nome' => $request->nome,'email' => $request->email,'siape' => $request->siape,'eixo' => $request->eixos]);
        
        }
        

        return redirect()->route('professores.index');
    }

    public function show($id)
    {
        $aux = Professor::all()->toArray();
            
        $index = array_search($id, array_column($aux, 'id'));

        $dados = $aux[$index];    

        return view('professores.show', compact('dados'));
    }

    public function edit($id)
    {
        $eixo = Eixo::all();
        
        $aux = Professor::all()->toArray();
            
        $index = array_search($id, array_column($aux, 'id'));

        $dados = $aux[$index];    

        return view('professores.edit', compact('dados'),compact('eixo') );
    }

    
    public function update(Request $request, $id)
    {
        $eixo = Eixo::all();

        $status = (bool) $request->input('status');
        if ($status) {
            
            $aux = Professor::find($id);
        
            $aux->fill(['nome' => $request->nome]);
            $aux->fill(['status'=>$status]);
            $aux->fill(['eixo' => $request->eixos]);
            $aux->save();
        
        } else {
            
            $aux = Professor::find($id);
        
        $aux->fill(['nome' => $request->nome]);
        $aux->fill(['status'=>$status]);
        $aux->fill(['eixo' => $request->eixos]);
        
        $aux->save();
        
        }
       

        return redirect()->route('professores.index');
    }

    
    public function destroy(Professsor $professsor)
    {
        //
    }
}
