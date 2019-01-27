@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">IDIOMAS</div>

                <div class="panel-body">

                    <div class="list-group">
                      <a href="{{ url('/idioma/italiano') }}" class="list-group-item list-group-item-action" style="text-align:center;">Italiano</a>
                      <a href="{{ url('/idioma/griego') }}" class="list-group-item list-group-item-action" style="text-align:center;">Griego</a>
                      <a href="{{ url('/idioma/ingles') }}" class="list-group-item list-group-item-action" style="text-align:center;">Ingles</a>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
