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
       

        return view('professores.index', compact(['dados']));
    }

   
    public function create()
    {
        $eixo = Eixo::all();
        return view('professores.create',compact(['eixo']));
    }

  
    public function store(Request $request)
    {
        $status = (bool) $request->input('status');
        if ($status) {
            
            Professor::create(['ativo'=>$status, 'nome' => $request->nome,'email' => $request->email,'siape' => $request->siape,'eixo' => $request->eixos ]);
        
        } else {
            
            Professor::create(['ativo'=>$status, 'nome' => $request->nome,'email' => $request->email,'siape' => $request->siape,'eixo' => $request->eixos]);
        
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
            $aux->save();
        
        } else {
            
            $aux = Professor::find($id);
        
        $aux->fill(['nome' => $request->nome]);
        $aux->fill(['ativo'=>$status]);
        $aux->fill(['eixo' => $request->eixos]);
        
        $aux->save();
        
        }
       

        return redirect()->route('eixos.index');
    }

    
    public function destroy(Professsor $professsor)
    {
        //
    }
}
