
@extends('/layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>{{ $idioma }}</strong></div>

                <div class="panel-body">


                    <div class="list-group">
                      <a href="" data-toggle="modal" data-target="#exampleModal" class="list-group-item list-group-item-action" style="text-align:center;">Crear Categoria</a>
                      <a href="{{ route('categoria.index')}} " class="list-group-item list-group-item-action" style="text-align:center;">Ver Categorias</a>
                      @if($idioma=="Italiano")
                      <a href="{{ route('italiano.create')}}" class="list-group-item list-group-item-action" style="text-align:center;">Agregar Vocabulario</a>
                      <a href="/repasoitaliano" class="list-group-item list-group-item-action" style="text-align:center;">Repasar Vocabulario</a>
                      <!--<a href="" data-toggle="modal" data-target="#exampleModal1" class="list-group-item list-group-item-action" style="text-align:center;">Agregar Apuntes</a>-->
                      @endif
                      @if($idioma=="Griego")
                      <a href="{{ route('griego.create')}}" class="list-group-item list-group-item-action" style="text-align:center;">Agregar Vocabulario</a>
                      <a href="/repasogriego" class="list-group-item list-group-item-action" style="text-align:center;">Repasar Vocabulario</a>
                      <!--<a href="" data-toggle="modal" data-target="#exampleModal2" class="list-group-item list-group-item-action" style="text-align:center;">Agregar Apuntes</a>-->
                      @endif
                      @if($idioma=="Ingles")
                      <a href="{{ route('ingles.create')}}" class="list-group-item list-group-item-action" style="text-align:center;">Agregar Vocabulario</a>
                      <a href="/repasoingles" class="list-group-item list-group-item-action" style="text-align:center;">Repasar Vocabulario</a>
                      <!--<a href="" data-toggle="modal" data-target="#exampleModal3" class="list-group-item list-group-item-action" style="text-align:center;">Agregar Apuntes</a>-->
                      @endif
                      <!--<a href="{{ route('cuestionario.index')}} " class="list-group-item list-group-item-action" style="text-align:center;">Ver Apuntes</a>-->
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


<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Frase o Pregunta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('cuestionario.store') }}">
          {{ csrf_field() }}
          <input type="hidden" name="idioma" value="italiano">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Frase o Pregunta:</label>
            <input type="text" class="form-control" name="frase">
            <input type="text" class="form-control" name="sig_frase" placeholder="traduccion">
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


<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Frase o Pregunta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('cuestionario.store') }}">
          {{ csrf_field() }}
          <input type="hidden" name="idioma" value="griego">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Frase o Pregunta:</label>
            <input type="text" class="form-control" name="frase">
            <input type="text" class="form-control" name="sig_frase" placeholder="traduccion de la frase">
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


<div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Frase o Pregunta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('cuestionario.store') }}">
          {{ csrf_field() }}
          <input type="hidden" name="idioma" value="ingles">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Frase o Pregunta:</label>
            <input type="text" class="form-control" name="frase">
            <input type="text" class="form-control" name="sig_frase" placeholder="traduccion de la frase">
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
