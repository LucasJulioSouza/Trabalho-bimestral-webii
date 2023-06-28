<!-- Herda o layout padrão definido no template "main" -->
@extends('templates.main', ['titulo' => "Acesso negado"])
<!-- Preenche o conteúdo da seção "titulo" -->
@section('titulo') Eixos @endsection
<!-- Preenche o conteúdo da seção "conteudo" -->
@section('conteudo')

<body class="aw-layout-simple-page">
    Sua permissão não permite que tenha acesso ao conteúdo da pagina!!!
  
      <div class="d-flex justify-content-center">
      

        <img src="https://www.goldensolucoes.com.br/wp-content/uploads/2016/09/Proibido.jpg" 
            alt="Imagem de stop"
            width="300"
            height="300"
        >
        <br/><br/>
        
      </div>
     <a href="javascript:history.back()" class="btn btn-primary">Voltar para onde estava</a>
        
    

  
</body>
</html>


@endsection