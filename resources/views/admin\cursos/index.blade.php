@extends('layout.site)
@section('titulo', 'listagem de cursos')
@section(conteudo)


foreach($linha as $linhas)
    {{ $linhas['descricao']; }}
@endforeach

@endsection

<div class='container'>
 <h3 class='center'>Lista de Cursos</h3>
    <div class='linha'>
        <table>
            <thead>
                <tr>  <!-- CABECALHO -->
                    <td>Id</td><td>Titulo</td><td>Descrição</td>
                    <td>Publicado</td><td>Valor</td>
                    <td>Imagem</td>
                    <td>Ação</td>
                </tr>
            </thead>
            <tbody>
            @foreach($linhas as $linha)   <!-- LOOP PRA LER A TABELA -->
                <tr>

                    <td>{{ $linha->id }}</td><td>{{ $linha->titulo }}</td><td>{{ $linha->descricao }}</td>
                    <td>{{ $linha->publicado }}</td><td>{{ $linha->valor }}</td>
                    <td><img src="{{ asset($linha->imagem) }}" alt="{{ $linha->titulo }}"></td>
                    <td>  
                        
                        <!-- COLUNA COM ALTERAR E EXCLUIR -->
                        <a class='btn deep-orange' href="{{ route('admin.cursos.editar',$linha->id) }}">Alterar</a>
                        <a class='btn rede' href="{{ route('admin.cursos.excluir',$linha->id) }}">Excluir</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>   
    </div>
    <div class='linha'>  <!-- BOTAO ADICIONAR -->
        <a class='btn blue' href="{{ route('admin.cursos.adicionar')}}">Adicionar</a>
    </div>
</div>

@endsection 

<html>
    <head>
      <title>@yield('titulo')</title>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>

        <nav>
            <div class="nav-wrapper deep-orange">
                <a href="#!" class="brand-logo">Projeto Cursos</a>
                <a href="#" data-target="mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                    <ul class="right hide-on-med-and-down">
                        <li><a href="/">Home</a></li>
                        <li><a href="{{route('admin.cursos')}}">Cursos</a></li>
                    </ul>
            </div>
        </nav>

        <ul class="sidenav" id="mobile">
        <li><a href="/">Home</a></li>
        <li><a href="{{route('admin.cursos')}}">Cursos</a></li>
        </ul>


    <!--JavaScript at end of body for optimized loading-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.sidenav').sidenav();
            M.updateTextFields();
        });
    </script>
    </body>
  </html>
