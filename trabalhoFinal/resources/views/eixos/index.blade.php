<!-- Herda o layout padrão definido no template "main" -->
@extends('templates.main', ['titulo' => "eixos", 'rota' => "eixos.create"])
<!-- Preenche o conteúdo da seção "titulo" -->
@section('titulo') Eixos @endsection
<!-- Preenche o conteúdo da seção "conteudo" -->
@section('conteudo')

    <div class="row">
        <div class="col">
        
        <x-datatable 
                :title="'Eixos'"
                :crud="'eixos'"
                :header="['nome']" 
                :fields="['nome']"
                :data="$dados"
                :hide="[true, false, true, false]" 
                :info="['nome']"
                :remove="'nome'"
            /> 
        </div>
    </div>
    
@endsection