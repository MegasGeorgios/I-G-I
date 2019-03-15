
@extends('/layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                  <strong>
                      @if ($idioma == 'griego')
                          Griego
                      @elseif ($idioma == 'italiano')
                          Italiano
                      @else
                          Ingles
                      @endif
                    </strong>
                  </div>

                <div class="panel-body">


                    <div class="list-group">
                      <a href="" data-toggle="modal" data-target="#exampleModal" class="list-group-item list-group-item-action" style="text-align:center;">Crear Categoria</a>
                      <a href="{{ url('/categorias/'.$idioma) }}" class="list-group-item list-group-item-action" style="text-align:center;">Ver Categorias</a>
                      <a href="{{ url('/idioma/'.$idioma.'/agregar') }}" class="list-group-item list-group-item-action" style="text-align:center;">Agregar Vocabulario</a>
                      <a href="{{ url('/idioma/'.$idioma.'/repaso') }}" class="list-group-item list-group-item-action" style="text-align:center;">Repasar Vocabulario</a>
                      <a href="{{ url('/recursos/'.$idioma) }}" class="list-group-item list-group-item-action" style="text-align:center;">Ver Galeria</a>
                      <a href="{{ url('/dialogos/'.$idioma) }}" class="list-group-item list-group-item-action" style="text-align:center;">Dialogos</a>
                      <!--<a href="" data-toggle="modal" data-target="#exampleModal3" class="list-group-item list-group-item-action" style="text-align:center;">Agregar Apuntes</a>-->
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

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Crea una categoria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('categoria.store') }}">
          {{ csrf_field() }}

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nombre:</label>
            <input type="text" class="form-control" name="nombre_categoria">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
