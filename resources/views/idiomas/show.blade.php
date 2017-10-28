@extends('layouts.app')

@section('content')

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
      <td>{{$palabra->updated_at}}</td>
      @if($idioma=="Italiano")
      <td><!--<button><a href="{{ route('italiano.edit', $palabra->id_it) }}">Editar</a></button>-->
        <form  method="POST" action="{{ route('italiano.destroy', $palabra->id_it) }}">
          {{ csrf_field() }}
          {{ method_field('DELETE') }}
          <button type="submit">
              Eliminar
          </button>
        </form>
      </td>
      @endif

      @if($idioma=="Griego")
      <td><button><a href="{{ route('griego.edit', $palabra->id_gr) }}">Editar</a></button>
        <form  method="POST" action="{{ route('griego.destroy', $palabra->id_gr) }}">
          {{ csrf_field() }}
          {{ method_field('DELETE') }}
          <button type="submit">
              Eliminar
          </button>
        </form>
      </td>
      @endif

      @if($idioma=="Ingles")
      <td><button><a href="{{ route('ingles.edit', $palabra->id_en) }}">Editar</a></button>
        <form  method="POST" action="{{ route('ingles.destroy', $palabra->id_en) }}">
          {{ csrf_field() }}
          {{ method_field('DELETE') }}
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
