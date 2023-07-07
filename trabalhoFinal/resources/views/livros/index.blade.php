<!-- Herda o layout padrão definido no template "main" -->
@extends('templates.main', ['titulo' => "Livros", 'rota' => "livros.create"])
<!-- Preenche o conteúdo da seção "titulo" -->
@section('titulo') livros @endsection
<!-- Preenche o conteúdo da seção "conteudo" -->
@section('conteudo')

    <div class="row">
        <div class="col">
            <x-datatable 
                title="Livros" 
                crud="livros" 
                :header="['id','titulo','conteudo','aluno']" 
                :data="$dados"
                :hide="[true, false,false,false]" 
            /> 
        </div>
    </div>
@endsection