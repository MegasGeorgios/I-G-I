@extends('layouts.app')

@section('content')
<form method="POST" class="was-validated" action="{{ route('idioma.store') }}">
{{ csrf_field() }}
  <div class="container center-block">
    <div class="row" >
      <div class="col-md-3 mb-3 ">
        <label for="validationServer01">
          @if ($idioma == 'griego')
              Griego
          @elseif ($idioma == 'italiano')
              Italiano
          @else
              Ingles
          @endif
        </label>
        <input type="text" class="form-control is-valid" id="validationServer01" name="palabra" placeholder="Palabra" autocomplete="off"  required>
      </div>
      <div class="col-md-3 mb-3">
        <label for="validationServer02">Español</label>
        <input type="text" class="form-control is-valid" id="validationServer02" name="significado" placeholder="Significado" autocomplete="off" required>
      </div>
      <div class="col-md-3 mb-3">
        <label>Categoria</label>
        <select name="id_categoria" class="custom-select d-block" style="height: 36px;" required>
          <option value="">Seleccione</option>
          @foreach($nombre_categorias as $categoria)
          <option value="{{$categoria->id}}">{{$categoria->nombre_categoria}}</option>
          @endforeach
        </select>
      </div>
      <div class="col-md-3 mb-3">
        <label></label>
          <button class="form-control "  type="submit">Guardar</button>
          <input type="hidden" name="idioma" value="{{$idioma}}">
      </div>
    </div>
  </div>
  </form>
<br><br><br>
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
</div>
@endsection
