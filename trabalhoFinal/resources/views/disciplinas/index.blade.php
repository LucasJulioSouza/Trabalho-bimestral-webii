<!-- Herda o layout padrão definido no template "main" -->
@extends('templates.main', ['titulo' => "disciplinas", 'rota' => "disciplinas.create"])
<!-- Preenche o conteúdo da seção "titulo" -->
@section('titulo') Disciplinas @endsection
<!-- Preenche o conteúdo da seção "conteudo" -->
@section('conteudo')

    <div class="row">
        <div class="col">
        
        <x-datatable 
        :title="'Disciplinas'"
                :crud="'disciplinas'"
                :header="['nome','curso']" 
                :fields="['nome','curso']"
                :data="$dados"
                :hide="[true, false, true, false]" 
                :info="['nome']"
                :remove="'nome'"
            /> 
        </div>
    </div>
    
@endsection