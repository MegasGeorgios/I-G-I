@extends('layouts.app')

@section('content')
<div id="vue">
  @if (session('wrong'))
  <div class="alert alert-danger " role="alert">
    <center><strong>{{ session('wrong') }}</strong></center>
  </div>
  @endif
  @if (session('success'))
  <div class="alert alert-primary " role="alert">
    <center><strong>{{ session('success') }}</strong></center>
  </div>
  @endif

  @if(isset($categoria))
  <form method="POST" action="{{ url('/editar/categoria/'.$categoria->id) }}">
    {{ csrf_field() }}
    <div class="row">
      <div class="col-md-3 mb-3 center-block">
        <label for="validationServer01">Editar</label>
        <input type="text" class="form-control is-valid" id="validationServer01" name="nombre_categoria" value="{{$categoria->nombre_categoria}}"  required>

        <input type="password" class="form-control is-valid" id="validationServer03" name="clave" placeholder="contraseña" required>

        <input type="hidden" name="idioma" value="{{$idioma}}">

        <button type="submit">
          Editar
        </button>
      </div>
    </div>
  </form>

  <form method="POST" action="{{ url('/guardar/recurso') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="row">
      <div class="col-md-3 mb-3 center-block">
        <label for="validationServer01">REGISTRA UN RECURSO!
          <a href="{{url('/categoria/'.$categoria->id.'/recursos/'.$idioma)}}" style="padding-left:45px;">Ver recursos</a> </label>

          <textarea class="form-control is-valid" id="validationServer02" name="descripcion" placeholder="Descripcion"></textarea>

          <input type="file" name="imagen">

          <input type="hidden" name="idioma" value="{{$idioma}}">
          <input type="hidden" name="id_categoria" value="{{$categoria->id}}">

          <button type="submit">
            Subir
          </button>
        </div>
      </div>
    </form>
    @endif
    <br>
    <div class="col-md-8 col-md-offset-2">
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">
              @if ($idioma == 'griego')
              Griego
              @elseif ($idioma == 'italiano')
              Italiano
              @else
              Ingles
              @endif
            </th>
            <th scope="col">Español</th>
            @if(isset($repetidas))
              @if($repetidas)
                <th scope="col">Categoria</th>
              @endif
            @endif
          </tr>
        </thead>
        <tbody>
          <?php $i=1; ?>
          @foreach($palabras as $palabra)
          <tr>
            <th scope="row">
              <?php echo "$i";$i++; ?>
            </th>
            <td>{{$palabra->palabra}}</td>
            <td>{{$palabra->significado}}
              <a href="" data-toggle="modal" data-target="#exampleModal" v-on:click="asignAtributesShow({{$palabra->id}},'{{$idioma}}')">
                <i class="fa fa-trash" style="font-size:20px;color:black; float: right;"></i>
              </a>
            </td>
            @if(isset($repetidas))
              @if($repetidas)
                <td scope="col">{{$palabra->nomb_cat}}</td>
              @endif
            @endif
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Introduzca la contraseña:</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <!-- <form method="POST" action="{{ url('/eliminar/palabra/') }}"> -->
              {{ csrf_field() }}
              <div class="form-group">
                <input type="password" class="form-control" name="clave" v-model="clave" placeholder=" ... " required>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" v-on:click="borrar">Eliminar</button>
              </div>
            <!-- </form> -->
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
