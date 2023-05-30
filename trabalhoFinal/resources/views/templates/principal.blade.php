<!-- Herda o layout padrão definido no template "main" -->
@extends('templates.main', ['titulo' => "principal"])
<!-- Preenche o conteúdo da seção "titulo" -->
@section('titulo') Principal @endsection
<!-- Preenche o conteúdo da seção "conteudo" -->
@section('conteudo')

    <h2>O seguinte trabalho contempla os conceitos trabalhados em aula como:</h2>
    
    <ul>
    <li><h2> Rotas </h2></li>
    
    <li><h2>Controllers</h2></li>
    
    <li><h2>View/Paginação</h2></li>
    
    <li><h2>Migration</h2></li>
    </ul>

    <br>

    <h2>Para dar continuidade ao programa estará disponivel no header no menu "Organização" as opções disponiveis para cadastro.</h2>

    
@endsection