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
<table class="table" >
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">{{ $idioma }}</th>
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
      @if($idioma=="Italiano")
      <td>
        <form  method="POST" action="{{ route('italiano.destroy', $palabra->id) }}">
          {{ csrf_field() }}
          {{ method_field('DELETE') }}
          <input type="password" name="clave" required>
          <button type="submit">
              Eliminar
          </button>
        </form>
      </td>
      @endif

      @if($idioma=="Griego")
      <td>
        <form  method="POST" action="{{ route('griego.destroy', $palabra->id) }}">
          {{ csrf_field() }}
          {{ method_field('DELETE') }}
          <input type="password" name="clave" required>
          <button type="submit">
              Eliminar
          </button>
        </form>
      </td>
      @endif

      @if($idioma=="Ingles")
      <td>
        <form  method="POST" action="{{ route('ingles.destroy', $palabra->id) }}">
          {{ csrf_field() }}
          {{ method_field('DELETE') }}
          <input type="password" name="clave" required>
          <button type="submit">
              Eliminar
          </button>
        </form>
      </td>
      @endif
    </tr>
    @endforeach
  </tbody>
</table>

@endsection
