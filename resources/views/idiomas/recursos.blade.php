@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-md-12">

    <div id="mdb-lightbox-ui"></div>

    <div class="mdb-lightbox no-margin">
      @foreach($galeria as $imagen)
      <figure class="col-md-4">
        <a href="{{URL::asset('/imagenes/'.$imagen->imagen)}}" data-size="1600x1067">
          <img alt="picture" src="{{URL::asset('/imagenes/'.$imagen->imagen)}}"
            class="img-fluid">
        </a>
      </figure>
      @endforeach

    </div>

  </div>
</div>

<script type="text/javascript">
// MDB Lightbox Init
$(function () {
$("#mdb-lightbox-ui").load("mdb-addons/mdb-lightbox-ui.html");
});
</script>
@endsection
