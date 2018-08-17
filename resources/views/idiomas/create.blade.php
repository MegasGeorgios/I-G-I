@extends('layouts.app')

@section('content')
<form method="POST" class="was-validated" action="{{ route('idioma.store') }}">
{{ csrf_field() }}
  <div class="row" >
    <div class="col-md-3 mb-3 center-block">
      <label for="validationServer01">{{$idioma}}</label>
      <input type="text" class="form-control is-valid" id="validationServer01" name="palabra" placeholder="Palabra"  required>
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationServer02">español</label>
      <input type="text" class="form-control is-valid" id="validationServer02" name="significado" placeholder="Significado"  required>
    </div>
    <div class="col-md-4 mb-3">
      <label>Categoria</label>
      <select name="id_categoria" class="custom-select d-block my-3"  required>
        <option value="">Seleccione</option>
        @foreach($nombre_categorias as $categoria)
        <option value="{{$categoria->id}}">{{$categoria->nombre_categoria}}</option>
        @endforeach
      </select>
    </div>
  </div>
  <br>
  <input type="hidden" name="idioma" value="{{$idioma}}">
  <button class="btn btn-primary center-block"  type="submit">Guardar</button>
  </form>
<br><br><br>

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">{{$idioma}}</th>
      <th scope="col"></th>
      <th scope="col">Español</th>

    </tr>
  </thead>
  <tbody>
    <?php $i=1; ?>
    @foreach($ultimas_palabras as $u_p)
    <tr>
      <th scope="row"><?php echo "$i";$i++; ?></th>
      <td>{{$u_p->palabra}}</td>
      <td></td>
      <td>{{$u_p->significado}}</td>

    </tr>
    @endforeach
  </tbody>
</table>
@endsection
