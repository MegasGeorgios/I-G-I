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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div id="app">
      <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #212529;">
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
      </nav>

        @yield('content')

    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
