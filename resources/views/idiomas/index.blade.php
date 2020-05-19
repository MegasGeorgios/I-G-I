@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">CATEGORIAS</div>

                <div class="panel-body">

                    <div class="list-group">
                      @if (!empty($categorias))
                        @foreach($categorias as $categoria)
                        <div class="btn-group">
                            <button type="button" class="btn  dropdown-toggle btn-lg btn-block list-group-item list-group-item-action" style="text-align:center;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border-style:outset; border-color:#263238;">
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
                        @else
                        <div style="text-align: center; padding: 10px;">
                          <p><strong>Sin categorías</strong></p>
                        </div>
                        @endif
                      <form class="form-inline my-2 my-lg-0" method="GET" action="{{url('/idioma/'.$idioma.'/buscar')}}">
                        <input class="form-control mr-sm-2" name="palabra" type="search" placeholder="Buscar palabra" aria-label="Search" autocomplete="off">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>


@endsection
