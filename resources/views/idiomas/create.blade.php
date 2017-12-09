@extends('layouts.app')

@section('content')

@if($idioma=='Italiano')
<form method="POST" class="was-validated" action="{{ route('italiano.store') }}">
@endif
@if($idioma=='Griego')
<form method="POST" class="was-validated" action="{{ route('griego.store') }}">
@endif
@if($idioma=='Ingles')
<form method="POST" class="was-validated" action="{{ route('ingles.store') }}">
@endif
      {{ csrf_field() }}
  <div class="row" >
    <div class="col-md-3 mb-3 center-block">
      <label for="validationServer01">{{$idioma}}</label>
      <input type="text" class="form-control is-valid" id="validationServer01" name="palabra" placeholder="Palabra"  required>
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationServer02">Español</label>
      <input type="text" class="form-control is-valid" id="validationServer02" name="significado" placeholder="Significado"  required>
    </div>
    <div class="col-md-3 mb-3">
      <label>Categoria</label>
      <select name="id_categoria" class="custom-select d-block my-3" required>
        <option value="">Seleccione</option>
        @foreach($categorias as $categoria)
        <option value="{{$categoria->id}}">{{$categoria->nombre_categoria}}</option>
        @endforeach
      </select>
    </div>
  </div>
  <br>
  <button class="btn btn-primary center-block"  type="submit">Guardar</button>
</form>

<br><br><br>

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">{{$idioma}}</th>
      <th scope="col">Español</th>
      <th scope="col">Categoria</th>
    </tr>
  </thead>
  <tbody>
    <?php $i=1; ?>
    @foreach($ultimas5palabras as $u5p)
    <tr>
      <th scope="row"><?php echo "$i";$i++; ?></th>
      <td>{{$u5p->palabra}}</td>
      <td>{{$u5p->significado}}</td>
      <td>{{$u5p->nombre_categoria}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
