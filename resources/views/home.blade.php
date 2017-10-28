@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">IDIOMAS</div>

                <div class="panel-body">

                    <div class="list-group">
                      <a href="{{ route('italiano.index') }}" class="list-group-item list-group-item-action" style="text-align:center;">Italiano</a>
                      <a href="{{ route('griego.index') }}" class="list-group-item list-group-item-action" style="text-align:center;">Griego</a>
                      <a href="{{ route('ingles.index') }}" class="list-group-item list-group-item-action" style="text-align:center;">Ingles</a>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
