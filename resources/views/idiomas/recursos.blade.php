@extends('layouts.app')

@section('content')
<div id="ninja-slider" class="anchoGaleria">
    <div class="inner">
        <ul>
          @foreach($galeria as $imagen)

            <li>
              <a class="ns-img" href="{{URL::asset('/imagenes/'.$imagen->imagen)}}">
                {{$imagen->descripcion}}
              </a>
            </li>
            <!-- <li><a href="/"><img class="ns-img" src="img/3.jpg"></a></li> -->
          @endforeach
        </ul>
    </div>
</div>
@endsection
