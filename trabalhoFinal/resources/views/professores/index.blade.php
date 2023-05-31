<!-- Herda o layout padrão definido no template "main" -->
@extends('templates.main', ['titulo' => "professores", 'rota' => "professores.create"])
<!-- Preenche o conteúdo da seção "titulo" -->
@section('titulo') Professores @endsection
<!-- Preenche o conteúdo da seção "conteudo" -->
@section('conteudo')

    <div class="row">
        <div class="col">
        
        <x-datatable 
                :title="'Professores'"
                :crud="'professores'"
                :header="['nome','eixo','status']" 
                :fields="['nome','eixo','status']"
                :data="$dados"
                :hide="[true, false, true, false]" 
                :info="['nome']"
                :remove="'nome'"
            /> 
        </div>
    </div>
    
@endsection