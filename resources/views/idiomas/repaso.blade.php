@extends('layouts.app')

@section('content')

<form method="GET" class="was-validated" action="{{ url('/idioma/'.$idioma.'/repaso') }}">
  <div class="row" >

    <div class="col-md-12 mb-3">
      <h3 style="text-align: center;">Ordenar por:</h3><br>
      <select name="value" class="custom-select center-block" style="width:150px; height:30px;">
        <option value="0">Todas</option>
        <option value="1">Aleatoreo</option>
        <option value="2">Solo {{$idioma}}</option>
        <option value="3">Solo español</option>
        <option value="20">Ultimas 20</option>
        <option value="60">Ultimas 60</option>
        <option value="100">Ultimas 100</option>
      </select>
    </div>
  </div>
  <button class="btn btn-primary center-block" style="width:150px;" type="submit">Filtrar</button>
</form>

<form action="{{ url('/idioma/'.$idioma.'/pdf') }}" method="get" style="padding-top: 10px; padding-bottom: 10px;">
  <button class="btn btn-primary center-block" style="width:150px;" type="submit">Exportar a PDF</button>
</form>

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
      @foreach($palabras as $palabra)
      <tr>
        <th scope="row"><?php echo "$i";$i++; ?></th>
        <td>
          @if(isset($palabra->palabra))
            {{$palabra->palabra}}
          @else
            <input type="text" name="palabra">
          @endif
        </td>
        <td></td>
        <td>
          @if(isset($palabra->significado))
            {{$palabra->significado}}
          @else
            <input type="text" name="palabra">
          @endif
        </td>

      </tr>
      @endforeach

    </tbody>
  </table>
</div>
@endsection
