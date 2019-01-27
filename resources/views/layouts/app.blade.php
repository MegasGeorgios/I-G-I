<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'I-G-I') }}</title>

  <!-- Styles -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/jquery.bxslider.css') }}">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="{{ asset('js/jquery.bxslider.min.js') }}"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
  <div>
    <div class="topnav" id="myTopnav">
      <a href="{{ url('/') }}" class="active">
          <i class="fa fa-institution" style="font-size:20px;color:white"></i>
          {{ config('app.name', 'I-G-I') }}
        </a>
        <a href="{{ url('/idioma/italiano') }}">Italiano</a>
        <a href="{{ url('/idioma/griego') }}">Griego</a>
        <a href="{{ url('/idioma/ingles') }}">Ingles</a>
      <a href="https://megasgeorgios.github.io/" target="_blank">
          <i class="fa fa-child" style="font-size:20px;color:white"></i>
          Saber Más
        </a>
      <a href="javascript:void(0);" class="icon" onclick="myFunction()">
          <i class="fa fa-bars"></i>
        </a>
    </div>

    <main style="padding-top:25px;">

      @yield('content')

    </main>

  </div>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}"></script>
  <script>
    function myFunction() {
      var x = document.getElementById("myTopnav");
      if (x.className === "topnav") {
        x.className += " responsive";
      } else {
        x.className = "topnav";
      }
    }
  </script>

</body>

</html>
