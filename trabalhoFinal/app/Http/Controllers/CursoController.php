<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Eixo;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    
    public function index()
    {   
        
        $dados = Curso::all();
        return view('cursos.index', compact(['dados']));
    }

    
    public function create()
    {
        $eixo = Eixo::all();
        return view('cursos.create',compact(['eixo']));
    }

    
    public function store(Request $request)
    {
        Curso::create(['nome' => $request->nome,'sigla' => $request->sigla,'tempo' => $request->tempo,'eixo' => $request->eixos ]);

        return redirect()->route('cursos.index');
    }

    
    public function show($id)
    {
        $aux = Curso::all()->toArray();
        
        $index = array_search($id, array_column($aux, 'id'));

        $dados = $aux[$index];

        return view('cursos.show', compact('dados'));
    }

    
    public function edit($id)
    {
        $aux = Curso::all()->toArray();
            
        $index = array_search($id, array_column($aux, 'id'));

        $dados = $aux[$index];    

        return view('cursos.edit', compact('dados'));
    }

    
    public function update(Request $request, $id)
    {
        $aux = Curso::find($id);
        
        $aux->fill(['nome' => $request->nome]);
        $aux->fill(['sigla' => $request->sigla]);
        $aux->save();

        return redirect()->route('cursos.index');
    }

   
    public function destroy($id)
    {
        Curso::destroy($id);

        return redirect()->route('cursos.index');
    }
}
