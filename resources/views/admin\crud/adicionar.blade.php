@extends ('layout.site')
@extends ('titulo, 'crud')
@section('conteudo')

<div class="container">
    <h3 class="center">Adicionar Curso</h3>

    <div class="row">
        <form class="" action="{{ route('admin.crud.salvar') }}"
              method="post" enctype="multipart/form-data">

            {{ csrf_field() }}

            @include('admin.crud._form')

            <button class="btn deep-orange">Salvar</button>
        </form>
    </div>
</div>

@endsection