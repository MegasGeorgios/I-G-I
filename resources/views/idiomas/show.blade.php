@extends('layouts.app')

@section('content')
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
<form  method="POST" action="{{ url('/editar/categoria/'.$categoria->id) }}">
  {{ csrf_field() }}
    <div class="row" >
      <div class="col-md-3 mb-3 center-block">
        <label for="validationServer01">Editar</label>
        <input type="text" class="form-control is-valid" id="validationServer01" name="nombre_categoria" value="{{$categoria->nombre_categoria}}"  required>

        <input type="password" class="form-control is-valid" id="validationServer02" name="clave" placeholder="contraseña" required>

        <input type="hidden" name="idioma" value="{{$idioma}}">

        <button type="submit">
          Editar
        </button>
      </div>
    </div>
</form>
@endif

<br>
<table class="table" >
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
      <th scope="col">Ultima vez</th>
      <th scope="col">Opciones</th>
    </tr>
  </thead>
  <tbody>
    <?php $i=1; ?>
    @foreach($palabras as $palabra)
    <tr>
      <th scope="row"><?php echo "$i";$i++; ?></th>
      <td>{{$palabra->palabra}}</td>
      <td>{{$palabra->significado}}</td>
      <td>{{date('F d, Y', strtotime($palabra->updated_at))}}</td>
      <td>
        <form  method="POST" action="{{ url('/eliminar/palabra/'.$palabra->id) }}">
          {{ csrf_field() }}
          <input type="password" name="clave" required>
          <input type="hidden" name="idioma" value="{{$idioma}}">
          <button type="submit">
              Eliminar
          </button>
        </form>
      </td>

    </tr>
    @endforeach
  </tbody>
</table>

@endsection
