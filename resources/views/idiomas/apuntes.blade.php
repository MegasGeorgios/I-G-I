@extends('layouts.app')

@section('content')
@if (session('success'))
<div class="alert alert-primary " role="alert">
      <center><strong>{{ session('success') }}</strong></center>
</div>
@endif
@if (session('wrong'))
<div class="alert alert-danger " role="alert">
      <center><strong>{{ session('wrong') }}</strong></center>
</div>
@endif

<table class="table" >
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Frase o Pregunta</th>
      <th scope="col">Traduccion</th>
      <th scope="col">Opciones</th>
    </tr>
  </thead>
  <tbody>
    <?php $i=1; ?>
    @foreach($apuntes as $apunte)
    <tr>
      <th scope="row"><?php echo "$i";$i++; ?></th>
    @if(isset($apunte->frase))
      <td>{{$apunte->frase}}</td>
    @else
      <td>-</td>
    @endif
    @if(isset($apunte->sig_frase))
      <td>{{$apunte->sig_frase}}</td>
    @else
      <td>-</td>
    @endif
      <td>
        <form  method="POST" action="{{ route('cuestionario.destroy', $apunte->id) }}">
          {{ csrf_field() }}
          {{ method_field('DELETE') }}
          <input type="password" name="clave" required>
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
