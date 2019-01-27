<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <style>

    body {
      font-family: DejaVu Sans, sans-serif;
    }

    #idioma {
        /* font-family: "Trebuchet MS", Arial, Helvetica, sans-serif; */
        border-collapse: collapse;
        width: 100%;
    }

    #idioma td, #idioma th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #idioma tr:nth-child(even){background-color: #f2f2f2;}

    #idioma tr:hover {background-color: #ddd;}

    #idioma th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #4CAF50;
        color: white;
    }
</style>
  <body>
    <table id="idioma">
      <thead>
        <tr>
          <th>#</th>
          <th>
            @if ($idioma == 'griego')
                Griego
            @elseif ($idioma == 'italiano')
                Italiano
            @else
                Inglés
            @endif
          </th>
          <th>Español</th>
        </tr>
      </thead>
      <tbody>
        <?php $i=1; ?>
        @foreach($palabras as $palabra)
        <tr>
          <th><?php echo "$i";$i++; ?></th>
          <td>{{$palabra->palabra}}</td>
          <td>{{$palabra->significado}}</td>

        </tr>
        @endforeach

      </tbody>
    </table>
  </body>
</html>
