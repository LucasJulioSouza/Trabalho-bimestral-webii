<!-- Herda o layout padrão definido no template "main" -->
@extends('templates.main', ['titulo' => "cursos", 'rota' => "cursos.create"])
<!-- Preenche o conteúdo da seção "titulo" -->
@section('titulo') Cursos @endsection
<!-- Preenche o conteúdo da seção "conteudo" -->
@section('conteudo')

    <div class="row">
        <div class="col">
        
        <x-datatable 
                :title="'Cursos'"
                :crud="'cursos'"
                :header="['nome','sigla']" 
                :fields="['nome','sigla']"
                :data="$dados"
                :hide="[true, false, true, false]" 
                :info="['nome']"
                :remove="'nome'"
            /> 
        </div>
    </div>
    
@endsection