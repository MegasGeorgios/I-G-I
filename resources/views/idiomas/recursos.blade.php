@extends('layouts.app')

@section('content')
<!-- <div id="ninja-slider" class="anchoGaleria">
    <div class="inner">
        <ul>
          @foreach($galeria as $imagen)

            <li>
              <a class="ns-img" href="{{URL::asset('/imagenes/'.$imagen->imagen)}}">
                {{$imagen->descripcion}}
              </a>
            </li>
          @endforeach
        </ul>
    </div>
</div> -->
<div class="bxslider">
  @foreach($galeria as $imagen)
    <div><img src="{{URL::asset('/imagenes/'.$imagen->imagen)}}"></div>
  @endforeach
</div>
<script>
$('.bxslider').bxSlider({
  auto: true,
  autoControls: true,
  stopAutoOnClick: true,
  pager: true,
  slideWidth: 600
});
</script>
@endsection
