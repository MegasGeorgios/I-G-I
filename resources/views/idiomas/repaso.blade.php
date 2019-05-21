@extends('layouts.app')

@section('content')
<div id="vue">
	<form action="{{ url('/idioma/'.$idioma.'/pdf') }}" method="get" style="padding-top: 10px; padding-bottom: 10px;">
    	<button class="btn btn-primary center-block" style="width:150px;" type="submit">Exportar todas a PDF</button>
  	</form>
  	
  	<repaso-componente idioma="{{ $idioma }}"></repaso-componente>
</div>
@endsection
