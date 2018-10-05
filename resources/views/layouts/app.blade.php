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
  <link href="{{ asset('css/ninja-slider.css') }}" rel="stylesheet" />
  <script src="{{ asset('js/ninja-slider.js') }}" type="text/javascript"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    .topnav {
      overflow: hidden;
      background-color: #212529;
    }

    .topnav a {
      float: left;
      display: block;
      color: #f2f2f2;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
      font-size: 17px;
    }

    .topnav a:hover {
      background-color: #ddd;
      color: black;
    }

    .active {
      background-color: #4CAF50;
      color: white;
    }

    .topnav .icon {
      display: none;
    }

    @media screen and (max-width: 600px) {
      .topnav a:not(:first-child) {
        display: none;
      }

      .topnav a.icon {
        float: right;
        display: block;
      }
    }

    @media screen and (max-width: 600px) {
      .topnav.responsive {
        position: relative;
      }

      .topnav.responsive .icon {
        position: absolute;
        right: 0;
        top: 0;
      }

      .topnav.responsive a {
        float: none;
        display: block;
        text-align: left;
      }
    }
  </style>
</head>

<body>
  <div>
    <!-- <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #212529;">
            <a class="navbar-brand" href="{{ url('/') }}" style="font-size:18px; color:white;"><i class="	fa fa-institution" style="font-size:20px;color:white"></i> {{ config('app.name', 'I-G-I') }}</a>
              <div class="dropdown" style="font-size:18px;color:white">
                <button class=" dropdown-toggle" style="background-color: #212529; border: none;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  MENU
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="{{ url('/idioma/italiano') }}">Italiano</a>
                  <a class="dropdown-item" href="{{ url('/idioma/griego') }}">Griego</a>
                  <a class="dropdown-item" href="{{ url('/idioma/ingles') }}">Ingles</a>
                </div>
              </div>
              <a class="navbar-brand" href="https://megasgeorgios.github.io/" target="_blank" style="font-size:18px; color:white;"><i class="fa fa-child" style="font-size:20px;color:white"></i> CONTACTAR</a>
      </nav> -->

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
