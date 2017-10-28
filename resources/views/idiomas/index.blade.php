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
                              @endif

                              @if($idioma=="Griego")
                                <a href="{{ route('griego.show', $categoria->id) }}" class="list-group-item list-group-item-action" style="text-align:center;">Ver</a>
                              @endif

                              @if($idioma=="Ingles")
                                <a href="{{ route('ingles.show', $categoria->id) }}" class="list-group-item list-group-item-action" style="text-align:center;">Ver</a>
                              @endif
                            </a>

                            <a class="dropdown-item">
                              <form  method="POST" action="{{ route('categoria.destroy', $categoria->id) }}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <a class="list-group-item list-group-item-action" style="text-align:center;">
                                <button style="background: transparent; border: none !important;" type="submit">
                                    Eliminar
                                </button>
                                </a>
                              </form>
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
