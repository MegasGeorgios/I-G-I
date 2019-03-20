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
    @csrf
    <div class="row">
      <div class="col-md-3 mb-3 center-block">
        <label for="validationServer01">EDITAR</label>
        <input type="text" class="form-control is-valid" id="validationServer01" name="nombre_categoria" value="{{$categoria->nombre_categoria}}"  required>
        <input type="text" class="form-control is-valid" id="validationServer02" name="url_clase" value="{{$categoria->url_clase}}" placeholder="url de la clase">
        <input type="password" class="form-control is-valid" id="validationServer03" name="clave" placeholder="contraseña" required>

        <input type="hidden" name="idioma" value="{{$idioma}}">

        <button type="submit">
          Editar
        </button>
        @if(isset($categoria->url_clase))
        <a href="{{url($categoria->url_clase)}}" target="_blank">ir a la clase</a>
        @endif
      </div>
    </div>
  </form>

  <form method="POST" action="{{ url('/guardar/recurso') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="row">
      <div class="col-md-3 mb-3 center-block">
        <label for="validationServer01">SUBE UN RECURSO!
          <a href="{{url('/categoria/'.$categoria->id.'/recursos/'.$idioma)}}" style="padding-left:45px;">Ver recursos</a> </label>

          <textarea class="form-control is-valid" id="validationServer04" name="descripcion" placeholder="Descripcion"></textarea>

          <input type="file" name="archivo">

          <input type="hidden" name="idioma" value="{{$idioma}}">
          <input type="hidden" name="id_categoria" value="{{$categoria->id}}">

          <button type="submit">
            Subir
          </button>
        </div>
      </div>
    </form>

    <div class="row">
      <div class="col-md-3 mb-3 center-block">
        @foreach($recursos as $recurso)
          <a href="{{url('/descargar/recurso/'.$recurso->id)}}" target="_blank">{{ $recurso->imagen }}</a><br>
        @endforeach
      </div>
    </div>
    
    <form action="{{ url('/idioma/'.$idioma.'/categoria/'.$categoria->id.'/pdf') }}" method="get" style="padding-top: 10px; padding-bottom: 10px;">
      <button class="btn btn-primary center-block" style="width:200px;" type="submit">Exportar categoria a PDF</button>
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
          @if($palabra->favorita == 1)
          <tr id="resaltarfila-{{$palabra->id}}" style="background-color: #B8F9AA;">
          @else
          <tr id="resaltarfila-{{$palabra->id}}">
          @endif
            <th scope="row">
              <?php echo "$i";$i++; ?>
            </th>
            <td>{{$palabra->palabra}}</td>
            <td>{{$palabra->significado}}
              <a href="" data-toggle="modal" data-target="#exampleModal" v-on:click="asignAtributesShow({{$palabra->id}},'{{$idioma}}')">
                <i class="fa fa-trash" style="font-size:20px;color:black; float: right;"></i>
              </a>
              <a v-on:click="resaltarPalabra({{$palabra->id}},'{{$idioma}}')">
                <i class="fa fa-bookmark-o" style="font-size:20px;color:black; float: right; padding-right: 5px;"></i>
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

      @foreach($notas as $nota)
       <div class="card text-center">
          <div class="card-header nota">
            Nota
          </div>
          <div class="card-body">
            <p class="card-text">{{ $nota->nota }}</p>
          </div>
          <div class="card-footer text-muted">
            {{ $nota->created_at->format('d/m/Y')}} - {{ $nota->created_at->format('H:i')}}
          </div>
        </div>
      @endforeach

      <form method="POST" action="{{ url('/guardar/nota') }}" >
      @csrf
        <div class="row" style="padding-top: 15px; padding-bottom: 15px;">
          <label for="validationServer01">AGREGA UNA NOTA!</label>

          <textarea class="form-control is-valid" id="validationServer05" name="nota" rows="8" required></textarea>
          <input type="hidden" name="id_categoria" value="{{$categoria->id}}">
          <button type="submit">
            Agregar
          </button>
        </div>
      </form>

      @foreach ($tablas as $tabla)
        @if(isset($tabla->titulo))
          <div class="card-header">
            {{ $tabla->titulo }}
          </div>
        @endif
        
        <table class="table table-striped table-dark">
          <tbody>
            <?php $j = 0; $i = 0;?>
            @while($j < $tabla->filas)
            <?php $ij = 0; ?>
              <tr>
                @while($ij < $tabla->columnas)
                  @if($tabla->datos[$i] != '-')
                    <td>{{ $tabla->datos[$i] }}</td>
                  @else
                    <td></td>
                  @endif
                    <?php $i++; $ij++;?>                
                @endwhile
                
              </tr>
              <?php $j++; ?>
            @endwhile
          </tbody>
        </table>
      @endforeach

      <form method="post" action="{{ url('/guardar/tabla') }}">
        @csrf

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="form-row" style="padding-top: 15px;">
          <div class="form-group col-md-2">
            <label >Filas</label>
            <input class="form-control" type='text' v-model='filas' name='filas'>
          </div>
          <div class="form-group col-md-2">
            <label >Columnas</label>
            <input class="form-control" type='text' v-model='columnas' name='columnas' >
          </div>
          <div class="form-group col-md-5">
            <label >Nombre tabla</label>
            <input class="form-control" type='text' name='titulo'>
          </div>
          <div class="form-group col-md-3">
            <label >Guardar tabla</label>
            <button class="form-control" type="submit" ><i class="fa fa-save"></i></button>
          </div>
        </div>

      
        <table class="table table-bordered table-dark">
          <tbody>
            <tr v-for="columna,f in parseInt(filas)">
              <td v-for="fila,c in parseInt(columnas)">
                <input class="form-control" type='text' name="input[]">
              </td>
            </tr>
          </tbody>
        </table>
        <input type="hidden" name="id_categoria" value="{{$categoria->id}}">
      </form>

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
