@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{$idioma}}</div>
                <div class="panel-body">
                    <div class="list-group">
                      <form action="{{ url('/agregar/vocabulario/'.$idioma) }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                          <input type="text" class="form-control is-valid" name="id_categoria" placeholder="ID de la categoria" autocomplete="off"  required>
                          <label for="vocabulario">Inserte el vocabulario</label>
                          <textarea class="form-control" name="vocabulario" id="vocabulario" rows="12"></textarea>
                        </div>
                        <button class="btn btn-primary center-block" style="width:150px;" type="submit">AGREGAR</button>
                      </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
