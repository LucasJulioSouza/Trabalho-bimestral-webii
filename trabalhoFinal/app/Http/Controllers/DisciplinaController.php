<?php

namespace App\Http\Controllers;

use App\Models\Disciplina;
use App\Models\Curso;
use Illuminate\Http\Request;

class DisciplinaController extends Controller
{

    public function index()
    {
        $dados = Disciplina::all();
        return view('disciplinas.index', compact(['dados']));
    }


    public function create()
    {
        $curso = Curso::all();
        return view('disciplinas.create',compact(['curso']));
    }

   
    public function store(Request $request)
    {
        Disciplina::create(['nome' => $request->nome,'curso' => $request->cursos,'tempo' => $request->carga ]);

        return redirect()->route('disciplinas.index');
    }

 
    public function show(Disciplina $disciplina)
    {
        //
    }

  
    public function edit($id)
    {
        $aux = Disciplina::all()->toArray();
        $curso = Curso::all();
            
        $index = array_search($id, array_column($aux, 'id'));

        $dados = $aux[$index];    

        return view('disciplinas.edit', compact('dados'), compact('curso'));
    }

    
    public function update(Request $request, $id)
    {
        $aux = Disciplina::find($id);
        
        $aux->fill(['nome' => $request->nome]);
        $aux->fill(['curso' => $request->cursos]);
        $aux->save();

        return redirect()->route('disciplinas.index');
    }

 
    public function destroy($id)
    {
        Disciplina::destroy($id);

        return redirect()->route('disciplinas.index');
    }
}
