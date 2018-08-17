@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">CATEGORIAS</div>

                <div class="panel-body">

                    <div class="list-group">
                      @foreach($categorias[0] as $categoria)
                      <div class="btn-group">
                          <button type="button" class="btn  dropdown-toggle btn-lg btn-block" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border-style:outset; border-color:#263238;">
                              {{ $categoria->nombre_categoria }}
                          </button>
                          <div class="dropdown-menu btn-block">
                            <a class="dropdown-item">
                                <a href="{{ url('/idioma/'.$idioma.'/categoria/'.$categoria->id) }} " class="list-group-item list-group-item-action" style="text-align:center;">Ver</a>
                                <a href="{{ url('/idioma/'.$idioma.'/agregar') }}" class="list-group-item list-group-item-action" style="text-align:center;">Agregar Vocabulario</a>
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
