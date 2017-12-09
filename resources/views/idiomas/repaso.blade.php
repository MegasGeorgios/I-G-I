@extends('layouts.app')

@section('content')

@if($idioma=='Italiano')
<form method="GET" class="was-validated" action="{{ url('/repasoitaliano') }}">
@endif
@if($idioma=='Griego')
<form method="GET" class="was-validated" action="{{ url('/repasogriego') }}">
@endif
@if($idioma=='Ingles')
<form method="GET" class="was-validated" action="{{ url('/repasoingles') }}">
@endif
      {{ csrf_field() }}
  <div class="row" >

    <div class="col-md-12 mb-3">
      <h3 style="text-align: center;">Ordenar por:</h3><br>
      <select name="ordenar" class="custom-select center-block">
        <option value="0">Todas</option>
        <option value="1">Ultimas 20</option>
        <option value="2">Ultimas 60</option>
        <option value="3">Ultimas 100</option>
      </select>
    </div>
  </div>
  <br>
  <button class="btn btn-primary center-block"  type="submit">Filtrar</button>
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
    @foreach($palabras as $palabra)
    <tr>
      <th scope="row"><?php echo "$i";$i++; ?></th>
      <td>{{$palabra->palabra}}</td>
      <td></td>
      <td>{{$palabra->significado}}</td>

    </tr>
    @endforeach

  </tbody>
</table>
@endsection
