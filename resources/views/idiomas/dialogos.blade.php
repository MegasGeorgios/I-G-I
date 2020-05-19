@extends('layouts.app')

@section('content')
<div class="accordion" id="accordionExample">
  @forelse ($dialogos as $index => $dialogo)
    <div class="card">
      <div class="card-header" id="heading{{$index}}">
        <h2 class="mb-0">
          <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse{{$index}}" aria-expanded="true" aria-controls="collapse{{$index}}">
              {{$dialogo->titulo}}
          </button>
        </h2>
      </div>

      <div id="collapse{{$index}}" class="collapse show" aria-labelledby="heading{{$index}}" data-parent="#accordionExample">
        <div class="card-body">
          <?php  echo html_entity_decode($dialogo->dialogo); ?>
        </div>
      </div>
    </div>
  @empty
    <div class="alert alert-dark" role="alert">
    No hay dialogos
    </div>
  @endforelse
</div>

<form method="POST" action="{{ url('/dialogos/'.$idioma) }}">
  {{ csrf_field() }}
  <div class="row">
    <div class="col-md-6 mb-3 center-block">
      <label for="validationServer01">Agregar dialogo</label>
      <input type="text" class="form-control is-valid" name="titulo" placeholder="Titulo del dialogo" autocomplete="off">
      <textarea class="form-control is-valid ckeditor" name="dialogo" rows="15" placeholder="Inserta un dialogo" required></textarea>
      <input type="hidden" name="numdialogo" value="{{$num_dialogos}}">

      <button type="submit">
        Guardar
      </button>
    </div>
  </div>
</form>
@endsection
