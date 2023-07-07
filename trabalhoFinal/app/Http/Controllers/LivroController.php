<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use App\Models\Aluno;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LivroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dados = Livro::all();

        return view('livros.index', compact(['dados']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dados = Livro::with(['aluno' => function ($q) {
            $q->withTrashed();
        }])->orderBy('nome')->get();

        return view('livros.create',compact(['dados']));
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $regras = ([
            'titulo' => 'required|max:30|min:10',
            'autor' => 'required|max:30|min:10',
            'conteudo' => 'required|max:255|min:20'

        ]);

        $msgs = [
            "required" => "Preenchimento obrigatório!",
            "max" => "Tamanho máximo de :max caracteres!",
            "min" => "Tamanho mínimo de :min caracteres!"
        ];

        $request->validate($regras,$msgs);

        $dados = $request->only(['titulo', 'autor', 'conteudo']);
    
        $livro = new Livro($dados);
        
        $aluno = Aluno::find($request->aluno_id);
        
        $livro->aluno()->associate($aluno);
        
        $livro->save();

        return redirect()->route('eixos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Livro  $livro
     * @return \Illuminate\Http\Response
     */
    public function show(Livro $livro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Livro  $livro
     * @return \Illuminate\Http\Response
     */
    public function edit(Livro $livro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Livro  $livro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Livro $livro)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Livro  $livro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Livro $livro)
    {
        //
    }
}
