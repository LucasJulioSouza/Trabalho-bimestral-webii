@extends('templates.main', ['titulo' => "Cursos", 'rota' => "cursos.create"])

@section('titulo') Cursos @endsection

@section('conteudo')

    <div class="row">
        <div class="col">
            <x-datalistCursos
                :header="['NOME','SIGLA','EIXO','AÇÕES']" 
                :data="$dados"
                :hide="[true, true, true, true]" 
                :remove="'nome'"
            />
        </div>
    </div>

@endsection