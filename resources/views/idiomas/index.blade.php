@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">CATEGORIAS</div>

                <div class="panel-b
                ody">

                    <div class="list-group">
                      @foreach($categorias as $categoria)
                      <div class="btn-group">
                          <button type="button" class="btn  dropdown-toggle btn-lg btn-block" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border-style:outset; border-color:#263238;">
                              {{ $categoria->nombre_categoria }}
                          </button>
                          <div class="dropdown-menu btn-block">
                            <a class="dropdown-item">
                              @if($idioma=="Italiano")
                                <a href="{{ route('italiano.show', $categoria->id) }}" class="list-group-item list-group-item-action" style="text-align:center;">Ver</a>
                                <a href="{{ route('italiano.create')}}" class="list-group-item list-group-item-action" style="text-align:center;">Agregar Vocabulario</a>
                              @endif

                              @if($idioma=="Griego")
                                <a href="{{ route('griego.show', $categoria->id) }}" class="list-group-item list-group-item-action" style="text-align:center;">Ver</a>
                                <a href="{{ route('griego.create')}}" class="list-group-item list-group-item-action" style="text-align:center;">Agregar Vocabulario</a>
                              @endif

                              @if($idioma=="Ingles")
                                <a href="{{ route('ingles.show', $categoria->id) }}" class="list-group-item list-group-item-action" style="text-align:center;">Ver</a>
                                <a href="{{ route('ingles.create')}}" class="list-group-item list-group-item-action" style="text-align:center;">Agregar Vocabulario</a>
                              @endif
                            </a>


                          </div>
                      </div>
                      @endforeach

                </div>
            </div>
        </div>
    </div>
  </div>
</div>


@endsection
